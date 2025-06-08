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
$num_proposta = $_POST['num_proposta'];
$status = $_POST['status'];
$nome_operador = $_POST['nome_operador'];
$tipo_proposta = $_POST['tipo_proposta'];
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


//
//

$comando = "insert into propostas_excluidas(num_proposta,status,nome_operador,tipo,tipo_proposta,dataproposta,horaproposta,estabelecimento_proposta,nome,cpf,num_beneficio,data_nasc,rg,orgao,emissao,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,sexo,estadocivil,telefone,celular,email,valor_credito,valor_liberado,quant_parc,parcela,banco_pagto,bco_operacao,num_banco,agencia,conta,parc1,banco1,vencto1,compra1,obs,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,num_beneficio2,num_beneficio3,num_beneficio4,mes_ano) values('$num_proposta','$status','$nome_operador','$tipo','$tipo_proposta','$dataproposta','$horaproposta','$estabelecimento_proposta','$nome','$cpf','$num_beneficio','$data_nasc','$rg','$orgao','$emissao','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$sexo','$estadocivil','$telefone','$celular','$email','$valor_credito','$valor_liberado','$quant_parc','$parcela','$banco_pagto','$bco_operacao','$num_banco','$agencia','$conta','$parc1','$banco1','$vencto1','$compra1','$obs','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_beneficio2','$num_beneficio3','$num_beneficio4','$mes_ano')";


mysql_query($comando,$conexao);


echo "Proposta excluída com sucesso!<br><br>";

?>


<?
$sql = "SELECT * FROM propostas_excluidas order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>
<?
$num_proposta_excluir = $linha[1];
$nome_op = $linha[2];
$nome = $linha[5];
$cpf = $linha[8];
$tipo_proposta = $linha[84];
$tipo = $linha[3];
$dataproposta = $linha[41];
$horaproposta = $linha[42];
$status = $linha[52];
$operador = $linha[33];
$cel_operador = $linha[34];
$email_operador = $linha[35];
$estabelecimento = $linha[36];
$cidade_estabelecimento = $linha[37];
$tel_estabelecimento = $linha[38];
$email_estabelecimento = $linha[39];

?>

<? } ?>

<?
printf("O número da proposta excluída é: $num_proposta_excluir");

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
	$mens   =  "Olá! A proposta Nº $num_proposta foi excluida da $nfantasia!   \n";
	$mens  .=  "Visite-nos $site \n";
	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "CPF: ".$cpf."                                                    \n";
	$mens  .=  "Perfil do cliente: ".$tipo."                                                    \n";
	$mens  .=  "Tipo de proposta: ".$tipo_proposta."                                                    \n";
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
	$envia  =  mail($email_dest, "Proposta Nº ".$num_proposta." excluida no sistema em ".$dataproposta, $mens,"From:".$email_dest."\r\nBcc:".$email);

?>

<?
error_reporting(E_ALL);


$num_proposta_a_excluir = $_POST['num_proposta'];

$comando = "delete from `propostas` where `propostas`. `num_proposta` = '$num_proposta_a_excluir' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao excluir proposta"); ?>

<? echo "Proposta excluída com sucesso:"; ?> 





<p>&nbsp;</p>
<form name="form1" method="post" action="../principal.php">
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