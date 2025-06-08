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

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-repeat: no-repeat;
	background-attachment: fixed;

}
.style1 {
	color: #0000FF;
	font-weight: bold;
}

-->
</style>

</head>

<?



require '../../conect/conect.php';








$num_dia = date('w');
$sql = "SELECT * FROM dias_semana where num_dia = '$num_dia' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$dia_semana = $linha[2];

}


$nome = $_POST['nome'];

$data = $_POST['data'];

$date = date('Y-m-d');

$mes_ano = date('m-Y');

$codigo_ponto = $_POST['codigo_ponto'];

$dia = date('d');
$mes = date('m');
$ano = date('Y');

?>


<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../../background/<? echo "$background"; ?>">


<?
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}
?>
<?
$sql = "SELECT * FROM hora_ponto limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$hora_limite_ponto = $linha[1];
$minuto_limite_ponto = $linha[2];
$segundo_limite_ponto = $linha[3];
}
$hora_limite_ponto = "$hora_limite_ponto:$minuto_limite_ponto:$segundo_limite_ponto";

?>


<?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {




$nome_operador = $linha[1];

$funcionario = $linha[42];

$funcao = $linha[43];

$estab_pertence = $linha[44];


}





?>
<?
//$sql = "SELECT * FROM ponto where nome = '$nome_operador' and date = '$ontem' order by date desc limit 1";

$sql = "SELECT * FROM ponto where nome = '$nome_operador' order by date desc limit 1";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);

$ultimo_registro_de_ponto = $linha[12];
$ultimodia = $linha[13];
$ultimomes = $linha[14];
$ultimoano = $linha[15];

}
//echo "registros encontrados ".$registros;


?>

<?

$sql2 = "SELECT * FROM ponto where nome = '$nome_operador' and date = '$date'";
$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {

$reg = mysql_num_rows($res2);





$codigo_ponto = $linha[0];

$nome = $linha[1];

$data = $linha[2];

$ent_m = $linha[3];

$sai_m = $linha[4];

$ent_t = $linha[5];

$sai_t = $linha[6];

$ultimate_date = $linha[12];

}

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr> 

      <td width="30%" background="../../imagens/fundocelulas1.png"><strong>Ol&aacute;! Seja bem vindo<br> </strong><strong><font color="#0000FF"><? echo $nome_operador; ?> 

        </font></strong><strong><font color="#0000FF">      </font></strong></td>

      <td width="22%" background="../../imagens/fundocelulas1.png"><strong>Hoje &eacute;:<font color="#0000FF"><? echo $dia_semana; ?></font> <font color="#0000FF">      <? echo $data; ?></font></strong></td>

      <td width="22%" background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF"> </font></strong></td>

      <td width="26%" background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF">

      </font></strong></td>
    </tr>


    <tr>

      <td background="../../imagens/fundocelulas1.png"><strong><font color="#0000FF">          </font><font color="#0000FF"> </font></strong>

        <form name="form1" method="post" action="ent_m.php">

          <strong><font color="#0000FF">



		  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

          <input name="codigo_ponto" type="hidden" id="codigo4" value="<? echo $codigo_ponto; ?>">

          <input name="nome" type="hidden" id="nome3" value="<? echo $nome_operador; ?>">

          <input name="data" type="hidden" id="data" value="<? echo date('d-m-Y'); ?>">
          <input name="date" type="hidden" id="date" value="<? echo date('Y-m-d'); ?>">

          <input name="ent_m" type="hidden" id="ent_m" value="<? if($hora_atual>$hora_limite_ponto){ echo "FALTOU"; }else{ echo $hora_atual; }  ?>">

          <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo date('m-Y'); ?>">
          <input name="dia" type="hidden" id="dia" value="<? echo date('d'); ?>">
          <input name="mes" type="hidden" id="mes" value="<? echo date('m'); ?>">
          <input name="ano" type="hidden" id="ano" value="<? echo date('Y'); ?>">

          <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
          <? if($reg=="") { if($hora_atual>$hora_limite_ponto){ echo "<input class='class01' type='submit' name='Submit9' value='FALTOU'>"; }else{ echo "<input class='class01' type='submit' name='Submit9' value='Entrada Manhã'>"; }} ?>
          

          </font></strong>
        </form>

      <strong><font color="#0000FF">      </font></strong></td>

      <td background="../../imagens/fundocelulas1.png"><form name="form1" method="post" action="sai_m.php">

        <strong><font color="#0000FF">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input name="codigo_ponto" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">

        <input name="nome" type="hidden" id="nome4" value="<? echo $nome_operador; ?>">

        <input name="data" type="hidden" id="data" value="<? echo date('d-m-Y'); ?>">
        <input name="date" type="hidden" id="date" value="<? echo date('Y-m-d'); ?>">
        <input name="sai_m" type="hidden" id="sai_m" value="<? echo $hora_atual; ?>">
        <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
        <? if(($sai_m=="-") or ($sai_m=="00:00:00")){echo "<input class='class01' type='submit' name='Submit92' value='Sa&iacute;da Manh&atilde;'>"; } ?>

        </font></strong>

      </form>        <strong></strong></td>

      <td background="../../imagens/fundocelulas1.png"><form name="form1" method="post" action="ent_t.php">

        <strong><font color="#0000FF">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input name="nome" type="hidden" id="nome" value="<? echo $nome_operador; ?>">

        <input name="data" type="hidden" id="data" value="<? echo date('d-m-Y'); ?>">
        <input name="date" type="hidden" id="date" value="<? echo date('Y-m-d'); ?>">

        <input name="codigo_ponto" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">

        <input name="ent_t" type="hidden" id="ent_t" value="<? echo $hora_atual; ?>">
        <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">

        <? if(($ent_t=="-") or ($ent_t=="00:00:00")){echo "<input class='class01' type='submit' name='Submit922' value='Entrada Tarde'>"; } ?>

        </font></strong>

      </form></td>

      <td background="../../imagens/fundocelulas1.png"><form name="form1" method="post" action="sai_t.php">

        <strong><font color="#0000FF">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input name="nome" type="hidden" id="nome" value="<? echo $nome_operador; ?>">

        <input name="data" type="hidden" id="data3" value="<? echo date('d-m-Y'); ?>">

        <input name="date" type="hidden" id="date" value="<? echo date('Y-m-d'); ?>">
        <input name="codigo_ponto" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">
        <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
        <input name="sai_t" type="hidden" id="sai_t" value="<? echo $hora_atual; ?>">

        <? if(($sai_t=="-") or ($sai_t=="00:00:00")){echo "<input class='class01' type='submit' name='Submit923' value='Sa&iacute;da Tarde'>"; } ?>

        </font></strong>

      </form></td>
    </tr>

<?

if($reg==3){

echo "</tr><tr>";

$reg=0;

}

?>
</table>



<form name="form1" method="post" action="../index.php">

    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

    <input name="codigo_ponto2" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">

  </form>



<p>&nbsp;</p>

  <table width="90%"  border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">

    <tr>

      <td colspan="7" background="../../imagens/fundocelulas2.png"><p><strong>NOME: <? echo $nome_operador; ?></strong></p>

        <p><strong>FUN&Ccedil;&Atilde;O: <? echo $funcao; ?></strong></p>

        <p><strong>M&Ecirc;S: <? echo $mes_ano; ?> </strong></p></td>
    </tr>

    <tr>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>

      <td background="../../imagens/fundocelulas2.png">      <div align="center"></div></td>

      <td colspan="4" background="../../imagens/fundocelulas2.png"><div align="center"><strong>HOR&Aacute;RIO</strong></div>        
      <div align="center"></div></td>
      <td background="../../imagens/fundocelulas2.png">&nbsp;</td>
    </tr>

    <tr>

      <td colspan="7" background="../../imagens/fundocelulas2.png"></td>
    <tr>
      <td background="../../imagens/fundocelulas2.png"><div align="center"><strong>Dia Semana</strong></div></td>
      <td background="../../imagens/fundocelulas2.png"><div align="center"><strong>Data</strong></div></td>
      <td background="../../imagens/fundocelulas2.png"><div align="center"><strong>Entrada</strong></div></td>
      <td background="../../imagens/fundocelulas2.png"><div align="center"><strong>Sa&iacute;da Almo&ccedil;o</strong></div></td>
      <td background="../../imagens/fundocelulas2.png"><div align="center"><strong>Entrada Almo&ccedil;o</strong></div></td>
      <td background="../../imagens/fundocelulas2.png"><div align="center"><strong>Sa&iacute;da Tarde</strong></div></td>
      <td background="../../imagens/fundocelulas2.png"><div align="center"><strong>Observa&ccedil;&otilde;es</strong></div></td>
    </tr>
<?

			

$sql = "SELECT * FROM ponto where nome = '$nome_operador' and mes_ano = '$mes_ano' order by date asc";

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

?>
    <tr>
      <td width="13%" background="../../imagens/fundocelulas1.png"><div align="center"><? echo $dia_semana; ?></div></td>

    <td width="9%" background="../../imagens/fundocelulas1.png"><div align="center">        <? echo $data; ?>

          </div></td>

      <td width="11%" background="../../imagens/fundocelulas1.png"><div align="center"><? echo $ent_m; ?></div></td>

      <td width="11%" background="../../imagens/fundocelulas1.png"><div align="center"><? echo $sai_m; ?></div></td>

      <td width="11%" background="../../imagens/fundocelulas1.png"><div align="center"><? echo $ent_t; ?></div></td>

      <td width="11%" background="../../imagens/fundocelulas1.png"><div align="center"><? echo $sai_t; ?></div></td>

      <td width="34%" background="../../imagens/fundocelulas1.png"><div align="center"><? echo $obs; ?></div></td>
      <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

      <? } ?>
    <tr>

      <td colspan="7" background="../../imagens/fundocelulas1.png">&nbsp;<br>

      Ass:</td>
</table>

<p>&nbsp;</p>

  <p>

    <? //"SELECT * FROM tabela WHERE dia BETWEEN #"&datainicio&"# AND #"&datafim&"# ORDER BY dia ASC"?>

  </p>

  <p>&nbsp;</p>

</body>

</html>

