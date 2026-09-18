<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Associados - APPS</title>

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
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .busca {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
            margin-bottom: 20px;
        }

        .busca form {
            display: flex;
            gap: 10px;
        }

        .busca input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
        }

        .busca button {
            background: #123b6d;
            color: #ffffff;
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            cursor: pointer;
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

        .ver {
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

    <a href="{{ route('admin.index') }}"
       style="color: #ffffff; text-decoration: none;">
        Painel
    </a>
</header>

<main class="conteudo">

    <div class="cabecalho">
        <h1>Associados</h1>

        <a href="{{ route('admin.index') }}" class="voltar">
            ← Voltar ao painel
        </a>
    </div>

    <div class="busca">

        <form method="GET" action="{{ route('admin.associados.index') }}">

            <input
                type="text"
                name="busca"
                value="{{ $busca }}"
                placeholder="Nome, CPF ou número do associado"
            >

            <button type="submit">
                BUSCAR
            </button>

        </form>

    </div>

    <div class="tabela">

        @if($associados->isEmpty())

            <div class="vazio">
                Nenhum associado encontrado.
            </div>

        @else

            <table>

                <thead>
                <tr>
                    <th>Nº</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Ação</th>
                </tr>
                </thead>

                <tbody>

                @foreach($associados as $associado)

                    <tr>

                        <td>
                            {{ $associado->numero }}
                        </td>

                        <td>
                            {{ $associado->nome }}
                        </td>

                        <td>
                            {{ substr($associado->cpf, 0, 3) }}
                            .***.***-**
                        </td>

                        <td>
                            {{ $associado->email }}
                        </td>

                        <td>
                            <a
                                href="{{ route('admin.associados.show', $associado) }}"
                                class="ver"
                            >
                                Ver
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
