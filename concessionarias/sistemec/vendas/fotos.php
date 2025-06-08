<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
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

<?
		require 'conect/conect.php';


$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>

<body bgcolor="#<? printf("$linha[1]"); ?>">
<? } ?>
        <?

		
$foto = $_GET['imagem'];

	  
  $vg = $_GET['chamar'];


$codigo = $vg;


	  
$sql = "select * from produtos where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$foto1 = "fotos_produtos/".$linha[1];
$foto2 = "fotos_produtos/".$linha[12];
$foto3 = "fotos_produtos/".$linha[16];
$foto4 = "fotos_produtos/".$linha[17];

}
?>
<?
if($foto==foto1){
printf("<img src='$foto1' border='0' height='280'>");
}
?>
<?
if($foto==foto2){
printf("<img src='$foto2' border='0' height='280'>");
}
?>
<?
if($foto==foto3){
printf("<img src='$foto3' border='0' height='280'>");
}
?>
<?
if($foto==foto4){
printf("<img src='$foto4' border='0' height='280'>");
}
?>


</body>
</html>
