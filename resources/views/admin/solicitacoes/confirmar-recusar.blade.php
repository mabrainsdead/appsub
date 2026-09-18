<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Recusar solicitação — APPS</title>

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

        /* CABEÇALHO */

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

        /* CARTÃO */

        .card {
            background: white;
            border-radius: 8px;
            padding: 38px 42px 42px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.25);
        }

        .card h2 {
            margin: 0 0 8px;
            font-size: 27px;
            color: #8f2020;
        }

        .subtitle {
            margin: 0 0 28px;
            color: #607481;
            font-size: 15px;
        }

        /* DADOS */

        .dados {
            border: 1px solid #d6dfe4;
            border-radius: 6px;
            overflow: hidden;
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
            word-break: break-word;
        }

        /* ALERTA */

        .alerta {
            padding: 17px 18px;
            margin-bottom: 25px;
            border-left: 4px solid #a52a2a;
            border-radius: 4px;
            background: #fff3f3;
            color: #702020;
            font-size: 15px;
            line-height: 1.45;
        }

        .alerta strong {
            display: block;
            margin-bottom: 4px;
        }

        /* BOTÕES */

        .acoes {
            display: flex;
            gap: 12px;
        }

        .botao {
            flex: 1;
            min-height: 50px;
            border-radius: 4px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .recusar {
            border: none;
            background: #9d2626;
            color: white;
        }

        .recusar:hover {
            background: #7f1e1e;
        }

        .voltar {
            border: 1px solid #b9c5cb;
            background: white;
            color: #36566b;
        }

        .voltar:hover {
            background: #f4f6f7;
        }

        /* RODAPÉ */

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
                padding: 30px 22px 32px;
            }

            .card h2 {
                font-size: 24px;
            }

            .linha {
                display: block;
            }

            .valor {
                margin-top: 5px;
                text-align: left;
            }

            .acoes {
                flex-direction: column-reverse;
            }

            .botao {
                width: 100%;
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

            <h2>
                Recusar solicitação
            </h2>

            <p class="subtitle">
                Confira os dados antes de confirmar a recusa.
            </p>


            <div class="dados">

                <div class="linha">

                    <div class="label">
                        Solicitação
                    </div>

                    <div class="valor">
                        nº {{ $solicitacao->id }}
                    </div>

                </div>


                <div class="linha">

                    <div class="label">
                        Nome
                    </div>

                    <div class="valor">
                        {{ $solicitacao->nome }}
                    </div>

                </div>


                <div class="linha">

                    <div class="label">
                        CPF
                    </div>

                    <div class="valor">
                        {{ $solicitacao->cpf }}
                    </div>

                </div>


                <div class="linha">

                    <div class="label">
                        Tipo
                    </div>

                    <div class="valor">

                        @if ($solicitacao->tipo === 'renovacao')
                            Renovação
                        @else
                            Nova associação
                        @endif

                    </div>

                </div>


                <div class="linha">

                    <div class="label">
                        Valor
                    </div>

                    <div class="valor">
                        R$ {{ number_format($solicitacao->valor, 2, ',', '.') }}
                    </div>

                </div>

            </div>


            <div class="alerta">

                <strong>
                    Atenção
                </strong>

                A recusa encerrará esta solicitação.
                Confirma que deseja recusá-la?

            </div>


            <div class="acoes">

                <a
                    href="{{ url()->previous() }}"
                    class="botao voltar"
                >
                    VOLTAR
                </a>


                <form
                    method="POST"
                    action="{{ route('admin.solicitacoes.recusar', ['token' => $solicitacao->token]) }}"
                    style="flex: 1; margin: 0;"
                >

                    @csrf

                    <button
                        type="submit"
                        class="botao recusar"
                        style="width: 100%;"
                    >
                        SIM — RECUSAR SOLICITAÇÃO
                    </button>

                </form>

            </div>

        </div>


        <div class="footer">

            APPS · SÃO PAULO · BRASIL

        </div>

    </div>

</div>

</body>
</html>
