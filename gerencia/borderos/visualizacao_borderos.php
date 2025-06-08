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
-->
</style>
</head>
<?

require '../../conect/conect.php';


$num_bordero = $_POST['num_bordero'];
$estab_pertence = $_POST['estab_pertence'];

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
<p align="center" class="style5">Border&ocirc; N&ordm; <? echo $num_bordero; ?></p>
<?



$sql = "SELECT * FROM borderos where num_bordero = '$num_bordero' and loja = '$estab_pertence'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$num_bordero_pesquisado = $linha[0];
$loja = $linha[1];
$status = $linha[2];
$nome_gerente = $linha[3];
$dataabertura = $linha[4];
$horaabertura = $linha[5];
$diaabertura = $linha[6];
$mesabertura = $linha[7];
$anoabertura = $linha[8];
$datafechamento = $linha[9];
$horafechamento = $linha[10];
$diafechamento = $linha[11];
$mesfechamento = $linha[12];
$anofechamento = $linha[13];
$recebimento = $linha[14];
$datarecebimento = $linha[15];
$horarecebimento = $linha[16];
$diarecebimento = $linha[17];
$mesrecebimento = $linha[18];
$anorecebimento = $linha[19];
$obs_bordero = $linha[20];
$operador_recebeu2 = $linha[21];
$cel_operador_recebeu2 = $linha[22];
$email_operador_recebeu2 = $linha[23];
$estabelecimento_recebeu2 = $linha[24];
$cidade_estabelecimento_recebeu2 = $linha[25];
$tel_estabelecimento_recebeu2 = $linha[26];
$email_estabelecimento_recebeu2 = $linha[27];

}


?>


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


$sql = "SELECT * FROM operadores where estab_pertence = '$estab_pertence' and usuario = '$usuario' and senha = '$senha' and funcao = 'Gerente' limit 1";
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
    <td><div align="center" class="style3">Cidade</div></td>
    <td><div align="center" class="style3">N&ordm; contrato BCO </div></td>
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
$nome_operador = $linha[1];
$tipo = $linha[2];
$estabelecimento_proposta = $linha[3];
$nome = $linha[4];
$sexo = $linha[5];
$estadocivil = $linha[6];
$cpf = $linha[7];
$rg = $linha[8];
$orgao = $linha[9];
$emissao = $linha[10];
$data_nasc = $linha[11];
$pai = $linha[12];
$mae = $linha[13];
$endereco = $linha[14];
$numero = $linha[15];
$bairro = $linha[16];
$complemento = $linha[17];
$cidade = $linha[18];
$estado = $linha[19];
$cep = $linha[20];
$telefone = $linha[21];
$celular = $linha[22];
$email = $linha[23];
$num_beneficio = $linha[24];
$valor_credito = $linha[25];
$quant_parc = $linha[26];
$parcela = $linha[27];
$banco_pagto = $linha[28];
$num_banco = $linha[29];
$agencia = $linha[30];
$conta = $linha[31];
$operador = $linha[32];
$cel_operador = $linha[33];
$email_operador = $linha[34];
$estabelecimento = $linha[35];
$cidade_estabelecimento = $linha[36];
$tel_estabelecimento = $linha[37];
$email_estabelecimento = $linha[38];
$obs = $linha[39];
$dataproposta = $linha[40];
$horaproposta = $linha[41];
$dataalteracao = $linha[42];
$horaalteracao = $linha[43];
$operador_alterou = $linha[44];
$cel_operador_alterou = $linha[45];
$email_operador_alterou = $linha[46];
$estabelecimento_alterou = $linha[47];
$cidade_estabelecimento_alterou = $linha[48];
$tel_estabelecimento_alterou = $linha[49];
$email_estabelecimento_alterou = $linha[50];
$status = $linha[51];


$parc1 = $linha[52];
$banco1 = $linha[53];
$vencto1 = $linha[54];
$compra1 = $linha[55];

$num_beneficio2 = $linha[80];
$num_beneficio3 = $linha[81];
$num_beneficio4 = $linha[82];

$tipo_proposta = $linha[83];
$bco_operacao = $linha[86];
$num_contrato_banco = $linha[105];

?>
  <tr>
    <td width="7%"><div align="center" class="style3">
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
    <td width="13%"><div align="center" class="style3"><? echo $cidade_estabelecimento;?></div></td>
    <td width="11%"><div align="center" class="style3"><? echo $num_contrato_banco;?></div></td>
    <td width="18%"><div align="center" class="style3"><? printf("$linha[4]");?></div></td>
    <td width="11%">
      <div align="center" class="style3"><? printf("$linha[7]");?> </div></td>
    <td width="10%"><div align="center" class="style3"><? printf("R$ $linha[25]");?> </div></td>
    <td width="3%"><div align="center" class="style3"><? printf("$linha[26]"); ?> </div></td>
    <td width="11%"><div align="center"><span class="style3"><? printf("$linha[86]"); ?></span></div></td>
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
      </table></td><td width="46%"><form name="form3" method="post" action="">
        <div align="center">
          <textarea name="obs" cols="40" rows="9" readonly="readonly" id="obs"><? echo $obs_bordero; ?></textarea>
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
