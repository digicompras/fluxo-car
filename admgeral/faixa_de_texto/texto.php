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
<title>Edi&ccedil;&atilde;o de produtos</title>
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
<p class="style2">Alterano o texto de rolagem da barra superior </p>
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit22" value="Voltar">
</form>
<p>&nbsp;</p>
<form action="autalizar.php" method="post" name="form2">
  <table width="100%"  border="0">
        <tr>
          <td width="36%">
<?


$sql = "select * from faixa_de_texto";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;
echo "<tr>";
$reg++;
?>
		  
		  </td>
          <td width="39%"><input name="codigo" type="hidden" id="codigo" value="<? echo "0"; ?>"></td>
          <td width="25%">&nbsp;</td>
        </tr>
        <tr>
          <td height="40">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="40" colspan="3"><input name="texto" type="text" id="texto" value="<? echo $linha[1]; ?>" size="120"></td>
        </tr>
        <tr>
          <td height="40">&nbsp;</td>
          <td><input type="submit" name="Submit2" value="Atualizar nome do banco"></td>
          <td>&nbsp;</td>
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
</body>
</html>
