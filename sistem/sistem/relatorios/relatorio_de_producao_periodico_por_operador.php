<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
<html>
<head>
<title>LISTANDO TODOS OS PEDIDOS DO OPERADOR POR PERIODO</title>
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
.style5 {	font-size: 10px;

	font-weight: bold;
}
.style6 {
	font-size: 16px;
	font-weight: bold;
}
.style7 {font-size: 16px}
.style8 {
	color: #000000;
	font-weight: bold;
}
.style31 {
	font-size: 16px;
	font-weight: bold;
	}
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

$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$datafinal = "$ano_final-$mes_final-$dia_final";

$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$funcao = $linha[43];
$comissao_crua = $linha[51];

}

$comissao_decimal = bcdiv($comissao_crua,100,5);

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
      <form name="form1" method="post" action="../index.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                
        <input class='class01' type="submit" name="Submit2" value="Voltar">
</form>
      <table width="80%"  border="0" align="center">
        <tr>
          <td colspan="3"><div align="center" class="style31">
            <span class="style31">
          Listando todas os pedidos do operador: <? echo " $nome_operador"; ?>
          
          No periodo de <? echo " $dia_inicial-$mes_inicial-$ano_inicial ate $dia_final-$mes_final-$ano_final"; ?></span></div></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3"><div align="center"></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="center" class="style31">Total Produ&ccedil;&atilde;o</div></td>
          <td><div align="center" class="style31">Total Premia&ccedil;&atilde;o</div></td>
        </tr>
        <tr>
          <td width="3%">&nbsp;</td>
          <td width="14%"><div align="center" class="style31">
            <?

$sql = "select sum(total_geral) as total from orcamentos where condicao = 'PEDIDO' and dataabertura between '$datainicial'and '$datafinal' and status = 'Finalizado' order by codigo_orcamento desc";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$faturamento_total_do_periodo_do_operador = bcadd(0,$linha['total'],2);

echo "R$ ".$faturamento_total_do_periodo_do_operador;

?>
          </div></td>
          <td width="24%"><div align="center" class="style31"><strong>
            
          </strong><?
			  
	$premiacao_total = bcmul($faturamento_total_do_periodo_do_operador,$comissao_decimal,2);
			  echo "R$ $premiacao_total";
			  ?></div></td>
        </tr>
</table>
<br>
	  <br>
<?

$sql = "SELECT * FROM orcamentos where operador = '$nome_operador' and condicao = 'PEDIDO' and dataabertura between '$datainicial'and '$datafinal' and status = 'Finalizado' order by codigo_orcamento desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$codigo_orcamento = $linha[0];
$total_geral = $linha[7];

$cliente = $linha[27];
$modopagto = $linha[10];
$dataorcamento = $linha[1];



?>
      <table width="80%"  border="1" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#<? echo $cor ?>">
          <td><div align="center" class="style31"><strong>N&ordm; Pedido </strong></div></td>
          <td><div align="center" class="style31"><strong>Cliente</strong></div></td>
          <td><div align="center" class="style31"><strong>Data </strong></div></td>
          <td><div align="center" class="style31"><strong>Valor</strong></div></td>
          <td><div align="center" class="style31"><strong>Premia&ccedil;&atilde;o</strong></div></td>
        </tr>
		
        <tr>
          <td width="10%" rowspan="2" align="center" class="style31">
            <? echo "$codigo_orcamento"; ?>                
          </td>
          <td width="12%"><div align="center" class="style31"><? echo"$cliente"; ?> </div></td>
          <td width="11%"><div align="center"><span class="style31"><? echo "$dataorcamento";?></span></div></td>
          <td width="12%"><div align="center"><span class="style31"><? echo "R$ $total_geral";?></span></div></td>
          <td width="11%" rowspan="2"><div align="center" class="style31"><? 
	
	$comissao_do_pedido = bcmul($total_geral,$comissao_decimal,2);
	echo "R$ ".$comissao_do_pedido;?></div></td>
          

        <tr>
          <td colspan="3" align="center"><table width="100%"  border="1">
            <tr bgcolor="#ffffff">
              <td width="16%"><div align="center" class="style31"><strong>Cod Produto</strong></div></td>
              <td width="42%" class="style31"><div align="center"><strong>Nome Produto</strong></div></td>
              <td width="10%" class="style31"><div align="center"><strong>Pre&ccedil;o</strong></div></td>
              <td width="12%"><div align="center" class="style31"><strong>Quant</strong></div></td>
              <td width="20%"><div align="center"><strong><span class="style31">Total Produtos</span></strong></div></td>
            </tr>
            <?
			  
			  
$sql2 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' order by codigo asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco0 = $linha[22];

?>
            <tr>
              <td><div align="center" class="style31"><? echo $codigoproduto;?></div></td>
              <td class="style31"><div align="center"><? echo $nomeproduto;?></div></td>
              <td class="style31"><div align="center">
                <?
$valor_de_venda = $preco0;	
	
echo $valor_de_venda; 
	 
?>
              </div></td>
              <td><div align="center" class="style31"><? echo $quant;?></div></td>
              <td><div align="center"><span class="style31">
                <? $totaldoitem = bcmul($valor_de_venda,$quant,2); echo $totaldoitem;?>
              </span></div></td>
            </tr>
            <?  } ?>
          </table></td>
        <tr>
          <td align="center"><span class="style3"></span></td>
          <td align="center"><span class="style3"></span></td>
          <td align="center"><div align="center"></div></td>
          <td align="center"><div align="center"></div></td>
          <td align="center"><span class="style3"></span></td>
		  </tr><br><br>
		  <? } ?>
</table>

<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
</body>
</html>
