<?php
session_start(); //inicia sess�o...
if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...
echo ""; //se for emite mensagem positiva.
else //se n�o for...
header("Location: alerta.php");

?>

<?
error_reporting(E_ALL);

//require('file:///F|/webs/pedcell/conexao.php') or die("Erro ao incluir arquivo");
require '../../conect/conect.php';

$tipo = $_POST['tipo'];


$comando = "insert into tipos_benef(tipo) values('$tipo')";

mysql_query($comando,$conexao) or die("Erro ao gravar tipo de benef�cio");


echo "Tipo de benef�cio gravado com sucesso<br>";


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
-->
</style></head>

<body>
</p>
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
<?
mysql_close($conexao);
?>