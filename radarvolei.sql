-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06/11/2025 às 20:35
-- Versão do servidor: 12.0.2-MariaDB
-- Versão do PHP: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `radarvolei`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Arena`
--

CREATE TABLE `Arena` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `capacidade` int(5) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `numero` int(4) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `instagram` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Comissao`
--

CREATE TABLE `Comissao` (
  `id` int(11) NOT NULL,
  `presidente` varchar(45) NOT NULL,
  `diretor` varchar(45) NOT NULL,
  `tecnico` varchar(45) NOT NULL,
  `auxiliar` varchar(45) DEFAULT NULL,
  `preparador_fisico` varchar(45) DEFAULT NULL,
  `fisioterapeuta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Historico`
--

CREATE TABLE `Historico` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `posicao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `IdentidadePricipal`
--

CREATE TABLE `IdentidadePricipal` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `apelido` varchar(45) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `data_fundacao` date NOT NULL,
  `cep` varchar(8) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `cor_principal` varchar(7) NOT NULL,
  `macote` varchar(45) NOT NULL,
  `escudo_time` blob NOT NULL,
  `uniforme_time` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Jogador`
--

CREATE TABLE `Jogador` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `numero` int(3) NOT NULL,
  `posicao` varchar(15) NOT NULL,
  `nascionalidade` varchar(45) NOT NULL,
  `data_nascimento` date NOT NULL,
  `peso` decimal(3,2) NOT NULL,
  `altura` decimal(3,2) NOT NULL,
  `data_contrato` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Noticia`
--

CREATE TABLE `Noticia` (
  `id` int(11) NOT NULL,
  `url` longblob NOT NULL,
  `descricao` int(245) NOT NULL,
  `img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(145) NOT NULL,
  `senha` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Arena`
--
ALTER TABLE `Arena`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Comissao`
--
ALTER TABLE `Comissao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `IdentidadePricipal`
--
ALTER TABLE `IdentidadePricipal`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Jogador`
--
ALTER TABLE `Jogador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Noticia`
--
ALTER TABLE `Noticia`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Arena`
--
ALTER TABLE `Arena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Comissao`
--
ALTER TABLE `Comissao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `IdentidadePricipal`
--
ALTER TABLE `IdentidadePricipal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Jogador`
--
ALTER TABLE `Jogador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Noticia`
--
ALTER TABLE `Noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
