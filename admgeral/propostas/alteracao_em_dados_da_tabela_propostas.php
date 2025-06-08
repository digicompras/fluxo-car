
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
			


$sql = "SELECT * FROM propostas_copia order by num_proposta asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);


$num_proposta = $linha[0];
$dataproposta = $linha[40];
$num_bordero_relacionada = $linha[129];



// a função explode é usada para separar uma string em
// uma matriz de strings usando um delimitador

$dataproposta_sistema = $dataproposta;
$dataproposta_sistema2 = explode("-", $dataproposta_sistema);

$dia_proposta = $dataproposta_sistema2[0];
$mes_proposta = $dataproposta_sistema2[1];
$ano_proposta = $dataproposta_sistema2[2];




?>
<?
$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`num_bordero` = '' where `propostas`. `num_proposta` = '$num_proposta'";
}

mysql_query($comando,$conexao);



?>

		
        
          
<tr>
          <? echo $num_proposta; ?> -   <? echo $dataproposta; ?> ------>  <? echo $dia_proposta; ?> - <? echo $mes_proposta; ?> - <? echo $ano_proposta; ?> <br><br>
  </tr>



<? } ?>
		  
	<? echo $registros; ?>	  
</table>
