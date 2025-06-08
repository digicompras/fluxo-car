<?php
session_start(); //inicia sessão...
if ($_SESSION["cnpj"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...
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
// dados do veiculo

$datacadastro = $_POST['datacadastro'];
$horacadastro = $_POST['horacadastro'];

//dados da concessionaria
$concessionaria = $_POST['concessionaria'];
$cnpj = $_POST['cnpj'];
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
$renavam  = $_POST['renavam'];
$obs_veiculo = $_POST['obs_veiculo'];
$status = $_POST['status'];

//dados do operador

$operador = $_POST['operador'];
$cel_operador = $_POST['cel_operador'];
$email_operador = $_POST['email_operador'];

//dados do estabelecimento

$estabelecimento = $_POST['estabelecimento'];
$cidade_estabelecimento = $_POST['cidade_estabelecimento'];
$tel_estabelecimento = $_POST['tel_estabelecimento'];
$email_estabelecimento = $_POST['email_estabelecimento'];



$comando = "insert into veiculos(datacadastro,horacadastro,concessionaria,cnpj_concessionaria,tel_concessionaria,email_concessionaria,cidade_concessionaria,estado_concessionaria,veiculo,placa,ano,modelo,chassi,renavam,obs_veiculo,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,status) 

values('$datacadastro','$horacadastro','$concessionaria','$cnpj','$tel_concessionaria','$email_concessionaria','$cidade_concessionaria','$estado_concessionaria','$veiculo','$placa','$ano','$modelo','$chassi','$renavam','$obs_veiculo','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$status')";

mysql_query($comando,$conexao) or die("Erro ao registrar o veículo!");

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];

}


echo "Veículo registrado com sucesso na $nfantasia! <br><br>";

?>


<?
$sql = "SELECT * FROM veiculos order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>
<?
printf("O Nº de registro do veículo é: $linha[0]");
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

?>

<? } ?>

<?
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_empresa;
	
	//PREPARA O PEDIDO
	$mens   =  "Olá! Veículo registrado na $nfantasia!   \n";
	$mens  .=  "Visite-nos $site \n\n";
	
	$mens  .=  "Data do cadastro: ".$datacadastro."                                                    \n";
	$mens  .=  "Hora do cadastro: ".$horacadastro."                                                    \n";
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
	
	
	$mens  .=  "Operador que efetuou o cadastro: ".$operador."                                                    \n";
	$mens  .=  "Celular: ".$cel_operador."                                                    \n";
	$mens  .=  "E-Mail: ".$email_operador."                                                    \n";
	$mens  .=  "Estabelecimento: ".$estabelecimento."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Veículo registrado na $nfantasia em ".$datacadastro, $mens,"From:".$email_dest."\r\nBcc:".$email_concessionaria);
	//$envia  =  mail($email_concessionaria, "Veículo registrado na $nfantasia em ".$datacadastro, $mens,"From:".$email_dest);

?>




<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="pesquisa.php">
  <?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
  <input type="submit" name="Submit" value="Registrar outro veiculo">
  <input name="cnpj" type="hidden" id="concessionaria3" value="<? echo $cnpj; ?>">
</form>
<form name="form1" method="post" action="menu.php">
  <?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
  <input type="submit" name="Submit2" value="Voltar">
  <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>