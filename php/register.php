<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validação do token CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Requisição inválida.");
    }

    // Sanitização e validação dos inputs
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if (!$username || !$email || !$password) {
        die("Preencha todos os campos corretamente.");
    }

    $hashedPassword = password_hash($password, PASSWORD_ARGON2I);

    $sql = "INSERT INTO usuarios (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $conn->prepare($sql);

    try {
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword,
        ]);
        echo "Cadastro realizado com sucesso!";
    } catch (PDOException $e) {
        error_log("Erro no registro: " . $e->getMessage());
        echo "Erro interno no servidor.";
    }
}
?>
