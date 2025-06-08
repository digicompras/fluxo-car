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
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit22" value="Voltar">
</form>
<form action="grava_ip.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td colspan="3"><?
require '../../conect/conect.php';
?></td>
    </tr>
    <tr>
      <td width="11%">&nbsp;</td>
      <td width="26%"><strong><font color="#0000FF" size="4">Informe o N&ordm; do IP a ser autorizado</font></strong></td>
      <td width="63%"><strong><font color="#0000FF" size="4">Informe a qual estabelecimento o IP se refere</font></strong></td>
    </tr>
    
    <tr> 
      <td>&nbsp;</td>
      <td><input name="ip" type="text" id="ip" size="40"></td>
      <td><select name="estab_pertence" id="select6">
        <option selected></option>
        <?





    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
      </select></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Salvar">
      <input type="reset" name="Submit2" value="Limpar"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</body>
</html>
