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
error_reporting( E_ALL ^E_NOTICE );

$anoatual = date('Y');
$mesatual = date('m');
$diaatual = date('d');


$anoanterior = bcsub($anoatual,1);
$anoposterior = bcadd($anoatual,1);



$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$data_final = "$ano_final-$mes_final-$dia_final";


?>


<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="2">





</td>

    </tr>

    <tr>

      <td width="19%">&nbsp;</td>

      <td><strong><font color="#0000FF" size="4">VOCE ESTA NO CONTAS A PAGAR. O QUE DESEJA FAZER?</font></strong></td>

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
      <td>&nbsp;</td>
      <td><form name="form4" method="post" action="pagar.php">
        <span class="style1">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        </span>
        <input type="submit" name="button2" id="button2" value="Lan&ccedil;amentos">
      </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td><div align="center"></div></td> 

      <td><form name="form3" method="post" action="verifica_mensalidades_por_periodo.php">
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
<input type="submit" name="button" id="button" value="Contas a pagar por periodo">
      </form></td>

    </tr>

  </table>
  <br>

<table width="100%" border="0">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><div align="center"><strong>EDI&Ccedil;&Atilde;O DO CONTAS A PAGAR</strong></div></td>
    </tr>
    <tr>
      <td width="41%"><form name="form3" method="post" action="menu.php">
        <span class="style1">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        </span>De
        <select name="dia_inicial" id="dia_inicial">
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
  <select name="dia_final" id="dia_final">
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
  <select name="mes_final" id="mes_final">
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
  <select name="ano_final" id="ano_final">
    <option selected><? echo $anoatual; ?></option>
    <option> <? echo $anoanterior; ?></option>
    <option><? echo $anoposterior; ?></option>
  </select>
  <input type="submit" name="button3" id="button3" value="Pesquisar">
      </form></td>
      <td><div align="center">
        <?
          
          $sql = "select sum(valor_a_pagar) as total_entradas from contas_a_pagar where vencto between '$data_inicial'and '$data_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_entradas = $linha['total_entradas'];



echo "Total de contas a pagar no periodo escolhido R$ ".$valor_total_entradas;

		  
          ?>
      </div></td>
      <td width="16%">&nbsp;</td>
    </tr>
</table>
<br>
<table width="100%"  border="0">
  <tr bgcolor="#ffffff">
    <td><div align="center">Empresa</div></td>
    <td><div align="center">Fornecedor</div></td>
    <td><div align="center">N&ordm; Fatura</div></td>
    <td><div align="center">Vencimento</div></td>
    <td width="15%"><div align="center">Valor</div></td>
    <td><div align="center">Quita&ccedil;&atilde;o</div></td>
    <td><div align="center"> </div></td>
  </tr>
  <?


$sql = "SELECT * FROM contas_a_pagar where quitacao = 'Em Aberto' and vencto between '$data_inicial'and '$data_final' order by vencto asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;



$cod_contas_a_pagar = $linha[0];

$num_fatura = $linha[1];

$datacadastro = $linha[2];

$horacadastro = $linha[6];

$nfantasia = $linha[7];

$cpf = $linha[8];

$obs = $linha[9];

$valor_a_pagar = $linha[10];

$vencto = $linha[11];

$quantparc = $linha[12];

$modopagto = $linha[13];

$quitacao = $linha[16];

$historico = $linha[33];

$num_mensalidade = $linha[34];

$categoria_conta = $linha[37];

$codigo_fornecedor = $linha[38];

$fornecedor = $linha[41];








$data_do_vencto = explode("-", $vencto);


$ano_do_vencto = $data_do_vencto[0];

$mes_do_vencto = $data_do_vencto[1];

$dia_do_vencto = $data_do_vencto[2];


$data_vencto_brasileira = "$dia_do_vencto-$mes_do_vencto-$ano_do_vencto";
?>
  <form name="form2" method="post" action="editar.php">
    <tr>
      <td width="20%"><div align="center"><? echo $nfantasia; ?></div></td>
      <td width="21%"><div align="center"><? echo $fornecedor; ?></div></td>
      <td width="21%"><div align="center"><? echo $num_fatura; ?></div></td>
      <td width="13%"><div align="center"><? echo $data_vencto_brasileira; ?></div></td>
      <td><div align="center"><? echo "R$ ".$valor_a_pagar; ?></div></td>
      <td width="11%"><div align="center"><? echo $quitacao; ?></div></td>
      <td width="20%"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$dia_pagamento = date('d');
$mes_pagamento = date('m');
$ano_pagamento = date('Y');

?>
        <input name="cod_contas_a_pagar" type="hidden" id="cod_contas_a_pagar" value="<? echo $cod_contas_a_pagar; ?>">
      <input type="submit" name="Submit2" value="Editar">
      <input name="dia_inicial2" type="hidden" id="dia_inicial2" value="<? echo $dia_inicial; ?>">
      <input name="mes_inicial2" type="hidden" id="mes_inicial2" value="<? echo $mes_inicial; ?>">
      <input name="ano_inicial2" type="hidden" id="ano_inicial2" value="<? echo $ano_inicial; ?>">
      <input name="dia_final2" type="hidden" id="dia_final2" value="<? echo $dia_final; ?>">
      <input name="mes_final2" type="hidden" id="mes_final2" value="<? echo $mes_final; ?>">
      <input name="ano_final2" type="hidden" id="ano_final2" value="<? echo $ano_final; ?>"></td>
    </tr>
  </form>
  <?

if($reg==1){

echo "<tr>";

//$reg=0;

}

?>
  <? } ?>
</table>
<p>&nbsp;</p>

</body>

</html>

