<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<?
//require("conexao.php"); or die("erro na requisição");
require '../../conect/conect.php';
?>

<?
$sql = "SELECT * FROM carta limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$texto1 = $linha[1];
$tamanho_t1 = $linha[2];
$texto2 = $linha[3];
$tamanho_t2 = $linha[4];
$texto3 = $linha[5];
$tamanho_t3 = $linha[6];
$texto4 = $linha[7];
$tamanho_t4 = $linha[8];
$texto5 = $linha[9];
$tamanho_t5 = $linha[10];

}

?>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style6 {font-size: 14px; font-weight: bold; }
.style7 {
	font-size: 18px;
	font-weight: bold;
}
.style1 {font-size: <? echo $tamanho_t1; ?>;}
.style2 {font-size: <? echo $tamanho_t2; ?>;}
.style3 {font-size: <? echo $tamanho_t3; ?>;}
.style4 {font-size: <? echo $tamanho_t4; ?>;}
.style5 {font-size: <? echo $tamanho_t5; ?>;}

-->
</style>
</head>






<body bgcolor="#ffffff">

<?
// dados do estabelecimento

$codigo_cliente = $_POST['codigo_cliente'];
$hoje = date('d/m/Y');


$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];




$sql = "SELECT * FROM clientes where codigo = '$codigo_cliente' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];

$nome = $linha[1];

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

$tipo = $linha[40];

$banco = $linha[41];

$agencia = $linha[42];

$conta = $linha[43];

$num_beneficio = $linha[44];



$parc1 = $linha[45];

$banco1 = $linha[46];

$vencto1 = $linha[47];

$compra1 = $linha[48];



$parc2 = $linha[49];

$banco2 = $linha[50];

$vencto2 = $linha[51];

$compra2 = $linha[52];



$parc3 = $linha[53];

$banco3 = $linha[54];

$vencto3 = $linha[55];

$compra3 = $linha[56];



$parc4 = $linha[57];

$banco4 = $linha[58];

$vencto4 = $linha[59];

$compra4 = $linha[60];



$parc5 = $linha[61];

$banco5 = $linha[62];

$vencto5 = $linha[63];

$compra5 = $linha[64];



$parc6 = $linha[65];

$banco6 = $linha[66];

$vencto6 = $linha[67];

$compra6 = $linha[68];



$parc7 = $linha[69];

$banco7 = $linha[70];

$vencto7 = $linha[71];

$compra7 = $linha[72];



$num_beneficio2 = $linha[73];

$num_beneficio3 = $linha[74];

$num_beneficio4 = $linha[75];



$dataprev2 = $linha[76];

$obs2 = $linha[77];





$dataprev = $linha[76];

$cpf_rg = $linha[78];

$comp_end = $linha[79];

$comp_quit1 = $linha[80];

$comp_quit2 = $linha[81];

$comp_quit3 = $linha[82];

$comp_quit4 = $linha[83];

$comp_quit5 = $linha[84];

$comp_quit6 = $linha[85];

$comp_renda = $linha[86];

$cpf_rg_testemunha = $linha[87];

$mes_niver = $linha[88];

$status_cliente = $linha[89];

$tem_margem = $linha[107];
$saldo1 = $linha[108];
$saldo2 = $linha[109];
$saldo3 = $linha[110];
$saldo4 = $linha[111];
$saldo5 = $linha[112];
$saldo6 = $linha[113];
$saldo7 = $linha[114];
$naturalidade = $linha[115];
$pagto_beneficio = $linha[116];



$resposta = $linha[119];

}
?>

<?
$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
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

<table width="100%"  border="0">
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">
      <?


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

printf("<img src='../../logo/$linha[1]' border='0'  width='$linha[2]' ><br><br>"); 
}
?>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="42%"><div align="center"><strong>***FELIZ ANIVERS&Aacute;RIO!***</strong></div></td>
    <td width="33%"><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">
    </div></td>
    <td><div align="center"><strong><? echo $nome; ?></strong><br>
R/AV <strong><? echo $endereco; ?></strong>, N&ordm; <strong><? echo $numero; ?></strong>, Bairro <strong><? echo $bairro; ?></strong><br>
<strong><? echo $cidade; ?> - <? echo $estado; ?></strong> CEP <strong><? echo $cep; ?></strong></div></td>
    <td><div align="center">
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"><? echo "Procure por mim "; ?><div class="style7"><?  echo $nome_op;   ?></div><? echo " que lhe atenderei e explicarei tudo da melhor forma possível!"; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><span class="style6">
      
    </span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>
      <? echo "<div align='center' class='style1'>". $texto1. "</div>"; ?></td>
    <td rowspan="2"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><? echo "<div align='center' class='style2'>". $texto2. "</div>"; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><? echo "<div align='center' class='style3'>". $texto3. "</div>"; ?></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><? echo "<div align='center' class='style4'>". $texto4. "</div>"; ?></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><? echo "<div align='center' class='style5'>". $texto5. "</div>"; ?></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>
      <?

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence_op'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {




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


}


?>
      <br>
      <? echo $nfantasia; ?></strong><br>
      <strong><? echo $endereco; ?></strong>, N&ordm; <strong><? echo $numero; ?></strong>, Bairro <strong><? echo $bairro; ?></strong><br>
      <strong><? echo $cidade; ?> - <? echo $estado; ?></strong> CEP <strong><? echo $cep; ?></strong> <br>
      <strong><? echo $site; ?></strong><strong><br>
    <? echo $email_empresa; ?></strong></div></td>
  </tr>
</table>
</body>
</html>
<?
mysql_close($conexao);
?>