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
      <form name="form1" method="post" action="informe_loja_para_gerar_relatorio_mensal.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit2" value="Voltar">
</form>
      <table width="150%"  border="0">
        <tr>
          <td width="100%" colspan="11"><div align="left"><span class="style2">
          Listando todas as propostas do m&ecirc;s-Ano:</span> <span class="style2"><? echo $mes_ano; ?>
          </span></div></td>
        </tr>
        <tr>
          <td colspan="11">&nbsp;</td>
        </tr>
      </table>
      <br>
<br>
<table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>            
      <table width="150%"  border="0">
        <tr bgcolor="#<? echo $cor ?>">
          <td><div align="center"><span class="style3">N&ordm; Proposta </span></div></td>
          <td><div align="center" class="style3">Data proposta </div></td>
          <td><div align="center" class="style3">Data Pagto </div></td>
          <td><div align="center" class="style3">Status</div></td>
          <td><div align="center" class="style3"> Spread </div></td>
          <td><div align="center" class="style3">Cliente</div></td>
          <td><div align="center" class="style3">CPF</div></td>
          <td><div align="center" class="style3">Valor Contrato </div></td>
          <td width="4%"><div align="center" class="style3">Prazo</div></td>
          <td width="6%"><div align="center" class="style3">R$ Parcelas </div></td>
          <td><div align="center" class="style3">Banco da opera&ccedil;&atilde;o </div></td>
          <td><div align="center"><span class="style3">Tipo de Proposta</span></div></td>
          <td><div align="center"><span class="style3">Comiss&atilde;o</span></div></td>
          <td><div align="center"><span class="style3">F&iacute;sico</span></div></td>
        </tr>
      <?
$sql = "SELECT * FROM propostas where mes_ano = '$mes_ano' order by num_proposta asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$dataalteracao = $linha[42];
$mes_ano_status = $linha[99];
$comissao_op = $linha[101];
$status_fisico = $linha[103];

?>            
        <tr>
          <td width="10%"><div align="center" class="style3">               <form name="form2" method="post" action="acerto_de_data_pagto.php">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              
  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">
  <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo $mes_ano; ?>">
            <? printf("$linha[0]"); ?> 
            <input type="submit" name="Submit" value="Alterar">               
          </form></div></td>
          <td width="7%"><div align="center" class="style3"><? printf("$linha[40]");?></div></td>
          <td width="6%"><div align="center" class="style3"><? printf("$linha[107]");?></div></td>
          <td width="8%"><div align="center" class="style3"><? printf("$linha[51]");?></div></td>
          <td width="4%"><div align="center" class="style3"><? printf("$linha[85]");?></div></td>
          <td width="11%"> <div align="center" class="style3"><? printf("$linha[4]");?>
         </div></td>
          <td width="9%"><div align="center" class="style3"><? printf("$linha[7]");?>
          </div></td>
          <td width="7%"><div align="center" class="style3"><? printf("R$ $linha[25]");?>
          </div></td>
          <td><div align="center" class="style3"><? printf("$linha[26]"); ?>
          </div></td>
          <td><div align="center" class="style3"><? printf("$linha[27]"); ?>
          </div></td>
          <td width="10%"><div align="center" class="style3"><? printf("$linha[86]"); ?></div></td>
          <td width="7%"><div align="center"><span class="style3"><? printf("$linha[83]"); ?></span></div></td>
          <td width="4%"><div align="center"><span class="style3"><? echo "R$ ".$comissao_op;?></span></div></td>
          <td width="7%"><div align="center"><span class="style3"><? echo $status_fisico;?></span></div></td>
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
          <td><div align="center"></div></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
        <tr>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td colspan="2"><div align="center" class="style3">Total 


 Spread

</div></td>
          <td><div align="center" class="style3">
            <?
$sql = "select sum(retorno) as total from propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dataalteracao between '$data_inicial' and '$data_final' and status = 'Proposta_Paga'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
          </div></td>
          <td><span class="style3"></span></td>
          <td><div align="center" class="style3">Total Operador </div></td>
          <td><div align="center" class="style3">              <?
$sql = "select sum(valor_credito) as total from propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dataalteracao between '$data_inicial' and '$data_final' and status = 'Proposta_Paga'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
          </div></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
</table>

<?
?>          

<p>&nbsp;</p>



</body>
</html>
