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





<p>
  <?

error_reporting(E_ALL);


$mes_ano = date('m-y');



$codigo = $_POST['codigo'];
$codigo_ponto = $_POST['codigo'];
$date = $_POST['date'];
$atestado_m = $_POST['atestado_m'];
$atestado_t = $_POST['atestado_t'];
$nome = $_POST['nome'];



$sql = "SELECT * FROM operadores where nome = '$nome' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$horas_por_dia = $linha[60];

}
$divisao_de_periodos = bcdiv($horas_por_dia,2,3);


//--------------
$ent_m = $_POST['ent_m'];

if(empty($ent_m)){

$ent_m2 = "-";

}
else{


$entrada_manha = explode(":", $ent_m);



$h_ent_m = $entrada_manha[0];

$m_ent_m = $entrada_manha[1];

$s_ent_m = $entrada_manha[2];

if($ent_m=="FALTOU"){

$ent_m2 = "FALTOU";

}
else{

$ent_m2 = "$h_ent_m:$m_ent_m:$s_ent_m";

}

}
//--------------

$sai_m = $_POST['sai_m'];

if(empty($sai_m)){

$sai_m2 = "-";

}
else{


$saida_manha = explode(":", $sai_m);



$h_sai_m = $saida_manha[0];

$m_sai_m = $saida_manha[1];

$s_sai_m = $saida_manha[2];

if($sai_m=="FALTOU"){

$sai_m2 = "FALTOU";

}
else{

$sai_m2 = "$h_sai_m:$m_sai_m:$s_sai_m";

}

}


//--------------


$ent_t = $_POST['ent_t'];

if(empty($ent_t) or ($ent_t=="-")){

$ent_t2 = "-";

$h_ent_t = "";

$m_ent_t = "";

$s_ent_t = "";


}
else{


$entrada_tarde = explode(":", $ent_t);



$h_ent_t = $entrada_tarde[0];

$m_ent_t = $entrada_tarde[1];

$s_ent_t = $entrada_tarde[2];

if($ent_t=="FALTOU"){

$ent_t2 = "FALTOU";

}
else{

$ent_t2 = "$h_ent_t:$m_ent_t:$s_ent_t";

}

}


//--------------


$sai_t = $_POST['sai_t'];

if(empty($sai_t) or ($sai_t=="-")){

$sai_t2 = "-";

$h_sai_t = "";

$m_sai_t = "";

$s_sai_t = "";


}
else{


$saida_tarde = explode(":", $sai_t);



$h_sai_t = $saida_tarde[0];

$m_sai_t = $saida_tarde[1];

$s_sai_t = $saida_tarde[2];


if($sai_t=="FALTOU"){

$sai_t2 = "FALTOU";

}
else{

$sai_t2 = "$h_sai_t:$m_sai_t:$s_sai_t";

}

}


//--------------
?>
  
  
  <?


$obs = $_POST['obs'];






$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`ponto` set `ent_m` = '$ent_m2',`sai_m` = '$sai_m2',`ent_t` = '$ent_t2',`sai_t` = '$sai_t2',`obs` = '$obs',`atestado_m` = '$atestado_m',`atestado_t` = '$atestado_t' where `ponto`. `codigo` = '$codigo' limit 1 ";

}

mysql_query($comando,$conexao) or die("Erro ao atualizar as novas informações, tente novamente!");



echo "Ponto atualizado com com sucesso!<br><br>";

?>
  
  
  
  <?
//---------------------------------------------------------------------------------------------------------








$convert_h_ent_m_minutos = bcmul($h_ent_m,60);
$totaliza_minutos_ent_m = bcadd($convert_h_ent_m_minutos,$m_ent_m);


//echo " minutos entrada -->> $totaliza_minutos_ent_m <br><br>";





$convert_h_sai_m_minutos = bcmul($h_sai_m,60);
$totaliza_minutos_sai_m = bcadd($convert_h_sai_m_minutos,$m_sai_m);

//echo " minutos saida -->> $totaliza_minutos_sai_m <br><br>";



$subtrai_minutos = bcsub($totaliza_minutos_sai_m,$totaliza_minutos_ent_m);

//echo " saldo -->> $subtrai_minutos <br><br>";



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


if($quant_horas_decimais<=$divisao_de_periodos){

if($atestado_m=="Sim"){

$quant_horas_faltas_m = "";

}
else{

$quant_horas_faltas_m = bcsub($divisao_de_periodos,$quant_horas_decimais,2);

}
}
else{

$quant_horas_faltas_m = "";

}

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `quant_horas_n_m` = '$quant_horas_reais',`quant_horas_d_m` = '$quant_horas_decimais',`quant_horas_faltas_m` = '$quant_horas_faltas_m' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao);



//---------------------------------------------------------------------------------

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

$quant_horas_d_m = $linha[35];
$quant_horas_n_m = $linha[36];



}





$convert_h_ent_t_minutos = bcmul($h_ent_t,60);
$totaliza_minutos_ent_t = bcadd($convert_h_ent_t_minutos,$m_ent_t);


//echo " minutos entrada -->> $totaliza_minutos_ent_m <br><br>";



$convert_h_sai_t_minutos = bcmul($h_sai_t,60);
$totaliza_minutos_sai_t = bcadd($convert_h_sai_t_minutos,$m_sai_t);

//echo " minutos saida -->> $totaliza_minutos_sai_m <br><br>";



$subtrai_minutos = bcsub($totaliza_minutos_sai_t,$totaliza_minutos_ent_t);

//echo " saldo -->> $subtrai_minutos <br><br>";



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




$quant_horas_decimais_parcial_sai_t = "$total_horas.$total_decimal_minutos";
$quant_horas_reais_parcial_sai_t = "$total_horas.$total_minutos_real";


if($quant_horas_decimais_parcial_sai_t<=$divisao_de_periodos){

if($atestado_t=="Sim"){

$quant_horas_faltas_t = "";

}
else{

$quant_horas_faltas_t = bcsub($divisao_de_periodos,$quant_horas_decimais_parcial_sai_t,2);

}
}
else{

$quant_horas_faltas_t = "";

}


//$soma_horas_decimais_do_dia = bcadd($quant_horas_decimais,$quant_horas_decimais_parcial_sai_t,2);
$horas_trabalhadas_no_dia = bcadd($quant_horas_decimais,$quant_horas_decimais_parcial_sai_t,2);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `quant_horas_n_t` = '$quant_horas_reais_parcial_sai_t',`quant_horas_d_t` = '$quant_horas_decimais_parcial_sai_t',`quant_horas_faltas_t` = '$quant_horas_faltas_t',`horas_trabalhadas_no_dia` = '$horas_trabalhadas_no_dia'  where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
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

$quant_horas_faltas_m = $linha[41];
$quant_horas_faltas_t = $linha[42];


}



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

if($horas_trabalhadas_no_dia >= $horas_diarias){

$saldo_horas_extras = bcsub($horas_trabalhadas_no_dia,$horas_diarias,2);
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







if($horas_trabalhadas_no_dia < $horas_diarias){

$saldo_horas_faltas = bcsub($horas_trabalhadas_no_dia,$horas_diarias,2)*-1;
$saldo_horas_faltas_naturais = bcsub($soma_horas_naturais_do_dia,8.45,2);




//$soma_horas_faltas_decimais_do_dia = bcadd($quant_horas_faltas_m,$quant_horas_faltas_t,2);


//$quant_horas_decimais = bcmul($soma_horas_faltas_decimais_do_dia,1,2);
//$quant_horas_reais = bcmul($saldo_horas_faltas_naturais,-1,2);




$valor_hora_normal = bcdiv($salario,220,5);
$acrecimo_hora_extra = bcmul($valor_hora_normal,0.5,5);
$valor_hora_extra = bcadd($valor_hora_normal,$acrecimo_hora_extra,5);
//$total = bcmul($quant_horas_decimais,$valor_hora_extra,2);



$valor_total_horas_faltas = bcmul($saldo_horas_faltas,$valor_hora_normal,2);






$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`ponto` set `quant_horas_faltas_d` = '$saldo_horas_faltas',`valor_total_horas_faltas` = '$valor_total_horas_faltas',`salario` = '$salario',`valor_hora_normal` = '$valor_hora_normal',`quant_horas_reais` = '',`quant_horas` = '' where `ponto`. `codigo` = '$codigo_ponto' limit 1 ";
}
mysql_query($comando,$conexao);








}




?>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <?

mysql_close($conexao);

?>
</p>
<table width="100%" border="0">
  <tr>
    <td width="11%"><form name="form1" method="post" action="menu.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="codigo_ponto" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">
      <input type="submit" name="Submit" value="Voltar">
    </form></td>
    <td width="8%">&nbsp;</td>
    <td width="25%"><form name="form3" method="post" action="editar_cartao_ponto.php">
      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
      <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo $mes_ano; ?>">
      <input name="date" type="hidden" id="date" value="<? echo $date; ?>">
      <input type="submit" name="button2" id="button2" value="Continuar Editando Funcionario">
    </form></td>
    <td width="25%"><form name="form1" method="post" action="listar_cartao_de_ponto_todos_funcionarios.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo $mes_ano; ?>">
      <input name="date" type="hidden" id="date" value="<? echo $date; ?>">
      <input type="submit" name="Submit4" value="Voltar a Listagem">
    </form></td>
    <td width="56%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>

</html>

