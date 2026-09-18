<?php

namespace App\Http\Controllers;

use App\Models\Associado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssociadoController extends Controller
{
    public function index(Request $request): View
    {
        $busca = $request->input('busca');

        $associados = Associado::query()
            ->when($busca, function ($query, $busca) {
                $cpf = preg_replace('/\D/', '', $busca);

                $query->where(function ($query) use ($busca, $cpf) {
                    $query->where('nome', 'like', "%{$busca}%")
                        ->orWhere('numero', $busca);

                    if ($cpf !== '') {
                        $query->orWhere('cpf', 'like', "%{$cpf}%");
                    }
                });
            })
            ->orderBy('numero')
            ->get();

        return view('admin.associados.index', [
            'associados' => $associados,
            'busca' => $busca,
        ]);
    }

    public function show(Associado $associado): View
    {
        $associado->load([
            'associacoes' => function ($query) {
                $query->orderByDesc('data_inicio');
            },
        ]);

        return view('admin.associados.show', [
            'associado' => $associado,
        ]);
    }
    public function edit(Associado $associado): View
    {
        return view('admin.associados.edit', [
            'associado' => $associado,
        ]);
    }

    public function update(Request $request, Associado $associado): RedirectResponse
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'data_nascimento' => ['required', 'date'],
            'email' => ['required', 'email', 'max:255'],
        ]);

        $associado->update($dados);

        return redirect()
            ->route('admin.associados.show', $associado)
            ->with('sucesso', 'Cadastro atualizado com sucesso.');
    }
}
