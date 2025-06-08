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

setlocale(LC_TIME, 'pt_BR');

$data_completa = strftime("%A, %d de %B de %Y<br><br>");

$hoje = strftime("%A");

$dia = date('d');
$mes = date('m');
$ano = date('Y');



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

<a href="cad_admin/menu.php"><font color="#FFFFFF"><strong>Cadastrar Administrador</strong></font></a>


<?

$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}




?>
<p>
<p>
  
<table width="100%"  border="0">

  <tr>

    <td>&nbsp;</td>

    <td width="18%">&nbsp;</td>

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

    <td><form action="imagem_fundo/menu.php" method="post" name="form14">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit27" value="Imagem de Fundo">
    </form></td>

    <td><form action="cores/menu.php" method="post" name="form5">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit53" value="Cores do website">

    </form></td>

    <td><form action="categorias/menu.php" method="post" name="form2">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit22" value="Categorias">

    </form></td>
  </tr>

  <tr>

    <td><form action="comentarios/menu.php" method="post" name="form3">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit322" value="Coment&aacute;rios">

    </form></td>

    <td><form action="background_topo/menu.php" method="post" name="form14">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit142" value="Background Cabe&ccedil;alho">
    </form></td>

    <td><form action="pagina_inicial/menu.php" method="post" name="form10">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit10" value="P&aacute;gina inicial do site ">

    </form></td>

    <td><form action="sub_categorias/menu.php" method="post" name="form13">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit13" value="Sub categorias ">

    </form></td>
  </tr>

  <tr>

    <td><form action="ultimos_visitantes/ultimos_visitantes.php" method="post" name="form17">

          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

          <input type="submit" name="Submit1722" value="&Uacute;ltimos visitantes">

    </form></td>

    <td><form action="background_navegacao/menu.php" method="post" name="form14">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit14" value="Background Navega&ccedil;&atilde;o">
    </form></td>

    <td><form action="franquia/menu.php" method="post" name="form10">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit102" value="Franquia">

    </form></td>

    <td><form action="produtos/menu.php" method="post" name="form11">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit11" value="Produtos">

    </form></td>
  </tr>

  <tr>

    <td>&nbsp;</td>

    <td><form action="logo/menu.php" method="post" name="form7">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit72" value="Logotipo">
    </form></td>
    <td>&nbsp;</td>

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

    <td width="19%">&nbsp;</td>

    <td>&nbsp;</td>

    <td width="35%">&nbsp;</td>

    <td width="28%">&nbsp;</td>
  </tr>
</table>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>