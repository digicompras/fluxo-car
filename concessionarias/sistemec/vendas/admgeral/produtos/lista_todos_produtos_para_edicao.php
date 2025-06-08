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
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
	font-size: 24px;
}
-->
</style>
</head>

<body>

<?

require '../../conect/conect.php';

$nome_produto = $_POST['nome_produto'];

?>
<p class="style1">Listando todos os  Produtos que tenham a palavra informada - <?  echo $nome_produto; ?></p>

      <table width="100%"  border="0">
<?
	  
$sql = "select * from produtos where nome_produto like '$nome_produto' order by nome_produto asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


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

?>

        <tr>
          <td width="22%"><form name="form1" method="post" action="">
            <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo; ?>">
            <input type="submit" name="Submit" value="<? echo $ordem_desc; ?>">
          </form></td>
          <td width="26%"><div align="center"><? echo $nome_produto; ?></div></td>
          <td width="10%"><div align="center"><? echo $fornecedor; ?></div></td>
          <td width="15%"><div align="center"><? echo $categoria; ?></div></td>
          <td width="27%"><div align="center"><? echo $sub_categoria; ?></div>
          </td>
        </tr>
<? } ?>
      </table>
	  	<?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>

          <? } ?>

<p>&nbsp;</p>
</body>
</html>
