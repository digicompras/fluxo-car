

<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



require '../../../conect/conect.php';



$hoje = date('d/m/Y')+1;





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

			





$sql = "SELECT * FROM contas_a_pagar order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);





$codigo = $linha[0];

$vencto = $linha[11];









// a função explode é usada para separar uma string em

// uma matriz de strings usando um delimitador



$data = $vencto;

$data2 = explode("-", $data);



$dia = $data2[2];

$mes_analisado = $data2[1];

$ano = $data2[0];


if($mes_analisado<=9){
	
$mes = "0$data2[1]";

}
else{
	
$mes = $data2[1];
	
}

//$data_digitacao = "$ano-$mes-$dia";




?>

<?

$sql2 = "select * from db";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {





$comando = "update `$linha[1]`.`contas_a_pagar` set `codigo` = '$codigo',`dia_vencto` = '$dia',`mes_vencto` = '$mes',`ano_vencto` = '$ano' where `contas_a_pagar`. `codigo` = '$codigo'";

}



mysql_query($comando,$conexao);







?>



		

        

          

<tr>

          <? echo $codigo; ?> -   <? echo $vencto; ?> ------>  <? echo "$dia-$mes-$ano"; ?> <br><br>

  </tr>







<? } ?>

		  

	<? echo $registros; ?>	  

</table>

