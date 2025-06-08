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

<title>SALVANDO INFORMA&Ccedil;&Otilde;ES DO CLIENTE</title>

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
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}
?>


		  

		  

		  <?



$codigo = $_POST['codigo'];

$cod_cliente = $_POST['cod_cliente'];

$cpf = $_POST['cpf'];

$dia_ligar = $_POST['dia_ligar'];

$mes_ligar = $_POST['mes_ligar'];

$ano_ligar = $_POST['ano_ligar'];

$data_ligar = "$ano_ligar-$mes_ligar-$dia_ligar";

$hora_ligar = $_POST['hora_ligar'];

$data_manutencao = $_POST['data_manutencao'];
$hora_manutencao = $_POST['hora_manutencao'];


$status = $_POST['status'];

$proposta = $_POST['proposta'];

$obs = $_POST['obs'];



$dia_liberado = date('d');

$mes_liberado = date('m');

$ano_liberado = date('Y');

$hora_liberado = $hora_atual;



$dia_fechamento = date('d');

$mes_fechamento = date('m');

$ano_fechamento = date('Y');

$hora_fechamento = $hora_atual;



//------------------------busca dados do cliente----------------------


$sql = "SELECT * FROM clientes where codigo = '$cod_cliente' limit 1";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {



$cod_cliente = $linha[0];

$nome = $linha[1];

$sexo = $linha[2];

$estadocivil = $linha[3];

$cpf = $linha[4];

$rg = $linha[5];

$orgao = $linha[6];

$emissao = $linha[7];

$data_nasc = $linha[8];

$pai = $linha[9];

$mae = $linha[10];

$endereco = $linha[11];

$numero = $linha[12];

$bairro = $linha[13];

$complemento = $linha[14];

$cidade = $linha[15];

$estado = $linha[16];

$cep = $linha[17];

$telefone = $linha[18];

$celular = $linha[19];

$email = $linha[20];

$obs = $linha[28];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$dataalteracao = $linha[31];

$horaalteracao = $linha[32];

$tipo = $linha[40];

$banco = $linha[41];

$agencia = $linha[42];

$conta = $linha[43];

$num_beneficio = $linha[44];



$parc1 = $linha[45];

$banco1 = $linha[46];

$vencto1 = $linha[47];

$compra1 = $linha[48];



$parc2 = $linha[49];

$banco2 = $linha[50];

$vencto2 = $linha[51];

$compra2 = $linha[52];



$parc3 = $linha[53];

$banco3 = $linha[54];

$vencto3 = $linha[55];

$compra3 = $linha[56];



$parc4 = $linha[57];

$banco4 = $linha[58];

$vencto4 = $linha[59];

$compra4 = $linha[60];



$parc5 = $linha[61];

$banco5 = $linha[62];

$vencto5 = $linha[63];

$compra5 = $linha[64];



$parc6 = $linha[65];

$banco6 = $linha[66];

$vencto6 = $linha[67];

$compra6 = $linha[68];



$parc7 = $linha[69];

$banco7 = $linha[70];

$vencto7 = $linha[71];

$compra7 = $linha[72];



$num_beneficio2 = $linha[73];

$num_beneficio3 = $linha[74];

$num_beneficio4 = $linha[75];



$dataprev2 = $linha[76];

$dataprev = $linha[76];



//$obs2 = $linha[77];



$tipo_benef_1 = $linha[78];

$tipo_benef_2 = $linha[79];

$tipo_benef_3 = $linha[80];

$tipo_benef_4 = $linha[81];



$mes_nasc = $linha[82];



$cpf_rg = $linha[83];

$comp_end = $linha[84];

$comp_quit1 = $linha[85];

$comp_quit2 = $linha[86];

$comp_quit3 = $linha[87];

$comp_quit4 = $linha[88];

$comp_quit5 = $linha[89];

$comp_quit6 = $linha[90];

$comp_renda = $linha[91];

$cpf_rg_testemunha = $linha[92];

$salario1 = $linha[93];

$salario2 = $linha[94];

$salario3 = $linha[95];

$salario4 = $linha[96];

$quant_vezes_trabalhado = $linha[118];

}



//------------------------fim da busca de dados do cliente------------------



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador = $linha[1];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];



}











$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



if($proposta=="Sim"){

$comando = "update `$linha[1]`.`telemarketing` set `codigo` = '$codigo',`dia_ligar` = '$dia_ligar',`mes_ligar` = '$mes_ligar',`ano_ligar` = '$ano_ligar',`hora_ligar` = '$hora_ligar',`status` = 'Liberado',`proposta` = '$proposta',`dia_liberado` = '$dia_liberado',`mes_liberado` = '$mes_liberado',`ano_liberado` = '$ano_liberado',`hora_liberado` = '$hora_liberado',`dia_fechamento` = '$dia_fechamento',`mes_fechamento` = '$mes_fechamento',`ano_fechamento` = '$ano_fechamento',`hora_fechamento` = '$hora_fechamento',`data_manutencao` = '$data_manutencao',`hora_manutencao` = '$hora_manutencao' where `telemarketing`. `codigo` = '$codigo' limit 1 ";



}

else{

$comando = "update `$linha[1]`.`telemarketing` set `codigo` = '$codigo',`dia_ligar` = '$dia_ligar',`mes_ligar` = '$mes_ligar',`ano_ligar` = '$ano_ligar',`data_ligar` = '$data_ligar',`hora_ligar` = '$hora_ligar',`status` = '$status',`dia_liberado` = '$dia_liberado',`mes_liberado` = '$mes_liberado',`ano_liberado` = '$ano_liberado',`hora_liberado` = '$hora_liberado',`proposta` = '$proposta',`dia_fechamento` = '$dia_fechamento',`mes_fechamento` = '$mes_fechamento',`ano_fechamento` = '$ano_fechamento',`hora_fechamento` = '$hora_fechamento',`data_manutencao` = '$data_manutencao',`hora_manutencao` = '$hora_manutencao' where `telemarketing`. `codigo` = '$codigo' limit 1 ";

}

}



mysql_query($comando,$conexao) or die("Erro ao alterar informações nesse nº de registro do Telemarketing");





echo "Alterações efetuadas com sucesso<br>";

?>

<?

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



if($status=="Liberado"){

$quant_vezes_trabalhado2 = bcadd($quant_vezes_trabalhado,1);

$comando = "update `$linha[1]`.`clientes` set `codigo` = '$cod_cliente',`telemarketing` = '$status',`quant_vezes_trabalhado` = '$quant_vezes_trabalhado2',`operador_manutencao` = '$operador',`cidade_estab_pertence_manutencao` = '$cidade_estab_pertence',`dia_liberado` = '$dia_liberado',`mes_liberado` = '$mes_liberado',`ano_liberado` = '$ano_liberado',`hora_liberado` = '$hora_liberado' where `clientes`. `codigo` = '$cod_cliente' limit 1 ";



mysql_query($comando,$conexao);



}

}





?>



<?

$dia = date('d');

$mes = date('m');

$ano = date('Y');

$hora = $hora_atual;





$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



if($obs<>""){

$comando = "insert into obs_telemarketing(cod_cliente,dia,mes,ano,hora,operador,estab_pertence,cidade_estab_pertence,obs) 

values('$cod_cliente','$dia','$mes','$ano','$hora','$operador','$estab_pertence','$cidade_estab_pertence','$obs')";



}

}



mysql_query($comando,$conexao);





?>



<?

if($proposta=="Sim"){



$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$quant_vezes_trabalhado2 = bcadd($quant_vezes_trabalhado,1);


$comando = "update `$linha[1]`.`clientes` set `codigo` = '$cod_cliente',`telemarketing` = 'Liberado',`quant_vezes_trabalhado` = '$quant_vezes_trabalhado2',`operador_manutencao` = '$operador',`cidade_estab_pertence_manutencao` = '$cidade_estab_pertence',`dia_liberado` = '$dia_liberado',`mes_liberado` = '$mes_liberado',`ano_liberado` = '$ano_liberado',`hora_liberado` = '$hora_liberado' where `clientes`. `codigo` = '$cod_cliente' limit 1 ";

}

mysql_query($comando,$conexao);

}

?>







<?





			

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?>

<form name="form1" method="post" action="">

</form>

<?

$sql = "SELECT * FROM clientes where codigo = '$cod_cliente' order by codigo desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



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

}

?>

<table width="100%" border="0">
  <tr>
    <td width="12%"><form name="form2" method="post" action="<? if($proposta=="Sim"){ echo "../clientes/verifica.php"; } else{ echo "menu.php"; }  ?>">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <? if($proposta=="Sim"){ echo "<input name='cpf' type='hidden' id='cpf' value='$cpf'>"; } ?>
      <input type="submit" name="Submit" value="<? if($proposta=="Sim"){ echo"Efetuar Proposta"; } else{ echo "Voltar"; } ?>">
    </form></td>
    <td width="39%"><form name="form1" method="post" action="../clientes/ver_possibilidade.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input name="telefone" type="hidden" id="telefone" value="<? echo $telefone; ?>">
      <input name="celular" type="hidden" id="celular" value="<? echo $celular; ?>">
      <input name="operador" type="hidden" id="operador" value="<? echo $operador; ?>">
      <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $cel_operador; ?>">
      <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_operador; ?>">
      <input name="num_beneficio" type="hidden" id="num_beneficio" value="<? echo $num_beneficio; ?>">
      <input name="num_beneficio2" type="hidden" id="num_beneficio2" value="<? echo $num_beneficio2; ?>">
      <input name="num_beneficio3" type="hidden" id="num_beneficio3" value="<? echo $num_beneficio3; ?>">
      <input name="num_beneficio4" type="hidden" id="num_beneficio4" value="<? echo $num_beneficio4; ?>">
      <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo $datacadastro; ?>">
      <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo $horacadastro; ?>">
      <input type="submit" name="Submit4" value="Ver Possibilidade">
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>

</html>

<?

mysql_close($conexao);

?>

