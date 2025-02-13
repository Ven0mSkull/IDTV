<?php
session_start(); // Inicia a sessão
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login bem-sucedido
            $_SESSION['user_id'] = $user['id']; // Armazena o ID do usuário na sessão
            $_SESSION['username'] = $user['username']; // Armazena o nome de usuário na sessão
            header("Location: dashboard.php"); // Redireciona para o dashboard
            exit();
        } else {
            // Login falhou
            $_SESSION['error'] = "Usuário ou senha incorretos!";
            header("Location: login.php");
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Erro ao fazer login: " . $e->getMessage();
        header("Location: login.php");
        exit();
    }
}
?>