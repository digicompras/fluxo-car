<?



session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

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

//--------------------INICIO LAN�AMENTO DE RECEBIMENTO DE COMISS�O ------------------------------------

$estornar = $_POST['estornar'];
$cod_contas_a_pagar = $_POST['cod_contas_a_pagar'];


if($estornar=="Sim"){
	
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

	
	
	
$sql2 = "SELECT * FROM contas_a_pagar where codigo = '$cod_contas_a_pagar'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

//$cod_contas_a_pagar = $linha[0];

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

$codigo_orcamento = $linha[39];

$fornecedor = $linha[41];



}


	
$comando = "delete from `bco_saidas` where `bco_saidas`. `cod_contas_a_pagar` = '$cod_contas_a_pagar'";

mysql_query($comando,$conexao);



echo "BAIXA DA CONTA $fornecedor NO VALOR DE R$ $valor_a_pagar ESTORNADA COM SUCESSO!";




$dateestorno = date('Y-m-d');
$horaestorno = date('H:i:s');
$estorno = "Sim";



$sql4 = "select * from db";

$res4 = mysql_query($sql4);

while($linha=mysql_fetch_row($res4)) {



$comando = "update `$linha[1]`.`contas_a_pagar` set `codigo` = '$cod_contas_a_pagar',`quitacao`= 'Em Aberto',`estorno`= '$estorno',`dateestorno`= '$dateestorno',`horaestorno`= '$horaestorno',`operador_estornou`= '$nome_op' where `contas_a_pagar`. `codigo` = '$cod_contas_a_pagar' limit 1 ";

}



mysql_query($comando,$conexao);


}



//---------------FIM DE LAN�AMENTO DE  RECEBIMENTO DE COMISS�O------------------------------
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

$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$data_final = "$ano_final-$mes_final-$dia_final";

			

$sql = "SELECT * FROM contas_a_pagar where quitacao = 'Pago' and vencto between '$data_inicial'and '$data_final' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg_mensalidade++;


$cod_contas_a_receber = $linha[0];


$nome = $linha[4];

$cpf = $linha[5];

$bco_operacao = $linha[32];




?>
Listando todas contas pagas do periodo:</span> <span class="style1"><? echo "De $dia_inicial-$mes_inicial-$ano_inicial ate $dia_final-$mes_final-$ano_final"; ?></span><span class="style2"><BR>
<? } ?>
</span></div></td>

        </tr>

  </table>
<table width="100%"  border="0">
  <tr bgcolor="#ffffff">
    <td><div align="center">Empresa</div></td>
    <td><div align="center">Fornecedor</div></td>
    <td><div align="center">Estorno</div></td>
    <td><div align="center">Vencimento</div></td>
    <td><div align="center">Valor</div></td>
    <td width="5%"><div align="center">Quita&ccedil;&atilde;o</div></td>
    <td><div align="center">Juros Passivos</div></td>
    <td><div align="center">Paga em</div></td>
    <td><div align="center">Banco</div></td>
    <td><div align="center">Agencia</div></td>
    <td><div align="center">Conta Corrente</div></td>
    <td><div align="center">N&ordm; Ch</div></td>
    <td><div align="center">Tipo</div></td>
  </tr>
  <?

			





$sql = "SELECT * FROM contas_a_pagar where quitacao = 'Pago' and vencto between '$data_inicial'and '$data_final'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;


$cod_contas_a_pagar = $linha[0];

$num_fatura = $linha[1];

$datacadastro = $linha[2];

$horacadastro = $linha[6];

$empresa = $linha[7];

$cpf = $linha[8];

$obs = $linha[9];

$valor_a_pagar = $linha[10];

$vencto = $linha[11];

$quantparc = $linha[12];

$modopagto = $linha[13];

$juros = $linha[14];

$quitacao = $linha[16];

$historico = $linha[33];

$num_mensalidade = $linha[34];

$banco = $linha[35];

$categoria_conta = $linha[37];

$codigo_fornecedor = $linha[38];

$codigo_orcamento = $linha[39];

$fornecedor = $linha[41];

$agencia = $linha[42];

$contacorrente = $linha[43];

$tipoconta = $linha[44];

$num_cheque = $linha[45];

$datepagto = $linha[58];




$data_do_vencto = explode("-", $vencto);

$ano_do_vencto = $data_do_vencto[0];

$mes_do_vencto = $data_do_vencto[1];

$dia_do_vencto = $data_do_vencto[2];


$data_vencto_brasileira = "$dia_do_vencto-$mes_do_vencto-$ano_do_vencto";


$data_do_pagto = explode("-", $datepagto);

$ano_do_pagto = $data_do_pagto[0];

$mes_do_pagto = $data_do_pagto[1];

$dia_do_pagto = $data_do_pagto[2];


$data_pagto_brasileira = "$dia_do_pagto-$mes_do_pagto-$ano_do_pagto";


?>
  <form name="form2" method="post" action="verifica_mensalidades_pagas.php">
    <tr>
      <td width="14%"><div align="center">
        <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
        <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
        <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
        <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
        <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
        <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
        <? echo $empresa; ?></div></td>
      <td width="10%"><div align="center"><? echo $fornecedor; ?></div></td>
      <td width="5%"><div align="center">
        <input name="cod_contas_a_pagar" type="hidden" id="cod_contas_a_pagar" value="<? echo $cod_contas_a_pagar; ?>">
        <input name="estornar" type="hidden" id="estornar" value="<? echo "Sim"; ?>">
        <input type="submit" name="button" id="button" value="Estornar">
      </div></td>
      <td width="6%"><div align="center"><? echo $data_vencto_brasileira; ?></div></td>
      <td width="7%"><div align="center"><? echo "R$ ".$valor_a_pagar; ?></div></td>
      <td><div align="center"><? echo $quitacao; ?></div></td>
      <td width="8%"><div align="center"><? echo $juros; ?></div></td>
      <td width="7%"><div align="center"><? echo $data_pagto_brasileira; ?></div></td>
      <td width="10%"><div align="center"><? echo $banco; ?></div></td>
      <td width="6%"><div align="center"><? echo $agencia; ?></div></td>
      <td width="8%"><div align="center"><? echo $contacorrente; ?></div></td>
      <td width="9%"><div align="center"><? echo $num_cheque; ?></div></td>
      <td width="5%"><div align="center"><? echo $tipoconta; ?></div></td>
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
