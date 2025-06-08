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
<title>Border&ocirc;s</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style3 {font-size: 10px}
.style5 {
	font-size: 24px;
	font-weight: bold;
}
.style6 {font-size: 9px}
-->
</style>
</head>
<?

require '../../conect/conect.php';


$num_bordero = $_POST['num_bordero'];
$nome_operador = $_POST['nome_operador'];


$sql = "SELECT * FROM borderos where num_bordero = '$num_bordero' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$status = $linha[2];

}


?>


<body>
<table width="100%" bgcolor="#ffffff"  border="0">
        <tr valign="top">
          <td width="36%" height="23">
<?
$sql = "SELECT * FROM logo";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {
$reg++;

printf("<img src='../../imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'>"); 

}
?>
</td>
          <td width="37%" valign="middle"><div align="center">          </div></td>
          <td width="27%" height="23">&nbsp;</td>
        </tr>
</table>
      <p>      <form name="form1" method="post" action="../principal.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </form>
<p align="center" class="style5">Border&ocirc; N&ordm; <? echo $num_bordero; ?> - Status <? echo $status; ?></p>


<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];

}


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where nome = '$nome_operador' and usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_gerente = $linha[1];
$email_gerente = $linha[20];
$funcao_gerente = $linha[43];

$cidade_estab_pertence = $linha[45];
$tel_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];

}

	

?>





<table width="100%"  border="1">
  <tr bgcolor="ffffff">
    <td><div align="center"><span class="style3">N&ordm; Proposta </span></div></td>
    <td><div align="center" class="style3">Status</div></td>
    <td><div align="center" class="style3">F&iacute;sico</div></td>
    <td><div align="center" class="style6">Dias Atraso</div></td>
    <td><div align="center" class="style3">Cliente </div></td>
    <td><div align="center" class="style3">CPF</div></td>
    <td><div align="center" class="style3">Valor Contrato </div></td>
    <td><div align="center" class="style3">Prazo</div></td>
    <td><div align="center"><span class="style3">Banco da opera&ccedil;&atilde;o </span></div></td>
    <td><div align="center" class="style3">Data</div></td>
  </tr>
  <?
			  
			  
$sql = "SELECT * FROM propostas where num_bordero = '$num_bordero' order by num_proposta asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$num_proposta = $linha[0];
$nome_cli = $linha[4];
$cpf = $linha[7];
$valor_credito = $linha[25];
$quant_parc = $linha[26];
$status = $linha[51];
$tipo_proposta = $linha[83];
$bco_operacao = $linha[86];
$status_fisico = $linha[120];
$dia_alteracao_status = $linha[110];
$mes_alteracao_status = $linha[111];
$ano_alteracao_status = $linha[112];
$data_alteracao_status = "$dia_alteracao_status-$mes_alteracao_status-$ano_alteracao_status";
$num_contrato_banco = $linha[151];
$num_bordero_relacionada = $linha[121];
$dias_atraso = $linha[158];

?>
  <tr>
    <td width="6%"><div align="center" class="style3">
        <form name="form2" method="post" action="borderos.php">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <? echo $num_proposta; ?>
          <input name="num_bordero_suporte" type="hidden" id="num_bordero_suporte" value="<?
if($registros==1){
echo $num_bordero_suporte;
}			
?>">
          <strong><font color="#0000FF"> </font></strong>
        </form>
    </div></td>
    <td width="11%"><div align="center" class="style3"><? echo $status;?></div></td>
    <td width="9%"><div align="center" class="style3"><? echo $status_fisico;?></div></td>
    <td width="7%"><div align="center"><span class="style3"><? echo $dias_atraso;?></span></div></td>
    <td width="23%"><div align="center" class="style3"><? printf("$linha[4]");?></div></td>
    <td width="11%">
      <div align="center" class="style3"><? printf("$linha[7]");?> </div></td>
    <td width="9%"><div align="center" class="style3"><? printf("R$ $linha[25]");?> </div></td>
    <td width="3%"><div align="center" class="style3"><? printf("$linha[26]"); ?> </div></td>
    <td width="12%"><div align="center"><span class="style3"><? printf("$linha[86]"); ?></span></div></td>
    <td width="9%"><div align="center" class="style3"><? echo $dataalteracao;?></div></td>
    <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
    <? } ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="100%"  border="0">
  <tr>
    <td width="27%">
      <div align="left"></div>      <table width="100%"  border="1">
        <tr>
          <td width="44%">Data do envio </td>
          <td width="56%"><div align="center"><? echo $datafechamento;?>
          </div></td>
        </tr>
        <tr>
          <td colspan="2">Respons&aacute;vel Envio </td>
        </tr>
        <tr>
          <td colspan="2"><? echo $nome_gerente; ?></td>
        </tr>
        <tr>
          <td colspan="2">Assinatura respons&aacute;vel pelo envio </td>
        </tr>
        <tr>
          <td height="57" colspan="2">&nbsp;</td>
        </tr>
      </table></td><td width="46%" valign="bottom"><form name="form3" method="post" action="">
        <div align="center">
          <p>
            <textarea name="obs" cols="50" rows="7" readonly="readonly" id="obs"><? echo $obs_bordero; ?></textarea>
          </p>
          <p>Retirado por:_____________________________________ </p>
        </div>
      </form></td>
    <td width="27%"><div align="center">
      <table width="100%"  border="1">
        <tr>
          <td width="44%">Data do recebimento </td>
          <td width="56%"><div align="center"><? echo $datarecebimento;?></div></td>
        </tr>
        <tr>
          <td colspan="2">Respons&aacute;vel Recebimento </td>
        </tr>
        <tr>
          <td colspan="2"><? echo $operador_recebeu2;?></td>
        </tr>
        <tr>
          <td colspan="2">Assinatura respons&aacute;vel pelo recebimento </td>
        </tr>
        <tr>
          <td height="57" colspan="2">&nbsp;</td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
