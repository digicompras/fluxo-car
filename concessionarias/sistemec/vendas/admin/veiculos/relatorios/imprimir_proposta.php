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

<title>FICHA PROPOSTA DE FINANCIAMENTO DE VEICULO </title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style5 {font-size: 9px}
-->
</style></head>

<?



require '../../../conect/conect.php';



$num_proposta = $_POST['num_proposta'];

?>
<?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

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

$incluir_avalista = $linha[148];

$data_proposta = $linha[149];

$titulo_proposta = $linha[150];

$bco_operacao = $linha[158];


}



?>

  <TABLE style="BORDER-COLLAPSE: collapse" border=1 cellSpacing=0 
borderColor=#000000 borderColorLight=#000000 borderColorDark=#000000 
cellPadding=3 width=100% align=center>
  <TBODY>
    
    <TR>
      <TD bgcolor="#CCCCCC"><div align="center" class="style5"><strong>Ficha proposta de <? echo $titulo_proposta; ?> N&ordm; </strong><font color="#0000FF"><strong><? echo $num_proposta; ?></strong></font></div></TD>
    </TR>
    <TR>
      <TD><TABLE width=100% border=0 cellPadding=2 cellSpacing=0 class=corpo style5 x:str>
        <COLGROUP>
        <COL style="WIDTH: 53pt" class=xl42 width=71>
        <COL style="WIDTH: 48pt" class=xl42 span=2 width=64>
        <COL style="WIDTH: 64pt" class=xl42 width=85>
        <COL style="WIDTH: 80pt" class=xl42 width=106>
        <COL style="WIDTH: 53pt" class=xl42 width=71>
        <COL style="WIDTH: 48pt" class=xl42 span=3 width=64>
        <COL style="WIDTH: 52pt" class=xl42 width=69>
        <TBODY>
          
          <TR height=17>
            <TD width=353 height=19 class=corpo><span class="style5"><B><FONT color=#008000 
            face=Verdana>Operador: <strong><font color="#0000FF"><? echo $operador_atendente; ?></font></strong></FONT></B></span></TD>
            <TD height=19 width=229><span class="style5"><b><font color=#008000 
            face=Verdana>Estabelecimento: <strong><font color="#0000FF"><? echo $estabelecimento_proposta; ?></font></strong></font></b></span></TD>
            <TD width="248" height=19><span class="style5"><b><font color=#008000 
            face=Verdana>Data/hora: <strong><strong><font color="#0000FF"><? echo $dataproposta; ?> - <strong><? echo $horaproposta; ?></strong></font></strong></strong></font></b></span></TD>
            <TD width="178" height=19><span class="style5"><b><font color=#008000 
            face=Verdana>Tipo da  proposta: <strong><font color="#0000FF"><? echo $tipo_proposta; ?></font></strong></font></b></span></TD>
            <TD><span class="style5"><B><FONT color=#008000 
            face=Verdana>Status: <strong><font color="#0000FF"><? echo $status; ?></font></strong></FONT></B></span></TD>
            </TR>
        </TBODY>
      </TABLE></TD>
    </TR>
    <TR>
      <TD bgcolor="#CCCCCC"><div align="center" class="style5"><strong>Dados do cliente</strong></div></TD>
    </TR>
    <TR>
      <TD><TABLE class=corpo border=0 cellSpacing=0 cellPadding=2 width=100% x:str>
        <COLGROUP>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=2 width=64>
          <COL style="WIDTH: 64pt" class=xl42 width=85>
          <COL style="WIDTH: 80pt" class=xl42 width=106>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=3 width=64>
          <COL style="WIDTH: 52pt" class=xl42 width=69>
          <TBODY>
            
            <TR height=17>
              <TD width=67 height=19 class=corpo style5><span class="style5"><B><FONT color=#008000 
            face=Verdana>Nome:</FONT></B></span></TD>
              <TD width="396" height=19 class="style5"><span class="style5"><strong><font color="#0000FF"><? echo $nome; ?></font></strong></span></TD>
              <TD width="190" class="style5"><b><font color=#008000 
            face=Verdana>Perfil do cliente:</font></b> <strong><font color="#0000FF"><? echo $tipo; ?></font></strong></TD>
              <TD width="203" class="style5"><span class="style5"><b><font color=#008000 
            face=Verdana>Tipo de pessoa: <strong><font color="#0000FF"><? echo $tipo_pessoa; ?></font></strong></font></b></span></TD>
              <TD width=176 height=19 class="style5"><span class="style5"><b><font color=#008000 
            face=Verdana>Data nasc: <strong><font color="#0000FF"><? echo $data_nasc; ?></font></strong></font></b></span></TD>
              <TD width=248 class="style5"><div align="center" class="style5">
                <form action="imprimir_proposta_avalista.php" method="post" name="form1" target="_blank">
                  <strong> <font color="#0000FF"><b><font color=#008000 
            face=Verdana>Incluir Avalista:</font></b> <? echo $incluir_avalista; ?>
                  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
                  <input name="incluir_avalista" type="hidden" id="incluir_avalista" value="<? echo $incluir_avalista; ?>">
                  </font></strong>
                  <? if($incluir_avalista=="Sim"){ echo"<input type='submit' name='button' id='button' value='Visualizar'>" ; } ?>
                </form>
              </div></TD>
            </TR>
          </TBODY>
      </TABLE>
    <TABLE class=corpo border=0 cellSpacing=0 cellPadding=2 width=100% x:str>
            <COLGROUP>
            <COL style="WIDTH: 53pt" class=xl42 width=71>
            <COL style="WIDTH: 48pt" class=xl42 span=2 width=64>
            <COL style="WIDTH: 64pt" class=xl42 width=85>
            <COL style="WIDTH: 80pt" class=xl42 width=106>
            <COL style="WIDTH: 53pt" class=xl42 width=71>
            <COL style="WIDTH: 48pt" class=xl42 span=3 width=64>
            <COL style="WIDTH: 52pt" class=xl42 width=69>
            <TBODY>
              <TR height=17>
                <TD width=118 height=19 class=corpo style5><span class="style5"><B><FONT color=#008000 
            face=Verdana>CPF: <strong><font color="#0000FF"><? echo $cpf; ?></font></strong></FONT></B></span></TD>
                <TD width=113 height=19 class="style5"><span class="style5"><B><FONT color=#008000 
            face=Verdana>RG: <strong><font color="#0000FF"><? echo $rg; ?></font></strong></FONT></B></span></TD>
                <TD width=179 height=19 class="style5"><span class="style5"><B><FONT color=#008000 
            face=Verdana>Org&atilde;o emissor :<strong><font color="#0000FF"><? echo $orgao; ?> - <? echo $estado_emissao; ?></font></strong></FONT></B></span></TD>
                <TD width="113" height=19 class="style5"><span class="style5"><B><FONT color=#008000 
            face=Verdana>Data de emiss&atilde;o: <strong><font color="#0000FF"><? echo $emissao; ?></font></strong></FONT></B></span></TD>
                <TD width="182" height=19 class="style5"><span class="style5"><B><FONT color=#008000 
            face=Verdana>Nacionalidade: <strong><font color="#0000FF"><? echo $nacionalidade; ?></font></strong></FONT></B></span></TD>
              </TR>
            </TBODY>
      </TABLE></TD>
    </TR>
    <TR>
      <TD><TABLE style="BORDER-COLLAPSE: collapse" cellSpacing=0 borderColor=#ffffff 
      borderColorLight=#ffffff borderColorDark=#ffffff cellPadding=3 
      width="100%" align=left height=32>
        <TBODY>
          <TR>
            <TD width=45 height=30 class="style5"><B><FONT color=#008000 
            face=Verdana>Sexo:</FONT></B></TD>
            <TD width=75 class="style5"><strong><font color="#0000FF"><? echo $sexo; ?></font></strong></TD>
            <TD width=80 class="style5"><div align="left"><B><FONT color=#008000 face=Verdana>Estado 
              Civil: </FONT></B></div></TD>
            <TD width=75 class="style5"><strong><font color="#0000FF"><? echo $estadocivil; ?></font></strong></TD>
            <TD width=92 class="style5"><DIV align=right><B><FONT color=#008000 face=Verdana>N.&ordm; 
              Dependentes: </FONT></B></DIV></TD>
            <TD width=40 height=30 class="style5"><strong><font color="#0000FF"><? echo $quant_dependente; ?></font></strong></TD>
            <TD width=30 class="style5"><b><font color=#008000 
            face=Verdana>Pai:</font></b></TD>
            <TD width=248 class="style5"><strong><font color="#0000FF"><? echo $pai; ?></font></strong></TD>
            <TD width=45 class="style5"><b><font color=#008000 face=Verdana>M&atilde;e:</font></b></TD>
            <TD width=512 height=30 class="style5"><strong><strong><font color="#0000FF"><? echo $mae; ?></font></strong></strong></TD>
          </TR>
        </TBODY>
      </TABLE></TD>
    </TR>
    
    <TR>
      <TD><TABLE width=100% border=0 cellPadding=2 cellSpacing=0 class=corpo style5 x:str>
        <COLGROUP>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=2 width=64>
          <COL style="WIDTH: 64pt" class=xl42 width=85>
          <COL style="WIDTH: 80pt" class=xl42 width=106>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=3 width=64>
          <COL style="WIDTH: 52pt" class=xl42 width=69>
          <TBODY>
            <TR height=17>
              <TD class=corpo height=28 width=118><span class="style5"><B><FONT color=#008000 
            face=Verdana>Conjuge: </FONT></B></span></TD>
              <TD class=corpo width=111><span class="style5"><strong><font color="#0000FF"><? echo $conjuge; ?></font></strong></span></TD>
              <TD height=28 width=77><DIV align=right class="style5"><B><FONT color=#008000 face=Verdana>Nasc: </FONT></B></DIV></TD>
              <TD width=90><span class="style5"><strong><font color="#0000FF"><? echo $data_nasc_conjuge; ?></font></strong></span></TD>
              <TD height=28 width=91><div align="left" class="style5"><b><font color=#008000 
            face=Verdana>E-Mail: </font></b></div></TD>
              <TD width=131><span class="style5"><strong><font color="#0000FF"><strong><font color="#0000FF"><? echo $email; ?></font></strong></font></strong></span></TD>
              <TD width=136><span class="style5"><b><font color=#008000 
            face=Verdana>Endere&ccedil;o: </font></b></span></TD>
              <TD width=518><span class="style5"><strong><font color="#0000FF"><? echo $endereco; ?> <b><font color=#008000 face=Verdana>N&ordm;: </font></b><? echo $numero; ?></font></strong></span></TD>
            </TR>
            <TR height=17>
              <TD class=corpo height=28><span class="style5"><b><font color=#008000 face=Verdana>Bairro: </font></b></span></TD>
              <TD class=corpo><span class="style5"><strong><font color="#0000FF"><? echo $bairro; ?></font></strong></span></TD>
              <TD height=28><div align="left" class="style5"><b><font color=#008000 
            face=Verdana>Complemento: </font></b></div></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $complemento; ?></font></strong></span></TD>
              <TD height=28><span class="style5"><b><font color=#008000 face=Verdana>CEP: </font></b></span></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $cep; ?></font></strong></span></TD>
              <TD><span class="style5"><b><font color=#008000 
            face=Verdana>Cidade: </font></b></span></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $cidade; ?></font></strong></span></TD>
            </TR>
            
            <TR height=17>
              <TD class=corpo height=28><span class="style5"><b><font color=#008000 face=Verdana>UF: </font></b></span></TD>
              <TD class=corpo><span class="style5"><strong><font color="#0000FF"><? echo $estado; ?></font></strong></span></TD>
              <TD height=28><div align="left" class="style5"><b><font color=#008000 face=Verdana>End Corresp: </font></b></div></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $correspondencia; ?></font></strong></span></TD>
              <TD height=28><span class="style5"><b><font color=#008000 
            face=Verdana>Tipo residencia: </font></b></span></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $tipo_residencia; ?></font></strong></span></TD>
              <TD><span class="style5"><b><font color=#008000 
            face=Verdana>Tempo de residencia: </font></b></span></TD>
              <TD><span class="style5"><b><font color=#008000 face=Verdana>anos </font></b><strong><font color="#0000FF"><? echo $tempo_residencia; ?></font></strong><b><font color=#008000 face=Verdana> meses </font></b><strong><font color="#0000FF"><? echo $meses_residencia; ?></font></strong></span></TD>
            </TR>
            <TR height=17>
              <TD class=corpo height=28><span class="style5"><b><font color=#008000 face=Verdana>R$ Aluguel: </font></b></span></TD>
              <TD class=corpo><span class="style5"><strong><font color="#0000FF"><? echo $valor_aluguel; ?></font></strong></span></TD>
              <TD height=28><span class="style5"><b><font color=#008000 face=Verdana>Telefone: </font></b></span></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $ddd_tel; ?></font></strong> - <strong><font color="#0000FF"><? echo $telefone; ?></font></strong></span></TD>
              <TD height=28><span class="style5"><b><font color=#008000 
            face=Verdana> Celular: </font></b></span></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $ddd_cel; ?></font></strong> - <strong><font color="#0000FF"><? echo $celular; ?></font></strong></span></TD>
              <TD><span class="style5"><b><font color=#008000 face=Verdana>TipoTelefone: </font></b></span></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $tipo_telefone; ?></font></strong></span></TD>
            </TR>
            
            <TR height=17>
              <TD class=corpo height=28><span class="style5"><b><font color=#008000 
            face=Verdana> Residencia anterior: </font></b></span></TD>
              <TD class=corpo><span class="style5"><strong><font color="#0000FF"><? echo $residencia_anterior; ?></font></strong></span></TD>
              <TD height=28><p class="style5"><b><font color="#008000" face="Verdana">Bairro: </font></b></p>                </TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $bairro_anterior; ?></font></strong></span></TD>
              <TD height=28><span class="style5"><b><font color=#008000 
            face=Verdana>Cidade: </font></b></span></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $cidade_anterior; ?></font></strong></span></TD>
              <TD><span class="style5"><b><font color=#008000 face=Verdana>UF:</font></b></span></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><b><font color=#008000 face=Verdana><b><font color=#008000 face=Verdana><strong><font color="#0000FF"><? echo $estado; ?></font></strong></font></b> Tempo: <strong><font color="#0000FF"><? echo $tempo_residencia_anterior; ?></font></strong></font></b></font></strong></span></TD>
            </TR>
          </TBODY>
      </TABLE></TD>
    </TR>
    <TR>
      <TD bgcolor="#CCCCCC"><div align="center" class="style5"><strong>Dados profissionais</strong></div></TD>
    </TR>
    <TR>
      <TD><TABLE width="100%" border=0 cellPadding=2 cellSpacing=0 class=corpo style5 
x:str>
        <COLGROUP>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=2 width=64>
          <COL style="WIDTH: 64pt" class=xl42 width=85>
          <COL style="WIDTH: 80pt" class=xl42 width=106>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=3 width=64>
          <COL style="WIDTH: 52pt" class=xl42 width=69>
          <TBODY>
            
            <TR height=17>
              <TD class=corpo height=28 width=82><span class="style5"><B><FONT color=#008000 
            face=Verdana>Empresa:</FONT></B></span></TD>
              <TD class=corpo width=154><span class="style5"><strong><font color="#0000FF"><? echo $empresa; ?></font></strong></span></TD>
              <TD height=28 width=101><div align="left" class="style5"><B><FONT color=#008000 
            face=Verdana>Porte:</FONT></B></div></TD>
              <TD width=116><span class="style5"><strong><font color="#0000FF"><? echo $porte_empresa; ?></font></strong></span></TD>
              <TD class=pocospazio width=120><div align="left" class="style5"><B><FONT color=#008000 
            face=Verdana>Tempo de servi&ccedil;o:</FONT></B></div></TD>
              <TD width="147" height=28><DIV align=left class="style5"><b><font color="#008000" face="Verdana">anos</font></b><strong><font color="#0000FF"> <? echo $data_admissao; ?> </font></strong><b><font color="#008000" face="Verdana">meses </font></b><strong><font color="#0000FF"><? echo $meses; ?></font></strong></DIV></TD>
              <TD width="123"><span class="style5"><b><font color=#008000 
            face=Verdana>Cargo:</font></b></span></TD>
              <TD colspan="2"><span class="style5"><strong><font color="#0000FF"><? echo $cargo; ?></font></strong></span></TD>
            </TR>
            <TR height=17>
              <TD class=corpo height=28><span class="style5"><B><FONT color=#008000 
            face=Verdana>In&iacute;cio atividade:</FONT></B></span></TD>
              <TD class=corpo><span class="style5"><strong><font color="#0000FF"><? echo $inicio_atividade; ?></font></strong></span></TD>
              <TD height=28><div align="left" class="style5"><B><FONT color=#008000 
            face=Verdana>Endere&ccedil;o:</FONT></B></div></TD>
              <TD height="28"><span class="style5"><strong><font color="#0000FF"><? echo $end_empresa; ?></font></strong><B><FONT color=#008000 
            face=Verdana>N &ordm;:</FONT></B><strong><font color="#0000FF"><? echo $numero_empresa; ?></font></strong></span></TD>
              <TD height="28"><span class="style5"><b><font color=#008000 
            face=Verdana>Cidade:</font></b></span></TD>
              <TD height="28"><span class="style5"><strong><font color="#0000FF"><? echo $cidade_empresa; ?></font></strong></span></TD>
              <TD><span class="style5"><b><font color=#008000 face=Verdana>Natureza opera&ccedil;&atilde;o: </font></b></span></TD>
              <TD colspan="2"><span class="style5"><strong><font color="#0000FF"><? echo $natureza_operacao; ?></font></strong></span></TD>
            </TR>
            <TR height=17>
              <TD class=corpo height=28><span class="style5"><B><FONT color=#008000 
            face=Verdana>Complemento:</FONT></B></span></TD>
              <TD class=corpo><span class="style5"><strong><font color="#0000FF"><? echo $complemento_empresa; ?></font></strong></span></TD>
              <TD height=28><span class="style5"><B><FONT color=#008000 
            face=Verdana>Bairro:</FONT></B></span></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $bairro_empresa; ?></font></strong></span></TD>
              <TD class=pocospazio><span class="style5"><B><FONT color=#008000 face=Verdana>CEP: </FONT></B></span></TD>
              <TD height=28><span class="style5"><strong><font color="#0000FF"><? echo $cep_empresa; ?></font></strong></span></TD>
              <TD><span class="style5"><b><font color=#008000 
            face=Verdana>Sal&aacute;rio:</font></b></span></TD>
              <TD colspan="2"><span class="style5"><strong><font color="#0000FF"><? echo $salario; ?></font></strong></span></TD>
            </TR>
            <TR height=17>
              <TD class=corpo height=28><span class="style5"><b><font color=#008000 face=Verdana>UF: </font></b></span></TD>
              <TD class=corpo><span class="style5"><strong><font color="#0000FF"><? echo $estado_empresa; ?></font></strong></span></TD>
              <TD height=28><span class="pocospazio style5"><b><font color=#008000 face=Verdana>Telefone: </font></b></span></TD>
              <TD><span class="style5"><strong><font color="#0000FF"><? echo $ddd_tel_empresa; ?></font></strong> - <strong><font color="#0000FF"><? echo $telefone_empresa; ?></font></strong></span></TD>
              <TD class=pocospazio><span class="style5"><b><font color=#008000 face=Verdana>Atividade principal: </font></b></span></TD>
              <TD height=28><span class="style5"><strong><font color="#0000FF"><? echo $atividade_principal; ?></font></strong></span></TD>
              <TD><span class="style5"><B><FONT color=#008000 
            face=Verdana>CNPJ:</FONT></B></span></TD>
              <TD width="184"><span class="style5"><strong><font color="#0000FF"><? echo $cnpj; ?></font></strong></span></TD>
              <TD width="241"><span class="style5"><B><FONT color=#008000 face=Verdana>Telefone contador: <strong><font color="#0000FF"><? echo $ddd_tel_contador; ?></font></strong> - <strong><font color="#0000FF"><? echo $tel_contador; ?></font></strong> </FONT></B></span></TD>
            </TR>
          </TBODY>
      </TABLE></TD>
    </TR>
    
    <TR bgColor=#cccccc>
      <TD><div align="center" class="style5"><STRONG><FONT 
      face="Verdana, Arial, Helvetica, sans-serif">Atividade/Emprego anterior</FONT></STRONG></div></TD>
    </TR>
    <TR>
      <TD><TABLE width=100% border=0 cellPadding=2 cellSpacing=0 class=corpo style5 x:str>
        <COLGROUP>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=2 width=64>
          <COL style="WIDTH: 64pt" class=xl42 width=85>
          <COL style="WIDTH: 80pt" class=xl42 width=106>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=3 width=64>
          <COL style="WIDTH: 52pt" class=xl42 width=69>
          <TBODY>
            <TR height=17>
              <TD class=corpo height=19 width=374><span class="style5"><B><FONT color=#008000 
            face=Verdana>Atividade/Emprego anterior: <strong><font color="#0000FF"><? echo $atividade_anterior; ?></font></strong></FONT></B></span></TD>
              <TD class=corpo width=201><span class="style5"><B><FONT color=#008000 
            face=Verdana>Telefone: <strong><font color="#0000FF"><? echo $ddd_tel_empresa_anterior; ?></font></strong> - <strong><font color="#0000FF"><? echo $telefone_empresa_anterior; ?></font></strong></FONT></B></span></TD>
              <TD class=corpo width=194><span class="style5"><b><font color=#008000 
            face=Verdana>Outras rendas: <strong><font color="#0000FF"><? echo $outras_rendas; ?></font></strong></font></b></span></TD>
              <TD height=19 width=149><span class="style5"><B><FONT color=#008000 
            face=Verdana>Data admiss&atilde;o: <strong><font color="#0000FF"><? echo $data_admissao_anterior; ?></font></strong></FONT></B></span></TD>
              <TD height=19 width=103><span class="style5"><B><FONT color=#008000 
            face=Verdana>Sa&iacute;da: <strong><font color="#0000FF"><? echo $data_saida; ?></font></strong></FONT></B></span></TD>
              <TD height=19 width=259><span class="style5"><B><FONT color=#008000 
            face=Verdana>Cargo: <strong><font color="#0000FF"><? echo $cargo_anterior; ?></font></strong></FONT></B></span></TD>
            </TR>
          </TBODY>
      </TABLE></TD>
    </TR>
    
    
    <TR bgColor=#cccccc>
      <TD><div align="center" class="style5"><STRONG><FONT 
      face="Verdana, Arial, Helvetica, sans-serif">Fontes de refer&ecirc;ncia</FONT></STRONG></div></TD>
    </TR>
    <TR>
      <TD><TABLE width=100% border=0 cellPadding=2 cellSpacing=0 class=corpo style5 x:str>
        <COLGROUP>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=2 width=64>
          <COL style="WIDTH: 64pt" class=xl42 width=85>
          <COL style="WIDTH: 80pt" class=xl42 width=106>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=3 width=64>
          <COL style="WIDTH: 52pt" class=xl42 width=69>
          <TBODY>
            <TR height=17>
              <TD class=corpo height=19 colSpan=6><span class="style5"><B><FONT color=#008000 face=Verdana>Pessoal - Nome: <strong><font color="#0000FF"><? echo $ref_pessoal; ?></font></strong></FONT></B></span></TD>
              <TD height=19 width=824><span class="style5"><B><FONT color=#008000 
            face=Verdana>Telefone com DDD: <strong><font color="#0000FF"><? echo $ddd_ref_pessoal; ?></font></strong> - <strong><font color="#0000FF"><? echo $tel_ref_pessoal; ?></font></strong></FONT></B></span></TD>
            </TR>
            
            <TR height=17>
              <TD class=corpo height=26 colSpan=6><span class="style5"><B><FONT color=#008000 face=Verdana>Pessoal - Nome: <strong><font color="#0000FF"><? echo $ref_pessoal2; ?></font></strong></FONT></B></span></TD>
              <TD height=26><span class="style5"><B><FONT color=#008000 
            face=Verdana>Telefone com DDD: <strong><font color="#0000FF"><? echo $ddd_ref_pessoal2; ?></font></strong> - <strong><font color="#0000FF"><? echo $tel_ref_pessoal2; ?></font></strong></FONT></B></span></TD>
            </TR>
            
            <TR height=17>
              <TD class=corpo height=26 colSpan=6><span class="style5"><B><FONT color=#008000 face=Verdana>Comercial - Nome: <strong><font color="#0000FF"><? echo $ref_comercial; ?></font></strong></FONT></B></span></TD>
              <TD height=26><span class="style5"><B><FONT color=#008000 
            face=Verdana>Telefone com DDD: <strong><font color="#0000FF"><? echo $ddd_ref_comercial; ?></font></strong> - <strong><font color="#0000FF"><? echo $tel_ref_comercial; ?></font></strong></FONT></B></span></TD>
            </TR>
          </TBODY>
      </TABLE></TD>
    </TR>
    
    <TR bgColor=#cccccc>
      <TD><div align="center" class="style5"><STRONG><FONT 
      face="Verdana, Arial, Helvetica, sans-serif">Refer&ecirc;ncias financeiras</FONT></STRONG></div></TD>
    </TR>
    <TR>
      <TD><TABLE width=100% border=0 cellPadding=2 cellSpacing=0 class=corpo style5 x:str>
            <COLGROUP>
            <COL style="WIDTH: 53pt" class=xl42 width=71>
            <COL style="WIDTH: 48pt" class=xl42 span=2 width=64>
            <COL style="WIDTH: 64pt" class=xl42 width=85>
            <COL style="WIDTH: 80pt" class=xl42 width=106>
            <COL style="WIDTH: 53pt" class=xl42 width=71>
            <COL style="WIDTH: 48pt" class=xl42 span=3 width=64>
            <COL style="WIDTH: 52pt" class=xl42 width=69>
            <TBODY>
              <TR height=17>
                <TD width="337" height=16 class=corpo><span class="style5"><B><FONT color=#008000 
            face=Verdana>Banco: </FONT><strong><font color="#0000FF"><? echo $ref_banco; ?></font></strong></B></span></TD>
                <TD width="337" height=16><span class="style5"><b><font color=#008000 
            face=Verdana>Ag&ecirc;ncia: <strong><font color="#0000FF"><? echo $ref_agencia; ?></font></strong> - <strong><font color="#0000FF"><? echo $digito_agencia; ?></font></strong></font></b></span></TD>
                <TD width="264" height=16><span class="style5"><B><FONT color=#008000 
            face=Verdana>Conta:</FONT></B> <strong><font color="#0000FF"><? echo $ref_conta; ?></font></strong> - <strong><font color="#0000FF"><? echo $digito_conta; ?></font></strong></span></TD>
                <TD width="350" height=16><span class="style5"><B><FONT color=#008000 
            face=Verdana>Tipo:</FONT></B> <strong><font color="#0000FF"><? echo $ref_tipo_conta; ?></font></strong></span></TD>
              </TR>
              
              <TR height=17>
                <TD class=corpo height=26><span class="style5"><B><FONT color=#008000 
            face=Verdana>Conta desde: <b><font color=#008000 
            face=Verdana>M&ecirc;s </font></b><strong><font color="#0000FF"><? echo $ref_conta_desde; ?></font></strong><b><font color=#008000 
            face=Verdana> ano </font></b><strong><font color="#0000FF"><? echo $ano_ref_conta; ?></font></strong></FONT></B></span></TD>
                <TD height=26><span class="style5"><B><FONT color=#008000 
            face=Verdana>Cart&atilde;o de cr&eacute;dito: <strong><font color="#0000FF"><? echo $cartao_credito; ?></font></strong></FONT></B></span></TD>
                <TD height=26><span class="style5"></span></TD>
                <TD height=26><span class="style5"></span></TD>
              </TR>
            </TBODY>
      </TABLE></TD>
    </TR>
    
    <TR>
      <TD bgColor=#cccccc><div align="center" class="style5"><STRONG><FONT 
      face="Verdana, Arial, Helvetica, sans-serif">Refer&ecirc;ncias de bens</FONT></STRONG></div></TD>
    </TR>
    <TR>
      <TD><TABLE style="BORDER-COLLAPSE: collapse" cellSpacing=0 borderColor=#ffffff 
      borderColorLight=#ffffff borderColorDark=#ffffff cellPadding=3 
      width="100%" align=left>
        <TBODY>
          <TR>
            <TD width=98 class="style5"><B><FONT color=#008000 
            face=Verdana>Autom&oacute;vel:</FONT></B></TD>
            <TD width=140 class="style5"><strong><font color="#0000FF"><? echo $automovel; ?></font></strong></TD>
            <TD width=96 class="style5"><div align="left"><B><FONT color=#008000 face=Verdana>Valor 
              total:</FONT></B></div></TD>
            <TD width=152 class="style5"><strong><font color="#0000FF"><? echo $valor_automoveis; ?></font></strong></TD>
            <TD width=153 class="style5"><P><B><FONT color=#008000 
            face=Verdana>Outras propriedades:</FONT></B> </P></TD>
            <TD width=627 class="style5"><strong><font color="#0000FF"><? echo $outras_propriedades; ?></font></strong></TD>
          </TR>
          <TR>
            <TD class="style5"><B><FONT color=#008000 
            face=Verdana>Resid&ecirc;ncia:</FONT></B></TD>
            <TD class="style5"><strong><font color="#0000FF"><? echo $residencia; ?></font></strong></TD>
            <TD class="style5"><B><FONT color=#008000 face=Verdana>Valor 
              total:</FONT></B></TD>
            <TD class="style5"><strong><font color="#0000FF"><? echo $valor_residencia; ?></font></strong></TD>
            <TD class="style5"><B><FONT color=#008000 face=Verdana>Valor 
              total:</FONT></B> </TD>
            <TD class="style5"><strong><font color="#0000FF"><strong><font color="#0000FF"><? echo $valor_outras_propriedades; ?></font></strong></font></strong></TD>
          </TR>
        </TBODY>
      </TABLE></TD>
    </TR>
    <TR bgColor=#cccccc>
      <TD><div align="center" class="style5"><STRONG><FONT 
      face="Verdana, Arial, Helvetica, sans-serif">Dados da opera&ccedil;&atilde;o</FONT></STRONG><strong>- Operando pelo banco <font size="2"><font color="#0000FF"><font color="#0000FF"><? echo $bco_operacao; ?></font></font></font></strong></div></TD>
    </TR>
    <TR>
      <TD><TABLE width=100% border=0 cellPadding=2 cellSpacing=0 class=corpo style5 x:str>
        <COLGROUP>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=2 width=64>
          <COL style="WIDTH: 64pt" class=xl42 width=85>
          <COL style="WIDTH: 80pt" class=xl42 width=106>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=3 width=64>
          <COL style="WIDTH: 52pt" class=xl42 width=69>
          <TBODY>
            <TR height=17>
              <TD class=corpo height=19 width=232><span class="style5"><B><FONT color=#008000 
            face=Verdana>Tipo de Ve&iacute;culo: <strong><font color="#0000FF"><? echo $bem; ?></font></strong></FONT></B></span></TD>
              <TD height=19 width=212><span class="style5"><B><FONT color=#008000 
            face=Verdana>Chassi: <strong><font color="#0000FF"><? echo $chassi; ?></font></strong></FONT></B></span></TD>
              <TD width=269><span class="style5"><B><FONT color=#008000 
            face=Verdana>Marca e ve&iacute;culo: <strong><font color="#0000FF"><? echo $veiculo; ?></font></strong></FONT></B></span></TD>
              <TD width=270><span class="style5"><B><FONT color=#008000 
            face=Verdana>Ano/modelo: <strong><font color="#0000FF"><? echo $ano_modelo; ?></font></strong> - <strong><font color="#0000FF"><? echo $modelo; ?></font></strong></FONT></B></span></TD>
              <TD width=301><span class="style5"><b><font color=#008000 
            face=Verdana>N&ordm; de parcelas: <strong><font color="#0000FF"><? echo $num_parcelas; ?></font></strong></font></b></span></TD>
            </TR>
            
            <TR height=17>
              <TD height=26 class=corpo style5><B><FONT color=#008000 
            face=Verdana>Renavam: </FONT></B><strong><font color="#0000FF"><? echo $renavam; ?></font></strong></TD>
              <TD height=26><span class="style5"><B><FONT color=#008000 
            face=Verdana>N&ordm; de portas: <strong><font color="#0000FF"><strong><font color="#0000FF"><? echo $num_portas; ?></font></strong></font></strong></FONT></B></span></TD>
              <TD><span class="style5"><B><FONT color=#008000 
            face=Verdana>Combust&iacute;vel: <strong><font color="#0000FF"><? echo $combustivel; ?></font></strong></FONT></B></span></TD>
              <TD borderColorLight=#ffffff borderColor=#ffffff 
          borderColorDark=#ffffff><span class="style5"><B><FONT color=#008000 
            face=Verdana>Placas:</FONT></B> <strong><font color="#0000FF"><? echo $placa; ?></font></strong></span></TD>
              <TD borderColorLight=#ffffff borderColor=#ffffff 
          borderColorDark=#ffffff><span class="style5"><b><font color=#008000 
            face=Verdana>Valor das parcelas: <font color="#0000FF"><strong><font color="#0000FF"><? echo $valor_parcelas;	   ?></font></strong></font></font></b></span></TD>
            </TR>
            
            <TR height=17>
              <TD class=corpo height=26><span class="style5"><B><FONT color=#008000 
            face=Verdana>Valor venda: <strong><font color="#0000FF"><strong><font color="#0000FF"><? echo $valor_venda; ?></font></strong></font></strong></FONT></B></span></TD>
              <TD height=26><span class="style5"><B><FONT color=#008000 
            face=Verdana>Valor de entrada: </FONT></B><font color="#0000FF"><strong><font color="#0000FF"><? echo $valor_entrada; ?></font></strong></font></span></TD>
              <TD><span class="style5"><B><FONT color=#008000 
            face=Verdana>Tarifa de cadastro: <strong><font color="#0000FF"><? echo $tarifa_cadastro; ?></font></strong></FONT></B></span></TD>
              <TD borderColorLight=#ffffff borderColor=#ffffff 
          borderColorDark=#ffffff><span class="style5"><B><FONT color=#008000 
            face=Verdana>Valor a financiar: <font color="#0000FF"><strong><font color="#0000FF"><? echo $valor_financiar

	   ?></font></strong></font></FONT></B></span></TD>
              <TD borderColorLight=#ffffff borderColor=#ffffff 
          borderColorDark=#ffffff><span class="style5"><b><font color=#008000 
            face=Verdana>Car&ecirc;ncia: <strong><font color="#0000FF"><? echo $trinta; ?><? echo $quarenta_cinco; ?></font></strong></font></b></span></TD>
            </TR>
            
            <TR height=17>
              <TD height=26 class=corpo style5><B><FONT color=#008000 
            face=Verdana>Codigo da tabela:</FONT></B> <strong><font color="#0000FF"><? echo $codigo_tabela; ?></font></strong><b><font color="#008000" face="Verdana">Mista</font></b> <strong><font color="#0000FF"><? echo $mista; ?></font></strong></TD>
              <TD height=26><span class="style5"><B><FONT color=#008000 
            face=Verdana>Coeficiente: <font color="#0000FF"><strong><font color="#0000FF"><? echo $coeficiente; ?></font></strong></font></FONT></B></span></TD>
              <TD><span class="style5"><B><FONT color=#008000 
            face=Verdana>Servi&ccedil;os de terceiros: <strong><font color="#0000FF"><? echo $r; ?></font></strong></FONT></B></span></TD>
              <TD borderColorLight=#ffffff borderColor=#ffffff 
          borderColorDark=#ffffff><span class="style5"><B><FONT color=#008000 
            face=Verdana>Valor liberado: <font color="#0000FF"><strong><? echo "0.00"; ?></strong></font></FONT></B></span></TD>
              <TD borderColorLight=#ffffff borderColor=#ffffff 
          borderColorDark=#ffffff><span class="style5"><b><font color=#008000 
            face=Verdana>Pagto de servi&ccedil;os de terceiros: <strong><font color="#0000FF">
              <? echo $pagto_serv_terc; ?>
              </font></strong></font></b></span></TD>
            </TR>
          </TBODY>
      </TABLE></TD>
    </TR>
    <TR bgColor=#cccccc>
      <TD><div align="center" class="style5"><STRONG><FONT 
      face="Verdana, Arial, Helvetica, sans-serif">Observa&ccedil;&otilde;es</FONT></STRONG></div></TD>
    </TR>
    <TR>
      <TD><TABLE width="100%" border=0 cellPadding=2 cellSpacing=0 class=corpo style5 
x:str>
        <COLGROUP>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=2 width=64>
          <COL style="WIDTH: 64pt" class=xl42 width=85>
          <COL style="WIDTH: 80pt" class=xl42 width=106>
          <COL style="WIDTH: 53pt" class=xl42 width=71>
          <COL style="WIDTH: 48pt" class=xl42 span=3 width=64>
          <COL style="WIDTH: 52pt" class=xl42 width=69>
          <TBODY>
            <TR height=17>
              <TD height=19 class=corpo><span class="style5"><B><FONT color=#008000 
            face=Verdana>Observa&ccedil;&otilde;es: <strong><font color="#0000FF"><? echo $obs; ?></font><font color="#0000FF"></font></strong></FONT></B></span></TD>
            </TR>
          </TBODY>
      </TABLE></TD>
    </TR>
  </TBODY>
</TABLE>

</body>

</html>

