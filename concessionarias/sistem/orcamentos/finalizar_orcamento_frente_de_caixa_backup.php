<?php

//require("conect/conect.php"); or die("erro na requisi��o");
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

session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

$usuario = $_SESSION['usuario'];
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
	
	
	$quant_parc = $_POST['quantparc'];
	
	


$saldo_a_parcelar = bcsub($total_geral,$valor_entrada,2);

$valorparcela = bcdiv($saldo_a_parcelar,$quant_parc,2);		
	
	
	
	
if($quant_parc>="1"){
	
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

$comando = "update `$db`.`faturamento_futuro` set `status_fatura` = '$status_fatura',`horafechamento` = '$hora_fechamento_conta',`total_geral` = '$total_geral',`datafechamento` = '$datafechamento',`desconto_de_arredondamento` = '$desconto_de_arredondamento',`acrescimo_de_arredondamento` = '$acrescimo_de_arredondamento',`acrescimo_por_rateio` = '$acrescimo_por_rateio',`entrada` = '$valor_entrada',`quantparc` = '$quantparc',`condpagto` = '$condpagto',`modopagto` = '$modopagto',`valor_recebido` = '$valor_recebido',`troco` = '$troco',`cartao` = '$cartao',`tipocartao` = '$tipocartao',`valorcartao` = '$valorcartao',`custo_com_cartao1` = '$custo_com_cartao1',`cartao2` = '$cartao2',`tipocartao2` = '$tipocartao2',`valorcartao2` = '$valorcartao2',`custo_com_cartao2` = '$custo_com_cartao2',`cartao3` = '$cartao3',`tipocartao3` = '$tipocartao3',`valorcartao3` = '$valorcartao3',`custo_com_cartao3` = '$custo_com_cartao3',`cartao4` = '$cartao4',`tipocartao4` = '$tipocartao4',`valorcartao4` = '$valorcartao4',`custo_com_cartao4` = '$custo_com_cartao4',`custototal_com_cartoes` = '$custototal_com_cartoes',`codigo_orcamento` = '$codigo_orcamento',`loja` = '$estab_pertence',`operador` = '$operador_fechou_conta',`departamento` = '$departamento',`codigo_cliente` = '$codigo_do_cliente',`cliente` = '$nomecliente',`cpf` = '$cpf_do_cliente',`url` = '$url',`cod_ocorrencia` = '$cod_ocorrencia',`quantparc_cartao1` = '$quantparc_cartao1',`quantparc_cartao2` = '$quantparc_cartao2',`quantparc_cartao3` = '$quantparc_cartao3',`quantparc_cartao4` = '$quantparc_cartao4' where `faturamento_futuro`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);



//-----------------fim do processo de finaliza��o de fatura---------------
	


?>

<?

$comando = "update `$db`.`orcamentos` set `status_fatura` = '$status_fatura',`condicao` = 'PEDIDO',`status` = '$status',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`operador_alterou` = '$operador_fechou_conta',`datealteracao` = '$datafechamento',`horaalteracao` = '$horafechamento',`num_orcamento_bloco` = '$num_orcamento_bloco',`status_conta` = '$status_conta',`setor` = '$setor',`operador_fechou_conta` = '$operador_fechou_conta',`hora_fechamento_conta` = '$hora_fechamento_conta',`preparar_caixa_receber` = 'recebido',`codigo_cliente` = '$codigo_do_cliente',`nome` = '$nomecliente',`cpf` = '$cpf_do_cliente',`cod_ocorrencia` = '$cod_ocorrencia',`quantparc_cartao1` = '$quantparc_cartao1',`quantparc_cartao2` = '$quantparc_cartao2',`quantparc_cartao3` = '$quantparc_cartao3',`quantparc_cartao4` = '$quantparc_cartao4',`quantparc` = '$quant_parc' where `orcamentos`. `num_fatura` = '$num_fatura'";
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
//---------------------------------abre a conex�o com a impressora------------------------------

//Timbre da empresa
echo "<table width='100%'>
<tr>
<td><div align='center'><b>
$nfantasia_empresa_conveniada<br>
$cnpj_empresa_conveniada<br>
$endereco_empresa_conveniada, $numero_empresa_conveniada<br>
$cidade_empresa_conveniada - $estado_empresa_conveniada<br><br>

Cliente / CPF<br>
$nome_do_cliente - $cpf_do_cliente<br>
$enderecocliente, $numerocliente<br>
$bairrocliente - $complementocliente<br>
$celularcliente<br><br>

N� Cupon(Fatura) $num_fatura<br>
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
	
 
// Envia o conte�do do arquivo
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

//---------------ATUALIZANDO INFORMA��ES EM FATURAMENTO FUTURO E ORCAMENTOS----------------
	
$comando = "update `$db`.`faturamento_futuro` set `entrada` = '$valor_entrada',`total_geral` = '$total_geral',`quantparc` = '$quant_parc',`cliente` = '$nome_do_cliente',`cpf` = '$cpf_do_cliente',`codigo_orcamento` = '$codigo_orcamento',`codigo_cliente` = '$codigo_do_cliente',`quantparc_cartao1` = '$quantparc_cartao1',`quantparc_cartao2` = '$quantparc_cartao2',`quantparc_cartao3` = '$quantparc_cartao3',`quantparc_cartao4` = '$quantparc_cartao4' where `faturamento_futuro`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);



$sql = "SELECT * FROM faturamento_futuro where num_fatura = '$num_fatura' and status_fatura = 'Finalizado'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$num_fatura = $linha[0];

$cliente_da_fatura = $linha[22];
$cpf_do_cliente_da_fatura = $linha[23];


}


$comando = "update `$db`.`orcamentos` set `loja` = '$estab_pertence_op',`total_geral` = '$total_geral',`condicao` = 'PEDIDO',`quantparc` = '$quant_parc',`modopagto` = '$modopagto',`cliente` = '$nome_do_cliente',`cpf` = '$cpf_do_cliente',`codigo_orcamento` = '$codigo_orcamento',`codigo_cliente` = '$codigo_do_cliente',`operador` = '$operador_fechou_conta',`quantparc_cartao1` = '$quantparc_cartao1',`quantparc_cartao2` = '$quantparc_cartao2',`quantparc_cartao3` = '$quantparc_cartao3',`quantparc_cartao4` = '$quantparc_cartao4' where `orcamentos`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);
	

$sql = "SELECT * FROM orcamentos where num_fatura = '$num_fatura' and status = 'Finalizado' order by codigo_orcamento asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$codigo_orcamento_na_fatura = $linha[0];

$orcamentos_incluidos_na_fatura = "$codigo_orcamento_na_fatura";

}


//---------------FIM DE ATUALIZANDO INFORMA��ES EM FATURAMENTO FUTURO E ORCAMENTOS----------------

if($modopagto=="CARTAO"){ $num_parcelas = $quantparc_cartao1; }else{ $num_parcelas = $quant_parc; }
	

		  
		  $sql = "SELECT * FROM contas_a_receber where codigo_orcamento = '$codigo_orcamento' and num_fatura = '$num_fatura' and estabelecimento = '$estab_pertence' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_contas_a_receber = mysql_num_rows($res);
	
	
}
	
	if($registros_contas_a_receber>=1){
		
		echo "<script>

alert('ATEN��O!!!... OS LANCAMENTOS DO CONTAS A RECEBER DESTA FATURA JA FORAM REALIZADOS!!!...>>> IMPOSS�VEL SEGUIR COM A OPERACAO MAS, VOCE PODE IMPRIMIR NOVAMENTE!');




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

$historico = "Fatura N� $num_fatura, do cliente $cliente_da_fatura CPF $cpf_do_cliente_da_fatura";
$historico_dos_cartoes = "Referente a fatura N� $num_fatura, do cliente $cliente_da_fatura CPF $cpf_do_cliente_da_fatura";
$historico_de_custos_com_cartoes = "Despesa de recebimento com cart�o ref. a fatura N� $num_fatura, do cliente $cliente_da_fatura CPF $cpf_do_cliente_da_fatura";

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

//echo "Valor da entrada referente a fatura $num_fatura j� registrado no caixa!!!... Por essa raz�o n�o foi lan�ado novamente!<br> ";

}
else{

$especificacao = "PAGTO ENTRADA";

$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento,modo_pagto,especificacao,saldo_a_parcelar,sub_categoria,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,tipodeparcelamento,quantparc_cartao1,quantparc_cartao2,quantparc_cartao3,quantparc_cartao4) 

values('$valor_entrada','$diavenda','$mesvenda','$anovenda','$dataderegistrodavenda','$hora_fechamento_conta','$estab_pertence','Fatura $num_fatura, Recebimento de entrada $num_mensalidade de $quantparc - Cliente $nome_do_cliente CPF $cpf_do_cliente','$grupo','$dataderegistrodavenda','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$operador_fechou_conta','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$codigo_orcamento','$setor','$sub_totalrecebido','$troco','$estab_pertence','$modopagto','$especificacao','$saldo_a_parcelar','$sub_grupo','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$tipodeparcelamento','$quantparc_cartao1','$quantparc_cartao2','$quantparc_cartao3,'$quantparc_cartao4)";
mysql_query($comando,$conexao);

}

	
	
	
}
else{
	

	
if($quant_parc==0) {
	
	
$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento,modo_pagto,especificacao,saldo_a_parcelar,sub_categoria,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4) 

values('$valor_recebido','$diavenda','$mesvenda','$anovenda','$dataderegistrodavenda','$hora_fechamento_conta','$estab_pertence','$historico_cx_entradas','$grupo','$dataderegistrodavenda','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$operador_fechou_conta','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$orcamentos_incluidos_na_fatura','$setor','$sub_totalrecebido','$troco','$estab_pertence','$modopagto','$especificacao','','$sub_grupo','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4')";
mysql_query($comando,$conexao);
	
}



	
}
//----------fim do tratamento da entrada-----------------------------------
}
else{
	//-----se for DINHEIRO----------------
	


if($valor_entrada<>0.00){
	
$especificacao = "PAGTO ENTRADA";
}
else{
	if(($valor_entrada==0.00) && ($quant_parc==0) ){
		$especificacao = "PAGTO TOTAL";
	}
	else{
		
	
	$especificacao = "PAGTO TOTAL";
		
	}
}

	

$sql11 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and categoria_conta = '$categoria_conta' and departamento = '$estab_pertence'";
$res11 = mysql_query($sql11);
$lancamentos = mysql_num_rows($res11);

if($lancamentos>=1){

//echo "Valor referente a fatura $num_fatura j� registrado no caixa!!!... Por essa raz�o n�o foi lan�ado novamente!<br> ";

}
else{
	
if($modopagto=="CARTEIRA"){
$historico_cx_entradas = "Fatura $num_fatura, Modo pagto $modopagto Cliente $nomeclienteindicado CPF $cpfcliente";
}
else{
$historico_cx_entradas = "Fatura $num_fatura, Modo pagto $modopagto Cliente $nomeclienteindicado CPF $cpfcliente";
}

	

if($valor_entrada<>0.00){
	
$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento,modo_pagto,especificacao,saldo_a_parcelar,sub_categoria,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4) 

values('$valor_entrada','$diavenda','$mesvenda','$anovenda','$dataderegistrodavenda','$hora_fechamento_conta','$estab_pertence','$historico_cx_entradas','$grupo','$dataderegistrodavenda','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$operador_fechou_conta','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$orcamentos_incluidos_na_fatura','$setor','$sub_totalrecebido','$troco','$estab_pertence','$modopagto','$especificacao','$saldo_a_parcelar','$sub_grupo','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4')";
mysql_query($comando,$conexao);

}
	
	
if(($valor_entrada==0.00) && ($quant_parc==0) ){
	
$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento,modo_pagto,especificacao,saldo_a_parcelar,sub_categoria,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4) 

values('$valor_recebido','$diavenda','$mesvenda','$anovenda','$dataderegistrodavenda','$hora_fechamento_conta','$estab_pertence','$historico_cx_entradas','$grupo','$dataderegistrodavenda','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$operador_fechou_conta','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$orcamentos_incluidos_na_fatura','$setor','$sub_totalrecebido','$troco','$estab_pertence','$modopagto','$especificacao','','$sub_grupo','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4')";
mysql_query($comando,$conexao);
	
}


	
	
}

}


//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc<=9){
$soma_venctocartao1 = "0".bcadd($mes_parc,0);
}
else{
$soma_venctocartao1 = bcadd($mes_parc,0);
}
}
else{

if($mes_parc<=9){
$soma_venctocartao1 = "0".bcadd($mes_parc,1);
}
else{
$soma_venctocartao1 = bcadd($mes_parc,1);
}
}

if($soma_venctocartao1>12){
$mes_parccartao1 = "01";
}else{
$mes_parccartao1 = $soma_venctocartao1;
}
if($soma_venctocartao1>12){
$ano_parccartao1 = bcadd($ano_parc,1);
}else{
$ano_parccartao1 = $ano_parc;
}

if(($mes_parccartao1=="02") or ($mes_parccartao1=="2")){
if($dia_vencto>="29"){
$dia_parccartao1 = "28";
}
else{
$dia_parccartao1 = $dia_vencto;
}
}
else{
	
$dia_parccartao1 = $dia_vencto;
	
}

$venctocartao1 = "$ano_parccartao1-$mes_parccartao1-$dia_parccartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc<=9){
$soma_venctocartao2 = "0".bcadd($mes_parc,0);
}
else{
$soma_venctocartao2 = bcadd($mes_parc,0);
}
}
else{

if($mes_parc<=9){
$soma_venctocartao2 = "0".bcadd($mes_parc,1);
}
else{
$soma_venctocartao2 = bcadd($mes_parc,1);
}
}

if($soma_venctocartao2>12){
$mes_parccartao2 = "01";
}else{
$mes_parccartao2 = $soma_venctocartao2;
}
if($soma_venctocartao2>12){
$ano_parccartao2 = bcadd($ano_parc,1);
}else{
$ano_parccartao2 = $ano_parc;
}

if(($mes_parccartao2=="02") or ($mes_parccartao2=="2")){
if($dia_vencto>="29"){
$dia_parccartao2 = "28";
}
else{
$dia_parccartao2 = $dia_vencto;
}
}
else{
	
$dia_parccartao2 = $dia_vencto;
	
}

$venctocartao2 = "$ano_parccartao2-$mes_parccartao2-$dia_parccartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc<=9){
$soma_venctocartao3 = "0".bcadd($mes_parc,0);
}
else{
$soma_venctocartao3 = bcadd($mes_parc,0);
}
}
else{

if($mes_parc<=9){
$soma_venctocartao3 = "0".bcadd($mes_parc,1);
}
else{
$soma_venctocartao3 = bcadd($mes_parc,1);
}
}

if($soma_venctocartao3>12){
$mes_parccartao3 = "01";
}else{
$mes_parccartao3 = $soma_venctocartao3;
}
if($soma_venctocartao3>12){
$ano_parccartao3 = bcadd($ano_parc,1);
}else{
$ano_parccartao3 = $ano_parc;
}

if(($mes_parccartao3=="02") or ($mes_parccartao3=="2")){
if($dia_vencto>="29"){
$dia_parccartao3 = "28";
}
else{
$dia_parccartao3 = $dia_vencto;
}
}
else{
	
$dia_parccartao3 = $dia_vencto;
	
}

$venctocartao3 = "$ano_parccartao3-$mes_parccartao3-$dia_parccartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc<=9){
$soma_venctocartao4 = "0".bcadd($mes_parc,0);
}
else{
$soma_venctocartao4 = bcadd($mes_parc,0);
}
}
else{

if($mes_parc<=9){
$soma_venctocartao4 = "0".bcadd($mes_parc,1);
}
else{
$soma_venctocartao4 = bcadd($mes_parc,1);
}
}

if($soma_venctocartao4>12){
$mes_parccartao4 = "01";
}else{
$mes_parccartao4 = $soma_venctocartao4;
}
if($soma_venctocartao4>12){
$ano_parccartao4 = bcadd($ano_parc,1);
}else{
$ano_parccartao4 = $ano_parc;
}

if(($mes_parccartao4=="02") or ($mes_parccartao4=="2")){
if($dia_vencto>="29"){
$dia_parccartao4 = "28";
}
else{
$dia_parccartao4 = $dia_vencto;
}
}
else{
	
$dia_parccartao4 = $dia_vencto;
	
}

$venctocartao4 = "$ano_parccartao4-$mes_parccartao4-$dia_parccartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------






if($mes_parc<=9){
$soma_vencto1 = "0".bcadd($mes_parc,1);
}
else{
$soma_vencto1 = bcadd($mes_parc,1);
}


if($soma_vencto1>12){
$mes_parc1 = "01";
}else{
$mes_parc1 = $soma_vencto1;
}
if($soma_vencto1>12){
$ano_parc1 = bcadd($ano_parc,1);
}else{
$ano_parc1 = $ano_parc;
}

if(($mes_parc1=="02") or ($mes_parc1=="2")){
if($dia_vencto>="29"){
$dia_parc1 = "28";
}
else{
$dia_parc1 = $dia_vencto;
}
}
else{
	
$dia_parc1 = $dia_vencto;
	
}

$vencto1 = "$ano_parc1-$mes_parc1-$dia_parc1";

		


if($quant_parc>=1) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto1','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";
mysql_query($comando,$conexao) or die("Erro ao gravar a 01� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$valorparcelacartao1','$venctocartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$valorparcelacartao2','$venctocartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}

if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$valorparcelacartao3','$venctocartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$valorparcelacartao4','$venctocartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$parcela_do_custo_com_cartao1','$venctocartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$parcela_do_custo_com_cartao2','$venctocartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao2 - $tipocartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$parcela_do_custo_com_cartao3','$venctocartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao3 - $tipocartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$nome_do_cliente','$cpf_do_cliente','$parcela_do_custo_com_cartao4','$venctocartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','1','$setor','$estab_pertence','$cartao4 - $tipocartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 01� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}

}







//MENSALIDADE 2--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc1<=9){
$soma_vencto2cartao1 = "0".bcadd($mes_parc1,0);
}
else{
$soma_vencto2cartao1 = bcadd($mes_parc1,0);
}
}
else{

if($mes_par1<=9){
$soma_vencto2cartao1 = "0".bcadd($mes_parc1,1);
}
else{
$soma_vencto2cartao1 = bcadd($mes_parc1,1);
}
}

if($soma_vencto2cartao1>12){
$mes_par2ccartao1 = "01";
}else{
$mes_parc2cartao1 = $soma_vencto2cartao1;
}
if($soma_vencto2cartao1>12){
$ano_parc2cartao1 = bcadd($ano_parc1,1);
}else{
$ano_parc2cartao1 = $ano_parc1;
}

if(($mes_parc2cartao1=="02") or ($mes_parc2cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc2cartao1 = "28";
}
else{
$dia_parc2cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc2cartao1 = $dia_vencto;
	
}

$vencto2cartao1 = "$ano_parc2cartao1-$mes_parc2cartao1-$dia_parc2cartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc1<=9){
$soma_vencto2cartao2 = "0".bcadd($mes_parc1,0);
}
else{
$soma_vencto2cartao2 = bcadd($mes_parc1,0);
}
}
else{

if($mes_parc1<=9){
$soma_vencto2cartao2 = "0".bcadd($mes_parc1,1);
}
else{
$soma_vencto2cartao2 = bcadd($mes_parc1,1);
}
}

if($soma_vencto2cartao2>12){
$mes_parc2cartao2 = "01";
}else{
$mes_parc2cartao2 = $soma_vencto2cartao2;
}
if($soma_vencto2cartao2>12){
$ano_parc2cartao2 = bcadd($ano_parc1,1);
}else{
$ano_parc2cartao2 = $ano_parc1;
}

if(($mes_parc2cartao2=="02") or ($mes_parc2cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc2cartao2 = "28";
}
else{
$dia_parc2cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc2cartao2 = $dia_vencto;
	
}

$vencto2cartao2 = "$ano_parc2cartao2-$mes_parc2cartao2-$dia_parc2cartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc1<=9){
$soma_vencto2cartao3 = "0".bcadd($mes_parc1,0);
}
else{
$soma_vencto2cartao3 = bcadd($mes_parc1,0);
}
}
else{

if($mes_parc1<=9){
$soma_vencto2cartao3 = "0".bcadd($mes_parc1,1);
}
else{
$soma_vencto2cartao3 = bcadd($mes_parc1,1);
}
}

if($soma_vencto2cartao3>12){
$mes_parc2cartao3 = "01";
}else{
$mes_parc2cartao3 = $soma_vencto2cartao3;
}
if($soma_vencto2cartao3>12){
$ano_parc2cartao3 = bcadd($ano_parc1,1);
}else{
$ano_parc2cartao3 = $ano_parc1;
}

if(($mes_parc2cartao3=="02") or ($mes_parc2cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc2cartao3 = "28";
}
else{
$dia_parc2cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc2cartao3 = $dia_vencto;
	
}

$vencto2cartao3 = "$ano_parc2cartao3-$mes_parc2cartao3-$dia_parc2cartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc1<=9){
$soma_vencto2cartao4 = "0".bcadd($mes_parc1,0);
}
else{
$soma_vencto2cartao4 = bcadd($mes_parc1,0);
}
}
else{

if($mes_parc1<=9){
$soma_vencto2cartao4 = "0".bcadd($mes_parc1,1);
}
else{
$soma_vencto2cartao4 = bcadd($mes_parc1,1);
}
}

if($soma_vencto2cartao4>12){
$mes_parc2cartao4 = "01";
}else{
$mes_parc2cartao4 = $soma_vencto2cartao4;
}
if($soma_vencto2cartao4>12){
$ano_parc2cartao4 = bcadd($ano_parc1,1);
}else{
$ano_parc2cartao4 = $ano_parc1;
}

if(($mes_parc2cartao4=="02") or ($mes_parc2cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc2cartao4 = "28";
}
else{
$dia_parc2cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc2cartao4 = $dia_vencto;
	
}

$vencto2cartao4 = "$ano_parc2cartao4-$mes_parc2cartao4-$dia_parc2cartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------




if($mes_parc1<=9){
$soma_vencto2 = "0".bcadd($mes_parc1,1);
}
else{
$soma_vencto2 = bcadd($mes_parc1,1);
}
if($soma_vencto2>12){
$mes_parc2 = "01";
}else{
$mes_parc2 = $soma_vencto2;
}
if($soma_vencto2>12){
$ano_parc2 = bcadd($ano_parc1,1);
}else{
$ano_parc2 = $ano_parc1;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc2=="02") or ($mes_parc2=="2")){
if($dia_vencto>="29"){
$dia_parc2 = "28";
}
else{
$dia_parc2 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc2 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc2=="02") or ($mes_parc2=="2")){
if($dia_vencto>="29"){
$dia_parc2 = "28";
}
else{
$dia_parc2 = $dia_vencto;
}
}
else{
	
$dia_parc2 = $dia_vencto;
	
}

}
$vencto2 = "$ano_parc2-$mes_parc2-$dia_parc2";
		
		

if($quant_parc>=2) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valor_monetario_a_informar','$vencto2','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto2cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto2cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}

if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto2cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto2cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto2cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto2cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao2 - $tipocartao2')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto2cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao3 - $tipocartao3')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto2cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','2','$setor','$estab_pertence','$cartao4 - $tipocartao4')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 02� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}







//MENSALIDADE 3--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc2<=9){
$soma_vencto3cartao1 = "0".bcadd($mes_parc2,0);
}
else{
$soma_vencto3cartao1 = bcadd($mes_parc2,0);
}
}
else{

if($mes_par2<=9){
$soma_vencto3cartao1 = "0".bcadd($mes_parc2,1);
}
else{
$soma_vencto3cartao1 = bcadd($mes_parc2,1);
}
}

if($soma_vencto3cartao1>12){
$mes_par3ccartao1 = "01";
}else{
$mes_parc3cartao1 = $soma_vencto3cartao1;
}
if($soma_vencto3cartao1>12){
$ano_parc3cartao1 = bcadd($ano_parc2,1);
}else{
$ano_parc3cartao1 = $ano_parc2;
}

if(($mes_parc3cartao1=="02") or ($mes_parc3cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc3cartao1 = "28";
}
else{
$dia_parc3cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc3cartao1 = $dia_vencto;
	
}

$vencto3cartao1 = "$ano_parc3cartao1-$mes_parc3cartao1-$dia_parc3cartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc2<=9){
$soma_vencto3cartao2 = "0".bcadd($mes_parc2,0);
}
else{
$soma_vencto3cartao2 = bcadd($mes_parc2,0);
}
}
else{

if($mes_parc2<=9){
$soma_vencto3cartao2 = "0".bcadd($mes_parc2,1);
}
else{
$soma_vencto3cartao2 = bcadd($mes_parc2,1);
}
}

if($soma_vencto3cartao2>12){
$mes_parc3cartao2 = "01";
}else{
$mes_parc3cartao2 = $soma_vencto3cartao2;
}
if($soma_vencto3cartao2>12){
$ano_parc3cartao2 = bcadd($ano_parc2,1);
}else{
$ano_parc3cartao2 = $ano_parc2;
}

if(($mes_parc3cartao2=="02") or ($mes_parc3cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc3cartao2 = "28";
}
else{
$dia_parc3cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc3cartao2 = $dia_vencto;
	
}

$vencto3cartao2 = "$ano_parc3cartao2-$mes_parc3cartao2-$dia_parc3cartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc2<=9){
$soma_vencto3cartao3 = "0".bcadd($mes_parc2,0);
}
else{
$soma_vencto3cartao3 = bcadd($mes_parc2,0);
}
}
else{

if($mes_parc2<=9){
$soma_vencto3cartao3 = "0".bcadd($mes_parc2,1);
}
else{
$soma_vencto3cartao3 = bcadd($mes_parc2,1);
}
}

if($soma_vencto3cartao3>12){
$mes_parc3cartao3 = "01";
}else{
$mes_parc3cartao3 = $soma_vencto3cartao3;
}
if($soma_vencto3cartao3>12){
$ano_parc3cartao3 = bcadd($ano_parc2,1);
}else{
$ano_parc3cartao3 = $ano_parc2;
}

if(($mes_parc3cartao3=="02") or ($mes_parc3cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc3cartao3 = "28";
}
else{
$dia_parc3cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc3cartao3 = $dia_vencto;
	
}

$vencto3cartao3 = "$ano_parc3cartao3-$mes_parc3cartao3-$dia_parc3cartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc2<=9){
$soma_vencto3cartao4 = "0".bcadd($mes_parc2,0);
}
else{
$soma_vencto3cartao4 = bcadd($mes_parc2,0);
}
}
else{

if($mes_parc2<=9){
$soma_vencto3cartao4 = "0".bcadd($mes_parc2,1);
}
else{
$soma_vencto3cartao4 = bcadd($mes_parc2,1);
}
}

if($soma_vencto3cartao4>12){
$mes_parc3cartao4 = "01";
}else{
$mes_parc3cartao4 = $soma_vencto3cartao4;
}
if($soma_vencto3cartao4>12){
$ano_parc3cartao4 = bcadd($ano_parc2,1);
}else{
$ano_parc3cartao4 = $ano_parc2;
}

if(($mes_parc3cartao4=="02") or ($mes_parc3cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc3cartao4 = "28";
}
else{
$dia_parc3cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc3cartao4 = $dia_vencto;
	
}

$vencto3cartao4 = "$ano_parc3cartao4-$mes_parc3cartao4-$dia_parc3cartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------


if($mes_parc2<=9){
$soma_vencto3 = "0".bcadd($mes_parc2,1);
}
else{
$soma_vencto3 = bcadd($mes_parc2,1);
}
if($soma_vencto3>12){
$mes_parc3 = "01";
}else{
$mes_parc3 = $soma_vencto3;
}
if($soma_vencto3>12){
$ano_parc3 = bcadd($ano_parc2,1);
}else{
$ano_parc3 = $ano_parc2;
}

if($modopagto=="CARTEIRA"){
	
if(($mes_parc3=="02") or ($mes_parc3=="2")){
if($dia_vencto>="29"){
$dia_parc3 = "28";
}
else{
$dia_parc3 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc3 = $dia_vencto_carteira;
	
}
	
}
else{
	
if(($mes_parc3=="02") or ($mes_parc3=="2")){
if($dia_vencto>="29"){
$dia_parc3 = "28";
}
else{
$dia_parc3 = $dia_vencto;
}
}
else{
	
$dia_parc3 = $dia_vencto;
	
}
	
}

$vencto3 = "$ano_parc3-$mes_parc3-$dia_parc3";

if($quant_parc>=3) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valor_monetario_a_informar','$vencto3','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto3cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto3cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto3cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto3cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto3cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto3cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto3cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto3cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','3','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 03� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}








//MENSALIDADE 4--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc3<=9){
$soma_vencto4cartao1 = "0".bcadd($mes_parc3,0);
}
else{
$soma_vencto4cartao1 = bcadd($mes_parc3,0);
}
}
else{

if($mes_par3<=9){
$soma_vencto4cartao1 = "0".bcadd($mes_parc3,1);
}
else{
$soma_vencto4cartao1 = bcadd($mes_parc3,1);
}
}

if($soma_vencto4cartao1>12){
$mes_par4ccartao1 = "01";
}else{
$mes_parc4cartao1 = $soma_vencto4cartao1;
}
if($soma_vencto4cartao1>12){
$ano_parc4cartao1 = bcadd($ano_parc3,1);
}else{
$ano_parc4cartao1 = $ano_parc3;
}

if(($mes_parc4cartao1=="02") or ($mes_parc4cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc4cartao1 = "28";
}
else{
$dia_parc4cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc4cartao1 = $dia_vencto;
	
}

$vencto4cartao1 = "$ano_parc4cartao1-$mes_parc4cartao1-$dia_parc4cartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc3<=9){
$soma_vencto4cartao2 = "0".bcadd($mes_parc3,0);
}
else{
$soma_vencto4cartao2 = bcadd($mes_parc3,0);
}
}
else{

if($mes_parc3<=9){
$soma_vencto4cartao2 = "0".bcadd($mes_parc3,1);
}
else{
$soma_vencto4cartao2 = bcadd($mes_parc3,1);
}
}

if($soma_vencto4cartao2>12){
$mes_parc4cartao2 = "01";
}else{
$mes_parc4cartao2 = $soma_vencto4cartao2;
}
if($soma_vencto4cartao2>12){
$ano_parc4cartao2 = bcadd($ano_parc3,1);
}else{
$ano_parc4cartao2 = $ano_parc3;
}

if(($mes_parc4cartao2=="02") or ($mes_parc4cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc4cartao2 = "28";
}
else{
$dia_parc4cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc4cartao2 = $dia_vencto;
	
}

$vencto4cartao2 = "$ano_parc4cartao2-$mes_parc4cartao2-$dia_parc4cartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc3<=9){
$soma_vencto4cartao3 = "0".bcadd($mes_parc3,0);
}
else{
$soma_vencto4cartao3 = bcadd($mes_parc3,0);
}
}
else{

if($mes_parc3<=9){
$soma_vencto4cartao3 = "0".bcadd($mes_parc3,1);
}
else{
$soma_vencto4cartao3 = bcadd($mes_parc3,1);
}
}

if($soma_vencto4cartao3>12){
$mes_parc4cartao3 = "01";
}else{
$mes_parc4cartao3 = $soma_vencto4cartao3;
}
if($soma_vencto4cartao3>12){
$ano_parc4cartao3 = bcadd($ano_parc3,1);
}else{
$ano_parc4cartao3 = $ano_parc3;
}

if(($mes_parc4cartao3=="02") or ($mes_parc4cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc4cartao3 = "28";
}
else{
$dia_parc4cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc4cartao3 = $dia_vencto;
	
}

$vencto4cartao3 = "$ano_parc4cartao3-$mes_parc4cartao3-$dia_parc4cartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc3<=9){
$soma_vencto4cartao4 = "0".bcadd($mes_parc3,0);
}
else{
$soma_vencto4cartao4 = bcadd($mes_parc3,0);
}
}
else{

if($mes_parc3<=9){
$soma_vencto4cartao4 = "0".bcadd($mes_parc3,1);
}
else{
$soma_vencto4cartao4 = bcadd($mes_parc3,1);
}
}

if($soma_vencto4cartao4>12){
$mes_parc4cartao4 = "01";
}else{
$mes_parc4cartao4 = $soma_vencto4cartao4;
}
if($soma_vencto4cartao4>12){
$ano_parc4cartao4 = bcadd($ano_parc3,1);
}else{
$ano_parc4cartao4 = $ano_parc3;
}

if(($mes_parc4cartao4=="02") or ($mes_parc4cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc4cartao4 = "28";
}
else{
$dia_parc4cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc4cartao4 = $dia_vencto;
	
}

$vencto4cartao4 = "$ano_parc4cartao4-$mes_parc4cartao4-$dia_parc4cartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------




if($mes_parc3<=9){
$soma_vencto4 = "0".bcadd($mes_parc3,1);
}
else{
$soma_vencto4 = bcadd($mes_parc3,1);
}
if($soma_vencto4>12){
$mes_parc4 = "01";
}else{
$mes_parc4 = $soma_vencto4;
}
if($soma_vencto4>12){
$ano_parc4 = bcadd($ano_parc3,1);
}else{
$ano_parc4 = $ano_parc3;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc4=="02") or ($mes_parc4=="2")){
if($dia_vencto>="29"){
$dia_parc4 = "28";
}
else{
$dia_parc4 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc4 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc4=="02") or ($mes_parc4=="2")){
if($dia_vencto>="29"){
$dia_parc4 = "28";
}
else{
$dia_parc4 = $dia_vencto;
}
}
else{
	
$dia_parc4 = $dia_vencto;
	
}
	
}

$vencto4 = "$ano_parc4-$mes_parc4-$dia_parc4";

if($quant_parc>=4) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valor_monetario_a_informar','$vencto4','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto4cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto4cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}

if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto4cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto4cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto4cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence'
,'$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto4cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence'
,'$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto4cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence'
,'$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto4cartao','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','4','$setor','$estab_pertence'
,'$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 04� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}






//MENSALIDADE 5--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc4<=9){
$soma_vencto5cartao1 = "0".bcadd($mes_parc4,0);
}
else{
$soma_vencto5cartao1 = bcadd($mes_parc4,0);
}
}
else{

if($mes_par4<=9){
$soma_vencto5cartao1 = "0".bcadd($mes_parc4,1);
}
else{
$soma_vencto5cartao1 = bcadd($mes_parc4,1);
}
}

if($soma_vencto5cartao1>12){
$mes_par5ccartao1 = "01";
}else{
$mes_parc5cartao1 = $soma_vencto5cartao1;
}
if($soma_vencto5cartao1>12){
$ano_parc5cartao1 = bcadd($ano_parc4,1);
}else{
$ano_parc5cartao1 = $ano_parc4;
}

if(($mes_parc5cartao1=="02") or ($mes_parc5cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc5cartao1 = "28";
}
else{
$dia_parc5cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc5cartao1 = $dia_vencto;
	
}

$vencto5cartao1 = "$ano_parc5cartao1-$mes_parc5cartao1-$dia_parc5cartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc4<=9){
$soma_vencto5cartao2 = "0".bcadd($mes_parc4,0);
}
else{
$soma_vencto5cartao2 = bcadd($mes_parc4,0);
}
}
else{

if($mes_parc4<=9){
$soma_vencto5cartao2 = "0".bcadd($mes_parc4,1);
}
else{
$soma_vencto5cartao2 = bcadd($mes_parc4,1);
}
}

if($soma_vencto5cartao2>12){
$mes_parc5cartao2 = "01";
}else{
$mes_parc5cartao2 = $soma_vencto5cartao2;
}
if($soma_vencto5cartao2>12){
$ano_parc5cartao2 = bcadd($ano_parc4,1);
}else{
$ano_parc5cartao2 = $ano_parc4;
}

if(($mes_parc5cartao2=="02") or ($mes_parc5cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc5cartao2 = "28";
}
else{
$dia_parc5cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc5cartao2 = $dia_vencto;
	
}

$vencto5cartao2 = "$ano_parc5cartao2-$mes_parc5cartao2-$dia_parc5cartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc4<=9){
$soma_vencto5cartao3 = "0".bcadd($mes_parc4,0);
}
else{
$soma_vencto5cartao3 = bcadd($mes_parc4,0);
}
}
else{

if($mes_parc4<=9){
$soma_vencto5cartao3 = "0".bcadd($mes_parc4,1);
}
else{
$soma_vencto5cartao3 = bcadd($mes_parc4,1);
}
}

if($soma_vencto5cartao3>12){
$mes_parc5cartao3 = "01";
}else{
$mes_parc5cartao3 = $soma_vencto5cartao3;
}
if($soma_vencto5cartao3>12){
$ano_parc5cartao3 = bcadd($ano_parc4,1);
}else{
$ano_parc5cartao3 = $ano_parc4;
}

if(($mes_parc5cartao3=="02") or ($mes_parc5cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc5cartao3 = "28";
}
else{
$dia_parc5cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc5cartao3 = $dia_vencto;
	
}

$vencto5cartao3 = "$ano_parc5cartao3-$mes_parc5cartao3-$dia_parc5cartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc4<=9){
$soma_vencto5cartao4 = "0".bcadd($mes_parc4,0);
}
else{
$soma_vencto5cartao4 = bcadd($mes_parc4,0);
}
}
else{

if($mes_parc4<=9){
$soma_vencto5cartao4 = "0".bcadd($mes_parc4,1);
}
else{
$soma_vencto5cartao4 = bcadd($mes_parc4,1);
}
}

if($soma_vencto5cartao4>12){
$mes_parc5cartao4 = "01";
}else{
$mes_parc5cartao4 = $soma_vencto5cartao4;
}
if($soma_vencto5cartao4>12){
$ano_parc5cartao4 = bcadd($ano_parc4,1);
}else{
$ano_parc5cartao4 = $ano_parc4;
}

if(($mes_parc5cartao4=="02") or ($mes_parc5cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc5cartao4 = "28";
}
else{
$dia_parc5cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc5cartao4 = $dia_vencto;
	
}

$vencto5cartao4 = "$ano_parc5cartao4-$mes_parc5cartao4-$dia_parc5cartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------




if($mes_parc4<=9){
$soma_vencto5 = "0".bcadd($mes_parc4,1);
}
else{
$soma_vencto5 = bcadd($mes_parc4,1);
}
if($soma_vencto5>12){
$mes_parc5 = "01";
}else{
$mes_parc5 = $soma_vencto5;
}
if($soma_vencto5>12){
$ano_parc5 = bcadd($ano_parc4,1);
}else{
$ano_parc5 = $ano_parc4;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc5=="02") or ($mes_parc5=="2")){
if($dia_vencto>="29"){
$dia_parc5 = "28";
}
else{
$dia_parc5 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc5 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc5=="02") or ($mes_parc5=="2")){
if($dia_vencto>="29"){
$dia_parc5 = "28";
}
else{
$dia_parc5 = $dia_vencto;
}
}
else{
	
$dia_parc5 = $dia_vencto;
	
}
	
}

$vencto5 = "$ano_parc5-$mes_parc5-$dia_parc5";

if($quant_parc>=5) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto5','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto5cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto5cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto5cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto5cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto5cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto5cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto5cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto5cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','5','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 05� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}






//MENSALIDADE 6--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc5<=9){
$soma_vencto6cartao1 = "0".bcadd($mes_parc5,0);
}
else{
$soma_vencto6cartao1 = bcadd($mes_parc5,0);
}
}
else{

if($mes_par5<=9){
$soma_vencto6cartao1 = "0".bcadd($mes_parc5,1);
}
else{
$soma_vencto6cartao1 = bcadd($mes_parc5,1);
}
}

if($soma_vencto6cartao1>12){
$mes_par6ccartao1 = "01";
}else{
$mes_parc6cartao1 = $soma_vencto6cartao1;
}
if($soma_vencto6cartao1>12){
$ano_parc6cartao1 = bcadd($ano_parc5,1);
}else{
$ano_parc6cartao1 = $ano_parc5;
}

if(($mes_parc6cartao1=="02") or ($mes_parc6cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc6cartao1 = "28";
}
else{
$dia_parc6cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc6cartao1 = $dia_vencto;
	
}

$vencto6cartao1 = "$ano_parc6cartao1-$mes_parc6cartao1-$dia_parc6cartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc5<=9){
$soma_vencto6cartao2 = "0".bcadd($mes_parc5,0);
}
else{
$soma_vencto6cartao2 = bcadd($mes_parc5,0);
}
}
else{

if($mes_parc5<=9){
$soma_vencto6cartao2 = "0".bcadd($mes_parc5,1);
}
else{
$soma_vencto6cartao2 = bcadd($mes_parc5,1);
}
}

if($soma_vencto6cartao2>12){
$mes_parc6cartao2 = "01";
}else{
$mes_parc6cartao2 = $soma_vencto6cartao2;
}
if($soma_vencto6cartao2>12){
$ano_parc6cartao2 = bcadd($ano_parc5,1);
}else{
$ano_parc6cartao2 = $ano_parc5;
}

if(($mes_parc6cartao2=="02") or ($mes_parc6cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc6cartao2 = "28";
}
else{
$dia_parc6cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc6cartao2 = $dia_vencto;
	
}

$vencto6cartao2 = "$ano_parc6cartao2-$mes_parc6cartao2-$dia_parc6cartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc5<=9){
$soma_vencto6cartao3 = "0".bcadd($mes_parc5,0);
}
else{
$soma_vencto6cartao3 = bcadd($mes_parc5,0);
}
}
else{

if($mes_parc5<=9){
$soma_vencto6cartao3 = "0".bcadd($mes_parc5,1);
}
else{
$soma_vencto6cartao3 = bcadd($mes_parc5,1);
}
}

if($soma_vencto6cartao3>12){
$mes_parc6cartao3 = "01";
}else{
$mes_parc6cartao3 = $soma_vencto6cartao3;
}
if($soma_vencto6cartao3>12){
$ano_parc6cartao3 = bcadd($ano_parc5,1);
}else{
$ano_parc6cartao3 = $ano_parc5;
}

if(($mes_parc6cartao3=="02") or ($mes_parc6cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc6cartao3 = "28";
}
else{
$dia_parc6cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc6cartao3 = $dia_vencto;
	
}

$vencto6cartao3 = "$ano_parc6cartao3-$mes_parc6cartao3-$dia_parc6cartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc5<=9){
$soma_vencto6cartao4 = "0".bcadd($mes_parc5,0);
}
else{
$soma_vencto6cartao4 = bcadd($mes_parc5,0);
}
}
else{

if($mes_parc5<=9){
$soma_vencto6cartao4 = "0".bcadd($mes_parc5,1);
}
else{
$soma_vencto6cartao4 = bcadd($mes_parc5,1);
}
}

if($soma_vencto6cartao4>12){
$mes_parc6cartao4 = "01";
}else{
$mes_parc6cartao4 = $soma_vencto6cartao4;
}
if($soma_vencto6cartao4>12){
$ano_parc6cartao4 = bcadd($ano_parc5,1);
}else{
$ano_parc6cartao4 = $ano_parc5;
}

if(($mes_parc6cartao4=="02") or ($mes_parc6cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc6cartao4 = "28";
}
else{
$dia_parc6cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc6cartao4 = $dia_vencto;
	
}

$vencto6cartao4 = "$ano_parc6cartao4-$mes_parc6cartao4-$dia_parc6cartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------





if($mes_parc5<=9){
$soma_vencto6 = "0".bcadd($mes_parc5,1);
}
else{
$soma_vencto6 = bcadd($mes_parc5,1);
}
if($soma_vencto6>12){
$mes_parc6 = "01";
}else{
$mes_parc6 = $soma_vencto6;
}
if($soma_vencto6>12){
$ano_parc6 = bcadd($ano_parc5,1);
}else{
$ano_parc6 = $ano_parc5;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc6=="02") or ($mes_parc6=="2")){
if($dia_vencto>="29"){
$dia_parc6 = "28";
}
else{
$dia_parc6 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc6 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc6=="02") or ($mes_parc6=="2")){
if($dia_vencto>="29"){
$dia_parc6 = "28";
}
else{
$dia_parc6 = $dia_vencto;
}
}
else{
	
$dia_parc6 = $dia_vencto;
	
}
	
}

$vencto6 = "$ano_parc6-$mes_parc6-$dia_parc6";

if($quant_parc>=6) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto6','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	

if(empty($valorcartao)){
}
else{
	
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto6cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto6cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto6cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto6cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto6cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto6cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto6cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto6cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','6','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 06� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}






//MENSALIDADE 7--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc6<=9){
$soma_vencto7cartao1 = "0".bcadd($mes_parc6,0);
}
else{
$soma_vencto7cartao1 = bcadd($mes_parc6,0);
}
}
else{

if($mes_par6<=9){
$soma_vencto7cartao1 = "0".bcadd($mes_parc6,1);
}
else{
$soma_vencto7cartao1 = bcadd($mes_parc6,1);
}
}

if($soma_vencto7cartao1>12){
$mes_par7ccartao1 = "01";
}else{
$mes_parc7cartao1 = $soma_vencto7cartao1;
}
if($soma_vencto7cartao1>12){
$ano_parc7cartao1 = bcadd($ano_parc6,1);
}else{
$ano_parc7cartao1 = $ano_parc6;
}

if(($mes_parc7cartao1=="02") or ($mes_parc7cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc7cartao1 = "28";
}
else{
$dia_parc7cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc7cartao1 = $dia_vencto;
	
}

$vencto7cartao1 = "$ano_parc7cartao1-$mes_parc7cartao1-$dia_parc7cartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc6<=9){
$soma_vencto7cartao2 = "0".bcadd($mes_parc6,0);
}
else{
$soma_vencto7cartao2 = bcadd($mes_parc6,0);
}
}
else{

if($mes_parc6<=9){
$soma_vencto7cartao2 = "0".bcadd($mes_parc6,1);
}
else{
$soma_vencto7cartao2 = bcadd($mes_parc6,1);
}
}

if($soma_vencto7cartao2>12){
$mes_parc7cartao2 = "01";
}else{
$mes_parc7cartao2 = $soma_vencto7cartao2;
}
if($soma_vencto7cartao2>12){
$ano_parc7cartao2 = bcadd($ano_parc6,1);
}else{
$ano_parc7cartao2 = $ano_parc6;
}

if(($mes_parc7cartao2=="02") or ($mes_parc7cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc7cartao2 = "28";
}
else{
$dia_parc7cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc7cartao2 = $dia_vencto;
	
}

$vencto7cartao2 = "$ano_parc7cartao2-$mes_parc7cartao2-$dia_parc7cartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc6<=9){
$soma_vencto7cartao3 = "0".bcadd($mes_parc6,0);
}
else{
$soma_vencto7cartao3 = bcadd($mes_parc6,0);
}
}
else{

if($mes_parc6<=9){
$soma_vencto7cartao3 = "0".bcadd($mes_parc6,1);
}
else{
$soma_vencto7cartao3 = bcadd($mes_parc6,1);
}
}

if($soma_vencto7cartao3>12){
$mes_parc7cartao3 = "01";
}else{
$mes_parc7cartao3 = $soma_vencto7cartao3;
}
if($soma_vencto7cartao3>12){
$ano_parc7cartao3 = bcadd($ano_parc6,1);
}else{
$ano_parc7cartao3 = $ano_parc6;
}

if(($mes_parc7cartao3=="02") or ($mes_parc7cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc7cartao3 = "28";
}
else{
$dia_parc7cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc7cartao3 = $dia_vencto;
	
}

$vencto7cartao3 = "$ano_parc7cartao3-$mes_parc7cartao3-$dia_parc7cartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc6<=9){
$soma_vencto7cartao4 = "0".bcadd($mes_parc6,0);
}
else{
$soma_vencto7cartao4 = bcadd($mes_parc6,0);
}
}
else{

if($mes_parc6<=9){
$soma_vencto7cartao4 = "0".bcadd($mes_parc6,1);
}
else{
$soma_vencto7cartao4 = bcadd($mes_parc6,1);
}
}

if($soma_vencto7cartao4>12){
$mes_parc7cartao4 = "01";
}else{
$mes_parc7cartao4 = $soma_vencto7cartao4;
}
if($soma_vencto7cartao4>12){
$ano_parc7cartao4 = bcadd($ano_parc6,1);
}else{
$ano_parc7cartao4 = $ano_parc6;
}

if(($mes_parc7cartao4=="02") or ($mes_parc7cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc7cartao4 = "28";
}
else{
$dia_parc7cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc7cartao4 = $dia_vencto;
	
}

$vencto7cartao4 = "$ano_parc7cartao4-$mes_parc7cartao4-$dia_parc7cartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------





if($mes_parc6<=9){
$soma_vencto7 = "0".bcadd($mes_parc6,1);
}
else{
$soma_vencto7 = bcadd($mes_parc6,1);
}
if($soma_vencto7>12){
$mes_parc7 = "01";

}else{
$mes_parc7 = $soma_vencto7;
}

if($soma_vencto7>12){
$ano_parc7 = bcadd($ano_parc6,1);
}else{
$ano_parc7 = $ano_parc6;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc7=="02") or ($mes_parc7=="2")){
if($dia_vencto>="29"){
$dia_parc7 = "28";
}
else{
$dia_parc7 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc7 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc7=="02") or ($mes_parc7=="2")){
if($dia_vencto>="29"){
$dia_parc7 = "28";
}
else{
$dia_parc7 = $dia_vencto;
}
}
else{
	
$dia_parc7 = $dia_vencto;
	
}
	
}

$vencto7 = "$ano_parc7-$mes_parc7-$dia_parc7";

//echo $vencto6;

if($quant_parc>=7) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto7','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto7cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto7cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto7cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto7cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto7cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto7cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto7cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto7cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','7','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 07� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}





//MENSALIDADE 8--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc7<=9){
$soma_vencto8cartao1 = "0".bcadd($mes_parc7,0);
}
else{
$soma_vencto8cartao1 = bcadd($mes_parc7,0);
}
}
else{

if($mes_par7<=9){
$soma_vencto8cartao1 = "0".bcadd($mes_parc7,1);
}
else{
$soma_vencto8cartao1 = bcadd($mes_parc7,1);
}
}

if($soma_vencto8cartao1>12){
$mes_par8ccartao1 = "01";
}else{
$mes_parc8cartao1 = $soma_vencto8cartao1;
}
if($soma_vencto8cartao1>12){
$ano_parc8cartao1 = bcadd($ano_parc7,1);
}else{
$ano_parc8cartao1 = $ano_parc7;
}

if(($mes_parc8cartao1=="02") or ($mes_parc8cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc8cartao1 = "28";
}
else{
$dia_parc8cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc8cartao1 = $dia_vencto;
	
}

$vencto8cartao1 = "$ano_parc8cartao1-$mes_parc8cartao1-$dia_parc8cartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc7<=9){
$soma_vencto8cartao2 = "0".bcadd($mes_parc7,0);
}
else{
$soma_vencto8cartao2 = bcadd($mes_parc7,0);
}
}
else{

if($mes_parc7<=9){
$soma_vencto8cartao2 = "0".bcadd($mes_parc7,1);
}
else{
$soma_vencto8cartao2 = bcadd($mes_parc7,1);
}
}

if($soma_vencto8cartao2>12){
$mes_parc8cartao2 = "01";
}else{
$mes_parc8cartao2 = $soma_vencto8cartao2;
}
if($soma_vencto8cartao2>12){
$ano_parc8cartao2 = bcadd($ano_parc7,1);
}else{
$ano_parc8cartao2 = $ano_parc7;
}

if(($mes_parc8cartao2=="02") or ($mes_parc8cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc8cartao2 = "28";
}
else{
$dia_parc8cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc8cartao2 = $dia_vencto;
	
}

$vencto8cartao2 = "$ano_parc8cartao2-$mes_parc8cartao2-$dia_parc8cartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc7<=9){
$soma_vencto8cartao3 = "0".bcadd($mes_parc7,0);
}
else{
$soma_vencto8cartao3 = bcadd($mes_parc7,0);
}
}
else{

if($mes_parc7<=9){
$soma_vencto8cartao3 = "0".bcadd($mes_parc7,1);
}
else{
$soma_vencto8cartao3 = bcadd($mes_parc7,1);
}
}

if($soma_vencto8cartao3>12){
$mes_parc8cartao3 = "01";
}else{
$mes_parc8cartao3 = $soma_vencto8cartao3;
}
if($soma_vencto8cartao3>12){
$ano_parc8cartao3 = bcadd($ano_parc7,1);
}else{
$ano_parc8cartao3 = $ano_parc7;
}

if(($mes_parc8cartao3=="02") or ($mes_parc8cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc8cartao3 = "28";
}
else{
$dia_parc8cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc8cartao3 = $dia_vencto;
	
}

$vencto8cartao3 = "$ano_parc8cartao3-$mes_parc8cartao3-$dia_parc8cartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc7<=9){
$soma_vencto8cartao4 = "0".bcadd($mes_parc7,0);
}
else{
$soma_vencto8cartao4 = bcadd($mes_parc7,0);
}
}
else{

if($mes_parc7<=9){
$soma_vencto8cartao4 = "0".bcadd($mes_parc7,1);
}
else{
$soma_vencto8cartao4 = bcadd($mes_parc7,1);
}
}

if($soma_vencto8cartao4>12){
$mes_parc8cartao4 = "01";
}else{
$mes_parc8cartao4 = $soma_vencto8cartao4;
}
if($soma_vencto8cartao4>12){
$ano_parc8cartao4 = bcadd($ano_parc7,1);
}else{
$ano_parc8cartao4 = $ano_parc7;
}

if(($mes_parc8cartao4=="02") or ($mes_parc8cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc8cartao4 = "28";
}
else{
$dia_parc8cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc8cartao4 = $dia_vencto;
	
}

$vencto8cartao4 = "$ano_parc8cartao4-$mes_parc8cartao4-$dia_parc8cartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------





if($mes_parc7<=9){
$soma_vencto8 = "0".bcadd($mes_parc7,1);
}
else{
$soma_vencto8 = bcadd($mes_parc7,1);
}
if($soma_vencto8>12){
$mes_parc8 = "01";

}else{
$mes_parc8 = $soma_vencto8;
}
if($soma_vencto8>12){
$ano_parc8 = bcadd($ano_parc7,1);
}else{
$ano_parc8 = $ano_parc7;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc8==02) or ($mes_parc8==2)){
if($dia_vencto>="29"){
$dia_parc8 = "28";
}
else{
$dia_parc8 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc8 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc8==02) or ($mes_parc8==2)){
if($dia_vencto>="29"){
$dia_parc8 = "28";
}
else{
$dia_parc8 = $dia_vencto;
}
}
else{
	
$dia_parc8 = $dia_vencto;
	
}
	
}

$vencto8 = "$ano_parc8-$mes_parc8-$dia_parc8";

if($quant_parc>=8){
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto8','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto8cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto8cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto8cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto8cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto8cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto8cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto8cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto8cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','8','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 08� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}






//MENSALIDADE 9--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc8<=9){
$soma_vencto9cartao1 = "0".bcadd($mes_parc8,0);
}
else{
$soma_vencto9cartao1 = bcadd($mes_parc8,0);
}
}
else{

if($mes_par8<=9){
$soma_vencto9cartao1 = "0".bcadd($mes_parc8,1);
}
else{
$soma_vencto9cartao1 = bcadd($mes_parc8,1);
}
}

if($soma_vencto9cartao1>12){
$mes_par9ccartao1 = "01";
}else{
$mes_parc9cartao1 = $soma_vencto9cartao1;
}
if($soma_vencto9cartao1>12){
$ano_parc9cartao1 = bcadd($ano_parc8,1);
}else{
$ano_parc9cartao1 = $ano_parc8;
}

if(($mes_parc9cartao1=="02") or ($mes_parc9cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc9cartao1 = "28";
}
else{
$dia_parc9cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc9cartao1 = $dia_vencto;
	
}

$vencto9cartao1 = "$ano_parc9cartao1-$mes_parc9cartao1-$dia_parc9cartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc8<=9){
$soma_vencto9cartao2 = "0".bcadd($mes_parc8,0);
}
else{
$soma_vencto9cartao2 = bcadd($mes_parc8,0);
}
}
else{

if($mes_parc8<=9){
$soma_vencto9cartao2 = "0".bcadd($mes_parc8,1);
}
else{
$soma_vencto9cartao2 = bcadd($mes_parc8,1);
}
}

if($soma_vencto9cartao2>12){
$mes_parc9cartao2 = "01";
}else{
$mes_parc9cartao2 = $soma_vencto9cartao2;
}
if($soma_vencto9cartao2>12){
$ano_parc9cartao2 = bcadd($ano_parc8,1);
}else{
$ano_parc9cartao2 = $ano_parc8;
}

if(($mes_parc9cartao2=="02") or ($mes_parc9cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc9cartao2 = "28";
}
else{
$dia_parc9cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc9cartao2 = $dia_vencto;
	
}

$vencto9cartao2 = "$ano_parc9cartao2-$mes_parc9cartao2-$dia_parc9cartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc8<=9){
$soma_vencto9cartao3 = "0".bcadd($mes_parc8,0);
}
else{
$soma_vencto9cartao3 = bcadd($mes_parc8,0);
}
}
else{

if($mes_parc8<=9){
$soma_vencto9cartao3 = "0".bcadd($mes_parc8,1);
}
else{
$soma_vencto9cartao3 = bcadd($mes_parc8,1);
}
}

if($soma_vencto9cartao3>12){
$mes_parc9cartao3 = "01";
}else{
$mes_parc9cartao3 = $soma_vencto9cartao3;
}
if($soma_vencto9cartao3>12){
$ano_parc9cartao3 = bcadd($ano_parc8,1);
}else{
$ano_parc9cartao3 = $ano_parc8;
}

if(($mes_parc9cartao3=="02") or ($mes_parc9cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc9cartao3 = "28";
}
else{
$dia_parc9cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc9cartao3 = $dia_vencto;
	
}

$vencto9cartao3 = "$ano_parc9cartao3-$mes_parc9cartao3-$dia_parc9cartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc8<=9){
$soma_vencto9cartao4 = "0".bcadd($mes_parc8,0);
}
else{
$soma_vencto9cartao4 = bcadd($mes_parc8,0);
}
}
else{

if($mes_parc8<=9){
$soma_vencto9cartao4 = "0".bcadd($mes_parc8,1);
}
else{
$soma_vencto9cartao4 = bcadd($mes_parc8,1);
}
}

if($soma_vencto9cartao4>12){
$mes_parc9cartao4 = "01";
}else{
$mes_parc9cartao4 = $soma_vencto9cartao4;
}
if($soma_vencto9cartao4>12){
$ano_parc9cartao4 = bcadd($ano_parc8,1);
}else{
$ano_parc9cartao4 = $ano_parc8;
}

if(($mes_parc9cartao4=="02") or ($mes_parc9cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc9cartao4 = "28";
}
else{
$dia_parc9cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc9cartao4 = $dia_vencto;
	
}

$vencto9cartao4 = "$ano_parc9cartao4-$mes_parc9cartao4-$dia_parc9cartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------




if($mes_parc8<=9){
$soma_vencto9 = "0".bcadd($mes_parc8,1);
}
else{
$soma_vencto9 = bcadd($mes_parc8,1);
}
if($soma_vencto9>12){
$mes_parc9 = "01";
}else{
$mes_parc9 = $soma_vencto9;
}
if($soma_vencto9>12){
$ano_parc9 = bcadd($ano_parc8,1);
}else{
$ano_parc9 = $ano_parc8;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc9=="02") or ($mes_parc9=="2")){
if($dia_vencto>="29"){
$dia_parc9 = "28";
}
else{
$dia_parc9 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc9 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc9=="02") or ($mes_parc9=="2")){
if($dia_vencto>="29"){
$dia_parc9 = "28";
}
else{
$dia_parc9 = $dia_vencto;
}
}
else{
	
$dia_parc9 = $dia_vencto;
	
}
	
}

$vencto9 = "$ano_parc9-$mes_parc9-$dia_parc9";

if($quant_parc>=9) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto9','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto9cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto9cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto9cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto9cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto9cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto9cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto9cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto9cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','9','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 09� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}

//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

}


}





//MENSALIDADE 10--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc9<=9){
$soma_vencto10cartao1 = "0".bcadd($mes_parc9,0);
}
else{
$soma_vencto10cartao1 = bcadd($mes_parc9,0);
}
}
else{

if($mes_par9<=9){
$soma_vencto10cartao1 = "0".bcadd($mes_parc9,1);
}
else{
$soma_vencto9cartao1 = bcadd($mes_parc9,1);
}
}

if($soma_vencto10cartao1>12){
$mes_par10ccartao1 = "01";
}else{
$mes_parc10cartao1 = $soma_vencto10cartao1;
}
if($soma_vencto10cartao1>12){
$ano_parc10cartao1 = bcadd($ano_parc9,1);
}else{
$ano_parc10cartao1 = $ano_parc9;
}

if(($mes_parc10cartao1=="02") or ($mes_parc10cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc10cartao1 = "28";
}
else{
$dia_parc10cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc10cartao1 = $dia_vencto;
	
}

$vencto10cartao1 = "$ano_parc10cartao1-$mes_parc10cartao1-$dia_parc10cartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc9<=9){
$soma_vencto10cartao2 = "0".bcadd($mes_parc9,0);
}
else{
$soma_vencto10cartao2 = bcadd($mes_parc9,0);
}
}
else{

if($mes_parc9<=9){
$soma_vencto10cartao2 = "0".bcadd($mes_parc9,1);
}
else{
$soma_vencto10cartao2 = bcadd($mes_parc9,1);
}
}

if($soma_vencto10cartao2>12){
$mes_parc10cartao2 = "01";
}else{
$mes_parc10cartao2 = $soma_vencto10cartao2;
}
if($soma_vencto10cartao2>12){
$ano_parc10cartao2 = bcadd($ano_parc9,1);
}else{
$ano_parc10cartao2 = $ano_parc9;
}

if(($mes_parc10cartao2=="02") or ($mes_parc10cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc10cartao2 = "28";
}
else{
$dia_parc10cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc10cartao2 = $dia_vencto;
	
}

$vencto10cartao2 = "$ano_parc10cartao2-$mes_parc10cartao2-$dia_parc10cartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc9<=9){
$soma_vencto10cartao3 = "0".bcadd($mes_parc9,0);
}
else{
$soma_vencto10cartao3 = bcadd($mes_parc9,0);
}
}
else{

if($mes_parc9<=9){
$soma_vencto10cartao3 = "0".bcadd($mes_parc9,1);
}
else{
$soma_vencto10cartao3 = bcadd($mes_parc9,1);
}
}

if($soma_vencto10cartao3>12){
$mes_parc10cartao3 = "01";
}else{
$mes_parc10cartao3 = $soma_vencto10cartao3;
}
if($soma_vencto10cartao3>12){
$ano_parc10cartao3 = bcadd($ano_parc9,1);
}else{
$ano_parc10cartao3 = $ano_parc9;
}

if(($mes_parc10cartao3=="02") or ($mes_parc10cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc10cartao3 = "28";
}
else{
$dia_parc10cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc10cartao3 = $dia_vencto;
	
}

$vencto10cartao3 = "$ano_parc10cartao3-$mes_parc10cartao3-$dia_parc10cartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc9<=9){
$soma_vencto10cartao4 = "0".bcadd($mes_parc9,0);
}
else{
$soma_vencto10cartao4 = bcadd($mes_parc9,0);
}
}
else{

if($mes_parc9<=9){
$soma_vencto10cartao4 = "0".bcadd($mes_parc9,1);
}
else{
$soma_vencto10cartao4 = bcadd($mes_parc9,1);
}
}

if($soma_vencto10cartao4>12){
$mes_parc10cartao4 = "01";
}else{
$mes_parc10cartao4 = $soma_vencto10cartao4;
}
if($soma_vencto10cartao4>12){
$ano_parc10cartao4 = bcadd($ano_parc9,1);
}else{
$ano_parc10cartao4 = $ano_parc9;
}

if(($mes_parc10cartao4=="02") or ($mes_parc10cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc10cartao4 = "28";
}
else{
$dia_parc10cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc10cartao4 = $dia_vencto;
	
}

$vencto10cartao4 = "$ano_parc10cartao4-$mes_parc10cartao4-$dia_parc10cartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------





if($mes_parc9<=9){
$soma_vencto10 = "0".bcadd($mes_parc9,1);
}
else{
$soma_vencto10 = bcadd($mes_parc9,1);
}
if($soma_vencto10>12){
$mes_parc10 = "01";
}else{
$mes_parc10 = $soma_vencto10;
}
if($soma_vencto10>12){
$ano_parc10 = bcadd($ano_parc9,1);
}else{
$ano_parc10 = $ano_parc9;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc10=="02") or ($mes_parc10=="2")){
if($dia_vencto>="29"){
$dia_parc10 = "28";
}
else{
$dia_parc10 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc10 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc10=="02") or ($mes_parc10=="2")){
if($dia_vencto>="29"){
$dia_parc10 = "28";
}
else{
$dia_parc10 = $dia_vencto;
}
}
else{
	
$dia_parc10 = $dia_vencto;
	
}
	
}

$vencto10 = "$ano_parc10-$mes_parc10-$dia_parc10";

if($quant_parc>=10){
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto10','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto10cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto10cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto10cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto10cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto10cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto10cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto10cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto10cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','10','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 10� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}
}}
//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------
	
		
		
		
//MENSALIDADE 11--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc10<=9){
$soma_vencto11cartao1 = "0".bcadd($mes_parc10,0);
}
else{
$soma_vencto11cartao1 = bcadd($mes_parc10,0);
}
}
else{

if($mes_par10<=9){
$soma_vencto11cartao1 = "0".bcadd($mes_parc10,1);
}
else{
$soma_vencto11cartao1 = bcadd($mes_parc10,1);
}
}

if($soma_vencto11cartao1>12){
$mes_par11ccartao1 = "01";
}else{
$mes_parc11cartao1 = $soma_vencto11cartao1;
}
if($soma_vencto11cartao1>12){
$ano_parc11cartao1 = bcadd($ano_parc10,1);
}else{
$ano_parc11cartao1 = $ano_parc10;
}

if(($mes_parc11cartao1=="02") or ($mes_parc11cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc11cartao1 = "28";
}
else{
$dia_parc11cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc11cartao1 = $dia_vencto;
	
}

$vencto11cartao1 = "$ano_parc11cartao1-$mes_parc11cartao1-$dia_parc11cartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc10<=9){
$soma_vencto11cartao2 = "0".bcadd($mes_parc10,0);
}
else{
$soma_vencto11cartao2 = bcadd($mes_parc10,0);
}
}
else{

if($mes_parc10<=9){
$soma_vencto11cartao2 = "0".bcadd($mes_parc10,1);
}
else{
$soma_vencto11cartao2 = bcadd($mes_parc10,1);
}
}

if($soma_vencto11cartao2>12){
$mes_parc11cartao2 = "01";
}else{
$mes_parc11cartao2 = $soma_vencto11cartao2;
}
if($soma_vencto11cartao2>12){
$ano_parc11cartao2 = bcadd($ano_parc10,1);
}else{
$ano_parc11cartao2 = $ano_parc10;
}

if(($mes_parc11cartao2=="02") or ($mes_parc11cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc11cartao2 = "28";
}
else{
$dia_parc11cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc11cartao2 = $dia_vencto;
	
}

$vencto11cartao2 = "$ano_parc11cartao2-$mes_parc11cartao2-$dia_parc11cartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc10<=9){
$soma_vencto11cartao3 = "0".bcadd($mes_parc10,0);
}
else{
$soma_vencto11cartao3 = bcadd($mes_parc10,0);
}
}
else{

if($mes_parc10<=9){
$soma_vencto11cartao3 = "0".bcadd($mes_parc10,1);
}
else{
$soma_vencto11cartao3 = bcadd($mes_parc10,1);
}
}

if($soma_vencto11cartao3>12){
$mes_parc11cartao3 = "01";
}else{
$mes_parc11cartao3 = $soma_vencto11cartao3;
}
if($soma_vencto11cartao3>12){
$ano_parc11cartao3 = bcadd($ano_parc10,1);
}else{
$ano_parc11cartao3 = $ano_parc10;
}

if(($mes_parc11cartao3=="02") or ($mes_parc11cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc11cartao3 = "28";
}
else{
$dia_parc11cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc11cartao3 = $dia_vencto;
	
}

$vencto11cartao3 = "$ano_parc11cartao3-$mes_parc11cartao3-$dia_parc11cartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc10<=9){
$soma_vencto11cartao4 = "0".bcadd($mes_parc10,0);
}
else{
$soma_vencto11cartao4 = bcadd($mes_parc10,0);
}
}
else{

if($mes_parc10<=9){
$soma_vencto11cartao4 = "0".bcadd($mes_parc10,1);
}
else{
$soma_vencto11cartao4 = bcadd($mes_parc10,1);
}
}

if($soma_vencto11cartao4>12){
$mes_parc11cartao4 = "01";
}else{
$mes_parc11cartao4 = $soma_vencto11cartao4;
}
if($soma_vencto11cartao4>12){
$ano_parc11cartao4 = bcadd($ano_parc10,1);
}else{
$ano_parc11cartao4 = $ano_parc10;
}

if(($mes_parc11cartao4=="02") or ($mes_parc11cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc11cartao4 = "28";
}
else{
$dia_parc11cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc11cartao4 = $dia_vencto;
	
}

$vencto11cartao4 = "$ano_parc11cartao4-$mes_parc11cartao4-$dia_parc11cartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------





if($mes_parc10<=9){
$soma_vencto11 = "0".bcadd($mes_parc10,1);
}
else{
$soma_vencto11 = bcadd($mes_parc10,1);
}
if($soma_vencto11>12){
$mes_parc11 = "01";
}else{
$mes_parc11 = $soma_vencto11;
}
if($soma_vencto11>12){
$ano_parc11 = bcadd($ano_parc10,1);
}else{
$ano_parc11 = $ano_parc10;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc11=="02") or ($mes_parc11=="2")){
if($dia_vencto>="29"){
$dia_parc11 = "28";
}
else{
$dia_parc11 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc11 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc11=="02") or ($mes_parc11=="2")){
if($dia_vencto>="29"){
$dia_parc11 = "28";
}
else{
$dia_parc11 = $dia_vencto;
}
}
else{
	
$dia_parc11 = $dia_vencto;
	
}
	
}

$vencto11 = "$ano_parc11-$mes_parc11-$dia_parc11";

if($quant_parc>=11) {
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto11','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto11cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto11cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto11cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto11cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao14','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto11cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto11cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto11cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto11cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','11','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 11� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}
}}
//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

		
		
		
	
//MENSALIDADE 12--------

//---------verificando o tipo do cartao 1--------------

if($tipocartao == "CARTAO DE DEBITO"){
	
if($mes_parc11<=9){
$soma_vencto12cartao1 = "0".bcadd($mes_parc11,0);
}
else{
$soma_vencto12cartao1 = bcadd($mes_parc11,0);
}
}
else{

if($mes_par11<=9){
$soma_vencto12cartao1 = "0".bcadd($mes_parc11,1);
}
else{
$soma_vencto12cartao1 = bcadd($mes_parc11,1);
}
}

if($soma_vencto12cartao1>12){
$mes_par12ccartao1 = "01";
}else{
$mes_parc12cartao1 = $soma_vencto12cartao1;
}
if($soma_vencto12cartao1>12){
$ano_parc12cartao1 = bcadd($ano_parc11,1);
}else{
$ano_parc12cartao1 = $ano_parc11;
}

if(($mes_parc12cartao1=="02") or ($mes_parc12cartao1=="2")){
if($dia_vencto>="29"){
$dia_parc12cartao1 = "28";
}
else{
$dia_parc12cartao1 = $dia_vencto;
}
}
else{
	
$dia_parc12cartao1 = $dia_vencto;
	
}

$vencto12cartao1 = "$ano_parc12cartao1-$mes_parc12cartao1-$dia_parc12cartao1";

//-----------fim da verifica��o do tipo do cartao 1---------------------

//---------verificando o tipo do cartao 2--------------

if($tipocartao2 == "CARTAO DE DEBITO"){
	
if($mes_parc11<=9){
$soma_vencto12cartao2 = "0".bcadd($mes_parc11,0);
}
else{
$soma_vencto12cartao2 = bcadd($mes_parc11,0);
}
}
else{

if($mes_parc11<=9){
$soma_vencto12cartao2 = "0".bcadd($mes_parc11,1);
}
else{
$soma_vencto12cartao2 = bcadd($mes_parc11,1);
}
}

if($soma_vencto12cartao2>12){
$mes_parc12cartao2 = "01";
}else{
$mes_parc12cartao2 = $soma_vencto12cartao2;
}
if($soma_vencto12cartao2>12){
$ano_parc12cartao2 = bcadd($ano_parc11,1);
}else{
$ano_parc12cartao2 = $ano_parc11;
}

if(($mes_parc12cartao2=="02") or ($mes_parc12cartao2=="2")){
if($dia_vencto>="29"){
$dia_parc12cartao2 = "28";
}
else{
$dia_parc12cartao2 = $dia_vencto;
}
}
else{
	
$dia_parc12cartao2 = $dia_vencto;
	
}

$vencto11cartao2 = "$ano_parc11cartao2-$mes_parc12cartao2-$dia_parc12cartao2";

//-----------fim da verifica��o do tipo do cartao 2---------------------

//---------verificando o tipo do cartao 3--------------

if($tipocartao3 == "CARTAO DE DEBITO"){
	
if($mes_parc11<=9){
$soma_vencto12cartao3 = "0".bcadd($mes_parc11,0);
}
else{
$soma_vencto12cartao3 = bcadd($mes_parc11,0);
}
}
else{

if($mes_parc11<=9){
$soma_vencto12cartao3 = "0".bcadd($mes_parc11,1);
}
else{
$soma_vencto12cartao3 = bcadd($mes_parc11,1);
}
}

if($soma_vencto12cartao3>12){
$mes_parc12cartao3 = "01";
}else{
$mes_parc12cartao3 = $soma_vencto12cartao3;
}
if($soma_vencto12cartao3>12){
$ano_parc12cartao3 = bcadd($ano_parc11,1);
}else{
$ano_parc12cartao3 = $ano_parc11;
}

if(($mes_parc12cartao3=="02") or ($mes_parc12cartao3=="2")){
if($dia_vencto>="29"){
$dia_parc12cartao3 = "28";
}
else{
$dia_parc12cartao3 = $dia_vencto;
}
}
else{
	
$dia_parc12cartao3 = $dia_vencto;
	
}

$vencto12cartao3 = "$ano_parc12cartao3-$mes_parc12cartao3-$dia_parc12cartao3";

//-----------fim da verifica��o do tipo do cartao 3---------------------

//---------verificando o tipo do cartao 4--------------

if($tipocartao4 == "CARTAO DE DEBITO"){
	
if($mes_parc11<=9){
$soma_vencto12cartao4 = "0".bcadd($mes_parc11,0);
}
else{
$soma_vencto12cartao4 = bcadd($mes_parc11,0);
}
}
else{

if($mes_parc11<=9){
$soma_vencto12cartao4 = "0".bcadd($mes_parc11,1);
}
else{
$soma_vencto12cartao4 = bcadd($mes_parc11,1);
}
}

if($soma_vencto12cartao4>12){
$mes_parc12cartao4 = "01";
}else{
$mes_parc12cartao4 = $soma_vencto12cartao4;
}
if($soma_vencto12cartao4>12){
$ano_parc12cartao4 = bcadd($ano_parc11,1);
}else{
$ano_parc12cartao4 = $ano_parc11;
}

if(($mes_parc12cartao4=="02") or ($mes_parc12cartao4=="2")){
if($dia_vencto>="29"){
$dia_parc12cartao4 = "28";
}
else{
$dia_parc12cartao4 = $dia_vencto;
}
}
else{
	
$dia_parc12cartao4 = $dia_vencto;
	
}

$vencto12cartao4 = "$ano_parc12cartao4-$mes_parc12cartao4-$dia_parc12cartao4";

//-----------fim da verifica��o do tipo do cartao 4---------------------





if($mes_parc11<=9){
$soma_vencto12 = "0".bcadd($mes_parc11,1);
}
else{
$soma_vencto12 = bcadd($mes_parc11,1);
}
if($soma_vencto12>12){
$mes_parc12 = "01";
}else{
$mes_parc12 = $soma_vencto12;
}
if($soma_vencto12>12){
$ano_parc12 = bcadd($ano_parc11,1);
}else{
$ano_parc12 = $ano_parc11;
}
	
if($modopagto=="CARTEIRA"){
	
if(($mes_parc12=="02") or ($mes_parc12=="2")){
if($dia_vencto>="29"){
$dia_parc12 = "28";
}
else{
$dia_parc12 = $dia_vencto_carteira;
}
}
else{
	
$dia_parc12 = $dia_vencto_carteira;
	
}
	
}
else{

if(($mes_parc12=="02") or ($mes_parc12=="2")){
if($dia_vencto>="29"){
$dia_parc12 = "28";
}
else{
$dia_parc12 = $dia_vencto;
}
}
else{
	
$dia_parc12 = $dia_vencto;
	
}
	
}

$vencto12 = "$ano_parc12-$mes_parc12-$dia_parc12";

if($quant_parc>=12){
$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,cartao2,tipocartao2,valorcartao2,venctocartao2,custo_com_cartao2,cartao3,tipocartao3,valorcartao3,venctocartao3,custo_com_cartao3,cartao4,tipocartao4,valorcartao4,venctocartao4,custo_com_cartao4,num_ordem_do_cartao1,num_ordem_do_cartao2,num_ordem_do_cartao3,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcela','$vencto12','$num_parcelas','$modopagto','$quitacao','$operador_fechou_conta','$estab_pertence','$historico','$grupo','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao1','$num_ordem_do_cartao2','$num_ordem_do_cartao3','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12� mensalidade no contas a receber!");


//---------------------lancamentos dos parcelamentos dos cartoes nas mensalidades---------------------------

if($modopagto=="CARTAO"){
	
if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao1,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao1','$vencto12cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao','$tipocartao','$valorcartao','$venctocartao1','$custo_com_cartao1','$num_ordem_do_cartao1','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12� mensalidade do cartao $cartao/$tipocartao no contas a receber!");
	
}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao2,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao2','$vencto12cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao2','$tipocartao2','$valorcartao2','$venctocartao2','$custo_com_cartao2','$num_ordem_do_cartao2','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12� mensalidade do cartao $cartao2/$tipocartao2 no contas a receber!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao3,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao3','$vencto12cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao3','$tipocartao3','$valorcartao3','$venctocartao3','$custo_com_cartao3','$num_ordem_do_cartao3','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12� mensalidade do cartao $cartao3/$tipocartao3 no contas a receber!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_receber(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_receber,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,cartao,tipocartao,valorcartao,venctocartao,custo_com_cartao1,num_ordem_do_cartao4,sub_categoria)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$valorparcelacartao4','$vencto12cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_dos_cartoes','R_F_C_C','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao4','$tipocartao4','$valorcartao4','$venctocartao4','$custo_com_cartao4','$num_ordem_do_cartao4','$sub_grupo')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12� mensalidade do cartao $cartao4/$tipocartao4 no contas a receber!");

}

//--------------fim dos lancamentos dos catoes nas mensalidades------------------



//---------------lancamentos dos custos de recebimento com cartoes das mensalidades------------------------------

if(empty($valorcartao)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao1','$vencto12cartao1','$quantparc_cartao1','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao','$tipocartao','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12� mensalidade de despesa do cartao $cartao/$tipocartao no contas a pagar!");

}


if(empty($valorcartao2)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao2','$vencto12cartao2','$quantparc_cartao2','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao2','$tipocartao2','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12� mensalidade de despesa do cartao $cartao2/$tipocartao2 no contas a pagar!");

}


if(empty($valorcartao3)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao3','$vencto12cartao3','$quantparc_cartao3','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao3','$tipocartao3','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12� mensalidade de despesa do cartao $cartao3/$tipocartao3 no contas a pagar!");

}


if(empty($valorcartao4)){
}
else{

$comando = "insert into contas_a_pagar(num_fatura,datacadastro,horacadastro,nome,cpf,valor_a_pagar,vencto,quant_parc,modopagto,quitacao,operador,estabelecimento,historico,cartao,tipocartao,categoria_conta,codigo_cliente,codigo_orcamento,num_mensalidade,setor,departamento,fornecedor)

values('$num_fatura','$datafechamento','$horacadastro','$cliente_da_fatura','$cpf_do_cliente_da_fatura','$parcela_do_custo_com_cartao4','$vencto12cartao4','$quantparc_cartao4','$modopagto','Em Aberto','$operador_fechou_conta','$estab_pertence','$historico_de_custos_com_cartoes','$cartao4','$tipocartao4','Despesas Recebimento Com Cartao','$codigo_cliente','$orcamentos_incluidos_na_fatura','12','$setor','$estab_pertence','$cartao - $tipocartao')";

mysql_query($comando,$conexao) or die("Erro ao gravar a 12� mensalidade de despesa do cartao $cartao4/$tipocartao4 no contas a pagar!");

}
}}
//------------------fim dos lancamentos dos custos de recebimentos com cartoes das mensalidades-------------------------

	
	
	






	
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




$sql2 = "SELECT * FROM produtos where codigo = '$codigoproduto'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$quant_estoque = $linha[16];

}

$saldo_estoque_do_produto = bcsub($quant_estoque,$quant);



	
$comando = "update `$db`.`produtos` set `quant_estoque` = '$saldo_estoque_do_produto' where `produtos`. `codigo` = '$codigoproduto'";

mysql_query($comando,$conexao);
	
	
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
	//$mens   =  "Ol�! Or�amento alterado na $nfantasia_empresa!   \n";
	//$mens  .=  " \n";
	//$mens  .=  "N� do Or�amento: ".$codigo_orcamento."                                                       \n";
	//$mens  .=  "STATUS: ".$status."                                                       \n";
	//$mens  .=  "Cliente: ".$loja."                                                    \n";
	//$mens  .=  "Data de altera��o: ".$datafechamento."                                                    \n";
	//$mens  .=  "Hora de altera��o: ".$horafechamento."                                                    \n";
	//$mens  .=  "Operador que efetuou a altera��o: ".$operador_alterou."                                                    \n";
	//$mens  .=  "Estabelecimento: ".$loja."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Or�amento alterado no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email_dest);
	//$envia  =  mail($email_operador_alterou, "Or�amento alterado no sistema em ".$dataalteracao, $mens,"From:".$email_dest);

?>





<body>
  


</p>
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

if(empty($valor_entrada)){
	
}
else{
	echo "Entrada: $valor_entrada<br>";
}

	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTEIRA' and quitacao = 'Em Aberto' order by vencto asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_contas_a_receber = mysql_num_rows($res7);
	
$data_de_vencimento = $linha[8];
	$valor_da_parcela = $linha[7];
	$numero_da_parcela = $linha[31];
	
	echo "<br>Vencto: $data_de_vencimento Valor R$ $valor_da_parcela Parcela $numero_da_parcela";
	
}	
	}
		
		
		if($modopagto=="DINHEIRO"){

if(empty($valor_entrada)){
	
}
else{
echo "Entrada: $valor_entrada<br>";
}
	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'DINHEIRO' and quitacao = 'Em Aberto' order by vencto asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_contas_a_receber = mysql_num_rows($res7);
	
$data_de_vencimento = $linha[8];
	$valor_da_parcela = $linha[7];
	$numero_da_parcela = $linha[31];
	
	echo "<br>Vencto: $data_de_vencimento Valor R$ $valor_da_parcela Parcela $numero_da_parcela";
	
}	
			
			if($quant_parc==0){
		
	$sql11 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and modo_pagto = 'DINHEIRO'";
$res11 = mysql_query($sql11);
while($linha=mysql_fetch_row($res11)) {
	
	$dia_cx = $linha[17];
	$mes_cx = $linha[18];
	$ano_cx = $linha[19];
	$valor_cx = $linha[25];
	$modo_pagto_cx = $linha[27];
	$especificacao_cx = $linha[41];
	
	echo "<br> Valor R$ $valor_cx modo pagto $modo_pagto_cx especificacao $especificacao_cx";
	
}
			
			
	}
			
		}
	
	if($modopagto=="CARTAO"){

if(empty($valor_entrada)){
	
}
else{
echo "Entrada: $valor_entrada<br>";
}
	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao1 = '1' group by num_ordem_do_cartao1 order by cartao asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}	
		
		
	$sql8 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao2 = '2' group by num_ordem_do_cartao2 order by cartao asc";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		
	$sql9 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao3 = '3' group by num_ordem_do_cartao3 order by cartao asc";
$res9 = mysql_query($sql9);
while($linha=mysql_fetch_row($res9)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		
	$sql10 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao4 = '4' group by num_ordem_do_cartao4 order by cartao asc";
$res10 = mysql_query($sql10);
while($linha=mysql_fetch_row($res10)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		if($quant_parc==0){
		
	$sql11 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and modo_pagto = 'CARTAO'";
$res11 = mysql_query($sql11);
while($linha=mysql_fetch_row($res11)) {
	
	$cartao_cx = $linha[43];
	$cartao2_cx = $linha[48];
	$cartao3_cx = $linha[53];
	$cartao4_cx = $linha[58];

	if(empty($cartao_cx)){
		
	}
	else{
		
$cartao_a_vista = $linha[43];
	$tipo_cartao_a_vista = $linha[44];
	$valor_cartao_a_vista = $linha[45];
	$vencto_cartao_a_vista = $linha[46];
	$custo_com_cartao1_a_vista = $linha[47];
	
	
	echo "<br> Cartao: $cartao_a_vista - $tipo_cartao_a_vista Valor R$ $valor_cartao_a_vista custo com cartao R$ $custo_com_cartao1_a_vista<br>";
		
	}
	
	if(empty($cartao2_cx)){
		
	}
	else{
		
$cartao2_a_vista = $linha[48];
	$tipo_cartao2_a_vista = $linha[49];
	$valor_cartao2_a_vista = $linha[50];
	$vencto_cartao2_a_vista = $linha[51];
	$custo_com_cartao2_a_vista = $linha[52];
	
	
	echo "<br> Cartao: $cartao2_a_vista - $tipo_cartao2_a_vista Valor R$ $valor_cartao2_a_vista custo com cartao R$ $custo_com_cartao2_a_vista<br>";
		
	}
	
	if(empty($cartao3_cx)){
		
	}
	else{
		
$cartao3_a_vista = $linha[53];
	$tipo_cartao3_a_vista = $linha[54];
	$valor_cartao3_a_vista = $linha[55];
	$vencto_cartao3_a_vista = $linha[56];
	$custo_com_cartao3_a_vista = $linha[57];
	
	
	echo "<br> Cartao: $cartao3_a_vista - $tipo_cartao3_a_vista Valor R$ $valor_cartao3_a_vista custo com cartao R$ $custo_com_cartao3_a_vista<br>";
		
	}
	
	if(empty($cartao4_cx)){
		
	}
	else{
		
$cartao4_a_vista = $linha[58];
	$tipo_cartao4_a_vista = $linha[59];
	$valor_cartao4_a_vista = $linha[60];
	$vencto_cartao4_a_vista = $linha[61];
	$custo_com_cartao4_a_vista = $linha[62];
	
	
	echo "<br> Cartao: $cartao4_a_vista - $tipo_cartao4_a_vista Valor R$ $valor_cartao4_a_vista custo com cartao R$ $custo_com_cartao4_a_vista<br>";
		
	}
		
	
}
		
	}
		
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

$comando = "update `$db`.`faturamento_futuro` set `entrada` = '$valor_entrada',`total_geral` = '$total_geral',`quantparc` = '$quant_parc',`cliente` = '$nome_do_cliente',`cpf` = '$cpf_do_cliente',`codigo_orcamento` = '$codigo_orcamento',`codigo_cliente` = '$codigo_do_cliente',`saldo_a_parcelar` = '$saldo_a_parcelar',`valorparcela` = '$valor_monetario_a_informar',`quantparc_cartao1` = '$quantparc_cartao1',`quantparc_cartao2` = '$quantparc_cartao2',`quantparc_cartao3` = '$quantparc_cartao3',`quantparc_cartao4` = '$quantparc_cartao4' where `faturamento_futuro`. `num_fatura` = '$num_fatura'";
mysql_query($comando,$conexao);

mysql_close($conexao);
?>
