<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Executando m&eacute;todos...</title>
    </head>
    <body>
	<?php
	unset ($retorno);
	switch ($_POST['metodo']) {

		#Funções para DarumaFramework
		case 'eDefinirProduto_DarumaFramework' : {
		$produto = $_POST['eDefinirProduto_DarumaFrameworkProduto'];
		$retorno = eDefinirProduto_Daruma($produto);
	    }; break;
		
		
		case 'regRetornaValorChave_DarumaFramework' : {
		$produto = $_POST['regRetornaValorChave_DarumaFrameworkProduto'];
		$chave = $_POST['regRetornaValorChave_DarumaFrameworkChave'];
		$retorno = regRetornaValorChave_DarumaFramework($produto, $chave, $valor);
		$_GET['regRetornaValorChave_DarumaFrameworkValor'] = $valor;
		}; break;
		
	
	    #Funções registro DUAL
	    case 'regAguardarProcesso_DUAL_DarumaFramework': {
		$param   =  $_POST['regAguardarProcesso_DUAL_DarumaFrameworkParam'];
		$retorno =  regAguardarProcesso_DUAL_DarumaFramework($param);
	    }; break;
	   
	   
	    case 'regCodePageAutomatico_DUAL_DarumaFramework': {
		$param   =  $_POST['regCodePageAutomatico_DUAL_DarumaFrameworkParam'];
		$retorno = regCodePageAutomatico_DUAL_DarumaFramework($param);
	    }; break;

		
	    case 'regEnterFinal_DUAL_DarumaFramework': {
		$param   =  $_POST['regEnterFinal_DUAL_DarumaFrameworkParam'];
		$retorno = regEnterFinal_DUAL_DarumaFramework($param);
	    }; break;

		
	    case 'regInicializou_DUAL_DarumaFramework': {
		$param   =  $_POST['regInicializou_DUAL_DarumaFrameworkParam'];
		$retorno = regInicializou_DUAL_DarumaFramework($param);
	    }; break;

		
	    case 'regLinhasGuilhotina_DUAL_DarumaFramework': {
		$param   =  $_POST['regLinhasGuilhotina_DUAL_DarumaFrameworkParam'];
		$retorno = regLinhasGuilhotina_DUAL_DarumaFramework($param);
	    }; break;

		
	    case 'regModoGaveta_DUAL_DarumaFramework': {
		$param   =  $_POST['regModoGaveta_DUAL_DarumaFrameworkParam'];
		$retorno = regModoGaveta_DUAL_DarumaFramework($param);
	    }; break;

		
	    case 'regPortaComunicacao_DUAL_DarumaFramework': {
		$param   =  $_POST['regPortaComunicacao_DUAL_DarumaFrameworkParam'];
		$retorno = regPortaComunicacao_DUAL_DarumaFramework($param);
	    }; break;

		
	    case 'regTabulacao_DUAL_DarumaFramework': {
		$param   =  $_POST['regTabulacao_DUAL_DarumaFrameworkParam'];
		$retorno = regTabulacao_DUAL_DarumaFramework($param);
	    }; break;

		
	    case 'regTermica_DUAL_DarumaFramework': {
		$param   =  $_POST['regTermica_DUAL_DarumaFrameworkParam'];
		$retorno = regTermica_DUAL_DarumaFramework($param);
	    }; break;

		
	    case 'regVelocidade_DUAL_DarumaFramework': {
		$param   =  $_POST['regVelocidade_DUAL_DarumaFrameworkParam'];
		$retorno = regVelocidade_DUAL_DarumaFramework($param);
	    }; break;

		
		case ' regZeroCortado_DUAL_DarumaFramework': {
		$param   =  $_POST['regZeroCortado_DUAL_DarumaFrameworkParam'];
		$retorno = regZeroCortado_DUAL_DarumaFramework($param);
	    }; break;
		
		
	    case 'rStatusDocumento_DUAL_DarumaFramework': {
		$retorno = rStatusDocumento_DUAL_DarumaFramework();
	    }; break;

		
	    case 'rStatusGaveta_DUAL_DarumaFramework' : {
		$retorno =  rStatusGaveta_DUAL_DarumaFramework($gavetaStatus);
		$retorno .= "\\nStatus gaveta: " . $gavetaStatus;		
	    }; break;

		
	    case 'rStatusImpressora_DUAL_DarumaFramework' : {
		$retorno = rStatusImpressora_DUAL_DarumaFramework();
	    }; break;
		
		
		case 'TESTELOOPINGSTATUS': {
			for ($numero=1; $numero<=15; $numero++)
				{
				$retorno = rStatusImpressora_DUAL_DarumaFramework();
				echo "Retorno Teste:" . $retorno .  "/";
				}
		}; break;
		
		
		case 'TESTELOOPINGSTATUSDOCUMENTO': {
			for ($numero=1; $numero<=15; $numero++)
				{
				$retorno = rStatusDocumento_DUAL_DarumaFramework();
				echo "Retorno Teste:" . $retorno .  " / ";
				}
		}; break;
		
				
	    case 'iAcionarGaveta_DUAL_DarumaFramework' : {
		$retorno = iAcionarGaveta_DUAL_DarumaFramework();
	    }; break;

	    case 'iAutenticarDocumento_DUAL_DarumaFramework' : {
		$documento =	$_POST['iAutenticarDocumento_DUAL_DarumaFrameworkDocumento'];
		$local =	$_POST['iAutenticarDocumento_DUAL_DarumaFrameworkLocal'];
		$timeout =	$_POST['iAutenticarDocumento_DUAL_DarumaFrameworkTimeout'];

		$retorno = iAutenticarDocumento_DUAL_DarumaFramework($documento, $local, $timeout);
	    }; break;

	    case 'iEnviarBMP_DUAL_DarumaFramework' : {
		$arquivoOrigem = $_POST['iEnviarBMP_DUAL_DarumaFrameworkArquivoOrigem'];
		$retorno = iEnviarBMP_DUAL_DarumaFramework($arquivoOrigem);
	    }; break;

	    case 'iLimparBuffer_DUAL_DarumaFramework' : {
		$retorno = iLimparBuffer_DUAL_DarumaFramework();
	    }; break;

	    case 'iImprimirArquivo_DUAL_DarumaFramework' : {
		$arquivo = $_POST['iImprimirArquivo_DUAL_DarumaFrameworkArquivo'];
		$retorno = iImprimirArquivo_DUAL_DarumaFramework($arquivo);
	    }; break;

	    case 'iImprimirTexto_DUAL_DarumaFramework' : {
		$texto = $_POST['iImprimirTexto_DUAL_DarumaFrameworkTexto'];
		$retorno = iImprimirTexto_DUAL_DarumaFramework($texto, 0);
		
	    }; break;

		case 'Exemplo1' :{
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tc>~</tc><l></l>',0);
		//IMPRIMINDO A PRIMEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><e><b>CENTRO DE DANÇA FLASH</b></e></ce>',0);
		//IMPRIMINDO A SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<l></l><tc>~</tc>',0);
		//IMPRIMINDO A TERCEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Rua: XV de Novembro N 785 Centro SP BR' .
		//IMPRIMINDO A QUARTA LINHA
		'Fone: 6234-5678 Fax:6324-5678',0);
		//IMPRIMINDO A QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Data: <dt></dt><tb><tb>Hora: <hr></hr>',0);
		//IMPRIMINDO A SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Pedido:00069 Cliente:00013' . PHP_EOL .
		//IMPRIMINDO A SÉTIMA LINHA
		'Atividades Escolhidas:' . PHP_EOL .
		//IMPRIMINDO A OITAVA LINHA
		'SAMBA+BOLERO+FORRÓ' . PHP_EOL .
		//IMPRIMINDO A NONA LINHA
		'Valor: 55,00' . PHP_EOL .
		//IMPRIMINDO A DECIMA LINHA
		'Vencimento: 10-03-05' . PHP_EOL .
		//IMPRIMINDO A DECIMA PRIMEIRA LINHA
		'o não pagamento implica no cancelamento da vaga' . PHP_EOL .
		//IMPRIMINDO A DECIMA SEGUNDA LINHA
		'Início dia 01 de Fevereiro as 17:30hr' . PHP_EOL .
		//IMPRIMINDO A DECIMA TERCEIRA LINHA
		'Venha Dançar!!!' . PHP_EOL .
		//IMPRIMINDO A DECIMA QUARTA LINHA
		'Samba,Bolero,Soltinho,Forró,Zouk',0);

		$retorno = iImprimirTexto_DUAL_DarumaFramework('<bmp></bmp><ean8><w3>1234567</w3></ean8>' .
		'<upc-a><txt>12345678912</txt></upc-a>' .
		'<code39><txt>12345678A-B-Z*F-E-H*</txt></code39>' .
		'<code93><txt>12345678A-B-Z-F&</txt></code93>' .
		'<codabar><txt>12345678A$$</txt></codabar>' .
		'<code11><txt>1234567891234567</txt></code11>' .
		'<code128><txt>123456789123-A-B-*_%-&</txt></code128>' .
		'<msi><txt>1234567890</txt></msi>' .
		'<i2of5><txt>1234</txt></i2of5>' .
		'<s2of5><txt>12345678</txt></s2of5>' .
		'<bmp></bmp>' .
		'<ean13><cbv><w3><h70>123456789123</h70></w3></cbv></ean13><sl>05</sl>' .
		'<code39><w3><h120><txt>12345678A-B-Z*F-E-H*</txt></h120></w3></code39><sl>05</sl>',0);

		//IMPRIMINDO A DECIMA QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ad>Obrigado.</ad>',0);
		//IMPRIMINDO A DECIMA SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<bmp></bmp>',0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sl>3</sl><sn></sn>',0);
		}; break;
		
		
		case 'Exemplo2' : {
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb><b>FRAB<tb>Ano<tb>Modelo<tb>Valor<tb>Cor</b>',0);
		//IMPRIMINDO A PRIMEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>GM<tb>2000<tb>Corsa<tb>12.000<tb>Azul',0);
		//IMPRIMINDO A SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>Ford<tb>2005<tb>Fiesta<tb>14.000<tb>Verde',0);
		//IMPRIMINDO A TERCEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>Fiat<tb>1998<tb>Uno<tb>9.000<tb>Branco',0);
		//IMPRIMINDO A QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>GM<tb>1997<tb>Vectra<tb>18.000<tb>Prata',0);
		//IMPRIMINDO A QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>GM<tb>1999<tb>Tigra<tb>17.000<tb>Verde',0);
		//IMPRIMINDO A SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>Ford<tb>2001<tb>Furion<tb>5.000<tb>Vinho',0);
		//IMPRIMINDO A SÉTIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>GM<tb>1998<tb>Corsa<tb>10.000<tb>Preto',0);
		//IMPRIMINDO A OITAVA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>Fiat<tb>1996<tb>Fiurino<tb>6.000<tb>Branca',0);
		//IMPRIMINDO A NONA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>WV<tb>1979<tb>Fusca<tb>3.000<tb>Bordo',0);
		//IMPRIMINDO A DECIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>GM<tb>1996<tb>Vectra<tb>16.000<tb>Grafite',0);
		//IMPRIMINDO A DECIMA PRIMEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>Fiat<tb>1985<tb>Fiat147<tb>3.000<tb>Azul',0);
		//IMPRIMINDO A DECIMA SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>Hond<tb>2003<tb>Civic<tb>28.000<tb>Preto',0);
		//IMPRIMINDO A DECIMA TERCEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>Fiat<tb>1999<tb>Palio<tb>12.000<tb>Cinza',0);
		//IMPRIMINDO A DECIMA QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>GM<tb>2003<tb>Celta<tb>17.000<tb>Branco<sl>7</sl>',0);
		}; break;
		
		
		case 'Exemplo3' : {
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tc>#</tc>',0);
		//IMPRIMINDO A PRIMEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<e><ce>ACADEMIA NEW SPORTS</ce></e>',0);
		//IMPRIMINDO A SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb><i>Rua Nossa Senhora da Luz</i>, 350',0);
		//IMPRIMINDO A TERCEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb><i>Jardim Social   -   Curitiba   -  PR</i>',0);
		//IMPRIMINDO A QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>CNPJ 04.888.968/0001-79<tb><e>234-5678<l></l></e>',0);
		//IMPRIMINDO A QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tc>#</tc><l></l>',0);
		//IMPRIMINDO A SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<i><dt></dt><i>',0);
		//IMPRIMINDO A SÉTIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ad>Recibo nr.258963</ad><l></l>',0);
		//IMPRIMINDO A OITAVA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<c>Nome : </c><b>ELAINE MARIA</b><sp>5</sp>(545)<l></l> ',0);
		//IMPRIMINDO A NONA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<c>Plano : </c><b>MUSCULAÇÃO NOTURNO</b><sp>5</sp>(5)<l></l>',0);
		//IMPRIMINDO A DECIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><e>VALOR PAGO : 45,00</e></ce>',0);
		//IMPRIMINDO A DECIMA PRIMEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<c>Ref. ao período de 03/04/2005 até 03/05/2005</c><l></l>',0);
		//IMPRIMINDO A DECIMA SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<c>Obs: MENSALIDADE</c><l></l>',0);
		//IMPRIMINDO A DECIMA TERCEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tc>_</tc><l></l>',0);
		//IMPRIMINDO A DECIMA QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><e>WWW.ACADEMIANEW.COM.BR</e></ce>',0);
		//IMPRIMINDO A DECIMA QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tc>_</tc><l></l>',0);
		//IMPRIMINDO A DECIMA SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><e>SAUDE BELEZA E BEM ESTAR</e></ce>',0);
		//IMPRIMINDO A DECIMA SÉTIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sl>7</sl>',0);
		}; break;

		
		case 'Exemplo4' : {
		$NomeEmpresa = $_POST['mnuExemplo4NomeEmpresa'];
		$Endereco = $_POST['mnuExemplo4Endereco'];
		$TelefoneEm = $_POST['mnuExemplo4TelefoneEm'];
		$Pedido = $_POST['mnuExemplo4Pedido'];
		$Data = $_POST['mnuExemplo4Data'];
		$Tema = $_POST['mnuExemplo4Tema'];
		$Titulo = $_POST['mnuExemplo4Titulo'];
		$Valor = $_POST['mnuExemplo4Valor'];
		$Cobranca = $_POST['mnuExemplo4Cobranca'];
		$Cliente = $_POST['mnuExemplo4Cliente'];
		$FoneRes = $_POST['mnuExemplo4FoneRes'];
		$Celular = $_POST['mnuExemplo4Celular'];
		$FoneCom = $_POST['mnuExemplo4FoneCom'];
		$Mensagem = $_POST['mnuExemplo4Mensagem'];
		$Hora = $_POST['mnuExemplo4Hora'];		
		
		 //Imprimindo 
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<e><ce><b>' . $NomeEmpresa . '</b></ce></e>',0);
		//IMPRIMINDO A PRIMEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><tc>-</tc></ce>',0);
		//IMPRIMINDO A SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Endereço: <i>' . $Endereco . '</i>',0);
		//IMPRIMINDO A  TERCEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Telefone Empresa: <i>' . $TelefoneEm . '</i>',0);
		//IMPRIMINDO A  QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Numero Pedido: <i>' . $Pedido . '</i>',0);
		//IMPRIMINDO A  QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Data: <i>' . $Data . '</i>',0);
		//IMPRIMINDO A  SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><tc>-</tc></ce>',0);
		//IMPRIMINDO A  SÉTIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Tema Mensagem: <i>' . $Tema . '</i>',0);
		//IMPRIMINDO A  OITAVA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Titulo da Mensagem: <i>' . $Titulo . '</i>',0);
		//IMPRIMINDO A  NONA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Valor da Mensagem: <i>' . $Valor . '</i>',0);
		//IMPRIMINDO A  DECIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Forma de Cobrança: <i>' . $Cobranca . '</i>',0);
		//IMPRIMINDO A  DECIMA PRIMEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Cliente: <i>' . $Cliente . '</i>',0);
		//IMPRIMINDO A  DECIMA SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Fone Res: <i>' . $FoneRes . '</i>',0);
		//IMPRIMINDO A  DECIMA TERCEIRA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Celular: <i>' . $Celular . '</i>',0);
		//IMPRIMINDO A  DECIMA QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>4</sp> Fone Com: <i>' . $FoneCom . '</i><sl>1</sl>',0);
		//IMPRIMINDO A  DECIMA QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><b> Mensagem Promocional: </b></ce>' . $Mensagem . '<sl>2</sl>',0);
		//IMPRIMINDO A  DECIMA SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sp>35</sp> Hora: '. $Hora,0);
		//IMPRIMINDO A  DECIMA SÉTIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><tc>-</tc></ce><sl>7</sl>',0);
		}; break;
		
		
		#Funções Bobina 35 Colunas
		case 'BOB35BUFFER' : {
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tc>~</tc><l></l>',0);
		//IMPRIMINDO A PRIME$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<bmp></bmp>',0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><e><b>CENTRO DE DANÇA</b></e></ce>',0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><e><b>FLASH</b></e></ce>',0);
		//IMPRIMINDO A SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<l></l><tc>~</tc>',0);
		//IMPRIMINDO A TERCE$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Rua: XV de Novembro N 785 Centro SP'. PHP_EOL .'Fone: 6234-5678 Fax:6324-5678',0);
		//IMPRIMINDO A QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Data: <dt></dt><tb><tb>Hora:<hr></hr>',0);
		//IMPRIMINDO A SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Pedido:00069 Cliente:00013' .PHP_EOL .
		//IMPRIMINDO A SÉTIMA LINHA
		'Atividades Escolhidas:' . PHP_EOL .
		//IMPRIMINDO A OITAVA LINHA
		'SAMBA+BOLERO+FORRÓ' . PHP_EOL .
		//IMPRIMINDO A NONA LINHA
		'Valor: 55,00' . PHP_EOL .
		//IMPRIMINDO A DECIMA LINHA
		'Vencimento: 10-03-05' . PHP_EOL .
		//IMPRIMINDO A DECIMA PRIME$rA LINHA
		'o não pagamento implica no ' . PHP_EOL .
		'cancelamento da vaga' . PHP_EOL .
		//IMPRIMINDO A DECIMA SEGUNDA LINHA
		'Início dia 01 de Fevere$ro - 17:30hr' . PHP_EOL .
		//IMPRIMINDO A DECIMA TERCE$rA LINHA
		'Venha Dançar!!!' . PHP_EOL .
		//IMPRIMINDO A DECIMA QUARTA LINHA
		'Samba,Bolero,Soltinho,Forró,Zouk',0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ean8><w3>1234567</w3></ean8>' . 
		'<upc-a><txt>12345678912</txt></upc-a>' .
		'<code39><txt>12345678A-B-Z*F-E-H*</txt></code39>' .
		'<code93><txt>12345678A-B-Z-F&</txt></code93>' .
		'<codabar><txt>12345678A$$</txt></codabar>' .
		'<code11><txt>1234567891234567</txt></code11>' .
		'<code128><txt>123456789123-A-B-*_%-&</txt></code128>' .
		'<msi><txt>1234567890</txt></msi>' .
		'<i2of5><txt>1234</txt></i2of5>' .
		'<s2of5><txt>12345678</txt></s2of5>' .
		'<ean13><cbv><w3><h70>123456789123</h70></w3></cbv></ean13>' .
		'<code39><w3><h120><txt>12345678A-B-Z*F-E-H*</txt></h120></w3></code39><sl>05</sl>',0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sl>3</sl>',0);
		}; break;
		
		
		case 'BOB35TABULACAO' : {
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<b>FABR<tb>Ano<tb>Modelo<tb>Valor<tb>Cor</b>',0);
		//IMPRIMINDO A PRIME$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>2000<tb>Corsa<tb>12.000<tb>Azul',0);
		//IMPRIMINDO A SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Ford<tb>2005<tb>Fiesta<tb>14.000<tb>Azul',0);
		//IMPRIMINDO A TERCE$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Fiat<tb>1998<tb>Uno<tb>9.000<tb>Azul',0);
		//IMPRIMINDO A QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>1997<tb>Vectra<tb>18.000<tb>Azul',0);
		//IMPRIMINDO A QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>1999<tb>Tigra<tb>17.000<tb>Azul',0);
		//IMPRIMINDO A SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Ford<tb>2001<tb>Ka<tb>5.000<tb>Azul',0);
		//IMPRIMINDO A SÉTIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>1998<tb>Corsa<tb>10.000<tb>Azul',0);
		//IMPRIMINDO A OITAVA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Fiat<tb>1996<tb>Fiurino<tb>6.000<tb>Azul',0);
		//IMPRIMINDO A NONA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('WV<tb>1979<tb>Fusca<tb>3.000<tb>Azul',0);
		//IMPRIMINDO A DECIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>1996<tb>Vectra<tb>16.000<tb>Azul',0);
		//IMPRIMINDO A DECIMA PRIME$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Fiat<tb>1985<tb>Fiat147<tb>3.000<tb>Azul',0);
		//IMPRIMINDO A DECIMA SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Hond<tb>2003<tb>Civic<tb>28.000<tb>Azul',0);
		//IMPRIMINDO A DECIMA TERCE$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Fiat<tb>1999<tb>Palio<tb>12.000<tb>Azul',0);
		//IMPRIMINDO A DECIMA QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>2003<tb>Celta<tb>17.000<tb>Azul<sl>7</sl>',0);
		}; break;
		
		
		case 'BOB35LINHA' : {
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tc>#</tc>',0);
		//IMPRIMINDO A PRIME$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<e>  ACADEMIA NEW</e>',0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<e>    SPORTS</e>',0);
		//IMPRIMINDO A SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb><i>Rua Nossa Sra. da Luz</i>, 350',0);
		//IMPRIMINDO A TERCE$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb><i>Jardim Social - Curitiba - PR</i>',0);
		//IMPRIMINDO A QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>CNPJ 04.888.968/0001-79<l></l>',0);
		//IMPRIMINDO A QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tc>#</tc><l></l>',0);
		//IMPRIMINDO A SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<i><dt></dt><i>',0);
		//IMPRIMINDO A SÉTIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb>Recibo nr.258963<l></l>',0);
		//IMPRIMINDO A OITAVA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<c>Nome : </c><b>ELAINE MARIA</b><sp>5</sp>(545)<l></l> ',0);
		//IMPRIMINDO A NONA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<c>Plano : </c><b>MUSCULAÇÃO NOTURNO</b><sp>5</sp>(5)<l></l>',0);
		//IMPRIMINDO A DECIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><e>VALOR PAGO : 45,00</e></ce>',0);
		//IMPRIMINDO A DECIMA PRIME$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<c>Ref. ao período de 03/04/012 a 03/05/012</c><l></l>',0);
		//IMPRIMINDO A DECIMA SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<c>Obs: MENSALIDADE</c><l></l>',0);
		//IMPRIMINDO A DECIMA TERCE$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tc>_</tc><l></l>',0);
		//IMPRIMINDO A DECIMA QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><e>WWW.ACADEMIA.COM</e></ce>',0);
		//IMPRIMINDO A DECIMA QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tc>_</tc><l></l>',0);
		//IMPRIMINDO A DECIMA SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><e>SAUDE BELEZA E</e></ce>',0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><e>BEM ESTAR</e></ce>',0);
		//IMPRIMINDO A DECIMA SÉTIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sl>7</sl>',0);
		}; break;
		
		
			
		
		case 'BOB35TESTECOMPLETO' : {
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<e><b>BUFFER COMPLETO</e></b><l></l>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<e>DATA:<dt></dt></e><l></l><e>Hora:<hr></hr></e><l></l>'. PHP_EOL . 
		'<ce>Avançando 5 Linhas</ce><sl>5</sl>Inserindo<sp>5</sp>5 espaços em Branco<sl>2</sl>' .
		'<ce>Formatação Normal</ce><l></l>DARUMA AUTOMAÇÃO!!<sl>2</sl><ce>Negr+Ital+Subl+Expand</ce><l></l>' .
		'<b><i><s><e>DARUMA AUTOMAÇÃO!!</b></i></s></e><sl>2</sl><ce>Negr+Ital+Subl+Condensado</ce><l></l>' .
		'<b><i><s><c>DARUMA AUTOMAÇÃO!!</b></i></s></c><sl>2</sl><ce>Negr+Ital+Subl+Normal</ce><l></l>' .
		'<b><i><s><n>DARUMA AUTOMAÇÃO!!</b></i></s></n><sl>2</sl><ce>Expandido</ce><l></l>' .
		'<e>DARUMA AUTOMAÇÃO!!</e><sl>2</sl><ce>Condensado</ce><l></l>' .
		'<c>DARUMA AUTOMAÇÃO!!</c><sl>2</sl><ce>Negrito+Expandido</ce><l></l>' .
		'<b><e>DARUMA AUTOMAÇÃO!!</b></e><sl>2</sl><ce>Itálico+Expandido</ce><l></l>' .
		'<i><e>DARUMA AUTOMAÇÃO!!</i></e><sl>2</sl><ce>Sublinhado+Expandido</ce><l></l>' .
		'<s><e>DARUMA AUTOMAÇÃO!!</s></e><sl>2</sl><ce>Negrito+Condensado</ce><l></l>' .
		'<b><c>DARUMA AUTOMAÇÃO!!</b></c><sl>2</sl><ce>Itálico+Condensado</ce><l></l>' .
		'<i><c>DARUMA AUTOMAÇÃO!!</i></c><sl>2</sl><ce>Sublinhado+Condensado</ce><l></l>' .
		'<s><c>DARUMA AUTOMAÇÃO!!</s></c><sl>2</sl><ce>Negrito+Normal</ce><l></l>' .
		'<b><n>DARUMA AUTOMAÇÃO!!</n></b><l></l>',0);
        //$retorno = iImprim$rTexto_DUAL_DarumaFramework('<fe>Ativa o Modo fonte Elite</fe>'), 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<e><b>FIM BUFFER COMPLETO</b></e><sl>03</sl>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sl>03</sl>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<gui></gui>', 0);
		}; break;
		
		case 'BOB35TESTELINHA' : {
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sn><l><ce><s>Teste com Formatação DHTM</s></ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<n>Estes são os carácteres que<l> você poderá utilizar<n><l>Você poderá a qualquer momento<l> combinar as formatações!!', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<b>><</b>> Para sinalizar Negrito', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<i>><</i>> Para sinalizar Itálico', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<s>><</s>> Para sinalizar Sublinhado', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<e>><</e>> Para sinalizar Expandido', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<c>><</c>> Para sinalizar Condensado', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<n>><</n>> Para sinalizar Normal', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<l>><</l>> Para Saltar Uma Linha', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<fe>><</fe>> Ativa o Modo fonte Elite', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<ad>><</ad>> Para alinhar a d$reita', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<ft>>n1,..,n6<</ft>> Habilitar tabulação', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<tb>><</tb>>Saltar até proxima tabulação', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<sl>>NN<</sl>> Saltar Várias Linhas', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<tc>>C<</tc>>Riscar Linha<l> com Carácter Específico', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<ce>><</ce>> Para Centralizar', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<dt>><</dt>> Para Imprim$r Data Atual', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<hr>><</hr>> Para Imprim$r Hora Atual', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<sp>>NN<</sp>> Inser$r NN Espaços<l> em Branco', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<sn>><</sn>> Sinal Sonoro, Apitar', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<g>><</g>> Abre a Gaveta', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<<a>><</a>> Aguardar Término da Impressão', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<l><tc>_</tc><tc>_</tc>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<e><ce>TABULAÇÃO</ce><e><tc>_</tc>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<b>FABR<tb>Ano<tb>Modelo<tb>Valor<tb>Cor</b>',0);
		//IMPRIMINDO A PRIME$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>2000<tb>Corsa<tb>12.000<tb>Azul',0);
		//IMPRIMINDO A SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Ford<tb>2005<tb>Fiesta<tb>14.000<tb>Azul',0);
		//IMPRIMINDO A TERCE$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Fiat<tb>1998<tb>Uno<tb>9.000<tb>Azul',0);
		//IMPRIMINDO A QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>1997<tb>Vectra<tb>18.000<tb>Azul',0);
		//IMPRIMINDO A QUINTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>1999<tb>Tigra<tb>17.000<tb>Azul',0);
		//IMPRIMINDO A SEXTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Ford<tb>2001<tb>Ka<tb>5.000<tb>Azul',0);
		//IMPRIMINDO A SÉTIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>1998<tb>Corsa<tb>10.000<tb>Azul',0);
		//IMPRIMINDO A OITAVA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Fiat<tb>1996<tb>Fiurino<tb>6.000<tb>Azul',0);
		//IMPRIMINDO A NONA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('WV<tb>1979<tb>Fusca<tb>3.000<tb>Azul',0);
		//IMPRIMINDO A DECIMA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>1996<tb>Vectra<tb>16.000<tb>Azul',0);
		//IMPRIMINDO A DECIMA PRIME$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Fiat<tb>1985<tb>Fiat147<tb>3.000<tb>Azul',0);
		//IMPRIMINDO A DECIMA SEGUNDA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Hond<tb>2003<tb>Civic<tb>28.000<tb>Azul',0);
		//IMPRIMINDO A DECIMA TERCE$rA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('Fiat<tb>1999<tb>Palio<tb>12.000<tb>Azul',0);
		//IMPRIMINDO A DECIMA QUARTA LINHA
		$retorno = iImprimirTexto_DUAL_DarumaFramework('GM<tb>2003<tb>Celta<tb>17.000<tb>Azul<sl>7</sl>',0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<l><tc>_</tc>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<l></l><e>DATA:<dt></dt></e><l></l><e>Hora:<hr></hr></e><l></l>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>Anvançando 3 Linhas</ce><sl>3</sl>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>Anvançando 1 Linha</ce><sl>1</sl>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<l>Inserindo<sp>5</sp>5 espaços em Branco', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>Formatação Normal</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<n>DARUMA AUTOMAÇÃO!!</n><l>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>NEGR+ITAL+SUBL+EXPAND</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<b><i><s><e>DARUMA AUTOMAÇÃO!!</b></i></s></e>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>NEGR+ITAL+SUBL+CONDENSADO</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<b><i><s><c>DARUMA AUTOMAÇÃO!!</b></i></s></c>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>NEGR+ITAL+SUBL+NORMAL</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<b><i><s><n>DARUMA AUTOMAÇÃO!!</b></i></s></n>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>EXPANDIDO</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<e>DARUMA AUTOMAÇÃO!!<e>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>CONDENSADO</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<c>DARUMA AUTOMAÇÃO!!</c>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>NEGRITO+EXPANDIDO</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<b><e>DARUMA AUTOMAÇÃO!!</b></e>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>ITÁLICO+EXPANDIDO</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<i><e>DARUMA AUTOMAÇÃO!!</i></e>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce><dt></dt>SUBLINHADO+EXPANDIDO</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<s><e>DARUMA AUTOMAÇÃO!!</s></e>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>NEGRITO+CONDENSADO</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<b><c>DARUMA AUTOMAÇÃO!!</b></c>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>ITÁLICO+CONDENSADO</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<i><c>DARUMA AUTOMAÇÃO!!</i></c>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>SUBLINHADO+CONDENSADO</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<s><c>DARUMA AUTOMAÇÃO!!</s></c>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>NEGRITO+NORMAL</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<b><n>DARUMA AUTOMAÇÃO!!</b></n>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>ITÁLICO+NORMAL</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<l><i><n>DARUMA AUTOMAÇÃO!!</i></n>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>SUBLINHADO+NORMAL</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<s><n>DARUMA AUTOMAÇÃO!!</s></n><l>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>ALINHADO A D$rEITA</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ad>DARUMA</ad><l>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>CENTRALIZADO + EXPANDIDO</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<e><ce>DARUMA!!</ce></e><l>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ft>05,10,15,20,30,40</ft>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<ce>TABULADO NA COLUNA 10</ce>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<tb></tb><tb></tb>DARUMA<l>', 0);
 		$retorno = iImprimirTexto_DUAL_DarumaFramework('<l><e><b>FIM TAGS COMPLETO</e></b>', 0);
		$retorno = iImprimirTexto_DUAL_DarumaFramework('<sl>03</sl>', 0);
		}; break;
		
	    default : $retorno = "Metodo invalido!";
	}

	?>
        <script type="text/javascript">
	    alert("<?php echo "Retorno: " . $retorno; ?>");
	    window.location = "./";
        </script>
				
    </body>
</html>
