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

ini_set('default_charset','UTF8_general_mysql500_ci');

error_reporting(E_ALL);
error_reporting( E_ALL ^E_NOTICE );

require '../../conect/conect.php';
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

<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
<p>        
<?


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
  <input class="class01" type="submit" name="Submit" value="Voltar">
  <span class="style1">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  </span>
</form>
<p>

<?
	
$senha = $_SESSION['senha']; 
		  
		  
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$obra_operador = $linha[50];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];
$rdo_autorizado = $linha[58];
$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$inventario_autorizado = $linha[67];
$estoque_entradas_autorizado = $linha[68];
$cadastro_de_itens_autorizado = $linha[69];
$estoque_entradas_por_xml_autorizado = $linha[71];
	$veiculodaempresa = $linha[72];
	$controlekm = $linha[75];
	$orcamento = $linha[76];
	$permissao_categoria_de_produtos = $linha[77];
	$inclui_mais_uma_nf = $linha[78];
	$financeiro = $linha[79];
	$relatoriodecomissao = $linha[80];
	$registrodeoperadores = $linha[81];
	$abrir_e_fechar_cx = $linha[82];
	$editar_produtos = $linha[83];
	$quantitativo_do_item_no_estoque = $linha[84];
	$categoria_despesas = $linha[85];
	$cadastro_de_contas_bancarias = $linha[86];
	$aliquotas_dos_cartoes = $linha[87];
	$retira_itens_do_orcamento = $linha[89];
}

	
	

$sql = "SELECT * FROM estoque_pecas where codigo = '$codigoretorno' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$referencia = $linha[0];
$foto = $linha[1];
$material = $linha[2];
$cor = $linha[3];
$grupo = $linha[4];
$sub_grupo = $linha[5];
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
	$comissao = $linha[44];

}
?>

<?

//-------------------------------------------------------

//$categoria = $_POST['categoria'];

$grupoget = $_GET['grupo'];

if(empty($grupo)){
$gruporetorno = $grupoget;
}
else{
$gruporetorno = $grupo;
}


//-------------------------------------------------------
	
//$sub_categoria = $_POST['sub_categoria'];

$sub_grupoget = $_GET['sub_grupo'];

if(empty($sub_grupo)){
$sub_gruporetorno = $sub_grupoget;
}
else{
$sub_gruporetorno = $sub_grupo;
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
          <td width="43%"><input class="class02" name="foto" type="file" id="foto"></td>
          <td width="27%" rowspan="2"><div align="center">
            <?
	 // printf("<a href='../../fotos_produtos/$foto' target='_blank'><img src='../../fotos_produtos/$foto' border='0' width='80''></a>");
	  ?>
          </div></td>
        </tr>
        <tr>
          <td><input name="codigo" type="hidden" id="codigo" value="<?echo $codigo; ?>">
            <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>"></td>
          <td><input class="class01" type="submit" name="Submit3" value="Atualizar">
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
          <td width="43%"><input class="class02" name="foto2" type="file" id="foto2"></td>
          <td width="27%" rowspan="2"><div align="center">
            <?
	 // printf("<a href='../../fotos_produtos/$foto2' target='_blank'><img src='../../fotos_produtos/$foto2' border='0' width='80''></a>");
	  ?>
          </div></td>
        </tr>
        <tr>
          <td><input name="codigo" type="hidden" id="codigo" value="<?echo $codigo; ?>">
            <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>"></td>
          <td><input class="class01" type="submit" name="Submit4" value="Atualizar">
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
</table>
<form name="form2" method="post" action="grava_editar_produtos.php">
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="17%"><span class="style3">C&oacute;digo</span></td>
      <td><span class="style3">
        <?
echo $codigoretorno;
?>
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigoretorno; ?>">
      </span></td>
      <td>Fornecedor</td>
      <td><select class="class02" name="fornecedor" id="fornecedor">
        <option selected><? echo $fornecedor; ?></option>
        <?

    $sql = "select * from fornecedores where estab_pertence = '$estab_pertence' order by nfantasia asc";

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
      <td><input class="class02" name="cod_barras" type="text" id="cod_barras2" value="<? echo $cod_barras; ?>"></td>
      <td>Referencia</td>
      <td><input class="class02" name="referencia" type="hidden" id="referencia" value="<? echo $referencia; ?>">
        <span class="style3">
        <?
echo $referencia;
?>
      </span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Nome do Produto </strong></td>
      <td><input class="class02" name="nome_produto" type="text" id="nome_produto" value="<? echo $nome_produto; ?>" size="40"></td>
      <td><strong>Frete</strong></td>
      <td><span class="style3">
        <input class="class02" name="frete" type="text" id="frete2" value="<? echo $frete; ?>">
      </span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Foto 1 </span></td>
      <td width="25%"><span class="style3">
        <?
	  printf("<img src='fotos_produtos/$foto' border='0' width='80' >");
	  ?>
      </span></td>
      <td width="13%">Foto 2</td>
      <td width="19%"><span class="style3">
        <?
	  printf("<img src='fotos_produtos/$foto2' border='0' width='80' >");
	  ?>
      </span></td>
      <td width="26%">&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Grupo</span></td>
      <td><span class="style3">
        <select class="class02" name="grupo" id="grupo">
          <option selected><? echo $gruporetorno;  ?></option>
          <?


    $sql = "select * from grupo order by grupo";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['grupo']."</option>";
    }
?>
        </select>
      </span></td>
      <td>Classe</td>
      <td><select class="class02" name="classe" id="classe">
        <option selected><? echo $classeretorno; ?></option>
        <option>O</option>
        <option>E</option>
      </select></td>
      <td><span class="style3"> </span></td>
    </tr>
    <tr>
      <td>Sub-Grupo</td>
      <td><span class="style3">
        <select class="class02" name="sub_grupo" id="sub_grupo">
          <option selected><? echo $sub_gruporetorno;  ?></option>
          <?


    $sql = "select * from sub_grupo order by sub_grupo";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['sub_grupo']."</option>";
    }
?>
        </select>
      </span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Quantidade em estoque</span></td>
      <td><span class="style3">
		  <? if($quantitativo_do_item_no_estoque=="sim"){ ?>
        <input name="quant_estoque" type="text" class="class02" id="quant_estoque" value="<?  echo $quant_estoque; ?>" size="10">
      <? }else{ ?><input name="quant_estoque" type="hidden" class="class02" id="quant_estoque" value="<?  echo $quant_estoque; ?>" size="10"><? echo $quant_estoque; } ?>
      
      </span></td>
      <td>Departamento</td>
      <td><select class="class02" name="departamento" id="departamento">
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
        <input class="class02" name="preco_compra" type="text" id="preco_compra2" value="<? echo $preco_compra; ?>">
        <input name="impostos_compra" type="hidden" id="impostos_compra" value="<? echo $impostos_compra; ?>">
      </span></td>
      <td><span class="style3">Quant Minima</span></td>
      <td><span class="style3">
        <input class="class02" name="quant_minima" type="text" id="quant_minima3" value="<? echo $quant_minima; ?>">
      </span></td>
      <td><span class="style3"> </span></td>
    </tr>
    <tr>
      <td><span class="style3">Margem de Contribui&ccedil;&atilde;o</span></td>
      <td><span class="style3">
        <input class="class02" name="margem_lucro" type="text" id="margem_lucro2" value="<? echo $margem_lucro_informada; ?>" size="10" maxlength="10">
      </span></td>
      <td><strong>Total de Impostos</strong></td>
      <td><span class="style3">
        <input class="class02" name="impostos" type="text" id="impostos2" value="<? echo $impostos_informado; ?>">
      </span></td>
      <td><span class="style3"> </span></td>
    </tr>
    <tr>
      <td><strong>Margem de Folga</strong></td>
      <td><input class="class02" name="margem_folga" type="text" id="margem_folga" value="<? echo $margem_folga; ?>" size="10" maxlength="10"></td>
      <td><span class="style3">Pre&ccedil;o de Oferta</span></td>
      <td><input class="class02" name="preco_oferta" type="text" id="preco_oferta" value="<? echo $preco_oferta; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Est&aacute; em Oferta? </span></td>
      <td><span class="style3">
        <select class="class02" name="oferta" id="oferta">
          <option selected>
            <?  echo $oferta;  ?>
          </option>
          <option>Sim</option>
          <option>N&atilde;o</option>
        </select>
      </span></td>
      <td><span class="style3">Pre&ccedil;o de venda</span></td>
      <td><input class="class02" name="preco" type="text" id="preco2" value="<? echo $preco; ?>"></td>
      <td><span class="style3"> </span></td>
    </tr>
    <tr>
      <td><span class="style3">Visualiza&ccedil;&atilde;o p/ outras lojas</span></td>
      <td><span class="style3">
        <select class="class02" name="aparecer_site" id="select11">
          <option selected><? echo $aparecer_site;   ?></option>
          <option>Sim</option>
          <option>N&atilde;o</option>
        </select>
      </span></td>
      <td><strong>Desconto M&aacute;ximo</strong></td>
      <td><select class="class02" name="descontomaximo" id="descontomaximo">
		  <option selected>
            <?  echo $descontomaximo;  ?>
          </option>
        <?
	
$sql = "select * from descontomaximo where estab_pertence = '$estab_pertence' group by desconto order by desconto asc";

    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['desconto']."</option>";

    }
?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><strong>Comissao</strong></td>
      <td colspan="2"><select class="class02" name="comissao" id="comissao">
		  <option selected>
            <?  echo $comissao;  ?>
          </option>
        <?
	
$sql = "select * from comissao where estab_pertence = '$estab_pertence' group by percentual order by percentual asc";

    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['percentual']."</option>";

    }
?>
      </select></td>
    </tr>
    <tr>
      <td><strong>Descri&ccedil;&atilde;o</strong></td>
      <td><textarea class="class02" name="descricao" id="descricao" cols="45" rows="5"><? echo $descricao; ?></textarea></td>
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
      <td colspan="4"><input class="class01" type="submit" name="Submit2" value="Salvar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>

<?
mysql_close($conexao);
?>
