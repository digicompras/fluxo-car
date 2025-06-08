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
error_reporting(E_ALL);

//require('file:///F|/webs/pedcell/conexao.php') or die("Erro ao incluir arquivo");
require '../../conect/conect.php';

$barra_lat_esq = $_POST['barra_lat_esq'];


$comando = "insert into b_lat_esq(barra_lat_esq) values('$barra_lat_esq')";

mysql_query($comando,$conexao) or die("Erro ao gravar dados");

mysql_close($conexao);

echo "Cor da barra lateral esquerda inserida com sucesso pela 1º vez no sistema!<br>A partir de agora utilize apenas a opção ";


?>
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<p>&nbsp;</p>
<form name="form1" method="post" action="../menu.php">
  <input type="submit" name="Submit" value="Voltar">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<p>&nbsp;</p>
</body>
</html>
