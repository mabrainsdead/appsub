<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição - APPS</title>
</head>

<body>

<h1>Associação de Pesca Submarina de São Paulo</h1>

<h2>Nova inscrição</h2>

<form method="POST" action="#">
    @csrf

    <div>
        <label for="nome">Nome completo</label><br>
        <input type="text" id="nome" name="nome" required>
    </div>

    <br>

    <div>
        <label for="cpf">CPF</label><br>
        <input type="text" id="cpf" name="cpf" required>
    </div>

    <br>

    <div>
        <label for="data_nascimento">Data de nascimento</label><br>
        <input type="date" id="data_nascimento" name="data_nascimento" required>
    </div>

    <br>

    <div>
        <label for="email">E-mail</label><br>
        <input type="email" id="email" name="email" required>
    </div>

    <br>

    <button type="submit">Continuar</button>
</form>

</body>
</html>
