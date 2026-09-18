<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Novo campeonato - APPS</title>

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
            max-width: 750px;
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

        input,
        textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
        }

        textarea {
            min-height: 140px;
            resize: vertical;
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

        .linha {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
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

        @media (max-width: 600px) {
            .linha {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<header class="topo">
    <h2>APPS — Administração</h2>
</header>

<main class="conteudo">

    <div class="cabecalho">

        <h1>Novo campeonato</h1>

        <a
            href="{{ route('admin.campeonatos.index') }}"
            class="voltar"
        >
            ← Voltar
        </a>

    </div>

    <div class="card">

        <form
            method="POST"
            action="{{ route('admin.campeonatos.store') }}"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="campo">

                <label for="nome">
                    Nome do campeonato
                </label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    value="{{ old('nome') }}"
                    required
                >

                @error('nome')
                <div class="erro">{{ $message }}</div>
                @enderror

            </div>

            <div class="campo">

                <label for="ano">
                    Ano
                </label>

                <input
                    type="number"
                    id="ano"
                    name="ano"
                    value="{{ old('ano', date('Y')) }}"
                    min="2020"
                    max="2100"
                    required
                >

                @error('ano')
                <div class="erro">{{ $message }}</div>
                @enderror

            </div>

            <div class="linha">

                <div class="campo">

                    <label for="data_inicio">
                        Data de início
                    </label>

                    <input
                        type="date"
                        id="data_inicio"
                        name="data_inicio"
                        value="{{ old('data_inicio') }}"
                    >

                    @error('data_inicio')
                    <div class="erro">{{ $message }}</div>
                    @enderror

                </div>

                <div class="campo">

                    <label for="data_fim">
                        Data de término
                    </label>

                    <input
                        type="date"
                        id="data_fim"
                        name="data_fim"
                        value="{{ old('data_fim') }}"
                    >

                    @error('data_fim')
                    <div class="erro">{{ $message }}</div>
                    @enderror

                </div>

            </div>

            <div class="campo">

                <label for="valor">
                    Valor da inscrição
                </label>

                <input
                    type="number"
                    id="valor"
                    name="valor"
                    value="{{ old('valor') }}"
                    min="0"
                    step="0.01"
                    required
                >

                @error('valor')
                <div class="erro">{{ $message }}</div>
                @enderror

            </div>

            <div class="campo">

                <label for="descricao">
                    Descrição
                </label>

                <textarea
                    id="descricao"
                    name="descricao"
                >{{ old('descricao') }}</textarea>

                @error('descricao')
                <div class="erro">{{ $message }}</div>
                @enderror

            </div>

            <div class="campo">

                <label for="edital">
                    Edital em PDF
                </label>

                <input
                    type="file"
                    id="edital"
                    name="edital"
                    accept="application/pdf"
                >

                <div class="ajuda">
                    Opcional. Tamanho máximo: 10 MB.
                </div>

                @error('edital')
                <div class="erro">{{ $message }}</div>
                @enderror

            </div>

            <div class="botoes">

                <button type="submit">
                    CRIAR CAMPEONATO
                </button>

                <a
                    href="{{ route('admin.campeonatos.index') }}"
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
