-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Nov-2019 às 11:51
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resgatocao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `nome_animal` varchar(80) NOT NULL,
  `tipo_animal` int(80) NOT NULL,
  `caracteristicas` varchar(235) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome_usuario` varchar(80) NOT NULL,
  `nome_completo` varchar(80) NOT NULL,
  `telefone` int(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome_usuario`, `nome_completo`, `telefone`, `email`, `endereco`, `senha`, `id`) VALUES
('Anaaaaa', 'Ana Clara Valentim', 90907654, 'anaclara.valentim2018@gmail.com', 'Joinville', '04381e8e7786c3b764d1f1c1f1639ee571a0d435', 0),
('Leooooo', 'Leonardo Soriani', 90764327, 'leosori@gmail.com', 'São Paulo', '90909hdhdh', 1),
('Erissonnnnn', 'Erisson Campos', 90541289, 'erieri@gmail.com', 'Joinville', '098745', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
