

<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



require '../../conect/conect.php';



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

			





$sql = "SELECT * FROM propostas_veiculos order by num_proposta asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);





$num_proposta = $linha[0];

$dataproposta = $linha[1];









// a função explode é usada para separar uma string em

// uma matriz de strings usando um delimitador



//$data = $datadigitacao;

$data2 = explode("-", $dataproposta);



$dia = $data2[0];

$mes = $data2[1];

$ano = $data2[2];




//$data_digitacao = "$ano-$mes-$dia";




?>

<?

$sql2 = "select * from db";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {





$comando = "update `$linha[1]`.`propostas_veiculos` set `num_proposta` = '$num_proposta',`dia` = '$dia',`mes` = '$mes',`ano` = '$ano' where `propostas_veiculos`. `num_proposta` = '$num_proposta'";

}



mysql_query($comando,$conexao);







?>



		

        

          

<tr>

          <? echo $num_proposta; ?> -   <? echo $dataproposta; ?> ------>  <? echo "$dia-$mes-$ano"; ?> <br><br>

  </tr>







<? } ?>

		  

	<? echo $registros; ?>	  

</table>

