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
// dados do investimento
$codigo = $_POST['codigo'];

$dataalteracao = $_POST['dataalteracao'];
$horaalteracao = $_POST['horaalteracao'];
$dia_alteracao = $_POST['dia_alteracao'];
$mes_alteracao = $_POST['mes_alteracao'];
$ano_alteracao = $_POST['ano_alteracao'];
$banco = $_POST['banco'];
$inss = $_POST['inss'];
$exercito = $_POST['exercito'];
$prefeitura = $_POST['prefeitura'];
$prefeitura_morro_agudo = $_POST['prefeitura_morro_agudo'];
$prefeitura_jardinopolis = $_POST['prefeitura_jardinopolis'];
$prefeitura_pat_paulista = $_POST['prefeitura_pat_paulista'];
$carro_bv = $_POST['carro_bv'];
$carro_omni = $_POST['carro_omni'];
$privado = $_POST['privado'];
$siape = $_POST['siape'];
$aeronautica = $_POST['aeronautica'];
$nf = $_POST['nf'];
$comissao = $_POST['comissao'];
$correios = $_POST['correios'];
$governo_minas_gerais = $_POST['governo_minas_gerais'];
$ipremo = $_POST['ipremo'];

$obs = $_POST['obs'];
$dia_ref = $_POST['dia_ref'];
$mes_ref = $_POST['mes_ref'];
$ano_ref = $_POST['ano_ref'];

//dados do operador

$operador_alterou = $_POST['operador_alterou'];
$cel_operador_alterou = $_POST['cel_operador_alterou'];
$email_operador_alterou = $_POST['email_operador_alterou'];
$estabelecimento_alterou = $_POST['estabelecimento_alterou'];
$cidade_estabelecimento_alterou = $_POST['cidade_estabelecimento_alterou'];
$tel_estabelecimento_alterou = $_POST['tel_estabelecimento_alterou'];
$email_estabelecimento_alterou = $_POST['email_estabelecimento_alterou'];





$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`fechamento` set `codigo` = '$codigo',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`dia_alteracao` = '$dia_alteracao',`mes_alteracao` = '$mes_alteracao',`ano_alteracao` = '$ano_alteracao',`banco` = '$banco',`inss` = '$inss',`exercito` = '$exercito',`prefeitura` = '$prefeitura',`dia_ref` = '$dia_ref',`mes_ref` = '$mes_ref',`ano_ref` = '$ano_ref',`prefeitura_morro_agudo` = '$prefeitura_morro_agudo',`prefeitura_jardinopolis` = '$prefeitura_jardinopolis',`prefeitura_pat_paulista` = '$prefeitura_pat_paulista',`carro_bv` = '$carro_bv',`carro_omni` = '$carro_omni',`privado` = '$privado',`siape` = '$siape',`aeronautica` = '$aeronautica',`nf` = '$nf',`correios` = '$correios',`comissao` = '$comissao',`governo_minas_gerais` = '$governo_minas_gerais',`ipremo` = '$ipremo',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',
`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou' where `fechamento`. `codigo` = '$codigo' limit 1 ";
}

mysql_query($comando,$conexao) or die("Erro ao alterar informações desse lançamento de fechamento");


echo "Lançamento de fechamento alterado com sucesso<br><br>";
?>



<body>
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar">
</form>
</body>
</html>
<?
mysql_close($conexao);
?>
