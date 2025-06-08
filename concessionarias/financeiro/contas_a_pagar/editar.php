<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");


ini_set('default_charset','UTF8_general_mysql500_ci');
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
.style31 {color: #0000FF; font-weight: bold;  }

-->

</style></head>



<?



require '../../../conect/conect.php';


$cod_contas_a_pagar = $_POST['cod_contas_a_pagar'];

?>





<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">



<?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



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





?>


<p align="center" class="style1">Aten&ccedil;&atilde;o! <span class="style2">

  <? echo $operador; ?> 

<span class="style3">... <span class="style4">Voc&ecirc; est&aacute; ALTERANDO uma obriga&ccedil;&atilde;o no contas a pagar da empresa </span></span></span><span class="style2"><? echo $estab_pertence; ?></span> ...</p>

<p align="center" class="style1"><span class="style2"><span class="style3"><span class="style4">Verifique atentamente se os dados est&atilde;o corretos e fa&ccedil;a as observa&ccedil;&otilde;es necess&aacute;rias!

</span></span></span></p>

<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input class="class01" type="submit" name="Submit2" value="Voltar">

</form>

<form name="form2" method="post" action="grava_editar.php">
  <?

$sql = "SELECT * FROM contas_a_pagar where estabelecimento = '$estab_pertence' and codigo = '$cod_contas_a_pagar' and quitacao = 'Em Aberto'";

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

$departamento = $linha[63];

$num_doc = $linha[68];

?>


  <table width="100%"  border="0">

    <tr>
      <td align="right"><strong>N&ordm; Registro<? echo $cod_contas_a_pagar; ?> 
      <input name="cod_contas_a_pagar" type="hidden" id="cod_contas_a_pagar" value="<? echo $cod_contas_a_pagar; ?>">
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td width="20%" align="right"><strong>Empresa</strong></td>

      <td width="26%"><select class="class02" name="empresa" id="empresa">
        
        <option selected><? echo $nfantasia; ?></option>
        
        <?

    $sql = "select * from estabelecimentos where nfantasia = '$estab_pertence' order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
        
      </select></td>

      <td width="15%" align="right"><strong>N&ordm; Doc</strong></td>

      <td width="35%"><span class="style31">
        <input name="num_doc" type="text" class="class02" id="num_doc" value="<? echo "$num_doc"; ?>">
      </span></td>

    </tr>

    <tr>
      <td align="right"><strong>Data do Evento</strong></td>
      <td><select class="class02" name="dia_evento" id="dia_evento">
        <option selected><? echo $dia_evento; ?></option>
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
        <select class="class02" name="mes_evento" id="mes_evento">
          <option selected><? echo $mes_evento; ?></option>
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
        <select class="class02" name="ano_evento" id="ano_evento">
          <?
		
		 $ano_atual = date('Y'); 
		
		 
		 ?>
          <option selected><? echo $ano_evento; ?></option>
          <option>
            <? $ano_anterior = bcsub($ano_atual,1); echo $ano_anterior; ?>
          </option>
          <option><? echo $ano_atual; ?></option>
          <option>
            <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
          </option>
      </select></td>
      <td align="right"><strong>Horario do Evento</strong></td>
      <td><select class="class02" name="hora_evento" id="hora_evento">
        <option selected><? echo $hora_evento; ?></option>
        <option>00</option>
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
      </select>
        <select class="class02" name="minuto_evento" id="minuto_evento">
          <option selected><? echo $minuto_evento; ?></option>
          <option>00</option>
          <option>05</option>
          <option>10</option>
          <option>15</option>
          <option>20</option>
          <option>25</option>
          <option>30</option>
          <option>35</option>
          <option>40</option>
          <option>45</option>
          <option>50</option>
          <option>55</option>
        </select>
        <select class="class02" name="segundo_evento" id="segundo_evento">
          <option selected><? echo $segundo_evento; ?></option>
          <option>00</option>
          <option>05</option>
          <option>10</option>
          <option>15</option>
          <option>20</option>
          <option>25</option>
          <option>30</option>
          <option>35</option>
          <option>40</option>
          <option>45</option>
          <option>50</option>
          <option>55</option>
      </select></td>
    </tr>
    <tr>
      <td align="right"><strong>Categoria despesa </strong></td>
      <td><select class="class02" name="categoria_conta" id="categoria_conta">
        <option selected><? echo $categoria_conta; ?></option>
        <?





    $sql = "select * from categorias_despesas order by categoria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['categoria']."</option>";

    }

?>
      </select></td>
      <td align="right"><strong>Departamento</strong></td>
      <td><select class="class02" name="departamento" id="departamento">
        <option selected><? echo $departamento; ?></option>
        <?


    $sql = "select * from estabelecimentos where nfantasia = '$estab_pertence' order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['departamento']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr>

      <td align="right"><strong>Valor</strong></td>

      <td><input class="class02" name="valor_a_pagar" type="text" id="valor_a_pagar" value="<? echo $valor_a_pagar; ?>"></td>

      <td align="right"><strong>Fornecedor</strong></td>

      <td><select class="class02" name="fornecedor" id="fornecedor">
        <option selected><? echo $fornecedor; ?></option>
        <?

    $sql = "select * from fornecedores where estab_pertence = '$estab_pertence' order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
      </select></td>

    </tr>

    <tr>

      <td align="right"><strong>Historico</strong></td>

      <td rowspan="4"><textarea class="class02" name="historico" cols="40" rows="6" id="historico"><? echo $historico; ?></textarea>      </td>

      <td align="right" valign="top"><strong>Modo Pagto </strong></td>

      <td valign="top"><select class="class02" name="modopagto" id="modopagto">

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

      <td align="right"><strong>
        <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
        <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
        <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
        <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
        <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
      <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
      </strong></td>

      <td align="right" valign="top"><strong>N&ordm; Cheque </strong></td>

      <td valign="top"><input class="class02" name="num_cheque" type="text" id="num_cheque" value="<? echo $num_cheque; ?>"></td>

    </tr>

    <tr>

      <td rowspan="2" align="right">&nbsp;</td>

      <td align="right" valign="top"><strong>Banco</strong></td>

      <td valign="top"><select class="class02" name="banco" id="banco">
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

      <td align="right" valign="top"><strong>Conta</strong></td>

      <td valign="top"><select class="class02" name="contacorrente" id="contacorrente">
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

      <input class="class01" type="submit" name="Submit" value="Salvar"></td>

      <td align="right"><strong>Vencimento</strong></td>

      <td><select class="class02" name="dia_vencto" id="dia_vencto">
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
        <select class="class02" name="mes_vencto" id="mes_vencto">
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
        <select class="class02" name="ano_vencto" id="ano_vencto">
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