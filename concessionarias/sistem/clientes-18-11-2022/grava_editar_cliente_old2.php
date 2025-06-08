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

$resposta = $_POST['resposta'];

$sexo = $_POST['sexo'];

$estadocivil = $_POST['estadocivil'];

$cpf = $_POST['cpf'];

$rg = $_POST['rg'];

$orgao = $_POST['orgao'];

$emissao = $_POST['emissao'];

$data_nasc = $_POST['data_nasc'];

$naturalidade = $_POST['naturalidade'];

$mes_niver = $_POST['mes_niver'];

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

$datealteracao = date('Y-m-d');

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

$pagto_beneficio = $_POST['pagto_beneficio'];

$obs2 = $_POST['obs2'];





$dataprev = $_POST['dataprev'];


$tem_margem = $_POST['tem_margem'];

$saldo1 = $_POST['saldo1'];

$saldo2 = $_POST['saldo2'];

$saldo3 = $_POST['saldo3'];

$saldo4 = $_POST['saldo4'];

$saldo5 = $_POST['saldo5'];

$saldo6 = $_POST['saldo6'];

$saldo7 = $_POST['saldo7'];







$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`clientes` set `codigo` = '$codigo',`nome` = '$nome',`sexo` = '$sexo',`estadocivil` = '$estadocivil',`cpf` = '$cpf',`rg` = '$rg',`orgao` = '$orgao',`emissao` = '$emissao',`data_nasc` = '$data_nasc',`pai` = '$pai',`mae` = '$mae',`endereco` = '$endereco',`numero` = '$numero',`bairro` = '$bairro',`complemento` = '$complemento',`cidade` = '$cidade',`estado` = '$estado',`cep` = '$cep',`telefone` = '$telefone',`celular` = '$celular',

`email` = '$email',`obs` = '$obs',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`datealteracao` = '$datealteracao',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`tipo`= '$tipo',`banco`= '$banco',`agencia`= '$agencia',`conta`= '$conta',`num_beneficio`= '$num_beneficio',`parc1`= '$parc1',`banco1`= '$banco1',`vencto1`= '$vencto1',`compra1`= '$compra1',`parc2`= '$parc2',`banco2`= '$banco2',`vencto2`= '$vencto2',`compra2`= '$compra2',`parc3`= '$parc3',`banco3`= '$banco3',`vencto3`= '$vencto3',`compra3`= '$compra3',`parc4`= '$parc4',`banco4`= '$banco4',`vencto4`= '$vencto4',`compra4`= '$compra4',`parc5`= '$parc5',`banco5`= '$banco5',`vencto5`= '$vencto5',`compra5`= '$compra5',

`parc6`= '$parc6',`banco6`= '$banco6',`vencto6`= '$vencto6',`compra6`= '$compra6',`parc7`= '$parc7',`banco7`= '$banco7',`vencto7`= '$vencto7',`compra7`= '$compra7',`num_beneficio2`= '$num_beneficio2',`num_beneficio3`= '$num_beneficio3',`num_beneficio4`= '$num_beneficio4',`dataprev`= '$dataprev',`obs2`= '$obs2',`mes_niver`= '$mes_niver',`tem_margem`= '$tem_margem',`saldo1`= '$saldo1',`saldo2`= '$saldo2',`saldo3`= '$saldo3',`saldo4`= '$saldo4',`saldo5`= '$saldo5',`saldo6`= '$saldo6',`saldo7`= '$saldo7',`naturalidade`= '$naturalidade',`pagto_beneficio`= '$pagto_beneficio',`resposta`= '$resposta' where `clientes`. `codigo` = '$codigo' limit 1 ";

}



mysql_query($comando,$conexao) or die("Erro ao alterar informações desse cadastro <br><br>");






if(empty($obs2)){
}
else{
$comando = "insert into observacoes_de_clientes(cod_cli,cpf,data,hora,obs,operador) values('$codigo','$cpf','$dataalteracao','$horaalteracao','$obs2','$operador_alterou')";



mysql_query($comando,$conexao) or die("Erro ao gravar observações do cliente!<br><br>");

}







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
$cod_cli = $linha[0];

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

<table width="100%" border="1">
  <tr>
    <td width="20%"><form name="form2" method="post" action="menu.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit" value="Voltar">
    </form></td>
    <td width="34%"><form name="form2" method="post" action="editar_cliente.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input type="submit" name="Submit2" value="Continuar editando cliente">
    </form></td>
    <td width="46%"><form name="form1" method="post" action="ver_possibilidade.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="cod_cli" type="hidden" id="cod_cli" value="<? echo $cod_cli; ?>">
      <input name="status" type="hidden" id="status" value="<? echo "a responder"; ?>">
      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input name="telefone" type="hidden" id="telefone" value="<? echo $telefone; ?>">
      <input name="celular" type="hidden" id="celular" value="<? echo $celular; ?>">
      <input name="operador" type="hidden" id="operador" value="<? echo $operador_alterou; ?>">
      <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $cel_operador_alterou; ?>">
      <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_operador_alterou; ?>">
      <input name="num_beneficio" type="hidden" id="num_beneficio" value="<? echo $num_beneficio; ?>">
      <input name="num_beneficio2" type="hidden" id="num_beneficio2" value="<? echo $num_beneficio2; ?>">
      <input name="num_beneficio3" type="hidden" id="num_beneficio3" value="<? echo $num_beneficio3; ?>">
      <input name="num_beneficio4" type="hidden" id="num_beneficio4" value="<? echo $num_beneficio4; ?>">
      <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo $dataalteracao; ?>">
      <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo $horaalteracao; ?>">
      <input name="resposta" type="hidden" id="resposta" value="<? echo $resposta; ?>">
      <input type="submit" name="Submit4" value="Ver Possibilidade">
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><form name="form2" method="post" action="ver_margem.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="cod_cli" type="hidden" id="cod_cli" value="<? echo $cod_cli; ?>">
      <input type="submit" name="Submit3" value="Ver Margem">
    </form></td>
  </tr>
</table>
</body>

</html>

<?

mysql_close($conexao);

?>

