<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

$senha = $_SESSION['senha'];


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


	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	
$db = $linha[1];
}
?>
		  
		  
		  <?
	
$codigo = $_POST['codigo'];
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
$horaalteracao = $_POST['horaalteracao'];
$operador_alterou = $_POST['operador_alterou'];
$cel_operador_alterou = $_POST['cel_operador_alterou'];
$email_operador_alterou = $_POST['email_operador_alterou'];
$estabelecimento_alterou = $_POST['estabelecimento_alterou'];
$cidade_estabelecimento_alterou = $_POST['cidade_estabelecimento_alterou'];
$tel_estabelecimento_alterou = $_POST['tel_estabelecimento_alterou'];
$email_estabelecimento_alterou = $_POST['email_estabelecimento_alterou'];
$usuario = $_POST['usuario'];
$senhadooperador =  $_POST['senhadooperador'];
$tipo_op = $_POST['tipo_op'];
$funcao = $_POST['funcao'];
$estab_pertence = $_POST['estab_pertence'];
$obra = $_POST['obra'];
	
	$tipofiltro = $_POST['tipofiltro'];
	
$dia_fechamento_folha = $_POST['dia_fechamento_folha'];
$tempo_almoco = $_POST['tempo_almoco'];
$horas_diarias = $_POST['horas_diarias'];
$regimecontratacao = $_POST['regimecontratacao'];
	$veiculos = $_POST['veiculos'];
	$cidadeatuacao = $_POST['cidadeatuacao'];
	
	$recebenotificacao = $_POST['recebenotificacao'];
	$iniciar_rdo_diferenciado = $_POST['iniciar_rdo_diferenciado'];
	$estoque = $_POST['estoque'];
	$conciliacoes = $_POST['conciliacoes'];
	$despesas = $_POST['despesas'];
	$rdo = $_POST['rdo'];
	$responsavelpelordo = $_POST['responsavelpelordo'];
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
	$retira_itens_do_orcamento = $_POST['retira_itens_do_orcamento'];
	$vendas = $_POST['vendas'];
	$custo_fixo = $_POST['custo_fixo'];
	$transferencia_de_estoque = $_POST['transferencia_de_estoque'];
	$status_e_condicao_da_transferencia_de_estoque = $_POST['status_e_condicao_da_transferencia_de_estoque'];
	$responder_transferencias_de_estoque = $_POST['responder_transferencias_de_estoque'];
	$visualiza_transferencias = $_POST['visualiza_transferencias'];

		  
$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$cidade_estab_pertence = $linha[10];
$email_estab_pertence = $linha[14];
$tel_estab_pertence = $linha[12];
$classificacao = $linha[46];
}
	
$sql2 = "SELECT * FROM cidades where cidade = '$cidadeatuacao' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$uf = $linha[2];
	
}
	
$sql3 = "SELECT * FROM cidades_de_atuacao where cidade = '$cidadeatuacao' and operador = '$nome'";
$res3 = mysql_query($sql3);
$quant_cidade_atuacao = mysql_num_rows($res3);
	
	
	
	if($quant_cidade_atuacao<=0){
		
$comando = "insert into cidades_de_atuacao(cidade,uf,operador,estab_pertence,responsavelpelordo) values('$cidadeatuacao','$uf','$nome','$estab_pertence','$responsavelpelordo')";
mysql_query($comando,$conexao) or die("Erro ao gravar cidade de operação!");
	}
	else{
		
$comando = "update `$db`.`cidades_de_atuacao` set `cidade` = '$cidade',`uf` = '$uf',`operador` = '$nome',`estab_pertence` = '$estab_pertence',`responsavel` = '$responsavelpelordo' where `cidades_de_atuacao`. `operador` = '$nome' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar informações cidades_de_atuacao em operadores");
	
	}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`operadores` set `cidadeatuacao` = '$cidadeatuacao',`nome` = '$nome',`sexo` = '$sexo',`estadocivil` = '$estadocivil',`cpf` = '$cpf',`rg` = '$rg',`orgao` = '$orgao',`emissao` = '$emissao',`data_nasc` = '$data_nasc',`pai` = '$pai',`mae` = '$mae',`endereco` = '$endereco',`numero` = '$numero',`bairro` = '$bairro',`complemento` = '$complemento',`cidade` = '$cidade',`estado` = '$estado',`cep` = '$cep',`telefone` = '$telefone',`celular` = '$celular',`tipo_op`= '$tipo_op',
`email` = '$email',`obs` = '$obs',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`usuario` = '$usuario',`senha` = '$senhadooperador',`funcao` = '$funcao',`estab_pertence` = '$estab_pertence',`cidade_estab_pertence` = '$cidade_estab_pertence',`tel_estab_pertence` = '$tel_estab_pertence',`email_estab_pertence` = '$email_estab_pertence',`obra` = '$obra',`tipofiltro` = '$tipofiltro',`dia_fechamento_folha` = '$dia_fechamento_folha',`tempo_almoco` = '$tempo_almoco',`horas_diarias` = '$horas_diarias',`regimecontratacao` = '$regimecontratacao',`veiculos` = '$veiculos',`recebenotificacao` = '$recebenotificacao',`iniciar_rdo_diferenciado` = '$iniciar_rdo_diferenciado',`estoque` = '$estoque',`conciliacoes` = '$conciliacoes',`despesas` = '$despesas',`rdo` = '$rdo',`avisodepecas` = '$avisodepecas',`administracartaoponto` = '$administracartaoponto',`relatoriodepecasutilizadas` = '$relatoriodepecasutilizadas',`fornecedores` = '$fornecedores',`inventario` = '$inventario',`estoque_entradas` = '$estoque_entradas',`cadastro_de_itens` = '$cadastro_de_itens',`alimentacao_rdo` = '$alimentacao_rdo',`estoque_entradas_por_xml_autorizado` = '$estoque_entradas_por_xml_autorizado',`veiculodaempresa` = '$veiculodaempresa',`controlekm` = '$controlekm',`orcamento` = '$orcamento',`permissao_categoria_de_produtos` = '$permissao_categoria_de_produtos',`inclui_mais_uma_nf` = '$inclui_mais_uma_nf',`financeiro` = '$financeiro',`relatoriodecomissao` = '$relatoriodecomissao',`registrodeoperadores` = '$registrodeoperadores',`abrir_e_fechar_cx` = '$abrir_e_fechar_cx',`editar_produtos` = '$editar_produtos',`quantitativo_do_item_no_estoque` = '$quantitativo_do_item_no_estoque',`categoria_despesas` = '$categoria_despesas',`cadastro_de_contas_bancarias` = '$cadastro_de_contas_bancarias',`aliquotas_dos_cartoes` = '$aliquotas_dos_cartoes',`classificacao` = '$classificacao',`retira_itens_do_orcamento` = '$retira_itens_do_orcamento',`vendas` = '$vendas',`custo_fixo` = '$custo_fixo',`transferencia_de_estoque` = '$transferencia_de_estoque',`status_e_condicao_da_transferencia_de_estoque` = '$status_e_condicao_da_transferencia_de_estoque',`responder_transferencias_de_estoque` = '$responder_transferencias_de_estoque',`visualiza_transferencias` = '$visualiza_transferencias',`responsavelpelordo` = '$responsavelpelordo' where `operadores`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao) or die("Erro ao alterar informações desse operador");


echo "Dados do operador alterados no banco de dados com sucesso<br>";
?>

<?
$sql = "SELECT * FROM operadores where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>
<?
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
	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "CPF: ".$cpf."                                                    \n";
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
	//$envia  =  mail($email_dest, "Operador atualizado no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email);
	

?>


<?

$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
?>
	
<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input class='class01' type="submit" name="Submit2" value="Voltar">
</form>
</body>
</html>
<?
mysql_close($conexao);
?>
