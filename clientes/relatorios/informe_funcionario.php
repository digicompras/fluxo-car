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
<title>Relat&oacute;rio de Produ&ccedil;&atilde;o por correspondente</title>
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
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';

$nfantasia = $_POST['nfantasia'];


error_reporting(E_ALL);
?>
</p>
<table width="100%"  border="0">
  <tr>
    <td><form name="form1" method="post" action="menu.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit22" value="Voltar">
      <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $nfantasia; ?>">
    </form></td>
    <td><form name="form1" method="post" action="../index.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit2" value="Voltar ao menu principal">
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<form action="relatorio_compras_por_funcionario.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
    <tr>
      <td width="35%">Informe a empresa conveniada <br></td>
      <td width="17%">      <strong><font color="#0000FF">
        <select name="nome" id="select5">
          <?


    $sql = "select * from usuarios where estab_pertence = '$nfantasia' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
    }
?>
        </select>
      </font></strong></td>
      <td width="48%">&nbsp;        </td></tr>
    <tr>
      <td>Informe o m&ecirc;s-ano </td>
      <td><input name="mes_ano" type="text" id="mes_ano" size="7" maxlength="7"> 
      mm-aaaa 
      <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $nfantasia; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit" value="Gerar Relat&oacute;rio"></td>
      <td>&nbsp;      </td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
