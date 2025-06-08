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
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {	font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
-->
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name="form2" method="post" action="menu.php">
  <input type="submit" name="Submit2" value="Voltar">
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
      <td colspan="3">

<?



require '../../conect/conect.php';

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




?>

<br>
<strong><font color="#0000FF" size="4">Escolha a categoria que deseja adicionar o novo produto ao banco de dados de sua loja! </font></strong></td>
    
    <tr>
      <td>&nbsp;</td>
      <td width="19%">Categoria*</td>
      <td>Classe*</td>
      <td>Departamento*</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><select name="categoria" id="categoria">
      <option selected><? echo $categoriaretorno; ?></option>
        <?


    $sql = "select * from categorias_receitas group by categoria order by categoria";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>";
    }
?>
      </select></td>
      <td width="20%"><select name="classe" id="classe">
        <option selected><? echo $classeretorno; ?></option>
        <option>O</option>
        <option>E</option>
      </select> 
        (O)Ordin&aacute;rio (E)Exclusivo</td>
      <td width="47%"><select name="departamento" id="departamento">
        <option selected><? 
		
		if(($classeretorno=="O") or (empty($classeretorno))){
			
		echo "Todos"; 
		
		}
		else{
			
		echo $departamentoretorno; 
			
		}
		
		
		?></option>
        <?


    $sql = "select * from departamentos where qualificacao = 'R' order by departamento asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['departamento']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr> 
      <td><span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </span></td>
      <td colspan="3"><input type="submit" name="Submit" value="Avan&ccedil;ar">      </td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</body>
</html>
