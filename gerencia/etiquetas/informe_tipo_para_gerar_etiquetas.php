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
<title>Gerar Etiquetas</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	color: #0000FF;
	font-weight: bold;
}
-->
</style></head>

<body>
<p><?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';
error_reporting(E_ALL);

?>

<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome = $linha[1];
$celular = $linha[19];
$email = $linha[20];
$estab_pertence = $linha[44];
$cidade_estabelecimento = $linha[45];
$tel_estabelecimento = $linha[46];
$email_estabelecimento = $linha[47];
}
?>


</p>
<form name="form1" method="post" action="../principal.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar ao menu principal">
</form>
<p>&nbsp;</p>
<form action="etiquetas.php" method="post" enctype="multipart/form-data" name="form1" target="_blank">
  <table width="100%"  border="0">
    <tr>
      <td width="35%"><strong>Cidade<br>
      </strong></td>
      <td width="10%"><span class="style1"><? echo $estab_pertence; ?>
          <strong>
          <input name="estabelecimento" type="hidden" id="estabelecimento2" value="<? echo $estab_pertence; ?>">
      </strong></span></td>
      <td colspan="2"><strong>
      </strong>       </td>
    </tr>
    <tr>
      <td><strong>Informe o p&uacute;blico alvo para gerar as etiquetas</strong></td>
      <td><strong>
        <select name="tipo" id="select">
          <?


    $sql = "select * from tipos order by tipo asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
        </select>
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="31%"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit" value="Gerar Etiquetas"></td>
      <td width="24%">&nbsp;</td>
    </tr>
  </table>
</form>

<p>&nbsp;</p>
</body>
</html>
