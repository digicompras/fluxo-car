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


$convert_h_ent_m_minutos = bcmul($h_ent_m,60)-60;
$totaliza_minutos_ent_m = bcadd($convert_h_ent_m_minutos,$m_ent_m); //519  -  480  -  459



$sai_m2 = explode(":", $sai_m);



$h_sai_m = $sai_m2[0];

$m_sai_m = $sai_m2[1];

$s_sai_m = $sai_m2[2];


$hora_sai_m = "$h_sai_m:$m_sai_m:$s_sai_m";


$convert_h_sai_m_minutos = bcmul($h_sai_m,60);
$totaliza_minutos_sai_m = bcadd($convert_h_sai_m_minutos,$m_sai_m); //760  -  720




$subtrai_horas = bcsub($h_sai_m,$h_ent_m);
$soma_minutos = bcadd($m_sai_m,$m_ent_m);

if($soma_minutos>=60){
$encontrando_diferenca_de_minutos_naturais_restantes = bcsub($soma_minutos,60);
}
else{
$encontrando_diferenca_de_minutos_naturais_restantes = $soma_minutos;
}

$decimal_soma_minutos = bcdiv($soma_minutos,60,2);
$decimal_soma_minutos2 = explode(".", $decimal_soma_minutos);

$total_horas_naturais_decimal_soma_minutos = $decimal_soma_minutos2[0];
$total_minutos_naturais_decimal_soma_minutos = $decimal_soma_minutos2[1];
$soma_somente_as_horas_de_manha = bcadd($subtrai_horas,$total_horas_naturais_decimal_soma_minutos);

$totaldashorasdemanha = bcadd($subtrai_horas,$decimal_soma_minutos,2);



$quant_horas_decimais = $totaldashorasdemanha;
$quant_horas_reais = "$soma_somente_as_horas_de_manha.$encontrando_diferenca_de_minutos_naturais_restantes";




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
