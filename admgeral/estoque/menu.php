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
.style2 {	color: #0000FF;
	font-weight: bold;
}
.style3 {color: #000000;
	font-weight: bold;
}
-->
</style>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td colspan="2">        <?
require '../../conect/conect.php';


 ?>
</td>
    </tr>
    <tr>
      <td width="19%">&nbsp;</td>
      <td><strong><font color="#0000FF" size="4">O que deseja fazer no ESTOQUE?</font></strong></td>
    </tr>
    <tr>
      <td><form action="../principal.php" method="post" name="form1" target="_top">
        <input type="submit" name="Submit" value="Voltar ao menu principal">
        <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </span>      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form2" method="post" action="entrada.php">
        <select name="fornecedor" id="fornecedor">
          <option selected>Selecione</option>
          <?





    $sql = "select * from fornecedores order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
        </select>
        <input type="submit" name="Submit2" value="Entrada">
        <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </span>      </form></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form3" method="post" action="selecione_categoria e sub_categoria_para_edicao.php">
        <input type="submit" name="Submit3" value="Saida">
        <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
</span>      
      </form></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td><form name="form4" method="post" action="lista_todos_produtos_para_exclusao.php">
        <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </span>      </form></td>
    </tr>
  </table>
<form action="menu.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="100%"  border="0">
  <?
  
$nome_produto = $_POST['nome_produto'];

$sql = "SELECT * FROM produtos where nome_produto = '$nome_produto' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);




$categoria_cadastrada = $linha[4];

$codigo = $linha[11];

$quant_estoque = $linha[16];


$preco_compra_cadastrado = $linha[21];
$margem_lucro_informada = $linha[25];
$impostos_informado_cadastrado = $linha[26];
$frete_cadastrado = $linha[22];

$travesseiro1 = $linha[29];
$travesseiro2 = $linha[30];

$margem_folga = $linha[32];

}


  ?>
    <tr>
      <td width="26%">Informe o nome ou parte dele para buscar o produto<br></td>
      <td width="21%"><input name="nome_produto" type="text" id="nome_produto" value="<? echo $nome_produto; ?>" size="40"></td>
<td width="53%"><input type="submit" name="Submit3" value="Buscar">
          <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span></td>
    </tr>
  </table>
</form>

<p>&nbsp; </p>

<?
$oferta = $_POST['oferta'];
$preco_oferta = $_POST['preco_oferta'];



  
$data = $_POST['data'];
$hora = $_POST['hora'];

$fornecedor = $_POST['fornecedor'];
$nf = $_POST['nf'];

$dia_nf = $_POST['dia_nf'];
$mes_nf = $_POST['mes_nf'];
$ano_nf = $_POST['ano_nf'];

$data_nf = "$ano_nf-$mes_nf-$dia_nf";

$unidade = $_POST['unidade'];
$quantidade = $_POST['quantidade'];
$preco_compra_atual = $_POST['preco_compra_atual'];
$obs = $_POST['obs'];

$comando = $_POST['comando'];

if($comando=="E"){


if($preco_compra_atual<=$preco_compra_cadastrado){
	
	
	
$comando = "insert into estoque_entrada(codigoproduto,data_entrada,hora_entrada,fornecedor,nf,data_nf,nome_produto,categoria,unidade,quantidade,preco_compra,obs) 
values('$codigo','$data','$hora','$fornecedor','$nf','$data_nf','$nome_produto','$categoria_cadastrada','$unidade','$quantidade','$preco_compra_atual','$obs')";

mysql_query($comando,$conexao) or die("Erro ao gravar entrada no estoque!");


//echo "Entrada no estoque do produto realizada com sucesso!<br><br>";



$totaliza_quantidade = bcadd($quant_estoque,$quantidade);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`produtos` set `codigo` = '$codigo',`quant_estoque` = '$totaliza_quantidade',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta' where `produtos`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao);


	
}

else{
	
$preco_compra = $preco_compra_atual;


$frete_decimal = $frete_cadastrado/100;


if($margem_lucro_informada<="99.99"){
	
$sub_margem_lucro_decimal = bcsub(100,$margem_lucro_informada,4);

}

if($margem_lucro_informada=="100"){
	
	
$sub_margem_lucro_decimal = 50;

}


if($margem_lucro_informada>"100"){
	
$sub_margem_lucro_decimal = bcsub($margem_lucro_informada,100,4);

}



$margem_lucro_decimal = bcdiv($sub_margem_lucro_decimal,100,4);

$impostos_decimal = (100-$impostos_informado_cadastrado)/100;

//--------etapa 1 ------------------

$composicao_preco = $preco_compra+$frete_cadastrado;

$preco_sem_impostos = bcdiv($composicao_preco,$margem_lucro_decimal,2);



//----------fim da etapa 1 ----------------------------

//-----------etapa 2 calculo dos impostos---------------

$calculo_preco_com_impostos = bcdiv($preco_sem_impostos,$impostos_decimal,2);


//----fim da etapa 2 calculo dos impostos--------------------


//--------------etapa 3 calculo margem de perda--------------

$margem_de_perda = bcmul($calculo_preco_com_impostos,0.01,2);

$subtotal_preco = bcadd($calculo_preco_com_impostos,$margem_de_perda,2);



//----------------fim da etapa 3 calculo margem de perda------------


//--------------etapa 4 calculo para margem de desconto---------------


$preco = bcdiv($subtotal_preco,0.80,2);


//----------------fim da etapa 4 calculo para mergem de desconto-----------------





$comando = "insert into estoque_entrada(data_entrada,hora_entrada,fornecedor,nf,data_nf,nome_produto,categoria,unidade,quantidade,preco_compra,obs) 
values('$data','$hora','$fornecedor','$nf','$data_nf','$nome_produto','$categoria_cadastrada','$unidade','$quantidade','$preco_compra','$obs')";

mysql_query($comando,$conexao) or die("Erro ao gravar entrada no estoque!");


echo "Entrada no estoque do produto realizada com sucesso!<br><br>";



$totaliza_quantidade = bcadd($quant_estoque,$quantidade);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`produtos` set `codigo` = '$codigo',`quant_estoque` = '$totaliza_quantidade',`preco_compra` = '$preco_compra',`preco` = '$preco',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta' where `produtos`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao);





}
}
else{
	
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`produtos` set `codigo` = '$codigo',`quant_estoque` = '$quantidade',`preco_compra` = '$preco_compra',`preco` = '$preco',`oferta` = '$oferta',`preco_oferta` = '$preco_oferta' where `produtos`. `codigo` = '$codigo' limit 1 ";
}
mysql_query($comando,$conexao);

	
	
}
?>
</span>

<table width="100%"  border="1">
  <tr>
    <td><div align="center" class="style2">Codigo</div></td>
    <td><div align="center" class="style2">Produto</div></td>
    <td><div align="center" class="style2">Fornecedor</div></td>
    <td class="style2"><div align="center">NF</div></td>
    <td class="style2"><div align="center">Data NF</div></td>
    <td><div align="center" class="style2">Estoque</div></td>
    <td><div align="center" class="style2">Pre&ccedil;o Compra</div></td>
    <td><div align="center" class="style2">Pre&ccedil;o Venda</div></td>
    <td><div align="center" class="style2">Oferta</div></td>
    <td><div align="center" class="style2">Pre&ccedil;o Oferta</div></td>
    <td><div align="center" class="style2"></div></td>
  </tr>
  <?
if(empty($nome_produto)) {
echo "Digite o nome do produto ou parte dele na caixa acima e clique em buscar para executar sua pesquisa.";

}else{	  
$sql = "select * from produtos where nome_produto like '$nome_produto%' order by nome_produto asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


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
<form name="form1" method="post" action="menu.php">
  <tr class="style3">
    <td width="4%">
      <div align="center">
        <? echo $codigo; ?>
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
        <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>">
        <strong><font color="#0000FF" size="4">
        <input name="data" type="hidden" id="data" value="<? echo date ('Y-m-d'); ?>">
        <input name="hora" type="hidden" id="hora" value="<? echo date ('H:i:s'); ?>">
        </font></strong></div>
    </td>
    <td width="24%"><div align="center"><? echo $nome_produto; ?></div></td>
    <td width="8%"><div align="center"><? echo $fornecedor; ?>
      <input name="fornecedor" type="hidden" id="fornecedor" value="<? echo $fornecedor; ?>">
    </div></td>
    <td width="5%" class="style2"><div align="center">
      <input name="nf" type="text" id="nf" size="4">
    </div></td>
    <td width="14%" class="style2"><div align="center">
      <select name="dia_nf" id="dia_nf">
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
      <select name="mes_nf" id="mes_nf">
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
      <select name="ano_nf" id="ano_nf">
        <option>
          <? 
$ano_anterior = date('Y')-1;
		  
		  echo "$ano_anterior"; ?>
          </option>
        <option selected>
          <?
$ano_atual = date('Y');
$proximo_ano = bcadd($ano_atual,1);
echo "$ano_atual";

	  ?>
          </option>
        <option><? echo "$proximo_ano"; ?></option>
      </select>
    </div></td>
    <td width="7%"><div align="center">
<?  echo $quant_estoque; ?>
<input name="quantidade" type="text" id="quantidade" size="4">
<select name="comando" id="comando">
  <option>E</option>
  <option selected>A</option>
</select>
    </div></td>
    <td width="8%"><div align="center">
<input name="preco_compra_atual" type="text" id="preco_compra2" value="<? echo $preco_compra; ?>" size="4">
</div></td>
    <td width="7%"><div align="center">
      <?  echo $preco; ?>
      <input name="preco" type="hidden" id="preco2" value="<? echo $preco; ?>">
    </div></td>
    <td width="6%"><div align="center">
<select name="oferta" id="select12">
  <option selected>
    <?  echo $oferta;  ?>
    </option>
  <option>Sim</option>
  <option>N&atilde;o</option>
</select>
</div></td>
    <td width="7%"><div align="center">
      <input name="preco_oferta" type="text" id="preco_oferta" value="<? echo $preco_oferta; ?>" size="4">
    </div></td>
    <td width="10%"><div align="center">
      <input type="submit" name="Submit4" value="Atualizar">
    </div></td>
  </tr>
</form>  
  <? }} ?>
</table>
</body>
</html>
