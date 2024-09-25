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

// Função para listar itens
function listarItens() {
    global $conn;
    $result = $conn->query("SELECT * FROM itens");
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Nome: " . $row["nome"] . " - Valor: " . $row["valor"] . "<br>";
    }
}

listarItens();
?>
