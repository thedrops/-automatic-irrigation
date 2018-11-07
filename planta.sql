-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2018 at 11:41 PM
-- Server version: 10.1.34-MariaDB
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
-- Database: `planta`
--
CREATE DATABASE IF NOT EXISTS `planta` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `planta`;

-- --------------------------------------------------------

--
-- Table structure for table `plantas`
--

CREATE TABLE `plantas` (
  `id_planta` int(11) NOT NULL,
  `nome_planta` text NOT NULL,
  `nome_cientifico` text NOT NULL,
  `umidade` int(11) NOT NULL,
  `temperatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plantas`
--

INSERT INTO `plantas` (`id_planta`, `nome_planta`, `nome_cientifico`, `umidade`, `temperatura`) VALUES
(1, 'Alface', 'Lactuca sativa', 50, 25);

-- --------------------------------------------------------

--
-- Table structure for table `rega`
--

CREATE TABLE `rega` (
  `id_rega` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rega`
--

INSERT INTO `rega` (`id_rega`, `id_registro`) VALUES
(3, 15);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rega_registro`
-- (See below for the actual view)
--
CREATE TABLE `rega_registro` (
`x` date
,`y` int(2)
);

-- --------------------------------------------------------

--
-- Table structure for table `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `temperatura` int(11) NOT NULL,
  `umidade` int(11) NOT NULL,
  `id_planta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registro`
--

INSERT INTO `registro` (`id_registro`, `data`, `temperatura`, `umidade`, `id_planta`) VALUES
(7, '2018-11-16 07:00:00', 25, 152, 1),
(8, '2018-11-16 07:00:00', 25, 152, 1),
(15, '2018-11-22 00:00:00', 25, 10, 1),
(16, '2018-11-16 04:00:00', 25, 51, 1);

--
-- Triggers `registro`
--
DELIMITER $$
CREATE TRIGGER `registro_rega` AFTER INSERT ON `registro` FOR EACH ROW BEGIN
if new.umidade < (select umidade from plantas where id_planta = new.id_planta) THEN
INSERT INTO rega SET
id_registro = new.id_registro;
end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` text NOT NULL,
  `login_usuario` text NOT NULL,
  `email` text NOT NULL,
  `endereco` text NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure for view `rega_registro`
--
DROP TABLE IF EXISTS `rega_registro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rega_registro`  AS  select cast(`registro`.`data` as date) AS `x`,hour(`registro`.`data`) AS `y` from (`registro` join `rega`) where (`rega`.`id_registro` = `registro`.`id_registro`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plantas`
--
ALTER TABLE `plantas`
  ADD PRIMARY KEY (`id_planta`);

--
-- Indexes for table `rega`
--
ALTER TABLE `rega`
  ADD PRIMARY KEY (`id_rega`),
  ADD KEY `id_registro` (`id_registro`);

--
-- Indexes for table `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `registro_planta` (`id_planta`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plantas`
--
ALTER TABLE `plantas`
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rega`
--
ALTER TABLE `rega`
  MODIFY `id_rega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rega`
--
ALTER TABLE `rega`
  ADD CONSTRAINT `id_registro` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id_registro`);

--
-- Constraints for table `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_planta` FOREIGN KEY (`id_planta`) REFERENCES `plantas` (`id_planta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
