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

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?



require '../../conect/conect.php';

$nome = $_POST['nome'];

$data = $_POST['data'];

$date = $_POST['date'];


$mes_ano = date('m-y');

$codigo_ponto = $_POST['codigo_ponto'];





$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

<body bgcolor="#<? printf("$linha[1]"); ?>" 

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

background="../background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

<? } ?>





<?

$codigo = $_POST['codigo'];





$sql = "SELECT * FROM ponto where codigo = '$codigo'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;





$codigo= $linha[0];

$nome= $linha[1];

$data= $linha[2];

$ent_m= $linha[3];

$sai_m= $linha[4];

$ent_t= $linha[5];

$sai_t= $linha[6];

$ent_e = $linha[7];

$sai_e = $linha[8];

$obs = $linha[9];

//$mes_ano = $linha[10];

$dia_semana = $linha[11];

$date = $linha[12];

$atestado_m = $linha[39];

$atestado_t = $linha[40];


}



?>

<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input name="codigo_ponto2" type="hidden" id="codigo_ponto2" value="<? echo $codigo_ponto; ?>">

  <input class='class01' type="submit" name="Submit" value="Voltar">

</form>

<p>&nbsp;</p>

<form name="form2" method="post" action="grava_editar_codigo_ponto.php">

  <table width="87%"  border="0">

    <tr>

      <td>&nbsp;</td>

      <td><div align="center"><strong>Nome</strong></div></td>

      <td><div align="center"><strong>Data</strong></div></td>

      <td><div align="center"><strong>Entrada Manh&atilde; </strong></div></td>

      <td><div align="center"><strong>Sa&iacute;da Manh&atilde; </strong></div></td>

      <td><div align="center"><strong>Entrada Tarde </strong></div></td>

      <td><div align="center"><strong>Sa&iacute;da Tarde </strong></div></td>

      <td><div align="center"><strong>ATESTADO</strong></div></td>
      <td><div align="center"><strong>Observa&ccedil;&otilde;es</strong></div></td>
    </tr>

    <tr>

      <td width="6%"><input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
      <input name="date" type="hidden" id="date" value="<? echo $date; ?>">
      <input name="dia_semana" type="hidden" id="dia_semana" value="<? echo $dia_semana; ?>"></td>

      <td width="20%"><? echo $nome; ?>
      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>"></td>

      <td width="8%"><div align="center"><? echo $data; ?></div></td>

      <td width="10%"><div align="center">
        <input class='class02' name="ent_m" type="text" id="ent_m" value="<? echo $ent_m; ?>" size="10" maxlength="10">
      </div></td>

      <td width="9%"><div align="center">
        <input class='class02' name="sai_m" type="text" id="sai_m" value="<? echo $sai_m; ?>" size="10" maxlength="10">
      </div></td>

      <td width="10%"><div align="center">
        <input class='class02' name="ent_t" type="text" id="ent_t" value="<? echo $ent_t; ?>" size="10" maxlength="10">
      </div></td>

      <td width="8%"><div align="center">
        <input class='class02' name="sai_t" type="text" id="sai_t" value="<? echo $sai_t; ?>" size="10" maxlength="10">
      </div></td>

      <td width="8%"><div align="center">
        <input type="hidden" name="atestado_m" id="atestado_m">
        <select class='class02' name="atestado_t" id="atestado_t">
          <option selected><? echo $atestado_t; ?></option>
          <option>Sim</option>
          <option>N&atilde;o</option>
        </select>
      </div></td>
      <td width="13%"><div align="center">
        <input class='class02' name="obs" type="text" id="obs" value="<? echo $obs; ?>">
      </div></td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
      <td><input class='class01' type="submit" name="Submit2" value="Atualizar"></td>
    </tr>
  </table>

</form>

<p>&nbsp;</p>

  <p>&nbsp;</p>

</body>

</html>

