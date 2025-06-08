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



<?

require '../../../conect/conect.php';

error_reporting(E_ALL);


$anoatual = date('Y');
$mesatual = date('m');
$diaatual = date('d');


$anoanterior = bcsub($anoatual,1);
$anoposterior = bcadd($anoatual,1);


?>


<body bgcolor="#ffffff" 


leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="2">





</td>

    </tr>

    <tr>

      <td width="19%">&nbsp;</td>

      <td><strong><font color="#0000FF" size="4">SELECIONE O PERIODO QUE DESEJA PESQUISAR AS CONTAS PAGAS</font></strong></td>

    </tr>

    <tr>

      <td><form name="form1" method="post" action="../principal.php">

        <input type="submit" name="Submit" value="Voltar ao menu principal">

        <span class="style1">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      </span>      </form></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form name="form3" method="post" action="verifica_mensalidades_pagas_por_periodo.php">
        <span class="style1">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        </span>De

        <select name="dia_inicial" id="select3">
          <option selected>01</option>
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
        <select name="mes_inicial" id="mes_inicial">
          <option selected><? echo $mesatual; ?></option>
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
        <select name="ano_inicial" id="ano_inicial">
          <option selected><? echo $anoatual; ?></option>
          <option> <? echo $anoanterior; ?></option>
          <option><? echo $anoposterior; ?></option>
        </select>
at&eacute;
<select name="dia_final" id="select11">
  <option selected>31</option>
  <option>30</option>
  <option>29</option>
  <option>28</option>
  <option>27</option>
  <option>26</option>
  <option>25</option>
  <option>24</option>
  <option>23</option>
  <option>22</option>
  <option>21</option>
  <option>20</option>
  <option>19</option>
  <option>18</option>
  <option>17</option>
  <option>16</option>
  <option>15</option>
  <option>14</option>
  <option>13</option>
  <option>12</option>
  <option>11</option>
  <option>10</option>
  <option>09</option>
  <option>08</option>
  <option>07</option>
  <option>06</option>
  <option>05</option>
  <option>04</option>
  <option>03</option>
  <option>02</option>
  <option>01</option>
</select>
<select name="mes_final" id="select12">
  <option selected><? echo $mesatual; ?></option>
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
<select name="ano_final" id="select13">
  <option selected><? echo $anoatual; ?></option>
  <option> <? echo $anoanterior; ?></option>
  <option><? echo $anoposterior; ?></option>
</select>
<input type="submit" name="button" id="button" value="Contas PAGAS por periodo">
      </form></td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td>&nbsp;</td>

    </tr>

  </table>

<p>&nbsp; </p>

</body>

</html>

