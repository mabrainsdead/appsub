<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Solicitações - APPS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f4f4;
            font-family: Arial, Helvetica, sans-serif;
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
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .voltar {
            display: inline-block;
            margin-bottom: 20px;
            color: #123b6d;
            text-decoration: none;
            font-weight: bold;
        }

        .tabela-container {
            background: #ffffff;
            border-radius: 8px;
            overflow-x: auto;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #eeeeee;
        }

        th {
            background: #f7f7f7;
            color: #123b6d;
        }

        tr:last-child td {
            border-bottom: 0;
        }

        .status {
            font-weight: bold;
        }

        .pendente {
            color: #b36b00;
        }

        .enviado {
            color: #0066cc;
        }

        .aprovada {
            color: #198754;
        }

        .recusada {
            color: #b02a37;
        }

        .acoes a {
            display: inline-block;
            margin-right: 8px;
            margin-bottom: 4px;
            padding: 7px 10px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .comprovante {
            background: #e9ecef;
            color: #333333;
        }

        .aprovar {
            background: #198754;
            color: #ffffff;
        }

        .recusar {
            background: #dc3545;
            color: #ffffff;
        }

        .vazio {
            padding: 30px;
            text-align: center;
            color: #777777;
        }
    </style>
</head>

<body>

<header class="topo">
    <h2>APPS — Solicitações</h2>
</header>

<main class="conteudo">

    <a href="{{ route('admin.index') }}" class="voltar">
        ← Voltar ao painel
    </a>

    <div class="tabela-container">

        @if ($solicitacoes->isEmpty())

            <div class="vazio">
                Nenhuma solicitação encontrada.
            </div>

        @else

            <table>

                <thead>
                <tr>
                    <th>Data</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>

                @foreach ($solicitacoes as $solicitacao)

                    <tr>

                        <td>
                            {{ $solicitacao->created_at->format('d/m/Y H:i') }}
                        </td>

                        <td>
                            {{ $solicitacao->nome }}
                        </td>

                        <td>
                            {{ $solicitacao->cpf }}
                        </td>

                        <td>
                            {{ $solicitacao->tipo === 'nova_associacao'
                                ? 'Nova associação'
                                : 'Renovação' }}
                        </td>

                        <td>
                            R$ {{ number_format($solicitacao->valor, 2, ',', '.') }}
                        </td>

                        <td class="status {{ $solicitacao->status === 'comprovante_enviado'
                            ? 'enviado'
                            : $solicitacao->status }}">

                            @switch($solicitacao->status)

                                @case('pendente')
                                    Pendente
                                    @break

                                @case('comprovante_enviado')
                                    Comprovante enviado
                                    @break

                                @case('aprovada')
                                    Aprovada
                                    @break

                                @case('recusada')
                                    Recusada
                                    @break

                            @endswitch

                        </td>

                        <td class="acoes">

                            @if ($solicitacao->comprovante)

                                <a
                                    href="{{ route('admin.solicitacoes.comprovante', ['token' => $solicitacao->token]) }}"
                                    class="comprovante"
                                    target="_blank"
                                >
                                    Comprovante
                                </a>

                            @endif

                            @if ($solicitacao->status === 'comprovante_enviado')

                                <a
                                    href="{{ route('admin.solicitacoes.confirmar-aprovacao', ['token' => $solicitacao->token]) }}"
                                    class="aprovar"
                                >
                                    Aprovar
                                </a>

                                <a
                                    href="{{ route('admin.solicitacoes.confirmar-recusar', ['token' => $solicitacao->token]) }}"
                                    class="recusar"
                                >
                                    Recusar
                                </a>

                            @endif

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        @endif

    </div>

</main>

</body>
</html>
