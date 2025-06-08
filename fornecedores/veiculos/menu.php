<?php
session_start(); //inicia sessão...
if ($_SESSION["cnpj"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...
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
error_reporting(E_ALL);

$cnpj = $_POST['cnpj'];

?>



                    </td>
    </tr>
    <tr>
      <td width="22%">&nbsp;</td>
      <td width="78%"><strong><font color="#0000FF" size="4">O que deseja fazer com os ve&iacute;culos?</font></strong></td>
    </tr>
    <tr>
      <td><form name="form1" method="post" action="../index.php">
        <?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
        <input type="submit" name="Submit22" value="Voltar ao menu principal">
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"></div>        <form action="pesquisa.php" method="post" name="form2">
        <?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
        <input type="submit" name="Submit2" value="Cadastrar Ve&iacute;culo">
        <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
      </form></td> 
    </tr>
    <tr>
      <td colspan="2"><div align="center"></div>        </td>
    </tr>
  </table>
<p>&nbsp; </p>
</body>
</html>
