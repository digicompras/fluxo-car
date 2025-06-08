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

<title>LISTANDO TODAS AS PROPOSTAS PAGAS DO CORRESPONDENTE</title>

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
.style5 {color: #FF0000; font-weight: bold; }

-->

</style>

</head>

<?



require '../../conect/conect.php';



$nome_operador = $_POST['nome_operador'];

$dataalteracao = $_POST['dataalteracao'];

$status = $_POST['status'];

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

      <form name="form1" method="post" action="informe_correspondente_para_gerar_relatorio_mensal_ou_periodico.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <strong><font color="#0000FF">

        </font></strong>        

        <input type="submit" name="Submit2" value="Voltar">

</form>

      <table width="100%"  border="0">

        <tr>

          <td colspan="7"><div align="left" class="style2"> Listando todas as propostas pagas do corespondente <? echo $nome_operador; ?> no per&iacute;odo de <? echo "$dia_inicial-$mes_inicial-$ano_inicial"; ?> até <? echo "$dia_final-$mes_final-$ano_final"; ?></div></td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td width="14%"><div align="center"></div></td>
          <td width="14%"><div align="center"></div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" rowspan="5" valign="top"><div align="center">
            <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
              <tr>
                <td width="52%"><div align="center"><strong>Total Comiss&atilde;o</strong></div></td>
                <td width="48%"><div align="center"><strong>Total Estornos</strong></div></td>
              </tr>
              <tr>
                <td bgcolor="#CCCCCC"><div align="center" class="style2">
                    <?	

if($campanha_filtro=="selecione"){

$sql = "select sum(comissao_op) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' order by nome asc";

}

else{

$sql = "select sum(comissao_op) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' and campanha = '$campanha_filtro' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$total_comissao_op = $linha['total'];



echo "R$ ".$total_comissao_op;

?>
                </div></td>
                <td bgcolor="#CCCCCC"><div align="center" class="style5">
                    <?
//$sql = "select sum(valor) as total_estornos from estornos_parceiros where nome_operador = '$nome_operador' and datacadastro = '$dataalteracao' and status = 'A DEBITAR'";

if($campanha_filtro=="selecione"){

$sql = "select sum(valor) as total_estornos from estornos_parceiros where nome_operador = '$nome_operador' and dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final' and status = 'A DEBITAR' order by nome_operador asc";

}

else{

$sql = "select sum(valor) as total_estornos from estornos_parceiros where nome_operador = '$nome_operador' and dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final' and status = 'A DEBITAR' order by nome_operador asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$total_estornos_correspondente = $linha['total_estornos'];



echo "R$ ".$total_estornos_correspondente;

?>
                </div></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center"><strong>Saldo L&iacute;quido a receber</strong></div>
                    <div align="center"></div></td>
              </tr>
              <tr>
                <?
$subtotal = bcsub($total_comissao_op,$total_estornos_correspondente,2);
?>
                <td colspan="2" bgcolor="#CCCCCC"><div align="center" <? if($subtotal<0){echo "class='style5'"; } else{echo "class='style2'"; } ?> >
                    <?



echo "R$ ".$subtotal;

?>
                </div>
                    <div align="center"></div></td>
              </tr>
            </table>
          </div>            
          <div align="center"></div>
            <div align="center"></div>
          <div align="center"></div>            <div align="center"></div>
          <div align="center"></div>          <div align="center"></div>
          <div align="center"></div>          <div align="center"></div>
          <div align="center"></div>          <div align="center"></div></td>
          <td>&nbsp;</td>
          <td width="33%" rowspan="5" valign="top"><div align="center">
            <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
              
              <tr>
                <td width="55%"><div align="center"><strong>Total L&iacute;quido de Opera&ccedil;&otilde;es </strong></div></td>
                <td width="45%" bgcolor="#CCCCCC"><div align="center" class="style2">
                <?

if($campanha_filtro=="selecione"){

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' order by nome asc";

}

else{

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' and campanha = '$campanha_filtro' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?></div></td>
              </tr>
              <tr>
                <td><div align="center"><strong>Valor bruto de opera&ccedil;&atilde;o</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center" class="style2">
                <?

if($campanha_filtro=="selecione"){

$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' order by nome asc";

}

else{

$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' and campanha = '$campanha_filtro' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?></div></td>
              </tr>
              <tr>
                <td><div align="center"><strong>Valor liquido cliente</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center" class="style2">
                <?

if($campanha_filtro=="selecione"){

$sql = "select sum(valor_liquido_cliente) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' order by nome asc";

}

else{

$sql = "select sum(valor_liquido_cliente) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' and campanha = '$campanha_filtro' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_liquido_cliente = $linha['total'];



echo "R$ ".$valor_liquido_cliente;

?></div></td>
              </tr>
              <tr>
                <td><div align="center"><strong>Total Comiss&atilde;o Empresa</strong></div></td>
                <td bgcolor="#CCCCCC"><div align="center" class="style2">
                <?

if($campanha_filtro=="selecione"){

$sql = "select sum(valor_a_receber) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' order by nome asc";

}

else{

$sql = "select sum(valor_a_receber) as total from propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' and campanha = '$campanha_filtro' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?></div></td>
              </tr>
            </table>
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>

          <td width="7%"><div align="right"></div></td>

          <td width="5%">&nbsp;</td>
          <td width="1%">&nbsp;</td>

          <td width="26%">&nbsp;</td>
        </tr>
        <tr>
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
        </tr>
        <tr>

          <td>&nbsp;</td>

          <td>&nbsp;</td>
          <td>&nbsp;</td>

          <td>&nbsp;</td>
        </tr>
      </table>

<br>
<table width="100%"  border="0">
  <tr>
    <td width="35%" valign="middle"><div align="right"><strong>Selecione a campanha que deseja filtrar</strong></div></td>
    <td width="38%" valign="middle"><form name="form3" method="post" action="relatorio_de_propostas_pagas_ao_correspondente_por_periodo.php">
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
        </span>
    </form></td>
    <td width="27%">&nbsp;</td>
  </tr>
</table>
<table width="100%"  border="0">

              <tr>

                <td>

</td>

              </tr>

</table>            

      <?
if($campanha_filtro=="selecione"){

$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' order by nome asc";

}

else{

$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = 'PAGO AO CORRESPONDENTE' and campanha = '$campanha_filtro' order by nome asc";

}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$bco_operacao = $linha[86];	
$valor_a_receber = $linha[87];	


?>            

      <table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td><span class="style3">N&ordm; Proposta </span></td>

          <td><div align="center" class="style3">Status</div></td>

          <td><div align="center" class="style3">Data Pagto </div></td>

          <td><div align="center" class="style3">Comiss&atilde;o</div></td>

          <td><div align="center" class="style3">Comiss&atilde;o Empresa</div></td>
          <td><div align="center" class="style3">Cliente</div></td>

          <td><div align="center" class="style3">CPF</div></td>

          <td><div align="center" class="style3">Valor Contrato </div></td>

          <td width="4%"><div align="center" class="style3">Prazo</div></td>

          <td width="7%"><div align="center" class="style3">R$ Parcelas </div></td>

          <td><div align="center" class="style3">Banco Opera&ccedil;&atilde;o</div></td>

          <td><div align="center" class="style3">Tipo de Proposta </div></td>
        </tr>

		

        <tr>

          <td width="5%"><div align="center" class="style3">               <form name="form2" method="post" action="editar_proposta_por_num_proposta.php">

              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

              

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

            <? printf("$linha[0]"); ?>                

          </form></div></td>

          <td width="12%"><div align="center" class="style3"><? printf("$linha[51]");?></div></td>

          <td width="7%"><div align="center" class="style3"><? printf("$linha[42]");?></div></td>

          <td width="6%"><div align="center" class="style3 style3"><? printf("R$ $linha[101]");?></div></td>

          <td width="8%"><div align="center" class="style3"><span class="style3"><? echo $valor_a_receber; ?></span></div></td>
          <td width="16%"> <div align="center" class="style3"><? printf("$linha[4]");?>

         </div></td>

          <td width="7%"><div align="center" class="style3"><? printf("$linha[7]");?>

          </div></td>

          <td width="6%"><div align="center" class="style3"><? printf("R$ $linha[25]");?>

          </div></td>

          <td><div align="center" class="style3"><? printf("$linha[26]"); ?>

          </div></td>

          <td><div align="center" class="style3"><? printf("$linha[27]"); ?>

          </div></td>

          <td width="8%"><div align="center" class="style3"><? echo $bco_operacao; ?></div></td>

          <td width="14%"><div align="center" class="style3"><? printf("$linha[83]"); ?>

          </div></td>

		  

		  

		  <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

<? } ?>
</table>



<p>&nbsp;</p>







</body>

</html>

