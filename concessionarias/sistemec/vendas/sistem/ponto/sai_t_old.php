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


}


$date2 = explode("-", $data);



$dia = $date2[0];

$mes = $date2[1];

$ano = $date2[2];



if($sai_t>="18:00:01"){

$hora_inicio = "18:00:00";

$hora_inicio2 = explode(":", $hora_inicio);



$hi = $hora_inicio2[0];

$mi = $hora_inicio2[1];

$si = $hora_inicio2[2];





$convert_hi_minutos = bcmul($hi,60);
$totaliza_minutos_i = bcadd($convert_hi_minutos,$mi);



//$ht = $_POST['ht'];
//$mt = $_POST['mt'];

$hora_termino_referencia = explode(":", $sai_t);



$ht = $hora_termino_referencia[0];

$mt = $hora_termino_referencia[1];

$st = $hora_termino_referencia[2];


$hora_termino = "$ht:$mt:$st";


$convert_ht_minutos = bcmul($ht,60);
$totaliza_minutos_t = bcadd($convert_ht_minutos,$mt);


$subtrai_minutos = bcsub($totaliza_minutos_t,$totaliza_minutos_i);


//converte resultado em horas novamente

$encontra_horas_decimais = bcdiv($subtrai_minutos,60,2);



$encontra_horas_decimais2 = explode(".", $encontra_horas_decimais);



$total_horas = $encontra_horas_decimais2[0];

$encontra_decimal_minutos = $encontra_horas_decimais2[1];

if($encontra_decimal_minutos<=00){

$total_decimal_minutos = "0";
}
else{
$total_decimal_minutos = $encontra_horas_decimais2[1];
}

//ACHA O DECIMAL DO PERCENTUAL DECIMAL DAS HORAS = decimal de hora / 100

$decimal_dos_minutos = bcdiv($total_decimal_minutos,100,2);

$total_minutos_real = bcmul(60,$decimal_dos_minutos);

//aqui termina a formula para encontrar o decimal do decimal dos minutos


$percentual_minutos = $total_decimal_minutos;

$explode_decimal = explode(".", $total_minutos_real);

$total_minutos_real2 = $explode_decimal[0];



$quant_horas_decimais = "$total_horas.$total_decimal_minutos";
$quant_horas_reais = "$total_horas.$total_minutos_real";

$valor_hora_normal = bcdiv($salario,220,5);
$acrecimo_hora_extra = bcmul($valor_hora_normal,0.5,5);
$valor_hora_extra = bcadd($valor_hora_normal,$acrecimo_hora_extra,5);
//$total = bcmul($quant_horas_decimais,$valor_hora_extra,2);

$subtotal = bcmul($quant_horas_decimais,$valor_hora_normal,5);
$subtotal2 = bcmul($subtotal,0.5,5);
$total = bcadd($subtotal,$subtotal2,2);


$comando = "insert into horas_extras(data,dia,mes,ano,hora_inicio,hora_termino,hi,mi,si,ht,mt,st,nome,quant_horas_reais,quant_horas,valor_hora_normal,valor_hora_extra,total,acrescimo,salario,estab_pertence)

values('$date','$dia','$mes','$ano','$hora_inicio','$hora_termino','$hi','$mi','$si','$ht','$mt','$st','$nome','$quant_horas_reais','$quant_horas_decimais','$valor_hora_normal','$valor_hora_extra','$total','$acrecimo_hora_extra','$salario','$estab_pertence')";

mysql_query($comando,$conexao) or die("Erro ao gravar registro de hora extra do funcionario no sistema!");

//echo "Registro de Hora extra do funcionario $nome gravado com sucesso!<br><br>";

}
?>





<?
//TESTE DE CALCULOS E GRAVAÇÃO NA TABELA PONTO

if($sai_t>="18:00:01"){

$hora_inicio = "18:00:00";

$hora_inicio2 = explode(":", $hora_inicio);



$hi = $hora_inicio2[0];

$mi = $hora_inicio2[1];

$si = $hora_inicio2[2];





$convert_hi_minutos = bcmul($hi,60);
$totaliza_minutos_i = bcadd($convert_hi_minutos,$mi);



//$ht = $_POST['ht'];
//$mt = $_POST['mt'];

$hora_termino_referencia = explode(":", $sai_t);



$ht = $hora_termino_referencia[0];

$mt = $hora_termino_referencia[1];

$st = $hora_termino_referencia[2];


$hora_termino = "$ht:$mt:$st";


$convert_ht_minutos = bcmul($ht,60);
$totaliza_minutos_t = bcadd($convert_ht_minutos,$mt);


$subtrai_minutos = bcsub($totaliza_minutos_t,$totaliza_minutos_i);


//converte resultado em horas novamente

$encontra_horas_decimais = bcdiv($subtrai_minutos,60,2);



$encontra_horas_decimais2 = explode(".", $encontra_horas_decimais);



$total_horas = $encontra_horas_decimais2[0];

$encontra_decimal_minutos = $encontra_horas_decimais2[1];

if($encontra_decimal_minutos<=00){

$total_decimal_minutos = "0";
}
else{
$total_decimal_minutos = $encontra_horas_decimais2[1];
}

//ACHA O DECIMAL DO PERCENTUAL DECIMAL DAS HORAS = decimal de hora / 100

$decimal_dos_minutos = bcdiv($total_decimal_minutos,100,2);

$total_minutos_real = bcmul(60,$decimal_dos_minutos);

//aqui termina a formula para encontrar o decimal do decimal dos minutos


$percentual_minutos = $total_decimal_minutos;

$explode_decimal = explode(".", $total_minutos_real);

$total_minutos_real2 = $explode_decimal[0];



$quant_horas_decimais = "$total_horas.$total_decimal_minutos";
$quant_horas_reais = "$total_horas.$total_minutos_real";

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


$comando = "update `$linha[1]`.`ponto` set `hora_inicio` = '$hora_inicio',`hora_termino` = '$hora_termino',`hi` = '$hi',`mi` = '$mi',`si` = '$si',`ht` = '$ht',`mt` = '$mt',`st` = '$st',`quant_horas_reais` = '$quant_horas_reais',`quant_horas` = '$quant_horas_decimais',`valor_hora_normal` = '$valor_hora_normal',`valor_hora_extra` = '$valor_hora_extra',`total` = '$total',`acrescimo` = '$acrecimo_hora_extra',`salario` = '$salario' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao);






}


//---------------------------------//-------------------------------







if($sai_t<="17:59:59"){

$hora_inicio = "18:00:00";

$hora_inicio2 = explode(":", $hora_inicio);



$hi = $hora_inicio2[0];

$mi = $hora_inicio2[1];

$si = $hora_inicio2[2];





$convert_hi_minutos = bcmul($hi,60);
$totaliza_minutos_i = bcadd($convert_hi_minutos,$mi);



//$ht = $_POST['ht'];
//$mt = $_POST['mt'];

$hora_termino_referencia = explode(":", $sai_t);



$ht = $hora_termino_referencia[0];

$mt = $hora_termino_referencia[1];

$st = $hora_termino_referencia[2];


$hora_termino = "$ht:$mt";


$convert_ht_minutos = bcmul($ht,60);
$totaliza_minutos_t = bcadd($convert_ht_minutos,$mt);


$subtrai_minutos = bcsub($totaliza_minutos_t,$totaliza_minutos_i);


//converte resultado em horas novamente

$encontra_horas_decimais = bcdiv($subtrai_minutos,60,2);



$encontra_horas_decimais2 = explode(".", $encontra_horas_decimais);



$total_horas = $encontra_horas_decimais2[0];

$encontra_decimal_minutos = $encontra_horas_decimais2[1];

if($encontra_decimal_minutos<=00){

$total_decimal_minutos = "0";
}
else{
$total_decimal_minutos = $encontra_horas_decimais2[1];
}

//ACHA O DECIMAL DO PERCENTUAL DECIMAL DAS HORAS = decimal de hora / 100

$decimal_dos_minutos = bcdiv($total_decimal_minutos,100,2);

$total_minutos_real = bcmul(60,$decimal_dos_minutos);

//aqui termina a formula para encontrar o decimal do decimal dos minutos


$percentual_minutos = $total_decimal_minutos;

$explode_decimal = explode(".", $total_minutos_real);

$total_minutos_real2 = $explode_decimal[0];



$quant_horas_decimais = "$total_horas.$total_decimal_minutos";

$quant_horas_decimais2 = explode("-", $quant_horas_decimais);

$quant_horas_faltas_d = $quant_horas_decimais2[1];



$quant_horas_reais = "$total_horas.$total_minutos_real";

$quant_horas_reais2 = explode("-", $quant_horas_reais);

$quant_horas_faltas_n = $quant_horas_reais2[1];





$valor_hora_normal = bcdiv($salario,220,5);
$acrecimo_hora_extra = bcmul($valor_hora_normal,0.5,5);
$valor_hora_extra = bcadd($valor_hora_normal,$acrecimo_hora_extra,5);
//$total = bcmul($quant_horas_decimais,$valor_hora_extra,2);



$valor_total_horas_faltas = bcmul($quant_horas_faltas_d,$valor_hora_normal,2);






$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `quant_horas_faltas_n` = '$quant_horas_faltas_n',`quant_horas_faltas_d` = '$quant_horas_faltas_d',`valor_total_horas_faltas` = '$valor_total_horas_faltas',`salario` = '$salario',`valor_hora_normal` = '$valor_hora_normal' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao);








}




?>










<?
mysql_close($conexao);
?>

<form action="javascript:window.close()" method="post" name="form1" target="_top">
  <input type="submit" name="Submit" value="Encerrar sess&atilde;o">
</form>
<p>&nbsp;</p>
</body>
</html>
