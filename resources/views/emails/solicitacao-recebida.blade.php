<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova solicitação - APPS</title>
</head>

<body>

<h2>Nova solicitação de associação</h2>

<p>
    Uma nova solicitação foi recebida e o comprovante foi enviado.
</p>

<p>
    <strong>Solicitação:</strong>
    nº {{ $solicitacao->id }}
</p>

<p>
    <strong>Tipo:</strong>
    {{ $solicitacao->tipo === 'nova_associacao'
        ? 'Nova associação'
        : 'Renovação' }}
</p>

<p>
    <strong>Valor:</strong>
    R$ {{ number_format($solicitacao->valor, 2, ',', '.') }}
</p>

@if ($solicitacao->associado)
    <p>
        <strong>Associado:</strong>
        {{ $solicitacao->associado->nome }}
    </p>
@endif

<p>
    <strong>Status:</strong>
    {{ $solicitacao->status }}
</p>

<hr>

<p>
    O comprovante foi recebido pelo sistema.
</p>

</body>
</html>
