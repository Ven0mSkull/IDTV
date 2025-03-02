<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDTV</title>
    <link rel="stylesheet" href="css/style.css">
      <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
    <!-- Seção Inicial com Vídeo de Fundo Fixo -->
    <section class="video-section">
        <video autoplay muted loop id="background-video">
            <source src="videos/video.mp4" type="video/mp4">
            Seu navegador não suporta vídeos HTML5.
        </video>

        <header>
            <div class="logo">
                <img src="images/logo1.png" alt="Logo IDTV">
                <h1>I Dont tell you the Vulnerability </h1>
            </div>
        
            <!-- Menu com retângulo atrás -->
            <nav>
                <ul>
                    <li><a href="html/Desafios.html">Desafios</a></li>
                    <li><a href="html/Ajuda.html">Ajuda</a></li>
                    <li><a href="html/Sobre.html">Sobre</a></li>
                    <li><a href="php/login.php" class="login-button">Entrar/Registar</a> </li>
                </ul>
            </nav>
        </header>

        <!-- Conteúdo da Seção Inicial -->
        <div class="hero">
            <div class="hero-text">
                <h2>Quer aprender sobre cibersegurança?</h2>
                <p>Aprenda na pratica!</p>
                <a href="php/login.html" class="btn">Get</a>
            </div>
        </div>
    </section>

    <!-- Conteúdo com Scroll -->
    <section class="content-section">
        <!-- Retângulos para Texto -->
        <div class="text-boxes">
            <div class="text-box">
                <h3>Desafios Simples</h3>
                <p>Pode apoderar do site... </p>
            </div>
            <div class="text-box">
                <h3>Se sente preso?</h3>
                <p>Não se preocupe , o IDTV fornece uma página com guias em seus desafios!.
                    basta clicar na ajuda
                </p>
            </div>
        </div>

        <!-- Espaço para mais conteúdo -->
        <div style="height: 1000px; background: rgba(0, 0, 0, 0.5); padding: 20px; color: white;">
            <h3>Mais Conteúdo</h3>
            <p>Role para baixo para ver mais conteúdo.</p>
        </div>

        <div
            class="Page">
            <h4> Sabias que entorno do mundo </h4>
        </div>
      </div>
    </section>

    <footer>
        <p>This website uses cookies to enhance your experience. <a href="#learn-more">Learn more</a>.</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>