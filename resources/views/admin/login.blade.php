<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login administrativo - APPS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f4f4f4;
            font-family: Arial, Helvetica, sans-serif;
        }

        .login {
            width: 100%;
            max-width: 400px;
            background: #ffffff;
            padding: 35px;
            border-radius: 8px;
            box-shadow: 0 3px 15px rgba(0,0,0,.12);
        }

        h2 {
            margin-top: 0;
            color: #123b6d;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: 0;
            border-radius: 5px;
            background: #123b6d;
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .erro {
            margin-bottom: 18px;
            color: #b02a37;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="login">

    <h2>APPS</h2>

    <p>Área administrativa</p>

    @if ($errors->any())
        <div class="erro">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.autenticar') }}">
        @csrf

        <label for="email">E-mail</label>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
            autofocus
        >

        <label for="password">Senha</label>

        <input
            type="password"
            id="password"
            name="password"
            required
        >

        <button type="submit">
            ENTRAR
        </button>
        <a href="{{ route('admin.password.request') }}">
            Esqueci minha senha
        </a>
    </form>


</div>

</body>
</html>
