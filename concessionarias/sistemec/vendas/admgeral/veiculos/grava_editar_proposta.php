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



// dados da proposta

$num_proposta = $_POST['num_proposta'];

$operador_atendente = $_POST['operador_atendente'];

$estabelecimento_proposta = $_POST['estabelecimento_proposta'];

$mes_ano = $_POST['mes_ano'];

$tipo = $_POST['tipo'];

$tipo_proposta = $_POST['tipo_proposta'];

$dataalteracao = $_POST['dataalteracao'];

$horaalteracao = $_POST['horaalteracao'];

//dados do cliente

$nome = $_POST['nome'];

$tipo_pessoa = $_POST['tipo_pessoa'];

$data_nasc = $_POST['data_nasc'];

$cpf = $_POST['cpf'];

$rg = $_POST['rg'];

$orgao = $_POST['orgao'];

$estado_emissao = $_POST['estado_emissao'];

$emissao = $_POST['emissao'];

$sexo = $_POST['sexo'];

$estadocivil = $_POST['estadocivil'];

$nacionalidade = $_POST['nacionalidade'];

$quant_dependente = $_POST['quant_dependente'];

$pai = $_POST['pai'];

$mae = $_POST['mae'];

$conjuge = $_POST['conjuge'];

$data_nasc_conjuge = $_POST['data_nasc_conjuge'];

$endereco = $_POST['endereco'];

$numero  = $_POST['numero'];

$bairro = $_POST['bairro'];

$complemento = $_POST['complemento'];

$cidade = $_POST['cidade'];

$estado = $_POST['estado'];

$cep = $_POST['cep'];

$correspondencia = $_POST['correspondencia'];

$tipo_residencia = $_POST['tipo_residencia'];

$valor_aluguel = $_POST['valor_aluguel'];

$tempo_residencia = $_POST['tempo_residencia'];

$meses_residencia = $_POST['meses_residencia'];

$ddd_tel = $_POST['ddd_tel'];

$telefone = $_POST['telefone'];

$ddd_cel = $_POST['ddd_cel'];

$celular = $_POST['celular'];

$tipo_telefone = $_POST['tipo_telefone'];

$residencia_anterior = $_POST['residencia_anterior'];

$bairro_anterior = $_POST['bairro_anterior'];

$cidade_anterior = $_POST['cidade_anterior'];

$estado_anterior = $_POST['estado_anterior'];

$tempo_residencia_anterior = $_POST['tempo_residencia_anterior'];

$email = $_POST['email'];





//informações profissionais

$empresa = $_POST['empresa'];

$porte_empresa = $_POST['porte_empresa'];

$data_admissao = $_POST['data_admissao'];

$meses = $_POST['meses'];

$inicio_atividade = $_POST['inicio_atividade'];

$end_empresa = $_POST['end_empresa'];

$numero_empresa = $_POST['numero_empresa'];

$complemento_empresa = $_POST['complemento_empresa'];

$bairro_empresa = $_POST['bairro_empresa'];

$cep_empresa = $_POST['cep_empresa'];

$cidade_empresa = $_POST['cidade_empresa'];

$estado_empresa = $_POST['estado_empresa'];

$ddd_tel_empresa = $_POST['ddd_tel_empresa'];

$telefone_empresa = $_POST['telefone_empresa'];

$cargo = $_POST['cargo'];

$natureza_operacao = $_POST['natureza_operacao'];

$salario = $_POST['salario'];

$atividade_principal = $_POST['atividade_principal'];

$cnpj = $_POST['cnpj'];

$ddd_tel_contador = $_POST['ddd_tel_contador'];

$tel_contador = $_POST['tel_contador'];





//atividade/emprego anterior





$atividade_anterior = $_POST['atividade_anterior'];

$data_admissao_anterior = $_POST['data_admissao_anterior'];

$data_saida = $_POST['data_saida'];

$cargo_anterior = $_POST['cargo_anterior'];

$ddd_tel_empresa_anterior = $_POST['ddd_tel_empresa_anterior'];

$telefone_empresa_anterior = $_POST['telefone_empresa_anterior'];

$outras_rendas = $_POST['outras_rendas'];





//fontes de referencia





$ref_pessoal = $_POST['ref_pessoal'];

$ddd_ref_pessoal = $_POST['ddd_ref_pessoal'];

$tel_ref_pessoal = $_POST['tel_ref_pessoal'];

$ref_pessoal2 = $_POST['ref_pessoal2'];

$ddd_ref_pessoal2 = $_POST['ddd_ref_pessoal2'];

$tel_ref_pessoal2 = $_POST['tel_ref_pessoal2'];

$ref_comercial = $_POST['ref_comercial'];

$ddd_ref_comercial = $_POST['ddd_ref_comercial'];

$tel_ref_comercial = $_POST['tel_ref_comercial'];





//referencias financeiras





$ref_banco = $_POST['ref_banco'];

$ref_agencia = $_POST['ref_agencia'];

$digito_agencia = $_POST['digito_agencia'];

$ref_conta = $_POST['ref_conta'];

$digito_conta = $_POST['digito_conta'];

$ref_tipo_conta = $_POST['ref_tipo_conta'];

$ref_conta_desde = $_POST['ref_conta_desde'];

$ano_ref_conta = $_POST['ano_ref_conta'];

$cartao_credito = $_POST['cartao_credito'];





//referencias de bens





$automovel = $_POST['automovel'];

$valor_automoveis = $_POST['valor_automoveis'];

$residencia = $_POST['residencia'];

$valor_residencia = $_POST['valor_residencia'];

$outras_propriedades = $_POST['outras_propriedades'];

$valor_outras_propriedades = $_POST['valor_outras_propriedades'];





//dados da operação



$bco_operacao = $_POST['bco_operacao'];

$veiculo = $_POST['veiculo'];

$chassi = $_POST['chassi'];

$ano_modelo = $_POST['ano_modelo'];

$modelo = $_POST['modelo'];

$renavam = $_POST['renavam'];

$num_portas = $_POST['num_portas'];

$combustivel = $_POST['combustivel'];

$placa = $_POST['placa'];

$valor_venda = $_POST['valor_venda'];

$valor_entrada = $_POST['valor_entrada'];

$tarifa_cadastro = $_POST['tarifa_cadastro'];

$valor_financiar = $_POST['valor_financiar'];

$codigo_tabela = $_POST['codigo_tabela'];

$mista = $_POST['mista'];

$coeficiente = $_POST['coeficiente'];

$r = $_POST['r'];

$valor_liberado = $_POST['valor_liberado'];

$num_parcelas = $_POST['num_parcelas'];

$valor_parcelas = $_POST['valor_parcelas'];

$trinta = $_POST['trinta'];



$quarenta_cinco_recebe = $_POST['quarenta_cinco'];

if($quarenta_cinco_recebe==""){

$quarenta_cinco = "";

}

else{

$quarenta_cinco = $quarenta_cinco_recebe;

}

$pagto_serv_terc = $_POST['pagto_serv_terc'];

$obs = $_POST['obs'];

$bem = $_POST['bem'];





//outros dados nao relevantes





$recebido = $_POST['recebido'];

$cpt = $_POST['cpt'];

$serie = $_POST['serie'];

$vencto_1_parcela = $_POST['vencto_1_parcela'];

$data_constituicao = $_POST['data_constituicao'];

$inscr_est = $_POST['inscr_est'];





//dados do operador





$operador_alterou = $_POST['operador_alterou'];

$cel_operador_alterou = $_POST['cel_operador_alterou'];

$email_operador_alterou = $_POST['email_operador_alterou'];



//dados do estabelecimento



$estab_alterou = $_POST['estab_alterou'];

$cidade_estab_alterou = $_POST['cidade_estab_alterou'];

$tel_estab_alterou = $_POST['tel_estab_alterou'];

$email_estab_alterou = $_POST['email_estab_alterou'];



$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`propostas_veiculos` set `num_proposta` = '$num_proposta',`operador_atendente` = '$operador_atendente',

`status` = 'Reanalise',`estabelecimento_proposta` = '$estabelecimento_proposta',`mes_ano` = '$mes_ano',`tipo` = '$tipo',

`tipo_proposta` = '$tipo_proposta',



`nome` = '$nome',`tipo_pessoa` = '$tipo_pessoa',`data_nasc` = '$data_nasc',`cpf` = '$cpf',`rg` = '$rg',`orgao` = '$orgao',

`estado_emissao` = '$estado_emissao',`emissao` = '$emissao',`sexo` = '$sexo',`estadocivil` = '$estadocivil',

`nacionalidade` = '$nacionalidade',`quant_dependente` = '$quant_dependente',`pai` = '$pai',`mae` = '$mae',`conjuge` = '$conjuge',

`data_nasc_conjuge` = '$data_nasc_conjuge',`endereco` = '$endereco',`numero` = '$numero',`bairro` = '$bairro',

`complemento` = '$complemento',`cidade` = '$cidade',`estado` = '$estado',`cep` = '$cep',`correspondencia` = '$correspondencia',

`tipo_residencia` = '$tipo_residencia',`valor_aluguel` = '$valor_aluguel',`tempo_residencia` = '$tempo_residencia',

`meses_residencia` = '$meses_residencia',`ddd_tel` = '$ddd_tel',`telefone` = '$telefone',`ddd_cel` = '$ddd_cel',

`celular` = '$celular',`tipo_telefone` = '$tipo_telefone',`residencia_anterior` = '$residencia_anterior',

`bairro_anterior` = '$bairro_anterior',`cidade_anterior` = '$cidade_anterior',`estado_anterior` = '$estado_anterior',

`tempo_residencia_anterior` = '$tempo_residencia_anterior',`email` = '$email',



`empresa` = '$empresa',`porte_empresa` = '$porte_empresa',`data_admissao` = '$data_admissao',`meses` = '$meses',

`inicio_atividade` = '$inicio_atividade',`end_empresa` = '$end_empresa',`numero_empresa` = '$numero_empresa',

`complemento_empresa` = '$complemento_empresa',`bairro_empresa` = '$bairro_empresa',`cep_empresa` = '$cep_empresa',

`cidade_empresa` = '$cidade_empresa',`estado_empresa` = '$estado_empresa',`ddd_tel_empresa` = '$ddd_tel_empresa',

`telefone_empresa` = '$telefone_empresa',`cargo` = '$cargo',`natureza_operacao` = '$natureza_operacao',

`salario` = '$salario',`atividade_principal` = '$atividade_principal',`cnpj` = '$cnpj',`ddd_tel_contador` = '$ddd_tel_contador',

`tel_contador` = '$tel_contador',



`atividade_anterior` = '$atividade_anterior',`data_admissao_anterior` = '$data_admissao_anterior',`data_saida` = '$data_saida',

`cargo_anterior` = '$cargo_anterior',`ddd_tel_empresa_anterior` = '$ddd_tel_empresa_anterior',`telefone_empresa_anterior` = '$telefone_empresa_anterior',

`outras_rendas` = '$outras_rendas',



`ref_pessoal` = '$ref_pessoal',`ddd_ref_pessoal` = '$ddd_ref_pessoal',`tel_ref_pessoal` = '$tel_ref_pessoal',

`ref_pessoal2` = '$ref_pessoal2',`ddd_ref_pessoal2` = '$ddd_ref_pessoal2',`tel_ref_pessoal2` = '$tel_ref_pessoal2',

`ref_comercial` = '$ref_comercial',`ddd_ref_comercial` = '$ddd_ref_comercial',`tel_ref_comercial` = '$tel_ref_comercial',



`ref_banco` = '$ref_banco',`ref_agencia` = '$ref_agencia',`digito_agencia` = '$digito_agencia',

`ref_conta` = '$ref_conta',`digito_conta` = '$digito_conta',`ref_tipo_conta` = '$ref_tipo_conta',

`ref_conta_desde` = '$ref_conta_desde',`ano_ref_conta` = '$ano_ref_conta',`cartao_credito` = '$cartao_credito',



`automovel` = '$automovel',`valor_automoveis` = '$valor_automoveis',

`residencia` = '$residencia',`valor_residencia` = '$valor_residencia',

`outras_propriedades` = '$outras_propriedades',`valor_outras_propriedades` = '$valor_outras_propriedades',



`veiculo` = '$veiculo',`ano_modelo` = '$ano_modelo',`modelo` = '$modelo',

`renavam` = '$renavam',`num_portas` = '$num_portas',`combustivel` = '$combustivel',`placa` = '$placa',

`valor_venda` = '$valor_venda',`valor_entrada` = '$valor_entrada',`tarifa_cadastro` = '$tarifa_cadastro',

`valor_financiar` = '$valor_financiar',`codigo_tabela` = '$codigo_tabela',`mista` = '$mista',

`coeficiente` = '$coeficiente',`r` = '$r',`valor_liberado` = '$valor_liberado',`num_parcelas` = '$num_parcelas',

`valor_parcelas` = '$valor_parcelas',`trinta` = '$trinta',`quarenta_cinco` = '$quarenta_cinco',

`pagto_serv_terc` = '$pagto_serv_terc',`obs` = '$obs',`recebido` = '$recebido',`cpt` = '$cpt',

`serie` = '$serie',`vencto_1_parcela` = '$vencto_1_parcela',`data_constituicao` = '$data_constituicao',

`inscr_est` = '$inscr_est',



`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',

`email_operador_alterou` = '$email_operador_alterou',`estab_alterou` = '$estab_alterou',

`cidade_estab_alterou` = '$cidade_estab_alterou',`tel_estab_alterou` = '$tel_estab_alterou',

`email_estab_alterou` = '$email_estab_alterou',`dataalteracao` = '$dataalteracao',

`horaalteracao` = '$horaalteracao',`bem` = '$bem',`chassi` = '$chassi',`bco_operacao` = '$bco_operacao' where `propostas_veiculos`. `num_proposta` = '$num_proposta' limit 1 ";

}



mysql_query($comando,$conexao) or die("Erro ao alterar informações da proposta nº $num_proposta");





echo "Dados da proposta nº $num_proposta alterados com sucesso<br><br> Aguarde resposta, foi para Reanálise!!!...";

?>



<?

$sql = "SELECT * FROM propostas_veiculos where num_proposta = '$num_proposta'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

<?

$num_proposta = $linha[0];

$nome = $linha[4];

$operador_atendente = $linha[5];

$cpf = $linha[7];

$dataalteracao = $linha[42];

$horaalteracao = $linha[43];

$status = $linha[51];

$operador_alterou = $linha[44];

$cel_operador_alterou = $linha[45];

$email_operador_alterou = $linha[46];

$estabelecimento_alterou = $linha[47];

$cidade_estabelecimento_alterou = $linha[48];

$tel_estabelecimento_alterou = $linha[49];

$email_estabelecimento_alterou = $linha[50];



$email_operador = $linha[111];





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

	$mens   =  "Olá! os dados de sua proposta foram alterados na $nfantasia!   \n";

	$mens  .=  "Visite-nos $site \n\n";

	

	$mens  .=  "Nº da Proposta: ".$num_proposta."                                                    \n";

	$mens  .=  "Nome: ".$nome."                                                       \n";

	$mens  .=  "CPF: ".$cpf."                                                    \n";

	$mens  .=  "Data da alteração: ".$dataalteracao."                                                    \n";

	$mens  .=  "Hora da alteração: ".$horaalteracao."                                                    \n";

	$mens  .=  "STATUS: ".$status."                                                    \n\n";

	

	$mens  .=  "Operador que efetuou a alteração: ".$operador_alterou."                                                    \n";

	$mens  .=  "Celular: ".$cel_operador_alterou."                                                    \n";

	$mens  .=  "E-Mail: ".$email_operador_alterou."                                                    \n";

	$mens  .=  "Estabelecimento: ".$estabelecimento_alterou."                                                    \n";

	$mens  .=  "Cidade: ".$cidade_estabelecimento_alterou."                                                    \n";

	$mens  .=  "Telefone: ".$tel_estabelecimento_alterou."                                                    \n";

	$mens  .=  "E-Mail: ".$email_estabelecimento_alterou."                                                    \n";



	

	//DISPARA O EMAIL

	//$envia  =  mail($email_dest, "Proposta alterada no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email);

	//$envia  =  mail($email_operador, "Proposta Nº ".$num_proposta.", ".$operador_atendente."! Confira os dados no sistema!",$mens,"From:".$email_dest);



?>





<body>

<form name="form1" method="post" action="index.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit2" value="Voltar ao menu principal">

</form>

</body>

</html>

<?

mysql_close($conexao);

?>

