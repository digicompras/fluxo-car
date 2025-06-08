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
          <td valign="middle">&nbsp;</td>
          <td colspan="2" valign="middle"><form name="form3" method="post" action="propostas_a_digitar.php">
            <div align="center"><strong><font color="#0000FF">
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

<p>&nbsp;</p>



</body>
</html>
