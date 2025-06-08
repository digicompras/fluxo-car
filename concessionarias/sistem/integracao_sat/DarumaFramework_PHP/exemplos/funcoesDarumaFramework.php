<?php
/**
 * Daruma Developer Community
 * @modulo Exemplo PHP
 *
 *
 * Arquivo para ajudar os desenvolvedores PHP em suas IDEs.
 * Fornecendo o protótipo das funções, ajudando assim no auto-completar das funções.
 */

 /**
 * Início funções DarumaFramework
 *
 */
 
 /**
 * (PHP 5.3.1)
 * @param string $produto
 * @return int
 */
function eDefinirProduto_Daruma($produto) {};

/**
 * (PHP 5.3.1)
 * @param string $produto
 * @param string $chave
 * @param string $valor
 * @return int
 */
function regRetornaValorChave_DarumaFramework($produto, $chave, $valor) {};
 
/**
 * Início funções ECF
 *
 */

 /**
 * (PHP 5.3.1)
 * @return int
 */
function eBuscarPortaVelocidade_ECF_Daruma() {};

#regiao ECF_CUPOM_FISCAL

/**
 * (PHP 5.3.1)
 * @param string $CPF
 * @param string $nome
 * @param string $endereco
 * @return int
 */
function iCFAbrir_ECF_Daruma($cpf, $nome, $endereco){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCFAbrirPadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $cargaTributaria
 * @param string $quantidade
 * @param string $precoUnitario
 * @param string $tipoDescAcresc
 * @param string $valorDescAcresc
 * @param string $codigoItem
 * @param string $unidadeMedida
 * @param string $descricaoItem
 * @return int
 */
function iCFVender_ECF_Daruma($cargaTributaria, $quantidade, $precoUnitario, $tipoDescAcresc, $valorDescAcresc, $codigoItem, $unidadeMedida, $descricaoItem){};

/**
 * (PHP 5.3.1)
 * @param string $cargaTributaria
 * @param string $quantidade
 * @param string $precoUnitario
 * @param string $codigoItem
 * @param string $unidadeMedida
 * @param string $descricaoItem
 * @return int
 */
function iCFVenderSemDesc_ECF_Daruma($cargaTributaria, $quantidade, $precoUnitario, $codigoItem, $unidadeMedida, $descricaoItem){};

/**
 * (PHP 5.3.1)
 * @param string $cargaTributaria
 * @param string $precoUnitario
 * @param string $codigoItem
 * @param string $descricaoItem
 * @return int
 */
function iCFVenderResumido_ECF_Daruma($cargaTributaria, $precoUnitario, $codigoItem, $descricaoItem){};

/**
 * (PHP 5.3.1)
 * @param string $numeroItem
 * @param string $tipoDescAcresc
 * @param string $valorDescAcresc
 * @return int
 */
function iCFLancarAcrescimoItem_ECF_Daruma($numeroItem, $tipoDescAcresc, $valorDescAcresc){};

/**
 * (PHP 5.3.1)
 * @param string $numeroItem
 * @param string $tipoDescAcresc
 * @param string $valorDescAcresc
 * @return int
 */
function iCFLancarDescontoItem_ECF_Daruma($numeroItem, $tipoDescAcresc, $valorDescAcresc){};

/**
 * (PHP 5.3.1)
 * @param string $tipoDescAcresc
 * @param string $valorDescAcresc
 * @return int
 */
function iCFLancarAcrescimoUltimoItem_ECF_Daruma($tipoDescAcresc, $valorDescAcresc){};

/**
 * (PHP 5.3.1)
 * @param string $tipoDescAcresc
 * @param string $valorDescAcresc
 * @return int
 */
function iCFLancarDescontoUltimoItem_ECF_Daruma($tipoDescAcresc, $valorDescAcresc){};

/**
 * (PHP 5.3.1)
 * @param string $numeroItem
 * @return int
 */
function iCFCancelarItem_ECF_Daruma($numeroItem){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCFCancelarUltimoItem_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $numeroItem
 * @param string $quantidade
 * @return int
 */
function iCFCancelarItemParcial_ECF_Daruma($numeroItem, $quantidade){};

/**
 * (PHP 5.3.1)
 * @param string $quantidade
 * @return int
 */
function iCFCancelarUltimoItemParcial_ECF_Daruma($quantidade){};

/**
 * (PHP 5.3.1)
 * @param string $numeroItem
 * @return int
 */
function iCFCancelarDescontoItem_ECF_Daruma($numeroItem){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCFCancelarDescontoUltimoItem_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $numeroItem
 * @return int
 */
function iCFCancelarAcrescimoItem_ECF_Daruma($numeroItem){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCFCancelarAcrescimoUltimoItem_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $tipoDescAcresc
 * @param string $valorDescAcresc
 * @return int
 */
function iCFTotalizarCupom_ECF_Daruma($tipoDescAcresc, $valorDescAcresc){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCFTotalizarCupomPadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCFCancelarDescontoSubtotal_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCFCancelarAcrescimoSubtotal_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCFEfetuarPagamentoPadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $formaPagamento
 * @param string $valor
 * @return int
 */
function iCFEfetuarPagamentoFormatado_ECF_Daruma($formaPagamento, $valor){};

/**
 * (PHP 5.3.1)
 * @param string $formaPagamento
 * @param string $valor
 * @param string $infoAdicional
 * @return int
 */
function iCFEfetuarPagamento_ECF_Daruma($formaPagamento, $valor, $infoAdicional){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCFEncerrarPadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $mensagem
 * @return int
 */
function iCFEncerrarConfigMsg_ECF_Daruma($mensagem){};

/**
 * (PHP 5.3.1)
 * @param string $cupomAdicional
 * @param string $mensagem
 * @return int
 */
function iCFEncerrar_ECF_Daruma($cupomAdicional, $mensagem){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCFEmitirCupomAdicional_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCFCancelar_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $nome
 * @param string $endereco
 * @param string $documento
 * @return int
 */
function iCFIdentificarConsumidor_ECF_Daruma($nome, $endereco, $documento){};

 /**
  * (PHP 5.3.1)
  * @param string $formapagamento
  * @param string $formapagamentoefetiva
  * @param string @valor
  * @param string @mensagem
  * @return int
  */
function iEstornarPagamento_ECF_Daruma($formapagamento, $formapagamentoefetiva, $valor, $mensagem){}; 
  
#fim regiao ECF_CUPOM_FISCAL


#inicio regiao ECF_CREDITO_DEBITO
function iCCDAbrir_ECF_Daruma($formaPagamento, $parcelas, $docOrigem, $valor, $cpf, $nome,  $endereco){};

/**
 * (PHP 5.3.1)
 * @param string $formaPagamento
 * @param string $parcelas
 * @param string $docOrigem
 * @param string $valor
 * @return int
 */
function iCCDAbrirSimplificado_ECF_Daruma($formaPagamento, $parcelas, $docOrigem, $valor){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCCDAbrirPadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $texto
 * @return int
 */
function iCCDImprimirTexto_ECF_Daruma($texto){};

/**
 * (PHP 5.3.1)
 * @param string $arquivoOrigem
 * @return int
 */
function iCCDImprimirArquivo_ECF_Daruma($arquivoOrigem){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCCDFechar_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $coo
 * @param string $cpf
 * @param string $nome
 * @param string $endereco
 * @return int
 */
function iCCDEstornar_ECF_Daruma($coo, $cpf, $nome, $endereco){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCCDEstornarPadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCCDSegundaVia_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $arquivo
 * @param string $tempo
 * @param string $travar
 * @return int
 */
function eTEF_EsperarArquivo_ECF_Daruma($arquivo, $tempo, $travar){};

/**
 * (PHP 5.3.1)
 * @param string $tela
 * @return int
 */
function eTEF_SetarFoco_ECF_Daruma($tela){};

/**
 * (PHP 5.3.1)
 * @param string $travar
 * @return int
 */
function eTEF_TravarTeclado_ECF_Daruma($travar){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iTEF_Fechar_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $arquivo
 * @param string $travar
 * @return int
 */
function iTEF_ImprimirResposta_ECF_Daruma($arquivo, $travar){};

/**
 * (PHP 5.3.1)
 * @param string $arquivo
 * @param string $travar
 * @param string $forma
 * @param string $valor
 * @return int
 */
function iTEF_ImprimirRespostaCartao_ECF_Daruma($arquivo, $travar, $forma, $valor){};

#fim regiao ECF_CREDITO_DEBITO


#regiao ECF_COMPROVANTE_NAO_FISCAL

/**
 * (PHP 5.3.1)
 * @param string $numeroItem
 * @return int
 */
function iCNFCancelarItem_ECF_Daruma($numeroItem){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCNFCancelarUltimoItem_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $numeroItem
 * @return int
 */
function iCNFCancelarAcrescimoItem_ECF_Daruma($numeroItem){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCNFCancelarAcrescimoUltimoItem_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $numeroItem
 * @return int
 */
function iCNFCancelarDescontoItem_ECF_Daruma($numeroItem){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCNFCancelarDescontoUltimoItem_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $tipoDescAcresc
 * @param string $valorDescAcresc
 * @return int
 */
function iCNFTotalizarComprovante_ECF_Daruma($tipoDescAcresc, $valorDescAcresc){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCNFTotalizarComprovantePadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCNFCancelarAcrescimoSubtotal_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCNFCancelarDescontoSubtotal_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $formaPagamento
 * @param string $valor
 * @param string $infoAdicional
 * @return int
 */
function iCNFEfetuarPagamento_ECF_Daruma($formaPagamento, $valor, $infoAdicional){};

/**
 * (PHP 5.3.1)
 * @param string $formaPagamento
 * @param string $valor
 * @return int
 */
function iCNFEfetuarPagamentoFormatado_ECF_Daruma($formaPagamento, $valor){};

/**
 * (PHP 5.3.1)
 * @param string $formaPagamento
 * @param string $valor
 * @return int
 */
function iCNFEfetuarPgtoFormatado_ECF($formaPagamento, $valor){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCNFEfetuarPagamentoPadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $mensagem
 * @return int
 */
function iCNFEncerrar_ECF_Daruma($mensagem){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCNFEncerrarPadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCNFCancelar_ECF_Daruma(){};

#fim regiao ECF_COMPROVANTE_NAO_FISCAL

#regiao ECF_RELATORIO_GERENCIAL

/**
 * (PHP 5.3.1)
 * @param string $nomeRG
 * @return int
 */
function iRGAbrir_ECF_Daruma($nomeRG){};

/**
 * (PHP 5.3.1)
 * @param string $indiceRG
 * @return int
 */
function iRGAbrirIndice_ECF_Daruma($indiceRG){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iRGAbrirPadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $texto
 * @return int
 */
function iRGImprimirTexto_ECF_Daruma($texto){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iRGFechar_ECF_Daruma(){};

#fim regiao ECF_RELATORIO_GERENCIAL

#inicio regiao ECF_BILHETE_PASSAGEM

/**
 * (PHP 5.3.1)
 * @param string $origem
 * @param string $destino
 * @param string $uf
 * @param string $percurso
 * @param string $prestadora
 * @param string $plataforma
 * @param string $poltrona
 * @param string $modalidade
 * @param string $categoria
 * @param string $data
 * @param string $rg
 * @param string $nome
 * @param string $endereco
 * @return int
 */
function iCFBPAbrir_ECF_Daruma($origem, $destino, $uf, $percurso, $prestadora, $plataforma, $poltrona, $modalidade, $categoria, $data, $rg, $nome, $endereco){};

/**
 * (PHP 5.3.1)
 * @param string $carga
 * @param string $preco
 * @param string $tipo
 * @param string $valor
 * @param string $descricao
 * @return int
 */
function iCFBPVender_ECF_Daruma($carga, $preco, $tipo, $valor, $descricao){};

/**
 * (PHP 5.3.1)
 * @param string $uf
 * @return int
 */
function confCFBPProgramarUF_ECF_Daruma($uf){};

#fim regiao ECF_BILHETE_PASSAGEM

#regiao ECF_FUNCOES_GERAIS

/**
 * (PHP 5.3.1)
 * @return int
 */
function iLeituraX_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function rLeituraX_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $caminho
 * @return int
 */
function rLeituraXCustomizada_ECF_Daruma($caminho){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @param string $mensagem
 * @return int
 */
function iSangria_ECF_Daruma($valor, $mensagem){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iSangriaPadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @param string $mensagem
 * @return int
 */
function iSuprimento_ECF_Daruma($valor, $mensagem){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iSuprimentoPadrao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $data
 * @param string $hora
 * @return int
 */
function iReducaoZ_ECF_Daruma($data, $hora){};

/**
 * (PHP 5.3.1)
 * @param string $dataIni
 * @param string $dataFim
 * @return int
 */
function iMFLer_ECF_Daruma($dataIni, $dataFim){};

/**
 * (PHP 5.3.1)
 * @param string $dataIni
 * @param string $dataFim
 * @return int
 */
function iMFLerSerial_ECF_Daruma($dataIni, $dataFim){};

#fim regiao ECF_FUNCOES_GERAIS

#inicio regiao ECF_PROGRAMACAO_ECF

/**
 * (PHP 5.3.1)
 * @param string $cadastrar
 * @param string $valor
 * @return int
 */
function confCadastrarPadrao_ECF_Daruma($cadastrar, $valor){};

/**
 * (PHP 5.3.1)
 * @param string $cadastrar
 * @param string $valor
 * @param string $separador
 * @return int
 */
function confCadastrar_ECF_Daruma($cadastrar, $valor, $separador){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function confHabilitarHorarioVerao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function confDesabilitarHorarioVerao_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function confHabilitarModoPreVenda_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function confDesabilitarModoPreVenda_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $seplinhas
 * @param string $sepdoc
 * @param string $linhasgui
 * @param string $guilhotina
 * @param string $cliche
 * @return int
 */
function confProgramarAvancoPapel_ECF_Daruma($seplinhas, $sepdoc, $linhasgui, $guilhotina, $cliche){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function confProgramarIDLoja_ECF_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function confProgramarOperador_ECF_Daruma($valor){};

#fim regiao ECF_PROGRAMACAO_ECF


#regiao ECF_RELATORIOS

/**
 * (PHP 5.3.1)
 * @param string $relatorio
 * @param string $tipo
 * @param string $inicial
 * @param string $final
 * @return int
 */
function rGerarRelatorio_ECF_Daruma($relatorio, $tipo, $inicial, $final){};

/**
 * (PHP 5.3.1)
 * @param string $tipo
 * @param string $inicial
 * @param string $final
 * @param string $arquivo
 * @return int
 */
function rEfetuarDownloadMFD_ECF_Daruma($tipo, $inicial, $final, $arquivo){};

/**
 * (PHP 5.3.1)
 * @param mixed $aliquotas
 * @return int
 */
function rLerAliquotas_ECF_Daruma(&$aliquotas){};

/**
 * (PHP 5.3.1)
 * @param mixed $relatorios
 * @return int
 */
function rLerMeiosPagto_ECF_Daruma(&$relatorios){};

/**
 * (PHP 5.3.1)
 * @param mixed $rg_cpf
 * @return int
 */
function rLerRG_ECF_Daruma(&$rg_cpf){};

/**
 * (PHP 5.3.1)
 * @param mixed $decimalQuantidade
 * @param mixed $decimalValor
 * @param mixed $piDecimalQuantidade
 * @param mixed $piDecimalValor
 * @return int
 */
function rLerDecimais_ECF_Daruma(&$decimalQuantidade, &$decimalValor, &$piDecimalQuantidade, &$piDecimalValor){};

/**
 * (PHP 5.3.1)
 * @param mixed $piDecimalQuantidade
 * @param mixed $piDecimalValor
 * @return int
 */
function rLerDecimaisInt_ECF_Daruma(&$piDecimalQuantidade, &$piDecimalValor){};

/**
 * (PHP 5.3.1)
 * @param mixed $decimalQuantidade
 * @param mixed $decimalValor
 * @return int
 */
function rLerDecimaisStr_ECF_Daruma(&$decimalQuantidade,  &$decimalValor){};

/**
 * (PHP 5.3.1)
 * @param mixed $data
 * @param mixed $hora
 * @return int
 */
function rDataHoraImpressora_ECF_Daruma(&$data, &$hora){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function rVerificarImpressoraLigada_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param mixed $status
 * @param mixed $piStatusEcf
 * @return int
 */
function rStatusImpressora_ECF_Daruma(&$status, &$piStatusEcf){};

/**
 * (PHP 5.3.1)
 * @param mixed $status
 * @return int
 */
function rStatusImpressoraStr_ECF_Daruma(&$status){};

/**
 * (PHP 5.3.1)
 * @param mixed $piStatusEcf
 * @return int
 */
function rStatusImpressoraInt_ECF_Daruma(&$piStatusEcf){};

/**
 * (PHP 5.3.1)
 * @param int $numero
 * @param mixed $informacao
 * @return int
 */
function rInfoExtentida_ECF_Daruma($numero, &$informacao){};

/**
 * (PHP 5.3.1)
 * @param mixed $informacao
 * @return int
 */
function rInfoExtentida1_ECF_Daruma(&$informacao){};

/**
 * (PHP 5.3.1)
 * @param mixed $informacao
 * @return int
 */
function rInfoExtentida2_ECF_Daruma(&$informacao){};

/**
 * (PHP 5.3.1)
 * @param mixed $informacao
 * @return int
 */
function rInfoExtentida3_ECF_Daruma(&$informacao){};

/**
 * (PHP 5.3.1)
 * @param mixed $informacao
 * @return int
 */
function rInfoExtentida4_ECF_Daruma(&$informacao){};

/**
 * (PHP 5.3.1)
 * @param mixed $informacao
 * @return int
 */
function rInfoExtentida5_ECF_Daruma(&$informacao){};

/**
 * (PHP 5.3.1)
 * @param mixed $zPendente
 * @return int
 */
function rVerificarReducaoZ_ECF_Daruma(&$zPendente){};

/**
 * (PHP 5.3.1)
 * @param mixed $erro
 * @param mixed $aviso
 * @param mixed $piErro
 * @param mixed $piAviso
 * @return int
 */
function rStatusUltimoCmd_ECF_Daruma(&$erro, &$aviso, &$piErro, &$piAviso){};

/**
 * (PHP 5.3.1)
 * @param mixed $piErro
 * @param mixed $piAviso
 * @return int
 */
function rStatusUltimoCmdInt_ECF_Daruma(&$piErro, &$piAviso){};

/**
 * (PHP 5.3.1)
 * @param mixed $erro
 * @param mixed $aviso
 * @return int
 */
function rStatusUltimoCmdStr_ECF_Daruma(&$erro, &$aviso){};

/**
 * (PHP 5.3.1)
 * @param string $indice
 * @param mixed $informacao
 * @return int
 */
function rRetornarInformacao_ECF_Daruma($indice, &$informacao){};

/**
 * (PHP 5.3.1)
 * @param mixed $serialCriptografado
 * @param mixed $serial
 * @return int
 */
function rRetornarNumeroSerie_ECF_Daruma(&$serialCriptografado, &$serial){};

/**
 * (PHP 5.3.1)
 * @param mixed $serial
 * @return int
 */
function rCarregarNumeroSerie_ECF_Daruma(&$serial){};

/**
 * (PHP 5.3.1)
 * @param mixed $dados
 * @return int
 */
function rRetornarDadosReducaoZ_ECF_Daruma(&$dados){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function rRegistrarNumeroSerie_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iEjetarCheque_ECF_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $formaPagamentoEstornado
 * @param string $formaPagamentoEfetivado
 * @param string $valor
 * @param string $infoAdicional
 * @return int
 */
function iEstornarPagamento_ECF_Daruma($formaPagamentoEstornado, $formaPagamentoEfetivado, $valor, $infoAdicional){};

/**
 * (PHP 5.3.1)
 * @param string $tipoCorte
 * @return int
 */
function iAcionarGuilhotina_ECF_Daruma($tipoCorte){};

#fim regiao ECF_RELATORIOS

#regiao ECF_REGISTRO

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCCDDocOrigem_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCCDFormaPgto_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCCDLinhasTEF_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCCDParcelas_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCCDValor_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCFFormaPgto_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCFMensagemPromocional_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCFQuantidade_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCFTamanhoMinimoDescricao_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCFTipoDescAcresc_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCFUnidadeMedida_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCFValorDescAcresc_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCFCupomAdicional_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCFCupomAdicionalDllConfig_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regCFCupomAdicionalDllTitulo_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regChequeXLinha1_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regChequeXLinha2_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regChequeXLinha3_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regChequeYLinha1_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regChequeYLinha2_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regChequeYLinha3_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */

function regCompatibilidadeStatusFuncao_ECF_Daruma($param){};

/**
 * (PHP 5.3.1)
 * @param string $param
 * @return int
 */
function regMaxFechamentoAutomatico_ECF_Daruma($param){};

#fim regiao ECF_REGISTRO


/**
 * Término funções ECF
 *
 */



/**
 * Início funções DUAL
 *
 */

 

/**
 * (PHP 5.3.1)
 * @return int
 */
function iAcionarGaveta_DUAL_DarumaFramework() {};

/**
 * (PHP 5.3.1)
 * @param string $documento
 * @param string $local
 * @param string $timeout
 * @return int
 */
function iAutenticarDocumento_DUAL_DarumaFramework($documento, $local, $timeout) {};

/**
 * (PHP 5.3.1)
 * @param string $arquivo
 * @return int
 */
function iImprimirArquivo_DUAL_DarumaFramework($arquivo) {};

/**
 * (PHP 5.3.1)
 * @param string $texto
 * @param int $tamanhoTexto
 * @return int
 */
function iImprimirTexto_DUAL_DarumaFramework($texto, $tamahoTexto) {};

/**
 * (PHP 5.3.1)
 * @param int $habilitar
 * @param int $quantidadeLinha
 * @return int
 */
function iConfigurarGuilhotina_DUAL_DarumaFramework($habilitar, $quantidadeLinha) {};

/**
 * (PHP 5.3.1)
 * @param string $arquivoOrigem
 * @return int
 */
function iEnviarBMP_DUAL_DarumaFramework($arquivoOrigem) {};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iLimparBuffer_DUAL_DarumaFramework() {};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iReinicializar_DUAL_DarumaFramework() {};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regAguardarProcesso_DUAL_DarumaFramework($valor) {};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regCodePageAutomatico_DUAL_DarumaFramework($valor) {};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regEnterFinal_DUAL_DarumaFramework($valor) {};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regInicializou_DUAL_DarumaFramework($valor) {};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regLinhasGuilhotina_DUAL_DarumaFramework($valor) {};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regModoGaveta_DUAL_DarumaFramework($valor) {};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regPortaComunicacao_DUAL_DarumaFramework($valor) {};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regTabulacao_DUAL_DarumaFramework($valor) {};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regTermica_DUAL_DarumaFramework($valor) {};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regVelocidade_DUAL_DarumaFramework($valor) {};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regZeroCortado_DUAL_DarumaFramework($valor) {};

/**
 * (PHP 5.3.1)
 * @return int
 */
function rStatusDocumento_DUAL_DarumaFramework() {};

/**
 * (PHP 5.3.1)
 * @param mixed $gavetaStatus
 * @return int
 */
function rStatusGaveta_DUAL_DarumaFramework(&$gavetaStatus) {};

/**
 * (PHP 5.3.1)
 * @return int
 */
function rStatusImpressora_DUAL_DarumaFramework() {};

/**
 * (PHP 5.3.1)
 * @return int
 */
function rStatusGuilhotina_DUAL_DarumaFramework() {};

/**
 * Término funções DUAL
 *
 */


 
 
 
 
 
 
 
 
 
 
/**
 * Início funções MODEM
 *
 */
 
/**
 * (PHP 5.3.1)
 * @return int
 */
function eReiniciar_MODEM_DarumaFramework(){};
 
 
 /**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regTempoAlertar_MODEM_DarumaFramework($valor){};
 
/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regLerApagar_MODEM_DarumaFramework($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regPorta_MODEM_DarumaFramework($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regThread_MODEM_DarumaFramework($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regVelocidade_MODEM_DarumaFramework($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regCaptionWinAPP_MODEM_DarumaFramework($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regBandejaInicio_MODEM_DarumaFramework($valor){};
 
 
 
/**
 * (PHP 5.3.1)
 * @param string $indice
 * @return int
 */
function eApagarSms_MODEM_DarumaFramework($indice){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function eInicializar_MODEM_DarumaFramework(){}; 

/**
 * (PHP 5.3.1)
 * @return int
 */
function eTrocarBandeja_MODEM_DarumaFramework(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function eBuscarPortaVelocidade_MODEM_DarumaFramework(){};
 
 
/**
 * (PHP 5.3.1)
 * @param string $telefone
 * @param string $mensagem
 * @return int
 */
function tEnviarSms_MODEM_DarumaFramework($telefone, $mensagem){};

/**
 * (PHP 5.3.1)
 * @param string $telefone
 * @param string $mensagem
 * @param string $bandeja
 * @return int
 */
function tEnviarSmsOperadora_MODEM_DarumaFramework($telefone, $mensagem, $bandeja){};


/**
 * (PHP 5.3.1)
 * @param mixed $indice
 * @param mixed $mensagem
 * @param mixed $data
 * @param mixed $hora
 * @param mixed $remetente
 * @return int
 */
function rReceberSms_MODEM_DarumaFramework($indice, $mensagem, $data, $hora, $remetente){};

/**
 * (PHP 5.3.1)
 * @param mixed $indice
 * @param mixed $mensagem
 * @param mixed $data
 * @param mixed $hora
 * @param mixed $remetente
 * @return int
 */
function rReceberSmsIndice_MODEM_DarumaFramework($indice, $mensagem, $data, $hora, $remetente){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function rListarSms_MODEM_DarumaFramework(){};

/**
 * (PHP 5.3.1)
 * @param mixed $imei
 * @return int
 */
function rRetornarImei_MODEM_DarumaFramework($imei){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function rNivelSinalRecebido_MODEM_DarumaFramework(){};

/**
 * (PHP 5.3.1)
 * @param string $operadora
 * @return int
 */
function rRetornarOperadora_MODEM_DarumaFramework($operadora){};

/**
 * (PHP 5.3.1)
 * @param mixed $info
 * @return int
 */
function rInfoEstendida_MODEM_DarumaFramework($info){};


/**
 * (PHP 5.3.1)
 * @return int
 */
function eAtivarConexaoCsd_MODEM_DarumaFramework(){};

/**
 * (PHP 5.3.1)
 * @param string $telefone
 * @return int
 */
function eRealizarChamadaCsd_MODEM_DarumaFramework($telefone){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function eFinalizarChamadaCsd_MODEM_DarumaFramework(){};

/**
 * (PHP 5.3.1)
 * @param string $dados
 * @return int
 */
function tEnviarDadosCsd_MODEM_DarumaFramework($dados){};

/**
 * (PHP 5.3.1)
 * @param mixed $resposta
 * @return int
 */
function rReceberDadosCsd_MODEM_DarumaFramework($resposta){};

/**
 * Término funções MODEM
 *
 */

 
 
 
 
 
 
 
 
 
 
 
 
 
/**
 * Início funções TA2000
 *
 */

/**
 * (PHP 5.3.1)
 * @param mixed $retorno
 * @param string $numeroCampo
 * @return int
 */
function eAtivarCampo_TA2000_Daruma(&$retorno, $numeroCampo){};

/**
 * (PHP 5.3.1)
 * @param string $shutdown
 * @return int
 */
function fnEncerrar_TA2000_Daruma($shutdown){};

/**
 * (PHP 5.3.1)
 * @param string $valorAtual
 * @param int $tipoDado
 * @param int $linha
 * @param int $coluna
 * @param string $tamanhoDisplay
 * @return int
 */
function iAdicionarCampo_TA2000_Daruma($valorAtual, $tipoDado, $linha, $coluna, $tamanhoDisplay){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iApagarCaracter_TA2000_Daruma(){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iCarriageReturn_TA2000_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param char byte
 * @return int
 */
function icomEnviarByte_TA2000_Daruma($byte){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iDesabilitarCursor_TA2000_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param string $eco
 * @param int $tipoDados
 * @param int $tamanhoParametros
 * @param int $ESC
 * @param int $linhaParametro
 * @param int $colunaParametro
 * @param string $bufferInputDisplay
 * @return int
 */
function iEntrarDadosDisplay_TA2000_Daruma($eco, $tipoDados,$tamanhoParametros, $ESC, $linhaParametro, $colunaParametro, $bufferInputDisplay){};

/**
 * (PHP 5.3.1)
 * @param string $bufferXML
 * @param mixed $retorno
 * @return int
 */
function iEnviarDadosFormatados_TA2000_Daruma($bufferXML, &$retorno){};

/**
 * (PHP 5.3.1)
 * @param string $bufferDisplay
 * @param int $linha
 * @param int $coluna
 * @return int
 */
function iImprimirDisplay_TA2000_Daruma($bufferDisplay, $linha, $coluna){};

/**
 * (PHP 5.3.1)
 * @return int
 */
function iLimparDisplay_TA2000_Daruma(){};

/**
 * (PHP 5.3.1)
 * @param int $linha
 * @return int
 */
function iLimparDisplayLinha_TA2000_Daruma($linha){};

/**
 * (PHP 5.3.1)
 * @param int $linha
 * @param int $coluna
 * @return int
 */
function iPosicionarCursor_TA2000_Daruma($linha, $coluna){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regADLinha_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regAELinha_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regAuditoria_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regCLinha_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regEdicaoColuna_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regEdicaoEco_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regEdicaoESC_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regEdicaoLinha_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regEdicaoTamanho_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regEdicaoTipo_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regImprimirColuna_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regImprimirLinha_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regMarcadorOpcao_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regMascara_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regMascaraEco_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regMascaraLetra_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regMascaraNumero_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regMensagemBoasVindasLinha1_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regMensagemBoasVindasLinha2_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regMenuDirecao_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regMenuESC_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regMenuEstilo_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regPorta_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regPosColuna_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param string $valor
 * @return int
 */
function regPosLinha_TA2000_Daruma($valor){};

/**
 * (PHP 5.3.1)
 * @param int $numeroCampo
 * @param mixed $retorno
 * @return int
 */
function rLerValorCampoString_TA2000_Daruma($numeroCampo, &$retorno){};

/**
 * (PHP 5.3.1)
 * @param int $combo
 * @param mixed $retorno
 * @return int
 */
function rLerValorOpcaoCombo_TA2000_Daruma($combo, &$retorno){};


/**
 * (PHP 5.3.1)
 * @param int $numeroCombo
 * @param string $dado
 * @param mixed $retorno
 * @return int
 */
function rLerDadoCombo_TA2000_Daruma($numeroCombo, $dado, &$retorno){};

/**
 * (PHP 5.3.1)
 * @param int $numeroCampo
 * @param string $dado
 * @param mixed $retorno
 * @return int
 */
function rLerDadoCampo_TA2000_Daruma($numeroCampo, $dado, &$retorno){};

/*DarumaFramework_API iAdicionarCampo_TA2000_Daruma(char *pszValorAtual,
                                                  int iTipoDado,
                                                  int iLinha,
                                                  int iColuna,
                                                  int iTamDisplay);
DarumaFramework_API iAdicionarCampo_TA2000(char *pszValorAtual,
											  int iTipoDado,
											  int iLinha,
											  int iColuna,
											  int iTamDisplay);
DarumaFramework_API eAtivarCampo_TA2000_Daruma(char *pszRetorno, int iNumCampo);
DarumaFramework_API eAtivarCampo_TA2000(char *pszRetorno, int iNumCampo);
DarumaFramework_API rLerValorCampoString_TA2000_Daruma(int iNumeroCampo, char *pszRetorno);
DarumaFramework_API rLerValorCampoString_TA2000(int iNumeroCampo, char *pszRetorno);
DarumaFramework_API rLerValorOpcaoCombo_TA2000_Daruma(int iCombo, char *pszRetorno);
DarumaFramework_API rLerValorOpcaoCombo_TA2000(int iCombo, char *pszRetorno);
 */

/**
 * Término funções TA2000
 *
 */


?>
