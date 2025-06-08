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

<p>        <?

require '../../conect/conect.php';

?>



</p>

<p>
</p>





<?

error_reporting(E_ALL);





//$codigo = $_POST['codigo'];
$codigo_ponto = $_POST['codigo_ponto'];
$date = $_POST['date'];

$quant_horas_n_m = $_POST['quant_horas_n_m'];
$quant_horas_d_m = $_POST['quant_horas_d_m'];





$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `quant_horas_n_m` = '$quant_horas_n_m',`quant_horas_d_m` = '$quant_horas_d_m' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao);




//---------------------------------------------------------------------------------

?>


<?
//---------------------------------------------------------------------------------------------------------



$quant_horas_reais_parcial_sai_t = $_POST['quant_horas_reais_parcial_sai_t'];
$quant_horas_decimais_parcial_sai_t = $_POST['quant_horas_decimais_parcial_sai_t'];





$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `quant_horas_n_t` = '$quant_horas_reais_parcial_sai_t',`quant_horas_d_t` = '$quant_horas_decimais_parcial_sai_t' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao);




//---------------------------------------------------------------------------------

?>

<?


$sql = "SELECT * FROM ponto where codigo = '$codigo_ponto' order by date desc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];
$data = $linha[2];

$quant_horas_d_m = $linha[35];
$quant_horas_n_m = $linha[36];
$quant_horas_d_t = $linha[37];
$quant_horas_n_t = $linha[38];



}


$soma_horas_decimais_do_dia = bcadd($quant_horas_d_m,$quant_horas_d_t,2);

$soma_horas_naturais_do_dia = bcadd($quant_horas_n_m,$quant_horas_n_t,2);


?>


<?

$sql = "SELECT * FROM operadores where nome = '$nome' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$nome = $linha[1];

$sexo = $linha[2];

$estadocivil = $linha[3];

$cpf = $linha[4];

$rg = $linha[5];

$orgao = $linha[6];

$emissao = $linha[7];

$data_nasc = $linha[8];

$pai = $linha[9];

$mae = $linha[10];

$endereco = $linha[11];

$numero = $linha[12];

$bairro = $linha[13];

$complemento = $linha[14];

$cidade = $linha[15];

$estado = $linha[16];

$cep = $linha[17];

$telefone = $linha[18];

$celular = $linha[19];

$email = $linha[20];

$operador = $linha[21];

$cel_operador = $linha[22];

$email_operador = $linha[23];

$estabelecimento = $linha[24];

$cidade_estabelecimento = $linha[25];

$tel_estabelecimento = $linha[26];

$email_estabelecimento = $linha[27];

$obs = $linha[28];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$dataalteracao = $linha[31];

$horaalteracao = $linha[32];

$operador_alterou = $linha[33];

$cel_operador_alterou = $linha[34];

$email_operador_alterou = $linha[35];

$estabelecimento_alterou = $linha[36];

$cidade_estabelecimento_alterou = $linha[37];

$tel_estabelecimento_alterou = $linha[38];

$email_estabelecimento_alterou = $linha[39];

$usuario_op = $linha[40];

$senha_op = $linha[41];

$tipo_op = $linha[42];

$funcao = $linha[43];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];



$salario = $linha[48];

$vale_alimentacao = $linha[49];

$gratificacao = $linha[50];

$comissao = $linha[51];

$emprestimo = $linha[52];

$admissao = $linha[53];

$demissao = $linha[54];

$meta = $linha[55];

$status = $linha[56];

$bloqueio_parcial = $linha[57];

$tempo_almoco = $linha[58];

$bloqueio_compra = $linha[59];

$horas_diarias = $linha[60];

}



$date2 = explode("-", $data);



$dia = $date2[0];

$mes = $date2[1];

$ano = $date2[2];





?>





<?
//TESTE DE CALCULOS E GRAVAÇÃO NA TABELA PONTO

if($soma_horas_decimais_do_dia >= $horas_diarias){

$saldo_horas_extras = bcsub($soma_horas_decimais_do_dia,$horas_diarias,2);
$saldo_horas_naturais = bcsub($soma_horas_naturais_do_dia,8.45,2);







$quant_horas_decimais = $saldo_horas_extras;
$quant_horas_reais = $saldo_horas_naturais;

$valor_hora_normal = bcdiv($salario,220,5);
$acrecimo_hora_extra = bcmul($valor_hora_normal,0.5,5);
$valor_hora_extra = bcadd($valor_hora_normal,$acrecimo_hora_extra,5);
//$total = bcmul($quant_horas_decimais,$valor_hora_extra,2);

$subtotal = bcmul($quant_horas_decimais,$valor_hora_normal,5);
$subtotal2 = bcmul($subtotal,0.5,5);
$total = bcadd($subtotal,$subtotal2,2);






$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


//$comando = "update `$linha[1]`.`ponto` set `hora_inicio` = '$hora_inicio',`hora_termino` = '$hora_termino',`hi` = '$hi',`mi` = '$mi',`si` = '$si',`ht` = '$ht',`mt` = '$mt',`st` = '$st',`quant_horas_reais` = '$quant_horas_reais',`quant_horas` = '$quant_horas_decimais',`valor_hora_normal` = '$valor_hora_normal',`valor_hora_extra` = '$valor_hora_extra',`total` = '$total',`acrescimo` = '$acrecimo_hora_extra',`salario` = '$salario' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";

$comando = "update `$linha[1]`.`ponto` set `quant_horas_reais` = '$quant_horas_reais',`quant_horas` = '$quant_horas_decimais',`valor_hora_normal` = '$valor_hora_normal',`valor_hora_extra` = '$valor_hora_extra',`total` = '$total',`acrescimo` = '$acrecimo_hora_extra',`salario` = '$salario',`quant_horas_faltas_n` = '',`quant_horas_faltas_d` = '' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";

}
mysql_query($comando,$conexao);






}


//---------------------------------//-------------------------------







if($soma_horas_decimais_do_dia < $horas_diarias){

$saldo_horas_faltas = bcsub($soma_horas_decimais_do_dia,$horas_diarias,2);
$saldo_horas_faltas_naturais = bcsub($soma_horas_naturais_do_dia,8.45,2);







$quant_horas_decimais = bcmul($saldo_horas_faltas,-1,2);
$quant_horas_reais = bcmul($saldo_horas_faltas_naturais,-1,2);





$valor_hora_normal = bcdiv($salario,220,5);
$acrecimo_hora_extra = bcmul($valor_hora_normal,0.5,5);
$valor_hora_extra = bcadd($valor_hora_normal,$acrecimo_hora_extra,5);
//$total = bcmul($quant_horas_decimais,$valor_hora_extra,2);



$valor_total_horas_faltas = bcmul($quant_horas_decimais,$valor_hora_normal,2);






$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `quant_horas_faltas_n` = '$quant_horas_reais',`quant_horas_faltas_d` = '$quant_horas_decimais',`valor_total_horas_faltas` = '$valor_total_horas_faltas',`salario` = '$salario',`valor_hora_normal` = '$valor_hora_normal',`quant_horas_reais` = '',`quant_horas` = '' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao);








}




?>
























<?

mysql_close($conexao);

?>



<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input name="codigo_ponto" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">

  <input type="submit" name="Submit" value="Voltar">

</form>
<p>&nbsp;</p>

</body>

</html>

