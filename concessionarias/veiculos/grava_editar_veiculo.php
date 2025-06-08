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
<title>GRAVA&Ccedil;&Atilde;O DE COMUNICADO DE VENDA</title>
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
</style>
</head>

<?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';
error_reporting(E_ALL);
	
$senha = $_SESSION['senha'];

$sql = "select * from operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$operador_alterou = $linha[1];
	
$teloperador_alterou = $linha[19];
	
	$emailoperador_alterou = $linha[20];
	
	$estab_pertence = $linha[44];
}

?>

		  
		  
		  <?
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
	
}
	
	$sql = "select * from rdo_data_inicial_e_final";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$diafinalrdo = $linha[4];
	$mesfinalrdo = $linha[5];
	$anofinalrdo = $linha[6];
}
$datafinal_do_periodo_atual_do_rdo = "$anofinalrdo-$mesfinalrdo-$diafinalrdo";



//dados do veiculo
$codigo = $_POST['codigo'];
$codigointerno = $_POST['codigointerno'];
	
	$dataalteracao = date('Y-m-d');
	$horaalteracao = date('H:i:s');
	
	
$placa = $_POST['placa'];
	$placa2 = $_POST['placa2'];
 rename("../../$placa2/", "../../$placa/");
	
	if($placa<>$placa2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Placa','$placa2','$placa','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$veiculo = $_POST['veiculo'];
	$veiculo2 = $_POST['veiculo2'];
	
	if($veiculo<>$veiculo2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Veiculo','$veiculo2','$veiculo','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$ano = $_POST['ano'];
	$ano2 = $_POST['ano2'];
	
	if($ano<>$ano2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Ano','$ano2','$ano','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$modelo = $_POST['modelo'];
	$modelo2 = $_POST['modelo2'];
	
	if($modelo<>$modelo2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Modelo','$modelo2','$modelo','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$prefixo = $_POST['prefixo'];
	$prefixo2 = $_POST['prefixo2'];
	
	if($prefixo<>$prefixo2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Prefixo','$prefixo2','$prefixo','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	

	
$chassi_recebido = $_POST['chassi'];
	$chassi_recebido2 = $_POST['chassi2'];
	
if(empty($chassi_recebido)){
$chassi = $placa;
}
else{
$chassi = $chassi_recebido;
	}
	
	if($chassi_recebido<>$chassi_recebido2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Chassi','$chassi_recebido2','$chassi','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	

$renavam_recebido  = $_POST['renavam'];
	$renavam_recebido2  = $_POST['renavam2'];
	
if(empty($renavam_recebido)){
$renavam = $placa;
}
else{
$renavam = $renavam_recebido;
}
	
if($renavam_recebido<>$renavam_recebido2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Renavam','$renavam_recebido2','$renavam','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
$corveiculo = $_POST['corveiculo'];
	$corveiculo2 = $_POST['corveiculo2'];
	
	if($corveiculo<>$corveiculo2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Cor','$corveiculo2','$corveiculo','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$tipoveiculo = $_POST['tipoveiculo'];
	$tipoveiculo2 = $_POST['tipoveiculo2'];
	
	
	if($tipoveiculo<>$tipoveiculo2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Tipo','$tipoveiculo2','$tipoveiculo','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$status = $_POST['status'];
	
	
$numeroveiculo = $_POST['numeroveiculo'];
	$numeroveiculo2 = $_POST['numeroveiculo2'];
	
	if($numeroveiculo<>$numeroveiculo2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Numero Veiculo','$numeroveiculo2','$numeroveiculo','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$km = $_POST['km'];
	$km2 = $_POST['km2'];
	
	if($km<>$km2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','KM','$km2','$km','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$horimetro = $_POST['horimetro'];
	$horimetro2 = $_POST['horimetro2'];
	
	if($horimetro<>$horimetro2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Horimetro','$horimetro2','$horimetro','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$valormanutencao = $_POST['valormanutencao'];
	$valormanutencao2 = $_POST['valormanutencao2'];
	
	if($valormanutencao<>$valormanutencao2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Valor Manutenção','$valormanutencao2','$valormanutencao','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$obra = $_POST['obra'];
		$obra2 = $_POST['obra2'];
	
	if($obra<>$obra2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Obra','$obra2','$obra','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}

	
//------------

$datachegada_d = $_POST['datachegada'];
	
	
	$datadachegada = $datachegada_d;

	$data2 = explode("-", $datadachegada);

	$diachegada = $data2[0];

	$meschegada = $data2[1];

	$anochegada = $data2[2];
	
	$datachegada = "$anochegada-$meschegada-$diachegada";
	
	
	$datachegada_d2 = $_POST['datachegada2'];
	
	$datadachegada2 = $datachegada_d2;

	$data22 = explode("-", $datadachegada2);

	$diachegada2 = $data22[0];

	$meschegada2 = $data22[1];

	$anochegada2 = $data22[2];
	
	$datachegada2 = "$anochegada2-$meschegada2-$diachegada2";
	
	
	if($datachegada<>$datachegada2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Data chegada','$datachegada2','$datachegada','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	//--------------
	
$datavistoriawpx_d = $_POST['datavistoriawpx'];
	
	$datadavistoriawpx = $datavistoriawpx_d;

	$datavwpx2 = explode("-", $datadavistoriawpx);

	$diavistoriawpx = $datavwpx2[0];

	$mesvistoriawpx = $datavwpx2[1];

	$anovistoriawpx = $datavwpx2[2];
	
	$datavistoriawpx = "$anovistoriawpx-$mesvistoriawpx-$diavistoriawpx";
	
	
	$datavistoriawpx_d2 = $_POST['datavistoriawpx2'];
	
	$datadavistoriawpx2 = $datavistoriawpx_d2;

	$datavwpx22 = explode("-", $datadavistoriawpx2);

	$diavistoriawpx2 = $datavwpx22[0];

	$mesvistoriawpx2 = $datavwpx22[1];

	$anovistoriawpx2 = $datavwpx22[2];
	
	$datavistoriawpx2 = "$anovistoriawpx2-$mesvistoriawpx2-$diavistoriawpx2";
	
	
	if($datavistoriawpx<>$datavistoriawpx2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Data vistoria $estab_pertence','$datavistoriawpx2','$datavistoriawpx','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
	//--------------
	
$datavistoriacc_d = $_POST['datavistoriacc'];
	
	$datadavistoriacc = $datavistoriacc_d;

	$datavcc2 = explode("-", $datadavistoriacc);

	$diavistoriacc = $datavcc2[0];

	$mesvistoriacc = $datavcc2[1];

	$anovistoriacc = $datavcc2[2];
	
	$datavistoriacc = "$anovistoriacc-$mesvistoriacc-$diavistoriacc";
	
	
	$datavistoriacc_d2 = $_POST['datavistoriacc2'];
	
	$datadavistoriacc2 = $datavistoriacc_d2;

	$datavcc22 = explode("-", $datadavistoriacc2);

	$diavistoriacc2 = $datavcc22[0];

	$mesvistoriacc2 = $datavcc22[1];

	$anovistoriacc2 = $datavcc22[2];
	
	$datavistoriacc2 = "$anovistoriacc2-$mesvistoriacc2-$diavistoriacc2";
	
	
	if($datavistoriacc<>$datavistoriacc2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Data vistoria $obra','$obra2','$obra','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	//--------------
	
$datainiciotrabalho_d = $_POST['datainiciotrabalho'];
	
	$datadoiniciodotrabalho = $datainiciotrabalho_d;

	$datainciot2 = explode("-", $datadoiniciodotrabalho);

	$diainiciot = $datainciot2[0];

	$mesiniciot = $datainciot2[1];

	$anoiniciot = $datainciot2[2];
	
	$datainiciotrabalho = "$anoiniciot-$mesiniciot-$diainiciot";
	
	
	$datainiciotrabalho_d2 = $_POST['datainiciotrabalho2'];
	
	$datadoiniciodotrabalho2 = $datainiciotrabalho_d2;

	$datainciot22 = explode("-", $datadoiniciodotrabalho2);

	$diainiciot2 = $datainciot22[0];

	$mesiniciot2 = $datainciot22[1];

	$anoiniciot2 = $datainciot22[2];
	
	$datainiciotrabalho2 = "$anoiniciot2-$mesiniciot2-$diainiciot2";
	
	
	if($datainiciotrabalho<>$datainiciotrabalho2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Data inicio trabalho','$datainiciotrabalho2','$datainiciotrabalho','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	//--------------
	
	$datadocontrato = $_POST['datacontrato'];

	$datadocontrato2 = explode("-", $datadocontrato);

	$diainicioc = $datadocontrato2[0];

	$mesinicioc = $datadocontrato2[1];

	$anoinicioc = $datadocontrato2[2];
	
	$datacontrato = "$anoinicioc-$mesinicioc-$diainicioc";
	
	
	$datadocontrato2 = $_POST['datacontrato2'];

	$datadocontrato22 = explode("-", $datadocontrato2);

	$diainicioc2 = $datadocontrato22[0];

	$mesinicioc2 = $datadocontrato22[1];

	$anoinicioc2 = $datadocontrato22[2];
	
	$datacontrato2 = "$anoinicioc2-$mesinicioc2-$diainicioc2";
	
	
	if($datacontrato<>$datacontrato2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Data contrato','$datacontrato2','$datacontrato','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	//--------------
	
$localizacao = $_POST['localizacao'];
	$localizacao2 = $_POST['localizacao2'];
	
	if($localizacao<>$localizacao2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Localizacao','$localizacao2','$localizacao','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$fornecedor = $_POST['fornecedor'];
	$fornecedor2 = $_POST['fornecedor2'];
	
	if($fornecedor<>$fornecedor2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Fornecedor','$fornecedor2','$fornecedor','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
$obs_veiculo = $_POST['obs_veiculo'];
	$obs_veiculo2 = $_POST['obs_veiculo2'];
	
	if($obs_veiculo<>$obs_veiculo2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Obs veiculo','$obs_veiculo2','$obs_veiculo','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
	$rdo_ordem = $_POST['rdo_ordem'];
		$rdo_ordem2 = $_POST['rdo_ordem2'];
	
	if($rdo_ordem<>$rdo_ordem2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','RDO(Ordem)','$rdo_ordem2','$rdo_ordem','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
	$num_contrato = $_POST['num_contrato'];
		$num_contrato2 = $_POST['num_contrato2'];
	
	if($num_contrato<>$num_contrato2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Num contrato','$num_contrato2','$num_contrato','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
	$valormensal = $_POST['valormensal'];
		$valormensal2 = $_POST['valormensal2'];
	
	if($valormensal<>$valormensal2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Valor mensal','$valormensal2','$valormensal','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);

}
	
	
	$mobilizado = $_POST['mobilizado'];
		$mobilizado2 = $_POST['mobilizado2'];
	
	if($mobilizado<>$mobilizado2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador,placa)
values('$codigointerno','Mobilizado','$mobilizado2','$mobilizado','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou','$placa')";
mysql_query($comando,$conexao);
		
		
if($mobilizado=="sim"){
	
//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
$sql1 = "SELECT * FROM operadores where estab_pertence = '$estab_pertence' and funcao = 'ADMINISTRATIVO'";
$res1 = mysql_query($sql1);
while($linha=mysql_fetch_row($res1)) {
	
$nome_administrativo = $linha[1];

$email_administrativo = $linha[20];
	

	$email_dest   =   "$email_administrativo";
	
	$mensagem_do_email = "Placa $placa MOBILIZAÇÃO OCORRIDA";
	
	//PREPARA O PEDIDO
	
	$mens  .=  "$mensagem_do_email \n";
	



$mens  .=  $to = "$email_dest";
$from = "$email_operador";
$subject = "Placa $placa MOBILIZAÇÃO OCORRIDA";
$html = "
<html>
<body>
Olá $nome_administrativo <br><b>Placa $placa MOBILIZAÇÃO OCORRIDA<br><br>

Placa: $placa<br>
Data: $dataalteracao<br>
Hora: $horaalteracao<br>
Comentario: $obs_veiculo<br>
Operador: $operador<br>


</body>
</html>";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $from \r\n";

if (mail($to, $subject, $html, $headers)) {
//echo "Email enviado com sucesso !";
} else {
//echo "Ocorreu um erro durante o envio do email.";
}
	
}//fim do poop de envio dos emails
	
	
}//FIM SE FOR MOBILIZADO
		
if($mobilizado=="nao"){
	
//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
$sql1 = "SELECT * FROM operadores where estab_pertence = '$estab_pertence' and funcao = 'ADMINISTRATIVO'";
$res1 = mysql_query($sql1);
while($linha=mysql_fetch_row($res1)) {
	
$nome_administrativo = $linha[1];

$email_administrativo = $linha[20];
	

	$email_dest   =   "$email_administrativo";
	
	$mensagem_do_email = "Placa $placa ATENÇÃO DESMOBILIZAÇÃO OCORRIDA";
	
	//PREPARA O PEDIDO
	
	$mens  .=  "$mensagem_do_email \n";
	



$mens  .=  $to = "$email_dest";
$from = "$email_operador";
$subject = "Placa $placa ATENÇÃO DESMOBILIZAÇÃO OCORRIDA";
$html = "
<html>
<body>
Olá $nome_administrativo <br><b>Placa $placa ATENÇÃO DESMOBILIZAÇÃO OCORRIDA<br><br>

Placa: $placa<br>
Data: $dataalteracao<br>
Hora: $horaalteracao<br>
Comentario: $obs_veiculo<br>
Operador: $operador<br>


</body>
</html>";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $from \r\n";

if (mail($to, $subject, $html, $headers)) {
//echo "Email enviado com sucesso !";
} else {
//echo "Ocorreu um erro durante o envio do email.";
}
	
}//fim do poop de envio dos emails
	
}//FIM SE FOR DESMOBILIZADO
		


}
	

		
	
	$rdo = $_POST['rdo'];
	$rdo2 = $_POST['rdo2'];
	
	
	
	if($rdo<>$rdo2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador)
values('$codigointerno','RDO','$rdo2','$rdo','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou')";
mysql_query($comando,$conexao);

}


$texto = "https://www.fluxocar.com.br/buscainformacoes.php?placa=$placa";
	$texto2 = "https://www.fluxocar.com.br/buscainformacoes.php?placa=$placa2";
	
	if($texto<>$texto2){
	
$comando = "insert into veiculos_alteracoes(codigointerno,campoalterado,antes,depois,datealteracao,horaalteracao,operador,emailoperador,teloperador)
values('$codigointerno','Link','$texto2','$texto','$dataalteracao','$horaalteracao','$operador_alterou','$emailoperador_alterou','$teloperador_alterou')";
mysql_query($comando,$conexao);

}
	



$comando = "update `$db`.`veiculos` set `veiculo` = '$veiculo',`ano` = '$ano',`modelo` = '$modelo',`placa` = '$placa',`placa2` = '$placa2',`chassi` = '$chassi',`renavam` = '$renavam',`corveiculo` = '$corveiculo',`tipoveiculo` = '$tipoveiculo',`status` = '$status',`numeroveiculo` = '$numeroveiculo',`km` = '$km',`horimetro` = '$horimetro',`valormanutencao` = '$valormanutencao',`datachegada` = '$datachegada',`datavistoriawpx` = '$datavistoriawpx',`datavistoriacc` = '$datavistoriacc',`datainiciotrabalho` = '$datainiciotrabalho',`localizacao` = '$localizacao',`fornecedor` = '$fornecedor',`obs_veiculo` = '$obs_veiculo',`url` = '$texto',`rdo_ordem` = '$rdo_ordem',`num_contrato` = '$num_contrato',`datacontrato` = '$datacontrato',`valormensal` = '$valormensal',`mobilizado` = '$mobilizado',`obra` = '$obra',`prefixo` = '$prefixo',`rdo` = '$rdo' where `veiculos`. `codigo` = '$codigo' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do veículo!");


echo "Dados do veículo alterados com sucesso! <br>";
	
	
if( ($mobilizado2=="sim") && ($mobilizado=="nao") ){
	  
$comando = "update `$db`.`veiculos` set `gerar_rdo_ate_essa_data` = '$datafinal_do_periodo_atual_do_rdo' where `veiculos`. `codigo` = '$codigo_veiculo'";
mysql_query($comando,$conexao);
	
}
else{

$comando = "update `$db`.`veiculos` set `gerar_rdo_ate_essa_data` = '0000-00-00' where `veiculos`. `codigo` = '$codigo_veiculo'";
mysql_query($comando,$conexao);
		
	}
	

	
$comando = "update `$db`.`rdo` set `tipo` = '$tipoveiculo' where `rdo`. `placa` = '$placa'";
mysql_query($comando,$conexao);

$comando = "update `$db`.`rdo` set `tipo` = '$tipoveiculo',`placa` = '$placa' where `rdo`. `placa` = '$placa2'";
mysql_query($comando,$conexao);
	
	
$sql = "SELECT * FROM ocorrencias where placa = '$placa2'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$link_nf_antigo = $linha[23];
	

$string = "$link_nf_antigo";
$stringCorrigida = str_replace("$placa2", "$placa", $string);


	$comando = "update `$db`.`ocorrencias` set `placa` = '$placa',`placa2` = '$placa2',`chassi` = '$chassi',`renavam` = '$renavam',`link_nf` = '$stringCorrigida' where `ocorrencias`. `placa` = '$placa2'";
mysql_query($comando,$conexao);
	
}
	
if (!file_exists($placa)){

mkdir ("../../$placa", 0755);

	
	}
	
	

?>

<?
$sql = "SELECT * FROM veiculos where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$datacadastro = $linha[1];
$horacadastro = $linha[2];
$concessionaria = $linha[10];
$cnpj_concessionaria = $linha[11];
$tel_concessionaria = $linha[12];
$email_concessionaria = $linha[13];
$cidade_concessionaria = $linha[14];
$estado_concessionaria = $linha[15];
$veiculo = $linha[16];
$ano = $linha[17];
$modelo = $linha[18];
$chassi = $linha[19];
$renavam = $linha[20];
$placa = $linha[21];
$obs_veiculo = $linha[22];
$dia_inicio_contrato = $linha[23];
$mes_inicio_contrato = $linha[24];
$ano_inicio_contrato = $linha[25];
$dia_termino_contrato = $linha[26];
$mes_termino_contrato = $linha[27];
$ano_termino_contrato = $linha[28];
$nome = $linha[29];
$alcunha = $linha[30];
$data_nasc = $linha[31];
$mes_nasc = $linha[32];
$sexo = $linha[33];
$estadocivil = $linha[34];
$cpf = $linha[35];
$rg = $linha[36];
$orgao = $linha[37];
$emissao = $linha[38];
$pai = $linha[39];
$mae = $linha[40];
$endereco = $linha[41];
$numero = $linha[42];
$bairro = $linha[43];
$complemento = $linha[44];
$cidade = $linha[45];
$estado = $linha[46];
$cep = $linha[47];
$telefone = $linha[48];
$celular = $linha[49];
$email = $linha[50];
$obs = $linha[51];
$data_comunicado = $linha[52];
$hora_comunicado = $linha[53];
$operador_comunicou = $linha[54];
$cel_operador_comunicou = $linha[55];
$emailoperador_alterou = $linha[56];
$estabelecimento_comunicou = $linha[57];
$cidade_estabelecimento_comunicou = $linha[58];
$tel_estabelecimento_comunicou = $linha[59];
$email_estabelecimento_comunicou = $linha[60];
$url = $linha[66];
	
}
?>


<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];

}
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_empresa;
	
	//PREPARA O PEDIDO
	$mens   =  "Olá! Comunicado de venda efetuado na $nfantasia!   \n";
	$mens  .=  "Visite-nos $site \n\n";
	
	
	$mens  .=  "Data do comunicado: ".$data_comunicado."                                                    \n";
	$mens  .=  "Hora do comunicado: ".$hora_comunicado."                                                    \n";
	$mens  .=  "Concessionária: ".$concessionaria."                                                       \n";
	$mens  .=  "CNPJ: ".$cnpj_concessionaria."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_concessionaria."                                                    \n";
	$mens  .=  "Estado: ".$estado_concessionaria."                                                    \n";
	$mens  .=  "Telefone: ".$tel_concessionaria."                                                    \n";
	$mens  .=  "E-Mail: ".$email_concessionaria."                                                    \n\n";
	
	$mens  .=  "Veículo: ".$veiculo."                                                    \n";
	$mens  .=  "Ano: ".$ano."                                                    \n";
	$mens  .=  "Modelo: ".$modelo."                                                    \n";
	$mens  .=  "Chassi: ".$chassi."                                                    \n";
	$mens  .=  "Renavam: ".$renavam."                                                    \n";
	$mens  .=  "Placas: ".$placa."                                                    \n";
	$mens  .=  "Observações: ".$obs_veiculo."                                                    \n\n";
	
	$mens  .=  "Cliente: ".$nome."                                                    \n";
	$mens  .=  "Cidade: ".$cidade."                                                    \n";
	$mens  .=  "Endereço: ".$endereco."                                                    \n";
	$mens  .=  "Número: ".$numero."                                                    \n";
	$mens  .=  "Bairro: ".$bairro."                                                    \n";
	$mens  .=  "CEP: ".$cep."                                                    \n";
	$mens  .=  "Telefone: ".$telefone."                                                    \n";
	$mens  .=  "Celular: ".$celular."                                                    \n";
	$mens  .=  "Observações: ".$obs."                                                    \n\n";
	
	$mens  .=  "Operador que efetuou o comunicado: ".$operador_comunicou."                                                    \n";
	$mens  .=  "Celular: ".$cel_operador_comunicou."                                                    \n";
	$mens  .=  "E-Mail: ".$emailoperador_comunicou."                                                    \n";
	$mens  .=  "Estabelecimento: ".$estabelecimento_comunicou."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento_comunicou."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento_comunicou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento_comunicou."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Comunicado de venda realizado no sistema em ".$data_comunicado, $mens,"From:".$email_dest."\r\nBcc:".$email);

?>


<body>
<table width="100%" border="0" align="center">
  <tbody>
    <tr>
      <td width="30%"><form name="form1" method="post" action="pesquisa.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type=image src='../../imagens/botoes/voltar.png' width='100' height='100' name="Submit3" value="Voltar">
        <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      </form></td>
      <td width="36%" align="center">
		  <?
			$aux = '../../qrcode/qr_img0.50j/php/qr_img.php?';
			$aux .= "d=$url&";
			$aux .= 'e=H&';
			$aux .= 's=4&';
			$aux .= 't=J';
		?>
      <div style="float: left; border: 1px solid #000;"> <img src="<?php echo $aux; ?>"><br><? echo "$veiculo<br>$placa"; ?></div></td>
      <td width="34%"><form action="etiqueta_pasta.php" method="post" name="form1" target="_blank">
        <div align="center">
          <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
          <? echo "<input class='class01' type=image src='../../imagens/botoes/etiqueta.png' width='100' height='100' name='Submit' value='Etiqueta'>";  ?></div>
      </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form action="editar_veiculo.php" method="post" name="form1">
        <div align="center">
          <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
          <? echo "<input class='class01' type=image src='../../imagens/botoes/editar.png' width='100' height='100' name='Submit' value='Continuar Editando'>"; echo "$operador $emailoperador"; ?> 
        </div>
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?
mysql_close($conexao);
?>
