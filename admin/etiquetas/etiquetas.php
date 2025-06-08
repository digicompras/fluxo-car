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
<title>Emiss&atilde;o de etiquetas para mala-direta - ALLCRED FINANCEIRA</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-top: 15px;
	margin-right: 10px;
	margin-bottom: 15px;
	margin-left: 50px;
}
-->
</style></head>


			<?
			
require '../../conect/conect.php';
			
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

background="background/<? printf("$linha[1]"); }?>" bgproperties="fixed">
<form name="form1" method="post" action="informe_tipo_para_gerar_etiquetas.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit" value="Voltar">
</form>
<br>
<br>
<TABLE width="100%" border=0 align="center" cellPadding=0 cellSpacing=0>
    <?
	
$tipo = $_POST['tipo'];
	
$sql = "SELECT * FROM clientes where tipo = '$tipo' order by nome asc";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;
?>
<td>
    <font color="#000000">Nome: </font><font color="#000000"><strong><? echo $linha[1]; ?></strong></font><br>
        <font color="#000000">End: <? echo $linha[11]; ?></font> N&ordm; <font color="#000000"><? echo $linha[12]; ?></font><br>	  
        <font color="#000000">Bairro: <? echo $linha[13]; ?></font> Complemento: <font color="#000000"><? echo $linha[14]; ?></font><br>
		Cidade: <font color="#000000"><? echo $linha[15]; ?></font> - <font color="#000000"><? echo $linha[16]; ?><br>
    <font color="#000000">CEP: <? echo $linha[17]; ?></font><br><br>
</td>

          <?
if($reg==2){
echo "</tr><tr>";
$reg=0;
}
?>
<? } ?>

</TABLE>


</div>
</body>
</html>
