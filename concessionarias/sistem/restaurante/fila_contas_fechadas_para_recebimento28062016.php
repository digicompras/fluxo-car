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

<title>LISTANDO TODOS OS PEDIDOS DE POSSIBILIDADES DO PERIODO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style3 {font-size: 10px}
.style2 {
	color: #0000FF;

	font-weight: bold;
}
.style5 {font-size: 18px}
.style5 {font-size: 24px}
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
.style6 {font-size: 18px; font-weight: bold; }

-->

</style>
</head>

<?



require '../../conect/conect.php';

?>

<?

$mes_aliquota = date('m');
$ano_aliquota = date('Y');

$codigo_cliente = $_POST['codigo_cliente'];
$solicitacao = $_POST['solicitacao'];
$nome = $_POST['nome'];
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

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

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

if(empty($codigo_cliente)){
	
$sql = "SELECT * FROM clientes where nome = '$nome'";

}
else{
	
$sql = "SELECT * FROM clientes where codigo = '$codigo_cliente'";
	
}
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo_cliente= $linha[0];

$nome = $linha[1];

}



if(empty($codigo_cliente)){

$sql = "SELECT * FROM orcamentos where nome = '$nome' and status = 'Aberto' order by codigo_orcamento desc limit 1";

}
else{
	
$sql = "SELECT * FROM orcamentos where codigo_cliente = '$codigo_cliente' and status = 'Aberto' order by codigo_orcamento desc limit 1";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$codigo_orcamento_add_produto = $linha[0];

}







$item = $_POST['item'];
$cod_barras = $_POST['cod_barras'];

$quant = $_POST['quant'];

if(empty($quant)){

$quantidade = "1";

}
else{

$quantidade = $quant;

}


if(empty($item)){

$sql = "SELECT * FROM produtos where cod_barras = '$cod_barras' limit 1";

}
else{
	
$sql = "SELECT * FROM produtos where nome_produto = '$item' limit 1";

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


if(empty($cod_barras)) {
	
if(empty($item)){
	
}
else{
	
$comando = "insert into produtos_em_orcamento(codigo_orcamento,loja,codigo_cliente,nome,endereco,numero,bairro,cidade,estado,telefone,celular,email,cep,cpf,rg,dataorcamento,horaorcamento,codigoproduto,nomeproduto,categoria,precocompra,quant,preco0,preco1,preco2,preco3,acrescimo,acrescimodecimal,acrescimomonetario,total,operador,descontoetapa0,baseparaproximodesconto0,condicao,status,status_fatura,total_impostos,total_fornecedor,preco_normal,oferta,preco_oferta,margem_lucro,margem_lucro_informado,impostos,impostos_informado,margem_folga,margem_folga_decimal,impostos_compra,impostos_compra_decimal,total_impostos_compra,total_impostos_venda,setor,departamento)

values('$codigo_orcamento_add_produto','$loja','$codigo_cliente','$nome','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf_cliente','$rg','$dataorcamento','$horaorcamento','$codigoproduto','$nomeproduto','$categoria','$preco_compra','$quantidade','$preco','0','0','0','0','0','0','$total','$operador','0','$total','$condicao','$status','$status_fatura','$total_impostos','$total_fornecedor','$preco_normal','$oferta','$preco_oferta','$margem_lucro','$margem_lucro_informada','$impostos','$impostos_informado','$margem_folga','$margem_folga_decimal','$impostos_compra','$impostos_compra_decimal','$total_impostos_compra','$total_impostos_venda','$setor','$departamento_a_gravar')";
 
mysql_query($comando,$conexao);



if($categoria=="REFEICOES RESTAURANTE"){
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$comando = "update `$linha[1]`.`orcamentos` set `categoria` = '$categoria' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);
		
}



}
	
}
else{

$comando = "insert into produtos_em_orcamento(codigo_orcamento,loja,codigo_cliente,nome,endereco,numero,bairro,cidade,estado,telefone,celular,email,cep,cpf,rg,dataorcamento,horaorcamento,codigoproduto,nomeproduto,categoria,precocompra,quant,preco0,preco1,preco2,preco3,acrescimo,acrescimodecimal,acrescimomonetario,total,operador,descontoetapa0,baseparaproximodesconto0,condicao,status,status_fatura,total_impostos,total_fornecedor,preco_normal,oferta,preco_oferta,margem_lucro,margem_lucro_informado,impostos,impostos_informado,margem_folga,margem_folga_decimal,impostos_compra,impostos_compra_decimal,total_impostos_compra,total_impostos_venda,setor,departamento)

values('$codigo_orcamento_add_produto','$loja','$codigo_cliente','$nome','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf_cliente','$rg','$dataorcamento','$horaorcamento','$codigoproduto','$nomeproduto','$categoria','$preco_compra','$quantidade','$preco','0','0','0','0','0','0','$total','$operador','0','$total','$condicao','$status','$status_fatura','$total_impostos','$total_fornecedor','$preco_normal','$oferta','$preco_oferta','$margem_lucro','$margem_lucro_informada','$impostos','$impostos_informado','$margem_folga','$margem_folga_decimal','$impostos_compra','$impostos_compra_decimal','$total_impostos_compra','$total_impostos_venda','$setor','$departamento_a_gravar')";
 
mysql_query($comando,$conexao);



if($categoria=="REFEICOES RESTAURANTE"){
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$comando = "update `$linha[1]`.`orcamentos` set `categoria` = '$categoria' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);
		
}



}

//$custo_cmv_etapa1 = bcadd($diferenca_normal_para_oferta_vezes_quantidade,$calculando_impostos,2);

//$custo_cmv_etapa2 = bcadd($descontosconcedidos,$totalfornecedor,2);

//$totalizacao_cmv = bcadd($custo_cmv_etapa1,$custo_cmv_etapa2,2);






}
?>








<?


		  
$sql = "SELECT * FROM orcamentos where nome = '$nome' and status = 'Aberto' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$codigo_orcamento_a_receber = $linha[0];

$codigo_cliente = $linha[25];

$cpf_do_orcamento = $linha[26];

$cliente_do_orcamento = $linha[27];

}


$sql = "SELECT * FROM faturamento_futuro where operador = '$nome_operador' and status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_fatura = mysql_num_rows($res);
	
	

}


if($registros_fatura>=1){

$sql = "SELECT * FROM faturamento_futuro where operador = '$nome_operador' and status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$num_fatura = $linha[0];
$codigo_orcamento_ja_registrado = $linha[6];
$ultimo_orcamento = $linha[45];

}

//------------ATUALIZANDO ORCAMENTOS NA FATURA--------------------------------
if(empty($codigo_orcamento_add_produto)){
	
$barra = "";
	
}
else{

$barra = " / ";
	
}

$orcamentos_da_fatura = "$codigo_orcamento_ja_registrado"."$barra"."$codigo_orcamento_add_produto";

$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$comando = "update `$linha[1]`.`faturamento_futuro` set `codigo_orcamento` = '$orcamentos_da_fatura',`ultimo_orcamento` = '$ultimo_orcamento' where `faturamento_futuro`. `num_fatura` = '$num_fatura' limit 1 ";
}

mysql_query($comando,$conexao);

$sql3 = "SELECT * FROM faturamento_futuro where operador = '$nome_operador' and status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' order by num_fatura desc limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
	
	
$num_fatura = $linha[0];
$datefaturamento = $linha[1];
$dia_fatura = $linha[2];
$mes_fatura = $linha[3];
$ano_fatura = $linha[4];

$horafaturamento = $linha[5];
$codigo_orcamento_ja_registrado = $linha[6];

$loja = $linha[8];
$operador = $linha[9];

$cliente_nfe = $linha[22];
$cpf_nfe = $linha[23];

$ultimo_orcamento = $linha[45];

}


//------------------------FIM DA ATUALIZACAO DE ORCAMENTOS NA FATURA-------------------------


}
else{
	
$comando = "insert into faturamento_futuro(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,setor,departamento,cliente,cpf,codigo_orcamento,ultimo_orcamento)

values('$data_abertura_fatura','$dia','$mes','$ano','$hora_abertura_fatura','Aberto','$estab_pertence','$nome_operador','$setor','$ultimo_departamento_trabalhado','$cliente_do_orcamento','$cpf_do_orcamento','$codigo_orcamento_add_produto','$codigo_orcamento_add_produto')";
 
mysql_query($comando,$conexao);



	
$sql = "SELECT * FROM faturamento_futuro where operador = '$nome_operador' and status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	
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

}

}





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


$sql5 = "SELECT * FROM faturamento_futuro where operador = '$nome_operador' and status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' order by num_fatura desc limit 1";
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



$comando = "update `$linha[1]`.`orcamentos` set `preparar_caixa_receber` = 'Sim',`condicao` = 'PEDIDO',`status_fatura` = '$status_fatura',`num_fatura` = '$num_fatura',`data_fatura` = '$datefaturamento',`dia_fatura` = '$dia_fatura',`mes_fatura` = '$mes_fatura',`ano_fatura` = '$ano_fatura',`hora_fatura` = '$hora_abertura_fatura',`departamento` = '$ultimo_departamento_trabalhado' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento_a_receber' limit 1 ";
}

mysql_query($comando,$conexao);




$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento_a_receber'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];



$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {



$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preparar_caixa_receber` = 'Sim',`condicao` = 'PEDIDO',`status_fatura` = '$status_fatura',`num_fatura` = '$num_fatura',`data_fatura` = '$datefaturamento',`dia_fatura` = '$dia_fatura',`mes_fatura` = '$mes_fatura',`ano_fatura` = '$ano_fatura',`hora_fatura` = '$hora_abertura_fatura',`departamento` = '$ultimo_departamento_trabalhado' where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento_a_receber' and codigo = '$codigolancamento'";
}

mysql_query($comando,$conexao);

}
?>






<?
 //---------------------SESSAO DE ARREDONDAMENTO E SIMULAÇÃO-----------------------------------

$obs = $_POST['obs'];		

$cartao = $_POST['cartao'];
$modopagto = $_POST['modopagto'];

$arredondamento = $_POST['arredondamento'];



 
$sql = "select sum(total) as total_liquido from produtos_em_orcamento where num_fatura = '$num_fatura' and status_fatura = 'FATURADO'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_liquido_produtos = $linha['total_liquido'];



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
	
$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura'";

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


$sql2 = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura'";
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


$comando = "update `$linha[1]`.`orcamentos` set `quantparc` = '$quantparc',`modopagto` = '$modopagto',`cartao` = '$cartao',`valorparcela` = '$valorparcela',`obs` = '$obs',`departamento` = '$ultimo_departamento_trabalhado' where `orcamentos`. `num_fatura` = '$num_fatura' limit 1 ";
}

mysql_query($comando,$conexao);



$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`faturamento_futuro` set `quantparc` = '$quantparc',`modopagto` = '$modopagto',`cartao` = '$cartao',`valorparcela` = '$valorparcela',`total_geral` = '$total_geral',`obs` = '$obs',`desconto_de_arredondamento` = '$desconto_de_arredondamento',`acrescimo_de_arredondamento` = '$acrescimo_de_arredondamento',`departamento` = '$ultimo_departamento_trabalhado' where `faturamento_futuro`. `num_fatura` = '$num_fatura' limit 1 ";
}

mysql_query($comando,$conexao);



}
                   
                    
 //---------------------FIM DA SESSAO DE ARREDONDAMENTO E SIMULAÇÃO-----------------------------------
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


$sql3 = "select * from pedido_de_retirada_produto_da_fatura where num_fatura = '$num_fatura' and codigoorcamento = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret' and datepedido = '$datepedido' and horapedido = '$horapedido' order by datepedido desc limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


$statusautorizacao = $linha[15];

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



if($categoria=="REFEICOES RESTAURANTE"){
	
$sql5 = "select * from db";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$comando = "update `$linha[1]`.`orcamentos` set `categoria` = '' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento_ret' limit 1 ";
}

mysql_query($comando,$conexao);
		
}

	
	
	
$comando = "delete from `produtos_em_orcamento` where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret' limit 1 ";

mysql_query($comando,$conexao);





$sql6 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento_ret'";
$res6 = mysql_query($sql6);
while($linha=mysql_fetch_row($res6)) {

$categoria = $linha[19];


if($categoria=="REFEICOES RESTAURANTE"){
	
$sql7 = "select * from db";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {

$comando = "update `$linha[1]`.`orcamentos` set `categoria` = '$categoria' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento_ret'";
}

mysql_query($comando,$conexao);
		
}

}


}

}

}
else{
?>
<script>

alert("ATENÇÃO!!!... Código incorreto, procure seu Gerente!\n");


</script>
<?	
}
}
?>






<p>



</p>

      <form action="../index.php" method="post" name="form1" target="_top">
        <input type="submit" name="Submit" value="Voltar ao menu principal">
        <span class="style1">
        </span>
      </form>
      <table width="100%" border="0" align="left">
<tr>
      <td><div align="center">
        <table width="100%" border="0" align="left">
          <tr>
            <td width="13%" rowspan="2"><div align="center">Comanda</div>              <div align="center"></div></td>
            <td colspan="2"><div align="center">
              <form name="comandas" method="post" action="fila_contas_fechadas_para_recebimento.php">
                <div align="left">
                  <input type="text" name="nome" id="nome">
                  <input name="condicao" type="hidden" id="condicao" value="PEDIDO">
                  <input type="submit" name="button3" id="button3" value="Buscar">
                </div>
                <script language='JavaScript' type='text/javascript'>
document.comandas.nome.focus()
              </script>
              </form>
            </div>              </td>
            <td><div align="center">
              <form name="form3" method="post" action="fila_contas_fechadas_para_recebimento.php">
                <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                <input name="solicitacao" type="hidden" id="solicitacao" value="notapaulista">
                <? if($registros_fatura>=1){
echo "<input type='submit' name='button3' id='button3' value='Nota Paulista?'>";

}

?>
              </form>
            </div></td>
            <td width="22%"><div align="center">Loja: <span class="style2"><? echo $loja; ?></span></div></td>
            <td width="17%"><div align="center" class="style5"><strong>Frente de Caixa</strong></div></td>
          </tr>
          <tr>
            <td colspan="2"><form name="comandas" method="post" action="fila_contas_fechadas_para_recebimento.php">
              <div align="left">
                <strong>
                  <select name="nome" size="1" id="nome">
                    <option selected><? echo $nome; ?></option>
                    <?
$naolistar = "between '5000' and '5400'";


    $sql = "select * from orcamentos where condicao = 'ORCAMENTO' and status = 'Aberto' and num_fatura = '' and status_fatura = '' and nome <> $naolistar group by nome order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
    }
?>
                  </select>
                  </strong>
                <input name="condicao" type="hidden" id="condicao" value="PEDIDO">
                <input type="submit" name="button2" id="button2" value="Buscar">
                </div>
              
            </form></td>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3"><div align="center">
              <form name="itens" method="post" action="fila_contas_fechadas_para_recebimento.php">
                <div align="center"><strong>Adicionar produto:
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                  <input name="ultimo_orcamento" type="hidden" id="ultimo_orcamento" value="<? echo $ultimo_orcamento; ?>">
                  Quantidade
                  <input name="quant" type="text" id="quant" size="3">
                  Codigo
                  <input name="cod_barras" type="text" id="cod_barras">
                  <select name="item" id="select7">
                    <option selected></option>
                    <?


    $sql = "select * from produtos order by nome_produto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome_produto']."</option>";
    }
?>
                  </select>
                  </strong>
                  <input type="submit" name="Submit2" value="Adicionar">
                </div>
              </form>
            </div></td>
            <td width="15%"><div align="center">
              <form name="form5" method="post" action="fila_contas_fechadas_para_recebimento.php">
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
              </form>
            </div></td>
            <td colspan="2"><div align="center">
              <form name="form2" method="post" action="fila_contas_fechadas_para_recebimento.php">
                
                <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                <input name="retirada_de_produto" type="hidden" id="retirada_de_produto" value="retirar_produto">
Pedido
<input name="codigo_orcamento_ret" type="text" id="codigo_orcamento_ret" size="3">
                Cod Produto
                <input name="cod_prod_ret" type="text" id="cod_prod_ret" size="3">
                
                <input type="submit" name="Submit3" value="Retirar ">
                </form>
            </div></td>
          </tr>
          <tr>
            <td><div align="center">N&ordm; Cupon(Fatura)</div></td>
            <td colspan="2"><div align="center"></div>              <div align="center"></div></td>
            <td><div align="center"></div></td>
            <td colspan="2"><div align="center"><? if($retirada_de_produto=="retirar_produto"){
$datepedido = date('Y-m-d');
$horapedido = date('H:i:s');
$dateretiradapedido = date('Y-m-d');
$horaretiradapedido = date('H:i:s');

$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeprodutoaretirar = $linha[18];

}
		
				
$comando = "insert into pedido_de_retirada_produto_da_fatura(num_fatura,datepedido,dia,mes,ano,horapedido,codigoorcamento,codigoproduto,nomeproduto,operador,departamento,statusautorizacao)

values('$num_fatura','$datepedido','$dia_fatura','$mes_fatura','$ano_fatura','$horapedido','$codigo_orcamento_ret','$cod_prod_ret','$nomeprodutoaretirar','$operador','$ultimo_departamento_trabalhado','Aguardando Autorizacao')";
 
mysql_query($comando,$conexao);

$sql = "select * from pedido_de_retirada_produto_da_fatura where num_fatura = '$num_fatura' and codigoorcamento = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret' and statusautorizacao = 'Aguardando Autorizacao' and datepedido = '$datepedido' and horapedido = '$horapedido' order by datepedido desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_de_retirada = $linha[0];

}


echo "<form name='form3' method='post' action='fila_contas_fechadas_para_recebimento_teste.php'>
                <div align='left'>
                  Codigo de Autorização<input type='password' name='cod_gerente' id='cod_gerente'>
				  <input type='hidden' name='codigo_orcamento_ret' id='codigo_orcamento_ret' value='$codigo_orcamento_ret'>
                  <input type='hidden' name='cod_prod_ret' id='cod_prod_ret' value='$cod_prod_ret'>
				  <input name='nome' type='hidden' id='nome' value='$nome'>
				  <input name='codigo_de_retirada' type='hidden' id='codigo_de_retirada' value='$codigo_de_retirada'>
				  <input name='dateautorizacao' type='hidden' id='dateautorizacao' value='$dateretiradapedido'>
                  <input name='horaautorizacao' type='hidden' id='horaautorizacao' value='$horaretiradapedido'>
<input type='submit' name='button2' id='button2' value='Autorizar'>
                </div>
              </form>";
	
}
?>
</div>              <div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"><? echo $num_fatura; ?></div></td>
            <td colspan="2"><div align="center">
              <? 

$sql = "SELECT * FROM orcamentos where num_fatura = '$num_fatura' and status = 'Aberto'  and status_fatura = 'FATURADO' order by codigo_orcamento asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$codigo_orcamento_a_receber = $linha[0];

$modo_do_pagto = $linha[10];

$valor_da_entrada = $linha[35];

}



?>
            </div>              <div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td colspan="3" rowspan="3" valign="top">
            <div align="center">
              <table width="100%" border="0" cellspacing="0">
                <tr>
                  <td colspan="6"><div align="center"><br><? echo $razaosocial_empresa; ?> <br>
                      <? echo $endereco_empresa; ?> , <? echo $numero_empresa; ?> - <? echo $bairro_empresa; ?> <br>
                      <? echo $cep_empresa; ?> -<? echo $cidade_empresa; ?> - <? echo $estado_empresa; ?><br>
                      <? echo "CNPJ $cnpj_empresa"; ?> / <? echo "Inscr. Est. $inscr_est_empresa"; ?><br> <? echo "Cliente: $cliente_nfe"; ?><br><? echo "CPF: $cpf_nfe"; ?> <br><br>
                  </div></td>
                  </tr>
                <tr>
                  <td width="12%"><div align="left"><strong>Pedido</strong></div></td>
                  <td width="9%"><div align="left"><strong>Cod</strong></div></td>
                  <td width="35%"><div align="left"><strong>Prod</strong></div></td>
                  <td width="10%"><div align="left"><strong>Quant</strong></div></td>
                  <td width="16%"><div align="left"><strong>Preco Unit</strong></div></td>
                  <td width="18%"><div align="left"><strong>Total</strong></div></td>
                </tr>
<?
            
$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura' and departamento = '$ultimo_departamento_trabalhado' and status_fatura = 'FATURADO'";

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
            </td>
            <td><div align="center"></div></td>
            <td colspan="2"><div align="center">Total da Compra
<?

echo "R$ $total_geral";




?>
                <? 



$sql = "SELECT * FROM tabela_cartoes where modopagto = '$modopagto' and status = 'Ativo' and mes = '$mes_aliquota' and ano = '$ano_aliquota' and '$quantparc' >= prazo_inicial and '$quantparc' <= prazo_final order by modopagto asc limit 1";
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
            </div>
<div align="left"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="right"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td colspan="3"><div align="center">
              <table width="100%"  border="0">
                <tr>
                  <td><form name="form4" method="post" action="fila_contas_fechadas_para_recebimento.php">
                    <div align="center">
                      <p><strong>
                        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                        <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                      </strong>
                        <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                        <input name="solicitacao" type="hidden" id="solicitacao">
Arredondar 
                        <input name="arredondamento" type="text" id="arredondamento" value="<? echo $total_geral; ?>" size="8">
                        Modo de pagto: <strong>
                        <select name="modopagto" id="modopagto">
                          <option selected><? if(empty($modopagto)){ echo $modo_do_pagto; }else{ echo $modopagto; } ?></option>
                          <?


    $sql = "select * from modo_pagto order by modopagto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['modopagto']."</option>";
    }
?>
                        </select></strong>
                        
Entrada: <input name="entrada" type="text" id="entrada" value="<?  if(empty($entrada)){ echo $valor_da_entrada; } else{ echo $entrada; } ?>" size="6"> 

                        em <strong>
                            <select name="quantparc" id="quantparc">
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
                        Obs:
                        <input name="obs" type="text" id="obs" value="<? echo $obs; ?>" size="50">
                        <strong>
                        <input type="submit" name="button" id="button" value="Atualizar Calculos">
                        </strong><br>
                      
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


                      echo "<table width='100%' border='1' cellspacing='0'>
                        <tr>
                          <td><div align='center'>Cart&atilde;o</div></td>
                          <td><div align='center'>Tipo Cart&atilde;o</div></td>
                          <td><div align='center'>Valor</div></td>
                          <td><div align='center'>Aliquota %</div></td>
                          <td><div align='center'>Custo C/ Cartao</div></td>
                          
                        </tr>
                        <tr>
                          <td><div align='center'><select name='cartao' id='cartao'>
    <option selected> $cartao </option>";
    


    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select>
  
</div></td>

<td><div align='center'><select name='tipocartao' id='tipocartao'>
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

<td><div align='center'><input name='valorcartao' type='text' id='valorcartao' value='$valorcartao' size='5'>
  
</div></td>

<td><div align='center'>";

$sql = "SELECT * FROM tabela_cartoes where modopagto = '$tipocartao' and status = 'Ativo' and mes = '$mes_aliquota' and ano = '$ano_aliquota' and '$quantparc' >= prazo_inicial and '$quantparc' <= prazo_final order by modopagto asc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
		
$aliquota_cartao1 = $linha[9];
}

$aliquota_decimal_cartao1 = bcdiv($aliquota_cartao1,100,4);

$custo_com_cartao1 = bcmul($valorcartao,$aliquota_decimal_cartao1,2);

echo "$aliquota_cartao1%</div></td>
                          
						  
						  <td><div align='center'>R$ $custo_com_cartao1</div></td>
						  
						  
                         
                        </tr>
						
						
						
						
                        <tr>
<td><div align='center'><select name='cartao2' id='cartao2'>
    <option selected> $cartao2 </option>";
    


    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  
  

</div></td>


<td><div align='center'><select name='tipocartao2' id='tipocartao2'>
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

<td><div align='center'><input name='valorcartao2' type='text' id='valorcartao2' value='$valorcartao2' size='5'>
  
  
</div></td>
                          
<td><div align='center'>";

$sql = "SELECT * FROM tabela_cartoes where modopagto = '$tipocartao2' and status = 'Ativo' and mes = '$mes_aliquota' and ano = '$ano_aliquota' and '$quantparc' >= prazo_inicial and '$quantparc' <= prazo_final order by modopagto asc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
		
$aliquota_cartao2 = $linha[9];
}

$aliquota_decimal_cartao2 = bcdiv($aliquota_cartao2,100,4);

$custo_com_cartao2 = bcmul($valorcartao2,$aliquota_decimal_cartao2,2);

echo "$aliquota_cartao2%</div></td>
                          <td><div align='center'>R$ $custo_com_cartao2</div></td>
                          
                        </tr>
						
						
						
						
                        <tr>
						
						
<td><div align='center'><select name='cartao3' id='cartao3'>
    <option selected> $cartao3 </option>";
    


    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  

</div></td>
                          
<td><div align='center'><select name='tipocartao3' id='tipocartao3'>
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
                          
						  
<td><div align='center'><input name='valorcartao3' type='text' id='valorcartao3' value='$valorcartao3' size='5'>
  
  
</div></td>
                          
<td><div align='center'>";

$sql = "SELECT * FROM tabela_cartoes where modopagto = '$tipocartao3' and status = 'Ativo' and mes = '$mes_aliquota' and ano = '$ano_aliquota' and '$quantparc' >= prazo_inicial and '$quantparc' <= prazo_final order by modopagto asc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
		
$aliquota_cartao3 = $linha[9];
}

$aliquota_decimal_cartao3 = bcdiv($aliquota_cartao3,100,4);

$custo_com_cartao3 = bcmul($valorcartao3,$aliquota_decimal_cartao3,2);

echo "$aliquota_cartao3%</div></td>
                          <td><div align='center'>R$ $custo_com_cartao3</div></td>
                          
                        </tr>
						
						
						
						
                        <tr>
						
				
<td><div align='center'><select name='cartao4' id='cartao4'>
    <option selected> $cartao4 </option>";
    


    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> 
  
  
</div></td>
                          
<td><div align='center'><select name='tipocartao4' id='tipocartao4'>
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
                          
<td><div align='center'><input name='valorcartao4' type='text' id='valorcartao4' value='$valorcartao4' size='5'>
  
  
</div></td>
                          
<td><div align='center'>";

$sql = "SELECT * FROM tabela_cartoes where modopagto = '$tipocartao4' and status = 'Ativo' and mes = '$mes_aliquota' and ano = '$ano_aliquota' and '$quantparc' >= prazo_inicial and '$quantparc' <= prazo_final order by modopagto asc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
		
$aliquota_cartao4 = $linha[9];
}

$aliquota_decimal_cartao4 = bcdiv($aliquota_cartao4,100,4);

$custo_com_cartao4 = bcmul($valorcartao4,$aliquota_decimal_cartao4,2);

echo "$aliquota_cartao4%</div></td>
                          <td><div align='center'>R$ $custo_com_cartao4</div></td>
                          
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
                      
                      <br>Valor Recebido
                        <input name="valor_recebido" type="text" id="valor_recebido" value="<? if($totalrecebido=="0.00"){ echo $total_geral; }else{ echo $totalrecebido; } ?>" size="5">
                        <? if($totalrecebido<$total_geral){echo "Saldo a Receber R$ $saldoareceber "; } ?>
                        <? $troco = bcsub($totalrecebido,$total_geral,2); if($totalrecebido>$total_geral){ echo " Troco R$ $troco"; } ?>
                      
                    </div>
                  </form></td>
                </tr>
                <tr>
                  <td><div align="center"></div></td>
                </tr>
                <tr>
                  <td><div align="center">
                    <form name="form7" method="post" action="finalizar_orcamento_frente_de_caixa.php">
                      <span class="style3"> </span>
                      <table width="100%" border="0">

                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="33%"><div align="center"></div></td>
                          <td width="49%"><div align="center"></div></td>
                          <td width="18%"><div align="center"></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><div align="center">
                            <? if(empty($modopagto)){ } else{ echo "Condi&ccedil;&otilde;es de pagto escolhida foi em  $quantparc vez(es) modo de pagto $modopagto"; } ?>
                            <? 

  if(($modopagto == "CARTAO DE CREDITO") or ($modopagto == "CARTAO DE DEBITO")) {

echo "- $cartao";

}

?>
                          </div></td>
                          <td><div align="center"></div></td>
                        </tr>
                        <tr>
                          <td colspan="2"><div align="center">
                            <?  


echo "Entrada de R$ $entrada + $quantparc X R$ $valorparcela"; 




   ?>
                          </div></td>
                          <td><div align="center"></div></td>
                        </tr>
                        <tr>
                          <td colspan="3"><div align="center"><span class="style3">
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
                            <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                            </span>
                              <input name="horafechamento" type="hidden" id="horafechamento" value="<? echo date('H:i:s'); ?>">
                            <span class="style3"><strong><font color="#0000FF">
                              <input name="quantparc" type="hidden" id="quantparc" value="<? if(empty($quantparc)){ echo "1"; } else{ echo $quantparc; } ?>">
                              <strong><font color="#0000FF">
                                <input name="operador_alterou" type="hidden" id="operador_alterou" value="<? echo $operador; ?>">
                                <input name="loja" type="hidden" id="loja" value="<? echo $loja; ?>">
                                </font></strong></font></strong></span>
                            <input name="valor_entrada" type="hidden" id="valor_entrada" value="<? echo $entrada; ?>">
                            <span class="style3"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                            <input name="modopagto" type="hidden" id="modopagto" value="<? echo $modopagto;  ?>">
                            <strong><font color="#0000FF"><strong><font color="#0000FF">
                            <input name="cartao" type="hidden" id="cartao" value="<? echo $cartao; ?>">
                            <input name="tipocartao" type="hidden" id="tipocartao" value="<? echo $tipocartao; ?>">
                            </font></strong></font></strong>                            </font></strong></font></strong></font></strong></span>
                            <input name="valorcartao" type="hidden" id="valorcartao" value="<? echo $valorcartao; ?>">
                            <span class="style3"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                            <input type="hidden" name="custo_com_cartao1" id="custo_com_cartao1" value="<? echo $custo_com_cartao1; ?>">
                            <input name="cartao2" type="hidden" id="cartao2" value="<? echo $cartao2; ?>">
                            <input name="tipocartao2" type="hidden" id="tipocartao2" value="<? echo $tipocartao2; ?>">
                            </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                            <input name="valorcartao2" type="hidden" id="valorcartao2" value="<? echo $valorcartao2; ?>">
                            <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                            <input type="hidden" name="custo_com_cartao2" id="custo_com_cartao2" value="<? echo $custo_com_cartao2; ?>">
                            </font></strong></font></strong></font></strong></font></strong></font></strong>                            <span class="style3"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                            <input name="cartao3" type="hidden" id="cartao3" value="<? echo $cartao3; ?>">
                            <input name="tipocartao3" type="hidden" id="tipocartao3" value="<? echo $tipocartao3; ?>">
                            </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                            <input name="valorcartao3" type="hidden" id="valorcartao3" value="<? echo $valorcartao3; ?>">
                            <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                            <input type="hidden" name="custo_com_cartao3" id="custo_com_cartao3" value="<? echo $custo_com_cartao3; ?>">
                            </font></strong></font></strong></font></strong></font></strong></font></strong>                            <span class="style3"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                            <input name="cartao4" type="hidden" id="cartao4" value="<? echo $cartao4; ?>">
                            <input name="tipocartao4" type="hidden" id="tipocartao4" value="<? echo $tipocartao4; ?>">
                            </font></strong></font></strong></font></strong></font></strong></font></strong></span>
                            <input name="valorcartao4" type="hidden" id="valorcartao4" value="<? echo $valorcartao4; ?>">
                            <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                            <input type="hidden" name="custo_com_cartao4" id="custo_com_cartao4" value="<? echo $custo_com_cartao4; ?>">
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
if(empty($modopagto)){
	
if($ultimo_departamento_trabalhado=="GARCON"){
	
echo "<input type='submit' name='Submit32' value='Finalizar'>";

}
	
}
else{

if(($modopagto == "CARTAO DE DEBITO") or ($modopagto == "CARTAO DE CREDITO")){

if(empty($cartao)){
	
}
else{
	
	
echo "<input type='submit' name='Submit32' value='Finalizar'>";


}

}
else{
	

echo "<input type='submit' name='Submit32' value='Finalizar'>";

	
}
						  
}

						  ?>
                          </div></td>
                        </tr>
                        <tr>
                          <td colspan="3">&nbsp;</td>
                        </tr>
                      </table>
                    </form>
                  </div></td>
                </tr>
                <tr>
                  <td width="238">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table>
            </div>              <div align="center"></div>              <div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td width="8%"><div align="center"></div></td>
            <td width="25%"><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
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

