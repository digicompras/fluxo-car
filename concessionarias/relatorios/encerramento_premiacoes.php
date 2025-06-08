<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

?>
<?

require '../../conect/conect.php';

?>

<?

$nome = $_POST['nome'];

$dia_referencia = $_POST['dia_referencia'];

$mes_referencia = $_POST['mes_referencia'];

$ano_referencia = $_POST['ano_referencia'];

$comissao = $_POST['comissao'];



?>

<?
$sql = "SELECT * FROM tabela_meses where ano = '$ano_referencia' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$ano = $linha[1];

$mes01 = $linha[2];
$dias01 = $linha[3];
$dias_trabalhados01 = $linha[4];
$dsr01 = $linha[5];

$mes02 = $linha[6];
$dias02 = $linha[7];
$dias_trabalhados02 = $linha[8];
$dsr02 = $linha[9];

$mes03 = $linha[10];
$dias03 = $linha[11];
$dias_trabalhados03 = $linha[12];
$dsr03 = $linha[13];

$mes04 = $linha[14];
$dias04 = $linha[15];
$dias_trabalhados04 = $linha[16];
$dsr04 = $linha[17];

$mes05 = $linha[18];
$dias05 = $linha[19];
$dias_trabalhados05 = $linha[20];
$dsr05 = $linha[21];

$mes06 = $linha[22];
$dias06 = $linha[23];
$dias_trabalhados06 = $linha[24];
$dsr06 = $linha[25];

$mes07 = $linha[26];
$dias07 = $linha[27];
$dias_trabalhados07 = $linha[28];
$dsr07 = $linha[29];

$mes08 = $linha[30];
$dias08 = $linha[31];
$dias_trabalhados08 = $linha[32];
$dsr08 = $linha[33];

$mes09 = $linha[34];
$dias09 = $linha[35];
$dias_trabalhados09 = $linha[36];
$dsr09 = $linha[37];

$mes10 = $linha[38];
$dias10 = $linha[39];
$dias_trabalhados10 = $linha[40];
$dsr10 = $linha[41];

$mes11 = $linha[42];
$dias11 = $linha[43];
$dias_trabalhados11 = $linha[44];
$dsr11 = $linha[45];

$mes12 = $linha[46];
$dias12 = $linha[47];
$dias_trabalhados12 = $linha[48];
$dsr12 = $linha[49];



$mes_comercial = $linha[50];

}
?>

<html>
<head>
<title>FOLHA DE PAGTO - ENCERRAMENTO PREMIAÇÕES</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {color: #FFFFFF}
.style2 {color: #000000}
.style4 {color: #000000; font-weight: bold; }
-->
</style></head>
<body>
<?

$sql = "SELECT * FROM operadores where nome = '$nome' order by nome asc";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$nome_operador = $linha[1];

$sexo = $linha[2];

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

$usuario_op = $linha[40];

$senha_op = $linha[41];

$grupo = $linha[42];

$funcao = $linha[43];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];



$salario = $linha[48];

$vale_alimentacao = $linha[49];

$gratificacao = $linha[50];

$emprestimo = $linha[52];

$admissao = $linha[53];

$demissao = $linha[54];

$meta = $linha[55];

$status = $linha[56];

$bloqueio_parcial = $linha[57];

$tempo_almoco = $linha[58];

$tipo_remuneracao = $linha[61];

?>
<?
$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$razaosocial_empresa_conveniada = $linha[1];

$nfantasia_empresa_conveniada = $linha[2];

$cnpj_empresa_conveniada = $linha[3];
$inscr_est_empresa_conveiada = $linha[4];

$endereco_empresa_conveniada = $linha[5];
	$numero_empresa_conveniada = $linha[6];
	$bairro_empresa_conveniada = $linha[7];
	$cep_empresa_conveniada = $linha[9];
	$cidade_empresa_conveniada = $linha[10];
	$estado_empresa_conveniada = $linha[11];
	$telefone_empresa_conveniada = $linha[12];
	$email_empresa_conveniada = $linha[16];
	$site_empresa_conveniada = $linha[17];


}

?>


<table width="100%" border="1" cellspacing="0" cellpadding="0">

  <tr>
    <td colspan="5" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><?  echo $nfantasia_empresa_conveniada; ?></td>
      </tr>
      <tr>
        <td><? echo "$endereco_empresa_conveniada "."$numero_empresa_conveniada";  ?></td>
      </tr>
      <tr>
        <td><?  echo $cnpj_empresa_conveniada; ?></td>
      </tr>
    </table>
    </td>
    <td colspan="2" valign="top"><div align="left">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="2" valign="top"><div align="center"><strong><? echo "Demonstrativo de Pagamento de Premiações"; ?></strong></div></td>
        </tr>
        <tr>
          <td width="45%"><div align="center"><strong>PERIODO</strong></div></td>
          <td width="55%"><div align="center"><strong><? echo "$mes_referencia de $ano_referencia"; ?></strong></div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center"></div></td>
        </tr>
      </table>
    </div>
    <div align="center"></div>      <div align="center"></div></td>
    <td width="4%" rowspan="6"><img src="imagens/assinatura_do_recibo_de_pagto.jpg" width="81" height="477"></td>
  </tr>
  
  
  
  <tr>
    <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%"><div align="center"><strong>COD</strong></div></td>
        <td width="40%"><div align="center"><strong>NOME</strong></div></td>
        <td width="21%"><div align="center"><strong>CBO</strong></div></td>
        <td width="17%"><div align="center"><strong>SECAO</strong></div></td>
        <td width="18%"><div align="center"><strong>FUNCAO</strong></div></td>
      </tr>
      <tr>
        <td><div align="center"><? echo $codigo; ?></div></td>
        <td><div align="center"><? echo $nome; ?></div></td>
        <td><div align="center"><? echo $cbo; ?></div></td>
        <td><div align="center"><? echo $secao; ?></div></td>
        <td><div align="center"><? echo $funcao; ?></div></td>
      </tr>
      <tr>
        <td><div align="left"></div></td>
        <td colspan="4"><div align="center"></div>          <div align="center"></div>          <div align="center"></div>          <div align="center"></div>          <div align="center"></div>          <div align="center"></div></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td width="6%"><div align="center"><strong>COD</strong></div></td>
    <td colspan="3"><div align="center"><strong>DESCRICAO</strong></div></td>
    <td width="16%"><div align="center"><strong>REF</strong></div></td>
    <td width="16%"><div align="center"><strong>VENCIMENTOS</strong></div></td>
    <td width="16%"><div align="center"><strong>DESCONTOS</strong></div></td>
  </tr>
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="center">102</div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
    </table></td>
    <td colspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>Premiações</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="center"><strong>
          <?
			

echo "$mes_referencia-$ano_referencia";
?>
        </strong></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
    </table></td>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="center"><strong>
          <?
			

echo " R$ $comissao";
?>
        </strong></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
    </table></td>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="center" class="style1"><? echo "R$ 0.00"; ?></div></td>
      </tr>
      <tr>
        <td><div align="center" class="style1"><? echo "R$ 0.00"; ?></div></td>
      </tr>
      <tr>
        <td><div align="center" class="style1"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="5" align="center" valign="middle"><strong>
      <? 
//inicio valor por extenso pespontador

if($comissao<>""){

function extenso($comissao = 0, $maiusculas = false) {

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

$comissao = number_format($comissao, 2, ".", ".");
$inteiro = explode(".", $comissao);
for($i=0;$i<count($inteiro);$i++)
for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
$inteiro[$i] = "0".$inteiro[$i];

$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
for ($i=0;$i<count($inteiro);$i++) {
$comissao = $inteiro[$i];
$rc = (($comissao > 100) && ($comissao < 200)) ? "cento" : $c[$comissao[0]];
$rd = ($comissao[1] < 2) ? "" : $d[$comissao[1]];
$ru = ($comissao > 0) ? (($comissao[1] == 1) ? $d10[$comissao[2]] : $u[$comissao[2]]) : "";

$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
$ru) ? " e " : "").$ru;
$t = count($inteiro)-1-$i;
$r .= $r ? " ".($comissao > 1 ? $plural[$t] : $singular[$t]) : "";
if ($comissao == "000")$z++; elseif ($z > 0) $z--;
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

$comissao = $comissao;
$dim = extenso($comissao);
$dim = ereg_replace(" E "," e ",ucwords($dim));

$comissao = number_format($comissao, 2, ",", ".");

echo "Declaro para os devidos fins de direito que, recebi a quantia de ($comissao) $dim referente à pagamento de comissao e nada tenho a me opor.";

}
//fim valor por extenso pespontador


 ?></strong></td>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="center"><strong>Total Vencimentos</strong></div></td>
      </tr>
      <tr>
        <td><div align="center" class="style2">
          <strong>
          <? 
echo "R$ $comissao";

?>
          </strong></div></td>
      </tr>
      <tr>
        <td><div align="center"><span class="style2"></span></div></td>
      </tr>
      <tr>
        <td><div align="center"><strong>Valor Liquido a Receber</strong> --&gt;&gt;</div></td>
      </tr>
    </table></td>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="center"><strong>Total Descontos</strong></div></td>
      </tr>
      <tr>
        <td><div align="center"><span class="style2">
          <? 

$total_descontos = bcadd($total_vales,0,2);

echo "R$ $total_descontos";



?>
        </span></div></td>
      </tr>
      <tr>
        <td><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center"><span class="style4">
          <? 
//if($meta_atingida>=100){


$liquido_a_receber = bcsub($total_vencimentos,$total_descontos,2);

echo "R$ $liquido_a_receber";

//}
//else{

//echo "R$ 0.00";

//}

?>
        </span></div></td>
      </tr>
    </table></td>
  </tr>
  
  <tr>
    <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><div align="center">Salario Base</div></td>
        <td><div align="center">Sal. Contr. INSS</div></td>
        <td><div align="center">Base Calc. FGTS</div></td>
        <td><div align="center">FGTS do Mes</div></td>
        <td><div align="center">Base Calc. IRRF</div></td>
        <td><div align="center">Faixa IRRF</div></td>
      </tr>
      <tr>
        <td><div align="center"><? //echo $salario; ?></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
        <td><div align="center"></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<br>
<? } ?>
</body>

</html>