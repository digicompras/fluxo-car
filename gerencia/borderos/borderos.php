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
<title>Border&ocirc;s</title>
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


$nome_operador = $_POST['nome_operador'];
$estab_pertence = $_POST['estab_pertence'];
$status_proposta = $_POST['status_proposta'];
$num_bordero_add = $_POST['num_bordero_add'];
$num_proposta = $_POST['num_proposta'];
$num_proposta_ret = $_POST['num_proposta_ret'];
$num_bordero_ret = $_POST['num_bordero_ret'];

$dataabertura = date('d-m-Y');
$horaabertura = date('H:i:s');
$diaabertura = date('d');
$mesabertura = date('m');
$anoabertura = date('Y');


$datafechameno = date('d-m-Y');
$horafechamento = date('H:i:s');
$diafechamento = date('d');
$mesfechamento = date('m');
$anofechamento = date('Y');

$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];


$sql = "SELECT * FROM borderos where loja = '$estab_pertence' and status = 'Aberto'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}



if($registros==0){
$comando = "insert into borderos(loja,status,operador,dataabertura,horaabertura,diaabertura,mesabertura,anoabertura)

values('$estab_pertence','Aberto','$nome_operador','$dataabertura','$horaabertura','$diaabertura','$mesabertura','$anoabertura')";
 
mysql_query($comando,$conexao);
 
 
$sql = "SELECT * FROM borderos where loja = '$estab_pertence' and status = 'Aberto' order by num_bordero desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$num_bordero_zero = $linha[0];
$loja = $linha[1];
$status = $linha[2];
}

}
else{

$sql = "SELECT * FROM borderos where loja = '$estab_pertence' and status = 'Aberto' order by num_bordero desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$num_bordero_um = $linha[0];
$loja = $linha[1];
$status = $linha[2];
}



}


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`num_bordero` = '$num_bordero_add' where `propostas`. `num_proposta` = '$num_proposta' limit 1 ";
}

mysql_query($comando,$conexao);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta_ret',`num_bordero` = '' where `propostas`. `num_proposta` = '$num_proposta_ret' limit 1 ";
}

mysql_query($comando,$conexao);






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
<table width="100%" bgcolor="#ffffff"  border="0">
  <tr valign="top">
    <td width="36%" height="23">
      <?
$sql = "SELECT * FROM logo";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {
$reg++;

printf("<img src='../../imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'>"); 

}
?>
    </td>
    <td width="37%" valign="middle"><div align="center"> </div></td>
    <td width="27%" height="23">&nbsp;</td>
  </tr>
</table>
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
      <table width="100%"  border="0">
        <tr>
          <td colspan="8"><div align="left"><span class="style2">
          Listando border&ocirc;s da loja:</span> <span class="style2"><? echo $estab_pertence; ?>
          </span></div></td>
        </tr>
        <tr>
          <td colspan="2">
            <form action="fechamento_bordero.php" method="post" name="form4" target="_blank">
              <div align="center"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <span class="style3">
              <input name="num_bordero_fechar" type="hidden" id="num_bordero_fechar" value="<?
if($registros==0){
echo $num_bordero_zero;
}			
else{
echo $num_bordero_um;
}
?>">
              <strong><font color="#0000FF">
              <input name="estab_pertence" type="hidden" id="estab_pertence4" value="<? echo $estab_pertence; ?>">
              <strong><font color="#0000FF">
              <input name="nome_operador" type="hidden" id="nome_operador3" value="<? echo $nome_operador; ?>">
              </font></strong> </font></strong> </span> <span class="style3"><strong><font color="#0000FF">
              <input name="status_proposta" type="hidden" id="status_proposta" value="<? echo "Proposta_Paga"; ?>">
              </font></strong></span>
              <input type="submit" name="Submit32" value="Fechar Border&ocirc;">
              <input name="datafechamento" type="hidden" id="datafechamento" value="<? echo date('d-m-Y'); ?>">
              <input name="horafechamento" type="hidden" id="horafechamento" value="<? echo date('H:i:s'); ?>">
              <input name="diafechamento" type="hidden" id="diafechamento" value="<? echo date('d'); ?>">
              <input name="mesfechamento" type="hidden" id="mesfechamento" value="<? echo date('m'); ?>">
              <input name="anofechamento" type="hidden" id="anofechamento" value="<? echo date('Y'); ?>">
              <input name="recebimento" type="hidden" id="recebimento" value="<? echo "A Caminho"; ?>">
              </div> 
            </form>
          </td>
          <td width="10%">&nbsp;</td>
          <td colspan="5"><form action="visualizacao_borderos.php" method="post" name="form5" target="_blank">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
            <select name="num_bordero" id="select2">
              <option value="null" selected>Selecione
              <?

    $sql = "select * from borderos where loja = '$estab_pertence' order by num_bordero desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
	$registros_nesse_bordero = mysql_num_rows($result);

  echo "<option>".$x['num_bordero']."</option>";
    }
?>
              </option>
            </select>
            <span class="style3"><strong><font color="#0000FF">
            <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
            </font></strong></span>
            <input type="submit" name="Submit4" value="Visualisar Border&ocirc;">
          </form></td>
        </tr>
        <tr>
          <td colspan="3"><span class="style6">
          <?
if($registros==0){
echo "Seu borderô foi aberto com sucesso! Nº ". $num_bordero_zero;
}			
else{
echo "Sua loja já possui um borderô aberto! Nº ". $num_bordero_um;
}
?>
          </span>            <div align="center"></div>          <div align="center">
          </div></td>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td width="8%">              <?
$sql = "SELECT * FROM propostas where estabelecimento_proposta = '$estab_pertence' and status = 'Proposta_Paga' and status_fisico = 'Pendente' and num_bordero = '' order by num_proposta asc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}
?>
</td>
          <td colspan="6">
            <form name="form4" method="post" action="borderos.php"><div align="center">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <select name="num_proposta_ret" id="select4">
                <option value="null" selected>Selecione
                <?
if($registros==0){
$num_bordero =  $num_bordero_zero;
}			
else{
$num_bordero = $num_bordero_um;
}


    $sql = "select * from propostas where estabelecimento_proposta = '$estab_pertence' and num_bordero = '$num_bordero' order by num_proposta desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
	$registros_nesse_bordero = mysql_num_rows($result);

  echo "<option>".$x['num_proposta']."</option>";
    }
?>
                </option>
              </select>
              <span class="style3">
              <input name="num_bordero_ret" type="hidden" id="num_bordero_ret2" value="<?
if($registros==0){
echo $num_bordero_zero;
}			
else{
echo $num_bordero_um;
}
?>">
              <strong><font color="#0000FF">
              <input name="estab_pertence" type="hidden" id="estab_pertence7" value="<? echo $estab_pertence; ?>">
              <strong><font color="#0000FF">
              <input name="nome_operador" type="hidden" id="nome_operador6" value="<? echo $nome_operador; ?>">
              </font></strong> </font></strong> </span> <span class="style3"><strong><font color="#0000FF">
              <input name="status_proposta" type="hidden" id="status_proposta5" value="<? echo "Proposta_Paga"; ?>">
              </font></strong></span>
              <input type="submit" name="Submit3" value="Retirar">
  </div>
            </form>
          </td>
          <td width="12%">&nbsp;</td>
        </tr>
      </table>
            <form name="form3" method="post" action="borderos.php">
  <table width="100%"  border="0">
    <tr>
      <td width="35%">loja <strong><font color="#0000FF"><? echo $estab_pertence; ?></font></strong></td>
      <td width="32%"> <strong><font color="#0000FF">
        <input name="estab_pertence" type="hidden" id="estab_pertence2" value="<? echo $estab_pertence; ?>">
        <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
        <input name="status_proposta" type="hidden" id="status2" value="<? echo "Proposta_Paga"; ?>">
      </font></strong></td>
      <td width="33%">&nbsp; </td>
    </tr>
  </table>
</form>
<div align="center"><strong>Os contratos f&iacute;sico listados abaixo ainda n&atilde;o foram recepcionados pela matriz! Registros encontrados <? echo $registros;?></strong></div>
            <table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>            
            <table width="120%"  border="0">
              <tr bgcolor="#<? echo $cor ?>">
                <td><div align="center"><span class="style3">N&ordm; Proposta </span></div></td>
                <td><div align="center" class="style3">N&ordm; contrato bco </div></td>
                <td><div align="center" class="style3">Data Pagto </div></td>
                <td><div align="center" class="style3">Status</div></td>
                <td><div align="center" class="style3">Cliente </div></td>
                <td><div align="center" class="style3">CPF</div></td>
                <td><div align="center" class="style3">Prazo</div></td>
                <td><div align="center" class="style3">Valor Contrato </div></td>
                <td><div align="center"><span class="style3">Banco da opera&ccedil;&atilde;o </span></div></td>
                <td><div align="center"><span class="style3">Tipo de Proposta</span></div></td>
                <td><div align="center"><span class="style3">F&iacute;sico</span></div></td>
              </tr>
              <?
$sql = "SELECT * FROM propostas where estabelecimento_proposta = '$estab_pertence' and status = 'Proposta_Paga' and status_fisico = 'Pendente' and num_bordero = '' order by num_proposta asc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$dataalteracao = $linha[42];
$mes_ano_status = $linha[99];
$percentual_op = $linha[100]*100;
$comissao_op = $linha[101];
$status_fisico = $linha[103];
$data_alteracao_status = $linha[107];
$num_contrato_banco = $linha[105];
$num_bordero_relacionada = $linha[129];

?>
              <tr>
                <td width="11%"><div align="center" class="style3">
                    <form name="form2" method="post" action="borderos.php">
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      <? printf("$linha[0]"); ?>
                      <input name="num_proposta" type="hidden" id="num_proposta5" value="<? echo $linha[0]; ?>">                      
                      <input name="num_bordero_add" type="hidden" id="num_bordero_add" value="<?
if($registros==0){
echo $num_bordero_zero;
}			
else{
echo $num_bordero_um;
}
?>">
                      <strong><font color="#0000FF">
                      <input name="estab_pertence" type="hidden" id="estab_pertence3" value="<? echo $estab_pertence; ?>">
                      <input name="nome_operador" type="hidden" id="nome_operador5" value="<? echo $nome_operador; ?>">
                      <input name="status_proposta" type="hidden" id="status_proposta4" value="<? echo "Proposta_Paga"; ?>">
                      </font></strong>
                      
                      <input type="submit" name="Submit" value="Adicionar">
                    </form>
                </div></td>
                <td width="7%"><div align="center" class="style3"><? echo $num_contrato_banco;?></div></td>
                <td width="10%"><div align="center" class="style3"><? echo $data_alteracao_status;?></div></td>
                <td width="9%"><div align="center" class="style3"><? printf("$linha[51]");?></div></td>
                <td width="17%"><div align="center" class="style3"><? printf("$linha[4]");?></div></td>
                <td width="10%">
                  <div align="center" class="style3"><? printf("$linha[7]");?> </div></td>
                <td width="4%"><div align="center" class="style3"><? printf("$linha[26]"); ?> </div></td>
                <td width="8%"><div align="center" class="style3"><? printf("R$ $linha[25]");?> </div></td>
                <td width="10%"><div align="center"><span class="style3"><? printf("$linha[86]"); ?></span></div></td>
                <td width="8%"><div align="center"><span class="style3"><? printf("$linha[83]"); ?></span></div></td>
                <td width="6%"><div align="center"><span class="style3"><? echo $status_fisico;?></span></div></td>
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
                <td><div align="center"></div></td>
                <td><div align="center"></div></td>
                <td><div align="center"></div></td>
            </table>
<p><strong></strong></p>
<p><strong></strong></p>
<p><strong></strong></p>





</body>
</html>
