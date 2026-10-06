<?php
// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe e limpa levemente os valores (removendo espaços extras)
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);

    // Conecta ao banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "exercicio";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        // Mensagem genérica para o usuário (evita expor o erro real na tela)
        die("Desculpe, ocorreu um erro de conexão com o sistema.");
    }

    // Prepara a consulta SQL com placeholders (?) para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
    
    if ($stmt) {
        // Vincula os parâmetros ("ss" significa que ambos são strings)
        $stmt->bind_param("ss", $nome, $email);

        // Executa a consulta
        if ($stmt->execute()) {
            echo "<p style='color: green;'>Cliente cadastrado com sucesso!</p>";
        } else {
            // Mensagem genérica de erro para o usuário
            echo "<p style='color: red;'>Erro ao cadastrar o cliente. Tente novamente mais tarde.</p>";
            // Opcional: logar o erro real internamente -> error_log($stmt->error);
        }

        // Fecha a declaração preparatória
        $stmt->close();
    } else {
        echo "<p style='color: red;'>Erro interno no servidor.</p>";
    }

    // Fecha a conexão com o banco
    $conn->close();
}
?>
