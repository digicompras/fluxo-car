<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");


require '../../conect/conect.php';

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
	background-repeat: no-repeat;
	background-attachment: fixed;

}
.style1 {
	color: #0000FF;
	font-weight: bold;
}

-->
</style>
</head>

<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../../background/<? echo "$background"; ?>">
<p>        

<?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$horas_por_dia = $linha[60];

}
$divisao_de_periodos = bcdiv($horas_por_dia,2,3);

?>


<?

$num_dia = date('w');
$sql = "SELECT * FROM dias_semana where num_dia = '$num_dia' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$dia_semana = $linha[2];

}

?>

</p>
<p>&nbsp;</p>


<?
error_reporting(E_ALL);


$codigo_ponto = $_POST['codigo_ponto'];
$nome = $_POST['nome'];
$data = $_POST['data'];
$sai_t = $_POST['sai_t'];
$date = $_POST['date'];
$estab_pertence = $_POST['estab_pertence'];





$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `sai_t` = '$sai_t' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao) or die("Erro ao gravar sua saída no fim do período da tarde, tente novamente!");

echo "Ponto marcado com com sucesso!<br><br> Bom descanso!";

?>



<?
//---------------------------------------------------------------------------------------------------------



$sql = "SELECT * FROM ponto where codigo = '$codigo_ponto' order by date desc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];
$nome = $linha[1];
$data = $linha[2];
$ent_m = $linha[3];
$sai_m = $linha[4];
$ent_t = $linha[5];
$sai_t = $linha[6];
$ent_e = $linha[7];
$sai_e = $linha[8];
$obs = $linha[9];
$mes_ano = $linha[10];
$dia_semana = $linha[11];



}



$ent_t2 = explode(":", $ent_t);



$h_ent_t = $ent_t2[0];

$m_ent_t = $ent_t2[1];

$s_ent_t = $ent_t2[2];


$convert_h_ent_t_minutos = bcmul($h_ent_t,60);
$totaliza_minutos_ent_t = bcadd($convert_h_ent_t_minutos,$m_ent_t);


//echo " minutos entrada -->> $totaliza_minutos_ent_m <br><br>";

$sai_t2 = explode(":", $sai_t);



$h_sai_t = $sai_t2[0];

$m_sai_t = $sai_t2[1];

$s_sai_t = $sai_t2[2];


$hora_sai_t = "$h_sai_t:$m_sai_t:$s_sai_t";


$convert_h_sai_t_minutos = bcmul($h_sai_t,60);
$totaliza_minutos_sai_t = bcadd($convert_h_sai_t_minutos,$m_sai_t);

$subtrai_horas_tarde = bcsub($h_sai_t,$h_ent_t);
$soma_minutos_tarde = bcadd($m_sai_t,$m_ent_t);

echo "$soma_minutos_tarde";

if($soma_minutos_tarde>=60){
$encontrando_diferenca_de_minutos_naturais_restantes_tarde = bcsub($soma_minutos_tarde,60);
}
else{
$encontrando_diferenca_de_minutos_naturais_restantes_tarde = $soma_minutos_tarde;
}

$decimal_soma_minutos_tarde = bcdiv($soma_minutos_tarde,60,2);
$decimal_soma_minutos_tarde2 = explode(".", $decimal_soma_minutos_tarde);

$total_horas_naturais_decimal_soma_minutos_tarde = $decimal_soma_minutos_tarde2[0];
$total_minutos_naturais_decimal_soma_minutos_tarde = $decimal_soma_minutos_tarde2[1];
$soma_somente_as_horas_de_tarde = bcadd($subtrai_horas_tarde,$total_horas_naturais_decimal_soma_minutos_tarde);

$totaldashorasdetarde = bcadd($subtrai_horas_tarde,$decimal_soma_minutos_tarde,2);




$quant_horas_decimais_parcial_sai_t = $totaldashorasdetarde;
$quant_horas_reais_parcial_sai_t = "$soma_somente_as_horas_de_tarde.$encontrando_diferenca_de_minutos_naturais_restantes_tarde";





//$soma_horas_decimais_do_dia = bcadd($quant_horas_decimais,$quant_horas_decimais_parcial_sai_t,2);
$horas_trabalhadas_no_dia = bcadd($quant_horas_decimais,$quant_horas_decimais_parcial_sai_t,2);


if($totaldashorasdetarde<=$divisao_de_periodos){

$quant_horas_faltas_t = bcsub($divisao_de_periodos,$totaldashorasdetarde,2);

}
else{

$quant_horas_faltas_t = "0";

}





$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `quant_horas_n_t` = '$quant_horas_reais_parcial_sai_t',`quant_horas_d_t` = '$quant_horas_decimais_parcial_sai_t',`quant_horas_faltas_t` = '$quant_horas_faltas_t',`horas_trabalhadas_no_dia` = '$horas_trabalhadas_no_dia' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao);




//---------------------------------------------------------------------------------

?>

<?


$sql = "SELECT * FROM ponto where codigo = '$codigo_ponto' order by date desc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];
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

if($dia_semana=="Sábado"){

}
else{

if($horas_trabalhadas_no_dia >= $horas_por_dia){

$saldo_horas_extras = bcsub($horas_trabalhadas_no_dia,$horas_por_dia,2);
$saldo_horas_naturais = bcsub($soma_horas_naturais_do_dia,$horas_por_dia,2);







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

}



//-----------------------FIM DO CALCULO DE HORA EXTRA NO SABADO-----------------------------


//------------calculando as horas faltas----------------------


if($dia_semana=="Sábado"){

}
else{


if($horas_trabalhadas_no_dia < $horas_por_dia){

if($atestado_m=="Sim"){

$saldo_horas_faltas_m = "0";
}
else{

if($quant_horas_faltas_m>=0){

$saldo_horas_faltas_m = $quant_horas_faltas_m;

}
else{

$saldo_horas_faltas_m = "4";

}

}

if($atestado_t=="Sim"){

$saldo_horas_faltas_t = "0";

}
else{


if($quant_horas_faltas_t>=0){

$saldo_horas_faltas_t = $quant_horas_faltas_t;

}
else{

$saldo_horas_faltas_t = "4.75";

}

}


$total_faltas_no_dia = bcadd($saldo_horas_faltas_m,$saldo_horas_faltas_t,2);



$valor_hora_normal = bcdiv($salario,220,5);



$valor_total_horas_faltas = bcmul($total_faltas_no_dia,$valor_hora_normal,2);



$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `quant_horas_faltas_d` = '$total_faltas_no_dia',`valor_total_horas_faltas` = '$valor_total_horas_faltas',`salario` = '$salario',`valor_hora_normal` = '$valor_hora_normal',`quant_horas` = '' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao);





}


}




?>










<?
mysql_close($conexao);
?>

<form action="javascript:window.close()" method="post" name="form1" target="_top">
  <input class="class01" type="submit" name="Submit" value="Encerrar sess&atilde;o">
</form>
<p>&nbsp;</p>
</body>
</html>
