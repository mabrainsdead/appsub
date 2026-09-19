<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Associado;
use Illuminate\Http\Request;
use App\Models\Campeonato;
use App\Models\Configuracao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Mail;
use App\Mail\SolicitacaoRecebida;
use App\Mail\SolicitacaoEmAnalise;



class InscricaoController extends Controller
{

    public function create(): View
    {
        return view('inscricao.create');
    }
    public function pagamento(string $token): View
    {
        $solicitacao = Solicitacao::where('token', $token)
            ->whereIn('status', ['pendente', 'comprovante_enviado'])
            ->firstOrFail();

        $chavePix = Configuracao::where('chave', 'chave_pix')
            ->value('valor');

        $nomePix = Configuracao::where('chave', 'nome_pix')
            ->value('valor');

        return view('inscricao.pagamento', [
            'solicitacao' => $solicitacao,
            'chavePix' => $chavePix,
            'nomePix' => $nomePix,
        ]);
    }
    public function solicitar(Request $request): RedirectResponse
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string'],
            'data_nascimento' => ['required', 'date'],
            'email' => ['required', 'email', 'max:255'],
            'tipo' => ['required', 'in:nova_associacao,renovacao'],
        ]);

        $cpf = preg_replace('/\D/', '', $dados['cpf']);

        $associado = Associado::where('cpf', $cpf)->first();

        if ($dados['tipo'] === 'nova_associacao' && $associado) {
            return back()->withErrors([
                'cpf' => 'Este CPF já está cadastrado.'
            ]);
        }

        if ($dados['tipo'] === 'renovacao' && !$associado) {
            return back()->withErrors([
                'cpf' => 'Associado não encontrado.'
            ]);
        }

        $valorAssociacao = (float) Configuracao::where(
            'chave',
            'valor_associacao'
        )->value('valor');

        $solicitacao = Solicitacao::create([
            'associado_id' => $associado?->id,
            'nome' => $dados['nome'],
            'cpf' => $cpf,
            'data_nascimento' => $dados['data_nascimento'],
            'email' => $dados['email'],
            'campeonato_id' => null,
            'tipo' => $dados['tipo'],
            'incluir_campeonato' => false,
            'valor' => $valorAssociacao,
            'comprovante' => null,
            'token' => Str::random(64),
            'status' => 'pendente',
        ]);

        return redirect()->route('inscricao.pagamento', [
            'token' => $solicitacao->token,
        ]);
    }

    public function store(Request $request): View
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string'],
            'data_nascimento' => ['required', 'date'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $cpf = preg_replace('/\D/', '', $dados['cpf']);

        $associado = Associado::where('cpf', $cpf)->first();

        $associacaoVigente = $associado?->associacaoVigente;

        if (!$associado) {
            $tipo = 'nova_associacao';
            $precisaAssociacao = true;
        } elseif (!$associacaoVigente) {
            $tipo = 'renovacao';
            $precisaAssociacao = true;
        } else {
            $tipo = null;
            $precisaAssociacao = false;
        }

        $valorAssociacao = (float) Configuracao::where(
            'chave',
            'valor_associacao'
        )->value('valor');

        return view('inscricao.continuar', [
            'dados' => $dados,
            'cpf' => $cpf,
            'associado' => $associado,
            'associacaoVigente' => $associacaoVigente,
            'tipo' => $tipo,
            'precisaAssociacao' => $precisaAssociacao,
            'valorAssociacao' => $valorAssociacao,
        ]);
    }
    public function enviarComprovante(Request $request, string $token): RedirectResponse
    {
        $solicitacao = Solicitacao::where('token', $token)
            ->whereIn('status', ['pendente', 'comprovante_enviado'])
            ->firstOrFail();

        $dados = $request->validate([
            'comprovante' => [
                'required',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120',
            ],
        ]);

        $arquivo = $dados['comprovante']->store(
            'comprovantes',
            'local'
        );

        $solicitacao->update([
            'comprovante' => $arquivo,
            'status' => 'comprovante_enviado',
        ]);

// E-mail para o administrador
        Mail::to(Configuracao::obter('email_aprovacao'))
            ->send(new SolicitacaoRecebida($solicitacao));

// E-mail para o solicitante
        Mail::to($solicitacao->email)
            ->send(new SolicitacaoEmAnalise($solicitacao));

        return redirect()
            ->route('inscricao.pagamento', ['token' => $token])
            ->with('sucesso', 'Comprovante enviado com sucesso.');
    }
}
