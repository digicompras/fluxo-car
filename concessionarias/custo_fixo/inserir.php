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
<?

require '../../conect/conect.php';


$senha = $_SESSION['senha'];
	
$sql50 = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res50 = mysql_query($sql50);
while($linha=mysql_fetch_row($res50)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];
$classificacao_operador = $linha[88];
	
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
	$categoria_despesas = $linha[85];
	$cadastro_de_contas_bancarias = $linha[86];
	$aliquotas_dos_cartoes = $linha[87];
	$retira_itens_do_orcamento = $linha[89];
	$vendas = $linha[90];
	
}


?>
<?

$dia_inicial1 = $_POST['dia_inicial'];
$dia_inicial2 = "01";
if(empty($dia_inicial1)){

$dia_inicial = $dia_inicial2;
	
}
else{
	
$dia_inicial = $dia_inicial1;
	
}

$mes_inicial1 = $_POST['mes_inicial'];
$mes_inicial2 = date('m');
if(empty($mes_inicial1)){

$mes_inicial = $mes_inicial2;
	
}
else{
	
$mes_inicial = $mes_inicial1;
	
}


$ano_inicial1 = $_POST['ano_inicial'];
$ano_inicial2 = date('Y');
if(empty($ano_inicial1)){

$ano_inicial = $ano_inicial2;
	
}
else{
	
$ano_inicial = $ano_inicial1;
	
}


$dia_final1 = $_POST['dia_final'];
$dia_final2 = 31;
if(empty($dia_final1)){

$dia_final = $dia_final2;
	
}
else{
	
$dia_final = $dia_final1;
	
}


$mes_final1 = $_POST['mes_final'];
$mes_final2 = date('m');
if(empty($mes_final1)){

$mes_final = $mes_final2;
	
}
else{
	
$mes_final = $mes_final1;
	
}


$ano_final1 = $_POST['ano_final'];
$dano_final2 = date('Y');
if(empty($ano_final1)){

$ano_final = $ano_final2;
	
}
else{
	
$ano_final = $ano_final1;
	
}


?>


<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
.style1 {font-weight: bold}
</style>
</head>



<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

<form name="form1" method="post" action="menu.php">

  <input class="class01" type="submit" name="Submit3" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
  <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
  <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
  <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
  <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
  <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
</form>

<form action="gravar.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>

    </tr>

    <tr>

      <td colspan="5"><strong><font color="#0000FF" size="4">Tela de cadastro de conta de custo fixo</font></strong></td>

    </tr>

    <tr>
      <td>Conta</td>
      <td>Categoria</td>
      <td>Data Vencimento</td>
      <td>Valor</td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td width="24%"><input class="class02" name="conta" type="text" id="conta" size="50" maxlength="50"></td>
      <td width="27%"><select class="class02" name="categoria" id="select">
        <option selected>Selecione</option>
        <?


    $sql = "select * from categorias_despesas where estab_pertence = '$estab_pertence' order by categoria asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>";
    }
?>
      </select></td>
      <td width="23%"><select class="class02" name="dia_vencto" id="dia_vencto">
        <option selected><?  ?></option>
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
          <option selected><?  ?></option>
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
        
        
        <option>
            <? $ano_anterior = bcsub($ano_atual,1); echo $ano_anterior; ?>
          </option>
          <option selected><? echo $ano_atual; ?></option>
          <option>
            <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
          </option>
      </select></td>
      <td width="13%"><input class="class02" type="text" name="valor" id="valor"></td>
      <td width="13%">&nbsp;</td>

    </tr>

    <tr>
      <td>Historico</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><textarea class="class02" name="historico" cols="50" rows="5" id="historico"></textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 

      <td>&nbsp;</td>
      <td><input class="class01" type="submit" name="Submit" value="Gravar"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>

    </tr>

    <tr> 

      <td colspan="5">&nbsp;</td>

    </tr>

  </table>

</form>
<p>&nbsp; </p>

</body>



</html>

<? 


mysql_close($conexao);

?>



