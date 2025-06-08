CREATE TABLE IF NOT EXISTS `historico_fisico` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `num_proposta` int(11) DEFAULT NULL,
  `obs_fisico` text,
  `data` varchar(11) DEFAULT NULL,
  `dia` varchar(11) DEFAULT NULL,
  `mes` varchar(11) DEFAULT NULL,
  `ano` varchar(11) DEFAULT NULL,
  `hora` varchar(11) DEFAULT NULL,
  `operador_informante` varchar(11) DEFAULT NULL,
  `estabelecimento` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;