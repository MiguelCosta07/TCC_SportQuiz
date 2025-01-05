<?php
if (!isset($_SESSION)) {
    session_start();
}

include('conexao_bd.php');

// Verifica se o usuário está logado
$id_usuario_atual = isset($_SESSION['id_usuario']) ? $_SESSION['id_usuario'] : null;

// Recupera os dados do ranking completo
$sql_ranking_completo = "
    SELECT u.nome, r.pontuacao 
    FROM ranking r
    JOIN usuarios u ON r.id_usuario = u.id
    ORDER BY r.pontuacao DESC
";

$result_ranking_completo = $mysqli->query($sql_ranking_completo);
if (!$result_ranking_completo) {
    die("Erro na consulta do ranking: " . $mysqli->error);
}

$ranking_completo = $result_ranking_completo->fetch_all(MYSQLI_ASSOC);

// Recupera a posição e pontuação do usuário atual
$usuario_posicao = null;
$usuario_pontuacao = null;

if ($id_usuario_atual !== null) {
    // Preparar a consulta com placeholders para evitar SQL Injection
    $sql_usuario_ranking = "SELECT r.pontuacao FROM ranking r WHERE r.id_usuario = ?";
    
    // Preparar o statement
    $stmt = $mysqli->prepare($sql_usuario_ranking);
    $stmt->bind_param("i", $id_usuario_atual); // "i" é para inteiro
    $stmt->execute();
    
    // Obter o resultado
    $result_usuario_ranking = $stmt->get_result();
    
    if ($result_usuario_ranking->num_rows > 0) {
        $usuario_info = $result_usuario_ranking->fetch_assoc();
        $usuario_pontuacao = $usuario_info['pontuacao'];

        // Encontrar a posição do usuário no ranking
        foreach ($ranking_completo as $index => $rank) {
            if ($rank['nome'] === $_SESSION['nome_usuario']) {
                $usuario_posicao = $index + 1; // A posição começa de 1
                break;
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
    <title>Ranking Completo - SportQuiz</title>
    <!-- Navbar -->
    <nav class="navbarranking">
        <img class="logo-ranking" alt="imagemquiz" src="./imagem/testequiz.jpg">
        <h1><a href="principal.php" class="nav-title">SportQuiz</a></h1>
    </nav>
</head>
<body class="body-ranking">
    <!-- Layout do Ranking e Painel Lateral -->
    <div class="ranking-completo-wrapper">
        <!-- Coluna do Ranking Completo -->
        <div class="ranking-completo-container">
            <h2 class="ranking-completo-title">Ranking Completo</h2>
            <div class="ranking-header">
                <span class="ranking-header-item">Posição</span>
                <span class="ranking-header-item">Usuário</span>
                <span class="ranking-header-item">Pontuação</span>
            </div>
            <ul class="ranking-completo-list">
                <?php 
                $posicao = 1;  // Inicia a posição com 1
                foreach ($ranking_completo as $rank): 
                ?>
                    <li class="ranking-completo-item">
                        <span class="ranking-completo-position"><?php echo $posicao++; ?>º</span>
                        <span class="ranking-completo-name"><?php echo htmlspecialchars($rank['nome']); ?></span>
                        <span class="ranking-completo-score"><?php echo $rank['pontuacao']; ?> pts</span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Painel Lateral com a colocação e pontuação do usuário -->
        <div class="ranking-sidebar">
            <?php if ($usuario_posicao !== null): ?>
                <h3>Seu Ranking</h3>
                <p><strong>Posição:</strong> <?php echo $usuario_posicao; ?>º</p>
                <p><strong>Pontuação:</strong> <?php echo $usuario_pontuacao; ?> pts</p>
            <?php else: ?>
                <p>Você ainda não entrou no ranking!</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footerranking">
        <div class="footer-content-ranking">
            <div class="footer-section-ranking about">
                <h3 class="footer-title-ranking">Sobre Nós</h3>
                <p class="footer-text-ranking">Somos uma empresa dedicada a criar experiências únicas e emocionantes para os amantes de esportes ao redor do mundo. Estimulando seu conhecimento e aprendizagem!</p>
            </div>
            <div class="footer-section-ranking social">
                <h3 class="footer-title-ranking">Siga-nos</h3>
                <div class="social-links-ranking">
                    <a href="#" class="social-link-ranking"><i class="fab fa-facebook"></i> Facebook</a>
                    <a href="#" class="social-link-ranking"><i class="fab fa-twitter"></i> Twitter</a>
                    <a href="#" class="social-link-ranking"><i class="fab fa-instagram"></i> Instagram</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom-ranking">
            &copy; 2024 Empresa de Jogos. Todos os direitos reservados.
        </div>
    </footer>
</body>
</html>
