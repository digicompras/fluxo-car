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

<title>Trocar foto n&ordm; 1</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body>

<?







require '../../conect/conect.php';



?>

<br>

<? 

$vg = $_GET['chamar'];





$codigo = $vg;









 ?></p>

<form name="form1" method="post" action="menu.php">

  <input type="submit" name="Submit3" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form>

<form action="atualizar_arte.php" method="post" enctype="multipart/form-data" name="form1">


  <table width="100%"  border="0">


      <tr>

        <td width="35%">Imagem Atual 1<br><?
$sql = "select * from publicidade where posicao = '1' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo1 = $linha[0];
$posicao1 = $linha[1];
$imagem1 = $linha[2];


}

	  
	   if($posicao1==1){echo "<a href='../../publicidade/$imagem1' target='_blank'><img src='../../publicidade/$imagem1' border='0' width='300'></a>"; } ?></td>
        <td width="47%">Escolha a nova arte 1 para publicar no site!<br>
<input name="imagem" type="file" id="imagem">
          <font color="#0000FF" size="4">
          <input name="posicao1" type="hidden" id="posicao1" value="1">
          </font></td>
        <td width="18%">&nbsp;</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Atualizar"></td>
      <td>&nbsp;</td>
    </tr>
  </table>



</form>

<form action="atualizar_arte2.php" method="post" enctype="multipart/form-data" name="form1">


  <table width="100%"  border="0">
    <tr>

      <td width="35%">Imagem Atual 2<br><?
$sql = "select * from publicidade where posicao = '2' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo2 = $linha[0];
$posicao2 = $linha[1];
$imagem2 = $linha[2];


}

	  
	   if($posicao2==2){echo "<a href='../../publicidade/$imagem2' target='_blank'><img src='../../publicidade/$imagem2' border='0' width='300'></a>"; } ?></td>

      <td width="47%">Escolha a nova arte 2 para publicar no site!<br>
<input name="imagem2" type="file" id="imagem2">
        <input name="posicao2" type="hidden" id="posicao2" value="2"></td>

      <td width="18%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Atualizar"></td>
      <td>&nbsp;</td>
    </tr>
  </table>



</form>


<form action="atualizar_arte3.php" method="post" enctype="multipart/form-data" name="form1">


  <table width="100%"  border="0">
    <tr>
      <td width="35%">Imagem Atual 3<br><?
$sql = "select * from publicidade where posicao = '3' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo3 = $linha[0];
$posicao3 = $linha[1];
$imagem3 = $linha[2];


}

	  
	   if($posicao3==3){echo "<a href='../../publicidade/$imagem3' target='_blank'><img src='../../publicidade/$imagem3' border='0' width='300'></a>"; } ?></td>
      <td width="47%">Escolha a nova arte 3 para publicar no site!<br>
<input name="imagem3" type="file" id="imagem3">
        <input name="posicao3" type="hidden" id="posicao3" value="3"></td>
      <td width="18%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Atualizar"></td>
      <td>&nbsp;</td>
    </tr>
  </table>



</form>


</body>

</html>

