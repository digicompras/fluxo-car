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
<title>ORCAMENTO/PEDIDO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.style3 {font-size: 12px}
.style5 {	font-size: 15px;
	font-weight: bold;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>
<?

require '../../conect/conect.php';

$codigo_orcamento = $_POST['codigo_orcamento'];

$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_cliente = $linha[25];

$verificando_status = $linha[17];

$justificativa_gravada = $linha[41];
$admgeral_cancelou = $linha[42];
$estab_pertence_cancelou = $linha[43];
$date_cancelamento = $linha[44];
$hora_cancelamento = $linha[45];


}

if($verificando_status == "CANCELADO"){


echo "<script>

alert('ATENÇÃO!!!... ESSE PEDIDO FOI CANCELADO POR $admgeral_cancelou da empresa $estab_pertence_cancelou em $date_cancelamento as $hora_cancelamento');


</script>";


}



			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("ffffff"); ?>"

background="../background/<? printf("$linha[1]"); ?>" bgproperties="fixed" 
  
<? } ?>



<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>

<?



$sql = "SELECT * FROM clientes where codigo = '$codigo_cliente'";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo_cliente = $linha[0];

$nome_cliente = $linha[1];

$sexo_cliente = $linha[2];

$estadocivil_cliente = $linha[3];

$cpf_cliente = $linha[4];

$rg_cliente = $linha[5];

$orgao_cliente = $linha[6];

$emissao_cliente = $linha[7];

$data_nasc_cliente = $linha[8];

$pai_cliente = $linha[9];

$mae_cliente = $linha[10];

$endereco_cliente = $linha[11];

$numero_cliente = $linha[12];

$bairro_cliente = $linha[13];

$complemento_cliente = $linha[14];

$cidade_cliente = $linha[15];

$estado_cliente = $linha[16];

$cep_cliente = $linha[17];

$telefone_cliente = $linha[18];

$celular_cliente = $linha[19];

$email_cliente = $linha[20];


$obs_cliente = $linha[28];

$datacadastro_cliente = $linha[29];



$newsletter_cliente = $linha[136];

}
?>


<?

$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento'";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;


$estabelecimento_pedido = $linha[6];
$total_geral = $linha[7];

$modopagto = $linha[10];
$obs_orcamento = $linha[11];

$condicao = $linha[16];


$status = $linha[17];
//$nome = $linha[26];

$quantparc = $linha[8];
$cartao = $linha[28];
$valorparcela = $linha[29];
$codigo_orcamento_um = $linha[0];
$loja = $linha[6];
$quantparc = $linha[8];

$modopagto = $linha[10];

$obs = $linha[11];
$operador = $linha[12];

$condicao = $linha[16];

$status = $linha[17];
$cartao = $linha[28];


$entrada = $linha[35];

$num_orcamento_bloco = $linha[40];

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
$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estabelecimento_pedido' limit 1";
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
$email_vendas = $linha[42];


}
?>
</p>
  <form name="form2" method="post" action="historico_cliente.php">
    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
    <input name="nome" type="hidden" id="nome" value="<? echo $nome_cliente; ?>">
    <input type="submit" name="button2" id="button2" value="Voltar">
  </form>
<form name="form1" method="post" action="cancela_pedido.php">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
          <td><div align="center"><strong><font size="2" class="style3"><? echo $razaosocial; ?><br>
            <? echo $endereco." "; ?><? echo "Nº ".$numero; ?>, <? echo $bairro; ?>, <? echo $cidade." "; ?> <? echo $estado; ?><br>
            Site: <? echo $site; ?> E-Mail: <? echo $email_vendas; ?><br>
            TEL: <? echo $telefone; ?></font></strong></div><div align="center"></div></td>
          </tr>
      </table>
    </div></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="76%"><div align="center" class="style5"><? echo $condicao; ?> <strong>N&ordm; <? echo $codigo_orcamento; ?></strong> Coprrespondente ao bloco N&ordm; <strong><? echo $num_orcamento_bloco; ?></strong></div></td>
    <td width="24%"><div align="center"><span class="style5">Total
          <? echo "R$ ".$total_geral; ?>
    </span></div></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="4">
      <tr>
        <td><span class="style3"><strong>C&oacute;digo:</strong></span></td>
        <td><span class="style3"><strong><font color="#0000FF"><strong><? echo $codigo_cliente; ?></strong></font></strong></span></td>
        <td><span class="style3"><strong>Telefone:</strong></span></td>
        <td width="12%"><span class="style3"><strong><font color="#0000FF"><strong><? echo $telefone_cliente; ?></strong></font></strong></span></td>
        <td width="7%"><span class="style3"><strong>Celular:</strong></span></td>
        <td width="21%"><span class="style3"><strong><font color="#0000FF"><strong><? echo $celular_cliente; ?></strong></font></strong></span></td>
      </tr>
      <tr>
        <td><span class="style3"><strong>Nome</strong></span></td>
        <td><span class="style3"><strong><font color="#0000FF"><strong><? echo $nome_cliente; ?></strong></font></strong></span></td>
        <td><span class="style3"><strong>E-Mail:</strong></span></td>
        <td colspan="3"><span class="style3"><strong><font color="#0000FF"><strong><? echo $email_cliente; ?></strong></font></strong></span></td>
        </tr>
      <tr>
        <td width="11%"><span class="style3"><strong>Endere&ccedil;o:</strong></span></td>
        <td width="39%"><span class="style3"><strong><font color="#0000FF"><strong><? echo $endereco_cliente; ?> N&ordm; <font color="#0000FF"><strong><? echo $numero_cliente; ?></strong></font></strong></font></strong></span></td>
        <td width="10%"><strong>Complemento:</strong></td>
        <td colspan="3"><strong><font color="#0000FF"><strong><? echo $complemento_cliente; ?></strong></font></strong></td>
      </tr>
      <tr>
        <td><p><span class="style3"><strong>Bairro:</strong></span></p></td>
        <td><span class="style3"><strong><font color="#0000FF"><strong><? echo $bairro_cliente; ?></strong></font></strong></span></td>
        <td><span class="style3"><strong>CEP:</strong></span></td>
        <td colspan="3"><span class="style3"><strong><font color="#0000FF"><strong><? echo $cep_cliente; ?></strong></font></strong></span></td>
      </tr>
      <tr>
        <td><span class="style3"><strong>Cidade:</strong></span></td>
        <td><span class="style3"><strong><font color="#0000FF"><strong><? echo $cidade_cliente; ?> Estado <font color="#0000FF"><strong><? echo $estado_cliente; ?></strong></font></strong></font></strong></span></td>
        <td>CPF:</td>
        <td colspan="3"><strong><font color="#0000FF"><strong><? echo $cpf_cliente; ?></strong></font></strong></td>
      </tr>
      </table></td>
</tr>
</table>
<table width="100%"  border="1">
  <tr bgcolor="#ffffff">
    <td width="8%"><div align="center" class="style3"><span class="style3">Codigo Produto</span></div></td>
    <td width="22%" class="style3"><div align="center"><span class="style3">Nome Produto</span></div></td>
    <td width="16%" class="style3"><div align="center"><span class="style3">Categoria</span></div></td>
    <td width="9%" class="style3"><div align="center"><span class="style3">Pre&ccedil;o</span></div></td>
    <td width="8%"><div align="center" class="style3"><span class="style3">Quantidade</span></div></td>
    <td width="7%"><div align="center" class="style3"><span class="style3">Desconto</span></div></td>
    <td width="11%"><div align="center" class="style3"><span class="style3">Desconto Monetario</span></div></td>
    <td width="19%"><div align="center"><span class="style3">Total Produtos</span></div></td>
  </tr>
  <?
			  
			  
$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco0 = $linha[22];
$preco1 = $linha[23];
$preco2 = $linha[24];
$preco3 = $linha[25];
$preco4 = $linha[81];

$acrescimo = $linha[26];
$acrescimodecimal = $linha[27];
$acrescimomonetario = $linha[28];
$total = $linha[29];

$descontoetapa0 = $linha[66];
$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];
$descontoetapa4 = $linha[83];

$descontomonetarioetapa0 = $linha[74];
$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];
$descontomonetarioetapa4 = $linha[85];


$acrescimo_por_rateio = $linha[95];


$acrescimo_por_item = bcdiv($acrescimo_por_rateio,$quant,2);



$total_descontos_etapa1 = bcadd($descontoetapa0,$descontoetapa1,2);
$total_descontos_etapa2 = bcadd($descontoetapa2,$descontoetapa3,2);
$total_descontos_etapa3 = bcadd($descontoetapa4,0,2);

$subtotal_de_descontos_nominais = bcadd($total_descontos_etapa1,$total_descontos_etapa2,2);

$total_geral_de_descontos_nominais = bcadd($total_descontos_etapa3,$subtotal_de_descontos_nominais,2);






$total_descontos_monetarios_etapa1 = bcadd($descontomonetarioetapa0,$descontomonetarioetapa1,2);
$total_descontos_monetarios_etapa2 = bcadd($descontomonetarioetapa2,$descontomonetarioetapa3,2);
$total_descontos_monetarios_etapa3 = bcadd($descontomonetarioetapa4,0,2);

$subtotal_de_descontos = bcadd($total_descontos_monetarios_etapa1,$total_descontos_monetarios_etapa2,2);

$total_geral_de_descontos = bcadd($total_descontos_monetarios_etapa3,$subtotal_de_descontos,2);


?>
  <tr>
    <td><div align="center" class="style3"><span class="style3"><? echo $codigoproduto;?></span></div></td>
    <td class="style3"><div align="center"><span class="style3"><? echo $nomeproduto;?></span></div></td>
    <td class="style3"><div align="center"><span class="style3"><? echo $categoria;?></span></div></td>
    <td class="style3"><div align="center"><span class="style3">
<? 
//$menor_valor = min($preco0,$preco1,$preco2,$preco3,$preco4); 

if($preco4 <> 0.00){
	
$valor_de_venda = $preco4;

}
else{
	
if($preco3 <> 0.00){
	
$valor_de_venda = $preco3;

}
else{
	
if($preco2 <> 0.00){
	
$valor_de_venda = $preco2;	
	
}
else{
	
if($preco1 <> 0.00){
	
$valor_de_venda = $preco1;	
	
}
else{
	
if($preco0 <> 0.00){
	
$valor_de_venda = $preco0;	
	
}
}
}
}
}

$valordoitemvendido = bcadd($valor_de_venda,$acrescimo_por_item,2);
	
echo $valordoitemvendido; 
	 
?>
</span></div></td>
    <td><div align="center" class="style3"><span class="style3"><? echo $quant;?></span></div></td>
    <td><div align="center" class="style3"><? echo $total_geral_de_descontos_nominais;?></div></td>
    <td><div align="center" class="style3"><span class="style3"><? echo $total_geral_de_descontos;?></span></div></td>
    <td><div align="center"><span class="style3"><? $totaldoitem = bcadd($total,$acrescimo_por_rateio,2); echo $totaldoitem;?></span></div></td>
  </tr>
  <?  } ?>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><div align="center" class="style3">
      <p><font size="4"><strong>Observações</strong></font><br>
          <strong><font color="#0000FF"><strong><font size="3"><? echo $obs_orcamento;  ?></font></strong></font></strong></p>
      </div></td>
  </tr>
</table>

<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="12%" class="style3"><strong>Condi&ccedil;&otilde;es de Pagto escolhida foi: Entrada de <font color="#0000FF"><strong><? echo $entrada; ?></strong></font> e o restante em <font color="#0000FF"><strong><? echo $quantparc; ?></strong></font> vez(es) de<font color="#0000FF"><strong> <? echo "R$ $valorparcela"; ?></strong></font> modo de pagto: <font color="#0000FF"><strong><? echo $modopagto; ?></strong></font> <font color="#0000FF"><strong>
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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle"><div align="center" class="style3">
      <span class="style5"><?

if($verificando_status == "CANCELADO"){
	
echo "JUSTIFICATIVA: $justificativa_gravada<br><br>

ATENÇÃO!!!... ESSE PEDIDO FOI CANCELADO POR $admgeral_cancelou da empresa $estab_pertence_cancelou em $date_cancelamento as $hora_cancelamento";	
	
}
else{
	
echo "<textarea name='justificativa' id='justificativa' cols='70' rows='5'></textarea>
      <input type='submit' name='button' id='button' value='Cancelar'>";
	  
}

?>
      </span></div></td>
  </tr>
</table>
<p align="center"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <span class="style3"></span>
  <input name="cod_orcamento_cancelar" type="hidden" id="cod_orcamento_cancelar" value="<? echo $codigo_orcamento; ?>">
  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
  <input name="comando" type="hidden" id="comando" value="cancelar_pedido">
  <input name="admgeral_cancelou" type="hidden" id="admgeral_cancelou" value="<? echo $nome_op; ?>">
  <input name="estab_pertence_cancelou" type="hidden" id="estab_pertence_cancelou" value="<? echo $estab_pertence_op; ?>">
  <input name="date_cancelamento" type="hidden" id="date_cancelamento" value="<? echo date('Y-m-d'); ?>">
  <input name="hora_cancelamento" type="hidden" id="hora_cancelamento" value="<? echo date('H:i:s'); ?>">
  <input name="nome" type="hidden" id="codigo2" value="<? echo $nome; ?>">
</form>
<p>--------------------------------------------------------------------------------------------------------------------------</p>

<?
$justificativa = $_POST['justificativa'];

$comando = $_POST['comando'];


if($comando == "cancelar_pedido"){

if(empty($justificativa)){


echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE DESCREVER DETALHADAMENTE A JUSTIFICATIVA PARA ESSE CANCELAMENTO!!!...');
window.location = 'selecione_cliente_para_abrir_orcamento.php';

</script>";


}
else{



$cod_orcamento_cancelar = $_POST['cod_orcamento_cancelar'];
$admgeral_cancelou = $_POST['admgeral_cancelou'];
$estab_pertence_cancelou = $_POST['estab_pertence_cancelou'];

$date_cancelamento = $_POST['date_cancelamento'];
$hora_cancelamento = $_POST['hora_cancelamento'];



$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$cod_orcamento_cancelar'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento_que_sera_cancelado = $linha[0];

$codigo_cliente = $linha[25];

}


$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`orcamentos` set `justificativa` = '$justificativa',`admgeral_cancelou` = '$admgeral_cancelou',`estab_pertence_cancelou` = '$estab_pertence_cancelou',`date_cancelamento` = '$date_cancelamento',`hora_cancelamento` = '$hora_cancelamento',`status` = 'CANCELADO' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento_que_sera_cancelado'";

}

mysql_query($comando,$conexao);






$sql3 = "SELECT * FROM contas_a_receber where codigo_orcamento = '$codigo_orcamento_que_sera_cancelado' order by num_mensalidade asc";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$reg++;

$cod_contas_a_receber_que_sera_cancelado = $linha[0];



$sql4 = "select * from db";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {


$comando = "update `$linha[1]`.`contas_a_receber` set `justificativa` = '$justificativa',`admgeral_cancelou` = '$admgeral_cancelou',`estab_pertence_cancelou` = '$estab_pertence_cancelou',`date_cancelamento` = '$date_cancelamento',`hora_cancelamento` = '$hora_cancelamento',`quitacao` = 'CANCELADO' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber_que_sera_cancelado'";

}

mysql_query($comando,$conexao);

}





$sql5 = "SELECT * FROM cx_entradas where num_orcamento = '$codigo_orcamento_que_sera_cancelado' order by num_mensalidade asc";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$cod_cx_entradas_que_sera_excluido = $linha[0];



$comando = "delete from `cx_entradas` where `cx_entradas`. `codigo` = '$cod_cx_entradas_que_sera_excluido'";

mysql_query($comando,$conexao);

}



$sql5 = "SELECT * FROM cx_saidas where codigo_orcamento = '$codigo_orcamento_que_sera_cancelado'";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$cod_cx_saidas_que_sera_excluido = $linha[0];



$comando = "delete from `cx_saidas` where `cx_saidas`. `codigo` = '$cod_cx_saidas_que_sera_excluido'";

mysql_query($comando,$conexao);

}





$sql6 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento_que_sera_cancelado'";
$res6 = mysql_query($sql6);
while($linha=mysql_fetch_row($res6)) {



$codigoproduto = $linha[17];
$quant = $linha[21];



$sql7 = "SELECT * FROM produtos where codigo = '$codigoproduto'";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {

$quant_estoque = $linha[16];




$atualiza_estoque = bcadd($quant_estoque,$quant);


$sql8 = "select * from db";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {


$comando = "update `$linha[1]`.`produtos` set `quant_estoque` = '$atualiza_estoque' where `produtos`. `codigo` = '$codigoproduto'";

}

mysql_query($comando,$conexao);


}
}


}
}

?>






<table width="100%"  border="0">
  <tr bgcolor="#ffffff">
    <td><div align="center">
      <p>N&ordm; Fatura </p>
    </div></td>
    <td><div align="center">N&ordm; Or&ccedil;amento</div></td>
    <td><div align="center">Vencimento</div></td>
    <td><div align="center">Mensalidade</div></td>
    <td width="16%"><div align="center">Valor a Receber</div></td>
    <td><div align="center">Status</div></td>
    <td><div align="center"> </div></td>
  </tr>
  <?

if(empty($comando)){			

$sql = "SELECT * FROM contas_a_receber where codigo_orcamento = '$codigo_orcamento' and quitacao = 'CANCELADO' order by num_mensalidade asc";

}
else{

$sql = "SELECT * FROM contas_a_receber where codigo_orcamento = '$codigo_orcamento_que_sera_cancelado' and quitacao = 'CANCELADO' order by num_mensalidade asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;



$cod_contas_a_receber = $linha[0];

$num_fatura = $linha[1];

$datacadastro = $linha[2];

$horacadastro = $linha[3];

$nome = $linha[4];

$cpf = $linha[5];

$obs = $linha[6];

$valor_a_receber = $linha[7];

$vencto = $linha[8];

$quantparc = $linha[9];

$quitacao = $linha[13];

$num_mensalidade = $linha[31];

$num_orcamento = $linha[36];






?>
    <tr>
      <td width="8%"><div align="center"><? echo $num_fatura; ?> </div></td>
      <td width="8%"><div align="center"><? echo $num_orcamento; ?></div></td>
      <td width="8%"><div align="center"><? echo $vencto; ?></div></td>
      <td width="10%"><div align="center"><? echo $num_mensalidade; ?> de <? echo $quantparc; ?></div></td>
      <td><div align="center"><? echo "R$ ".$valor_a_receber; ?></div></td>
      <td width="9%"><div align="center"><? echo $quitacao; ?></div></td>
      <td width="26%">&nbsp;</td>
    </tr>
  <?

if($reg==1){

echo "<tr>";

//$reg=0;

}

}

?>
</table>
<p>&nbsp;</p>
<p></p>
<p></p>
</body>
</html>
