<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar associado - APPS</title>

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
            max-width: 700px;
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

        .card {
            background: #ffffff;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .campo {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        input[readonly] {
            background: #eeeeee;
        }

        .cpf-info {
            color: #666;
            font-size: 13px;
            margin-top: 5px;
        }

        .erro {
            color: #b00020;
            font-size: 13px;
            margin-top: 5px;
        }

        .botoes {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        button,
        .cancelar {
            padding: 10px 18px;
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
        <h1>Editar associado</h1>
    </div>

    <div class="card">

        <form
            method="POST"
            action="{{ route('admin.associados.update', $associado) }}"
        >

            @csrf
            @method('PUT')

            <div class="campo">
                <label>Número</label>

                <input
                    type="text"
                    value="{{ $associado->numero }}"
                    readonly
                >
            </div>

            <div class="campo">
                <label>CPF</label>

                <input
                    type="text"
                    value="{{ $associado->cpf }}"
                    readonly
                >

                <div class="cpf-info">
                    O CPF não pode ser alterado.
                </div>
            </div>

            <div class="campo">
                <label for="nome">Nome</label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    value="{{ old('nome', $associado->nome) }}"
                    required
                >

                @error('nome')
                <div class="erro">{{ $message }}</div>
                @enderror
            </div>

            <div class="campo">
                <label for="data_nascimento">
                    Data de nascimento
                </label>

                <input
                    type="date"
                    id="data_nascimento"
                    name="data_nascimento"
                    value="{{ old('data_nascimento', $associado->data_nascimento?->format('Y-m-d')) }}"
                    required
                >

                @error('data_nascimento')
                <div class="erro">{{ $message }}</div>
                @enderror
            </div>

            <div class="campo">
                <label for="email">E-mail</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email', $associado->email) }}"
                    required
                >

                @error('email')
                <div class="erro">{{ $message }}</div>
                @enderror
            </div>

            <div class="botoes">

                <button type="submit">
                    SALVAR
                </button>

                <a
                    href="{{ route('admin.associados.show', $associado) }}"
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
