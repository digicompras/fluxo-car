<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");


$senha = $_SESSION['senha'];
?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style3 {color: #0000FF; font-weight: bold; }
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}

-->

</style>

</head>

<?



require '../../conect/conect.php';
	
$dia_atual = date('d');

$mes_atual = date('m');

$ano_atual = date('Y');
	
$ano_anterior = date('Y')-1;

$ano_posterior = date('Y')+1;

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}

$senha = $_SESSION['senha'];
$data_hoje = $_SESSION['data_hoje'];
	
$solicitacao = $_POST['solicitacao'];
	
$placa_que_voltou_do_orcamento = $_POST['placa'];
	
$placa_que_voltou = $_GET['placa'];
$placa_que_voltou2 = $placa_que_voltou;
	


$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];



}

?>

<body bgcolor="#<? echo $cor; ?>"> 



<?

$sql = "SELECT * FROM operadores_for where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];

$fornecedor = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$cidadeatuacao = $linha[48];

}

?>
	


	

<table width="100%"  border="0">

  <tr>

    <td width="22%"><strong>Nome Fantasia </strong></td>

    <td width="23%"><strong>Cidade</strong></td>

    <td width="16%"><strong>Operador</strong></td>

    <td width="24%"><strong>E-Mail</strong></td>

    <td width="11%"><strong>Data</strong></td>

  </tr><br>

  <tr>

    <td><span class="style3"><? echo $fornecedor; ?></span></td>

    <td><span class="style3"><? echo $cidade_estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $operador; ?></span></td>

    <td><span class="style3"><? echo $email_estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $data_hoje; ?></span></td>

  </tr>

</table>
<table width="100%"  border="0">

  <tr>

    <td width="21%"><form name="form1" method="post" action="../index.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input class="class01" type="submit" name="Submit" value="Voltar">
    </form></td>

    <td width="5%">&nbsp;</td>

    <td width="44%"><form name="form1" method="post" action="orcamento.php">
      <?

$senha = $_SESSION['senha'];

?>Placa
      <span style="font-weight: bold">
      <select class='class02' name="placa" id="placa">
		  <option selected><? if(empty($placa_que_voltou_do_orcamento)){ echo $placa_que_voltou2;} else{ echo $placa_que_voltou_do_orcamento; } ?></option>
        <?
    $sql = "select * from veiculos order by placa desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
	
  echo "<option>".$x['placa']."</option>";
    }
?>
      </select> 
      Km 
      <input class='class02' name="km" type="text" id="km" size="5">
      Horimetro 
      <input class='class02' name="horimetro" type="text" id="horimetro" size="5">
      </span>
      <input class='class01' type="submit" name="Submit2" value="Novo Or&ccedil;amento">
      <input name="solicitacao" type="hidden" id="solicitacao" value="abrir">
    </form></td>

    <td width="10%">&nbsp;</td>
    <td width="20%"><form action="../relatorios/relatorio_semanal_de_despesas.php" method="post" name="form1" target="_blank">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <span style="font-weight: bold">
      <select class='class02' name="cod_prestacao" id="cod_prestacao">
        <?
    $sql = "select * from prestacao_contas where operador = '$operador' order by codigo desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
	
  echo "<option>".$x['codigo']."</option>";
    }
?>
      </select>
      </span>
      <? echo "<input class='class01' type='submit' name='Submit4' value='Gerar Relatorio'>"; ?>
    </form></td>

  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
<div align="center"></div>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>