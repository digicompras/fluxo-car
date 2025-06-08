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
<title>LISTANDO TODAS AS PROPOSTAS PAGAS DO OPERADOR</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style3 {font-size: 10px}
.style8 {font-size: 18px; font-weight: bold; }
-->
</style>
</head>
<?

require '../../conect/conect.php';

$mes_ano = $_POST['mes_ano'];


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





      <p>
        <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>
</p>
      <form name="form1" method="post" action="../principal.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit2" value="Voltar ao menu principal">
</form>
      <div align="center">
        <table width="100%"  border="1">
          <tr>
            <td><span class="style8">Total contratos todas as lojas Brasscredi </span></td>
            <td><span class="style8">
              <?
$sql = "select sum(valor_credito) as total from propostas where mes_ano = '$mes_ano' ";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
</span></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="50%"><div align="center"><strong>Loja</strong></div></td>
            <td width="50%"><div align="center"><strong>Total M&ecirc;s/Ano </strong></div></td>
          </tr>
		  <?

$sql = "SELECT * FROM estabelecimentos order by nfantasia asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia = $linha[2];

?>
          <tr>
            <td><div align="left" class="style3">
              <div align="center"><strong>
                
              <? echo $nfantasia;?></strong></div>
            </div></td>
            <td><div align="center" class="style3"><strong>
            <?
$sql = "select sum(valor_credito) as total from propostas where estabelecimento_proposta = '$nfantasia' and mes_ano = '$mes_ano' ";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
            </strong></div></td>

          </tr>
            <? } ?>
        </table>
<br>
</div>
      <table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>   
      <table width="150%"  border="0">
        <tr bgcolor="#<? echo $cor ?>">
          <td><div align="center"><span class="style3"><span class="style3">Loja</span></span></div></td>
          <td><div align="center"><span class="style3">N&ordm; Proposta </span></div></td>
          <td><div align="center" class="style3">Data</div></td>
          <td><div align="center" class="style3">N&ordm; Contrato do Banco </div></td>
          <td><div align="center" class="style3">Status</div></td>
          <td><div align="center" class="style3">CPF</div></td>
          <td><div align="center" class="style3">Cliente</div></td>
          <td><div align="center" class="style3">Banco da opera&ccedil;&atilde;o</div></td>
          <td><div align="center" class="style3">Tipo de Proposta</div></td>
          <td><div align="center" class="style3">Valor Contrato </div></td>
          <td width="2%"><div align="center" class="style3">Prazo</div></td>
          <td width="4%"><div align="center" class="style3">R$ Parcelas </div></td>
          <td><div align="center" class="style3">Comiss&atilde;o Agente% </div></td>
          <td><div align="center" class="style3">Comiss&atilde;o a ser paga/recebida R$ </div></td>
          <td><div align="center" class="style3">Status F&iacute;sico </div></td>
          <td><div align="center" class="style3">Status Comiss&atilde;o </div></td>
        </tr>
      <?

$sql = "SELECT * FROM propostas where  mes_ano = '$mes_ano' and status <> 'Recusado' order by dataproposta asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_proposta = $linha[0];
$nome_operador = $linha[1];
$tipo = $linha[2];
$estabelecimento_proposta = $linha[3];
$nome = $linha[4];
$sexo = $linha[5];
$estadocivil = $linha[6];
$cpf = $linha[7];
$rg = $linha[8];
$orgao = $linha[9];
$emissao = $linha[10];
$data_nasc = $linha[11];
$pai = $linha[12];
$mae = $linha[13];
$endereco = $linha[14];
$numero = $linha[15];
$bairro = $linha[16];
$complemento = $linha[17];
$cidade = $linha[18];
$estado = $linha[19];
$cep = $linha[20];
$telefone = $linha[21];
$celular = $linha[22];
$email = $linha[23];
$num_beneficio = $linha[24];
$valor_credito = $linha[25];
$quant_parc = $linha[26];
$parcela = $linha[27];
$banco_pagto = $linha[28];
$num_banco = $linha[29];
$agencia = $linha[30];
$conta = $linha[31];
$operador = $linha[32];
$cel_operador = $linha[33];
$email_operador = $linha[34];
$estabelecimento = $linha[35];
$cidade_estabelecimento = $linha[36];
$tel_estabelecimento = $linha[37];
$email_estabelecimento = $linha[38];
$obs = $linha[39];
$dataproposta = $linha[40];
$horaproposta = $linha[41];
$dataalteracao = $linha[42];
$horaalteracao = $linha[43];
$operador_alterou = $linha[44];
$cel_operador_alterou = $linha[45];
$email_operador_alterou = $linha[46];
$estabelecimento_alterou = $linha[47];
$cidade_estabelecimento_alterou = $linha[48];
$tel_estabelecimento_alterou = $linha[49];
$email_estabelecimento_alterou = $linha[50];
$status = $linha[51];


$parc1 = $linha[52];
$banco1 = $linha[53];
$vencto1 = $linha[54];
$compra1 = $linha[55];

$num_beneficio2 = $linha[80];
$num_beneficio3 = $linha[81];
$num_beneficio4 = $linha[82];

$tipo_proposta = $linha[83];
$bco_operacao = $linha[86];

$percentual_op = $linha[100];
$comissao_op = $linha[101];
$obs2 = $linha[102];
$status_fisico = $linha[103];
$status_comissao = $linha[104];
$num_contrato_banco = $linha[105];

?>            
        <tr>
          <td width="9%"><div align="center"><span class="style3"><span class="style3"><? echo $estabelecimento_proposta;?></span></span></div></td>
          <td width="4%">
              <form name="form2" method="post" action="editar_proposta_por_num_proposta.php">
               <div align="center" class="style3"> <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
                <? echo $num_proposta; ?>
              </div></form>
          </td>
          <td width="5%"><div align="center" class="style3"><? echo $dataproposta;?></div></td>
          <td width="7%"><div align="center"><span class="style3"><? echo $num_contrato_banco;?></span></div></td>
          <td width="7%"><div align="center" class="style3"><? echo $status;?></div></td>
          <td width="8%"><div align="center" class="style3"><? echo $cpf;?> </div></td>
          <td width="15%">
            <div align="center" class="style3"><? echo $nome;?> </div></td>
          <td width="10%"><div align="center" class="style3"><? echo $bco_operacao;?></div></td>
          <td width="7%"><div align="center" class="style3"><? echo $tipo_proposta;?></div></td>
          <td width="5%"><div align="center" class="style3"><? echo $valor_credito;?> </div></td>
          <td><div align="center" class="style3"><? echo $quant_parc;?> </div></td>
          <td><div align="center" class="style3"><? echo $parcela;?> </div></td>
          <td width="3%"><div align="center"><span class="style3"><? echo $percentual_op;?></span></div></td>
          <td width="5%"><div align="center"><span class="style3"><? echo $comissao_op;?></span></div></td>
          <td width="4%"><div align="center"><span class="style3"><? echo $status_fisico;?></span></div></td>
          <td width="5%"><div align="center"><span class="style3"><? echo $status_comissao;?></span></div></td>
          <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
<? } ?>
        
        <tr>
          <td>&nbsp;</td>
          <td><div align="center"><span class="style3"><span class="style3"></span></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><span class="style3"></span></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><span class="style3"></span></td>
          <td><div align="center"></div></td>
          <td>&nbsp;</td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
        <tr>
          <td>&nbsp;</td>
          <td><div align="center"><span class="style3"><span class="style3"></span></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center" class="style3"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"><span class="style3">Total</span></div></td>
          <td><div align="center" class="style3">
              <?
$sql = "select sum(valor_credito) as total from propostas where mes_ano = '$mes_ano' ";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
          </div></td>
          <td><div align="center"></div></td>
          <td>&nbsp;</td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
</table>

<p>&nbsp;</p>



</body>
</html>
