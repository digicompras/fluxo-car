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

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit3" value="Voltar">

</form>

<form action="grava_banco.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="2">        <?

require '../../conect/conect.php';

?>



</td>

    </tr>

    <tr>

      <td width="22%">&nbsp;</td>

      <td width="78%"><strong><font color="#0000FF" size="4">Tela de cadastro de bancos de opera&ccedil;&atilde;o!</font></strong></td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr> 

      <td><font color="#0000FF"><strong>N&ordm; e Nome do banco <font color="#0000FF">:</font></strong></font></td>

      <td><input name="banco" type="text" id="banco" size="50"></td>

    </tr>

    <tr> 

      <td>&nbsp;</td>

      <td><input type="submit" name="Submit" value="Gravar Banco">

      <input type="reset" name="Submit2" value="Limpar"></td>

    </tr>

    <tr> 

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

</form>

<?







//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 

$sql = "select * from bco_operacao";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;
echo "<tr>";
$reg++;

?>

<td>

<br>

<span class="style1">Código:</span> <? printf("$linha[0]<br>"); ?>

<span class="style1">Banco:</span> <? printf("$linha[1]<br>"); ?>

</td>

<?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>



<? } ?>



<p>&nbsp; </p>

</body>



</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>



