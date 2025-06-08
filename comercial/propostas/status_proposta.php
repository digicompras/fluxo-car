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
<title>ALTERA&Ccedil;&Atilde;O DE STATUS DE PROPOSTA</title>
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




<?


$num_proposta = $_POST['num_proposta'];
//$percentual = $_POST['percentual']/100;
//$spread = ($_POST['percentual'])/100;



$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`quoeficiente` = '$percentual' where `propostas`. `num_proposta` = '$num_proposta' limit 1 ";
}
mysql_query($comando,$conexao);




$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$num_proposta = $linha[0];
$nome_operador = $linha[1];
$tipo = $linha[2];
$estabelecimento_proposta = $linha[3];
$nome = $linha[4];
$sexo = $linha[5];
$estadocivil = $linha[6];
$cpf = $linha[7];
$rg = $linha[8];
$orgao = $linha[9];
$emissao = $linha[10];
$data_nasc = $linha[11];
$pai = $linha[12];
$mae = $linha[13];
$endereco = $linha[14];
$numero = $linha[15];
$bairro = $linha[16];
$complemento = $linha[17];
$cidade = $linha[18];
$estado = $linha[19];
$cep = $linha[20];
$telefone = $linha[21];
$celular = $linha[22];
$email = $linha[23];
$num_beneficio = $linha[24];
$valor_credito = $linha[25];
$quant_parc = $linha[26];
$parcela = $linha[27];
$banco_pagto = $linha[28];
$num_banco = $linha[29];
$agencia = $linha[30];
$conta = $linha[31];
$operador = $linha[32];
$cel_operador = $linha[33];
$email_operador = $linha[34];
$estabelecimento = $linha[35];
$cidade_estabelecimento = $linha[36];
$tel_estabelecimento = $linha[37];
$email_estabelecimento = $linha[38];
$obs = $linha[39];
$dataproposta = $linha[40];
$horaproposta = $linha[41];
$dataalteracao = $linha[42];
$horaalteracao = $linha[43];
$operador_alterou = $linha[44];
$cel_operador_alterou = $linha[45];
$email_operador_alterou = $linha[46];
$estabelecimento_alterou = $linha[47];
$cidade_estabelecimento_alterou = $linha[48];
$tel_estabelecimento_alterou = $linha[49];
$email_estabelecimento_alterou = $linha[50];
$status = $linha[51];
$retorno = $linha[85];
$bco_operacao = $linha[86];
$valor_a_receber = $linha[87];
$recebido = $linha[88];
$data_recebimento = $linha[89];


$parc1 = $linha[52];
$banco1 = $linha[53];
$vencto1 = $linha[54];
$compra1 = $linha[55];

$num_beneficio2 = $linha[80];
$num_beneficio3 = $linha[81];
$num_beneficio4 = $linha[82];

$tipo_proposta = $linha[83];

$quoeficiente = $linha[90];
$valor_liberado = $linha[97];
$tipo_capital = $linha[98];
$percentual_op = $linha[100];
$comissao_op = $linha[101];
$obs2 = $linha[102];
$status_fisico = $linha[103];


}
?>
<?

$sql = "SELECT * FROM operadores where nome = '$nome_operador'";
$res = mysql_query($sql);
$reg1 = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$registros_op++;

$t_op = $linha[42];

$clas_op = $linha[48];
}
?>
<?
$sql = "SELECT * FROM correspondentes where nome = '$nome_operador'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$registros_co++;

$t_co = $linha[42];

$clas_co = $linha[64];

}

if($registros_op<=0){
$tipo_op = $t_co;
$classe = $clas_co;

}
else{
$tipo_op = $t_op;
$classe = $clas_op;

}
?>
<?

$sql = "SELECT * FROM produtos where bco_operacao = '$bco_operacao' and tipo_proposta = '$tipo_proposta' and faixa = '$quant_parc'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$com_bruta = $linha[4];
$a = $linha[5];
$b = $linha[6];
$c = $linha[7];
$com_empresa = $linha[28]/100;



}
?>
<?
if($tipo_op=="Correspondente"){

if($classe=="A"){ $percentual_op = $a/1000;}

if($classe=="B"){ $percentual_op = $b/1000;}

if($classe=="C"){ $percentual_op = $c/1000;}

$percentual_op;


}
else{

$percentual_op = $com_bruta/100;

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
$estabelecimento_alterou = $linha[44];
$cidade_estabelecimento_alterou = $linha[45];
$tel_estabelecimento_alterou = $linha[46];
$email_estabelecimento_alterou = $linha[47];

?>
<? } ?>
<table width="100%" border="0">
  <tr>
    <td width="25%"><form name="form1" method="post" action="../principal.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit32" value="Voltar ao menu principal">
    </form></td>
    <td width="70%"><form name="form1" method="post" action="lista_de_propostas_para_alterar_satatus.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
        <input type="submit" name="Submit32" value="Voltar Para verifica&ccedil;&atilde;o de Propostas por CPF">
    </form></td>
    <td width="5%">&nbsp;</td>
  </tr>
</table>
<form name="form1" method="post" action="grava_alterar_status_da_proposta.php">

<table width="100%" border="0" cellspacing="4">
    <tr>
      <td colspan="4"><div align="center"><font color="#0000FF" size="4">EDITANDO PROPOSTA N&ordm; <strong><? echo $num_proposta; ?>
                <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
      </strong></font></div></td>
    </tr>
    <tr>
      <td>Cliente</td>
      <td><font color="#0000FF" size="4"><strong><? echo $nome; ?></strong></font></td>
      <td>Banco de Opera&ccedil;&atilde;o </td>
      <td><font color="#0000FF" size="4"><strong><? echo $bco_operacao; ?></strong></font></td>
    </tr>
    <tr>
      <td>Tipo de Proposta </td>
      <td><font color="#0000FF" size="4"><strong><? echo $tipo_proposta; ?></strong></font></td>
      <td>Faixa</td>
      <td><font color="#0000FF" size="4"><strong><? echo $quant_parc; ?></strong></font></td>
    </tr>
    <tr>
      <td>Operador</td>
      <td><font color="#0000FF" size="4"><strong><? echo $nome_operador; ?></strong></font></td>
      <td>Tipo de Operador </td>
      <td><font color="#0000FF" size="4"><strong><? echo $tipo_op; ?> </strong></font></td>
    </tr>
    <tr>
      <td width="20%">Status</td>
      <td width="26%"><strong><font color="#0000FF">
        <select name="status" id="select11">
          <option selected><? echo $status; ?></option>
          <?

if($status<>"Proposta_Paga")if($status<>"Cancelada"){
    $sql = "select * from status order by status asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['status']."</option>";
    }
	}
?>
        </select>
</font></strong></td>
      <td width="21%">Valor Solicitado </td>
      <td width="33%"><p><strong><font color="#0000FF">
        <input name="valor_credito" type="text" id="valor_credito3" value="<? echo $valor_credito; ?>"<? if($status=="Proposta_Paga"){ echo'readonly="true"'; }?><? if($status=="Cancelada"){ echo'readonly="true"'; }?>>
      </font></strong><strong><font color="#0000FF">
</font></strong></p>      </td>
    </tr>
    <tr>
      <td>Status F&iacute;sico </td>
      <td><? echo $status_fisico; ?></td>
      <td>Valor da parcela </td>
      <td><input name="parcela" type="text" id="parcela" value="<? echo $parcela; ?>"<? if($status=="Proposta_Paga"){ echo'readonly="true"'; }?><? if($status=="Cancelada"){ echo'readonly="true"'; }?>>      </td>
    </tr>
    <tr>
      <td><font color="#000000">Valor Liberado </font></td>
      <td><strong><font color="#0000FF">
        <input name="valor_liberado" type="text" id="valor_liberado2" value="<? echo $valor_credito; ?>"<? if($status=="Proposta_Paga"){ echo'readonly="true"'; }?><? if($status=="Cancelada"){ echo'readonly="true"'; }?>>
      </font></strong></td>
      <td>Bco da Opera&ccedil;&atilde;o </td>
      <td><strong><font color="#0000FF"><? echo $bco_operacao; ?>
            <input name="bco_operacao" type="hidden" id="bco_operacao" value="<? echo $bco_operacao; ?>">
      </font></strong></td>
    </tr>
    <tr>
      <td>Valor a Receber</td>
      <td><strong><font color="#0000FF"><? echo bcmul($valor_credito, $com_empresa, 2); ?>
            <input name="valor_a_receber" type="hidden" id="valor_a_receber3" value="<? echo bcmul($valor_credito, $com_empresa, 2); ?>">

        </font></strong></td>
      <td>Comiss&atilde;o do operador</td>
      <td><strong><font color="#0000FF" size="4"><strong>
</strong></font><font color="#0000FF"><? echo bcmul($valor_credito, $percentual_op, 2); ?></font></strong>
        <input name="comissao_op" type="hidden" id="comissao_op2" value="<? echo bcmul($valor_credito, $percentual_op, 2); ?>">
        <strong><font color="#0000FF">
        <input name="percentual_op" type="hidden" id="percentual_op5" value="<? echo $percentual_op; ?>">
        <input name="quoeficiente" type="hidden" id="quoeficiente4" value="<? echo $quoeficiente; ?>">
        <input name="retorno" type="hidden" id="retorno3" value="<? $calculo = bcmul($valor_credito, $spread, 2)/14400.00; $calculo_spread = bcmul($calculo,100,2); echo $calculo_spread; ?>">
        </font></strong><strong><font color="#0000FF">
        </font></strong></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">Observa&ccedil;&otilde;es</div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td></tr>
    <tr>
      <td colspan="4"><textarea name="obs2" cols="70" rows="7"<? if($status=="Proposta_Paga"){ echo'readonly="true"'; }?><? if($status=="Cancelada"){ echo'readonly="true"'; }?> id="obs2"><? echo $obs2; ?></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><strong><font color="#0000FF">
        <input name="dataalteracao" type="hidden" id="dataalteracao" value="<? echo date('d-m-Y'); ?>">
        <input name="horaalteracao" type="hidden" id="horaalteracao" value="<? echo date('H:i:s'); ?>">
        <input name="dia_alteracao_status" type="hidden" id="dia_alteracao_status" value="<? echo date('d'); ?>">
        <input name="mes_alteracao_status" type="hidden" id="mes_alteracao_status" value="<? echo date('m'); ?>">
        <input name="ano_alteracao_status" type="hidden" id="ano_alteracao_status" value="<? echo date('Y'); ?>">
        <input name="data_alteracao_status" type="hidden" id="dataalteracao5" value="<? echo date('d-m-Y'); ?>">
        <input name="hora_alteracao_status" type="hidden" id="hora_alteracao_status" value="<? echo date('H:i:s'); ?>">
<input name="mes_ano_status" type="hidden" id="mes_ano_status" value="<? echo date('m-Y'); ?>">
        <input name="operador_alterou" type="hidden" id="operador3" value="<? echo $operador_alterou; ?>">
        <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou" value="<? echo $cel_operador_alterou; ?>">
        <input name="email_operador_alterou" type="hidden" id="email_operador_alterou" value="<? echo $email_operador_alterou; ?>">
        <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou" value="<? echo $estabelecimento_alterou; ?>">
        <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou" value="<? echo $cidade_estabelecimento_alterou; ?>">
        <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou" value="<? echo $tel_estabelecimento_alterou; ?>">
        <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou" value="<? echo $email_estabelecimento_alterou; ?>">
        <input name="recebido" type="hidden" id="recebido" value="<? echo Não; ?>">
</font></strong></td>
      <td><font color="#0000FF" size="4">&nbsp;</font></td>
      <td><font color="#0000FF" size="4">&nbsp;</font></td>
    </tr>
    <tr> 
      <td colspan="2">     <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <? if($status<>"Proposta_Paga")if($status<>"Cancelada"){echo'<input type="submit" name="Submit" value="Alterar Status da Proposta"> 
          <input type="reset" name="Submit2" value="Limpar">'; } ?> </td>
      <td> <div align="left"><font color="#0000FF" size="4"></font></div></td><td><font color="#0000FF" size="4">&nbsp;</font></td>
    </tr>
  </table>
</form>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="4">
    <tr>
      <td colspan="2"><strong>Cadastro efetuado por <br>
        </strong><strong><font color="#0000FF"><? echo $nome_operador; ?>
        
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
          <strong><font color="#0000FF"><? echo $estabelecimento_proposta; ?>        </font></strong><strong><font color="#0000FF"> </font></strong></td>
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
      <td><strong>Data do Cadastro <br>
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
<form name="form1" method="post" action="">
<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$operador_alterou = $linha[44];
$cel_operador_alterou = $linha[45];
$email_operador_alterou = $linha[46];
$estabelecimento_alterou = $linha[47];
$cidade_estabelecimento_alterou = $linha[48];
$tel_estabelecimento_alterou = $linha[49];
$email_estabelecimento_alterou = $linha[50];
$dataalteracao = $linha[42];
$horaalteracao = $linha[43];
?>

  <table width="100%" border="0" cellspacing="4">
    <tr>
      <td colspan="2" valign="top" bgcolor="#CCCCCC"><strong>&Uacute;ltima altera&ccedil;&atilde;o efetuada pelo operador: <br>
      </strong><strong><font color="#0000FF"><? echo $operador_alterou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="35%" valign="top" bgcolor="#CCCCCC"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>
              <? echo $email_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="20%" valign="top" bgcolor="#CCCCCC"><strong>Celular:<font color="#0000FF"><br>
              <? echo $cel_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="1%">&nbsp;</td>
    </tr>
    <tr>
      <td width="18%" valign="top" bgcolor="#CCCCCC"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>
          <strong><font color="#0000FF"><? echo $estabelecimento_alterou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="26%" valign="top" bgcolor="#CCCCCC"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $tel_estabelecimento_alterou; ?> </font></strong></td>
      <td valign="top" bgcolor="#CCCCCC"><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $email_estabelecimento_alterou; ?> </font><font color="#0000FF"> </font></strong></td>
      <td valign="top" bgcolor="#CCCCCC"><strong>Cidade: <br>
            <font color="#0000FF"><? echo $cidade_estabelecimento_alterou; ?> </font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td valign="top" bgcolor="#CCCCCC"><strong>Data da Altera&ccedil;&atilde;o <br>
            <font color="#0000FF"><? echo $dataalteracao; ?> </font></strong></td>
      <td valign="top" bgcolor="#CCCCCC"><strong>Hora que foi efetuado a Altera&ccedil;&atilde;o <br>
            <font color="#0000FF"><? echo $horaalteracao; ?> </font></strong></td>
      <td valign="top" bgcolor="#CCCCCC"><strong></strong></td>
      <td valign="top" bgcolor="#CCCCCC">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <? } ?>
</form>
<form name="form1" method="post" action="">
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
$estabelecimento_alterou = $linha[44];
$cidade_estabelecimento_alterou = $linha[45];
$tel_estabelecimento_alterou = $linha[46];
$email_estabelecimento_alterou = $linha[47];

?>
  <table width="100%" border="0" cellspacing="4">
    <tr>
      <td colspan="2"><strong><font color="#FF0000">Cadastro atualmente sendo alterado por: </font></strong></td>
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
