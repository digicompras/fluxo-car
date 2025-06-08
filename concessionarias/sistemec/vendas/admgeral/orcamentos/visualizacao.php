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
<title>EMISS&Atilde;O DE OR&Ccedil;AMENTOS DE CLIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.style3 {font-size: 10px}
.style5 {	font-size: 24px;
	font-weight: bold;
}
</style>
</head>
<?

require '../../conect/conect.php';

$codigo_orcamento = $_POST['codigo_orcamento'];

			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


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

$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento'";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

$condicao = $linha[16];


$status = $linha[17];
$nome = $linha[26];



}

?>
  <p>
  <?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];
$celular_op = $linha[19];
$email_op = $linha[20];
$estabelecimento_op = $linha[24];
$cidade_estabelecimento_op = $linha[25];
$tel_estabelecimento_op = $linha[26];
$email_estabelecimento_op = $linha[27];
$estab_pertence_op = $linha[44];
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];

}
?>
<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$razaosocial = $linha[1];
$nfantasia = $linha[2];
$endereco = $linha[5];
$numero = $linha[6];
$bairro = $linha[7];
$cep = $linha[9];
$cidade = $linha[10];
$estado = $linha[11];
$telefone = $linha[12];
$email_empresa = $linha[14];
$site = $linha[15];
$email_vendas = $linha[42];


}
?>
</p>
<form name="form1" method="post" action="grava_orcamento.php">
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td><div align="center">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
        <tr>
          <td width="7%">
              <div align="left">
                <?


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

//printf("<a href='index.php' target='_top'><img src='../../imagens/$linha[1]' border='0'  width='150' ></a>");
 } ?>
                  </div></td>
          <td width="93%"><div align="center"><strong><font size="2"><? echo $razaosocial; ?><br>
            <? echo $endereco." "; ?><? echo "Nº ".$numero; ?>,  <? echo $bairro; ?>,  <? echo $cidade." "; ?> <? echo $estado; ?><br>
            Site: <? echo $site; ?> E-Mail: <? echo $email_vendas; ?><br>
            TEL: <? echo $telefone; ?></font></strong></div></td>
        </tr>
      </table>
    </div></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><div align="center" class="style5">Total do <? echo $condicao; ?>:
          <?

$sql = "select sum(total) as total_liquido from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_liquido = $linha['total_liquido'];

$total_orcamento = bcadd($valor_total_liquido,0,2);

echo "R$ ".$total_orcamento;

?>
      <strong>N&ordm; <font color="#0000FF" size="2"><? echo $codigo_orcamento; ?></font></strong></div></td>
  </tr>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="4">
      <tr>
        <td><strong>C&oacute;digo:</strong></td>
        <td><strong><font color="#0000FF"><strong><? echo $codigo_cliente; ?></strong></font></strong></td>
        <td><strong>Telefone:</strong></td>
        <td><strong><font color="#0000FF"><strong><? echo $telefone; ?></strong></font></strong></td>
      </tr>
      <tr>
        <td><strong>Nome</strong></td>
        <td><strong><font color="#0000FF"><strong><? echo $nome; ?></strong></font></strong></td>
        <td><strong>Celular:</strong></td>
        <td><strong><font color="#0000FF"><strong><? echo $celular; ?></strong></font></strong></td>
      </tr>
      <tr>
        <td width="11%"><strong>Endere&ccedil;o:</strong></td>
        <td width="40%"><strong><font color="#0000FF"><strong><? echo $endereco; ?> N&ordm; <font color="#0000FF"><strong><? echo $numero; ?></strong></font></strong></font></strong></td>
        <td width="13%"><strong>E-Mail:</strong></td>
        <td width="36%"><strong><font color="#0000FF"><strong><? echo $email; ?></strong></font></strong></td>
      </tr>
      <tr>
        <td><p><strong>Bairro:</strong></p></td>
        <td><strong><font color="#0000FF"><strong><? echo $bairro; ?></strong></font></strong></td>
        <td><strong>CEP:</strong></td>
        <td><strong><font color="#0000FF"><strong><? echo $cep; ?></strong></font></strong></td>
      </tr>
      <tr>
        <td><strong>Cidade:</strong></td>
        <td><strong><font color="#0000FF"><strong><? echo $cidade; ?> Estado <font color="#0000FF"><strong><? echo $estado; ?></strong></font></strong></font></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><strong>Telefone:</strong></td>
        <td><strong><font color="#0000FF"><strong><? echo $telefone; ?></strong></font></strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
</tr>
</table>
<table width="100%"  border="1">
  <tr bgcolor="#ffffff">
    <td width="8%"><div align="center" class="style3">Codigo Produto</div></td>
    <td width="22%" class="style3"><div align="center">Nome Produto</div></td>
    <td width="16%" class="style3"><div align="center">Categoria</div></td>
    <td width="9%" class="style3"><div align="center">Pre&ccedil;o</div></td>
    <td width="8%"><div align="center" class="style3">Quantidade</div></td>
    <td width="7%"><div align="center" class="style3">Desconto</div></td>
    <td width="11%"><div align="center" class="style3">Desconto Monetario</div></td>
    <td width="19%"><div align="center"><span class="style3">Total Produtos</span></div></td>
  </tr>
  <?
			  
			  
$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco = $linha[22];
$desconto = $linha[23];
$descontodecimal = $linha[24];
$descontomonetario = $linha[25];
$acrescimo = $linha[26];
$acrescimodecimal = $linha[27];
$acrescimomonetario = $linha[28];
$total = $linha[29];


?>
  <tr>
    <td><div align="center" class="style3"><? echo $codigoproduto;?></div></td>
    <td class="style3"><div align="center"><? echo $nomeproduto;?></div></td>
    <td class="style3"><div align="center"><? echo $categoria;?></div></td>
    <td class="style3"><div align="center"><? echo $preco;?></div></td>
    <td><div align="center" class="style3"><? echo $quant;?></div></td>
    <td><div align="center" class="style3"><? echo $desconto;?></div></td>
    <td><div align="center" class="style3"><? echo $descontomonetario;?></div></td>
    <td><div align="center"><span class="style3"><? echo $total;?></span></div></td>
  </tr>
  <?  } ?>
</table>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td><div align="center">
      <p><font size="4"><strong>Observações</strong></font><br>
          <strong><font color="#0000FF"><strong><font size="4"><? echo $obs_cliente;  ?></font></strong></font></strong></p>
      </div></td>
  </tr>
</table>

<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="12%"><strong>Condi&ccedil;&otilde;es de Pagto: Parcelamento em
        <font color="#0000FF"><strong><? echo $quantparc_cliente; ?></strong></font> 
        vezes. Modo do parcelamento
        <font color="#0000FF"><strong><? echo $condpagto_cliente; ?></strong></font>      <font color="#0000FF">
      <input name="operador" type="hidden" id="operador3" value="<? echo $nome_op; ?>">
      <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
      <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
      <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estabelecimento_op; ?>">
      <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento2" value="<? echo $cidade_estabelecimento_op; ?>">
      <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estabelecimento_op; ?>">
      <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estabelecimento_op; ?>">
      </font></strong></td>
    </tr>
</table><p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">ASS:_______________________________________________________</div></td>
  </tr>
</table>
<p><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<p>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
<form name="form1" method="post" action="grava_orcamento.php">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td><div align="center">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
          <tr>
            <td width="7%"><div align="left">
              <?


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

//printf("<a href='index.php' target='_top'><img src='../../imagens/$linha[1]' border='0'  width='150' ></a>");
 } ?>
            </div></td>
            <td width="93%"><div align="center"><strong><font size="2"><? echo $razaosocial; ?><br>
                          <? echo $endereco." "; ?><? echo "N&ordm; ".$numero; ?>, <? echo $bairro; ?>, <? echo $cidade." "; ?> <? echo $estado; ?><br>
              Site: <? echo $site; ?> E-Mail: <? echo $email_vendas; ?><br>
              TEL: <? echo $telefone; ?></font></strong></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td><div align="center" class="style5">Total do <? echo $condicao; ?>:
            <?

$sql = "select sum(total) as total_liquido from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_liquido = $linha['total_liquido'];

$total_orcamento = bcadd($valor_total_liquido,0,2);

echo "R$ ".$total_orcamento;

?>
      <strong>N&ordm; <font color="#0000FF" size="2"><? echo $codigo_orcamento; ?></font></strong></div></td>
    </tr>
  </table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td><table width="100%" border="0" cellspacing="4">
        <tr>
          <td><strong>C&oacute;digo:</strong></td>
          <td><strong><font color="#0000FF"><strong><? echo $codigo_cliente; ?></strong></font></strong></td>
          <td><strong>Telefone:</strong></td>
          <td><strong><font color="#0000FF"><strong><? echo $telefone; ?></strong></font></strong></td>
        </tr>
        <tr>
          <td><strong>Nome</strong></td>
          <td><strong><font color="#0000FF"><strong><? echo $nome; ?></strong></font></strong></td>
          <td><strong>Celular:</strong></td>
          <td><strong><font color="#0000FF"><strong><? echo $celular; ?></strong></font></strong></td>
        </tr>
        <tr>
          <td width="11%"><strong>Endere&ccedil;o:</strong></td>
          <td width="40%"><strong><font color="#0000FF"><strong><? echo $endereco; ?> N&ordm; <font color="#0000FF"><strong><? echo $numero; ?></strong></font></strong></font></strong></td>
          <td width="13%"><strong>E-Mail:</strong></td>
          <td width="36%"><strong><font color="#0000FF"><strong><? echo $email; ?></strong></font></strong></td>
        </tr>
        <tr>
          <td><p><strong>Bairro:</strong></p></td>
          <td><strong><font color="#0000FF"><strong><? echo $bairro; ?></strong></font></strong></td>
          <td><strong>CEP:</strong></td>
          <td><strong><font color="#0000FF"><strong><? echo $cep; ?></strong></font></strong></td>
        </tr>
        <tr>
          <td><strong>Cidade:</strong></td>
          <td><strong><font color="#0000FF"><strong><? echo $cidade; ?> Estado <font color="#0000FF"><strong><? echo $estado; ?></strong></font></strong></font></strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Telefone:</strong></td>
          <td><strong><font color="#0000FF"><strong><? echo $telefone; ?></strong></font></strong></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
  <table width="100%"  border="1">
    <tr bgcolor="#ffffff">
      <td width="8%"><div align="center" class="style3">Codigo Produto</div></td>
      <td width="22%" class="style3"><div align="center">Nome Produto</div></td>
      <td width="16%" class="style3"><div align="center">Categoria</div></td>
      <td width="9%" class="style3"><div align="center">Pre&ccedil;o</div></td>
      <td width="8%"><div align="center" class="style3">Quantidade</div></td>
      <td width="7%"><div align="center" class="style3">Desconto</div></td>
      <td width="11%"><div align="center" class="style3">Desconto Monetario</div></td>
      <td width="19%"><div align="center"><span class="style3">Total Produtos</span></div></td>
    </tr>
    <?
			  
			  
$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco = $linha[22];
$desconto = $linha[23];
$descontodecimal = $linha[24];
$descontomonetario = $linha[25];
$acrescimo = $linha[26];
$acrescimodecimal = $linha[27];
$acrescimomonetario = $linha[28];
$total = $linha[29];


?>
    <tr>
      <td><div align="center" class="style3"><? echo $codigoproduto;?></div></td>
      <td class="style3"><div align="center"><? echo $nomeproduto;?></div></td>
      <td class="style3"><div align="center"><? echo $categoria;?></div></td>
      <td class="style3"><div align="center"><? echo $preco;?></div></td>
      <td><div align="center" class="style3"><? echo $quant;?></div></td>
      <td><div align="center" class="style3"><? echo $desconto;?></div></td>
      <td><div align="center" class="style3"><? echo $descontomonetario;?></div></td>
      <td><div align="center"><span class="style3"><? echo $total;?></span></div></td>
    </tr>
    <?  } ?>
  </table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td><div align="center">
        <p><font size="4"><strong>Observa&ccedil;&otilde;es</strong></font><br>
              <strong><font color="#0000FF"><strong><font size="4"><? echo $obs_cliente;  ?></font></strong></font></strong></p>
      </div></td>
    </tr>
  </table>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td width="12%"><strong>Condi&ccedil;&otilde;es de Pagto: Parcelamento em <font color="#0000FF"><strong><? echo $quantparc_cliente; ?></strong></font> vezes. Modo do parcelamento <font color="#0000FF"><strong><? echo $condpagto_cliente; ?></strong></font> <font color="#0000FF">
        <input name="operador2" type="hidden" id="operador" value="<? echo $nome_op; ?>">
        <input name="cel_operador2" type="hidden" id="cel_operador2" value="<? echo $celular_op; ?>">
        <input name="email_operador2" type="hidden" id="email_operador2" value="<? echo $email_op; ?>">
        <input name="estabelecimento2" type="hidden" id="estabelecimento2" value="<? echo $estabelecimento_op; ?>">
        <input name="cidade_estabelecimento2" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estabelecimento_op; ?>">
        <input name="tel_estabelecimento2" type="hidden" id="tel_estabelecimento2" value="<? echo $tel_estabelecimento_op; ?>">
        <input name="email_estabelecimento2" type="hidden" id="email_estabelecimento2" value="<? echo $email_estabelecimento_op; ?>">
      </font></strong></td>
    </tr>
  </table>
  <p>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center">ASS:_______________________________________________________</div></td>
    </tr>
  </table>
  <p>
    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</form>
<p></p>
<p></p>
</body>
</html>
