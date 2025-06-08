<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
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

require '../../../conect/conect.php';
	include '../../../css_menus/modal.css';
	include '../../../css_menus/modal2.css';
	
$solicitacao = $_POST['solicitacao'];
	
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];



$sql500 = "select * from operadores where senha = '$senha'";
$res600 = mysql_query($sql500);
while($linha=mysql_fetch_row($res600)) {

$nome_operador = $linha[1];
	$operante = $linha[1];

$cidade_estab_pertence = $linha[45];

$estab_pertence = $linha[44];
	
}

	

$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$db = $linha[1];
}
	$codigo_orcamento = $_POST['codigo_orcamento'];
	
	$referencia_a_receber = $_POST['referencia_a_receber'];
		
	
$condicao = $_POST['condicao'];
$status_a_alterar = $_POST['status_a_alterar'];
	

$codigo_da_ocorrencia = $_POST['codigo_da_ocorrencia'];
	
	$tipomanutencao = $_POST['tipomanutencao'];
	$km = $_POST['km'];
	$horimetro = $_POST['horimetro'];
	$detalhamento = $_POST['detalhamento'];
	$valormanutencao = $_POST['valormanutencao'];
	$placa = $_POST['placa'];
	$datamanutencao = date('Y-m-d');
$horamanutencao = date('H:i:s');

$veiculo = $_POST['veiculo'];
$estab_pertence = $_POST['estab_pertence'];
$codigo_orcamento = $_POST['codigo_orcamento'];
$num_fatura = $_POST['num_fatura'];
	
	$datafechamento = date('d-').date('m-').date('Y');
	$datefechamento = date('Y-m-d');
	$diafechamento = date('d');
	$mesfechamento = date('m');
	$anofechamento = date('Y');
	$horafechamento = date('H:i:s');
	
$sql = "SELECT * FROM veiculos where placa = '$placa'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$chassi = $linha[19];

$renavam = $linha[20];
	
$corveiculo = $linha[30];
	
$tipoveiculo = $linha[67];
	
$numeroveiculo = $linha[68];
	
}

	
if($solicitacao=="mudar"){
	
$comando = "update `$db`.`orcamentos` set `condicao` = '$condicao',`status` = '$status_a_alterar',`cod_ocorrencia` = '$codigo_da_ocorrencia' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
	
}
	
	
if(($condicao=="PEDIDO") && ($status_a_alterar=="Finalizado") ){
	
$comando = "update `$db`.`orcamentos` set `status_fatura` = 'Finalizado',`datafechamento` = '$datafechamento',`diafechamento` = '$diafechamento',`mesfechamento` = '$mesfechamento',`anofechamento` = '$anofechamento',`horafechamento` = '$horafechamento' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
	
$comando = "update `$db`.`produtos_em_orcamentos` set `dataorcamento` = '$dataorcamento',`horaorcamento` = '$horaorcamento',`operador` = '$nome_operador',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`condicao` = '$condicao',`status` = '$status_a_alterar',`datealteracao` = '$datamanutencao',`horaalteracao` = '$horamanutencao',`departamento` = '$estab_pertence' where `produtos_em_orcamentos`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
	
$comando = "update `$db`.`faturamento_futuro` set `status_fatura` = 'Finalizado',`horafechamento` = '$horafechamento',`datafechamento` = '$datefechamento',`cod_ocorrencia` = '$codigo_da_ocorrencia' where `faturamento_futuro`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
	
$comando = "update `$db`.`ocorrencias` set `concessionaria` = '$estab_pertence',`codigo_orcamento` = '$codigo_orcamento',`municipio` = '$cidade_estab_pertence',`agente` = '$nome_operador',`valormanutencao` = '$valormanutencao',`localizacao` = '$cidade_estab_pertence',`statusocorrencia` = 'Finalizada' where `ocorrencias`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);
	
		
}
	
if($solicitacao=="atualizaquantestoque"){
	
	$item_atualizar = $_POST['item_atualizar'];
	$quant_estoque_atualizar = $_POST['quant_estoque_atualizar'];
	
	
	$saldo_estoque_da_peca = bcsub($quant_estoque,$quant_utilizada);
	
$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$codigo_interno_da_peca'";
mysql_query($comando,$conexao);
	
}
	

	
if($solicitacao=="detalhamento_obs"){
	

$comando = "insert into nfs_manutencao(cod_ocorrencia,num_fatura,codigo_orcamento,nf,fornecedor,veiculo,placa,chassi,renavam,datamanutencao,link_nf,valormanutencao,obs_adicional_da_manutencao,data_adicional,hora_adicional,operador_informante) 

values('$codigo_da_ocorrencia','$num_fatura','$codigo_orcamento','$nf','$estab_pertence','$veiculo','$placa','$chassi','$renavam','$datamanutencao','$link_nf','$valormanutencao','$detalhamento','$datamanutencao','$horamanutencao','$nome_operador')";
mysql_query($comando,$conexao);
	
	
$comando = "update `$db`.`orcamentos` set `tipomanutencao` = '$tipomanutencao',`km` = '$km',`horimetro` = '$horimetro' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento'";
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


$sql = "SELECT * FROM codigo_gerente where codigo = '$cod_gerente' and statuscodgerente = 'ativo' limit 1";

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

if(empty($cod_gerente)){
}
else{
	
if($statuscodgerente == "ativo"){
	
$data_retirado = date('Y-m-d');
$hora_retirado = date('H:i:s');

$codigo_de_retirada = $_POST['codigo_de_retirada'];
	$codigoqueseraretiradodoorcamento = $_POST['codigoqueseraretiradodoorcamento'];
$dateautorizacao = $_POST['dateautorizacao'];
$horaautorizacao = $_POST['horaautorizacao'];




$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$comando = "update `$linha[1]`.`pedido_de_retirada_produto_da_fatura` set `statusautorizacao` = 'Autorizado',`dateautorizacao` = '$dateautorizacao',`horaautorizacao` = '$horaautorizacao',`quemautorizou` = '$gerente_que_autorizou',`cod_gerente_utilizado` = '$cod_gerente' where `pedido_de_retirada_produto_da_fatura`. `codigo` = '$codigo_de_retirada' limit 1 ";
}

mysql_query($comando,$conexao);


//$sql3 = "select * from pedido_de_retirada_produto_da_fatura where num_fatura = '$num_fatura' and codigoorcamento = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret' and datepedido = '$datepedido' and horapedido = '$horapedido' order by datepedido desc limit 1";
$sql3 = "select * from pedido_de_retirada_produto_da_fatura where codigo = '$codigo_de_retirada' order by datepedido desc limit 1";

$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$codigo_de_retirada = $linha[0];
$statusautorizacao = $linha[15];
//$num_fatura_ret = $linha[10];
$codigo_orcamento_ret = $linha[11];
$cod_prod_ret = $linha[12];

}


if($statusautorizacao == "Autorizado"){
	
$sql4 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento_ret' and codigoproduto = '$codigoqueseraretiradodoorcamento' and num_fatura = '$num_fatura_ret' limit 1";
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





$saldo_estoque_da_peca = bcadd($quant_estoque,$quant_retirado);
	
	
	
	
$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$codigo_retirado'";
mysql_query($comando,$conexao);



	
	
$comando = "delete from `produtos_em_orcamento` where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento_ret' and codigoproduto = '$codigoqueseraretiradodoorcamento' and num_fatura = '$num_fatura_ret' limit 1 ";

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

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$razaosocial_empresa = $linha[1];

$nfantasia_empresa = $linha[2];

$cnpj_empresa = $linha[3];
$inscr_est_empresa = $linha[4];


$endereco_empresa = $linha[5];

$numero_empresa = $linha[6];

$bairro_empresa = $linha[7];

$cep_empresa = $linha[9];

$cidade_empresa = $linha[10];

$estado_empresa = $linha[11];

$telefone_empresa = $linha[12];

$fax_empresa = $linha[13];

$email_empresa = $linha[14];

$site_empresa = $linha[15];

}


?>


  <?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];



$sql500 = "select * from operadores where senha = '$senha'";
$res600 = mysql_query($sql500);
while($linha=mysql_fetch_row($res600)) {

$nome_operador = $linha[1];
	$operante = $linha[1];

$funcao = $linha[43];

$estab_pertence = $linha[44];

$ultimo_departamento_trabalhado = $linha[66];

$periodo = $linha[67];
}

?>
	
<?
	
//-----------calculando data de ontem--------------


$datadehoje = time(); 
$ontem = $datadehoje - (24*3600);
$datadeontem = date('Y-m-d', $ontem);
	
$sql = "SELECT * FROM cx_abertura where operador = '$nome_operador' and departamento = '$ultimo_departamento_trabalhado' order by dataabertura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$data_do_ultimo_registro_de_abertura_de_caixa = $linha[1];


}

//-------------fim do calculo da data de ontem------------	
	
	
	
?>
	
	
<?
	if($funcao=="GARCON"){
		if($ultimo_departamento_trabalhado=="CHURRASCARIALC"){
	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
		$linkvoltar = "../restaurante/atribuicao_de_mesas_dispositivomovel.php";
	}
	else{
	$linkvoltar = "../restaurante/atribuicao_de_mesas.php";
	}
		}else{
	
	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
		$linkvoltar = "../restaurante/atribuicao_de_mesas_dispositivomovel2.php";
	}
	else{
	$linkvoltar = "../restaurante/atribuicao_de_mesas2.php";
	}
}
	

	
}
else{
	
if($ultimo_departamento_trabalhado=="CHURRASCARIALC"){
	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
		$linkvoltar = "../restaurante/atribuicao_de_mesas_dispositivomovel.php";
	}
	else{
	$linkvoltar = "../restaurante/atribuicao_de_mesas.php";
	}
	}
	else{
	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
		$linkvoltar = "../restaurante/atribuicao_de_mesas_dispositivomovel2.php";
	}
	else{
	$linkvoltar = "../restaurante/atribuicao_de_mesas2.php";
		
	}
}
	



}

?>





<?
	
$nome = $_POST['nome'];
	$num_fatura = $_POST['num_fatura'];

	
	
	
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
if(empty($nome)){
echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE INFORMAR UM CLIENTE');
window.location = '../../index.php';

</script>";
	
}
else{
	
$sql = "SELECT * FROM clientes where nome = '$nome'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_cli = mysql_num_rows($res);

$nomedofuncionario = $linha[1];
$clientedoservico = $linha[3];
$empresaconveniada = $linha[137];
$comandadofuncionario = $linha[138];
$statusfuncionario = $linha[139];
}

if(empty($empresaconveniada)){
	
$empresa_do_convenio = $estab_pertence;
	
}
else{
	
$empresa_do_convenio = $empresaconveniada;
	
}
	
	
//$sql = "SELECT * FROM comandas where codigo = '$nome' and comanda <> 'CONSUMIDOR' and empresaconveniada = '$empresa_do_convenio' and status = 'ativo'";
//$res = mysql_query($sql);
	//$comandasencontradas_de_empresaconveniada = mysql_num_rows($res);

	
$sql = "SELECT * FROM comandas where comanda = '$nome' and empresaconveniada = '$empresa_do_convenio' and statusfuncionario = 'Ativo'";
$res = mysql_query($sql);
	$comandasencontradas = mysql_num_rows($res);
	
	//if($comandasencontradas<=0){
		
		
		
	//echo "<script>
	
	//alert('ATENCAO!!!... COMANDA $nome $empresa_do_convenio NAO IDENTIFICADA!!!...');
	//window.location ='../index.php';
	//</script>";
			
		
	
	//}
	//else{
	
	
if($registros_cli==0){

$comando = "insert into clientes(nome,cpf,email,operador,empresaconveniada,comandadofuncionario,statusfuncionario,funcao) values('$nome','$nome','$email','$nome_op','$empresa_do_convenio','$nome','Ativo','ESPORADICO')";
mysql_query($comando,$conexao) or die("Erro ao gravar cliente!");
	
$sql = "SELECT * FROM clientes where nome = '$nome'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;


$codigo_cliente= $linha[0];

$nomedofuncionario = $linha[1];

$sexo = $linha[2];

$estadocivil = $linha[3];

$cpfdocliente = $linha[4];

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

//$obs = $linha[28];

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

$tipo = $linha[40];

$banco = $linha[41];

$agencia = $linha[42];

$conta = $linha[43];

$num_beneficio = $linha[44];

$obs2 = $linha[77];

$mes_niver = $linha[88];

$status_cliente = $linha[89];


$local_trabalho = $linha[134];
$fone_comercial = $linha[135];
$newsletter = $linha[136];
$empresaconveniada = $linha[137];
$comandadofuncionario = $linha[138];
$statusfuncionario = $linha[139];
}

}
else{
	
$sql = "SELECT * FROM clientes where nome = '$nome'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;


$codigo_cliente= $linha[0];

$nomedofuncionario = $linha[1];

$sexo = $linha[2];

$estadocivil = $linha[3];

$cpfdocliente = $linha[4];

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

//$obs = $linha[28];

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

$tipo = $linha[40];

$banco = $linha[41];

$agencia = $linha[42];

$conta = $linha[43];

$num_beneficio = $linha[44];

$obs2 = $linha[77];

$mes_niver = $linha[88];

$status_cliente = $linha[89];


$local_trabalho = $linha[134];
$fone_comercial = $linha[135];
$newsletter = $linha[136];
$empresaconveniada = $linha[137];
$comandadofuncionario = $linha[138];
$statusfuncionario = $linha[139];
}
}
//}
	
//if(empty($empresaconveniada)){
	
//$empresa_do_convenio = $estab_pertence;
	
//}
//else{
	
//$empresa_do_convenio = $empresaconveniada;
	
//}
	

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$empresa_do_convenio' limit 1";	
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$diafechamento = $linha[45];
$statusempresaconveniada = $linha[41];

}
	

?>
	
	
	
	
	
	


<?
//-------------------INICIO DE RETIRADA DE PRODUTO NO ORÇAMENTO --------------------------

if(empty($cod_prod_ret)){
	
}
else{
	
$sql = "SELECT * FROM produtos_em_orcamento where codigoproduto = '$cod_prod_ret' limit 1";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$categoria = $linha[19];

}


if($categoria=="REFEICOES RESTAURANTE"){
	
$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$comando = "update `$linha[1]`.`orcamentos` set `categoria` = '' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento_ret' limit 1 ";
}

mysql_query($comando,$conexao);
		
}

	
	
	
//$comando = "delete from `produtos_em_orcamento` where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento_ret' and codigo = '$cod_prod_ret' limit 1 ";

//mysql_query($comando,$conexao);





$sql3 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento_ret'";

$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$categoria = $linha[19];


if($categoria=="REFEICOES RESTAURANTE"){
	
$sql4 = "select * from db";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$comando = "update `$linha[1]`.`orcamentos` set `categoria` = '$categoria' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento_ret'";
}

mysql_query($comando,$conexao);
		
}

}


}
	
//-------------------FIM DE RETIRADA DE PRODUTO NO ORÇAMENTO --------------------------

//$diaabertura = date('d');
//$mesabertura = date('m');
//$anoabertura = date('Y');


$datecadastroseparada = $datecadastro;

$datecadastroseparada2 = explode("-", $datecadastroseparada);



$anoabertura = $datecadastroseparada2[0];

$mesabertura = $datecadastroseparada2[1];

$diaabertura = $datecadastroseparada2[2];



//$datafechameno = date('d-m-Y');
$horafechamento = $hora_atual;
//$diafechamento = date('d');
//$mesfechamento = date('m');
//$anofechamento = date('Y');

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
	
	
if($dia_referencia>$diafechamento){
	
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


if($comandasencontradas<=0){
}
	else{

if($solicitacao=="abrir_orcamento"){
	
$recuar = "../../index.php";
	if(($statusfuncionario=="inativo") or ($statusempresaconveniada=="Inativo")){
		
		if($statusfuncionario=="inativo"){
		
		echo "<script>

alert('ATENÇÃO!!!... FUNCIONARIO $nomedofuncionario INATIVO! MOVIMENTACAO IMPOSSIBILITADA!');
window.location = '$recuar';

</script>";
		}
		
		if($statusempresaconveniada=="Inativo"){
		
		echo "<script>

alert('ATENÇÃO!!!... EMPRESA $empresaconveniada INATIVO! MOVIMENTACAO IMPOSSIBILITADA!');
window.location = '$recuar';

</script>";
		}
		
	}
	else{
	
if($dia_referencia>$diafechamento){
	
	
$sql = "SELECT * FROM faturamento_futuro where loja = '$estab_pertence' and status_fatura = 'Aberto' and empresaconveniada = '$empresa_do_convenio' and comanda_utilizada = '$comandadofuncionario' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_fatura_aberta = mysql_num_rows($res);
	
$cod_fatura = $linha[0];
$datefaturamento = $linha[1];
$cod_orcamento_na_fatura = $linha[6];
$qualmes = $linha[3];
$qualano = $linha[4];
	

}
	//echo " > $registros_fatura_aberta - $cod_fatura - $qualmes/$mes_abertura_fatura - $qualano/$ano_abertura_fatura<";

	
if(($registros_fatura_aberta>=1) && ($qualmes<>$mes_abertura_fatura) && ($qualano==$ano_abertura_fatura) ){
	

$comando = "update `$db`.`faturamento_futuro` set `status_fatura` = 'Finalizado' where `faturamento_futuro`. `num_fatura` = '$cod_fatura' limit 1 ";
mysql_query($comando,$conexao);
	
$comando = "update `$db`.`orcamentos` set `status_fatura` = 'Finalizado',`status` = 'Finalizado',`status_conta` = 'Finalizado' where `orcamentos`. `num_fatura` = '$cod_fatura' limit 1 ";
mysql_query($comando,$conexao);
	
	
	
$comando = "insert into faturamento_futuro(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,departamento,cliente,cpf,comanda_utilizada,empresaconveniada,nomedofuncionario,status_conta)

values('$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','Aberto','$estab_pertence','$operante','$estab_pertence','$nome','$cpfdocliente','$comandadofuncionario','$empresa_do_convenio','$nomedofuncionario','Aberto')";
mysql_query($comando,$conexao);

	
}
else{
	
$comando = "insert into faturamento_futuro(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,departamento,cliente,cpf,comanda_utilizada,empresaconveniada,nomedofuncionario,status_conta)

values('$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','Aberto','$estab_pertence','$operante','$estab_pertence','$nome','$cpfdocliente','$comandadofuncionario','$empresa_do_convenio','$nomedofuncionario','Aberto')";
mysql_query($comando,$conexao);
	
	
$sql6 = "SELECT * FROM faturamento_futuro where loja = '$estab_pertence' and status_fatura = 'Aberto' and empresaconveniada = '$empresa_do_convenio' and comanda_utilizada = '$comandadofuncionario' order by num_fatura desc limit 1";
$res6 = mysql_query($sql6);
while($linha=mysql_fetch_row($res6)) {
$registros_fatura = mysql_num_rows($res6);
	
$cod_orcamento_na_fatura = $linha[6];
$qualmes = $linha[3];
$qualano = $linha[4];
	

}		
		
		
		
		
	}
	
	
}
else{
	
	//echo "ta caindo aqui";
	
$sql = "SELECT * FROM faturamento_futuro where loja = '$estab_pertence' and status_fatura = 'Aberto' and empresaconveniada = '$empresa_do_convenio' and comanda_utilizada = '$comandadofuncionario' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_fatura_aberta = mysql_num_rows($res);
	
$cod_fatura = $linha[0];
$cod_orcamento_na_fatura = $linha[6];
$qualmes = $linha[3];
$qualano = $linha[4];
	

}
	
$comando = "update `$db`.`faturamento_futuro` set `status_fatura` = 'Finalizado' where `faturamento_futuro`. `num_fatura` = '$cod_fatura' limit 1 ";
mysql_query($comando,$conexao);
	
$comando = "update `$db`.`orcamentos` set `status_fatura` = 'Finalizado',`status` = 'Finalizado',`status_conta` = 'Finalizado' where `orcamentos`. `num_fatura` = '$cod_fatura' limit 1 ";
mysql_query($comando,$conexao);
	
	
	
$comando = "insert into faturamento_futuro(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,departamento,cliente,cpf,comanda_utilizada,empresaconveniada,nomedofuncionario,status_conta)

values('$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','Aberto','$estab_pertence','$operante','$estab_pertence','$nome','$cpfdocliente','$comandadofuncionario','$empresa_do_convenio','$nomedofuncionario','Aberto')";
mysql_query($comando,$conexao);
	
	//$comando = "insert into faturamento_futuro(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,departamento,cliente,cpfdocliente,comanda_utilizada,empresaconveniada,nomedofuncionario,status_conta)

//values('$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','Aberto','$empresa_do_convenio','$nome_operador','$empresa_do_convenio','$nome','$cpfdocliente','$comandadofuncionario','$empresa_do_convenio','$nomedofuncionario','Aberto')";
//mysql_query($comando,$conexao);
	

$sql7 = "SELECT * FROM faturamento_futuro where loja = '$estab_pertence' and status_fatura = 'Aberto' and empresaconveniada = '$empresa_do_convenio' and comanda_utilizada = '$comandadofuncionario' order by num_fatura desc limit 1";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_fatura = mysql_num_rows($res7);
	
$cod_orcamento_na_fatura = $linha[6];
$qualmes = $linha[3];
$qualano = $linha[4];
	

}
	

	
}
	
	
	

//------------ATUALIZANDO ORCAMENTOS NA FATURA--------------------------------
	
if($registros_fatura>=1){




$sql8 = "SELECT * FROM faturamento_futuro where loja = '$estab_pertence' and status_fatura = 'Aberto' and empresaconveniada = '$empresa_do_convenio' and comanda_utilizada = '$comandadofuncionario' order by num_fatura desc limit 1";
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
	


}
}
else{
	
$comando = "insert into faturamento_futuro(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,departamento,cliente,cpf,comanda_utilizada,empresaconveniada,nomedofuncionario,status_conta)

values('$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','Aberto','$estab_pertence','$operante','$estab_pertence','$nome','$cpfdocliente','$comandadofuncionario','$empresa_do_convenio','$nomedofuncionario','Aberto')";
mysql_query($comando,$conexao);



	
$sql9 = "SELECT * FROM faturamento_futuro where loja = '$estab_pertence' and status_fatura = 'Aberto' and empresaconveniada = '$empresa_do_convenio' and comanda_utilizada = '$comandadofuncionario' order by num_fatura desc limit 1";
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
}

}
	
	

	

$sql100 = "SELECT * FROM orcamentos where loja = '$estab_pertence' and status = 'Aberto' and num_fatura = '$num_fatura' and status_fatura = 'Aberto' and empresaconveniada = '$empresa_do_convenio' order by codigo_orcamento desc limit 1";
$res100 = mysql_query($sql100);
while($linha=mysql_fetch_row($res100)) {
$registros = mysql_num_rows($res100);
$total_orcamentos_abertos = mysql_num_rows($res100);


$codigo_orcamento = $linha[0];

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
	
	
$comando = "insert into orcamentos(condicao,loja,status,operador,dataabertura,horaabertura,diaabertura,mesabertura,anoabertura,codigo_cliente,cpf,nome,num_fatura,status_fatura,status_conta,departamento,comanda_utilizada,empresaconveniada,nomedofuncionario,dia_fatura,mes_fatura,ano_fatura,data_fatura,hora_fatura,placa,veiculo)

values('ORCAMENTO','$estab_pertence','Aberto','$nome_operador','$data_abertura_fatura','$horaabertura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$codigo_cliente','$cpfdocliente','$nomedofuncionario','$num_fatura','Aberto','Aberto','$estab_pertence','$comanda_utilizada','$empresa_do_convenio','$nomedofuncionario','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$datefaturamento','$horafaturamento','$placa','$veiculo')";
 
mysql_query($comando,$conexao);
	

 

$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and status = 'Aberto' and num_fatura = '$num_fatura' and status_fatura = 'Aberto' and nome = '$nome' and comanda_utilizada = '$comandadofuncionario' and empresaconveniada = '$empresa_do_convenio' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

$dataorcamento = $linha[1];
$horaorcamento = $linha[2];
	

$codigo_orcamento = $linha[0];
$loja = $linha[6];
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
	
	
	
$comando = "insert into ocorrencias(datamanutencao,horamanutencao,concessionaria,municipio,tipomanutencao,placa,renavam,chassi,condutor,agente,corveiculo,horimetro,km,valormanutencao,descontar,veiculo,tipoveiculo,numeroveiculo,localizacao,fornecedor,nf,link_nf,operador,reembolso,statusocorrencia,codigo_orcamento,num_fatura,detalhamento) 

values('$datamanutencao','$horamanutencao','$estab_pertence','$cidade_estab_pertence','$tipomanutencao','$placa','$renavam','$chassi','$nome_operador','$nome','$corveiculo','$horimetro','$km','$valormanutencao','nao','$veiculo','$tipoveiculo','$numeroveiculo','$localizacao','$fornecedor','$nf','$link_nf','$nome_operador','$reembolso','Aberto','$codigo_orcamento','$num_fatura','Manutencao aberta automaticament atrves do orçamento $codigo_orcamento e Fatura $num_fatura')";
mysql_query($comando,$conexao);
	
	
	
	
$sql = "SELECT * FROM ocorrencias where concessionaria = '$estab_pertence' and num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_da_ocorrencia = $linha[0];
	$codigo_da_ocorrencia_detalhamento = $linha[0];
	
}

}
else{
	
	
$sql = "SELECT * FROM ocorrencias where concessionaria = '$estab_pertence' and num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_da_ocorrencia = $linha[0];
	$codigo_da_ocorrencia_detalhamento = $linha[0];
	
}


$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and status = 'Aberto' and num_fatura = '$num_fatura' and status_fatura = 'Aberto' and nome = '$nomedofuncionario' and comanda_utilizada = '$comandado
' and empresaconveniada = '$empresa_do_convenio' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

$dataorcamento = $linha[1];
$horaorcamento = $linha[2];


$codigo_orcamento = $linha[0];
$loja = $linha[6];
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

}

$comando = "update `$db`.`comandas` set `statuscomanda` = 'OCUPADA',`codigo_orcamento` = '$codigo_orcamento' where `comandas`. `codigo` = '$comandadofuncionario'";
mysql_query($comando,$conexao);

}



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
	
$sql = "SELECT * FROM faturamento_futuro where loja = '$ultimo_departamento_trabalhado' and status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' and empresaconveniada = '$empresa_do_convenio' and comanda_utilizada = '$comandadofuncionario' order by num_fatura desc limit 1";
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

$cliente_nfe = $linha[22];
$cpf_nfe = $linha[23];

$ultimo_orcamento = $linha[45];
$comanda_utilizada = $linha[46];

$empresaconveniada = $linha[48];
$nomedofuncionario = $linha[49];
}
	
$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and status = 'Aberto' and num_fatura = '$num_fatura' and status_fatura = 'Aberto' and comanda_utilizada = '$comandadofuncionario' and empresaconveniada = '$empresa_do_convenio' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

$dataorcamento = $linha[5];
$horaorcamento = $linha[6];
	
$codigo_orcamento = $linha[0];
$loja = $linha[43];
//$total_geral_registrado = $linha[7];

$operador = $linha[4];

$condicao = $linha[42];

$status = $linha[2];

$placa = $linha[28];
$veiculo = $linha[29];
	
$tipomanutencao = $linha[37];
$km = $linha[31];
$horimetro = $linha[32];
$detalhamento = $linha[41];
	
}
	
	
$sql = "SELECT * FROM ocorrencias where concessionaria = '$estab_pertence' and num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_da_ocorrencia = $linha[0];
	$codigo_da_ocorrencia_detalhamento = $linha[0];
	
}
	
	
	
$item = $_POST['item'];
	$itemservico = $_POST['itemservico'];
$cod_barras = $_POST['cod_barras'];
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

$sql = "SELECT * FROM estoque_pecas where cod_barras = '$cod_barras' and estab_pertence = '$estab_pertence' limit 1";

}
else{
	
$sql = "SELECT * FROM estoque_pecas where nome_produto = '$item' and estab_pertence = '$estab_pertence' limit 1";

}

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$referencia = $linha[0];
$foto = $linha[1];
$material = $linha[2];
$cor = $linha[3];
$categoria = $linha[4];
$sub_categoria = $linha[5];
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
$departamento = $linha[39];



if($classe=="O"){
	
$departamento_a_gravar = $estab_pertence;

}
else{
	
$departamento_a_gravar = $departamento;
	
}



$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco = $preco_oferta;

}
else{
	
$preco = $preco_normal;
	
}

$total_fornecedor = bcmul($quantidade,$preco_compra,2);


$total = bcmul($quantidade,$preco,2);




//$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$total_impostos = 	bcmul($total,$impostos_venda_decimal,2);

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;

$total_impostos_venda = 	bcmul($total,$impostos_venda_decimal,2);


$sql20 = "SELECT * FROM subcategoria_ec where empresaconveniada = '$estab_pertence' and sub_categoria_permitida = '$sub_categoria' limit 1";	
$res20 = mysql_query($sql20);
while($linha=mysql_fetch_row($res20)) {

$sub_categoria_permitida = $linha[2];

}
	

if($sub_categoria==$sub_categoria_permitida){
	
$datalancamento = date('Y-m-d');
$dialancamento = date('d');
$meslancamento = date('m');
$anolancamento = date('Y');
$horalancamento = date('H:i:s');
	
if($quantidade<$quant_estoque){
	
echo "<script>

alert('ATENÇÃO!!!... QUANTIDADE MENOR QUE ZERO NÃO PERMITIDA!!!... IMPOSSIVEL IMPOSSÍVEL SEGUIR COM A OPERACAO!');


</script>";
	
}
else{
	
	
$sql21 = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' and departamento = '$ultimo_departamento_trabalhado' and codigoproduto = '$codigoproduto' limit 1";
$res21 = mysql_query($sql21);
$registro_produto_no_orcamento = mysql_num_rows($res21);

if($sub_categoria=="REFEICAO"){

if((empty($item)) && (empty($cod_barras))){
echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE INFORMAR O CODIGO OU O NOME DO PRODUTO');


</script>";

}
else{

$comando = "insert into produtos_em_orcamento(codigo_orcamento,loja,codigo_cliente,nome,endereco,numero,bairro,cidade,estado,telefone,celular,email,cep,cpf,rg,dataorcamento,horaorcamento,codigoproduto,nomeproduto,categoria,subcategoria,precocompra,quant,preco0,preco1,preco2,preco3,acrescimo,acrescimodecimal,acrescimomonetario,total,operador,descontoetapa0,baseparaproximodesconto0,condicao,status,status_fatura,total_impostos,total_fornecedor,preco_normal,oferta,preco_oferta,margem_lucro,margem_lucro_informado,impostos,impostos_informado,margem_folga,margem_folga_decimal,impostos_compra,impostos_compra_decimal,total_impostos_compra,total_impostos_venda,setor,departamento,dia,mes,ano,num_fatua,data_fatura,dia_fatura,mes_fatura,ano_fatura,hora_fatura,descontomaximopermitidodoproduto)

values('$codigo_orcamento','$loja','$codigo_cliente','$nome','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf_cliente','$rg','$dataorcamento','$horaorcamento','$codigoproduto','$nomeproduto','$categoria','$sub_categoria','$preco_compra','$quantidade','$preco','0','0','0','0','0','0','$total','$operador','0','$total','$condicao','$status','A FATURAR','$total_impostos','$total_fornecedor','$preco_normal','$oferta','$preco_oferta','$margem_lucro','$margem_lucro_informada','$impostos','$impostos_informado','$margem_folga','$margem_folga_decimal','$impostos_compra','$impostos_compra_decimal','$total_impostos_compra','$total_impostos_venda','$setor','$departamento_a_gravar','$dialancamento','$meslancamento','$anolancamento','$num_fatura','$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','$descontomaximopermitidodoproduto')";
	
	mysql_query($comando,$conexao);
	

	
}

}
else{

	if($registro_produto_no_orcamento>=1){
		
$sql22 = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' and departamento = '$ultimo_departamento_trabalhado' and codigoproduto = '$codigoproduto' limit 1";
$res22 = mysql_query($sql22);
while($linha=mysql_fetch_row($res22)) {

$codigo_do_lancamento_da_compra = $linha[0];
$quant_comprada = $linha[21];
//$preco_comprada = $linha[22];
}
		
	
$atualiza_quantidade = bcadd($quant_comprada,$quantidade);
$atualiza_total_do_item_no_orcamento = bcmul($atualiza_quantidade,$preco,2);
		

		
$comando = "update `$db`.`produtos_em_orcamento` set `quant` = '$atualiza_quantidade',`preco0` = '$preco',`total` = '$atualiza_total_do_item_no_orcamento',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigo_do_lancamento_da_compra' limit 1 ";
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

alert('ATENÇÃO!!!... QUANTIDADE MAIOR QUE NO ESTOQUE E ISSO NÃO É PERMITIDO!!!... IMPOSSIVEL IMPOSSÍVEL SEGUIR COM A OPERACAO!');
window.location = 'orcamento.php#atualiza_estoque';

</script>";
	
}
else{
	
	
	$comando = "insert into produtos_em_orcamento(codigo_orcamento,loja,codigo_cliente,nome,endereco,numero,bairro,cidade,estado,telefone,celular,email,cep,cpf,rg,dataorcamento,horaorcamento,codigoproduto,nomeproduto,categoria,subcategoria,precocompra,quant,preco0,preco1,preco2,preco3,acrescimo,acrescimodecimal,acrescimomonetario,total,operador,descontoetapa0,baseparaproximodesconto0,condicao,status,status_fatura,total_impostos,total_fornecedor,preco_normal,oferta,preco_oferta,margem_lucro,margem_lucro_informado,impostos,impostos_informado,margem_folga,margem_folga_decimal,impostos_compra,impostos_compra_decimal,total_impostos_compra,total_impostos_venda,setor,departamento,dia,mes,ano,num_fatura,data_fatura,dia_fatura,mes_fatura,ano_fatura,hora_fatura,descontomaximopermitidodoproduto)

values('$codigo_orcamento','$loja','$codigo_cliente','$nome','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf_cliente','$rg','$dataorcamento','$horaorcamento','$codigoproduto','$nomeproduto','$categoria','$sub_categoria','$preco_compra','$quantidade','$preco','0','0','0','0','0','0','$total','$operador','0','$total','$condicao','$status','A FATURAR','$total_impostos','$total_fornecedor','$preco_normal','$oferta','$preco_oferta','$margem_lucro','$margem_lucro_informada','$impostos','$impostos_informado','$margem_folga','$margem_folga_decimal','$impostos_compra','$impostos_compra_decimal','$total_impostos_compra','$total_impostos_venda','$setor','$departamento_a_gravar','$dialancamento','$meslancamento','$anolancamento','$num_fatura','$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','$descontomaximopermitidodoproduto')";
	
	mysql_query($comando,$conexao);
	
	
		
$saldo_estoque_da_peca = bcsub($quant_estoque,$quantidade);
	

	
$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$referencia'";
mysql_query($comando,$conexao);
	
	
}
	
	
	

}
	
	}
	
	}//encerra se não for refeicao
	
}
	
$sql = "select sum(total) as total_liquido from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_liquido_produtos = $linha['total_liquido'];


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}
$comando = "update `$db`.`faturamento_futuro` set `total_geral` = '$total_liquido_produtos' where `faturamento_futuro`. `num_fatura` = '$num_fatura' limit 1 ";
mysql_query($comando,$conexao);



	
	
}
else{
echo "<script>

alert('ATENÇÃO!!!... SUB-CATEGORIA $sub_categoria $sub_categoria_permitida NÃO PERMITIDA POR $empresa_do_convenio! IMPOSSIVEL ADICIONAR PRODUTO!');


</script>";
	
}


if($categoria=="REFEICOES RESTAURANTE"){
	
$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	
$db = $linha[1];
}

$comando = "update `$db`.`orcamentos` set `categoria` = '$categoria' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
mysql_query($comando,$conexao);

}
		





//$custo_cmv_etapa1 = bcadd($diferenca_normal_para_oferta_vezes_quantidade,$calculando_impostos,2);

//$custo_cmv_etapa2 = bcadd($descontosconcedidos,$totalfornecedor,2);

//$totalizacao_cmv = bcadd($custo_cmv_etapa1,$custo_cmv_etapa2,2);






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



 
$sql = "select sum(total) as total_liquido from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

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
	
$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

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


$sql2 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$codigolancamento = $linha[0];





$sql3 = "select * from db";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `acrescimo_por_rateio` = '$acrescimo_por_rateio',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento'";
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


$comando = "update `$linha[1]`.`orcamentos` set `entrada` = '$entrada',`status_fatura` = '',`quantparc` = '$quantparc',`modopagto` = '$modopagto',`cartao` = '$cartao',`valorparcela` = '$valorparcela',`total_geral` = '$total_geral',`obs` = '$obs',`desconto_de_arredondamento` = '$desconto_de_arredondamento',`acrescimo_de_arredondamento` = '$acrescimo_de_arredondamento',`departamento` = '$estab_pertence' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);


}
                   
                    
                    
?>






<?

//------------------INICIO DE ALTERAÇÃO DOS PRODUTOS NO ORÇAMENTO-------------------------

$codigolancamento = $_POST['codigolancamento'];



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




$sql = "SELECT * FROM estoque_pecas where codigo = '$cod_prod_at' limit 1";
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


$sql = "SELECT * FROM estoque_pecas where codigo = '$cod_prod_at' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_normal = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$codigoproduto = $linha[11];
$cod_barras = $linha[15];
$quant_estoque = $linha[16];
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


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalsemdesconto_etapa0,$impostos_venda_decimal,2);

}

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco0` = '$preco_at',`preco1` = '0',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa0` = '0',`descontoetapa1` = '0',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa0` = '0',`descontodecimaletapa1` = '0',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa0` = '0',`descontomonetarioetapa1` = '0',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalsemdesconto_etapa0',`baseparaproximodesconto0` = '$baseparaproximodesconto0',`baseparaproximodesconto1` = '0',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}


}

//------------------FIM ETAPA 0---------------------------------------



//-----------INICIO ETAPA 1-------------------------------

	
if(($desconto_at >= 0.01) && ($desconto_at <=5)){
	

$sql = "SELECT * FROM estoque_pecas where codigo = '$cod_prod_at' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$preco_normal = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$codigoproduto = $linha[11];
$cod_barras = $linha[15];
$quant_estoque = $linha[16];
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


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}





}

//------------------FIM ETAPA 1---------------------------------------


//------------------INICIO ETAPA 2---------------------------------------

if(($desconto_at >=5.01) && ($desconto_at <=10)){

$sql = "SELECT * FROM produtos_em_orcamento where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$descontoregistradoetapa1 = $linha[68];

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


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}

//--------------------------------


$sql = "SELECT * FROM produtos_em_orcamento where codigo = '$codigolancamento' limit 1";
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


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa2,$impostos_venda_decimal,2);

}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco2` = '$preco2menosdescontoetapa2',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa2` = '$descontoetapa2',`descontoetapa3` = '0',`descontodecimaletapa2` = '$descontodecimaletapa2',`descontodecimaletapa3` = '0',`descontomonetarioetapa2` = '$descontomonetarioetapa2',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa2',`baseparaproximodesconto2` = '$baseparaproximodesconto2',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);




}

//------------------FIM ETAPA 2---------------------------------------





//------------------INICIO ETAPA 3---------------------------------------



if(($desconto_at >=10.01) && ($desconto_at <=15)){


$sql = "SELECT * FROM produtos_em_orcamento where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$descontoregistradoetapa1 = $linha[68];

$descontoregistradoetapa2 = $linha[70];


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


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}

//--------------------------------


$sql = "SELECT * FROM produtos_em_orcamento where codigo = '$codigolancamento' limit 1";
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


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa2,$impostos_venda_decimal,2);

}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco2` = '$preco2menosdescontoetapa2',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa2` = '$descontoetapa2',`descontoetapa3` = '0',`descontodecimaletapa2` = '$descontodecimaletapa2',`descontodecimaletapa3` = '0',`descontomonetarioetapa2` = '$descontomonetarioetapa2',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa2',`baseparaproximodesconto2` = '$baseparaproximodesconto2',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);


//--------------------------------------------------


$sql = "SELECT * FROM produtos_em_orcamento where codigo = '$codigolancamento' limit 1";
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


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa3,$impostos_venda_decimal,2);

}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco3` = '$preco3menosdescontoetapa3',`quant` = '$quantidade_at',`descontoetapa3` = '$descontoetapa3',`descontodecimaletapa3` = '$descontodecimaletapa3',`descontomonetarioetapa3` = '$descontomonetarioetapa3',`total` = '$totalcomdesconto_etapa3',`baseparaproximodesconto3` = '$baseparaproximodesconto3',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);




}




//------------------FIM ETAPA 3---------------------------------------



//------------------INICIO ETAPA 4---------------------------------------


if(($desconto_at >=15.01) && ($desconto_at <=20)){


$sql = "SELECT * FROM produtos_em_orcamento where codigo = '$codigolancamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$descontoregistradoetapa1 = $linha[68];

$descontoregistradoetapa2 = $linha[70];

$descontoregistradoetapa3 = $linha[72];


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


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa1,$impostos_venda_decimal,2);

}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}

//--------------------------------


$sql = "SELECT * FROM produtos_em_orcamento where codigo = '$codigolancamento' limit 1";
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


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa2,$impostos_venda_decimal,2);

}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco2` = '$preco2menosdescontoetapa2',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa2` = '$descontoetapa2',`descontoetapa3` = '0',`descontodecimaletapa2` = '$descontodecimaletapa2',`descontodecimaletapa3` = '0',`descontomonetarioetapa2` = '$descontomonetarioetapa2',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa2',`baseparaproximodesconto2` = '$baseparaproximodesconto2',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);


//--------------------------------------------------


$sql = "SELECT * FROM produtos_em_orcamento where codigo = '$codigolancamento' limit 1";
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


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa3,$impostos_venda_decimal,2);

}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco3` = '$preco3menosdescontoetapa3',`quant` = '$quantidade_at',`descontoetapa3` = '$descontoetapa3',`descontodecimaletapa3` = '$descontodecimaletapa3',`descontomonetarioetapa3` = '$descontomonetarioetapa3',`total` = '$totalcomdesconto_etapa3',`baseparaproximodesconto3` = '$baseparaproximodesconto3',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);


//-------------------------------------


$sql = "SELECT * FROM produtos_em_orcamento where codigo = '$codigolancamento' limit 1";
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


if(empty($preco_compra)){
	
}
else{

$total_impostos_compra = 	bcdiv($preco_compra,$impostos_compra_decimal,2)-$preco_compra;


$total_impostos_venda = 	bcmul($totalcomdesconto_etapa4,$impostos_venda_decimal,2);

}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco4` = '$preco4menosdescontoetapa4',`quant` = '$quantidade_at',`descontoetapa4` = '$descontoetapa4',`descontodecimaletapa4` = '$descontodecimaletapa4',`descontomonetarioetapa4` = '$descontomonetarioetapa4',`total` = '$totalcomdesconto_etapa4',`baseparaproximodesconto4` = '$baseparaproximodesconto4',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda',`descontomaximopermitidodoproduto` = '$descontomaximopermitidodoproduto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);








}







//------------------FIM ETAPA 4---------------------------------------


}










//-------------------FIM DE ALTEREÇÃO DOS PRODUTOS EM ORÇAMENTO-------------------------------

?>


<?

$sql = "select sum(total) as total_liquido from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_liquido_produtos = $linha['total_liquido'];



	
$total_geral_momentaneo = $total_liquido_produtos;
	


$comando = "update `$db`.`orcamentos` set `total` = '$total_geral_momentaneo',`departamento` = '$estab_pertence' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
mysql_query($comando,$conexao);
	




//$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and status = 'Aberto' and num_fatura = '$num_fatura' and status_fatura = 'Aberto' order by codigo_orcamento desc limit 1";
	
$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento' and loja = '$estab_pertence' and num_fatura = '$num_fatura' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {
	

$codigolancamento = $linha[0];
	$codigo_orcamento = $linha[0];
	

$condicao = $linha[42];
$num_fatura = $linha[48];
$cod_cli = $linha[45];
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

}
	
	
$sql = "SELECT * FROM ocorrencias where concessionaria = '$estab_pertence' and num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_da_ocorrencia = $linha[0];
	$codigo_da_ocorrencia_detalhamento = $linha[0];
	
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
<form name="form1" method="post" action="../../veiculos/verifica.php">
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
<table width="100%"  border="0">
        <tr>
          <td width="238"><div align="center">              <form name="form7" method="post" action="finalizar_orcamento.php">
                <span class="style3">                </span>
                <table width="100%" border="0">
                  <tr>
                    <td background="../../imagens_sistema/fundocelulas2.png" width="33%"><div align="center" class="style6">
 
                      <p><b>Empresa Conveniada:  <? echo "$empresa_do_convenio <br>"; ?>
						  Cliente: <? echo "$nome <br>"; ?>
                      Fatura: <? echo "$num_fatura <br>"; ?>
                      Or&ccedil;amento: <? echo "$codigo_orcamento <br>"; ?>
						   Veiculo: <? echo "$veiculo <br>"; ?>
				      Placa: <? echo "$placa <br>"; ?></b></p>
                    </div>
					  </td>
					  
                    <td width="49%" valign="top" background="../../imagens_sistema/fundocelulas2.png"><div align="center" class="style6">
                      <p><b>
                        Loja: <? echo "$estab_pertence <br>"; ?>
                        Funcionario: <? echo "$nome_operador <br>"; ?></b></p>
                      <p><b>Tipo Manutencao: <? echo "$tipomanutencao <br>"; ?> KM Atual: <? echo "$km <br>"; ?> Horimetro: <? echo "$horimetro <br>"; ?></b></p>
                    </div></td>
					  
                    <td width="18%" valign="top" background="../../imagens_sistema/fundocelulas2.png"><div align="center" class="class01">
                      <?
$exibir_total_do_orcamento = bcadd($total_geral_momentaneo,0,2);

echo "Total<br>
R$ ".$exibir_total_do_orcamento;

$comando = "update `$db`.`faturamento_futuro` set `total_geral` = '$exibir_total_do_orcamento',`codigo_orcamento` = '$codigo_orcamento',`codigo_cliente` = '$codigo_cliente' where `faturamento_futuro`. `num_fatura` = '$num_fatura' limit 1 ";
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

<table width="100%"  border="0">
              <tr>
                <td width="40%" background="../../imagens_sistema/fundocelulas2.png"> <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?> <form name="itens" method="post" action="orcamento.php">
                  <div align="center"><strong>
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                  PE&Ccedil;AS Adicionar:
                      <font color="#0000FF">
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
                  <input name="cod_barras" type="text" class="class02" id="cod_barras" size="10"><br><br>
                  <select name="item" id="select7" class="class02">
                    <option selected></option>
                    <?

    $sql = "select * from estoque_pecas where grupo = 'VENDA DE PRODUTOS' and estab_pertence = '$estab_pertence' order by nome_produto asc";
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
                <td width="24%" align="center" background="../../imagens_sistema/fundocelulas2.png"><? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?><form name="form5" method="post" action="orcamento.php">
                  <p><strong>
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <font color="#0000FF">
                    <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                    </font><font color="#0000FF">
                    <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                    </font>
                    <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                  </strong> <strong><font color="#0000FF">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "mudar"; ?>">
                  <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                  <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                  <input name="valormanutencao" type="hidden" id="valormanutencao" value="<? echo $exibir_total_do_orcamento; ?>">
                  <input name="referencia_a_receber" type="hidden" id="referencia_a_receber" value="<? echo $codigoproduto; ?>">
                  </font></strong><strong><font color="#0000FF">                  </font>
                    Condi&ccedil;&atilde;o:
                    <select name="condicao" id="condicao" class="class02">
                      <option selected><? echo "$condicao"; ?></option>
                      <?

    $sql = "select * from condicaodeorcamento order by condicao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['condicao']."</option>";
    }
?>
                    </select><br>
					  Status:
                  </strong><strong>
                  <select name="status_a_alterar" id="status_a_alterar" class="class02">
                    <option selected><? echo "$status_a_alterar"; ?></option>
                    <?

    $sql = "select * from status_orcamento_fatura order by status asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['status']."</option>";
    }
?>
                  </select>
                  </strong><br>
					  
                    <input class="class01" type="submit" name="submit7" id="submit7" value="OK">
                  </p>
                </form><? } ?></td>
                <td width="36%" background="../../imagens_sistema/fundocelulas2.png">
				  <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?><form name="itens" method="post" action="orcamento.php">
                  <div align="center"><strong>
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                  SERVI&Ccedil;OS Adicionar:
                      <font color="#0000FF">
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
                  <input name="cod_barras" type="text" class="class02" id="cod_barras" size="10"><br><br>
                  <select name="item" id="item" class="class02">
                    <option selected></option>
                    <?

    $sql = "select * from estoque_pecas where grupo = 'SERVICOS' and estab_pertence = '$estab_pertence' order by nome_produto asc";
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
              </tr>
</table>            

            <table width="100%"  border="0" cellpadding="0" cellspacing="0">
              
              <tr bgcolor="#ffffff">
                <td bgcolor="#CCCCCC"><div align="center"><strong>#</strong></div></td>
                <td align="center" bgcolor="#CCCCCC"><strong>Data / Hora</strong></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>Nome Produto</strong></div></td>
                <td align="center" bgcolor="#CCCCCC"><strong>Cod Barras</strong></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>Pre&ccedil;o</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>Quant</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>Desconto</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>Desconto R$</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>Total Produtos</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>#</strong></div></td>
              </tr>
              <?
			  
//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and num_bordero = '' and prazo_final between '$data_inicio_busca' and '$data_atual' order by num_proposta asc";

$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'VENDA DE PRODUTOS' order by codigo_orcamento desc";

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
                      
                      <input name="codigo_orcamento_ret" type="hidden" id="codigo_orcamento_ret" value="<? echo $codigo_orcamento; ?>">
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
	echo "<option>0.00</option>";
	
$sql = "select * from descontomaximo where desconto <= '$descontomaximopermitidodoproduto' order by desconto asc";

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
				 
				 echo $sub_valor_desconto_etapa1;
				 
				 ?>
                </strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas1.png" width="9%"><div align="center"><strong><? echo $totaldosprodutos; ?></strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas1.png" width="12%">
                  <div align="center">
                    <strong>
                    <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                    <font color="#0000FF">
                    <input name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
                    <input name="cod_prod_at" type="hidden" id="cod_prod_at" value="<? echo $codigoproduto; ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao">
                    <input name="nome" type="hidden" id="nome" value="<? echo "$nome" ?>">
                    <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                    <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                    <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                    <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                    </font>
                   <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?> <input type="submit" name="button" id="button" class="class01" value="Atualizar"><? } ?>
                  </strong></div></td></form>
</tr>



<? } ?>

              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
</table><table width="100%"  border="0" cellpadding="0" cellspacing="0">
              
              <tr bgcolor="#ffffff">
                <td colspan="10" align="center" bgcolor="#CCCCCC"><strong>SERVI&Ccedil;OS</strong></td>
              </tr>
              <tr bgcolor="#ffffff">
                <td bgcolor="#CCCCCC"><div align="center"><strong>#</strong></div></td>
                <td align="center" bgcolor="#CCCCCC"><strong>Data / Hora</strong></td>
                <td bgcolor="#CCCCCC"><div align="center">
                  <p><strong>Nome Servi&ccedil;o</strong>                </p>
                </div></td>
                <td align="center" bgcolor="#CCCCCC"><strong>Cod Barras</strong></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>Pre&ccedil;o</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>Quant</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>Desconto</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>Desconto R$</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>Total Produtos</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center"><strong>#</strong></div></td>
  </tr>
              <?
			  
//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and num_bordero = '' and prazo_final between '$data_inicio_busca' and '$data_atual' order by num_proposta asc";

$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'SERVICOS' order by codigo_orcamento desc";

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
              <tr>
                <td background="../../../imagens_sistema/fundocelulas2.png" width="9%"><div align="center"><stron>
                    <form name="form2" method="post" action="orcamento.php#prepara_retirar_item">
                      
                      
                      
                      <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                      
                      <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                      
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      
                      <input name="codigo_orcamento_ret" type="hidden" id="codigo_orcamento_ret" value="<? echo $codigo_orcamento; ?>">
                      <input name="cod_prod_ret" type="hidden" id="cod_prod_ret" value="<? echo $codigoproduto; ?>">
                     
                      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                      <? echo "$codigoproduto"; //echo "<input type='submit' name='Submit3' class='class01' value='$codigoproduto - Retirar'>"; ?>
                      
                    </form>
               </stron></div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png" width="37%" align="center"><strong><? echo "$dialancamento-$meslancamento-$anolancamento - $horalancamento";?></strong></td>
                <td background="../../../imagens_sistema/fundocelulas2.png" width="15%"><div align="center"><strong><? echo $nomeproduto;?></strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png" width="11%"><div align="center"><strong><? echo $codigo_barras_do_produto;?></strong></div></td>
                <form name="form3" method="post" action="orcamento.php">
                
                <td background="../../../imagens_sistema/fundocelulas2.png" width="4%"><div align="center"><strong><? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ echo $preco; }else{ ?></strong><strong>
                  <input class="class02" name="novo_preco" type="text" id="novo_preco" value="<? echo $preco; ?>" size="8"><? } ?>
                </strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png" width="3%"><div align="center">
                 <strong>
                 <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ echo $quant; }else{ ?> <input name="quant_at" type="text" id="quant_at" class="class02" value="<? echo $quant; ?>" size="1"><? } ?>
                  </strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png" width="5%"><div align="center">
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
	echo "<option>0.00</option>";
	
$sql = "select * from descontomaximo where desconto <= '$descontomaximopermitidodoproduto' order by desconto asc";

    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['desconto']."</option>";

    }
?>
                  </select><? } ?>
                </div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png" width="5%"><div align="center"><strong>
                <?
				
				$subtotaldedescontos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);
				$subtotaldedescontos2 = bcadd($descontomonetarioetapa3,$descontomonetarioetapa4,2);
				$descontosconcedidos = bcadd($subtotaldedescontos,$subtotaldedescontos2,2);
				 echo $descontosconcedidos;
				 
				 echo $sub_valor_desconto_etapa1;
				 
				 ?>
                </strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png" width="4%"><div align="center"><strong><? echo $totaldosprodutos; ?></strong></div></td>
                <td background="../../../imagens_sistema/fundocelulas2.png" width="7%">
                  <div align="center">
                    <span class="style1"><strong>
                    <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                    <font color="#0000FF">
                    <input name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
                    <input name="cod_prod_at" type="hidden" id="cod_prod_at" value="<? echo $codigoproduto; ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao">
                    <input name="nome" type="hidden" id="nome" value="<? echo "$nome" ?>">
                    <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                    <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                    <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                    <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                    </font>
                     <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?><input type="submit" name="button" id="button" class="class01" value="Atualizar"><? } ?>
                  </strong></span></div></td></form>
</tr>



<? } ?>

              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              <tr>
                <td>&nbsp;</td>
                <td colspan="8" align="center"><strong>DETALHAMENTO</strong></td>
                <td>&nbsp;</td>
              <tr>
                <td colspan="2" align="center"><form name="form6" method="post" action="orcamento.php">
                  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                  <strong><font color="#0000FF">
					   <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?>
                  <input name="codigo_da_ocorrencia" type="hidden" id="codigo_da_ocorrencia" value="<? echo $codigo_da_ocorrencia; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                  </font><font color="#0000FF">
                  <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                  </font>
                  <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
                  <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                  </strong> <strong><font color="#0000FF">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "detalhamento_obs"; ?>">
                  <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                  <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                  <input name="valormanutencao" type="hidden" id="valormanutencao" value="<? echo $exibir_total_do_orcamento; ?>">
                  </font>Tipo Manutencao<br>
                  <select class='class02' name="tipomanutencao" id="tipomanutencao">
                    <option selected><? echo "$tipomanutencao"; ?></option>
                     <?

    $sql = "select * from tipomanutencao order by tipomanutencao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipomanutencao']."</option>";
    }
?>
                  </select>
                  </strong><br>
KM Atual<br>
<input name="km" type="text" class='class02' id="km" value="<? echo "$km"; ?>" maxlength="50">
<br>
HORIMETRO<br>
<input name="horimetro" type="text" class='class02' id="horimetro" value="<? echo "$horimetro"; ?>" maxlength="50">
<br>
  <textarea class='class02' name="detalhamento" cols="60" rows="7" id="detalhamento"><?  
$sql3 = "SELECT * FROM nfs_manutencao where placa = '$placa' and cod_ocorrencia = '$codigo_da_ocorrencia' order by codigo desc limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$obs_adicional_da_manutencao = $linha[11];

}

echo "$obs_adicional_da_manutencao";

?>
</textarea>
<input class='class01' type="submit" name="submit10" id="submit10" value="Enviar"><? } ?>
                </form></td>
                <td align="center">&nbsp;</td>
                <td colspan="6" align="center" valign="top"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
	
//echo "$diaaberturaorcamento-$mesaberturaorcamento-$anoaberturaorcamento - $horaaberturaorcamento : $obs_orcamento<br><br";
	
$sql = "SELECT * FROM ocorrencias where codigo_orcamento = '$codigo_orcamento'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_da_ocorrencia = $linha[0];
$cod_ocorrencia = $linha[0];
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
	
	
	echo "$codigo_da_ocorrencia - $data_da_manutencao - $horamanutencao : $detalhamento_ocorrencia<br>";
}
	

$sql3 = "SELECT * FROM nfs_manutencao where placa = '$placa' and cod_ocorrencia = '$codigo_da_ocorrencia' order by codigo";
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
	
	
echo "<br>$data_adicional - $hora_adicional : $obs_adicional_da_manutencao";
	
}
	
	
?></td>
                <td>&nbsp;</td>
</table></p>
<p>
  <?  } ?>
</p>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <th scope="col">&nbsp;</th>
      <th scope="col"> <div id="prepara_retirar_item" class="modal" role="dialog" style="overflow: auto; width: 400px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
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
            <input class='class02' name="codigo_orcamento_ret" type="text" id="codigo_orcamento_ret" value="<? echo "$codigo_orcamento"; ?>" size="3">
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
      </div>
      </th>
      <th scope="col"> <? if($modopagto=="CARTAO"){ $div_class = "modal2"; }else{ $div_class = "modal"; } ?>
        <div id="modo_receber" class="<? echo "$div_class"; ?>" role="dialog"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
          <form name="form4" method="post" action="orcamento.php">
            <div align="center">
              <p> <br>
                <br>
                <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
						  
$dia_vencto_carteira = $_POST['dia_vencto_carteira'];
$mes_vencto_carteira = $_POST['mes_vencto_carteira'];
$ano_vencto_carteira = $_POST['ano_vencto_carteira'];
?>
                <input name="codigo_cliente2" type="hidden" id="codigo_cliente2" value="<? echo $codigo_cliente; ?>">
                <input name="num_fatura2" type="hidden" id="num_fatura2" value="<? echo $num_fatura; ?>">
                <input name="solicitacao2" type="hidden" id="solicitacao2">
                Arredondar
                <input class='class02' name="arredondamento" type="text" id="arredondamento" value="<? echo $total_geral; ?>" size="8">
                <br>
                Modo de pagto: <strong>
                  <select class='class02' name="modopagto2" id="modopagto2">
                    <option selected>
                      <? if(empty($modopagto)){ echo "DINHEIRO"; }else{ echo $modopagto; } ?>
                    </option>
                    <?


    $sql = "select * from modo_pagto order by modopagto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['modopagto']."</option>";
    }
?>
                  </select>
                  <?
						  if($modopagto=="CARTEIRA"){
							echo"Cliente:<br><select class='class02' name='nomeclienteindicado' id='nomeclienteindicado'>
							  <option select>$nomeclienteindicado</option>";
    $sql = "select * from clientes where status_cliente = 'Ativo' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
   }
      echo"</select>";
							  ?>
                  <select class="class02" name="dia_vencto_carteira" id="dia_vencto_carteira">
                    <option selected="selected"><? echo "$dia_vencto_carteira"; ?></option>
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
                  <select class="class02" name="mes_vencto_carteira" id="mes_vencto_carteira">
                    <option selected="selected"><? echo $mes_vencto_carteira; ?></option>
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
                  <select class="class02" name="ano_vencto_carteira" id="ano_vencto_carteira">
                    <option> <? echo $ano_anterior; ?></option>
                    <option selected="selected"><? echo $ano; ?></option>
                    <option> <? echo $ano_posterior; ?></option>
                  </select>
                  <?
							  
						  }
						  else{
							  
echo"Cliente:<br><select class='class02' name='nomeclienteindicado' id='nomeclienteindicado'>
							  <option select>$nomeclienteindicado</option>";
    $sql = "select * from clientes where status_cliente = 'Ativo' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
   }
      echo"</select>";
							  ?>
                  <select class="class02" name="dia_vencto_carteira" id="dia_vencto_carteira">
                    <option selected="selected"><? echo "$dia_vencto_carteira"; ?></option>
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
                  <select class="class02" name="mes_vencto_carteira" id="mes_vencto_carteira">
                    <option selected="selected"><? echo $mes_vencto_carteira; ?></option>
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
                  <select class="class02" name="ano_vencto_carteira" id="ano_vencto_carteira">
                    <option> <? echo $ano_anterior; ?></option>
                    <option selected="selected"><? echo $ano; ?></option>
                    <option> <? echo $ano_posterior; ?></option>
                  </select>
                  <?
						  //echo "<input name='nomeclienteindicado' type='hidden' id='nomeclienteindicado' value=''>";
						  }
						  
						  ?>
                  </strong> <br>
                <?
if((empty($modopagto)) or ($modopagto=="DINHEIRO")){
	?>
                <input name="entrada2" type="hidden" id="entrada2" value="<? echo "0.00";  ?>" size="6">
                <?	
}
else{
	?>
                <br>
                Entrada:
                <input class='class02' name="entrada2" type="text" id="entrada2" value="<? echo "$entrada";  ?>" size="6">
                <? } ?>
                em <strong>
                  <select class='class02' name="quantparc2" id="quantparc2">
                    <option selected>
                      <? if(empty($quantparc)){ echo "1"; } else{ echo $quantparc; } ?>
                    </option>
                    <?


    $sql = "select * from quantparc order by quantparc asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['quantparc']."</option>";
    }
?>
                  </select>
                  </strong> vezes.<br>
                <input class='class02' name="obs" type="hidden" id="obs" value="<? echo $obs; ?>" size="50">
                <?
						  
  if($modopagto == "CARTAO") {
	  
$cartao = $_POST['cartao'];
$tipocartao = $_POST['tipocartao'];
$valorcartao = $_POST['valorcartao'];

$cartao2 = $_POST['cartao2'];
$tipocartao2 = $_POST['tipocartao2'];
$valorcartao2 = $_POST['valorcartao2'];

$cartao3 = $_POST['cartao3'];
$tipocartao3 = $_POST['tipocartao3'];
$valorcartao3 = $_POST['valorcartao3'];
	  
$cartao4 = $_POST['cartao4'];
$tipocartao4 = $_POST['tipocartao4'];
$valorcartao4 = $_POST['valorcartao4'];


$parcela1 = $entrada;
$parcela2 = $valorcartao;
$parcela3 = $valorcartao2;
$parcela4 = $valorcartao3;
$parcela5 = $valorcartao4;

$subtotalrecebido1 = bcadd($parcela1,$parcela2,2);
$subtotalrecebido2 = bcadd($parcela3,$parcela4,2);
$subtotalrecebido3 = bcadd($parcela5,0,2);

$subtotalrecebido4 = bcadd($subtotalrecebido1,$subtotalrecebido2,2);

$totalrecebido = bcadd($subtotalrecebido4,$subtotalrecebido3,2);

$saldoareceber = bcsub($total_geral,$totalrecebido,2);
	  
	  
                      echo "<table width='100%' border='2' cellspacing='0'>
                        <tr>
                          <td><div align='center' class='style6'><strong>Cart&atilde;o</strong></div></td>
                          <td><div align='center' class='style6'><strong>Tipo Cart&atilde;o</strong></div></td>
                          <td><div align='center' class='style6'><strong>Valor</strong></div></td>
                          <td><div align='center' class='style6'><strong>Aliquota %</strong></div></td>
                          <td><div align='center' class='style6'><strong>Custo C/ Cartao</strong></div></td>
                          
                        </tr>
                        <tr>
                          <td><div align='center'><select class='class02' name='cartao' id='cartao'>
<option selected> $cartao </option>";
    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select>
  
</div></td>

<td><div align='center'><select class='class02' name='tipocartao' id='tipocartao'>
    <option selected> $tipocartao </option>";
    

if($quantparc>1){
	
    $sql2 = "select * from tipocartoes where tipocartao = 'CARTAO DE CREDITO' order by tipocartao asc";
	
}
else{
	
    $sql2 = "select * from tipocartoes order by tipocartao asc";
	
}
    $result2 = mysql_query($sql2);
    while($x=mysql_fetch_array($result2)){
  echo "<option>".$x['tipocartao']."</option>";
    } echo "</select>
  
  
  


</div></td>

<td><div align='center'><input class='class02' name='valorcartao' type='text' id='valorcartao' value='$valorcartao' size='5'>
  
</div></td>

<td class='style6'><div align='center'>";

$sql = "SELECT * FROM tabela_cartoes where modopagto = '$tipocartao' and status = 'Ativo' and mes = '$mes_aliquota' and ano = '$ano_aliquota' and '$quantparc' >= prazo_inicial and '$quantparc' <= prazo_final order by modopagto asc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
		
$aliquota_cartao1 = $linha[9];
}

$aliquota_decimal_cartao1 = bcdiv($aliquota_cartao1,100,4);

$custo_com_cartao1 = bcmul($valorcartao,$aliquota_decimal_cartao1,2);

echo "$aliquota_cartao1%</div></td>
                          
						  
						  <td class='style6'><div align='center'><strong>R$ $custo_com_cartao1</strong</div></td>
						  
						  
                         
                        </tr>
						
						
						
						
                        <tr>
<td><div align='center'><select class='class02' name='cartao2' id='cartao2'>
<option selected> $cartao2 </option>";
    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  
  

</div></td>


<td><div align='center'><select class='class02' name='tipocartao2' id='tipocartao2'>
    <option selected> $tipocartao2 </option>";
    

if($quantparc>1){
	
    $sql = "select * from tipocartoes where tipocartao = 'CARTAO DE CREDITO' order by tipocartao asc";
	
}
else{

    $sql = "select * from tipocartoes order by tipocartao asc";
	
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipocartao']."</option>";
    } echo "</select>
  
  
</div></td>

<td><div align='center'><input class='class02' name='valorcartao2' type='text' id='valorcartao2' value='$valorcartao2' size='5'>
  
  
</div></td>
                          
<td class='style6'><div align='center'>";

$sql = "SELECT * FROM tabela_cartoes where modopagto = '$tipocartao2' and status = 'Ativo' and mes = '$mes_aliquota' and ano = '$ano_aliquota' and '$quantparc' >= prazo_inicial and '$quantparc' <= prazo_final order by modopagto asc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
		
$aliquota_cartao2 = $linha[9];
}

$aliquota_decimal_cartao2 = bcdiv($aliquota_cartao2,100,4);

$custo_com_cartao2 = bcmul($valorcartao2,$aliquota_decimal_cartao2,2);

echo "$aliquota_cartao2%</div></td>
                          <td class='style6'><div align='center'><strong>R$ $custo_com_cartao2</strong></div></td>
                          
                        </tr>
						
						
						
						
                        <tr>
						
						
<td><div align='center'><select class='class02' name='cartao3' id='cartao3'>
    <option selected> $cartao3 </option>";
    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  

</div></td>
                          
<td><div align='center'><select class='class02' name='tipocartao3' id='tipocartao3'>
    <option selected> $tipocartao3 </option>";
    

if($quantparc>1){
	
    $sql = "select * from tipocartoes where tipocartao = 'CARTAO DE CREDITO' order by tipocartao asc";
	
}
else{

    $sql = "select * from tipocartoes order by tipocartao asc";
	
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipocartao']."</option>";
    } echo "</select>
  
  
  
</div></td>
                          
						  
<td><div align='center'><input class='class02' name='valorcartao3' type='text' id='valorcartao3' value='$valorcartao3' size='5'>
  
  
</div></td>
                          
<td class='style6'><div align='center'>";

$sql = "SELECT * FROM tabela_cartoes where modopagto = '$tipocartao3' and status = 'Ativo' and mes = '$mes_aliquota' and ano = '$ano_aliquota' and '$quantparc' >= prazo_inicial and '$quantparc' <= prazo_final order by modopagto asc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
		
$aliquota_cartao3 = $linha[9];
}

$aliquota_decimal_cartao3 = bcdiv($aliquota_cartao3,100,4);

$custo_com_cartao3 = bcmul($valorcartao3,$aliquota_decimal_cartao3,2);

echo "$aliquota_cartao3%</div></td>
                          <td class='style6'><div align='center'><strong>R$ $custo_com_cartao3</strong></div></td>
                          
                        </tr>
						
						
						
						
                        <tr>
						
				
<td><div align='center'><select class='class02' name='cartao4' id='cartao4'>
    <option selected> $cartao4 </option>";
    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  
  
</div></td>
                          
<td><div align='center'><select class='class02' name='tipocartao4' id='tipocartao4'>
    <option selected> $tipocartao4 </option>";
    

if($quantparc>1){
	
    $sql = "select * from tipocartoes where tipocartao = 'CARTAO DE CREDITO' order by tipocartao asc";
	
}
else{

    $sql = "select * from tipocartoes order by tipocartao asc";
	
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipocartao']."</option>";
    } echo "</select>
  
  
  
  
</div></td>
                          
<td><div align='center'><input class='class02' name='valorcartao4' type='text' id='valorcartao4' value='$valorcartao4' size='5'>
  
  
</div></td>
                          
<td class='style6'><div align='center'>";

$sql = "SELECT * FROM tabela_cartoes where modopagto = '$tipocartao4' and status = 'Ativo' and mes = '$mes_aliquota' and ano = '$ano_aliquota' and '$quantparc' >= prazo_inicial and '$quantparc' <= prazo_final order by modopagto asc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
		
$aliquota_cartao4 = $linha[9];
}

$aliquota_decimal_cartao4 = bcdiv($aliquota_cartao4,100,4);

$custo_com_cartao4 = bcmul($valorcartao4,$aliquota_decimal_cartao4,2);

echo "$aliquota_cartao4%</div></td>
                          <td class='style6'><div align='center'><strong>R$ $custo_com_cartao4</strong></div></td>
                          
                        </tr>
                      </table>";
	  
	 

  }
  else{
	  
$parcela1 = $entrada;
$sub_totalrecebido = $_POST['valor_recebido'];


$totalrecebido = bcadd($parcela1,$sub_totalrecebido,2);

$saldoareceber = bcsub($total_geral,$totalrecebido,2);
  
  }
  
?>
                <br>
                Valor Recebido<br>
                <input class='class02' name="valor_recebido" type="text" id="valor_recebido" value="<? if($modopagto<>"CARTAO"){ if($totalrecebido=="0.00"){ echo $total_geral; }else{ echo $totalrecebido; } } else{ echo $totalrecebido;  } ?>" size="5">
                <br>
                <? if($totalrecebido<$total_geral){echo "Saldo a Receber R$ $saldoareceber "; } ?>
                <? $troco = bcsub($totalrecebido,$total_geral,2); if($totalrecebido>$total_geral){ echo " Troco R$ $troco"; } ?>
                <br>
                <input class='class01' type=image src="../../../imagens_botoes/atualiza_calculos.png" width="50" height="50" name="button2" id="button2" value="Atualizar Calculos">
                </strong>               
            </div>
          </form>
          <table width="100%" border="0">
            <form name="form7" method="post" action="orcamento.php">
              <tr>
                <td width="346%" colspan="3"><div align="center">
                  <? 
							  

$dia_vencto_carteira = $_POST['dia_vencto_carteira'];
$mes_vencto_carteira = $_POST['mes_vencto_carteira'];
$ano_vencto_carteira = $_POST['ano_vencto_carteira'];
							  
if(empty($modopagto)){
	
	
}
else{


if(empty($cartao)){
	
}
else{
	
if(empty($tipocartao)){
	
}
else{	

if(empty($valorcartao)){
	
}
else{
	
if($totalrecebido>=$total_geral){

	
//echo "Condicoes de pagto escolhida foi em  $quantparc vez(es) modo de pagto $modopagto<br>";

//echo "Entrada de R$ $entrada + $quantparc X R$ $valorparcela"; 
 
}

}

}

}

}


if(($modopagto<>"CARTAO") && ($totalrecebido>=$total_geral)){

//echo "Condicoes de pagto escolhida foi em  $quantparc vez(es) modo de pagto $modopagto<br>";

//echo "Entrada de R$ $entrada + $quantparc X R$ $valorparcela"; 
 


}
?>
                </div></td>
              </tr>
              <tr>
                <td colspan="3" align="right"><div align="center"><span class="style31">
                  <input type="hidden" name="total_geral" id="total_geral" value="<? echo $total_geral; ?>">
                  <input type="hidden" name="valor_recebido" id="valor_recebido" value="<? echo $totalrecebido; ?>">
                  <input name="troco" type="hidden" id="troco" value="<? echo $troco; ?>">
                  <input type="hidden" name="desconto_de_arredondamento" id="desconto_de_arredondamento" value="<? echo $desconto_de_arredondamento; ?>">
                  <input type="hidden" name="acrescimo_de_arredondamento" id="acrescimo_de_arredondamento" value="<? echo $acrescimo_de_arredondamento; ?>">
                  <input type="hidden" name="acrescimo_por_rateio" id="acrescimo_por_rateio" value="<? echo $acrescimo_por_rateio; ?>">
                  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                  <strong><font color="#0000FF"> </font>
                    <input name="codigo_cliente2" type="hidden" id="codigo_cliente2" value="<? echo $codigo_cliente; ?>">
                    <?
					  
if($condicao == "PEDIDO"){
						  
if(empty($modopagto)){
							  
if($ultimo_departamento_trabalhado=="GARCON"){
	
echo "<select name='condicao' id='condicao'>
                      <option select>$condicao</option>
                      <option>PEDIDO</option>
                    </select>


Correspondente ao orcamento(bloco) N&ordm; <input name='num_orcamento_bloco' type='text' id='num_orcamento_bloco' size='4' value='$num_orcamento_bloco'>";
}

	
}
else{

if(($modopagto == "CARTAO DE DEBITO") or ($modopagto == "CARTAO DE CREDITO")){

if(empty($cartao)){
	
}
else{

						  

						  
                      echo "<select name='condicao' id='condicao'>
                      <option select>$condicao</option>
                      <option>PEDIDO</option>
                    </select>


Correspondente ao orcamento(bloco) N&ordm; <input name='num_orcamento_bloco' type='text' id='num_orcamento_bloco' size='4' value='$num_orcamento_bloco'>";

					
}

}
else{
	


echo "<select name='condicao' id='condicao'>
                      <option select>$condicao</option>
                      <option>PEDIDO</option>
                    </select>


Correspondente ao orcamento(bloco) N&ordm; <input name='num_orcamento_bloco' type='text' id='num_orcamento_bloco' size='4' value='$num_orcamento_bloco'>";


}

}
					}
					else{
						

					
echo "<input name='condicao' type='hidden' id='condicao' value='PEDIDO'>";

					
					
					}
                    
                    ?>
                    </strong>
                  <?
					  
if($condicao == "ORCAMENTO"){
						  
if(empty($modopagto)){
	
if($ultimo_departamento_trabalhado=="GARCON"){
	
echo "<select name='condicao' id='condicao'>
                      <option select>$condicao</option>
                      <option>PEDIDO</option>
                    </select>


Correspondente ao orcamento(bloco) N&ordm; <input name='num_orcamento_bloco' type='text' id='num_orcamento_bloco' size='4' value='$num_orcamento_bloco'>";
}

	
}
else{

if(($modopagto == "CARTAO DE DEBITO") or ($modopagto == "CARTAO DE CREDITO")){

if(empty($cartao)){
	
}
else{

						  

						  
                      echo "<select name='condicao' id='condicao'>
                      <option select>$condicao</option>
                      <option>PEDIDO</option>
                    </select>


Correspondente ao orcamento(bloco) N&ordm; <input name='num_orcamento_bloco' type='text' id='num_orcamento_bloco' size='4' value='$num_orcamento_bloco'>";

					
}

}
else{
	


echo "<select name='condicao' id='condicao'>
                      <option select>$condicao</option>
                      <option>PEDIDO</option>
                    </select>


Correspondente ao orcamento(bloco) N&ordm; <input name='num_orcamento_bloco' type='text' id='num_orcamento_bloco' size='4' value='$num_orcamento_bloco'>";


}

}
					}
					else{
						

					
echo "<input name='condicao' type='hidden' id='condicao' value='PEDIDO'>";

					
					
					}
                    
                    ?>
                  <input name="num_fatura2" type="hidden" id="num_fatura2" value="<? echo $num_fatura; ?>">
                  </span>
                  <input name="horafechamento2" type="hidden" id="horafechamento2" value="<? echo date('H:i:s'); ?>">
                  <span class="style31"><strong><font color="#0000FF">
                    <input name="quantparc2" type="hidden" id="quantparc2" value="<? if(empty($quantparc)){ echo "1"; } else{ echo $quantparc; } ?>">
                    <strong><font color="#0000FF">
                      <input name="operador_alterou2" type="hidden" id="operador_alterou2" value="<? echo $operador; ?>">
                      <input name="loja2" type="hidden" id="loja2" value="<? echo $loja; ?>">
                      </font></strong></font></strong></span>
                  <input name="valor_entrada" type="hidden" id="valor_entrada" value="<? echo $entrada; ?>">
                  <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                    <input name="modopagto2" type="hidden" id="modopagto2" value="<? echo $modopagto;  ?>">
                    <strong><font color="#0000FF"><strong><font color="#0000FF">
                      <input name="cartao2" type="hidden" id="cartao2" value="<? echo $cartao; ?>">
                      <input name="tipocartao" type="hidden" id="tipocartao" value="<? echo $tipocartao; ?>">
                      </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                  <input name="valorcartao" type="hidden" id="valorcartao" value="<? echo $valorcartao; ?>">
                  <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                    <input type="hidden" name="custo_com_cartao1" id="custo_com_cartao1" value="<? echo $custo_com_cartao1; ?>">
                    <input name="cartao2" type="hidden" id="cartao3" value="<? echo $cartao2; ?>">
                    <input name="tipocartao2" type="hidden" id="tipocartao2" value="<? echo $tipocartao2; ?>">
                    </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                  <input name="valorcartao2" type="hidden" id="valorcartao2" value="<? echo $valorcartao2; ?>">
                  <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                    <input type="hidden" name="custo_com_cartao2" id="custo_com_cartao2" value="<? echo $custo_com_cartao2; ?>">
                    </font></strong></font></strong></font></strong></font></strong></font></strong> <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                      <input name="cartao3" type="hidden" id="cartao4" value="<? echo $cartao3; ?>">
                      <input name="tipocartao3" type="hidden" id="tipocartao3" value="<? echo $tipocartao3; ?>">
                      </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                  <input name="valorcartao3" type="hidden" id="valorcartao3" value="<? echo $valorcartao3; ?>">
                  <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                    <input type="hidden" name="custo_com_cartao3" id="custo_com_cartao3" value="<? echo $custo_com_cartao3; ?>">
                    </font></strong></font></strong></font></strong></font></strong></font></strong> <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                      <input name="cartao4" type="hidden" id="cartao5" value="<? echo $cartao4; ?>">
                      <input name="tipocartao4" type="hidden" id="tipocartao4" value="<? echo $tipocartao4; ?>">
                      </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                  <input name="valorcartao4" type="hidden" id="valorcartao4" value="<? echo $valorcartao4; ?>">
                  <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                    <input type="hidden" name="custo_com_cartao4" id="custo_com_cartao4" value="<? echo $custo_com_cartao4; ?>">
                    <input name="codigo_orcamento2" type="hidden" id="codigo_orcamento2" value="<? echo "$codigo_orcamento"; ?>">
                    </font></strong></font></strong></font></strong></font></strong></font></strong> <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                      <input name="categoria_conta" type="hidden" id="categoria_conta" value="<? echo "VENDA DE PRODUTOS"; ?>">
                      <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                        <input name="nomeclienteindicado" type="hidden" id="nomeclienteindicado" value="<? echo "$nomeclienteindicado"; ?>">
                        </font></strong></font></strong></font></strong></font></strong> </font></strong></font></strong></font></strong></font></strong></font></strong> <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                          <input name="dia_vencto_carteira" type="hidden" id="dia_vencto_carteira" value="<? echo "$dia_vencto_carteira"; ?>">
                          <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                            <input name="mes_vencto_carteira" type="hidden" id="mes_vencto_carteira" value="<? echo "$mes_vencto_carteira"; ?>">
                            <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                              <input name="ano_vencto_carteira" type="hidden" id="ano_vencto_carteira" value="<? echo "$ano_vencto_carteira"; ?>">
                              </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong> </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong> </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong>
                  <? 
							 if(empty($modopagto)){
							 }
							 else{
								 
							 if($ultimo_departamento_trabalhado=="BUFFET"){
							 
							 echo "<select name='objeto' id='objeto'>
                              <option selected></option>";
                              


    $sql = "select * from contratos order by objeto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['objeto']."</option>";
    }

                            echo "</select>";
							
							 }
							 }
							
							?>
                  <br>
                  <?
if(empty($modopagto)){
	
	
}
else{


if(empty($cartao)){
	
}
else{
	
if(empty($tipocartao)){
	
}
else{	

if(empty($valorcartao)){
	
}
else{
	
if($totalrecebido>$total_geral){
	
echo "<script>

alert('ATEN&Ccedil;&Atilde;O!!!... VALOR RECEBIDO MAIOR QUE O DA COMPRA!!!...VERIFIQUE!!!... R$ $totalrecebido -->> PARA PAGAMENTO COM CARTAO N&Atilde;O &Eacute; PERMITIDO TROCO!');


</script>";
	
}
else{
	
if($totalrecebido==$total_geral){
	
echo "<input class='class01' type=image src='../../imagens_botoes/registradora.png' width='50' height='50' name='Submit32' value='Finalizar'>";
	
}

}

}

}


}
						  
}

if(($modopagto<>"CARTAO") && ($totalrecebido>=$total_geral)){
	
if($modopagto=="CARTEIRA"){
	
if(empty($nomeclienteindicado)){
	
?>
                  <script>

alert("ATEN&Ccedil;&Atilde;O!!!... O CLIENTE DEVE SER INDICADO!!!...\n");


                    </script>
                  <?	
	
}
else{
	
echo "<input class='class01' type=image src='../../imagens_botoes/registradora.png' width='50' height='50' name='Submit32' value='Finalizar'>";
	
}
	
}
else{
	
	
	
echo "<input class='class01' type=image src='../../imagens_botoes/registradora.png' width='50' height='50' name='Submit32' value='Finalizar'>";
	
}

	
}

						  ?>
                </div></td>
              </tr>
            </form>
          </table>
        </div>
      </th>
      <th scope="col"></th>
      <td align="center" valign="top" scope="col">

<div id="atualiza_estoque" class="modal" role="dialog" style="overflow: auto; width: 450px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a> <br>
        <br>
        <table width="100%" border="0">
          
          <form name="form7" method="post" action="orcamento.php">
            <tr>
              <td colspan="3" class='style1' >Atualizacao de Estoque</td>
            </tr>
            <tr>
              <td width="346%" colspan="3" class='style1'>
                <p>
                  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
					

					

?>
                  <br>
                  <strong>Nome do produto<br>
                  <select name="item_atualizar" id="item_atualizar" class="class02">
                    <option selected></option>
                    <?

    $sql = "select * from estoque_pecas where grupo = 'VENDA DE PRODUTOS' and estab_pertence = '$estab_pertence' order by nome_produto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome_produto']."</option>";
    }
?>
                  </select>
                </strong>
                <br>
				  <?
					$item_atualizar = $_POST['item_atualizar'];
					
				 
$sql2 = "SELECT * FROM estoque_pecas where nome_produto = '$item_atualizar'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$quant_estoque = $linha[16];
$codigo_barras_do_produto = $linha[15];
$partnumberdoproduto = $linha[0];
$codigo_interno_da_peca = $linha[11];
$cod_barras = $linha[15];	
$nome_produto = $linha[27];

}
	
	
	

	
	?>
                  <input name="nome" type="hidden" id="nome" value="<? echo "$nome"; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                  <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo "$num_fatura"; ?>">
                  <input name="veiculo" type="hidden" id="veiculo" value="<? echo "$veiculo"; ?>">
                  <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
                  <input name="referencia" type="hidden" id="referencia" value="<? echo "$codigodapeca"; ?>">
                  <input name="cod_barras" type="hidden" id="cod_barras" value="<? echo "$codigo_barras_do_produto"; ?>">
                  <input name="oferta" type="hidden" id="oferta" value="<? echo "Nao"; ?>">
                  <input name="aparecer_site" type="hidden" id="aparecer_site" value="<? echo "Nao"; ?>">
                  <input name="data" type="hidden" id="data" value="<? $datacadastrodapeca = date('Y-m-d'); echo "$datacadastrodapeca"; ?>">
                  <input name="datacadastro" type="hidden" id="datacadastro" value="<? $datacadastrodapeca = date('Y-m-d'); echo "$datacadastrodapeca"; ?>">
                  <input name="horacadastro" type="hidden" id="horacadastro" value="<? $horacadastrodapeca = date('H:i:s'); echo "$horacadastrodapeca"; ?>">
                  <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo "$estab_pertence"; ?>">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "atualizaquanestoque"; ?>">
                  <br>
				    Quant Estoque <br>
				    <input class="class02" name="quant_estoque_atualizar" type="text" id="quant_estoque_atualizar" value="<? $quant_estoque; ?>" size="5">
			      <br>
                  <input class='class01' type=image src="../../../imagens_botoes/ok.png" width="50" height="50" name="submit9" id="submit9" value="Cupom">
                  <br>
			    </p>
              </div>

</td>
      <th scope="col">&nbsp;</th>
    </tr>
	</table>
    <tr>
      <th width="15%" bgcolor="#1216CD" scope="col">
		  <? 
$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento' and loja = '$estab_pertence' and num_fatura = '$num_fatura' and empresaconveniada = '$empresa_do_convenio' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

	
	
$codigo_orcamento = $linha[0];
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
        </strong>
        <strong><font color="#0000FF">
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

$modo_do_pagto = $linha[10];

$valor_da_entrada = $linha[35];
	
$tipomanutencao = $linha[37];
$km = $linha[31];
$horimetro = $linha[32];
$detalhamento = $linha[41];
	
}



?>
        <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?><input class='class01' type=image src="../../../imagens_botoes/excluir.png" width="50" height="50" name="submit2" id="submit2" value="Cupom"><? } ?>
        <br>
        Excluir Cupom
      </form></th>
      <th width="15%" bgcolor="#1216CD" scope="col"><form name="retirador_de_item" method="post" action="orcamento.php#prepara_retirar_item">
        <strong><font color="#0000FF">
        </font>
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
        </strong>
        <strong><font color="#0000FF">
        <input name="solicitacao" type="hidden" id="solicitacao">
        <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
        </font></strong>
        <? if(($status_a_alterar=="CANCELADO") or ($status_a_alterar=="Finalizado") ){ }else{ ?><input class='class01' type=image src="../../../imagens_botoes/retira_item.png" width="50" height="50" name="submit" id="submit" value="Cupom"><? } ?>
        <br>
        Retira Item
      </form></th>
      <th width="15%" bgcolor="#1216CD" scope="col"><form name="modo_do_pagamento" method="post" action="orcamento.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type=image src="../../../imagens_botoes/receber.png" width="50" height="50" name="submit3" id="submit3" value="Cupom">
        <br>
        Receber
      </form></th>
      <th width="15%" bgcolor="#1216CD" scope="col"> <form name="modo_do_pagamento" method="post" action="orcamento.php#fornecedores">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <strong>
        <font color="#0000FF">
        <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
        </font><font color="#0000FF">
        <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
        </font>
        <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
        </strong> <strong><font color="#0000FF">
        <input name="solicitacao" type="hidden" id="solicitacao">
        <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
        </font></strong>
<input class='class01' type=image src="../../../imagens_botoes/fornecedores.png" width="50" height="50" name="submit3" id="submit3" value="Cupom">
        <br>
        Fornecedores
      </form>
      </th>
      <th width="15%" bgcolor="#1216CD" scope="col"><form name="estoque_pecas" method="post" action="orcamento.php#estoque_pecas">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <strong>
        <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
        <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
        <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
        </strong> <strong>
        <input name="solicitacao" type="hidden" id="solicitacao" value="">
        <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
        </strong>
<input class='class01' type=image src="../../../imagens/botoes/add-item.png" width="50" height="50" name="submit6" id="submit6" value="Cupom">
        <br>
        Pe&ccedil;as - Cadastro
      </form></th>
      <th width="25%" bgcolor="#1216CD" scope="col"><form name="modo_do_pagamento" method="post" action="orcamento.php#receber_carteira">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type=image src="../../../imagens_botoes/carteira.png" width="50" height="50" name="submit8" id="submit8" value="Cupom">
        <br>
        Carteira
      </form></th>
    </tr>
    <tr>
      <td height="752" align="center" valign="middle"><div id="cancelamento_de_cupom" class="modal" role="dialog" style="overflow: auto; width: 350px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
        <form name="cancel" method="post" action="../../veiculos/verifica.php">
          <? 

$sql = "SELECT * FROM orcamentos where num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento' order by codigo_orcamento asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$codigo_orcamento_a_receber = $linha[0];

$modo_do_pagto = $linha[10];

$valor_da_entrada = $linha[35];
	
$numfaturacancelarcupom = $linha[18];
	
$tipomanutencao = $linha[37];
$km = $linha[31];
$horimetro = $linha[32];
	$detalhamento = $linha[41];
	

}


?>
          <input name="confirmacancelamentocupom" type="hidden" id="confirmacancelamentocupom" value="sim">
			<input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
          <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo "$num_fatura"; ?>">
			<input name="nome" type="hidden" id="nome" value="<? echo "$nome"; ?>">
			<input name="veiculo" type="hidden" id="veiculo" value="<? echo "$veiculo"; ?>">
			<input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
          <input name='dateautorizacao' type='hidden' id='dateautorizacao' value='$dateretiradapedido'>
          <input name='horaautorizacao' type='hidden' id='horaautorizacao' value='$horaretiradapedido'>
          <? $cancelandocupom = $_POST['cancelandocupom'];
			if($cancelandocupom=="temcerteza"){ echo "ATEN&Ccedil;&Atilde;O!!!... <br><br> Cancelamento de Cupom... <br><br> Solicite Autoriza&ccedil;&atilde;o! <br> <input type='password' name='cod_gerente' id='cod_gerente' placeholder='C&oacute;digo Gerencial'><br>"; } 
			
			echo "Fatura: $num_fatura <br>";
			echo "Orçamento: $codigo_orcamento <br>";
			echo "Veiculo: $veiculo <br>";
			echo "Placa: $placa <br>";
			?>
          <? if($area_a_focar_campo=="cancelamento_de_cupom"){ ?>
          <script language='JavaScript' type='text/javascript'>
document.cancel.cod_gerente.focus()
                  </script>
          <? } ?>
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <?
				  if($cancelandocupom=="temcerteza"){
                echo "<br><input class='class01' type=image src='../../../imagens_botoes/ok.png' width='50' height='50' name='submit2' id='submit2' value='Autorizar'>";
				  }
					?>
        </form>
      </div></td>
      <td align="center"><div id="efetiva_retirada_item" class="modal" role="dialog" style="overflow: auto; width: 400px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a> ATEN&Ccedil;&Atilde;O!!!...<br>
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


$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento_ret' and codigoproduto = '$codigoqueseraretiradodoorcamento'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$total_itens_para_retirar = mysql_num_rows($res);
	
$nomeprodutoaretirar = $linha[18];

}
		
if($total_itens_para_retirar==0){
	echo "Orcamento $codigo_orcamento_ret Fatura $num_fatura Codigo informado $codigoqueseraretiradodoorcamento nao existe no orçamento! <br>
	Informe o codigo do produto corretamente!";
}
else{
	
$comando = "insert into pedido_de_retirada_produto_da_fatura(num_fatura,datepedido,dia,mes,ano,horapedido,codigoorcamento,codigoproduto,nomeproduto,operador,departamento,statusautorizacao,loja)

values('$num_fatura','$datepedido','$dia_fatura','$mes_fatura','$ano_fatura','$horapedido','$codigo_orcamento_ret','$codigoqueseraretiradodoorcamento','$nomeprodutoaretirar','$operador','$estab_pertence','Aguardando Autorizacao','$estab_pertence')";
 
mysql_query($comando,$conexao);

$sql = "select * from pedido_de_retirada_produto_da_fatura where num_fatura = '$num_fatura' and codigoorcamento = '$codigo_orcamento_ret' and codigoproduto = '$codigoqueseraretiradodoorcamento' and statusautorizacao = 'Aguardando Autorizacao' and datepedido = '$datepedido' and horapedido = '$horapedido' order by datepedido desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_de_retirada = $linha[0];

}


echo "<form name='cancel_item' method='post' action='orcamento.php'>
                <div align='center'>
                  Codigo de Autoriza&ccedil;&atilde;o<br><input type='password' name='cod_gerente' id='cod_gerente' placeholder='C&oacute;digo Gerencial'>
				  <input type='hidden' name='codigo_orcamento_ret' id='codigo_orcamento_ret' value='$codigo_orcamento_ret'>
                  <input type='hidden' name='codigoqueseraretiradodoorcamento' id='codigoqueseraretiradodoorcamento' value='$codigoqueseraretiradodoorcamento'>
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
			  Orçamento: $codigo_orcamento<br>
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
        <font color="#0000FF">
        </font></strong></div></td>
      <td>&nbsp;</td>
      <td ><div id="fornecedores" class="modal" role="dialog" style="overflow: auto; width: 400px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a> <br>
        <br>
        <br>
        <table width="100%" border="0">
          <form name="form7" method="post" action="orcamento.php#fornecedores">
            <tr>
              <td colspan="3" class='style1' ><div align="center"><strong>Pagtos a Fornecedores</strong></div></td>
            </tr>
            <tr>
              <td width="346%" colspan="3"><div align="center">
                <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                
                <select class='class02' name="nfantasia_fornecedor" id="nfantasia_fornecedor">
                  <option selected></option>
                  <?

    $sql = "select * from fornecedores order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
                </select>
              </div></td>
            </tr>
            <tr>
              <td colspan="3" class='style1'><div align="center"><strong>Valor<br>
                <input class='class02' name="valor_fornecedor" type="text" id="valor_fornecedor" size="10">
                <br>
                Historico<br>
                <textarea class='class02' name="historico_fornecedor" cols="20" rows="3" id="historico_fornecedor"></textarea>
                <br>
                <input class='class01' type=image src="../../../imagens_botoes/ok.png" width="50" height="50" name="submit4" id="submit4" value="Cupom">
                <br>
                
                <?
								if($solicitacao=="pagarfornecedor"){
		
		$nfantasia_fornecedor = $_POST['nfantasia_fornecedor'];
		$valor_fornecedor = $_POST['valor_fornecedor'];
		$historico_fornecedor = $_POST['historico_fornecedor'];
		
	$datepagtofornecedor = date('Y-m-d');
									
		$diapagtofornecedor = date('d');
		$mespagtofornecedor = date('m');
		$anopagtofornecedor = date('Y');
									
	$datapagtofornecedor = "$diapagtofornecedor-$mespagtofornecedor-$anopagtofornecedor";
									
	$horapagtofornecedor = date('H:i:s');
		
	$comando = "insert into cx_saidas(operador,dia,mes,ano,datacadastro,datecadastro,horacadastro,nfantasia,fornecedor,categoria_conta,historico,valor) 

values('$nome_operador','$diapagtofornecedor','$mespagtofornecedor','$anopagtofornecedor','$datapagtofornecedor','$datepagtofornecedor','$horapagtofornecedor','$estab_pertence','$nfantasia_fornecedor','PAGTOS A FORNECEDORES','$historico_fornecedor','$valor_fornecedor')";

mysql_query($comando,$conexao);
		
		
		echo "Pagto ao fornecedor $nfantasia_fornecedor no valor de R$ $valor_fornecedor <br> registrado com sucesso!!!...";
	}
								?>
				  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
        </font><font color="#0000FF">
        <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
        </font>
        <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
        </strong> <strong><font color="#0000FF">
       <input name="solicitacao" type="hidden" id="solicitacao" value="pagarfornecedor">
        <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
              </strong></div></td>
            </tr>
          </form>
        </table>
      </div></td>
      <td><div id="estoque_pecas" class="modal" role="dialog" style="overflow: auto; width: 450px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a> <br>
        <br>
        <table width="100%" border="0">
          
          <form name="form7" method="post" action="orcamento.php#gravapeca">
            <tr>
              <td colspan="3" class='style1' ><div align="center">Cadastro de Pe&ccedil;as</div></td>
            </tr>
            <tr>
              <td width="346%" colspan="3" class='style1'><div align="center">
                <p>
                  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                  Grupo <br>
                  <select class="class02" name="grupo" id="grupo">
                    <?
      $sql = "select * from grupo order by grupo";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option selected>".$x['grupo']."</option>";
    }
		  ?>
                  </select>
                </p>
                <p>Sub-Grupo <br>
                  <select class="class02" name="sub_grupo" id="sub_grupo">
                   
                    <?


    $sql = "select * from sub_grupo order by sub_grupo desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['sub_grupo']."</option>";
    }
?>
                  </select>
                </p>
                <p>Nome do produto <br>
                  <input class="class02" name="nome_produto" type="text" id="nome_produto" size="40">
                </p>
                <p>Fornecedor <br>
                  <select class="class02" name="fornecedor" id="fornecedor">
                    <option selected>Selecione</option>
                    <?

    $sql = "select * from fornecedores order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
                  </select>
                </p>
                <p>Codigo 
                  <?
$sql = "SELECT * FROM estoque_pecas order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$ultimocodigodapecacadastrada = $linha[11];
	
}
					
$codigodapeca = bcadd($ultimocodigodapecacadastrada,1,0);
	echo "$codigodapeca";

?>
                  <input name="nome" type="hidden" id="nome" value="<? echo "$nome"; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                  <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo "$num_fatura"; ?>">
                  <input name="veiculo" type="hidden" id="veiculo" value="<? echo "$veiculo"; ?>">
                  <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
                  <input name="referencia" type="hidden" id="referencia" value="<? echo "$codigodapeca"; ?>">
                  <input name="cod_barras" type="hidden" id="cod_barras" value="<? echo "$codigodapeca"; ?>">
                  <input name="oferta" type="hidden" id="oferta" value="<? echo "Nao"; ?>">
                  <input name="aparecer_site" type="hidden" id="aparecer_site" value="<? echo "Nao"; ?>">
                  <input name="data" type="hidden" id="data" value="<? $datacadastrodapeca = date('Y-m-d'); echo "$datacadastrodapeca"; ?>">
                  <input name="datacadastro" type="hidden" id="datacadastro" value="<? $datacadastrodapeca = date('Y-m-d'); echo "$datacadastrodapeca"; ?>">
                  <input name="horacadastro" type="hidden" id="horacadastro" value="<? $horacadastrodapeca = date('H:i:s'); echo "$horacadastrodapeca"; ?>">
                  <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo "$estab_pertence"; ?>">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "gravarpecanoestoque"; ?>">
                </p>
              </div></td>
            </tr>
            <tr>
              <td colspan="3" class='style1' ><div align="center">
                  <p><strong>Pre&ccedil;o de Compra <br>
                      R$
                      <input class="class02" name="preco_compra" type="text" id="preco_compra" size="10">
                      <br>Pre&ccedil;o de Venda <br>
                    R$
                    <input  class='class02' name="preco" type="text" id="preco" size="10">
                    <br>
					  Quant Estoque <br>
					  <input class="class02" name="quant_estoque" type="text" id="quant_estoque" value="1" size="5">
					  <br> Desconto Maximo <br>
					  <select class="class02" name="descontomaximo" id="descontomaximo">
						  <?
						  echo "<option select>0.00</option>";
$sql = "select * from descontomaximo order by desconto asc";

    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['desconto']."</option>";

    }
?>
                      </select>
                    %<br>
                    Descri&ccedil;&atilde;o<br>
                    <textarea class="class02" name="descricao" id="descricao" cols="45" rows="5"></textarea>
                    <br>
                    <input class='class01' type=image src="../../../imagens_botoes/ok.png" width="50" height="50" name="submit9" id="submit9" value="Cupom">
                    <br>
				  </div></td>
            </tr>
          </form>
      </table>
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6" align="center" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6" align="center" valign="middle"><div id="receber_carteira" class="modal" role="dialog" style="overflow: auto; height: 500px; font-weight: bold;"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
        <?
$nomeclienteindicado = $_POST['nomeclienteindicado'];
	
$banco = $_POST['banco'];
$contacorrente = $_POST['contacorrente'];

if(empty($banco)){
	
$ondelancar = "caixa";
	
}
else{
	
$ondelancar = $banco;
	
}
	
	
if($ondelancar==$banco){
	
//--------------------INICIO LAN&Ccedil;AMENTO DE RECEBIMENTO ------------------------------------
$num_fatura = $_POST['num_fatura'];
$num_mensalidade = $_POST['num_mensalidade'];
$cod_contas_a_receber = $_POST['cod_contas_a_receber'];
$recebido = $_POST['recebido'];
$codigo_orcamento = $_POST['codigo_orcamento'];


	
	
$sql = "SELECT * FROM contas_bancarias where banco = '$banco' and contacorrente = '$contacorrente' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$agencia = $linha[2];
$tipoconta = $linha[4];

}

$cod_contas_a_pagar_a_atualizar = $_POST['cod_contas_a_pagar_a_atualizar'];
$valor_a_pagar_atualizado = $_POST['valor_a_pagar'];




$comando = "update `$db`.`contas_a_pagar` set `valor_a_pagar` = '$valor_a_pagar_atualizado' where `contas_a_pagar`. `codigo` = '$cod_contas_a_pagar_a_atualizar'";
mysql_query($comando,$conexao);



if($recebido=="Sim"){
	
$sql2 = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estab_pertence_op = $linha[44];

$cidade_estab_pertence_op = $linha[45];

$tel_estab_pertence_op = $linha[46];

$email_estab_pertence_op = $linha[47];

}


$sql3 = "SELECT * FROM contas_a_receber where codigo = '$cod_contas_a_receber'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$cod_contas_a_receber = $linha[0];
$nome_cliente = $linha[4];
$cpf = $linha[5];
$quantparc = $linha[9];
$modopagto = $linha[10];

$estabelecimento = $linha[17];
$cartao = $linha[33];
$categoria_conta = $linha[34];
$num_orcamento = $linha[36];
$departamento_recebimento = $linha[46];

}




$dia_recebimento = $_POST['dia_recebimento'];
$mes_recebimento = $_POST['mes_recebimento'];
$ano_recebimento = $_POST['ano_recebimento'];

$diapagto = $dia_recebimento;
$mespagto = $mes_recebimento;
$anopagto = $ano_recebimento;

//$cod_contas_a_receber = $_POST['cod_contas_a_receber'];

$quantparc = $_POST['quantparc'];
$hora_baixa = $_POST['hora_baixa'];
$sub_valor_a_receber = $_POST['valor_a_receber'];


$datacadastro = "$dia_recebimento-$mes_recebimento-$ano_recebimento";
$datecadastro = "$ano_recebimento-$mes_recebimento-$dia_recebimento";

$datepagto = "$ano_recebimento-$mes_recebimento-$dia_recebimento";

$daterecebimento = "$ano_recebimento-$mes_recebimento-$dia_recebimento";

$horacadastro = "$hora_baixa";
$dia = $dia_recebimento;
$mes = $mes_recebimento;
$ano = $ano_recebimento;
	
	

$sql4 = "SELECT * FROM bco_entradas where num_fatura = '$num_fatura' and cod_contas_a_receber = '$cod_contas_a_receber' and num_mensalidade = '$num_mensalidade' and categoria_conta = '$categoria_conta' and banco = '$banco' and agencia = '$agencia' and contacorrente = '$contacorrente' and tipoconta = '$tipoconta'";
$res4 = mysql_query($sql4);

$lancamentos = mysql_num_rows($res4);

if($lancamentos>=1){

echo "Valor da parcela referente a fatura $num_fatura j&aacute; registrado no banco!!!... Por essa raz&atilde;o n&atilde;o foi lan&ccedil;ado novamente!<br> ";

}
else{

//-----------------lancamento caixa saidas caso possua----------------------------------

$sql5 = "SELECT * FROM contas_a_pagar where num_fatura = '$num_fatura' and num_mensalidade = '$num_mensalidade' and cartao = '$cartao'";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$cod_contas_a_pagar = $linha[0];
$num_fatura = $linha[1];
$nome_cliente = $linha[7];
$cpf = $linha[8];
$valor_a_pagar = $linha[10];
$quantparc = $linha[12];
$modopagto = $linha[13];

$estabelecimento = $linha[20];
$cartao = $linha[36];

$categoria_conta_a_pagar = $linha[37];
$codigo_cliente = $linha[38];
$codigo_orcamento = $linha[39];

}




$comando = "update `$db`.`contas_a_pagar` set `codigo` = '$cod_contas_a_pagar',`quitacao`= 'Pago',`datepagto`= '$datepagto' where `contas_a_pagar`. `codigo` = '$cod_contas_a_pagar' limit 1 ";
mysql_query($comando,$conexao);

//-----------------fim do lancamento caixa saidas caso possua----------------------------------



$valor_a_receber = bcsub($sub_valor_a_receber,$valor_a_pagar,2);



$comando = "insert into bco_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,codigo_orcamento,banco,agencia,contacorrente,tipoconta,departamento,datepagto,diapagto,mespagto,anopagto) 
values('$valor_a_receber','$dia','$mes','$ano','$datacadastro','$horacadastro','$estabelecimento','Fatura $num_fatura, Orcamento $num_orcamento - Recebimento de parcela $num_mensalidade de $quantparc - CPF $cpf','$categoria_conta','$datecadastro','$nome_cliente','$cpf','$nome_operador','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$num_orcamento','$banco','$agencia','$contacorrente','$tipoconta','$departamento_recebimento','$datecadastro','$diapagto','$mespagto','$anopagto')";
mysql_query($comando,$conexao);

echo "<br> Recebimento da parcela referente a fatura $num_fatura no valor de R$ $valor_a_receber lan&ccedil;ada na entrada de banco com sucesso!<br>";





$comando = "update `$db`.`contas_a_receber` set `codigo` = '$cod_contas_a_receber',`quitacao`= 'Recebido',`daterecebimento`= '$daterecebimento',`bco_operacao`= '$banco',`agencia`= '$agencia',`contacorrente`= '$contacorrente',`tipoconta`= '$tipoconta' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber' limit 1 ";
mysql_query($comando,$conexao);


}

}


}
//---------------FIM DE LAN&Ccedil;AMENTO DE  RECEBIMENTO SE FOR BANCO------------------------------
?>
        <?
if($ondelancar=="caixa"){
//--------------------INICIO LAN&Ccedil;AMENTO DE RECEBIMENTO DE COMISS&Atilde;O ------------------------------------
$cod_contas_a_receber = $_POST['cod_contas_a_receber'];
$num_mensalidade = $_POST['num_mensalidade'];

$recebido = $_POST['recebido'];


if($recebido=="Sim"){
	
$num_fatura = $_POST['num_fatura'];

$sql = "SELECT * FROM contas_a_receber where codigo = '$cod_contas_a_receber' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


//$cod_contas_a_receber = $linha[0];
$nome_cliente = $linha[4];
$cpf = $linha[5];
$quantparc = $linha[9];
$estabelecimento = $linha[17];
$num_orcamento = $linha[36];

}

	
$dia_recebimento = $_POST['dia_recebimento'];
$mes_recebimento = $_POST['mes_recebimento'];
$ano_recebimento = $_POST['ano_recebimento'];


//$cod_contas_a_receber = $_POST['cod_contas_a_receber'];

$quant_parc = $_POST['quant_parc'];
$valor_a_receber = $_POST['valor_a_receber'];
$hora_baixa = $_POST['hora_baixa'];
$bco_operacao = $_POST['bco_operacao'];
$valor_a_recebr = $_POST['valor_a_receber'];


$datacadastro = "$dia_recebimento-$mes_recebimento-$ano_recebimento";
$datecadastro = "$ano_recebimento-$mes_recebimento-$dia_recebimento";

$horacadastro = "$hora_baixa";
$dia = $dia_recebimento;
$mes = $mes_recebimento;
$ano = $ano_recebimento;

$sql2 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and num_orcamento = '$num_orcamento' and codigo = '$cod_contas_a_receber' and num_mensalidade = '$num_mensalidade' and categoria_conta = 'VENDA DE PRODUTOS'";
$res2 = mysql_query($sql2);

$lancamentos = mysql_num_rows($res2);

if($lancamentos>=1){

echo "Valor da parcela referente a fatura $num_proposta j&aacute; registrado no caixa!!!... Por essa raz&atilde;o n&atilde;o foi lan&ccedil;ado novamente!<br> ";

}
else{



$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento) 



values('$valor_a_receber','$dia','$mes','$ano','$datacadastro','$horacadastro','$estabelecimento','Fatura $num_fatura, Orcamento $num_orcamento - Recebimento de parcela $num_mensalidade de $quantparc - CPF $cpf','VENDA DE PRODUTOS','$datecadastro','$nome_cliente','$cpf','$nome_operador','$celular_op','$email_op','$estabelecimento_proposta','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$num_orcamento')";


mysql_query($comando,$conexao);



echo "<br> Recebimento da parcela referente a fatura $num_fatura no valor de R$ $valor_a_receber lan&ccedil;ada na entrada de caixa com sucesso!<br>";




$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`contas_a_receber` set `quitacao` = 'recebido',`valor_recebido` = '$valor_a_receber' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber' limit 1 ";

}



mysql_query($comando,$conexao);


}

}

//---------------FIM DE LAN&Ccedil;AMENTO DE  RECEBIMENTOS SE FOR CAIXA------------------------------
}
?>
        <table width="90%"  border="0" align="center">
          <tr bgcolor="#ffffff">
            <td colspan="7" bgcolor="#0099FF"><div align="center">
              <form name="form3" method="post" action="fila_contas_fechadas_para_recebimento.php#receber_carteira">
                <strong>
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  CONTAS A RECEBER</strong>
                <?
						  
							echo"<br><select class='class02' name='nomeclienteindicado' id='nomeclienteindicado'>
							  <option>$nomeclienteindicado</option>
							  <option></option>";
    $sql = "select * from clientes where status_cliente = 'Ativo' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
   }
      echo"</select>";
						  
						  ?>
                <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "$dia_inicial"; ?>">
                <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes_inicial"; ?>">
                <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano_inicial"; ?>">
                <input name="dia_final" type="hidden" id="dia_final" value="<? echo "$dia_final"; ?>">
                <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes_final"; ?>">
                <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano_final"; ?>">
                <input class='class02' type="submit" name="submit5" id="submit5" value="Filtrar">
              </form>
            </div></td>
          </tr>
          <tr bgcolor="#ffffff">
            <td width="21%" background="../../imagens_sistema/fundocelulas2.png"><div align="center">Cliente</div></td>
            <td width="7%" background="../../imagens_sistema/fundocelulas2.png"><div align="center">N&ordm; Fatura</div></td>
            <td width="11%" background="../../imagens_sistema/fundocelulas2.png"><div align="center">Vencimento</div></td>
            <td width="12%" background="../../imagens_sistema/fundocelulas2.png"><div align="center">Valor a Receber</div></td>
            <td width="15%" background="../../imagens_sistema/fundocelulas2.png"><div align="center">Banco</div></td>
            <td width="13%" background="../../imagens_sistema/fundocelulas2.png"><div align="center">Conta Corrente</div></td>
            <td width="21%" background="../../imagens_sistema/fundocelulas2.png"><div align="center"># </div></td>
          </tr>
          <?


if(empty($nomeclienteindicado)){
	
$sql = "SELECT * FROM contas_a_receber where quitacao = 'Em Aberto' and modopagto = 'CARTEIRA' order by vencto asc";
	
}
else{

$sql = "SELECT * FROM contas_a_receber where quitacao = 'Em Aberto' and modopagto = 'CARTEIRA' and nome = '$nomeclienteindicado' order by vencto asc";
	
}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg++;

$cod_contas_a_receber = $linha[0];

$num_fatura = $linha[1];

$datacadastro = $linha[2];

$horacadastro = $linha[3];

$nome = $linha[4];

$cpf = $linha[5];

$obs = $linha[6];

$valor_a_receber = $linha[7];

$vencto = $linha[8];

$quantparc = $linha[9];

$quitacao = $linha[13];

$num_mensalidade = $linha[31];

$cartao = $linha[33];

$codigo_orcamento = $linha[36];
	



$sql2 = "SELECT * FROM contas_a_pagar where num_fatura = '$num_fatura' and num_mensalidade = '$num_mensalidade' and cartao = '$cartao'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$cod_contas_a_pagar = $linha[0];

}


$sql3 = "select * from db";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


$comando = "update `$linha[1]`.`contas_a_pagar` set `cod_contas_a_receber` = '$cod_contas_a_receber' where `contas_a_pagar`. `codigo` = '$cod_contas_a_pagar'";

}

mysql_query($comando,$conexao);


$sql4 = "SELECT * FROM contas_a_pagar where cod_contas_a_receber = '$cod_contas_a_receber'";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$cod_contas_a_pagar = $linha[0];

$valor_a_pagar = $linha[10];

}



?>
          <form name="form2" method="post" action="fila_contas_fechadas_para_recebimento.php#receber_carteira">
            <tr>
              <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><? echo $nome; ?></div></td>
              <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><? echo $num_fatura; ?></div></td>
              <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><? echo $vencto; ?></div></td>
              <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><? echo "R$ ".$valor_a_receber; ?>
                <input name="cod_contas_a_pagar_a_atualizar" type="hidden" id="cod_contas_a_pagar_a_atualizar" value="<? echo $cod_contas_a_pagar; ?>">
                <input name="valor_a_pagar" type="hidden" id="valor_a_pagar" value="<? echo $valor_a_pagar;  ?>" size="5">
              </div></td>
              <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
                <select name="banco" id="banco">
                  <option selected><? echo "$banco"; ?></option>
                  <?

    $sql = "select * from contas_bancarias group by banco order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>
                </select>
              </div></td>
              <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
                <select name="contacorrente" id="contacorrente">
                  <option selected><? echo "$contacorrente"; ?></option>
                  <?

    $sql = "select * from contas_bancarias order by contacorrente asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['contacorrente']."</option>";

    }

?>
                </select>
              </div></td>
              <td background="../../imagens_sistema/fundocelulas1.png"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$dia_recebimento = date('d');
$mes_recebimento = date('m');
$ano_recebimento = date('Y');

?>
                <input name="codigo_orcamento2" type="hidden" id="codigo_orcamento2" value="<? echo $codigo_orcamento; ?>">
                <input name="num_mensalidade" type="hidden" id="num_mensalidade" value="<? echo $num_mensalidade; ?>">
                <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
                <input name="cod_contas_a_receber" type="hidden" id="cod_contas_a_receber" value="<? echo $cod_contas_a_receber; ?>">
                <input name="quantparc2" type="hidden" id="quantparc2" value="<? echo $quantparc; ?>">
                <select name="dia_recebimento" id="dia_recebimento">
                  <option selected><? echo $dia_recebimento; ?></option>
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
                <select name="mes_recebimento" id="mes_recebimento">
                  <option selected><? echo $mes_recebimento; ?></option>
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
                <select name="ano_recebimento" id="ano_recebimento">
                  <option>
                    <? $ano_anterior = bcsub($ano_recebimento,1); echo $ano_anterior; ?>
                    </option>
                  <option selected><? echo $ano_recebimento; ?></option>
                  <option>
                    <? $ano_posterior = bcadd($ano_recebimento,1); echo $ano_posterior; ?>
                    </option>
                </select>
                <input name="num_fatura2" type="hidden" id="num_fatura2" value="<? echo $num_fatura; ?>">
                <input name="recebido" type="hidden" id="recebido" value="<? echo "Sim"; ?>">
                <strong><font color="#0000FF">
                  <input name="hora_baixa" type="hidden" id="hora_baixa" value="<? echo date('H:i:s'); ?>">
                  </font></strong>
                <input name="bco_operacao" type="hidden" id="bco_operacao" value="<? echo $bco_operacao; ?>">
                <input name="valor_a_receber" type="hidden" id="valor_a_receber" value="<? echo $valor_a_receber; ?>">
                <input type="submit" name="Submit2" value="Baixar">
                <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "$dia_inicial"; ?>">
                <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes_inicial"; ?>">
                <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano_inicial"; ?>">
                <input name="dia_final" type="hidden" id="dia_final" value="<? echo "$dia_final"; ?>">
                <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes_final"; ?>">
                <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano_final"; ?>">
                <input name="nomeclienteindicado" type="hidden" id="nomeclienteindicado" value="<? echo "$nome"; ?>"></td>
            </tr>
          </form>
          <?

if($reg==1){

echo "<tr>";

//$reg=0;

}

?>
          <? } ?>
        </table>
      </div></td>
    </tr>
    <tr>
      <td align="center" valign="middle">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td>&nbsp;</td>
      <td >&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>
