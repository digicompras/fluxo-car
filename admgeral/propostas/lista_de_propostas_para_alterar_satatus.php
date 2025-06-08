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
<title>LISTANDO TODAS AS PROPOSTAS DO CLIENTE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
}
.style3 {font-size: 10px}
-->
</style>
</head>
<?

require '../../conect/conect.php';
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
        <input type="submit" name="Submit2" value="Voltar ao menu Principal">
</form>
      <table width="100%"  border="0">
        <tr>
          <td><div align="center"><span class="style2">
            <?
$cpf = $_POST['cpf'];
			
$sql = "SELECT * FROM propostas where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome = $linha[4];
$cidade_estabelecimento = $linha[36];



?>
          Listando todas as propostas do cliente:</span> <span class="style2"><? printf("$linha[4]"); ?><? } ?></span></div></td>
        </tr>
        <tr>
          <td><div align="center" class="style2">Cidade - <? echo $cidade_estabelecimento; ?></div></td>
        </tr>
      </table>
      <br><br>
<table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>            
      <?
$cpf = $_POST['cpf'];
			
$sql = "SELECT * FROM propostas where cpf = '$cpf' order by num_proposta desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>            
      <table width="100%"  border="0">
        <tr bgcolor="#<? echo $cor ?>">
          <td><div align="center"><span class="style3">N&ordm; da Proposta </span> </div>            <div align="center" class="style3"></div></td>
          <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>
          <td><div align="center"><span class="style3">Cr&eacute;dito Solicitado </span></div></td>
          <td width="7%"><div align="center" class="style3">
            <div align="center">Prazo</div>
          </div></td>
          <td width="11%"><div align="center" class="style3">
            <div align="center">Valor  parcelas </div>
          </div></td>
          <td><div align="center" class="style3">
            <div align="center">Status</div>
          </div></td>
        </tr>
		
        <tr>
          <td width="23%"><div align="center">               <form name="form2" method="post" action="status_proposta.php">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              
  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">
  <? // printf("<a href='editar_proposta.php?chamar=$linha[0]' >$linha[0]</a>"); ?>
                <? printf("$linha[0]"); ?>
                <input name="percentual" type="hidden" id="percentual" value="<? echo "10"; ?>">
                <input name="percentual_op" type="hidden" id="percentual_op" value="<? echo "0"; ?>">
                <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
                <input type="submit" name="Submit" value="Alterar Status">
          </form></div></td>
          <td width="27%"><div align="center"><span class="style3"><? echo $linha[86];?></span></div></td>
          <td width="12%"><div align="center" class="style3"><? printf("R$ $linha[25]</a> ");?>
</div></td>
          <td><div align="center" class="style3"><? printf("$linha[26]"); ?>
          </div></td>
          <td><div align="center" class="style3"><? printf("$linha[27]"); ?>
          </div></td>
          <td width="20%"><div align="center" class="style3"><? printf("$linha[51]"); ?>
          </div></td>
		  <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
<? } ?>
        
      </table>

          

<p>&nbsp;</p>
</body>
</html>
