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
.style5 {font-size: 9px}
.style6 {font-size: 9px; font-weight: bold; }
.style7 {font-size: 14px}

-->

</style>
</head>

<?



require '../../conect/conect.php';





	  

$nome_operador = $_POST['nome_operador'];

$mes_ano = $_POST['mes_ano'];

$campanha_filtro = $_POST['campanha'];





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

      <form name="form1" method="post" action="relatorio_de_producao_periodico_por_operador_sintetico_novo.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <span class="style7 style13">

        <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">

        <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">

        <input name="ano_inicial" type="hidden" id="dia_inicial3" value="<? echo $ano_inicial; ?>">

        <input name="dia_final" type="hidden" id="dia_inicial4" value="<? echo $dia_final; ?>">

        <input name="mes_final" type="hidden" id="dia_final" value="<? echo $mes_final; ?>">

        <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">

        </span>        

        <input type="submit" name="Submit2" value="Voltar ao sint&eacute;tico">

</form>

      <table width="100%"  border="0">

        <tr>

          <td colspan="6"><div align="left"><span class="style2">

            <?

$nome_operador = $_POST['nome_operador'];

			

$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$nome_operador = $linha[1];







?>

          Listando todas as propostas do operador:</span> <span class="style2"><? echo $nome_operador; ?>

          <? } ?>

          </span></div></td>

        </tr>

        <tr>

          <td colspan="6">&nbsp;</td>

        </tr>

        <tr>

          <td width="8%">&nbsp;</td>

          <td width="14%"><div align="center">Total 

  



   Spread

  

        </div></td>

          <td width="18%"><div align="center">

            <strong>

            <?

if($campanha_filtro=="selecione"){

$sql = "select sum(retorno) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' order by nome asc";

}

else{

$sql = "select sum(retorno) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' and tabela = '$campanha_filtro' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>

            </strong>          </div></td>

          <td width="24%"><div align="right">Total L&iacute;quido de Opera&ccedil;&otilde;es </div></td>

          <td width="22%">

            <div align="center"><strong>

            <?

if($campanha_filtro=="selecione"){

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' order by nome asc";

}

else{

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' and tabela = '$campanha_filtro' order by nome asc";

}

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

          <td><div align="center">

            <strong>

            <?

if($campanha_filtro=="selecione"){

$sql = "select sum(comissao_op) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' order by nome asc";

}

else{

$sql = "select sum(comissao_op) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' and tabela = '$campanha_filtro' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>

</strong>          </div></td>

          <td><div align="right">Valor bruto de opera&ccedil;&atilde;o </div></td>

          <td class="style4">            <div align="center"><strong>

          <strong>

          <?

if($campanha_filtro=="selecione"){

$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' order by nome asc";

}

else{

$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' and tabela = '$campanha_filtro' order by nome asc";

}

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

if($campanha_filtro=="selecione"){

$sql = "select sum(valor_a_receber) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' order by nome asc";

}

else{

$sql = "select sum(valor_a_receber) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' and tabela = '$campanha_filtro' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>

</strong></div></td>

          <td><div align="right">Valor liquido cliente </div></td>

          <td><div align="center"><strong>

            <?

if($campanha_filtro=="selecione"){

$sql = "select sum(valor_liquido_cliente) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' order by nome asc";

}

else{

$sql = "select sum(valor_liquido_cliente) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' and tabela = '$campanha_filtro' order by nome asc";

}

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

	  <?

	  $nome_operador = $_POST['nome_operador'];

$data_inicial = $_POST['data_inicial'];

$data_final = $_POST['data_final'];



	  ?>

      Per&iacute;odo de <? echo $mes_ano;?><br>

<table width="100%"  border="0">

              <tr>

                <td width="26%" valign="middle"><div align="right"><strong>Selecione a campanha que deseja filtrar</strong></div></td>

				<td width="34%" valign="middle"><form name="form3" method="post" action="relatorio_de_producao_periodico_por_operador_novo.php">

				  <strong><font color="#0000FF">

				  <select name="campanha" id="campanha">

                    <option selected>selecione</option>

                    <?





    $sql = "select * from campanhas order by campanha asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['campanha']."</option>";

    }

?>

                  </select>

			    </font></strong>

				  <input type="submit" name="Submit" value="Filtrar">

                  <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">

                  <span class="style7 style13">

                  <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">

                  <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">

                  <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">

                  <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">

                  <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">

                  <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">

                  </span>                  </form></td>

				<td width="40%">&nbsp;</td>

  </tr>

</table>            

      <?



if($campanha_filtro=="selecione"){

$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' order by bco_operacao,nome asc";



}

else{

		



$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' and tabela = '$campanha_filtro' order by bco_operacao,nome asc";



}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$num_proposta = $linha[0];

$nome_operador = $linha[1];

$valor_credito = $linha[25];


$bco_operacao = $linha[86];



$valor_a_receber = $linha[87];

$comissao_op = $linha[101];

$tabela = $linha[109];

$valor_total = $linha[113];

$valor_liquido_cliente = $linha[115];



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

          <td width="4%"><div align="center" class="style3">R$ Parcelas </div></td>

          <td><div align="center" class="style3">Tipo de Proposta </div></td>

          <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>

          <td><div align="center" class="style3">Status</div></td>

          <td><div align="center" class="style3"> Spread </div></td>

          <td><div align="center" class="style3">Premia&ccedil;&atilde;o</div></td>

          <td><div align="center"><span class="style5">Comiss&atilde;o Empresa</span></div></td>
        </tr>

		

        <tr>

          <td width="5%">               <form name="form2" method="post" action="altera_comissoes.php">
            <div align="center" class="style3">

              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

              

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
  <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">

            <input name="campanha" type="hidden" id="campanha" value="<? echo $campanha_filtro; ?>">
            <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
            <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
            <input name="ano_inicial" type="hidden" id="dia_inicial5" value="<? echo $ano_inicial; ?>">
            <input name="dia_final" type="hidden" id="dia_inicial6" value="<? echo $dia_final; ?>">
            <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
            <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
            <? echo $num_proposta;?>            </div>
          </form></td>

          <td width="7%"><div align="center" class="style3"><? echo "R$ ".$valor_credito;?></div></td>

          <td width="6%"><div align="center"><span class="style3"><? echo "R$ ".$valor_liquido_cliente;?></span></div></td>

          <td width="6%"><div align="center"><span class="style3"><? echo $valor_total;?></span></div></td>

          <td width="6%"><div align="center"><span class="style3"><? echo $tabela;?></span></div></td>

          <td width="14%">

          <div align="center" class="style3"><? printf("$linha[4]");?> </div></td>

          <td width="8%"><div align="center" class="style3"><? printf("$linha[7]");?> </div></td>

          <td><div align="center" class="style3"><? printf("$linha[26]"); ?> </div></td>

          <td><div align="center" class="style3"><? printf("$linha[27]"); ?> </div></td>

          <td width="6%"><div align="center" class="style3"><? printf("$linha[83]"); ?> </div></td>

          <td width="7%"><div align="center" class="style3"><? echo $bco_operacao;?></div></td>

          <td width="9%"><div align="center" class="style3"><? printf("$linha[51]");?></div></td>

          <td width="5%"><div align="center" class="style3"><? printf("$linha[85]");?></div></td>

          <td width="7%"><div align="center" class="style3"><? echo "R$ ".$comissao_op;?></div></td>

          <td width="8%"><div align="center"><span class="style3"><? echo "R$ ".$valor_a_receber;?></span></div></td>
          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>


<? } ?>
</table>



<p align="center">&nbsp;</p>
<table width="100%" border="1" align="center" cellspacing="0">
  <tr>
    <td width="28%" height="15"><div align="center"><strong><span class="style5">Banco de Opera&ccedil;&atilde;o</span></strong></div></td>
    <td width="14%"><div align="center" class="style6">Comiss&atilde;o da Empresa</div></td>
    <td width="17%"><div align="center" class="style6">Valor Total</div></td>
    <td width="22%"><div align="center"><strong><span class="style5"><span class="style6">Valor Solicitado</span></span></strong></div></td>
    <td width="19%"><div align="center" class="style6"><strong><span class="style5">Valor Liquido Client</span></strong>e</div></td>
  </tr>
  <?
  
//$dia_inicial = $_POST['dia_inicial'];

//$mes_inicial = $_POST['mes_inicial'];

//$ano_inicial = $_POST['ano_inicial'];



//$dia_final = $_POST['dia_final'];

//$mes_final = $_POST['mes_final'];

//$ano_final = $_POST['ano_final'];

  


$sql1 = "select * from bco_operacao order by banco asc";
$res1 = mysql_query($sql1);
while($linha=mysql_fetch_row($res1)) {

$banco_operacao = $linha[1];

?>
  <tr>
    <td><div align="center"><span class="style2 style2 style4"><strong><font color="#0000FF"><strong><? echo $banco_operacao; ?></strong></font></strong></span></div></td>
    <td><div align="center"><strong><font color="#0000FF"><strong>
      <?

if($campanha_filtro=="selecione"){

$sql2 = "select sum(valor_a_receber) as totalbanco from propostas where bco_operacao = '$banco_operacao' and nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE'";

}

else{

$sql2 = "select sum(valor_a_receber) as totalbanco from propostas where bco_operacao = '$banco_operacao' and nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' and tabela = '$campanha_filtro'";

}


$resultado2=mysql_query($sql2, $conexao);

$linha=mysql_fetch_array($resultado2);



$total_producao = $linha['totalbanco'];


echo "R$ ".$total_producao;

?>
    </strong></font></strong></div></td>
    <td><div align="center" class="style7"><strong><font color="#0000FF"><strong><?

if($campanha_filtro=="selecione"){

$sql3 = "select sum(valor_total) as totalbanco from propostas where bco_operacao = '$banco_operacao' and nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE'";

}

else{

$sql3 = "select sum(valor_total) as totalbanco from propostas where bco_operacao = '$banco_operacao' and nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' and tabela = '$campanha_filtro'";

}


$resultado3=mysql_query($sql3, $conexao);

$linha=mysql_fetch_array($resultado3);



$total_producao = $linha['totalbanco'];


echo "R$ ".$total_producao;

?>
    </strong></font></strong></div></td>
    <td><div align="center" class="style7"><strong><font color="#0000FF"><strong><?

if($campanha_filtro=="selecione"){

$sql4 = "select sum(valor_credito) as totalbanco from propostas where bco_operacao = '$banco_operacao' and nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE'";

}

else{

$sql4 = "select sum(valor_credito) as totalbanco from propostas where bco_operacao = '$banco_operacao' and nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' and tabela = '$campanha_filtro'";

}


$resultado4=mysql_query($sql4, $conexao);

$linha=mysql_fetch_array($resultado4);



$total_producao = $linha['totalbanco'];


echo "R$ ".$total_producao;

?>
    </strong></font></strong></div></td>
    <td><div align="center" class="style7"><strong><font color="#0000FF"><strong><?

if($campanha_filtro=="selecione"){

$sql5 = "select sum(valor_liquido_cliente) as totalbanco from propostas where bco_operacao = '$banco_operacao' and nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE'";

}

else{

$sql5 = "select sum(valor_liquido_cliente) as totalbanco from propostas where bco_operacao = '$banco_operacao' and nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CLIENTE' and tabela = '$campanha_filtro'";

}


$resultado5=mysql_query($sql5, $conexao);

$linha=mysql_fetch_array($resultado5);



$total_producao = $linha['totalbanco'];


echo "R$ ".$total_producao;

?>
    </strong></font></strong></div></td>
  </tr>
  <?
}
?>
</table>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
      </body>

</html>

