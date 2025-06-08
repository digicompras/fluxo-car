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

//$data_pagto_cliente = $_POST['data_pagto_cliente'];

$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];






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

      <form action="menu.php" method="post" name="form1" target="navegacao">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "pagtos ao cliente"; ?>">
        <input type="hidden" name="comissao" id="comissao">

        <input type="submit" name="Submit2" value="Voltar">

</form>

<table width="100%"  border="0">
        <tr>
          <td colspan="6">&nbsp;</td>
        </tr>
        <tr>
          <td width="8%">&nbsp;</td>
          <td width="14%"><div align="center">Total 
            
            
            
            
            
            Spread </div></td>
          <td width="18%"><div align="center"> <strong>
              <?


$sql = "select sum(retorno) as total from propostas where dia_pagto_cliente between '$dia_inicial'and '$dia_final' and mes_pagto_cliente between '$mes_inicial'and '$mes_final' and ano_pagto_cliente between '$ano_inicial'and '$ano_final' and status_pagto_cliente = 'Pago_ao_cliente' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>
          </strong> </div></td>
          <td width="24%"><div align="right">Total L&iacute;quido de Opera&ccedil;&otilde;es </div></td>
          <td width="22%"><div align="center"><strong>
              <?


$sql = "select sum(valor_credito) as total from propostas where dia_pagto_cliente between '$dia_inicial'and '$dia_final' and mes_pagto_cliente between '$mes_inicial'and '$mes_final' and ano_pagto_cliente between '$ano_inicial'and '$ano_final' and status_pagto_cliente = 'Pago_ao_cliente' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>
          </strong> </div></td>
          <td width="14%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="center">Total Premia&ccedil;&atilde;o </div></td>
          <td><div align="center"> <strong>
              <?


$sql = "select sum(comissao_op) as total from propostas where dia_pagto_cliente between '$dia_inicial'and '$dia_final' and mes_pagto_cliente between '$mes_inicial'and '$mes_final' and ano_pagto_cliente between '$ano_inicial'and '$ano_final' and status_pagto_cliente = 'Pago_ao_cliente' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>
          </strong> </div></td>
          <td><div align="right">Valor bruto de opera&ccedil;&atilde;o </div></td>
          <td class="style4"><div align="center"><strong> <strong>
              <?


$sql = "select sum(valor_total) as total from propostas where dia_pagto_cliente between '$dia_inicial'and '$dia_final' and mes_pagto_cliente between '$mes_inicial'and '$mes_final' and ano_pagto_cliente between '$ano_inicial'and '$ano_final' and status_pagto_cliente = 'Pago_ao_cliente' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>
          </strong> </strong> </div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>Comiss&atilde;o Empresa </td>
          <td><div align="center"><strong>
              <?


$sql = "select sum(valor_a_receber) as total from propostas where dia_pagto_cliente between '$dia_inicial'and '$dia_final' and mes_pagto_cliente between '$mes_inicial'and '$mes_final' and ano_pagto_cliente between '$ano_inicial'and '$ano_final' and status_pagto_cliente = 'Pago_ao_cliente' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>
          </strong></div></td>
          <td><div align="right">Valor liquido cliente </div></td>
          <td><div align="center"><strong>
              <?


$sql = "select sum(valor_liquido_cliente) as total from propostas where dia_pagto_cliente between '$dia_inicial'and '$dia_final' and mes_pagto_cliente between '$mes_inicial'and '$mes_final' and ano_pagto_cliente between '$ano_inicial'and '$ano_final' and status_pagto_cliente = 'Pago_ao_cliente' order by nome asc";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_liquido_cliente = $linha['total'];



echo "R$ ".$valor_liquido_cliente;

?>
          </strong></div></td>
          <td>&nbsp;</td>
        </tr>
      </table>
<br>

      <br>

<table width="100%"  border="0">

              <tr>

                <td>

</td>

              </tr>

</table>            

      <?

			

$sql = "SELECT * FROM propostas where dia_pagto_cliente between '$dia_inicial'and '$dia_final' and mes_pagto_cliente between '$mes_inicial'and '$mes_final' and ano_pagto_cliente between '$ano_inicial'and '$ano_final' and status_pagto_cliente = 'Pago_ao_cliente' order by nome asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nome_operador = $linha[1];



$nome = $linha[4];

$cpf = $linha[7];

$valor_credito = $linha[25];

$comissao_op = $linha[101];

$valor_total = $linha[113];



?>            

      <table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td><div align="center" class="style3">N&ordm; Proposta </div></td>

          <td><div align="center" class="style3">Cliente</div></td>

          <td><div align="center" class="style3">CPF</div></td>
          <td><div align="center" class="style3">Valor Liquido</div></td>
          <td><div align="center" class="style3">Valor Bruto </div></td>

          <td><div align="center" class="style3">Operador</div></td>
        </tr>

		

        <tr>

          <td width="8%">               <form name="form2" method="post" action="editar_proposta_por_num_proposta.php"><div align="center" class="style3">

              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

              

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

            <? printf("$linha[0]"); ?> </div></form></td>

          <td width="20%">

            <div align="center" class="style3"><? echo $nome;?></div></td>

          <td width="8%"><div align="center" class="style3"><span class="style3"><? echo $cpf;?></span></div></td>
          <td width="8%"><div align="center"><span class="style3"><? echo "R$ ".$valor_credito;?></span></div></td>
          <td width="8%"><div align="center" class="style3"><? echo "R$ ".$valor_total;?> </div></td>

          <td width="8%"><div align="center"><span class="style3"><? echo $nome_operador;?></span></div></td>

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

          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>
        <tr>

          <td><span class="style3">Total</span></td>

          <td>&nbsp;</td>

          <td>&nbsp;</td>
          <td><div align="center">
            <?

$sql = "select sum(valor_credito) as total_credito from propostas where dia_pagto_cliente between '$dia_inicial'and '$dia_final' and mes_pagto_cliente between '$mes_inicial'and '$mes_final' and ano_pagto_cliente between '$ano_inicial'and '$ano_final' and status_pagto_cliente = 'Pago_ao_cliente'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_credito = $linha['total_credito'];



echo "R$ ".$valor_total_credito;

?>
          </div></td>
          <td><div align="center">

              <?

$sql = "select sum(valor_total) as total from propostas where dia_pagto_cliente between '$dia_inicial'and '$dia_final' and mes_pagto_cliente between '$mes_inicial'and '$mes_final' and ano_pagto_cliente between '$ano_inicial'and '$ano_final' and status_pagto_cliente = 'Pago_ao_cliente'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>

          </div></td>

          <td><div align="center"><span class="style3"></span></div></td>
</table>



<p>&nbsp;</p>







</body>

</html>

