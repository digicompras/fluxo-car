<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

?>

<html>

<head>

<title>Untitled Document</title>

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

</style>

</head>



<?

//require("conect/conect.php"); or die("erro na requisição");

require '../../../conect/conect.php';

error_reporting(E_ALL);



?>

<?

$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];



// dados do lancamento

$cod_contas_a_pagar = $_POST['cod_contas_a_pagar'];

$empresa = $_POST['empresa'];

$categoria_conta = $_POST['categoria_conta'];
$departamento = $_POST['departamento'];

$num_doc = $_POST['num_doc'];

$valor_a_pagar = $_POST['valor_a_pagar'];

$historico = $_POST['historico'];

$dia_evento = $_POST['dia_evento'];
$mes_evento = $_POST['mes_evento'];
$ano_evento = $_POST['ano_evento'];

$dateevento = "$ano_evento-$mes_evento-$dia_evento";


$hora_evento = $_POST['hora_evento'];
$minuto_evento = $_POST['minuto_evento'];
$segundo_evento = $_POST['segundo_evento'];


$horaevento = "$hora_evento:$minuto_evento:$segundo_evento";

$fornecedor = $_POST['fornecedor'];

$modopagto = $_POST['modopagto'];

$banco = $_POST['banco'];

$contacorrente = $_POST['contacorrente'];

$dia_vencto = $_POST['dia_vencto'];
$mes_vencto = $_POST['mes_vencto'];
$ano_vencto = $_POST['ano_vencto'];

$vencto = "$ano_vencto-$mes_vencto-$dia_vencto";



$dia = date('d');
$mes = date('m');
$ano = date('Y');

$dataalteracao = "$dia-$mes-$ano";
$horaalteracao = date('H:i:s');

$datealteracao = "$ano-$mes-$dia";


//dados do operador que alterou





$operador_alterou = $_POST['operador_alterou'];

$cel_operador_alterou = $_POST['cel_operador_alterou'];

$email_operador_alterou = $_POST['email_operador_alterou'];



//dados do estabelecimento que alterou



$estabelecimento_alterou = $_POST['estabelecimento_alterou'];

$cidade_estabelecimento_alterou = $_POST['cidade_estabelecimento_alterou'];

$tel_estabelecimento_alterou = $_POST['tel_estabelecimento_alterou'];

$email_estabelecimento_alterou = $_POST['email_estabelecimento_alterou'];



$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`contas_a_pagar` set `empresa` = '$empresa',`categoria_conta` = '$categoria_conta',`valor_a_pagar` = '$valor_a_pagar',`historico` = '$historico',`dia_evento` = '$dia_evento',`mes_evento` = '$mes_evento',`ano_evento` = '$ano_evento',`dateevento` = '$dateevento',`hora_evento` = '$hora_evento',`minuto_evento` = '$minuto_evento',`segundo_evento` = '$segundo_evento',

`horaevento` = '$horaevento',`fornecedor` = '$fornecedor',`modopagto` = '$modopagto',`banco` = '$banco',`contacorrente` = '$contacorrente',`dia_vencto` = '$dia_vencto',`mes_vencto` = '$mes_vencto',`ano_vencto` = '$ano_vencto',`vencto` = '$vencto',`dia` = '$dia',`mes` = '$mes',`ano` = '$ano',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`datealteracao` = '$datealteracao',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`departamento` = '$departamento',`num_doc` = '$num_doc' where `contas_a_pagar`. `codigo` = '$cod_contas_a_pagar' limit 1 ";

}



mysql_query($comando,$conexao) or die("Erro ao alterar informações desse lançamento do contas a pagar");





echo "Lançamento do contas a pagar alterado com sucesso<br><br>";

?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

<form name="form1" method="post" action="menu.php">

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
  <input class="class01" type="submit" name="Submit2" value="Voltar">

</form>

</body>

</html>

<?

mysql_close($conexao);

?>

