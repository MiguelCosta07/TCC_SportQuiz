<?php
if (!isset($_SESSION)) {
    session_start();
}

include('conexao_bd.php');

// Recupera os dados do ranking completo
$ranking_completo = [];  // Inicializa como um array vazio para evitar erro

$sql_ranking_completo = "
    SELECT u.nome, u.imagem_perfil, r.pontuacao 
    FROM ranking r
    JOIN usuarios u ON r.id_usuario = u.id
    ORDER BY r.pontuacao DESC
";

$result_ranking_completo = $mysqli->query($sql_ranking_completo);
if (!$result_ranking_completo) {
    die("Erro na consulta do ranking: " . $mysqli->error);
}

$ranking_completo = $result_ranking_completo->fetch_all(MYSQLI_ASSOC);
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
        <img class="logo-ranking" alt="imagemquiz" src="./imagem/testequiz.png">
        <h1><a href="principal.php" class="nav-title">SportQuiz</a></h1>
    </nav>
</head>
<body class="body-ranking">
    <!-- Layout do Ranking e Painel Lateral -->
    <div class="ranking-completo-wrapper">
        <!-- Coluna do Ranking Completo -->
        <div class="ranking-completo-container">
            <h2 class="ranking-completo-title">Ranking Mundial</h2>
            <div class="ranking-header">
                <span class="ranking-header-item">Posição</span>
                <span class="ranking-header-item">Usuário</span>
                <span class="ranking-header-item">Pontuação</span>
            </div>
            <ul class="ranking-completo-list">
                <?php 
                if (!empty($ranking_completo)) { // Verifica se o ranking está vazio
                    $posicao = 1;  // Inicia a posição com 1
                    foreach ($ranking_completo as $rank): 
                ?>
                        <li class="ranking-completo-item">
                            <span class="ranking-completo-position"><?php echo $posicao++; ?>º</span>
                            <div class="ranking-completo-user">
                                <?php 
                                // Verifica se a imagem de perfil existe, senão exibe a imagem padrão
                                $imagem_perfil = !empty($rank['imagem_perfil']) ? $rank['imagem_perfil'] : 'imagem/anonimo.png'; 
                                ?>
                                <img src="<?php echo $imagem_perfil; ?>" alt="Imagem de Perfil" class="ranking-completo-img">
                                <span class="ranking-completo-name"><?php echo htmlspecialchars($rank['nome']); ?></span>
                            </div>
                            <span class="ranking-completo-score"><?php echo $rank['pontuacao']; ?> pts</span>
                        </li>
                <?php 
                    endforeach;
                } else {
                    echo "<li>Nenhum dado de ranking encontrado.</li>";
                }
                ?>
            </ul>
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
