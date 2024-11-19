<?php
    include ('conexao_bd.php');

    if(isset($_POST['email']) || isset($_POST['senha'])){

        if(strlen($_POST['email']) == 0) {
            echo "Preencha seu email";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        } else {
            
            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha' ";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1) {
                
                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['idusuario'] = $usuario['idusuario'];
                $_SESSION['email'] = $usuario['email'];

                header("Location: principal.php");

            } else {
                echo "Falha ao logar! Email ou senha incorretos!";
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
            <h1>Acesso</h1>
            <label for="email">E-mail</label>
            <input class="escrever" type="email" name="email" required>
            <label for="senha">Senha</label>
            <input class="escrever" type="password" name="senha" required minlength="3">
            <button class="lcbtn" type="submit">Acessar</button>
            <p class="pgCadas">Não possui uma conta? <a href="cadastro.php">Cadastre-se aqui!</a></p>
        </form>
    </div>   
</body>
</html>
