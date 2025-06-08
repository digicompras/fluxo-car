<?

session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");
?>

<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

require '../../conect/conect.php';

$hoje = date('d-m-Y');
$hoje_norteamericano = date('Y-m-d');


$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>



<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-weight: bold;
}
.style2 {font-weight: bold}
.style3 {
	color: #FFFFFF;
	font-weight: bold;
}
.style8 {color: #000000}
.style9 {color: #000000; font-weight: bold; }
.style10 {	font-size: 10px;
	font-weight: bold;
}
.style11 {font-size: 10px}
.style12 {color: #000000; font-weight: bold; font-size: 10px; }
.style13 {font-size: 12px}
.style21 {	color: #0000FF;

	font-weight: bold;
}
.style4 {	font-size: 16px;

	font-weight: bold;
}
.style6 {font-size: 9px; font-weight: bold; }
-->
</style>
<body bgcolor="#<? printf("ffffff"); ?>"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>




<?
$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];
$celular_op = $linha[19];
$email_op = $linha[20];
$estabelecimento_op = $linha[24];
$cidade_estabelecimento_op = $linha[25];
$tel_estabelecimento_op = $linha[26];
$email_estabelecimento_op = $linha[27];
$setor = $linha[43];
$estab_pertence_op = $linha[44];
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];
}


?>

  <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	

}
?>
  <table width="100%"  border="0">
        <tr>
          <td bgcolor="#CCCCCC"><div align="center"><span class="style2">
</span> <span class="style1"><? echo $nome_op; ?></span><span class="style2"> verificando os lan&ccedil;amentos do caixa em <? echo $hoje; ?><BR>
	      </span></div></td>
        </tr>
</table>
          
<div align="center"></div>
     <div align="center"></div></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><div align="center">
        </div></td>
    </tr>
    <tr>
      <td valign="top"><div align="center">
        <table width="100%"  border="0">
          <tr>
            <td colspan="3"><div align="center">
              <table width="100%"  border="1">
                <tr bgcolor="#CCCCCC">
                  <td colspan="2"><div align="center"><strong>Abertura de Caixa </strong></div></td>
                </tr>
                <tr bgcolor="ffffff">
                  <td width="49%"><div align="center" class="style8 style3">Caixa aberto hoje com o valor de </div></td>
                  <td width="51%"><div align="center" class="style9">
                      <?
			


$sql = "SELECT * FROM cx_entradas where datacadastro = '$hoje' and categoria_conta = 'Abertura de Caixa' and setor = '$setor' order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$datacadastro = $linha[3];

$valor_abertura = $linha[25];
$historico = $linha[23];

}
?>
                      <? echo "R$ ".$valor_abertura; ?></div></td>
                </tr>
              </table>
            </div></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="49%" valign="top"><table width="100%"  border="1">
              <tr bgcolor="#CCCCCC">
                <td colspan="5"><div align="center"><strong>Entradas</strong></div></td>
              </tr>
              <tr bgcolor="ffffff">
                <td width="15%"><div align="center" class="style10">Data</div></td>
                <td width="23%"><div align="center" class="style3 style8 style11">Valor </div></td>
                <td><div align="center" class="style11"><strong>Verba</strong></div></td>
                <td><div align="center" class="style10">Registro</div></td>
                <td><div align="center" class="style12">Hist&oacute;rico</div></td>
              </tr>
              <?
			


$sql = "SELECT * FROM cx_entradas where datacadastro = '$hoje' and setor = '$setor' order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$datacadastro = $linha[20];
$horacadastro = $linha[21];
$nfantasia = $linha[22];
$historico_entrada = $linha[23];
$categoria_conta_entrada = $linha[24];
$valor_entrada = $linha[25];
$num_sete_um = $linha[26];


?>
              <tr>
                <td><div align="center" class="style11"><? echo $datacadastro; ?></div></td>
                <td><div align="center" class="style11"><? echo "R$ ". $valor_entrada; ?> </div></td>
                <td width="29%"><div align="center" class="style11"><? echo $categoria_conta_entrada; ?></div></td>
                <td width="33%"><div align="center"><span class="style11"><? echo $codigo; ?></span></div></td>
                <td width="33%">
                  <div align="center" class="style11"><? echo $historico_entrada; ?></div></td>
              </tr>
              <? } ?>
              <tr>
                <td colspan="5"><div align="center"><strong> Total
                          <?
$sql = "select sum(valor) as total_entradas from cx_entradas where datacadastro = '$hoje' and setor = '$setor'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total_entradas = $linha['total_entradas'];

echo "R$ ".$valor_total_entradas;
?>
                </strong></div></td>
              </tr>
            </table></td>
            <td width="1%">&nbsp;</td>
            <td width="50%" valign="top"><table width="100%"  border="1">
              <tr bgcolor="#CCCCCC">
                <td colspan="6"><div align="center"><strong>Sa&iacute;das</strong></div></td>
              </tr>
              <tr bgcolor="ffffff">
                <td width="12%"><div align="center" class="style11"><strong>Data</strong></div></td>
                <td width="16%"><div align="center" class="style3 style8 style11">Valor</div></td>
                <td><div align="center" class="style11"><strong>Verba</strong></div></td>
                <td><div align="center" class="style10">Registro</div></td>
                <td><div align="center" class="style10">Modo Pagto </div></td>
                <td><div align="center" class="style12">Hist&oacute;rico</div></td>
              </tr>
			                  <?
			


$sql = "SELECT * FROM cx_saidas where datacadastro = '$hoje' and setor = '$setor' order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$datacadastro = $linha[20];
$horacadastro = $linha[21];
$nfantasia = $linha[22];
$historico_saida = $linha[23];
$categoria_conta_saida = $linha[24];
$valor_saida = $linha[25];
$num_sete_um = $linha[26];
$modo_pagto = $linha[27];


?>

              <tr>
                <td><div align="center"><span class="style11"><? echo $datacadastro; ?></span></div></td>
                <td><div align="center" class="style11"><? echo "R$ ". $valor_saida; ?> </div></td>
                <td width="19%"><div align="center"><span class="style11"><? echo $categoria_conta_saida; ?></span></div></td>
                <td width="13%"><div align="center"><span class="style11"><? echo $codigo; ?></span></div></td>
                <td width="16%"><div align="center"><span class="style11"><? echo $modo_pagto; ?></span></div></td>
                <td width="24%">
                  <div align="center" class="style11"><? echo $historico_saida; ?></div></td>
              </tr>
              <? } ?>
              <tr>
                <td colspan="6"><div align="center"><strong> Total
                          <?
$sql = "select sum(valor) as total_saidas from cx_saidas where datacadastro = '$hoje' and setor = '$setor'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total_saidas = $linha['total_saidas'];

echo "R$ ".$valor_total_saidas;
?>
                </strong></div></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </div>
    <br>
<table width="100%"  border="1">
  <tr>
    <td width="33%"><div align="right"></div></td>
    <td width="34%" bgcolor="#CCCCCC"><div align="left"></div>      
    <div align="center" class="style2">Saldo 
      <?
$saldo = bcsub($valor_total_entradas,$valor_total_saidas,2);

echo "R$ ".$saldo;
?>
    </div></td>
    <td width="33%">&nbsp;</td>
  </tr>
</table><br>
<table width="100%" border="0">
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center">
      <strong>
      <?

$sql = "select sum(valor_a_receber) as total_dos_cartoes from contas_a_receber where setor = '$setor' and datacadastro = '$hoje_norteamericano' and (modopagto = 'CARTAO DE DEBITO' or modopagto = 'CARTAO DE CREDITO' or modopagto = 'CARNE')";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$total_recebimento_cartoes = $linha['total_dos_cartoes'];





$total_caixa_hoje = bcadd($valor_total_entradas,$total_recebimento_cartoes,2);

echo "Total de recebimentos do caixa R$ $total_caixa_hoje";

?></strong></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
</table>
<br>
<table width="50%" border="1" align="center" cellspacing="0">
  <tr>
    <td height="15" class="style21"><div align="center"><strong>Total recebimento com cartoes</strong></div></td>
    <td class="style21"><div align="center"><strong>
      <?




echo "R$ ".$total_recebimento_cartoes;

?>
    </strong></div></td>
  </tr>
  <tr>
    <td width="52%" height="15" class="style21"><div align="center" class="style21"><strong>Cartoes (Tipo de operacao)</strong></div></td>
    <td width="48%" class="style21"><div align="center" class="style21"><strong>Valor Total</strong></div></td>
  </tr>
  <?
  

$sql1 = "select * from orcamentos where modopagto <> 'DINHEIRO' and setor = '$setor' and dataabertura = '$hoje_norteamericano' group by modopagto order by modopagto asc";
$res1 = mysql_query($sql1);
while($linha=mysql_fetch_row($res1)) {

$modopagto = $linha[10];

?>
  <tr>
    <td colspan="2" class="style21"><div align="center"><span class="style2 style2 style4"><strong><font color="#0000FF"><strong><? echo $modopagto; ?></strong></font></strong></span></div>
      <div align="center"></div></td>
  </tr>
  <?
  

$sql2 = "select * from contas_a_receber where modopagto = '$modopagto' and setor = '$setor' and datacadastro = '$hoje_norteamericano' group by cartao order by cartao asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$cartao = $linha[33];




?>
  <?


$sql3 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = '$modopagto' and cartao = '$cartao' and setor = '$setor' and datacadastro = '$hoje_norteamericano'";

$resultado3=mysql_query($sql3, $conexao);
$linha=mysql_fetch_array($resultado3);



$total_cartao = $linha['totalcartao'];



?>
  <tr>
    <td class="style21"><div align="center"><span class="style6"><? echo $cartao; ?> </span></div></td>
    <td class="style21"><div align="center"><strong><font color="#0000FF"><strong><? echo "R$ ".$total_cartao;
 ?> </strong></font></strong></div></td>
  </tr>
  <?
}
}
?>
</table>
<p>&nbsp;</p>
