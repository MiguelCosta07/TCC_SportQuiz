<?php
session_start();
include('conexao_bd.php');

$id = $_SESSION['id'];
$message = ""; // Variável para exibir mensagens

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados atuais do usuário
    $sql_code = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = $mysqli->prepare($sql_code);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    $nome = isset($_POST['nome']) && !empty(trim($_POST['nome'])) ? trim($_POST['nome']) : null;
    $senha_atual = isset($_POST['senha_atual']) && !empty(trim($_POST['senha_atual'])) ? trim($_POST['senha_atual']) : null;
    $senha_nova = isset($_POST['senha_nova']) && !empty(trim($_POST['senha_nova'])) ? trim($_POST['senha_nova']) : null;

    $alterou_imagem = false;
    $alterou_nome = false;
    $alterou_senha = false;

    // Verifica se a imagem foi enviada
    if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] == 0) {
        $foto = $_FILES['fotoPerfil'];
        $diretorio = 'imagem/uploads/';
        $nome_imagem = uniqid() . '_' . basename($foto['name']);
        $caminho_imagem = $diretorio . $nome_imagem;

        if (move_uploaded_file($foto['tmp_name'], $caminho_imagem)) {
            // Verifica se a imagem é igual à antiga
            if ($caminho_imagem !== $usuario['imagem_perfil']) {
                $sql_update_imagem = "UPDATE usuarios SET imagem_perfil = ? WHERE id = ?";
                $stmt_imagem = $mysqli->prepare($sql_update_imagem);
                $stmt_imagem->bind_param("si", $caminho_imagem, $id);
                $stmt_imagem->execute();
                $alterou_imagem = true;
            } else {
                $message = "Você não pode mudar sua imagem utilizando a mesma antiga.";
            }
        } else {
            $message = "Erro ao carregar a imagem!";
        }
    }

    // Verifica se a senha atual está correta antes de permitir alteração
    if ($senha_atual && password_verify($senha_atual, $usuario['senha'])) {
        // Se a senha nova foi fornecida
        if ($senha_nova) {
            if (password_verify($senha_nova, $usuario['senha'])) {
                $message = "A nova senha não pode ser igual à sua senha atual.";
            } else {
                // Criptografa a nova senha antes de salvar
                $senha_nova_hash = password_hash($senha_nova, PASSWORD_DEFAULT);
                $sql_update_senha = "UPDATE usuarios SET senha = ? WHERE id = ?";
                $stmt_senha = $mysqli->prepare($sql_update_senha);
                $stmt_senha->bind_param("si", $senha_nova_hash, $id);
                $stmt_senha->execute();
                $alterou_senha = true;
            }
        }
    } elseif ($senha_atual) {
        $message = "A senha atual está incorreta!";
    }

    // Verifica se o nome foi alterado
    if ($nome && $nome !== $usuario['nome']) {
        $sql_update_nome = "UPDATE usuarios SET nome = ? WHERE id = ?";
        $stmt_nome = $mysqli->prepare($sql_update_nome);
        $stmt_nome->bind_param("si", $nome, $id);
        $stmt_nome->execute();
        $alterou_nome = true;
    }

    // Exibe a mensagem de acordo com as alterações feitas
    if ($alterou_imagem && $alterou_nome && $alterou_senha) {
        $message = "Você alterou sua foto de perfil, nome e senha com sucesso!";
    } elseif ($alterou_imagem && $alterou_nome) {
        $message = "Você alterou sua foto de perfil e nome com sucesso!";
    } elseif ($alterou_imagem && $alterou_senha) {
        $message = "Você alterou sua foto de perfil e senha com sucesso!";
    } elseif ($alterou_nome && $alterou_senha) {
        $message = "Você alterou seu nome e senha com sucesso!";
    } elseif ($alterou_imagem) {
        $message = "Você alterou sua foto de perfil com sucesso!";
    } elseif ($alterou_nome) {
        $message = "Você alterou seu nome com sucesso!";
    } elseif ($alterou_senha) {
        $message = "Você alterou sua senha com sucesso!";
    }
}

// Recupera os dados do usuário novamente para exibição
$sql_code = "SELECT u.*, r.pontuacao 
             FROM usuarios u 
             LEFT JOIN ranking r ON u.id = r.id_usuario 
             WHERE u.id = ?";
$stmt = $mysqli->prepare($sql_code);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <div class="message-container">
        <?php if (!empty($message)): ?>
          <p class="message"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
    </div>
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
                <input type="text" name="nome" class="pag-perfil-input" value="<?php echo htmlspecialchars($usuario['nome'], ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="pag-perfil-input-group">
                <label for="fotoPerfil" class="pag-perfil-label">Foto de Perfil:</label>
                <input type="file" name="fotoPerfil" id="fotoPerfil" class="pag-perfil-file">
            </div>

            <div class="pag-perfil-input-group">
                <label for="senha_nova" class="pag-perfil-label">Nova Senha:</label>
                <input type="password" name="senha_nova" class="pag-perfil-input" minlength="3">
            </div>

            <div class="pag-perfil-input-group">
                <label for="senha_atual" class="pag-perfil-label">Senha Atual:</label>
                <input type="password" name="senha_atual" class="pag-perfil-input" required minlength="3">
            </div>

            <button type="submit" class="pag-perfil-btn">Atualizar</button>
        </form>
        <br>

        <a href="principal.php"><button class="pag-perfil-btn">Voltar</button></a>
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
