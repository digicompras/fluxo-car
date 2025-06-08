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
ini_set( 'display_errors', 0 );

require '../../conect/conect.php';


?>

</p>
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


if($categoria=="COLCHOES"){
$travesseiro1 = $_POST['travesseiro1'];
$travesseiro2 = $_POST['travesseiro2'];




$sql2 = "SELECT * FROM produtos where nome_produto = '$travesseiro1'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$registros = mysql_num_rows($res2);


$preco_travesseiro1 = $linha[7];
}




$sql3 = "SELECT * FROM produtos where nome_produto = '$travesseiro2'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registros = mysql_num_rows($res3);


$preco_travesseiro2 = $linha[7];
}

$total_preco_travesseiros = bcadd($preco_travesseiro1,$preco_travesseiro2,2);
}



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

if($margem_folga=="0"){
	
$margem_folga_decimal = "0";
	
}
else{
$margem_folga_decimal = bcdiv($margem_folga,100,4);

}

$margem_lucro = $_POST['margem_lucro'];



if($margem_lucro<="99.99"){
	
$sub_margem_lucro_decimal = $margem_lucro;

$margem_lucro_decimal = bcdiv($sub_margem_lucro_decimal,100,4);

}

if($margem_lucro=="100"){
	
	
$sub_margem_lucro_decimal = 49;

$margem_lucro_decimal = bcdiv($sub_margem_lucro_decimal,100,4);


}

if($margem_lucro=="50"){
	
	
$sub_margem_lucro_decimal = 49;

$margem_lucro_decimal = bcdiv($sub_margem_lucro_decimal,100,4);


}



if($margem_lucro>"100"){
	
	
$etapa1 = bcsub(200,$margem_lucro,2);

$margem_lucro_decimal = "0.5";

$margem_lucro_decimal2 = bcdiv($etapa1,100,4);

$valor_a_somar_ao_preco_de_custo = bcdiv($preco_compra,$margem_lucro_decimal2,4)-$preco_compra;

}
else{

$margem_lucro_decimal = bcdiv($sub_margem_lucro_decimal,100,4);

}
$impostos = $_POST['impostos'];
$impostos_decimal = bcsub(100,$impostos,4)/100;

$impostos_compra = $_POST['impostos_compra'];
$impostos_compra_decimal = bcsub(100,$impostos_compra,4)/100;

$impostos_de_compra_decimal = bcdiv($impostos_compra,100,4);

//--------etapa 1 ------------------

$composicao_preco = $preco_compra+$frete;

$preco_com_impostos_na_compra = bcdiv($composicao_preco,$impostos_compra_decimal,2);

$preco_com_margem_contribuicao = bcdiv($preco_com_impostos_na_compra,$margem_lucro_decimal,2);

$preco_total_sem_impostos = bcadd($preco_com_margem_contribuicao,$valor_a_somar_ao_preco_de_custo,2);


//----------fim da etapa 1 ----------------------------

//-----------etapa 2 calculo dos impostos---------------

$calculo_preco_com_impostos = bcdiv($preco_total_sem_impostos,$impostos_decimal,2);


//----fim da etapa 2 calculo dos impostos--------------------


//--------------etapa 3 calculo margem de perda--------------

$margem_de_perda = bcmul($calculo_preco_com_impostos,0,2);

$subtotal_preco = bcadd($calculo_preco_com_impostos,$margem_de_perda,2);



//----------------fim da etapa 3 calculo margem de perda------------


//--------------etapa 4 calculo para margem de desconto---------------

if($categoria=="COLCHOES"){

$sub_preco = bcmul($subtotal_preco,$margem_folga_decimal,2);

$preco = bcadd($sub_preco,$total_preco_travesseiros,2);
	
}
else{
	
$sub_preco = bcmul($subtotal_preco,$margem_folga_decimal,2);

	
$preco = bcadd($subtotal_preco,$sub_preco,2);

}

//----------------fim da etapa 4 calculo para mergem de desconto-----------------


$oferta = $_POST['oferta'];

if($oferta == "Sim"){
	
$preco_oferta = bcadd($_POST['preco_oferta'],$total_preco_travesseiros,2);


}
else{
	
$preco_oferta = "";
	
}

$data = $_POST['data'];
$hora = $_POST['hora'];

$fornecedor = $_POST['fornecedor'];



$comando = "insert into produtos(cod_barras,referencia,foto,foto2,material,cor,categoria,sub_categoria,descricao,preco,oferta,preco_oferta,data,hora,quant_estoque,expedicao,quant_disponivel,quant_minima,aparecer_site,preco_compra,frete,margem_lucro,impostos,margem_lucro_informada,impostos_informado,nome_produto,fornecedor,travesseiro1,travesseiro2,margem_folga, margem_folga_decimal,descontomaximo,impostos_compra,impostos_compra_decimal,impostos_compra_decimal2) 
values('$cod_barras','$referencia','$foto','$foto2','$material','$cor','$categoria','$sub_categoria','$descricao','$preco','$oferta','$preco_oferta','$data','$hora','$quant_estoque','$expedicao','$quant_disponivel','$quant_minima','$aparecer_site','$preco_compra','$frete','$margem_lucro_decimal','$impostos_decimal','$margem_lucro','$impostos','$nome_produto','$fornecedor','$travesseiro1','$travesseiro2','$margem_folga','$margem_folga_decimal','$descontomaximo','$impostos_compra','$impostos_de_compra_decimal','$impostos_compra_decimal')";

mysql_query($comando,$conexao) or die("Erro ao gravar dados");


echo "Produto inserido no banco de dados com sucesso<br><br>";


$sql = "SELECT * FROM produtos order by desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[11];
}

}
else{
	
?>
<span class="style4">
<?
echo "ATENÇÃO!!!... JÁ EXISTE $registros registro(s) DESSE PRODUTO..... VOCÊ PODE ALTERÁ-LO CASO DESEJE.";
}
?>
</span>
<?
?>
</p>
<table width="100%" border="0">
  <tr>
    <td width="12%"><form name="form1" method="post" action="escolha_de_categoria.php">
      <input type="submit" name="Submit" value="Voltar">
      <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
    </form></td>
    <td width="14%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
    <td width="7%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>preco compra com imp</td>
    <td>preco com mc</td>
    <td>preco sem imp de venda</td>
    <td>preco com imp de venda</td>
    <td>sub total</td>
    <td>preco final de venda</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><? echo $preco_com_impostos_na_compra; ?></td>
    <td><? echo $preco_com_margem_contribuicao; ?></td>
    <td><? echo $preco_total_sem_impostos; ?></td>
    <td><? echo $calculo_preco_com_impostos; ?></td>
    <td><? echo $subtotal_preco; ?></td>
    <td><? echo $preco; ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>

<?
mysql_close($conexao);
?>