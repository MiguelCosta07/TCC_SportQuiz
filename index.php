<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>SportQuiz</title>
    <nav class="navbar">
        <img class="logo" alt="imagemquiz" src="/imagem/testequiz.jpg">
        <h1><a href="index.php">SportQuiz</a></h1>
        <div class="nav-links">
            <h3 class="cadas"><a href="cadastro.php">Cadastrar</a></h3>
            <h3><a href="login.php">Logar</a></h3>
        </div>
    </nav>
</head>
<body>
    <h2 class="escolha">Selecione seu esporte favorito:</h2>
    <div class="esporte-container">
        <form method="post">
            <div class="opcao">
                <label for="futebol">
                <div class="nome">Futebol</div>
                <img class="esporte" src="/imagem/fut.jpg" alt="futebol">
                <br>
                <input class="check" type="checkbox" id="futebol" name="cores[]" value="futebol">
                </label>
            </div>
            <div class="opcao">
                <label for="Tênis">
                    <div class="nome">Tênis</div>
                    <img class="esporte" src="/imagem/tenis.jpg" alt="Tênis">
                    <br>
                    <input class="check" type="checkbox" id="Tênis" name="cores[]" value="Tênis">
                </label>
            </div>
            <div class="opcao">
                <label for="Basquete">
                    <div class="nome">Basquete</div>
                    <img class="esporte" src="/imagem/basquete.jpg" alt="Basquete">
                    <br>
                    <input class="check" type="checkbox" id="Basquete" name="cores[]" value="Basquete">
                </label>
            </div>
            <br></br>
            <div class="opcao">
                
                <label for="PingPong">
                    <div class="nome">Tênis de mesa</div>
                    <img class="esporte" src="/imagem/ping.jpg" alt="PingPong">
                    <br>
                    <input class="check" type="checkbox" id="PingPong" name="cores[]" value="PingPong">
                </label>
            </div>
            <div class="opcao">
 
                <label for="Surfe">
                    <div class="nome">Surfe</div>
                    <img class="esporte" src="/imagem/surf.jpg" alt="Surfe">
                    <br>
                    <input class="check" type="checkbox" id="Surfe" name="cores[]" value="Surfe">
                </label>
            </div>
            <br>
        </form>
    </div>
</body>
<footer>

</footer>
</html>
