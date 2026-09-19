<?php

namespace App\Http\Controllers;

use App\Models\Configuracao;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConfiguracaoController extends Controller
{
    public function edit(): View
    {
        $configuracoes = Configuracao::whereIn('chave', [
            'valor_associacao',
            'chave_pix',
            'nome_pix',
            'email_aprovacao',
        ])
            ->pluck('valor', 'chave');

        return view('admin.configuracoes.edit', [
            'configuracoes' => $configuracoes,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $dados = $request->validate([
            'valor_associacao' => ['required', 'numeric', 'min:0'],
            'chave_pix' => ['required', 'string', 'max:255'],
            'nome_pix' => ['required', 'string', 'max:255'],
            'email_aprovacao' => ['required', 'email', 'max:255'],
        ]);
        \Log::info('CONFIGURAÇÕES RECEBIDAS', $dados);
        foreach ($dados as $chave => $valor) {
            Configuracao::updateOrCreate(
                ['chave' => $chave],
                ['valor' => $valor]
            );
        }

        return redirect()
            ->route('admin.configuracoes.edit')
            ->with('sucesso', 'Configurações atualizadas com sucesso.');
    }
}
