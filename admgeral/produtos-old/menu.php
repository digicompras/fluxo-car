<?php
session_start(); //inicia sess�o...
if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...
echo ""; //se for emite mensagem positiva.
else //se n�o for...
header("Location: alerta.php");

?>
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td colspan="2">        <?
require '../../conect/conect.php';


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];



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

printf("<a href='http://www.digicompras.com.br' target='_blank'><img src='http://www.digicompras.com.br/imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'></a>"); ?>


          <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>

          <? } ?>
</td>
    </tr>
    <tr>
      <td width="25%">&nbsp;</td>
      <td width="75%"><strong><font color="#0000FF" size="4">O que deseja fazer com os produtos?</font></strong></td>
    </tr>
    <tr>
      <td><form name="form1" method="post" action="../principal.php">
        <? $usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
 ?>
        <input type="submit" name="Submit" value="Voltar ao menu principal">
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form2" method="post" action="inserir.php">
        <input type="submit" name="Submit2" value="Inserir produto ">
        <? $usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
 ?>
      </form></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form3" method="post" action="selecione_codigo_para_edicao.php">
        <input type="submit" name="Submit3" value="Editar produto ">
        <? $usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
 ?>
      </form></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form4" method="post" action="selecione_codigo_para_exclusao.php">
        <input type="submit" name="Submit4" value="Excluir produto ">
        <? $usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
 ?>
      </form></td>
    </tr>
  </table>
<p>&nbsp; </p>
</body>
</html>
