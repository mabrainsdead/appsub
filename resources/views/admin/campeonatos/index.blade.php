<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campeonatos - APPS</title>

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
            max-width: 1100px;
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

        .novo {
            display: inline-block;
            background: #123b6d;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 5px;
        }

        .sucesso {
            background: #e6f4ea;
            color: #137333;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .tabela {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            white-space: nowrap;
        }

        th {
            background: #f7f7f7;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .ativo {
            color: #137333;
            font-weight: bold;
        }

        .inativo {
            color: #666;
        }

        .editar {
            color: #123b6d;
            text-decoration: none;
        }

        .vazio {
            padding: 30px;
            text-align: center;
            color: #666;
        }
    </style>
</head>

<body>

<header class="topo">
    <h2>APPS — Administração</h2>
</header>

<main class="conteudo">

    <div class="cabecalho">

        <h1>Campeonatos</h1>

        <a
            href="{{ route('admin.index') }}"
            class="voltar"
        >
            ← Voltar ao painel
        </a>

    </div>

    @if(session('sucesso'))

        <div class="sucesso">
            {{ session('sucesso') }}
        </div>

    @endif

    <div style="margin-bottom: 20px;">

        <a
            href="{{ route('admin.campeonatos.create') }}"
            class="novo"
        >
            + NOVO CAMPEONATO
        </a>

    </div>

    <div class="tabela">

        @if($campeonatos->isEmpty())

            <div class="vazio">
                Nenhum campeonato cadastrado.
            </div>

        @else

            <table>

                <thead>
                <tr>
                    <th>Ano</th>
                    <th>Nome</th>
                    <th>Período</th>
                    <th>Valor</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>

                @foreach($campeonatos as $campeonato)

                    <tr>

                        <td>
                            {{ $campeonato->ano }}
                        </td>

                        <td>
                            {{ $campeonato->nome }}
                        </td>

                        <td>

                            @if($campeonato->data_inicio)

                                {{ $campeonato->data_inicio->format('d/m/Y') }}

                                @if($campeonato->data_fim)
                                    até {{ $campeonato->data_fim->format('d/m/Y') }}
                                @endif

                            @else

                                —

                            @endif

                        </td>

                        <td>
                            R$ {{ number_format($campeonato->valor, 2, ',', '.') }}
                        </td>

                        <td>

                            @if($campeonato->ativo)

                                <span class="ativo">
                                    ATIVO
                                </span>

                            @else

                                <span class="inativo">
                                    Inativo
                                </span>

                            @endif

                        </td>

                        <td>

                            <a
                                href="{{ route('admin.campeonatos.edit', $campeonato) }}"
                                class="editar"
                            >
                                Editar
                            </a>

                            <form
                                method="POST"
                                action="{{ route('admin.campeonatos.alternar-ativo', $campeonato) }}"
                                style="display: inline;"
                            >

                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    style="
                margin-left: 10px;
                border: none;
                background: none;
                padding: 0;
                color: {{ $campeonato->ativo ? '#b00020' : '#137333' }};
                cursor: pointer;
            "
                                >
                                    {{ $campeonato->ativo ? 'Desativar' : 'Ativar' }}
                                </button>

                            </form>

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
