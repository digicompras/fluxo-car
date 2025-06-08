<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {font-size: 18px}
.style3 {color: #FFFF00}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style4 {font-size: 24px}
-->
</style>
</head>
<?

require 'conect/conect.php';


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
<p align="center" class="style1 style4"><strong>ATEN&Ccedil;&Atilde;O!!</strong></p>
<p align="center" class="style1 style2"><strong>SEU USU&Aacute;RIO E SENHA N&Atilde;O PERMITE ACESSAR </strong></p>
<p align="center" class="style2 style1"><strong>ESSA SESS&Atilde;O!</strong></p>
<form name="form1" method="post" action="../index.php">
  <div align="center">
    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
    <input type="submit" name="Submit" value="Voltar ao menu principal">
  </div>
</form>
<p align="center" class="style3"><strong></strong></p>


</body>
</html>
