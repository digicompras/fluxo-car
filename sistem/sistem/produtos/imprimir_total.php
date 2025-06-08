<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

?>

<?

require '../../conect/conect.php';

?>
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {	font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
.style2 {	color: #0000FF;
	font-weight: bold;
}
-->
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="80%"  border="1" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td colspan="3"><div align="center"><strong>
      <?

$sql = "select * from produtos order by nome_produto asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);

}

echo "	$produtos_encontrados produtos encontrados!";

?>
    </strong></div></td>
  </tr>
  <tr>
    <td><div align="center" class="style2"><strong>C&oacute;digo</strong></div></td>
    <td><div align="center" class="style2"><strong>Nome do Produto </strong></div></td>
    <td><div align="center" class="style2"><strong>Pre&ccedil;o</strong></div></td>
  </tr>
  
  <?
$sql = "select * from categorias order by categoria asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$categoria_produto = $linha[1];


$sql2 = "select * from produtos where categoria = '$categoria_produto' order by nome_produto asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {



$referencia = $linha[0];
$foto = $linha[1];
$material = $linha[2];
$cor = $linha[3];
$categoria = $linha[4];
$sub_categoria = $linha[5];
$descricao = $linha[6];
$preco = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$data_hora = $linha[10];
$codigo = $linha[11];
$foto2 = $linha[12];
$foto3 = $linha[13];
$foto4 = $linha[14];
$cod_barras = $linha[15];
$quant_estoque = $linha[16];
$expedicao = $linha[17];
$quant_disponivel = $linha[18];
$quant_minima = $linha[19];
$aparecer_site = $linha[20];
$preco_compra = $linha[21];
$frete = $linha[22];
$margem_lucro = $linha[23];
$impostos = $linha[24];
$margem_lucro_informada = $linha[25];
$impostos_informado = $linha[26];
$nome_produto = $linha[27];
$fornecedor = $linha[28];

?>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center" class="style2"><strong><? echo "$categoria_produto"; ?></strong></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="10%"><div align="center"><strong><? echo $codigo; ?></strong></div></td>
    <td width="21%"><div align="center"><strong><? echo $nome_produto; ?></strong></div></td>
    <td width="15%"><div align="center">
      <strong>
      <? 
	
	if($oferta=="Sim"){

echo "R$ $preco_oferta";

}
else{
	
echo "R$ $preco";
	
}
	
	
	 ?>
    </strong></div></td>
  </tr>
  <? } } ?>
</table>
<p>&nbsp;</p>
</body>
</html>
