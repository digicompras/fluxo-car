<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');
?>

<html>
<head>
<title>EMISS&Atilde;O DE OR&Ccedil;AMENTOS DE CLIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.style3 {font-size: 10px}
.style31 {font-size: 12px}
.style5 {font-size: 15px;
	font-weight: bold;
}
</style>
</head>
<?

require '../../../conect/conect.php';

$codigo_orcamento = $_POST['codigo_orcamento'];
	
	
$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$db = $linha[1];
}

			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("ffffff"); ?>"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 
  
<? } ?>



<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>

  <?

$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento'";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo_orcamento = $linha[0];
	
$dataabertura = $linha[5];
$horaabertura = $linha[6];
$diaabertura = $linha[7];
$mesabertura = $linha[8];
$anoabertura = $linha[9];
$loja = $linha[43];
$cnpj = $linha[44];
$total_geral = $linha[40];
$quantparc = $linha[8];
$modopagto = $linha[10];
$obs_orcamento = $linha[11];

$operador = $linha[4];
$condicao = $linha[42];
$status = $linha[2];
$num_fatura = $linha[48];
$status_fatura = $linha[49];
$data_fatura = $linha[58];
$dia_fatura = $linha[55];
$mes_fatura = $linha[56];
$ano_fatura = $linha[57];
$hora_fatura = $linha[59];

$codigo_cliente = $linha[45];
$cpf = $linha[47];
$nome = $linha[46];

$cartao = $linha[28];
$valorparcela = $linha[29];
	
$datafechamento = $linha[30];
$horafechamento = $linha[31];

$entrada = $linha[35];
$custo_com_cartao = $linha[36];

$desconto_de_arredondamento = $linha[37];
$acrescimo_de_arredondamento = $linha[38];

$num_orcamento_bloco = $linha[40];


$justificativa_gravada = $linha[41];
$admgeral_cancelou = $linha[42];
$estab_pertence = $linha[43];
$date_cancelamento = $linha[44];
$hora_cancelamento = $linha[45];


}
	
$sql7 = "SELECT * FROM faturamento_futuro where num_fatura = '$num_fatura' limit 1";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_contas_a_receber = mysql_num_rows($res7);
	
$valor_entrada = $linha[17];
	$quantparc = $linha[18];
	$modopagto = $linha[19];
	$valorparcela = $linha[20];
	$saldo_a_parcelar = $linha[57];
}


if($status == "CANCELADO"){


echo "<script>

alert('ATENÇÃO!!!... ESSE PEDIDO FOI CANCELADO POR $admgeral_cancelou da empresa $estab_pertence_cancelou em $date_cancelamento as $hora_cancelamento');


</script>";


}


?>
  <p>
  <?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;

while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];
$celular_op = $linha[19];
$email_op = $linha[20];
$estabelecimento_op = $linha[24];
$cidade_estabelecimento_op = $linha[25];
$tel_estabelecimento_op = $linha[26];
$email_estabelecimento_op = $linha[27];
$estab_pertence_op = $linha[44];
	$estab_pertence = $linha[44];
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];

}
?>
<?
$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$razaosocial = $linha[1];
$nfantasia = $linha[2];
$endereco = $linha[5];
$numero = $linha[6];
$bairro = $linha[7];
$cep = $linha[9];
$cidade = $linha[10];
$estado = $linha[11];
$telefone = $linha[12];
$email_empresa = $linha[14];
$site = $linha[15];

}
?>
</p>
<form name="form1" method="post" action="grava_orcamento.php">
<p>&nbsp;</p>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">
      <table width="100%" border="0" bordercolor="#000000">
        <tr>
          <td width="7%">
              <div align="left">
                <?


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

//printf("<a href='index.php' target='_top'><img src='../../imagens/$linha[1]' border='0'  width='250' ></a>"); 
} ?>
                </div></td>
          <td width="93%"><div align="center"><strong><font size="2"><? echo $razaosocial; ?> - <? echo $nfantasia; ?><br>
            END: <? echo $endereco; ?> n&ordm; <? echo $numero; ?>, bairro <? echo $bairro; ?>, em <? echo $cidade; ?> estado de <? echo $estado; ?><br> Fone/Whats: <? echo $telefone; ?>
            <br>
          </font></strong></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
<table width="100%" border="1" bordercolor="#000000">
  <tr>
    <td width="75%"><div align="center"><strong><font color="#0000FF" size="2"><? echo $condicao; ?> </font></strong><strong>N&ordm; <? echo "$codigo_orcamento N&ordm; Fatura $num_fatura"; ?></strong></div></td>
    <td width="25%"><div align="center"><span class="style5">Total
      <? echo "R$ ".$total_geral; ?> </span></div></td>
  </tr>
</table>
<table width="100%" border="1" bordercolor="#000000">
  <tr>
    <td><table width="100%" border="0" cellspacing="4">
      
      <tr>
        <td width="7%"><strong><font size="2">C&oacute;digo:</font></strong></td>
        <td colspan="3"><strong><font color="#0000FF" size="2"><? echo $codigo_orcamento; ?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
        </font></strong></td>
        <td width="11%"><strong><font size="2">Data Or&ccedil;amento:</font></strong></td>
        <td width="11%"><strong><font color="#0000FF" size="2"><? echo $dataabertura; ?> - <? echo $horaabertura; ?></font></strong></td>
        <td width="25%" rowspan="3" align="center" valign="top"><table width="100%" border="0">
          <tr>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><strong><font size="2">Cliente:</font></strong></td>
        <td width="26%"><strong><font color="#0000FF" size="2"><? echo $loja; ?></font></strong></td>
        <td width="5%">CNPJ:</td>
        <td width="15%"><strong><font color="#0000FF" size="2"><? echo $cnpj; ?></font></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Nome:</td>
        <td><strong><font color="#0000FF" size="2"><? echo $nome; ?></font></strong></td>
        <td>CPF:</td>
        <td><strong><font color="#0000FF" size="2"><? echo $cpf; ?></font></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      </table></td>
</tr>
</table>
<table width="100%"  border="0">
  <tr bgcolor="#ffffff">
    <td><div align="center" class="style3">Codigo Produto</div></td>
    <td class="style3"><div align="center">Nome Produto</div></td>
    <td class="style3"><div align="center">Quant</div></td>
    <td class="style3"><div align="center">Categoria</div></td>
    <td class="style3"><div align="center">Pre&ccedil;o Compra</div></td>
    <td><div align="center" class="style3">MC</div></td>
    <td><div align="center" class="style3">Pre&ccedil;o Venda</div></td>
    <td class="style3"><div align="center">Oferta</div></td>
    <td class="style3"><div align="center">Pre&ccedil;o Oferta</div></td>
    <td><div align="center" class="style3">Impostos</div></td>
    <td><div align="center" class="style3">Desconto Monetario</div></td>
    <td><div align="center"><span class="style3">Total Produto</span></div></td>
    <td><div align="center" class="style3">Ganho p/ produto</div></td>
  </tr>
  <?
			  
//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and num_bordero = '' and prazo_final between '$data_inicio_busca' and '$data_atual' order by num_proposta asc";

$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$precocompra = $linha[20];
$quant = $linha[21];
$preco = $linha[22];


$acrescimo = $linha[23];
$acrescimodecimal = $linha[24];
$acrescimomonetario = $linha[25];
$total = $linha[29];

$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];


$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];

$oferta = $linha[91];
$preco_oferta = $linha[92];

$margem_lucro = $linha[96];
$margem_lucro_informada = $linha[97];
$impostos = $linha[98];
$impostos_informado = $linha[99];
$margem_folga = $linha[100];
$margem_folga_decimal = $linha[101];

$impostos_compra = $linha[102];
$impostos_compra_decimal = $linha[103];
$impostos_compra_decimal2 = $linha[104];




?>

<?

$total_produtos_comprados = bcmul($precocompra,$quant,2);


if($oferta=="Sim"){
	
$sub_totalprodutos = bcmul($quant,$preco_oferta,2);

$totalprodutos = bcsub($sub_totalprodutos,$descontosconcedidos,2);
	
}
else{
	
$sub_totalprodutos = bcmul($quant,$preco,2);

$totalprodutos = bcsub($sub_totalprodutos,$descontosconcedidos,2);
	
	
}





$subtotaldedescontos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);
$descontosconcedidos = bcadd($descontomonetarioetapa3,$subtotaldedescontos,2);


$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$calculando_impostos = 	bcmul($totalprodutos,$impostos_informado_decimal,2);



$sub_calculando_ganho_real = bcsub($totalprodutos,$calculando_impostos,2);

$sub_calculando_ganho_real_2 = bcsub($sub_calculando_ganho_real,0,2);

$sub_calculando_ganho_real_3 = bcsub($sub_calculando_ganho_real_2,$precocompra,2);
	
	
$ganho_real = $sub_calculando_ganho_real_3;


?>
  <tr>
    <td width="5%"><div align="center" class="style3">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <? echo $codigoproduto;?></div></td>
    <td width="12%" class="style3"><div align="center"><? echo $nomeproduto;?></div></td>
    <td width="6%" class="style3"><div align="center"><? echo $quant;?></div></td>
    <td width="6%" class="style3"><div align="center"><? echo $categoria;?></div></td>
    <td width="7%" class="style3"><div align="center"><? echo $precocompra; ?></div></td>
    <td width="3%" class="style3"><div align="center"><? echo $margem_lucro_informada; ?></div></td>
    <td width="6%"><div align="center"><span class="style3"><? echo $preco; ?></span></div></td>
    <td width="6%" class="style3"><div align="center"><? echo $oferta; ?></div></td>
    <td width="4%" class="style3"><div align="center"><? echo $preco_oferta; ?></div></td>
    <td width="6%"><div align="center" class="style3"><? echo "$impostos_informado% / $calculando_impostos"; 
	 
?></div></td>
    <td width="9%"><div align="center" class="style3">
      <? echo $descontosconcedidos; ?>
    </div></td>
    <td width="9%"><div align="center"><span class="style3"><? echo $totalprodutos; ?></span></div></td>
    <td width="18%" class="style3"><div align="center"> <strong><font color="#0000FF"> </font></strong>
      <? echo $ganho_real; ?>
    </div></td>
  </tr>
  <? } ?>
  <tr>
    <td><span class="style3"></span></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td><div align="center"><span class="style3"></span></div></td>
    <td><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td><span class="style3"></span></td>
    <td><span class="style3"></span></td>
    <td><div align="center"></div></td>
    <td><span class="style3"></span></td>
</table>
<br>
<table width="100%" border="1" bordercolor="#000000">
  <tr>
    <td width="12%" align="center"><span class="style31">
      <?  
		
		if($modopagto=="CARTEIRA"){

	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTEIRA' and quitacao = 'Em Aberto' order by vencto asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_contas_a_receber = mysql_num_rows($res7);
	
$data_de_vencimento = $linha[8];
	$valor_da_parcela = $linha[7];
	$modopagto_carteira = $linha[10];
	$numero_da_parcela = $linha[31];
	
	echo "Modo de pagto: $modopagto_carteira";
	
	if(empty($valor_entrada)){ }else{ echo " - Entrada: $valor_entrada"; }
	
	echo "<br>Vencto: $data_de_vencimento Valor R$ $valor_da_parcela Parcela $numero_da_parcela";
	
}	
	}
		
		
		
		if($modopagto=="DINHEIRO"){


	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'DINHEIRO' and quitacao = 'Em Aberto' order by vencto asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_contas_a_receber = mysql_num_rows($res7);
	
$data_de_vencimento = $linha[8];
	$valor_da_parcela = $linha[7];
	$modopagto_dinheiro = $linha[10];
	$numero_da_parcela = $linha[31];
	
	echo "Modo de pagto: $modopagto_dinheiro";
	
	if(empty($valor_entrada)){ }else{ echo " - Entrada: $valor_entrada"; }
	
	echo "<br>Vencto: $data_de_vencimento Valor R$ $valor_da_parcela Parcela $numero_da_parcela";
}
			
			
if($quant_parc==0){
		
	$sql11 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura'and num_orcamento = '$codigo_orcamento' and modo_pagto = 'DINHEIRO'";
$res11 = mysql_query($sql11);
while($linha=mysql_fetch_row($res11)) {
	
	$dia_cx = $linha[17];
	$mes_cx = $linha[18];
	$ano_cx = $linha[19];
	$valor_cx = $linha[25];
	$modo_pagto_cx = $linha[27];
	$especificacao_cx = $linha[41];
	
	if(empty($valor_cx)){}else{
	echo "<br> Valor R$ $valor_cx modo pagto $modo_pagto_cx especificacao $especificacao_cx";
	}
	
}
			
			
	}
			
			
	}
	
		
	if($modopagto=="CARTAO"){

if(empty($valor_entrada)){
	
}
else{
echo "Modo de pagto: $modopagto - Entrada: $valor_entrada";
}
	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao1 = '1' group by num_ordem_do_cartao1 order by cartao asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}	
		
		
	$sql8 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao2 = '2' group by num_ordem_do_cartao2 order by cartao asc";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		
	$sql9 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao3 = '3' group by num_ordem_do_cartao3 order by cartao asc";
$res9 = mysql_query($sql9);
while($linha=mysql_fetch_row($res9)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		
	$sql10 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao4 = '4' group by num_ordem_do_cartao4 order by cartao asc";
$res10 = mysql_query($sql10);
while($linha=mysql_fetch_row($res10)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		
$sql11 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and modo_pagto = 'CARTAO' group by cartao ";
$res11 = mysql_query($sql11);
while($linha=mysql_fetch_row($res11)) {
	
	$cartao_cx = $linha[43];
	$cartao2_cx = $linha[48];
	$cartao3_cx = $linha[53];
	$cartao4_cx = $linha[58];
	$valor_cx = $linha[25];

	if(empty($cartao_cx)){
		
	}
	else{
		
$cartao_a_vista = $linha[43];
	$tipo_cartao_a_vista = $linha[44];
	$valor_cartao_a_vista = $linha[45];
	$vencto_cartao_a_vista = $linha[46];
	$custo_com_cartao1_a_vista = $linha[47];
	
	if(empty($valor_cx)){}else{
	echo "<br> Cartao: $cartao_a_vista - $tipo_cartao_a_vista R$ $valor_cartao_a_vista<br>";
	}
		
	}
	
	if(empty($cartao2_cx)){
		
	}
	else{
		
$cartao2_a_vista = $linha[48];
	$tipo_cartao2_a_vista = $linha[49];
	$valor_cartao2_a_vista = $linha[50];
	$vencto_cartao2_a_vista = $linha[51];
	$custo_com_cartao2_a_vista = $linha[52];
	

	if(empty($valor_cx)){}else{
	echo "<br> Cartao: $cartao2_a_vista - $tipo_cartao2_a_vista R$ $valor_cartao2_a_vista<br>";
	}
		
	}
	
	if(empty($cartao3_cx)){
		
	}
	else{
		
$cartao3_a_vista = $linha[53];
	$tipo_cartao3_a_vista = $linha[54];
	$valor_cartao3_a_vista = $linha[55];
	$vencto_cartao3_a_vista = $linha[56];
	$custo_com_cartao3_a_vista = $linha[57];
	
	if(empty($valor_cx)){}else{
	echo "<br> Cartao: $cartao3_a_vista - $tipo_cartao3_a_vista R$ $valor_cartao3_a_vista<br>";
	}
		
	}
	
	if(empty($cartao4_cx)){
		
	}
	else{
		
$cartao4_a_vista = $linha[58];
	$tipo_cartao4_a_vista = $linha[59];
	$valor_cartao4_a_vista = $linha[60];
	$vencto_cartao4_a_vista = $linha[61];
	$custo_com_cartao4_a_vista = $linha[62];
	
	if(empty($valor_cx)){}else{
	echo "<br> Cartao: $cartao4_a_vista - $tipo_cartao4_a_vista R$ $valor_cartao4_a_vista<br>";
	}
		
	}
		
	
}
		
		
	}
	
		?>
    </span></td>
    </tr>
</table>
<p align="center"><span class="style5">
    <strong>
<?

if($status == "CANCELADO"){
	
echo "JUSTIFICATIVA: $justificativa_gravada<br><br>

ATENÇÃO!!!... ESSE PEDIDO FOI CANCELADO POR $admgeral_cancelou da empresa $estab_pertence_cancelou em $date_cancelamento as $hora_cancelamento";	
	
}

?></strong></span></form>
<table width="100%" border="0" align="center">
  <tr>
    <td colspan="10"><div align="center">CMV (Custo de Mercadoria Vendida)</div></td>
  </tr>
  <tr>
    <td width="4%"><div align="center">Codigo</div></td>
    <td width="14%"><div align="center">Produto</div></td>
    <td width="4%"><div align="center">Quant</div></td>
    <td width="13%"><div align="center"># Normal p/ Oferta</div></td>
    <td width="6%"><div align="center">Impostos V</div></td>
    <td width="11%"><div align="center">Desconto Monetario</div></td>
    <td width="10%"><div align="center">Fornecedor</div></td>
    <td width="11%"><div align="center">Total CMV/Produto</div></td>
    <td width="9%"><div align="center">Saldo</div></td>
    <td width="18%"><div align="center">MCL</div></td>
  </tr>
  <?
			  
//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and num_bordero = '' and prazo_final between '$data_inicio_busca' and '$data_atual' order by num_proposta asc";

$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigolancamento = $linha[0];

$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$precocompra = $linha[20];
$quant = $linha[21];


$acrescimo = $linha[23];
$acrescimodecimal = $linha[24];
$acrescimomonetario = $linha[25];
$total_produto = $linha[29];

$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];


$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];

$total_impostos = $linha[87];

$preco_normal = $linha[90];
$oferta = $linha[91];
$preco_oferta = $linha[92];


$impostos_compra = $linha[102];
$impostos_compra_decimal = $linha[103];

$total_impostos_compra = $linha[104];
$total_impostos_venda = $linha[105];

?>
<?

	if($oferta == "Sim"){
	$diferenca_normal_para_oferta = bcsub($preco_normal,$preco_oferta,2); 
	
	$diferenca_normal_para_oferta_vezes_quantidade = bcmul($diferenca_normal_para_oferta,$quant,2); 
	
	
	
	echo $diferenca_normal_para_oferta_vezes_quantidade;
	
	}
	else{
		
	$diferenca_normal_para_oferta_vezes_quantidade = "0.00"; 	
	
			}


?>

  <tr class="style3">
    <td><div align="center"><? echo $codigoproduto;?></div></td>
    <td><div align="center"><? echo $nomeproduto;?></div></td>
    <td><div align="center"><? echo $quant;?></div></td>
    <td><div align="center"><? 	echo $diferenca_normal_para_oferta_vezes_quantidade; ?>
    </div></td>
    <td><div align="center">
<? echo "$total_impostos"; ?>
</div></td>
    <td><div align="center">
<? echo $descontosconcedidos; ?>
</div></td>
    <td><div align="center"><? $totalfornecedor = bcmul($quant,$precocompra,2); echo $totalfornecedor; ?></div></td>
    <td><div align="center"><? 
	
$custo_cmv_etapa1 = bcadd($diferenca_normal_para_oferta_vezes_quantidade,$calculando_impostos,2);

$custo_cmv_etapa2 = bcadd($descontosconcedidos,$totalfornecedor,2);

$totalizacao_cmv = bcadd($custo_cmv_etapa1,$custo_cmv_etapa2,2);

echo $totalizacao_cmv;
	

$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `totalizacao_cmv` = '$totalizacao_cmv' where `produtos_em_orcamento`. `codigo` = '$codigolancamento'";
}

mysql_query($comando,$conexao);

	
	 ?></div></td>
    <td><div align="center">
      <? 
	
$saldo_liquido_produto = bcsub($total_produto,$totalizacao_cmv,2);


echo $saldo_liquido_produto;


$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `saldo_liquido_produto` = '$saldo_liquido_produto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento'";
}

mysql_query($comando,$conexao);

	
	
	 ?>
    </div></td>
    <td><div align="center"><? 
	
$mcl_etapa1 = bcdiv($saldo_liquido_produto,$total_produto,4);

$mcl_etapa2 = bcmul($mcl_etapa1,100,2);
	
	
echo "$mcl_etapa2%";
	
	 ?></div></td>
  </tr>
<? } ?>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="10"><div align="center">Apura&ccedil;&atilde;o  do <strong><font color="#0000FF" size="2"><? echo $condicao; 
		if($condicao=="PEDIDO"){
			$comando = "update `$db`.`produtos_em_orcamento` set `condicao` = '$condicao' where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
		}
		?></font></strong></div></td>
  </tr>
  <tr>
    <td colspan="10"><div align="center">
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td background="../../../imagens_sistema/fundocelulas2.png" width="8%"><div align="center">Total Bruto</div></td>
          <td background="../../../imagens_sistema/fundocelulas1.png" width="19%"><div align="center">Desconto adicional (Arredondamento)</div></td>
          <td background="../../../imagens_sistema/fundocelulas2.png" width="13%"><div align="center">Total CMV/Servicos</div></td>
          <td background="../../../imagens_sistema/fundocelulas1.png" width="12%"><div align="center">Total CMV/Produtos</div></td>
          <td background="../../../imagens_sistema/fundocelulas2.png" width="11%"><div align="center">Custo com Cart&atilde;o</div></td>
          <td background="../../../imagens_sistema/fundocelulas1.png" width="11%"><div align="center">Comissoes</div></td>
          </tr>
        <tr>
          <td background="../../../imagens_sistema/fundocelulas2.png" ><div align="center"><strong><span class="style5">
            <? $total_bruto = bcadd($total_geral,$desconto_de_arredondamento,2); echo "R$ $total_bruto"; ?>
          </span></strong></div></td>
          <td background="../../../imagens_sistema/fundocelulas1.png" ><div align="center"><strong><? echo "R$ $desconto_de_arredondamento"; ?></strong></div></td>
          <td background="../../../imagens_sistema/fundocelulas2.png" ><div align="center">
            <strong>
            <?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_servicos from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'SERVICOS'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_servicos = $linha['totalizacao_cmv_dos_servicos'];

echo "R$ $totalizacao_cmv_dos_servicos";

?>
            </strong></div></td>
          <td background="../../../imagens_sistema/fundocelulas1.png" ><div align="center">
            <strong>
            <?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'VENDA DE PRODUTOS'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];

echo "R$ $totalizacao_cmv_dos_produtos";

?>
            </strong></div></td>
          <td background="../../../imagens_sistema/fundocelulas2.png" ><div align="center"><strong><? echo "R$ $custo_com_cartao"; ?></strong></div></td>
          <td background="../../../imagens_sistema/fundocelulas1.png" ><div align="center"><strong>
            <?
	$sql2 = "select sum(comissao) as total_comissao from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and status = 'Finalizado'";
$resultado2=mysql_query($sql2, $conexao);
$linha=mysql_fetch_array($resultado2);


$total_comissao = $linha['total_comissao'];

			  
	
	echo "R$ $total_comissao"; 
			  ?>
          </strong></div></td>
          </tr>
        <tr>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center">MCL p/ custo fixo</div></td>
          <td><div align="center">
            <?

$saldo_etapa1 = bcsub($total_geral,$totalizacao_cmv_dos_produtos,2);

$saldo_etapa2 = bcsub($saldo_etapa1,$custo_com_cartao,2);
$saldo_etapa3 = bcsub($saldo_etapa2,$totalizacao_cmv_dos_servicos,2);
$saldo_etapa4 = bcsub($saldo_etapa3,$total_comissao,2);
			  
 //echo $saldo_etapa4;
 
 
 
 
 
$sql = "select sum(valor) as totalizacao_custo_fixo from custo_fixo";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_custo_fixo = $linha['totalizacao_custo_fixo'];


$percentual_que_representa_para_cobrir_custo_fixo_etapa1 = bcdiv($saldo_etapa2,$total_custo_fixo,4);

$percentual_que_representa_para_cobrir_custo_fixo_etapa2 = bcmul($percentual_que_representa_para_cobrir_custo_fixo_etapa1,100,2);

echo " $percentual_que_representa_para_cobrir_custo_fixo_etapa2 %";

?>
          </div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td background="../../../imagens_sistema/fundocelulas2.png" align="center"><strong>Lucro Liquido</strong></td>
          <td background="../../../imagens_sistema/fundocelulas2.png" align="center"><strong><? echo "R$ $saldo_etapa4"; ?></strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
</table>
<p align="center"></p>
<p></p>
</body>
</html>
