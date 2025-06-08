<?php
session_start(); //inicia sessão...
if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.

else //se não for...
header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');
?>

<?
require '../../conect/conect.php';
include '../../css_menus/modal.css';

?>

<style type="text/css">
.class01 {    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}
</style>
<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

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

//$localizacao = $_POST['localizacao'];
$senha = $_SESSION['senha'];

$solicitacao = $_POST['solicitacao'];
$solicitacaodecomentario = $_POST['solicitacaodecomentario'];


?>

<?
$sql1 = "SELECT * FROM operadores where senha = '$senha'";
$res1 = mysql_query($sql1);
while($linha=mysql_fetch_row($res1)) {

$operador = $linha[1];
	
$cel_operador = $linha[19];
	
	$email_operador = $linha[20];

$estab_pertence = $linha[44];
$fornecedor = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];
	
$cidadeatuacao = $linha[48];
	
$recebenotificacao_para_si_proprio = $linha[53];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];
$rdo_autorizado = $linha[58];
$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$fornecedores = $linha[66];
$alimentacao_rdo_autorizado = $linha[70];

}


	
	
$sql1 = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence' limit 1";
$res1 = mysql_query($sql1);
while($linha=mysql_fetch_row($res1)) {

$email_empresa = $linha[14];
	
}

//-----------

$localizacaoinformada = $_POST['localizacao'];

if(empty($localizacaoinformada)){
$localizacao = $cidadeatuacao;
}
else{
$localizacao = $localizacaoinformada;
}

//---------

$obrainformada = $_POST['obra'];

if(empty($obrainformada)){
$obra = "";
}
else{
$obra = $obrainformada;
}

//---------
$data_de_hoje = date('Y-m-d');

$data_informada = $_POST['data_informada'];

$data2 = explode("-", $data_informada);


$anoinformado = $data2[0];

$mesinformado = $data2[1];

$diainformado = $data2[2];
//---------

//$diainformado = $_POST['dia'];

if(empty($diainformado)){
$dia = date('d');
}
else{
$dia = $diainformado;
}

//----------

//$mesinformado = $_POST['mes'];

if(empty($mesinformado)){
$mes = date('m');
}
else{
$mes = $mesinformado;
}

//----------

//$anoinformado = $_POST['ano'];

if(empty($anoinformado)){
$ano = date('Y');
}
else{
$ano = $anoinformado;
}

$ano_anterior = bcsub($ano,1);
$ano_posterior = bcadd($ano,1);

$data = "$ano-$mes-$dia";

$hora = date('H:i:s');


//----------

?>

<?
$codigo_do_rdo_para_horas_manutencao = $_POST['codigo_do_rdo_para_horas_manutencao'];
$situacao = $_POST['situacao'];

$datainformada = "$ano-$mes-$dia";


$data_resgatar_dia_semana = date("w", strtotime("$datainformada"));

if($data_resgatar_dia_semana==0){
	$diasemana = "Domingo";
}
if($data_resgatar_dia_semana==1){
	$diasemana = "Segunda";
}
if($data_resgatar_dia_semana==2){
	$diasemana = "Terca";
}
if($data_resgatar_dia_semana==3){
	$diasemana = "Quarta";
}
if($data_resgatar_dia_semana==4){
	$diasemana = "Quinta";
}
if($data_resgatar_dia_semana==5){
	$diasemana = "Sexta";
}
if($data_resgatar_dia_semana==6){
	$diasemana = "Sabado";
}


echo "Dia da semana $diasemana<br>";



?>


<?

$sql2 = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and operador = '$operador' group by data order by data desc limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$dia_rdo = $linha[14];
$mes_rdo = $linha[15];
$ano_rdo = $linha[16];
	
}

$data_umltimo_registro = "$ano_rdo-$mes_rdo-$dia_rdo";
	  


if($solicitacao=="filtrar"){
	
	

$sql = "SELECT * FROM veiculos where localizacao = '$localizacao' and rdo = 'sim' and mobilizado = 'sim'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigointerno = $linha[0];
$concessionaria = $linha[10];
$veiculo = $linha[16];
$placa = $linha[21];
	$tipodoveiculo = $linha[67];
$localizacao_do_veiculo = $linha[76];
$obra = $linha[108];
$prefixo = $linha[109];
$rdo = $linha[110];

	
$sql20 = "SELECT * FROM rdo where placa = '$placa' and data = '$data_informada' and localizacao = '$localizacao_do_veiculo' order by data desc";
$res20 = mysql_query($sql20);
$registros_rdo_lancamento = mysql_num_rows($res20);
	
//$sql12 = "SELECT * FROM rdo where placa = '$placa' and data = '$data_informada' and localizacao <> '$localizacao_do_veiculo' order by data desc";
//$res12 = mysql_query($sql12);
//$registros_rdo_lancamento_localidade_diferente = mysql_num_rows($res12);
	
//if( ($registros_rdo_lancamento<=0) && ($registros_rdo_lancamento_localidade_diferente<=0) ){
	
if($alimentacao_rdo_autorizado=="sim"){
	
	if($registros_rdo_lancamento<=0){
		
		

		
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','$operador','$ordem','$contrato','$placa','$veiculo','$tipodoveiculo','$dataentrega','-','$obs','$data_informada','$diasemana','$dia','$mes','$ano','$hora','$valormensal','$total','$obra','$prefixo','$localizacao_do_veiculo','$rdo')";

mysql_query($comando,$conexao);
	

	
}
else{
	
	
$sql11 = "SELECT * FROM rdo where placa = '$placa' and data = '$data_informada'and localizacao = '$localizacao' and operador = 'LANCAMENTO AUTOMATICO' order by data desc limit 1";
$res11 = mysql_query($sql11);
$registros_rdo_lancamento_em_branco = mysql_num_rows($res11);
	while($linha=mysql_fetch_row($res11)) {
		$codigordo = $linha[0];
	}
	
if($registros_rdo_lancamento_em_branco>=1){
	
	
	
$comando = "update `$db`.`rdo` set `situacao` = '-',`operador` = '$operador',`hora` = '$hora' where `rdo`. `codigo` = '$codigordo'";
mysql_query($comando,$conexao);
	
}
	
}
	
}
	
}//FIM DO WHILE VEICULOS
	
	
}//fim se solicitação for filtrar
?>


<?
								if($solicitacaodecomentario=="inserircomentario"){
									
		
		$calcularhorasdemanutencao = $_POST['calcularhorasdemanutencao'];
		$codigointernocomentario = $_POST['codigointerno'];
		$codigo_do_rdo_para_horas_manutencao = $_POST['codigo_do_rdo_para_horas_manutencao'];
		$comentario_inserido = $_POST['comentario_inserido'];
		$situacao_antes = $_POST['situacao_antes'];
		$situacao_depois = $_POST['situacao_depois'];
		$tipomanutencao = $_POST['tipomanutencao'];
		$km_atual = $_POST['km_atual'];
		$horimetro_atual = $_POST['horimetro_atual'];
		$data_informada = $_POST['data_informada'];
		$horas_informadas_na_manutencao = $_POST['horas_manutencao'];
									
		$datacomentario = $data_informada;
	    $horacomentario = date('H:i:s');
			

							if($calcularhorasdemanutencao=="s"){
									
	if((empty($horas_informadas_na_manutencao)) or ($horas_informadas_na_manutencao=="0.00") ){
		
		$horas_manutencao = "9.00";
	}
	else{
		$horas_manutencao = $horas_informadas_na_manutencao;
	}
								
							}
							else{
								
								$horas_manutencao = "0.00";
								
$comando = "update `$db`.`rdo_comentarios` set `horas_manutencao` = '0.00' where `rdo_comentarios`. `datacomentario` = '$datacomentario'";
mysql_query($comando,$conexao);
								
							}
									
		
	
									
$sql2 = "SELECT * FROM veiculos where codigo = '$codigointernocomentario'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$codigointerno = $linha[0];

$concessionaria = $linha[10];

$cnpj_concessionaria = $linha[11];

$tel_concessionaria = $linha[12];

$email_concessionaria = $linha[13];

$cidade_concessionaria = $linha[14];

$estado_concessionaria = $linha[15];

$veiculo = $linha[16];

$anoveiculo = $linha[17];

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

$corveiculo = $linha[30];

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

$status = $linha[61];

$tipoveiculo = $linha[67];
	
$numeroveiculo = $linha[68];
	
$km = $linha[69];
	
$horimetro = $linha[70];
	
$valormanutencao = $linha[71];
	
$fornecedor_veiculo = $linha[77];

}
	
$sql3 = "SELECT * FROM rdo where codigointerno = '$codigointernocomentario' and data = '$data_informada'";
$res3 = mysql_query($sql3);
$registros_rdo = mysql_num_rows($res3);
while($linha=mysql_fetch_row($res3)) {

$codigordo = $linha[0];
$datainformacao_rdo = $linha[12];
	
	$situacao_depois = $linha[10];
	$situacao_antes = $linha[20];
	$data_antes = $linha[12];
	$hora_antes = $linha[17];
	$autor_antes = $linha[3];
	
}
									
									
$sql5 = "SELECT * FROM rdo_comentarios where datainformacao_rdo = '$data_informada' and placa = '$placa' order by codigo desc limit 1";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {


$comentario_antes = $linha[7];

}
									
									
$sql7 = "SELECT * FROM ocorrencias where placa = '$placa' and statusocorrencia = 'aberta' order by datamanutencao desc limit 1";
$res7 = mysql_query($sql7);
$quant_ocorrencia_aberta = mysql_num_rows($res7);
									
									
if($quant_ocorrencia_aberta>=1){
	
$sql8 = "SELECT * FROM ocorrencias where placa = '$placa' and statusocorrencia = 'aberta' order by datamanutencao desc limit 1";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {

$ultimo_cod_ocorrencia = $linha[0];
$data_que_a_manutencao_foi_executada = $linha[6];
	
}
	
$numero_manutencao = $ultimo_cod_ocorrencia;

								
		
									
if (!file_exists($diretorio)){

mkdir ("../../$placa/$data_que_a_manutencao_foi_executada", 0755);
	
	}
	
if (!file_exists($diretorio)){

mkdir ("../../$placa/$data_que_a_manutencao_foi_executada/$numero_manutencao", 0755);
	
	}
									
$foto = $_FILES['foto']['name'];
	
$uploaddir = "../../$placa/$data_que_a_manutencao_foi_executada/$numero_manutencao/";
$uploadfile = $uploaddir. $_FILES['foto']['name'];


	if (
move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir.$_FILES['foto']['name'])) {
  echo " NF enviada com sucesso! ";
} else {
  //echo " NF não foi enviada!";
}
	
									if(empty($foto)){
$link_nf = "";
									}
									else{
$link_nf = "http://www.digicompras.com.br/fluxocar/$placa/$data_que_a_manutencao_foi_executada/$numero_manutencao/$foto";
									}
	
$comando = "insert into rdo_comentarios(codigointerno,autor,placa,datainformacao_rdo,datacomentario,horacomentario,comentario,tipomanutencao,numero_manutencao,link_nf,localizacao,horimetro_atual,km_atual,horas_manutencao) 

values('$codigointerno','$operador','$placa','$datainformacao_rdo','$datacomentario','$horacomentario','Situacao antes: ($situacao_antes) | Situacao Atual: ($situacao_depois) | Comentario: $comentario_inserido','$tipomanutencao','$numero_manutencao','$link_nf','$localizacao','$horimetro_atual','$km_atual','$horas_manutencao')";
mysql_query($comando,$conexao);
		
		

	
	
$comando = "insert into nfs_manutencao(cod_ocorrencia,nf,fornecedor,veiculo,placa,chassi,renavam,datamanutencao,link_nf,valormanutencao,obs_adicional_da_manutencao,data_adicional,hora_adicional,operador_informante,horimetro_atual,comentario_inserido,km_atual,horas_manutencao) 

values('$ultimo_cod_ocorrencia','$datacomentario $horacomentario','$fornecedor_veiculo','$veiculo','$placa','$chassi','$renavam','$datacomentario','$link_nf','$valor_da_manutencao','$comentario','$datacomentario','$horacomentario','$operador','$horimetro_atual','$comentario_inserido','$km_atual','$horas_manutencao')";
mysql_query($comando,$conexao);
	
									
									
$dataalteracao = date('Y-m-d');
$horaalteracao = date('H:i:s');

	

	
$comando = "insert into rdo_alteracoes(cod_lancamento_rdo,concessionaria,placa,situacao_antes,data_antes,hora_antes,autor_antes,comentario_antes,situacao_depois,data_depois,hora_depois,autor_depois,dataalteracao,horaalteracao,horimetro_atual,comentario_inserido,km_atual,horas_manutencao) 

values('$codigordo','$concessionaria','$placa','$situacao_antes','$data_antes','$hora_antes','$autor_antes','$comentario_antes','$situacao_depois','$data_informada','$hora','$operador','$dataalteracao','$horaalteracao','$horimetro_atual','$comentario_inserido','$km_atual','$horas_manutencao')";

mysql_query($comando,$conexao) or die("Erro ao registrar RDO do veiculo 1");
	
	
	

		
		echo "Comentario registrado com sucesso!!!... - $data_que_a_manutencao_foi_executada - $numero_manutencao - $comentario_inserido";
									
									
if($situacao=="M"){
		
$comando = "update `$db`.`rdo` set `horas_manutencao` = '$horas_manutencao',`horimetro_atual` = '$horimetro_atual',`km_atual` = '$km_atual' where `rdo`. `codigo` = '$codigo_do_rdo_para_horas_manutencao' limit 1 ";
mysql_query($comando,$conexao);
		
}
	
	
}//FIM SE TIVER OCORRENCIA ABERTA
else{
	

	
$comando = "insert into ocorrencias(datamanutencao,horamanutencao,concessionaria,municipio,tipomanutencao,detalhamento,placa,renavam,chassi,condutor,agente,corveiculo,horimetro,km,valormanutencao,descontar,veiculo,tipoveiculo,numeroveiculo,localizacao,fornecedor,nf,link_nf,operador,reembolso,statusocorrencia,horas_manutencao) 

values('$datacomentario','$horacomentario','$concessionaria','$cidade_concessionaria','$tipomanutencao','$comentario','$placa','$renavam','$chassi','$condutor','$agente','$corveiculo','$horimetro_atual','$km_atual','$valormanutencao','$descontar','$veiculo','$tipoveiculo','$numeroveiculo','$localizacao','$fornecedor','$datacomentario $horacomentario','$link_nf','$operador','$reembolso','aberta','$horas_manutencao')";
mysql_query($comando,$conexao);
	
	
$sql9 = "SELECT * FROM ocorrencias where placa = '$placa' and statusocorrencia = 'aberta' order by datamanutencao desc limit 1";
$res9 = mysql_query($sql9);
while($linha=mysql_fetch_row($res9)) {

$ultimo_cod_ocorrencia = $linha[0];
$data_que_a_manutencao_foi_executada = $linha[6];
	
}
	
$numero_manutencao = $ultimo_cod_ocorrencia;
	
	
if (!file_exists($diretorio)){

mkdir ("../../$placa/$data_que_a_manutencao_foi_executada", 0755);
	
	}
	
if (!file_exists($diretorio)){

mkdir ("../../$placa/$data_que_a_manutencao_foi_executada/$numero_manutencao", 0755);
	
	}
									
$foto = $_FILES['foto']['name'];
	
$uploaddir = "../../$placa/$data_que_a_manutencao_foi_executada/$numero_manutencao/";
$uploadfile = $uploaddir. $_FILES['foto']['name'];


	if (
move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir.$_FILES['foto']['name'])) {
  echo " NF enviada com sucesso! ";
} else {
  //echo " NF não foi enviada!";
}
	
									if(empty($foto)){
$link_nf = "";
									}
									else{
$link_nf = "http://www.digicompras.com.br/fluxocar/$placa/$data_que_a_manutencao_foi_executada/$numero_manutencao/$foto";
										
										
$comando = "update `$db`.`ocorrencias` set `link_nf` = '$link_nf' where `ocorrencias`. `codigo` = '$numero_manutencao' limit 1 ";
mysql_query($comando,$conexao);
									}
	
		
$comando = "insert into rdo_comentarios(codigointerno,autor,placa,datainformacao_rdo,datacomentario,horacomentario,comentario,tipomanutencao,numero_manutencao,link_nf,localizacao,horimetro_atual,km_atual,horas_manutencao) 

values('$codigointerno','$operador','$placa','$datainformacao_rdo','$datacomentario','$horacomentario','Situacao antes: ($situacao_antes) | Situacao Atual: ($situacao_depois) | Comentario: $comentario_inserido','$tipomanutencao','$numero_manutencao','$link_nf','$localizacao','$horimetro_atual','$km_atual','$horas_manutencao')";

mysql_query($comando,$conexao);
	
	
$sql3 = "SELECT * FROM rdo where codigointerno = '$codigointernocomentario' and data = '$data_informada'";
$res3 = mysql_query($sql3);
$registros_rdo = mysql_num_rows($res3);
while($linha=mysql_fetch_row($res3)) {

$codigordo = $linha[0];
	
}
	
	
	if($ituacao=="M"){
		
$comando = "update `$db`.`rdo` set `horas_manutencao` = '$horas_manutencao',`horimetro_atual` = '$horimetro_atual',`km_atual` = '$km_atual' where `rdo`. `codigo` = '$codigo_do_rdo_para_horas_manutencao' limit 1 ";
mysql_query($comando,$conexao);
		
	}
	
	
}

									

									
									
//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
$sql1 = "SELECT * FROM operadores where estab_pertence = '$estab_pertence' and recebenotificacao = 'sim'";
$res1 = mysql_query($sql1);
while($linha=mysql_fetch_row($res1)) {
	
$nome_administrativo = $linha[1];

$email_administrativo = $linha[20];
	

	$email_dest   =   "$email_administrativo";
	
	$mensagem_do_email = "Placa $placa de $localizacao Comentário realizado no RDO";
	
	//PREPARA O PEDIDO
	
	$mens  .=  "$mensagem_do_email \n";
	



$mens  .=  $to = "$email_dest";
$from = "$email_operador";
$subject = "Placa $placa de $localizacao Comentário realizado no RDO";
$html = "
<html>
<body>
Olá $nome_administrativo <br><b>Placa $placa de $localizacao Comentário realizado no RDO<br>
Situacao Antes: ($situacao_antes) Data Antes: $data_antes Hora Antes: $hora_antes
<br>
Situacao Atual: ($situacao_depois) Data Atual: $data Hora Atual: $hora<b>!<br><br>

Nº Manutenção: $ultimo_cod_ocorrencia<br><br>

Placa: $placa de $localizacao<br>
Horimetro: $horimetro_atual<br>
Data Comentario: $data<br>
Hora Comentario: $horacomentario<br>
Comentario: $comentario_inserido<br>
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
									
//------------ENVIANDO EMAIL AO OPERADOR---------
									
if($recebenotificacao_para_si_proprio=="sim"){
									
	$email_dest   =   "$email_operador";
	
	$mensagem_do_email = "Placa $placa de $localizacao Comentário realizado no RDO";
	
	//PREPARA O PEDIDO
	
	$mens  .=  "$mensagem_do_email \n";
	



$mens  .=  $to = "$email_dest";
$from = "$email_operador";
$subject = "Placa $placa de $localizacao Comentário realizado no RDO";
$html = "
<html>
<body>
Olá $operador <br><b>Placa $placa de $localizacao Comentário realizado no RDO<br>
Situacao Antes: ($situacao_antes) Data Antes: $data_antes Hora Antes: $hora_antes
<br>
Situacao Atual: ($situacao_depois) Data Atual: $data_informada Hora Atual: $hora<b>!<br><br>

Nº Manutenção: $ultimo_cod_ocorrencia<br><br>

Placa: $placa de $localizacao<br>
Horimetro: $horimetro_atual<br>
Data Comentario: $data_informada<br>
Hora Comentario: $horacomentario<br>
Comentario: $comentario_inserido<br>
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
								
}
									
//----------FIM DO ENVIO DE EMAIL AO OPERADOR--------------
									
	}//fim se solicitacão for inserir comentario

?>


<?
if($solicitacao=="gravarsituacao"){
	
$codigointerno = $_POST['codigointerno'];
	$situacao_antes = $_POST['situacao_antes'];
$situacao = $_POST['situacao'];
	//$data_informada = $_POST['data'];
	
	
$sql2 = "SELECT * FROM veiculos where codigo = '$codigointerno'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$codigointerno = $linha[0];

$concessionaria = $linha[10];

$cnpj_concessionaria = $linha[11];

$tel_concessionaria = $linha[12];

$email_concessionaria = $linha[13];

$cidade_concessionaria = $linha[14];

$estado_concessionaria = $linha[15];

$veiculo = $linha[16];

$anoveiculo = $linha[17];

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

$corveiculo = $linha[30];

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

$status = $linha[61];

$tipoveiculo = $linha[67];
	
$numeroveiculo = $linha[68];
	
$km = $linha[69];
	
$horimetro = $linha[70];
	
$valormanutencao = $linha[71];
	
$localizacao_do_veiculo = $linha[76];

}
	
$sql3 = "SELECT * FROM rdo where codigointerno = '$codigointerno' and data = '$data_informada' and localizacao = '$localizacao_do_veiculo'";
$res3 = mysql_query($sql3);
$registros_rdo = mysql_num_rows($res3);
while($linha=mysql_fetch_row($res3)) {

$codigordo = $linha[0];
	//$situacao_antes = $linha[10];
	$data_antes = $linha[12];
	$hora_antes = $linha[17];
	$autor_antes = $linha[3];
	
	
}
	
if($registros_rdo<=0){
	
	
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,localizacao) 

values('$codigointerno','$concessionaria','$operador','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','$situacao','$obs','$data_informada','$diasemana','$dia','$mes','$ano','$hora','$valormensal','$total','$situacao_antes','$localizacao_do_veiculo')";

mysql_query($comando,$conexao) or die("Erro ao registrar RDO do veiculo - insert $registros_rdo - $data_informada");

	
}
else{
	
	
$comando = "update `$db`.`rdo` set `situacao_antes` = '$situacao_antes',`situacao` = '$situacao' where `rdo`. `codigo` = '$codigordo' limit 1 ";
mysql_query($comando,$conexao);
	
	
if($situacao=="1"){
	
$sql3 = "SELECT * FROM rdo where codigointerno = '$codigointerno' and data = '$data_informada' and localizacao = '$localizacao_do_veiculo' order by data desc limit 1";
$res3 = mysql_query($sql3);
$registros_rdo = mysql_num_rows($res3);
while($linha=mysql_fetch_row($res3)) {

$codigordo = $linha[0];
	$situacao_antes = $linha[20];
	$situacao_depois = $linha[10];
	$data_antes = $linha[12];
	$hora_antes = $linha[17];
	$autor_antes = $linha[3];
	$localizacao_do_veiculo_no_rdo = $linha[23];
	
}
	
$datacomentario = $data_informada;
$horacomentario = date('H:i:s');
	
								
									
$dataalteracao = date('Y-m-d');
$horaalteracao = date('H:i:s');
	
	
$comando = "insert into rdo_alteracoes(cod_lancamento_rdo,concessionaria,placa,situacao_antes,data_antes,hora_antes,autor_antes,comentario_antes,situacao_depois,data_depois,hora_depois,autor_depois,dataalteracao,horaalteracao,horimetro_atual,comentario_inserido,km_atual,horas_manutencao) 

values('$codigordo','$concessionaria','$placa','$situacao_antes','$data_antes','$hora_antes','$autor_antes','$comentario_antes','$situacao_depois','$data_informada','$hora','$operador','$dataalteracao','$horaalteracao','$horimetro_atual','Em Operacao $comentario_inserido','$km_atual','$horas_manutencao')";

mysql_query($comando,$conexao) or die("Erro ao registrar RDO do veiculo 3");
	
	
	
$sql9 = "SELECT * FROM ocorrencias where placa = '$placa' and statusocorrencia = 'aberta' order by datamanutencao desc limit 1";
$res9 = mysql_query($sql9);
	$registros_ocorrencias_abertas = mysql_num_rows($res9);
while($linha=mysql_fetch_row($res9)) {

$ultimo_cod_ocorrencia = $linha[0];
$data_que_a_manutencao_foi_executada = $linha[6];
$tipomanutencao = $linha[9];
$horimetro = $linha[13];
$km = $linha[14];
	
}
	
$numero_manutencao = $ultimo_cod_ocorrencia;
	
	
$comando = "update `$db`.`ocorrencias` set `statusocorrencia` = 'finalizada' where `ocorrencias`. `codigo` = '$numero_manutencao' limit 1 ";
mysql_query($comando,$conexao);
	
	

if($registros_ocorrencias_abertas>=1){
	
$comando = "insert into rdo_comentarios(codigointerno,autor,placa,datainformacao_rdo,datacomentario,horacomentario,comentario,tipomanutencao,localizacao) 

values('$codigointerno','$operador','$placa','$data_informada','$data_informada','$horacomentario','Situacao antes: ($situacao_antes) | Situacao Atual: ($situacao_depois) | Comentario: Manutencao finalizada! Veiculo/Equipamento Em Operacao.','$tipomanutencao','$localizacao_do_veiculo')";

mysql_query($comando,$conexao);
	
}
else{
	
$comando = "insert into rdo_comentarios(codigointerno,autor,placa,datainformacao_rdo,datacomentario,horacomentario,comentario,tipomanutencao,localizacao) 

values('$codigointerno','$operador','$placa','$data_informada','$data_informada','$horacomentario','Situacao antes: ($situacao_antes) | Situacao Atual: ($situacao_depois) | Comentario: Veiculo/Equipamento Em Operacao.','$tipomanutencao','$localizacao_do_veiculo')";

mysql_query($comando,$conexao);
	
}
	
	
if (!file_exists($diretorio)){

mkdir ("../../$placa/$data_que_a_manutencao_foi_executada", 0755);
	
	}
	
if (!file_exists($diretorio)){

mkdir ("../../$placa/$data_que_a_manutencao_foi_executada/$numero_manutencao", 0755);
	
	}
									
$foto = $_FILES['foto']['name'];
	
$uploaddir = "../../$placa/$data_que_a_manutencao_foi_executada/$numero_manutencao/";
$uploadfile = $uploaddir. $_FILES['foto']['name'];


	if (
move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir.$_FILES['foto']['name'])) {
  echo " NF enviada com sucesso! ";
} else {
  //echo " NF não foi enviada!";
}
	
									if(empty($foto)){
$link_nf = "";
									}
									else{
$link_nf = "http://www.digicompras.com.br/fluxocar/$placa/$data_que_a_manutencao_foi_executada/$numero_manutencao/$foto";
										
										
$comando = "update `$db`.`ocorrencias` set `link_nf` = '$link_nf' where `ocorrencias`. `codigo` = '$numero_manutencao' limit 1 ";
mysql_query($comando,$conexao);
									}
	

	
$comando = "insert into nfs_manutencao(cod_ocorrencia,nf,fornecedor,veiculo,placa,chassi,renavam,datamanutencao,link_nf,valormanutencao,obs_adicional_da_manutencao,data_adicional,hora_adicional,operador_informante,localizacao) 

values('$numero_manutencao','$data_informada $horacomentario','$fornecedor','$veiculo','$placa','$chassi','$renavam','$datacomentario','$link_nf','$valor_da_manutencao','Situacao antes: ($situacao_antes) | Situacao Atual: ($situacao_depois) | Comentario: Manutencao finalizada! Veiculo/Equipamento Em Operacao.','$data_informada','$horacomentario','$operador','$localizacao_do_veiculo')";
mysql_query($comando,$conexao);
	
	
	
	
	
//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
$sql1 = "SELECT * FROM operadores where estab_pertence = '$estab_pertence' and recebenotificacao = 'sim'";
$res1 = mysql_query($sql1);
while($linha=mysql_fetch_row($res1)) {
	
$nome_administrativo = $linha[1];

$email_administrativo = $linha[20];
	

	$email_dest   =   "$email_administrativo";
	
	$mensagem_do_email = "Placa $placa de $localizacao_do_veiculo Comentário realizado no RDO";
	
	//PREPARA O PEDIDO
	
	$mens  .=  "$mensagem_do_email \n";
	



$mens  .=  $to = "$email_dest";
$from = "$email_operador";
$subject = "Placa $placa de $localizacao_do_veiculo Comentário realizado no RDO";
$html = "
<html>
<body>
Olá $nome_administrativo <br><b>Placa $placa de $localizacao_do_veiculo Comentário realizado no RDO<br>
Situacao Antes: ($situacao_antes) Data Antes: $data_antes Hora Antes: $hora_antes
<br>
Situacao Atual: ($situacao_depois) Data Atual: $data_informada Hora Atual: $hora<b>!<br><br>

Nº Manutenção: $ultimo_cod_ocorrencia<br><br>

Placa: $placa de $localizacao_do_veiculo<br>
Data Comentario: $data_informada<br>
Hora Comentario: $horacomentario<br>
Comentario: Em Operacao<br>
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
	
//------------ENVIANDO EMAIL AO OPERADOR---------
	
if($recebenotificacao_para_si_proprio=="sim"){
	
	$email_dest   =   "$email_operador";
	
	$mensagem_do_email = "Placa $placa de $localizacao_do_veiculo Comentário realizado no RDO";
	
	//PREPARA O PEDIDO
	
	$mens  .=  "$mensagem_do_email \n";
	



$mens  .=  $to = "$email_dest";
$from = "$email_operador";
$subject = "Placa $placa de $localizacao_do_veiculo Comentário realizado no RDO";
$html = "
<html>
<body>
Olá $nome_administrativo <br><b>Placa $placa de $localizacao_do_veiculo Comentário realizado no RDO<br>
Situacao Antes: ($situacao_antes) Data Antes: $data_antes Hora Antes: $hora_antes
<br>
Situacao Atual: ($situacao_depois) Data Atual: $data_informada Hora Atual: $hora<b>!<br><br>

Nº Manutenção: $ultimo_cod_ocorrencia<br><br>

Placa: $placa de $localizacao_do_veiculo<br>
Data Comentario: $data_informada<br>
Hora Comentario: $horacomentario<br>
Comentario: Em Operacao<br>
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
	
}
	
//----------FIM DO ENVIO DE EMAIL AO OPERADOR----------
	
}//FIM SE SITUAÇÃO FOR 1
	
	
}//FIM DO ELSE SE REGISTROS_RDO FOR <= 0
	
}//FIM SE SOLICITAÇÃO FOR GRAVARSITUAÇÃO

?>


<title>VISUALIZANDO TODOS REGISTROS DE VEICULOS DE <? echo "$localizacao"; ?></title>

  <style type="text/css">
  .style61 {font-size: 14px; 
	font-weight: bold; 
	color: #FFFFFF;
}
  </style>

<form name="form1" method="post" action="index.php">
    <?
$senha = $_SESSION['senha'];

?>
    <input class="class01" type=image src="../../imagens/botoes/voltar.png" width="100" height="100" name="Submit3" value="Voltar">
    <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
</form>
<table width="95%"  border="0" align="center">
        <tr>
          <td><div align="center"><span class="style2">
          Listando todos os ve&iacute;culos da cidade:</span> <span class="style2"><? echo $localizacao ?></span></div></td>
        </tr>
  </table>
  <table width="95%"  border="0" align="center">
          <tr>
                <td align="center"><form name="form2" method="post" action="rdo_alimentacao.php">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "filtrar"; ?>">
                  <?
$senha = $_SESSION['senha'];

?>

<?
					
$sql = "SELECT * FROM rdo where localizacao = '$localizacao' order by data desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$data_ultimo_rdo_gerado = $linha[12];
	$dia_ultimo_rdo_gerado = $linha[14];
	$mes_ultimo_rdo_gerado = $linha[15];
	$ano_ultimo_rdo_gerado = $linha[16];

}
					

// converte as datas para o formato timestamp
$d1 = strtotime($data_informada); 
$d2 = strtotime($data_ultimo_rdo_gerado);
// verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
$datafinal = ($d2 - $d1) /86400;
// caso a data 2 seja menor que a data 1
if($datafinal < 0)
$datafinal = $datafinal * -1;
					
//echo "Entre as duas datas informadas, existem $dataFinal dias.";
					
if($datafinal>=2){
	
//$data_autorizada_para_gerar_rdo = date('Y-m-d', strtotime($data_ultimo_rdo_gerado. ' + 1 days'));
	
	
//$data_autorizada_para_gerar_rdo2 = explode("-", $data_autorizada_para_gerar_rdo);

//$dia_autorizado_para_gerar_rdo = $data_autorizada_para_gerar_rdo2[2];

//$mes_autorizado_para_gerar_rdo = $data_autorizada_para_gerar_rdo2[1];

//$ano_autorizado_para_gerar_rdo = $data_autorizada_para_gerar_rdo2[0];
	
//echo "<script>

//alert('ATENCAO!!!... $operador O ultimo dia que voce gerou RDO foi em $data_ultimo_rdo_gerado. Favor gerar ate a data de hoje e mantenha sempre em dia!');

//</script>";
	
}

					
?>

                  <strong>Obra</strong><span style="font-weight: bold">
                  <select class='class02' name="obra" id="obra">
                    <?
					  if(empty($obra)){
    $sql = "select * from obras where concessionaria = '$estab_pertence' and statusobra = 'ativo'";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['obra']."</option>";
    }
					  }
					  else{
						  
		echo "<option selected>$obra</option>";
						  
					  }
?>
                  </select>
                  </span><strong>Localizacao</strong>

  <span style="font-weight: bold">
  <select class='class02' name="localizacao" id="localizacao">
    <option selected><? echo "$localizacao"; ?></option>
    <?


    $sql4 = "select * from cidades_de_atuacao where operador = '$operador' order by cidade asc";
    $result4 = mysql_query($sql4);
    while($x=mysql_fetch_array($result4)){
  echo "<option>".$x['cidade']."</option>";
    }
?>
  </select>
	  

	  
	  
  </span> <strong>Data</strong>
<select class='class02' name="data_informada" id="data_informada">
  <option selected><? echo "$data_informada"; ?></option>
	<? if($data_de_hoje<="2020-08-14"){ echo "<option>2020-08-15</option>"; } ?>
  <option><? echo "$data_de_hoje"; ?></option>
  <?
	  
			  
$sql10 = "SELECT * FROM rdo where data < '$data_de_hoje' group by data order by data desc limit 30";
$result10 = mysql_query($sql10);
while($x=mysql_fetch_array($result10)) {
echo "<option>".$x['data']."</option>";
}

	  ?>
</select>
  <input class='class02' type="submit" name="Submit" value="Filtrar">
                </form></td>
        </tr>
</table>            
                  
      <table width="95%"  border="0" align="center">
        <tr bgcolor="#ffffff">
          <td><div align="center">Ve&iacute;culo</div></td>
          <td align="center" bgcolor="#ffffff">Localizacao</td>
          <td bgcolor="#ffffff"><div align="center">Tipo</div></td>
          <td width="10%" bgcolor="#ffffff"><div align="center">Placa</div></td>
          <td align="center" bgcolor="#ffffff"><? echo "$data_informada"; ?></td>
          <td bgcolor="#ffffff"><div align="center">#</div></td>
          <td bgcolor="#ffffff"><div align="center">#</div></td>
          <td align="center" bgcolor="#ffffff">#</td>
          <td align="center" bgcolor="#ffffff">Operador que iniciou o dia</td>
        </tr>
<?
if(empty($data_informada)){
	
}
else{
	
$sql5 = "SELECT * FROM veiculos where obra = '$obra' and localizacao = '$localizacao' and mobilizado = 'sim' and rdo = 'sim' order by veiculo asc";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$codigointerno = $linha[0];
$datacadastro = $linha[1];
$horacadastro = $linha[2];
$concessionaria_do_veiculo = $linha[10];
$cnpj_concessionaria_do_veiculo = $linha[11];
$tel_concessionaria = $linha[12];
$email_concessionaria = $linha[13];
$cidade_concessionaria = $linha[14];
$estado_concessionaria = $linha[15];
$veiculo = $linha[16];
$anoveiculo = $linha[17];
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
$status = $linha[61];
$tipoveiculo = $linha[67];
$localizacao_do_veiculo = $linha[76];


	
?>        <tr>
          <td width="16%" ><div align="center"><? echo $veiculo; ?></div></td>
          <td width="9%" align="center"><? echo $localizacao_do_veiculo;?></td>
          <td width="9%"><div align="center"><? echo $tipoveiculo;?>
          </div></td>
          <td><div align="center"><A NAME="<? echo "$placa"; ?>"><? echo $placa;?></A></div></td>
		  <?
$sql6 = "SELECT * FROM rdo where placa = '$placa' and data = '$data_informada' and localizacao = '$localizacao_do_veiculo'";
$res6 = mysql_query($sql6);
$registros_de_situacao_rdo = mysql_num_rows($res6);
while($linha=mysql_fetch_row($res6)) {

$codigo_do_rdo_para_horas_manutencao = $linha[0];
$operador_que_iniciou_o_dia = $linha[3];
$situacaordo = $linha[10];
$hora_que_gerou_o_start = $linha[17];
$localizacao_no_dia_que_foi_gerado = $linha[23];
	$horas_manutencao = $linha[25];
	?>
          <td width="9%" align="center">
			  <? 
if($registros_de_situacao_rdo<=0){
	echo "-";
}
else{
	echo "$situacaordo<br>";
	
$sql12 = "SELECT * FROM rdo_comentarios where placa = '$placa' and localizacao = '$localizacao_no_dia_que_foi_gerado' and datacomentario = '$data_informada' and horas_manutencao > '0.00' order by codigo desc limit 1";
$res12 = mysql_query($sql12);
while($linha=mysql_fetch_row($res12)) {
$registro_de_lancamento_rdo = mysql_num_rows($res12);
	

	$horas_manutencao_rdo_comentarios = $linha[14];
	

	
	if($horas_manutencao_rdo_comentarios>=0.01){
		echo "$horas_manutencao_rdo_comentarios(H.M.)";
	}
	
}
	
	
	
	
	
	//if($horas_manutencao>="0.01"){
	//echo "<b>$horas_manutencao(H.M.)</b>";
//}
}
			  ?>

		  </td>
		  <? } ?>
          <td width="5%"><div align="center">
            <form name="form3" method="post" action="rdo_alimentacao.php#<? echo "$placa"; ?>">
              <div align="center">
                <?
$senha = $_SESSION['senha'];

?>
                <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "gravarsituacao"; ?>">
				<input name="codigointerno" type="hidden" id="codigointerno" value="<? echo $codigointerno; ?>">
                <input name="situacao" type="hidden" id="situacao" value="<? echo "1"; ?>">
                <input name="localizacao" type="hidden" id="localizacao" value="<? echo $localizacao_do_veiculo; ?>">
                <input name="data_informada" type="hidden" id="data_informada" value="<? echo $data_informada; ?>">
                <input name="dia" type="hidden" id="dia" value="<? echo $dia; ?>">
                <input name="mes" type="hidden" id="mes" value="<? echo $mes; ?>">
                <input name="ano" type="hidden" id="ano" value="<? echo $ano; ?>">
                <input name="obra" type="hidden" id="obra" value="<? echo $obra; ?>">
                <? 
	if($alimentacao_rdo_autorizado=="sim"){
		
	if($operador_que_iniciou_o_dia<>$operador){
		if($operador_que_iniciou_o_dia=="LANCAMENTO AUTOMATICO"){
			echo "<input class='class01' type='submit' name='Submit' value='1'>";
		}
	}
	else{
		echo "<input class='class01' type='submit' name='Submit' value='1'>";
	}
		
	}
	 ?> 
                <input name="situacao_antes" type="hidden" id="situacao_antes" value="<? echo "$situacaordo"; ?>">
              </div>
            </form>
          </div></td>
		  <td width="5%"><div align="center">
		    <form name="form4" method="post" action="rdo_alimentacao.php#<? echo "comentario"; ?>">
		      <div align="center">
		        <?
$senha = $_SESSION['senha'];

?>
		        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "gravarsituacao"; ?>">
		        <input name="solicitacaodecomentario_old" type="hidden" id="solicitacaodecomentario_old" value="inserircomentario_old">
<input name="codigointerno" type="hidden" id="codigointerno" value="<? echo $codigointerno; ?>">
				  <input name="codigo_do_rdo_para_horas_manutencao" type="hidden" id="codigo_do_rdo_para_horas_manutencao" value="<? echo $codigointerno; ?>">
				  
		        <input name="situacao" type="hidden" id="situacao" value="<? echo "M"; ?>">
		        <input name="localizacao" type="hidden" id="localizacao" value="<? echo $localizacao_do_veiculo; ?>">
		        <input name="data_informada" type="hidden" id="data_informada" value="<? echo $data_informada; ?>">
		        <input name="dia" type="hidden" id="dia" value="<? echo $dia; ?>">
                <input name="mes" type="hidden" id="mes" value="<? echo $mes; ?>">
                <input name="ano" type="hidden" id="ano" value="<? echo $ano; ?>">
                <input name="obra" type="hidden" id="obra" value="<? echo $obra; ?>">
	          <? 
	if($alimentacao_rdo_autorizado=="sim"){
		
	if($operador_que_iniciou_o_dia<>$operador){
		if($operador_que_iniciou_o_dia=="LANCAMENTO AUTOMATICO"){
	echo "<input class='class01' type='submit' name='Submit' value='M'>";
		}
	}
	else{
		echo "<input class='class01' type='submit' name='Submit' value='M'>";
	}
		
	}
				  ?>
	          <input name="situacao_antes" type="hidden" id="situacao_antes" value="<? echo "$situacaordo"; ?>">
		      </div>
	        </form>
		  </div></td>
		  <td width="5%" align="center"><form name="form4" method="post" action="rdo_alimentacao.php#<? echo "comentario"; ?>">
		      <div align="center">
		        <?
$senha = $_SESSION['senha'];

?>
		        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "gravarsituacao"; ?>">
		        <input name="solicitacaodecomentario_old2" type="hidden" id="solicitacaodecomentario_old2" value="inserircomentario_old2">
		        <input name="codigointerno" type="hidden" id="codigointerno" value="<? echo $codigointerno; ?>">
		        <input name="situacao" type="hidden" id="situacao" value="<? echo "MM"; ?>">
		        <input name="localizacao" type="hidden" id="localizacao" value="<? echo $localizacao_do_veiculo; ?>">
		        <input name="data_informada" type="hidden" id="data_informada" value="<? echo $data_informada; ?>">
		        <input name="dia" type="hidden" id="dia" value="<? echo $dia; ?>">
                <input name="mes" type="hidden" id="mes" value="<? echo $mes; ?>">
                <input name="ano" type="hidden" id="ano" value="<? echo $ano; ?>">
                <input name="obra" type="hidden" id="obra" value="<? echo $obra; ?>">
	          <? 
	
	if($alimentacao_rdo_autorizado=="sim"){
		
	if($operador_que_iniciou_o_dia<>$operador){
		if($operador_que_iniciou_o_dia=="LANCAMENTO AUTOMATICO"){
	echo "<input class='class01' type='submit' name='Submit' value='MM'>";
		}
	}
	else{
		echo "<input class='class01' type='submit' name='Submit' value='MM'>";
	}
		
	}
				  ?>
	          <input name="situacao_antes" type="hidden" id="situacao_antes" value="<? echo "$situacaordo"; ?>">
		      </div>
	        </form></td>
		  <td width="41%" align="center"><? echo "$operador_que_iniciou_o_dia as $hora_que_gerou_o_start"; ?></td>
		  </tr>
		  
<? } } ?>
        
  </table>
      <table width="80%" border="0" align="center">
        <tbody>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center"><div id="comentario" class="modal" role="dialog"><br>
              <br>
              <br>
              <table width="100%" border="0" class='style61'>
                <?  
			$codigointerno = $_POST['codigointerno'];
			  //$data = $_POST['data'];
						
						
$sql3 = "SELECT * FROM rdo where codigointerno = '$codigointerno' and data = '$data_informada' order by ";
$res3 = mysql_query($sql3);
$registros_rdo = mysql_num_rows($res3);
while($linha=mysql_fetch_row($res3)) {

$codigointerno = $linha[1];
$codigo_do_rdo_para_horas_manutencao = $linha[0];
$placa = $linha[6];
$veiculodocomentario = $linha[7];
$placadocomentario = $linha[6];
	$localizacao = $linha[23];
	$situacao_antes = $linha[20];
	$situacao_depois = $linha[10];
$data_que_se_refere_o_comentario = $linha[12];
	$horas_manutencao = $linha[25];
	
	
}
						
						
						
						
						?>
                <form action="rdo_alimentacao.php#<? echo "$placa"; ?>" method="post" enctype="multipart/form-data" name="form7">
                  <tr>
                    <td colspan="3" class='style61'><div align="center"><strong>Inserir Comentario</strong></div></td>
                  </tr>
                  <tr>
                    <td width="346%" colspan="3"><div align="center">
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      <input name="solicitacaodecomentario" type="hidden" id="solicitacaodecomentario" value="inserircomentario">
                      <input name="codigointerno" type="hidden" id="codigointerno" value="<? echo "$codigointerno"; ?>">
						<input name="codigo_do_rdo_para_horas_manutencao" type="hidden" id="codigo_do_rdo_para_horas_manutencao" value="<? echo "$codigo_do_rdo_para_horas_manutencao"; ?>">
                      <input name="data_informada" type="hidden" id="data_informada" value="<? echo $data_informada; ?>">
                      <input name="obra" type="hidden" id="obra" value="<? echo $obra; ?>">
                      <input name="localizacao" type="hidden" id="localizacao" value="<? echo $localizacao; ?>">
                      <input name="dia" type="hidden" id="dia" value="<? echo $dia; ?>">
                      <input name="mes" type="hidden" id="mes" value="<? echo $mes; ?>">
                      <input name="ano" type="hidden" id="ano" value="<? echo $ano; ?>">
                      <input name="situacao_antes" type="hidden" id="situacao_antes" value="<? echo "$situacao_antes"; ?>">
                      <input name="situacao" type="hidden" id="situacao" value="<? echo $situacao; ?>">
						
                      <strong><? echo "Veiculo / Placa / Localizacao <br>$veiculodocomentario / $placadocomentario / $localizacao <br>"; ?></strong></div></td>
                  </tr>
                  <tr>
                    <td colspan="3" class='style61'><div align="center"><strong>Tipo Manutencao<br><select class='class02' name="tipomanutencao" id="tipomanutencao">
						
<?
						
$sql9 = "SELECT * FROM ocorrencias where placa = '$placa' and statusocorrencia = 'aberta' order by datamanutencao desc limit 1";
$res9 = mysql_query($sql9);
while($linha=mysql_fetch_row($res9)) {

$tipomanutencao = $linha[9];
$horimetro_gravado = $linha[13];
$km_atual = $linha[14];
	
}
?>
						
        <option selected><? if(empty($tipomanutencao)){ echo "CORRETIVA"; }else{ echo "$tipomanutencao"; } ?></option>
		<option>CORRETIVA</option>
        <option>PREVENTIVA</option>
        <option>PREDITIVA</option>
      </select><br>Km<br><input name="km_atual" type="text" class='class02' id="km_atual" value="<? echo $km_atual; ?>" size="10"><br>Horimetro<br><input name="horimetro_atual" type="text" class='class02' id="horimetro_atual" value="<? echo $horimetro_gravado; ?>" size="10"><br>
						<?
						if($situacao=="M"){
							?>
	Horas de Manutencao / Calcular?<br><input name="horas_manutencao" type="text" class='class02' id="horas_manutencao" value="<? if((empty($horas_manutencao)) or ($horas_manutencao<=0.00)) { echo "9.00"; }else{ echo"$horas_manutencao"; } ?>" size="10"> 
	/ 
	<select class='class02' name="calcularhorasdemanutencao" id="calcularhorasdemanutencao">
	  <option selected>s</option>
	  <option>n</option>
	 
	  </select>
	<br>
						<? } ?>
      <? echo "Sobre a data $data_que_se_refere_o_comentario<br>"; ?></?>
      <label for="comentario_inserido">Text Area:</label>
                      <textarea class="class02" name="comentario_inserido" cols="20" rows="3" id="comentario_inserido"></textarea>
                      <br>
                      
                      <input class='class02'type="file" name="foto" id="foto">
                      <br>
                      <input class='class01' type=image src="ok.jpg" width="50" height="50" name="submit4" id="submit4" value="Cupom">
                      <br>
                    </strong></div></td>
                  </tr>
                </form>
              </table>
            </div></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
      </table>
      <p>&nbsp;</p>

