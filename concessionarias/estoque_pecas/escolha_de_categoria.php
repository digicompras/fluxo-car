<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

require '../../conect/conect.php';

?>

<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {	font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
.class01 {font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}
-->
</style>
</head>

<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
<form name="form2" method="post" action="menu.php">
  <input class="class01" type=image src="../../imagens/botoes/voltar.png" width="100" height="100" name="Submit2" value="Voltar">
  <span class="style1">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  </span>
</form>
<form action="produtos_insert.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td width="14%">&nbsp;</td>
      <td colspan="4">

<?





//-------------------------------------------------------

$categoria = $_POST['categoria'];

$categoriaget = $_GET['categoria'];

if(empty($categoria)){
$categoriaretorno = $categoriaget;
}
else{
$categoriaretorno = $categoria;
}


//-------------------------------------------------------

$classe = $_POST['classe'];

$classeget = $_GET['classe'];

if(empty($classe)){
$classeretorno = $classeget;
}
else{
$classeretorno = $classe;
}


//-------------------------------------------------------

$departamento = $_POST['departamento'];

$departamentoget = $_GET['departamento'];

if(empty($departamento)){
$departamentoretorno = $departamentoget;
}
else{
$departamentoretorno = $departamento;
}


//-------------------------------------------------------
		  
$referencia = $_POST['referencia'];

$referenciaget = $_GET['referencia'];

if(empty($referencia)){
$referenciaretorno = $referenciaget;
}
else{
$referenciaretorno = $referencia;
}


//-------------------------------------------------------




?>

<br>
<strong><font color="#0000FF" size="4">Escolha o Grupo e Sub-Grupo! </font></strong></td>
    
    <tr>
      <td>&nbsp;</td>
      <td width="19%">Grupo*</td>
      <td>Sub-Grupo</td>
      <td>Part Number</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><select class="class02" name="grupo" id="grupo">
		  <?
      $sql = "select * from grupo order by grupo";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option selected>".$x['grupo']."</option>";
    }
		  ?>
        
      </select></td>
      <td width="20%"><select class="class02" name="sub_grupo" id="sub_grupo">
        
        <?


    $sql = "select * from sub_grupo order by sub_grupo desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['sub_grupo']."</option>";
    }
?>
      </select></td>
      <td width="20%"><span class="style1">
        <? echo "$referenciaretorno"; ?>
        <input class="class02" name="referencia" type="hidden" id="referencia" value="<? echo "$referenciaretorno"; ?>">
        <input class="class02" name="classe" type="hidden" id="classe" value="<? echo "O"; ?>">
        <input class="class02" name="departamento" type="hidden" id="departamento" value="<? echo "Todos"; ?>">
      </span></td>
      <td width="47%">&nbsp;</td>
    </tr>
    <tr> 
      <td><span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </span></td>
      <td colspan="4"><input class="class01" type="submit" name="Submit" value="Avan&ccedil;ar">      </td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</body>
</html>
