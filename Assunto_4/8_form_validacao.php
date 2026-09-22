<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com validação</title>
</head>
<body>
    <form action="" method="post">
        <label for="nome">Nome</label>
        <input type="text" name="nome" required> <br>

        <label for="email">E-mail</label>
        <input type="email" name="email" required> <br>

        <label for="mensagem">Mensagem</label>
        <textarea name="mensagem" required></textarea> <br>

        <button type="submit">Enviar</button>

    </form>
</body>
</html>