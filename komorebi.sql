-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 04:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komorebi`
--
CREATE DATABASE IF NOT EXISTS `komorebi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `komorebi`;

-- --------------------------------------------------------

--
-- Table structure for table `assinatura`
--

CREATE TABLE `assinatura` (
  `id_ass` int(11) NOT NULL,
  `dataini_ass` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vlrmensal_ass` double NOT NULL,
  `tempo_ass` int(11) NOT NULL,
  `status_ass` tinyint(1) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `assinatura`
--

INSERT INTO `assinatura` (`id_ass`, `dataini_ass`, `vlrmensal_ass`, `tempo_ass`, `status_ass`, `usuario_id_usuario`) VALUES
(46, '2022-12-08 02:10:11', 14.99, 1, 1, 5),
(47, '2022-12-08 02:29:55', 14.99, 1, 1, 27),
(48, '2022-12-08 02:42:49', 14.99, 1, 1, 33),
(49, '2022-12-08 02:44:24', 9.99, 12, 1, 32),
(50, '2022-12-08 02:45:51', 12.49, 3, 1, 31),
(51, '2022-12-08 02:47:53', 14.99, 1, 1, 30),
(52, '2022-12-08 02:51:45', 12.49, 3, 1, 29),
(53, '2022-12-08 02:53:04', 12.49, 3, 1, 28);

-- --------------------------------------------------------

--
-- Table structure for table `assinatura_has_jogo`
--

CREATE TABLE `assinatura_has_jogo` (
  `id_ass_has_jogo` int(11) NOT NULL,
  `assinatura_id_ass` int(11) NOT NULL,
  `jogo_id_jogo` int(11) NOT NULL,
  `data_ass_jogo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `assinatura_has_jogo`
--

INSERT INTO `assinatura_has_jogo` (`id_ass_has_jogo`, `assinatura_id_ass`, `jogo_id_jogo`, `data_ass_jogo`) VALUES
(25, 46, 21, '2022-12-07'),
(26, 47, 11, '2022-12-07'),
(27, 47, 12, '2022-12-07'),
(28, 47, 13, '2022-12-07'),
(29, 47, 14, '2022-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `desenvolvedora`
--

CREATE TABLE `desenvolvedora` (
  `id_desenv` int(11) NOT NULL,
  `nome_desenv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `desenvolvedora`
--

INSERT INTO `desenvolvedora` (`id_desenv`, `nome_desenv`) VALUES
(1, 'Rockstar Games'),
(4, 'Re-Logic'),
(5, 'Avalanche'),
(6, 'Valve'),
(7, 'Visual Concept'),
(8, 'CD PROJEKT RED'),
(9, 'Ubisoft'),
(10, 'ConcernedApe'),
(11, 'Nintendo'),
(12, 'Activision-Blizzard'),
(13, 'Amazon Games'),
(14, 'FromSoftware'),
(15, 'Maxis'),
(16, 'Infinity Ward'),
(17, 'Mojang');

-- --------------------------------------------------------

--
-- Table structure for table `distribuidora`
--

CREATE TABLE `distribuidora` (
  `id_dist` int(11) NOT NULL,
  `nome_dist` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `distribuidora`
--

INSERT INTO `distribuidora` (`id_dist`, `nome_dist`) VALUES
(1, '2K'),
(2, 'Activision-Blizzard'),
(3, 'Rockstar Games'),
(4, 'Amazon Games'),
(5, 'ConcernedApe'),
(6, 'CD PROJEKT RED'),
(7, 'FromSoftware'),
(8, 'Ubisoft'),
(9, 'Nintendo'),
(10, 'Valve'),
(11, 'Re-Logic'),
(12, 'Square Enix'),
(13, 'Electronic Arts'),
(14, 'Mojang');

-- --------------------------------------------------------

--
-- Table structure for table `forma_recebimento`
--

CREATE TABLE `forma_recebimento` (
  `id_forma` int(11) NOT NULL,
  `nomecart_forma` varchar(25) NOT NULL,
  `numcart_forma` varchar(16) NOT NULL,
  `valcart_forma` varchar(5) NOT NULL,
  `cvv_forma` int(3) NOT NULL,
  `cpf_forma` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `forma_recebimento`
--

INSERT INTO `forma_recebimento` (`id_forma`, `nomecart_forma`, `numcart_forma`, `valcart_forma`, `cvv_forma`, `cpf_forma`) VALUES
(21, 'MATHEUS FELIPE PEREIRA LO', '1234123412341234', '02/25', 123, '06430051960'),
(22, 'VITOR R GOMES', '9871126119016894', '02/29', 871, '78646477070'),
(23, 'BEATRIZ H LIMA', '9876325149781636', '02/25', 691, '80561539006'),
(24, 'LEANDRO MELLO', '5337036520092054', '02/26', 387, '76175028007'),
(25, 'ROBERTO O S JUNIOR', '4532206539844888', '12/30', 985, '72234219086'),
(26, 'ELIATAN F M ALMEIDA', '4916210013613849', '01/22', 345, '09471526019'),
(27, 'MATHEUS F P LOPES', '5522679993727618', '06/26', 366, '88933455019'),
(28, 'JOAO S BARROS', '5334517923274954', '03/27', 655, '12586978072');

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE `genero` (
  `id_gen` int(11) NOT NULL,
  `nome_gen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`id_gen`, `nome_gen`) VALUES
(1, 'Sandbox'),
(2, 'Terror'),
(3, 'Simulação'),
(4, 'FPS'),
(5, 'Ação'),
(6, 'Esportes'),
(7, 'Estratégia'),
(8, 'RPG'),
(9, 'Corrida'),
(10, 'MMO'),
(11, 'Aventura'),
(12, 'Sobrevivência');

-- --------------------------------------------------------

--
-- Table structure for table `jogo`
--

CREATE TABLE `jogo` (
  `id_jogo` int(11) NOT NULL,
  `nome_jogo` varchar(100) NOT NULL,
  `datalanc_jogo` date NOT NULL,
  `img_jogo` varchar(200) NOT NULL,
  `desc_jogo` longtext NOT NULL,
  `genero_id_gen` int(11) NOT NULL,
  `distribuidora_id_dist` int(11) NOT NULL,
  `desenvolvedora_id_desenv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jogo`
--

INSERT INTO `jogo` (`id_jogo`, `nome_jogo`, `datalanc_jogo`, `img_jogo`, `desc_jogo`, `genero_id_gen`, `distribuidora_id_dist`, `desenvolvedora_id_desenv`) VALUES
(11, 'The Witcher 3', '2015-05-18', 'imagensJogo/tw3.jpg', 'Enquanto a guerra assola todos os Reinos do Norte, você enfrenta o maior conflito de sua vida: ir em busca da criança da profecia, uma arma senciente capaz de alterar o mundo.', 8, 6, 8),
(12, 'Grand Theft Auto V', '2013-09-17', 'imagensJogo/gta_v.jpg', 'Grand Theft Auto V oferece aos jogadores a opção de explorar o gigantesco e premiado mundo de Los Santos e Blaine County.', 1, 3, 1),
(13, 'Terraria', '2011-05-16', 'imagensJogo/terraria.jpg', 'Terraria é um jogo RPG de ação-aventura. Possui como características a exploração, construção de estruturas e combate a monstros perigosos em um mundo 2D gerado proceduralmente.', 12, 11, 4),
(14, 'The Sims 3', '2009-06-02', 'imagensJogo/ts3.jpg', 'The Sims 3 é um jogo de simulação de vida produzido pela Maxis e distribuído pela Eletronic Arts. É um jogo onde se podem criar e controlar as vidas de pessoas virtuais (denominados Sims)', 3, 13, 15),
(15, 'NBA 2K23', '2022-09-08', 'imagensJogo/2k23.jpg', 'Mostre que você está à altura deste momento no NBA 2K23. Mostre seu talento no MyCAREER. Una os All-Stars com as lendas atemporais no MyTEAM. Construa a sua própria dinastia no MyGM ou leve a NBA a uma nova direção no MyLEAGUE.', 6, 1, 7),
(16, 'Assassins Creed: Valhalla', '2020-11-10', 'imagensJogo/acvalhalla.jpg', 'Assassins Creed: Valhalla se ambienta no passado histórico do século IX. Os jogadores jogam na pele de Eivor, um viking que lidera uma tribo para invadir e conquistar o oeste da Inglaterra. O jogo se passa na Noruega e nas terras dos saxões.', 5, 8, 9),
(17, 'Call of Duty: Modern Warfare II', '2022-10-27', 'imagensJogo/codmw2.jpg', 'O Call of Duty®: Modern Warfare® II coloca os jogadores dentro de um conflito global sem precedentes que conta com o retorno dos Operadores icônicos da Força-Tarefa 141.', 4, 2, 16),
(18, 'Just Cause 4', '2018-12-03', 'imagensJogo/jc4.jpg', 'O agente Rico Rodriguez vai para Solís, um imenso território na América do Sul repleto de conflito, opressão e condições climáticas extremas. Equipe o traje planador e o gancho totalmente personalizável e prepare-se para entrar no olho do furacão!', 1, 12, 5),
(19, 'Red Dead Redemption 2', '2018-10-26', 'imagensJogo/rdr2.jpg', 'Red Dead Redemption 2, a épica aventura de mundo aberto da Rockstar Games aclamada pela crítica e o jogo mais bem avaliado desta geração de consoles, agora chega aprimorado para PC com conteúdos inéditos no Modo História, melhorias visuais e muito mais.', 1, 3, 1),
(20, 'New World', '2021-09-09', 'imagensJogo/nw.webp', 'Explore um MMO de mundo aberto emocionante e cheio de perigos e oportunidades, onde você irá forjar um novo destino na ilha sobrenatural de Aeternum.', 10, 4, 13),
(21, 'Minecraft', '2022-01-01', 'imagensJogo/mine.webp', 'Minecraft é um jogo eletrônico lançado em 2009 que consiste em sobreviver em um mundo formado (majoritariamente) por blocos cúbicos. Steve, o personagem controlado pelo jogador, inicia o jogo em um ambiente repleto de árvores, montanhas, rios.', 12, 14, 17);

-- --------------------------------------------------------

--
-- Table structure for table `recebimento`
--

CREATE TABLE `recebimento` (
  `id_receb` int(11) NOT NULL,
  `forma_receb_forma` int(11) NOT NULL,
  `data_receb` date NOT NULL,
  `vlr_receb` double NOT NULL,
  `assinatura_id_ass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `recebimento`
--

INSERT INTO `recebimento` (`id_receb`, `forma_receb_forma`, `data_receb`, `vlr_receb`, `assinatura_id_ass`) VALUES
(33, 21, '2022-12-07', 14.99, 46),
(34, 22, '2022-12-07', 14.99, 47),
(35, 23, '2022-12-07', 14.99, 48),
(36, 24, '2022-12-07', 119.88, 49),
(37, 25, '2022-12-07', 37.47, 50),
(38, 26, '2022-12-07', 14.99, 51),
(39, 27, '2022-12-07', 37.47, 52),
(40, 28, '2022-12-07', 37.47, 53);

-- --------------------------------------------------------

--
-- Table structure for table `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipousuario` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipousuario`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Assinante mensal'),
(3, 'Assinante trimestral'),
(4, 'Assinante anual'),
(5, 'Não-assinante');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(20) NOT NULL,
  `datanasc_usuario` date NOT NULL,
  `email_usuario` varchar(64) NOT NULL,
  `senha_usuario` varchar(64) NOT NULL,
  `telefone_usuario` varchar(20) NOT NULL,
  `cpf_usuario` varchar(20) NOT NULL,
  `criacaoconta_usuario` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `img_usuario` varchar(200) DEFAULT NULL,
  `tipousuario_id_tipousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `datanasc_usuario`, `email_usuario`, `senha_usuario`, `telefone_usuario`, `cpf_usuario`, `criacaoconta_usuario`, `img_usuario`, `tipousuario_id_tipousuario`) VALUES
(5, 'Lopes', '2003-12-26', 'lopes2@gmail.com', '123', '(44) 8426-6109', '9127512957', '2022-12-08 01:17:12', 'imagensUsuario/sapo-e-anfibio.jpg', 1),
(27, 'vitor', '2004-01-02', 'vitor@gmail.com', '123456', '(44) 1875-9874', '81956352023', '2022-12-08 02:29:55', 'imagensUsuario/0f05bd7a645439c488fa8bb78554d55a.jpg', 2),
(28, 'joao', '2005-08-05', 'joao@gmail.com', '123456', '(44) 7125-9638', '95179761000', '2022-12-08 02:53:04', 'imagensUsuario/a7efa1f910fb9437d292d07738da132a.jpg', 3),
(29, 'matheus', '1997-09-08', 'matheus@gmail.com', '123456', '(44) 8756-3294', '22177112028', '2022-12-08 02:51:45', 'imagensUsuario/41058d3596beef7a55756ef9daa01c8d.jpg', 3),
(30, 'eliatan', '1987-06-07', 'eliatan@gmail.com', '123456', '(44) 7852-3153', '94775067028', '2022-12-08 02:47:53', 'imagensUsuario/bb51efe2f330fda1dbea0c9c9ec6d35b.jpg', 2),
(31, 'roberto', '1999-09-13', 'roberto@gmail.com', '123456', '(44) 7415-6794', '55529944000', '2022-12-08 02:45:51', 'imagensUsuario/d7b4fd72edae50a8d5ba52f60c8ead29.jpg', 3),
(32, 'leandro', '2001-10-21', 'leandro@gmail.com', '123456', '(11) 5874-6821', '00007767005', '2022-12-08 02:44:24', 'imagensUsuario/e97247edd8cfa4bfc3d9ae0a4142f5cc.jpg', 4),
(33, 'beatriz', '2000-08-06', 'beatriz@gmail.com', '123456', '(83) 9586-3125', '82303538084', '2022-12-08 02:42:49', 'imagensUsuario/e419c6ffec0ca3ee047dd36231460c71.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assinatura`
--
ALTER TABLE `assinatura`
  ADD PRIMARY KEY (`id_ass`),
  ADD KEY `fk_assinatura_usuario1_idx` (`usuario_id_usuario`);

--
-- Indexes for table `assinatura_has_jogo`
--
ALTER TABLE `assinatura_has_jogo`
  ADD PRIMARY KEY (`id_ass_has_jogo`),
  ADD KEY `fk_assinatura_has_jogo_assinatura1_idx` (`assinatura_id_ass`),
  ADD KEY `fk_assinatura_has_jogo_jogo1_idx` (`jogo_id_jogo`);

--
-- Indexes for table `desenvolvedora`
--
ALTER TABLE `desenvolvedora`
  ADD PRIMARY KEY (`id_desenv`);

--
-- Indexes for table `distribuidora`
--
ALTER TABLE `distribuidora`
  ADD PRIMARY KEY (`id_dist`);

--
-- Indexes for table `forma_recebimento`
--
ALTER TABLE `forma_recebimento`
  ADD PRIMARY KEY (`id_forma`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_gen`);

--
-- Indexes for table `jogo`
--
ALTER TABLE `jogo`
  ADD PRIMARY KEY (`id_jogo`),
  ADD KEY `fk_jogo_genero1_idx` (`genero_id_gen`),
  ADD KEY `fk_jogo_distribuidora1_idx` (`distribuidora_id_dist`),
  ADD KEY `fk_jogo_desenvolvedora1_idx` (`desenvolvedora_id_desenv`);

--
-- Indexes for table `recebimento`
--
ALTER TABLE `recebimento`
  ADD PRIMARY KEY (`id_receb`),
  ADD KEY `fk_recebimento_assinatura1_idx` (`assinatura_id_ass`),
  ADD KEY `forma_receb_forma` (`forma_receb_forma`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipousuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_tipousuario1_idx` (`tipousuario_id_tipousuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assinatura`
--
ALTER TABLE `assinatura`
  MODIFY `id_ass` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `assinatura_has_jogo`
--
ALTER TABLE `assinatura_has_jogo`
  MODIFY `id_ass_has_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `desenvolvedora`
--
ALTER TABLE `desenvolvedora`
  MODIFY `id_desenv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `distribuidora`
--
ALTER TABLE `distribuidora`
  MODIFY `id_dist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `forma_recebimento`
--
ALTER TABLE `forma_recebimento`
  MODIFY `id_forma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `id_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jogo`
--
ALTER TABLE `jogo`
  MODIFY `id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `recebimento`
--
ALTER TABLE `recebimento`
  MODIFY `id_receb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assinatura`
--
ALTER TABLE `assinatura`
  ADD CONSTRAINT `fk_assinatura_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `assinatura_has_jogo`
--
ALTER TABLE `assinatura_has_jogo`
  ADD CONSTRAINT `fk_assinatura_has_jogo_assinatura1` FOREIGN KEY (`assinatura_id_ass`) REFERENCES `assinatura` (`id_ass`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_assinatura_has_jogo_jogo1` FOREIGN KEY (`jogo_id_jogo`) REFERENCES `jogo` (`id_jogo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jogo`
--
ALTER TABLE `jogo`
  ADD CONSTRAINT `fk_jogo_desenvolvedora1` FOREIGN KEY (`desenvolvedora_id_desenv`) REFERENCES `desenvolvedora` (`id_desenv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogo_distribuidora1` FOREIGN KEY (`distribuidora_id_dist`) REFERENCES `distribuidora` (`id_dist`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogo_genero1` FOREIGN KEY (`genero_id_gen`) REFERENCES `genero` (`id_gen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recebimento`
--
ALTER TABLE `recebimento`
  ADD CONSTRAINT `fk_recebimento_assinatura1` FOREIGN KEY (`assinatura_id_ass`) REFERENCES `assinatura` (`id_ass`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `forma_receb_forma` FOREIGN KEY (`forma_receb_forma`) REFERENCES `forma_recebimento` (`id_forma`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipousuario1` FOREIGN KEY (`tipousuario_id_tipousuario`) REFERENCES `tipousuario` (`id_tipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
