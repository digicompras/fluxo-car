<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

require '../../../conect/conect.php';
include '../../../css/botoes.php';

?>

<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {	font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
.style3 {
	color: #000000;
	font-weight: bold;
}
.class01 {font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}
-->
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"
	  
	<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>  
	  
	  
	  background="../../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
<form name="form2" method="post" action="../menu.php">
  <input class="class01" type=image src="../../../imagens/botoes/voltar.png" width="100" height="100" name="Submit2" value="Voltar">
  <span class="style1">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  </span>
</form>
<form action="gravar.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td width="15%">&nbsp;</td>
      <td colspan="4">

<?

		  
$senha = $_SESSION['senha'];
		  
$sql = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_operador = $linha[0];

$operador = $linha[1];

$estab_pertence = $linha[44];
}

?>


<?
$fornecedor = $_POST['fornecedor'];
$nome_produto = $_POST['nome_produto'];
$referencia = $_POST['referencia'];
$preco_compra = $_POST['preco_compra'];
		  
$nf = $_POST['nf'];
$dia_nf = $_POST['dia_nf'];
$mes_nf = $_POST['mes_nf'];
$ano_nf = $_POST['ano_nf'];
?>


<br>
<strong><font color="#0000FF" size="4">Entrada  de produtos no estoque!
<input name="data" type="hidden" id="data" value="<? echo date ('Y-m-d'); ?>">
<input name="hora" type="hidden" id="hora" value="<? echo date ('H:i:s'); ?>">
</font></strong></td>
    <tr>
      <td><strong>Fornecedor</strong></td>
      <td><input name="fornecedor" type="hidden" id="fornecedor" value="<? echo $fornecedor; ?>"><? echo $fornecedor; ?></td>
      <td><strong>Nome do Produto </strong></td>
      <td><select class='class02' name="nome_produto" id="nome_produto">
        <option selected><? echo "$nome_produto"; ?></option>
        <?

    $sql = "select * from estoque_pecas where nome_produto = '$nome_produto' and fornecedor = '$fornecedor' and estab_petence = '$estab_pertence' order by nome_produto asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome_produto']."</option>";

    }

?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3"><strong>N&ordm; NF</strong></span></td>
      <td><input name="nf" type="text" class='class02' id="nf" value="<? echo "$nf"; ?>"></td>
      <td><strong>Part Number</strong></td>
      <td><? echo $referencia; ?>
      <input name="referencia" type="hidden" id="referencia" value="<? echo "$referencia"; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Unidade</strong></td>
      <td><select class='class02' name="unidade" id="unidade">
        <option selected>P&Ccedil;</option>
        <option>KG</option>
        <option>LT</option>
      </select></td>
      <td><span class="style3">Data NF</span></td>
      <td><select class='class02' name="dia_nf" id="dia_nf">
		  <option selected><? if(empty($dia_nf)){}else{ echo "$dia_nf"; } ?></option>
        <option>01</option>
        <option>02</option>
        <option>03</option>
        <option>04</option>
        <option>05</option>
        <option>06</option>
        <option>07</option>
        <option>08</option>
        <option>09</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
        <option>13</option>
        <option>14</option>
        <option>15</option>
        <option>16</option>
        <option>17</option>
        <option>18</option>
        <option>19</option>
        <option>20</option>
        <option>21</option>
        <option>22</option>
        <option>23</option>
        <option>24</option>
        <option>25</option>
        <option>26</option>
        <option>27</option>
        <option>28</option>
        <option>29</option>
        <option>30</option>
        <option>31</option>
      </select>
        <select class='class02' name="mes_nf" id="mes_nf">
			<option selected><? if(empty($mes_nf)){}else{ echo "$mes_nf"; } ?></option>
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
        </select>
        <select class='class02' name="ano_nf" id="ano_nf">
          <option>
            <? 
$ano_anterior = date('Y')-1;
		  
		  echo "$ano_anterior"; ?>
          </option>
          <option selected>
            <?
$ano_atual = date('Y');
$proximo_ano = bcadd($ano_atual,1);
			  
if(empty($ano_nf)){ echo "$ano_atual"; }else{ echo "$ano_nf"; }

	  ?>
          </option>
          <option><? echo "$proximo_ano"; ?></option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><span class="style3">Pre&ccedil;o de compra</span></td>
      <td width="24%"><span class="style3">
        <input name="preco_compra_atual" type="text" class='class02' id="preco_compra_atual" value="<? echo "$preco_compra"; ?>">
      </span></td>
      <td width="11%"><strong>Quantidade</strong></td>
      <td width="29%"><span class="style3">
        <input class='class02' name="quantidade" type="text" id="quantidade">
      </span></td>
      <td width="21%">&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Observa&ccedil;&otilde;es</strong></td>
      <td colspan="4"><textarea class='class02' name="obs" id="obs" cols="45" rows="5"></textarea></td>
    </tr>
    <tr> 
      <td><span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </span></td>
      <td colspan="4"><input class='class01' type="submit" name="Submit" value="Salvar"></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</body>
</html>
