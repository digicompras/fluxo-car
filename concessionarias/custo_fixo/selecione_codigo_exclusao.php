<?php

session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

?>

<?

require '../../conect/conect.php';

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



<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

<p class="style2">Exclus&atilde;o de contas de custo fixo</p>

<form name="form1" method="post" action="estado_insert.php">

  <input class="class01" type="submit" name="Submit2" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form>

<form action="excluir.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%"  border="0">

    <tr>

      <td width="35%">Selecione o c&oacute;digo da conta a ser exclu&iacute;da<br></td>

      <td width="25%"><select class="class02" name="codigo" id="select4">

        <option value="null" selected>Selecione

        <?





    $sql = "select * from custo_fixo order by codigo";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['codigo']."</option>";

    }

?>

        </option>

      </select></td>

      <td width="40%"><input class="class01" type="submit" name="Submit" value="Excluir"></td>

    </tr>

  </table>

</form>

<?


$sql = "select * from custo_fixo order by conta";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg = 0;

$codigo = $linha[0];
$conta = $linha[1];
$categoria = $linha[2];
$valor = $linha[3];
$vencto = $linha[4];



echo "<tr>";

//while($linha=mysql_fetch_row($res)) {

$reg++;

?>

<td>

<br>

<span class="style1">C�digo:</span> <? echo $codigo; ?>

<span class="style1">Conta:</span> <? echo $conta; ?>

<span class="style1">Categoria:</span> <? echo $categoria; ?>

<span class="style1">Valor:</span> <? echo $valor; ?>

<span class="style1">Vencto:</span> <? echo $vencto; ?>


</td>

<?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>



<? } ?>



<p>&nbsp;</p>

</body>

</html>

