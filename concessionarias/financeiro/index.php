<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");


$senha = $_SESSION['senha'];
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

$anoposterior = bcadd($ano,1);

$anoanterior = bcsub($ano,1);



$solicitacao = $_POST['solicitacao'];
$comissao = $_POST['comissao'];



?>
	
<?
	
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];
	
}
	
	?>
	
</p>

<table width="100%" border="0">
  <tr>
    <td width="22%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="18%">&nbsp;</td>
  </tr>
  <tr>
    <td><form name="form3" method="post" action="index.php">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "balancete_geral"; ?>">
        <input type="submit" name="button" id="button" value="Balancete geral">
      </div>
    </form></td>
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
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td><div align="center">
      <p>
        <?

if($solicitacao=="balancete_geral"){

//echo "<form action='balencete_geral.php' method='post' enctype='multipart/form-data' name='form1'>
echo "<form action='relatorios/dre_periodico.php' method='post' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='3'><div align='center'><strong>Verificar produ&ccedil;&atilde;o periodica GERAL</strong></div></td>

    </tr>

    <tr>

      <td width='34%'>Informe o periodo de referencia </td>

      <td width='66%' colspan='2'><strong>
	  
<select name='nfantasia' id='nfantasia'>
  ";
  

    

  echo "<option>".$estab_pertence."</option>";

    


echo "</select>

</strong>De

        <select name='dia_inicial' id='select3'>
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
<option>31</option>";
        



        echo "</select>

        <select name='mes_inicial' id='select4'>

		<option selected>$mes</option>

          
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
<option>12</option>";



        echo "</select>

        <select name='ano_inicial' id='select5'>

		<option selected>$ano</option>

          
<option>$anoanterior</option>
<option>$anoposterior</option>";



        echo "</select> 

        at&eacute; 

        <select name='dia_final' id='select11'>

          
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
<option>01</option>";



       echo "</select>

        <select name='mes_final' id='select12'>

		<option selected>$mes</option>

          
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
<option>12</option>";



        echo "</select>

        <select name='ano_final' id='select13'>

		<option selected>$ano</option>

          
<option>$anoanterior</option>
<option>$anoposterior</option>";



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


          echo "<input type='submit' name='Submit523222' value=' Gerar D.R.E'>

      </td>

    </tr>

  </table>

</form>";

}

?>
      </p>
      <p>
        <?

if($solicitacao=="verificar producao periodica geral"){


echo "<form action='verificar_producao_periodica_geral.php' method='post' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='3'><div align='center'><strong>Verificar produ&ccedil;&atilde;o periodica GERAL</strong></div></td>

    </tr>

    <tr>

      <td width='34%'>Informe o periodo de referencia </td>

      <td width='66%' colspan='2'><strong>
	  
<select name='nfantasia' id='nfantasia'>
  <option selected></option>";
  

    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }


echo "</select>

</strong>De

        <select name='dia_inicial' id='select3'>
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
<option>31</option>";
        



        echo "</select>

        <select name='mes_inicial' id='select4'>

		<option selected>$mes</option>

          
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
<option>12</option>";



        echo "</select>

        <select name='ano_inicial' id='select5'>

		<option selected>$ano</option>

          
<option>$anoanterior</option>
<option>$anoposterior</option>";



        echo "</select> 

        at&eacute; 

        <select name='dia_final' id='select11'>

          
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
<option>01</option>";



       echo "</select>

        <select name='mes_final' id='select12'>

		<option selected>$mes</option>

          
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
<option>12</option>";



        echo "</select>

        <select name='ano_final' id='select13'>

		<option selected>$ano</option>

          
<option>$anoanterior</option>
<option>$anoposterior</option>";



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
      </p>
    </div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
  </tr>
</table>
<p>
<p>
<p>
<p>
</body>

</html>

