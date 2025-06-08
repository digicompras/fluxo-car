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
<title>CADASTRO DE CLIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

require '../../conect/conect.php';

$cpf = $_POST['cpf'];

			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#ffffff"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>
<form name="form2" method="post" action="">
</form>
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit3" value="Voltar">
</form>
<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome = $linha[1];
$celular = $linha[19];
$email = $linha[20];
$estabelecimento = $linha[24];
$cidade_estabelecimento = $linha[25];
$tel_estabelecimento = $linha[26];
$email_estabelecimento = $linha[27];
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];
$tel_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];


?>
<? } ?>
<form name="form1" method="post" action="grava_cadcli.php">

<table width="100%" border="0" cellspacing="4">
    <tr> 
      <td colspan="4"><strong><font color="#0000FF" size="4">Cadastro 
        de clientes! O N&ordm; da matr&iacute;cula ser&aacute; informado ao t&eacute;rmino do cadastro! Data Cadastro </font><font color="#0000FF"><? echo date('d-m-Y'); ?>
        <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo date('d-m-Y'); ?>">
        <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo date('H:i:s'); ?>">
</font></strong></td>
    </tr>
    <tr> 
      <td>Nome</td>
      <td><input name="nome" type="text" id="nome2" size="50" maxlength="50"></td>
      <td>Tipo</td>
      <td><strong></strong>
        <select name="tipo" id="tipo">
          <option selected><? echo $tipo; ?></option>
          <?


    $sql = "select * from tipos order by tipo asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
        </select></td>
    </tr>
    <tr> 
      <td width="15%">Data Nasc </td>
      <td width="35%"><input name="data_nasc" type="text" id="data_nasc" size="15" maxlength="10"> 
      Confirma&ccedil;&atilde;o do m&ecirc;s 
      <input name="mes_nasc" type="text" id="mes_nasc" size="4" maxlength="2"></td>
      <td width="16%">Sexo</td>
      <td width="34%"><select name="sexo" id="sexo">
        <option>Masculino</option>
        <option>Feminino</option>
      </select>        
        <font color="#0000FF">&nbsp; </font></td>
    </tr>
    <tr> 
      <td>Estado Civil </td>
      <td><select name="estadocivil" id="select3">
        <option selected>Selecione</option>
        <?


    $sql = "select * from estado_civil order by estadocivil asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['estadocivil']. ">".$x['estadocivil']."</option>";
    }
?>
      </select>        </td>
      <td>CPF</td>
      <td><input name="cpf" type="text" id="cpf" value="<? echo $cpf; ?>" size="18" maxlength="14"> 
      </td>
    </tr>
    <tr>
      <td>RG</td>
      <td><input name="rg" type="text" id="rg" size="25" maxlength="25"> 
        &Oacute;rg&atilde;o 
        <input name="orgao" type="text" id="cpf3" size="15" maxlength="14"></td>
      <td>Emiss&atilde;o</td>
      <td><input name="emissao" type="text" id="cpf4" size="15" maxlength="10"> 
        dd/mm/aaaa </td>
    </tr>
    <tr>
      <td>Pai</td>
      <td><input name="pai" type="text" id="pai" size="50" maxlength="50"></td>
      <td>M&atilde;e</td>
      <td><input name="mae" type="text" id="endereco3" size="50" maxlength="50"></td>
    </tr>
    <tr> 
      <td>Endere&ccedil;o</td>
      <td><input name="endereco" type="text" id="endereco" size="50" maxlength="50"> 
      </td>
      <td>N&uacute;mero</td>
      <td><input name="numero" type="text" id="numero2" size="10" maxlength="10"> 
      </td>
    </tr>
    <tr> 
      <td><p>Bairro</p></td>
      <td><input name="bairro" type="text" id="bairro" size="50" maxlength="50"> 
      </td>
      <td>Complemento</td>
      <td><input name="complemento" type="text" id="endereco4" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><input name="cidade" type="text" id="cidade" size="50" maxlength="50"></td>
      <td>Estado</td>
      <td><select name="estado" id="select7">
        <option selected>Selecione</option>
        <?


    $sql = "select * from estados_do_brasil order by estado asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr> 
      <td>Cep</td>
      <td><input name="cep" type="text" id="cep" size="9" maxlength="9">
Use o formato 00000-000</td>
      <td>Telefone</td>
      <td><input name="telefone" type="text" id="endereco5" size="15" maxlength="14"> </td>
    </tr>
    <tr> 
      <td>Celular</td>
      <td><input name="celular" type="text" id="telefone" size="15" maxlength="14"></td>
      <td>E-Mail</td>
      <td><input name="email" type="text" id="email" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Banco do cliente </td>
      <td><select name="banco" id="banco">
        
        <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
      </select></td>
      <td>Ag&ecirc;ncia</td>
      <td><input name="agencia" type="text" id="agencia"></td>
    </tr>
    <tr>
      <td>Conta</td>
      <td><input name="conta" type="text" id="conta"></td>
      <td>Senha DATAPREV </td>
      <td><input name="dataprev" type="text" id="dataprev"></td>
    </tr>
    <tr>
      <td>N&ordm; Benef&iacute;cio 1 </td>
      <td colspan="3"><input name="num_beneficio" type="text" id="num_beneficio5" size="12">      Tipo
        <select name="tipo_benef_1" id="select2">
          <option selected><? echo $tipo; ?></option>
          <?


    $sql = "select * from tipos_benef order by tipo asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
                      </select></td>
    </tr>
    <tr>
      <td>N&ordm; Benef&iacute;cio2</td>
      <td colspan="3"><input name="num_beneficio2" type="text" id="num_beneficio22" size="12"> 
        Tipo
          <select name="tipo_benef_2" id="select">
          <option selected><? echo $tipo; ?></option>
          <?


    $sql = "select * from tipos_benef order by tipo asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
                      </select></td>
    </tr>
    <tr>
      <td>N&ordm; Benef&iacute;cio 3 </td>
      <td colspan="3"><input name="num_beneficio3" type="text" id="num_beneficio32" size="12">        
      Tipo
        <select name="tipo_benef_3" id="tipo_benef_3">
          <option selected><? echo $tipo; ?></option>
          <?


    $sql = "select * from tipos_benef order by tipo asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
        </select>        </td>
    </tr>
    <tr>
      <td>N&ordm; Benef&iacute;cio 4</td>
      <td colspan="3"><input name="num_beneficio4" type="text" id="num_beneficio42" size="12">
        Tipo
        <select name="tipo_benef_4" id="select6">
          <option selected><? echo $tipo; ?></option>
          <?


    $sql = "select * from tipos_benef order by tipo asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
        </select></td>
    </tr>
    <tr>
      <td><div align="center">Valor Parcela </div></td>
      <td><div align="center">Banco</div></td>
      <td><div align="center">Valor Parcela </div></td>
      <td><div align="center">Banco</div></td>
    </tr>
    <tr>
      <td><div align="center">
          <input name="parc1" type="text" id="parc1">
      </div></td>
      <td>
        <div align="center">
          <input name="banco1" type="text" id="banco1" size="40">
      </div></td>
      <td><div align="center">
          <input name="vencto1" type="text" id="vencto1">
      </div></td>
      <td>
        <div align="center">
          <input name="compra1" type="text" id="compra1">
      </div></td>
    </tr>
    <tr>
      <td><p align="center">
          <input name="parc2" type="text" id="parc2">
      </p></td>
      <td>
        <div align="center">
          <input name="banco2" type="text" id="banco2" size="40">
      </div></td>
      <td><div align="center">
          <input name="vencto2" type="text" id="vencto2">
      </div></td>
      <td><div align="center">
          <input name="compra2" type="text" id="compra3">
      </div></td>
    </tr>
    <tr>
      <td><div align="center">
          <input name="parc3" type="text" id="parc3">
      </div></td>
      <td><div align="center">
          <input name="banco3" type="text" id="banco3" size="40">
      </div></td>
      <td><div align="center">
          <input name="vencto3" type="text" id="vencto3">
      </div></td>
      <td><div align="center">
          <input name="compra3" type="text" id="compra4">
      </div></td>
    </tr>
    <tr>
      <td><div align="center">
          <input name="parc4" type="text" id="parc4">
      </div></td>
      <td><div align="center">
          <input name="banco4" type="text" id="banco4" size="40">
      </div></td>
      <td><div align="center">
          <input name="vencto4" type="text" id="vencto4">
      </div></td>
      <td>
        <div align="center">
          <input name="compra4" type="text" id="compra5">
      </div></td>
    </tr>
    <tr>
      <td><div align="center">
          <input name="parc5" type="text" id="parc5">
      </div></td>
      <td><div align="center">
          <input name="banco5" type="text" id="banco5" size="40">
      </div></td>
      <td><div align="center">
          <input name="vencto5" type="text" id="vencto5">
      </div></td>
      <td><div align="center">
          <input name="compra5" type="text" id="compra6">
      </div></td>
    </tr>
    <tr>
      <td><div align="center">
          <input name="parc6" type="text" id="parc6">
      </div></td>
      <td><div align="center">
          <input name="banco6" type="text" id="banco6" size="40">
      </div></td>
      <td><div align="center">
          <input name="vencto6" type="text" id="vencto6">
      </div></td>
      <td><div align="center">
          <input name="compra6" type="text" id="compra7">
      </div></td>
    </tr>
    <tr>
      <td><div align="center">
          <input name="parc7" type="text" id="parc7">
      </div></td>
      <td><div align="center">
          <input name="banco7" type="text" id="banco7" size="40">
      </div></td>
      <td><div align="center">
          <input name="vencto7" type="text" id="vencto7">
      </div></td>
      <td><div align="center">
          <input name="compra7" type="text" id="compra8">
      </div></td>
    </tr>
    <tr>
      <td>Obs</td>
      <td colspan="2"><textarea name="obs" cols="40" rows="7" id="obs"></textarea></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><strong><font color="#0000FF">
        <input name="operador" type="hidden" id="operador3" value="<? echo $nome; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence; ?>">
      </font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit" value="Cadastrar Cliente"> 
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
      <td colspan="2"><strong>Operador<br>
      </strong><strong><font color="#0000FF"><? echo $nome; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>
              <? echo $email; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="20%"><strong>Celular:<font color="#0000FF"><br>
              <? echo $celular; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="1%">&nbsp;</td>
    </tr>
    <tr>
      <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>
          <strong><font color="#0000FF"><? echo $estab_pertence; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $tel_estab_pertence; ?> </font></strong></td>
      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $email_estab_pertence; ?> </font><font color="#0000FF"> </font></strong></td>
      <td><strong>Cidade: <br>
            <font color="#0000FF"><? echo $cidade_estab_pertence; ?> </font></strong></td>
      <td>&nbsp;</td>
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
