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
<title>ESPA&Ccedil;O MADEIRO - (16) 3722-3598 CARNE DO CLIENTE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 20px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	font-size: 24px;
	font-weight: bold;
}
.style3 {font-size: 16px; font-weight: bold; }
.style4 {font-size: 18px}
.style5 {font-size: 18px; font-weight: bold; }
.style8 {font-size: 12px}
.style9 {
	font-size: 13px;
	font-weight: bold;
}
.style10 {font-size: 10px}
-->
</style>
</head>

<?

require '../../conect/conect.php';

			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("ffffff"); ?>"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" bgproperties="fixed" marginwidth="0" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>
<?
$codigo = $_POST['codigo'];
$num_proposta = $_POST['num_proposta'];


$sql = "SELECT * FROM clientes where codigo = '$codigo'";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {

$codigo_cli = $linha[0];
$nome_cli = $linha[1];
$sexo_cli = $linha[2];
$estadocivil_cli = $linha[3];
$cpf_cli = $linha[4];
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

$resposta = $linha[119];

}
	

?>

<?

$sql = "SELECT * FROM registro_visitas where cod_cli = '$codigo'";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$cpf = $linha[7];
$quant_eventos = $linha[176];
$site = $linha[177];
$data_evento = $linha[178];
$date_evento = $linha[179];
$dia_evento = $linha[180];
$mes_evento = $linha[181];
$ano_evento = $linha[182];
$dia_semana_evento = $linha[183];
$mural = $linha[184];
$pre_reserva = $linha[185];
$lista_espera = $linha[186];
$preparacao_dias = $linha[187];
$ocorrencia = $linha[188];
$categoria = $linha[189];
$sub_categoria = $linha[190];
$buffet = $linha[191];
$cerimonia = $linha[192];
$numero_pesoas = $linha[193];
$decoracao = $linha[194];
$responsavel = $linha[195];
$fotografia = $linha[196];
$video = $linha[197];
$estrela = $linha[198];
$conjuge1 = $linha[199];
$conjuge2 = $linha[200];
$dj = $linha[201];
$banda = $linha[202];
$contatos = $linha[203];
$bolos_e_doces = $linha[204];
$valor = $linha[205];
$iluminacao = $linha[206];
$forma_pagamento = $linha[207];
$bartender = $linha[208];
$como_chegou_ate_nos = $linha[209];
$fechou = $linha[210];
$contrato = $linha[211];
$realizada = $linha[212];





}

?>


<?
$sql = "SELECT * FROM logo limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$logo = $linha[1];

}
?>
<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];

}
	

?>




<?
$sql = "SELECT * FROM contas_a_receber where codigo_cli = '$codigo_cli' and quitacao = 'Em Aberto' order by codigo asc";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg_mensalidade++;


$codigo_aluno = $linha[1];
$nome = $linha[4];
$nome_resp = $linha[5];
$cpf_resp = $linha[6];
$mensalidade = $linha[11];
$juros_diarios = $linha[15];
$quitacao = $linha[17];

$vencto = $linha[12];
$quant_parc = $linha[13];

?>
<table width="100%"  border="2" bordercolor="#000000">
  <tr>
    <td width="25%" rowspan="2" valign="top" bordercolor="#FFFFFF"><? printf("<img src='../../imagens/$logo' border='0' width='120' height='60'>"); ?></td>
    <td width="25%" bordercolor="#FFFFFF"><div align="center"><span class="style3">Vencimento</span></div></td>
    <td width="1%" align="center" valign="top" bordercolor="#FFFFFF"><div align="left">|</div></td>
    <td width="24%" rowspan="2" valign="top" bordercolor="#FFFFFF"><? printf("<img src='../../imagens/$logo' border='0' width='120' height='60'>"); ?></td>
    <td width="25%" bordercolor="#FFFFFF"><div align="center"><span class="style3">Vencimento</span></div></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="center" class="style1 style4"><? echo $vencto; ?></div></td>
    <td width="1%" align="center" valign="top" bordercolor="#FFFFFF"><div align="left">|</div></td>
    <td bordercolor="#FFFFFF"><div align="center" class="style5"><? echo $vencto; ?></div></td>
  </tr>
  <tr>
    <td colspan="2" bordercolor="#FFFFFF"><span class="style8">Codigo <? echo $codigo_cli; ?> Cliente <span class="style9"><? echo $nome_cli; ?></span></span></td>
    <td width="1%" align="center" valign="top" bordercolor="#FFFFFF"><div align="left" class="style8">|</div></td>
    <td colspan="2" bordercolor="#FFFFFF"><span class="style8">Codigo <? echo $codigo_cli; ?> Cliente <span class="style9"><? echo $nome_cli; ?></span></span></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><span class="style10">Categoria Evento <? echo $categoria; ?></span></td>
    <td bordercolor="#FFFFFF"><span class="style10">Sub-Categoria Evento <? echo $sub_categoria; ?></span></td>
    <td align="center" valign="top" bordercolor="#FFFFFF"><div align="left" class="style10">|</div></td>
    <td bordercolor="#FFFFFF"><span class="style10">Categoria Evento <? echo $categoria; ?></span></td>
    <td bordercolor="#FFFFFF"><span class="style10">Sub-Categoria Evento <? echo $sub_categoria; ?></span></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><span class="style10">Respons&aacute;vel <? echo $responsavel; ?></span></td>
    <td bordercolor="#FFFFFF"><span class="style10">CPF <? echo $cpf_cli; ?></span></td>
    <td width="1%" align="center" valign="top" bordercolor="#FFFFFF"><div align="left" class="style10">|</div></td>
    <td bordercolor="#FFFFFF"><span class="style10">Respons&aacute;vel <? echo $responsavel; ?></span></td>
    <td bordercolor="#FFFFFF"><span class="style10">CPF <? echo $cpf_resp; ?></span></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><span class="style10">Parcelas <? echo $reg_mensalidade; ?> / <? echo $quant_parc; ?></span></td>
    <td bordercolor="#FFFFFF"><span class="style10">Juros Di&aacute;rios <? echo "R$ ".$juros_diarios; ?></span></td>
    <td width="1%" align="center" valign="top" bordercolor="#FFFFFF"><div align="left" class="style10">|</div></td>
    <td bordercolor="#FFFFFF"><span class="style10">Parcelas <? echo $reg_mensalidade; ?> / <? echo $quant_parc; ?></span></td>
    <td bordercolor="#FFFFFF"><span class="style10">Juros Di&aacute;rios <? echo "R$ ".$juros_diarios; ?></span></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><span class="style10">Valor <? echo "R$ ".$mensalidade; ?></span></td>
    <td bordercolor="#FFFFFF"><span class="style10">Valor recebido </span></td>
    <td width="1%" align="center" valign="top" bordercolor="#FFFFFF"><div align="left" class="style10">|</div></td>
    <td bordercolor="#FFFFFF"><span class="style10">Valor <? echo "R$ ".$mensalidade; ?></span></td>
    <td bordercolor="#FFFFFF"><span class="style10">Valor recebido </span></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><span class="style10">Quita&ccedil;&atilde;o</span></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
    <td width="1%" align="center" valign="top" bordercolor="#FFFFFF"><div align="left" class="style10">|</div></td>
    <td bordercolor="#FFFFFF"><span class="style10">Quita&ccedil;&atilde;o</span></td>
    <td bordercolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="bottom" bordercolor="#FFFFFF"><div align="center" class="style10">(carimbo e assinatura)
      
      
      "Se voc&ecirc; ainda n&atilde;o acabou o curso, por favor, pegue seu pr&oacute;ximo carn&ecirc; na recep&ccedil;&atilde;o" </div></td>
    <td align="center" valign="top" bordercolor="#FFFFFF"><div align="left" class="style10">|</div></td>
    <td colspan="2" valign="bottom" bordercolor="#FFFFFF"><div align="center" class="style10">(carimbo e assinatura)
      
      
      "Se voc&ecirc; ainda n&atilde;o acabou o curso, por favor, pegue seu pr&oacute;ximo carn&ecirc; na recep&ccedil;&atilde;o" </div></td>
  </tr>
</table>
<p>  

<?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>
  
  <? } ?>
</p>
</body>
</html>
<?
mysql_close($conexao);
?>