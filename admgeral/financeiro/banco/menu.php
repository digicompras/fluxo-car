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

.style1 {	color: #0000FF;

	font-weight: bold;

}

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style>

</head>



<?



require '../../../conect/conect.php';

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



$anoatual = date('Y');
$mesatual = date('m');
$diaatual = date('d');


$anoanterior = bcsub($anoatual,1);
$anoposterior = bcadd($anoatual,1);


$hoje = date('d-m-Y');

	



		


?>





<body bgcolor="#ffffff" background="../background/" bgproperties="fixed">

  

  <table width="96%" border="0" cellspacing="10">

    <tr>

      <td colspan="3"><?

error_reporting(E_ALL);



?>





<?

$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estabelecimento_op = $linha[24];

$cidade_estabelecimento_op = $linha[25];

$tel_estabelecimento_op = $linha[26];

$email_estabelecimento_op = $linha[27];

$funcao = $linha[43];

$estab_pertence_op = $linha[44];

$cidade_estab_pertence_op = $linha[45];

$tel_estab_pertence_op = $linha[46];

$email_estab_pertence_op = $linha[47];

}





?>



<?

$sql = "SELECT * FROM bco_entradas where datacadastro = '$hoje'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$datacadastro = $linha[3];

}





?>









      </td>

    </tr>

    <tr>

      <td colspan="3"><strong><font color="#0000FF" size="4"><span class="style1"><? echo $nome_op; ?></span> O que deseja fazer no BANCO?</font></strong></td>

    </tr>

    <tr>

      <td><form name="form1" method="post" action="../principal.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit22" value="Voltar ao menu principal">

      </form></td>

      <td colspan="2"><form action="imprimir_periodico_por_banco.php" method="post" name="form4" target="_blank">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        Informe o periodo o banco e a conta desejada<br>
        De
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
        banco
  <select name="banco" id="banco">
    <option selected></option>
    <?





    $sql = "select * from contas_bancarias group by banco order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>
  </select>
        conta
  <select name="contacorrente" id="contacorrente">
    <option selected></option>
    <?





    $sql = "select * from contas_bancarias order by contacorrente asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['contacorrente']."</option>";

    }

?>
  </select>
  <?









        echo'<input type="submit" name="Submit32" value="Verifica banco periodico">';


		?>
      </form></td>

    </tr>

    <tr>

      <td><form name="form5" method="post" action="lancamento_entradas.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?




  echo'<input type="submit" name="Submit" value="Lan&ccedil;amento de entradas">';


		

		?>
      </form></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td width="31%"><form name="form4" method="post" action="lancamento_saidas.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?




        echo'<input type="submit" name="Submit3" value="Lan&ccedil;amento de Sa&iacute;das">';


		

		?>
      </form></td>

      <td width="36%">&nbsp;</td>

      <td width="33%">&nbsp;</td>

    </tr>

    <tr>

      <td><form name="form4" method="post" action="relatorio_diario.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?




        echo'<input type="submit" name="Submit32" value="Verifica banco geral do dia">';


		?>
      </form></td>

      <td colspan="2" valign="top">&nbsp;</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2" valign="top">&nbsp;</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2">&nbsp;</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2">&nbsp;</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2">&nbsp;</td>

    </tr>

  </table>

<p>&nbsp;</p>
<p>&nbsp; </p>
<p>&nbsp; </p>

</body>

</html>

