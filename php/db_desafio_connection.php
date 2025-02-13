<?php
$host = 'localhost';
$db   = 'desafio_db';
$user = 'root';
$pass = '';

try {
    $conn_desafio = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn_desafio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>