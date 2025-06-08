<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");



?>

<?

$obra = $_POST['obra'];

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

<title><? echo "RELATORIO DE PECAS UTILIZADAS"; ?></title>

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

$data_hoje = date('Y-m-d');

require '../../conect/conect.php';
	
	
$sql = "SELECT * FROM prestacao_contas_enviadas where dataabertura = '$datainicial' and datafechamento = '$datafinal' order by datafechamento desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	$registro_de_envio = mysql_num_rows($res);
	
}
	  
if($registro_de_envio<=0){
	
$comando = "insert into prestacao_contas_enviadas(dataabertura,datafechamento,status,operador,concessionaria,cidadeatuacao,statusenvio,dataenvio)

values('$datainicial','$datafinal','fechado','$operador','$estab_pertence','$cidadeatuacao','enviado','$data_hoje')";
mysql_query($comando,$conexao);
	
$sql = "SELECT * FROM prestacao_contas_enviadas where dataabertura = '$datainicial' and datafechamento = '$datafinal' order by datafechamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$num_prestacao_contas = $linha[0];
	
$periodoinicial = $linha[1];
$periodofinal = $linha[3];
$statusenvio = $linha[12];
$dataenvio = $linha[13];
	
}
	  
}
else{
	
$sql = "SELECT * FROM prestacao_contas_enviadas where dataabertura = '$datainicial' and datafechamento = '$datafinal' order by datafechamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$num_prestacao_contas = $linha[0];
	
$periodoinicial = $linha[1];
$periodofinal = $linha[3];
$statusenvio = $linha[12];
$dataenvio = $linha[13];
	
}

}

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}

$senha = $_SESSION['senha'];

	


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
	

	
$sql = "SELECT * FROM prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and concessionaria = '$estab_pertence' and statusenviocomp = 'enviado' order by codigo desc limit 1";
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
																									  
$sql = "select sum(valordespesa) as total_despesa from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_despesa = $linha['total_despesa'];
		  
$saldo = bcsub($total_antecipacao,$total_despesa,2);
	
	?>

<table width="80%" border="0" align="center">
  <tbody>
    <tr>
      <td width="10%" align="center">&nbsp;</td>
      <td colspan="7" align="center"><table width="100%" border="2">
        <tbody>
          <tr>
            <td align="center"><strong>RELATORIO DE PE&Ccedil;AS UTILIZADAS/CONSUMIDAS</strong></td>
          </tr>
        </tbody>
      </table></td>
      <td width="11%" align="center">&nbsp;</td>
      <td width="12%" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td width="6%" align="center">&nbsp;</td>
      <td width="10%" align="center">&nbsp;</td>
      <td width="8%" align="center">&nbsp;</td>
      <td width="9%" align="center">&nbsp;</td>
      <td width="10%" align="center">&nbsp;</td>
      <td width="10%" align="center">&nbsp;</td>
      <td width="14%" align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="10" align="center"><table width="100%" border="2">
        <tbody>
          <tr>
            <td colspan="8" align="center" bgcolor="#BCB5B6"><strong>Identifica&ccedil;&atilde;o da obra</strong></td>
            </tr>
          <tr>
            <td width="14%">Obra</td>
            <td width="24%" colspan="2">CC INFRA</td>
            <td width="13%">&nbsp;</td>
            <td width="11%">&nbsp;</td>
            <td width="12%">&nbsp;</td>
            <td width="11%">&nbsp;</td>
            <td width="15%">&nbsp;</td>
          </tr>
          <tr>
            <td>Cidade</td>
            <td colspan="2">CASSIA - MG</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Empresa/Local</td>
            <td colspan="2">WPX LOCA&Ccedil;&Atilde;O</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          </tbody>
      </table></td>
    </tr>
    <?
	  
	  
$sql = "SELECT * FROM prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and statusenviocomp = 'enviado' order by datadespesa desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$comprovantedespesa = $linha[9];
	?>
    <? } ?>
  </tbody>
</table>

<table width="90%" border="0" align="center">
  <tbody>
    <tr class="style3">
      <td width="23%" align="center"><strong>Nome do Produto</strong></td>
      <td width="17%" align="center"><strong>Part Number</strong></td>
      <td width="9%" align="center"><strong>Grupo</strong></td>
      <td width="15%" align="center"><strong>Sub Grupo</strong></td>
      <td width="9%" align="center"><strong>Quant</strong></td>
      <td width="8%" align="center">Estoque</td>
      <td width="11%" align="center"><strong>Manuten&ccedil;&atilde;o</strong></td>
      <td width="8%" align="center"><strong>Placa</strong><strong></strong></td>
    </tr>
	  <?
	  
$sql = "SELECT * FROM ocorrencias_pecas order by ocorrencia desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg_pecas++;

$referencia = $linha[0];

$grupo = $linha[4];
$sub_grupo = $linha[5];
$descricao = $linha[6];

$codigo_interno_da_peca = $linha[11];
$quant_utilizada = $linha[16];
$nome_produto = $linha[27];
$placa = $linha[44];
$ocorrencia = $linha[45];
	
	
$sql2 = "SELECT * FROM estoque_pecas where referencia = '$referencia'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	
$quant_em_estoque = $linha[16];
	  ?>
    <tr>
      <td align="center"><strong><? echo "$nome_produto"; ?></strong></td>
      <td align="center"><strong><? echo "$referencia"; ?></strong></td>
      <td align="center"><strong><? echo "$grupo"; ?></strong></td>
      <td align="center"><strong><? echo "$sub_grupo"; ?></strong></td>
      <td align="center"><strong><? echo "$quant_utilizada"; ?></strong></td>
      <td align="center"><strong><? echo "$quant_em_estoque"; ?></strong></td>
      <td align="center"><strong><? echo "$ocorrencia"; ?></strong></td>
      <td align="center"><strong><? echo "$placa"; ?></strong></td>
    </tr>
	  
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
	  <? } } ?>
  </tbody>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div align="center"></div>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>