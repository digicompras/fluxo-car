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
.style1 {
	color: #0000FF;
	font-weight: bold;
}
-->
</style></head>

<body>
<p><?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';
error_reporting(E_ALL);
?>


<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$estabelecimento_proposta = $linha[44];

}
?>



</p>
<form name="form1" method="post" action="../principal.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit2" value="Voltar ao menu principal">
</form>
<p>&nbsp;</p>
<div align="center">
  <p class="style1">RELAT&Oacute;RIO PERIODICO POR LOJA </p>
  <form action="relatorio_de_producao_periodico_por_loja.php" method="post" enctype="multipart/form-data" name="form1">
    <table width="100%"  border="0">
      <tr>
        <td width="35%">Informe a loja <br></td>
        <td width="32%"> <strong><font color="#0000FF"><? echo $estabelecimento_proposta; ?>
              <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estabelecimento_proposta; ?>">
</font></strong></td>
        <td width="33%">&nbsp; </td>
      </tr>
      <tr>
        <td>informe o status que deseja </td>
        <td colspan="2"><select name="status" id="select7">
            <option>Todos</option>
            <?


    $sql = "select * from status order by status asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['status']."</option>";
    }
?>
        </select></td>
      </tr>
      <tr>
        <td>Informe o per&iacute;odo que deseja </td>
        <td colspan="2">De
            <select name="dia_inicial" id="dia_inicial">
              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
              <option>05</option>
              <option>06</option>
              <option>07</option>
              <option>08</option>
              <option>09</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
              <option>13</option>
              <option>14</option>
              <option>15</option>
              <option>16</option>
              <option>17</option>
              <option>18</option>
              <option>19</option>
              <option>20</option>
              <option>21</option>
              <option>22</option>
              <option>23</option>
              <option>24</option>
              <option>25</option>
              <option>26</option>
              <option>27</option>
              <option>28</option>
              <option>29</option>
              <option>30</option>
              <option>31</option>
            </select>
            <strong><font color="#0000FF"> </font></strong>
            <select name="mes_inicial" id="mes_inicial">
              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
              <option>05</option>
              <option>06</option>
              <option>07</option>
              <option>08</option>
              <option>09</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
            </select>
            <strong><font color="#0000FF">
            <select name="ano_inicial" id="select2">
              <?


    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['ano_alteracao_status']."</option>";
    }
?>
            </select>
            </font></strong> at&eacute;
            <select name="dia_final" id="select3">
              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
              <option>05</option>
              <option>06</option>
              <option>07</option>
              <option>08</option>
              <option>09</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
              <option>13</option>
              <option>14</option>
              <option>15</option>
              <option>16</option>
              <option>17</option>
              <option>18</option>
              <option>19</option>
              <option>20</option>
              <option>21</option>
              <option>22</option>
              <option>23</option>
              <option>24</option>
              <option>25</option>
              <option>26</option>
              <option>27</option>
              <option>28</option>
              <option>29</option>
              <option>30</option>
              <option>31</option>
            </select>
            <strong><font color="#0000FF"> </font></strong>
            <select name="mes_final" id="select4">
              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
              <option>05</option>
              <option>06</option>
              <option>07</option>
              <option>08</option>
              <option>09</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
            </select>
            <strong><font color="#0000FF">
            <select name="ano_final" id="select5">
              <?


    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['ano_alteracao_status']."</option>";
    }
?>
            </select>
          </font></strong> </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
            <input type="submit" name="Submit322" value="Gerar Relat&oacute;rio Peri&oacute;dico"></td>
        <td>&nbsp; </td>
      </tr>
    </table>
  </form>
  <p class="style1">&nbsp;</p>
</div>
<p align="center">&nbsp;</p>
</body>
</html>
