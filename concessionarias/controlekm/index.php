<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');
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
.class01 {    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
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
	
$fornecedordespesa = $_POST['fornecedordespesa'];

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}


$data_hoje = $_SESSION['data_hoje'];
	
$solicitacao = $_POST['solicitacao'];
	
$codigo_a_editar = $_POST['cod_lancamento_do_controlekm'];

?>

<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">



<?

$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$operador_lancamento = $linha[1];
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];
$telefone_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];
$cidadeatuacao = $linha[48];
	$estab_pertence = $linha[44];

}
	
$sql = "SELECT * FROM operadores where estab_pertence = '$estab_pertence' and nome = '$fornecedordespesa' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

//$operadorqueusaoveiculo = $linha[1];
$veiculodooperador = $linha[73];
$placadoveiculodooperador = $linha[74];
$estab_pertenceooperador = $linha[44];

}
	

if(empty($fornecedordespesa)){

}
else{
	
if($solicitacao=="abrir"){
	
$sql = "SELECT * FROM controlekm where status = 'aberto' and fornecedor = '$fornecedordespesa' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$registro_conciliacao_aberto = mysql_num_rows($res);
	
$saldoanterior = $linha[10];
	
}
	
if($registro_conciliacao_aberto<=0){

	
$dataabertura = date('Y-m-d');
$horaabertura = date('H:i:s');
	
$comando = "insert into controlekm(dataabertura,horaabertura,veiculo,placa,status,operador,concessionaria,statusenvio,dataenvio,fornecedor)

values('$dataabertura','$horaabertura','$veiculodooperador','$placadoveiculodooperador','aberto','$operador','$estab_pertence','a enviar','','$fornecedordespesa')";
mysql_query($comando,$conexao);
	
	
$sql = "SELECT * FROM controlekm where status = 'aberto' and fornecedor = '$fornecedordespesa' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_controlekm = $linha[0];
	$dataabertura = $linha[1];
	$horaabertura = $linha[2];
	$status = $linha[5];
	$veiculodooperador = $linha[6];
	$placadoveiculodooperador = $linha[7];
	
	$fornecedordespesa = $linha[15];
}
	

	
}

	
}
	
	
}

$sql = "SELECT * FROM controlekm where status = 'aberto' and fornecedor = '$fornecedordespesa' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_controlekm = $linha[0];
	$dataabertura = $linha[1];
	$horaabertura = $linha[2];
	$status = $linha[5];
	$veiculodooperador = $linha[6];
	$placadoveiculodooperador = $linha[7];
	
	$fornecedordespesa = $linha[15];
	
}
	

	
?>
	
<?
if($solicitacao=="gravaratividadesdodia"){
	
$cod_controlekm = $_POST['cod_controlekm'];
	
	//------------
	$data_da_saida = $_POST['datasaida'];
	
	$data_da_saida2 = explode("-", $data_da_saida);

	$diasaida = $data_da_saida2[0];

	$messaida = $data_da_saida2[1];

	$anosaida = $data_da_saida2[2];
	
	$datasaida = "$anosaida-$messaida-$diasaida";
	
	$horasaida = $_POST['horasaida'];
	$kmsaida = $_POST['kmsaida'];
	
	//-------
	
	
	$data_da_retorno = $_POST['dataretorno'];
	
	$data_da_retorno2 = explode("-", $data_da_retorno);

	$diaretorno = $data_da_retorno2[0];

	$mesretorno = $data_da_retorno2[1];

	$anoretorno = $data_da_retorno2[2];
	
	$dataretorno = "$anoretorno-$mesretorno-$diaretorno";
	
	$horaretorno = $_POST['horaretorno'];
	$kmretorno = $_POST['kmretorno'];
	
	//-------
	
	
	
	$descricao_motivo = $_POST['descricao_motivo'];
	
	if($kmretorno<=0){
	$kmpercorrido = "";
	}
	else{
	$kmpercorrido = bcsub($kmretorno,$kmsaida);
	}
	
	$estab_pertence = $_POST['estab_pertence'];
	
	$atividadesrealizadas = $_POST['atividadesrealizadas'];
	
	
$comando = "insert into controlekm_lancamentos(cod_controlekm,fornecedordespesa,descricao_motivo,operador,datasaida,horasaida,kmsaida,dataretorno,horaretorno,kmretorno,kmpercorrido,veiculo,placa,atividadesrealizadas,estab_pertence)
values('$cod_controlekm','$fornecedordespesa','$descricao_motivo','$operador_lancamento','$datasaida','$horasaida','$kmsaida','$dataretorno','$horaretorno','$kmretorno','$kmpercorrido','$veiculodooperador','$placadoveiculodooperador','$atividadesrealizadas','$estab_pertence')";
mysql_query($comando,$conexao);
	
}
	
	
	
	
	
if($solicitacao=="gravaredicaodelancamento"){
	
//------------
	$data_da_saida = $_POST['datasaida'];
	
	$data_da_saida2 = explode("-", $data_da_saida);

	$diasaida = $data_da_saida2[0];

	$messaida = $data_da_saida2[1];

	$anosaida = $data_da_saida2[2];
	
	$datasaida = "$anosaida-$messaida-$diasaida";
	
	$horasaida = $_POST['horasaida'];
	$kmsaida = $_POST['kmsaida'];
	
	//-------
	
	
	$data_da_retorno = $_POST['dataretorno'];
	
	$data_da_retorno2 = explode("-", $data_da_retorno);

	$diaretorno = $data_da_retorno2[0];

	$mesretorno = $data_da_retorno2[1];

	$anoretorno = $data_da_retorno2[2];
	
	$dataretorno = "$anoretorno-$mesretorno-$diaretorno";
	
	$horaretorno = $_POST['horaretorno'];
	$kmretorno = $_POST['kmretorno'];
	
	//-------
	
	if($kmretorno<=0){
	$kmpercorrido = "";
	}
	else{
	$kmpercorrido = bcsub($kmretorno,$kmsaida);
	}
	
	$descricao_motivo = $_POST['descricao_motivo'];
	
	$atividadesrealizadas = $_POST['atividadesrealizadas'];
	
	$estab_pertence = $_POST['estab_pertence'];
	
	
	
$comando = "update `$db`.`controlekm_lancamentos` set `datasaida` = '$datasaida',`horasaida` = '$horasaida',`kmsaida` = '$kmsaida',`dataretorno` = '$dataretorno',`horaretorno` = '$horaretorno',`kmretorno` = '$kmretorno',`kmpercorrido` = '$kmpercorrido',`datasaida` = '$datasaida',`descricao_motivo` = '$descricao_motivo',`atividadesrealizadas` = '$atividadesrealizadas',`estab_pertence` = '$estab_pertence' where `controlekm_lancamentos`. `codigo` = '$codigo_a_editar' limit 1 ";
mysql_query($comando,$conexao);
		
}
	
?>
<?

																									 
																									  

	//---------FECHAR CONCILIACAO-----------
if($solicitacao=="fechar"){
	
$datafechamento = date('Y-m-d');
$horafechamento = date('H:i:s');
$cod_controlekm = $_POST['cod_controlekm'];
	

	
	$comando = "update `$db`.`controlekm` set `status` = 'fechado',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento' where `controlekm`. `codigo` = '$cod_controlekm' limit 1 ";
mysql_query($comando,$conexao);
	
}
//---------FECHAR CONCILIACAO-----------
		  ?>
	<?
	
$sql = "SELECT * FROM controlekm where status = 'aberto' and fornecedor = '$fornecedordespesa' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_controlekm = $linha[0];
	$status = $linha[1];
	$dataabertura = $linha[2];
	$horaabertura = $linha[3];
	
	$veiculodooperador = $linha[6];
	$placadoveiculodooperador = $linha[7];
	
	$fornecedordespesa = $linha[15];
}
	
	?>
	
<?
	
if($solicitacao=="excluirlancamento"){
	
$cod_lancamento_do_controlekm = $_POST['cod_lancamento_do_controlekm'];
	
$comando = "delete from `controlekm_lancamentos` where `controlekm_lancamentos`. `codigo` = '$cod_lancamento_do_controlekm' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao excluir lançamento");
	
}
	
	
?>
<table width="100%"  border="0">

  <tr>

    <td width="23%"><strong>N. Fantasia: <span class="style3"><? echo $estab_pertence; ?></span></strong></td>

    <td width="24%"><strong>Cidade: <span class="style3"><? echo $cidade_estab_pertence; ?></span></strong></td>

    <td width="28%"><strong>Operador: <span class="style3"><? echo $operador; ?></span></strong></td>

    <td width="13%">&nbsp;</td>

    <td width="12%"><strong>Data: <span class="style3"><? echo $data_hoje; ?></span></strong></td>

  </tr><br>

</table>
<table width="100%"  border="0">

  <tr>

    <td width="21%"><form name="form1" method="post" action="../index.php">

      <p>
        <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
        <input class='class01' type=image src="../../imagens/botoes/voltar.png" width="100" height="100" name="Submit" value="ESTOQUE DE PE&Ccedil;AS">
        <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      </p>

    </form></td>

    <td width="20%">&nbsp;</td>

    <td width="20%"><form name="form1" method="post" action="index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <select class='class02' name="fornecedordespesa" id="fornecedordespesa">
		  <option selected><? echo "$fornecedordespesa"; ?></option>
        <?
    $sql = "select * from operadores where estab_pertence = '$estab_pertence' and veiculodaempresa = 'sim' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
    }
?>
      </select>
      <br><input class='class01' type=image src="../../imagens/botoes/abrir.png" width="100" height="100" name="Submit2" value="ESTOQUE DE PE&Ccedil;AS">
      <input name="solicitacao" type="hidden" id="solicitacao" value="abrir">
    </form></td>

    <td width="19%" valign="bottom"><form name="form1" method="post" action="index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <? if($status=="aberto"){ echo "<input class='class01' type=image src='../../imagens/botoes/fechar.png' width='100' height='100' name='Submit4' value='Fechar'>"; } ?>
      <input name="solicitacao" type="hidden" id="solicitacao" value="fechar">
      <input name="cod_controlekm" type="hidden" id="cod_controlekm" value="<? echo "$cod_controlekm"; ?>">
    </form></td>
    <td width="20%" valign="bottom"><form action="relatorio/relatorio_km.php" method="post" name="form1" target="_blank">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <span style="font-weight: bold">
      <select class='class02' name="cod_controlekm" id="cod_controlekm">
        <?
    $sql = "select * from controlekm where fornecedor = '$fornecedordespesa' order by codigo desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
	
  echo "<option>".$x['codigo']."</option>";
    }
?>
      </select>
      </span>
      <br><? echo "<input class='class01' type=image src='../../imagens/botoes/relatorio.png' width='100' height='100' name='Submit4' value='Gerar Relatorio'>"; ?>
    </form></td>

  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
<?
	
if(empty($fornecedordespesa)){
	
}
else{
	
if(($solicitacao=="abrir") or ($solicitacao=="gravaratividadesdodia") or ($solicitacao=="editarlancamento") or ($solicitacao=="gravaredicaodelancamento") or ($solicitacao=="excluirlancamento") ){
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png" width="11%" align="center"><strong>Num. Controle KM</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png" width="27%" align="center"><strong>Colaborador</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png" width="22%" align="center"><strong>Data abertura</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png" width="17%" align="center"><strong>Ve&iacute;culo</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png" width="13%" align="center"><strong>Placa</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png" width="10%" align="center"><strong>Status</strong></td>
    </tr>
    <tr>
      <td background="../../imagens_sistema/fundocelulas1.png" align="center"><strong><? echo "$cod_controlekm"; ?></strong></td>
      <td background="../../imagens_sistema/fundocelulas1.png" align="center"><strong><? echo "$fornecedordespesa"; ?></strong></td>
      <td background="../../imagens_sistema/fundocelulas1.png" align="center"><strong><? echo "$dataabertura"; ?></strong></td>
      <td background="../../imagens_sistema/fundocelulas1.png" align="center"><strong><? echo "$veiculodooperador"; ?></strong></td>
      <td background="../../imagens_sistema/fundocelulas1.png" align="center"><strong><? echo "$placadoveiculodooperador"; ?></strong></td>
      <td background="../../imagens_sistema/fundocelulas1.png" align="center"><strong><? echo "$status"; ?></strong></td>
    </tr>
    <tr>
      <td colspan="6" valign="top"><table width="100%" border="1">
        
        <tr>
          <td colspan="6" align="center">Concilia&ccedil;&atilde;o de fornecedores</td>
          </tr>
        <tr>
          <td width="16%" align="center">Data Sa&iacute;da</td>
          <td width="18%" align="center">Hora Sa&iacute;da</td>
          <td width="23%" align="center">KM Sa&iacute;da</td>
          <td width="15%" align="center">Data Retorno</td>
          <td width="13%" align="center">Hora Retorno</td>
          <td width="15%" align="center">KM Retorno</td>
          </tr>
        <form action="index.php" method="post" enctype="multipart/form-data" name="form1">
          <tr>
            <td align="center"><input class='class02' name="datasaida" type="text" id="datasaida" size="5"></td>
            <td align="center"><input name="fornecedordespesa" type="hidden" id="fornecedordespesa" value="<? echo "$fornecedordespesa"; ?>">
              <input class='class02' name="horasaida" type="text" id="horasaida" size="5"></td>
            <td align="center"><input class='class02' name="kmsaida" type="text" id="kmsaida" size="5"></td>
            <td align="center"><input class='class02' name="dataretorno" type="text" id="dataretorno" size="5"></td>
            <td align="center"><input class='class02' name="horaretorno" type="text" id="horaretorno" size="5"></td>
            <td align="center"><input class='class02' name="kmretorno" type="text" id="kmretorno" size="5"></td>
            </tr>
          <tr>
            <td align="center">Trajeto Geral Percorrido</td>
            <td colspan="2" align="center">Atividades Realizadas</td>
            <td align="center">Veiculo</td>
            <td align="center">Placa</td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td rowspan="2" align="center"><textarea class='class02' name="descricao_motivo" id="descricao_motivo" cols="40" rows="5"></textarea></td>
            <td colspan="2" rowspan="2" align="center"><textarea class='class02' name="atividadesrealizadas" id="atividadesrealizadas" cols="40" rows="5"></textarea></td>
            <td align="center"><input name="veiculo" type="text" class='class02' id="veiculo" value="<? echo "$veiculodooperador"; ?>" readonly="readonly"></td>
            <td align="center"><input name="placa" type="text" class='class02' id="placa" value="<? echo "$placadoveiculodooperador"; ?>" size="5" readonly="readonly"></td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2" align="center">&nbsp;</td>
            <td align="center"><input name="operadordespesa" type="hidden" id="operadordespesa" value="<? echo "$operador"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="gravaratividadesdodia">
              <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
              <input name="cod_controlekm" type="hidden" id="cod_controlekm" value="<? echo "$cod_controlekm"; ?>">
              <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo "$estab_pertence"; ?>">
<input class='class01' type=image src="../../imagens/botoes/salvar.png" width="25" height="25" name="Submit4" value="ESTOQUE DE PE&Ccedil;AS"></td>
            </tr>
          </form>
        <tr>
          <td colspan="6" align="center">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="6%" align="center" >Data Saida</td>
                <td width="7%" align="center" >Hora Sa&iacute;da</td>
                <td width="7%" align="center" >KM Sa&iacute;da</td>
                <td width="7%" align="center" >Data Retorno</td>
                <td width="7%" align="center" >hora Retorno</td>
                <td width="9%" align="center" >KM Retorno</td>
                <td width="10%" align="center" >KM Percorrido</td>
                <td width="20%" align="center" >Trajeto Geral Percorrido</td>
                <td width="17%" align="center" >Atividades Realizadas</td>
                <td width="5%" align="center" >#</td>
                <td width="5%" align="center" >#</td>
                </tr>
              <?
$sql = "SELECT * FROM controlekm_lancamentos where cod_controlekm = '$cod_controlekm' order by datasaida desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_lancamento_do_controlekm = $linha[0];
$cod_controlekm = $linha[1];
	$fornecedordespesa = $linha[2];
	$descricao_motivo = $linha[3];
	
	$datasaida = $linha[5];
	
	$data_da_saida2 = explode("-", $datasaida);

	$diasaida = $data_da_saida2[0];

	$messaida = $data_da_saida2[1];

	$anosaida = $data_da_saida2[2];
	
	$datasaida_br = "$anosaida-$messaida-$diasaida";
	
	
	$horasaida = $linha[6];
	$kmsaida = $linha[7];
	
	
	$dataretorno = $linha[8];
	
	$data_da_retorno2 = explode("-", $dataretorno);

	$diaretorno = $data_da_retorno2[0];

	$mesretorno = $data_da_retorno2[1];

	$anoretorno = $data_da_retorno2[2];
	
	$dataretorno_br = "$anoretorno-$mesretorno-$diaretorno";
	
	$horaretorno = $linha[9];
	$kmretorno = $linha[10];
	$kmpercorrido = $linha[11];
    $atividadesrealizadas = $linha[14];
	$estab_pertence = $linha[15];
	
?>
              <tr>
				  <form name="form1" method="post" action="index.php">
                <td background="../../imagens_sistema/fundocelulas1.png" align="center" ><? 
	if(($solicitacao=="editarlancamento") && ($codigo_a_editar==$cod_lancamento_do_controlekm) ){
		?>
		<input name="datasaida" type="text" class='class02' id="datasaida" value="<? echo "$datasaida_br"; ?>" size="5">
					<?
	}
	else{
		echo "$datasaida_br";
	}
	 ?>
                  </td>
                <td background="../../imagens_sistema/fundocelulas1.png" align="center" ><? 
	if(($solicitacao=="editarlancamento") && ($codigo_a_editar==$cod_lancamento_do_controlekm) ){
		?>
		<input name="horasaida" type="text" class='class02' id="horasaida" value="<? echo "$horasaida"; ?>" size="5">
					<?
	}
	else{
		echo "$horasaida"; 
	}
	
					
					?>
                  </td>
                <td background="../../imagens_sistema/fundocelulas1.png" align="center" ><? 
	if(($solicitacao=="editarlancamento") && ($codigo_a_editar==$cod_lancamento_do_controlekm) ){
		?>
		<input name="kmsaida" type="text" class='class02' id="kmsaida" value="<? echo "$kmsaida"; ?>" size="5">
					<?
	}
	else{
		echo "$kmsaida";
	}
	 ?>
                  </td>
                <td background="../../imagens_sistema/fundocelulas1.png" align="center" ><? 
	if(($solicitacao=="editarlancamento") && ($codigo_a_editar==$cod_lancamento_do_controlekm) ){
		?>
		<input name="dataretorno" type="text" class='class02' id="dataretorno" value="<? echo "$dataretorno_br"; ?>" size="5">
					<?
	}
	else{
		echo "$dataretorno_br";
	}
	 ?>
                  </td>
                <td background="../../imagens_sistema/fundocelulas1.png" align="center" ><? 
	if(($solicitacao=="editarlancamento") && ($codigo_a_editar==$cod_lancamento_do_controlekm) ){
		?>
		<input name="horaretorno" type="text" class='class02' id="horaretorno" value="<? echo "$horaretorno"; ?>" size="5">
					<?
	}
	else{
		echo "$horaretorno";
	}
	 ?>
                  </td>
                <td background="../../imagens_sistema/fundocelulas1.png" align="center" ><? 
	if(($solicitacao=="editarlancamento") && ($codigo_a_editar==$cod_lancamento_do_controlekm) ){
		?>
		<input name="kmretorno" type="text" class='class02' id="kmretorno" value="<? echo "$kmretorno"; ?>" size="5">
					<?
	}
	else{
		echo "$kmretorno";
	}
	 ?>
                  </td>
                <td background="../../imagens_sistema/fundocelulas1.png" align="center" ><? echo "$kmpercorrido"; ?></td>
					  
                <td background="../../imagens_sistema/fundocelulas1.png" align="center" ><? 
	if(($solicitacao=="editarlancamento") && ($codigo_a_editar==$cod_lancamento_do_controlekm) ){
		?>
		<textarea class='class02' name="descricao_motivo" id="descricao_motivo" cols="40" rows="5"><? echo "$descricao_motivo"; ?></textarea>
					<?
	}
	else{
		echo "$descricao_motivo";
	}
	 ?>
                  </td>
                <td background="../../imagens_sistema/fundocelulas1.png" align="center" ><? 
	if(($solicitacao=="editarlancamento") && ($codigo_a_editar==$cod_lancamento_do_controlekm) ){
		?>
		<textarea class='class02' name="atividadesrealizadas" id="atividadesrealizadas" cols="40" rows="5"><? echo "$atividadesrealizadas"; ?></textarea>
					<?
	}
	else{
		echo "$atividadesrealizadas";
	}
	 ?>
                  </td>
                <td background="../../imagens_sistema/fundocelulas1.png" align="left" >
                  <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
                  <input class='class01' type=image src="../../imagens/botoes/<? if(($solicitacao=="editarlancamento") && ($codigo_a_editar==$cod_lancamento_do_controlekm) ){ echo "salvar.png"; }else{ echo "editar.png"; } ?>" width="25" height="25" name="Submit5" value="Editar Lançamento">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="<? if($solicitacao=="editarlancamento"){ echo "gravaredicaodelancamento"; }else{ echo "editarlancamento"; } ?>">
                  <input name="cod_lancamento_do_controlekm" type="hidden" id="cod_lancamento_do_controlekm" value="<? echo "$cod_lancamento_do_controlekm"; ?>">
                  <input name="fornecedordespesa" type="hidden" id="fornecedordespesa" value="<? echo "$fornecedordespesa"; ?>">
                  <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo "$estab_pertence"; ?>"></td></form>
				  
				  <form name="form1" method="post" action="index.php">
                <td background="../../imagens_sistema/fundocelulas1.png" align="right" >
                  <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
                  <input class='class01' type=image src="../../imagens/botoes/excluir.png" width="25" height="25" name="Submit3" value="Excluir Lançamento">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="excluirlancamento">
                  <input name="cod_lancamento_do_controlekm" type="hidden" id="cod_lancamento_do_controlekm" value="<? echo "$cod_lancamento_do_controlekm"; ?>">
                  <input name="cod_controlekm_comprovante" type="hidden" id="cod_controlekm_comprovante" value="<? echo "$cod_controlekm"; ?>">
                  <input name="fornecedordespesa" type="hidden" id="fornecedordespesa" value="<? echo "$fornecedordespesa"; ?>">
                </td>
			  </form>
			  
                </tr>
              <? } ?>
              <tr>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td >&nbsp;</td>
              </tr>
              <tr>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >Total KM Percorrido</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td >&nbsp;</td>
                </tr>
              <tr>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >
					<?
$sql = "select sum(kmpercorrido) as total_kmpercorrido from controlekm_lancamentos where cod_controlekm = '$cod_controlekm'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_kmpercorrido = $linha['total_kmpercorrido'];

echo "$total_kmpercorrido";

?></td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td align="center" >&nbsp;</td>
                <td >&nbsp;</td>
                </tr>
              
              </table>
            </td>
          </tr>
        
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="5">&nbsp;</td>
    </tr>
  </tbody>
</table>
<? } 
	
}
	?>
<div align="center"></div>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>