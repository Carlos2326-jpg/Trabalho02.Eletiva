-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Nov-2025 às 15:01
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `diretoria`
--

CREATE TABLE `diretoria` (
  `id` int(6) NOT NULL,
  `presidente` varchar(90) NOT NULL,
  `diretor` varchar(90) NOT NULL,
  `tecnico` varchar(90) NOT NULL,
  `auxiliar` varchar(90) DEFAULT NULL,
  `preparador` varchar(90) DEFAULT NULL,
  `fisioterapeuta` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ginasio`
--

CREATE TABLE `ginasio` (
  `id` int(6) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `capacidade` bigint(5) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `numero` int(4) NOT NULL,
  `instagram` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(6) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `posicao` int(1) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `identidadeprincipal`
--

CREATE TABLE `identidadeprincipal` (
  `id` int(6) NOT NULL,
  `nomeOf` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `sigla` varchar(8) NOT NULL,
  `dataFundacao` datetime NOT NULL,
  `cep` varchar(8) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(90) NOT NULL,
  `paleta` enum('cor1','cor2') NOT NULL,
  `mascote` varchar(45) NOT NULL,
  `escudo` blob NOT NULL,
  `uniforme` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogador`
--

CREATE TABLE `jogador` (
  `id` int(6) NOT NULL,
  `nome` varchar(90) NOT NULL,
  `numero` int(2) NOT NULL,
  `posicao` varchar(10) NOT NULL,
  `nacionalidade` varchar(45) NOT NULL,
  `dataNasc` datetime NOT NULL,
  `peso` decimal(3,2) NOT NULL,
  `altura` decimal(3,2) NOT NULL,
  `dataContrato` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `id` int(6) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `resumo` varchar(1500) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(6) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(300) NOT NULL,
  `senha` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `diretoria`
--
ALTER TABLE `diretoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ginasio`
--
ALTER TABLE `ginasio`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `identidadeprincipal`
--
ALTER TABLE `identidadeprincipal`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jogador`
--
ALTER TABLE `jogador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `diretoria`
--
ALTER TABLE `diretoria`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ginasio`
--
ALTER TABLE `ginasio`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `identidadeprincipal`
--
ALTER TABLE `identidadeprincipal`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jogador`
--
ALTER TABLE `jogador`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
