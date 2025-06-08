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

//--------------------INICIO LANÇAMENTO DE RECEBIMENTO ------------------------------------
$num_fatura = $_POST['num_fatura'];
$num_mensalidade = $_POST['num_mensalidade'];
$cod_contas_a_receber = $_POST['cod_contas_a_receber'];
$recebido = $_POST['recebido'];
$codigo_orcamento = $_POST['codigo_orcamento'];

$banco = $_POST['banco'];
$contacorrente = $_POST['contacorrente'];

$cod_contas_a_pagar_a_atualizar = $_POST['cod_contas_a_pagar_a_atualizar'];
$valor_a_pagar_atualizado = $_POST['valor_a_pagar'];

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`contas_a_pagar` set `valor_a_pagar` = '$valor_a_pagar_atualizado' where `contas_a_pagar`. `codigo` = '$cod_contas_a_pagar_a_atualizar'";

}

mysql_query($comando,$conexao);



if($recebido=="Sim"){
	
$sql = "SELECT * FROM contas_bancarias where banco = '$banco' and contacorrente = '$contacorrente' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$agencia = $linha[2];
$tipoconta = $linha[4];

}
	
	
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

	
	
	


$sql2 = "SELECT * FROM contas_a_receber where codigo = '$cod_contas_a_receber'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$cod_contas_a_receber = $linha[0];
$nome_cliente = $linha[4];
$cpf = $linha[5];
$quantparc = $linha[9];
$modopagto = $linha[10];

$estabelecimento = $linha[17];
$cartao = $linha[33];
$categoria_conta = $linha[34];
$num_orcamento = $linha[36];
$departamento_recebimento = $linha[46];

}




$dia_recebimento = $_POST['dia_recebimento'];
$mes_recebimento = $_POST['mes_recebimento'];
$ano_recebimento = $_POST['ano_recebimento'];

$diapagto = $dia_recebimento;
$mespagto = $mes_recebimento;
$anopagto = $ano_recebimento;

//$cod_contas_a_receber = $_POST['cod_contas_a_receber'];

$quantparc = $_POST['quantparc'];
$hora_baixa = $_POST['hora_baixa'];
$sub_valor_a_receber = $_POST['valor_a_receber'];


$datacadastro = "$dia_recebimento-$mes_recebimento-$ano_recebimento";
$datecadastro = "$ano_recebimento-$mes_recebimento-$dia_recebimento";

$datepagto = "$ano_recebimento-$mes_recebimento-$dia_recebimento";

$daterecebimento = "$ano_recebimento-$mes_recebimento-$dia_recebimento";

$horacadastro = "$hora_baixa";
$dia = $dia_recebimento;
$mes = $mes_recebimento;
$ano = $ano_recebimento;

$sql4 = "SELECT * FROM bco_entradas where num_fatura = '$num_fatura' and cod_contas_a_receber = '$cod_contas_a_receber' and num_mensalidade = '$num_mensalidade' and categoria_conta = '$categoria_conta' and banco = '$banco' and agencia = '$agencia' and contacorrente = '$contacorrente' and tipoconta = '$tipoconta'";
$res4 = mysql_query($sql4);

$lancamentos = mysql_num_rows($res4);

if($lancamentos>=1){

echo "Valor da parcela referente a fatura $num_fatura já registrado no banco!!!... Por essa razão não foi lançado novamente!<br> ";

}
else{

//-----------------lancamento caixa saidas caso possua----------------------------------

$sql3 = "SELECT * FROM contas_a_pagar where num_fatura = '$num_fatura' and num_mensalidade = '$num_mensalidade' and cartao = '$cartao'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$cod_contas_a_pagar = $linha[0];
$num_fatura = $linha[1];
$nome_cliente = $linha[7];
$cpf = $linha[8];
$valor_a_pagar = $linha[10];
$quantparc = $linha[12];
$modopagto = $linha[13];

$estabelecimento = $linha[20];
$cartao = $linha[36];

$categoria_conta_a_pagar = $linha[37];
$codigo_cliente = $linha[38];
$codigo_orcamento = $linha[39];

}

$sql4 = "select * from db";

$res4 = mysql_query($sql4);

while($linha=mysql_fetch_row($res4)) {





$comando = "update `$linha[1]`.`contas_a_pagar` set `codigo` = '$cod_contas_a_pagar',`quitacao`= 'Pago',`datepagto`= '$datepagto' where `contas_a_pagar`. `codigo` = '$cod_contas_a_pagar' limit 1 ";

}



mysql_query($comando,$conexao);

//-----------------fim do lancamento caixa saidas caso possua----------------------------------



$valor_a_receber = bcsub($sub_valor_a_receber,$valor_a_pagar,2);



$comando = "insert into bco_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,codigo_orcamento,banco,agencia,contacorrente,tipoconta,departamento,datepagto,diapagto,mespagto,anopagto) 



values('$valor_a_receber','$dia','$mes','$ano','$datacadastro','$horacadastro','$estabelecimento','Fatura $num_fatura, Orcamento $num_orcamento - Recebimento de parcela $num_mensalidade de $quantparc - CPF $cpf','$categoria_conta','$datecadastro','$nome_cliente','$cpf','$nome_op','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$num_orcamento','$banco','$agencia','$contacorrente','$tipoconta','$departamento_recebimento','$datecadastro','$diapagto','$mespagto','$anopagto')";


mysql_query($comando,$conexao);



echo "<br> Recebimento da parcela referente a fatura $num_fatura no valor de R$ $valor_a_receber lançada na entrada de banco com sucesso!<br>";





$sql5 = "select * from db";

$res5 = mysql_query($sql5);

while($linha=mysql_fetch_row($res5)) {





$comando = "update `$linha[1]`.`contas_a_receber` set `codigo` = '$cod_contas_a_receber',`quitacao`= 'Recebido',`daterecebimento`= '$daterecebimento',`bco_operacao`= '$banco',`agencia`= '$agencia',`contacorrente`= '$contacorrente',`tipoconta`= '$tipoconta' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber' limit 1 ";

}



mysql_query($comando,$conexao);


}

}



//---------------FIM DE LANÇAMENTO DE  RECEBIMENTO ------------------------------
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
          <td colspan="9" bgcolor="#0099FF"><div align="center"><strong>CONTAS A RECEBER</strong></div></td>
        </tr>
        <tr bgcolor="#ffffff">
          <td><div align="center">Cliente</div></td>
          <td><div align="center">
            <p>N&ordm; Fatura          </p>
          </div></td>
          <td><div align="center">Vencimento</div></td>

          <td><div align="center">Mensalidade</div></td>

          <td width="9%"><div align="center">Valor a Receber</div></td>
          <td><div align="center">R_F_C_C</div></td>
          <td><div align="center">Banco</div></td>
          <td><div align="center">Conta</div></td>

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

$cartao = $linha[33];

$num_orcamento = $linha[36];




$sql2 = "SELECT * FROM contas_a_pagar where num_fatura = '$num_fatura' and num_mensalidade = '$num_mensalidade' and cartao = '$cartao'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$cod_contas_a_pagar = $linha[0];

}


$sql3 = "select * from db";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


$comando = "update `$linha[1]`.`contas_a_pagar` set `cod_contas_a_receber` = '$cod_contas_a_receber' where `contas_a_pagar`. `codigo` = '$cod_contas_a_pagar'";

}

mysql_query($comando,$conexao);


$sql4 = "SELECT * FROM contas_a_pagar where cod_contas_a_receber = '$cod_contas_a_receber'";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$cod_contas_a_pagar = $linha[0];

$valor_a_pagar = $linha[10];

}




?>
<form name="form2" method="post" action="verifica_mensalidades.php">
        <tr>
          <td width="24%"><div align="center"><? echo $nome; ?></div></td>
          <td width="8%"><div align="center"><? echo $num_fatura; ?>
            
          </div></td>
          <td width="9%"><div align="center"><? echo $vencto; ?></div></td>

          <td width="8%"><div align="center"><? echo $num_mensalidade; ?> de <? echo $quantparc; ?></div></td>

          <td><div align="center"><? echo "R$ ".$valor_a_receber; ?> </div></td>
          <td width="7%"><div align="center">
            <input name="cod_contas_a_pagar_a_atualizar" type="hidden" id="cod_contas_a_pagar_a_atualizar" value="<? echo $cod_contas_a_pagar; ?>">
            <input name="valor_a_pagar" type="text" id="valor_a_pagar" value="<? echo $valor_a_pagar;  ?>" size="5">
          </div></td>
          <td width="10%"><div align="center">
            <select name="banco" id="banco">
              <option selected></option>
              <?





    $sql = "select * from contas_bancarias group by banco order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>
            </select>
          </div></td>
          <td width="9%"><div align="center">
            <select name="contacorrente" id="contacorrente">
              <option selected></option>
              <?





    $sql = "select * from contas_bancarias order by contacorrente asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['contacorrente']."</option>";

    }

?>
            </select>
          </div></td>

          <td width="16%">
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



