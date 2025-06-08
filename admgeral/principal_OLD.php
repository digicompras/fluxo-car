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

<form name="form1" method="post" action="">
<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
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
<div align="center"></div>
<table width="100%"  border="0">
  <tr>
    <td><form action="estados_do_brasil/menu.php" method="post" name="form6">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit62" value="Estados do Brasil ">
    </form></td>
    <td width="21%"><form action="estabelecimentos/menu.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit6" value="Concession&aacute;rias">
    </form></td>
    <td><form name="form8" method="post" action="newsletter/menu.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit1222" value="Newslleter">
    </form></td>
    <td><form action="operadores/menu.php" method="post" name="form20">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit20" value="Operadores(Funcion&aacute;rios)">
    </form></td>
  </tr>
  <tr>
    <td><form action="status/menu.php" method="post" name="form17">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit172" value="Status">
    </form></td>
    <td><form name="form6" method="post" action="veiculos/menu.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit8222" value="Ve&iacute;culos">
    </form></td>
    <td><form action="etiquetas/informe_tipo_para_gerar_etiquetas.php" method="post" name="form4">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit7" value="Emitir etiquetas para mala-direta">
    </form></td>
    <td><form name="form8" method="post" action="ponto/menu.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit12" value="Cart&atilde;o de Ponto">
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form action="clientes/menu.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit5" value="Clientes">
    </form></td>
    <td>&nbsp;</td>
    <td><form name="form16" method="post" action="hora_de_encerramento_do_sistema/hora_encerramento.php">
      <div align="center">
        <input type="submit" name="Submit3" value="Hor&aacute;rios do sistema">
      </div>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form action="" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit" value="Ocorr&ecirc;ncias">
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
              <input type="submit" name="Submit17" value="Verifica&ccedil;&atilde;o total"></td>
        </tr>
      </table>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form name="form9" method="post" action="propostas/informe_loja_para_gerar_relatorio_mensal.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit23" value="Relat&oacute;rio mensal por Loja">
    </form></td>
    <td colspan="2">
      <form name="form9" method="post" action="propostas/relatorio_geral_de_producao_mensal_todos.php"><div align="center">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        Informe m&ecirc;s e o ano (mm-aaaa)
        <input name="mes_ano" type="text" id="mes_ano" size="7" maxlength="7">
        <input type="submit" name="Submit232" value="Relat&oacute;rio mensal Geral">
      </div></form>
      </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Website</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form action="aempresa/menu.php" method="post" name="form1">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit9" value="A Empresa ">
    </form></td>
    <td><form action="background_topo/menu.php" method="post" name="form14">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input type="submit" name="Submit142" value="Background Cabe&ccedil;alho">
    </form></td>
    <td><form action="cores/menu.php" method="post" name="form5">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit53" value="Cores do website">
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form action="comentarios/menu.php" method="post" name="form3">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit322" value="Coment&aacute;rios">
    </form></td>
    <td><form action="background_navegacao/menu.php" method="post" name="form14">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input type="submit" name="Submit14" value="Background Navega&ccedil;&atilde;o">
    </form></td>
    <td><form action="pagina_inicial/menu.php" method="post" name="form10">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit10" value="P&aacute;gina inicial do site ">
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><form action="ultimos_visitantes/ultimos_visitantes.php" method="post" name="form17">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input type="submit" name="Submit1722" value="&Uacute;ltimos visitantes">
    </form></td>
    <td><form action="logo/menu.php" method="post" name="form7">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit72" value="Logotipo">
    </form></td>
    <td><form name="form6" method="post" action="faixa_de_texto/menu.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit83" value="Texto de rolagem">
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form action="publicidade/menu.php" method="post" name="form19">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit19" value="Publicidade">
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="22%">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="31%">&nbsp;</td>
    <td width="26%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>