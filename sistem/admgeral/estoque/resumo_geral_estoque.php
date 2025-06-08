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
.style3 {font-size: 15px}
-->
</style>
</head>
<?

require '../../conect/conect.php';


	  


$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

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
      <form action="../relatorios/menu.php" method="post" name="form1" target="navegacao">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="solicitacao" type="hidden" id="solicitacao">
        <input type="hidden" name="comissao" id="comissao">
<input type="submit" name="Submit2" value="Voltar">
</form>
<br>
      <table width="100%"  border="0" align="center">
        <tr>
          <td valign="middle">&nbsp;</td>
          <td colspan="2" valign="middle"><div align="center"></div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td valign="middle">&nbsp;</td>
          <td colspan="2" valign="middle"><div align="center">TOTAL DE PRODUTOS CADASTRADOS NO ESTOQUE
            <?	

$sql = "SELECT * FROM produtos order by categoria,nome_produto asc";

$res = mysql_query($sql);

$registros_produtos = mysql_num_rows($res);





echo $registros_produtos;

?>
          </div></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="18%" valign="middle"><div align="center"></div></td>
          <td width="25%" valign="middle"><div align="center"></div></td>
          <td width="26%"><div align="center"></div></td>
          <td width="31%"><div align="center"></div></td>
        </tr>
        <tr>
          <td valign="middle">&nbsp;</td>
          <td valign="middle">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
<br>
<table width="100%"  border="0">
  <tr bgcolor="#ffffff">
    <td><div align="center" class="style3">
      <p><strong>Codigo</strong></p>
    </div></td>
    <td class="style3"><div align="center"><strong>Categoria</strong></div></td>
    <td><div align="center"><strong>Nome Produto</strong></div></td>
    <td><div align="center" class="style3"><strong>Pre&ccedil;o Compra</strong></div></td>
    <td><div align="center" class="style3"><strong>Impostos Compra</strong></div></td>
    <td><div align="center" class="style3"><strong>CMV</strong></div></td>
    <td><div align="center" class="style3">
      <p><strong>Impostos Venda</strong></p>
    </div></td>
    <td><div align="center" class="style3"><strong>Pre&ccedil;o Venda</strong></div></td>
    <td><div align="center"><strong>Previs&atilde;o de saldo</strong></div></td>
    <td><div align="center"></div></td>
  </tr>
  <?


$sql = "SELECT * FROM produtos order by categoria,nome_produto asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$referencia = $linha[0];
$foto = $linha[1];
$material = $linha[2];
$cor = $linha[3];
$categoria = $linha[4];
$sub_categoria = $linha[5];
$descricao = $linha[6];
$preco = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$data_hora = $linha[10];
$codigo = $linha[11];
$foto2 = $linha[12];
$foto3 = $linha[13];
$foto4 = $linha[14];
$cod_barras = $linha[15];
$quant_estoque = $linha[16];
$expedicao = $linha[17];
$quant_disponivel = $linha[18];
$quant_minima = $linha[19];
$aparecer_site = $linha[20];
$preco_compra = $linha[21];
$frete = $linha[22];
$margem_lucro = $linha[23];
$impostos = $linha[24];
$margem_lucro_informada = $linha[25];
$impostos_informado = $linha[26];
$nome_produto = $linha[27];
$fornecedor = $linha[28];
$travesseiro1 = $linha[29];
$travesseiro2 = $linha[30];


$margem_folga = $linha[32];
$margem_folga_decimal = $linha[33];

$descontomaximo = $linha[34];

$impostos_compra = $linha[35];
$impostos_compra_decimal = $linha[36];


?>

<?
if($impostos_compra_decimal==0){
	
$total_cmv = bcadd($preco_compra,0,2);
	
}
else{
	
$total_cmv = bcdiv($preco_compra,$impostos_compra_decimal,2);

}

$impostos_decimal = bcdiv($impostos_informado,100,4);

$impostos_sobre_venda = bcmul($preco,$impostos_decimal,2);

$previsao_de_saldo_estapa1 = bcsub($preco,$impostos_sobre_venda,2);

$previsao_de_saldo = bcsub($previsao_de_saldo_estapa1,$total_cmv,2);


?>

  <tr>
    <td width="4%"><form name="form2" method="post" action="">
      <div align="center" class="style3">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
        <?  echo "$codigo";  ?>
      </div>
    </form></td>
    <td width="9%" class="style3"><div align="center"><? echo $categoria; ?></div></td>
    <td width="26%"><div align="left"><span class="style3"><? echo $nome_produto; ?></span></div></td>
    <td width="8%"><div align="center"><span class="style3"><? echo $preco_compra; ?></span></div></td>
    <td width="9%"><div align="center"><span class="style3"><? echo "$impostos_compra%"; ?></span></div></td>
    <td width="10%"><div align="center"><span class="style3"><? echo $total_cmv; ?></span></div></td>
    <td width="9%"><div align="center"><span class="style3"><? echo "$impostos_informado%"; ?></span></div></td>
    <td width="7%"><div align="center"><span class="style3"><? echo $preco; ?></span></div></td>
    <td width="10%"><div align="center"><span class="style3"><? echo $previsao_de_saldo; ?></span></div></td>
    <td width="8%"><div align="center"></div></td>
    <? } ?>
</table>
<p>&nbsp;</p>
</body>
</html>
