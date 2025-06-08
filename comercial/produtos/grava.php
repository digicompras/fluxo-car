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
error_reporting(E_ALL & ~E_NOTICE);

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

$sql = "SELECT * FROM produtos where bco_operacao = '$bco_operacao' and tipo_proposta = '$tipo_proposta' and faixa = '$faixa' and com_empresa = '$com_empresa' and com_bruta = '$com_bruta' and a = '$a' and b = '$b' and c = '$c'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);


$tipo_proposta_cadastrada = $linha[1];
$bco_operacao_cadastrado = $linha[2];
$faixa_cadastrada = $linha[3];
$com_bruta_cadastrada = $linha[4];
$a_cadastrada = $linha[5];
$b_cadastrada = $linha[6];
$c_cadastrada = $linha[7];
$data_inicial_cadastrada = $linha[8];
$data_final_cadastrada = $linha[9];
$operador_cadastrado = $linha[10];
$datacadastro_cadastrada = $linha[17];
$horacadastro_cadastrada = $linha[18];
$com_empresa_cadastrada = $linha[28];

}

if($registros>=1){

echo "ATENÇÃO!!!...<br><br> O produto que você tentou inserir já existe! Confira abaixo a vigência dele!<br><br>

Banco de Operação - $bco_operacao_cadastrado <br><br>
Produto - $tipo_proposta_cadastrada<br><br>
Faixa - $faixa_cadastrada<br><br>
Comissão da Empresa - $com_empresa_cadastrada<br><br>
Comissão Bruta - $com_bruta_cadastrada<br><br>
Comissão A% - $a_cadastrada<br><br>
Comissão B% - $b_cadastrada<br><br>
Comissão C% - $c_cadastrada<br><br>
Data de inicial - $data_inicial_cadastrada<br><br>
Data final - $data_final_cadastrada<br><br>
Cadastrado por $operador_cadastrado<br><br>
Em - $datacadastro_cadastrada<br><br>
Hora - $horacadastro_cadastrada<br><br>

";

}

else{
$comando = "insert into produtos(tipo_proposta,bco_operacao,faixa,com_bruta,a,b,c,data_inicial,data_final,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,datacadastro,horacadastro,com_empresa) 

values('$tipo_proposta','$bco_operacao','$faixa','$com_bruta','$a','$b','$c','$data_inicial','$data_final','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$datacadastro','$horacadastro','$com_empresa')";

mysql_query($comando,$conexao) or die("Erro ao gravar produto");


echo "Produto inserido no banco de dados com sucesso<br>";

}
?>



<?

$sql = "SELECT * FROM tipos_propostas where tipo_proposta = '$tipo_proposta'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);


}

if($registros==0){

$comando = "insert into tipos_propostas(tipo_proposta) 

values('$tipo_proposta')";

mysql_query($comando,$conexao);


}


?>


<?

$sql = "SELECT * FROM prazos where prazo = '$faixa'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_prazo = mysql_num_rows($res);


}

if($registros_prazo==0){

$comando = "insert into prazos(prazo) 

values('$faixa')";

mysql_query($comando,$conexao);


}


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