<?php

require '../../conect/conect.php';

ini_set('default_charset','UTF8_general_mysql500_ci');



$sql = "SELECT * FROM tempoexpiracaosenha limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$tempoexpiracaosenha = $linha['1'];


}


/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em 30 minutos */
session_cache_expire($tempoexpiracaosenha);
$cache_expire = session_cache_expire();

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
<title>Informa&ccedil;&otilde;es pr&eacute;vias para preenchimento de proposta!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-repeat: no-repeat;
	background-attachment: fixed;
}
.style1 {
	color: #000000
}
.style2 {	color: #0000FF;
	font-weight: bold;
}
-->
</style>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<script type="text/javascript">
      window.onload = function()  {
        CKEDITOR.replace( 'tramitemateria' );
      };
    </script>

</head>

<?

$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}

?> 

<body background="../../background/<? echo "$background"; ?>">
<p><?
$data_hoje = date('Y-m-d');

$solicitacao = $_POST['solicitacao'];


$codigomateria = $_POST['codigomateria'];
$tipoanexo = $_POST['tipoanexo'];
  

$anoatual = date('Y');
$mesautal = date('m');
$diaautal = date('d');
//$dataalteracao = date('Y-m-d');
$datealteracao = date('Y-m-d');
$horaalteracao = date('H:i:s');


error_reporting(E_ALL);

?>
<?
$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$sql = "SELECT * FROM usuarios where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigousuario = $linha[0];
$nomeusuario = $linha[1];
$perfilusuario = $linha[2];
$emailusuario = $linha[13];
$celularusuario = $linha[15];
$realizaordemdodia = $linha[27];

}



$sql = "SELECT * FROM permissoesdetela where perfil = '$perfilusuario' and status = 'Ativo' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$resultadodapermissao = mysql_num_rows($res);

$lib_tipomateria = $linha[5];
$lib_numeromateria = $linha[6];
$lib_anomateria = $linha[7];
$lib_palavraschave = $linha[8];
$lib_prazomateria = $linha[9];
$lib_bairromateria = $linha[10];
$lib_processomateria = $linha[11];
$lib_assuntoementa = $linha[12];
$lib_respostapadrao = $linha[13];
$lib_autoriamateria = $linha[14];
$lib_relatormateria = $linha[15];
$lib_statusmateria = $linha[16];
$lib_destinoatualmateria = $linha[17];
$lib_ritomateria = $linha[18];
$lib_turnodevotacaomateria = $linha[19];
$lib_tipodevotacaomateria = $linha[20];
$lib_quorummateria = $linha[21];
$lib_resultadomateria = $linha[22];
$lib_dataresultadomateria = $linha[23];
$lib_adiadoparamateria = $linha[24];
$lib_dataarquivamentomateria = $linha[25];
$lib_corredormateria = $linha[26];
$lib_numerocaixamateria = $linha[27];
$lib_armariomateria = $linha[28];
$lib_prateleiramateria = $linha[29];
$lib_tramitemateria = $linha[30];
$lib_anexointegralmateria = $linha[31];
$lib_trocaranexodelado = $linha[32];
$lib_excluirarquivos = $linha[33];
$lib_botaosalvar = $linha[34];
$lib_botaoimprimirmateria = $linha[35];

}



?>


  <?

$anexointegralmateria = $_FILES['anexointegralmateria']['name'];


if($solicitacao=="anexararquivo"){

if(empty($anexointegralmateria)){

echo "<script>

alert('ATENÇÃO!!!...RECIPIENTE VAZIO!!!... VOCÊ DEVE SELECIONAR AO MENOS UM ARQUIVO PARA SER ENVIADO!');

</script>";

}
else{
$protocologerado = $_POST['protocologerado'];
$usuarioalterou = $_POST['usuarioalterou'];
$emailusuarioalterou = $_POST['emailusuarioalterou'];
$perfilutilizado = $_POST['perfilutilizado'];


$sql = "SELECT * FROM materias where codigo = '$codigomateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$tipomateriadoanexo = $linha[6];
$numeromateriadoanexo = $linha[7];
$anomateriadoanexo = $linha[8];

}

  
  // Pasta onde o arquivo vai ser salvo
$uploaddir = "anexosdematerias/$protocologerado/";
$uploadfile = $uploaddir. $_FILES['anexointegralmateria']['name'];
 
// Depois verifica se é possível mover o arquivo para a pasta escolhida

if (
//move_uploaded_file($_FILES['anexointegralmateria']['tmp_name'], $uploaddir.$_FILES['anexointegralmateria']['name'])){
move_uploaded_file($_FILES['anexointegralmateria']['tmp_name'], $uploaddir.$_FILES['anexointegralmateria']['name'])) {
  // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
  //echo "Upload do anexo efetuado com sucesso!";
  //echo '<a href="' . $uploaddir . $anexointegralmateria . '">Clique aqui para acessar o arquivo</a>';
} else {
  // Não foi possível fazer o upload, provavelmente a pasta está incorreta
  //echo "Não foi possível enviar o arquivo, tente novamente";
}




$comando = "insert into anexos(datacadastro,horacadastro,tipomateria,numeromateria,anomateria,numeroprotocolo,anexonome,caminhoarquivo,tipoanexo,statusanexo,arquivo)
values('$datealteracao','$horaalteracao','$tipomateriadoanexo','$numeromateriadoanexo','$anomateriadoanexo','$protocologerado','$anexointegralmateria','anexosdematerias/$protocologerado/','$tipoanexo','Ativo','$anexointegralmateria')";

mysql_query($comando,$conexao) or die("Erro ao gravar materia!");



	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocologerado','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Inclusão de Anexo','','$anexointegralmateria - Tipo de Anexo: $tipoanexo','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);



}


}

?>

<?php

if($solicitacao=="excluirarquivo"){

$protocologerado = $_POST['protocologerado'];
$usuarioalterou = $_POST['usuarioalterou'];
$emailusuarioalterou = $_POST['emailusuarioalterou'];
$perfilutilizado = $_POST['perfilutilizado'];


$codigodoarquivo = $_POST['codigodoarquivo'];

$sql = "SELECT * FROM anexos where codigo = '$codigodoarquivo' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$anexonomedoarquivoeletado = $linha[7];
$tipoanexodoarquivoeletado = $linha[9];

}


$arquivoaserdeletado = $_POST['arquivodeletar'];

unlink("$arquivoaserdeletado");


	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocologerado','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Exclusão de Anexo','$anexonomedoarquivoeletado - Tipo de anexo $tipoanexodoarquivoeletado','','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);



$comando = "delete from `anexos` where `anexos`. `codigo` = '$codigodoarquivo' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao excluir anexo");


}

?>

<?

if($solicitacao=="trocardelado"){

$protocologerado = $_POST['protocologerado'];
$usuarioalterou = $_POST['usuarioalterou'];
$emailusuarioalterou = $_POST['emailusuarioalterou'];
$perfilutilizado = $_POST['perfilutilizado'];


$codigodoarquivo = $_POST['codigodoarquivo'];

$sql = "SELECT * FROM anexos where codigo = '$codigodoarquivo' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$anexonomedoarquivo = $linha[7];
}

$tipoanexo = $_POST['tipoanexo'];
$tipoanexo2 = $_POST['tipoanexo2'];

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`anexos` set `tipoanexo` = '$tipoanexo' where `anexos`. `codigo` = '$codigodoarquivo' limit 1 ";
}
mysql_query($comando,$conexao) or die("Erro ao alterar posição do arquivo na materia.");



if($tipoanexo<>$tipoanexo2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocologerado','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Troca de lado do arquivo $anexonomedoarquivo','$tipoanexo2','$tipoanexo','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


}

?>
<?

if($solicitacao=="alterarmateria"){

$codigodamateriaparaalterar = $_POST['codigomateria'];


$protocolomateria = $_POST['protocolomateria'];
$usuarioalterou = $_POST['usuarioalterou'];
$emailusuarioalterou = $_POST['emailusuarioalterou'];
$perfilutilizado = $_POST['perfilutilizado'];

$tipomateria = $_POST['tipomateria'];
$tipomateria2 = $_POST['tipomateria2'];
if($tipomateria<>$tipomateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Tipo Materia','$tipomateria2','$tipomateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$numeromateria = $_POST['numeromateria'];
$numeromateria2 = $_POST['numeromateria2'];
if($numeromateria<>$numeromateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Numero Materia','$numeromateria2','$numeromateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$anomateria = $_POST['anomateria'];
$anomateria2 = $_POST['anomateria2'];
if($anomateria<>$anomateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Ano Materia','$anomateria2','$anomateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$palavraschavemateria = $_POST['palavraschavemateria'];
$palavraschavemateria2 = $_POST['palavraschavemateria2'];
if($palavraschavemateria<>$palavraschavemateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Palavras Chave','$palavraschavemateria2','$palavraschavemateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$prazomateria = $_POST['prazomateria'];
$prazomateria2 = $_POST['prazomateria2'];
if($prazomateria<>$prazomateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Prazo Materia','$prazomateria2','$prazomateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$bairromateria = $_POST['bairromateria'];
$bairromateria2 = $_POST['bairromateria2'];
if($bairromateria<>$bairromateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Bairro','$bairromateria2','$bairromateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$processo = $_POST['processo'];
$processo2 = $_POST['processo2'];
if($processo<>$processo2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Processo','$processo2','$processo','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$assuntoementamateria = $_POST['assuntoementamateria'];
$assuntoementamateria2 = $_POST['assuntoementamateria2'];
if($assuntoementamateria<>$assuntoementamateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Assunto Ementa','$assuntoementamateria2','$assuntoementamateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$respostapadraomateria = $_POST['respostapadraomateria'];

$sql = "SELECT * FROM respostaspadrao where codigousuario = '$codigousuario' and titulo = '$respostapadraomateria' and statusresposta = 'Ativo' order by titulo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$respostacompleta = $linha[3];

}

$respostapadraomateria2 = $_POST['respostapadraomateria2'];
$respostapadraomateria3 = $_POST['respostapadraomateria3'];

if($respostapadraomateria<>$respostapadraomateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Resposta Padrao','$respostapadraomateria3','$respostacompleta','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}

//-------------------------------------------------
$autoriamateria = $_POST['autoriamateria'];
$autoriamateria2 = $_POST['autoriamateria2'];
if($autoriamateria<>$autoriamateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Autoria','$autoriamateria2','$autoriamateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}



//--------------------------------------------------

$relatormateria = $_POST['relatormateria'];
$relatormateria2 = $_POST['relatormateria2'];
if($relatormateria<>$relatormateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Relator','$relatormateria2','$relatormateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$statusmateria = $_POST['statusmateria'];
$statusmateria2 = $_POST['statusmateria2'];
if($statusmateria<>$statusmateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Status','$statusmateria2','$statusmateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$destinoatualmateria = $_POST['destinoatualmateria'];
$destinoatualmateria2 = $_POST['destinoatualmateria2'];
if($destinoatualmateria<>$destinoatualmateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Destino Atual','$destinoatualmateria2','$destinoatualmateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$db = $linha[1];
}

$comando = "update `$db`.`materias` set `receberdocumento` = 'nao',`ordenacaonogrid` = '0' where `materias`. `codigo` = '$codigodamateriaparaalterar' limit 1 ";

mysql_query($comando,$conexao);


}


$ritomateria = $_POST['ritomateria'];
$ritomateria2 = $_POST['ritomateria2'];
if($ritomateria<>$ritomateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Rito','$ritomateria2','$ritomateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$turnovotacaomateria = $_POST['turnovotacaomateria'];
$turnovotacaomateria2 = $_POST['turnovotacaomateria2'];
if($turnovotacaomateria<>$turnovotacaomateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Turno de Vota&ccedil;&atilde;o','$turnovotacaomateria2','$turnovotacaomateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$tipovotacaomateria = $_POST['tipovotacaomateria'];
$tipovotacaomateria2 = $_POST['tipovotacaomateria2'];
if($tipovotacaomateria<>$tipovotacaomateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Tipo de Vota&ccedil;&atilde;o','$tipovotacaomateria2','$tipovotacaomateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$quorummateria = $_POST['quorummateria'];
$quorummateria2 = $_POST['quorummateria2'];
if($quorummateria<>$quorummateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Quorum','$quorummateria2','$quorummateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$resultadomateria = $_POST['resultadomateria'];
$resultadomateria2 = $_POST['resultadomateria2'];
if($resultadomateria<>$resultadomateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Resultado','$resultadomateria2','$resultadomateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$dataresultadomateria = $_POST['dataresultadomateria'];
$dataresultadomateria2 = $_POST['dataresultadomateria2'];
if($dataresultadomateria<>$dataresultadomateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Data Resultado','$dataresultadomateria2','$dataresultadomateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$adiadoparamateria = $_POST['adiadoparamateria'];
$adiadoparamateria2 = $_POST['adiadoparamateria2'];
if($adiadoparamateria<>$adiadoparamateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Adiado Para','$adiadoparamateria2','$adiadoparamateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$dataarquivamentomateria = $_POST['dataarquivamentomateria'];
$dataarquivamentomateria2 = $_POST['dataarquivamentomateria2'];
if($dataarquivamentomateria<>$dataarquivamentomateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Data Arquivamento','$dataarquivamentomateria2','$dataarquivamentomateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$corredormateria = $_POST['corredormateria'];
$corredormateria2 = $_POST['corredormateria2'];
if($corredormateria<>$corredormateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Corredor','$corredormateria2','$corredormateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$numcaixamateria = $_POST['numcaixamateria'];
$numcaixamateria2 = $_POST['numcaixamateria2'];
if($numcaixamateria<>$numcaixamateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Numero Caixa','$numcaixamateria2','$numcaixamateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$armariomateria = $_POST['armariomateria'];
$armariomateria2 = $_POST['armariomateria2'];
if($armariomateria<>$armariomateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Arm&aacute;rio','$armariomateria2','$armariomateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$prateleiramateria = $_POST['prateleiramateria'];
$prateleiramateria2 = $_POST['prateleiramateria2'];
if($prateleiramateria<>$prateleiramateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Prateleira','$prateleiramateria2','$prateleiramateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}


$recebe_tramitemateria = $_POST['tramitemateria'];
$tags_para_retirar = array("<p>", "</p>");
$tramitemateria = str_replace($tags_para_retirar, "", $recebe_tramitemateria); // Retira as tags de paragrafo"


if(empty($tramitemateria)){

}
else{


$sql_tramite2 = "SELECT * FROM materias where codigo = '$codigodamateriaparaalterar' limit 1";
$res_tramite2 = mysql_query($sql_tramite2);
while($linha=mysql_fetch_row($res_tramite2)) {

$tramitemateria2 = $linha[32];

}


if($tramitemateria<>$tramitemateria2){
	
	
$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$usuarioalterou','$emailusuarioalterou','$perfilutilizado','Tramite','$tramitemateria2','$tramitemateria','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);

}

}





$sql3 = "select * from db";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$comando = "update `$linha[1]`.`materias` set `tipomateria` = '$tipomateria',`numeromateria` = '$numeromateria',`anomateria` = '$anomateria',`palavraschavemateria` = '$palavraschavemateria',`prazomateria` = '$prazomateria',`bairromateria` = '$bairromateria',`processo` = '$processo',`assuntoementamateria` = '$assuntoementamateria',`respostapadraomateria` = '$respostapadraomateria',`respostapadraocompletamateria` = '$respostacompleta',`autoriamateria` = '$autoriamateria',`relatormateria` = '$relatormateria',`statusmateria` = '$statusmateria',`destinoatualmateria` = '$destinoatualmateria',`ritomateria` = '$ritomateria',`turnovotacaomateria` = '$turnovotacaomateria',`tipovotacaomateria` = '$tipovotacaomateria',`quorummateria` = '$quorummateria',`resultadomateria` = '$resultadomateria',`dataresultadomateria` = '$dataresultadomateria',`adiadoparamateria` = '$adiadoparamateria',`dataarquivamentomateria` = '$dataarquivamentomateria',`corredormateria` = '$corredormateria',`numcaixamateria` = '$numcaixamateria',`armariomateria` = '$armariomateria',`prateleiramateria` = '$prateleiramateria',`tramitemateria` = '$tramitemateria' where `materias`. `codigo` = '$codigodamateriaparaalterar' limit 1 ";

}
mysql_query($comando,$conexao);




$sql4 = "SELECT * FROM usuarios where nome = '$autoriamateria' limit 1";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$email_do_autor = $linha[13];
$recebeemail = $linha[20];

}



$sql5 = "SELECT * FROM estabelecimentos limit 1";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$email_orgao = $linha[14];

}



if($recebeemail=="Sim"){

	//PREPARA O PEDIDO


$mens  .=  $to = "$email_do_autor";
$from = "$email_orgao";
$assunto = "Ocorrência de tramitação de matéria";
$html = "
<html>
<body>
Ocorrência de tramitação de matéria de sua autoria<br><br>

Nº do Protocolo da matéria: <b>$protocolomateria<b>!<br><br>
Tipo de matéria: $tipomateria<br>
Nº da matéria: $numeromateria<br>
Ano da matéria: $anomateria<br>
Status da matéria: $statusmateria<br>
Assunto Ementa da matéria: $assuntoementamateria<br>
Data da tramitação: $datealteracao<br>
Hora da tramitação: $horaalteracao<br><br>

Acesse o sistema para um acompanhamento detalhado!
</body>
</html>";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $from \r\n";

if (mail($to, $assunto, $html, $headers)) {
echo "Email enviado com sucesso !";
} else {
echo "Ocorreu um erro durante o envio do email.";
}
  
	

}



}

?>

    <?
if($solicitacao=="buscarprotocolo"){

$protocolo_a_buscar = $_POST['protocolo_a_buscar'];

if(empty($protocolo_a_buscar)){

echo "<script>

alert('ATENÇÃO!!!... NÚMERO DE PROTOCOLO NÃO INFORMADO!!!... INFORME UMA NUMERAÇÃO E TENTE NOVAMENTE!.');
window.location = 'gridmaterias.php';


</script>";


}
else{

$sql = "SELECT * FROM materias where protocolo = '$protocolo_a_buscar' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_de_protocolos_encontrados = mysql_num_rows($res);

$autoriamateria_pesquisada = $linha[16];

}

if($registros_de_protocolos_encontrados<="0"){

echo "<script>

alert('ATENÇÃO!!!... NÚMERO DE PROTOCOLO NÃO ENCONTRADO!!!... VERIFIQUE A NUMERAÇÃO E TENTE NOVAMENTE!.');
window.location = 'gridmaterias.php';

</script>";

}
else{

if(($perfilusuario=="Consulta") && ($nomeusuario<>$autoriamateria_pesquisada)){

echo "<script>

alert('ATENÇÃO!!!... VOCÊ NÃO POSSUI PERMISSÃO PARA ACESSAR O PROTOCOLO PESQUISADO! VERIFIQUE A NUMERAÇÃO E TENTE NOVAMENTE!.');
window.location = 'gridmaterias.php';

</script>";



}


}



}

}
	


if(empty($protocolo_a_buscar)){

$sql = "SELECT * FROM materias where codigo = '$codigomateria' limit 1";

}
else{

$sql = "SELECT * FROM materias where protocolo = '$protocolo_a_buscar' limit 1";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$sequencianumeromateria = mysql_num_rows($res);

$codigomateria = $linha[0];
$codigomateria_receberdocumento = $linha[0];

$datacadastromateria = $linha[1];
$anocadastromateria = $linha[2];
$mescadastromateria = $linha[3];
$diacadastromateria = $linha[4];
$horacadastromateria = $linha[5];
$tipomateria = $linha[6];
$numeromateria = $linha[7];
$anomateria = $linha[8];
$protocolomateria = $linha[9];
$processomateria = $linha[10];
$palavraschavemateria = $linha[11];
$prazomateria = $linha[12];
$bairromateria = $linha[13];
$assuntoementamateria = $linha[14];
$respostapadraomateria = $linha[15];
$autoriamateria = $linha[16];
$relatormateria = $linha[17];
$statusmateria = $linha[18];
$destinoatualmateria = $linha[19];
$ritomateria = $linha[20];
$turnovotacaomateria = $linha[21];
$tipovotacaomateria = $linha[22];
$quorummateria = $linha[23];
$resultadomateria = $linha[24];
$dataresultadomateria = $linha[25];
$adiadoparamateria = $linha[26];
$dataarquivamentomateria = $linha[27];
$corredormateria = $linha[28];
$numcaixamateria = $linha[29];
$armariomateria = $linha[30];
$prateleiramateria = $linha[31];
$tramitemateria = $linha[32];
$documento_recebido = $linha[36];

$respostapadraocompletamateria = $linha[38];


}


?>

<?
if(($nomeusuario==$destinoatualmateria) && ($documento_recebido=="nao")){

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}

$comando = "update `$db`.`materias` set `receberdocumento` = 'sim',`ordenacaonogrid` = '1' where `materias`. `codigo` = '$codigomateria_receberdocumento' limit 1 ";

mysql_query($comando,$conexao);


$comando = "insert into alteracoesdemateria(protocolomateria,usuarioalterou,emailusuarioalterou,perfilutilizado,campoalterado,antes,depois,datealteracao,horaalteracao)
values('$protocolomateria','$nomeusuario','$emailusuario','$perfilusuario','Recebimento de Documento','Aguardando Recebimento','Recebimento de Documento confirmado','$datealteracao','$horaalteracao')";

mysql_query($comando,$conexao);


}


?>


<?
if($perfilusuario=="Administrador"){
$estadodocampo_numeromateria = "";
}
else{

if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_numeromateria = mysql_num_rows($res2);


}

if($quant_vinculos_numeromateria<="0"){

$estadodocampo_numeromateria = "readonly='true'";

}
else{

if($lib_numeromateria=="sim"){

$estadodocampo_numeromateria = "";

}
else{

$estadodocampo_numeromateria = "readonly='true'";

}

}
}
else{
if($lib_numeromateria=="sim"){
$estadodocampo_numeromateria = "";
}
else{
$estadodocampo_numeromateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_anomateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_anomateria = mysql_num_rows($res2);


}

if($quant_vinculos_anomateria<="0"){

$estadodocampo_anomateria = "readonly='true'";

}
else{

if($lib_anomateria=="sim"){

$estadodocampo_anomateria = "";

}
else{

$estadodocampo_anomateria = "readonly='true'";

}

}
}
else{
if($lib_anomateria=="sim"){
$estadodocampo_anomateria = "";
}
else{
$estadodocampo_anomateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_processomateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_processomateria = mysql_num_rows($res2);


}

if($quant_vinculos_processomateria<="0"){

$estadodocampo_processomateria = "readonly='true'";

}
else{

if($lib_processomateria=="sim"){

$estadodocampo_processomateria = "";

}
else{

$estadodocampo_processomateria = "readonly='true'";

}

}
}
else{
if($lib_processomateria=="sim"){
$estadodocampo_processomateria = "";
}
else{
$estadodocampo_processomateria = "readonly='true'";
}
}

}

//------------------------------------------


if($perfilusuario=="Administrador"){
$estadodocampo_palavraschavemateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_palavraschavemateria = mysql_num_rows($res2);


}

if($quant_vinculos_palavraschavemateria<="0"){

$estadodocampo_palavraschavemateria = "readonly='true'";

}
else{

if($lib_palavraschave=="sim"){

$estadodocampo_palavraschavemateria = "";

}
else{

$estadodocampo_palavraschavemateria = "readonly='true'";

}

}
}
else{
if($lib_palavraschave=="sim"){
$estadodocampo_palavraschavemateria = "";
}
else{
$estadodocampo_palavraschavemateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_prazomateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_prazomateria = mysql_num_rows($res2);


}

if($quant_vinculos_prazomateria<="0"){

$estadodocampo_prazomateria = "readonly='true'";

}
else{

if($lib_prazomateria=="sim"){

$estadodocampo_prazomateria = "";

}
else{

$estadodocampo_prazomateria = "readonly='true'";

}

}
}
else{
if($lib_prazomateria=="sim"){
$estadodocampo_prazomateria = "";
}
else{
$estadodocampo_prazomateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_bairromateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_bairromateria = mysql_num_rows($res2);


}

if($quant_vinculos_bairromateria<="0"){

$estadodocampo_bairromateria = "readonly='true'";

}
else{

if($lib_bairromateria=="sim"){

$estadodocampo_bairromateria = "";

}
else{

$estadodocampo_bairromateria = "readonly='true'";

}

}
}
else{
if($lib_bairromateria=="sim"){
$estadodocampo_bairromateria = "";
}
else{
$estadodocampo_bairromateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_assuntoementamateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_assuntoementamateria = mysql_num_rows($res2);


}

if($quant_vinculos_assuntoementamateria<="0"){

$estadodocampo_assuntoementamateria = "readonly='true'";

}
else{

if($lib_assuntoementa=="sim"){

$estadodocampo_assuntoementamateria = "";

}
else{

$estadodocampo_assuntoementamateria = "readonly='true'";

}

}
}
else{
if($lib_assuntoementa=="sim"){
$estadodocampo_assuntoementamateria = "";
}
else{
$estadodocampo_assuntoementamateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_respostapadraomateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_respostapadraomateria = mysql_num_rows($res2);


}

if($quant_vinculos_respostapadraomateria<="0"){

$estadodocampo_respostapadraomateria = "readonly='true'";

}
else{

if($lib_respostapadrao=="sim"){

$estadodocampo_respostapadraomateria = "";

}
else{

$estadodocampo_respostapadraomateria = "readonly='true'";

}

}
}
else{
if($lib_respostapadrao=="sim"){
$estadodocampo_respostapadraomateria = "";
}
else{
$estadodocampo_respostapadraomateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_autoriamateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_autoriamateria = mysql_num_rows($res2);


}

if($quant_vinculos_autoriamateria<="0"){

$estadodocampo_autoriamateria = "readonly='true'";

}
else{

if($lib_autoriamateria=="sim"){

$estadodocampo_autoriamateria = "";

}
else{

$estadodocampo_autoriamateria = "readonly='true'";

}

}
}
else{
if($lib_autoriamateria=="sim"){
$estadodocampo_autoriamateria = "";
}
else{
$estadodocampo_autoriamateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_relatormateria = "";
}
else{

if($destinoatualmateria==$nomeusuario){

if($lib_relatormateria=="sim"){
$estadodocampo_relatormateria = "";
}
}
else{

if($destinoatualmateria<>$nomeusuario){


$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_relatormateria = mysql_num_rows($res2);


}

if($quant_vinculos_relatormateria<="0"){

$estadodocampo_relatormateria = "readonly='true'";

}
else{

if($lib_relatormateria=="sim"){

$estadodocampo_relatormateria = "";

}
else{

$estadodocampo_relatormateria = "readonly='true'";

}

}
}
else{
if($lib_relatormateria=="sim"){
$estadodocampo_relatormateria = "";
}
else{
$estadodocampo_relatormateria = "readonly='true'";
}
}

}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_statusmateria = "";
}
else{

if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_statusmateria = mysql_num_rows($res2);


}

if($quant_vinculos_statusmateria<="0"){

$estadodocampo_statusmateria = "readonly='true'";

}
else{

if($lib_statusmateria=="sim"){

$estadodocampo_statusmateria = "";

}
else{

$estadodocampo_statusmateria = "readonly='true'";

}

}
}
else{
if($lib_statusmateria=="sim"){
$estadodocampo_statusmateria = "";
}
else{
$estadodocampo_statusmateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_destinoatualmateria = "";

}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_destinoatualmateria = mysql_num_rows($res2);


}

if($quant_vinculos_destinoatualmateria<="0"){

$estadodocampo_destinoatualmateria = "readonly='true'";

}
else{

if($lib_destinoatualmateria=="sim"){

$estadodocampo_destinoatualmateria = "";

}
else{

$estadodocampo_destinoatualmateria = "readonly='true'";

}

}
}
else{
if($lib_destinoatualmateria=="sim"){
$estadodocampo_destinoatualmateria = "";
}
else{
$estadodocampo_destinoatualmateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_ritomateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_ritomateria = mysql_num_rows($res2);


}

if($quant_vinculos_ritomateria<="0"){

$estadodocampo_ritomateria = "readonly='true'";

}
else{

if($lib_ritomateria=="sim"){

$estadodocampo_ritomateria = "";

}
else{

$estadodocampo_ritomateria = "readonly='true'";

}

}
}
else{
if($lib_ritomateria=="sim"){
$estadodocampo_ritomateria = "";
}
else{
$estadodocampo_ritomateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_turnovotacaomateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_turnodevotacaomateria = mysql_num_rows($res2);


}

if($quant_vinculos_turnodevotacaomateria<="0"){

$estadodocampo_turnovotacaomateria = "readonly='true'";

}
else{

if($lib_turnodevotacaomateria=="sim"){

$estadodocampo_turnovotacaomateria = "";

}
else{

$estadodocampo_turnovotacaomateria = "readonly='true'";

}

}
}
else{
if($lib_turnodevotacaomateria=="sim"){
$estadodocampo_turnovotacaomateria = "";
}
else{
$estadodocampo_turnovotacaomateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_tipovotacaomateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_tipodevotacaomateria = mysql_num_rows($res2);


}

if($quant_vinculos_tipodevotacaomateria<="0"){

$estadodocampo_tipovotacaomateria = "readonly='true'";

}
else{

if($lib_tipodevotacaomateria=="sim"){

$estadodocampo_tipovotacaomateria = "";

}
else{

$estadodocampo_tipovotacaomateria = "readonly='true'";

}

}
}
else{
if($lib_tipodevotacaomateria=="sim"){
$estadodocampo_tipovotacaomateria = "";
}
else{
$estadodocampo_tipovotacaomateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_quorummateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_quorummateria = mysql_num_rows($res2);


}

if($quant_vinculos_quorummateria<="0"){

$estadodocampo_quorummateria = "readonly='true'";

}
else{

if($lib_quorummateria=="sim"){

$estadodocampo_quorummateria = "";

}
else{

$estadodocampo_quorummateria = "readonly='true'";

}

}
}
else{
if($lib_quorummateria=="sim"){
$estadodocampo_quorummateria = "";
}
else{
$estadodocampo_quorummateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_resultadomateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_resultadomateria = mysql_num_rows($res2);


}

if($quant_vinculos_resultadomateria<="0"){

$estadodocampo_resultadomateria = "readonly='true'";

}
else{

if($lib_resultadomateria=="sim"){

$estadodocampo_resultadomateria = "";

}
else{

$estadodocampo_resultadomateria = "readonly='true'";

}

}
}
else{
if($lib_resultadomateria=="sim"){
$estadodocampo_resultadomateria = "";
}
else{
$estadodocampo_resultadomateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_dataresultadomateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_dataresultadomateria = mysql_num_rows($res2);


}

if($quant_vinculos_dataresultadomateria<="0"){

$estadodocampo_dataresultadomateria = "readonly='true'";

}
else{

if($lib_dataresultadomateria=="sim"){

$estadodocampo_dataresultadomateria = "";

}
else{

$estadodocampo_dataresultadomateria = "readonly='true'";

}

}
}
else{
if($lib_dataresultadomateria=="sim"){
$estadodocampo_dataresultadomateria = "";
}
else{
$estadodocampo_dataresultadomateria = "readonly='true'";
}
}

}

//------------------------------------------


if($perfilusuario=="Administrador"){
$estadodocampo_adiadoparamateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_adiadoparamateria = mysql_num_rows($res2);


}

if($quant_vinculos_adiadoparamateria<="0"){

$estadodocampo_adiadoparamateria = "readonly='true'";

}
else{

if($lib_adiadoparamateria=="sim"){

$estadodocampo_adiadoparamateria = "";

}
else{

$estadodocampo_adiadoparamateria = "readonly='true'";

}

}
}
else{
if($lib_adiadoparamateria=="sim"){
$estadodocampo_adiadoparamateria = "";
}
else{
$estadodocampo_adiadoparamateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_dataarquivamentomateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_dataarquivamentomateria = mysql_num_rows($res2);


}

if($quant_vinculos_dataarquivamentomateria<="0"){

$estadodocampo_dataarquivamentomateria = "readonly='true'";

}
else{

if($lib_dataarquivamentomateria=="sim"){

$estadodocampo_dataarquivamentomateria = "";

}
else{

$estadodocampo_dataarquivamentomateria = "readonly='true'";

}

}
}
else{
if($lib_dataarquivamentomateria=="sim"){
$estadodocampo_dataarquivamentomateria = "";
}
else{
$estadodocampo_dataarquivamentomateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_corredormateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_corredormateria = mysql_num_rows($res2);


}

if($quant_vinculos_corredormateria<="0"){

$estadodocampo_corredormateria = "readonly='true'";

}
else{

if($lib_corredormateria=="sim"){

$estadodocampo_corredormateria = "";

}
else{

$estadodocampo_corredormateria = "readonly='true'";

}

}
}
else{
if($lib_corredormateria=="sim"){
$estadodocampo_corredormateria = "";
}
else{
$estadodocampo_corredormateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_numcaixamateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_numcaixamateria = mysql_num_rows($res2);


}

if($quant_vinculos_numcaixamateria<="0"){

$estadodocampo_numcaixamateria = "readonly='true'";

}
else{

if($lib_numerocaixamateria=="sim"){

$estadodocampo_numcaixamateria = "";

}
else{

$estadodocampo_numcaixamateria = "readonly='true'";

}

}
}
else{
if($lib_numerocaixamateria=="sim"){
$estadodocampo_numcaixamateria = "";
}
else{
$estadodocampo_numcaixamateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_armariomateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_armariomateria = mysql_num_rows($res2);


}

if($quant_vinculos_armariomateria<="0"){

$estadodocampo_armariomateria = "readonly='true'";

}
else{

if($lib_armariomateria=="sim"){

$estadodocampo_armariomateria = "";

}
else{

$estadodocampo_armariomateria = "readonly='true'";

}

}
}
else{
if($lib_armariomateria=="sim"){
$estadodocampo_armariomateria = "";
}
else{
$estadodocampo_armariomateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_prateleiramateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_prateleiramateria = mysql_num_rows($res2);


}

if($quant_vinculos_prateleiramateria<="0"){

$estadodocampo_prateleiramateria = "readonly='true'";

}
else{

if($lib_prateleiramateria=="sim"){

$estadodocampo_prateleiramateria = "";

}
else{

$estadodocampo_prateleiramateria = "readonly='true'";

}

}
}
else{
if($lib_prateleiramateria=="sim"){
$estadodocampo_prateleiramateria = "";
}
else{
$estadodocampo_prateleiramateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_tramitemateria = "";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_tramitemateria = mysql_num_rows($res2);


}

if($quant_vinculos_tramitemateria<="0"){

$estadodocampo_tramitemateria = "readonly='true'";

}
else{

if($lib_tramitemateria=="sim"){

$estadodocampo_tramitemateria = "";

}
else{

$estadodocampo_tramitemateria = "readonly='true'";

}

}
}
else{
if($lib_tramitemateria=="sim"){
$estadodocampo_tramitemateria = "";
}
else{
$estadodocampo_tramitemateria = "readonly='true'";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_anexointegralmateria = "<select class='class01' name='tipoanexo' id='tipoanexo'>
          <option>Integral</option>
          <option selected>Acessório</option>
        </select><input class='class01' type='file' name='anexointegralmateria' id='anexointegralmateria'><input class='class01' type='submit' name='button' id='button' value='Anexar'>";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_anexointegralmateria = mysql_num_rows($res2);


}

if($quant_vinculos_anexointegralmateria<="0"){

$estadodocampo_anexointegralmateria = "";

}
else{

if($lib_anexointegralmateria=="sim"){

$estadodocampo_anexointegralmateria = "<select class='class01' name='tipoanexo' id='tipoanexo'>
          <option>Integral</option>
          <option selected>Acessório</option>
        </select><input class='class01' type='file' name='anexointegralmateria' id='anexointegralmateria'><input class='class01' type='submit' name='button' id='button' value='Anexar'>";



}
else{

$estadodocampo_anexointegralmateria = "";

}

}
}
else{
if($lib_anexointegralmateria=="sim"){
$estadodocampo_anexointegralmateria = "<select class='class01' name='tipoanexo' id='tipoanexo'>
          <option>Integral</option>
          <option selected>Acessório</option>
        </select><input class='class01' type='file' name='anexointegralmateria' id='anexointegralmateria'><input class='class01' type='submit' name='button' id='button' value='Anexar'>";
}
else{
$estadodocampo_anexointegralmateria = "";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_trocaranexodelado_ed = "<input class='class01' type='submit' name='button8' id='button11' value='&gt;&gt;'>";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_trocardelado_ed_materia = mysql_num_rows($res2);


}

if($quant_vinculos_trocardelado_ed_materia<="0"){

$estadodocampo_trocaranexodelado_ed = "";

}
else{

if($lib_trocaranexodelado=="sim"){

$estadodocampo_trocaranexodelado_ed = "<input class='class01' type='submit' name='button8' id='button11' value='&gt;&gt;'>";

}
else{

$estadodocampo_trocaranexodelado_ed = "";

}

}
}
else{
if($lib_trocaranexodelado=="sim"){
$estadodocampo_trocaranexodelado_ed = "<input class='class01' type='submit' name='button8' id='button11' value='&gt;&gt;'>";
}
else{
$estadodocampo_trocaranexodelado_ed = "";
}
}

}

//------------------------------

if($perfilusuario=="Administrador"){
$estadodocampo_trocaranexodelado_de = "<input class='class01' type='submit' name='button8' id='button11' value='&lt;&lt;'>";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_trocardelado_de_materia = mysql_num_rows($res2);


}

if($quant_vinculos_trocardelado_de_materia<="0"){

$estadodocampo_trocaranexodelado_de = "";

}
else{

if($lib_trocaranexodelado=="sim"){
$estadodocampo_trocaranexodelado_de = "<input class='class01' type='submit' name='button8' id='button11' value='&lt;&lt;'>";
}
else{
$estadodocampo_trocaranexodelado_de = "";
}

}
}
else{
if($lib_trocaranexodelado=="sim"){
$estadodocampo_trocaranexodelado_de = "<input class='class01' type='submit' name='button8' id='button11' value='&lt;&lt;'>";
}
else{
$estadodocampo_trocaranexodelado_de = "";
}
}

}


//------------------------------------------

if($perfilusuario=="Administrador"){
//$estadodocampo_excluirarquivos = "";
$estadodocampo_excluirarquivos = "<input class='class01' type='submit' name='button8' id='button10' value='x'>";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_excluirarquivosmateria = mysql_num_rows($res2);


}

if($quant_vinculos_excluirarquivosmateria<="0"){

$estadodocampo_excluirarquivos = "";

}
else{

if($lib_excluirarquivos=="sim"){
$estadodocampo_excluirarquivos = "<input class='class01' type='submit' name='button8' id='button10' value='x'>";
}
else{
$estadodocampo_excluirarquivos = "";
}

}
}
else{
if($lib_excluirarquivos=="sim"){
$estadodocampo_excluirarquivos = "<input class='class01' type='submit' name='button8' id='button10' value='x'>";
}
else{
$estadodocampo_excluirarquivos = "";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
//$estadodocampo_excluirarquivos = "";
$estadodocampo_botaosalvar = "<input class='class01' type='submit' name='button2' id='button2' value='Salvar'>";
}
else{
if($destinoatualmateria<>$nomeusuario){

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_botaosalvarmateria = mysql_num_rows($res2);


}

if($quant_vinculos_botaosalvarmateria<="0"){

$estadodocampo_botaosalvar = "";

}
else{

if($lib_botaosalvar=="sim"){
$estadodocampo_botaosalvar = "<input class='class01' type='submit' name='button2' id='button2' value='Salvar'>";
}
else{
$estadodocampo_botaosalvar = "";
}

}
}
else{
if($lib_botaosalvar=="sim"){
$estadodocampo_botaosalvar = "<input class='class01' type='submit' name='button2' id='button2' value='Salvar'>";
}
else{
$estadodocampo_botaosalvar = "";
}
}

}

//------------------------------------------

if($perfilusuario=="Administrador"){
//$estadodocampo_excluirarquivos = "";
$estadodocampo_botaoimprimirmateria = "<input class='class01' type='submit' name='button2' id='button2' value='Imprimir Matéria'>";
}
else{

if($destinoatualmateria<>$nomeusuario){

if($perfilusuario=="Consulta"){

if($lib_botaoimprimirmateria=="sim"){
$estadodocampo_botaoimprimirmateria = "<input class='class01' type='submit' name='button2' id='button2' value='Imprimir Matéria'>";
}
else{
$estadodocampo_botaoimprimirmateria = "";
}

}
else{


$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$quant_vinculos_botaoimprimirmateria = mysql_num_rows($res2);


}

if($quant_vinculos_botaoimprimirmateria<="0"){

$estadodocampo_botaoimprimirmateria = "";

}
else{

if($lib_botaoimprimirmateria=="sim"){
$estadodocampo_botaoimprimirmateria = "<input class='class01' type='submit' name='button2' id='button2' value='Imprimir Matéria'>";
}

else{
$estadodocampo_botaoimprimirmateria = "";
}

}
}

}
else{
if($lib_botaoimprimirmateria=="sim"){
$estadodocampo_botaoimprimirmateria = "<input class='class01' type='submit' name='button2' id='button2' value='Imprimir Matéria'>";
}
else{
$estadodocampo_botaoimprimirmateria = "";
}
}

}

//------------------------------------------



?>


<?
$codigo_mensagem = $_POST['codigo_mensagem'];

$mensagem_lida = $_POST['mensagem_lida'];



if($mensagem_lida=="Lida"){

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`mensagens_ao_funcionario` set `codigo` = '$codigo_mensagem',`mensagem_lida` = '$mensagem_lida',`data_leitura` = '$data_leitura',`hora_leitura` = '$hora_leitura' where `mensagens_ao_funcionario`. `codigo` = '$codigo_mensagem' limit 1 ";

}



mysql_query($comando,$conexao);



}

$sql = "SELECT * FROM mensagens_ao_funcionario where nome_operador = '$nomeusuario' and mensagem_lida = 'Não lida'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registro_de_mensagem++;

}



?>
</p>
<table width="100%" border="0" cellspacing="4">
  <tr>
    <td width="15%"><strong>Ol&aacute;! Seja bem vindo!<br>
    </strong><strong><font color="#0000FF"><? echo $nomeusuario; ?> </font></strong></td>
    <td width="17%"><strong>Perfil</strong><br>
        <span class="style2"><? echo $perfilusuario; ?></span></td>
    <td width="30%"><strong>E-mail:</strong><br>
        <strong><font color="#0000FF"><? echo "$emailusuario"; ?></font></strong> </td>
    <td width="15%"><strong>Celular:<font color="#0000FF"><br>
            <? echo $celularusuario; ?> </font><font color="#0000FF"> </font></strong></td>
    <td width="23%" valign="top"><div align="center"> <strong><font color="#0000FF">Confira a data de hoje<br>
      </font></strong> <strong><font color="#0000FF"><? echo $data_hoje; ?></font></strong>
      </p>
    </div></td>
  </tr>
</table>
<table width="100%"  border="0">
  <tr>
    <td><div align="center">
      <form name="form3" method="post" action="../index.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <? 
		if($perfilusuario=="Consulta"){
	  
	  }
	  else{
		if($registro_de_mensagem<="0"){ echo "<input class='class01' type='submit' name='button4' id='button4' value='Inicio'>"; } } ?>
      </form>
    </div></td>
    <td><div align="center">
      <form name="form3" method="post" action="inclusaomateria.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? 
		if($perfilusuario=="Consulta"){
	  
	  }
	  else{
		if($registro_de_mensagem<="0"){ echo "<input class='class01' type='submit' name='Submit2' value='Incluir'>"; } } ?>
      </form>
    </div></td>
    <td><div align="center">
      <form name="form3" method="post" action="gridmaterias.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if($registro_de_mensagem<="0"){ echo "<input class='class01' type='submit' name='Submit2' value='Tramitaçao'>"; } ?>
      </form>
    </div></td>
    <td><div align="center">
      <form name="form3" method="post" action="../ordemdodia/index.php">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? 
		if($perfilusuario=="Consulta"){
	  
	  }
	  else{
		if(($registro_de_mensagem<="0") && ($realizaordemdodia=="sim")){ echo "<input class='class01' type='submit' name='Submit3' value='Ordem do Dia'>"; } } ?>
        </div>
      </form>
    </div></td>
    <td><form name="form3" method="post" action="../respostaspadrao/menu.php">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? 
	  if($perfilusuario=="Consulta"){
	  
	  }
	  else{
	  if($registro_de_mensagem<="0"){ echo "<input class='class01' type='submit' name='Submit5' value='Resposta Padr&atilde;o'>"; } } ?>
        </div>
    </form></td>
    <td><form name="form3" method="post" action="relatorios/relatorio_dinamico.php">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? 
		if($perfilusuario=="Consulta"){
	  
	  }
	  else{
		if($registro_de_mensagem<="0"){ echo "<input class='class01' type='submit' name='Submit4' value='Relatórios'>"; } } ?>
      </div>
    </form></td>
  </tr>
  <tr>
    <td width="14%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
    <td width="15%"><div align="center"></div></td>
    <td width="13%">&nbsp;</td>
    <td width="13%">&nbsp;</td>
    <td width="14%">&nbsp;</td>
  </tr>
</table>
<table width="100%"  border="0" align="center">
  <tr>
    <td width="9%"><div align="center"></div></td>
    <td width="21%"><div align="left">
      <form action="gridmaterias.php" method="post" name="form3" target="_top">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <? if($registro_de_mensagem<="0"){ echo "<input class='class01' type='submit' name='button3' id='button3' value='Fechar'>"; } ?>
      </form>
    </div></td>
    <td width="24%">&nbsp;</td>
    <td width="23%"><form action="imprimirmateria.php" method="post" name="form3" target="_blank">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <strong>
      <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "imprimir_a_materia"; ?>">
      </strong>
      <input name="codigomateria" type="hidden" id="codigomateria" value="<? echo "$codigomateria"; ?>">
      <strong><font color="#0000FF">
      <input name="usuarioalterou" type="hidden" id="usuarioalterou" value="<? echo $nomeusuario; ?>">
      <input name="emailusuarioalterou" type="hidden" id="emailusuarioalterou" value="<? echo $emailusuario; ?>">
      <input name="perfilutilizado" type="hidden" id="perfilutilizado" value="<? echo "$perfilusuario"; ?>">
      </font></strong>
      <? 
if($registro_de_mensagem<="0"){ echo "$estadodocampo_botaoimprimirmateria"; 

} 
?>
    </form></td>
    <td width="16%">&nbsp;</td>
    <td width="7%" align="right">&nbsp;</td>
  </tr>
</table>


  <form name="form9" method="post" action="editar.php">
  <?

$sql = "SELECT * FROM mensagens_ao_funcionario where nome_operador = '$nomeusuario' and mensagem_lida = 'Não lida'";
$res = mysql_query($sql);
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg_mensagem++;



$codigo_mensagem = $linha[0];

$nome_operador = $linha[1];

$data_mensagem = $linha[2];

$hora_mensagem = $linha[3];

$mensagem = $linha[4];

$mensagem_lida = $linha[5];

$data_leitura = $linha[6];

$hora_leitura = $linha[7];

$assunto = $linha[8];


?>
  <table width="100%"  border="0">
    <tr>
      <td width="9%"><div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "tramitarmateria"; ?>">
        <input name="codigomateria" type="hidden" id="codigomateria" value="<? echo "$codigomateria"; ?>">
<? echo $data_mensagem; ?></div></td>
      <td width="9%"><div align="center"><? echo $hora_mensagem; ?></div></td>
      <td width="62%"><div align="center">
        <textarea name="mensagem" cols="120" rows="7" id="mensagem"><? echo "$assunto - $mensagem"; ?></textarea>
      </div></td>
      <td width="20%"><div align="center">
        <input name="codigo_mensagem" type="hidden" id="codigo_mensagem" value="<? echo $codigo_mensagem; ?>">
        <input name="mensagem_lida" type="hidden" id="mensagem_lida" value="Lida">
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="center">
        <input class="class01" type="submit" name="Submit" value="Declaro que li a mensagem">
      </div></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <? } ?>
</form>
<? if($registro_de_mensagem<="0"){ ?>
<form action="editar.php" method="post" enctype="multipart/form-data" name="form2">
  <table width="100%" border="0" cellspacing="0">
    <tr>
      <td>&nbsp;</td>
      <td colspan="4" background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Informa&ccedil;&otilde;es sobre a Mat&eacute;ria
            <font color="#0000FF">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            </font>
          <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alterarmateria"; ?>">
      </strong>
          <input name="codigomateria" type="hidden" id="codigomateria" value="<? echo "$codigomateria"; ?>">
      </div></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="9%"><div align="center"></div></td>
      <td width="21%" background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Tipo</strong></div></td>
      <td width="25%" background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Numero</strong></div></td>
      <td width="20%" background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Ano</strong></div></td>
      <td width="17%" background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Processo</strong></div></td>
      <td width="8%"><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"> <? echo $tipomateria; ?>
        <input name="tipomateria" type="hidden" id="tipomateria" value="<? echo $tipomateria; ?>">
        <input name="tipomateria2" type="hidden" id="tipomateria2" value="<? echo $tipomateria; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <input name="numeromateria" <? echo "$estadodocampo_numeromateria"; ?>type="text" class="class02" id="numeromateria" value="<? echo "$numeromateria"; ?>" size="10">
        <input name="numeromateria2" type="hidden" class="class02" id="numeromateria2" value="<? echo "$numeromateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <input name="anomateria" <? echo "$estadodocampo_anomateria"; ?> type="text" class="class02" id="anomateria" value="<? echo "$anomateria"; ?>" size="5" maxlength="4">
        <input name="anomateria2" type="hidden" class="class02" id="anomateria2" value="<? echo "$anomateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <input name="processo" <? echo "$estadodocampo_processomateria"; ?> type="text" class="class02" id="processo" value="<? echo "$processomateria"; ?>">
        <input name="processo2" type="hidden" class="class02" id="processo2" value="<? echo "$processomateria"; ?>">
</div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Palavras chave</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Prazo</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Bairro</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Protocolo</strong></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <input name="palavraschavemateria" <? echo "$estadodocampo_palavraschavemateria"; ?> type="text" class="class02" id="palavraschavemateria" value="<? echo "$palavraschavemateria"; ?>">
        <input name="palavraschavemateria2" type="hidden" class="class02" id="palavraschavemateria2" value="<? echo "$palavraschavemateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <input name="prazomateria" <? echo "$estadodocampo_prazomateria"; ?> type="text" class="class02" id="prazomateria" value="<? echo "$prazomateria"; ?>">
        <input name="prazomateria2" type="hidden" class="class02" id="prazomateria2" value="<? echo "$prazomateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <select class="class02" name="bairromateria" <? echo "$estadodocampo_bairromateria"; ?> id="bairromateria">
        <option selected><? echo "$bairromateria"; ?></option>
          <?
if($estadodocampo_bairromateria=="readonly='true'"){
		
}
else{

if($perfilusuario=="Administrador"){

$sql = "select * from bairros where bairro <> '$bairromateria' order by bairro asc";
$result = mysql_query($sql);
while($x=mysql_fetch_array($result)){
echo "<option>".$x['bairro']."</option>";
}

}
else{

if($perfilusuario=="Vereador(a)"){

}
else{

$sql2 = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$nomeusuario_autor_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql3 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registrodevinculos  = mysql_num_rows($res3);



}

if((empty($registrodevinculos)) or ($registrodevinculos<="0")){

if(($estadodocampo_bairromateria=="") && ($destinoatualmateria==$nomeusuario)){

if($lib_autoriamateria=="sim"){

$sql = "select * from bairros where bairro <> '$bairromateria' order by bairro asc";
$result = mysql_query($sql);
while($x=mysql_fetch_array($result)){
echo "<option>".$x['bairro']."</option>";
}

}
}
}
else{

if($lib_autoriamateria=="sim"){

$sql = "select * from bairros where bairro <> '$bairromateria' order by bairro asc";
$result = mysql_query($sql);
while($x=mysql_fetch_array($result)){
echo "<option>".$x['bairro']."</option>";
}

}


}
}
}
}


?>
        </select>
        <input name="bairromateria2" type="hidden" class="class02" id="bairromateria2" value="<? echo "$bairromateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><? //echo $protocolomateria; ?>
          <input name="protocolomateria" type="hidden" id="protocolomateria" value="<? echo "$protocolomateria"; ?>">
          <?
require_once('barcode.inc.php'); 
 
$codigodebarras = array("$protocolomateria");
 
for ($i = 0; $i < 1; $i++)
{
  foreach($codigodebarras as $protocolomateria);
  new barCodeGenrator($protocolomateria,1,'anexosdematerias/'.$protocolomateria.'/barcode.gif', 90, 60, true);
  echo ' ';
  echo "<img src='anexosdematerias/$protocolomateria/barcode.gif'>"; 
}
?>
      </div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Assunto Ementa</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Resposta Padr&atilde;o</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"></div></td>
      <td valign="top" background="../../imagens_sistema/fundocelulas1.png"><div align="center"></div>        <div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <textarea class="class02" name="assuntoementamateria" <? echo "$estadodocampo_assuntoementamateria"; ?> id="assuntoementamateria" cols="45" rows="5"><? echo "$assuntoementamateria"; ?></textarea>
        <input name="assuntoementamateria2" type="hidden" id="assuntoementamateria2" value="<? echo "$assuntoementamateria"; ?>">
      </div></td>
      <td valign="top" background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <select class="class02" name="respostapadraomateria" <? echo "$estadodocampo_respostapadraomateria"; ?> id="respostapadraomateria">
        <option><? echo "$respostapadraomateria"; ?></option>
        <?
if($estadodocampo_respostapadraomateria=="readonly='true'"){
		
}
else{

if($perfilusuario=="Administrador"){

$sql = "select * from respostaspadrao where codigousuario = '$codigousuario' and statusresposta = 'Ativo' order by titulo asc";
$result = mysql_query($sql);
while($x=mysql_fetch_array($result)){
echo "<option>".$x['titulo']."</option>";
}


}
else{

if($perfilusuario=="Vereador(a)"){

if($lib_respostapadrao=="sim"){

$sql = "select * from respostaspadrao where codigousuario = '$codigousuario' and statusresposta = 'Ativo' order by titulo asc";
$result = mysql_query($sql);
while($x=mysql_fetch_array($result)){
echo "<option>".$x['titulo']."</option>";
}

}


}
else{

$sql2 = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$nomeusuario_autor_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql3 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registrodevinculos  = mysql_num_rows($res3);



}

if((empty($registrodevinculos)) or ($registrodevinculos<="0")){

if(($estadodocampo_respostapadraomateria=="") && ($destinoatualmateria==$nomeusuario)){

if($lib_respostapadrao=="sim"){


$sql = "select * from respostaspadrao where codigousuario = '$codigousuario' and statusresposta = 'Ativo' order by titulo asc";
$result = mysql_query($sql);
while($x=mysql_fetch_array($result)){
echo "<option>".$x['titulo']."</option>";
}

}
}
}
else{

if($lib_respostapadrao=="sim"){

$sql = "select * from respostaspadrao where codigousuario = '$codigousuario' and statusresposta = 'Ativo' order by titulo asc";
$result = mysql_query($sql);
while($x=mysql_fetch_array($result)){
echo "<option>".$x['titulo']."</option>";
}


}
}
}
}
}
?>
        </select>
        <input name="respostapadraomateria2" type="hidden" id="respostapadraomateria2" value="<? echo "$respostapadraomateria"; ?>">
        <input name="respostapadraomateria3" type="hidden" id="respostapadraomateria3" value="<? echo "$respostapadraocompletamateria"; ?>">
      </div></td>
      <td valign="top" background="../../imagens_sistema/fundocelulas1.png"><div align="center"></div></td>
      <td valign="top" background="../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
      <td><div align="center"></div></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td colspan="4" background="../../imagens_sistema/fundocelulas2.png"><div align="center" class="style1"><strong>Informa&ccedil;&otilde;es sobre a Autoria/Relator/Status/Destino Atual</strong></div>        
        <div align="center" class="style1"></div>        <div align="center" class="style1"></div>        <div align="center" class="style1"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Autoria</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Relator</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Status</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Destino Atual
        <?
$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$perfildodestinoatual = $linha['2'];

}

echo "<b>($perfildodestinoatual)</b>"; 
	    ?>
      </strong></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center">
        <select name="autoriamateria" <? echo "$estadodocampo_autoriamateria"; ?> class="class02" id="autoriamateria">
        <option selected><? echo "$autoriamateria"; ?></option>
         <?
if($estadodocampo_autoriamateria=="readonly='true'"){
		
		}
		else{
		
if($perfilusuario=="Administrador"){

$sql = "SELECT * FROM usuarios where nome <> '$autoriamateria' and statususuario = 'Ativo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$user = $linha['1'];

echo "<option>"."$user"."</option>"; 
}


}
else{

if($perfilusuario=="Vereador(a)"){

}
else{

$sql2 = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$nomeusuario_autor_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql3 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registrodevinculos  = mysql_num_rows($res3);



}

if((empty($registrodevinculos)) or ($registrodevinculos<="0")){

if(($estadodocampo_autoriamateria=="") && ($destinoatualmateria==$nomeusuario)){

if($lib_autoriamateria=="sim"){


$sql4 = "SELECT * FROM usuarios where nome <> '$autoriamateria' and statususuario = 'Ativo'";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$user = $linha['1'];
$userpartidario = $linha['8'];

echo "<option>"."$user"."</option>";
}

}
}
}
else{

if($lib_autoriamateria=="sim"){

$sql5 = "SELECT * FROM usuarios where nome <> '$autoriamateria' and statususuario = 'Ativo'";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$user = $linha['1'];
$userpartidario = $linha['8'];

echo "<option>"."$user"."</option>";
}

}

}
}
}
}

?>
        </select>
        <input name="autoriamateria2" type="hidden" id="autoriamateria2" value="<? echo "$autoriamateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center">
        <select class="class02" name="relatormateria" <? echo "$estadodocampo_relatormateria"; ?> id="relatormateria">
        <option selected><? echo "$relatormateria"; ?></option>
<?

if($estadodocampo_relatormateria=="readonly='true'"){
		
}
else{

if($perfilusuario=="Administrador"){

$sql = "SELECT * FROM usuarios where nome <> '$relatormateria' and statususuario = 'Ativo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$user = $linha['1'];

echo "<option>"."$user"."</option>"; 
}


}
else{

if($perfilusuario=="Vereador(a)"){

}
else{


$sql2 = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql3 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registrodevinculos  = mysql_num_rows($res3);



}

if((empty($registrodevinculos)) or ($registrodevinculos<="0")){

if(($estadodocampo_relatormateria=="") && ($destinoatualmateria==$nomeusuario)){

if($lib_relatormateria=="sim"){

$sql4 = "SELECT * FROM usuarios where nome <> '$relatormateria' and statususuario = 'Ativo'";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$user = $linha['1'];

echo "<option>"."$user"."</option>";


}
}

}

}
else{

if($lib_relatormateria=="sim"){


$sql5 = "SELECT * FROM usuarios where nome <> '$destinoatualmateria' and statususuario = 'Ativo'";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$user = $linha['1'];

echo "<option>"."$user"."</option>";


}
}

}




}

}
    }

?>
        </select>
        <input name="relatormateria2" type="hidden" id="relatormateria2" value="<? echo "$relatormateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center">
        <select class="class02" name="statusmateria" <? echo "$estadodocampo_statusmateria"; ?> id="statusmateria">
        <option selected><? echo "$statusmateria"; ?></option>
        <?
		
if($estadodocampo_statusmateria=="readonly='true'"){
		
}
else{

if($perfilusuario=="Administrador"){

$sql = "SELECT * FROM statusmaterias where status <> '$statusmateria' and condicao = 'tramitacaomateria' order by status asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusdamateria = $linha['1'];

echo "<option>"."$statusdamateria"."</option>";

}
}
else{

		
if($perfilusuario=="Vereador(a)"){

}
else{

$sql = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql2 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$registrodevinculos  = mysql_num_rows($res2);



}

if((empty($registrodevinculos)) or ($registrodevinculos<="0")){

if(($estadodocampo_statusmateria=="") && ($destinoatualmateria==$nomeusuario)){

$sql = "SELECT * FROM statusmaterias where status <> '$statusmateria' and condicao = 'tramitacaomateria' order by status asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusdamateria = $linha['1'];

echo "<option>"."$statusdamateria"."</option>";

}
}


}
else{
		
$sql = "SELECT * FROM statusmaterias where status <> '$statusmateria' and condicao = 'tramitacaomateria' order by status asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusdamateria = $linha['1'];

echo "<option>"."$statusdamateria"."</option>";

}
}

}
}

}

?>
        </select>
        <input name="statusmateria2" type="hidden" id="statusmateria2" value="<? echo "$statusmateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center">
        <select class="class02" name="destinoatualmateria" <? echo "$estadodocampo_destinoatualmateria"; ?> id="destinoatualmateria">
        <option selected><? echo "$destinoatualmateria"; ?></option>
        <?
if($estadodocampo_destinoatualmateria=="readonly='true'"){

}
else{

if($perfilusuario=="Administrador"){

$sql = "SELECT * FROM usuarios where nome <> '$destinoatualmateria' and statususuario = 'Ativo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$user = $linha['1'];

echo "<option>"."$user"."</option>";

}
}
else{


if(($perfilusuario=="Vereador(a)") or ($perfilusuario=="Assessor(a) Parlamentar")){

$sql2 = "SELECT * FROM usuarios where responsavelprotocolo = 'Sim' and statususuario = 'Ativo' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$user = $linha['1'];

echo "<option>"."$user"."</option>";

}


}
else{



$sql3 = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$nomeusuario_do_destino_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql4 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {
$registrodevinculos  = mysql_num_rows($res4);



}

if((empty($registrodevinculos)) or ($registrodevinculos<="0")){

if(($estadodocampo_statusmateria=="") && ($destinoatualmateria==$nomeusuario)){

$sql5 = "SELECT * FROM usuarios where nome <> '$destinoatualmateria' and statususuario = 'Ativo'";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$user = $linha['1'];

echo "<option>"."$user"."</option>";


}
}

}
else{

$sql5 = "SELECT * FROM usuarios where nome <> '$destinoatualmateria' and statususuario = 'Ativo'";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$user = $linha['1'];

echo "<option>"."$user"."</option>";


}
}



}
}


}

?>
        </select>
        <input name="destinoatualmateria2" type="hidden" id="destinoatualmateria2" value="<? echo "$destinoatualmateria"; ?>">
      </div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"></div></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td colspan="4" background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Informa&ccedil;&otilde;es sobre a Vota&ccedil;&atilde;o</strong></div>        <div align="center"></div>        <div align="center"></div>        <div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Rito</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Turno de Vota&ccedil;&atilde;o</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Tipo de Vota&ccedil;&atilde;o</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Qu&oacute;rum</strong></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <select class="class02" name="ritomateria" <? echo "$estadodocampo_ritomateria"; ?> id="ritomateria">
        <option selected><? echo "$ritomateria"; ?></option>
         <?
if($estadodocampo_ritomateria=="readonly='true'"){

}
else{

if($perfilusuario=="Administrador"){

$sql = "SELECT * FROM ritos order by rito asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$rito = $linha['1'];

echo "<option>"."$rito"."</option>";

}


}
else{

if($perfilusuario=="Vereador(a)"){

if($lib_ritomateria=="sim"){


}


}
else{

$sql2 = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$nomeusuario_autor_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql3 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registrodevinculos  = mysql_num_rows($res3);



}

if((empty($registrodevinculos)) or ($registrodevinculos<="0")){

if(($estadodocampo_ritomateria=="") && ($destinoatualmateria==$nomeusuario)){

if($lib_ritomateria=="sim"){

$sql = "SELECT * FROM ritos order by rito asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$rito = $linha['1'];

echo "<option>"."$rito"."</option>";

}


}
}
}
else{

if($lib_ritomateria=="sim"){

$sql = "SELECT * FROM ritos order by rito asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$rito = $linha['1'];

echo "<option>"."$rito"."</option>";

}


}
}
}
}
}

?>
        </select>
        <input name="ritomateria2" type="hidden" id="ritomateria2" value="<? echo "$ritomateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <select class="class02" name="turnovotacaomateria" <? echo "$estadodocampo_turnovotacaomateria"; ?> id="turnovotacaomateria">
        <option selected><? echo "$turnovotacaomateria"; ?></option>
<?
if($estadodocampo_turnovotacaomateria=="readonly='true'"){

}
else{

if($perfilusuario=="Administrador"){

$sql = "SELECT * FROM turnosdevotacoes order by turnovotacao asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$turnovotacao = $linha['1'];

echo "<option>"."$turnovotacao"."</option>";

}


}
else{

if($perfilusuario=="Vereador(a)"){

if($lib_turnodevotacaomateria=="sim"){


}


}
else{

$sql2 = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$nomeusuario_autor_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql3 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registrodevinculos  = mysql_num_rows($res3);



}

if((empty($registrodevinculos)) or ($registrodevinculos<="0")){

if(($estadodocampo_turnovotacaomateria=="") && ($destinoatualmateria==$nomeusuario)){

if($lib_turnodevotacaomateria=="sim"){

$sql = "SELECT * FROM turnosdevotacoes order by turnovotacao asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$turnovotacao = $linha['1'];

echo "<option>"."$turnovotacao"."</option>";

}


}
}
}
else{

if($lib_turnodevotacaomateria=="sim"){

$sql = "SELECT * FROM turnosdevotacoes order by turnovotacao asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$turnovotacao = $linha['1'];

echo "<option>"."$turnovotacao"."</option>";

}


}
}
}
}
}

?>
        </select>
        <input name="turnovotacaomateria2" type="hidden" id="turnovotacaomateria2" value="<? echo "$turnovotacaomateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <select class="class02" name="tipovotacaomateria" <? echo "$estadodocampo_tipovotacaomateria"; ?> id="tipovotacaomateria">
        <option selected><? echo "$tipovotacaomateria"; ?></option>
         <?
if($estadodocampo_tipovotacaomateria=="readonly='true'"){

}
else{

if($perfilusuario=="Administrador"){

$sql = "SELECT * FROM tiposvotacoes order by tipovotacao asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$tipovotacao = $linha['1'];

echo "<option>"."$tipovotacao"."</option>";

}


}
else{

if($perfilusuario=="Vereador(a)"){

if($lib_tipodevotacaomateria=="sim"){


}


}
else{

$sql2 = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$nomeusuario_autor_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql3 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registrodevinculos  = mysql_num_rows($res3);



}

if((empty($registrodevinculos)) or ($registrodevinculos<="0")){

if(($estadodocampo_tipovotacaomateria=="") && ($destinoatualmateria==$nomeusuario)){

if($lib_tipodevotacaomateria=="sim"){

$sql = "SELECT * FROM tiposvotacoes order by tipovotacao asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$tipovotacao = $linha['1'];

echo "<option>"."$tipovotacao"."</option>";

}


}
}
}
else{

if($lib_tipodevotacaomateria=="sim"){

$sql = "SELECT * FROM tiposvotacoes order by tipovotacao asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$tipovotacao = $linha['1'];

echo "<option>"."$tipovotacao"."</option>";

}


}
}
}
}
}

?>
        </select>
        <input name="tipovotacaomateria2" type="hidden" id="tipovotacaomateria2" value="<? echo "$tipovotacaomateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <select class="class02" name="quorummateria" <? echo "$estadodocampo_quorummateria"; ?> id="quorummateria">
        <option selected><? echo "$quorummateria"; ?></option>
         <?
if($estadodocampo_quorummateria=="readonly='true'"){

}
else{

if($perfilusuario=="Administrador"){

$sql = "SELECT * FROM quorum order by quorum asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$quorum = $linha['1'];

echo "<option>"."$quorum"."</option>";

}


}
else{

if($perfilusuario=="Vereador(a)"){

if($lib_quorummateria=="sim"){


}


}
else{

$sql2 = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$nomeusuario_autor_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql3 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registrodevinculos  = mysql_num_rows($res3);



}

if((empty($registrodevinculos)) or ($registrodevinculos<="0")){

if(($estadodocampo_quorummateria=="") && ($destinoatualmateria==$nomeusuario)){

if($lib_quorummateria=="sim"){

$sql = "SELECT * FROM quorum order by quorum asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$quorum = $linha['1'];

echo "<option>"."$quorum"."</option>";

}


}
}
}
else{

if($lib_quorummateria=="sim"){

$sql = "SELECT * FROM quorum order by quorum asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$quorum = $linha['1'];

echo "<option>"."$quorum"."</option>";

}


}
}
}
}
}

?>
        </select>
        <input name="quorummateria2" type="hidden" id="quorummateria2" value="<? echo "$quorummateria"; ?>">
      </div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Resultado</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Data do Resultado</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Adiado Para</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <select class="class02" name="resultadomateria" <? echo "$estadodocampo_resultadomateria"; ?> id="resultadomateria">
        <option selected><? echo "$resultadomateria"; ?></option>
         <?
if($estadodocampo_resultadomateria=="readonly='true'"){

}
else{

if($perfilusuario=="Administrador"){

$sql = "SELECT * FROM resultados order by resultado asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$resultado = $linha['1'];

echo "<option>"."$resultado"."</option>";

}


}
else{

if($perfilusuario=="Vereador(a)"){

if($lib_resultadomateria=="sim"){


}


}
else{

$sql2 = "SELECT * FROM usuarios where nome = '$destinoatualmateria' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$nomeusuario_autor_atual = $linha[1];
$perfil_do_destino_atual = $linha[2];

}

$sql3 = "SELECT * FROM vinculosdeusuarios where perfilvinculo = '$perfil_do_destino_atual' and nomeusuariovinculado = '$nomeusuario' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registrodevinculos  = mysql_num_rows($res3);



}

if((empty($registrodevinculos)) or ($registrodevinculos<="0")){

if(($estadodocampo_resultadomateria=="") && ($destinoatualmateria==$nomeusuario)){

if($lib_resultadomateria=="sim"){

$sql = "SELECT * FROM resultados order by resultado asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$resultado = $linha['1'];

echo "<option>"."$resultado"."</option>";

}


}
}
}
else{

if($lib_resultadomateria=="sim"){

$sql = "SELECT * FROM resultados order by resultado asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$resultado = $linha['1'];

echo "<option>"."$resultado"."</option>";

}


}
}
}
}
}

?>
        </select>
        <input name="resultadomateria2" type="hidden" id="resultadomateria2" value="<? echo "$resultadomateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <input name="dataresultadomateria" <? echo "$estadodocampo_dataresultadomateria"; ?> type="text" class="class02" id="dataresultadomateria" value="<? echo "$dataresultadomateria"; ?>">
        <input name="dataresultadomateria2" type="hidden" class="class02" id="dataresultadomateria2" value="<? echo "$dataresultadomateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <input name="adiadoparamateria" <? echo "$estadodocampo_adiadoparamateria"; ?> type="text" class="class02" id="adiadoparamateria" value="<? echo "$adiadoparamateria"; ?>">
        <input name="adiadoparamateria2" type="hidden" class="class02" id="adiadoparamateria2" value="<? echo "$adiadoparamateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="4" background="../../imagens_sistema/fundocelulas1.png">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td colspan="4" background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Informa&ccedil;&otilde;es de Arquivamento</strong></div>        <div align="center"></div>        <div align="center"></div>        <div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Data Arquivamento</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Corredor</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>N&deg; Caixa</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Arm&aacute;rio</strong></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center">
        <input name="dataarquivamentomateria" <? echo "$estadodocampo_dataarquivamentomateria"; ?> type="text" class="class02" id="dataarquivamentomateria" value="<? echo "$dataarquivamentomateria"; ?>">
        <input name="dataarquivamentomateria2" type="hidden" class="class02" id="dataarquivamentomateria2" value="<? echo "$dataarquivamentomateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center">
        <input name="corredormateria" <? echo "$estadodocampo_corredormateria"; ?> type="text" class="class02" id="corredormateria" value="<? echo "$corredormateria"; ?>">
        <input name="corredormateria2" type="hidden" class="class02" id="corredormateria2" value="<? echo "$corredormateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center">
        <input name="numcaixamateria" <? echo "$estadodocampo_numcaixamateria"; ?> type="text" class="class02" id="numcaixamateria" value="<? echo "$numcaixamateria"; ?>">
        <input name="numcaixamateria2" type="hidden" class="class02" id="numcaixamateria2" value="<? echo "$numcaixamateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center">
        <input name="armariomateria" <? echo "$estadodocampo_armariomateria"; ?> type="text" class="class02" id="armariomateria" value="<? echo "$armariomateria"; ?>">
        <input name="armariomateria2" type="hidden" class="class02" id="armariomateria2" value="<? echo "$armariomateria"; ?>">
      </div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Prateleira</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center">
        <input name="prateleiramateria" <? echo "$estadodocampo_prateleiramateria"; ?> type="text" class="class02" id="prateleiramateria" value="<? echo "$prateleiramateria"; ?>">
        <input name="prateleiramateria2" type="hidden" class="class02" id="prateleiramateria2" value="<? echo "$prateleiramateria"; ?>">
      </div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td colspan="4" background="../../imagens_sistema/fundocelulas1.png"><div align="center"><strong>Informa&ccedil;&otilde;es sobre a Tramita&ccedil;&atilde;o</strong></div>        <div align="center"></div>        <div align="center"></div>        <div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="left"><strong>Tr&acirc;mites/Observa&ccedil;&otilde;es</strong></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"></div></td>
      <td background="../../imagens_sistema/fundocelulas1.png"><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td>
      <td colspan="4" background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <textarea class="class02" name="tramitemateria" <? echo "$estadodocampo_tramitemateria"; ?> id="tramitemateria" cols="90" rows="10"></textarea>
        <input name="tramitemateria2" type="hidden" id="tramitemateria2" value="<? //echo "$tramitemateria"; ?>">
      </div>        <div align="center"></div>        <div align="center"></div>      <div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="4" background="../../imagens_sistema/fundocelulas1.png"><div align="center">
        <strong><font color="#0000FF">
        <input name="usuarioalterou" type="hidden" id="usuarioalterou" value="<? echo $nomeusuario; ?>">
        <input name="emailusuarioalterou" type="hidden" id="emailusuarioalterou" value="<? echo $emailusuario; ?>">
        <input name="perfilutilizado" type="hidden" id="perfilutilizado" value="<? echo "$perfilusuario"; ?>">
        </font></strong>
        <? echo "$estadodocampo_botaosalvar"; ?>
      </div></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <br>
</form>
<table width="100%"  border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center">
      <form action="editar.php#arquivosdamateria" method="post" enctype="multipart/form-data" name="form1">
        <strong><font color="#0000FF">
        <input name="usuarioalterou" type="hidden" id="usuarioalterou" value="<? echo $nomeusuario; ?>">
        <input name="emailusuarioalterou" type="hidden" id="emailusuarioalterou" value="<? echo $emailusuario; ?>">
        <input name="perfilutilizado" type="hidden" id="perfilutilizado" value="<? echo "$perfilusuario"; ?>">
        </font></strong><A NAME="arquivosdamateria"></A>
        <input name="protocologerado" type="hidden" id="protocologerado" value="<? echo "$protocolomateria"; ?>">
        <input name="codigomateria" type="hidden" id="codigomateria" value="<? echo "$codigomateria"; ?>">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "anexararquivo"; ?>">
        
        <? echo "$estadodocampo_anexointegralmateria"; ?>
        
        
      </form>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="8%">&nbsp;</td>
    <td width="42%" background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Anexos Integral</strong></div></td>
    <td width="43%" background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Anexos Acess&oacute;rios</strong></div></td>
    <td width="7%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td valign="top" background="../../imagens_sistema/fundocelulas2.png"><div align="center">
      <table width="100%" border="0">
        <?
		
$sql = "SELECT * FROM anexos where numeroprotocolo = '$protocolomateria' and tipoanexo = 'Integral' order by datacadastro,horacadastro desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registrosdeprotocolo = mysql_num_rows($res);

$codigodoarquivointegral = $linha[0];

$anexonome = $linha[7];
$caminhoarquivo = $linha[8];
$tipoanexo_integral_antes = $linha[9];
$statusanexo = $linha[10];




?>
        <tr>
          <td width="12%">&nbsp;</td>
          <td width="20%" valign="middle"><div align="center">
            <form name="form4" method="post" action="editar.php#arquivosdamateria">
              <input name="codigodoarquivo" type="hidden" id="codigodoarquivo" value="<? echo "$codigodoarquivointegral"; ?>">
              <input name="codigomateria" type="hidden" id="codigomateria" value="<? echo "$codigomateria"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "excluirarquivo"; ?>">
              <input name="arquivodeletar" type="hidden" id="arquivodeletar" value="<? echo "$caminhoarquivo$anexonome"; ?>">
              <strong><font color="#0000FF">
              <input name="usuarioalterou" type="hidden" id="usuarioalterou" value="<? echo $nomeusuario; ?>">
              <input name="emailusuarioalterou" type="hidden" id="emailusuarioalterou" value="<? echo $emailusuario; ?>">
              <input name="perfilutilizado" type="hidden" id="perfilutilizado" value="<? echo "$perfilusuario"; ?>">
              </font></strong>
              <input name="protocologerado" type="hidden" id="protocologerado" value="<? echo "$protocolomateria"; ?>">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <? echo "$estadodocampo_excluirarquivos"; ?>
            </form>
          </div></td>
          <td width="18%" valign="middle"><div align="center"><? echo "$anexonome"; ?></div></td>
          <td width="19%" valign="middle"><div align="center"><? echo "$statusanexo"; ?></div></td>
          <td width="19%" valign="middle"><div align="center"><? echo "<a href='$caminhoarquivo$anexonome' target='_blank'>Visualizar/Download</a>"; ?></div></td>
          <td width="12%" valign="middle"><form name="form4" method="post" action="editar.php#arquivosdamateria">
            <input name="codigodoarquivo" type="hidden" id="codigodoarquivo" value="<? echo "$codigodoarquivointegral"; ?>">
            <input name="codigomateria" type="hidden" id="codigomateria" value="<? echo "$codigomateria"; ?>">
            <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "trocardelado"; ?>">
            <input name="tipoanexo" type="hidden" id="tipoanexo" value="<? echo "Acess&oacute;rio"; ?>">
            <input name="tipoanexo2" type="hidden" id="tipoanexo2" value="<? echo "$tipoanexo_integral_antes"; ?>">
            <strong><font color="#0000FF">
            <input name="usuarioalterou" type="hidden" id="usuarioalterou" value="<? echo $nomeusuario; ?>">
            <input name="emailusuarioalterou" type="hidden" id="emailusuarioalterou" value="<? echo $emailusuario; ?>">
            <input name="perfilutilizado" type="hidden" id="perfilutilizado" value="<? echo "$perfilusuario"; ?>">
            </font></strong>
            <input name="protocologerado" type="hidden" id="protocologerado" value="<? echo "$protocolomateria"; ?>">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
            <? echo "$estadodocampo_trocaranexodelado_ed"; ?>
          </form></td>
        </tr>
        <?  }  ?>
      </table>
    </div></td>
    <td valign="top" background="../../imagens_sistema/fundocelulas2.png"><div align="center">
      <table width="100%" border="0">
        <?
		
$sql = "SELECT * FROM anexos where numeroprotocolo = '$protocolomateria' and tipoanexo = 'Acessório' order by datacadastro,horacadastro desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registrosdeprotocolo = mysql_num_rows($res);

$codigodoarquivo = $linha[0];

$anexonome = $linha[7];
$caminhoarquivo = $linha[8];
$tipoanexo_acessorio_antes = $linha[9];
$statusanexo = $linha[10];

?>
        <tr>
          <td width="12%" valign="middle"><form name="form4" method="post" action="editar.php#arquivosdamateria">
            <div align="right">
              <input name="codigodoarquivo" type="hidden" id="codigodoarquivo" value="<? echo "$codigodoarquivo"; ?>">
              <input name="codigomateria" type="hidden" id="codigomateria" value="<? echo "$codigomateria"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "trocardelado"; ?>">
              <input name="tipoanexo" type="hidden" id="tipoanexo" value="<? echo "Integral"; ?>">
              <input name="tipoanexo2" type="hidden" id="tipoanexo2" value="<? echo "$tipoanexo_acessorio_antes"; ?>">
              <strong><font color="#0000FF">
              <input name="usuarioalterou" type="hidden" id="usuarioalterou" value="<? echo $nomeusuario; ?>">
              <input name="emailusuarioalterou" type="hidden" id="emailusuarioalterou" value="<? echo $emailusuario; ?>">
              <input name="perfilutilizado" type="hidden" id="perfilutilizado" value="<? echo "$perfilusuario"; ?>">
              </font></strong>
              <input name="protocologerado" type="hidden" id="protocologerado" value="<? echo "$protocolomateria"; ?>">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <? echo "$estadodocampo_trocaranexodelado_de"; ?>            </div>
          </form></td>
          <td width="20%" valign="middle"><div align="center"><? echo "$anexonome"; ?></div></td>
          <td width="18%" valign="middle"><div align="center"><? echo "$statusanexo"; ?></div></td>
          <td width="19%" valign="middle"><div align="center"><? echo "<a href='$caminhoarquivo$anexonome' target='_blank'>Visualizar/Download</a>"; ?></div></td>
          <td width="19%" valign="middle"><div align="center">
            <form name="form4" method="post" action="editar.php#arquivosdamateria">
              <input name="codigodoarquivo" type="hidden" id="codigodoarquivo" value="<? echo "$codigodoarquivo"; ?>">
              <input name="codigomateria" type="hidden" id="codigomateria" value="<? echo "$codigomateria"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "excluirarquivo"; ?>">
              <input name="arquivodeletar" type="hidden" id="arquivodeletar" value="<? echo "$caminhoarquivo$anexonome"; ?>">
              <strong><font color="#0000FF">
              <input name="usuarioalterou" type="hidden" id="usuarioalterou" value="<? echo $nomeusuario; ?>">
              <input name="emailusuarioalterou" type="hidden" id="emailusuarioalterou" value="<? echo $emailusuario; ?>">
              <input name="perfilutilizado" type="hidden" id="perfilutilizado" value="<? echo "$perfilusuario"; ?>">
              </font></strong>
              <input name="protocologerado" type="hidden" id="protocologerado" value="<? echo "$protocolomateria"; ?>">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <? echo "$estadodocampo_excluirarquivos"; ?>
            </form>
          </div></td>
          <td width="12%" valign="middle">&nbsp;</td>
        </tr>
        <?  }  ?>
      </table>
    </div></td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<?

$sql = "SELECT * FROM alteracoesdemateria where protocolomateria = '$protocolomateria' group by horaalteracao,datealteracao order by codigo desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registrosdetramites = mysql_num_rows($res)+1;

$reg_subtrai++;

$numerodotramite = bcsub($registrosdetramites,$reg_subtrai);
	
$codigodaalteracao = $linha['0'];

$usuarioquealterou = $linha['2'];
$emailusuarioquealterou = $linha['3'];
$datadealteracao = $linha['7'];
$horadealteracao = $linha['8'];
$perfilutilizadonaalteracao = $linha['9'];

?>

<table width="85%" border="2" align="center" cellspacing="0" class="style1">

  <tr>
    <td colspan="4" background="../../imagens_sistema/fundocelulas1.png"><div align="center"><? echo "<b>Trâmite $numerodotramite:</b> Usuário que efetuou a alteração: <b>$usuarioquealterou($perfilutilizadonaalteracao) $emailusuarioquealterou</b> - <b>$datadealteracao $horadealteracao</b><br><br>"; ?>
    
  <?

$sql2 = "SELECT * FROM alteracoesdemateria where protocolomateria = '$protocolomateria' and datealteracao = '$datadealteracao' and horaalteracao = '$horadealteracao' order by horaalteracao,datealteracao desc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	
$campoalterado = $linha['4'];
$antes = $linha['5'];
$depois = $linha['6'];


?>
  
<? 
//echo "Campo Alterado: <b>$campoalterado</b>  Antes: <b>" if(empty($antes)){ echo "Vazio"; } else{ echo "$antes"; } "</b>  Depois: <b>$depois</b><br>"; 
echo "Campo Alterado: <b>$campoalterado</b>  Antes:"; ?> <? if(empty($antes)){ echo "<b>Vazio</b>"; } else{ echo "<b>$antes</b>"; } ?> <? echo " - Depois:"; ?> <? if(empty($depois)){ echo "<b>Vazio</b>"; } else{ echo "<b>$depois</b>"; } ?> <? echo "<br>";


} ?>  
    
    
    </div></td>
  </tr>
</table>
<br>
<? 


}



}

//------------------------------------------------------------------------





?>
<p>&nbsp;</p>
</body>
</html>
