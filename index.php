<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>SportQuiz</title>
</head>
<body>
    <nav class="navbar">
        <img class="logo" alt="imagemquiz" src="/imagem/testequiz.jpg">
        <h1><a href="index.php">SportQuiz</a></h1>
        <div class="nav-links">
            <h3 class="cadas"><a href="cadastro.php">Cadastrar</a></h3>
            <h3><a href="login.php">Logar</a></h3>
        </div>
    </nav>
    <div class="esporte-container">
        <form method="post">
            <div class="opcao">
                <input type="checkbox" id="futebol" name="cores[]" value="futebol">
                <label for="futebol">
                    <img class="esporte" src="/imagem/fut.jpg" alt="futebol">
                    <div class="nome">Futebol</div>
                </label>
            </div>
            <div class="opcao">
                <input type="checkbox" id="vôlei" name="cores[]" value="vôlei">
                <label for="vôlei">
                    <img class="esporte" src="/imagem/vol.jpg" alt="vôlei">
                    <div class="nome">Vôlei</div>
                </label>
            </div>
            <div class="opcao">
                <input type="checkbox" id="Basquete" name="cores[]" value="Basquete">
                <label for="Basquete">
                    <img class="esporte" src="/imagem/basquete.jpg" alt="Basquete">
                    <div class="nome">Basquete</div>
                </label>
            </div>
            <div class="opcao">
                <input type="checkbox" id="PingPong" name="cores[]" value="Basquete">
                <label for="PingPong">
                    <img class="esporte" src="/imagem/ping.jpg" alt="PingPong">
                    <div class="nome">Tênis de mesa</div>
                </label>
            </div>
            <br>
            <button class="confirmar" type="submit" name="enviar"><a href="login.php">Enviar</a></button>
        </form>
    </div>
</body>
</html>
