<?php

//require("conect/conect.php"); or die("erro na requisição");
require '../../../conect/conect.php';

/* Define o limitador de cache para 'private' */
$sql = "SELECT * FROM tempoexpiracaosenha limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$tempoexpiracaosenha = $linha['1'];


}


/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em 30 minutos */
session_cache_expire($tempoexpiracaosenha);
$cache_expire = session_cache_expire();

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


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
.style11 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}
-->
</style>
</head>
	
	<script Language="Javascript"> 
function printit(){ 
var NS = (navigator.appName == "Netscape"); 
var VERSION = parseInt(navigator.appVersion);

if (NS) { 
window.print() ; 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6,11);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = ""; 
} 
} 
</script> 

<script Language="Javascript"> 
printit();
</script>

<?

error_reporting(E_ALL);
error_reporting( E_ALL ^E_NOTICE );
?>
	

		  
<?

$quant_parc = $_POST['quantparc_cartao1']; //AQUI SE CONFIGURA O NUMERO DO CARTAO
	
if($modopagto=="CARTAO"){ $num_parcelas = $quantparc_cartao1; }else{ $num_parcelas = $quant_parc; }
	

	






//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc<=9){
$soma_venctocartao1 = "0".bcadd($mes_parc,0);
}
else{
$soma_venctocartao1 = bcadd($mes_parc,0);
}
}
else{

if($mes_parc<=9){
$soma_venctocartao1 = "0".bcadd($mes_parc,1);
}
else{
$soma_venctocartao1 = bcadd($mes_parc,1);
}
}

if($soma_venctocartao1>12){
$mes_parccartao1 = "01";
}else{
$mes_parccartao1 = $soma_venctocartao1;
}
if($soma_venctocartao1>12){
$ano_parccartao1 = bcadd($ano_parc,1);
}else{
$ano_parccartao1 = $ano_parc;
}

if(($mes_parccartao1=="02") or ($mes_parccartao1=="2")){
if($dia_vencto>="29"){
$dia_parccartao1 = "28";
}
else{
$dia_parccartao1 = $dia_vencto;
}
}
else{
	
$dia_parccartao1 = $dia_vencto;
	
}

$venctocartao1 = "$ano_parccartao1-$mes_parccartao1-$dia_parccartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc<=9){
$soma_venctocartao2 = "0".bcadd($mes_parc,0);
}
else{
$soma_venctocartao2 = bcadd($mes_parc,0);
}
}
else{

if($mes_parc<=9){
$soma_venctocartao2 = "0".bcadd($mes_parc,1);
}
else{
$soma_venctocartao2 = bcadd($mes_parc,1);
}
}

if($soma_venctocartao2>12){
$mes_parccartao2 = "01";
}else{
$mes_parccartao2 = $soma_venctocartao2;
}
if($soma_venctocartao2>12){
$ano_parccartao2 = bcadd($ano_parc,1);
}else{
$ano_parccartao2 = $ano_parc;
}

if(($mes_parccartao2=="02") or ($mes_parccartao2=="2")){
if($dia_vencto>="29"){
$dia_parccartao2 = "28";
}
else{
$dia_parccartao2 = $dia_vencto;
}
}
else{
	
$dia_parccartao2 = $dia_vencto;
	
}

$venctocartao2 = "$ano_parccartao2-$mes_parccartao2-$dia_parccartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc<=9){
$soma_venctocartao3 = "0".bcadd($mes_parc,0);
}
else{
$soma_venctocartao3 = bcadd($mes_parc,0);
}
}
else{

if($mes_parc<=9){
$soma_venctocartao3 = "0".bcadd($mes_parc,1);
}
else{
$soma_venctocartao3 = bcadd($mes_parc,1);
}
}

if($soma_venctocartao3>12){
$mes_parccartao3 = "01";
}else{
$mes_parccartao3 = $soma_venctocartao3;
}
if($soma_venctocartao3>12){
$ano_parccartao3 = bcadd($ano_parc,1);
}else{
$ano_parccartao3 = $ano_parc;
}

if(($mes_parccartao3=="02") or ($mes_parccartao3=="2")){
if($dia_vencto>="29"){
$dia_parccartao3 = "28";
}
else{
$dia_parccartao3 = $dia_vencto;
}
}
else{
	
$dia_parccartao3 = $dia_vencto;
	
}

$venctocartao3 = "$ano_parccartao3-$mes_parccartao3-$dia_parccartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc<=9){
$soma_venctocartao4 = "0".bcadd($mes_parc,0);
}
else{
$soma_venctocartao4 = bcadd($mes_parc,0);
}
}
else{

if($mes_parc<=9){
$soma_venctocartao4 = "0".bcadd($mes_parc,1);
}
else{
$soma_venctocartao4 = bcadd($mes_parc,1);
}
}

if($soma_venctocartao4>12){
$mes_parccartao4 = "01";
}else{
$mes_parccartao4 = $soma_venctocartao4;
}
if($soma_venctocartao4>12){
$ano_parccartao4 = bcadd($ano_parc,1);
}else{
$ano_parccartao4 = $ano_parc;
}

if(($mes_parccartao4=="02") or ($mes_parccartao4=="2")){
if($dia_vencto>="29"){
$dia_parccartao4 = "28";
}
else{
$dia_parccartao4 = $dia_vencto;
}
}
else{
	
$dia_parccartao4 = $dia_vencto;
	
}

$venctocartao4 = "$ano_parccartao4-$mes_parccartao4-$dia_parccartao4";

//-----------fim da verificação do tipo do cartao 4---------------------






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

		


if($quant_parc>=1) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto1','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";
mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$valorparcelacartao1','$venctocartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$valorparcelacartao2','$venctocartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}

if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$valorparcelacartao3','$venctocartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$valorparcelacartao4','$venctocartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$parcela_do_custo_com_cartao1','$venctocartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$parcela_do_custo_com_cartao2','$venctocartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao2 - $tipocartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$parcela_do_custo_com_cartao3','$venctocartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao3 - $tipocartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$parcela_do_custo_com_cartao4','$venctocartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao4 - $tipocartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}

}







//MENSALIDADE 2--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc1<=9){
$soma_vencto2cartao1 = "0".bcadd($mes_parc1,0);
}
else{
$soma_vencto2cartao1 = bcadd($mes_parc1,0);
}
}
else{

if($mes_par1<=9){
$soma_vencto2cartao1 = "0".bcadd($mes_parc1,1);
}
else{
$soma_vencto2cartao1 = bcadd($mes_parc1,1);
}
}

if($soma_vencto2cartao1>12){
$mes_par2ccartao1 = "01";
}else{
$mes_parc2cartao1 = $soma_vencto2cartao1;
}
if($soma_vencto2cartao1>12){
$ano_parc2cartao1 = bcadd($ano_parc1,1);
}else{
$ano_parc2cartao1 = $ano_parc1;
}

if(($mes_parc2cartao1=="02") or ($mes_parc2cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc2cartao1 = "28";
}
else{
$dia_parc2cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc2cartao1 = $dia_vencto;
	
}

$vencto2cartao1 = "$ano_parc2cartao1-$mes_parc2cartao1-$dia_parc2cartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc1<=9){
$soma_vencto2cartao2 = "0".bcadd($mes_parc1,0);
}
else{
$soma_vencto2cartao2 = bcadd($mes_parc1,0);
}
}
else{

if($mes_parc1<=9){
$soma_vencto2cartao2 = "0".bcadd($mes_parc1,1);
}
else{
$soma_vencto2cartao2 = bcadd($mes_parc1,1);
}
}

if($soma_vencto2cartao2>12){
$mes_parc2cartao2 = "01";
}else{
$mes_parc2cartao2 = $soma_vencto2cartao2;
}
if($soma_vencto2cartao2>12){
$ano_parc2cartao2 = bcadd($ano_parc1,1);
}else{
$ano_parc2cartao2 = $ano_parc1;
}

if(($mes_parc2cartao2=="02") or ($mes_parc2cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc2cartao2 = "28";
}
else{
$dia_parc2cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc2cartao2 = $dia_vencto;
	
}

$vencto2cartao2 = "$ano_parc2cartao2-$mes_parc2cartao2-$dia_parc2cartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc1<=9){
$soma_vencto2cartao3 = "0".bcadd($mes_parc1,0);
}
else{
$soma_vencto2cartao3 = bcadd($mes_parc1,0);
}
}
else{

if($mes_parc1<=9){
$soma_vencto2cartao3 = "0".bcadd($mes_parc1,1);
}
else{
$soma_vencto2cartao3 = bcadd($mes_parc1,1);
}
}

if($soma_vencto2cartao3>12){
$mes_parc2cartao3 = "01";
}else{
$mes_parc2cartao3 = $soma_vencto2cartao3;
}
if($soma_vencto2cartao3>12){
$ano_parc2cartao3 = bcadd($ano_parc1,1);
}else{
$ano_parc2cartao3 = $ano_parc1;
}

if(($mes_parc2cartao3=="02") or ($mes_parc2cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc2cartao3 = "28";
}
else{
$dia_parc2cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc2cartao3 = $dia_vencto;
	
}

$vencto2cartao3 = "$ano_parc2cartao3-$mes_parc2cartao3-$dia_parc2cartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc1<=9){
$soma_vencto2cartao4 = "0".bcadd($mes_parc1,0);
}
else{
$soma_vencto2cartao4 = bcadd($mes_parc1,0);
}
}
else{

if($mes_parc1<=9){
$soma_vencto2cartao4 = "0".bcadd($mes_parc1,1);
}
else{
$soma_vencto2cartao4 = bcadd($mes_parc1,1);
}
}

if($soma_vencto2cartao4>12){
$mes_parc2cartao4 = "01";
}else{
$mes_parc2cartao4 = $soma_vencto2cartao4;
}
if($soma_vencto2cartao4>12){
$ano_parc2cartao4 = bcadd($ano_parc1,1);
}else{
$ano_parc2cartao4 = $ano_parc1;
}

if(($mes_parc2cartao4=="02") or ($mes_parc2cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc2cartao4 = "28";
}
else{
$dia_parc2cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc2cartao4 = $dia_vencto;
	
}

$vencto2cartao4 = "$ano_parc2cartao4-$mes_parc2cartao4-$dia_parc2cartao4";

//-----------fim da verificação do tipo do cartao 4---------------------




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
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc2=="02") or ($mes_parc2=="2")){
if($dia_vencto>="29"){
$dia_parc2 = "28";
}
else{
$dia_parc2 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc2 = $dia_vencto_carteira;
	
}
	
}
else{

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

}
$vencto2 = "$ano_parc2-$mes_parc2-$dia_parc2";
		
		

if($quant_parc>=2) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valor_monetario_a_informar','$vencto2','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto2cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto2cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}

if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto2cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto2cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto2cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto2cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao2 - $tipocartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto2cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao3 - $tipocartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto2cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao4 - $tipocartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}







//MENSALIDADE 3--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc2<=9){
$soma_vencto3cartao1 = "0".bcadd($mes_parc2,0);
}
else{
$soma_vencto3cartao1 = bcadd($mes_parc2,0);
}
}
else{

if($mes_par2<=9){
$soma_vencto3cartao1 = "0".bcadd($mes_parc2,1);
}
else{
$soma_vencto3cartao1 = bcadd($mes_parc2,1);
}
}

if($soma_vencto3cartao1>12){
$mes_par3ccartao1 = "01";
}else{
$mes_parc3cartao1 = $soma_vencto3cartao1;
}
if($soma_vencto3cartao1>12){
$ano_parc3cartao1 = bcadd($ano_parc2,1);
}else{
$ano_parc3cartao1 = $ano_parc2;
}

if(($mes_parc3cartao1=="02") or ($mes_parc3cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc3cartao1 = "28";
}
else{
$dia_parc3cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc3cartao1 = $dia_vencto;
	
}

$vencto3cartao1 = "$ano_parc3cartao1-$mes_parc3cartao1-$dia_parc3cartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc2<=9){
$soma_vencto3cartao2 = "0".bcadd($mes_parc2,0);
}
else{
$soma_vencto3cartao2 = bcadd($mes_parc2,0);
}
}
else{

if($mes_parc2<=9){
$soma_vencto3cartao2 = "0".bcadd($mes_parc2,1);
}
else{
$soma_vencto3cartao2 = bcadd($mes_parc2,1);
}
}

if($soma_vencto3cartao2>12){
$mes_parc3cartao2 = "01";
}else{
$mes_parc3cartao2 = $soma_vencto3cartao2;
}
if($soma_vencto3cartao2>12){
$ano_parc3cartao2 = bcadd($ano_parc2,1);
}else{
$ano_parc3cartao2 = $ano_parc2;
}

if(($mes_parc3cartao2=="02") or ($mes_parc3cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc3cartao2 = "28";
}
else{
$dia_parc3cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc3cartao2 = $dia_vencto;
	
}

$vencto3cartao2 = "$ano_parc3cartao2-$mes_parc3cartao2-$dia_parc3cartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc2<=9){
$soma_vencto3cartao3 = "0".bcadd($mes_parc2,0);
}
else{
$soma_vencto3cartao3 = bcadd($mes_parc2,0);
}
}
else{

if($mes_parc2<=9){
$soma_vencto3cartao3 = "0".bcadd($mes_parc2,1);
}
else{
$soma_vencto3cartao3 = bcadd($mes_parc2,1);
}
}

if($soma_vencto3cartao3>12){
$mes_parc3cartao3 = "01";
}else{
$mes_parc3cartao3 = $soma_vencto3cartao3;
}
if($soma_vencto3cartao3>12){
$ano_parc3cartao3 = bcadd($ano_parc2,1);
}else{
$ano_parc3cartao3 = $ano_parc2;
}

if(($mes_parc3cartao3=="02") or ($mes_parc3cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc3cartao3 = "28";
}
else{
$dia_parc3cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc3cartao3 = $dia_vencto;
	
}

$vencto3cartao3 = "$ano_parc3cartao3-$mes_parc3cartao3-$dia_parc3cartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc2<=9){
$soma_vencto3cartao4 = "0".bcadd($mes_parc2,0);
}
else{
$soma_vencto3cartao4 = bcadd($mes_parc2,0);
}
}
else{

if($mes_parc2<=9){
$soma_vencto3cartao4 = "0".bcadd($mes_parc2,1);
}
else{
$soma_vencto3cartao4 = bcadd($mes_parc2,1);
}
}

if($soma_vencto3cartao4>12){
$mes_parc3cartao4 = "01";
}else{
$mes_parc3cartao4 = $soma_vencto3cartao4;
}
if($soma_vencto3cartao4>12){
$ano_parc3cartao4 = bcadd($ano_parc2,1);
}else{
$ano_parc3cartao4 = $ano_parc2;
}

if(($mes_parc3cartao4=="02") or ($mes_parc3cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc3cartao4 = "28";
}
else{
$dia_parc3cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc3cartao4 = $dia_vencto;
	
}

$vencto3cartao4 = "$ano_parc3cartao4-$mes_parc3cartao4-$dia_parc3cartao4";

//-----------fim da verificação do tipo do cartao 4---------------------


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

if($modopagto=="CARTEIRA"){
	
if(($mes_parc3=="02") or ($mes_parc3=="2")){
if($dia_vencto>="29"){
$dia_parc3 = "28";
}
else{
$dia_parc3 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc3 = $dia_vencto_carteira;
	
}
	
}
else{
	
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
	
}

$vencto3 = "$ano_parc3-$mes_parc3-$dia_parc3";

if($quant_parc>=3) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valor_monetario_a_informar','$vencto3','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto3cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto3cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto3cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto3cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto3cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto3cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto3cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto3cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}








//MENSALIDADE 4--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc3<=9){
$soma_vencto4cartao1 = "0".bcadd($mes_parc3,0);
}
else{
$soma_vencto4cartao1 = bcadd($mes_parc3,0);
}
}
else{

if($mes_par3<=9){
$soma_vencto4cartao1 = "0".bcadd($mes_parc3,1);
}
else{
$soma_vencto4cartao1 = bcadd($mes_parc3,1);
}
}

if($soma_vencto4cartao1>12){
$mes_par4ccartao1 = "01";
}else{
$mes_parc4cartao1 = $soma_vencto4cartao1;
}
if($soma_vencto4cartao1>12){
$ano_parc4cartao1 = bcadd($ano_parc3,1);
}else{
$ano_parc4cartao1 = $ano_parc3;
}

if(($mes_parc4cartao1=="02") or ($mes_parc4cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc4cartao1 = "28";
}
else{
$dia_parc4cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc4cartao1 = $dia_vencto;
	
}

$vencto4cartao1 = "$ano_parc4cartao1-$mes_parc4cartao1-$dia_parc4cartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc3<=9){
$soma_vencto4cartao2 = "0".bcadd($mes_parc3,0);
}
else{
$soma_vencto4cartao2 = bcadd($mes_parc3,0);
}
}
else{

if($mes_parc3<=9){
$soma_vencto4cartao2 = "0".bcadd($mes_parc3,1);
}
else{
$soma_vencto4cartao2 = bcadd($mes_parc3,1);
}
}

if($soma_vencto4cartao2>12){
$mes_parc4cartao2 = "01";
}else{
$mes_parc4cartao2 = $soma_vencto4cartao2;
}
if($soma_vencto4cartao2>12){
$ano_parc4cartao2 = bcadd($ano_parc3,1);
}else{
$ano_parc4cartao2 = $ano_parc3;
}

if(($mes_parc4cartao2=="02") or ($mes_parc4cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc4cartao2 = "28";
}
else{
$dia_parc4cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc4cartao2 = $dia_vencto;
	
}

$vencto4cartao2 = "$ano_parc4cartao2-$mes_parc4cartao2-$dia_parc4cartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc3<=9){
$soma_vencto4cartao3 = "0".bcadd($mes_parc3,0);
}
else{
$soma_vencto4cartao3 = bcadd($mes_parc3,0);
}
}
else{

if($mes_parc3<=9){
$soma_vencto4cartao3 = "0".bcadd($mes_parc3,1);
}
else{
$soma_vencto4cartao3 = bcadd($mes_parc3,1);
}
}

if($soma_vencto4cartao3>12){
$mes_parc4cartao3 = "01";
}else{
$mes_parc4cartao3 = $soma_vencto4cartao3;
}
if($soma_vencto4cartao3>12){
$ano_parc4cartao3 = bcadd($ano_parc3,1);
}else{
$ano_parc4cartao3 = $ano_parc3;
}

if(($mes_parc4cartao3=="02") or ($mes_parc4cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc4cartao3 = "28";
}
else{
$dia_parc4cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc4cartao3 = $dia_vencto;
	
}

$vencto4cartao3 = "$ano_parc4cartao3-$mes_parc4cartao3-$dia_parc4cartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc3<=9){
$soma_vencto4cartao4 = "0".bcadd($mes_parc3,0);
}
else{
$soma_vencto4cartao4 = bcadd($mes_parc3,0);
}
}
else{

if($mes_parc3<=9){
$soma_vencto4cartao4 = "0".bcadd($mes_parc3,1);
}
else{
$soma_vencto4cartao4 = bcadd($mes_parc3,1);
}
}

if($soma_vencto4cartao4>12){
$mes_parc4cartao4 = "01";
}else{
$mes_parc4cartao4 = $soma_vencto4cartao4;
}
if($soma_vencto4cartao4>12){
$ano_parc4cartao4 = bcadd($ano_parc3,1);
}else{
$ano_parc4cartao4 = $ano_parc3;
}

if(($mes_parc4cartao4=="02") or ($mes_parc4cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc4cartao4 = "28";
}
else{
$dia_parc4cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc4cartao4 = $dia_vencto;
	
}

$vencto4cartao4 = "$ano_parc4cartao4-$mes_parc4cartao4-$dia_parc4cartao4";

//-----------fim da verificação do tipo do cartao 4---------------------




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
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc4=="02") or ($mes_parc4=="2")){
if($dia_vencto>="29"){
$dia_parc4 = "28";
}
else{
$dia_parc4 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc4 = $dia_vencto_carteira;
	
}
	
}
else{

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
	
}

$vencto4 = "$ano_parc4-$mes_parc4-$dia_parc4";

if($quant_parc>=4) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valor_monetario_a_informar','$vencto4','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto4cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto4cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}

if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto4cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto4cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto4cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence'
,'$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto4cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence'
,'$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto4cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence'
,'$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto4cartao','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence'
,'$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}






//MENSALIDADE 5--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc4<=9){
$soma_vencto5cartao1 = "0".bcadd($mes_parc4,0);
}
else{
$soma_vencto5cartao1 = bcadd($mes_parc4,0);
}
}
else{

if($mes_par4<=9){
$soma_vencto5cartao1 = "0".bcadd($mes_parc4,1);
}
else{
$soma_vencto5cartao1 = bcadd($mes_parc4,1);
}
}

if($soma_vencto5cartao1>12){
$mes_par5ccartao1 = "01";
}else{
$mes_parc5cartao1 = $soma_vencto5cartao1;
}
if($soma_vencto5cartao1>12){
$ano_parc5cartao1 = bcadd($ano_parc4,1);
}else{
$ano_parc5cartao1 = $ano_parc4;
}

if(($mes_parc5cartao1=="02") or ($mes_parc5cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc5cartao1 = "28";
}
else{
$dia_parc5cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc5cartao1 = $dia_vencto;
	
}

$vencto5cartao1 = "$ano_parc5cartao1-$mes_parc5cartao1-$dia_parc5cartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc4<=9){
$soma_vencto5cartao2 = "0".bcadd($mes_parc4,0);
}
else{
$soma_vencto5cartao2 = bcadd($mes_parc4,0);
}
}
else{

if($mes_parc4<=9){
$soma_vencto5cartao2 = "0".bcadd($mes_parc4,1);
}
else{
$soma_vencto5cartao2 = bcadd($mes_parc4,1);
}
}

if($soma_vencto5cartao2>12){
$mes_parc5cartao2 = "01";
}else{
$mes_parc5cartao2 = $soma_vencto5cartao2;
}
if($soma_vencto5cartao2>12){
$ano_parc5cartao2 = bcadd($ano_parc4,1);
}else{
$ano_parc5cartao2 = $ano_parc4;
}

if(($mes_parc5cartao2=="02") or ($mes_parc5cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc5cartao2 = "28";
}
else{
$dia_parc5cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc5cartao2 = $dia_vencto;
	
}

$vencto5cartao2 = "$ano_parc5cartao2-$mes_parc5cartao2-$dia_parc5cartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc4<=9){
$soma_vencto5cartao3 = "0".bcadd($mes_parc4,0);
}
else{
$soma_vencto5cartao3 = bcadd($mes_parc4,0);
}
}
else{

if($mes_parc4<=9){
$soma_vencto5cartao3 = "0".bcadd($mes_parc4,1);
}
else{
$soma_vencto5cartao3 = bcadd($mes_parc4,1);
}
}

if($soma_vencto5cartao3>12){
$mes_parc5cartao3 = "01";
}else{
$mes_parc5cartao3 = $soma_vencto5cartao3;
}
if($soma_vencto5cartao3>12){
$ano_parc5cartao3 = bcadd($ano_parc4,1);
}else{
$ano_parc5cartao3 = $ano_parc4;
}

if(($mes_parc5cartao3=="02") or ($mes_parc5cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc5cartao3 = "28";
}
else{
$dia_parc5cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc5cartao3 = $dia_vencto;
	
}

$vencto5cartao3 = "$ano_parc5cartao3-$mes_parc5cartao3-$dia_parc5cartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc4<=9){
$soma_vencto5cartao4 = "0".bcadd($mes_parc4,0);
}
else{
$soma_vencto5cartao4 = bcadd($mes_parc4,0);
}
}
else{

if($mes_parc4<=9){
$soma_vencto5cartao4 = "0".bcadd($mes_parc4,1);
}
else{
$soma_vencto5cartao4 = bcadd($mes_parc4,1);
}
}

if($soma_vencto5cartao4>12){
$mes_parc5cartao4 = "01";
}else{
$mes_parc5cartao4 = $soma_vencto5cartao4;
}
if($soma_vencto5cartao4>12){
$ano_parc5cartao4 = bcadd($ano_parc4,1);
}else{
$ano_parc5cartao4 = $ano_parc4;
}

if(($mes_parc5cartao4=="02") or ($mes_parc5cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc5cartao4 = "28";
}
else{
$dia_parc5cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc5cartao4 = $dia_vencto;
	
}

$vencto5cartao4 = "$ano_parc5cartao4-$mes_parc5cartao4-$dia_parc5cartao4";

//-----------fim da verificação do tipo do cartao 4---------------------




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
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc5=="02") or ($mes_parc5=="2")){
if($dia_vencto>="29"){
$dia_parc5 = "28";
}
else{
$dia_parc5 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc5 = $dia_vencto_carteira;
	
}
	
}
else{

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
	
}

$vencto5 = "$ano_parc5-$mes_parc5-$dia_parc5";

if($quant_parc>=5) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto5','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto5cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto5cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto5cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto5cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto5cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto5cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto5cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto5cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}






//MENSALIDADE 6--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc5<=9){
$soma_vencto6cartao1 = "0".bcadd($mes_parc5,0);
}
else{
$soma_vencto6cartao1 = bcadd($mes_parc5,0);
}
}
else{

if($mes_par5<=9){
$soma_vencto6cartao1 = "0".bcadd($mes_parc5,1);
}
else{
$soma_vencto6cartao1 = bcadd($mes_parc5,1);
}
}

if($soma_vencto6cartao1>12){
$mes_par6ccartao1 = "01";
}else{
$mes_parc6cartao1 = $soma_vencto6cartao1;
}
if($soma_vencto6cartao1>12){
$ano_parc6cartao1 = bcadd($ano_parc5,1);
}else{
$ano_parc6cartao1 = $ano_parc5;
}

if(($mes_parc6cartao1=="02") or ($mes_parc6cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc6cartao1 = "28";
}
else{
$dia_parc6cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc6cartao1 = $dia_vencto;
	
}

$vencto6cartao1 = "$ano_parc6cartao1-$mes_parc6cartao1-$dia_parc6cartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc5<=9){
$soma_vencto6cartao2 = "0".bcadd($mes_parc5,0);
}
else{
$soma_vencto6cartao2 = bcadd($mes_parc5,0);
}
}
else{

if($mes_parc5<=9){
$soma_vencto6cartao2 = "0".bcadd($mes_parc5,1);
}
else{
$soma_vencto6cartao2 = bcadd($mes_parc5,1);
}
}

if($soma_vencto6cartao2>12){
$mes_parc6cartao2 = "01";
}else{
$mes_parc6cartao2 = $soma_vencto6cartao2;
}
if($soma_vencto6cartao2>12){
$ano_parc6cartao2 = bcadd($ano_parc5,1);
}else{
$ano_parc6cartao2 = $ano_parc5;
}

if(($mes_parc6cartao2=="02") or ($mes_parc6cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc6cartao2 = "28";
}
else{
$dia_parc6cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc6cartao2 = $dia_vencto;
	
}

$vencto6cartao2 = "$ano_parc6cartao2-$mes_parc6cartao2-$dia_parc6cartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc5<=9){
$soma_vencto6cartao3 = "0".bcadd($mes_parc5,0);
}
else{
$soma_vencto6cartao3 = bcadd($mes_parc5,0);
}
}
else{

if($mes_parc5<=9){
$soma_vencto6cartao3 = "0".bcadd($mes_parc5,1);
}
else{
$soma_vencto6cartao3 = bcadd($mes_parc5,1);
}
}

if($soma_vencto6cartao3>12){
$mes_parc6cartao3 = "01";
}else{
$mes_parc6cartao3 = $soma_vencto6cartao3;
}
if($soma_vencto6cartao3>12){
$ano_parc6cartao3 = bcadd($ano_parc5,1);
}else{
$ano_parc6cartao3 = $ano_parc5;
}

if(($mes_parc6cartao3=="02") or ($mes_parc6cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc6cartao3 = "28";
}
else{
$dia_parc6cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc6cartao3 = $dia_vencto;
	
}

$vencto6cartao3 = "$ano_parc6cartao3-$mes_parc6cartao3-$dia_parc6cartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc5<=9){
$soma_vencto6cartao4 = "0".bcadd($mes_parc5,0);
}
else{
$soma_vencto6cartao4 = bcadd($mes_parc5,0);
}
}
else{

if($mes_parc5<=9){
$soma_vencto6cartao4 = "0".bcadd($mes_parc5,1);
}
else{
$soma_vencto6cartao4 = bcadd($mes_parc5,1);
}
}

if($soma_vencto6cartao4>12){
$mes_parc6cartao4 = "01";
}else{
$mes_parc6cartao4 = $soma_vencto6cartao4;
}
if($soma_vencto6cartao4>12){
$ano_parc6cartao4 = bcadd($ano_parc5,1);
}else{
$ano_parc6cartao4 = $ano_parc5;
}

if(($mes_parc6cartao4=="02") or ($mes_parc6cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc6cartao4 = "28";
}
else{
$dia_parc6cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc6cartao4 = $dia_vencto;
	
}

$vencto6cartao4 = "$ano_parc6cartao4-$mes_parc6cartao4-$dia_parc6cartao4";

//-----------fim da verificação do tipo do cartao 4---------------------





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
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc6=="02") or ($mes_parc6=="2")){
if($dia_vencto>="29"){
$dia_parc6 = "28";
}
else{
$dia_parc6 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc6 = $dia_vencto_carteira;
	
}
	
}
else{

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
	
}

$vencto6 = "$ano_parc6-$mes_parc6-$dia_parc6";

if($quant_parc>=6) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto6','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	

if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto6cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto6cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto6cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto6cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto6cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto6cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto6cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto6cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}






//MENSALIDADE 7--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc6<=9){
$soma_vencto7cartao1 = "0".bcadd($mes_parc6,0);
}
else{
$soma_vencto7cartao1 = bcadd($mes_parc6,0);
}
}
else{

if($mes_par6<=9){
$soma_vencto7cartao1 = "0".bcadd($mes_parc6,1);
}
else{
$soma_vencto7cartao1 = bcadd($mes_parc6,1);
}
}

if($soma_vencto7cartao1>12){
$mes_par7ccartao1 = "01";
}else{
$mes_parc7cartao1 = $soma_vencto7cartao1;
}
if($soma_vencto7cartao1>12){
$ano_parc7cartao1 = bcadd($ano_parc6,1);
}else{
$ano_parc7cartao1 = $ano_parc6;
}

if(($mes_parc7cartao1=="02") or ($mes_parc7cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc7cartao1 = "28";
}
else{
$dia_parc7cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc7cartao1 = $dia_vencto;
	
}

$vencto7cartao1 = "$ano_parc7cartao1-$mes_parc7cartao1-$dia_parc7cartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc6<=9){
$soma_vencto7cartao2 = "0".bcadd($mes_parc6,0);
}
else{
$soma_vencto7cartao2 = bcadd($mes_parc6,0);
}
}
else{

if($mes_parc6<=9){
$soma_vencto7cartao2 = "0".bcadd($mes_parc6,1);
}
else{
$soma_vencto7cartao2 = bcadd($mes_parc6,1);
}
}

if($soma_vencto7cartao2>12){
$mes_parc7cartao2 = "01";
}else{
$mes_parc7cartao2 = $soma_vencto7cartao2;
}
if($soma_vencto7cartao2>12){
$ano_parc7cartao2 = bcadd($ano_parc6,1);
}else{
$ano_parc7cartao2 = $ano_parc6;
}

if(($mes_parc7cartao2=="02") or ($mes_parc7cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc7cartao2 = "28";
}
else{
$dia_parc7cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc7cartao2 = $dia_vencto;
	
}

$vencto7cartao2 = "$ano_parc7cartao2-$mes_parc7cartao2-$dia_parc7cartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc6<=9){
$soma_vencto7cartao3 = "0".bcadd($mes_parc6,0);
}
else{
$soma_vencto7cartao3 = bcadd($mes_parc6,0);
}
}
else{

if($mes_parc6<=9){
$soma_vencto7cartao3 = "0".bcadd($mes_parc6,1);
}
else{
$soma_vencto7cartao3 = bcadd($mes_parc6,1);
}
}

if($soma_vencto7cartao3>12){
$mes_parc7cartao3 = "01";
}else{
$mes_parc7cartao3 = $soma_vencto7cartao3;
}
if($soma_vencto7cartao3>12){
$ano_parc7cartao3 = bcadd($ano_parc6,1);
}else{
$ano_parc7cartao3 = $ano_parc6;
}

if(($mes_parc7cartao3=="02") or ($mes_parc7cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc7cartao3 = "28";
}
else{
$dia_parc7cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc7cartao3 = $dia_vencto;
	
}

$vencto7cartao3 = "$ano_parc7cartao3-$mes_parc7cartao3-$dia_parc7cartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc6<=9){
$soma_vencto7cartao4 = "0".bcadd($mes_parc6,0);
}
else{
$soma_vencto7cartao4 = bcadd($mes_parc6,0);
}
}
else{

if($mes_parc6<=9){
$soma_vencto7cartao4 = "0".bcadd($mes_parc6,1);
}
else{
$soma_vencto7cartao4 = bcadd($mes_parc6,1);
}
}

if($soma_vencto7cartao4>12){
$mes_parc7cartao4 = "01";
}else{
$mes_parc7cartao4 = $soma_vencto7cartao4;
}
if($soma_vencto7cartao4>12){
$ano_parc7cartao4 = bcadd($ano_parc6,1);
}else{
$ano_parc7cartao4 = $ano_parc6;
}

if(($mes_parc7cartao4=="02") or ($mes_parc7cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc7cartao4 = "28";
}
else{
$dia_parc7cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc7cartao4 = $dia_vencto;
	
}

$vencto7cartao4 = "$ano_parc7cartao4-$mes_parc7cartao4-$dia_parc7cartao4";

//-----------fim da verificação do tipo do cartao 4---------------------





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
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc7=="02") or ($mes_parc7=="2")){
if($dia_vencto>="29"){
$dia_parc7 = "28";
}
else{
$dia_parc7 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc7 = $dia_vencto_carteira;
	
}
	
}
else{

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
	
}

$vencto7 = "$ano_parc7-$mes_parc7-$dia_parc7";

//echo $vencto6;

if($quant_parc>=7) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto7','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto7cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto7cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto7cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto7cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto7cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto7cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto7cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto7cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}





//MENSALIDADE 8--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc7<=9){
$soma_vencto8cartao1 = "0".bcadd($mes_parc7,0);
}
else{
$soma_vencto8cartao1 = bcadd($mes_parc7,0);
}
}
else{

if($mes_par7<=9){
$soma_vencto8cartao1 = "0".bcadd($mes_parc7,1);
}
else{
$soma_vencto8cartao1 = bcadd($mes_parc7,1);
}
}

if($soma_vencto8cartao1>12){
$mes_par8ccartao1 = "01";
}else{
$mes_parc8cartao1 = $soma_vencto8cartao1;
}
if($soma_vencto8cartao1>12){
$ano_parc8cartao1 = bcadd($ano_parc7,1);
}else{
$ano_parc8cartao1 = $ano_parc7;
}

if(($mes_parc8cartao1=="02") or ($mes_parc8cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc8cartao1 = "28";
}
else{
$dia_parc8cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc8cartao1 = $dia_vencto;
	
}

$vencto8cartao1 = "$ano_parc8cartao1-$mes_parc8cartao1-$dia_parc8cartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc7<=9){
$soma_vencto8cartao2 = "0".bcadd($mes_parc7,0);
}
else{
$soma_vencto8cartao2 = bcadd($mes_parc7,0);
}
}
else{

if($mes_parc7<=9){
$soma_vencto8cartao2 = "0".bcadd($mes_parc7,1);
}
else{
$soma_vencto8cartao2 = bcadd($mes_parc7,1);
}
}

if($soma_vencto8cartao2>12){
$mes_parc8cartao2 = "01";
}else{
$mes_parc8cartao2 = $soma_vencto8cartao2;
}
if($soma_vencto8cartao2>12){
$ano_parc8cartao2 = bcadd($ano_parc7,1);
}else{
$ano_parc8cartao2 = $ano_parc7;
}

if(($mes_parc8cartao2=="02") or ($mes_parc8cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc8cartao2 = "28";
}
else{
$dia_parc8cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc8cartao2 = $dia_vencto;
	
}

$vencto8cartao2 = "$ano_parc8cartao2-$mes_parc8cartao2-$dia_parc8cartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc7<=9){
$soma_vencto8cartao3 = "0".bcadd($mes_parc7,0);
}
else{
$soma_vencto8cartao3 = bcadd($mes_parc7,0);
}
}
else{

if($mes_parc7<=9){
$soma_vencto8cartao3 = "0".bcadd($mes_parc7,1);
}
else{
$soma_vencto8cartao3 = bcadd($mes_parc7,1);
}
}

if($soma_vencto8cartao3>12){
$mes_parc8cartao3 = "01";
}else{
$mes_parc8cartao3 = $soma_vencto8cartao3;
}
if($soma_vencto8cartao3>12){
$ano_parc8cartao3 = bcadd($ano_parc7,1);
}else{
$ano_parc8cartao3 = $ano_parc7;
}

if(($mes_parc8cartao3=="02") or ($mes_parc8cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc8cartao3 = "28";
}
else{
$dia_parc8cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc8cartao3 = $dia_vencto;
	
}

$vencto8cartao3 = "$ano_parc8cartao3-$mes_parc8cartao3-$dia_parc8cartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc7<=9){
$soma_vencto8cartao4 = "0".bcadd($mes_parc7,0);
}
else{
$soma_vencto8cartao4 = bcadd($mes_parc7,0);
}
}
else{

if($mes_parc7<=9){
$soma_vencto8cartao4 = "0".bcadd($mes_parc7,1);
}
else{
$soma_vencto8cartao4 = bcadd($mes_parc7,1);
}
}

if($soma_vencto8cartao4>12){
$mes_parc8cartao4 = "01";
}else{
$mes_parc8cartao4 = $soma_vencto8cartao4;
}
if($soma_vencto8cartao4>12){
$ano_parc8cartao4 = bcadd($ano_parc7,1);
}else{
$ano_parc8cartao4 = $ano_parc7;
}

if(($mes_parc8cartao4=="02") or ($mes_parc8cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc8cartao4 = "28";
}
else{
$dia_parc8cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc8cartao4 = $dia_vencto;
	
}

$vencto8cartao4 = "$ano_parc8cartao4-$mes_parc8cartao4-$dia_parc8cartao4";

//-----------fim da verificação do tipo do cartao 4---------------------





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
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc8==02) or ($mes_parc8==2)){
if($dia_vencto>="29"){
$dia_parc8 = "28";
}
else{
$dia_parc8 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc8 = $dia_vencto_carteira;
	
}
	
}
else{

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
	
}

$vencto8 = "$ano_parc8-$mes_parc8-$dia_parc8";

if($quant_parc>=8){
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto8','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto8cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto8cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto8cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto8cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto8cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto8cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto8cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto8cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}






//MENSALIDADE 9--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc8<=9){
$soma_vencto9cartao1 = "0".bcadd($mes_parc8,0);
}
else{
$soma_vencto9cartao1 = bcadd($mes_parc8,0);
}
}
else{

if($mes_par8<=9){
$soma_vencto9cartao1 = "0".bcadd($mes_parc8,1);
}
else{
$soma_vencto9cartao1 = bcadd($mes_parc8,1);
}
}

if($soma_vencto9cartao1>12){
$mes_par9ccartao1 = "01";
}else{
$mes_parc9cartao1 = $soma_vencto9cartao1;
}
if($soma_vencto9cartao1>12){
$ano_parc9cartao1 = bcadd($ano_parc8,1);
}else{
$ano_parc9cartao1 = $ano_parc8;
}

if(($mes_parc9cartao1=="02") or ($mes_parc9cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc9cartao1 = "28";
}
else{
$dia_parc9cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc9cartao1 = $dia_vencto;
	
}

$vencto9cartao1 = "$ano_parc9cartao1-$mes_parc9cartao1-$dia_parc9cartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc8<=9){
$soma_vencto9cartao2 = "0".bcadd($mes_parc8,0);
}
else{
$soma_vencto9cartao2 = bcadd($mes_parc8,0);
}
}
else{

if($mes_parc8<=9){
$soma_vencto9cartao2 = "0".bcadd($mes_parc8,1);
}
else{
$soma_vencto9cartao2 = bcadd($mes_parc8,1);
}
}

if($soma_vencto9cartao2>12){
$mes_parc9cartao2 = "01";
}else{
$mes_parc9cartao2 = $soma_vencto9cartao2;
}
if($soma_vencto9cartao2>12){
$ano_parc9cartao2 = bcadd($ano_parc8,1);
}else{
$ano_parc9cartao2 = $ano_parc8;
}

if(($mes_parc9cartao2=="02") or ($mes_parc9cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc9cartao2 = "28";
}
else{
$dia_parc9cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc9cartao2 = $dia_vencto;
	
}

$vencto9cartao2 = "$ano_parc9cartao2-$mes_parc9cartao2-$dia_parc9cartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc8<=9){
$soma_vencto9cartao3 = "0".bcadd($mes_parc8,0);
}
else{
$soma_vencto9cartao3 = bcadd($mes_parc8,0);
}
}
else{

if($mes_parc8<=9){
$soma_vencto9cartao3 = "0".bcadd($mes_parc8,1);
}
else{
$soma_vencto9cartao3 = bcadd($mes_parc8,1);
}
}

if($soma_vencto9cartao3>12){
$mes_parc9cartao3 = "01";
}else{
$mes_parc9cartao3 = $soma_vencto9cartao3;
}
if($soma_vencto9cartao3>12){
$ano_parc9cartao3 = bcadd($ano_parc8,1);
}else{
$ano_parc9cartao3 = $ano_parc8;
}

if(($mes_parc9cartao3=="02") or ($mes_parc9cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc9cartao3 = "28";
}
else{
$dia_parc9cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc9cartao3 = $dia_vencto;
	
}

$vencto9cartao3 = "$ano_parc9cartao3-$mes_parc9cartao3-$dia_parc9cartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc8<=9){
$soma_vencto9cartao4 = "0".bcadd($mes_parc8,0);
}
else{
$soma_vencto9cartao4 = bcadd($mes_parc8,0);
}
}
else{

if($mes_parc8<=9){
$soma_vencto9cartao4 = "0".bcadd($mes_parc8,1);
}
else{
$soma_vencto9cartao4 = bcadd($mes_parc8,1);
}
}

if($soma_vencto9cartao4>12){
$mes_parc9cartao4 = "01";
}else{
$mes_parc9cartao4 = $soma_vencto9cartao4;
}
if($soma_vencto9cartao4>12){
$ano_parc9cartao4 = bcadd($ano_parc8,1);
}else{
$ano_parc9cartao4 = $ano_parc8;
}

if(($mes_parc9cartao4=="02") or ($mes_parc9cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc9cartao4 = "28";
}
else{
$dia_parc9cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc9cartao4 = $dia_vencto;
	
}

$vencto9cartao4 = "$ano_parc9cartao4-$mes_parc9cartao4-$dia_parc9cartao4";

//-----------fim da verificação do tipo do cartao 4---------------------




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
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc9=="02") or ($mes_parc9=="2")){
if($dia_vencto>="29"){
$dia_parc9 = "28";
}
else{
$dia_parc9 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc9 = $dia_vencto_carteira;
	
}
	
}
else{

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
	
}

$vencto9 = "$ano_parc9-$mes_parc9-$dia_parc9";

if($quant_parc>=9) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto9','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto9cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto9cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto9cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto9cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto9cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto9cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto9cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto9cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}





//MENSALIDADE 10--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc9<=9){
$soma_vencto10cartao1 = "0".bcadd($mes_parc9,0);
}
else{
$soma_vencto10cartao1 = bcadd($mes_parc9,0);
}
}
else{

if($mes_par9<=9){
$soma_vencto10cartao1 = "0".bcadd($mes_parc9,1);
}
else{
$soma_vencto9cartao1 = bcadd($mes_parc9,1);
}
}

if($soma_vencto10cartao1>12){
$mes_par10ccartao1 = "01";
}else{
$mes_parc10cartao1 = $soma_vencto10cartao1;
}
if($soma_vencto10cartao1>12){
$ano_parc10cartao1 = bcadd($ano_parc9,1);
}else{
$ano_parc10cartao1 = $ano_parc9;
}

if(($mes_parc10cartao1=="02") or ($mes_parc10cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc10cartao1 = "28";
}
else{
$dia_parc10cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc10cartao1 = $dia_vencto;
	
}

$vencto10cartao1 = "$ano_parc10cartao1-$mes_parc10cartao1-$dia_parc10cartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc9<=9){
$soma_vencto10cartao2 = "0".bcadd($mes_parc9,0);
}
else{
$soma_vencto10cartao2 = bcadd($mes_parc9,0);
}
}
else{

if($mes_parc9<=9){
$soma_vencto10cartao2 = "0".bcadd($mes_parc9,1);
}
else{
$soma_vencto10cartao2 = bcadd($mes_parc9,1);
}
}

if($soma_vencto10cartao2>12){
$mes_parc10cartao2 = "01";
}else{
$mes_parc10cartao2 = $soma_vencto10cartao2;
}
if($soma_vencto10cartao2>12){
$ano_parc10cartao2 = bcadd($ano_parc9,1);
}else{
$ano_parc10cartao2 = $ano_parc9;
}

if(($mes_parc10cartao2=="02") or ($mes_parc10cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc10cartao2 = "28";
}
else{
$dia_parc10cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc10cartao2 = $dia_vencto;
	
}

$vencto10cartao2 = "$ano_parc10cartao2-$mes_parc10cartao2-$dia_parc10cartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc9<=9){
$soma_vencto10cartao3 = "0".bcadd($mes_parc9,0);
}
else{
$soma_vencto10cartao3 = bcadd($mes_parc9,0);
}
}
else{

if($mes_parc9<=9){
$soma_vencto10cartao3 = "0".bcadd($mes_parc9,1);
}
else{
$soma_vencto10cartao3 = bcadd($mes_parc9,1);
}
}

if($soma_vencto10cartao3>12){
$mes_parc10cartao3 = "01";
}else{
$mes_parc10cartao3 = $soma_vencto10cartao3;
}
if($soma_vencto10cartao3>12){
$ano_parc10cartao3 = bcadd($ano_parc9,1);
}else{
$ano_parc10cartao3 = $ano_parc9;
}

if(($mes_parc10cartao3=="02") or ($mes_parc10cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc10cartao3 = "28";
}
else{
$dia_parc10cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc10cartao3 = $dia_vencto;
	
}

$vencto10cartao3 = "$ano_parc10cartao3-$mes_parc10cartao3-$dia_parc10cartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc9<=9){
$soma_vencto10cartao4 = "0".bcadd($mes_parc9,0);
}
else{
$soma_vencto10cartao4 = bcadd($mes_parc9,0);
}
}
else{

if($mes_parc9<=9){
$soma_vencto10cartao4 = "0".bcadd($mes_parc9,1);
}
else{
$soma_vencto10cartao4 = bcadd($mes_parc9,1);
}
}

if($soma_vencto10cartao4>12){
$mes_parc10cartao4 = "01";
}else{
$mes_parc10cartao4 = $soma_vencto10cartao4;
}
if($soma_vencto10cartao4>12){
$ano_parc10cartao4 = bcadd($ano_parc9,1);
}else{
$ano_parc10cartao4 = $ano_parc9;
}

if(($mes_parc10cartao4=="02") or ($mes_parc10cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc10cartao4 = "28";
}
else{
$dia_parc10cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc10cartao4 = $dia_vencto;
	
}

$vencto10cartao4 = "$ano_parc10cartao4-$mes_parc10cartao4-$dia_parc10cartao4";

//-----------fim da verificação do tipo do cartao 4---------------------





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
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc10=="02") or ($mes_parc10=="2")){
if($dia_vencto>="29"){
$dia_parc10 = "28";
}
else{
$dia_parc10 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc10 = $dia_vencto_carteira;
	
}
	
}
else{

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
	
}

$vencto10 = "$ano_parc10-$mes_parc10-$dia_parc10";

if($quant_parc>=10){
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto10','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto10cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto10cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto10cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto10cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto10cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto10cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto10cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto10cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}
}}
//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------
	
		
		
		
//MENSALIDADE 11--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc10<=9){
$soma_vencto11cartao1 = "0".bcadd($mes_parc10,0);
}
else{
$soma_vencto11cartao1 = bcadd($mes_parc10,0);
}
}
else{

if($mes_par10<=9){
$soma_vencto11cartao1 = "0".bcadd($mes_parc10,1);
}
else{
$soma_vencto11cartao1 = bcadd($mes_parc10,1);
}
}

if($soma_vencto11cartao1>12){
$mes_par11ccartao1 = "01";
}else{
$mes_parc11cartao1 = $soma_vencto11cartao1;
}
if($soma_vencto11cartao1>12){
$ano_parc11cartao1 = bcadd($ano_parc10,1);
}else{
$ano_parc11cartao1 = $ano_parc10;
}

if(($mes_parc11cartao1=="02") or ($mes_parc11cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc11cartao1 = "28";
}
else{
$dia_parc11cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc11cartao1 = $dia_vencto;
	
}

$vencto11cartao1 = "$ano_parc11cartao1-$mes_parc11cartao1-$dia_parc11cartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc10<=9){
$soma_vencto11cartao2 = "0".bcadd($mes_parc10,0);
}
else{
$soma_vencto11cartao2 = bcadd($mes_parc10,0);
}
}
else{

if($mes_parc10<=9){
$soma_vencto11cartao2 = "0".bcadd($mes_parc10,1);
}
else{
$soma_vencto11cartao2 = bcadd($mes_parc10,1);
}
}

if($soma_vencto11cartao2>12){
$mes_parc11cartao2 = "01";
}else{
$mes_parc11cartao2 = $soma_vencto11cartao2;
}
if($soma_vencto11cartao2>12){
$ano_parc11cartao2 = bcadd($ano_parc10,1);
}else{
$ano_parc11cartao2 = $ano_parc10;
}

if(($mes_parc11cartao2=="02") or ($mes_parc11cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc11cartao2 = "28";
}
else{
$dia_parc11cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc11cartao2 = $dia_vencto;
	
}

$vencto11cartao2 = "$ano_parc11cartao2-$mes_parc11cartao2-$dia_parc11cartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc10<=9){
$soma_vencto11cartao3 = "0".bcadd($mes_parc10,0);
}
else{
$soma_vencto11cartao3 = bcadd($mes_parc10,0);
}
}
else{

if($mes_parc10<=9){
$soma_vencto11cartao3 = "0".bcadd($mes_parc10,1);
}
else{
$soma_vencto11cartao3 = bcadd($mes_parc10,1);
}
}

if($soma_vencto11cartao3>12){
$mes_parc11cartao3 = "01";
}else{
$mes_parc11cartao3 = $soma_vencto11cartao3;
}
if($soma_vencto11cartao3>12){
$ano_parc11cartao3 = bcadd($ano_parc10,1);
}else{
$ano_parc11cartao3 = $ano_parc10;
}

if(($mes_parc11cartao3=="02") or ($mes_parc11cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc11cartao3 = "28";
}
else{
$dia_parc11cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc11cartao3 = $dia_vencto;
	
}

$vencto11cartao3 = "$ano_parc11cartao3-$mes_parc11cartao3-$dia_parc11cartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc10<=9){
$soma_vencto11cartao4 = "0".bcadd($mes_parc10,0);
}
else{
$soma_vencto11cartao4 = bcadd($mes_parc10,0);
}
}
else{

if($mes_parc10<=9){
$soma_vencto11cartao4 = "0".bcadd($mes_parc10,1);
}
else{
$soma_vencto11cartao4 = bcadd($mes_parc10,1);
}
}

if($soma_vencto11cartao4>12){
$mes_parc11cartao4 = "01";
}else{
$mes_parc11cartao4 = $soma_vencto11cartao4;
}
if($soma_vencto11cartao4>12){
$ano_parc11cartao4 = bcadd($ano_parc10,1);
}else{
$ano_parc11cartao4 = $ano_parc10;
}

if(($mes_parc11cartao4=="02") or ($mes_parc11cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc11cartao4 = "28";
}
else{
$dia_parc11cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc11cartao4 = $dia_vencto;
	
}

$vencto11cartao4 = "$ano_parc11cartao4-$mes_parc11cartao4-$dia_parc11cartao4";

//-----------fim da verificação do tipo do cartao 4---------------------





if($mes_parc10<=9){
$soma_vencto11 = "0".bcadd($mes_parc10,1);
}
else{
$soma_vencto11 = bcadd($mes_parc10,1);
}
if($soma_vencto11>12){
$mes_parc11 = "01";
}else{
$mes_parc11 = $soma_vencto11;
}
if($soma_vencto11>12){
$ano_parc11 = bcadd($ano_parc10,1);
}else{
$ano_parc11 = $ano_parc10;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc11=="02") or ($mes_parc11=="2")){
if($dia_vencto>="29"){
$dia_parc11 = "28";
}
else{
$dia_parc11 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc11 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc11=="02") or ($mes_parc11=="2")){
if($dia_vencto>="29"){
$dia_parc11 = "28";
}
else{
$dia_parc11 = $dia_vencto;
}
}
else{
	
$dia_parc11 = $dia_vencto;
	
}
	
}

$vencto11 = "$ano_parc11-$mes_parc11-$dia_parc11";

if($quant_parc>=11) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto11','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto11cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto11cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto11cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto11cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao14','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto11cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto11cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto11cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto11cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}
}}
//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

		
		
		
	
//MENSALIDADE 12--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc11<=9){
$soma_vencto12cartao1 = "0".bcadd($mes_parc11,0);
}
else{
$soma_vencto12cartao1 = bcadd($mes_parc11,0);
}
}
else{

if($mes_par11<=9){
$soma_vencto12cartao1 = "0".bcadd($mes_parc11,1);
}
else{
$soma_vencto12cartao1 = bcadd($mes_parc11,1);
}
}

if($soma_vencto12cartao1>12){
$mes_par12ccartao1 = "01";
}else{
$mes_parc12cartao1 = $soma_vencto12cartao1;
}
if($soma_vencto12cartao1>12){
$ano_parc12cartao1 = bcadd($ano_parc11,1);
}else{
$ano_parc12cartao1 = $ano_parc11;
}

if(($mes_parc12cartao1=="02") or ($mes_parc12cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc12cartao1 = "28";
}
else{
$dia_parc12cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc12cartao1 = $dia_vencto;
	
}

$vencto12cartao1 = "$ano_parc12cartao1-$mes_parc12cartao1-$dia_parc12cartao1";

//-----------fim da verificação do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc11<=9){
$soma_vencto12cartao2 = "0".bcadd($mes_parc11,0);
}
else{
$soma_vencto12cartao2 = bcadd($mes_parc11,0);
}
}
else{

if($mes_parc11<=9){
$soma_vencto12cartao2 = "0".bcadd($mes_parc11,1);
}
else{
$soma_vencto12cartao2 = bcadd($mes_parc11,1);
}
}

if($soma_vencto12cartao2>12){
$mes_parc12cartao2 = "01";
}else{
$mes_parc12cartao2 = $soma_vencto12cartao2;
}
if($soma_vencto12cartao2>12){
$ano_parc12cartao2 = bcadd($ano_parc11,1);
}else{
$ano_parc12cartao2 = $ano_parc11;
}

if(($mes_parc12cartao2=="02") or ($mes_parc12cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc12cartao2 = "28";
}
else{
$dia_parc12cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc12cartao2 = $dia_vencto;
	
}

$vencto11cartao2 = "$ano_parc11cartao2-$mes_parc12cartao2-$dia_parc12cartao2";

//-----------fim da verificação do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc11<=9){
$soma_vencto12cartao3 = "0".bcadd($mes_parc11,0);
}
else{
$soma_vencto12cartao3 = bcadd($mes_parc11,0);
}
}
else{

if($mes_parc11<=9){
$soma_vencto12cartao3 = "0".bcadd($mes_parc11,1);
}
else{
$soma_vencto12cartao3 = bcadd($mes_parc11,1);
}
}

if($soma_vencto12cartao3>12){
$mes_parc12cartao3 = "01";
}else{
$mes_parc12cartao3 = $soma_vencto12cartao3;
}
if($soma_vencto12cartao3>12){
$ano_parc12cartao3 = bcadd($ano_parc11,1);
}else{
$ano_parc12cartao3 = $ano_parc11;
}

if(($mes_parc12cartao3=="02") or ($mes_parc12cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc12cartao3 = "28";
}
else{
$dia_parc12cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc12cartao3 = $dia_vencto;
	
}

$vencto12cartao3 = "$ano_parc12cartao3-$mes_parc12cartao3-$dia_parc12cartao3";

//-----------fim da verificação do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc11<=9){
$soma_vencto12cartao4 = "0".bcadd($mes_parc11,0);
}
else{
$soma_vencto12cartao4 = bcadd($mes_parc11,0);
}
}
else{

if($mes_parc11<=9){
$soma_vencto12cartao4 = "0".bcadd($mes_parc11,1);
}
else{
$soma_vencto12cartao4 = bcadd($mes_parc11,1);
}
}

if($soma_vencto12cartao4>12){
$mes_parc12cartao4 = "01";
}else{
$mes_parc12cartao4 = $soma_vencto12cartao4;
}
if($soma_vencto12cartao4>12){
$ano_parc12cartao4 = bcadd($ano_parc11,1);
}else{
$ano_parc12cartao4 = $ano_parc11;
}

if(($mes_parc12cartao4=="02") or ($mes_parc12cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc12cartao4 = "28";
}
else{
$dia_parc12cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc12cartao4 = $dia_vencto;
	
}

$vencto12cartao4 = "$ano_parc12cartao4-$mes_parc12cartao4-$dia_parc12cartao4";

//-----------fim da verificação do tipo do cartao 4---------------------





if($mes_parc11<=9){
$soma_vencto12 = "0".bcadd($mes_parc11,1);
}
else{
$soma_vencto12 = bcadd($mes_parc11,1);
}
if($soma_vencto12>12){
$mes_parc12 = "01";
}else{
$mes_parc12 = $soma_vencto12;
}
if($soma_vencto12>12){
$ano_parc12 = bcadd($ano_parc11,1);
}else{
$ano_parc12 = $ano_parc11;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc12=="02") or ($mes_parc12=="2")){
if($dia_vencto>="29"){
$dia_parc12 = "28";
}
else{
$dia_parc12 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc12 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc12=="02") or ($mes_parc12=="2")){
if($dia_vencto>="29"){
$dia_parc12 = "28";
}
else{
$dia_parc12 = $dia_vencto;
}
}
else{
	
$dia_parc12 = $dia_vencto;
	
}
	
}

$vencto12 = "$ano_parc12-$mes_parc12-$dia_parc12";

if($quant_parc>=12){
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto12','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto12cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto12cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto12cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto12cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto12cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto12cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto12cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto12cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}
}}
//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

	
	
	







	
	
?>


















<body>
  


</p>
<table width="100%" border="0">
  <tr>
    <td width="3%"><form name="form2" method="post" action="../../veiculos/verifica.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <a href="finalizar_orcamento_frente_de_caixa.php">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
        </a>
      <input class='class01' type="submit" name="Submit" value="Voltar">
    </form></td>
    <td align="center">
		
    </td>
    <td width="3%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>

