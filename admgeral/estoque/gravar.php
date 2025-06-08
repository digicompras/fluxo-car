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

require '../../conect/conect.php';


?>

</p>
<form name="form1" method="post" action="menu.php">
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




$categoria_cadastrada = $linha[4];

$codigo = $linha[11];

$quant_estoque = $linha[16];


$preco_compra_cadastrado = $linha[21];
$margem_lucro_informada = $linha[25];
$impostos_informado_cadastrado = $linha[26];
$frete_cadastrado = $linha[22];


}
?>

<?


  
$data = $_POST['data'];
$hora = $_POST['hora'];

$fornecedor = $_POST['fornecedor'];
$nf = $_POST['nf'];

$dia_nf = $_POST['dia_nf'];
$mes_nf = $_POST['mes_nf'];
$ano_nf = $_POST['ano_nf'];

$data_nf = "$ano_nf-$mes_nf-$dia_nf";

$nome_produto = $_POST['nome_produto'];
$unidade = $_POST['unidade'];
$quantidade = $_POST['quantidade'];
$preco_compra_atual = $_POST['preco_compra_atual'];
$obs = $_POST['obs'];


if($preco_compra_atual<=$preco_compra_cadastrado){
	
	
	
$comando = "insert into estoque_entrada(data_entrada,hora_entrada,fornecedor,nf,data_nf,nome_produto,categoria,unidade,quantidade,preco_compra,obs) 
values('$data','$hora','$fornecedor','$nf','$data_nf','$nome_produto','$categoria_cadastrada','$unidade','$quantidade','$preco_compra_atual','$obs')";

mysql_query($comando,$conexao) or die("Erro ao gravar entrada no estoque!");


echo "Entrada no estoque do produto realizada com sucesso!<br><br>";



$totaliza_quantidade = bcadd($quant_estoque,$quantidade);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`produtos` set `codigo` = '$codigo',`quant_estoque` = '$totaliza_quantidade' where `produtos`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao);


	
}
else{
	
$preco_compra = $preco_compra_atual;


$frete_decimal = $frete_cadastrado/100;


if($margem_lucro_informada<="99.99"){
	
$sub_margem_lucro_decimal = bcsub(100,$margem_lucro_informada,4);

}

if($margem_lucro_informada=="100"){
	
	
$sub_margem_lucro_decimal = 50;

}


if($margem_lucro_informada>"100"){
	
$sub_margem_lucro_decimal = bcsub($margem_lucro_informada,100,4);

}



$margem_lucro_decimal = bcdiv($sub_margem_lucro_decimal,100,4);

$impostos_decimal = (100-$impostos_informado_cadastrado)/100;

//--------etapa 1 ------------------

$composicao_preco = $preco_compra+$frete_cadastrado;

$preco_sem_impostos = bcdiv($composicao_preco,$margem_lucro_decimal,2);



//----------fim da etapa 1 ----------------------------

//-----------etapa 2 calculo dos impostos---------------

$calculo_preco_com_impostos = bcdiv($preco_sem_impostos,$impostos_decimal,2);


//----fim da etapa 2 calculo dos impostos--------------------


//--------------etapa 3 calculo margem de perda--------------

$margem_de_perda = bcmul($calculo_preco_com_impostos,0.01,2);

$subtotal_preco = bcadd($calculo_preco_com_impostos,$margem_de_perda,2);



//----------------fim da etapa 3 calculo margem de perda------------


//--------------etapa 4 calculo para margem de desconto---------------


$preco = bcdiv($subtotal_preco,0.80,2);


//----------------fim da etapa 4 calculo para mergem de desconto-----------------





$comando = "insert into estoque_entrada(data_entrada,hora_entrada,fornecedor,nf,data_nf,nome_produto,categoria,unidade,quantidade,preco_compra,obs) 
values('$data','$hora','$fornecedor','$nf','$data_nf','$nome_produto','$categoria_cadastrada','$unidade','$quantidade','$preco_compra','$obs')";

mysql_query($comando,$conexao) or die("Erro ao gravar entrada no estoque!");


echo "Entrada no estoque do produto realizada com sucesso!<br><br>";



$totaliza_quantidade = bcadd($quant_estoque,$quantidade);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`produtos` set `codigo` = '$codigo',`quant_estoque` = '$totaliza_quantidade',`preco_compra` = '$preco_compra',`preco` = '$preco' where `produtos`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao);





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