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

<title>Altera&ccedil;&atilde;o de horario de encerramento do sistema</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style2 {

	color: #0000FF;

	font-weight: bold;

	font-size: 24px;

}

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}
.style3 {
	font-size: 12px;
	font-weight: bold;
}

-->

</style>

</head>



<body>

<p>        <?

require '../../conect/conect.php';

?>



</p>

<p class="style2">Altera&ccedil;&atilde;o de hor&aacute;rio de encerramento do sistema! </p>

<form action="../principal.php" method="post" name="form1" target="_top">
  <input type="submit" name="Submit" value="Voltar ao menu principal">
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
</form>
<form name="form3" method="post" action="autalizar_horario_ponto.php">
  <table width="25%" border="0" align="center">
    <tr>
      <td colspan="4"><div align="center" class="style3">HOR&Aacute;RIO LIMITE PARA REGISTRAR O PONTO</div></td>
    </tr>
    <?
$sql = "SELECT * FROM hora_ponto limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];

$h_ponto = $linha[1];
$m_ponto = $linha[2];
$s_ponto = $linha[3];

}

?>
    <tr>
      <td><div align="center">Hora</div></td>
      <td><div align="center">Minutos</div></td>
      <td><div align="center">Segundos</div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td width="25%"><div align="center">
        <input name="hora" type="text" id="hora" value="<? echo $h_ponto; ?>" size="2" maxlength="2">
      </div></td>
      <td width="20%"><div align="center">
        <input name="minuto" type="text" id="minuto" value="<? echo $m_ponto; ?>" size="2" maxlength="2">
      </div></td>
      <td width="22%"><div align="center">
        <input name="segundo" type="text" id="segundo" value="<? echo $s_ponto; ?>" size="2" maxlength="2">
      </div></td>
      <td width="33%"><div align="center">
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
        <input type="submit" name="button" id="button" value="Atualizar">
      </div></td>
    </tr>
  </table>
</form>


<table width="100%"  border="0">



        <tr>
          <td colspan="17"><div align="center">HORARIOS SETOR FUNCIONARIOS - Informe os valores com 2 digitos ex: 
              <input name="segundos2" type="text" disabled="true" id="segundos24" value="06" size="2" maxlength="2" readonly="true">
          :  
          <input name="segundos22" type="text" disabled="true" id="segundos25" value="50" size="2" maxlength="2" readonly="true">
          :  
          <input name="segundos23" type="text" disabled="true" id="segundos26" value="00" size="2" maxlength="2" readonly="true">
          </div></td>
        </tr>
        <tr>

          <td><div align="center"></div></td>

          <td><div align="center"></div></td>

          <td>

            <div align="center"></div></td>

          <td><div align="center"></div></td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr>

          <td>&nbsp;</td>

          <td colspan="3"><div align="center">In&iacute;cio do Sistema</div></td>

          <td>&nbsp;</td>

          <td colspan="3"><div align="center">Encerramento do Sistema</div></td>

          <td>&nbsp;</td>
          <td colspan="3"><div align="center">In&iacute;cio Propostas</div></td>
          <td>&nbsp;</td>
          <td colspan="3"><div align="center">Encerramento Propostas</div></td>
          <td>&nbsp;</td>
        </tr>

        <tr>

          <td width="7%">&nbsp;</td>

          <td><div align="center">Horas</div></td>

          <td><div align="center">Minutos</div></td>

          <td><div align="center">Segundos</div></td>

          <td width="4%">&nbsp;</td>

          <td><div align="center">Horas</div></td>

          <td><div align="center">Minutos</div></td>

          <td><div align="center">Segundos</div></td>

          <td width="8%">&nbsp;</td>
          <td width="4%"><div align="center">Horas</div></td>
          <td width="4%"><div align="center">Minutos</div></td>
          <td width="5%"><div align="center">Segundos</div></td>
          <td width="5%">&nbsp;</td>
          <td width="4%"><div align="center">Horas</div></td>
          <td width="4%"><div align="center">Minutos</div></td>
          <td width="6%"><div align="center">Segundos</div></td>
          <td width="19%">&nbsp;</td>
    </tr>

  <?





$sql = "select * from hora_encerramento order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$dia = $linha[1];

$horas_inicio = $linha[2];

$minutos_inicio = $linha[3];

$segundos_inicio = $linha[4];

$horas_termino = $linha[5];

$minutos_termino = $linha[6];

$segundos_termino = $linha[7];

$h_inicio_proposta = $linha[8];
$m_inicio_proposta = $linha[9];
$s_inicio_proposta = $linha[10];
$h_termino_proposta = $linha[11];
$m_termino_proposta = $linha[12];
$s_termino_proposta = $linha[13];


?>



        <tr>

<form action="autalizar_horario.php" method="post" name="form2">

          <td height="40"><div align="center"><? echo $dia; ?>

              <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">

</div></td>

          <td width="4%"><div align="center">

            <input name="horas_inicio" type="text" id="horas_inicio" value="<? echo $horas_inicio; ?>" size="2" maxlength="2">

          </div></td>

  <td width="5%"><div align="center">

            <input name="minutos_inicio" type="text" id="minutos_inicio" value="<? echo $minutos_inicio; ?>" size="2" maxlength="2">

          </div></td>

          <td width="5%"><div align="center">

            <input name="segundos_inicio" type="text" id="horas3" value="<? echo $segundos_inicio; ?>" size="2" maxlength="2">

          </div></td>

          <td>&nbsp;</td>

          <td width="5%"><div align="center">

              <input name="horas_termino" type="text" id="horas_termino" value="<? echo $horas_termino; ?>" size="2" maxlength="2">

          </div></td>

          <td width="5%"><div align="center">

              <input name="minutos_termino" type="text" id="minutos_termino" value="<? echo $minutos_termino; ?>" size="2" maxlength="2">

          </div></td>

          <td width="6%"><div align="center">

              <input name="segundos_termino" type="text" id="horas3" value="<? echo $segundos_termino; ?>" size="2" maxlength="2">

          </div></td>

      <td>&nbsp;</td>
          <td><div align="center">
            <input name="h_inicio_proposta" type="text" id="h_inicio_proposta" value="<? echo $h_inicio_proposta; ?>" size="2" maxlength="2">
          </div></td>
          <td><div align="center">
            <input name="m_inicio_proposta" type="text" id="m_inicio_proposta" value="<? echo $m_inicio_proposta; ?>" size="2" maxlength="2">
          </div></td>
          <td><div align="center">
            <input name="s_inicio_proposta" type="text" id="s_inicio_proposta" value="<? echo $s_inicio_proposta; ?>" size="2" maxlength="2">
          </div></td>
          <td>&nbsp;</td>
          <td><div align="center">
            <input name="h_termino_proposta" type="text" id="h_termino_proposta" value="<? echo $h_termino_proposta; ?>" size="2" maxlength="2">
          </div></td>
          <td><div align="center">
            <input name="m_termino_proposta" type="text" id="m_termino_proposta" value="<? echo $m_termino_proposta; ?>" size="2" maxlength="2">
          </div></td>
          <td><div align="center">
            <input name="s_termino_proposta" type="text" id="s_termino_proposta" value="<? echo $s_termino_proposta; ?>" size="2" maxlength="2">
          </div></td>
          <td><input type="submit" name="Submit2" value="Atualizar"></td>
        </tr>
		  </form>
          <? } ?>
  </table>



<p>&nbsp;</p>
  <table width="100%"  border="0">
    <tr>
      <td colspan="17"><div align="center">HORARIOS SETOR ADMIN</div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3"><div align="center">In&iacute;cio do Sistema</div></td>
      <td>&nbsp;</td>
      <td colspan="3"><div align="center">Encerramento do Sistema</div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="7%">&nbsp;</td>
      <td><div align="center">Horas</div></td>
      <td><div align="center">Minutos</div></td>
      <td><div align="center">Segundos</div></td>
      <td width="4%">&nbsp;</td>
      <td><div align="center">Horas</div></td>
      <td><div align="center">Minutos</div></td>
      <td><div align="center">Segundos</div></td>
      <td width="8%">&nbsp;</td>
      <td width="4%">&nbsp;</td>
      <td width="4%">&nbsp;</td>
      <td width="5%">&nbsp;</td>
      <td width="5%">&nbsp;</td>
      <td width="4%">&nbsp;</td>
      <td width="4%">&nbsp;</td>
      <td width="6%">&nbsp;</td>
      <td width="19%">&nbsp;</td>
    </tr>
    <?





$sql = "select * from hora_encerramento_admin order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$dia = $linha[1];

$horas_inicio = $linha[2];

$minutos_inicio = $linha[3];

$segundos_inicio = $linha[4];

$horas_termino = $linha[5];

$minutos_termino = $linha[6];

$segundos_termino = $linha[7];

$h_inicio_proposta = $linha[8];
$m_inicio_proposta = $linha[9];
$s_inicio_proposta = $linha[10];
$h_termino_proposta = $linha[11];
$m_termino_proposta = $linha[12];
$s_termino_proposta = $linha[13];


?>
    <tr>
    <form name="form4" method="post" action="autalizar_horario_admin.php">

      <td height="40"><div align="center"><? echo $dia; ?>
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
      </div></td>
      <td width="4%"><div align="center">
        <input name="horas_inicio" type="text" id="horas_inicio" value="<? echo $horas_inicio; ?>" size="2" maxlength="2">
      </div></td>
      <td width="5%"><div align="center">
        <input name="minutos_inicio" type="text" id="minutos_inicio" value="<? echo $minutos_inicio; ?>" size="2" maxlength="2">
      </div></td>
      <td width="5%"><div align="center">
        <input name="segundos_inicio" type="text" id="segundos_inicio" value="<? echo $segundos_inicio; ?>" size="2" maxlength="2">
      </div></td>
      <td>&nbsp;</td>
      <td width="5%"><div align="center">
        <input name="horas_termino" type="text" id="horas_termino" value="<? echo $horas_termino; ?>" size="2" maxlength="2">
      </div></td>
      <td width="5%"><div align="center">
        <input name="minutos_termino" type="text" id="minutos_termino" value="<? echo $minutos_termino; ?>" size="2" maxlength="2">
      </div></td>
      <td width="6%"><div align="center">
        <input name="segundos_termino" type="text" id="segundos_termino" value="<? echo $segundos_termino; ?>" size="2" maxlength="2">
      </div></td>
      <td><input type="submit" name="Submit3" value="Atualizar"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    </form>

    <? } ?>
  </table>
<p>&nbsp;</p>

</body>

</html>

