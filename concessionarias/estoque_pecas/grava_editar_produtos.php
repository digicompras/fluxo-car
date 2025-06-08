<?php
/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em minutos */
session_cache_expire(600);
$cache_expire = session_cache_expire();

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');
?>

<?
error_reporting(E_ALL);




//require('file:///F|/webs/pedcell/conexao.php') or die("Erro ao incluir arquivo");
require '../../conect/conect.php';
ini_set( 'display_errors', 0 );

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$razaosocial_empresa = $linha[1];

$nfantasia_empresa = $linha[2];
}

$senha = $_SESSION['senha']; 
		  
		  
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$obra_operador = $linha[50];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];
$rdo_autorizado = $linha[58];
$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$inventario_autorizado = $linha[67];
$estoque_entradas_autorizado = $linha[68];
$cadastro_de_itens_autorizado = $linha[69];
$estoque_entradas_por_xml_autorizado = $linha[71];
}

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence' limit 1";	
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$statusempresaconveniada = $linha[41];

}



$codigo = $_POST['codigo'];


$grupo = $_POST['grupo'];


$descontomaximo = $_POST['descontomaximo'];

$cod_barras = $_POST['cod_barras'];
$referencia = $_POST['referencia'];

$material = $_POST['material'];
$cor = $_POST['cor'];
$sub_grupo = $_POST['sub_grupo'];
$descricao = $_POST['descricao'];
$quant_estoque = $_POST['quant_estoque'];
$expedicao = $_POST['expedicao'];
$quant_disponivel = $_POST['quant_disponivel'];
$quant_minima = $_POST['quant_minima'];
$aparecer_site = $_POST['aparecer_site'];
$preco_compra = $_POST['preco_compra'];
$frete = $_POST['frete'];
$frete_decimal = $frete/100;

$margem_folga = $_POST['margem_folga'];
$preco = $_POST['preco'];

$oferta = $_POST['oferta'];
$preco_oferta = $_POST['preco_oferta'];

$nome_produto = $_POST['nome_produto'];
$fornecedor = $_POST['fornecedor'];

$classe = $_POST['classe'];

$departamento = $_POST['departamento'];

$impostos_compra = $_POST['impostos_compra'];
if(empty($impostos_compra)){
	
$impostos_compra_decimal = "1";
	
}
else{
	
$impostos_compra_decimal = bcsub(100,$impostos_compra,4)/100;

}
$comissao = $_POST['comissao'];

?>

<?


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;
$reg++;


$comando = "update `$linha[1]`.`estoque_pecas` set `codigo` = '$codigo',`cod_barras` = '$cod_barras',`referencia` = '$referencia',`material` = '$material',`cor` = '$cor',`grupo` = '$grupo',`sub_grupo` = '$sub_grupo',`descricao` = '$descricao',`quant_estoque` = '$quant_estoque',`expedicao` = '$expedicao',`quant_disponivel` = '$quant_disponivel',`quant_minima` = '$quant_minima',`aparecer_site` = '$aparecer_site',`preco_compra` = '$preco_compra',`frete` = '$frete',`margem_lucro` = '$margem_lucro_decimal',`impostos` = '$impostos_decimal',`preco` = '$preco',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`margem_lucro_informada` = '$margem_lucro',`impostos_informado` = '$impostos',`nome_produto` = '$nome_produto',`fornecedor` = '$fornecedor',`travesseiro1` = '$travesseiro1',`travesseiro2` = '$travesseiro2',`margem_folga` = '$margem_folga',`margem_folga_decimal` = '$margem_folga_decimal',`descontomaximo` = '$descontomaximo',`classe` = '$classe',`departamento` = '$departamento',`impostos_compra` = '$impostos_compra',`impostos_compra_decimal` = '$impostos_compra_decimal' ,`comissao` = '$comissao' where `estoque_pecas`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao) or die("Erro ao gravar dados");


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

echo "Produto alterado no banco de dados com sucesso<br>";




?>
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
-->
</style></head>

<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
<p>       
</p>
<form name="form1" method="post" action="menu.php">
  <input class="class01" type="submit" name="Submit" value="Voltar">
  <span class="style1">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  </span>
</form>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>