
<html>
<head>
<title>COMERCIAL MEC&Acirc;NICA AUTOMOTIVA (16) 3725 - 6924</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {font-size: 12px}
.style3 {font-size: 14px}
-->
</style>
</head>

<?
//require("conexao.php"); or die("erro na requisição");
require '../../conect/conect.php';
?>
<?


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

printf("<img src='../../imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'><br><br>"); ?>
<?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
<? } ?>



<?
//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 
$sql = "SELECT * FROM fundo_navegacao";
//EXECUTA O COMANDO ACIMA
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$reg++;
?>


<body bgcolor="#<? printf("ffffff"); ?>">
  <?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>
  
<? } ?>

<?
// dados do estabelecimento

$cnpj = $_POST['cnpj'];


$sql = "SELECT * FROM estabelecimentos where cnpj = '$cnpj' limit 1";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

//dados do aluno
$codigo_concessionaria = $linha[0];
$razaosocial_concessionaria = $linha[1];
$nfantasia_concessionaria = $linha[2];
$cnpj_concessionaria = $linha[3];
$inscr_est_concessionaria = $linha[4];
$endereco_concessionaria = $linha[5];
$numero_concessionaria = $linha[6];
$bairro_concessionaria = $linha[7];
$complemento_concessionaria = $linha[8];
$cep_concessionaria = $linha[9];
$cidade_concessionaria = $linha[10];
$estado_concessionaria = $linha[11];
$telefone_concessionaria = $linha[12];
$fax_concessionaria = $linha[13];
$email_concessionaria = $linha[14];
$site_concessionaria = $linha[15];
$proprietario_concessionaria = $linha[16];
$cpf_concessionaria = $linha[17];
$rg_concessionaria = $linha[18];
$operador_concessionaria = $linha[24];
$cel_operador_concessionaria = $linha[25];
$email_operador_concessionaria = $linha[26];
$estabelecimento_concessionaria = $linha[27];
$cidade_estabelecimento_concessionaria = $linha[28];
$tel_estabelecimento_concessionaria = $linha[29];
$email_estabelecimento_concessionaria = $linha[30];
$obs_concessionaria = $linha[19];
$datacadastro_concessionaria = $linha[20];
$horacadastro_concessionaria = $linha[21];
$dataalteracao_concessionaria = $linha[22];
$horaalteracao_concessionaria = $linha[23];
$operador_alterou_concessionaria = $linha[31];
$cel_operador_alterou_concessionaria = $linha[32];
$email_operador_alterou_concessionaria = $linha[33];
$estabelecimento_alterou_concessionaria = $linha[34];
$cidade_estabelecimento_alterou_concessionaria = $linha[35];
$tel_estabelecimento_alterou_concessionaria = $linha[36];
$email_estabelecimento_alterou_concessionaria = $linha[37];
$status_concessionaria = $linha[41];
$valor = $linha[42];

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

	

<table width="100%"  border="0">
  <tr>
    <td width="38%">&nbsp;</td>
    <td width="35%"><form name="form1" method="post" action="javascript:window.close()">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit" value="Fechar">
    </form></td>
    <td width="27%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>CONTRATO DE GARANTIA MEC&Acirc;NICA MOTOR E C&Acirc;MBIO </strong></div></td>
  </tr>
  <tr>
    <td>1 - &nbsp; DAS PARTES </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><p>      1.1 <br>
    A contratada <? echo $razaosocial; ?>, CNPJ <? echo $cnpj; ?>, Inscr. Est. : <? echo $inscr_est; ?><br>
    <br> localizada no endere&ccedil;o <? echo $endereco; ?>  n&ordm; <? echo $numero; ?>, bairro <? echo $bairro; ?>, em <? echo $cidade; ?> estado 
    de <? echo $estado; ?>, doravante chamada pelo nome fantasia <? echo $nfantasia; ?>.</td>
  </tr>
  <tr>
    <td>1.2</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">O(a) contratante <strong><? echo $razaosocial_concessionaria; ?></strong>, CNPJ <strong> <? echo $cnpj_concessionaria; ?> </strong>e INSCR. EST.<strong> <? echo $inscr_est_concessionaria; ?></strong>, situado(a) &agrave; rua/av<strong> 
          <? echo $endereco_concessionaria; ?></strong>,<br>
    n&uacute;mero <strong><? echo $numero_concessionaria; ?></strong>, complemento <strong><? echo $complemento_concessionaria; ?> </strong>bairro<strong> <? echo $bairro_concessionaria; ?> </strong> CEP <strong><? echo $cep_concessionaria; ?></strong>, na cidade <strong><? echo $cidade_concessionaria; ?> </strong>estado de <strong><? echo $estado_concessionaria; ?></strong>, devidamente identificado pelo seu nome de contratante. </td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>OBJETO DO CONTRATO </strong></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><p>Pelo presente contrato, a <strong>CONTRATADA</strong> garante ao <strong>CONTRATANTE</strong> a ret&iacute;fica do motor e C&acirc;mbio do ve&iacute;culo constante na ficha Cadastral constante neste <strong></strong></p>    </td>
  </tr>
  <tr>
    <td colspan="3">contrato.</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>CL&Aacute;USULA PRIMEIRA - RISCOS COBERTOS</strong></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">Para fins deste contrato, consideram-se riscos cobertos, quando o motor e\ou C&acirc;mbio do ve&iacute;culo do <strong>CONTRATANTE</strong> ser considerado fundido e\ou travado,</td>
  </tr>
  <tr>
    <td colspan="3">sem condi&ccedil;&otilde;es de funcionamento e\ou locomo&ccedil;&atilde;o. </td>
  </tr>
  <tr>
    <td colspan="3">A <strong>CONTRATADA</strong> n&atilde;o garantir&aacute; danos parciais no motor ou c&acirc;mbio, como tamb&eacute;m penes el&eacute;tricas e\ou eletr&ocirc;nicos, ficando por conta do CONTRATANTE o </td>
  </tr>
  <tr>
    <td colspan="3">&ocirc;nus para o devido conserto. </td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>CL&Atilde;USULA SEGUNDA - OBRIGA&Ccedil;&Otilde;ES DA CONTRATADA </strong></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">A <strong>CONTRATADA </strong>se obriga, quando solicitado pelo <strong>CONTRATANTE</strong>, a partir do comunicado &agrave; <strong>CONTRATADA </strong>providenciar imediatamente a locomo&ccedil;&atilde;o <strong></strong></td>
  </tr>
  <tr>
    <td colspan="3">do ve&iacute;culo por guincho a uma Concession&aacute;ria e\ou Oficina cred&ecirc;nciada ou na Concession&aacute;ria que o <strong>CONTRATANTE</strong> adquiriu o ve&iacute;culo para o devido reparo. </td>
  </tr>
  <tr>
    <td colspan="3">Acompanhar o ve&iacute;culo para reparo garantindo assim, a rapidez e qualidade no servi&ccedil;o executado. </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">
      <p align="center"><strong>CL&Aacute;USULA TERCEIRA - OBRIGA&Ccedil;&Otilde;ES DA CONTRATANTE </strong></p>
    </div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><p>Informar a <strong>CONTRATADA</strong> qualquer mudan&ccedil;a ocorrida no ve&iacute;culo ou mesmo a mudan&ccedil;a de ve&iacute;culo; </p></td>
  </tr>
  <tr>
    <td colspan="3">Permitir a inspe&ccedil;ao de nosso funcion&aacute;rio no ve&iacute;culo objeto deste contrato;</td>
  </tr>
  <tr>
    <td colspan="3">Efetuar rigorosamente em dia o pagamento das parcelas constante na ficha cadastral.;</td>
  </tr>
  <tr>
    <td colspan="3">Mec&acirc;nica ( de Motor e C&acirc;mbio );e;</td>
  </tr>
  <tr>
    <td colspan="3">Apresentar check list executado pela concession&aacute;ria.</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><p align="center"><strong>CL&Aacute;USULA QUARTA - DATA DE FABRICA&Ccedil;&Atilde;O DO VE&Iacute;CULO </strong></p></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><p class="style3">A Contratado aceitar&aacute; somente ve&iacute;culos com data de Fabrica&ccedil;&atilde;o inferior &agrave; 7 (sete) anos</p>    </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>CL&Aacute;USULA QUINTA - DO TIPO E MODELO DE VE&Iacute;CULO </strong></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">N&atilde;o poder&aacute; ser cadastrado no sistema ve&iacute;culos dos tipos Utilit&aacute;rios, Frota de Empresa e Ve&iacute;culos Pesados ( Caminh&otilde;es e &Ocirc;nibus). </td>
  </tr>
  <tr>
    <td colspan="3"><p class="style2"><br>
    </td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>CL&Aacute;USULA SEXTA - DO GUINCHO </strong></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">A <strong>CONTRATADA</strong> se obriga a fornecer ao <strong>CONTRATANTE</strong> telefone de acesso ao servi&ccedil;o de guincho plataforma para locomo&ccedil;&atilde;o do ve&iacute;culo em caso de </td>
  </tr>
  <tr>
    <td colspan="3">paraliza&ccedil;&atilde;o do mesmo. </td>
  </tr>
  <tr>
    <td colspan="3" class="style3"> O guincho s&oacute; ser&aacute; pago pela <strong>CONTRATADA</strong> caso o reparo esteja previsto pelo contrato, ou seja, caso o motor do ve&iacute;culo esteja fundido e\ou o c&acirc;mbio do ve&iacute;culo esteja </td>
  </tr>
  <tr>
    <td colspan="3">travado. Se o servi&ccedil;o a ser executado n&atilde;o constar neste contrato o guincho ser&aacute; cobrado do <strong>CONTRATANTE.</strong> </td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">
      <p align="left">O servi&ccedil;o de guincho n&atilde;o cobre fora do Estado de S&atilde;o Paulo. Cobrindo somente a cidade de S&atilde;o Paulo, grande S&atilde;o Paulo e interior. Caso o servi&ccedil;o seja </p>
      </div></td>
  </tr>
  <tr>
    <td colspan="3">solicitado, fora da &aacute;rea de cobertura prevista em Contrato, o<strong> CONTRATANTE</strong> ter&aacute; que consultar a <strong>CONTRATADA</strong> como proceder para locomo&ccedil;&atilde;o do </td>
  </tr>
  <tr>
    <td colspan="3"><div align="left">ve&iacute;culo.</div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>CL&Aacute;USULA S&Eacute;TIMA - TIPO DE COMBUST&Iacute;VEL </strong></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&Eacute; Con siderado original de f&aacute;brica o que consta no Documento ( DUT ) do ve&iacute;culo. </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>CL&Aacute;USULA OITAVA - DURA&Ccedil;&Atilde;O DO CONTRATO E A RESCIS&Atilde;O DO CONTRATO </strong></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">A dura&ccedil;&atilde;o deste contrato ser&aacute; de ( ____ ) meses, podendo ser rescindido a qualquer momento, desde que o <strong>CONTRATANTE</strong> comunique a <strong>CONTRATADA</strong></td>
  </tr>
  <tr>
    <td colspan="3">com 30 (Trinta) dias de anteced&ecirc;ncia. </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><strong>CL&Aacute;USULA NONA - PRE&Ccedil;O </strong></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">O valor acertado entre as partes &eacute; <? echo "R$ ".$valor; ?></td>
  </tr>
  <tr>
    <td colspan="3">E assim por estarem justos e contratados, elegem o foro da comarca de Franca - SP, como &uacute;nico competente para dirimir quaisquer d&uacute;vidas e quest&otilde;es oriundas </td>
  </tr>
  <tr>
    <td colspan="3">do presente Contrato, com ren&uacute;ncia expressa de qualquer outro por mais previlegiado que seja, e firmam o presente contrato em 02 (duas) vias de igual teor na </td>
  </tr>
  <tr>
    <td colspan="3">presen&ccedil;a de 02 ( duas) testemunhas, e em consequ&ecirc;ncia toda comunica&ccedil;&atilde;o dirigida aos signat&aacute;rios deste ser&aacute; dada como recebida. </td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"> <div align="center">CONTRATANTE<strong> COMMEC - COMERCIAL MEC&Acirc;NICA AUTOMOTIVA LTDA</strong> </div></td>
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
</table>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>