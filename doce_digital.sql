-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 10/06/2026 às 18:13
-- Versão do servidor: 8.0.44
-- Versão do PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `doce_digital`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int NOT NULL,
  `id_receita` int NOT NULL,
  `id_utilizador` int NOT NULL,
  `mensagem` text NOT NULL,
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int NOT NULL,
  `id_receita` int NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

CREATE TABLE `receitas` (
  `id` int NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descricao` text,
  `imagem` varchar(255) DEFAULT NULL,
  `tempo` varchar(50) DEFAULT NULL,
  `dificuldade` enum('Fácil','Intermédio','Avançado') DEFAULT NULL,
  `porcoes` int DEFAULT NULL,
  `id_utilizador` int DEFAULT NULL,
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id`, `titulo`, `descricao`, `imagem`, `tempo`, `dificuldade`, `porcoes`, `id_utilizador`, `criado_em`) VALUES
(1, 'Bolo de Chocolate', 'Fofinho e com aquele gostinho da casa da vó.', 'bolo-chocolate.jpg', '40 min', 'Fácil', 15, 1, '2026-06-10 11:51:18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `nome`, `email`, `password`, `criado_em`) VALUES
(1, 'Jessica', 'jessica@teste.com', '$2y$10$K7Z8UEmZzN9aR6DuFcrrde1r67zDAD6jvHrJngUVcBEq7mkIkeTTy', '2026-06-08 20:18:33');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_receita` (`id_receita`),
  ADD KEY `id_utilizador` (`id_utilizador`);

--
-- Índices de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_receita` (`id_receita`);

--
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilizador` (`id_utilizador`);

--
-- Índices de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_receita`) REFERENCES `receitas` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizadores` (`id`);

--
-- Restrições para tabelas `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`id_receita`) REFERENCES `receitas` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `receitas_ibfk_1` FOREIGN KEY (`id_utilizador`) REFERENCES `utilizadores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
