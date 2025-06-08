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
$razaosocial = $_POST['razaosocial'];
$nfantasia_old = $_POST['nfantasia'];
	$nfantasia2 = explode("-", $nfantasia_old);

$nfantasia = $nfantasia2[0];
	
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
$status = $_POST['status'];
$valor = $_POST['valor'];
if($valor==117.50){
$dias_contrato = "90";
}
else{
$dias_contrato = "365";
}
	
$classificacao = $_POST['classificacao'];


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$db = $linha[1];	
}


$comando = "update `$db`.`estabelecimentos` set `codigo` = '$codigo',`razaosocial` = '$razaosocial',`nfantasia` = '$nfantasia-$classificacao',`cnpj` = '$cnpj',`inscr_est` = '$inscr_est',`endereco` = '$endereco',`numero` = '$numero',`bairro` = '$bairro',`complemento` = '$complemento',`cep` = '$cep',`cidade` = '$cidade',`estado` = '$estado',`telefone` = '$telefone',`fax` = '$fax',`email` = '$email',`site` = '$site',`proprietario` = '$proprietario',`cpf` = '$cpf',`rg` = '$rg',`obs` = '$obs'
,`valor` = '$valor',`dias_contrato` = '$dias_contrato',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`status` = '$status',`classificacao` = '$classificacao' where `estabelecimentos`. `codigo` = '$codigo' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar informações dessa concessionária");


echo "Dados da concessionária alterados no banco de dados com sucesso<br>";
	
	
$comando = "update `$db`.`orcamentos` set `loja` = '$nfantasia-$classificacao' where `orcamentos`. `loja` = '$nfantasia'";
mysql_query($comando,$conexao) or die("orcamentos");
	
$comando = "update `$db`.`operadores` set `estab_pertence` = '$nfantasia-$classificacao' where `operadores`. `estab_pertence` = '$nfantasia'";
mysql_query($comando,$conexao) or die("operadores");
	
$comando = "update `$db`.`estoque_pecas` set `estab_pertence` = '$nfantasia-$classificacao' where `estoque_pecas`. `estab_pertence` = '$nfantasia'";
mysql_query($comando,$conexao) or die("estoque_pecas");
	
$comando = "update `$db`.`faturamento_futuro` set `loja` = '$nfantasia-$classificacao' where `faturamento_futuro`. `loja` = '$nfantasia'";
mysql_query($comando,$conexao) or die("faturamento futuro");
	
$comando = "update `$db`.`ocorrencias` set `concessionaria` = '$nfantasia-$classificacao' where `ocorrencias`. `concessionaria` = '$nfantasia'";
mysql_query($comando,$conexao) or die("ocorrencias");
	
$comando = "update `$db`.`nfs_manutencao` set `fornecedor` = '$nfantasia-$classificacao' where `nfs_manutencao`. `fornecedor` = '$nfantasia'";
mysql_query($comando,$conexao) or die("nfs_manutencao");
	
$comando = "update `$db`.`cx_abertura` set `departamento` = '$nfantasia-$classificacao',`loja` = '$nfantasia-$classificacao' where `cx_abertura`. `loja` = '$nfantasia'";
mysql_query($comando,$conexao) or die("cx abertura");
	
$comando = "update `$db`.`cx_fechamento` set `departamento` = '$nfantasia-$classificacao',`loja` = '$nfantasia-$classificacao' where `cx_fechamento`. `loja` = '$nfantasia'";
mysql_query($comando,$conexao) or die("cx fechamentos");
	
$comando = "update `$db`.`cx_entradas` set `departamento` = '$nfantasia-$classificacao',`nfantasia` = '$nfantasia-$classificacao',`estabelecimento` = '$nfantasia-$classificacao' where `cx_entradas`. `nfantasia` = '$nfantasia'";
mysql_query($comando,$conexao) or die("cx entradas");
	
$comando = "update `$db`.`cx_saidas` set `nfantasia` = '$nfantasia-$classificacao' where `cx_saidas`. `nfantasia` = '$nfantasia'";
mysql_query($comando,$conexao) or die("cx saidas");
	
$comando = "update `$db`.`contas_a_receber` set `estabelecimento` = '$nfantasia-$classificacao',`departamento` = '$nfantasia-$classificacao' where `contas_a_receber`. `estabelecimento` = '$nfantasia'";
mysql_query($comando,$conexao) or die("contas a receber");
	
$comando = "update `$db`.`contas_a_pagar` set `estabelecimento` = '$nfantasia-$classificacao' where `contas_a_pagar`. `estabelecimento` = '$nfantasia'";
mysql_query($comando,$conexao) or die("contas a pagar");
	
$comando = "update `$db`.`codigo_gerente` set `estab_pertence` = '$nfantasia-$classificacao' where `codigo_gerente`. `estab_pertence` = '$nfantasia'";
mysql_query($comando,$conexao) or die("cod_gerente");
	
$comando = "update `$db`.`categorias_despesas` set `estab_pertence` = '$nfantasia-$classificacao' where `categorias_despesas`. `estab_pertence` = '$nfantasia'";
mysql_query($comando,$conexao) or die("cod_gerente");
?>

<?
$sql = "SELECT * FROM estabelecimentos where codigo = '$codigo' limit 1";
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
$operador_atendente = $linha[41];

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
	$mens   =  "Olá! seus dados foram atualizados na $nfantasia!   \n";
	$mens  .=  "Visite-nos $site \n";
	$mens  .=  "Código: ".$codigo."                                                       \n";
	$mens  .=  "Nome Fantasia: ".$nfantasia."                                                    \n";
	$mens  .=  "Telefone: ".$telefone."                                                    \n";
	$mens  .=  "Data da alteração: ".$dataalteracao."                                                    \n";
	$mens  .=  "Hora da alteração: ".$horaalteracao."                                                    \n";
	$mens  .=  "Operador que atende: ".$operador_atendente."                                                    \n";
	$mens  .=  "Operador que atualizou: ".$operador_alterou."                                                    \n";
	$mens  .=  "Celular do operador: ".$cel_operador_alterou."                                                    \n";
	$mens  .=  "E-Mail do operador: ".$email_operador_alterou."                                                    \n";
	$mens  .=  "Estabelecimento a que pertence: ".$estabelecimento_alterou."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento_alterou."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento_alterou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento_alterou."                                                    \n";


	
	//DISPARA O EMAIL
	$envia  =  mail($email_dest, "Concessionária atualizado no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email);
	

?>


<body>
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar">
</form>
</body>
</html>
<?
mysql_close($conexao);
?>
