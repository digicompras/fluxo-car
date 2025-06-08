

<html>
<head>
<title>ORCAMENTO/PEDIDO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.style3 {font-size: 12px}
.style5 {	font-size: 20px;
	font-weight: bold;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>
<?

require 'conect/conect.php';
	
	ini_set('default_charset','UTF8_general_mysql500_ci');

$codigo_orcamento = $_POST['codigo_orcamento'];
//$codigo_cliente = $_POST['codigo_cliente'];

			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("ffffff"); ?>"

background="../background/<? printf("$linha[1]"); ?>" bgproperties="fixed" 
  
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
//$modopagto = $linha[10];
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
	
	
	
$sql = "SELECT * FROM clientes where nome = '$nome'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;


$codigo_cliente= $linha[0];

$nomedofuncionario = $linha[1];

$sexo = $linha[2];

$estadocivil = $linha[3];

$cpfdocliente = $linha[4];

$rg = $linha[5];

$orgao = $linha[6];

$emissao = $linha[7];

$data_nasc = $linha[8];

$pai = $linha[9];

$mae = $linha[10];

$endereco = $linha[11];

$numero = $linha[12];

$bairro = $linha[13];

$complemento = $linha[14];

$cidade = $linha[15];

$estado = $linha[16];

$cep = $linha[17];

$telefone = $linha[18];

$celular = $linha[19];

$email = $linha[20];

$operador = $linha[21];

$cel_operador = $linha[22];

$email_operador = $linha[23];

$estabelecimento = $linha[24];

$cidade_estabelecimento = $linha[25];

$tel_estabelecimento = $linha[26];

$email_estabelecimento = $linha[27];

//$obs = $linha[28];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$dataalteracao = $linha[31];

$horaalteracao = $linha[32];

$operador_alterou = $linha[33];

$cel_operador_alterou = $linha[34];

$email_operador_alterou = $linha[35];

$estabelecimento_alterou = $linha[36];

$cidade_estabelecimento_alterou = $linha[37];

$tel_estabelecimento_alterou = $linha[38];

$email_estabelecimento_alterou = $linha[39];

$tipo = $linha[40];

$banco = $linha[41];

$agencia = $linha[42];

$conta = $linha[43];

$num_beneficio = $linha[44];

$obs2 = $linha[77];

$mes_niver = $linha[88];

$status_cliente = $linha[89];


$local_trabalho = $linha[134];
$fone_comercial = $linha[135];
$newsletter = $linha[136];
$empresaconveniada = $linha[137];
$comandadofuncionario = $linha[138];
$statusfuncionario = $linha[139];
}
	
	
	
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
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];

}



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



  <p>
 
</p>
<form name="form1" method="post" action="grava_orcamento.php">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
          <td><div align="center"><strong><font size="2" class="style3"><? echo $razaosocial; ?><br>
            <? echo $endereco." "; ?><? echo "Nº ".$numero; ?>, <? echo $bairro; ?>, <? echo $cidade." "; ?> <? echo $estado; ?><br>
            Site: <? echo $site; ?> E-Mail: <? echo $email_vendas; ?><br>
            TEL: <? echo $telefone; ?></font></strong></div><div align="center"></div></td>
          </tr>
      </table>
    </div></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="76%"><div align="center" class="style5"><? echo $condicao; ?> <strong>N&ordm; <? echo "$codigo_orcamento Nº Fatura $num_fatura"; ?></strong></div></td>
    <td width="24%"><div align="center"><span class="style5">Total
          <? echo "R$ ".$total_geral; ?>
    </span></div></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
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
        <td width="26%"><strong><font color="#0000FF" size="2"><? echo $empresaconveniada; ?></font></strong></td>
        <td width="5%">CNPJ:</td>
        <td width="15%"><strong><font color="#0000FF" size="2"><? echo $cpf; ?></font></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Nome:</td>
        <td><strong><font color="#0000FF" size="2"><? echo $nome; ?></font></strong></td>
        <td>Fone:</td>
        <td><strong><font color="#0000FF" size="2"><? echo $fone_comercial; ?></font></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
</tr>
</table>
<table width="100%"  border="1">
  <tr bgcolor="#ffffff">
    <td colspan="8" align="center"><strong>PE&Ccedil;AS</strong></td>
    </tr>
  <tr bgcolor="#ffffff">
    <td width="8%"><div align="center" class="style3"><span class="style3">Codigo Produto</span></div></td>
    <td width="22%" class="style3"><div align="center"><span class="style3">Nome Produto</span></div></td>
    <td width="16%" class="style3"><div align="center"><span class="style3">Categoria</span></div></td>
    <td width="9%" class="style3"><div align="center"><span class="style3">Pre&ccedil;o</span></div></td>
    <td width="8%"><div align="center" class="style3"><span class="style3">Quantidade</span></div></td>
    <td width="7%"><div align="center" class="style3"><span class="style3">Desconto</span></div></td>
    <td width="11%"><div align="center" class="style3"><span class="style3">Desconto Monetario</span></div></td>
    <td width="19%"><div align="center"><span class="style3">Total Produtos</span></div></td>
  </tr>
  <?
			  
			  
$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'VENDA DE PRODUTOS' order by codigo_orcamento desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco0 = $linha[22];
$preco1 = $linha[23];
$preco2 = $linha[24];
$preco3 = $linha[25];
$preco4 = $linha[81];

$acrescimo = $linha[26];
$acrescimodecimal = $linha[27];
$acrescimomonetario = $linha[28];
$total = $linha[29];

$descontoetapa0 = $linha[66];
$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];
$descontoetapa4 = $linha[83];

$descontomonetarioetapa0 = $linha[74];
$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];
$descontomonetarioetapa4 = $linha[85];


$acrescimo_por_rateio = $linha[95];


$acrescimo_por_item = bcdiv($acrescimo_por_rateio,$quant,2);



$total_descontos_etapa1 = bcadd($descontoetapa0,$descontoetapa1,2);
$total_descontos_etapa2 = bcadd($descontoetapa2,$descontoetapa3,2);
$total_descontos_etapa3 = bcadd($descontoetapa4,0,2);

$subtotal_de_descontos_nominais = bcadd($total_descontos_etapa1,$total_descontos_etapa2,2);

$total_geral_de_descontos_nominais = bcadd($total_descontos_etapa3,$subtotal_de_descontos_nominais,2);






$total_descontos_monetarios_etapa1 = bcadd($descontomonetarioetapa0,$descontomonetarioetapa1,2);
$total_descontos_monetarios_etapa2 = bcadd($descontomonetarioetapa2,$descontomonetarioetapa3,2);
$total_descontos_monetarios_etapa3 = bcadd($descontomonetarioetapa4,0,2);

$subtotal_de_descontos = bcadd($total_descontos_monetarios_etapa1,$total_descontos_monetarios_etapa2,2);

$total_geral_de_descontos = bcadd($total_descontos_monetarios_etapa3,$subtotal_de_descontos,2);


?>
  <tr>
    <td><div align="center" class="style3"><span class="style3"><? echo $codigoproduto;?></span></div></td>
    <td class="style3"><div align="center"><span class="style3"><? echo $nomeproduto;?></span></div></td>
    <td class="style3"><div align="center"><span class="style3"><? echo $categoria;?></span></div></td>
    <td class="style3"><div align="center"><span class="style3">
<? 
//$menor_valor = min($preco0,$preco1,$preco2,$preco3,$preco4); 

if($preco4 <> 0.00){
	
$valor_de_venda = $preco4;

}
else{
	
if($preco3 <> 0.00){
	
$valor_de_venda = $preco3;

}
else{
	
if($preco2 <> 0.00){
	
$valor_de_venda = $preco2;	
	
}
else{
	
if($preco1 <> 0.00){
	
$valor_de_venda = $preco1;	
	
}
else{
	
if($preco0 <> 0.00){
	
$valor_de_venda = $preco0;	
	
}
}
}
}
}

$valordoitemvendido = bcadd($valor_de_venda,$acrescimo_por_item,2);
	
echo $valordoitemvendido; 
	 
?>
</span></div></td>
    <td><div align="center" class="style3"><span class="style3"><? echo $quant;?></span></div></td>
    <td><div align="center" class="style3"><? echo $total_geral_de_descontos_nominais;?></div></td>
    <td><div align="center" class="style3"><span class="style3"><? echo $total_geral_de_descontos;?></span></div></td>
    <td><div align="center"><span class="style3"><? $totaldoitem = bcadd($total,$acrescimo_por_rateio,2); echo $totaldoitem;?></span></div></td>
  </tr>
  <?  } ?>
</table>
<table width="100%"  border="1">
  <tr bgcolor="#ffffff">
    <td colspan="8" align="center"><strong>SERVI&Ccedil;OS</strong></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td width="8%"><div align="center" class="style3">Codigo Produto</div></td>
    <td width="22%" class="style3"><div align="center">Nome Produto</div></td>
    <td width="16%" class="style3"><div align="center">Categoria</div></td>
    <td width="9%" class="style3"><div align="center">Pre&ccedil;o</div></td>
    <td width="8%"><div align="center" class="style3">Quantidade</div></td>
    <td width="7%"><div align="center" class="style3">Desconto</div></td>
    <td width="11%"><div align="center" class="style3">Desconto Monetario</div></td>
    <td width="19%"><div align="center"><span class="style3">Total Produtos</span></div></td>
  </tr>
  <?
			  
			  
$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'servicos' order by codigo_orcamento desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco0 = $linha[22];
$preco1 = $linha[23];
$preco2 = $linha[24];
$preco3 = $linha[25];
$preco4 = $linha[81];

$acrescimo = $linha[26];
$acrescimodecimal = $linha[27];
$acrescimomonetario = $linha[28];
$total = $linha[29];

$descontoetapa0 = $linha[66];
$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];
$descontoetapa4 = $linha[83];

$descontomonetarioetapa0 = $linha[74];
$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];
$descontomonetarioetapa4 = $linha[85];


$acrescimo_por_rateio = $linha[95];


$acrescimo_por_item = bcdiv($acrescimo_por_rateio,$quant,2);



$total_descontos_etapa1 = bcadd($descontoetapa0,$descontoetapa1,2);
$total_descontos_etapa2 = bcadd($descontoetapa2,$descontoetapa3,2);
$total_descontos_etapa3 = bcadd($descontoetapa4,0,2);

$subtotal_de_descontos_nominais = bcadd($total_descontos_etapa1,$total_descontos_etapa2,2);

$total_geral_de_descontos_nominais = bcadd($total_descontos_etapa3,$subtotal_de_descontos_nominais,2);






$total_descontos_monetarios_etapa1 = bcadd($descontomonetarioetapa0,$descontomonetarioetapa1,2);
$total_descontos_monetarios_etapa2 = bcadd($descontomonetarioetapa2,$descontomonetarioetapa3,2);
$total_descontos_monetarios_etapa3 = bcadd($descontomonetarioetapa4,0,2);

$subtotal_de_descontos = bcadd($total_descontos_monetarios_etapa1,$total_descontos_monetarios_etapa2,2);

$total_geral_de_descontos = bcadd($total_descontos_monetarios_etapa3,$subtotal_de_descontos,2);


?>
  <tr>
    <td><div align="center" class="style3"><? echo $codigoproduto;?></div></td>
    <td class="style3"><div align="center"><? echo $nomeproduto;?></div></td>
    <td class="style3"><div align="center"><? echo $categoria;?></div></td>
    <td class="style3"><div align="center">
      <? 
//$menor_valor = min($preco0,$preco1,$preco2,$preco3,$preco4); 

if($preco4 <> 0.00){
	
$valor_de_venda = $preco4;

}
else{
	
if($preco3 <> 0.00){
	
$valor_de_venda = $preco3;

}
else{
	
if($preco2 <> 0.00){
	
$valor_de_venda = $preco2;	
	
}
else{
	
if($preco1 <> 0.00){
	
$valor_de_venda = $preco1;	
	
}
else{
	
if($preco0 <> 0.00){
	
$valor_de_venda = $preco0;	
	
}
}
}
}
}

$valordoitemvendido = bcadd($valor_de_venda,$acrescimo_por_item,2);
	
echo $valordoitemvendido; 
	 
?>
    </div></td>
    <td><div align="center" class="style3"><? echo $quant;?></div></td>
    <td><div align="center" class="style3"><? echo $total_geral_de_descontos_nominais;?></div></td>
    <td><div align="center" class="style3"><? echo $total_geral_de_descontos;?></div></td>
    <td><div align="center"><span class="style3">
      <? $totaldoitem = bcadd($total,$acrescimo_por_rateio,2); echo $totaldoitem;?>
    </span></div></td>
  </tr>
  <?  } ?>
</table>
	<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
	  
    <td width="12%" align="center" class="style3"><? 
		
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
	
	echo "<br> Valor R$ $valor_cx modo pagto $modo_pagto_cx especificacao $especificacao_cx";
	
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

	if(empty($cartao_cx)){
		
	}
	else{
		
$cartao_a_vista = $linha[43];
	$tipo_cartao_a_vista = $linha[44];
	$valor_cartao_a_vista = $linha[45];
	$vencto_cartao_a_vista = $linha[46];
	$custo_com_cartao1_a_vista = $linha[47];
	
	
	echo "<br> Cartao: $cartao_a_vista - $tipo_cartao_a_vista R$ $valor_cartao_a_vista<br>";
		
	}
	
	if(empty($cartao2_cx)){
		
	}
	else{
		
$cartao2_a_vista = $linha[48];
	$tipo_cartao2_a_vista = $linha[49];
	$valor_cartao2_a_vista = $linha[50];
	$vencto_cartao2_a_vista = $linha[51];
	$custo_com_cartao2_a_vista = $linha[52];
	

	
	echo "<br> Cartao: $cartao2_a_vista - $tipo_cartao2_a_vista R$ $valor_cartao2_a_vista<br>";
		
	}
	
	if(empty($cartao3_cx)){
		
	}
	else{
		
$cartao3_a_vista = $linha[53];
	$tipo_cartao3_a_vista = $linha[54];
	$valor_cartao3_a_vista = $linha[55];
	$vencto_cartao3_a_vista = $linha[56];
	$custo_com_cartao3_a_vista = $linha[57];
	
	
	echo "<br> Cartao: $cartao3_a_vista - $tipo_cartao3_a_vista R$ $valor_cartao3_a_vista<br>";
		
	}
	
	if(empty($cartao4_cx)){
		
	}
	else{
		
$cartao4_a_vista = $linha[58];
	$tipo_cartao4_a_vista = $linha[59];
	$valor_cartao4_a_vista = $linha[60];
	$vencto_cartao4_a_vista = $linha[61];
	$custo_com_cartao4_a_vista = $linha[62];
	
	
	echo "<br> Cartao: $cartao4_a_vista - $tipo_cartao4_a_vista R$ $valor_cartao4_a_vista<br>";
		
	}
		
	
}
		
		
	}
	
		?></td>
    </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="style3">ASS:_______________________________________________________<br><? echo "$nome_cliente $cpf_cliente"; ?></div></td>
  </tr>
</table>
<p><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<p>--------------------------------------------------------------------------------------------------------------------------</p>
<form name="form1" method="post" action="grava_orcamento.php">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td><div align="center">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td><div align="center"><strong><font size="2" class="style3"><? echo $razaosocial; ?><br>
              <? echo $endereco." "; ?><? echo "N&ordm; ".$numero; ?>, <? echo $bairro; ?>, <? echo $cidade." "; ?> <? echo $estado; ?><br>
              Site: <? echo $site; ?> E-Mail: <? echo $email_vendas; ?><br>
              TEL: <? echo $telefone; ?></font></strong></div><div align="center"></div></td>
            </tr>
        </table>
      </div></td>
    </tr>
  </table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td width="76%"><div align="center" class="style5"><? echo $condicao; ?> <strong>N&ordm;<? echo "$codigo_orcamento N&ordm; Fatura $num_fatura"; ?></strong></div></td>
      <td width="24%"><div align="center"><span class="style5">Total
      <? echo "R$ ".$total_geral; ?> </span></div></td>
    </tr>
  </table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td><table width="100%" border="0" cellspacing="4">
        <tr>
          <td width="7%"><strong><font size="2">C&oacute;digo:</font></strong></td>
          <td colspan="3"><strong><font color="#0000FF" size="2"><? echo $codigo_orcamento; ?>
            <input name="codigo_cliente2" type="hidden" id="codigo_cliente2" value="<? echo $codigo_cliente; ?>">
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
  <table width="100%"  border="1">
    <tr bgcolor="#ffffff">
      <td colspan="8" align="center"><strong>PE&Ccedil;AS</strong></td>
    </tr>
    <tr bgcolor="#ffffff">
      <td width="8%"><div align="center" class="style3"><span class="style3">Codigo Produto</span></div></td>
      <td width="22%" class="style3"><div align="center"><span class="style3">Nome Produto</span></div></td>
      <td width="16%" class="style3"><div align="center"><span class="style3">Categoria</span></div></td>
      <td width="9%" class="style3"><div align="center"><span class="style3">Pre&ccedil;o</span></div></td>
      <td width="8%"><div align="center" class="style3"><span class="style3">Quantidade</span></div></td>
      <td width="7%"><div align="center" class="style3"><span class="style3">Desconto</span></div></td>
      <td width="11%"><div align="center" class="style3"><span class="style3">Desconto Monetario</span></div></td>
      <td width="19%"><div align="center"><span class="style3">Total Produtos</span></div></td>
    </tr>
    <?
			  
			  
$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'VENDA DE PRODUTOS' order by codigo_orcamento desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco = $linha[22];
$desconto = $linha[23];
$descontodecimal = $linha[24];
$descontomonetario = $linha[25];
$acrescimo = $linha[26];
$acrescimodecimal = $linha[27];
$acrescimomonetario = $linha[28];
$total = $linha[29];


?>
    <tr>
      <td><div align="center" class="style3"><span class="style3"><? echo $codigoproduto;?></span></div></td>
      <td class="style3"><div align="center"><span class="style3"><? echo $nomeproduto;?></span></div></td>
      <td class="style3"><div align="center"><span class="style3"><? echo $categoria;?></span></div></td>
      <td class="style3"><div align="center"><span class="style3"><? echo $preco;?></span></div></td>
      <td><div align="center" class="style3"><span class="style3"><? echo $quant;?></span></div></td>
      <td><div align="center" class="style3"><span class="style3"><? echo $desconto;?></span></div></td>
      <td><div align="center" class="style3"><span class="style3"><? echo $descontomonetario;?></span></div></td>
      <td><div align="center"><span class="style3"><? echo $total;?></span></div></td>
    </tr>
    <?  } ?>
  </table>
  <table width="100%"  border="1">
    <tr bgcolor="#ffffff">
      <td colspan="8" align="center"><strong>SERVI&Ccedil;OS</strong></td>
    </tr>
    <tr bgcolor="#ffffff">
      <td width="8%"><div align="center" class="style3">Codigo Produto</div></td>
      <td width="22%" class="style3"><div align="center">Nome Produto</div></td>
      <td width="16%" class="style3"><div align="center">Categoria</div></td>
      <td width="9%" class="style3"><div align="center">Pre&ccedil;o</div></td>
      <td width="8%"><div align="center" class="style3">Quantidade</div></td>
      <td width="7%"><div align="center" class="style3">Desconto</div></td>
      <td width="11%"><div align="center" class="style3">Desconto Monetario</div></td>
      <td width="19%"><div align="center"><span class="style3">Total Produtos</span></div></td>
    </tr>
    <?
			  
			  
$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'SERVICOS' order by codigo_orcamento desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco = $linha[22];
$desconto = $linha[23];
$descontodecimal = $linha[24];
$descontomonetario = $linha[25];
$acrescimo = $linha[26];
$acrescimodecimal = $linha[27];
$acrescimomonetario = $linha[28];
$total = $linha[29];


?>
    <tr>
      <td><div align="center" class="style3"><? echo $codigoproduto;?></div></td>
      <td class="style3"><div align="center"><? echo $nomeproduto;?></div></td>
      <td class="style3"><div align="center"><? echo $categoria;?></div></td>
      <td class="style3"><div align="center"><? echo $preco;?></div></td>
      <td><div align="center" class="style3"><? echo $quant;?></div></td>
      <td><div align="center" class="style3"><? echo $desconto;?></div></td>
      <td><div align="center" class="style3"><? echo $descontomonetario;?></div></td>
      <td><div align="center"><span class="style3"><? echo $total;?></span></div></td>
    </tr>
    <?  } ?>
  </table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td width="12%" align="center" class="style3"><?  
		
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
	
	echo "<br> Valor R$ $valor_cx modo pagto $modo_pagto_cx especificacao $especificacao_cx";
	
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

	if(empty($cartao_cx)){
		
	}
	else{
		
$cartao_a_vista = $linha[43];
	$tipo_cartao_a_vista = $linha[44];
	$valor_cartao_a_vista = $linha[45];
	$vencto_cartao_a_vista = $linha[46];
	$custo_com_cartao1_a_vista = $linha[47];
	
	
	echo "<br> Cartao: $cartao_a_vista - $tipo_cartao_a_vista R$ $valor_cartao_a_vista<br>";
		
	}
	
	if(empty($cartao2_cx)){
		
	}
	else{
		
$cartao2_a_vista = $linha[48];
	$tipo_cartao2_a_vista = $linha[49];
	$valor_cartao2_a_vista = $linha[50];
	$vencto_cartao2_a_vista = $linha[51];
	$custo_com_cartao2_a_vista = $linha[52];
	

	
	echo "<br> Cartao: $cartao2_a_vista - $tipo_cartao2_a_vista R$ $valor_cartao2_a_vista<br>";
		
	}
	
	if(empty($cartao3_cx)){
		
	}
	else{
		
$cartao3_a_vista = $linha[53];
	$tipo_cartao3_a_vista = $linha[54];
	$valor_cartao3_a_vista = $linha[55];
	$vencto_cartao3_a_vista = $linha[56];
	$custo_com_cartao3_a_vista = $linha[57];
	
	
	echo "<br> Cartao: $cartao3_a_vista - $tipo_cartao3_a_vista R$ $valor_cartao3_a_vista<br>";
		
	}
	
	if(empty($cartao4_cx)){
		
	}
	else{
		
$cartao4_a_vista = $linha[58];
	$tipo_cartao4_a_vista = $linha[59];
	$valor_cartao4_a_vista = $linha[60];
	$vencto_cartao4_a_vista = $linha[61];
	$custo_com_cartao4_a_vista = $linha[62];
	
	
	echo "<br> Cartao: $cartao4_a_vista - $tipo_cartao4_a_vista R$ $valor_cartao4_a_vista<br>";
		
	}
		
	
}
		
		
		
	}
	
		?></td>
    </tr>
  </table>
  <p>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center" class="style3">ASS:_______________________________________________________<br><? echo "$nome_cliente $cpf_cliente"; ?></div></td>
    </tr>
  </table>
  <p>
    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<p></p>
<p></p>
</body>
</html>
