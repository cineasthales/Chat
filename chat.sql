-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Abr-2017 às 02:56
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE `arquivo` (
  `id` int(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `usuario1_id` int(10) NOT NULL,
  `usuario2_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivogeral`
--

CREATE TABLE `arquivogeral` (
  `id` int(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `usuario_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `geral`
--

CREATE TABLE `geral` (
  `id` int(255) NOT NULL,
  `corpo` varchar(200) NOT NULL,
  `usuario_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id` int(255) NOT NULL,
  `corpo` varchar(200) NOT NULL,
  `usuario1_id` int(10) NOT NULL,
  `usuario2_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `apelido`, `email`, `senha`) VALUES
(1, 'Thales Castro', 'cineasthales', 'thalesccastro@gmail.com', '123'),
(2, 'Fulano de Tal', 'fulano', 'fulano@gmail.com', '123'),
(3, 'Ciclano Junior', 'ciclano', 'ciclano@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario1_id` (`usuario1_id`),
  ADD KEY `usuario2_id` (`usuario2_id`),
  ADD KEY `usuario1_id_2` (`usuario1_id`),
  ADD KEY `usuario2_id_2` (`usuario2_id`);

--
-- Indexes for table `arquivogeral`
--
ALTER TABLE `arquivogeral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `geral`
--
ALTER TABLE `geral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario1_id` (`usuario1_id`),
  ADD KEY `usuario2_id` (`usuario2_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `arquivogeral`
--
ALTER TABLE `arquivogeral`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `geral`
--
ALTER TABLE `geral`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`usuario1_id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `arquivo_ibfk_2` FOREIGN KEY (`usuario2_id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `arquivogeral`
--
ALTER TABLE `arquivogeral`
  ADD CONSTRAINT `arquivogeral_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `geral`
--
ALTER TABLE `geral`
  ADD CONSTRAINT `geral_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`usuario1_id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `mensagem_ibfk_2` FOREIGN KEY (`usuario2_id`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
