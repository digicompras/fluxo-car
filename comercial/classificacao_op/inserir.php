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
<title>Inserir</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name="form1" method="post" action="menu.php">
  <input type="submit" name="Submit3" value="Voltar">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<form action="gravar.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td colspan="2">        <?
require '../../conect/conect.php';
?>

</td>
    </tr>
    <tr>
      <td width="11%">&nbsp;</td>
      <td width="89%"><strong><font color="#0000FF" size="4">Tela de cadastro de classifica&ccedil;&atilde;o de operador!</font></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#0000FF"><strong>Classifica&ccedil;&atilde;o</strong></font></td>
      <td><select name="classe" id="classe">
        <option selected>A</option>
        <option>B</option>
        <option>C</option>
      </select></td>
    </tr>
    <tr> 
      <td><strong><font color="#0000FF">Percentual</font></strong></td>
      <td><input name="percentual" type="text" id="estado2" size="5" maxlength="5"> 
        %</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Gravar Classifica&ccedil;&atilde;o">
      <input type="reset" name="Submit2" value="Limpar"></td>
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

<p>&nbsp; </p>
</body>

</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>

