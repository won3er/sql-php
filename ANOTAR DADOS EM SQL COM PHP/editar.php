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

// Função para editar um item
function editarItem($id, $nome, $valor) {
    global $conn;
    $stmt = $conn->prepare("UPDATE itens SET nome = ?, valor = ? WHERE id = ?");
    $stmt->bind_param("sdi", $nome, $valor, $id);
    $stmt->execute();
    $stmt->close();
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    editarItem($id, $nome, $valor);
    header("Location: index.html"); // Redireciona para a página inicial
}
?>
