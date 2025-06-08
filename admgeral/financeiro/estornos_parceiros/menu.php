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

<style type="text/css">

<!--

.style1 {	color: #0000FF;

	font-weight: bold;

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



<?



require '../../../conect/conect.php';

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$hoje = date('d-m-Y');

	



		

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); } ?>"



<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="../background/<? printf("$linha[1]"); } ?>" bgproperties="fixed">

  

  <table width="96%" border="0" cellspacing="10">

    <tr>

      <td colspan="3"><?

error_reporting(E_ALL);



?>





<?

$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estabelecimento_op = $linha[24];

$cidade_estabelecimento_op = $linha[25];

$tel_estabelecimento_op = $linha[26];

$email_estabelecimento_op = $linha[27];

$funcao = $linha[43];

$estab_pertence_op = $linha[44];

$cidade_estab_pertence_op = $linha[45];

$tel_estab_pertence_op = $linha[46];

$email_estab_pertence_op = $linha[47];

}





?>












      </td>

    </tr>

    <tr>

      <td colspan="3"><strong><font color="#0000FF" size="4"><span class="style1"><? echo $nome_op; ?></span> Voc&ecirc; est&aacute; em lan&ccedil;amentos de estornos de parceiros!</font></strong></td>

    </tr>

    <tr>

      <td><form name="form1" method="post" action="../principal.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit22" value="Voltar ao menu principal">

      </form></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td width="31%"><form name="form5" method="post" action="lancamentos_debitos.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?><?







  echo'<input type="submit" name="Submit" value="Lançamentos de Estornos Parceiros">';


		

		?>

      </form></td>

      <td width="36%">&nbsp;</td>
      <td width="33%">&nbsp;</td>
    </tr>

    <tr>

      <td>&nbsp;</td>
      <td colspan="2" valign="top">&nbsp;</td>
    </tr>

    <tr>

      <td>&nbsp;</td>
      <td colspan="2" valign="top">&nbsp;</td>
    </tr>

    <tr>

      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2">&nbsp;</td>

    </tr>

  </table>

<p>&nbsp; </p>

</body>

</html>

