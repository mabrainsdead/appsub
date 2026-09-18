<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscrição manual - APPS</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f5f7;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 18px rgba(0,0,0,.08);
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        .botao {
            display: inline-block;
            margin-top: 25px;
            padding: 12px 20px;
            border: 0;
            border-radius: 6px;
            background: #0b5d7a;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .erro {
            background: #ffe5e5;
            color: #a00000;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .voltar {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Inscrição manual</h1>

        <p>
            Cadastre uma nova associação ou renove um associado existente.
        </p>

        @if ($errors->any())
            <div class="erro">
                @foreach ($errors->all() as $erro)
                    <div>{{ $erro }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.inscricoes-manual.store') }}">

            @csrf

            <label for="cpf">CPF</label>

            <input
                type="text"
                id="cpf"
                name="cpf"
                value="{{ old('cpf') }}"
                inputmode="numeric"
                maxlength="14"
                placeholder="000.000.000-00"
                required
            >

            <label for="nome">Nome</label>

            <input
                type="text"
                id="nome"
                name="nome"
                value="{{ old('nome') }}"
                required
            >

            <label for="data_nascimento">Data de nascimento</label>

            <input
                type="date"
                id="data_nascimento"
                name="data_nascimento"
                value="{{ old('data_nascimento') }}"
                required
            >

            <label for="email">E-mail</label>

            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
            >

            <label for="valor">Valor pago</label>

            <input
                type="number"
                id="valor"
                name="valor"
                value="{{ old('valor', '80.00') }}"
                step="0.01"
                min="0"
                required
            >

            <button type="submit" class="botao">
                Registrar inscrição
            </button>

        </form>

        <a href="{{ route('admin.index') }}" class="voltar">
            ← Voltar ao painel
        </a>

    </div>

</div>

<script>
    document.getElementById('cpf').addEventListener('input', function () {
        let valor = this.value.replace(/\D/g, '');

        valor = valor.substring(0, 11);

        if (valor.length > 9) {
            valor = valor.replace(
                /(\d{3})(\d{3})(\d{3})(\d{0,2})/,
                '$1.$2.$3-$4'
            );
        } else if (valor.length > 6) {
            valor = valor.replace(
                /(\d{3})(\d{3})(\d{0,3})/,
                '$1.$2.$3'
            );
        } else if (valor.length > 3) {
            valor = valor.replace(
                /(\d{3})(\d{0,3})/,
                '$1.$2'
            );
        }

        this.value = valor;
    });
</script>

</body>
</html>
