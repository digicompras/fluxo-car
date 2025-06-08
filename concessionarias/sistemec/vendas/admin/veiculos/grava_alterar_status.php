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

$cpf = $_POST['cpf'];

$status = $_POST['status'];

$dataalteracao = $_POST['dataalteracao'];

$horaalteracao = $_POST['horaalteracao'];

$parecer_credito = $_POST['parecer_credito'];

$dia_alteracao_status = date('d');

$mes_alteracao_status = date('m');

$ano_alteracao_status = date('Y');


//dados do operador





$operador_alterou = $_POST['operador_alterou'];

$cel_operador_alterou = $_POST['cel_operador_alterou'];

$email_operador_alterou = $_POST['email_operador_alterou'];



//dados do estabelecimento



$estab_alterou = $_POST['estab_alterou'];

$cidade_estab_alterou = $_POST['cidade_estab_alterou'];

$tel_estab_alterou = $_POST['tel_estab_alterou'];

$email_estab_alterou = $_POST['email_estab_alterou'];



$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`propostas_veiculos` set `num_proposta` = '$num_proposta',`status` = '$status',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`email_operador_alterou` = '$email_operador_alterou',`estab_alterou` = '$estab_alterou',`cidade_estab_alterou` = '$cidade_estab_alterou',`tel_estab_alterou` = '$tel_estab_alterou',`email_estab_alterou` = '$email_estab_alterou',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`parecer_credito` = '$parecer_credito' where `propostas_veiculos`. `num_proposta` = '$num_proposta' limit 1 ";

}



mysql_query($comando,$conexao) or die("Erro ao alterar informações da proposta nº $num_proposta");





echo "Dados da proposta nº $num_proposta alterados com sucesso!!!...<br><br>";

?>


<?

$comando = "insert into observacoes_parecer_credito_veiculos(num_proposta,cpf,dataalteracao,horaalteracao,obs,operador) 



values('$num_proposta','$cpf','$dataalteracao','$horaalteracao','$parecer_credito','$operador_alterou')";



mysql_query($comando,$conexao);





?>

<?

$sql = "SELECT * FROM propostas_veiculos where num_proposta = '$num_proposta'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

<?

$num_proposta = $linha[0];

$nome = $linha[4];

$operador_atendente = $linha[5];

$cpf = $linha[7];

$dataalteracao = $linha[42];

$horaalteracao = $linha[43];

$status = $linha[51];

$operador_alterou = $linha[44];

$cel_operador_alterou = $linha[45];

$email_operador_alterou = $linha[46];

$estabelecimento_alterou = $linha[47];

$cidade_estabelecimento_alterou = $linha[48];

$tel_estabelecimento_alterou = $linha[49];

$email_estabelecimento_alterou = $linha[50];



$email_operador = $linha[111];





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

	$mens   =  "Olá! os dados de sua proposta foram alterados na $nfantasia!   \n";

	$mens  .=  "Visite-nos $site \n\n";

	

	$mens  .=  "Nº da Proposta: ".$num_proposta."                                                    \n";

	$mens  .=  "Nome: ".$nome."                                                       \n";

	$mens  .=  "CPF: ".$cpf."                                                    \n";

	$mens  .=  "Data da alteração: ".$dataalteracao."                                                    \n";

	$mens  .=  "Hora da alteração: ".$horaalteracao."                                                    \n";

	$mens  .=  "STATUS: ".$status."                                                    \n\n";

	

	$mens  .=  "Operador que efetuou a alteração: ".$operador_alterou."                                                    \n";

	$mens  .=  "Celular: ".$cel_operador_alterou."                                                    \n";

	$mens  .=  "E-Mail: ".$email_operador_alterou."                                                    \n";

	$mens  .=  "Estabelecimento: ".$estabelecimento_alterou."                                                    \n";

	$mens  .=  "Cidade: ".$cidade_estabelecimento_alterou."                                                    \n";

	$mens  .=  "Telefone: ".$tel_estabelecimento_alterou."                                                    \n";

	$mens  .=  "E-Mail: ".$email_estabelecimento_alterou."                                                    \n";



	

	//DISPARA O EMAIL

	//$envia  =  mail($email_dest, "Proposta alterada no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email_operador_alterou);

	//$envia  =  mail($email_operador, "Proposta Nº ".$num_proposta.", ".$operador_atendente."! Confira os dados no sistema!",$mens,"From:".$email_dest);



?>





<body>

<form name="form1" method="post" action="index.php">

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

