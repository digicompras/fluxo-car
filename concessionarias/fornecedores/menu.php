<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

?>



<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
.class011 {    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}
.class011 {    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}
</style>
</head>

<?



require '../../conect/conect.php';

	?>

<?

$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>


<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="5"><?

//require("conect/conect.php"); or die("erro na requisição");

require '../../conect/conect.php';

error_reporting(E_ALL);

?>



</td>

    </tr>

    <tr>

      <td width="23%">&nbsp;</td>

      <td colspan="4"><strong><font color="#0000FF" size="4">O que deseja fazer com os fornecedores?</font></strong></td>

    </tr>

    <tr>

      <td><form name="form1" method="post" action="../index.php">
        <p>
          <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
          <input class='class01' type=image src="../../imagens/botoes/voltar.png" width="100" height="100" name="Submit" value="ESTOQUE DE PE&Ccedil;AS">
          <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
        </p>
      </form></td>

      <td colspan="4">&nbsp;</td>

    </tr>

    <tr>

      <td><div align="center">
        <form action="inserir.php" method="post" name="form2">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="class01" type=image src="../../imagens/botoes/inserir.png" width="100" height="100" name="Submit2" value="Voltar">
        </form>
      </div></td> 

      <td width="10%">&nbsp;</td>
      <td width="23%"><form name="form3" method="post" action="informe_nfantasia_para_edicao.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="class01" type=image src="../../imagens/botoes/editar.png" width="100" height="100" name="Submit3" value="Voltar">
      </form></td>
      <td width="8%">&nbsp;</td>
      <td width="36%"><form name="form4" method="post" action="informe_nfantasia_para_exclusao.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="class01" type=image src="../../imagens/botoes/excluir.png" width="100" height="100" name="Submit4" value="Voltar">
      </form></td>

    </tr>

  </table>

<p>&nbsp; </p>

</body>

</html>

