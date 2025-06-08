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

//--------------------INICIO LANÇAMENTO DE PAGAMENTO ------------------------------------
$num_fatura = $_POST['num_fatura'];
$num_mensalidade = $_POST['num_mensalidade'];
$cod_contas_a_pagar = $_POST['cod_contas_a_pagar'];
$pago = $_POST['pago'];
$juros = $_POST['juros'];
$num_cheque = $_POST['num_cheque'];
$departamento = $_POST['departamento'];
	$estab_pertence = $_POST['estab_pertence'];


	$bco_operacao = $_POST['bco_operacao'];
$contacorrente = $_POST['contacorrente'];
	$modopagto = $_POST['modopagto'];
	$estab_pertence = $_POST['estab_pertence'];



if($pago=="Sim"){
	
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

	
	
	


$sql2 = "SELECT * FROM contas_a_pagar where codigo = '$cod_contas_a_pagar'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$cod_contas_a_pagar = $linha[0];

$num_fatura = $linha[1];

$datacadastro = $linha[2];

$horacadastro = $linha[6];

$nfantasia = $linha[7];

$cpf = $linha[8];

$obs = $linha[9];

$vencto = $linha[11];

$quantparc = $linha[12];

$modopagto = $linha[13];

$quitacao = $linha[16];

$historico = $linha[33];

//$num_mensalidade = $linha[34];


$categoria_conta = $linha[37];

$codigo_fornecedor = $linha[38];

$codigo_orcamento = $linha[39];

$fornecedor = $linha[41];

$departamento = $linha[63];
	
$num_doc = $linha[68];

}

	
$dia_pagamento = $_POST['dia_pagamento'];
$mes_pagamento = $_POST['mes_pagamento'];
$ano_pagamento = $_POST['ano_pagamento'];



$quantparc = $_POST['quantparc'];
	
$hora_baixa = $_POST['hora_baixa'];


$valor_original_pago = $_POST['valor_a_pagar'];
$valor_com_juros_pago = bcadd($valor_original_pago,$juros,2);

$datacadastro = "$dia_pagamento-$mes_pagamento-$ano_pagamento";
$datecadastro = "$ano_pagamento-$mes_pagamento-$dia_pagamento";
$datepagto = "$ano_pagamento-$mes_pagamento-$dia_pagamento";

$horacadastro = "$hora_baixa";
$dia = $dia_recebimento;
$mes = $mes_recebimento;
$ano = $ano_recebimento;

$sql3 = "SELECT * FROM bco_saidas where cod_contas_a_pagar = '$cod_contas_a_pagar'";
$res3 = mysql_query($sql3);
$lancamentos = mysql_num_rows($res3);

if($lancamentos>=1){

echo "Valor referente a conta $fornecedor já registrado na saida do banco!!!... Por essa razão não foi lançado novamente!<br> ";

}
else{

if($modopagto=="CARTAO"){
	
	$especificacao = "PAGTO PARCELA $num_mensalidade/$quantparc";

$comando = "insert into bco_saidas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,fornecedor,cpf,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_fatura,cod_contas_a_pagar,num_mensalidade,codigo_orcamento,nome,num_cheque,banco,agencia,contacorrente,tipoconta,departamento,modopagto,juros_passivos,valor_original,especificacao,especie) 

values('$valor_com_juros_pago','$dia_pagamento','$mes_pagamento','$ano_pagamento','$datacadastro','$horacadastro','$estabelecimento','$categoria_conta - $historico - Nº Doc. $num_doc','$categoria_conta','$datecadastro','$fornecedor','$cpf','$operador','$celular_op','$email_op','$estab_pertence','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_fatura','$cod_contas_a_pagar','$num_mensalidade','$codigo_orcamento','$nfantasia','$num_cheque','$banco','$agencia','$contacorrente','$tipoconta','$estab_pertence','$modopagto','$juros','$valor_original_pago','$especificacao','$especie')";


mysql_query($comando,$conexao);



echo "<br> Pagamento da conta $fornecedor no valor de R$ $valor_a_pagar lançada na saida de banco com sucesso!!!!<br>";

}
else{
	
$especificacao = "PAGTO PARCELA $num_mensalidade/$quantparc";
	
$comando = "insert into cx_saidas(valor,dia,mes,ano,datacadastro,horacadastro,nfantasia,historico,categoria_conta,datecadastro,nome,cpf,operador,estabelecimento,num_fatura,num_mensalidade,codigo_orcamento,setor,valor_original,departamento,modopagto,especificacao,juros_passivos,num_cheque,cod_contas_a_pagar,banco,agencia,contacorrente,tipoconta,especie,fornecedor) 

values('$valor_com_juros_pago','$dia_pagamento','$mes_pagamento','$ano_pagamento','$datacadastro','$horacadastro','$estab_pertence','$categoria_conta - $historico - Nº Doc. $num_doc','$categoria_conta','$datecadastro','$cliente','$cpf','$operador','$estab_pertence','$num_fatura','$num_mensalidade','$codigo_orcamento','$setor','$valor_original_pago','$estab_pertence','$modopagto','$especificacao','$juros','$num_cheque','$cod_contas_a_pagar','$bco_operacao','$agencia','$contacorrente','$tipoconta','$especie','$fornecedor')";
mysql_query($comando,$conexao) or die("Erro ao gravar cx entradas!");
	
}



$sql4 = "select * from db";

$res4 = mysql_query($sql4);

while($linha=mysql_fetch_row($res4)) {





$comando = "update `$linha[1]`.`contas_a_pagar` set `codigo` = '$cod_contas_a_pagar',`quitacao`= 'pago',`juros`= '$juros',`banco`= '$banco',`agencia`= '$agencia',`contacorrente`= '$contacorrente',`num_cheque`= '$num_cheque',`tipoconta`= '$tipoconta',`datepagto`= '$datepagto' where `contas_a_pagar`. `codigo` = '$cod_contas_a_pagar' limit 1 ";

}



mysql_query($comando,$conexao);


}

}

//---------------FIM DE LANÇAMENTO DE  PAGAMENTO DE CONTA------------------------------
?>










  <form name="form1" method="post" action="menu.php">

    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

    <input class="class01" type="submit" name="Submit22" value="Voltar">

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
      <td width="13%"><div align="center">
        <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
        <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
        <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
        <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
        <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
        <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
        <? echo $nfantasia; ?></div></td>
      <td width="10%"><div align="center"><? echo $categoria_conta; ?></div></td>
      <td width="9%"><div align="center"><? echo $departamento; ?></div></td>
      <td><div align="center"><? echo $data_vencto_brasileira; ?></div></td>
      <td width="8%"><div align="center"><? echo "R$ ".$valor_a_pagar; ?></div></td>
      <td width="7%"><div align="center">
        <input class="class02" name="juros" type="text" id="juros" value="0.00" size="5">
      </div></td>
      <td width="10%"><div align="center">
        <select class="class02" name="banco" id="banco">
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
      <td width="10%"><div align="center">
        <select class="class02" name="contacorrente" id="contacorrente">
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
      <td width="10%"><div align="center">
        <input class="class02" name="num_cheque" type="text" id="num_cheque" size="10">
      </div></td>
      <td width="16%"><?

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
        <select class="class02" name="dia_pagamento" id="dia_pagamento">
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
        <select class="class02" name="mes_pagamento" id="mes_pagamento">
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
        <select class="class02" name="ano_pagamento" id="ano_pagamento">
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
        <input name="departamento" type="hidden" id="departamento" value="<? echo $departamento; ?>">
        <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
        <input name="modopagto" type="hidden" id="modopagto" value="<? echo $modopagto; ?>">
        <input name="num_mensalidade2" type="hidden" id="num_mensalidade2" value="<? echo $num_mensalidade; ?>">
<input class="class01" type="submit" name="Submit" value="Baixar"></td>
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
