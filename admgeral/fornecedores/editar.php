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

<title>ALTERA&Ccedil;&Atilde;O DO CADASTRO DE FORNECEDOR</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../../conect/conect.php';







$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;

?>





<body bgcolor="#<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>

  

<? } ?>









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



$nfantasia = $_POST['nfantasia'];





$sql = "SELECT * FROM fornecedores where nfantasia = '$nfantasia'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

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

$estab_pertence = $linha[45];

$email_representante = $linha[42];
	
	$banco = $linha[43];
	$codagencia = $linha[44];
	$digitoagencia = $linha[45];
	$conta = $linha[46];
	$digitoconta = $linha[47];
	$tipoconta = $linha[48];
	$titularconta = $linha[49];
	$nomeagencia = $linha[50];
	

?>

<? } ?>



<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador_alterou = $linha[1];

$cel_operador_alterou = $linha[12];

$email_operador_alterou = $linha[13];

$estabelecimento_alterou = $linha[18];

$cidade_estabelecimento_alterou = $linha[19];

$tel_estabelecimento_alterou = $linha[20];

$email_estabelecimento_alterou = $linha[21];



?>

<? } ?>

<form name="form1" method="post" action="grava_editar.php">

  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td>&nbsp;</td>

      <td colspan="3"><strong><font color="#0000FF" size="4">Tela de edi&ccedil;&atilde;o do cadastro de fornecedor!. </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>C&oacute;digo</td>

      <td><? echo $codigo; ?> <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>"></td>

      <td>Pertence ao estabelecimento</td>

      <td><select name="estab_pertence" id="operador_atendente">
        <option selected>Selecione a empresa</option>
        <?

    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
      </select></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td width="13%">Raz&atilde;o Social </td>

      <td width="28%"><input name="razaosocial" type="text" id="razaosocial" value="<? echo $razaosocial; ?>" size="50" maxlength="50"></td>

      <td width="20%">Nome Fantasia </td>

      <td width="38%"> <font color="#0000FF">

        <input name="nfantasia" type="text" id="data_nasc2" value="<? echo $nfantasia; ?>" size="50" maxlength="50">

      </font></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td>CNPJ</td>

      <td><input name="cnpj" type="text" id="cnpj" value="<? echo $cnpj; ?>"></td>

      <td>INSCR EST </td>

      <td><input name="inscr_est" type="text" id="inscr_est" value="<? echo $inscr_est; ?>" size="25" maxlength="25"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>Endere&ccedil;o</td>

      <td><input name="endereco" type="text" id="endereco" value="<? echo $endereco; ?>" size="50" maxlength="50">

      </td>

      <td>N&uacute;mero</td>

      <td><input name="numero" type="text" id="numero2" value="<? echo $numero; ?>" size="10" maxlength="10">

      </td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><p>Bairro</p></td>

      <td><input name="bairro" type="text" id="bairro" value="<? echo $bairro; ?>" size="50" maxlength="50">

      </td>

      <td>Complemento</td>

      <td><input name="complemento" type="text" id="endereco4" value="<? echo $complemento; ?>" size="50" maxlength="50"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>Cep</td>

      <td><input name="cep" type="text" id="cep2" value="<? echo $cep; ?>" size="9" maxlength="9">

      Use o formato 00000-000</td>

      <td>Cidade</td>

      <td><input name="cidade" type="text" id="cidade2" value="<? echo $cidade; ?>" size="50" maxlength="50"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>Estado</td>

      <td><select name="estado" id="select">

          <option selected><? echo $estado; ?></option>

          <?





    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";

    }

?>

      </select></td>

      <td>Telefone</td>

      <td><input name="telefone" type="text" id="telefone2" value="<? echo $telefone; ?>" size="15" maxlength="14"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>Fax</td>

      <td><input name="fax" type="text" id="telefone3" value="<? echo $fax; ?>" size="15" maxlength="14"></td>

      <td>E-Mail</td>

      <td><input name="email" type="text" id="email" value="<? echo $email; ?>" size="50" maxlength="50">

      </td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>Site</td>

      <td><input name="site" type="text" id="telefone" value="<? echo $site; ?>" size="50" maxlength="50"></td>

      <td>Representante</td>

      <td><input name="proprietario" type="text" id="site" value="<? echo $proprietario; ?>" size="50" maxlength="50"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>"></td>

      <td>Celular</td>

      <td><input name="rg" type="text" id="rg" value="<? echo $rg; ?>"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Email Representante</td>
      <td><input name="email_representante" type="text" id="email_representante" value="<? echo $email_representante; ?>" size="50" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td>Obs</td>

      <td colspan="2"><textarea name="obs" cols="50" rows="7" id="obs"><? echo $obs; ?></textarea></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4" align="center"><strong><font color="#0000FF">

        <input name="dataalteracao" type="hidden" id="dataalteracao" value="<? echo date('d-m-Y'); ?>">

        <input name="horaalteracao" type="hidden" id="horaalteracao" value="<? echo date('H:i:s'); ?>">

        <input name="operador_alterou" type="hidden" id="operador_alterou" value="<? echo $operador_alterou; ?>">

        <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou" value="<? echo $cel_operador_alterou; ?>">

        <input name="email_operador_alterou" type="hidden" id="email_operador_alterou" value="<? echo $email_operador_alterou; ?>">

        <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou" value="<? echo $estabelecimento_alterou; ?>">

        <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou" value="<? echo $cidade_estabelecimento_alterou; ?>">

        <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou" value="<? echo $tel_estabelecimento_alterou; ?>">

        <input name="motivo_exclusao" type="hidden" id="motivo_exclusao">
        <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou" value="<? echo $email_estabelecimento_alterou; ?>">
      DADOS BANCARIOS</font></strong></td>
      <td>&nbsp;</td>

    </tr>
    <tr>
      <td>Banco</td>
      <td>Cod Agencia - DV</td>
      <td>Conta - DV</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF">
        <select class='class02' name="banco" id="banco">
          <option selected><? echo $banco; ?></option>
          <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
        </select>
      </font></strong></td>
      <td><font color="#0000FF">
        <input name="codagencia" type="text" class='class02' id="codagencia" value="<? echo $codagencia; ?>" size="10">
        -
  <input class='class02' name="digitoagencia" type="text" id="digitoagencia" value="<? echo $digitoagencia; ?>" size="5">
      </font></td>
      <td colspan="2"><font color="#0000FF">
        <input name="conta" type="text" class='class02' id="conta" value="<? echo $conta; ?>" size="10">
        -
  <input class='class02' name="digitoconta" type="text" id="digitoconta" value="<? echo $digitoconta; ?>" size="5">
      </font></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Tipo de Conta</td>
      <td>Nome Titular</td>
      <td>Nome Agencia</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF">
        <select class='class02' name="tipoconta" id="tipoconta">
			<option selected><? echo $tipoconta; ?></option>
          <?

    $sql = "select * from tipos_contas order by tipo_conta asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_conta']."</option>";
    }
?>
        </select>
      </font></strong></td>
      <td><strong><font color="#0000FF">
        <input class='class02' name="titularconta" type="text" id="titularconta" value="<? echo $titularconta; ?>">
      </font></strong></td>
      <td><font color="#0000FF">
        <input class='class02' name="nomeagencia" type="text" id="nomeagencia" value="<? echo $nomeagencia; ?>">
      </font></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td colspan="2"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

          <input type="submit" name="Submit" value="Alterar dados do Fornecedor"></td>

      <td><div align="right"> </div></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td colspan="2">&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

</form>

<form name="form1" method="post" action="calcula_pedido.php">

  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="2"><strong>Cadastro efetuado por <br>

        </strong><strong><font color="#0000FF"><? echo $operador; ?>

        

      </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>

              <? echo $email_operador; ?>

      </font><font color="#0000FF"> </font></strong></td>

      <td width="20%"><strong>Celular:<font color="#0000FF"><br>

              <? echo $cel_operador; ?>

      </font><font color="#0000FF"> </font></strong></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>

          <strong><font color="#0000FF"><? echo $estabelecimento; ?>        </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $tel_estabelecimento; ?>

      </font></strong></td>

      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $email_estabelecimento; ?>

      </font><font color="#0000FF"> </font></strong></td>

      <td><strong>Cidade: <br>

            <font color="#0000FF"><? echo $cidade_estabelecimento; ?>          </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td> <strong>Data do Cadastro <br>

              <font color="#0000FF"><? echo $datacadastro; ?> </font></strong></td>

      <td><strong>Hora que foi efetuado o Cadastro <br>

              <font color="#0000FF"><? echo $horacadastro; ?> </font></strong></td>

      <td><strong></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

  <?

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	?>

</form>

<strong><font color="#FF0000"></font></strong>

<form name="form1" method="post" action="calcula_pedido.php">

<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM estabelecimentos where nfantasia = '$nfantasia'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

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



?>

  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="4" bgcolor="#CCCCCC"><div align="center"><strong><font color="#FF0000">&Uacute;ltima altera&ccedil;&atilde;o efetuada  por: </font></strong>

      </div></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td colspan="2" bgcolor="#CCCCCC"><strong>Operador<br>

        </strong><strong><font color="#0000FF"><? echo $operador_alterou; ?>

        

      </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="35%" bgcolor="#CCCCCC"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>

              <? echo $email_operador_alterou; ?>

      </font><font color="#0000FF"> </font></strong></td>

      <td width="20%" bgcolor="#CCCCCC"><strong>Celular:<font color="#0000FF"><br>

              <? echo $cel_operador_alterou; ?>

      </font><font color="#0000FF"> </font></strong></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td width="18%" bgcolor="#CCCCCC"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>

          <strong><font color="#0000FF"><? echo $estabelecimento_alterou; ?>        </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="26%" bgcolor="#CCCCCC"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $tel_estabelecimento_alterou; ?>

      </font></strong></td>

      <td bgcolor="#CCCCCC"><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $email_estabelecimento_alterou; ?>

      </font><font color="#0000FF"> </font></strong></td>

      <td bgcolor="#CCCCCC"><strong>Cidade: <br>

            <font color="#0000FF"><? echo $cidade_estabelecimento_alterou; ?>          </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td bgcolor="#CCCCCC"><strong><font color="#0000FF"> </font>Data &uacute;ltima altera&ccedil;&atilde;o <font color="#0000FF"> <br>

              <? echo $dataalteracao; ?> </font></strong></td>

      <td bgcolor="#CCCCCC"><strong>Hora &uacute;ltima altera&ccedil;&atilde;o <font color="#0000FF"> <br>

              <? echo $horaalteracao; ?> </font></strong></td>

      <td bgcolor="#CCCCCC"><strong></strong></td>

      <td bgcolor="#CCCCCC">&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

  <?

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	?>

  <? } ?>  

  <strong><font color="#FF0000">

  

  </font></strong>

</form>

<form name="form1" method="post" action="calcula_pedido.php">

  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="2"><strong><font color="#FF0000">Cadastro sendo atualmente alterado por: 

        <?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador_alterou = $linha[1];

$cel_operador_alterou = $linha[12];

$email_operador_alterou = $linha[13];

$estabelecimento_alterou = $linha[18];

$cidade_estabelecimento_alterou = $linha[19];

$tel_estabelecimento_alterou = $linha[20];

$email_estabelecimento_alterou = $linha[21];



?>

      </font></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td colspan="2"><strong>Operador<br>

      </strong><strong><font color="#0000FF"><? echo $operador_alterou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>

              <? echo $email_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="20%"><strong>Celular:<font color="#0000FF"><br>

              <? echo $cel_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>

          <strong><font color="#0000FF"><? echo $estabelecimento_alterou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $tel_estabelecimento_alterou; ?> </font></strong></td>

      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $email_estabelecimento_alterou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td><strong>Cidade: <br>

            <font color="#0000FF"><? echo $cidade_estabelecimento_alterou; ?> </font></strong></td>

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

  <?

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	?>

  <strong><font color="#FF0000">

  <? } ?>

  </font></strong>

</form>

</body>

</html>

