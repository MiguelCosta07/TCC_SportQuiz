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
    <div class="login">
        <form class="logcas">
            <h1>Log in</h1>
            <label for="usuario">Usuário</label>
            <input class="escrever" type="text" id="usuario">
            <label for="senha">Senha</label>
            <input class="escrever" type="password" id="senha">
            <button class="lcbtn" type="submit">Logar</button>
            <p class="pgCadas">Não possui uma conta? <a href="cadastro.php">Cadastre-se aqui!</a></p>
        </form>
    </div>   
</body>
</html>
