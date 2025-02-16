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
        <p>Descubra a senha do utilizador "admin" para acessar os dados</p>

        <h2>Dicas:</h2>
        <button id="showHintButton" class="hint-button">Mostrar Dica</button>
        <div id="hint" style="display: none;">
            <ul>
                <li>Tente usar <code>' OR '1'='1</code> no campo de senha.</li>
            </ul>
        </div>
    </div>

    <script>
        // JavaScript para mostrar a dica ao clicar no botão
        document.getElementById('showHintButton').addEventListener('click', function(event) {
            event.preventDefault(); // Evita o comportamento padrão do botão
            var hint = document.getElementById('hint');
            if (hint.style.display === 'none') {
                hint.style.display = 'block';
                this.textContent = 'Ocultar Dica';
            } else {
                hint.style.display = 'none';
                this.textContent = 'Mostrar Dica';
            }
        });
    </script>
</body>
</html>