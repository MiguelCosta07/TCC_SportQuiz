<?php
include 'conexao_bd.php';

$dificuldade = $_POST['dificuldade'];  
$esporte_id = 1;  

if ($dificuldade == 'facil') {
    $pontos = 1;  
} elseif ($dificuldade == 'medio') {
    $pontos = 2; 
} elseif ($dificuldade == 'dificil') {
    $pontos = 3; 
} else {
    die("Dificuldade inválida.");
}

$query = "SELECT * FROM perguntas WHERE id_esporte = ? AND id_dificuldade = ? ORDER BY RAND() LIMIT 3";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ii", $esporte_id, $pontos);  
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $perguntas = [];
    while ($row = $result->fetch_assoc()) {
        $perguntas[] = $row;  
    }
} else {
    die("Não há perguntas disponíveis para este esporte e dificuldade.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Quiz de Futebol</title>
</head>
<body class="quiz-body">
    <header class="quiz-cabec">
        <h1 class="quiz-tit">Quiz de Futebol</h1>
    </header>
    <main class="quiz-container">
        <form action="resultado.php" method="post" class="quiz-form">
            <?php foreach ($perguntas as $pergunta): ?>
                <fieldset class="quiz-questao">
                    <legend class="question-tit"><?php echo $pergunta['questao']; ?></legend>
                    <?php
                    $query_alternativas = "SELECT * FROM alternativas WHERE pergunta_id = ?";
                    $stmt_alternativas = $mysqli->prepare($query_alternativas);
                    $stmt_alternativas->bind_param("i", $pergunta['id']);
                    $stmt_alternativas->execute();
                    $result_alternativas = $stmt_alternativas->get_result();

                    while ($alternativa = $result_alternativas->fetch_assoc()):
                    ?>
                        <label class="quiz-opcao">
                            <input type="radio" name="pergunta_<?php echo $pergunta['id']; ?>" value="<?php echo $alternativa['id']; ?>" class="option-input">
                            <?php echo $alternativa['resposta']; ?>
                        </label>
                    <?php endwhile; ?>
                </fieldset>
            <?php endforeach; ?>
            <input type="hidden" name="dificuldade" value="<?php echo $dificuldade; ?>">
            <button type="submit" class="quiz-enviar">Finalizar Quiz</button>
        </form>
    </main>
</body>
</html>
