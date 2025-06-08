

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

			





$sql = "SELECT * FROM possibilidades  order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);





$codigo = $linha[0];

$diap = $linha[12];
$mesp = $linha[13];
$anop = $linha[14];


$data_da_possibilidade = "$anop-$mesp-$diap";

$datacadastro = "$diap-$mesp-$anop";


// a função explode é usada para separar uma string em

// uma matriz de strings usando um delimitador



$data = $datacadastro;

$data2 = explode("-", $data);



$dia = $data2[0];

$mes = $data2[1];

$ano = $data2[2];


$date = "$ano-$mes-$dia";


?>

<?

$sql2 = "select * from db";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {





$comando = "update `$linha[1]`.`possibilidades` set `codigo` = '$codigo',`data_da_possibilidade` = '$data_da_possibilidade' where `possibilidades`. `codigo` = '$codigo'";

}



mysql_query($comando,$conexao);







?>



		

        

          

<tr>

          <? echo $codigo; ?> - <? echo "$diap-$mesp-$anop"; ?> - <? echo $data_da_possibilidade; ?> <br><br>

  </tr>







<? } ?>

		  

	<? echo $registros; ?>	  

</table>

