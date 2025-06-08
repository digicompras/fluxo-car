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
<title>Untitled Document</title>
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

?>

		  
		  
		  <?

// dados da proposta
$num_proposta = $_POST['num_proposta'];
$mes_ano_status = $_POST['mes_ano_status'];
$data_alteracao_status = $_POST['data_alteracao_status'];
$mes_ano = $_POST['mes_ano'];

$data_status = $data_alteracao_status;
$data_status2 = explode("-", $data_status);
// exibe apenas a segunda palavra da frase

$dia_alteracao_status = $data_status2[0];
$mes_alteracao_status = $data_status2[1];
$ano_alteracao_status = $data_status2[2];


//dados do operador que alterou


$operador_alterou_status = $_POST['operador_alterou_status'];
$cel_operador_alterou_status = $_POST['cel_operador_alterou_status'];
$email_operador_alterou_status = $_POST['email_operador_alterou_status'];

//dados do estabelecimento que alterou

$estabelecimento_alterou_status = $_POST['estabelecimento_alterou_status'];
$cidade_estabelecimento_alterou_status = $_POST['cidade_estabelecimento_alterou_status'];
$tel_estabelecimento_alterou_status = $_POST['tel_estabelecimento_alterou_status'];
$email_estabelecimento_alterou_status = $_POST['email_estabelecimento_alterou_status'];

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`mes_ano_status` = '$mes_ano_status',`data_alteracao_status` = '$data_alteracao_status',`dia_alteracao_status` = '$dia_alteracao_status',`mes_alteracao_status` = '$mes_alteracao_status',`ano_alteracao_status` = '$ano_alteracao_status',`operador_alterou_status` = '$operador_alterou_status',`cel_operador_alterou_status` = '$cel_operador_alterou_status',
`email_operador_alterou_status` = '$email_operador_alterou_status',`estabelecimento_alterou_status` = '$estabelecimento_alterou_status',`cidade_estabelecimento_alterou_status` = '$cidade_estabelecimento_alterou_status',`tel_estabelecimento_alterou_status` = '$tel_estabelecimento_alterou_status',`email_estabelecimento_alterou_status` = '$email_estabelecimento_alterou_status' where `propostas`. `num_proposta` = '$num_proposta' limit 1 ";
}

mysql_query($comando,$conexao) or die("Erro ao alterar informações dessa proposta");


echo "Informações da Proposta alteradas com sucesso<br><br>";
?>

<?
$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>
<?
$num_proposta = $linha[0];
$nome = $linha[4];
$cpf = $linha[7];
$dataalteracao = $linha[42];
$horaalteracao = $linha[43];
$valor_credito = $linha[25];
$valor_liberado = $linha[97];
$parcela = $linha[27];

$operador = $linha[32];
$email_operador = $linha[34];


$status = $linha[51];
$operador_alterou = $linha[44];
$cel_operador_alterou = $linha[45];
$email_operador_alterou = $linha[46];
$estabelecimento_alterou = $linha[47];
$cidade_estabelecimento_alterou = $linha[48];
$tel_estabelecimento_alterou = $linha[49];
$email_estabelecimento_alterou = $linha[50];
$percentual_op = $linha[100];
$comissao_op = $linha[101];
$obs2 = $linha[102];


?>

<? } ?>

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
	$mens   =  "Olá! os dados de sua proposta foram atualizados na $nfantasia!   \n";
	$mens  .=  "Visite-nos $site \n";
	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "CPF: ".$cpf."                                                    \n";
	$mens  .=  "Nº da Proposta: ".$num_proposta."                                                    \n";
	$mens  .=  "Percentual de comissão: ".$percentual_op."%                                                  \n";
	$mens  .=  "Comissão em R$: ".$comissao_op."                                                    \n";
	$mens  .=  "Data da alteração: ".$dataalteracao."                                                    \n";
	$mens  .=  "Hora da alteração: ".$horaalteracao."                                                    \n";
	$mens  .=  "Valor Solicitado: ".$valor_credito."                                                    \n";
	$mens  .=  "Valor Liberado: ".$valor_liberado."                                                    \n";
	$mens  .=  "Valor da Parcela: ".$parcela."                                                    \n";	
	$mens  .=  "STATUS: ".$status."                                                    \n";
	$mens  .=  "Parecer de Crédito: ".$obs2."                                                    \n\n";
	
	$mens  .=  "Operador que efetuou a alteração: ".$operador_alterou."                                                    \n";
	$mens  .=  "Celular: ".$cel_operador_alterou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_operador_alterou."                                                    \n";
	$mens  .=  "Estabelecimento: ".$estabelecimento_alterou."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento_alterou."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento_alterou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento_alterou."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Proposta atualizada no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email_operador_alterou);
	//$envia  =  mail($email_operador, "Proposta Nº ".$num_proposta.", ".$operador."! Confira os dados no sistema!",$mens,"From:".$email_dest);

?>


<body>
<form name="form1" method="post" action="relatorio_de_producao_por_mes_todos.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo $mes_ano; ?>">
  <input type="submit" name="Submit32" value="Voltar Para verifica&ccedil;&atilde;o de Propostas por mes e ano">
  <strong></strong>
</form>
<form name="form1" method="post" action="../principal.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar ao menu principal">
</form>
</body>
</html>
<?
mysql_close($conexao);
?>
