<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

?>



<?

error_reporting(E_ALL);



//require('file:///F|/webs/pedcell/conexao.php') or die("Erro ao incluir arquivo");

require '../../conect/conect.php';

$senha = $_SESSION['senha'];

$sql50 = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res50 = mysql_query($sql50);
while($linha=mysql_fetch_row($res50)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];
$classificacao_operador = $linha[88];
	
$cidade_estab_pertence = $linha[15];
	
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
	$categoria_despesas = $linha[85];
	$cadastro_de_contas_bancarias = $linha[86];
	$aliquotas_dos_cartoes = $linha[87];
	$retira_itens_do_orcamento = $linha[89];
	$vendas = $linha[90];
	
}


$conta = $_POST['conta'];
$categoria = $_POST['categoria'];
$valor = $_POST['valor'];
$dia_vencto = $_POST['dia_vencto'];
$mes_vencto = $_POST['mes_vencto'];
$ano_vencto = $_POST['ano_vencto'];
$historico = $_POST['historico'];
$departamento = $_POST['departamento'];

$vencto = "$ano_vencto-$mes_vencto-$dia_vencto";



$comando = "insert into custo_fixo(conta,categoria,valor,vencto,dia_vencto,mes_vencto,ano_vencto,historico,empresa,departamento) values('$conta','$categoria','$valor','$vencto','$dia_vencto','$mes_vencto','$ano_vencto','$historico','$estab_pertence','$estab_pertence')";



mysql_query($comando,$conexao) or die("Erro ao gravar conta de custo fixo");





echo "Conta de custo fixo gravada com sucesso!<br>";





?>
<?

$dia_inicial1 = $_POST['dia_inicial'];
$dia_inicial2 = "01";
if(empty($dia_inicial1)){

$dia_inicial = $dia_inicial2;
	
}
else{
	
$dia_inicial = $dia_inicial1;
	
}

$mes_inicial1 = $_POST['mes_inicial'];
$mes_inicial2 = date('m');
if(empty($mes_inicial1)){

$mes_inicial = $mes_inicial2;
	
}
else{
	
$mes_inicial = $mes_inicial1;
	
}


$ano_inicial1 = $_POST['ano_inicial'];
$ano_inicial2 = date('Y');
if(empty($ano_inicial1)){

$ano_inicial = $ano_inicial2;
	
}
else{
	
$ano_inicial = $ano_inicial1;
	
}


$dia_final1 = $_POST['dia_final'];
$dia_final2 = 31;
if(empty($dia_final1)){

$dia_final = $dia_final2;
	
}
else{
	
$dia_final = $dia_final1;
	
}


$mes_final1 = $_POST['mes_final'];
$mes_final2 = date('m');
if(empty($mes_final1)){

$mes_final = $mes_final2;
	
}
else{
	
$mes_final = $mes_final1;
	
}


$ano_final1 = $_POST['ano_final'];
$dano_final2 = date('Y');
if(empty($ano_final1)){

$ano_final = $ano_final2;
	
}
else{
	
$ano_final = $ano_final1;
	
}


?>

<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style></head>



<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

</p>

<form name="form1" method="post" action="inserir.php">

  <input class="class01" type="submit" name="Submit" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
  <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
  <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
  <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
  <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
  <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
</form>

<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>