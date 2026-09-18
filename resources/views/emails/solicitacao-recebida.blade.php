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
    <strong>Nome:</strong>
    {{ $solicitacao->nome }}
</p>

<p>
    <strong>CPF:</strong>
    {{ $solicitacao->cpf }}
</p>

<p>
    <strong>Data de nascimento:</strong>
    {{ $solicitacao->data_nascimento?->format('d/m/Y') }}
</p>

<p>
    <strong>E-mail:</strong>
    {{ $solicitacao->email }}
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

<p>
    <strong>Status:</strong>
    {{ $solicitacao->status }}
</p>




<h3>Ações administrativas</h3>

<table cellpadding="0" cellspacing="0" border="0">
    <tr>
        <td style="padding: 0 8px 8px 0;">
            <a
                href="{{ route('admin.solicitacoes.comprovante', ['token' => $solicitacao->token]) }}"
                style="
                    display: inline-block;
                    padding: 12px 20px;
                    background-color: #555555;
                    color: #ffffff;
                    text-decoration: none;
                    font-weight: bold;
                    border-radius: 5px;
                "
            >
                VER COMPROVANTE
            </a>
        </td>
    </tr>

    <tr>
        <td style="padding: 0 8px 8px 0;">
            <a
                href="{{ route('admin.solicitacoes.confirmar-aprovacao', ['token' => $solicitacao->token]) }}"
                style="
                    display: inline-block;
                    padding: 12px 20px;
                    background-color: #198754;
                    color: #ffffff;
                    text-decoration: none;
                    font-weight: bold;
                    border-radius: 5px;
                "
            >
                APROVAR SOLICITAÇÃO
            </a>
        </td>
    </tr>

    <tr>
        <td>
            <a
                href="{{ route('admin.solicitacoes.confirmar-recusar', ['token' => $solicitacao->token]) }}"
                style="
                    display: inline-block;
                    padding: 12px 20px;
                    background-color: #dc3545;
                    color: #ffffff;
                    text-decoration: none;
                    font-weight: bold;
                    border-radius: 5px;
                "
            >
                RECUSAR SOLICITAÇÃO
            </a>
        </td>
    </tr>
</table>

<hr>

<p>
    O comprovante foi recebido pelo sistema.
</p>

</body>
</html>
