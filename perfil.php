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
    $senha = isset($_POST['senha']) && !empty(trim($_POST['senha'])) ? trim($_POST['senha']) : null;

    // Verifica se a imagem foi enviada
    if (isset($_FILES['fotoPerfil']) && $_FILES['fotoPerfil']['error'] == 0) {
        $foto = $_FILES['fotoPerfil'];
        $diretorio = 'imagem/uploads/';
        $nome_imagem = uniqid() . '_' . basename($foto['name']);
        $caminho_imagem = $diretorio . $nome_imagem;

        if (move_uploaded_file($foto['tmp_name'], $caminho_imagem)) {
            // Verifica se a imagem é igual à antiga
            if ($caminho_imagem === $usuario['imagem_perfil']) {
                $message = "Você não pode mudar sua imagem utilizando a mesma antiga.";
            } else {
                $sql_update_imagem = "UPDATE usuarios SET imagem_perfil = ? WHERE id = ?";
                $stmt_imagem = $mysqli->prepare($sql_update_imagem);
                $stmt_imagem->bind_param("si", $caminho_imagem, $id);
                $stmt_imagem->execute();
            }
        } else {
            $message = "Erro ao carregar a imagem!";
        }
    }

    // Verifica se o nome ou a senha são iguais aos antigos
    if ($nome || $senha) {
        $updates = [];
        $params = [];
        $types = "";

        if ($nome) {
            if ($nome === $usuario['nome']) {
                $message = "Você não pode mudar seu nome utilizando o mesmo antigo.";
            } else {
                $updates[] = "nome = ?";
                $params[] = $nome;
                $types .= "s";
            }
        }

        if ($senha) {
            if ($senha === $usuario['senha']) {
                $message = "Você não pode mudar sua senha utilizando a mesma antiga.";
            } else {
                $updates[] = "senha = ?";
                $params[] = $senha;
                $types .= "s";
            }
        }

        if (!empty($updates)) {
            $params[] = $id;
            $types .= "i";

            $sql_update = "UPDATE usuarios SET " . implode(", ", $updates) . " WHERE id = ?";
            $stmt = $mysqli->prepare($sql_update);
            $stmt->bind_param($types, ...$params);

            if ($stmt->execute()) {
                $message = "Credenciais atualizadas com sucesso!";
            } else {
                $message = "Erro ao atualizar credenciais!";
            }
        }
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
                <input type="text" name="nome" class="pag-perfil-input">
            </div>

            <div class="pag-perfil-input-group">
                <label for="senha" class="pag-perfil-label">Nova Senha:</label>
                <input type="password" name="senha" class="pag-perfil-input">
            </div>

            <div class="pag-perfil-input-group">
                <label for="fotoPerfil" class="pag-perfil-label">Foto de Perfil:</label>
                <input type="file" name="fotoPerfil" id="fotoPerfil" class="pag-perfil-file">
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
