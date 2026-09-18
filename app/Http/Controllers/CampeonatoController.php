<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CampeonatoController extends Controller
{
    public function index(): View
    {
        $campeonatos = Campeonato::orderByDesc('ano')
            ->orderByDesc('id')
            ->get();

        return view('admin.campeonatos.index', [
            'campeonatos' => $campeonatos,
        ]);
    }

    public function create(): View
    {
        return view('admin.campeonatos.create');
    }
    public function alternarAtivo(Campeonato $campeonato): RedirectResponse
    {
        if (!$campeonato->ativo) {

            Campeonato::where('ativo', true)
                ->where('id', '!=', $campeonato->id)
                ->update([
                    'ativo' => false,
                ]);

            $campeonato->update([
                'ativo' => true,
            ]);

            $mensagem = 'Campeonato ativado com sucesso.';

        } else {

            $campeonato->update([
                'ativo' => false,
            ]);

            $mensagem = 'Campeonato desativado com sucesso.';
        }

        return redirect()
            ->route('admin.campeonatos.index')
            ->with('sucesso', $mensagem);
    }

    public function store(Request $request): RedirectResponse
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'ano' => ['required', 'integer', 'min:2020', 'max:2100'],
            'data_inicio' => ['nullable', 'date'],
            'data_fim' => ['nullable', 'date', 'after_or_equal:data_inicio'],
            'valor' => ['required', 'numeric', 'min:0'],
            'edital' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
        ]);

        if ($request->hasFile('edital')) {
            $dados['edital'] = $request->file('edital')
                ->store('editais', 'local');
        }

        $dados['ativo'] = false;

        Campeonato::create($dados);

        return redirect()
            ->route('admin.campeonatos.index')
            ->with('sucesso', 'Campeonato criado com sucesso.');
    }
    public function edit(Campeonato $campeonato): View
    {
        return view('admin.campeonatos.edit', [
            'campeonato' => $campeonato,
        ]);
    }

    public function update(
        Request $request,
        Campeonato $campeonato
    ): RedirectResponse {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'descricao' => ['nullable', 'string'],
            'ano' => ['required', 'integer', 'min:2020', 'max:2100'],
            'data_inicio' => ['nullable', 'date'],
            'data_fim' => ['nullable', 'date', 'after_or_equal:data_inicio'],
            'valor' => ['required', 'numeric', 'min:0'],
            'edital' => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
        ]);

        if ($request->hasFile('edital')) {
            $dados['edital'] = $request->file('edital')
                ->store('editais', 'local');
        }

        $campeonato->update($dados);

        return redirect()
            ->route('admin.campeonatos.index')
            ->with('sucesso', 'Campeonato atualizado com sucesso.');
    }
}
