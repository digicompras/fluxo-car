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

values('$codigo_orcamento_add_produto','$loja','$codigo_cliente','$nome','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf_cliente','$rg','$dataorcamento','$horaorcamento','$codigoproduto','$nomeproduto','$categoria','$preco_compra','$quantidade','$preco','0','0','0','0','0','0','$total','$operador','0','$total','$condicao','$status','A FATURAR','$total_impostos','$total_fornecedor','$preco_normal','$oferta','$preco_oferta','$margem_lucro','$margem_lucro_informada','$impostos','$impostos_informado','$margem_folga','$margem_folga_decimal','$impostos_compra','$impostos_compra_decimal','$total_impostos_compra','$total_impostos_venda','$setor','$departamento_a_gravar')";
 
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

values('$codigo_orcamento_add_produto','$loja','$codigo_cliente','$nome','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf_cliente','$rg','$dataorcamento','$horaorcamento','$codigoproduto','$nomeproduto','$categoria','$preco_compra','$quantidade','$preco','0','0','0','0','0','0','$total','$operador','0','$total','$condicao','$status','A FATURAR','$total_impostos','$total_fornecedor','$preco_normal','$oferta','$preco_oferta','$margem_lucro','$margem_lucro_informada','$impostos','$impostos_informado','$margem_folga','$margem_folga_decimal','$impostos_compra','$impostos_compra_decimal','$total_impostos_compra','$total_impostos_venda','$setor','$departamento_a_gravar')";
 
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

$cpf = $linha[26];

$cliente = $linha[27];

}


$sql = "SELECT * FROM faturamento_futuro where status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_fatura = mysql_num_rows($res);
	
	

}


if($registros_fatura>=1){

$sql = "SELECT * FROM faturamento_futuro order by num_fatura desc limit 1";
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


}
}
else{
	
$comando = "insert into faturamento_futuro(datefaturamento,dia,mes,ano,hora,status_fatura,loja,operador,setor,departamento,cliente,cpf)

values('$data_abertura_fatura','$dia','$mes','$ano','$hora_abertura_fatura','Aberto','$estab_pertence','$nome_operador','$setor','$ultimo_departamento_trabalhado','$cliente','$cpf')";
 
mysql_query($comando,$conexao);



	
$sql = "SELECT * FROM faturamento_futuro order by num_fatura desc limit 1";
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

$comando = "insert into clientes(nome,cpf,email,operador) values('$nome_a_inserir','$cpf','$email_a_inserir','$nome_operador')";


mysql_query($comando,$conexao);

}


$sql3 = "SELECT * FROM clientes where cpf = '$cpf_a_inserir'";
$res3 = mysql_query($sql3);

while($linha=mysql_fetch_row($res3)) {
$reg++;


$cliente_a_inserir = $linha[1];


$cpf_a_inserir = $linha[4];

}



$sql4 = "select * from db";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {



$comando = "update `$linha[1]`.`faturamento_futuro` set `cliente` = '$cliente_a_inserir',`cpf` = '$cpf_a_inserir' where `faturamento_futuro`. `num_fatura` = '$num_fatura' limit 1 ";
}

mysql_query($comando,$conexao);


$sql5 = "SELECT * FROM faturamento_futuro order by num_fatura desc limit 1";
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


$comando = "update `$linha[1]`.`orcamentos` set `entrada` = '$entrada',`quantparc` = '$quantparc',`modopagto` = '$modopagto',`cartao` = '$cartao',`valorparcela` = '$valorparcela',`obs` = '$obs',`departamento` = '$ultimo_departamento_trabalhado' where `orcamentos`. `num_fatura` = '$num_fatura' limit 1 ";
}

mysql_query($comando,$conexao);



$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`faturamento_futuro` set `entrada` = '$entrada',`quantparc` = '$quantparc',`modopagto` = '$modopagto',`cartao` = '$cartao',`valorparcela` = '$valorparcela',`total_geral` = '$total_geral',`obs` = '$obs',`desconto_de_arredondamento` = '$desconto_de_arredondamento',`acrescimo_de_arredondamento` = '$acrescimo_de_arredondamento',`departamento` = '$ultimo_departamento_trabalhado' where `faturamento_futuro`. `num_fatura` = '$num_fatura' limit 1 ";
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


$sql = "SELECT * FROM codigo_gerente where codigo = '$cod_gerente' limit 1";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statuscodgerente = $linha[2];

}

if(empty($cod_gerente)){
}
else{
	
if($statuscodgerente == "ativo"){
	





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

	
	
	
$comando = "delete from `produtos_em_orcamento` where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret' limit 1 ";

mysql_query($comando,$conexao);





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
            <td width="13%"><div align="center">Comanda</div></td>
            <td colspan="2"><div align="center">
              <form name="comandas" method="post" action="fila_contas_fechadas_para_recebimento_teste.php">
                <div align="left">
                  <input type="text" name="nome" id="nome">
                  <input name="condicao" type="hidden" id="condicao" value="PEDIDO">
<input type="submit" name="button2" id="button2" value="Buscar">
                </div>
                <script language='JavaScript' type='text/javascript'>
document.comandas.nome.focus()
              </script>
              </form>
            </div>              </td>
            <td><div align="center">
              <form name="form3" method="post" action="fila_contas_fechadas_para_recebimento_teste.php">
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
            <td width="22%"><div align="center"></div></td>
            <td width="17%"><div align="center" class="style5"><strong>Frente de Caixa</strong></div></td>
          </tr>
          <tr>
            <td colspan="3"><div align="center">
              <form name="itens" method="post" action="fila_contas_fechadas_para_recebimento_teste.php">
                <div align="center"><strong>Adicionar produto:
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
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
              <form name="form5" method="post" action="fila_contas_fechadas_para_recebimento_teste.php">
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
              <form name="form2" method="post" action="fila_contas_fechadas_para_recebimento_teste.php">
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
            <td colspan="2"><div align="center">Pedidos</div>              <div align="center"></div></td>
            <td><div align="center"></div></td>
            <td colspan="2"><div align="center"><? if($retirada_de_produto=="retirar_produto"){

echo "<form name='form3' method='post' action='fila_contas_fechadas_para_recebimento_teste.php'>
                <div align='left'>
                  Codigo de Autorização<input type='password' name='cod_gerente' id='cod_gerente'>
				  <input type='hidden' name='codigo_orcamento_ret' id='codigo_orcamento_ret' value='$codigo_orcamento_ret'>
                  <input type='hidden' name='cod_prod_ret' id='cod_prod_ret' value='$cod_prod_ret'>
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

$sql = "SELECT * FROM orcamentos where num_fatura = '$num_fatura' and status = 'Aberto' order by codigo_orcamento asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$codigo_orcamento_a_receber = $linha[0];


echo "$codigo_orcamento_a_receber / ";

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
            
$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura' and departamento = '$ultimo_departamento_trabalhado'";

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
			
//$sql = "select sum(total) as total_liquido from produtos_em_orcamento where num_fatura = '$num_fatura'";

//$resultado=mysql_query($sql, $conexao);

//$linha=mysql_fetch_array($resultado);


//$total_liquido_produtos = $linha['total_liquido'];

//$total_liquido_dos_produtos = bcadd($total_liquido_produtos,0,2);

//echo "R$ $total_liquido_dos_produtos";

echo "R$ $total_geral";

			?>
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


$comando = "update `$linha[1]`.`orcamentos` set `custo_com_cartao` = '$custo_com_cartao',`departamento` = '$ultimo_departamento_trabalhado' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento'";
}

mysql_query($comando,$conexao);


if(($modopagto == "CARTAO DE DEBITO") or ($modopagto == "CARTAO DE CREDITO")){

echo "Aliquota $aliquota%";

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
                  <td><form name="form4" method="post" action="fila_contas_fechadas_para_recebimento_teste.php">
                    <div align="center">
                      <p>Arredondar para
                        <input name="arredondamento" type="text" id="arredondamento" value="<? echo $total_geral; ?>" size="8">
                        Modo de pagto: Entrada
                        <input name="entrada" type="text" id="entrada" value="<? if(empty($entrada)){ echo "0.00"; } else{ echo $entrada; } ?>" size="8">
                        <strong>
                          <select name="modopagto" id="modo_pagto">
                            <option selected><? echo $modopagto; ?></option>
                            <?


    $sql = "select * from modo_pagto order by modopagto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['modopagto']."</option>";
    }
?>
                          </select>
                          </strong>em <strong>
                            <select name="quantparc" id="item">
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
                            </strong> vezes.<strong>
                              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
                              </strong>
                        <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
                        <input name="solicitacao" type="hidden" id="solicitacao">
                        <br>
                        <strong>
                          <?
  if(($modopagto == "CARTAO DE CREDITO") or ($modopagto == "CARTAO DE DEBITO") or ($modopagto == "CARNE")) {
	  

$valordevido = bcsub($total_geral,$entrada,2);


$valor_cartao = $_POST['valorcartao'];

	  

if(empty($valor_cartao)){

$valor_do_cartao1 = $valordevido;

}
else{
	
$valor_do_cartao1 = $valor_cartao;
	
}
  
  echo "Cartao/carne a ser utilizado1: <select name='cartao' id='cartao'>
    <option selected> $cartao </option>";
    


    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> <input name='valorcartao' type='text' id='valorcartao' value='$valor_do_cartao1'>";
  
  
  
$valordevido2 = bcsub($valordevido,$valor_cartao,2);

if($valor_do_cartao1<$valordevido2){
	
if($valordevido2>0){
	
$cartao2 = $_POST['cartao2'];

$valor_cartao2 = $_POST['valorcartao2'];
	
if(empty($valor_cartao2)){

$valor_do_cartao2 = $valordevido2;

}
else{
	
$valor_do_cartao2 = $valor_cartao2;
	
}

	
echo "<br>Cartao/carne a ser utilizado2: <select name='cartao2' id='cartao2'>
    <option selected> $cartao2 </option>";
    


    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> <input name='valorcartao2' type='text' id='valorcartao2' value='$valor_do_cartao2'>";
  
 
	
}
}

  
  
  
$valordevido3 = bcsub($valordevido2,$valor_cartao2,2);

	
if($valor_do_cartao2<$valordevido3){


 
if($valordevido3>0){
	
$cartao3 = $_POST['cartao3'];

$valor_cartao3 = $_POST['valorcartao3'];
	
if(empty($valor_cartao3)){

$valor_do_cartao3 = $valordevido3;

}
else{
	
$valor_do_cartao3 = $valor_cartao3;
	
}

	
echo "<br>Cartao/carne a ser utilizado3: <select name='cartao3' id='cartao3'>
    <option selected> $cartao3 </option>";
    


    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> <input name='valorcartao3' type='text' id='valorcartao3' value='$valor_do_cartao3'>";
  
 
	
}
}




$valordevido4 = bcsub($valordevido3,$valor_cartao3,2);



if($valor_do_cartao3<=$valordevido4){


 
if($valordevido4>0){
	
$cartao4 = $_POST['cartao4'];

$valor_cartao4 = $_POST['valorcartao4'];
	
if(empty($valor_cartao4)){

$valor_do_cartao4 = $valordevido4;

}
else{
	
$valor_do_cartao4 = $valor_cartao4;
	
}

	
echo "<br>Cartao/carne a ser utilizado4: <select name='cartao4' id='cartao4'>
    <option selected> $cartao4 </option>";
    


    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }

  echo "</select> <input name='valorcartao4' type='text' id='valorcartao4' value='$valor_do_cartao4'>";
  
 
	
}
}

 
  
 }
 else{
 
echo "<input type='hidden' name='cartao' id='cartao' value=''>";

 
 }
   
  ?>
                          </strong></p>
                      <p>Obs:
                        <input name="obs" type="text" id="obs" value="<? echo $obs; ?>" size="50">
                        <input type="submit" name="button" id="button" value="Simular">
                      </p>
                    </div>
                  </form></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><div align="center">
                    <form name="form7" method="post" action="fila_contas_fechadas_para_recebimento_teste.php">
                      <span class="style3"> </span>
                      <table width="100%" border="0">

                        <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                          <td width="33%"><div align="center"> Loja: <span class="style2"><? echo $loja; ?></span></div></td>
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
                            <input name="codigo_orcamento_finalizar" type="hidden" id="codigo_orcamento_finalizar" value="<? echo $codigo_orcamento; ?>">
                            </span>
                            <input name="datafechamento" type="hidden" id="datafechamento" value="<? echo $datecadastro; ?>">
                            <input name="horafechamento" type="hidden" id="horafechamento" value="<? echo date('H:i:s'); ?>">
                            <span class="style3"><strong><font color="#0000FF">
                              <input name="quantparc" type="hidden" id="quantparc" value="<? echo $simulacao; ?>">
                              <strong><font color="#0000FF"> <strong><font color="#0000FF">
                                <input name="modopagto" type="hidden" id="modopagto" value="<? echo $modopagto;  ?>">
                                </font></strong>
                                <input name="cartao" type="hidden" id="cartao" value="<? echo $cartao; ?>">
                                <input name="operador_alterou" type="hidden" id="operador_alterou" value="<? echo $operador; ?>">
                                <input name="loja" type="hidden" id="loja" value="<? echo $loja; ?>">
                                </font></strong></font></strong></span>
                            <input name="entrada" type="hidden" id="entrada" value="<? echo $entrada; ?>">
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

