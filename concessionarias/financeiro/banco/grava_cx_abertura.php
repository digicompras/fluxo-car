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

</style></head>



<?



require '../../../conect/conect.php';





$dia = date('d');

$mes = date('m');

$ano = date('Y');





			

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0"> 

  

<? } ?>




  


<?

// dados do aluno



$datacadastro = $_POST['datacadastro'];

$horacadastro = $_POST['horacadastro'];

$valor = $_POST['valor'];

$categoria_conta = $_POST['categoria_conta'];

$historico = $_POST['historico'];

$nfantasia = $_POST['nfantasia'];



//dados do operador



$operador = $_POST['operador'];

$cel_operador = $_POST['cel_operador'];

$email_operador = $_POST['email_operador'];

$estabelecimento = $_POST['estabelecimento'];

$cidade_estabelecimento = $_POST['cidade_estabelecimento'];

$tel_estabelecimento = $_POST['tel_estabelecimento'];

$email_estabelecimento = $_POST['email_estabelecimento'];

$historico = $_POST['historico'];





// Observa��es











?>



<?



$comando = "insert into cx_entradas(datacadastro,horacadastro,valor,nfantasia,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,historico,dia,mes,ano,categoria_conta) values('$datacadastro','$horacadastro','$valor','$nfantasia','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$historico','$dia','$mes','$ano','$categoria_conta')";



mysql_query($comando,$conexao) or die("Erro ao abrir o Caixa!... Tente novamente");



echo "Abertura de caixa registrada com sucesso!<br><br> Tenha um �timo dia de trabalho $operador";







$sql = "SELECT * FROM cx_entradas order by codigo desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$codigo_aluno = $linha[2];

$datacadastro = $linha[3];

$horacadastro = $linha[4];

$nome = $linha[5];

$nome_resp = $linha[6];

$cpf_resp = $linha[7];

$obs = $linha[8];



//dados do curso

$curso = $linha[9];

$modulos = $linha[10];

$duracao = $linha[11];

$mensalidade = $linha[12];

$vencto = $linha[13];

$quant_parc = $linha[14];

$modo_pagto = $linha[15];

$juros_diarios = $linha[16];

$valor_recebido = $linha[17];

$quitacao = $linha[18];







$operador = $linha[19];

$cel_operador = $linha[20];

$email_operador = $linha[21];

$estabelecimento = $linha[22];

$cidade_estabelecimento = $linha[23];

$tel_estabelecimento = $linha[24];

$email_estabelecimento = $linha[25];



$horaabertura = $linha[36];





}

?>









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

	$mens   =  "Ol� Alessandra! Foi aberto o caixa da $nfantasia   \n";

	$mens  .=  "Verifique abaixo \n\n";



	$mens  .=  "Data de abertura: ".$datacadastro."                                                       \n";	

	$mens  .=  "Valor de abertura: ".$valor_recebido."                                                    \n";

	$mens  .=  "hora de abertura: ".$horaabertura."                                                       \n";

	

	$mens  .=  "Operador que abriu o caixa hoje: ".$operador."                                                    \n";

	$mens  .=  "Celular: ".$cel_operador."                                                    \n";

	$mens  .=  "E-Mail: ".$email_operador."                                                    \n";

	$mens  .=  "Estabelecimento: ".$estabelecimento."                                                    \n";

	$mens  .=  "Cidade: ".$cidade_estabelecimento."                                                    \n";

	$mens  .=  "Telefone: ".$tel_estabelecimento."                                                    \n";

	$mens  .=  "E-Mail: ".$email_estabelecimento."                                                    \n";



	

	//DISPARA O EMAIL

	//$envia  =  mail($email_dest, "Abertura de caixa da $nfantasia em ".$datacadastro, $mens,"From:".$email_dest."\r\nBcc:".$email);



?>





<p>&nbsp;</p>

<table width="100%"  border="0">

  <tr>

    <td width="18%"><form name="form1" method="post" action="menu.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input name="codigo_aluno" type="hidden" id="codigo_aluno3" value="<? echo $codigo_aluno; ?>">

      <input type="submit" name="Submit2" value="Voltar">

    </form></td>

    <td width="2%">&nbsp;</td>

    <td width="23%">&nbsp;</td>

    <td width="3%">&nbsp;</td>

    <td width="20%">&nbsp;</td>

    <td width="34%">&nbsp;</td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

  </tr>

</table>

<p>&nbsp;</p>

<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>