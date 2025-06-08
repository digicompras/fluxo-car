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
<table width="100%"  border="1" cellspacing="0">
  <tr>
    <td colspan="6"><div align="center"><strong>
      <?

if(empty($nome_produto)) {

$sql = "select * from produtos order by nome_produto asc";

}else{	  

$sql = "select * from produtos where nome_produto like '$nome_produto%' order by nome_produto asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);


}

echo "	$produtos_encontrados produtos encontrados!!!... Digite o nome do produto ou parte dele na caixa acima e clique em buscar para executar uma pesquisa por nome.";

?>
    </strong></div></td>
  </tr>
  <tr>
    <td><div align="center" class="style2">C&oacute;digo</div></td>
    <td><div align="center" class="style2">Nome do Produto </div></td>
    <td><div align="center" class="style2">Pre&ccedil;o</div></td>
    <td><div align="center" class="style2">Fornecedor</div></td>
    <td><div align="center" class="style2">Quant Estoque</div></td>
    <td><div align="center" class="style2">Quant Disponivel</div></td>
  </tr>
  <?
if(empty($nome_produto)) {

$sql = "select * from produtos order by nome_produto asc";

}else{	  

$sql = "select * from produtos where nome_produto like '$nome_produto%' order by nome_produto asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);

}

?>
  <?
if(empty($nome_produto)) {

$sql = "select * from produtos order by nome_produto asc";

}else{	  

$sql = "select * from produtos where nome_produto like '$nome_produto%' order by nome_produto asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);


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
    <td width="10%"><div align="center"><? echo $codigo; ?></div></td>
    <td width="21%"><div align="center"><? echo $nome_produto; ?></div></td>
    <td width="15%"><div align="center">
      <? 
	
	if($oferta=="Sim"){

echo "R$ $preco_oferta";

}
else{
	
echo "R$ $preco";
	
}
	
	
	 ?>
    </div></td>
    <td width="21%"><div align="center"><? echo $fornecedor; ?></div></td>
    <td width="17%"><div align="center"><? echo $quant_estoque; ?></div></td>
    <td width="16%"><div align="center"><? echo $quant_disponivel; ?></div></td>
  </tr>
  <? } ?>
</table>
<p>&nbsp;</p>
</body>
</html>
