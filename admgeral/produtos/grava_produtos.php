<?php

require '../../conect/conect.php';
ini_set( 'display_errors', 0 );

/* Define o limitador de cache para 'private' */
$sql = "SELECT * FROM tempoexpiracaosenha limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$tempoexpiracaosenha = $linha['1'];


}


/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em 30 minutos */
session_cache_expire($tempoexpiracaosenha);
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


$sql = "SELECT * FROM produtos where nome_produto = '$nome_produto' limit 1";
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

$cod_barras = $_POST['cod_barras'];
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



$comando = "insert into produtos(cod_barras,referencia,foto,foto2,material,cor,categoria,sub_categoria,descricao,preco,oferta,preco_oferta,data,hora,quant_estoque,expedicao,quant_disponivel,quant_minima,aparecer_site,preco_compra,frete,margem_lucro,impostos,margem_lucro_informada,impostos_informado,nome_produto,fornecedor,travesseiro1,travesseiro2,margem_folga, margem_folga_decimal,descontomaximo,classe,departamento) 
values('$cod_barras','$referencia','$foto','$foto2','$material','$cor','$categoria','$sub_categoria','$descricao','$preco','$oferta','$preco_oferta','$data','$hora','$quant_estoque','$expedicao','$quant_disponivel','$quant_minima','$aparecer_site','$preco_compra','$frete','$margem_lucro_decimal','$impostos_decimal','$margem_lucro','$impostos','$nome_produto','$fornecedor','$travesseiro1','$travesseiro2','$margem_folga','$margem_folga_decimal','$descontomaximo','$classe','$departamento')";

mysql_query($comando,$conexao) or die("Erro ao gravar dados");


echo "Produto inserido no banco de dados com sucesso<br><br>";

}
else{
?>
<span class="style4">
<?
echo "ATENÇÃO!!!... JÁ EXISTE $registros registro(s) DESSE PRODUTO..... VOCÊ PODE ALTERÁ-LO CASO DESEJE.";
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