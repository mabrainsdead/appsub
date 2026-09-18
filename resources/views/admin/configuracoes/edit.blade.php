<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Configurações - APPS</title>

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

        .ajuda {
            margin-top: 5px;
            font-size: 13px;
            color: #666;
        }

        input {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        .sucesso {
            background: #e6f4ea;
            color: #137333;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .erro {
            color: #b00020;
            font-size: 13px;
            margin-top: 5px;
        }

        .botoes {
            margin-top: 25px;
        }

        button {
            background: #123b6d;
            color: #ffffff;
            border: none;
            padding: 11px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
    </style>
</head>

<body>

<header class="topo">
    <h2>APPS — Administração</h2>
</header>

<main class="conteudo">

    <div class="cabecalho">

        <h1>Configurações</h1>

        <a
            href="{{ route('admin.index') }}"
            class="voltar"
        >
            ← Voltar ao painel
        </a>

    </div>

    <div class="card">

        @if(session('sucesso'))

            <div class="sucesso">
                {{ session('sucesso') }}
            </div>

        @endif

        <form
            method="POST"
            action="{{ route('admin.configuracoes.update') }}"
        >

            @csrf
            @method('PUT')

            <div class="campo">

                <label for="valor_associacao">
                    Valor da associação
                </label>

                <input
                    type="number"
                    id="valor_associacao"
                    name="valor_associacao"
                    value="{{ old('valor_associacao', $configuracoes['valor_associacao'] ?? '') }}"
                    min="0"
                    step="0.01"
                    required
                >

                <div class="ajuda">
                    Valor cobrado na associação ou renovação.
                </div>

                @error('valor_associacao')
                <div class="erro">{{ $message }}</div>
                @enderror

            </div>

            <div class="campo">

                <label for="chave_pix">
                    Chave PIX
                </label>

                <input
                    type="text"
                    id="chave_pix"
                    name="chave_pix"
                    value="{{ old('chave_pix', $configuracoes['chave_pix'] ?? '') }}"
                    required
                >

                @error('chave_pix')
                <div class="erro">{{ $message }}</div>
                @enderror

            </div>

            <div class="campo">

                <label for="nome_pix">
                    Nome do recebedor PIX
                </label>

                <input
                    type="text"
                    id="nome_pix"
                    name="nome_pix"
                    value="{{ old('nome_pix', $configuracoes['nome_pix'] ?? '') }}"
                    required
                >

                @error('nome_pix')
                <div class="erro">{{ $message }}</div>
                @enderror

            </div>

            <div class="botoes">

                <button type="submit">
                    SALVAR CONFIGURAÇÕES
                </button>

            </div>

        </form>

    </div>

</main>

</body>
</html>
