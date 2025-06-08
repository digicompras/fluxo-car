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
<title>Voltar ao Hist&oacute;rico do cliente</title>
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
</style>
</head>

<?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';
error_reporting(E_ALL);

?>

		  
		  
		  <?
$codigo_orcamento_finalizar = $_POST['codigo_orcamento_finalizar'];		  
$condicao = $_POST['condicao'];
$num_orcamento_bloco = $_POST['num_orcamento_bloco'];


$status = "Finalizado";


if($condicao=="PEDIDO"){
$status_fatura = "FATURADO";
}
else{
$status_fatura = "A FATURAR";
}



$codigo_cliente = $_POST['codigo_cliente'];		  

$horafechamento = $_POST['horafechamento'];	

$quantparc = $_POST['quantparc'];

$modopagto = $_POST['modopagto'];		  

$cartao = $_POST['cartao'];	

	

  
	  
$datafechamento = date('Y-m-d');

$data = $datafechamento;

$data2 = explode("-", $data);


$dia = $data2[2];

$mes = $data2[1];

$ano = $data2[0];


//dados do operador que alterou

$loja = $_POST['loja'];

$operador_alterou = $_POST['operador_alterou'];


?>

<?

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos_for` set `status_fatura` = '$status_fatura',`condicao` = '$condicao',`status` = '$status',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`operador_alterou` = '$operador_alterou',`datealteracao` = '$datafechamento',`horaalteracao` = '$horafechamento',`num_orcamento_bloco` = '$num_orcamento_bloco' where `orcamentos_for`. `codigo_orcamento` = '$codigo_orcamento_finalizar' limit 1 ";
}

mysql_query($comando,$conexao);


?>


<?

$sql = "SELECT * FROM produtos_em_orcamento_for where codigo_orcamento = '$codigo_orcamento_finalizar'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];





$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento_for` set `status_fatura` = '$status_fatura',`condicao` = '$condicao',`status` = '$status',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`operador_alterou` = '$operador_alterou',`datealteracao` = '$datafechamento',`horaalteracao` = '$horafechamento' where `produtos_em_orcamento_for`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}


?>

<?
//-------------------SE CONDICAO FOR PEDIDO------------------

if($condicao == "PEDIDO"){
	
$comando = "insert into faturamento_futuro(datefaturamento,dia,mes,ano,hora,codigo_orcamento,codigo_cliente,loja,operador)

values('$datafechamento','$dia','$mes','$ano','$horafechamento','$codigo_orcamento_finalizar','$codigo_cliente','$loja','$operador_alterou')";
 
mysql_query($comando,$conexao);



	
$sql = "SELECT * FROM faturamento_futuro order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	
$num_fatura = $linha[0];
$loja = $linha[8];
$operador = $linha[9];

}




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos_for` set `num_fatura` = '$num_fatura',`data_fatura` = '$datafechamento',`dia_fatura` = '$dia',`mes_fatura` = '$mes',`ano_fatura` = '$ano' where `orcamentos_for`. `codigo_orcamento` = '$codigo_orcamento_finalizar' limit 1 ";
}

mysql_query($comando,$conexao);






$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento_for` set `num_fatura` = '$num_fatura',`status_fatura` = '$status_fatura',`dia_fatura` = '$dia',`mes_fatura` = '$mes',`ano_fatura` = '$ano',`hora_fatura` = '$horafechamento',`datealteracao` = '$datafechamento',`horaalteracao` = '$horafechamento' where `produtos_em_orcamento_for`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);


	
	

$sql = "SELECT * FROM orcamentos_for where codigo_orcamento = '$codigo_orcamento_finalizar' and status = 'Finalizado' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	
$codigo_orcamento = $linha[0];
	
$dataabertura = $linha[1];
$horaabertura = $linha[2];
$diaabertura = $linha[3];
$mesabertura = $linha[4];
$anoabertura = $linha[5];
$loja = $linha[6];
$total_geral = $linha[7];
$quantparc = $linha[8];
$modopagto = $linha[10];
$operador = $linha[12];
$condicao = $linha[16];
$status = $linha[17];
$num_fatura = $linha[18];
$status_fatura = $linha[19];
$data_fatura = $linha[20];
$dia_fatura = $linha[21];
$mes_fatura = $linha[22];
$ano_fatura = $linha[23];
$hora_fatura = $linha[24];

$codigo_cliente = $linha[25];
$cpf = $linha[26];
$nome = $linha[27];

$cartao = $linha[28];
$valorparcela = $linha[29];
	
$datafechamento = $linha[30];
$horafechamento = $linha[31];

$entrada = $linha[35];

$num_orcamento_bloco = $linha[40];

}

$total_do_pedido = bcsub($total_geral,$entrada,2);


if(($modopagto == "CARTAO DE DEBITO") or ($modopagto == "CARTAO DE CREDITO")){

$sql = "SELECT * FROM tabela_cartoes where modopagto = '$modopagto' and status = 'Ativo' and mes = '$mes' and ano = '$ano' and '$quantparc' >= prazo_inicial and '$quantparc' <= prazo_final order by modopagto asc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
		
$aliquota = $linha[9];
}

$aliquota_decimal = bcdiv($aliquota,100,4);

$custo_com_cartao = bcmul($total_geral,$aliquota_decimal,2);


//--------------------INICIO LANCAMENTO DOS CUSTOS DO CARTAO NA SAIDA DE CAIXA------------------------------------


$datecadastro = "$ano-$mes-$dia";
$datacadastro = "$dia-$mes-$ano";
$horacadastro = date('H:i:s');


$sql2 = "SELECT * FROM cx_saidas where num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' and categoria_conta = '$modopagto'";
$res2 = mysql_query($sql2);

$lancamentos = mysql_num_rows($res2);

if($lancamentos>=1){

echo "Valor referente a $num_fatura e orçamento $codigo_orcamento já registrado no caixa!!!... Por essa razão não foi lançado novamente! <br> ";

}
else{



$comando = "insert into cx_saidas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,estabelecimento,num_fatura,codigo_orcamento,codigo_cliente) 



values('$custo_com_cartao','$dia','$mes','$ano','$datacadastro','$horacadastro','$loja','Despesa com cartao ref a fatura $num_fatura, orcamento $codigo_orcamento do cliente $nome - CPF $cpf','CARTAO DE CREDITO','$datecadastro','$nome','$cpf','$operador_alterou','$loja','$num_fatura','$codigo_orcamento','$codigo_cliente')";


mysql_query($comando,$conexao);



echo "<br> Custo de operações com cartão no valor de R$ $custo_com_cartao referente a fatura $num_fatura - pedido $codigo_orcamento lançada na saída de caixa com sucesso!<br>";

}






$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos_for` set `custo_com_cartao` = '$custo_com_cartao' where `orcamentos_for`. `codigo_orcamento` = '$codigo_orcamento_finalizar' limit 1 ";
}

mysql_query($comando,$conexao);





}

//---------------------------------FIM DO LANCAMENTO DOS CUSTOS DO CARTAO NA SAIDA DE CAIXA------------------------------------------------//








$ano_parc = date('Y');

$mes_parc = date('m');
$dia_vencto = date('d');

if(($mes_parc=="02") or ($mes_parc=="2")){
if($dia_vencto>="29"){
$dia_parc = "28";
}
else{	
$dia_parc = $dia_vencto;
}
}
else{
	
$dia_parc = $dia_vencto;
	
}

$datacadastro = "$ano_parc-$mes_parc-$dia_parc";
$hora_baixa = $horafechamento;
$horacadastro = "$horafechamento";

$estabelecimento_proposta = $loja;

$quant_parc = $quantparc;



$valor_entrada = $entrada;




$sql3 = "SELECT * FROM contas_a_pagar where num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' and codigo_cliente = '$codigo_cliente'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registros = mysql_num_rows($res3);


$data_geracao = $linha['2'];
$hora_geracao = $linha['3'];

}


if($registros>=1){
	
echo "<br><br>ATENÇÃO!!!... O CONTAS A RECEBER REFERENTE A FATURA $num_fatura ORÇAMENTO $codigo_orcamento JÁ FOI GERADO EM $data_geracao AS $hora_geracao";
	
}
else{

$historico = "Fatura Nº $num_fatura, ref ao orcamento Nº $codigo_orcamento do cliente $nome codigo $codigo_cliente";

$vencto_entrada = "$ano_parc-$mes_parc-$dia_parc";

if($valor_entrada<>0.00){
$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade)
values('$num_fatura','$datacadastro','$horacadastro','$nome','$cpf','$valor_entrada','$vencto_entrada','$quant_parc','$modopagto','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$codigo_orcamento','0')";

mysql_query($comando,$conexao) or die("Erro ao gravar a Entrada no contas a pagar!");

}






if($mes_parc<=9){
$soma_vencto1 = "0".bcadd($mes_parc,1);
}
else{
$soma_vencto1 = bcadd($mes_parc,1);
}
if($soma_vencto1>12){
$mes_parc1 = "01";
}else{
$mes_parc1 = $soma_vencto1;
}
if($soma_vencto1>12){
$ano_parc1 = bcadd($ano_parc,1);
}else{
$ano_parc1 = $ano_parc;
}

if(($mes_parc1=="02") or ($mes_parc1=="2")){
if($dia_vencto>="29"){
$dia_parc1 = "28";
}
else{
$dia_parc1 = $dia_vencto;
}
}
else{
	
$dia_parc1 = $dia_vencto;
	
}


$vencto1 = "$ano_parc1-$mes_parc1-$dia_parc1";

if($quant_parc>=1){
$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade)
values('$num_fatura','$datacadastro','$horacadastro','$nome','$cpf','$valorparcela','$vencto1','$quant_parc','$modopagto','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$codigo_orcamento','1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade no contas a pagar!");

}


if($mes_parc1<=9){
$soma_vencto2 = "0".bcadd($mes_parc1,1);
}
else{
$soma_vencto2 = bcadd($mes_parc1,1);
}
if($soma_vencto2>12){
$mes_parc2 = "01";
}else{
$mes_parc2 = $soma_vencto2;
}
if($soma_vencto2>12){
$ano_parc2 = bcadd($ano_parc1,1);
}else{
$ano_parc2 = $ano_parc1;
}

if(($mes_parc2=="02") or ($mes_parc2=="2")){
if($dia_vencto>="29"){
$dia_parc2 = "28";
}
else{
$dia_parc2 = $dia_vencto;
}
}
else{
	
$dia_parc2 = $dia_vencto;
	
}

$vencto2 = "$ano_parc2-$mes_parc2-$dia_parc2";

if($quant_parc>=2){
$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade)
values('$num_fatura','$datacadastro','$horacadastro','$nome','$cpf','$valorparcela','$vencto2','$quant_parc','$modopagto','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$codigo_orcamento','2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade no contas a pagar!");

}



if($mes_parc2<=9){
$soma_vencto3 = "0".bcadd($mes_parc2,1);
}
else{
$soma_vencto3 = bcadd($mes_parc2,1);
}
if($soma_vencto3>12){
$mes_parc3 = "01";
}else{
$mes_parc3 = $soma_vencto3;
}
if($soma_vencto3>12){
$ano_parc3 = bcadd($ano_parc2,1);
}else{
$ano_parc3 = $ano_parc2;
}

if(($mes_parc3=="02") or ($mes_parc3=="2")){
if($dia_vencto>="29"){
$dia_parc3 = "28";
}
else{
$dia_parc3 = $dia_vencto;
}
}
else{
	
$dia_parc3 = $dia_vencto;
	
}

$vencto3 = "$ano_parc3-$mes_parc3-$dia_parc3";

if($quant_parc>=3){
$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade)
values('$num_fatura','$datacadastro','$horacadastro','$nome','$cpf','$valorparcela','$vencto3','$quant_parc','$modopagto','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$codigo_orcamento','3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade no contas a pagar!");

}



if($mes_parc3<=9){
$soma_vencto4 = "0".bcadd($mes_parc3,1);
}
else{
$soma_vencto4 = bcadd($mes_parc3,1);
}
if($soma_vencto4>12){
$mes_parc4 = "01";
}else{
$mes_parc4 = $soma_vencto4;
}
if($soma_vencto4>12){
$ano_parc4 = bcadd($ano_parc3,1);
}else{
$ano_parc4 = $ano_parc3;
}

if(($mes_parc4=="02") or ($mes_parc4=="2")){
if($dia_vencto>="29"){
$dia_parc4 = "28";
}
else{
$dia_parc4 = $dia_vencto;
}
}
else{
	
$dia_parc4 = $dia_vencto;
	
}

$vencto4 = "$ano_parc4-$mes_parc4-$dia_parc4";

if($quant_parc>=4){
$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade)
values('$num_fatura','$datacadastro','$horacadastro','$nome','$cpf','$valorparcela','$vencto4','$quant_parc','$modopagto','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$codigo_orcamento','4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade no contas a pagar!");

}





if($mes_parc4<=9){
$soma_vencto5 = "0".bcadd($mes_parc4,1);
}
else{
$soma_vencto5 = bcadd($mes_parc4,1);
}
if($soma_vencto5>12){
$mes_parc5 = "01";
}else{
$mes_parc5 = $soma_vencto5;
}
if($soma_vencto5>12){
$ano_parc5 = bcadd($ano_parc4,1);
}else{
$ano_parc5 = $ano_parc4;
}

if(($mes_parc5=="02") or ($mes_parc5=="2")){
if($dia_vencto>="29"){
$dia_parc5 = "28";
}
else{
$dia_parc5 = $dia_vencto;
}
}
else{
	
$dia_parc5 = $dia_vencto;
	
}

$vencto5 = "$ano_parc5-$mes_parc5-$dia_parc5";

if($quant_parc>=5){
$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade)
values('$num_fatura','$datacadastro','$horacadastro','$nome','$cpf','$valorparcela','$vencto5','$quant_parc','$modopagto','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$codigo_orcamento','5')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade no contas a pagar!");

}





if($mes_parc5<=9){
$soma_vencto6 = "0".bcadd($mes_parc5,1);
}
else{
$soma_vencto6 = bcadd($mes_parc5,1);
}
if($soma_vencto6>12){
$mes_parc6 = "01";
}else{
$mes_parc6 = $soma_vencto6;
}
if($soma_vencto6>12){
$ano_parc6 = bcadd($ano_parc5,1);
}else{
$ano_parc6 = $ano_parc5;
}

if(($mes_parc6=="02") or ($mes_parc6=="2")){
if($dia_vencto>="29"){
$dia_parc6 = "28";
}
else{
$dia_parc6 = $dia_vencto;
}
}
else{
	
$dia_parc6 = $dia_vencto;
	
}

$vencto6 = "$ano_parc6-$mes_parc6-$dia_parc6";

if($quant_parc>=6){
$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade)
values('$num_fatura','$datacadastro','$horacadastro','$nome','$cpf','$valorparcela','$vencto6','$quant_parc','$modopagto','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$codigo_orcamento','6')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade no contas a pagar!");

}





if($mes_parc6<=9){
$soma_vencto7 = "0".bcadd($mes_parc6,1);
}
else{
$soma_vencto7 = bcadd($mes_parc6,1);
}
if($soma_vencto7>12){
$mes_parc7 = "01";

}else{
$mes_parc7 = $soma_vencto7;
}

if($soma_vencto7>12){
$ano_parc7 = bcadd($ano_parc6,1);
}else{
$ano_parc7 = $ano_parc6;
}

if(($mes_parc7=="02") or ($mes_parc7=="2")){
if($dia_vencto>="29"){
$dia_parc7 = "28";
}
else{
$dia_parc7 = $dia_vencto;
}
}
else{
	
$dia_parc7 = $dia_vencto;
	
}

$vencto7 = "$ano_parc7-$mes_parc7-$dia_parc7";

echo $vencto6;

if($quant_parc>=7){
$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade)
values('$num_fatura','$datacadastro','$horacadastro','$nome','$cpf','$valorparcela','$vencto7','$quant_parc','$modopagto','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$codigo_orcamento','7')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade no contas a pagar!");

}





if($mes_parc7<=9){
$soma_vencto8 = "0".bcadd($mes_parc7,1);
}
else{
$soma_vencto8 = bcadd($mes_parc7,1);
}
if($soma_vencto8>12){
$mes_parc8 = "01";

}else{
$mes_parc8 = $soma_vencto8;
}
if($soma_vencto8>12){
$ano_parc8 = bcadd($ano_parc7,1);
}else{
$ano_parc8 = $ano_parc7;
}

if(($mes_parc8==02) or ($mes_parc8==2)){
if($dia_vencto>="29"){
$dia_parc8 = "28";
}
else{
$dia_parc8 = $dia_vencto;
}
}
else{
	
$dia_parc8 = $dia_vencto;
	
}

$vencto8 = "$ano_parc8-$mes_parc8-$dia_parc8";

if($quant_parc>=8){
$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade)
values('$num_fatura','$datacadastro','$horacadastro','$nome','$cpf','$valorparcela','$vencto8','$quant_parc','$modopagto','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$codigo_orcamento','8')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade no contas a pagar!");

}





if($mes_parc8<=9){
$soma_vencto9 = "0".bcadd($mes_parc8,1);
}
else{
$soma_vencto9 = bcadd($mes_parc8,1);
}
if($soma_vencto9>12){
$mes_parc9 = "01";
}else{
$mes_parc9 = $soma_vencto9;
}
if($soma_vencto9>12){
$ano_parc9 = bcadd($ano_parc8,1);
}else{
$ano_parc9 = $ano_parc8;
}

if(($mes_parc9=="02") or ($mes_parc9=="2")){
if($dia_vencto>="29"){
$dia_parc9 = "28";
}
else{
$dia_parc9 = $dia_vencto;
}
}
else{
	
$dia_parc9 = $dia_vencto;
	
}

$vencto9 = "$ano_parc9-$mes_parc9-$dia_parc9";

if($quant_parc>=9){
$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade)
values('$num_fatura','$datacadastro','$horacadastro','$nome','$cpf','$valorparcela','$vencto9','$quant_parc','$modopagto','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$codigo_orcamento','9')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade no contas a pagar!");

}





if($mes_parc9<=9){
$soma_vencto10 = "0".bcadd($mes_parc9,1);
}
else{
$soma_vencto10 = bcadd($mes_parc9,1);
}
if($soma_vencto10>12){
$mes_parc10 = "01";
}else{
$mes_parc10 = $soma_vencto10;
}
if($soma_vencto10>12){
$ano_parc10 = bcadd($ano_parc9,1);
}else{
$ano_parc10 = $ano_parc9;
}

if(($mes_parc10=="02") or ($mes_parc10=="2")){
if($dia_vencto>="29"){
$dia_parc10 = "28";
}
else{
$dia_parc10 = $dia_vencto;
}
}
else{
	
$dia_parc10 = $dia_vencto;
	
}

$vencto10 = "$ano_parc10-$mes_parc10-$dia_parc10";

if($quant_parc>=10){
$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade)
values('$num_fatura','$datacadastro','$horacadastro','$nome','$cpf','$valorparcela','$vencto10','$quant_parc','$modopagto','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$codigo_orcamento','10')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade no contas a pagar!");

}



}


$sql = "SELECT * FROM produtos_em_orcamento_for where codigo_orcamento = '$codigo_orcamento'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigoproduto = $linha[17];
$quant = $linha[21];


}



}

//------------------FIM SE A CONDICAO FOR PEDIDO--------------
else{
	
	
echo "Finalizado com sucesso o $condicao Nº $codigo_orcamento_finalizar!!!...<br><br>";	
	
	
}
?>
















<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_empresa;
	
	//PREPARA O PEDIDO
	//$mens   =  "Olá! Orçamento alterado na $nfantasia_empresa!   \n";
	//$mens  .=  " \n";
	//$mens  .=  "Nº do Orçamento: ".$codigo_orcamento."                                                       \n";
	//$mens  .=  "STATUS: ".$status."                                                       \n";
	//$mens  .=  "Cliente: ".$loja."                                                    \n";
	//$mens  .=  "Data de alteração: ".$datafechamento."                                                    \n";
	//$mens  .=  "Hora de alteração: ".$horafechamento."                                                    \n";
	//$mens  .=  "Operador que efetuou a alteração: ".$operador_alterou."                                                    \n";
	//$mens  .=  "Estabelecimento: ".$loja."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Orçamento alterado no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email_dest);
	//$envia  =  mail($email_operador_alterou, "Orçamento alterado no sistema em ".$dataalteracao, $mens,"From:".$email_dest);

?>


<?


			
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
<form name="form2" method="post" action="historico_cliente.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
  <input type="submit" name="Submit" value="Voltar Hist&oacute;rico do cliente">
</form>
</body>
</html>
<?
mysql_close($conexao);
?>
