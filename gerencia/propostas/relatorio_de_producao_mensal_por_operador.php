<?php
session_start(); //inicia sess�o...
if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...
echo ""; //se for emite mensagem positiva.
else //se n�o for...
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
.style3 {font-size: 10px}
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
			
$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];



?>
          Listando todas as propostas do operador:</span> <span class="style2"><? echo $nome_operador; ?>
          <? } ?>
          </span></div></td>
        </tr>
        <tr>
          <td width="7%"><div align="right"></div></td>
          <td width="10%">&nbsp;</td>
          <td width="8%">&nbsp;</td>
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
          <td><div align="center">Total 


 Spread

</div></td>
          <td><div align="center">
            <?
$sql = "select sum(retorno) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'Proposta_Paga'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
          </div></td>
          <td>&nbsp;</td>
          <td><div align="center">Total Operador</div></td>
          <td><div align="center">
            <?
$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'Proposta_Paga'";
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
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align="center">Total Premia&ccedil;&atilde;o </div></td>
          <td><div align="center">
              <?
$sql = "select sum(comissao_op) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'Proposta_Paga'";
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
      <table width="150%"  border="0">
        <tr bgcolor="#<? echo $cor ?>">
          <td><span class="style3">N&ordm; Proposta </span></td>
          <td><div align="center" class="style3">Status</div></td>
          <td><div align="center" class="style3">Status F&iacute;sico </div></td>
          <td><div align="center" class="style3"> Spread </div></td>
          <td><div align="center" class="style3">Premia&ccedil;&atilde;o</div></td>
          <td><div align="center" class="style3">Cliente</div></td>
          <td><div align="center" class="style3">CPF</div></td>
          <td><div align="center" class="style3">Valor Contrato </div></td>
          <td width="3%"><div align="center" class="style3">Prazo</div></td>
          <td width="5%"><div align="center" class="style3">R$ Parcelas </div></td>
          <td><div align="center" class="style3">Banco</div></td>
          <td><div align="center" class="style3">Tipo de Proposta </div></td>
        </tr>
      <?
$nome_operador = $_POST['nome_operador'];
$mes_ano = $_POST['mes_ano'];

			
$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'Proposta_Paga'  order by nome asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$comissao_op = $linha[101];

?>            
        <tr>
          <td width="5%"><div align="center" class="style3">               <form name="form2" method="post" action="editar_proposta_por_num_proposta.php">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              
  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">
            <? printf("$linha[0]"); ?>                
          </form></div></td>
          <td width="8%"><div align="center" class="style3"><? printf("$linha[51]");?></div></td>
          <td width="9%"><div align="center" class="style3"><? printf("$linha[103]");?></div></td>
          <td width="5%"><div align="center" class="style3"><? printf("$linha[85]");?></div></td>
          <td width="5%"><div align="center" class="style3"><? echo "R$ ".$comissao_op;?></div></td>
          <td width="16%"> <div align="center" class="style3"><? printf("$linha[4]");?>
         </div></td>
          <td width="8%"><div align="center" class="style3"><? printf("$linha[7]");?>
          </div></td>
          <td width="7%"><div align="center" class="style3"><? printf("R$ $linha[25]");?>
          </div></td>
          <td><div align="center" class="style3"><? printf("$linha[26]"); ?>
          </div></td>
          <td><div align="center" class="style3"><? printf("$linha[27]"); ?>
          </div></td>
          <td width="12%"><div align="center" class="style3"><? printf("$linha[28]"); ?></div></td>
          <td width="17%"><div align="center" class="style3"><? printf("$linha[83]"); ?>
          </div></td>
		  
		  
		  <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
<? } ?>
        
        <tr>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
        <tr>
          <td><span class="style3"></span></td>
          <td><div align="center" class="style3">Total 


 Spread

</div></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center" class="style3">
            <?
$sql = "select sum(retorno) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'Proposta_Paga'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
          </div></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><div align="center" class="style3">Total Operador </div></td>
          <td><div align="center" class="style3">
<?
$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and mes_ano = '$mes_ano' and status = 'Proposta_Paga'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
          </div></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
</table>

<p>&nbsp;</p>



</body>
</html>
