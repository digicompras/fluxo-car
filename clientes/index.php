<?php
session_start(); //inicia sessão...
if ($_SESSION["cpf"] == true) //verifica se a variável "senha" é verdadeira...
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
</head>
<?

require '../conect/conect.php';

$cpf = $_SESSION['cpf'];

$data_hoje = $_SESSION['data_hoje'];


$cpf = $_SESSION['cpf'];
$data_hoje = $_SESSION['data_hoje'];


$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?> 
<body bgcolor="#<? printf("$linha[1]"); ?>"> 
<? } ?>

<?


$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$datacadastro = $linha[1];
$horacadastro = $linha[2];
$nome = $linha[3];
$alcunha = $linha[4];
$data_nasc = $linha[5];
$mes_nasc = $linha[6];
$sexo = $linha[7];
$estadocivil = $linha[8];
$cpf = $linha[9];
$rg = $linha[10];
$orgao = $linha[11];
$emissao = $linha[12];
$pai = $linha[13];
$mae = $linha[14];
$endereco = $linha[15];
$numero = $linha[16];
$bairro = $linha[17];
$complemento = $linha[18];
$cidade = $linha[19];
$estado = $linha[20];
$cep = $linha[21];
$telefone = $linha[22];
$celular = $linha[23];
$email = $linha[24];
$obs = $linha[25];
$status = $linha[26];

?>





  <table width="100%" border="0" cellspacing="4">
    <tr> 
      <td width="32%"><strong>Ol&aacute;! Seja bem vindo<br> 
        </strong><strong><font color="#0000FF"><? echo $nome; ?> 
            
</font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td width="30%"><strong>E-mail:</strong><br>
      <strong><font color="#0000FF"><? echo $email; ?></font></strong>     </td>
      <td width="15%"><strong>Celular:<font color="#0000FF"><br>
            <? echo $celular; ?>
      </font><font color="#0000FF">      </font></strong></td>
      <td width="23%" valign="top"><div align="center">
        <strong><font color="#0000FF">Confira a data de hoje </font></strong><br>
        <strong><font color="#0000FF"><? echo $data_hoje; ?></font></strong>
      </div></td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF"> </font></strong></td>
      <td><strong><font color="#0000FF"> </font></strong></td>
      <td colspan="2">&nbsp;</td>
    </tr>
<?
if($reg==3){
echo "</tr><tr>";
$reg=0;
}
?>

<? } ?>
</table>
  <?
  	$_SESSION['cpf'] = $cpf;
	$_SESSION['data_hoje'] = $data_hoje;
	?>
  <div align="center"></div>
<table width="100%"  border="0">
  <tr>
    <td colspan="2">&nbsp;</td>
    <td width="59%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
  </tr>
</table>
<strong></strong>
<div align="center">
  <p>    <strong></strong></p>
  <p>&nbsp;</p>
</div>
</body>
</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>