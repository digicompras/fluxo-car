<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>categorias</title>
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
</style>
<base target="parte inferior">
</head>
			<?
			
require 'conect/conect.php';
			
//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 
$sql = "SELECT * FROM fundo_intermediaria";
//EXECUTA O COMANDO ACIMA
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$reg++;
?>



<body bgcolor="#<? printf("$linha[1]"); ?>">
<?
if($reg==1){
echo "</td>";
$reg=0;
}
?>
<? } ?>
<table width="100%"  border="0" height="32">

          
                <tr><td width="33%" height="28"><form action="login_correspondente.php" method="post" name="form1" target="navegacao">
                  <div align="center">
                    <input type="submit" name="Submit2" value="&Aacute;rea do Agente">
                  </div>
                </form>                
                  
                    <td width="17%"><form action="login.php" method="post" name="form1" target="navegacao">
                    <div align="center">
                      <input type="submit" name="Submit" value="&Aacute;rea do Funcion&aacute;rio">
                    </div>
                  </form>                  
                  <td width="17%"><form action="localizacao.php" method="post" name="form3" target="navegacao">
                    <div align="center">
                      <input type="submit" name="Submit3" value="Ag&ecirc;ncias">
                    </div>
                  </form>                  
                  <td width="33%" height="28">&nbsp;</td>
                </tr>
        </table>
        <p>&nbsp;</p>
</body>
</html>