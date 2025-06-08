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

<p>        

<?







require '../../conect/conect.php';



?>

</p>

<p>&nbsp;</p>





<?

error_reporting(E_ALL);





$imagem = $_FILES['imagem']['name'];
$posicao1 = $_POST['posicao1'];



$uploaddir1 = '../../publicidade/';

$uploadfile1 = $uploaddir1. $_FILES['imagem']['name'];



if(move_uploaded_file($_FILES['imagem']['tmp_name'], $uploaddir1 . $_FILES['imagem']['name'])){

//echo "Arquivo enviado com sucesso!";

} else {

echo "Erro no envio da arte 1";

}



$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg = 0;

$reg++;





$comando = "update `$linha[1]`.`publicidade` set `imagem` = '$imagem',`posicao` = '$posicao1' where `publicidade`. `posicao` = '1' limit 1 ";

}

mysql_query($comando,$conexao) or die("Erro ao gravar arte");



echo "Nova arte 1 insrida com sucesso!";

?>

<?

error_reporting(E_ALL);





$imagem2 = $_FILES['imagem2']['name'];
$posicao2 = $_POST['posicao2'];


$uploaddir2 = '../../publicidade/';

$uploadfile2 = $uploaddir2. $_FILES['imagem2']['name'];



if(move_uploaded_file($_FILES['imagem2']['tmp_name'], $uploaddir2 . $_FILES['imagem2']['name'])){

//echo "Arquivo enviado com sucesso!";

} else {

echo "Erro no envio da arte 2";

}



$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg = 0;

$reg++;





$comando = "update `$linha[1]`.`publicidade` set `imagem` = '$imagem2',`posicao` = '$posicao2' where `publicidade`. `posicao` = '2' limit 1 ";

}

mysql_query($comando,$conexao) or die("Erro ao gravar arte 2");



echo "Nova arte 2 insrida com sucesso!";

?>

<?

error_reporting(E_ALL);





$imagem3 = $_FILES['imagem3']['name'];
$posicao2 = $_POST['posicao2'];


$uploaddir3 = '../../publicidade/';

$uploadfile3 = $uploaddir3. $_FILES['imagem3']['name'];



if(move_uploaded_file($_FILES['imagem3']['tmp_name'], $uploaddir3 . $_FILES['imagem3']['name'])){

//echo "Arquivo enviado com sucesso!";

} else {

echo "Erro no envio da arte 3";

}



$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg = 0;

$reg++;





$comando = "update `$linha[1]`.`publicidade` set `imagem` = '$imagem3',`posicao` = '$posicao2' where `publicidade`. `posicao` = '3' limit 1 ";

}

mysql_query($comando,$conexao) or die("Erro ao gravar arte 3");



echo "Nova arte 3 insrida com sucesso!";

?>



<?

mysql_close($conexao);

?>



<form name="form1" method="post" action="menu.php">

  <input type="submit" name="Submit3" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form>

<p>&nbsp;</p>

</body>

</html>

