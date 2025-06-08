-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 13-Dez-2019 às 07:22
-- Versão do servidor: 5.6.45
-- versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churrasc_lc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cx_saidas`
--

CREATE TABLE `cx_saidas` (
  `codigo` int(11) NOT NULL,
  `operador` varchar(50) DEFAULT NULL,
  `cel_operador` varchar(50) DEFAULT NULL,
  `email_operador` varchar(50) DEFAULT NULL,
  `estabelecimento` varchar(50) DEFAULT NULL,
  `cidade_estabelecimento` varchar(50) DEFAULT NULL,
  `tel_estabelecimento` varchar(50) DEFAULT NULL,
  `email_estabelecimento` varchar(50) DEFAULT NULL,
  `dataalteracao` varchar(50) DEFAULT NULL,
  `horaalteracao` varchar(50) DEFAULT NULL,
  `operador_alterou` varchar(50) DEFAULT NULL,
  `cel_operador_alterou` varchar(50) DEFAULT NULL,
  `email_operador_alterou` varchar(50) DEFAULT NULL,
  `estabelecimento_alterou` varchar(50) DEFAULT NULL,
  `cidade_estabelecimento_alterou` varchar(50) DEFAULT NULL,
  `tel_estabelecimento_alterou` varchar(50) DEFAULT NULL,
  `email_estabelecimento_alterou` varchar(50) DEFAULT NULL,
  `dia` varchar(50) NOT NULL,
  `mes` varchar(50) NOT NULL,
  `ano` varchar(50) NOT NULL,
  `datacadastro` varchar(50) NOT NULL,
  `horacadastro` varchar(50) NOT NULL,
  `nfantasia` varchar(50) NOT NULL,
  `historico` text NOT NULL,
  `categoria_conta` varchar(50) NOT NULL,
  `valor` varchar(50) NOT NULL,
  `codigo_orcamento` varchar(50) NOT NULL,
  `modopagto` varchar(50) NOT NULL,
  `num_cheque` varchar(50) NOT NULL,
  `banco` varchar(50) NOT NULL,
  `conta` varchar(50) DEFAULT NULL,
  `datecadastro` date NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `num_fatura` varchar(50) NOT NULL,
  `codigo_cliente` varchar(50) NOT NULL,
  `fornecedor` varchar(50) NOT NULL,
  `setor` varchar(50) NOT NULL,
  `cod_contas_a_pagar` varchar(50) NOT NULL,
  `num_mensalidade` varchar(50) NOT NULL,
  `agencia` varchar(50) NOT NULL,
  `tipoconta` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `vencto` date NOT NULL,
  `dateevento` date NOT NULL,
  `horaevento` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cx_saidas`
--

INSERT INTO `cx_saidas` (`codigo`, `operador`, `cel_operador`, `email_operador`, `estabelecimento`, `cidade_estabelecimento`, `tel_estabelecimento`, `email_estabelecimento`, `dataalteracao`, `horaalteracao`, `operador_alterou`, `cel_operador_alterou`, `email_operador_alterou`, `estabelecimento_alterou`, `cidade_estabelecimento_alterou`, `tel_estabelecimento_alterou`, `email_estabelecimento_alterou`, `dia`, `mes`, `ano`, `datacadastro`, `horacadastro`, `nfantasia`, `historico`, `categoria_conta`, `valor`, `codigo_orcamento`, `modopagto`, `num_cheque`, `banco`, `conta`, `datecadastro`, `nome`, `cpf`, `num_fatura`, `codigo_cliente`, `fornecedor`, `setor`, `cod_contas_a_pagar`, `num_mensalidade`, `agencia`, `tipoconta`, `departamento`, `vencto`, `dateevento`, `horaevento`) VALUES
(13, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15', '11', '2019', '', '14:30:51', 'CHURRASCARIALC', 'LEONARDO', 'PAGTOS A FORNECEDORES', '150.00', '', '', '', '', NULL, '2019-11-15', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(12, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15', '11', '2019', '', '14:27:44', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '1.330', '', '', '', '', NULL, '2019-11-15', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(11, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '14', '11', '2019', '', '22:31:06', 'CHURRASCARIALC', '', 'PAGTOS A FORNECEDORES', '1.540', '', '', '', '', NULL, '2019-11-14', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(10, 'Clenir Lopes de Oliveira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13', '11', '2019', '', '17:04:00', 'CHURRASCARIALC', 'CH 000133 SICOOB EMITENTE CLAUDIA PARA 04/12/2019(ARROZ PANELA DE FERRO) ', 'PAGTOS A FORNECEDORES', '760.00', '', '', '', '', NULL, '2019-11-13', '', '', '', '', 'ARROIZERA SAO PEDRO LTDA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(9, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11', '11', '2019', '', '11:51:16', 'CHURRASCARIALC', 'sangria', 'PAGTOS A FORNECEDORES', '50.00', '', '', '', '', NULL, '2019-11-11', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(14, 'Clenir Lopes de Oliveira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15', '11', '2019', '', '22:03:47', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '450.00', '', '', '', '', NULL, '2019-11-15', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(15, 'Clenir Lopes de Oliveira', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15', '11', '2019', '', '22:04:11', 'CHURRASCARIALC', 'SOBRA DO CAIXA FECHAMENTO', 'PAGTOS A FORNECEDORES', '50.00', '', '', '', '', NULL, '2019-11-15', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(16, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16', '11', '2019', '', '21:44:43', 'CHURRASCARIALC', 'RETIRADA CAIXA NOITE FECHAMENTO', 'PAGTOS A FORNECEDORES', '420.00', '', '', '', '', NULL, '2019-11-16', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(17, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16', '11', '2019', '', '21:49:38', 'CHURRASCARIALC', 'SOBRA DO CAIXA RETIRADA', 'PAGTOS A FORNECEDORES', '117.00', '', '', '', '', NULL, '2019-11-16', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(18, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17', '11', '2019', '', '16:02:24', 'CHURRASCARIALC', 'RETIRADA MANHA', 'PAGTOS A FORNECEDORES', '1.700', '', '', '', '', NULL, '2019-11-17', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(19, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '17', '11', '2019', '', '16:02:45', 'CHURRASCARIALC', 'SOBRA CAIXA MANHA', 'PAGTOS A FORNECEDORES', '204.00', '', '', '', '', NULL, '2019-11-17', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(20, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18', '11', '2019', '', '16:52:14', 'CHURRASCARIALC', 'retirada', 'PAGTOS A FORNECEDORES', '650.00', '', '', '', '', NULL, '2019-11-18', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(21, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '19', '11', '2019', '', '21:56:43', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '472.00', '', '', '', '', NULL, '2019-11-19', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(22, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20', '11', '2019', '', '22:16:06', 'CHURRASCARIALC', 'RETIRADA NOITE ', 'PAGTOS A FORNECEDORES', '537', '', '', '', '', NULL, '2019-11-20', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(23, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20', '11', '2019', '', '22:16:19', 'CHURRASCARIALC', 'SOBRA DO CAIXA', 'PAGTOS A FORNECEDORES', '34', '', '', '', '', NULL, '2019-11-20', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(24, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21', '11', '2019', '', '16:00:42', 'CHURRASCARIALC', 'RETIRADA MANHA', 'PAGTOS A FORNECEDORES', '930.00', '', '', '', '', NULL, '2019-11-21', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(25, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21', '11', '2019', '', '16:00:58', 'CHURRASCARIALC', 'SOBRA CAIXA MANHA', 'PAGTOS A FORNECEDORES', '132.00', '', '', '', '', NULL, '2019-11-21', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(26, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21', '11', '2019', '', '23:03:45', 'CHURRASCARIALC', 'retirada tarde', 'PAGTOS A FORNECEDORES', '320', '', '', '', '', NULL, '2019-11-21', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(27, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21', '11', '2019', '', '23:04:04', 'CHURRASCARIALC', 'sobra caixa noite gaby', 'PAGTOS A FORNECEDORES', '97', '', '', '', '', NULL, '2019-11-21', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(28, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', '11', '2019', '', '21:46:05', 'CHURRASCARIALC', 'retirada tarde ', 'PAGTOS A FORNECEDORES', '400', '', '', '', '', NULL, '2019-11-22', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(29, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', '11', '2019', '', '21:55:55', 'CHURRASCARIALC', 'sobra caixa', 'PAGTOS A FORNECEDORES', '115', '', '', '', '', NULL, '2019-11-22', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(30, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22', '11', '2019', '', '21:57:23', 'CHURRASCARIALC', 'retirada maine', 'PAGTOS A FORNECEDORES', '10', '', '', '', '', NULL, '2019-11-22', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(31, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '23', '11', '2019', '', '15:28:25', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '1.125', '', '', '', '', NULL, '2019-11-23', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(32, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24', '11', '2019', '', '15:24:35', 'CHURRASCARIALC', 'RETIRADA MANHA', 'PAGTOS A FORNECEDORES', '1.150', '', '', '', '', NULL, '2019-11-24', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(33, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24', '11', '2019', '', '15:25:35', 'CHURRASCARIALC', 'RETIRADA CAIXA SOBRA', 'PAGTOS A FORNECEDORES', '30.00', '', '', '', '', NULL, '2019-11-24', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(34, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24', '11', '2019', '', '19:17:07', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '1148.85', '', '', '', '', NULL, '2019-11-24', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(35, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24', '11', '2019', '', '22:11:44', 'CHURRASCARIALC', 'NOITE RETIRADA', 'PAGTOS A FORNECEDORES', '515', '', '', '', '', NULL, '2019-11-24', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(36, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24', '11', '2019', '', '22:12:04', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '14', '', '', '', '', NULL, '2019-11-24', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(37, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '26', '11', '2019', '', '15:56:21', 'CHURRASCARIALC', 'RETIRADA MANHA ', 'PAGTOS A FORNECEDORES', '699.50', '', '', '', '', NULL, '2019-11-26', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(38, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '26', '11', '2019', '', '15:56:46', 'CHURRASCARIALC', 'RETIRADA SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '87', '', '', '', '', NULL, '2019-11-26', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(39, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '27', '11', '2019', '', '15:24:58', 'CHURRASCARIALC', 'retirada manha', 'PAGTOS A FORNECEDORES', '750', '', '', '', '', NULL, '2019-11-27', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(40, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '27', '11', '2019', '', '15:34:55', 'CHURRASCARIALC', 'sobra caixa manha', 'PAGTOS A FORNECEDORES', '136', '', '', '', '', NULL, '2019-11-27', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(41, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '27', '11', '2019', '', '22:24:35', 'CHURRASCARIALC', 'RETIRADA CAIXA TARDE\r\n', 'PAGTOS A FORNECEDORES', '585', '', '', '', '', NULL, '2019-11-27', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(42, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '27', '11', '2019', '', '22:24:48', 'CHURRASCARIALC', 'SOBRA CAIXA NOITE\r\n', 'PAGTOS A FORNECEDORES', '42', '', '', '', '', NULL, '2019-11-27', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(43, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '28', '11', '2019', '', '18:28:49', 'CHURRASCARIALC', 'RETIRADA MANHA', 'PAGTOS A FORNECEDORES', '1388.50', '', '', '', '', NULL, '2019-11-28', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(44, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '28', '11', '2019', '', '18:28:59', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '20', '', '', '', '', NULL, '2019-11-28', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(45, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '28', '11', '2019', '', '22:46:40', 'CHURRASCARIALC', 'RETIRADA TARDE', 'PAGTOS A FORNECEDORES', '510', '', '', '', '', NULL, '2019-11-28', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(46, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '28', '11', '2019', '', '22:46:54', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '197', '', '', '', '', NULL, '2019-11-28', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(47, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '29', '11', '2019', '', '22:17:46', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '480.00', '', '', '', '', NULL, '2019-11-29', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(48, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30', '11', '2019', '', '22:32:50', 'CHURRASCARIALC', 'RETIRADA NOITE\r\n', 'PAGTOS A FORNECEDORES', '250', '', '', '', '', NULL, '2019-11-30', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(49, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30', '11', '2019', '', '22:37:08', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '82', '', '', '', '', NULL, '2019-11-30', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(50, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '02', '12', '2019', '', '22:23:08', 'CHURRASCARIALC', 'retirada', 'PAGTOS A FORNECEDORES', '1330.00', '', '', '', '', NULL, '2019-12-02', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(51, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '02', '12', '2019', '', '22:23:23', 'CHURRASCARIALC', '', 'PAGTOS A FORNECEDORES', '', '', '', '', '', NULL, '2019-12-02', '', '', '', '', '', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(52, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '02', '12', '2019', '', '22:24:41', 'CHURRASCARIALC', 'retirada', 'PAGTOS A FORNECEDORES', '1330.00', '', '', '', '', NULL, '2019-12-02', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(53, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03', '12', '2019', '', '14:57:50', 'CHURRASCARIALC', 'RETIRADA MANHA', 'PAGTOS A FORNECEDORES', '896', '', '', '', '', NULL, '2019-12-03', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(54, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03', '12', '2019', '', '14:58:11', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '69', '', '', '', '', NULL, '2019-12-03', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(55, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03', '12', '2019', '', '22:23:28', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '700', '', '', '', '', NULL, '2019-12-03', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(56, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03', '12', '2019', '', '22:23:44', 'CHURRASCARIALC', 'SOBRA CAIXA\r\n', 'PAGTOS A FORNECEDORES', '100.00', '', '', '', '', NULL, '2019-12-03', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(57, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '04', '12', '2019', '', '14:39:03', 'CHURRASCARIALC', 'RETIRADA MANHA\r\n', 'PAGTOS A FORNECEDORES', '1000', '', '', '', '', NULL, '2019-12-04', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(58, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '04', '12', '2019', '', '14:39:45', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '64', '', '', '', '', NULL, '2019-12-04', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(59, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '04', '12', '2019', '', '22:32:57', 'CHURRASCARIALC', 'retirada NOITE', 'PAGTOS A FORNECEDORES', '550', '', '', '', '', NULL, '2019-12-04', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(60, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '04', '12', '2019', '', '22:33:15', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '277', '', '', '', '', NULL, '2019-12-04', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(61, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '05', '12', '2019', '', '15:34:14', 'CHURRASCARIALC', 'restirada manhã', 'PAGTOS A FORNECEDORES', '600', '', '', '', '', NULL, '2019-12-05', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(62, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '05', '12', '2019', '', '15:37:01', 'CHURRASCARIALC', 'sobra do caixa.', 'PAGTOS A FORNECEDORES', '12.00', '', '', '', '', NULL, '2019-12-05', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(63, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '05', '12', '2019', '', '23:14:28', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '680', '', '', '', '', NULL, '2019-12-05', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(64, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '05', '12', '2019', '', '23:14:39', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '124', '', '', '', '', NULL, '2019-12-05', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(65, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '06', '12', '2019', '', '14:39:16', 'CHURRASCARIALC', '', 'PAGTOS A FORNECEDORES', '748', '', '', '', '', NULL, '2019-12-06', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(66, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '06', '12', '2019', '', '14:39:50', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '130', '', '', '', '', NULL, '2019-12-06', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(67, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '06', '12', '2019', '', '22:24:40', 'CHURRASCARIALC', 'RETIRADA NOITE\r\n', 'PAGTOS A FORNECEDORES', '544', '', '', '', '', NULL, '2019-12-06', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(68, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '06', '12', '2019', '', '22:24:53', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '142', '', '', '', '', NULL, '2019-12-06', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(69, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '06', '12', '2019', '', '22:33:58', 'CHURRASCARIALC', 'SOBRA', 'PAGTOS A FORNECEDORES', '27', '', '', '', '', NULL, '2019-12-06', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(70, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '07', '12', '2019', '', '14:53:31', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '1.050', '', '', '', '', NULL, '2019-12-07', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(71, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '07', '12', '2019', '', '22:33:07', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '328', '', '', '', '', NULL, '2019-12-07', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(72, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '07', '12', '2019', '', '22:33:21', 'CHURRASCARIALC', 'RETIRADA NOITE', 'PAGTOS A FORNECEDORES', '250', '', '', '', '', NULL, '2019-12-07', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(73, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08', '12', '2019', '', '14:53:14', 'CHURRASCARIALC', 'RETIRADA MANHA', 'PAGTOS A FORNECEDORES', '1700.00', '', '', '', '', NULL, '2019-12-08', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(74, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08', '12', '2019', '', '14:53:46', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '75', '', '', '', '', NULL, '2019-12-08', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(75, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08', '12', '2019', '', '22:16:01', 'CHURRASCARIALC', 'RETIRADA NOITE', 'PAGTOS A FORNECEDORES', '452.50', '', '', '', '', NULL, '2019-12-08', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(76, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08', '12', '2019', '', '22:16:20', 'CHURRASCARIALC', 'SOBRA CAIXA G', 'PAGTOS A FORNECEDORES', '276', '', '', '', '', NULL, '2019-12-08', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(77, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09', '12', '2019', '', '22:32:02', 'CHURRASCARIALC', '', 'PAGTOS A FORNECEDORES', '700', '', '', '', '', NULL, '2019-12-09', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(78, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '09', '12', '2019', '', '22:32:15', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '', '', '', '', '', NULL, '2019-12-09', '', '', '', '', '', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(79, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', '12', '2019', '', '14:45:25', 'CHURRASCARIALC', '', 'PAGTOS A FORNECEDORES', '1.146', '', '', '', '', NULL, '2019-12-10', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(80, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', '12', '2019', '', '14:45:35', 'CHURRASCARIALC', '', 'PAGTOS A FORNECEDORES', '', '', '', '', '', NULL, '2019-12-10', '', '', '', '', '', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(81, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', '12', '2019', '', '22:07:08', 'CHURRASCARIALC', '', 'PAGTOS A FORNECEDORES', '550', '', '', '', '', NULL, '2019-12-10', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(82, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10', '12', '2019', '', '22:07:24', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '75', '', '', '', '', NULL, '2019-12-10', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(83, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11', '12', '2019', '', '14:26:40', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '492', '', '', '', '', NULL, '2019-12-11', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(84, 'Claudia Chaves Vieirra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11', '12', '2019', '', '14:27:05', 'CHURRASCARIALC', 'SOBRA CAIXA MANHA', 'PAGTOS A FORNECEDORES', '27', '', '', '', '', NULL, '2019-12-11', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(85, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11', '12', '2019', '', '22:41:56', 'CHURRASCARIALC', 'RETIRADA', 'PAGTOS A FORNECEDORES', '600', '', '', '', '', NULL, '2019-12-11', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(86, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11', '12', '2019', '', '22:46:05', 'CHURRASCARIALC', '', 'PAGTOS A FORNECEDORES', '179', '', '', '', '', NULL, '2019-12-11', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(87, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', '12', '2019', '', '22:26:57', 'CHURRASCARIALC', 'retirada', 'PAGTOS A FORNECEDORES', '394', '', '', '', '', NULL, '2019-12-12', '', '', '', '', 'SANGRIA', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', ''),
(88, 'Gabriela Macedo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', '12', '2019', '', '22:29:58', 'CHURRASCARIALC', 'SOBRA CAIXA', 'PAGTOS A FORNECEDORES', '438', '', '', '', '', NULL, '2019-12-12', '', '', '', '', 'LEONARDO', '', '', '', '', '', 'CHURRASCARIALC', '0000-00-00', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cx_saidas`
--
ALTER TABLE `cx_saidas`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cx_saidas`
--
ALTER TABLE `cx_saidas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
