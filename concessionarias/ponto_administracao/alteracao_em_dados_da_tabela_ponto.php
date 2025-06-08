

<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



require '../../conect/conect.php';








$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>







<style type="text/css">

<!--

.style2 {font-weight: bold}

.style4 {

	color: #FFFFFF;

	font-weight: bold;

}

.style5 {color: #000000}

.style6 {color: #000000; font-weight: bold; }

-->

</style>

<body bgcolor="#<? printf("$linha[1]"); ?>"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0"></body> 

  

<? } ?>









      

<table width="100%"  border="0">

  <?

$hoje = "19-02-2014";
			





$sql = "SELECT * FROM ponto order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);





$codigo = $linha[0];

$mes_ano_old = $linha[10];

$mes = $linha[14];
$ano = $linha[15];




$mes_ano = "$mes-$ano";


?>


<?

$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$comando = "update `$linha[1]`.`ponto` set `mes_ano` = '$mes_ano' where `ponto`. `codigo` = '$codigo'";

}

mysql_query($comando,$conexao);


?>		

        

          

<tr>

          <? echo $codigo; ?> -   <? echo $mes_ano_old; ?> ------>  <? echo $mes_ano; ?> <br><br>

  </tr>







<? } ?>

		  

	<? echo $registros; ?>	  

</table>

