<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Associe-se — APPS</title>

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

        .intro {
            margin: 10px 0 30px;
            color: #506575;
            font-size: 16px;
            line-height: 1.45;
        }

        /* FORMULÁRIO */

        .field {
            margin-bottom: 21px;
        }

        .field label {
            display: block;
            margin-bottom: 7px;
            font-size: 14px;
            font-weight: bold;
            color: #183d59;
        }

        .field input {
            width: 100%;
            height: 48px;
            padding: 0 14px;
            border: 1px solid #bdc8cf;
            border-radius: 4px;
            background: #fff;
            color: #183d59;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            outline: none;
        }

        .field input:focus {
            border-color: #17658c;
            box-shadow: 0 0 0 2px rgba(23, 101, 140, 0.12);
        }

        .help {
            margin-top: 6px;
            font-size: 12px;
            color: #71818c;
        }

        /* BOTÃO */

        .submit {
            width: 100%;
            height: 52px;
            margin-top: 7px;
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

        /* ERROS */

        .errors {
            margin-bottom: 25px;
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

        .back:hover {
            opacity: 1;
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

            <h2>Quero me associar</h2>

            <p class="intro">
                Preencha seus dados para iniciar sua associação.
                Na próxima etapa você verá as instruções para pagamento.
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
                action="{{ route('inscricao.store') }}"
            >

                @csrf


                <div class="field">

                    <label for="nome">
                        Nome completo
                    </label>

                    <input
                        type="text"
                        id="nome"
                        name="nome"
                        value="{{ old('nome') }}"
                        autocomplete="name"
                        required
                        autofocus
                    >

                </div>


                <div class="field">

                    <label for="cpf">
                        CPF
                    </label>

                    <input
                        type="text"
                        id="cpf"
                        name="cpf"
                        value="{{ old('cpf') }}"
                        inputmode="numeric"
                        autocomplete="off"
                        placeholder="Digite apenas os números"
                        required
                    >

                </div>


                <div class="field">

                    <label for="data_nascimento">
                        Data de nascimento
                    </label>

                    <input
                        type="date"
                        id="data_nascimento"
                        name="data_nascimento"
                        value="{{ old('data_nascimento') }}"
                        required
                    >

                </div>


                <div class="field">

                    <label for="email">
                        E-mail
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        placeholder="seuemail@exemplo.com"
                        required
                    >

                    <div class="help">
                        Usaremos este e-mail para enviar as informações da associação.
                    </div>

                </div>


                <button
                    type="submit"
                    class="submit"
                >
                    CONTINUAR
                </button>

            </form>

        </div>


        <div class="footer">

            APPS · SÃO PAULO · BRASIL

            <br>

            <a
                href="/"
                class="back"
            >
                ← Voltar para o início
            </a>

        </div>

    </div>

</div>

</body>
</html>
