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
.style1 {	font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
.style3 {	color: #000000;
	font-weight: bold;
}
.style4 {
	color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
-->
</style></head>

<body>
<p>        
<?
error_reporting(E_ALL && NOTICE);

require '../../conect/conect.php';
ini_set( 'display_errors', 0 );


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_operador = $linha[0];

$nome_operador = $linha[1];

$ultimo_departamento_trabalhado = $linha[66];

$funcao = $linha[43];
}


$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$razaosocial_empresa = $linha[1];

$nfantasia_empresa = $linha[2];
}

?>

</p>
<form name="form1" method="post" action="escolha_de_categoria.php">
  <input type="submit" name="Submit" value="Voltar">
  <span class="style1">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  </span>
</form>
<p>
  <?
$nome_produto = $_POST['nome_produto'];
$cod_barras = $_POST['cod_barras'];

$sql = "SELECT * FROM produtos where cod_barras = '$cod_barras' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);


$codigo = $linha[11];
}
?>

<?
if($registros==0){

$foto = $_FILES['foto']['name'];
$foto2 = $_FILES['foto2']['name'];
//$foto3 = $_FILES['foto3']['name'];
//$foto4 = $_FILES['foto4']['name'];


$uploaddir = '../../fotos_produtos/';
$uploadfile = $uploaddir. $_FILES['foto']['name'];

if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir . $_FILES['foto']['name'])){
echo "Foto Nº 1 enviada com sucesso!";
} else {
echo "Foto Nº1 não foi enviada! Essa é obrigatória";
}


  
$uploaddir = '../../fotos_produtos/';
$uploadfile = $uploaddir. $_FILES['foto2']['name'];

if(move_uploaded_file($_FILES['foto2']['tmp_name'], $uploaddir . $_FILES['foto2']['name'])){
echo "Foto Nº 2 enviada com sucesso!";
} else {
echo "Foto Nº 2 não foi enviada!";
}

  
//$uploaddir = '../../imagens3/';
//$uploadfile = $uploaddir. $_FILES['foto3']['name'];

//if(move_uploaded_file($_FILES['foto3']['tmp_name'], $uploaddir . $_FILES['foto3']['name'])){
//echo "Foto Nº 3 enviada com sucesso!";
//} else {
//echo "Foto Nº 3 não foi enviada!";
//}

  
//$uploaddir = '../../imagens4/';
//$uploadfile = $uploaddir. $_FILES['foto4']['name'];

//if(move_uploaded_file($_FILES['foto4']['tmp_name'], $uploaddir . $_FILES['foto4']['name'])){
//echo "Foto Nº 4 enviada com sucesso!";
//} else {
//echo "Foto Nº 4 não foi enviada!";
//}

$categoria = $_POST['categoria'];

$classe = $_POST['classe'];

$departamento = $_POST['departamento'];


$referencia = $_POST['referencia'];

$material = $_POST['material'];
$cor = $_POST['cor'];
$sub_categoria = $_POST['sub_categoria'];
$descricao = $_POST['descricao'];
$descontomaximo = $_POST['descontomaximo'];

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

$data = $_POST['data'];
$hora = $_POST['hora'];

$fornecedor = $_POST['fornecedor'];


if((empty($nome_produto)) or (empty($preco)) or (empty($sub_categoria)) or (empty($cod_barras))){
echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE INFORMAR O NOME DO PRODUTO, PRECO, SUB-CATEGORIA, CODIGO DE BARRAS!!!... SAO APENAS 4 INFORMACOES! INFORME TODAS E PODERA CADASTRAR O PRODUTO');


</script>";

}
else{

$comando = "insert into produtos(cod_barras,referencia,foto,foto2,material,cor,categoria,sub_categoria,descricao,preco,oferta,preco_oferta,data,hora,quant_estoque,expedicao,quant_disponivel,quant_minima,aparecer_site,preco_compra,frete,margem_lucro,impostos,margem_lucro_informada,impostos_informado,nome_produto,fornecedor,travesseiro1,travesseiro2,margem_folga, margem_folga_decimal,descontomaximo,classe,departamento,operador,datacadastro,horacadastro) 
values('$cod_barras','$referencia','$foto','$foto2','$material','$cor','$categoria','$sub_categoria','$descricao','$preco','$oferta','$preco_oferta','$data','$hora','$quant_estoque','$expedicao','$quant_disponivel','$quant_minima','$aparecer_site','$preco_compra','$frete','$margem_lucro_decimal','$impostos_decimal','$margem_lucro','$impostos','$nome_produto','$fornecedor','$travesseiro1','$travesseiro2','$margem_folga','$margem_folga_decimal','$descontomaximo','$classe','$departamento','$nome_operador','$data','$hora')";

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


echo "Produto inserido no banco de dados com sucesso<br><br>";

}

}
else{
?>
<span class="style4">
<?
echo "ATENÇÃO!!!... JÁ EXISTE $registros registro(s) DO PRODUTO..... $nome_produto $cod_barras.";
}
?>
</span>
</p>
<p>&nbsp;</p>
</body>
</html>

<?
mysql_close($conexao);
?>