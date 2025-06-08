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
	
<?

require '../../conect/conect.php';

?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>

<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

<p>        

<?

$dia_inicial1 = $_POST['dia_inicial'];
$dia_inicial2 = "01";
if(empty($dia_inicial1)){

$dia_inicial = $dia_inicial2;
	
}
else{
	
$dia_inicial = $dia_inicial1;
	
}

$mes_inicial1 = $_POST['mes_inicial'];
$mes_inicial2 = date('m');
if(empty($mes_inicial1)){

$mes_inicial = $mes_inicial2;
	
}
else{
	
$mes_inicial = $mes_inicial1;
	
}


$ano_inicial1 = $_POST['ano_inicial'];
$ano_inicial2 = date('Y');
if(empty($ano_inicial1)){

$ano_inicial = $ano_inicial2;
	
}
else{
	
$ano_inicial = $ano_inicial1;
	
}


$dia_final1 = $_POST['dia_final'];
$dia_final2 = 31;
if(empty($dia_final1)){

$dia_final = $dia_final2;
	
}
else{
	
$dia_final = $dia_final1;
	
}


$mes_final1 = $_POST['mes_final'];
$mes_final2 = date('m');
if(empty($mes_final1)){

$mes_final = $mes_final2;
	
}
else{
	
$mes_final = $mes_final1;
	
}


$ano_final1 = $_POST['ano_final'];
$dano_final2 = date('Y');
if(empty($ano_final1)){

$ano_final = $ano_final2;
	
}
else{
	
$ano_final = $ano_final1;
	
}


?>


</p>

<p>&nbsp;</p>





<?

error_reporting(E_ALL);





$codigo = $_POST['codigo'];



$comando = "delete from `custo_fixo` where `custo_fixo`. `codigo` = '$codigo' limit 1 ";



mysql_query($comando,$conexao) or die("Erro ao excluir conta do custo fixo"); ?>



<? echo "Conta do custo fixo excluída com sucesso!"; ?> 





<?

mysql_close($conexao);

?>



<form name="form1" method="post" action="menu.php">

  <input type="submit" name="Submit" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
  <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
  <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
  <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
  <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
  <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
</form>

<p>&nbsp;</p>

</body>

</html>

