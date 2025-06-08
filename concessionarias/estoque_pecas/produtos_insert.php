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
?>
<?
require '../../conect/conect.php';


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


$sql = "SELECT * FROM estoque_pecas order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);


$codigo = $linha[11];
}
$codigosugerido = bcadd($codigo,1);

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

<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
<form name="form2" method="post" action="escolha_de_categoria.php">
  <input class="class01" type=image src="../../imagens/botoes/voltar.png" width="100" height="100" name="Submit2" value="Voltar">
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
      <td width="19%">&nbsp;</td>
      <td colspan="4">




<?
$grupo = $_POST['grupo'];
$sub_grupo = $_POST['sub_grupo'];
$referencia = $_POST['referencia'];
$classe = $_POST['classe'];
$departamento = $_POST['departamento'];
		  
$senha = $_SESSION['senha'];

?>

<?
//---------------------VALIDACAO DOS CAMPOS--------------------------------------------------


if((empty($grupo)) or (empty($sub_grupo)) ){ ?>

<script>

alert("ATENÇÃO!!!...\n                  <? echo "$operador"; ?> \n\nCAMPOS COM (*) SÃO OBRIGATORIOS! VERIFIQUE QUAL DOS CAMPOS OBRIGATORIOS ESTA SEM PREENCHER, VOCÊ DEVE PREENCHER TODOS PARA PROSSEGUIR COM O CADASTRO!. \n\n Grupo* --->> <? echo "$grupo"; ?> \n Sub_grupo* --->> <? echo "$sub_grupo"; ?>");

window.location = "escolha_de_categoria.php?categoria=<? echo "$categoria"; ?>&classe=<? echo "$classe"; ?>&departamento=<? echo "$departamento"; ?>";

</script>

<?

}




//-------------------FIM DA VALIDACAO DOS CAMPOS--------------------------------
?>



<br>
<strong><font color="#0000FF" size="4">Tela de cadastro de pecas!
<input name="data" type="hidden" id="data" value="<? echo date ('Y-m-d'); ?>">
<input name="hora" type="hidden" id="hora" value="<? echo date ('H:i:s'); ?>">
</font></strong></td>
    <tr>
      <td><span class="style3">C&oacute;digo</span></td>
      <td><span class="style3">
      Ser&aacute; informado ap&oacute;s o cadastro </span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><span class="style3">
        <input name="material" type="hidden" id="material">
        <input name="cor" type="hidden" id="cor">
        <input name="sub_categoria" type="hidden" id="sub_categoria">
        <input name="expedicao" type="hidden" id="expedicao">
      </span></td>
    </tr>
    <tr>
      <td>Fornecedor</td>
      <td><select class="class02" name="fornecedor" id="fornecedor">
        <option selected>Selecione</option>
        <?

    $sql = "select * from fornecedores where estab_pertence = '$estab_pertence' order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Nome do Produto </strong></td>
      <td><input class="class02" name="nome_produto" type="text" id="nome_produto" size="40"></td>
      <td><strong>Frete</strong></td>
      <td><span class="style3">
        <input class="class02" name="frete" type="text" id="frete2">
      </span></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><span class="style3">Foto 1 </span></td>
      <td width="20%"><span class="style3">
        <input class="class02" name="foto" type="file" id="foto">
      </span></td>
      <td width="11%">Foto 2</td>
      <td width="29%"><span class="style3">
        <input class="class02" name="foto2" type="file" id="foto2">
      </span></td>
      <td width="21%">&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Grupo</span></td>
      <td><span class="style3">
        <?
echo $grupo;
?>
        <input name="grupo" type="hidden" id="grupo" value="<? echo $grupo; ?>">
      </span></td>
      <td>Classe</td>
      <td><span class="style3">
        <?
echo $classe;
?>
        <input name="classe" type="hidden" id="categoria" value="<? echo $classe; ?>">
      </span></td>
      <td><span class="style3">
      </span></td>
    </tr>
    <tr>
      <td>Sub-Grupo</td>
      <td><span class="style3">
        <?
echo $sub_grupo;
?>
        <input name="sub_grupo" type="hidden" id="sub_grupo" value="<? echo $sub_grupo; ?>">
      </span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Pre&ccedil;o de compra</span></td>
      <td><span class="style3">
        <input class="class02" name="preco_compra" type="text" id="preco_compra">
      </span></td>
      <td>Departamento</td>
      <td><span class="style3">
        <?
echo $departamento;
?>
        <input name="departamento" type="hidden" id="departamento" value="<? echo $departamento; ?>">
      </span></td>
      <td><span class="style3">
      </span></td>
    </tr>
    <tr>
      <td><span class="style3">Margem de Contribui&ccedil;&atilde;o</span></td>
      <td><span class="style3">
        <input class="class02" name="margem_lucro" type="text" id="margem_lucro" value="100" size="10" maxlength="10">
      </span></td>
      <td><span class="style3">Quant Minima </span></td>
      <td><span class="style3">
        <input class="class02" name="quant_minima" type="text" id="quant_minima">
      </span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Margem de Folga</strong></td>
      <td><input class="class02" name="margem_folga" type="text" id="margem_folga" value="0" size="10" maxlength="10"></td>
      <td><strong>Total de Impostos</strong></td>
      <td><span class="style3">
        <input class="class02" name="impostos" type="text" id="impostos2">
      </span></td>
      <td><span class="style3">
      </span></td>
    </tr>
    <tr> 
      <td><span class="style3">Est&aacute; em Oferta?</span></td>
      <td><span class="style3">
        <select class="class02" name="oferta" id="select">
          <option>Sim</option>
          <option selected>N&atilde;o</option>
        </select>
      </span></td>
      <td><span class="style3">Pre&ccedil;o de Oferta</span></td>
      <td><input class="class02" name="preco_oferta" type="text" id="preco_oferta"></td>
      <td><span class="style3">
      </span></td>
    </tr>
    <tr>
      <td><span class="style3">Visualiza&ccedil;&atilde;o p/ outras lojas</span></td>
      <td><span class="style3">
        <select class="class02" name="aparecer_site" id="select3">
          <option selected="selected">Sim</option>
          <option>N&atilde;o</option>
        </select>
      </span></td>
      <td><span class="style3">Pre&ccedil;o de venda</span></td>
      <td><input class="class02" name="preco" type="text" id="preco"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><span class="style3">Quantidade em estoque </span></td>
      <td><span class="style3">
        <? if($quantitativo_do_item_no_estoque=="sim"){ ?>
        <input name="quant_estoque" type="text" class="class02" id="quant_estoque" value="<?  echo $quant_estoque; ?>" size="10">
        <? }else{ ?>
        <input name="quant_estoque" type="hidden" class="class02" id="quant_estoque" value="<?  echo $quant_estoque; ?>" size="10">
      <? echo $quant_estoque; } ?> </span></td>
      <td><strong>Desconto M&aacute;ximo</strong></td>
      <td>
        <select class="class02" name="descontomaximo" id="descontomaximo">
          <?
	
$sql = "select * from descontomaximo where estab_pertence = '$estab_pertence' order by desconto asc";

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
      <td><select class="class02" name="comissao" id="comissao">
        <?
	
$sql = "select * from comissao where estab_pertence = '$estab_pertence' order by percentual asc";

    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['percentual']."</option>";

    }
?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Descri&ccedil;&atilde;o</strong></td>
      <td colspan="4"><textarea class="class02" name="descricao" id="descricao" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td><span class="style3">C&oacute;digo Barras </span></td>
      <td colspan="4"><input name="cod_barras" type="text" class="class02" id="cod_barras4" value="<? echo "$codigosugerido"; ?>" size="40">
      <input name="referencia" type="hidden" id="referencia" value="<? echo "$referencia"; ?>"></td>
    </tr>
    <tr> 
      <td><span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </span></td>
      <td colspan="4"><input class="class01" type="submit" name="Submit" value="Salvar"></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</body>
</html>
