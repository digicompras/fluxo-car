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
<html>
<head>
<title>LISTANDO TODA MOVIMENTACAO DO MES</title>
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
.style3 {
	color: #FFFFFF;
	font-weight: bold;
}
.style4 {
	font-size: 18px;
	font-weight: bold;
}
.style5 {
	font-size: 24px;
	font-weight: bold;
	color: #0000FF;
}
.style6 {
	font-size: 24px;
	font-weight: bold;
	color: #FF0000;
}
.style7 {
	font-weight: bold;
	font-size: 24px;
}
-->
</style>
</head>
<?

require '../../../conect/conect.php';


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];





$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];

$anoposterior = bcadd($ano_final,1);

$anoanterior = bcsub($ano_final,1);



$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$datafinal = "$ano_final-$mes_final-$dia_final";


//--------------------------------------------------------------

$nfantasia = $_POST['nfantasia'];

if((empty($nfantasia)) or ($nfantasia=="Todos")){

$parametro_nfantasia = "";

$parametro_nfantasia_pagar = "";

}
else{
	
$parametro_nfantasia = " estabelecimento = '$nfantasia' ";

$parametro_nfantasia_pagar = " empresa = '$nfantasia' ";
	
}

//--------------------------------------------------------------------

//--------------------------------------------------------------

$departamento = $_POST['departamento'];

if((empty($departamento)) or ($departamento=="Todos")){

$parametro_departamento = "";

}
else{
	
$parametro_departamento = " and departamento = '$departamento' ";
	
}

//--------------------------------------------------------------------

$categoria_conta = $_POST['categoria_conta'];

if((empty($categoria_conta)) or ($categoria_conta=="Todos")){

$parametro_categoria_conta = "";

}
else{
	
$parametro_categoria_conta = " and categoria_conta = '$categoria_conta' ";
	
}

//---------------------------------------------------------------------

$quitacao = $_POST['quitacao'];

if((empty($quitacao)) or ($quitacao=="Todos")){

$parametro_quitacao_pagar = "";

$parametro_quitacao_receber = "";

}
else{
	
$parametro_quitacao_pagar = " and quitacao = 'Pago' ";

$parametro_quitacao_receber = " and quitacao = 'Recebido' ";
	
}

//---------------------------------------------------------------------

$banco = $_POST['banco'];

if((empty($banco)) or ($banco=="Todos")){

$parametro_banco = "";

}
else{
	
$parametro_banco = " and banco = '$banco' ";
	
}

//---------------------------------------------------------------------

$agencia = $_POST['agencia'];

if((empty($agencia)) or ($agencia=="Todos")){

$parametro_agencia = "";

}
else{
	
$parametro_agencia = " and agencia = '$agencia' ";
	
}

//---------------------------------------------------------------------

$contacorrente = $_POST['contacorrente'];

if((empty($contacorrente)) or ($contacorrente=="Todos")){

$parametro_contacorrente = "";

}
else{
	
$parametro_contacorrente = " and contacorrente = '$contacorrente' ";
	
}

//---------------------------------------------------------------------

$tipoconta = $_POST['tipoconta'];

if((empty($tipoconta)) or ($tipoconta=="Todos")){

$parametro_tipoconta = "";

}
else{
	
$parametro_tipoconta = " and tipoconta = '$tipoconta' ";
	
}

//---------------------------------------------------------------------

$num_cheque = $_POST['num_cheque'];

if((empty($num_cheque)) or ($num_cheque=="Todos")){

$parametro_num_cheque = "";

}
else{
	
$parametro_num_cheque = " and num_cheque = '$num_cheque' ";
	
}

//---------------------------------------------------------------------



?>

<?

$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador_alterou = $linha[1];
$cel_operador_alterou = $linha[19];
$email_operador_alterou = $linha[20];
$estab_pertence = $linha[44];
$cidade_estabelecimento_alterou = $linha[45];
$tel_estabelecimento_alterou = $linha[46];
$email_estabelecimento_alterou = $linha[47];

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

	
 
 $sql = "SELECT * FROM cad_empresa";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nfantasia = $linha[2];

 } 

 ?>



<body bgcolor="#ffffff" 
  

background="background/" bgproperties="fixed">
  





      <p>
</p>
<table width="100%" border="0">
        <tbody>
          <tr>
            <th colspan="3" scope="row"><span class="style5">Relat&oacute;rio de entradas e sa&iacute;das no periodo de <? echo "$dia_inicial-$mes_inicial-$ano_inicial ate $dia_final-$mes_final-$ano_final da empresa $estab_pertence"; ?></span></th>
          </tr>
          <tr>
            <th scope="row">&nbsp;</th>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
</table>
<table width="100%"  border="0" cellspacing="0">
  <tr>
          <td colspan="12"><div align="left"></div></td>
        </tr>
        <tr>
          <td colspan="4"><div align="center"><strong>Total Entradas</strong>
          </div>            
            <div align="center"></div></td>
          <td width="25%"><div align="center" class="style5"></div></td>
          <td colspan="4"><div align="center"></div>                        <div align="center"></div></td>
          <td width="30%" colspan="3"><div align="center"><strong>Total Sa&iacute;das</strong></div></td>
        </tr>
        <tr>
          <td colspan="4"><div align="center"><span class="style5">
            <?
if($cartao_vai_pro_caixa=="sim"){
	
$sql = "select sum(valor) as total_entradas from cx_entradas where nfantasia = '$estab_pertence' and datecadastro between '$datainicial' and '$datafinal'";
$res=mysql_query($sql);
$linha=mysql_fetch_array($res);
	
}
else{

$sql = "select sum(valor) as total_entradas from cx_entradas where nfantasia = '$estab_pertence' and categoria_conta = 'VENDA DE PRODUTOS' and datecadastro between '$datainicial' and '$datafinal'";
$res=mysql_query($sql);
$linha=mysql_fetch_array($res);
	
}

$total_geral_de_entradas = bcadd($linha['total_entradas'],0,2);

echo "R$ ".$total_geral_de_entradas;


?>
          </span></div></td>
          <td><div align="center"></div></td>
          <td colspan="4"><div align="center"></div></td>
          <td colspan="3"><div align="center"><span class="style6">
            <?
$sql = "select sum(valor) as total_saidas from cx_saidas where nfantasia ='$estab_pertence' and datecadastro between '$datainicial' and '$datafinal' ";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_saidas = bcadd($linha['total_saidas'],0,2);

echo "R$ ".$total_saidas;
?>
          </span></div></td>
        </tr>
        <tr>
          <td colspan="4"><div align="center"></div></td>
          <td>&nbsp;</td>
          <td colspan="4">&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="12"><div align="center">
            <form action="dre_periodico_cx_detalhamento_analitico.php" method="post" name="form1" target="_blank">
				<?
				$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
				?>
              <span class="style7">
              <input class="class01" type="submit" name="submit" id="submit" value="Saldo">
              <?
$saldo = bcsub($total_geral_de_entradas,$total_saidas,2);

echo "R$ ".$saldo;
?>
              <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo "$estab_pertence"; ?>">
              <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "$dia_inicial"; ?>">
              <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes_inicial"; ?>">
              <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano_inicial"; ?>">
              </span><span class="style7"> </span>
              <span class="style7">
              <input name="dia_final" type="hidden" id="dia_final" value="<? echo "$dia_final"; ?>">
              <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes_final"; ?>">
              <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano_final"; ?>">
              </span>
            </form>
          </div></td>
        </tr>
</table>
<p></p>
<table width="100%"  border="0">
  <tr>
    <td colspan="3" align="center" valign="top">&nbsp;</td>
  </tr>
  <tr>
          <td width="44%" valign="top"><div align="center">
            <table width="100%"  border="1">
              <tr bgcolor="#ffffff">
                <td colspan="3"><div align="center" class="style4"><span class="style5"><strong>RELATORIO DO CONTAS A RECEBER DO PERIODO</strong></span></div></td>
              </tr>
              <?
	
$sql2 = "SELECT * FROM contas_a_receber where estabelecimento = '$estab_pertence' and quitacao = 'Em Aberto' and vencto between '$datainicial' and '$datafinal' group by modopagto";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

	$valor_a_receber = $linha[7];
	$vencto_a_receber = $linha[8];
	$modopagto_a_receber = $linha[10];

?>
              <tr>
                <td width="38%"><form action="../../sistem/orcamentos/imprime_orcamento_para_cliente.php" target="_blank" method="post" name="form2" id="form">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                  <? echo $modopagto_a_receber;?>
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                </form></td>
                <td width="35%"><form action="../../sistem/orcamentos/imprime_orcamento.php" target="_blank" method="post" name="form2" id="form4">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                    <? echo $vencto_a_receber;?>
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                </form></td>
                <td width="27%"><div align="center">
                    <?
	
		
$sql3 = "select sum(valor_a_receber) as total_entradas from contas_a_receber where quitacao = 'Em Aberto' and estabelecimento = '$estab_pertence' and modopagto = '$modopagto_a_receber' and vencto between '$datainicial' and '$datafinal'";
$resultado3=mysql_query($sql3);
$linha=mysql_fetch_array($resultado3);

$total_entradas = bcadd($linha['total_entradas'],0,2);
		

			
echo "R$ ".$total_entradas;
		
	
	
	
?>
                </div></td>
              </tr>
				 <? } ?>
              <tr>
                <td>&nbsp;</td>
                <td align="right"><form action="dre_periodico_contas_a_receber_detalhamento_analitico.php" target="_blank" method="post" name="form2" id="form2">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <input class="class01" type="submit" name="submit2" id="submit2" value="TOTAL">
              <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo "$estab_pertence"; ?>">
              <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "$dia_inicial"; ?>">
              <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes_inicial"; ?>">
              <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano_inicial"; ?>">
              </span><span class="style7"> </span>
              <span class="style7">
              <input name="dia_final" type="hidden" id="dia_final" value="<? echo "$dia_final"; ?>">
              <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes_final"; ?>">
              <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano_final"; ?>">
              
                </form></td>
                <td><div align="center"><?
	
		
$sql4 = "select sum(valor_a_receber) as total_geral_contas_a_receber from contas_a_receber where quitacao = 'Em Aberto' and estabelecimento = '$estab_pertence' and vencto between '$datainicial' and '$datafinal'";
$resultado4=mysql_query($sql4);
$linha=mysql_fetch_array($resultado4);

$total_geral_contas_a_receber = bcadd($linha['total_geral_contas_a_receber'],0,2);
		

			
echo "R$ ".$total_geral_contas_a_receber;
		
	
	
	
					?></div></td>
              </tr>
               
            </table>
    </div></td>
          <td width="4%">&nbsp;</td>
          <td width="52%" valign="top"><div align="center">
            <table width="100%"  border="1">
              <tr bgcolor="#ffffff">
                <td colspan="3"><div align="center" class="style4"><span class="style6"><strong>RELATORIO DO CONTAS A PAGAR DO PERIODO</strong></span></div></td>
              </tr>
              <?

			
$sql5 = "SELECT * FROM contas_a_pagar where estabelecimento = '$estab_pertence' and quitacao = 'Em Aberto' and valor_a_pagar <> '0.00' and vencto between '$datainicial' and '$datafinal' group by fornecedor";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$estab_pertence = $linha[20];
$valor_a_pagar = $linha[10];
$modopagto_a_pagar = $linha[13];
$fornecedor = $linha[41];
$categoria_conta_a_pagar = $linha[37];

?>
              <tr>
                <td width="34%"><? echo $categoria_conta_a_pagar;?></td>
                <td width="35%"><? echo $fornecedor;?></td>
                <td width="31%" align="center">
					<?

$sql6 = "select sum(valor_a_pagar) as total_geral_saidas_por_fornecedor from contas_a_pagar where fornecedor = '$fornecedor' and estabelecimento = '$estab_pertence' and vencto between '$datainicial' and '$datafinal' ";
$resultado6=mysql_query($sql6);
$linha=mysql_fetch_array($resultado6);

$total_geral_saidas_por_fornecedor = $linha['total_geral_saidas_por_fornecedor'];

echo "R$ ".$total_geral_saidas_por_fornecedor;

?>
					<div align="center">
                    
                </div></td>
</tr>
				 <? } ?>
              <tr>
                <td>&nbsp;</td>
                <td align="right"><strong><form action="dre_periodico_contas_a_pagar_detalhamento_analitico.php" target="_blank" method="post" name="form2" id="form2">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento"; ?>">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <input class="class01" type="submit" name="submit2" id="submit2" value="TOTAL">
              <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo "$estab_pertence"; ?>">
              <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "$dia_inicial"; ?>">
              <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes_inicial"; ?>">
              <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano_inicial"; ?>">
              <span class="style7"> </span>
              <span class="style7">
              <input name="dia_final" type="hidden" id="dia_final" value="<? echo "$dia_final"; ?>">
              <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes_final"; ?>">
              <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano_final"; ?>">
              
                </form></strong></td>
                <td align="center"><?

$sql7 = "select sum(valor_a_pagar) as total_geral_saidas from contas_a_pagar where estabelecimento = '$estab_pertence' and quitacao = 'Em Aberto' and vencto between '$datainicial' and '$datafinal' ";
$resultado7=mysql_query($sql7);
$linha=mysql_fetch_array($resultado7);

$total_geral_saidas = $linha['total_geral_saidas'];

echo "R$ ".$total_geral_saidas;

?></td>
              </tr>
               
            </table>
    </div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p><br>
          <br>
            </p>
      <table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>            
      <p>&nbsp;</p>



</body>
</html>
