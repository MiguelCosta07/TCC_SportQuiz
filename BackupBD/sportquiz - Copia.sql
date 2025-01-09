-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/01/2025 às 00:40
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sportquiz`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alternativas`
--

CREATE TABLE `alternativas` (
  `id` int(11) NOT NULL,
  `resposta` text NOT NULL,
  `pergunta_id` int(11) NOT NULL,
  `val_resposta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alternativas`
--

INSERT INTO `alternativas` (`id`, `resposta`, `pergunta_id`, `val_resposta`) VALUES
(1, 'Brasil', 1, 0),
(2, 'França', 1, 1),
(3, 'Alemanha', 1, 0),
(4, 'Argentina', 1, 0),
(5, 'Ronaldo', 2, 1),
(6, 'Pelé', 2, 0),
(7, 'Zico', 2, 0),
(8, 'Romário', 2, 0),
(9, 'Real Madrid', 3, 0),
(10, 'Barcelona', 3, 1),
(11, 'Manchester United', 3, 0),
(12, 'Liverpool', 3, 0),
(13, '1950', 4, 0),
(14, '1958', 4, 1),
(15, '1962', 4, 0),
(16, '1970', 4, 0),
(17, 'Alisson Becker', 5, 1),
(18, 'Ederson', 5, 0),
(19, 'Cassio', 5, 0),
(20, 'Neto', 5, 0),
(21, 'Diego Maradona', 7, 1),
(22, 'Lionel Messi', 6, 0),
(23, 'Gabriel Batistuta', 7, 0),
(24, 'Juan Román Riquelme ', 7, 0),
(25, 'Lionel Messi', 7, 0),
(26, 'Raúl', 6, 0),
(27, 'Cristiano Ronaldo', 6, 1),
(28, 'Robert Lewandowski', 6, 0),
(29, 'Liverpool', 8, 0),
(30, 'Arsenal', 8, 0),
(31, 'Manchester United', 8, 1),
(32, 'Chelsea', 8, 0),
(33, 'França', 9, 0),
(34, 'Alemanha', 9, 0),
(35, 'Portugal', 9, 1),
(36, 'Espanha', 9, 0),
(37, '2010', 10, 0),
(38, '2014', 10, 0),
(39, '2018', 10, 1),
(40, '2022', 10, 0),
(41, 'Brasil 7-1 Alemanha', 11, 0),
(42, 'Hungria 8-3 Alemanha', 11, 0),
(43, 'Brasil 6-0 Costa Rica', 11, 0),
(44, ' Itália 9-0 Estados Unidos', 11, 1),
(45, 'George Weah', 12, 1),
(46, 'Johan Cruyff', 12, 0),
(47, ' Ronaldo Nazário', 12, 0),
(48, 'Kaká', 12, 0),
(49, 'Louis van Gaal', 13, 1),
(50, 'Johan Cruyff', 13, 0),
(51, 'Frank Rijkaard', 13, 0),
(52, 'Guus Hiddink', 13, 0),
(53, '1998, França', 14, 1),
(54, '2002, Brasil', 14, 0),
(55, '2010, Espanha', 14, 0),
(56, '2014, Alemanha', 14, 0),
(57, 'Alan Shearer', 15, 0),
(58, 'Cristiano Ronaldo', 15, 0),
(59, 'Mohamed Salah', 15, 1),
(60, 'Harry Kane', 15, 0),
(61, 'Los Angeles Lakers', 16, 0),
(62, 'Boston Celtics', 16, 1),
(63, 'Chicago Bulls', 16, 0),
(64, 'Miami Heat', 16, 0),
(65, 'LeBron James', 17, 0),
(66, 'Kobe Bryant', 17, 0),
(67, 'Michael Jordan', 17, 1),
(68, 'Magic Johnson', 17, 0),
(69, 'Estados Unidos', 18, 1),
(70, 'Espanha', 18, 0),
(71, 'Austrália', 18, 0),
(72, 'França', 18, 0),
(73, 'Stephen Curry', 19, 1),
(74, 'Kevin Durant', 19, 0),
(75, 'James Harden', 19, 0),
(76, 'Klay Thompson', 19, 0),
(77, 'Los Angeles Lakers', 20, 1),
(78, 'Miami Heat', 20, 0),
(79, 'Cleveland Cavaliers', 20, 0),
(80, 'Golden State Warriors', 20, 0),
(81, 'Stephen Curry', 21, 1),
(82, 'LeBron James', 21, 0),
(83, 'Kawhi Leonard', 21, 0),
(84, 'Kevin Durant', 21, 0),
(85, 'Michael Jordan', 22, 0),
(86, 'Wilt Chamberlain', 22, 1),
(87, 'Kobe Bryant', 22, 0),
(88, 'LeBron James', 22, 0),
(89, '1991', 23, 0),
(90, '1993', 23, 1),
(91, '1996', 23, 0),
(92, '1999', 23, 0),
(93, 'Denver Nuggets', 24, 1),
(94, 'Miami Heat', 24, 0),
(95, 'Golden State Warriors', 24, 0),
(96, 'Milwaukee Bucks', 24, 0),
(97, 'Phil Jackson', 25, 0),
(98, 'Red Auerbach', 25, 1),
(99, 'Gregg Popovich', 25, 0),
(100, 'Pat Riley', 25, 0),
(101, 'Magic Johnson', 26, 0),
(102, 'Oscar Robertson', 26, 0),
(103, 'Russell Westbrook', 26, 1),
(104, 'Jason Kidd', 26, 0),
(105, '1979', 27, 1),
(106, '1981', 27, 0),
(107, '1985', 27, 0),
(108, '1990', 27, 0),
(109, 'Boston Celtics', 28, 0),
(110, 'Chicago Bulls', 28, 0),
(111, 'Golden State Warriors', 28, 0),
(112, 'New York Knicks', 28, 1),
(113, 'Dirk Nowitzki', 29, 0),
(114, 'Giannis Antetokounmpo', 29, 1),
(115, 'Manu Ginóbili', 29, 0),
(116, 'Pau Gasol', 29, 0),
(117, 'New York Knicks', 30, 0),
(118, 'Philadelphia Warriors', 30, 1),
(119, 'Boston Celtics', 30, 0),
(120, 'Chicago Stags', 30, 0),
(121, 'Gabriel Medina', 31, 0),
(122, 'Adriano de Souza', 31, 1),
(123, 'Felipe Toledo', 31, 0),
(124, 'Italo Ferreira', 31, 0),
(125, 'Gabriel Medina', 32, 0),
(126, 'Italo Ferreira', 32, 0),
(127, 'John John Florence', 32, 0),
(128, 'Filipe Toledo', 32, 1),
(129, 'Praia do Futuro', 33, 0),
(130, 'Praia de Ipanema', 33, 0),
(131, 'Praia de Copacabana', 33, 0),
(132, 'Pipeline é no Havai', 33, 1),
(133, 'Margaret River Pro', 34, 0),
(134, 'Bells Beach Classic', 34, 1),
(135, 'Rip Curl Pro', 34, 0),
(136, 'Gold Coast Pro', 34, 0),
(137, 'Kelly Slater', 35, 0),
(138, 'John John Florence', 35, 0),
(139, 'Mick Fanning', 35, 0),
(140, 'Shane Dorian', 35, 1),
(141, '2008', 36, 0),
(142, '2012', 36, 0),
(143, '2016', 36, 0),
(144, '2020', 36, 1),
(145, 'Duke Kahanamoku', 37, 0),
(146, 'Gerry Lopez', 37, 0),
(147, 'Laird Hamilton', 37, 1),
(148, 'Andy Irons', 37, 0),
(149, 'Estados Unidos', 38, 0),
(150, 'Austrália', 38, 1),
(151, 'Brasil', 38, 0),
(152, 'Portugal', 38, 0),
(153, 'Kelly Slater', 39, 0),
(154, 'Andy Irons', 39, 1),
(155, 'Mick Fanning', 39, 0),
(156, 'Gabriel Medina', 39, 0),
(157, 'WSL Finals', 40, 1),
(158, 'Global Surf League', 40, 0),
(159, 'Surfing World Cup', 40, 0),
(160, 'World Surf Championship', 40, 0),
(161, 'Jaws', 41, 0),
(162, 'Pipeline', 41, 0),
(163, 'Teahupo\'o', 41, 0),
(164, 'Praia do Norte', 41, 1),
(165, 'Kelly Slater', 42, 0),
(166, 'Tom Curren', 42, 1),
(167, 'Rob Machado', 42, 0),
(168, 'Mark Richards', 42, 0),
(169, 'Kelly Slater', 43, 1),
(170, 'Mick Fanning', 43, 0),
(171, 'Andy Irons', 43, 0),
(172, 'John John Florence', 43, 0),
(173, 'Vans Triple Crown', 44, 0),
(174, 'Billabong Pipe Masters', 44, 0),
(175, 'Quiksilver Pro', 44, 0),
(176, 'Eddie Aikau Invitational', 44, 1),
(177, 'Kelly Slater', 45, 0),
(178, 'Laird Hamilton', 45, 1),
(179, 'Tom Curren', 45, 0),
(180, 'Gerry Lopez', 45, 0),
(181, 'China', 46, 1),
(182, 'Japão', 46, 0),
(183, 'Coreia do Sul', 46, 0),
(184, 'Alemanha', 46, 0),
(185, 'Wang Hao', 47, 0),
(186, 'Zhang Jike', 47, 0),
(187, 'Ma Long', 47, 1),
(188, 'Liu Guoliang', 47, 0),
(189, 'Campeonato Mundial de Tênis de Mesa', 48, 0),
(190, 'World Table Tennis Championships', 48, 1),
(191, 'ITTF World Cup', 48, 0),
(192, 'Tênis de Mesa Open', 48, 0),
(193, 'França', 49, 0),
(194, 'Estados Unidos', 49, 0),
(195, 'Inglaterra', 49, 1),
(196, 'Alemanha', 49, 0),
(197, 'Ma Long', 50, 1),
(198, 'Xu Xin', 50, 0),
(199, 'Liu Shiwen', 50, 0),
(200, 'Feng Tianwei', 50, 0),
(201, 'Jan-Ove Waldner', 51, 0),
(202, 'Ma Long', 51, 1),
(203, 'Zhang Jike', 51, 0),
(204, 'Wang Liqin', 51, 0),
(205, '1988', 52, 1),
(206, '1992', 52, 0),
(207, '1996', 52, 0),
(208, '2000', 52, 0),
(209, 'Drive', 53, 0),
(210, 'Loop', 53, 0),
(211, 'Smash', 53, 0),
(212, 'Topspin', 53, 1),
(213, 'Timo Boll', 54, 0),
(214, 'Ma Long', 54, 0),
(215, 'Xu Xin', 54, 1),
(216, 'Zhang Jike', 54, 0),
(217, 'ITTF World Tour Finals', 55, 1),
(218, 'World Table Tennis Championships', 55, 0),
(219, 'ITTF World Cup', 55, 0),
(220, 'Grand Slam of Table Tennis', 55, 0),
(221, 'Jan-Ove Waldner', 56, 0),
(222, 'Ma Long', 56, 1),
(223, 'Zhang Jike', 56, 0),
(224, 'Wang Liqin', 56, 0),
(225, 'China', 57, 1),
(226, 'Japão', 57, 0),
(227, 'Coreia do Sul', 57, 0),
(228, 'Alemanha', 57, 0),
(229, '1926', 58, 1),
(230, '1930', 58, 0),
(231, '1946', 58, 0),
(232, '1952', 58, 0),
(233, 'Chop', 59, 0),
(234, 'Topspin', 59, 0),
(235, 'Sidespin', 59, 1),
(236, 'Smash', 59, 0),
(237, 'Ma Long', 60, 0),
(238, 'Zhang Jike', 60, 1),
(239, 'Wang Liqin', 60, 0),
(240, 'Timo Boll', 60, 0),
(241, 'Roger Federer', 61, 0),
(242, 'Rafael Nadal', 61, 1),
(243, 'Novak Djokovic', 61, 0),
(244, 'Andy Murray', 61, 0),
(245, 'Australian Open', 62, 0),
(246, 'US Open', 62, 0),
(247, 'Roland Garros', 62, 0),
(248, 'Wimbledon', 62, 1),
(249, 'Rafael Nadal', 63, 0),
(250, 'Novak Djokovic', 63, 1),
(251, 'Roger Federer', 63, 0),
(252, 'Andy Murray', 63, 0),
(253, 'Carlos Alcaraz', 64, 0),
(254, 'Novak Djokovic', 64, 1),
(255, 'Daniil Medvedev', 64, 0),
(256, 'Rafael Nadal', 64, 0),
(257, 'Espanha', 65, 1),
(258, 'França', 65, 0),
(259, 'Itália', 65, 0),
(260, 'Portugal', 65, 0),
(261, 'Serena Williams', 66, 1),
(262, 'Venus Williams', 66, 0),
(263, 'Steffi Graf', 66, 0),
(264, 'Maria Sharapova', 66, 0),
(265, 'Australian Open', 67, 0),
(266, 'US Open', 67, 0),
(267, 'Wimbledon', 67, 0),
(268, 'Roland Garros', 67, 1),
(269, 'Roger Federer', 68, 0),
(270, 'Novak Djokovic', 68, 1),
(271, 'Pete Sampras', 68, 0),
(272, 'Andre Agassi', 68, 0),
(273, 'Aryna Sabalenka', 69, 0),
(274, 'Iga Świątek', 69, 1),
(275, 'Emma Raducanu', 69, 0),
(276, 'Naomi Osaka', 69, 0),
(277, 'Monte Carlo Masters', 70, 1),
(278, 'Italian Open', 70, 0),
(279, 'Madrid Open', 70, 0),
(280, 'Paris Masters', 70, 0),
(281, 'Rod Laver', 71, 1),
(282, 'Roger Federer', 71, 0),
(283, 'Rafael Nadal', 71, 0),
(284, 'Novak Djokovic', 71, 0),
(285, 'Slice', 72, 1),
(286, 'Drop Shot', 72, 0),
(287, 'Topspin', 72, 0),
(288, 'Cross-Court', 72, 0),
(289, '1900', 73, 1),
(290, '1924', 73, 0),
(291, '1968', 73, 0),
(292, '1988', 73, 0),
(293, 'Steffi Graf', 74, 0),
(294, 'Martina Navratilova', 74, 0),
(295, 'Serena Williams', 74, 1),
(296, 'Chris Evert', 74, 0),
(297, 'US Open 1978', 75, 0),
(298, 'Australian Open 1984', 75, 0),
(299, 'French Open 1987', 75, 0),
(300, 'Wimbledon 1977', 75, 1),
(301, 'Brasil', 76, 0),
(302, 'Argentina', 76, 1),
(303, 'França', 76, 0),
(304, 'Alemanha', 76, 0),
(305, 'Harry Kane', 77, 1),
(306, 'Kylian Mbappé', 77, 0),
(307, 'Luka Modrić', 77, 0),
(308, 'Cristiano Ronaldo', 77, 0),
(309, 'Cristiano Ronaldo', 78, 0),
(310, 'Robert Lewandowski', 78, 0),
(311, 'Lionel Messi', 78, 1),
(312, 'Gerd Müller', 78, 0),
(313, 'Chicago Bulls', 79, 0),
(314, 'Los Angeles Lakers', 79, 0),
(315, 'Boston Celtics', 79, 1),
(316, 'Golden State Warriors', 79, 0),
(317, 'Kareem Abdul-Jabbar', 80, 1),
(318, 'LeBron James', 80, 0),
(319, 'Karl Malone', 80, 0),
(320, 'Michael Jordan', 80, 0),
(321, '4', 81, 0),
(322, '5', 81, 0),
(323, '6', 81, 1),
(324, '7', 81, 0),
(325, 'Austrália', 82, 0),
(326, 'Brasil', 82, 1),
(327, 'Estados Unidos', 82, 0),
(328, 'África do Sul', 82, 0),
(329, 'Kelly Slater', 83, 1),
(330, 'Mick Fanning', 83, 0),
(331, 'Andy Irons', 83, 0),
(332, 'Gabriel Medina', 83, 0),
(333, 'Pipeline, Havaí', 84, 0),
(334, 'Bells Beach, Austrália', 84, 1),
(335, 'Huntington Beach, Califórnia', 84, 0),
(336, 'Waimea Bay, Havaí', 84, 0),
(337, '2', 85, 0),
(338, '3', 85, 0),
(339, '4', 85, 1),
(340, '5', 85, 0),
(341, 'Plástico', 86, 0),
(342, 'Borracha', 86, 1),
(343, 'Fibra de Carbono', 86, 0),
(344, 'Couro', 86, 0),
(345, 'Smash', 87, 0),
(346, 'Drive', 87, 0),
(347, 'Drop Shot\r\n', 87, 1),
(348, 'Loop', 87, 0),
(349, 'Rafael Nadal', 88, 0),
(350, 'Novak Djokovic', 88, 1),
(351, 'Roger Federer', 88, 0),
(352, 'Pete Sampras', 88, 0),
(353, 'Roland Garros', 89, 0),
(354, 'Wimbledon', 89, 1),
(355, 'US Open', 89, 0),
(356, 'Australian Open', 89, 0),
(357, 'Steffi Graf', 90, 1),
(358, 'Serena Williams', 90, 0),
(359, 'Novak Djokovic', 90, 0),
(360, 'Rod Laver', 90, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `dificuldade`
--

CREATE TABLE `dificuldade` (
  `id` int(11) NOT NULL,
  `dificuldade` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `dificuldade`
--

INSERT INTO `dificuldade` (`id`, `dificuldade`) VALUES
(1, 'Fácil'),
(2, 'Médio'),
(3, 'Difícil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `esportes`
--

CREATE TABLE `esportes` (
  `id` int(11) NOT NULL,
  `nome_esporte` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `esportes`
--

INSERT INTO `esportes` (`id`, `nome_esporte`) VALUES
(1, 'futebol'),
(2, 'basquete'),
(3, 'surfe'),
(4, 'tenisdemesa'),
(5, 'tenis');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `questao` text NOT NULL,
  `id_esporte` int(11) NOT NULL,
  `id_dificuldade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `questao`, `id_esporte`, `id_dificuldade`) VALUES
(1, 'Quem ganhou a copa do mundo de 2018 ?', 1, 1),
(2, 'Quem é conhecido como \"O Fenômeno\" no futebol brasileiro?', 1, 1),
(3, 'Qual clube de futebol é conhecido por ter o estádio \"Camp Nou\"?', 1, 1),
(4, 'Em que ano o Brasil conquistou seu primeiro título de copa do mundo?', 1, 1),
(5, 'Quem é o atual goleiro titular da seleção brasileira (em 2024)?', 1, 1),
(6, 'Quem é o maior artilheiro da história da Liga dos Campeões da UEFA?', 1, 2),
(7, 'Qual jogador argentino é famoso por seu \"Gol do Século\" na Copa do Mundo de 1986?', 1, 2),
(8, 'Qual clube inglês é conhecido como os \"Red Devils\"?', 1, 2),
(9, 'Qual seleção venceu a Eurocopa de 2016?', 1, 2),
(10, 'Em qual ano o VAR (sistema de arbitragem de vídeo) foi introduzido na Copa do Mundo?', 1, 2),
(11, 'Qual foi a maior goleada da história das Copas do Mundo de Futebol?', 1, 3),
(12, 'Quem é o único jogador a vencer o Ballon d\'Or enquanto jogava fora da Europa?', 1, 3),
(13, 'Qual é o nome do famoso treinador que levou o Ajax a vencer a Liga dos Campeões em 1995?', 1, 3),
(14, 'Em qual ano e qual seleção foi a primeira a vencer a Copa do Mundo fora da Europa e da América do Sul?', 1, 3),
(15, 'Quem detém o recorde de maior número de gols marcados em uma única temporada da Premier League?', 1, 3),
(16, 'Qual time de basquete é conhecido por seu \"The Big Three\" composto por Larry Bird, Kevin McHale e Robert Parish?', 2, 1),
(17, 'Quem é conhecido como \"His Airness\" no basquete?', 2, 1),
(18, 'Qual país venceu a medalha de ouro no basquete masculino nas Olimpíadas de 2020?', 2, 1),
(19, 'Qual jogador é famoso por suas habilidades de arremesso de três pontos e é chamado de \"Chef\"?', 2, 1),
(20, 'Qual é o time de basquete que possui o jogador LeBron James como um de seus astros (em 2024)?', 2, 1),
(21, 'Quem foi o MVP das finais da NBA de 2015?', 2, 2),
(22, 'Qual jogador é conhecido por ter o maior número de pontos marcados em uma única partida da NBA?', 2, 2),
(23, 'Em que ano Michael Jordan se retirou pela primeira vez do basquete profissional?', 2, 2),
(24, 'Qual equipe foi a campeã da NBA na temporada 2022-2023?', 2, 2),
(25, 'Quem é o treinador que conquistou mais campeonatos da NBA?', 2, 2),
(26, 'Qual jogador detém o recorde de mais triplos-duplos na história da NBA?', 2, 3),
(27, 'Em qual ano a NBA introduziu a linha de três pontos?', 2, 3),
(28, 'Qual time foi o primeiro a vencer um campeonato da NBA sem ter o melhor recorde na temporada regular?', 2, 3),
(29, 'Quem foi o primeiro jogador estrangeiro a ser eleito MVP da temporada regular da NBA?', 2, 3),
(30, 'Qual equipe venceu a primeira edição da NBA em 1947?', 2, 3),
(31, 'Qual é o nome do famoso surfista brasileiro conhecido como \"Mineirinho\"?', 3, 1),
(32, 'Quem é o atual campeão mundial de surfe (em 2024)?', 3, 1),
(33, 'Em que praia brasileira é realizada a etapa do Circuito Mundial de Surfe chamada \"Pipeline\"?', 3, 1),
(34, 'Qual é o nome do evento de surfe realizado em Bells Beach, Austrália?', 3, 1),
(35, 'Quem é o surfista famoso pelo \"Tube Ride\" em Jaws, Havai?', 3, 1),
(36, 'Em que ano o surfe foi incluído pela primeira vez nos Jogos Olímpicos?', 3, 2),
(37, 'Qual surfista havaiano é conhecido por popularizar o surfe em ondas grandes?', 3, 2),
(38, 'Qual país sediou a etapa do Circuito Mundial de Surfe chamada \"Margaret River Pro\"?', 3, 2),
(39, 'Quem é o surfista que venceu o \"Triple Crown\" de Surfe em três ocasiões diferentes?', 3, 2),
(40, 'Qual é o nome do campeonato mundial de surfe promovido pela World Surf League (WSL)?', 3, 2),
(41, 'Qual é o nome da famosa onda em Nazaré, Portugal, conhecida por seus grandes tamanhos e condições extremas?', 3, 3),
(42, 'Quem foi o primeiro surfista a completar um aéreo 360 graus em uma competição profissional?', 3, 3),
(43, 'Qual surfista é conhecido por ter vencido o Campeonato Mundial de Surfe em 11 temporadas diferentes?', 3, 3),
(44, 'Qual é o nome da competição de surfe conhecida por seus desafios de surfar em condições de alta pressão e ondas gigantes no Havai?', 3, 3),
(45, 'Quem é o surfista que revolucionou o surfe de ondas grandes no Havai durante a década de 1990?', 3, 3),
(46, 'Qual país é conhecido por ter uma forte tradição em tênis de mesa e venceu muitas medalhas olímpicas nesse esporte?', 4, 1),
(47, 'Quem é o jogador chinês considerado um dos maiores de todos os tempos no tênis de mesa?', 4, 1),
(48, 'Qual é o nome do campeonato mundial de tênis de mesa?', 4, 1),
(49, 'Em qual país o tênis de mesa foi inventado?', 4, 1),
(50, 'Quem ganhou a medalha de ouro no torneio de tênis de mesa nas Olimpíadas de 2020?', 4, 1),
(51, 'Qual jogador detém o recorde de maior número de títulos do Campeonato Mundial de Tênis de Mesa?', 4, 2),
(52, 'Em que ano o tênis de mesa foi incluído pela primeira vez nos Jogos Olímpicos?', 4, 2),
(53, 'Qual é o nome do movimento de tênis de mesa onde o jogador bate a bola no lado de baixo da raquete para criar um efeito?', 4, 2),
(54, 'Quem é o atleta que ganhou o maior número de torneios da ITTF World Tour?', 4, 2),
(55, 'Qual é o nome do torneio que serve como o principal evento individual anual do tênis de mesa?', 4, 2),
(56, 'Quem é o único jogador a vencer todos os quatro torneios principais de tênis de mesa em uma única temporada (Grand Slam)?', 4, 3),
(57, 'Qual país teve o maior número de medalhas de ouro em tênis de mesa nos Jogos Olímpicos até 2024?', 4, 3),
(58, '3. Em que ano foi fundada a Federação Internacional de Tênis de Mesa (ITTF)?\r\n', 4, 3),
(59, 'Qual é o nome da técnica avançada usada para realizar um ataque rápido com um efeito lateral complexo?', 4, 3),
(60, 'Quem foi o campeão masculino do Campeonato Mundial de Tênis de Mesa em 2009?', 4, 3),
(61, 'Quem é conhecido como \"O Rei do Saibro\" no tênis?', 5, 1),
(62, 'Qual é o torneio de tênis realizado em Wimbledon?', 5, 1),
(63, 'Qual jogador é famoso por seu \"Grand Slam\" em 2015 e 2016?', 5, 1),
(64, 'Quem venceu o US Open de 2023 no circuito masculino?', 5, 1),
(65, 'Qual é o país de origem de Rafael Nadal?', 5, 1),
(66, 'Qual jogadora americana é famosa por ter vencido 23 títulos de Grand Slam?', 5, 2),
(67, 'Em qual torneio de Grand Slam os jogos são disputados em quadras de saibro?', 5, 2),
(68, 'Qual jogador detém o recorde de mais semanas como número 1 do mundo no ranking ATP?', 5, 2),
(69, 'Quem foi o campeão do Australian Open 2024 na categoria feminina?', 5, 2),
(70, 'Qual é o nome do torneio de tênis jogado no saibro de Monte Carlo?', 5, 2),
(71, 'Quem foi o primeiro jogador a completar o \"Career Grand Slam\" no tênis moderno?', 5, 3),
(72, 'Qual é o nome da técnica usada para mudar rapidamente a direção da bola com um golpe de revés?', 5, 3),
(73, 'Em qual ano o tênis foi incluído como esporte olímpico pela primeira vez?', 5, 3),
(74, 'Quem detém o recorde de maior número de títulos de Grand Slam na história do tênis feminino?', 5, 3),
(75, 'Qual foi a primeira final de Grand Slam em que uma partida foi decidida por um tiebreak no quinto set?', 5, 3),
(76, 'Qual país venceu a Copa do Mundo de 2022?', 1, 1),
(77, 'Quem foi o artilheiro da Copa do Mundo de 2018?', 1, 2),
(78, 'Qual jogador detém o recorde de maior número de gols marcados em uma única temporada europeia?', 1, 3),
(79, 'Qual time ganhou mais títulos da NBA?', 2, 1),
(80, 'Quem é o maior cestinha da história da NBA?', 2, 2),
(81, 'Quantos títulos da NBA Michael Jordan ganhou em sua carreira?', 2, 3),
(82, 'Qual é o país natal do surfista Gabriel Medina?', 3, 1),
(83, 'Qual surfista venceu o maior número de campeonatos mundiais de surfe?', 3, 2),
(84, 'Em qual praia aconteceu o primeiro campeonato mundial de surfe oficializado?', 3, 3),
(85, 'Quantos sets são necessários para vencer uma partida de tênis de mesa?', 4, 1),
(86, 'Qual é o nome do material geralmente usado para cobrir as raquetes de tênis de mesa?', 4, 2),
(87, 'Qual é o nome do golpe no qual o jogador executa um saque curto que \"morre\" próximo à rede?', 4, 3),
(88, 'Quem tem o maior número de títulos de Grand Slam no tênis masculino?', 5, 1),
(89, 'Qual é o torneio mais antigo de tênis do mundo?', 5, 2),
(90, 'Quem foi o primeiro tenista a conquistar o Golden Slam (os quatro Grand Slams e o ouro olímpico no mesmo ano)?', 5, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pontuacao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `ranking`
--

INSERT INTO `ranking` (`id`, `id_usuario`, `pontuacao`) VALUES
(9, 9, 0),
(10, 10, 32),
(12, 12, 0),
(13, 13, 1),
(14, 14, 1),
(15, 15, 3),
(16, 16, 3),
(17, 17, 2),
(19, 21, 2),
(20, 26, 19);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imagem_perfil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `email`, `imagem_perfil`) VALUES
(9, 'MIGSTR', '$2y$10$HXDmtwOUUAUV6w847ROkJ.Yl.umouANMApctCbuYPYaX4mIVTKdrq', 'miguel@gmail.com', 'imagem/uploads/677c021a88219_perfilmiguel.jpg'),
(10, 'Diogo', '$2y$10$TVvqYjYyu/e5/n4gCwDxcOJoa8OtPyhbAeFPHHvTvCA3o/iHsRlRa', 'diogo@gmail.com', 'imagem/uploads/677ed4c217835_perfildiogo.jpg'),
(12, 'João Policarpo', '$2y$10$17J9dLfik2fpiXYn9nJ25.BkcqaEUGlJgGJsxfzC7e3xJ4HlDMExK', 'joao@gmail.com', NULL),
(13, 'Guilherme', '$2y$10$/B5k48eRD5zVCDbRci.0uuHfVez40K9kNH1sNNEetbfgtj8EPEcNe', 'gui@gmail.com', NULL),
(14, 'Zeusx', '$2y$10$SdauUlZWHxCv2qLDFT.Ope0gJZXu7NIEV5dTw5bSMjMBE6GnrIlqm', 'nicolas@gmail.com', NULL),
(15, 'João Louko', '$2y$10$RK0awniOX5SFHOc/1ISs2e4YsebF0imllXU2u83N6ihvPtEy1idb2', 'pires@gmail.com', NULL),
(16, 'Yago Model', '$2y$10$/LAGrWV6EWh0.xEdg07O2OntW.uAQCoDAXzhaaT5H9hxLjzQX.5HW', 'yago@gmail.com', NULL),
(17, 'Mariana', '$2y$10$PGCXHA6wzS0uGJUcMe0WrOQqSjuosFo28iK5xnpaf4Wg3zYkjhOYC', 'mariana@gmail.com', NULL),
(19, 'Caio', '$2y$10$hEchq4FacdISO2aaWL16XuK.wHy4d9U/xhi/vAAkWgerV12G5wg.a', 'caio@gmail.com', 'imagem/uploads/6780198ee9bff_Captura de tela 2025-01-04 222338.png'),
(21, 'Joédio', '$2y$10$C5d6YHmhm/GBAOYxpReK2e8zjEBbYiNdJDyaBZ1.wjkjsQAzPXN/K', 'jojo@gmail.com', 'imagem/uploads/6780275137e45_Captura de tela 2025-01-04 222338.png'),
(26, 'excluir', '$2y$10$IbHeadGcicMj8NNwR8f3juuuTmQOrFx.QLOfbHi9JdwH7ujsF0vSW', 'exc@gmail.com', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alternativas`
--
ALTER TABLE `alternativas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `dificuldade`
--
ALTER TABLE `dificuldade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `esportes`
--
ALTER TABLE `esportes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_esporte` (`id_esporte`);

--
-- Índices de tabela `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alternativas`
--
ALTER TABLE `alternativas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT de tabela `dificuldade`
--
ALTER TABLE `dificuldade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `esportes`
--
ALTER TABLE `esportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de tabela `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `perguntas`
--
ALTER TABLE `perguntas`
  ADD CONSTRAINT `perguntas_ibfk_1` FOREIGN KEY (`id_esporte`) REFERENCES `esportes` (`id`);

--
-- Restrições para tabelas `ranking`
--
ALTER TABLE `ranking`
  ADD CONSTRAINT `ranking_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
