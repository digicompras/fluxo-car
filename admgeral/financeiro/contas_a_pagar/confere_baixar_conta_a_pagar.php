<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>

<html>

<head>

<title>Contas a Pagar</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style1 {

	color: #FF0000;

	font-weight: bold;

	font-size: 24px;

}

.style2 {color: #0000FF}

.style3 {color: #FF0000}

.style4 {font-size: 18px}

-->

</style></head>



<?



require '../../../conect/conect.php';


$cod_contas_a_pagar = $_POST['cod_contas_a_pagar'];


$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

			

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





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

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



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


<p align="center" class="style1">Aten&ccedil;&atilde;o! <span class="style2">

  <? echo $nome_op; ?> 

<span class="style3">... <span class="style4">Voc&ecirc; est&aacute; ALTERANDO uma obriga&ccedil;&atilde;o no contas a pagar..... </span></span></span></p>

<p align="center" class="style1"><span class="style2"><span class="style3"><span class="style4">Verifique atentamente se os dados est&atilde;o corretos e fa&ccedil;a as observa&ccedil;&otilde;es necess&aacute;rias!

</span></span></span></p>

<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit2" value="Voltar">

</form>

<form name="form2" method="post" action="grava_editar.php">
  <?

			





$sql = "SELECT * FROM contas_a_pagar where codigo = '$cod_contas_a_pagar' and quitacao = 'Em Aberto'";

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

$estabelecimento = $linha[20];

$historico = $linha[33];

$num_mensalidade = $linha[34];

$banco = $linha[35];

$categoria_conta = $linha[37];

$codigo_fornecedor = $linha[38];

$fornecedor = $linha[41];

$contacorrente = $linha[43];

$dia_evento = $linha[46];
$mes_evento = $linha[47];
$ano_evento = $linha[48];
$dateevento = $linha[49];
$hora_evento = $linha[50];
$minuto_evento = $linha[51];
$segundo_evento = $linha[52];
$horaevento = $linha[53];
$dia_vencto = $linha[54];
$mes_vencto = $linha[55];
$ano_vencto = $linha[56];





?>


  <table width="100%"  border="0">

    <tr>
      <td>N&ordm; Registro<? echo $cod_contas_a_pagar; ?> 
      <input name="cod_contas_a_pagar" type="hidden" id="cod_contas_a_pagar" value="<? echo $cod_contas_a_pagar; ?>"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td width="20%">Empresa</td>

      <td width="26%"><select name="empresa" id="select6">
        
        <option selected><? echo $nfantasia; ?></option>
        
        <?





    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
        
      </select></td>

      <td width="15%">&nbsp;</td>

      <td width="35%"><input name="num_mensalidade" type="hidden" id="num_mensalidade" value="<? echo $num_mensalidade; ?>">
        <input name="quantparc" type="hidden" id="quantparc" value="<? echo $quantparc; ?>">
        <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
        <input name="pago" type="hidden" id="pago" value="<? echo "Sim"; ?>">
        <strong><font color="#0000FF">
        <input name="hora_baixa" type="hidden" id="hora_baixa" value="<? echo date('H:i:s'); ?>">
      </font></strong></td>

    </tr>

    <tr>
      <td>Categoria despesa </td>
      <td><select name="categoria_conta" id="categoria_conta">
        <option selected><? echo $categoria_conta; ?></option>
        <?





    $sql = "select * from categorias_despesas order by categoria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['categoria']."</option>";

    }

?>
      </select></td>
      <td>Data do Pagto</td>
      <td><select name="dia_pagamento" id="dia_pagamento">
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
      </select></td>
    </tr>
    <tr>

      <td>Valor</td>

      <td><input name="valor_a_pagar" type="text" id="valor_a_pagar" value="<? echo $valor_a_pagar; ?>"></td>

      <td>Fornecedor</td>

      <td><select name="fornecedor" id="fornecedor">
        <option selected><? echo $fornecedor; ?></option>
        <?





    $sql = "select * from fornecedores order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
      </select></td>

    </tr>

    <tr>

      <td>Historico</td>

      <td rowspan="4"><textarea name="historico" cols="40" rows="6" id="historico"><? echo $historico; ?></textarea>      </td>

      <td valign="top">Modo Pagto </td>

      <td valign="top"><select name="modopagto" id="modopagto">

        <option selected><? echo $modopagto; ?></option>

        <?





    $sql = "select * from modo_pagto order by modopagto asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['modopagto']."</option>";

    }

?>

      </select></td>

    </tr>

    <tr>

      <td><input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
        <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
        <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
        <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
        <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
      <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>"></td>

      <td valign="top">N&ordm; Cheque </td>

      <td valign="top"><input name="num_cheque" type="text" id="num_cheque" value="<? echo $num_cheque; ?>"></td>

    </tr>

    <tr>

      <td rowspan="2">&nbsp;</td>

      <td valign="top">Banco</td>

      <td valign="top"><select name="banco" id="banco">
        <option selected><? echo $banco; ?></option>
        <?





    $sql = "select * from contas_bancarias group by banco order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>
      </select></td>

    </tr>

    <tr>

      <td valign="top">Conta</td>

      <td valign="top"><select name="contacorrente" id="contacorrente">
        <option selected><? echo $contacorrente; ?></option>
        <?





    $sql = "select * from contas_bancarias order by contacorrente asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['contacorrente']."</option>";

    }

?>
      </select></td>

    </tr>

    <tr>

      <td colspan="2">        <input name="operador_alterou" type="hidden" id="operador_alterou" value="<? echo $nome_op; ?>">

        <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou" value="<? echo $celular_op; ?>">

        <input name="email_operador_alterou" type="hidden" id="email_operador_alterou" value="<? echo $email_op; ?>">

        <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou" value="<? echo $estab_pertence_op; ?>">

        <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou" value="<? echo $cidade_estab_pertence_op; ?>">

        <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou" value="<? echo $tel_estab_pertence_op; ?>">

        <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou" value="<? echo $email_estab_pertence_op; ?>">

      <input type="submit" name="Submit" value="Salvar"></td>

      <td>Vencimento</td>

      <td><select name="dia_vencto" id="dia_vencto">
        <option selected><? echo $dia_vencto; ?></option>
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
        <select name="mes_vencto" id="mes_vencto">
        <option selected><? echo $mes_vencto; ?></option>
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
        <select name="ano_vencto" id="ano_vencto">
          <?
		
		 $ano_atual = date('Y'); 
		
		 
		 ?>
        <option selected><? echo $ano_vencto; ?></option>
        <option>
            <? $ano_anterior = bcsub($ano_atual,1); echo $ano_anterior; ?>
          </option>
          <option><? echo $ano_atual; ?></option>
          <option>
            <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
          </option>
      </select></td>

    </tr>

  </table>
  
  <? } ?>

</form>

<p>&nbsp;</p>

<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>