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

$status_cliente = $_POST['status_cliente'];

$rg = $_POST['rg'];

$orgao = $_POST['orgao'];

$emissao = $_POST['emissao'];

$data_nasc = $_POST['data_nasc'];

$mes_niver = $_POST['mes_niver'];

$pai = $_POST['pai'];

$mae = $_POST['mae'];

$endereco = $_POST['endereco'];

$numero = $_POST['numero'];

$bairro = $_POST['bairro'];

$complemento = $_POST['complemento'];

$cidade = $_POST['cidade'];

$estado = $_POST['estado'];
	
$regiao = $_POST['regiao'];

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




$obs = $_POST['obs'];



$local_trabalho = $_POST['local_trabalho'];
$fone_comercial = $_POST['fone_comercial'];
$newsletter = $_POST['newsletter'];



$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];

}

$comando = "update `$db`.`clientes` set `codigo` = '$codigo',`nome` = '$nome',`sexo` = '$sexo',`estadocivil` = '$estadocivil',`cpf` = '$cpf',`rg` = '$rg',`orgao` = '$orgao',`emissao` = '$emissao',`data_nasc` = '$data_nasc',`pai` = '$pai',`mae` = '$mae',`endereco` = '$endereco',`numero` = '$numero',`bairro` = '$bairro',`complemento` = '$complemento',`cidade` = '$cidade',`estado` = '$estado',`cep` = '$cep',`telefone` = '$telefone',`celular` = '$celular',

`email` = '$email',`obs` = '$obs',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`tipo`= '$tipo',`obs`= '$obs',`mes_niver`= '$mes_niver',`status_cliente`= '$status_cliente',`local_trabalho`= '$local_trabalho',`fone_comercial`= '$fone_comercial',`newsletter`= '$newsletter',`regiao`= '$regiao' where `clientes`. `codigo` = '$codigo' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar informações desse cadastro <br><br>");



$comando = "update `$db`.`orcamentos` set `regiao` = '$regiao',`endereco` = '$endereco',`numero` = '$numero',`bairro` = '$bairro',`cidade` = '$cidade',`estado` = '$estado' where `orcamentos`. `codigo_cliente` = '$codigo'";
mysql_query($comando,$conexao) or die("Erro ao alterar informações desse cadastro <br><br>");



$comando = "insert into observacoes_de_clientes(cod_cli,cpf,data,hora,obs,operador) values('$codigo','$cpf','$dataalteracao','$horaalteracao','$obs','$operador_alterou')";



mysql_query($comando,$conexao) or die("Erro ao gravar observações do cliente!<br><br>");









echo "Dados do cliente alterados no banco de dados com sucesso<br>";

?>



<?

//$criar_pasta = $_POST['criar_pasta'];



//if($criar_pasta=="Sim") { 





//mkdir("../../$cpf");



//}



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

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
	
	$email_dest   =   $email_empresa;

	

	//PREPARA O PEDIDO

	$mens   =  "Olá! seus dados foram atualizados na $nfantasia_empresa!   \n";

	$mens  .=  "Visite-nos $site_empresa \n";

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

	//$envia  =  mail($email_dest, "Cliente atualizado no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email);

	



?>





<?





			

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

<form name="form1" method="post" action="">

</form>

<form name="form2" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
  <input type="hidden" name="nome" id="nome" />
<input type="submit" name="Submit" value="Voltar">

</form>

<form name="form2" method="post" action="editar_cliente.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">

  <input type="submit" name="Submit2" value="Continuar editando cliente">

</form>

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
