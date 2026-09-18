<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Recuperar senha — APPS</title>

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

        .sucesso {
            background: #e7f6e7;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .erro {
            color: #b00020;
            margin-bottom: 15px;
        }

        .voltar {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #333;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>APPS</h1>

    <p>Recuperar senha do administrador</p>

    @if (session('sucesso'))
        <div class="sucesso">
            {{ session('sucesso') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="erro">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.password.email') }}">
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

        <button type="submit">
            ENVIAR LINK DE RECUPERAÇÃO
        </button>
    </form>

    <a class="voltar" href="{{ route('admin.login') }}">
        Voltar para o login
    </a>

</div>

</body>
</html>
