-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mar 28, 2011 as 03:53 PM
-- Versão do Servidor: 5.0.91
-- Versão do PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `investti_loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `obs_telemarketing`
--

CREATE TABLE IF NOT EXISTS `obs_telemarketing` (
  `codigo` int(11) NOT NULL auto_increment,
  `cod_cliente` varchar(50) NOT NULL,
  `dia` varchar(50) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `ano` varchar(50) NOT NULL,
  `hora` varchar(50) NOT NULL,
  `operador` varchar(50) NOT NULL,
  `estab_pertence` varchar(50) NOT NULL,
  `cidade_estab_pertence` varchar(50) NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=410 ;
