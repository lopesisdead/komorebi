-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2022 às 13:44
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `komorebi`
--
CREATE DATABASE IF NOT EXISTS `komorebi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `komorebi`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `assinatura`
--

CREATE TABLE `assinatura` (
  `id_ass` int(11) NOT NULL,
  `dataini_ass` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vlrmensal_ass` double NOT NULL,
  `tempo_ass` int(11) NOT NULL,
  `status_ass` tinyint(1) NOT NULL,
  `usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `assinatura`
--

INSERT INTO `assinatura` (`id_ass`, `dataini_ass`, `vlrmensal_ass`, `tempo_ass`, `status_ass`, `usuario_id_usuario`) VALUES
(27, '2022-12-05 22:48:44', 12.49, 3, 1, 21),
(28, '2022-12-05 22:49:20', 14.99, 1, 1, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `assinatura_has_jogo`
--

CREATE TABLE `assinatura_has_jogo` (
  `id_ass_has_jogo` int(11) NOT NULL,
  `assinatura_id_ass` int(11) NOT NULL,
  `jogo_id_jogo` int(11) NOT NULL,
  `data_ass_jogo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `assinatura_has_jogo`
--

INSERT INTO `assinatura_has_jogo` (`id_ass_has_jogo`, `assinatura_id_ass`, `jogo_id_jogo`, `data_ass_jogo`) VALUES
(2, 28, 7, '2022-12-05'),
(5, 28, 1, '2022-12-06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `desenvolvedora`
--

CREATE TABLE `desenvolvedora` (
  `id_desenv` int(11) NOT NULL,
  `nome_desenv` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `desenvolvedora`
--

INSERT INTO `desenvolvedora` (`id_desenv`, `nome_desenv`) VALUES
(1, 'Rockstar2'),
(4, 'E'),
(5, 'F'),
(6, 'G'),
(7, 'H'),
(8, 'CD Projekt Red');

-- --------------------------------------------------------

--
-- Estrutura da tabela `distribuidora`
--

CREATE TABLE `distribuidora` (
  `id_dist` int(11) NOT NULL,
  `nome_dist` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `distribuidora`
--

INSERT INTO `distribuidora` (`id_dist`, `nome_dist`) VALUES
(1, '2K Games2'),
(2, 'A'),
(3, 'B'),
(4, 'C'),
(5, 'D'),
(6, 'CD Projekt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_recebimento`
--

CREATE TABLE `forma_recebimento` (
  `id_forma` int(11) NOT NULL,
  `nomecart_forma` varchar(25) NOT NULL,
  `numcart_forma` varchar(16) NOT NULL,
  `valcart_forma` varchar(5) NOT NULL,
  `cvv_forma` int(3) NOT NULL,
  `cpf_forma` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `forma_recebimento`
--

INSERT INTO `forma_recebimento` (`id_forma`, `nomecart_forma`, `numcart_forma`, `valcart_forma`, `cvv_forma`, `cpf_forma`) VALUES
(15, 'MATHEUS FELIPE PEREIRA LO', '1234123412341234', '01/25', 123, '06430051960');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id_gen` int(11) NOT NULL,
  `nome_gen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id_gen`, `nome_gen`) VALUES
(1, 'Sandbox2'),
(2, 'Terror'),
(3, 'Simulação'),
(4, 'FPS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE `jogo` (
  `id_jogo` int(11) NOT NULL,
  `nome_jogo` varchar(100) NOT NULL,
  `datalanc_jogo` date NOT NULL,
  `img_jogo` varchar(200) NOT NULL,
  `desc_jogo` longtext NOT NULL,
  `classif_jogo` varchar(3) NOT NULL,
  `genero_id_gen` int(11) NOT NULL,
  `distribuidora_id_dist` int(11) NOT NULL,
  `desenvolvedora_id_desenv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`id_jogo`, `nome_jogo`, `datalanc_jogo`, `img_jogo`, `desc_jogo`, `classif_jogo`, `genero_id_gen`, `distribuidora_id_dist`, `desenvolvedora_id_desenv`) VALUES
(1, 'Grand Theft Auto V', '2013-12-26', 'imagensJogo/V2.jpg', 'jogo tirinho etc', '', 2, 4, 6),
(2, 'The Last of Us: I', '2013-12-26', 'imagensJogo/11669275_20945850.jpg', '61261', '', 1, 1, 1),
(6, 'Just Cause', '1985-02-04', 'imagensJogo/3e851250fb393aed23e0bf1edcfb55ab.jpg', 'aoamsgoasmhasohno', '', 3, 1, 7),
(7, 'The Witcher 3', '2015-05-19', 'imagensJogo/1244644.jpg', 'aaaaaaaaaa', '', 3, 4, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `recebimento`
--

CREATE TABLE `recebimento` (
  `id_receb` int(11) NOT NULL,
  `forma_receb_forma` int(11) NOT NULL,
  `data_receb` date NOT NULL,
  `vlr_receb` double NOT NULL,
  `assinatura_id_ass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `recebimento`
--

INSERT INTO `recebimento` (`id_receb`, `forma_receb_forma`, `data_receb`, `vlr_receb`, `assinatura_id_ass`) VALUES
(14, 15, '2022-12-05', 37.47, 27),
(15, 15, '2022-12-05', 14.99, 28);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipousuario` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipousuario`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Assinante mensal'),
(3, 'Assinante trimestral'),
(4, 'Assinante anual'),
(5, 'Não-assinante');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `datanasc_usuario`, `email_usuario`, `senha_usuario`, `telefone_usuario`, `cpf_usuario`, `criacaoconta_usuario`, `img_usuario`, `tipousuario_id_tipousuario`) VALUES
(5, 'Lopes', '2003-12-26', 'lopes2@gmail.com', '123', '81725812', '9127512957', '2022-12-05 14:19:00', 'imagensUsuario/sapo-e-anfibio.jpg', 1),
(11, 'lopes85', '2003-12-26', 'lopes4@gmail.com', '123', '12515125', '', '2022-12-05 22:49:20', 'imagensUsuario/3e851250fb393aed23e0bf1edcfb55ab.jpg', 2),
(16, 'lopes7', '1226-02-06', 'lopes7@gmail.com', '123456', '125125', '80876084021', '2022-12-05 22:45:45', 'imagensUsuario/8d1f8c1b452ca68db8e22bd003ddd320.jpg', 5),
(19, 'lopes8', '2003-12-26', 'lopes8@gmail.com', '123456', '612616', '29193435053', '2022-12-05 21:58:31', 'imagensUsuario/5757f5d769d9f63e09f7b3cabe172a1a.jpg', 5),
(20, 'lopes9', '2003-02-06', 'lopes9@gmail.com', '123456', '1261616', '09130815070', '2022-12-05 21:58:32', 'imagensUsuario/a7efa1f910fb9437d292d07738da132a.jpg', 5),
(21, 'lopes11', '1220-02-06', 'lopes11@gmail.com', '123456', '125125125', '06430051960', '2022-12-05 22:48:44', 'imagensUsuario/a15c6a407060dd9c67d1d6df224381fb.jpg', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `assinatura`
--
ALTER TABLE `assinatura`
  ADD PRIMARY KEY (`id_ass`),
  ADD KEY `fk_assinatura_usuario1_idx` (`usuario_id_usuario`);

--
-- Índices para tabela `assinatura_has_jogo`
--
ALTER TABLE `assinatura_has_jogo`
  ADD PRIMARY KEY (`id_ass_has_jogo`),
  ADD KEY `fk_assinatura_has_jogo_assinatura1_idx` (`assinatura_id_ass`),
  ADD KEY `fk_assinatura_has_jogo_jogo1_idx` (`jogo_id_jogo`);

--
-- Índices para tabela `desenvolvedora`
--
ALTER TABLE `desenvolvedora`
  ADD PRIMARY KEY (`id_desenv`);

--
-- Índices para tabela `distribuidora`
--
ALTER TABLE `distribuidora`
  ADD PRIMARY KEY (`id_dist`);

--
-- Índices para tabela `forma_recebimento`
--
ALTER TABLE `forma_recebimento`
  ADD PRIMARY KEY (`id_forma`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_gen`);

--
-- Índices para tabela `jogo`
--
ALTER TABLE `jogo`
  ADD PRIMARY KEY (`id_jogo`),
  ADD KEY `fk_jogo_genero1_idx` (`genero_id_gen`),
  ADD KEY `fk_jogo_distribuidora1_idx` (`distribuidora_id_dist`),
  ADD KEY `fk_jogo_desenvolvedora1_idx` (`desenvolvedora_id_desenv`);

--
-- Índices para tabela `recebimento`
--
ALTER TABLE `recebimento`
  ADD PRIMARY KEY (`id_receb`),
  ADD KEY `fk_recebimento_assinatura1_idx` (`assinatura_id_ass`),
  ADD KEY `forma_receb_forma` (`forma_receb_forma`);

--
-- Índices para tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipousuario`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuario_tipousuario1_idx` (`tipousuario_id_tipousuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assinatura`
--
ALTER TABLE `assinatura`
  MODIFY `id_ass` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `assinatura_has_jogo`
--
ALTER TABLE `assinatura_has_jogo`
  MODIFY `id_ass_has_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `desenvolvedora`
--
ALTER TABLE `desenvolvedora`
  MODIFY `id_desenv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `distribuidora`
--
ALTER TABLE `distribuidora`
  MODIFY `id_dist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `forma_recebimento`
--
ALTER TABLE `forma_recebimento`
  MODIFY `id_forma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `jogo`
--
ALTER TABLE `jogo`
  MODIFY `id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `recebimento`
--
ALTER TABLE `recebimento`
  MODIFY `id_receb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `assinatura`
--
ALTER TABLE `assinatura`
  ADD CONSTRAINT `fk_assinatura_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `assinatura_has_jogo`
--
ALTER TABLE `assinatura_has_jogo`
  ADD CONSTRAINT `fk_assinatura_has_jogo_assinatura1` FOREIGN KEY (`assinatura_id_ass`) REFERENCES `assinatura` (`id_ass`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_assinatura_has_jogo_jogo1` FOREIGN KEY (`jogo_id_jogo`) REFERENCES `jogo` (`id_jogo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `jogo`
--
ALTER TABLE `jogo`
  ADD CONSTRAINT `fk_jogo_desenvolvedora1` FOREIGN KEY (`desenvolvedora_id_desenv`) REFERENCES `desenvolvedora` (`id_desenv`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogo_distribuidora1` FOREIGN KEY (`distribuidora_id_dist`) REFERENCES `distribuidora` (`id_dist`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jogo_genero1` FOREIGN KEY (`genero_id_gen`) REFERENCES `genero` (`id_gen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `recebimento`
--
ALTER TABLE `recebimento`
  ADD CONSTRAINT `fk_recebimento_assinatura1` FOREIGN KEY (`assinatura_id_ass`) REFERENCES `assinatura` (`id_ass`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `forma_receb_forma` FOREIGN KEY (`forma_receb_forma`) REFERENCES `forma_recebimento` (`id_forma`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipousuario1` FOREIGN KEY (`tipousuario_id_tipousuario`) REFERENCES `tipousuario` (`id_tipousuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
