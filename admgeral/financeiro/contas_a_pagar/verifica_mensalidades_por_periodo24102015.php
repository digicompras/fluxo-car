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

          <td><div align="center">
          <?
          
          $sql = "select sum(valor_a_pagar) as total_entradas from contas_a_pagar where vencto between '$data_inicial'and '$data_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_entradas = $linha['total_entradas'];



echo "Total de contas a pagar no periodo escolhido R$ ".$valor_total_entradas;

		  
          ?>
          </div></td>

        </tr>

  </table>

      

<table width="100%"  border="0">

        <tr bgcolor="#ffffff">
          <td><div align="center">Empresa</div></td>
          <td><div align="center">Fornecedor</div></td>
          <td><div align="center">N&ordm; Fatura</div></td>

          <td><div align="center">Vencimento</div></td>

          <td width="6%"><div align="center">Valor</div></td>

          <td><div align="center">Quita&ccedil;&atilde;o</div></td>
          <td><div align="center">Juros Passivos</div></td>
          <td><div align="center">Banco</div></td>
          <td><div align="center">Conta Corrente</div></td>
          <td><div align="center">N&ordm; Ch</div></td>

          <td><div align="center"> </div></td>

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



$data_do_vencto = explode("-", $vencto);


$ano_do_vencto = $data_do_vencto[0];

$mes_do_vencto = $data_do_vencto[1];

$dia_do_vencto = $data_do_vencto[2];


$data_vencto_brasileira = "$dia_do_vencto-$mes_do_vencto-$ano_do_vencto";

?>

<form name="form2" method="post" action="verifica_mensalidades.php">	

        <tr>
          <td width="12%"><div align="center">
            <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
            <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
            <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
            <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
            <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
            <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
          <? echo $nfantasia; ?></div></td>
          <td width="11%"><div align="center"><? echo $fornecedor; ?></div></td>
          <td width="6%"><div align="center"><? echo $num_fatura; ?></div></td>




          <td width="6%"><div align="center"><? echo $data_vencto_brasileira; ?></div></td>

          <td><div align="center"><? echo "R$ ".$valor_a_pagar; ?> </div></td>

          <td width="6%"><div align="center"><? echo $quitacao; ?> </div></td>
          <td width="8%"><div align="center">
            <input name="juros" type="text" id="juros" value="0.00" size="5">
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
          <td width="9%"><div align="center">
            <input name="num_cheque" type="text" id="num_cheque" size="10">
          </div></td>

          <td width="17%">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$dia_pagamento = date('d');
$mes_pagamento = date('m');
$ano_pagamento = date('Y');

?>
            <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
            <input name="cod_contas_a_pagar" type="hidden" id="cod_contas_a_pagar" value="<? echo $cod_contas_a_pagar; ?>">
<input name="num_mensalidade" type="hidden" id="num_mensalidade" value="<? echo $num_mensalidade; ?>">
<input name="quantparc" type="hidden" id="quantparc" value="<? echo $quantparc; ?>">
            <select name="dia_pagamento" id="dia_pagamento">
              <option selected><? echo $dia_pagamento; ?></option>
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
            <select name="mes_pagamento" id="mes_pagamento">
              <option selected><? echo $mes_pagamento; ?></option>
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
            <select name="ano_pagamento" id="ano_pagamento">
              <option>
                <? $ano_anterior = bcsub($ano_pagamento,1); echo $ano_anterior; ?>
              </option>
              <option selected><? echo $ano_pagamento; ?></option>
              <option>
                <? $ano_posterior = bcadd($ano_pagamento,1); echo $ano_posterior; ?>
              </option>
            </select>
            <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
            <input name="pago" type="hidden" id="pago" value="<? echo "Sim"; ?>">
            <strong><font color="#0000FF">
            <input name="hora_baixa" type="hidden" id="hora_baixa" value="<? echo date('H:i:s'); ?>">
              </font></strong>
            <input name="bco_operacao" type="hidden" id="bco_operacao" value="<? echo $bco_operacao; ?>">
            <input name="valor_a_pagar" type="hidden" id="valor_a_pagar" value="<? echo $valor_a_pagar; ?>">
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



