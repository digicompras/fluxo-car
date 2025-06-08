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

<meta name="GENERATOR" content="Microsoft FrontPage 5.0">

<meta name="ProgId" content="FrontPage.Editor.Document">

<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<title>Confirma&ccedil;&atilde;o de exclus&atilde;o de Imagens</title>

<style type="text/css">

<!--

.style1 {color: #0000FF}

.style3 {

	color: #0000FF;

	font-weight: bold;

	font-size: 14px;

}

.style5 {

	color: #FF0000;

	font-weight: bold;

	font-size: 18px;

}

.style8 {color: #000000}

-->

</style>

</head>



<body topmargin="0" leftmargin="0">



<p>

  <?



require '../../conect/conect.php';



?>

</p>

<p align="left">

  <?

  $vg = $_GET['chamar'];





$codigo = $vg;

?>

  <span class="style5">Confirma&ccedil;&atilde;o de exclus&atilde;o da arte publicit&aacute;ria! <span class="style1"></span></span></p>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
<?  

$sql = "select * from publicidade";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];
$posicao = $linha[1];
$imagem = $linha[2];


?>

  <tr>

    <td colspan="4"><form name="form1" method="post" action="menu.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit222" value="Voltar">
    </form></td>
  </tr>

  <tr>

    <td colspan="4">&nbsp;</td>
  </tr>

  <tr>

    <td colspan="2">&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>
  </tr>

  <tr>

    <td width="28%"><div align="center">Voc&ecirc; tem certeza que deseja excluir permanentemente a arte publicit&aacute;ria N&ordm; <? echo $posicao; ?>? </div></td>

    <td width="29%"><div align="center">
      <?

	  printf("<a href='../../publicidade/$imagem' target='_blank'><img src='../../publicidade/$imagem' border='0' width='200' ></a>");

	  ?>
    </div></td>
    <td width="19%"><form name="form1" method="post" action="excluir_arte.php">

      <input type="submit" name="Submit" value="Sim! Excluir">

      <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo;  ?>">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

    </form></td>

    <td width="24%">&nbsp;</td>
  </tr>
<? } ?>
</table>




          

<p><br>

</p>

</body>



</html>

