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
<title>Cadastro de produtos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name="form2" method="post" action="menu.php">
  <? 
require '../../conect/conect.php';

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
 ?>
  <input type="submit" name="Submit3" value="Voltar">
</form>
<form action="grava.php" method="post" enctype="multipart/form-data" name="form1">
<?
$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$nome = $linha[1];
$sexo = $linha[2];
$estadocivil = $linha[3];
$cpf = $linha[4];
$rg = $linha[5];
$orgao = $linha[6];
$emissao = $linha[7];
$data_nasc = $linha[8];
$pai = $linha[9];
$mae = $linha[10];
$endereco = $linha[11];
$numero = $linha[12];
$bairro = $linha[13];
$complemento = $linha[14];
$cidade = $linha[15];
$estado = $linha[16];
$cep = $linha[17];
$telefone = $linha[18];
$celular = $linha[19];
$email = $linha[20];
$operador = $linha[21];
$cel_operador = $linha[22];
$email_operador = $linha[23];
$estabelecimento = $linha[24];
$cidade_estabelecimento = $linha[25];
$tel_estabelecimento = $linha[26];
$email_estabelecimento = $linha[27];
$obs = $linha[28];
$datacadastro = $linha[29];
$horacadastro = $linha[30];
$dataalteracao_u = $linha[31];
$horaalteracao_u = $linha[32];
$operador_alterou_u = $linha[33];
$cel_operador_alterou_u = $linha[34];
$email_operador_alterou_u = $linha[35];
$estabelecimento_alterou_u = $linha[36];
$cidade_estabelecimento_alterou_u = $linha[37];
$tel_estabelecimento_alterou_u = $linha[38];
$email_estabelecimento_alterou_u = $linha[39];
$usuario_op = $linha[40];
$senha_op = $linha[41];
$tipo_op = $linha[42];
$funcao = $linha[43];
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];
$tel_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];
$classe = $linha[48];
}
?>

  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td width="16%">&nbsp;</td>
      <td colspan="7">


<strong><font color="#0000FF" size="4">Tela de cadastro de produtos!

</font></strong></td>
    
    <tr>
      <td><font color="#0000FF"><strong>Banco de Opera&ccedil;&atilde;o</strong></font></td>
      <td><div align="center">Produto</div></td>
      <td><div align="center">Faixa </div></td>
      <td width="14%"><div align="center">Comiss&atilde;o Empresa </div></td>
      <td width="14%"><div align="center">Comiss&atilde;o Bruta % </div></td>
      <td width="11%"><div align="center">Comiss&atilde;o A% </div></td>
      <td width="11%"><div align="center">Comiss&atilde;o B% </div></td>
      <td width="11%"><div align="center">Comiss&atilde;o C% </div></td>
    </tr>
    <tr>
      <td><select name="bco_operacao" id="select6">
        <option selected></option>
        <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
      </select></td>
      <td><font color="#0000FF">
        <input name="tipo_proposta" type="text" id="tipo_proposta" size="30">
</font></td>
      <td><div align="center">
        <input name="faixa" type="text" id="faixa" size="5" maxlength="5">
      </div></td>
      <td><div align="center">
        <input name="com_empresa" type="text" id="com_empresa" size="5" maxlength="5">
      </div></td>
      <td><div align="center">
        <input name="com_bruta" type="text" id="com_bruta" size="5" maxlength="5">
      </div></td>
      <td><div align="center">
        <input name="a" type="text" id="a" size="5" maxlength="5">
      </div></td>
      <td><div align="center">
        <input name="b" type="text" id="b" size="5" maxlength="5">
      </div></td>
      <td><div align="center">
        <input name="c" type="text" id="c" size="5" maxlength="5">
      </div></td>
    </tr>
    <tr>
      <td colspan="8"><div align="center">Vig&ecirc;ncia</div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align="center">Data Inicial </div></td>
      <td>&nbsp;</td>
      <td><div align="center">
        <input name="data_inicial" type="text" id="data_inicial2">
      </div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="15%"><div align="center">Data Final </div></td>
      <td width="7%">&nbsp;</td>
      <td><div align="center">
        <input name="data_final" type="text" id="data_final2">
      </div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="7"><input name="operador" type="hidden" id="operador" value="<? echo $nome; ?>">
      <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular; ?>">
      <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email; ?>">
      <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence; ?>">
      <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence; ?>">
      <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence; ?>">
      <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence; ?>">
      <input name="datacadastro" type="hidden" id="datacadastro2" value="<? echo date('d-m-Y'); ?>">
      <input name="horacadastro" type="hidden" id="horacadastro2" value="<? echo date('H:i:s'); ?>"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="7"><input type="submit" name="Submit" value="Gravar Produto">
      <input type="reset" name="Submit2" value="Limpar"></td>
    </tr>
  </table>
</form>
<?
$sql = "select * from produtos order by bco_operacao asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;
echo "<tr>";
$reg++;
?>
<td>
<font color="#0000FF">&nbsp;</font><br>
<span class="style1"><strong>Código:</strong></span> <? printf("$linha[0]<br>"); ?>
<span class="style1"><strong>Produto:</strong></span> <? printf("$linha[1]<br>"); ?>
<span class="style1"><strong>Banco de Operação:</strong></span> <? printf("$linha[2]<br>"); ?></td>
<?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>

<? } ?>

<p>&nbsp; </p>
</body>
</html>
