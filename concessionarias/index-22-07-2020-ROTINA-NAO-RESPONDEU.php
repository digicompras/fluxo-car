<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");



?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style3 {color: #0000FF; font-weight: bold; }

-->

</style>

</head>

<?



require '../conect/conect.php';



$senha = $_SESSION['senha'];
$data_hoje = $_SESSION['data_hoje'];



$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];



}

$dia_atual = date('d');

$mes_atual = date('m');

$ano_atual = date('Y');
	
$data_atual = "$ano_atual-$mes_atual-$dia_atual";
	
$ano_anterior = date('Y')-1;

$ano_posterior = date('Y')+1;
	
	
$data_informada = $_POST['data_informada'];

$data2 = explode("-", $data_informada);


$diainformado = $data2[0];

$mesinformado = $data2[1];

$anoinformado = $data2[2];
	
	
if(empty($data_informada)){
	
$data_resgatar_dia_semana = date("w", strtotime("$data_atual"));

if($data_resgatar_dia_semana==0){
	$diasemana = "Domingo";
}
if($data_resgatar_dia_semana==1){
	$diasemana = "Segunda";
}
if($data_resgatar_dia_semana==2){
	$diasemana = "Terca";
}
if($data_resgatar_dia_semana==3){
	$diasemana = "Quarta";
}
if($data_resgatar_dia_semana==4){
	$diasemana = "Quinta";
}
if($data_resgatar_dia_semana==5){
	$diasemana = "Sexta";
}
if($data_resgatar_dia_semana==6){
	$diasemana = "Sabado";
}
	
	
}
else{
	
$data_resgatar_dia_semana = date("w", strtotime("$data_informada"));

if($data_resgatar_dia_semana==0){
	$diasemana = "Domingo";
}
if($data_resgatar_dia_semana==1){
	$diasemana = "Segunda";
}
if($data_resgatar_dia_semana==2){
	$diasemana = "Terca";
}
if($data_resgatar_dia_semana==3){
	$diasemana = "Quarta";
}
if($data_resgatar_dia_semana==4){
	$diasemana = "Quinta";
}
if($data_resgatar_dia_semana==5){
	$diasemana = "Sexta";
}
if($data_resgatar_dia_semana==6){
	$diasemana = "Sabado";
}

}



?>

<body bgcolor="#<? echo $cor; ?>"> 



<?



$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$obra_operador = $linha[50];
	
}
	
	
//---------INICIO DE VERIFICAÇÃO E LANÇAMENTO DE RDO EM BRANCO DO DIA---------------
	
$sql = "select * from rdo_data_inicial_e_final";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$diainicialrdo = $linha[1];
	$mesinicialrdo = $linha[2];
	$anoinicialrdo = $linha[3];
	$diafinalrdo = $linha[4];
	$mesfinalrdo = $linha[5];
	$anofinalrdo = $linha[6];
	
$datainicialperiodordo = "$anoinicialrdo-$mesinicialrdo-$diainicialrdo";
$datafinalperiodordo = "$anofinalrdo-$mesfinalrdo-$diafinalrdo";
}
	
if($data_atual>$datafinalperiodordo){
	
if($mesfinalrdo=="12"){
$mesposteriorrdo = "01";
$mesanteriorrdo = "12";
}
else{
	
$mesposteriorrdo_calculo = bcadd($mesfinalrdo,1);
	
if($mesposteriorrdo_calculo<=9){
$mesposteriorrdo = "0$mesposteriorrdo_calculo";
}
else{
$mesposteriorrdo = $mesposteriorrdo_calculo;
	
	
}
	
$mesanteriorrdo_calculo = bcsub($mesfinalrdo,1);
	
if($mesanteriorrdo_calculo<=9){
$mesanteriorrdo = "0$mesanteriorrdo_calculo";
}
else{
$mesanteriorrdo = $mesanteriorrdo_calculo;
	
	
}
	
}
	
if($mesfinalrdo=="12"){
$ano_posteriorrdo = bcadd($ano,1);
$ano_anteriorrdo = bcsub($ano_posteriorrdo,1);
}
else{
$ano_posteriorrdo = $anofinalrdo;
$ano_anteriorrdo = $anofinalrdo;
}


$comando = "update `$db`.`rdo_data_inicial_e_final` set `diainicialrdo` = '$diainicialrdo',`mesinicialrdo` = '$mesanteriorrdo',`anoinicialrdo` = '$anofinalrdo',`diafinalrdo` = '$diafinalrdo',`mesfinalrdo` = '$mesposteriorrdo',`anofinalrdo` = '$ano_posteriorrdo' where `rdo_data_inicial_e_final`. `codigo` = '0'";
mysql_query($comando,$conexao);
	
	
	
	
	
$sql2 = "select * from rdo_data_inicial_e_final";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

	$diainicialrdo = $linha[1];
	$mesinicialrdo = $linha[2];
	$anoinicialrdo = $linha[3];
	$diafinalrdo = $linha[4];
	$mesfinalrdo = $linha[5];
	$anofinalrdo = $linha[6];
	
$datainicialperiodordo = "$anoinicialrdo-$mesinicialrdo-$diainicialrdo";
$datafinalperiodordo = "$anofinalrdo-$mesfinalrdo-$diafinalrdo";
}
	
$sql3 = "SELECT * FROM veiculos where obra = '$obra_operador' and mobilizado = 'sim' and rdo = 'sim'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$codigointerno = $linha[0];
$concessionaria = $linha[10];
$veiculo = $linha[16];
$placa = $linha[21];
$tipo = $linha[67];
$localizacao = $linha[76];
$obra = $linha[108];
$prefixo = $linha[109];
$rdo = $linha[110];

	
$sql4 = "SELECT * FROM rdo where placa = '$placa' and localizacao = '$localizacao' and data between '$datainicialperiodordo' and '$datafinalperiodordo' order by data asc";
$res4 = mysql_query($sql4);
$registros_rdo_lancamento = mysql_num_rows($res4);
while($linha=mysql_fetch_row($res4)) {
	
$data_localizada_no_rdo = $linha[12];
//$diasemana_localizado_no_rdo = $linha[13];
$dia_localizado_no_rdo = $linha[14];
$mes_localizado_no_rdo = $linha[15];
$ano_localizado_no_rdo = $linha[16];
	
	
$data_resgatar_dia_semana = date("w", strtotime("$data_localizada_no_rdo"));

if($data_resgatar_dia_semana==0){
	$diasemana_localizado_no_rdo = "Domingo";
}
if($data_resgatar_dia_semana==1){
	$diasemana_localizado_no_rdo = "Segunda";
}
if($data_resgatar_dia_semana==2){
	$diasemana_localizado_no_rdo = "Terca";
}
if($data_resgatar_dia_semana==3){
	$diasemana_localizado_no_rdo = "Quarta";
}
if($data_resgatar_dia_semana==4){
	$diasemana_localizado_no_rdo = "Quinta";
}
if($data_resgatar_dia_semana==5){
	$diasemana_localizado_no_rdo = "Sexta";
}
if($data_resgatar_dia_semana==6){
	$diasemana_localizado_no_rdo = "Sabado";
}
	
	
if($registros_rdo_lancamento<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_atual','$diasemana','$dia_atual','$mes_atual','$ano_atual','$hora','$valormensal','$total','$obra','$prefixo','$localizacao','$rdo')";
mysql_query($comando,$conexao);
	
}//FIM DO IF REGISTROS_RDO_LANCAMENTO
	
	
}//FIM DO WHILE DE RDO
	
	
}// FIM DO WHILE DE VEICULOS
	
	

	

}//FIM SE A DATA ATUAL FOR MAIOR QUE DATAFINAL RDO
	
	
else{	
	
	
if(empty($data_informada)){
	
$sql5 = "select * from rdo_data_inicial_e_final";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

	$diainicialrdo = $linha[1];
	$mesinicialrdo = $linha[2];
	$anoinicialrdo = $linha[3];
	$diafinalrdo = $linha[4];
	$mesfinalrdo = $linha[5];
	$anofinalrdo = $linha[6];
	
$datainicialperiodordo = "$anoinicialrdo-$mesinicialrdo-$diainicialrdo";
$datafinalperiodordo = "$anofinalrdo-$mesfinalrdo-$diafinalrdo";
}
	
$sql6 = "SELECT * FROM veiculos where obra = '$obra_operador' and mobilizado = 'sim' and rdo = 'sim'";
$res6 = mysql_query($sql6);
while($linha=mysql_fetch_row($res6)) {

$codigointerno = $linha[0];
$concessionaria = $linha[10];
$veiculo = $linha[16];
$placa = $linha[21];
$tipo = $linha[67];
$localizacao = $linha[76];
$obra = $linha[108];
$prefixo = $linha[109];
$rdo = $linha[110];

	
$sql7 = "SELECT * FROM rdo where placa = '$placa' and data between '$datainicialperiodordo' and '$datafinalperiodordo' order by data asc";
$res7 = mysql_query($sql7);
$registros_rdo_lancamento = mysql_num_rows($res7);
while($linha=mysql_fetch_row($res7)) {
	
$data_localizada_no_rdo = $linha[12];
//$diasemana_localizado_no_rdo = $linha[13];
$dia_localizado_no_rdo = $linha[14];
$mes_localizado_no_rdo = $linha[15];
$ano_localizado_no_rdo = $linha[16];
	
	
$data_resgatar_dia_semana = date("w", strtotime("$data_localizada_no_rdo"));

if($data_resgatar_dia_semana==0){
	$diasemana_localizado_no_rdo = "Domingo";
}
if($data_resgatar_dia_semana==1){
	$diasemana_localizado_no_rdo = "Segunda";
}
if($data_resgatar_dia_semana==2){
	$diasemana_localizado_no_rdo = "Terca";
}
if($data_resgatar_dia_semana==3){
	$diasemana_localizado_no_rdo = "Quarta";
}
if($data_resgatar_dia_semana==4){
	$diasemana_localizado_no_rdo = "Quinta";
}
if($data_resgatar_dia_semana==5){
	$diasemana_localizado_no_rdo = "Sexta";
}
if($data_resgatar_dia_semana==6){
	$diasemana_localizado_no_rdo = "Sabado";
}
	
if($registros_rdo_lancamento<=0){
	
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_atual','$diasemana','$dia_atual','$mes_atual','$ano_atual','$hora','$valormensal','$total','$obra','$prefixo','$localizacao','$rdo')";
mysql_query($comando,$conexao);
	
}//FIM DO REGISTRO DE LANCAMENTO
	
}//FIM DO WHILE DO RDO
	
}//FIM DO WHILE DE VEICULOS
	
}//FIM SE A DATA_INFORMADA FOR VAZIO
	
else{
	
$sql8 = "SELECT * FROM veiculos where obra = '$obra_operador' and mobilizado = 'sim' and rdo = 'sim'";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {

$codigointerno = $linha[0];
$concessionaria = $linha[10];
$veiculo = $linha[16];
$placa = $linha[21];
$tipo = $linha[67];
$localizacao = $linha[76];
$obra = $linha[108];
$prefixo = $linha[109];
$rdo = $linha[110];

	
$sql9 = "SELECT * FROM rdo where placa = '$placa' and data between '$data_informada' and '$datafinalperiodordo' order by data asc";
$res9 = mysql_query($sql9);
$registros_rdo_lancamento = mysql_num_rows($res9);
while($linha=mysql_fetch_row($res9)) {
	
$data_localizada_no_rdo = $linha[12];
//$diasemana_localizado_no_rdo = $linha[13];
$dia_localizado_no_rdo = $linha[14];
$mes_localizado_no_rdo = $linha[15];
$ano_localizado_no_rdo = $linha[16];
	
	
$data_resgatar_dia_semana = date("w", strtotime("$data_localizada_no_rdo"));

if($data_resgatar_dia_semana==0){
	$diasemana_localizado_no_rdo = "Domingo";
}
if($data_resgatar_dia_semana==1){
	$diasemana_localizado_no_rdo = "Segunda";
}
if($data_resgatar_dia_semana==2){
	$diasemana_localizado_no_rdo = "Terca";
}
if($data_resgatar_dia_semana==3){
	$diasemana_localizado_no_rdo = "Quarta";
}
if($data_resgatar_dia_semana==4){
	$diasemana_localizado_no_rdo = "Quinta";
}
if($data_resgatar_dia_semana==5){
	$diasemana_localizado_no_rdo = "Sexta";
}
if($data_resgatar_dia_semana==6){
	$diasemana_localizado_no_rdo = "Sabado";
}
	
if($registros_rdo_lancamento<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_informada','$diasemana','$diainformado','$mesinformado','$anoinformado','$hora','$valormensal','$total','$obra','$prefixo','$localizacao','$rdo')";
mysql_query($comando,$conexao);
	
}//FIM DO REGISTRO DE LANCAMENTO
	
}//FIM DO WHILE DO RDO
	
}//FIM DO WHILE DE VICULOS
	
	}//FIM DO ELSE SE A DATA_INFORMADA NÃO FOR VAZIO
	
}//FIM SE A DATA ATUAL FOR MENOR QUE A DATA FINAL DO PERIODO DO RDO
	
	//---------FIM DE VERIFICAÇÃO E LANÇAMENTO DE RDO EM BRANCO DO DIA---------------

?>

<table width="100%"  border="0">

  <tr>

    <td width="22%"><strong>Nome Fantasia </strong></td>

    <td width="23%"><strong>Cidade</strong></td>

    <td width="16%"><strong>Operador</strong></td>
    <td width="16%">Obra</td>

    <td width="24%"><strong>E-Mail</strong></td>

    <td width="11%"><strong>Data</strong></td>

  </tr><br>

  <tr>

    <td><span class="style3"><? echo $estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $cidade_estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $operador; ?></span></td>
    <td><span class="style3"><? echo $obra_operador; ?></span></td>

    <td><span class="style3"><? echo $emailoperador; ?></span></td>

    <td><span class="style3"><? echo "$diasemana $dia_atual-$mes_atual-$ano_atual"; ?></span></td>

  </tr>

</table>

<p>

  

</p>

<p>&nbsp;</p>

<div align="center"></div>

<table width="100%"  border="0">

  <tr>
    <td>&nbsp;</td>
    <td colspan="4" align="center"><form name="form2" method="post" action="index.php">
      <?
		if($operador=="IVAN CAMPOS DE ARAUJO"){
			?>
      <?
$senha = $_SESSION['senha'];

?>
      <?
					
$sql = "SELECT * FROM rdo where localizacao = '$localizacao' order by data desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$data_ultimo_rdo_gerado = $linha[12];
	$dia_ultimo_rdo_gerado = $linha[14];
	$mes_ultimo_rdo_gerado = $linha[15];
	$ano_ultimo_rdo_gerado = $linha[16];

}
					

// converte as datas para o formato timestamp
$d1 = strtotime($data_informada); 
$d2 = strtotime($data_ultimo_rdo_gerado);
// verifica a diferen&ccedil;a em segundos entre as duas datas e divide pelo n&uacute;mero de segundos que um dia possui
$datafinal = ($d2 - $d1) /86400;
// caso a data 2 seja menor que a data 1
if($datafinal < 0)
$datafinal = $datafinal * -1;
					

					
?>
      Obra<span style="font-weight: bold">
  <select class='class02' name="obra" id="obra">
    <?
					  if(empty($obra)){
    $sql = "select * from obras where concessionaria = '$estab_pertence' and statusobra = 'ativo'";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['obra']."</option>";
    }
					  }
					  else{
						  
		echo "<option selected>$obra</option>";
						  
					  }
?>
  </select>
  </span>Data
<select class='class02' name="data_informada" id="data_informada">
    <option selected><? echo "$data_informada"; ?></option>
    <option><? echo "$data_atual"; ?></option>
    <?
	  
			  
$sql10 = "SELECT * FROM rdo where data < '$data_atual' group by data order by data desc limit 30";
$result10 = mysql_query($sql10);
while($x=mysql_fetch_array($result10)) {
echo "<option>".$x['data']."</option>";
}

	  ?>
  </select>
  <input class='class02' type="submit" name="Submit5" value="Verificar RDO">
    <? } ?>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>

    <td width="21%"><form name="form1" method="post" action="veiculos/pesquisa.php">

      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>

      <input class='class01' type="submit" name="Submit" value="Verificar Veiculos">

      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">

      <input class='class02' name="placa" type="hidden" id="placa">
      <input class='class02' name="localizacao" type="hidden" id="localizacao">
      <input class='class02' name="veiculo" type="hidden" id="veiculo">
    </form></td>

    <td width="8%">&nbsp;</td>

    <td><form name="form1" method="post" action="prestacao_contas/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($operador=="IVAN CAMPOS DE ARAUJO"){
			?>
      <input class='class01' type="submit" name="Submit2" value="DESPESAS(Presta&ccedil;&atilde;o de contas)">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form></td>

    <td><form action="relatorios/relatorio_semanal_de_manutencoes_jairo.php" method="post" name="form1" target="_blank">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($operador=="IVAN CAMPOS DE ARAUJO"){
		echo "<select class='class02' name='dia_inicial' id='dia_inicial'>
          <option selected='selected'>$dia_atual</option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option>
          <option>29</option>
          <option>30</option>
          <option>31</option>
          </select>
        <select class='class02' name='mes_inicial' id='mes_inicial'>
          <option selected='selected'>$mes_atual</option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          </select>
        <select class='class02' name='ano_inicial' id='ano_inicial'>
          <option>$ano_anterior</option>
          <option selected='selected'>$ano_atual</option>
          <option>$ano_posterior</option>
          </select>
        at&eacute;
        <select class='class02' name='dia_final' id='dia_final'>
          <option selected='selected'>$dia_atual</option>
          <option>31</option>
          <option>30</option>
          <option>29</option>
          <option>28</option>
          <option>27</option>
          <option>26</option>
          <option>25</option>
          <option>24</option>
          <option>23</option>
          <option>22</option>
          <option>21</option>
          <option>20</option>
          <option>19</option>
          <option>18</option>
          <option>17</option>
          <option>16</option>
          <option>15</option>
          <option>14</option>
          <option>13</option>
          <option>12</option>
          <option>11</option>
          <option>10</option>
          <option>09</option>
          <option>08</option>
          <option>07</option>
          <option>06</option>
          <option>05</option>
          <option>04</option>
          <option>03</option>
          <option>02</option>
          <option>01</option>
          </select>
        <select class='class02' name='mes_final' id='mes_final'>
          <option selected='selected'>$mes_atual</option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          </select>
        <select class='class02' name='ano_final' id='ano_final'>
          <option>$ano_anterior</option>
          <option selected='selected'>$ano_atual</option>
          <option>$ano_posterior</option>
          </select>";
		  } ?>
      <? if($operador=="IVAN CAMPOS DE ARAUJO"){ echo "<input class='class01' type='submit' name='Submit5' value='Relatorio Manutencoes'>"; } ?>
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
    </form></td>

  </tr>

  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

    <td><form name="form1" method="post" action="rdo/index.php">
      <?

$senha = $_SESSION['senha'];

?>
      <?
		//if(($operador=="IVAN CAMPOS DE ARAUJO") or ($operador=="WELINGTON TEIXEIRA JUNIOR")){
			?>
      <input class='class01' type="submit" name="Submit4" value="RDO">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? //} ?>
    </form></td>

    <td>&nbsp;</td>

    <td><form name="form1" method="post" action="conciliacao/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
		<?
		if($operador=="IVAN CAMPOS DE ARAUJO"){
			?>
      <input class='class01' type="submit" name="Submit3" value="CONCILIA&Ccedil;&Otilde;ES">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
		<? } ?>
    </form></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td colspan="4">&nbsp;</td>

    <td width="29%">&nbsp;</td>

    <td width="14%">&nbsp;</td>

  </tr>

</table>

<strong></strong>

<div align="center"></div>
<p>&nbsp;</p>
<?
		if($operador=="IVAN CAMPOS DE ARAUJO"){
			
			
			
		}
			?>
</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>