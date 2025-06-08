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


$preco_compra = $linha[21];
$margem_lucro = $linha[25];
$impostos = $linha[26];
$frete_cadastrado = $linha[22];

$travesseiro1 = $linha[29];
$travesseiro2 = $linha[30];

$margem_folga = $linha[32];

$impostos_compra = $linha[35];


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


if($preco_compra_atual<=$preco_compra){
	
	
	
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
	
	
	
	
if($categoria_cadastrada=="COLCHOES"){
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

	
	
	
	
	
	
$preco_compra = $preco_compra_atual;


$frete_decimal = $frete_cadastrado/100;


if(($margem_lucro>="1") && ($margem_lucro<="500")){
	
	
$margem_lucro_decimal = bcdiv($margem_lucro,100,4);


}

$impostos_decimal = bcsub(100,$impostos,4)/100;

$impostos_compra_decimal = bcsub(100,$impostos_compra,4)/100;

$impostos_de_compra_decimal = bcdiv($impostos_compra,100,4);

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

$sub_preco = bcmul($subtotal_preco,$margem_folga_decimal,2);

$preco = bcadd($sub_preco,$total_preco_travesseiros,2);
	
}
else{
	
$sub_preco = bcmul($subtotal_preco,$margem_folga_decimal,2);

	
$preco = bcadd($subtotal_preco,$sub_preco,2);

}

//----------------fim da etapa 4 calculo para mergem de desconto-----------------





$comando = "insert into estoque_entrada(data_entrada,hora_entrada,fornecedor,nf,data_nf,nome_produto,categoria,unidade,quantidade,preco_compra,obs) 
values('$data','$hora','$fornecedor','$nf','$data_nf','$nome_produto','$categoria_cadastrada','$unidade','$quantidade','$preco_compra','$obs')";

mysql_query($comando,$conexao) or die("Erro ao gravar entrada no estoque!");


echo "Entrada no estoque do produto realizada com sucesso!<br><br>";



$totaliza_quantidade = bcadd($quant_estoque,$quantidade);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`produtos` set `codigo` = '$codigo',`quant_estoque` = '$totaliza_quantidade',`preco_compra` = '$preco_compra',`preco` = '$preco',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta' where `produtos`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao);





}
?>
</span>
</p>
<table width="100%" border="0">
  <tr>
    <td width="18%"><div align="center">
      <form name="form1" method="post" action="menu.php">
        <input type="submit" name="Submit" value="Voltar">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
      </form>
    </div></td>
    <td width="22%"><div align="center">
      <form name="form1" method="post" action="../produtos/editar.php">
        <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>">
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
        <input type="submit" name="Submit2" value="Editar produto">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
      </form>
    </div></td>
    <td width="23%"><div align="center"></div></td>
    <td width="19%"><div align="center"></div></td>
    <td width="18%"><div align="center"></div></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="12%"><form name="form1" method="post" action="escolha_de_categoria.php">
      <input type="submit" name="Submit3" value="Voltar">
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