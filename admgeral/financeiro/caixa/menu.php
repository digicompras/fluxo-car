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



$dia = date('d');

$mes = date('m');

$ano = date('Y');

$ano_anterior = bcsub($ano,1);

$ano_posterior = bcadd($ano,1);


$hoje = date('d-m-Y');

	



		

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); } ?>"



<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="../background/<? printf("$linha[1]"); } ?>" bgproperties="fixed">

  

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

$sql = "SELECT * FROM cx_entradas where datacadastro = '$hoje'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$datacadastro = $linha[3];

}





?>









      </td>

    </tr>

    <tr>

      <td colspan="3"><strong><font color="#0000FF" size="4">O que deseja fazer no caixa <span class="style1"><? echo $nome_op; ?></span> ?</font></strong></td>

    </tr>

    <tr>

      <td><form name="form1" method="post" action="../principal.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit22" value="Voltar ao menu principal">

      </form></td>

      <td colspan="2">&nbsp;</td>

    </tr>

    <tr>

      <td><form action="abertura_de_caixa.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if(mysql_num_rows($res)==0){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>

      </form></td>

      <td><form action="../pagar/re_imprimir_pagar.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if($funcao=="Administrativo_Geral"){

		echo "Informe o N&ordm; do 7.1<br>";

		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';

        echo'<input type="submit" name="Submit2" value="Re-Imprimir Saidas">';

		}

?>

            </form></td>

      <td><form action="../receber/re_imprimir_receber.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if($funcao=="Administrativo_Geral"){

		echo "Informe o N&ordm; do 7.1<br>";

		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';

        echo'<input type="submit" name="Submit2" value="Re-Imprimir Entradas">';

		}

?>

            </form></td>

    </tr>

    <tr>

      <td width="31%"><form name="form5" method="post" action="../receber/receber.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(mysql_num_rows($res)>=1){



  echo'<input type="submit" name="Submit" value="Lan&ccedil;amento de entradas">';

  }

		

		?>
      </form></td>

      <td width="36%"><form action="../pagar/editar_pagar.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if($funcao=="Administrativo_Geral"){

		echo "Informe o Nº do 7.1<br>";

		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';

        echo'<input type="submit" name="Submit2" value="Editar Saidas">';

		}

?>

            </form></td>

      <td width="33%"><form action="../receber/editar_receber.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if($funcao=="Administrativo_Geral"){

		echo "Informe o Nº do 7.1<br>";

		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';

        echo'<input type="submit" name="Submit2" value="Editar Entradas">';

		}

?>

            </form></td>

    </tr>

    <tr>

      <td><form name="form4" method="post" action="../pagar/pagar.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(mysql_num_rows($res)>=1){



        echo'<input type="submit" name="Submit3" value="Lan&ccedil;amento de Sa&iacute;das">';

		}

		

		?>
      </form></td>

      <td colspan="2" valign="top"><form action="imprimir_caixa_por_data.php" method="post" name="form4" target="_blank">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        

        <?

if(mysql_num_rows($res)>=1){



		echo "Informe a data que deseja<br>";

		echo '<input name="datacadastro" type="text" id="datacadastro" size="15" maxlength="10">';

        echo'<input type="submit" name="Submit32" value="Verifica caixa geral por data">';

		}

		?>

                              </form></td>

    </tr>

    <tr>

      <td><form name="form4" method="post" action="relatorio_geral_cx_diario.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(mysql_num_rows($res)>=1){



        echo'<input type="submit" name="Submit32" value="Verifica caixa geral do dia">';

		}

		?>
      </form></td>

      <td colspan="2" valign="top"><form action="imprimir_cx_periodico_por_empresa.php" method="post" name="form4" target="_blank">

        <div align="center">
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          
          
          
  <?

if(mysql_num_rows($res)>=1){


       echo "Informe a loja e o periodo <select name='nfantasia' id='nfantasia'>

                          <option selected></option>";




    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }


       echo "</select>

		        </font></strong>
                

De

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
		<option>$ano_anterior</option>
		<option selected>$ano</option>
		<option>$ano_posterior</option>";
          



        echo "</select> 

        ate 

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
		<option>$ano_anterior</option>
		<option selected>$ano</option>
		<option>$ano_posterior</option>
          



        </select>";


		

        echo'<input type="submit" name="Submit32" value="Verifica caixa periodico">';

		}

		?>
          
        </div>
      </form></td>

    </tr>

    <tr>

      <td colspan="3"><div align="center">
        <form action="fechamento_caixa_por_departamento.php" method="post" name="form3" target="_blank">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



?>
          Funcion&aacute;rio
          <select name="nome" id="select6">
            <option selected></option>
            <?


    $sql = "select * from operadores order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
    }
?>
          </select>
          Departamento
  <select name="departamento" id="departamento">
    <option selected><? //echo $departamento; ?></option>
    <?


    $sql = "select * from departamentos where qualificacao = 'D' order by departamento asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['departamento']."</option>";
    }
?>
  </select>
          periodo
  <select name="dia_inicial" id="dia_inicial">
    <option selected><? //echo $dia_inicial_pesquisado; ?></option>
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
  <select name="mes_inicial" id="mes_inicial">
    <option selected><? //echo $mes_inicial_pesquisado; ?></option>
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
    <option>
      <? echo $ano_anterior; ?>
      </option>
    <option selected><? echo $ano; ?></option>
    <option>
      <? echo $ano_posterior; ?>
      </option>
  </select>
          at&eacute;
  <select name="dia_final" id="dia_final">
    <option selected><? //echo $dia_final_pesquisado; ?></option>
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
  <select name="mes_final" id="mes_final">
    <option selected><? //echo $mes_final_pesquisado; ?></option>
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
  <select name="ano_final" id="ano_final">
    <option>
      <? echo $ano_anterior; ?>
      </option>
    <option selected><? echo $ano; ?></option>
    <option>
      <? echo $ano_posterior; ?>
      </option>
  </select>
  <input type="submit" name="button" id="button" value="Verificar Caixa">
        </form>
      </div></td>

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

