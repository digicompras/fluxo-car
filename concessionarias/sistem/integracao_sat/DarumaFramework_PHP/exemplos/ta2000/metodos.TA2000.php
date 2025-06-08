<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Executando m&eacute;todos...</title>
    </head>
    <body>
	<?php
	unset ($retorno);
	switch ($_POST['metodo']) {

	    case 'eAtivarCampo_TA2000_Daruma' : {
		$numeroCampo =	$_POST['eAtivarCampo_TA2000_DarumaNumeroCampo'];
		$retorno     =	eAtivarCampo_TA2000_Daruma(&$retornoAtiva, $numeroCampo);
		$retorno     .= "\\nRetorno ativa: " . $retornoAtiva;
	    }; break;

	    case 'fnEncerrar_TA2000_Daruma' : {
		$shutdown = $_POST['fnEncerrar_TA2000_DarumaShutDown'];
		$retorno  = fnEncerrar_TA2000_Daruma($shutdown);
	    }; break;

	    case 'iAdicionarCampo_TA2000_Daruma' : {
		$valorAtual	=   $_POST['iAdicionarCampo_TA2000_DarumaValorAtual'];
		$tipoDado	=   $_POST['iAdicionarCampo_TA2000_DarumaTipoDado'];
		$linha	        =   $_POST['iAdicionarCampo_TA2000_DarumaLinha'];
		$coluna		=   $_POST['iAdicionarCampo_TA2000_DarumaColuna'];
		$tamanhoDisplay =   $_POST['iAdicionarCampo_TA2000_DarumaTamanhoDisplay'];

		$retorno = iAdicionarCampo_TA2000_Daruma($valorAtual, $tipoDado, $linha, $coluna, $tamanhoDisplay);

	    }; break;

	    case 'iApagarCaracter_TA2000_Daruma' : {
		$retorno = iApagarCaracter_TA2000_Daruma();
	    }; break;

	    case 'iCarriageReturn_TA2000_Daruma' : {
		$retorno = iCarriageReturn_TA2000_Daruma();
	    }; break;

	    case 'icomEnviarByte_TA2000_Daruma' : {
		$byte = $_POST['icomEnviarByte_TA2000_DarumaByte'];
		$retorno = icomEnviarByte_TA2000_Daruma($byte);
	    }; break;

	    case 'iDesabilitarCursor_TA2000_Daruma' : {
		$retorno = iDesabilitarCursor_TA2000_Daruma();
	    }; break;

	    case 'iEntrarDadosDisplay_TA2000_Daruma' : {
		$eco		    = $_POST['iEntrarDadosDisplay_TA2000_DarumaEco'];
		$tipoDados	    = $_POST['iEntrarDadosDisplay_TA2000_DarumaTipoDados'];
		$tamanhoParametros  = $_POST['iEntrarDadosDisplay_TA2000_DarumaTamanhoParametros'];
		$ESC		    = $_POST['iEntrarDadosDisplay_TA2000_DarumaESC'];
		$linhaParametro	    = $_POST['iEntrarDadosDisplay_TA2000_DarumaLinhaParametro'];
		$colunaParametro    = $_POST['iEntrarDadosDisplay_TA2000_DarumaColunaParametro'];
		$bufferInputDisplay = $_POST['iEntrarDadosDisplay_TA2000_DarumaBufferInputDisplay'];

		$retorno = iEntrarDadosDisplay_TA2000_Daruma($eco, $tipoDados, $tamanhoParametros, $ESC, $linhaParametro, $colunaParametro, $bufferInputDisplay);
	    }; break;

	    case 'iEnviarDadosFormatados_TA2000_Daruma' : {
		$bufferXML  = $_POST['iEnviarDadosFormatados_TA2000_DarumaBUfferXML'];
		$retorno    = iEnviarDadosFormatados_TA2000_Daruma($bufferXML, $retorna);
		$retorno   .= "\\nDados: " . $retorna;
	    }; break;

	    case 'iImprimirDisplay_TA2000_Daruma' : {
		$bufferDisplay	=   $_POST['iImprimirDisplay_TA2000_DarumaBufferDisplay'];
		$linha		=   $_POST['iImprimirDisplay_TA2000_DarumaLinha'];
		$coluna		=   $_POST['iImprimirDisplay_TA2000_DarumaColuna'];

		$retorno = iImprimirDisplay_TA2000_Daruma($bufferDisplay, $linha, $coluna);

	    }; break;

	    case 'iLimparDisplay_TA2000_Daruma' : {
		$retorno = iLimparDisplay_TA2000_Daruma();
	    }; break;

	    case 'iLimparDisplayLinha_TA2000_Daruma' : {
		$linha   = $_POST['iLimparDisplayLinha_TA2000_DarumaLinha'];
		$retorno = iLimparDisplayLinha_TA2000_Daruma($linha);
	    }; break;

	    case 'iPosicionarCursor_TA2000_Daruma' : {
		$linha   = $_POST['iPosicionarCursor_TA2000_DarumaLinha'];
		$coluna	 = $_POST['iPosicionarCursor_TA2000_DarumaColuna'];
		$retorno = iPosicionarCursor_TA2000_Daruma($linha, $coluna);

	    }; break;

	    case 'regADLinha_TA2000_Daruma' : {
		$valor = $_POST['regADLinha_TA2000_DarumaParam'];
		$retorno = regADLinha_TA2000_Daruma($valor);
	    }; break;

	    case 'regAELinha_TA2000_Daruma' : {
		$valor = $_POST['regAELinha_TA2000_DarumaParam'];
		$retorno = regAELinha_TA2000_Daruma($valor);
	    }; break;

	    case 'regAuditoria_TA2000_Daruma' : {
		$valor = $_POST['regAuditoria_TA2000_DarumaParam'];
		$retorno = regAuditoria_TA2000_Daruma($valor);
	    }; break;

	    case 'regCLinha_TA2000_Daruma' : {
		$valor = $_POST['regCLinha_TA2000_DarumaParam'];
		$retorno = regCLinha_TA2000_Daruma($valor);
	    }; break;

	    case 'regEdicaoColuna_TA2000_Daruma' : {
		$valor = $_POST['regEdicaoColuna_TA2000_DarumaParam'];
		$retorno = regEdicaoColuna_TA2000_Daruma($valor);
	    }; break;

	    case 'regEdicaoEco_TA2000_Daruma' : {
		$valor = $_POST['regEdicaoEco_TA2000_DarumaParam'];
		$retorno = regEdicaoEco_TA2000_Daruma($valor);
	    }; break;

	    case 'regEdicaoESC_TA2000_Daruma' : {
		$valor = $_POST['regEdicaoESC_TA2000_DarumaParam'];
		$retorno = regEdicaoESC_TA2000_Daruma($valor);
	    }; break;

	    case 'regEdicaoLinha_TA2000_Daruma' : {
		$valor = $_POST['regEdicaoLinha_TA2000_DarumaParam'];
		$retorno = regEdicaoLinha_TA2000_Daruma($valor);
	    }; break;

	    case 'regEdicaoTamanho_TA2000_Daruma' : {
		$valor = $_POST['regEdicaoTamanho_TA2000_DarumaParam'];
		$retorno = regEdicaoTamanho_TA2000_Daruma($valor);
	    }; break;

	    case 'regEdicaoTipo_TA2000_Daruma' : {
		$valor = $_POST['regEdicaoTipo_TA2000_DarumaParam'];
		$retorno = regEdicaoTipo_TA2000_Daruma($valor);
	    }; break;

	    case 'regImprimirColuna_TA2000_Daruma' : {
		$valor = $_POST['regImprimirColuna_TA2000_DarumaParam'];
		$retorno = regImprimirColuna_TA2000_Daruma($valor);
	    }; break;

	    case 'regImprimirLinha_TA2000_Daruma' : {
		$valor = $_POST['regImprimirLinha_TA2000_DarumaParam'];
		$retorno = regImprimirLinha_TA2000_Daruma($valor);
	    }; break;

	    case 'regMarcadorOpcao_TA2000_Daruma' : {
		$valor = $_POST['regMarcadorOpcao_TA2000_DarumaParam'];
		$retorno = regMarcadorOpcao_TA2000_Daruma($valor);
	    }; break;

	    case 'regMascara_TA2000_Daruma' : {
		$valor = $_POST['regMascara_TA2000_DarumaParam'];
		$retorno = regMascara_TA2000_Daruma($valor);
	    }; break;

	    case 'regMascaraEco_TA2000_Daruma' : {
		$valor = $_POST['regMascaraEco_TA2000_DarumaParam'];
		$retorno = regMascaraEco_TA2000_Daruma($valor);
	    }; break;

	    case 'regMascaraLetra_TA2000_Daruma' : {
		$valor = $_POST['regMascaraLetra_TA2000_DarumaParam'];
		$retorno = regMascaraLetra_TA2000_Daruma($valor);
	    }; break;

	    case 'regMascaraNumero_TA2000_Daruma' : {
		$valor = $_POST['regMascaraNumero_TA2000_DarumaParam'];
		$retorno = regMascaraNumero_TA2000_Daruma($valor);
	    }; break;

	    case 'regMensagemBoasVindasLinha1_TA2000_Daruma' : {
		$valor = $_POST['regMensagemBoasVindasLinha1_TA2000_DarumaParam'];
		$retorno = regMensagemBoasVindasLinha1_TA2000_Daruma($valor);
	    }; break;

	    case 'regMensagemBoasVindasLinha2_TA2000_Daruma' : {
		$valor = $_POST['regMensagemBoasVindasLinha2_TA2000_DarumaParam'];
		$retorno = regMensagemBoasVindasLinha2_TA2000_Daruma($valor);
	    }; break;

	    case 'regMenuDirecao_TA2000_Daruma' : {
		$valor = $_POST['regMenuDirecao_TA2000_DarumaParam'];
		$retorno = regMenuDirecao_TA2000_Daruma($valor);
	    }; break;

	    case 'regMenuESC_TA2000_Daruma' : {
		$valor = $_POST['regMenuESC_TA2000_DarumaParam'];
		$retorno = regMenuESC_TA2000_Daruma($valor);
	    }; break;

	    case 'regMenuEstilo_TA2000_Daruma' : {
		$valor = $_POST['regMenuEstilo_TA2000_DarumaParam'];
		$retorno = regMenuEstilo_TA2000_Daruma($valor);
	    }; break;

	    case 'regPorta_TA2000_Daruma' : {
		$valor = $_POST['regPorta_TA2000_DarumaParam'];
		$retorno = regPorta_TA2000_Daruma($valor);
	    }; break;

	    case 'regPosColuna_TA2000_Daruma' : {
		$valor = $_POST['regPosColuna_TA2000_DarumaParam'];
		$retorno = regPosColuna_TA2000_Daruma($valor);
	    }; break;

	    case 'regPosLinha_TA2000_Daruma' : {
		$valor = $_POST['regPosLinha_TA2000_DarumaParam'];
		$retorno = regPosLinha_TA2000_Daruma($valor);
	    }; break;

	    case 'rLerValorCampoString_TA2000_Daruma' : {
		$numeroCampo = $_POST['rLerValorCampoString_TA2000_DarumaNumeroCampo'];
		$retorno = rLerValorCampoString_TA2000_Daruma($numeroCampo, &$retorna);
		$retorno .= "\\nValor campo: " . $retorna;
	    }; break;

	    case 'rLerValorOpcaoCombo_TA2000_Daruma' : {
		$combo = $_POST['rLerValorOpcaoCombo_TA2000_Daruma'];
		$retorno = rLerValorOpcaoCombo_TA2000_Daruma($combo, &$retorno);
		$retorno .= "\\nValor opcao: " . $retorno;
	    }; break;

	    case 'rLerDadoCombo_TA2000_Daruma' : {
		$numeroCombo = $_POST['rLerDadoCombo_TA2000_DarumaNumeroCombo'];
		$dado	     = $_POST['rLerDadoCombo_TA2000_DarumaDado'];
		$retorno     = rLerDadoCombo_TA2000_Daruma($numeroCombo, $dado, &$retorna);
		$retorno .= "\\nLido: " . $retorna;
	    }; break;

	    case 'rLerDadoCampo_TA2000_Daruma' : {
		$numeroCampo = $_POST['rLerDadoCampo_TA2000_DarumaNumeroCampo'];
		$dado	     = $_POST['rLerDadoCombo_TA2000_DarumaDado'];
		$retorno     = rLerDadoCampo_TA2000_Daruma($numeroCampo, $dado, &$retorna);
		$retorno .= "\\nLido: " . $retorna;
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
