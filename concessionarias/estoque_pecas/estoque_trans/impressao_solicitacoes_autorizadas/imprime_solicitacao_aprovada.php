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

require '../../../../conect/conect.php';

$codigo_orcamento = $_POST['codigo_orcamento'];
//$codigo_cliente = $_POST['codigo_cliente'];


?>


<body>
  


<?
	
$sql = "SELECT * FROM orcamentos_trans where codigo_orcamento = '$codigo_orcamento'";
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
$modopagto = $linha[10];
$obs_orcamento = $linha[11];

$operador = $linha[4];
$status_gravado = $linha[2];
	$condicao_gravado = $linha[42];
	$loja_solicitada = $linha[53];
	$loja_solicitante = $linha[43];
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
	
$datafechamento = $linha[30];
$horafechamento = $linha[31];
	


}
	
	
	$sql7 = "SELECT * FROM faturamento_futuro_trans where num_fatura = '$num_fatura' limit 1";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_contas_a_receber = mysql_num_rows($res7);
	
$valor_entrada = $linha[17];
	$quantparc = $linha[18];
	$modopagto = $linha[19];
	$valorparcela = $linha[20];
	$saldo_a_parcelar = $linha[57];
}
	
	

	
	
	
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where senha = '$senha'";
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



$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence_op' limit 1";
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
          <td><div align="center"><strong><font size="2"><? echo $nfantasia; ?><br>
END: <? echo $endereco; ?> n&ordm; <? echo $numero; ?>, bairro <? echo $bairro; ?>, em <? echo $cidade; ?> estado de <? echo $estado; ?><br>
Fone/Whats: <? echo $telefone; ?> </font></strong></div><div align="center"></div></td>
          </tr>
      </table>
    </div></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="76%"><div align="center" class="style5">TRANSFERENCIA <strong>N&ordm; <? echo "$codigo_orcamento N&ordm; Fatura $num_fatura"; ?></strong></div></td>
    <td width="24%"><div align="center"><span class="style5">Total
          <? echo "R$ ".$total_geral; ?>
    </span></div></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><table width="100%" border="0" cellspacing="4">
      <tr>
        <td width="7%"><strong><font size="2">De:</font></strong></td>
        <td width="26%"><strong><font color="#0000FF" size="2"><? echo $loja_solicitada; ?></font></strong></td>
        <td width="5%">Para:</td>
        <td width="15%"><strong><font color="#0000FF" size="2"><? echo $loja_solicitante; ?></font></strong></td>
        <td width="11%">&nbsp;</td>
        <td width="11%">&nbsp;</td>
        <td width="25%" rowspan="2" align="center" valign="top"><table width="100%" border="0">
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
        <td>Status:</td>
        <td><strong><font color="#0000FF" size="2"><? echo $status_gravado; ?></font></strong></td>
        <td>Condicao:</td>
        <td><strong><font color="#0000FF" size="2"><? echo $condicao_gravado; ?></font></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
</tr>
</table>
<table width="100%"  border="1">
  <tr bgcolor="#ffffff">
    <td colspan="5" align="center"><strong>PE&Ccedil;AS</strong></td>
    </tr>
  <tr bgcolor="#ffffff">
    <td width="8%"><div align="center" class="style3"><span class="style3">Codigo Produto</span></div></td>
    <td width="22%" class="style3"><div align="center"><span class="style3">Nome Produto</span></div></td>
    <td width="8%"><div align="center" class="style3"><span class="style3">Quantidade</span></div></td>
    <td width="7%"><div align="center" class="style3"><strong>Total CMV</strong></div></td>
    <td width="11%"><div align="center" class="style3"><strong>Toal Liquido da Transferencia</strong></div></td>
    </tr>
  <?
			  
			  
$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo_orcamento = '$codigo_orcamento' and categoria = 'VENDA DE PRODUTOS' order by codigo_orcamento desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quantidade = $linha[21];
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
    <td><div align="center" class="style3"><span class="style3"><? echo $quantidade;?></span></div></td>
    <td><div align="center" class="style3"><strong>
      <?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento_trans where num_fatura = '$num_fatura_abrir' and categoria = 'VENDA DE PRODUTOS' and codigoproduto = '$codigodoproduto'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];
if(empty($totalizacao_cmv_dos_produtos)){
	
}
else{
echo "R$ $totalizacao_cmv_dos_produtos";
}


?>
    </strong></div></td>
    <td><div align="center" class="style3">
      <? 
	$sub_saldogeralliquido = bcsub($totalitem,$totalizacao_cmv_dos_produtos,2);
	$sub_saldogeralliquido2 = bcsub($sub_saldogeralliquido,$totalizacao_cmv_dos_servicos,2);
	$sub_saldogeralliquido3 = bcsub($sub_saldogeralliquido2,$valor_comissao,2);
	
	echo "R$ $sub_saldogeralliquido3";
					
					?>
    </div></td>
    </tr>
  <?  } ?>
</table>
<p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" class="style5"><strong>
     
    </strong></td>
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
<p></p>
<p></p>
</body>
</html>
