<?php

require '../../../../conect/conect.php';
include '../../../../css_menus/modal.css';
include '../../../../css_menus/modal2.css';



$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

	
$db = $linha[1];
}


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

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


?>





<html>

<head>

<title>Relatorio de comissoes</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {font-size: 35px;
	font-weight: bold;
	color: #020202;
}
.style11 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}
	
.class01 {font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}

-->
</style>


</head>

<?

	
$solicitacao = $_POST['solicitacao'];
$status_a_alterar = $_POST['status_a_alterar'];
$condicao = $_POST['condicao'];

	
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


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
	$despesas = $linha[56];
	$veiculos = $linha[57];
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
	$custo_fixo = $linha[91];
	$transferencia_de_estoque = $linha[92];
	$status_e_condicao_da_transferencia_de_estoque = $linha[93];
	$responder_transferencias_de_estoque = $linha[94];
	$visualiza_transferenc = $linha[95];
	
	
}	
	
$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$diafechamento = $linha[45];
	$classificacao = $linha[46];
	$cpf_proprietario = $linha[17];
	
	$classificacao = $linha[46];
	$cartao_vai_pro_caixa = $linha[47];
	$emaildaempresa = $linha[14];
	
}



$hora = date('H:i:s');
$hora_leitura = date('H:i:s');
	
$num_fatura_abrir = $_POST['num_fatura_abrir'];

//-----------calculando data de ontem--------------

$datecadastro = date('Y-m-d');
$datacadastro = date('d-m-Y');

$datadehoje = time(); 
$ontem = $datadehoje - (24*3600);
$datadeontem = date('Y-m-d', $ontem);
	
	
$data_de_ontem_obtida = $datadeontem;

$data_de_ontem_obtida2 = explode("-", $data_de_ontem_obtida);

$ano_de_ontem_obtido = $data_de_ontem_obtida2[0];

$mes_de_ontem_obtido = $data_de_ontem_obtida2[1];

$dia_de_ontem_obtido = $data_de_ontem_obtida2[2];
	
$data_do_fechamento_obtido = "$dia_de_ontem_obtido-$mes_de_ontem_obtido-$ano_de_ontem_obtido";

//-------------fim do calculo da data de ontem------------

$data_leitura = date('d-m-Y');

$diaatual = date('d');
$mesatual = date('m');
$dia = date('d');

$mes = date('m');

$ano = date('Y');

$ano_anterior = date('Y')-1;
$ano_atual = date('Y');
$ano_proximo = date('Y')+1;


$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];
	
$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];
	

$dateinicial = "$ano-$mesatual-$diaatual";
$datefinal = "$ano-$mesatual-$diaatual";
	
$periodoinicial = "$ano-$mesatual-01";
$periodofinal = "$ano-$mesatual-31";
	
$dateinicial_modal = "$ano_inicial-$mes_inicial-$dia_inicial";
$datefinal_modal = "$ano_final-$mes_final-$dia_final";
	
	




$data_hoje = $_SESSION['data_hoje'];

$codigo_mensagem = $_POST['codigo_mensagem'];

$mensagem_lida = $_POST['mensagem_lida'];



if($mensagem_lida=="Lida"){


$comando = "update `$linha[1]`.`mensagens_ao_funcionario` set `codigo` = '$codigo_mensagem',`mensagem_lida` = '$mensagem_lida',`data_leitura` = '$data_leitura',`hora_leitura` = '$hora_leitura' where `mensagens_ao_funcionario`. `codigo` = '$codigo_mensagem' limit 1 ";
mysql_query($comando,$conexao);



}

?>



<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	
	  
<body background="../../../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
<table width="95%" border="0" align="center">
  <tbody>
    <tr>
      <th width="24%" align="left" scope="col"><form name="form1" method="post" action="../../../index.php">
        <p>
          <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
          <input class='class01' type=image src="../../../../imagens/botoes/voltar.png" width="50" height="50" name="Submit" value="ESTOQUE DE PE&Ccedil;AS">
          <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
        </p>
      </form></th>
      <th width="52%" scope="col"><? 
		  
		   $estab_pertence_empresa_solicitante = $_POST['estab_pertence_empresa_solicitante'];
			  $estab_pertence_empresa_solicitada = $_POST['estab_pertence_empresa_solicitada'];
		  
			  $codigo_da_ocorrencia = $_POST['codigo_da_ocorrencia'];
		  $codigo_orcamento = $_POST['codigo_orcamento'];
			  $nomeproduto = $_POST['nomeproduto'];
			  
			  $quantidade = $_POST['quantidade'];
			  $cod_prod_at = $_POST['cod_prod_at'];
			  
			  $detalhamento = $_POST['detalhamento'];
			  $datamanutencao = date('Y-m-d');
			  $horamanutencao = date('H:i:s');
		  
		  if((empty($solicitacao)) or ($solicitacao<>"respondersolicitacao")  ){}else{
			  
		  if(($solicitacao=="respondersolicitacao") && ($status_a_alterar=="ACEITO") && ($condicao=="FINALIZADO") ){
			  
			 
			  
			  
if(empty($detalhamento)){
		
	}
	else{

$comando = "insert into nfs_manutencao_trans(cod_ocorrencia,num_fatura,codigo_orcamento,nf,fornecedor,veiculo,placa,chassi,renavam,datamanutencao,link_nf,valormanutencao,obs_adicional_da_manutencao,data_adicional,hora_adicional,operador_informante,obs_oculta) 

values('$codigo_da_ocorrencia','$num_fatura_abrir','$codigo_orcamento','$nf','$estab_pertence','$veiculo','$placa','$chassi','$renavam','$datamanutencao','$link_nf','$valormanutencao','$detalhamento','$datamanutencao','$horamanutencao','$operador','nao')";
mysql_query($comando,$conexao);
		
	}
			  
			  
$sql = "SELECT * FROM estoque_pecas where estab_pertence = '$estab_pertence_empresa_solicitada' and codigo = '$cod_prod_at' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$quant_estoque = $linha[16];

}
			  
			$saldo_estoque_da_peca_da_empresa_solicitada = bcsub($quant_estoque,$quantidade);
	

	
$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca_da_empresa_solicitada' where `estoque_pecas`. `codigo` = '$cod_prod_at'";
mysql_query($comando,$conexao);
			  
			  
			  
$sql = "SELECT * FROM estoque_pecas where estab_pertence = '$estab_pertence_empresa_solicitante' and nome_produto = '$nomeproduto' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$cod_prod_at_solicitante = $linha[11];
$quant_estoque = $linha[16];

}
			  
			  $saldo_estoque_da_peca_da_empresa_solicitante = bcadd($quant_estoque,$quantidade);
	

			  
$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca_da_empresa_solicitante' where `estoque_pecas`. `codigo` = '$cod_prod_at_solicitante'";
mysql_query($comando,$conexao);
			  
			  
			  
$comando = "update `$db`.`orcamentos_trans` set `condicao` = '$condicao',`status` = '$status_a_alterar',`cod_ocorrencia` = '$cod_ocorrencia' where `orcamentos_trans`. `num_fatura` = '$num_fatura_abrir'";
mysql_query($comando,$conexao);
			  
		  }
		  else{
			  
$comando = "insert into nfs_manutencao_trans(cod_ocorrencia,num_fatura,codigo_orcamento,nf,fornecedor,veiculo,placa,chassi,renavam,datamanutencao,link_nf,valormanutencao,obs_adicional_da_manutencao,data_adicional,hora_adicional,operador_informante,obs_oculta) 

values('$codigo_da_ocorrencia','$num_fatura_abrir','$codigo_orcamento','$nf','$estab_pertence','$veiculo','$placa','$chassi','$renavam','$datamanutencao','$link_nf','$valormanutencao','$detalhamento','$datamanutencao','$horamanutencao','$operador','nao')";
mysql_query($comando,$conexao);
		
	
			  
$comando = "update `$db`.`orcamentos_trans` set `condicao` = '$condicao',`status` = '$status_a_alterar',`cod_ocorrencia` = '$cod_ocorrencia' where `orcamentos_trans`. `num_fatura` = '$num_fatura_abrir'";
mysql_query($comando,$conexao);
			  
		  }
			  
		  }
		  
		  ?></th>
      <th width="24%" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="18%" align="center"><div align="center"><strong>N&ordm; Pedido</strong></div></td>
    <td width="43%" align="center"><div align="center"><strong>Total da Transferencia</strong></div></td>
    <td width="39%" align="center"><div align="center"><strong>#</strong></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">
		 
      <?

$sql = "SELECT * FROM orcamentos_trans where cpf_proprietario = '$cpf_proprietario' and condicao = 'SOLICITACAO' and status = 'Aberto' order by codigo_orcamento desc";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$codigo_orcamento = $linha[0];
$num_fatura = $linha[48];
	
$total_geral = $linha[40];
	$data_da_abertura_do_orcamento = $linha[5];
	$loja_solicitada = $linha[53];
	$loja_solicitante = $linha[43];
	$operador_solicitante = $linha[46];

?>
      <table  width="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td background="../../../../imagens_sistema/fundocelulas2.png"width="24%"><div align="center"><strong><a name="<? echo "$codigo_orcamento"; ?>"></a><? echo "$data_da_abertura_do_orcamento - Orcamento: $codigo_orcamento"; ?></strong></div></td>
          <td background="../../../../imagens_sistema/fundocelulas2.png" width="40%"><div align="center"><strong>
            <?
	
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento_trans where codigo_orcamento = '$codigo_orcamento' and status = 'Aberto'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];

//echo "R$ $totalizacao_cmv_dos_produtos";

	


$sub_saldogeralliquido = bcsub($total_geral,$totalizacao_cmv_dos_produtos,2);
	$sub_saldogeralliquido2 = bcsub($sub_saldogeralliquido,$total_comissao,2);
			  
	
	echo "(Transf.)R$ $total_geral - (CMV)R$ $totalizacao_cmv_dos_produtos <br> (Saldo Liquido)R$ $sub_saldogeralliquido2"; 
			  ?>
          </strong></div></td>
          <td background="../../../../imagens_sistema/fundocelulas2.png"width="56%"><div align="center">
            <form name="form1" method="post" action="index.php#<? echo "$codigo_orcamento"; ?>">
              <strong>
                <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                </strong>
              <input name="operador_pesquisar" type="hidden" id="operador_pesquisar" value="<? echo "$operador_pesquisar";  ?>">
              <input name="num_fatura_abrir" type="hidden" id="num_fatura_abrir" value="<? echo "$num_fatura";  ?>">
             
<input name="solicitacao" type="hidden" id="solicitacao" value="<? if(($solicitacao=="analitico") && ($num_fatura_abrir==$num_fatura)){ echo "sintetico"; }else{ echo "analitico"; } ?>">
              <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "$dia_inicial"; ?>">
              <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes_inicial"; ?>">
              <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano_inicial"; ?>">
              <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano_final"; ?>">
              <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes_final"; ?>">
              <input name="dia_final" type="hidden" id="dia_final" value="<? echo "$dia_final"; ?>">
              <? echo "$loja_solicitante solicitou para $loja_solicitada "; ?>
              <input type="submit" class='class01' name="button2" id="button2" value="<? if(($solicitacao=="analitico") && ($num_fatura=="$num_fatura_abrir")){ echo "-"; }else{ echo "+"; } ?>">
            </form>
          </div></td>
          <td background="../../../../imagens_sistema/fundocelulas2.png"width="56%"><form name="form2" method="post" action="index.php#visualiza_vendas_periodico">
            <strong>
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            </strong>
            <input class='class01' type=image src="../../../../imagens_botoes/ok.png" width="25" height="25" name="submit" id="submit" value="Cupom">
            <input name="num_fatura_abrir" type="hidden" id="num_fatura_abrir" value="<? echo "$num_fatura";  ?>">
          </form></td>
        </tr>
		  
        <tr>
          <td colspan="4"><div align="center">
            <?
	
	
if(($solicitacao=="analitico") && ($num_fatura=="$num_fatura_abrir")){


?>
            <table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td background="../../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Codigo</strong></div></td>
                <td align="center" background="../../../../imagens_sistema/fundocelulas2.png"><strong>Produto</strong></td>
                <td background="../../../../imagens_sistema/fundocelulas2.png" align="center"><strong>Quant</strong></td>
                <td background="../../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Total CMV</strong></div></td>
                <td width="19%" align="center" background="../../../../imagens_sistema/fundocelulas2.png"><strong>Toal Liquido da Transferencia</strong></td>
                </tr>
              <?

$sql4 = "SELECT * FROM produtos_em_orcamento_trans where num_fatura = '$num_fatura_abrir' order by codigo asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {
$total_itens_fatura = mysql_num_rows($res4);
	
	$codigodoproduto = $linha[17];
	$nomeproduto = $linha[18];
	$precocompra = $linha[20];
	$quantidade = $linha[21];
	$preco = $linha[22];
	$totalitem = $linha[29];
	$data_fechamento = $linha[45];
	$hora_fechamento = $linha[46];
	$totalizacao_cmv = $linha[94];
	$valor_comissao = $linha[115];
	
?>
              <tr>
                <td width="10%" background="../../../../imagens_sistema/fundocelulas1.png"><div align="center"><? echo "$codigodoproduto"; ?></div></td>
                <td width="9%" align="center" background="../../../../imagens_sistema/fundocelulas1.png"><? echo "$nomeproduto"; ?></td>
                <td background="../../../../imagens_sistema/fundocelulas1.png" width="9%" align="center"><? echo "$quantidade"; ?></td>
                <td background="../../../../imagens_sistema/fundocelulas1.png" width="11%"><div align="center"><strong>
                  <?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento_trans where num_fatura = '$num_fatura_abrir' and categoria = 'VENDA DE PRODUTOS' and codigoproduto = '$codigodoproduto'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];
if(empty($totalizacao_cmv_dos_produtos)){
	
}
else{
echo "R$ $totalizacao_cmv_dos_produtos";
}


?>
                </strong></div></td>
                <td align="center" background="../../../../imagens_sistema/fundocelulas1.png"><? 
	$sub_saldogeralliquido = bcsub($totalitem,$totalizacao_cmv_dos_produtos,2);
	$sub_saldogeralliquido2 = bcsub($sub_saldogeralliquido,$totalizacao_cmv_dos_servicos,2);
	$sub_saldogeralliquido3 = bcsub($sub_saldogeralliquido2,$valor_comissao,2);
	
	echo "R$ $sub_saldogeralliquido3";
					
					?></td>
                </tr>
              <?





}

?>
              <tr>
                <td background="../../../../imagens_sistema/fundocelulas1.png"colspan="5"><div align="center"><strong>Total de itens <? echo $total_itens_fatura;?></strong></div>
                  <div align="center"></div></td>
              </tr>
            </table>
            <?  } ?> 
          </div>
            <div align="center"></div></td>
        </tr>
      </table>
      <br>
      <? } ?>
	
    </div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">
      <div id="visualiza_vendas_periodico" class="modal2" role="dialog" style="overflow: auto; width: 1000px; height: 400px; border:solid 0px"> 
        <p><a href="#fechar" title="Fechar" class="fechar"><b>X</b></a></p>
        <p>
          <?
			

$sql = "SELECT * FROM orcamentos_trans where cpf_proprietario = '$cpf_proprietario' and num_fatura = '$num_fatura_abrir' and status = 'Aberto' order by codigo_orcamento desc";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$codigo_orcamento = $linha[0];
	$status_gravado = $linha[2];
	$condicao_gravado = $linha[42];
$num_fatura = $linha[48];
	
$total_geral = $linha[40];
	$data_da_abertura_do_orcamento = $linha[5];
	$loja_solicitada = $linha[53];
	$loja_solicitante = $linha[43];
	$operador_solicitante = $linha[46];

?>
        </p><br><br><br><br><br>
        <table  width="100%" border="1" cellpadding="0" cellspacing="0">
          <tr class="class01">
            <td background="../../../../imagens_sistema/fundocelulas2.png"width="24%"><div align="center"><strong><? echo "$data_da_abertura_do_orcamento - Orcamento: $codigo_orcamento"; ?></strong></div></td>
            <td background="../../../../imagens_sistema/fundocelulas2.png" width="40%"><div align="center"><strong>
              <?
	
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento_trans where codigo_orcamento = '$codigo_orcamento' and status = 'Aberto'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];

//echo "R$ $totalizacao_cmv_dos_produtos";

	


$sub_saldogeralliquido = bcsub($total_geral,$totalizacao_cmv_dos_produtos,2);
	$sub_saldogeralliquido2 = bcsub($sub_saldogeralliquido,$total_comissao,2);
			  
	
	echo "(Transf.)R$ $total_geral - (CMV)R$ $totalizacao_cmv_dos_produtos <br> (Saldo Liquido)R$ $sub_saldogeralliquido2"; 
			  ?>
            </strong></div></td>
            <td background="../../../../imagens_sistema/fundocelulas2.png"width="56%"><div align="center"><? echo "$loja_solicitante<br> solicitou para<br> $loja_solicitada"; ?>
              
            </div></td>
            </tr>
          <tr>
            <td colspan="3"><div align="center">
              <?
	
	
//if(($solicitacao=="analitico") && ($num_fatura=="$num_fatura_abrir")){


?>
              <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td background="../../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Codigo</strong></div></td>
                  <td align="center" background="../../../../imagens_sistema/fundocelulas2.png"><strong>Produto</strong></td>
                  <td background="../../../../imagens_sistema/fundocelulas2.png" align="center"><strong>Quant</strong></td>
                  <td background="../../../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Total CMV</strong></div></td>
                  <td width="19%" align="center" background="../../../../imagens_sistema/fundocelulas2.png"><strong>Toal Liquido da Transferencia</strong></td>
                </tr>
                <?

$sql4 = "SELECT * FROM produtos_em_orcamento_trans where num_fatura = '$num_fatura_abrir' order by codigo asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {
$total_itens_fatura = mysql_num_rows($res4);
	
	$codigodoproduto = $linha[17];
	$cod_prod_at = $linha[17];
	
	$nomeproduto = $linha[18];
	$precocompra = $linha[20];
	$quantidade = $linha[21];
	$preco = $linha[22];
	$totalitem = $linha[29];
	$data_fechamento = $linha[45];
	$hora_fechamento = $linha[46];
	$totalizacao_cmv = $linha[94];
	$valor_comissao = $linha[115];
	
?>
                <tr>
                  <td width="10%" background="../../../../imagens_sistema/fundocelulas1.png"><div align="center"><? echo "$codigodoproduto"; ?></div></td>
                  <td width="9%" align="center" background="../../../../imagens_sistema/fundocelulas1.png"><? echo "$nomeproduto"; ?></td>
                  <td background="../../../../imagens_sistema/fundocelulas1.png" width="9%" align="center"><? echo "$quantidade"; ?></td>
                  <td background="../../../../imagens_sistema/fundocelulas1.png" width="11%"><div align="center"><strong>
                    <?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento_trans where num_fatura = '$num_fatura_abrir' and categoria = 'VENDA DE PRODUTOS' and codigoproduto = '$codigodoproduto'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];
if(empty($totalizacao_cmv_dos_produtos)){
	
}
else{
echo "R$ $totalizacao_cmv_dos_produtos";
}


?>
                  </strong></div></td>
                  <td align="center" background="../../../../imagens_sistema/fundocelulas1.png"><? 
	$sub_saldogeralliquido = bcsub($totalitem,$totalizacao_cmv_dos_produtos,2);
	$sub_saldogeralliquido2 = bcsub($sub_saldogeralliquido,$totalizacao_cmv_dos_servicos,2);
	$sub_saldogeralliquido3 = bcsub($sub_saldogeralliquido2,$valor_comissao,2);
	
	echo "R$ $sub_saldogeralliquido3";
					
					?></td>
                </tr>
                <?





}

?>
                <tr>
                  <td background="../../../../imagens_sistema/fundocelulas1.png"colspan="5"><div align="center"><strong>Total de itens <? echo $total_itens_fatura;?></strong></div>
                    <div align="center"></div></td>
                </tr>
              </table>
              <?  //} ?>
            </div>
              <div align="center"></div></td>
          </tr>
			
          <tr>
            <td colspan="3">
                <p class="class01"><strong>
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?

	
$sql = "SELECT * FROM ocorrencias_trans where num_fatura = '$num_fatura_abrir'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_da_ocorrencia = $linha[0];
$cod_ocorrencia2 = $linha[0];
$placa = $linha[1];

$renavam = $linha[2];
$chassi = $linha[3];
$condutor = $linha[4];

$concessionaria = $linha[5];
	$datamanutencao = $linha[6];
	$data_da_manutencao = $linha[6];
	
	$horamanutencao = $linha[7];
	$municipio = $linha[8];
	$tipomanutencao = $linha[9];
	$detalhamento_ocorrencia = $linha[10];
	$agente = $linha[11];
	$corveiculo = $linha[12];
	
	$horimetro = $linha[13];
$km = $linha[14];
$valormanutencao = $linha[15];
$descontar = $linha[16];
	$fornecedor = $linha[21];
	$primeira_nf = $linha[22];
	$link_primeira_nf = $linha[23];
	$operador_manutencao = $linha[24];
	
	
	echo "$codigo_da_ocorrencia - $data_da_manutencao - $horamanutencao : $detalhamento_ocorrencia<br><br>";
}
	

$sql3 = "SELECT * FROM nfs_manutencao_trans where cod_ocorrencia = '$cod_ocorrencia2' and obs_oculta <> 'sim' order by codigo desc";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


	$numero_nf = $linha[2];
	$link_da_nf = $linha[9];
$obs_adicional_da_manutencao = $linha[11];
	$horimetro_atual = $linha[17];
	$comentario_inserido = $linha[18];
	$data_adicional = $linha[12];
	$hora_adicional = $linha[13];
	$operador_informante = $linha[14];
	$obs_oculta = $linha[23];
	
	if($obs_oculta=="sim"){
	
}
else{
echo "$data_adicional - $hora_adicional  $obs_adicional_da_manutencao<br>";
}
	
}
	
	
?>
                  </strong>
					<form name="form1" method="post" action="index.php">
						
				<p class="class01">
				  <input name="estab_pertence_empresa_solicitante" type="hidden" id="estab_pertence_empresa_solicitante" value="<? echo "$loja_solicitante";  ?>">
				  
				  <input name="estab_pertence_empresa_solicitada" type="hidden" id="estab_pertence_empresa_solicitada" value="<? echo "$loja_solicitada";  ?>">
				  <input name="quantidade" type="hidden" id="quantidade" value="<? echo "$quantidade";  ?>">
				  <input name="cod_prod_at" type="hidden" id="cod_prod_at" value="<? echo "$cod_prod_at";  ?>">
				   <input name="nomeproduto" type="hidden" id="nomeproduto" value="<? echo "$nomeproduto";  ?>">
					 <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento";  ?>">
				  <input name="codigo_da_ocorrencia" type="hidden" id="codigo_da_ocorrencia" value="<? echo "$codigo_da_ocorrencia";  ?>">
				  <input name="num_fatura_abrir" type="hidden" id="num_fatura_abrir" value="<? echo "$num_fatura";  ?>">
				  <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "respondersolicitacao"; ?>">
				  <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "$dia_inicial"; ?>">
				  <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes_inicial"; ?>">
				  <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano_inicial"; ?>">
				  <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano_final"; ?>">
				  <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes_final"; ?>">
				  <input name="dia_final" type="hidden" id="dia_final" value="<? echo "$dia_final"; ?>">
				  Condicao:<strong>
				  <? if($status_e_condicao_da_transferencia_de_estoque=="sim" ){ ?>
				  </strong>
<select name="condicao" id="condicao" class="class02">
  
  <?

    $sql = "select * from condicaodeorcamento_trans where condicao <> 'SOLICITACAO' order by condicao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['condicao']."</option>";
    }
?>
</select>
<strong>
<? }else{ echo $condicao_gravado; } ?>
</strong>
				  Status:<strong>
				  <? if($status_e_condicao_da_transferencia_de_estoque=="sim" ){ ?>
				  </strong>
<select name="status_a_alterar" id="status_a_alterar" class="class02">
  
  <?

    $sql = "select * from status_orcamento_trans order by status asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['status']."</option>";
    }
?>
</select>
<strong>
<? }else{ echo $status_gravado; } ?>
</strong><br>
				  <strong>
				  <? if($status_e_condicao_da_transferencia_de_estoque=="sim" ){ ?>
				  </strong>Detalhamento
<textarea class='class02' name="detalhamento" cols="60" rows="3" id="detalhamento"></textarea>
				  <input type="submit" class='class01' name="button" id="button" value="<? echo "Responder"; ?>">
				  <strong>
				  <? } ?>
				  </strong></p>
                </p>
              </form></td>
          </tr>
        </table>
        <p>
          <? } ?>
        </p>
      </div>
    </div></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
</table>
<p align="center">
  
  
  
  
</p>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>