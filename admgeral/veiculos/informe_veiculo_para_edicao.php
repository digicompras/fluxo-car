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
<title>Edi&ccedil;&atilde;o de produtos</title>
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
//require("conect/conect.php"); or die("erro na requisi��o");
require '../../conect/conect.php';
error_reporting(E_ALL);

?>

</p>
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar">
</form>
<p>&nbsp;</p>
<form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
    <tr>
      <td width="33%">Informe o CHASSI do ve&iacute;culo a ser pesquisado <br></td>
      <td width="25%"><input name="chassi" type="text" id="chassi"></td>
      <td width="42%">&nbsp; </td>
    </tr>
    <tr>
      <td>Informe o RENAVAM do ve&iacute;culo a ser pesquisado <br></td>
      <td><input name="renavam" type="text" id="renavam"></td>
      <td><input type="submit" name="Submit" value="Editar Ve&iacute;culo">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
