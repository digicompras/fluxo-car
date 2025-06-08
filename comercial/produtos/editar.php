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
<title>Edi&ccedil;&atilde;o de produtos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style3 {font-size: 10px}
.style4 {color: #000000}
-->
</style>
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
<form action="grava_editar_produto.php" method="post" enctype="multipart/form-data" name="form1">
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


<?

$codigo = $_POST['codigo'];

$sql = "SELECT * FROM produtos where codigo = '$codigo' limit 1";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$tipo_proposta = $linha[1];
$bco_operacao = $linha[2];
$faixa = $linha[3];
$com_bruta = $linha[4];
$a = $linha[5];
$b = $linha[6];
$c = $linha[7];
$data_inicial = $linha[8];
$data_final = $linha[9];
$operador = $linha[10];
$cel_operador = $linha[11];
$email_operador = $linha[12];
$estabelecimento = $linha[13];
$cidade_estabelecimento = $linha[14];
$tel_estabelecimento = $linha[15];
$email_estabelecimento = $linha[16];
$datacadastro = $linha[17];
$horacadastro = $linha[18];
$operador_alterou = $linha[19];
$cel_operador_alterou = $linha[20];
$email_operador_alterou = $linha[21];
$estabelecimento_alterou = $linha[22];
$cidade_estabelecimento_alterou = $linha[23];
$tel_estabelecimento_alterou = $linha[24];
$email_estabelecimento_alterou = $linha[25];
$dataalteracao = $linha[26];
$horaalteracao = $linha[27];
$com_empresa = $linha[28];

?>
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td width="16%">&nbsp;</td>
      <td colspan="7">
<strong><font color="#0000FF" size="4">Tela de edi&ccedil;&atilde;o de produtos!
<input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
<input name="cod_produto" type="hidden" id="cod_produto" value="<? echo $codigo; ?>">
</font></strong></td>
    
    <tr>
      <td bgcolor="#CCCCCC"><span class="style4">Banco de Opera&ccedil;&atilde;o</span></td>
      <td bgcolor="#CCCCCC"><span class="style4">Produto</span></td>
      <td bgcolor="#CCCCCC"><span class="style4">Faixa % </span></td>
      <td width="14%" bgcolor="#CCCCCC"><div align="center">Comiss&atilde;o Empresa </div></td>
      <td width="14%" bgcolor="#CCCCCC"><span class="style4">Comiss&atilde;o Bruta % </span></td>
      <td width="11%" bgcolor="#CCCCCC"><span class="style4">Comiss&atilde;o A% </span></td>
      <td width="11%" bgcolor="#CCCCCC"><span class="style4">Comiss&atilde;o B% </span></td>
      <td width="11%" bgcolor="#CCCCCC"><span class="style4">Comiss&atilde;o C% </span></td>
    </tr>
    <tr>
      <td><span class="style4"><? echo $bco_operacao; ?>
        <input name="bco_operacao" type="hidden" id="bco_operacao" value="<? echo $bco_operacao; ?>">
      </span></td>
      <td><span class="style4"><? echo $tipo_proposta; ?>
        <input name="tipo_proposta" type="hidden" id="tipo_proposta" value="<? echo $tipo_proposta; ?>">
      </span></td>
      <td><div align="center">
        <input name="faixa" type="text" id="faixa" value="<? echo $faixa; ?>" size="5" maxlength="5">
      </div></td>
      <td><div align="center">
        <input name="com_empresa" type="text" id="com_empresa" value="<? echo $com_empresa; ?>" size="5" maxlength="5">
      </div></td>
      <td><div align="center">
        <input name="com_bruta" type="text" id="com_bruta" value="<? echo $com_bruta; ?>" size="5" maxlength="5">
      </div></td>
      <td><div align="center">
        <input name="a" type="text" id="a" value="<? echo $a; ?>" size="5" maxlength="5">
      </div></td>
      <td><div align="center">
        <input name="b" type="text" id="b" value="<? echo $b; ?>" size="5" maxlength="5">
      </div></td>
      <td><div align="center">
        <input name="c" type="text" id="c" value="<? echo $c; ?>" size="5" maxlength="5">
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
        <input name="data_inicial" type="text" id="data_inicial2" value="<? echo $data_inicial; ?>">
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
        <input name="data_final" type="text" id="data_final2" value="<? echo $data_final; ?>">
      </div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="7"><input name="operador_alterou" type="hidden" id="operador_alterou" value="<? echo $nome; ?>">
      <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou" value="<? echo $celular; ?>">
      <input name="email_operador_alterou" type="hidden" id="email_operador_alterou" value="<? echo $email; ?>">
      <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou" value="<? echo $estab_pertence; ?>">
      <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou" value="<? echo $cidade_estab_pertence; ?>">
      <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou" value="<? echo $tel_estab_pertence; ?>">
      <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou" value="<? echo $email_estab_pertence; ?>">
      <input name="dataalteracao" type="hidden" id="datacadastro2" value="<? echo date('d-m-Y'); ?>">
      <input name="horaalteracao" type="hidden" id="horacadastro2" value="<? echo date('H:i:s'); ?>"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td colspan="7"><input type="submit" name="Submit" value="Salvar Altera&ccedil;&otilde;es do Produto">
      <input type="reset" name="Submit2" value="Limpar"></td>
    </tr>
  </table>
  <? } ?>
</form>
<table width="100%"  border="0" bordercolor="#CCCCCC">
  <tr bgcolor="#008080">
    <td bgcolor="#FFFFFF"><div align="center"></div></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2"><div align="center"><strong>Vig&ecirc;ncia</strong></div></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF"><div align="center"></div></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr bgcolor="#008080">
    <td><div align="center" class="style3"><strong>Data Altera&ccedil;&atilde;o </strong></div></td>
    <td><div align="center"><strong><span class="style3">Hora Altera&ccedil;&atilde;o </span></strong></div></td>
    <td><div align="center" class="style3"><strong>Data Inicial </strong></div></td>
    <td><div align="center" class="style3"><strong>Data Final </strong></div></td>
    <td><div align="center" class="style3"><strong>Banco de Opera&ccedil;&atilde;o </strong></div></td>
    <td><div align="center" class="style3"><strong> Produto </strong></div></td>
    <td><div align="center" class="style3"><strong>Faixa </strong></div></td>
    <td><div align="center" class="style3"><strong>Comiss&atilde;o Empresa % </strong></div></td>
    <td><div align="center" class="style3"><strong>Comiss&atilde;o Bruta % </strong></div></td>
    <td><div align="center" class="style3"><strong>Comiss&atilde;o A % </strong></div></td>
    <td width="8%"><div align="center" class="style3"><strong>Comiss&atilde;o B % </strong></div></td>
    <td width="8%"><div align="center" class="style3"><strong>Comiss&atilde;o C % </strong></div></td>
  </tr>
  <?

			
$sql = "SELECT * FROM historico_alteracao_produtos where cod_produto = '$codigo' order by codigo desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$tipo_proposta = $linha[1];
$bco_operacao = $linha[2];
$faixa = $linha[3];
$com_bruta = $linha[4];
$a = $linha[5];
$b = $linha[6];
$c = $linha[7];
$data_inicial = $linha[8];
$data_final = $linha[9];
$operador = $linha[10];
$cel_operador = $linha[11];
$email_operador = $linha[12];
$estabelecimento = $linha[13];
$cidade_estabelecimento = $linha[14];
$tel_estabelecimento = $linha[15];
$email_estabelecimento = $linha[16];
$datacadastro = $linha[17];
$horacadastro = $linha[18];
$operador_alterou = $linha[19];
$cel_operador_alterou = $linha[20];
$email_operador_alterou = $linha[21];
$estabelecimento_alterou = $linha[22];
$cidade_estabelecimento_alterou = $linha[23];
$tel_estabelecimento_alterou = $linha[24];
$email_estabelecimento_alterou = $linha[25];
$dataalteracao = $linha[26];
$horaalteracao = $linha[27];
$cod_produto = $linha[28];
$com_empresa = $linha[29];




?>
  <tr bgcolor="#FFFFFF">
    <td width="8%" height="26"><div align="center" class="style3"><? echo $dataalteracao; ?></div></td>
    <td width="8%"><div align="center" class="style3"><? echo $horaalteracao; ?></div></td>
    <td width="7%"><div align="center" class="style3"><? echo $data_inicial; ?></div></td>
    <td width="7%"><div align="center" class="style3"><? echo $data_final; ?></div></td>
    <td width="11%"><div align="center" class="style3"><? echo $bco_operacao; ?></div></td>
    <td width="11%"><div align="center" class="style3"><? echo $tipo_proposta; ?></div></td>
    <td width="4%">
      <div align="center" class="style3"><? echo $faixa; ?> </div></td>
    <td width="11%"><div align="center" class="style3"><? echo $com_empresa; ?></div></td>
    <td width="9%"><div align="center" class="style3"><? echo $com_bruta; ?> </div></td>
    <td width="8%"><div align="center" class="style3"><? echo $a; ?> </div></td>
    <td><div align="center" class="style3"><? echo $b; ?> </div></td>
    <td><div align="center" class="style3"><? echo $c; ?> </div></td>
    <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
    <? } ?>
</table>
<p>&nbsp; </p>
</body>
</html>
