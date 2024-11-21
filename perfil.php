<?php
    session_start();
    include('conexao_bd.php');


    $idusuario = $_SESSION['idusuario'];

    if(isset($_POST['nome']) && isset($_POST['senha'])) {
        $nome = $_POST['nome'];
        $senha = $_POST['senha'];

        $sql_update = "UPDATE usuarios SET nome = '$nome', senha = '$senha' WHERE idusuario = '$idusuario'";
        if($mysqli->query($sql_update)) {
            echo "Credenciais atualizadas com sucesso!";
        } else {
            echo "Erro ao atualizar credenciais!";
        }
    }

    // Buscar dados do usuário
    $sql_code = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
    $sql_query = $mysqli->query($sql_code);
    $usuario = $sql_query->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Alterar Credenciais</title>
</head>
<body>
    <h1>Alterar Credenciais</h1>
    <form action="perfil.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required><br>
        
        <label for="senha">Nova Senha:</label>
        <input type="password" name="senha" required><br>
        
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
