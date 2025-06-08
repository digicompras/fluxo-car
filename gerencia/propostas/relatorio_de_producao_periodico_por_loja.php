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
.style3 {font-size: 10px}
.style6 {font-size: 18px; font-weight: bold; }
-->
</style>
</head>
<?

require '../../conect/conect.php';


	  
$estabelecimento_proposta = $_POST['estabelecimento_proposta'];
$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$status = $_POST['status'];


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
          <td colspan="11"><div align="left"><span class="style2">
          Listando todas as propostas da loja:</span> <span class="style2"><? echo $estabelecimento_proposta; ?>
          </span></div></td>
        </tr>
        <tr>
          <td colspan="11">&nbsp;</td>
        </tr>
        <tr>
          <td width="17%"><span class="style6">Total</span></td>
          <td colspan="2"><span class="style6">
          <?
if($status=="Todos"){
$sql = "select sum(valor_credito) as total_credito from propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' order by num_proposta asc";
}			
else{		
$sql = "select sum(valor_credito) as total_credito from propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = '$status' order by num_proposta asc";
}
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total_credito = $linha['total_credito'];

echo "R$ ".$valor_total_credito;
?></span></td>
          <td width="3%">&nbsp;</td>
          <td width="3%">&nbsp;</td>
          <td width="10%"><div align="center"></div></td>
          <td width="8%"><div align="center">
          </div></td>
          <td width="3%">&nbsp;</td>
          <td width="7%">&nbsp;</td>
          <td width="14%">&nbsp;</td>
          <td width="12%">&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style6">Total Comiss&atilde;o </span></td>
          <td width="21%"><span class="style6">
            <?
if($status=="Todos"){
$sql = "select sum(comissao_op) as total from propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' order by num_proposta asc";
}
else{
$sql = "select sum(comissao_op) as total from propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = '$status' order by num_proposta asc";
}
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?> </span></td>
          <td width="2%">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <br>
	  <?
	  $estabelecimento_proposta = $_POST['estabelecimento_proposta'];
$data_inicial = $_POST['data_inicial'];
$data_final = $_POST['data_final'];

	  ?>
      Per&iacute;odo de <? echo $dia_inicial;?>-<? echo $mes_inicial;?>-<? echo $ano_inicial;?> at&eacute; <? echo $dia_final;?>-<? echo $mes_final;?>-<? echo $ano_final;?><br>
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
          <td><div align="center" class="style3">Data ult Status </div></td>
          <td><div align="center" class="style3">Status</div></td>
          <td><div align="center" class="style3">Cliente </div></td>
          <td><div align="center" class="style3">CPF</div></td>
          <td><div align="center" class="style3">Valor Contrato </div></td>
          <td><div align="center" class="style3">Prazo</div></td>
          <td width="3%"><div align="center" class="style3">%</div></td>
          <td width="7%"><div align="center" class="style3">Comiss&atilde;o</div></td>
          <td><div align="center" class="style3">R$ Parcelas </div></td>
          <td><div align="center"><span class="style3">Banco da opera&ccedil;&atilde;o </span></div></td>
          <td><div align="center"><span class="style3">Tipo de Proposta</span></div></td>
          <td><div align="center"><span class="style3">F&iacute;sico</span></div></td>
        </tr>
      <?
if($status=="Todos"){
$sql = "SELECT * FROM propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' order by num_proposta asc";
}
else{ 
$sql = "SELECT * FROM propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = '$status' order by num_proposta asc";
}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$dataalteracao = $linha[42];
$mes_ano_status = $linha[99];
$percentual_op = $linha[100]*100;
$comissao_op = $linha[101];
$status_fisico = $linha[103];
$data_alteracao_status = $linha[107];
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
          <td width="5%"><div align="center" class="style3"><? printf("$linha[40]");?></div></td>
          <td width="5%"><div align="center" class="style3"><? echo $data_alteracao_status;?></div></td>
          <td width="6%"><div align="center" class="style3"><? printf("$linha[51]");?></div></td>
          <td width="13%"><div align="center" class="style3"><? printf("$linha[4]");?></div></td>
          <td width="8%"> <div align="center" class="style3"><? printf("$linha[7]");?>
         </div></td>
          <td width="8%"><div align="center" class="style3"><? printf("R$ $linha[25]");?>
          </div></td>
          <td width="4%"><div align="center" class="style3"><? printf("$linha[26]"); ?>
          </div></td>
          <td><div align="center" class="style3"><? echo $percentual_op."%";?>
          </div></td>
          <td><div align="center" class="style3"><? echo "R$ ".$comissao_op;?>
          </div></td>
          <td width="11%"><div align="center" class="style3"><? printf("$linha[27]"); ?></div></td>
          <td width="10%"><div align="center"><span class="style3"><? printf("$linha[86]"); ?></span></div></td>
          <td width="8%"><div align="center"><span class="style3"><? printf("$linha[83]"); ?></span></div></td>
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
          <td>&nbsp;</td>
          <td><span class="style3"></span></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
        <tr>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td colspan="2"><div align="center" class="style3"></div></td>
          <td><div align="center" class="style3">
          </div></td>
          <td><div align="center"><span class="style3">Total</span></div></td>
          <td><div align="center" class="style3">
            <?
if($status=="Todos"){
$sql = "select sum(valor_credito) as total from propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' order by num_proposta asc";
}
else{
$sql = "select sum(valor_credito) as total from propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = '$status' order by num_proposta asc";
}
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
          </div></td>
          <td><div align="center" class="style3">          </div></td>
          <td><span class="style3"></span></td>
          <td><div align="center"><span class="style3">
            <?
if($status=="Todos"){
$sql = "select sum(comissao_op) as total from propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' order by num_proposta asc";
}
else{
$sql = "select sum(comissao_op) as total from propostas where estabelecimento_proposta = '$estabelecimento_proposta' and dia_alteracao_status between '$dia_inicial'and '$dia_final' and mes_alteracao_status between '$mes_inicial'and '$mes_final' and ano_alteracao_status between '$ano_inicial'and '$ano_final' and status = '$status' order by num_proposta asc";
}
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total = $linha['total'];

echo "R$ ".$valor_total;
?>
          </span></div></td>
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
