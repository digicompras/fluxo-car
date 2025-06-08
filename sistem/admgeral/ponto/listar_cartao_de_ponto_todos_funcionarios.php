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
.style3 {font-size: 18px; }

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

      <form name="form1" method="post" action="menu.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit2" value="Voltar">

</form>

<p>

        

</p>

<table width="100%"  border="1" align="center" bordercolor="#000000">



        <tr>

          <td colspan="11"></td>
        <tr>
          <td width="7%">&nbsp;</td>
          <td width="7%">&nbsp;</td>
          <td width="7%">&nbsp;</td>
          <td width="4%">&nbsp;</td>
          <td colspan="4"><div align="center"><strong>HOR&Aacute;RIO</strong></div></td>
          <td><div align="center"><strong>HORAS EXTRAS</strong></div></td>
          <td><div align="center"><strong>FALTAS</strong></div></td>
          <td width="17%">&nbsp;</td>
        <tr>
          <td><div align="center"><strong>NOME</strong></div></td>
          <td>&nbsp;</td>
          <td><div align="center"><strong>Dia Semana</strong></div></td>
          <td><div align="center"><strong>Data</strong></div></td>
          <td width="6%"><div align="center"><strong>Entrada</strong></div></td>
          <td width="6%"><div align="center"><strong>Sa&iacute;da Almo&ccedil;o</strong></div></td>
          <td width="6%"><div align="center"><strong>Entrada Almo&ccedil;o</strong></div></td>
          <td width="7%"><div align="center"><strong>Sa&iacute;da Tarde</strong></div></td>
          <td width="5%"><div align="center"><strong>Total H.E</strong></div></td>
          <td width="6%"><div align="center"><strong>Total H.F.D.</strong></div></td>
          <td><div align="center"><strong>Observa&ccedil;&otilde;es</strong></div></td>
          </tr>
<?

$mes_ano = $_POST['mes_ano'];
			

$sql = "SELECT * FROM ponto where mes_ano = '$mes_ano' group by nome order by nome asc ";

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
          <td><div align="center" class="style3">
            <form action="listar_cartao_de_ponto_por_funcionario_blank.php" method="post" name="form2" target="_blank">
              <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
              <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo $mes_ano; ?>">
<input type="submit" name="button" id="button" value="<? echo $nome; ?>">
                        </form>
            </div></td>
          <td><div align="center">
            <form name="form3" method="post" action="editar_cartao_ponto.php">
              <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
              <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo $mes_ano; ?>">
              <input type="submit" name="button2" id="button2" value="Editar">
            </form>
          </div></td>
          <td><div align="center" class="style3"><? echo $dia_semana; ?></div></td>
          <td><div align="center" class="style3"> <? echo $data; ?></div></td>
          <td><div align="center" class="style3"><? echo $ent_m; ?></div></td>
          <td><div align="center" class="style3"><? echo $sai_m; ?></div></td>
          <td><div align="center" class="style3"><? echo $ent_t; ?></div></td>
          <td><div align="center" class="style3"><? echo $sai_t; ?></div></td>
          <td><div align="center" class="style3"><? echo $quant_horas; ?></div></td>
          <td><div align="center" class="style3"><? echo $quant_horas_faltas_d; ?></div></td>
          <td><div align="center" class="style3"><? echo $obs; ?></div></td>
          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
          <? } ?>
</table>

<p>&nbsp;          </p>

<p>&nbsp;</p>

</body>

</html>

