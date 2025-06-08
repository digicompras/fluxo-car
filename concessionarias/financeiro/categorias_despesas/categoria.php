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

<p class="style2">Altera&ccedil;&atilde;o de nome de categoria de despesa. </p>

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

          <td width="25%">

<?



$codigo = $_POST['codigo'];



$sql = "SELECT * FROM categorias_despesas where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg++;


$codigo = $linha[0];
$categoria = $linha[1];
$departamento = $linha[2];





?></td>

          <td width="18%"><input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>"></td>

          <td width="57%">&nbsp;</td>

        </tr>

        <tr>
          <td height="40">&nbsp;</td>
          <td>Categoria</td>
          <td>Departamento</td>
        </tr>
        <tr>

          <td height="40">&nbsp;</td>

          <td><input name="categoria" type="text" id="categoria" value="<? echo $categoria; ?>">
          <input name="categoria_old" type="hidden" id="categoria_old" value="<? echo $categoria; ?>"></td>

          <td><select name="departamento" id="departamento">
            <option selected><? echo $departamento; ?></option>
            <?


    $sql = "select * from departamentos where qualificacao = 'D' order by departamento asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['departamento']."</option>";
    }
?>
          </select>
          <input name="departamento_old" type="hidden" id="departamento_old" value="<? echo $departamento; ?>"></td>

        </tr>

        <tr>

          <td height="40">&nbsp;</td>

          <td><input type="submit" name="Submit2" value="Atualizar"></td>

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

        <tr>

        </tr>

  </table>

</form>
<p>&nbsp;</p>

</body>

</html>

