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
<title>LISTANDO TODAS AS PROPOSTAS PAGAS DO OPERADOR</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style3 {font-size: 10px}
.style7 {font-size: 14px}
-->
</style>
</head>
<?

require '../../conect/conect.php';


	  
$nome_operador = $_POST['nome_operador'];
$mes_ano = $_POST['mes_ano'];
$tipo_proposta = $_POST['tipo_proposta'];


$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>" 
  
<? } ?>


<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>

background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">
  
<? } ?>





      <p>
        <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>
</p>
      <form name="form1" method="post" action="../principal.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit2" value="Voltar ao menu principal">
</form>
      <br>
      <table width="80%"  border="0" align="center">
        <tr>
          <td valign="middle">&nbsp;</td>
          <td colspan="2" valign="middle"><div align="center"><strong>Selecione o tipo de proposta que deseja filtrar</strong></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" valign="middle"><form name="form3" method="post" action="propostas_a_digitar.php">
            <div align="center"><strong><font color="#0000FF">
            Consignado
            <select name="tipo_proposta" id="tipo_proposta">
              <option selected>Todas</option>
              <?





    $sql = "select * from tipos_propostas group by tipo_proposta order by tipo_proposta asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['tipo_proposta']."</option>";

    }

?>
            </select> 
            Veiculos / CP
            </font></strong>
              <strong><font color="#0000FF">
              <select name="titulo_proposta" id="titulo_proposta">
                <option selected>Todas</option>
                <?





    $sql = "select * from titulos_propostas group by titulo_proposta order by titulo_proposta asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['titulo_proposta']."</option>";

    }

?>
              </select>
              </font></strong>
              <input type="submit" name="Submit" value="Filtrar">
              </div>
          </form></td>
          <td><?	

if($tipo_proposta=="Todas"){
$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' order by data_proposta,horaproposta asc";
}
else{
$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' and tipo_proposta = '$tipo_proposta' order by data_proposta,horaproposta asc";
}

$res = mysql_query($sql);

$registros = mysql_num_rows($res);





echo "Total de registros encontrados ---> ".$registros;

?></td>
        </tr>
        <tr>
          <td width="18%" valign="middle"><div align="center">
            <form name="form3" method="post" action="propostas_a_digitar.php">
              <div align="center">
                <input name="tipo_proposta" type="hidden" id="tipo_proposta" value="COMPRAS">
                <input type="submit" name="Submit3" value="COMPRAS">
              </div>
            </form>
          </div></td>
          <td width="25%" valign="middle"><div align="center">
            <form name="form3" method="post" action="propostas_a_digitar.php">
              <div align="center">
                <input name="tipo_proposta" type="hidden" id="tipo_proposta" value="CONTRATO NOVO">
                <input type="submit" name="Submit4" value="CONTRATO NOVO">
              </div>
            </form>
          </div></td>
          <td width="26%"><div align="center">
            <form name="form3" method="post" action="propostas_a_digitar.php">
              <div align="center">
                <input name="tipo_proposta" type="hidden" id="tipo_proposta" value="RETEN&Ccedil;&Atilde;O">
                <input type="submit" name="Submit6" value="RETEN&Ccedil;&Atilde;O">
              </div>
            </form>
          </div></td>
          <td width="31%"><div align="center">
            <form name="form3" method="post" action="propostas_a_digitar.php">
              <div align="center">
                <input name="tipo_proposta" type="hidden" id="tipo_proposta" value="REFINANCIAMENTO">
                <input type="submit" name="Submit5" value="REFINANCIAMENTO">
              </div>
            </form>
          </div></td>
        </tr>
        <tr>
          <td valign="middle"><form name="form3" method="post" action="propostas_a_digitar.php">
            <div align="center">
              <input name="titulo_proposta" type="hidden" id="titulo_proposta" value="DEBITO_EM_CONTA">
              <input type="submit" name="button" id="button" value="DEBITO EM CONTA">
            </div>
          </form></td>
          <td valign="middle"><form name="form3" method="post" action="propostas_a_digitar.php">
            <div align="center">
              <input name="titulo_proposta" type="hidden" id="titulo_proposta" value="CREDITO_PESSOAL">
              <input type="submit" name="Submit8" value="FINAMAX">
            </div>
          </form></td>
          <td><form name="form3" method="post" action="propostas_a_digitar.php">
            <div align="center">
              <input name="titulo_proposta" type="hidden" id="titulo_proposta" value="CARTAO_DE_CREDITO">
              <input type="submit" name="Submit9" value="CART&Atilde;O DE CREDITO">
            </div>
          </form></td>
          <td><form name="form3" method="post" action="propostas_a_digitar.php">
            <div align="center">
              <input name="titulo_proposta" type="hidden" id="titulo_proposta" value="VE&iacute;CULO">
              <input type="submit" name="button2" id="button2" value="VEICULO">
            </div>
          </form></td>
        </tr>
      </table>
<br>
<table width="100%"  border="0">
        <tr bgcolor="#<? echo $cor ?>">
          <td><div align="center" class="style3">N&ordm; Proposta </div></td>
          <td><div align="center" class="style3">Data Proposta</div></td>
          <td><div align="center" class="style3">Hora Proposta</div></td>
          <td><div align="center" class="style3"><span class="style3">Digita&ccedil;&atilde;o</span></div></td>
          <td><div align="center" class="style3">Data Digita&ccedil;&atilde;o</div></td>
          <td><div align="center" class="style3">Hora Digita&ccedil;&atilde;o</div></td>
          <td><div align="center" class="style3">Valor Solicitado </div></td>
          <td><div align="center" class="style3">Valor liq cliente </div></td>
          <td><div align="center"><span class="style3">Valor Total </span></div></td>
          <td><div align="center"><span class="style3">Tabela</span></div></td>
          <td><div align="center" class="style3">Cliente</div></td>
          <td><div align="center" class="style3">CPF</div></td>
          <td width="2%"><div align="center" class="style3">Prazo</div></td>
          <td width="5%"><div align="center" class="style3">R$ Parcelas </div></td>
          <td><div align="center" class="style3">Tipo de Proposta </div></td>
          <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>
        </tr>
<?


if($tipo_proposta=="Todas"){
$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' order by data_proposta,horaproposta asc";
}
else{
$sql = "SELECT * FROM propostas where digitacao = 'A Digitar' and tipo_proposta = '$tipo_proposta' order by data_proposta,horaproposta asc";
}
$res = mysql_query($sql);
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
$num_beneficio2 = $linha[80];
$num_beneficio3 = $linha[81];
$num_beneficio4 = $linha[82];
$tipo_proposta = $linha[83];
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

$parc = $linha[52];
$banco = $linha[53];
$vencto = $linha[54];
$compra = $linha[55];

$parc = $linha[52];
$banco = $linha[53];
$vencto = $linha[54];
$compra = $linha[55];

$parc1 = $linha[52];
$banco1 = $linha[53];
$vencto1 = $linha[54];
$compra1 = $linha[55];

$parc2 = $linha[56];
$banco2 = $linha[57];
$vencto2 = $linha[58];
$compra2 = $linha[59];

$parc3 = $linha[60];
$banco3 = $linha[61];
$vencto3 = $linha[62];
$compra3 = $linha[63];

$parc4 = $linha[64];
$banco4 = $linha[65];
$vencto4 = $linha[66];
$compra4 = $linha[67];

$parc5 = $linha[68];
$banco5 = $linha[69];
$vencto5 = $linha[70];
$compra5 = $linha[71];

$parc6 = $linha[72];
$banco6 = $linha[73];
$vencto6 = $linha[74];
$compra6 = $linha[75];

$parc7 = $linha[76];
$banco7 = $linha[77];
$vencto7 = $linha[78];
$compra7 = $linha[79];
$bco_operacao = $linha[86];

$valor_liberado = $linha[97];
$obs2 = $linha[102];
$tabela = $linha[109];
$valor_total = $linha[113];
$valor_liquido_cliente = $linha[115];
$digitacao = $linha[154];
$datadigitacao = $linha[155];
$horadigitacao = $linha[156];


?>
		
        <tr>
          <td width="4%">               <form name="form2" method="post" action="visualizacao_proposta_para_digitacao.php"><div align="center" class="style3">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              
  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
  <input name="digitacao" type="hidden" id="digitacao" value="<? echo "Digitada";  ?>">
            <? //echo $num_proposta; ?>                
            <? if($digitacao=="A Digitar"){ echo "<input type='submit' name='button' id='button' value='$num_proposta'>"; } ?>
          </div></form></td>
          <td width="6%"><div align="center"><span class="style3"><? echo $dataproposta; ?></span></div></td>
          <td width="6%"><div align="center"><span class="style3"><? echo $horaproposta; ?></span></div></td>
          <td width="6%"><div align="center"><span class="style3"><? echo $digitacao; ?></span></div></td>
          <td width="6%"><div align="center"><span class="style3"><? echo $datadigitacao; ?></span></div></td>
          <td width="6%"><div align="center"><span class="style3"><? echo $horadigitacao; ?></span></div></td>
          <td width="6%"><div align="center" class="style3"><? echo $valor_credito; ?></div></td>
          <td width="6%"><div align="center"><span class="style3"><? echo "R$ ".$valor_liquido_cliente;?></span></div></td>
          <td width="5%"><div align="center"><span class="style3"><? echo $valor_total;?></span></div></td>
          <td width="6%"><div align="center"><span class="style3"><? echo $tabela;?></span></div></td>
          <td width="12%">
            <div align="center" class="style3"><? echo $nome; ?></div></td>
          <td width="7%"><div align="center" class="style3"><? echo $cpf; ?></div></td>
          <td><div align="center" class="style3"><? echo $quant_parc; ?></div></td>
          <td><div align="center" class="style3"><? echo $parcela; ?></div></td>
          <td width="6%"><div align="center" class="style3"><? echo $tipo_proposta; ?></div></td>
          <td width="11%"><div align="center" class="style3"><? echo $bco_operacao; ?></div></td>

<? } ?>
</table>
<p>
  <?

			
if($titulo_proposta=="Todas"){
$sql = "SELECT * FROM propostas_veiculos where digitacao = 'A Digitar' order by data_proposta,horaproposta asc";
}
else{
$sql = "SELECT * FROM propostas_veiculos where digitacao = 'A Digitar' and titulo_proposta = '$titulo_proposta' order by data_proposta,horaproposta asc";
}
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$num_proposta_veiculos = $linha[0];

$dataproposta = $linha[1];

$horaproposta = $linha[2];

$mes_ano = $linha[3];

$estabelecimento_proposta = $linha[4];

$operador_atendente = $linha[5];

$status2 = $linha[6];

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

$capital_social = $linha[65];

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

$valor_financiar2 = $linha[99];

$coeficiente = $linha[100];

$codigo_tabela = $linha[101];

$num_parcelas2 = $linha[102];

$valor_parcelas2 = $linha[103];

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

$operador = $linha[117];

$cel_operador_alterou = $linha[118];

$email_operador_alterou = $linha[119];

$estab_alterou = $linha[120];

$cidade_estab_alterou = $linha[121];

$tel_estab_alterou = $linha[122];

$email_estab_alterou = $linha[123];

$dataalteracao = $linha[124];

$horaalteracao = $linha[125];

$recebido = $linha[126];

$comissao_op = $linha[127];

$meses = $linha[128];

$parecer_credito = $linha[145];

$titulo_proposta = $linha[150];

$digitacao_veiculos = $linha[151];

?>
<table width="100%"  border="0">
  <tr bgcolor="#<? echo "008080"; ?>">
    <td><div align="center"><font size="2">N&ordm; da Proposta </font></div></td>
    <td><div align="center"><font size="2">Data Proposta</font></div></td>
    <td><div align="center"><font size="2">Valor Cr&eacute;dito</font></div></td>
    <td width="7%"><div align="center"><font size="2">Quant  parcelas </font></div></td>
    <td width="8%"><div align="center"><font size="2">Valor parcelas </font></div></td>
    <td><div align="center">Titulo Proposta</div></td>
    <td><div align="center"><font size="2">Status</font></div></td>
  </tr>
  <tr>
    <td width="17%"><form name="form2" method="post" action="visualizacao_de_proposta_de_veiculos_para_digitacao.php">
      <div align="center"> <font size="2">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta_veiculos; ?>">
        <span class="style3">
        <input name="digitacao" type="hidden" id="digitacao" value="<? echo "Digitada";  ?>">
        </span>      </font> 
        <? if($digitacao_veiculos=="A Digitar"){ echo "<input type='submit' name='button' id='button' value='$num_proposta_veiculos'>"; } ?></div>
    </form></td>
    <td width="10%"><div align="center"><font size="2"><? echo $dataproposta;?></font><font size="2"><? echo " - $horaproposta";?></font></div></td>
    <td width="8%"><div align="center"><font size="2"><? echo "R$ ".$valor_financiar2;?> </font></div></td>
    <td><div align="center"><font size="2"><? echo $num_parcelas2;?> </font></div></td>
    <td><div align="center"><font size="2"><? echo "R$ ".$valor_parcelas2;?> </font></div></td>
    <td width="11%"><div align="center"><font size="2"><? echo $titulo_proposta;?></font></div></td>
    <td width="15%"><div align="center"><font size="2"><? echo $status2;?> </font></div></td>
    <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
    <? } ?>
</table>
<p>&nbsp;</p>



</body>
</html>
