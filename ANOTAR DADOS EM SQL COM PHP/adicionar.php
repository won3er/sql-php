<?php
$servername = "localhost"; // Substitua pelo seu servidor
$username = "root"; // Substitua pelo seu usuário
$password = ""; // Substitua pela sua senha
$dbname = "seu_banco_de_dados"; // Substitua pelo seu banco de dados

// Conexão ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Função para adicionar um item
function adicionarItem($nome, $valor) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO itens (nome, valor) VALUES (?, ?)");
    $stmt->bind_param("sd", $nome, $valor);
    $stmt->execute();
    $stmt->close();
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    adicionarItem($nome, $valor);
    header("Location: index.html"); // Redireciona para a página inicial
}
?>
