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

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$estadocivil = $_POST['estadocivil'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$orgao = $_POST['orgao'];
$emissao = $_POST['emissao'];
$data_nasc = $_POST['data_nasc'];
$pai = $_POST['pai'];
$mae = $_POST['mae'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$obs = $_POST['obs'];
$dataalteracao = $_POST['dataalteracao'];
$horaalteracao = $_POST['horaalteracao'];
$operador_alterou = $_POST['operador_alterou'];
$cel_operador_alterou = $_POST['cel_operador_alterou'];
$email_operador_alterou = $_POST['email_operador_alterou'];
$estabelecimento_alterou = $_POST['estabelecimento_alterou'];
$cidade_estabelecimento_alterou = $_POST['cidade_estabelecimento_alterou'];
$tel_estabelecimento_alterou = $_POST['tel_estabelecimento_alterou'];
$email_estabelecimento_alterou = $_POST['email_estabelecimento_alterou'];
$tipo = $_POST['tipo'];
$banco = $_POST['banco'];
$agencia = $_POST['agencia'];
$conta = $_POST['conta'];
$num_beneficio = $_POST['num_beneficio'];

$parc1 = $_POST['parc1'];
$banco1 = $_POST['banco1'];
$vencto1 = $_POST['vencto1'];
$compra1 = $_POST['compra1'];

$parc2 = $_POST['parc2'];
$banco2 = $_POST['banco2'];
$vencto2 = $_POST['vencto2'];
$compra2 = $_POST['compra2'];

$parc3 = $_POST['parc3'];
$banco3 = $_POST['banco3'];
$vencto3 = $_POST['vencto3'];
$compra3 = $_POST['compra3'];

$parc4 = $_POST['parc4'];
$banco4 = $_POST['banco4'];
$vencto4 = $_POST['vencto4'];
$compra4 = $_POST['compra4'];

$parc5 = $_POST['parc5'];
$banco5 = $_POST['banco5'];
$vencto5 = $_POST['vencto5'];
$compra5 = $_POST['compra5'];

$parc6 = $_POST['parc6'];
$banco6 = $_POST['banco6'];
$vencto6 = $_POST['vencto6'];
$compra6 = $_POST['compra6'];

$parc7 = $_POST['parc7'];
$banco7 = $_POST['banco7'];
$vencto7 = $_POST['vencto7'];
$compra7 = $_POST['compra7'];

$num_beneficio2 = $_POST['num_beneficio2'];
$num_beneficio3 = $_POST['num_beneficio3'];
$num_beneficio4 = $_POST['num_beneficio4'];





$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`clientes` set `codigo` = '$codigo',`nome` = '$nome',`sexo` = '$sexo',`estadocivil` = '$estadocivil',`cpf` = '$cpf',`rg` = '$rg',`orgao` = '$orgao',`emissao` = '$emissao',`data_nasc` = '$data_nasc',`pai` = '$pai',`mae` = '$mae',`endereco` = '$endereco',`numero` = '$numero',`bairro` = '$bairro',`complemento` = '$complemento',`cidade` = '$cidade',`estado` = '$estado',`cep` = '$cep',`telefone` = '$telefone',`celular` = '$celular',
`email` = '$email',`obs` = '$obs',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`tipo`= '$tipo',`banco`= '$banco',`agencia`= '$agencia',`conta`= '$conta',`num_beneficio`= '$num_beneficio',`parc1`= '$parc1',`banco1`= '$banco1',`vencto1`= '$vencto1',`compra1`= '$compra1',`parc2`= '$parc2',`banco2`= '$banco2',`vencto2`= '$vencto2',`compra2`= '$compra2',`parc3`= '$parc3',`banco3`= '$banco3',`vencto3`= '$vencto3',`compra3`= '$compra3',`parc4`= '$parc4',`banco4`= '$banco4',`vencto4`= '$vencto4',`compra4`= '$compra4',`parc5`= '$parc5',`banco5`= '$banco5',`vencto5`= '$vencto5',`compra5`= '$compra5',
`parc6`= '$parc6',`banco6`= '$banco6',`vencto6`= '$vencto6',`compra6`= '$compra6',`parc7`= '$parc7',`banco7`= '$banco7',`vencto7`= '$vencto7',`compra7`= '$compra7',`num_beneficio2`= '$num_beneficio2',`num_beneficio3`= '$num_beneficio3',`num_beneficio4`= '$num_beneficio4' where `clientes`. `codigo` = '$codigo' limit 1 ";
}

mysql_query($comando,$conexao) or die("Erro ao alterar informações desse cadastro");


echo "Dados do cliente alterados no banco de dados com sucesso<br>";
?>

<?
$sql = "SELECT * FROM clientes where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>
<?
$nome = $linha[1];
$cpf = $linha[4];
$dataalteracao = $linha[31];
$horaalteracao = $linha[32];
$operador_alterou = $linha[33];
$cel_operador_alterou = $linha[34];
$email_operador_alterou = $linha[35];
$estabelecimento_alterou = $linha[36];
$cidade_estabelecimento_alterou = $linha[37];
$tel_estabelecimento_alterou = $linha[38];
$email_estabelecimento_alterou = $linha[39];
$tipo = $linha[40];

?>

<? } ?>

<?
$sql = "SELECT * FROM allcred limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$email_allcred = $linha[14];

}
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_allcred;
	
	//PREPARA O PEDIDO
	$mens   =  "Olá! seus dados foram atualizados na Allcred Financeira!   \n";
	$mens  .=  "Visite-nos www.allcredfinanceira.com.br \n";
	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "CPF: ".$cpf."                                                    \n";
	$mens  .=  "Especificação: ".$tipo."                                                    \n";
	$mens  .=  "Data da alteração: ".$dataalteracao."                                                    \n";
	$mens  .=  "Hora da alteração: ".$horaalteracao."                                                    \n";
	$mens  .=  "Operador que efetuou a alteração: ".$operador_alterou."                                                    \n";
	$mens  .=  "Celular: ".$cel_operador_alterou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_operador_alterou."                                                    \n";
	$mens  .=  "Estabelecimento: ".$estabelecimento_alterou."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento_alterou."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento_alterou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento_alterou."                                                    \n";

	
	//DISPARA O EMAIL
	$envia  =  mail($email_dest, "Cliente atualizado no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email);
	

?>


<body>
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar">
</form>
</body>
</html>
<?
mysql_close($conexao);
?>
