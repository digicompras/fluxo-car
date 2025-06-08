-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 26, 2010 as 10:31 AM
-- Versão do Servidor: 5.0.90
-- Versão do PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `dc_demo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `hora_encerramento`
--

CREATE TABLE IF NOT EXISTS `hora_encerramento` (
  `codigo` int(11) NOT NULL,
  `horas` varchar(2) NOT NULL,
  `minutos` varchar(2) NOT NULL,
  `segundos` varchar(2) NOT NULL,
  PRIMARY KEY  (`codigo`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `hora_encerramento`
--

INSERT INTO `hora_encerramento` (`codigo`, `horas`, `minutos`, `segundos`) VALUES
(0, '18', '00', '00');
