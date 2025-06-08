<?php
session_start(); //inicia sessão...
if ($_SESSION["codigo"] == true) //verifica se a variável "usuario" é verdadeira...
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
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td colspan="2"><?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';

$num_cartao = $_POST['num_cartao'];


error_reporting(E_ALL);
?>


</td>
    </tr>
    <tr>
      <td><form name="form1" method="post" action="../index.php">
        <?
$codigo = $_SESSION['codigo'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit22" value="Voltar ao menu principal">
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="23%">&nbsp;</td>
      <td width="77%"><strong><font color="#0000FF" size="4">Gerar relat&oacute;rios </font></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form action="relatorio_compras_todos_funcionarios.php" method="post" name="form2">
        <?
$codigo = $_SESSION['codigo'];
$senha = $_SESSION['senha'];
?>
        <input name="num_cartao" type="hidden" id="num_cartao" value="<? echo $num_cartao; ?>">
        Informe o m&ecirc;s-ano 
        <input name="mes_ano" type="text" id="mes_ano" size="7" maxlength="7">
mm-aaaa        
<input type="submit" name="Submit23" value="Relat&oacute;rio geral de compras de meus funcion&aacute;rios">
      </form></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><strong><font color="#0000FF">
      </font></strong></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td>&nbsp;</td>
    </tr>
  </table>
<p>&nbsp; </p>
</body>
</html>
