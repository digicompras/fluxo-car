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
<title>ZONA DE IP's</title>
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
<form action="informe_ip_para_exclusao.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
    <tr>
      <td width="20%">Informe o IP  a ser exclu&iacute;do <br></td>
      <td width="25%"><input type="text" name="ip" id="ip"></td>
      <td width="55%"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit" value="Buscar"></td></tr>
  </table>
</form>
<?


$ip = $_POST['ip'];
			

$sql = "SELECT * FROM ips where ip = '$ip' order by estab_pertence asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$ip = $linha[1];
$agencia = $linha[2];

?>
<table width="50%"  border="0" align="center">
  <tr bgcolor="#<? echo $cor ?>">
    <td><div align="center">N&ordm; IP</div></td>
    <td><div align="center">Agencia</div></td>
  </tr>
  <tr>
    <td width="7%"><div align="center">
      <form name="form2" method="post" action="excluir_ip.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
        <input type="submit" name="button" id="button" value="<? echo $ip; ?>">
      </form>
    </div></td>
    <td width="11%"><div align="center"><? echo $agencia;?></div></td>
    <? } ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</table>
<p>&nbsp;</p>

</body>
</html>
