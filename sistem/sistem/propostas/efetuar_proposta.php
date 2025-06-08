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
<title>FORMULARIO DE PROPOSTAS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">




</head>
<?

require '../../conect/conect.php';

$date = date('Y-m-d');


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
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}
?>



<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit3" value="Voltar">
</form>
<?
$tipo = $_POST['tipo'];
$tipo_proposta = $_POST['tipo_proposta'];
$tipo_contrato = $_POST['tipo_contrato'];
$cpf = $_POST['cpf'];
$estabelecimento_proposta = $_POST['estabelecimento_proposta'];
$valor_liberado = $_POST['valor_liberado'];
$bco_operacao = $_POST['bco_operacao'];
$tabela = $_POST['tabela'];
$termo_de_responsabilidade = $_POST['termo_de_responsabilidade'];
$bloqueio_compra = $_POST['bloqueio_compra'];


if(empty($termo_de_responsabilidade)){

echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE ASSINAR DIGITALMENTE O TERMO DE RESPONSABILIDADE CLICANDO SOBRE O CAMPO  --> Estou ciente e de Acordo!.');
window.location = 'informacoes_antecedem_efetuar_proposta.php?tipo=$tipo&estabelecimento_proposta=$estabelecimento_proposta&cpf=$cpf&tipo_proposta=$tipo_proposta&tipo_contrato=$tipo_contrato&tabela=$tabela&bloqueio_compra=$bloqueio_compra';

</script>";


	}

if(empty($tipo_contrato)){

echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE SELECIONAR UM TIPO DE CONTRATO!.');
window.location = 'informacoes_antecedem_efetuar_proposta.php?tipo=$tipo&estabelecimento_proposta=$estabelecimento_proposta&cpf=$cpf&tipo_proposta=$tipo_proposta&tipo_contrato=$tipo_contrato&tabela=$tabela&bloqueio_compra=$bloqueio_compra';

</script>";


	}









$sql = "SELECT * FROM clientes where cpf = '$cpf'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$codigo_cli = $linha[0];
$nome_cli = $linha[1];
$sexo_cli = $linha[2];
$estadocivil_cli = $linha[3];
//$cpf_cli = $linha[4];
$rg_cli = $linha[5];
$orgao_cli = $linha[6];
$emissao_cli = $linha[7];
$data_nasc_cli = $linha[8];
$pai_cli = $linha[9];
$mae_cli = $linha[10];
$endereco_cli = $linha[11];
$numero_cli = $linha[12];
$bairro_cli = $linha[13];
$complemento_cli = $linha[14];
$cidade_cli = $linha[15];
$estado_cli = $linha[16];
$cep_cli = $linha[17];
$telefone_cli = $linha[18];
$celular_cli = $linha[19];
$email_cli = $linha[20];
$operador_cli = $linha[21];
$cel_operador_cli = $linha[22];
$email_operador_cli = $linha[23];
$estabelecimento_cli = $linha[24];
$cidade_estabelecimento_cli = $linha[25];
$tel_estabelecimento_cli = $linha[26];
$email_estabelecimento_cli = $linha[27];
$obs_cli = $linha[28];
$datacadastro_cli = $linha[29];
$horacadastro_cli = $linha[30];
$dataalteracao_cli = $linha[31];
$horaalteracao_cli = $linha[32];
$operador_alterou_cli = $linha[33];
$cel_operador_alterou_cli = $linha[34];
$email_operador_alterou_cli = $linha[35];
$estabelecimento_alterou_cli = $linha[36];
$cidade_estabelecimento_alterou_cli = $linha[37];
$tel_estabelecimento_alterou_cli = $linha[38];
$email_estabelecimento_alterou_cli = $linha[39];
$banco = $linha[41];
$agencia = $linha[42];
$conta = $linha[43];
$num_beneficio = $linha[44];
$num_beneficio2 = $linha[73];
$num_beneficio3 = $linha[74];
$num_beneficio4 = $linha[75];

$pagto_beneficio = $linha[116];


$resposta = $linha[119];


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


$nome = $linha[1];
$cpf_op = $linha[4];
$celular = $linha[19];
$email = $linha[20];
$estabelecimento = $linha[44];
$cidade_estabelecimento = $linha[45];
$tel_estabelecimento = $linha[46];
$email_estabelecimento = $linha[47];

}
?>
<? 

$sql = "SELECT * FROM termo_de_responsabilidade limit 1";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$termo = $linha[1];

}


 ?>
<form name="form1" method="post" action="grava_proposta.php">

<table width="100%" border="0" cellspacing="4">
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">FORMUL&Aacute;RIO DE PROPOSTA </font></strong></div></td>
    </tr>
    <tr>
      <td>Perfil do cliente</td>
      <td><strong><font color="#0000FF"><? echo $tipo; ?>
            <input name="tipo" type="hidden" id="tipo" value="<? echo $tipo; ?>">
      </font></strong></td>
      <td>Tipo da proposta </td>
      <td><strong><font color="#0000FF"><? echo $tipo_proposta; ?>
            <input name="tipo_proposta" type="hidden" id="tipo_proposta" value="<? echo $tipo_proposta; ?>">
      </font></strong></td>
    </tr>
    <tr> 
      <td>Tabela</td>
      <td><strong><font color="#0000FF"><? echo $tabela; ?>
            <input name="tabela" type="hidden" id="tabela" value="<? echo $tabela; ?>">
      </font></strong></td>
      <td>Data da Proposta </td>
      <td>                <strong><font color="#0000FF"><? echo date('d-m-Y'); ?></font></strong>
        <input name="dataproposta" type="hidden" id="dataproposta3" value="<? echo date('d-m-Y'); ?>">
        <input name="data_proposta" type="hidden" id="dataproposta4" value="<? echo $date; ?>">
        <input name="horaproposta" type="hidden" id="horaproposta3" value="<? echo $hora_atual; ?>">
        <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo date('m-Y'); ?>"> 
        <input name="dia" type="hidden" id="dataproposta" value="<? echo date('d'); ?>">
        <input name="mes" type="hidden" id="dataproposta2" value="<? echo date('m'); ?>">
        <input name="ano" type="hidden" id="ano" value="<? echo date('Y'); ?>">       
        <strong><font color="#0000FF">
          </font></strong></td>
    </tr>
    <tr>
      <td>Operador</td>
      <td><strong><font color="#0000FF"><? echo $nome; ?>
            <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome; ?>">
      </font></strong></td>
      <td>Status</td>
      <td><strong><font color="#0000FF"><? echo Aguardando_Ativação; ?>
            <input name="status" type="hidden" id="status4" value="<? echo "AGUARDANDO ATIVACAO"; ?>">
            <input name="status_pagto_cliente" type="hidden" id="status_pagto_cliente" value="<?  echo "Aguardando_Pagto"; ?>">
            <input name="status_fisico" type="hidden" id="status_fisico" value="<? echo "Pendente"; ?>">
      </font></strong></td>
    </tr>
    <tr>
      <td>Estabelecimento</td>
      <td><strong><font color="#0000FF"><? echo $estabelecimento_proposta; ?>
            <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estabelecimento_proposta; ?>">
      </font></strong> </td>
      <td>Tipo de Contrato</td>
      <td><strong><font color="#0000FF"><? echo $tipo_contrato; ?>
        <input name="tipo_contrato" type="hidden" id="tipo_contrato" value="<? echo $tipo_contrato; ?>">
      </font></strong></td>
    </tr>
    <tr>
      <td>Nome</td>
      <td><input name="nome" type="hidden" id="nome" value="<? echo $nome_cli; ?>">
      <strong><font color="#0000FF"><? echo $nome_cli; ?></font></strong></td>
      <td>CPF</td>
      <td><input name="cpf" type="hidden" id="cpf2" value="<? echo $cpf; ?>">
      <strong><font color="#0000FF"><? echo $cpf; ?></font></strong></td>
    </tr>
    <tr>
      <td>N&ordm; Benef&iacute;cio </td>
      <td><input name="num_beneficio" type="hidden" id="num_beneficio" value="<? echo $num_beneficio; ?>">
      <strong><font color="#0000FF"><? echo $num_beneficio; ?></font></strong></td>
      <td>N&ordm; Benef&iacute;cio2</td>
      <td><input name="num_beneficio2" type="hidden" id="num_beneficio22" value="<? echo $num_beneficio2; ?>">
      <strong><font color="#0000FF"><? echo $num_beneficio2; ?></font></strong></td>
    </tr>
    <tr>
      <td>N&ordm; Benef&iacute;cio 3 </td>
      <td><input name="num_beneficio3" type="hidden" id="num_beneficio32" value="<? echo $num_beneficio3; ?>">
      <strong><font color="#0000FF"><? echo $num_beneficio3; ?></font></strong></td>
      <td>N&ordm; Benef&iacute;cio 4 </td>
      <td><input name="num_beneficio4" type="hidden" id="num_beneficio42" value="<? echo $num_beneficio4; ?>">
      <strong><font color="#0000FF"><? echo $num_beneficio4; ?></font></strong></td>
    </tr>
    <tr>
      <td>Data Nasc</td>
      <td><input name="data_nasc" type="hidden" id="data_nasc" value="<? echo $data_nasc_cli; ?>">
      <strong><font color="#0000FF"><? echo $data_nasc_cli; ?></font></strong></td>
      <td>RG</td>
      <td><input name="rg" type="hidden" id="rg" value="<? echo $rg_cli; ?>">
      <strong><font color="#0000FF"><? echo $rg_cli; ?></font></strong></td>
    </tr>
    <tr>
      <td>&Oacute;rg&atilde;o</td>
      <td><input name="orgao" type="hidden" id="orgao" value="<? echo $orgao_cli; ?>">
      <strong><font color="#0000FF"><? echo $orgao_cli; ?></font></strong></td>
      <td>Emiss&atilde;o</td>
      <td><input name="emissao" type="hidden" id="emissao" value="<? echo $emissao_cli; ?>">
      <strong><font color="#0000FF"><? echo $emissao_cli; ?></font></strong></td>
    </tr>
    <tr>
      <td>Pai</td>
      <td><input name="pai" type="hidden" id="pai2" value="<? echo $pai_cli; ?>">
      <strong><font color="#0000FF"><? echo $pai_cli; ?></font></strong></td>
      <td>M&atilde;e</td>
      <td><input name="mae" type="hidden" id="mae" value="<? echo $mae_cli; ?>">
      <strong><font color="#0000FF"><? echo $mae_cli; ?></font></strong></td>
    </tr>
    <tr>
      <td>Endere&ccedil;o</td>
      <td><input name="endereco" type="hidden" id="endereco2" value="<? echo $endereco_cli; ?>">
      <strong><font color="#0000FF"><? echo $endereco_cli; ?></font></strong></td>
      <td>N&uacute;mero</td>
      <td><input name="numero" type="hidden" id="numero" value="<? echo $numero_cli; ?>">
      <strong><font color="#0000FF"><? echo $numero_cli; ?></font></strong></td>
    </tr>
    <tr>
      <td>Bairro</td>
      <td><input name="bairro" type="hidden" id="bairro2" value="<? echo $bairro_cli; ?>">
      <strong><font color="#0000FF"><? echo $bairro_cli; ?></font></strong></td>
      <td>Complemento</td>
      <td><input name="complemento" type="hidden" id="complemento" value="<? echo $complemento_cli; ?>">
      <strong><font color="#0000FF"><? echo $complemento_cli; ?></font></strong></td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><input name="cidade" type="hidden" id="cidade2" value="<? echo $cidade_cli; ?>">
      <strong><font color="#0000FF"><? echo $cidade_cli; ?></font></strong></td>
      <td>Estado</td>
      <td><strong><font color="#0000FF">
      <input name="estado" type="hidden" id="estado" value="<? echo $estado_cli; ?>">
      <? echo $estado_cli; ?></font></strong></td>
    </tr>
    <tr>
      <td>Cep</td>
      <td><input name="cep" type="hidden" id="cep2" value="<? echo $cep_cli; ?>">
        <strong><font color="#0000FF"><? echo $cep_cli; ?></font></strong></td>
      <td>Sexo</td>
      <td><input name="sexo" type="hidden" id="sexo" value="<? echo $sexo_cli; ?>">
      <strong><font color="#0000FF"><? echo $sexo_cli; ?></font></strong></td>
    </tr>
    <tr>
      <td>Estado Civil</td>
      <td><input name="estadocivil" type="hidden" id="estadocivil" value="<? echo $estadocivil_cli; ?>">
      <strong><font color="#0000FF"><? echo $estadocivil_cli; ?></font></strong></td>
      <td>Telefone</td>
      <td><input name="telefone" type="text" id="telefone3" value="<? echo $telefone_cli; ?>" size="15" maxlength="14"></td>
    </tr>
    <tr>
      <td>Como Conheceu a Empresa</td>
      <td><input name="resposta" type="hidden" id="resposta" value="<? echo $resposta; ?>">
        <strong><font color="#0000FF"><? echo $resposta; ?></font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Celular</td>
      <td><input name="celular" type="text" id="celular" value="<? echo $celular_cli; ?>" size="15" maxlength="14"></td>
      <td>E-Mail</td>
      <td><input name="email" type="hidden" id="email2" value="<? echo $email_cli; ?>">
      <strong><font color="#0000FF"><? echo $email_cli; ?></font></strong></td>
    </tr>
    <tr> 
      <td width="17%"><strong>Valor bruto de opera&ccedil;&atilde;o R$</strong></td>
      <td width="34%"><font color="#0000FF">
        <input name="valor_total" type="text" id="valor_total">
      </font></td>
      <td width="15%"><strong>Valor liq cliente R$ </strong></td>
      <td width="34%"><input name="valor_liquido_cliente" type="text" id="valor_liquido_cliente">
        <font color="#0000FF">
        <input name="valor_credito" type="hidden" id="valor_credito" value="">
        <? //echo $valor_liberado; ?>
        <input name="valor_liberado" type="hidden" id="valor_liberado2" value="<? echo $valor_liberado; ?>">
        </font></td>
    </tr>
    
    <tr>
      <td>Quant de parcelas </td>
      <td><font color="#0000FF">
        <input name="quant_parc" type="text" id="quant_parc">
      </font></td>
      <td>Valor parcela</td>
      <td><input name="parcela" type="text" id="parcela2"></td>
    </tr>
    <tr> 
      <td>Banco do cliente</td>
      <td><strong><font color="#0000FF">
        <select name="banco_pagto" id="select5">
          <option selected><? echo $banco_pagto; ?></option>
          <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
        </select>
      </font></strong></td>
      <td>Banco da Opera&ccedil;&atilde;o </td>
      <td><strong><font color="#0000FF">
        <select name="bco_operacao" id="select3">
          <option selected>Selecione o banco</option>
          <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
        </select>
      </font></strong></td>
    </tr>
    <tr>
      <td>Ag&ecirc;ncia</td>
      <td><strong><font color="#0000FF">
        <input name="agencia" type="text" id="agencia" value="<? echo $agencia; ?>">
      </font></strong></td>
      <td>N&ordm; Conta</td>
      <td><input name="conta" type="text" id="conta2" value="<? echo $conta; ?>">
        <strong><font color="#0000FF">
        <select name="tipo_conta" id="bco_operacao">
          
          <?


    $sql = "select * from tipos_contas order by tipo_conta asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_conta']."</option>";
    }
?>
        </select>
      </font></strong></td>
    </tr>
    <tr>
      <td>Banco a ser Portado</td>
      <td><strong><font color="#0000FF">
        <select name="bco_quitacao" id="banco_pagto">
          <option selected><? echo $banco_pagto; ?></option>
          <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
        </select>
      </font></strong></td>
      <td>Tipo de pagto do Benef&iacute;cio</td>
      <td><input name="pagto_beneficio" type="hidden" id="email" value="<? echo $pagto_beneficio; ?>">
        <strong><font color="#0000FF"><? echo $pagto_beneficio; ?></font></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3"><strong>Refer&ecirc;ncias</strong></td>
    </tr>
    <tr>
      <td>Nome</td>
      <td colspan="3"><input name="nome_ref1" type="text" id="nome_ref1" size="50"> 
        Telefone
        <input type="text" name="fone_ref1" id="fone_ref1"> 
        Grau de relacionamento <strong><font color="#0000FF">
        <select name="grau_relacionamento1" id="grau_relacionamento1">
          <option selected>Selecione o relacionamento</option>
          <?


    $sql = "select * from grau_relacionamento order by relacionamento asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['relacionamento']."</option>";
    }
?>
        </select>
        </font></strong></td>
    </tr>
    <tr>
      <td>Nome</td>
      <td colspan="3"><input name="nome_ref2" type="text" id="nome_ref2" size="50"> 
        Telefone 
        <input type="text" name="fone_ref2" id="fone_ref2"> 
        Grau de relacionamento <strong><font color="#0000FF">
        <select name="grau_relacionamento2" id="grau_relacionamento2">
          <option selected>Selecione o relacionamento</option>
          <?


    $sql = "select * from grau_relacionamento order by relacionamento asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['relacionamento']."</option>";
    }
?>
        </select>
        </font></strong></td>
    </tr>
    
    <tr>
      <td colspan="4"><div align="center"><strong>ATEN&Ccedil;&Atilde;O!!!... Reponder as perguntas abaixo &eacute; obrigat&oacute;rio!</strong></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><p>
        <? 

$sql = "SELECT * FROM perguntas_de_proposta where num_pergunta = '1' and status_pergunta = 'Ativa' limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$pergunta1 = $linha[2];

}


 ?>
      <? echo $pergunta1; ?></p></td>
      <td><select name="resposta1" id="resposta1">
        <option>Sim</option>
        <option selected>N&atilde;o</option>
      </select>      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><p>
        <? 

$sql = "SELECT * FROM perguntas_de_proposta where num_pergunta = '2' and status_pergunta = 'Ativa' limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$pergunta2 = $linha[2];

}


 ?>
      <? echo $pergunta2; ?></p></td>
      <td><select name="resposta2" id="resposta2">
        <option></option>
        <option>Sim</option>
        <option selected>N&atilde;o</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><p>
        <? 

$sql = "SELECT * FROM perguntas_de_proposta where num_pergunta = '3' and status_pergunta = 'Ativa' limit 1";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$pergunta3 = $linha[2];

}


 ?>
      <? echo $pergunta3; ?></p></td>
      <td><select name="resposta3" id="resposta3">
        <option></option>
        <option>Sim</option>
        <option selected>N&atilde;o</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center">Valor Parcela </div></td>
      <td><div align="center">Banco</div></td>
      <td><div align="center">Vencimento do contrato </div></td>
      <td><div align="center">Previs&atilde;o de compra em </div></td>
    </tr>
    <tr> 
      <td><div align="center">
        <input name="parc1" type="text" id="parc1">
      </div></td>
      <td>      <div align="center">
        <input name="banco1" type="text" id="banco1" size="40">
      </div></td>
      <td><div align="center">
        <input name="vencto1" type="text" id="vencto1">
      </div></td>
      <td>      <div align="center">
        <input name="compra1" type="text" id="compra1">
      </div></td>
    </tr>
    <tr>
      <td>Obs</td>
      <td colspan="2"><textarea name="obs" cols="50" rows="7" id="obs"><? echo $obs_cli; ?></textarea></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><strong>Termo de Responsabilidade</strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><DIV>
<?

echo $termo;
?>
<input name="termo" type="hidden" id="termo" value="<? echo $termo;  ?>">
      </DIV></td>
    </tr>
    <tr>
      <td colspan="2"><strong><? echo "Eu, $nome CPF $cpf_op $termo_de_responsabilidade";  ?>
        <input name="termo_de_responsabilidade" type="hidden" id="termo_de_responsabilidade" value="<? echo $termo_de_responsabilidade;  ?>">
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><strong><font color="#0000FF">
        <input name="operador" type="hidden" id="operador3" value="<? echo $nome; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estabelecimento; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estabelecimento; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estabelecimento; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estabelecimento; ?>">
        <input name="operador_alterou" type="hidden" id="operador_alterou">
        <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou">
        <input name="email_operador_alterou" type="hidden" id="email_operador_alterou">
        <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou">
        <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou">
        <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou">
        <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou">
        <input name="recebido" type="hidden" id="recebido" value="<? echo Não; ?>">
      </font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit" value="Concluir efetiva&ccedil;&atilde;o da proposta"> 
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
      <td colspan="2"><strong>Ol&aacute;! Seja bem vindo<br>
      </strong><strong><font color="#0000FF"><? echo $nome; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>
              <? echo $email; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="20%"><strong>Celular:<font color="#0000FF"><br>
              <? echo $celular; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="1%">&nbsp;</td>
    </tr>
    <tr>
      <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>
          <strong><font color="#0000FF"><? echo $estabelecimento; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $tel_estabelecimento; ?> </font></strong></td>
      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $email_estabelecimento; ?> </font><font color="#0000FF"> </font></strong></td>
      <td><strong>Cidade: <br>
            <font color="#0000FF"><? echo $cidade_estabelecimento; ?> </font></strong></td>
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
