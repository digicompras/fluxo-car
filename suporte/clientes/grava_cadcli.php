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
//require("conexao.php"); or die("erro na requisi��o");
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
// dados do cliente

$nome = $_POST['nome'];
$sexo = $_POST['sexo'];
$estadocivil = $_POST['estadocivil'];
$cpf = $_POST['cpf'];
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
$tipo = $_POST['tipo'];
$banco = $_POST['banco'];
$agencia = $_POST['agencia'];
$conta = $_POST['conta'];
$num_beneficio = $_POST['num_beneficio'];
$num_beneficio2 = $_POST['num_beneficio2'];
$num_beneficio3 = $_POST['num_beneficio3'];
$num_beneficio4 = $_POST['num_beneficio4'];


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



// Observa��es

$obs = $_POST['obs'];
$arquivo = $_POST['arquivo'];



$uploaddir = '../../arquivos_cli/';
$uploadfile = $uploaddir. $_FILES['arquivo']['name'];

if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $uploaddir . $_FILES['arquivo']['name'])){
//echo "Arquivo enviado com sucesso!";
} else {
echo "Foto n�o foi enviada! Essa � obrigat�ria";
}



$comando = "insert into clientes(nome,sexo,estadocivil,cpf,rg,orgao,emissao,data_nasc,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,telefone,celular,email,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,obs,datacadastro,horacadastro,tipo,banco,agencia,conta,num_beneficio,parc1,banco1,vencto1,compra1,parc2,banco2,vencto2,compra2,parc3,banco3,vencto3,compra3,parc4,banco4,vencto4,compra4,parc5,banco5,vencto5,compra5,parc6,banco6,vencto6,compra6,parc7,banco7,vencto7,compra7,num_beneficio2,num_beneficio3,num_beneficio4,arquivo,mes_nasc) values('$nome','$sexo','$estadocivil','$cpf','$rg','$orgao','$emissao','$data_nasc','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$telefone','$celular','$email','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$obs','$datacadastro','$horacadastro','$tipo','$banco','$agencia','$conta','$num_beneficio','$parc1','$banco1','$vencto1','$compra1','$parc2','$banco2','$vencto2','$compra2','$parc3','$banco3','$vencto3','$compra3','$parc4','$banco4','$vencto4','$compra4','$parc5','$banco5','$vencto5','$compra5','$parc6','$banco6','$vencto6','$compra6','$parc7','$banco7','$vencto7','$compra7','$num_beneficio2','$num_beneficio3','$num_beneficio4','$arquivo','$mes_nasc')";

mysql_query($comando,$conexao) or die("Erro ao gravar cliente!");

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];

}


echo "Cliente cadastrado com sucesso!<br> Foi enviado um e-mail ao cliente avisando ele que est� cadastrado na $nfantasia e uma c�pia a voc� <br><br>";

?>


<?
$sql = "SELECT * FROM clientes order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>
<?
printf("O N� da matr�cula do cliente �: $linha[0]");
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
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_EMPRESA;
	
	//PREPARA O PEDIDO
	$mens   =  "Ol�! voc� foi cadastrado na $nfantasia!   \n";
	$mens  .=  "Visite-nos $SITE \n";
	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "CPF: ".$cpf."                                                    \n";
	$mens  .=  "Especifica��o: ".$tipo."                                                    \n";
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
	$envia  =  mail($email_dest, "Cliente cadastrado no sistema em ".$datacadastro, $mens,"From:".$email_dest."\r\nBcc:".$email);
	$envia  =  mail($email_operador, "Cliente cadastrado no sistema em ".$datacadastro, $mens,"From:".$email_dest);

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
<form name="form1" method="post" action="../propostas/informacoes_antecedem_efetuar_proposta.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit3" value="Preencher Proposta desse cliente">
  <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
  <input name="tipo" type="hidden" id="tipo" value="<? echo $tipo; ?>">
</form>
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar">
</form>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>