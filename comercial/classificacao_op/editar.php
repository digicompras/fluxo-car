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
<title>Edi&ccedil;&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {
	color: #0000FF;
	font-weight: bold;
	font-size: 24px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>
<p>        <?
require '../../conect/conect.php';
?>

</p>
<p class="style2">Altera&ccedil;&atilde;o de classifica&ccedil;&atilde;o de operadores. </p>
<form name="form1" method="post" action="menu.php">
  <input type="submit" name="Submit3" value="Voltar">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<form action="autalizar.php" method="post" name="form2">
  <table width="100%"  border="0">
        <tr>
          <td width="36%">
<?

$codigo = $_POST['codigo'];

$sql = "select * from classificacao_op where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;
echo "<tr>";
$reg++;

$classe = $linha[1];
$percentual = $linha[2];
?>
C&oacute;digo que est&aacute; sendo alterado </td>
          <td width="12%"><? echo $codigo; ?>            <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>"></td>
          <td width="52%">&nbsp;</td>
        </tr>
        <tr>
          <td height="40">Classifica&ccedil;&atilde;o que est&aacute; sendo alterada </td>
          <td><? echo $classe; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="40">Insira o novo percentual da classifica&ccedil;&atilde;o </td>
          <td><input name="percentual" type="text" id="percentual" value="<? echo $percentual; ?>" size="5" maxlength="5"></td>
          <td><input type="submit" name="Submit2" value="Atualizar"></td>
        </tr>
		          <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>

          <? } ?>

  </table>
</form>
            </option>
          </select></td>
          <td width="25%">&nbsp;</td>
        </tr>
        <tr>
        </tr>
  </table>
</form>

<?
$sql = "select * from classificacao_op order by codigo";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;
echo "<tr>";
$reg++;
?>
<td>
<br>
<span class="style1">Código:</span> <? printf("$linha[0]<br>"); ?>
<span class="style1">Classificação:</span> <? printf("$linha[1]<br>"); ?>
<span class="style1">Percentual:</span> <? printf("$linha[2]<br>"); ?>

</td>
<?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
}
?>

<p>&nbsp;</p>
</body>
</html>
