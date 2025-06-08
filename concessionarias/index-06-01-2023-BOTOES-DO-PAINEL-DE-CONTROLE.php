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
	
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[15];
	
	$estab_pertence = $linha[44];
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
	$despesas = $linha[56];
	$veiculos = $linha[57];
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
	
}	
	
	
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
	
	
	$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$diafechamento = $linha[45];
	
}
	
?>
	
<?
	
if($solicitacao_gravar_fechamento_caixa=="gravarfechamentocaixa"){
	

$datefechamento = date('Y-m-d');
$horafechamento = date('H:i:s');


$sub_valorfechamento = $valor_total_entradas+$total_recebimento_cartoes+$total_recebimento_carteira;
$valorfechamento = bcadd($sub_valorfechamento,0,2);

$saldofechamento = bcsub($valorfechamento,$valor_total_saidas,2);
	
	if($registro_fechamento<=0){

$comando = "insert into cx_fechamento(operador,datefechamento,horafechamento,valorfechamento,valordinheiro,valorcartao,valorcarteira,valorsaidas,saldofechamento,loja,departamento)
values('$operador','$datefechamento','$horafechamento','$valorfechamento','$valor_total_entradas','$total_recebimento_cartoes','$total_recebimento_carteira','$valor_total_saidas','$saldofechamento','$estab_pertence','$estab_pertence')";
mysql_query($comando,$conexao);
		
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

alert("Abertura de caixa registrada com sucesso!!!...\n\n<? echo "R$ $valor"; ?> \n\n<? echo "$nome_operador"; ?> \n\n<? echo "$departamento"; ?> \n\nTenha um òtimo dia de trabalho!");

window.location = "index.php";


</script>


<?

} 
 
?>

	
<?
	
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


//-------------fim do calculo da data de ontem------------

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
	

	
	
<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
	<?
		
		if($registro_de_fechamento==1){
		
		$sql = "SELECT * FROM cx_fechamento where operador = '$operador' and datefechamento = '$datecadastro' order by datefechamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	
$data_de_fechamento = $linha[2];
	$hora_de_fechamento = $linha[3];
	$valor_de_fechamento = $linha[4];
	$valordinheiro_de_fechamento = $linha[5];
	$valorcartao_de_fechamento = $linha[6];
	$valorcarteira_de_fechamento = $linha[7];
	$valorsaidas_de_fechamento = $linha[8];
	$saldo_de_fechamento = $linha[9];



echo "align='center'
CAIXA FECHADO!!!... MOVIMENTO ENCERRADO!!!...<br><br>

Data de Fechamento: $data_de_fechamento Hora de Fechamento: $hora_de_fechamento<br><br>

---Detalhamento do Montante Recebido---<br><br>

DINHEIRO: R$ $valordinheiro_de_fechamento<br>
CARTOES: R$ $valorcartao_de_fechamento<br>
CARTEIRA: R$ $valorcarteira_de_fechamento<br><br>

Total Geral Recebimento R$ $valor_de_fechamento<br><br>

---Total Geral Saidas---<br><br>

SAIDAS: R$ $valorsaidas_de_fechamento<br><br>

---Saldo Geral do Caixa---<br><br>

SALDO R$ $saldo_de_fechamento
";
	
}
			
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

    <td width="19%"><strong>Nome Fantasia </strong></td>

    <td width="20%"><strong>Cidade</strong></td>

    <td width="14%"><strong>Operador</strong></td>
    <td width="14%">Obra</td>

    <td width="19%"><strong>E-Mail</strong></td>

    <td width="14%"><strong>Data</strong></td>

  </tr><br>

  <tr>

    <td><span class="style3"><? echo $estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $cidade_estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $operador; ?></span></td>
    <td><span class="style3"><? echo $obra_operador; ?></span></td>

    <td><span class="style3"><? echo $emailoperador; ?></span></td>

    <td><span class="style3"><? echo "$diasemana $diaatual-$mesatual-$anoatual"; ?></span></td>

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
      <!-- INICIO DO BOTAO PAGSEGURO -->
      <a href="https://pag.ae/7YZjyQHnH/button" target="_blank" title="Pagar com PagSeguro"><img src="//assets.pagseguro.com.br/ps-integration-assets/botoes/pagamentos/205x30-pagar.gif" alt="Pague com PagSeguro - é rápido, grátis e seguro!" /></a>
      <!-- FIM DO BOTAO PAGSEGURO -->
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
          <th width="19%" scope="row"><span style="font-size: 16px">
            <? 
echo "<a href='$img1' target='_blank'><img src='$img1' height='50' border='2' ></a>"; 
				  ?>
            </span></th>
          <td width="12%"><? echo "$diavencto-$mesvencto-$anovencto"; ?></td>
          <td width="12%"><? echo "$statusmensalidade"; ?></td>
          <td width="53%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <form action="index.php" method="post" enctype="multipart/form-data" name="form2">
              <tr>
                <td align="center"><span style="font-size: 16px">
                  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                  <input class="class02" type="file" name="foto1" id="foto1">
                  <input name="codigo" type="hidden" id="codigo" value="<? echo "$codigo"; ?>">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto1">
                  </span><span style="font-weight: bold">
                    <input class='class01' type=image src='../imagens_botoes/ok.png' width='20' height='20' name="Submit11" value="Voltar">
                    </span></td>
              </tr>
            </form>
            </table></td>
          <td width="4%">&nbsp;</td>
        </tr>
        <? } ?>
        </tbody>
    </table></td>
  </tr>

</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
  	<tr>
		<td colspan="7" align="center" class="style5">PAINEL DE CONTROLE</td>
		
    </tr>
	  
	  
	  <?
	
$sql = "SELECT * FROM paineldecontrole order by nomedocampo asc";
$res = mysql_query($sql);
	$reg = 0;
echo "<tr cellpadding='0' cellspacing='0'>";
	?>
    <section>
	  <?
	
while($linha=mysql_fetch_row($res)) {
$reg++;
	
$codigo = $linha[0];
$nomedocampo = $linha[1];
$caminho = $linha[2];
$pagina = $linha[3];

	

	
	
	
	if($nomedocampo=="veiculos"){
		
		if($veiculos = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	if($nomedocampo=="relatoriodecomissao"){
		
		if($relatoriodecomissao = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	if($nomedocampo=="conciliacoes"){
		
		if($conciliacoes = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	if($nomedocampo=="controlekm"){
		
		if($controlekm = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	if($nomedocampo=="despesas"){
		
		if($despesas = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	if($nomedocampo=="estoque"){
		
		if($estoque = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	if($nomedocampo=="abrir_e_fechar_cx"){
		
		if($abrir_e_fechar_cx = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	if($nomedocampo=="financeiro"){
		
		if($financeiro = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	if($nomedocampo=="fornecedores"){
		
		if($fornecedores = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	if($nomedocampo=="permissao_categoria_de_produtos"){
		
		if($permissao_categoria_de_produtos = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	if($nomedocampo=="rdo"){
		
		if($rdo_autorizado = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	if($nomedocampo=="registrodeoperadores"){
		
		if($registrodeoperadores = "sim"){
				
		include("$caminho$pagina");
	}
	
	}
	
	
		
		
	

if($reg==7){
	?>
	</section>	  
	<?
echo "</tr><tr cellpadding='0' cellspacing='0'>";
$reg=0;
}
?>
<? } ?>
	
	
	  </tr>
  </tbody>
</table>
	
	
	

	
	
	

<table width="100%"  border="0">

  <tr>
    <td>&nbsp;</td>
    <td>
		<form action="index.php#aberturadecaixa" method="post" name="form2" id="form4">
      <input name="solicitacao" type="hidden" id="solicitacao" value="abrircaixa" />
      <? 
	if(($abrir_e_fechar_cx=="sim") && ($funcao<>"Mecanico") ){
		
	if(($registro_de_abertura==0) && ($registro_de_fechamento==0) ){ 

echo'<input class="class01" type=image src="../imagens_botoes/registradora.png" width="100" height="100" name="Submit2" value="Abertura de caixa">';
	
}
	}

?>
      </form>
    </td>
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
    <td></td>
    <td>
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
    <td><div id="balancete_geral" class="modal" role="dialog" style="overflow:  width: 350px; height: 200px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b></b>X</a>
      <table width="100%" border="0">
        <tbody>
          <tr>
            <td colspan="2" class="style1"><?

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
            <td>&nbsp;</td>
            <td width="45%">&nbsp;</td>
          </tr>
        </tbody>
      </table>
    </div></td>
	  
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
		 <? 
	
	if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="veiculos/pesquisa.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($veiculos_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/icone-veiculos.png" width="100" height="100" name="Submit" value="Verificar Veiculos">
      <? } ?>
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <input class='class02' name="placa" type="hidden" id="placa">
      <input class='class02' name="localizacao" type="hidden" id="localizacao">
      <input class='class02' name="veiculo" type="hidden" id="veiculo">
    </form>
	  <? } ?>
    </td>
    <td>
		 <? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		 <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
		<form name="form1" method="post" action="rdo/index.php">
		  <?

$senha = $_SESSION['senha'];

?>
		  <?
		if($rdo_autorizado=="sim"){
			?>
		  <input class='class01' type=image src="../imagens/botoes/rdo.png" width="100" height="100" name="Submit4" value="RDO">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
  </form>
	  <? } ?>
    </td>
    <td width="14%">
		 <? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="estoque_pecas/menu.php" >
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($estoque_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/estoque.png" width="100" height="100" name="Submit6" value="ESTOQUE DE PE&Ccedil;AS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
    </td>
    <td width="18%">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="conciliacao/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($conciliacoes_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/conciliacao.png" width="100" height="100" name="Submit3" value="ESTOQUE DE PE&Ccedil;AS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
    </td>
    <td colspan="2" align="center">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="fornecedores/menu.php">
      <strong><font color="#0000FF">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
		if($fornecedores=="sim"){
			?>
        <input class='class01' type=image src="../imagens/botoes/forecedores.png" width="100" height="100" name="Submit8" value="ESTOQUE DE PE&Ccedil;AS">
        <? } ?>
        </font></strong>
    </form>
	  <? } ?>
    </td>
    <td align="center"><form action="index.php#fecharcaixa" method="post" name="form2" id="form10">
        <div align="center">
          <input name="fechamentodecaixa" type="hidden" id="fechamentodecaixa" value="fechar caixa">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($abrir_e_fechar_cx=="sim") && ($funcao<>"Mecanico") ){
	if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ echo "<input class='class01' type=image src='../imagens_botoes/fechamentodecaixa.png' width='100' height='100' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } } ?>
        </div>
    </form>
		
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="controlekm/index.php" >
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($controlekm_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/controlekm.png" width="120" height="100" name="Submit9" value="ESTOQUE DE PE&Ccedil;AS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
    </td>
    <td>
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form3" method="post" action="index.php#permissoes">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
	 <?
		if($permissao_categoria_de_produtos=="sim"){
			?>	
      <input name="solicitacao" type="hidden" id="solicitacao" value="abripermissoesdesubcategoria">
      <input class='class01' type=image src="../imagens/botoes/permissoes.png" width="120" height="100" name="Submit10" value="ESTOQUE DE PE&Ccedil;AS">
    </form><? } ?><? } ?></td>
    <td><? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="operadores/menu.php">
      <?

$senha = $_SESSION['senha'];

?>
      <?
		if($registrodeoperadores=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/registrodeoperador.jpg" width="100" height="100" name="Submit4" value="RDO">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
    <? } ?></td>
    <td>
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="prestacao_contas/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($despesas_autorizado=="sim"){
			?>
      <strong><font color="#0000FF">
      <input class='class01' type=image src="../imagens/botoes/despesas.png" width="100" height="100" name="Submit2" value="ESTOQUE DE PE&Ccedil;AS">
      </font></strong>
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
    </td>
    <td colspan="2" align="center">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="index.php#balancete_geral" target="navegacao">
      <strong><font color="#0000FF">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
		if($financeiro=="sim"){
			?>
        <input class='class01' type=image src="../imagens/botoes/financeiro.png" width="100" height="100" name="Submit7" value="ESTOQUE DE PE&Ccedil;AS">
        <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
        <input name="solicitacao" type="hidden" id="solicitacao" value="balancete_geral">
        <? } ?>
        </font></strong>
        </form>
	  <? } ?>
    </td>
    <td><? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
      <form name="form1" method="post" action="ponto_administracao/menu.php" target="navegacao">
        <strong><font color="#0000FF">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <?
		if($administracartaoponto=="sim"){
			?>
          <input class='class01' type=image src="../imagens/botoes/administracao-ponto.png" width="100" height="100" name="Submit12" value="ESTOQUE DE PE&Ccedil;AS">
          <? } ?>
          </font></strong>
      </form>
    <? } ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="14%">&nbsp;</td>

    <td width="12%">&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td></td>

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