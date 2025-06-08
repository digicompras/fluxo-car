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
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	color: #FF0000;
	font-weight: bold;
	font-size: 24px;
}
.style2 {color: #0000FF}
.style3 {color: #FF0000}
.style4 {font-size: 18px}
.style11 {	font-size: 24px;
	font-weight: bold;
}
.style10 {font-size: 14px}
.style41 {	font-size: 18px;
	font-weight: bold;
}
.style5 {font-size: 18px}
.style9 {font-size: 14px; font-weight: bold; }
.style31 {font-size: 12px}
-->
</style></head>

<?

require '../../../conect/conect.php';

			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>

<?

$sql = "SELECT * FROM estabelecimentos where nfantasia = 'TENDENCIA COLCHOES MATRIZ' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$razaosocial = $linha[1];
$nfantasia = $linha[2];
$endereco = $linha[5];
$numero = $linha[6];
$bairro = $linha[7];
$cep = $linha[9];
$cidade = $linha[10];
$estado = $linha[11];
$telefone = $linha[12];
$email_empresa = $linha[14];
$site = $linha[15];
$email_vendas = $linha[42];


}

?>

<?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

$sql = "SELECT * FROM adm where usuario = '$usuario' and senha = '$senha'";
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
$estab_pertence_op = $linha[44];
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];
}


?>






<table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
                  <tr>
                    <td><div align="center"><strong><font size="2" class="style31"><? echo $razaosocial; ?><br>
                      <? echo $endereco." "; ?><? echo "N&ordm; ".$numero; ?>, <? echo $bairro; ?>, <? echo $cidade." "; ?> <? echo $estado; ?><br>
                      Site: <? echo $site; ?> E-Mail: <? echo $email_vendas; ?><br>
                      TEL: <? echo $telefone; ?></font></strong></div>
                      <div align="center"></div></td>
                  </tr>
</table>
<form name="form1" method="post" action="../caixa/menu.php">
  <p>
    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  </p>
  <p>&nbsp;</p>
  <p>&nbsp; </p>
</form>
<form name="form2" method="post" action="grava_alterar_lancamento_entrada.php">
  <table width="100%"  border="1">
                  <?
			
$codigo = $_POST['codigo'];

$sql = "SELECT * FROM cx_entradas where codigo = '$codigo' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$cliente = $linha[31];
$datacadastro = $linha[20];
$horacadastro = $linha[21];
$nfantasia = $linha[22];
$historico_entrada = $linha[23];
$categoria_conta_entrada = $linha[24];
//$valor_entrada = $linha[25];
$modo_pagto = $linha[27];

}
?>

    <tr>
      <td colspan="4"><div align="center" class="style11">Recibo de pagamento n&ordm; <? echo $codigo; ?></div></td>
    </tr>
    <tr>
      <td width="21%"><span class="style41">Data do lan&ccedil;amento </span></td>
      <td width="20%"><span class="style9"><? echo $datacadastro; ?></span></td>
      <td width="23%"><span class="style41">Hora do lan&ccedil;amento </span></td>
      <td width="36%"><span class="style9"><? echo $horacadastro; ?></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style10"></span></td>
      <td><span class="style5"></span></td>
      <td><span class="style10"></span></td>
    </tr>
    <tr>
      <td><span class="style5"><strong>Loja</strong></span></td>
      <td><span class="style9"><? echo $nfantasia; ?></span></td>
      <td><span class="style5"><strong>Categoria da conta </strong></span></td>
      <td><span class="style9"><? echo $categoria_conta_entrada; ?></span></td>
    </tr>
    <tr>
      <td><strong>Cliente</strong></td>
      <td colspan="2"><span class="style10"><span class="style9"><? echo $cliente; ?></span></span></td>
      <td><span class="style10"></span></td>
    </tr>
    <tr>
      <td><span class="style5"><strong>Valor</strong></span></td>
      <td><span class="style9"><? echo "R$ ".$valor_entrada; ?></span></td>
      <td>&nbsp;</td>
      <td><span class="style10"></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><span class="style10"></span></td>
      <td>&nbsp;</td>
      <td><span class="style10"></span></td>
    </tr>
    <tr>
      <td><span class="style5"><strong>Hist&oacute;rico</strong></span></td>
      <td colspan="3"><span class="style9"><? echo $historico_entrada; ?></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><span class="style10"><strong>N&ordm; do lan&ccedil;amento no sistema <? echo $codigo; ?></strong></span></td>
    </tr>
  </table>
</form>
<table width="100%" border="0" cellspacing="4">
  <tr>
    <td colspan="3"><div align="center"></div></td>
    <td width="1%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="31%">&nbsp;</td>
    <td width="48%"><p><strong><font color="#000000">Assinatura : __________________________________________</font><font color="#0000FF"><br>
    </font></strong></p></td>
    <td width="20%">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>