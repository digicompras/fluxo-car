<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');
?>
<html>
<head>
<title>LISTANDO TODA MOVIMENTACAO DO MES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
}
.style3 {
	color: #FFFFFF;
	font-weight: bold;
}
.style4 {
	font-size: 18px;
	font-weight: bold;
}
.style5 {
	font-size: 24px;
	font-weight: bold;
	color: #0000FF;
}
.style6 {
	font-size: 24px;
	font-weight: bold;
	color: #FF0000;
}
.style7 {
	font-weight: bold;
	font-size: 24px;
}
.style1 {	color: #FF0000;

	font-weight: bold;

	font-size: 24px;
}
-->
</style>
</head>
<?

require '../../../conect/conect.php';


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];



$solicitacao = $_POST['solicitacao'];

$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];

$anoposterior = bcadd($ano_final,1);

$anoanterior = bcsub($ano_final,1);



$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$datafinal = "$ano_final-$mes_final-$dia_final";


//--------------------------------------------------------------

$nfantasia = $_POST['nfantasia'];

if((empty($nfantasia)) or ($nfantasia=="Todos")){

$parametro_nfantasia = "";

$parametro_nfantasia_pagar = "";

}
else{
	
$parametro_nfantasia = " estabelecimento = '$nfantasia' ";

$parametro_nfantasia_pagar = " empresa = '$nfantasia' ";
	
}

//--------------------------------------------------------------------

//--------------------------------------------------------------

$departamento = $_POST['departamento'];

if((empty($departamento)) or ($departamento=="Todos")){

$parametro_departamento = "";

}
else{
	
$parametro_departamento = " and departamento = '$departamento' ";
	
}

//--------------------------------------------------------------------

$categoria_conta = $_POST['categoria_conta'];

if((empty($categoria_conta)) or ($categoria_conta=="Todos")){

$parametro_categoria_conta = "";

}
else{
	
$parametro_categoria_conta = " and categoria_conta = '$categoria_conta' ";
	
}

//---------------------------------------------------------------------

$quitacao = $_POST['quitacao'];

if((empty($quitacao)) or ($quitacao=="Todos")){

$parametro_quitacao_pagar = "";

$parametro_quitacao_receber = "";

}
else{
	
$parametro_quitacao_pagar = " and quitacao = 'Pago' ";

$parametro_quitacao_receber = " and quitacao = 'Recebido' ";
	
}

//---------------------------------------------------------------------

$banco = $_POST['banco'];

if((empty($banco)) or ($banco=="Todos")){

$parametro_banco = "";

}
else{
	
$parametro_banco = " and banco = '$banco' ";
	
}

//---------------------------------------------------------------------

$agencia = $_POST['agencia'];

if((empty($agencia)) or ($agencia=="Todos")){

$parametro_agencia = "";

}
else{
	
$parametro_agencia = " and agencia = '$agencia' ";
	
}

//---------------------------------------------------------------------

$contacorrente = $_POST['contacorrente'];

if((empty($contacorrente)) or ($contacorrente=="Todos")){

$parametro_contacorrente = "";

}
else{
	
$parametro_contacorrente = " and contacorrente = '$contacorrente' ";
	
}

//---------------------------------------------------------------------

$tipoconta = $_POST['tipoconta'];

if((empty($tipoconta)) or ($tipoconta=="Todos")){

$parametro_tipoconta = "";

}
else{
	
$parametro_tipoconta = " and tipoconta = '$tipoconta' ";
	
}

//---------------------------------------------------------------------

$num_cheque = $_POST['num_cheque'];

if((empty($num_cheque)) or ($num_cheque=="Todos")){

$parametro_num_cheque = "";

}
else{
	
$parametro_num_cheque = " and num_cheque = '$num_cheque' ";
	
}

//---------------------------------------------------------------------



?>

<?

$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador_alterou = $linha[1];
$cel_operador_alterou = $linha[19];
$email_operador_alterou = $linha[20];
$estab_pertence = $linha[44];
$cidade_estabelecimento_alterou = $linha[45];
$tel_estabelecimento_alterou = $linha[46];
$email_estabelecimento_alterou = $linha[47];

 } 
 
 $sql = "SELECT * FROM cad_empresa";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nfantasia = $linha[2];

 } 

 ?>



<body bgcolor="#ffffff" 
  

background="background/" bgproperties="fixed">
  





      <p>
</p>
<table width="100%" border="0">
        <tbody>
          <tr>
            <th colspan="3" scope="row"><span class="style5">Relat&oacute;rio de entradas  no periodo de <? echo "$dia_inicial-$mes_inicial-$ano_inicial ate $dia_final-$mes_final-$ano_final da empresa $estab_pertence"; ?></span></th>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td><span class="style1">
              <?
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$anoposterior = bcadd($ano,1);
$anoanterior = bcsub($ano,1);
	
if($solicitacao=="receber_detalhamento_analitico"){

//echo "<form action='balencete_geral.php' method='post' enctype='multipart/form-data' name='form1'>
echo "<form action='dre_periodico_contas_a_receber_detalhamento_analitico.php' method='post' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='3'><div align='center'><span class='style5'></span></div></td>

    </tr>

    <tr>

      <td width='66%' colspan='2'><div align='center'><strong>
	  
	  <span class='style5'>$estab_pertence</span>
	  <input name='solicitacao' type='hidden' id='solicitacao' value='receber_detalhamento_analitico'>
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
<p></p>
<table width="100%"  border="1">
  <tr bgcolor="#ffffff">
    <td colspan="4"><div align="center" class="style4"><span class="style5"><strong>RELATORIO DO CONTAS A RECEBER DO PERIODO</strong></span></div></td>
  </tr>
  <?
	
$sql2 = "SELECT * FROM contas_a_receber where estabelecimento = '$estab_pertence' and quitacao = 'Em Aberto' and vencto between '$datainicial' and '$datafinal'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

	$num_fatura_a_receber = $linha[1];
	$valor_a_receber = $linha[7];
	$vencto_a_receber = $linha[8];
	$modopagto_a_receber = $linha[10];
	$historico_a_receber = $linha[30];
	$codigo_orcamento_a_receber = $linha[36];
	$num_mensalidade_a_receber = $linha[31];
	$cartao_usado_a_receber = $linha[33];

?>
  <tr>
    <td width="13%">
      
      <? echo $modopagto_a_receber;?>
      
    </td>
    <td width="55%"><form action="../../sistem/orcamentos/imprime_orcamento.php" target="_blank" method="post" name="form2" id="form">
		<?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
		<input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento_a_receber"; ?>">
		<? echo "$historico_a_receber";?> - <? echo "$cartao_usado_a_receber Parcela($num_mensalidade_a_receber)";?>
<input class="class01" type="submit" name="submit" id="submit" value="<? echo "$codigo_orcamento_a_receber"; ?>">
    </form></td>
    <td width="17%" align="center">
      <? echo $vencto_a_receber;?>
    </td>
    <td width="15%"><div align="center">
      <?
				
echo "R$ ".$valor_a_receber;	
?>
    </div></td>
  </tr>
  <? } ?>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td align="center" valign="middle"><form action="../../sistem/orcamentos/imprime_orcamento.php" target="_blank" method="post" name="form2" id="form2">
      <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      TOTAL
    </form></td>
    <td><div align="center">
      <?
	
		
$sql4 = "select sum(valor_a_receber) as total_geral_contas_a_receber from contas_a_receber where quitacao = 'Em Aberto' and estabelecimento = '$estab_pertence' and vencto between '$datainicial' and '$datafinal'";
$resultado4=mysql_query($sql4);
$linha=mysql_fetch_array($resultado4);

$total_geral_contas_a_receber = bcadd($linha['total_geral_contas_a_receber'],0,2);
		

			
echo "R$ ".$total_geral_contas_a_receber;
		
	
	
	
					?>
    </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>



</body>
</html>
