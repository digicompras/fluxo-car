<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

$senha = $_SESSION['senha'];

ini_set('default_charset','UTF8_general_mysql500_ci');
?>



<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style1 {	font-size: 18px;

	font-weight: bold;

	color: #0000FF;

}
.style3 {color: #0000FF; font-weight: bold;  }

-->

</style>

</head>



<?

require '../../../conect/conect.php';
include '../../../css_menus/modal.css';
include '../../../css_menus/modal2.css';
error_reporting(E_ALL);
error_reporting( E_ALL ^E_NOTICE );

$anoatual = date('Y');
$mesatual = date('m');
$diaatual = date('d');


$anoanterior = bcsub($anoatual,1);
$anoposterior = bcadd($anoatual,1);

$num_doc = $_POST['num_doc'];

$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$data_final = "$ano_final-$mes_final-$dia_final";


?>


<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
	<?
	
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
	
<body background="../../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

  <table width="100%" border="0" cellspacing="0">

    <tr>

      <td colspan="2">





</td>

    </tr>

    <tr>

      <td width="19%">&nbsp;</td>

      <td><strong><font color="#0000FF" size="4">VOCE ESTA NO CONTAS A PAGAR. <? echo "$estab_pertence"; ?></font></strong></td>

    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td><div align="center"><strong>PARA REALIZA PAGAMENTOS</strong></div></td> 

      <td><form name="form3" method="post" action="verifica_mensalidades_por_periodo.php">
        <span class="style1">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        </span>De

        <select class="class02" name="dia_inicial" id="select3">
          <option selected>01</option>
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
        <select class="class02" name="mes_inicial" id="mes_inicial">
          <option selected><? echo $mesatual; ?></option>
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
        <select class="class02" name="ano_inicial" id="ano_inicial">
          <option selected><? echo $anoatual; ?></option>
          <option> <? echo $anoanterior; ?></option>
          <option><? echo $anoposterior; ?></option>
        </select>
at&eacute;
<select class="class02" name="dia_final" id="select11">
  <option selected>31</option>
  <option>30</option>
  <option>29</option>
  <option>28</option>
  <option>27</option>
  <option>26</option>
  <option>25</option>
  <option>24</option>
  <option>23</option>
  <option>22</option>
  <option>21</option>
  <option>20</option>
  <option>19</option>
  <option>18</option>
  <option>17</option>
  <option>16</option>
  <option>15</option>
  <option>14</option>
  <option>13</option>
  <option>12</option>
  <option>11</option>
  <option>10</option>
  <option>09</option>
  <option>08</option>
  <option>07</option>
  <option>06</option>
  <option>05</option>
  <option>04</option>
  <option>03</option>
  <option>02</option>
  <option>01</option>
</select>
<select class="class02" name="mes_final" id="select12">
  <option selected><? echo $mesatual; ?></option>
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
<select class="class02" name="ano_final" id="select13">
  <option selected><? echo $anoatual; ?></option>
  <option> <? echo $anoanterior; ?></option>
  <option><? echo $anoposterior; ?></option>
</select>
<input class="class01" type="submit" name="button" id="button" value="Buscar para pagar/baixar">
      </form></td>

    </tr>

  </table>
  <br>

<table width="100%" border="0">
    <tr>
      <td colspan="3" bgcolor="#CCCCCC"><div align="center"><strong>EDI&Ccedil;&Atilde;O DO CONTAS A PAGAR - PESQUISE PARA FAZER ALTERA&Ccedil;&Otilde;ES</strong></div></td>
    </tr>
    <tr>
      <td width="41%"><form name="form3" method="post" action="menu.php">
        <span class="style1">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        </span>De
        <select class="class02" name="dia_inicial" id="dia_inicial">
          <option selected>01</option>
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
        <select class="class02" name="mes_inicial" id="mes_inicial">
          <option selected><? echo $mesatual; ?></option>
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
        <select class="class02" name="ano_inicial" id="ano_inicial">
          <option selected><? echo $anoatual; ?></option>
          <option> <? echo $anoanterior; ?></option>
          <option><? echo $anoposterior; ?></option>
        </select>
        at&eacute;
  <select class="class02" name="dia_final" id="dia_final">
    <option selected>31</option>
    <option>30</option>
    <option>29</option>
    <option>28</option>
    <option>27</option>
    <option>26</option>
    <option>25</option>
    <option>24</option>
    <option>23</option>
    <option>22</option>
    <option>21</option>
    <option>20</option>
    <option>19</option>
    <option>18</option>
    <option>17</option>
    <option>16</option>
    <option>15</option>
    <option>14</option>
    <option>13</option>
    <option>12</option>
    <option>11</option>
    <option>10</option>
    <option>09</option>
    <option>08</option>
    <option>07</option>
    <option>06</option>
    <option>05</option>
    <option>04</option>
    <option>03</option>
    <option>02</option>
    <option>01</option>
  </select>
  <select class="class02" name="mes_final" id="mes_final">
    <option selected><? echo $mesatual; ?></option>
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
  <select class="class02" name="ano_final" id="ano_final">
    <option selected><? echo $anoatual; ?></option>
    <option> <? echo $anoanterior; ?></option>
    <option><? echo $anoposterior; ?></option>
  </select>
  <input class="class01" type="submit" name="button3" id="button3" value="Pesquisar e Alterar">
      </form></td>
      <td><div align="center">
        <?
          
          $sql = "select sum(valor_a_pagar) as total_entradas from contas_a_pagar where estabelecimento = '$estab_pertence' and vencto between '$data_inicial'and '$data_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_entradas = $linha['total_entradas'];



echo "Total de contas a pagar no periodo escolhido R$ ".$valor_total_entradas;

		  
          ?>
      </div></td>
      <td width="16%">&nbsp;</td>
    </tr>
</table>
<br>
<table width="100%"  border="0">
  <tr bgcolor="#ffffff">
    <td align="right">Pesquisa por N&ordm; Doc:</td>
    <td colspan="2" valign="middle"><form name="form1" method="post" action="menu.php">
      <span class="style3">
        <span class="style1">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        </span>
        <input name="num_doc" type="text" class="class02" id="num_doc" value="<? echo "$num_doc"; ?>">
        </span>
      <input class='class01' type=image src="../../../imagens_botoes/ok.png" width="50" height="50" name="submit7" id="submit7" value="Cupom">
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff">
    <td><div align="center">Empresa</div></td>
    <td><div align="center">N&ordm; Doc</div></td>
    <td><div align="center">N&ordm; Fatura / Historico</div></td>
    <td><div align="center">Fornecedor</div></td>
    <td width="9%"><div align="center">Valor</div></td>
    <td><div align="center">Quita&ccedil;&atilde;o</div></td>
    <td><div align="center"> </div></td>
  </tr>
  <?
if(empty($num_doc)){

$sql = "SELECT * FROM contas_a_pagar where estabelecimento = '$estab_pertence' and dia <> '0' and quitacao = 'Em Aberto' and vencto between '$data_inicial'and '$data_final' order by vencto asc";
}
else{
$sql = "SELECT * FROM contas_a_pagar where estabelecimento = '$estab_pertence' and dia <> '0' and quitacao = 'Em Aberto' and num_doc like '%$num_doc%' order by num_doc asc";
}
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

$num_doc = $linha[68];

$data_do_vencto = explode("-", $vencto);


$ano_do_vencto = $data_do_vencto[0];

$mes_do_vencto = $data_do_vencto[1];

$dia_do_vencto = $data_do_vencto[2];


$data_vencto_brasileira = "$dia_do_vencto-$mes_do_vencto-$ano_do_vencto";
?>
  <form name="form2" method="post" action="editar.php">
    <tr>
      <td width="14%"><div align="center"><? echo $data_vencto_brasileira; ?></div></td>
      <td width="15%"><div align="center"><? echo "$num_doc"; ?></div></td>
      <td width="20%"><div align="center"><? echo "$num_fatura $historico"; ?></div></td>
      <td width="10%"><div align="center"><? echo $fornecedor; ?></div></td>
      <td><div align="center"><? echo "R$ ".$valor_a_pagar; ?></div></td>
      <td width="9%"><div align="center"><? echo $quitacao; ?></div></td>
      <td width="9%"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$dia_pagamento = date('d');
$mes_pagamento = date('m');
$ano_pagamento = date('Y');

?>
        <input name="cod_contas_a_pagar" type="hidden" id="cod_contas_a_pagar" value="<? echo $cod_contas_a_pagar; ?>">
      <input class="class01" type="submit" name="Submit2" value="Editar">
      <input name="dia_inicial2" type="hidden" id="dia_inicial2" value="<? echo $dia_inicial; ?>">
      <input name="mes_inicial2" type="hidden" id="mes_inicial2" value="<? echo $mes_inicial; ?>">
      <input name="ano_inicial2" type="hidden" id="ano_inicial2" value="<? echo $ano_inicial; ?>">
      <input name="dia_final2" type="hidden" id="dia_final2" value="<? echo $dia_final; ?>">
      <input name="mes_final2" type="hidden" id="mes_final2" value="<? echo $mes_final; ?>">
      <input name="ano_final2" type="hidden" id="ano_final2" value="<? echo $ano_final; ?>"></td>
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
<p>&nbsp;</p>

</body>

</html>

