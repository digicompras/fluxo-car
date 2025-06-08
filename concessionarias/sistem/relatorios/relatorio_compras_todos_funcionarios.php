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
<title>LISTANDO TODOS OS CONSUMOS DOS FUNCIONARIOS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
}
-->
</style>
</head>
<?

require '../../conect/conect.php';
	
$solicitacao = $_POST['solicitacao'];

$mes_de_pesquisa = $_POST['mes'];
$anopesquisado = $_POST['ano'];

$status_fatura = $_POST['status_fatura'];
$status_conta = $_POST['status_conta'];
$empresaconveniada = $_POST['empresaconveniada'];
	
$num_fatura_abrir = $_POST['num_fatura_abrir'];
	
$dia = date('d');
$mes = date('m');
$ano = date('Y');
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
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>

background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">
  
<? } ?>

<table width="100%"  border="0">
        <tr>
          <td colspan="4"><div align="left"><span class="style2">
                  
          Listando todas as compras dos usuarios da empresa conveniada:</span> <span class="style2"><? echo $empresaconveniada; ?>
no m&ecirc;s/ano-refer&ecirc;ncia <? echo "$mes_de_pesquisa-$anopesquisado"; ?></span></div></td>
  </tr>
        <tr>
          <td width="35%"><div align="right"></div></td>
          <td width="15%">&nbsp;</td>
          <td width="24%">&nbsp;</td>
          <td width="26%">&nbsp;</td>
        </tr>
        <tr>
          <td><div align="right">Total a repassar para <? echo "$nfantasia_empresa"; ?> </div></td>
          <td><div align="center" class="class05">
            <?
		
$sql = "select sum(total_geral) as total_liquido_faturas_fechadas from faturamento_futuro where empresaconveniada = '$empresaconveniada' and mes = '$mes_de_pesquisa' and ano = '$anopesquisado' and status_fatura = '$status_fatura' and status_conta = '$status_conta' group by mes";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_faturas_fechadas = bcadd($linha['total_liquido_faturas_fechadas'],0,2);
		
		echo "R$ $total_liquido_faturas_fechadas";
	  
	  ?>
          </div></td>
          <td><div align="center">
          </div></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p><br>
      </p>
      <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="51%"><div align="center"><strong>Funcion&aacute;rio / Comanda</strong></div></td>
          <td width="24%"><div align="center"><strong>Total Consumo</strong></div></td>
          <td width="25%"><div align="center"><strong>#</strong></div></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">
            <?
//$sql = "SELECT * FROM clientes where empresaconveniada = '$empresaconveniada' and statusfuncionario = 'ativo' order by nome asc";
$sql = "SELECT * FROM clientes where empresaconveniada = '$empresaconveniada' order by nome asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nome = $linha[1];
$comandadofuncionario = $linha[138];
	

$sql2 = "SELECT * FROM faturamento_futuro where comanda_utilizada = '$comandadofuncionario' and mes = '$mes_de_pesquisa' and ano = '$anopesquisado' and status_fatura = 'Finalizado' and status_conta = 'Aberto' group by nomedofuncionario asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	
	
$num_fatura = $linha[0];
$datefaturamento = $linha[1];
$dia_abertura_fatura = $linha[2];
$mes_abertura_fatura = $linha[3];
$ano_abertura_fatura = $linha[4];

$horafaturamento = $linha[5];

$loja = $linha[8];
$total_geral = $linha[14];

$empresaconveniada = $linha[48];
$nomedofuncionario = $linha[49];


?>
            <table id="<? echo "$num_fatura"; ?>" width="100%" border="1" cellpadding="0" cellspacing="0">
              <tr>
                <td width="51%"><div align="center"><strong><? echo "$nome - $comandadofuncionario"; ?></strong></div></td>
                <td width="24%"><div align="center"><strong><? echo "R$ $total_geral"; ?></strong></div></td>
                <td width="25%"><div align="center">
                  <form name="form1" method="post" action="relatorio_compras_todos_funcionarios.php#<? echo "$num_fatura"; ?>">
                    <strong>
                      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    </strong>
                    <input name="empresaconveniada" type="hidden" id="empresaconveniada" value="<? echo $empresaconveniada; ?>">
                    <input name="num_fatura_abrir" type="hidden" id="num_fatura_abrir" value="<? echo "$num_fatura";  ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? if(($solicitacao=="analitico") && ($num_fatura_abrir==$num_fatura)){ echo "sintetico"; }else{ echo "analitico"; } ?>">
                    <input name="mes" type="hidden" id="mes" value="<? echo "$mes_de_pesquisa"; ?>">
                    <input name="ano" type="hidden" id="ano" value="<? echo "$anopesquisado"; ?>">
                    <input name="status_fatura" type="hidden" id="status_fatura" value="<? echo "Finalizado"; ?>">
                    <input name="status_conta" type="hidden" id="status_conta" value="<? echo "Aberto"; ?>">
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
                    <tr bgcolor="#696969">
                      <td><div align="center"><strong>Produto</strong></div></td>
                      <td align="center"><strong>Quantidade</strong></td>
                      <td><div align="center"><strong>R$ Unit</strong></div></td>
                      <td><div align="center"><strong>Total Item</strong></div></td>
                      <td><div align="center"><strong>DataHora</strong></div></td>
                    </tr>
                    <?

$sql3 = "SELECT * FROM orcamentos where num_fatura = '$num_fatura_abrir'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


$codigo_orcamento = $linha[0];


$sql4 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' order by codigo asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {
$total_itens_fatura = mysql_num_rows($res4);
	
	$nomeproduto = $linha[18];
	$quantidade = $linha[21];
	$preco = $linha[22];
	$totalitem = $linha[29];
	$data_fechamento = $linha[45];
	$hora_fechamento = $linha[46];
	
	$datalancamento = $linha[114];
	$dialancamento = $linha[115];
	$meslancamento = $linha[116];
	$anolancamento = $linha[117];
	$horalancamento = $linha[118];
	
	
?>
                    <tr>
                      <td width="24%"><div align="center">
                        <form name="form2" method="post" action="grava_entrega_de_cartoes.php">
                          <? echo $nomeproduto; ?>
                        </form>
                      </div></td>
                      <td width="22%" align="center"><? echo $quantidade; ?></td>
                      <td width="21%"><div align="center"><? echo "R$ ".$preco; ?></div></td>
                      <td width="15%"><div align="center"><? echo "R$ ".$totalitem; ?></div></td>
                      <td width="18%"><div align="center"><? echo "$dialancamento-$meslancamento-$anolancamento - $horalancamento"; ?></div></td>
                    </tr>
                    <?



}

}

?>
                    <tr>
                      <td colspan="5"><div align="center"><strong>Total de itens <? echo $total_itens_fatura;?></strong></div>
                        <div align="center"></div></td>
                    </tr>
                  </table>
                  <?  } ?>
                </div>
                  <div align="center"></div></td>
              </tr>
            </table>
            <br>
            <? }} ?>
          </div></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center"></div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
<p>&nbsp;</p>



</body>
</html>
