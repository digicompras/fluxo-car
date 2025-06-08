<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

?>

<html>
<head>
<title>CONSULTAS DE COMANDAS</title>
<meta http-equiv="refresh" content="900" />
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

//require '../../conect/conect.php';
require '../conect/conect.php';


$codigo_orcamento = $_POST['codigo_orcamento'];
$nome = $_POST['nome'];

			
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



$sql = "SELECT * FROM clientes where nome = '$nome'";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo_cliente = $linha[0];

$nome_cliente = $linha[1];

$sexo_cliente = $linha[2];

$estadocivil_cliente = $linha[3];

$cpf_cliente = $linha[4];

$rg_cliente = $linha[5];

$orgao_cliente = $linha[6];

$emissao_cliente = $linha[7];

$data_nasc_cliente = $linha[8];

$pai_cliente = $linha[9];

$mae_cliente = $linha[10];

$endereco_cliente = $linha[11];

$numero_cliente = $linha[12];

$bairro_cliente = $linha[13];

$complemento_cliente = $linha[14];

$cidade_cliente = $linha[15];

$estado_cliente = $linha[16];

$cep_cliente = $linha[17];

$telefone_cliente = $linha[18];

$celular_cliente = $linha[19];

$email_cliente = $linha[20];


$obs_cliente = $linha[28];

$datacadastro_cliente = $linha[29];



$newsletter_cliente = $linha[136];

}
?>


<?

$sql = "SELECT * FROM orcamentos where codigo_cliente = '$codigo_cliente' and status = 'Aberto' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo_orcamento = $linha[0];

$estabelecimento_pedido = $linha[6];
$total_geral = $linha[7];

$modopagto = $linha[10];
$obs_orcamento = $linha[11];

$condicao = $linha[16];


$status = $linha[17];
//$nome = $linha[26];

$quantparc = $linha[8];
$cartao = $linha[28];
$valorparcela = $linha[29];
$codigo_orcamento_um = $linha[0];
$loja = $linha[6];
$quantparc = $linha[8];

$modopagto = $linha[10];

$obs = $linha[11];
$operador = $linha[12];

$condicao = $linha[16];

$status = $linha[17];
$cartao = $linha[28];


$entrada = $linha[35];


}

?>
  <?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
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
?>
<?
$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estabelecimento_pedido' limit 1";
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
$email_vendas = $linha[42];


}
?>
<form name="form1" method="post" action="grava_orcamento.php">
  <table width="40%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
    <td width="50%"><div align="center" class="style5"><? echo $condicao; ?> <strong>N&ordm; <? echo $codigo_orcamento; ?></strong></div></td>
    <td width="50%"><div align="center"><span class="style5">Total
          <? echo "R$ ".$total_geral; ?>
    </span></div></td>
  </tr>
</table>
  <table width="40%"  border="1">
    <tr bgcolor="#ffffff">
    <td width="22%" class="style3"><div align="center"><span class="style3">Nome Produto</span></div></td>
    <td width="9%" class="style3"><div align="center"><span class="style3">Pre&ccedil;o</span></div></td>
    <td width="8%"><div align="center" class="style3"><span class="style3">Quantidade</span></div></td>
    <td width="19%"><div align="center"><span class="style3">Total Produtos</span></div></td>
  </tr>
  <?
			  
			  
$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' order by codigo asc";
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
    <td class="style3"><div align="center"><span class="style3"><? echo $nomeproduto;?></span></div></td>
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
    <td><div align="center"><span class="style3"><? $totaldoitem = bcadd($total,$acrescimo_por_rateio,2); echo $totaldoitem;?></span></div></td>
  </tr>
  <?  } ?>
</table>
<?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
</body>
</html>
