<?php

session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

header("Location: alerta.php");


ini_set('default_charset','UTF8_general_mysql500_ci');
?>



<html>

<script language="Javascript">

function right(e) {

if (navigator.appName == 'Netscape' && (e.which == 3 || e.which == 2)){

alert("ATEN�AO!!!... N�O � PERMITIDO C�PIAS!");

return false;

}

else if (navigator.appName == 'Microsoft Internet Explorer' &&

(event.button == 2 || event.button == 3)) {

alert("ATEN�AO!!!... N�O � PERMITIDO C�PIAS!");

return false;

}

return true;

}

document.onmousedown=right;

if (document.layers) window.captureEvents(Event.MOUSEDOWN);

window.onmousedown=right;

</script>

<head>

<title>CADASTRO DE CLIENTES</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?

require '../../../conect/conect.php';


?>





<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
<form name="form2" method="post" action="">

</form>

<form name="form1" method="post" action="../../index.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
  <input type="hidden" name="nome" id="nome" />
<input class='class01' type="submit" name="Submit3" value="Voltar">

</form>

<?

$cpf = $_POST['cpf'];



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$nome = $linha[1];

$orientacaosexual = $linha[2];

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

$banco = $linha[41];

$agencia = $linha[42];

$conta = $linha[43];

$num_beneficio = $linha[44];



$parc1 = $linha[45];

$banco1 = $linha[46];

$vencto1 = $linha[47];

$compra1 = $linha[48];



$parc2 = $linha[49];

$banco2 = $linha[50];

$vencto2 = $linha[51];

$compra2 = $linha[52];



$parc3 = $linha[53];

$banco3 = $linha[54];

$vencto3 = $linha[55];

$compra3 = $linha[56];



$parc4 = $linha[57];

$banco4 = $linha[58];

$vencto4 = $linha[59];

$compra4 = $linha[60];



$parc5 = $linha[61];

$banco5 = $linha[62];

$vencto5 = $linha[63];

$compra5 = $linha[64];



$parc6 = $linha[65];

$banco6 = $linha[66];

$vencto6 = $linha[67];

$compra6 = $linha[68];



$parc7 = $linha[69];

$banco7 = $linha[70];

$vencto7 = $linha[71];

$compra7 = $linha[72];



$num_beneficio2 = $linha[73];

$num_beneficio3 = $linha[74];

$num_beneficio4 = $linha[75];



$dataprev2 = $linha[76];

$obs2 = $linha[77];





$dataprev = $linha[76];

$cpf_rg = $linha[78];

$comp_end = $linha[79];

$comp_quit1 = $linha[80];

$comp_quit2 = $linha[81];

$comp_quit3 = $linha[82];

$comp_quit4 = $linha[83];

$comp_quit5 = $linha[84];

$comp_quit6 = $linha[85];

$comp_renda = $linha[86];

$cpf_rg_testemunha = $linha[87];

$mes_niver = $linha[88];

$status_cliente = $linha[89];

$tem_margem = $linha[90];
$saldo1 = $linha[91];
$saldo2 = $linha[92];
$saldo3 = $linha[93];
$saldo4 = $linha[94];
$saldo5 = $linha[95];
$saldo6 = $linha[96];
$saldo7 = $linha[97];

$local_trabalho = $linha[134];
$fone_comercial = $linha[135];
$newsletter = $linha[136];

$empresaconveniada = $linha[137];
$comandadofuncionario = $linha[138];
$statusfuncionario = $linha[139];
	$nomesocial = $linha[141];

} ?>

<?



if($mes_niver == ""){

echo "<script>

alert('ATEN��O!!!... INFORME O M�S DO ANIVERS�RIO QUE SE ENCONTRA AO LADO DA DATA DE NASCIMENTO!.');

</script>";

}

?>



<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador_alterou = $linha[1];

$cel_operador_alterou = $linha[19];

$email_operador_alterou = $linha[20];

$estabelecimento_alterou = $linha[24];

$cidade_estabelecimento_alterou = $linha[25];

$tel_estabelecimento_alterou = $linha[26];

$email_estabelecimento_alterou = $linha[27];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];





?>

<? } ?>

<?

//Define o caminho da pasta/arquivo

//$pasta = "../../$cpf";

//$jaexiste = "Pasta do cliente existente!";

?>

<div align="center">

  <strong><font color="#0000FF" size="4">Tela de edi&ccedil;&atilde;o do cadastro de clientes!</font></strong></div>
            <p>
<?

$data_nascimento = $data_nasc;

$data_nascimento2 = explode("-", $data_nasc);



$dia_nasc = $data_nascimento2[0];

$mes_nasc = $data_nascimento2[1];

$ano_nasc = $data_nascimento2[2];



?>
</p>
<form name="form1" method="post" action="grava_editar_cliente.php">
  <table width="100%" border="0" cellspacing="4">

    <tr>
      <td>Codigo</td>
      <td><strong><font color="#0000FF"><? echo $codigo; ?></font>
          <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 

      <td>Empresa Conveniada</td>

      <td><select class='class02' name="empresaconveniada" id="estado">
        <option selected><? echo "$empresaconveniada"; ?></option>
        <?

    $sql = "select * from estabelecimentos where status = 'Ativo' order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
      </select></td>

      <td>Status</td>

      <td><select class='class02' name="status_cliente" id="status_cliente">
        
        <option selected><? echo $status_cliente; ?></option>
        
        <option>Ativo</option>
        
        <option>Inativo</option>
        
      </select></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Tipo</td>
      <td><strong>
        <select class='class02' name="tipo" id="tipo">
          <option selected><? echo $tipo; ?></option>
          <?





    $sql = "select * from tipos order by tipo asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['tipo']."</option>";

    }

?>
        </select>
      </strong></td>
    </tr>
    <tr> 

      <td>Nome</td>

      <td><input class='class02' name="nome" type="text" id="nome" value="<? echo $nome; ?>" size="50" maxlength="50"></td>

      <td>Nome Social</td>

      <td><input class='class02' name="nomesocial" type="text" id="nomesocial" value="<? echo $nomesocial; ?>" size="50" maxlength="50"></td>
    </tr>

    <tr> 

      <td width="11%">Data Nasc </td>

      <td width="26%"><input class='class02' name="data_nasc" type="text" id="data_nasc" value="<? echo $data_nasc; ?>" size="15" maxlength="10">

        m&ecirc;s do anivers&aacute;rio

      <input class='class02' name="mes_niver" type="text" id="mes_niver" value="<? echo $mes_niver; ?>" size="4" maxlength="2"></td>

      <td width="14%">Orienta&ccedil;&atilde;o Sexual</td>

      <td width="23%"><select class='class02' name="sexo" id="sexo">
		  <option selected><? echo "$orientacaosexual"; ?></option>
        <?

    $sql = "select * from orientacaosexual order by codigo asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['sexo']."</option>";

    }

?>
      </select>        <font color="#0000FF">&nbsp; </font></td>
    </tr>

    <tr> 

      <td>Estado Civil </td>

      <td><select class='class02' name="estadocivil" id="select3">

        <option selected><? echo $estadocivil; ?></option>

        <?

    $sql = "select * from estado_civil order by estadocivil asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['estadocivil']."</option>";

    }

?>

      </select>        </td>

      <td>CPF</td>

      <td><input class='class02' name="cpf" type="text" id="cpf" value="<? echo $cpf; ?>" size="18" maxlength="14">      </td>
    </tr>

    <tr>

      <td>RG</td>

      <td><input class='class02' name="rg" type="text" id="rg" value="<? echo $rg; ?>" size="25" maxlength="25"> 

        &Oacute;rg&atilde;o 

        <input class='class02' name="orgao" type="text" id="cpf3" value="<? echo $orgao; ?>" size="15" maxlength="14"></td>

      <td>Emiss&atilde;o</td>

      <td><input class='class02' name="emissao" type="text" id="cpf4" value="<? echo $emissao; ?>" size="15" maxlength="10"> 

        dd/mm/aaaa </td>
    </tr>

    <tr> 

      <td>Endere&ccedil;o</td>

      <td><input class='class02' name="endereco" type="text" id="endereco" value="<? echo $endereco; ?>" size="50" maxlength="50">      </td>

      <td>N&uacute;mero</td>

      <td><input class='class02' name="numero" type="text" id="numero2" value="<? echo $numero; ?>" size="10" maxlength="10">      </td>
    </tr>

    <tr> 

      <td><p>Bairro</p></td>

      <td><input class='class02' name="bairro" type="text" id="bairro" value="<? echo $bairro; ?>" size="50" maxlength="50">      </td>

      <td>Complemento</td>

      <td><input class='class02' name="complemento" type="text" id="endereco4" value="<? echo $complemento; ?>" size="50" maxlength="50"></td>
    </tr>

    <tr>

      <td>Cidade</td>

      <td><input class='class02' name="cidade" type="text" id="cidade" value="<? echo $cidade; ?>" size="50" maxlength="50"></td>

      <td>Estado</td>

      <td><select class='class02' name="estado" id="select7">
        
        <option selected><? echo $estado; ?></option>
        
        <?

    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['estado']."</option>";

    }

?>
        
      </select></td>
    </tr>

    <tr> 

      <td>Cep</td>

      <td><input class='class02' name="cep" type="text" id="cep" value="<? echo $cep; ?>" size="9" maxlength="9">

Use o formato 00000-000</td>

      <td>Telefone</td>

      <td><input class='class02' name="telefone" type="text" id="endereco5" value="<? echo $telefone; ?>" size="15" maxlength="14"> </td>
    </tr>

    <tr> 

      <td>Celular</td>

      <td><input class='class02' name="celular" type="text" id="telefone" value="<? echo $celular; ?>" size="15" maxlength="14"> 

      Outros Telefones 

        <select class='class02' name="outros_telefones" id="outros_telefones">

          <?

    $sql = "select * from telefones_de_clientes where cod_cli = '$codigo' order by telefone asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['telefone']."</option>";

    }

?>
        </select></td>

      <td>E-Mail</td>

      <td><input class='class02' name="email" type="text" id="email" value="<? echo $email; ?>" size="50" maxlength="50"></td>
    </tr>
    

    <tr>
      <td>Local de Trabalho</td>
      <td><input class='class02' name="local_trabalho" type="text" id="local_trabalho" value="<? echo $local_trabalho; ?>" size="50"></td>
      <td>Telefone Comercial</td>
      <td><input class='class02' name="fone_comercial" type="text" id="fone_comercial" value="<? echo $fone_comercial; ?>"></td>
    </tr>
    <tr>

      <td>Receber Newsletter?</td>

      <td colspan="2">      <strong><font color="#0000FF">
        <select class='class02' name="newsletter" id="newsletter">
          <option selected><? echo $newsletter; ?></option>
          <option>Sim</option>
          <option>N&atilde;o</option>
        </select>
      </font></strong></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>Obs</td>

      <td><textarea class='class02' name="obs" cols="45" rows="7" id="obs"></textarea></td>

      <td colspan="2" valign="top"><textarea class='class02' name="obs2" cols="45" rows="7" readonly="readonly" id="obs2"><?  

$sql = "SELECT * FROM observacoes_de_clientes where cpf = '$cpf' order by codigo desc";

$res = mysql_query($sql);

$reg = 0;

//echo "<tr>";

while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$cod_cli = $linha[1];

$cpf = $linha[2];

$data = $linha[3];

$hora = $linha[4];

$observacoes_do_cliente = $linha[5];

$operador = $linha[6];





echo "$data - "."$observacoes_do_cliente - "."$operador";

?>



<?



if($reg==1){

//echo "</tr>";

$reg=0;

}





}

	  

	  

	  

	  

	   ?>
      </textarea></td>
    </tr>

    <tr>

      <td colspan="2"><strong><font color="#0000FF">

        <input name="pai" type="hidden" id="pai" value="<? echo $pai; ?>">
        <input name="mae" type="hidden" id="endereco3" value="<? echo $mae; ?>">
        <input name="dataalteracao" type="hidden" id="dataalteracao" value="<? echo date('d-m-Y'); ?>">

        <input name="horaalteracao" type="hidden" id="horaalteracao" value="<? echo date('H:i:s'); ?>">

        <input name="operador_alterou" type="hidden" id="operador3" value="<? echo $operador_alterou; ?>">

        <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou" value="<? echo $cel_operador_alterou; ?>">

        <input name="email_operador_alterou" type="hidden" id="email_operador_alterou" value="<? echo $email_operador_alterou; ?>">

        <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou" value="<? echo $estab_pertence; ?>">

        <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou" value="<? echo $cidade_estab_pertence; ?>">

        <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou" value="<? echo $tel_estab_pertence; ?>">

        <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou" value="<? echo $email_estab_pertence; ?>">

      </font></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td colspan="2"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input class='class01' type="submit" name="Submit" value="Salvar"></td><td><div align="right"> </div></td>

      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td colspan="2">&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
    </tr>
  </table>

</form>
</body>

</html>

