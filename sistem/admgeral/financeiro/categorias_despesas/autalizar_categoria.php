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

<title>Processamento de arquivos</title>

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

<?

//SE CONECTA AO BANCO DE DADOS DIGICOMPRAS

require '../../../conect/conect.php';

?>



</p>

<p>&nbsp;</p>





<?

error_reporting(E_ALL);





$codigo = $_POST['codigo'];

$categoria = $_POST['categoria'];

$categoria_old = $_POST['categoria_old'];


$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`categorias_despesas` set `categoria` = '$categoria' where `categorias_despesas`. `codigo` = '$codigo' limit 1 ";

}

mysql_query($comando,$conexao) or die("Erro ao alterar o nome da categoria de despesa");



echo "As novas informa��es sobre a nomenclatura da categoria de despesa foram alteradas com sucesso";

?>

<br>
<?

$sql = "SELECT * FROM cx_saidas where categoria_conta = '$categoria_old'  order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);



$codigo_saida = $linha[0];



$sql2 = "select * from db";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {





$comando = "update `$linha[1]`.`cx_saidas` set `categoria_conta` = '$categoria' where `cx_saidas`. `codigo` = '$codigo_saida'";

}

mysql_query($comando,$conexao) or die("Erro ao alterar o nome da categoria de despesa nos registros de sa�da do caixa!");


}
echo "Nomenclatura da categoria de despesa foram atualizadas com sucesso nos $registros registros de sa�da do caixa!";

?>


<?

mysql_close($conexao);

?>



<form name="form1" method="post" action="menu.php">

  <input type="submit" name="Submit" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form>

<p>&nbsp;</p>

</body>

</html>

