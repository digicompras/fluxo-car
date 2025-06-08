<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: ../../index.php");


ini_set('default_charset','UTF8_general_mysql500_ci');

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>

<html>

<head>

<title>CHURRASCARIA LC - CAIXA</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #DBDBDB;
	text-align: center;
}

.style3 {font-size: 10px}
.style2 {
	color: #0000FF;

	font-weight: bold;
}
.style5 {font-size: 48px}
.style1 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}

.style10 {font-size: 16px;
	font-weight: bold;
	color: #FF0000;
}

.style11 {font-size: 16px;
	font-weight: bold;
	color: #0000FF;
}
.style111 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}
.style6 {
	font-size: 12px; 
	font-weight: bold; 
	color: #FFFFFF;
	}
.style51 {font-size: 48px}
.style31 {	font-size: 10px;
	color: #FFFFFF;
}
.style61 {	font-size: 14px; 
	font-weight: bold; 
	color: #FFFFFF;
}

-->

</style>
</head>

<?



require '../../conect/conect.php';
include '../../css_menus/modal.css';
	include '../../css_menus/modal2.css';
		include '../../css_menus/modal3.css';
	
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}
?>
	

	

<?
	
	$area_a_focar_campo = $_POST['area_a_focar_campo'];
		
	$additem = $_POST['additem'];
	
	$cartao = $_POST['cartao'];
    $modopagto = $_POST['modopagto'];
	
	$nome = $_POST['nome'];
	
	

$mes_aliquota = date('m');
$ano_aliquota = date('Y');

$codigo_cliente = $_POST['codigo_cliente'];
$solicitacao = $_POST['solicitacao'];

$condicao = $_POST['condicao'];
$status_fatura = "FATURADO";
$data_abertura_fatura = date('Y-m-d');
$nfe = $_POST['nfe'];
$cpf_a_inserir = $_POST['cpf_a_inserir'];
$nome_a_inserir = $_POST['nome_a_inserir'];
$email_a_inserir = $_POST['email_a_inserir'];

$ultimo_orcamento = $_POST['ultimo_orcamento'];


$data = $data_abertura_fatura;

$data2 = explode("-", $data);


$dia = $data2[2];

$mes = $data2[1];

$ano = $data2[0];

$hora_abertura_fatura = date('H:i:s');


$datafechamento = date('Y-m-d');

$hora_fechamento_fatura = date('H:i:s');


?>

<?

$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];

$setor = $linha[43];

$estab_pertence = $linha[44];

$ultimo_departamento_trabalhado = $linha[66];


}



$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



<body bgcolor="#ffffff"



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed" 

  

<? } ?>
	  


<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?>

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

if(empty($nome)){
	
$sql = "SELECT * FROM comandas where empresaconveniada = '$ultimo_departamento_trabalhado' and statuscomanda = 'LIVRE' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_cli = mysql_num_rows($res);

$nomedecomandarapida = $linha[0];


}
	
$sql = "SELECT * FROM clientes where empresaconveniada = '$ultimo_departamento_trabalhado' and comandadofuncionario = '$nomedecomandarapida'";

}
else{
	
	
	
$sql = "SELECT * FROM clientes where comandadofuncionario = '$nome'";
	
}
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo_cliente= $linha[0];

$nomedofuncionario = $linha[1];
	
$empresaconveniada = $linha[137];
$comandadofuncionario = $linha[138];
$statusfuncionario = $linha[139];

}

if(empty($empresaconveniada)){
	
$empresa_do_convenio = $ultimo_departamento_trabalhado;
	
}
else{
	
$empresa_do_convenio = $empresaconveniada;
	
}

$sql = "SELECT * FROM empresas_conveniadas where nfantasia = '$empresa_do_convenio' limit 1";	
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$diafechamento = $linha[43];
$statusempresaconveniada = $linha[42];

}
?>
	
<?
	
$rapido = $_POST['rapido'];
if($rapido=="sim"){
	
$sql = "SELECT * FROM faturamento_futuro where loja = '$nfantasia_empresa' and status_fatura = 'Aberto' and operador = '$nome_operador' and departamento = '$ultimo_departamento_trabalhado' and empresaconveniada = '$empresa_do_convenio' and comanda_utilizada = '$comandadofuncionario' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_fatura_aberta = mysql_num_rows($res);
	
$num_fatura_encontrada = $linha[0];


}
	
$data_abertura_fatura = date('Y-m-d');
	$dia_abertura_fatura = date('d');
	$mes_abertura_fatura = date('m');
	$ano_abertura_fatura = date('Y');
	$hora_abertura_fatura = date('H:i:s');
	
	if($registros_fatura_aberta<=0){
	
$comando = "insert into faturamento_futuro(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,departamento,codigo_cliente,cliente,cpfdocliente,comanda_utilizada,empresaconveniada,nomedofuncionario,status_conta,caixa_rapido)

values('$data_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','Aberto','$ultimo_departamento_trabalhado','$nome_operador','$ultimo_departamento_trabalhado','$codigo_cliente','$nomedofuncionario','$comandadofuncionario','$comandadofuncionario','$empresa_do_convenio','$nomedofuncionario','Aberto','sim')";
mysql_query($comando,$conexao);
	
	
	$sql8 = "SELECT * FROM faturamento_futuro where loja = '$nfantasia_empresa' and status_fatura = 'Aberto' and operador = '$nome_operador' and departamento = '$ultimo_departamento_trabalhado' and empresaconveniada = '$empresa_do_convenio' and comanda_utilizada = '$comandadofuncionario' order by num_fatura desc limit 1";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {
$registros_fatura_aberta = mysql_num_rows($res8);
	
$num_fatura_encontrada = $linha[0];

	

}
	
	
	
$comando = "insert into orcamentos(condicao,loja,status,operador,dataabertura,horaabertura,diaabertura,mesabertura,anoabertura,codigo_cliente,cpf,nome,num_fatura,status_fatura,status_conta,departamento,comanda_utilizada,empresaconveniada,nomedofuncionario,dia_fatura,mes_fatura,ano_fatura,data_fatura,hora_fatura,caixa_rapido)

values('ORCAMENTO','$ultimo_departamento_trabalhado','Aberto','$nome_operador','$data_abertura_fatura','$hora_abertura_fatura','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$codigo_cliente','$comandadofuncionario','$nomedofuncionario','$num_fatura_encontrada','Aberto','Aberto','$ultimo_departamento_trabalhado','$comandadofuncionario','$empresa_do_convenio','$nomedofuncionario','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$data_abertura_fatura','$hora_abertura_fatura','sim')";
 
mysql_query($comando,$conexao);
	
		
		$sql9 = "SELECT * FROM orcamentos where num_fatura = '$num_fatura_encontrada' order by codigo_orcamento desc limit 1";
$res9 = mysql_query($sql9);
while($linha=mysql_fetch_row($res9)) {
	$registro_orcamento_aberto = mysql_num_rows($res9);

$codigo_orcamento_add_produto = $linha[0];
	$dataorcamento_add_produto = $linha[1];
	$horaorcamento_add_produto = $linha[2];
	
}


$comando = "update `$db`.`faturamento_futuro` set `codigo_orcamento` = '$codigo_orcamento_add_produto' where `faturamento_futuro`. `num_fatura` = '$num_fatura_encontrada' limit 1 ";
mysql_query($comando,$conexao);
		
	}
	else{
		
	$sql8 = "SELECT * FROM faturamento_futuro where loja = '$nfantasia_empresa' and status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' and empresaconveniada = '$empresa_do_convenio' and comanda_utilizada = '$comandadofuncionario' order by num_fatura desc limit 1";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {
$registros_fatura_aberta = mysql_num_rows($res8);
	
$num_fatura_encontrada = $linha[0];

	

}	
		
		
	$sql9 = "SELECT * FROM orcamentos where num_fatura = '$num_fatura_encontrada' order by codigo_orcamento desc limit 1";
$res9 = mysql_query($sql9);
while($linha=mysql_fetch_row($res9)) {
	$registro_orcamento_aberto = mysql_num_rows($res9);

$codigo_orcamento_add_produto = $linha[0];
	$dataorcamento_add_produto = $linha[1];
	$horaorcamento_add_produto = $linha[2];
	
}	
		
		
		
		
	}
	
	
}
else{
		  
$sql = "SELECT * FROM faturamento_futuro where comanda_utilizada = '$nome' and status_fatura = 'Aberto' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registro_orcamento_aberto = mysql_num_rows($res);


	$num_fatura_encontrada = $linha[0];
	

}

}
	
?>
	
<?
	
$dia_referencia = date('d');
$mes_referencia = date('m');
$ano_referencia = date('Y');
	
	
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
$data_abertura_fatura = date('Y-m-d');
	$dia_abertura_fatura = date('d');
	$mes_abertura_fatura = date('m');
	$ano_abertura_fatura = date('Y');
	$hora_abertura_fatura = date('H:i:s');
}

?>

	
	
<?

if(empty($nome)){



}
else{
	
//$sql = "SELECT * FROM faturamento_futuro where comanda_utilizada = '$nome' and status_fatura = 'Aberto' order by num_fatura desc limit 1";
$sql = "SELECT * FROM faturamento_futuro where loja = '$nfantasia_empresa' and status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' and empresaconveniada = '$empresa_do_convenio' and comanda_utilizada = '$comandadofuncionario' and num_fatura = '$num_fatura_encontrada' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$num_fatura_encontrada = $linha[0];
	$datafatura_add_produto = $linha[1];
	$diafatura_add_produto = $linha[2];
	$mesfatura_add_produto = $linha[3];
	$anofatura_add_produto = $linha[4];
	$horafatura_add_produto = $linha[5];

}


$sql2 = "SELECT * FROM orcamentos where num_fatura = '$num_fatura_encontrada' order by codigo_orcamento desc limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	$registro_orcamento_aberto = mysql_num_rows($res2);

$codigo_orcamento_add_produto = $linha[0];
	$dataorcamento_add_produto = $linha[1];
	$horaorcamento_add_produto = $linha[2];
	
}

}


if(empty($additem)){
	
}
else{
	
if($additem=="sim"){
	
$item = $_POST['item'];
$cod_barras = $_POST['cod_barras'];

$quant = $_POST['quant'];

if(empty($quant)){

$quantidade = "1";

}
else{

$quantidade = $quant;

}

if((empty($item)) && (empty($cod_barras))){
echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE INFORMAR O CODIGO OU O NOME DO PRODUTO');
window.location = 'fila_contas_fechadas_para_recebimento.php';

</script>";

}
else{

if(empty($item)){

$sql = "SELECT * FROM produtos where cod_barras = '$cod_barras' limit 1";

}
else{
	
$sql = "SELECT * FROM produtos where nome_produto = '$item' limit 1";

}

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registro_produto_encontrado = mysql_num_rows($res);
	
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
//$cod_barras = $linha[15];
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

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];

$classe = $linha[38];
$departamento = $linha[39];



if($classe=="O"){
	
$departamento_a_gravar = $ultimo_departamento_trabalhado;

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


if($registro_produto_encontrado<=0){
	
	
	
}
else{
	
$sql20 = "SELECT * FROM subcategoria_ec where empresaconveniada = '$empresa_do_convenio' and sub_categoria_permitida = '$sub_categoria' limit 1";	
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
	
	if($rapido=="sim"){ $caixa_rapido = "sim"; }else{}
	
if($num_fatura_encontrada<=0){
	echo "<script>

alert('ATENÇÃO!!!... PARA ATENDIMENTO SEM COMANDA UTILIZE A OPCAO RAPIDO ABAIXO!');


</script>";
}
else{
	
if((empty($item)) && (empty($cod_barras))){

}
else{
	
$comando = "insert into produtos_em_orcamento(codigo_orcamento,num_fatura,loja,codigo_cliente,nome,endereco,numero,bairro,cidade,estado,telefone,celular,email,cep,cpf,rg,dataorcamento,horaorcamento,codigoproduto,nomeproduto,categoria,precocompra,quant,preco0,preco1,preco2,preco3,acrescimo,acrescimodecimal,acrescimomonetario,total,operador,descontoetapa0,baseparaproximodesconto0,condicao,status,status_fatura,total_impostos,total_fornecedor,preco_normal,oferta,preco_oferta,margem_lucro,margem_lucro_informado,impostos,impostos_informado,margem_folga,margem_folga_decimal,impostos_compra,impostos_compra_decimal,total_impostos_compra,total_impostos_venda,setor,departamento,data_fatura,dia_fatura,mes_fatura,ano_fatura,hora_fatura,empresaconveniada,nomedofuncionario,datalancamento,dialancamento,meslancamento,anolancamento,horalancamento,caixa_rapido)

values('$codigo_orcamento_add_produto','$num_fatura_encontrada','$ultimo_departamento_trabalhado','$codigo_cliente','$nomedofuncionario','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf_cliente','$rg','$dataorcamento_add_produto','$horaorcamento_add_produto','$codigoproduto','$nomeproduto','$categoria','$preco_compra','$quantidade','$preco','0','0','0','0','0','0','$total','$nome_operador','0','$total','$condicao','$status','$status_fatura','$total_impostos','$total_fornecedor','$preco_normal','$oferta','$preco_oferta','$margem_lucro','$margem_lucro_informada','$impostos','$impostos_informado','$margem_folga','$margem_folga_decimal','$impostos_compra','$impostos_compra_decimal','$total_impostos_compra','$total_impostos_venda','$setor','$departamento_a_gravar','$datafatura_add_produto','$diafatura_add_produto','$mesfatura_add_produto','$anofatura_add_produto','$horafatura_add_produto','$empresa_do_convenio','$nomedofuncionario','$datalancamento','$dialancamento','$meslancamento','$anolancamento','$horalancamento','$caixa_rapido')";
mysql_query($comando,$conexao);

}

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
	
	
	

	
}
}

}
else{



}



	
	
	
	
	
	
	
}
?>



<?


		  


$sql = "SELECT * FROM faturamento_futuro where operador = '$nome_operador' and comanda_utilizada = '$comandadofuncionario' and status_fatura = 'Aberto' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_fatura = mysql_num_rows($res);
	
$num_fatura_encontrada = $linha[0];
	
$comanda_utilizada = $linha[46];
	

}

if(empty($nome)){
	
//$sql = "SELECT * FROM orcamentos where nome = '$comanda_utilizada' and status = 'Aberto' order by codigo_orcamento desc limit 1";
$sql = "SELECT * FROM orcamentos where comanda_utilizada = '$comandadofuncionario' and status = 'Aberto' and num_fatura = '$num_fatura_encontrada' order by codigo_orcamento desc limit 1";

}
else{
	
$sql = "SELECT * FROM orcamentos where comanda_utilizada = '$comandadofuncionario' and status = 'Aberto' and num_fatura = '$num_fatura_encontrada' order by codigo_orcamento desc limit 1";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$codigo_orcamento_a_receber = $linha[0];

$codigo_cliente = $linha[25];

$cpf_do_orcamento = $linha[26];

$cliente_do_orcamento = $linha[27];

}



if($registros_fatura>=1){

//------------ATUALIZANDO ORCAMENTOS NA FATURA--------------------------------


$sql3 = "SELECT * FROM faturamento_futuro where status_fatura = 'Aberto' and num_fatura = '$num_fatura_encontrada' and operador = '$nome_operador' and departamento = '$ultimo_departamento_trabalhado' order by num_fatura desc limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
	
	
$num_fatura = $linha[0];
$datefaturamento = $linha[1];
$dia_fatura = $linha[2];
$mes_fatura = $linha[3];
$ano_fatura = $linha[4];

$horafaturamento = $linha[5];

$loja = $linha[8];
$operador = $linha[9];

$cliente_nfe = $linha[22];
$cpf_nfe = $linha[23];

$ultimo_orcamento = $linha[45];
$comanda_utilizada = $linha[46];

}


//------------------------FIM DA ATUALIZACAO DE ORCAMENTOS NA FATURA-------------------------


}
else{
	
//$comando = "insert into faturamento_futuro(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,setor,departamento,cliente,cpf,codigo_orcamento,ultimo_orcamento,comanda_utilizada)

//values('$data_abertura_fatura','$dia','$mes','$ano','$hora_abertura_fatura','Aberto','$estab_pertence','$nome_operador','$setor','$ultimo_departamento_trabalhado','$cliente_do_orcamento','$cpf_do_orcamento','$codigo_orcamento_add_produto','$codigo_orcamento_add_produto','$nome')";
 
//mysql_query($comando,$conexao);



	
//$sql = "SELECT * FROM faturamento_futuro where comanda_utilizada = '$comandadofuncionario' and status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' order by num_fatura desc limit 1";
//$res = mysql_query($sql);
//while($linha=mysql_fetch_row($res)) {
	
	
$num_fatura = $linha[0];
$datefaturamento = $linha[1];
$dia_fatura = $linha[2];
$mes_fatura = $linha[3];
$ano_fatura = $linha[4];

$horafaturamento = $linha[5];

$loja = $linha[8];
$operador = $linha[9];

$cliente_nfe = $linha[22];
$cpf_nfe = $linha[23];

$ultimo_orcamento = $linha[45];
$comanda_utilizada = $linha[46];


}

//}





//----------------------ATUALIZA CONSUMIDOR NA NFE----------------------

if(empty($cpf_a_inserir)){
	
}
else{

if($nfe=="notapaulista"){
	
	
	
$sql2 = "SELECT * FROM clientes where cpf = '$cpf_a_inserir'";
$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {
$registros_cli = mysql_num_rows($res2);


}

if($registros_cli==0){

$comando = "insert into clientes(nome,cpf,email,operador) values('$nome_a_inserir','$cpf_a_inserir','$email_a_inserir','$nome_operador')";


mysql_query($comando,$conexao);

}


$sql3 = "SELECT * FROM clientes where cpf = '$cpf_a_inserir'";
$res3 = mysql_query($sql3);

while($linha=mysql_fetch_row($res3)) {
$reg++;


$codigo_cliente_a_inserir = $linha[0];

$cliente_a_inserir = $linha[1];

$cpf_a_inserir = $linha[4];



$endereco_a_inserir = $linha[11];

$numero_a_inserir = $linha[12];

$bairro_a_inserir = $linha[13];

$cidade_a_inserir = $linha[15];

$estado_a_inserir = $linha[16];

$cep_a_inserir = $linha[17];

$telefone_a_inserir = $linha[18];

$celular_a_inserir = $linha[19];

$email_a_inserir = $linha[20];


}



$sql4 = "select * from db";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {



$comando = "update `$linha[1]`.`faturamento_futuro` set `cliente` = '$cliente_a_inserir',`cpf` = '$cpf_a_inserir',`codigo_cliente` = '$codigo_cliente_a_inserir' where `faturamento_futuro`. `num_fatura` = '$num_fatura' limit 1 ";
}

mysql_query($comando,$conexao);


$sql5 = "SELECT * FROM faturamento_futuro where comanda_utilizada = '$comandadofuncionario' and status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' order by num_fatura desc limit 1";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {
	
	
$num_fatura = $linha[0];
$datefaturamento = $linha[1];
$dia_fatura = $linha[2];
$mes_fatura = $linha[3];
$ano_fatura = $linha[4];

$horafaturamento = $linha[5];

$loja = $linha[8];
$operador = $linha[9];

$cliente_nfe = $linha[22];
$cpf_nfe = $linha[23];

}


$sql6 = "select * from db";
$res6 = mysql_query($sql6);
while($linha=mysql_fetch_row($res6)) {



$comando = "update `$linha[1]`.`orcamentos` set `nome` = '$cliente_a_inserir',`cpf` = '$cpf_a_inserir',`codigo_cliente` = '$codigo_cliente_a_inserir' where `orcamentos`. `num_fatura` = '$num_fatura'";
}

mysql_query($comando,$conexao);



$sql7 = "select * from db";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {



$comando = "update `$linha[1]`.`produtos_em_orcamento` set `nome` = '$cliente_a_inserir',`cpf` = '$cpf_a_inserir',`codigo_cliente` = '$codigo_cliente_a_inserir',`endereco` = '$endereco_a_inserir',`numero` = '$numero_a_inserir',`bairro` = '$bairro_a_inserir',`cidade` = '$cidade_a_inserir',`estado` = '$estado_a_inserir',`telefone` = '$telefone_a_inserir',`celular` = '$celular_a_inserir',`email` = '$email_a_inserir',`cep` = '$cep_a_inserir' where `produtos_em_orcamento`. `num_fatura` = '$num_fatura'";
}

mysql_query($comando,$conexao);


}
}

//----------------------FIM DA ATUALIZAÇÃO DE CONSUMIDOR NA NFE--------------------




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`orcamentos` set `preparar_caixa_receber` = 'Sim' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento_a_receber' limit 1 ";
}

mysql_query($comando,$conexao);




$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento_a_receber'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];



$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {



$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preparar_caixa_receber` = 'Sim' where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento_a_receber' and codigo = '$codigolancamento'";
}

mysql_query($comando,$conexao);

}
?>






<?

$codigo_orcamento_ret = $_POST['codigo_orcamento_ret'];
$cod_prod_ret = $_POST['cod_prod_ret'];
$retirada_de_produto = $_POST['retirada_de_produto'];


$cod_gerente = $_POST['cod_gerente'];


$sql = "SELECT * FROM codigo_gerente where codigo = '$cod_gerente' and statuscodgerente = 'Ativo' limit 1";

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


$statusautorizacao = $linha[15];
$codigo_orcamento_ret = $linha[11];
$cod_prod_ret = $linha[12];

}


if($statusautorizacao == "Autorizado"){


if(empty($cod_prod_ret)){
	
}
else{
	
	
$sql4 = "SELECT * FROM produtos_em_orcamento where codigoproduto = '$cod_prod_ret' limit 1";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$categoria = $linha[19];

$codigo_retirado = $linha[0];
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








$comando = "insert into produtos_retirados_do_orcamento(codigo,codigo_orcamento,codigo_cliente,nome,codigoproduto,nomeproduto,categoria,quant,preco0,total,num_fatura,data_fatura,setor,departamento,operador,data_retirado,hora_retirado,gerente_que_autorizou)

values('$codigo_retirado','$codigo_orcamento_retirado','$codigo_cliente_retirado','$nome_retirado','$codigoproduto_retirado','$nomeproduto_retirado','$categoria_retirado','$quant_retirado','$preco_retirado','$total_retirado','$num_fatura_retirado','$datafatura_retirado','$setor_retirado','$departamento_retirado','$nome_operador','$data_retirado','$hora_retirado','$gerente_que_autorizou')";
 
mysql_query($comando,$conexao);



	
	
$comando = "delete from `produtos_em_orcamento` where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret' limit 1 ";

mysql_query($comando,$conexao);




}

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
 //---------------------SESSAO DE ARREDONDAMENTO E SIMULAÇÃO-----------------------------------

$obs = $_POST['obs'];		

$cartao = $_POST['cartao'];
$modopagto = $_POST['modopagto'];
	
if(empty($modopagto)){
$modo_do_pagto = "DINHEIRO";
}
else{
$modo_do_pagto = $modopagto;		
	}

$arredondamento = $_POST['arredondamento'];
	
?>


<?

if(($ultimo_departamento_trabalhado=="CHURRASCARIALCC") && ($rapido<>"sim") && ($num_fatura_encontrada>=0)){
	
$datalancamento = date('Y-m-d');
$dialancamento = date('d');
$meslancamento = date('m');
$anolancamento = date('Y');
$horalancamento = date('H:i:s');
	
$sql21 = "select sum(total) as total_basecalculo_dezporcento from produtos_em_orcamento where num_fatura = '$num_fatura_encontrada'";
$resultado21=mysql_query($sql21, $conexao);
$linha=mysql_fetch_array($resultado21);


$base_calculo_dez_por_cento = $linha['total_basecalculo_dezporcento'];
	$encontrando_dezporcento_do_total = bcmul($base_calculo_dez_por_cento,0.1,2);
	
$sql22 = "SELECT * FROM couvert_lancado where num_fatura = '$num_fatura_encontrada' limit 1";	
$res22 = mysql_query($sql22);
$couvert_lancado = mysql_num_rows($res22);
	
if($couvert_lancado<=0){
	
$comando = "insert into produtos_em_orcamento(codigo_orcamento,num_fatura,loja,codigo_cliente,nome,endereco,numero,bairro,cidade,estado,telefone,celular,email,cep,cpf,rg,dataorcamento,horaorcamento,codigoproduto,nomeproduto,categoria,precocompra,quant,preco0,preco1,preco2,preco3,acrescimo,acrescimodecimal,acrescimomonetario,total,operador,descontoetapa0,baseparaproximodesconto0,condicao,status,status_fatura,total_impostos,total_fornecedor,preco_normal,oferta,preco_oferta,margem_lucro,margem_lucro_informado,impostos,impostos_informado,margem_folga,margem_folga_decimal,impostos_compra,impostos_compra_decimal,total_impostos_compra,total_impostos_venda,setor,preparar_caixa_receber,departamento,data_fatura,dia_fatura,mes_fatura,ano_fatura,hora_fatura,empresaconveniada,nomedofuncionario,datalancamento,dialancamento,meslancamento,anolancamento,horalancamento)

values('$codigo_orcamento_a_receber','$num_fatura_encontrada','$estab_pertence','$codigo_cliente','$nomedofuncionario','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf_cliente','$rg','$datalancamento','$horalancamento','00','SERVICO GARCON','SERVICOS','$preco_compra','$quantidade','$encontrando_dezporcento_do_total','0','0','0','0','0','0','$encontrando_dezporcento_do_total','$operador','0','$total','ORCAMENTO','Aberto','A FATURAR','$total_impostos','$total_fornecedor','$encontrando_dezporcento_do_total','Nao','$preco_oferta','$margem_lucro','$margem_lucro_informada','$impostos','$impostos_informado','$margem_folga','$margem_folga_decimal','$impostos_compra','$impostos_compra_decimal','$total_impostos_compra','$total_impostos_venda','$setor','Sim','$ultimo_departamento_trabalhado','$datefaturamento','$dia_abertura_fatura','$mes_abertura_fatura','$ano_abertura_fatura','$hora_abertura_fatura','$empresa_do_convenio','$nomedofuncionario','$datalancamento','$dialancamento','$meslancamento','$anolancamento','$horalancamento')";
mysql_query($comando,$conexao);
	
	
	$comando = "insert into couvert_lancado(data,hora,num_fatura,valor,operador)
values('$datalancamento','$horalancamento','$num_fatura_encontrada','$encontrando_dezporcento_do_total','$operador')";
mysql_query($comando,$conexao);
	
	
	
	
}
	
}


?>
	

 <?
	if($num_fatura_encontrada>=1){
$sql = "select sum(total) as total_liquido from produtos_em_orcamento where num_fatura = '$num_fatura_encontrada'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_produtos = $linha['total_liquido'];

	}

if(empty($arredondamento)){
	


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
	
$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura_encontrada'";

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


$sql2 = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura_encontrada'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$codigolancamento = $linha[0];





$sql3 = "select * from db";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `acrescimo_por_rateio` = '$acrescimo_por_rateio' where `produtos_em_orcamento`. `codigo` = '$codigolancamento'";
}

mysql_query($comando,$conexao);


}



}


if(($arred >"0") && ($arred < $total_liquido_produtos)){
	
$total_geral = bcadd($arred,0,2);


$desconto_de_arredondamento = bcsub($total_liquido_produtos,$arred,2);

$acrescimo_de_arredondamento = "0";












}



$entrada = $_POST['entrada'];

                   
                    
if(empty($quantparc)){ 

 }
 else{
	 


$restante_a_pagar = bcsub($total_geral,$entrada,2);
 
$valorparcela = bcdiv($restante_a_pagar,$quantparc,2);


 } 
 
 
 
 
 
 if($valorparcela==""){
	 
}
else{ 


                    
                    
 $sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `quantparc` = '$quantparc',`modopagto` = '$modopagto',`cartao` = '$cartao',`valorparcela` = '$valorparcela',`obs` = '$obs',`departamento` = '$ultimo_departamento_trabalhado' where `orcamentos`. `num_fatura` = '$num_fatura_encontrada' limit 1 ";
}

mysql_query($comando,$conexao);



$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`faturamento_futuro` set `quantparc` = '$quantparc',`status_fatura` = '$status_fatura',`modopagto` = '$modopagto',`cartao` = '$cartao',`valorparcela` = '$valorparcela',`total_geral` = '$total_geral',`obs` = '$obs',`desconto_de_arredondamento` = '$desconto_de_arredondamento',`acrescimo_de_arredondamento` = '$acrescimo_de_arredondamento',`departamento` = '$ultimo_departamento_trabalhado' where `faturamento_futuro`. `num_fatura` = '$num_fatura_encontrada' limit 1 ";
}

mysql_query($comando,$conexao);



}
                   
                    
 //---------------------FIM DA SESSAO DE ARREDONDAMENTO E SIMULAÇÃO-----------------------------------
?>

<?

 $cadastrorapidodeproduto = $_POST['cadastrorapidodeproduto'];
  if($cadastrorapidodeproduto=="cadastrarproduto"){
$cod_barras = $_POST['cod_barras'];
$nome_produto = $_POST['nome_produto'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];
$sub_categoria = $_POST['sub_categoria'];
$classe = $_POST['classe'];
$departamentoproduto = $_POST['departamentoproduto'];
$datacadastro = date('Y-m-d');
$horacadastro = date('H:i:s');

$sql = "SELECT * FROM produtos where cod_barras = '$cod_barras' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registroproduto = mysql_num_rows($res);


$codigo = $linha[11];
}

if($registroproduto==0){

if((empty($nome_produto)) or (empty($preco)) or (empty($sub_categoria)) or (empty($cod_barras))){
echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE INFORMAR O NOME DO PRODUTO, PRECO, SUB-CATEGORIA, CODIGO DE BARRAS!!!... SAO APENAS 4 INFORMACOES! INFORME TODAS E PODERA CADASTRAR O PRODUTO');


</script>";

}
else{


$comando = "insert into produtos(nome_produto,cod_barras,preco,categoria,sub_categoria,classe,departamento,operador,datacadastro,horacadastro)
values('$nome_produto','$cod_barras','$preco','$categoria','$sub_categoria','$classe','$departamentoproduto','$nome_operador','$datacadastro','$horacadastro')";
mysql_query($comando,$conexao);


$sql = "SELECT * FROM subcategoria_ec where empresaconveniada = '$nfantasia_empresa' and sub_categoria_permitida = '$sub_categoria'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$total_permissoes = mysql_num_rows($res);

}
if($total_permissoes>=1){
	
}
else{
$comando = "insert into subcategoria_ec(empresaconveniada,sub_categoria_permitida)

values('$nfantasia_empresa','$sub_categoria')";
 
mysql_query($comando,$conexao);
	
}


}


}
else{
?>
<span class="style4">
<?
echo "<script>

alert('ATENÇÃO!!!... JÁ EXISTE $registroproduto registro(s) DO PRODUTO..... $nome_produto  Cod. Barras $cod_barras.');


</script>";

}

}

?>
<table width="95%" border="0" align="center">
  <tbody>
    <tr>
      <th width="32%" align="left" valign="top" scope="col"><form action="../index.php" method="post" name="form1" target="_top">
        <input class="class01" type="submit" name="Submit" value="Voltar ao menu principal">
        <span class="style1"> </span>
      </form></th>
      <th width="30%" align="center" valign="top" scope="col"><strong><? echo $razaosocial_empresa; ?> <br>
        <? echo $endereco_empresa; ?> , <? echo $numero_empresa; ?> - <? echo $bairro_empresa; ?> <? echo $cep_empresa; ?> -<? echo $cidade_empresa; ?> - <? echo $estado_empresa; ?><br>
      </strong></th>
      <th width="38%" align="right" valign="top" scope="col"><span class="style51"><strong>Frente de Caixa
      </strong></span></th>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" align="left">
  <tr>
      <td><div align="center">
        <table width="100%" border="0" align="left">
          <tr>
            <td width="13%" rowspan="2" valign="top"><div align="center"><? echo "Comanda"; ?></div>              <div align="center"></div></td>
            <td colspan="2" rowspan="2" valign="top"><div align="center">
              <form name="comandas" method="post" action="fila_contas_fechadas_para_recebimento.php">
                <div align="left">
                  <strong>
                  <? if($rapido=="sim"){ echo "<input name='rapido' type='hidden' id='rapido' value='sim'>"; } ?>
                  </strong><? echo "<input class='class02' type='text' name='nome' id='nome'>"; ?>
                  <input name="condicao" type="hidden" id="condicao" value="PEDIDO">
					<?
                  echo "<input class='class01' type='submit' name='button3' id='button3' value='Buscar'>"; ?>
                  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
					
					//echo "$comandadofuncionario";
?>
                </div>
              </form>
            </div>              </td>
            <td valign="top"><div align="center">
              <form name="form3" method="post" action="fila_contas_fechadas_para_recebimento.php">
                <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                <input name="solicitacao" type="hidden" id="solicitacao" value="notapaulista">
                <? if($registros_fatura>=1){
//echo "<input class='class01' type='submit' name='button3' id='button3' value='Nota Paulista?'>";

}

?>
              </form>
            </div></td>
            <td width="9%"><div align="center"></div></td>
            <td width="30%" rowspan="3" valign="top"><div align="center" class="class04"><strong>Total da Compra<br>
                  <?

echo "R$ $total_geral";




?>
                  <? 



$sql = "SELECT * FROM tabela_cartoes where modopagto = '$tipocartao' and status = 'Ativo' and mes = '$mes_aliquota' and ano = '$ano_aliquota' and '$quantparc' >= prazo_inicial and '$quantparc' <= prazo_final order by modopagto asc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
		
$aliquota = $linha[9];
}

$aliquota_decimal = bcdiv($aliquota,100,4);

$custo_com_cartao = bcmul($total_geral,$aliquota_decimal,2);



$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `custo_com_cartao` = '$custo_com_cartao',`departamento` = '$ultimo_departamento_trabalhado' where `orcamentos`. `num_fatura` = '$num_fatura'";
}

mysql_query($comando,$conexao);


if(($modopagto == "CARTAO") or ($modopagto == "CARTAO")){

//echo "Aliquota $aliquota%";

}
 ?>
            </strong></div></td>
          </tr>
          <tr>
            <td valign="top"><form name="form5" method="post" action="fila_contas_fechadas_para_recebimento.php">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <input name="nfe" type="hidden" id="nfe" value="notapaulista">
              <?
if($solicitacao=="notapaulista"){
	
echo "CPF: <input type='text' name='cpf_a_inserir' id='cpf_a_inserir'><br>
      Nome: <input type='text' name='nome_a_inserir' id='nome_a_inserir'><br>
      E-Mail: <input type='text' name='email_a_inserir' id='email_a_inserir'><br>
              <input type='submit' name='button3' id='button3' value='Ok'>";
}
			  
?>
            </form></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="5" align="left" valign="top"><form name="itens" method="post" action="fila_contas_fechadas_para_recebimento.php">
              <div><strong>
                <? if(($rapido=="sim") or (empty($area_a_focar_campo))){ ?>
                <script language='JavaScript' type='text/javascript'>
document.itens.cod_barras.focus()
                </script>
                <? } ?>
                <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario; ?>">
                <font color="#0000FF">
                  <input name="additem" type="hidden" id="additem" value="sim">
                  </font><font color="#0000FF">                  </font> <? if((empty($nome)) && ($num_fatura_encontrada<=0)){}else{ echo "Quant"; } ?>
                <? if((empty($nome)) && ($num_fatura_encontrada<=0)){}else{ echo "<input class='class02' name='quant' type='text' id='quant' size='3'>"; } ?>
                <? if((empty($nome)) && ($num_fatura_encontrada<=0)){}else{ echo "Cod"; } ?>
                <? if((empty($nome)) && ($num_fatura_encontrada<=0)){}else{ echo "<input name='cod_barras' type='text' class='class02' id='cod_barras' size='10'>"; } ?>
                <? if((empty($nome)) && ($num_fatura_encontrada<=0)){}else{ echo "<select class='class02' name='item' id='item'>
                  <option selected></option>"; } ?>
                <?
if((empty($nome)) && ($num_fatura_encontrada<=0)){}else{

    $sql = "select * from produtos order by nome_produto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome_produto']."</option>";
    }
	
}
?>
                <? if(empty($nome)){}else{ echo "</select>"; } ?>
                </strong>
                <?
               if((empty($nome)) && ($num_fatura_encontrada<=0)){}else{ echo "<input class='class01' type=image src='../../imagens_botoes/adicionar_item.png' width='25' height='25' name='Submit2' value='Adicionar'>"; }
					?>
                <strong>
                  <? if($rapido=="sim"){ echo "<input name='rapido' type='hidden' id='rapido' value='sim'>"; } ?>
                  </strong></div>
            </form></td>
          </tr>
          <tr>
            <td colspan="3"><div align="center">N&ordm; Cupon(Fatura) <? echo $num_fatura_encontrada; ?></div></td>
            <td width="15%"><div align="center">
              <? if($retirada_de_produto=="retirar_produto"){
$datepedido = date('Y-m-d');
$horapedido = date('H:i:s');
$dateretiradapedido = date('Y-m-d');
$horaretiradapedido = date('H:i:s');
	
$diaretiradapedido = date('d');
$mesretiradapedido = date('m');
$anoretiradapedido = date('Y');


$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura_encontrada' and codigo_orcamento = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeprodutoaretirar = $linha[18];

}
		
				
$comando = "insert into pedido_de_retirada_produto_da_fatura(num_fatura,datepedido,dia,mes,ano,horapedido,codigoorcamento,codigoproduto,nomeproduto,operador,departamento,statusautorizacao,loja)

values('$num_fatura_encontrada','$datepedido','$diaretiradapedido','$mesretiradapedido','$anoretiradapedido','$horapedido','$codigo_orcamento_ret','$cod_prod_ret','$nomeprodutoaretirar','$nome_operador','$ultimo_departamento_trabalhado','Aguardando Autorizacao','$nfantasia_empresa')";
 
mysql_query($comando,$conexao);

$sql = "select * from pedido_de_retirada_produto_da_fatura where num_fatura = '$num_fatura_encontrada' and codigoorcamento = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret' and statusautorizacao = 'Aguardando Autorizacao' and datepedido = '$datepedido' and horapedido = '$horapedido' order by datepedido desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_de_retirada = $linha[0];

}


//echo "<form name='cancel_item' method='post' action='fila_contas_fechadas_para_recebimento.php'>
                //<div align='left'>
                  //Codigo de Autoriza&ccedil;&atilde;o<input class='class02' type='password' name='cod_gerente' id='cod_gerente'>
				  //<input name='nome' type='hidden' id='nome' value='$comandadofuncionario'>
				 // <input type='hidden' name='codigo_orcamento_ret' id='codigo_orcamento_ret' value='$codigo_orcamento_ret'>
                 // <input type='hidden' name='cod_prod_ret' id='cod_prod_ret' value='$cod_prod_ret'>
				  //<input name='nome' type='hidden' id='nome' value='$comandadofuncionario'>
				  //<input name='codigo_de_retirada' type='hidden' id='codigo_de_retirada' value='$codigo_de_retirada'>
				  //<input name='dateautorizacao' type='hidden' id='dateautorizacao' value='$dateretiradapedido'>
                  //<input name='horaautorizacao' type='hidden' id='horaautorizacao' value='$horaretiradapedido'>
//<input class='class01' type='submit' name='button2' id='button2' value='Autorizar'>
                //</div>";
	?>
              <? if($area_a_focar_campo=="cancelamento_de_item"){ ?>
              <script language='JavaScript' type='text/javascript'>
document.cancel_item.cod_gerente.focus()
              </script>
              <? } ?>
              <?
              //echo "</form>";
	
}
?>
            </div></td>
            <td valign="top"></td>
            <td valign="top"><div align="center"></div></td>
          </tr>
          <tr>
            <td colspan="3" valign="top">
              <div align="center">
				  <div style="overflow: auto; height: 200px">
                <table width="100%" border="0" cellspacing="0">
                  <tr>
					  <?
					  if($num_fatura_encontrada>=1){
$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura_encontrada'";
$res = mysql_query($sql);
$quant_itens_cupom = mysql_num_rows($res);
					  }
					?>
                    <td colspan="6"><div align="center">
                      <p><strong>Itens Consumidos</strong><br>
                        <br>
                      </p>
                    </div></td>
                  </tr>
                  <tr>
                    <td><strong>Total Itens</strong></td>
                    <td><? echo "$quant_itens_cupom"; ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="15%"><div align="left"><strong>Pedido</strong></div></td>
                    <td width="6%"><div align="left"><strong>Cod</strong></div></td>
                    <td width="35%"><div align="left"><strong>Prod</strong></div></td>
                    <td width="10%"><div align="left"><strong>Quant</strong></div></td>
                    <td width="16%"><div align="left"><strong>Preco Unit</strong></div></td>
                    <td width="18%"><div align="left"><strong>Total</strong></div></td>
                  </tr>
  <?
            
$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento_a_receber'";
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
$total = $linha[29];

$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];
$descontoetapa4 = $linha[83];


$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];
$descontomonetarioetapa4 = $linha[85];


            
?>
                  <tr>
                    <td><div align="left"><? echo $codigo_orcamento; ?></div></td>
                    <td>                    <div align="left"><? echo $codigoproduto; ?></div></td>
                    <td><div align="left"><? echo $nomeproduto; ?></div></td>
                    <td><div align="left"><? echo $quant; ?></div></td>
                    <td><div align="left"><? echo $preco; ?></div></td>
                    <td><div align="left"><? echo $total; ?></div></td>
                  </tr>
                  
  <? } ?>
                </table>
				  </div>
              </div>
            </td>
            <td><div align="center"></div>              
            <div align="center"></div>              <div align="center"></div></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="6"><div align="center">
              <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col"> <div id="prepara_retirar_item" class="modal" role="dialog"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
                      <form name="form2" method="post" action="fila_contas_fechadas_para_recebimento.php#efetiva_retirada_item">
                        <p> ATEN&Ccedil;&Atilde;O!!!... <br>
                          <br>
                          Retirada de Item... <br>
                          <br>
                          Solicite Autoriza&ccedil;&atilde;o! <br>
                          <br>
                          <strong>
                          <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                          </strong>
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
                          <input class='class02' name="cod_prod_ret" type="text" id="cod_prod_ret" size="3">
                          <br>
                          <input class='class01' type=image src="../../imagens_botoes/retira_item.png" width="50" height="50" name="Submit4" value="Retirar ">
                        </p>
                      </form>
                    </div>
                    </th>
                    <th scope="col"> <? if($modopagto=="CARTAO"){ $div_class = "modal2"; }else{ $div_class = "modal"; } ?>
                      <div id="modo_receber" class="<? echo "$div_class"; ?>" role="dialog"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
                        <form name="form4" method="post" action="fila_contas_fechadas_para_recebimento.php#modo_receber">
                          <div align="center">
                            <p><strong>
                              <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                            </strong> <br>
                              <br>
                              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                              <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura_encontrada; ?>">
                              <input name="solicitacao" type="hidden" id="solicitacao">
                              Arredondar
                              <input class='class02' name="arredondamento" type="text" id="arredondamento" value="<? echo $total_geral; ?>" size="8">
                              <br>
                              Modo de pagto: <strong>
                                <select class='class02' name="modopagto" id="modopagto">
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
                                </strong> <br>
                              <?
if((empty($modopagto)) or ($modopagto=="DINHEIRO")){
	?>
                              <input name="entrada" type="hidden" id="entrada" value="<? echo "0.00";  ?>" size="6">
                              <?	
}
else{
	?>
                              <br>
                              Entrada:
                              <input class='class02' name="entrada" type="text" id="entrada" value="<? echo "$entrada";  ?>" size="6">
                              <? } ?>
                              em <strong>
                                <select class='class02' name="quantparc" id="quantparc">
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
                          <td><div align='center'><select class='class06' name='cartao' id='cartao'>
<option selected> $cartao </option>";
    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select>
  
</div></td>

<td><div align='center'><select class='class06' name='tipocartao' id='tipocartao'>
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

<td><div align='center'><input class='class06' name='valorcartao' type='text' id='valorcartao' value='$valorcartao' size='5'>
  
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
<td><div align='center'><select class='class06' name='cartao2' id='cartao2'>
<option selected> $cartao2 </option>";
    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  
  

</div></td>


<td><div align='center'><select class='class06' name='tipocartao2' id='tipocartao2'>
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

<td><div align='center'><input class='class06' name='valorcartao2' type='text' id='valorcartao2' value='$valorcartao2' size='5'>
  
  
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
						
						
<td><div align='center'><select class='class06' name='cartao3' id='cartao3'>
    <option selected> $cartao3 </option>";
    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  

</div></td>
                          
<td><div align='center'><select class='class06' name='tipocartao3' id='tipocartao3'>
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
                          
						  
<td><div align='center'><input class='class06' name='valorcartao3' type='text' id='valorcartao3' value='$valorcartao3' size='5'>
  
  
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
						
				
<td><div align='center'><select class='class06' name='cartao4' id='cartao4'>
    <option selected> $cartao4 </option>";
    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  
  
</div></td>
                          
<td><div align='center'><select class='class06' name='tipocartao4' id='tipocartao4'>
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
                          
<td><div align='center'><input class='class06' name='valorcartao4' type='text' id='valorcartao4' value='$valorcartao4' size='5'>
  
  
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
                              <input class='class02' name="valor_recebido" type="text" id="valor_recebido" value="<? 
		if($modopagto<>"CARTAO"){
	if(empty($totalrecebido)){
		if(empty($arredondamento)){
echo $total_liquido_faturas_fechadas;
		}
		else{
echo $arred;
		}
	}
	else{
echo $totalrecebido; 
	}
}
else{ 
	if(empty($totalrecebido)){
	if(empty($arredondamento)){
echo $total_liquido_faturas_fechadas; 
	}
	else{
echo $arred;
	
		} 
}
	else{
echo $totalrecebido; 
	}
	
} 
?>" size="5">
                              <br>
                              <? if($totalrecebido<$total_geral){echo "Saldo a Receber R$ $saldoareceber "; } ?>
                              <? $troco = bcsub($totalrecebido,$total_geral,2); if($totalrecebido>$total_geral){ echo " Troco R$ $troco"; } ?>
                              <br>
                              <input class='class01' type=image src="../../imagens_botoes/atualiza_calculos.png" width="50" height="50" name="button2" id="button2" value="Atualizar Calculos">
                              </strong>                   
                          </div>
                        </form>
                        <table width="100%" border="0">
                          <form name="form7" method="post" action="finalizar_orcamento_frente_de_caixa.php">
                            <tr>
                              <td width="346%" colspan="3"><div align="center">
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
                                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
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
                                <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura_encontrada; ?>">
                                </span>
                                <input name="horafechamento" type="hidden" id="horafechamento" value="<? echo date('H:i:s'); ?>">
                                <span class="style31"><strong><font color="#0000FF">
                                  <input name="quantparc" type="hidden" id="quantparc" value="<? if(empty($quantparc)){ echo "1"; } else{ echo $quantparc; } ?>">
                                  <strong><font color="#0000FF">
                                    <input name="operador_alterou" type="hidden" id="operador_alterou" value="<? echo $operador; ?>">
                                    <input name="loja" type="hidden" id="loja" value="<? echo $loja; ?>">
                                    </font></strong></font></strong></span>
                                <input name="valor_entrada" type="hidden" id="valor_entrada" value="<? echo $entrada; ?>">
                                <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input name="modopagto" type="hidden" id="modopagto" value="<? echo $modopagto;  ?>">
                                  <strong><font color="#0000FF"><strong><font color="#0000FF">
                                    <input name="cartao" type="hidden" id="cartao" value="<? echo $cartao; ?>">
                                    <input name="tipocartao" type="hidden" id="tipocartao" value="<? echo $tipocartao; ?>">
                                    </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                                <input name="valorcartao" type="hidden" id="valorcartao" value="<? echo $valorcartao; ?>">
                                <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input type="hidden" name="custo_com_cartao" id="custo_com_cartao" value="<? echo $custo_com_cartao1; ?>">
                                  <input name="cartao2" type="hidden" id="cartao2" value="<? echo $cartao2; ?>">
                                  <input name="tipocartao2" type="hidden" id="tipocartao2" value="<? echo $tipocartao2; ?>">
                                  </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                                <input name="valorcartao2" type="hidden" id="valorcartao2" value="<? echo $valorcartao2; ?>">
                                <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input type="hidden" name="custo_com_cartao2" id="custo_com_cartao2" value="<? echo $custo_com_cartao2; ?>">
                                  <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input name="cartao3" type="hidden" id="cartao3" value="<? echo $cartao3; ?>">
                                  </font></strong></font></strong></font></strong></font></strong>                                  </font></strong></font></strong></font></strong></font></strong></font></strong> <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input name="tipocartao3" type="hidden" id="tipocartao3" value="<? echo $tipocartao3; ?>">
                                    </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                                <input name="valorcartao3" type="hidden" id="valorcartao3" value="<? echo $valorcartao3; ?>">
                                <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input type="hidden" name="custo_com_cartao3" id="custo_com_cartao3" value="<? echo $custo_com_cartao3; ?>">
                                  </font></strong></font></strong></font></strong></font></strong></font></strong> <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                    <input name="cartao4" type="hidden" id="cartao4" value="<? echo $cartao4; ?>">
                                    <input name="tipocartao4" type="hidden" id="tipocartao4" value="<? echo $tipocartao4; ?>">
                                    </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                                <input name="valorcartao4" type="hidden" id="valorcartao4" value="<? echo $valorcartao4; ?>">
                                <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input type="hidden" name="custo_com_cartao4" id="custo_com_cartao4" value="<? echo $custo_com_cartao4; ?>">
                                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                                  </font></strong></font></strong></font></strong></font></strong></font></strong>
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
                                <?
						  if($modopagto=="CARTEIRA"){
							echo"Cliente:<br><select class='class02' name='nomeclienteindicado' id='nomeclienteindicado'>
							  <option></option>";
    $sql = "select * from clientes where estabelecimento = '$estab_pertence' and status_cliente = 'Ativo' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
   }
      echo"</select>";
							  
						  }
						  else{
							  
						  echo "<input name='nomeclienteindicado' type='hidden' id='nomeclienteindicado' value=''>";
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
	
echo "<input class='class01' type=image src='../../imagens_botoes/registradora.png' width='50' height='50' name='Submit32' value='Finalizar'>";

	
}

						  ?>
                              </div></td>
                            </tr>
                          </form>
                        </table>
                      </div>
                    </th>
                    <th valign="top" scope="col"><? if($modopagto=="CARTAO"){ $div_class = "modal3"; }else{ $div_class = "modal"; } ?>
                      <div id="modo_receber2" class="<? echo "$div_class"; ?>" role="dialog"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
					  <?
					  $novosistemadepagto = $_POST['novosistemadepagto'];
						  
  if($novosistemadepagto == "definirmodopagto"){
  ?>
                        <form name="form4" method="post" action="fila_contas_fechadas_para_recebimento.php#modo_receber2">
                          <div align="center">
                            <p><strong>
                              <input name="novosistemadepagto" type="hidden" id="novosistemadepagto" value="definirmodopagto">
                              <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                            </strong> <br>
                              <br>
                              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                              <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura_encontrada; ?>">
                              <input name="solicitacao" type="hidden" id="solicitacao">
                             
   <?
   
	  
$cartao = $_POST['bandeira'];
$tipocartao = $_POST['formapagto'];
$valorcartao = $_POST['valor_informado'];

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
//$parcela2 = $valorcartao;
$parcela3 = $valorcartao2;
$parcela4 = $valorcartao3;
$parcela5 = $valorcartao4;

$subtotalrecebido1 = bcadd($parcela1,$valorcartao,2);
$subtotalrecebido2 = bcadd($parcela3,$parcela4,2);
$subtotalrecebido3 = bcadd($parcela5,0,2);

$subtotalrecebido4 = bcadd($subtotalrecebido1,$subtotalrecebido2,2);

$totalrecebido = bcadd($subtotalrecebido4,$subtotalrecebido3,2);

$saldoareceber = bcsub($total_geral,$totalrecebido,2);
	  
	  
                      echo "<table width='100%' border='2' cellspacing='0'>
					  <tr>
					  <td><div align='center' class='style6'><strong>Bandeira</strong></div></td>
                          <td><div align='center' class='style6'><strong>Forma Pagto</strong></div></td>
                          <td><div align='center' class='style6'><strong>Valor</strong></div></td>
                          <td><div align='center' class='style6'><strong></strong></div></td>
                          <td><div align='center' class='style6'><strong></strong></div></td>
					  
					  </tr>
					  <tr>
					  <td><div align='center' class='style6'><strong><input class='class06' name='bandeira' type='text' id='bandeira' value='' size='4'></strong></div></td>
                          <td><div align='center' class='style6'><strong><input class='class06' name='formapagto' type='text' id='formapagto' value='' size='4'></strong></div></td>
                          <td><div align='center' class='style6'><strong><input class='class06' name='valor_informado' type='text' id='valor_informado' value='' size='8'></strong></div></td>
                          <td><div align='center' class='style6'><strong></strong></div></td>
                          <td><div align='center' class='style6'><strong></strong></div></td>
					  
					  </tr>
                        <tr>
                          <td><div align='center' class='style6'><strong>Cart&atilde;o</strong></div></td>
                          <td><div align='center' class='style6'><strong>Tipo Cart&atilde;o</strong></div></td>
                          <td><div align='center' class='style6'><strong>Valor</strong></div></td>
                          <td><div align='center' class='style6'><strong>Aliquota %</strong></div></td>
                          <td><div align='center' class='style6'><strong>Custo</strong></div></td>
                          
                        </tr>
                        <tr>
                          <td><div align='center'><input class='class06' name='cartao' type='text' id='cartao' value='Indefinido' size='8'>";

  echo "</select>
  
</div></td>

<td><div align='center'><input class='class06' name='tipocartao' type='text' id='tipocartao' value='$tipocartao' size='8'>";
    
    

 echo "</div></td>

<td><div align='center'><input class='class06' name='valorcartao' type='text' id='valorcartao' value='$valorcartao' size='5'>
  
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
<td><div align='center'><select class='class06' name='cartao2' id='cartao2'>
<option selected> $cartao2 </option>";
    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  
  

</div></td>


<td><div align='center'><select class='class06' name='tipocartao2' id='tipocartao2'>
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

<td><div align='center'><input class='class06' name='valorcartao2' type='text' id='valorcartao2' value='$valorcartao2' size='5'>
  
  
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
						
						
<td><div align='center'><select class='class06' name='cartao3' id='cartao3'>
    <option selected> $cartao3 </option>";
    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  

</div></td>
                          
<td><div align='center'><select class='class06' name='tipocartao3' id='tipocartao3'>
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
                          
						  
<td><div align='center'><input class='class06' name='valorcartao3' type='text' id='valorcartao3' value='$valorcartao3' size='5'>
  
  
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
						
				
<td><div align='center'><select class='class06' name='cartao4' id='cartao4'>
    <option selected> $cartao4 </option>";
    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  
  
</div></td>
                          
<td><div align='center'><select class='class06' name='tipocartao4' id='tipocartao4'>
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
                          
<td><div align='center'><input class='class06' name='valorcartao4' type='text' id='valorcartao4' value='$valorcartao4' size='5'>
  
  
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
	  
	 

	  
//$parcela1 = $entrada;
//$sub_totalrecebido = $_POST['valor_recebido'];


//$totalrecebido = bcadd($parcela1,$sub_totalrecebido,2);

//$saldoareceber = bcsub($total_geral,$totalrecebido,2);
  
  
  
?>
                              <br>
                              Valor Recebido<br>
                              <input class='class02' name="valor_recebido" type="text" id="valor_recebido" value="<? echo $totalrecebido; ?>" size="5">
                              <br>
                              <? if($totalrecebido<$total_geral){echo "Saldo a Receber R$ $saldoareceber "; } ?>
                              <? $troco = bcsub($totalrecebido,$total_geral,2); if($totalrecebido>$total_geral){ echo " Troco R$ $troco"; } ?>
                              <br>
                              <input class='class01' type=image src="../../imagens_botoes/atualiza_calculos.png" width="50" height="50" name="button2" id="button2" value="Atualizar Calculos">
                              </strong>                   
                          </div>
                        </form>
						<? } ?>
                        <table width="100%" border="0">
                          <form name="form7" method="post" action="finalizar_orcamento_frente_de_caixa.php">
                            <tr>
                              <td width="346%" colspan="3"><div align="center">
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
                                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
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
                                <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura_encontrada; ?>">
                                </span>
                                <input name="horafechamento" type="hidden" id="horafechamento" value="<? echo date('H:i:s'); ?>">
                                <span class="style31"><strong><font color="#0000FF">
                                  <input name="quantparc" type="hidden" id="quantparc" value="<? if(empty($quantparc)){ echo "1"; } else{ echo $quantparc; } ?>">
                                  <strong><font color="#0000FF">
                                    <input name="operador_alterou" type="hidden" id="operador_alterou" value="<? echo $operador; ?>">
                                    <input name="loja" type="hidden" id="loja" value="<? echo $loja; ?>">
                                    </font></strong></font></strong></span>
                                <input name="valor_entrada" type="hidden" id="valor_entrada" value="<? echo $entrada; ?>">
                                <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input name="modopagto" type="hidden" id="modopagto" value="<? echo $modopagto;  ?>">
                                  <strong><font color="#0000FF"><strong><font color="#0000FF">
                                    <input name="cartao" type="hidden" id="cartao" value="<? echo $cartao; ?>">
                                    <input name="tipocartao" type="hidden" id="tipocartao" value="<? echo $tipocartao; ?>">
                                    </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                                <input name="valorcartao" type="hidden" id="valorcartao" value="<? echo $valorcartao; ?>">
                                <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input type="hidden" name="custo_com_cartao" id="custo_com_cartao" value="<? echo $custo_com_cartao1; ?>">
                                  <input name="cartao2" type="hidden" id="cartao2" value="<? echo $cartao2; ?>">
                                  <input name="tipocartao2" type="hidden" id="tipocartao2" value="<? echo $tipocartao2; ?>">
                                  </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                                <input name="valorcartao2" type="hidden" id="valorcartao2" value="<? echo $valorcartao2; ?>">
                                <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input type="hidden" name="custo_com_cartao2" id="custo_com_cartao2" value="<? echo $custo_com_cartao2; ?>">
                                  <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input name="cartao3" type="hidden" id="cartao3" value="<? echo $cartao3; ?>">
                                  </font></strong></font></strong></font></strong></font></strong>                                  </font></strong></font></strong></font></strong></font></strong></font></strong> <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input name="tipocartao3" type="hidden" id="tipocartao3" value="<? echo $tipocartao3; ?>">
                                    </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                                <input name="valorcartao3" type="hidden" id="valorcartao3" value="<? echo $valorcartao3; ?>">
                                <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input type="hidden" name="custo_com_cartao3" id="custo_com_cartao3" value="<? echo $custo_com_cartao3; ?>">
                                  </font></strong></font></strong></font></strong></font></strong></font></strong> <span class="style31"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                    <input name="cartao4" type="hidden" id="cartao4" value="<? echo $cartao4; ?>">
                                    <input name="tipocartao4" type="hidden" id="tipocartao4" value="<? echo $tipocartao4; ?>">
                                    </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                                <input name="valorcartao4" type="hidden" id="valorcartao4" value="<? echo $valorcartao4; ?>">
                                <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                                  <input type="hidden" name="custo_com_cartao4" id="custo_com_cartao4" value="<? echo $custo_com_cartao4; ?>">
                                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                                  </font></strong></font></strong></font></strong></font></strong></font></strong>
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
                                <?
						  if($modopagto=="CARTEIRA"){
							echo"Cliente:<br><select class='class02' name='nomeclienteindicado' id='nomeclienteindicado'>
							  <option></option>";
    $sql = "select * from clientes where estabelecimento = '$estab_pertence' and status_cliente = 'Ativo' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
   }
      echo"</select>";
							  
						  }
						  else{
							  
						  echo "<input name='nomeclienteindicado' type='hidden' id='nomeclienteindicado' value=''>";
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
	
echo "<input class='class01' type=image src='../../imagens_botoes/registradora.png' width='50' height='50' name='Submit32' value='Finalizar'>";

	
}

						  ?>
                              </div></td>
                            </tr>
                          </form>
                        </table>
					</th>
                    <th colspan="3" scope="col">&nbsp;</th>
                  </tr>
                  <tr>
                    <th width="16%" bgcolor="#1216CD" scope="col"><form name="form3" method="post" action="fila_contas_fechadas_para_recebimento.php#cancelamento_de_cupom">
                      <strong>
                      <? if($rapido=="sim"){ echo "<input name='rapido' type='hidden' id='rapido' value='sim'>"; } ?>
                      </strong>
                      <input name="cancelandocupom" type="hidden" id="cancelandocupom" value="temcerteza">
                      <input name="numfaturacancelarcupom" type="hidden" id="numfaturacancelarcupom" value="<? echo "$num_fatura_encontrada"; ?>">
                      <input name="codigoorcamentocancelarcupom" type="hidden" id="codigoorcamentocancelarcupom" value="<? echo "$codigo_orcamento"; ?>">
                      <input name="area_a_focar_campo2" type="hidden" id="area_a_focar_campo2" value="cancelamento_de_cupom">
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

}



?>
                      <input class='class01' type=image src="../../imagens_botoes/excluir.png" width="50" height="50" name="submit2" id="submit2" value="Cupom">
                      <br>
                      Excluir Cupom
                    </form></th>
                    <th width="13%" bgcolor="#1216CD" scope="col"><form name="retirador_de_item" method="post" action="fila_contas_fechadas_para_recebimento.php#prepara_retirar_item">
                      <strong>
                      <? if($rapido=="sim"){ echo "<input name='rapido' type='hidden' id='rapido' value='sim'>"; } ?>
                      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                      </strong>
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      <input class='class01' type=image src="../../imagens_botoes/retira_item.png" width="50" height="50" name="submit" id="submit" value="Cupom">
                      <br>
                      Retira Item
                    </form></th>
                    <th width="13%" bgcolor="#1216CD" scope="col"><form name="modo_do_pagamento" method="post" action="fila_contas_fechadas_para_recebimento.php#modo_receber">
                      <strong>
                      <? if($rapido=="sim"){ echo "<input name='rapido' type='hidden' id='rapido' value='sim'>"; } ?>
                      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                      </strong>
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      <input class='class01' type=image src="../../imagens_botoes/receber.png" width="50" height="50" name="submit3" id="submit3" value="Cupom">
                      <br>
                      Receber
                    </form></th>
                    <th width="16%" bgcolor="#1216CD" scope="col"> <form name="modo_do_pagamento" method="post" action="fila_contas_fechadas_para_recebimento.php#fornecedores">
                      <strong>
                      <? if($rapido=="sim"){ echo "<input name='rapido' type='hidden' id='rapido' value='sim'>"; } ?>
                      </strong>
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      <input class='class01' type=image src="../../imagens_botoes/fornecedores.png" width="50" height="50" name="submit3" id="submit3" value="Cupom">
                      <br>
                      Fornecedores
                    </form>
                    </th>
                    <th width="14%" bgcolor="#1216CD" scope="col"><form name="modo_do_pagamento" method="post" action="fila_contas_fechadas_para_recebimento.php">
                      <strong>
                      <input name="rapido" type="hidden" id="rapido" value="sim">
                      <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario; ?>">
                      </strong>
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
						<?
                     echo "<input class='class01' type=image src='../../imagens_botoes/flash.png' width='50' height='50' name='submit5' id='submit5' value='rapido'>"; 
						  ?>
                      <br>
                      Rapido
                    </form></th>
                    <th width="14%" bgcolor="#1216CD" scope="col"><form name="modo_do_pagamento" method="post" action="fila_contas_fechadas_para_recebimento.php#cadastrorapidoprodutos">
                      <strong>
                        <input name="rapido" type="hidden" id="rapido" value="sim">
                        <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario; ?>">
                        </strong>
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      <?
                     echo "<input class='class01' type=image src='../../imagens_botoes/adicionarprodutorapido.png' width='50' height='50' name='submit5' id='submit5' value='rapido'>";
						  ?>
                      <br>
                      Cadastro Rapido
                    </form></th>
                    <th width="14%" bgcolor="#1216CD" scope="col">
					<?
					if($nome_operador=="Ivan - Sistemas"){ ?>
					<form name="modo_do_pagamento" method="post" action="fila_contas_fechadas_para_recebimento.php#modo_receber2">
                      <strong>
                        <? if($rapido=="sim"){ echo "<input name='rapido' type='hidden' id='rapido' value='sim'>"; } ?>
                        <input name="novosistemadepagto" type="hidden" id="novosistemadepagto" value="definirmodopagto">
                        <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                        </strong>
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      <input class='class01' type=image src="../../imagens_botoes/receber.png" width="50" height="50" name="submit5" id="submit5" value="Cupom">
                      <br>
                      Receber
                    </form>
					<? } ?>
					</th>
                  </tr>
                  <tr>
                    <td align="center" valign="middle"><div id="cancelamento_de_cupom" class="modal" role="dialog"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
                      <form name="cancel" method="post" action="fila_contas_fechadas_para_recebimento.php">
                        <? 

$sql = "SELECT * FROM orcamentos where num_fatura = '$num_fatura' and status = 'Aberto'  and status_fatura = 'FATURADO' order by codigo_orcamento asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$codigo_orcamento_a_receber = $linha[0];

$modo_do_pagto = $linha[10];

$valor_da_entrada = $linha[35];
	
$numfaturacancelarcupom = $linha[18];
	
	

}



?>
                        <input name="confirmacancelamentocupom" type="hidden" id="confirmacancelamentocupom" value="sim">
                        <input name="numfaturacancelarcupom" type="hidden" id="numfaturacancelarcupom" value="<? echo "$numfaturacancelarcupom"; ?>">
                        <input name='dateautorizacao' type='hidden' id='dateautorizacao' value='$dateretiradapedido'>
                        <input name='horaautorizacao' type='hidden' id='horaautorizacao' value='$horaretiradapedido'>
                        <? if($cancelandocupom=="temcerteza"){ echo "ATEN&Ccedil;&Atilde;O!!!... <br><br> Cancelamento de Cupom... <br><br> Solicite Autoriza&ccedil;&atilde;o! <br> <input type='password' name='cod_gerente' id='cod_gerente' placeholder='C&oacute;digo Gerencial'>"; } ?>
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
                echo "<br><input class='class01' type=image src='../../imagens_botoes/ok.png' width='50' height='50' name='submit2' id='submit2' value='Autorizar'>";
				  }
					?>
                      </form>
                    </div></td>
                    <td align="center"><div id="efetiva_retirada_item" class="modal" role="dialog"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a> ATEN&Ccedil;&Atilde;O!!!...<br>
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

$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeprodutoaretirar = $linha[18];

}
		
				
$comando = "insert into pedido_de_retirada_produto_da_fatura(num_fatura,datepedido,dia,mes,ano,horapedido,codigoorcamento,codigoproduto,nomeproduto,operador,departamento,statusautorizacao,loja)

values('$num_fatura','$datepedido','$dia_fatura','$mes_fatura','$ano_fatura','$horapedido','$codigo_orcamento_ret','$cod_prod_ret','$nomeprodutoaretirar','$operador','$ultimo_departamento_trabalhado','Aguardando Autorizacao','$nfantasia_empresa')";
 
mysql_query($comando,$conexao);

$sql = "select * from pedido_de_retirada_produto_da_fatura where num_fatura = '$num_fatura' and codigoorcamento = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret' and statusautorizacao = 'Aguardando Autorizacao' and datepedido = '$datepedido' and horapedido = '$horapedido' order by datepedido desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_de_retirada = $linha[0];

}


echo "<form name='cancel_item' method='post' action='fila_contas_fechadas_para_recebimento.php'>
                <div align='center'>
                  Codigo de Autoriza&ccedil;&atilde;o<br><input type='password' name='cod_gerente' id='cod_gerente' placeholder='C&oacute;digo Gerencial'>
				  <input type='hidden' name='codigo_orcamento_ret' id='codigo_orcamento_ret' value='$codigo_orcamento_ret'>
                  <input type='hidden' name='cod_prod_ret' id='cod_prod_ret' value='$cod_prod_ret'>
				  <input name='nome' type='hidden' id='nome' value='$nome'>
				  <input name='codigo_de_retirada' type='hidden' id='codigo_de_retirada' value='$codigo_de_retirada'>
				  <input name='dateautorizacao' type='hidden' id='dateautorizacao' value='$dateretiradapedido'>
                  <input name='horaautorizacao' type='hidden' id='horaautorizacao' value='$horaretiradapedido'><br>
<input class='class01' type=image src='../../imagens_botoes/ok.png' width='50' height='50' name='button2' id='button2' value='Autorizar'>
                </div>";
	?>
                      <? if($area_a_focar_campo=="cancelamento_de_item"){ ?>
                      <script language='JavaScript' type='text/javascript'>
document.cancel_item.cod_gerente.focus()
              </script>
                      <? } ?>
                      <?
              echo "</form>";
	
}
?>
                    </div></td>
                    <td><div id="finaliza_recebimento_cartao" class="modal2" role="dialog"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a> </div></td>
                    <td ><div id="fornecedores" class="modal" role="dialog"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a> <br>
                      <br>
                      <br>
                      <table width="100%" border="0">
                        <form name="form7" method="post" action="fila_contas_fechadas_para_recebimento.php#fornecedores">
                          <tr>
                            <td colspan="3" class='style61' ><div align="center"><strong>Pagtos a Fornecedores</strong></div></td>
                          </tr>
                          <tr>
                            <td width="346%" colspan="3"><div align="center">
                              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                              <input name="solicitacao" type="hidden" id="solicitacao" value="pagarfornecedor">
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
                            <td colspan="3" class='style61'><div align="center"><strong>Valor<br>
                              <input class='class02' name="valor_fornecedor" type="text" id="valor_fornecedor" size="10">
                              <br>
                              Historico<br>
                              <textarea class='class02' name="historico_fornecedor" cols="20" rows="3" id="historico_fornecedor"></textarea>
                              <br>
                              <input class='class01' type=image src="../../imagens_botoes/ok.png" width="50" height="50" name="submit4" id="submit4" value="Cupom">
                              <br>
                              </strong>
                              <?
								if($solicitacao=="pagarfornecedor"){
		
		$nfantasia_fornecedor = $_POST['nfantasia_fornecedor'];
		$valor_fornecedor = $_POST['valor_fornecedor'];
		$historico_fornecedor = $_POST['historico_fornecedor'];
		
		
	$datepagtofornecedor = date('Y-m-d');
		$diapagtofornecedor = date('d');
		$mespagtofornecedor = date('m');
		$anopagtofornecedor = date('Y');
	$horapagtofornecedor = date('H:i:s');
		
	$comando = "insert into cx_saidas(operador,dia,mes,ano,datecadastro,horacadastro,fornecedor,categoria_conta,historico,valor,nfantasia,departamento) 

values('$nome_operador','$dia','$mes','$ano','$datepagtofornecedor','$horapagtofornecedor','$nfantasia_fornecedor','PAGTOS A FORNECEDORES','$historico_fornecedor','$valor_fornecedor','$ultimo_departamento_trabalhado','$ultimo_departamento_trabalhado')";

mysql_query($comando,$conexao);
		
		
		echo "Pagto ao fornecedor $nfantasia_fornecedor no valor de R$ $valor_fornecedor <br> registrado com sucesso!!!... $ultimo_departamento_trabalhado";
	}
								?>
                            </div></td>
                          </tr>
                        </form>
                      </table>
                    </div></td>
                    <td><div align="center" id="cadastrorapidoprodutos" class="modal" role="dialog"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a> ATEN&Ccedil;&Atilde;O!!!...<br>
                      <br>
                      Cadastro R&aacute;pido de<br>
  <br>
                      Produtos<br>
  <br>
  <? 
 
		
				
echo "<form name='cadastraprod' method='post' action='fila_contas_fechadas_para_recebimento.php'>
                <div align='center'>
                  
				  Nome Produto <br><input type='text' name='nome_produto' id='nome_produto'><br>
                  Preco <br><input type='text' name='preco' id='preco'><br>
				  <input name='categoria' type='hidden' id='categoria' value='VENDA DE PRODUTOS'>
				  <input name='cadastrorapidodeproduto' type='hidden' id='cadastrorapidodeproduto' value='cadastrarproduto'>
				  <input name='classe' type='hidden' id='classe' value='O'>
				  <input name='departamentoproduto' type='hidden' id='departamentoproduto' value='Todos'>
				  <input name='nome'type='hidden' id='nome' value='$comandadofuncionario'>
				  Sub Categoria <br><select name='sub_categoria' id='sub_categoria'>
		
        <option selected>Selecione</option>";
        


    $sql = "select * from sub_categorias order by subcategoria";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['subcategoria']."</option>";
    }
?><?
      echo "</select>
	  <br>
	  Codigo de barras<br><input type='text' name='cod_barras' id='cod_barras'><br>
				  
<input class='class01' type=image src='../../imagens_botoes/ok.png' width='50' height='50' name='button2' id='button2' value='Salvar'>
                </div>";
	?>
  
  <script language='JavaScript' type='text/javascript'>
document.cadastraprod.nome_produto.focus()
              </script>
  
  <?
echo "</form>";
?>
                    </div></td>
                    <td colspan="2">&nbsp;</td>
                  </tr>
                </tbody>
              </table>
            </div>              <div align="center"></div>              <div align="center"></div>              <div align="center"></div>              <div align="center"></div></td>
          </tr>
        </table>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<p>&nbsp;</p>
  
   
   
      
<p align="center">&nbsp;</p>

</body>

</html>

