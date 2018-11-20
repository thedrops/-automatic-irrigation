-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 20-Nov-2018 às 21:41
-- Versão do servidor: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planta`
--

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

CREATE TABLE `plantas` (
  `id_planta` int(11) NOT NULL,
  `nome_planta` text NOT NULL,
  `nome_cientifico` text NOT NULL,
  `umidade` int(11) NOT NULL,
  `temperatura` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `plantas`
--

INSERT INTO `plantas` (`id_planta`, `nome_planta`, `nome_cientifico`, `umidade`, `temperatura`, `id_usuario`) VALUES
(2, 'Alçafrão', 'Curcuma longa', 52, 35, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rega`
--

CREATE TABLE `rega` (
  `id_rega` int(11) NOT NULL,
  `id_registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rega`
--

INSERT INTO `rega` (`id_rega`, `id_registro`) VALUES
(12, 28),
(13, 29);

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
-- Estrutura da tabela `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `temperatura` int(11) NOT NULL,
  `umidade` int(11) NOT NULL,
  `id_planta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`id_registro`, `data`, `temperatura`, `umidade`, `id_planta`) VALUES
(28, '2018-11-19 03:00:00', 55, 10, 2),
(29, '2018-11-19 05:00:00', 67, 2, 2);

--
-- Acionadores `registro`
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
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` text NOT NULL,
  `login_usuario` text NOT NULL,
  `email` text NOT NULL,
  `endereco` text NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login_usuario`, `email`, `endereco`, `senha`) VALUES
(3, 'Pedro', 'pedro', 'pedro@teste.com', 'rua josé', 'adcd7048512e64b48da55b027577886ee5a36350'),
(6, 'Pedro', 'joao', 'joao@gmail.com', 'sfasbflaksfjlakj', 'adcd7048512e64b48da55b027577886ee5a36350');

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
  ADD PRIMARY KEY (`id_planta`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rega`
--
ALTER TABLE `rega`
  MODIFY `id_rega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
