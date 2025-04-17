-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/10/2024 às 01:37
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
-- Banco de dados: `tw_2b`
--
CREATE DATABASE IF NOT EXISTS `tw_2b` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tw_2b`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estilo`
--

CREATE TABLE `estilo` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estilo`
--

INSERT INTO `estilo` (`id`, `nome`) VALUES
(1, 'Comedia'),
(2, 'Ação'),
(3, 'Terror');

-- --------------------------------------------------------

--
-- Estrutura para tabela `filme`
--

CREATE TABLE `filme` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `duracao` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `sinopse` varchar(500) DEFAULT NULL,
  `estilo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filme`
--

INSERT INTO `filme` (`id`, `nome`, `ano`, `duracao`, `foto`, `sinopse`, `estilo_id`) VALUES
(1, 'Monty Python em Busca do Calice Sagrado', '1973', 120, 'https://upload.wikimedia.org/wikipedia/pt/b/bc/Monty_Python_Holy_Grail.jpg?20130206092942', 'O melhor Filme de todos', 1),
(2, 'Morre Duro', '1988', 132, 'https://upload.wikimedia.org/wikipedia/pt/2/2a/Die_hard_poster_promocional.png?20110904212836', 'O Cara não morre', 2),
(3, 'Vampiros que se Mordam', '2010', 82, 'https://upload.wikimedia.org/wikipedia/pt/2/27/Vampires_Suck.jpg', 'Melhor que o original', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `locacao`
--

CREATE TABLE `locacao` (
  `id` int(11) NOT NULL,
  `emissao` date NOT NULL DEFAULT current_timestamp(),
  `devolucao` date DEFAULT NULL,
  `valor` double NOT NULL,
  `filme_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `locacao`
--

INSERT INTO `locacao` (`id`, `emissao`, `devolucao`, `valor`, `filme_id`, `cliente_id`) VALUES
(1, '2024-10-23', '2024-10-23', 10, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `tipo` tinyint(1) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `endereco`, `telefone`, `tipo`, `senha`, `cpf`) VALUES
(1, 'adm', 'fundo de quintal', NULL, 1, 'b09c600fddc573f117449b3723f23d64', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `estilo`
--
ALTER TABLE `estilo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `filme`
--
ALTER TABLE `filme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filme_estilo_FK` (`estilo_id`);

--
-- Índices de tabela `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locacao_filme_FK` (`filme_id`),
  ADD KEY `locacao_cliente_FK` (`cliente_id`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pessoa_unique` (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `estilo`
--
ALTER TABLE `estilo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `filme`
--
ALTER TABLE `filme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `locacao`
--
ALTER TABLE `locacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `filme`
--
ALTER TABLE `filme`
  ADD CONSTRAINT `filme_estilo_FK` FOREIGN KEY (`estilo_id`) REFERENCES `estilo` (`id`);

--
-- Restrições para tabelas `locacao`
--
ALTER TABLE `locacao`
  ADD CONSTRAINT `locacao_cliente_FK` FOREIGN KEY (`cliente_id`) REFERENCES `pessoa` (`id`),
  ADD CONSTRAINT `locacao_filme_FK` FOREIGN KEY (`filme_id`) REFERENCES `filme` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
