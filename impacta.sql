-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2023 às 15:00
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `impacta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `condominos`
--

CREATE TABLE `condominos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fone_whatsapp` varchar(15) NOT NULL,
  `apartamento` varchar(10) NOT NULL,
  `bloco` varchar(10) DEFAULT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `condominos`
--

INSERT INTO `condominos` (`id`, `nome`, `cpf`, `email`, `fone_whatsapp`, `apartamento`, `bloco`, `senha`) VALUES
(1, 'Ricardo Lopes', '212.786.318', 'ricardo.lopes1980@gmail.com', '11-99629-9641', '83', '', 'Senha@123'),
(4, 'Ricardo', '186.084.738', 'ricardo@yopmail.com', '11-99629-9641', '2', '2', '123'),
(5, 'Julio', '11111111111', 'julio@revvo.com.br', '11996299641', '222', '5', '123456'),
(6, 'Ricardo Lopes', '250.625.828', 'impacta', '1122808371', '23', '', '123456'),
(8, 'Thiago Barbosa', '55999566321', 'thiago.barbosa@yopmail.com', '11-99629-9835', '32', '1', '123456'),
(9, 'João da Silva', '55233689422', 'joao@yopmail.com', '11-99999-8888', '23', '02', '123456'),
(10, 'João da Silva', '55233689422', 'joaodasilva@yopmail.com', '11999998888', '32', '02', '222665@'),
(11, 'Victor', '00066633355', 'victor.mendes@impacta.com.br', '21-99629-9699', '1', '', '121212'),
(12, 'confirmar_senha', '', '', '', '', '', ''),
(13, 'B', 'B', 'B', 'B', 'B', 'B', 'B'),
(14, 'c', 'c', 'c', 'c', 'c', 'c', 'c'),
(15, 'Lira', '13114115115', 'lira.lira@lira.com.br', '11-996558877', '40', '', '123456'),
(20, '2', '2', '2', '2', '2', '2', '2'),
(21, 'ddd', 'd', 'd', 'd', 'd', 'd', 'd'),
(30, '3', '3', '3', '3', '3', '3', '3'),
(36, 'Joilma Silva', '2250326653', 'impacta@impacta.com.br', '11-99629-9641', '121', '', '123456'),
(38, 'Victor Mendes', '1112332322', 'victor@impacta.com.br', '1122808371', '99', '', '123456'),
(39, 'Antonio Dias', '1112332322', 'antonio@yopmail.com', '11-99629-9835', '32', '', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes`
--

CREATE TABLE `solicitacoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `setor` varchar(255) DEFAULT NULL,
  `areacomum` varchar(255) DEFAULT NULL,
  `apartamento` varchar(10) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `solicitacoes`
--

INSERT INTO `solicitacoes` (`id`, `nome`, `assunto`, `setor`, `areacomum`, `apartamento`, `descricao`) VALUES
(1, 'Ricardo Lopes', 'Limpeza', NULL, NULL, '23', NULL),
(211, 'Ricardo Lopes', 'Limpeza', NULL, NULL, '121', 'testes'),
(212, 'Ricardo Lopes', 'Limpeza', NULL, NULL, '121', 'testes'),
(213, 'Jair', 'Limpeza', '1', NULL, '121', 'testes'),
(214, 'João da Silva', 'Limpeza', '3', NULL, '32', 'testes'),
(215, 'Thiago Barbosa', 'Testes', '3', '6', '115', 'Testes'),
(216, 'Ricardo Lopes', 'Limpeza', '2', '2', '123', 'Limpeza de 03/10/2023'),
(217, 'Victor Mendes', 'Limpeza', '1', '3', '99', 'Teste de cadastro'),
(218, 'Victor Mendes', 'Limpeza', '1', '3', '99', 'Teste de cadastro'),
(219, 'Victor Mendes', 'Limpeza', '2', '2', '23', 'Testes de solicitacao'),
(220, 'Antonio Dias', 'Troca de lâmpada', '3', '3', '32', 'Testes de solicitação'),
(221, 'Ricardo Lopes', 'Teste de linha 2', '1', '2', '83', 'Testes'),
(223, 'Ricardo Lopes', 'Teste ', 'Escolha...', 'Escolha...', '83', 'Testes ALTERADO'),
(224, 'Ricardo Lopes', 'ENVIO AC03 RICARDO', '1', '4', '83', 'Testes do ENVIO PARA O VICTOR');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `condominos`
--
ALTER TABLE `condominos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `condominos`
--
ALTER TABLE `condominos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `solicitacoes`
--
ALTER TABLE `solicitacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
