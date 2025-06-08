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

require '../../conect/conect.php';
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

<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
<p>        
<?
error_reporting(E_ALL && NOTICE);


$senha = $_SESSION['senha'];

$sql = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_operador = $linha[0];

$operador = $linha[1];

$estab_pertence = $linha[44];
}




?>

</p>
	
<p>
  <?
$nome_produto = $_POST['nome_produto'];
$cod_barras = $_POST['cod_barras'];
$referencia = $_POST['cod_barras'];

$sql = "SELECT * FROM estoque_pecas where cod_barras = '$cod_barras' limit 1";
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


$uploaddir = 'fotos_produtos/';
$uploadfile = $uploaddir. $_FILES['foto']['name'];

if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir . $_FILES['foto']['name'])){
echo "Foto Nº 1 enviada com sucesso!";
} else {
echo "Foto Nº1 não foi enviada! Essa é obrigatória";
}


  
$uploaddir = 'fotos_produtos/';
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

$grupo = $_POST['grupo'];
$sub_grupo = $_POST['sub_grupo'];
$classe = $_POST['classe'];

$departamento = $_POST['departamento'];

$material = $_POST['material'];
$cor = $_POST['cor'];

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
	$comissao = $_POST['comissao'];


if((empty($nome_produto)) or (empty($cod_barras)) ){
echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE INFORMAR O NOME DA PECA E O CODIGO!!!... VOLTE E TENTE NOVAMENTE!');


</script>";

}
else{

$comando = "insert into estoque_pecas(cod_barras,referencia,foto,foto2,material,cor,grupo,sub_grupo,descricao,preco,oferta,preco_oferta,data,hora,quant_estoque,expedicao,quant_disponivel,quant_minima,aparecer_site,preco_compra,frete,margem_lucro,impostos,margem_lucro_informada,impostos_informado,nome_produto,fornecedor,travesseiro1,travesseiro2,margem_folga, margem_folga_decimal,descontomaximo,classe,departamento,operador,datacadastro,horacadastro,estab_pertence,comissao) 
values('$cod_barras','$cod_barras','$foto','$foto2','$material','$cor','$grupo','$sub_grupo','$descricao','$preco','$oferta','$preco_oferta','$data','$hora','$quant_estoque','$expedicao','$quant_disponivel','$quant_minima','$aparecer_site','$preco_compra','$frete','$margem_lucro_decimal','$impostos_decimal','$margem_lucro','$impostos','$nome_produto','$fornecedor','$travesseiro1','$travesseiro2','$margem_folga','$margem_folga_decimal','$descontomaximo','$classe','$departamento','$operador','$data','$hora','$estab_pertence','$comissao')";

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


echo "Peca inserida no banco de dados com sucesso<br><br>";

}

}
else{
?>
<span class="style4">
<?
echo "ATENÇÃO!!!... JÁ EXISTE $registros registro(s) DA PECA..... $nome_produto $cod_barras.";
}
?>
	
<?
	
$sql = "select * from estoque_pecas where cod_barras = '$cod_barras' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);


$referencia = $linha[0];
$foto = $linha[1];
$material = $linha[2];
$cor = $linha[3];
$grupo = $linha[4];
$sub_grupo = $linha[5];
$descricao = $linha[6];
$preco = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$data_hora = $linha[10];
$codigo = $linha[11];
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
$nome_produto = $linha[27];
$fornecedor = $linha[28];
$operador = $linha[40];
}
?>
	
</span>
</p>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="33%"><form name="form1" method="post" action="escolha_de_categoria.php">
        <input class='class01' type="submit" name="Submit" value="Voltar">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
      </form></td>
      <td width="38%"><form name="form2" method="post" action="entradas/entrada.php">
        <input name="referencia" type="hidden" id="referencia" value="<? echo "$referencia"; ?>">
        <input name="fornecedor" type="hidden" id="fornecedor" value="<? echo "$fornecedor"; ?>">
        <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo "$nome_produto"; ?>">
        <span class="style1">
        <input name="preco_compra" type="hidden" id="preco_compra" value="<? echo "$preco_compra"; ?>">
        </span>
<input class='class01' type="submit" name="Submit4" value="Entrada">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
      </form></td>
      <td width="29%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>

<?
mysql_close($conexao);
?>