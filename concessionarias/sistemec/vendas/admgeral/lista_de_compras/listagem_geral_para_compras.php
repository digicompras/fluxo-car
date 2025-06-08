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
<title>Border&ocirc;s</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
}
.style3 {font-size: 10px}
.style6 {font-size: 18px; font-weight: bold; }
-->
</style>
</head>
<?

require '../../conect/conect.php';
?>


  <?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];
$estab_pertence = $linha[44];

}
?>







<?
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>

background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">
  
<? } ?>
<p>
        <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>
</p>
<form name="form1" method="post" action="../estoque/menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar">
</form>
<div align="center"></div>
<table width="100%"  border="1">
              
<tr bgcolor="#ffffff">
                <td><div align="center" class="style3"><span class="style6">Codigo Produto</span></div></td>
                <td class="style3"><div align="center"><span class="style6">Nome Produto</span></div></td>
                <td class="style3"><div align="center"><span class="style6">Fornecedor</span></div></td>
                <td class="style3"><div align="center"><span class="style6">Quant Minima</span></div></td>
                <td class="style3"><div align="center"><span class="style6">Estoque</span></div></td>
                <td><div align="center" class="style3"></div></td>
              </tr>
              <?
			  
$sql = "SELECT * FROM produtos  order by fornecedor,nome_produto asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$referencia = $linha[0];
$foto = $linha[1];
$material = $linha[2];
$cor = $linha[3];
$categoria = $linha[4];
$sub_categoria = $linha[5];
$descricao = $linha[6];
$preco_normal = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$data_hora = $linha[10];
$codigoproduto = $linha[11];
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
$nomeproduto = $linha[27];
$fornecedor = $linha[28];
$travesseiro1 = $linha[29];
$travesseiro2 = $linha[30];


$margem_folga = $linha[32];
$margem_folga_decimal = $linha[33];

$quant_estoque = $linha[16];
$quant_minima = $linha[19];



?>
<?
       if($quant_estoque <= $quant_minima){ echo "<tr>
                <td width='11%'><div align='center' class='style3'><span class='style6'>
                  $codigoproduto
                </span></div></td>
                <td width='31%' class='style3'><div align='center'><span class='style6'>
                $nomeproduto
                </span></div></td>
                <td width='30%' class='style3'><div align='center'>
                  <span class='style6'>
                  $fornecedor
                </span></div></td>
                <td width='10%' class='style3'><div align='center'><span class='style6'>
               $quant_minima
                </span></div></td>
                <td width='8%' class='style3'><div align='center'><span class='style6'>
                $quant_estoque
                </span></div></td>
                <td width='10%'><div align='center' class='style3'></div></td>
                </tr>";
?>
                <? }} ?>

                          </table>
<p><strong></strong></p>
<p><strong></strong></p>
<p><strong></strong></p>





</body>
</html>
