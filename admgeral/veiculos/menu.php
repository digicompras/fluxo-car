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
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td colspan="2"><?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';
error_reporting(E_ALL);

?>



                    </td>
    </tr>
    <tr>
      <td width="22%">&nbsp;</td>
      <td width="78%"><strong><font color="#0000FF" size="4">O que deseja fazer com os ve&iacute;culos?</font></strong></td>
    </tr>
    <tr>
      <td><form name="form1" method="post" action="../principal.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit22" value="Voltar ao menu principal">
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">        <form action="pesquisa.php" method="post" name="form2">
       <div align="left"> <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        
          <input type="submit" name="Submit2" value="Verificar / Registrar Ve&iacute;culo">
        </div>
      </form></td> 
    </tr>
    <tr>
      <td colspan="2"><form action="informe_veiculo_para_edicao.php" method="post" enctype="multipart/form-data" name="form1">
        <table width="100%"  border="0">
          <tr>
            <td><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>              <input type="submit" name="Submit" value="Editar Ve&iacute;culo">              </td>
          </tr>
        </table>
      </form></td>
    </tr>
    <tr>
      <td colspan="2">       <form name="form4" method="post" action="informe_cpf_para_exclusao.php">
       <div align="left"> <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        
          <input type="submit" name="Submit4" value="Excluir Ve&iacute;culo">
        </div>
      </form></td> 
    </tr>
  </table>
<p>&nbsp; </p>
</body>
</html>
