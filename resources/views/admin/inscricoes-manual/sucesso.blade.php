<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscrição realizada - APPS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f5f7;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 18px rgba(0,0,0,.08);
        }

        .sucesso {
            color: #16733a;
        }

        .botao {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            border-radius: 6px;
            background: #0b5d7a;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1 class="sucesso">Inscrição realizada</h1>

        <p>
            A associação foi registrada com sucesso.
        </p>

        <p>
            <strong>Associado nº:</strong>
            {{ $associacao->associado->numero }}
        </p>

        <p>
            <strong>Nome:</strong>
            {{ $associacao->associado->nome }}
        </p>

        <p>
            <strong>Início:</strong>
            {{ $associacao->data_inicio->format('d/m/Y') }}
        </p>

        <p>
            <strong>Validade:</strong>
            {{ $associacao->data_fim->format('d/m/Y') }}
        </p>

        <p>
            <strong>Valor:</strong>
            R$ {{ number_format($associacao->valor, 2, ',', '.') }}
        </p>

        <a href="{{ route('carteirinha', $associacao->codigo_validacao) }}"
           target="_blank"
           class="botao">
            Ver carteirinha
        </a>

        <br>

        <a href="{{ route('admin.inscricoes-manual.create') }}">
            Nova inscrição manual
        </a>

        <br>

        <a href="{{ route('admin.index') }}">
            Voltar ao painel administrativo
        </a>

    </div>

</div>

</body>
</html>
