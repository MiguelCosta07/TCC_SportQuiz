<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css"> <!-- Link para o arquivo CSS -->
    <title>SportQuiz</title>
    <img class="logo" alt="imagemquiz" src="/imagem/testequiz.jpg">
    <h1>SportQuiz</h1>
    <h3 class="cadas">Cadastrar</h3>
    <h3 class="login">Login</h3>
</head>
<body>
<form method="post">
        <div class="opcao">
            <input type="checkbox" id="futebol" name="cores[]" value="futebol">
            <label for="futebol">
                <img class="sport" src="/imagem/fut.jpg" alt="futebol">
                <div class="name">Futebol</div>
            </label>
        </div>
        <div class="opcao">
            <input type="checkbox" id="vôlei" name="cores[]" value="vôlei">
            <label for="vôlei">
                <img class="sport" src="/imagem/vol.jpg" alt="vôlei">
                <div class="name">Vôlei</div>
            </label>
        </div>
        <br>
        <div class="opcao">
            <input type="checkbox" id="Basquete" name="cores[]" value="Basquete">
            <label for="Basquete">
                <img class="sport" src="/imagem/basquete.jpg" alt="Basquete">
                <div class="name">Basquete</div>
            </label>
        </div>
        <div class="opcao">
            <input type="checkbox" id="PingPong" name="cores[]" value="Basquete">
            <label for="PingPong">
                <img class="sport" src="/imagem/ping.jpg" alt="PingPong">
                <div class="name">Tênis de mesa</div>
            </label>
        </div>
        <br>
        <button class="confirmar" type="submit" name="enviar">Enviar</button>
    </form>
</body>
</html>