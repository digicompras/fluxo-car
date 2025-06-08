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
$cod_contas_a_receber = $_POST['cod_contas_a_receber'];
$num_mensalidade = $_POST['num_mensalidade'];

$recebido = $_POST['recebido'];


if($recebido=="Sim"){
	
$num_fatura = $_POST['num_fatura'];

$sql = "SELECT * FROM contas_a_receber where codigo = '$cod_contas_a_receber' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


//$cod_contas_a_receber = $linha[0];
$nome_cliente = $linha[4];
$cpf = $linha[5];
$quantparc = $linha[9];
$estabelecimento = $linha[17];
$num_orcamento = $linha[36];

}

	
$dia_recebimento = $_POST['dia_recebimento'];
$mes_recebimento = $_POST['mes_recebimento'];
$ano_recebimento = $_POST['ano_recebimento'];


//$cod_contas_a_receber = $_POST['cod_contas_a_receber'];

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

$sql2 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and num_orcamento = '$num_orcamento' and codigo = '$cod_contas_a_receber' and num_mensalidade = '$num_mensalidade' and categoria_conta = 'VENDA DE PRODUTOS'";
$res2 = mysql_query($sql2);

$lancamentos = mysql_num_rows($res2);

if($lancamentos>=1){

echo "Valor da parcela referente a fatura $num_proposta já registrado no caixa!!!... Por essa razão não foi lançado novamente!<br> ";

}
else{



$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento) 



values('$valor_a_receber','$dia','$mes','$ano','$datacadastro','$horacadastro','$estabelecimento','Fatura $num_fatura, Orcamento $num_orcamento - Recebimento de parcela $num_mensalidade de $quantparc - CPF $cpf','VENDA DE PRODUTOS','$datecadastro','$nome_cliente','$cpf','$nome_op','$celular_op','$email_op','$estabelecimento_proposta','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$num_orcamento')";


mysql_query($comando,$conexao);



echo "<br> Recebimento da parcela referente a fatura $num_fatura no valor de R$ $valor_a_receber lançada na entrada de caixa com sucesso!<br>";




$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`contas_a_receber` set `quitacao` = 'recebido',`valor_recebido` = '$valor_a_receber' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber' limit 1 ";

}



mysql_query($comando,$conexao);


}

}

//---------------FIM DE LANÇAMENTO DE  RECEBIMENTOS------------------------------

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

			

$sql = "SELECT * FROM contas_a_receber where quitacao = 'Em Aberto' and vencto between '$data_inicial'and '$data_final' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg_mensalidade++;


$cod_contas_a_receber = $linha[0];


$nome = $linha[4];

$cpf = $linha[5];

$bco_operacao = $linha[32];




?>

          Listando todas as mensalidades do periodo:</span> <span class="style1"><? echo "De $dia_inicial-$mes_inicial-$ano_inicial ate $dia_final-$mes_final-$ano_final"; ?></span><span class="style2"><BR><? } ?> </span></div></td>

        </tr>

  </table>

      

<table width="100%"  border="0">

        <tr bgcolor="#ffffff">
          <td><div align="center">Cliente</div></td>
          <td><div align="center">N&ordm; Fatura</div></td>

          <td><div align="center">Vencimento</div></td>

          <td><div align="center">Mensalidade</div></td>

          <td width="9%"><div align="center">Valor a Receber</div></td>

          <td><div align="center">Quita&ccedil;&atilde;o</div></td>
          <td><div align="center">Banco</div></td>
          <td><div align="center">Conta Corrente</div></td>

          <td><div align="center"> </div></td>

</tr>
  <?

			





$sql = "SELECT * FROM contas_a_receber where quitacao = 'Em Aberto' and vencto between '$data_inicial'and '$data_final' order by num_mensalidade asc";

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

$codigo_orcamento = $linha[36];






?>

<form name="form2" method="post" action="verifica_mensalidades.php">	

        <tr>
          <td width="24%"><div align="center"><? echo $nome; ?></div></td>
          <td width="7%"><div align="center"><? echo $num_proposta; ?></div></td>




          <td width="8%"><div align="center"><? echo $vencto; ?></div></td>

          <td width="7%"><div align="center"><? echo $num_mensalidade; ?> de <? echo $quantparc; ?></div></td>

          <td><div align="center"><? echo "R$ ".$valor_a_receber; ?> </div></td>

          <td width="7%"><div align="center"><? echo $quitacao; ?> </div></td>
          <td width="10%"><div align="center">
            <select name="banco" id="banco">
              <option selected></option>
              <?





    $sql = "select * from contas_bancarias order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>
            </select>
          </div></td>
          <td width="10%"><div align="center">
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

          <td width="18%">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$dia_recebimento = date('d');
$mes_recebimento = date('m');
$ano_recebimento = date('Y');

?>
            <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
<input name="num_mensalidade" type="hidden" id="num_mensalidade" value="<? echo $num_mensalidade; ?>">
            <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
            <input name="cod_contas_a_receber" type="hidden" id="cod_contas_a_receber" value="<? echo $cod_contas_a_receber; ?>">
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
<input type="submit" name="Submit" value="Baixar">
          </td>

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



