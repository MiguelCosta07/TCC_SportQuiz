<?php
    include ('conexao_bd.php');
    $erro = "";  // Variável para armazenar a mensagem de erro

    if(isset($_POST['email']) || isset($_POST['senha'])){

        if(strlen($_POST['email']) == 0) {
            $erro = "Preencha seu email";
        } else if(strlen($_POST['senha']) == 0) {
            $erro = "Preencha sua senha";
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

                $_SESSION['id'] = $usuario['id'];  
                $_SESSION['email'] = $usuario['email'];

                header("Location: principal.php");

            } else {
                $erro = "Falha ao logar! Email ou senha incorretos!";
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
    <h1 class="TituloLogCas"> SportQuiz </h1>
</head>
<body class="bodyprincipal">
    <div class="login">
        <form class="logcas" action="" method="POST">

        <?php if($erro): ?>
            <div class="erro-mensagem"><?php echo $erro; ?></div>
        <?php endif; ?>

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
