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
<p>        <?
require '../../conect/conect.php';
?>

</p>
<p>&nbsp;</p>


<?
error_reporting(E_ALL);


$codigo = $_POST['codigo'];
$texto = $_POST['texto'];

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`faixa_de_texto` set `texto` = '$texto' where `faixa_de_texto`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao) or die("Erro ao gravar texto");

echo "O novo texto foi alterado com sucesso";
?>

<?
mysql_close($conexao);
?>

<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar">
</form>
<p>&nbsp;</p>
</body>
</html>
