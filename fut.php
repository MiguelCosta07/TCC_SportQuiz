<?php
include 'conexao_bd.php';

$query = "SELECT nome, pontuacao FROM usuarios ORDER BY pontuacao DESC";
$result = $mysqli->query($query);

if (!$result) {
    die("Erro ao executar a consulta: " . $mysqli->error);
}

$usuarios = [];
while ($row = $result->fetch_assoc()) {
    $usuarios[] = $row;
}

$usuariosOrdenados = $usuarios;
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
        <h1><a href="index.php">SportQuiz</a></h1>
    </nav>
</head>
<body class="bodysport">
    <div class="ranking-container">
        <h1>Ranking de Jogadores</h1>
        <table class="ranking-table">
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Nome</th>
                    <th>Pontuação</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($usuariosOrdenados) > 0) {
                    $posicao = 1;
                    foreach ($usuariosOrdenados as $usuario) {
                        echo "<tr>
                                <td>{$posicao}º</td>
                                <td>{$usuario['nome']}</td>
                                <td>{$usuario['pontuacao']} pts </td>
                              </tr>";
                        $posicao++;
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum jogador encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
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
