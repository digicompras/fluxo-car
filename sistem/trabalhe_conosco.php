<?



require 'conect/conect.php';





$sql = "SELECT * FROM logo";

$res = mysql_query($sql);



$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;



printf("<a href='index.php' target='_top'><img src='../imagens/$linha[1]' border='0'  width='$linha[2]' height='$linha[3]'></a><br>"); ?>





          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>



          <? } ?>



<html>

<head>

<title>Trabalhe com a Allcred Financeira</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style></head>

<script language="javascript">

function foco(usuario)

{

document.getElementById(usuario).focus();

}

</script>



			<?

			

			

$sql = "SELECT * FROM fundo_navegacao";

//EXECUTA O COMANDO ACIMA

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body onLoad="javascript:foco('usuario');" bgcolor="#<? printf("$linha[1]"); ?>" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>
<img src="imagens/linha_horinzontal.jpg" alt="" width="998" height="10">
<form name="form1" method="post" action="envia_curriculo.php">
  <table width="80%" border="0">
    <tr>
      <td colspan="4"><div align="center"><strong>Trabalhe Conosco - Envie uma pr&eacute;via de seu curriculo para aprecia&ccedil;&atilde;o de nosso RH</strong></div></td>
    </tr>
    <tr>
      <td width="9%">Nome</td>
      <td width="36%"><input name="nome" type="text" id="nome" size="40"></td>
      <td width="11%">Telefones /Cel</td>
      <td width="44%"><input type="text" name="telefones" id="telefones"></td>
    </tr>
    <tr>
      <td>E-Mail</td>
      <td><input name="email" type="text" id="email" size="40"></td>
      <td>Dta Nasc</td>
      <td><input type="text" name="data_nasc" id="data_nasc"></td>
    </tr>
    <tr>
      <td>Endere&ccedil;o</td>
      <td><input name="endereco" type="text" id="endereco" size="40"></td>
      <td>N&uacute;mero</td>
      <td><input name="numero" type="text" id="numero" size="5"></td>
    </tr>
    <tr>
      <td>Bairro</td>
      <td><input type="text" name="bairro" id="bairro"></td>
      <td>Cidade</td>
      <td><input type="text" name="cidade" id="cidade"></td>
    </tr>
    <tr>
      <td>Escolaridade</td>
      <td><select name="escolaridade" id="escolaridade">
        <option>1&ordm; Grau incompleto</option>
        <option>1&ordm; Grau completo</option>
        <option>2&ordm; Grau incompleto</option>
        <option>2&ordm; Grau completo</option>
        <option>T&eacute;cnico incompleto</option>
        <option>T&eacute;cnico completo</option>
        <option>Superior incompleto</option>
        <option>Superior completo</option>
        <option>P&oacute;s Gradua&ccedil;&atilde;o incompleto</option>
        <option>P&oacute;s Gradua&ccedil;&atilde;o completo</option>
        <option>MBA Incompleto</option>
        <option>MBA Completo</option>
        <option>Mestrado</option>
        <option>Doutorado</option>
      </select>      </td>
      <td>Curso</td>
      <td><input type="text" name="curso" id="curso"></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><strong>Fale um pouco de suas experiencias profissionais</strong></div></td>
      <td colspan="2"><div align="center"><strong>Empresas onde trabalhou e quais as atividades  desenvolvidas</strong></div></td>
    </tr>
    <tr>
      <td colspan="2">
        
        <div align="center">
            <textarea name="experiencias" id="experiencias" cols="60" rows="7"></textarea>
        </div></td>
      <td colspan="2">
        
        <div align="center">
            <textarea name="empresas_trabalhou" id="empresas_trabalhou" cols="60" rows="7"></textarea>
          </div></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center"><strong>Por que deseja trabalhar na Allcred Financeira?</strong></div></td>
    </tr>
    <tr>
      <td colspan="4"><div align="center">
        <textarea name="motivo_trabalhar" id="motivo_trabalhar" cols="100" rows="7"></textarea>
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="Enviar"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

</body>

</html>

<?

mysql_close($conexao);

?>