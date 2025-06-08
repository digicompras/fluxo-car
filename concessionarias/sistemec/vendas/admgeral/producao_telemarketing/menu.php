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

      <td colspan="2"><?

//require("conect/conect.php"); or die("erro na requisição");

require '../../conect/conect.php';

error_reporting(E_ALL);

?>

</td>
    </tr>

    <tr>

      <td width="23%">&nbsp;</td>

      <td width="77%"><font color="#0000FF"><strong>RELAT&Oacute;RIO DE PRODU&Ccedil;&Atilde;O DE TELEMARKETING</strong></font> </td>
    </tr>

    <tr>

      <td><form action="../principal.php" method="post" name="form1" target="_top">
        <input type="submit" name="Submit" value="Voltar ao menu principal">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      </form></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
    </tr>



    <tr>

      <td><div align="center"></div></td> 

      <td><form name="form4" method="post" action="mapa_producao.php">

        <strong>        
<select name="dia_inicial" id="mes_pagto">
  <?





    $sql = "select * from telemarketing group by dia_abertura order by dia_abertura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_abertura']."</option>";

    }

?>
</select>
<select name="mes_inicial" id="select10">

          <?





    $sql = "select * from telemarketing group by mes_abertura order by mes_abertura asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_abertura']."</option>";

    }

?>
        </select>
<select name="ano_inicial" id="mes_abertura">
  <?





    $sql = "select * from telemarketing group by ano_abertura order by ano_abertura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_abertura']."</option>";

    }

?>
</select>
        </strong>

        at&eacute; <strong>
        <select name="dia_final" id="dia_inicial">
          <?





    $sql = "select * from telemarketing group by dia_abertura order by dia_abertura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_abertura']."</option>";

    }

?>
                </select>
        <select name="mes_final" id="mes_inicial">
          <?





    $sql = "select * from telemarketing group by mes_abertura order by mes_abertura asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_abertura']."</option>";

    }

?>
                </select>
        <select name="ano_final" id="ano_inicial">
          <?





    $sql = "select * from telemarketing group by ano_abertura order by ano_abertura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_abertura']."</option>";

    }

?>
                </select>
        </strong>
        <input type="submit" name="Submit42" value="Mapa de Produ&ccedil;&atilde;o de Telemarketing">

      </form></td>
    </tr>
  </table>

<p>&nbsp; </p>

</body>

</html>

