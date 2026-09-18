<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Associação aprovada</title>
</head>

<body
    style="
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        font-family: Arial, Helvetica, sans-serif;
    "
>

<div
    style="
        max-width: 600px;
        margin: 30px auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 8px;
    "
>

    <h2 style="color: #123b6d; margin-top: 0;">
        APPS
    </h2>

    <h3 style="font-size: 20px;">
        Sua associação foi aprovada!
    </h3>

    <p>
        Olá, {{ $associacao->associado->nome }}.
    </p>

    <p>
        Sua associação à Associação Paulista de Pesca Submarina
        foi aprovada com sucesso.
    </p>

    <div
        style="
            margin: 25px 0;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 6px;
        "
    >

        <p style="margin: 0 0 10px 0;">
            <strong>Associado nº:</strong>
            {{ str_pad(
                $associacao->associado->numero,
                4,
                '0',
                STR_PAD_LEFT
            ) }}
        </p>

        <p style="margin: 0;">
            <strong>Validade:</strong>
            {{ $associacao->data_inicio->format('d/m/Y') }}
            a
            {{ $associacao->data_fim->format('d/m/Y') }}
        </p>

    </div>

    <p>
        Sua carteirinha já está disponível.
    </p>

    <div style="margin: 30px 0;">

        <a
            href="{{ route('carteirinha', [
                'codigo' => $associacao->codigo_validacao
            ]) }}"
            style="
                display: inline-block;
                padding: 14px 24px;
                background-color: #198754;
                color: #ffffff;
                text-decoration: none;
                font-weight: bold;
                border-radius: 5px;
                font-size: 16px;
            "
        >
            IMPRIMIR MINHA CARTEIRINHA
        </a>

    </div>

    <p style="font-size: 13px; color: #777777;">
        Guarde este e-mail. Você poderá utilizar este botão
        para acessar sua carteirinha novamente.
    </p>

    <p style="font-size: 13px; color: #777777;">
        Associação Paulista de Pesca Submarina
    </p>

</div>

</body>
</html>
