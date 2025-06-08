<html>

<head>

<title>FLUXOCAR - APRESENTAÇÃO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style8 {

	font-size: 18px;

	font-weight: bold;

	color: #000000;

}

.style9 {

	color: #FFFFFF;

	font-weight: bold;

}

.style10 {color: #000000}

.style11 {color: #000000; font-weight: bold; }

-->

</style>

<base target="meio">

</head>



<?

require 'conect/conect.php';

ini_set('default_charset','UTF8_general_mysql500_ci');


$sql = "SELECT * FROM fundo_topo limit 1";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor_fundo_cabecalho = $linha[1];



}

?>





<body bgcolor="#<? echo $cor_fundo_cabecalho; ?>" 

  

<?

$sql = "SELECT * FROM background_topo";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background_cabecalho = $linha[1];

}

?>



background="background/<? echo $background_cabecalho; ?>" bgproperties="fixed">

<table width="100%"  border="0">

  <tr>

    <td><?

$sql = "SELECT * FROM logo";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



printf("<a href='index.php' target='_top'><img src='logo/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'></a>"); 



} ?>

    </td>

  </tr>

</table>

<?

$sql = "SELECT * FROM b_sup";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$cor_sup = $linha[1];

}

?>

  

<table bgcolor="#<? echo $cor_sup; ?>" width="100%" border="0">

<tr valign="top" align="center">

              <td height="23" >                                    <div align="right">
                
                <marquee scrollamount="6">			  <? 

$sql = "SELECT * FROM faixa_de_texto";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$texto = $linha[3];

echo "<b>$texto</b>";

}

?></marquee>
                
              </div></td>

  </tr>

</table>



          



<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="7%">&nbsp;</td>
      <td width="90%">&nbsp;</td>
      <td width="3%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form action="https://www.youtube.com/watch?v=1N7dqkPbhUU" method="post" name="form1" target="_blank">
        <input type="submit" class='class01' name="submit3" id="submit3" value="FLUXOCAR   REGISTRANDO UM VEICULO">
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form action="https://www.youtube.com/watch?v=mX2qCkImwog" method="post" name="form1" target="_blank">
        <input type="submit" class='class01' name="submit7" id="submit7" value="EDITANDO UM VEICULO E EMITINDO ETIQUTA">
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form action="https://www.youtube.com/watch?v=mIc_44mcac4" method="post" name="form1" target="_blank">
        <input type="submit" class='class01' name="submit2" id="submit2" value="INSERINDO ITENS NO ESTOQUE">
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form action="https://www.youtube.com/watch?v=ox1MU4E416c" method="post" name="form1" target="_blank">
          <input type="submit" class='class01' name="submit" id="submit" value="REALIZANDO UM ORÇAMENTO">
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form action="https://www.youtube.com/watch?v=k5v9Jn16vCs" method="post" name="form1" target="_blank">
        <input type="submit" class='class01' name="submit4" id="submit4" value="TRANSFERENCIA DE ESTOQUE">
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><form action="https://www.youtube.com/watch?v=jQGtE_OrcEI" method="post" name="form1" target="_blank">
        <input type="submit" class='class01' name="submit5" id="submit5" value="VISUALIZA&Ccedil;&Atilde;O DAS VENDAS E PONTO DE EQUILIBRIO">
      </form></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>