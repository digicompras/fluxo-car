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
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {	font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
.style3 {	color: #000000;
	font-weight: bold;
}
.style4 {
	color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
-->
</style></head>

<body>
<p>        
<?
error_reporting(E_ALL && NOTICE);

require '../../../conect/conect.php';
include '../../../css/botoes.php';
	
	
$senha = $_SESSION['senha'];

$sql = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_operador = $linha[0];

$operador = $linha[1];

$estab_pertence = $linha[44];
}


?>

</p>
<p>
  <?
$referencia = $_POST['referencia'];


$sql = "SELECT * FROM estoque_pecas where referencia = '$referencia' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);


$part_number = $linha[0];

$grupo = $linha[4];
$sub_grupo = $linha[5];
	
$codigoproduto = $linha[11];

$quant_estoque = $linha[16];


$preco_compra_cadastrado = $linha[21];
$margem_lucro_informada = $linha[25];
$impostos_informado_cadastrado = $linha[26];
$nome_produto = $linha[27];
$frete_cadastrado = $linha[22];


}
?>

<?


  
$data = $_POST['data'];
$hora = $_POST['hora'];

$fornecedor = $_POST['fornecedor'];
$nf = $_POST['nf'];

$dia_nf = $_POST['dia_nf'];
$mes_nf = $_POST['mes_nf'];
$ano_nf = $_POST['ano_nf'];

$data_nf = "$ano_nf-$mes_nf-$dia_nf";


$unidade = $_POST['unidade'];
$quantidade = $_POST['quantidade'];
$preco_compra_atual = $_POST['preco_compra_atual'];
$obs = $_POST['obs'];



	
	
	
$comando = "insert into inventario_entrada(data_entrada,hora_entrada,fornecedor,nf,data_nf,nome_produto,grupo,sub_grupo,unidade,quantidade,preco_compra,obs,codigoproduto,estab_pertence,operador,part_number) 
values('$data','$hora','$fornecedor','$nf','$data_nf','$nome_produto','$grupo','$sub_grupo','$unidade','$quantidade','$preco_compra_atual','$obs','$codigoproduto','$estab_pertence','$operador','$part_number')";

mysql_query($comando,$conexao) or die("Erro ao gravar entrada no estoque!");


echo "Entrada no estoque do produto realizada com sucesso!<br><br>";



$calcula_diferenca = bcsub($quant_estoque,$quantidade);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`inventario01112020` set `quant_estoque` = '$totaliza_quantidade' where `inventario01112020`. `codigo` = '$codigoproduto' limit 1 ";
}
mysql_query($comando,$conexao);


	


?>
</span>
</p>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="30%"><form name="form1" method="post" action="../menu.php">
        <input class='class01' type="submit" name="Submit" value="Voltar">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input name="nf" type="hidden" id="nf" value="<? echo "$nf"; ?>">
        </span>
        <input name="dia_nf" type="hidden" id="dia_nf" value="<? echo "$dia_nf"; ?>">
        <input name="mes_nf" type="hidden" id="mes_nf" value="<? echo "$mes_nf"; ?>">
        <input name="ano_nf" type="hidden" id="ano_nf" value="<? echo "$ano_nf"; ?>">
        <span class="style1">
        <input name="fornecedor" type="hidden" id="fornecedor" value="<? echo "$fornecedor"; ?>">
        </span>
        <span class="style1">
        <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo "$nome_produto"; ?>">
        </span>
        <span class="style1">
        <input name="preco_compra" type="hidden" id="preco_compra" value="<? echo "$preco_compra"; ?>">
        </span>
      </form></td>
      <td width="36%">&nbsp;</td>
      <td width="34%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>

<?
mysql_close($conexao);
?>