<?php

session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

header("Location: alerta.php");


ini_set('default_charset','UTF8_general_mysql500_ci');
?>

<html>

<head>

<title>GRAVA&Ccedil;&Atilde;O DE ALTERA&Ccedil;&Atilde;O DE DADOS DO FORNECEDOR</title>

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

$codigo = $_POST['codigo'];

$razaosocial = $_POST['razaosocial'];

$nfantasia = $_POST['nfantasia'];

$cnpj = $_POST['cnpj'];

$inscr_est = $_POST['inscr_est'];

$endereco = $_POST['endereco'];

$numero = $_POST['numero'];

$bairro = $_POST['bairro'];

$complemento = $_POST['complemento'];

$cep = $_POST['cep'];

$cidade = $_POST['cidade'];

$estado = $_POST['estado'];

$telefone = $_POST['telefone'];

$fax = $_POST['fax'];

$email = $_POST['email'];

$site = $_POST['site'];

$proprietario = $_POST['proprietario'];

$cpf = $_POST['cpf'];

$rg = $_POST['rg'];

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

$estab_pertence = $_POST['estab_pertence'];

$email_representante = $_POST['email_representante'];
	
$categoria = $_POST['categoria'];
	
//------DADOS BANCARIOS---------
	$banco = $_POST['banco'];
	$codagencia = $_POST['codagencia'];
	$digitoagencia = $_POST['digitoagencia'];
	$conta = $_POST['conta'];
	$digitoconta = $_POST['digitoconta'];
	$tipoconta = $_POST['tipoconta'];
	$titularconta = $_POST['titularconta'];
	$nomeagencia = $_POST['nomeagencia'];
	
//------FINAL DADOS BANCARIOS---------


$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`fornecedores` set `codigo` = '$codigo',`razaosocial` = '$razaosocial',`nfantasia` = '$nfantasia',`cnpj` = '$cnpj',`inscr_est` = '$inscr_est',`endereco` = '$endereco',`numero` = '$numero',`bairro` = '$bairro',`complemento` = '$complemento',`cep` = '$cep',`cidade` = '$cidade',`estado` = '$estado',`telefone` = '$telefone',`fax` = '$fax',`email` = '$email',`site` = '$site',`proprietario` = '$proprietario',`cpf` = '$cpf',`rg` = '$rg',`obs` = '$obs'

,`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`estab_pertence` = '$estab_pertence',`email_representante` = '$email_representante',`banco` = '$banco',`codagencia` = '$codagencia',`digitoagencia` = '$digitoagencia',`conta` = '$conta',`digitoconta` = '$digitoconta',`tipoconta` = '$tipoconta',`titularconta` = '$titularconta',`nomeagencia` = '$nomeagencia',`categoria` = '$categoria' where `fornecedores`. `codigo` = '$codigo' limit 1 ";

}



mysql_query($comando,$conexao) or die("Erro ao alterar informa��es desse estabelecimento");





echo "Dados do fornecedor alterados no banco de dados com sucesso<br>";

?>



<?

$sql = "SELECT * FROM fornecedores where codigo = '$codigo' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

<?

$codigo = $linha[0];

$nfantasia = $linha[2];

$telefone = $linha[12];

$dataalteracao = $linha[22];

$horaalteracao = $linha[23];

$operador_alterou = $linha[31];

$cel_operador_altrou = $linha[32];

$email_operador_alterou = $linha[33];

$estabelecimento_alterou = $linha[34];

$cidade_estabelecimento_alterou = $linha[35];

$tel_estabelecimento_alterou = $linha[36];

$email_estabelecimento_alterou = $linha[37];

$estab_pertence = $linha[52];

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

	$mens   =  "Ol�! seus dados foram atualizados na Allcred Financeira!   \n";

	$mens  .=  "Visite-nos www.allcredfinanceira.com.br \n";

	$mens  .=  "C�digo: ".$codigo."                                                       \n";

	$mens  .=  "Nome Fantasia: ".$nfantasia."                                                    \n";

	$mens  .=  "Telefone: ".$telefone."                                                    \n";

	$mens  .=  "Data da altera��o: ".$dataalteracao."                                                    \n";

	$mens  .=  "Hora da altera��o: ".$horaalteracao."                                                    \n";

	$mens  .=  "Operador que atende: ".$estab_pertence."                                                    \n";

	$mens  .=  "Operador que atualizou: ".$operador_alterou."                                                    \n";

	$mens  .=  "Celular do operador: ".$cel_operador_alterou."                                                    \n";

	$mens  .=  "E-Mail do operador: ".$email_operador_alterou."                                                    \n";

	$mens  .=  "Estabelecimento a que pertence: ".$estabelecimento_alterou."                                                    \n";

	$mens  .=  "Cidade: ".$cidade_estabelecimento_alterou."                                                    \n";

	$mens  .=  "Telefone: ".$tel_estabelecimento_alterou."                                                    \n";

	$mens  .=  "E-Mail: ".$email_estabelecimento_alterou."                                                    \n";





	

	//DISPARA O EMAIL

	//$envia  =  mail($email_dest, "Estabelecimento atualizado no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email);

	



?>





<body>

<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input class='class01' type="submit" name="Submit2" value="Voltar">

</form>

</body>

</html>

<?

mysql_close($conexao);

?>

