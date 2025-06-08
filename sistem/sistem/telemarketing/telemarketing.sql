-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mar 28, 2011 as 03:52 PM
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
-- Estrutura da tabela `telemarketing`
--

CREATE TABLE IF NOT EXISTS `telemarketing` (
  `codigo` int(11) NOT NULL auto_increment,
  `dia_abertura` varchar(50) NOT NULL,
  `mes_abertura` varchar(50) NOT NULL,
  `ano_abertura` varchar(50) NOT NULL,
  `hora_abertura` varchar(50) NOT NULL,
  `hora_fechamento` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `operador` varchar(50) NOT NULL,
  `estab_pertence` varchar(50) NOT NULL,
  `cidade_estab_pertence` varchar(50) NOT NULL,
  `cod_cliente` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `dia_ligar` varchar(50) default NULL,
  `mes_ligar` varchar(50) default NULL,
  `ano_ligar` varchar(50) default NULL,
  `hora_ligar` varchar(50) default NULL,
  `dias_atraso` varchar(50) NOT NULL,
  `dia_liberado` varchar(50) NOT NULL,
  `mes_liberado` varchar(50) NOT NULL,
  `ano_liberado` varchar(50) NOT NULL,
  `hora_liberado` varchar(50) NOT NULL,
  `proposta` varchar(50) NOT NULL,
  `dia_fechamento` varchar(50) NOT NULL,
  `mes_fechamento` varchar(50) NOT NULL,
  `ano_fechamento` varchar(50) NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=447 ;
