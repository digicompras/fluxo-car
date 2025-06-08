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

//--------------------INICIO LANÇAMENTO DE RECEBIMENTO DE COMISSÃO ------------------------------------

$recebido = $_POST['recebido'];


if($recebido=="Sim"){
	
$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estab_pertence_op = $linha[44];

$cidade_estab_pertence_op = $linha[45];

$tel_estab_pertence_op = $linha[46];

$email_estab_pertence_op = $linha[47];

}

	
	
	
$num_proposta = $_POST['num_proposta'];

$sql2 = "SELECT * FROM propostas where num_proposta = '$num_proposta' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$estabelecimento_proposta = $linha[3];

}

	
$dia_recebimento = $_POST['dia_recebimento'];
$mes_recebimento = $_POST['mes_recebimento'];
$ano_recebimento = $_POST['ano_recebimento'];


$cod_contas_a_receber = $_POST['cod_contas_a_receber'];

$num_mensalidade = $_POST['num_mensalidade'];
$quant_parc = $_POST['quant_parc'];
$valor_a_receber = $_POST['valor_a_receber'];
$hora_baixa = $_POST['hora_baixa'];
$bco_operacao = $_POST['bco_operacao'];
$valor_a_recebr = $_POST['valor_a_receber'];


$datacadastro = "$dia_recebimento-$mes_recebimento-$ano_recebimento";
$datecadastro = "$ano_recebimento-$mes_recebimento-$dia_recebimento";

$horacadastro = "$hora_baixa";
$dia = $dia_recebimento;
$mes = $mes_recebimento;
$ano = $ano_recebimento;

$sql3 = "SELECT * FROM cx_entradas where num_proposta = '$num_proposta' and cod_contas_a_receber = '$cod_contas_a_receber' and num_mensalidade = '$num_mensalidade' and categoria_conta = 'RECEBIMENTO DE COMISSOES'";
$res3 = mysql_query($sql3);

$lancamentos = mysql_num_rows($res3);

if($lancamentos>=1){

echo "Valor da comissão da proposta $num_proposta já registrado no caixa!!!... Por essa razão não foi lançado novamente!<br> ";

}
else{



$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_proposta,cod_contas_a_receber,num_mensalidade) 



values('$valor_a_receber','$dia','$mes','$ano','$datacadastro','$horacadastro','$estabelecimento_proposta','$num_proposta - Recebimento de comissão parcela $num_mensalidade de $quant_parc - $cpf','RECEBIMENTO DE COMISSOES','$datecadastro','$nome','$cpf','$nome_op','$celular_op','$email_op','$estabelecimento_proposta','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_proposta','$cod_contas_a_receber','$num_mensalidade')";


mysql_query($comando,$conexao);



echo "<br> Recebimento da comissão da proposta $num_proposta no valor de R$ $valor_a_receber lançada na entrada de caixa com sucesso!<br>";





$sql4 = "select * from db";

$res4 = mysql_query($sql4);

while($linha=mysql_fetch_row($res4)) {





$comando = "update `$linha[1]`.`contas_a_receber` set `codigo` = '$cod_contas_a_receber',`quitacao`= 'Recebido' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber' limit 1 ";

}



mysql_query($comando,$conexao);


}

}

//---------------FIM DE LANÇAMENTO DE  RECEBIMENTO DE COMISSÃO------------------------------
?>










  <form name="form1" method="post" action="menu.php">

    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

    <input type="submit" name="Submit22" value="Voltar ao menu principal">

  </form>

<?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>



<table width="100%"  border="0">

        <tr>

          <td><div align="center"><span class="style2">

            <?

$num_fatura = $_POST['num_fatura'];



			

$sql = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and quitacao = 'Recebido'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg_mensalidade++;


$cod_contas_a_receber = $linha[0];


$nome = $linha[4];

$cpf = $linha[5];

$bco_operacao = $linha[32];




?>

          Listando todas as mensalidades da proposta:</span> <span class="style1"><? echo $num_proposta; ?></span><span class="style2"><BR>

		  Cliente: <span class="style3"><? echo $nome; ?></span>    CPF: <span class="style3"><? echo $cpf; ?></span>		  <? } ?> </span></div></td>

        </tr>

  </table>

      

<table width="100%"  border="0">

        <tr bgcolor="#ffffff">
          <td><div align="center">N&ordm; Proposta</div></td>

          <td><div align="center">Vencimento</div></td>

          <td><div align="center">Mensalidade</div></td>

          <td width="16%"><div align="center">Valor a Receber</div></td>

          <td><div align="center">Status</div></td>
          <td><div align="center">Recebida em</div></td>

  </tr>

		
  <?

			





$sql = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and quitacao = 'Recebido' order by num_mensalidade asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;



$codigo = $linha[0];

$num_proposta = $linha[1];

$datacadastro = $linha[2];

$horacadastro = $linha[3];

$nome = $linha[4];

$cpf = $linha[5];

$obs = $linha[6];

$valor_a_receber = $linha[7];

$vencto = $linha[8];

$quant_parc = $linha[9];

$quitacao = $linha[13];

$num_mensalidade = $linha[31];






$sql2 = "SELECT * FROM cx_entradas where cod_contas_a_receber = '$codigo' and num_mensalidade = '$num_mensalidade' order by num_mensalidade asc";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {




$daterecebimento = $linha[30];



}

?>

        <tr>
          <td width="8%"><div align="center"><? echo $num_proposta; ?></div></td>




          <td width="8%"><div align="center"><? echo $vencto; ?></div></td>

          <td width="10%"><div align="center"><? echo $num_mensalidade; ?> de <? echo $quant_parc; ?></div></td>

          <td><div align="center"><? echo "R$ ".$valor_a_receber; ?> </div></td>

          <td width="9%"><div align="center"><? echo $quitacao; ?> </div></td>
          <td width="9%"><div align="center"><? echo $daterecebimento; ?></div></td>

  </tr>

		  <?

if($reg==1){

echo "<tr>";

//$reg=0;

}

}

?>


		  

		  

</table>



