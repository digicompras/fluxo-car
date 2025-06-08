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

$sql = "SELECT * FROM orcamentos_for where codigo_orcamento = '$codigo_orcamento'";
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
    <td width="75%"><div align="center"><strong><font color="#0000FF" size="2"><? echo $condicao; ?> </font></strong><strong>N&ordm; <font color="#0000FF" size="2"><? echo $codigo_orcamento; ?></font></strong></div></td>
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
          <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $nfantasia; ?>">
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
    <td class="style3"><div align="center">Categoria</div></td>
    <td class="style3"><div align="center">Estoque</div></td>
    <td class="style3"><div align="center">Quant</div></td>
    <td class="style3"><div align="center">Pre&ccedil;o Compra</div></td>
    <td><div align="center" class="style3">Desconto Monetario</div></td>
    <td><div align="center"><span class="style3">Total Produto</span></div></td>
    </tr>
  <?
			  
//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and num_bordero = '' and prazo_final between '$data_inicio_busca' and '$data_atual' order by num_proposta asc";

$sql = "SELECT * FROM produtos_em_orcamento_for where codigo_orcamento = '$codigo_orcamento'";

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


$sql2 = "SELECT * FROM produtos where codigo = '$codigoproduto'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$quant_estoque = $linha[16];


$preco = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$preco_compra = $linha[21];
$frete = $linha[22];
$margem_lucro = $linha[23];
$impostos = $linha[24];
$margem_lucro_informada = $linha[25];
$impostos_informado = $linha[26];
$fornecedor = $linha[28];


$margem_folga = $linha[32];
$margem_folga_decimal = $linha[33];

}

?>
  <tr>
    <td width="5%"><div align="center" class="style3">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <? echo $codigoproduto;?></div></td>
    <td width="12%" class="style3"><div align="center"><? echo $nomeproduto;?></div></td>
    <td width="6%" class="style3"><div align="center"><? echo $categoria;?></div></td>
    <td width="6%" class="style3"><div align="center"><? echo $quant_estoque;?></div></td>
    <td width="3%" class="style3"><div align="center"><? echo $quant;?></div></td>
    <td width="7%" class="style3"><div align="center"><? echo $precocompra;
	
$total_produtos_comprados = bcmul($precocompra,$quant,2);
	
	 ?></div></td>
    <td width="9%"><div align="center" class="style3">
      <?
				
				$subtotaldedescontos = bcadd($descontomonetarioetapa1,$descontomonetarioetapa2,2);
				$descontosconcedidos = bcadd($descontomonetarioetapa3,$subtotaldedescontos,2);
				 echo $descontosconcedidos;
				 
				 
				 
				 ?>
    </div></td>
    <td width="9%"><div align="center"><span class="style3"><? 
	
if($oferta=="Sim"){
	
$sub_totalprodutos = bcmul($quant,$preco_compra,2);

$totalprodutos = bcsub($sub_totalprodutos,$descontosconcedidos,2);
	
}
else{
	
$sub_totalprodutos = bcmul($quant,$preco_compra,2);

$totalprodutos = bcsub($sub_totalprodutos,$descontosconcedidos,2);
	
	
}
	
	
echo $totalprodutos;
	
	
	?></span></div></td>
    </tr>
  <? } ?>
  <tr>
    <td><span class="style3"></span></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td class="style3"><div align="center"></div></td>
    <td><div align="center"><span class="style3"></span></div></td>
    <td><div align="center"></div></td>
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
<p align="center"></p>
<p></p>
</body>
</html>
