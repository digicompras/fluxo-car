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
<title>COMUNICADO DE VENDA DE VE&Iacute;CULO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.style1 {	color: #000000
}
</style>
</head>
<?

require '../../conect/conect.php';
	
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
	
$dia_verificacao_para_transferencia_localidade = date('d');
$hora_verificacao_para_transferencia_localidade = date('H:i:s');
	
$sql = "SELECT * FROM transferencia_localidade order by codigo limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$dia_inicio_permissao = $linha[1];
	
$hora_inicio_permissao = $linha[2];

$dia_fim_permissao = $linha[3];

$hora_fim_permissao = $linha[4];

}	
	
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	
$cel_operador = $linha[19];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

}	
	
	
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
	
}
	
$sql = "select * from rdo_data_inicial_e_final";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$diafinalrdo = $linha[4];
	$mesfinalrdo = $linha[5];
	$anofinalrdo = $linha[6];
}
$datafinal_do_periodo_atual_do_rdo = "$anofinalrdo-$mesfinalrdo-$diafinalrdo";
	


$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;
?>


<body bgcolor="#<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <p>
  <?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>
    
  <? } ?>
    
    <?
$placa = $_POST['placa'];
$solicitacao = $_POST['solicitacao'];
	?>
    
  <?
	
$sql = "SELECT * FROM veiculos where placa = '$placa'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	$img1 = $linha[79];
	$img2 = $linha[80];
	$img3 = $linha[81];
	$img4 = $linha[82];
	$img5 = $linha[83];
	$img6 = $linha[84];
	$img7 = $linha[85];
	$img8 = $linha[86];
	$img9 = $linha[87];
	$img10 = $linha[88];
	$img11 = $linha[89];
	$img12 = $linha[90];
	
}
	
?>
    
    
    
  <span style="font-size: 16px">
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
  <? 
if($solicitacao=="atualizarfoto5"){
	
	unlink("$img5");
				  
				  //-----------
	
$foto5 = $_FILES['foto5']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto5']['name'];

if (
move_uploaded_file($_FILES['foto5']['tmp_name'], $uploaddir.$_FILES['foto5']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto5 = "http://www.digicompras.com.br/fluxocar/$placa/$foto5";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto5` = '$link_foto5',`nomefoto5` = '$foto5' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>
  <? 
if($solicitacao=="atualizarfoto6"){
	
	unlink("$img6");
				  
				  //-----------
	
$foto6 = $_FILES['foto6']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto6']['name'];

if (
move_uploaded_file($_FILES['foto6']['tmp_name'], $uploaddir.$_FILES['foto6']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto6 = "http://www.digicompras.com.br/fluxocar/$placa/$foto6";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto6` = '$link_foto6',`nomefoto6` = '$foto6' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>
  <? 
if($solicitacao=="atualizarfoto7"){
	
	unlink("$img7");
				  
				  //-----------
	
$foto7 = $_FILES['foto7']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto7']['name'];

if (
move_uploaded_file($_FILES['foto7']['tmp_name'], $uploaddir.$_FILES['foto7']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto7 = "http://www.digicompras.com.br/fluxocar/$placa/$foto7";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto7` = '$link_foto7',`nomefoto7` = '$foto7' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>
    
  <? 
if($solicitacao=="atualizarfoto8"){
	
	unlink("$img8");
				  
				  //-----------
	
$foto8 = $_FILES['foto8']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto8']['name'];

if (
move_uploaded_file($_FILES['foto8']['tmp_name'], $uploaddir.$_FILES['foto8']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto8 = "http://www.digicompras.com.br/fluxocar/$placa/$foto8";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto8` = '$link_foto8',`nomefoto8` = '$foto8' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>
  <? 
if($solicitacao=="atualizarfoto9"){
	
	unlink("$img9");
				  
				  //-----------
	
$foto9 = $_FILES['foto9']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto9']['name'];

if (
move_uploaded_file($_FILES['foto9']['tmp_name'], $uploaddir.$_FILES['foto9']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto9 = "http://www.digicompras.com.br/fluxocar/$placa/$foto9";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto9` = '$link_foto9',`nomefoto9` = '$foto9' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>
  <? 
if($solicitacao=="atualizarfoto10"){
	
	unlink("$img10");
				  
				  //-----------
	
$foto10 = $_FILES['foto10']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto10']['name'];

if (
move_uploaded_file($_FILES['foto10']['tmp_name'], $uploaddir.$_FILES['foto10']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto10 = "http://www.digicompras.com.br/fluxocar/$placa/$foto10";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto10` = '$link_foto10',`nomefoto10` = '$foto11' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>
  </span>
  <span style="font-size: 16px">
  <? 
if($solicitacao=="atualizarfoto11"){
	
	unlink("$img11");
				  
				  //-----------
	
$foto11 = $_FILES['foto11']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto11']['name'];

if (
move_uploaded_file($_FILES['foto11']['tmp_name'], $uploaddir.$_FILES['foto11']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto11 = "http://www.digicompras.com.br/fluxocar/$placa/$foto11";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto11` = '$link_foto11',`nomefoto11` = '$foto11' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>
  <? 
if($solicitacao=="atualizarfoto12"){
	
	unlink("$img12");
				  
				  //-----------
	
$foto12 = $_FILES['foto12']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto12']['name'];

if (
move_uploaded_file($_FILES['foto12']['tmp_name'], $uploaddir.$_FILES['foto12']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto12 = "http://www.digicompras.com.br/fluxocar/$placa/$foto12";

//----------
					  
$comando = "update `$db`.`veiculos` set `foto12` = '$link_foto12',`nomefoto12` = '$foto12' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do ve&iacute;culo!");
}
				   
				  ?>
  </span>
  <?
	
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


if(empty($placa)){
	
if(empty($chassi)){

$sql = "SELECT * FROM veiculos where renavam = '$renavam'";
	
}
	else{
		
$sql = "SELECT * FROM veiculos where chassi = '$chassi'";
		
	}

}
else{

$sql = "SELECT * FROM veiculos where placa = '$placa'";

}
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$codigo_veiculo = $linha[0];

$datacadastro = $linha[1];

$horacadastro = $linha[2];

$operador = $linha[3];

$cel_operador = $linha[4];

$email_operador = $linha[5];

$estabelecimento = $linha[6];

$cidade_estabelecimento = $linha[7];

$tel_estabelecimento = $linha[8];

$email_concessionaria = $linha[9];

$concessionaria = $linha[10];

$cnpj_concessionaria = $linha[11];

$tel_concessionaria = $linha[12];

$email_concessionaria = $linha[13];

$cidade_concessionaria = $linha[14];

$estado_concessionaria = $linha[15];

$veiculo = $linha[16];

$ano = $linha[17];

$modelo = $linha[18];

$chassi = $linha[19];

$renavam = $linha[20];

$placa = $linha[21];

$obs_veiculo = $linha[22];

$dia_inicio_contrato = $linha[23];

$mes_inicio_contrato = $linha[24];

$ano_inicio_contrato = $linha[25];

$dia_termino_contrato = $linha[26];

$mes_termino_contrato = $linha[27];

$ano_termino_contrato = $linha[28];

$nome = $linha[29];

$corveiculo = $linha[30];

$data_nasc = $linha[31];

$mes_nasc = $linha[32];

$sexo = $linha[33];

$estadocivil = $linha[34];

$cpf = $linha[35];

$rg = $linha[36];

$orgao = $linha[37];

$emissao = $linha[38];

$pai = $linha[39];

$mae = $linha[40];

$endereco = $linha[41];

$numero = $linha[42];

$bairro = $linha[43];

$complemento = $linha[44];

$cidade = $linha[45];

$estado = $linha[46];

$cep = $linha[47];

$telefone = $linha[48];

$celular = $linha[49];

$email = $linha[50];

$obs = $linha[51];

$status = $linha[61];

$tipoveiculo = $linha[67];
	
$numeroveiculo = $linha[68];
	
$km = $linha[69];
	
$horimetro = $linha[70];
	
$valormanutencao = $linha[71];
	
$obra = $linha[108];
	
$prefixo = $linha[109];
	
$prefixo = $linha[110];
	
//------------

$datadachegada = $linha[72];

	$datadachegada2 = explode("-", $datadachegada);

	$anochegada = $datadachegada2[0];

	$meschegada = $datadachegada2[1];

	$diachegada = $datadachegada2[2];
	
	$datachegada = "$diachegada-$meschegada-$anochegada";
	
	//-----------
	
	
$datadavistoriawpx = $linha[73];
	
	$datavwpx2 = explode("-", $datadavistoriawpx);

	$anovistoriawpx = $datavwpx2[0];

	$mesvistoriawpx = $datavwpx2[1];

	$diavistoriawpx = $datavwpx2[2];
	
	$datavistoriawpx = "$diavistoriawpx-$mesvistoriawpx-$anovistoriawpx";
	
	
	
	//--------------
	
$datadavistoriacc = $linha[74];

	$datavcc2 = explode("-", $datadavistoriacc);

	$anovistoriacc = $datavcc2[0];

	$mesvistoriacc = $datavcc2[1];

	$diavistoriacc = $datavcc2[2];
	
	$datavistoriacc = "$diavistoriacc-$mesvistoriacc-$anovistoriacc";
	
	
	//--------------
	
$datadoiniciodotrabalho = $linha[75];

	$datainciot2 = explode("-", $datadoiniciodotrabalho);

	$anoiniciot = $datainciot2[0];

	$mesiniciot = $datainciot2[1];

	$diainiciot = $datainciot2[2];
	
	$datainiciotrabalho = "$diainiciot-$mesiniciot-$anoiniciot";
	
	//--------------
	
	
$localizacao = $linha[76];

$fornecedor = $linha[77];
	
	$img1 = $linha[79];
	$img2 = $linha[80];
	$img3 = $linha[81];
	$img4 = $linha[82];
	$img5 = $linha[83];
	$img6 = $linha[84];
	$img7 = $linha[85];
	$img8 = $linha[86];
	$img9 = $linha[87];
	$img10 = $linha[88];
	$img11 = $linha[89];
	$img12 = $linha[90];
	
	$rdo_ordem = $linha[91];
	$num_contrato = $linha[92];
	
	$nomefoto1 = $linha[96];
	$nomefoto2 = $linha[97];
	$nomefoto3 = $linha[98];
	$nomefoto4 = $linha[99];
	$nomefoto5 = $linha[100];
	$nomefoto6 = $linha[101];
	$nomefoto7 = $linha[102];
	$nomefoto8 = $linha[103];
	$nomefoto9 = $linha[104];
	$nomefoto10 = $linha[105];
	$nomefoto11 = $linha[106];
	$nomefoto12 = $linha[107];
	
	$obra = $linha[108];
	
	
	//--------------
	
	$datadocontrato = $linha[93];

	$datadocontrato2 = explode("-", $datadocontrato);

	$anoinicioc = $datadocontrato2[0];

	$mesinicioc = $datadocontrato2[1];

	$diainicioc = $datadocontrato2[2];
	
	$datacontrato = "$diainicioc-$mesinicioc-$anoinicioc";
	
	//--------------
	
	$valormensal = $linha[94];
	
	$mobilizado = $linha[95];
	
	$obra = $linha[108];
	
	$prefixo = $linha[109];
	
	$rdo = $linha[110];

}
	  

	  
	  
?>
  </p>
  <table width="100%" border="0">
    <tbody>
      <tr>
        <td width="8%" align="center">&nbsp;</td>
        <td width="37%" align="right"><form name="form3" method="post" action="pesquisa.php">
          <span style="font-weight: bold">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
            <input class='class01' type=image src='../../imagens/botoes/voltar.png' width='100' height='100' name="Submit3" value="Voltar">
          </span>
        </form></td>
        <td width="12%" align="center"><strong>EDI&Ccedil;&Atilde;O DE VEICULO/MAQUIN&Aacute;RIO</strong></td>
        <td width="37%" align="left"><form action="etiqueta_pasta.php" method="post" name="form1" target="_blank">
          <div align="left">
            <input name="placa3" type="hidden" id="placa3" value="<? echo $placa; ?>">
            <? echo "<input class='class01' type=image src='../../imagens/botoes/etiqueta.png' width='100' height='100' name='Submit' value='Etiqueta'>"; ?></div>
        </form></td>
        <td width="6%" align="center">&nbsp;</td>
      </tr>
    </tbody>
  </table>
<form action="grava_editar_veiculo.php" method="post" enctype="multipart/form-data" name="form1">
  <table width="90%" border="0" align="center" cellspacing="0">
    <tr>
      <td colspan="4"><strong><font color="#0000FF" size="4">REGISTRO DE VEICULO ! Codigo Interno: </font><font color="#0000FF"><? echo " $codigo_veiculo"; ?>
        <span style="font-weight: bold">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
        <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo date('d-m-Y'); ?>">
        <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo date('H:i:s'); ?>">
      </font></strong></td>
    </tr>
    <tr>
      <td align="left" style="font-weight: bold"><p>
        <input name="operador" type="hidden" id="operador" value="<? echo $operador; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $cel_operador; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_concessionaria; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_concessionaria; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_concessionaria; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_concessionaria; ?>">
        <input name="status" type="hidden" id="status" value="<? echo "Estoque"; ?>">
        <input name="codigo" type="hidden" id="codigo" value="<? echo "$codigo_veiculo"; ?>">
        <input name="cnpj2" type="hidden" id="cnpj2" value="<? echo $cnpj; ?>">
      </p>
      <p>&nbsp;</p></td>
      <td colspan="2" align="center" style="font-weight: bold"><?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <input class='class01' type=image src='../../imagens/botoes/salvar.png' width='100' height='100' name="Submit" value="Voltar"></td>
      <td style="font-weight: bold" align="right">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-weight: bold">Concession&aacute;ria</td>
      <td style="font-weight: bold">CNPJ</td>
      <td style="font-weight: bold">Cidade</td>
      <td style="font-weight: bold">Estado</td>
    </tr>
    <tr>
      <td width="27%"><? echo $concessionaria; ?>
        <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $concessionaria; ?>"></td>
      <td width="27%"><strong><? echo $cnpj_concessionaria; ?>
        <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj_concessionaria; ?>">
      </strong></td>
      <td width="20%"><? echo $cidade_concessionaria; ?>
        <input name="cidade_concessionaria" type="hidden" id="cidade_concessionaria" value="<? echo $cidade_concessionaria; ?>"></td>
      <td width="26%"><? echo $estado_concessionaria; ?>
        <input name="estado_concessionaria" type="hidden" id="estado_concessionaria" value="<? echo $estado_concessionaria; ?>"></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Telefone</td>
      <td style="font-weight: bold">E-Mail</td>
      <td style="font-weight: bold">&nbsp;</td>
      <td style="font-weight: bold">&nbsp;</td>
    </tr>
    <tr>
      <td><? echo $tel_concessionaria; ?>
        <input name="tel_concessionaria" type="hidden" id="tel_concessionaria" value="<? echo $tel_concessionaria; ?>"></td>
      <td><font color="#0000FF"><? echo $email_concessionaria; ?>
        <input name="email_concessionaria" type="hidden" id="email_concessionaria" value="<? echo $email_concessionaria; ?>">
      </font></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td style="font-weight: bold">Ve&iacute;culo
      <input name="codigointerno" type="hidden" id="codigointerno" value="<? echo "$codigo_veiculo"; ?>"></td>
      <td style="font-weight: bold">Ano de fabrica&ccedil;&atilde;o</td>
      <td style="font-weight: bold">Modelo</td>
      <td style="font-weight: bold">Placa / Prefixo</td>
    </tr>
    <tr>
      <td><input class='class02' name="veiculo" type="text" id="veiculo" value="<? echo $veiculo; ?>">
        *
        <input class='class02' name="veiculo2" type="hidden" id="veiculo2" value="<? echo $veiculo; ?>"></td>
      <td><input class='class02' name="ano" type="text" id="ano" value="<? echo $ano; ?>" size="5" maxlength="10">
        *
        <input class='class02' name="ano2" type="hidden" id="ano2" value="<? echo $ano; ?>" size="5" maxlength="10"></td>
      <td><input class='class02' name="modelo" type="text" id="modelo" value="<? echo $modelo; ?>" size="5" maxlength="10">
        *
        <input class='class02' name="modelo2" type="hidden" id="modelo2" value="<? echo $modelo; ?>" size="5" maxlength="10"></td>
      <td><input name="placa" type="text" class='class02' id="placa" value="<? echo $placa; ?>" size="10">
        <input name="placa2" type="hidden" class='class02' id="placa2" value="<? echo $placa; ?>" size="10">
        *
<input name="prefixo" type="text" class='class02' id="prefixo" value="<? echo $prefixo; ?>" size="10">
<input name="prefixo2" type="hidden" class='class02' id="prefixo2" value="<? echo $prefixo; ?>" size="10"></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Chassi</td>
      <td style="font-weight: bold">Renavam</td>
      <td style="font-weight: bold">Cor</td>
      <td style="font-weight: bold">Tipo</td>
    </tr>
    <tr>
      <td><input class='class02' name="chassi" type="text" id="chassi" value="<? echo $chassi; ?>">
        *
        <input class='class02' name="chassi2" type="hidden" id="chassi2" value="<? echo $chassi; ?>"></td>
      <td><input class='class02' name="renavam" type="text" id="renavam" value="<? echo $renavam; ?>">
        *
        <input class='class02' name="renavam2" type="hidden" id="renavam2" value="<? echo $renavam; ?>"></td>
      <td><input class='class02' name="corveiculo" type="text" id="corveiculo" value="<? echo $corveiculo; ?>">
        *
        <input class='class02' name="corveiculo2" type="hidden" id="corveiculo2" value="<? echo $corveiculo; ?>"></td>
      <td><span style="font-weight: bold">
        <select class='class02' name="tipoveiculo" id="tipoveiculo">
          <option selected><? echo "$tipoveiculo"; ?></option>
          <?
    $sql4 = "select * from tipos where concessionaria = '$estab_pertence' and status = 'ativo' order by tipo asc";
    $result4 = mysql_query($sql4);
    while($x=mysql_fetch_array($result4)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
        </select>
        <input name="tipoveiculo2" type="hidden" id="tipoveiculo2" value="<? echo "$tipoveiculo"; ?>">
      </span></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Numero do Veiculo</td>
      <td style="font-weight: bold">km</td>
      <td style="font-weight: bold">Horimetro</td>
      <td style="font-weight: bold">Valor Manuten&ccedil;&atilde;o</td>
    </tr>
    <tr>
      <td style="font-weight: bold"><input class='class02' name="numeroveiculo" type="text" id="numeroveiculo" value="<? echo $numeroveiculo; ?>">
      <input class='class02' name="numeroveiculo2" type="hidden" id="numeroveiculo2" value="<? echo $numeroveiculo; ?>"></td>
      <td style="font-weight: bold"><input class='class02' name="km" type="text" id="km" value="<? echo $km; ?>">
      <input class='class02' name="km2" type="hidden" id="km2" value="<? echo $km; ?>"></td>
      <td style="font-weight: bold"><input class='class02' name="horimetro" type="text" id="horimetro" value="<? echo $horimetro; ?>">
      <input class='class02' name="horimetro2" type="hidden" id="horimetro2" value="<? echo $horimetro; ?>"></td>
      <td style="font-weight: bold"><input name="valormanutencao" type="text" class='class02' id="valormanutencao" placeholder="teste" value="<? echo $valormanutencao; ?>">
      <input name="valormanutencao2" type="hidden" class='class02' id="valormanutencao2" placeholder="teste" value="<? echo $valormanutencao; ?>"></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Data Chegada do Veiculo/Maquinario</td>
      <td style="font-weight: bold">Data Vistoria (EMPRESA)</td>
      <td style="font-weight: bold">Data Vistoria (TERCEIROS)</td>
      <td style="font-weight: bold">Data inicio Trabalho</td>
    </tr>
    <tr>
      <td style="font-weight: bold"><input class='class02' name="datachegada" type="text" id="datachegada" value="<? echo $datachegada; ?>">
      <input class='class02' name="datachegada2" type="hidden" id="datachegada2" value="<? echo $datachegada; ?>"></td>
      <td style="font-weight: bold"><input class='class02' name="datavistoriawpx" type="text" id="datavistoriawpx" value="<? echo $datavistoriawpx; ?>">
      <input class='class02' name="datavistoriawpx2" type="hidden" id="datavistoriawpx2" value="<? echo $datavistoriawpx; ?>"></td>
      <td style="font-weight: bold"><input class='class02' name="datavistoriacc" type="text" id="datavistoriacc" value="<? echo $datavistoriacc; ?>">
      <input class='class02' name="datavistoriacc2" type="hidden" id="datavistoriacc2" value="<? echo $datavistoriacc; ?>"></td>
      <td style="font-weight: bold"><input class='class02' name="datainiciotrabalho" type="text" id="datainiciotrabalho" value="<? echo $datainiciotrabalho; ?>">
      <input class='class02' name="datainiciotrabalho2" type="hidden" id="datainiciotrabalho2" value="<? echo $datainiciotrabalho; ?>"></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Data Contrato</td>
      <td style="font-weight: bold">Sublocado(Fornecedor)</td>
      <td style="font-weight: bold">RDO (Ordem)</td>
      <td style="font-weight: bold">Num Contrato</td>
    </tr>
    <tr>
      <td style="font-weight: bold"><input class='class02' name="datacontrato" type="text" id="datacontrato" value="<? echo $datacontrato; ?>">
      <input class='class02' name="datacontrato2" type="hidden" id="datacontrato2" value="<? echo $datacontrato; ?>"></td>
      <td style="font-weight: bold"><select class='class02' name="fornecedor" id="fornecedor">
        <option selected><? echo "$fornecedor"; ?></option>
        <?


    $sql = "select * from estabelecimentos order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
		  
		  
	$sql = "select * from fornecedores order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
      </select>
      <input class='class02' name="fornecedor2" type="hidden" id="fornecedor2" value="<? echo $fornecedor; ?>"></td>
      <td style="font-weight: bold"><input class='class02' name="rdo_ordem" type="text" id="rdo_ordem" value="<? echo $rdo_ordem; ?>" size="5" maxlength="10">
      <input class='class02' name="rdo_ordem2" type="hidden" id="rdo_ordem2" value="<? echo $rdo_ordem; ?>" size="5" maxlength="10"></td>
      <td style="font-weight: bold"><input class='class02' name="num_contrato" type="text" id="num_contrato" value="<? echo $num_contrato; ?>" size="5" maxlength="10">
      <input class='class02' name="num_contrato2" type="hidden" id="num_contrato2" value="<? echo $num_contrato; ?>" size="5" maxlength="10"></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Valor Mensal</td>
      <td style="font-weight: bold">RDO</td>
      <td style="font-weight: bold">Mobilizado</td>
      <td style="font-weight: bold">Obra</td>
    </tr>
    <tr>
<td style="font-weight: bold"><input name="valormensal" type="text" class='class02' id="valormensal" placeholder="teste" value="<? echo $valormensal; ?>">
  <input name="valormensal2" type="hidden" class='class02' id="valormensal2" placeholder="teste" value="<? echo $valormensal; ?>"></td>
      <td style="font-weight: bold"><select class='class02' name="rdo" id="rdo">
          <option selected="selected"><? echo "$rdo"; ?></option>
          <?

    $sql = "select * from vaiprordo order by vai_pro_rdo asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['vai_pro_rdo']."</option>";
    }
?>
      </select>
      <input name="rdo2" type="hidden" id="rdo2" value="<? echo "$rdo"; ?>"></td>
      <td style="font-weight: bold"><select class='class02' name="mobilizado" id="mobilizado">
        <option selected><? echo "$mobilizado"; ?></option>
        <?


    $sql = "select * from mobilizacao order by mobilizado asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['mobilizado']."</option>";
    }
?>
      </select>
      <input name="mobilizado2" type="hidden" class='class02' id="mobilizado2" placeholder="teste" value="<? echo $mobilizado; ?>"></td>
      <td style="font-weight: bold"><select class='class02' name="obra" id="obra">
		  <option selected><? echo "$obra"; ?></option>
        <?
    $sql = "select * from obras where statusobra = 'ativo'";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['obra']."</option>";
    }
?>
      </select>
      <input name="obra2" type="hidden" class='class02' id="obra2" placeholder="teste" value="<? echo $obra; ?>"></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Localiza&ccedil;&atilde;o</td>
      <td style="font-weight: bold">&nbsp;</td>
      <td style="font-weight: bold">&nbsp;</td>
      <td style="font-weight: bold">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" style="font-weight: bold"><?  
//if(($dia_verificacao_para_transferencia_localidade>=$dia_inicio_permissao) or ($dia_verificacao_para_transferencia_localidade<=$dia_fim_permissao)){
	//if(($hora_verificacao_para_transferencia_localidade>=$hora_inicio_permissao) or ($hora_verificacao_para_transferencia_localidade<=$hora_fim_permissao)){
?>
        <select class='class02' name="localizacao" id="localizacao">
          <option selected><? echo "$localizacao"; ?></option>
          <?
    $sql = "select * from cidades order by cidade asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cidade']."</option>";
    }
?>
        </select>
        <?
//}
//else{
	//echo "<input class='class02' name='localizacao' type='hidden' id='localizacao' value='$localizacao'>";
	//echo "<script>

//alert('ATENÇÃO!!!... Fora de data e horario para transferencia de localidade!');


//</script>";
	//echo "$localizacao";
//}
//}
//else{
//	echo "<input class='class02' name='localizacao' type='hidden' id='localizacao' value='$localizacao'>";
//	echo "<script>

//alert('ATENÇÃO!!!... Fora de data e horario para transferencia de localidade!');


//</script>";
	//echo "$localizacao";
//}
?>
      <input class='class02' name="localizacao2" type="hidden" id="localizacao2" value="<? echo $localizacao; ?>">
		<?
		//if(($dia_verificacao_para_transferencia_localidade>=$dia_inicio_permissao) or ($dia_verificacao_para_transferencia_localidade<=$dia_fim_permissao)){
	//if(($hora_verificacao_para_transferencia_localidade>=$hora_inicio_permissao) or ($hora_verificacao_para_transferencia_localidade<=$hora_fim_permissao)){
		
	//}
	//else{
//		echo "( ATENÇÃO!!!... Fora de data e horario para transferencia de localidade! )";
//	}
//		}
//		 else{
//		echo "( ATENÇÃO!!!... Fora de data e horario para transferencia de localidade! )";
//		 }
		?>
		</td>
      <td style="font-weight: bold">&nbsp;</td>
      <td style="font-weight: bold">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-weight: bold">&nbsp;</td>
      <td colspan="3" style="font-weight: bold">Observa&ccedil;&otilde;es</td>
    </tr>
    <tr>
      <td align="center" valign="top">
		  <?
		 // echo "Permissão para efetuar transferencia de localidade:<br><br>";
		 // echo "Do dia $dia_inicio_permissao(de cada mes) as $hora_inicio_permissao<br>";
		 // echo "Até dia $dia_fim_permissao(de cada mes) as $hora_fim_permissao<br>";
		  
		  ?>
		</td>
      <td><textarea class='class02' name="obs_veiculo" cols="50" rows="5" id="obs_veiculo"><? echo "$obs_veiculo"; ?></textarea>
        <span style="font-weight: bold">
        <input name="obs_veiculo2" type="hidden" class='class02' id="obs_veiculo2" placeholder="teste" value="<? echo $obs_veiculo; ?>">
      </span></td>
      <td>&nbsp;</td>
      <td><span style="font-weight: bold">
        <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
        <input class='class01' type=image src='../../imagens/botoes/salvar.png' width='100' height='100' name="Submit2" value="Voltar">
      </span></td>
    </tr>
  </table>
</form>
<table width="95%" border="0" align="center">
  <tbody>
    <tr>
      <td width="22%" rowspan="3" valign="top"><table width="100%" border="2">
        <tr>
          <td align="center">CHEKLIST MOBILIZA&Ccedil;&Atilde;O</td>
        </tr>
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
echo "<a href='$img1' target='_blank'><img src='$img1' height='50' border='2' ></a> - <a href='$img1' target='_blank'>$nomefoto1</a>"; 
				  ?>
          </span></td>
        </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
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
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit4" value="Voltar">
              </span></td>
          </tr>
        </form>
      </table></td>
      <td width="4%">&nbsp;</td>
      <td width="21%" rowspan="3"><table width="100%" border="2">
        <tr>
          <td align="center">CHECKLIST DESMOBILIZA&Ccedil;&Atilde;O</td>
        </tr>
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
				  echo "<a href='$img2' target='_blank'><img src='$img2' height='50' border='2' ></a> - <a href='$img2' target='_blank'>$nomefoto2</a>"; 
				  ?>
          </span></td>
        </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
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
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit5" value="Voltar">
              </span></td>
          </tr>
        </form>
      </table></td>
      <td width="4%">&nbsp;</td>
      <td width="22%" rowspan="3"><table width="100%" border="2">
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
				  echo "<a href='$img3' target='_blank'><img src='$img3' height='50' border='2' ></a> - <a href='$img3' target='_blank'>$nomefoto3</a>"; 
				  ?>
            </span></td>
          </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
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
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto3">
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit6" value="Voltar">
              </span></td>
            </tr>
          </form>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="3" valign="top"><table width="100%" border="2">
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
				  echo "<a href='$img4' target='_blank'><img src='$img4' height='50' border='2' ></a> - <a href='$img4' target='_blank'>$nomefoto4</a>"; 
				  ?>
          </span></td>
        </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
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
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto4">
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit7" value="Voltar">
              </span></td>
          </tr>
        </form>
      </table></td>
      <td>&nbsp;</td>
      <td rowspan="3"><table width="100%" border="2">
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
				  echo "<a href='$img5' target='_blank'><img src='$img5' height='50' border='2' ></a> - <a href='$img5' target='_blank'>$nomefoto5</a>"; 
				  ?>
          </span></td>
        </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
            </span>
              <input class="class02" type="file" name="foto5" id="foto5"></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto5">
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit8" value="Voltar">
              </span></td>
          </tr>
        </form>
      </table></td>
      <td>&nbsp;</td>
      <td rowspan="3"><table width="100%" border="2">
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
				  echo "<a href='$img6' target='_blank'><img src='$img6' height='50' border='2' ></a> - <a href='$img6' target='_blank'>$nomefoto6</a>"; 
				  ?>
            </span></td>
          </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="foto6" id="foto6"></td>
            </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto6">
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit9" value="Voltar">
              </span></td>
            </tr>
          </form>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="3" valign="top"><table width="100%" border="2">
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
				  echo "<a href='$img7' target='_blank'><img src='$img7' height='50' border='2' ></a> - <a href='$img7' target='_blank'>$nomefoto7</a>"; 
				  ?>
          </span></td>
        </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="foto7" id="foto7"></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto7">
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit10" value="Voltar">
              </span></td>
          </tr>
        </form>
      </table></td>
      <td>&nbsp;</td>
      <td rowspan="3"><table width="100%" border="2">
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
				  echo "<a href='$img8' target='_blank'><img src='$img8' height='50' border='2' ></a> - <a href='$img8' target='_blank'>$nomefoto8</a>"; 
				  ?>
          </span></td>
        </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="foto8" id="foto8"></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto8">
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit11" value="Voltar">
              </span></td>
          </tr>
        </form>
      </table></td>
      <td>&nbsp;</td>
      <td rowspan="3"><table width="100%" border="2">
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
				  echo "<a href='$img9' target='_blank'><img src='$img9' height='50' border='2' ></a> - <a href='$img9' target='_blank'>$nomefoto9</a>"; 
				  ?>
            </span></td>
          </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="foto9" id="foto9"></td>
            </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto9">
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit12" value="Voltar">
              </span></td>
            </tr>
          </form>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td rowspan="3" valign="top"><table width="100%" border="2">
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
				  echo "<a href='$img10' target='_blank'><img src='$img10' height='50' border='2' ></a> - <a href='$img10' target='_blank'>$nomefoto10</a>"; 
				  ?>
          </span></td>
        </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="foto10" id="foto10"></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto10">
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit13" value="Voltar">
              </span></td>
          </tr>
        </form>
      </table></td>
      <td>&nbsp;</td>
      <td rowspan="3"><table width="100%" border="2">
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
				  echo "<a href='$img11' target='_blank'><img src='$img11' height='50' border='2' ></a> - <a href='$img11' target='_blank'>$nomefoto11</a>"; 
				  ?>
          </span></td>
        </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="foto11" id="foto11"></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto11">
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit14" value="Voltar">
              </span></td>
          </tr>
        </form>
      </table></td>
      <td>&nbsp;</td>
      <td rowspan="3"><table width="100%" border="2">
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
				  echo "<a href='$img12' target='_blank'><img src='$img12' height='50' border='2' ></a> - <a href='$img12' target='_blank'>$nomefoto12</a>"; 
				  ?>
            </span></td>
          </tr>
        <form action="editar_veiculo.php" method="post" enctype="multipart/form-data" name="form2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="foto12" id="foto12"></td>
            </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="atualizarfoto12">
              </span><span style="font-weight: bold">
              <input class='class01' type=image src='../../imagens/botoes/upload.png' width='50' height='50' name="Submit15" value="Voltar">
              </span></td>
            </tr>
          </form>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="4">
    <tr>
      <td colspan="2"><strong>Registro efetuado por <br>
        </strong><strong><font color="#0000FF"><? echo $operador; ?>
        
      </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>
              <? echo $email_operador; ?>
      </font><font color="#0000FF"> </font></strong></td>
      <td width="20%"><strong>Celular:<font color="#0000FF"><br>
              <? echo $cel_operador; ?>
      </font><font color="#0000FF"> </font></strong></td>
      <td width="1%">&nbsp;</td>
    </tr>
    <tr>
      <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>
          <strong><font color="#0000FF"><? echo $estabelecimento; ?>        </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $tel_estabelecimento; ?>
      </font></strong></td>
      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $email_estabelecimento; ?>
      </font><font color="#0000FF"> </font></strong></td>
      <td><strong>Cidade: <br>
            <font color="#0000FF"><? echo $cidade_estabelecimento; ?>          </font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong>Data do Registro<br>
              <font color="#0000FF"><? echo $datacadastro; ?> </font></strong></td>
      <td><strong>Hora do Registro<br>
      <font color="#0000FF"><? echo $horacadastro; ?> </font></strong></td>
      <td><strong></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>
    <?
  	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	?>
</p>
</form>
<p>
	  <?

$sql = "SELECT * FROM veiculos_alteracoes where codigointerno = '$codigo_veiculo' group by `datealteracao`,`horaalteracao` order by codigo desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$datedealteracao = $linha['5'];
$horadealteracao = $linha['6'];
$operadoralterou = $linha['7'];
$emailoperador = $linha['8'];
$teloperador = $linha['9'];

?>
    </p>
    <table width="85%" border="2" align="center" cellspacing="0" class="style1">
      <tr>
        <td colspan="4" background="../../imagens_sistema/fundocelulas1.png"><div align="center"><? echo "Usu&aacute;rio que efetuou a altera&ccedil;&atilde;o: <b>$operadoralterou $emailoperador $teloperador</b> - <b>$datedealteracao $horadealteracao</b><br><br>"; ?>
          <?

$sql2 = "SELECT * FROM veiculos_alteracoes where codigointerno = '$codigo_veiculo' and datealteracao = '$datedealteracao' and horaalteracao = '$horadealteracao' order by horaalteracao,datealteracao desc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	
$campoalterado = $linha['2'];
$antes = $linha['3'];
$depois = $linha['4'];

?>
          <? 
//echo "Campo Alterado: <b>$campoalterado</b>  Antes: <b>" if(empty($antes)){ echo "Vazio"; } else{ echo "$antes"; } "</b>  Depois: <b>$depois</b><br>"; 
echo "Campo Alterado: <b>$campoalterado</b>  Antes:"; ?>
          <? if(empty($antes)){ echo "<b>Vazio</b>"; } else{ echo "<b>$antes</b>"; } ?>
          <? echo " - Depois:"; ?>
          <? if(empty($depois)){ echo "<b>Vazio</b>"; } else{ echo "<b>$depois</b>"; } ?>
          <? echo "<br>";


} ?></div></td>
      </tr>
    </table>
    <br>
    <? 


}





//------------------------------------------------------------------------





?>
</body>
</html>
