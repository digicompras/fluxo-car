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

//--------------------INICIO LAN�AMENTO DE PAGAMENTO ------------------------------------
$num_mensalidade = $_POST['num_mensalidade'];
$cod_contas_a_pagar = $_POST['cod_contas_a_pagar'];
$pago = $_POST['pago'];


if($pago=="Sim"){
	
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

	
	
	
$num_fatura = $_POST['num_fatura'];


$sql2 = "SELECT * FROM contas_a_pagar where codigo = '$cod_contas_a_pagar'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$cod_contas_a_pagar = $linha[0];

$num_fatura = $linha[1];

$datacadastro = $linha[2];

$horacadastro = $linha[6];

$fornecedor = $linha[7];

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

}

	
$dia_pagamento = $_POST['dia_pagamento'];
$mes_pagamento = $_POST['mes_pagamento'];
$ano_pagamento = $_POST['ano_pagamento'];


//$cod_contas_a_receber = $_POST['cod_contas_a_receber'];

$quantparc = $_POST['quantparc'];
$hora_baixa = $_POST['hora_baixa'];
$bco_operacao = $_POST['bco_operacao'];
$valor_a_pagar = $_POST['valor_a_pagar'];


$datacadastro = "$dia_pagamento-$mes_pagamento-$ano_pagamento";
$datecadastro = "$ano_pagamento-$mes_pagamento-$dia_pagamento";

$horacadastro = "$hora_baixa";
$dia = $dia_recebimento;
$mes = $mes_recebimento;
$ano = $ano_recebimento;

$sql3 = "SELECT * FROM cx_saidas where cod_contas_a_pagar = '$cod_contas_a_pagar'";
$res3 = mysql_query($sql3);

$lancamentos = mysql_num_rows($res3);

if($lancamentos>=1){

echo "Valor da parcela referente a conta $fornecedor j� registrado no caixa!!!... Por essa raz�o n�o foi lan�ado novamente!<br> ";

}
else{



$comando = "insert into cx_saidas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,fornecedor,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento) 



values('$valor_a_pagar','$dia','$mes','$ano','$datacadastro','$horacadastro','$estabelecimento','Fatura $num_fatura, Orcamento $num_orcamento - Pagto de parcela $num_mensalidade de $quantparc - CPF $cpf','$categoria_conta','$datecadastro','$fornecedor','$cpf','$nome_op','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_pagar','$num_mensalidade','$num_orcamento')";


mysql_query($comando,$conexao);



echo "<br> Pagamento da conta $fornecedor no valor de R$ $valor_a_pagar lan�ada na saida de caixa com sucesso!<br>";





$sql4 = "select * from db";

$res4 = mysql_query($sql4);

while($linha=mysql_fetch_row($res4)) {





$comando = "update `$linha[1]`.`contas_a_pagar` set `codigo` = '$cod_contas_a_pagar',`quitacao`= 'pago' where `contas_a_pagar`. `codigo` = '$cod_contas_a_pagar' limit 1 ";

}



mysql_query($comando,$conexao);


}

}

//---------------FIM DE LAN�AMENTO DE  PAGAMENTO DE CONTA------------------------------
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



			

$sql = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and quitacao = 'Em Aberto' limit 1";

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
          <td><div align="center">
            <p>N&ordm; Fatura          </p>
          </div></td>
          <td><div align="center">N&ordm; Or&ccedil;amento</div></td>

          <td><div align="center">Vencimento</div></td>

          <td><div align="center">Mensalidade</div></td>

          <td width="16%"><div align="center">Valor a Receber</div></td>

          <td><div align="center">Status</div></td>

          <td><div align="center"> </div></td>

</tr>

		
  <?

			





$sql = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and quitacao = 'Em Aberto' order by num_mensalidade asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;



$cod_contas_a_receber = $linha[0];

$num_fatura = $linha[1];

$datacadastro = $linha[2];

$horacadastro = $linha[3];

$nome = $linha[4];

$cpf = $linha[5];

$obs = $linha[6];

$valor_a_receber = $linha[7];

$vencto = $linha[8];

$quantparc = $linha[9];

$quitacao = $linha[13];

$num_mensalidade = $linha[31];

$num_orcamento = $linha[36];






?>
<form name="form2" method="post" action="verifica_mensalidades.php">
        <tr>
          <td width="8%"><div align="center"><? echo $num_fatura; ?>
            
          </div></td>
          <td width="8%"><div align="center"><? echo $num_orcamento; ?></div></td>




          <td width="8%"><div align="center"><? echo $vencto; ?></div></td>

          <td width="10%"><div align="center"><? echo $num_mensalidade; ?> de <? echo $quantparc; ?></div></td>

          <td><div align="center"><? echo "R$ ".$valor_a_receber; ?> </div></td>

          <td width="9%"><div align="center"><? echo $quitacao; ?> </div></td>

          <td width="26%">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$dia_recebimento = date('d');
$mes_recebimento = date('m');
$ano_recebimento = date('Y');

?>
            <input name="cod_contas_a_receber" type="hidden" id="cod_contas_a_receber" value="<? echo $cod_contas_a_receber; ?>">
<input name="num_mensalidade" type="hidden" id="num_mensalidade" value="<? echo $num_mensalidade; ?>">
<input name="quantparc" type="hidden" id="quantparc" value="<? echo $quantparc; ?>">
            <select name="dia_recebimento" id="dia_recebimento">
              <option selected><? echo $dia_recebimento; ?></option>
              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
              <option>05</option>
              <option>06</option>
              <option>07</option>
              <option>08</option>
              <option>09</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
              <option>13</option>
              <option>14</option>
              <option>15</option>
              <option>16</option>
              <option>17</option>
              <option>18</option>
              <option>19</option>
              <option>20</option>
              <option>21</option>
              <option>22</option>
              <option>23</option>
              <option>24</option>
              <option>25</option>
              <option>26</option>
              <option>27</option>
              <option>28</option>
              <option>29</option>
              <option>30</option>
              <option>31</option>
            </select>
            <select name="mes_recebimento" id="mes_recebimento">
              <option selected><? echo $mes_recebimento; ?></option>
              <option>01</option>
              <option>02</option>
              <option>03</option>
              <option>04</option>
              <option>05</option>
              <option>06</option>
              <option>07</option>
              <option>08</option>
              <option>09</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
            </select>
            <select name="ano_recebimento" id="ano_recebimento">
              <option>
                <? $ano_anterior = bcsub($ano_recebimento,1); echo $ano_anterior; ?>
              </option>
              <option selected><? echo $ano_recebimento; ?></option>
              <option>
                <? $ano_posterior = bcadd($ano_recebimento,1); echo $ano_posterior; ?>
              </option>
            </select>
            <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
            <input name="recebido" type="hidden" id="recebido" value="<? echo "Sim"; ?>">
            <strong><font color="#0000FF">
              <input name="hora_baixa" type="hidden" id="hora_baixa" value="<? echo date('H:i:s'); ?>">
              </font></strong>
            <input name="bco_operacao" type="hidden" id="bco_operacao" value="<? echo $bco_operacao; ?>">
            <input name="valor_a_receber" type="hidden" id="valor_a_receber" value="<? echo $valor_a_receber; ?>">
            <input name="num_orcamento" type="hidden" id="num_orcamento" value="<? echo $num_orcamento; ?>">
            <input type="submit" name="Submit" value="Baixar">
          </td>

  </tr>
</form>
		  <?

if($reg==1){

echo "<tr>";

//$reg=0;

}

}

?>


		  

		  

</table>



