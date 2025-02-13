<?php
$host = 'localhost';
$db   = 'desafio_db';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta vulnerável a SQL Injection
    $query = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Login bem-sucedido!";
    } else {
        echo "Credenciais inválidas.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio SQL Injection</title>
</head>
<body>
    <h1>Desafio SQL Injection</h1>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>

    <h2>Dicas:</h2>
    <p>Tente usar <code>' OR '1'='1</code> no campo de senha.</p>
</body>
</html>