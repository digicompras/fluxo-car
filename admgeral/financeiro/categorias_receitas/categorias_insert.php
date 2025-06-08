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
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name="form1" method="post" action="menu.php">
  <input type="submit" name="Submit3" value="Voltar">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<form action="grava_categoria.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td colspan="3"><?
//SE CONECTA AO BANCO DE DADOS DIGICOMPRAS
require '../../../conect/conect.php';
?>

</td>
    </tr>
    <tr>
      <td width="11%">&nbsp;</td>
      <td colspan="2"><strong><font color="#0000FF" size="4">Tela de cadastro de Categorias de receitas!</font></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><font color="#0000FF"><strong><font color="#0000FF">Categoria</font></strong></font></td>
      <td>Departamento</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td width="18%"><input name="categoria" type="text" id="categoria"></td>
      <td width="71%"><select name="departamento" id="departamento">
        <option selected></option>
        <?


    $sql = "select * from departamentos where qualificacao = 'R' order by departamento asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['departamento']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="2"><input type="submit" name="Submit" value="Gravar Categoria">
      <input type="reset" name="Submit2" value="Limpar"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</form>
<td>&nbsp;</td>
<p>
  
</p>
<table width="60%" border="0">
  <tr>
    <td>Filtrar por categoria</td>
    <td><form name="form5" method="post" action="categorias_insert.php">
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
  <form name="form2" method="post" action="categoria.php">
    <tr>
      <td><div align="center"><? echo $codigo; ?>
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
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
<p>&nbsp; </p>
<p>&nbsp; </p>
</body>

</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>

