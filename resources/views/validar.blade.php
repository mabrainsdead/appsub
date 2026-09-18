<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Validação de Associado - APPS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 30px 15px;
        }

        .card {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.10);
        }

        h1 {
            margin-top: 0;
            text-align: center;
        }

        .situacao {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin: 25px 0;
        }

        .ativa {
            color: #198754;
        }

        .inativa {
            color: #dc3545;
        }

        .dados {
            line-height: 1.8;
        }

        .rodape {
            margin-top: 30px;
            text-align: center;
            font-size: 13px;
            color: #777;
        }
    </style>
</head>

<body>

<div class="card">

    <h1>APPS</h1>

    <div class="situacao {{ $ativa ? 'ativa' : 'inativa' }}">
        {{ $ativa ? 'ASSOCIAÇÃO ATIVA' : 'ASSOCIAÇÃO INATIVA' }}
    </div>

    <div class="dados">

        <strong>Associado nº:</strong>
        {{ $associacao->associado->numero }}

        <br>

        <strong>Nome:</strong>
        {{ $associacao->associado->nome }}

        <br>

        <strong>Validade:</strong>
        {{ $associacao->data_inicio->format('d/m/Y') }}
        a
        {{ $associacao->data_fim->format('d/m/Y') }}

    </div>

    <div class="rodape">
        Associação de Pesca Submarina de São Paulo
    </div>

</div>

</body>
</html>
