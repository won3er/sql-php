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

// Função para deletar um item
function deletarItem($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM itens WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Verifica se o ID foi passado
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    deletarItem($id);
    header("Location: index.html"); // Redireciona para a página inicial
}
?>
