<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administradores - APPS</title>

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
            max-width: 900px;
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
        }

        th {
            background: #f7f7f7;
        }

        tr:last-child td {
            border-bottom: none;
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

        <h1>Administradores</h1>

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
            href="{{ route('admin.administradores.create') }}"
            class="novo"
        >
            + NOVO ADMINISTRADOR
        </a>

    </div>

    <div class="tabela">

        @if($administradores->isEmpty())

            <div class="vazio">
                Nenhum administrador cadastrado.
            </div>

        @else

            <table>

                <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Cadastrado em</th>
                    <th>Ações</th>
                </tr>
                </thead>

                <tbody>

                @foreach($administradores as $administrador)

                    <tr>

                        <td>
                            {{ $administrador->name }}
                        </td>

                        <td>
                            {{ $administrador->email }}
                        </td>

                        <td>
                            {{ $administrador->created_at->format('d/m/Y H:i') }}
                        </td>

                        <td>
                            <a
                                href="{{ route('admin.administradores.edit', $administrador) }}"
                                class="editar"
                            >
                                Editar
                            </a>
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
