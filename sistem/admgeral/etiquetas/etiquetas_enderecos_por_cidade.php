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
	margin-right: 0mm;
	margin-bottom: 8mm;
	margin-left: 0mm;
	margin-top: 8mm;
}
.style1 {font-size: 12px}
.style23 {color: #FFFFFF}
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


<body bgcolor="#<? printf("ffffff"); ?>" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>

background="background/<? printf("$linha[1]"); }?>" bgproperties="fixed">

<TABLE width="95%" border=0 align="center" cellPadding=5 cellSpacing=1>
    <?
	
$cidade = $_POST['cidade'];
	
$sql = "SELECT * FROM clientes where cidade = '$cidade' order by nome asc";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;
?>
          <td valign="middle"><span class="style23"> </span>  
    <div align="center"><span class="style1"><font color="#000000"><? //echo $linha[1]; ?><br>
	<? echo $linha[1]; ?></font><br>        
              <font color="#000000"><? echo $linha[11]; ?></font> <br>        
              <font color="#000000"><font color="#000000"><? echo $linha[12]; ?></font> <? echo $linha[13]; ?></font> <font color="#000000"><? echo $linha[14]; ?></font><br>
              <font color="#000000"><? echo $linha[15]; ?></font> <font color="#000000"> <font color="#000000"><? echo $linha[17]; ?></font></span><span class="style1"><br>
	          <span class="style23">.</span><br>
		    </span>  </div></td>




          <?
if($reg==3){
echo "</tr><tr></tr><tr>";
$reg=0;
}
?>
<? } ?>

</TABLE>


</div>
</body>
</html>
