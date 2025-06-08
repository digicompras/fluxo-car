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

<title>Relat&oacute;rio de Produ&ccedil;&atilde;o</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style></head>



<body>

<p><?


require '../../conect/conect.php';

error_reporting(E_ALL);



$dia = date('d');

$mes = date('m');

$ano = date('Y');

$ano_anterior = bcsub($ano,1);
$ano_posterior = bcadd($ano,1);

$solicitacao = $_POST['solicitacao'];
$comissao = $_POST['comissao'];



?>
</p>

<table width="100%" border="0">
  <tr>
    <td width="20%"><div align="center">
      <form action="menu.php" method="post" name="form3" target="navegacao">
        <div align="center">
          <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "verificar vendas periodicas geral"; ?>">
          <input type="hidden" name="comissao" id="comissao">
          <input type="submit" name="button7" id="button7" value="Relat&oacute;rio produ&ccedil;&atilde;o periodica geral">
        </div>
      </form>
    </div></td>
    <td width="20%"><div align="center"></div></td>
    <td width="20%"><div align="center"></div></td>
    <td width="20%"><div align="center"></div></td>
    <td width="20%"><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <form action="../estoque/resumo_geral_estoque.php" method="post" name="form3" target="navegacao">
        <div align="center">
          <input type="submit" name="button" id="button" value="Relat&oacute;rio geral Estoque">
        </div>
      </form>
    </div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="20%"><div align="center"></div></td>
    <td><div align="center"></div>      <div align="center"></div>      <div align="center"></div></td>
    <td width="20%"><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center">
      <?

if($solicitacao=="verificar vendas periodicas geral"){


echo "<form action='verificar_producao_periodica_pedidos_efetivados.php' method='post' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='3'><div align='center'><strong>Verificar produ&ccedil;&atilde;o periodica GERAL</strong></div></td>

    </tr>

    <tr>

      <td width='34%'>Informe o periodo de refer&ecirc;ncia </td>

      <td width='66%' colspan='2'><strong><font color='#0000FF'>";
          
    


        echo "De

        <select name='dia_inicial' id='select3'>";

          
    $sql = "select * from orcamentos where dia_fatura <> '' group by dia_fatura order by dia_fatura asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_fatura']."</option>";

    }



        echo "</select>

        <select name='mes_inicial' id='select4'>

		<option selected>$mes</option>";

          
    $sql = "select * from orcamentos  group by mes_fatura order by mes_fatura asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_fatura']."</option>";

    }



        echo "</select>

        <select name='ano_inicial' id='select5'>

		<option selected>$ano</option>";

          
    $sql = "select * from orcamentos group by ano_fatura order by ano_fatura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_fatura']."</option>";

    }



        echo "</select> 

        at&eacute; 

        <select name='dia_final' id='select11'>";

          
    $sql = "select * from orcamentos where dia_fatura <> '' group by dia_fatura order by dia_fatura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_fatura']."</option>";

    }



       echo "</select>

        <select name='mes_final' id='select12'>

		<option selected>$mes</option>";

          
    $sql = "select * from orcamentos group by mes_fatura order by mes_fatura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_fatura']."</option>";

    }



        echo "</select>

        <select name='ano_final' id='select13'>
		
		<option>$ano_anterior</option>

		<option selected>$ano</option>";

          
    $sql = "select * from orcamentos group by ano_fatura order by ano_fatura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_fatura']."</option>";
    }

        echo "</select>

      </td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan='2'>";
	  ?>
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
      <?


          echo "<input type='submit' name='Submit523222' value='Relat&oacute;rio de Produ&ccedil;&atilde;o'>

      </td>

    </tr>

  </table>

</form>";

}

?>
    </div>      <div align="center"></div>      <div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>
<p>
</body>

</html>

