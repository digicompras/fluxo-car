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
<title>Exclus&atilde;o de produtos</title>
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
.style2 {
	color: #0000FF;
	font-weight: bold;
}
.style3 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style></head>

<body>
<p>        
<?



require '../../conect/conect.php';

$nome_produto = $_POST['nome_produto'];


?>
</p>
<form name="form1" method="post" action="menu.php">
  <input type="submit" name="Submit2" value="Voltar">
  <span class="style1">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  </span>
</form>
<div align="center" class="style3">ATEN&Ccedil;&Atilde;O!!!... VOC&Ecirc; TEM CERTEZA QUE DESEJA EXCLUIR PRODUTO(S)? </div>
<form action="lista_todos_produtos_para_exclusao.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
    <tr>
      <td width="33%">Informe o nome ou parte dele para edi&ccedil;&atilde;o <br></td>
      <td width="33%"><input name="nome_produto" type="text" id="nome_produto" value="<? echo $nome_produto; ?>" size="40"></td>
      <td width="34%"><input type="submit" name="Submit3" value="Buscar para Excluir">
          <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span></td>
    </tr>
  </table>
</form>
<p></p>
<table width="100%"  border="1">
  <tr>
    <td><div align="center" class="style2">C&oacute;digo</div></td>
    <td><div align="center" class="style2">Nome do Produto </div></td>
    <td><div align="center" class="style2">Fornecedor</div></td>
    <td><div align="center" class="style2">Grupo</div></td>
    <td><div align="center" class="style2">Sub-Grupo</div></td>
  </tr>
  <?
if(empty($nome_produto)) {
echo "Digite o nome do produto ou parte dele na caixa acima e clique em buscar para executar sua pesquisa.";

}else{	  
$sql = "select * from produtos where nome_produto like '$nome_produto%' order by nome_produto asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$referencia = $linha[0];
$foto = $linha[1];
$material = $linha[2];
$cor = $linha[3];
$categoria = $linha[4];
$sub_categoria = $linha[5];
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

?>
  <tr>
    <td width="17%"><form name="form1" method="post" action="excluir_produto.php">
        <div align="center">
          <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo; ?>">
          <input type="submit" name="Submit4" value="<? echo $codigo; ?> - Excluir">
        </div>
    </form></td>
    <td width="31%"><div align="center"><? echo $nome_produto; ?></div></td>
    <td width="17%"><div align="center"><? echo $fornecedor; ?></div></td>
    <td width="18%"><div align="center"><? echo $categoria; ?></div></td>
    <td width="17%"><div align="center"><? echo $sub_categoria; ?></div></td>
  </tr>
<? }} ?>
</table>
<p>&nbsp;</p>
</body>
</html>
