<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Confirmar inscrição — APPS</title>

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
                    rgba(0, 35, 65, 0.88),
                    rgba(0, 55, 85, 0.92)
                );
        }

        .page {
            min-height: 100vh;
            padding: 35px 20px 50px;
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
            width: 105px;
            height: 105px;
            object-fit: contain;
            margin-bottom: 18px;
            border-radius: 4px;
        }

        .header h1 {
            margin: 0;
            font-size: 29px;
            line-height: 1.15;
            font-weight: 700;
        }

        .header p {
            margin: 12px 0 0;
            font-size: 14px;
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
            margin: 0;
            font-size: 28px;
            color: #0b2d4a;
        }

        .hello {
            margin: 8px 0 28px;
            font-size: 17px;
            color: #506575;
        }

        /* TIPO */

        .type {
            padding: 18px 20px;
            margin-bottom: 25px;
            border-left: 5px solid #0b4164;
            background: #f2f6f8;
            border-radius: 4px;
        }

        .type-label {
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #647785;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .type-value {
            font-size: 21px;
            font-weight: bold;
            color: #0b4164;
        }

        /* VALOR */

        .price-box {
            text-align: center;
            padding: 24px 15px;
            margin-bottom: 28px;
            border-top: 1px solid #dce3e7;
            border-bottom: 1px solid #dce3e7;
        }

        .price-label {
            font-size: 14px;
            color: #607481;
            margin-bottom: 6px;
        }

        .price {
            font-size: 34px;
            font-weight: bold;
            color: #0b2d4a;
        }

        /* EXPLICAÇÃO */

        .info {
            margin-bottom: 28px;
            color: #506575;
            font-size: 15px;
            line-height: 1.5;
        }

        /* BOTÃO */

        .submit {
            width: 100%;
            height: 54px;
            border: 0;
            border-radius: 4px;
            background: #0b4164;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .submit:hover {
            background: #082f49;
        }

        /* ASSOCIAÇÃO VIGENTE */

        .vigente {
            text-align: center;
        }

        .vigente-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .vigente h2 {
            margin-bottom: 12px;
        }

        .vigente p {
            color: #506575;
            font-size: 16px;
            line-height: 1.5;
        }

        .vigente strong {
            color: #0b4164;
        }

        /* RODAPÉ */

        .footer {
            margin-top: 25px;
            text-align: center;
            color: rgba(255,255,255,0.75);
            font-size: 12px;
            letter-spacing: 1px;
        }

        .back {
            display: inline-block;
            margin-top: 12px;
            color: white;
            font-size: 13px;
            text-decoration: underline;
            opacity: 0.9;
        }

        @media (max-width: 600px) {

            .page {
                padding: 25px 15px 35px;
            }

            .header h1 {
                font-size: 24px;
            }

            .header p {
                font-size: 11px;
                letter-spacing: 1.5px;
            }

            .card {
                padding: 30px 22px 32px;
            }

            .card h2 {
                font-size: 25px;
            }

            .price {
                font-size: 30px;
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
                CONSERVAÇÃO · ESPORTE · COMPANHEIRISMO
            </p>

        </div>


        <div class="card">

            @if ($associado && $associacaoVigente)

                <div class="vigente">

                    <div class="vigente-icon">
                        ✓
                    </div>

                    <h2>
                        Associação vigente
                    </h2>

                    <p>
                        Olá, <strong>{{ $dados['nome'] }}</strong>.
                    </p>

                    <p>
                        Sua associação está vigente até
                        <strong>
                            {{ $associacaoVigente->data_fim->format('d/m/Y') }}
                        </strong>.
                    </p>

                    <p>
                        Não é necessário fazer uma nova associação neste momento.
                    </p>

                </div>

            @else

                <h2>
                    {{ $associado ? 'Renovação da associação' : 'Nova associação' }}
                </h2>

                <p class="hello">
                    Olá, {{ $dados['nome'] }}.
                </p>


                <div class="type">

                    <div class="type-label">
                        Solicitação
                    </div>

                    <div class="type-value">

                        @if ($associado)
                            Renovação da associação
                        @else
                            Nova associação
                        @endif

                    </div>

                </div>


                <div class="price-box">

                    <div class="price-label">
                        Valor da associação
                    </div>

                    <div class="price">
                        R$ {{ number_format($valorAssociacao, 2, ',', '.') }}
                    </div>

                </div>


                <div class="info">

                    Ao continuar, sua solicitação será registrada
                    e você receberá as instruções para pagamento
                    via PIX.

                    <br><br>

                    Depois do pagamento, será necessário enviar o
                    comprovante para concluir a solicitação.

                </div>


                <form
                    method="POST"
                    action="{{ route('inscricao.solicitar') }}"
                >

                    @csrf

                    <input
                        type="hidden"
                        name="nome"
                        value="{{ $dados['nome'] }}"
                    >

                    <input
                        type="hidden"
                        name="cpf"
                        value="{{ $cpf }}"
                    >

                    <input
                        type="hidden"
                        name="data_nascimento"
                        value="{{ $dados['data_nascimento'] }}"
                    >

                    <input
                        type="hidden"
                        name="email"
                        value="{{ $dados['email'] }}"
                    >

                    <input
                        type="hidden"
                        name="tipo"
                        value="{{ $tipo }}"
                    >

                    <button
                        type="submit"
                        class="submit"
                    >
                        CONTINUAR PARA PAGAMENTO
                    </button>

                </form>

            @endif

        </div>


        <div class="footer">

            APPS · SÃO PAULO · BRASIL

            <br>

            <a
                href="{{ route('inscricao.create') }}"
                class="back"
            >
                ← Voltar
            </a>

        </div>

    </div>

</div>

</body>
</html>
