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

//SE CONECTA AO BANCO DE DADOS DIGICOMPRAS

require '../../../conect/conect.php';

?>



</p>

<p class="style2">Altera&ccedil;&atilde;o de nome de categoria de receita. </p>

<form name="form1" method="post" action="menu.php">

  <input type="submit" name="Submit" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form>

<p>&nbsp;</p>

<form action="autalizar_categoria.php" method="post" name="form2">

  <table width="100%"  border="0">

        <tr>
          <td><?



$codigo = $_POST['codigo'];



$sql = "SELECT * FROM categorias_receitas where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg++;



$codigo = $linha{'0'};
$categoria = $linha{'1'};
$departamento = $linha{'2'};

?>
          <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>"></td>
          <td>Codigo</td>
          <td><? echo $codigo; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>

          <td width="17%">&nbsp;</td>

          <td width="17%"><div align="center">Categoria</div></td>

          <td><div align="center">Departamento</div></td>
          <td>&nbsp;</td>

        </tr>

        <tr>

          <td height="40">&nbsp;</td>

          <td><div align="center">
            <input name="categoria" type="text" id="categoria" value="<? echo $linha[1]; ?>">
            <input name="categoria_old" type="hidden" id="categoria_old" value="<? echo $linha[1]; ?>">
          </div></td>

          <td width="20%"><div align="center">
            <select name="departamento" id="departamento">
              <option selected><? echo $departamento ?></option>
              <?


    $sql = "select * from departamentos where qualificacao = 'R' order by departamento asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['departamento']."</option>";
    }
?>
            </select>
            <input name="departamento_old" type="hidden" id="departamento_old" value="<? echo $linha[1]; ?>">
          </div></td>
          <td width="46%">&nbsp;</td>

        </tr>

        <tr>

          <td height="40">&nbsp;</td>

          <td><div align="center">
            <input type="submit" name="Submit2" value="Atualizar">
          </div></td>

          <td><div align="center"></div></td>
          <td>&nbsp;</td>

        </tr>

  </table>

            <?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>



          <? } ?>



</form>

            </option>

          </select></td>

          <td width="25%">&nbsp;</td>

        </tr>
</body>

</html>

