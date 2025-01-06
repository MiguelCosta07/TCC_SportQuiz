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
        <img class="logo" alt="imagemquiz" src="./imagem/testequiz.png">
        <h1><a href="principal.php">SportQuiz</a></h1>
    </nav>
</head>

<body class="bodysport">
    <div class="textoesp">
    <h3>"Bem-vindo ao desafio das quadras!" 🏀</h3>
    <p>Entre no ritmo do basquete e mostre que você é um verdadeiro fã! Teste seus conhecimentos sobre os maiores times, jogadores lendários e momentos históricos das competições internacionais. Será que você consegue fazer uma cesta de conhecimento e alcançar o topo do ranking? Boa sorte! 🏆</p>
    </div>

    <div class="quiz-introducao">
    <h2>Como funciona o quiz?</h2>
        <p>Bem-vindo ao quiz do SportQuiz! Aqui, você irá testar seus conhecimentos sobre vários esportes, como <strong>futebol</strong>, <strong>basquete</strong>, <strong>tênis de mesa</strong>, <strong>tênis</strong> e <strong>surfe</strong>, com perguntas de diferentes níveis de dificuldade. A cada pergunta, você terá quatro alternativas para escolher, sendo uma delas a resposta correta.</p>
        <p>O objetivo é acertar o maior número de perguntas possíveis e somar pontos para conquistar uma boa posição no nosso ranking. A dificuldade das perguntas pode ser ajustada, e quanto maior a dificuldade, mais pontos você ganhará por acertar a questão!</p>

    <h3>Etapas do Quiz:</h3>
    <ol>
        <li><strong>Escolha a dificuldade:</strong> Fácil, Médio ou Difícil.</li>
        <li><strong>Responda as perguntas:</strong> A cada questão, escolha uma das alternativas.</li>
        <li><strong>Veja sua pontuação:</strong> Depois de responder, você verá sua pontuação e poderá tentar novamente para melhorar.</li>
    </ol>

        <p>Vamos começar! Escolha o esporte e a dificuldade abaixo para iniciar seu desafio.</p>
    </div>

    <div class="form-container">
        <h2>Escolha a dificuldade para começar o Quiz.</h2>
        <form action="quizbasquete.php" method="post">
            <label for="dificuldade">Boa Sorte !</label>
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
