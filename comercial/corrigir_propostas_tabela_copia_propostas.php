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
<title>LISTANDO TODAS AS PROPOSTAS PAGAS DO OPERADOR</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style3 {font-size: 10px}
.style8 {font-size: 18px; font-weight: bold; }
-->
</style>
</head>
<?

require '../conect/conect.php';



$sql = "SELECT * FROM fundo_navegacao";
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





      <p>
        <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>
</p>
      <form name="form1" method="post" action="../principal.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit2" value="Voltar ao menu principal">
</form>
      <div align="center">
        <table width="100%"  border="1">
          <tr>
            <td width="50%"><div align="center"><strong>Numero da proposta </strong></div></td>
            <td width="50%"><div align="center"><strong>Alterado para </strong></div></td>
          </tr>
		  <?


$sql = "SELECT * FROM copia_propostas order by num_proposta asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$num_proposta = $linha[0];
$dataproposta = $linha[40];



$comando = "update `brass_loja`.`propostas` set `num_proposta` = '$num_proposta',`dataalteracao` = '$dataalteracao' where `propostas`. `num_proposta` = '$num_proposta'";

mysql_query($comando,$conexao) or die("Erro ao alterar informações desse cadastro");



?>
          <tr>
            <td><div align="left" class="style3">
              <div align="center"><strong>
                
              <? echo $num_proposta;?></strong></div>
            </div></td>
            <td><div align="center" class="style3"><strong><? echo $dataalteracao; ?>
            </strong></div></td>

          </tr>
<? } ?>            
        </table>
<br>
</div>
      <p>&nbsp;</p>



</body>
</html>
