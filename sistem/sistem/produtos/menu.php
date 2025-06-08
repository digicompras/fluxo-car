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
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {	font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
.style2 {color: #0000FF;
	font-weight: bold;
}
-->
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="80%" border="0" align="center" cellspacing="0">
  <tr>
    <td colspan="5"><?
require '../../conect/conect.php';

include '../../css/botoes.php';

$nome_produto = $_POST['nome_produto'];

 ?></td>
  </tr>
  <tr>
    <td colspan="5" align="center"><strong><font color="#0000FF" size="4">O que deseja fazer com os produtos?</font></strong></td>
  </tr>
  <tr>
    <td width="19%"><form action="../index.php" method="post" name="form1" target="_top">
      <input class='class01' type="submit" name="Submit" value="Voltar ao menu principal">
      <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
    </form></td>
    <td>&nbsp;</td>
    <td><form action="imprimir_total.php" method="post" name="form1" target="_blank">
      <div align="center">
        <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>">
        <input class='class01' type="submit" name="Submit6" value="Imprimir">
        <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
      </div>
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td width="20%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp; </p>
<table width="80%"  border="1" align="center" cellspacing="0">
  <tr>
    <td colspan="4"><div align="center"> <strong>
      <?

if(empty($nome_produto)) {

$sql = "select * from produtos order by nome_produto asc";

}else{	  

$sql = "select * from produtos where nome_produto like '%$nome_produto%' order by nome_produto asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);


}

echo "	$produtos_encontrados produtos encontrados!!!... Digite o nome do produto ou parte dele na caixa e clique em buscar.";

?>
    </strong></div></td>
  </tr>
  <tr>
    <td>Nome Produto</td>
    <td colspan="3"><form name="form5" method="post" action="menu.php">
      <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      <input name="nome_produto" class='class02' type="text" id="nome_produto" value="<? if(empty($nome_produto)){ echo "TODOS"; }else{ echo "$nome_produto"; } ?>" size="40">
      <input class='class01' type="submit" name="button" id="button" value="Buscar">
    </form></td>
  </tr>
  <tr>
    <td><div align="center" class="style2">C&oacute;digo</div></td>
    <td><div align="center" class="style2">Nome do Produto </div></td>
    <td align="center"><span class="style2">Dilui&ccedil;&atilde;o </span></td>
    <td><div align="center" class="style2">Pre&ccedil;o</div></td>
  </tr>
  <?
if(empty($nome_produto)) {
	
}
else{
	
	if($nome_produto=="TODOS"){

$sql = "select * from produtos order by cod_barras,nome_produto asc";

}
else{	  

$sql = "select * from produtos where nome_produto like '%$nome_produto%' order by nome_produto asc";

}
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
	$diluicao = $linha[37];
	$calculapreco = $linha[38];

?>
  <tr>
    <td width="10%"><form name="form1" method="post" action="editar.php">
      <div align="center">
        <strong>
        <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo; ?>">
        <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>">
        <? echo $codigo; ?>
        <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
        </strong></div>
    </form></td>
    <td width="27%"><div align="center"><strong><? echo $nome_produto; ?></strong></div></td>
    <td width="10%" align="center"><strong><? echo $diluicao; ?></strong></td>
    <td width="10%"><div align="center">
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
  <? } ?>
</table>
</body>
</html>
