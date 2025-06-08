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
<p>        <?

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
$date = $_POST['date'];
$estab_pertence = $_POST['estab_pertence'];


$sai_m = $_POST['sai_m'];



$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `sai_m` = '$sai_m' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao) or die("Erro ao gravar sua saída no fim do período da manha, tente novamente!");

echo "Ponto marcado com com sucesso!<br><br> Bom almoço!";

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
$date_ponto = $linha[12];


}



$ent_m2 = explode(":", $ent_m);



$h_ent_m = $ent_m2[0];

$m_ent_m = $ent_m2[1];

$s_ent_m = $ent_m2[2];


$convert_h_ent_m_minutos = bcmul($h_ent_m,60);
$totaliza_minutos_ent_m = bcadd($convert_h_ent_m_minutos,$m_ent_m); //519  -  480  -  459


echo " minutos entrada -->> $totaliza_minutos_ent_m <br><br>";

$sai_m2 = explode(":", $sai_m);



$h_sai_m = $sai_m2[0];

$m_sai_m = $sai_m2[1];

$s_sai_m = $sai_m2[2];


$hora_sai_m = "$h_sai_m:$m_sai_m:$s_sai_m";


$convert_h_sai_m_minutos = bcmul($h_sai_m,60);
$totaliza_minutos_sai_m = bcadd($convert_h_sai_m_minutos,$m_sai_m); //760  -  720

echo " minutos saida -->> $totaliza_minutos_sai_m <br><br>";



$subtrai_minutos = bcsub($totaliza_minutos_sai_m,$totaliza_minutos_ent_m); //241  -  240

//echo " saldo -->> $subtrai_minutos <br><br>";



//converte resultado em horas novamente

$encontra_horas_decimais = bcdiv($subtrai_minutos,60,2); //4,01  -  



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





$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `quant_horas_n_m` = '$quant_horas_reais',`quant_horas_d_m` = '$quant_horas_decimais' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao);




//---------------------------------------------------------------------------------

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
