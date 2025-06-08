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
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	font-size: 24px;
	font-weight: bold;
}
.style4 {
	font-size: 18px;
	font-weight: bold;
}
.style5 {font-size: 18px}
.style9 {font-size: 14px; font-weight: bold; }
.style10 {font-size: 14px}
-->
</style></head>

<?

require '../../../conect/conect.php';

			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>
<?
// dados do aluno
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$datacadastro = date('d-m-Y');
$horacadastro = date('H:i:s');
$nfantasia = $_POST['nfantasia'];
$historico = $_POST['historico'];
$categoria_conta = $_POST['categoria_conta'];
$valor = $_POST['valor'];
$cliente = $_POST['cliente'];





//dados do operador

$operador = $_POST['operador'];
$cel_operador = $_POST['cel_operador'];
$email_operador = $_POST['email_operador'];
$estabelecimento = $_POST['estabelecimento'];
$cidade_estabelecimento = $_POST['cidade_estabelecimento'];
$tel_estabelecimento = $_POST['tel_estabelecimento'];
$email_estabelecimento = $_POST['email_estabelecimento'];



?>

<?

$comando = "insert into cx_entradas(dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,valor,nome,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento) values('$dia','$mes','$ano','$datacadastro','$horacadastro','$nfantasia','$historico','$categoria_conta','$valor','$cliente','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento')";

mysql_query($comando,$conexao) or die("Erro ao registrar a entrada no Caixa!... Tente novamente");

echo "Entrada no caixa registrada com sucesso!<br><br>";



$sql = "SELECT * FROM cx_entradas order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];
$datacadastro = $linha[20];
$horacadastro = $linha[21];
$nfantasia2 = $linha[22];
$historico = $linha[23];
$categoria_conta = $linha[24];
$valor = $linha[25];
$num_sete_um = $linha[26];
$modo_pagto = $linha[27];
$num_cheque = $linha[28];
$banco = $linha[29];


$operador = $linha[1];
$cel_operador = $linha[2];
$email_operador = $linha[3];
$estabelecimento = $linha[4];
$cidade_estabelecimento = $linha[5];
$tel_estabelecimento = $linha[6];
$email_estabelecimento = $linha[7];

}
?>




<?
$sql = "SELECT * FROM cad_empresa limit 1";
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
$email_empresa = $linha[14];
$site = $linha[15];

}
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_empresa;
	
	//PREPARA O PEDIDO
	$mens   =  "Olá Alessandra! Foi registrado uma entrada no caixa da $nfantasia   \n";
	$mens  .=  "Verifique abaixo \n\n";
	
	$mens  .=  "Código do Aluno : ".$codigo_aluno."                                                    \n";
	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "Nome do Responsável: ".$nome_resp."                                                       \n";
	$mens  .=  "Curso : ".$curso."                                                    \n";
	$mens  .=  "Duração : ".$duracao."                                                    \n";
	$mens  .=  "Mensalide : R$ ".$mensalidade."                                                    \n";
	$mens  .=  "Vencimento: ".$vencto."                                                    \n";
	$mens  .=  "Valor Recebido: ".$valor_recebido."                                                    \n";
	$mens  .=  "Quitação : ".$quitacao."                                                    \n";
	$mens  .=  "Observações: ".$obs."                                                       \n";
	$mens  .=  "Data do registro: ".$datacadastro."                                                       \n";
	$mens  .=  "hora do registro: ".$horacadastro."                                                       \n";
	
	$mens  .=  "Operador que efetuou o cadastro: ".$operador."                                                    \n";
	$mens  .=  "Celular: ".$cel_operador."                                                    \n";
	$mens  .=  "E-Mail: ".$email_operador."                                                    \n";
	$mens  .=  "Estabelecimento: ".$estabelecimento."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Entrada no caixa da $nfantasia em ".$datacadastro, $mens,"From:".$email_dest."\r\nBcc:".$email);

?>
<table width="100%"  border="0">
  <tr>
    <td width="18%"><form name="form1" method="post" action="receber.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit2" value="Voltar">
    </form></td>
    <td width="2%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="34%">&nbsp;</td>
  </tr>
</table>
<p></p>
<table width="100%" border="2">
  <tr>
    <td width="25%"><div align="center"><span class="style1">RECIBO</span></div></td>
    <td width="22%"><div align="center"><span class="style1">N&ordm; <? echo $codigo; ?></span></div></td>
    <td width="21%"><div align="center" class="style4"><strong>VALOR</strong></div></td>
    <td width="32%"><div align="center" class="style4"><? echo "R$ ".$valor; ?></div></td>
  </tr>
  <tr>
    <td><span class="style4">Data do lan&ccedil;amento </span></td>
    <td><span class="style9"><? echo $datacadastro; ?></span></td>
    <td><span class="style4">Hora do lan&ccedil;amento </span></td>
    <td><span class="style9"><? echo $horacadastro; ?></span></td>
  </tr>
  <tr>
    <td><span class="style5"><strong>Loja</strong></span></td>
    <td><span class="style9"><? echo $nfantasia2; ?></span></td>
    <td><span class="style5"><strong>Categoria da conta </strong></span></td>
    <td><span class="style9"><? echo $categoria_conta; ?></span></td>
  </tr>
  <tr>
    <td colspan="4"><div align="center">
      <table width="100%" border="2">
        <tr>
          <td><div align="center">
            <table width="100%"  border="0">
              <tr>
                <td width="100%" colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4" bgcolor="#CCCCCC"><div align="center"><span class="style4"><strong>Recebi (emos) de <? echo $cliente; ?></strong></span></div></td>
              </tr>
              <tr>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="4" bgcolor="#CCCCCC"><div align="center"><span class="style4"><strong>a quantia de
                  <? 
//inicio valor por extenso

if($valor<>""){

function extenso($valor = 0, $maiusculas = false) {

$singular = array("centavo", "real", "mil", "milh&atilde;o", "bilh&atilde;o", "trilh&atilde;o", "quatrilh&atilde;o");
$plural = array("centavos", "reais", "mil", "milh&otilde;es", "bilh&otilde;es", "trilh&otilde;es",
"quatrilh&otilde;es");

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

$valor = number_format($valor, 2, ".", ".");
$inteiro = explode(".", $valor);
for($i=0;$i<count($inteiro);$i++)
for($ii=strlen($inteiro[$i]);$ii<3;$ii++)
$inteiro[$i] = "0".$inteiro[$i];

$fim = count($inteiro) - ($inteiro[count($inteiro)-1] > 0 ? 1 : 2);
for ($i=0;$i<count($inteiro);$i++) {
$valor = $inteiro[$i];
$rc = (($valor > 100) && ($valor < 200)) ? "cento" : $c[$valor[0]];
$rd = ($valor[1] < 2) ? "" : $d[$valor[1]];
$ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : "";

$r = $rc.(($rc && ($rd || $ru)) ? " e " : "").$rd.(($rd &&
$ru) ? " e " : "").$ru;
$t = count($inteiro)-1-$i;
$r .= $r ? " ".($valor > 1 ? $plural[$t] : $singular[$t]) : "";
if ($valor == "000")$z++; elseif ($z > 0) $z--;
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

$valor = $valor;
$dim = extenso($valor);
$dim = ereg_replace(" E "," e ",ucwords($dim));

$valor = number_format($valor, 2, ",", ".");

echo "$dim";

}
//fim valor por extenso


 ?>
                </strong></span></div></td>
              </tr>
              <tr>
                <td colspan="4"><div align="center"></div></td>
              </tr>
              <tr>
                <td colspan="4" bgcolor="#CCCCCC"><div align="center" class="style4">Correspondente a <? echo $historico; ?></div></td>
              </tr>
              <tr>
                <td colspan="4"><div align="center"></div></td>
              </tr>
              <tr>
                <td colspan="4"><div align="center" class="style4">e por ser express&atilde;o da verdade firmo (amos) o presente.</div></td>
              </tr>
              <tr>
                <td colspan="4"><div align="center"></div></td>
              </tr>
              <tr>
                <td colspan="4"><div align="center" class="style4">Franca - SP,
                  <? setlocale(LC_TIME, 'pt_BR');

$data_completa = strftime("%A, %d de %B de %Y<br><br>");

$hoje = strftime("%A");

echo $data_completa;

  ?>
                </div></td>
              </tr>
              <tr>
                <td colspan="4"><div align="center"><span class="style10"></span><span class="style10"></span></div></td>
              </tr>
              <tr>
                <td colspan="4"><div align="center"><span class="style10"></span><strong><font color="#000000">Assinatura : </font></strong>_______________________________________</div></td>
              </tr>
              <tr>
                <td colspan="4"><div align="center" class="style4"><strong><font color="#0000FF"><? echo $razaosocial; ?></font></strong> CNPJ: <strong><font color="#0000FF"><? echo $cnpj; ?></font></strong></div></td>
              </tr>
            </table>
          </div></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>