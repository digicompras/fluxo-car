<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');
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


?>


<?

$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
?>
	
<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
  
<?
// dados do operador

$tipo_op = $_POST['tipo_op'];

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
	$obra = $_POST['obra'];
	$iniciar_rdo_diferenciado = $_POST['iniciar_rdo_diferenciado'];
	$tipofiltro = $_POST['tipofiltro'];
	
	
$datacadastro = $_POST['datacadastro'];
$horacadastro = $_POST['horacadastro'];

//estabelecimento a que pertence
$estab_pertence = $_POST['estab_pertence'];
$cidade_estab_pertence = $_POST['cidade_estab_pertence'];
$tel_estab_pertence = $_POST['tel_estab_pertence'];
$email_estab_pertence = $_POST['email_estab_pertence'];





//dados do operador

$operador = $_POST['operador'];
$cel_operador = $_POST['cel_operador'];
$email_operador = $_POST['email_operador'];

//dados do estabelecimento

$estabelecimento = $_POST['estabelecimento'];
$cidade_estabelecimento = $_POST['cidade_estabelecimento'];
$tel_estabelecimento = $_POST['tel_estabelecimento'];
$email_estabelecimento = $_POST['email_estabelecimento'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$frase_secreta = $_POST['frase_secreta'];
// Observações

$obs = $_POST['obs'];
$funcao = $_POST['funcao'];
$dia_fechamento_folha = $_POST['dia_fechamento_folha'];
$tempo_almoco = $_POST['tempo_almoco'];
$horas_diarias = $_POST['horas_diarias'];
$regimecontratacao = $_POST['regimecontratacao'];
	
$recebenotificacao = $_POST['recebenotificacao'];
	$iniciar_rdo_diferenciado = $_POST['iniciar_rdo_diferenciado'];
	$estoque = $_POST['estoque'];
	$conciliacoes = $_POST['conciliacoes'];
	$despesas = $_POST['despesas'];
	$rdo = $_POST['rdo'];
	$avisodepecas = $_POST['avisodepecas'];
	$administracartaoponto = $_POST['administracartaoponto'];
	$relatoriodepecasutilizadas = $_POST['relatoriodepecasutilizadas'];
	$fornecedores = $_POST['fornecedores'];
	$inventario = $_POST['inventario'];
	$estoque_entradas = $_POST['estoque_entradas'];
	$cadastro_de_itens = $_POST['cadastro_de_itens'];
	$alimentacao_rdo = $_POST['alimentacao_rdo'];
	$estoque_entradas_por_xml_autorizado = $_POST['estoque_entradas_por_xml_autorizado'];
	$veiculodaempresa = $_POST['veiculodaempresa'];
	$controlekm = $_POST['controlekm'];
	$orcamento = $_POST['orcamento'];
	$permissao_categoria_de_produtos = $_POST['permissao_categoria_de_produtos'];
	$inclui_mais_uma_nf = $_POST['inclui_mais_uma_nf'];
	$financeiro = $_POST['financeiro'];
	$relatoriodecomissao = $_POST['relatoriodecomissao'];
	$registrodeoperadores = $_POST['registrodeoperadores'];
	$abrir_e_fechar_cx = $_POST['abrir_e_fechar_cx'];
	$editar_produtos = $_POST['editar_produtos'];
	$quantitativo_do_item_no_estoque = $_POST['quantitativo_do_item_no_estoque'];
	$categoria_despesas = $_POST['categoria_despesas'];
	$cadastro_de_contas_bancarias = $_POST['cadastro_de_contas_bancarias'];
	$aliquotas_dos_cartoes = $_POST['aliquotas_dos_cartoes'];
	
$cidadeatuacao = $_POST['cidadeatuacao'];
	
$sql2 = "SELECT * FROM cidades where cidade = '$cidadeatuacao' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$uf = $linha[2];
	
}
	
$sql3 = "SELECT * FROM cidades_de_atuacao where cidade = '$cidadeatuacao' and operador = '$operador'";
$res3 = mysql_query($sql3);
$quant_cidade_atuacao = mysql_num_rows($res3);
	
	if($quant_cidade_atuacao<=0){
		
$comando = "insert into cidades_de_atuacao(cidade,uf,operador) values('$cidadeatuacao','$uf','$nome')";
mysql_query($comando,$conexao) or die("Erro ao gravar cidade de atuação!");
	}
	else{
	
	}



$comando = "insert into operadores(cidadeatuacao,nome,sexo,estadocivil,cpf,rg,orgao,emissao,data_nasc,pai,mae,endereco,numero,bairro,complemento,cidade,estado,cep,telefone,celular,email,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,obs,datacadastro,horacadastro,usuario,senha,funcao,estab_pertence,cidade_estab_pertence,tel_estab_pertence,email_estab_pertence,tipo_op,obra,iniciar_rdo_diferenciado,tipofiltro,recebenotificacao,dia_fechamento_folha,tempo_almoco,horas_diarias,regimecontratacao,registrodeoperadores,abrir_e_fechar_cx,editar_produtos,quantitativo_do_item_no_estoque,categoria_despesas,cadastro_de_contas_bancarias,aliquotas_dos_cartoes) values('$cidadeatuacao','$nome','$sexo','$estadocivil','$cpf','$rg','$orgao','$emissao','$data_nasc','$pai','$mae','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$telefone','$celular','$email','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$obs','$datacadastro','$horacadastro','$usuario','$senha','$funcao','$estab_pertence','$cidade_estab_pertence','$tel_estab_pertence','$email_estab_pertence','$tipo_op','$obra','$iniciar_rdo_diferenciado','$tipofiltro','$recebenotificacao','$dia_fechamento_folha','$tempo_almoco','$horas_diarias','$regimecontratacao','$registrodeoperadores','$abrir_e_fechar_cx','$editar_produtos','$quantitativo_do_item_no_estoque','$categoria_despesas','$cadastro_de_contas_bancarias','$aliquotas_dos_cartoes')";

mysql_query($comando,$conexao) or die("Erro ao gravar operador!");

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];

}


echo "Operador cadastrado com sucesso!<br> Foi enviado um e-mail ao operador avisando ele que está cadastrado na $nfantasia e uma cópia a você <br><br>";

?>


<?
$sql = "SELECT * FROM operadores order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>
<?
printf("Código do operador é: $linha[0]");
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
$usuario = $linha[40];
$senha = $linha[41];
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];
$email_estab_pertence = $linha[47];
$tel_estab_pertence = $linha[46];


?>

<? } ?>

<?
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_empresa;
	
	//PREPARA O PEDIDO
	$mens   =  "Olá! você foi cadastrado como operador na $nfantasia!   \n";
	$mens  .=  "Seja muito bem vindo em nossa equipe! \n";
	$mens  .=  "Nosso site para você nos enviar as propostas $site \n";
	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "CPF: ".$cpf."                                                    \n";
	$mens  .=  "Ligado ao estabelecimento: ".$estab_pertence."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estab_pertence."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estab_pertence."                                                    \n";
	$mens  .=  "E_Mail: ".$email_estab_pertence."                                                    \n";	
	$mens  .=  "Data do cadastro: ".$datacadastro."                                                    \n";
	$mens  .=  "Hora do cadastro: ".$horacadastro."                                                    \n";
	$mens  .=  "Seu Usuário: ".$usuario."                                                    \n";
	$mens  .=  "Sua Senha: ".$senha."                                                    \n";
	$mens  .=  "Operador que efetuou o cadastro: ".$operador."                                                    \n";
	$mens  .=  "Celular: ".$cel_operador."                                                    \n";
	$mens  .=  "E-Mail: ".$email_operador."                                                    \n";
	$mens  .=  "Estabelecimento: ".$estabelecimento."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento."                                                    \n";


	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Operador cadastrado no sistema em ".$datacadastro, $mens,"From:".$email_dest."\r\nBcc:".$email);
	

?>




<p>&nbsp;</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="informe_estabelecimento.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit" value="Cadastrar outro Operador">
</form>
<form name="form1" method="post" action="menu.php">
  <input type="submit" name="Submit2" value="Voltar">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>