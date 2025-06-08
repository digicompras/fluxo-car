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


<body bgcolor="#<? printf("$linha[1]"); ?>"

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
$estab_pertence = $linha[44];

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
while($linha=mysql_fetch_row($res)) {
?>
<p align="center"><strong><font color="#0000FF"><? echo $estab_pertence; ?></font> <font color="#0000FF"> <? echo " informa!"; ?></font>! </strong></p>
<table width="100%"  border="0">
  <tr>
    <td colspan="3"><strong>A proposta de seu cliente <font color="#0000FF"><? echo $linha[4]; ?></font> de N&ordm;</strong> <strong><font color="#0000FF"><? echo $linha[0]; ?></font></strong><font color="#000000"><strong>, efetuada em</strong> <strong><font color="#0000FF"><? echo $linha[40]; ?></font>, Tem seu status definido em </strong> <strong><font color="#0000FF"><? echo $linha[51]; ?></font></strong> <strong>!</strong></font></td>
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
<? } ?>

<div align="center"></div>
<table width="100%"  border="0">
  <tr>
    <td width="26%"><form action="clientes/menu.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit5" value="Clientes">
    </form></td>
    <td width="7%">&nbsp;</td>
    <td width="21%"><form name="form5" method="post" action="borderos/borderos.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
      <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
      <input type="submit" name="Submit" value="Border&ocirc;s">
    </form></td>
    <td width="21%"><form name="form8" method="post" action="ponto/selecione_funcionario_para_gerar_cartao_ponto.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit12" value="Cart&atilde;o de Ponto">
    </form></td>
    <td width="25%"><form action="etiquetas/informe_tipo_para_gerar_etiquetas.php" method="post" name="form4">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit7" value="Emitir etiquetas para mala-direta">
    </form></td>
  </tr>
  <tr>
    <td><form name="form9" method="post" action="propostas/informe_operador_para_gerar_relatorio_mensal.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit2" value="Relat&oacute;rio mensal por operador">
    </form></td>
    <td>&nbsp;</td>
    <td colspan="3"><form action="propostas/lista_de_propostas_para_alterar_satatus.php" method="post" enctype="multipart/form-data" name="form1">
      <table width="100%"  border="0">
        <tr>
          <td width="41%"><div align="right">Informe o CPF do cliente<br>
          </div></td>
          <td width="21%"><input name="cpf" type="text" id="cpf"></td>
          <td width="38%"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <input type="submit" name="Submit17" value="Verificar Propostas "></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td><form name="form9" method="post" action="propostas/informe_loja_para_gerar_relatorio_mensal.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit23" value="Relat&oacute;rio mensal da loja">
    </form></td>
    <td>&nbsp;</td>
    <td colspan="3"><form name="form7" method="post" action="principal.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>Informe o N&ordm; da proposta a ser pesquisada
      <input name="num_proposta" type="text" id="num_proposta" size="10" maxlength="10">
      <input type="submit" name="Submit3" value="Pesquisar Proposta">
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>