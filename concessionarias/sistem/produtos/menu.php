<?php
/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em minutos */
session_cache_expire(600);
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
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {	font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
.style2 {	color: #0000FF;
	font-weight: bold;
}
-->
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <table width="100%" border="0" cellspacing="0">
    <tr>
      <td colspan="5">        <?
require '../../conect/conect.php';

include '../../css/botoes.php';
		  
$nome_produto = $_POST['nome_produto'];

 ?>
</td>
    </tr>
    <tr>
      <td width="19%">&nbsp;</td>
      <td colspan="4"><strong><font color="#0000FF" size="4">O que deseja fazer com os produtos?</font></strong></td>
    </tr>
    <tr>
      <td><form action="../index.php" method="post" name="form1" target="_top">
        <input type="submit" name="Submit" value="Voltar ao menu principal">
        <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </span>      </form></td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td width="20%"><form name="form2" method="post" action="escolha_de_categoria.php">
        <input type="submit" name="Submit2" value="Inserir produto ">
        <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>      </form></td>
      <td width="19%"><form name="form3" method="post" action="selecione_categoria e sub_categoria_para_edicao.php">
        <input type="submit" name="Submit3" value="Editar produto ">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      </form></td>
      <td width="19%"><form name="form4" method="post" action="lista_todos_produtos_para_exclusao.php">
        <input type="submit" name="Submit4" value="Excluir produto ">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      </form></td>
      <td width="23%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
<table width="100%"  border="1" cellspacing="0">
  <tr>
    <td colspan="8"><div align="center"> 
      <strong>
      <?

if(empty($nome_produto)) {

$sql = "select * from produtos order by nome_produto asc";

}else{	  

$sql = "select * from produtos where nome_produto like '%$nome_produto%' order by nome_produto asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);


}

echo "	$produtos_encontrados produtos encontrados!!!... Digite o nome do produto ou parte dele na caixa acima e clique em buscar para executar uma pesquisa por nome.";

?></strong></div></td>
  </tr>
  <tr>
    <td>Nome Produto</td>
    <td colspan="4"><form name="form5" method="post" action="menu.php">
      <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      <input name="nome_produto" type="text" id="nome_produto" value="<? echo $nome_produto; ?>" size="40">
      <input type="submit" name="button" id="button" value="Buscar">
    </form></td>
    <td><form action="imprimir_total.php" method="post" name="form1" target="_blank">
      <div align="center">
        <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>">
        <input type="submit" name="Submit6" value="Imprimir">
        <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
      </div>
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="style2">C&oacute;digo</div></td>
    <td><div align="center">Cod Barras</div></td>
    <td><div align="center" class="style2">Nome do Produto </div></td>
    <td align="center"><span class="style2">Sub Categoria</span></td>
    <td><div align="center" class="style2">Pre&ccedil;o</div></td>
    <td><div align="center" class="style2">Fornecedor</div></td>
    <td><div align="center" class="style2">Quant Estoque</div></td>
    <td><div align="center" class="style2">Operador</div></td>
  </tr>
  <?
if(empty($nome_produto)) {

$sql = "select * from produtos order by nome_produto asc";

}else{	  

$sql = "select * from produtos where nome_produto like '%$nome_produto%' order by nome_produto asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);


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
$operador = $linha[40];

?>
  <tr>
    <td width="11%"><form name="form1" method="post" action="editar.php">
      <div align="center">
        <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo; ?>">
        <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>">
        <input type="submit" name="Submit5" value="<? echo $codigo; ?>">
        <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
      </div>
    </form></td>
    <td width="12%"><div align="center"><? echo $cod_barras; ?></div></td>
    <td width="22%"><div align="center"><? echo $nome_produto; ?></div></td>
    <td width="16%" align="center"><? echo $sub_categoria; ?></td>
    <td width="9%"><div align="center">
      <? 
	
	if($oferta=="Sim"){

echo "R$ $preco_oferta";

}
else{
	
echo "R$ $preco";
	
}
	
	
	 ?>
    </div></td>
    <td width="9%"><div align="center"><? echo $fornecedor; ?></div></td>
    <td width="9%"><div align="center"><? echo $quant_estoque; ?></div></td>
    <td width="12%"><div align="center"><? echo $operador; ?></div></td>
  </tr>
  <? } ?>
</table>
<p>&nbsp;</p>
</body>
</html>
