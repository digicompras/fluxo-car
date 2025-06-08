<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

?>

<?
error_reporting(E_ALL);
ini_set( 'display_errors', 0 );



//require('file:///F|/webs/pedcell/conexao.php') or die("Erro ao incluir arquivo");
require '../../conect/conect.php';

$codigo = $_POST['codigo'];


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




$descontomaximo = $_POST['descontomaximo'];

$cod_barras = $_POST['cod_barras'];
$referencia = $_POST['referencia'];

$material = $_POST['material'];
$cor = $_POST['cor'];
$sub_categoria = $_POST['sub_categoria'];
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


if($margem_folga=="0"){
	
$margem_folga_decimal = "0";
	
}
else{
$margem_folga_decimal = bcdiv($margem_folga,100,4);

}


$margem_lucro = $_POST['margem_lucro'];


if(($margem_lucro>="1") && ($margem_lucro<="500")){
	
	
$margem_lucro_decimal = bcdiv($margem_lucro,100,4);


}





$impostos = $_POST['impostos'];
$impostos_decimal = bcsub(100,$impostos,4)/100;

$impostos_compra = $_POST['impostos_compra'];
$impostos_compra_decimal = bcsub(100,$impostos_compra,4)/100;



//--------etapa 1 ------------------

$composicao_preco = $preco_compra+$frete;

$preco_com_impostos_na_compra = bcdiv($composicao_preco,$impostos_compra_decimal,2);

$sub_valor_da_margem_contribuicao1 = bcmul($preco_com_impostos_na_compra,$margem_lucro_decimal,4);

$sub_valor_da_margem_contribuicao12 = bcmul($sub_valor_da_margem_contribuicao1,0.03,4);

$valor_da_margem_contribuicao = bcadd($sub_valor_da_margem_contribuicao1,$sub_valor_da_margem_contribuicao12,2);

//$margem_contribuicao = bcmul($sub_margem_contribuicao,$valor_a_somar_ao_preco_de_custo,2);


$preco_total_sem_impostos = bcadd($preco_com_impostos_na_compra,$valor_da_margem_contribuicao,2);



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
	
if($margem_folga==0){
	
$sub_preco = $subtotal_preco;

}
else{

$sub_preco = bcmul($subtotal_preco,$margem_folga_decimal,2);

}

$preco = bcadd($sub_preco,$total_preco_travesseiros,2);
	
}
else{
	
if($margem_folga==0){
	
$sub_preco = $subtotal_preco;

}
else{
	
$sub_preco = bcmul($subtotal_preco,$margem_folga_decimal,2);

}
	
$preco = bcadd($subtotal_preco,$sub_preco,2);

}


//----------------fim da etapa 4 calculo para mergem de desconto-----------------



$oferta = $_POST['oferta'];

if($oferta == "Sim"){
	
//$preco_oferta = bcadd($_POST['preco_oferta'],$total_preco_travesseiros,2);
$preco_oferta = bcadd($_POST['preco_oferta'],0,2);

}
else{
	
$preco_oferta = "";
	
}
$nome_produto = $_POST['nome_produto'];
$fornecedor = $_POST['fornecedor'];




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;
$reg++;



$comando = "update `$linha[1]`.`produtos` set `codigo` = '$codigo',`cod_barras` = '$cod_barras',`referencia` = '$referencia',`material` = '$material',`cor` = '$cor',`categoria` = '$categoria',`sub_categoria` = '$sub_categoria',`descricao` = '$descricao',`quant_estoque` = '$quant_estoque',`expedicao` = '$expedicao',`quant_disponivel` = '$quant_disponivel',`quant_minima` = '$quant_minima',`aparecer_site` = '$aparecer_site',`preco_compra` = '$preco_compra',`frete` = '$frete',`margem_lucro` = '$margem_lucro_decimal',`impostos` = '$impostos_decimal',`preco` = '$preco',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`margem_lucro_informada` = '$margem_lucro',`impostos_informado` = '$impostos',`nome_produto` = '$nome_produto',`fornecedor` = '$fornecedor',`travesseiro1` = '$travesseiro1',`travesseiro2` = '$travesseiro2',`margem_folga` = '$margem_folga',`margem_folga_decimal` = '$margem_folga_decimal',`descontomaximo` = '$descontomaximo',`impostos_compra` = '$impostos_compra',`impostos_compra_decimal` = '$impostos_compra_decimal' where `produtos`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao) or die("Erro ao gravar dados");


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

<body>
<p>       
</p>
<table width="100%" border="0">
  <tr>
    <td width="20%"><div align="center">
      <form name="form1" method="post" action="selecione_categoria%20e%20sub_categoria_para_edicao.php">
        <input type="submit" name="Submit" value="Voltar">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
      </form>
    </div></td>
    <td width="21%"><div align="center">
      <form name="form1" method="post" action="editar.php">
        <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>">
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
        <input type="submit" name="Submit2" value="Continuar editando produto">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
      </form>
    </div></td>
    <td width="26%"><div align="center"></div></td>
    <td width="16%"><div align="center"></div></td>
    <td width="17%"><div align="center"></div></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>