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
      <td colspan="5">        

</td>
    </tr>
    <tr>
      <td colspan="5"><strong><font color="#0000FF" size="4">
        <?
		  
		  if($solicitacao=="gravar"){
$banco = $_POST['banco'];
$agencia = $_POST['agencia'];
 $contacorrente = $_POST['contacorrente'];
 $tipoconta = $_POST['tipoconta'];
 $especie = $_POST['especie'];
 $status = "ativo";
			  
$sql = "select * from contas_bancarias where banco = '$banco' and agencia = '$agencia' and contacorrente = '$contacorrente' and tipoconta = '$tipoconta' and especie = '$especie' and estab_pertence = '$estab_pertence'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_de_bancos = mysql_num_rows($res);
	
}

if($registros_de_bancos>=1){
	echo "<script>

alert('Conta bancaria já consta cadastrada');

window.location = 'index.php';


</script>";
}
else{
	
	if((empty($banco)) or (empty($agencia))  or (empty($contacorrente)) or (empty($tipoconta)) or (empty($especie)) or (empty($status)) ){
		echo "<script>

alert('Todos os campos são obrigatorios e devem ser prenchidos!');

window.location = 'index.php';


</script>";
	}
	else{
			  
$comando = "insert into contas_bancarias(banco,agencia,contacorrente,tipoconta,especie,status,estab_pertence)
values('$banco','$agencia','$contacorrente','$tipoconta','$especie','$status','$estab_pertence')";

mysql_query($comando,$conexao) or die("Erro ao gravar banco");
		
	}
	
}
			  
		  }
		  
		  
if($solicitacao=="gravaeditar"){

$codigoeditar = $_POST['codigoeditar'];
$banco = $_POST['banco'];
$agencia = $_POST['agencia'];
 $contacorrente = $_POST['contacorrente'];
 $tipoconta = $_POST['tipoconta'];
 $especie = $_POST['especie'];
 $status = $_POST['status'];
	
	
$comando = "update `$db`.`contas_bancarias` set `banco` = '$banco',`agencia` = '$agencia',`contacorrente` = '$contacorrente',`tipoconta` = '$tipoconta',`especie` = '$especie',`status` = '$status' where `contas_bancarias`. `codigo` = '$codigoeditar' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao gravar dados");
	

}
		  
		  ?>
        Cadastro e manuten&ccedil;&atilde;o das contas bancarias 
        <?

echo "$estab_pertence";

?>
      </font></strong></td>
    </tr>
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
      <td><font color="#0000FF"><strong>Banco</strong></font></td>
      <td>Agencia</td>
      <td>Conta</td>
      <td width="13%">Tipo da Conta</td>
      <td width="25%">Especie</td>
    </tr>
    <tr> 
      <td width="26%"><strong><font color="#0000FF">
        <select class="class02" name="banco" id="select5">
          <option selected><? echo $banco_pagto; ?></option>
          <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
        </select>
      </font></strong></td>
      <td width="15%"><input class="class02" type="text" name="agencia" id="agencia"></td>
      <td width="21%"><input class="class02" type="text" name="contacorrente" id="contacorrente"></td>
      <td><strong><font color="#0000FF">
        <select class="class02" name="tipoconta" id="tipoconta">
          <option selected><? echo $ipoconta; ?></option>
          <option>CORRENTE</option>
          <option>POUPANCA</option>
        </select>
      </font></strong></td>
      <td><strong><font color="#0000FF">
        <select class="class02" name="especie" id="especie">
          <option selected><? echo $especie; ?></option>
          <option>PJ</option>
          <option>PF</option>
        </select>
      </font></strong></td>
    </tr>
    <tr> 
      <td colspan="5" align="center"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="solicitacao" type="hidden" id="solicitacao" value="gravar">        <input class="class01" type="submit" name="Submit" value="Salvar"></td>
    </tr>
    <tr> 
      <td colspan="5">&nbsp;</td>
    </tr>
  </table>
</form>

  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="7"></td>
    </tr>
    <tr>
      <td align="left"><strong><font>Banco</font></strong></td>
      <td align="left"><strong>Agencia</strong></td>
      <td align="left"><strong>Conta</strong></td>
      <td width="12%" align="left"><strong>Tipo da Conta</strong></td>
      <td width="5%" align="left"><strong>Especie</strong></td>
      <td width="5%" align="left"><strong>Status</strong></td>
      <td width="35%" align="center"><strong>#</strong></td>
    </tr>
	  
	  <?
$codigoeditar = $_POST['codigoeditar'];
	  if($solicitacao=="gravaeditar"){
		  unset($codigoeditar);
	  }
		  
		  
		  if(empty($codigoeditar)){
			  
			  $sql = "select * from contas_bancarias where estab_pertence = '$estab_pertence'";
		  }
		  else{
			  echo "caindo aqui $codigoeditar";
			  $sql = "select * from contas_bancarias where codigo = '$codigoeditar' and estab_pertence = '$estab_pertence'";
		  }
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_de_bancos = mysql_num_rows($res);
	
	$codigo = $linha[0];
	$banco = $linha[1];
	$agencia = $linha[2];
	$contacorrente = $linha[3];
	$tipoconta = $linha[4];
	$especie = $linha[5];
	$status = $linha[6];

	  
	  ?>
	  
    <tr>
		<form action="index.php" method="post" enctype="multipart/form-data" name="form1">
      <td width="26%"><strong><font color="#0000FF">
		  <? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ ?>
        <select class="class02" name="banco" id="banco">
          <option selected><? echo $banco; ?></option>
          <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
        </select>
		  <? }else{ echo "$banco"; } ?>
      </font></strong></td>
      <td width="5%"><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ ?><input name="agencia" type="text" class="class02" id="agencia" value="<? echo $agencia; ?>" size="10"><? }else{ echo "$agencia"; } ?></td>
      <td width="12%"><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ ?><input name="contacorrente" type="text" class="class02" id="contacorrente" value="<? echo $contacorrente; ?>"><? }else{ echo "$contacorrente"; } ?></td>
      <td><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ ?>
        <strong><font color="#0000FF">
        <select class="class02" name="tipoconta" id="tipoconta">
          <option selected><? echo $tipoconta; ?></option>
          <option>CORRENTE</option>
          <option>POUPANCA</option>
        </select>
        </font></strong><? }else{ echo "$tipoconta"; } ?></td>
      <td><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ ?>
        <strong><font color="#0000FF">
        <select class="class02" name="especie" id="especie">
          <option selected><? echo $especie; ?></option>
          <option>PJ</option>
          <option>PF</option>
        </select>
        </font></strong>        <? }else{ echo "$especie"; } ?></td>
      <td><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ ?>
        <strong><font color="#0000FF">
        <select class="class02" name="status" id="status">
          <option selected><? echo $status; ?></option>
          <?


    $sql = "select * from status order by status asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['status']."</option>";
    }
?>
        </select>
        <? }else{ echo "$status"; } ?>
      </font></strong></td>
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
      <td colspan="7">&nbsp;</td>
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

