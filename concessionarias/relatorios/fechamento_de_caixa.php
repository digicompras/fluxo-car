<?
ini_set('default_charset','UTF8_general_mysql500_ci');


session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.


else //se não for...

header("Location: alerta.php");

?>

<html>

<head>

<title>PESQUISA DE VE&Iacute;CULO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../../conect/conect.php';
include '../../css_menus/modal.css';
include '../../css_menus/modal2.css';
	
$sql3 = "select * from db";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
	
$db = $linha[1];	
}
	

$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$operador_informante = $linha[1];
$operador_que_apontou_a_peca = $linha[20];
$estab_pertence = $linha[44];
	
$inclui_mais_uma_nf = $linha[78];

}


$solicitacao = $_POST['solicitacao'];
$qr_conteudo = $_GET['qr_conteudo'];
	
if(empty($qr_conteudo)){
$part_number = $_POST['part_number'];
}
else{
$part_number = $qr_conteudo;
	}

	

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];
	
}

?>





<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	<?
	$datecadastro = date('Y-m-d');
	
$sql50 = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res50 = mysql_query($sql50);
while($linha=mysql_fetch_row($res50)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[15];
	
	$estab_pertence = $linha[44];
$funcao = $linha[43];
$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$obra_operador = $linha[50];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];

$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$fornecedores = $linha[66];
$controlekm_autorizado = $linha[75];
$orcamento_autorizado = $linha[76];
$permissao_categoria_de_produtos_autorizado = $linha[77];
	
$recebenotificacao = $linha[49];
	$iniciar_rdo_diferenciado = $linha[51];
	$estoque = $linha[54];
	$conciliacoes = $linha[55];
	//$despesas = $linha[56];
	//$veiculos = $linha[57];
	//$rdo = $linha[58];
	$rdo_autorizado = $linha[58];
	$avisodepecas = $linha[59];
	$administracartaoponto = $linha[61];
	$relatoriodepecasutilizadas = $linha[65];
	$fornecedores = $linha[66];
	$inventario = $linha[67];
	$estoque_entradas = $linha[68];
	$cadastro_de_itens = $linha[69];
	$alimentacao_rdo = $linha[70];
	$estoque_entradas_por_xml_autorizado = $linha[71];
	$veiculodaempresa = $linha[72];
	$controlekm = $linha[75];
	$orcamento = $linha[76];
	$permissao_categoria_de_produtos = $linha[77];
	$inclui_mais_uma_nf = $linha[78];
	$financeiro = $linha[79];
	$relatoriodecomissao = $linha[80];
	$registrodeoperadores = $linha[81];
	$abrir_e_fechar_cx = $linha[82];
	$editar_produtos = $linha[83];
	$quantitativo_do_item_no_estoque = $linha[84];
	
}	
	
	?>
<table width="100%" border="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center" background="../../imagens_sistema/fundocelulas2.png" style="font-size: 16px"><strong>FECHAMENTO DE CAIXA DO DIA</strong></td>
  </tr>
  <tr>
    <td colspan="4" align="center" style="font-size: 16px">CAIXA - ENTRADAS</td>
  </tr>
  <tr>
    <td width="17%" style="font-size: 16px">DINHEIRO</td>
    <td width="29%" style="font-size: 16px"><? 
		$sql = "select sum(valor) as total_liquido_dinheiro from cx_entradas where operador = '$operador' and nfantasia = '$estab_pertence' and modo_pagto = 'DINHEIRO' and datecadastro = '$datecadastro' order by datecadastro desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_dinheiro = bcadd($linha['total_liquido_dinheiro'],0,2);
		echo "$total_liquido_dinheiro<br><br>"; ?></td>
    <td width="22%" style="font-size: 16px">CARTEIRA</td>
    <td width="32%" style="font-size: 16px"><? 
		$sql = "select sum(valor) as total_liquido_carteira from cx_entradas where operador = '$operador' and nfantasia = '$estab_pertence' and modo_pagto = 'CARTEIRA' and datecadastro = '$datecadastro' order by datecadastro desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_carteira = bcadd($linha['total_liquido_carteira'],0,2);
		
		echo "$total_liquido_carteira";
		
		?></td>
  </tr>
  <tr>
    <td style="font-size: 16px">CAARTAO</td>
    <td style="font-size: 16px"><?
		$sql = "select sum(valor) as total_liquido_cartao from cx_entradas where operador = '$operador' and nfantasia = '$estab_pertence' and modo_pagto = 'CARTAO' and datecadastro = '$datecadastro' order by datecadastro desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_cartao = bcadd($linha['total_liquido_cartao'],0,2);
		
		echo "$total_liquido_cartao";
		
		?></td>
    <td style="font-size: 16px">&nbsp;</td>
    <td style="font-size: 16px">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center" style="font-size: 16px">BANCO</td>
  </tr>
  <tr>
    <td style="font-size: 16px">CARTAO</td>
    <td style="font-size: 16px"><? 
		$sql = "select sum(valor) as total_liquido_banco_entradas from bco_entradas where operador = '$operador' and estabelecimento = '$estab_pertence' and modopagto = 'CARTAO' and datecadastro = '$datecadastro' order by datecadastro desc limit 1";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_banco_entradas = bcadd($linha['total_liquido_banco_entradas'],0,2);
		
		echo "$total_liquido_banco_entradas";
		
		?></td>
    <td style="font-size: 16px">&nbsp;</td>
    <td style="font-size: 16px">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size: 16px">&nbsp;</td>
    <td style="font-size: 16px">&nbsp;</td>
    <td style="font-size: 16px">&nbsp;</td>
    <td style="font-size: 16px">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" align="center" style="font-size: 16px">SAIDAS</td>
  </tr>
  <tr>
    <td style="font-size: 16px">DINHEIRO</td>
    <td style="font-size: 16px">&nbsp;</td>
    <td style="font-size: 16px">&nbsp;</td>
    <td style="font-size: 16px">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-size: 16px">&nbsp;</td>
    <td style="font-size: 16px">&nbsp;</td>
    <td style="font-size: 16px">&nbsp;</td>
    <td style="font-size: 16px">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>

</html>

