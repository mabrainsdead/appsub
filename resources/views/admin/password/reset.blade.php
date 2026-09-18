<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova senha — APPS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 420px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
        }

        h1 {
            margin-top: 0;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 11px;
            border: 0;
            border-radius: 4px;
            background: #222;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .erro {
            color: #b00020;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>APPS</h1>

    <p>Definir nova senha</p>

    @if ($errors->any())
        <div class="erro">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <label for="email">E-mail</label>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', $email) }}"
            required
            autofocus
        >

        <label for="password">Nova senha</label>

        <input
            type="password"
            id="password"
            name="password"
            required
            minlength="8"
        >

        <label for="password_confirmation">
            Confirmar nova senha
        </label>

        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            required
            minlength="8"
        >

        <button type="submit">
            REDEFINIR SENHA
        </button>
    </form>

</div>

</body>
</html>
