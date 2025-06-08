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

	    // Inicio Cupom Fiscal {{{

	    case 'iCFAbrir_ECF_Daruma': {
		    $cpf = $_POST['iCFAbrir_ECF_DarumaCpf'];
		    $nome =	$_POST['iCFAbrir_ECF_DarumaNome'];
		    $endereco =	$_POST['iCFAbrir_ECF_DarumaEndereco'];
		    $retorno = iCFAbrir_ECF_Daruma($cpf, $nome, $endereco);
		};break;

		
	    case 'iCFAbrirPadrao_ECF_Daruma': {
		    $retorno = iCFAbrirPadrao_ECF_Daruma();
		};break;

		
	    case 'iCFVender_ECF_Daruma': {
		    $cargaTributaria = $_POST['iCFVender_ECF_DarumaCargaTributaria'];
		    $quantidade = $_POST['iCFVender_ECF_DarumaQuantidade'];
		    $precoUnitario = $_POST['iCFVender_ECF_DarumaPrecoUnitario'];
		    $tipoDescAcresc = $_POST['iCFVender_ECF_DarumaTipoDescAcresc'];
		    $valorDescAcresc = $_POST['iCFVender_ECF_DarumaValorDescAcresc'];
		    $codigoItem = $_POST['iCFVender_ECF_DarumaCodigoItem'];
		    $unidadeMedida = $_POST['iCFVender_ECF_DarumaUnidadeMedida'];
		    $descricaoItem = $_POST['iCFVender_ECF_DarumaDescricaoItem'];
		    $retorno = iCFVender_ECF_Daruma($cargaTributaria, $quantidade, $precoUnitario, $tipoDescAcresc, $valorDescAcresc, $codigoItem, $unidadeMedida, $descricaoItem);
		};break;

		
	    case 'iCFVenderSemDesc_ECF_Daruma' : {
		    $cargaTributaria = $_POST['iCFVenderSemDesc_ECF_DarumaCargaTributaria'];
		    $quantidade = $_POST['iCFVenderSemDesc_ECF_DarumaQuantidade'];
		    $precoUnitario = $_POST['iCFVenderSemDesc_ECF_DarumaPrecoUnitario'];
		    $codigoItem = $_POST['iCFVenderSemDesc_ECF_DarumaCodigoItem'];
		    $unidadeMedida = $_POST['iCFVenderSemDesc_ECF_DarumaUnidadeMedida'];
		    $descricaoItem = $_POST['iCFVenderSemDesc_ECF_DarumaDescricaoItem'];
		    $retorno = iCFVenderSemDesc_ECF_Daruma($cargaTributaria, $quantidade, $precoUnitario, $codigoItem, $unidadeMedida, $descricaoItem);
		};break;

		
	    case 'iCFVenderResumido_ECF_Daruma' : {
		    $cargaTributaria = $_POST['iCFVenderResumido_ECF_DarumaCargaTributaria'];
		    $precoUnitario = $_POST['iCFVenderResumido_ECF_DarumaPrecoUnitario'];
		    $codigoItem = $_POST['iCFVenderResumido_ECF_DarumaCodigoItem'];
		    $descricaoItem = $_POST['iCFVenderResumido_ECF_DarumaDescricaoItem'];
		    $retorno = iCFVenderResumido_ECF_Daruma($cargaTributaria, $precoUnitario, $codigoItem, $descricaoItem);
		};break;

		
	    case 'iCFLancarAcrescimoItem_ECF_Daruma' : {
		    $numeroItem = $_POST['iCFLancarAcrescimoItem_ECF_DarumaNumeroItem'];
		    $tipoDescAcres = $_POST['iCFLancarAcrescimoItem_ECF_DarumaTipoDescAcres'];
		    $valorDescAcres = $_POST['iCFLancarAcrescimoItem_ECF_DarumaValorDescAcres'];
		    $retorno = iCFLancarAcrescimoItem_ECF_Daruma($numeroItem, $tipoDescAcres, $valorDescAcres);
		};break;

		
	    case 'iCFLancarDescontoItem_ECF_Daruma' : {
		    $numeroItem = $_POST['iCFLancarDescontoItem_ECF_DarumaNumeroItem'];
		    $tipoDescAcres = $_POST['iCFLancarDescontoItem_ECF_DarumaTipoDescAcres'];
		    $valorDescAcres = $_POST['iCFLancarDescontoItem_ECF_DarumaValorDescAcres'];
		    $retorno = iCFLancarDescontoItem_ECF_Daruma($numeroItem, $tipoDescAcres, $valorDescAcres);
		};break;

		
	    case 'iCFLancarAcrescimoUltimoItem_ECF_Daruma' : {
		    $tipoDescAcresc = $_POST['iCFLancarAcrescimoUltimoItem_ECF_DarumaTipoDescAcres'];
		    $valorDescAcresc = $_POST['iCFLancarAcrescimoUltimoItem_ECF_DarumaValorDescAcres'];
		    $retorno = iCFLancarAcrescimoUltimoItem_ECF_Daruma($tipoDescAcres, $valorDescAcres);
		};break;

		
	    case 'iCFLancarDescontoUltimoItem_ECF_Daruma' : {
		    $tipoDescAcresc = $_POST['iCFLancarDescontoUltimoItem_ECF_DarumaTipoDescAcres'];
		    $valorDescAcresc = $_POST['iCFLancarDescontoUltimoItem_ECF_DarumaValorDescAcres'];
		    $retorno = iCFLancarDescontoUltimoItem_ECF_Daruma($tipoDescAcres, $valorDescAcres);
		};break;

		
	    case 'iCFCancelarItem_ECF_Daruma' : {
		    $numeroItem = $_POST['iCFCancelarItem_ECF_DarumaNumeroItem'];
		    $retorno = iCFCancelarItem_ECF_Daruma($numeroItem);
		};break;

		
	    case 'iCFCancelarUltimoItem_ECF_Daruma' : {
		    $retorno = iCFCancelarUltimoItem_ECF_Daruma();
		}; break;

		
	    case 'iCFCancelarItemParcial_ECF_Daruma' : {
		    $numeroItem =   $_POST['iCFCancelarItemParcial_ECF_DarumaNumeroItem'];
		    $quantidade =   $_POST['iCFCancelarItemParcial_ECF_DarumaQuantidade'];
		    $retorno = iCFCancelarItemParcial_ECF_Daruma($numeroItem, $quantidade);
		};break;

		
	    case 'iCFCancelarUltimoItemParcial_ECF_Daruma' : {
			$quantidade = $_POST['iCFCancelarUltimoItemParcial_ECF_DarumaQuantidade'];
		    $retorno = iCFCancelarUltimoItemParcial_ECF_Daruma();
		};break;

		
	    case 'iCFCancelarDescontoItem_ECF_Daruma' : {
		    $numeroItem = $_POST['iCFCancelarDescontoItem_ECF_DarumaNumeroItem'];
		    $retorno = iCFCancelarDescontoItem_ECF_Daruma($numeroItem);
		};break;
 
		
	    case 'iCFCancelarDescontoUltimoItem_ECF_Daruma' : {
		    $retorno = iCFCancelarDescontoUltimoItem_ECF_Daruma();
		};break;

		
		case 'iCFCancelarAcrescimoItem_ECF_Daruma' : {
		    $numeroItem = $_POST['iCFCancelarAcrescimoItem_ECF_DarumaNumeroItem'];
		    $retorno = iCFCancelarAcrescimoItem_ECF_Daruma($numeroItem);
		};break;
 
		
	    case 'iCFCancelarAcrescimoUltimoItem_ECF_Daruma' : {
		    $retorno = iCFCancelarAcrescimoUltimoItem_ECF_Daruma();
		};break;
		
		
	    case 'iCFTotalizarCupom_ECF_Daruma' : {
		    $tipoDescAcresc = $_POST['iCFTotalizarCupom_ECF_DarumaTipoDescAcres'];
		    $valorDescAcresc = $_POST['iCFTotalizarCupom_ECF_DarumaValorDescAcres'];
		    $retorno = iCFTotalizarCupom_ECF_Daruma($tipoDescAcresc, $valorDescAcresc);
		};break;

		
	    case 'iCFTotalizarCupomPadrao_ECF_Daruma' : {
		    $retorno = iCFTotalizarCupomPadrao_ECF_Daruma(); 
		};break;

		
	    case 'iCFCancelarDescontoSubtotal_ECF_Daruma' : {
		    $retorno = iCFCancelarDescontoSubtotal_ECF_Daruma();
		};break;

		
	    case 'iCFCancelarAcrescimoSubtotal_ECF_Daruma' : {
		    $retorno = iCFCancelarAcrescimoSubtotal_ECF_Daruma();
		};break;

		
	    case 'iCFEfetuarPagamentoPadrao_ECF_Daruma' : {
		    $retorno = iCFEfetuarPagamentoPadrao_ECF_Daruma();
		};break;

		
	    case 'iCFEfetuarPagamentoFormatado_ECF_Daruma' : {
		    $formaPagamento = $_POST['iCFEfetuarPagamentoFormatado_ECF_DarumaFormaPagamento'];
		    $valor = $_POST['iCFEfetuarPagamentoFormatado_ECF_DarumaValor'];
		    $retorno = iCFEfetuarPagamentoFormatado_ECF_Daruma($formaPagamento, $valor);
		};break;

		
	    case 'iCFEfetuarPagamento_ECF_Daruma' : {
		    $formaPagamento = $_POST['iCFEfetuarPagamento_ECF_DarumaFormaPagamento'];
		    $valor = $_POST['iCFEfetuarPagamento_ECF_DarumaValor'];
		    $informacao = $_POST['iCFEfetuarPagamento_ECF_DarumaInformacao'];
		    $retorno = iCFEfetuarPagamento_ECF_Daruma($formaPagamento, $valor, $informacao);
		};break;

		
	    case 'iCFEncerrarPadrao_ECF_Daruma' : {
		    $retorno = iCFEncerrarPadrao_ECF_Daruma();
		};break;

		
	    case 'iCFEncerrarConfigMsg_ECF_Daruma': {
		    $mensagem = $_POST['iCFEncerrarConfigMsg_ECF_DarumaMensagem'];
		    $retorno = iCFEncerrarConfigMsg_ECF_Daruma($mensagem);
		};break;

		
	    case 'iCFEncerrar_ECF_Daruma' : {
		    $cupomAdicional = $_POST['iCFEncerrar_ECF_DarumaCupomAdicional'];
		    $mensagem = $_POST['iCFEncerrar_ECF_DarumaMensagem'];
		    $retorno = iCFEncerrar_ECF_Daruma($cupomAdicional, $mensagem);
		};break;

		
	    case 'iCFEmitirCupomAdicional_ECF_Daruma' : {
		    $retorno = iCFEmitirCupomAdicional_ECF_Daruma();
		};break;

		
	    case 'iCFCancelar_ECF_Daruma' : {
		    $retorno = iCFCancelar_ECF_Daruma();
		};break;
		
		
		case 'iCFIdentificarConsumidor_ECF_Daruma' : {
		    $nome = $_POST['iCFIdentificarConsumidor_ECF_DarumaNome'];
			$endereco = $_POST['iCFIdentificarConsumidor_ECF_DarumaEndereco'];
		    $cpf = $_POST['iCFIdentificarConsumidor_ECF_DarumaCpf'];
		    $retorno = iCFIdentificarConsumidor_ECF_Daruma($nome, $endereco, $cpf);
		};break;
		
		
		case 'iEstornarPagamento_ECF_Daruma' : {
		    $fpgtoestornada = $_POST['iEstornarPagamento_ECF_DarumaFPGTOEstornada'];
			$fpgtoefetiva = $_POST['iEstornarPagamento_ECF_DarumaFPGTOEfetiva'];
		    $valor = $_POST['iEstornarPagamento_ECF_DarumaValor'];
			$info = $_POST['iEstornarPagamento_ECF_DarumaInfo'];
		    $retorno = iEstornarPagamento_ECF_Daruma($fpgtoestornada, $fpgtoefetiva, $valor, $info);
		};break;
		
	    // Fim Cupom Fiscal

		
			
		// Inicio Credito

	    case 'iCCDAbrir_ECF_Daruma' : {
			$formaPagamento = $_POST['iCCDAbrir_ECF_DarumaFormaPagamento'];
		    $parcelas = $_POST['iCCDAbrir_ECF_DarumaParcelas'];
		    $documentoOrigem = $_POST['iCCDAbrir_ECF_DarumaDocumentoOrigem'];
		    $valor = $_POST['iCCDAbrir_ECF_DarumaValor'];
		    $cpf = $_POST['iCCDAbrir_ECF_DarumaCPF'];
		    $nome =	$_POST['iCCDAbrir_ECF_DarumaNome'];
		    $endereco =	$_POST['iCCDAbrir_ECF_DarumaEndereco'];
		    $retorno = iCCDAbrir_ECF_Daruma($formaPagamento, $parcelas, $documentoOrigem, $valor, $cpf, $nome, $endereco);
		};break;

		
	    case 'iCCDAbrirSimplificado_ECF_Daruma' : {
		    $formaPagamento = $_POST['iCCDAbrirSimplificado_ECF_DarumaFormaPagamento'];
		    $parcelas =	$_POST['iCCDAbrirSimplificado_ECF_DarumaParcelas'];
		    $documentoOrigem = $_POST['iCCDAbrirSimplificado_ECF_DarumaDocumentoOrigem'];
		    $valor = $_POST['iCCDAbrirSimplificado_ECF_DarumaValor'];
		    $retorno = iCCDAbrirSimplificado_ECF_Daruma($formaPagamento, $parcelas, $documentoOrigem, $valor);
		};break;

		
	    case 'iCCDAbrirPadrao_ECF_Daruma' : {
		    $retorno = iCCDAbrirPadrao_ECF_Daruma();
		};break;


	    case 'iCCDImprimirTexto_ECF_Daruma' : {
		    $mensagem = $_POST['iCCDImprimirTexto_ECF_DarumaTexto'];
		    $retorno = iCCDImprimirTexto_ECF_Daruma($mensagem);
		};break;

		
	    case 'iCCDImprimirArquivo_ECF_Daruma' : {
		    $arquivo = $_POST['iCCDImprimirArquivo_ECF_DarumaArquivo'];
		    $retorno = iCCDImprimirArquivo_ECF_Daruma($arquivo);
		};break;

		
	    case 'iCCDFechar_ECF_Daruma' : {
		    $retorno = iCCDFechar_ECF_Daruma();
		};break;
		
		
		case 'iCCDEstornar_ECF_Daruma' : {
		    $coo = $_POST['iCCDEstornar_ECF_DarumaCOO'];
			$cpf = $_POST['iCCDEstornar_ECF_DarumaCPF'];
			$nome = $_POST['iCCDEstornar_ECF_DarumaNome'];
			$endereco = $_POST['iCCDEstornar_ECF_DarumaEndereco'];
		    $retorno = iCCDEstornar_ECF_Daruma($coo, $cfp, $nome, $endereco);
		};break;
		
		
		case 'iCCDEstornarPadrao_ECF_Daruma' : {
		    $retorno = iCCDEstornarPadrao_ECF_Daruma();
		};break;
		
		
		case 'iCCDSegundaVia_ECF_Daruma' : {
		    $retorno = iCCDSegundaVia_ECF_Daruma();
		};break;
		
		
		case 'eTEF_EsperarArquivo_ECF_Daruma' : {
		    $arquivo = $_POST['eTEF_EsperarArquivo_ECF_DarumaArquivo'];
			$tempo = $_POST['eTEF_EsperarArquivo_ECF_DarumaTempo'];
			$travar = $_POST['eTEF_EsperarArquivo_ECF_DarumaTravar'];
			$retorno = eTEF_EsperarArquivo_ECF_Daruma($arquivo, $tempo, $travar);
		};break;
		
		
		case 'eTEF_SetarFoco_ECF_Daruma' : {
		    $tela = $_POST['eTEF_SetarFoco_ECF_DarumaTela'];
			$retorno = eTEF_SetarFoco_ECF_Daruma($tela);
		};break;
		
		
		case 'eTEF_TravarTeclado_ECF_Daruma' : {
		    $travar = $_POST['eTEF_TravarTeclado_ECF_DarumaTravar'];
			$retorno = eTEF_TravarTeclado_ECF_Daruma($travar);
		};break;
		
		
		case 'iTEF_Fechar_ECF_Daruma' : {
		    $retorno = iTEF_Fechar_ECF_Daruma();
		};break;
		
		
		case 'iTEF_ImprimirResposta_ECF_Daruma' : {
		    $arquivo = $_POST['iTEF_ImprimirResposta_ECF_DarumaArquivo'];
			$travar = $_POST['iTEF_ImprimirResposta_ECF_DarumaTravar'];
			$retorno = iTEF_ImprimirResposta_ECF_Daruma($arquivo, $travar);
		};break;
		
		
		case 'iTEF_ImprimirRespostaCartao_ECF_Daruma' : {
		    $arquivo = $_POST['iTEF_ImprimirRespostaCartao_ECF_DarumaArquivo'];
			$travar = $_POST['iTEF_ImprimirRespostaCartao_ECF_DarumaTravar'];
			$forma = $_POST['iTEF_ImprimirRespostaCartao_ECF_DarumaForma'];
			$valor = $_POST['iTEF_ImprimirRespostaCartao_ECF_DarumaValor'];
			$retorno = iTEF_ImprimirRespostaCartao_ECF_Daruma($arquivo, $travar, $forma, $valor);
		};break;
		
	    // }}} Fim Credito
		
		
		// Inicio Nao Fiscal {{{
		
		case 'iCNFAbrir_ECF_Daruma': {
		    $cpf = $_POST['iCNFAbrir_ECF_DarumaCpf'];
		    $nome =	$_POST['iCNFAbrir_ECF_DarumaNome'];
		    $endereco =	$_POST['iCNFAbrir_ECF_DarumaEndereco'];
		    $retorno = iCNFAbrir_ECF_Daruma($cpf, $nome, $endereco);
		};break;

		
	    case 'iCNFAbrirPadrao_ECF_Daruma': {
		    $retorno = iCNFAbrirPadrao_ECF_Daruma();
		};break;
		
		
		case 'iCNFReceber_ECF_Daruma': {
		    $indice = $_POST['iCNFReceber_ECF_DarumaIndice'];
		    $valor = $_POST['iCNFReceber_ECF_DarumaValor'];
		    $tipo =	$_POST['iCNFReceber_ECF_DarumaTipo'];
			$valordesc = $_POST['iCNFReceber_ECF_DarumaValorDesc'];
		    $retorno = iCNFReceber_ECF_Daruma($indice, $valor, $tipo, $valordesc);
		};break;
		
		
		case 'iCNFReceberSemDesc_ECF_Daruma': {
		    $indice = $_POST['iCNFReceberSemDesc_ECF_DarumaIndice'];
		    $valor = $_POST['iCNFReceberSemDesc_ECF_DarumaValor'];
		    $retorno = iCNFReceber_ECF_Daruma($indice, $valor);
		};break;
		
		
	    case 'iCNFCancelarItem_ECF_Daruma' : {
		    $numeroItem = $_POST['iCNFCancelarItem_ECF_DarumaNumeroItem'];
		    $retorno = iCNFCancelarItem_ECF_Daruma($numeroItem);
		};break;

		
	    case 'iCNFCancelarUltimoItem_ECF_Daruma' : {
		    $retorno = iCNFCancelarUltimoItem_ECF_Daruma();
		};break;

		
	    case 'iCNFCancelarAcrescimoItem_ECF_Daruma' : {
		    $numeroItem = $_POST['iCNFCancelarAcrescimoItem_ECF_DarumaNumeroItem'];
		    $retorno = iCNFCancelarAcrescimoItem_ECF_Daruma($numeroItem);
		};break;

		
	    case 'iCNFCancelarAcrescimoUltimoItem_ECF_Daruma' : {
		    $retorno = iCNFCancelarAcrescimoUltimoItem_ECF_Daruma();
		};break;

		
	    case 'iCNFCancelarDescontoItem_ECF_Daruma' : {
		    $numeroItem = $_POST['iCNFCancelarDescontoItem_ECF_DarumaNumeroItem'];
		    $retorno = iCNFCancelarDescontoItem_ECF_Daruma($numeroItem);
		};break;

		
	    case 'iCNFCancelarDescontoUltimoItem_ECF_Daruma' : {
		    $retorno = iCNFCancelarDescontoUltimoItem_ECF_Daruma();
		};break;

		
	    case 'iCNFTotalizarComprovante_ECF_Daruma' : {
		    $tipoDescAcres = $_POST['iCNFTotalizarComprovante_ECF_DarumaTipoDescAcres'];
		    $valorDescAcres = $_POST['iCNFTotalizarComprovante_ECF_DarumaValorDescAcres'];
			$retorno = iCNFTotalizarComprovante_ECF_Daruma($tipoDescAcres, $valorDescAcres);
		};break;

		
	    case 'iCNFTotalizarComprovantePadrao_ECF_Daruma' : {
		    $retorno = iCNFTotalizarComprovantePadrao_ECF_Daruma();
		};break;

		
	    case 'iCNFCancelarAcrescimoSubtotal_ECF_Daruma' : {
		    $retorno = iCNFCancelarAcrescimoSubtotal_ECF_Daruma();
		};break;


	    case 'iCNFCancelarDescontoSubtotal_ECF_Daruma' : {
		    $retorno = iCNFCancelarDescontoSubtotal_ECF_Daruma();
		};
		break;

		
	    case 'iCNFEfetuarPagamento_ECF_Daruma' : {
		    $formaPagamento = $_POST['iCNFEfetuarPagamento_ECF_DarumaFormaPagamento'];
		    $valor = $_POST['iCNFEfetuarPagamento_ECF_DarumaValor'];
		    $retorno = iCNFEfetuarPagamento_ECF_Daruma($formaPagamento, $valor);
		};break;
 
		
	    case 'iCNFEfetuarPagamentoFormatado_ECF_Daruma' : {
		    $formaPagamento = $_POST['iCNFEfetuarPagamentoFormatado_ECF_DarumaPagamento'];
		    $valor = $_POST['iCNFEfetuarPagamentoFormatado_ECF_DarumaValor'];
		    $mensagem = $_POST['iCNFEfetuarPagamentoFormatado_ECF_DarumaMensagem'];
		    $retorno = iCNFEfetuarPagamentoFormatado_ECF_Daruma($formaPagamento, $valor, $mensagem);
		};break;

		
	    case 'iCNFEfetuarPagamentoPadrao_ECF_Daruma' : {
		    $retorno = iCNFEfetuarPagamentoPadrao_ECF_Daruma();
		};break;

		
	    case 'iCNFEncerrar_ECF_Daruma' : {
		    $mensagem = $_POST['iCNFEncerrar_ECF_DarumaMensagem'];
		    $retorno = iCNFEncerrar_ECF_Daruma($mensagem);
		};break;

		
	    case 'iCNFEncerrarPadrao_ECF_Daruma' : {
		    $retorno = iCNFEncerrarPadrao_ECF_Daruma();
		};break;

		
	    case 'iCNFCancelar_ECF_Daruma' : {
		    $retorno = iCNFCancelar_ECF_Daruma();
		};break;

	    // }}} Fim Nao Fiscal
		


		// Inicio Gerencial {{{

	    case 'iRGAbrir_ECF_Daruma' : {
		    $nomeRG = $_POST['iRGAbrir_ECF_DarumaNomeRG'];
		    $retorno = iRGAbrir_ECF_Daruma($nomeRG);
		};break;

		
	    case 'iRGAbrirIndice_ECF_Daruma' : {
		    $indiceRG = $_POST['iRGAbrirIndice_ECF_DarumaIndiceRG'];
		    $retorno = iRGAbrirIndice_ECF_Daruma($indiceRG);
		};break;

		
	    case 'iRGAbrirPadrao_ECF_Daruma' : {
		    $retorno = iRGAbrirPadrao_ECF_Daruma();
		};break;

		
	    case 'iRGImprimirTexto_ECF_Daruma' : {
		    $texto = $_POST['iRGImprimirTexto_ECF_DarumaTexto'];
		    $retorno = iRGImprimirTexto_ECF_Daruma($texto);
		};break;

		
	    case 'iRGFechar_ECF_Daruma' : {
		    $retorno = iRGFechar_ECF_Daruma();
		};break;

	    // }}} Fim Gerencial
		
		
		
		// Inicio Bilhete Passagem
		
		case 'iCFBPAbrir_ECF_Daruma': {
		    $origem = $_POST['iCFBPAbrir_ECF_DarumaOrigem'];
		    $destino = $_POST['iCFBPAbrir_ECF_DarumaDestino'];
		    $uf = $_POST['iCFBPAbrir_ECF_DarumaUFDestino'];
			$percurso =	$_POST['iCFBPAbrir_ECF_DarumaPercurso'];
			$prestadora = $_POST['iCFBPAbrir_ECF_DarumaPrestadora'];
			$plataforma = $_POST['iCFBPAbrir_ECF_DarumaPlataforma'];
			$poltrona = $_POST['iCFBPAbrir_ECF_DarumaPoltrona'];
			$modalidade = $_POST['iCFBPAbrir_ECF_DarumaModalidade'];
			$categoria = $_POST['iCFBPAbrir_ECF_DarumaCategoria'];
			$data = $_POST['iCFBPAbrir_ECF_DarumaData'];
			$rg = $_POST['iCFBPAbrir_ECF_DarumaRG'];
			$nome = $_POST['iCFBPAbrir_ECF_DarumaNome'];
			$endereco = $_POST['iCFBPAbrir_ECF_DarumaEndereco'];			
		    $retorno = iCFBPAbrir_ECF_Daruma($origem, $destino, $uf, $percurso, $prestadora, $plataforma, $poltrona, $modalidade, $categoria, $data, $rg, $nome, $endereco);
		};break;
		
		
		case 'iCFBPVender_ECF_Daruma': {
		    $carga = $_POST['iCFBPVender_ECF_DarumaCargaTributaria'];
		    $preco = $_POST['iCFBPVender_ECF_DarumaPrecoUnitario'];
		    $tipo = $_POST['iCFBPVender_ECF_DarumaTipoDescAcres'];
			$valor = $_POST['iCFBPVender_ECF_DarumaValorDescAcres'];
			$descricao = $_POST['iCFBPVender_ECF_DarumaDescricaoItem'];
		    $retorno = iCFBPVender_ECF_Daruma($carga, $preco, $tipo, $valor, $descricao);
		};break;
		
		
		case 'confCFBPProgramarUF_ECF_Daruma': {
		    $uf = $_POST['confCFBPProgramarUF_ECF_DarumaUF'];
		    $retorno = confCFBPProgramarUF_ECF_Daruma($uf);
		};break;
		
		// Fim Bilhete Passagem
		
		
		
	    // Inicio Geral {{{

	    case 'iLeituraX_ECF_Daruma' : {
		    $retorno = iLeituraX_ECF_Daruma();
		};
		break;

		
	    case 'rLeituraX_ECF_Daruma' : {
		    $retorno = rLeituraX_ECF_Daruma();
		};
		break;

		
	    case 'rLeituraXCustomizada_ECF_Daruma' : {
		    $caminho =	$_POST['rLeituraXCustomizada_ECF_DarumaCaminho'];
		    $retorno = rLeituraXCustomizada_ECF_Daruma($caminho);
		};break;

		
	    case 'iSangria_ECF_Daruma' : {
		    $valor =	$_POST['iSangria_ECF_DarumaValor'];
		    $mensagem =	$_POST['iSangria_ECF_DarumaMensagem'];
		    $retorno = iSangria_ECF_Daruma($valor, $mensagem);
		};break;

		
	    case 'iSangriaPadrao_ECF_Daruma' : {
		    $retorno = iSangriaPadrao_ECF_Daruma();
		};break;

		
	    case 'iSuprimento_ECF_Daruma' : {
		    $valor = $_POST['iSuprimento_ECF_DarumaValor'];
		    $mensagem =	$_POST['iSuprimento_ECF_DarumaMensagem'];
		    $retorno = iSuprimento_ECF_Daruma($valor, $mensagem);
		};break;

		
	    case 'iSuprimentoPadrao_ECF_Daruma' : {
		    $retorno = iSuprimentoPadrao_ECF_Daruma();
		};break;

		
	    case 'iReducaoZ_ECF_Daruma': {
		    $data = $_POST['iReducaoZ_ECF_DarumaData'];
		    $hora = $_POST['iReducaoZ_ECF_DarumaHora'];
		    $retorno = iReducaoZ_ECF_Daruma($data, $hora);
		};break;
		
		
		case 'iMFLer_ECF_Daruma': {
		    $dataIni = $_POST['iMFLer_ECF_DarumaInicial'];
		    $dataFim = $_POST['iMFLer_ECF_DarumaFinal'];
		    $retorno = iMFLer_ECF_Daruma($dataIni, $dataFim);
		};break;

		
		case 'iMFLerSerial_ECF_Daruma': {
		    $dataIni = $_POST['iMFLerSerial_ECF_DarumaInicial'];
		    $dataFim = $_POST['iMFLerSerial_ECF_DarumaFinal'];
		    $retorno = iMFLerSerial_ECF_Daruma($dataIni, $dataFim);
		};break;
		
	    // }}} Fim Geral

	    
		// {{{ Inicio Programacao do ECF
		
		case 'confCadastrarPadrao_ECF_Daruma' : {
		    $cadastrar = $_POST['confCadastrarPadrao_ECF_DarumaCadastrar'];
		    $valor = $_POST['confCadastrarPadrao_ECF_DarumaValor'];
		    $retorno = confCadastrarPadrao_ECF_Daruma($cadastrar, $valor);
		};break;
		
		
	    case 'confCadastrar_ECF_Daruma' : {
		    $cadastrar = $_POST['confCadastrar_ECF_DarumaCadastrar'];
		    $valor = $_POST['confCadastrar_ECF_DarumaValor'];
		    $separador = $_POST['confCadastrar_ECF_DarumaSeparador'];
		    $retorno = confCadastrar_ECF_Daruma($cadastrar, $valor, $separador);
		};break;
		
		
		case 'confHabilitarHorarioVerao_ECF_Daruma' : {
		    $retorno = confHabilitarHorarioVerao_ECF_Daruma();
		};break;

		
		case 'confDesabilitarHorarioVerao_ECF_Daruma' : {
		    $retorno = confDesabilitarHorarioVerao_ECF_Daruma();
		};break;
		
		
		case 'confHabilitarModoPreVenda_ECF_Daruma' : {
		    $retorno = confHabilitarModoPreVenda_ECF_Daruma();
		};break;
		
		
		case 'confDesabilitarModoPreVenda_ECF_Daruma' : {
		    $retorno = confDesabilitarModoPreVenda_ECF_Daruma();
		};break;
		
		
		case 'confProgramarAvancoPapel_ECF_Daruma' : {
		    $seplinhas = $_POST['confProgramarAvancoPapel_ECF_DarumaSepLinhas'];
		    $sepdoc = $_POST['confProgramarAvancoPapel_ECF_DarumaSepDoc'];
		    $linhasgui = $_POST['confProgramarAvancoPapel_ECF_DarumaLinhasGui'];
			$guilhotina = $_POST['confProgramarAvancoPapel_ECF_DarumaGuilhotina'];
			$cliche = $_POST['confProgramarAvancoPapel_ECF_DarumaCliche'];
		    $retorno = confProgramarAvancoPapel_ECF_Daruma($seplinhas, $sepdoc, $linhasgui, $guilhotina, $cliche);
		};break;
		
		
		case 'confProgramarIDLoja_ECF_Daruma' : {
		    $valor = $_POST['confProgramarIDLoja_ECF_DarumaValor'];
		    $retorno = confProgramarIDLoja_ECF_Daruma($valor);
		};break;
	    
		
		case 'confProgramarOperador_ECF_Daruma' : {
		    $valor = $_POST['confProgramarOperador_ECF_DarumaValor'];
		    $retorno = confProgramarOperador_ECF_Daruma($valor);
		};break;
		
		// {{{ Termino Programacao do ECF

		
		
	    // Inicio Relatorios {{{

	    case 'rGerarRelatorio_ECF_Daruma' : {
		$relatorio  = $_POST['rGerarRelatorio_ECF_DarumaRelatorio'];
		$tipo	    = $_POST['rGerarRelatorio_ECF_DarumaTipo'];
		$inicial    = $_POST['rGerarRelatorio_ECF_DarumaInicial'];
		$final	    = $_POST['rGerarRelatorio_ECF_DarumaFinal'];
		$retorno = rGerarRelatorio_ECF_Daruma($relatorio, $tipo, $inicial, $final);

	    }; break;

	    case 'rEfetuarDownloadMFD_ECF_Daruma' : {
		$tipo	    = $_POST['rEfetuarDownloadMFD_ECF_DarumaTipo'];
		$inicial    = $_POST['rEfetuarDownloadMFD_ECF_DarumaIncial'];
		$final	    = $_POST['rEfetuarDownloadMFD_ECF_DarumaFinal'];
		$arquivo    = $_POST['rEfetuarDownloadMFD_ECF_DarumaArquivo'];
		$retorno = rEfetuarDownloadMFD_ECF_Daruma($tipo, $inicial, $final, $arquivo);

	    }; break;

	    case 'rLerAliquotas_ECF_Daruma': {
		    $retorno =	rLerAliquotas_ECF_Daruma($aliquota);
		    $retorno .=	"\nAliquota: " . $aliquota;
		};
		break;

	    case 'rLerMeiosPagto_ECF_Daruma': {
		    $retorno =	rLerMeiosPagto_ECF_Daruma(&$meios);
		    $retorno .=	"\nMeios Pagamento: " . $meios;
		};
		break;

	    case 'rLerRG_ECF_Daruma': {
		    $retorno =	rLerRG_ECF_Daruma(&$rg);
		    $retorno .=	"\nRG: " . $rg;
		};
		break;

	    case 'rLerDecimais_ECF_Daruma': {
		    $retorno =	rLerDecimais_ECF_Daruma(&$decimalQtd, &$decimalValor, &$pDecimalQtd, &$pDecimalValor);
		    $retorno .=	"\nDecimal qtd: " . $decimalQtd . "\nDecima valor: " . $decimalValor;
		    $retorno .=	"\nPDecimal qtd: " . $pDecimalQtd . "\npDecimal valor: " . $pDecimalValor;
		};
		break;

	    case 'rLerDecimaisInt_ECF_Daruma': {
		    $retorno =	rLerDecimaisInt_ECF_Daruma(&$pDecimalQtd, &$pDecimalValor);
		    $retorno .=	"\nPDecimal qtd: " . $pDecimalQtd . "\npDecimal valor: " . $pDecimalValor;
		};
		break;

	    case 'rLerDecimaisStr_ECF_Daruma': {
		    $retorno =	rLerDecimaisStr_ECF_Daruma(&$decimalQtd, &$decimalValor);
		    $retorno .=	"\nDecimal qtd: " . $decimalQtd . "\nDecima valor: " . $decimalValor;
		};
		break;

	    case 'rDataHoraImpressora_ECF_Daruma': {
		    $retorno =	rLerDecimaisStr_ECF_Daruma(&$data, &$hora);
		    $retorno .=	"\nData: " . $data . "\nHora: " . $hora;
		};
		break;

	    case 'rVerificarImpressoraLigada_ECF_Daruma': {
		    $retorno =	rVerificarImpressoraLigada_ECF_Daruma();
		};
		break;

	    case 'rStatusImpressora_ECF_Daruma' : {
		    $retorno =	rStatusImpressora_ECF_Daruma(&$status, &$pStatus);
		    $retorno .=	"\nStatus: " . $status . "\npStatus: " . $pStatus;
		};
		break;

	    case 'rStatusImpressoraStr_ECF_Daruma' : {
		    $retorno =	rStatusImpressoraStr_ECF_Daruma(&$status);
		    $retorno .=	"\nStatus: " . $status;
		};
		break;

	    case 'rStatusImpressoraInt_ECF_Daruma' : {
		    $retorno =	rStatusImpressoraInt_ECF_Daruma(&$pStatus);
		    $retorno .=	"\npStatus: " . $pStatus;
		};
		break;

	    case 'rInfoExtentida_ECF_Daruma' : {
		    $retorno =	$_POST['rInfoExtentida_ECF_DarumaNumero'];
		    $retorno =	rInfoExtentida_ECF_Daruma($numero, &$info);
		    $retorno .=	"\nInformacao Extendida: ". $info;
		};
		break;

	    case 'rInfoExtentida1_ECF_Daruma' : {
		    $retorno = rInfoExtentida1_ECF_Daruma(&$info);
		    $retorno .=	"\nInformacao Extendida: ". $info;
		};
		break;

	    case 'rInfoExtentida2_ECF_Daruma' : {
		    $retorno = rInfoExtentida2_ECF_Daruma(&$info);
		    $retorno .=	"\nInformacao Extendida: ". $info;
		};
		break;

	    case 'rInfoExtentida3_ECF_Daruma' : {
		    $retorno = rInfoExtentida3_ECF_Daruma(&$info);
		    $retorno .=	"\nInformacao Extendida: ". $info;
		};
		break;

	    case 'rInfoExtentida4_ECF_Daruma' : {
		    $retorno = rInfoExtentida4_ECF_Daruma(&$info);
		    $retorno .=	"\nInformacao Extendida: ". $info;
		};
		break;

	    case 'rInfoExtentida5_ECF_Daruma' : {
		    $retorno = rInfoExtentida5_ECF_Daruma(&$info);
		    $retorno .=	"\nInformacao Extendida: ". $info;
		};
		break;

	    case 'rVerificarReducaoZ_ECF_Daruma' : {
		    $retorno  =	rVerificarReducaoZ_ECF_Daruma(&$zpendente);
		    $retorno .=	"\nZ Pendente: " . $zpendente;
		};
		break;

	    case 'rStatusUltimoCmd_ECF_Daruma' : {
		    $retorno =	rStatusUltimoCmd_ECF_Daruma(&$erro, &$aviso, &$iErro, &$iAviso);
		    $retorno .=	"\nErro: " . $erro . "\nAviso: " . $aviso . "\nIerro: " . $iErro;
		    $retorno .=	"\nIaviso: " . $iAviso;
		};
		break;

	    case 'rStatusUltimoCmdInt_ECF_Daruma' : {
		    $retorno =	rStatusUltimoCmdInt_ECF_Daruma(&$iErro, &$iAviso);
		    $retorno .=	"\nIerro: " . $iErro . "\nIaviso: " . $iAviso;
		};
		break;

	    case 'rStatusUltimoCmdStr_ECF_Daruma' : {
		    $retorno =	rStatusUltimoCmdStr_ECF_Daruma(&$erro, &$aviso);
		    $retorno .=	"\nErro: " . $erro . "\nAviso: " . $aviso;
		};
		break;

	    case 'rRetornarInformacao_ECF_Daruma' : {
		    $indice =	$_POST['rRetornarInformacao_ECF_DarumaIndice'];
		    $retorno =	rRetornarInformacao_ECF_Daruma($indice, &$info);
		    $retorno .=	"\nInformacao: " . $info;
		};
		break;

	    case 'rRetornarNumeroSerie_ECF_Daruma' : {
		    $retorno =	rRetornarNumeroSerie_ECF_Daruma(&$numeroSerieCript, &$numeroSerie);
		    $retorno .=	"\nNumero Serie Criptografado: " . $numeroSerieCript;
		    $retorno .=	"\nNumero Serie: " . $numeroSerie;
		};
		break;

	    case 'rCarregarNumeroSerie_ECF_Daruma' : {
		    $retorno =	rCarregarNumeroSerie_ECF_Daruma(&$numeroSerie);
		    $retorno .=	"\nNumero Serie: " . $numeroSerie;
		};
		break;

	    case 'rRetornarDadosReducaoZ_ECF_Daruma' : {
		    $retorno =	rRetornarDadosReducaoZ_ECF_Daruma(&$dados);
		    $retorno .=	"\nDados: " . $dados;
		};
		break;

	    case 'rRegistrarNumeroSerie_ECF_Daruma' : {
		    $retorno = rRegistrarNumeroSerie_ECF_Daruma();
		};
		break;

	    case 'iEjetarCheque_ECF_Daruma' : {
		    $retorno = iEjetarCheque_ECF_Daruma();
		};
		break;

	    case 'iEstornarPagamento_ECF_Daruma' : {
		    $formaPagamentoEstornado =	$_POST['iEstornarPagamento_ECF_DarumaFormaPagamentoEstornado'];
		    $formaPagamentoEfetivado =	$_POST['iEstornarPagamento_ECF_DarumaFormaPagamentoEfetivado'];
		    $valor =			$_POST['iEstornarPagamento_ECF_DarumaValor'];
		    $informacao =		$_POST['iEstornarPagamento_ECF_DarumaInformacao'];

		    $retorno = iEstornarPagamento_ECF_Daruma($formaPagamentoEstornado, $formaPagamentoEfetivado, $valor, $informacao);
		};
		break;

	    case 'iAcionarGuilhotina_ECF_Daruma' : {
		    $tipoCorte = $_POST['iAcionarGuilhotina_ECF_DarumaTipoCorte'];

		    $retorno = iAcionarGuilhotina_ECF_Daruma($tipoCorte);
		};
		break;

	    // }}} Fim Relatorios

	    // Inicio Registro {{{

	    case 'regCCDDocOrigem_ECF_Daruma' : {
		    $param = $_POST['regCCDDocOrigem_ECF_DarumaParam'];
		    $retorno = regCCDDocOrigem_ECF_Daruma($param);
		};
		break;

	    case 'regCCDFormaPgto_ECF_Daruma' : {
		    $param = $_POST['regCCDFormaPgto_ECF_DarumaParam'];
		    $retorno = regCCDFormaPgto_ECF_Daruma($param);
		};
		break;


	    case 'regCCDLinhasTEF_ECF_Daruma' : {
		    $param = $_POST['regCCDLinhasTEF_ECF_DarumaParam'];
		    $retorno = regCCDLinhasTEF_ECF_Daruma($param);
		};
		break;

	    case 'regCCDParcelas_ECF_Daruma' : {
		    $param = $_POST['regCCDParcelas_ECF_DarumaParam'];
		    $retorno = regCCDParcelas_ECF_Daruma($param);
		};
		break;

	    case 'regCCDValor_ECF_Daruma' : {
		    $param = $_POST['regCCDValor_ECF_DarumaParam'];
		    $retorno = regCCDValor_ECF_Daruma($param);
		};
		break;

	    case 'regCFFormaPgto_ECF_Daruma' : {
		    $param = $_POST['regCFFormaPgto_ECF_DarumaParam'];
		    $retorno = regCFFormaPgto_ECF_Daruma($param);
		};
		break;

	    case 'regCFMensagemPromocional_ECF_Daruma' : {
		    $param = $_POST['regCFMensagemPromocional_ECF_DarumaParam'];
		    $retorno = regCFMensagemPromocional_ECF_Daruma($param);
		};
		break;

	    case 'regCFQuantidade_ECF_Daruma' : {
		    $param = $_POST['regCFQuantidade_ECF_DarumaParam'];
		    $retorno = regCFQuantidade_ECF_Daruma($param);
		};
		break;

	    case 'regCFTamanhoMinimoDescricao_ECF_Daruma' : {
		    $param = $_POST['regCFTamanhoMinimoDescricao_ECF_DarumaParam'];
		    $retorno = regCFTamanhoMinimoDescricao_ECF_Daruma($param);
		};
		break;

	    case 'regCFTipoDescAcresc_ECF_Daruma' : {
		    $param = $_POST['regCFTipoDescAcresc_ECF_DarumaParam'];
		    $retorno = regCFTipoDescAcresc_ECF_Daruma($param);
		};
		break;

	    case 'regCFUnidadeMedida_ECF_Daruma' : {
		    $param = $_POST['regCFUnidadeMedida_ECF_DarumaParam'];
		    $retorno = regCFUnidadeMedida_ECF_Daruma($param);
		};
		break;

	    case 'regCFValorDescAcresc_ECF_Daruma' : {
		    $param = $_POST['regCFValorDescAcresc_ECF_DarumaParam'];
		    $retorno = regCFValorDescAcresc_ECF_Daruma($param);
		};
		break;

	    case 'regCFCupomAdicional_ECF_Daruma' : {
		    $param = $_POST['regCFCupomAdicional_ECF_DarumaParam'];
		    $retorno = regCFCupomAdicional_ECF_Daruma($param);
		};
		break;

	    case 'regCFCupomAdicionalDllConfig_ECF_Daruma' : {
		    $param = $_POST['regCFCupomAdicionalDllConfig_ECF_DarumaParam'];
		    $retorno = regCFCupomAdicionalDllConfig_ECF_Daruma($param);
		};
		break;

	    case 'regCFCupomAdicionalDllTitulo_ECF_Daruma' : {
		    $param = $_POST['regCFCupomAdicionalDllTitulo_ECF_DarumaParam'];
		    $retorno = regCFCupomAdicionalDllTitulo_ECF_Daruma($param);
		};
		break;

	    case 'regChequeXLinha1_ECF_Daruma' : {
		    $param = $_POST['regChequeXLinha1_ECF_DarumaParam'];
		    $retorno = regChequeXLinha1_ECF_Daruma($param);
		};
		break;

	    case 'regChequeXLinha2_ECF_Daruma' : {
		    $param = $_POST['regChequeXLinha2_ECF_DarumaParam'];
		    $retorno = regChequeXLinha2_ECF_Daruma($param);
		};
		break;

	    case 'regChequeXLinha3_ECF_Daruma' : {
		    $param = $_POST['regChequeXLinha3_ECF_DarumaParam'];
		    $retorno = regChequeXLinha3_ECF_Daruma($param);
		};
		break;

	    #
	    case 'regChequeYLinha1_ECF_Daruma' : {
		    $param = $_POST['regChequeYLinha1_ECF_DarumaParam'];
		    $retorno = regChequeYLinha1_ECF_Daruma($param);
		};
		break;

	    case 'regChequeYLinha2_ECF_Daruma' : {
		    $param = $_POST['regChequeYLinha2_ECF_DarumaParam'];
		    $retorno = regChequeYLinha2_ECF_Daruma($param);
		};
		break;

	    case 'regChequeYLinha3_ECF_Daruma' : {
		    $param = $_POST['regChequeYLinha3_ECF_DarumaParam'];
		    $retorno = regChequeYLinha3_ECF_Daruma($param);
		};
		break;

	    case 'regCompatibilidadeStatusFuncao_ECF_Daruma' : {
		    $param = $_POST['regCompatibilidadeStatusFuncao_ECF_DarumaParam'];
		    $retorno = regCompatibilidadeStatusFuncao_ECF_Daruma($param);
		};
		break;

	    case 'regMaxFechamentoAutomatico_ECF_Daruma' : {
		    $param = $_POST['regMaxFechamentoAutomatico_ECF_DarumaParam'];
		    $retorno = regMaxFechamentoAutomatico_ECF_Daruma($param);
		};
		break;

	    // }}} Fim Registro

	    default : $retorno = "Metodo invalido!";
	}
?>


        <script type="text/javascript">

	<?php
		$retorno =  "\\nRetorno: " . $retorno ;
		$retorno .= "\\nErro: " . eRetornarAviso_ECF_Daruma();
		$retorno .= "\\nAviso: " . eRetornarErro_ECF_Daruma();
	?>

		alert("<?php echo $retorno; ?>");
		window.location = "./";
        </script>

    </body>
</html>
