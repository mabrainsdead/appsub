<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>APPS — Associação Paulista de Pesca Submarina</title>

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
            background: #ffffff;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* HERO */

        .hero {
            min-height: 670px;
            position: relative;
            background-image:
                linear-gradient(
                    90deg,
                    rgba(0, 35, 70, 0.72) 0%,
                    rgba(0, 35, 70, 0.40) 45%,
                    rgba(0, 20, 50, 0.25) 100%
                ),
                url('{{ asset('images/fundo.webp') }}');

            background-size: cover;
            background-position: center;
            color: white;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(
                to bottom,
                rgba(0, 0, 0, 0.10),
                rgba(0, 10, 30, 0.15) 60%,
                rgba(0, 15, 35, 0.55)
            );
            pointer-events: none;
        }

        .container {
            width: min(1400px, calc(100% - 80px));
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        /* HEADER */

        header {
            padding-top: 35px;
        }

        .header-inner {
            display: flex;
            align-items: flex-start;
            gap: 38px;
        }

        .logo {
            width: 178px;
            height: 178px;
            object-fit: contain;
            flex-shrink: 0;
            border-radius: 4px;
        }

        .brand {
            flex: 1;
            padding-top: 5px;
        }

        .brand h1 {
            margin: 0;
            font-size: clamp(42px, 4vw, 68px);
            line-height: 0.98;
            font-weight: 700;
            letter-spacing: -2px;
            color: #ffffff;
            max-width: 760px;
        }

        .brand-subtitle {
            margin-top: 24px;
            font-size: 17px;
            letter-spacing: 7px;
            font-weight: 400;
            color: #ffffff;
        }

        /* NAV */

        nav {
            display: flex;
            align-items: center;
            gap: 34px;
            padding-top: 20px;
            white-space: nowrap;
        }

        nav a {
            font-size: 14px;
            font-weight: bold;
            color: white;
            position: relative;
        }

        nav a:hover {
            opacity: 0.8;
        }

        .admin-link {
            border: 1px solid rgba(255,255,255,0.8);
            padding: 14px 22px;
            border-radius: 4px;
        }

        /* CTA */

        .cta-area {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            position: absolute;
            z-index: 3;
            bottom: 35px;
            left: 50%;
            transform: translateX(-50%);
            width: min(1250px, calc(100% - 80px));
        }

        .cta {
            min-height: 138px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            padding: 25px 35px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.20);
        }

        .cta-primary {
            background: rgba(0, 45, 75, 0.94);
            color: white;
        }

        .cta-secondary {
            background: rgba(255,255,255,0.96);
            color: #0b2d4a;
        }

        .cta-icon {
            font-size: 52px;
            width: 105px;
            text-align: center;
            flex-shrink: 0;
        }

        .cta-content {
            flex: 1;
        }

        .cta h2 {
            margin: 0 0 10px;
            font-size: 27px;
            line-height: 1;
        }

        .cta p {
            margin: 0;
            font-size: 17px;
            line-height: 1.4;
        }

        .cta-arrow {
            font-size: 43px;
            margin-left: 20px;
            font-weight: 300;
        }

        /* FEATURES */

        .features {
            background: #ffffff;
            padding: 42px 0 38px;
        }

        .features-inner {
            width: min(1250px, calc(100% - 80px));
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        .feature {
            text-align: center;
            padding: 0 35px;
            border-right: 1px solid #d4d9dd;
        }

        .feature:last-child {
            border-right: none;
        }

        .feature-icon {
            font-size: 42px;
            height: 55px;
            margin-bottom: 12px;
        }

        .feature h3 {
            margin: 0 0 9px;
            font-size: 19px;
            color: #0b2d4a;
        }

        .feature p {
            margin: 0;
            font-size: 16px;
            line-height: 1.4;
            color: #183d59;
        }

        /* FOOTER */

        footer {
            background: #002b49;
            color: white;
            padding: 25px 0;
        }

        .footer-inner {
            width: min(1400px, calc(100% - 80px));
            margin: 0 auto;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .footer-info {
            font-size: 13px;
            letter-spacing: 2px;
            opacity: 0.9;
        }

        .separator {
            margin: 0 13px;
            opacity: 0.5;
        }

        /* RESPONSIVO */

        @media (max-width: 1050px) {

            .header-inner {
                gap: 25px;
            }

            .logo {
                width: 135px;
                height: 135px;
            }

            nav {
                gap: 18px;
            }

            .brand h1 {
                font-size: 45px;
            }

            .brand-subtitle {
                font-size: 13px;
                letter-spacing: 4px;
            }
        }

        @media (max-width: 800px) {

            .hero {
                min-height: 760px;
                background-position: center;
            }

            .container {
                width: calc(100% - 35px);
            }

            .header-inner {
                display: block;
            }

            .logo {
                width: 105px;
                height: 105px;
            }

            .brand {
                margin-top: 20px;
            }

            .brand h1 {
                font-size: 38px;
                letter-spacing: -1px;
            }

            .brand-subtitle {
                font-size: 11px;
                letter-spacing: 3px;
            }

            nav {
                margin-top: 25px;
                flex-wrap: wrap;
                gap: 15px 22px;
            }

            .cta-area {
                width: calc(100% - 35px);
                grid-template-columns: 1fr;
                gap: 12px;
                bottom: 20px;
            }

            .cta {
                min-height: 115px;
                padding: 20px;
            }

            .cta-icon {
                width: 70px;
                font-size: 38px;
            }

            .cta h2 {
                font-size: 21px;
            }

            .cta p {
                font-size: 14px;
            }

            .cta-arrow {
                font-size: 32px;
            }

            .features-inner {
                width: calc(100% - 35px);
                grid-template-columns: 1fr 1fr;
                gap: 30px 0;
            }

            .feature {
                border-right: none;
                padding: 0 20px;
            }

            .feature:nth-child(odd) {
                border-right: 1px solid #d4d9dd;
            }

            footer {
                padding: 20px 0;
            }

            .footer-inner {
                width: calc(100% - 35px);
            }
        }

        @media (max-width: 500px) {

            .hero {
                min-height: 800px;
            }

            .brand h1 {
                font-size: 32px;
            }

            .brand-subtitle {
                line-height: 1.7;
            }

            nav a {
                font-size: 12px;
            }

            .admin-link {
                padding: 10px 14px;
            }

            .features-inner {
                grid-template-columns: 1fr;
            }

            .feature,
            .feature:nth-child(odd) {
                border-right: none;
                border-bottom: 1px solid #d4d9dd;
                padding-bottom: 25px;
            }

            .feature:last-child {
                border-bottom: none;
            }
        }
    </style>
</head>

<body>

<section class="hero">

    <div class="container">

        <header>
            <div class="header-inner">

                <img
                    src="{{ asset('images/logo_apps.jpg') }}"
                    alt="APPS"
                    class="logo"
                >

                <div class="brand">
                    <h1>
                        Associação Paulista<br>
                        de Pesca Submarina
                    </h1>

                    <div class="brand-subtitle">
                        CONSERVAÇÃO &nbsp;·&nbsp; ESPORTE &nbsp;·&nbsp; COMPANHEIRISMO
                    </div>
                </div>

                <nav>
                    <a href="/">INÍCIO</a>

                    <a href="{{ route('inscricao.create') }}">
                        ASSOCIE-SE
                    </a>

                    <a href="#">
                        CAMPEONATOS
                    </a>

                    <a href="#">
                        CONTATO
                    </a>

                    <a
                        href="{{ route('admin.login') }}"
                        class="admin-link"
                    >
                        ÁREA ADMINISTRATIVA
                    </a>
                </nav>

            </div>
        </header>

    </div>

    <div class="cta-area">

        <a
            href="{{ route('inscricao.create') }}"
            class="cta cta-primary"
        >
            <div class="cta-icon">
                ♙
            </div>

            <div class="cta-content">
                <h2>QUERO ME ASSOCIAR</h2>

                <p>
                    Cadastro simples, pagamento via PIX<br>
                    e sua carteirinha digital.
                </p>
            </div>

            <div class="cta-arrow">
                ›
            </div>
        </a>

        <a
            href="{{ route('inscricao.create') }}"
            class="cta cta-secondary"
        >
            <div class="cta-icon">
                ↻
            </div>

            <div class="cta-content">
                <h2>JÁ SOU ASSOCIADO</h2>

                <p>
                    Renove sua associação ou<br>
                    consulte sua situação.
                </p>
            </div>

            <div class="cta-arrow">
                ›
            </div>
        </a>

    </div>

</section>


<section class="features">

    <div class="features-inner">

        <div class="feature">

            <div class="feature-icon">
                🐟
            </div>

            <h3>PESCA SUBMARINA</h3>

            <p>
                Mais que um esporte,<br>
                uma relação com o mar.
            </p>

        </div>


        <div class="feature">

            <div class="feature-icon">
                👥
            </div>

            <h3>COMPANHEIRISMO</h3>

            <p>
                Uma comunidade de pessoas<br>
                que compartilham a mesma paixão.
            </p>

        </div>


        <div class="feature">

            <div class="feature-icon">
                🍃
            </div>

            <h3>RESPEITO AO AMBIENTE</h3>

            <p>
                Pesca consciente hoje,<br>
                mar vivo amanhã.
            </p>

        </div>


        <div class="feature">

            <div class="feature-icon">
                🏆
            </div>

            <h3>CAMPEONATOS</h3>

            <p>
                Eventos, rankings e<br>
                integração entre associados.
            </p>

        </div>

    </div>

</section>


<footer>

    <div class="footer-inner">

        <div class="footer-info">
            APPS
            <span class="separator">|</span>
            SÃO PAULO
            <span class="separator">|</span>
            BRASIL
        </div>

    </div>

</footer>

</body>
</html>
