<html>

<head>
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Nova pagina 1</title>
<style type="text/css">
<!--
.style1 {color: #0000FF}
.style3 {
	color: #0000FF;
	font-weight: bold;
	font-size: 14px;
}
.style5 {
	color: #FF0000;
	font-weight: bold;
	font-size: 18px;
}
.style8 {color: #000000}
.style10 {font-weight: bold; color: #FF0000;}
.style11 {color: #FF0000}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.botao {	padding-left: 35px;
	float: left;
	middle:77px;
	
	margin:0px;
	padding:0px;
	width: 130px;
	height:25px;
}
.style4 {	font: bold 12px/24px arial, helvetica, sans-aerif;
	padding:0px;

	text-decoration: none;
	text-align:center;

float: left;
	middle:77px;
	background:  url('imagens/botao.png') no-repeat 
center center;
width:130px;
	height:25px;
	display:block;
	color: #FFFFFF;
}
-->
</style>
</head>
<?

require 'conect/conect.php';
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>

background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">
  
<table width="998"  border="0" cellpadding="0">
  <tr>
    <td><p><img src="logo/cabecalho.jpg" width="1020" height="200"><br>
      <img src="imagens/linha_horinzontal.jpg" width="998" height="10"></p></td>
  </tr>
</table>
<table width="998"  border="0">
  <tr>
    <td width="10%"><div align="center"><span class="botao"><a href="index.php" target="_top" class="style4">HOME</a></span></div></td>
    <td width="10%"><div align="center"><span class="botao"><a href="index.php?instrucao=franquia" target="_top" class="style4">Produtos</a></span></div></td>
    <td width="10%"><div align="center"><span class="botao"><a href="index.php?instrucao=aempresa" target="_top" class="style4">A Empresa</a></span></div></td>
    <td width="10%"><div align="center"><span class="botao"><a href="index.php?instrucao=contato" target="_top" class="style4">Fale Conosco</a></span></div></td>
    <td width="10%"><div align="center"><span class="botao"><a href="index.php?instrucao=funcionario" target="_top" class="style4">&Aacute;rea de Vendas</a></span></div></td>
    <td width="10%"><div align="center"><span class="botao"><a href="index.php?instrucao=agencias" target="_top" class="style4">Lojas</a></span></div></td>
    <td width="10%"><div align="center"><span class="botao"><a href="trabalhe_conosco.php" target="_blank" class="style4">Trabalhe Conosco</a></span></div></td>
  </tr>
</table>
<p>
  <? } ?>
  
</p>
<p>
</p>
<p align="left">
  <?
  $vg = $_GET['chamar'];


$codigo = $vg;


	  
$sql = "select * from produtos where codigo = '$codigo' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$foto = $linha[1];
	
$categoria = $linha[4];
$preco = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];

$codigo = $linha[11];
$foto2 = $linha[12];

$quant_disponivel = $linha[18];

$nome_produto = $linha[27];


?> 
</p>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="11%"><form name="form1" method="post" action="index.php">
      <input type="submit" name="Submit" value="Voltar">
      <input name="categoria" type="hidden" id="categoria" value="<? echo $categoria; ?>">
    </form></td>
    <td colspan="4" rowspan="5">
      <iframe name="I1" width="420" height="280" src="branco.htm" border="0" frameborder="0" scrolling="no">
    Seu navegador não oferece suporte para quadros entre linhas ou está configurado no momento para não exibi-los.
    </iframe></td>
    <td><span class="style1"></span></td>
    <td>Refer&ecirc;ncia<span class="style1"><br><? echo $ordem_desc; ?></span></td>
    <td>Categoria<br> 
      <span class="style1"><strong><? echo $categoria; ?> </strong></span> </td>
  </tr>
  <tr>
    <td width="11%"><div align="center"></div></td>
    <td width="2%"><span class="style1"></span></td>
    <td width="22%">Material<br>
      <span class="style1"><? echo $linha[2]; ?></span></td>
    <td width="22%">Cor<br>
    <span class="style1"><? echo $linha[3]; ?></span></td>
  </tr>
  <tr>
    <td width="11%">&nbsp;</td>
    <td>&nbsp;</td>
    <td><span class="style1"><span class="style8"><? if($categoria=="CALCADOS"){echo"Sola";}else{} ?></span></span><br>
          <span class="style1"><? if($categoria=="CALCADOS"){ echo $linha[4];}else{} ?></span>
    </td>
    <td><span class="style8"><? if($categoria=="CALCADOS"){echo"Forro";}else{} ?></span><br>
      <span class="style1"><? if($categoria=="CALCADOS"){echo $linha[5];}else{} ?></span> </td>
  </tr>
  <tr>
    <td width="11%">&nbsp;</td>
    <td>&nbsp;</td>
    <td><span class="style11"><span class="style1"><span class="style8"><? if($categoria=="CALCADOS"){echo"Numeração";}else{} ?></span></span></span><span class="style10"><span class="style1"><br>
          <? if($categoria=="CALCADOS"){ echo $linha[6];}else{} ?></span>
    </span></td>
    <td rowspan="2">Descri&ccedil;&atilde;o<br>
    <span class="style1"><? echo $linha[6]; ?></span><br>
    <span class="style1"> </span></td>
  </tr>
  <tr>
    <td width="11%">&nbsp;</td>
    <td><span class="style1"></span></td>
    <td><? if($linha[7]<>""){echo "Preço";} ?><br>
    <span class="style1"><span class="style3"><? if($linha[8]=="Sim"){ echo "<del> R$ $linha[7] </del>"; } else { if($linha[7]<>""){ printf("R$ $linha[7]");} }?></span> </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">      <span class="style5">
      <? if($linha[8]=="Sim"){
printf("Preço de Oferta<br> R$ $linha[9]");
$linha[8]="Não";
}
?>
    </span></td>
  </tr>
  <tr>
    <td width="11%">&nbsp;</td>
    <td width="10%"><div align="center"><? printf("<a href='fotos.php?chamar=$codigo&imagem=foto1' target='I1'><img src='fotos_produtos/$foto' border='0' width='67' height='56'></a>") ?>
      </div>
    <div align="center"></div></td>
    <td width="10%"><div align="center"><? if($foto2<>""){ printf("<a href='fotos.php?chamar=$codigo&imagem=foto2' target='I1'><img src='fotos_produtos/$foto2' border='0' width='67' height='56'></a>");} ?>
      </div>
    <div align="center"></div></td>
    <td width="11%"><div align="center"><? if($linha[16]<>""){ printf("<a href='fotos.php?chamar=$linha[11]&imagem=foto3' target='I1'><img src='imagens3/$linha[16]' border='0' width='67' height='56'></a>");} ?>
      </div>
    <div align="center"></div></td>
    <td width="12%"><div align="center"><? if($linha[17]<>""){ printf("<a href='fotos.php?chamar=$linha[11]&imagem=foto4' target='I1'><img src='imagens4/$linha[17]' border='0' width='67' height='56'></a>");} ?>
      </div>
    <div align="center"></div></td>
    <td><span class="style1"></span></td>
    <td colspan="2"><span class="style5">
      </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
	  	<?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>

          <? } ?>
</body>

</html>
