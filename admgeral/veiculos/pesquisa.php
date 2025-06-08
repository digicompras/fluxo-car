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
<title>PESQUISA DE VE&Iacute;CULOS</title>
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


$concessionaria = $_POST['concessionaria'];

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
<p><strong>Escolha a concession&aacute;ria e informe o chassi ou renavam para pesquisa! </strong></p>
<form action="verifica.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="60%"  border="0" align="center">
    <tr>
      <td>Placa</td>
      <td><input name="placa" type="text" id="placa"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="33%">CHASSI<br></td>
      <td width="25%"><input name="chassi" type="text" id="chassi"></td>
      <td width="42%"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit" value="Verificar "></td></tr>
    <tr>
      <td> RENAVAM<br></td>
      <td><input name="renavam" type="text" id="renavam"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<form action="ver_todos_veiculos_da_concessionaria.php" method="post" enctype="multipart/form-data" name="form1" target="_blank">
  <table width="60%"  border="0" align="center">
    <tr>
      <td width="33%">Concession&aacute;ria</td>
      <td width="25%"><select name="concessionaria" id="concessionaria">
        <option selected><? echo $concessionaria; ?></option>
        <?


    $sql = "select * from estabelecimentos order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
      </select></td>
      <td width="42%"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit3" value="Verificar "></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
