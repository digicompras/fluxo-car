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
<title>Menu principal do Administrador</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

require '../conect/conect.php';

			
//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 
$sql = "SELECT * FROM fundo_navegacao";
//EXECUTA O COMANDO ACIMA
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
  
<? } ?>

<form name="form1" method="post" action="calcula_pedido.php">
<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;


$nome_operador = $linha[1];

?>



  <table width="100%" border="0" cellspacing="4">
    <tr> 
      <td colspan="2"><strong>Ol&aacute;! Seja bem vindo<br> </strong><strong><font color="#0000FF"><? echo $linha[1]; ?> 
            <input name="nome" type="hidden" id="razaosocial2" value="<? echo $linha[1]; ?>">
</font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td width="41%"><strong>Estabelecimento:</strong> <br><strong><font color="#0000FF"><? echo $linha[44]; ?>
            <input name="estabelecimento" type="hidden" id="nfantasia5" value="<? echo $linha[44]; ?>">
      </font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td width="14%"><strong>Celular:<font color="#0000FF"><br> <? echo $linha[19]; ?>
            <input name="celular" type="hidden" id="nfantasia32" value="<? echo $linha[19]; ?>">
      </font><font color="#0000FF">
      </font></strong></td>
      <td width="1%">&nbsp;</td>
    </tr>
    <tr>
      <td width="18%"><strong>Cidade: <br><font color="#0000FF"><? echo $linha[45]; ?>
            <input name="cidade_estabelecimento" type="hidden" id="nfantasia43" value="<? echo $linha[45]; ?>">
      </font><font color="#0000FF">      </font></strong></td>
      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
        <? echo $linha[46]; ?>
            <input name="tel_estabelecimento" type="hidden" id="nfantasia23" value="<? echo $linha[46]; ?>">
      </font></strong></td>
      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
            <? echo $linha[47]; ?>
            <input name="email_estabelecimento" type="hidden" id="nfantasia24" value="<? echo $linha[47]; ?>">
      </font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF">      </font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
<?
if($reg==3){
echo "</tr><tr>";
$reg=0;
}
?>

<? } ?>
  </table>
  
  <?
  	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	?>

</form>
<?



$num_proposta = $_POST['num_proposta'];

$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;
?>
<p align="center"><strong>BRASSCREDI! </strong></p>
<table width="100%"  border="0">
  <tr>
    <td colspan="3"><strong>A proposta de seu cliente  de N&ordm;</strong> <strong><font color="#0000FF"><? echo $linha[0]; ?></font></strong><font color="#000000"><strong>, efetuada em</strong> <strong><font color="#0000FF"><? echo $linha[40]; ?></font>, Tem seu status definido em </strong> <strong><font color="#0000FF"><? echo $linha[51]; ?></font></strong> <strong>!</strong></font></td>
  </tr>
  <tr>
    <td width="37%">&nbsp;</td>
    <td width="20%"><form action="propostas/imprimir_proposta.PHP" method="post" name="form3" target="_blank">
      <strong><font color="#0000FF">
      <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">
      </font></strong>
      <input type="submit" name="Submit4" value="Imprimir Proposta">
    </form></td>
    <td width="43%">&nbsp;</td>
  </tr>
</table>
<?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>
<? } ?>

<div align="center"></div>
<table width="100%"  border="0">
  <tr>
    <td><form name="form8" method="post" action="newsletter/menu.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit1222" value="Newslleter">
    </form></td>
    <td width="26%"><form name="form9" method="post" action="propostas/informe_operador_para_gerar_relatorio_mensal.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit2" value="Relat&oacute;rio de mensal por operador">
    </form></td>
    <td><form name="form9" method="post" action="propostas/informe_loja_para_gerar_relatorio_mensal.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit23" value="Relat&oacute;rio mensal por Loja">
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><form name="form2" method="post" action="borderos/borderos.php">
      N&ordm; do Border&ocirc; 
      <input name="num_bordero_receber" type="text" id="num_bordero_receber">
      <input type="submit" name="Submit" value="Buscar Border&ocirc;">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">
      <form name="form12" method="post" action="propostas/status_fisico.php">
       <div align="center"> <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  N&ordm; da Proposta
    <input name="num_proposta" type="text" id="num_proposta" size="4" maxlength="4">
  <input type="submit" name="Submit152" value="Alterar Status do F&Iacute;SICO">
     </div> </form>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><form action="propostas/lista_de_propostas_para_alterar_satatus.php" method="post" enctype="multipart/form-data" name="form1">
      <table width="100%"  border="0">
        <tr>
          <td width="24%"> CPF do cliente<br></td>
          <td width="35%"><input name="cpf" type="text" id="cpf"></td>
          <td width="41%"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <input type="submit" name="Submit17" value="Verificar Propostas "></td>
        </tr>
      </table>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center">
      </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center">
      </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div align="center">
        </div></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td width="21%">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="22%">&nbsp;</td>
    <td width="31%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>