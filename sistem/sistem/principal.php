<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.


else //se não for...
header("Location: alerta.php");

?>


<html>
<head>
<title>Servi&ccedil;os ao Cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

require '../conect/conect.php';
$data_hoje = $_SESSION['data_hoje'];
$dia = date('d');
$mes = date('m');
$ano = date('Y');


$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?> 
<body bgcolor="#<? printf("$linha[1]"); ?>"> 
<? } ?>

<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;


$nome_operador = $linha[1];
$senha_op = $linha[41];
$tipo_op = $linha[42];
$bloqueio_parcial = $linha[57];

?>





  <table width="100%" border="0" cellspacing="4">
    <tr> 
      <td><strong>Ol&aacute;! Seja bem vindo!<br> 
        </strong><strong><font color="#0000FF"><? echo $linha[1]; ?> 
            
</font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td><strong>E-mail:</strong><br>
      <strong><font color="#0000FF"><? echo $linha[20]; ?></font></strong>     </td>
      <td width="15%"><strong>Celular:<font color="#0000FF"><br>
            <? echo $linha[19]; ?>
      </font><font color="#0000FF">      </font></strong></td>
      <td width="23%" valign="top"><div align="center">        <strong><font color="#0000FF">Confira a data de hoje<br> 
        </font></strong>
        <strong><font color="#0000FF"><? echo $data_hoje; ?></font></strong>
           
        </p>
</div></td>
    </tr>
    <tr>
      <td width="32%"><strong>Estabelecimento:</strong> <br>
        <strong><font color="#0000FF"><? echo $linha[44]; ?>
        </font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td width="30%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
        <? echo $linha[46]; ?>
            </font></strong></td>
      <td><strong>Cidade: <br>
          <font color="#0000FF"><? echo $linha[45]; ?>          </font></strong></td>
      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
            <? echo $linha[47]; ?>
      </font></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF">      </font></strong></td>
      <td><form name="form1" method="post" action="ponto/marcarponto.php">
        <?
$hora = date('H');		

$sql = "SELECT * FROM ponto where nome = '$nome_operador' and data = '$data_hoje'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_ponto = $linha[0];
$ent_t = $linha[5];

}

?>
        <strong><font color="#0000FF">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="nome" type="hidden" id="nome" value="<? echo $nome_operador; ?>">
        <input name="codigo_ponto" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">
        <input name="data" type="hidden" id="data" value="<? echo date('d-m-Y'); ?>">
        <input type="submit" name="Submit9" value="marcar Ponto">
        </font></strong>
      </form>        <strong><font color="#0000FF"> </font></strong></td>
      <td colspan="2">&nbsp;</td>
    </tr>
<?
if($reg==3){
echo "</tr><tr>";
$reg=0;
}
?>

<? } ?>
</table>
  <div align="center"></div>
  <strong></strong>
<div align="center"></div>
<p align="center">&nbsp;</p>
</body>
</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>