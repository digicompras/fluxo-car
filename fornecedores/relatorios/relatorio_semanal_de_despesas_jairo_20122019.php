<?php

session_start(); //inicia sess�o...

if ($_SESSION["senha"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.



else //se n�o for...

header("Location: alerta.php");



?>

<?

$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$datafinal = "$ano_final-$mes_final-$dia_final";

?>
<html>

<head>

<title><? echo "PRESTACAO_DE_CONTAS_$dia_inicial_$mes_inicial_$ano_inicial_ate_$dia_final_$mes_final_$ano_final"; ?></title>

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
	
$sql = "SELECT * FROM prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_prestacao = $linha[0];
	$dataabertura = $linha[1];
	$horaabertura = $linha[2];
	$datafechamento = $linha[3];
	$horafechamento = $linha[4];
	$status = $linha[5];
	$operador_contas = $linha[6];
	$estab_pertence = $linha[7];
	$saldoanterior = $linha[10];
	$cidadeatuacao = $linha[11];
}
	
	?>
	<?
//$sql = "select sum(valorantecipacao) as total_antecipacao from prestacao_contas_antecipacoes where num_prestacao_contas = '$cod_prestacao'";
//$resultado=mysql_query($sql, $conexao);
//$linha=mysql_fetch_array($resultado);

//$total_antecipacao = $linha['total_antecipacao'];
																									  
$sql = "select sum(valordespesa) as total_despesa from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_despesa = $linha['total_despesa'];
		  
$saldo = bcsub($total_antecipacao,$total_despesa,2);
	
	?>

<table width="80%" border="0" align="center">
  <tbody>
    <tr>
      <td width="16%" align="center">&nbsp;</td>
      <td colspan="5" align="center">PRESTA&Ccedil;&Atilde;O DE CONTAS</td>
      <td width="16%" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td width="9%" align="center">&nbsp;</td>
      <td width="16%" align="center">&nbsp;</td>
      <td width="13%" align="center">&nbsp;</td>
      <td width="14%" align="center">&nbsp;</td>
      <td width="16%" align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="7" valign="top"><table width="100%" border="1">
        <form action="index.php" method="post" enctype="multipart/form-data" name="form1">
        </form>
        <tr>
          <td width="100%" align="center"><table width="100%" border="1">
            <tr>
              <td width="16%" >Data</td>
              <td width="30%" >Fornecedor</td>
              <td width="27%" >Descri&ccedil;&atilde;o</td>
              <td width="16%" >Valor</td>
              <td width="11%" >NF</td>
            </tr>
            <?
$sql = "SELECT * FROM prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' order by datadespesa desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$cod_prestacao_antecipacoes = $linha[0];
	$datadespesa = $linha[2];
	$fornecedordespesa = $linha[3];
	$descricaodespesa = $linha[4];
	$nfdespesa = $linha[5];
	$valordespesa = $linha[6];
	$comprovantedespesa = $linha[9];
	

?>
            <tr>
              <td ><? echo "$datadespesa"; ?></td>
              <td ><? echo "$fornecedordespesa"; ?></td>
              <td ><? echo "$descricaodespesa"; ?></td>
              <td ><? echo "R$ $valordespesa"; ?></td>
              <td ><? echo "<a href='$comprovantedespesa' target='_blank'>$nfdespesa</a>"; ?></td>
            </tr>
            <? } ?>
            <tr>
              <td >&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td >&nbsp;</td>
              <td >&nbsp;</td>
            </tr>
            <tr>
              <td >&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td >&nbsp;</td>
              <td >&nbsp;</td>
            </tr>
          </table></td>
        </tr>
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
$sql = "SELECT * FROM prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' order by datadespesa desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$comprovantedespesa = $linha[9];
	?>
    <tr>
      <td colspan="7" align="center">
<? echo"<img src='$comprovantedespesa'><br>"; ?>
		</td>
    </tr>
	  <? } ?>
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
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