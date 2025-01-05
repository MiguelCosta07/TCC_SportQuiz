<?php
include 'conexao_bd.php';
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
    </nav>
</head>

<body class="bodysport">
    <div class="textoesp">
    <h3>"Bem-vindo ao desafio das mesas!" 🏓</h3>
    <p>Você é fera no tênis de mesa? Agora é a hora de mostrar que conhece todos os detalhes desse esporte rápido e técnico! De grandes campeões a momentos épicos nas mesas, teste seus conhecimentos e conquiste seu lugar no ranking. Boa sorte! 🏆</p>
    </div>

    <div class="form-container">
        <h2>Para começar um Quiz com perguntas aleatórias, primeiro escolha a dificuldade das questões.</h2>
        <form action="quizping.php" method="post">
            <label for="dificuldade">Lembrando que quanto maior a dificuldade, mais pontos:</label>
            <select name="dificuldade" id="dificuldade">
                <option value="facil">Fácil</option>
                <option value="medio">Médio</option>
                <option value="dificil">Difícil</option>
            </select>
            <button type="submit" class="iniciar-quiz">Iniciar Quiz</button>
        </form>
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

</html>
