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

?>                    </td>
    </tr>
    <tr>
      <td width="22%">&nbsp;</td>
      <td width="78%"><strong><font color="#0000FF" size="4">Oque deseja fazer com os clientes?</font></strong></td>
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
      <td><div align="center"></div></td> 
      <td><form action="pesquiza_cpf.php" method="post" name="form2">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit2" value="Cadastrar Cliente ">
      </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form name="form5" method="post" action="editar_cliente_por_nome.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <select name="nome" id="select3">
          <option selected>Selecione o cliente</option>
          <?


    $sql = "select * from clientes order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
    }
?>
        </select>
        <input type="submit" name="Submit5" value="Editar Cliente por Nome">
      </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form name="form5" method="post" action="informe_codigo_para_edicao.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit" value="Editar Cliente por N&ordm; de Matr&iacute;cula">
      </form></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form3" method="post" action="informe_cpf_para_edicao.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit3" value="Editar Cliente por CPF">
      </form></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form action="listagem_e_totalizacao_de_clientes_cadastrados.php" method="post" name="form4" target="_blank">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit4" value="Listagem e totaliza&ccedil;&atilde;o de clientes cadastrados">
      </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form name="form4" method="post" action="informe_cpf_para_exclusao.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit42" value="Excluir Cliente ">
      </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form action="../relatorios/relatorio_de_alteracao_de_clientes.php" method="post" name="form5" target="_blank">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <select name="operador_alterou" id="nome">
          <option selected>Selecione o(a) operador(a)</option>
          <?





    $sql = "select * from operadores order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";

    }

?>
        </select>
        <select name="dataalteracao" id="operador_alterou">
          <option selected>
          <?





    $sql = "select * from clientes group by dataalteracao order by dataalteracao desc limit 500";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dataalteracao']."</option>";

    }

?>
          </option>
        </select>
        <input type="submit" name="Submit6" value="Relat&oacute;rio de clientes alterados por data">
      </form></td>
    </tr>
  </table>
<p>&nbsp; </p>
</body>
</html>
