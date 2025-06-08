<?php

require '../../conect/conect.php';
include '../../css_menus/modal.css';
include '../../css_menus/modal2.css';


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

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`mensagens_ao_funcionario` set `codigo` = '$codigo_mensagem',`mensagem_lida` = '$mensagem_lida',`data_leitura` = '$data_leitura',`hora_leitura` = '$hora_leitura' where `mensagens_ao_funcionario`. `codigo` = '$codigo_mensagem' limit 1 ";

}



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
	
	  
<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
<table width="95%" border="0" align="center">
  <tbody>
    <tr>
      <th width="24%" align="left" scope="col"><form name="form1" method="post" action="../index.php">
        <p>
          <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
          <input class='class01' type=image src="../../imagens/botoes/voltar.png" width="50" height="50" name="Submit" value="ESTOQUE DE PE&Ccedil;AS">
          <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
        </p>
      </form></th>
      <th width="52%" scope="col"><form action="encerramento_premiacoes.php" method="post" name="form4" target="_blank">
        <strong><span class="style1">
        </span>
        <span class="style1"><br></span>
        <?
			
$sql = "select sum(total) as total_vendas_orcamentos_do_mes from orcamentos where loja = '$estab_pertence' and status = 'Finalizado' and datefechamento between '$periodoinicial' and '$periodofinal'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_vendas_orcamentos_do_mes = $linha['total_vendas_orcamentos_do_mes'];
			
	
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos_no_mes from produtos_em_orcamento where loja = '$estab_pertence' and  status = 'Finalizado' and datafechamento between '$periodoinicial' and '$periodofinal'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos_no_mes = $linha['totalizacao_cmv_dos_produtos_no_mes'];

//echo "R$ $totalizacao_cmv_dos_produtos";

	
	
	$sql2 = "select sum(comissao) as total_comissao from produtos_em_orcamento where loja = '$estab_pertence' and  status = 'Finalizado' and datafechamento between '$periodoinicial' and '$periodofinal'";
$resultado2=mysql_query($sql2, $conexao);
$linha=mysql_fetch_array($resultado2);


$total_comissao = $linha['total_comissao'];

			  
	
	//echo "R$ $total_comissao"; 
			  

$sub_saldogeralliquido = bcsub($total_vendas_orcamentos_do_mes,$totalizacao_cmv_dos_produtos_no_mes,2);
	$sub_saldogeralliquido2 = bcsub($sub_saldogeralliquido,$total_comissao,2);
			  
	
	echo "(Venda)R$ $total_vendas_orcamentos_do_mes - (CMV)R$ $totalizacao_cmv_dos_produtos_no_mes - (Comissao)R$ $total_comissao <br> (Saldo Liquido)R$ $sub_saldogeralliquido2"; 
			  ?>
        <input name="mes_referencia" type="hidden" id="mes_referencia" value="<? echo "$mesatual"; ?>">
        <input name="ano_referencia" type="hidden" id="ano_referencia" value="<? echo "$ano_atual"; ?>">
        <input name="nome" type="hidden" id="nome" value="<? echo "$operador_pesquisar"; ?>">
        <input name="comissao" type="hidden" id="comissao" value="<? echo "$total_comissao_do_mes"; ?>">
        <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo "$estab_pertence"; ?>">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </strong>
      </form></th>
      <th width="24%" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td align="center"><form name="form3" method="post" action="index.php#visualiza_vendas_periodico">
        <strong>
			<?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
		  <select class="class02" name="dia_inicial" id="dia_inicial">
            
			<option selected>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            <option>06</option>
            <option>07</option>
            <option>08</option>
            <option>09</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option>31</option>
          </select>
          <select class="class02" name="mes_inicial" id="mes_inicial">
            <option selected="selected"><? if(empty($mes_inicial)){ echo $mesatual; }else{ echo $mes_inicial; } ?></option>
            <option>01</option>
            <option>02</option>
            <option>03</option>
            <option>04</option>
            <option>05</option>
            <option>06</option>
            <option>07</option>
            <option>08</option>
            <option>09</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
          </select>
          <select class="class02" name="ano_inicial" id="ano_inicial">
            <option> <? echo $ano_anterior; ?></option>
            <option selected="selected"><? echo $ano; ?></option>
            <option> <? echo $ano_posterior; ?></option>
          </select>
          ate
  <select class="class02" name="dia_final" id="dia_final">
    
    <option>01</option>
    <option>02</option>
    <option>03</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>07</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
    <option>13</option>
    <option>14</option>
    <option>15</option>
    <option>16</option>
    <option>17</option>
    <option>18</option>
    <option>19</option>
    <option>20</option>
    <option>21</option>
    <option>22</option>
    <option>23</option>
    <option>24</option>
    <option>25</option>
    <option>26</option>
    <option>27</option>
    <option>28</option>
    <option>29</option>
    <option>30</option>
    <option selected>31</option>
  </select>
  <select class="class02" name="mes_final" id="mes_final">
    <option selected="selected"><? if(empty($mes_final)){ echo $mesatual; }else{ echo $mes_final; } ?></option>
    <option>01</option>
    <option>02</option>
    <option>03</option>
    <option>04</option>
    <option>05</option>
    <option>06</option>
    <option>07</option>
    <option>08</option>
    <option>09</option>
    <option>10</option>
    <option>11</option>
    <option>12</option>
  </select>
  <select class="class02" name="ano_final" id="ano_final">
    <option> <? echo $ano_anterior; ?></option>
    <option selected="selected"><? echo $ano; ?></option>
    <option> <? echo $ano_posterior; ?></option>
  </select>
          </strong>
        <input class='class01' type=image src="../../imagens_botoes/ok.png" width="25" height="25" name="submit9" id="submit9" value="Cupom">
      </form></td>
      <td align="center">&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="14%" align="center"><div align="center"><strong>N&ordm; Pedido</strong></div></td>
    <td width="30%" align="center"><div align="center"><strong>Total da Fatura</strong></div></td>
    <td width="56%" align="center"><div align="center"><strong>#</strong></div></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center">
		 
      <?

$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and condicao = 'PEDIDO' and status = 'Finalizado' and datefechamento <> '0000-00-00' and datefechamento between '$dateinicial' and '$datefinal' order by codigo_orcamento desc";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$codigo_orcamento = $linha[0];
$num_fatura = $linha[48];
$total_geral = $linha[40];
$placa = $linha[28];
$nomecliente = $linha[46];
	$data_do_fechamento_do_orcamento = $linha[63];

?>
      <table  width="100%" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td background="../../imagens_sistema/fundocelulas2.png"width="24%"><div align="center"><strong><a name="<? echo "$codigo_orcamento"; ?>"></a><? echo "$data_do_fechamento_do_orcamento - Orcamento: $codigo_orcamento - Placa: $placa"; ?></strong></div></td>
          <td background="../../imagens_sistema/fundocelulas2.png" width="40%"><div align="center"><strong>
            <?
	
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and status = 'Finalizado'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];

//echo "R$ $totalizacao_cmv_dos_produtos";

	
	
	$sql2 = "select sum(comissao) as total_comissao from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and status = 'Finalizado'";
$resultado2=mysql_query($sql2, $conexao);
$linha=mysql_fetch_array($resultado2);


$total_comissao = $linha['total_comissao'];

			  
	
	//echo "R$ $total_comissao"; 
			  

$sub_saldogeralliquido = bcsub($total_geral,$totalizacao_cmv_dos_produtos,2);
	$sub_saldogeralliquido2 = bcsub($sub_saldogeralliquido,$total_comissao,2);
			  
	
	echo "(Venda)R$ $total_geral - (CMV)R$ $totalizacao_cmv_dos_produtos - (Comissao)R$ $total_comissao <br> (Saldo Liquido)R$ $sub_saldogeralliquido2"; 
			  ?>
          </strong></div></td>
          <td background="../../imagens_sistema/fundocelulas2.png"width="56%"><div align="center">
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
<input type="submit" class='class01' name="button2" id="button2" value="<? if(($solicitacao=="analitico") && ($num_fatura=="$num_fatura_abrir")){ echo "-"; }else{ echo "+"; } ?>">
            </form>
          </div></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">
            <?
	
	
if(($solicitacao=="analitico") && ($num_fatura=="$num_fatura_abrir")){


?>
            <table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td background="../../imagens_sistema/fundocelulas2.png"><div align="center">Produto</div></td>
                <td background="../../imagens_sistema/fundocelulas2.png" align="center"><strong>R$ Total venda</strong></td>
                <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Total CMV</strong></div></td>
                <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Toal Servi&ccedil;os</strong></div></td>
                <td width="12%" background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Comiss&atilde;o</strong></div></td>
                <td width="19%" align="center" background="../../imagens_sistema/fundocelulas2.png"><strong>Toal Liquido da Venda</strong></td>
                </tr>
              <?

$sql3 = "SELECT * FROM orcamentos where num_fatura = '$num_fatura_abrir' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


$codigo_orcamento = $linha[0];


$sql4 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' order by codigo asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {
$total_itens_fatura = mysql_num_rows($res4);
	
	$codigodoproduto = $linha[0];
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
                <td background="../../imagens_sistema/fundocelulas1.png" width="19%"><div align="center"><? echo "$nomeproduto"; ?></div></td>
                <td background="../../imagens_sistema/fundocelulas1.png" width="9%" align="center"><? echo "R$ $totalitem"; ?></td>
                <td background="../../imagens_sistema/fundocelulas1.png" width="11%"><div align="center"><strong>
                  <?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'VENDA DE PRODUTOS' and codigo = '$codigodoproduto'";

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
                <td background="../../imagens_sistema/fundocelulas1.png" width="11%"><div align="center"><strong>
                  <?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_servicos from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'SERVICOS' and codigo = '$codigodoproduto'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_servicos = $linha['totalizacao_cmv_dos_servicos'];

	if(empty($totalizacao_cmv_dos_servicos)){
		
	}
	else{
		echo "R$ $totalizacao_cmv_dos_servicos";
	}


?>
                </strong></div></td>
                <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
                  <? $base_calculo_para_comissao = bcsub($totalitem,$totalizacao_cmv,2); //echo "R$ $base_calculo_para_comissao"; ?>
                  <? echo "R$ $valor_comissao"; ?></div></td>
                <td align="center" background="../../imagens_sistema/fundocelulas1.png"><? 
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
                <td background="../../imagens_sistema/fundocelulas1.png"colspan="6"><div align="center"><strong>Total de itens <? echo $total_itens_fatura;?></strong></div>
                  <div align="center"></div></td>
              </tr>
            </table>
            <?  }} ?> 
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
        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr class="style01">
            <td width="14%" align="center"><div align="center"><strong>N&ordm;</strong> <strong>Pedido</strong></div></td>
            <td width="25%" align="center"><div align="center"><strong>Total da Fatura</strong></div></td>
            <td width="61%" align="center"><div align="center"><strong>#</strong></div></td>
          </tr>
          <tr>
            <td colspan="3"><div align="center">
              <?

$sql = "SELECT * FROM orcamentos where loja = '$estab_pertence' and condicao = 'PEDIDO' and status = 'Finalizado' and datefechamento <> '0000-00-00' and datefechamento between '$dateinicial_modal' and '$datefinal_modal' order by codigo_orcamento desc";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$codigo_orcamento = $linha[0];
$num_fatura = $linha[48];
$total_geral = $linha[40];
$placa = $linha[28];
$nomecliente = $linha[46];
$data_do_fechamento_do_orcamento = $linha[63];
?>
              <table  width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr class="style12">
                  <td background="../../imagens_sistema/fundocelulas2.png"width="51%"><div align="center"><strong><a name="<? echo "$codigo_orcamento$placa"; ?>"></a><? echo "$data_do_fechamento_do_orcamento - Orcamento: $codigo_orcamento - Placa: $placa"; ?></strong></div></td>
                  <td background="../../imagens_sistema/fundocelulas2.png" width="40%"><div align="center"><strong>
                    <?
	
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and status = 'Finalizado'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];

//echo "R$ $totalizacao_cmv_dos_produtos";

	
	
	$sql2 = "select sum(comissao) as total_comissao from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and status = 'Finalizado'";
$resultado2=mysql_query($sql2, $conexao);
$linha=mysql_fetch_array($resultado2);


$total_comissao = $linha['total_comissao'];

			  
	
	//echo "R$ $total_comissao"; 
			  

$sub_saldogeralliquido = bcsub($total_geral,$totalizacao_cmv_dos_produtos,2);
	$sub_saldogeralliquido2 = bcsub($sub_saldogeralliquido,$total_comissao,2);
			  
	
	echo "(Venda)R$ $total_geral - (CMV)R$ $totalizacao_cmv_dos_produtos - (Comissao)R$ $total_comissao <br> (Saldo Liquido)R$ $sub_saldogeralliquido2"; 
			  ?>
                    </strong></div></td>
                  <td background="../../imagens_sistema/fundocelulas2.png"width="25%"><div align="center">
                    <form name="form1" method="post" action="index.php#visualiza_vendas_periodico">
                      <strong>
                        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                        
                      <input name="operador_pesquisar" type="hidden" id="operador_pesquisar" value="<? echo "$operador_pesquisar";  ?>">
                      <input name="num_fatura_abrir" type="hidden" id="num_fatura_abrir" value="<? echo "$num_fatura";  ?>">
                      <input name="solicitacao" type="hidden" id="solicitacao" value="<? if(($solicitacao=="analitico") && ($num_fatura_abrir==$num_fatura)){ echo "sintetico"; }else{ echo "analitico"; } ?>">
                      <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "$dia_inicial"; ?>">
                      <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes_inicial"; ?>">
                      <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano_inicial"; ?>">
                      <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano_final"; ?>">
                      <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes_final"; ?>">
                      <input name="dia_final" type="hidden" id="dia_final" value="<? echo "$dia_final"; ?>">
                      <input type="submit" class='class01' name="button" id="button" value="<? if(($solicitacao=="analitico") && ($num_fatura=="$num_fatura_abrir")){ echo "-"; }else{ echo "+"; } ?>">
                      </strong>
                    </form>
                    </div></td>
                </tr><br>
                <tr>
                  <td colspan="3"><div align="center">
                    <?
	
	
if(($solicitacao=="analitico") && ($num_fatura=="$num_fatura_abrir")){


?>
                    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                      <tr class="style12">
                        <td background="../../imagens_sistema/fundocelulas2.png"><div align="center">Produto</div></td>
                        <td background="../../imagens_sistema/fundocelulas2.png" align="center"><strong>R$ Total venda</strong></td>
                        <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Total CMV</strong></div></td>
                        <td background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Toal Servi&ccedil;os</strong></div></td>
                        <td width="13%" background="../../imagens_sistema/fundocelulas2.png"><div align="center"><strong>Comiss&atilde;o</strong></div></td>
                        <td width="18%" align="center" background="../../imagens_sistema/fundocelulas2.png"><strong>Toal Liquido da Venda</strong></td>
                        </tr>
                      <?

$sql3 = "SELECT * FROM orcamentos where num_fatura = '$num_fatura_abrir' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


$codigo_orcamento = $linha[0];


$sql4 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' order by codigo asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {
$total_itens_fatura = mysql_num_rows($res4);
	
	$codigodoproduto = $linha[0];
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
                        <td background="../../imagens_sistema/fundocelulas1.png" width="19%"><div align="center"><? echo "$nomeproduto"; ?></div></td>
                        <td background="../../imagens_sistema/fundocelulas1.png" width="14%" align="center"><? echo "R$ $totalitem"; ?></td>
                        <td background="../../imagens_sistema/fundocelulas1.png" width="11%"><div align="center"><strong>
                          <?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'VENDA DE PRODUTOS' and codigo = '$codigodoproduto'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];

echo "R$ $totalizacao_cmv_dos_produtos";

?>
                        </strong></div></td>
                        <td background="../../imagens_sistema/fundocelulas1.png" width="13%"><div align="center"><strong>
                          <?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_servicos from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and categoria = 'SERVICOS' and codigo = '$codigodoproduto'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_servicos = $linha['totalizacao_cmv_dos_servicos'];

echo "R$ $totalizacao_cmv_dos_servicos";

?>
                        </strong></div></td>
                        <td background="../../imagens_sistema/fundocelulas1.png"><div align="center">
                          <? $base_calculo_para_comissao = bcsub($totalitem,$totalizacao_cmv,2); //echo "R$ $base_calculo_para_comissao"; ?>
                          <? echo "R$ $valor_comissao"; ?></div></td>
                        <td align="center" background="../../imagens_sistema/fundocelulas1.png"><? 
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
                        <td background="../../imagens_sistema/fundocelulas1.png"colspan="6"><div align="center"><strong>Total de itens <? echo $total_itens_fatura;?></strong></div>
                          <div align="center"></div></td>
                        </tr>
                      <tr>
                        <td colspan="6">&nbsp;</td>
                        </tr>
                      </table>
                    <?  }} ?>
                    </div>
                    <div align="center"></div></td>
                </tr>
              </table>
              <? } ?>
            </div></td>
          </tr>
        </table>
        <p>&nbsp;</p>
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