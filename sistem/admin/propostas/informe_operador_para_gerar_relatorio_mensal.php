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
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';
error_reporting(E_ALL);

$dia = date('d');
$mes = date('m');
$ano = date('Y');

?>


</p>
<form name="form1" method="post" action="../principal.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar ao menu principal">
</form>
<p>Para gerar o relat&oacute;rio mensal &eacute; necess&aacute;rio informar o operador o m&ecirc;s e ano! </p>
<table width="100%" border="0">
  <tr>
    <td width="28%">&nbsp;</td>
    <td width="38%">&nbsp;</td>
    <td width="34%">&nbsp;</td>
  </tr>
  <tr>
    <td><form action="../relatorios/perguntas.php" method="post" name="form3">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="resposta" type="hidden" id="resposta" value="<? echo "resposta1"; ?>">
      De
      <select name="dia_inicial" id="dia_inicial">
        <?





    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="mes_inicial" id="mes_inicial">
        <option selected>
          <?  echo $mes;  ?>
          </option>
        <?





    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="ano_inicial" id="ano_inicial">
        <option selected>
          <?  echo $ano;  ?>
          </option>
        <?





    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }

?>
      </select>
      at&eacute;
      <select name="dia_final" id="dia_final">
        <?





    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="mes_final" id="mes_final">
        <option selected>
          <?  echo $mes;  ?>
          </option>
        <?





    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="ano_final" id="ano_final">
        <option selected>
          <?  echo $ano;  ?>
          </option>
        <?





    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }

?>
      </select>
      <input type="submit" name="button" id="button" value="Podemos passar uma proposta de debito em conta?">
    </form></td>
    <td><form action="../relatorios/perguntas.php" method="post" name="form3">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="resposta" type="hidden" id="resposta" value="<? echo "resposta2"; ?>">
      De
      <select name="dia_inicial" id="dia_inicial">
        <?





    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="mes_inicial" id="mes_inicial">
        <option selected>
          <?  echo $mes;  ?>
          </option>
        <?





    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="ano_inicial" id="ano_inicial">
        <option selected>
          <?  echo $ano;  ?>
          </option>
        <?





    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }

?>
      </select>
      at&eacute;
      <select name="dia_final" id="dia_final">
        <?





    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="mes_final" id="mes_final">
        <option selected>
          <?  echo $mes;  ?>
          </option>
        <?





    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="ano_final" id="ano_final">
        <option selected>
          <?  echo $ano;  ?>
          </option>
        <?





    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }

?>
      </select>
      <input name="button2" type="submit" id="button2" value="Podemos tentar uma aprova&ccedil;&atilde;o de proposta de empr&eacute;stimo no carn&ecirc;?">
    </form></td>
    <td><form action="../relatorios/perguntas.php" method="post" name="form3">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="resposta" type="hidden" id="resposta" value="<? echo "resposta3"; ?>">
      De
      <select name="dia_inicial" id="dia_inicial">
        <?





    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="mes_inicial" id="mes_inicial">
        <option selected>
          <?  echo $mes;  ?>
          </option>
        <?





    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="ano_inicial" id="ano_inicial">
        <option selected>
          <?  echo $ano;  ?>
          </option>
        <?





    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }

?>
      </select>
      at&eacute;
      <select name="dia_final" id="dia_final">
        <?





    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="mes_final" id="mes_final">
        <option selected>
          <?  echo $mes;  ?>
          </option>
        <?





    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
      </select>
      <select name="ano_final" id="ano_final">
        <option selected>
          <?  echo $ano;  ?>
          </option>
        <?





    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }

?>
      </select>
      <input name="button3" type="submit" id="button3" value="Podemos tentar aprova&ccedil;&atilde;o de um cart&atilde;o de credito da bradescar?">
    </form></td>
  </tr>
</table>
<p>&nbsp;</p>
<form action="relatorio_de_producao_periodico_por_operador_sintetico.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
    <tr>
      <td colspan="3"><div align="center"><strong>Relat&oacute;rio por operador sint&eacute;tico </strong></div></td>
    </tr>
    <tr>
      <td width="34%">Informe o m&ecirc;s e ano de refer&ecirc;ncia </td>
      <td width="66%" colspan="2">        <select name="mes_ano" id="select6">
          <?


    $sql = "select * from propostas group by mes_ano order by num_proposta desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['mes_ano']."</option>";
    }
?>
        </select>
        </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input type="submit" name="Submit52322" value="Relat&oacute;rio de Produ&ccedil;&atilde;o">          </td>
    </tr>
  </table>
</form>
<form action="relatorio_de_producao_periodico_por_operador_sintetico_novo.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
    <tr>
      <td colspan="3"><div align="center"><strong>Relat&oacute;rio pago ao cliente  sint&eacute;tico </strong></div></td>
    </tr>
    <tr>
      <td width="34%">Informe o m&ecirc;s e ano de refer&ecirc;ncia </td>
      <td width="66%" colspan="2">
        De
        <select name="dia_inicial" id="select3">
          <?


    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['dia_alteracao_status']."</option>";
    }
?>
        </select>
        <select name="mes_inicial" id="select4">
		<option selected><?  echo $mes;  ?></option>
          <?


    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['mes_alteracao_status']."</option>";
    }
?>
        </select>
        <select name="ano_inicial" id="select5">
		<option selected><?  echo $ano;  ?></option>
          <?


    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['ano_alteracao_status']."</option>";
    }
?>
        </select> 
        at&eacute; 
        <select name="dia_final" id="select11">
          <?


    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['dia_alteracao_status']."</option>";
    }
?>
                </select>
        <select name="mes_final" id="select12">
		<option selected><?  echo $mes;  ?></option>
          <?


    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['mes_alteracao_status']."</option>";
    }
?>
                </select>
        <select name="ano_final" id="select13">
		<option selected><?  echo $ano;  ?></option>
          <?


    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['ano_alteracao_status']."</option>";
    }
?>
                </select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input type="submit" name="Submit523222" value="Relat&oacute;rio de Produ&ccedil;&atilde;o">
      </td>
    </tr>
  </table>
</form>
<form action="verificar_prodicao_diaria.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
    <tr>
      <td colspan="3"><div align="center"><strong>Verificar produ&ccedil;&atilde;o di&aacute;ria do operador </strong></div></td>
    </tr>
    <tr>
      <td width="34%">Informe o m&ecirc;s e ano de refer&ecirc;ncia </td>
      <td width="20%">
        <select name="dataproposta" id="select14">
          <?


    $sql = "select * from propostas group by dataproposta order by num_proposta desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['dataproposta']."</option>";
    }
?>
        </select>
      </td>
      <td width="46%"><select name="nome_operador" id="select15">
        <option selected></option>
        <?


    $sql = "select * from operadores order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input type="submit" name="Submit523223" value="Relat&oacute;rio de Produ&ccedil;&atilde;o">
      </td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
