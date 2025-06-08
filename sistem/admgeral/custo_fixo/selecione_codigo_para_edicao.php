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

<p class="style2">Edi&ccedil;&atilde;o de contas de custo fixo</p>

<form name="form1" method="post" action="menu.php">

  <input type="submit" name="Submit2" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form><p>
<p>
<form action="editar.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%"  border="0">

    <tr>

      <td width="35%">Selecione o c&oacute;digo a ser editado<br></td>

      <td width="25%"><select name="codigo" id="select4">

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

      <td width="40%"><input type="submit" name="Submit" value="Editar"></td>

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

<span class="style1">Código:</span> <? echo $codigo; ?>

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

