<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminPasswordResetController extends Controller
{
    public function request(): View
    {
        return view('admin.password.forgot');
    }

    public function email(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with('sucesso', 'Enviamos um link para redefinir sua senha.')
            : back()->withErrors([
                'email' => __($status),
            ]);
    }

    public function resetForm(string $token): View
    {
        return view('admin.password.reset', [
            'token' => $token,
            'email' => request()->query('email'),
        ]);
    }

    public function reset(Request $request): RedirectResponse
    {
        $dados = $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $status = Password::reset(
            $dados,
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password,
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()
                ->route('admin.login')
                ->with('sucesso', 'Senha redefinida com sucesso. Faça login.')
            : back()->withErrors([
                'email' => __($status),
            ]);
    }
}
