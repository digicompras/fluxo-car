<?



session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

?>



<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



require '../../../conect/conect.php';



$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$data_final = "$ano_final-$mes_final-$dia_final";




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

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">


<?

//--------------------INICIO LANÇAMENTO DE RECEBIMENTO ------------------------------------
$num_fatura = $_POST['num_fatura'];
$codigo_orcamento = $_POST['codigo_orcamento'];
$num_mensalidade = $_POST['num_mensalidade'];
	$estab_pertence = $_POST['estab_pertence'];
$cod_contas_a_receber = $_POST['cod_contas_a_receber'];
	$modopagto = $_POST['modopagto'];
$recebido = $_POST['recebido'];
$juros_ativos = $_POST['juros_ativos'];
$num_cheque = $_POST['num_cheque'];
$departamento = $_POST['departamento'];
	
$bco_operacao = $_POST['bco_operacao'];
$contacorrente = $_POST['contacorrente'];
	
$categoria_conta = $_POST['categoria_conta'];


if($recebido=="Sim"){
	
$sql = "SELECT * FROM contas_bancarias where estab_pertence = '$estab_pertence' and banco = '$bco_operacao' and contacorrente = '$contacorrente' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$agencia = $linha[2];
$tipoconta = $linha[4];
$especie = $linha[5];

}

	
$sql50 = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res50 = mysql_query($sql50);
while($linha=mysql_fetch_row($res50)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[15];
	
	$estab_pertence = $linha[44];
$funcao = $linha[43];
$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$obra_operador = $linha[50];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];

$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$fornecedores = $linha[66];
$controlekm_autorizado = $linha[75];
$orcamento_autorizado = $linha[76];
$permissao_categoria_de_produtos_autorizado = $linha[77];
	
$recebenotificacao = $linha[49];
	$iniciar_rdo_diferenciado = $linha[51];
	$estoque = $linha[54];
	$conciliacoes = $linha[55];
	//$despesas = $linha[56];
	//$veiculos = $linha[57];
	//$rdo = $linha[58];
	$rdo_autorizado = $linha[58];
	$avisodepecas = $linha[59];
	$administracartaoponto = $linha[61];
	$relatoriodepecasutilizadas = $linha[65];
	$fornecedores = $linha[66];
	$inventario = $linha[67];
	$estoque_entradas = $linha[68];
	$cadastro_de_itens = $linha[69];
	$alimentacao_rdo = $linha[70];
	$estoque_entradas_por_xml_autorizado = $linha[71];
	$veiculodaempresa = $linha[72];
	$controlekm = $linha[75];
	$orcamento = $linha[76];
	$permissao_categoria_de_produtos = $linha[77];
	$inclui_mais_uma_nf = $linha[78];
	$financeiro = $linha[79];
	$relatoriodecomissao = $linha[80];
	$registrodeoperadores = $linha[81];
	$abrir_e_fechar_cx = $linha[82];
	$editar_produtos = $linha[83];
	$quantitativo_do_item_no_estoque = $linha[84];
}

	
	
	


$sql2 = "SELECT * FROM contas_a_receber where codigo = '$cod_contas_a_receber'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$cod_contas_a_receber = $linha[0];

$num_fatura = $linha[1];
	$codigo_orcamento = $linha[36];

$datacadastro = $linha[2];

$horacadastro = $linha[3];

//$estab_pertence = $linha[17];

$cpf = $linha[5];

$valor_a_receber = $linha[7];

$vencto = $linha[8];

$quantparc = $linha[9];

//$modopagto = $linha[10];

$quitacao = $linha[13];

$historico = $linha[30];

$num_mensalidade = $linha[31];

$categoria_conta = $linha[34];

$codigo_cliente = $linha[35];

$cliente = $linha[4];

//$bco_operacao = $linha[32];

$data_do_vencto = explode("-", $vencto);


$ano_do_vencto = $data_do_vencto[0];

$mes_do_vencto = $data_do_vencto[1];

$dia_do_vencto = $data_do_vencto[2];


$data_vencto_brasileira = "$dia_do_vencto-$mes_do_vencto-$ano_do_vencto";

}

	
$dia_recebimento = $_POST['dia_recebimento'];
$mes_recebimento = $_POST['mes_recebimento'];
$ano_recebimento = $_POST['ano_recebimento'];



$quant_parc = $_POST['quant_parc'];
$hora_baixa = $_POST['hora_baixa'];
//$bco_operacao = $_POST['bco_operacao'];

$valor_original_recebido = $_POST['valor_a_receber'];
$valor_com_juros_recebido = bcadd($valor_original_recebido,$juros_ativos,2);

$datacadastro = "$dia_recebimento-$mes_recebimento-$ano_recebimento";
$datecadastro = "$ano_recebimento-$mes_recebimento-$dia_recebimento";
$datereebimento = "$ano_recebimento-$mes_recebimento-$dia_recebimento";

$horacadastro = "$hora_baixa";
$dia = $dia_recebimento;
$mes = $mes_recebimento;
$ano = $ano_recebimento;

$sql3 = "SELECT * FROM bco_entradas where cod_contas_a_receber = '$cod_contas_a_receber'";
$res3 = mysql_query($sql3);
$lancamentos = mysql_num_rows($res3);

if($lancamentos>=1){

echo "Valor referente a recebimento de $cliente já registrado na entrada do banco!!!... Por essa razão não foi lançado novamente!<br> ";

}
else{

if($modopagto=="CARTAO"){

$comando = "insert into bco_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,cpf,operador,estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,codigo_orcamento,nome,num_cheque,banco,agencia,contacorrente,tipoconta,especie,departamento,juros_ativos,valor_original,modopagto) 

values('$valor_com_juros_recebido','$dia','$mes','$ano','$datacadastro','$horacadastro','$estab_pertence','Fatura $num_fatura, Orcamento $codigo_orcamento - Recebimento de parcela $num_mensalidade de $quant_parc - CPF $cpf','$categoria_conta','$datecadastro','$cpf','$operador','$estab_pertence','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$codigo_orcamento','$cliente','$num_cheque','$bco_operacao','$agencia','$contacorrente','$tipoconta','$especie','$estab_pertence','$juros_ativos','$valor_original_recebido','$modopagto')";

mysql_query($comando,$conexao);

echo "<br> Recebimento de $cliente no valor original de R$ $valor_a_receber com juros ativos de R$ $juros_ativos total recebdibo R$ $valor_com_juros_recebido. lançada na entrada de banco com sucesso sob o codigo $cod_contas_a_receber !!!!<br>";

}
else{
	
	$especificacao = "PAGTO PARCELA";
	
$comando = "insert into cx_entradas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_receber,num_mensalidade,num_orcamento,setor,valor_recebido,troco,departamento,modo_pagto,especificacao,saldo_a_parcelar,sub_categoria,num_cheque) 

values('$valor_com_juros_recebido','$dia_recebimento','$mes_recebimento','$ano_recebimento','$datacadastro','$horacadastro','$estab_pertence','Fatura $num_fatura, Recebimento de entrada $num_mensalidade de $quant_parc - Cliente $cliente CPF $cpf','$categoria_conta','$datecadastro','$cliente','$cpf','$operador','$celular_op','$email_op','$estab_pertence','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_receber','$num_mensalidade','$codigo_orcamento','$setor','$valor_com_juros_recebido','$troco','$estab_pertence','$modopagto','$especificacao','$saldo_a_parcelar','$sub_grupo','$num_cheque')";
mysql_query($comando,$conexao) or die("Erro ao gravar cx entradas!");
	
}



$sql4 = "select * from db";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {


$comando = "update `$linha[1]`.`contas_a_receber` set `quitacao`= 'Recebido',`juros_ativos`= '$juros_ativos',`valor_recebido`= '$valor_com_juros_recebido',`bco_operacao`= '$bco_operacao',`agencia`= '$agencia',`contacorrente`= '$contacorrente',`tipoconta`= '$tipoconta',`num_cheque`= '$num_cheque',`especie`= '$especie',`daterecebimento`= '$datereebimento',`operador_alterou`= '$operador' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber' limit 1 ";
	
	//$comando = "update `$linha[1]`.`contas_a_receber` set `quitacao`= 'Recebido',`juros_ativos`= '$juros_ativos',`valor_recebido`= '$valor_com_juros_recebido',`bco_operacao`= '$bco_operacao',`agencia`= '$agencia',`contacorrente`= '$contacorrente',`tipoconta`= '$tipoconta',`daterecebimento`= '$datereebimento',`operador_aterou`= '$operador' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber' limit 1 ";

}

mysql_query($comando,$conexao);


}

}

//---------------FIM DE LANÇAMENTO DE  RECEBIMENTO DE CONTA------------------------------
?>










  <form name="form1" method="post" action="verifica_contas_a_receber_por_periodo.php">

    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

    <input class="class01" type="submit" name="Submit22" value="Voltar">

    <strong>
    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "baixa_de_a_receber"; ?>">
    </strong>
    <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "$dia_inicial"; ?>">
    <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes_inicial"; ?>">
    <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano_inicial"; ?>">
    <input name="dia_final" type="hidden" id="dia_final" value="<? echo "$dia_final"; ?>">
    <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes_final"; ?>">
    <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano_final"; ?>">
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
          
          $sql = "select sum(valor_a_receber) as total_entradas from contas_a_receber where vencto between '$data_inicial'and '$data_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_entradas = $linha['total_entradas'];



echo "Total de contas a receber no periodo escolhido R$ ".$valor_total_entradas;

		  
          ?>
          </div></td>

        </tr>

  </table>
<table width="100%"  border="0">
  <tr bgcolor="#ffffff">
    <td><div align="center">Cliente</div></td>
    <td><div align="center">Categoria Despesa</div></td>
    <td><div align="center">Departamento</div></td>
    <td width="7%"><div align="center">Vencimento</div></td>
    <td><div align="center">Valor</div></td>
    <td><div align="center">Juros Passivos</div></td>
    <td><div align="center">Banco</div></td>
    <td><div align="center">Conta Corrente</div></td>
    <td><div align="center">N&ordm; Ch</div></td>
    <td><div align="center"> </div></td>
  </tr>
  <?

			





$sql = "SELECT * FROM contas_a_receber where estabelecimento = '$estab_pertence' and quitacao = 'Em Aberto' and vencto between '$data_inicial'and '$data_final' order by vencto asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;

$cod_contas_a_receber = $linha[0];

$num_fatura = $linha[1];
	$codigo_orcamento = $linha[36];

$datacadastro = $linha[2];

$horacadastro = $linha[3];

$estab_pertence = $linha[17];

$cpf = $linha[5];

$valor_a_receber = $linha[7];

$vencto = $linha[8];

$quantparc = $linha[9];

$modopagto = $linha[10];

$quitacao = $linha[13];

$historico = $linha[30];

$num_mensalidade = $linha[31];

$categoria_conta = $linha[34];

$codigo_cliente = $linha[35];

$cliente = $linha[4];

$bco_operacao = $linha[32];

$data_do_vencto = explode("-", $vencto);


$ano_do_vencto = $data_do_vencto[0];

$mes_do_vencto = $data_do_vencto[1];

$dia_do_vencto = $data_do_vencto[2];


$data_vencto_brasileira = "$dia_do_vencto-$mes_do_vencto-$ano_do_vencto";

?>
  <form name="form2" method="post" action="verifica_mensalidades_a_receber.php">
    <tr>
      <td width="13%"><div align="center">
        <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
        <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
        <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
        <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
        <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
        <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
        <? echo $cliente; ?></div></td>
      <td width="11%"><div align="center"><? echo $categoria_conta; ?></div></td>
      <td width="10%"><div align="center"><? echo $departamento; ?></div></td>
      <td><div align="center"><? echo $data_vencto_brasileira; ?></div></td>
      <td width="9%"><div align="center"><? echo "R$ ".$valor_a_receber; ?></div></td>
      <td width="7%"><div align="center">
        <input class="class02" name="juros_ativos" type="text" id="juros_ativos" value="0.00" size="5">
      </div></td>
      <td width="8%"><div align="center">
        <select class="class02" name="bco_operacao" id="bco_operacao">
          <option selected></option>
          <?

    $sql = "select * from contas_bancarias where estab_pertence = '$estab_pertence' group by banco order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>
        </select>
      </div></td>
      <td width="8%"><div align="center">
        <select class="class02" name="contacorrente" id="contacorrente">
          <option selected></option>
          <?

    $sql = "select * from contas_bancarias where estab_pertence = '$estab_pertence' order by contacorrente asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['contacorrente']."</option>";

    }

?>
        </select>
      </div></td>
      <td width="6%"><div align="center">
        <input class="class02" name="num_cheque" type="text" id="num_cheque" size="10">
      </div></td>
      <td width="21%"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$dia_pagamento = date('d');
$mes_pagamento = date('m');
$ano_pagamento = date('Y');

?>
        <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
        <input name="modopagto" type="hidden" id="modopagto" value="<? echo $modopagto; ?>">
        <input name="cod_contas_a_receber" type="hidden" id="cod_contas_a_receber" value="<? echo $cod_contas_a_receber; ?>">
        <input name="num_mensalidade" type="hidden" id="num_mensalidade" value="<? echo $num_mensalidade; ?>">
        <input name="quant_parc" type="hidden" id="quant_parc" value="<? echo $quantparc; ?>">
        <select class="class02" name="dia_recebimento" id="dia_recebimento">
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
        <select class="class02" name="mes_recebimento" id="mes_recebimento">
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
        <select class="class02" name="ano_recebimento" id="ano_recebimento">
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
        <input name="valor_a_receber" type="hidden" id="valor_a_receber" value="<? echo $valor_a_receber; ?>">
        <input name="departamento" type="hidden" id="departamento" value="<? echo $estab_pertence; ?>">
        <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
      <input name="categoria_conta" type="hidden" id="categoria_conta" value="<? echo $categoria_conta; ?>">
      <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">      <input class="class01" type="submit" name="Submit" value="Baixar"></td>
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
