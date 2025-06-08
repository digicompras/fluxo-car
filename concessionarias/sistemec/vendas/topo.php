<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
<base target="meio">
</head>

<?

require 'conect/conect.php';
$sql = "SELECT * FROM fundo_topo";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>" 
  
<? } ?>
<?
$sql = "SELECT * FROM background_topo";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>

background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">
  
<? } ?>
<?


//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 
$sql = "SELECT * FROM logo";
//EXECUTA O COMANDO ACIMA
$res = mysql_query($sql);

$reg = 0;
//VERIFICA SE O COMANDO FOI EXECUTADO COM SUCESSO...
//if($res) {
//EXIBE PARA O USUARIO
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

printf("<a href='index.htm' target='_top'><img src='imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'></a>"); ?>
<?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
<? } ?>
<?
//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 
$sql = "SELECT * FROM b_sup";
//EXECUTA O COMANDO ACIMA
$res = mysql_query($sql);

$reg = 0;
//VERIFICA SE O COMANDO FOI EXECUTADO COM SUCESSO...
//if($res) {
//EXIBE PARA O USUARIO
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;
?>
<table width="100%" bgcolor="#<? printf("$linha[1]"); ?>"  border="0">
<tr valign="top">
              <td width="39%" height="23">&nbsp;</td>
              <td width="7%"><form action="index.htm" method="post" name="form3" target="_top">
                <input type="submit" name="Submit22" value="In&iacute;cio">
              </form></td>
              <td width="9%" height="23">
                <form action="franquia.php" method="post" name="form3" target="navegacao">
                  <input type="submit" name="Submit2" value="Franquia">
              </form>              </td>
              <td width="10%" height="23">
                <form action="aempresa.php" method="post" name="form4" target="navegacao">
                  <input type="submit" name="Submit3" value="A Empresa">
              </form>              </td>
              <td width="14%" height="23">
                <form action="contato.PHP" method="post" name="form5" target="navegacao">
                  <input type="submit" name="Submit4" value="Fale Conosco">
              </form>                 </td>
    <td width="10%" height="23">&nbsp;    </td>
              <td width="4%" height="23"></td>
              <td width="7%" height="23">&nbsp;</td>
</tr>
</table>
                <?	         
if($reg==1){
echo "</tr>";
$reg=0;
}
?>

          <? } ?>

<p>&nbsp;</p>
</body>
</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>