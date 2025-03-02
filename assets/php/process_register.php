<?php
session_start();
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Verifica se todos os campos foram preenchidos corretamente
    if (!$username || !$email || !$password || !$confirmPassword) {
        $_SESSION['error'] = "Preencha todos os campos corretamente.";
        header("Location: login.php");
        exit();
    }

    // Verifica se as senhas coincidem
    if ($password !== $confirmPassword) {
        $_SESSION['error'] = "As senhas não coincidem.";
        header("Location: login.php");
        exit();
    }

    // Verifica se o e-mail já existe
    $sqlCheckEmail = "SELECT * FROM usuarios WHERE email = :email";
    $stmtCheckEmail = $conn->prepare($sqlCheckEmail);
    $stmtCheckEmail->execute([':email' => $email]);

    if ($stmtCheckEmail->rowCount() > 0) {
        $_SESSION['error'] = "E-mail já está em uso.";
        header("Location: login.php");
        exit();
    }

    // Verifica se o username já existe
    $sqlCheckUsername = "SELECT * FROM usuarios WHERE username = :username";
    $stmtCheckUsername = $conn->prepare($sqlCheckUsername);
    $stmtCheckUsername->execute([':username' => $username]);

    if ($stmtCheckUsername->rowCount() > 0) {
        $_SESSION['error'] = "Nome de usuário já está em uso.";
        header("Location: login.php");
        exit();
    }

    // Criptografa a senha
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insere o novo usuário
    $sqlInsert = "INSERT INTO usuarios (username, email, password) VALUES (:username, :email, :password)";
    $stmtInsert = $conn->prepare($sqlInsert);

    try {
        $stmtInsert->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword,
        ]);

        $_SESSION['success'] = "Cadastro realizado com sucesso! Faça login.";
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        $_SESSION['error'] = "Erro interno no servidor.";
        header("Location: login.php");
        exit();
    }
}
?>