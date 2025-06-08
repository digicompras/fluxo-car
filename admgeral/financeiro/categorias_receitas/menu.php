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
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td colspan="2">
        <?
//SE CONECTA AO BANCO DE DADOS DIGICOMPRAS
require '../../../conect/conect.php';
?>

</td>
    </tr>
    <tr>
      <td width="26%">&nbsp;</td>
      <td width="74%"><strong><font color="#0000FF" size="4">O que deseja fazer com as categorias de receitas?</font></strong></td>
    </tr>
    <tr>
      <td><form name="form4" method="post" action="../principal.php">
        <input type="submit" name="Submit4" value="Voltar ao menu Financeiro">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form1" method="post" action="categorias_insert.php">
        <input type="submit" name="Submit" value="Inserir categoria ">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </form></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form2" method="post" action="editar_categorias.php">
        <input type="submit" name="Submit2" value="Editar categoria ">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </form></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form3" method="post" action="selecione_codigo_exclusao_categoria.php">
        <input type="submit" name="Submit3" value="Excluir categoria ">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </form></td>
    </tr>
  </table>
    <table width="60%" border="0">
      <tr>
        <td>Filtrar por categoria</td>
        <td colspan="2"><form name="form5" method="post" action="menu.php">
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
</body>
</html>
