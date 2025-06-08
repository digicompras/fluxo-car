-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jan 28, 2010 as 09:28 AM
-- Versão do Servidor: 5.0.87
-- Versão do PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bancred_loja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `propostas_veiculos`
--

CREATE TABLE IF NOT EXISTS `propostas_veiculos` (
  `num_proposta` int(11) NOT NULL auto_increment,
  `dataproposta` varchar(50) NOT NULL,
  `horaproposta` varchar(50) NOT NULL,
  `mes_ano` varchar(50) NOT NULL,
  `estabelecimento_proposta` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `tipo_proposta` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo_pessoa` varchar(50) NOT NULL,
  `data_nasc` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `rg` varchar(50) NOT NULL,
  `orgao` varchar(50) NOT NULL,
  `emissao` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `estadocivil` varchar(50) NOT NULL,
  `nacionalidade` varchar(50) NOT NULL,
  `quant_dependente` varchar(50) NOT NULL,
  `pai` varchar(50) NOT NULL,
  `mae` varchar(50) NOT NULL,
  `conjuge` varchar(50) NOT NULL,
  `data_nasc_conjuge` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cep` varchar(50) NOT NULL,
  `correspondencia` varchar(50) NOT NULL,
  `tipo_residencia` varchar(50) NOT NULL,
  `valor_aluguel` varchar(50) NOT NULL,
  `tempo_residencia` varchar(50) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `tipo_telefone` varchar(50) NOT NULL,
  `residencia_anterior` varchar(50) NOT NULL,
  `bairro_anterior` varchar(50) NOT NULL,
  `cidade_anterior` varchar(50) NOT NULL,
  `estado_anterior` varchar(50) NOT NULL,
  `tempo_residencia_anterior` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `porte_empresa` varchar(50) NOT NULL,
  `data_admissao` varchar(50) NOT NULL,
  `inicio_atividade` varchar(50) NOT NULL,
  `end_empresa` varchar(50) NOT NULL,
  `numero_empresa` varchar(50) NOT NULL,
  `complemento_empresa` varchar(50) NOT NULL,
  `bairro_empresa` varchar(50) NOT NULL,
  `cep_empresa` varchar(50) NOT NULL,
  `cidade_empresa` varchar(50) NOT NULL,
  `estado_empresa` varchar(50) NOT NULL,
  `telefone_empresa` varchar(50) NOT NULL,
  `cpt` varchar(50) NOT NULL,
  `serie` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `natureza_operacao` varchar(50) NOT NULL,
  `salario` varchar(50) NOT NULL,
  `atividade_principal` varchar(50) NOT NULL,
  `data_constituicao` varchar(50) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `inscr_est` varchar(50) NOT NULL,
  `capital_social` varchar(50) NOT NULL,
  `atividade_anterior` varchar(50) NOT NULL,
  `data_admissao_anterior` varchar(50) NOT NULL,
  `data_saida` varchar(50) NOT NULL,
  `cargo_anterior` varchar(50) NOT NULL,
  `telefone_empresa_anterior` varchar(50) NOT NULL,
  `outras_rendas` varchar(50) NOT NULL,
  `ref_pessoal` varchar(50) NOT NULL,
  `tel_ref_pessoal` varchar(50) NOT NULL,
  `ref_comercial` varchar(50) NOT NULL,
  `tel_ref_comercial` varchar(50) NOT NULL,
  `ref_banco` varchar(50) NOT NULL,
  `ref_agencia` varchar(50) NOT NULL,
  `ref_conta` varchar(50) NOT NULL,
  `ref_tipo_conta` varchar(50) NOT NULL,
  `ref_conta_desde` varchar(50) NOT NULL,
  `cartao_credito` varchar(50) NOT NULL,
  `automovel` varchar(50) NOT NULL,
  `valor_automovel` varchar(50) NOT NULL,
  `residencia` varchar(50) NOT NULL,
  `valor_residencia` varchar(50) NOT NULL,
  `outras_propriedades` varchar(50) NOT NULL,
  `valor_outras_propriedades` varchar(50) NOT NULL,
  `veiculo` varchar(50) NOT NULL,
  `ano_modelo` varchar(50) NOT NULL,
  `renavam` varchar(50) NOT NULL,
  `num_portas` varchar(50) NOT NULL,
  `combustivel` varchar(50) NOT NULL,
  `placa` varchar(50) NOT NULL,
  `valor_venda` varchar(50) NOT NULL,
  `valor_entrada` varchar(50) NOT NULL,
  `tarifa_cadastro` varchar(50) NOT NULL,
  `valor_financiar` varchar(50) NOT NULL,
  `coeficiente` varchar(50) NOT NULL,
  `codigo_tabela` varchar(50) NOT NULL,
  `num_parcelas` varchar(50) NOT NULL,
  `valor_parcelas` varchar(50) NOT NULL,
  `vencto_1_parcela` varchar(50) NOT NULL,
  `r` varchar(50) NOT NULL,
  `valor_liberado` varchar(50) NOT NULL,
  `pagto_serv_terc` varchar(50) NOT NULL,
  `obs` text NOT NULL,
  `operador` varchar(50) NOT NULL,
  `cel_operador` varchar(50) NOT NULL,
  `email_operador` varchar(50) NOT NULL,
  `estab_pertence` varchar(50) NOT NULL,
  `cidade_estab_pertence` varchar(50) NOT NULL,
  `tel_estab_pertence` varchar(50) NOT NULL,
  `email_estab_pertence` varchar(50) NOT NULL,
  `operador_alterou` varchar(50) NOT NULL,
  `cel_operador_alterou` varchar(50) NOT NULL,
  `email_operador_alterou` varchar(50) NOT NULL,
  `estab_alterou` varchar(50) NOT NULL,
  `cidade_estab_alterou` varchar(50) NOT NULL,
  `tel_estab_alterou` varchar(50) NOT NULL,
  `email_estab_alterou` varchar(50) NOT NULL,
  `dataalteracao` varchar(50) NOT NULL,
  `horaalteracao` varchar(50) NOT NULL,
  PRIMARY KEY  (`num_proposta`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=500 ;

--
-- Extraindo dados da tabela `propostas_veiculos`
--

