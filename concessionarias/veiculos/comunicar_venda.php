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

<title>COMUNICADO DE VENDA DE VE&Iacute;CULO</title>

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









<form name="form1" method="post" action="pesquisa.php">

  <?

$cnpj = $_SESSION['cnpj'];

$data_hoje = $_SESSION['data_hoje'];

?>

  <input type="submit" name="Submit3" value="Voltar">

  <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">

</form>

<?

$codigo = $_POST['codigo'];

$concessionaria = $_POST['concessionaria'];

$cnpj = $_POST['cnpj'];



$chassi = $_POST['chassi'];

$renavam = $_POST['renavam'];



$cnpj = $_SESSION['cnpj'];

$data_hoje = $_SESSION['data_hoje'];





if($chassi==""){



$sql = "SELECT * FROM veiculos where renavam = '$renavam'";



}

else{



$sql = "SELECT * FROM veiculos where chassi = '$chassi'";



}

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {



$codigo_veiculo = $linha[0];

$datacadastro = $linha[1];

$horacadastro = $linha[2];

$operador = $linha[3];

$cel_operador = $linha[4];

$email_operador = $linha[5];

$estabelecimento = $linha[6];

$cidade_estabelecimento = $linha[7];

$tel_estabelecimento = $linha[8];

$email_estabelecimento = $linha[9];

$concessionaria = $linha[10];

$cnpj_concessionaria = $linha[11];

$tel_concessionaria = $linha[12];

$email_concessionaria = $linha[13];

$cidade_concessionaria = $linha[14];

$estado_concessionaria = $linha[15];

$veiculo = $linha[16];

$ano = $linha[17];

$modelo = $linha[18];

$chassi = $linha[19];

$renavam = $linha[20];

$placa = $linha[21];

$obs_veiculo = $linha[22];

$dia_inicio_contrato = $linha[23];

$mes_inicio_contrato = $linha[24];

$ano_inicio_contrato = $linha[25];

$dia_termino_contrato = $linha[26];

$mes_termino_contrato = $linha[27];

$ano_termino_contrato = $linha[28];

$nome = $linha[29];

$alcunha = $linha[30];

$data_nasc = $linha[31];

$mes_nasc = $linha[32];

$sexo = $linha[33];

$estadocivil = $linha[34];

$cpf = $linha[35];

$rg = $linha[36];

$orgao = $linha[37];

$emissao = $linha[38];

$pai = $linha[39];

$mae = $linha[40];

$endereco = $linha[41];

$numero = $linha[42];

$bairro = $linha[43];

$complemento = $linha[44];

$cidade = $linha[45];

$estado = $linha[46];

$cep = $linha[47];

$telefone = $linha[48];

$celular = $linha[49];

$email = $linha[50];

$obs = $linha[51];



$status = $linha[61];





?>

<? } ?>

<?



$cnpj = $_SESSION['cnpj'];

$data_hoje = $_SESSION['data_hoje'];





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



?>

<div align="center"><strong>REGISTRO DE MANUTENCAO DE VE&Iacute;CULO</strong>

</div>

<div align="center"></div>

<form name="form1" method="post" action="grava_comunicado_venda.php">



<table width="100%" border="0" cellspacing="4">

    <tr> 

      <td>N&ordm; Contrato </td>

      <td><strong><font color="#0000FF"><? echo $codigo_veiculo; ?></font>

          <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo_veiculo; ?>">

      </strong></td>

      <td>Status</td>

      <td><strong><? echo $status; ?>

          <input name="status" type="hidden" id="status" value="<? echo "Vendido"; ?>">

      </strong></td>

    </tr>

    <tr>

      <td>Concession&aacute;ria</td>

      <td><? echo $concessionaria; ?>

          <input name="concessionaria" type="hidden" id="nome2" value="<? echo $concessionaria; ?>"></td>

      <td>CNPJ</td>

      <td><strong> <? echo $cnpj_concessionaria; ?>

            <input name="cnpj_concessionaria" type="hidden" id="cnpj_concessionaria" value="<? echo $cnpj_concessionaria; ?>">

      </strong> </td>

    </tr>

    <tr>

      <td>Telefone</td>

      <td><? echo $tel_concessionaria; ?>

          <input name="tel_concessionaria" type="hidden" id="tel_concessionaria" value="<? echo $tel_concessionaria; ?>">

      </td>

      <td>E-Mail</td>

      <td> <font color="#0000FF"> <? echo $email_concessionaria; ?>

            <input name="email_concessionaria" type="hidden" id="email_concessionaria" value="<? echo $email_concessionaria; ?>">

      </font></td>

    </tr>

    <tr>

      <td>Cidade</td>

      <td><? echo $cidade_concessionaria; ?>

          <input name="cidade_concessionaria" type="hidden" id="cidade_concessionaria" value="<? echo $cidade_concessionaria; ?>"></td>

      <td>Estado</td>

      <td><? echo $estado_concessionaria; ?>

          <input name="estado_concessionaria" type="hidden" id="estado_concessionaria" value="<? echo $estado_concessionaria; ?>">

      </td>

    </tr>

    <tr>

      <td>Ve&iacute;culo</td>

      <td><? echo $veiculo; ?>        <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>"></td>

      <td>Placas</td>

      <td><? echo $placa; ?>        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>"></td>

    </tr>

    <tr>

      <td>Ano</td>

      <td><? echo $ano; ?>        <input name="ano" type="hidden" id="ano" value="<? echo $ano; ?>"></td>

      <td>Modelo</td>

      <td><? echo $modelo; ?>        <input name="modelo" type="hidden" id="modelo" value="<? echo $modelo; ?>"></td>

    </tr>

    <tr>

      <td>Chassi</td>

      <td><? echo $chassi; ?>        <input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>"></td>

      <td>Renavam</td>

      <td><? echo $renavam; ?>        <input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>"></td>

    </tr>

    <tr>

      <td>Observa&ccedil;&otilde;es</td>

      <td colspan="3"><? echo $obs_veiculo; ?>        <input name="obs_veiculo" type="hidden" id="obs_veiculo" value="<? echo $obs_veiculo; ?>"></td>

    </tr>

    <tr>

      <td>In&iacute;cio Contrato </td>

      <td><strong><font color="#0000FF">        <strong><font color="#0000FF"> </font></strong>        <strong><font color="#0000FF">        <? if($dia_inicio_contrato==""){echo date('d'); } else {echo $dia_inicio_contrato; } ?>

        <input name="dia_inicio_contrato" type="hidden" id="dia_inicio_contrato" value="<? if($dia_inicio_contrato==""){echo date('d'); } else {echo $dia_inicio_contrato; } ?>"> 

        /

        <strong><font color="#0000FF">

        <? if($mes_inicio_contrato==""){echo date('m'); } else {echo $mes_inicio_contrato; } ?>

        <input name="mes_inicio_contrato" type="hidden" id="mes_inicio_contrato" value="<? if($mes_inicio_contrato==""){echo date('m'); } else {echo $mes_inicio_contrato; } ?>">

      </font></strong>/<strong><font color="#0000FF">

      <? if($ano_inicio_contrato==""){echo date('Y'); } else {echo $ano_inicio_contrato; } ?>

      <input name="ano_inicio_contrato" type="hidden" id="dia_inicio_contrato3" value="<? if($ano_inicio_contrato==""){echo date('Y'); } else {echo $ano_inicio_contrato; } ?>">

      </font></strong></font></strong></font></strong></td>

      <td>T&eacute;rmino Contrato </td>

      <td><strong><font color="#0000FF">        <strong><font color="#0000FF"> </font></strong>        <strong><font color="#0000FF">        <strong><font color="#0000FF">

        <? if($dia_termino_contrato==""){echo date('d'); } else {echo $dia_termino_contrato; } ?>

        <input name="dia_termino_contrato" type="hidden" id="dia_inicio_contrato4" value="<? if($dia_termino_contrato==""){echo date('d'); } else {echo $dia_termino_contrato; } ?>">

/ <strong><font color="#0000FF"><strong><font color="#0000FF">

<? if($mes_termino_contrato==""){echo date('m'); } else {echo $mes_termino_contrato; } ?>

<input name="mes_termino_contrato" type="hidden" id="dia_termino_contrato" value="<? if($mes_termino_contrato==""){echo date('m'); } else {echo $mes_termino_contrato; } ?>"> 

/

<strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">

<? if($ano_termino_contrato==""){ echo date('Y')+1; } else {echo $ano_termino_contrato; } ?>

<input name="ano_termino_contrato" type="hidden" id="mes_termino_contrato" value="<? if($ano_termino_contrato==""){ echo date('Y')+1; } else {echo $ano_termino_contrato; } ?>">

</font></strong></font></strong></font></strong></font></strong></font></strong></font></strong> </font></strong> </font></strong></font></strong></td>

    </tr>

    <tr> 

      <td>Nome/Raz&atilde;o Social </td>

      <td><input name="nome" type="text" id="nome2" value="<? echo $nome; ?>" size="50" maxlength="50"></td>

      <td>Alcunha/Nome Fantasia </td>

      <td><strong>

      <input name="alcunha" type="text" id="alcunha" value="<? echo $alcunha; ?>" size="40">

</strong>        </td>

    </tr>

    <tr> 

      <td width="15%">Data Nasc </td>

      <td width="37%"><input name="data_nasc" type="text" id="data_nasc" value="<? echo $data_nasc; ?>" size="15" maxlength="10"></td>

      <td width="11%">Mes Nasc </td>

      <td width="36%">        <font color="#0000FF">

        <input name="mes_nasc" type="text" id="mes_nasc" value="<? echo $mes_nasc; ?>" size="3" maxlength="2"> 

      </font></td>

    </tr>

    <tr>

      <td>Sexo</td>

      <td><select name="sexo" id="select">

        <option selected><? echo $sexo; ?></option>

        <option>Masculino</option>

        <option>Feminino</option>

      </select></td>

      <td>Estado Civil </td>

      <td><select name="estadocivil" id="select2">

        <option selected><? echo $estadocivil; ?></option>

        <?





    $sql = "select * from estado_civil order by estadocivil asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estadocivil']. ">".$x['estadocivil']."</option>";

    }

?>

      </select></td>

    </tr>

    <tr> 

      <td>CPF/CNPJ</td>

      <td><input name="cpf" type="text" id="cpf2" value="<? echo $cpf; ?>" size="50"></td>

      <td>RG/INSCR.EST.</td>

      <td><input name="rg" type="text" id="rg2" value="<? echo $rg; ?>" size="40" maxlength="25"></td>

    </tr>

    <tr>

      <td>&Oacute;rg&atilde;o</td>

      <td>        <input name="orgao" type="text" id="cpf3" value="<? echo $orgao; ?>" size="15" maxlength="14"></td>

      <td>Emiss&atilde;o</td>

      <td><input name="emissao" type="text" id="cpf4" value="<? echo $emissao; ?>" size="15" maxlength="10"> 

        dd-mm-aaaa </td>

    </tr>

    <tr>

      <td>Pai</td>

      <td><input name="pai" type="text" id="pai" value="<? echo $pai; ?>" size="50" maxlength="50"></td>

      <td>M&atilde;e</td>

      <td><input name="mae" type="text" id="endereco3" value="<? echo $mae; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr> 

      <td>Endere&ccedil;o</td>

      <td><input name="endereco" type="text" id="endereco" value="<? echo $endereco; ?>" size="50" maxlength="50"> 

      </td>

      <td>N&uacute;mero</td>

      <td><input name="numero" type="text" id="numero2" value="<? echo $numero; ?>" size="10" maxlength="10"> 

      </td>

    </tr>

    <tr> 

      <td><p>Bairro</p></td>

      <td><input name="bairro" type="text" id="bairro" value="<? echo $bairro; ?>" size="50" maxlength="50"> 

      </td>

      <td>Complemento</td>

      <td><input name="complemento" type="text" id="endereco4" value="<? echo $complemento; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr>

      <td>Cidade</td>

      <td><input name="cidade" type="text" id="cidade" value="<? echo $cidade; ?>" size="50" maxlength="50"></td>

      <td>Estado</td>

      <td><select name="estado" id="select7">

        <option selected><? echo $estado; ?></option>

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

      <td><input name="cep" type="text" id="cep" value="<? echo $cep; ?>" size="9" maxlength="9">

Use o formato 00000-000</td>

      <td>Telefone</td>

      <td><input name="telefone" type="text" id="endereco5" value="<? echo $telefone; ?>" size="15" maxlength="14"> </td>

    </tr>

    <tr> 

      <td>Celular</td>

      <td><input name="celular" type="text" id="telefone" value="<? echo $celular; ?>" size="15" maxlength="14"></td>

      <td>E-Mail</td>

      <td><input name="email" type="text" id="email" value="<? echo $email; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr>

      <td>Obs</td>

      <td colspan="2"><textarea name="obs" cols="50" rows="7" id="obs"><? echo $obs; ?></textarea></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td colspan="2"><strong><font color="#0000FF">

        <input name="data_comunicado" type="hidden" id="data_comunicado" value="<? echo date('d-m-Y'); ?>">

        <input name="hora_comunicado" type="hidden" id="hora_comunicado" value="<? echo date('H:i:s'); ?>">

        <input name="operador_comunicou" type="hidden" id="operador3" value="<? echo $nfantasia; ?>">

        <input name="cel_operador_comunicou" type="hidden" id="cel_operador_comunicou" value="<? echo $cel_concessionaria; ?>">

        <input name="email_operador_comunicou" type="hidden" id="email_operador_comunicou" value="<? echo $email_concessionaria; ?>">

        <input name="estabelecimento_comunicou" type="hidden" id="estabelecimento_comunicou" value="<? echo $nfantasia; ?>">

        <input name="cidade_estabelecimento_comunicou" type="hidden" id="cidade_estabelecimento_comunicou" value="<? echo $cidade_concessionaria; ?>">

        <input name="tel_estabelecimento_comunicou" type="hidden" id="tel_estabelecimento_comunicou" value="<? echo $tel_concessionaria; ?>">

        <input name="email_estabelecimento_comunicou" type="hidden" id="email_estabelecimento_comunicou" value="<? echo $email_concessionaria; ?>">

      </font></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr> 

      <td colspan="2"><?

$cnpj = $_SESSION['cnpj'];

$data_hoje = $_SESSION['data_hoje'];

?>

        <input type="submit" name="Submit" value="Salvar"></td><td><div align="right"> </div></td>

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

      <td colspan="2"><strong>Registro efetuado por <br>

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

      <td><strong>Data do Registro<br>

              <font color="#0000FF"><? echo $datacadastro; ?> </font></strong></td>

      <td><strong>Hora do Registro<br>

      <font color="#0000FF"><? echo $horacadastro; ?> </font></strong></td>

      <td><strong></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

  <?

  	$_SESSION['cnpj'] = $cnpj;

	$_SESSION['data_hoje'] = $data_hoje;

	?>

</form>

<form name="form1" method="post" action="">

<?



$cnpj = $_SESSION['cnpj'];

$data_hoje = $_SESSION['data_hoje'];







$sql = "SELECT * FROM veiculos where codigo = '$codigo'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$data_comunicado = $linha[52];

$hora_comunicado = $linha[53];

$operador_comunicou = $linha[54];

$cel_operador_comunicou = $linha[55];

$email_operador_comunicou = $linha[56];

$estabelecimento_comunicou = $linha[57];

$cidade_estabelecimento_comunicou = $linha[58];

$tel_estabelecimento_comunicou = $linha[59];

$email_estabelecimento_comunicou = $linha[60];

?>



  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="2" valign="top" bgcolor="#CCCCCC"><strong>Comunicado de venda  efetuado por: <br>

      </strong><strong><font color="#0000FF"><? echo $operador_comunicou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="35%" valign="top" bgcolor="#CCCCCC"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>

              <? echo $email_operador_comunicou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="20%" valign="top" bgcolor="#CCCCCC"><strong>Celular:<font color="#0000FF"><br>

              <? echo $cel_operador_comunicou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td width="18%" valign="top" bgcolor="#CCCCCC"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>

          <strong><font color="#0000FF"><? echo $estabelecimento_comunicou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="26%" valign="top" bgcolor="#CCCCCC"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $tel_estabelecimento_comunicou; ?> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $email_estabelecimento_comunicou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong>Cidade: <br>

            <font color="#0000FF"><? echo $cidade_estabelecimento_comunicou; ?> </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td valign="top" bgcolor="#CCCCCC"><strong>Data do Comunicado <br>

            <font color="#0000FF"><? echo $data_comunicado; ?> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong>Hora do Comunicado <br>

      <font color="#0000FF"><? echo $hora_comunicado; ?> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong></strong></td>

      <td valign="top" bgcolor="#CCCCCC">&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

  <? } ?>

</form>

<form name="form1" method="post" action="">

  <?



$cnpj = $_SESSION['cnpj'];

$data_hoje = $_SESSION['data_hoje'];





$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador_alterou = $linha[1];

$cel_operador_alterou = $linha[19];

$email_operador_alterou = $linha[20];

$estabelecimento_alterou = $linha[44];

$cidade_estabelecimento_alterou = $linha[45];

$tel_estabelecimento_alterou = $linha[46];

$email_estabelecimento_alterou = $linha[47];



?>

  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="2"><strong><font color="#FF0000">Comunicado de venda sendo efetuado  por: </font></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td colspan="2"><strong>Ol&aacute;! Seja bem vindo<br>

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

<? } ?>

</form>

</body>

</html>

