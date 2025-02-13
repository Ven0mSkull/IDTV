<?php
require 'db_desafio_connection.php'; // Conexão com o desafio_db

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta vulnerável a SQL Injection
    $query = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn_desafio->query($query);

    if ($result->rowCount() > 0) {
        echo "<p class='success'>Login bem-sucedido!</p>";
    } else {
        echo "<p class='error'>Credenciais inválidas.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio SQL Injection</title>
    <link rel="stylesheet" href="../css/loginvulneravel.css"> <!-- Vincula o arquivo CSS -->
</head>
<body>
    <div class="container">
        <h1>Desafio SQL Injection</h1>
        <form method="POST" action="">
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit">Login</button>
        </form>

        <h2>Objetivo do Desafio:</h2>
        <p>Descubra o nome de um usuário na base de dados usando SQL Injection.</p>

        <h2>Dicas:</h2>
        <ul>
            <li>Tente usar <code>' OR '1'='1</code> no campo de senha.</li>
            <li>Use <code>UNION SELECT</code> para extrair informações da base de dados.</li>
            <li>O nome do usuário que você precisa descobrir começa com <code>john</code>.</li>
        </ul>
    </div>
</body>
</html>