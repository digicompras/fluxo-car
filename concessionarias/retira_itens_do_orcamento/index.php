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
require '../../conect/conect.php';
include '../../css_menus/modal.css';
include '../../css_menus/modal2.css';

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}

$solicitacao = $_POST['solicitacao'];
?>
<?
$senha = $_SESSION['senha'];
	
$sql50 = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res50 = mysql_query($sql50);
while($linha=mysql_fetch_row($res50)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

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
	
}	

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence' limit 1";	
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$cpf_proprietario = $linha[17];


}

?>
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
<form name="form1" method="post" action="../index.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input class="class01" type="submit" name="Submit3" value="Voltar">
</form>
<form action="index.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="100%">        

</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF" size="4">
        <?
		  
		  
if($solicitacao=="verifica_a_retirada"){



$placa = $_POST['placa'];
$veiculo = $_POST['veiculo'];
	
	
$codigo_orcamento_ret = $_POST['codigo_orcamento_ret'];
$cod_prod_ret = $_POST['cod_prod_ret'];
$num_fatura_ret = $_POST['num_fatura_ret'];
$retirada_de_produto = $_POST['retirada_de_produto'];
$estab_pertence_gerencia = $_POST['estab_pertence_gerencia'];

		
$cod_gerente = $_POST['cod_gerente'];


$sql = "SELECT * FROM codigo_gerente where codigo = '$cod_gerente' and estab_pertence = '$estab_pertence_gerencia' and statuscodgerente = 'ativo' limit 1";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	
$gerente_que_autorizou = $linha[1];
$statuscodgerente = $linha[3];


}

//-------ANALISAR-------

//$solicitacao = $_POST['solicitacao'];

//if($solicitacao == "listagem"){
	
//}
//else{
//--------ANALISAR---------
	
$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	
$db = $linha[1];
}
	

if(empty($cod_gerente)){

}
else{
	
if($statuscodgerente == "ativo"){
	
$data_retirado = date('Y-m-d');
$hora_retirado = date('H:i:s');

$codigo_de_retirada = $_POST['codigo_de_retirada'];
	$codigoqueseraretiradodoorcamento = $_POST['codigoqueseraretiradodoorcamento'];
	$quant_a_retirar = $_POST['quant_a_retirar'];
	
$dateautorizacao = $_POST['dateautorizacao'];
$horaautorizacao = $_POST['horaautorizacao'];


$comando = "update `$db`.`pedido_de_retirada_produto_da_fatura` set `statusautorizacao` = 'Autorizado',`dateautorizacao` = '$dateautorizacao',`horaautorizacao` = '$horaautorizacao',`quemautorizou` = '$gerente_que_autorizou',`cod_gerente_utilizado` = '$cod_gerente' where `pedido_de_retirada_produto_da_fatura`. `codigo` = '$codigo_de_retirada' limit 1 ";
mysql_query($comando,$conexao);



$sql3 = "select * from pedido_de_retirada_produto_da_fatura where codigo = '$codigo_de_retirada' order by datepedido desc limit 1";

$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$codigo_de_retirada = $linha[0];
$statusautorizacao = $linha[15];
//$num_fatura_ret = $linha[10];
$codigo_orcamento_ret = $linha[11];
$cod_prod_ret = $linha[12];

}


if($statusautorizacao == "Autorizado"){
	
$sql4 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento_ret' and codigoproduto = '$codigoqueseraretiradodoorcamento' and num_fatura = '$num_fatura_ret' limit 1";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$categoria = $linha[19];

$codigo_retirado = $linha[17];
	
$codigo_orcamento_retirado = $linha[1];

$codigo_cliente_retirado = $linha[3];
$nome_retirado = $linha[4];

$codigoproduto_retirado = $linha[17];
$nomeproduto_retirado = $linha[18];
$categoria_retirado = $linha[19];
$quant_retirado = $linha[21];
$preco_retirado = $linha[22];


$total_retirado = $linha[29];
$num_fatura_retirado = $linha[55];
$datafatura_retirado = $linha[57];
$setor_retirado = $linha[106];
$departamento_retirado = $linha[107];


}

	
		
$sql30 = "SELECT * FROM estoque_pecas where codigo = '$codigoqueseraretiradodoorcamento' limit 1";
$res30 = mysql_query($sql30);
while($linha=mysql_fetch_row($res30)) {

$quant_estoque_verificado = $linha[16];

}



$saldo_estoque_da_peca = bcadd($quant_estoque_verificado,$quant_retirado);
	
	
$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$codigoqueseraretiradodoorcamento'";
mysql_query($comando,$conexao);

	
	
$comando = "delete from `produtos_em_orcamento` where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento_ret' and codigoproduto = '$codigoqueseraretiradodoorcamento' and num_fatura = '$num_fatura_ret' limit 1 ";

mysql_query($comando,$conexao);


}

}
else{
?>
<script>

alert("ATEN&Ccedil;&Atilde;O!!!... C&oacute;digo incorreto, procure seu Gerente!\n");


</script>
<?	
}
}
	
	// FIM DE RETIRADA DE PRODUTOS

	

}
		  
		  ?>
        Pedido de retirada de itens
        <?

echo "$estab_pertence";

?>
      </font></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td colspan="10"></td>
    </tr>
    <tr>
      <td align="left"><strong><font>Fatura</font></strong></td>
      <td align="left"><strong>Orcamento</strong></td>
      <td align="center"><strong>Placa</strong></td>
      <td align="center"><strong>Veiculo</strong></td>
      <td align="left"><strong>Cod Produto</strong></td>
      <td width="17%" align="left"><strong>Produto</strong></td>
      <td width="10%" align="left"><strong>Status</strong></td>
      <td width="9%" align="left"><strong>Loja</strong></td>
      <td width="6%" align="left">&nbsp;</td>
      <td width="35%" align="center"><strong>#</strong></td>
    </tr>
	  
	  <?
$codigoeditar = $_POST['codigoeditar'];
	  if($solicitacao=="gravaeditar"){
		  unset($codigoeditar);
	  }
		  
		  
		  //if(empty($codigoeditar)){
			  //loja = '$estab_pertence' and 
			  $sql = "select * from pedido_de_retirada_produto_da_fatura where cpf_proprietario = '$cpf_proprietario' and statusautorizacao = 'Aguardando Autorizacao' order by codigo desc";
		  //}
		  //else{
			  
			  //$sql = "select * from pedido_de_retirada_produto_da_fatura where codigo = '$codigoeditar' and loja = '$estab_pertence' and statusautorizacao = 'Aguardando Autorizacao'";
		  //}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_de_pedido_de_retirada_de_itens = mysql_num_rows($res);
	
	$codigo_de_retirada = $linha[0];
	$num_fatura = $linha[10];
	$codigoorcamento = $linha[11];
	$codigoproduto = $linha[12];
	$nomeproduto = $linha[13];
	$statusautorizacao = $linha[15];
	$loja = $linha[18];
	$placa = $linha[19];
	$veiculo = $linha[20];
	

	  
	  ?>
	  
    <tr>
		<form action="index.php#efetiva_retirada_item" method="post" enctype="multipart/form-data" name="form1">
      <td width="5%"><strong><font color="#0000FF">
		  <? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ echo "$num_fatura"; }else{ echo "$num_fatura"; } ?>
        <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo "$num_fatura"; ?>">
      </font></strong></td>
      <td width="8%"><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ echo "$codigoorcamento"; }else{ echo "$codigoorcamento"; } ?>
        <input name="codigo_orcamento_ret" type="hidden" id="codigo_orcamento_ret" value="<? echo "$codigoorcamento"; ?>"></td>
      <td width="10%" align="center"><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ echo "$placa"; }else{ echo "$placa"; } ?></td>
      <td width="10%" align="center"><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ echo "$veiculo"; }else{ echo "$veiculo"; } ?></td>
      <td width="10%"><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ echo "$codigoproduto"; }else{ echo "$codigoproduto"; } ?></td>
      <td><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ echo "$nomeproduto"; }else{ echo "$nomeproduto"; } ?>
        <input name="codigoqueseraretiradodoorcamento" type="hidden" id="codigoqueseraretiradodoorcamento" value="<? echo "$codigoproduto"; ?>"></td>
      <td><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){ echo "$statusautorizacao"; }else{ echo "$statusautorizacao"; } ?></td>
      <td><? if(($solicitacao=="editar") && ($codigo==$codigoeditar)  ){echo "$loja"; }else{ echo "$loja"; } ?>
        <input name="estab_pertence_gerencia" type="hidden" id="estab_pertence_gerencia" value="<? echo "$loja"; ?>">
        
      </font></strong></td>
      <td>&nbsp;</td>
      <td align="center"><?
	

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? //echo "editar"; ?>">
        <input name="codigoeditar" type="hidden" id="codigoeditar" value="<? echo "$codigo"; ?>">
        <input name="codigo_de_retirada" type="hidden" id="codigo_de_retirada" value="<? echo "$codigo_de_retirada"; ?>">
        <strong><font color="#0000FF">
        <input name="codigo_orcamento_ret" type="hidden" id="codigo_orcamento_ret" value="<? echo $codigoorcamento; ?>">
        </font>
        <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
        <font color="#0000FF">
        <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
        </font>
        <input name="retirada_de_produto" type="hidden" id="retirada_de_produto" value="retirar_produto">
        </strong>
        <input class="class01" type="submit" name="Submit2" value="<? if($solicitacao=="editar"){ echo "Autorizar"; }else{ echo "Autorizar"; } ?>"></td>
			</form>
		<? } ?>
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
      <td align="center"><div id="efetiva_retirada_item" class="modal" role="dialog" style="overflow: auto; width: 400px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a> ATEN&Ccedil;&Atilde;O!!!...<br>
        <br>
        Sr. Gerente <br>
  <br>
        Insira seu C&oacute;digo!...<br>
  <br>
  <? 
		  $retirada_de_produto = $_POST['retirada_de_produto'];
		  if($retirada_de_produto=="retirar_produto"){
	
$datepedido = date('Y-m-d');
$horapedido = date('H:i:s');
$dateretiradapedido = date('Y-m-d');
$horaretiradapedido = date('H:i:s');

$codigoqueseraretiradodoorcamento = $_POST['codigoqueseraretiradodoorcamento'];
	$codigo_orcamento_ret = $_POST['codigo_orcamento_ret'];
	$codigo_de_retirada = $_POST['codigo_de_retirada'];
	$num_fatura = $_POST['num_fatura'];
	$estab_pertence_gerencia = $_POST['estab_pertence_gerencia'];


$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura' and codigo_orcamento = '$codigo_orcamento_ret' and codigoproduto = '$codigoqueseraretiradodoorcamento'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$total_itens_para_retirar = mysql_num_rows($res);
	
$nomeprodutoaretirar = $linha[18];
$quant_a_retirar = $linha[21];	

}
		
if($total_itens_para_retirar==0){
	
	echo "Orcamento $codigo_orcamento_ret Fatura $num_fatura Codigo informado $codigoqueseraretiradodoorcamento nao existe no or&ccedil;amento! <br>
	Informe o codigo do produto corretamente!";
}
else{
	

echo "<form name='cancel_item' method='post' action='index.php'>
                <div align='center'>
                  Codigo de Autoriza&ccedil;&atilde;o<br><input type='password' name='cod_gerente' id='cod_gerente' placeholder='C&oacute;digo Gerencial'>
				  <input name='solicitacao' type='hidden' id='solicitacao' value='verifica_a_retirada'>
				  <input name='estab_pertence_gerencia' type='hidden' id='estab_pertence_gerencia' value='$estab_pertence_gerencia'>
				  <input type='hidden' name='codigo_orcamento_ret' id='codigo_orcamento_ret' value='$codigo_orcamento_ret'>
                  <input type='hidden' name='codigoqueseraretiradodoorcamento' id='codigoqueseraretiradodoorcamento' value='$codigoqueseraretiradodoorcamento'>
				  <input type='hidden' name='quant_a_retirar' id='quant_a_retirar' value='$quant_a_retirar'>
				  <input name='nome' type='hidden' id='nome' value='$nome'>
				  <input name='num_fatura_ret' type='hidden' id='num_fatura_ret' value='$num_fatura'>
				  <input name='num_fatura' type='hidden' id='num_fatura' value='$num_fatura'>
				  <input name='codigo_orcamento' type='hidden' id='codigo_orcamento' value='$codigoorcamento'>
				  <input name='veiculo' type='hidden' id='veiculo' value='$veiculo'>
				  <input name='placa' type='hidden' id='placa' value='$placa'>
				  <input name='codigo_de_retirada' type='hidden' id='codigo_de_retirada' value='$codigo_de_retirada'>
				  <input name='dateautorizacao' type='hidden' id='dateautorizacao' value='$dateretiradapedido'>
                  <input name='horaautorizacao' type='hidden' id='horaautorizacao' value='$horaretiradapedido'><br>
<input class='class01' type=image src='../../../imagens_botoes/ok.png' width='50' height='50' name='button2' id='button2' value='Autorizar'>
                </div>";
	?>
  <? if($area_a_focar_campo=="cancelamento_de_item"){ ?>
  <script language='JavaScript' type='text/javascript'>
document.cancel_item.cod_gerente.focus()
              </script>
  <? }  ?>
  <?
              echo "
			  Fatura: $num_fatura<br>
			  Or&ccedil;amento: $codigo_orcamento_ret<br>
			  Produto: $codigoqueseraretiradodoorcamento<br>
			  </form>";
}
	
}
	
?>
  <strong><font color="#0000FF">
  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
  </font><font color="#0000FF">
  <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
  </font></strong><strong><font color="#0000FF">
  <input name="solicitacao" type="hidden" id="solicitacao">
  </font></strong><strong><font color="#0000FF">
  <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
  <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
  </font>
  <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
  <font color="#0000FF"> </font></strong>
  <input name="codigoeditar" type="hidden" id="codigoeditar" value="<? echo "$codigo"; ?>">
      <input name="estab_pertence_gerencia" type="hidden" id="estab_pertence_gerencia" value="<? echo "$loja"; ?>">
      </div></td>
    </tr>
	  
		  
    <tr>
      <td colspan="10">&nbsp;</td>
    </tr>
  </table>

<p>&nbsp;</p>
<p>&nbsp; </p>
</body>

</html>
<? 
mysql_free_result($res);
mysql_close($conexao);
?>

