<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Associado;
use App\Models\Associacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InscricaoManualController extends Controller
{
    public function create()
    {
        return view('admin.inscricoes-manual.create');
    }

    public function store(Request $request)
    {
        // Remove pontos, hífen e qualquer outro caractere não numérico
        $cpf = preg_replace('/\D/', '', $request->cpf);

        // Substitui o CPF mascarado pelo CPF limpo antes da validação
        $request->merge([
            'cpf' => $cpf,
        ]);

        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'size:11'],
            'data_nascimento' => ['required', 'date'],
            'email' => ['nullable', 'email', 'max:255'],
            'valor' => ['required', 'numeric', 'min:0'],
        ]);

        $valor = $dados['valor'];

        $resultado = DB::transaction(function () use ($dados, $cpf, $valor) {

            $associado = Associado::where('cpf', $cpf)
                ->lockForUpdate()
                ->first();

            if ($associado) {

                // Não permite inscrição manual de associado ainda vigente
                if ($associado->associacaoVigente()) {
                    abort(422, 'Este associado possui uma associação vigente.');
                }

                // Renovação
                $associado->update([
                    'nome' => $dados['nome'],
                    'data_nascimento' => $dados['data_nascimento'],
                    'email' => $dados['email'] ?? $associado->email,
                ]);

                $tipo = 'Renovação';

            } else {

                // Novo associado
                $numero = (Associado::lockForUpdate()->max('numero') ?? 0) + 1;

                $associado = Associado::create([
                    'numero' => $numero,
                    'nome' => $dados['nome'],
                    'cpf' => $cpf,
                    'data_nascimento' => $dados['data_nascimento'],
                    'email' => $dados['email'] ?? null,
                ]);

                $tipo = 'Nova associação';
            }

            // Cria a associação diretamente como ativa
            $associacao = Associacao::create([
                'associado_id' => $associado->id,
                'data_inicio' => today(),
                'data_fim' => today()->addYear(),
                'valor' => $valor,
                'status' => 'ativa',
                'codigo_validacao' => Str::random(64),
            ]);

            return [
                'associado' => $associado,
                'associacao' => $associacao,
                'tipo' => $tipo,
            ];
        });

        return redirect()
            ->route(
                'admin.inscricoes-manual.sucesso',
                $resultado['associacao']->id
            );
    }

    public function sucesso(Associacao $associacao)
    {
        $associacao->load('associado');

        return view(
            'admin.inscricoes-manual.sucesso',
            compact('associacao')
        );
    }
}
