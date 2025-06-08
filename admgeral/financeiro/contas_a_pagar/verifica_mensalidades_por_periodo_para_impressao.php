<?



session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

?>



<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



require '../../../conect/conect.php';

error_reporting(E_ALL);
error_reporting( E_ALL ^E_NOTICE );


$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$data_final = "$ano_final-$mes_final-$dia_final";





$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>







<style type="text/css">

<!--

.style1 {

	color: #0000FF;

	font-weight: bold;

}

.style2 {font-weight: bold}

.style3 {color: #0000FF}

.style4 {

	color: #FFFFFF;

	font-weight: bold;

}
.style5 {font-size: 30px;
	font-weight: bold;
	color: #000000;
}

-->

</style>

<body bgcolor="#<? printf("$linha[1]"); ?>"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?>


<?

	
$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estab_pertence_op = $linha[44];

$cidade_estab_pertence_op = $linha[45];

$tel_estab_pertence_op = $linha[46];

$email_estab_pertence_op = $linha[47];

}

?>




<?

$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estabelecimento_op = $linha[24];

$cidade_estabelecimento_op = $linha[25];

$tel_estabelecimento_op = $linha[26];

$email_estabelecimento_op = $linha[27];

$estab_pertence_op = $linha[44];

$cidade_estab_pertence_op = $linha[45];

$tel_estab_pertence_op = $linha[46];

$email_estab_pertence_op = $linha[47];

}





?>
<?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>



<table width="100%"  border="0">

        <tr>

          <td><div align="center" class="style5">
            <strong>
            <?
          
          $sql = "select sum(valor_a_pagar) as total_entradas from contas_a_pagar where vencto between '$data_inicial'and '$data_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_entradas = $linha['total_entradas'];



echo "Total de contas a pagar no periodo de $dia_inicial-$mes_inicial-$ano_inicial ate $dia_final-$mes_final-$ano_final R$ ".$valor_total_entradas;

		  
          ?></strong></div></td>

        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>

  </table>

      

<table width="100%"  border="1" cellspacing="0">

        <tr bgcolor="#ffffff">
          <td><div align="center"><strong>Vencimento</strong></div></td>
          <td width="22%"><div align="center"><strong>Fornecedor</strong></div>            <div align="center"></div></td>

          <td width="33%"><div align="center"><strong>Historico</strong></div></td>
          <td><div align="right"><strong>Valor</strong></div></td>
  </tr>
  <?

			





$sql = "SELECT * FROM contas_a_pagar where quitacao = 'Em Aberto' and vencto between '$data_inicial'and '$data_final' order by vencto asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;



$cod_contas_a_pagar = $linha[0];

$num_fatura = $linha[1];

$datacadastro = $linha[2];

$horacadastro = $linha[6];

$nfantasia = $linha[7];

$cpf = $linha[8];

$obs = $linha[9];

$valor_a_pagar = $linha[10];

$vencto = $linha[11];

$quantparc = $linha[12];

$modopagto = $linha[13];

$quitacao = $linha[16];

$historico = $linha[33];

$num_mensalidade = $linha[34];

$categoria_conta = $linha[37];

$codigo_fornecedor = $linha[38];

$fornecedor = $linha[41];

$departamento = $linha[63];



$data_do_vencto = explode("-", $vencto);


$ano_do_vencto = $data_do_vencto[0];

$mes_do_vencto = $data_do_vencto[1];

$dia_do_vencto = $data_do_vencto[2];


$data_vencto_brasileira = "$dia_do_vencto-$mes_do_vencto-$ano_do_vencto";

?>

<form name="form2" method="post" action="verifica_mensalidades.php">	

        <tr>
          <td width="9%"><div align="center">
          <? echo $data_vencto_brasileira; ?></div></td>
          <td><div align="left"><? echo $fornecedor; ?>            </div></td>


          <td><div align="left"><? echo $historico; ?></div></td>
          <td width="12%"><div align="right"><? echo "R$ ".$valor_a_pagar; ?></div></td>
    </tr>
</form>
		  <?

if($reg==1){

echo "<tr>";

//$reg=0;

}

?>

<? } ?>

		  

		  

</table>



