<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");
ini_set('default_charset','UTF8_general_mysql500_ci');

require '../../../conect/conect.php';

$solicitacao = $_POST['solicitacao'];
$cod_controlekm = $_POST['cod_controlekm'];
?>
<?
	
$sql = "SELECT * FROM controlekm where codigo = '$cod_controlekm' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

	$dataabertura = $linha[2];
	$datafechamento = $linha[4];
	$veiculo = $linha[6];
	$placa = $linha[7];
	$fornecedor = $linha[15];
	$estab_pertence = $linha[9];
	$colaborador = $linha[15];
	
}

$data2 = explode("-", $dataabertura);

$anorelatorio = $data2[0];

$mesrelatorio = $data2[1];

$diarelatorio = $data2[2];



?>

<html>

<head>

<title><? echo "Controle-de-KM-Veiculo-$veiculo-Placa-$placa-$fornecedor-mes-$mesrelatorio-$anorelatorio"; ?></title>

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
	
	

<table width="95%" border="2" align="center">
  <tbody>
    <tr>
<td colspan="6" align="center"><? echo "Controle-de-KM-Veiculo-$veiculo-Placa-$placa-$fornecedor-mes-$mesrelatorio-$anorelatorio" ?></td>
    </tr>
    <tr>
      <td width="15%" align="center"  bgcolor="#878484"><strong>Num. Controle KM</strong></td>
      <td width="9%" align="center"  bgcolor="#878484"><strong>Data Abertura</strong></td>
      <td width="16%" align="center"  bgcolor="#878484"><strong>Data Fechamento</strong></td>
      <td align="center"  bgcolor="#878484"><strong>Colaborador</strong></td>
      <td width="16%" align="center" bgcolor="#878484"><strong>Veiculo</strong></td>
      <td width="16%" align="center"  bgcolor="#878484"><strong>Placa</strong></td>
    </tr>
    <tr>
      <td align="center"><strong><? echo "$cod_controlekm"; ?></strong></td>
      <td align="center"><strong><? echo "$dataabertura"; ?></strong></td>
      <td align="center"><strong><? echo "$datafechamento"; ?></strong></td>
      <td align="center"><strong><? echo "$fornecedor"; ?></strong></td>
      <td align="center"><strong><? echo "$veiculo"; ?></strong></td>
      <td align="center"><strong><? echo "$placa"; ?></strong></td>
    </tr>
    <tr>
      <td colspan="6" align="center"><table width="100%" border="2">
        <tbody>
          <tr>
            <td align="center"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">Total Monet&aacute;rio Abastecido
              <?
$sql = "select sum(valordespesa) as total_monetarioabastecido from conciliacao_comprovantes where estab_pertence = '$estab_pertence' and colaborador = '$colaborador' and placa = '$placa' and mesdespesa = '$mesrelatorio' and anodespesa = '$anorelatorio'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_monetariodeabastecimentos = $linha['total_monetarioabastecido'];

echo "R$ $total_monetariodeabastecimentos";

?>
            </font></strong></font></strong></font></strong></font></strong></font></strong></td>
            <td width="31%" align="center"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">Total KM Percorrido
              <?
$sql = "select sum(kmpercorrido) as total_kmpercorrido from controlekm_lancamentos where estab_pertence = '$estab_pertence' and operador = '$colaborador' and cod_controlekm = '$cod_controlekm'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_kmpercorrido = $linha['total_kmpercorrido'];

echo "$total_kmpercorrido";

?>
            </font></strong></font></strong></font></strong></font></strong></font></strong></td>
            <td width="39%" align="center"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF"><strong><font color="#0000FF">Total Litros Abastecido
              <?
$sql = "select sum(quantlitro) as total_litrosabastecido from conciliacao_comprovantes where estab_pertence = '$estab_pertence' and colaborador = '$colaborador' and placa = '$placa' and mesdespesa = '$mesrelatorio' and anodespesa = '$anorelatorio'";
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
      <td colspan="6" valign="top">
		  <table width="100%" border="1" cellpadding="0" cellspacing="0">
			   <?
$sql = "SELECT * FROM controlekm_lancamentos where estab_pertence = '$estab_pertence' and fornecedordespesa = '$colaborador' and cod_controlekm = '$cod_controlekm' order by datasaida desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_lancamento_do_controlekm = $linha[0];
$cod_controlekm = $linha[1];
	$fornecedordespesa = $linha[2];
	$descricao_motivo = $linha[3];
	
	$datasaida = $linha[5];
	
	$data_da_saida2 = explode("-", $datasaida);

	$diasaida = $data_da_saida2[0];

	$messaida = $data_da_saida2[1];

	$anosaida = $data_da_saida2[2];
	
	$datasaida_br = "$anosaida-$messaida-$diasaida";
	
	
	$horasaida = $linha[6];
	$kmsaida = $linha[7];
	
	
	$dataretorno = $linha[8];
	
	$data_da_retorno2 = explode("-", $dataretorno);

	$diaretorno = $data_da_retorno2[0];

	$mesretorno = $data_da_retorno2[1];

	$anoretorno = $data_da_retorno2[2];
	
	$dataretorno_br = "$anoretorno-$mesretorno-$diaretorno";
	
	$horaretorno = $linha[9];
	$kmretorno = $linha[10];
	$kmpercorrido = $linha[11];
    $atividadesrealizadas = $linha[14];
	
	
?>
        <tr>
          <td width="9%" align="center"  bgcolor="#878484"><strong>Data Saida</strong></td>
          <td width="7%" align="center"  bgcolor="#878484"><strong>Hora Sa&iacute;da</strong></td>
          <td width="8%" align="center"  bgcolor="#878484"><strong>KM Sa&iacute;da</strong></td>
          <td width="8%" align="center"  bgcolor="#878484"><strong>Data Retorno</strong></td>
          <td width="8%" align="center"  bgcolor="#878484"><strong>hora Retorno</strong></td>
          <td width="10%" align="center"  bgcolor="#878484"><strong>KM Retorno</strong></td>
          <td width="11%" align="center"  bgcolor="#878484"><strong>KM Percorrido</strong></td>
          <td width="21%" align="center"  bgcolor="#878484"><strong>Trajeto Geral Percorrido</strong></td>
          <td width="18%" align="center"  bgcolor="#878484"><strong>Atividades Realizadas</strong></td>
          </tr>
       
        <tr>
          <form name="form1" method="post" action="index.php">
            <td  align="center" ><?	echo "$datasaida_br"; ?></td>
            <td  align="center" ><? echo "$horasaida"; ?></td>
            <td  align="center" ><? echo "$kmsaida"; ?></td>
            <td  align="center" ><?	echo "$dataretorno_br"; ?></td>
            <td  align="center" ><? echo "$horaretorno"; ?></td>
            <td  align="center" ><? echo "$kmretorno"; ?></td>
            <td  align="center" ><? echo "$kmpercorrido"; ?></td>
            <td  align="center" ><? echo "$descricao_motivo"; ?></td>
            <td  align="center" ><? echo "$atividadesrealizadas"; ?></td>
            </form>
          <form name="form1" method="post" action="index.php">
            </form>
        </tr>
        
        <tr>
          <td colspan="9" align="center" bgcolor="#C8C3C3">&nbsp;</td>
          </tr>
			  <? } ?>
      </table>
		</td>
    </tr>
	  
    <tr>
        <td colspan="6" align="center">&nbsp;</td>
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