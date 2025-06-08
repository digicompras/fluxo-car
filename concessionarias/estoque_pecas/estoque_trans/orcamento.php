<?php
session_start(); //inicia sessão...
//if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');
?>
<html>

<head>
<title>Movimenta&ccedil;&atilde;o</title>
<meta http-equiv="refresh" content="900" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true): /*Se este dispositivo for portátil, faça/escreva o seguinte */ ?>
Ola! Você está acessando apartir de um dispositivo portátil
<?php else : /* Caso contrário, faça/escreva o seguinte */ ?>
Ola! Você está acessando apartir de um computador normal
<?php endif; ?>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {font-size: 20px;
	font-weight: bold;
	color: #0000FF;
}

.style2 {
	color: #0000FF;
	font-weight: bold;
}
.style3 {font-size: 10px}
.style6 {font-size: 18px; font-weight: bold; }
.style113 {color: #FFFFFF}
-->
</style>

</head>
<?
	
	$ativarconteudo = $_POST['ativarconteudo'];

require '../../../conect/conect.php';
	include '../../../css_menus/modal.css';
	include '../../../css_menus/modal2.css';
	
$solicitacao = $_POST['solicitacao'];
	
	
	
	$item_atualizar = $_POST['item'];
	
//-------------EMPRESA SOLICITADA-------------------	
		
$estab_pertence_solicitado = $_POST['estab_pertence_solicitado'];
	
$sql40 = "select * from operadores where estab_pertence = '$estab_pertence_solicitado' and funcao = 'Gerente' limit 1";
$res40 = mysql_query($sql40);
while($linha=mysql_fetch_row($res40)) {
	
$codigo_operador_solicitado = $linha[0];

$op_solicitado = $linha[1];
	
$cpf_operador_solicitado = $linha[4];
	
$estab_pertence_que_foi_solicitado = $linha[44];


}
	
$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence_que_foi_solicitado' limit 1";	
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$cpf_proprietario = $linha[17];
	$status_empresa_solicitado = $linha[41];
	$diafechamento_solicitado = $linha[45];
	$classificacao_solicitado = $linha[46];

}

	//--------------------------EMPRESA SOLICITADA---------------------
	
	
	
		//$codigo_orcamento = $_POST['codigo_orcamento'];
	
	
	
		$num_fatura = $_POST['num_fatura'];
	$num_fatura_trans = $_POST['num_fatura'];
	//$num_fatura_trans = $_POST['num_fatura_trans'];
	
	
		$estab_pertence_solicitante = $_POST['estab_pertence'];
	//$estab_pertence_solicitante = $_POST['estab_pertence_solicitante'];
	
	
	
	
	
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];



$sql500 = "select * from operadores where senha = '$senha'";
$res600 = mysql_query($sql500);
while($linha=mysql_fetch_row($res600)) {

$nome_operador = $linha[1];
	$operante = $linha[1];
	$operador_solicitante = $linha[1];
	
	$funcao = $linha[43];

$cidade_estab_pertence = $linha[45];

$estab_pertence = $linha[44];
	$estab_pertence_solicitante = $linha[44];
	
	$periodo = $linha[67];
	
}
	
$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence_solicitante' limit 1";	
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


	$status_empresa_solicitante = $linha[41];
	$diafechamento_solicitante = $linha[45];
$diafechamento = $linha[45];
	$classificacao_solicitante = $linha[46];

}

  
	

$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$db = $linha[1];
}
	
	
	
	$referencia_a_receber = $_POST['referencia_a_receber'];
		
	
$condicao = $_POST['condicao'];
$status_a_alterar = $_POST['status_a_alterar'];
	$mecanico = $_POST['mecanico'];
	

$cod_ocorrencia = $_POST['cod_ocorrencia'];
	
	$tipomanutencao = $_POST['tipomanutencao'];
	$km = $_POST['km'];
	$horimetro = $_POST['horimetro'];
	$detalhamento = $_POST['detalhamento'];
	
	$obs_oculta_recebe_informacao = $_POST['obs_oculta'];
	if($obs_oculta_recebe_informacao=="sim"){
	$obs_oculta = $obs_oculta_recebe_informacao;
	}
	else{
		$obs_oculta = "nao";
	}
	
	$valormanutencao = $_POST['valormanutencao'];
	
	$datamanutencao = date('Y-m-d');
$horamanutencao = date('H:i:s');




	
	$datafechamento = date('d-').date('m-').date('Y');
	$datefechamento = date('Y-m-d');
	$diafechamento = date('d');
	$mesfechamento = date('m');
	$anofechamento = date('Y');
	$horafechamento = date('H:i:s');
	

	
if($solicitacao=="mudar"){
	
$comando = "update `$db`.`orcamentos_trans` set `condicao` = '$condicao',`status` = '$status_a_alterar',`cod_ocorrencia` = '$cod_ocorrencia',`mecanico` = '$mecanico' where `orcamentos_trans`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
	
$comando = "update `$db`.`produtos_em_orcamento_trans` set `mecanico` = '$mecanico',`condicao` = '$condicao',`status` = '$status_a_alterar' where `produtos_em_orcamento_trans`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
	
	if(($condicao=="PEDIDO") && ($status_a_alterar=="Finalizado")){
	   
	$comando = "update `$db`.`ocorrencias_trans` set `concessionaria` = '$estab_pertence',`codigo_orcamento` = '$codigo_orcamento',`municipio` = '$cidade_estab_pertence',`agente` = '$nome_operador',`valormanutencao` = '$valormanutencao',`localizacao` = '$cidade_estab_pertence',`statusocorrencia` = 'Finalizada',`visualizacao` = 'sim',`tipomanutencao` = '$tipomanutencao',`km` = '$km',`fornecedor` = '$estab_pertence',`valormanutencao` = '$valormanutencao' where `ocorrencias_trans`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);
		
	}
	else{
		$comando = "update `$db`.`ocorrencias_trans` set `visualizacao` = 'nao' where `ocorrencias_trans`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);
	}
	
}
	
	
if(($condicao=="PEDIDO") && ($status_a_alterar=="Finalizado") && ($solicitacao=="mudar") ){
	
	
$comando = "update `$db`.`orcamentos_trans` set `status_fatura` = 'Finalizado',`condicao` = '$condicao',`status` = '$status_a_alterar',`datefechamento` = '$datefechamento',`datafechamento` = '$datafechamento',`diafechamento` = '$diafechamento',`mesfechamento` = '$mesfechamento',`anofechamento` = '$anofechamento',`horafechamento` = '$horafechamento',`cod_ocorrencia` = '$cod_ocorrencia' where `orcamentos_trans`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
	
$comando = "update `$db`.`produtos_em_orcamento_trans` set `dataorcamento` = '$dataorcamento',`horaorcamento` = '$horaorcamento',`operador` = '$nome_operador',`datafechamento` = '$datefechamento',`horafechamento` = '$horafechamento',`condicao` = '$condicao',`status` = '$status_a_alterar',`datealteracao` = '$datamanutencao',`horaalteracao` = '$horamanutencao',`departamento` = '$estab_pertence' where `produtos_em_orcamento_trans`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
	
$comando = "update `$db`.`faturamento_futuro_trans` set `status_fatura` = 'Finalizado',`horafechamento` = '$horafechamento',`datafechamento` = '$datefechamento',`cod_ocorrencia` = '$cod_ocorrencia' where `faturamento_futuro_trans`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
	

	
		
}

	
	
	
	if($solicitacao=="atualizaquanestoque"){
		
	
	$item_atualizar = $_POST['item_atualizar'];
	$quant_estoque_atualizar = $_POST['quant_estoque_atualizar'];
		$codigo_para_atualizar_estoque = $_POST['codigo_para_atualizar_estoque'];
	
	
}
	

	
if($solicitacao=="detalhamento_obs"){
	
	if(empty($detalhamento)){
		
	}
	else{

$comando = "insert into nfs_manutencao_trans(cod_ocorrencia,num_fatura,codigo_orcamento,nf,fornecedor,veiculo,placa,chassi,renavam,datamanutencao,link_nf,valormanutencao,obs_adicional_da_manutencao,data_adicional,hora_adicional,operador_informante,obs_oculta) 

values('$cod_ocorrencia','$num_fatura','$codigo_orcamento','$nf','$estab_pertence','$veiculo','$placa','$chassi','$renavam','$datamanutencao','$link_nf','$valormanutencao','$detalhamento','$datamanutencao','$horamanutencao','$nome_operador','$obs_oculta')";
mysql_query($comando,$conexao);
		
	}
	
	
$comando = "update `$db`.`orcamentos_trans` set `tipomanutencao` = '$tipomanutencao',`km` = '$km',`horimetro` = '$horimetro' where `orcamentos_trans`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
	
}
	
?>
	
<?

$placa = $_POST['placa'];
$veiculo = $_POST['veiculo'];
	
	
$codigo_orcamento_ret = $_POST['codigo_orcamento_ret'];
$cod_prod_ret = $_POST['cod_prod_ret'];
$num_fatura_ret = $_POST['num_fatura_ret'];
$retirada_de_produto = $_POST['retirada_de_produto'];


		
$cod_gerente = $_POST['cod_gerente'];


$sql = "SELECT * FROM codigo_gerente where codigo = '$cod_gerente' and estab_pertence = '$estab_pertence' and statuscodgerente = 'ativo' limit 1";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	
$gerente_que_autorizou = $linha[1];
$statuscodgerente = $linha[3];


}

//-------ANALISAR-------

//$solicitacao = $_POST['solicitacao'];

//if($solicitacao == "listagem"){
	
//}
//else{
//--------ANALISAR---------
	
$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	
$db = $linha[1];
}
	

if(empty($cod_gerente)){

}
else{
	
if($statuscodgerente == "ativo"){
	
$data_retirado = date('Y-m-d');
$hora_retirado = date('H:i:s');

$codigo_de_retirada = $_POST['codigo_de_retirada'];
	$codigoqueseraretiradodoorcamento = $_POST['codigoqueseraretiradodoorcamento'];
	$quant_a_retirar = $_POST['quant_a_retirar'];
	
$dateautorizacao = $_POST['dateautorizacao'];
$horaautorizacao = $_POST['horaautorizacao'];


$comando = "update `$db`.`pedido_de_retirada_produto_da_fatura_trans` set `statusautorizacao` = 'Autorizado',`dateautorizacao` = '$dateautorizacao',`horaautorizacao` = '$horaautorizacao',`quemautorizou` = '$gerente_que_autorizou',`cod_gerente_utilizado` = '$cod_gerente' where `pedido_de_retirada_produto_da_fatura_trans`. `codigo` = '$codigo_de_retirada' limit 1 ";
mysql_query($comando,$conexao);



$sql3 = "select * from pedido_de_retirada_produto_da_fatura_trans where codigo = '$codigo_de_retirada' order by datepedido desc limit 1";

$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$codigo_de_retirada = $linha[0];
$statusautorizacao = $linha[15];
//$num_fatura_ret = $linha[10];
$codigo_orcamento_ret = $linha[11];
$cod_prod_ret = $linha[12];

}


if($statusautorizacao == "Autorizado"){
	
$sql4 = "SELECT * FROM produtos_em_orcamento_trans where codigo_orcamento = '$codigo_orcamento_ret' and codigoproduto = '$codigoqueseraretiradodoorcamento' and num_fatura = '$num_fatura_ret' limit 1";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$categoria = $linha[19];

$codigo_retirado = $linha[17];
	
$codigo_orcamento_retirado = $linha[1];

$codigo_cliente_retirado = $linha[3];
$nome_retirado = $linha[4];

$codigoproduto_retirado = $linha[17];
$nomeproduto_retirado = $linha[18];
$categoria_retirado = $linha[19];
$quant_retirado = $linha[21];
$preco_retirado = $linha[22];


$total_retirado = $linha[29];
$num_fatura_retirado = $linha[55];
$datafatura_retirado = $linha[57];
$setor_retirado = $linha[106];
$departamento_retirado = $linha[107];


}

	
		
$sql30 = "SELECT * FROM estoque_pecas where codigo = '$codigoqueseraretiradodoorcamento' limit 1";
$res30 = mysql_query($sql30);
while($linha=mysql_fetch_row($res30)) {

$quant_estoque_verificado = $linha[16];

}



$saldo_estoque_da_peca = bcadd($quant_estoque_verificado,$quant_retirado);
	

	
$comando = "delete from `produtos_em_orcamento_trans` where `produtos_em_orcamento_trans`. `codigo_orcamento` = '$codigo_orcamento_ret' and codigoproduto = '$codigoqueseraretiradodoorcamento' and num_fatura = '$num_fatura_ret' limit 1 ";

mysql_query($comando,$conexao);


}

}
else{
?>
<script>

alert("ATEN&Ccedil;&Atilde;O!!!... C&oacute;digo incorreto, procure seu Gerente!\n");


</script>
<?	
}
}
	
	// FIM DE RETIRADA DE PRODUTOS
?>
	


	
<?
	
//-----------calculando data de ontem--------------


$datadehoje = time(); 
$ontem = $datadehoje - (24*3600);
$datadeontem = date('Y-m-d', $ontem);
	
$sql = "SELECT * FROM cx_abertura where operador = '$nome_operador' and departamento = '$estab_pertence' order by dataabertura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$data_do_ultimo_registro_de_abertura_de_caixa = $linha[1];


}

//-------------fim do calculo da data de ontem------------	
	
	
	
?>
	
	






<?
	

	//$num_fatura = $_POST['num_fatura'];

	
	
	
	$additem = $_POST['additem'];
	

	
$celular = $_POST['celular'];
$email = $_POST['email'];

$codigo_cliente = $_POST['codigo_cliente'];
$codigo_orcamento = $_POST['codigo_orcamento'];


$codigo_orcamento_add = $_POST['codigo_orcamento_add'];
$cod_prod_add = $_POST['cod_prod_add'];

$codigo_orcamento_ret = $_POST['codigo_orcamento_ret'];
$cod_prod_ret = $_POST['cod_prod_ret'];



?>




<?
//-------------------INICIO DE RETIRADA DE PRODUTO NO ORÇAMENTO --------------------------

if(empty($cod_prod_ret)){
	
}
else{
	
$sql = "SELECT * FROM produtos_em_orcamento_trans where codigoproduto = '$cod_prod_ret' limit 1";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$categoria = $linha[19];

}






}
	
//-------------------FIM DE RETIRADA DE PRODUTO NO ORÇAMENTO --------------------------

//$diaabertura = date('d');
//$mesabertura = date('m');
//$anoabertura = date('Y');
	
	$datecadastro = date('Y-m-d');


$datecadastroseparada = $datecadastro;

$datecadastroseparada2 = explode("-", $datecadastroseparada);



$anoabertura = $datecadastroseparada2[0];

$mesabertura = $datecadastroseparada2[1];

$diaabertura = $datecadastroseparada2[2];




$horafechamento = $hora_atual;


$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];
	

	
	
	
$dia_referencia = date('d');
$mes_referencia = date('m');
$ano_referencia = date('Y');
	
$datereferencia = "$ano_referencia-$mes_referencia-$dia_referencia";
	
	
if($dia_referencia>$diafechamento_solicitante){
	
$dia_abertura_fatura = date('01');
    $calculamesabertura = bcadd($mes_referencia,1);
	if($calculamesabertura>=13){
$mes_abertura_fatura = "01";
	}
	else{
		if($calculamesabertura<=9){
$mes_abertura_fatura = "0".$calculamesabertura;
		}
		else{
$mes_abertura_fatura = $calculamesabertura;
		}
	}
	if($calculamesabertura>=13){
$ano_abertura_fatura = bcadd($ano_referencia,1);
	}
	else{
$ano_abertura_fatura = $ano_referencia;
	}
$data_abertura_fatura = "$ano_abertura_fatura-$mes_abertura_fatura-$dia_abertura_fatura";
$hora_abertura_fatura = date('H:i:s');
}
else{

$data_abertura_fatura = $datereferencia;

$data_abertura_fatura2 = explode("-", $data_abertura_fatura);

$ano_abertura_fatura = $data_abertura_fatura2[0];

$mes_abertura_fatura = $data_abertura_fatura2[1];

$dia_abertura_fatura = $data_abertura_fatura2[2];
	//$dia_abertura_fatura = date('d');
	//$mes_abertura_fatura = date('m');
	//$ano_abertura_fatura = date('Y');
	$hora_abertura_fatura = date('H:i:s');
}




if($solicitacao=="abrir_orcamento"){
	
$recuar = "../../index.php";
	
		
		
		if($status_empresa_solicitante=="Inativo"){
		
		echo "<script>

alert('ATENÇÃO!!!... EMPRESA $estab_pertence_solicitante INATIVO! MOVIMENTACAO IMPOSSIBILITADA!');
window.location = '$recuar';

</script>";
		
		
	}
	else{
	
if($dia_referencia>$diafechamento_solicitante){
	
	
$sql = "SELECT * FROM faturamento_futuro_trans where loja = '$estab_pertence_solicitante' and status_fatura = 'Aberto' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_fatura_aberta = mysql_num_rows($res);
	
$cod_fatura = $linha[0];
$datefaturamento = $linha[1];
$cod_orcamento_na_fatura = $linha[6];
$qualmes = $linha[3];
$qualano = $linha[4];
	
$estab_pertence_solicitado = $linha[64];
	$classificacao_solicitado = $linha[65];
	$operador_solicitado = $linha[66];
	
}
	

	
if(($registros_fatura_aberta>=1) && ($qualmes<>$mes_abertura_fatura) && ($qualano==$ano_abertura_fatura) ){
	

//$comando = "update `$db`.`faturamento_futuro_trans` set `status_fatura` = 'Finalizado' where `faturamento_futuro_trans`. `num_fatura` = '$cod_fatura' limit 1 ";
//mysql_query($comando,$conexao);
	
//$comando = "update `$db`.`orcamentos_trans` set `status_fatura` = 'Finalizado',`status` = 'Finalizado',`status_conta` = 'Finalizado' where `orcamentos_trans`. `num_fatura` = '$cod_fatura' limit 1 ";
//mysql_query($comando,$conexao);
	
	
	
$comando = "insert into faturamento_futuro_trans(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,departamento,cliente,cpf,comanda_utilizada,empresaconveniada,nomedofuncionario,status_conta,estab_pertence_solicitado,classificacao_solicitado,operador_solicitado)

values('$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','Aberto','$estab_pertence_solicitante','$operador_solicitante','$estab_pertence_solicitante','$nome','$cpfdocliente','$comandadofuncionario','$estab_pertence_solicitante','$nomedofuncionario','Aberto','$estab_pertence_solicitado','$classificacao_solicitado','$operador_solicitado')";
mysql_query($comando,$conexao);

	
}
else{
	
$comando = "insert into faturamento_futuro_trans(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,departamento,cliente,cpf,comanda_utilizada,empresaconveniada,nomedofuncionario,status_conta,estab_pertence_solicitado,classificacao_solicitado,operador_solicitado)

values('$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','Aberto','$estab_pertence_solicitante','$operador_solicitante','$estab_pertence_solicitante','$nome','$cpfdocliente','$comandadofuncionario','$estab_pertence_solicitante','$nomedofuncionario','Aberto','$estab_pertence_solicitado','$classificacao_solicitado','$operador_solicitado')";
mysql_query($comando,$conexao);
	
	
$sql6 = "SELECT * FROM faturamento_futuro_trans where loja = '$estab_pertence_solicitante' and status_fatura = 'Aberto' order by num_fatura desc limit 1";
$res6 = mysql_query($sql6);
while($linha=mysql_fetch_row($res6)) {
$registros_fatura = mysql_num_rows($res6);
	
$cod_orcamento_na_fatura = $linha[6];
$qualmes = $linha[3];
$qualano = $linha[4];
$modopagto = $linha[19];
	$estab_pertence_solicitado = $linha[64];
	$classificacao_solicitado = $linha[65];
	$operador_solicitado = $linha[66];

}		
		
		
		
		
	}
	
	
}
else{
	
	
	
$sql = "SELECT * FROM faturamento_futuro_trans where loja = '$estab_pertence_solicitante' and status_fatura = 'Aberto'order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_fatura_aberta = mysql_num_rows($res);
	
$cod_fatura = $linha[0];
$cod_orcamento_na_fatura = $linha[6];
$qualmes = $linha[3];
$qualano = $linha[4];
	$modopagto = $linha[19];
	$estab_pertence_solicitado = $linha[64];
	$classificacao_solicitado = $linha[65];
	$operador_solicitado = $linha[66];

}
	
//$comando = "update `$db`.`faturamento_futuro_trans` set `status_fatura` = 'Finalizado' where `faturamento_futuro_trans`. `num_fatura` = '$cod_fatura' limit 1 ";
//mysql_query($comando,$conexao);
	
//$comando = "update `$db`.`orcamentos_trans` set `status_fatura` = 'Finalizado',`status` = 'Finalizado',`status_conta` = 'Finalizado' where `orcamentos_trans`. `num_fatura` = '$cod_fatura' limit 1 ";
//mysql_query($comando,$conexao);
	
	
	
$comando = "insert into faturamento_futuro_trans(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,departamento,cliente,cpf,comanda_utilizada,empresaconveniada,nomedofuncionario,status_conta,estab_pertence_solicitado,classificacao_solicitado,operador_solicitado)

values('$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','Aberto','$estab_pertence_solicitante','$operador_solicitante','$estab_pertence_solicitante','$nome','$cpfdocliente','$comandadofuncionario','$estab_pertence_solicitante','$nomedofuncionario','Aberto','$estab_pertence_solicitado','$classificacao_solicitado','$operador_solicitado')";
mysql_query($comando,$conexao);
	
	
	

$sql7 = "SELECT * FROM faturamento_futuro_trans where loja = '$estab_pertence_solicitante' and status_fatura = 'Aberto' order by num_fatura desc limit 1";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_fatura = mysql_num_rows($res7);
	
$cod_orcamento_na_fatura = $linha[6];
$qualmes = $linha[3];
$qualano = $linha[4];
	
	$estab_pertence_solicitado = $linha[64];
	$classificacao_solicitado = $linha[65];
	$operador_solicitado = $linha[66];
	

}
	

	
}
	
	
	

//------------ATUALIZANDO orcamentos_trans NA FATURA--------------------------------
	
if($registros_fatura>=1){




$sql8 = "SELECT * FROM faturamento_futuro_trans where loja = '$estab_pertence_solicitante' and status_fatura = 'Aberto' order by num_fatura desc limit 1";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {
	
	
$num_fatura = $linha[0];
$datefaturamento = $linha[1];
$dia_abertura_fatura = $linha[2];
$mes_abertura_fatura = $linha[3];
$ano_abertura_fatura = $linha[4];

$horafaturamento = $linha[5];

$loja = $linha[8];
$operador = $linha[9];

$ultimo_orcamento = $linha[45];
$comanda_utilizada = $linha[46];
	
	$estab_pertence_solicitado = $linha[64];
	$classificacao_solicitado = $linha[65];
	$operador_solicitado = $linha[66];
	


}
}
else{
	
$comando = "insert into faturamento_futuro_trans(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,departamento,cliente,cpf,comanda_utilizada,empresaconveniada,nomedofuncionario,status_conta,estab_pertence_solicitado,classificacao_solicitado,operador_solicitado)

values('$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','Aberto','$estab_pertence_solicitante','$operador_solicitante','$estab_pertence_solicitante','$nome','$cpfdocliente','$comandadofuncionario','$estab_pertence_solicitante','$nomedofuncionario','Aberto','$estab_pertence_solicitado','$classificacao_solicitado','$operador_solicitado')";
mysql_query($comando,$conexao);



	
$sql9 = "SELECT * FROM faturamento_futuro_trans where loja = '$estab_pertence_solicitante' and status_fatura = 'Aberto' order by num_fatura desc limit 1";
$res9 = mysql_query($sql9);
while($linha=mysql_fetch_row($res9)) {
	
	
$num_fatura = $linha[0];
$datefaturamento = $linha[1];
$dia_abertura_fatura = $linha[2];
$mes_abertura_fatura = $linha[3];
$ano_abertura_fatura = $linha[4];

$horafaturamento = $linha[5];

$loja = $linha[8];
$operador = $linha[9];

$cliente_nfe = $linha[22];
$cpf_nfe = $linha[23];

$ultimo_orcamento = $linha[45];
$comanda_utilizada = $linha[46];

$empresaconveniada = $linha[48];
$nomedofuncionario = $linha[49];
	
	$estab_pertence_solicitado = $linha[64];
	$classificacao_solicitado = $linha[65];
	$operador_solicitado = $linha[66];
	
}

}
	
	

	

$sql100 = "SELECT * FROM orcamentos_trans where loja = '$estab_pertence_solicitante' and status = 'Aberto' and num_fatura = '$num_fatura' and status_fatura = 'Aberto' order by codigo_orcamento desc limit 1";
$res100 = mysql_query($sql100);
while($linha=mysql_fetch_row($res100)) {
$registros = mysql_num_rows($res100);
$total_orcamentos_abertos = mysql_num_rows($res100);


$codigo_orcamento = $linha[0];
	
$loja = $linha[43];
$nomesocial = $linha[70];
$emesaconveniada = $linha[53];
$num_fatura = $linha[48];

$placa = $linha[28];
$veiculo = $linha[29];

}



if($total_orcamentos_abertos<=0){
	

	
$dateabertura = date('Y-m-d');
$horaabertura = date('H:i:s');
	
$dateaberturaseparada = $dateabertura;

$dateaberturaseparada2 = explode("-", $dateaberturaseparada);

$anoabertura = $dateaberturaseparada2[0];

$mesabertura = $dateaberturaseparada2[1];

$diaabertura = $dateaberturaseparada2[2];

	
	
//$comanda_utilizada = "$nome";
$comanda_utilizada = "$comandadofuncionario";
	
	
$comando = "insert into orcamentos_trans(condicao,loja,status,operador,dataabertura,horaabertura,diaabertura,mesabertura,anoabertura,codigo_cliente,cpf,nome,num_fatura,status_fatura,status_conta,departamento,comanda_utilizada,empresaconveniada,nomedofuncionario,dia_fatura,mes_fatura,ano_fatura,data_fatura,hora_fatura,placa,veiculo,cpf_proprietario)

values('SOLICITACAO','$estab_pertence_solicitante','Aberto','$operador_solicitante','$data_abertura_fatura','$horaabertura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$codigo_operador_solicitado','$cpf_operador_solicitado','$op_solicitado','$num_fatura','Aberto','Aberto','$estab_pertence_solicitante','$comanda_utilizada','$estab_pertence_que_foi_solicitado','$operador_solicitante','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$datefaturamento','$horafaturamento','$placa','$veiculo','$cpf_proprietario')";
 
mysql_query($comando,$conexao);
	

 

$sql = "SELECT * FROM orcamentos_trans where loja = '$estab_pertence_solicitante' and status = 'Aberto' and num_fatura = '$num_fatura' and status_fatura = 'Aberto' and nome = '$nome' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);
	
	$codigo_orcamento_trans = $linha[0];
	$estab_pertence_solicitante_trans = $linha[43];
	$num_fatua_trans = $linha[48];
	$nome_trans = $linha[46];

$dataorcamento = $linha[1];
$horaorcamento = $linha[2];
	

$codigo_orcamento = $linha[0];
	
$loja = $linha[43];
$nomesocial = $linha[70];
$emesaconveniada = $linha[53];

	
$total_geral_registrado = $linha[7];

$operador = $linha[12];

$status = $linha[17];
$condicao = $linha[16];
	
$placa = $linha[28];
$veiculo = $linha[29];

$tipomanutencao = $linha[37];
$km = $linha[31];
$horimetro = $linha[32];
$detalhamento = $linha[41];

}
	
	
	
$comando = "insert into ocorrencias_trans(datamanutencao,horamanutencao,concessionaria,municipio,tipomanutencao,placa,renavam,chassi,condutor,agente,corveiculo,horimetro,km,valormanutencao,descontar,veiculo,tipoveiculo,numeroveiculo,localizacao,fornecedor,nf,link_nf,operador,reembolso,statusocorrencia,codigo_orcamento,num_fatura,detalhamento,visualizacao) 

values('$datamanutencao','$horamanutencao','$estab_pertence_solicitante','$cidade_estab_pertence','$tipomanutencao','$placa','$renavam','$chassi','$operador_solicitante','$nome','$corveiculo','$horimetro','$km','$valormanutencao','nao','$veiculo','$tipoveiculo','$numeroveiculo','$localizacao','$fornecedor','$nf','$link_nf','$nome_operador','$reembolso','Aberto','$codigo_orcamento','$num_fatura','Solicitacao aberta automaticament atrves do $codigo_orcamento e Controle $num_fatura','nao')";
mysql_query($comando,$conexao);
	
	
	
	
$sql = "SELECT * FROM ocorrencias_trans where concessionaria = '$estab_pertence_solicitante' and num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_da_ocorrencia = $linha[0];
	$codigo_da_ocorrencia_detalhamento = $linha[0];
	$cod_ocorrencia = $linha[0];
	
	
	$comando = "update `$db`.`orcamentos_trans` set `cod_ocorrencia` = '$cod_ocorrencia' where `orcamentos_trans`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
}

}
else{
	
	
$sql = "SELECT * FROM ocorrencias_trans where concessionaria = '$estab_pertence_solicitante' and num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_da_ocorrencia = $linha[0];
	$codigo_da_ocorrencia_detalhamento = $linha[0];
	$cod_ocorrencia = $linha[0];
	
	$comando = "update `$db`.`orcamentos_trans` set `cod_ocorrencia` = '$cod_ocorrencia' where `orcamentos_trans`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
}


$sql = "SELECT * FROM orcamentos_trans where loja = '$estab_pertence_solicitante' and status = 'Aberto' and num_fatura = '$num_fatura' and status_fatura = 'Aberto' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

$dataorcamento = $linha[1];
$horaorcamento = $linha[2];


$codigo_orcamento = $linha[0];
$loja = $linha[43];
$nomesocial = $linha[70];
$emesaconveniada = $linha[53];
$num_fatura = $linha[48];
	
$total_geral_registrado = $linha[7];

$operador = $linha[12];

$condicao = $linha[16];

$status = $linha[17];
	
$placa = $linha[28];
$veiculo = $linha[29];

$tipomanutencao = $linha[37];
$km = $linha[31];
$horimetro = $linha[32];
	$detalhamento = $linha[41];
	
	$cod_ocorrencia = $linha[61];

}
	
	
	

//$comando = "update `$db`.`comandas` set `statuscomanda` = 'OCUPADA',`codigo_orcamento` = '$codigo_orcamento' where `comandas`. `codigo` = '$comandadofuncionario'";
//mysql_query($comando,$conexao);

}



	}



}
	



?>



<?


	
//if($registros==0){
	
//$codigo_orcamento = $codigo_orcamento_zero;

//}
//else{
	
//$codigo_orcamento = $codigo_orcamento_um;

//}
if(empty($additem)){
	
}
else{
	
if($additem=="sim"){


//if($quant_registros_aberto>="1"){
	
$sql = "SELECT * FROM faturamento_futuro_trans where loja = '$estab_pertence_solicitante' and status_fatura = 'Aberto' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	
$num_fatura = $linha[0];
$datefaturamento = $linha[1];
$dia_abertura_fatura = $linha[2];
$mes_abertura_fatura = $linha[3];
$ano_abertura_fatura = $linha[4];

$horafaturamento = $linha[5];

$loja = $linha[8];
$operador = $linha[9];
$modopagto = $linha[19];
$cliente_nfe = $linha[22];
$cpf_nfe = $linha[23];

$ultimo_orcamento = $linha[45];
$comanda_utilizada = $linha[46];

$empresaconveniada = $linha[48];
$nomedofuncionario = $linha[49];
	
	$estab_pertence_solicitado = $linha[64];
	$classificacao_solicitado_ff = $linha[65];
	$operador_solicitado = $linha[66];
}
	
$sql = "SELECT * FROM orcamentos_trans where loja = '$estab_pertence_solicitante' and status = 'Aberto' and num_fatura = '$num_fatura' and status_fatura = 'Aberto' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

$dataorcamento = $linha[5];
$horaorcamento = $linha[6];
	
$codigo_orcamento = $linha[0];
	
	
$loja = $linha[43];
$nomesocial = $linha[70];
$emesaconveniada = $linha[53];
$num_fatura = $linha[48];
$operador = $linha[4];

$condicao = $linha[42];

$status = $linha[2];

$placa = $linha[28];
$veiculo = $linha[29];
	
$tipomanutencao = $linha[37];
$km = $linha[31];
$horimetro = $linha[32];
$detalhamento = $linha[41];
	$mecanico = $linha[62];
	
}
	
	
	
$sql = "SELECT * FROM ocorrencias_trans where concessionaria = '$estab_pertence_solicitante' and num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_da_ocorrencia = $linha[0];
	$codigo_da_ocorrencia_detalhamento = $linha[0];
	$cod_ocorrencia = $linha[0];
}
	
	
	
$item = $_POST['item'];
	$itemservico = $_POST['itemservico'];
$cod_barras = $_POST['cod_barras'];
	
	
	
$sql = "SELECT * FROM estoque_pecas where codigo = '$cod_barras' and estab_pertence = '$estab_pertence_que_foi_solicitado' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$verifica_se_tem_registro = mysql_num_rows($res);
$codigo_do_item_para_inserir_no_orcamento = $linha[11];
	
}
	
	$cod_barrasservico = $_POST['cod_barrasservico'];

$quant = $_POST['quant'];
	$quantservico = $_POST['quantservico'];

if(empty($quant)){

$quantidade = "1";
$quantidadeservico = "1";

}
else{
	
//if(($cod_barras=="1") or (empty($cod_barras_servico)) ){
	
//$quantidade = bcdiv($quant,1000,3);
//$quantidadeservico = bcdiv($quantservico,1000,3);
	
//}
//else{
	
$quantidade = $quant;
$quantidadeservico = $quantservico;
	
//}

}

if((empty($item)) && (empty($cod_barras))){
echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE INFORMAR O CODIGO OU O NOME DO PRODUTO');


</script>";

}
else{
	

if(empty($item)){
	

if($verifica_se_tem_registro<=0){
	
	
	$sql = "SELECT * FROM estoque_pecas where cod_barras = '$cod_barras' and estab_pertence = '$estab_pertence_que_foi_solicitado' limit 1";
}
else{
	
	$sql = "SELECT * FROM estoque_pecas where codigo = '$codigo_do_item_para_inserir_no_orcamento' and estab_pertence = '$estab_pertence_que_foi_solicitado' limit 1";

}
}
else{
	
	
$sql = "SELECT * FROM estoque_pecas where nome_produto = '$item' and estab_pertence = '$estab_pertence_que_foi_solicitado' limit 1";

}

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$referencia = $linha[0];
$foto = $linha[1];
$material = $linha[2];
$cor = $linha[3];
$grupo = $linha[4];
$sub_grupo = $linha[5];
$descricao = $linha[6];
$preco_normal = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$data_hora = $linha[10];
$codigoproduto = $linha[11];
$foto2 = $linha[12];
$foto3 = $linha[13];
$foto4 = $linha[14];
//$codidgo_de_barras_do_produto = $linha[15];
$quant_estoque = $linha[16];
$expedicao = $linha[17];
$quant_disponivel = $linha[18];
$quant_minima = $linha[19];
$aparecer_site = $linha[20];
$preco_compra = $linha[21];
$frete = $linha[22];
$margem_lucro = $linha[23];
$impostos = $linha[24];
$margem_lucro_informada = $linha[25];
$impostos_informado = $linha[26];
$nomeproduto = $linha[27];
$fornecedor = $linha[28];
$travesseiro1 = $linha[29];
$travesseiro2 = $linha[30];


$margem_folga = $linha[32];
$margem_folga_decimal = $linha[33];
	$descontomaximopermitidodoproduto = $linha[34];

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];

$classe = $linha[38];

$comissao = bcdiv($linha[44],100,3);
$estab_pertence = $linha[43];

if($classe=="O"){
	
$departamento_a_gravar = $estab_pertence;

}
else{
	
$departamento_a_gravar = $estab_pertence;
	
}



$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco = $preco_oferta;

}
else{
	
$preco = $preco_normal;
	
}

$total_fornecedor = bcmul($quantidade,$preco_compra,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade,2);

$total = bcmul($quantidade,$preco,2);

	//$comissao = bcdiv($linha[44],100,3);
$base_de_calculo_comissao = bcsub($total,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);


//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($total,$impostos_venda_decimal,2);

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;

$total_impostos_venda = 	bcmul($total,$impostos_venda_decimal,2);


$sql20 = "SELECT * FROM subcategoria_ec where empresaconveniada = '$estab_pertence' and sub_categoria_permitida = '$sub_categoria' limit 1";	
$res20 = mysql_query($sql20);
while($linha=mysql_fetch_row($res20)) {

$sub_categoria_permitida = $linha[2];

}
	

//if($sub_categoria==$sub_categoria_permitida){
	
$datalancamento = date('Y-m-d');
$dialancamento = date('d');
$meslancamento = date('m');
$anolancamento = date('Y');
$horalancamento = date('H:i:s');
	
//if($quantidade<$quant_estoque){
	
//echo "<script>

//alert('ATENÇÃO!!!... QUANTIDADE MENOR QUE ZERO NÃO PERMITIDA!!!...  IMPOSSÍVEL SEGUIR COM A OPERACAO!');
//window.location = 'orcamento.php#atualiza_estoque';

//</script>";
	
//}
//else{
	
	
$sql21 = "SELECT * FROM produtos_em_orcamento_trans where num_fatura = '$num_fatura' and departamento = '$estab_pertence' and codigoproduto = '$codigoproduto' limit 1";
$res21 = mysql_query($sql21);
$registro_produto_no_orcamento = mysql_num_rows($res21);
	
	

//if($sub_categoria=="REFEICAO"){

//if((empty($item)) && (empty($cod_barras))){
//echo "<script>

//alert('ATENÇÃO!!!... VOCÊ DEVE INFORMAR O CODIGO OU O NOME DO PRODUTO');


//</script>";

//}
//else{

//$comando = "insert into produtos_em_orcamento_trans(codigo_orcamento,loja,codigo_cliente,nome,endereco,numero,bairro,cidade,estado,telefone,celular,email,cep,cpf,rg,dataorcamento,horaorcamento,codigoproduto,nomeproduto,categoria,subcategoria,precocompra,quant,preco0,preco1,preco2,preco3,acrescimo,acrescimodecimal,acrescimomonetario,total,operador,descontoetapa0,baseparaproximodesconto0,condicao,status,status_fatura,total_impostos,total_fornecedor,preco_normal,oferta,preco_oferta,margem_lucro,margem_lucro_informado,impostos,impostos_informado,margem_folga,margem_folga_decimal,impostos_compra,impostos_compra_decimal,total_impostos_compra,total_impostos_venda,setor,departamento,dia,mes,ano,num_fatua,data_fatura,dia_fatura,mes_fatura,ano_fatura,hora_fatura,descontomaximopermitidodoproduto)

//values('$codigo_orcamento','$loja','$codigo_cliente','$nome','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf_cliente','$rg','$dataorcamento','$horaorcamento','$codigoproduto','$nomeproduto','$categoria','$sub_categoria','$preco_compra','$quantidade','$preco','0','0','0','0','0','0','$total','$operador','0','$total','$condicao','$status','A FATURAR','$total_impostos','$total_fornecedor','$preco_normal','$oferta','$preco_oferta','$margem_lucro','$margem_lucro_informada','$impostos','$impostos_informado','$margem_folga','$margem_folga_decimal','$impostos_compra','$impostos_compra_decimal','$total_impostos_compra','$total_impostos_venda','$setor','$departamento_a_gravar','$dialancamento','$meslancamento','$anolancamento','$num_fatura','$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','$descontomaximopermitidodoproduto')";
	
	//mysql_query($comando,$conexao);
	

	
//}

//}
//else{

	if($registro_produto_no_orcamento>=1){
		
		
$sql22 = "SELECT * FROM produtos_em_orcamento_trans where num_fatura = '$num_fatura' and departamento = '$estab_pertence' and codigoproduto = '$codigoproduto' limit 1";
$res22 = mysql_query($sql22);
while($linha=mysql_fetch_row($res22)) {

$codigo_do_lancamento_da_compra = $linha[0];
$quant_comprada = $linha[21];
//$preco_comprada = $linha[22];
}
		
	
$atualiza_quantidade = bcadd($quant_comprada,$quantidade);
$atualiza_total_do_item_no_orcamento = bcmul($atualiza_quantidade,$preco,2);
$totalizacao_cmv = bcmul($quant_comprada,$preco_compra,2);		

		
$comando = "update `$db`.`produtos_em_orcamento_trans` set `quant` = '$atualiza_quantidade',`preco0` = '$preco',`total` = '$atualiza_total_do_item_no_orcamento',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv' where `produtos_em_orcamento_trans`. `codigo` = '$codigo_do_lancamento_da_compra' limit 1 ";
mysql_query($comando,$conexao);
		
		
	}
	else{
		
	
	if((empty($item)) && (empty($cod_barras))){
echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE INFORMAR O CODIGO OU O NOME DO PRODUTO');


</script>";

}
else{
	
	
	if($quantidade>$quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE E ISSO NÃO É PERMITIDO!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{
	
	
	$comando = "insert into produtos_em_orcamento_trans(codigo_orcamento,loja,codigo_cliente,nome,endereco,numero,bairro,cidade,estado,telefone,celular,email,cep,cpf,rg,dataorcamento,horaorcamento,codigoproduto,nomeproduto,categoria,subcategoria,precocompra,quant,preco0,preco1,preco2,preco3,acrescimo,acrescimodecimal,acrescimomonetario,total,operador,descontoetapa0,baseparaproximodesconto0,condicao,status,status_fatura,total_impostos,total_fornecedor,preco_normal,oferta,preco_oferta,margem_lucro,margem_lucro_informado,impostos,impostos_informado,margem_folga,margem_folga_decimal,impostos_compra,impostos_compra_decimal,total_impostos_compra,total_impostos_venda,setor,departamento,dia,mes,ano,num_fatura,data_fatura,dia_fatura,mes_fatura,ano_fatura,hora_fatura,descontomaximopermitidodoproduto,totalizacao_cmv,mecanico,comissao)

values('$codigo_orcamento','$estab_pertence','$codigo_cliente','$nome','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf_cliente','$rg','$dataorcamento','$horaorcamento','$codigoproduto','$nomeproduto','$grupo','$sub_grupo','$preco_compra','$quantidade','$preco','0','0','0','0','0','0','$total','$operador','0','$total','$condicao','$status','A FATURAR','$total_impostos','$total_fornecedor','$preco_normal','$oferta','$preco_oferta','$margem_lucro','$margem_lucro_informada','$impostos','$impostos_informado','$margem_folga','$margem_folga_decimal','$impostos_compra','$impostos_compra_decimal','$total_impostos_compra','$total_impostos_venda','$setor','$departamento_a_gravar','$dialancamento','$meslancamento','$anolancamento','$num_fatura','$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','$descontomaximopermitidodoproduto','$totalizacao_cmv','$mecanico','$valor_comissao')";
	
	mysql_query($comando,$conexao);
	
	
		
$saldo_estoque_da_peca = bcsub($quant_estoque,$quantidade);
	

	
//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$referencia'";
//mysql_query($comando,$conexao);
	
	
}
	
	
	

}
	
	}
	
	//}//encerra se não for refeicao
	
//}
	
$sql = "select sum(total) as total_liquido from produtos_em_orcamento_trans where codigo_orcamento = '$codigo_orcamento'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_liquido_produtos = $linha['total_liquido'];


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}
$comando = "update `$db`.`faturamento_futuro_trans` set `total_geral` = '$total_liquido_produtos' where `faturamento_futuro_trans`. `num_fatura` = '$num_fatura' limit 1 ";
mysql_query($comando,$conexao);



	
	
//}
//else{
//echo "<script>

//alert('ATENÇÃO!!!... SUB-CATEGORIA $sub_categoria $sub_categoria_permitida NÃO PERMITIDA POR $estab_pertence_solicitante! IMPOSSIVEL ADICIONAR PRODUTO!');


//</script>";
	
//}








$custo_cmv_etapa1 = bcadd($diferenca_normal_para_oferta_vezes_quantidade,$calculando_impostos,2);

$custo_cmv_etapa2 = bcadd($descontosconcedidos,$totalfornecedor,2);

$totalizacao_cmv = bcadd($custo_cmv_etapa1,$custo_cmv_etapa2,2);






}
	
	
	
	
	
	

}
else{
	
echo "<script>

alert('ATENÇÃO!!!... MOVIMENTO ENCONTRA-SE ENCERRADO! IMPOSSIVEL ADICIONAR PRODUTO!');
window.location = '$voltar';

</script>";

	
}
	
}

?>





<?
 
$obs = $_POST['obs'];		

$cartao = $_POST['cartao'];
$modopagto = $_POST['modopagto'];

$arredondamento = $_POST['arredondamento'];



 
$sql = "select sum(total) as total_liquido from produtos_em_orcamento_trans where codigo_orcamento = '$codigo_orcamento'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_liquido_produtos = $linha['total_liquido'];



if(empty($arredondamento)){
	
//$arred = "0";

$arred = $total_liquido_produtos;
	
}
else{
	
$arred = $arredondamento;	
	
}




if($arred == "0"){
	
$total_geral = bcadd($total_liquido_produtos,0,2);


$desconto_de_arredondamento = "0";

$acrescimo_de_arredondamento ="0";


}


if($arred == $total_liquido_produtos){
	
$total_geral = bcadd($total_liquido_produtos,0,2);


$desconto_de_arredondamento = "0";

$acrescimo_de_arredondamento ="0";


}


if($arred > $total_liquido_produtos){
	
$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo_orcamento = '$codigo_orcamento'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$total_itens = mysql_num_rows($res);

}
	
	
	
$total_geral = bcadd($arred,0,2);


$desconto_de_arredondamento = "0";

$acrescimo_de_arredondamento = bcsub($arred,$total_liquido_produtos,2);

if($acrescimo_de_arredondamento ==0){
	
}
else{

$acrescimo_por_rateio = bcdiv($acrescimo_de_arredondamento,$total_itens,2);

}


$sql2 = "SELECT * FROM produtos_em_orcamento_trans where codigo_orcamento = '$codigo_orcamento'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$codigolancamento = $linha[0];





$sql3 = "select * from db";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento_trans` set `acrescimo_por_rateio` = '$acrescimo_por_rateio',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento'";
}

mysql_query($comando,$conexao);


}



}


if(($arred >"0") && ($arred < $total_liquido_produtos)){
	
$total_geral = bcadd($arred,0,2);


$desconto_de_arredondamento = bcsub($total_liquido_produtos,$arred,2);

$acrescimo_de_arredondamento = "0";












}



     

                   
                    
if(empty($quantparc)){ 

 }
 else{
	 
$entrada = $_POST['entrada'];

$restante_a_pagar = bcsub($total_geral,$entrada,2);
 
$valorparcela = bcdiv($restante_a_pagar,$quantparc,2);


 } 
 
 
 
 
 
 if($valorparcela==""){
	 
}
else{ 


                    
                    
 $sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos_trans` set `entrada` = '$entrada',`status_fatura` = '',`quantparc` = '$quantparc',`modopagto` = '$modopagto',`cartao` = '$cartao',`valorparcela` = '$valorparcela',`total_geral` = '$total_geral',`obs` = '$obs',`desconto_de_arredondamento` = '$desconto_de_arredondamento',`acrescimo_de_arredondamento` = '$acrescimo_de_arredondamento',`departamento` = '$estab_pertence' where `orcamentos_trans`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);


}
                   
                    
                    
?>






<?
 //------------------INICIA A ATIVAÇÃO DE CONTEUDO DA EDIÇÃO DE PRODUTOS NO ORCAMENTO--------------------
	
	if($ativarconteudo=="sim"){
	
//------------------INICIO DE ALTERAÇÃO DOS PRODUTOS NO ORÇAMENTO-------------------------
	
	
$codigolancamento = $_POST['codigolancamento'];
		
$estab_pertence_que_foi_solicitado = $_POST['estab_pertence_solicitado'];
		
$item_atualizar = $_POST['item_atualizar'];

$cod_prod_at = $_POST['cod_prod_at'];

$desconto_at = $_POST['desconto_at'];

$novo_preco = $_POST['novo_preco'];

$acrescimo_at = $_POST['acrescimo_at'];

$quant_at = $_POST['quant_at'];

if(empty($quant_at)){

$quantidade_at = "1";

}
else{

$quantidade_at = $quant_at;

}




$sql = "SELECT * FROM estoque_pecas where estab_pertence = '$estab_pertence_que_foi_solicitado' and codigo = '$cod_prod_at' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$descontomaximo = $linha[34];

}

if($desconto_at>$descontomaximo){

echo "<script>

alert('ATENÇÃO!!!... VOCÊ TENTOU UM DESCONTO MAIOR QUE O PERMITIDO! O LIMITE MAXIMO DE DESCONTO PARA ESSE PRODUTO É $descontomaximo%.');

</script>";

}
else{


//-----------INICIO ETAPA 0-------------------------------

if(empty($desconto_at) or ($desconto_at == 0.00)){
	
	$sql4 = "SELECT * FROM produtos_em_orcamento_trans where codigo = '$codigolancamento' limit 1";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$verificando_quantidade_ja_se_encontra_no_orcamento = $linha[21];
	
}


$sql = "SELECT * FROM estoque_pecas where codigo = '$cod_prod_at' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_normal = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$codigoproduto = $linha[11];
$cod_barras = $linha[15];
$quant_estoque = $linha[16];
	$verifica_quant_estoque = $linha[16];
$quant_disponivel = $linha[18];
$nomeproduto = $linha[27];

$impostos = $linha[24];
$margem_lucro_informada = $linha[25];
$impostos_informado = $linha[26];
$fornecedor = $linha[28];
$preco_compra = $linha[21];


$descontomaximo = $linha[34];
	$descontomaximopermitidodoproduto = $linha[34];

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];
$comissao = bcdiv($linha[44],100,3);

}

$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco_at = $preco_oferta;

}
else{
	
	if($preco_normal==$novo_preco){
		
		$preco_at = $preco_normal;
	}
	else{
	
$preco_at = $novo_preco;
		
	}
	
}



if($desconto_at>$descontomaximo){

echo "<script>

alert('ATENÇÃO!!!... VOCÊ TENTOU UM DESCONTO MAIOR QUE O PERMITIDO! O LIMITE MAXIMO DE DESCONTO PARA ESSE PRODUTO É $descontomaximo%.');

</script>";

}
else{
	
	

$totalsemdesconto_etapa0 = bcmul($preco_at,$quantidade_at,2);


$baseparaproximodesconto0 = $totalsemdesconto_etapa0;


$diferenca_normal_para_oferta = bcsub($preco,$preco_oferta,2); 

//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($totalsemdesconto_etapa0,$impostos_venda_decimal,2);

$total_descontos_concedidos = "0";

$total_fornecedor = bcmul($preco_compra,$quantidade_at,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade_at,2);
	
	
$base_de_calculo_comissao = bcsub($totalsemdesconto_etapa0,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);

if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalsemdesconto_etapa0,$impostos_venda_decimal,2);

}


	
	$subtrai_o_que_ja_tem_do_orcamento = bcsub($quantidade_at,$verificando_quantidade_ja_se_encontra_no_orcamento);
	
	if($subtrai_o_que_ja_tem_do_orcamento>$verifica_quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE $verifica_quant_estoque e no orcamento ja tem $verificando_quantidade_ja_se_encontra_no_orcamento , NÃO É PERMITIDO ADICIONAR $quantidade_at!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{

	
$comando = "update `$db`.`produtos_em_orcamento_trans` set `preco0` = '$preco_at',`preco1` = '0',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa0` = '0',`descontoetapa1` = '0',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa0` = '0',`descontodecimaletapa1` = '0',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa0` = '0',`descontomonetarioetapa1` = '0',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalsemdesconto_etapa0',`baseparaproximodesconto0` = '$baseparaproximodesconto0',`baseparaproximodesconto1` = '0',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv',`comissao` = '$valor_comissao' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento' limit 1 ";

mysql_query($comando,$conexao);
	
	
	if($quantidade_at<$verificando_quantidade_ja_se_encontra_no_orcamento){
		
		$adiciona_o_que_ja_tem_do_orcamento = bcsub($verificando_quantidade_ja_se_encontra_no_orcamento,$quantidade_at);
		
		$saldo_estoque_da_peca = bcadd($verifica_quant_estoque,$adiciona_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	else{
		
		$saldo_estoque_da_peca = bcsub($verifica_quant_estoque,$subtrai_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	
	
	
	
	

}



}


}

//------------------FIM ETAPA 0---------------------------------------



//-----------INICIO ETAPA 1-------------------------------

	
if(($desconto_at >= 0.01) && ($desconto_at <=5)){
	
	$sql4 = "SELECT * FROM produtos_em_orcamento_trans where codigo = '$codigolancamento' limit 1";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$verificando_quantidade_ja_se_encontra_no_orcamento = $linha[21];
	
}
	

$sql = "SELECT * FROM estoque_pecas where codigo = '$cod_prod_at' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_normal = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$codigoproduto = $linha[11];
$cod_barras = $linha[15];
$quant_estoque = $linha[16];
	$verifica_quant_estoque = $linha[16];
$quant_disponivel = $linha[18];
$nomeproduto = $linha[27];

$impostos = $linha[24];
$margem_lucro_informada = $linha[25];
$impostos_informado = $linha[26];
$fornecedor = $linha[28];
$preco_compra = $linha[21];



$descontomaximo1 = $linha[34];
	$descontomaximopermitidodoproduto = $linha[34];

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];
$comissao = bcdiv($linha[44],100,3);

}

$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco_at1 = $preco_oferta;

}
else{
	
if($preco_normal==$novo_preco){
		
		$preco_at1 = $preco_normal;
	}
	else{
	
$preco_at1 = $novo_preco;
		
	}
	
}

if($desconto_at>$descontomaximo1){

echo "<script>

alert('ATENÇÃO!!!... VOCÊ TENTOU UM DESCONTO MAIOR QUE O PERMITIDO! O LIMITE MAXIMO DE DESCONTO PARA ESSE PRODUTO É $descontomaximo1%.');

</script>";

}
else{
	
$descontoetapa1 = $desconto_at;

$descontodecimaletapa1 = bcdiv($descontoetapa1,100,2);

$valordesconto1 = bcmul($preco_at1,$descontodecimaletapa1,2);

$descontomonetarioetapa1 = bcmul($quantidade_at,$valordesconto1,2);



$preco1menosdescontoetapa1 = bcsub($preco_at1,$valordesconto1,2);


$totalcomdesconto_etapa1 = bcmul($preco1menosdescontoetapa1,$quantidade_at,2);


$baseparaproximodesconto1 = $totalcomdesconto_etapa1;


$diferenca_normal_para_oferta = bcsub($preco,$preco_oferta,2); 

//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

$total_descontos_concedidos1 = $descontomonetarioetapa1;

$total_fornecedor = bcmul($preco_compra,$quantidade_at,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade_at,2);
	
	$base_de_calculo_comissao = bcsub($totalcomdesconto_etapa1,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);

if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

}


$subtrai_o_que_ja_tem_do_orcamento = bcsub($quantidade_at,$verificando_quantidade_ja_se_encontra_no_orcamento);
	
	if($subtrai_o_que_ja_tem_do_orcamento>$verifica_quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE $verifica_quant_estoque e no orcamento ja tem $verificando_quantidade_ja_se_encontra_no_orcamento , NÃO É PERMITIDO ADICIONAR $quantidade_at!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{


$comando = "update `$db`.`produtos_em_orcamento_trans` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv',`comissao` = '$valor_comissao' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento' limit 1 ";

mysql_query($comando,$conexao);
	
	
	if($quantidade_at<$verificando_quantidade_ja_se_encontra_no_orcamento){
		
		$adiciona_o_que_ja_tem_do_orcamento = bcsub($verificando_quantidade_ja_se_encontra_no_orcamento,$quantidade_at);
		
		$saldo_estoque_da_peca = bcadd($verifica_quant_estoque,$adiciona_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	else{
		
		$saldo_estoque_da_peca = bcsub($verifica_quant_estoque,$subtrai_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	
}



}



}

//------------------FIM ETAPA 1---------------------------------------


//------------------INICIO ETAPA 2---------------------------------------

if(($desconto_at >=5.01) && ($desconto_at <=10)){

$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$descontoregistradoetapa1 = $linha[68];
	$verificando_quantidade_ja_se_encontra_no_orcamento = $linha[21];

}



$sql = "SELECT * FROM estoque_pecas where codigo = '$cod_prod_at' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_normal = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$codigoproduto = $linha[11];
$cod_barras = $linha[15];
$quant_estoque = $linha[16];
	$verifica_quant_estoque = $linha[16];
$quant_disponivel = $linha[18];
$nomeproduto = $linha[27];

$impostos = $linha[24];
$margem_lucro_informada = $linha[25];
$impostos_informado = $linha[26];
$fornecedor = $linha[28];
$preco_compra = $linha[21];



$descontomaximo1 = $linha[34];
	$descontomaximopermitidodoproduto = $linha[34];

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];
$comissao = bcdiv($linha[44],100,3);

}

$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco_at1 = $preco_oferta;

}
else{
	
if($preco_normal==$novo_preco){
		
		$preco_at1 = $preco_normal;
	}
	else{
	
$preco_at1 = $novo_preco;
		
	}
	
}

if($desconto_at>$descontomaximo1){

echo "<script>

alert('ATENÇÃO!!!... VOCÊ TENTOU UM DESCONTO MAIOR QUE O PERMITIDO! O LIMITE MAXIMO DE DESCONTO PARA ESSE PRODUTO É $descontomaximo1%.');

</script>";

}
else{
	
$descontoetapa1 = $descontoregistradoetapa1;


$descontodecimaletapa1 = bcdiv($descontoetapa1,100,4);

$valordesconto1 = bcmul($preco_at1,$descontodecimaletapa1,2);

$descontomonetarioetapa1 = bcmul($quantidade_at,$valordesconto1,2);



$preco1menosdescontoetapa1 = bcsub($preco_at1,$valordesconto1,2);


$totalcomdesconto_etapa1 = bcmul($preco1menosdescontoetapa1,$quantidade_at,2);


$baseparaproximodesconto1 = $totalcomdesconto_etapa1;


$diferenca_normal_para_oferta = bcsub($preco,$preco_oferta,2); 

//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

$total_descontos_concedidos1 = $descontomonetarioetapa1;

$total_fornecedor = bcmul($preco_compra,$quantidade_at,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade_at,2);
	
	$base_de_calculo_comissao = bcsub($totalcomdesconto_etapa1,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);

if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

}


$subtrai_o_que_ja_tem_do_orcamento = bcsub($quantidade_at,$verificando_quantidade_ja_se_encontra_no_orcamento);
	
	if($subtrai_o_que_ja_tem_do_orcamento>$verifica_quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE $verifica_quant_estoque e no orcamento ja tem $verificando_quantidade_ja_se_encontra_no_orcamento , NÃO É PERMITIDO ADICIONAR $quantidade_at!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{


$comando = "update `$db`.`produtos_em_orcamento_trans` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv',`comissao` = '$valor_comissao' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento' limit 1 ";

mysql_query($comando,$conexao);
	
	
	if($quantidade_at<$verificando_quantidade_ja_se_encontra_no_orcamento){
		
		$adiciona_o_que_ja_tem_do_orcamento = bcsub($verificando_quantidade_ja_se_encontra_no_orcamento,$quantidade_at);
		
		$saldo_estoque_da_peca = bcadd($verifica_quant_estoque,$adiciona_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	else{
		
		$saldo_estoque_da_peca = bcsub($verifica_quant_estoque,$subtrai_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	
	

}



}

//--------------------------------


$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_at1 = $linha[23];

$descontoetapa1 = $linha[68];



}


$descontoetapa2 = bcsub($desconto_at,$descontoetapa1,2);

$descontodecimaletapa2 = bcdiv($descontoetapa2,100,4);

$valordesconto2 = bcmul($preco_at1,$descontodecimaletapa2,2);

$descontomonetarioetapa2 = bcmul($quantidade_at,$valordesconto2,2);



$preco2menosdescontoetapa2 = bcsub($preco_at1,$valordesconto2,2);


$totalcomdesconto_etapa2 = bcmul($preco2menosdescontoetapa2,$quantidade_at,2);


$baseparaproximodesconto2 = $totalcomdesconto_etapa2;



$diferenca_normal_para_oferta = bcsub($preco,$preco_oferta,2); 

//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($totalcomdesconto_etapa2,$impostos_venda_decimal,2);

$total_descontos_concedidos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);

$total_fornecedor = bcmul($preco_compra,$quantidade_at,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade_at,2);
	
	$base_de_calculo_comissao = bcsub($totalcomdesconto_etapa2,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);

if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa2,$impostos_venda_decimal,2);

}



$subtrai_o_que_ja_tem_do_orcamento = bcsub($quantidade_at,$verificando_quantidade_ja_se_encontra_no_orcamento);
	
	if($subtrai_o_que_ja_tem_do_orcamento>$verifica_quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE $verifica_quant_estoque e no orcamento ja tem $verificando_quantidade_ja_se_encontra_no_orcamento , NÃO É PERMITIDO ADICIONAR $quantidade_at!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{

$comando = "update `$db`.`produtos_em_orcamento_trans` set `preco2` = '$preco2menosdescontoetapa2',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa2` = '$descontoetapa2',`descontoetapa3` = '0',`descontodecimaletapa2` = '$descontodecimaletapa2',`descontodecimaletapa3` = '0',`descontomonetarioetapa2` = '$descontomonetarioetapa2',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa2',`baseparaproximodesconto2` = '$baseparaproximodesconto2',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv',`comissao` = '$valor_comissao' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento' limit 1 ";

mysql_query($comando,$conexao);
	
	
	if($quantidade_at<$verificando_quantidade_ja_se_encontra_no_orcamento){
		
		$adiciona_o_que_ja_tem_do_orcamento = bcsub($verificando_quantidade_ja_se_encontra_no_orcamento,$quantidade_at);
		
		$saldo_estoque_da_peca = bcadd($verifica_quant_estoque,$adiciona_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	else{
		
		$saldo_estoque_da_peca = bcsub($verifica_quant_estoque,$subtrai_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	
	

}




}

//------------------FIM ETAPA 2---------------------------------------





//------------------INICIO ETAPA 3---------------------------------------



if(($desconto_at >=10.01) && ($desconto_at <=15)){


$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$descontoregistradoetapa1 = $linha[68];

$descontoregistradoetapa2 = $linha[70];
	
$verificando_quantidade_ja_se_encontra_no_orcamento = $linha[21];

}

$somadosdescontosanteriores = bcadd($descontoregistradoetapa1,$descontoregistradoetapa2,2);


$sql = "SELECT * FROM estoque_pecas where codigo = '$cod_prod_at' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_normal = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$codigoproduto = $linha[11];
$cod_barras = $linha[15];
$quant_estoque = $linha[16];
	$verifica_quant_estoque = $linha[16];
$quant_disponivel = $linha[18];
$nomeproduto = $linha[27];



$impostos = $linha[24];
$margem_lucro_informada = $linha[25];
$impostos_informado = $linha[26];
$fornecedor = $linha[28];
$preco_compra = $linha[21];


$descontomaximo1 = $linha[34];
	$descontomaximopermitidodoproduto = $linha[34];

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];
$comissao = bcdiv($linha[44],100,3);

}

$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco_at1 = $preco_oferta;

}
else{
	
if($preco_normal==$novo_preco){
		
		$preco_at1 = $preco_normal;
	}
	else{
	
$preco_at1 = $novo_preco;
		
	}
	
}

if($desconto_at>$descontomaximo1){

echo "<script>

alert('ATENÇÃO!!!... VOCÊ TENTOU UM DESCONTO MAIOR QUE O PERMITIDO! O LIMITE MAXIMO DE DESCONTO PARA ESSE PRODUTO É $descontomaximo1%.');

</script>";

}
else{
	
$descontoetapa1 = $descontoregistradoetapa1;


$descontodecimaletapa1 = bcdiv($descontoetapa1,100,4);

$valordesconto1 = bcmul($preco_at1,$descontodecimaletapa1,2);

$descontomonetarioetapa1 = bcmul($quantidade_at,$valordesconto1,2);



$preco1menosdescontoetapa1 = bcsub($preco_at1,$valordesconto1,2);


$totalcomdesconto_etapa1 = bcmul($preco1menosdescontoetapa1,$quantidade_at,2);


$baseparaproximodesconto1 = $totalcomdesconto_etapa1;



$diferenca_normal_para_oferta = bcsub($preco,$preco_oferta,2); 

//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

$total_descontos_concedidos1 = $descontomonetarioetapa1;

$total_fornecedor = bcmul($preco_compra,$quantidade_at,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade_at,2);
	
	$base_de_calculo_comissao = bcsub($totalcomdesconto_etapa1,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);

if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

}



$subtrai_o_que_ja_tem_do_orcamento = bcsub($quantidade_at,$verificando_quantidade_ja_se_encontra_no_orcamento);
	
	if($subtrai_o_que_ja_tem_do_orcamento>$verifica_quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE $verifica_quant_estoque e no orcamento ja tem $verificando_quantidade_ja_se_encontra_no_orcamento , NÃO É PERMITIDO ADICIONAR $quantidade_at!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{


$comando = "update `$db`.`produtos_em_orcamento_trans` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv',`comissao` = '$valor_comissao' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento' limit 1 ";

mysql_query($comando,$conexao);
	
	
	if($quantidade_at<$verificando_quantidade_ja_se_encontra_no_orcamento){
		
		$adiciona_o_que_ja_tem_do_orcamento = bcsub($verificando_quantidade_ja_se_encontra_no_orcamento,$quantidade_at);
		
		$saldo_estoque_da_peca = bcadd($verifica_quant_estoque,$adiciona_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	else{
		
		$saldo_estoque_da_peca = bcsub($verifica_quant_estoque,$subtrai_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	
	

}



}

//--------------------------------


$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_at1 = $linha[23];

$descontoetapa1 = $linha[68];


}


$descontoetapa2 = $descontoregistradoetapa2;

$descontodecimaletapa2 = bcdiv($descontoetapa2,100,4);

$valordesconto2 = bcmul($preco_at1,$descontodecimaletapa2,2);

$descontomonetarioetapa2 = bcmul($quantidade_at,$valordesconto2,2);



$preco2menosdescontoetapa2 = bcsub($preco_at1,$valordesconto2,2);


$totalcomdesconto_etapa2 = bcmul($preco2menosdescontoetapa2,$quantidade_at,2);


$baseparaproximodesconto2 = $totalcomdesconto_etapa2;




$diferenca_normal_para_oferta = bcsub($preco,$preco_oferta,2); 

//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($totalcomdesconto_etapa2,$impostos_venda_decimal,2);

$total_descontos_concedidos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);

$total_fornecedor = bcmul($preco_compra,$quantidade_at,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade_at,2);
	
	$base_de_calculo_comissao = bcsub($totalcomdesconto_etapa2,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);

if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa2,$impostos_venda_decimal,2);

}



$subtrai_o_que_ja_tem_do_orcamento = bcsub($quantidade_at,$verificando_quantidade_ja_se_encontra_no_orcamento);
	
	if($subtrai_o_que_ja_tem_do_orcamento>$verifica_quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE $verifica_quant_estoque e no orcamento ja tem $verificando_quantidade_ja_se_encontra_no_orcamento , NÃO É PERMITIDO ADICIONAR $quantidade_at!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{

$comando = "update `$db`.`produtos_em_orcamento_trans` set `preco2` = '$preco2menosdescontoetapa2',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa2` = '$descontoetapa2',`descontoetapa3` = '0',`descontodecimaletapa2` = '$descontodecimaletapa2',`descontodecimaletapa3` = '0',`descontomonetarioetapa2` = '$descontomonetarioetapa2',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa2',`baseparaproximodesconto2` = '$baseparaproximodesconto2',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv',`comissao` = '$valor_comissao' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento' limit 1 ";

mysql_query($comando,$conexao);
	
	
	if($quantidade_at<$verificando_quantidade_ja_se_encontra_no_orcamento){
		
		$adiciona_o_que_ja_tem_do_orcamento = bcsub($verificando_quantidade_ja_se_encontra_no_orcamento,$quantidade_at);
		
		$saldo_estoque_da_peca = bcadd($verifica_quant_estoque,$adiciona_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	else{
		
		$saldo_estoque_da_peca = bcsub($verifica_quant_estoque,$subtrai_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	
	

}


//--------------------------------------------------


$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_at2 = $linha[24];

$descontoetapa2 = $linha[70];

}


$descontoetapa3 = bcsub($desconto_at,$somadosdescontosanteriores,2);

$descontodecimaletapa3 = bcdiv($descontoetapa3,100,2);

$valordesconto3 = bcmul($preco_at2,$descontodecimaletapa3,2);

$descontomonetarioetapa3 = bcmul($quantidade_at,$valordesconto3,2);



$preco3menosdescontoetapa3 = bcsub($preco_at2,$valordesconto3,2);


$totalcomdesconto_etapa3 = bcmul($preco3menosdescontoetapa3,$quantidade_at,2);


$baseparaproximodesconto3 = $totalcomdesconto_etapa3;



$diferenca_normal_para_oferta = bcsub($preco,$preco_oferta,2); 

//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($totalcomdesconto_etapa3,$impostos_venda_decimal,2);

$sub_total_descontos_concedidos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);
$total_descontos_concedidos = bcadd($sub_total_descontos_concedidos,$descontomonetarioetapa3,2);


$total_fornecedor = bcmul($preco_compra,$quantidade_at,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade_at,2);
	
	$base_de_calculo_comissao = bcsub($totalcomdesconto_etapa3,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);

if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa3,$impostos_venda_decimal,2);

}



$subtrai_o_que_ja_tem_do_orcamento = bcsub($quantidade_at,$verificando_quantidade_ja_se_encontra_no_orcamento);
	
	if($subtrai_o_que_ja_tem_do_orcamento>$verifica_quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE $verifica_quant_estoque e no orcamento ja tem $verificando_quantidade_ja_se_encontra_no_orcamento , NÃO É PERMITIDO ADICIONAR $quantidade_at!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{


$comando = "update `$db`.`produtos_em_orcamento_trans` set `preco3` = '$preco3menosdescontoetapa3',`quant` = '$quantidade_at',`descontoetapa3` = '$descontoetapa3',`descontodecimaletapa3` = '$descontodecimaletapa3',`descontomonetarioetapa3` = '$descontomonetarioetapa3',`total` = '$totalcomdesconto_etapa3',`baseparaproximodesconto3` = '$baseparaproximodesconto3',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv',`comissao` = '$valor_comissao' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento' limit 1 ";

mysql_query($comando,$conexao);
	
	
	if($quantidade_at<$verificando_quantidade_ja_se_encontra_no_orcamento){
		
		$adiciona_o_que_ja_tem_do_orcamento = bcsub($verificando_quantidade_ja_se_encontra_no_orcamento,$quantidade_at);
		
		$saldo_estoque_da_peca = bcadd($verifica_quant_estoque,$adiciona_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	else{
		
		$saldo_estoque_da_peca = bcsub($verifica_quant_estoque,$subtrai_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	
	

}




}




//------------------FIM ETAPA 3---------------------------------------



//------------------INICIO ETAPA 4---------------------------------------


if(($desconto_at >=15.01) && ($desconto_at <=20)){


$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$descontoregistradoetapa1 = $linha[68];

$descontoregistradoetapa2 = $linha[70];

$descontoregistradoetapa3 = $linha[72];
	
	$verificando_quantidade_ja_se_encontra_no_orcamento = $linha[21];


}



$sub_somadosdescontosanteriores = bcadd($descontoregistradoetapa1,$descontoregistradoetapa2,2);
$somadosdescontosanteriores3 = bcadd($sub_somadosdescontosanteriores,$descontoregistradoetapa3,2);
$somadosdescontosanteriores4 = bcadd($sub_somadosdescontosanteriores,$descontoregistradoetapa3,2);


$sql = "SELECT * FROM estoque_pecas where codigo = '$cod_prod_at' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_normal = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$codigoproduto = $linha[11];
$cod_barras = $linha[15];
$quant_estoque = $linha[16];
	$verifica_quant_estoque = $linha[16];
$quant_disponivel = $linha[18];
$nomeproduto = $linha[27];
$impostos = $linha[24];
$margem_lucro_informada = $linha[25];
$impostos_informado = $linha[26];
$fornecedor = $linha[28];
$preco_compra = $linha[21];


$descontomaximo1 = $linha[34];
	$descontomaximopermitidodoproduto = $linha[34];

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];
$comissao = bcdiv($linha[44],100,3);

}

$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco_at1 = $preco_oferta;

}
else{
	
if($preco_normal==$novo_preco){
		
		$preco_at1 = $preco_normal;
	}
	else{
	
$preco_at1 = $novo_preco;
		
	}
	
}

if($desconto_at>$descontomaximo1){

echo "<script>

alert('ATENÇÃO!!!... VOCÊ TENTOU UM DESCONTO MAIOR QUE O PERMITIDO! O LIMITE MAXIMO DE DESCONTO PARA ESSE PRODUTO É $descontomaximo1%.');

</script>";

}
else{
	
$descontoetapa1 = $descontoregistradoetapa1;


$descontodecimaletapa1 = bcdiv($descontoetapa1,100,2);

$valordesconto1 = bcmul($preco_at1,$descontodecimaletapa1,2);

$descontomonetarioetapa1 = bcmul($quantidade_at,$valordesconto1,2);



$preco1menosdescontoetapa1 = bcsub($preco_at1,$valordesconto1,2);


$totalcomdesconto_etapa1 = bcmul($preco1menosdescontoetapa1,$quantidade_at,2);


$baseparaproximodesconto1 = $totalcomdesconto_etapa1;



$diferenca_normal_para_oferta = bcsub($preco,$preco_oferta,2); 

//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

$total_descontos_concedidos1 = $descontomonetarioetapa1;

$total_fornecedor = bcmul($preco_compra,$quantidade_at,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade_at,2);
	
	$base_de_calculo_comissao = bcsub($totalcomdesconto_etapa1,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);

if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

}



$subtrai_o_que_ja_tem_do_orcamento = bcsub($quantidade_at,$verificando_quantidade_ja_se_encontra_no_orcamento);
	
	if($subtrai_o_que_ja_tem_do_orcamento>$verifica_quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE $verifica_quant_estoque e no orcamento ja tem $verificando_quantidade_ja_se_encontra_no_orcamento , NÃO É PERMITIDO ADICIONAR $quantidade_at!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{


$comando = "update `$db`.`produtos_em_orcamento_trans` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv',`comissao` = '$valor_comissao' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento' limit 1 ";

mysql_query($comando,$conexao);
	
	
	if($quantidade_at<$verificando_quantidade_ja_se_encontra_no_orcamento){
		
		$adiciona_o_que_ja_tem_do_orcamento = bcsub($verificando_quantidade_ja_se_encontra_no_orcamento,$quantidade_at);
		
		$saldo_estoque_da_peca = bcadd($verifica_quant_estoque,$adiciona_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	else{
		
		$saldo_estoque_da_peca = bcsub($verifica_quant_estoque,$subtrai_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	
	

}



}

//--------------------------------


$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_at1 = $linha[23];

$descontoetapa1 = $linha[68];

}


$descontoetapa2 = $descontoregistradoetapa2;

$descontodecimaletapa2 = bcdiv($descontoetapa2,100,2);

$valordesconto2 = bcmul($preco_at1,$descontodecimaletapa2,2);

$descontomonetarioetapa2 = bcmul($quantidade_at,$valordesconto2,2);



$preco2menosdescontoetapa2 = bcsub($preco_at1,$valordesconto2,2);


$totalcomdesconto_etapa2 = bcmul($preco2menosdescontoetapa2,$quantidade_at,2);


$baseparaproximodesconto2 = $totalcomdesconto_etapa2;




$diferenca_normal_para_oferta = bcsub($preco,$preco_oferta,2); 

//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($totalcomdesconto_etapa2,$impostos_venda_decimal,2);

$total_descontos_concedidos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);

$total_fornecedor = bcmul($preco_compra,$quantidade_at,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade_at,2);
	
	$base_de_calculo_comissao = bcsub($totalcomdesconto_etapa2,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);

if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa2,$impostos_venda_decimal,2);

}



$subtrai_o_que_ja_tem_do_orcamento = bcsub($quantidade_at,$verificando_quantidade_ja_se_encontra_no_orcamento);
	
	if($subtrai_o_que_ja_tem_do_orcamento>$verifica_quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE $verifica_quant_estoque e no orcamento ja tem $verificando_quantidade_ja_se_encontra_no_orcamento , NÃO É PERMITIDO ADICIONAR $quantidade_at!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{


$comando = "update `$db`.`produtos_em_orcamento_trans` set `preco2` = '$preco2menosdescontoetapa2',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa2` = '$descontoetapa2',`descontoetapa3` = '0',`descontodecimaletapa2` = '$descontodecimaletapa2',`descontodecimaletapa3` = '0',`descontomonetarioetapa2` = '$descontomonetarioetapa2',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa2',`baseparaproximodesconto2` = '$baseparaproximodesconto2',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv',`comissao` = '$valor_comissao' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento' limit 1 ";

mysql_query($comando,$conexao);
	
	
	if($quantidade_at<$verificando_quantidade_ja_se_encontra_no_orcamento){
		
		$adiciona_o_que_ja_tem_do_orcamento = bcsub($verificando_quantidade_ja_se_encontra_no_orcamento,$quantidade_at);
		
		$saldo_estoque_da_peca = bcadd($verifica_quant_estoque,$adiciona_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	else{
		
		$saldo_estoque_da_peca = bcsub($verifica_quant_estoque,$subtrai_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	
	

}


//--------------------------------------------------


$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_at2 = $linha[24];

$descontoetapa2 = $linha[70];

}


$descontoetapa3 = $descontoregistradoetapa3;

$descontodecimaletapa3 = bcdiv($descontoetapa3,100,2);

$valordesconto3 = bcmul($preco_at2,$descontodecimaletapa3,2);

$descontomonetarioetapa3 = bcmul($quantidade_at,$valordesconto3,2);


$preco3menosdescontoetapa3 = bcsub($preco_at2,$valordesconto3,2);


$totalcomdesconto_etapa3 = bcmul($preco3menosdescontoetapa3,$quantidade_at,2);


$baseparaproximodesconto3 = $totalcomdesconto_etapa3;



$diferenca_normal_para_oferta = bcsub($preco,$preco_oferta,2); 

//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($totalcomdesconto_etapa3,$impostos_venda_decimal,2);

$sub_total_descontos_concedidos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);
$total_descontos_concedidos = bcadd($sub_total_descontos_concedidos,$descontomonetarioetapa3,2);


$total_fornecedor = bcmul($preco_compra,$quantidade_at,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade_at,2);
	
	$base_de_calculo_comissao = bcsub($totalcomdesconto_etapa3,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);

if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa3,$impostos_venda_decimal,2);

}



$subtrai_o_que_ja_tem_do_orcamento = bcsub($quantidade_at,$verificando_quantidade_ja_se_encontra_no_orcamento);
	
	if($subtrai_o_que_ja_tem_do_orcamento>$verifica_quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE $verifica_quant_estoque e no orcamento ja tem $verificando_quantidade_ja_se_encontra_no_orcamento , NÃO É PERMITIDO ADICIONAR $quantidade_at!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{


$comando = "update `$db`.`produtos_em_orcamento_trans` set `preco3` = '$preco3menosdescontoetapa3',`quant` = '$quantidade_at',`descontoetapa3` = '$descontoetapa3',`descontodecimaletapa3` = '$descontodecimaletapa3',`descontomonetarioetapa3` = '$descontomonetarioetapa3',`total` = '$totalcomdesconto_etapa3',`baseparaproximodesconto3` = '$baseparaproximodesconto3',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv',`comissao` = '$valor_comissao' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento' limit 1 ";

mysql_query($comando,$conexao);
	
	
	if($quantidade_at<$verificando_quantidade_ja_se_encontra_no_orcamento){
		
		$adiciona_o_que_ja_tem_do_orcamento = bcsub($verificando_quantidade_ja_se_encontra_no_orcamento,$quantidade_at);
		
		$saldo_estoque_da_peca = bcadd($verifica_quant_estoque,$adiciona_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	else{
		
		$saldo_estoque_da_peca = bcsub($verifica_quant_estoque,$subtrai_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	
	

}


//-------------------------------------


$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_at3 = $linha[25];

$descontoetapa3 = $linha[72];

}


$descontoetapa4 = bcsub($desconto_at,$somadosdescontosanteriores4,2);

$descontodecimaletapa4 = bcdiv($descontoetapa4,100,2);

$valordesconto4 = bcmul($preco_at3,$descontodecimaletapa4,2);

$descontomonetarioetapa4 = bcmul($quantidade_at,$valordesconto4,2);



$preco4menosdescontoetapa4 = bcsub($preco_at3,$valordesconto4,2);


$totalcomdesconto_etapa4 = bcmul($preco4menosdescontoetapa4,$quantidade_at,2);


$baseparaproximodesconto4 = $totalcomdesconto_etapa4;



$diferenca_normal_para_oferta = bcsub($preco,$preco_oferta,2); 

//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($totalcomdesconto_etapa4,$impostos_venda_decimal,2);

$sub_total_descontos_concedidos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);
$sub_total_descontos_concedidos2 = bcadd($descontomonetarioetapa3,$descontomonetarioetapa4,2);

$total_descontos_concedidos = bcadd($sub_total_descontos_concedidos,$sub_total_descontos_concedidos2,2);


$total_fornecedor = bcmul($preco_compra,$quantidade_at,2);
$totalizacao_cmv = bcmul($preco_compra,$quantidade_at,2);
	
	$base_de_calculo_comissao = bcsub($totalcomdesconto_etapa4,$totalizacao_cmv,2);
	$valor_comissao = bcmul($base_de_calculo_comissao,$comissao,2);


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa4,$impostos_venda_decimal,2);

}



$subtrai_o_que_ja_tem_do_orcamento = bcsub($quantidade_at,$verificando_quantidade_ja_se_encontra_no_orcamento);
	
	if($subtrai_o_que_ja_tem_do_orcamento>$verifica_quant_estoque){
		
			
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE $verifica_quant_estoque e no orcamento ja tem $verificando_quantidade_ja_se_encontra_no_orcamento , NÃO É PERMITIDO ADICIONAR $quantidade_at!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';



</script>";
	
}
else{


$comando = "update `$db`.`produtos_em_orcamento_trans` set `preco4` = '$preco4menosdescontoetapa4',`quant` = '$quantidade_at',`descontoetapa4` = '$descontoetapa4',`descontodecimaletapa4` = '$descontodecimaletapa4',`descontomonetarioetapa4` = '$descontomonetarioetapa4',`total` = '$totalcomdesconto_etapa4',`baseparaproximodesconto4` = '$baseparaproximodesconto4',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto',`totalizacao_cmv` = '$totalizacao_cmv',`comissao` = '$valor_comissao' where `produtos_em_orcamento_trans`. `codigo` = '$codigolancamento' limit 1 ";

mysql_query($comando,$conexao);
	
	
	if($quantidade_at<$verificando_quantidade_ja_se_encontra_no_orcamento){
		
		$adiciona_o_que_ja_tem_do_orcamento = bcsub($verificando_quantidade_ja_se_encontra_no_orcamento,$quantidade_at);
		
		$saldo_estoque_da_peca = bcadd($verifica_quant_estoque,$adiciona_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	else{
		
		$saldo_estoque_da_peca = bcsub($verifica_quant_estoque,$subtrai_o_que_ja_tem_do_orcamento);

//$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
//mysql_query($comando,$conexao);
		
	}
	
	

}



}



}
	
	//------------------FIM ETAPA 4---------------------------------------

//-------------------FIM DE ALTEREÇÃO DOS PRODUTOS EM ORÇAMENTO-------------------------------
		
	}
	
	 //------------------FIM A ATIVAÇÃO DE CONTEUDO DA EDIÇÃO DE PRODUTOS NO ORCAMENTO--------------------
	

?>


<?

$sql = "select sum(total) as total_liquido from produtos_em_orcamento_trans where codigo_orcamento = '$codigo_orcamento'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_liquido_produtos = $linha['total_liquido'];



	
$total_geral_momentaneo = $total_liquido_produtos;
	


$comando = "update `$db`.`orcamentos_trans` set `total` = '$total_geral_momentaneo',`departamento` = '$estab_pertence_solicitante' where `orcamentos_trans`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
mysql_query($comando,$conexao);
	

  
	
$sql = "SELECT * FROM orcamentos_trans where num_fatura = '$num_fatura' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {
	
	

$codigolancamento = $linha[0];
	
$codigo_orcamento = $linha[0];	
	
$condicao = $linha[42];
$loja = $linha[43];
$nomesocial = $linha[70];
//$estab_pertence_que_foi_solicitado = $linha[53];
$num_fatura = $linha[48];
	
$cod_cli = $linha[45];
	$op_solicitado = $linha[46];
$cpf = $linha[47];
$placa = $linha[28];
$veiculo = $linha[29];
$entrada = $linha[35];

$tipomanutencao = $linha[37];
$km = $linha[31];
$horimetro = $linha[32];

$status_a_alterar = $linha[2];
$obs_orcamento = $linha[41];

$diaaberturaorcamento = $linha[7];
$mesaberturaorcamento = $linha[8];
$anoaberturaorcamento = $linha[9];

$horaaberturaorcamento = $linha[6];

$tipoevento = $linha[74];
$descricaoevento = $linha[75];
$quantconvidados = $linha[76];
$horacomecarservir = $linha[77];
$hora_comecar_servir = $linha[78];
$minuto_comecar_servir = $linha[79];
$segundo_comecar_servir = $linha[80];
$horadeparardeservir = $linha[81];
$hora_parar_servir = $linha[82];
$minuto_parar_servir = $linha[83];
$segundo_parar_servir = $linha[84];
$valorporpessoa = $linha[85];
$percentualdeentrada = $linha[86];
$valorentrada = $linha[87];
$quantdiasparacancelamento = $linha[88];
$percentualdemulta = $linha[89];
$percentualdemultadecimal = $linha[90];

$caixa_rapido = $linha[93];
	
$mecanico = $linha[62];

}
	
	
$sql = "SELECT * FROM ocorrencias_trans where num_fatura = '$num_fatura' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_da_ocorrencia = $linha[0];
	$codigo_da_ocorrencia_detalhamento = $linha[0];
	$cod_ocorrencia = $linha[0];
}

	
	

?>




<?
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>

background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">
  
<? } ?>
<p>
        <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>
</p>
<form name="form1" method="post" action="../menu.php">
  <div align="center">
    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
    <input name="solicitacao" type="hidden" id="solicitacao">
    <input name="placa" type="hidden" id="placa" value="<? echo "$placa";  ?>">
    <input name="nome" type="hidden" id="nome" value="<? echo "$nome";  ?>">
<input type="submit" name="Submit4" span class="class01" value="Voltar">
  </span></div>
</form>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td background="../../../imagens_sistema/fundocelulas1.png" width="238"><div align="center">              <form name="form7" method="post" action="finalizar_orcamento.php">
                <span class="style3">                </span>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td background="../../../imagens_sistema/fundocelulas2.png" width="33%"><div align="center" class="style6">
 
                      <p><b>Loja Solicitada:  <? echo "$estab_pertence_que_foi_solicitado <br>"; ?>
						  Operador: <? echo "$op_solicitado <br>"; ?>
                      
                      Controle: <? echo "$num_fatura <br>"; ?> Solicita&ccedil;&atilde;o: <? echo "$codigo_orcamento <br>"; ?></b></p>
                    </div>
					  </td>
					  
                    <td width="49%" valign="top" background="../../../imagens_sistema/fundocelulas2.png"><div align="center" class="style6">
                      <p><b>
                        Loja Solicitante: <? echo "$estab_pertence_solicitante <br>"; ?>
                        Operador: <? echo "$operador_solicitante <br>"; ?></b></p>
                      <p>&nbsp;</p>
                    </div></td>
					  
                    <td width="18%" valign="top" background="../../../imagens_sistema/fundocelulas2.png"><div align="center" class="class01">
                      <?
$exibir_total_do_orcamento = bcadd($total_geral_momentaneo,0,2);

echo "Total<br>
R$ ".$exibir_total_do_orcamento;

$comando = "update `$db`.`faturamento_futuro_trans` set `total_geral` = '$exibir_total_do_orcamento',`codigo_orcamento` = '$codigo_orcamento',`codigo_cliente` = '$codigo_cliente' where `faturamento_futuro_trans`. `num_fatura` = '$num_fatura' limit 1 ";
mysql_query($comando,$conexao);

?></div></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center" class='style1'><div id="gravapeca" class="modal" role="dialog" style="overflow: auto; width: 400px; height: 400px; border:solid 0px">
                      <p><a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
                        <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                        </strong>
                        <input name="codigo_orcamento_finalizar" type="hidden" id="codigo_orcamento_finalizar" value="<? echo $codigo_orcamento; ?>">
                        </span>
                        <input name="datafechamento" type="hidden" id="datafechamento" value="<? echo $datecadastro; ?>">
                        <input name="horafechamento" type="hidden" id="horafechamento" value="<? echo date('H:i:s'); ?>">
                        <span class="style3"><strong><font color="#0000FF">
                        <input name="quantparc" type="hidden" id="quantparc" value="<? echo $simulacao; ?>">
                          <strong><font color="#0000FF">
                          <strong><font color="#0000FF">
                          <input name="modopagto" type="hidden" id="modopagto" value="<? echo $modopagto;  ?>">
                          </font></strong>
                          <input name="cartao" type="hidden" id="cartao" value="<? echo $cartao; ?>">
                          <input name="operador_alterou" type="hidden" id="operador_alterou" value="<? echo $operador; ?>">
                          <input name="loja" type="hidden" id="loja" value="<? echo $estab_pertence; ?>">
                          <span class="modal" style="overflow: auto; width: 450px; height: 400px; border:solid 0px">
                          <?
			
if($solicitacao=="gravarpecanoestoque"){
			
$nome_produto = $_POST['nome_produto'];
$cod_barras = $_POST['cod_barras'];
$referencia = $_POST['referencia'];
$grupo = $_POST['grupo'];
$sub_grupo = $_POST['sub_grupo'];
$classe = "O";

$departamento = "Todos";

$descricao = $_POST['descricao'];
$descontomaximo = $_POST['descontomaximo'];

$quant_estoque = $_POST['quant_estoque'];

$aparecer_site = $_POST['aparecer_site'];
$preco_compra = $_POST['preco_compra'];

$preco = $_POST['preco'];
	
$oferta = $_POST['oferta'];

$data = $_POST['data'];
	$datacadastro = $_POST['datacadastro'];
$horacadastro = $_POST['horacadastro'];

$fornecedor = $_POST['fornecedor'];
	$estab_pertence = $_POST['estab_pertence'];
	
	$mensagem = "<BR><BR>Item inserido com sucesso!!!... <BR><BR> $nome_produto";

			
if((empty($nome_produto)) or (empty($referencia)) ){
echo "<script>

alert('ATEN&Ccedil;&Atilde;O!!!... VOC&Ecirc; DEVE INFORMAR O NOME DA PECA E O CODIGO!!!... VOLTE E TENTE NOVAMENTE!');


</script>";

}
else{

$comando = "insert into estoque_pecas(cod_barras,referencia,grupo,sub_grupo,descricao,preco,oferta,data,hora,quant_estoque,aparecer_site,preco_compra,nome_produto,fornecedor,descontomaximo,classe,departamento,operador,datacadastro,horacadastro,estab_pertence) 
values('$cod_barras','$referencia','$grupo','$sub_grupo','$descricao','$preco','$oferta','$data','$horacadastrodapeca','$quant_estoque','$aparecer_site','$preco_compra','$nome_produto','$fornecedor','$descontomaximo','$classe','$departamento','$nome_operador','$datacadastro','$horacadastro','$estab_pertence')";

mysql_query($comando,$conexao) or die("Erro ao gravar dados");
		
	
$sql = "SELECT * FROM subcategoria_ec where empresaconveniada = '$estab_pertence' and sub_categoria_permitida = '$sub_grupo' order by sub_categoria_permitida desc";
$res = mysql_query($sql);
	while($linha=mysql_fetch_row($res)) {
$sub_categoria_permitida_comparativa = $linha[2];
	}
	
	if($sub_categoria_permitida_comparativa==$sub_grupo){
		
	}
	else{
	
$comando = "insert into subcategoria_ec(empresaconveniada,sub_categoria_permitida)

values('$estab_pertence','$sub_grupo')";
 
mysql_query($comando,$conexao);
	}
	
}
	
			
}
			
			?>
                          </span> </font></strong></font></strong></span>
                        <input name="entrada" type="hidden" id="entrada" value="<? echo $entrada; ?>">
                      </p>
                      <p><strong><? echo "$mensagem<br>"; 
						  
	if($sub_categoria_permitida_comparativa==$sub_grupo){
		echo "<br> Sub-Grupo $sub_categoria_permitida_comparativa ja ese encontra permitido para $estab_pertence.";
	}
						  ?></strong></p>
                    </div></td>
                  </tr>
                </table>
              </form>
</div></td>
        </tr>
      </table>

<table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="40%" background="../../../imagens_sistema/fundocelulas1.png"> <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?> <form name="itens" method="post" action="orcamento.php">
                  <div align="center"><strong>
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                  PE&Ccedil;AS Adicionar:
                      <font color="#0000FF">
                      <input name="estab_pertence_solicitado" type="hidden" id="estab_pertence_solicitado" value="<? echo "$estab_pertence_que_foi_solicitado"; ?>">
                      <input name="additem" type="hidden" id="additem" value="sim">
                      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                      </font>

                  <font color="#0000FF">
                      <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                  </font>
                      <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                  Quant.
<input name="quant" type="text" id="quant" class="class02" size="3">
                  Codigo
                  <input name="cod_barras" type="text" class="class02" id="cod_barras" value="<? echo "$cod_barras"; ?>" size="10"><br><br>
                  <select name="item" id="item" class="class02">
                    
                    <?

    $sql = "select * from estoque_pecas where grupo = 'VENDA DE PRODUTOS' and estab_pertence = '$estab_pertence_que_foi_solicitado' and nome_produto = '$item_atualizar' order by nome_produto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome_produto']."</option>";
    }
?>
                  </select><br><br>
                  </strong>
                   <input type="submit" name="Submit" class="class01" value="Adicionar">
                  </div>
<script language='JavaScript' type='text/javascript'>
document.itens.quant.focus()
</script>

                </form><? } ?> 
                </td>
                <td width="24%" align="center" background="../../../imagens_sistema/fundocelulas2.png"><? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){
						  echo "<b>Condição: $condicao<br> Status: $status_a_alterar</b>";
						  }else{ ?><form name="form5" method="post" action="orcamento.php">
                  <p><strong>
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <font color="#0000FF">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "mudar"; ?>">
                    <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo "$estab_pertence"; ?>">
                    <input name="cod_ocorrencia" type="hidden" id="cod_ocorrencia" value="<? echo $codigo_da_ocorrencia_detalhamento; ?>">
                    <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                    </font><font color="#0000FF">
                    <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                    </font>
                    <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                  </strong> <strong><font color="#0000FF">
                  <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                  <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                  <input name="km" type="hidden" id="km" value="<? echo $km; ?>">
                  <input name="tipomanutencao" type="hidden" id="tipomanutencao" value="<? echo $tipomanutencao; ?>">
                  <input name="valormanutencao" type="hidden" id="valormanutencao" value="<? echo $exibir_total_do_orcamento; ?>">
                  <input name="referencia_a_receber" type="hidden" id="referencia_a_receber" value="<? echo $codigoproduto; ?>">
                  </font>                  
                    Condi&ccedil;&atilde;o:
					  <? if($status_e_condicao_da_transferencia_de_estoque=="sim" ){ ?>
                    <select name="condicao" id="condicao" class="class02">
                      <option selected><? echo "$condicao"; ?></option>
                      <?

    $sql = "select * from condicaodeorcamento_trans order by condicao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['condicao']."</option>";
    }
?>
                    </select>
					  <? }else{ echo $condicao; } ?>
					  <br>
					  Status:
                  <? if($status_e_condicao_da_transferencia_de_estoque=="sim" ){ ?>
                  <select name="status_a_alterar" id="status_a_alterar" class="class02">
                    <option selected><? echo "$status_a_alterar"; ?></option>
                    <?

    $sql = "select * from status_orcamento_trans order by status asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['status']."</option>";
    }
?>
                  </select>
					  <? }else{ echo $status_a_alterar; } ?>
					  <br>
                  </strong><br>
					   <? if($status_e_condicao_da_transferencia_de_estoque=="sim" ){ ?>
                  <input class='class01' type=image src="../../../imagens_botoes/ok.png" width="50" height="50" name="submit7" id="submit7" title="OK">
					   <? }else{ } ?>
                  </p>
                </form><? } ?></td>
                <td width="36%" background="../../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
              </tr>
</table>            

            <table width="100%"  border="0" cellpadding="0" cellspacing="0">
              
              <tr bgcolor="#ffffff">
                <td colspan="10" align="center" background="../../../imagens_sistema/fundocelulas1.png"><strong>PRODUTOS</strong></td>
              </tr>
              <tr bgcolor="#ffffff">
                <td background="../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>#</strong></div></td>
                <td align="center" background="../../../imagens_sistema/fundocelulas2.png"><strong>Data / Hora</strong></td>
                <td background="../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Nome Produto</strong></div></td>
                <td align="center" background="../../../imagens_sistema/fundocelulas2.png"><strong>Cod Barras</strong></td>
                <td background="../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Pre&ccedil;o</strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Quant</strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Desconto</strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Desconto R$</strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Total Produtos</strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>#</strong></div></td>
              </tr>
              <?
			  
//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and num_bordero = '' and prazo_final between '$data_inicio_busca' and '$data_atual' order by num_proposta asc";

$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo_orcamento = '$codigo_orcamento' and categoria = 'VENDA DE PRODUTOS' order by codigo_orcamento desc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
	
	
	
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco = $linha[22];


$acrescimo = $linha[23];
$acrescimodecimal = $linha[24];
$acrescimomonetario = $linha[25];
$totaldosprodutos = $linha[29];
	
$descontomaximopermitidodoproduto = $linha[113];

$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];
$descontoetapa4 = $linha[83];


$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];
$descontomonetarioetapa4 = $linha[85];
	
$datalancamento = $linha[15];
$dialancamento = $linha[52];
$meslancamento = $linha[53];
$anolancamento = $linha[54];
$horalancamento = $linha[61];
	
	$grupo = $linha[19];
	$sub_grupo = $linha[112];



$sql2 = "SELECT * FROM estoque_pecas where codigo = '$codigoproduto'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$quant_estoque = $linha[16];
$codigo_barras_do_produto = $linha[15];

}

?>
              <tr>
                <td background="../../../imagens_sistema/fundocelulas1.png" width="9%"><div align="center"><strong>
                    <form name="form2" method="post" action="orcamento.php#prepara_retirar_item">
                      
                      
                      
                      <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                     
                      <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                      
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      
                      <input name="codigo_orcamento_ret" type="hidden" id="codigo_orcamento_ret" value="<? echo $codigo_orcamento;
																			
																										?>">
                      <input name="cod_prod_ret" type="hidden" id="cod_prod_ret" value="<? echo $codigoproduto; ?>">
                      
                      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                      <? echo "$codigoproduto"; //echo "<input type='submit' name='Submit3' class='class01' value='$codigoproduto - Retirar'>"; ?>
                      
                    </form>
                </strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas1.png" width="13%" align="center"><strong><? echo "$dialancamento-$meslancamento-$anolancamento - $horalancamento";?></strong></td>
                <td background="../../../imagens_sistema/fundocelulas1.png" width="18%"><div align="center"><strong><? echo $nomeproduto;?></strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas1.png" width="14%"><div align="center"><strong><? echo $codigo_barras_do_produto;?></strong></div></td>
                <form name="form3" method="post" action="orcamento.php">
                
                <td background="../../../imagens_sistema/fundocelulas1.png" width="5%"><div align="center"><strong><? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ echo $preco; }else{ ?></strong><strong>
                  <input class="class02" name="novo_preco" type="text" id="novo_preco" value="<? echo $preco; ?>" size="8"><? } ?>
                </strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas1.png" width="6%"><div align="center">
                  <strong>
                  <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ echo $quant; }else{ ?><input name="quant_at" type="text" id="quant_at" class="class02" value="<? echo $quant; ?>" size="1"><? } ?>
                  </strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas1.png" width="6%"><div align="center">
                 <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){

	
	$subtotal_descontosconcedidos_natural = bcadd($descontoetapa1,$descontoetapa2,2);
  	$subtotal_descontosconcedidos_natural2 = bcadd($descontoetapa3,$descontoetapa4,2);
	$descontosconcedidos_natural = bcadd($subtotal_descontosconcedidos_natural,$subtotal_descontosconcedidos_natural2,2);
				  
				  echo $descontosconcedidos_natural;
}else{ ?> <select class="class02" name="desconto_at" id="desconto_at">
                    <?
	
	$subtotal_descontosconcedidos_natural = bcadd($descontoetapa1,$descontoetapa2,2);
  	$subtotal_descontosconcedidos_natural2 = bcadd($descontoetapa3,$descontoetapa4,2);
	$descontosconcedidos_natural = bcadd($subtotal_descontosconcedidos_natural,$subtotal_descontosconcedidos_natural2,2);
				  
				  //echo $descontosconcedidos_natural;
	
	echo "<option select>$descontosconcedidos_natural</option>";
	//echo "<option>0.00</option>";
	
$sql = "select * from descontomaximo where estab_pertence = '$estab_pertence_que_foi_solicitado' and desconto <= '$descontomaximopermitidodoproduto' order by desconto asc";

    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['desconto']."</option>";

    }
?>
                  </select><? } ?>
                </div></td>
                <td background="../../../imagens_sistema/fundocelulas1.png" width="8%"><div align="center"><strong>
                <?
				
				$subtotaldedescontos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);
				$subtotaldedescontos2 = bcadd($descontomonetarioetapa3,$descontomonetarioetapa4,2);
				$descontosconcedidos = bcadd($subtotaldedescontos,$subtotaldedescontos2,2);
				 echo $descontosconcedidos;
				 
				 
				 
				 ?>
                </strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas1.png" width="9%"><div align="center"><strong><? echo $totaldosprodutos; ?></strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas1.png" width="12%">
                  <div align="center">
                    <strong>
                    <input name="ativarconteudo" type="hidden" id="ativarconteudo" value="<? echo "sim"; ?>">
                    <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                    <font color="#0000FF">
                    <input name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
                    <input name="cod_prod_at" type="hidden" id="cod_prod_at" value="<? echo $codigoproduto; ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao">
                    <input name="nome" type="hidden" id="nome" value="<? echo "$nome" ?>">
                    <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                    <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                    <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                    <input name="item_atualizar" type="hidden" id="item_atualizar" value="<? echo $nomeproduto; ?>">
                    <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                    <input name="estab_pertence_solicitado" type="hidden" id="estab_pertence_solicitado" value="<? echo $estab_pertence_que_foi_solicitado; ?>">
                    </font>
                   <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?> <input type="submit" name="button" id="button" class="class01" value="Atualizar"><? } ?>
                  </strong></div></td></form>
</tr>



<? } ?>

              <tr>
                <td background="../../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
                <td background="../../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
                <td background="../../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
                <td background="../../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
                <td background="../../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
                <td background="../../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
                <td background="../../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
                <td background="../../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
                <td background="../../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
                <td background="../../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
</table><table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <?

$sql = "SELECT * FROM produtos_em_orcamento_trans where codigo_orcamento = '$codigo_orcamento' and categoria = 'SERVICOS' order by codigo_orcamento desc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco = $linha[22];


$acrescimo = $linha[23];
$acrescimodecimal = $linha[24];
$acrescimomonetario = $linha[25];
$totaldosprodutos = $linha[29];

$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];
$descontoetapa4 = $linha[83];


$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];
$descontomonetarioetapa4 = $linha[85];
	
$datalancamento = $linha[15];
$dialancamento = $linha[52];
$meslancamento = $linha[53];
$anolancamento = $linha[54];
$horalancamento = $linha[61];



$sql2 = "SELECT * FROM estoque_pecas where codigo = '$codigoproduto'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$quant_estoque = $linha[16];
$codigo_barras_do_produto = $linha[15];

}

?>



<? } ?>

              <tr>
                <td width="9%" background="../../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
                <td width="37%" background="../../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
                <td width="15%" background="../../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
                <td width="11%" background="../../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
                <td width="4%" background="../../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
                <td width="3%" background="../../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
                <td width="5%" background="../../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
                <td width="5%" background="../../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
                <td width="4%" background="../../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
                <td width="7%" background="../../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
              <tr>
                <td align="center" colspan="10" background="../../../imagens_sistema/fundocelulas2.png"><form name="form8" method="post" action="orcamento.php#exibe_obs_oculta">
                  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                  <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                  </font><font color="#0000FF">
                  <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                  </font>
                  <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                  <font color="#0000FF">
                  <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                  <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                  <strong>DETALHAMENTO</strong>
                </form></td>
              <tr>
                <td background="../../../imagens_sistema/fundocelulas2.png" colspan="2" align="center"><form name="form6" method="post" action="orcamento.php">
                  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                  <strong><font color="#0000FF">
					   <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?>
                  <input name="cod_ocorrencia" type="hidden" id="cod_ocorrencia" value="<? echo $cod_ocorrencia; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                  </font><font color="#0000FF">
                  <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                  </font>
                  <input name="estab_pertence_solicitado" type="hidden" id="estab_pertence_solicitado" value="<? echo "$estab_pertence_que_foi_solicitado"; ?>">
                  <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                  </strong> <strong><font color="#0000FF">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "detalhamento_obs"; ?>">
                  <input name="item" type="hidden" id="item" value="<? echo $item_atualizar; ?>">
                  <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                  <input name="valormanutencao" type="hidden" id="valormanutencao" value="<? echo $exibir_total_do_orcamento; ?>">
                  </font></strong>
                  <input name="cod_barras" type="hidden" id="cod_barras" value="<? echo "$cod_barras"; ?>">
                  <br>
  <textarea class='class02' name="detalhamento" cols="60" rows="7" id="detalhamento"><?  
$sql3 = "SELECT * FROM nfs_manutencao_trans where cod_ocorrencia = '$codigo_da_ocorrencia' order by codigo desc limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$obs_adicional_da_manutencao = $linha[11];
$obs_oculta = $linha[23];
}

if($obs_oculta=="sim"){
	
}
else{
echo "$obs_adicional_da_manutencao";
}
?>
</textarea>
<input class='class01' type="submit" name="submit10" id="submit10" value="Enviar"><? } ?>
                </form></td>
                <td background="../../../imagens_sistema/fundocelulas2.png" align="center">&nbsp;</td>
                <td background="../../../imagens_sistema/fundocelulas2.png" colspan="7" align="center" valign="top"><strong><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
	
//echo "$diaaberturaorcamento-$mesaberturaorcamento-$anoaberturaorcamento - $horaaberturaorcamento : $obs_orcamento<br><br";
	
$sql = "SELECT * FROM ocorrencias_trans where num_fatura = '$num_fatura'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_da_ocorrencia = $linha[0];
$cod_ocorrencia2 = $linha[0];
$placa = $linha[1];

$renavam = $linha[2];
$chassi = $linha[3];
$condutor = $linha[4];

$concessionaria = $linha[5];
	$datamanutencao = $linha[6];
	$data_da_manutencao = $linha[6];
	
	$horamanutencao = $linha[7];
	$municipio = $linha[8];
	$tipomanutencao = $linha[9];
	$detalhamento_ocorrencia = $linha[10];
	$agente = $linha[11];
	$corveiculo = $linha[12];
	
	$horimetro = $linha[13];
$km = $linha[14];
$valormanutencao = $linha[15];
$descontar = $linha[16];
	$fornecedor = $linha[21];
	$primeira_nf = $linha[22];
	$link_primeira_nf = $linha[23];
	$operador_manutencao = $linha[24];
	
	
	echo "$codigo_da_ocorrencia - $data_da_manutencao - $horamanutencao : $detalhamento_ocorrencia<br><br>";
}
	

$sql3 = "SELECT * FROM nfs_manutencao_trans where cod_ocorrencia = '$cod_ocorrencia2' and obs_oculta <> 'sim' order by codigo desc";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


	$numero_nf = $linha[2];
	$link_da_nf = $linha[9];
$obs_adicional_da_manutencao = $linha[11];
	$horimetro_atual = $linha[17];
	$comentario_inserido = $linha[18];
	$data_adicional = $linha[12];
	$hora_adicional = $linha[13];
	$operador_informante = $linha[14];
	$obs_oculta = $linha[23];
	
	if($obs_oculta=="sim"){
	
}
else{
echo "$data_adicional - $hora_adicional  $obs_adicional_da_manutencao<br>";
}
	
}
	
	
?>
					</strong>
				</td>
              <tr>
                <td background="../../../imagens_sistema/fundocelulas1.png" colspan="10" align="center"><span class="style31">
                  <?  
		
		if($modopagto=="CARTEIRA"){

if(empty($valor_entrada)){
	
}
else{
	echo "Modo de pagto: $modopagto - Entrada: $valor_entrada";
}

	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTEIRA' and quitacao = 'Em Aberto' order by vencto asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_contas_a_receber = mysql_num_rows($res7);
	
$data_de_vencimento = $linha[8];
	$valor_da_parcela = $linha[7];
	$numero_da_parcela = $linha[31];
	
	echo "<br>Vencto: $data_de_vencimento Valor R$ $valor_da_parcela Parcela $numero_da_parcela";
	
}	
	}
		
		
		if($modopagto=="DINHEIRO"){

if(empty($valor_entrada)){
	
}
else{
echo "Modo de pagto: $modopagto - Entrada: $valor_entrada";
}
	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'DINHEIRO' and quitacao = 'Em Aberto' order by vencto asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_contas_a_receber = mysql_num_rows($res7);
	
$data_de_vencimento = $linha[8];
	$valor_da_parcela = $linha[7];
	$numero_da_parcela = $linha[31];
	
	echo "<br>Vencto: $data_de_vencimento Valor R$ $valor_da_parcela Parcela $numero_da_parcela";
	
}	
	}
	
	if($modopagto=="CARTAO"){

if(empty($valor_entrada)){
	
}
else{
echo "Modo de pagto: $modopagto - Entrada: $valor_entrada";
}
	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao1 = '1' group by num_ordem_do_cartao1 order by cartao asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}	
		
		
	$sql8 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao2 = '2' group by num_ordem_do_cartao2 order by cartao asc";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		
	$sql9 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao3 = '3' group by num_ordem_do_cartao3 order by cartao asc";
$res9 = mysql_query($sql9);
while($linha=mysql_fetch_row($res9)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		
	$sql10 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao4 = '4' group by num_ordem_do_cartao4 order by cartao asc";
$res10 = mysql_query($sql10);
while($linha=mysql_fetch_row($res10)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		
		
	}
	
		?>
                </span></td>
              <tr>
                <td colspan="9" align="center"><div id="exibe_obs_oculta" class="modal" role="dialog" style="overflow: auto; width: 800px; height: 300px; border:solid 0px">
                  <p><a href="#fechar" title="Fechar" class="fechar"><b>X</b></a></p>
                  <p>
                    <?
//$num_fatura = $_SESSION['num_fatura'];
$senha = $_SESSION['senha'];
	

$sql3 = "SELECT * FROM nfs_manutencao_trans where num_fatura = '$num_fatura' and obs_oculta = 'sim' order by codigo desc";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


	$numero_nf = $linha[2];
	$link_da_nf = $linha[9];
$obs_adicional_da_manutencao = $linha[11];
	$horimetro_atual = $linha[17];
	$comentario_inserido = $linha[18];
	$data_adicional = $linha[12];
	$hora_adicional = $linha[13];
	$operador_informante = $linha[14];
	
	
echo "<br>$operador_informante em $data_adicional - $hora_adicional <br> $obs_adicional_da_manutencao<br>-----//-----<br>";
	
}
	
	
?>
                  </p>
                </div></td>
                <td>&nbsp;</td>
              <tr>
                <th bgcolor="#1216CD" scope="col">&nbsp;</th>
                <th bgcolor="#1216CD" scope="col"><div id="prepara_retirar_item" class="modal" role="dialog" style="overflow: auto; width: 400px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
                  <form name="form2" method="post" action="orcamento.php#efetiva_retirada_item">
                    <p> ATEN&Ccedil;&Atilde;O!!!... <br>
                      <br>
                      Retirada de Item... <br>
                      <br>
                      Solicite Autoriza&ccedil;&atilde;o! <br>
                      <br>
                      <input name="area_a_focar_campo" type="hidden" id="area_a_focar_campo" value="cancelamento_de_item">
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      <input name="retirada_de_produto" type="hidden" id="retirada_de_produto" value="retirar_produto">
                      Pedido
                      <input class='class02' name="codigo_orcamento_ret2" type="text" id="codigo_orcamento_ret2" value="<? echo "$codigo_orcamento"; ?>" size="3">
                      <br>
                      Cod Produto
                      <input class='class02' name="codigoqueseraretiradodoorcamento" type="text" id="codigoqueseraretiradodoorcamento" size="3">
                      <br>
                      <strong><font color="#0000FF">
                        <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                        </font><font color="#0000FF">
                          <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                          </font><font color="#0000FF">
                            <input name="codigo_orcamento_ret" type="hidden" id="codigo_orcamento_ret" value="<? echo $codigo_orcamento; ?>">
                            <input name="cod_prod_ret" type="hidden" id="cod_prod_ret" value="<? echo $codigoproduto; ?>">
                            </font>
                        <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                      </strong>
                      <input class='class01' type=image src="../../../imagens_botoes/retira_item.png" width="50" height="50" name="Submit3" value="Retirar ">
                    </p>
                  </form>
                </div></th>
                <th bgcolor="#1216CD" scope="col">&nbsp;</th>
                <th bgcolor="#1216CD" scope="col">&nbsp;</th>
                <th colspan="6" bgcolor="#1216CD" scope="col">&nbsp;</th>
              <tr>
                <th bgcolor="#1216CD" scope="col"> <? 
$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento' and loja = '$estab_pertence' and num_fatura = '$num_fatura' and empresaconveniada = '$empresa_do_convenio' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

	
	
$codigo_orcamento = $linha[0];
	
$loja = $linha[43];
$nomesocial = $linha[70];
$emesaconveniada = $linha[53];
$num_fatura = $linha[48];

$statusdoorcamento = $linha[2];
$condicaodoorcamento = $linha[42];
	
$placa = $linha[28];
$veiculo = $linha[29];

$tipomanutencao = $linha[37];
$km = $linha[31];
$horimetro = $linha[32];
$detalhamento = $linha[41];

}
	
 ?>
                  <form name="form3" method="post" action="orcamento.php#cancelamento_de_cupom">
                    <input name="cancelandocupom" type="hidden" id="cancelandocupom" value="temcerteza">
                    <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo "$num_fatura"; ?>">
                    <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                    <input name="area_a_focar_campo" type="hidden" id="area_a_focar_campo" value="cancelamento_de_cupom">
                    <strong>
                      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                    </strong> <strong><font color="#0000FF">
                        <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                        </font></strong>
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <? 

$sql = "SELECT * FROM orcamentos where num_fatura = '$num_fatura' and status = 'Aberto'  and status_fatura = 'FATURADO' order by codigo_orcamento asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$codigo_orcamento_a_receber = $linha[0];
	
$codigo_orcamento = $linha[0];
	
$loja = $linha[43];
$nomesocial = $linha[70];
$emesaconveniada = $linha[53];
$num_fatura = $linha[48];

$modo_do_pagto = $linha[10];

$valor_da_entrada = $linha[35];
	
$tipomanutencao = $linha[37];
$km = $linha[31];
$horimetro = $linha[32];
$detalhamento = $linha[41];
	
}



?>
                    <? if(($status_a_alterar=="Aberto") or ($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?>
                    <input class='class01' type=image src="../../../imagens_botoes/excluir.png" width="50" height="50" name="submit2" id="submit2" value="Cupom">
                    <br>
                    Excluir Cupom
                    <? } ?>
                  </form></th>
                <th bgcolor="#1216CD" scope="col"><form name="retirador_de_item" method="post" action="orcamento.php#prepara_retirar_item">
                  <strong><font color="#0000FF"> </font>
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <font color="#0000FF">
                      <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                  </font><font color="#0000FF">
                        <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                        </font><font color="#0000FF">
                          <input name="codigo_orcamento_ret" type="hidden" id="codigo_orcamento_ret" value="<? echo $codigo_orcamento; ?>">
                          </font>
                    <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                  </strong> <strong><font color="#0000FF">
                      <input name="solicitacao" type="hidden" id="solicitacao">
                      <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                      <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                      </font></strong>
                  <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?>
                  <input class='class01' type=image src="../../../imagens_botoes/retira_item.png" width="50" height="50" name="submit" id="submit" value="Cupom">
                  <br>
                  Retira Item
                  <? } ?>
                </form></th>
                <th bgcolor="#1216CD" scope="col">&nbsp;</th>
                <th bgcolor="#1216CD" scope="col">&nbsp;</th>
                <th colspan="6" bgcolor="#1216CD" scope="col">&nbsp;</th>
              <tr>
                <th bgcolor="#1216CD" scope="col">&nbsp;</th>
                <th bgcolor="#1216CD" scope="col"><div id="efetiva_retirada_item" class="modal" role="dialog" style="overflow: auto; width: 400px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a> ATEN&Ccedil;&Atilde;O!!!...<br>
                  <br>
                  Sr. Gerente <br>
  <br>
                  Insira seu C&oacute;digo!...<br>
  <br>
  <? if($retirada_de_produto=="retirar_produto"){
$datepedido = date('Y-m-d');
$horapedido = date('H:i:s');
$dateretiradapedido = date('Y-m-d');
$horaretiradapedido = date('H:i:s');

$codigoqueseraretiradodoorcamento = $_POST['codigoqueseraretiradodoorcamento'];


$sql = "SELECT * FROM produtos_em_orcamento_trans where num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento_ret' and codigoproduto = '$codigoqueseraretiradodoorcamento'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$total_itens_para_retirar = mysql_num_rows($res);
	
$nomeprodutoaretirar = $linha[18];
$quant_a_retirar = $linha[21];	

}
		
if($total_itens_para_retirar==0){
	echo "Orcamento $codigo_orcamento_ret Fatura $num_fatura Codigo informado $codigoqueseraretiradodoorcamento nao existe no or&ccedil;amento! <br>
	Informe o codigo do produto corretamente!";
}
else{
	
$comando = "insert into pedido_de_retirada_produto_da_fatura_trans(num_fatura,datepedido,dia,mes,ano,horapedido,codigoorcamento,codigoproduto,nomeproduto,operador,departamento,statusautorizacao,loja)

values('$num_fatura','$datepedido','$dia_fatura','$mes_fatura','$ano_fatura','$horapedido','$codigo_orcamento_ret','$codigoqueseraretiradodoorcamento','$nomeprodutoaretirar','$nome_operador','$estab_pertence','Aguardando Autorizacao','$estab_pertence')";
 
mysql_query($comando,$conexao);

$sql = "select * from pedido_de_retirada_produto_da_fatura_trans where num_fatura = '$num_fatura' and codigoorcamento = '$codigo_orcamento_ret' and codigoproduto = '$codigoqueseraretiradodoorcamento' and statusautorizacao = 'Aguardando Autorizacao' and datepedido = '$datepedido' and horapedido = '$horapedido' order by datepedido desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_de_retirada = $linha[0];

}


echo "<form name='cancel_item' method='post' action='orcamento.php'>
                <div align='center'>
                  Codigo de Autoriza&ccedil;&atilde;o<br><input type='password' name='cod_gerente' id='cod_gerente' placeholder='C&oacute;digo Gerencial'>
				  <input type='hidden' name='codigo_orcamento_ret' id='codigo_orcamento_ret' value='$codigo_orcamento_ret'>
                  <input type='hidden' name='codigoqueseraretiradodoorcamento' id='codigoqueseraretiradodoorcamento' value='$codigoqueseraretiradodoorcamento'>
				  <input type='hidden' name='quant_a_retirar' id='quant_a_retirar' value='$quant_a_retirar'>
				  <input name='nome' type='hidden' id='nome' value='$nome'>
				  <input name='num_fatura_ret' type='hidden' id='num_fatura_ret' value='$num_fatura'>
				  <input name='num_fatura' type='hidden' id='num_fatura' value='$num_fatura'>
				  <input name='codigo_orcamento' type='hidden' id='codigo_orcamento' value='$codigo_orcamento'>
				  <input name='veiculo' type='hidden' id='veiculo' value='$veiculo'>
				  <input name='placa' type='hidden' id='placa' value='$placa'>
				  <input name='codigo_de_retirada' type='hidden' id='codigo_de_retirada' value='$codigo_de_retirada'>
				  <input name='dateautorizacao' type='hidden' id='dateautorizacao' value='$dateretiradapedido'>
                  <input name='horaautorizacao' type='hidden' id='horaautorizacao' value='$horaretiradapedido'><br>
<input class='class01' type=image src='../../../imagens_botoes/ok.png' width='50' height='50' name='button2' id='button2' value='Autorizar'>
                </div>";
	?>
  <? if($area_a_focar_campo=="cancelamento_de_item"){ ?>
  <script language='JavaScript' type='text/javascript'>
document.cancel_item.cod_gerente.focus()
              </script>
  <? }  ?>
  <?
              echo "
			  Fatura: $num_fatura<br>
			  Or&ccedil;amento: $codigo_orcamento<br>
			  Produto: $codigoqueseraretiradodoorcamento<br>
			  </form>";
}
	
}
	
?>
  <strong><font color="#0000FF">
  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
  </font><font color="#0000FF">
  <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
  </font></strong><strong><font color="#0000FF">
  <input name="solicitacao" type="hidden" id="solicitacao">
  </font></strong><strong><font color="#0000FF">
  <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
  <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
  </font>
  <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
  <font color="#0000FF"> </font></strong></div></th>
                <th bgcolor="#1216CD" scope="col">&nbsp;</th>
                <th bgcolor="#1216CD" scope="col">&nbsp;</th>
                <th colspan="6" bgcolor="#1216CD" scope="col">&nbsp;</th>
              </table>
</p>
<p>
  
</p>
</th>
</body>
</html>
