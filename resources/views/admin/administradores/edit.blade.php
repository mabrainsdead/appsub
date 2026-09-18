<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar administrador - APPS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f4f4;
            font-family: Arial, Helvetica, sans-serif;
            color: #222;
        }

        .topo {
            background: #123b6d;
            color: #ffffff;
            padding: 20px 30px;
        }

        .topo h2 {
            margin: 0;
        }

        .conteudo {
            max-width: 650px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .cabecalho {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .cabecalho h1 {
            margin: 0;
        }

        .voltar {
            color: #123b6d;
            text-decoration: none;
        }

        .card {
            background: #ffffff;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .campo {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        .ajuda {
            margin-top: 5px;
            font-size: 13px;
            color: #666;
        }

        .erro {
            color: #b00020;
            font-size: 13px;
            margin-top: 5px;
        }

        .botoes {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        button,
        .cancelar {
            padding: 11px 20px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }

        button {
            background: #123b6d;
            color: #ffffff;
            border: none;
        }

        .cancelar {
            background: #eeeeee;
            color: #333;
        }
    </style>
</head>

<body>

<header class="topo">
    <h2>APPS — Administração</h2>
</header>

<main class="conteudo">

    <div class="cabecalho">

        <h1>Editar administrador</h1>

        <a
            href="{{ route('admin.administradores.index') }}"
            class="voltar"
        >
            ← Voltar
        </a>

    </div>

    <div class="card">

        <form
            method="POST"
            action="{{ route('admin.administradores.update', $administrador) }}"
        >

            @csrf
            @method('PUT')

            <div class="campo">

                <label for="name">
                    Nome
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $administrador->name) }}"
                    required
                >

                @error('name')
                <div class="erro">{{ $message }}</div>
                @enderror

            </div>

            <div class="campo">

                <label for="email">
                    E-mail
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $administrador->email) }}"
                    required
                >

                @error('email')
                <div class="erro">{{ $message }}</div>
                @enderror

            </div>

            <div class="campo">

                <label for="password">
                    Nova senha
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                >

                <div class="ajuda">
                    Deixe em branco para manter a senha atual.
                    Mínimo de 8 caracteres.
                </div>

                @error('password')
                <div class="erro">{{ $message }}</div>
                @enderror

            </div>

            <div class="campo">

                <label for="password_confirmation">
                    Confirmar nova senha
                </label>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                >

            </div>

            <div class="botoes">

                <button type="submit">
                    SALVAR ALTERAÇÕES
                </button>

                <a
                    href="{{ route('admin.administradores.index') }}"
                    class="cancelar"
                >
                    CANCELAR
                </a>

            </div>

        </form>

    </div>

</main>

</body>
</html>
