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

<title>PRODU&Ccedil;&Atilde;O DI&Aacute;RIA - ALLCRED FINANCEIRA</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style4 {font-size: 18px}

.style5 {font-size: 24px}

.style7 {

	font-size: 9px;

	font-weight: bold;

}

.style13 {font-size: 14px}

.style14 {font-size: 14px; font-weight: bold; }
.style3 {font-size: 10px}
.style51 {font-size: 15px;
	font-weight: bold;
}

-->

</style>
</head>

<?



require '../../conect/conect.php';







$dia = date('d');

$mes = date('m');

$ano = date('Y');

$hora = date('H:i:s');





$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];

$date_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$date_final = "$ano_final-$mes_final-$dia_final";



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

<table width="100%" border="0">
        <tr>
          <td width="27%"><span class="style4"><strong>Total monetario de produtos  - <span class="style5"> <strong>
          <?



$sql = "select * from produtos";

$resultado=mysql_query($sql);

$registros_total = mysql_num_rows($resultado);



echo $registros_total;

?>
          </strong></span></strong></span></td>
          <td width="19%">&nbsp;</td>
          <td colspan="2"><span class="style4"><strong>Total Faturamento no periodo - <span class="style5"><strong>
          <?
  
  

$sql = "select sum(preco_compra) as total from produtos";



$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_faturamento = $linha['total'];

$valor_total_faturamento_formatado = number_format($valor_total_faturamento, 2, ",", ".");





echo "R$ ".$valor_total_faturamento_formatado;

?>
          </strong></span></strong></span></td>
          <td width="16%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td width="22%">&nbsp;</td>
          <td width="16%">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><p><strong>Verificando produ&ccedil;&atilde;o di&aacute;ria em </strong> <span class="style14"><? echo $dia."-".$mes."-".$ano ; ?></span><strong> hor&aacute;rio <span class="style13"><? echo $hora; ?></span></strong></p></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
</table>
<p class="style4">&nbsp;</p>
<table width="100%" border="0">
  <tr>
    <td width="15%" valign="top"><div align="center"><strong>N&ordm; Pedido</strong></div></td>
    <td width="19%" valign="top"><div align="center"><strong>Cliente</strong></div></td>
    <td width="6%" valign="top"><div align="center"><strong>Total Bruto</strong></div></td>
    <td width="11%" valign="top"><div align="center"><strong>Desconto adicional (Arredondamento)</strong></div></td>
    <td width="10%" valign="top"><div align="center"><strong>Total Liquido</strong></div></td>
    <td width="9%" valign="top"><div align="center"><strong>Total CMV/Produtos</strong></div></td>
    <td width="10%" valign="top"><div align="center"><strong>Custo com Cart&atilde;o</strong></div></td>
    <td width="10%" valign="top"><div align="center"><strong>MCL p/ custo fixo R$</strong></div></td>
    <td width="10%" valign="top"><div align="center"><strong>MCL p/ custo fixo %</strong></div></td>
  </tr>
  <?

$sql = "SELECT * FROM orcamentos where data_fatura between '$date_inicial'and '$date_final' and condicao = 'PEDIDO'";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo_orcamento = $linha[0];
	
$dataabertura = $linha[1];
$horaabertura = $linha[2];
$diaabertura = $linha[3];
$mesabertura = $linha[4];
$anoabertura = $linha[5];
$loja = $linha[6];
$total_geral = $linha[7];
$quantparc = $linha[8];
$modopagto = $linha[10];
$obs_orcamento = $linha[11];

$operador = $linha[12];
$condicao = $linha[16];
$status = $linha[17];
$num_fatura = $linha[18];
$status_fatura = $linha[19];
$data_fatura = $linha[20];
$dia_fatura = $linha[21];
$mes_fatura = $linha[22];
$ano_fatura = $linha[23];
$hora_fatura = $linha[24];

$codigo_cliente = $linha[25];
$cpf = $linha[26];
$nome = $linha[27];

$cartao = $linha[28];
$valorparcela = $linha[29];
	
$datafechamento = $linha[30];
$horafechamento = $linha[31];

$entrada = $linha[35];
$custo_com_cartao = $linha[36];

$desconto_de_arredondamento = $linha[37];
$acrescimo_de_arredondamento = $linha[38];

$num_orcamento_bloco = $linha[40];


$justificativa_gravada = $linha[41];
$admgeral_cancelou = $linha[42];
$estab_pertence_cancelou = $linha[43];
$date_cancelamento = $linha[44];
$hora_cancelamento = $linha[45];




?>
  <tr>
    <td bgcolor="#CCCCCC"><div align="center">
      <form action="../orcamentos/imprime_orcamento.php" method="post" name="form2" target="_blank">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
<input type="submit" name="button" id="button" value="<? echo $codigo_orcamento; ?>">
      </form>
    </div></td>
    <td bgcolor="#CCCCCC"><div align="center"><? echo $nome; ?></div></td>
    <td bgcolor="#CCCCCC"><div align="center"><span class="style51">
      <? $total_bruto = bcadd($total_geral,$desconto_de_arredondamento,2); echo $total_bruto; ?>
    </span></div></td>
    <td bgcolor="#CCCCCC"><div align="center"><? echo $desconto_de_arredondamento;?></div></td>
    <td bgcolor="#CCCCCC"><div align="center"><span class="style51"><? echo $total_geral; ?></span></div></td>
    <td bgcolor="#CCCCCC"><div align="center">
      <?
    
$sql2 = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$resultado2=mysql_query($sql2, $conexao);

$linha=mysql_fetch_array($resultado2);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];

echo $totalizacao_cmv_dos_produtos;

?>
    </div></td>
    <td bgcolor="#CCCCCC"><div align="center"><? echo $custo_com_cartao; ?></div></td>
    <td bgcolor="#CCCCCC"><div align="center">
      <?

$saldo_etapa1 = bcsub($total_geral,$totalizacao_cmv_dos_produtos,2);

$saldo_etapa2 = bcsub($saldo_etapa1,$custo_com_cartao,2);

 echo "R$ $saldo_etapa2";
 
 
 
 
 
$sql = "select sum(valor) as totalizacao_custo_fixo from custo_fixo";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_custo_fixo = $linha['totalizacao_custo_fixo'];


$percentual_que_representa_para_cobrir_custo_fixo_etapa1 = bcdiv($saldo_etapa2,$total_custo_fixo,4);

$percentual_que_representa_para_cobrir_custo_fixo_etapa2 = bcmul($percentual_que_representa_para_cobrir_custo_fixo_etapa1,100,2);

//echo " $percentual_que_representa_para_cobrir_custo_fixo_etapa2%";

?>
    </div></td>
    <td bgcolor="#CCCCCC"><div align="center">
      <?

$saldo_etapa1 = bcsub($total_geral,$totalizacao_cmv_dos_produtos,2);

$saldo_etapa2 = bcsub($saldo_etapa1,$custo_com_cartao,2);

 //echo "R$ $saldo_etapa2";
 
 
 
 
 
$sql = "select sum(valor) as totalizacao_custo_fixo from custo_fixo";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_custo_fixo = $linha['totalizacao_custo_fixo'];


$percentual_que_representa_para_cobrir_custo_fixo_etapa1 = bcdiv($saldo_etapa2,$total_custo_fixo,4);

$percentual_que_representa_para_cobrir_custo_fixo_etapa2 = bcmul($percentual_que_representa_para_cobrir_custo_fixo_etapa1,100,2);

echo " $percentual_que_representa_para_cobrir_custo_fixo_etapa2%";

?>
    </div></td>
  </tr>
<? } ?>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p></p>
      <p>
<p>&nbsp;</p>
<p align="center">

<?

$sql = "SELECT * FROM cad_empresa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$endereco = $linha[5];

$numero = $linha[6];

$bairro = $linha[7];

$cep = $linha[9];

$cidade = $linha[10];

$estado = $linha[11];

$telefone = $linha[12];

$fax = $linha[13];

$email_empresa = $linha[14];

$site = $linha[15];



}



?>

<br>

<span class="style4"><strong><? echo $site; ?></strong></span>

<br>

<? echo $endereco; ?>

,

<? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?>

<br>

<? echo "Telefone / Fax: ". $telefone." "; ?>

/ <? echo $fax; ?>

<br>

<? echo "E-Mail: ". $email_empresa; ?>

</p>

<p align="center"><span class="style7">

  <? echo $meta_inss; ?>

</span><span class="style4"><strong><span class="style5"><strong>

</strong></span></strong></span> </p>

</body>

</html>

