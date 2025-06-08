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

<title>MENU PRINCIPAL DE TELEMARKETING</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style1 {

	color: #008000;

	font-size: 10px;

}



.style2 {	color: #0000FF;

	font-weight: bold;

}

.style3 {

	color: #ff0000;

	font-size: 10px;

}



-->

</style>

</head>



<?



require '../../conect/conect.php';



$nome = $_POST['nome'];



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador = $linha[1];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];



}





			

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#ffffff"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?><br>

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="2"><?

error_reporting(E_ALL);



?>
<?
$sql = "SELECT * FROM limite_diario_telemarketing limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$limite = $linha[0];

}

?>




      </td>

    </tr>

    <tr>

      <td width="25%"><form name="form1" method="post" action="../index.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit22" value="Voltar ao menu principal">

      </form></td>

      <td width="75%"><strong><font color="#0000FF" size="4">Fa&ccedil;a a busca com o nome ou parte dele para abrir o chamado de Telemarketing na cidade de <? echo $cidade_estab_pertence;  ?></font></strong></td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><form name="form2" method="post" action="agenda.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit" value="Verificar Agenda">

      </form></td>

    </tr>

    <tr>

      <td><div align="center">

        <?

if($nome=="TODOS"){

$sql = "select * from clientes order by nome asc limit $limite";

$res = mysql_query($sql);

$total = mysql_num_rows($res);

echo "Total de registros encontrados ".$total;

}

else{

$sql = "select * from clientes where nome like '$nome%' order by nome asc limit $limite";

$res = mysql_query($sql);

$total = mysql_num_rows($res);

echo "Total de registros encontrados ".$total;



}





?>

</div></td> 

      <td><form name="form4" method="post" action="menu.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input name="nome" type="text" id="nome" value="TODOS" size="50">

        <input type="submit" name="Submit4" value="Buscar">

      </form></td>

    </tr>

</table>

<?

if(empty($nome)) {

echo "Digite o nome do cliente ou parte dele na caixa acima e clique em buscar para executar sua pesquisa.";


}

?>

  <table width="100%"  border="1">

    <tr>

      <td valign="middle"><div align="center" class="style2">Status</div></td>

      <td><div align="center" class="style2">Nome do Cliente </div></td>

      <td><div align="center" class="style2">Operador</div></td>

      <td><div align="center" class="style2">Cidade</div></td>

      <td><div align="center" class="style2">Data e hora da libera&ccedil;&atilde;o </div></td>

    </tr>

    <?



if($nome=="TODOS"){

$sql = "select * from clientes where cidade = '$cidade_estab_pertence' and data_manutencao = '0000-00-00' and quant_vezes_trabalhado <> '1' order by nome asc limit $limite";

}

else{

if(empty($nome)){

$sql = "select * from clientes where nome = '.' and cidade = '$cidade_estab_pertence' and data_manutencao = '0000-00-00' and quant_vezes_trabalhado <> '1' order by nome asc limit $limite";



}

else{

$sql = "select * from clientes where nome like '$nome%' and cidade = '$cidade_estab_pertence' and data_manutencao = '0000-00-00' and quant_vezes_trabalhado <> '1' order by nome asc limit $limite";

}}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$codigo = $linha[0];

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

$operador = $linha[21];

$cel_operador = $linha[22];

$email_operador = $linha[23];

$estabelecimento = $linha[24];

$cidade_estabelecimento = $linha[25];

$tel_estabelecimento = $linha[26];

$email_estabelecimento = $linha[27];

$obs = $linha[28];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$dataalteracao = $linha[31];

$horaalteracao = $linha[32];

$operador_alterou = $linha[33];

$cel_operador_alterou = $linha[34];

$email_operador_alterou = $linha[35];

$estabelecimento_alterou = $linha[36];

$cidade_estabelecimento_alterou = $linha[37];

$tel_estabelecimento_alterou = $linha[38];

$email_estabelecimento_alterou = $linha[39];

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

$obs2 = $linha[77];



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

$telemarketing = $linha[100];

$operador_manutencao = $linha[101];

$cidade_estab_pertence_manutencao = $linha[102];

$dia_liberado = $linha[103];

$mes_liberado = $linha[104];

$ano_liberado = $linha[105];

$hora_liberado = $linha[106];





?>

    <tr>

      <td width="19%" ><form name="form1" method="post" action="abrir_telemarketing.php" >

        

            <div align="center">

            <input name="cpf" type="hidden" id="codigo2" value="<? echo $cpf;  ?>">

            <? if($telemarketing<>"Em Manutenção"){ echo "<input type='submit' name='Submit42' value='Abrir Telemarketing'>"; } else{ echo "<span class='style3'>EM Manutenção</span>"; } ?>

            </div>

      </form></td>

      <td width="24%" valign="top"><div align="center"><span class="<? if($telemarketing=="Em Manutenção"){echo"style3"; } else{ echo "style1"; } ?>"><? echo $nome; ?></span></div></td>

      <td width="22%" valign="top"><div align="center"><span class="<? if($telemarketing=="Em Manutenção"){echo"style3"; } else{ echo "style1"; } ?>"><? echo $operador_manutencao; ?></span></div></td>

      <td width="18%" valign="top"><div align="center"><span class="<? if($telemarketing=="Em Manutenção"){echo"style3"; } else{ echo "style1"; } ?>"><?  echo $cidade_estab_pertence_manutencao; ?></span></div></td>

      <td width="17%" valign="top"><div align="center"><span class="<? if($telemarketing=="Em Manuten&ccedil;&atilde;o"){echo"style3"; } else{ echo "style1"; } ?>">

        <?  if($dia_liberado<>""){  echo "$dia_liberado"."/"."$mes_liberado"."/"."$ano_liberado"." - "."$hora_liberado"; } ?>

      </span></div></td>

    </tr>

    <? } ?>

</table>

<p>&nbsp; </p>

</body>

</html>

