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
.style2 {
	color: #0000FF;
	font-weight: bold;
}
.style3 {
	font-size: 10px;
	font-weight: bold;
}
.style4 {font-size: 10px}
-->
</style>
</head>
<?

require '../../conect/conect.php';

$nome_operador = $_POST['nome_operador'];
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
      <form name="form1" method="post" action="informe_operador_para_gerar_relatorio_mensal.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <strong><font color="#0000FF">
        <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
        </font></strong>        <input type="submit" name="Submit2" value="Voltar">
</form>
      <table width="150%"  border="0">
        <tr>
          <td colspan="10"><div align="left"><span class="style2">
            <?
$nome_operador = $_POST['nome_operador'];
$mes_ano = $_POST['mes_ano'];
			
$sql = "SELECT * FROM propostas_veiculos where operador_atendente = '$nome_operador' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[5];



?>
          Listando todas as propostas do operador:</span> <span class="style2"><? echo $nome_operador; ?>
          <? } ?>
          </span></div></td>
        </tr>
        <tr>
          <td width="7%"><div align="right"></div></td>
          <td width="10%"><div align="center">Total Operador</div></td>
          <td width="8%"><div align="center">
            <?
$sql = "select sum(valor_liberado) as total from propostas_veiculos where operador_atendente = '$nome_operador' and mes_ano = '$mes_ano' and status = 'Aprovado_e_Pago'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
          </div></td>
          <td width="17%">&nbsp;</td>
          <td width="11%">&nbsp;</td>
          <td width="9%">&nbsp;</td>
          <td width="4%">&nbsp;</td>
          <td width="8%">&nbsp;</td>
          <td width="16%"><div align="center">
          </div></td>
          <td width="10%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="center">Total Comiss&atilde;o </div></td>
          <td><div align="center">
              <?
$sql = "select sum(comissao_op) as total from propostas_veiculos where operador_atendente = '$nome_operador' and mes_ano = '$mes_ano' and status = 'Aprovado_e_Pago'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <br><br>
<table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>            
      <table width="200%"  border="0">
        <tr>
          <td colspan="7"><div align="center"><strong>Prezado Operador!</strong> </div></td>
          <td width="5%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
          <td width="3%">&nbsp;</td>
          <td width="6%">&nbsp;</td>
          <td width="6%">&nbsp;</td>
          <td width="6%">&nbsp;</td>
          <td width="7%">&nbsp;</td>
          <td width="16%">&nbsp;</td>
        </tr>
        <tr bgcolor="#CCCCCC">
          <td width="5%"><div align="center" class="style3">N&ordm; Proposta </div></td>
          <td width="4%"><div align="center" class="style3">Data</div></td>
          <td width="6%"><div align="center" class="style3">Status</div></td>
          <td width="6%"><div align="center" class="style3">Comiss&atilde;o</div></td>
          <td width="9%"><div align="center" class="style3">Loja</div></td>
          <td width="9%"><div align="center" class="style3">Operador</div></td>
          <td width="7%"><div align="center" class="style3">Nome</div></td>
          <td><div align="center" class="style3">CPF</div></td>
          <td><div align="center" class="style3">Valor Liberado </div></td>
          <td><div align="center" class="style3">N&ordm; Parcelas </div></td>
          <td><div align="center" class="style3">Valor Parcelas </div></td>
          <td><div align="center" class="style3">Cod Tabela </div></td>
          <td><div align="center" class="style3">Coeficiente</div></td>
          <td><div align="center" class="style3">Fator Terceiros </div></td>
          <td><div align="center" class="style3">Serv Terceiros </div></td>
        </tr>
      <?
$nome_operador = $_POST['nome_operador'];
$mes_ano = $_POST['mes_ano'];

			
$sql = "SELECT * FROM propostas_veiculos where operador_atendente = '$nome_operador' and mes_ano = '$mes_ano' and status = 'Aprovado_e_Pago'  order by num_proposta desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$num_proposta = $linha[0];
$dataproposta = $linha[1];
$estabelecimento_proposta = $linha[4];
$operador_atendente = $linha[5];
$status = $linha[6];
$nome = $linha[9];
$cpf = $linha[12];

$coeficiente = $linha[100];
$codigo_tabela = $linha[101];
$num_parcelas = $linha[102];
$valor_parcelas = $linha[103];
$r = $linha[105];
$valor_liberado = $linha[106];
$pagto_serv_terceiros = $linha[107];


$comissao_op = $linha[126];

?>            
       <tr>
          <td>
            <form action="propostas/imprimir_proposta.php" method="post" name="form3" target="_blank" class="style4">
              <div align="center"> <? echo $num_proposta; ?>
                  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
                  <input type="submit" name="Submit4" value="Visualizar">
              </div>
          </form></td>
          <td><div align="center" class="style4"><? echo $dataproposta; ?></div></td>
          <td><div align="center" class="style4"><? echo $status; ?></div></td>
          <td><div align="center" class="style4"><? echo "R$ ".$comissao_op; ?></div></td>
          <td><div align="center" class="style4"><? echo $estabelecimento_proposta; ?></div></td>
          <td><div align="center" class="style4"><? echo $operador_atendente; ?></div></td>
          <td><div align="center" class="style4"><? echo $nome; ?></div></td>
          <td><div align="center" class="style4"><? echo $cpf; ?></div></td>
          <td><div align="center" class="style4"><? echo "R$ ".$valor_liberado; ?></div></td>
          <td><div align="center" class="style4"><? echo $num_parcelas; ?></div></td>
          <td><div align="center" class="style4"><? echo "R$ ".$valor_parcelas; ?></div></td>
          <td><div align="center" class="style4"><? echo $codigo_tabela; ?></div></td>
          <td><div align="center" class="style4"><? echo $coeficiente; ?></div></td>
          <td><div align="center" class="style4"><? echo $r; ?></div></td>
          <td><div align="center" class="style4"><? echo "R$ ".$pagto_serv_terceiros; ?></div></td>
  <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
  <? } ?>
</table>
      <p>&nbsp;</p>



</body>
</html>
