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
<title>Border&ocirc;s</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
//echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=nome_do_arquivo.php'>";
?>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
}
.style3 {font-size: 10px}
.style6 {font-size: 18px; font-weight: bold; }
-->
</style>
</head>
<?

require '../../conect/conect.php';
?>

<?
	$modo_do_pagto = $_POST['modo_do_pagto'];
	$entrada = $_POST['entrada'];
	$cartao_utilizar = $_POST['cartao_utilizar'];
	$cartao_a_utilizar = $_POST['cartao_utilizar'];
	$quantparc = $_POST['quantparc'];
echo "$quantparc";

$codigo_cliente = $_POST['codigo_cliente'];


$codigo_orcamento_add = $_POST['codigo_orcamento_add'];
$cod_prod_add = $_POST['cod_prod_add'];

$codigo_orcamento_ret = $_POST['codigo_orcamento_ret'];
$cod_prod_ret = $_POST['cod_prod_ret'];





?>

  <?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];
$estab_pertence = $linha[44];

}
?>




<?


$sql = "SELECT * FROM clientes where codigo = '$codigo_cliente'";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo_cli= $linha[0];

$nome = $linha[1];

$sexo = $linha[2];

$estadocivil = $linha[3];

$cpf_cliente = $linha[4];

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
	$regiao = $linha[137];
}

?>

<?


if(empty($cod_prod_ret)){
	
}
else{
$comando = "delete from `produtos_em_orcamento` where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret' limit 1 ";

mysql_query($comando,$conexao);




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `acrescimo_de_arredondamento` = '' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento_ret' limit 1 ";
}

mysql_query($comando,$conexao);


}

$dataabertura = date('Y-m-d');
$horaabertura = date('H:i:s');
$diaabertura = date('d');
$mesabertura = date('m');
$anoabertura = date('Y');


$datafechameno = date('d-m-Y');
$horafechamento = $hora_atual;
$diafechamento = date('d');
$mesfechamento = date('m');
$anofechamento = date('Y');

$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];


$solicitacao = $_POST['solicitacao'];


if($solicitacao=="abrir_orcamento"){

$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and operador = '$nome_operador' and codigo_cliente = '$codigo_cliente' and status = 'Aberto'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

$codigo_orcamento = $linha[0];

}



if($registros==0){
$comando = "insert into orcamentos(condicao,loja,status,operador,dataabertura,horaabertura,diaabertura,mesabertura,anoabertura,codigo_cliente,cpf,nome,status_fatura,cidade,estado,regiao)

values('ORCAMENTO','$estab_pertence','Aberto','$nome_operador','$dataabertura','$horaabertura','$diaabertura','$mesabertura','$anoabertura','$codigo_cliente','$cpf_cliente','$nome','','$cidade','$estado','$regiao')";
 
mysql_query($comando,$conexao);
 
 
$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and operador = '$nome_operador' and codigo_cliente = '$codigo_cliente' and status = 'Aberto' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$dataorcamento = $linha[1];
$horaorcamento = $linha[2];
	

$codigo_orcamento = $linha[0];
$loja = $linha[6];
$total_geral = $linha[7];

$operador = $linha[12];

$status = $linha[17];
$condicao = $linha[16];

$acrescimodearredondamento = $linha[38];


}

}
else{
	
echo "<script>

alert('ATENÇÃO!!!... O CLIENTE $nome POSSUI UM ORCAMENTO ABERTO Nº $num_orcamento_aberto! FINALIZE-O PRIMEIRO PARA DEPOIS ABRIR UM NOVO ORCAMENTO!.');

</script>";


$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and operador = '$nome_operador' and codigo_cliente = '$codigo_cliente' and status = 'Aberto' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$dataorcamento = $linha[1];
$horaorcamento = $linha[2];


$codigo_orcamento = $linha[0];
$loja = $linha[6];
$total_geral = $linha[7];

$operador = $linha[12];

$condicao = $linha[16];

$status = $linha[17];

$acrescimodearredondamento = $linha[38];

}


}







}

if(empty($solicitacao)){
	
$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and operador = '$nome_operador' and codigo_cliente = '$codigo_cliente' and status = 'Aberto'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}

	
	
$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and operador = '$nome_operador' and codigo_cliente = '$codigo_cliente' and status = 'Aberto' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$dataorcamento = $linha[1];
$horaorcamento = $linha[2];


$codigo_orcamento = $linha[0];
$loja = $linha[6];
$total_geral = $linha[7];

$operador = $linha[12];

$condicao = $linha[16];

$status = $linha[17];

$acrescimodearredondamento = $linha[38];

}
	
	
	
	
	
}
?>



<?


	


$item = $_POST['item'];
$quant = $_POST['quant'];

if(empty($quant)){

$quantidade = "1";

}
else{

$quantidade = $quant;

}


if(empty($item)){
	
}
else{
	
$sql = "SELECT * FROM produtos where nome_produto = '$item' limit 1";
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
$cod_barras = $linha[15];
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



$comando = "insert into produtos_em_orcamento(codigo_orcamento,loja,codigo_cliente,nome,endereco,numero,bairro,cidade,estado,telefone,celular,email,cep,cpf,rg,dataorcamento,horaorcamento,codigoproduto,nomeproduto,categoria,precocompra,quant,preco0,preco1,preco2,preco3,acrescimo,acrescimodecimal,acrescimomonetario,total,operador,descontoetapa0,baseparaproximodesconto0,condicao,status,status_fatura,total_impostos,total_fornecedor,preco_normal,oferta,preco_oferta,margem_lucro,margem_lucro_informado,impostos,impostos_informado,margem_folga,margem_folga_decimal,impostos_compra,impostos_compra_decimal,total_impostos_compra,total_impostos_venda)

values('$codigo_orcamento','$loja','$codigo_cliente','$nome','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf_cliente','$rg','$dataorcamento','$horaorcamento','$codigoproduto','$nomeproduto','$categoria','$preco_compra','$quantidade','$preco','0','0','0','0','0','0','$total','$operador','0','$total','$condicao','$status','A FATURAR','$total_impostos','$total_fornecedor','$preco_normal','$oferta','$preco_oferta','$margem_lucro','$margem_lucro_informada','$impostos','$impostos_informado','$margem_folga','$margem_folga_decimal','$impostos_compra','$impostos_compra_decimal','$total_impostos_compra','$total_impostos_venda')";
 
mysql_query($comando,$conexao);


}
?>





<?
 
$obs = $_POST['obs'];		



$arredondamento = $_POST['arredondamento'];



 
$sql = "select sum(total) as total_liquido from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_liquido_produtos = $linha['total_liquido'];







if(empty($arredondamento)){
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `acrescimo_de_arredondamento` = '' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento_ret' limit 1 ";
}

mysql_query($comando,$conexao);


$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and operador = '$nome_operador' and codigo_cliente = '$codigo_cliente' and status = 'Aberto' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$acrescimodearredondamento = $linha[38];

}




$arred = bcadd($total_liquido_produtos,$acrescimodearredondamento,2);
	
}
else{
	
$arred = $arredondamento;	
	
}




if($arred == "0"){
	
$total_geral = bcadd($total_liquido_produtos,$acrescimodearredondamento,2);


$desconto_de_arredondamento = "0";

$acrescimo_de_arredondamento ="0";


}


if($arred == $total_liquido_produtos){
	
$total_geral = bcadd($total_liquido_produtos,$acrescimodearredondamento,2);


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



     

                   
                    
//if(empty($quantparc)){ 

 //}
 //else{
	 


$restante_a_pagar = bcsub($total_geral,$entrada,2);
 
$valor_de_parcela = bcdiv($restante_a_pagar,$quantparc,2);


 //} 
 
 
 
 
 
 if($valor_de_parcela==""){
	 
}
else{ 


                    
                    
 $sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `entrada` = '$entrada',`status_fatura` = '',`quantparc` = '$quantparc',`modopagto` = '$modo_do_pagto',`cartao` = '$cartao_utilizar',`valorparcela` = '$valor_de_parcela',`total_geral` = '$total_geral',`obs` = '$obs',`desconto_de_arredondamento` = '$desconto_de_arredondamento',`acrescimo_de_arredondamento` = '$acrescimo_de_arredondamento',`arred` = '$arred' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);


}
                   
                    
                    
?>






<?

//------------------INICIO DE ALTERAÇÃO DOS PRODUTOS NO ORÇAMENTO-------------------------

$codigolancamento = $_POST['codigolancamento'];



$cod_prod_at = $_POST['cod_prod_at'];


$desconto_at = $_POST['desconto_at'];




//$desconto_at2 = $_POST['desconto_at2'];
//$desconto_at3 = $_POST['desconto_at3'];
//$desconto_at4 = $_POST['desconto_at4'];

$acrescimo_at = $_POST['acrescimo_at'];

$quant_at = $_POST['quant_at'];

if(empty($quant_at)){

$quantidade_at = "1";

}
else{

$quantidade_at = $quant_at;

}




$sql = "SELECT * FROM produtos where codigo = '$cod_prod_at' limit 1";
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


$sql = "SELECT * FROM produtos where codigo = '$cod_prod_at' limit 1";
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

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];


}

$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco_at = $preco_oferta;

}
else{
	
$preco_at = $preco_normal;
	
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


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco0` = '$preco_at',`preco1` = '0',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa0` = '0',`descontoetapa1` = '0',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa0` = '0',`descontodecimaletapa1` = '0',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa0` = '0',`descontomonetarioetapa1` = '0',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalsemdesconto_etapa0',`baseparaproximodesconto0` = '$baseparaproximodesconto0',`baseparaproximodesconto1` = '0',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}


}

//------------------FIM ETAPA 0---------------------------------------



//-----------INICIO ETAPA 1-------------------------------

	
if(($desconto_at >= 0.01) && ($desconto_at <=5)){
	

$sql = "SELECT * FROM produtos where codigo = '$cod_prod_at' limit 1";
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

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];


}

$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco_at1 = $preco_oferta;

}
else{
	
$preco_at1 = $preco_normal;
	
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


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
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



$sql = "SELECT * FROM produtos where codigo = '$cod_prod_at' limit 1";
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

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];


}

$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco_at1 = $preco_oferta;

}
else{
	
$preco_at1 = $preco_normal;
	
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


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
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


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco2` = '$preco2menosdescontoetapa2',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa2` = '$descontoetapa2',`descontoetapa3` = '0',`descontodecimaletapa2` = '$descontodecimaletapa2',`descontodecimaletapa3` = '0',`descontomonetarioetapa2` = '$descontomonetarioetapa2',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa2',`baseparaproximodesconto2` = '$baseparaproximodesconto2',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
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


$sql = "SELECT * FROM produtos where codigo = '$cod_prod_at' limit 1";
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

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];


}

$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco_at1 = $preco_oferta;

}
else{
	
$preco_at1 = $preco_normal;
	
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


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
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


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco2` = '$preco2menosdescontoetapa2',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa2` = '$descontoetapa2',`descontoetapa3` = '0',`descontodecimaletapa2` = '$descontodecimaletapa2',`descontodecimaletapa3` = '0',`descontomonetarioetapa2` = '$descontomonetarioetapa2',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa2',`baseparaproximodesconto2` = '$baseparaproximodesconto2',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
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


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco3` = '$preco3menosdescontoetapa3',`quant` = '$quantidade_at',`descontoetapa3` = '$descontoetapa3',`descontodecimaletapa3` = '$descontodecimaletapa3',`descontomonetarioetapa3` = '$descontomonetarioetapa3',`total` = '$totalcomdesconto_etapa3',`baseparaproximodesconto3` = '$baseparaproximodesconto3',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
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


$sql = "SELECT * FROM produtos where codigo = '$cod_prod_at' limit 1";
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

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];


}

$impostos_venda_decimal = bcdiv($impostos_informado,100,4);


if($oferta=="Sim"){
	
$preco_at1 = $preco_oferta;

}
else{
	
$preco_at1 = $preco_normal;
	
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


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco1` = '$preco1menosdescontoetapa1',`preco2` = '0',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa1` = '$descontoetapa1',`descontoetapa2` = '0',`descontoetapa3` = '0',`descontodecimaletapa1` = '$descontodecimaletapa1',`descontodecimaletapa2` = '0',`descontodecimaletapa3` = '0',`descontomonetarioetapa1` = '$descontomonetarioetapa1',`descontomonetarioetapa2` = '0',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto1` = '$baseparaproximodesconto1',`baseparaproximodesconto2` = '0',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos1',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
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


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco2` = '$preco2menosdescontoetapa2',`preco3` = '0',`quant` = '$quantidade_at',`descontoetapa2` = '$descontoetapa2',`descontoetapa3` = '0',`descontodecimaletapa2` = '$descontodecimaletapa2',`descontodecimaletapa3` = '0',`descontomonetarioetapa2` = '$descontomonetarioetapa2',`descontomonetarioetapa3` = '0',`total` = '$totalcomdesconto_etapa2',`baseparaproximodesconto2` = '$baseparaproximodesconto2',`baseparaproximodesconto3` = '0',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
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


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco3` = '$preco3menosdescontoetapa3',`quant` = '$quantidade_at',`descontoetapa3` = '$descontoetapa3',`descontodecimaletapa3` = '$descontodecimaletapa3',`descontomonetarioetapa3` = '$descontomonetarioetapa3',`total` = '$totalcomdesconto_etapa3',`baseparaproximodesconto3` = '$baseparaproximodesconto3',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco4` = '0',`descontoetapa4` = '0',`descontodecimaletapa4` = '0',`descontomonetarioetapa4` = '0',`baseparaproximodesconto4` = '0',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
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


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preco4` = '$preco4menosdescontoetapa4',`quant` = '$quantidade_at',`descontoetapa4` = '$descontoetapa4',`descontodecimaletapa4` = '$descontodecimaletapa4',`descontomonetarioetapa4` = '$descontomonetarioetapa4',`total` = '$totalcomdesconto_etapa4',`baseparaproximodesconto4` = '$baseparaproximodesconto4',`diferenca_normal_para_oferta` = '$diferenca_normal_para_oferta',`total_impostos` = '$total_impostos',`total_descontos_concedidos` = '$total_descontos_concedidos',`total_fornecedor` = '$total_fornecedor',`preco_normal` = '$preco_normal',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`total_impostos_compra` = '$total_impostos_compra',`total_impostos_venda` = '$total_impostos_venda' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
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



	
//$total_geral_momentaneo = $total_liquido_produtos;
	



$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`orcamentos` set `total_geral` = '$total_geral' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);



$sql = "SELECT * FROM orcamentos where codigo_cliente = '$codigo_cliente' and codigo_orcamento = '$codigo_orcamento' order by codigo_orcamento desc";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$quantparc = $linha[8];
$condpagto = $linha[9];
$modo_do_pagto = $linha[10];
$obs = $linha[11];
$cartao_utilizar = $linha[28];
$valor_de_parcela = $linha[29];
$entrada = $linha[35];

$num_orcamento_bloco = $linha[40];

}


?>




<?
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>" 
  
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
<form name="form1" method="post" action="historico_cliente.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
<input type="submit" name="Submit2" value="Voltar ao Historico do cliente">
</form>
<table width="100%"  border="0">
        <tr>
          <td><div align="center">              <form name="form7" method="post" action="finalizar_orcamento.php">
                <span class="style3">                </span>
                <table width="100%" border="0">
                  <tr>
                    <td width="33%"><div align="center">
 
                    Loja: <span class="style2"><? echo $loja; ?> </span></div></td>
                    <td width="49%"><div align="center">Cliente: <span class="style2"><? echo $nome; ?></span></div></td>
                    <td width="18%"><div align="center">
                      <?


echo "Total do $condicao <br>
R$ ".$total_geral;


?>
                    </div></td>
                  </tr>
                  <tr>
                    <td colspan="2"><div align="center"><? if(empty($modo_do_pagto)){ } else{ echo "Condições de pagto escolhida foi em  $quantparc vez(es) modo de pagto $modo_do_pagto"; } ?> 
<? 

  if(($modo_do_pagto == "CARTAO DE CREDITO") or ($modo_do_pagto == "CARTAO DE DEBITO")) {

echo "- $cartao_a_utilizar";

}

?>
					</div></td>
                    <td><div align="center"></div></td>
                  </tr>
                  <tr>
                    <td colspan="2"><div align="center">
                        <?  


echo "Entrada de R$ $entrada + $quantparc X R$ $valor_de_parcela"; 




   ?>
                    </div></td>
                    <td><div align="center">
                      <? 

$mes_aliquota = date('m');
$ano_aliquota = date('Y');


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


$comando = "update `$linha[1]`.`orcamentos` set `custo_com_cartao` = '$custo_com_cartao' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento'";
}

mysql_query($comando,$conexao);


if(($modopagto == "CARTAO DE DEBITO") or ($modopagto == "CARTAO DE CREDITO")){

echo "Aliquota <br> $aliquota%";

}
 ?>
                    </div></td>
                  </tr>
                  <tr>
                    <td colspan="3"><div align="center"><span class="style3">
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <strong><font color="#0000FF">
                    </font>
                    <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                    </strong>
                      <?
					  
                      if($condicao == "ORCAMENTO"){
						  
						  if(empty($modo_do_pagto)){
	
}
else{

if(($modo_do_pagto == "CARTAO DE DEBITO") or ($modo_do_pagto == "CARTAO DE CREDITO")){

if(empty($cartao_utilizar)){
	
}
else{

						  
						  
                      echo "<select name='condicao' id='condicao'>
                      <option select>$condicao</option>
                      <option>PEDIDO</option>
                    </select>


Correspondente ao orcamento(bloco) Nº <input name='num_orcamento_bloco' type='text' id='num_orcamento_bloco' size='4' value='$num_orcamento_bloco'>";
					
}

}
else{

echo "<select name='condicao' id='condicao'>
                      <option select>$condicao</option>
                      <option>PEDIDO</option>
                    </select>


Correspondente ao orcamento(bloco) Nº <input name='num_orcamento_bloco' type='text' id='num_orcamento_bloco' size='4' value='$num_orcamento_bloco'>";

}

}
					}
					else{
					
echo "<input name='condicao' type='hidden' id='condicao' value='PEDIDO'>";					
					
					
					}
                    
                    ?> 
                      
                       
<input name="codigo_orcamento_finalizar" type="hidden" id="codigo_orcamento_finalizar" value="<? echo $codigo_orcamento; ?>">
                    </span>
                      <input name="datafechamento" type="hidden" id="datafechamento" value="<? echo date('Y-m-d'); ?>">
                      <input name="horafechamento" type="hidden" id="horafechamento" value="<? echo date('H:i:s'); ?>">
                        <span class="style3"><strong><font color="#0000FF">
                        <input name="quantparc" type="hidden" id="quantparc" value="<? echo $simulacao; ?>">
                          <strong><font color="#0000FF">
                          <strong><font color="#0000FF">
                          <input name="modopagto" type="hidden" id="modopagto" value="<? echo $modo_do_pagto;  ?>">
                          </font></strong>
                          <input name="cartao" type="hidden" id="cartao" value="<? echo $cartao_ua_tilizar; ?>">
                          <input name="operador_alterou" type="hidden" id="operador_alterou" value="<? echo $operador; ?>">
                          <input name="loja" type="hidden" id="loja" value="<? echo $loja; ?>">
                          </font></strong></font></strong></span>
                          <input name="entrada" type="hidden" id="entrada" value="<? echo $entrada; ?>">
                          <?
if(empty($modo_do_pagto)){
	
}
else{

if(($modo_do_pagto == "CARTAO DE DEBITO") or ($modo_do_pagto == "CARTAO DE CREDITO")){

if(empty($cartao_a_utilizar)){
	
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
                </table>
              </form>
</div></td>
        </tr>
        <tr>
          <td width="238">&nbsp;</td>
  </tr>
        <tr>
          <td>            <form action="" method="post" name="form5" target="_blank">
            <div align="center">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <span class="style6">
              <?
if($registros==0){
echo "Seu orçamento foi aberto com sucesso! Nº ". $codigo_orcamento;
}			
else{
echo "$nome_operador já possui um orçamento em aberto! Nº ". $codigo_orcamento;
}
?>
              </span>
            </div>
          </form></td>
  </tr>
        
      </table>
            <table width="100%" border="0">
              <tr>
                <td><form name="form4" method="post" action="orcamento.php">
                  <div align="center">
                    Arredondar para
                      <input name="arredondamento" type="text" id="arredondamento" value="<? echo $total_geral; ?>" size="8">
                    Modo de pagto: Entrada 
                    <input name="entrada" type="text" id="entrada" value="<? if(empty($entrada)){ echo "0.00"; } else{ echo $entrada; } ?>" size="8">
                    <strong>
                    <select name="modo_do_pagto" id="modo_do_pagto">
                      <option selected><? echo "$modo_do_pagto"; ?></option>
                      <?


    $sql = "select * from modo_pagto order by modopagto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['modopagto']."</option>";
    }
?>
                                      </select>
                    </strong>  <strong><?
  if(($modo_do_pagto == "CARTAO DE CREDITO") or ($modo_do_pagto == "CARTAO DE DEBITO")) {
  
  echo "Qual cartao a ser utilizado? <select name='cartao_utilizar' id='cartao_utilizar'>
    <option selected>$cartao_a_utilizar</option>";
    


    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select>";
  
 }
 else{
 
echo "<input type='hidden' name='cartao_utilizar' id='cartao_utilizar' value='$cartao_utilizar'>";

 
 }
  
  ?>
                    </strong>em <strong>
                    <select name="quantparc" id="item">
                      <option selected><? if(empty($quantparc)){ echo "1"; } else{ echo $quantparc; } ?></option>
                      <?


    $sql = "select * from quantparc order by quantparc asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['quantparc']."</option>";
    }
?>
                                      </select>
                    </strong> vezes.<strong>
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                    </strong>
                    <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao">
<input type="submit" name="button2" id="button2" value="Simular">
                    <br> Obs:
                    <input name="obs" type="text" id="obs" value="<? echo $obs; ?>" size="50">
                  </div>
                </form></td>
              </tr>
            </table>
<div align="center"></div>
            <table width="100%"  border="0">
              <tr>
                <td> <form name="form6" method="post" action="orcamento.php">
                  <div align="center"><strong>Adicionar produto
                    <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
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
                    Quantidade
                  <input name="quant" type="text" id="quant" size="3">
                  </strong>
                    <input type="submit" name="Submit" value="Adicionar">
                    </div>
                </form>
                </td>
              </tr>
</table>            
            <table width="100%"  border="0">
              
              <tr bgcolor="#ffffff">
                <td><div align="center">Codigo Produto</div></td>
                <td class="style3"><div align="center">Nome Produto</div></td>
                <td class="style3"><div align="center">Categoria</div></td>
                <td class="style3"><div align="center">Estoque</div></td>
                <td class="style3"><div align="center">Pre&ccedil;o</div></td>
                <td><div align="center" class="style3">Quantidade</div></td>
                <td><div align="center" class="style3">Desconto</div></td>
                <td><div align="center" class="style3">Desconto Monetario</div></td>
                <td><div align="center"><span class="style3">Total Produtos</span></div></td>
                <td><div align="center" class="style3"></div></td>
              </tr>
              <?
			  
//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and num_bordero = '' and prazo_final between '$data_inicio_busca' and '$data_atual' order by num_proposta asc";

$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

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



$sql2 = "SELECT * FROM produtos where codigo = '$codigoproduto'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$quant_estoque = $linha[16];

}

?>
              <tr>
                <td width="19%"><div align="center" class="style3">
                    <form name="form2" method="post" action="orcamento.php">
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      <? echo $num_proposta;?><strong><font color="#0000FF">
                      <input name="codigo_orcamento_ret" type="hidden" id="status_proposta4" value="<? echo $codigo_orcamento; ?>">
                      <input name="cod_prod_ret" type="hidden" id="nome_operador5" value="<? echo $codigoproduto; ?>">
                      </font>
                      <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                      </strong>
                      <input type="submit" name="Submit3" value="<? echo "$codigoproduto - Retirar"; ?> ">
                    </form>
                </div></td>
                <td width="17%" class="style3"><div align="center"><? echo $nomeproduto;?></div></td>
                <form name="form3" method="post" action="orcamento.php">
                
                <td width="9%" class="style3"><div align="center"><? echo $categoria;?></div></td>
                <td width="5%" class="style3"><div align="center"><? echo $quant_estoque;?></div></td>
                <td width="5%" class="style3"><div align="center"><? echo $preco; ?></div></td>
                <td width="5%"><div align="center" class="style3">
                  <input name="quant_at" type="text" id="quant_at" value="<? echo $quant; ?>" size="3">
                </div></td>
                <td width="4%"><div align="center" class="style3">
                  <input name="desconto_at" type="text" id="desconto_at" value="<? 
				  
  				  $subtotal_descontosconcedidos_natural = bcadd($descontoetapa1,$descontoetapa2,2);
  				  $subtotal_descontosconcedidos_natural2 = bcadd($descontoetapa3,$descontoetapa4,2);

				  $descontosconcedidos_natural = bcadd($subtotal_descontosconcedidos_natural,$subtotal_descontosconcedidos_natural2,2);
				  
				  
				  echo $descontosconcedidos_natural; ?>" size="3">
                </div></td>
                <td width="14%"><div align="center" class="style3"><?
				
				$subtotaldedescontos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);
				$subtotaldedescontos2 = bcadd($descontomonetarioetapa3,$descontomonetarioetapa4,2);
				$descontosconcedidos = bcadd($subtotaldedescontos,$subtotaldedescontos2,2);
				 echo $descontosconcedidos;
				 
				 echo $sub_valor_desconto_etapa1;
				 
				 ?>
                </div></td>
                <td width="15%"><div align="center"><span class="style3"><? echo $total;?></span></div></td>
                <td width="12%">
                  <div align="center" class="style3">
                    <strong><font color="#0000FF">
                    </font>
                    <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                    <font color="#0000FF">
                    <input name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
                    <input name="cod_prod_at" type="hidden" id="cod_prod_at" value="<? echo $codigoproduto; ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao">
                    </font></strong>
                    <input type="submit" name="button" id="button" value="Atualizar">
                  </div></td></form>
</tr>



<? } ?>

              <tr>
                <td><span class="style3"></span></td>
                <td class="style3"><div align="center"></div></td>
                <td class="style3"><div align="center"></div></td>
                <td class="style3"><div align="center"></div></td>
                <td class="style3"><div align="center"></div></td>
                <td><span class="style3"></span></td>
                <td><span class="style3"></span></td>
                <td><span class="style3"></span></td>
                <td><div align="center"></div></td>
                <td><span class="style3"></span></td>
            </table>
<p><strong></strong></p>
<p><strong></strong></p>
<p><strong></strong></p>





</body>
</html>
<?   ?>