<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

$servername = "localhost";
$username = "Lucas";
$password = "123qwe";
$dbname = "sistema";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
