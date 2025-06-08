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
<title>Border&ocirc;s</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
$codigo_cliente = $_POST['codigo_cliente'];


$sql = "SELECT * FROM clientes where codigo = '$codigo_cliente'";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];

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

$obs = $linha[28];

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



$parc1 = $linha[45];

$banco1 = $linha[46];

$vencto1 = $linha[47];

$compra1 = $linha[48];



$parc2 = $linha[49];

$banco2 = $linha[50];

$vencto2 = $linha[51];

$compra2 = $linha[52];



$parc3 = $linha[53];

$banco3 = $linha[54];

$vencto3 = $linha[55];

$compra3 = $linha[56];



$parc4 = $linha[57];

$banco4 = $linha[58];

$vencto4 = $linha[59];

$compra4 = $linha[60];



$parc5 = $linha[61];

$banco5 = $linha[62];

$vencto5 = $linha[63];

$compra5 = $linha[64];



$parc6 = $linha[65];

$banco6 = $linha[66];

$vencto6 = $linha[67];

$compra6 = $linha[68];



$parc7 = $linha[69];

$banco7 = $linha[70];

$vencto7 = $linha[71];

$compra7 = $linha[72];



$num_beneficio2 = $linha[73];

$num_beneficio3 = $linha[74];

$num_beneficio4 = $linha[75];



$dataprev2 = $linha[76];

$obs2 = $linha[77];





$dataprev = $linha[76];

$cpf_rg = $linha[78];

$comp_end = $linha[79];

$comp_quit1 = $linha[80];

$comp_quit2 = $linha[81];

$comp_quit3 = $linha[82];

$comp_quit4 = $linha[83];

$comp_quit5 = $linha[84];

$comp_quit6 = $linha[85];

$comp_renda = $linha[86];

$cpf_rg_testemunha = $linha[87];

$mes_niver = $linha[88];

$status_cliente = $linha[89];

$tem_margem = $linha[90];
$saldo1 = $linha[91];
$saldo2 = $linha[92];
$saldo3 = $linha[93];
$saldo4 = $linha[94];
$saldo5 = $linha[95];
$saldo6 = $linha[96];
$saldo7 = $linha[97];

$local_trabalho = $linha[134];
$fone_comercial = $linha[135];
$newsletter = $linha[136];
}

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

$codigo_orcamento_add = $_POST['codigo_orcamento_add'];
$cod_prod_add = $_POST['cod_prod_add'];

$codigo_orcamento_ret = $_POST['codigo_orcamento_ret'];
$cod_prod_ret = $_POST['cod_prod_ret'];

if(empty($cod_prod_ret)){
	
}
else{
$comando = "delete from `produtos_em_orcamento` where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento_ret' and codigoproduto = '$cod_prod_ret' limit 1 ";

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


$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and operador = '$nome_operador' and status = 'Aberto'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}



if($registros==0){
$comando = "insert into orcamentos(condicao,loja,status,operador,dataabertura,horaabertura,diaabertura,mesabertura,anoabertura,codigo_cliente,cpf,nome)

values('ORCAMENTO','$estab_pertence','Aberto','$nome_operador','$dataabertura','$horaabertura','$diaabertura','$mesabertura','$anoabertura','$codigo_cliente','$cpf_cliente','$nome')";
 
mysql_query($comando,$conexao);
 
 
$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and operador = '$nome_operador' and status = 'Aberto' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_orcamento_zero = $linha[0];
$loja = $linha[6];
$status = $linha[17];
}

}
else{

$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and operador = '$nome_operador' and status = 'Aberto' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_orcamento_um = $linha[0];
$loja = $linha[6];
$status = $linha[17];
}



}

?>



<?
if($registros==0){
	
$codigo_orcamento = $codigo_orcamento_zero;

}
else{
	
$codigo_orcamento = $codigo_orcamento_um;

}

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
$preco = $linha[7];
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

}

if($oferta=="Sim"){
	
$total = bcmul($preco_oferta,$quantidade,2);

}
else{
	
$total = bcmul($preco,$quantidade,2);
	
}

$comando = "insert into produtos_em_orcamento(codigo_orcamento,loja,codigo_cliente,nome,endereco,numero,bairro,cidade,estado,telefone,celular,email,cep,cpf,dataorcamento,horaorcamento,codigoproduto,nomeproduto,categoria,precocompra,quant,preco,desconto,descontodecimal,descontomonetario,acrescimo,acrescimodecimal,acrescimomonetario,total,obs,operador,baseparaproximodesconto)

values('$codigo_orcamento','$loja','$codigo_cliente','$nome','$endereco','$numero','$bairro','$cidade','$estado','$telefone','$celular','$email','$cep','$cpf','$dataorcamento','$horaorcamento','$codigoproduto','$nomeproduto','$categoria','$precocompra','$quantidade','$preco','0','0','0','0','0','0','$total','$obs','$operador','$total')";
 
mysql_query($comando,$conexao);

}
?>
<? echo "$codigo_orcamento "; ?>

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



if(empty($cod_prod_at)){

}
else{




$sql = "SELECT * FROM produtos where codigo = '$cod_prod_at' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$referencia = $linha[0];
$foto = $linha[1];
$material = $linha[2];
$cor = $linha[3];
$categoria = $linha[4];
$sub_categoria = $linha[5];
$descricao = $linha[6];
$preco = $linha[7];
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

$descontomaximo = $linha[34];

}




$subtotal_comparativo_descontos = bcadd($comparativo_desconto,$comparativo_descontoetapa2,2);
$subtotal_comparativo_descontos2 = bcadd($comparativo_descontoetapa3,$quant_at,2);

$total_comparativo_descontos = bcadd($subtotal_comparativo_descontos,$subtotal_comparativo_descontos2,2);


$subtotal_margem_disponivel_para_desconto = bcadd($comparativo_desconto,$comparativo_descontoetapa2,2);
$subtotal_margem_disponivel_para_desconto2 = bcadd($comparativo_descontoetapa2,0,2);

$margem_disponivel_para_desconto = bcsub($quant_at,$descontomaximo,2);



if($oferta=="Sim"){

$total = $preco_oferta;

}else{

$total = $preco;

}





//-----------INICIO ETAPA 0-------------------------------
	
if(empty($desconto_at)){



$totalcomdesconto_etapa0 = bcmul($total,$quant_at,2);


$baseparaproximodesconto0 = $totalcomdesconto_etapa0;


$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `quant` = '$quantidade_at',`desconto` = '0',`descontodecimal` = '',`descontomonetario` = '',`total` = '$totalcomdesconto_etapa0',`baseparaproximodesconto0` = '$baseparaproximodesconto0',`baseparaproximodesconto1` = '',`baseparaproximodesconto2` = '',`baseparaproximodesconto3` = '',`descontoetapa2` = '',`descontodecimaletapa2` = '',`descontoetapa3` = '',`descontodecimaletapa3` = '',`descontomonetarioetapa1` = '',`descontomonetarioetapa2` = '',`descontomonetarioetapa3` = '' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}




//------------------FIM ETAPA 0---------------------------------------



//-----------INICIO ETAPA 1-------------------------------

	
if(($desconto_at <= $descontomaximo) && ($desconto_at <=5)){
	
$atualizando_quantidade = bcmul($quantidade_at,$total,2);



if($desconto_at <= $descontoetapa0){

$desconto_etapa1 = $desconto_at;

}
else{

$desconto_etapa1 = bcsub($desconto_at,$descontoetapa0,2);

}


$descontodecimal_at = bcdiv($desconto_etapa1,100,4);


$valor_desconto = bcmul($atualizando_quantidade,$descontodecimal_at,2);

$totalcomdesconto_etapa1 = bcsub($atualizando_quantidade,$valor_desconto,2);


$baseparaproximodesconto = $totalcomdesconto_etapa1;


	
	
	
	
	
$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `quant` = '$quantidade_at',`desconto` = '0',`descontodecimal` = '',`descontomonetario` = '',`total` = '$totalcomdesconto_etapa0',`baseparaproximodesconto0` = '$baseparaproximodesconto0',`baseparaproximodesconto1` = '',`baseparaproximodesconto2` = '',`baseparaproximodesconto3` = '',`descontoetapa2` = '',`descontodecimaletapa2` = '',`descontoetapa3` = '',`descontodecimaletapa3` = '',`descontomonetarioetapa1` = '',`descontomonetarioetapa2` = '',`descontomonetarioetapa3` = '' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);
	
	
	

$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


//$descontoetapa1 = $linha[23];

$baseparaproximodesconto0 = $linha[62];

}




$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `quant` = '$quantidade_at',`desconto` = '$desconto_at',`descontodecimal` = '$descontodecimal_at',`total` = '$totalcomdesconto_etapa1',`baseparaproximodesconto` = '$baseparaproximodesconto',`descontoetapa2` = '',`descontoetapa3` = '',`descontomonetarioetapa1` = '$valor_desconto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}




//------------------FIM ETAPA 1---------------------------------------


//------------------INICIO ETAPA 2---------------------------------------


if(($desconto_at <= $descontomaximo) && ($desconto_at >=5.01) && ($desconto_at <=15)){


$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$descontoetapa1 = $linha[23];

$baseparadescontoetapa2 = $linha[62];

$descontomonetarioetapa1 = $linha[67];


}

$recalculandodescontoetapa2 = bcdiv($descontoetapa1,100,2);


$sub_atualizando_quantidade = bcmul($quantidade_at,$total,2);

$descontoatual = bcmul($sub_atualizando_quantidade,$recalculandodescontoetapa2,2);

$atualizando_quantidade = bcmul($quantidade_at,$total,2)-$descontoatual;


if($desconto_at <= $descontoetapa1){

$desconto_etapa2 = $desconto_at;

}
else{

$desconto_etapa2 = bcsub($desconto_at,$descontoetapa1,4);

}

$descontodecimal_etapa2 = bcdiv($desconto_etapa2,100,2);


$valor_descontoetapa2 = bcmul($atualizando_quantidade,$descontodecimal_etapa2,2);

$totalcomdesconto_etapa2 = bcsub($atualizando_quantidade,$valor_descontoetapa2,2);


$baseparaproximodesconto2 = $totalcomdesconto_etapa2;



$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `quant` = '$quantidade_at',`descontoetapa2` = '$desconto_etapa2',`descontodecimaletapa2` = '$descontodecimal_etapa2',`descontomonetarioetapa2` = '$valor_descontoetapa2',`total` = '$totalcomdesconto_etapa2',`baseparaproximodesconto` = '$baseparaproximodesconto2' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}




//------------------FIM ETAPA 2---------------------------------------





//------------------INICIO ETAPA 3---------------------------------------



if(($desconto_at <= $descontomaximo) && ($desconto_at >=15.01) && ($desconto_at <=20)){


$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$descontoetapa0 = $linha[23];

$descontoetapa1 = $linha[23];


$baseparadescontoetapa3 = $linha[62];

$descontoetapa2 = $linha[63];

$descontomonetarioetapa1 = $linha[67];

$descontomonetarioetapa2 = $linha[68];

}

//-------------recalculando etapa 1-----------------

$atualizando_quantidade = bcmul($quantidade_at,$total,2);

if($desconto_at <= $descontoetapa0){

$desconto_etapa1 = $desconto_at;

}
else{

$desconto_etapa1 = bcsub($desconto_at,$descontoetapa0,2);

}


$descontodecimal_at = bcdiv($desconto_etapa1,100,4);


$valor_desconto = bcmul($atualizando_quantidade,$descontodecimal_at,2);

$totalcomdesconto_etapa1 = bcsub($atualizando_quantidade,$valor_desconto,2);


$baseparaproximodescontoetapa2 = $totalcomdesconto_etapa1;



//----------fim de recalculo etapa 1---------------

//-------------inicio de recalculo etapa 2----------------------






//-------------------fim de recalculo etapa 2-------------------











$somadescontomonetarioetapaum_e_dois = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);

$atualizando_quantidade = bcmul($quantidade_at,$total,2)-$somadescontomonetarioetapaum_e_dois;



$somadescontoetapaum_e_dois = bcadd($descontoetapa1,$descontoetapa2,2);


if($desconto_at <= $descontoetapa2){

$desconto_etapa3 = $desconto_at;

}
else{

$desconto_etapa3 = bcsub($desconto_at,$somadescontoetapaum_e_dois,2);

}


$descontodecimal_etapa3 = bcdiv($desconto_etapa3,100,4);


$valor_descontoetapa3 = bcmul($atualizando_quantidade,$descontodecimal_etapa3,2);

$totalcomdesconto_etapa3 = bcsub($atualizando_quantidade,$valor_descontoetapa3,2);


$baseparaproximodesconto3 = $totalcomdesconto_etapa3;



$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `quant` = '$quantidade_at',`descontoetapa3` = '$desconto_etapa3',`descontodecimaletapa3` = '$descontodecimal_etapa3',`descontomonetarioetapa3` = '$valor_descontoetapa3',`total` = '$totalcomdesconto_etapa3',`baseparaproximodesconto` = '$baseparaproximodesconto3' where `produtos_em_orcamento`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}




//------------------FIM ETAPA 3---------------------------------------


if($desconto_at > $descontomaximo){

echo "<script>

alert('ATENÇÃO!!!... VOCÊ TENTOU UM DESCONTO MAIOR QUE O PERMITIDO! O LIMITE MAXIMO DE DESCONTO PARA ESSE PRODUTO É $descontomaximo%.');

</script>";

}

}









//-------------------FIM DE ALTEREÇÃO DOS PRODUTOS EM ORÇAMENTO-------------------------------




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
          <td colspan="3"><div align="left"><span class="style2">
          Listando or&ccedil;amentos da loja:</span> <span class="style2"><? echo $loja; ?>
          </span></div></td>
        </tr>
        <tr>
          <td width="430">Cliente: <span class="style2"><? echo $nome; ?></span></td>
          <td><div align="center">Total do Or&ccedil;amento:
            <?

$sql = "select sum(total) as total_liquido from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_liquido = $linha['total_liquido'];

$total_geral = bcadd($valor_total_liquido,0,2);

echo "R$ ".$total_geral;




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `total_geral` = '$total_geral' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);




?>
          </div></td>
          <td width="403" rowspan="3" align="left" valign="top">
          
          
            <div align="center">
              <table width="100%" border="2">
                <tr>
                  <td><div align="center">Parcelamento em x vezes no cart&atilde;o x</div></td>
                </tr>
                <tr>
                  <td><div align="center">
                    <?  
if(empty($quantparc)){ 

 }
 else{
 
 $simulacao = bcdiv($total_geral,$quantparc,2);
 
 } 
 
 if($simulacao==""){
	 
}
else{ 

$cartao = $_POST['cartao'];
$despesacartao = $_POST['despesacartao'];


echo "$quantparc X R$ $simulacao"; 


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `quantparc` = '$quantparc',`cartao` = '$cartao',`valorparcela` = '$simulacao' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);


}


   ?>
                  </div></td>
                </tr>
              </table>
            </div></td>
        </tr>
        <tr>
          <td>            <form action="imprime_orcamento_para_cliente.php" method="post" name="form5" target="_blank">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
            <select name="codigo_orcamento" id="select2">
              <option value="null" selected>Selecione
              <?

    $sql = "select * from orcamentos where loja = '$loja' and operador = '$nome_operador' order by codigo_orcamento desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
	$registros_nesse_bordero = mysql_num_rows($result);

  echo "<option>".$x['codigo_orcamento']."</option>";
    }
?>
              </option>
            </select>
            <input type="submit" name="Submit4" value="Visualisar">
          </form></td>
          <td width="492"><form name="form7" method="post" action="">
            <span class="style3">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
            <input name="codigo_orcamento_finalizar" type="hidden" id="codigo_orcamento_finalizar" value="<? echo $codigo_orcamento; ?>">
            </span>
            <input name="datafechamento" type="hidden" id="datafechamento" value="<? echo date('Y-m-d'); ?>">
            <input name="horafechamento" type="hidden" id="horafechamento" value="<? echo $hora_atual; ?>">
            <span class="style3"><strong><font color="#0000FF">
            <input name="status" type="hidden" id="status" value="<? echo "Finalizado"; ?>">
            <input name="quantparc" type="hidden" id="quantparc" value="<? echo $simulacao; ?>">
            <input name="cartao" type="hidden" id="cartao" value="<? echo $cartao; ?>">
            <input name="despesacartao" type="hidden" id="despesacartao" value="<? echo $despesacartao;  ?>">
            </font></strong></span>
            <input type="submit" name="Submit32" value="Finalizar">
          </form></td>
        </tr>
        <tr>
          <td colspan="2"><span class="style6">
          <?
if($registros==0){
echo "Seu orçamento foi aberto com sucesso! Nº ". $codigo_orcamento;
}			
else{
echo "$nome_operador já possui um orçamento em aberto! Nº ". $codigo_orcamento;
}
?>
          </span>            <div align="center"></div>          <div align="center">
          </div></td>
  </tr>
      </table>
            <table width="100%" border="0">
              <tr>
                <td colspan="2"><form name="form4" method="post" action="orcamento.php">
                  Parcelamento no cart&atilde;o
  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
  <strong>
  <select name="cartao" id="cartao">
    <option selected><? echo $cartao; ?></option>
    <?


    $sql = "select * from cartoes order by cartao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cartao']."</option>";
    }
?>
  </select>
  </strong>em <strong>
  <select name="quantparc" id="item">
    <option selected><? echo $quantparc; ?></option>
    <?


    $sql = "select * from quantparc order by quantparc asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['quantparc']."</option>";
    }
?>
  </select>
  </strong> vezes - Despesas com cart&atilde;o
<input type="text" name="despesacartao" id="despesacartao">
  <input type="submit" name="button2" id="button2" value="Simular">
                </form></td>
              </tr>
              <tr>
                <td><form name="form6" method="post" action="orcamento.php">
                  <strong>Adicionar produto
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
                </form></td>
                <td width="40%">&nbsp;</td>
              </tr>
            </table>
<p>&nbsp;</p>
            <div align="center"></div>
            <table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>            
            <table width="100%"  border="0">
              
              <tr bgcolor="#ffffff">
                <td><div align="center">Codigo Produto</div></td>
                <td class="style3"><div align="center">Nome Produto</div></td>
                <td class="style3"><div align="center">Categoria</div></td>
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
$desconto = $linha[23];
$descontodecimal = $linha[24];
$descontomonetario = $linha[25];
$acrescimo = $linha[26];
$acrescimodecimal = $linha[27];
$acrescimomonetario = $linha[28];
$total = $linha[29];

$descontoetapa2 = $linha[63];
$descontoetapa3 = $linha[65];


$descontomonetarioetapa1 = $linha[67];
$descontomonetarioetapa2 = $linha[68];
$descontomonetarioetapa3 = $linha[69];





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
                      </font></strong>
                      <input type="submit" name="Submit3" value="<? echo "$codigoproduto - Retirar"; ?> ">
                    </form>
                </div></td>
                <td width="16%" class="style3"><div align="center"><? echo $nomeproduto;?></div></td>
                <form name="form3" method="post" action="orcamento.php">
                
                <td width="4%" class="style3"><div align="center"><? echo $categoria;?></div></td>
                <td width="4%" class="style3"><div align="center"><? if($oferta=="Sim"){ echo $preco_oferta; } else{ echo $preco; } ?></div></td>
                <td width="4%"><div align="center" class="style3">
                  <input name="quant_at" type="text" id="quant_at" value="<? echo $quant; ?>" size="3">
                </div></td>
                <td width="3%"><div align="center" class="style3">
                  <input name="desconto_at" type="text" id="desconto_at" value="<? 
				  
  				  $subtotal_descontosconcedidos_natural = bcadd($desconto,$descontoetapa2,2);

				  $descontosconcedidos_natural = bcadd($subtotal_descontosconcedidos_natural,$descontoetapa3,2);
				  
				  
				  echo $descontosconcedidos_natural; ?>" size="3">
                </div></td>
                <td width="13%"><div align="center" class="style3"><?
				
				$subtotaldedescontos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);
				$descontosconcedidos = bcadd($descontomonetarioetapa3,$subtotaldedescontos,2);
				 echo $descontosconcedidos;
				 
				 
				 
				 ?>
                </div></td>
                <td width="14%"><div align="center"><span class="style3"><? echo $total;?></span></div></td>
                <td width="11%">
                  <div align="center" class="style3">
                    <strong><font color="#0000FF">
                    <input name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
                    <input name="cod_prod_at" type="hidden" id="cod_prod_at" value="<? echo $codigoproduto; ?>">
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
<?  ?>