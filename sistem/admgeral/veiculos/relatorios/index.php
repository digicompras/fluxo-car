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

<title>Ralat&oacute;rios de Ve&iacute;culos</title>

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

require '../../../conect/conect.php';

error_reporting(E_ALL);



?>



</p>

<form name="form1" method="post" action="../index.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
  <input type="submit" name="Submit2" value="Voltar">
</form>

<p align="center">Mapa geral de todas as lojas</p>
<form action="mapa_de_todas_lojas_sintetico.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%"  border="0">

    <tr>

      <td width="32%">M&ecirc;s e Ano</td>

      <td width="16%"><select name="mes_ano" id="select">
        <?


    $sql = "select * from propostas_veiculos group by mes_ano order by mes_ano desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['mes_ano']."</option>";
    }
?>
      </select>
        mm-aaaa</td>

      <td width="52%"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
    <input type="submit" name="Submit3" value="Gerar Mapa de todas as Ag&ecirc;ncias"></td></tr>
  </table>

</form>
<p align="center">&nbsp;</p>
<p align="center">Gerar relat&oacute;rios de propostas de ve&iacute;culos</p>
<form action="relatorio_de_producao_mensal_por_loja.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%"  border="0">

    <tr>
      <td>Por Loja</td>
      <td><strong><font color="#0000FF">
        <select name="estabelecimento_proposta" id="select11">
          <option selected>Selecione a loja</option>
          <?





    $sql = "select * from estabelecimentos where status = 'Ativo' order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
        </select>
      </font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td width="35%">M&ecirc;s e Ano</td>

      <td width="10%"><select name="mes_ano" id="mes_ano">
        <?


    $sql = "select * from propostas_veiculos group by mes_ano order by mes_ano desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['mes_ano']."</option>";
    }
?>
            </select></td>

      <td width="55%">&nbsp;</td></tr>
    <tr>
      <td>Status</td>
      <td><strong>
        <select name="status" id="status">
          <option>Aprovado</option>
          <option>Em Analise</option>
          <option>Em Andamento</option>
          <option>Em Andamento - Analise </option>
          <option>N&atilde;o Cadastrada</option>
          <option>Reprovado</option>
          <option>Re-Analise</option>
        </select>
      </strong></td>
      <td><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit" value="Gerar Relat&oacute;rio"></td>
    </tr>
  </table>

</form>

<p>&nbsp;</p>

<table width="100%" border="0">
  <tr>
    <td width="53%"><form name="form12" method="post" action="../status_proposta.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      Proposta
  <input name="num_proposta" type="text" id="num_proposta3" size="11">
      comiss&atilde;o
  <input name="percentual" type="text" id="percentual3" size="4" maxlength="4">
      % Comiss&atilde;o op
  <input name="percentual_op" type="text" id="percentual_op3" size="4" maxlength="4">
  <input type="submit" name="Submit15" value="Status">
    </form></td>
    <td width="21%">&nbsp;</td>
    <td width="26%">&nbsp;</td>
  </tr>
  <tr>
    <td><form name="form12" method="post" action="../status_pagto_cliente.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      Proposta
  <input name="num_proposta" type="text" id="num_proposta" size="11">
  <input type="submit" name="Submit152" value="Pgto ao Cliente (Status)">
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form name="form15" method="post" action="relatorio_de_pagtos_ao_cliente_administracao.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      Informe a data dd-mm-aaaa
  <input name="data_pagto_cliente" type="text" id="data_pagto_cliente" size="10" maxlength="10">
  <input type="submit" name="Submit1632" value="VEICULOS - Relat&oacute;rio de Pagtos ao cliente(Administra&ccedil;&atilde;o)">
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>

</body>

</html>

