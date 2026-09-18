<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pagamento — APPS</title>

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

        .request {
            margin-top: 7px;
            color: #74838d;
            font-size: 13px;
        }

        /* VALOR */

        .price-box {
            margin: 28px 0;
            padding: 24px 20px;
            text-align: center;
            background: #f2f6f8;
            border-radius: 6px;
        }

        .price-label {
            font-size: 14px;
            color: #607481;
            margin-bottom: 5px;
        }

        .price {
            font-size: 38px;
            font-weight: bold;
            color: #0b4164;
        }

        /* PIX */

        .pix-box {
            border: 1px solid #cbd7de;
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .pix-header {
            background: #0b4164;
            color: white;
            padding: 14px 18px;
            font-size: 16px;
            font-weight: bold;
        }

        .pix-body {
            padding: 22px 20px;
        }

        .pix-name {
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 18px;
            color: #0b2d4a;
        }

        .pix-label {
            display: block;
            margin-bottom: 6px;
            font-size: 12px;
            font-weight: bold;
            color: #71818c;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .pix-key {
            padding: 14px;
            background: #f4f6f7;
            border: 1px solid #d7dfe3;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            color: #0b2d4a;
            word-break: break-word;
        }

        .pix-help {
            margin: 16px 0 0;
            font-size: 14px;
            line-height: 1.45;
            color: #607481;
        }

        /* COMPROVANTE */

        .proof {
            border-top: 1px solid #dce3e7;
            padding-top: 28px;
        }

        .proof h3 {
            margin: 0 0 8px;
            font-size: 21px;
            color: #0b2d4a;
        }

        .proof p {
            margin: 0 0 18px;
            color: #607481;
            font-size: 14px;
            line-height: 1.45;
        }

        .file-area {
            border: 2px dashed #b9c7cf;
            border-radius: 6px;
            padding: 22px 18px;
            background: #fafbfc;
            text-align: center;
        }

        .file-area input[type="file"] {
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        .file-help {
            margin-top: 10px;
            font-size: 12px;
            color: #71818c;
        }

        .submit {
            width: 100%;
            height: 52px;
            margin-top: 18px;
            border: 0;
            border-radius: 4px;
            background: #0b4164;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        .submit:hover {
            background: #082f49;
        }

        /* SUCESSO */

        .success {
            margin-bottom: 25px;
            padding: 17px 18px;
            border-radius: 5px;
            background: #eef7f1;
            border: 1px solid #b8d7c1;
            color: #28613a;
            font-size: 14px;
            line-height: 1.45;
        }

        .success strong {
            display: block;
            margin-bottom: 4px;
            font-size: 16px;
        }

        /* COMPROVANTE ENVIADO */

        .sent {
            text-align: center;
            padding: 30px 10px 15px;
        }

        .sent-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #eef7f1;
            border: 2px solid #b8d7c1;
            color: #28613a;
            font-size: 38px;
            line-height: 60px;
            font-weight: bold;
        }

        .sent h3 {
            margin: 0 0 12px;
            font-size: 23px;
            color: #0b2d4a;
        }

        .sent p {
            margin: 0;
            color: #607481;
            font-size: 15px;
            line-height: 1.55;
        }

        /* ERROS */

        .errors {
            margin-bottom: 22px;
            padding: 14px 16px;
            border-radius: 4px;
            background: #fff1f1;
            border: 1px solid #e2bcbc;
            color: #9b2020;
            font-size: 14px;
        }

        .errors p {
            margin: 4px 0;
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

        /* MOBILE */

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
                font-size: 32px;
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

            <h2>
                Pagamento
            </h2>

            <div class="request">
                Solicitação nº {{ $solicitacao->id }}
            </div>


            <div class="price-box">

                <div class="price-label">
                    Valor da associação
                </div>

                <div class="price">
                    R$ {{ number_format($solicitacao->valor, 2, ',', '.') }}
                </div>

            </div>


            @if ($solicitacao->comprovante)

                {{-- COMPROVANTE JÁ ENVIADO --}}

                <div class="sent">

                    <div class="sent-icon">
                        ✓
                    </div>

                    <h3>
                        Comprovante recebido
                    </h3>

                    <p>
                        Seu comprovante de pagamento foi enviado com sucesso.
                    </p>

                    <p>
                        Sua solicitação está agora em análise pela APPS.
                    </p>
                    <p>
                        <strong>
                            Por favor, aguarde a confirmação da associação por e-mail.
                        </strong>
                    </p>
                </div>


            @else

                {{-- PAGAMENTO PIX --}}

                <div class="pix-box">

                    <div class="pix-header">
                        PAGAMENTO VIA PIX
                    </div>

                    <div class="pix-body">

                        <div class="pix-name">
                            {{ $nomePix }}
                        </div>

                        <span class="pix-label">
                            Chave PIX
                        </span>

                        <div class="pix-key">
                            {{ $chavePix }}
                        </div>

                        <div class="pix-help">
                            Faça o PIX no valor indicado acima.
                            Depois, envie o comprovante de pagamento
                            nesta mesma página.
                        </div>

                    </div>

                </div>


                {{-- ENVIO DO COMPROVANTE --}}

                <div class="proof">

                    <h3>
                        Enviar comprovante
                    </h3>

                    <p>
                        Depois de realizar o PIX, selecione o
                        comprovante de pagamento abaixo.
                    </p>


                    @if ($errors->any())

                        <div class="errors">

                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach

                        </div>

                    @endif


                    <form
                        method="POST"
                        action="{{ route('inscricao.comprovante', ['token' => $solicitacao->token]) }}"
                        enctype="multipart/form-data"
                    >

                        @csrf

                        <div class="file-area">

                            <input
                                type="file"
                                name="comprovante"
                                accept=".pdf,.jpg,.jpeg,.png"
                                required
                            >

                            <div class="file-help">
                                PDF, JPG ou PNG · máximo 5 MB
                            </div>

                        </div>


                        <button
                            type="submit"
                            class="submit"
                        >
                            ENVIAR COMPROVANTE
                        </button>

                    </form>

                </div>

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
