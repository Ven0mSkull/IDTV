<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validação do token CSRF
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Requisição inválida.");
    }

    // Limpeza dos inputs
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (!$username || !$password) {
        $_SESSION['login_error'] = "Usuário ou senha incorretos.";
        header("Location: login.php");
        exit;
    }

    // Limitação de tentativas de login (rate-limiting)
    $attempt_limit = 5;
    $lockout_time = 300; // 5 minutos
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $now = time();

    if (!isset($_SESSION['failed_attempts'])) {
        $_SESSION['failed_attempts'] = [];
    }

    $_SESSION['failed_attempts'] = array_filter($_SESSION['failed_attempts'], function ($attempt) use ($now, $lockout_time) {
        return $attempt > ($now - $lockout_time);
    });

    if (count($_SESSION['failed_attempts']) >= $attempt_limit) {
        die("Muitas tentativas de login. Tente novamente mais tarde.");
    }

    // Consultar o banco de dados
    $query = $conn->prepare("SELECT * FROM usuarios WHERE username = :username OR email = :username");
    $query->execute(['username' => $username]);
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Redefinir tentativas após login bem-sucedido
        $_SESSION['failed_attempts'] = [];

        $_SESSION['username'] = $user['username'];
        $_SESSION['is_admin'] = $user['is_admin'];

        session_regenerate_id(true); // Prevenir fixação de sessão

        if ($user['is_admin'] == 1) {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        $_SESSION['failed_attempts'][] = $now; // Registrar tentativa falhada
        $_SESSION['login_error'] = "Usuário ou senha incorretos.";
        header("Location: login.php");
        exit;
    }
}
?>
