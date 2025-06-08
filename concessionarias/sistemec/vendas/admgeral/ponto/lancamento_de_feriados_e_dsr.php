

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



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0">
<form action="menu.php" method="post" name="form1" target="navegacao">
  <input type="submit" name="Submit" value="Voltar">
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
</form>
</body> 

  

<? } ?>









      

<table width="100%"  border="0">

  <?

$dia = $_POST['dia'];

$mes = $_POST['mes'];

$ano = $_POST['ano'];

$dia_semana = $_POST['dia_semana'];

$tipo_lancamento = $_POST['tipo_lancamento'];




$mes_ano = "$mes-$ano";

$data = "$dia-$mes-$ano";

$date = "$ano-$mes-$dia";




$sql = "SELECT * FROM operadores where status = 'Ativo' order by nome asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);

			
$nome_operador = $linha[1];
$estab_pertence = $linha[44];




$sql2 = "SELECT * FROM ponto where nome = '$nome_operador' and date = '$date' order by nome asc";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {

$registros2 = mysql_num_rows($res2);





$codigo = $linha[0];





}

?>


<?

if($registros2==0){

$comando = "insert into ponto(nome,data,ent_m,sai_m,ent_t,sai_t,mes_ano,dia_semana,date,dia,mes,ano,estab_pertence) values('$nome_operador','$data','$tipo_lancamento','$tipo_lancamento','$tipo_lancamento','$tipo_lancamento','$mes_ano','$dia_semana','$date','$dia','$mes','$ano','$estab_pertence')";

mysql_query($comando,$conexao) or die("Erro ao lançar ponto!<br><br> Tente novamente!");


}
?>		

        

          

<tr>

          <? echo $nome_operador; ?> - <? echo $date; ?> - <? echo $dia_semana; ?> ------>  <? echo $ent_m; ?> | <? echo $sai_m; ?> | <? echo $ent_t; ?> | <? echo $sai_t; ?> <br><br>

  </tr>







<? } ?>

		  

	<? //echo $registros; ?>	  

</table>

