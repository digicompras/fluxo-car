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

// DADOS DO CLIENTE

$operador_atendente = $_POST['operador_atendente'];

$digitacao = $_POST['digitacao'];

$estabelecimento_proposta = $_POST['estabelecimento_proposta'];

$dataproposta = $_POST['dataproposta'];

$data_proposta = $_POST['data_proposta'];

$horaproposta = $_POST['horaproposta'];

$mes_ano = $_POST['mes_ano'];

$status = $_POST['status'];

$tipo = $_POST['tipo'];

$tipo_proposta = $_POST['tipo_proposta'];

$titulo_proposta = $_POST['titulo_proposta'];

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

$data_nasc_conjuge  = $_POST['data_nasc_conjuge'];

$endereco = $_POST['endereco'];

$numero = $_POST['numero'];

$bairro = $_POST['bairro'];

$complemento = $_POST['complemento'];

$cidade = $_POST['cidade'];

$estado = $_POST['estado'];

$cep = $_POST['cep'];

$correspondencia = $_POST['correspondencia'];

$tipo_residencia = $_POST['tipo_residencia'];

$valor_aluguel = $_POST['valor_aluguel'];

$tempo_residencia = $_POST['tempo_residencia'];

$telefone = $_POST['telefone'];

$celular = $_POST['celular'];

$tipo_telefone = $_POST['tipo_telefone'];

$residencia_anterior = $_POST['residencia_anterior'];

$bairro_anterior = $_POST['bairro_anterior'];

$cidade_anterior = $_POST['cidade_anterior'];

$estado_anterior = $_POST['estado_anterior'];

$tempo_residencia_anterior = $_POST['tempo_residencia_anterior'];

$email = $_POST['email'];







//INFORMAÇÕES PROFISSIONAIS



$empresa = $_POST['empresa'];

$porte_empresa = $_POST['porte_empresa'];

$data_admissao = $_POST['data_admissao'];

$inicio_atividade = $_POST['inicio_atividade'];

$end_empresa = $_POST['end_empresa'];

$numero_empresa = $_POST['numero_empresa'];

$complemento_empresa = $_POST['complemento_empresa'];

$bairro_empresa = $_POST['bairro_empresa'];

$cep_empresa = $_POST['cep_empresa'];

$cidade_empresa = $_POST['cidade_empresa'];

$estado_empresa = $_POST['estado_empresa'];

$telefone_empresa = $_POST['telefone_empresa'];

$cpt = $_POST['cpt'];

$serie = $_POST['serie'];

$cargo = $_POST['cargo'];

$natureza_operacao = $_POST['natureza_operacao'];

$salario = $_POST['salario'];

$atividade_principal = $_POST['atividade_principal'];

$data_constituicao = $_POST['data_constituicao'];

$cnpj = $_POST['cnpj'];

$inscr_est = $_POST['inscr_est'];

$capital_social = $_POST['capital_social'];

$tel_contador = $_POST['tel_contador'];





// EMPREGO ANTERIOR



$atividade_anterior = $_POST['atividade_anterior'];

$data_admissao_anterior = $_POST['data_admissao_anterior'];

$data_saida = $_POST['data_saida'];

$cargo_anterior = $_POST['cargo_anterior'];

$telefone_empresa_anterior = $_POST['telefone_empresa_anterior'];

$outras_rendas = $_POST['outras_rendas'];







// FONTES DE REFERENCIA



$ref_pessoal = $_POST['ref_pessoal'];

$tel_ref_pessoal = $_POST['tel_ref_pessoal'];

$ref_pessoal2 = $_POST['ref_pessoal2'];

$tel_ref_pessoal2 = $_POST['tel_ref_pessoal2'];

$ref_comercial = $_POST['ref_comercial'];

$tel_ref_comercial = $_POST['tel_ref_comercial'];







// REFERENCIAS FINANCEIRAS



$ref_banco = $_POST['ref_banco'];

$ref_agencia = $_POST['ref_agencia'];

$ref_conta = $_POST['ref_conta'];

$ref_tipo_conta = $_POST['ref_tipo_conta'];

$ref_conta_desde = $_POST['ref_conta_desde'];

$cartao_credito = $_POST['cartao_credito'];







// REFERENCIAS DE BENS



$automovel = $_POST['automovel'];

$valor_automoveis = $_POST['valor_automoveis'];

$residencia = $_POST['residencia'];

$valor_residencia = $_POST['valor_residencia'];

$outras_propriedades = $_POST['outras_propriedades'];

$valor_outras_propriedades = $_POST['valor_outras_propriedades'];







// DADOS DA OPERAÇÃO

$bem = $_POST['bem'];

$veiculo = $_POST['veiculo'];

$chassi = $_POST['chassi'];

$ano_modelo = $_POST['ano_modelo'];

$renavam = $_POST['renavam'];

$num_portas = $_POST['num_portas'];

$combustivel = $_POST['combustivel'];

$placa = $_POST['placa'];

$valor_venda = $_POST['valor_venda'];

$valor_entrada = $_POST['valor_entrada'];

$tarifa_cadastro = $_POST['tarifa_cadastro'];

$valor_financiar = $_POST['valor_financiar'];

$codigo_tabela = $_POST['codigo_tabela'];

$coeficiente = $_POST['coeficiente'];

$r = $_POST['r'];

$valor_liberado = $_POST['valor_liberado'];

$num_parcelas = $_POST['num_parcelas'];

$valor_parcelas = $_POST['valor_parcelas'];

$trinta = $_POST['trinta'];

$quarenta_cinco = $_POST['quarenta_cinco'];

$vencto_1_parcela = $_POST['vencto_1_parcela'];

$pagto_serv_terc = $_POST['pagto_serv_terc'];

$obs = $_POST['obs'];

$recebido = $_POST['recebido'];

$mista = $_POST['mista'];

$bco_operacao = $_POST['bco_operacao'];



// DADOS DO OPERADOR



$operador = $_POST['operador'];

$cel_operador = $_POST['cel_operador'];

$email_operador = $_POST['email_operador'];





//DADOS DO ESTABELECIMENTO



$estab_pertence = $_POST['estab_pertence'];

$cidade_estab_pertence = $_POST['cidade_estab_pertence'];

$tel_estab_pertence = $_POST['tel_estab_pertence'];

$email_estab_pertence = $_POST['email_estab_pertence'];



$meses = $_POST['meses'];

$meses_residencia = $_POST['meses_residencia'];

$ddd_tel = $_POST['ddd_tel'];

$ddd_cel = $_POST['ddd_cel'];

$ddd_tel_empresa = $_POST['ddd_tel_empresa'];

$ddd_tel_contador = $_POST['ddd_tel_contador'];

$ddd_tel_empresa_anterior = $_POST['ddd_tel_empresa_anterior'];

$ddd_ref_pessoal = $_POST['ddd_ref_pessoal'];

$ddd_ref_pessoal2 = $_POST['ddd_ref_pessoal2'];

$ddd_ref_comercial = $_POST['ddd_ref_comercial'];

$digito_agencia = $_POST['digito_agencia'];

$digito_conta = $_POST['digito_conta'];

$ano_ref_conta = $_POST['ano_ref_conta'];

$modelo = $_POST['modelo'];

$estado_emissao = $_POST['estado_emissao'];

$incluir_avalista = $_POST['incluir_avalista'];




$comando = "insert into propostas_veiculos(operador_atendente,estabelecimento_proposta,dataproposta,horaproposta,mes_ano,status,tipo,tipo_proposta,nome,tipo_pessoa,data_nasc,cpf,rg,orgao,emissao,sexo,estadocivil,nacionalidade,quant_dependente,pai,mae,conjuge,data_nasc_conjuge,endereco,numero,bairro,complemento,cidade,estado,cep,correspondencia,tipo_residencia,valor_aluguel,tempo_residencia,telefone,celular,tipo_telefone,residencia_anterior,bairro_anterior,cidade_anterior,estado_anterior,tempo_residencia_anterior,email,empresa,porte_empresa,data_admissao,inicio_atividade,end_empresa,numero_empresa,complemento_empresa,bairro_empresa,cep_empresa,cidade_empresa,estado_empresa,telefone_empresa,cpt,serie,cargo,natureza_operacao,salario,atividade_principal,data_constituicao,cnpj,inscr_est,tel_contador,atividade_anterior,data_admissao_anterior,data_saida,cargo_anterior,telefone_empresa_anterior,outras_rendas,ref_pessoal,tel_ref_pessoal,ref_comercial,tel_ref_comercial,ref_banco,ref_agencia,ref_conta,

ref_tipo_conta,ref_conta_desde,cartao_credito,automovel,valor_automoveis,residencia,valor_residencia,outras_propriedades,valor_outras_propriedades,bem,veiculo,ano_modelo,renavam,num_portas,combustivel,placa,valor_venda,valor_entrada,tarifa_cadastro,valor_financiar,coeficiente,num_parcelas,valor_parcelas,codigo_tabela,vencto_1_parcela,r,valor_liberado,pagto_serv_terc,obs,ref_pessoal2,tel_ref_pessoal2,operador,cel_operador,email_operador,estab_pertence,cidade_estab_pertence,tel_estab_pertence,email_estab_pertence,meses,trinta,quarenta_cinco,meses_residencia,ddd_tel,ddd_cel,ddd_tel_empresa,ddd_tel_contador,ddd_ref_pessoal,ddd_ref_pessoal2,ddd_ref_comercial,digito_agencia,digito_conta,ano_ref_conta,modelo,estado_emissao,ddd_tel_empresa_anterior,mista,chassi,incluir_avalista,data_proposta,titulo_proposta,digitacao,bco_operacao) 



values('$operador_atendente','$estabelecimento_proposta','$dataproposta','$horaproposta','$mes_ano','$status','$tipo','$tipo_proposta','$nome','$tipo_pessoa','$data_nasc','$cpf','$rg','$orgao','$emissao','$sexo','$estadocivil','$nacionalidade','$quant_dependente','$pai','$mae','$conjuge','$data_nasc_conjuge','$endereco','$numero','$bairro','$complemento','$cidade','$estado','$cep','$correspondencia','$tipo_residencia','$valor_aluguel','$tempo_residencia','$telefone','$celular','$tipo_telefone','$residencia_anterior','$bairro_anterior','$cidade_anterior','$estado_anterior','$tempo_residencia_anterior','$email','$empresa','$porte_empresa','$data_admissao','$inicio_atividade','$end_empresa','$numero_empresa','$complemento_empresa','$bairro_empresa','$cep_empresa','$cidade_empresa','$estado_empresa','$telefone_empresa','$cpt','$serie','$cargo','$natureza_operacao','$salario','$atividade_principal','$data_constituicao','$cnpj','$inscr_est','$tel_contador','$atividade_anterior','$data_admissao_anterior',

'$data_saida','$cargo_anterior','$telefone_empresa_anterior','$outras_rendas','$ref_pessoal','$tel_ref_pessoal','$ref_comercial','$tel_ref_comercial','$ref_banco','$ref_agencia','$ref_conta','$ref_tipo_conta','$ref_conta_desde','$cartao_credito','$automovel','$valor_automoveis','$residencia','$valor_residencia','$outras_propriedades','$valor_outras_propriedades','$bem','$veiculo','$ano_modelo','$renavam','$num_portas','$combustivel','$placa','$valor_venda','$valor_entrada','$tarifa_cadastro','$valor_financiar','$coeficiente','$num_parcelas','$valor_parcelas','$codigo_tabela','$vencto_1_parcela','$r','$valor_liberado','$pagto_serv_terc','$obs','$ref_pessoal2','$tel_ref_pessoal2','$operador','$cel_operador','$email_operador','$estab_pertence','$cidade_estab_pertence','$tel_estab_pertence','$email_estab_pertence','$meses','$trinta','$quarenta_cinco','$meses_residencia','$ddd_tel','$ddd_cel','$ddd_tel_empresa','$ddd_tel_contador','$ddd_ref_pessoal','$ddd_ref_pessoal2','$ddd_ref_comercial','$digito_agencia','$digito_conta','$ano_ref_conta','$modelo','$estado_emissao','$ddd_tel_empresa_anterior','$mista','$chassi', '$incluir_avalista','$data_proposta','$titulo_proposta','$digitacao','$bco_operacao')";




mysql_query($comando,$conexao) or die("Erro ao gravar proposta!");





echo "Proposta efetuada com sucesso!<br><br>";



?>





<?

$sql = "SELECT * FROM propostas_veiculos order by num_proposta desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$num_proposta = $linha[0];

$dataproposta = $linha[1];

$horaproposta = $linha[2];

$estabelecimento_proposta = $linha[4];

$operador_atendente = $linha[5];

$status = $linha[6];

$tipo = $linha[7];

$tipo_proposta = $linha[8];

$nome = $linha[9];

$cpf = $linha[12];

$operador = $linha[107];

$cel_operador = $linha[108];

$email_operador = $linha[109];

$estab_pertence = $linha[110];

$cidade_estab_pertence = $linha[111];

$tel_estab_pertence = $linha[112];

$email_estab_pertence = $linha[113];



?>



<? } ?>



<?

printf("O número da proposta é: $num_proposta");



?>



<?
if($incluir_avalista=="Não"){


$sql = "SELECT * FROM cad_empresa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$email_empresa = $linha[14];

$site = $linha[15];



}



$sql = "SELECT * FROM operadores where funcao = 'Adm Suporte' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$email_adm = $linha[20];



}



	

	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO

	$email_dest   =   $email_empresa;

	

	//PREPARA O PEDIDO

	$mens   =  "Olá! Proposta de veiculos efetuada com sucesso na $nfantasia!   \n";

	$mens  .=  "Visite-nos $site \n\n";

	

	$mens  .=  "Estabelecimento da proposta: ".$estabelecimento_proposta."                              \n";

	$mens  .=  "Operador Atendente: ".$operador_atendente."                                              \n\n";

	

	$mens  .=  "Nome: ".$nome."                                                       \n";

	$mens  .=  "CPF: ".$cpf."                                                    \n";

	$mens  .=  "Perfil do cliente: ".$tipo."                                                    \n";

	$mens  .=  "Tipo de proposta: ".$tipo_proposta."                                                    \n";

	$mens  .=  "Data da proposta: ".$dataproposta."                                                    \n";

	$mens  .=  "Hora da proposta: ".$horaproposta."                                                    \n";

	$mens  .=  "Número da Proposta: ".$num_proposta."                                                    \n";

	$mens  .=  "Status: ".$status."                                                    \n\n";

	

	$mens  .=  "Operador que efetuou a proposta: ".$operador."                                                    \n";

	$mens  .=  "Celular: ".$cel_operador."                                                    \n";

	$mens  .=  "E-Mail: ".$email_operador."                                                    \n";

	$mens  .=  "Estabelecimento: ".$estab_pertence."                                                    \n";

	$mens  .=  "Cidade: ".$cidade_estab_pertence."                                                    \n";

	$mens  .=  "Telefone: ".$tel_estab_pertence."                                                    \n";

	$mens  .=  "E-Mail: ".$email_estab_pertence."                                                    \n";



	

	//DISPARA O EMAIL

	$envia  =  mail($email_dest, "Proposta Nº ".$num_proposta." efetuada no sistema em ".$dataproposta, $mens,"From:".$email_dest."\r\nBcc:".$email);

	//$envia  =  mail($email_operador, "Proposta Nº ".$num_proposta.", ".$operador."! Aguarde ativação no sistema",$mens,"From:".$email_dest);

	$envia  =  mail($email_adm, "Proposta Nº ".$num_proposta.", ".$operador."! Efetue ativação no sistema",$mens,"From:".$email_dest);


}
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
<form action="efetuar_proposta_avalista.php" method="post" name="form1">
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
  if($incluir_avalista=="Sim"){echo"<input type='submit' name='Submit' value='Proposta Avalista'>"; } ?>
  <input name="num_proposta_proponente" type="hidden" id="num_proposta_proponente" value="<? echo $num_proposta; ?>">
  <strong><font color="#0000FF" size="2">
  <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estabelecimento_proposta; ?>">
  </font></strong>
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