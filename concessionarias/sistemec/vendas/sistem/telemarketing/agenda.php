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
<title>AGENDA DE TELEMARKETING</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style2 {	color: #0000FF;
	font-weight: bold;
}
.style3 {font-size: 10px}
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



      </td>
    </tr>
    <tr>
      <td width="32%"><form name="form1" method="post" action="menu.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit22" value="Voltar">
      </form></td>
      <td width="68%"><strong><font color="#0000FF" size="4">Verificando  agenda de Telemarketing </font></strong></td>
    </tr>
    <tr>
      <td><div align="center">
<?
if($nome=="TODOS"){
$sql = "select * from telemarketing where operador = '$operador' and status = 'Em Manutenção' order by nome asc";
$res = mysql_query($sql);
$total = mysql_num_rows($res);
echo "Total de registros encontrados ".$total;
}
else{
$sql = "select * from telemarketing where nome like '$nome%' and operador = '$operador' and status = 'Em Manutenção' order by nome asc";
$res = mysql_query($sql);
$total = mysql_num_rows($res);
echo "Total de registros encontrados ".$total;

}


?>	  
	  </div></td> 
      <td><form name="form4" method="post" action="agenda.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="nome" type="text" id="nome" value="TODOS" size="50">
        <input type="submit" name="Submit4" value="Buscar">
      </form></td>
    </tr>
</table>
  <table width="100%"  border="1">
    <tr>
      <td><div align="center" class="style2">N&ordm; Matricula </div></td>
      <td><div align="center" class="style2">Nome do Cliente </div></td>
      <td><div align="center" class="style2">Data</div></td>
      <td><div align="center" class="style2">Hora</div></td>
      <td><div align="center" class="style2">Telefone</div></td>
      <td><div align="center" class="style2">Celular</div></td>
    </tr>
    <?
if(empty($nome)) {
echo "Digite o nome do cliente ou parte dele na caixa acima e clique em buscar para executar sua pesquisa.";

}else{

if($nome=="TODOS"){
$sql = "select * from telemarketing where operador = '$operador' and cidade_estab_pertence = '$cidade_estab_pertence' and status = 'Em Manutenção' order by dia_ligar, mes_ligar, ano_ligar, hora_ligar asc";
}
else{
$sql = "select * from telemarketing where nome like '$nome%' and operador = '$operador' and cidade_estab_pertence = '$cidade_estab_pertence' and status = 'Em Manutenção' order by dia_ligar, mes_ligar, ano_ligar, hora_ligar asc";
}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];
$cod_cliente = $linha[10];
$cpf = $linha[11];
$nome = $linha[12];
$telefone = $linha[13];
$celular = $linha[14];
$dia_ligar = $linha[15];
$mes_ligar = $linha[16];
$ano_ligar = $linha[17];
$hora_ligar = $linha[18];


?>
    <tr>
      <td width="14%"><form action="editar_telemarketing.php" method="post" name="form1" class="style3">
          <div align="center">
            <input name="cpf" type="hidden" id="codigo2" value="<? echo $cpf; ?>">
            <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">            
            <input type="submit" name="Submit42" value="Abrir Telemarketing">
          </div>
      </form></td>
      <td width="29%"><div align="center" class="style3"><? echo $nome; ?></div></td>
      <td width="13%"><div align="center"><span class="style3"><? echo "$dia_ligar"."/"."$mes_ligar"."/"."$ano_ligar"; ?></span></div></td>
      <td width="7%"><div align="center"><span class="style3"><? echo $hora_ligar; ?></span></div></td>
      <td width="17%"><div align="center" class="style3"><? echo $telefone; ?></div></td>
      <td width="20%"><div align="center" class="style3"><? echo $celular; ?></div></td>
    </tr>
    <? }} ?>
  </table>
<p>&nbsp; </p>
</body>
</html>
