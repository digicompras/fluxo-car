<?php

session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

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

<p><?

//SE CONECTA AO BANCO DE DADOS DIGICOMPRAS

require '../../../conect/conect.php';

?>



</p>

<p class="style2">Altera&ccedil;&atilde;o de nome de categoria de receita. </p>

<form name="form1" method="post" action="menu.php">

  <input type="submit" name="Submit" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form>

<p>&nbsp;</p>

<form action="autalizar_categoria.php" method="post" name="form2">

  <table width="100%"  border="0">

        <tr>

          <td width="25%">

<?



$codigo = $_POST['codigo'];



$sql = "SELECT * FROM categorias_receitas where codigo = '$codigo'";

//EXECUTA O COMANDO ACIMA

$res = mysql_query($sql);



$reg = 0;

//VERIFICA SE O COMANDO FOI EXECUTADO COM SUCESSO...

//if($res) {

//EXIBE PARA O USUARIO

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;

?></td>

          <td width="50%"><input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>"></td>

          <td width="25%">&nbsp;</td>

        </tr>

        <tr>

          <td height="40">Altere o  nome da Categoria</td>

          <td><input name="categoria" type="text" id="categoria" value="<? echo $linha[1]; ?>" size="70">
          <input name="categoria_old" type="hidden" id="categoria_old" value="<? echo $linha[1]; ?>"></td>

          <td>&nbsp;</td>

        </tr>

        <tr>

          <td height="40">&nbsp;</td>

          <td><input type="submit" name="Submit2" value="Atualizar"></td>

          <td>&nbsp;</td>

        </tr>

  </table>

            <?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>



          <? } ?>



</form>

            </option>

          </select></td>

          <td width="25%">&nbsp;</td>

        </tr>

        <tr>

        </tr>

  </table>

</form>



<?

//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 

$sql = "select * from categorias_receitas order by categoria";

//$sql = "SELECT fabricante FROM veiculos where='Diversos'";

//EXECUTA O COMANDO ACIMA

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg = 0;

//VERIFICA SE O COMANDO FOI EXECUTADO COM SUCESSO...

//if($res) {

//EXIBE PARA O USUARIO

echo "<tr>";

//while($linha=mysql_fetch_row($res)) {

$reg++;

?>

<td>

<br>

<span class="style1">C�digo:</span> <? printf("$linha[0]<br>"); ?>

<span class="style1">Categoria:</span> <? printf("$linha[1]<br>"); ?>



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

