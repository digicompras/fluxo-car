<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");



?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style3 {color: #0000FF; font-weight: bold; }

-->

</style>

</head>

<?



require '../conect/conect.php';



$senha = $_SESSION['senha'];



$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];



}

$dia_atual = date('d');

$mes_atual = date('m');

$ano_atual = date('Y');
	
$ano_anterior = date('Y')-1;

$ano_posterior = date('Y')+1;

?>

<body bgcolor="#<? echo $cor; ?>"> 



<?



$sql = "SELECT * FROM operadores_for where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];

$fornecedor = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];


}

?>

<table width="100%"  border="0">

  <tr>

    <td width="22%"><strong>Nome Fantasia </strong></td>

    <td width="23%"><strong>Cidade</strong></td>

    <td width="16%"><strong>Operador</strong></td>

    <td width="24%"><strong>E-Mail</strong></td>

    <td width="11%"><strong>Data</strong></td>

  </tr><br>

  <tr>

    <td><span class="style3"><? echo $fornecedor; ?></span></td>

    <td><span class="style3"><? echo $cidade_estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $operador; ?></span></td>

    <td><span class="style3"><? echo $email_estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $data_hoje; ?></span></td>

  </tr>

</table>

<p>

  

</p>

<p>&nbsp;</p>

<div align="center"></div>

<table width="100%"  border="0">

  <tr>

    <td width="21%">&nbsp;</td>

    <td width="6%">&nbsp;</td>

    <td><form name="form1" method="post" action="orcamentos/index.php">
      <?

$senha = $_SESSION['senha'];

?>
      <input class='class01' type="submit" name="Submit" value="Or&ccedil;amentos">
      <input class='class02' name="veiculo" type="hidden" id="veiculo">
    </form></td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td colspan="2">&nbsp;</td>

    <td width="25%">&nbsp;</td>

    <td width="48%">&nbsp;</td>

  </tr>

</table>

<strong></strong>

<div align="center"></div>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>