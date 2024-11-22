<?php
session_start();
include('conexao_bd.php');

$id = $_SESSION['id'];

if (isset($_POST['nome']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] == 0) {
        $foto = $_FILES['fotoPerfil'];
        $diretorio = 'imagem/uploads/';
        $nome_imagem = uniqid() . '_' . $foto['name'];
        $caminho_imagem = $diretorio . $nome_imagem;
        
        if (move_uploaded_file($foto['tmp_name'], $caminho_imagem)) {
            $sql_update_imagem = "UPDATE usuarios SET imagem_perfil = '$caminho_imagem' WHERE id = '$id'";
            $mysqli->query($sql_update_imagem);
        } else {
            echo "Erro ao carregar a imagem!";
        }
    }

    $sql_update = "UPDATE usuarios SET nome = '$nome', senha = '$senha' WHERE id = '$id'";
    if ($mysqli->query($sql_update)) {
        echo "Credenciais atualizadas com sucesso!";
    } else {
        echo "Erro ao atualizar credenciais!";
    }
}

$sql_code = "SELECT * FROM usuarios WHERE id = '$id'";
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
<body class="pag-perfil-body">
    <div class="pag-perfil-container">
    <h2 class="pag-perfil-subtitle">Foto de Perfil Atual:</h2>
    <img src="<?php echo isset($usuario['imagem_perfil']) && !empty($usuario['imagem_perfil']) ? $usuario['imagem_perfil'] : 'imagem/anonimo.png'; ?>" alt="Foto de Perfil" class="pag-perfil-img">
        <h1 class="pag-perfil-title">Alterar Credenciais</h1>
        <form action="perfil.php" method="POST" enctype="multipart/form-data" class="pag-perfil-form">
            <div class="pag-perfil-input-group">
                <label for="nome" class="pag-perfil-label">Nome:</label>
                <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" class="pag-perfil-input" required>
            </div>

            <div class="pag-perfil-input-group">
                <label for="senha" class="pag-perfil-label">Nova Senha:</label>
                <input type="password" name="senha" class="pag-perfil-input" required>
            </div>

            <div class="pag-perfil-input-group">
                <label for="fotoPerfil" class="pag-perfil-label">Foto de Perfil:</label>
                <input type="file" name="fotoPerfil" id="fotoPerfil" class="pag-perfil-file">
            </div>

            <button type="submit" class="pag-perfil-btn">Atualizar</button>
        </form>
        <br>

        <a href="principal.php" ><button type="submit" class="pag-perfil-btn">Voltar</button></a>

    </div>
    <div class="tableinfuser">
    <h2 class="tableinfuser-title">Informações do Meu Perfil</h2>
    <table class="tableinfuser-table">
        <tr>
            <th class="tableinfuser-header">Campo</th>
            <th class="tableinfuser-header">Atual</th>
        </tr>
        <tr>
            <td class="tableinfuser-cell">Nome:</td>
            <td class="tableinfuser-cell"><?php echo htmlspecialchars($usuario['nome'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
        <tr>
            <td class="tableinfuser-cell">Email:</td>
            <td class="tableinfuser-cell"><?php echo htmlspecialchars($usuario['email'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
        <tr>
            <td class="tableinfuser-cell">Pontuação:</td>
            <td class="tableinfuser-cell"><?php echo htmlspecialchars($usuario['pontuacao'], ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
    </table>
</div>

</body>
</html>
