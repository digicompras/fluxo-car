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
<?
error_reporting(E_ALL);

require '../../conect/conect.php';


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

printf("<a href='index.php' target='_top'><img src='../../imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'></a>"); ?>


          <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>

          <? } ?>

</p>
<form name="form1" method="post" action="inserir.php">
  <input type="submit" name="Submit" value="Voltar">
</form>
<p>&nbsp;</p>
</body>
</html>
<?


$tipo_proposta = $_POST['tipo_proposta'];
$bco_operacao = $_POST['bco_operacao'];
$faixa = $_POST['faixa'];
$com_bruta = $_POST['com_bruta'];
$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$data_inicial = $_POST['data_inicial'];
$data_final = $_POST['data_final'];
$operador = $_POST['operador'];
$cel_operador = $_POST['cel_operador'];
$email_operador = $_POST['email_operador'];
$estabelecimento = $_POST['estabelecimento'];
$cidade_estabelecimento = $_POST['cidade_estabelecimento'];
$tel_estabelecimento = $_POST['tel_estabelecimento'];
$email_estabelecimento = $_POST['email_estabelecimento'];
$datacadastro = $_POST['datacadastro'];
$horacadastro = $_POST['horacadastro'];
$com_empresa = $_POST['com_empresa'];


?>
<br><br>
<?

$comando = "insert into produtos(tipo_proposta,bco_operacao,faixa,com_bruta,a,b,c,data_inicial,data_final,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,datacadastro,horacadastro,com_empresa) 

values('$tipo_proposta','$bco_operacao','$faixa','$com_bruta','$a','$b','$c','$data_inicial','$data_final','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$datacadastro','horacadastro','$com_empresa')";

mysql_query($comando,$conexao) or die("Erro ao gravar produto");


echo "Produto inserido no banco de dados com sucesso<br>";


?>


<?

$sql = "SELECT * FROM produtos order by codigo desc limit 1";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$cod_produto = $linha[0];

}
?>

<?

$comando = "insert into historico_alteracao_produtos(tipo_proposta,bco_operacao,faixa,com_bruta,a,b,c,data_inicial,data_final,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,datacadastro,horacadastro,cod_produto,com_empresa) 

values('$tipo_proposta','$bco_operacao','$faixa','$com_bruta','$a','$b','$c','$data_inicial','$data_final','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$datacadastro','$horacadastro','$cod_produto','$com_empresa')";

mysql_query($comando,$conexao);


?>

<?
mysql_close($conexao);
?>