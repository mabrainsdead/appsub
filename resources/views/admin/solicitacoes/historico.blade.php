<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Histórico - APPS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
            color: #222;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .cabecalho {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        .voltar {
            text-decoration: none;
            color: #333;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            white-space: nowrap;
        }

        th {
            background: #f7f7f7;
            font-size: 14px;
        }

        td {
            font-size: 14px;
        }

        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
        }

        .aprovada {
            background: #e6f4ea;
            color: #137333;
        }

        .recusada {
            background: #fce8e6;
            color: #c5221f;
        }

        .vazio {
            text-align: center;
            padding: 30px;
            color: #666;
        }

        .acoes form {
            display: inline;
        }

        .acoes button {
            border: 0;
            background: none;
            padding: 0;
            color: #b02a37;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        .acoes button:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="cabecalho">
        <h1>Histórico de solicitações</h1>

        <a href="{{ route('admin.solicitacoes.index') }}" class="voltar">
            ← Solicitações pendentes
        </a>
    </div>

    <div class="card">

        @if($solicitacoes->isEmpty())

            <div class="vazio">
                Nenhuma solicitação no histórico.
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
                    <th>Data da decisão</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>

                @foreach($solicitacoes as $solicitacao)

                    <tr>

                        <td>
                            {{ $solicitacao->created_at->format('d/m/Y H:i') }}
                        </td>

                        <td>
                            {{ $solicitacao->nome }}
                        </td>

                        <td>
                            {{ substr($solicitacao->cpf, 0, 3) }}
                            .***.***-**
                        </td>

                        <td>
                            @if($solicitacao->tipo === 'nova_associacao')
                                Nova associação
                            @else
                                Renovação
                            @endif
                        </td>

                        <td>
                            R$ {{ number_format($solicitacao->valor, 2, ',', '.') }}
                        </td>

                        <td>

                            @if($solicitacao->status === 'aprovada')

                                <span class="status aprovada">
                                    Aprovada
                                </span>

                            @elseif($solicitacao->status === 'recusada')

                                <span class="status recusada">
                                    Recusada
                                </span>

                            @endif

                        </td>

                        <td>

                            @if($solicitacao->status === 'aprovada' && $solicitacao->aprovado_em)

                                {{ $solicitacao->aprovado_em->format('d/m/Y H:i') }}

                            @elseif($solicitacao->status === 'recusada' && $solicitacao->recusado_em)

                                {{ $solicitacao->recusado_em->format('d/m/Y H:i') }}

                            @else

                                —

                            @endif

                        </td>

                        <td class="acoes">

                            @if (in_array($solicitacao->status, ['aprovada', 'recusada']))

                                <form
                                    method="POST"
                                    action="{{ route('admin.solicitacoes.excluir', $solicitacao) }}"
                                    onsubmit="return confirm('Excluir definitivamente esta solicitação?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">
                                        Excluir
                                    </button>
                                </form>

                            @endif

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        @endif

    </div>

</div>

</body>
</html>
