<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>SportQuiz</title>
</head>
<body>
    <h2 class="escolha">Selecione seu esporte favorito:</h2>
    <br>
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
                <label for="futebol">
                <div class="nome">Futebol</div>
                <img class="esporte" src="/imagem/fut.jpg" alt="futebol">
                <br>
                <input type="checkbox" id="futebol" name="cores[]" value="futebol">
                </label>
            </div>
            <div class="opcao">
                <label for="vôlei">
                    <div class="nome">Vôlei</div>
                    <img class="esporte" src="/imagem/vol.jpg" alt="vôlei">
                    <br>
                    <input type="checkbox" id="vôlei" name="cores[]" value="vôlei">
                </label>
            </div>
            <div class="opcao">
                <label for="Basquete">
                    <div class="nome">Basquete</div>
                    <img class="esporte" src="/imagem/basquete.jpg" alt="Basquete">
                    <br>
                    <input type="checkbox" id="Basquete" name="cores[]" value="Basquete">
                </label>
            </div>
            <div class="opcao">
                
                <label for="PingPong">
                    <div class="nome">Tênis de mesa</div>
                    <img class="esporte" src="/imagem/ping.jpg" alt="PingPong">
                    <br>
                    <input type="checkbox" id="PingPong" name="cores[]" value="Basquete">
                </label>
            </div>
            <br>
            <button class="confirmar" type="submit" name="enviar"><a href="login.php">Enviar</a></button>
        </form>
    </div>
</body>
</html>
