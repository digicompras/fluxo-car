<?

require '../conect/conect.php';


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

printf("<a href='index.php' target='_top'><img src='../imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'></a>"); ?>


          <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>

          <? } ?>

<html>
<head>
<title>Lgoin</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<script language="javascript">
function foco(usuario)
{
document.getElementById(usuario).focus();
}
</script>

			<?
			
			
$sql = "SELECT * FROM fundo_navegacao";
//EXECUTA O COMANDO ACIMA
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body onLoad="javascript:foco('usuario');" bgcolor="#<? printf("$linha[1]"); ?>" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>

background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">
  
<? } ?>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?

setlocale(LC_TIME, 'pt_BR');

$data_completa = strftime("%A, %d de %B de %Y<br><br>");

$hoje = strftime("%A");


$instrucao = $_GET['instrucao'];

?>

<?
$sql = "select * from hora_encerramento_admin where dia = '$hoje' limit 1";
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

}
//$ajuste_horario = 2;
//$horacerta = date('H')+2;
//$hora_atual = "0".$horacerta.date(':i:s');
$date = date('d-m-Y');
?>

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
$hora_iniciar = "$horas_inicio".":"."$minutos_inicio".":"."$segundos_inicio";
$hora_terminar = "$horas_termino".":"."$minutos_termino".":"."$segundos_termino";
?>

<?
$ip = $_SERVER['REMOTE_ADDR'];

$user= "select * from ips_admin where ip = '$ip' limit 1";
$result=mysql_query($user);
while($linha=mysql_fetch_row($result)) {


$ip_cadastrado = $linha[1];
$estab_pertence = $linha[2];
}



if(mysql_num_rows($result)==1){


echo "<form name='form1' method='post' action='verifica.php' target='_top'>
  <table width='100%' border='0' align='center'>
    <tr>
      <td><span class='style5'><span class='style2'><br>$data_completa</span></span></td>
      <td>&nbsp;</td>
      <td><span class='style5'><span class='style2'>$hora_atual</span></span></td>
    </tr>
    <tr>
      <td colspan='6'><div align='left'>Hor&aacute;rio de funcionamento do sistema! In&iacute;cio as $hora_iniciar - T&eacute;rmino as $hora_terminar</div></td>
    </tr>
    <tr>
      <td colspan='3'><div align='center'><span class='style6'>";
          
if($hora_atual<=$hora_iniciar){echo "Prezado operador! Seu dia de trabalho ainda n&atilde;o teve inicio!<br><br>O sistema abrir&aacute; as $hora_iniciar <br>";
}

if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){ echo "<br><br>Prezado operador!<br>PARA SUA SEGURANÇA SEU IP $ip_cadastrado SERÁ GRAVADO AO REALIZAR SEU LOGIN! Tenha um ótimo dia de trabalho!<br>";
} 


if($hora_atual>=$hora_terminar){echo "Prezado operador!<br> Seu dia de trabalho j&aacute; terminou!<br><br>J&aacute; s&atilde;o $hora_atual, portanto, n&atilde;o &eacute; poss&iacute;vel acessar o sistema agora!<br><br> V&aacute; descansar para amanh&atilde; seu dia ser proveitoso!<br> "; 
}



      "</span></div></td>
    </tr>
	<tr>
	<td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='estab_pertence' type='hidden' id='estab_pertence' value='$estab_pertence'>"; echo "$estab_pertence<br> "; } "</td>
	<td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "Nome "; } "</td>
	<td>";
if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){	
echo"<select name='nome' id='select5'>";
    $sql = "select * from operadores where estab_pertence = '$estab_pertence' and status = 'Ativo' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
   }
      echo"</select><br>";	
	  }
	"</td>
	</tr>
    <tr> 
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "Usuário "; } "</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='usuario' type='text' id='usuario'><br>";} "</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td width='28%'>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"Senha"; } "</td>
      <td width='46%'>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='senha' type='password' id='senha'><br><br>"; }
      echo "<input name='data_hoje' type='hidden' id='data_hoje' value='$date'>"; "</td>
      <td width='26%'>&nbsp; </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input type='submit' name='Submit' value='Conectar'>"; } 
      if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input type='reset' name='Submit2' value='Limpar'>"; } "</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>"; 


}
else {
echo "ATENÇÃO!!!...<br><br>O IP $ip DO LOCAL DE ONDE VOCÊ ESTÁ TENTANDO ACESSAR O SISTEMA NÃO ESTÁ AUTORIZADO PELA ALLCRED FINANCEIRA!<br><br> ACESSE O SISTEMA DE UM LOCAL DEVIDAMENTE AUTORIZADO!";
}

?>

</body>
</html>
<?
mysql_close($conexao);
?>