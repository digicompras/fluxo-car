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
<title>Informa&ccedil;&otilde;es pr&eacute;vias para preenchimento de proposta!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<p><?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';

$cpf = $_POST['cpf'];
$tipo = $_POST['tipo'];
$estabelecimento_proposta = $_POST['estabelecimento_proposta'];
$bloqueio_compra = $_POST['bloqueio_compra'];


$bloqueio_compra_recebe = $_GET['bloqueio_compra'];
$bloqueio_compra2 = $bloqueio_compra_recebe;

if(empty($bloqueio_compra)){
$bloqueio_de_compra = $bloqueio_compra2;
}
else{
$bloqueio_de_compra = $bloqueio_compra;
}


$cpf_recebe = $_GET['cpf'];
$cpf2 = $cpf_recebe;

$tipo_recebe = $_GET['tipo'];
$tipo2 = $tipo_recebe;

$estabelecimento_proposta_recebe = $_GET['estabelecimento_proposta'];
$estabelecimento_proposta2 = $estabelecimento_proposta_recebe;

$tipo_proposta_recebe = $_GET['tipo_proposta'];
$tipo_proposta2 = $tipo_proposta_recebe;


$tipo_contrato_recebe = $_GET['tipo_contrato'];
$tipo_contrato2 = $tipo_contrato_recebe;


$tabela_recebe = $_GET['tabela'];
$tabela2 = $tabela_recebe;





error_reporting(E_ALL);

?>
      <? 

$sql = "SELECT * FROM termo_de_responsabilidade limit 1";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$termo = $linha[1];

}


 ?>


</p>
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar">
</form>
<p>&nbsp;</p>
<form action="efetuar_proposta.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
    <tr>
      <td>&nbsp;</td>
      <td><input name="bloqueio_compra" type="hidden" id="bloqueio_compra" value="<? echo $bloqueio_de_compra; ?>" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Qual o perfil do cliente? </td>
      <td><? if(empty($tipo)){ echo $tipo2;} else{ echo $tipo; } ?>
      <input name="tipo" type="hidden" id="tipo" value="<? if(empty($tipo)){ echo $tipo2;} else{ echo $tipo; } ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Informe o estabelecimento dessa proposta </td>
      <td><? if(empty($estabelecimento_proposta)){ echo $estabelecimento_proposta2;} else{ echo $estabelecimento_proposta; } ?>
      <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? if(empty($estabelecimento_proposta)){ echo $estabelecimento_proposta2;} else{ echo $estabelecimento_proposta; } ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="33%">Informe o CPF do cliente a ser alterado <br></td>
      <td width="35%"><? if(empty($cpf)){ echo $cpf2;} else{ echo $cpf; } ?>
      <input name="cpf" type="hidden" id="cpf" value="<? if(empty($cpf)){ echo $cpf2;} else{ echo $cpf; } ?>"></td>
    <td width="32%">&nbsp;        </td></tr>
    <tr>
      <td>Informe o tipo de proposta a ser realizada </td>
      <td><select name="tipo_proposta" id="tipo_proposta">
        <option selected><? if(empty($tipo_proposta)){ echo $tipo_proposta2;} else{ echo $tipo_proposta; } ?></option>
        <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipos_propostas where tipo_proposta <> 'COMPRAS' and setor = 'CONSIGNADO' order by tipo_proposta asc";
}
else{
$sql = "select * from tipos_propostas where setor = 'CONSIGNADO' order by tipo_proposta asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_proposta']."</option>";
    }
?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Informe o tipo de contrato a ser realizado</td>
      <td><select name="tipo_contrato" id="tipo_contrato">
        <option selected><? if(empty($tipo_contrato)){ echo $tipo_contrato2;} else{ echo $tipo_contrato; } ?></option>
        <?

if($bloqueio_de_compra=="Sim"){
$sql = "select * from tipo_contrato where tipo_contrato <> 'COMPRA' order by tipo_contrato asc";
}
else{
$sql = "select * from tipo_contrato order by tipo_contrato asc";
}
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_contrato']."</option>";
    }
?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Informe a tabela que est&aacute; utilizando </td>
      <td><select name="tabela" id="tabela">
        <option selected><? if(empty($tabela)){ echo $tabela2;} else{ echo $tabela; } ?></option>
        <?


    $sql = "select * from tabelas order by tabela asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tabela']."</option>";
    }
?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Termo de Responsabilidade (Assinatura eletr&ocirc;nica)</strong></td>
      <td></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><div align="center"><strong>
        <?

echo $termo;
?>
      </strong></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><strong>
        <input name="termo_de_responsabilidade" type="radio" id="radio" value="Estou ciente e de Acordo!">
      Estou ciente e de Acordo!</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input name="valor_liberado" type="hidden" id="valor_liberado" value="<? echo 0.00; ?>">
      <input name="bco_operacao" type="hidden" id="bco_operacao" value="<? echo "Será informado posteriormente"; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit" value="Efetuar Proposta"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<p>&nbsp;</p>
</body>
</html>
