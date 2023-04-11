-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql202.epizy.com
-- Tempo de geração: 27/03/2023 às 18:13
-- Versão do servidor: 10.4.17-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_31383601_aloc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_col` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `funcao` varchar(100) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `situacao` enum('DESBLOQUEAR','BLOQUEAR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id_col`, `nome`, `cpf`, `funcao`, `setor`, `usuario`, `senha`, `situacao`) VALUES
(1, 'Pedro Lucas Morato Dantas', '62473528322', 'Suporte em TI', 'TI', 'pedro.morato', '1234', 'DESBLOQUEAR'),
(2, 'Rosângela Morato Dantas', '00000000000', 'Professora', 'FUND. ANOS INICIAIS', 'rosa.morato', '12345', 'DESBLOQUEAR');

-- --------------------------------------------------------

--
-- Estrutura para tabela `colaborador`
--

CREATE TABLE `colaborador` (
  `id_col` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `funcao` varchar(255) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `situacao` enum('DESBLOQUEAR','BLOQUEAR') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `colaborador`
--

INSERT INTO `colaborador` (`id_col`, `nome`, `cpf`, `funcao`, `setor`, `usuario`, `senha`, `situacao`) VALUES
(1, 'Kamila Vitória Alexandre dos Santos', '00000000000', 'Professora Habilidades Digitais', 'TE', 'kamila.vitoria', '1902', 'DESBLOQUEAR'),
(2, 'Usuário Teste', '00000000000', 'Teste', 'Secretaria', 'usuario.teste', '123456789', 'DESBLOQUEAR');

-- --------------------------------------------------------

--
-- Estrutura para tabela `items`
--

CREATE TABLE `items` (
  `cod` int(11) NOT NULL,
  `nome_reg` varchar(255) NOT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `num_serie` varchar(255) DEFAULT NULL,
  `setor` varchar(255) DEFAULT NULL,
  `userAtual` varchar(255) DEFAULT NULL,
  `horario_alocado` timestamp NULL DEFAULT current_timestamp(),
  `situacao` enum('ALOCADO','DEVOLVIDO') DEFAULT NULL,
  `dispAloc` enum('S','N') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `items`
--

INSERT INTO `items` (`cod`, `nome_reg`, `categoria`, `num_serie`, `setor`, `userAtual`, `horario_alocado`, `situacao`, `dispAloc`) VALUES
(1, 'WEBCAM_01', 'PERIFÉRICOS', NULL, 'TI', 'Usuário Teste', '2023-03-27 21:51:31', 'DEVOLVIDO', 'S'),
(2, 'WEBCAM_02', 'PERIFÉRICOS', NULL, 'TI', 'Usuário Teste', '2022-09-08 22:07:19', 'DEVOLVIDO', 'S'),
(3, 'WEBCAM_03', 'PERIFÉRICOS', NULL, 'TI', '', '2022-03-26 17:45:56', '', 'S'),
(4, 'WEBCAM_04', 'PERIFÉRICOS', NULL, 'TI', '', '2022-03-26 17:45:57', '', 'S'),
(5, 'WEBCAM_05', 'PERIFÉRICOS', NULL, 'TI', 'Kamila Vitória Alexandre dos Santos', '2022-09-08 22:05:00', 'DEVOLVIDO', 'S'),
(6, 'WEBCAM_06', 'PERIFÉRICOS', NULL, 'TI', '', '2022-03-26 17:46:05', '', 'S'),
(7, 'WEBCAM_07', 'PERIFÉRICOS', NULL, 'TI', 'Usuário Teste', '2022-09-08 22:07:20', 'DEVOLVIDO', 'S'),
(8, 'NOT_01', 'NOTEBOOKS', NULL, 'TI', 'Kamila Vitória Alexandre dos Santos', '2022-03-29 12:40:14', 'DEVOLVIDO', 'S'),
(9, 'NOT_02', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:00', '', 'S'),
(10, 'NOT_03', 'NOTEBOOKS', NULL, 'TI', 'Usuário Teste', '2023-03-27 21:51:33', 'DEVOLVIDO', 'S'),
(11, 'NOT_04', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:02', '', 'S'),
(12, 'NOT_05', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:02', '', 'S'),
(13, 'NOT_06', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:04', '', 'S'),
(14, 'NOT_07', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:15', '', 'S'),
(15, 'NOT_08', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:16', '', 'S'),
(16, 'NOT_09', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:17', '', 'S'),
(17, 'NOT_10', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:19', '', 'S'),
(18, 'NOT_11', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:21', '', 'S'),
(19, 'NOT_12', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:23', '', 'S'),
(20, 'NOT_13', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:25', '', 'S'),
(21, 'NOT_14', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:26', '', 'S'),
(22, 'NOT_15', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:29', '', 'S'),
(23, 'NOT_16', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:32', '', 'S'),
(24, 'NOT_17', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:34', '', 'S'),
(25, 'NOT_18', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:35', '', 'S'),
(26, 'NOT_19', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:37', '', 'S'),
(27, 'NOT_20', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:39', '', 'S'),
(28, 'NOT_21', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:41', '', 'S'),
(29, 'NOT_22', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:43', '', 'S'),
(30, 'NOT_23', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:44', '', 'S'),
(31, 'NOT_24', 'NOTEBOOKS', NULL, 'TI', 'Kamila Vitória Alexandre dos Santos', '2022-09-08 22:05:02', 'DEVOLVIDO', 'S'),
(32, 'NOT_25', 'NOTEBOOKS', NULL, 'TI', 'Usuário Teste', '2022-09-08 22:07:23', 'DEVOLVIDO', 'S'),
(33, 'NOT_26', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:10', '', 'S'),
(34, 'NOT_27', 'NOTEBOOKS', NULL, 'TI', '', '2022-03-26 17:46:09', '', 'S'),
(35, 'NOT_28', 'NOTEBOOKS', NULL, 'TI', 'Kamila Vitória Alexandre dos Santos', '2022-03-29 12:40:18', 'DEVOLVIDO', 'S'),
(36, 'RH_01', 'COMPUTADOR', NULL, 'RH', NULL, '2022-03-26 18:12:36', 'ALOCADO', 'N');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_col`);

--
-- Índices de tabela `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`id_col`);

--
-- Índices de tabela `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_col` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id_col` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `items`
--
ALTER TABLE `items`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
