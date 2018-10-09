-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Out-2018 às 00:37
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plantas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `planta`
--

CREATE TABLE `planta` (
  `id_planta` int(11) NOT NULL,
  `nome_planta` text NOT NULL,
  `descricao` text NOT NULL,
  `umidade` int(11) NOT NULL,
  `temperatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `planta`
--

INSERT INTO `planta` (`id_planta`, `nome_planta`, `descricao`, `umidade`, `temperatura`) VALUES
(1, 'Alface', 'sei la', 22, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rega`
--

CREATE TABLE `rega` (
  `id_rega` int(11) NOT NULL,
  `data_rega` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `umidade` int(11) NOT NULL,
  `temperatura` int(11) NOT NULL,
  `data_registro` datetime NOT NULL,
  `id_planta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`id_registro`, `umidade`, `temperatura`, `data_registro`, `id_planta`) VALUES
(1, 25, 32, '2018-10-02 00:00:00', 1),
(2, 22, 32, '2018-10-02 19:29:35', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `planta`
--
ALTER TABLE `planta`
  ADD PRIMARY KEY (`id_planta`);

--
-- Indexes for table `rega`
--
ALTER TABLE `rega`
  ADD PRIMARY KEY (`id_rega`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_planta` (`id_planta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `planta`
--
ALTER TABLE `planta`
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rega`
--
ALTER TABLE `rega`
  MODIFY `id_rega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `id_planta` FOREIGN KEY (`id_planta`) REFERENCES `planta` (`id_planta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
