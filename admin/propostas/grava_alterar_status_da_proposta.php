<?php
session_start(); //inicia sess�o...
if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...
echo ""; //se for emite mensagem positiva.
else //se n�o for...
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
//require("conect/conect.php"); or die("erro na requisi��o");
require '../../conect/conect.php';
error_reporting(E_ALL);

?>

		  
		  
		  <?

// dados da proposta
$num_proposta = $_POST['num_proposta'];
$status = $_POST['status'];
$mes_ano_status = $_POST['mes_ano_status'];
$retorno = $_POST['retorno'];
$bco_operacao = $_POST['bco_operacao'];
$valor_a_receber = $_POST['valor_a_receber'];
$valor_credito = $_POST['valor_credito'];
$dataalteracao = $_POST['dataalteracao'];
$horaalteracao = $_POST['horaalteracao'];
$valor_liberado = $_POST['valor_liberado'];
$tipo_capital = $_POST['tipo_capital'];
$recebido = $_POST['recebido'];
$parcela = $_POST['parcela'];
$percentual_op = $_POST['percentual_op'];
$comissao_op = $_POST['comissao_op'];



//dados do operador que alterou


$operador_alterou = $_POST['operador_alterou'];
$cel_operador_alterou = $_POST['cel_operador_alterou'];
$email_operador_alterou = $_POST['email_operador_alterou'];

//dados do estabelecimento que alterou

$estabelecimento_alterou = $_POST['estabelecimento_alterou'];
$cidade_estabelecimento_alterou = $_POST['cidade_estabelecimento_alterou'];
$tel_estabelecimento_alterou = $_POST['tel_estabelecimento_alterou'];
$email_estabelecimento_alterou = $_POST['email_estabelecimento_alterou'];

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`status` = '$status',`mes_ano_status` = '$mes_ano_status',`retorno` = '$retorno',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`valor_liberado` = '$valor_liberado',`tipo_capital` = '$tipo_capital',
`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`valor_credito`= '$valor_credito',`bco_operacao`= '$bco_operacao',`valor_a_receber`= '$valor_a_receber',`recebido`= '$recebido',`parcela`= '$parcela',`parc1`= '$parcela',`percentual_op`= '$percentual_op',`comissao_op`= '$comissao_op' where `propostas`. `num_proposta` = '$num_proposta' limit 1 ";
}

mysql_query($comando,$conexao) or die("Erro ao alterar informa��es desse cadastro");


echo "Status da Proposta alterado com sucesso<br><br>";
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

$nome_op = $linha[1];
$email_op = $linha[34];


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
	$mens   =  "Ol�! os dados de sua proposta foram atualizados na $nfantasia!   \n";
	$mens  .=  "Visite-nos $site \n";
	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "CPF: ".$cpf."                                                    \n";
	$mens  .=  "N� da Proposta: ".$num_proposta."                                                    \n";
	$mens  .=  "Percentual de comiss�o: ".$percentual_op."%                                                  \n";
	$mens  .=  "Comiss�o em R$: ".$comissao_op."                                                    \n";
	$mens  .=  "Data da altera��o: ".$dataalteracao."                                                    \n";
	$mens  .=  "Hora da altera��o: ".$horaalteracao."                                                    \n";
	$mens  .=  "Valor Solicitado: ".$valor_credito."                                                    \n";
	$mens  .=  "Valor Liberado: ".$valor_liberado."                                                    \n";
	$mens  .=  "Valor da Parcela: ".$parcela."                                                    \n";	
	$mens  .=  "STATUS: ".$status."                                                    \n";
	$mens  .=  "Operador que efetuou a altera��o: ".$operador_alterou."                                                    \n";
	$mens  .=  "Celular: ".$cel_operador_alterou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_operador_alterou."                                                    \n";
	$mens  .=  "Estabelecimento: ".$estabelecimento_alterou."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento_alterou."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento_alterou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento_alterou."                                                    \n";

	
	//DISPARA O EMAIL
	$envia  =  mail($email_dest, "Proposta atualizada no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email_operador_alterou);
	$envia  =  mail($email_op, "Proposta N� ".$num_proposta.", ".$nome_op."! Confira os dados no sistema!",$mens,"From:".$email_dest);

?>


<body>
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit3" value="Voltar">
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
