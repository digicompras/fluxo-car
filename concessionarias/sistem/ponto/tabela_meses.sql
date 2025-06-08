-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08-Ago-2014 às 05:38
-- Versão do servidor: 5.1.73-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `estilopesponto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_meses`
--

CREATE TABLE IF NOT EXISTS `tabela_meses` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `num_mes` varchar(50) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `dias` varchar(50) NOT NULL,
  `dias_trabalhados` varchar(50) NOT NULL,
  `dsr` varchar(50) NOT NULL,
  `mes_comercial` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `tabela_meses`
--

INSERT INTO `tabela_meses` (`codigo`, `num_mes`, `mes`, `dias`, `dias_trabalhados`, `dsr`, `mes_comercial`) VALUES
(1, '01', 'JANEIRO', '31', '27', '4', '30'),
(2, '02', 'FEVEREIRO', '28', '24', '4', '30'),
(3, '03', 'MARÇO', '30', '25', '5', '30'),
(4, '04', 'ABRIL', '30', '26', '4', '30'),
(5, '05', 'MAIO', '31', '27', '4', '30'),
(6, '06', 'JUNHO', '30', '25', '5', '30'),
(7, '07', 'JULHO', '31', '27', '4', '30'),
(8, '08', 'AGOSTO', '31', '26', '5', '30'),
(9, '09', 'SETEMBRO', '30', '26', '4', '30'),
(10, '10', 'OUTUBRO', '31', '27', '4', '30'),
(11, '11', 'NOVEMBRO', '30', '25', '5', '30'),
(12, '12', 'DEZEMBRO', '31', '27', '4', '30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
