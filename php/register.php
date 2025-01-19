<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':email' => $email,
        ':password' => $password,
    ]);

    echo "Cadastro realizado com sucesso!";
}
?>
