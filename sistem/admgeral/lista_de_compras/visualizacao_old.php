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
<title>orcamentos/pedidos</title>
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
.style5 {
	font-size: 24px;
	font-weight: bold;
}
.style1 {font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
-->
</style>
</head>
<?

require '../../conect/conect.php';


$codigo_orcamento = $_POST['codigo_orcamento'];


$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$condicao = $linha[16];


$status = $linha[17];
$nome = $linha[26];

}


?>


<body>
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
          <td width="37%" valign="middle"><div align="center">          </div></td>
          <td width="27%" height="23">&nbsp;</td>
        </tr>
</table>
<?



$sql = "SELECT * FROM clientes where nome = '$nome'";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo_cliente = $linha[0];

$nome = $linha[1];

$sexo = $linha[2];

$estadocivil = $linha[3];

$cpf = $linha[4];

$rg = $linha[5];

$orgao = $linha[6];

$emissao = $linha[7];

$data_nasc = $linha[8];

$pai = $linha[9];

$mae = $linha[10];

$endereco = $linha[11];

$numero = $linha[12];

$bairro = $linha[13];

$complemento = $linha[14];

$cidade = $linha[15];

$estado = $linha[16];

$cep = $linha[17];

$telefone = $linha[18];

$celular = $linha[19];

$email = $linha[20];

$operador = $linha[21];

$cel_operador = $linha[22];

$email_operador = $linha[23];

$estabelecimento = $linha[24];

$cidade_estabelecimento = $linha[25];

$tel_estabelecimento = $linha[26];

$email_estabelecimento = $linha[27];

$obs = $linha[28];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$dataalteracao = $linha[31];

$horaalteracao = $linha[32];

$operador_alterou = $linha[33];

$cel_operador_alterou = $linha[34];

$email_operador_alterou = $linha[35];

$estabelecimento_alterou = $linha[36];

$cidade_estabelecimento_alterou = $linha[37];

$tel_estabelecimento_alterou = $linha[38];

$email_estabelecimento_alterou = $linha[39];

$tipo = $linha[40];

$banco = $linha[41];

$agencia = $linha[42];

$conta = $linha[43];

$num_beneficio = $linha[44];



$parc1 = $linha[45];

$banco1 = $linha[46];

$vencto1 = $linha[47];

$compra1 = $linha[48];



$parc2 = $linha[49];

$banco2 = $linha[50];

$vencto2 = $linha[51];

$compra2 = $linha[52];



$parc3 = $linha[53];

$banco3 = $linha[54];

$vencto3 = $linha[55];

$compra3 = $linha[56];



$parc4 = $linha[57];

$banco4 = $linha[58];

$vencto4 = $linha[59];

$compra4 = $linha[60];



$parc5 = $linha[61];

$banco5 = $linha[62];

$vencto5 = $linha[63];

$compra5 = $linha[64];



$parc6 = $linha[65];

$banco6 = $linha[66];

$vencto6 = $linha[67];

$compra6 = $linha[68];



$parc7 = $linha[69];

$banco7 = $linha[70];

$vencto7 = $linha[71];

$compra7 = $linha[72];



$num_beneficio2 = $linha[73];

$num_beneficio3 = $linha[74];

$num_beneficio4 = $linha[75];



$dataprev2 = $linha[76];

$obs2 = $linha[77];





$dataprev = $linha[76];

$cpf_rg = $linha[78];

$comp_end = $linha[79];

$comp_quit1 = $linha[80];

$comp_quit2 = $linha[81];

$comp_quit3 = $linha[82];

$comp_quit4 = $linha[83];

$comp_quit5 = $linha[84];

$comp_quit6 = $linha[85];

$comp_renda = $linha[86];

$cpf_rg_testemunha = $linha[87];

$mes_niver = $linha[88];

$status_cliente = $linha[89];

$tem_margem = $linha[90];
$saldo1 = $linha[91];
$saldo2 = $linha[92];
$saldo3 = $linha[93];
$saldo4 = $linha[94];
$saldo5 = $linha[95];
$saldo6 = $linha[96];
$saldo7 = $linha[97];

$local_trabalho = $linha[134];
$fone_comercial = $linha[135];
$newsletter = $linha[136];

}
?>

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
      </table>
      <p>      
<p align="center" class="style5">SITUA&Ccedil;&Atilde;O: <? echo $condicao; ?> N&ordm; <? echo $num_bordero; ?> - Status: <? echo $status; ?></p>


<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];

}


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_gerente = $linha[1];
$email_gerente = $linha[20];
$funcao_gerente = $linha[43];

$cidade_estab_pertence = $linha[45];
$tel_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];

}

	

?>





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
    <form name="form3" method="post" action="orcamento.php">
      <td class="style3"><div align="center"><? echo $categoria;?></div></td>
      <td class="style3"><div align="center"><? echo $preco;?></div></td>
      <td><div align="center" class="style3"><? echo $quant;?></div></td>
      <td><div align="center" class="style3"><? echo $desconto;?></div></td>
      <td><div align="center" class="style3"><? echo $descontomonetario;?></div></td>
      <td><div align="center"><span class="style3"><? echo $total;?></span></div></td>
    </form>
  </tr>
  <?  } ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center" class="style5">Total do <? echo $condicao; ?>:
  <?

$sql = "select sum(total) as total_liquido from produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_liquido = $linha['total_liquido'];

$total_orcamento = bcadd($valor_total_liquido,0,2);

echo "R$ ".$total_orcamento;

?>
</p>
<p>&nbsp;</p>
</body>
</html>
