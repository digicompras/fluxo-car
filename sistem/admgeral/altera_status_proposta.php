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

<?
if($solicitacao=="alterar status proposta"){

echo "<table width='100%' border='0'>
  <tr>
    <td width='31%'>&nbsp;</td>
    <td width='39%'><div align='center'><strong>Altera&ccedil;&atilde;o de status de proposta</strong></div></td>
    <td width='30%'>&nbsp;</td>
  </tr>
  <tr>
    <td><div align='center'></div></td>
    <td><div align='center'>
      <form action='propostas/status_proposta.php' method='post' name='form12' target='navegacao'>";
	  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
        echo "Proposta
  <input name='num_proposta' type='text' id='num_proposta' size='11'>
        comiss&atilde;o
  <input name='percentual' type='text' id='percentual' size='4' maxlength='4'>
        % Comiss&atilde;o op
  <input name='percentual_op' type='text' id='percentual_op' size='4' maxlength='4'>
  <input type='submit' name='Submit15' value='Status'>
      </form>
    </div></td>
    <td><div align='center'></div></td>
  </tr>
</table>";

}

?>
<p>
</body>

</html>

