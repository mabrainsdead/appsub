<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdministradorController extends Controller
{
    public function index(): View
    {
        $administradores = User::orderBy('name')->get();

        return view('admin.administradores.index', [
            'administradores' => $administradores,
        ]);
    }

    public function create(): View
    {
        return view('admin.administradores.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $dados = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        User::create([
            'name' => $dados['name'],
            'email' => $dados['email'],
            'password' => Hash::make($dados['password']),
        ]);

        return redirect()
            ->route('admin.administradores.index')
            ->with('sucesso', 'Administrador criado com sucesso.');
    }
    public function edit(User $administrador): View
    {
        return view('admin.administradores.edit', [
            'administrador' => $administrador,
        ]);
    }

    public function update(
        Request $request,
        User $administrador
    ): RedirectResponse {
        $dados = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . $administrador->id,
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $administrador->name = $dados['name'];
        $administrador->email = $dados['email'];

        if (!empty($dados['password'])) {
            $administrador->password = Hash::make($dados['password']);
        }

        $administrador->save();

        return redirect()
            ->route('admin.administradores.index')
            ->with('sucesso', 'Administrador atualizado com sucesso.');
    }
}
