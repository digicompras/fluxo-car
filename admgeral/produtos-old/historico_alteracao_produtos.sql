-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 12, 2010 as 03:52 PM
-- Versão do Servidor: 5.0.90
-- Versão do PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `brass_loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `historico_alteracao_produtos` (
  `codigo` int(11) NOT NULL auto_increment,
  `tipo_proposta` varchar(50) NOT NULL,
  `bco_operacao` varchar(50) NOT NULL,
  `faixa` varchar(50) NOT NULL,
  `com_bruta` varchar(50) NOT NULL,
  `a` varchar(50) NOT NULL,
  `b` varchar(50) NOT NULL,
  `c` varchar(50) NOT NULL,
  `data_inicial` varchar(50) NOT NULL,
  `data_final` varchar(50) default NULL,
  `operador` varchar(50) NOT NULL,
  `cel_operador` varchar(50) NOT NULL,
  `email_operador` varchar(50) NOT NULL,
  `estabelecimento` varchar(50) NOT NULL,
  `cidade_estabelecimento` varchar(50) NOT NULL,
  `tel_estabelecimento` varchar(50) NOT NULL,
  `email_estabelecimento` varchar(50) NOT NULL,
  `datacadastro` varchar(50) NOT NULL,
  `horacadastro` varchar(50) NOT NULL,
  `operador_alterou` varchar(50) default NULL,
  `cel_operador_alterou` varchar(50) default NULL,
  `email_operador_alterou` varchar(50) default NULL,
  `estabelecimento_alterou` varchar(50) default NULL,
  `cidade_estabelecimento_alterou` varchar(50) default NULL,
  `tel_estabelecimento_alterou` varchar(50) default NULL,
  `email_estabelecimento_alterou` varchar(50) default NULL,
  `dataalteracao` varchar(50) NOT NULL,
  `horaalteracao` varchar(50) NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `produtos`
--

