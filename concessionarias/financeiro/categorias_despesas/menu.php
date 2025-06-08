<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

$senha = $_SESSION['senha'];
?>

<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
	
	    <?
//SE CONECTA AO BANCO DE DADOS DIGICOMPRAS
require '../../../conect/conect.php';
include '../../../css_menus/modal.css';
include '../../../css_menus/modal2.css';
?>
<?
$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$db = $linha[1];

}	
?>
<?
	
$sql50 = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res50 = mysql_query($sql50);
while($linha=mysql_fetch_row($res50)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[15];
	
$funcao = $linha[43];
$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$obra_operador = $linha[50];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];

$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$fornecedores = $linha[66];
$controlekm_autorizado = $linha[75];
$orcamento_autorizado = $linha[76];
$permissao_categoria_de_produtos_autorizado = $linha[77];
	
$recebenotificacao = $linha[49];
	$iniciar_rdo_diferenciado = $linha[51];
	$estoque = $linha[54];
	$conciliacoes = $linha[55];
	//$despesas = $linha[56];
	//$veiculos = $linha[57];
	//$rdo = $linha[58];
	$rdo_autorizado = $linha[58];
	$avisodepecas = $linha[59];
	$administracartaoponto = $linha[61];
	$relatoriodepecasutilizadas = $linha[65];
	$fornecedores = $linha[66];
	$inventario = $linha[67];
	$estoque_entradas = $linha[68];
	$cadastro_de_itens = $linha[69];
	$alimentacao_rdo = $linha[70];
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
	
}	
?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td colspan="2">
    

</td>
    </tr>
    <tr>
      <td width="26%">
<? 
$solicitacao = $_POST['solicitacao'];
		  
$categoria = $_POST['categoria'];
$codigo = $_POST['codigo'];
		  

if($solicitacao=="gravar"){
	
$sql = "select * from categorias_despesas where estab_pertence = '$estab_pertence' and status = 'ativo' and categoria = '$categoria'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_de_categoria = mysql_num_rows($res);

	
}
	echo $registros_de_categoria;

if($registros_de_categoria>=1){
echo "<script>

alert('Categoria $categoria já se encontra cadastrada!');

window.location = 'menu.php';

</script>";
}
else{

$comando = "insert into categorias_despesas(categoria,status,estab_pertence) values('$categoria','ativo','$estab_pertence')";

mysql_query($comando,$conexao) or die("Erro ao gravar categoria de despesa");
	
	echo "<script>

alert('Categoria $categoria cadastrada com sucesso!');

window.location = 'menu.php';

</script>";
	
}
	
}
		  
if($solicitacao=="salvar"){


$comando = "update `$db`.`categorias_despesas` set `categoria` = '$categoria' where `categorias_despesas`. `codigo` = '$codigo' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao alterar o nome da categoria de despesa");

echo "As novas informações sobre a nomenclatura da categoria de despesa foram alteradas com sucesso";
}
		  ?></td>
      <td width="74%"><strong><font color="#0000FF" size="4">O que deseja fazer com as categorias de despesas?</font></strong></td>
    </tr>
    <tr>
      <td><form name="form4" method="post" action="../../index.php">
        <input class="class01" type="submit" name="Submit4" value="Voltar">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form1" method="post" action="menu.php">
        <input class="class02" name="categoria" type="text" id="categoria">
        <input class="class01" type="submit" name="Submit" value="Inserir">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="gravar">
      </form></td>
    </tr>
  </table>
<p>&nbsp; </p>
<table width="60%" border="0">
  <tr>
    <td>Filtrar por categoria</td>
    <td colspan="2"><form name="form5" method="post" action="menu.php">
      <select class="class02" name="categoria_pesquisar" id="categoria_pesquisar">
        <option selected></option>
        <?


    $sql = "select * from categorias_despesas where estab_pertence = '$estab_pertence' and status = 'ativo' order by categoria asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>";
    }
?>
        </select>
      <input class="class01" type="submit" name="button2" id="button2" value="Buscar">
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?

$categoria_pesquisar = $_POST['categoria_pesquisar'];

$sql = "select * from categorias_despesas where estab_pertence = '$estab_pertence' and status = 'ativo' and categoria = '$categoria_pesquisar' order by categoria asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$quant_categorias_cadatradas = mysql_num_rows($res);

$codigo = $linha{'0'};
$categoria = $linha{'1'};
$status = $linha{'2'};

?>
  <tr>
    <td width="21%"><div align="center">Codigo</div></td>
    <td width="24%"><div align="center">Categoria</div></td>
    <td width="22%"><div align="center">Status</div></td>
    <td width="15%"><div align="center">#</div></td>
    <td width="18%"><div align="center"></div></td>
  </tr>
  <form name="form2" method="post" action="menu.php">
    <tr>
      <td><div align="center"><? echo $codigo; ?>
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
      </div></td>
      <td><div align="center"><? if($solicitacao=="editar"){ 
      echo "<input class='class02' name='categoria' type='text' id='categoria' value='$categoria'>";
		  }else{ echo $categoria; } ?>
      </div></td>
      <td><div align="center"><? echo $status; ?></div></td>
      <td><div align="center">
        <input name="codigo" type="hidden" id="codigo" value="<? echo "$codigo"; ?>">
        <input name="categoria_pesquisar" type="hidden" id="categoria_pesquisar" value="<? echo "$categoria"; ?>">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? if($solicitacao=="editar"){ echo "salvar";}else{ echo "editar"; } ?>">
        <input class="class01" type="submit" name="button" id="button" value="<? if($solicitacao=="editar"){ echo "Salvar"; }else{ echo "Editar"; } ?>">
      </div></td>
      <td><div align="center"></div></td>
    </tr>
  </form>
  <? } ?>
</table>
</body>
</html>
