<?



session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

?>



<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



require '../../../conect/conect.php';



$solicitacao = $_POST['solicitacao'];

$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];



?>







<style type="text/css">

<!--

.style1 {

	color: #0000FF;

	font-weight: bold;

}

.style2 {font-weight: bold}

.style3 {color: #0000FF}

.style4 {

	color: #FFFFFF;

	font-weight: bold;

}
.style11 {color: #FF0000;

	font-weight: bold;

	font-size: 24px;
}
.style5 {	font-size: 24px;
	font-weight: bold;
	color: #0000FF;
}

-->

</style>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

<?

$sql50 = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res50 = mysql_query($sql50);
while($linha=mysql_fetch_row($res50)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[15];
	
	$estab_pertence = $linha[44];
$funcao = $linha[43];
}





?>
<table width="100%" border="0">
  <tbody>
    <tr>
      <th colspan="3" scope="row"><span class="style5">Relat&oacute;rio de contas pagas no periodo de <? echo "$dia_inicial-$mes_inicial-$ano_inicial ate $dia_final-$mes_final-$ano_final da empresa $estab_pertence"; ?></span></th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><span class="style11">
        <?
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$anoposterior = bcadd($ano,1);
$anoanterior = bcsub($ano,1);
	
if($solicitacao=="contaspagas"){

//echo "<form action='balencete_geral.php' method='post' enctype='multipart/form-data' name='form1'>
echo "<form action='verifica_contas_pagas_por_periodo.php' method='post' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='3'><div align='center'><span class='style5'></span></div></td>

    </tr>

    <tr>

      <td width='66%' colspan='2'><div align='center'><strong>
	  
	  <span class='style5'>$estab_pertence</span>
	  <input name='solicitacao' type='hidden' id='solicitacao' value='contaspagas'>
	  <input name='nfantasia' type='hidden' id='nfantasia' value='$estab_pertence'><br>";

echo "</strong>De

        <select class='class02' name='dia_inicial' id='select3'>
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

        <select class='class02' name='mes_inicial' id='select4'>

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

        <select class='class02' name='ano_inicial' id='select5'>

		<option selected>$ano</option>

          
<option>$anoanterior</option>
<option>$anoposterior</option>";



        echo "</select> 

        at&eacute; 

        <select class='class02' name='dia_final' id='select11'>

          
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

        <select class='class02' name='mes_final' id='select12'>

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

        <select class='class02' name='ano_final' id='select13'>

		<option selected>$ano</option>

          
<option>$anoanterior</option>
<option>$anoposterior</option>";



        echo "</select></div>

      </td>

    </tr>

    <tr>
	<td colspan='3'><div align='center'>";
	  

          echo "<input class='class01' type='submit' name='Submit523222' value=' Gerar D.R.E'>
</div>
      </td>

    </tr>

  </table>

</form>";

}

?>
      </span></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>



<table width="100%"  border="0">

        <tr>

          <td><div align="center"><span class="style2">

            <?

$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$data_final = "$ano_final-$mes_final-$dia_final";

			

$sql = "SELECT * FROM contas_a_pagar where estabelecimento = '$estab_pertence' and quitacao = 'Pago' and vencto between '$data_inicial'and '$data_final' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg_mensalidade++;


$cod_contas_a_receber = $linha[0];


$nome = $linha[4];

$cpf = $linha[5];

$bco_operacao = $linha[32];




?>

          Listando todas contas pagas do periodo:</span> <span class="style1"><? echo "De $dia_inicial-$mes_inicial-$ano_inicial ate $dia_final-$mes_final-$ano_final"; ?></span><span class="style2"><BR><? } ?> </span></div></td>

        </tr>

  </table>

      

<table width="100%"  border="0">

        <tr bgcolor="#ffffff">
          <td><div align="center">Empresa</div></td>
          <td><div align="center">Fornecedor</div></td>
          <td><div align="center">Estorno</div></td>

          <td><div align="center">Vencimento</div></td>

          <td><div align="center">Valor</div></td>

          <td width="5%"><div align="center">Quita&ccedil;&atilde;o</div></td>

          <td><div align="center">Juros Passivos</div></td>
          <td><div align="center">Paga em</div></td>
          <td><div align="center">Banco</div></td>
          <td><div align="center">Agencia</div></td>
          <td><div align="center">Conta Corrente</div></td>
          <td><div align="center">N&ordm; Ch</div></td>
          <td><div align="center">Tipo</div></td>
  </tr>
  <?

			





$sql = "SELECT * FROM contas_a_pagar where estabelecimento = '$estab_pertence' and quitacao = 'Pago' and vencto between '$data_inicial'and '$data_final'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;


$cod_contas_a_pagar = $linha[0];

$num_fatura = $linha[1];

$datacadastro = $linha[2];

$horacadastro = $linha[6];

$empresa = $linha[7];

$cpf = $linha[8];

$obs = $linha[9];

$valor_a_pagar = $linha[10];

$vencto = $linha[11];

$quantparc = $linha[12];

$modopagto = $linha[13];

$juros = $linha[14];

$quitacao = $linha[16];

$historico = $linha[33];

$num_mensalidade = $linha[34];

$banco = $linha[35];

$categoria_conta = $linha[37];

$codigo_fornecedor = $linha[38];

$codigo_orcamento = $linha[39];

$fornecedor = $linha[41];

$agencia = $linha[42];

$contacorrente = $linha[43];

$tipoconta = $linha[44];

$num_cheque = $linha[45];

$datepagto = $linha[58];




$data_do_vencto = explode("-", $vencto);

$ano_do_vencto = $data_do_vencto[0];

$mes_do_vencto = $data_do_vencto[1];

$dia_do_vencto = $data_do_vencto[2];


$data_vencto_brasileira = "$dia_do_vencto-$mes_do_vencto-$ano_do_vencto";


$data_do_pagto = explode("-", $datepagto);

$ano_do_pagto = $data_do_pagto[0];

$mes_do_pagto = $data_do_pagto[1];

$dia_do_pagto = $data_do_pagto[2];


$data_pagto_brasileira = "$dia_do_pagto-$mes_do_pagto-$ano_do_pagto";


?>

<form name="form2" method="post" action="verifica_mensalidades_pagas.php">	
		

        <tr>
          <td width="14%"><div align="center">
            <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
            <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
            <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
            <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
            <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
            <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
          <? echo $empresa; ?></div></td>
          <td width="10%"><div align="center"><? echo $fornecedor; ?></div></td>
          <td width="5%"><div align="center">
            <input name="cod_contas_a_pagar" type="hidden" id="cod_contas_a_pagar" value="<? echo $cod_contas_a_pagar; ?>">
            <input name="estornar" type="hidden" id="estornar" value="<? echo "Sim"; ?>">
            <input class="class01" type="submit" name="button" id="button" value="Estornar">
          </div></td>




          <td width="6%"><div align="center"><? echo $data_vencto_brasileira; ?></div></td>

          <td width="7%"><div align="center"><? echo "R$ ".$valor_a_pagar; ?></div></td>

          <td><div align="center"><? echo $quitacao; ?></div></td>

          <td width="8%"><div align="center"><? echo $juros; ?></div></td>
          <td width="7%"><div align="center"><? echo $data_pagto_brasileira; ?></div></td>
          <td width="10%"><div align="center"><? echo $banco; ?></div></td>
          <td width="6%"><div align="center"><? echo $agencia; ?></div></td>
          <td width="8%"><div align="center"><? echo $contacorrente; ?></div></td>
          <td width="9%"><div align="center"><? echo $num_cheque; ?></div></td>
          <td width="5%"><div align="center"><? echo $tipoconta; ?></div></td>
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



