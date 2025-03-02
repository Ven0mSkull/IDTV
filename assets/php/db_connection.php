<?php
$host = 'localhost'; // ou o endereço do seu servidor de banco de dados
$dbname = 'dbidtv';
$username = 'root'; // substitua pelo seu usuário do banco de dados
$password = ''; // substitua pela sua senha do banco de dados

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>