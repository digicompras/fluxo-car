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
            <th scope="row"><span class="style5">Relat&oacute;rio de entradas e sa&iacute;das no periodo de <? echo "$dia_inicial-$mes_inicial-$ano_inicial ate $dia_final-$mes_final-$ano_final da empresa $estab_pertence"; ?></span></th>
          </tr>
          <tr>
            <th scope="row"><span class="style5">Detalhamento analitico</span></th>
          </tr>
        </tbody>
</table>
<table width="100%"  border="0" cellspacing="0">
  <tr>
          <td colspan="5"><div align="left"></div></td>
        </tr>
        <tr>
          <td width="45%"><div align="center"><strong>Total Entradas</strong>
          </div>            
            <div align="center"></div></td>
          <td width="10%"><div align="center" class="style5"></div></td>
          <td width="45%" colspan="3"><div align="center"><strong>Total Sa&iacute;das</strong></div></td>
        </tr>
	
        <tr>
          <td><div align="center"><span class="style5">
            
          </span>
              <table width="100%" border="0">
                <tbody>
                  
					<?
if($cartao_vai_pro_caixa=="sim"){
	
$sql2 = "SELECT * FROM cx_entradas where nfantasia = '$estab_pertence' and datecadastro between '$datainicial' and '$datafinal' order by datecadastro,modo_pagto asc";
$res2 = mysql_query($sql2);
	
}
					else{
	
$sql2 = "SELECT * FROM cx_entradas where nfantasia = '$estab_pertence' and categoria_conta = 'VENDA DE PRODUTOS'  and datecadastro between '$datainicial' and '$datafinal' order by datecadastro,modo_pagto asc";
$res2 = mysql_query($sql2);
						
					}
					
while($linha=mysql_fetch_row($res2)) {

	$valor_entrada = $linha[25];
	$modo_pagto = $linha[27];
	$datadopagto = $linha[20];
	$historico_entradas = $linha[23];
	$num_mensalidade_entradas = $linha[35];
	$codigo_orcamento_entradas = $linha[36];
	$especificacao = $linha[41];
	$cartao = $linha[43];
	$cartao2 = $linha[48];
	$cartao3 = $linha[53];
	$cartao4 = $linha[58];
	$cartao_usado_posicao = $linha[73];

	if(empty($valor_entrada)) {
		
	}
	else{
?>
                  <tr>
                    <td width="18%"><? echo "$datadopagto"; ?></td>
                    <td width="20%"><? echo "$modo_pagto<br>$especificacao"; ?></td>
                    <td width="39%"><form action="../../sistem/orcamentos/imprime_orcamento.php" method="post" name="form1" target="_blank">
                      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                      <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo "$codigo_orcamento_entradas"; ?>">
                      <? echo "$historico_entradas ($num_mensalidade_entradas)"; ?>
                      <input class="class01" type="submit" name="submit2" id="submit2" value="<? echo "$codigo_orcamento_entradas"; ?>">
                    </form></td>
                    <td width="23%" align="center"><? echo "$valor_entrada"; ?></td>
                  </tr>
					<? } } ?>
					
                  <tr>
                    <th scope="row">&nbsp;</th>
                    <td colspan="2"><span class="style5">
                      <?

$sql = "select sum(valor) as total_entradas from cx_entradas where datecadastro between '$datainicial' and '$datafinal'";
$res=mysql_query($sql);
$linha=mysql_fetch_array($res);

$total_geral_de_entradas = bcadd($linha['total_entradas'],0,2);

echo "R$ ".$total_geral_de_entradas;

	

	
?>
                    </span></td>
                    <td>&nbsp;</td>
                  </tr>
                </tbody>
              </table>
          </div></td>
          <td><div align="center"></div></td>
          <td colspan="3" valign="top"><div align="center">
            <table width="100%" border="0">
              <tbody>
                <?
	
$sql2 = "SELECT * FROM cx_saidas where nfantasia = '$estab_pertence' and datecadastro between '$datainicial' and '$datafinal' order by datecadastro asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

	$valor_saida = $linha[25];
	$fornecedor = $linha[36];
	$datadasaida = $linha[20];
	$historico_saida = $linha[23];
	
?>
                <tr>
                  <td width="20%" align="center"><? echo "$datadasaida"; ?></td>
                  <td width="24%"><? echo "$fornecedor"; ?></td>
                  <td width="32%"><? echo "$historico_saida"; ?></td>
                  <td width="24%" align="center"><? echo "$valor_saida"; ?></td>
                </tr>
                <? } ?>
                <tr>
                  <th scope="row">&nbsp;</th>
                  <td colspan="2"><span class="style6">
                    <?
$sql = "select sum(valor) as total_saidas from cx_saidas where nfantasia ='$estab_pertence' and datecadastro between '$datainicial' and '$datafinal'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_saidas = bcadd($linha['total_saidas'],0,2);

echo "R$ ".$total_saidas;
?>
                  </span></td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
          </div></td>
        </tr>
        <tr>
          <td><div align="center"></div></td>
          <td>&nbsp;</td>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5"><div align="center"><span class="style7">Saldo 
            <?
$saldo = bcsub($total_geral_de_entradas,$total_saidas,2);

echo "R$ ".$saldo;
?>
          </span><span class="style7">          </span></div></td>
        </tr>
</table>
<p></p>
<p>&nbsp;</p>
      <p><br>
          <br>
            </p>
      <p>&nbsp;</p>



</body>
</html>
