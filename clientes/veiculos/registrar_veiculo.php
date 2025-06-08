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
<title>REGISTRO DE VEICULO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

require '../../conect/conect.php';

$chassi = $_POST['chassi'];
$renavam = $_POST['renavam'];
$concessionaria = $_POST['concessionaria'];
$cnpj = $_POST['cnpj'];




$sql = "SELECT * FROM estabelecimentos where cnpj = '$cnpj' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$nfantasia = $linha[2];
$cnpj = $linha[3];
$cidade_concessionaria = $linha[10];
$estado_concessionaria = $linha[11];
$tel_concessionaria = $linha[12];
$email_concessionaria = $linha[14];

}




$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;
?>


<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>
  
<? } ?>




<form name="form1" method="post" action="pesquisa.php">
  <?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
  <input type="submit" name="Submit3" value="Voltar">
  <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
</form>
<?

$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];


$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome = $linha[1];
$celular = $linha[19];
$email = $linha[20];
$estabelecimento = $linha[44];
$cidade_estabelecimento = $linha[45];
$tel_estabelecimento = $linha[46];
$email_estabelecimento = $linha[47];

?>
<? } ?>
<form action="grava_veiculo.php" method="post" enctype="multipart/form-data" name="form1">

<table width="100%" border="0" cellspacing="4">
    <tr> 
      <td colspan="4"><strong><font color="#0000FF" size="4">REGISTRO DE VEICULO ! Data Cadastro </font><font color="#0000FF"><? echo date('d-m-Y'); ?>
            <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo date('d-m-Y'); ?>">
        <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo date('H:i:s'); ?>">
</font></strong></td>
    </tr>
    <tr>
      <td width="15%">Concession&aacute;ria</td>
      <td width="37%"><? echo $nfantasia; ?>
      <input name="concessionaria" type="hidden" id="nome2" value="<? echo $nfantasia; ?>"></td>
      <td width="15%">CNPJ</td>
      <td width="33%"><strong>
        <? echo $cnpj; ?>
        <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
      </strong> </td>
    </tr>
    <tr>
      <td>Telefone</td>
      <td><? echo $tel_concessionaria; ?>
        <input name="tel_concessionaria" type="hidden" id="tel_concessionaria" value="<? echo $tel_concessionaria; ?>">
      </td><td>E-Mail</td>
      <td> <font color="#0000FF">
        <? echo $email_concessionaria; ?>
        <input name="email_concessionaria" type="hidden" id="email_concessionaria" value="<? echo $email_concessionaria; ?>">
      </font></td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><? echo $cidade_concessionaria; ?>
        <input name="cidade_concessionaria" type="hidden" id="cidade_concessionaria" value="<? echo $cidade_concessionaria; ?>"></td><td>Estado</td>
        <td><? echo $estado_concessionaria; ?>
          <input name="estado_concessionaria" type="hidden" id="estado_concessionaria" value="<? echo $estado_concessionaria; ?>"> </td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Ve&iacute;culo</td>
      <td><input name="veiculo" type="text" id="veiculo" size="50"></td>
      <td>Placas</td>
      <td><input name="placa" type="text" id="placa"></td>
    </tr>
    <tr>
      <td>Ano de fabrica&ccedil;&atilde;o</td>
      <td><input name="ano" type="text" id="ano" size="5" maxlength="4"></td>
      <td>Modelo</td>
      <td><input name="modelo" type="text" id="modelo" size="5" maxlength="4"></td>
    </tr>
    <tr>
      <td>Chassi</td>
      <td><input name="chassi" type="text" id="chassi" value="<? echo $chassi; ?>" size="50"></td>
      <td>Renavam</td>
      <td><input name="renavam" type="text" id="renavam" value="<? echo $renavam; ?>" size="50"></td>
    </tr>
    <tr>
      <td>Observa&ccedil;&otilde;es</td>
      <td colspan="3"><textarea name="obs_veiculo" cols="50" rows="5" id="obs_veiculo"></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><strong><font color="#0000FF">
        <input name="operador" type="hidden" id="operador3" value="<? echo $nfantasia; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_concessionaria; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $nfantasia; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_concessionaria; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_concessionaria; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_concessionaria; ?>">
        <input name="status" type="hidden" id="status" value="<? echo "Estoque"; ?>">
</font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2"><?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
        <input type="submit" name="Submit" value="Registrar Ve&iacute;culo"> 
          <input type="reset" name="Submit2" value="Limpar"> </td><td><div align="right"> </div></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="4">
    <tr>
      <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>
          <strong><font color="#0000FF"><? echo $nfantasia; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $tel_concessionaria; ?> </font></strong></td>
      <td width="35%"><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $email_concessionaria; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="20%"><strong>Cidade: <br>
            <font color="#0000FF"><? echo $cidade_concessionaria; ?> </font></strong></td>
      <td width="1%">&nbsp;</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF"> </font><font color="#0000FF"> </font></strong></td>
      <td>&nbsp;</td>
      <td><strong></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
