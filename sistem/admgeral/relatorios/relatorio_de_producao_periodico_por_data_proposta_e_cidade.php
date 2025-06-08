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

<title>LISTANDO TODAS AS PROPOSTAS PAGAS DO OPERADOR</title>

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

.style3 {font-size: 10px}

.style4 {

	font-size: 16px;

	font-weight: bold;

}

-->

</style>

</head>

<?



require '../../conect/conect.php';





	  

//$nome_operador = $_POST['nome_operador'];

$cidade = $_POST['cidade'];

$bco_operacao = $_POST['bco_operacao'];

$status = $_POST['status'];

$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];


$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$data_final = "$ano_final-$mes_final-$dia_final";





$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>











      <p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>

      <form name="form1" method="post" action="menu.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "relatorio por data de propostas e cidade"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="Submit2" value="Voltar">

</form>

      <br>


      Período selecionado de <? echo "$dia_inicial-$mes_inicial-$ano_inicial até $dia_final-$mes_final-$ano_final da cidade  $cidade do Banco de operação $bco_operacao ";?><br>

<table width="100%"  border="0">

              <tr>

                <td width="35%" valign="middle"><div align="right"></div></td>

				<td width="38%" valign="middle">&nbsp;</td>
				<td width="27%">&nbsp;</td>

              </tr>

</table>            

      <?




$sql = "SELECT * FROM propostas where cidade = '$cidade' and data_proposta between '$data_inicial'and '$data_final' and bco_operacao = '$bco_operacao' order by num_proposta asc";


$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$nome_cli = $linha[4];
$cpf_cli = $linha[7];


$comissao_op = $linha[101];

$cidade = $linha[18];

$valor_total = $linha[113];

$valor_liquido_cliente = $linha[115];

$meta = $linha[171];


?>

      <table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td><div align="center" class="style3">N&ordm; Proposta </div></td>

          <td><div align="center"><span class="style3">Cidade</span></div></td>

          <td class="style3"><div align="center">Cliente</div></td>
          <td class="style3"><div align="center">CPF</div></td>
          <td width="5%"><div align="center" class="style3">R$ Parcelas </div></td>

          <td><div align="center" class="style3">Tipo de Proposta </div></td>

          <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>
        </tr>

		

        <tr>

          <td width="6%">               <form name="form2" method="post" action=""><div align="center" class="style3">

              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

              

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

            <? printf("$linha[0]"); ?>                

          </div></form></td>

          <td width="7%"><div align="center"><span class="style3"><? echo $cidade;?></span></div></td>

          <td width="7%"><div align="center"><span class="style3"><? echo $nome_cli;?></span></div></td>
          <td width="7%"><div align="center"><span class="style3"><? echo $cpf_cli;?></span></div></td>
          <td><div align="center" class="style3"><? printf("$linha[27]"); ?> </div></td>

          <td width="7%"><div align="center" class="style3"><? printf("$linha[83]"); ?> </div></td>

          <td width="8%"><div align="center" class="style3"><? printf("$linha[86]"); ?></div></td>

          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

<? } ?>
        <tr>

          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>
        <tr>

          <td><span class="style3">Total</span></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>
</table>



<p>&nbsp;</p>







</body>

</html>

