<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Painel administrativo - APPS</title>

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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topo h2 {
            margin: 0;
        }

        .logout button {
            background: transparent;
            border: 1px solid #ffffff;
            color: #ffffff;
            padding: 8px 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        .conteudo {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .boas-vindas {
            margin-bottom: 25px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .card h3 {
            margin-top: 0;
            color: #123b6d;
        }

        .card p {
            color: #666;
        }
    </style>
</head>

<body>

<header class="topo">

    <h2>APPS — Administração</h2>

    <form method="POST" action="{{ route('admin.logout') }}" class="logout">
        @csrf

        <button type="submit">
            SAIR
        </button>
    </form>

</header>

<main class="conteudo">

    <div class="boas-vindas">
        <h1>Painel administrativo</h1>

        <p>
            Olá, {{ Auth::user()->name }}.
        </p>
    </div>

    <div class="cards">

        <div class="card">
            <h3>Solicitações</h3>

            <p>
                Gerenciar solicitações de associação.
            </p>

            <p>
                <a href="{{ route('admin.solicitacoes.index') }}">
                    Solicitações pendentes
                </a>
            </p>

            <p>
                <a href="{{ route('admin.solicitacoes.historico') }}">
                    Histórico
                </a>
            </p>
        </div>

        <div class="card">
            <h3>Inscrição manual</h3>

            <p>
                Registrar uma nova associação ou renovar um associado diretamente pelo administrador.
            </p>

            <p>
                <a href="{{ route('admin.inscricoes-manual.create') }}">
                    Nova inscrição manual
                </a>
            </p>
        </div>

        <div class="card">
            <h3>Associados</h3>

            <p>
                Consultar associados e associações.
            </p>

            <p>
                <a href="{{ route('admin.associados.index') }}">
                    Consultar associados
                </a>
            </p>
        </div>

        <div class="card">
            <h3>Campeonatos</h3>

            <p>
                Gerenciar campeonatos e inscrições.
            </p>

            <p>
                <a href="{{ route('admin.campeonatos.index') }}">
                    Gerenciar campeonatos
                </a>
            </p>
        </div>

        <div class="card">
            <h3>Configurações</h3>

            <p>
                Valores, PIX e configurações da APPS.
            </p>

            <p>
                <a href="{{ route('admin.configuracoes.edit') }}">
                    Editar configurações
                </a>
            </p>
        </div>

        <div class="card">
            <h3>Administradores</h3>

            <p>
                Gerenciar usuários administrativos.
            </p>

            <p>
                <a href="{{ route('admin.administradores.index') }}">
                    Gerenciar administradores
                </a>
            </p>
        </div>

    </div>

</main>

</body>
</html>
