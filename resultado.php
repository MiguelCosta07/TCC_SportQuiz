<?php
session_start();
include('conexao_bd.php');

if (!isset($_SESSION['id'])) {
    die("Acesso negado.");
}

$id_usuario = $_SESSION['id'];
$total_pontos = 0;
$acertos = 0;
$erros = 0;

$questoes = []; // Array para armazenar o resultado de cada questão

foreach ($_POST as $key => $value) {
    if (strpos($key, 'pergunta_') === 0) {
        $id_alternativa = (int)$value;

        $query = "SELECT val_resposta, resposta, pergunta_id FROM alternativas WHERE id = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i", $id_alternativa);
        $stmt->execute();
        $result = $stmt->get_result();
        $alternativa = $result->fetch_assoc();

        $pergunta_id = str_replace('pergunta_', '', $key);
        $query_questao = "SELECT questao, id_dificuldade FROM perguntas WHERE id = ?";
        $stmt_questao = $mysqli->prepare($query_questao);
        $stmt_questao->bind_param("i", $pergunta_id);
        $stmt_questao->execute();
        $result_questao = $stmt_questao->get_result();
        $questao = $result_questao->fetch_assoc();

        $id_dificuldade = $questao['id_dificuldade'];
        $pontos = 0;

        // Mapear os valores de id_dificuldade para os pontos correspondentes
        switch ($id_dificuldade) {
            case 1: // Fácil
                $pontos = 1;
                break;
            case 2: // Médio
                $pontos = 2;
                break;
            case 3: // Difícil
                $pontos = 3;
                break;
            default:
                $pontos = 1; // Padrão caso a dificuldade não seja reconhecida
                break;
        }

        if ($alternativa['val_resposta'] == 1) {
            $acertos++;
            $total_pontos += $pontos; // Adicionar pontos baseados na dificuldade
            $status = "Acertou";
        } else {
            $erros++;
            $status = "Errou";
        }

        $questoes[] = [
            'questao' => $questao['questao'],
            'resposta' => $alternativa['resposta'],
            'status' => $status,
            'dificuldade' => $id_dificuldade,
            'pontos' => $pontos
        ];
    }
}

// Agora, vamos atualizar a pontuação do usuário na tabela 'ranking'
$query_atualizar_pontos = "SELECT pontuacao FROM ranking WHERE id_usuario = ?";
$stmt_atualizar = $mysqli->prepare($query_atualizar_pontos);
$stmt_atualizar->bind_param("i", $id_usuario);
$stmt_atualizar->execute();
$result_atualizar = $stmt_atualizar->get_result();
$usuario = $result_atualizar->fetch_assoc();

if ($usuario) {
    // Se o usuário já tiver uma pontuação no ranking, somar a pontuação
    $pontos_atualizados = $usuario['pontuacao'] + $total_pontos;

    $query_update = "UPDATE ranking SET pontuacao = ? WHERE id_usuario = ?";
    $stmt_update = $mysqli->prepare($query_update);
    $stmt_update->bind_param("ii", $pontos_atualizados, $id_usuario);
    $stmt_update->execute();
} else {
    // Se o usuário não tiver uma pontuação no ranking, criar uma nova entrada
    $query_insert = "INSERT INTO ranking (id_usuario, pontuacao) VALUES (?, ?)";
    $stmt_insert = $mysqli->prepare($query_insert);
    $stmt_insert->bind_param("ii", $id_usuario, $total_pontos);
    $stmt_insert->execute();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Resultado</title>
</head>
<body class="result-body">
    <div class="result-container">
        <h1 class="result-title">Resultado do Quiz</h1>
        <p class="result-summary">Você acertou <strong><?php echo $acertos; ?></strong> questões e errou <strong><?php echo $erros; ?></strong>.</p>
        <p class="result-score">Sua pontuação final foi: <strong><?php echo $total_pontos; ?> pontos</strong>.</p>

        <div class="result-questions">
            <h2 class="result-subtitle">Detalhes das Perguntas:</h2>
            <ul class="result-list">
                <?php foreach ($questoes as $questao): ?>
                    <li class="result-item">
                        <strong><?php echo $questao['questao']; ?>:</strong>
                        <?php echo $questao['resposta']; ?> - 
                        <span class="result-status <?php echo $questao['status'] == 'Acertou' ? 'acertou' : 'errou'; ?>">
                            <?php echo $questao['status']; ?>
                        </span>
                        <span class="result-pontos">(Dificuldade: <?php 
                            switch ($questao['dificuldade']) {
                                case 1:
                                    echo "Fácil";
                                    break;
                                case 2:
                                    echo "Médio";
                                    break;
                                case 3:
                                    echo "Difícil";
                                    break;
                            } ?> - <?php echo $questao['pontos']; ?> pontos)</span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <button class="result-back" onclick="window.location.href = 'principal.php';">Voltar</button>
    </div>
</body>
</html>
