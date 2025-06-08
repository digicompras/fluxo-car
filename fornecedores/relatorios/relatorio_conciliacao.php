<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");



?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style3 {color: #0000FF; font-weight: bold; }
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}

-->

</style>

</head>

<?



require '../../conect/conect.php';

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}

$senha = $_SESSION['senha'];
$data_hoje = $_SESSION['data_hoje'];
	
$solicitacao = $_POST['solicitacao'];
$cod_conciliacao = $_POST['cod_conciliacao'];


$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];



}

?>

<body bgcolor="#<? echo $cor; ?>"> 



<?



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
	
$sql = "SELECT * FROM conciliacao where codigo = '$cod_conciliacao' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_conciliacao = $linha[0];
	$dataabertura = $linha[1];
	$horaabertura = $linha[2];
	$datafechamento = $linha[3];
	$horafechamento = $linha[4];
	$status = $linha[5];
	$operador_contas = $linha[6];
	$estab_pertence = $linha[7];
	$saldoanterior = $linha[10];
	$cidadeatuacao = $linha[11];
	$statusenvio = $linha[12];
	
	
}
	
	?>
	<?																			  
$sql = "select sum(valordespesa) as total_despesa from conciliacao_comprovantes where cod_conciliacao = '$cod_conciliacao'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_despesa = $linha['total_despesa'];
		  
$saldo = bcadd($total_despesa,0,2);
	
	?>

<table width="80%" border="2" align="center">
  <tbody>
    <tr>
      <td width="15%" align="center">Num. Concilia&ccedil;&atilde;o</td>
      <td width="9%" align="center">Data Abertura</td>
      <td width="16%" align="center">Hora Abertura</td>
      <td width="13%" align="center">Data Fechamento</td>
      <td width="14%" align="center">Hora Fechamento</td>
      <td width="16%" align="center">Status</td>
      <td width="16%" align="center">Status de Envio</td>
    </tr>
    <tr>
      <td align="center"><? echo "$cod_conciliacao"; ?></td>
      <td align="center"><? echo "$dataabertura"; ?></td>
      <td align="center"><? echo "$horaabertura"; ?></td>
      <td align="center"><? echo "$datafechamento"; ?></td>
      <td align="center"><? echo "$horafechamento"; ?></td>
      <td align="center"><? echo "$status"; ?></td>
      <td align="center"><? echo "$statusenvio"; ?></td>
    </tr>
    <tr>
      <td colspan="7" valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="12%" >Data</td>
          <td width="18%" >Fornecedor</td>
          <td width="20%" >Descri&ccedil;&atilde;o</td>
          <td width="12%" >Veiculo</td>
          <td width="12%" >Placa</td>
          <td width="12%" >KM</td>
          <td width="12%" >HOR</td>
          <td width="12%" >Valor</td>
          <td width="12%" >Categoria</td>
          <td width="16%" >Modo Pagto</td>
          <td width="10%" >NF</td>
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
          <td ><? echo "$fornecedordespesa"; ?></td>
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
      </table></td>
    </tr>
	  
    <tr>
        <td colspan="7" align="center"><table width="100%" border="2">
          <tbody>
            <tr>
              <td align="center">Total
              <?


echo "Total<br> R$ $total_despesa";

?></td>
            </tr>
          </tbody>
        </table></td>
    </tr>
	  <?
$sql = "SELECT * FROM conciliacao_comprovantes where cod_conciliacao = '$cod_conciliacao' order by datadespesa desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$comprovantedespesa = $linha[9];
	?>
    <tr>
      <td colspan="7" align="center">
<? echo "<img src='$comprovantedespesa'><br>"; ?>
		</td>
    </tr>
	  <? } ?>
  </tbody>
</table>

<div align="center"></div>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>