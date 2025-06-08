<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");


$senha = $_SESSION['senha'];

ini_set('default_charset','UTF8_general_mysql500_ci');

?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>
<link rel="stylesheet" href="style.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

	
<style type="text/css">

<!--

.style3 {color: #0000FF; font-weight: bold;  }

-->
	
<!--

.style5 {color: #0000FF; font-weight: bold; font-size: 24px; }
.style1 {
	color: #FF0000;

	font-weight: bold;

	font-size: 24px;
}
.style2 {color: #0000FF}
.style31 {color: #FF0000}
.style4 {font-size: 18px}
body {
    margin-top: 0px;
}
.class01 {    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}
.class02 {    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #ffffff; 
	border-radius: 8px; 
	border: 3px solid #0404B4; 
	color: #000000; 
	cursor: pointer; 
	padding: 4px;
}

-->

</style>

</head>

<?
require '../conect/conect.php';
include '../css_menus/modal.css';
include '../css_menus/modal2.css';
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}
	

	
	
	
$diaatual = date('d');
	$mesatual = date('m');
	$anoatual = date('Y');
	$date_vencto = date('Y-m-d');
	
	
$solicitacao = $_POST['solicitacao'];
	$solicitacao_gravar_abertura_caixa = $_POST['solicitacao_gravar_abertura_caixa'];
	$solicitacao_gravar_fechamento_caixa = $_POST['solicitacao_gravar_fechamento_caixa'];
	
?>
	
<?
	
$sql50 = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res50 = mysql_query($sql50);
while($linha=mysql_fetch_row($res50)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];
$classificacao_operador = $linha[88];
	
$cidade_estab_pertence = $linha[15];
	
$funcao = $linha[43];
$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$obra_operador = $linha[50];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];

$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$fornecedores = $linha[66];
$controlekm_autorizado = $linha[75];
$orcamento_autorizado = $linha[76];
$permissao_categoria_de_produtos_autorizado = $linha[77];
	
$recebenotificacao = $linha[49];
	$iniciar_rdo_diferenciado = $linha[51];
	$estoque = $linha[54];
	$conciliacoes = $linha[55];
	//$despesas = $linha[56];
	//$veiculos = $linha[57];
	//$rdo = $linha[58];
	$rdo_autorizado = $linha[58];
	$avisodepecas = $linha[59];
	$administracartaoponto = $linha[61];
	$relatoriodepecasutilizadas = $linha[65];
	$fornecedores = $linha[66];
	$inventario = $linha[67];
	$estoque_entradas = $linha[68];
	$cadastro_de_itens = $linha[69];
	$alimentacao_rdo = $linha[70];
	$estoque_entradas_por_xml_autorizado = $linha[71];
	$veiculodaempresa = $linha[72];
	$controlekm = $linha[75];
	$orcamento = $linha[76];
	$permissao_categoria_de_produtos = $linha[77];
	$inclui_mais_uma_nf = $linha[78];
	$financeiro = $linha[79];
	$relatoriodecomissao = $linha[80];
	$registrodeoperadores = $linha[81];
	$abrir_e_fechar_cx = $linha[82];
	$editar_produtos = $linha[83];
	$quantitativo_do_item_no_estoque = $linha[84];
	$categoria_despesas = $linha[85];
	$cadastro_de_contas_bancarias = $linha[86];
	$aliquotas_dos_cartoes = $linha[87];
	$retira_itens_do_orcamento = $linha[89];
	$vendas = $linha[90];
	$custo_fixo = $linha[91];
	$transferencia_de_estoque = $linha[92];
	$status_e_condicao_da_transferencia_de_estoque = $linha[93];
	$responder_transferencias_de_estoque = $linha[94];
	$visualiza_transferencia = $linha[95];
	$verifica_movimentacoes_rdo = $linha[96];
	
}
	
	//-----------------INICIO DE VERIFICACAO E SE FORO CASO GRAVACAO DE DESCONTOS E COMISSOES E FUNCOES---------------------
	
$sql = "SELECT * FROM descontomaximo where estab_pertence = '$estab_pertence' limit 1";
$res = mysql_query($sql);
	$descontos_registrados = mysql_num_rows($res);
	
if($descontos_registrados<=0){
	
$sql = "SELECT * FROM descontomaximo where estab_pertence = 'AUTOELETRICA BERTOLDI' order by desconto asc limit 5";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$desconto = $linha[2];
	
$comando = "insert into descontomaximo(estab_pertence,desconto) 
values('$estab_pertence','$desconto')";
mysql_query($comando,$conexao);
	

}
	
}
	
	
	
$sql = "SELECT * FROM comissao where estab_pertence = '$estab_pertence' limit 1";
$res = mysql_query($sql);
	$comissao_registrados = mysql_num_rows($res);
	
if($comissao_registrados<=0){
	
$sql = "SELECT * FROM comissao where estab_pertence = 'AUTOELETRICA BERTOLDI' order by percentual asc limit 21";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$percetual = $linha[2];
	
$comando = "insert into comissao(estab_pertence,percentual) 
values('$estab_pertence','$percetual')";
mysql_query($comando,$conexao);
	

}
	
}
	
	
	
$sql7 = "SELECT * FROM funcao where estab_pertence = '$estab_pertence' limit 1";
$res7 = mysql_query($sql7);
	$funcao_registrados = mysql_num_rows($res7);
	
if($funcao_registrados<=0){
	
$sql8 = "SELECT * FROM funcao where estab_pertence = 'AUTOELETRICA BERTOLDI' order by funcao asc limit 5";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {
	
$funcao = $linha[1];
	
$comando = "insert into funcao(estab_pertence,funcao) 
values('$estab_pertence','$funcao')";
mysql_query($comando,$conexao);
	

}
	
}
	
	

	
	
//-----------------FIM DE VERIFICACAO E SE FORO CASO GRAVACAO DE DESCONTOS E COMISSOES E FUNCOES---------------------
	$sql = "SELECT * FROM tabela_meses where num_mes = '$mesatual' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$mestemquantosdias = $linha[3];

}
	if($mesatual=="01"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	if($mesatual=="02"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	if($mesatual=="03"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	if($mesatual=="04"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	if($mesatual=="05"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	if($mesatual=="06"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	if($mesatual=="07"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	if($mesatual=="04"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	if($mesatual=="09"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	if($mesatual=="10"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	if($mesatual=="11"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	if($mesatual=="12"){
		$vigencia_cartao = date('Y-m-')."$mestemquantosdias";
	}
	
	$date_cartao = date('Y-m-d');
	$dia_cartao = date('d');
	$mes_cartao = date('m');
	$ano_cartao = date('Y');
	
	
$sql = "SELECT * FROM tabela_cartoes where estab_pertence = '$estab_pertence' and mes = '$mes_cartao' and ano = '$ano_cartao' limit 1";
$res = mysql_query($sql);
	$tabela_cartoes_registrados = mysql_num_rows($res);
	
if($tabela_cartoes_registrados<=0){
	
	//if($tabela_cartoes_registrados<=0){
//$sql = "SELECT * FROM tabela_cartoes where estab_pertence = 'AUTOELETRICA BERTOLDI-MATRIZ' and status = 'Ativo' order by codigo asc limit 4";
	//}
	//else{
$sql = "SELECT * FROM tabela_cartoes where estab_pertence = '$estab_pertence' order by codigo desc limit 4";
	//}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	$codigo_cartao = $linha[0];
	$modopagtocartao = $linha[6];
	$prazo_inicialcartao = $linha[7];
	$prazo_finalcartao = $linha[8];
	$aliquota_cartao = $linha[9];
	
	
	
$comando = "update `$db`.`tabela_cartoes` set `status` = 'Inativo' where `tabela_cartoes`. `codigo` = '$codigo_cartao'";
mysql_query($comando,$conexao);
	
$comando = "insert into tabela_cartoes(status,date,dia,mes,ano,modopagto,prazo_inicial,prazo_final,aliquota,vigencia,estab_pertence) 
values('Ativo','$date_cartao','$dia_cartao','$mes_cartao','$ano_cartao','$modopagtocartao','$prazo_inicialcartao','$prazo_finalcartao','$aliquota_cartao','$vigencia_cartao','$estab_pertence')";
mysql_query($comando,$conexao);
	

}
	
}
else{
		
$sql = "SELECT * FROM tabela_cartoes where estab_pertence = '$estab_pertence' and mes = '$mes_cartao' and ano = '$ano_cartao' order by codigo desc limit 4";
$res = mysql_query($sql);
	$tabela_cartoes_registrados2 = mysql_num_rows($res);
	if($tabela_cartoes_registrados2>=1){
	}
	else{
	
while($linha=mysql_fetch_row($res)) {
	
	$codigo_cartao = $linha[0];
	$modopagtocartao = $linha[6];
	$prazo_inicialcartao = $linha[7];
	$prazo_finalcartao = $linha[8];
	$aliquota_cartao = $linha[9];
	
	$comando = "update `$db`.`tabela_cartoes` set `status` = 'Inativo' where `tabela_cartoes`. `codigo` = '$codigo_cartao'";
mysql_query($comando,$conexao);
	
$comando = "insert into tabela_cartoes(status,date,dia,mes,ano,modopagto,prazo_inicial,prazo_final,aliquota,vigencia,estab_pertence) 
values('Ativo','$date_cartao','$dia_cartao','$mes_cartao','$ano_cartao','$modopagtocartao','$prazo_inicialcartao','$prazo_finalcartao','$aliquota_cartao','$vigencia_cartao','$estab_pertence')";
mysql_query($comando,$conexao);
	
	
}
	
	}
	
}
	
	
	//-----------------FIM DE VERIFICACAO E SE FORO CASO GRAVACAO DE DESCONTOS E COMISSOES---------------------
	
	
	
if(($diaatual>="01") && ($diaatual<="05")  ){
	
	 
	
	$sql = "SELECT * FROM tabela_cartoes where estab_pertence = '$estab_pertence' and mes = '$mesatual' and ano = '$anoatual'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	$registros_de_lancamentos_mes_atual = mysql_num_rows($res);
}
	if($registros_de_lancamentos_mes_atual>=1){
		
	}
	else{
	
$sql = "SELECT * FROM tabela_cartoes where estab_pertence = '$estab_pertence' order by codigo desc limit 4";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	$registros_de_lancamentos_de_cartoes = mysql_num_rows($res);

	$codigocartao = $linha[0];
$statuscartao = $linha[1];
	$datecartao = $linha[2];
	$diacartao = $linha[3];
	$mescartao = $linha[4];
	$anocartao = $linha[5];
	$modopagtocartao = $linha[6];
	$prazo_inicialcartao = $linha[7];
	$prazo_finalcartao = $linha[8];
	$aliquotacartao = $linha[9];
	$vigenciacartao = $linha[10];
	$estab_pertencecartao = $linha[11];
	
	
	
	if($registros_de_lancamentos_de_cartoes>=1){
		
		$comando = "insert into tabela_cartoes(status,date,dia,mes,ano,modopagto,prazo_inicial,prazo_final,aliquota,vigencia,estab_pertence)

values('Ativo','$anoatual-$mesatual-$diaatual','$diaatual','$mesatual','$anoatual','$modopagtocartao','$prazo_inicialcartao','$prazo_finalcartao','$aliquotacartao','$anoatual-$mesatual-31','$estab_pertence')";
 
mysql_query($comando,$conexao);
		
		
	$comando = "update `$db`.`tabela_cartoes` set `status` = 'Inativo' where `tabela_cartoes`. `codigo` = '$codigocartao'";
mysql_query($comando,$conexao);
		
	}
	else{

		
	}
		

	
}
	
	}
	

}
	
	
	$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence' and classificacao = '$classificacao_operador' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$diafechamento = $linha[45];
	$classificacao = $linha[46];
	$cpf_proprietario = $linha[17];
	$classificacao = $linha[46];
	$cartao_vai_pro_caixa = $linha[47];
	$emaildaempresa = $linha[14];
	
}
	
//-----------calculando data de ontem--------------

$datecadastro = date('Y-m-d');
$datacadastro = date('d-m-Y');

$datadehoje = time(); 
$ontem = $datadehoje - (24*3600);
$datadeontem = date('Y-m-d', $ontem);
		  
		  
$data_de_ontem_obtida = $datadeontem;

$data_de_ontem_obtida2 = explode("-", $data_de_ontem_obtida);



$dia_de_ontem_obtida = $data_de_ontem_obtida2[0];

$mes_de_ontem_obtido = $data_de_ontem_obtida2[1];

$ano_de_ontem_obtido = $data_de_ontem_obtida2[2];
	
$sql = "SELECT * FROM cx_fechamento where loja = '$estab_pertence' and datefechamento = '$data_de_ontem_obtida' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$sub_registro_de_fechamento_data_de_ontem_obtida = mysql_num_rows($res);

}
if(empty($sub_registro_de_fechamento_data_de_ontem_obtida)){ 
$registro_de_fechamento_data_de_ontem_obtida = 0;
}
else{
	$registro_de_fechamento_data_de_ontem_obtida = $sub_registro_de_fechamento_data_de_ontem_obtida;
}

	
//-------------fim do calculo da data de ontem------------
	
?>
	
<?
	
if($solicitacao_gravar_fechamento_caixa=="gravarfechamentocaixa"){
	
if($registro_de_fechamento_data_de_ontem_obtida==0){
$datefechamento = $data_de_ontem_obtida;
}
else{
$datefechamento = date('Y-m-d');
}

$horafechamento = date('H:i:s');


$sub_valorfechamento = $valor_total_entradas+$total_recebimento_cartoes+$total_recebimento_carteira;
$valorfechamento = bcadd($sub_valorfechamento,0,2);

$saldofechamento = bcsub($valorfechamento,$valor_total_saidas,2);
	
	
$sql = "SELECT * FROM cx_fechamento where loja = '$estab_pertence' and datefechamento = '$datefechamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registro_de_fechamento_antes_da_gravacao = mysql_num_rows($res);

}
	
	if($registro_de_fechamento_antes_da_gravacao<=0){

$comando = "insert into cx_fechamento(operador,datefechamento,horafechamento,valorfechamento,valordinheiro,valorcartao,valorcarteira,valorsaidas,saldofechamento,loja,departamento)
values('$operador','$datefechamento','$horafechamento','$valorfechamento','$valor_total_entradas','$total_recebimento_cartoes','$total_recebimento_carteira','$valor_total_saidas','$saldofechamento','$estab_pertence','$estab_pertence')";
mysql_query($comando,$conexao);
		
	echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE TODOS OS DIAS FECHAR O CAIXA! NAO ESQUECA...');
window.location = 'index.php';

</script>";
		
	}
	


}
	
?>
	
<?
if($funcao=="Mecanico"){
	
$dateabertura = date('Y-m-d');
$horaabertura = date('H:i:s');


	$sql = "SELECT * FROM cx_abertura where operador = '$operador' and loja = '$estab_pertence' and dateabertura = '$dateabertura' order by dateabertura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registro_de_abertura_mecanico = mysql_num_rows($res);
	

}
	if($registro_de_abertura_mecanico>=1){}else{
		
	$comando = "insert into cx_abertura(operador,dateabertura,horaabertura,valorabertura,loja,departamento) values('$operador','$dateabertura','$horaabertura','0.01','$estab_pertence','$estab_pertence')";
mysql_query($comando,$conexao);
		
	}
	
	
	
}
	
if($solicitacao_gravar_abertura_caixa=="gravaraberturacaixa"){

$dateabertura = date('Y-m-d');
$horaabertura = date('H:i:s');

$valor = $_POST['valor'];


	
	$comando = "insert into cx_abertura(operador,dateabertura,horaabertura,valorabertura,loja,departamento) values('$operador','$dateabertura','$horaabertura','$valor','$estab_pertence','$estab_pertence')";
mysql_query($comando,$conexao);


?>

<script>

alert("Abertura de caixa registrada com sucesso!!!...\n\n<? echo "R$ $valor"; ?> \n\n<? echo "$operador"; ?> \n\nTenha um dia de trabalho ILUMINADO!");

window.location = "index.php";


</script>


<?

} 
 
?>

	
<?
	


//-----------------------------------------verificando movimentação de caixa hoje-----------------------------------------------


$sql = "SELECT * FROM cx_abertura where operador = '$operador' and loja = '$estab_pertence' and dateabertura = '$datecadastro' order by dateabertura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registro_de_abertura = mysql_num_rows($res);
	
$data_de_abertura = $linha[2];

}



$sql2 = "SELECT * FROM cx_fechamento where operador = '$operador' and loja = '$estab_pertence' and datefechamento = '$datecadastro' order by datefechamento desc limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$registro_de_fechamento = mysql_num_rows($res2);
	
$data_de_fechamento = $linha[2];

}


//---------------------------------------------------------fim da verificação de hoje--------------------------------------------------	

	
if($solicitacao=="atualizarfoto1"){
	
	$codigo = $_POST['codigo'];
	
unlink("$img1");
	
	
				  
				  //-----------
	
$foto1 = $_FILES['foto1']['name'];
	
$uploaddir = "fotos/";
$uploadfile = $uploaddir. $_FILES['foto1']['name'];

if (
move_uploaded_file($_FILES['foto1']['tmp_name'], $uploaddir.$_FILES['foto1']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto1 = "http://www.fluxocar.com.br/concessionarias/fotos/$foto1";

//----------
					  
$comando = "update `$db`.`mensalidade_sistema_comp_pagto` set `foto1` = '$link_foto1',`nomefoto1` = '$foto1',`status` = 'PAGO',`date_envio` = '$anoatual-$mesatual-$diaatual' where `mensalidade_sistema_comp_pagto`. `codigo` = '$codigo' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao gravar o comprovante no sistema, avise a administração pelo fale conosco!");
}
				   

	
	
$sql = "SELECT * FROM mensalidade_sistema_comp_pagto where mes = '$mesatual' and ano = '$anoatual' and status = 'PAGO' order by ano,mes desc";
$res = mysql_query($sql);
$verifica_se_mensalidade_esta_paga = mysql_num_rows($res);
	
	
?>
	

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
	<?
		
		if($registro_de_fechamento==1){
			
$datefechamentodocaixa = date('Y-m-d');
		
		$sql = "SELECT * FROM cx_fechamento where loja = '$estab_pertence' and operador = '$operador' and datefechamento = '$datefechamentodocaixa' order by datefechamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	
$data_de_fechamento = $linha[2];
	$hora_de_fechamento = $linha[3];
	//$valor_de_fechamento = $linha[4];
	//$valordinheiro_de_fechamento = $linha[5];
	//$valorcartao_de_fechamento = $linha[6];
	//$valorcarteira_de_fechamento = $linha[7];
	//$valorsaidas_de_fechamento = $linha[8];
	//$saldo_de_fechamento = $linha[9];
}
		
//----------------------------fechamento das entradas DINHEIRO----------------------------------
			
$sql = "select sum(total_geral) as total_liquido_dinheiro from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'DINHEIRO' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_dinheiro = bcadd($linha['total_liquido_dinheiro'],0,2);
			
			
$sql = "select sum(entrada) as total_liquido_carteira from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTEIRA' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_carteira_entrada = bcadd($linha['total_liquido_carteira'],0,2);
			
			
$sql = "select sum(entrada) as total_liquido_cartao from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTAO' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_cartao_entrada = bcadd($linha['total_liquido_cartao'],0,2);
			
			
			$sub_total_geral_liquido_dinheiro = bcadd($total_liquido_dinheiro,$total_liquido_carteira_entrada,2);
			$total_geral_liquido_dinheiro = bcadd($sub_total_geral_liquido_dinheiro,$total_liquido_cartao_entrada,2);
			
			
//---------------------------FIM DE DINHEIRO----------------------------
			
//-----------------INICIO DO RESUMO CARTEIRA-------------------------------
			
$sql = "select sum(total_geral) as total_liquido_carteira from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTEIRA' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_carteira = bcsub($linha['total_liquido_carteira'],$total_liquido_carteira_entrada,2);
			

			
//-------------------------------FIM DO RESUMO CARTEIRA---------------------------
			
//------------------------------INICIO DO RESUMO DE CARTOES----------------------
			
			
$sql = "select sum(total_geral) as total_liquido_cartao from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTAO' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_cartao = bcsub($linha['total_liquido_cartao'],$total_liquido_cartao_entrada,2);
			
			//------------INFORMATIVO E SEPARACAO DE CARTOES------------------
			
$sql60 = "select sum(valorcartao) as total_valor_cartao from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTAO' and tipocartao = 'CARTAO DE CREDITO' and datafechamento = '$datefechamentodocaixa'";
$resultado60=mysql_query($sql60, $conexao);
$linha=mysql_fetch_array($resultado60);
			
			$total_valor_cartao = bcsub($linha['total_valor_cartao'],0,2);
			
			
$sql = "select sum(valorcartao2) as total_valor_cartao2 from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTAO' and tipocartao2 = 'CARTAO DE CREDITO' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);
			
			$total_valor_cartao2 = bcsub($linha['total_valor_cartao2'],0,2);
			
$sql = "select sum(valorcartao3) as total_valor_cartao3 from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTAO' and tipocartao3 = 'CARTAO DE CREDITO' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);
			
			$total_valor_cartao3 = bcsub($linha['total_valor_cartao3'],0,2);
			
$sql = "select sum(valorcartao4) as total_valor_cartao4 from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTAO' and tipocartao4 = 'CARTAO DE CREDITO' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);
			
			$total_valor_cartao4 = bcsub($linha['total_valor_cartao4'],0,2);
			

			
	$sub_soma_cartao_credito1_e_cartao_credito2 = bcadd($total_valor_cartao,$total_valor_cartao2,2);
			$sub_soma_cartao_credito3_e_cartao_credito4 = bcadd($total_valor_cartao3,$total_valor_cartao4,2);
$soma_total_dos_cartoes_de_credito = bcadd($sub_soma_cartao_credito1_e_cartao_credito2,$sub_soma_cartao_credito3_e_cartao_credito4,2);		
			
$sql = "select sum(valorcartao) as total_valor_cartao_debito from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTAO' and tipocartao = 'CARTAO DE DEBITO' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);
			
			$total_valor_cartao_debito = bcsub($linha['total_valor_cartao_debito'],0,2);
			
$sql = "select sum(valorcartao2) as total_valor_cartao_debito2 from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTAO' and tipocartao2 = 'CARTAO DE DEBITO' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);
			
			$total_valor_cartao_debito2 = bcsub($linha['total_valor_cartao_debito2'],0,2);
			
$sql = "select sum(valorcartao3) as total_valor_cartao_debito3 from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTAO' and tipocartao3 = 'CARTAO DE DEBITO' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);
			
			$total_valor_cartao_debito3 = bcsub($linha['total_valor_cartao_debito3'],0,2);
			
$sql = "select sum(valorcartao4) as total_valor_cartao_debito4 from faturamento_futuro where operador = '$operador' and loja = '$estab_pertence' and modopagto = 'CARTAO' and tipocartao4 = 'CARTAO DE DEBITO' and datafechamento = '$datefechamentodocaixa' order by datafechamento desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);
			
			$total_valor_cartao_debito4 = bcsub($linha['total_valor_cartao_debito4'],0,2);
			
$sub_soma_cartao_debito1_e_cartao_debito2 = bcadd($total_valor_cartao_debito,$total_valor_cartao_debito2,2);
			$sub_soma_cartao_debito3_e_cartao_debito4 = bcadd($total_valor_cartao_debito3,$total_valor_cartao_debito4,2);
	$soma_total_dos_cartoes_de_debito = bcadd($sub_soma_cartao_debito1_e_cartao_debito2,$sub_soma_cartao_debito3_e_cartao_debito4,2);

			
//------------INFORMATIVO E SEPARACAO DE CARTOES------------------
			
//------------------------------FIM DO RESUMO DE CARTOES----------------------
			
//-----------------------fim do fechamento das entradas---------------------------
			$sub_total_liquido_recebimentos = bcadd($total_geral_liquido_dinheiro,$total_liquido_carteira,2);
			$total_liquido_recebimentos = bcadd($sub_total_liquido_recebimentos,$total_liquido_cartao,2);
			
//-----------------------inicio fechamento saidas--------------------------------------
			
$sql = "select sum(valor) as total_liquido_saidas from cx_saidas where operador = '$operador' and nfantasia = '$estab_pertence' and datecadastro = '$datefechamentodocaixa' order by datecadastro desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_saidas = bcadd($linha['total_liquido_saidas'],0,2);
			
//-----------------------fim do fechamento de saidas----------------------
			//---------------------------calculo do saldo----------------------
			
			$saldo_de_fechamento = bcsub($total_liquido_recebimentos,$total_liquido_saidas,2);
			
			//--------------------------fim do calculo do saldo-----------------------
			//-----------------INFORMATIVO-------------------
$anoinicialfechamentododia = date('Y');
$anofinalfechamentododia = date('Y');
	$mesinicialfechamentododia = date('m');
	$mesfinalfechamentododia = date('m');
			
$periodoinicial = "$anoinicialfechamentododia-$mesinicialfechamentododia-01";
$periodofinal = "$anofinalfechamentododia-$mesfinalfechamentododia-31";
			
			$sql = "select sum(total) as total_vendas_orcamentos_do_mes from orcamentos where loja = '$estab_pertence' and status = 'Finalizado' and datefechamento between '$periodoinicial' and '$periodofinal'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_vendas_orcamentos_do_mes = $linha['total_vendas_orcamentos_do_mes'];
			
	
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos_no_mes from produtos_em_orcamento where loja = '$estab_pertence' and  status = 'Finalizado' and datafechamento between '$periodoinicial' and '$periodofinal'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos_no_mes = $linha['totalizacao_cmv_dos_produtos_no_mes'];

//echo "R$ $totalizacao_cmv_dos_produtos";

	
	
	$sql2 = "select sum(comissao) as total_comissao from produtos_em_orcamento where loja = '$estab_pertence' and  status = 'Finalizado' and datafechamento between '$periodoinicial' and '$periodofinal'";
$resultado2=mysql_query($sql2, $conexao);
$linha=mysql_fetch_array($resultado2);


$total_comissao = $linha['total_comissao'];

			  
	
	//echo "R$ $total_comissao"; 
			  

$sub_saldogeralliquido = bcsub($total_vendas_orcamentos_do_mes,$totalizacao_cmv_dos_produtos_no_mes,2);
	$sub_saldogeralliquido2 = bcsub($sub_saldogeralliquido,$total_comissao,2);
			
			//-----------------INFORMATIVO------------------
			
			
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $emaildaempresa;		
	
	//PREPARA O PEDIDO
$mens   = "<table align='center' ><tr><td align='center'>
CAIXA FECHADO!!!... MOVIMENTO ENCERRADO!!!...<br><br>

$estab_pertence<br>

Data de Fechamento: $data_de_fechamento Hora de Fechamento: $hora_de_fechamento<br><br>

---------INFORMATIVO DO MES---------------<br>
<h3><b>
(Venda)R$ $total_vendas_orcamentos_do_mes <br>
(CMV)R$ $totalizacao_cmv_dos_produtos_no_mes <br>
(Comissao)R$ $total_comissao <br> 
(Saldo Liquido)R$ $sub_saldogeralliquido2 <br>
</b></h3>

----------INFORMATIVO DO MES------------------<br><br>


----------RESUMO DE VENDAS DE HOJE----------<br>
<h3><b>
DINHEIRO: R$ $total_geral_liquido_dinheiro<br>
( TOTAL CARTOES: R$ $total_liquido_cartao )<br>
CARTAO DE DEBITO: R$ $soma_total_dos_cartoes_de_debito<br>
CARTAO DE CREDITO: R$ $soma_total_dos_cartoes_de_credito<br>
CARTEIRA: R$ $total_liquido_carteira<br>
</b></h3>
----------RESUMO DE VENDAS DE HOJE----------<br>
<h3><b>
Total Geral de Vendas R$ $total_liquido_recebimentos<br>
</b></h3>
----------Total Geral Saidas----------<br>

<h3><b>
SAIDAS: R$ $total_liquido_saidas<br>
</b></h3>

----------Saldo Geral do dia----------<br>

<h3><b>
SALDO R$ $saldo_de_fechamento 
</b></h3>



</td></tr></table> \n";
			
	//DISPARA O EMAIL
	$envia  =  mail($email_dest, "Caixa fechado na loja $estab_pertence ".$data_da_tentativa, $mens,"From:".$email_dest);
	
echo "$mens";
			
}
else{
		
		?>
	
	
	<?
	

	
	
$sql = "select * from rdo_data_inicial_e_final";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$diainicialrdo = $linha[1];
	$mesinicialrdo = $linha[2];
	$anoinicialrdo = $linha[3];
	$diafinalrdo = $linha[4];
	$mesfinalrdo = $linha[5];
	$anofinalrdo = $linha[6];
}
$datainicial_do_periodo_atual_do_rdo = "$anoinicialrdo-$mesinicialrdo-$diainicialrdo";
$datafinal_do_periodo_atual_do_rdo = "$anofinalrdo-$mesfinalrdo-$diafinalrdo";






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
	
	<?
	
if($data_atual>$datafinal_do_periodo_atual_do_rdo){
	
$calculo_do_mes_inicial_do_periodo = bcadd($mesinicialrdo,1);
	$calculo_do_mes_final_do_periodo = bcadd($mesfinalrdo,1);
	
	
	
	if($calculo_do_mes_inicial_do_periodo<=9){
		$mes_inicial_do_periodo = "0$calculo_do_mes_inicial_do_periodo";
	}
	else{
		if($calculo_do_mes_inicial_do_periodo>=13){
		$mes_inicial_do_periodo = "01";
		}
		else{
		$mes_inicial_do_periodo = $calculo_do_mes_inicial_do_periodo;
		}
	}
	
	if($calculo_do_mes_final_do_periodo<=9){
		$mes_final_do_periodo = "0$calculo_do_mes_final_do_periodo";
	}
	else{
		if($calculo_do_mes_final_do_periodo>=13){
		$mes_final_do_periodo = "01";
		}
		else{
		$mes_final_do_periodo = $calculo_do_mes_final_do_periodo;
		}
	}
	
	
$comando = "update `$db`.`rdo_data_inicial_e_final` set `mesinicialrdo` = '$mes_inicial_do_periodo',`mesfinalrdo` = '$mes_final_do_periodo' where `rdo_data_inicial_e_final`. `codigo` = '0'";
mysql_query($comando,$conexao);
	
}
	
	?>

<body bgcolor="#<? echo $cor; ?>"> 



<?
//---------INICIO DE VERIFICAÇÃO E LANÇAMENTO DE RDO EM BRANCO DO DIA---------------
	
if(empty($data_informada)){
	
$sql = "SELECT * FROM veiculos where obra = '$obra_operador' and rdo = 'sim' and gerar_rdo_ate_essa_data <> '0000-00-00' or gerar_rdo_ate_essa_data <= '$datafinal_do_periodo_atual_do_rdo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigointerno = $linha[0];
$concessionaria = $linha[10];
$veiculo = $linha[16];
$placa = $linha[21];
$tipo = $linha[67];
$localizacao_do_veiculo = $linha[76];
$obra = $linha[108];
$prefixo = $linha[109];
$rdo = $linha[110];

	
$sql2 = "SELECT * FROM rdo where placa = '$placa' and data = '$data_atual' and localizacao = '$localizacao_do_veiculo' order by data desc";
$res2 = mysql_query($sql2);
$registros_rdo_lancamento = mysql_num_rows($res2);
	
if($registros_rdo_lancamento<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_atual','$diasemana','$dia_atual','$mes_atual','$ano_atual','$hora','$valormensal','$total','$obra','$prefixo','$localizacao_do_veiculo','$rdo')";
mysql_query($comando,$conexao);
	
}
	
	
$sql3 = "SELECT * FROM veiculos_alteracoes where placa = '$placa' and campoalterado = 'Localizacao' and datealteracao between '$datainicial_do_periodo_atual_do_rdo' and '$datafinal_do_periodo_atual_do_rdo'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
	
$localizacao_anterior = $linha[3];
	
	$placaencontrada = $linha[10];
	

	
if( ($data_atual>=$datainicial_do_periodo_atual_do_rdo) && ($data_atual<=$datafinal_do_periodo_atual_do_rdo) ){
	
$sql4 = "SELECT * FROM rdo where placa = '$placaencontrada' and localizacao = '$localizacao_anterior' and data = '$data_atual' order by data asc";
$res4 = mysql_query($sql4);
$registros_rdo_lancamento_localizacao_anterior = mysql_num_rows($res4);
	
if($registros_rdo_lancamento_localizacao_anterior<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO PML','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_atual','$diasemana','$dia_atual','$mes_atual','$ano_atual','$hora','$valormensal','$total','$obra','$prefixo','$localizacao_anterior','$rdo')";
mysql_query($comando,$conexao);
	
}
	
}//FIM SE A DATA ATUAL FOR MAIOR QUE A INICIAL DO RDO E MENOR QUE A FINAL DO RDO
	
	
}
	
	
}//FIM DO WHILE DE VEICULOS
	
}
else{
	
$sql = "SELECT * FROM veiculos where obra = '$obra_operador' and rdo = 'sim' and gerar_rdo_ate_essa_data <> '0000-00-00' or gerar_rdo_ate_essa_data <= '$datafinal_do_periodo_atual_do_rdo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigointerno = $linha[0];
$concessionaria = $linha[10];
$veiculo = $linha[16];
$placa = $linha[21];
$tipo = $linha[67];
$localizacao_do_veiculo = $linha[76];
$obra = $linha[108];
$prefixo = $linha[109];
$rdo = $linha[110];

	
$sql2 = "SELECT * FROM rdo where placa = '$placa' and data = '$data_informada' and localizacao = '$localizacao_do_veiculo' order by data desc";
$res2 = mysql_query($sql2);
$registros_rdo_lancamento = mysql_num_rows($res2);
	
if($registros_rdo_lancamento<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_informada','$diasemana','$diainformado','$mesinformado','$anoinformado','$hora','$valormensal','$total','$obra','$prefixo','$localizacao_do_veiculo','$rdo')";
mysql_query($comando,$conexao);
	
}
	
	
$sql3 = "SELECT * FROM veiculos_alteracoes where placa = '$placa' and campoalterado = 'Localizacao' and datealteracao between '$datainicial_do_periodo_atual_do_rdo' and '$datafinal_do_periodo_atual_do_rdo'order by codigo desc limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
	
$localizacao_anterior = $linha[3];
	$placaencontrada = $linha[10];
	

	
if( ($data_atual>=$datainicial_do_periodo_atual_do_rdo) && ($data_atual<=$datafinal_do_periodo_atual_do_rdo) ){
	
$sql4 = "SELECT * FROM rdo where placa = '$placaencontrada' and localizacao = '$localizacao_anterior' and data = '$data_informada' order by data asc";
$res4 = mysql_query($sql4);
$registros_rdo_lancamento_localizacao_anterior = mysql_num_rows($res4);
	
if($registros_rdo_lancamento_localizacao_anterior<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO PML','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_informada','$diasemana','$dia_atual','$mes_atual','$ano_atual','$hora','$valormensal','$total','$obra','$prefixo','$localizacao_anterior','$rdo')";
mysql_query($comando,$conexao);
	
}
	
	
	
}//FIM DE A DATA ATUAL FOR MAIOR QUE A INICIAL DO RDO E MENOR QUE A FINAL DO RDO

}
	
}// FIM DO WHILE DE VEICULOS
	
	}
	//---------FIM DE VERIFICAÇÃO E LANÇAMENTO DE RDO EM BRANCO DO DIA---------------

?>
	


<table width="100%"  border="0">

  <tr>

    <td width="28%"><strong>Nome Fantasia</strong></td>

    <td width="12%"><strong>Cidade</strong></td>

    <td width="13%"><strong>Operador</strong></td>
    <td width="16%">Funcao</td>

    <td width="20%"><strong>E-Mail</strong></td>

    <td width="11%"><strong>Data</strong></td>

  </tr><br>

  <tr>

    <td><span class="style3"><? echo "$estab_pertence"; ?></span></td>

    <td><span class="style3"><? echo "$cidade_estab_pertence"; ?></span></td>

    <td><span class="style3"><? echo $operador; ?></span></td>
    <td><span class="style3"><? echo "$funcao"; ?></span></td>

    <td><span class="style3"><? echo $emailoperador; ?></span></td>

    <td><form action="relatorios/fechamento_de_caixa.php" method="post" name="form1" target="_blank">
      <span class="style3"></span>
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?><? echo "$diasemana $diaatual-$mesatual-$anoatual<br> $mestemquantosdias dias"; ?>
      
    </form></td>

  </tr>
  <tr>
    <td colspan="6"><?
	

//if($diaatual>=$diafechamento){
	
$sql4 = "SELECT * FROM mensalidade_sistema_comp_pagto where mes = '$mesatual' and ano = '$anoatual' order by mes desc";
$res4 = mysql_query($sql4);
$registros_lancamento_mensalidade = mysql_num_rows($res4);
	
	if($registros_lancamento_mensalidade>=1){
		
	}
	else{
	
$comando = "insert into mensalidade_sistema_comp_pagto(estab_pertence,status,dia,mes,ano,date_vencto) values('$estab_pertence','Em Aberto','$diaatual','$mesatual','$anoatual','$date_vencto')";

mysql_query($comando,$conexao) or die("Erro ao gravar mensalidade!");
		
	}
//}
	
	if($verifica_se_mensalidade_esta_paga>=1){
		
	}
	else{
	?>
     <? include("<img src='../imagens_sistema/cobranca2.jpg' width='300' height='300' alt='55,00'/>"); ?>
     <?
		echo "<br><b><marquee>ATENÇÃO!!!...Não connsta em nossos registros o pagto da mensalidade desse mês, envie o comprovante, obrigado.</marquee></b>";
	} 
?>
     <table width="100%" border="0" cellpadding="0" cellspacing="0">
       <tbody>
        <?
			
$sql = "SELECT * FROM mensalidade_sistema_comp_pagto where mes = '$mesatual' and ano = '$anoatual' and status = 'Em Aberto' order by mes ,ano desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$codigo = $linha[0];
$diavencto = $linha[5];
$mesvencto = $linha[6];
$anovencto = $linha[7];
$statusmensalidade = $linha[4];
$img1 = $linha[3];
	
	?>
        <tr>
          <th align="center" scope="row"><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <form action="index.php" method="post" enctype="multipart/form-data" name="form2">
              <tr>
                <td align="center"><span style="font-size: 16px">
                  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
	if($verifica_se_mensalidade_esta_paga>=1){
		
	}
	else{
		echo "$statusmensalidade<br>";
		echo "<a href='$img1' target='_blank'><img src='../imagens_sistema/cobranca2.jpg' width='300' height='300' alt='55,00'/></a><br>"; 
		  echo "Vencimento<br>$diavencto-$mesvencto-$anovencto<br>"; 
                  
	}
?>
                  Envie o comprvante:
                  <input class="class02" type="file" name="foto1" id="foto1">
                  <input name="codigo" type="hidden" id="codigo" value="<? echo "$codigo"; ?>">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto1">
                  </span><span style="font-weight: bold">
                    <input class='class01' type=image src='../imagens_botoes/ok.png' width='20' height='20' name="Submit11" value="Voltar">
                    </span></td>
                </tr>
              </form>
          </table></th>
          <td width="4%">&nbsp;</td>
        </tr>
        <? } ?>
        </tbody>
  </table></td>
  </tr>

</table>

	
	<h2>PAINEL DE CONTROLE</h2>
	<form action="index.php#aberturadecaixa" align="center" method="post" name="form2" id="form4">
	  <input name="solicitacao" type="hidden" id="solicitacao" value="abrircaixa" />
	  <? 
	if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ 
		
	if(($abrir_e_fechar_cx=="sim") && ($funcao<>"Mecanico") ){
		
	if(($registro_de_abertura==0) && ($registro_de_fechamento==0) ){

echo'<input class="class01" type=image src="../imagens_botoes/registradora.png" width="100" height="100" name="Submit2" value="Abertura de caixa">';
	
}
	}
		
	}

?>
</form>
	
	
			  
	<section>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($veiculos_autorizado=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
		
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0)  && ($funcao<>"Mecanico") ){ ?>

			<?
				if($veiculos_autorizado=="sim"){
					
				include("paginas_a_chamar/veiculos.php");
				}else{} }
			?>
		</div>
		<? } ?>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($rdo_autorizado=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0)  && ($funcao<>"Mecanico") ){ ?>
			<?
				if($rdo_autorizado=="sim"){

				include("paginas_a_chamar/rdo.php");
				} }
			?>
		</div>
		<? } ?>
				
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($estoque_autorizado=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) && ($funcao<>"Mecanico") ){ ?>
			<?
				if($estoque_autorizado=="sim"){

				include("paginas_a_chamar/estoque.php");
				} }
			?>
		</div>
		<? } ?>
				
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($conciliacoes_autorizado=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0)  && ($funcao<>"Mecanico") ){ ?>
			<?
				if($conciliacoes_autorizado=="sim"){

				include("paginas_a_chamar/conciliacoes.php");
				} }
			?>
		</div>
		<? } ?>
				
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($fornecedores=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0)  && ($funcao<>"Mecanico") ){ ?>
			<?
				if($fornecedores=="sim"){

				include("paginas_a_chamar/fornecedores.php");
				} }
			?>
		</div>
		<? } ?>
				
		<? if(($abrir_e_fechar_cx=="nao") && ($funcao<>"Mecanico") ){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if(($abrir_e_fechar_cx=="sim") && ($funcao<>"Mecanico") ){
if($registro_de_fechamento_data_de_ontem_obtida==0) {
	
	 include("paginas_a_chamar/fecharcaixa.php"); 
}else{
	if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ include("paginas_a_chamar/fecharcaixa.php"); } 
}
	}

 ?>
		</div>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($controlekm_autorizado=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0)  && ($funcao<>"Mecanico") ){ ?>
			<?
				if($controlekm_autorizado=="sim"){

				include("paginas_a_chamar/controlekm.php");
				} }
			?>
		</div>
		<? } ?>
				
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($permissao_categoria_de_produtos=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) && ($funcao<>"Mecanico") ){ ?>
			<?
				if($permissao_categoria_de_produtos=="sim"){

				include("paginas_a_chamar/permissao_categoria_de_produtos.php");
				} }
			?>
		</div>
		<? } ?>
				
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($registrodeoperadores=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) && ($funcao<>"Mecanico") ){ ?>
			<?
				if($registrodeoperadores=="sim"){

				include("paginas_a_chamar/registrodeoperadores.php");
				} }
			?>
		</div>
		<? } ?>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>		
		<? if($despesas_autorizado=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) && ($funcao<>"Mecanico") ){ ?>
			<?
				if($despesas_autorizado=="sim"){

				include("paginas_a_chamar/despesas.php");
				} }
			?>
		</div>
		<? } ?>
				
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($financeiro=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0)  && ($funcao<>"Mecanico") ){ ?>
			<?
				if($financeiro=="sim"){

				include("paginas_a_chamar/financeiro.php");
				} }
			?>
		</div>
		<? } ?>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($categoria_despesas=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
			<?
				if($categoria_despesas=="sim"){

				include("paginas_a_chamar/categoria_despesas.php");
				} }
			?>
		</div>
		<? } ?>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($cadastro_de_contas_bancarias=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
			<?
				if($cadastro_de_contas_bancarias=="sim"){

				include("paginas_a_chamar/cadastro_de_contas_bancarias.php");
				} }
			?>
		</div>
		<? } ?>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($aliquotas_dos_cartoes=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
			<?
				if($aliquotas_dos_cartoes=="sim"){

				include("paginas_a_chamar/aliquotas_dos_cartoes.php");
				} }
			?>
		</div>
		<? } ?>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($retira_itens_do_orcamento=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
			<?
				if($retira_itens_do_orcamento=="sim"){

				include("paginas_a_chamar/retira_itens_do_orcamento.php");
				} }
			?>
		</div>
		<? } ?>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($vendas=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
			<?
				if($vendas=="sim"){

				include("paginas_a_chamar/vendas_periodico.php");
				} }
			?>
		</div>
		<? } ?>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($custo_fixo=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
			<?
				if($custo_fixo=="sim"){

				include("paginas_a_chamar/custo_fixo.php");
				} }
			?>
		</div>
		<? } ?>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($responder_transferencias_de_estoque=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
			<?
				if($responder_transferencias_de_estoque=="sim"){

				include("paginas_a_chamar/responder_transferencia_de_estoque.php");
				} }
			?>
		</div>
		<? } ?>
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>
		<? if($visualiza_transferencia=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
			<?
				if($visualiza_transferencia=="sim"){

				include("paginas_a_chamar/visualiza_transferencia.php");
				} }
			?>
		</div>
		<? } ?>
		
		
		<? if($registro_de_fechamento_data_de_ontem_obtida==0){}else{ ?>		
		<? if($relatoriodecomissao=="nao"){ ?><div class="bloco_botoes" style="display: none;">
		<? } else{ ?>	<div class="bloco_botoes"><? } ?>
			<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
			<?
				if($relatoriodecomissao=="sim"){

				include("paginas_a_chamar/relatoriodecomissao.php");
				} }
			?>
		</div>
		<p>
  <? } ?>
		  
		  
		  
		  
		  
  </section>
</p>
		<table width="100%" border="0">
		  <tbody>
		    <tr>
		      <th width="25%" scope="col">&nbsp;</th>
		      <th width="32%" scope="col">&nbsp;</th>
		      <th width="43%" scope="col">&nbsp;</th>
	        </tr>
		    <tr>
		      <th scope="row">&nbsp;</th>
		      <td>&nbsp;</td>
		      <td>&nbsp;</td>
	        </tr>
	      </tbody>
</table>
		<p>&nbsp; </p>
<table width="100%"  border="0">

  <tr>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td>
		<div id="aberturadecaixa" class="modal" role="dialog" style="overflow:  width: 200px; height: 200px; border:solid 0px">
  <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
		<form action="index.php" method="post" name="form2" id="form6">
      <div align="center">
        <?
		if($solicitacao=="abrircaixa"){

         echo "<br>R$
          <input class='class01' name='valor' type='text' id='valor' value='1.00' size='10' maxlength='10'><br>";
		  
		}
		  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao_gravar_abertura_caixa" type="hidden" id="solicitacao_gravar_abertura_caixa" value="gravaraberturacaixa" />
        <input name="departamento" type="hidden" id="departamento" value="<? echo $estab_pertence; ?>" />
        <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>" />
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>" />
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>" />
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>" />
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>" />
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>" />
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>" />
        <input name="historico" type="hidden" id="historico" value="<? echo "Abertura de Caixa"; ?>" />
        <input name="categoria_conta" type="hidden" id="categoria_conta" value="<? echo "Abertura de Caixa"; ?>" />
       

        <?

if($solicitacao=="abrircaixa"){

printf('<br><input class="class01" type=image src="../imagens_botoes/ok.png" width="100" height="100" name="Submit" value="Abrir Caixa">');

				}

				

?>
      </div>
    </form>
	  </DIV>
    </td>
    <td width="14%"></td>
    <td width="18%">
		<div id="fecharcaixa" class="modal" role="dialog" style="overflow:  width: 350px; height: 200px; border:solid 0px">
  <a href="#fechar" title="Fechar" class="fechar"><b></b></a>
		<table width="100%" border="0">
      <tbody>
        
        <tr>
          <td colspan="2" align="center" class="style1">
           <b> <? 
$fechamentodecaixa = $_POST['fechamentodecaixa'];
	  
	  if( ($fechamentodecaixa=="fechar caixa") && ($registro_de_fechamento==0) ){ echo "<br>Tem Certeza que deseja fechar o Caixa?<br><br>"; } ?></b></td>
          </tr>
        <tr>
          <td><form action="index.php" method="post" name="form2" id="form2">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if( ($fechamentodecaixa=="fechar caixa") && ($registro_de_fechamento==0) ){ echo "<input class='class01' type=image src='../imagens_botoes/nao.jpeg' width='100' height='100' name='Submit5' value='Nao'>"; } ?>
        </div>
      </form></td>
          <td width="45%"><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <input name="solicitacao_gravar_fechamento_caixa" type="hidden" id="solicitacao_gravar_fechamento_caixa" value="gravarfechamentocaixa">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if( ($fechamentodecaixa=="fechar caixa") && ($registro_de_fechamento==0) ){ echo "<input class='class01' type=image src='../imagens_botoes/sim.png' width='100' height='100' name='Submit5' value='Sim'>"; } ?>
        </div>
    </form></td>
        </tr>
      </tbody>
    </table>
	  </div>
	</td>
    <td colspan="2" align="center"></td>
    <td><div id="balancete_geral" class="modal" role="dialog" style="overflow:  width: 350px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b></b>X</a>
      <table width="100%" border="0">
        <tbody>
          <tr>
            <td colspan="4" class="style1"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
              <?
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$anoposterior = bcadd($ano,1);
$anoanterior = bcsub($ano,1);
	
if($solicitacao=="balancete_geral"){

//echo "<form action='balencete_geral.php' method='post' enctype='multipart/form-data' name='form1'>
echo "<form action='financeiro/relatorios/dre_periodico.php' method='post' target='_blank' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='3'><div align='center'><span class='style5'> Verificar produ&ccedil;&atilde;o periodica GERAL</span></div></td>

    </tr>

    <tr>

      <td width='66%' colspan='2'><div align='center'><strong>
	  
	  <span class='style5'>$estab_pertence</span>
	  <input name='nfantasia' type='hidden' id='nfantasia' value='$estab_pertence'><br>";

echo "</strong>De

        <select class='class02' name='dia_inicial' id='select3'>
<option selected>01</option>
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
<option>31</option>";
        



        echo "</select>

        <select class='class02' name='mes_inicial' id='select4'>

		<option selected>$mes</option>

          
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
<option>12</option>";



        echo "</select>

        <select class='class02' name='ano_inicial' id='select5'>

		<option selected>$ano</option>

          
<option>$anoanterior</option>
<option>$anoposterior</option>";



        echo "</select> 

        at&eacute; 

        <select class='class02' name='dia_final' id='select11'>

          
<option selected>31</option>
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
<option>01</option>";



       echo "</select>

        <select class='class02' name='mes_final' id='select12'>

		<option selected>$mes</option>

          
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
<option>12</option>";



        echo "</select>

        <select class='class02' name='ano_final' id='select13'>

		<option selected>$ano</option>

          
<option>$anoanterior</option>
<option>$anoposterior</option>";



        echo "</select></div>

      </td>

    </tr>

    <tr>
	<td colspan='3'><div align='center'>";
	  

          echo "<input class='class01' type='submit' name='Submit523222' value=' Gerar D.R.E'>
</div>
      </td>

    </tr>

  </table>

</form>";

}

?></td>
          </tr>
          <tr>
            <td width="27%" align="center"><form action="financeiro/contas_a_receber/verifica_contas_a_receber_por_periodo.php" method="post" name="form2" target="_blank" class="style3" id="form2">
                  <strong>
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <input class='class01' type=image src="../imagens/botoes/receber_baixa.png" width="50" height="50" name="submit4" id="submit4" value="Cupom"><br>
                  <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo "$estab_pertence"; ?>">
              <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "01"; ?>">
              <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes"; ?>">
              Contas a receber<br>
              (Baixa)
              <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano"; ?>">
              </span> <span class="style7">
              <input name="dia_final" type="hidden" id="dia_final" value="<? echo "31"; ?>">
              <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes"; ?>">
              <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano"; ?>">
              
              <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "baixa_de_a_receber"; ?>">
                  </strong>
            </form></td>
            <td width="26%" align="center"><form action="financeiro/relatorios/dre_periodico_contas_a_receber_detalhamento_analitico.php" method="post" name="form2" target="_blank" class="style3" id="form2">
                  <strong>
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <input class='class01' type=image src="../imagens/botoes/receber.png" width="50" height="50" name="submit4" id="submit4" value="Cupom"><br>
                  <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo "$estab_pertence"; ?>">
              <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "01"; ?>">
              <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes"; ?>">
              Contas a receber<br>(Relatorio)
              <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano"; ?>">
              </span> <span class="style7">
              <input name="dia_final" type="hidden" id="dia_final" value="<? echo "31"; ?>">
              <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes"; ?>">
              <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano"; ?>">
              
              <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "receber_detalhamento_analitico"; ?>">
                  </strong>
            </form></td>
            <td width="22%" align="center"><form action="index.php#contas_a_pagar" method="post" name="modo_do_pagamento" class="style3">
              <strong>
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
               <font color="#0000FF">
                <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                
                  <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                  </font>
                <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                 <font color="#0000FF">
                  <input name="solicitacao" type="hidden" id="solicitacao">
                  <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                  <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                  </font>
              <input class='class01' type=image src="../imagens/botoes/contas_a_pagar_1_1.png" width="50" height="50" name="submit3" id="submit3" value="Cupom">
              <br>
              Contas a pagar<br>(Lançamentos)
              </strong>
            </form></td>
            <td width="25%" align="center"><form action="financeiro/contas_a_pagar/menu.php" method="post" name="modo_do_pagamento" target="_blank" class="style3">
              <strong>
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
               <font color="#0000FF">
                <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                
                  <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                  </font>
                <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                 <font color="#0000FF">
                  <input name="solicitacao" type="hidden" id="solicitacao">
                  <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                  <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                  </font>
              <input class='class01' type=image src="../imagens/botoes/contas_a_pagar_2.png" width="50" height="50" name="submit3" id="submit3" value="Cupom">
              <br>
              Contas a pagar<br>
              (Edi&ccedil;&atilde;o e Baixa)
              </strong>
            </form></td>
          </tr>
          <tr>
            <td align="center"><form action="financeiro/recebidas/verifica_contas_recebidas_por_periodo.php" method="post" name="form2" target="_blank" class="style3" id="form2">
                  <strong>
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <input class='class01' type=image src="../imagens/botoes/contas_reebidas.png" width="50" height="50" name="submit4" id="submit4" value="Cupom"><br>
                  <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo "$estab_pertence"; ?>">
              <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "01"; ?>">
              <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes"; ?>">
              Contas Recebidas
              <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano"; ?>">
              </span> <span class="style7">
              <input name="dia_final" type="hidden" id="dia_final" value="<? echo "31"; ?>">
              <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes"; ?>">
              <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano"; ?>">
              
              <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "contasrecebidas"; ?>">
                  </strong>
            </form></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center"><form action="financeiro/pagas/verifica_contas_pagas_por_periodo.php" method="post" name="modo_do_pagamento" target="_blank" class="style3">
              <strong>
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
               <font color="#0000FF">
                <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "01"; ?>">
              <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes"; ?>">
              <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano"; ?>">
              </span> <span class="style7">
              <input name="dia_final" type="hidden" id="dia_final" value="<? echo "31"; ?>">
              <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes"; ?>">
              <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano"; ?>">
                 <font color="#0000FF">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="contaspagas">
                  
                  </font>
              <input class='class01' type=image src="../imagens/botoes/contas_a_pagar_3.png" width="50" height="50" name="submit3" id="submit3" value="Cupom">
              <br>
              Contas pagas
              </strong>
            </form></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center"></td>
          </tr>
        </tbody>
      </table>
    </div></td>
	  
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td><div id="contas_a_pagar" class="modal2" role="dialog" style="overflow:  width: 2000px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b></b>X</a>
      <table width="100%" border="0">
        <tbody>
          <tr>
            <td align="center" class="style1"><p align="center" class="style1">Aten&ccedil;&atilde;o! <span class="style2"> <? echo $operador; ?> <span class="style31">... <span class="style4">Voc&ecirc; est&aacute; registrando uma obriga&ccedil;&atilde;o no contas a pagar..... </span></span></span></p>
              <p align="center" class="style1"><span class="style2"><span class="style31"><span class="style4">Verifique atentamente se os dados est&atilde;o corretos e fa&ccedil;a as observa&ccedil;&otilde;es necess&aacute;rias! </span></span></span></p></td>
          </tr>
          <tr>
            <td>
			  <form name="form2" method="post" action="index.php#grava_contas_a_pagar">

  <table width="100%"  border="0">

    <tr>

      <td width="20%" align="right"><span class="style3">Empresa</span></td>

      <td width="26%"><span class="style3">
        <select class="class02" name="empresa" id="empresa">
          
          <?

    $sql = "select * from estabelecimentos where nfantasia = '$estab_pertence' order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
          
        </select>
      </span></td>

      <td width="15%" align="right"><span class="style3">N&ordm; Doc</span></td>

      <td width="35%"><span class="style3">
        <input class="class02" name="num_doc" type="text" id="num_doc">
      </span></td>

    </tr>

    <tr>
      <td align="right"><span class="style3">Data do Evento</span></td>
      <td><span class="style3">
        <select class="class02" name="dia_evento" id="dia_evento">
          <option selected><? echo $dia; ?></option>
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
        <select class="class02" name="mes_evento" id="mes_evento">
          <option selected><? echo $mes; ?></option>
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
        <select class="class02"  name="ano_evento" id="ano_evento">		 
          
          <option>
            <? $ano_anterior = bcsub($ano,1); echo $ano_anterior; ?>
            </option>
          <option selected><? echo $ano; ?></option>
          <option>
            <? $ano_posterior = bcadd($ano,1); echo $ano_posterior; ?>
            </option>
        </select>
      </span></td>
      <td align="right"><span class="style3">Horario do Evento</span></td>
      <td><span class="style3">
        <select class="class02" name="hora_evento" id="hora_evento">
          <option selected></option>
          <option>00</option>
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
        </select>
        <select class="class02" name="minuto_evento" id="minuto_evento">
          <option selected></option>
          <option>00</option>
          <option>05</option>
          <option>10</option>
          <option>15</option>
          <option>20</option>
          <option>25</option>
          <option>30</option>
          <option>35</option>
          <option>40</option>
          <option>45</option>
          <option>50</option>
          <option>55</option>
        </select>
        <select class="class02" name="segundo_evento" id="segundo_evento">
          <option selected></option>
          <option>00</option>
          <option>05</option>
          <option>10</option>
          <option>15</option>
          <option>20</option>
          <option>25</option>
          <option>30</option>
          <option>35</option>
          <option>40</option>
          <option>45</option>
          <option>50</option>
          <option>55</option>
        </select>
      </span></td>
    </tr>
    <tr>
      <td align="right"><span class="style3">Categoria despesa</span></td>
      <td><span class="style3">
        <select class="class02"  name="categoria_conta" id="categoria_conta">
          <option selected></option>
          <?





    $sql = "select * from categorias_despesas order by categoria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['categoria']."</option>";

    }

?>
        </select>
      </span></td>
      <td align="right"><span class="style3">Departamento</span></td>
      <td><span class="style3">
        <select class="class02" name="departamento" id="departamento">
          <?

$sql = "select * from estabelecimentos where nfantasia = '$estab_pertence' order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
        </select>
      </span></td>
    </tr>
    <tr>

      <td align="right"><span class="style3">Valor</span></td>

      <td><span class="style3">
        <input class="class02" name="valor" type="text" id="valor">
      </span></td>

      <td align="right"><span class="style3">Fornecedor</span></td>

      <td><span class="style3">
        <select class="class02" name="fornecedor" id="fornecedor">
          <option selected></option>
          <?





    $sql = "select * from fornecedores where estab_pertence = '$estab_pertence'  order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
        </select>
      </span></td>

    </tr>

    <tr>

      <td align="right"><span class="style3">Historico</span></td>

      <td rowspan="4"><span class="style3">
        <textarea class="class02" name="historico" cols="40" rows="6" id="historico"></textarea>
      </span></td>

      <td align="right" valign="top"><span class="style3">Modo Pagto </span></td>

      <td valign="top"><span class="style3">
        <select class="class02" name="modopagto" id="modopagto">
          
          <option selected></option>
          
          <?





    $sql = "select * from modo_pagto order by modopagto asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['modopagto']."</option>";

    }

?>
          
        </select>
      </span></td>

    </tr>

    <tr>

      <td align="right">&nbsp;</td>

      <td align="right" valign="top"><span class="style3">N&ordm; Cheque </span></td>

      <td valign="top"><span class="style3">
        <input class="class02" name="num_cheque" type="text" id="num_cheque">
      </span></td>

    </tr>

    <tr>

      <td rowspan="2" align="right">&nbsp;</td>

      <td align="right" valign="top"><span class="style3">Banco</span></td>

      <td valign="top"><span class="style3">
        <select class="class02" name="banco" id="banco">
          <option selected></option>
          <?





    $sql = "select * from contas_bancarias group by banco order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>
        </select>
      </span></td>

    </tr>

    <tr>

      <td align="right" valign="top"><span class="style3">Conta</span></td>

      <td valign="top"><span class="style3">
        <select class="class02" name="contacorrente" id="contacorrente">
          <option selected></option>
          <?





    $sql = "select * from contas_bancarias order by contacorrente asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['contacorrente']."</option>";

    }

?>
        </select>
      </span></td>

    </tr>

    <tr>

      <td colspan="2" align="center">        <span class="style3">
        <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>">

        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">

        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">

        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>">

        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>">

        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>">

        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>">

      <input class="class01" type="submit" name="Submit" value="Salvar">
      </span></td>

      <td align="right"><span class="style3">Vencimento</span></td>

      <td><span class="style3">
        <select class="class02" name="dia_vencto" id="dia_vencto">
          <option selected><? echo $dia; ?></option>
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
        <select class="class02" name="mes_vencto" id="mes_vencto">
          <option selected><? echo $mes; ?></option>
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
        <select class="class02" name="ano_vencto" id="ano_vencto">
          <?
		
		 $ano_atual = date('Y'); 
		
		 
		 ?>
          <option>
            <? $ano_anterior = bcsub($ano_atual,1); echo $ano_anterior; ?>
            </option>
          <option selected><? echo $ano_atual; ?></option>
          <option>
            <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
            </option>
        </select>
      </span></td>

    </tr>

  </table>

</form>
			  
			  
			  </td>
            </tr>
        </tbody>
      </table>
    </div></td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="14%">&nbsp;</td>

    <td width="12%">&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td><div id="grava_contas_a_pagar" class="modal" role="dialog" style="overflow:  width: 350px; height: 200px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b></b>X</a>
      <table width="100%" border="0">
        <tbody>
          <tr>
            <td colspan="2" align="center" class="style1"><?

$dia = date('d');
$mes = date('m');
$ano = date('Y');
$datacadastro = date('Y-m-d');
$horacadastro = date('H:i:s');
$empresa = $_POST['empresa'];
$historico = $_POST['historico'];
$categoria_conta = $_POST['categoria_conta'];
$valor = $_POST['valor'];
$fornecedor = $_POST['fornecedor'];
$modopagto = $_POST['modopagto'];
$num_cheque = $_POST['num_cheque'];
$num_doc = $_POST['num_doc'];
$departamento = $_POST['departamento'];


$dia_vencto = $_POST['dia_vencto'];
$mes_vencto = $_POST['mes_vencto'];
$ano_vencto = $_POST['ano_vencto'];

$vencto = "$ano_vencto-$mes_vencto-$dia_vencto";



$dia_evento = $_POST['dia_evento'];
$mes_evento = $_POST['mes_evento'];
$ano_evento = $_POST['ano_evento'];

$dateevento = "$ano_evento-$mes_evento-$dia_evento";


$hora_evento = $_POST['hora_evento'];
$minuto_evento = $_POST['minuto_evento'];
$segundo_evento = $_POST['segundo_evento'];


$horaevento = "$hora_evento:$minuto_evento:$segundo_evento";




$banco = $_POST['banco'];
$contacorrente = $_POST['contacorrente'];


$sql = "SELECT * FROM contas_bancarias where banco = '$banco' and contacorrente = '$contacorrente' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$agencia = $linha[2];
$tipoconta = $linha[4];

}


//dados do operador

$operador = $_POST['operador'];
$cel_operador = $_POST['cel_operador'];
$email_operador = $_POST['email_operador'];
$estabelecimento = $_POST['estabelecimento'];
$cidade_estabelecimento = $_POST['cidade_estabelecimento'];
$tel_estabelecimento = $_POST['tel_estabelecimento'];
$email_estabelecimento = $_POST['email_estabelecimento'];



?>

<?

	
$comando = "insert into contas_a_pagar(dia,mes,ano,datacadastro,horacadastro,categoria_conta,historico,valor_a_pagar,vencto,modopagto,empresa,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,quitacao,num_cheque,banco,agencia,contacorrente,tipoconta,dia_evento,mes_evento,ano_evento,dateevento,hora_evento,minuto_evento,segundo_evento,horaevento,dia_vencto,mes_vencto,ano_vencto,fornecedor,departamento,num_doc)
values('$dia_vencto','$mes_vencto','$ano_vencto','$datacadastro','$horacadastro','$categoria_conta','$historico','$valor','$vencto','$modopagto','$empresa','$operador','$cel_operador','$email_operador','$estab_pertence','$cidade_estab_pertence','$telefone_estab_pertence','$email_estab_pertence','Em Aberto','$num_cheque','$banco','$agencia','$contacorrente','$tipoconta','$dia_evento','$mes_evento','$ano_evento','$dateevento','$hora_evento','$minuto_evento','$segundo_evento','$horaevento','$dia_vencto','$mes_vencto','$ano_vencto','$fornecedor','$departamento','$num_doc')";


mysql_query($comando,$conexao) or die("Erro ao registrar no contas a pagar!... Tente novamente");

echo "Conta a pagar registrada com sucesso!<br><br>";


?>
</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td width="45%">&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div></td>

  </tr>

  <tr>
    <td>
		<?
if($solicitacao=="permitirsubcategoria"){
	
$subcategoriapermitida = $_POST['subcategoriapermitida'];
	
$sql = "SELECT * FROM subcategoria_ec where empresaconveniada = '$estab_pertence' and sub_categoria_permitida = '$subcategoriapermitida'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$total_permissoes = mysql_num_rows($res);

}
if($total_permissoes>=1){
	echo "<script>

alert('ATENÇÃO!!!... $subcategoriapermitida JÁ SE ENCONTRA AUTORIZADA!');

</script>";
}
else{
$comando = "insert into subcategoria_ec(empresaconveniada,sub_categoria_permitida)

values('$estab_pertence','$subcategoriapermitida')";
 
mysql_query($comando,$conexao);
	
}
	
}	  
	  
	  
	  
if($solicitacao=="excluirsubcategoria"){
	
$codigosubcategoriaexcluir = $_POST['codigosubcategoriaexcluir'];
	
$comando = "delete from `subcategoria_ec` where `subcategoria_ec`. `codigo` = '$codigosubcategoriaexcluir' limit 1 ";

mysql_query($comando,$conexao);
	
}	  
	  
	  
?>
    </td>
    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>

  </tr>

  <tr>

    <td colspan="5"><p>
      <?
if(($solicitacao=="permitirsubcategoria") or ($solicitacao=="excluirsubcategoria") or ($solicitacao=="abripermissoesdesubcategoria")){ ?>
      </p>
		<div id="permissoes" class="modal" role="dialog" style="overflow: auto; width: 640px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
      <table width="80%" border="0" align="center">
        <tbody>
          <tr>
            <td valign="top">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td width="46%" valign="top"><table width="100%" border="0" align="left">
              <tbody>
                <tr>
                  <th width="55%" bgcolor="#CACACA" scope="col">Sub Categorias dispon&iacute;veis</th>
                  <th width="45%" bgcolor="#CACACA" scope="col">#</th>
                  </tr>
                <?

$sql = "SELECT * FROM sub_categorias order by subcategoria asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigosubcategoria = $linha[0];
$subcategoria = $linha[8];


?>
                <tr>
                  <td bgcolor="#cacaca"><? echo "$subcategoria"; ?></td>
                  <td bgcolor="#cacaca"><form name="form5" method="post" action="index.php#permissoes">
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <input name="subcategoriapermitida" type="hidden" id="subcategoriapermitida" value="<? echo "$subcategoria"; ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="permitirsubcategoria">
                    <input class="class01" type="submit" name="submit" id="submit" value="Permitir">
                    </form></td>
                  </tr>
                <? } ?>
                </tbody>
            </table></td>
            <td width="6%">&nbsp;</td>
            <td width="48%" valign="top"><table width="100%" border="0" align="left">
              <tbody>
                <tr>
                  <th width="55%" bgcolor="#cacaca" scope="col">Sub Categorias permitidas</th>
                  <th width="45%" bgcolor="#cacaca" scope="col">#</th>
                  </tr>
                <?

$sql = "SELECT * FROM subcategoria_ec where empresaconveniada = '$estab_pertence' order by sub_categoria_permitida asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigosubcategoriaexcluir = $linha[0];
$subcategoriapermitida = $linha[2];


?>
                <tr>
                  <td bgcolor="#cacaca"><? echo "$subcategoriapermitida"; ?></td>
                  <td bgcolor="#cacaca"><form name="form5" method="post" action="index.php#permissoes">
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <input name="codigosubcategoriaexcluir" type="hidden" id="codigosubcategoriaexcluir" value="<? echo "$codigosubcategoriaexcluir"; ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="excluirsubcategoria">
                    <input class="class01" type="submit" name="submit2" id="submit2" value="X">
                    </form></td>
                  </tr>
                <? } ?>
                </tbody>
            </table>
		 </td>
          </tr>
        </tbody>
      </table>
	  </div>
    <? } ?></td>

    <td width="15%" colspan="2">&nbsp;</td>
    <td width="23%">&nbsp;</td>

  </tr>

</table>


<p>&nbsp;</p>
	<? } ?>
</body>
	

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>