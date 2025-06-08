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
<title>Edi&ccedil;&atilde;o de produtos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {
	color: #0000FF;
	font-weight: bold;
	font-size: 24px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>

<body>
<p><?
require '../../../conect/conect.php';
?>

</p>
<p class="style2">Exclus&atilde;o de categoria de receita </p>
<form name="form1" method="post" action="categorias_insert.php">
  <input type="submit" name="Submit2" value="Voltar">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<p>&nbsp;</p>
<form action="excluir_categoria.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
    <tr>
      <td width="35%">Selecione o c&oacute;digo. da categoria a ser exclu&iacute;da<br></td>
      <td width="25%"><select name="codigo" id="select4">
        <option value="null" selected>Selecione
        <?


    $sql = "select * from categorias_receitas order by codigo";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['codigo']. ">".$x['codigo']."</option>";
    }
?>
        </option>
      </select></td>
      <td width="40%"><input type="submit" name="Submit" value="Excluir"></td>
    </tr>
  </table>
</form>
<table width="60%" border="0">
  <tr>
    <td>Filtrar por categoria</td>
    <td colspan="2"><form name="form5" method="post" action="selecione_codigo_exclusao_categoria.php">
      <select name="categoria_pequisar" id="categoria_pequisar">
        <option selected></option>
        <?


    $sql = "select * from categorias_receitas group by categoria order by categoria asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>";
    }
?>
        </select>
      <input type="submit" name="button2" id="button2" value="Buscar">
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?

$categoria_pequisar = $_POST['categoria_pequisar'];

$sql = "select * from categorias_receitas where categoria = '$categoria_pequisar' order by categoria asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha{'0'};
$categoria = $linha{'1'};
$departamento = $linha{'2'};

?>
  <tr>
    <td width="21%"><div align="center">Codigo</div></td>
    <td width="24%"><div align="center">Categoria</div></td>
    <td width="22%"><div align="center">Departamento</div></td>
    <td width="15%"><div align="center">#</div></td>
    <td width="18%"><div align="center"></div></td>
  </tr>
  <form name="form2" method="post" action="excluir_categoria.php">
    <tr>
      <td><div align="center"><? echo $codigo; ?>
        <input name="codigo2" type="hidden" id="codigo" value="<? echo $codigo; ?>">
      </div></td>
      <td><div align="center"><? echo $categoria; ?></div></td>
      <td><div align="center"><? echo $departamento; ?></div></td>
      <td><div align="center">
        <input type="submit" name="button" id="button" value="Editar">
      </div></td>
      <td><div align="center"></div></td>
    </tr>
  </form>
  <? } ?>
</table>
<p>&nbsp;</p>
</body>
</html>
