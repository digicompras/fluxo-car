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
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {	font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
.style3 {	color: #000000;
	font-weight: bold;
}
.style4 {
	color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
-->
</style></head>

<body>
<p>        
<?
error_reporting(E_ALL && NOTICE);

require '../../conect/conect.php';
ini_set( 'display_errors', 0 );

?>

</p>
<form name="form1" method="post" action="escolha_de_categoria.php">
  <input type="submit" name="Submit" value="Voltar">
  <span class="style1">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  </span>
</form>
<p>
  <?
$nome_produto = $_POST['nome_produto'];


$sql = "SELECT * FROM produtos where nome_produto = '$nome_produto' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);


$codigo = $linha[11];
}
?>

<?
if($registros==0){

$foto = $_FILES['foto']['name'];
$foto2 = $_FILES['foto2']['name'];
//$foto3 = $_FILES['foto3']['name'];
//$foto4 = $_FILES['foto4']['name'];


$uploaddir = '../../fotos_produtos/';
$uploadfile = $uploaddir. $_FILES['foto']['name'];

if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir . $_FILES['foto']['name'])){
echo "Foto Nº 1 enviada com sucesso!";
} else {
echo "Foto Nº1 não foi enviada! Essa é obrigatória";
}


  
$uploaddir = '../../fotos_produtos/';
$uploadfile = $uploaddir. $_FILES['foto2']['name'];

if(move_uploaded_file($_FILES['foto2']['tmp_name'], $uploaddir . $_FILES['foto2']['name'])){
echo "Foto Nº 2 enviada com sucesso!";
} else {
echo "Foto Nº 2 não foi enviada!";
}

  
//$uploaddir = '../../imagens3/';
//$uploadfile = $uploaddir. $_FILES['foto3']['name'];

//if(move_uploaded_file($_FILES['foto3']['tmp_name'], $uploaddir . $_FILES['foto3']['name'])){
//echo "Foto Nº 3 enviada com sucesso!";
//} else {
//echo "Foto Nº 3 não foi enviada!";
//}

  
//$uploaddir = '../../imagens4/';
//$uploadfile = $uploaddir. $_FILES['foto4']['name'];

//if(move_uploaded_file($_FILES['foto4']['tmp_name'], $uploaddir . $_FILES['foto4']['name'])){
//echo "Foto Nº 4 enviada com sucesso!";
//} else {
//echo "Foto Nº 4 não foi enviada!";
//}

$categoria = $_POST['categoria'];

$classe = $_POST['classe'];

$departamento = $_POST['departamento'];


if($categoria=="COLCHOES"){
$travesseiro1 = $_POST['travesseiro1'];
$travesseiro2 = $_POST['travesseiro2'];




$sql2 = "SELECT * FROM produtos where nome_produto = '$travesseiro1'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$registros = mysql_num_rows($res2);


$preco_travesseiro1 = $linha[7];
}




$sql3 = "SELECT * FROM produtos where nome_produto = '$travesseiro2'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registros = mysql_num_rows($res3);


$preco_travesseiro2 = $linha[7];
}

$total_preco_travesseiros = bcadd($preco_travesseiro1,$preco_travesseiro2,2);
}



$cod_barras = $_POST['cod_barras'];
$referencia = $_POST['referencia'];

$material = $_POST['material'];
$cor = $_POST['cor'];
$sub_categoria = $_POST['sub_categoria'];
$descricao = $_POST['descricao'];
$descontomaximo = $_POST['descontomaximo'];

$quant_estoque = $_POST['quant_estoque'];
$expedicao = $_POST['expedicao'];
$quant_disponivel = $_POST['quant_disponivel'];
$quant_minima = $_POST['quant_minima'];
$aparecer_site = $_POST['aparecer_site'];
$preco_compra = $_POST['preco_compra'];
$frete = $_POST['frete'];
$frete_decimal = $frete/100;

$margem_folga = $_POST['margem_folga'];
$preco = $_POST['preco'];

$data = $_POST['data'];
$hora = $_POST['hora'];

$fornecedor = $_POST['fornecedor'];



$comando = "insert into produtos(cod_barras,referencia,foto,foto2,material,cor,categoria,sub_categoria,descricao,preco,oferta,preco_oferta,data,hora,quant_estoque,expedicao,quant_disponivel,quant_minima,aparecer_site,preco_compra,frete,margem_lucro,impostos,margem_lucro_informada,impostos_informado,nome_produto,fornecedor,travesseiro1,travesseiro2,margem_folga, margem_folga_decimal,descontomaximo,classe,departamento) 
values('$cod_barras','$referencia','$foto','$foto2','$material','$cor','$categoria','$sub_categoria','$descricao','$preco','$oferta','$preco_oferta','$data','$hora','$quant_estoque','$expedicao','$quant_disponivel','$quant_minima','$aparecer_site','$preco_compra','$frete','$margem_lucro_decimal','$impostos_decimal','$margem_lucro','$impostos','$nome_produto','$fornecedor','$travesseiro1','$travesseiro2','$margem_folga','$margem_folga_decimal','$descontomaximo','$classe','$departamento')";

mysql_query($comando,$conexao) or die("Erro ao gravar dados");


echo "Produto inserido no banco de dados com sucesso<br><br>";

}
else{
?>
<span class="style4">
<?
echo "ATENÇÃO!!!... JÁ EXISTE $registros registro(s) DESSE PRODUTO..... VOCÊ PODE ALTERÁ-LO CASO DESEJE.";
}
?>
</span><?
if($registros==1){
$sql = "SELECT * FROM produtos where codigo = '$codigo' limit 1";
}
else{
$sql = "SELECT * FROM produtos order by codigo desc limit 1";
}
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

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



?>
</p>
<form name="form2" method="post" action="grava_editar_produtos.php">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td width="17%"><span class="style3">C&oacute;digo</span></td>
      <td><span class="style3">
        <?
echo $codigo;
?>
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
</span></td>
      <td>Fornecedor</td>
      <td><select name="fornecedor" id="fornecedor">
        <option selected><? echo $fornecedor; ?></option>
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
          <input name="expedicao" type="hidden" id="expedicao" value="<? echo $expedicao; ?>">
          <input name="quant_disponivel" type="hidden" id="quant_disponivel" value="<? echo $quant_disponivel; ?>">
      </span></td>
    </tr>
    <tr>
      <td><span class="style3">C&oacute;digo Barras </span></td>
      <td><input name="cod_barras" type="text" id="cod_barras2" value="<? echo $cod_barras; ?>"></td>
      <td>Referencia</td>
      <td><input name="referencia" type="text" id="referencia" value="<? echo $referencia; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Nome do Produto </strong></td>
      <td><input name="nome_produto" type="text" id="nome_produto" value="<? echo $nome_produto; ?>" size="40"></td>
      <td><strong>Frete</strong></td>
      <td><span class="style3">
        <input name="frete" type="text" id="frete2" value="<? echo $frete; ?>">
      </span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Foto 1 </span></td>
      <td width="25%"><span class="style3">
        <?
	  printf("<img src='../../fotos_produtos/$foto' border='0' width='80' >");
	  ?>
      </span></td>
      <td width="13%">Foto 2</td>
      <td width="19%"><span class="style3">
        <?
	  printf("<img src='../../fotos_produtos/$foto2' border='0' width='80' >");
	  ?>
      </span></td>
      <td width="26%"><span class="style3">
      </span></td>
    </tr>
    <tr>
      <td><span class="style3">Categoria</span></td>
      <td><span class="style3">
        <select name="categoria" id="select">
          <option selected><? echo $categoria;  ?></option>
          <?


    $sql = "select * from categorias where categoria = '$categoria' order by sub_categoria";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>";
    }
?>
        </select>
      </span></td>
      <td><? if($categoria=="COLCHOES"){ echo"Travesseiros a incluir"; } ?></td>
      <td><? if($categoria=="COLCHOES"){ 
echo"<select name='travesseiro1' id='travesseiro1'>";
echo "<option selected>$travesseiro1</option>";
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
      <td><span class="style3">Quantidade em estoque</span></td>
      <td><span class="style3">
        <input name="quant_estoque" type="text" id="quant_estoque" value="<?  echo $quant_estoque; ?>">
      </span></td>
      <td><? if($categoria=="COLCHOES"){ echo"Travesseiros a incluir"; } ?></td>
      <td><? if($categoria=="COLCHOES"){ 
echo"<select name='travesseiro2' id='travesseiro2'>";
echo "<option selected>$travesseiro2</option>";

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
      <td><span class="style3">Pre&ccedil;o de compra</span></td>
      <td><span class="style3">
        <input name="preco_compra" type="text" id="preco_compra2" value="<? echo $preco_compra; ?>">
      </span></td>
      <td><span class="style3">Quant Minima</span></td>
      <td><span class="style3">
        <input name="quant_minima" type="text" id="quant_minima3" value="<? echo $quant_minima; ?>">
      </span></td>
      <td><span class="style3">
      </span></td>
    </tr>
    <tr>
      <td><span class="style3">Margem de Contribui&ccedil;&atilde;o</span></td>
      <td><span class="style3">
        <input name="margem_lucro" type="text" id="margem_lucro2" value="<? echo $margem_lucro_informada; ?>" size="10" maxlength="10">
      </span></td>
      <td><strong>Total de Impostos</strong></td>
      <td><span class="style3">
        <input name="impostos" type="text" id="impostos2" value="<? echo $impostos_informado; ?>">
      </span></td>
      <td><span class="style3">
      </span></td>
    </tr>
    <tr>
      <td><strong>Margem de Folga</strong></td>
      <td><input name="margem_folga" type="text" id="margem_folga" value="<? echo $margem_folga; ?>" size="10" maxlength="10"></td>
      <td><span class="style3">Pre&ccedil;o de venda</span></td>
      <td><input name="preco" type="text" id="preco2" value="<? echo $preco; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Est&aacute; em Oferta? </span></td>
      <td><span class="style3">
        <select name="oferta" id="select12">
          <option selected>
            <?  echo $oferta;  ?>
          </option>
          <option>Sim</option>
          <option>N&atilde;o</option>
        </select>
      </span></td>
      <td><span class="style3">Pre&ccedil;o de Oferta</span></td>
      <td><input name="preco_oferta" type="text" id="preco_oferta" value="<? echo $preco_oferta; ?>"></td>
      <td><span class="style3">
      </span></td>
    </tr>
    <tr>
      <td><span class="style3">Vai para o site?</span></td>
      <td><span class="style3">
        <select name="aparecer_site" id="select11">
          <option selected><? echo $aparecer_site;   ?></option>
          <option>Sim</option>
          <option>N&atilde;o</option>
        </select>
      </span></td>
      <td><strong>Desconto M&aacute;ximo</strong></td>
      <td><input name="descontomaximo" type="text" id="descontomaximo" value="<? echo $descontomaximo; ?>" size="3"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Descri&ccedil;&atilde;o</strong></td>
      <td colspan="4"><textarea name="descricao" id="descricao" cols="45" rows="5"><? echo $descricao; ?></textarea></td>
    </tr>
    <tr>
      <td><span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </span></td>
      <td colspan="4"><input type="submit" name="Submit2" value="Alterar Produto">
          <input type="reset" name="Submit2" value="Limpar"></td>
    </tr>
  </table>
  <? } ?>
</form>
<p>&nbsp;</p>
</body>
</html>

<?
mysql_close($conexao);
?>