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
<title>GRAVA&Ccedil;&Atilde;O DE COMUNICADO DE VENDA</title>
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
//dados da concessionaria
$codigo = $_POST['codigo'];
$concessionaria = $_POST['concessionaria'];
$cnpj_concessionaria = $_POST['cnpj_concessionaria'];
$tel_concessionaria = $_POST['tel_concessionaria'];
$email_concessionaria = $_POST['email_concessionaria'];
$cidade_concessionaria = $_POST['cidade_concessionaria'];
$estado_concessionaria = $_POST['estado_concessionaria'];

//dados do veiculo
$veiculo = $_POST['veiculo'];
$placa = $_POST['placa'];
$ano = $_POST['ano'];
$modelo = $_POST['modelo'];
$chassi = $_POST['chassi'];
$renavam = $_POST['renavam'];
$status = $_POST['status'];
$obs_veiculo = $_POST['obs_veiculo'];

//inicio e fim do contrato
$dia_inicio_contrato = $_POST['dia_inicio_contrato'];
$mes_inicio_contrato = $_POST['mes_inicio_contrato'];
$ano_inicio_contrato = $_POST['ano_inicio_contrato'];
$dia_termino_contrato = $_POST['dia_termino_contrato'];
$mes_termino_contrato = $_POST['mes_termino_contrato'];
$ano_termino_contrato = $_POST['ano_termino_contrato'];

//dados do cliente
$nome = $_POST['nome'];
$alcunha = $_POST['alcunha'];
$data_nasc = $_POST['data_nasc'];
$mes_nasc = $_POST['mes_nasc'];
$sexo = $_POST['sexo'];
$estadocivil = $_POST['estadocivil'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$orgao = $_POST['orgao'];
$emissao = $_POST['emissao'];
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


//dados do operador que comunicou a venda
$data_comunicado = $_POST['data_comunicado'];
$hora_comunicado = $_POST['hora_comunicado'];
$operador_comunicou = $_POST['operador_comunicou'];
$cel_operador_comunicou = $_POST['cel_operador_comunicou'];
$email_operador_comunicou = $_POST['email_operador_comunicou'];
$estabelecimento_comunicou = $_POST['estabelecimento_comunicou'];
$cidade_estabelecimento_comunicou = $_POST['cidade_estabelecimento_comunicou'];
$tel_estabelecimento_comunicou = $_POST['tel_estabelecimento_comunicou'];
$email_estabelecimento_comunicou = $_POST['email_estabelecimento_comunicou'];



$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`veiculos` set `codigo` = '$codigo',`concessionaria` = '$concessionaria',`cnpj_concessionaria` = '$cnpj_concessionaria',`tel_concessionaria` = '$tel_concessionaria',`email_concessionaria` = '$email_concessionaria',`cidade_concessionaria` = '$cidade_concessionaria',`estado_concessionaria` = '$estado_concessionaria',`veiculo` = '$veiculo',`placa` = '$placa',`ano` = '$ano',`modelo` = '$modelo',`chassi` = '$chassi',`renavam` = '$renavam',`obs_veiculo` = '$obs_veiculo',`status` = '$status',`dia_inicio_contrato` = '$dia_inicio_contrato',`mes_inicio_contrato` = '$mes_inicio_contrato',`ano_inicio_contrato` = '$ano_inicio_contrato',`dia_termino_contrato` = '$dia_termino_contrato',`mes_termino_contrato` = '$mes_termino_contrato',`ano_termino_contrato` = '$ano_termino_contrato',`nome` = '$nome',`alcunha` = '$alcunha',`data_nasc` = '$data_nasc',`mes_nasc` = '$mes_nasc',`sexo` = '$sexo',`estadocivil` = '$estadocivil',`cpf` = '$cpf',`rg` = '$rg',`orgao` = '$orgao',`emissao` = '$emissao',`pai` = '$pai',`mae` = '$mae',`endereco` = '$endereco',`numero` = '$numero',`bairro` = '$bairro',`complemento` = '$complemento',`cidade` = '$cidade',`estado` = '$estado',`cep` = '$cep',`telefone` = '$telefone',`celular` = '$celular',`email` = '$email',`obs` = '$obs',`data_comunicado` = '$data_comunicado',`hora_comunicado` = '$hora_comunicado',`operador_comunicou` = '$operador_comunicou',`cel_operador_comunicou` = '$cel_operador_comunicou',`email_operador_comunicou` = '$email_operador_comunicou',`estabelecimento_comunicou` = '$estabelecimento_comunicou',`cidade_estabelecimento_comunicou` = '$cidade_estabelecimento_comunicou',`tel_estabelecimento_comunicou` = '$tel_estabelecimento_comunicou',`email_estabelecimento_comunicou` = '$email_estabelecimento_comunicou' where `veiculos`. `codigo` = '$codigo' limit 1 ";
}

mysql_query($comando,$conexao) or die("Erro ao comunicar a venda desse veículo! Tente novamente!");


echo "Comunicado de venda do veículo efetuado com sucesso! <br>";
?>

<?
$sql = "SELECT * FROM veiculos where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$datacadastro = $linha[1];
$horacadastro = $linha[2];
$concessionaria = $linha[10];
$cnpj_concessionaria = $linha[11];
$tel_concessionaria = $linha[12];
$email_concessionaria = $linha[13];
$cidade_concessionaria = $linha[14];
$estado_concessionaria = $linha[15];
$veiculo = $linha[16];
$ano = $linha[17];
$modelo = $linha[18];
$chassi = $linha[19];
$renavam = $linha[20];
$placa = $linha[21];
$obs_veiculo = $linha[22];
$dia_inicio_contrato = $linha[23];
$mes_inicio_contrato = $linha[24];
$ano_inicio_contrato = $linha[25];
$dia_termino_contrato = $linha[26];
$mes_termino_contrato = $linha[27];
$ano_termino_contrato = $linha[28];
$nome = $linha[29];
$alcunha = $linha[30];
$data_nasc = $linha[31];
$mes_nasc = $linha[32];
$sexo = $linha[33];
$estadocivil = $linha[34];
$cpf = $linha[35];
$rg = $linha[36];
$orgao = $linha[37];
$emissao = $linha[38];
$pai = $linha[39];
$mae = $linha[40];
$endereco = $linha[41];
$numero = $linha[42];
$bairro = $linha[43];
$complemento = $linha[44];
$cidade = $linha[45];
$estado = $linha[46];
$cep = $linha[47];
$telefone = $linha[48];
$celular = $linha[49];
$email = $linha[50];
$obs = $linha[51];
$data_comunicado = $linha[52];
$hora_comunicado = $linha[53];
$operador_comunicou = $linha[54];
$cel_operador_comunicou = $linha[55];
$email_operador_comunicou = $linha[56];
$estabelecimento_comunicou = $linha[57];
$cidade_estabelecimento_comunicou = $linha[58];
$tel_estabelecimento_comunicou = $linha[59];
$email_estabelecimento_comunicou = $linha[60];

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
	$mens   =  "Olá! Comunicado de venda efetuado na $nfantasia!   \n";
	$mens  .=  "Visite-nos $site \n\n";
	
	
	$mens  .=  "Data do comunicado: ".$data_comunicado."                                                    \n";
	$mens  .=  "Hora do comunicado: ".$hora_comunicado."                                                    \n";
	$mens  .=  "Concessionária: ".$concessionaria."                                                       \n";
	$mens  .=  "CNPJ: ".$cnpj_concessionaria."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_concessionaria."                                                    \n";
	$mens  .=  "Estado: ".$estado_concessionaria."                                                    \n";
	$mens  .=  "Telefone: ".$tel_concessionaria."                                                    \n";
	$mens  .=  "E-Mail: ".$email_concessionaria."                                                    \n\n";
	
	$mens  .=  "Veículo: ".$veiculo."                                                    \n";
	$mens  .=  "Ano: ".$ano."                                                    \n";
	$mens  .=  "Modelo: ".$modelo."                                                    \n";
	$mens  .=  "Chassi: ".$chassi."                                                    \n";
	$mens  .=  "Renavam: ".$renavam."                                                    \n";
	$mens  .=  "Placas: ".$placa."                                                    \n";
	$mens  .=  "Observações: ".$obs_veiculo."                                                    \n\n";
	
	$mens  .=  "Cliente: ".$nome."                                                    \n";
	$mens  .=  "Cidade: ".$cidade."                                                    \n";
	$mens  .=  "Endereço: ".$endereco."                                                    \n";
	$mens  .=  "Número: ".$numero."                                                    \n";
	$mens  .=  "Bairro: ".$bairro."                                                    \n";
	$mens  .=  "CEP: ".$cep."                                                    \n";
	$mens  .=  "Telefone: ".$telefone."                                                    \n";
	$mens  .=  "Celular: ".$celular."                                                    \n";
	$mens  .=  "Observações: ".$obs."                                                    \n\n";
	
	$mens  .=  "Operador que efetuou o comunicado: ".$operador_comunicou."                                                    \n";
	$mens  .=  "Celular: ".$cel_operador_comunicou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_operador_comunicou."                                                    \n";
	$mens  .=  "Estabelecimento: ".$estabelecimento_comunicou."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento_comunicou."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento_comunicou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento_comunicou."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Comunicado de venda realizado no sistema em ".$data_comunicado, $mens,"From:".$email_dest."\r\nBcc:".$email);

?>


<body>
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar">
  <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
</form>
</body>
</html>
<?
mysql_close($conexao);
?>
