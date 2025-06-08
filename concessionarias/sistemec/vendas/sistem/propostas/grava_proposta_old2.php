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

//require("conexao.php"); or die("erro na requisição");

require '../../conect/conect.php';







//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 

$sql = "SELECT * FROM fundo_navegacao";

//EXECUTA O COMANDO ACIMA

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

$reg++;

?>





<body bgcolor="#<? printf("$linha[1]"); ?>">

  <?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>

  

<? } ?>

<?

// dados da proposta

$status = $_POST['status'];

$status_pagto_cliente = $_POST['status_pagto_cliente'];

$nome_operador = $_POST['nome_operador'];

$tipo_proposta = $_POST['tipo_proposta'];

$tipo_contrato = $_POST['tipo_contrato'];

$tabela = $_POST['tabela'];

$tipo = $_POST['tipo'];

$dataproposta = $_POST['dataproposta'];

$horaproposta = $_POST['horaproposta'];

$estabelecimento_proposta = $_POST['estabelecimento_proposta'];

$nome = $_POST['nome'];

$cpf = $_POST['cpf'];

$num_beneficio = $_POST['num_beneficio'];

$num_beneficio2 = $_POST['num_beneficio2'];

$num_beneficio3 = $_POST['num_beneficio3'];

$num_beneficio4 = $_POST['num_beneficio4'];

$data_nasc = $_POST['data_nasc'];

$rg = $_POST['rg'];

$orgao = $_POST['orgao'];

$emissao = $_POST['emissao'];

$pai = $_POST['pai'];

$mae = $_POST['mae'];

$endereco = $_POST['endereco'];

$numero  = $_POST['numero'];

$bairro = $_POST['bairro'];

$complemento = $_POST['complemento'];

$cidade = $_POST['cidade'];

$estado = $_POST['estado'];

$cep = $_POST['cep'];

$sexo = $_POST['sexo'];

$estadocivil = $_POST['estadocivil'];

$telefone = $_POST['telefone'];

$celular = $_POST['celular'];

$email = $_POST['email'];

$valor_credito = $_POST['valor_credito'];

$valor_total = $_POST['valor_total'];

$valor_liquido_cliente = $_POST['valor_liquido_cliente'];

$valor_liberado = $_POST['valor_liberado'];

$quant_parc = $_POST['quant_parc'];

$parcela = $_POST['parcela'];

$banco_pagto = $_POST['banco_pagto'];

$bco_operacao = $_POST['bco_operacao'];

$num_banco = $_POST['num_banco'];

$agencia = $_POST['agencia'];

$conta = $_POST['conta'];

$parc1 = $_POST['parc1'];

$banco1 = $_POST['banco1'];

$vencto1 = $_POST['vencto1'];

$compra1 = $_POST['compra1'];





$obs = $_POST['obs'];

$recebido = $_POST['recebido'];

//dados do operador



$operador = $_POST['operador'];

$cel_operador = $_POST['cel_operador'];

$email_operador = $_POST['email_operador'];



$operador_alterou = $_POST['operador_alterou'];

$cel_operador_alterou = $_POST['cel_operador_alterou'];

$email_operador_alterou = $_POST['email_operador_alterou'];



//dados do estabelecimento



$estabelecimento = $_POST['estabelecimento'];

$cidade_estabelecimento = $_POST['cidade_estabelecimento'];

$tel_estabelecimento = $_POST['tel_estabelecimento'];

$email_estabelecimento = $_POST['email_estabelecimento'];

$estabelecimento_alterou = $_POST['estabelecimento_alterou'];

$cidade_estabelecimento_alterou = $_POST['cidade_estabelecimento_alterou'];

$tel_estabelecimento_alterou = $_POST['tel_estabelecimento_alterou'];

$email_estabelecimento_alterou = $_POST['email_estabelecimento_alterou'];



$status = $_POST['status'];

$mes_ano = $_POST['mes_ano'];



$dia = $_POST['dia'];

$mes = $_POST['mes'];

$ano = $_POST['ano'];



$status_fisico = $_POST['status_fisico'];




$sql = "SELECT * FROM clientes where cpf = '$cpf'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$cod_cli = $linha[0];

$telefone_cli = $linha[18];

$celular_cli = $linha[19];



}



//Aqui começa a verificação do telefone do cliente



if($telefone<>$telefone_cli){

$sql = "SELECT * FROM telefones_de_clientes where cod_cli = '$cod_cli' and telefone = '$telefone'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$lista_telefone = $linha[2];



}

if($lista_telefone==""){

$comando = "insert into telefones_de_clientes(cod_cli,telefone) values('$cod_cli','$telefone')";

mysql_query($comando,$conexao);





}



// Aqui começa a verificação do celular do cliente

}





if($celular<>$celular_cli){

$sql = "SELECT * FROM telefones_de_clientes where cod_cli = '$cod_cli' and telefone = '$celular'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$lista_telefone = $linha[2];



}

if($lista_telefone==""){

$comando = "insert into telefones_de_clientes(cod_cli,telefone) values('$cod_cli','$celular')";

mysql_query($comando,$conexao);





}





}

















$comando = "insert into propostas(status,nome_operador,tipo,tipo_proposta,dataproposta,horaproposta,estabelecimento_proposta,nome,cpf,num_beneficio,data_nasc,rg,orgao,emissao,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,sexo,estadocivil,telefone,celular,email,valor_credito,valor_liberado,quant_parc,parcela,banco_pagto,bco_operacao,num_banco,agencia,conta,parc1,banco1,vencto1,compra1,obs,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_beneficio2,num_beneficio3,num_beneficio4,mes_ano,recebido,status_pagto_cliente,dia,mes,ano,tabela,valor_total,valor_liquido_cliente,status_fisico,num_bordero,tipo_contrato) values('$status','$nome_operador','$tipo','$tipo_proposta','$dataproposta','$horaproposta','$estabelecimento_proposta','$nome','$cpf','$num_beneficio','$data_nasc','$rg','$orgao','$emissao','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$sexo','$estadocivil','$telefone','$celular','$email','$valor_credito','$valor_liberado','$quant_parc','$parcela','$banco_pagto','$bco_operacao','$num_banco','$agencia','$conta','$parc1','$banco1','$vencto1','$compra1','$obs','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_beneficio2','$num_beneficio3','$num_beneficio4','$mes_ano','$recebido','$status_pagto_cliente','$dia','$mes','$ano','$tabela','$valor_total','$valor_liquido_cliente','$status_fisico','','$tipo_contrato')";





mysql_query($comando,$conexao);





echo "Proposta efetuada com sucesso!<br><br>";



?>





<?

$sql = "SELECT * FROM propostas order by num_proposta desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

<?

$num_proposta = $linha[0];

$nome = $linha[4];

$cpf = $linha[7];

$tipo_proposta = $linha[83];

$tipo = $linha[2];

$dataproposta = $linha[40];

$horaproposta = $linha[41];

$status = $linha[51];

$operador = $linha[32];

$cel_operador = $linha[33];

$email_operador = $linha[34];

$estabelecimento = $linha[35];

$cidade_estabelecimento = $linha[36];

$tel_estabelecimento = $linha[37];

$email_estabelecimento = $linha[38];

$bco_operacao = $linha[86];

$valor_total = $linha[113];

$tipo_contrato = $linha[136];


?>



<? } ?>



<?

printf("O número da proposta é: $num_proposta");



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
	
$sql = "SELECT * FROM tipo_contrato where tipo_contrato = '$tipo_contrato' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


//$tipocontrato = $linha[1];
$email_mesa = $linha[2];

}
	
$email_dest = $email_mesa;


	// FIM DO SCRIPT DO EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO


	

	//PREPARA O PEDIDO

	$mens   =  "Olá! Sua proposta foi efetiva com sucesso na $nfantasia!   \n";

	$mens  .=  "Visite-nos $site \n";

	$mens  .=  "Nome: ".$nome."                                                       \n";

	$mens  .=  "CPF: ".$cpf."                                                    \n";

	$mens  .=  "Perfil do cliente: ".$tipo."                                                    \n";

	$mens  .=  "Tipo de Proposta: ".$tipo_proposta."                                                    \n";
	
	$mens  .=  "Tipo de Contrato: ".$tipo_contrato."                                                    \n";
	
	$mens  .=  "Banco de Operação: ".$bco_operacao."                                                    \n";
	
	$mens  .=  "Valor Bruto da operação: ".$valor_total."                                                    \n";
	
	$mens  .=  "Valor Líquido da operação: ".$valor_liquido_cliente."                                                    \n";
	
	$mens  .=  "Prazo: ".$quant_parc."                                                    \n";
	
	$mens  .=  "Parcela: ".$parcela."                                                    \n";
	
	$mens  .=  "Tabela da Operação: ".$tabela."                                                    \n";

	$mens  .=  "Data da proposta: ".$dataproposta."                                                    \n";

	$mens  .=  "Hora da proposta: ".$horaproposta."                                                    \n";

	$mens  .=  "Número da Proposta: ".$num_proposta."                                                    \n";

	$mens  .=  "Status: ".$status."                                                    \n";

	$mens  .=  "Operador que efetuou o cadastro: ".$operador."                                                    \n";

	$mens  .=  "Celular: ".$cel_operador."                                                    \n";

	$mens  .=  "E-Mail: ".$email_operador."                                                    \n";

	$mens  .=  "Estabelecimento: ".$estabelecimento."                                                    \n";

	$mens  .=  "Cidade: ".$cidade_estabelecimento."                                                    \n";

	$mens  .=  "Telefone: ".$tel_estabelecimento."                                                    \n";

	$mens  .=  "E-Mail: ".$email_estabelecimento."                                                    \n";



	

	//DISPARA O EMAIL

	$envia  =  mail($email_dest, "Proposta Nº ".$num_proposta." efetuada no sistema em ".$dataproposta, $mens,"From:".$email_dest."\r\nBcc:".$email);

	$envia  =  mail($email_operador, "Proposta Nº ".$num_proposta.", ".$operador."! Efetue ativação no sistema",$mens,"From:".$email_dest);



?>









<p>&nbsp;</p>

<form action="imprimir_proposta.php" method="post" name="form1" target="_blank">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit3" value="Imprimir Proposta">

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">

</form>

<form name="form1" method="post" action="../index.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit2" value="Voltar ao menu principal">

</form>

<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>