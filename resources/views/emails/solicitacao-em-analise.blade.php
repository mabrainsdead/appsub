<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Solicitação em análise</title>
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

    <h2 style="color: #123b6d;">
        APPS
    </h2>

    <h3>
        Sua solicitação está em análise
    </h3>

    <p>
        Olá, {{ $solicitacao->nome }}.
    </p>

    <p>
        Recebemos sua solicitação de associação à
        Associação Paulista de Pesca Submarina.
    </p>

    <p>
        Seu comprovante de pagamento também foi recebido
        e sua solicitação está agora em análise.
    </p>

    <p>
        Após a análise, você receberá um novo e-mail
        informando o resultado da solicitação.
    </p>

    <p style="margin-top: 30px;">
        <strong>
            Não é necessário responder a este e-mail.
        </strong>
    </p>

    <p style="color: #777777; font-size: 13px;">
        Associação Paulista de Pesca Submarina
    </p>

</div>

</body>
</html>
