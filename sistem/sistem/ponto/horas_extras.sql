-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 08-Ago-2014 às 05:18
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
-- Estrutura da tabela `horas_extras`
--

CREATE TABLE IF NOT EXISTS `horas_extras` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `dia` varchar(50) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `ano` varchar(50) NOT NULL,
  `hora_inicio` varchar(50) NOT NULL,
  `hora_termino` varchar(50) NOT NULL,
  `hi` varchar(50) NOT NULL,
  `mi` varchar(50) NOT NULL,
  `si` varchar(50) NOT NULL,
  `ht` varchar(50) NOT NULL,
  `mt` varchar(50) NOT NULL,
  `st` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `quant_horas_reais` varchar(50) NOT NULL,
  `quant_horas` varchar(50) NOT NULL,
  `valor_hora_normal` varchar(50) NOT NULL,
  `acrescimo` varchar(50) NOT NULL,
  `valor_hora_extra` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `data_pagto` varchar(50) NOT NULL,
  `dia_pagto` varchar(50) NOT NULL,
  `mes_pagto` varchar(50) NOT NULL,
  `ano_pagto` varchar(50) NOT NULL,
  `hora_pagto` varchar(50) NOT NULL,
  `salario` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2480 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
