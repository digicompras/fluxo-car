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
<title>Untitled Document</title>
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

<?

require '../../conect/conect.php';

			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>
<?
$codigo = $_POST['codigo'];
$num_proposta = $_POST['num_proposta'];


$sql = "SELECT * FROM clientes where codigo = '$codigo'";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {

$codigo_cli = $linha[0];
$nome_cli = $linha[1];
$sexo_cli = $linha[2];
$estadocivil_cli = $linha[3];
$cpf_cli = $linha[4];
$rg_cli = $linha[5];
$orgao_cli = $linha[6];
$emissao_cli = $linha[7];
$data_nasc_cli = $linha[8];
$pai_cli = $linha[9];
$mae_cli = $linha[10];
$endereco_cli = $linha[11];
$numero_cli = $linha[12];
$bairro_cli = $linha[13];
$complemento_cli = $linha[14];
$cidade_cli = $linha[15];
$estado_cli = $linha[16];
$cep_cli = $linha[17];
$telefone_cli = $linha[18];
$celular_cli = $linha[19];
$email_cli = $linha[20];
$operador_cli = $linha[21];
$cel_operador_cli = $linha[22];
$email_operador_cli = $linha[23];
$estabelecimento_cli = $linha[24];
$cidade_estabelecimento_cli = $linha[25];
$tel_estabelecimento_cli = $linha[26];
$email_estabelecimento_cli = $linha[27];
$obs_cli = $linha[28];
$datacadastro_cli = $linha[29];
$horacadastro_cli = $linha[30];
$dataalteracao_cli = $linha[31];
$horaalteracao_cli = $linha[32];
$operador_alterou_cli = $linha[33];
$cel_operador_alterou_cli = $linha[34];
$email_operador_alterou_cli = $linha[35];
$estabelecimento_alterou_cli = $linha[36];
$cidade_estabelecimento_alterou_cli = $linha[37];
$tel_estabelecimento_alterou_cli = $linha[38];
$email_estabelecimento_alterou_cli = $linha[39];
$banco = $linha[41];
$agencia = $linha[42];
$conta = $linha[43];
$num_beneficio = $linha[44];
$num_beneficio2 = $linha[73];
$num_beneficio3 = $linha[74];
$num_beneficio4 = $linha[75];

$resposta = $linha[119];

}
?>

<?

$sql = "SELECT * FROM registro_visitas where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$quant_eventos = $linha[176];
$site = $linha[177];
$data_evento = $linha[178];
$date_evento = $linha[179];
$dia_evento = $linha[180];
$mes_evento = $linha[181];
$ano_evento = $linha[182];
$dia_semana_evento = $linha[183];
$mural = $linha[184];
$pre_reserva = $linha[185];
$lista_espera = $linha[186];
$preparacao_dias = $linha[187];
$ocorrencia = $linha[188];
$categoria = $linha[189];
$sub_categoria = $linha[190];
$buffet = $linha[191];
$cerimonia = $linha[192];
$numero_pesoas = $linha[193];
$decoracao = $linha[194];
$responsavel = $linha[195];
$fotografia = $linha[196];
$video = $linha[197];
$estrela = $linha[198];
$conjuge1 = $linha[199];
$conjuge2 = $linha[200];
$dj = $linha[201];
$banda = $linha[202];
$contatos = $linha[203];
$bolos_e_doces = $linha[204];
//$valor = $linha[205];
$iluminacao = $linha[206];
$forma_pagamento = $linha[207];
$bartender = $linha[208];
$como_chegou_ate_nos = $linha[209];
$fechou = $linha[210];
$contrato = $linha[211];
$realizada = $linha[212];





}

?>

<?

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];

}


?>

<?
//dados do operador

$operador = $_POST['operador'];
$cel_operador = $_POST['cel_operador'];
$email_operador = $_POST['email_operador'];

//dados do estabelecimento

$estabelecimento = $_POST['estabelecimento'];
$cidade_estabelecimento = $_POST['cidade_estabelecimento'];
$tel_estabelecimento = $_POST['tel_estabelecimento'];
$email_estabelecimento = $_POST['email_estabelecimento'];



// Observações

$obs = $_POST['obs'];




//dados do pagamento

$valor = $_POST['valor'];

$valor_entrada = $_POST['valor_entrada'];
$quant_parc = $_POST['quant_parc'];
$modo_pagto = $_POST['modo_pagto'];


$valor_restante = bcsub($valor,$valor_entrada,2);

$mensalidade = bcdiv($valor_restante,$quant_parc,2);

$juros_diarios = bcmul($mensalidade,0.0013,2);

$ano_atual = date('Y');


$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];

$dia_cx = date('d');
$mes_cx = date('m');
$ano_cx = date('Y');


$datacadastro = date('d-m-Y');
$datecadastro = date('Y-m-d');
$horacadastro = date('H:i:s');

?>

<?

$comando = "insert into contratos(datacadastro,horacadastro,codigo_cli,nome,sexo,data_nasc,estadocivil,endereco,numero,bairro,complemento,cidade,estado,cep,telefone,celular,email,cpf,rg,orgao,emissao,pai,mae,nome_resp,sexo_resp,data_nasc_resp,estadocivil_resp,endereco_resp,numero_resp,bairro_resp,complemento_resp,cidade_resp,estado_resp,cep_resp,telefone_resp,celular_resp,email_resp,cpf_resp,rg_resp,orgao_resp,emissao_resp,pai_resp,mae_resp,obs,curso,modulos,data_inicio,duracao,mensalidade,quant_parc,modo_pagto,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,status,preco_total,quant_horas,carga_horaria_semanal,categoria,valor_total,valor_entrada,valor_restante) 
values('$datacadastro','$horacadastro','$codigo_cli','$nome','$sexo','$data_nasc','$estadocivil','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$telefone','$celular','$email','$cpf','$rg','$orgao','$emissao','$pai','$mae','$nome_resp','$sexo_resp','$data_nasc_resp','$estadocivil_resp','$endereco_resp','$numero_resp','$bairro_resp','$complemento_resp','$cidade_resp','$estado_resp','$cep_resp','$telefone_resp','$celular_resp','$email_resp','$cpf_resp','$rg_resp','$orgao_resp','$emissao_resp','$pai_resp','$mae_resp','$obs','$curso','$modulos','$data_inicio','$duracao','$mensalidade','$quant_parc','$modo_pagto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','Ativo','$preco_total','$quant_horas','$carga_horaria_semanal','$categoria','$valor','$valor_entrada','$valor_restante')";

mysql_query($comando,$conexao) or die("Erro ao matricular aluno!");

echo "Contrato Efetivado com Sucesso!!!... <br><br>";


?>

<?

$sql = "SELECT * FROM contratos where codigo_cli = '$codigo_cli' order by num_contrato desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_contrato = $linha[0];




}


?>


<?
if($valor_entrada=="0.00"){

}
else{
$comando = "insert into cx_entradas(agencia_credito,codigo_cli,datacadastro,datecadastro,horacadastro,valor,nfantasia,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,historico,dia,mes,ano,categoria_conta,nome,cpf,num_contrato) values('$nfantasia','$codigo_cli','$datacadastro','$datecadastro','$horacadastro','$valor_entrada','$nfantasia','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','Entrada do contrato','$dia_cx','$mes_cx','$ano_cx','Recebimento de Entrada','$nome_cli','$cpf_cli','$num_contrato')";

mysql_query($comando,$conexao) or die("Erro ao lançar entrada no Caixa!... Tente novamente!!!...");

}

?>

<?
$sql = "SELECT * FROM contratos order by num_contrato desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_contrato = $linha[0];




}
?>




<?

$vencto1 = "$dia"."/"."$mes"."/"."$ano";
$data_vencimento1 = "$ano-$mes-$dia"

?>
<?
if($quant_parc>=1){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano,data_vencimento) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$responsavel','$cpf_cli','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto1','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','1','$dia','$mes','$ano','$data_vencimento1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade no contas a receber!");

}
?>

<?
if($mes<=9){
$soma_vencto2 = bcadd($mes,1);
}
else{
$soma_vencto2 = bcadd($mes,1);
}
if($soma_vencto2>12){
$mes2 = "1";
}else{
$mes2 = $soma_vencto2;
}
if($soma_vencto2>12){
$ano2 = bcadd($ano,1);
}else{
$ano2 = $ano;
}
$vencto2 = "$dia"."/"."$mes2"."/"."$ano2";
$data_vencimento2 = "$ano2-$mes2-$dia";
if($quant_parc>=2){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano,data_vencimento) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$responsavel','$cpf_cli','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto2','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','2','$dia','$mes2','$ano2','$data_vencimento2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade no contas a receber!");

}
?>

<?
if($mes2<=9){
$soma_vencto3 = bcadd($mes2,1);
}
else{
$soma_vencto3 = bcadd($mes2,1);
}

if($soma_vencto3>12){
$mes3 = "1";
}else{
$mes3 = $soma_vencto3;
}
if($soma_vencto3>12){
$ano3 = bcadd($ano2,1);
}else{
$ano3 = $ano2;
}
$vencto3 = "$dia"."/"."$mes3"."/"."$ano3";
$data_vencimento3 = "$ano3-$mes3-$dia";
if($quant_parc>=3){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano,data_vencimento) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$responsavel','$cpf_cli','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto3','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','3','$dia','$mes3','$ano3','$data_vencimento3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade no contas a receber!");

}
?>

<?
if($mes3<=9){
$soma_vencto4 = bcadd($mes3,1);
}
else{
$soma_vencto4 = bcadd($mes3,1);
}
if($soma_vencto4>12){
$mes4 = "1";
}else{
$mes4 = $soma_vencto4;
}
if($soma_vencto4>12){
$ano4 = bcadd($ano3,1);
}else{
$ano4 = $ano3;
}
$vencto4 = "$dia"."/"."$mes4"."/"."$ano4";

if($quant_parc>=4){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto4','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','4','$dia','$mes4','$ano4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade no contas a receber!");

}
?>

<?

if($mes4<=9){
$soma_vencto5 = bcadd($mes4,1);
}
else{
$soma_vencto5 = bcadd($mes4,1);
}
if($soma_vencto5>12){
$mes5 = "1";
}else{
$mes5 = $soma_vencto5;
}
if($soma_vencto5>12){
$ano5 = bcadd($ano4,1);
}else{
$ano5 = $ano4;
}
$vencto5 = "$dia"."/"."$mes5"."/"."$ano5";

if($quant_parc>=5){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto5','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','5','$dia','$mes5','$ano5')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade no contas a receber!");

}
?>

<?

if($mes5<=9){
$soma_vencto6 = bcadd($mes5,1);
}
else{
$soma_vencto6 = bcadd($mes5,1);
}
if($soma_vencto6>12){
$mes6 = "1";
}else{
$mes6 = $soma_vencto6;
}
if($soma_vencto6>12){
$ano6 = bcadd($ano5,1);
}else{
$ano6 = $ano5;
}
$vencto6 = "$dia"."/"."$mes6"."/"."$ano6";

if($quant_parc>=6){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto6','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','6','$dia','$mes6','$ano6')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade no contas a receber!");

}
?>

<?

if($mes6<=9){
$soma_vencto7 = bcadd($mes6,1);
}
else{
$soma_vencto7 = bcadd($mes6,1);
}
if($soma_vencto7>12){
$mes7 = "1";
}else{
$mes7 = $soma_vencto7;
}
if($soma_vencto7>12){
$ano7 = bcadd($ano6,1);
}else{
$ano7 = $ano6;
}
$vencto7 = "$dia"."/"."$mes7"."/"."$ano7";

if($quant_parc>=7){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto7','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','7','$dia','$mes7','$ano7')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade no contas a receber!");

}
?>

<?

if($mes7<=9){
$soma_vencto8 = bcadd($mes7,1);
}
else{
$soma_vencto8 = bcadd($mes7,1);
}
if($soma_vencto8>12){
$mes8 = "1";
}else{
$mes8 = $soma_vencto8;
}
if($soma_vencto8>12){
$ano8 = bcadd($ano7,1);
}else{
$ano8 = $ano7;
}
$vencto8 = "$dia"."/"."$mes8"."/"."$ano8";

if($quant_parc>=8){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto8','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','8','$dia','$mes8','$ano8')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade no contas a receber!");

}
?>

<?

if($mes8<=9){
$soma_vencto9 = bcadd($mes8,1);
}
else{
$soma_vencto9 = bcadd($mes8,1);
}
if($soma_vencto9>12){
$mes9 = "1";
}else{
$mes9 = $soma_vencto9;
}
if($soma_vencto9>12){
$ano9 = bcadd($ano8,1);
}else{
$ano9 = $ano8;
}
$vencto9 = "$dia"."/"."$mes9"."/"."$ano9";

if($quant_parc>=9){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto9','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','9','$dia','$mes9','$ano9')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade no contas a receber!");

}
?>

<?

if($mes9<=9){
$soma_vencto10 = bcadd($mes9,1);
}
else{
$soma_vencto10 = bcadd($mes9,1);
}
if($soma_vencto10>12){
$mes10 = "1";
}else{
$mes10 = $soma_vencto10;
}
if($soma_vencto10>12){
$ano10 = bcadd($ano9,1);
}else{
$ano10 = $ano9;
}
$vencto10 = "$dia"."/"."$mes10"."/"."$ano10";

if($quant_parc>=10){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto10','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','10','$dia','$mes10','$ano10')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade no contas a receber!");

}
?>

<?

if($mes10<=9){
$soma_vencto11 = bcadd($mes10,1);
}
else{
$soma_vencto11 = bcadd($mes10,1);
}
if($soma_vencto11>12){
$mes11 = "1";
}else{
$mes11 = $soma_vencto11;
}
if($soma_vencto11>12){
$ano11 = bcadd($ano10,1);
}else{
$ano11 = $ano10;
}
$vencto11 = "$dia"."/"."$mes11"."/"."$ano11";

if($quant_parc>=11){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto11','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','11','$dia','$mes11','$ano11')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11º mensalidade no contas a receber!");

}
?>

<?

if($mes11<=9){
$soma_vencto12 = bcadd($mes11,1);
}
else{
$soma_vencto12 = bcadd($mes11,1);
}
if($soma_vencto12>12){
$mes12 = "1";
}else{
$mes12 = $soma_vencto12;
}
if($soma_vencto12>12){
$ano12 = bcadd($ano11,1);
}else{
$ano12 = $ano11;
}
$vencto12 = "$dia"."/"."$mes12"."/"."$ano12";

if($quant_parc>=12){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto12','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','12','$dia','$mes12','$ano12')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12º mensalidade no contas a receber!");

}
?>

<?

if($mes12<=9){
$soma_vencto13 = bcadd($mes12,1);
}
else{
$soma_vencto13 = bcadd($mes12,1);
}
if($soma_vencto13>12){
$mes13 = "1";
}else{
$mes13 = $soma_vencto13;
}
if($soma_vencto13>12){
$ano13 = bcadd($ano12,1);
}else{
$ano13 = $ano12;
}
$vencto13 = "$dia"."/"."$mes13"."/"."$ano13";

if($quant_parc>=13){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto13','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','13','$dia','$mes13','$ano13')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 13º mensalidade no contas a receber!");

}
?>

<?

if($mes13<=9){
$soma_vencto14 = bcadd($mes13,1);
}
else{
$soma_vencto14 = bcadd($mes13,1);
}
if($soma_vencto14>12){
$mes14 = "1";
}else{
$mes14 = $soma_vencto14;
}
if($soma_vencto14>12){
$ano14 = bcadd($ano13,1);
}else{
$ano14 = $ano13;
}
$vencto14 = "$dia"."/"."$mes14"."/"."$ano14";

if($quant_parc>=14){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto14','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','14','$dia','$mes14','$ano14')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 14º mensalidade no contas a receber!");

}
?>

<?

if($mes14<=9){
$soma_vencto15 = bcadd($mes14,1);
}
else{
$soma_vencto15 = bcadd($mes14,1);
}
if($soma_vencto15>12){
$mes15 = "1";
}else{
$mes15 = $soma_vencto15;
}
if($soma_vencto15>12){
$ano15 = bcadd($ano14,1);
}else{
$ano15 = $ano14;
}
$vencto15 = "$dia"."/"."$mes15"."/"."$ano15";

if($quant_parc>=15){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto15','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','15','$dia','$mes15','$ano15')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 15º mensalidade no contas a receber!");

}
?>

<?

if($mes15<=9){
$soma_vencto16 = bcadd($mes15,1);
}
else{
$soma_vencto16 = bcadd($mes15,1);
}
if($soma_vencto16>12){
$mes16 = "1";
}else{
$mes16 = $soma_vencto16;
}
if($soma_vencto16>12){
$ano16 = bcadd($ano15,1);
}else{
$ano16 = $ano15;
}
$vencto16 = "$dia"."/"."$mes16"."/"."$ano16";

if($quant_parc>=16){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto16','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','16','$dia','$mes16','$ano16')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 16º mensalidade no contas a receber!");

}
?>

<?

if($mes16<=9){
$soma_vencto17 = bcadd($mes16,1);
}
else{
$soma_vencto17 = bcadd($mes16,1);
}
if($soma_vencto17>12){
$mes17 = "1";
}else{
$mes17 = $soma_vencto17;
}
if($soma_vencto17>12){
$ano17 = bcadd($ano16,1);
}else{
$ano17 = $ano16;
}
$vencto17 = "$dia"."/"."$mes17"."/"."$ano17";

if($quant_parc>=17){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto17','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','17','$dia','$mes17','$ano17')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 17º mensalidade no contas a receber!");

}
?>

<?

if($mes17<=9){
$soma_vencto18 = bcadd($mes17,1);
}
else{
$soma_vencto18 = bcadd($mes17,1);
}
if($soma_vencto18>12){
$mes18 = "1";
}else{
$mes18 = $soma_vencto18;
}
if($soma_vencto18>12){
$ano18 = bcadd($ano17,1);
}else{
$ano18 = $ano17;
}
$vencto18 = "$dia"."/"."$mes18"."/"."$ano18";

if($quant_parc>=18){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto18','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','18','$dia','$mes18','$ano18')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 18º mensalidade no contas a receber!");

}
?>

<?

if($mes18<=9){
$soma_vencto19 = bcadd($mes18,1);
}
else{
$soma_vencto19 = bcadd($mes18,1);
}
if($soma_vencto19>12){
$mes19 = "1";
}else{
$mes19 = $soma_vencto19;
}
if($soma_vencto19>12){
$ano19 = bcadd($ano18,1);
}else{
$ano19 = $ano18;
}
$vencto19 = "$dia"."/"."$mes19"."/"."$ano19";

if($quant_parc>=19){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto19','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','19','$dia','$mes19','$ano19')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 19º mensalidade no contas a receber!");

}
?>

<?

if($mes19<=9){
$soma_vencto20 = bcadd($mes19,1);
}
else{
$soma_vencto20 = bcadd($mes19,1);
}
if($soma_vencto20>12){
$mes20 = "1";
}else{
$mes20 = $soma_vencto20;
}
if($soma_vencto20>12){
$ano20 = bcadd($ano19,1);
}else{
$ano20 = $ano19;
}
$vencto20 = "$dia"."/"."$mes20"."/"."$ano20";

if($quant_parc>=20){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto20','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','20','$dia','$mes20','$ano20')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 20º mensalidade no contas a receber!");

}
?>

<?

if($mes20<=9){
$soma_vencto21 = bcadd($mes20,1);
}
else{
$soma_vencto21 = bcadd($mes20,1);
}
if($soma_vencto21>12){
$mes21 = "1";
}else{
$mes21 = $soma_vencto21;
}
if($soma_vencto21>12){
$ano21 = bcadd($ano20,1);
}else{
$ano21 = $ano20;
}
$vencto21 = "$dia"."/"."$mes21"."/"."$ano21";

if($quant_parc>=21){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto21','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','21','$dia','$mes21','$ano21')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 21º mensalidade no contas a receber!");

}
?>

<?

if($mes21<=9){
$soma_vencto22 = bcadd($mes21,1);
}
else{
$soma_vencto22 = bcadd($mes21,1);
}
if($soma_vencto22>12){
$mes22 = "1";
}else{
$mes22 = $soma_vencto22;
}
if($soma_vencto22>12){
$ano22 = bcadd($ano21,1);
}else{
$ano22 = $ano21;
}
$vencto22 = "$dia"."/"."$mes22"."/"."$ano22";

if($quant_parc>=22){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto22','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','22','$dia','$mes22','$ano22')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 22º mensalidade no contas a receber!");

}
?>

<?

if($mes22<=9){
$soma_vencto23 = bcadd($mes22,1);
}
else{
$soma_vencto23 = bcadd($mes22,1);
}
if($soma_vencto23>12){
$mes23 = "1";
}else{
$mes23 = $soma_vencto23;
}
if($soma_vencto23>12){
$ano23 = bcadd($ano22,1);
}else{
$ano23 = $ano22;
}
$vencto23 = "$dia"."/"."$mes23"."/"."$ano23";

if($quant_parc>=23){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto23','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','23','$dia','$mes23','$ano23')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 23º mensalidade no contas a receber!");

}
?>

<?

if($mes23<=9){
$soma_vencto24 = bcadd($mes23,1);
}
else{
$soma_vencto24 = bcadd($mes23,1);
}
if($soma_vencto24>12){
$mes24 = "1";
}else{
$mes24 = $soma_vencto24;
}
if($soma_vencto24>12){
$ano24 = bcadd($ano23,1);
}else{
$ano24 = $ano23;
}
$vencto24 = "$dia"."/"."$mes24"."/"."$ano24";

if($quant_parc>=24){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto24','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','24','$dia','$mes24','$ano24')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 24º mensalidade no contas a receber!");

}
?>

<?

if($mes24<=9){
$soma_vencto25 = bcadd($mes24,1);
}
else{
$soma_vencto25 = bcadd($mes24,1);
}
if($soma_vencto25>12){
$mes25 = "1";
}else{
$mes25 = $soma_vencto25;
}
if($soma_vencto25>12){
$ano25 = bcadd($ano24,1);
}else{
$ano25 = $ano24;
}
$vencto25 = "$dia"."/"."$mes25"."/"."$ano25";

if($quant_parc>=25){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto25','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','25','$dia','$mes25','$ano25')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 25º mensalidade no contas a receber!");

}
?>

<?

if($mes25<=9){
$soma_vencto26 = bcadd($mes25,1);
}
else{
$soma_vencto26 = bcadd($mes25,1);
}
if($soma_vencto26>12){
$mes26 = "1";
}else{
$mes26 = $soma_vencto26;
}
if($soma_vencto26>12){
$ano26 = bcadd($ano25,1);
}else{
$ano26 = $ano25;
}
$vencto26 = "$dia"."/"."$mes26"."/"."$ano26";

if($quant_parc>=26){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto26','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','26','$dia','$mes26','$ano26')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 26º mensalidade no contas a receber!");

}
?>

<?

if($mes26<=9){
$soma_vencto27 = bcadd($mes26,1);
}
else{
$soma_vencto27 = bcadd($mes26,1);
}
if($soma_vencto27>12){
$mes27 = "1";
}else{
$mes27 = $soma_vencto27;
}
if($soma_vencto27>12){
$ano27 = bcadd($ano26,1);
}else{
$ano27 = $ano26;
}
$vencto27 = "$dia"."/"."$mes27"."/"."$ano27";

if($quant_parc>=27){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto27','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','27','$dia','$mes27','$ano27')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 27º mensalidade no contas a receber!");

}
?>

<?

if($mes27<=9){
$soma_vencto28 = bcadd($mes27,1);
}
else{
$soma_vencto28 = bcadd($mes27,1);
}
if($soma_vencto28>12){
$mes28 = "1";
}else{
$mes28 = $soma_vencto28;
}
if($soma_vencto28>12){
$ano28 = bcadd($ano27,1);
}else{
$ano28 = $ano27;
}
$vencto28 = "$dia"."/"."$mes28"."/"."$ano28";

if($quant_parc>=28){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto28','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','28','$dia','$mes28','$ano28')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 28º mensalidade no contas a receber!");

}
?>

<?

if($mes28<=9){
$soma_vencto29 = bcadd($mes28,1);
}
else{
$soma_vencto29 = bcadd($mes28,1);
}
if($soma_vencto29>12){
$mes29 = "1";
}else{
$mes29 = $soma_vencto29;
}
if($soma_vencto29>12){
$ano29 = bcadd($ano28,1);
}else{
$ano29 = $ano28;
}
$vencto29 = "$dia"."/"."$mes29"."/"."$ano29";

if($quant_parc>=29){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto29','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','29','$dia','$mes29','$ano29')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 29º mensalidade no contas a receber!");

}
?>

<?

if($mes29<=9){
$soma_vencto30 = bcadd($mes29,1);
}
else{
$soma_vencto30 = bcadd($mes29,1);
}
if($soma_vencto30>12){
$mes30 = "1";
}else{
$mes30 = $soma_vencto30;
}
if($soma_vencto30>12){
$ano30 = bcadd($ano29,1);
}else{
$ano30 = $ano29;
}
$vencto30 = "$dia"."/"."$mes30"."/"."$ano30";

if($quant_parc>=30){
$comando = "insert into contas_a_receber(codigo_cli,datacadastro,horacadastro,nome,nome_resp,cpf_resp,obs,curso,modulos,duracao,mensalidade,vencto,quant_parc,modo_pagto,juros_diarios,valor_recebido,quitacao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dataalteracao,horaalteracao,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_mensalidade,dia,mes,ano) values('$codigo_cli','$datacadastro','$horacadastro','$nome','$nome_resp','$cpf_resp','$obs','$curso','$modulos','$duracao','$mensalidade','$vencto30','$quant_parc','$modo_pagto','$juros_diarios','$valor_recebido','Em Aberto','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dataalteracao','$horaalteracao','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','30','$dia','$mes30','$ano30')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 30º mensalidade no contas a receber!");

}
?>





<?
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_empresa;
	
	//PREPARA O PEDIDO
	$mens   =  "Olá! você foi matriculado na $nfantasia   \n";
	$mens  .=  "Visite-nos $site \n";
	$mens  .=  "Seu código é : ".$codigo_aluno."                                                    \n";
	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "Curso : ".$curso."                                                    \n";
	$mens  .=  "Duração : ".$duracao."                                                    \n";
	$mens  .=  "Mensalide : R$ ".$mensalidade."                                                    \n";
	$mens  .=  "Data da matricula: ".$datacadastro."                                                    \n";
	$mens  .=  "Hora da matricula: ".$horacadastro."                                                    \n";
	$mens  .=  "Data de início do curso : ".$data_inicio."                                                    \n";
	$mens  .=  "Operador que efetuou o cadastro: ".$operador."                                                    \n";
	$mens  .=  "Celular: ".$cel_operador."                                                    \n";
	$mens  .=  "E-Mail: ".$email_operador."                                                    \n";
	$mens  .=  "Estabelecimento: ".$estabelecimento."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Aluno matriculado na $nfantasia em ".$datacadastro, $mens,"From:".$email_dest."\r\nBcc:".$email);
	//$envia  =  mail($email_operador, "Aluno matriculado na $nfantasia em ".$datacadastro, $mens,"From:".$email_dest);

?>




<p>&nbsp;</p>
<table width="100%"  border="0">
  <tr>
    <td width="18%"><form name="form1" method="post" action="../clientes/verifica.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit2" value="Voltar">
      <input name="nome" type="hidden" id="nome" value="<? echo $nome_cli; ?>">
    </form></td>
    <td width="2%">&nbsp;</td>
    <td width="26%"><form action="contrato.php" method="post" name="form1" target="_blank">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit3" value="Imprimir Contrato">
      <input name="codigo" type="hidden" id="codigo3" value="<? echo $codigo_cli; ?>">
    </form></td>
    <td width="5%">&nbsp;</td>
    <td width="30%"><form action="carne.php" method="post" name="form2" target="_blank">
      <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo_cli; ?>">
      <input type="submit" name="Submit5" value="Emitir Carn&ecirc;">
    </form></td>
    <td width="19%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>