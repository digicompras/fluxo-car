<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {font-size: 24px}
.style4 {font-size: 14px}
.style5 {
	font-size: 20px;
	font-weight: bold;
}
-->
</style>
</head>

<?
//require("conexao.php"); or die("erro na requisição");
require '../../../conect/conect.php';



setlocale(LC_TIME, 'pt_BR');

$data_completa = strftime("%A, %d de %B de %Y<br><br>");

$hoje = strftime("%A");
	
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$cidadeatuacao = $linha[48];

}



?>
<?

$cod_conciliacao = $_POST['cod_conciliacao'];
$fornecedor = $_POST['fornecedor'];
	
$sql = "SELECT * FROM fornecedores where nfantasia = '$fornecedor' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nfantasia_fornecedor = $linha[2];
$cnpj_fornecedor = $linha[3];
$inscr_est_fornecedor = $linha[4];
$obs_fornecedor = $linha[19];
	
$banco_fornecedor = $linha[43];
$codagencia_fornecedor = $linha[44];
$digitoagencia_fornecedor = $linha[45];
$conta_fornecedor = $linha[46];
$digitoconta_fornecedor = $linha[47];
$tipoconta_fornecedor = $linha[48];
$titularconta_fornecedor = $linha[49];
$nomeagencia_fornecedor = $linha[50];

}

$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];

$hora_pagto = $_POST['hora_pagto'];
	
	
$sql = "select sum(valordespesa) as total_despesa from conciliacao_comprovantes where cod_conciliacao = '$cod_conciliacao'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_despesa = $linha['total_despesa'];

//$valor_total_fornecedor = $_POST['total_despesa'];
	$valor_total_fornecedor = $total_despesa;
$valor_total_fornecedor_formatado = number_format($valor_total_fornecedor, 2, ",", ".");


?>
<body bgcolor="#ffffff">

<?
$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$razaosocial_empresa = $linha[1];
$nfantasia_empresa = $linha[2];
$cnpj_empresa = $linha[3];
$inscr_est_empresa = $linha[4];
$endereco_empresa = $linha[5];
$numero_empresa = $linha[6];
$bairro_empresa = $linha[7];
$complemento_empresa = $linha[8];
$cep_empresa = $linha[9];
$cidade_empresa = $linha[10];
$estado_empresa = $linha[11];
$telefone_empresa = $linha[12];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
?>
<?
$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];
$celular_op = $linha[19];
$email_op = $linha[20];
$estabelecimento_op = $linha[24];
$cidade_estabelecimento_op = $linha[25];
$tel_estabelecimento_op = $linha[26];
$email_estabelecimento_op = $linha[27];
$estab_pertence_op = $linha[44];
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];

}
?>



<br>
<table width="95%"  border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><div align="center">
      <?


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

//printf("<img src='../../imagens/$linha[1]' border='0'  width='$linha[2]' ><br><br>"); 
}
?>
    </div>      <div align="center"></div></td>
  </tr>
  
  <tr>
    <td><div align="center"></div>      
    <div align="center"><strong><span class="style2"><? echo "$razaosocial_empresa"; ?></span><br>
        <span class="style4"><? echo "$razaosocial_empresa - "; ?> CNPJ: <? echo "$cnpj_empresa - "; ?> INSCR. EST.: <? echo "$inscr_est_empresa"; ?><br>
        <? echo $endereco_empresa; ?>, N&ordm; <? echo $numero_empresa; ?>, Bairro <? echo $bairro_empresa; ?>
        <? echo $cidade_empresa; ?> - <? echo $estado_empresa; ?> CEP <? echo $cep_empresa; ?><br>
        Fone: <? echo $telefone_empresa; ?>
    E-Mail:<? echo $email_empresa; ?> Site:<? echo $site_empresa; ?></span></strong></div></td>
  </tr>
</table>
<table width="95%" border="3" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="4"><div align="center" class="style2"><strong>RECIBO DE PAGAMENTO NUMERO <? echo "$cod_conciliacao"; ?></strong></div></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><div align="center"><? echo "$estab_pertence".", "."$data_completa"; ?><span class="style5"></span></div></td>
  </tr>
  <tr>
    <td><div align="center">Valor</div></td>
    <td width="73%" colspan="3"><div align="center">Valor por extenso</div></td>
  </tr>
  <tr>
    <td width="22%"><div align="center"><strong>
    <? 
if($valor_total_fornecedor<>""){ echo "R$ $valor_total_fornecedor_formatado"; } 




?>
    </strong></div></td>
    <td colspan="3"><div align="center"><strong>
  <? 
//inicio valor por extenso pespontador

if($valor_total_fornecedor<>""){

function extenso($valor_total_fornecedor = 0, $maiusculas = false) {

$singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
$plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões",
"quatrilhões");

$c = array("", "cem", "duzentos", "trezentos", "quatrocentos",
"quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
$d = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta",
"sessenta", "setenta", "oitenta", "noventa");
$d10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze",
"dezesseis", "dezesete", "dezoito", "dezenove");
$u = array("", "um", "dois", "tr&ecirc;s", "quatro", "cinco", "seis",
"sete", "oito", "nove");

$z = 0;
$rt = "";

$valor_total_fornecedor = number_format($valor_total_fornecedor, 2, ".", ".");
$inteiro = explode(".", $valor_total_fornecedor);
for($i=0;$i<count($inteiro);$i++)
for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
$inteiro[$i] = "0".$inteiro[$i];

$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
for ($i=0;$i<count($inteiro);$i++) {
$valor_total_fornecedor = $inteiro[$i];
$rc = (($valor_total_fornecedor > 100) && ($valor_total_fornecedor < 200)) ? "cento" : $c[$valor_total_fornecedor[0]];
$rd = ($valor_total_fornecedor[1] < 2) ? "" : $d[$valor_total_fornecedor[1]];
$ru = ($valor_total_fornecedor > 0) ? (($valor_total_fornecedor[1] == 1) ? $d10[$valor_total_fornecedor[2]] : $u[$valor_total_fornecedor[2]]) : "";

$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
$ru) ? " e " : "").$ru;
$t = count($inteiro)-1-$i;
$r .= $r ? " ".($valor_total_fornecedor > 1 ? $plural[$t] : $singular[$t]) : "";
if ($valor_total_fornecedor == "000")$z++; elseif ($z > 0) $z--;
if (($t==1) && ($z>0) && ($inteiro[0] > 0)) $r .= (($z>1) ? " de " : "").$plural[$t];
if ($r) $rt = $rt . ((($i > 0) && ($i <= $fim) &&
($inteiro[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
}

if(!$maiusculas){
return($rt ? $rt : "zero");
} else {

if ($rt) $rt=ereg_replace(" E "," e ",ucwords($rt));
return (($rt) ? ($rt) : "Zero");
}

}

$valor_total_fornecedor = $valor_total_fornecedor;
$dim = extenso($valor_total_fornecedor);
$dim = ereg_replace(" E "," e ",ucwords($dim));

$valor_total_fornecedor = number_format($valor_total_fornecedor, 2, ",", ".");

echo "$dim";

}
//fim valor por extenso pespontador


 ?>
      
  
      
      
      
    </strong></div></td>
  </tr>
  <tr>
    <td height="91" colspan="4" valign="middle"><div align="center" class="style5">
      
      
      <p>Eu, <? echo $nfantasia_fornecedor; ?>  CPF/CNPJ:<? echo $cnpj_fornecedor; ?> e RG/INSCR. EST.: <? echo "$inscr_est_fornecedor"; ?><br> Declaro para os devidos fins de direito que, recebi de <? echo "$estab_pertence"; ?><br>
        a quantia acima descrita, referente &agrave; pagamento por servi&ccedil;os prestados e/ou locação no per&iacute;odo a seguir:</p>
      <p><? echo "$obs_fornecedor"; ?> </p>
      <table width="98%" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="11%" ><strong>Data</strong></td>
          <td width="22%" ><strong>Descri&ccedil;&atilde;o</strong></td>
          <td width="11%" ><strong>Veiculo / Objeto</strong></td>
          <td width="8%" ><strong>Placa</strong></td>
          <td width="8%" ><strong>KM</strong></td>
          <td width="7%" ><strong>HOR</strong></td>
          <td width="8%" ><strong>Valor</strong></td>
          <td width="8%" ><strong>Categoria</strong></td>
          <td width="10%" ><strong>Modo Pagto</strong></td>
          <td width="7%" ><strong>NF</strong></td>
        </tr>
        <?
$sql = "SELECT * FROM conciliacao_comprovantes where cod_conciliacao = '$cod_conciliacao' order by datadespesa desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$cod_conciliacao = $linha[0];
	$datadespesa = $linha[2];
	$fornecedordespesa = $linha[3];
	$descricaodespesa = $linha[4];
	$nfdespesa = $linha[5];
	$valordespesa = $linha[6];
	$comprovantedespesa = $linha[9];
	$categoriadespesa = $linha[13];
$modopagto = $linha[14];
	$veiculo = $linha[16];
	$placa = $linha[17];
	$km = $linha[18];
	$horimetro = $linha[19];
?>
        <tr>
          <td ><? echo "$datadespesa"; ?></td>
          <td ><? echo "$descricaodespesa"; ?></td>
          <td ><? echo "$veiculo"; ?></td>
          <td ><? echo "$placa"; ?></td>
          <td ><? echo "$km"; ?></td>
          <td ><? echo "$horimetro"; ?></td>
          <td ><? echo "R$ $valordespesa"; ?></td>
          <td ><? echo "$categoriadespesa"; ?></td>
          <td ><? echo "$modopagto"; ?></td>
          <td ><? echo "<a href='$comprovantedespesa' target='_blank'>$nfdespesa</a>"; ?></td>
        </tr>
        <? } ?>
      </table>
      <br>
      <table width="98%" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="8" align="center" ><strong>DADOS BANC&Aacute;RIOS</strong><strong></strong></td>
          </tr>
        <tr>
          <td align="center" ><strong>Banco</strong></td>
          <td align="center" ><strong>Nome Agencia</strong></td>
          <td align="center" ><strong>Cod Agencia</strong></td>
          <td align="center" ><strong>DV</strong></td>
          <td align="center" ><strong>Conta</strong></td>
          <td align="center" ><strong>DV</strong></td>
          <td align="center" ><strong>Tipo de conta</strong></td>
          <td align="center" ><strong>Titular</strong></td>
          </tr>
        <tr>
          <td width="11%" align="center" ><? echo "$banco_fornecedor"; ?></td>
          <td width="24%" align="center" ><? echo "$nomeagencia_fornecedor"; ?></td>
          <td width="9%" align="center" ><? echo "$codagencia_fornecedor"; ?></td>
          <td width="8%" align="center" ><? echo "$digitoagencia_fornecedor"; ?></td>
          <td width="8%" align="center" ><? echo "$conta_fornecedor"; ?></td>
          <td width="7%" align="center" ><? echo "$digitoconta_fornecedor"; ?></td>
          <td width="8%" align="center" ><? echo "$tipoconta_fornecedor"; ?></td>
          <td width="8%" align="center" ><? echo "$titularconta_fornecedor"; ?></td>
          </tr>
      </table>
      <p><br>
      </p>
    </div></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="241%" colspan="4"><div align="center"><strong>Por ser a express&atilde;o da verdade, firmo a presente</strong>,</div></td>
  </tr>
  <tr>
    <td colspan="4"><div align="center">
      <br>
    </div>      <div align="center"><strong><? echo "__________________________________________________"; ?><br><? echo "$nfantasia_fornecedor<br>CNPJ/CPF: $cnpj_fornecedor"; ?></strong></div></td>
  </tr>
</table>
<p>
</body>
</html>
<?
mysql_close($conexao);
?>