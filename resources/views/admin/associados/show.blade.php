<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Associado - APPS</title>

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

        .card {
            background: #ffffff;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .card h2 {
            margin-top: 0;
            color: #123b6d;
        }

        .dados {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .campo strong {
            display: block;
            font-size: 13px;
            color: #666;
            margin-bottom: 4px;
        }

        .associacao {
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .ativa {
            border-left: 5px solid #198754;
        }

        .vencida {
            border-left: 5px solid #999;
        }

        .botao {
            display: inline-block;
            background: #123b6d;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 5px;
        }

        @media (max-width: 600px) {
            .dados {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<header class="topo">
    <h2>APPS — Administração</h2>

    <a
        href="{{ route('admin.index') }}"
        style="color: #ffffff; text-decoration: none;"
    >
        Painel
    </a>
</header>

<main class="conteudo">

    <div class="cabecalho">

        <h1>Associado</h1>

        <a
            href="{{ route('admin.associados.index') }}"
            class="voltar"
        >
            ← Voltar para associados
        </a>

    </div>

    <div class="card">
        @if(session('sucesso'))
            <p style="color: #198754; font-weight: bold;">
                {{ session('sucesso') }}
            </p>
        @endif

        <h2>Dados cadastrais</h2>

        <div class="dados">

            <a
                href="{{ route('admin.associados.edit', $associado) }}"
                class="botao"
                style="margin-bottom: 20px;"
            >
                EDITAR CADASTRO
            </a>

            <div class="campo">
                <strong>Nome</strong>
                {{ $associado->nome }}
            </div>

            <div class="campo">
                <strong>CPF</strong>
                {{ substr($associado->cpf, 0, 3) }}.***.***-**
            </div>

            <div class="campo">
                <strong>E-mail</strong>
                {{ $associado->email }}
            </div>

            <div class="campo">
                <strong>Data de nascimento</strong>
                {{ $associado->data_nascimento?->format('d/m/Y') }}
            </div>

        </div>

    </div>

    <div class="card">

        <h2>Associações</h2>

        @forelse($associado->associacoes as $associacao)

            <div class="associacao
                {{ $associacao->status === 'ativa' ? 'ativa' : 'vencida' }}">

                <strong>
                    {{ ucfirst($associacao->status) }}
                </strong>

                <p>
                    Início:
                    {{ $associacao->data_inicio->format('d/m/Y') }}
                </p>

                <p>
                    Fim:
                    {{ $associacao->data_fim->format('d/m/Y') }}
                </p>

                <p>
                    Valor:
                    R$ {{ number_format($associacao->valor, 2, ',', '.') }}
                </p>

                @if($associacao->status === 'ativa' && $associacao->codigo_validacao)

                    <a
                        href="{{ route('carteirinha', $associacao->codigo_validacao) }}"
                        class="botao"
                        target="_blank"
                    >
                        Ver carteirinha
                    </a>

                @endif

            </div>

        @empty

            <p>Nenhuma associação registrada.</p>

        @endforelse

    </div>

</main>

</body>
</html>
