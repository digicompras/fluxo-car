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
.style11 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}
-->
</style>
</head>

<?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';
error_reporting(E_ALL);
error_reporting( E_ALL ^E_NOTICE );
?>

		  
		  
		  <?
		  
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

		  
$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador_fechou_conta = $linha[1];

$setor = $linha[43];

$estab_pertence = $linha[44];

$ultimo_departamento_trabalhado = $linha[66];


}

		  
		  
		  
$num_fatura = $_POST['num_fatura'];		

$total_geral = $_POST['total_geral'];

$desconto_de_arredondamento = $_POST['desconto_de_arredondamento'];
$acrescimo_de_arredondamento = $_POST['acrescimo_de_arredondamento'];
$acrescimo_por_rateio = $_POST['acrescimo_por_rateio'];


$valor_recebido_do_cliente = $_POST['valor_recebido'];
$troco = $_POST['troco'];
 
$valor_recebido = bcsub($valor_recebido_do_cliente,$troco,2);

$valor_entrada = $_POST['valor_entrada'];

$quant_parc = $_POST['quantparc'];



$saldo_a_parcelar = bcsub($total_geral,$valor_entrada,2);

$valorparcela = bcdiv($saldo_a_parcelar,$quant_parc,2);		  
	  


$status = "Finalizado";
$status_conta = "Finalizado";
$status_fatura = "Finalizado";



$codigo_cliente = $_POST['codigo_cliente'];		  

$horafechamento = $_POST['horafechamento'];	



$modopagto = $_POST['modopagto'];	

if($modopagto=="CARTAO"){

$quitacao = "Recebido do Cliente";

}
else{
	
$quitacao = "Em Aberto";
	
}



$ano_parc = date('Y');
$mes_parc = date('m');
$dia_vencto = date('d');



$cartao = $_POST['cartao'];
$tipocartao = $_POST['tipocartao'];
$valorcartao = $_POST['valorcartao'];
$custo_com_cartao1 = $_POST['custo_com_cartao1'];
$valorparcelacartao1 = bcdiv($valorcartao,$quant_parc,2);		  
$parcela_do_custo_com_cartao1 = bcdiv($custo_com_cartao1,$quant_parc,2);		  


$cartao2 = $_POST['cartao2'];
$tipocartao2 = $_POST['tipocartao2'];
$valorcartao2 = $_POST['valorcartao2'];
$custo_com_cartao2 = $_POST['custo_com_cartao2'];
$valorparcelacartao2 = bcdiv($valorcartao2,$quant_parc,2);		  
$parcela_do_custo_com_cartao2 = bcdiv($custo_com_cartao2,$quant_parc,2);		  

$cartao3 = $_POST['cartao3'];
$tipocartao3 = $_POST['tipocartao3'];
$valorcartao3 = $_POST['valorcartao3'];
$custo_com_cartao3 = $_POST['custo_com_cartao3'];
$valorparcelacartao3 = bcdiv($valorcartao3,$quant_parc,2);		  
$parcela_do_custo_com_cartao3 = bcdiv($custo_com_cartao3,$quant_parc,2);		  

$cartao4 = $_POST['cartao4'];
$tipocartao4 = $_POST['tipocartao4'];
$valorcartao4 = $_POST['valorcartao4'];
$custo_com_cartao4 = $_POST['custo_com_cartao4'];
$valorparcelacartao4 = bcdiv($valorcartao4,$quant_parc,2);		  
$parcela_do_custo_com_cartao4 = bcdiv($custo_com_cartao4,$quant_parc,2);		  

$subtotal_custo_de_recebimento_com_cartao_etapa1 = bcadd($custo_com_cartao1,$custo_com_cartao2,2);
$subtotal_custo_de_recebimento_com_cartao_etapa2 = bcadd($custo_com_cartao3,$custo_com_cartao4,2);

$custototal_com_cartoes = bcadd($subtotal_custo_de_recebimento_com_cartao_etapa1,$subtotal_custo_de_recebimento_com_cartao_etapa2,2);



$datafechamento = date('Y-m-d');
$datafechamento_brasileira = date('d-m-Y');

$data_de_fechamento = $_POST['datafechamento'];	//data de abertura de caixa no caso do happy hour, usada para o fechamento de caixa


$data = $datafechamento;

$data2 = explode("-", $data);


$dia = $data2[2];

$mes = $data2[1];

$ano = $data2[0];


$hora_fechamento_conta = date('H:i:s');

//dados do operador que alterou

$loja = $_POST['loja'];

$operador_alterou = $_POST['operador_alterou'];


//-------------------finalizando fatura--------------------

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`faturamento_futuro` set `status_fatura` = '$status_fatura',`horafechamento` = '$hora_fechamento_conta',`total_geral` = '$total_geral',`datafechamento` = '$datafechamento',`desconto_de_arredondamento` = '$desconto_de_arredondamento',`acrescimo_de_arredondamento` = '$acrescimo_de_arredondamento',`acrescimo_por_rateio` = '$acrescimo_por_rateio',`entrada` = '$entrada',`quantparc` = '$quantparc',`modopagto` = '$modopagto',`valor_recebido` = '$valor_recebido',`troco` = '$troco',`cartao` = '$cartao',`tipocartao` = '$tipocartao',`valorcartao` = '$valorcartao',`custo_com_cartao1` = '$custo_com_cartao1',`cartao2` = '$cartao2',`tipocartao2` = '$tipocartao2',`valorcartao2` = '$valorcartao2',`custo_com_cartao2` = '$custo_com_cartao2',`cartao3` = '$cartao3',`tipocartao3` = '$tipocartao3',`valorcartao3` = '$valorcartao3',`custo_com_cartao3` = '$custo_com_cartao3',`cartao4` = '$cartao4',`tipocartao4` = '$tipocartao4',`valorcartao4` = '$valorcartao4',`custo_com_cartao4` = '$custo_com_cartao4',`custototal_com_cartoes` = '$custototal_com_cartoes' where `faturamento_futuro`. `num_fatura` = '$num_fatura'";
}

mysql_query($comando,$conexao);



//-----------------fim do processo de finalização de fatura---------------
	


?>

<?

	
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`orcamentos` set `status_fatura` = '$status_fatura',`condicao` = '$condicao',`status` = '$status',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`operador_alterou` = '$operador_alterou',`datealteracao` = '$datafechamento',`horaalteracao` = '$horafechamento',`num_orcamento_bloco` = '$num_orcamento_bloco',`status_conta` = '$status_conta',`setor` = '$setor',`operador_fechou_conta` = '$operador_fechou_conta',`hora_fechamento_conta` = '$hora_fechamento_conta',`preparar_caixa_receber` = 'recebido' where `orcamentos`. `num_fatura` = '$num_fatura'";
}

mysql_query($comando,$conexao);



$sql3 = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {



$codigolancamento = $linha[0];





$sql4 = "select * from db";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `status_fatura` = '$status_fatura',`condicao` = '$condicao',`status` = '$status',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`operador_alterou` = '$operador_alterou',`datealteracao` = '$datafechamento',`horaalteracao` = '$horafechamento',`preparar_caixa_receber` = 'recebido',`operador_fechou_conta` = '$operador_fechou_conta' where `produtos_em_orcamento`. `codigo` = '$codigolancamento'";
}

mysql_query($comando,$conexao);



}




?>

<?php
//---------------------------------abre a conexão com a impressora------------------------------
//$handle=printer_open();
//printer_write($handle, "texto que manda para impressora"); // enviou para a impressora o texto
//printer_close($handle); 

//---------------------------------fechou a conexao com a impressora-----------------------------
?>

<?

//----------------LIBERANDO MESAS------------------------

$sql = "SELECT * FROM orcamentos where num_fatura = '$num_fatura' and preparar_caixa_receber = 'recebido'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$codigo_orcamento_liberar = $linha[0];


$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {



$comando = "update `$linha[1]`.`mesas` set `statusmesa` = 'LIVRE',`situacao` = '',`codigo_orcamento` = '' where `mesas`. `codigo_orcamento` = '$codigo_orcamento_liberar'";
}

mysql_query($comando,$conexao);


}


//-------------FIM DA LIBERAÇÃO DE MESAS-----------------



$sql = "SELECT * FROM faturamento_futuro where num_fatura = '$num_fatura' and status_fatura = 'Finalizado'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$num_fatura = $linha[0];

$cliente_da_fatura = $linha[22];
$cpf_do_cliente_da_fatura = $linha[23];


}




$sql = "SELECT * FROM orcamentos where num_fatura = '$num_fatura' and status = 'Finalizado' order by codigo_orcamento asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$codigo_orcamento_na_fatura = $linha[0];

$orcamentos_incluidos_na_fatura = "$codigo_orcamento_na_fatura / ";

}







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





$sql3 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registros = mysql_num_rows($res3);


$data_geracao = $linha['2'];
$hora_geracao = $linha['3'];

}


if($registros>=1){
	
echo "<br><br>ATENÇÃO!!!... O CONTAS A RECEBER REFERENTE A FATURA $num_fatura JÁ FOI GERADO EM $data_geracao AS $hora_geracao";
	
}
else{

//----------inicio do tratamento da entrada-----------------------------------

$historico = "Fatura Nº $num_fatura, do cliente $cliente_da_fatura CPF $cpf_do_cliente_da_fatura";
$historico_dos_cartoes = "Referente a fatura Nº $num_fatura, do cliente $cliente_da_fatura CPF $cpf_do_cliente_da_fatura";
$historico_de_custos_com_cartoes = "Despesa de recebimento com cartão ref. a fatura Nº $num_fatura, do cliente $cliente_da_fatura CPF $cpf_do_cliente_da_fatura";

$vencto_entrada = "$ano_parc-$mes_parc-$dia_parc";


//if($valor_entrada<>0.00){
if($modopagto<>"DINHEIRO"){
	
if($valor_entrada<>0.00){
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento)
values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valor_entrada','$vencto_entrada','$quant_parc','DINHEIRO','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','0','$setor','$ultimo_departamento_trabalhado')";

mysql_query($comando,$conexao) or die("Erro ao gravar a Entrada no contas a receber!");



	
$sql4 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and num_mensalidade = '0'";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$cod_contas_a_receber_entrada = $linha[0];
$nome_cliente = $linha[4];
$cpf = $linha[5];
$quantparc = $linha[9];
$estabelecimento = $linha[17];
$num_mensalidade_entrada = $linha[31];
$categoria_conta = $linha[34];
$departamento = $linha[46];

}




$sql5 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and cod_contas_a_receber = '$cod_contas_a_receber_entrada' and num_mensalidade = '$num_mensalidade_entrada' and categoria_conta = '$categoria_conta' and departamento = '$departamento'";
$res5 = mysql_query($sql5);

$lancamentos = mysql_num_rows($res5);

if($lancamentos>=1){

echo "Valor da entrada referente a fatura $num_fatura já registrado no caixa!!!... Por essa razão não foi lançado novamente!<br> ";

}
else{



$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento) 



values('$valor_entrada','$dia','$mes','$ano','$datafechamento_brasileira','$hora_fechamento_conta','$estab_pertence','Fatura $num_fatura, Recebimento de entrada $num_mensalidade de $quantparc - CPF $cpf','VENDA DE PRODUTOS','$datafechamento','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$operador_fechou_conta','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$orcamentos_incluidos_na_fatura','$setor','$valor_recebido','$troco','$departamento')";


mysql_query($comando,$conexao);



echo "<br> Recebimento da entrada referente a fatura $num_fatura no valor de R$ $valor_entrada lançada na entrada de caixa com sucesso!<br>";





$sql6 = "select * from db";

$res6 = mysql_query($sql6);

while($linha=mysql_fetch_row($res6)) {





$comando = "update `$linha[1]`.`contas_a_receber` set `codigo` = '$cod_contas_a_receber_entrada',`quitacao`= 'Recebido',`daterecebimento`= '$datafechamento' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber_entrada' limit 1 ";

}



mysql_query($comando,$conexao);


}

}

}
else{
	//-----se for DINHEIRO----------------
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento)
values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valor_recebido','$datafechamento','$quant_parc','DINHEIRO','Em Aberto','$operador_alterou','$loja','$historico','$cartao','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$ultimo_departamento_trabalhado')";

mysql_query($comando,$conexao) or die("Erro ao gravar a Entrada no contas a receber!");



	
$sql4 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and num_mensalidade = '1'";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$cod_contas_a_receber = $linha[0];
$nome_cliente = $linha[4];
$cpf = $linha[5];
$quantparc = $linha[9];
$estabelecimento = $linha[17];
$num_mensalidade_unica = $linha[31];
$categoria_conta = $linha[34];
$departamento = $linha[46];

}




$sql5 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and cod_contas_a_receber = '$cod_contas_a_receber' and num_mensalidade = '$num_mensalidade_unica' and categoria_conta = '$categoria_conta' and departamento = '$departamento'";
$res5 = mysql_query($sql5);

$lancamentos = mysql_num_rows($res5);

if($lancamentos>=1){

echo "Valor referente a fatura $num_fatura já registrado no caixa!!!... Por essa razão não foi lançado novamente!<br> ";

}
else{



$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento) 



values('$valor_recebido','$dia','$mes','$ano','$datafechamento_brasileira','$hora_fechamento_conta','$estab_pertence','Fatura $num_fatura, Recebimento da fatura $num_fatura - quant. parc. $quantparc - CPF $cpf','VENDA DE PRODUTOS','$datafechamento','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$operador_fechou_conta','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade_unica','$orcamentos_incluidos_na_fatura','$setor','$valor_recebido','$troco','$departamento')";


mysql_query($comando,$conexao);



echo "<br> Recebimento referente a fatura $num_fatura no valor de R$ $valor_recebido lançado no caixa com sucesso!<br>";





$sql6 = "select * from db";

$res6 = mysql_query($sql6);

while($linha=mysql_fetch_row($res6)) {





$comando = "update `$linha[1]`.`contas_a_receber` set `codigo` = '$cod_contas_a_receber',`quitacao`= 'Recebido',`daterecebimento`= '$datafechamento' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber' limit 1 ";

}



mysql_query($comando,$conexao);
	
	
}

}
//----------fim do tratamento da entrada-----------------------------------

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



if($quant_parc>=1){
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto1','$quant_parc','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura/$cartao','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$venctocartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura/$cartao2','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$venctocartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$ultimo_departamento_trabalhado','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}

if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura/$cartao3','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$venctocartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$ultimo_departamento_trabalhado','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura/$cartao4','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$venctocartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$ultimo_departamento_trabalhado','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$venctocartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$venctocartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$ultimo_departamento_trabalhado','$cartao2/$tipocartao2/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$venctocartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$ultimo_departamento_trabalhado','$cartao3/$tipocartao3/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$venctocartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$ultimo_departamento_trabalhado','$cartao4/$tipocartao4/$num_fatura')";

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
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto2','$quant_parc','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto2cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto2cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$ultimo_departamento_trabalhado','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}

if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto2cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$ultimo_departamento_trabalhado','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto2cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$ultimo_departamento_trabalhado','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto2cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto2cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$ultimo_departamento_trabalhado','$cartao2/$tipocartao2/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto2cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$ultimo_departamento_trabalhado','$cartao3/$tipocartao3/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto2cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$ultimo_departamento_trabalhado','$cartao4/$tipocartao4/$num_fatura')";

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
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto3','$quant_parc','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto3cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto3cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$ultimo_departamento_trabalhado','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto3cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$ultimo_departamento_trabalhado','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto3cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$ultimo_departamento_trabalhado','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto3cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto3cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto3cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto3cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

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
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto4','$quant_parc','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto4cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto4cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$ultimo_departamento_trabalhado','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}

if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto4cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$ultimo_departamento_trabalhado','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto4cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$ultimo_departamento_trabalhado','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto4cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$ultimo_departamento_trabalhado'
,'$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto4cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$ultimo_departamento_trabalhado'
,'$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto4cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$ultimo_departamento_trabalhado'
,'$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto4cartao','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$ultimo_departamento_trabalhado'
,'$cartao/$tipocartao/$num_fatura')";

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
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto5','$quant_parc','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto5cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto5cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$ultimo_departamento_trabalhado','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto5cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$ultimo_departamento_trabalhado','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto5cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$ultimo_departamento_trabalhado','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto5cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto5cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto5cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto5cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

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
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto6','$quant_parc','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	

if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto6cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto6cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$ultimo_departamento_trabalhado','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto6cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$ultimo_departamento_trabalhado','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto6cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$ultimo_departamento_trabalhado','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto6cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto6cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto6cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto6cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

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
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto7','$quant_parc','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto7cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto7cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$ultimo_departamento_trabalhado','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto7cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$ultimo_departamento_trabalhado','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto7cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$ultimo_departamento_trabalhado','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto7cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto7cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto7cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto7cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

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
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto8','$quant_parc','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto8cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto8cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$ultimo_departamento_trabalhado','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto8cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$ultimo_departamento_trabalhado','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto8cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$ultimo_departamento_trabalhado','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto8cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto8cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto8cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto8cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

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
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto9','$quant_parc','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto9cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto9cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$ultimo_departamento_trabalhado','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto9cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$ultimo_departamento_trabalhado','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto9cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$ultimo_departamento_trabalhado','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto9cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto9cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto9cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto9cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

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
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto10','$quant_parc','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','VENDA DE PRODUTOS','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto10cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$ultimo_departamento_trabalhado','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto10cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$ultimo_departamento_trabalhado','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto10cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$ultimo_departamento_trabalhado','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto10cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$ultimo_departamento_trabalhado','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto10cartao1','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto10cartao2','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto10cartao3','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto10cartao4','$quant_parc','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$ultimo_departamento_trabalhado','$cartao/$tipocartao/$num_fatura')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10º mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}



}




$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura' and departamento = '$ultimo_departamento_trabalhado'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



//$codigolancamento = $linha[0];

$codigoproduto = $linha[17];
$quant = $linha[21];




$sql2 = "SELECT * FROM produtos where codigo = '$codigoproduto'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$quant_estoque = $linha[16];

}

$saldo_estoque_do_produto = bcsub($quant_estoque,$quant);


$sql3 = "select * from db";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


$comando = "update `$linha[1]`.`produtos` set `quant_estoque` = '$saldo_estoque_do_produto' where `produtos`. `codigo` = '$codigoproduto'";
}

mysql_query($comando,$conexao);





}




//------------------FIM SE A CONDICAO FOR PEDIDO--------------
	
	
echo "Finalizado com sucesso a Fatura Nº $num_fatura!!!...<br><br>";	
	
	
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
  
<p>
  <? } ?>
</p>
<?
if($setor=="CAIXA_BILHETERIA"){
	
$linkvoltar =  "selecione_cliente_para_abrir_orcamento.php";
	
}

if($setor=="CAIXA_RESTAURANTE"){
	
$linkvoltar =  "../index.php";
	
}

if($setor=="GARCON"){
	
$linkvoltar =  "../restaurante/atribuicao_de_mesas.php";
	
}

?>

<table width="100%" border="0">
  <tr>
    <td width="25%"><form name="form2" method="post" action="../index.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit" value="Voltar">
    </form></td>
    <td width="11%">&nbsp;</td>
    <td width="11%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="11%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="6%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
<?
mysql_close($conexao);
?>
