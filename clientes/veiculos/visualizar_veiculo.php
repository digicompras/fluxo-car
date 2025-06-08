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


$codigo = $_POST['codigo'];
$concessionaria = $_POST['concessionaria'];
$cnpj = $_POST['cnpj'];

$chassi = $_POST['chassi'];
$renavam = $_POST['renavam'];

$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];



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




<?


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

$codigo = $linha[0];
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
<? } ?>
<div align="center">
  <p><font color="#0000FF"><strong>COMUNICADO DE VENDA DE VE&Iacute;CULO</strong>
</font></p>
  <form name="form2" method="post" action="ver_todos_veiculos_da_concessionaria.php">
    <?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
    <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj_concessionaria; ?>">
    <input name="status_filtro" type="hidden" id="status_filtro">
    <input type="submit" name="Submit" value="Voltar">
  </form>
</div>
<div align="center"></div>
<form name="form1" method="post" action="grava_comunicado_venda.php">

<table width="100%" border="1" cellspacing="4">
    <tr> 
      <td><strong>C&oacute;digo do ve&iacute;culo </strong></td>
      <td><strong><font color="#0000FF"><? echo $codigo; ?>
          <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo; ?>">
      </font></strong></td>
      <td><strong>Status</strong></td>
      <td><font color="#0000FF"><strong><? echo $status; ?>
          <input name="status" type="hidden" id="status" value="<? echo "Vendido"; ?>">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong>Concession&aacute;ria</strong></td>
      <td><strong><font color="#0000FF"><? echo $concessionaria; ?>
          <input name="concessionaria" type="hidden" id="nome2" value="<? echo $concessionaria; ?>">
      </font></strong></td>
      <td><strong>CNPJ</strong></td>
      <td><font color="#0000FF"><strong> <? echo $cnpj_concessionaria; ?>
            <input name="cnpj_concessionaria" type="hidden" id="cnpj_concessionaria" value="<? echo $cnpj_concessionaria; ?>">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong>Telefone</strong></td>
      <td><strong><font color="#0000FF"><? echo $tel_concessionaria; ?>
          <input name="tel_concessionaria" type="hidden" id="tel_concessionaria" value="<? echo $tel_concessionaria; ?>">
      </font></strong></td>
      <td><strong>E-Mail</strong></td>
      <td> <strong><font color="#0000FF"> <? echo $email_concessionaria; ?>
            <input name="email_concessionaria" type="hidden" id="email_concessionaria" value="<? echo $email_concessionaria; ?>">
      </font></strong></td>
    </tr>
    <tr>
      <td><strong>Cidade</strong></td>
      <td><strong><font color="#0000FF"><? echo $cidade_concessionaria; ?>
          <input name="cidade_concessionaria" type="hidden" id="cidade_concessionaria" value="<? echo $cidade_concessionaria; ?>">
      </font></strong></td>
      <td><strong>Estado</strong></td>
      <td><font color="#0000FF"><strong><? echo $estado_concessionaria; ?>
          <input name="estado_concessionaria" type="hidden" id="estado_concessionaria" value="<? echo $estado_concessionaria; ?>">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong>Ve&iacute;culo</strong></td>
      <td><strong><font color="#0000FF"><? echo $veiculo; ?>            <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
      </font></strong></td>
      <td><strong>Placas</strong></td>
      <td><font color="#0000FF"><strong><? echo $placa; ?>            <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong>Ano</strong></td>
      <td><strong><font color="#0000FF"><? echo $ano; ?>            <input name="ano" type="hidden" id="ano" value="<? echo $ano; ?>">
      </font></strong></td>
      <td><strong>Modelo</strong></td>
      <td><font color="#0000FF"><strong><? echo $modelo; ?>            <input name="modelo" type="hidden" id="modelo" value="<? echo $modelo; ?>">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong>Chassi</strong></td>
      <td><strong><font color="#0000FF"><? echo $chassi; ?>            <input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>">
      </font></strong></td>
      <td><strong>Renavam</strong></td>
      <td><font color="#0000FF"><strong><? echo $renavam; ?>            <input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>">
      </strong></font></td>
    </tr>
    <tr>
      <td><strong>Observa&ccedil;&otilde;es</strong></td>
      <td colspan="3"><font color="#0000FF"><strong><? echo $obs_veiculo; ?>            <input name="obs_veiculo" type="hidden" id="obs_veiculo" value="<? echo $obs_veiculo; ?>">
      </strong> </font></td>
    </tr>
    <tr>
      <td><strong>In&iacute;cio Contrato </strong></td>
      <td><strong><font color="#0000FF">                         <? echo $dia_inicio_contrato."-"; ?><? echo $mes_inicio_contrato."-"; ?><? echo $ano_inicio_contrato; ?>
        <input name="dia_inicio_contrato" type="hidden" id="dia_inicio_contrato" value="<? echo $dia_inicio_contrato; ?>">
        <input name="mes_inicio_contrato" type="hidden" id="mes_inicio_contrato" value="<? echo $mes_inicio_contrato; ?>">
        <input name="ano_inicio_contrato" type="hidden" id="ano_inicio_contrato" value="<? echo $ano_inicio_contrato; ?>">
      </font></strong></td>
      <td><strong>T&eacute;rmino Contrato </strong></td>
      <td><font color="#0000FF"><strong>                         <? echo $dia_termino_contrato."-"; ?><? echo $mes_termino_contrato."-"; ?><? echo $ano_termino_contrato; ?>
        <input name="dia_termino_contrato" type="hidden" id="dia_termino_contrato" value="<? echo $dia_termino_contrato; ?>">
        <input name="mes_termino_contrato" type="hidden" id="mes_termino_contrato" value="<? echo $mes_termino_contrato; ?>">
        <input name="ano_termino_contrato" type="hidden" id="ano_termino_contrato" value="<? echo $ano_termino_contrato; ?>"> 
      </strong></font></td>
    </tr>
    <tr> 
      <td><strong>Nome/Raz&atilde;o Social </strong></td>
      <td><strong><font color="#0000FF"><? echo $nome; ?>
        <input name="nome" type="hidden" id="nome2" value="<? echo $nome; ?>">
      </font></strong></td><td><strong>Alcunha/Nome Fantasia </strong></td>
      <td><font color="#0000FF"><strong>
      <? echo $alcunha; ?>
      <input name="alcunha" type="hidden" id="alcunha" value="<? echo $alcunha; ?>">
      </strong></font></td>
    </tr>
    <tr> 
      <td width="15%"><strong>Data Nasc </strong></td>
      <td width="37%"><strong><font color="#0000FF"><? echo $data_nasc; ?>
        <input name="data_nasc" type="hidden" id="data_nasc" value="<? echo $data_nasc; ?>">
      </font></strong></td><td width="17%"><strong>Mes Nasc </strong></td>
      <td width="31%">        <strong><font color="#0000FF">
        <? echo $mes_nasc; ?>
        <input name="mes_nasc" type="hidden" id="mes_nasc" value="<? echo $mes_nasc; ?>"> 
      </font></strong></td>
    </tr>
    <tr>
      <td><strong>Sexo</strong></td>
      <td><strong><font color="#0000FF"><? echo $sexo; ?>            <input name="sexo" type="hidden" id="sexo" value="<? echo $sexo; ?>">
      </font></strong></td>
      <td><strong>Estado Civil </strong></td>
      <td><font color="#0000FF"><strong><? echo $estadocivil; ?>            <input name="estadocivil" type="hidden" id="estadocivil" value="<? echo $estadocivil; ?>">
      </strong></font></td>
    </tr>
    <tr> 
      <td><strong>CPF/CNPJ</strong></td>
      <td><strong><font color="#0000FF"><? echo $cpf; ?>
        <input name="cpf" type="hidden" id="cpf2" value="<? echo $cpf; ?>">
      </font></strong></td><td><strong>RG/INSCR.EST.</strong></td>
        <td><font color="#0000FF"><strong><? echo $rg; ?>
        <input name="rg" type="hidden" id="rg2" value="<? echo $rg; ?>">
        </strong></font></td></tr>
    <tr>
      <td><strong>&Oacute;rg&atilde;o</strong></td>
      <td>        <strong><font color="#0000FF"><? echo $orgao; ?>
        <input name="orgao" type="hidden" id="cpf3" value="<? echo $orgao; ?>">
      </font></strong></td>
      <td><strong>Emiss&atilde;o</strong></td>
      <td><font color="#0000FF"><strong><? echo $emissao; ?>
        <input name="emissao" type="hidden" id="cpf4" value="<? echo $emissao; ?>"> 
      </strong></font></td>
    </tr>
    <tr>
      <td><strong>Pai</strong></td>
      <td><strong><font color="#0000FF"><? echo $pai; ?>
        <input name="pai" type="hidden" id="pai" value="<? echo $pai; ?>">
      </font></strong></td><td><strong>M&atilde;e</strong></td>
        <td><font color="#0000FF"><strong><? echo $mae; ?>
        <input name="mae" type="hidden" id="endereco3" value="<? echo $mae; ?>">
        </strong></font></td></tr>
    <tr> 
      <td><strong>Endere&ccedil;o</strong></td>
      <td><strong><font color="#0000FF"><? echo $endereco; ?>
        <input name="endereco" type="hidden" id="endereco" value="<? echo $endereco; ?>"> 
      </font></strong></td><td><strong>N&uacute;mero</strong></td>
      <td><font color="#0000FF"><strong><? echo $numero; ?>
        <input name="numero" type="hidden" id="numero2" value="<? echo $numero; ?>"> 
      </strong></font></td></tr>
    <tr> 
      <td><p><strong>Bairro</strong></p></td>
      <td><strong><font color="#0000FF"><? echo $bairro; ?>
        <input name="bairro" type="hidden" id="bairro" value="<? echo $bairro; ?>"> 
      </font></strong></td><td><strong>Complemento</strong></td>
      <td><font color="#0000FF"><strong><? echo $complemento; ?>
        <input name="complemento" type="hidden" id="endereco4" value="<? echo $complemento; ?>">
      </strong></font></td></tr>
    <tr>
      <td><strong>Cidade</strong></td>
      <td><strong><font color="#0000FF"><? echo $cidade; ?>
        <input name="cidade" type="hidden" id="cidade" value="<? echo $cidade; ?>">
      </font></strong></td><td><strong>Estado</strong></td>
      <td><font color="#0000FF"><strong><? echo $estado; ?>
        <input name="estado" type="hidden" id="estado" value="<? echo $estado; ?>">
      </strong></font></td></tr>
    <tr> 
      <td><strong>Cep</strong></td>
      <td><strong><font color="#0000FF"><? echo $cep; ?>
        <input name="cep" type="hidden" id="cep" value="<? echo $cep; ?>">
      </font></strong></td><td><strong>Telefone</strong></td>
      <td><font color="#0000FF"><strong><? echo $telefone; ?>
        <input name="telefone" type="hidden" id="endereco5" value="<? echo $telefone; ?>"> 
        </strong></font></td></tr>
    <tr> 
      <td><strong>Celular</strong></td>
      <td><strong><font color="#0000FF"><? echo $celular; ?>
        <input name="celular" type="hidden" id="telefone" value="<? echo $celular; ?>">
      </font></strong></td><td><strong>E-Mail</strong></td>
        <td><font color="#0000FF"><strong><? echo $email; ?>
        <input name="email" type="hidden" id="email" value="<? echo $email; ?>">
        </strong></font></td></tr>
    <tr>
      <td><strong>Obs</strong></td>
      <td colspan="3"><font color="#0000FF"><strong><? echo $obs; ?>
        <input name="obs" type="hidden" id="obs" value="<? echo $bos; ?>">
      </strong> </font></td>
    </tr>
    <tr>
      <td colspan="4"><strong><font color="#0000FF">
        <input name="data_comunicado" type="hidden" id="data_comunicado" value="<? echo date('d-m-Y'); ?>">
        <input name="hora_comunicado" type="hidden" id="hora_comunicado" value="<? echo date('H:i:s'); ?>">
        <input name="operador_comunicou" type="hidden" id="operador3" value="<? echo $operador_alterou; ?>">
        <input name="cel_operador_comunicou" type="hidden" id="cel_operador_comunicou" value="<? echo $cel_operador_alterou; ?>">
        <input name="email_operador_comunicou" type="hidden" id="email_operador_comunicou" value="<? echo $email_operador_alterou; ?>">
        <input name="estabelecimento_comunicou" type="hidden" id="estabelecimento_comunicou" value="<? echo $estabelecimento_alterou; ?>">
        <input name="cidade_estabelecimento_comunicou" type="hidden" id="cidade_estabelecimento_comunicou" value="<? echo $cidade_estabelecimento_alterou; ?>">
        <input name="tel_estabelecimento_comunicou" type="hidden" id="tel_estabelecimento_comunicou" value="<? echo $tel_estabelecimento_alterou; ?>">
        <input name="email_estabelecimento_comunicou" type="hidden" id="email_estabelecimento_comunicou" value="<? echo $email_estabelecimento_alterou; ?>">
      </font></strong></td>
    </tr>
    <tr> 
      <td colspan="4"><?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
        <? if($status=="Vendido"){} else{ echo"<input type='submit' name='Submit' value='Efetivar comunicado de venda'>"; } ?> 
          <? if($status=="Vendido"){} else{ echo"<input type='reset' name='Submit2' value='Limpar'>"; } ?>        <div align="right"> </div></td>
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
  	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
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
      <td colspan="2" valign="top" bgcolor="#CCCCCC"><strong>Comunicado de venda  efetuado pelo operador: <br>
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
</body>
</html>
