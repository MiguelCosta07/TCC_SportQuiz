<?php
if (!isset($_SESSION)) {
    session_start();
}

include('conexao_bd.php');

$id = $_SESSION['id'];

// Recupera os dados do usuário
$sql_code = "
    SELECT u.nome, u.imagem_perfil 
    FROM usuarios u
    WHERE u.id = ?
";

$stmt = $mysqli->prepare($sql_code);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

$nome = $usuario['nome'];
$imagem_perfil = !empty($usuario['imagem_perfil']) ? $usuario['imagem_perfil'] : 'imagem/anonimo.png';

// Recupera os dados do ranking
$sql_ranking = "
    SELECT u.nome, r.pontuacao 
    FROM ranking r
    JOIN usuarios u ON r.id_usuario = u.id
    ORDER BY r.pontuacao DESC
    LIMIT 10
";

$result_ranking = $mysqli->query($sql_ranking);
$ranking = $result_ranking->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>SportQuiz</title>
    <nav class="navbar">
        <img class="logo" alt="imagemquiz" src="./imagem/testequiz.jpg">
        <h1><a href="principal.php">SportQuiz</a></h1>
        <div class="perfil">
            <button class="perfil-btn" onclick="toggleMenu()">
                <img class="perfil-icone" src="<?php echo $imagem_perfil; ?>" alt="Perfil">
            </button>
            <div id="menuPerfil" class="dropdown-content">
                <a href="perfil.php">Gerenciar Perfil</a>
                <a href="logout.php">Sair</a>
            </div>
        </div>
    </nav>
</head>
<body class="bodyprincipal">
    <div class="content">
        <div class="left-content">
            <h2 class="escolha">Selecione seu esporte favorito:</h2>
            <div class="esporte-container">
                <form method="post">
                    <div class="opcao">
                        <a href="fut.php">
                            <div class="nome">Futebol</div>
                            <img class="esporte" src="./imagem/fut.jpg" alt="futebol">
                        </a>
                    </div>
                    <div class="opcao">
                        <a href="tenis.php">
                            <div class="nome">Tênis</div>
                            <img class="esporte" src="./imagem/tenis.jpg" alt="Tênis">
                        </a>
                    </div>
                    <div class="opcao">
                        <a href="basquete.php">
                            <div class="nome">Basquete</div>
                            <img class="esporte" src="./imagem/basquete.jpg" alt="Basquete">
                        </a>
                    </div>
                    <div class="opcao">
                        <a href="ping.php">
                            <div class="nome">Tênis de mesa</div>
                            <img class="esporte" src="./imagem/ping.jpg" alt="PingPong">
                        </a>
                    </div>
                    <div class="opcao">
                        <a href="surf.php">
                            <div class="nome">Surfe</div>
                            <img class="esporte" src="./imagem/surf.jpg" alt="Surfe">
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="right-content">
    <h2 class="ranking-title">Ranking</h2>
    <ul class="ranking-list">
        <?php foreach ($ranking as $rank): ?>
            <li class="ranking-item">
                <span class="rank-name"><?php echo htmlspecialchars($rank['nome']); ?></span>
                <span class="rank-score"><?php echo $rank['pontuacao']; ?> pontos</span>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
    </div>
</body>
<footer>
    <div class="footer-content">
        <div class="footer-section about">
            <h3>Sobre Nós</h3>
            <p>Somos uma empresa dedicada a criar experiências únicas e emocionantes para os amantes de esportes ao redor do mundo. Estimulando seu conhecimento e aprendizagem!</p>
        </div>
        <div class="footer-section social">
            <h3>Siga-nos</h3>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024 Empresa de Jogos. Todos os direitos reservados.
    </div>
</footer>
<script>
    function toggleMenu() {
        var menu = document.getElementById('menuPerfil');
        menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
    }
</script>
</html>
