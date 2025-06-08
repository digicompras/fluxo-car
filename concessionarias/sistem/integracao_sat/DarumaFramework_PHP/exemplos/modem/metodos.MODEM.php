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
		$_GET['regRetornaValorChave_DarumaFrameworkValor'] == $valor;
		}; break;
	
	
		case 'eReiniciar_MODEM_DarumaFramework' : {
		$retorno = eReiniciar_MODEM_DarumaFramework();
	    }; break;
		
	
		#Funcoes de Registro
		case 'regTempoAlertar_MODEM_DarumaFramework' : {
		$param = $_POST['regTempoAlertar_MODEM_DarumaFrameworkParam'];
		$retorno = regTempoAlertar_MODEM_DarumaFramework($param);
	    }; break;
		
		
		case 'regLerApagar_MODEM_DarumaFramework' : {
		$param = $_POST['regLerApagar_MODEM_DarumaFrameworkParam'];
		$retorno = regLerApagar_MODEM_DarumaFramework($param);
	    }; break;
		
		
		case 'regPorta_MODEM_DarumaFramework' : {
		$param = $_POST['regPorta_MODEM_DarumaFrameworkParam'];
		$retorno = regPorta_MODEM_DarumaFramework($param);
	    }; break;
		
		
		case 'regThread_MODEM_DarumaFramework' : {
		$param = $_POST['regThread_MODEM_DarumaFrameworkParam'];
		$retorno = regThread_MODEM_DarumaFramework($param);
	    }; break;
		
		
		case 'regVelocidade_MODEM_DarumaFramework' : {
		$param = $_POST['regVelocidade_MODEM_DarumaFrameworkParam'];
		$retorno = regVelocidade_MODEM_DarumaFramework($param);
	    }; break;
		
		
		case 'regCaptionWinAPP_MODEM_DarumaFramework' : {
		$param = $_POST['regCaptionWinAPP_MODEM_DarumaFrameworkParam'];
		$retorno = regCaptionWinAPP_MODEM_DarumaFramework($param);
	    }; break;

		
	    case 'regBandejaInicio_MODEM_DarumaFramework' : {
		$param = $_POST['regBandejaInicio_MODEM_DarumaFrameworkParam'];
		$retorno = regBandejaInicio_MODEM_DarumaFramework($param);
	    }; break;
		
		
		#Funcoes para Modem
	    case 'eApagarSms_MODEM_DarumaFramework' : {
		$indice   = $_POST['eApagarSms_MODEM_DarumaFrameworkIndice'];
		$retorno  = eApagarSms_MODEM_DarumaFramework($indice);
	    }; break;

		
		case 'eInicializar_MODEM_DarumaFramework' : {
		$retorno = eInicializar_MODEM_DarumaFramework();
	    }; break;
		
		
		case 'eTrocarBandeja_MODEM_DarumaFramework' : {
		$retorno = eTrocarBandeja_MODEM_DarumaFramework();
	    }; break;
		
		
	    case 'eBuscarPortaVelocidade_MODEM_DarumaFramework' : {
		$retorno = eBuscarPortaVelocidade_MODEM_DarumaFramework();
	    }; break;

		
		#Funcoes de Transmissao
		case 'tEnviarSms_MODEM_DarumaFramework' : {
		$telefone = $_POST['tEnviarSms_MODEM_DarumaFrameworkTelefone'];
		$mensagem = $_POST['tEnviarSms_MODEM_DarumaFrameworkMensagem'];
		$retorno  = tEnviarSms_MODEM_DarumaFramework($telefone, $mensagem);
	    }; break;
		
		
		case 'tEnviarSmsOperadora_MODEM_DarumaFramework' : {
		$telefone = $_POST['tEnviarSmsOperadora_MODEM_DarumaFrameworkTelefone'];
		$mensagem = $_POST['tEnviarSmsOperadora_MODEM_DarumaFrameworkMensagem'];
		$bandeja = $_POST['tEnviarSmsOperadora_MODEM_DarumaFrameworkBandeja'];							
		$retorno  = tEnviarSmsOperadora_MODEM_DarumaFramework($telefone, $mensagem, $bandeja);
	    }; break;
		
		
		#Funcoes para Recepcao
		case 'rReceberSms_MODEM_DarumaFramework' : {
		$retorno =  rReceberSms_MODEM_DarumaFramework($indice, $mensagem, $data, $hora, $remetente);
		echo "Indice: " . $indice . "Mensagem: " . $mensagem;
		echo "Data: " . $data . "Hora: " . $hora . "Remetente: " . $remetente;
	    }; break;
		
		
		case 'rReceberSmsIndice_MODEM_DarumaFramework' : {
		$indice = $_POST['rReceberSmsIndice_MODEM_DarumaFrameworkIndice'];
		$retorno =  rReceberSmsIndice_MODEM_DarumaFramework($indice, $mensagem, $data, $hora, $remetente);
		echo "Mensagem: " . $mensagem . "Remetente: " . $remetente;
		echo "Data: " . $data . "Hora: " . $hora;
	    }; break;
		
		
		case 'rListarSms_MODEM_DarumaFramework' : {
		$retorno  = rListarSms_MODEM_DarumaFramework();
	    }; break;
		
		
		case 'rRetornarImei_MODEM_DarumaFramework' : {
		$retorno =  rRetornarImei_MODEM_DarumaFramework($imei);
		echo "IMEI: " . $imei;
		}; break;
		
		
		case 'rNivelSinalRecebido_MODEM_DarumaFramework' : {
		$retorno  = rNivelSinalRecebido_MODEM_DarumaFramework();
	    }; break;
		
		
		case 'rRetornarOperadora_MODEM_DarumaFramework' : {
		$retorno  =  rRetornarOperadora_MODEM_DarumaFramework($operadora);
		echo "Operadora: " . $operadora;
	    }; break;
		
		
		case 'rInfoEstendida_MODEM_DarumaFramework' : {
		$retorno = rInfoEstendida_MODEM_DarumaFramework($informacao);
		echo "Informacao Estendida: " . $informacao;
	    }; break;
		
		
		#Conexao CSD
		case 'eAtivarConexaoCsd_MODEM_DarumaFramework' : {
		$retorno = eAtivarConexaoCsd_MODEM_DarumaFramework();
	    }; break;
		
		
		case 'eRealizarChamadaCsd_MODEM_DarumaFramework' : {
		$telefone = $_POST['eRealizarChamadaCsd_MODEM_DarumaFrameworkTelefone'];
		$retorno  = eRealizarChamadaCsd_MODEM_DarumaFramework($telefone);
	    }; break;
		
		
		case 'eFinalizarChamadaCsd_MODEM_DarumaFramework' : {
		$retorno = eFinalizarChamadaCsd_MODEM_DarumaFramework();
	    }; break;
	    

	    case 'tEnviarDadosCsd_MODEM_DarumaFramework' : {
		$dador	  = $_POST['tEnviarDadosCsd_MODEM_DarumaFrameworkDados'];
		$retorno  = tEnviarDadosCsd_MODEM_DarumaFramework($dados);
	    }; break;

	    
		case 'rReceberDadosCsd_MODEM_DarumaFramework' : {
		$retorno  = rReceberDadosCsd_MODEM_DarumaFramework($resposta);
		echo "Dados: " . $resposta;
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
