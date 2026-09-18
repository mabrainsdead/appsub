<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Solicitação de associação</title>
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

    <h3>
        Solicitação não aprovada
    </h3>

    <p>
        Olá, {{ $solicitacao->nome }}.
    </p>

    <p>
        Informamos que sua solicitação de associação à
        Associação Paulista de Pesca Submarina não pôde ser aprovada.
    </p>

    <p>
        Caso tenha alguma dúvida ou precise de mais informações,
        entre em contato com a APPS.
    </p>

    <p style="margin-top: 30px;">
        Atenciosamente,<br>
        <strong>Associação Paulista de Pesca Submarina</strong>
    </p>

</div>

</body>
</html>
