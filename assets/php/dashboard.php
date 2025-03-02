<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo $_SESSION['username']; ?>!</h1>
    <p>Escolha um desafio:</p>
    <ul>
        <li><a href="login_vulneravel.php">Desafio SQL Injection</a></li>
    </ul>
    <a href="logout.php">Logout</a>
</body>
</html>