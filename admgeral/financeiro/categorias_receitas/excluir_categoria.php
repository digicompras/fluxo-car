<?php
session_start(); //inicia sess�o...
if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...
echo ""; //se for emite mensagem positiva.
else //se n�o for...
header("Location: alerta.php");

?>

<html>
<head>
<title>Processamento de arquivos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<p><?
//SE CONECTA AO BANCO DE DADOS DIGICOMPRAS
require '../../../conect/conect.php';
?>

</p>
<p>&nbsp;</p>


<?
error_reporting(E_ALL);


$codigo = $_POST['codigo'];

$sql = "SELECT * FROM categorias_receitas where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$categoria = $linha{'1'};
$departamento = $linha{'2'};

}


$sql = "SELECT * FROM cx_entradas where categoria_conta = '$categoria' and departamento = '$departamento' order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);

}


if($registros==0){
	
$comando = "delete from `categorias_receitas` where `categorias_receitas`. `codigo` = '$codigo' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao excluir categoria de receita");

echo "Categoria de receita exclu�da com sucesso:";

}
else{

echo "ATEN��O!!!... categoria $categoria e dapartamento $departamento, j� possui moviment��o, permiss�o negada para exclui-la!!!...";

}
 ?> 


<?
mysql_close($conexao);
?>

<form name="form1" method="post" action="menu.php">
  <input type="submit" name="Submit" value="Voltar">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<p>&nbsp;</p>
</body>
</html>
