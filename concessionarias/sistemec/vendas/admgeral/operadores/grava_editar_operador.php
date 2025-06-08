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

$estab_pertence = $_POST['estab_pertence'];



		  

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$cidade_estab_pertence = $linha[10];

$email_estab_pertence = $linha[14];

$tel_estab_pertence = $linha[12];

}

		  

$regiao = $_POST['regiao'];

$codigo = $_POST['codigo'];

$nome_antigo = $_POST['nome_antigo'];

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

$senha = $_POST['senha'];

$tipo_op = $_POST['tipo_op'];

$funcao = $_POST['funcao'];

$estab_pertence = $_POST['estab_pertence'];



$salario = $_POST['salario'];

$vale_alimentacao = $_POST['vale_alimentacao'];

$gratificacao = $_POST['gratificacao'];

$comissao = $_POST['comissao'];

$emprestimo = $_POST['emprestimo'];

$admissao = $_POST['admissao'];

$demissao = $_POST['demissao'];

$meta = $_POST['meta'];

$status = $_POST['status'];

$bloqueio_parcial = $_POST['bloqueio_parcial'];

$tempo_almoco = $_POST['tempo_almoco'];

$bloqueio_compra = $_POST['bloqueio_compra'];

$horas_diarias = $_POST['horas_diarias'];



$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`operadores` set `codigo` = '$codigo',`nome` = '$nome',`sexo` = '$sexo',`estadocivil` = '$estadocivil',`cpf` = '$cpf',`rg` = '$rg',`orgao` = '$orgao',`emissao` = '$emissao',`data_nasc` = '$data_nasc',`pai` = '$pai',`mae` = '$mae',`endereco` = '$endereco',`numero` = '$numero',`bairro` = '$bairro',`complemento` = '$complemento',`cidade` = '$cidade',`estado` = '$estado',`cep` = '$cep',`telefone` = '$telefone',`celular` = '$celular',`tipo_op`= '$tipo_op',

`email` = '$email',`obs` = '$obs',`dataalteracao` = '$dataalteracao',`horaalteracao` = '$horaalteracao',`operador_alterou` = '$operador_alterou',`cel_operador_alterou` = '$cel_operador_alterou',`email_operador_alterou` = '$email_operador_alterou',`estabelecimento_alterou` = '$estabelecimento_alterou',`cidade_estabelecimento_alterou` = '$cidade_estabelecimento_alterou',`tel_estabelecimento_alterou` = '$tel_estabelecimento_alterou',`email_estabelecimento_alterou` = '$email_estabelecimento_alterou',`usuario` = '$usuario',`senha` = '$senha',`funcao` = '$funcao',`estab_pertence` = '$estab_pertence',`cidade_estab_pertence` = '$cidade_estab_pertence',`tel_estab_pertence` = '$tel_estab_pertence',`email_estab_pertence` = '$email_estab_pertence',`salario` = '$salario',`vale_alimentacao` = '$vale_alimentacao',`gratificacao` = '$gratificacao',`comissao` = '$comissao',`emprestimo` = '$emprestimo',`admissao` = '$admissao',`demissao` = '$demissao',`meta` = '$meta',`status` = '$status',`bloqueio_parcial` = '$bloqueio_parcial',`tempo_almoco` = '$tempo_almoco',`bloqueio_compra` = '$bloqueio_compra',`horas_diarias` = '$horas_diarias',`regiao` = '$regiao' where `operadores`. `codigo` = '$codigo' limit 1 ";

}
mysql_query($comando,$conexao) or die("Erro ao alterar informações desse operador");





echo "Dados do operador alterados no banco de dados com sucesso<br>";

?>







  <?

			





$sql = "SELECT * FROM propostas where nome_operador = '$nome_antigo' order by num_proposta asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);





$num_proposta = $linha[0];







?>

<?

$sql2 = "select * from db";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {





$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`nome_operador` = '$nome' where `propostas`. `num_proposta` = '$num_proposta'";

}



mysql_query($comando,$conexao);



}



?>





  <?

			





$sql = "SELECT * FROM ponto where nome = '$nome_antigo' order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);





$codigo_ponto = $linha[0];







?>

<?

$sql2 = "select * from db";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {





$comando = "update `$linha[1]`.`ponto` set `codigo` = '$codigo_ponto',`nome` = '$nome' where `ponto`. `codigo` = '$codigo_ponto'";

}



mysql_query($comando,$conexao);



}



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

$cidade_estab_pertence = $linha[45];


?>



<? } ?>



<?

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
	
	$email_dest   =   $email_empresa;

	

	//PREPARA O PEDIDO

	$mens   =  "Olá! seus dados foram atualizados na $nfantasia_empresa!   \n";

	$mens  .=  "Visite-nos $site_empresa \n";

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
//Aqui libera o telemarketing na tabela clientes

if($status=="Inativo"){

$dia_liberado = date('d');

$mes_liberado = date('m');

$ano_liberado = date('Y');

$hora_liberado = date('H:i:s');




$sql = "SELECT * FROM clientes where operador_manutencao = '$nome' and telemarketing = 'Em manutenção' order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);





$codigo = $linha[0];

$telemarketing = $linha[100];

$operador_manutencao = $linha[101];




$sql2 = "select * from db";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {

$comando = "update `$linha[1]`.`clientes` set `codigo` = '$codigo',`telemarketing` = 'Liberado',`operador_manutencao` = '$operador_manutencao',`cidade_estab_pertence_manutencao` = '$cidade_estab_pertence',`dia_liberado` = '$dia_liberado',`mes_liberado` = '$mes_liberado',`ano_liberado` = '$ano_liberado',`hora_liberado` = '$hora_liberado' where `clientes`. `codigo` = '$codigo'";

mysql_query($comando,$conexao);
}


//Aqui libera o telemarketing na tabela telemarketing

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$comando = "update `$linha[1]`.`telemarketing` set `cod_cliente` = '$codigo',`status` = 'Liberado',`dia_liberado` = '$dia_liberado',`mes_liberado` = '$mes_liberado',`ano_liberado` = '$ano_liberado',`hora_liberado` = '$hora_liberado' where `telemarketing`. `cod_cliente` = '$codigo'";

mysql_query($comando,$conexao);
}


}
}
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

