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
-->
</style>
</head>

<?

require '../../conect/conect.php';

			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#ffffff<? //printf("$linha[1]"); ?>"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>
<?
// dados do cliente

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$estadocivil = $_POST['estadocivil'];
$cpf = $_POST['cpf'];
$status_cliente = $_POST['status_cliente'];
$rg = $_POST['rg'];
$orgao = $_POST['orgao'];
$emissao = $_POST['emissao'];
$data_nasc = $_POST['data_nasc'];
$pai = $_POST['pai'];
$mae = $_POST['mae'];
$endereco = $_POST['endereco'];
$numero  = $_POST['numero'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$datacadastro = $_POST['datacadastro'];
$horacadastro = $_POST['horacadastro'];
//dados do operador

$operador = $_POST['operador'];
$cel_operador = $_POST['cel_operador'];
$email_operador = $_POST['email_operador'];

//dados do estabelecimento

$estabelecimento = $_POST['estabelecimento'];
$cidade_estabelecimento = $_POST['cidade_estabelecimento'];
$tel_estabelecimento = $_POST['tel_estabelecimento'];
$email_estabelecimento = $_POST['email_estabelecimento'];
$tipo = $_POST['tipo'];



// Observações

$obs = $_POST['obs'];





$comando = "insert into cupons(nome,sexo,estadocivil,cpf,rg,orgao,emissao,data_nasc,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,telefone,celular,email,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,datacadastro,horacadastro,tipo) values('$nome','$sexo','$estadocivil','$cpf','$rg','$orgao','$emissao','$data_nasc','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$telefone','$celular','$email','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$datacadastro','$horacadastro','$tipo')";

mysql_query($comando,$conexao) or die("Erro ao gravar cupom!...Tente novamente!");


echo "Cupom cadastrado com sucesso!<br><br>";

?>

<?
$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$tipo = $linha[40];
$nome = $linha[1];
$status_cliente = $linha[89];

}

if($reg==0){

$comando = "insert into clientes(nome,sexo,estadocivil,cpf,rg,orgao,emissao,data_nasc,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,telefone,celular,email,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,obs,datacadastro,horacadastro,tipo,status_cliente) values('$nome','$sexo','$estadocivil','$cpf','$rg','$orgao','$emissao','$data_nasc','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$telefone','$celular','$email','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$obs','$datacadastro','$horacadastro','$tipo','Ativo')";

mysql_query($comando,$conexao);

}

?>


<?
$sql = "SELECT * FROM cupons order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>
<?
$codigo = $linha[0];
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
$dataalteracao = $linha[31];
$horaalteracao = $linha[32];
$operador_alterou = $linha[33];
$cel_operador_alterou = $linha[34];
$email_operador_alterou = $linha[35];
$estabelecimento_alterou = $linha[36];
$cidade_estabelecimento_alterou = $linha[37];
$tel_estabelecimento_alterou = $linha[38];
$email_estabelecimento_alterou = $linha[39];
$tipo = $linha[40];

}
?>

<table width="100%" border="1" cellspacing="4">
  <tr>
    <td colspan="4"><div align="center"><strong> CUPOM - FAZENDINHA ZOOMIX N&ordm; 
      <?  echo $codigo; ?>
    </strong></div></td>
  </tr>
  <tr>
    <td>Nome</td>
    <td>    <?  echo $nome; ?></td>
    <td>Tipo</td>
    <td><strong>
      <?  echo $tipo; ?>
</strong> </td>
  </tr>
  <tr>
    <td width="15%">Data Nasc </td>
    <td width="37%">      <?  echo $data_nasc; ?>
      m&ecirc;s do anivers&aacute;rio
      
      <?  echo $mes_niver; ?></td>
    <td width="11%">Sexo</td>
    <td width="36%">      <?  echo $sexo; ?>        
    <font color="#0000FF">&nbsp; </font></td>
  </tr>
  <tr>
    <td>Estado Civil </td>
    <td>      <?  echo $estadocivil; ?>
    </td>
    <td>CPF</td>
    <td>      <?  echo $cpf; ?>
    </td>
  </tr>
  <tr>
    <td>RG</td>
    <td>      <?  echo $rg; ?>
      &Oacute;rg&atilde;o
      
      <?  echo $orgao; ?></td>
    <td>Emiss&atilde;o</td>
    <td>      <?  echo $emissao; ?>
      </td>
  </tr>
  <tr>
    <td>Pai</td>
    <td>    <?  echo $pai; ?></td>
    <td>M&atilde;e</td>
    <td>    <?  echo $mae; ?></td>
  </tr>
  <tr>
    <td>Endere&ccedil;o</td>
    <td>      <?  echo $endereco; ?>
    </td>
    <td>N&uacute;mero</td>
    <td>      <?  echo $numero; ?>
    </td>
  </tr>
  <tr>
    <td><p>Bairro</p></td>
    <td>      <?  echo $bairro; ?>
    </td>
    <td>Complemento</td>
    <td>    <?  echo $complemento; ?></td>
  </tr>
  <tr>
    <td>Cidade</td>
    <td>    <?  echo $cidade; ?></td>
    <td>Estado</td>
    <td>    <?  echo $estado; ?></td>
  </tr>
  <tr>
    <td>Cep</td>
    <td>      <?  echo $cep; ?></td>
    <td>Telefone</td>
    <td>      <?  echo $telefone; ?>
    </td>
  </tr>
  <tr>
    <td>Celular</td>
    <td>    <?  echo $celular; ?></td>
    <td>E-Mail</td>
    <td>    <?  echo $email; ?></td>
  </tr>
  <tr>
    <td colspan="2"><strong><font color="#0000FF">
      <input name="dataalteracao" type="hidden" id="dataalteracao" value="<? echo date('d-m-Y'); ?>">
      <input name="horaalteracao" type="hidden" id="horaalteracao" value="<? echo date('H:i:s'); ?>">
      <input name="operador_alterou" type="hidden" id="operador3" value="<? echo $operador_alterou; ?>">
      <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou" value="<? echo $cel_operador_alterou; ?>">
      <input name="email_operador_alterou" type="hidden" id="email_operador_alterou" value="<? echo $email_operador_alterou; ?>">
      <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou" value="<? echo $estab_pertence; ?>">
      <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou" value="<? echo $cidade_estab_pertence; ?>">
      <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou" value="<? echo $tel_estab_pertence; ?>">
      <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou" value="<? echo $email_estab_pertence; ?>">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit3" value="Alterar dados do Cliente">
      <input type="reset" name="Submit22" value="Limpar">
</font></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>---------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>