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
$placa = $_POST['placa'];
$colaborador = $_POST['colaborador'];

$diainicial = $_POST['diainicial'];
$mesinicial = $_POST['mesinicial'];
$anoinicial = $_POST['anoinicial'];

$diafinal = $_POST['diafinal'];
$mesfinal = $_POST['mesfinal'];
$anofinal = $_POST['anofinal'];

$datainicial = "$anoinicial-$mesinicial-$diainicial";
$datafinal = "$anofinal-$mesfinal-$diafinal";
?>

<html>

<head>

<title><? echo "RELATORIO-DE-ABASTECIMENTO-PLACA-$placa-COLABORADOR-$colaborador-PERIODO-$diainicial-$mesinicial-$anoinicial-ATE-$diafinal-$mesfinal-$anofinal"; ?></title>

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
.class01 {font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
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
	


?>

<body> 



<?



$sql = "SELECT * FROM operadores where nome = '$colaborador' and placa = '$placa' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];

$veiculo = $linha[73];

$placa = $linha[74];
	
$estab_pertence = $linha[44];


}

?>
	
	

<table width="95%" border="2" align="center">
  <tbody>
    <tr>
<td colspan="3" align="center"><? echo "Relatorio de abastecimento-periodo-$diainicial-$mesinicial-$anoinicial-a-$diafinal-$mesfinal-$anofinal" ?></td>
    </tr>
    <tr>
      <td width="33%" align="center"  bgcolor="#878484"><strong>Colaborador</strong></td>
      <td width="41%" align="center" bgcolor="#878484"><strong>Veiculo</strong></td>
      <td width="26%" align="center"  bgcolor="#878484"><strong>Placa</strong></td>
    </tr>
    <tr>
      <td align="center"><strong><? echo "$colaborador"; ?></strong></td>
      <td align="center"><strong><? echo "$veiculo"; ?></strong></td>
      <td align="center"><strong><? echo "$placa"; ?></strong></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><table width="100%" border="2">
        <tbody>
          <tr>
            <td align="center"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">Total Monet&aacute;rio Abastecido
              <?
$sql = "select sum(valordespesa) as total_monetarioabastecido from conciliacao_comprovantes where estab_pertence = '$estab_pertence' and colaborador = '$colaborador' and placa = '$placa' and datadespesa between '$datainicial' and '$datafinal'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_monetariodeabastecimentos = $linha['total_monetarioabastecido'];

echo "R$ $total_monetariodeabastecimentos";

?>
            </font></strong></font></strong></font></strong></font></strong></font></strong></td>
            <td width="31%" align="center"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">Total KM Percorrido
              <?
$sql = "select sum(kmpercorrido) as total_kmpercorrido from controlekm_lancamentos where estab_pertence = '$estab_pertence' and operador = '$colaborador' and placa = '$placa' and datasaida between '$datainicial' and '$datafinal'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_kmpercorrido = $linha['total_kmpercorrido'];

echo "$total_kmpercorrido";

?>
            </font></strong></font></strong></font></strong></font></strong></font></strong></td>
            <td width="39%" align="center"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">Total Litros Abastecido
              <?
$sql = "select sum(quantlitro) as total_litrosabastecido from conciliacao_comprovantes where estab_pertence = '$estab_pertence' and colaborador = '$colaborador' and placa = '$placa' and datadespesa between '$datainicial' and '$datafinal'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_delitrosabastecido = bcadd($linha['total_litrosabastecido'],0,3);

echo "$total_delitrosabastecido";

?>
            </font></strong></font></strong></font></strong></font></strong></font></strong></td>
          </tr>
          <tr>
            <td align="center"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong>M&eacute;dia Monet&aacute;ria R$ / KM<font color="#0000FF">:
                                  <? 
				$mediamonetariaporkm = bcdiv($total_monetariodeabastecimentos,$total_kmpercorrido,3);
				
				echo "R$ $mediamonetariaporkm"; 
				
				
				?>
            </font></strong></font></strong></font></strong></font></strong></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong>M&eacute;dia KM / Lt<font color="#0000FF">:
                                  
              <? 
				$mediakmporlitro = bcdiv($total_kmpercorrido,$total_delitrosabastecido,3);
				
				echo "$mediakmporlitro"; 
				
				
				?></font></strong></font></strong></font></strong></font></strong></font></strong></td>
            <td align="center"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong>M&eacute;dia Lt / KM<font color="#0000FF">:
                                  <? 
				$mediakmporlitro =  bcdiv($total_delitrosabastecido,$total_kmpercorrido,4);
				
				echo  "$mediakmporlitro"; 
				
				
				?>
            </font></strong></font></strong></font></strong></font></strong></font></strong></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="3" valign="top"><table width="100%" border="1" cellpadding="0" cellspacing="2">
        <tr>
          <td width="8%" ><strong>Data</strong></td>
          <td width="20%" ><strong>Descri&ccedil;&atilde;o</strong></td>
          <td width="12%" ><strong>Veiculo</strong></td>
          <td width="7%" ><strong>Placa</strong></td>
          <td width="5%" ><strong>KM</strong></td>
          <td width="5%" ><strong>HOR</strong></td>
          <td width="8%" ><strong>Valor</strong></td>
          <td width="11%" ><strong>Categoria</strong></td>
          <td width="6%" ><strong>NF</strong></td>
          <td width="18%" ><strong>Fornecedor</strong></td>
        </tr>
        <?
$sql = "SELECT * FROM conciliacao_comprovantes where estab_pertence = '$estab_pertence' and colaborador = '$colaborador' and placa = '$placa' and datadespesa between '$datainicial' and '$datafinal' order by datadespesa desc";
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
          <td ><? echo "<a href='$comprovantedespesa' target='_blank'>$nfdespesa</a>"; ?></td>
          <td ><? echo "$fornecedordespesa"; ?></td>
        </tr>
        <? } ?>
      </table></td>
    </tr>
	  
    <tr>
        <td colspan="3" align="center">&nbsp;</td>
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