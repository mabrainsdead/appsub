<?php

namespace App\Http\Controllers;

use App\Models\Associado;
use App\Models\Associacao;
use App\Models\Solicitacao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Mail\AssociacaoAprovada;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssociacaoRecusada;


class SolicitacaoController extends Controller
{

    public function excluir(Solicitacao $solicitacao): RedirectResponse
    {
        if (in_array($solicitacao->status, [
            'pendente',
            'comprovante_enviado',
        ])) {
            abort(409, 'Solicitações pendentes não podem ser excluídas.');
        }

        if ($solicitacao->comprovante) {
            Storage::disk('local')->delete($solicitacao->comprovante);
        }

        $solicitacao->delete();

        return redirect()
            ->route('admin.solicitacoes.historico')
            ->with('sucesso', 'Solicitação excluída com sucesso.');
    }
    public function index(): View
    {
        $solicitacoes = Solicitacao::where(
            'status',
            'comprovante_enviado'
        )
            ->latest()
            ->get();

        return view('admin.solicitacoes.index', [
            'solicitacoes' => $solicitacoes,
        ]);
    }
    public function historico(): View
    {
        $solicitacoes = Solicitacao::whereIn('status', [
            'aprovada',
            'recusada',
        ])
            ->latest()
            ->get();

        return view('admin.solicitacoes.historico', [
            'solicitacoes' => $solicitacoes,
        ]);
    }
    public function comprovante(string $token)
    {
        $solicitacao = Solicitacao::where('token', $token)
            ->whereNotNull('comprovante')
            ->firstOrFail();

        abort_unless(
            Storage::disk('local')->exists($solicitacao->comprovante),
            404
        );

        return Storage::disk('local')->response(
            $solicitacao->comprovante
        );
    }
    public function confirmarAprovacao(string $token): View
    {
        $solicitacao = Solicitacao::with('associado')
            ->where('token', $token)
            ->firstOrFail();

        if ($solicitacao->status === 'aprovada') {
            return view('admin.solicitacoes.ja-aprovada', [
                'solicitacao' => $solicitacao,
            ]);
        }

        if ($solicitacao->status !== 'comprovante_enviado') {
            abort(409, 'Esta solicitação não está disponível para aprovação.');
        }

        return view('admin.solicitacoes.confirmar-aprovacao', [
            'solicitacao' => $solicitacao,
        ]);
    }

    public function confirmarRecusa(string $token): View
    {
        $solicitacao = Solicitacao::where('token', $token)->firstOrFail();

        if ($solicitacao->status === 'recusada') {
            return view('admin.solicitacoes.ja-recusada', [
                'solicitacao' => $solicitacao,
            ]);
        }

        if ($solicitacao->status === 'aprovada') {
            return view('admin.solicitacoes.ja-aprovada', [
                'solicitacao' => $solicitacao,
            ]);
        }

        if ($solicitacao->status !== 'comprovante_enviado') {
            abort(409, 'Esta solicitação não está disponível para recusa.');
        }

        return view('admin.solicitacoes.confirmar-recusar', [
            'solicitacao' => $solicitacao,
        ]);
    }

    public function aprovar(string $token): RedirectResponse
    {
        $associacao = DB::transaction(function () use ($token) {

            $solicitacao = Solicitacao::where('token', $token)
                ->where('status', 'comprovante_enviado')
                ->lockForUpdate()
                ->firstOrFail();

            if ($solicitacao->tipo === 'nova_associacao') {

                // Verifica se o CPF já foi cadastrado anteriormente.
                $associado = Associado::where('cpf', $solicitacao->cpf)
                    ->lockForUpdate()
                    ->first();

                if ($associado) {

                    // Não permite criar uma segunda associação vigente.
                    if ($associado->associacaoVigente) {
                        throw new \RuntimeException(
                            'Este CPF já possui uma associação vigente.'
                        );
                    }

                    // CPF já existe, portanto reutiliza o associado.
                    // Atualizamos os dados informados na solicitação.
                    $associado->update([
                        'nome' => $solicitacao->nome,
                        'data_nascimento' => $solicitacao->data_nascimento,
                        'email' => $solicitacao->email,
                    ]);

                } else {

                    // CPF ainda não existe: cria um novo associado.
                    $ultimoNumero = Associado::lockForUpdate()
                        ->max('numero');

                    $associado = Associado::create([
                        'numero' => ($ultimoNumero ?? 0) + 1,
                        'nome' => $solicitacao->nome,
                        'cpf' => $solicitacao->cpf,
                        'data_nascimento' => $solicitacao->data_nascimento,
                        'email' => $solicitacao->email,
                    ]);
                }

            } else {

                // Renovação: usa o associado já existente
                $associado = $solicitacao->associado;

                if (!$associado) {
                    throw new \RuntimeException(
                        'Associado não encontrado para renovação.'
                    );
                }

                // Segurança: não permite criar duas associações vigentes
                if ($associado->associacaoVigente) {
                    throw new \RuntimeException(
                        'Este associado já possui uma associação vigente.'
                    );
                }

                // CPF permanece inalterado.
                // Nome e e-mail podem ser atualizados na renovação.
                $associado->update([
                    'nome' => $solicitacao->nome,
                    'email' => $solicitacao->email,
                ]);
            }

            // Nova validade começa sempre hoje.
            // A associação anterior permanece intacta no histórico.
            $dataInicio = today();
            $dataFim = $dataInicio->copy()->addYear();

            $associacao = Associacao::create([
                'associado_id' => $associado->id,
                'data_inicio' => $dataInicio,
                'data_fim' => $dataFim,
                'valor' => $solicitacao->valor,
                'status' => 'ativa',
                'codigo_validacao' => \Illuminate\Support\Str::random(32),
            ]);

            $solicitacao->update([
                'associado_id' => $associado->id,
                'status' => 'aprovada',
                'aprovado_em' => now(),
            ]);

            return $associacao;
        });

        Mail::to($associacao->associado->email)
            ->send(new AssociacaoAprovada($associacao));

        return redirect()
            ->route('admin.solicitacoes.resultado', [
                'token' => $token,
            ]);
    }

    public function recusar(string $token): RedirectResponse
    {
        $solicitacao = Solicitacao::where('token', $token)
            ->where('status', 'comprovante_enviado')
            ->firstOrFail();

        $solicitacao->update([
            'status' => 'recusada',
            'recusado_em' => now(),
        ]);

        Mail::to($solicitacao->email)
            ->send(new AssociacaoRecusada($solicitacao));

        return redirect()
            ->route('admin.solicitacoes.resultado', [
                'token' => $token,
            ]);
    }

    public function resultado(string $token): View
    {
        $solicitacao = Solicitacao::with('associado')
            ->where('token', $token)
            ->whereIn('status', ['aprovada', 'recusada'])
            ->firstOrFail();

        return view('admin.solicitacoes.resultado', [
            'solicitacao' => $solicitacao,
        ]);
    }

}
