<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

?>



<?

require '../conect/conect.php';


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

printf("<a href='index.php' target='_top'><img src='../imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'></a>"); ?>


          <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>

          <? } ?>


<?  
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
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
$dataalteracao_u = $linha[31];
$horaalteracao_u = $linha[32];
$operador_alterou_u = $linha[33];
$cel_operador_alterou_u = $linha[34];
$email_operador_alterou_u = $linha[35];
$estabelecimento_alterou_u = $linha[36];
$cidade_estabelecimento_alterou_u = $linha[37];
$tel_estabelecimento_alterou_u = $linha[38];
$email_estabelecimento_alterou_u = $linha[39];
$usuario_op = $linha[40];
$senha_op = $linha[41];
$tipo_op = $linha[42];
$funcao = $linha[43];
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];
$tel_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];
}
?>

		  
<html>
<head>
<title>Alerta de usu&aacute;rio n&atilde;o permitido!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {font-size: 18px}
.style3 {color: #FFFF00}
-->
</style>
</head>
<?



//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 
$sql = "SELECT * FROM fundo_navegacao";
//EXECUTA O COMANDO ACIMA
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>

background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">
  
<? } ?>
<p align="center" class="style1">&nbsp;</p>
<p align="center" class="style2 style1"><strong>ATEN&Ccedil;&Atilde;O!!</strong></p>
<p align="center" class="style2 style1"><? echo $nome; ?></p>
<p align="center" class="style2 style1"><strong>VOC&Ecirc; N&Atilde;O &Eacute; UM USU&Aacute;RIO DEVIDAMENTE AUTORIZADO!</strong></p>
<p align="center" class="style2 style1"><strong>  PARA ACESSAR A &Aacute;REA QUE EST&Aacute; TENTANDO!</strong></p>
<p align="center" class="style2 style1"><strong>ENTRE EM CONTATO COM O ADMINISTRADOR DO SISTEMA</strong></p>
<p align="center" class="style1 style2"><strong>S&Oacute; ELE PARA DAR A PERMISS&Atilde;O! </strong></p>
<p align="center" class="style3 style1 style2">&nbsp;</p>
<form name="form1" method="post" action="index.php">
  <div align="center">
    <input type="submit" name="Submit" value="Voltar">
  </div>
</form>
<p align="center" class="style3"><strong></strong></p>


</body>
</html>
