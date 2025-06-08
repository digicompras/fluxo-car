<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

require '../../../conect/conect.php';
include '../../../css/botoes.php';

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
.class01 {font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
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
	  
	background="../../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
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
$referencia = $_POST['referencia'];


$sql = "SELECT * FROM estoque_pecas where estab_pertence = '$estab_pertence' and referencia = '$referencia' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);


$part_number = $linha[0];

$grupo = $linha[4];
$sub_grupo = $linha[5];
	$ultimo_preco = $linha[7];
$codigoproduto = $linha[11];

$quant_estoque = $linha[16];


$preco_compra_cadastrado = $linha[21];
$margem_lucro_informada = $linha[25];
$impostos_informado_cadastrado = $linha[26];
$nome_produto = $linha[27];
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


$unidade = $_POST['unidade'];
$quantidade = $_POST['quantidade'];
$preco_compra_atual = $_POST['preco_compra_atual'];
$obs = $_POST['obs'];


if($preco_compra_atual<=$preco_compra_cadastrado){
	
	
	
$comando = "insert into estoque_entrada(data_entrada,hora_entrada,fornecedor,nf,data_nf,nome_produto,grupo,sub_grupo,unidade,quantidade,preco_compra,obs,codigoproduto,estab_pertence,operador,part_number,classe,departamento) 
values('$data','$hora','$fornecedor','$nf','$data_nf','$nome_produto','$grupo','$sub_grupo','$unidade','$quantidade','$preco_compra_atual','$obs','$codigoproduto','$estab_pertence','$operador','$part_number','O','Todos')";

mysql_query($comando,$conexao) or die("Erro ao gravar entrada no estoque!");


echo "Entrada no estoque do produto realizada com sucesso!<br><br>";



$totaliza_quantidade = bcadd($quant_estoque,$quantidade);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`estoque_pecas` set `quant_estoque` = '$totaliza_quantidade' where `estoque_pecas`. `codigo` = '$codigoproduto' limit 1 ";
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


$preco_a_comparar = bcdiv($subtotal_preco,0.80,2);
	
if($preco_a_comparar<=$ultimo_preco){
	$preco = $ultimo_preco;
}
else{
	$preco = $preco_a_comparar;
}


//----------------fim da etapa 4 calculo para mergem de desconto-----------------




	
$comando = "insert into estoque_entrada(data_entrada,hora_entrada,fornecedor,nf,data_nf,nome_produto,grupo,sub_grupo,unidade,quantidade,preco_compra,obs,codigoproduto,estab_pertence,operador,part_number,classe,departamento) 
values('$data','$hora','$fornecedor','$nf','$data_nf','$nome_produto','$grupo','$sub_grupo','$unidade','$quantidade','$preco_compra_atual','$obs','$codigoproduto','$estab_pertence','$operador','$part_number','O','Todos')";

	mysql_query($comando,$conexao) or die("Erro ao gravar entrada no estoque!");

echo "Entrada no estoque do produto realizada com sucesso!<br><br>";



$totaliza_quantidade = bcadd($quant_estoque,$quantidade);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`estoque_pecas` set `codigo` = '$codigoproduto',`quant_estoque` = '$totaliza_quantidade',`preco_compra` = '$preco_compra',`preco` = '$preco',`classe` = 'O',`departamento` = 'Todos' where `estoque_pecas`. `codigo` = '$codigoproduto' limit 1 ";
}
mysql_query($comando,$conexao);





}
?>
</span>
</p>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="30%"><form name="form1" method="post" action="../menu.php">
        <input class="class01" type=image src="../../../imagens/botoes/voltar.png" width="100" height="100" name="Submit2" value="Voltar">
        <span class="style1">
          <input name="dia_nf" type="hidden" id="dia_nf" value="<? echo "$dia_nf"; ?>">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input name="nf" type="hidden" id="nf" value="<? echo "$nf"; ?>">
        </span>
        <input name="mes_nf" type="hidden" id="mes_nf" value="<? echo "$mes_nf"; ?>">
        <input name="ano_nf" type="hidden" id="ano_nf" value="<? echo "$ano_nf"; ?>">
        <span class="style1">
        <input name="fornecedor" type="hidden" id="fornecedor" value="<? echo "$fornecedor"; ?>">
        </span>
        <span class="style1">
        <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo "$nome_produto"; ?>">
        </span>
        <span class="style1">
        <input name="preco_compra" type="hidden" id="preco_compra" value="<? echo "$preco_compra"; ?>">
        </span>
      </form></td>
      <td width="36%">&nbsp;</td>
      <td width="34%">&nbsp;</td>
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