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

<title>Relat&oacute;rio de Produ&ccedil;&atilde;o</title>

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

<p>&nbsp;</p>

<p>

<p>

<?

if($solicitacao=="buscar bordero"){

echo "<table width='100%' border='0'>
  <tr>
    <td width='23%'><div align='center'></div></td>
    <td width='43%'><div align='center'><strong>Busca de border&ocirc;</strong></div></td>
    <td width='34%'><div align='center'></div></td>
  </tr>
  <tr>
    <td><div align='center'></div></td>
    <td><div align='center'>
      <form name='form2' method='post' action='borderos/borderos.php' target='navegacao'>
        N&ordm; do Border&ocirc;
  <input name='num_bordero_receber' type='text' id='num_bordero_receber' size='10'>
  <input type='submit' name='Submit25' value='Buscar Border&ocirc;'>";
  ?>
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
<?
      echo "</form>
    </div></td>
    <td><div align='center'></div></td>
  </tr>
</table>";

}

?>
<p>
</body>

</html>

