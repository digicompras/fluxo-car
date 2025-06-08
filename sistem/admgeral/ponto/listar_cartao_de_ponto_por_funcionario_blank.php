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

<title>LISTANDO CARTÃO DE PONTO DO FUNCIONÁRIO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style2 {

	color: #0000FF;

	font-weight: bold;

}
.style7 {font-size: 8px; }

-->

</style>

</head>

<?



require '../../conect/conect.php';





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

      <table width="100%"  border="0">

        <tr>

          <td><div align="center"><span class="style2">

            <?

$nome = $_POST['nome'];

$mes_ano = $_POST['mes_ano'];



$sql = "SELECT * FROM ponto where nome = '$nome' and mes_ano = '$mes_ano' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$nome = $linha[1];







?>

          Exibindo cart&atilde;o de ponto do funcion&aacute;rio:</span> <span class="style2"><? printf("$linha[1]"); ?><? } ?></span></div></td>

        </tr>

</table>

      <p>

        <?

$sql = "SELECT * FROM operadores where nome = '$nome'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;



$nome_operador = $linha[1];

$funcionario = $linha[42];

$funcao = $linha[43];

}

?>

      </p>

<table width="100%"  border="1" align="center" bordercolor="#000000">

        <tr>

          <td colspan="4"><p><strong>NOME: <? echo $nome_operador; ?></strong></p>              </td>
          <td colspan="3"><strong>FUN&Ccedil;&Atilde;O: <? echo $funcao; ?></strong></td>
          <td>&nbsp;</td>
          <td><strong>M&Ecirc;S: <? echo $mes_ano; ?> </strong></td>
        </tr>

        <tr>
          <td width="7%">&nbsp;</td>
          <td width="4%">&nbsp;</td>
          <td colspan="4"><div align="center"><strong>HOR&Aacute;RIO</strong></div></td>
          <td><div align="center"><strong>HORAS EXTRAS</strong></div></td>
          <td><div align="center"><strong>FALTAS</strong></div></td>
          <td width="17%">&nbsp;</td>
        <tr>
          <td><div align="center"><strong>Dia Semana</strong></div></td>
          <td><div align="center"><strong>Data</strong></div></td>
          <td width="6%"><div align="center"><strong>Entrada</strong></div></td>
          <td width="6%"><div align="center"><strong>Sa&iacute;da Almo&ccedil;o</strong></div></td>
          <td width="6%"><div align="center"><strong>Entrada Almo&ccedil;o</strong></div></td>
          <td width="7%"><div align="center"><strong>Sa&iacute;da Tarde</strong></div></td>
          <td width="6%"><div align="center"><strong>Total H.E.D.</strong></div></td>
          <td width="6%"><div align="center"><strong>Total H.F.D.</strong></div></td>
          <td><div align="center"><strong>Observa&ccedil;&otilde;es</strong></div></td>
          </tr>
<?

			

$sql = "SELECT * FROM ponto where nome = '$nome_operador' and mes_ano = '$mes_ano' order by data asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];
$nome = $linha[1];
$data = $linha[2];
$ent_m = $linha[3];
$sai_m = $linha[4];
$ent_t = $linha[5];
$sai_t = $linha[6];
$ent_e = $linha[7];
$sai_e = $linha[8];
$obs = $linha[9];
$mes_ano = $linha[10];
$dia_semana = $linha[11];

$hi = $linha[19];
$mi = $linha[20];
$si = $linha[21];

$ht = $linha[22];
$mt = $linha[23];
$si = $linha[24];

$quant_horas_reais = $linha[25];
$quant_horas = $linha[26];
$valor_hora_normal = $linha[27];
$valor_hora_extra = $linha[28];
$total = $linha[29];
$acrescimo = $linha[30];
$salario = $linha[31];
$quant_horas_faltas_n = $linha[32];
$quant_horas_faltas_d = $linha[33];
$valor_total_horas_faltas = $linha[34];



?>

        <tr>
          <td><div align="center" class="style7"><? echo $dia_semana; ?></div></td>
          <td><div align="center" class="style7"> <? echo $data; ?></div></td>
          <td><div align="center" class="style7"><? echo $ent_m; ?></div></td>
          <td><div align="center" class="style7"><? echo $sai_m; ?></div></td>
          <td><div align="center" class="style7"><? echo $ent_t; ?></div></td>
          <td><div align="center" class="style7"><? echo $sai_t; ?></div></td>
          <td><div align="center" class="style7"><? echo $quant_horas; ?></div></td>
          <td><div align="center" class="style7"><? echo $quant_horas_faltas_d; ?></div></td>
          <td><div align="center" class="style7"><? echo $obs; ?></div></td>
          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
          <? } ?>
        <tr>
          <td colspan="6" rowspan="4" valign="bottom">Ass:</td>
          <td><div align="center"><strong>Total</strong></div></td>
          <td><div align="center"><strong>Total</strong></div></td>
          <td rowspan="4">&nbsp;</td>
        <tr>
          <td><div align="center" class="style7">
          <?

$sql = "select sum(quant_horas) as total_horas_extras from ponto where nome = '$nome_operador' and mes_ano = '$mes_ano'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$total_horas_extras_d = $linha['total_horas_extras'];



echo $total_horas_extras_d;

?></div></td>
          <td><div align="center" class="style7">
            <?

$sql = "select sum(quant_horas_faltas_d) as total_horas_faltas from ponto where nome = '$nome_operador' and mes_ano = '$mes_ano'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$total_horas_faltas_d = $linha['total_horas_faltas'];



echo $total_horas_faltas_d;

?></div></td>
        <tr>
          <td><div align="center"><strong>
          <? if($total_horas_extras_d>$total_horas_faltas_d){ echo "Saldo"; }  ?>
          </strong></div></td>
          <td><div align="center"><strong>
          <? if($total_horas_faltas_d>$total_horas_extras_d){ echo "Saldo"; }  ?>
          </strong></div></td>
        <tr>
          <td><div align="center" class="style7">
          <?
		  
$saldo_horas_extras = bcsub($total_horas_extras_d,$total_horas_faltas_d,2);

if($saldo_horas_extras<="-0.01"){

//echo $saldo_horas_extras*-1;

}
else{

echo $saldo_horas_extras;


}
		  
		  ?></div></td>
          <td><div align="center" class="style7">
          
          <?
		  
$saldo_horas_faltas = bcsub($total_horas_faltas_d,$total_horas_extras_d,2);

if($saldo_horas_faltas<="-0.01"){

//echo $saldo_horas_extras*-1;

}
else{

echo $saldo_horas_faltas;


}
		  
		  ?></div></td>
</table>

<p>&nbsp;          </p>

<p>&nbsp;</p>

</body>

</html>

