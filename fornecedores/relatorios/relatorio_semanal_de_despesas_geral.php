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

<title><? echo "PRESTACAO DE CONTAS"; ?></title>

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
            <td align="center"><strong>SOLICITA&Ccedil;&Atilde;O / ACERTO DESPESAS DE VIAGEM</strong></td>
          </tr>
        </tbody>
      </table></td>
      <td width="11%" align="center">N.</td>
      <td width="12%" align="center"><? 
	echo "$num_prestacao_contas";
	
?></td>
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
      <td align="center">Data Abertura</td>
      <td align="center"><? 
	echo "$periodoinicial";
	
?></td>
    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td colspan="7" align="center"><table width="100%" border="2">
        <tbody>
          <tr>
            <td align="center"><strong>Autoriza&ccedil;&atilde;o de Viagem</strong></td>
          </tr>
        </tbody>
      </table></td>
      <td align="center">Data Fechamento</td>
      <td align="center"><? 
	echo "$periodofinal";
	
?></td>
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
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="10" align="center"><table width="100%" border="2">
        <tbody>
          <tr>
            <td colspan="8" align="center" bgcolor="#BCB5B6"><strong>Identifica&ccedil;&atilde;o do Viajante</strong></td>
            </tr>
          <tr>
            <td width="14%">Nome</td>
            <td colspan="2">JAIRO DOS ANJOS SILVA</td>
            <td width="13%">&nbsp;</td>
            <td width="11%">&nbsp;</td>
            <td width="12%">&nbsp;</td>
            <td width="11%">&nbsp;</td>
            <td width="15%">&nbsp;</td>
          </tr>
          <tr>
            <td>Cargo/Fun&ccedil;&atilde;o</td>
            <td colspan="2">GESTOR - CASSIA - MG</td>
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
          <tr>
            <td>Finalidade da Viagem</td>
            <td colspan="4">&nbsp;</td>
            <td>&nbsp;</td>
            <td>Acompanhantes</td>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td colspan="8" align="center" bgcolor="#BCB5B6"><strong>Identifica&ccedil;&atilde;o da Viagem</strong></td>
            </tr>
          <tr>
            <td>Data Sa&iacute;da</td>
            <td width="14%">&nbsp;</td>
            <td width="10%">Horario</td>
            <td>&nbsp;</td>
            <td>Data Retorno</td>
            <td>&nbsp;</td>
            <td>Hor&aacute;rio</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>Total de Di&aacute;rias</td>
            <td>&nbsp;</td>
            <td colspan="2">Classifica&ccedil;&atilde;o do destino</td>
            <td align="center">1</td>
            <td colspan="3" align="center">1- Interior     2 - Capital</td>
            </tr>
          <tr>
            <td>Limite de Alimenta&ccedil;&atilde;o</td>
            <td>&nbsp;</td>
            <td colspan="2">Limite de hospedagem</td>
            <td>&nbsp;</td>
            <td>Passagens</td>
            <td colspan="2">&nbsp;</td>
            </tr>
          <tr>
            <td>Meio de Transporte</td>
            <td>Ve&iacute;culo da empresa</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Hotel</td>
            <td colspan="2">&nbsp;</td>
            </tr>
          <tr>
            <td>V&iacute;culo</td>
            <td>&nbsp;</td>
            <td>KM Sa&iacute;da</td>
            <td>&nbsp;</td>
            <td>KM Retorno</td>
            <td>&nbsp;</td>
            <td>Total KM</td>
            <td>&nbsp;</td>
          </tr>
          </tbody>
      </table></td>
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
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="10" valign="top"><table width="100%" border="1">
        <form action="index.php" method="post" enctype="multipart/form-data" name="form1">
        </form>
        <tr>
          <td width="100%" align="center"><table width="100%" border="1">
            <tr>
              <td colspan="8" align="center" bgcolor="#BCB5B6">Despesas Realizadas</td>
              </tr>
            <tr>
              <td colspan="2" >DESCRI&Ccedil;&Atilde;O</td>
              <td width="9%" >DINHEIRO</td>
              <td width="10%" >C CREDITO</td>
              <td colspan="2" >DESCRI&Ccedil;&Atilde;O</td>
              <td width="12%" >DINHEIRO</td>
              <td width="13%" >C CREDITO</td>
            </tr>
            <?
$sql = "SELECT * FROM prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and statusenviocomp = 'enviado' order by datadespesa desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$cod_prestacao_antecipacoes = $linha[0];
	$datadespesa = $linha[2];
	$fornecedordespesa = $linha[3];
	$descricaodespesa = $linha[4];
	$nfdespesa = $linha[5];
	$valordespesa = $linha[6];
	$comprovantedespesa = $linha[9];
	
}
?>
            <tr>
              <td width="3%" >1</td>
              <td width="23%" >Refei&ccedil;&otilde;es (caf&eacute;, almo&ccedil;o e/ou janta)</td>
              <td >
<? 
$sql = "select sum(valordespesa) as totalrefeicao from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'REFEICAO' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalrefeicao = bcadd($linha['totalrefeicao'],0,2);
	if($totalrefeicao<=0){
		
	}
	else{
	echo "R$ $totalrefeicao";
	}
?>
				</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalrefeicaocartao from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'REFEICAO' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalrefeicaocartao = bcadd($linha['totalrefeicaocartao'],0,2);
	if($totalrefeicaocartao<=0){
		
	}
	else{
	echo "R$ $totalrefeicaocartao";
	}
?></td>
              <td width="4%" >11</td>
              <td width="26%" >Pe&ccedil;as/Acess&oacute;rios</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalpecasacessorios from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'PECAS-ACESSORIOS' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalpecasacessorios = bcadd($linha['totalpecasacessorios'],0,2);
	if($totalpecasacessorios<=0){
		
	}
	else{
	echo "R$ $totalpecasacessorios";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalpecasacessorios from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'PECAS-ACESSORIOS' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalpecasacessorios = bcadd($linha['totalpecasacessorios'],0,2);
	if($totalpecasacessorios<=0){
		
	}
	else{
	echo "R$ $totalpecasacessorios";
	}
?></td>
            </tr>
            
            <tr>
              <td >2</td>
              <td >Frigobar (&aacute;gua)</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalfrigobar from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'FRIGOBAR' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalfrigobar = bcadd($linha['totalfrigobar'],0,2);
	if($totalfrigobar<=0){
		
	}
	else{
	echo "R$ $totalfrigobar";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalfrigobarcartao from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'FRIGOBAR' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalfrigobarcartao = bcadd($linha['totalfrigobarcartao'],0,2);
	if($totalfrigobarcartao<=0){
		
	}
	else{
	echo "R$ $totalfrigobarcartao";
	}
?></td>
              <td >12</td>
              <td >Guincho</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalguincho from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'GUINCHO' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalguincho = bcadd($linha['totalguincho'],0,2);
	if($totalguincho<=0){
		
	}
	else{
	echo "R$ $totalguincho";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalguincho from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'GUINCHO' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalguincho = bcadd($linha['totalguincho'],0,2);
	if($totalguincho<=0){
		
	}
	else{
	echo "R$ $totalguincho";
	}
?></td>
            </tr>
            <tr>
              <td >3</td>
              <td >Gasolina</td>
              <td><? 
$sql = "select sum(valordespesa) as totalgasolina from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'GASOLINA' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalgasolina = bcadd($linha['totalgasolina'],0,2);
	if($totalgasolina<=0){
		
	}
	else{
	echo "R$ $totalgasolina";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalgasolinacartao from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'GASOLINA' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalgasolinacartao = bcadd($linha['totalgasolinacartao'],0,2);
	if($totalgasolinacartao<=0){
		
	}
	else{
	echo "R$ $totalgasolinacartao";
	}
?></td>
              <td >13</td>
              <td >Taxi Deslocamentos</td>
              <td ><? 
$sql = "select sum(valordespesa) as totaltaxideslocamentos from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'TAXI-DESLOCAMENTOS' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totaltaxideslocamentos = bcadd($linha['totaltaxideslocamentos'],0,2);
	if($totaltaxideslocamentos<=0){
		
	}
	else{
	echo "R$ $totaltaxideslocamentos";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totaltaxideslocamentos from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'TAXI-DESLOCAMENTOS' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totaltaxideslocamentos = bcadd($linha['totaltaxideslocamentos'],0,2);
	if($totaltaxideslocamentos<=0){
		
	}
	else{
	echo "R$ $totaltaxideslocamentos";
	}
?></td>
            </tr>
            <tr>
              <td >4</td>
              <td >Diesel</td>
              <td ><? 
$sql = "select sum(valordespesa) as totaldiesel from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'DIESEL' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totaldiesel = bcadd($linha['totaldiesel'],0,2);
	if($totaldiesel<=0){
		
	}
	else{
	echo "R$ $totaldiesel";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totaldieselcartao from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'DIESEL' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totaldieselcartao = bcadd($linha['totaldieselcartao'],0,2);
	if($totaldieselcartao<=0){
		
	}
	else{
	echo "R$ $totaldieselcartao";
	}
?></td>
              <td >14</td>
              <td >Graxa/Lubrificantes</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalgraxalubrificantes from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'GRAXA-LUBRIFICANTES' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalgraxalubrificantes = bcadd($linha['totalgraxalubrificantes'],0,2);
	if($totalgraxalubrificantes<=0){
		
	}
	else{
	echo "R$ $totalgraxalubrificantes";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalgraxalubrificantes from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'GRAXA-LUBRIFICANTES' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalgraxalubrificantes = bcadd($linha['totalgraxalubrificantes'],0,2);
	if($totalgraxalubrificantes<=0){
		
	}
	else{
	echo "R$ $totalgraxalubrificantes";
	}
?></td>
            </tr>
            <tr>
              <td >5</td>
              <td >Alcool</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalalcool from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'ALCOOL' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalalcool = bcadd($linha['totalalcool'],0,2);
	if($totalalcool<=0){
		
	}
	else{
	echo "R$ $totalalcool";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalalcoolcartao from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'ALCOOL' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalalcoolcartao = bcadd($linha['totalalcoolcartao'],0,2);
	if($totalalcoolcartao<=0){
		
	}
	else{
	echo "R$ $totalalcoolcartao";
	}
?></td>
              <td >15</td>
              <td >Correios</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalcorreios from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'CORREIOS' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalcorreios = bcadd($linha['totalcorreios'],0,2);
	if($totalcorreios<=0){
		
	}
	else{
	echo "R$ $totalcorreios";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalcorreios from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'CORREIOS' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalcorreios = bcadd($linha['totalcorreios'],0,2);
	if($totalcorreios<=0){
		
	}
	else{
	echo "R$ $totalcorreios";
	}
?></td>
            </tr>
            <tr>
              <td >6</td>
              <td >Arla 32</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalarla32 from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'ARLA-32' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalarla32 = bcadd($linha['totalarla32'],0,2);
	if($totalarla32<=0){
		
	}
	else{
	echo "R$ $totalarla32";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalarla32cartao from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'ARLA-32' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalarla32cartao = bcadd($linha['totalarla32cartao'],0,2);
	if($totalarla32cartao<=0){
		
	}
	else{
	echo "R$ $totalarla32cartao";
	}
?></td>
              <td >16</td>
              <td >Telefone</td>
              <td ><? 
$sql = "select sum(valordespesa) as totaltelefone from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'TELEFONE' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totaltelefone = bcadd($linha['totaltelefone'],0,2);
	if($totaltelefone<=0){
		
	}
	else{
	echo "R$ $totaltelefone";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totaltelefone from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'TELEFONE' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totaltelefone = bcadd($linha['totaltelefone'],0,2);
	if($totaltelefone<=0){
		
	}
	else{
	echo "R$ $totaltelefone";
	}
?></td>
            </tr>
            <tr>
              <td >7</td>
              <td >Aluguel de Ve&iacute;culo</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalaluguelveiculo from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'ALUGUEL-VEICULO' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalaluguelveiculo = bcadd($linha['totalaluguelveiculo'],0,2);
	if($totalaluguelveiculo<=0){
		
	}
	else{
	echo "R$ $totalaluguelveiculo";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalaluguelveiculocartao from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'ALUGUEL-VEICULO' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalaluguelveiculocartao = bcadd($linha['totalaluguelveiculocartao'],0,2);
	if($totalaluguelveiculocartao<=0){
		
	}
	else{
	echo "R$ $totalaluguelveiculocartao";
	}
?></td>
              <td >17</td>
              <td >Di&aacute;rias</td>
              <td ><? 
$sql = "select sum(valordespesa) as totaldiarias from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'DIARIAS' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totaldiarias = bcadd($linha['totaldiarias'],0,2);
	if($totaldiarias<=0){
		
	}
	else{
	echo "R$ $totaldiarias";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totaldiarias from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'DIARIAS' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totaldiarias = bcadd($linha['totaldiarias'],0,2);
	if($totaldiarias<=0){
		
	}
	else{
	echo "R$ $totaldiarias";
	}
?></td>
            </tr>
            <tr>
              <td >8</td>
              <td >Passagens</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalpassagens from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'PASSAGENS' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalpassagens = bcadd($linha['totalpassagens'],0,2);
	if($totalpassagens<=0){
		
	}
	else{
	echo "R$ $totalpassagens";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalpassagenscartao from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'PASSAGENS' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalpassagenscartao = bcadd($linha['totalpassagenscartao'],0,2);
	if($totalpassagenscartao<=0){
		
	}
	else{
	echo "R$ $totalpassagenscartao";
	}
?></td>
              <td >18</td>
              <td >Ped&aacute;gios</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalpedagio from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'PEDAGIO' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalpedagio = bcadd($linha['totalpedagio'],0,2);
	if($totalpedagio<=0){
		
	}
	else{
	echo "R$ $totalpedagio";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalpedagio from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'PEDAGIO' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalpedagio = bcadd($linha['totalpedagio'],0,2);
	if($totalpedagio<=0){
		
	}
	else{
	echo "R$ $totalpedagio";
	}
?></td>
            </tr>
            <tr>
              <td >9</td>
              <td >Hospedagem</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalhospedagem from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'HOSPEDAGEM' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalhospedagem = bcadd($linha['totalhospedagem'],0,2);
	if($totalhospedagem<=0){
		
	}
	else{
	echo "R$ $totalhospedagem";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalhospedagemcartao from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'HOSPEDAGEM' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalhospedagemcartao = bcadd($linha['totalhospedagemcartao'],0,2);
	if($totalhospedagemcartao<=0){
		
	}
	else{
	echo "R$ $totalhospedagemcartao";
	}
?></td>
              <td >19</td>
              <td >EPI</td>
              <td ><? 
$sql = "select sum(valordespesa) as totalepi from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'EPI' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalepi = bcadd($linha['totalepi'],0,2);
	if($totalepi<=0){
		
	}
	else{
	echo "R$ $totalepi";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totalepi from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'EPI' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totalepi = bcadd($linha['totalepi'],0,2);
	if($totalepi<=0){
		
	}
	else{
	echo "R$ $totalepi";
	}
?></td>
            </tr>
            <tr>
              <td >10</td>
              <td >Limpeza P&aacute;tio</td>
              <td ><? 
$sql = "select sum(valordespesa) as totallimpezapatio from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'LIMPEZA' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totallimpezapatio = bcadd($linha['totallimpezapatio'],0,2);
	if($totallimpezapatio<=0){
		
	}
	else{
	echo "R$ $totallimpezapatio";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totallimpezapatiocartao from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'LIMPEZA-PATIO' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totallimpezapatiocartao = bcadd($linha['totallimpezapatiocartao'],0,2);
	if($totallimpezapatiocartao<=0){
		
	}
	else{
	echo "R$ $totallimpezapatiocartao";
	}
?></td>
              <td >20</td>
              <td >Outros</td>
              <td ><? 
$sql = "select sum(valordespesa) as totaloutros from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'OUTROS' and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totaloutros = bcadd($linha['totaloutros'],0,2);
	if($totaloutros<=0){
		
	}
	else{
	echo "R$ $totaloutros";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as totaloutros from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'OUTROS' and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$totaloutros = bcadd($linha['totaloutros'],0,2);
	if($totaloutros<=0){
		
	}
	else{
	echo "R$ $totaloutros";
	}
?></td>
            </tr>
            <tr>
              <td colspan="8" align="center" bgcolor="#BCB5B6"><strong>* Anexar todos os documentos originais comprobat&oacute;rios</strong></td>
              </tr>
            <tr>
              <td colspan="2" align="center">SUBTOTAL POR OBRA</td>
              <td ><? 
$sql = "select sum(valordespesa) as subtotaldinheiro from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and (categoriadespesa = 'REFEICAO' or categoriadespesa = 'FRIGOBAR' or categoriadespesa = 'GASOLINA' or categoriadespesa = 'DIESEL' or categoriadespesa = 'ALCOOL' or categoriadespesa = 'ARLA-32' or categoriadespesa = 'ALUGUEL-VEICULO' or categoriadespesa = 'PASSAGENS' or categoriadespesa = 'HOSPEDAGEM' or categoriadespesa = 'LIMPEZA-PATIO') and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$subtotaldinheiro = bcadd($linha['subtotaldinheiro'],0,2);
	if($subtotaldinheiro<=0){
		
	}
	else{
	echo "R$ $subtotaldinheiro";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as subtotaldinheiro from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and (categoriadespesa = 'REFEICAO' or categoriadespesa = 'FRIGOBAR' or categoriadespesa = 'GASOLINA' or categoriadespesa = 'DIESEL' or categoriadespesa = 'ALCOOL' or categoriadespesa = 'ARLA-32' or categoriadespesa = 'ALUGUEL-VEICULO' or categoriadespesa = 'PASSAGENS' or categoriadespesa = 'HOSPEDAGEM' or categoriadespesa = 'LIMPEZA-PATIO') and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$subtotaldinheiro = bcadd($linha['subtotaldinheiro'],0,2);
	if($subtotaldinheiro<=0){
		
	}
	else{
	echo "R$ $subtotaldinheiro";
	}
?></td>
              <td colspan="2" bgcolor="#BCB5B6" >&nbsp;</td>
              <td ><? 
$sql = "select sum(valordespesa) as subtotal2dinheiro from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and (categoriadespesa = 'DIARIAS' or categoriadespesa = 'TELEFONE' or categoriadespesa = 'CORREIOS' or categoriadespesa = 'GRAXA-LUBRIFICANTES' or categoriadespesa = 'TAXI-DESLOCAMENTOS' or categoriadespesa = 'GUINCHO' or categoriadespesa = 'PECAS-ACESSORIOS' or categoriadespesa = 'LIMPEZA-PATIO' or categoriadespesa = 'PEDAGIO' or categoriadespesa = 'EPI' or categoriadespesa = 'OUTROS') and modopagto = 'DINHEIRO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$subtotal2dinheiro = bcadd($linha['subtotal2dinheiro'],0,2);
	if($subtotal2dinheiro<=0){
		
	}
	else{
	echo "R$ $subtotal2dinheiro";
	}
?></td>
              <td ><? 
$sql = "select sum(valordespesa) as subtotal2dinheiro from prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and (categoriadespesa = 'DIARIAS' or categoriadespesa = 'TELEFONE' or categoriadespesa = 'CORREIOS' or categoriadespesa = 'GRAXA-LUBRIFICANTES' or categoriadespesa = 'TAXI-DESLOCAMENTOS' or categoriadespesa = 'GUINCHO' or categoriadespesa = 'PECAS-ACESSORIOS' or categoriadespesa = 'LIMPEZA-PATIO' or categoriadespesa = 'PEDAGIO' or categoriadespesa = 'EPI' or categoriadespesa = 'OUTROS') and modopagto = 'CARTAO' and statusenviocomp = 'enviado'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$subtotal2dinheiro = bcadd($linha['subtotal2dinheiro'],0,2);
	if($subtotal2dinheiro<=0){
		
	}
	else{
	echo "R$ $subtotal2dinheiro";
	}
?></td>
            </tr>
            </table></td>
        </tr>
      </table></td>
    </tr>
	  
    <tr>
        <td colspan="10" align="center"><table width="100%" border="2">
          <tbody>
            <tr>
              <td align="center">Total Geral
              <?


echo "Total<br> R$ $total_despesa";

?></td>
            </tr>
            <tr>
              <td align="center">Valor por extenso</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
	  
    <tr>
        <td colspan="10" align="left" valign="top"><table width="100%" border="2">
          <tbody>
            <tr>
              <td align="left" valign="top"><p>Justificar outros gastos:</p>
<?
$sql = "SELECT * FROM prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and categoriadespesa = 'OUTROS' and statusenviocomp = 'enviado' order by datadespesa desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$cod_prestacao_antecipacoes = $linha[0];
	$datadespesa = $linha[2];
	$fornecedordespesa = $linha[3];
	$descricaodespesa = $linha[4];
	$nfdespesa = $linha[5];
	$valordespesa = $linha[6];
	$comprovantedespesa = $linha[9];
echo "* $descricaodespesa<br>";
}
?>
				
				</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td colspan="10" align="center"><table width="100%" border="2">
        <tbody>
          <tr>
            <td width="48%" align="center"><p>Cassia - MG</p>
              <p>&nbsp;</p>
              ___________________________________________<br>
              JAIRO DOS ANJOS SILVA</td>
            <td width="52%" align="center" valign="top"><p>&nbsp;</p>
              <p>&nbsp;</p>
              _______________________________________<br>
              Assinatura do respons&aacute;vel</td>
          </tr>
          <tr>
            <td colspan="2" align="center"><strong>Declaro estar ciente da pol&iacute;tica de viajem da empresa.</strong></td>
            </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="10" align="center" bgcolor="#BCB5B6">&nbsp;</td>
    </tr>
	  <?
	  
	  
$sql = "SELECT * FROM prestacao_contas_comprovantes where datadespesa between '$datainicial' and '$datafinal' and statusenviocomp = 'enviado' order by datadespesa desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$comprovantedespesa = $linha[9];
	?>
    <tr>
      <td colspan="10" align="center">
<? //echo"<img src='$comprovantedespesa'><br>"; ?>
<? //echo "<a href='$comprovantedespesa' target='_blank'>$nfdespesa</a>"; ?>

		
		</td>
		
    </tr>
	  <? } ?>
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="7">&nbsp;</td>
    </tr>
  </tbody>
</table>

<p>&nbsp;</p>
<div align="center"></div>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>