<?php
session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

require '../../conect/conect.php';

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$db = $linha[1];	
}

$senha = $_SESSION['senha'];

$solicitacao = $_POST['solicitacao'];

?>

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
	
<?
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}
?>


<?
$placa = $_POST['placa'];
$km = $_POST['km'];
$horimetro = $_POST['horimetro'];

$dataabertura = date('d-m-Y');
$horaabertura = $hora_atual;
$diaabertura = date('d');
$mesabertura = date('m');
$anoabertura = date('Y');


$datafechameno = date('d-m-Y');
$horafechamento = $hora_atual;
$diafechamento = date('d');
$mesfechamento = date('m');
$anofechamento = date('Y');

$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];


$sql = "SELECT * FROM orcamentos where fornecedor = '$fornecedor' and operador = '$operador' and placa = '$placa' and status = 'Aberto'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}

if(empty($placa)){
	
}
else{
	
if((empty($km)) && (empty($horimetro))){
	
echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE INFORMAR O KM OU HORIMETRO OU OS DOIS QUANDO FOR O CASO!.');
window.location = 'index.php?placa=$placa';

</script>";
	
}
else{

if($registros==0){
	
$sql = "SELECT * FROM veiculos where placa = '$placa' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

$veiculo = $linha[16];
$proprietario_veiculo = $linha[77];

}
	
	
$comando = "insert into orcamentos(fornecedor,status,situacao,operador,dataabertura,horaabertura,diaabertura,mesabertura,anoabertura,placa,veiculo,proprietario_veiculo,km,horimetro)

values('$fornecedor','Aberto','Em Analise','$operador','$dataabertura','$horaabertura','$diaabertura','$mesabertura','$anoabertura','$placa','$veiculo','$proprietario_veiculo','$km','$horimetro')";
 
mysql_query($comando,$conexao);
 
 
$sql = "SELECT * FROM orcamentos where fornecedor = '$fornecedor' and operador = '$operador' and placa = '$placa' and status = 'Aberto' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$numero = $linha[0];
$fornecedor = $linha[1];
$status = $linha[2];
$situacao = $linha[3];
$operador = $linha[4];
$placa = $linha[28];
$veiculo = $linha[29];
$proprietario_veiculo = $linha[30];
$km = $linha[31];
$horimetro = $linha[32];
$foto1 = $linha[33];
$foto2 = $linha[34];
$foto3 = $linha[35];
$foto4 = $linha[36];
$os = $linha[37];
$nf = $linha[38];
$boleto = $linha[39];
$total = $linha[40];
$obs = $linha[41];
	
}

}
else{

$sql = "SELECT * FROM orcamentos where fornecedor = '$fornecedor' and operador = '$operador' and placa = '$placa' and status = 'Aberto' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$numero = $linha[0];
$fornecedor = $linha[1];
$status = $linha[2];
$situacao = $linha[3];
$operador = $linha[4];
$placa = $linha[28];
$veiculo = $linha[29];
$proprietario_veiculo = $linha[30];
$km = $linha[31];
$horimetro = $linha[32];
$foto1 = $linha[33];
$foto2 = $linha[34];
$foto3 = $linha[35];
$foto4 = $linha[36];
$os = $linha[37];
$nf = $linha[38];
$boleto = $linha[39];
$total = $linha[40];
$obs = $linha[41];
}



}


}
	
	
	
	
}//fim do else referente a placa
	
	

$comando = "update `$db`.`propostas` set `num_proposta` = '$num_proposta',`num_bordero` = '$num_bordero_add' where `propostas`. `num_proposta` = '$num_proposta' limit 1 ";

mysql_query($comando,$conexao);

?>

<? 
if($solicitacao=="atualizarfoto1"){
	
	
unlink("$img1");
				  
				  //-----------
	
$foto1 = $_FILES['foto1']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto1']['name'];

if (
move_uploaded_file($_FILES['foto1']['tmp_name'], $uploaddir.$_FILES['foto1']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto1 = "http://www.digicompras.com.br/fluxocar/$placa/$foto1";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto1` = '$link_foto1',`nomefoto1` = '$foto1' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>
</span>
<span style="font-size: 16px">
<? 
if($solicitacao=="atualizarfoto2"){
	
unlink("$img2");
				  
				  //-----------
	
$foto2 = $_FILES['foto2']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto2']['name'];

if (
move_uploaded_file($_FILES['foto2']['tmp_name'], $uploaddir.$_FILES['foto2']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto2 = "http://www.digicompras.com.br/fluxocar/$placa/$foto2";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto2` = '$link_foto2',`nomefoto2` = '$foto2' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>
<? 
if($solicitacao=="atualizarfoto3"){
	
	unlink("$img3");
				  
				  //-----------
	
$foto3 = $_FILES['foto3']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto3']['name'];

if (
move_uploaded_file($_FILES['foto3']['tmp_name'], $uploaddir.$_FILES['foto3']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto3 = "http://www.digicompras.com.br/fluxocar/$placa/$foto3";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto3` = '$link_foto3',`nomefoto3` = '$foto3' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>
<? 
if($solicitacao=="atualizarfoto4"){
	
	unlink("$img4");
				  
				  //-----------
	
$foto4 = $_FILES['foto4']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto4']['name'];

if (
move_uploaded_file($_FILES['foto4']['tmp_name'], $uploaddir.$_FILES['foto4']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto4 = "http://www.digicompras.com.br/fluxocar/$placa/$foto4";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto4` = '$link_foto4',`nomefoto4` = '$foto4' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>

<html>
<head>
<title>Border&ocirc;s</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-repeat: no-repeat;
	background-attachment: fixed;

}

-->
</style>
</head>
<?
if($solicitacao=="gravardespesa"){
	
if (!file_exists('../../prestacao_contas/$cod_prestacao')){
mkdir ("../../prestacao_contas/$cod_prestacao", 0755);
	}
	
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
	
$link_comprovante = "http://www.digicompras.com.br/fluxocar/prestacao_contas/$cod_prestacao/$comprovantedespesa";

//----------
	
	
$comando = "insert into prestacao_contas_comprovantes(num_prestacao_contas,datadespesa,fornecedordespesa,descricaodespesa,nfdespesa,valordespesa,operadordespesa,cidadedespesa,comprovantedespesa,categoriadespesa,modopagto,statusenviocomp,statuscomp)

values('$num_prestacao_contas','$datadespesa','$fornecedordespesa','$descricaodespesa','$nfdespesa','$valordespesa','$operadordespesa','$cidadedespesa','$link_comprovante','$categoriadespesa','$modopagto','a enviar','aberto')";
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
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="../../background/<? echo "$background"; ?>">
      <p>
        <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>
</p>
      <form name="form1" method="post" action="../index.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class="class01" type="submit" name="Submit2" value="Voltar ao menu principal">
</form>
<table width="100%"  border="0">
        <tr>
          <td colspan="2">
            <form action="fechamento_bordero.php" method="post" name="form4">
              <div align="center"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <span class="style3">
              <input name="num_bordero_fechar" type="hidden" id="num_bordero_fechar" value="<?
if($registros==0){
echo $numero;
}			
else{
echo $numero;
}
?>">
              <strong><font color="#0000FF">
              <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
              <strong><font color="#0000FF">
              <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
              </font></strong> </font></strong> </span> <span class="style3"><strong><font color="#0000FF">
              <input name="status_proposta" type="hidden" id="status_proposta" value="<? echo "Proposta_Paga"; ?>">
              </font></strong></span>
              <input class="class01" type="submit" name="Submit32" value="Fechar Or&ccedil;amento">
              <input name="datafechamento" type="hidden" id="datafechamento" value="<? echo date('d-m-Y'); ?>">
              <input name="horafechamento" type="hidden" id="horafechamento" value="<? echo $hora_atual; ?>">
              <input name="diafechamento" type="hidden" id="diafechamento" value="<? echo date('d'); ?>">
              <input name="mesfechamento" type="hidden" id="mesfechamento" value="<? echo date('m'); ?>">
              <input name="anofechamento" type="hidden" id="anofechamento" value="<? echo date('Y'); ?>">
              <input name="recebimento" type="hidden" id="recebimento" value="<? echo "A Caminho"; ?>">
              </div> 
            </form>
          </td>
          <td width="10%">&nbsp;</td>
          <td colspan="5"><form action="visualizacao_borderos.php" method="post" name="form5" target="_blank">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
            <select name="num_bordero" id="select2">
              <option value="null" selected>Selecione
              <?

    $sql = "select * from borderos where operador = '$nome_operador' order by num_bordero desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
	$registros_nesse_bordero = mysql_num_rows($result);

  echo "<option>".$x['num_bordero']."</option>";
    }
?>
              </option>
            </select>
            <span class="style3"><strong><font color="#0000FF">
            <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
            </font></strong></span>
            <input class="class01" type="submit" name="Submit4" value="Visualisar Or&ccedil;amento">
          </form></td>
        </tr>
        <tr>
          <td colspan="3"><span class="style6">
          <?
if($registros==0){
echo "Orçamento aberto com sucesso! Nº ". $numero;
}			
else{
echo "$operador você já possui um orçamento aberto para a placa $placa sob o Nº ". $numero;
}
?>
          </span>            <div align="center"></div>          <div align="center">
          </div></td>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td width="8%">              <?
$data_inicio_busca = "2015-03-01";
$dia_atual = date('d');
$mes_atual = date('m');
$ano_atual = date('Y');
$data_atual = "$ano_atual-$mes_atual-$dia_atual";	  

$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and (status_fisico = 'PENDENTE' or status_fisico = 'PENDENTE DE ENVIO') and data_proposta >= '$data_inicio_busca' and status <> 'RECUSADO PELA MESA DE CREDITO' and status <> 'CANCELADO A PEDIDO DO OPERADOR' and status <> 'REPROVADO' and num_bordero = '' order by num_proposta asc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}
?>
</td>
          <td colspan="6">
            <form name="form4" method="post" action="borderos.php"><div align="center">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <select name="num_proposta_ret" id="select4">
                <option value="null" selected>Selecione
                <?
if($registros==0){
$num_bordero =  $num_bordero_zero;
}			
else{
$num_bordero = $num_bordero_um;
}


    $sql = "select * from propostas where nome_operador = '$nome_operador' and num_bordero = '$num_bordero' order by num_proposta desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
	$registros_nesse_bordero = mysql_num_rows($result);

  echo "<option>".$x['num_proposta']."</option>";
    }
?>
                </option>
              </select>
              <span class="style3">
              <input name="num_bordero_ret" type="hidden" id="num_bordero_ret2" value="<?
if($registros==0){
echo $numero;
}			
else{
echo $numero;
}
?>">
              <strong><font color="#0000FF">
              <input name="estab_pertence" type="hidden" id="estab_pertence7" value="<? echo $estab_pertence; ?>">
              <strong><font color="#0000FF">
              <input name="nome_operador" type="hidden" id="nome_operador6" value="<? echo $nome_operador; ?>">
              </font></strong> </font></strong> </span> <span class="style3"><strong><font color="#0000FF">
              <input name="status_proposta" type="hidden" id="status_proposta5" value="<? echo "Proposta_Paga"; ?>">
              </font></strong></span>
              <input class="class01" type="submit" name="Submit3" value="Retirar">
  </div>
            </form>
          </td>
          <td width="12%">&nbsp;</td>
        </tr>
      </table>
            <form name="form3" method="post" action="borderos.php">
  <table width="100%"  border="0">
    <tr>
      <td width="35%">Fornecedor: <strong><font color="#0000FF"><? echo $fornecedor; ?>
        <input name="fornecedor" type="hidden" id="fornecedor" value="<? echo "$fornecedor"; ?>">
        <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
        <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
        <input name="status" type="hidden" id="status" value="<? echo "Aguardando Aprovação"; ?>">
      </font></strong></td>
      <td width="32%"><strong><font color="#0000FF"><? echo $operador; ?></font></strong></td>
      <td width="33%"><strong><font color="#0000FF"><? echo "Km: $km"; ?></font></strong></td>
    </tr>
  </table>
  <table width="95%" border="0" align="center">
    <tbody>
      <tr>
        <td width="22%" rowspan="3" valign="top"><table width="100%" border="2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <? 
echo "<a href='$img1' target='_blank'><img src='$img1' height='50' border='2' ></a> - <a href='$img1' target='_blank'>$nomefoto1</a>"; 
				  ?>
            </span></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="foto1" id="foto1"></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto1">
              </span>
              <input class="class01" type="submit" name="submit2" id="submit13" value="Enviar"></td>
          </tr>
        </table></td>
        <td width="4%">&nbsp;</td>
        <td width="21%" rowspan="3"><table width="100%" border="2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <? 
				  echo "<a href='$img2' target='_blank'><img src='$img2' height='50' border='2' ></a> - <a href='$img2' target='_blank'>$nomefoto2</a>"; 
				  ?>
            </span></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="foto2" id="foto2"></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto2">
              </span>
              <input class="class01" type="submit" name="submit2" id="submit2" value="Enviar"></td>
          </tr>
        </table></td>
        <td width="4%">&nbsp;</td>
        <td width="4%" rowspan="3" align="center" valign="top"><table width="100%" border="2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <? 
				  echo "<a href='$img3' target='_blank'><img src='$img3' height='50' border='2' ></a> - <a href='$img3' target='_blank'>$nomefoto3</a>"; 
				  ?>
            </span></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="foto3" id="foto3"></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa2" type="hidden" id="placa2" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto3">
              </span>
              <input class="class01" type="submit" name="submit3" id="submit3" value="Enviar"></td>
          </tr>
        </table></td>
        <td width="4%">&nbsp;</td>
        <td width="22%" rowspan="3" align="center" valign="top"><table width="100%" border="2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <? 
				  echo "<a href='$img4' target='_blank'><img src='$img4' height='50' border='2' ></a> - <a href='$img4' target='_blank'>$nomefoto4</a>"; 
				  ?>
            </span></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="foto4" id="foto4"></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa3" type="hidden" id="placa3" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto4">
              </span>
              <input class="class01" type="submit" name="submit4" id="submit4" value="Enviar"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
</form>
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
                  <td colspan="2" valign="top">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="3">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                </tr>
              </tbody>
</table>
<p>&nbsp;</p>
<table width="100%" border="1">
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
                  <td align="center"><? echo "Categoria<br>"; ?>
                    <select class='class02' name="categoriadespesa" id="select6">
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
                <td colspan="6" align="center"><table width="100%" border="0">
                  <tr>
                    <td width="5%" >&nbsp;</td>
                    <td width="15%" >Data</td>
                    <td width="16%" >Fornecedor</td>
                    <td width="17%" >Descri&ccedil;&atilde;o</td>
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
                      <input class='class01' type="submit" name="Submit5" value="X">
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
                </table></td>
              </tr>
</table>
<p>&nbsp;</p>
<div align="center"><strong>Or&ccedil;amento numero <? echo $registros;?></strong></div>
            <table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>            
            <table width="120%"  border="0">
              <tr bgcolor="#<? echo $cor ?>">
                <td><div align="center"><span class="style3">N&ordm; Proposta </span></div></td>
                <td class="style3"><div align="center">Data Proposta</div></td>
                <td class="style3"><div align="center">Prazo Envio</div></td>
                <td><div align="center" class="style3">Status F&iacute;sico</div></td>
                <td><div align="center" class="style3">Status Proposta</div></td>
                <td><div align="center" class="style3">Cliente </div></td>
                <td><div align="center" class="style3">CPF</div></td>
                <td><div align="center" class="style3">Prazo</div></td>
                <td><div align="center" class="style3">Valor Contrato </div></td>
                <td><div align="center"><span class="style3">Banco da opera&ccedil;&atilde;o </span></div></td>
                <td><div align="center"><span class="style3">Tipo de Proposta</span></div></td>
              </tr>
              <?
			  
//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and num_bordero = '' and prazo_final between '$data_inicio_busca' and '$data_atual' order by num_proposta asc";

$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and (status_fisico = 'PENDENTE' or status_fisico = 'PENDENTE DE ENVIO') and data_proposta >= '$data_inicio_busca' and status <> 'RECUSADO PELA MESA DE CREDITO' and status <> 'CANCELADO A PEDIDO DO OPERADOR' and status <> 'REPROVADO' and num_bordero = '' order by num_proposta asc limit 100";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_proposta = $linha[0];
$nome_cli = $linha[4];
$cpf = $linha[7];
$valor_credito = $linha[25];
$quant_parc = $linha[26];
$status = $linha[51];
$tipo_proposta = $linha[83];
$bco_operacao = $linha[86];
$dia_alteracao_status = $linha[110];
$mes_alteracao_status = $linha[111];
$ano_alteracao_status = $linha[112];
$data_alteracao_status = "$dia_alteracao_status-$mes_alteracao_status-$ano_alteracao_status";
$num_contrato_banco = $linha[151];
$status_fisico = $linha[120];

$num_bordero_relacionada = $linha[121];

$data_proposta = $linha[152];
$prazo_final = $linha[153];

?>
              <tr>
                <td width="11%"><div align="center" class="style3">
                    <form name="form2" method="post" action="borderos.php">
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      <? echo $num_proposta;?>
                      <input name="num_proposta" type="hidden" id="num_proposta5" value="<? echo $linha[0]; ?>">                      
                      <input name="num_bordero_add" type="hidden" id="num_bordero_add" value="<?
if($registros==0){
echo $num_bordero_zero;
}			
else{
echo $num_bordero_um;
}
?>">
                      <strong><font color="#0000FF">
                      <input name="estab_pertence" type="hidden" id="estab_pertence3" value="<? echo $estab_pertence; ?>">
                      <input name="nome_operador" type="hidden" id="nome_operador5" value="<? echo $nome_operador; ?>">
                      <input name="status_proposta" type="hidden" id="status_proposta4" value="<? echo "Proposta_Paga"; ?>">
                      </font></strong>
                      
                      <input class="class01" type="submit" name="Submit" value="Adicionar">
                    </form>
                </div></td>
                <td width="7%" class="style3"><div align="center"><? echo $data_proposta;?></div></td>
                <td width="7%" class="style3"><div align="center"><? echo $prazo_final;?></div></td>
                <td width="7%"><div align="center" class="style3"><? echo $status_fisico;?></div></td>
                <td width="9%"><div align="center" class="style3"><? echo $status;?></div></td>
                <td width="17%"><div align="center" class="style3"><? echo $nome_cli;?></div></td>
                <td width="10%">
                  <div align="center" class="style3"><? echo $cpf;?></div></td>
                <td width="4%"><div align="center" class="style3"><? echo $quant_parc;?></div></td>
                <td width="8%"><div align="center" class="style3"><? echo $valor_credito;?></div></td>
                <td width="10%"><div align="center"><span class="style3"><? echo $bco_operacao;?></span></div></td>
                <td width="8%"><div align="center"><span class="style3"><? echo $tipo_proposta;?></span></div></td>
                <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
                <? } ?>
              <tr>
                <td><span class="style3"></span></td>
                <td class="style3"><div align="center"></div></td>
                <td class="style3"><div align="center"></div></td>
                <td><span class="style3"></span></td>
                <td><span class="style3"></span></td>
                <td><span class="style3"></span></td>
                <td><span class="style3"></span></td>
                <td><span class="style3"></span></td>
                <td><span class="style3"></span></td>
                <td><div align="center"></div></td>
                <td><div align="center"></div></td>
            </table>
<p><strong></strong></p>
<p><strong></strong></p>
<p><strong></strong></p>





</body>
</html>
