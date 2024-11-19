<?php
     if(!isset($_SESSION)) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>SportQuiz</title>
    <nav class="navbar">
        <img class="logo" alt="imagemquiz" src="./imagem/testequiz.jpg">
        <h1><a href="index.php">SportQuiz</a></h1>
    </nav>
</head>
<body class="bodyprincipal">
    <h2 class="escolha">Selecione seu esporte favorito:</h2>
    <div class="esporte-container">
        <form method="post">
            <div class="opcao">
                <label for="futebol">
            <a href="fut.php">
                <div class="nome">Futebol</div>
                <img class="esporte" src="./imagem/fut.jpg" alt="futebol">
            </a>
                <br>
                <input class="check" type="checkbox" id="futebol" name="cores[]" value="futebol">
                </label>
            </div>
            <div class="opcao">
                <label for="Tênis">
            <a href="tenis.php">
                    <div class="nome">Tênis</div>
                    <img class="esporte" src="./imagem/tenis.jpg" alt="Tênis">
            </a>
                    <br>
                    <input class="check" type="checkbox" id="Tênis" name="cores[]" value="Tênis">
                </label>
            </div>
            <div class="opcao">
                <label for="Basquete">
            <a href="basquete.php">
                    <div class="nome">Basquete</div>
                    <img class="esporte" src="./imagem/basquete.jpg" alt="Basquete">
            </a>
                    <br>
                    <input class="check" type="checkbox" id="Basquete" name="cores[]" value="Basquete">
                </label>
            </div>
            <br></br>
            <div class="opcao">
                <label for="PingPong">
            <a href="ping.php">
                    <div class="nome">Tênis de mesa</div>
                    <img class="esporte" src="./imagem/ping.jpg" alt="PingPong">
            </a>
                    <br>
                    <input class="check" type="checkbox" id="PingPong" name="cores[]" value="PingPong">
                </label>
            </div>
            <div class="opcao">
 
                <label for="Surfe">
            <a href="surf.php">
                    <div class="nome">Surfe</div>
                    <img class="esporte" src="./imagem/surf.jpg" alt="Surfe">
            </a>
                    <br>
                    <input class="check" type="checkbox" id="Surfe" name="cores[]" value="Surfe">
                </label>
            </div>
            <br>
        </form>
    </div>
</body>
<footer>
<div class="footer-content">
            <div class="footer-section about">
                <h3>Sobre Nós</h3>
                <p>Somos uma empresa dedicada a criar experiências únicas e emocionantes para os amantes de esportes ao redor do mundo. Estimulando seu conhecimento e aprendizagem!</p>
            </div>
            <div class="footer-section social">
                <h3>Siga-nos</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
                    <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                    <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 Empresa de Jogos. Todos os direitos reservados.
        </div>
</footer>
</html>
