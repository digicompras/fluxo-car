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

<title>Edi&ccedil;&atilde;o de produtos</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style1 {

	color: #FF0000;

	font-weight: bold;

	font-size: 24px;

}
.style2 {font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
.style2 {	color: #0000FF;
	font-weight: bold;
}

-->

</style></head>



<?



require '../../conect/conect.php';



			

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



</p>

<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit2" value="Voltar">

</form>

<p class="style1">Aten&ccedil;&atilde;o! Voc&ecirc; tem certeza que deseja excluir um cadastro de cliente? </p>

<form action="informe_cpf_para_exclusao.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%"  border="0">

    <tr>

      <td width="35%">Informe o CPF do cliente a ser excluido <br></td>

      <td width="10%"><input name="cpf" type="text" id="cpf"></td>

      <td width="55%"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit" value="Buscar"></td></tr>

  </table>

</form>
<?
			
$sql = "select * from clientes where cpf = '$cpf'";

$resultado=mysql_query($sql);

$registros_total = mysql_num_rows($resultado);



echo "Foram encontrados ".$registros_total." registros faltando o CPF";

?>

<table width="100%"  border="1">
  <tr>
    <td><div align="center" class="style2">Nome</div></td>
    <td><div align="center"><span class="style2">N&ordm; Matr&iacute;cula</span></div></td>
    <td><div align="center" class="style2">N&ordm; Beneficio</div></td>
    <td><div align="center" class="style2">CPF</div></td>
    <td><div align="center" class="style2">Telefone</div></td>
    <td><div align="center" class="style2">Cidade</div></td>
    <td><div align="center" class="style2">Estado</div></td>
    <td><div align="center"></div></td>
    <td><div align="center" class="style2"></div></td>
  </tr>
  <?
$cpf = $_POST['cpf'];
  
$sql = "SELECT * FROM clientes where cpf = '$cpf'";

$res = mysql_query($sql);

$reg = 0;


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





$dataprev = $linha[76];

$cpf_rg = $linha[78];

$comp_end = $linha[79];

$comp_quit1 = $linha[80];

$comp_quit2 = $linha[81];

$comp_quit3 = $linha[82];

$comp_quit4 = $linha[83];

$comp_quit5 = $linha[84];

$comp_quit6 = $linha[85];

$comp_renda = $linha[86];

$cpf_rg_testemunha = $linha[87];

$mes_niver = $linha[88];

$status_cliente = $linha[89];

$tem_margem = $linha[90];
$saldo1 = $linha[91];
$saldo2 = $linha[92];
$saldo3 = $linha[93];
$saldo4 = $linha[94];
$saldo5 = $linha[95];
$saldo6 = $linha[96];
$saldo7 = $linha[97];




?>
  <tr>
    <td width="21%"><div align="center"><? echo $nome; ?></div></td>
    <td width="9%"><div align="center"><? echo $codigo; ?></div></td>
    <td width="9%"><div align="center"><? echo $num_beneficio; ?></div></td>
    <td width="10%"><div align="center"><? echo $cpf; ?></div></td>
    <td width="10%"><div align="center"><? echo $telefone; ?></div></td>
    <td width="13%"><div align="center"><? echo $cidade; ?></div></td>
    <td width="9%"><div align="center"><? echo $estado; ?></div></td>
    <td width="6%"><div align="center">
      <form action="visualizar_cadastro.php" method="post" name="form1" target="_blank">
        <div align="center"> <span class="style2">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
            <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
            <input type="submit" name="Submit3" value="Visualizar">
        </div>
      </form>
    </div></td>
    <td width="13%"><div align="center">
      <form name="form1" method="post" action="motivo_exclusao.php">
        <div align="center"> <span class="style2">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
              <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo; ?>">
              <input type="submit" name="Submit4" value="Excluir Cadastro">
        </div>
      </form>
    </div></td>
  </tr>
  <? } ?>
</table>
<p>&nbsp;</p>

</body>

</html>

