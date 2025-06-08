<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

?>

<?
require '../../conect/conect.php';

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


error_reporting(E_ALL);


$codigo = $_POST['codigo'];
$cod_produto = $_POST['cod_produto'];
$bco_operacao = $_POST['bco_operacao'];
$tipo_proposta = $_POST['tipo_proposta'];
$faixa = $_POST['faixa'];
$com_empresa = $_POST['com_empresa'];
$com_bruta = $_POST['com_bruta'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$data_inicial = $_POST['data_inicial'];
$data_final = $_POST['data_final'];
$dataalteracao = $_POST['dataalteracao'];
$horaalteracao = $_POST['horaalteracao'];
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
$reg = 0;
$reg++;



$comando = "update `$linha[1]`.`produtos` set `codigo` = '$codigo',`faixa` = '$faixa',`com_empresa` = '$com_empresa',`com_bruta` = '$com_bruta',`a` = '$a',`b` = '$b',`c` = '$c',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`data_inicial` = '$data_inicial',`data_final` = '$data_final',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou' where `produtos`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao) or die("Erro ao salvar as alterações!  Tente novamente!");


echo "Produto alterado no banco de dados com sucesso<br>";


?>

<?

$comando = "insert into historico_alteracao_produtos(tipo_proposta,bco_operacao,faixa,com_bruta,a,b,c,data_inicial,data_final,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,dataalteracao,horaalteracao,cod_produto,com_empresa) 

values('$tipo_proposta','$bco_operacao','$faixa','$com_bruta','$a','$b','$c','$data_inicial','$data_final','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$dataalteracao','$horaalteracao','$cod_produto','$com_empresa')";

mysql_query($comando,$conexao);


?>

<html>
<head>
<title>Documento sem t&iacute;tulo</title>
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
</p>
<form name="form2" method="post" action="selecione_codigo_para_edicao.php">
  <? 
  
  
  
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
 ?>
  <input type="submit" name="Submit3" value="Voltar">
</form>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>