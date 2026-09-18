<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Solicitação aprovada — APPS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #0b2d4a;
        }

        body {
            min-height: 100vh;
            background:
                linear-gradient(
                    rgba(0, 35, 65, 0.90),
                    rgba(0, 55, 85, 0.94)
                );
        }

        .page {
            min-height: 100vh;
            padding: 40px 20px 50px;
        }

        .container {
            width: min(620px, 100%);
            margin: 0 auto;
        }

        .header {
            text-align: center;
            color: white;
            margin-bottom: 28px;
        }

        .logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 18px;
            border-radius: 4px;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            line-height: 1.15;
        }

        .header p {
            margin: 11px 0 0;
            font-size: 13px;
            letter-spacing: 2px;
            opacity: 0.9;
        }

        .card {
            background: white;
            border-radius: 8px;
            padding: 42px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
            text-align: center;
        }

        .icone {
            width: 72px;
            height: 72px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #eef7f1;
            border: 2px solid #b8d7c1;
            color: #237344;
            font-size: 43px;
            line-height: 68px;
            font-weight: bold;
        }

        .card h2 {
            margin: 0;
            font-size: 29px;
            color: #237344;
        }

        .mensagem {
            margin: 12px 0 28px;
            color: #607481;
            font-size: 16px;
            line-height: 1.5;
        }

        .dados {
            border: 1px solid #d6dfe4;
            border-radius: 6px;
            overflow: hidden;
            text-align: left;
            margin-bottom: 28px;
        }

        .linha {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 15px 17px;
            border-bottom: 1px solid #e2e7ea;
        }

        .linha:last-child {
            border-bottom: none;
        }

        .label {
            color: #71818c;
            font-size: 13px;
            font-weight: bold;
        }

        .valor {
            color: #0b2d4a;
            font-size: 15px;
            font-weight: bold;
            text-align: right;
        }

        .info {
            margin-top: 25px;
            padding: 17px 18px;
            background: #f2f6f8;
            border-radius: 5px;
            color: #506575;
            font-size: 14px;
            line-height: 1.5;
        }

        .footer {
            margin-top: 25px;
            text-align: center;
            color: rgba(255,255,255,0.75);
            font-size: 12px;
            letter-spacing: 1px;
        }

        @media (max-width: 600px) {

            .page {
                padding: 25px 15px 35px;
            }

            .card {
                padding: 32px 22px;
            }

            .card h2 {
                font-size: 25px;
            }

            .linha {
                display: block;
            }

            .valor {
                margin-top: 5px;
                text-align: left;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <div class="container">

        <div class="header">

            <img
                src="{{ asset('images/logo_apps.jpg') }}"
                alt="APPS"
                class="logo"
            >

            <h1>
                Associação Paulista<br>
                de Pesca Submarina
            </h1>

            <p>
                ÁREA ADMINISTRATIVA
            </p>

        </div>


        <div class="card">

            <div class="icone">
                ✓
            </div>

            <h2>
                Solicitação aprovada
            </h2>

            <div class="mensagem">
                A associação foi criada ou renovada com sucesso.
            </div>


            <div class="dados">

                <div class="linha">

                    <div class="label">
                        Associado
                    </div>

                    <div class="valor">
                        {{ $solicitacao->associado->nome }}
                    </div>

                </div>


                <div class="linha">

                    <div class="label">
                        Número
                    </div>

                    <div class="valor">
                        {{ $solicitacao->associado->numero }}
                    </div>

                </div>


                <div class="linha">

                    <div class="label">
                        Validade
                    </div>

                    <div class="valor">
                        {{ $solicitacao->associado->associacaoVigente?->data_fim?->format('d/m/Y') }}
                    </div>

                </div>


                <div class="linha">

                    <div class="label">
                        Solicitação
                    </div>

                    <div class="valor">
                        nº {{ $solicitacao->id }}
                    </div>

                </div>

            </div>


            <div class="info">

                O associado receberá automaticamente um e-mail
                com a confirmação da associação e as informações
                para acessar sua carteirinha.

            </div>

        </div>


        <div class="footer">

            APPS · SÃO PAULO · BRASIL

        </div>

    </div>

</div>

</body>
</html>
