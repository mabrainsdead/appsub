<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resultado - APPS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background:
                linear-gradient(
                    180deg,
                    #061b2b 0%,
                    #0a2d45 55%,
                    #04131f 100%
                );
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }

        .container {
            width: 100%;
            max-width: 560px;
        }

        .cabecalho {
            text-align: center;
            margin-bottom: 25px;
        }

        .cabecalho img {
            width: 90px;
            height: 90px;
            object-fit: contain;
            border-radius: 50%;
            margin-bottom: 12px;
        }

        .cabecalho h1 {
            margin: 0;
            font-size: 25px;
            font-weight: 700;
        }

        .cabecalho p {
            margin: 6px 0 0;
            font-size: 13px;
            letter-spacing: 2px;
            color: #a9c4d5;
        }

        .card {
            background: #ffffff;
            color: #183040;
            border-radius: 14px;
            padding: 32px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.30);
        }

        .icone {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            margin: 0 auto 20px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 32px;
            font-weight: bold;
        }

        .icone.sucesso {
            background: #e7f7ed;
            color: #218838;
        }

        .icone.recusada {
            background: #fdecec;
            color: #c62828;
        }

        h2 {
            margin: 0 0 10px;
            text-align: center;
            font-size: 24px;
        }

        .mensagem {
            text-align: center;
            color: #607482;
            margin: 0 0 28px;
            line-height: 1.5;
        }

        .dados {
            border-top: 1px solid #e5eaee;
        }

        .linha {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 13px 0;
            border-bottom: 1px solid #e5eaee;
        }

        .rotulo {
            color: #71808b;
            font-size: 14px;
        }

        .valor {
            font-weight: 600;
            text-align: right;
        }

        .observacao {
            margin-top: 25px;
            padding: 15px;
            border-radius: 8px;
            background: #eef7fc;
            color: #31566c;
            font-size: 14px;
            line-height: 1.5;
            text-align: center;
        }

        .rodape {
            text-align: center;
            margin-top: 22px;
            color: #8da7b7;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .card {
                padding: 24px 20px;
            }

            .linha {
                flex-direction: column;
                gap: 4px;
            }

            .valor {
                text-align: left;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="cabecalho">

        <img
            src="{{ asset('images/logo_apps.jpg') }}"
            alt="APPS"
        >

        <h1>Associação Paulista de Pesca Submarina</h1>

        <p>ÁREA ADMINISTRATIVA</p>

    </div>


    <div class="card">

        @if ($solicitacao->status === 'aprovada')

            <div class="icone sucesso">
                ✓
            </div>

            <h2>Solicitação aprovada</h2>

            <p class="mensagem">
                A associação foi criada ou renovada com sucesso.
            </p>

            <div class="dados">

                <div class="linha">
                    <span class="rotulo">Nome</span>

                    <span class="valor">
                        {{ $solicitacao->associado->nome }}
                    </span>
                </div>

                <div class="linha">
                    <span class="rotulo">Associado nº</span>

                    <span class="valor">
                        {{ $solicitacao->associado->numero }}
                    </span>
                </div>

                <div class="linha">
                    <span class="rotulo">Validade</span>

                    <span class="valor">
                        {{ $solicitacao->associado->associacaoVigente?->data_inicio?->format('d/m/Y') }}
                        a
                        {{ $solicitacao->associado->associacaoVigente?->data_fim?->format('d/m/Y') }}
                    </span>
                </div>

            </div>

            <div class="observacao">
                O associado receberá a confirmação da aprovação
                por e-mail.
            </div>

        @else

            <div class="icone recusada">
                ×
            </div>

            <h2>Solicitação recusada</h2>

            <p class="mensagem">
                A solicitação foi recusada.
            </p>

            <div class="dados">

                <div class="linha">
                    <span class="rotulo">Nome</span>

                    <span class="valor">
                        {{ $solicitacao->nome }}
                    </span>
                </div>

                <div class="linha">
                    <span class="rotulo">Solicitação nº</span>

                    <span class="valor">
                        {{ $solicitacao->id }}
                    </span>
                </div>

            </div>

        @endif

    </div>

    <div class="rodape">
        APPS · Associação Paulista de Pesca Submarina
    </div>

</div>

</body>
</html>
