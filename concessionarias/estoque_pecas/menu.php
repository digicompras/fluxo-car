<?php
/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em minutos */
session_cache_expire(600);
$cache_expire = session_cache_expire();

session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');
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
.style3 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 18px;
}
.style4 {
	color: #FC0509;
	font-weight: bold;
	font-size: 22px;
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
.style31 {color: #000000;
	font-weight: bold;
}
-->
</style>
</head>
	
<?
require '../../conect/conect.php';
include '../../css_menus/modal.css';
include '../../css_menus/modal2.css';

?>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"
	  
	<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>  
	  
	  
	  background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
  <table width="100%" border="0" cellspacing="0">
    <tr>
      <td colspan="7">        <?


$nome_produto_procurar_outras_lojas = $_POST['nome_produto_procurar_outras_lojas'];
$nome_produto = $_POST['nome_produto'];
$part_number = $_POST['part_number'];
$grupo_a_pesquisar = $_POST['grupo_a_pesquisar'];

$senha = $_SESSION['senha']; 
		  
		  
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	$operador_logado = $linha[1];
	
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
	$transferencia_de_estoque = $linha[92];
	$status_e_condicao_da_transferencia_de_estoque = $linha[93];
	
}
		  
$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$empresa_logada = $linha[2];
	$classificacao_logado = $linha[46];
	
$diafechamento = $linha[45];
	$classificacao = $linha[46];
	$cpf_proprietario = $linha[17];
	
}
		  

 ?>
</td>
    </tr>
    <tr>
      <td width="19%"><? //echo "$classificacao"; ?></td>
      <td colspan="6"><strong><font color="#0000FF" size="4">Estoque de pe&ccedil;as</font></strong></td>
    </tr>
    <tr>
      <td><div align="center">
        <form action="../index.php" method="post" name="form1">
          <input class="class01" type=image src="../../imagens/botoes/voltar.png" width="100" height="100" name="Submit" value="Voltar">
          <span class="style1">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
        </form>
      </div></td> 
      <td width="20%"><form name="form2" method="post" action="escolha_de_categoria.php">
        <?
		if($cadastro_de_itens_autorizado=="sim"){
			?>
        <input class="class01" type=image src="../../imagens/botoes/add-item.png" width="100" height="100" name="Submit2" value="Voltar">
        <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      </span>      
        <input name="referencia" type="hidden" id="referencia" value="<? echo "$part_number"; ?>">
        <?
		}
			?>
      </form></td>
      <td width="13%"><form name="form2" method="post" action="menu.php">
        
        <input class="class01" type=image src="../../imagens/botoes/produtos.png" width="100" height="100" name="Submit6" value="Voltar">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span><span class="style31">
        <select class="class02" name="grupo_a_pesquisar" id="grupo_a_pesquisar">
          <option selected><? echo $grupo_a_pesquisar;  ?></option>
          <?


    $sql = "select * from grupo order by grupo";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['grupo']."</option>";
    }
?>
        </select>
        </span>
        
      </form></td>
      <td width="12%"><form action="https://www.youtube.com/watch?v=mIc_44mcac4" method="post" name="form6" target="_blank">
        <input class='class01' type="submit" name="button3" id="button3" value="INSERINDO ITENS NO ESTOQUE">
      </form></td>
      <td width="12%">&nbsp;</td>
      <td width="13%"><form name="form2" method="post" action="entradas/menu.php">
        <?
		if($estoque_entradas_autorizado=="sim..."){
			?>
        <input class='class01' type="submit" name="Submit3" value="Entrada">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
        <?
		}
			?>
      </form></td>
      <td width="11%"><form action="xml/ler_xml.php" method="post" name="form2" target="_blank">
        <?
		if($estoque_entradas_por_xml_autorizado=="sim"){
			
			echo "<input class='class01' type='submit' name='Submit6' value='XML'>";
			?>
       
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
        <?
		}
			?>
      </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
<table width="100%"  border="1" cellspacing="0">
  <tr>
    <td colspan="11"><div align="center"> 
      <strong>
      <?
if(empty($grupo_a_pesquisar)){
if(empty($nome_produto)) {

$sql = "select * from estoque_pecas where estab_pertence = '$estab_pertence' order by nome_produto asc";

}else{	  

$sql = "select * from estoque_pecas where nome_produto like '%$nome_produto%' and estab_pertence = '$estab_pertence' order by nome_produto asc";

}
}
else{
	
	$sql = "select * from estoque_pecas where grupo like '%$grupo_a_pesquisar%' and estab_pertence = '$estab_pertence' order by nome_produto asc";
}


$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);


}

echo "	$produtos_encontrados pe�as encontradas!!!... Digite o nome da pe�a ou parte dela na caixa acima e clique em buscar para executar uma pesquisa por nome.";

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
      <input class='class02' name="nome_produto" type="text" id="nome_produto" value="<? echo $nome_produto; ?>" size="40">
      <input class='class01' type="submit" name="button" id="button" value="Buscar">
    </form></td>
    <td colspan="6"><form name="form5" method="post" action="menu.php">
      <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>Part Number
        <input class='class02' name="part_number" type="text" id="part_number" value="<? echo $part_number; ?>">
      <input class='class01' type="submit" name="button2" id="button2" value="Buscar">
    </form></td>
  </tr>
  <tr>
    <td><div align="center" class="style2">C&oacute;digo</div></td>
    <td><div align="center">Part number</div></td>
    <td><div align="center" class="style2">Nome do Produto </div></td>
    <td align="center" class="style2">Descri&ccedil;&atilde;o</td>
    <td align="center"><span class="style2">Pre&ccedil;o</span></td>
    <td><div align="center" class="style2">Sub-Grupo</div></td>
    <td><div align="center" class="style2">Quant Estoque</div></td>
    <td align="center"><?
		if($inventario_autorizado=="sim"){ echo "Inventario Apura&ccedil;&atilde;o"; }else{ echo "Visuliza��o das outras lojas"; }
										  ?>
										  </td>
   <? if($inventario_autorizado=="sim"){ ?> <td align="center">Diferen&ccedil;a</td><? } ?>
    <td align="center">#</td>
    <td><div align="center" class="style2">Foto</div></td>
  </tr>
  <?
	if(empty($grupo_a_pesquisar)) {
if(empty($nome_produto)) {
	
if(empty($part_number)){

$sql = "select * from estoque_pecas where estab_pertence = '$estab_pertence' order by nome_produto asc";
	
}
else{
	
$sql = "select * from estoque_pecas where referencia like '%$part_number%' and estab_pertence = '$estab_pertence' order by referencia asc";
	
}

}else{
	
$sql = "select * from estoque_pecas where nome_produto like '%$nome_produto%' and estab_pertence = '$estab_pertence' order by nome_produto asc";
		
}
	}
	else{
$sql = "select * from estoque_pecas where grupo like '%$grupo_a_pesquisar%' and estab_pertence = '$estab_pertence' order by nome_produto asc";	
	}

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);

$part_number = $linha[0];
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
$codigo = $linha[11];
$foto2 = $linha[12];
$foto3 = $linha[13];
$foto4 = $linha[14];
$cod_barras = $linha[15];
$quant_estoque = $linha[16];
$expedicao = $linha[17];
$quant_disponivel = $linha[18];
$quant_minima = $linha[19];
$visualizacao_para_outras_lojas = $linha[20];
$preco_compra = $linha[21];
$frete = $linha[22];
$margem_lucro = $linha[23];
$impostos = $linha[24];
$margem_lucro_informada = $linha[25];
$impostos_informado = $linha[26];
$nome_produto = $linha[27];
$fornecedor = $linha[28];
	$classe = $linha[38];
	$departamento = $linha[39];

	$comissao_do_mecanico = $linha[44];
	$descontomaximo = $linha[34];

?>
  <tr>
    <td width="11%"><form name="form1" method="post" action="editar.php">
      <div align="center">
        <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo; ?>">
        <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo $nome_produto; ?>">
        <?
		if($estoque_autorizado=="sim"){
			?>
        <?
		if($editar_produtos=="sim"){
			?>
        <input class='class01' type=image src="../../imagens/botoes/editar.png" width="100" height="100" name="Submit5" value="Editar Produtos">
        <? } ?>
        <? echo "$codigo"; ?>
        <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
        <?
		}
			?>
      </div>
    </form></td>
    <td width="12%"><div align="center">
		<?
		$aux = '../../qrcode/qr_img0.50j/php/qr_img.php?';
			$aux .= "d=$part_number&";
			$aux .= 'e=H&';
			$aux .= 's=4&';
			$aux .= 't=J';
		?>
        <span style="float: left; border: 1px solid #000;"><a href='etiqueta_do_produto.php?referencia=<? echo "$part_number"; ?>' target='_blank'><img src="<?php echo $aux; ?>"></a><br>
		</span></div></td>
    <td width="22%"><div align="center"><form name="form3" method="post" action="menu.php#estoquefiliais">
				  
                <input name="nome_produto_procurar_outras_lojas" type="hidden" id="nome_produto_procurar_outras_lojas" value="<? echo $nome_produto; ?>">
		<? if($transferencia_de_estoque=="sim" ){ ?>
          <input class="class01" type="submit" name="submit" id="submit" value="<? echo $nome_produto; ?>">
		<? }else{ echo $nome_produto; } ?>
              </form></div></td>
    <td width="16%" align="center"><? echo $descricao; ?></td>
    <td width="16%" align="center"><? if($oferta=="Sim"){ echo "<S>R$ $preco</S><br><b><FONT size='+2' COLOR='#F80000'> OFERTA<br>R$ $preco_oferta</FONT></b>"; }else{ echo "<b>R$ $preco</b>"; } ?></td>
    <td width="9%"><div align="center"><? echo $sub_grupo; ?></div></td>
    <td width="9%"><div align="center"><? echo $quant_estoque; ?></div></td>
    <td width="12%" align="center"><form name="form2" method="post" action="inventario/entrada.php">
		<?
	if($inventario_autorizado=="sim"){
		$sql2 = "select * from inventario_entrada where part_number = '$part_number'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$produtos_encontrados_no_inventario = mysql_num_rows($res2);

$quantidade_inventario = $linha[9];
	
	if($produtos_encontrados_no_inventario<=0){
		echo "Aguardando<br>Apura��o";
	}
	else{
		echo "$quantidade_inventario";
		
	}
		
}
	}
	?>
      <input name="referencia" type="hidden" id="referencia" value="<? echo "$referencia"; ?>">
      <input name="fornecedor" type="hidden" id="fornecedor" value="<? echo "$fornecedor"; ?>">
      <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo "$nome_produto"; ?>">
		<?
		if($inventario_autorizado=="sim"){
			?>
		<?
	if($produtos_encontrados_no_inventario<=0){
      echo "<input class='class01' type='submit' name='Submit6' value='Inventariar'>";
	}
		 
		}
	else{
		echo "$visualizacao_para_outras_lojas";
	}
			?>
      <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
	

?>
        </span>
    </form></td>
     <? if($inventario_autorizado=="sim"){ ?> <td width="12%" align="center"><? 
	
		
		$calcula_diferenca = bcsub($quant_estoque,$quantidade_inventario); echo "$calcula_diferenca";
		
	
		?></td><? } ?>
    <td width="12%" align="center"><form name="form2" method="post" action="entradas/entrada.php">
      <input name="referencia" type="hidden" id="referencia" value="<? echo "$referencia"; ?>">
      <input name="fornecedor" type="hidden" id="fornecedor" value="<? echo "$fornecedor"; ?>">
      <input name="nome_produto" type="hidden" id="nome_produto" value="<? echo "$nome_produto"; ?>">
      <?
		if($quantitativo_do_item_no_estoque=="sim"){
			?>
      <input class="class01" type=image src="../../imagens/botoes/entrada-item.png" width="100" height="100" name="Submit4" value="Voltar">
      <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
		}
			?>
        </span>
    </form></td>
    <td width="12%"><div align="center"><span class="style3">
      
	<? echo "<a href='fotos_produtos/$foto' target='_blank'><img src='fotos_produtos/$foto' border='0' width='80' height='80' ></a>"; ?>
	  
    </span></div></td>
  </tr>
  <? } ?>
</table>
<p></p>
	
    <table width="100%" border="0">
      <tbody>
        <tr>
          <th width="57%" scope="col">&nbsp;</th>
          <th width="39%" scope="col">&nbsp;</th>
          <th width="1%" scope="col">&nbsp;</th>
          <th width="1%" scope="col">&nbsp;</th>
          <th width="2%" scope="col">&nbsp;</th>
        </tr>
        <tr>
          <th scope="row"><div id="estoquefiliais" class="modal2" role="dialog" style="overflow:  width: 640px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
				<?
$sql4 = "SELECT * FROM estabelecimentos where nfantasia <> '$empresa_logada' and cpf = '$cpf_proprietario' and classificacao <> '$classificacao_logado' group by nfantasia order by classificacao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$estab_pertence_filial = $linha[2];
	$cidade_pertence_filial = $linha[10];
	$classificacao_filial = $linha[46];
	
	
$sql7 = "SELECT * FROM operadores where estab_pertence = '$estab_pertence_filial' and ( funcao = 'Gerente' or funcao = 'ADMINISTRATIVO'  ) group by estab_pertence";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {


$nome = $linha[1];

				?>
                <tr>
                  <td valign="top" background="../../imagens_sistema/fundocelulas2.png"><span class="style3"><? echo "$classificacao_filial"; ?></span></td>
                  <td colspan="2" align="center" background="../../imagens_sistema/fundocelulas2.png"><span class="style3"><? echo "$estab_pertence_filial"; ?></span></td>
                  <td align="right" background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
                  <td align="center" background="../../imagens_sistema/fundocelulas2.png"><span class="style3"><? echo "$cidade_pertence_filial"; ?></span></td>
                  <td align="center" background="../../imagens_sistema/fundocelulas2.png">#</td>
                </tr>
				
				
<?
	
$sql3 = "select * from estoque_pecas where nome_produto = '$nome_produto_procurar_outras_lojas' and estab_pertence = '$estab_pertence_filial' order by nome_produto asc";
$res3 = mysql_query($sql3);
	$produtos_encontrados_em_outras_lojas = mysql_num_rows($res3);
while($linha=mysql_fetch_row($res3)) {


$part_number = $linha[0];
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
//$operador = $linha[40];

	

?>
				
              <tr>
                <td width="11%" align="center" background="../../imagens_sistema/fundocelulas1.png"><span class="style3"><? echo "$codigo"; ?></span></td>
                <td width="22%"  background="../../imagens_sistema/fundocelulas1.png"><div align="center"><span class="style3"><? echo $nome_produto; ?></span></div></td>
                <td width="22%" align="center" background="../../imagens_sistema/fundocelulas1.png"><span class="style3"><? echo $descricao; ?></span></td>
                <td width="22%" align="center" background="../../imagens_sistema/fundocelulas1.png"><span class="style3">
                <? if($oferta=="Sim"){ echo "<S>R$ $preco</S><br><b><FONT size='+2' COLOR='#F80000'> OFERTA<br>R$ $preco_oferta</FONT></b>"; }else{ echo "<b>R$ $preco</b>"; } ?>    
                </span></td>
                <td width="22%" align="center" background="../../imagens_sistema/fundocelulas1.png"><span class="style3"><? if($quant_estoque==0){ echo "<span class='style4'>Esgotado!...</span>"; }else{ echo $quant_estoque; }  ?></span></td>
                <td width="22%" align="center" background="../../imagens_sistema/fundocelulas1.png"><form name="form4" method="post" action="estoque_trans/orcamento.php">
                  <span class="style1">
                  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
	

?>
                  </span>
                  <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "abrir_orcamento"; ?>">
                  <input name="estab_pertence_solicitado" type="hidden" id="estab_pertence_solicitado" value="<? echo "$estab_pertence_filial"; ?>">
                  <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo "$estab_pertence"; ?>">
                  <input name="cod_barras" type="hidden" id="cod_barras" value="<? echo "$cod_barras"; ?>">
                  <input name="additem" type="hidden" id="additem" value="sim">
                  <input name="item" type="hidden" id="item" value="<? echo "$nome_produto"; ?>">
                  <strong><font color="#0000FF">
                  <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
                  </font></strong>
<input class="class01" type="submit" name="submit2" id="submit2" value="Solicitar Transferencis">
                </form></td>
              </tr>
              <tr>
                <td align="center">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
              </tr>
	
				
				
  <? } ?>
					
					</td>
                  <td width="11%"></td>
                  </tr>
			  <? if(($produtos_encontrados_em_outras_lojas<=0) or empty($produtos_encontrados_em_outras_lojas) ){ echo "<tr><td colspan='5'><span class='style4'>Item nao encontrado!!!... Provelmente essa unidade nao trabalha com esse tiem!!!...<br></span></td></tr>"; } ?>
			  
				<?  } } ?>
              </tbody>
            </table>
          </div></th>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row">&nbsp;</th>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row">&nbsp;</th>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row">&nbsp;</th>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
     
    </table>
</body>
</html>
