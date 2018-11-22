-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Nov-2018 às 21:50
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
-- Database: `planta`
--
CREATE DATABASE IF NOT EXISTS `planta` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `planta`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `medias_diarias` ()  NO SQL
select max(`planta`.`registro`.`temperatura`) AS `temp_max`,min(`planta`.`registro`.`temperatura`) AS `temp_min`,avg(`planta`.`registro`.`temperatura`) AS `temp_avg` from `planta`.`registro` where (date_format(`planta`.`registro`.`data`,'%Y-%m-%d') = curdate())$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `plantas`
--

CREATE TABLE IF NOT EXISTS `plantas` (
  `id_planta` int(11) NOT NULL AUTO_INCREMENT,
  `nome_planta` text NOT NULL,
  `nome_cientifico` text NOT NULL,
  `umidade` int(11) NOT NULL,
  `temperatura` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_planta`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `plantas`
--

INSERT INTO `plantas` (`id_planta`, `nome_planta`, `nome_cientifico`, `umidade`, `temperatura`, `id_usuario`) VALUES
(1, 'Morango', 'Fragaria', 40, 25, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rega`
--

CREATE TABLE IF NOT EXISTS `rega` (
  `id_rega` int(11) NOT NULL AUTO_INCREMENT,
  `id_registro` int(11) NOT NULL,
  PRIMARY KEY (`id_rega`),
  KEY `id_registro` (`id_registro`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rega`
--

INSERT INTO `rega` (`id_rega`, `id_registro`) VALUES
(1, 1),
(2, 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `rega_registro`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `rega_registro` (
`x` date
,`y` int(2)
,`id_usuario` int(11)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `temperatura` int(11) NOT NULL,
  `umidade` int(11) NOT NULL,
  `id_planta` int(11) NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `registro_planta` (`id_planta`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`id_registro`, `data`, `temperatura`, `umidade`, `id_planta`) VALUES
(1, '2018-11-21 10:00:00', 15, 26, 1),
(2, '2018-11-22 18:41:24', 20, 30, 1),
(3, '2018-11-23 16:00:00', 24, 20, 1),
(4, '2018-11-24 14:00:00', 25, 15, 1),
(5, '2018-11-25 16:00:00', 19, 15, 1),
(6, '2018-11-26 14:00:00', 30, 15, 1);

--
-- Acionadores `registro`
--
DELIMITER $$
CREATE TRIGGER `registro_rega` AFTER INSERT ON `registro` FOR EACH ROW BEGIN
if new.umidade < ((select umidade from plantas where id_planta = new.id_planta)*0.8) and new.temperatura < ((select temperatura from plantas where id_planta = new.id_planta)*0.8) THEN
INSERT INTO rega SET
id_registro = new.id_registro;
end if;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` text NOT NULL,
  `login_usuario` text NOT NULL,
  `email` text NOT NULL,
  `endereco` text NOT NULL,
  `senha` text NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `email`, `endereco`, `senha`) VALUES
(1, 'Fabiano Alves', 'Mithrarin', 'fabiano@wetter.com', ' Av. Bahia, 1739 - Indaiá, Caraguatatuba - SP', '756cfc1cf9f7f9936d39118b3327579ce63318b9');

-- --------------------------------------------------------

--
-- Structure for view `rega_registro`
--
DROP TABLE IF EXISTS `rega_registro`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rega_registro`  AS  select cast(`registro`.`data` as date) AS `x`,hour(`registro`.`data`) AS `y`,`plantas`.`id_usuario` AS `id_usuario` from ((`registro` join `rega`) join `plantas`) where ((`rega`.`id_registro` = `registro`.`id_registro`) and (`plantas`.`id_usuario` = `plantas`.`id_usuario`)) ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `plantas`
--
ALTER TABLE `plantas`
  ADD CONSTRAINT `plantas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `rega`
--
ALTER TABLE `rega`
  ADD CONSTRAINT `id_registro` FOREIGN KEY (`id_registro`) REFERENCES `registro` (`id_registro`);

--
-- Limitadores para a tabela `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_planta` FOREIGN KEY (`id_planta`) REFERENCES `plantas` (`id_planta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
