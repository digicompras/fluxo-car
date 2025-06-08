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



$banco = $_POST['banco'];
$contacorrente = $_POST['contacorrente'];


$sql = "SELECT * FROM contas_bancarias where banco = '$banco' and contacorrente = '$contacorrente' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$agencia = $linha[2];
$tipoconta = $linha[4];

}



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

.style3 {

	color: #FFFFFF;

	font-weight: bold;

}

.style8 {color: #000000}

.style9 {color: #000000; font-weight: bold; }

.style11 {font-size: 10px}

.style12 {color: #000000; font-weight: bold; font-size: 10px; }

.style10 {font-size: 10px;

	font-weight: bold;

}

-->

</style>

<body bgcolor="#ffffff" background="../background/" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0"> 

  



  










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



}

?>

  <table width="100%"  border="0">

        <tr>

          <td bgcolor="#CCCCCC"><div align="center"><span class="style2">

</span> <span class="style1"><? echo $nome_op; ?></span><span class="style2"> verificando os lan&ccedil;amentos do banco <? echo $banco; ?> no periodo de <? echo "$data_inicial ate $data_final"; ?><BR>

	      </span></div></td>

        </tr>

</table>

          

<div align="center"></div>

     <div align="center"></div></td>

    </tr>

    <tr>

      <td colspan="2" valign="top"><div align="center">

        </div></td>

    </tr>

    <tr>

      <td valign="top"><div align="center">

        <table width="100%"  border="0">

          <tr>

            <td colspan="3"><div align="center">

              <table width="100%"  border="1">

                <tr bgcolor="#CCCCCC">

                  <td colspan="2"><div align="center"><strong>EXTRATO BANCARIO BANCO <? echo "$banco"; ?></strong></div></td>

                </tr>

                <tr bgcolor="ffffff">

                  <td width="49%"><div align="center" class="style8 style3"></div></td>

                  <td width="51%"><div align="center" class="style9">

                      <?

			





$sql = "SELECT * FROM bco_entradas where datepagto between '$data_inicial'and '$data_final' and banco = '$banco' and agencia = '$agencia' and contacorrente = '$contacorrente' and tipoconta = '$tipoconta' order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;





$valor_abertura = $linha[25];

$historico = $linha[23];



}

?>

                      <? //echo "R$ ".$valor_abertura; ?></div></td>

                </tr>

              </table>

            </div></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

            <td>&nbsp;</td>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td width="49%" valign="top"><table width="100%"  border="1">

              <tr bgcolor="#CCCCCC">

                <td colspan="6"><div align="center"><strong>Entradas</strong></div></td>
              </tr>

              <tr bgcolor="ffffff">

                <td width="15%"><div align="center" class="style10">Data</div></td>

                <td width="23%"><div align="center" class="style3 style8 style11">Valor </div></td>

                <td><div align="center" class="style11"><strong>Categoria</strong></div></td>

                <td><div align="center" class="style11"><span class="style10">Registro</span></div></td>

                <td><div align="center" class="style11"><strong>Cliente</strong></div></td>
                <td><div align="center" class="style12">Hist&oacute;rico</div></td>
              </tr>

              <?

			



$sql = "SELECT * FROM bco_entradas where datepagto between '$data_inicial'and '$data_final' and banco = '$banco' and agencia = '$agencia' and contacorrente = '$contacorrente' and tipoconta = '$tipoconta' order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;



$codigo = $linha[0];

$datacadastro = $linha[20];

$horacadastro = $linha[21];

$nfantasia = $linha[22];

$historico_entrada = $linha[23];

$categoria_conta_entrada = $linha[24];

$valor_entrada = $linha[25];

$num_sete_um = $linha[26];

$modo_pagto = $linha[27];

$nome_cli = $linha[31];

$diapagto = $linha[56];
$mespagto = $linha[57];
$anopagto = $linha[58];

$datepagto = $linha[59];


?>

              <tr>

                <td><div align="center" class="style11"><? echo "$diapagto-$mespagto-$anopagto"; ?></div></td>

                <td><div align="center" class="style11"><? echo "R$ ". $valor_entrada; ?> </div></td>

                <td width="29%"><div align="center" class="style11"><? echo $categoria_conta_entrada; ?></div></td>

                <td width="33%"><div align="center"><span class="style11"><? echo $codigo; ?></span></div></td>

                <td width="33%"><div align="center"><span class="style11"><? echo $nome_cli; ?></span></div></td>
                <td width="33%">

                  <div align="center" class="style11"><? echo $historico_entrada; ?></div></td>
              </tr>

              <? } ?>

              <tr>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><span class="style11"></span></td>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><div align="center"></div></td>
                <td><span class="style11"></span></td>
              </tr>

              <tr>

                <td colspan="6"><div align="center"><strong> Total

                          <?




$sql = "select sum(valor) as total_entradas from bco_entradas where datepagto between '$data_inicial'and '$data_final' and banco = '$banco' and agencia = '$agencia' and contacorrente = '$contacorrente' and tipoconta = '$tipoconta'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_entradas = $linha['total_entradas'];


$formatando_valor_total_entradas = bcadd($valor_total_entradas,0,2);
echo "R$ ".$formatando_valor_total_entradas;

?>

                </strong></div></td>
              </tr>

            </table></td>

            <td width="2%">&nbsp;</td>

            <td width="49%" valign="top"><table width="100%"  border="1">

              <tr bgcolor="#CCCCCC">

                <td colspan="6"><div align="center"><strong>Sa&iacute;das</strong></div></td>

              </tr>

              <tr bgcolor="ffffff">

                <td width="12%"><div align="center" class="style11"><strong>Data</strong></div></td>

                <td width="15%"><div align="center" class="style3 style8 style11">Valor</div></td>

                <td><div align="center" class="style11"><strong>Categoria</strong></div></td>

                <td><div align="center" class="style10">Registro</div></td>

                <td><div align="center" class="style10">Modo Pagto </div></td>

                <td><div align="center" class="style12">Hist&oacute;rico</div></td>

              </tr>

			                  <?

			



$sql = "SELECT * FROM bco_saidas where datepagto between '$data_inicial'and '$data_final' and banco = '$banco' and agencia = '$agencia' and contacorrente = '$contacorrente' and tipoconta = '$tipoconta' order by datecadastro asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;



$codigo = $linha[0];

$datacadastro = $linha[20];

$horacadastro = $linha[21];

$nfantasia = $linha[22];

$historico_saida = $linha[23];

$categoria_conta_saida = $linha[24];

$valor_saida = $linha[25];

$num_sete_um = $linha[26];

$modo_pagto = $linha[27];

$diapagtosaida = $linha[56];

$mespagtosaida = $linha[57];

$anopagtosaida = $linha[58];

?>



              <tr>

                <td><div align="center"><span class="style11"><? echo "$diapagtosaida-$mespagtosaida-$anopagtosaida"; ?></span></div></td>

                <td><div align="center" class="style11"><? echo "R$ ". $valor_saida; ?> </div></td>

                <td width="21%"><div align="center"><span class="style11"><? echo $categoria_conta_saida; ?></span></div></td>

                <td width="10%"><div align="center"><span class="style11"><? echo $codigo; ?></span></div></td>

                <td width="15%"><div align="center"><span class="style11"><? echo $modo_pagto; ?></span></div></td>

                <td width="27%">

                  <div align="center" class="style11"><? echo $historico_saida; ?></div></td>

              </tr>

              <? } ?>

              <tr>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><span class="style11"></span></td>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><span class="style11"></span></td>

              </tr>

              <tr>

                <td colspan="6"><div align="center"><strong> Total

                          <?




$sql = "select sum(valor) as total_saidas from bco_saidas where datepagto between '$data_inicial'and '$data_final' and banco = '$banco' and agencia = '$agencia' and contacorrente = '$contacorrente' and tipoconta = '$tipoconta'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_saidas = $linha['total_saidas'];


$formatando_valor_total_saidas = bcadd($valor_total_saidas,0,2);
echo "R$ ".$formatando_valor_total_saidas;

?>

                </strong></div></td>

              </tr>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

            <td>&nbsp;</td>

            <td>&nbsp;</td>

          </tr>

        </table>

      </div>

    <br>

<table width="100%"  border="1">

  <tr>

    <td width="33%"><div align="right"></div></td>

    <td width="34%" bgcolor="#CCCCCC"><div align="left"></div>      

    <div align="center" class="style2">Saldo 

      <?

$saldo = bcsub($valor_total_entradas,$valor_total_saidas,2);



echo "R$ ".$saldo;

?>

    </div></td>

    <td width="33%">&nbsp;</td>

  </tr>

</table><br><br>

<p>&nbsp;</p>

