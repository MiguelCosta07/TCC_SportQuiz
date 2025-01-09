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
    LIMIT 5
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
        <img class="logo" alt="imagemquiz" src="./imagem/testequiz.png">
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
    <h1 class="tituloprincipal"> Seja Muito Bem Vindo ao SportQuiz!</h1>
    <!-- Carousel -->
    <div class="carousel-container">
        <div class="carousel">
            <div class="carousel-item active">
                <img src="https://www.lance.com.br/galerias/wp-content/uploads/2021/06/unnamed-843x474.jpg" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="https://www.lance.com.br/galerias/wp-content/uploads/2022/06/Stephanie-Gilmore_Easy-Resize.com_-843x474.jpg" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="https://www.lance.com.br/galerias/wp-content/uploads/2024/04/53620461964_8c44711e53_o_af649bc2-8fcd-47db-ab23-c37c0247dc10-843x474.jpg" alt="Banner 3">
            </div>
            <div class="carousel-item">
                <img src="https://www.lance.com.br/galerias/wp-content/uploads/2021/07/tenis-feminino-843x474.jpeg" alt="Banner 4">
            </div>
            <div class="carousel-item">
                <img src="https://www.lance.com.br/galerias/wp-content/uploads/2024/08/foto-Denis-LOVROVIC-AFP-843x474.jpg" alt="Banner 4">
            </div>
            <p class="rodapecarousel">Esportes Incluidos no SportQuiz</p>
        </div>
    </div>

    <div class="container-introducao">
    <div class="titulo-introducao">
        <h2>O que é o SportQuiz?</h2>
    </div>
    <div class="textointroducao">
        <p>
            O SportQuiz é uma plataforma interativa onde os usuários podem testar seus conhecimentos sobre esportes através de quizzes divertidos. Se você ama futebol, basquete, vôlei ou qualquer outro esporte, este é o lugar perfeito para você aprender e se divertir!
        </p>
    </div>
</div>


    <div class="content">
        <div class="left-content">
            <h2 class="escolha">Selecione o Esporte</h2>
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
        <!-- Parte do Ranking -->
    <div class="right-content">
        <h2 class="ranking-title">Top 5 no Ranking</h2>
        <ul class="ranking-list">
    <?php 
    $posicao = 1; // Variável para rastrear a posição
    foreach ($ranking as $rank): ?>
        <li class="ranking-item">
            <span class="rank-position"><?php echo $posicao . 'º'; ?></span>
            <span class="rank-medal">
                <?php 
                // Adiciona o emoji de medalha dependendo da posição
                if ($posicao == 1) {
                    echo '🥇'; // Medalha de ouro
                } elseif ($posicao == 2) {
                    echo '🥈'; // Medalha de prata
                } elseif ($posicao == 3) {
                    echo '🥉'; // Medalha de bronze
                }
                ?>
            </span>
            <span class="rank-name"><?php echo htmlspecialchars($rank['nome']); ?></span>
            <span class="rank-score"><?php echo $rank['pontuacao']; ?> pontos</span>
        </li>
    <?php $posicao++; // Incrementa a posição ?>
    <?php endforeach; ?>
</ul>

    <!-- Botão "Ver Ranking Completo" -->
        <div class="view-full-ranking">
          <a href="ranking.php" class="btn-ranking">Ver Ranking Completo</a>
        </div>
    </div>


    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section-esquerdo">
                <h3>Sobre Nós</h3>
                <p>Somos uma empresa dedicada a criar experiências únicas e emocionantes para os amantes de esportes ao redor do mundo. Estimulando seu conhecimento e aprendizagem!</p>
            </div>
            <div class="footer-section-direito">
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
        // Carousel logic automatizado
        let currentSlide = 0;
        const slides = document.querySelectorAll('.carousel-item');
        const totalSlides = slides.length;

        function showSlide(index) {
            if (index >= totalSlides) currentSlide = 0;
            if (index < 0) currentSlide = totalSlides - 1;
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (i === currentSlide) {
                    slide.classList.add('active');
                }
            });
        }

        function nextSlide() {
            currentSlide++;
            showSlide(currentSlide);
        }

        // Inicializa o carousel
        showSlide(currentSlide);

        // Muda a imagem automaticamente a cada 5 segundos
        setInterval(nextSlide, 5000); // 5000 milissegundos = 5 segundos

        function toggleMenu() {
    var menu = document.getElementById('menuPerfil');
    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
}
    </script>
</body>
</html>
