<!-- Digite sua solução para o desafio (AQUI) -->

<?php
// Configurações do Banco de Dados
$host = 'localhost';
$db   = 'exercicio';
$user = 'root';
$pass = 'Senai@118';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

?>

<?php

// Variáveis para armazenar mensagens de feedback
$mensagemSucesso = "";
$mensagensErro = [];

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Captura e limpa os dados recebidos (removendo espaços extras)
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $preco = isset($_POST['preco']) ? trim($_POST['preco']) : '';

    // --- REGRAS DE VALIDAÇÃO ---
    
    // 1. Valida o Nome do Produto
    if (empty($nome)) {
        $mensagensErro[] = "O nome do produto não pode estar vazio.";
    }

    // 2. Valida o Preço (deve ser numérico e maior que zero)
    // Substitui a vírgula por ponto para aceitar o formato decimal brasileiro
    $precoFormatado = str_replace(',', '.', $preco);

    if (!is_numeric($precoFormatado)) {
        $mensagensErro[] = "O preço deve ser um número válido.";
    } elseif ($precoFormatado <= 0) {
        $mensagensErro[] = "Erro: O preço deve ser um número positivo.";
    }

    // --- INSERÇÃO NO BANCO DE DADOS ---
    // Se não houver nenhum erro de validação, prossegue com a inserção
    if (empty($mensagensErro)) {
        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
            
            // Prepara a query SQL (Prepared Statements para maior segurança)
            $sql = "INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)";
            $stmt = $pdo->prepare($sql);
            
            // Executa passando os dados validados
            $stmt->execute([
                ':nome' => $nome,
                ':preco' => $precoFormatado
            ]);

            $mensagemSucesso = "Produto cadastrado com sucesso!";
            
            // Limpa os campos após o sucesso
            $nome = "";
            $preco = "";
            
        } catch (\PDOException $e) {
            // Em produção, registre o erro em log e mostre uma mensagem amigável
            $mensagensErro[] = "Erro de conexão com o banco de dados: " . $e->getMessage();
        }
    }
}
?>

<div class="container">
    <h2>Cadastrar Produto</h2>

<div id="container-mensagens">
    <!-- Exibição de Mensagem de Sucesso -->
    <?php if (!empty($mensagemSucesso)): ?>
        <div class="alerta sucesso">
            <?php echo $mensagemSucesso; ?>
        </div>
    <?php endif; ?>

    <!-- Exibição de Mensagens de Erro -->
    <?php if (!empty($mensagensErro)): ?>
        <div class="alerta erro">
            <?php foreach ($mensagensErro as $erro): ?>
                <p style="margin: 5px 0;"><?php echo $erro; ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script>
    // Executa o código assim que a página termina de carregar
    window.addEventListener('DOMContentLoaded', (event) => {
        const container = document.getElementById('container-mensagens');
        
        // Verifica se existe alguma mensagem sendo exibida
        if (container && container.innerText.trim() !== "") {
            // Aguarda 5 segundos (5000ms) e esconde o bloco
            setTimeout(() => {
                container.style.transition = "opacity 0.5s ease";
                container.style.opacity = "0";
                
                // Remove do fluxo da página após a animação de sumir
                setTimeout(() => {
                    container.style.display = "none";
                }, 500);
            }, 5000);
        }
    });
</script>


    <!-- Formulário HTML -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group">
            <label Lothfor="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" value="<?php echo isset($nome) ? htmlspecialchars($nome) : ''; ?>">
        </div>

        <div class="form-group">
            <label for="preco">Preço (R$):</label>
            <!-- O atributo step="0.01" permite números decimais no HTML5 -->
            <input type="number" id="preco" name="preco" step="0.01" value="<?php echo isset($preco) ? htmlspecialchars($preco) : ''; ?>">
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>
