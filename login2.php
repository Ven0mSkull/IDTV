<?php
if (isset($_POST['submit'])) 
{
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Substitua esses valores pelos seus valores reais de nome de usuário e senha
    $nome_correto = 'usuario';
    $senha_correta = 'senha123';

    // Verifica se o nome de usuário e a senha estão corretos
    if ($nome === $nome_correto && $senha === $senha_correta) {
        // Redireciona para a página de sucesso
        header('Location: ../sucesso.html');
        exit();
    } else {
        // Redireciona de volta para a página de login com um parâmetro de erro
        header('Location: ../login.html?erro=1');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../sucesso.css">
    <title>Tela de Login</title>
</head>
<body>
    <div class="cat">
        <img src="../images/catblack.png" alt="cat">
    </div>
    <section class="area-login">
        <div class="Login">
            <div>
                <img class="logo" src="../images/idty.png" alt="Logo">
            </div>
            <form action="login.php" method="POST">
                <h1>Login</h1>
                <input type="text" name="nome" placeholder="Nome do usuário">
                <br><br>
                <input type="password" name="senha" placeholder="Senha">
                <br><br>
                <input type="submit" name="submit" value="Entrar">
                <?php
                if (isset($_GET['erro'])) {
                    echo '<p style="color:red;">Nome de usuário ou senha incorretos</p>';
                }
                ?>
            </form>
            <p>Ainda não criou uma conta? <a href="../naotedigo.html">Criar conta!</a></p>
            <div>
                <a href="../help.html" id="Help">Help!</a>
            </div>
        </div>
    </section>
</body>
</html>