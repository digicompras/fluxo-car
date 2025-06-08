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

<title>RELATORIO DE FALTAS DOS FUNCION&Aacute;RIOS</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style4 {font-size: 18px}

.style5 {font-size: 24px}

.style7 {

	font-size: 9px;

	font-weight: bold;

}

.style8 {font-size: 9px}

.style17 {font-size: 18px; font-weight: bold; }
.style18 {font-weight: bold}
.style19 {font-size: 10px}
.style20 {font-size: 16px}

-->

</style>
</head>

<?



require '../../conect/conect.php';


$date = date('Y-m-d');

$mes_ano = date('m-y');



$dia = date('d');

$mes = date('m');

$ano = date('Y');

$hora = date('H:i:s');



$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];





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



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>











      <p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>

      <p class="style4">&nbsp;</p>

      <table width="50%"  border="1" align="center">

        <tr bgcolor="#ffffff">

          <td><div align="center" class="style7">Nome</div></td>

          <td><div align="center" class="style8"><strong>Falta em </strong> <? echo $date; ?></div></td>

          <td><div align="center" class="style8"><strong>Total faltas do m&ecirc;s</strong></div></td>
        </tr>

            <?

	

$sql = "SELECT * FROM ponto where ent_m = 'FALTOU' and date = '$date' order by nome asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nome_operador = $linha[1];




?>            

        <tr>

          <td width="10%" align="center" valign="top"><? echo $nome_operador; ?><form action="" method="post" name="form2">
          </form>         </td>

          <td width="4%"><div align="center" class="style19"><strong><span class="style20">
            <? 	


$sql2 = "SELECT * FROM ponto where nome = '$nome_operador' and date = '$date' and ent_m = 'FALTOU'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$total_faltas_do_dia = mysql_num_rows($res2);

}

echo $total_faltas_do_dia;
  ?>
          </span></strong></div></td>

        <td width="4%"><div align="center" class="style19"><strong><span class="style20">
          <? 	


$sql3 = "SELECT * FROM ponto where nome = '$nome_operador' and mes_ano = '$mes_ano' and ent_m = 'FALTOU'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$total_faltas_do_mes = mysql_num_rows($res3);

}

echo $total_faltas_do_mes;
  ?>
        </span></strong></div></td>
</tr>

<? } ?>
</table>

<p align="center">

<?

$sql = "SELECT * FROM cad_empresa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$endereco = $linha[5];

$numero = $linha[6];

$bairro = $linha[7];

$cep = $linha[9];

$cidade = $linha[10];

$estado = $linha[11];

$telefone = $linha[12];

$fax = $linha[13];

$email_empresa = $linha[14];

$site = $linha[15];



}



?>

<br>

<span class="style4"><strong><? echo $site; ?></strong></span>

<br>

<? echo $endereco; ?>

,

<? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?>

<br>

<? echo "Telefone / Fax: ". $telefone." "; ?>

/ <? echo $fax; ?>

<br>

<? echo "E-Mail: ". $email_empresa; ?>

</p>

<p align="center"><span class="style7">

  <? echo $meta_inss; ?>

</span><span class="style4"><strong><span class="style5"><strong>

</strong></span></strong></span> </p>

</body>

</html>

