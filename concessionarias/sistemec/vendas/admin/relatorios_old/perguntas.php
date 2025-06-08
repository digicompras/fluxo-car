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

<title>LISTANDO TODAS AS PROPOSTAS POR PERGUNTA</title>

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

$resposta = $_POST['resposta'];

//$campanha_filtro = $_POST['campanha'];

//$status = $_POST['status'];

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

      <form name="form1" method="post" action="../propostas/informe_operador_para_gerar_relatorio_mensal.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit2" value="Voltar">

</form>

<br>

	  <?

	  $nome_operador = $_POST['nome_operador'];




	  ?>

      Per&iacute;odo de <? echo "$data_inicial até $data_final onde a resposta é Sim ";?><br>

<table width="100%"  border="0">

              <tr>

                <td width="35%" valign="middle"><div align="right"></div></td>

				<td width="38%" valign="middle">&nbsp;</td>
				<td width="27%">&nbsp;</td>

              </tr>

</table>            

      <?

if($resposta=="resposta1"){
$sql = "SELECT * FROM propostas where data_proposta between '$data_inicial'and '$data_final' and resposta1 = 'Sim' order by num_proposta asc";
}

if($resposta=="resposta2"){
$sql = "SELECT * FROM propostas where data_proposta between '$data_inicial'and '$data_final' and resposta2 = 'Sim' order by num_proposta asc";
}

if($resposta=="resposta3"){
$sql = "SELECT * FROM propostas where data_proposta between '$data_inicial'and '$data_final' and resposta3 = 'Sim' order by num_proposta asc";
}


$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$comissao_op = $linha[101];

$tabela = $linha[109];

$valor_total = $linha[113];

$valor_liquido_cliente = $linha[115];

$meta = $linha[171];


?>

      <table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td><div align="center" class="style3">N&ordm; Proposta </div></td>

          <td><div align="center" class="style3">Valor Solicitado </div></td>

          <td><div align="center" class="style3">Valor liq cliente </div></td>

          <td><div align="center"><span class="style3">Valor Total </span></div></td>

          <td><div align="center"><span class="style3">Tabela</span></div></td>

          <td><div align="center" class="style3">Cliente</div></td>

          <td><div align="center" class="style3">CPF</div></td>

          <td width="2%"><div align="center" class="style3">Prazo</div></td>

          <td width="5%"><div align="center" class="style3">R$ Parcelas </div></td>

          <td><div align="center" class="style3">Tipo de Proposta </div></td>

          <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>

          <td><div align="center" class="style3">Status</div></td>

          <td><div align="center" class="style3"> Meta </div></td>

          <td><div align="center" class="style3">Premia&ccedil;&atilde;o</div></td>
        </tr>

		

        <tr>

          <td width="6%">               <form name="form2" method="post" action="editar_proposta_por_num_proposta.php"><div align="center" class="style3">

              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

              

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

            <? printf("$linha[0]"); ?>                

          </div></form></td>

          <td width="8%"><div align="center" class="style3"><? printf("R$ $linha[25]");?> </div></td>

          <td width="7%"><div align="center"><span class="style3"><? echo "R$ ".$valor_liquido_cliente;?></span></div></td>

          <td width="7%"><div align="center"><span class="style3"><? echo $valor_total;?></span></div></td>

          <td width="7%"><div align="center"><span class="style3"><? echo $tabela;?></span></div></td>

          <td width="15%">

            <div align="center" class="style3"><? printf("$linha[4]");?> </div></td>

          <td width="9%"><div align="center" class="style3"><? printf("$linha[7]");?> </div></td>

          <td><div align="center" class="style3"><? printf("$linha[26]"); ?> </div></td>

          <td><div align="center" class="style3"><? printf("$linha[27]"); ?> </div></td>

          <td width="7%"><div align="center" class="style3"><? printf("$linha[83]"); ?> </div></td>

          <td width="8%"><div align="center" class="style3"><? printf("$linha[86]"); ?></div></td>

          <td width="8%"><div align="center" class="style3"><? printf("$linha[51]");?></div></td>

          <td width="4%"><div align="center" class="style3"><? echo "$meta%";?></div></td>

          <td width="7%"><div align="center" class="style3"><? echo "R$ ".$comissao_op;?></div></td>

          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

<? } ?>
        <tr>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>
</table>



<p>&nbsp;</p>







</body>

</html>

