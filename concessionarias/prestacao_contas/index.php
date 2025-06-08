<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

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
	


$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];



}

?>

<body bgcolor="#<? echo $cor; ?>"> 



<?



$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$cidadeatuacao = $linha[48];

}

if($solicitacao=="abrir"){
	
$sql = "SELECT * FROM prestacao_contas where status = 'aberto' and operador = '$operador' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$registro_prestacao_contas_aberto = mysql_num_rows($res);
	
$saldoanterior = $linha[10];
	
}
	
if($registro_prestacao_contas_aberto<=0){
	
	
$dataabertura = date('Y-m-d');
$horaabertura = date('H:i:s');
	
$comando = "insert into prestacao_contas(dataabertura,horaabertura,status,operador,concessionaria,cidadeatuacao,statusenvio,dataenvio)

values('$dataabertura','$horaabertura','aberto','$operador','$estab_pertence','$cidadeatuacao','a enviar','')";
mysql_query($comando,$conexao);
	
	
$sql = "SELECT * FROM prestacao_contas where status = 'aberto' and operador = '$operador' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_prestacao = $linha[0];
	$dataabertura = $linha[1];
	$horaabertura = $linha[2];
	$status = $linha[5];
	$operador_contas = $linha[6];
	$estab_pertence = $linha[7];
	
}
	
$sql = "SELECT * FROM prestacao_contas where status = 'fechado' and operador = '$operador' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	$saldoanterior = $linha[10];
	$cidadeatuacao = $linha[11];
}
	
$comando = "insert into prestacao_contas_antecipacoes(num_prestacao_contas,dataantecipacao,valorantecipacao,descricaoantecipacao,operadorantecipacao,cidadeantecipacao,estab_pertence)

values('$cod_prestacao','$dataabertura','$saldoanterior','Saldo anterior','$operador_contas','$cidadeatuacao','$estab_pertence')";
mysql_query($comando,$conexao);
	
}
else{
	
}
	
}
	

$sql = "SELECT * FROM prestacao_contas where status = 'aberto' and operador = '$operador' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_prestacao = $linha[0];
	$dataabertura = $linha[1];
	$horaabertura = $linha[2];
	$status = $linha[5];
	$operador_contas = $linha[6];
	$estab_pertence = $linha[7];
	$saldoanterior = $linha[10];
	$cidadeatuacao = $linha[11];
}
	

	
if (!file_exists('../../prestacao_contas/$cod_prestacao')){
mkdir ("../../prestacao_contas/$cod_prestacao", 0755);
	}
	
if($solicitacao=="gravarantecipacao"){
	
$datacadastroantecipacao = date('Y-m-d');
$horacadastroantecipacao = date('H:i:s');
$num_prestacao_contas = $_POST['num_prestacao_contas'];
	
//------------

$data_da_antecipacao = $_POST['dataantecipacao'];

	$data_da_antecipacao2 = explode("-", $data_da_antecipacao);

	$diaantecipacao = $data_da_antecipacao2[0];

	$mesantecipacao = $data_da_antecipacao2[1];

	$anoantecipacao = $data_da_antecipacao2[2];
	
	$dataantecipacao = "$anoantecipacao-$mesantecipacao-$diaantecipacao";
	
	//--------------
	
$valorantecipacao = $_POST['valorantecipacao'];
$descricaoantecipacao = $_POST['descricaoantecipacao'];
	
$comando = "insert into prestacao_contas_antecipacoes(num_prestacao_contas,dataantecipacao,valorantecipacao,descricaoantecipacao,operadorantecipacao,estab_pertence)

values('$num_prestacao_contas','$dataantecipacao','$valorantecipacao','$descricaoantecipacao','$operadorantecipacao','$estab_pertence')";
mysql_query($comando,$conexao);
	
}
	
?>
	
<?
if($solicitacao=="gravardespesa"){
	
$num_prestacao_contas = $_POST['num_prestacao_contas'];
	
	//------------
	$data_da_despesa = $_POST['datadespesa'];
	
	$data_da_despesa2 = explode("-", $data_da_despesa);

	$diadespesa = $data_da_despesa2[0];

	$mesdespesa = $data_da_despesa2[1];

	$anodespesa = $data_da_despesa2[2];
	
	$datadespesa = "$anodespesa-$mesdespesa-$diadespesa";
	
	//-------
	
	$fornecedordespesa = $_POST['fornecedordespesa'];
	$descricaodespesa = $_POST['descricaodespesa'];
	$nfdespesa = $_POST['nfdespesa'];
	$valordespesa = $_POST['valordespesa'];
	$operadordespesa = $_POST['operadordespesa'];
	
	$categoriadespesa = $_POST['categoriadespesa'];
	$modopagto = $_POST['modopagto'];
	
$sql = "SELECT * FROM operadores where nome = '$operadordespesa'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$cidadedespesa = $linha[48];

}
	
	
//-----------
	
$comprovantedespesa = $_FILES['comprovantedespesa']['name'];
	
$uploaddir = "../../prestacao_contas/$cod_prestacao/";
$uploadfile = $uploaddir. $_FILES['comprovantedespesa']['name'];

if (
move_uploaded_file($_FILES['comprovantedespesa']['tmp_name'], $uploaddir.$_FILES['comprovantedespesa']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_comprovante = "http://www.fluxocar.com.br/prestacao_contas/$cod_prestacao/$comprovantedespesa";

//----------
	
	
$comando = "insert into prestacao_contas_comprovantes(num_prestacao_contas,datadespesa,fornecedordespesa,descricaodespesa,nfdespesa,valordespesa,operadordespesa,cidadedespesa,comprovantedespesa,categoriadespesa,modopagto,statusenviocomp,statuscomp,estab_pertence)

values('$num_prestacao_contas','$datadespesa','$fornecedordespesa','$descricaodespesa','$nfdespesa','$valordespesa','$operadordespesa','$cidadedespesa','$link_comprovante','$categoriadespesa','$modopagto','a enviar','aberto','$estab_pertence')";
mysql_query($comando,$conexao);
	
}
	
?>
<?
$sql = "select sum(valorantecipacao) as total_antecipacao from prestacao_contas_antecipacoes where num_prestacao_contas = '$cod_prestacao'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_antecipacao = $linha['total_antecipacao'];
																									  
$sql = "select sum(valordespesa) as total_despesa from prestacao_contas_comprovantes where num_prestacao_contas = '$cod_prestacao'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_despesa = $linha['total_despesa'];
		  
//$saldo = bcsub($total_antecipacao,$total_despesa,2);
	$saldo = bcsub($total_despesa,0,2);
																									  

	//---------FECHAR PRESTACAO DE CONTA-----------
if($solicitacao=="fechar"){
	
$datafechamento = date('Y-m-d');
$horafechamento = date('H:i:s');
$num_prestacao_contas = $_POST['num_prestacao_contas'];
	

	
	$comando = "update `$db`.`prestacao_contas` set `status` = 'fechado',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`totalantecipacao` = '$total_antecipacao',`totaldespesas` = '$total_despesa',`saldofinal` = '$saldo' where `prestacao_contas`. `codigo` = '$num_prestacao_contas' limit 1 ";
mysql_query($comando,$conexao);
	
	
$comando = "update `$db`.`prestacao_contas_comprovantes` set `statusenviocomp` = 'enviado',`dataenviocomp` = '$datafechamento',`statuscomp` = 'fechado' where `prestacao_contas_comprovantes`. `num_prestacao_contas` = '$num_prestacao_contas'";
mysql_query($comando,$conexao);
	
}
	
if($solicitacao=="deletedespesa"){

$coddespesa = $_POST['coddespesa'];
	
	
$sql = "SELECT * FROM prestacao_contas_comprovantes where codigo = '$coddespesa' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$comprovantedespesa = $linha[9];
	}
	
unlink($comprovantedespesa);
	
	
$comando = "delete from `prestacao_contas_comprovantes` where `prestacao_contas_comprovantes`. `codigo` = '$coddespesa' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao excluir cadastro");
	
}
//---------FECHAR PRESTACAO DE CONTA-----------
		  ?>
	<?
	
$sql = "SELECT * FROM prestacao_contas where status = 'aberto' and operador = '$operador' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_prestacao = $linha[0];
	$dataabertura = $linha[1];
	$horaabertura = $linha[2];
	$status = $linha[5];
	$operador_contas = $linha[6];
	$estab_pertence = $linha[7];
	$saldoanterior = $linha[10];
	$cidadeatuacao = $linha[11];
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

    <td><span class="style3"><? echo $estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $cidade_estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $operador; ?></span></td>

    <td><span class="style3"><? echo $email_estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $data_hoje; ?></span></td>

  </tr>

</table>
<table width="100%"  border="0">

  <tr>

    <td width="21%"><form name="form1" method="post" action="../index.php">

      <p>
        <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
        
        <input class='class01' type="submit" name="Submit" value="Voltar">
        
        <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      </p>

    </form></td>

    <td width="20%">&nbsp;</td>

    <td width="20%"><form name="form1" method="post" action="index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <input class='class01' type="submit" name="Submit2" value="Abrir">
      <input name="solicitacao" type="hidden" id="solicitacao" value="abrir">
    </form></td>

    <td width="19%"><form name="form1" method="post" action="index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <? echo "<input class='class01' type='submit' name='Submit4' value='Fechar'>"; ?>
      <input name="solicitacao" type="hidden" id="solicitacao" value="fechar">
      <input name="num_prestacao_contas" type="hidden" id="num_prestacao_contas" value="<? echo "$cod_prestacao"; ?>">
    </form></td>
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
<?
if(($solicitacao=="abrir") or ($solicitacao=="gravarantecipacao") or ($solicitacao=="gravardespesa") or ($solicitacao=="deletedespesa")){
?>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="15%" align="center">Num. Presta&ccedil;&atilde;o de Contas</td>
      <td width="7%" align="center">Data Abertura</td>
      <td width="9%" align="center">Hora Abertura</td>
      <td width="39%" align="center">Status</td>
      <td width="30%" align="center">Total</td>
    </tr>
    <tr>
      <td align="center"><? echo "$cod_prestacao"; ?></td>
      <td align="center"><? echo "$dataabertura"; ?></td>
      <td align="center"><? echo "$horaabertura"; ?></td>
      <td align="center"><? echo "$status"; ?></td>
      <td align="center"><?

																									  
echo "R$ $saldo";
		  ?></td>
    </tr>
    <tr>
      <td colspan="3" align="center" valign="top"><? echo "$operador_contas"; ?></td>
      <td colspan="2" valign="top"><table width="100%" border="1">
        
          <tr>
            <td colspan="6" align="center">Lan&ccedil;amento de Despesas</td>
          </tr>
          <tr>
            <td width="16%" align="center">Data</td>
            <td width="18%" align="center">Fornecedor</td>
            <td width="23%" align="center">Descri&ccedil;&atilde;o</td>
            <td width="15%" align="center">NF</td>
            <td width="13%" align="center">Valor</td>
            <td width="15%" align="center"><?


//echo "Total<br> R$ $total_despesa";

?></td>
          </tr>
			<form action="index.php" method="post" enctype="multipart/form-data" name="form1">
          <tr>
            <td align="center"><input class='class02' name="datadespesa" type="text" id="datadespesa" size="5"></td>
            <td align="center"><input class='class02' name="fornecedordespesa" type="text" id="fornecedordespesa" size="5"></td>
            <td align="center"><textarea class='class02' name="descricaodespesa" id="descricaodespesa" cols="20" rows="1"></textarea></td>
            <td align="center"><input class='class02' name="nfdespesa" type="text" id="nfdespesa" size="5"></td>
            <td align="center"><input class='class02' name="valordespesa" type="text" id="valordespesa" size="5"></td>
            <td align="center">&nbsp;</td>
            </tr>
          <tr>
		<td align="center"><? echo "Categoria<br>"; ?><select class='class02' name="categoriadespesa" id="select6">
              <?
    $sql = "select * from categorias_despesas order by categoria asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>";
    }
?>
            </select></td>
            <td align="center"><? echo "Modo Pagto<br>"; ?>
              <select class='class02' name="modopagto" id="categoriadespesa">
              <?
    $sql = "select * from modo_pagto order by modopagto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['modopagto']."</option>";
    }
?>
              </select></td>
            <td align="center">&nbsp;</td>
            <td colspan="2" align="center"><input class='class02' type="file" name="comprovantedespesa" id="comprovantedespesa"></td>
            <td align="center"><input name="operadordespesa" type="hidden" id="operadordespesa" value="<? echo "$operador"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="gravardespesa">
              <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
              <input name="num_prestacao_contas" type="hidden" id="num_prestacao_contas" value="<? echo "$cod_prestacao"; ?>">
              <input class='class01' type="submit" name="submit" id="submit" value="Salvar"></td>
          </tr>
          </form>
          <tr>
            <td colspan="6" align="center">
              <table width="100%" border="0">
				  <tr>
				    <td width="5%" >&nbsp;</td>
				  <td width="15%" >Data</td>
					  <td width="16%" >Fornecedor</td>
					  <td width="17%" >Descrição</td>
					  <td width="10%" >Valor</td>
					  <td width="10%" >Categoria</td>
					  <td width="14%" >Modo Pagto</td>
					  <td width="13%" >NF</td>
				  </tr>
				  <?
$sql = "SELECT * FROM prestacao_contas_comprovantes where num_prestacao_contas = '$cod_prestacao' order by datadespesa desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$cod_prestacao_comprovante = $linha[0];
	$datadespesa = $linha[2];
	$fornecedordespesa = $linha[3];
	$descricaodespesa = $linha[4];
	$nfdespesa = $linha[5];
	$valordespesa = $linha[6];
	$comprovantedespesa = $linha[9];
	$categoriadespesa = $linha[13];
$modopagto = $linha[14];
?>
                <tr>
                  <td ><form name="form1" method="post" action="index.php">
                    <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
                    <input class='class01' type="submit" name="Submit4" value="X">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="deletedespesa">
                    <input name="coddespesa" type="hidden" id="coddespesa" value="<? echo "$cod_prestacao_comprovante"; ?>">
                    <input name="num_prestacao_contas" type="hidden" id="num_prestacao_contas" value="<? echo "$cod_prestacao"; ?>">
                  </form></td>
                  <td ><? echo "$datadespesa"; ?></td>
                  <td ><? echo "$fornecedordespesa"; ?></td>
				<td ><? echo "$descricaodespesa"; ?></td>
					<td ><? echo "R$ $valordespesa"; ?></td>
					<td ><? echo "$categoriadespesa"; ?></td>
					<td ><? echo "$modopagto"; ?></td>
					<td ><? echo "<a href='$comprovantedespesa' target='_blank'>$nfdespesa</a>"; ?></td>
                </tr>
				  <? } ?>
                <tr>
                  <td >&nbsp;</td>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                    <td align="center">&nbsp;</td>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                    <td >&nbsp;</td>
                </tr>
                <tr>
                  <td >&nbsp;</td>
                  <td >&nbsp;</td>
                  <td >&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td ><?


//echo "Total<br> R$ $total_despesa";

?></td>
                  <td >&nbsp;</td>
                  <td >&nbsp;</td>
                  <td >&nbsp;</td>
                </tr>
				  
              </table>
            </td>
          </tr>
       
      </table></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>
<? } ?>
<div align="center"></div>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>