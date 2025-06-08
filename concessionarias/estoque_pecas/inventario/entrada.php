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
-->
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form name="form2" method="post" action="../menu.php">
  <input class='class01' type="submit" name="Submit3" value="Voltar">
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
require '../../../conect/conect.php';
include '../../../css/botoes.php';
		  
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
$dia_nf = date('d');
$mes_nf = date('m');
$ano_nf = date('Y');
?>


<br>
<strong><font color="#0000FF" size="4">Saldo  de inventario do produto!
<input name="data" type="hidden" id="data" value="<? echo date ('Y-m-d'); ?>">
<input name="hora" type="hidden" id="hora" value="<? echo date ('H:i:s'); ?>">
</font></strong></td>
    <tr>
      <td><strong>Fornecedor</strong></td>
      <td width="24%"><input name="fornecedor" type="hidden" id="fornecedor" value="<? echo $fornecedor; ?>"><? echo $fornecedor; ?></td>
      <td width="11%"><strong>Nome do Produto </strong></td>
      <td width="29%"><select class='class02' name="nome_produto" id="nome_produto">
        <option selected><? echo "$nome_produto"; ?></option>
        <?

    $sql = "select * from estoque_pecas where fornecedor = '$fornecedor' order by nome_produto asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome_produto']."</option>";

    }

?>
      </select></td>
      <td width="21%">&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Quantidade</strong></td>
      <td><span class="style3">
        <input class='class02' name="quantidade" type="text" id="quantidade">
      </span></td>
      <td><strong>Part Number</strong></td>
      <td><? echo $referencia; ?>
      <input name="referencia" type="hidden" id="referencia" value="<? echo "$referencia"; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><span class="style3">Data</span></td>
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
