<?php
session_start(); //inicia sessão...
if ($_SESSION["cnpj"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

?>
<html>
<head>
<title>PESQUISA DE VE&Iacute;CULOS</title>
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

<body>
<p><?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';



error_reporting(E_ALL);


$cnpj = $_POST['cnpj'];


$sql = "SELECT * FROM estabelecimentos where cnpj = '$cnpj'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];
$razaosocial = $linha[1];
$nfantasia = $linha[2];
$cnpj = $linha[3];
$inscr_est = $linha[4];
$endereco = $linha[5];
$numero = $linha[6];
$bairro = $linha[7];
$complemento = $linha[8];
$cep = $linha[9];
$cidade = $linha[10];
$estado = $linha[11];
$telefone = $linha[12];
$fax = $linha[13];
$email = $linha[14];
$site = $linha[15];
$proprietario = $linha[16];
$cpf = $linha[17];
$rg = $linha[18];
$operador = $linha[24];
$cel_operador = $linha[25];
$email_operador = $linha[26];
$estabelecimento = $linha[27];
$cidade_estabelecimento = $linha[28];
$tel_estabelecimento = $linha[29];
$email_estabelecimento = $linha[30];
$obs = $linha[19];
$datacadastro = $linha[20];
$horacadastro = $linha[21];
$dataalteracao = $linha[22];
$horaalteracao = $linha[23];
$operador_alterou = $linha[31];
$cel_operador_alterou = $linha[32];
$email_operador_alterou = $linha[33];
$estabelecimento_alterou = $linha[34];
$cidade_estabelecimento_alterou = $linha[35];
$tel_estabelecimento_alterou = $linha[36];
$email_estabelecimento_alterou = $linha[37];
$status = $linha[41];

}

?>

</p>
<form name="form1" method="post" action="../index.php">
  <?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
  <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
  <input type="submit" name="Submit2" value="Voltar">
</form>
<p><strong>Escolha a concession&aacute;ria e informe o chassi ou renavam para pesquisa! </strong></p>
<form action="verifica.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
    <tr>
      <td>Informe a concession&aacute;ria do ve&iacute;culo a ser incluso <br></td>
      <td><? echo $nfantasia; ?>
      <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $nfantasia; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="33%">Informe o CHASSI do ve&iacute;culo a ser pesquisado <br></td>
      <td width="25%"><input name="chassi" type="text" id="chassi"></td>
      <td width="42%"><?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
        <input type="submit" name="Submit" value="Verificar "></td></tr>
    <tr>
      <td>Informe o RENAVAM do ve&iacute;culo a ser pesquisado <br></td>
      <td><input name="renavam" type="text" id="renavam"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<p>&nbsp;</p>
</body>
</html>
