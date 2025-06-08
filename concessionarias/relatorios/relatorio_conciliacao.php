<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");
ini_set('default_charset','UTF8_general_mysql500_ci');

require '../../conect/conect.php';

$solicitacao = $_POST['solicitacao'];
$cod_conciliacao = $_POST['cod_conciliacao'];
?>
<?
	
$sql = "SELECT * FROM conciliacao_comprovantes where cod_conciliacao = '$cod_conciliacao' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

	$datadespesa = $linha[2];	
	$fornecedordespesa = $linha[3];
	
}

$data2 = explode("-", $datadespesa);

$anorelatorio = $data2[0];

$mesrelatorio = $data2[1];

$diarelatorio = $data2[2];

$sql = "SELECT * FROM fornecedores where nfantasia = '$fornecedordespesa' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

	$cidadefornecedor = $linha[10];
	$estadofornecedor = $linha[11];
	
}

?>

<html>

<head>

<title><? echo "$fornecedordespesa-$cidadefornecedor-$estadofornecedor-mes-$mesrelatorio-de-$anorelatorio-Relatorio-de-conciliacao"; ?></title>

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





$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}

$senha = $_SESSION['senha'];
$data_hoje = $_SESSION['data_hoje'];
	



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
	$fornecedor = $linha[14];
	
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
      <td colspan="7" align="center"><? echo "$fornecedordespesa - $cidadefornecedor - $estadofornecedor - mês $mesrelatorio de $anorelatorio - Relatório de conciliação"; ?></td>
    </tr>
    <tr>
      <td width="15%" align="center">Num. Concilia&ccedil;&atilde;o</td>
      <td width="9%" align="center">Data Abertura</td>
      <td width="16%" align="center">Hora Abertura</td>
      <td width="13%" align="center">Data Fechamento</td>
      <td width="14%" align="center">Hora Fechamento</td>
      <td width="16%" align="center">Status</td>
      <td width="16%" align="center">#</td>
    </tr>
    <tr>
      <td align="center"><? echo "$cod_conciliacao"; ?></td>
      <td align="center"><? echo "$dataabertura"; ?></td>
      <td align="center"><? echo "$horaabertura"; ?></td>
      <td align="center"><? echo "$datafechamento"; ?></td>
      <td align="center"><? echo "$horafechamento"; ?></td>
      <td align="center"><? echo "$status"; ?></td>
      <td align="center"><form action="../conciliacao/recibo_pagto/recibo_de_pagamento.php" method="post" name="form3" target="_blank">
                <input name="cod_conciliacao" type="hidden" id="cod_conciliacao" value="<? echo $cod_conciliacao; ?>">
                <input name="fornecedor" type="hidden" id="fornecedor" value="<? echo $fornecedor; ?>">
                <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"> <strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">
                  <input name="hora_pagto" type="hidden" id="hora_envio4" value="<? echo date('H:i:s'); ?>">
                </font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong></font></strong>
                <? if($valor_total_pespontador<>"0"){ echo "<input class='class01' type='submit' name='button' id='button' value='Emitir Recibo de Pagto'>"; } ?>
              </form></td>
    </tr>
    <tr>
      <td colspan="7" valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="2">
        <tr>
          <td width="8%" >Data</td>
          <td width="27%" >Descri&ccedil;&atilde;o</td>
          <td width="9%" >Veiculo</td>
          <td width="8%" >Placa</td>
          <td width="8%" >KM</td>
          <td width="7%" >HOR</td>
          <td width="8%" >Valor</td>
          <td width="8%" >Categoria</td>
          <td width="10%" >Modo Pagto</td>
          <td width="7%" >NF</td>
        </tr>
        <?
$sql = "SELECT * FROM conciliacao_comprovantes where cod_conciliacao = '$cod_conciliacao' order by datadespesa desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$cod_conciliacao = $linha[1];
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
      </table></td>
    </tr>
	  
    <tr>
        <td colspan="7" align="center"><table width="100%" border="2">
          <tbody>
            <tr>
              <td width="30%" align="center"></td>
              <td width="31%" align="center"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">Total
                                    <?


echo "Total<br> R$ $total_despesa";

?>
              </font></strong></font></strong></font></strong></font></strong></font></strong></td>
              <td width="39%" align="center">&nbsp;</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
	  
  </tbody>
</table>

<div align="center"></div>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>