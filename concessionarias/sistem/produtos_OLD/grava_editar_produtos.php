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




//require('file:///F|/webs/pedcell/conexao.php') or die("Erro ao incluir arquivo");
require '../../conect/conect.php';
ini_set( 'display_errors', 0 );


$codigo = $_POST['codigo'];


$categoria = $_POST['categoria'];


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
$preco = $_POST['preco'];

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

?>



<?
//---------------------VALIDACAO DOS CAMPOS--------------------------------------------------


if((empty($categoria)) or (empty($classe)) or (empty($departamento))){ ?>

<script>

alert("ATENÇÃO!!!...\n                  <? echo "$operador"; ?> \n\nCAMPOS COM (*) SÃO OBRIGATORIOS! VERIFIQUE QUAL DOS CAMPOS OBRIGATORIOS ESTA SEM PREENCHER, VOCÊ DEVE PREENCHER TODOS PARA PROSSEGUIR COM O CADASTRO!. \n\n Categoria* --->> <? echo "$categoria"; ?> \n Classe* --->> <? echo "$classe"; ?> \n Departamento* --->> <? echo "$departamento"; ?> ");

window.location = "editar.php?categoria=<? echo "$categoria"; ?>&classe=<? echo "$classe"; ?>&departamento=<? echo "$departamento"; ?>&codigo=<? echo "$codigo"; ?>";

</script>

<?



}
else{
	
if(($classe=="E") && ($departamento=="Todos")){ ?>

<script>

alert("ATENÇÃO!!!...\n                  <? echo "$operador"; ?> \n\nVOCE INFORMOU QUE A CLASSE É EXCLUSIVA (E), PORTANTO DEVE-SE DEFINIR APENAS UM DEPARTAMENTO!. \n\n Categoria* --->> <? echo "$categoria"; ?> \n Classe* --->> <? echo "$classe"; ?> \n Departamento* --->> <? echo "$departamento"; ?> ");

window.location = "editar.php?categoria=<? echo "$categoria"; ?>&classe=<? echo "$classe"; ?>&departamento=<? echo "$departamento"; ?>&codigo=<? echo "$codigo"; ?>";

</script>


<?

}
else{
//-------------------FIM DA VALIDACAO DOS CAMPOS--------------------------------


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;
$reg++;



$comando = "update `$linha[1]`.`produtos` set `codigo` = '$codigo',`cod_barras` = '$cod_barras',`referencia` = '$referencia',`material` = '$material',`cor` = '$cor',`categoria` = '$categoria',`sub_categoria` = '$sub_categoria',`descricao` = '$descricao',`quant_estoque` = '$quant_estoque',`expedicao` = '$expedicao',`quant_disponivel` = '$quant_disponivel',`quant_minima` = '$quant_minima',`aparecer_site` = '$aparecer_site',`preco_compra` = '$preco_compra',`frete` = '$frete',`margem_lucro` = '$margem_lucro_decimal',`impostos` = '$impostos_decimal',`preco` = '$preco',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta',`margem_lucro_informada` = '$margem_lucro',`impostos_informado` = '$impostos',`nome_produto` = '$nome_produto',`fornecedor` = '$fornecedor',`travesseiro1` = '$travesseiro1',`travesseiro2` = '$travesseiro2',`margem_folga` = '$margem_folga',`margem_folga_decimal` = '$margem_folga_decimal',`descontomaximo` = '$descontomaximo',`classe` = '$classe',`departamento` = '$departamento',`impostos_compra` = '$impostos_compra',`impostos_compra_decimal` = '$impostos_compra_decimal' where `produtos`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao) or die("Erro ao gravar dados");


echo "Produto alterado no banco de dados com sucesso<br>";


}
}
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
<form name="form1" method="post" action="selecione_categoria%20e%20sub_categoria_para_edicao.php">
  <input type="submit" name="Submit" value="Voltar">
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