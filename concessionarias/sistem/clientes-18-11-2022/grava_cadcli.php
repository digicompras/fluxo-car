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



$empresaconveniada = $_POST['empresaconveniada'];
$comandadofuncionario = $_POST['comandadofuncionario'];
$statusdofuncionario = $_POST['statusdofuncionario'];





$comando = "insert into clientes(nome,sexo,estadocivil,cpf,rg,orgao,emissao,data_nasc,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,telefone,celular,email,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,obs,datacadastro,horacadastro,tipo,status_cliente,local_trabalho,fone_comercial,newsletter,empresaconveniada,comandadofuncionario,statusdofuncionario) values('$nome','$sexo','$estadocivil','$cpf','$rg','$orgao','$emissao','$data_nasc','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$telefone','$celular','$email','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$obs','$datacadastro','$horacadastro','$tipo','$status_cliente','$local_trabalho','$fone_comercial','$newsletter','$empresaconveniada','$comandadofuncionario','$statusdofuncionario')";



mysql_query($comando,$conexao) or die("Erro ao gravar cliente!");





echo "Cliente cadastrado com sucesso!<br><br>";


if(empty($obs)){
	
}
else{

$comando = "insert into observacoes_de_clientes(cod_cli,cpf,data,hora,obs,operador) values('$codigo','$cpf','$dataalteracao','$horaalteracao','$obs','$operador_alterou')";



mysql_query($comando,$conexao) or die("Erro ao gravar observações do cliente!<br><br>");


}

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
	
$codigo = $linha[0];


?>

<?

printf("O Nº da matrícula do cliente é: $codigo");

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

<table width="100%" border="0">
  <tr>
    <td width="19%"><div align="center">
      <form name="form1" method="post" action="menu.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="hidden" name="nome" id="nome" />
        <input type="submit" name="Submit2" value="Voltar">
      </form>
    </div></td>
    <td width="21%"><div align="center">
      <form action="carta_interno.php" method="post" name="form3" target="_blank">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
        <input type="submit" name="button" id="button" value="Emitir Carta (Mala-direta)">
      </form>
    </div></td>
    <td width="21%"><div align="center">
      <form name="form1" method="post" action="cadcli_insert.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit" value="Cadastrar outro Cliente">
      </form>
    </div></td>
    <td width="19%"><div align="center"></div></td>
    <td width="20%"><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>