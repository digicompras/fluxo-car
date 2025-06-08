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
<form name="form2" method="post" action="escolha_de_categoria.php">
  <input type="submit" name="Submit3" value="Voltar">
  <span class="style1">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  </span>
</form>
<form action="grava_produtos.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td width="15%">&nbsp;</td>
      <td colspan="4">

<?
require '../../conect/conect.php';

?>


<?
$categoria = $_POST['categoria'];
?>


<br>
<strong><font color="#0000FF" size="4">Tela de cadastro de produtos!
<input name="data" type="hidden" id="data" value="<? echo date ('Y-m-d'); ?>">
<input name="hora" type="hidden" id="hora" value="<? echo date ('H:i:s'); ?>">
</font></strong></td>
    <tr>
      <td><span class="style3">C&oacute;digo</span></td>
      <td><span class="style3">
      Ser&aacute; informado ap&oacute;s o cadastro </span></td>
      <td>Fornecedor</td>
      <td><select name="fornecedor" id="fornecedor">
        <option selected>Selecione</option>
        <?





    $sql = "select * from fornecedores order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
      </select></td>
      <td><span class="style3">
        <input name="material" type="hidden" id="material">
        <input name="cor" type="hidden" id="cor">
        <input name="sub_categoria" type="hidden" id="sub_categoria">
        <input name="expedicao" type="hidden" id="expedicao">
      </span></td>
    </tr>
    <tr>
      <td><span class="style3">C&oacute;digo Barras </span></td>
      <td><input name="cod_barras" type="text" id="cod_barras4" size="40"></td>
      <td>Referencia</td>
      <td><input type="text" name="referencia" id="referencia"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Nome do Produto </strong></td>
      <td><input name="nome_produto" type="text" id="nome_produto" size="40"></td>
      <td><strong>Frete</strong></td>
      <td><span class="style3">
        <input name="frete" type="text" id="frete2">
      </span></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><span class="style3">Foto 1 </span></td>
      <td width="24%"><span class="style3">
        <input name="foto" type="file" id="foto">
      </span></td>
      <td width="11%">Foto 2</td>
      <td width="29%"><span class="style3">
        <input name="foto2" type="file" id="foto2">
      </span></td>
      <td width="21%">&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Categoria</span></td>
      <td><span class="style3">
        <?
echo $categoria;
?>
        <input name="categoria" type="hidden" id="categoria2" value="<? echo $categoria; ?>">
      </span></td>
      <td><? if($categoria=="COLCHOES"){ echo"Travesseiros a incluir"; } ?></td>
      <td><? if($categoria=="COLCHOES"){ 
echo"<select name='travesseiro1' id='travesseiro1'>";
    $sql = "select * from produtos where categoria = 'TRAVESSEIROS' order by nome_produto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome_produto']."</option>";
   }
      echo"</select>";

}
  ?></td>
      <td><span class="style3">
      </span></td>
    </tr>
    <tr>
      <td><strong>Calcula preco?</strong></td>
      <td><span class="style3">
        <select name="calculapreco" id="aparecer_site">
          <option>Sim</option>
          <option selected="selected">Nao</option>
        </select>
      </span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Pre&ccedil;o de compra</span></td>
      <td><span class="style3">
        <input name="preco_compra" type="text" id="preco_compra">
      </span></td>
      <td><? if($categoria=="COLCHOES"){ echo"Travesseiros a incluir"; } ?></td>
      <td><? if($categoria=="COLCHOES"){ 
echo"<select name='travesseiro2' id='travesseiro2'>";
    $sql = "select * from produtos where categoria = 'TRAVESSEIROS' order by nome_produto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome_produto']."</option>";
   }
      echo"</select>";

}
  ?></td>
      <td><span class="style3">
      </span></td>
    </tr>
    <tr>
      <td><strong>Impostos Compra</strong></td>
      <td><input type="text" name="impostos_compra" id="impostos_compra"></td>
      <td><strong>Impostos Venda</strong></td>
      <td><span class="style3">
        <input name="impostos" type="text" id="impostos2">
      </span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Margem de Contribui&ccedil;&atilde;o</span></td>
      <td><span class="style3">
        <input name="margem_lucro" type="text" id="margem_lucro" value="1.1" size="10" maxlength="10">
      </span></td>
      <td><span class="style3">Quant Minima </span></td>
      <td><span class="style3">
        <input name="quant_minima" type="text" id="quant_minima">
      </span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Margem de Folga</strong></td>
      <td><input name="margem_folga" type="text" id="margem_folga" value="0" size="10" maxlength="10"></td>
      <td><span class="style3">Pre&ccedil;o de venda</span></td>
      <td><input name="preco" type="text" id="preco"></td>
      <td><span class="style3">
      </span></td>
    </tr>
    <tr> 
      <td><span class="style3">Vai para o site?</span></td>
      <td><span class="style3">
        <select name="aparecer_site" id="select3">
          <option>Sim</option>
          <option selected>N&atilde;o</option>
        </select>
      </span></td>
      <td><span class="style3">Est&aacute; em Oferta?</span></td>
      <td><input name="oferta" type="hidden" id="oferta" value="N&atilde;o"></td>
      <td><span class="style3">
      </span></td>
    </tr>
    <tr>
      <td><span class="style3">Quantidade em estoque </span></td>
      <td><input name="quant_estoque" type="text" id="quant_estoque"></td>
      <td><span class="style3">Pre&ccedil;o de Oferta</span></td>
      <td><input name="preco_oferta" type="hidden" id="preco_oferta" value=""></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Dilui&ccedil;&atilde;o</strong></td>
      <td><input name="diluicao" type="text" id="diluicao"></td>
      <td><strong>Desconto M&aacute;ximo</strong></td>
      <td><input name="descontomaximo" type="text" id="descontomaximo" size="3"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Descri&ccedil;&atilde;o</strong></td>
      <td colspan="4"><textarea name="descricao" id="descricao" cols="45" rows="5"></textarea></td>
    </tr>
    <tr> 
      <td><span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </span></td>
      <td colspan="4"><input type="submit" name="Submit" value="Gravar Produto">
      <input type="reset" name="Submit2" value="Limpar"></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</body>
</html>
