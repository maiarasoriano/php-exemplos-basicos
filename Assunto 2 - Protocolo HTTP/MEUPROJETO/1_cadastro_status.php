<!DOCTYPE html>
<html lang="pt-br">
<head>  
    <meta charset="UTF-8">
    <title>Cadastro de Status</title>
</head>
</html>
<body>
    <h1>Cadastro dos alunos (com status codes)</h1>

    <form method="POST" action="processar_cadastro.php">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br><br> 

        <label for="idade">idade:</label>
        <input type="text" name="idade" required><br><br>


        <button type="submit">enviar</button>
        
    </form>


<hr>

<?php
//server = variavel que armazena informações sobre cabeçalhos, caminhos e localizações de script

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    //tratamento de erro para idade
    if($nome == '' || $idade == '') {
        http_response_code(400); // Bad Request
        echo "Erro: Nome e idade são obrigatórios.";
    } elseif(!is_numeric($idade)) {
        http_response_code(422); // Unprocessable Entity
        echo "Erro: Idade deve ser um número.";
    } else {
        http_response_code(200); // OK
        echo "Cadastro realizado com sucesso! Nome: $nome, Idade: $idade";
    }
}

?>
