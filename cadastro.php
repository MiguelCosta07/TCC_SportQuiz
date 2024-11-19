<?php
include('conexao_bd.php');

if (isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['nome']) == 0) {
        echo "Preencha seu nome";
    } else if (strlen($_POST['email']) == 0) {
        echo "Preencha seu email";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
        $sql_query = $mysqli->query($sql_code);

        if ($sql_query) {
            echo "Cadastro realizado com sucesso!";
            header("Location: index.php");
        } else {
            echo "Falha ao cadastrar usuário: " . $mysqli->error;
        }
    }
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
    <div class="login">
        <form class="logcas" action="" method="POST">
            <h1>Cadastro</h1>
            <label for="nome">Nome</label>
            <input class="escrever" type="text" name="nome" required minlength="5">
            <label for="email">E-mail</label>
            <input class="escrever" type="email" name="email" required>
            <label for="senha">Senha</label>
            <input class="escrever" type="password" name="senha" required minlength="3">
            <button class="lcbtn" type="submit">Cadastrar</button>
            <p class="pgCadas">Já possui uma conta? <a href="index.php">Acesse aqui!</a></p>
        </form>
    </div>   
</body>
</html>
