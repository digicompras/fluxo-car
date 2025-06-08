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
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

require '../../conect/conect.php';

$num_proposta = $_POST['num_proposta'];


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


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

printf("<img src='../../imagens/$linha[1]' border='0'  width='231' height='73,5'>"); ?>
<?
if($reg==1){
echo "</tr>";
$reg=0;
}
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


$nome_op = $linha[1];
$celular_op = $linha[19];
$email_op = $linha[20];
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];
$tel_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];

}
?>
<?
$sql = "SELECT * FROM propostas_veiculos where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$num_proposta = $linha[0];
$dataproposta = $linha[1];
$horaproposta = $linha[2];
$mes_ano = $linha[3];
$estabelecimento_proposta = $linha[4];
$operador_atendente = $linha[5];
$status = $linha[6];
$tipo = $linha[7];
$tipo_proposta = $linha[8];
$nome = $linha[9];
$tipo_pessoa = $linha[10];
$data_nasc = $linha[11];
$cpf = $linha[12];
$rg = $linha[13];
$orgao = $linha[14];
$emissao = $linha[15];
$sexo = $linha[16];
$estadocivil = $linha[17];
$nacionalidade = $linha[18];
$quant_dependente = $linha[19];
$pai = $linha[20];
$mae = $linha[21];
$conjuge = $linha[22];
$data_nasc_conjuge = $linha[23];
$endereco = $linha[24];
$numero = $linha[25];
$bairro = $linha[26];
$complemento = $linha[27];
$cidade = $linha[28];
$estado = $linha[29];
$cep = $linha[30];
$correspondencia = $linha[31];
$tipo_residencia = $linha[32];
$valor_aluguel = $linha[33];
$tempo_residencia = $linha[34];
$telefone = $linha[35];
$celular = $linha[36];
$tipo_telefone = $linha[37];
$residencia_anterior = $linha[38];
$bairro_anterior = $linha[39];
$cidade_anterior = $linha[40];
$estado_anterior = $linha[41];
$tempo_residencia_anterior = $linha[42];
$email = $linha[43];
$empresa = $linha[44];
$porte_empresa = $linha[45];
$data_admissao = $linha[46];
$inicio_atividade = $linha[47];
$end_empresa = $linha[48];
$numero_empresa = $linha[49];
$complemento_empresa = $linha[50];
$bairro_empresa = $linha[51];
$cep_empresa = $linha[52];
$cidade_empresa = $linha[53];
$estado_empresa = $linha[54];
$telefone_empresa = $linha[55];
$cpt = $linha[56];
$serie = $linha[57];
$cargo = $linha[58];
$natureza_operacao = $linha[59];
$salario = $linha[60];
$atividade_principal = $linha[61];
$data_constituicao = $linha[62];
$cnpj = $linha[63];
$inscr_est = $linha[64];
$tel_contador = $linha[65];
$atividade_anterior = $linha[66];
$data_admissao_anterior = $linha[67];
$data_saida = $linha[68];
$cargo_anterior = $linha[69];
$telefone_empresa_anterior = $linha[70];
$outras_rendas = $linha[71];
$ref_pessoal = $linha[72];
$tel_ref_pessoal = $linha[73];
$ref_pessoal2 = $linha[74];
$tel_ref_pessoal2 = $linha[75];
$ref_comercial = $linha[76];
$tel_ref_comercial = $linha[77];
$ref_banco = $linha[78];
$ref_agencia = $linha[79];
$ref_conta = $linha[80];
$ref_tipo_conta = $linha[81];
$ref_conta_desde = $linha[82];
$cartao_credito = $linha[83];
$automovel = $linha[84];
$valor_automoveis = $linha[85];
$residencia = $linha[86];
$valor_residencia = $linha[87];
$outras_propriedades = $linha[88];
$valor_outras_propriedades = $linha[89];
$veiculo = $linha[90];
$ano_modelo = $linha[91];
$renavam = $linha[92];
$num_portas = $linha[93];
$combustivel = $linha[94];
$placa = $linha[95];
$valor_venda = $linha[96];
$valor_entrada = $linha[97];
$tarifa_cadastro = $linha[98];
$valor_financiar = $linha[99];
$coeficiente = $linha[100];
$codigo_tabela = $linha[101];
$num_parcelas = $linha[102];
$valor_parcelas = $linha[103];
$vencto_1_parcela = $linha[104];
$r = $linha[105];
$valor_liberado = $linha[106];
$pagto_serv_terc = $linha[107];
$obs = $linha[108];
$operador = $linha[109];
$cel_operador = $linha[110];
$email_operador = $linha[111];
$estab_pertence = $linha[112];
$cidade_estab_pertence = $linha[113];
$tel_estab_pertence = $linha[114];
$email_estab_pertence = $linha[115];
$operador_alterou = $linha[116];
$cel_operador_alterou = $linha[117];
$email_operador_alterou = $linha[118];
$estab_alterou = $linha[119];
$cidade_estab_alterou = $linha[120];
$tel_estab_alterou = $linha[121];
$email_estab_alterou = $linha[122];
$dataalteracao = $linha[123];
$horaalteracao = $linha[124];
$recebido = $linha[125];
$comissao_op = $linha[126];
$meses = $linha[127];
$trinta = $linha[128];
$quarenta_cinco = $linha[129];
$meses_residencia = $linha[130];
$ddd_tel = $linha[131];
$ddd_cel = $linha[132];
$ddd_tel_empresa = $linha[133];
$ddd_tel_contador = $linha[134];
$ddd_tel_empresa_anterior = $linha[135];
$ddd_ref_pessoal = $linha[136];
$ddd_ref_pessoal2 = $linha[137];
$ddd_ref_comercial = $linha[138];
$digito_agencia = $linha[139];
$digito_conta = $linha[140];
$ano_ref_conta = $linha[141];
$modelo = $linha[142];
$estado_emissao = $linha[143];
$mista = $linha[144];
$parecer_credito = $linha[145];
$bem = $linha[146];
$chassi = $linha[147];

}

?>

<?

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estabelecimento_proposta'";
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
$operador_atendente = $linha[41];
$status_lojista = $linha[42];
$usuario_estab = $linha[43];
$senha_estab = $linha[44];
$num_banco = $linha[45];
$agencia = $linha[46];
$conta = $linha[47];
}
?>

<form name="form1" method="post" action="grava_editar_proposta.php">

<table width="100%" border="1" cellspacing="4">
    <tr>
      <td colspan="4"><div align="center"><font size="1"><strong><font color="#0000FF">AUTORIZA&Ccedil;&Atilde;O PARA PAGAMENTO DA  PROPOSTA <? echo $num_proposta; ?></font></strong></font></div></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td width="16%"><font size="1">Operador</font></td>
      <td width="32%"><strong><font color="#0000FF" size="1"><? echo $operador_atendente; ?>
            <input name="operador_atendente" type="hidden" id="operador_atendente" value="<? echo $operador_atendente; ?>">
</font></strong></td>
      <td width="12%"><font size="1">Data Proposta</font></td>
      <td width="40%"><font size="1"><strong><font color="#0000FF"><? echo $dataproposta; ?></font></strong> hora da proposta <strong><font color="#0000FF"><? echo $horaproposta; ?></font></strong> </font></td>
    </tr>
    <tr>
      <td><font size="1">Estabelecimento</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $estabelecimento_proposta; ?>
</font></strong></td>
      <td><font size="1">Tipo proposta</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $tipo_proposta; ?>
      </font></strong></td>
    </tr>
    <tr>
      <td><font size="1">Perfil do cliente </font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $tipo; ?>
</font></strong></td>
      <td><font size="1">Status</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $status; ?>
</font></strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><font size="1"><strong><font color="#0000FF">DADOS DO CLIENTE </font></strong></font></div></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td><font size="1">Nome</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $nome; ?></font></strong></td>
      <td><font size="1">Tipo de Pessoa </font></td>
      <td><font size="1"><strong><font color="#0000FF"><? echo $tipo_pessoa; ?></font></strong>      Data Nasc      <strong><font color="#0000FF"><? echo $data_nasc; ?></font></strong></font></td>
    </tr>
    <tr>
      <td><font size="1">CPF</font></td>
      <td><font size="3"><strong><font color="#0000FF" size="1"><? echo $cpf; ?></font></strong> </font></td>
      <td><font size="1">RG</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $rg; ?></font></strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><font size="1"><strong><font color="#0000FF">DADOS DO VE&Iacute;CULO </font></strong></font></div></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td><font size="1">Tipo de ve&iacute;culo </font></td>
      <td><strong><font color="#000000"><? echo $bem; ?></font></strong></td>
      <td><font size="1">Chassi</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $chassi; ?></font></strong></td>
    </tr>
    <tr>
      <td><font size="1">Marca e Ve&iacute;culo</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $veiculo; ?></font></strong>      </td>
      <td><font size="1">Ano/Modelo</font></td>
      <td>      <strong><font color="#0000FF" size="1"><? echo $ano_modelo; ?> - <? echo $modelo; ?></font></strong></td>
    </tr>
    <tr>
      <td><font size="1">Renavam</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $renavam; ?></font></strong>      </td>
      <td><font size="1">N&ordm; de portas </font></td>
      <td>      <strong><font color="#0000FF" size="1"><? echo $num_portas; ?></font></strong></td>
    </tr>
    <tr>
      <td><font size="1">Combust&iacute;vel</font></td>
      <td>      <strong><font color="#0000FF" size="1"><? echo $combustivel; ?></font></strong></td>
      <td><font size="1">Placa</font></td>
      <td>      <strong><font color="#0000FF" size="1"><? echo $placa; ?></font></strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><font size="1"><strong><font color="#0000FF">DADOS DO FINANCIAMENTO </font></strong></font></div></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td><font size="1">Valor do Ve&iacute;culo </font></td>
      <td>
	    <strong>
      <font color="#0000FF" size="1">      <? echo "R$ ".$valor_venda; ?> </font></strong> </td>
      <td><font size="1">Valor de entrada R$ </font></td>
      <td><font color="#0000FF"><strong>        <font color="#0000FF" size="1"><? echo $valor_entrada; ?></font> </strong></font></td>
    </tr>
    <tr>
      <td><font size="1">Valor a financiar R$</font></td>
      <td><font color="#0000FF"><strong><font color="#0000FF" size="1"><? echo $valor_financiar; ?></font></strong></font></td>
      <td><font size="1">N&ordm; de parcelas</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $num_parcelas; ?></font></strong></td>
    </tr>
    <tr>
      <td><font size="1">Valor da parcela</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $valor_parcelas; ?></font></strong></td>
      <td><font size="1">Car&ecirc;ncia</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $trinta; ?><? echo $quarenta_cinco; ?></font></strong></td>
    </tr>
    <tr>
      <td><font size="1">Codigo da tabela</font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $codigo_tabela; ?> </font></strong><font color="#000000" size="1">Mista</font><font color="#0000FF" size="1"><strong> <? echo $mista; ?></strong></font></td>
      <td><font size="1">Tarifa cadastro </font></td>
      <td><strong><font color="#0000FF" size="1"><? echo $tarifa_cadastro; ?></font></strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong></strong>        <font size="1"><strong><font color="#0000FF">LOJISTA/CLIENTE - DADOS DO PAGTO</font></strong></font>         </div></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td><font size="1">Favorecido</font></td>
      <td><font color="#0000FF"><strong><font color="#0000FF" size="1"><? echo $razaosocial; ?></font></strong></font></td>
      <td><font size="1">CNPJ/CPF</font></td>
      <td><font color="#0000FF"><strong><font color="#0000FF" size="1"><? echo $cnpj; ?></font></strong></font></td>
    </tr>
    <tr>
      <td><font size="1">Valor a financiar R$</font></td>
      <td><font color="#0000FF"><strong><font color="#0000FF" size="1"><? echo $valor_financiar; ?></font></strong></font></td>
      <td><font size="1">N&ordm; e Banco </font></td>
      <td><strong><font color="#0000FF"><strong><font color="#0000FF" size="1"><? echo $num_banco; ?></font></strong></font></strong></td>
    </tr>
    <tr>
      <td><font size="1">Ag&ecirc;ncia</font></td>
      <td><font color="#0000FF"><strong><font color="#0000FF" size="1"><? echo $agencia; ?></font></strong></font> </td>
      <td><font size="1">Conta</font><font color="#0000FF"><strong></strong></font></td>
      <td><font size="1"><strong></strong></font><font size="1"><strong><font color="#0000FF"><strong><font color="#0000FF"><? echo $conta; ?></font></strong></font></strong></font><font color="#0000FF"><strong> </strong></font></td>
    </tr>
    <tr>
      <td><font size="1">Servi&ccedil;os de Terceiros </font></td>
      <td><font size="1"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF" size="1"><? echo $r; ?></font></strong></font></strong></font> </strong> </font></td>
      <td><font size="1">Pagto Serv Terceiros </font></td>
      <td><font size="1"><strong><font color="#0000FF" size="1"><? echo $pagto_serv_terc; ?></font></strong></font></td>
    </tr>
    <tr>
      <td colspan="4">        <strong></strong>      <strong></strong></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="left">_____________________________</div></td>
      <td colspan="2">______________________________</td>
    </tr>
    <tr>
      <td colspan="2"><div align="left"><font color="#0000FF"><strong><font color="#000000"><? echo $operador_atendente; ?></font></strong></font></div></td>
      <td colspan="2"><font color="#0000FF"><strong><font color="#000000"><? echo $nfantasia; ?></font></strong></font></td>
    </tr>
    <tr>
      <td colspan="2">      <div align="left"><strong>Contato Comercial</strong></div></td>
      <td colspan="2"><strong>
      <font color="#000000">Lojista </font> </strong></td>
    </tr>
    <tr>
      <td colspan="4"><font size="3"><strong></strong> 
      </font><font size="1">&nbsp;</font></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><font size="3">_____________________________
      </font></div></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong><font color="#000000"> EVERTON POSSETTI </font></strong><font color="#0000FF"><strong></strong></font></div></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center">Gerente Promotota </div></td>
    </tr>
    <tr>
      <td colspan="4"><font size="1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </font></td>
    </tr>
  </table>
</form>
</body>
</html>
