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
<title>EMISS&Atilde;O DE OR&Ccedil;AMENTOS DE CLIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.style3 {font-size: 10px}
.style31 {font-size: 12px}
.style5 {font-size: 15px;
	font-weight: bold;
}
</style>
</head>
<?

require '../../conect/conect.php';

$codigo_orcamento = $_POST['codigo_orcamento'];

			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("ffffff"); ?>"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 
  
<? } ?>



<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>

  <?

$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento'";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
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


}


if($status == "CANCELADO"){


echo "<script>

alert('ATENÇÃO!!!... ESSE PEDIDO FOI CANCELADO POR $admgeral_cancelou da empresa $estab_pertence_cancelou em $date_cancelamento as $hora_cancelamento');


</script>";


}


?>
  <p>
  <?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];
$celular_op = $linha[19];
$email_op = $linha[20];
$estabelecimento_op = $linha[24];
$cidade_estabelecimento_op = $linha[25];
$tel_estabelecimento_op = $linha[26];
$email_estabelecimento_op = $linha[27];
$estab_pertence_op = $linha[44];
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];

}
?>
<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$razaosocial = $linha[1];
$nfantasia = $linha[2];
$endereco = $linha[5];
$numero = $linha[6];
$bairro = $linha[7];
$cep = $linha[9];
$cidade = $linha[10];
$estado = $linha[11];
$telefone = $linha[12];
$email_empresa = $linha[14];
$site = $linha[15];

}
?>
</p>
<form name="form1" method="post" action="grava_orcamento.php">
<p>&nbsp;</p>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">
      <table width="100%" border="0" bordercolor="#000000">
        <tr>
          <td width="7%">
              <div align="left">
                <?


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

//printf("<a href='index.php' target='_top'><img src='../../imagens/$linha[1]' border='0'  width='250' ></a>"); 
} ?>
                </div></td>
          <td width="93%"><div align="center"><strong><font size="2"><? echo $razaosocial; ?> - <? echo $nfantasia; ?><br>
            END: <? echo $endereco; ?> n&ordm; <? echo $numero; ?>, bairro <? echo $bairro; ?>, em <? echo $cidade; ?> estado de <? echo $estado; ?><br>
            <br>
          </font></strong></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
<table width="100%" border="1" bordercolor="#000000">
  <tr>
    <td width="75%"><div align="center"><strong><font color="#0000FF" size="2"><? echo $condicao; ?> </font></strong><strong>N&ordm; <font color="#0000FF" size="2"><? echo $codigo_orcamento; ?></font></strong><span class="style5"> Coprrespondente ao bloco N&ordm; <strong><? echo $num_orcamento_bloco; ?></strong></span></div></td>
    <td width="25%"><div align="center"><span class="style5">Total
      <? echo "R$ ".$total_geral; ?> </span></div></td>
  </tr>
</table>
<table width="100%" border="1" bordercolor="#000000">
  <tr>
    <td><table width="100%" border="0" cellspacing="4">
      
      <tr>
        <td width="4%"><strong><font size="2">C&oacute;digo:</font></strong></td>
        <td width="43%"><strong><font color="#0000FF" size="2"><? echo $codigo_cliente; ?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
        </font></strong></td>
        <td width="9%"><strong><font size="2">Data Or&ccedil;amento:</font></strong></td>
        <td width="19%"><strong><font color="#0000FF" size="2"><? echo $dataabertura; ?> - <? echo $horaabertura; ?></font></strong></td>
        <td width="25%" rowspan="3" align="center" valign="top"><table width="100%" border="0">
          <tr>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><strong><font size="2">Nome:</font></strong></td>
        <td><strong><font color="#0000FF" size="2"><? echo $nome; ?>
          <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
          </font></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      </table></td>
</tr>
</table>
<table width="100%"  border="0">
  <tr bgcolor="#ffffff">
    <td><div align="center" class="style3">Codigo Produto</div></td>
    <td class="style3"><div align="center">Nome Produto</div></td>
    <td class="style3"><div align="center">Quant</div></td>
    <td class="style3"><div align="center">Categoria</div></td>
    <td class="style3"><div align="center">Pre&ccedil;o Compra</div></td>
    <td><div align="center" class="style3">MC</div></td>
    <td><div align="center" class="style3">Pre&ccedil;o Venda</div></td>
    <td class="style3"><div align="center">Oferta</div></td>
    <td class="style3"><div align="center">Pre&ccedil;o Oferta</div></td>
    <td><div align="center" class="style3">Impostos</div></td>
    <td><div align="center" class="style3">Desconto Monetario</div></td>
    <td><div align="center"><span class="style3">Total Produto</span></div></td>
    <td><div align="center" class="style3">Ganho p/ produto</div></td>
  </tr>
  <?
			  
//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and num_bordero = '' and prazo_final between '$data_inicio_busca' and '$data_atual' order by num_proposta asc";

$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$precocompra = $linha[20];
$quant = $linha[21];
$preco = $linha[22];


$acrescimo = $linha[23];
$acrescimodecimal = $linha[24];
$acrescimomonetario = $linha[25];
$total = $linha[29];

$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];


$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];

$oferta = $linha[91];
$preco_oferta = $linha[92];

$margem_lucro = $linha[96];
$margem_lucro_informada = $linha[97];
$impostos = $linha[98];
$impostos_informado = $linha[99];
$margem_folga = $linha[100];
$margem_folga_decimal = $linha[101];

$impostos_compra = $linha[102];
$impostos_compra_decimal = $linha[103];
$impostos_compra_decimal2 = $linha[104];




?>

<?

$total_produtos_comprados = bcmul($precocompra,$quant,2);


if($oferta=="Sim"){
	
$sub_totalprodutos = bcmul($quant,$preco_oferta,2);

$totalprodutos = bcsub($sub_totalprodutos,$descontosconcedidos,2);
	
}
else{
	
$sub_totalprodutos = bcmul($quant,$preco,2);

$totalprodutos = bcsub($sub_totalprodutos,$descontosconcedidos,2);
	
	
}





$subtotaldedescontos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);
$descontosconcedidos = bcadd($descontomonetarioetapa3,$subtotaldedescontos,2);


$impostos_informado_decimal = bcdiv($impostos_informado,100,4);

$calculando_impostos = 	bcmul($totalprodutos,$impostos_informado_decimal,2);



$sub_calculando_ganho_real = bcsub($totalprodutos,$calculando_impostos,2);

$sub_calculando_ganho_real_2 = bcsub($sub_calculando_ganho_real,0,2);

$sub_calculando_ganho_real_3 = bcsub($sub_calculando_ganho_real_2,$precocompra,2);
	
	
$ganho_real = $sub_calculando_ganho_real_3;


?>
  <tr>
    <td width="5%"><div align="center" class="style3">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <? echo $codigoproduto;?></div></td>
    <td width="12%" class="style3"><div align="center"><? echo $nomeproduto;?></div></td>
    <td width="6%" class="style3"><div align="center"><? echo $quant;?></div></td>
    <td width="6%" class="style3"><div align="center"><? echo $categoria;?></div></td>
    <td width="7%" class="style3"><div align="center"><? echo $precocompra; ?></div></td>
    <td width="3%" class="style3"><div align="center"><? echo $margem_lucro_informada; ?></div></td>
    <td width="6%"><div align="center"><span class="style3"><? echo $preco; ?></span></div></td>
    <td width="6%" class="style3"><div align="center"><? echo $oferta; ?></div></td>
    <td width="4%" class="style3"><div align="center"><? echo $preco_oferta; ?></div></td>
    <td width="6%"><div align="center" class="style3"><? echo "$impostos_informado% / $calculando_impostos"; 
	 
?></div></td>
    <td width="9%"><div align="center" class="style3">
      <? echo $descontosconcedidos; ?>
    </div></td>
    <td width="9%"><div align="center"><span class="style3"><? echo $totalprodutos; ?></span></div></td>
    <td width="18%" class="style3"><div align="center"> <strong><font color="#0000FF"> </font></strong>
      <? echo $ganho_real; ?>
    </div></td>
  </tr>
  <? } ?>
  <tr>
    <td><span class="style3"></span></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td><div align="center"><span class="style3"></span></div></td>
    <td><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td><span class="style3"></span></td>
    <td><span class="style3"></span></td>
    <td><div align="center"></div></td>
    <td><span class="style3"></span></td>
</table>
<br>
<table width="100%" border="1" bordercolor="#000000">
  <tr>
    <td width="12%"><strong>Condi&ccedil;&otilde;es de Pagto escolhida foi: Entrada de <font color="#0000FF"><strong><? echo $entrada; ?></strong></font> e o restante em <font color="#0000FF"><strong><? echo $quantparc; ?></strong></font> vez(es) de<font color="#0000FF"><strong> <? echo "R$ $valorparcela"; ?></strong></font> modo de pagto: <font color="#0000FF"><strong><? echo $modopagto; ?></strong></font> <font color="#0000FF"><strong>
    <?  if(($modopagto == "CARTAO DE CREDITO") or ($modopagto == "CARTAO DE DEBITO")) {

echo "- $cartao";

} ?>
    </strong>
          <input name="operador" type="hidden" id="operador3" value="<? echo $nome_op; ?>">
          <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
          <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
          <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estabelecimento_op; ?>">
          <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento2" value="<? echo $cidade_estabelecimento_op; ?>">
          <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estabelecimento_op; ?>">
          <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estabelecimento_op; ?>">
    </font></strong></td>
    </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><div align="center" class="style31">
      <p><font size="4"><strong>Observa&ccedil;&otilde;es</strong></font><br>
        <strong><font color="#0000FF"><strong><font size="3"><? echo $obs_orcamento;  ?></font></strong></font></strong></p>
    </div></td>
  </tr>
</table>
<p align="center"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>

  <span class="style5">
  <strong>
  <?

if($status == "CANCELADO"){
	
echo "JUSTIFICATIVA: $justificativa_gravada<br><br>

ATENÇÃO!!!... ESSE PEDIDO FOI CANCELADO POR $admgeral_cancelou da empresa $estab_pertence_cancelou em $date_cancelamento as $hora_cancelamento";	
	
}

?></strong></span></form>
<table width="100%" border="0" align="center">
  <tr>
    <td colspan="10"><div align="center">CMV (Custo de Mercadoria Vendida)</div></td>
  </tr>
  <tr>
    <td width="4%"><div align="center">Codigo</div></td>
    <td width="14%"><div align="center">Produto</div></td>
    <td width="4%"><div align="center">Quant</div></td>
    <td width="13%"><div align="center"># Normal p/ Oferta</div></td>
    <td width="6%"><div align="center">Impostos V</div></td>
    <td width="11%"><div align="center">Desconto Monetario</div></td>
    <td width="10%"><div align="center">Fornecedor</div></td>
    <td width="11%"><div align="center">Total CMV/Produto</div></td>
    <td width="9%"><div align="center">Saldo</div></td>
    <td width="18%"><div align="center">MCL</div></td>
  </tr>
  <?
			  
//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and num_bordero = '' and prazo_final between '$data_inicio_busca' and '$data_atual' order by num_proposta asc";

$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigolancamento = $linha[0];

$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$precocompra = $linha[20];
$quant = $linha[21];


$acrescimo = $linha[23];
$acrescimodecimal = $linha[24];
$acrescimomonetario = $linha[25];
$total_produto = $linha[29];

$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];


$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];

$total_impostos = $linha[87];

$preco_normal = $linha[90];
$oferta = $linha[91];
$preco_oferta = $linha[92];


$impostos_compra = $linha[102];
$impostos_compra_decimal = $linha[103];

$total_impostos_compra = $linha[104];
$total_impostos_venda = $linha[105];

?>
<?

	if($oferta == "Sim"){
	$diferenca_normal_para_oferta = bcsub($preco_normal,$preco_oferta,2); 
	
	$diferenca_normal_para_oferta_vezes_quantidade = bcmul($diferenca_normal_para_oferta,$quant,2); 
	
	
	
	echo $diferenca_normal_para_oferta_vezes_quantidade;
	
	}
	else{
		
	$diferenca_normal_para_oferta_vezes_quantidade = "0.00"; 	
	
			}


?>

  <tr class="style3">
    <td><div align="center"><? echo $codigoproduto;?></div></td>
    <td><div align="center"><? echo $nomeproduto;?></div></td>
    <td><div align="center"><? echo $quant;?></div></td>
    <td><div align="center"><? 	echo $diferenca_normal_para_oferta_vezes_quantidade; ?>
    </div></td>
    <td><div align="center">
<? echo "$total_impostos"; ?>
</div></td>
    <td><div align="center">
<? echo $descontosconcedidos; ?>
</div></td>
    <td><div align="center"><? $totalfornecedor = bcmul($quant,$precocompra,2); echo $totalfornecedor; ?></div></td>
    <td><div align="center"><? 
	
$custo_cmv_etapa1 = bcadd($diferenca_normal_para_oferta_vezes_quantidade,$calculando_impostos,2);

$custo_cmv_etapa2 = bcadd($descontosconcedidos,$totalfornecedor,2);

$totalizacao_cmv = bcadd($custo_cmv_etapa1,$custo_cmv_etapa2,2);

echo $totalizacao_cmv;
	

$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `totalizacao_cmv` = '$totalizacao_cmv' where `produtos_em_orcamento`. `codigo` = '$codigolancamento'";
}

mysql_query($comando,$conexao);

	
	 ?></div></td>
    <td><div align="center">
      <? 
	
$saldo_liquido_produto = bcsub($total_produto,$totalizacao_cmv,2);


echo $saldo_liquido_produto;


$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento` set `saldo_liquido_produto` = '$saldo_liquido_produto' where `produtos_em_orcamento`. `codigo` = '$codigolancamento'";
}

mysql_query($comando,$conexao);

	
	
	 ?>
    </div></td>
    <td><div align="center"><? 
	
$mcl_etapa1 = bcdiv($saldo_liquido_produto,$total_produto,4);

$mcl_etapa2 = bcmul($mcl_etapa1,100,2);
	
	
echo "$mcl_etapa2%";
	
	 ?></div></td>
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
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="10"><div align="center">Apura&ccedil;&atilde;o  do <strong><font color="#0000FF" size="2"><? echo $condicao; ?></font></strong></div></td>
  </tr>
  <tr>
    <td colspan="10"><div align="center">
      <table width="100%" border="0">
        <tr>
          <td width="8%"><div align="center">Total Bruto</div></td>
          <td width="5%"><div align="center"><span class="style5"><? $total_bruto = bcadd($total_geral,$desconto_de_arredondamento,2); echo $total_bruto; ?></span></div></td>
          <td width="19%"><div align="center">Desconto adicional (Arredondamento)</div></td>
          <td width="2%"><div align="center"><? echo $desconto_de_arredondamento;?></div></td>
          <td width="13%"><div align="center">Total Liquido</div></td>
          <td width="12%"><div align="center"><span class="style5"><? echo $total_geral; ?></span></div></td>
          <td width="11%"><div align="center">Total CMV/Produtos</div></td>
          <td width="11%"><div align="center">
            <?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];

echo $totalizacao_cmv_dos_produtos;

?>
          </div></td>
          <td width="10%"><div align="center">Custo com Cart&atilde;o</div></td>
          <td width="9%"><div align="center"><? echo $custo_com_cartao; ?></div></td>
        </tr>
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
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center">MCL p/ custo fixo</div></td>
          <td><div align="center">
            <?

$saldo_etapa1 = bcsub($total_geral,$totalizacao_cmv_dos_produtos,2);

$saldo_etapa2 = bcsub($saldo_etapa1,$custo_com_cartao,2);

 echo $saldo_etapa2;
 
 
 
 
 
$sql = "select sum(valor) as totalizacao_custo_fixo from custo_fixo";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_custo_fixo = $linha['totalizacao_custo_fixo'];


$percentual_que_representa_para_cobrir_custo_fixo_etapa1 = bcdiv($saldo_etapa2,$total_custo_fixo,4);

$percentual_que_representa_para_cobrir_custo_fixo_etapa2 = bcmul($percentual_que_representa_para_cobrir_custo_fixo_etapa1,100,2);

echo " $percentual_que_representa_para_cobrir_custo_fixo_etapa2%";

?>
          </div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </div></td>
  </tr>
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
    <td><div align="center"></div></td>
  </tr>
</table>
<p align="center"></p>
<p></p>
</body>
</html>
