<?php

/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em minutos */
session_cache_expire(600);
$cache_expire = session_cache_expire();

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");




?>
<?



require '../../conect/conect.php';
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];	
}

?>
<?

$num_fatura = $_POST['num_fatura'];

?>

<?

$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];

$setor = $linha[43];

$estab_pertence = $linha[44];

$ultimo_departamento_trabalhado = $linha[66];


}
?>

<?

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$razaosocial_empresa = $linha[1];

$nfantasia_empresa = $linha[2];

$cnpj_empresa = $linha[3];
$inscr_est_empresa = $linha[4];


$endereco_empresa = $linha[5];

$numero_empresa = $linha[6];

$bairro_empresa = $linha[7];

$cep_empresa = $linha[9];

$cidade_empresa = $linha[10];

$estado_empresa = $linha[11];

$telefone_empresa = $linha[12];

$fax_empresa = $linha[13];

$email_empresa = $linha[14];

$site_empresa = $linha[15];

}


?>

<?
$sql5 = "SELECT * FROM faturamento_futuro where num_fatura = '$num_fatura' order by num_fatura desc limit 1";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {
	
	
//$num_fatura = $linha[0];
$datefaturamento = $linha[1];
$dia_fatura = $linha[2];
$mes_fatura = $linha[3];
$ano_fatura = $linha[4];

$horafaturamento = $linha[5];

$loja = $linha[8];
$operador = $linha[9];
	
	$entrada = $linha[17];
	$modopagto = $linha[19];
	

$cliente_nfe = $linha[22];
$cpf_nfe = $linha[23];
	
$valor_recebido = $linha[25];
	$troco = $linha[26];
	
$cartao = $linha[27];
	$tipocartao = $linha[28];
	$valorcartao = $linha[29];
	$custo_com_cartao1 = $linha[30];
	
$cartao2 = $linha[31];
	$tipocartao2 = $linha[32];
	$valorcartao2 = $linha[33];
	$custo_com_cartao2 = $linha[34];
	
$cartao3 = $linha[35];
	$tipocartao3 = $linha[36];
	$valorcartao3 = $linha[37];
	$custo_com_cartao3 = $linha[38];
	
$cartao4 = $linha[39];
	$tipocartao4 = $linha[40];
	$valorcartao4 = $linha[41];
	$custo_com_cartao4 = $linha[42];

}

?>

<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<style type="text/css">
body,td,th {
	font-size: 18px;
	color: #000000;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<body>
<table width="80%" border="0" align="center" cellspacing="0">
  <tr>
    <td colspan="6"><div align="center"><? echo $nfantasia_empresa; ?> <br>
      <? echo $endereco_empresa; ?> , <? echo $numero_empresa; ?> - <? echo $bairro_empresa; ?> <br>
      <? echo $cep_empresa; ?> -<? echo $cidade_empresa; ?> - <? echo $estado_empresa; ?><br>
      <? echo "CNPJ $cnpj_empresa"; ?> / <? echo "Inscr. Est. $inscr_est_empresa"; ?><br>
      <? echo "Cliente: $cliente_nfe"; ?><br>
      <? echo "CPF: $cpf_nfe"; ?> <br>
      <br>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#F5F5F5">Modo de Pagto</td>
    <td bgcolor="#F5F5F5"><? echo $modopagto; ?></td>
    <td bgcolor="#F5F5F5">Entrada <? echo "R$ $entrada"; ?></td>
    <td bgcolor="#F5F5F5">Valor Recebido <? echo " R$ $valor_recebido"; ?></td>
    <td bgcolor="#F5F5F5">Troco <? echo " R$ $troco"; ?></td>
    <td bgcolor="#F5F5F5">&nbsp;</td>
  </tr>
  <tr>
    <td>Cartão 1</td>
    <td><? echo $cartao; ?></td>
    <td>Tipo do Cartão 1</td>
    <td><? echo $tipocartao; ?></td>
    <td>Valor do Cartão 1</td>
    <td><? echo "R$ $valorcartao"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#F5F5F5">Cartão 2</td>
    <td bgcolor="#F5F5F5"><? echo $cartao2; ?></td>
    <td bgcolor="#F5F5F5">Tipo do Cartão 2</td>
    <td bgcolor="#F5F5F5"><? echo $tipocartao2; ?></td>
    <td bgcolor="#F5F5F5">Valor do Cartão 2</td>
    <td bgcolor="#F5F5F5"><? echo "R$ $valorcartao2"; ?></td>
  </tr>
  <tr>
    <td>Cartão 3</td>
    <td><? echo $cartao3; ?></td>
    <td>Tipo do Cartão 3</td>
    <td><? echo $tipocartao3; ?></td>
    <td>Valor do Cartão 3</td>
    <td><? echo "R$ $valorcartao3"; ?></td>
  </tr>
  <tr>
    <td bgcolor="#F5F5F5">Cartão 4</td>
    <td bgcolor="#F5F5F5"><? echo $cartao4; ?></td>
    <td bgcolor="#F5F5F5">Tipo do Cartão 4</td>
    <td bgcolor="#F5F5F5"><? echo $tipocartao4; ?></td>
    <td bgcolor="#F5F5F5">Valor do Cartão 4</td>
    <td bgcolor="#F5F5F5"><? echo "R$ $valorcartao4"; ?></td>
  </tr>
  <tr>
    <td colspan="4" align="center" bgcolor="#A5A5A5"><strong>N&ordm; Cupon(Fatura) - <? echo $num_fatura; ?> - Em <? echo "$dia_fatura-$mes_fatura-$ano_fatura as $horafaturamento"; ?></strong></td>
    <td align="center" bgcolor="#139092"><strong>Total Geral</strong></td>
    <td align="center" bgcolor="#139092"><strong>
      <?
	$sql = "select sum(total) as total_liquido from produtos_em_orcamento where num_fatura = '$num_fatura'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_liquido_produtos = $linha['total_liquido'];
	
	echo "R$ $total_liquido_produtos";
	
	?>
    </strong></td>
  </tr>
  <tr>
    <td width="12%" bgcolor="#A5A5A5"><div align="left"><strong>Pedido</strong></div></td>
    <td width="11%" bgcolor="#A5A5A5"><div align="left"><strong>Cod</strong>.L</div></td>
    <td width="22%" bgcolor="#A5A5A5"><div align="left"><strong>Prod</strong></div></td>
    <td width="20%" bgcolor="#A5A5A5"><div align="left"><strong>Quant</strong></div></td>
    <td width="17%" bgcolor="#A5A5A5"><div align="left"><strong>R$ Unit</strong></div></td>
    <td width="18%" bgcolor="#A5A5A5"><div align="left"><strong>Total</strong></div></td>
  </tr>
  <?
            
$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura' order by codigo asc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco = $linha[22];


$acrescimo = $linha[23];
$acrescimodecimal = $linha[24];
$acrescimomonetario = $linha[25];
$total = $linha[29];

$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];
$descontoetapa4 = $linha[83];


$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];
$descontomonetarioetapa4 = $linha[85];


            
?>
  <tr>
    <td><div align="left"><? echo $codigo_orcamento; ?></div></td>
    <td><div align="left"><? echo $codigolancamento; ?></div></td>
    <td><div align="left"><? echo $nomeproduto; ?></div></td>
    <td><div align="left"><? echo $quant; ?></div></td>
    <td><div align="left"><? echo $preco; ?></div></td>
    <td><div align="left"><? echo $total; ?></div></td>
  </tr>
  <? } ?>
</table>
<p>&nbsp;</p>
</body>
</html>