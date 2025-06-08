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
include '../../css_menus/modal.css';
include '../../css_menus/modal2.css';

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}

$solicitacao = $_POST['solicitacao'];
?>
<?
$senha = $_SESSION['senha'];
	
$sql50 = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res50 = mysql_query($sql50);
while($linha=mysql_fetch_row($res50)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[15];
	
$funcao = $linha[43];
$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$obra_operador = $linha[50];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];

$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$fornecedores = $linha[66];
$controlekm_autorizado = $linha[75];
$orcamento_autorizado = $linha[76];
$permissao_categoria_de_produtos_autorizado = $linha[77];
	
$recebenotificacao = $linha[49];
	$iniciar_rdo_diferenciado = $linha[51];
	$estoque = $linha[54];
	$conciliacoes = $linha[55];
	//$despesas = $linha[56];
	//$veiculos = $linha[57];
	//$rdo = $linha[58];
	$rdo_autorizado = $linha[58];
	$avisodepecas = $linha[59];
	$administracartaoponto = $linha[61];
	$relatoriodepecasutilizadas = $linha[65];
	$fornecedores = $linha[66];
	$inventario = $linha[67];
	$estoque_entradas = $linha[68];
	$cadastro_de_itens = $linha[69];
	$alimentacao_rdo = $linha[70];
	$estoque_entradas_por_xml_autorizado = $linha[71];
	$veiculodaempresa = $linha[72];
	$controlekm = $linha[75];
	$orcamento = $linha[76];
	$permissao_categoria_de_produtos = $linha[77];
	$inclui_mais_uma_nf = $linha[78];
	$financeiro = $linha[79];
	$relatoriodecomissao = $linha[80];
	$registrodeoperadores = $linha[81];
	$abrir_e_fechar_cx = $linha[82];
	$editar_produtos = $linha[83];
	$quantitativo_do_item_no_estoque = $linha[84];
	$categoria_despesas = $linha[85];
	
}	
?>
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
<form name="form1" method="post" action="../index.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input class="class01" type="submit" name="Submit3" value="Voltar">
</form>
<form action="index.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="87%">        

</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF" size="4">
        <?		  
		  
if($solicitacao=="gravaeditar"){

$codigoeditar = $_POST['codigoeditar'];
$aliquota = $_POST['aliquota'];

	
	
$comando = "update `$db`.`tabela_cartoes` set `aliquota` = '$aliquota' where `tabela_cartoes`. `codigo` = '$codigoeditar' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao gravar dados");
	

}
		  
		  ?>
        Cadastro e manuten&ccedil;&atilde;o das aliquotas dos cartoes
        <?

echo "$estab_pertence";

?>
      </font></strong></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="6"></td>
    </tr>
    <tr>
      <td align="left"><strong><font>Modo Pagto</font></strong></td>
      <td align="left"><strong>Vigencia</strong></td>
      <td width="14%" align="left"><strong>Parcelas</strong></td>
      <td width="7%" align="left"><strong>Aliquota</strong></td>
      <td width="7%" align="left"><strong>Status</strong></td>
      <td width="37%" align="center"><strong>#</strong></td>
    </tr>
	  
	  <?
$codigoeditar = $_POST['codigoeditar'];
	  if($solicitacao=="gravaeditar"){
		  unset($codigoeditar);
	  }
		  
		  
		  if(empty($codigoeditar)){
			  
			  $sql = "select * from tabela_cartoes where estab_pertence = '$estab_pertence' and status = 'Ativo'";
		  }
		  else{
			  echo "caindo aqui $codigoeditar";
			  $sql = "select * from tabela_cartoes where estab_pertence = '$estab_pertence' and codigo = '$codigoeditar' and status = 'Ativo'";
		  }
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_de_bancos = mysql_num_rows($res);
	
	$codigo = $linha[0];
	$status = $linha[1];
	$date = $linha[2];
	$dia = $linha[3];
	$mes = $linha[4];
	$ano = $linha[5];
	$modopagto = $linha[6];
	$prazoinicial = $linha[7];
	$prazfinal = $linha[8];
	$aliquota = $linha[9];
	$vigencia = $linha[10];
	  
	  ?>
	  
    <tr>
		<form action="index.php" method="post" enctype="multipart/form-data" name="form1">
      <td width="17%"><strong><font color="#0000FF">
		  <?  echo "$modopagto";  ?>
      </font></strong></td>
      <td width="18%"><? echo "$date até $vigencia"; ?></td>
      <td><? echo " De $prazoinicial até $prazfinal"; ?></td>
      <td><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ ?>
        <strong><font color="#0000FF">
        <input class="class02" name="aliquota" type="text" id="aliquota" value="<? echo "$aliquota"; ?>" size="5">
        </font></strong>        <? }else{ echo "$aliquota"; } ?></td>
      <td><? echo "$status"; ?></td>
      <td align="center"><?
	

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? if($solicitacao=="editar"){ echo "gravaeditar"; }else{ echo "editar"; } ?>">
        <input name="codigoeditar" type="hidden" id="codigoeditar" value="<? echo "$codigo"; ?>">

      <input class="class01" type="submit" name="Submit2" value="<? if($solicitacao=="editar"){ echo "Salvar"; }else{ echo "Editar"; } ?>"></td>
			</form>
		<? } ?>
    </tr>
	  
		  
    <tr>
      <td colspan="6">&nbsp;</td>
    </tr>
  </table>

<p>&nbsp;</p>
<p>&nbsp; </p>
</body>

</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>

