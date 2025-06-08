
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
			


$sql = "SELECT * FROM rdo order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);


$codigo = $linha[0];
$placa = $linha[6];
$datardo = $linha[12];




// a função explode é usada para separar uma string em
// uma matriz de strings usando um delimitador

//$datamanutencao_sistema = $datamanutencao;
//$datamanutencao_sistema2 = explode("-", $datamanutencao_sistema);

//$dia_manutencao = $datamanutencao_sistema2[2];
//$mes_manutencao = $datamanutencao_sistema2[1];
//$ano_manutencao = $datamanutencao_sistema2[0];

$sql3 = "SELECT * FROM veiculos where placa = '$placa'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
	
	$codigointerno = $linha[0];
	$tipodoveiculo = $linha[67];
	
}


?>
<?
$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`rdo` set `tipo` = '$tipodoveiculo' where `rdo`. `codigo` = '$codigo'";
}

mysql_query($comando,$conexao);



?>

		
        
          
<tr>
          <? echo $codigo; ?> -   <? echo $placa; ?> ------>  <? echo $tipodoveiculo; ?> <br><br>
  </tr>



<? }  ?>
		  
	<? echo $registros; ?>	  
</table>
