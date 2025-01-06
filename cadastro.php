<?php
include('conexao_bd.php');

$erro = "";  // Variável para armazenar a mensagem de erro

if (isset($_POST['nome']) || isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['nome']) == 0) {
        $erro = "Preencha seu nome";
    } else if (strlen($_POST['email']) == 0) {
        $erro = "Preencha seu email";
    } else if (strlen($_POST['senha']) == 0) {
        $erro = "Preencha sua senha";
    } else {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $_POST['senha'];

        // Verificando se o nome ou o email já estão em uso
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' OR nome = '$nome'";
        $sql_query = $mysqli->query($sql_code);

        if ($sql_query->num_rows > 0) {
            $erro = "Nome ou e-mail já estão em uso. Tente outro.";
        } else {
            // Criptografando a senha antes de salvar no banco
            $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

            // Inserindo o usuário na tabela de usuarios
            $sql_code = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha_hash')";
            $sql_query = $mysqli->query($sql_code);

            if ($sql_query) {
                echo "Cadastro realizado com sucesso!";
                header("Location: index.php");  // Redireciona para o login após o cadastro
            } else {
                $erro = "Falha ao cadastrar usuário: " . $mysqli->error;
            }
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
