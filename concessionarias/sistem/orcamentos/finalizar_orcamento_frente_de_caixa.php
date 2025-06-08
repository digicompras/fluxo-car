<?php

//require("conect/conect.php"); or die("erro na requisição");
require '../../../conect/conect.php';

/* Define o limitador de cache para 'private' */
$sql = "SELECT * FROM tempoexpiracaosenha limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$tempoexpiracaosenha = $linha['1'];


}


/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em 30 minutos */
session_cache_expire($tempoexpiracaosenha);
$cache_expire = session_cache_expire();

session_start(); //inicia sessão...

//if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

//$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


?>
<html>
<head>
<title>Voltar ao Hist&oacute;rico do cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style11 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}
-->
</style>
</head>
	
	<script Language="Javascript"> 
function printit(){ 
var NS = (navigator.appName == "Netscape"); 
var VERSION = parseInt(navigator.appVersion);

if (NS) { 
window.print() ; 
} else { 
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>'; 
document.body.insertAdjacentHTML('beforeEnd', WebBrowser); 
WebBrowser1.ExecWB(6,11);//Use a 1 vs. a 2 for a prompting dialog box WebBrowser1.outerHTML = ""; 
} 
} 
</script> 

<script Language="Javascript"> 
printit();
</script>

<?

error_reporting(E_ALL);
error_reporting( E_ALL ^E_NOTICE );
?>
	
<?
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}
	
	$horafechamento = $hora_atual;
	$datafechamento = date('d-m-Y');
	$datefechamento = date('Y-m-d');
	$diafechamento = date('d');
	$mesfechamento = date('m');
	$anofechamento = date('Y');
	
?>

<?
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
	
}

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
		  
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

		  
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador_fechou_conta = $linha[1];

$setor = $linha[43];

$estab_pertence = $linha[44];
$estab_pertence_op = $linha[44];

//$ultimo_departamento_trabalhado = $linha[66];


}
	
	$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$razaosocial_empresa_conveniada = $linha[1];

$nfantasia_empresa_conveniada = $linha[2];

$cnpj_empresa_conveniada = $linha[3];
$inscr_est_empresa_conveiada = $linha[4];

$endereco_empresa_conveniada = $linha[5];
	$numero_empresa_conveniada = $linha[6];
	$bairro_empresa_conveniada = $linha[7];
	$cep_empresa_conveniada = $linha[9];
	$cidade_empresa_conveniada = $linha[10];
	$estado_empresa_conveniada = $linha[11];
	$telefone_empresa_conveniada = $linha[12];
	$email_empresa_conveniada = $linha[16];
	$site_empresa_conveniada = $linha[17];
	$cartao_vai_pro_caixa = $linha[47];

}

$sql = "SELECT * FROM cx_abertura where operador = '$operador_fechou_conta' and loja = '$estab_pertence_op' order by dateabertura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$dataderegistrodavenda = $linha[2];

}
					  
$dataderegistrodavenda2 = explode("-", $dataderegistrodavenda);

$anovenda = $dataderegistrodavenda2[0];

$mesvenda = $dataderegistrodavenda2[1];

$diavenda = $dataderegistrodavenda2[2];  
		  
	
$veiculo = $_POST['veiculo'];	
$placa = $_POST['placa'];
	
	
$num_fatura = $_POST['num_fatura'];
$codigo_orcamento = $_POST['codigo_orcamento'];
$cod_ocorrencia = $_POST['cod_ocorrencia'];

$total_geral = $_POST['total_geral'];
	
	

$desconto_de_arredondamento = $_POST['desconto_de_arredondamento'];
$acrescimo_de_arredondamento = $_POST['acrescimo_de_arredondamento'];
$acrescimo_por_rateio = $_POST['acrescimo_por_rateio'];



$status = "Finalizado";
$status_conta = "Finalizado";
$status_fatura = "Finalizado";


$nomeclienteindicado = $_POST['nome'];
$codigo_cliente = $_POST['codigo_cliente'];	
	
	
$dia_vencto_carteira = $_POST['dia_vencto_carteira'];
$mes_vencto_carteira = $_POST['mes_vencto_carteira'];
$ano_vencto_carteira = $_POST['ano_vencto_carteira'];
	$date_vencto_carteira = "$ano_vencto_carteira-$mes_vencto_carteira-$dia_vencto_carteira";

	
if(empty($nomeclienteindicado)){
	
$sql = "SELECT * FROM clientes where codigo = '51700'";

}
else{
	
$sql = "SELECT * FROM clientes where nome = '$nomeclienteindicado' limit 1";
	
}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_do_cliente= $linha[0];

$nomecliente = $linha[1];
	$nomesocial = $linha[141];
	
$cpfcliente = $linha[4];
	
$enderecocliente = $linha[11];
$numerocliente = $linha[12];
$bairrocliente = $linha[13];
	$complementocliente = $linha[14];
$celularcliente = $linha[19];


}
	
if((empty($nomecliente)) or ($nomecliente=="5000")){
	
$nome_do_cliente = "CONSUMIDOR";
$cpf_do_cliente = "000";
}
else{
	
$nome_do_cliente = $nomecliente;
$cpf_do_cliente = $cpfcliente;
if(empty($nomesocial)){}else{ $nome_do_cliente2 = "Nome Social: $nomesocial <br>"; }
}	
	
	
	
$modopagto = $_POST['modopagto'];	

if($modopagto=="CARTAO"){

$quitacao = "Recebido do Cliente";

}
else{
	
$quitacao = "Em Aberto";
	
}



$ano_parc = $anovenda;
$mes_parc = $mesvenda;
$dia_vencto = $diavenda;

$categoria_conta = $_POST['categoria_conta'];
	
	
	
	
	$valor_recebido_do_cliente = $_POST['valor_recebido'];
$troco = $_POST['troco'];
	$sub_totalrecebido = $_POST['sub_totalrecebido'];
 
$valor_recebido = bcsub($valor_recebido_do_cliente,$troco,2);

$valor_entrada = $_POST['valor_entrada'];
	$modopagtoentrada = $_POST['modopagtoentrada'];
	
	$quant_parc = $_POST['quantparc'];
	
	if($modopagto=="CARTAO"){ $num_parcelas = "1"; }else{ $num_parcelas = $quant_parc; }


$saldo_a_parcelar = bcsub($total_geral,$valor_entrada,2);

$valorparcela = bcdiv($saldo_a_parcelar,$num_parcelas,2);		
	
	
	
	
if($num_parcelas>="1"){
	
$valor_monetario_a_informar = $valorparcela;
	
}
else{
	
$valor_monetario_a_informar = $valor_recebido;
	$num_mensalidade = "0";
}
	
	
	

	
	
$cartao = $_POST['cartao'];
$tipocartao = $_POST['tipocartao'];
	$num_ordem_do_cartao1 = 1;
$valorcartao = $_POST['valorcartao'];
	$quantparc_cartao1 = $_POST['quantparc_cartao1'];
$custo_com_cartao1 = $_POST['custo_com_cartao1'];
	
$valorparcelacartao1 = bcdiv($valorcartao,$quantparc_cartao1,2);		  
$parcela_do_custo_com_cartao1 = bcdiv($custo_com_cartao1,$quantparc_cartao1,2);		  

	


$cartao2 = $_POST['cartao2'];
$tipocartao2 = $_POST['tipocartao2'];
	$num_ordem_do_cartao2 = 2;
$valorcartao2 = $_POST['valorcartao2'];
	$quantparc_cartao2 = $_POST['quantparc_cartao2'];
$custo_com_cartao2 = $_POST['custo_com_cartao2'];
	
$valorparcelacartao2 = bcdiv($valorcartao2,$quantparc_cartao2,2);		  
$parcela_do_custo_com_cartao2 = bcdiv($custo_com_cartao2,$quantparc_cartao2,2);
		

	
	

$cartao3 = $_POST['cartao3'];
$tipocartao3 = $_POST['tipocartao3'];
	$num_ordem_do_cartao3 = 3;
$valorcartao3 = $_POST['valorcartao3'];
	$quantparc_cartao3 = $_POST['quantparc_cartao3'];
$custo_com_cartao3 = $_POST['custo_com_cartao3'];
	
$valorparcelacartao3 = bcdiv($valorcartao3,$quantparc_cartao3,2);		  
$parcela_do_custo_com_cartao3 = bcdiv($custo_com_cartao3,$quantparc_cartao3,2);


	
	

$cartao4 = $_POST['cartao4'];
$tipocartao4 = $_POST['tipocartao4'];
	$num_ordem_do_cartao4 = 4;
$valorcartao4 = $_POST['valorcartao4'];
	$quantparc_cartao4 = $_POST['quantparc_cartao4'];
$custo_com_cartao4 = $_POST['custo_com_cartao4'];
	
$valorparcelacartao4 = bcdiv($valorcartao4,$quantparc_cartao4,2);		  
$parcela_do_custo_com_cartao4 = bcdiv($custo_com_cartao4,$quantparc_cartao4,2);

	
	

$subtotal_custo_de_recebimento_com_cartao_etapa1 = bcadd($custo_com_cartao1,$custo_com_cartao2,2);
$subtotal_custo_de_recebimento_com_cartao_etapa2 = bcadd($custo_com_cartao3,$custo_com_cartao4,2);

$custototal_com_cartoes = bcadd($subtotal_custo_de_recebimento_com_cartao_etapa1,$subtotal_custo_de_recebimento_com_cartao_etapa2,2);



$datafechamento = $dataderegistrodavenda;
$datafechamento_brasileira = "$diavenda-$mesvenda-$anovenda";

$data_de_fechamento = $_POST['datafechamento'];	//data de abertura de caixa no caso do happy hour, usada para o fechamento de caixa


$data = $datafechamento;

$data2 = explode("-", $data);


$dia = $data2[2];

$mes = $data2[1];

$ano = $data2[0];


$hora_fechamento_conta = date('H:i:s');
	$hora_fechamento_conta = $hora_atual;

//dados do operador que alterou

$loja = $_POST['loja'];

//$operador_alterou = $_POST['operador_alterou'];


//-------------------finalizando fatura--------------------
$url = "http://$site_empresa/busca_informacoes_do_cupom.php?num_fatura=$num_fatura";

$comando = "update `$db`.`faturamento_futuro` set `status_fatura` = '$status_fatura',`horafechamento` = '$hora_fechamento_conta',`total_geral` = '$total_geral',`datafechamento` = '$datafechamento',`desconto_de_arredondamento` = '$desconto_de_arredondamento',`acrescimo_de_arredondamento` = '$acrescimo_de_arredondamento',`acrescimo_por_rateio` = '$acrescimo_por_rateio',`entrada` = '$valor_entrada',`modopagtoentrada` = '$modopagtoentrada',`quantparc` = '$quantparc',`condpagto` = '$condpagto',`modopagto` = '$modopagto',`valor_recebido` = '$valor_recebido',`troco` = '$troco',`cartao` = '$cartao',`tipocartao` = '$tipocartao',`valorcartao` = '$valorcartao',`custo_com_cartao1` = '$custo_com_cartao1',`cartao2` = '$cartao2',`tipocartao2` = '$tipocartao2',`valorcartao2` = '$valorcartao2',`custo_com_cartao2` = '$custo_com_cartao2',`cartao3` = '$cartao3',`tipocartao3` = '$tipocartao3',`valorcartao3` = '$valorcartao3',`custo_com_cartao3` = '$custo_com_cartao3',`cartao4` = '$cartao4',`tipocartao4` = '$tipocartao4',`valorcartao4` = '$valorcartao4',`custo_com_cartao4` = '$custo_com_cartao4',`custototal_com_cartoes` = '$custototal_com_cartoes',`codigo_orcamento` = '$codigo_orcamento',`loja` = '$estab_pertence',`operador` = '$operador_fechou_conta',`departamento` = '$departamento',`codigo_cliente` = '$codigo_do_cliente',`cliente` = '$nomecliente',`cpf` = '$cpf_do_cliente',`url` = '$url',`cod_ocorrencia` = '$cod_ocorrencia',`quantparc_cartao1` = '$quantparc_cartao1',`quantparc_cartao2` = '$quantparc_cartao2',`quantparc_cartao3` = '$quantparc_cartao3',`quantparc_cartao4` = '$quantparc_cartao4' where `faturamento_futuro`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);



//-----------------fim do processo de finalização de fatura---------------
	


?>

<?

$comando = "update `$db`.`orcamentos` set `status_fatura` = '$status_fatura',`condicao` = 'PEDIDO',`status` = '$status',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`operador_alterou` = '$operador_fechou_conta',`datealteracao` = '$datafechamento',`horaalteracao` = '$horafechamento',`num_orcamento_bloco` = '$num_orcamento_bloco',`status_conta` = '$status_conta',`setor` = '$setor',`operador_fechou_conta` = '$operador_fechou_conta',`hora_fechamento_conta` = '$hora_fechamento_conta',`preparar_caixa_receber` = 'recebido',`codigo_cliente` = '$codigo_do_cliente',`nome` = '$nomecliente',`cpf` = '$cpf_do_cliente',`cod_ocorrencia` = '$cod_ocorrencia',`quantparc_cartao1` = '$quantparc_cartao1',`quantparc_cartao2` = '$quantparc_cartao2',`quantparc_cartao3` = '$quantparc_cartao3',`quantparc_cartao4` = '$quantparc_cartao4',`quantparc` = '$num_parcelas' where `orcamentos`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);



$sql3 = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {



$codigolancamento = $linha[0];



$comando = "update `$db`.`produtos_em_orcamento` set `status_fatura` = '$status_fatura',`condicao` = '$condicao',`status` = '$status',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`operador_alterou` = '$operador_fechou_conta',`datealteracao` = '$datafechamento',`horaalteracao` = '$horafechamento',`preparar_caixa_receber` = 'recebido',`operador_fechou_conta` = '$operador_fechou_conta',`codigo_cliente` = '$codigo_do_cliente',`nome` = '$nomecliente',`cpf` = '$cpf_do_cliente' where `produtos_em_orcamento`. `codigo` = '$codigolancamento'";
mysql_query($comando,$conexao);



}


?>


<?
$sql = "SELECT * FROM faturamento_futuro where num_fatura = '$num_fatura'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$url = $linha[55];

}

?>

<?php
//---------------------------------abre a conexão com a impressora------------------------------

//Timbre da empresa
echo "<table width='100%'>
<tr>
<td><div align='center'><b>
$nfantasia_empresa_conveniada<br>
$cnpj_empresa_conveniada<br>
$endereco_empresa_conveniada, $numero_empresa_conveniada<br>
$cidade_empresa_conveniada - $estado_empresa_conveniada<br>
$telefone_empresa_conveniada<br><br>

Cliente / CPF<br>
$nome_do_cliente - $cpf_do_cliente<br>
$nome_do_cliente2<br>
$enderecocliente, $numerocliente<br>
$bairrocliente - $complementocliente<br>
$celularcliente<br><br>

Nº Cupon(Fatura) $num_fatura<br>
Nº PEDIDO $codigo_orcamento<br>
Data da compra: $diavenda-$mesvenda-$anovenda $horafechamento<br><br>


</b></div></td>
</tr>
</table>
";
	

            
$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura' and status_fatura = 'Finalizado'";

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

	
$grupo = $linha[19];
	$sub_grupo = $linha[112];


// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table width="100%">';
$html .= '<tr>';
$html .= '<td colspan="4"><div align="center">'."  ". ''."".'</div></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><div align="left"><b>Produto</b></div></td>';
$html .= '<td><div align="left"><b>Quant</b></div></td>';
$html .= '<td><div align="left"><b>Preco</b></div></td>';
$html .= '<td><div align="left"><b>Total</b></div></td>';


$html .= '</tr>';

$html .= '<tr>';

$html .= '<td><div align="left">'."$nomeproduto".'</div></td>';
$html .= '<td><div align="left">'."$quant".'</div></td>';
$html .= '<td><div align="left">'."$preco".'</div></td>';
$html .= '<td><div align="left">'."$total".'</div></td>';

$html .= '</tr>';
	
$html .= '<tr>';

$html .= '<td><div align="left">'."".'</div></td>';
$html .= '<td><div align="left">'."".'</div></td>';
$html .= '<td><div align="left">'."".'</div></td>';
$html .= '<td><div align="left">'."".'</div></td>';

$html .= '</tr>';
	
	
$html .= '</table>';
	
 
// Envia o conteúdo do arquivo
echo $html;

	
}

	
		  
	//Total Geral
echo "<table width='100%'>
<tr>
<td><div align='center'><b>
<br><br>

Total Geral R$ $total_geral <br><br>";
	


	
echo "</b></div></td>
</tr>
<tr>
<td><div align='center'>";
			$aux = '../../../qrcode/qr_img0.50j/php/qr_img.php?';
			$aux .= "d=$url&";
			$aux .= 'e=H&';
			$aux .= 's=4&';
			$aux .= 't=J';
		
        echo "<div align='center' style='float: center; border: 0px solid #000;''> <img src='$aux';></div></td>
</tr>
<tr></tr>
<tr>


</tr>
</table>
";
	
	

//---------------------------------fechou a conexao com a impressora-----------------------------
?>

<?

//---------------ATUALIZANDO INFORMAÇÕES EM FATURAMENTO FUTURO E ORCAMENTOS----------------
	
$comando = "update `$db`.`faturamento_futuro` set `entrada` = '$valor_entrada',`modopagtoentrada` = '$modopagtoentrada',`total_geral` = '$total_geral',`quantparc` = '$num_parcelas',`cliente` = '$nome_do_cliente',`cpf` = '$cpf_do_cliente',`codigo_orcamento` = '$codigo_orcamento',`codigo_cliente` = '$codigo_do_cliente',`quantparc_cartao1` = '$quantparc_cartao1',`quantparc_cartao2` = '$quantparc_cartao2',`quantparc_cartao3` = '$quantparc_cartao3',`quantparc_cartao4` = '$quantparc_cartao4' where `faturamento_futuro`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);



$sql = "SELECT * FROM faturamento_futuro where num_fatura = '$num_fatura' and status_fatura = 'Finalizado'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$num_fatura = $linha[0];

$cliente_da_fatura = $linha[22];
$cpf_do_cliente_da_fatura = $linha[23];


}


$comando = "update `$db`.`orcamentos` set `loja` = '$estab_pertence_op',`total_geral` = '$total_geral',`condicao` = 'PEDIDO',`quantparc` = '$num_parcelas',`modopagto` = '$modopagto',`cliente` = '$nome_do_cliente',`cpf` = '$cpf_do_cliente',`codigo_orcamento` = '$codigo_orcamento',`codigo_cliente` = '$codigo_do_cliente',`operador` = '$operador_fechou_conta',`quantparc_cartao1` = '$quantparc_cartao1',`quantparc_cartao2` = '$quantparc_cartao2',`quantparc_cartao3` = '$quantparc_cartao3',`quantparc_cartao4` = '$quantparc_cartao4' where `orcamentos`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);
	

$sql = "SELECT * FROM orcamentos where num_fatura = '$num_fatura' and status = 'Finalizado' order by codigo_orcamento asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$codigo_orcamento_na_fatura = $linha[0];

$orcamentos_incluidos_na_fatura = "$codigo_orcamento_na_fatura";

}


//---------------FIM DE ATUALIZANDO INFORMAÇÕES EM FATURAMENTO FUTURO E ORCAMENTOS----------------

if($cartao_vai_pro_caixa=="sim"){
	
	
$sql = "SELECT * FROM cx_entradas where num_orcamento = '$codigo_orcamento' and num_fatura = '$num_fatura' and estabelecimento = '$estab_pertence' order by num_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_cx_entradas = mysql_num_rows($res);
	
	
}
	
}
else{
	
$sql = "SELECT * FROM contas_a_receber where codigo_orcamento = '$codigo_orcamento' and num_fatura = '$num_fatura' and estabelecimento = '$estab_pertence' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_contas_a_receber = mysql_num_rows($res);
	
	
}
	
}
	
	

if($cartao_vai_pro_caixa=="sim"){
$instrucao = "$registros_cx_entradas";
}
else{
$instrucao = "$registros_contas_a_receber";
}
		  
	
	
if($instrucao>=1){	
	
		echo "<script>

alert('ATENÇÃO!!!... OS LANCAMENTOS DO CONTAS A RECEBER DESTA FATURA JA FORAM REALIZADOS!!!...>>> IMPOSSÍVEL SEGUIR COM A OPERACAO MAS, VOCE PODE IMPRIMIR NOVAMENTE!');




</script>";
		
	}
	else{


if(($mes_parc=="02") or ($mes_parc=="2")){
if($dia_vencto>="29"){
$dia_parc = "28";
}
else{	
$dia_parc = $dia_vencto;
}
}
else{
	
$dia_parc = $dia_vencto;
	
}

$datacadastro = "$ano_parc-$mes_parc-$dia_parc";
$hora_baixa = $horafechamento;
$horacadastro = "$horafechamento";

$estabelecimento_proposta = $loja;





$sql3 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registros = mysql_num_rows($res3);
	$registros_carteira = mysql_num_rows($res3);


$data_geracao = $linha['2'];
$hora_geracao = $linha['3'];

}




//----------inicio do tratamento da entrada-----------------------------------

$historico = "Fatura Nº $num_fatura, do cliente $cliente_da_fatura CPF $cpf_do_cliente_da_fatura";
$historico_dos_cartoes = "Referente a fatura Nº $num_fatura, do cliente $cliente_da_fatura CPF $cpf_do_cliente_da_fatura";
$historico_de_custos_com_cartoes = "Despesa de recebimento com cartão ref. a fatura Nº $num_fatura, do cliente $cliente_da_fatura CPF $cpf_do_cliente_da_fatura";

$vencto_entrada = "$ano_parc-$mes_parc-$dia_parc";


		
if($modopagto<>"DINHEIRO"){
	
	
	
	if($modopagto=="CARTEIRA"){
$historico_cx_entradas = "Fatura $num_fatura, Modo pagto $modopagto Cliente $nomeclienteindicado CPF $cpfcliente";
}
else{
$historico_cx_entradas = "Fatura $num_fatura, Modo pagto $modopagto Cliente $nomeclienteindicado CPF $cpfcliente";
}
	
if($valor_entrada<>0.00){
	
	
	


$sql5 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and categoria_conta = '$categoria_conta' and departamento = '$estab_pertence' and nome = '$nome_do_cliente' and cpf = '$cpf_do_cliente'";
$res5 = mysql_query($sql5);
$lancamentos = mysql_num_rows($res5);

if($lancamentos>=1){

//echo "Valor da entrada referente a fatura $num_fatura já registrado no caixa!!!... Por essa razão não foi lançado novamente!<br> ";

}
else{
	
	

$especificacao = "PAGTO ENTRADA";

$comando = "insert into cx_entradas(valor,modopagtoentrada,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento,modo_pagto,especificacao,saldo_a_parcelar,sub_categoria,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,tipodeparcelamento,quantparc_cartao1,quantparc_cartao2,quantparc_cartao3,quantparc_cartao4) 

values('$valor_entrada','$modopagtoentrada','$diavenda','$mesvenda','$anovenda','$dataderegistrodavenda','$hora_fechamento_conta','$estab_pertence','Fatura $num_fatura, Recebimento de entrada $num_mensalidade de $quantparc - Cliente $nome_do_cliente CPF $cpf_do_cliente','$grupo','$dataderegistrodavenda','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$operador_fechou_conta','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$codigo_orcamento','$setor','$sub_totalrecebido','$troco','$estab_pertence','$modopagtoentrada','$especificacao','$saldo_a_parcelar','$sub_grupo','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$tipodeparcelamento','$quantparc_cartao1','$quantparc_cartao2','$quantparc_cartao3','$quantparc_cartao4')";
mysql_query($comando,$conexao) or die("Erro ao gravar cliente!");

}

	
	
	
}
else{
	

	
if($num_parcelas==0) {
	
	
	
$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento,modo_pagto,especificacao,saldo_a_parcelar,sub_categoria,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4) 

values('$valor_recebido','$diavenda','$mesvenda','$anovenda','$dataderegistrodavenda','$hora_fechamento_conta','$estab_pertence','$historico_cx_entradas','$grupo','$dataderegistrodavenda','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$operador_fechou_conta','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$orcamentos_incluidos_na_fatura','$setor','$sub_totalrecebido','$troco','$estab_pertence','$modopagto','$especificacao','','$sub_grupo','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4')";
mysql_query($comando,$conexao);
	
}



	
}
//----------fim do tratamento da entrada-----------------------------------
}
else{
	//-----se for DINHEIRO----------------
	


if(($valor_entrada<>0.00) && ($num_parcelas>=1)) {
	
$especificacao = "PAGTO ENTRADA";
}
	
if(($valor_entrada<>0.00) && ($num_parcelas==0) ){
	
	$especificacao = "PAGTO RESIDUAL";
		
	}
	
if(($valor_entrada==0.00) && ($num_parcelas>=1) ){
		$especificacao = "PAGTO TOTAL";
	}

if(($valor_entrada==0.00) && ($num_parcelas==0) ){
		$especificacao = "PAGTO TOTAL";
	}
	



	

$sql11 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and categoria_conta = '$categoria_conta' and departamento = '$estab_pertence'";
$res11 = mysql_query($sql11);
$lancamentos = mysql_num_rows($res11);

if($lancamentos>=1){

//echo "Valor referente a fatura $num_fatura já registrado no caixa!!!... Por essa razão não foi lançado novamente!<br> ";

}
else{
	
if($modopagto=="CARTEIRA"){
$historico_cx_entradas = "Fatura $num_fatura, Modo pagto $modopagto Cliente $nomeclienteindicado CPF $cpfcliente";
}
else{
$historico_cx_entradas = "Fatura $num_fatura, Modo pagto $modopagto Cliente $nomeclienteindicado CPF $cpfcliente";
}

	

if($valor_entrada<>0.00){
	
$comando = "insert into cx_entradas(valor,modopagtoentrada,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento,modo_pagto,especificacao,saldo_a_parcelar,sub_categoria,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4) 

values('$valor_entrada','$modopagtoentrada','$diavenda','$mesvenda','$anovenda','$dataderegistrodavenda','$hora_fechamento_conta','$estab_pertence','$historico_cx_entradas','$grupo','$dataderegistrodavenda','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$operador_fechou_conta','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$orcamentos_incluidos_na_fatura','$setor','$sub_totalrecebido','$troco','$estab_pertence','$modopagto','$especificacao','$saldo_a_parcelar','$sub_grupo','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4')";
mysql_query($comando,$conexao);

}
	
	
if(($valor_entrada<>0.00) && ($num_parcelas==0) ){
	
$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento,modo_pagto,especificacao,saldo_a_parcelar,sub_categoria,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4) 

values('$saldo_a_parcelar','$diavenda','$mesvenda','$anovenda','$dataderegistrodavenda','$hora_fechamento_conta','$estab_pertence','$historico_cx_entradas','$grupo','$dataderegistrodavenda','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$operador_fechou_conta','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$orcamentos_incluidos_na_fatura','$setor','$sub_totalrecebido','$troco','$estab_pertence','$modopagto','$especificacao','','$sub_grupo','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4')";
mysql_query($comando,$conexao);
	
}

	
	
if(($valor_entrada==0.00) && ($num_parcelas==0) ){
	
$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento,modo_pagto,especificacao,saldo_a_parcelar,sub_categoria,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4) 

values('$valor_recebido','$diavenda','$mesvenda','$anovenda','$dataderegistrodavenda','$hora_fechamento_conta','$estab_pertence','$historico_cx_entradas','$grupo','$dataderegistrodavenda','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$operador_fechou_conta','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$orcamentos_incluidos_na_fatura','$setor','$sub_totalrecebido','$troco','$estab_pertence','$modopagto','$especificacao','','$sub_grupo','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4')";
mysql_query($comando,$conexao);
	
}


	
	
}

}


//---------verificando o tipo do cartao 1--------------


//-------------INICIO DA CHAMADA DAS ROTINAS DE GRAVACAO DE CONTAS A RECEBER E A PAGAR-------------------------
	
	if($num_ordem_do_cartao1=="1"){ 
		
		include("rotina_gravacao_parcelas_cartao_1.php");
	
	}
	
	if($num_ordem_do_cartao2=="2"){ 
		
		include("rotina_gravacao_parcelas_cartao_2.php");
	
	}
	
	if($num_ordem_do_cartao3=="3"){ 
		
		include("rotina_gravacao_parcelas_cartao_3.php");
	
	}
	
	if($num_ordem_do_cartao4=="4"){ 
		
		include("rotina_gravacao_parcelas_cartao_4.php");
	
	}
	
	if(($modopagto=="CARTEIRA") or ($modopagto=="DINHEIRO")  ){ 
		
		include("rotina_gravacao_carteira_e_dinheiro.php");
	
	}
	
	
	
	//-------------FIM DA CHAMADA DAS ROTINAS DE GRAVACAO DE CONTAS A RECEBER E A PAGAR-------------------------
	




	
$sql3 = "select * from db";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$db = $linha[1];
	
}


$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

//$codigolancamento = $linha[0];

$codigoproduto = $linha[17];
$quant = $linha[21];




//$sql2 = "SELECT * FROM produtos where codigo = '$codigoproduto'";
//$res2 = mysql_query($sql2);
//while($linha=mysql_fetch_row($res2)) {

//$quant_estoque = $linha[16];

//}

//$saldo_estoque_do_produto = bcsub($quant_estoque,$quant);



	
//$comando = "update `$db`.`produtos` set `quant_estoque` = '$saldo_estoque_do_produto' where `produtos`. `codigo` = '$codigoproduto'";

//mysql_query($comando,$conexao);
	
	
//echo "Codigo do produto $codigoproduto <br>";
//echo "Quant comprada $quant <br><br>";
	
//echo "Quant em estoque $quant_estoque <br><br>";
	
//echo "Saldo em estoque $saldo_estoque_do_produto <br><br>";

}


	
	
	
	}

//------------------FIM SE A CONDICAO FOR PEDIDO--------------
	
	
	
?>
















<?
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_empresa;
	
	//PREPARA O PEDIDO
	//$mens   =  "Olá! Orçamento alterado na $nfantasia_empresa!   \n";
	//$mens  .=  " \n";
	//$mens  .=  "Nº do Orçamento: ".$codigo_orcamento."                                                       \n";
	//$mens  .=  "STATUS: ".$status."                                                       \n";
	//$mens  .=  "Cliente: ".$loja."                                                    \n";
	//$mens  .=  "Data de alteração: ".$datafechamento."                                                    \n";
	//$mens  .=  "Hora de alteração: ".$horafechamento."                                                    \n";
	//$mens  .=  "Operador que efetuou a alteração: ".$operador_alterou."                                                    \n";
	//$mens  .=  "Estabelecimento: ".$loja."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Orçamento alterado no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email_dest);
	//$envia  =  mail($email_operador_alterou, "Orçamento alterado no sistema em ".$dataalteracao, $mens,"From:".$email_dest);

?>





<body>
  


<table width="100%" border="0">
  <tr>
    <td width="3%"><form name="form2" method="post" action="../../veiculos/verifica.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <a href="finalizar_orcamento_frente_de_caixa.php">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
        </a>
      <input class='class01' type="submit" name="Submit" value="Voltar">
    </form></td>
    <td align="center">
		<?  
		
		if($modopagto=="CARTEIRA"){ 
		
		include("resumo_carteira.php");
	
	}
		
		
	if($modopagto=="DINHEIRO"){ 
		
		include("resumo_dinheiro.php");
	
	}
		
		
	if($modopagto=="CARTAO"){ 
		
		include("resumo_cartao.php");
	
	}	
	
	
	
		?>
    </td>
    <td width="3%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?

$comando = "update `$db`.`faturamento_futuro` set `entrada` = '$valor_entrada',`modopagtoentrada` = '$modopagtoentrada',`total_geral` = '$total_geral',`quantparc` = '$num_parcelas',`cliente` = '$nome_do_cliente',`cpf` = '$cpf_do_cliente',`codigo_orcamento` = '$codigo_orcamento',`codigo_cliente` = '$codigo_do_cliente',`saldo_a_parcelar` = '$saldo_a_parcelar',`valorparcela` = '$valor_monetario_a_informar',`quantparc_cartao1` = '$quantparc_cartao1',`quantparc_cartao2` = '$quantparc_cartao2',`quantparc_cartao3` = '$quantparc_cartao3',`quantparc_cartao4` = '$quantparc_cartao4' where `faturamento_futuro`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);

mysql_close($conexao);
?>
