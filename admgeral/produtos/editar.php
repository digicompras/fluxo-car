<?php

require '../../conect/conect.php';

/* Define o limitador de cache para 'private' */
$sql = "SELECT * FROM tempoexpiracaosenha limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$tempoexpiracaosenha = $linha['1'];


}


/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em 30 minutos */
session_cache_expire($tempoexpiracaosenha);
$cache_expire = session_cache_expire();

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
<title>Editando Produto</title>
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
-->
</style></head>

<body>
<p>        
<?
error_reporting(E_ALL);
error_reporting( E_ALL ^E_NOTICE );



//-------------------------------------------------------

$codigo = $_POST['codigo'];

$codigoget = $_GET['codigo'];

if(empty($codigo)){
$codigoretorno = $codigoget;
}
else{
$codigoretorno = $codigo;
}


//-------------------------------------------------------

$nome_produto = $_POST['nome_produto'];


?>
</p>
<form name="form1" method="post" action="menu.php">
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

$sql = "SELECT * FROM produtos where codigo = '$codigoretorno' limit 1";
$res = mysql_query($sql);
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
//$codigo = $linha[11];
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

$classe = $linha[38];
$departamento = $linha[39];

}
?>

<?

//-------------------------------------------------------

//$categoria = $_POST['categoria'];

$categoriaget = $_GET['categoria'];

if(empty($categoria)){
$categoriaretorno = $categoriaget;
}
else{
$categoriaretorno = $categoria;
}


//-------------------------------------------------------

//$classe = $_POST['classe'];

$classeget = $_GET['classe'];

if(empty($classe)){
$classeretorno = $classeget;
}
else{
$classeretorno = $classe;
}


//-------------------------------------------------------

//$departamento = $_POST['departamento'];

$departamentoget = $_GET['departamento'];

if(empty($departamento)){
$departamentoretorno = $departamentoget;
}
else{
$departamentoretorno = $departamento;
}


//-------------------------------------------------------




?>

</p>
<table width="100%" border="0">
  <tr>
    <td width="47%"><form action="atualizar_foto.php" method="post" enctype="multipart/form-data" name="form1">
      <table width="99%"  border="0">
        <tr>
          <td width="30%">Selecione a nova foto 1 </td>
          <td width="43%"><input name="foto" type="file" id="foto"></td>
          <td width="27%" rowspan="2"><div align="center">
            <?
	 // printf("<a href='../../fotos_produtos/$foto' target='_blank'><img src='../../fotos_produtos/$foto' border='0' width='80''></a>");
	  ?>
          </div></td>
        </tr>
        <tr>
          <td><input name="codigo" type="hidden" id="codigo" value="<?echo $codigo; ?>">
            <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>"></td>
          <td><input type="submit" name="Submit3" value="Atualizar">
            <span class="style1">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
            </span></td>
        </tr>
      </table>
    </form></td>
    <td width="4%">&nbsp;</td>
    <td width="45%"><form action="atualizar_foto2.php" method="post" enctype="multipart/form-data" name="form1">
      <table width="99%"  border="0">
        <tr>
          <td width="30%">Selecione a nova foto 2 </td>
          <td width="43%"><input name="foto2" type="file" id="foto2"></td>
          <td width="27%" rowspan="2"><div align="center">
            <?
	 // printf("<a href='../../fotos_produtos/$foto2' target='_blank'><img src='../../fotos_produtos/$foto2' border='0' width='80''></a>");
	  ?>
          </div></td>
        </tr>
        <tr>
          <td><input name="codigo" type="hidden" id="codigo" value="<?echo $codigo; ?>">
            <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>"></td>
          <td><input type="submit" name="Submit4" value="Atualizar">
            <span class="style1">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
            </span></td>
        </tr>
      </table>
    </form></td>
    <td width="2%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<form name="form2" method="post" action="grava_editar_produtos.php">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td width="17%"><span class="style3">C&oacute;digo</span></td>
      <td><span class="style3">
        <?
echo $codigoretorno;
?>
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigoretorno; ?>">
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
      <td width="26%">&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Categoria</span></td>
      <td><span class="style3">
        <select name="categoria" id="select">
          <option selected><? echo $categoriaretorno;  ?></option>
          <?


    $sql = "select * from categorias_receitas group by categoria order by categoria";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>";
    }
?>
        </select>
      </span></td>
      <td>Classe</td>
      <td><select name="classe" id="classe">
        <option selected><? echo $classeretorno; ?></option>
        <option>O</option>
        <option>E</option>
      </select></td>
      <td><span class="style3"> </span></td>
    </tr>
    <tr>
      <td>Sub Categoria</td>
      <td><select name="sub_categoria" id="sub_categoria">
        <option selected><? echo "$sub_categoria"; ?></option>
        <?

    $sql = "select * from sub_categorias order by subcategoria asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['subcategoria']."</option>";

    }

?>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Quantidade em estoque</span></td>
      <td><span class="style3">
        <input name="quant_estoque" type="hidden" id="quant_estoque" value="<?  echo $quant_estoque; ?>">
      <? echo $quant_estoque; ?></span></td>
      <td>Departamento</td>
      <td><select name="departamento" id="departamento">
        <option selected>
          <? 
		
		if(($classeretorno=="O") or (empty($classeretorno))){
			
		echo "Todos"; 
		
		}
		else{
			
		echo $departamentoretorno; 
			
		}
		
		
		?>
          </option>
        <?


    $sql = "select * from departamentos where qualificacao = 'R' order by departamento asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['departamento']."</option>";
    }
?>
      </select></td>
      <td><span class="style3"> </span></td>
    </tr>
    <tr>
      <td><span class="style3">Pre&ccedil;o de compra</span></td>
      <td><span class="style3">
        <input name="preco_compra" type="text" id="preco_compra2" value="<? echo $preco_compra; ?>">
        <input name="impostos_compra" type="hidden" id="impostos_compra" value="<? echo $impostos_compra; ?>">
      </span></td>
      <td><span class="style3">Quant Minima</span></td>
      <td><span class="style3">
        <input name="quant_minima" type="text" id="quant_minima3" value="<? echo $quant_minima; ?>">
      </span></td>
      <td><span class="style3"> </span></td>
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
      <td><span class="style3"> </span></td>
    </tr>
    <tr>
      <td><strong>Margem de Folga</strong></td>
      <td><input name="margem_folga" type="text" id="margem_folga" value="<? echo $margem_folga; ?>" size="10" maxlength="10"></td>
      <td><span class="style3">Pre&ccedil;o de Oferta</span></td>
      <td><input name="preco_oferta" type="text" id="preco_oferta" value="<? echo $preco_oferta; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Est&aacute; em Oferta? </span></td>
      <td><span class="style3">
        <select name="oferta" id="oferta">
          <option selected>
            <?  echo $oferta;  ?>
          </option>
          <option>Sim</option>
          <option>N&atilde;o</option>
        </select>
      </span></td>
      <td><span class="style3">Pre&ccedil;o de venda</span></td>
      <td><input name="preco" type="text" id="preco2" value="<? echo $preco; ?>"></td>
      <td><span class="style3"> </span></td>
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
      <td><textarea name="descricao" id="descricao" cols="45" rows="5"><? echo $descricao; ?></textarea></td>
      <td>&nbsp;</td>
      <td colspan="2"><span class="style3">
      </span></td>
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
</form>
<p>&nbsp;</p>
</body>
</html>

<?
mysql_close($conexao);
?>
