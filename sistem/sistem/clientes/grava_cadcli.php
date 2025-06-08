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

</style></head>



<?



require '../../conect/conect.php';



			

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?>

<?

// dados do cliente



$nome = $_POST['nome'];

$sexo = $_POST['sexo'];

$estadocivil = $_POST['estadocivil'];

$cpf = $_POST['cpf'];

$status_cliente = $_POST['status_cliente'];

$rg = $_POST['rg'];

$orgao = $_POST['orgao'];

$emissao = $_POST['emissao'];

$data_nasc = $_POST['data_nasc'];

$pai = $_POST['pai'];

$mae = $_POST['mae'];

$endereco = $_POST['endereco'];

$numero  = $_POST['numero'];

$bairro = $_POST['bairro'];

$complemento = $_POST['complemento'];

$cidade = $_POST['cidade'];

$estado = $_POST['estado'];
	
$regiao = $_POST['regiao'];

$cep = $_POST['cep'];

$telefone = $_POST['telefone'];

$celular = $_POST['celular'];

$email = $_POST['email'];

$datacadastro = $_POST['datacadastro'];

$horacadastro = $_POST['horacadastro'];

//dados do operador



$operador = $_POST['operador'];

$cel_operador = $_POST['cel_operador'];

$email_operador = $_POST['email_operador'];



//dados do estabelecimento



$estabelecimento = $_POST['estabelecimento'];

$cidade_estabelecimento = $_POST['cidade_estabelecimento'];

$tel_estabelecimento = $_POST['tel_estabelecimento'];

$email_estabelecimento = $_POST['email_estabelecimento'];




$obs = $_POST['obs'];



$local_trabalho = $_POST['local_trabalho'];
$fone_comercial = $_POST['fone_comercial'];
$newsletter = $_POST['newsletter'];









$comando = "insert into clientes(nome,sexo,estadocivil,cpf,rg,orgao,emissao,data_nasc,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,telefone,celular,email,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,obs,datacadastro,horacadastro,tipo,status_cliente,local_trabalho,fone_comercial,newsletter,regiao) values('$nome','$sexo','$estadocivil','$cpf','$rg','$orgao','$emissao','$data_nasc','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$telefone','$celular','$email','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$obs','$datacadastro','$horacadastro','$tipo','$status_cliente','$local_trabalho','$fone_comercial','$newsletter','$regiao')";



mysql_query($comando,$conexao) or die("Erro ao gravar cliente!");





echo "Cliente cadastrado com sucesso!<br><br>";



?>





<?

//$criar_pasta = $_POST['criar_pasta'];



//if($criar_pasta=="Sim") { 





//mkdir("../../$cpf");

//chmod ("../../$cpf",0755);



//}

?>







<?

$sql = "SELECT * FROM clientes order by codigo desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

<?

printf("O Nº da matrícula do cliente é: $linha[0]");

$nome = $linha[1];

$cpf = $linha[4];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$operador = $linha[21];

$cel_operador = $linha[22];

$email_operador = $linha[23];

$estabelecimento = $linha[24];

$cidade_estabelecimento = $linha[25];

$tel_estabelecimento = $linha[26];

$email_estabelecimento = $linha[27];

$tipo = $linha[40];

?>



<? } ?>



<?

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
	
	$email_dest   =   $email_empresa;

	

	//PREPARA O PEDIDO

	$mens   =  "Olá! você foi cadastrado na $nfantasia_empresa!   \n";

	$mens  .=  "Visite-nos para ver as novidades $site_empresa \n";

	$mens  .=  "Nome: ".$nome."                                                       \n";

	$mens  .=  "CPF: ".$cpf."                                                    \n";

	$mens  .=  "Especificação: ".$tipo."                                                    \n";

	$mens  .=  "Data do cadastro: ".$datacadastro."                                                    \n";

	$mens  .=  "Hora do cadastro: ".$horacadastro."                                                    \n";

	$mens  .=  "Operador que efetuou o cadastro: ".$operador."                                                    \n";

	$mens  .=  "Celular: ".$cel_operador."                                                    \n";

	$mens  .=  "E-Mail: ".$email_operador."                                                    \n";

	$mens  .=  "Estabelecimento: ".$estabelecimento."                                                    \n";

	$mens  .=  "Cidade: ".$cidade_estabelecimento."                                                    \n";

	$mens  .=  "Telefone: ".$tel_estabelecimento."                                                    \n";

	$mens  .=  "E-Mail: ".$email_estabelecimento."                                                    \n";



	

	//DISPARA O EMAIL

	//$envia  =  mail($email_dest, "Cliente cadastrado no sistema em ".$datacadastro, $mens,"From:".$email_dest."\r\nBcc:".$email);

	



?>









<p>&nbsp;</p>

<p>&nbsp;</p>

<form name="form1" method="post" action="cadcli_insert.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit" value="Cadastrar outro Cliente">

</form>

<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="hidden" name="nome" id="nome" />
  <input type="submit" name="Submit2" value="Voltar">

</form>

<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>

<?
//AQUI GRAVA O CLIENTE COMO USUARIO DO CARTAO FIDELIDADE
require '../../../conect/conect.php';

$datacadastro = date('d-m-Y');
$horacadastro = date('H:i:s');
$status_cartao_fideliade = "Ativo";

$sql = "SELECT * FROM usuarios where cpf = '$cpf'";
$res = mysql_query($sql);
$registros_encontrados = mysql_num_rows($res);

if($registros_encontrados>=1){
	
}
else{


$comando = "insert into usuarios(nome,sexo,estadocivil,cpf,rg,orgao,emissao,data_nasc,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,telefone,celular,email,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,obs,datacadastro,horacadastro,senha,funcao,estab_pertence,cidade_estab_pertence,tel_estab_pertence,email_estab_pertence,status,salario,limite,operador_atende) values('$nome','$sexo','$estadocivil','$cpf','$rg','$orgao','$emissao','$data_nasc','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$telefone','$celular','$email','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$obs','$datacadastro','$horacadastro','$cpf','$funcao','$estab_pertence','$cidade_estab_pertence','$tel_estab_pertence','$email_estab_pertence','$status_cartao_fideliade','$salario','$limite','$operador_atende')";

mysql_query($comando,$conexao) or die("Erro ao gravar usuário!");


echo "Usuário cadastrado com sucesso!<br> Foi enviado um e-mail ao usuário avisando ele que está cadastrado na Digicompras e uma cópia a você! <br><br>já pode começar a utilizar os nossos serviços com o Nº do cartão<br><br>";





$sql = "SELECT * FROM usuarios order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


echo "Nº do cartão do usuário: $linha[0]<br>";
echo "Nome do usuário: $linha[1]<br>";
echo "Senha: Seu CPF<br>";
echo "Status: $linha[46]<br>";


$codigo = $linha[0];
$nome = $linha[1];
$cpf = $linha[4];
$datacadastro = $linha[29];
$horacadastro = $linha[30];
$operador = $linha[21];
$cel_operador = $linha[22];
$email_operador = $linha[23];
$estabelecimento = $linha[24];
$cidade_estabelecimento = $linha[25];
$tel_estabelecimento = $linha[26];
$email_estabelecimento = $linha[27];
$estab_pertence = $linha[42];
$cidade_estab_pertence = $linha[43];
$email_estab_pertence = $linha[45];
$tel_estab_pertence = $linha[44];
$senha = $linha[40];
$status = $linha[46];
$salario = $linha[47];
$limite = $linha[48];


} 


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
	$mens   =  "Olá! $nome você foi cadastrado como usuário do cartão fidelidade $nfantasia!   \n";
	$mens  .=  "Seja muito bem vindo a Digicompras! \n";
	$mens  .=  "Nosso site para você visualizar seu saldo de pontos e nos enviar sugestoes $site \n\n";
	$mens  .=  "Nº do seu cartão: ".$codigo."                                                       \n";	
	$mens  .=  "Status do seu cartão: ".$status."                                                       \n";	
	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "Sua senha: Seu CPF/CNPJ(somente numeros)                                                    \n";
	
	$mens  .=  "Data do cadastro: ".$datacadastro."                                                    \n";
	$mens  .=  "Hora do cadastro: ".$horacadastro."                                                    \n\n";
	$mens  .=  "As empresas onde você costuma comprar ainda não faz parte do sistema de pontos? Solicite que ela faça a adesão na Digicommpras(16-99739-1418) para que você possa pontuar e receber seus brindes da empresa onde costuma fazer suas compras!                                  \n";
	


	
	//DISPARA O EMAIL
	$envia  =  mail($email_dest, "$nome cadastrado(a) na $nfantasia em ".$datacadastro, $mens,"From:".$email_dest."\r\nBcc:".$email);
	
}

?>
