<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registrar</title>
    <link rel="stylesheet" href="../css/responsive.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <section class="video-section">
        <video autoplay muted loop id="background-video">
            <source src="videos/backgroundvideo.mp4" type="video/mp4">
        </video>
    </section>
    
    <div class="container">
        <div class="form-box login">
            <form action="process_login.php" method="POST">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Nome" required> 
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Esqueceu a palavra-passe?</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <p class="entrar-rede-social">Ou entrar com rede social</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin-square'></i></a>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <form action="register.php" method="POST">
                <h1>Registro</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Nome de usuário" required> 
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Email" required> 
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="confirm_password" placeholder="Confirmar senha" required> 
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn">Registrar</button>
                <p class="entrar-rede-social">Ou registrar com rede social</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google'></i></a>
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-github'></i></a>
                    <a href="#"><i class='bx bxl-linkedin-square'></i></a>
                </div>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Bem vindo de volta!</h1>
                <p class="no-account">Não tem conta?</p>
                <button class="btn register-btn">Registar</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Bem vindo!</h1>
                <p class="has-account">Já tens conta?</p>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>

    <script src="../js/responsive.js"></script>
</body>
</html>
