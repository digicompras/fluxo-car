
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
			


$sql = "SELECT * FROM propostas order by num_proposta asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);


$num_proposta = $linha[0];
$dataalteracao = $linha[42];



// a função explode é usada para separar uma string em
// uma matriz de strings usando um delimitador

$dataalteracao_sistema = $dataalteracao;
$dataalteracao_sistema2 = explode("-", $dataalteracao_sistema);

$dia_alteracao_status = $dataalteracao_sistema2[0];
$mes_alteracao_status = $dataalteracao_sistema2[1];
$ano_alteracao_status = $dataalteracao_sistema2[2];




?>
<?
$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`dia_alteracao_status` = '$dia_alteracao_status',`mes_alteracao_status` = '$mes_alteracao_status',`ano_alteracao_status` = '$ano_alteracao_status' where `propostas`. `num_proposta` = '$num_proposta'";
}

mysql_query($comando,$conexao);



?>

		
        
          
<tr>
          <? echo $num_proposta; ?> -   <? echo $dataalteracao; ?> ------>  <? echo $dia_alteracao_status; ?> - <? echo $mes_alteracao_status; ?> - <? echo $ano_alteracao_status; ?> <br><br>
  </tr>



<? } ?>
		  
	<? echo $registros; ?>	  
</table>
