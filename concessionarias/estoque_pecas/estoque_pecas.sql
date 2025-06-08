-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23-Jul-2020 às 13:00
-- Versão do servidor: 5.6.47
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `churrasc_lc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `estoque_pecas` (
  `referencia` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `material` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `cor` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `categoria` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `sub_categoria` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `preco` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `oferta` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `preco_oferta` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `data` date DEFAULT NULL,
  `codigo` int(11) NOT NULL,
  `foto2` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `foto3` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `foto4` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `cod_barras` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `quant_estoque` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `expedicao` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `quant_disponivel` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `quant_minima` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `aparecer_site` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `preco_compra` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `frete` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `margem_lucro` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `impostos` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `margem_lucro_informada` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `impostos_informado` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `nome_produto` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `fornecedor` varchar(50) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  `travesseiro1` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `travesseiro2` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `hora` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `margem_folga` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `margem_folga_decimal` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `descontomaximo` int(50) NOT NULL,
  `impostos_compra` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `impostos_compra_decimal` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `preco_sugerido` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `classe` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `departamento` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `operador` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `datacadastro` date NOT NULL,
  `horacadastro` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL,
  `estab_pertence` varchar(50) COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `estoque_pecas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `ordem_desc` (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `estoque_pecas`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
