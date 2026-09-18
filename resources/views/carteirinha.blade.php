<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">

    <title>Carteirinha - APPS</title>

    <style>
        * {
            box-sizing: border-box;
        }

        /* =====================================================
           PÁGINA A4
           ===================================================== */

        @page {
            size: A4;
            margin: 0;
        }

        html,
        body {
            margin: 0;
            padding: 0;

            width: 210mm;
            height: 297mm;

            font-family: Arial, Helvetica, sans-serif;
            background: #eeeeee;
        }


        /* =====================================================
           FOLHA A4
           ===================================================== */

        .folha {
            width: 210mm;
            min-height: 297mm;

            display: flex;
            justify-content: center;

            padding-top: 15mm;
        }


        /* =====================================================
           ÁREA DA CARTEIRINHA + BOTÃO
           ===================================================== */

        .area-impressao {
            display: flex;
            flex-direction: column;
            align-items: center;
        }


        /* =====================================================
           CARTEIRINHA
           TAMANHO CARTÃO DE CRÉDITO
           85,6 x 54 mm
           ===================================================== */

        .carteirinha {
            width: 85.6mm;
            height: 54mm;

            background: #ffffff;

            border-radius: 3mm;
            overflow: hidden;

            display: flex;
            position: relative;

            box-shadow:
                0 2mm 6mm rgba(0, 0, 0, 0.20);
        }


        /* =====================================================
           LOGO
           ===================================================== */

        .logo-area {
            width: 18mm;
            height: 100%;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffffff;
        }

        .logo {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: contain;
            object-position: center;
        }


        /* =====================================================
           CONTEÚDO PRINCIPAL
           ===================================================== */

        .conteudo {
            flex: 1;

            min-width: 0;

            position: relative;

            padding:
                4.5mm
                3.5mm
                3mm
                4mm;

            overflow: hidden;
        }


        /* =====================================================
           ONDAS DECORATIVAS
           ===================================================== */

        .onda {
            position: absolute;

            width: 65mm;
            height: 20mm;

            border-top:
                0.8mm solid
                rgba(70, 130, 180, 0.12);

            border-radius: 50%;

            transform: rotate(-17deg);

            right: -18mm;
            bottom: 2mm;
        }

        .onda2 {
            position: absolute;

            width: 62mm;
            height: 17mm;

            border-top:
                0.5mm solid
                rgba(70, 130, 180, 0.08);

            border-radius: 50%;

            transform: rotate(-17deg);

            right: -15mm;
            bottom: 6mm;
        }


        /* =====================================================
           TÍTULO
           ===================================================== */

        .titulo {
            position: relative;
            z-index: 2;

            color: #123b6d;

            font-size: 3.7mm;
            line-height: 1.08;

            font-weight: bold;

            max-width: 52mm;

            margin-bottom: 1.2mm;
        }

        .subtitulo {
            position: relative;
            z-index: 2;

            color: #777777;

            font-size: 1.9mm;

            letter-spacing: 0.15mm;

            margin-bottom: 4.2mm;
        }


        /* =====================================================
           CAMPOS
           ===================================================== */

        .campo {
            position: relative;
            z-index: 2;

            margin-bottom: 2.6mm;
        }

        .label {
            color: #666666;

            font-size: 1.8mm;
            line-height: 1;

            margin-bottom: 0.7mm;
        }

        .numero {
            color: #111111;

            font-size: 4.1mm;
            line-height: 1;

            font-weight: bold;
        }

        .nome {
            color: #111111;

            font-size: 3.2mm;
            line-height: 1.05;

            font-weight: bold;

            /*
             * Deixa espaço para o QR Code.
             */
            max-width: 43mm;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .validade {
            color: #111111;

            font-size: 2.6mm;
            line-height: 1;

            font-weight: bold;
        }


        /* =====================================================
           QR CODE
           ===================================================== */

        .qr {
            position: absolute;

            z-index: 3;

            right: 3mm;
            bottom: 3.2mm;

            width: 16.5mm;

            text-align: center;
        }

        .qr img {
            display: block;

            width: 16.5mm;
            height: 16.5mm;

            margin: 0 auto;

            background: #ffffff;
        }

        .qr-legenda {
            margin-top: 0.8mm;

            color: #666666;

            font-size: 1.35mm;
            line-height: 1.15;
        }


        /* =====================================================
           RODAPÉ
           ===================================================== */

        .rodape {
            position: absolute;

            z-index: 2;

            left: 4mm;
            bottom: 2.5mm;

            color: #999999;

            font-size: 1.25mm;
        }


        /* =====================================================
           BOTÃO
           ===================================================== */

        .imprimir {
            display: block;

            margin-top: 5mm;

            padding: 9px 20px;

            border: 0;
            border-radius: 5px;

            background: #333333;
            color: #ffffff;

            cursor: pointer;

            font-size: 14px;
            font-weight: bold;
        }


        /* =====================================================
           IMPRESSÃO
           ===================================================== */

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;

                margin: 0;
                padding: 0;

                background: #ffffff;
            }

            .folha {
                width: 210mm;
                height: 297mm;

                display: flex;
                align-items: center;
                justify-content: center;

                padding-top: 0;
            }

            .carteirinha {
                width: 85.6mm;
                height: 54mm;

                box-shadow: none;
            }

            .imprimir {
                display: none;
            }
        }

    </style>
</head>

<body>


<div class="folha">

    <div class="area-impressao">


        <!-- =================================================
             CARTEIRINHA
             ================================================= -->

        <div class="carteirinha">


            <!-- LOGO -->

            <div class="logo-area">

                <img
                    class="logo"
                    src="{{ asset('images/logo_apps.jpg') }}"
                    alt="APPS"
                >

            </div>


            <!-- CONTEÚDO -->

            <div class="conteudo">


                <!-- Ondas -->

                <div class="onda"></div>
                <div class="onda2"></div>


                <!-- TÍTULO -->

                <div class="titulo">
                    Associação Paulista<br>
                    de Pesca Submarina
                </div>

                <div class="subtitulo">
                    CARTEIRINHA DE ASSOCIADO
                </div>


                <!-- NÚMERO -->

                <div class="campo">

                    <div class="label">
                        ASSOCIADO Nº
                    </div>

                    <div class="numero">
                        {{ str_pad(
                            $associacao->associado->numero,
                            4,
                            '0',
                            STR_PAD_LEFT
                        ) }}
                    </div>

                </div>


                <!-- NOME -->

                <div class="campo">

                    <div class="label">
                        NOME
                    </div>

                    <div class="nome">
                        {{ $associacao->associado->nome }}
                    </div>

                </div>


                <!-- VALIDADE -->

                <div class="campo">

                    <div class="label">
                        VALIDADE
                    </div>

                    <div class="validade">
                        {{ $associacao->data_inicio->format('d/m/Y') }}
                        —
                        {{ $associacao->data_fim->format('d/m/Y') }}
                    </div>

                </div>


                <!-- QR CODE -->

                <div class="qr">

                    <img
                        src="{{ route('validar.qr', [
                            'codigo' => $associacao->codigo_validacao
                        ]) }}"
                        alt="QR Code de validação"
                    >

                    <div class="qr-legenda">
                        Aponte a câmera<br>
                        para validar
                    </div>

                </div>


                <!-- RODAPÉ -->

                <div class="rodape">
                    Documento de identificação de associado
                </div>


            </div>

        </div>


        <!-- =================================================
             BOTÃO
             ================================================= -->

        <button
            class="imprimir"
            onclick="window.print()"
        >
            IMPRIMIR CARTEIRINHA
        </button>


    </div>

</div>


</body>
</html>
