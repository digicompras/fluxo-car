<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>

<html>

<head>

<title>GRAVA&Ccedil;&Atilde;O DE COMUNICADO DE VENDA</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}
.style3 {	color: #000000;
	font-weight: bold;
}

-->

</style>

</head>



<?

//require("conect/conect.php"); or die("erro na requisição");

require '../../conect/conect.php';

error_reporting(E_ALL);


?>

<?
	
$solicitacao = $_POST['solicitacao'];
	
$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];


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

//dados da concessionaria

$codigo = $_POST['codigo'];

$concessionaria = $estab_pertence;

$tel_concessionaria = $_POST['tel_concessionaria'];

$email_concessionaria = $_POST['email_concessionaria'];

$cidade_concessionaria = $_POST['cidade_concessionaria'];

$estado_concessionaria = $_POST['estado_concessionaria'];



$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$cnpj_concessionaria = $linha[3];
$agente = $linha[16];

}



//dados do veiculo

$veiculo = $_POST['veiculo'];

$placa = $_POST['placa'];

$ano = $_POST['ano'];

$modelo = $_POST['modelo'];

$chassi = $_POST['chassi'];

$renavam = $_POST['renavam'];

$tipomanutencao = $_POST['tipomanutencao'];

$detalhamento = $_POST['detalhamento'];
	
$condutor = $_POST['condutor'];

$corveiculo = $_POST['corveiculo'];

$horimetro = $_POST['horimetro'];

$km = $_POST['km'];

$valormanutencao = $_POST['valormanutencao'];

//inicio e fim do contrato

$dia_inicio_contrato = $_POST['dia_inicio_contrato'];

$mes_inicio_contrato = $_POST['mes_inicio_contrato'];

$ano_inicio_contrato = $_POST['ano_inicio_contrato'];

$datamanutencao = "$ano_inicio_contrato-$mes_inicio_contrato-$dia_inicio_contrato";
	$data_da_manutencao = "$dia_inicio_contrato-$mes_inicio_contrato-$ano_inicio_contrato";
$horamanutencao = date('H:i:s');

$tipoveiculo = $_POST['tipoveiculo'];
	
$numeroveiculo = $_POST['numeroveiculo'];






//dados do operador que comunicou a venda

$data_comunicado = $_POST['data_comunicado'];

$hora_comunicado = $_POST['hora_comunicado'];

$operador_comunicou = $_POST['operador_comunicou'];

$cel_operador_comunicou = $_POST['cel_operador_comunicou'];

$email_operador_comunicou = $_POST['email_operador_comunicou'];

$estabelecimento_comunicou = $_POST['estabelecimento_comunicou'];

$cidade_estabelecimento_comunicou = $_POST['cidade_estabelecimento_comunicou'];

$tel_estabelecimento_comunicou = $_POST['tel_estabelecimento_comunicou'];

$email_estabelecimento_comunicou = $_POST['email_estabelecimento_comunicou'];



?>

<?

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
while($linha=mysql_fetch_row($res)) {

$registro_veiculo++;



$codigo = $linha[0];

$concessionaria_registrou = $linha[10];

$cnpj_concessionaria_registrou = $linha[11];
	
$corveiculo = $linha[30];

$status = $linha[61];

$url = $linha[66];
	
$localizacao = $linha[76];
	
$fornecedor = $linha[77];

}
	

$descontar = $_POST['descontar'];
	
$reembolso = $_POST['reembolso'];
	
$nf = $_POST['nf'];
	

$foto = $_FILES['foto']['name'];
	
	
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto']['name'];


	if (
move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir.$_FILES['foto']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_nf = "http://www.digicompras.com.br/fluxocar/$placa/$foto";
	
	
	
	
if($solicitacao=="incluirmaisumanf"){
	
$cod_ocorrencia = $_POST['cod_ocorrencia'];
	
$comando = "insert into nfs_manutencao(cod_ocorrencia,nf,fornecedor,veiculo,placa,chassi,renavam,datamanutencao,link_nf,valormanutencao) 

values('$cod_ocorrencia','$nf','$fornecedor','$veiculo','$placa','$chassi','$renavam','$data_da_manutencao','$link_nf','$valormanutencao')";
mysql_query($comando,$conexao);
	
}
else{

if($registro_veiculo>=1){


$comando = "insert into ocorrencias(datamanutencao,horamanutencao,concessionaria,municipio,tipomanutencao,detalhamento,placa,renavam,chassi,condutor,agente,corveiculo,horimetro,km,valormanutencao,descontar,veiculo,tipoveiculo,numeroveiculo,localizacao,fornecedor,nf,link_nf,operador,reembolso) 

values('$datamanutencao','$horamanutencao','$concessionaria','$cidade_concessionaria','$tipomanutencao','$detalhamento','$placa','$renavam','$chassi','$condutor','$agente','$corveiculo','$horimetro','$km','$valormanutencao','$descontar','$veiculo','$tipoveiculo','$numeroveiculo','$localizacao','$fornecedor','$nf','$link_nf','$operador','$reembolso')";
mysql_query($comando,$conexao);

echo "Manutencao do veículo registrada com sucesso! <br>";
	
	
$sql = "SELECT * FROM ocorrencias where placa = '$placa' order by codigo desc limit 1";
$res = mysql_query($sql);
$reg = 0;

while($linha=mysql_fetch_row($res)) {

$cod_ocorrencia = $linha[0];


}
	
}
}
?>

<?

$sql = "SELECT * FROM cad_empresa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$email_empresa = $linha[14];

$site = $linha[15];



}

	

	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_empresa;
	//$email_jairo   =   "jairodosanjossilva@hotmail.com";
	
	
	
//---------------INICIO ENVIO PARA IVAN--------------
	
$mens  .=  $to = "$email_dest";
$from = "ivan.campos@wpxlocacao.com.br";
$subject = "Manutencao realizada de Maquinario/Veiculo!";
$html = "
<html>
<body>
Manutencao realizada de Maquinario/Veiculo!<br>

Nome Fantasia: $concessionaria<br>
Data Manutenção: $datamanutencao<br>
Hora Manutenção: $horamanutencao<br>
Maquinário/Veículo: $veiculo<br>
Tipo: $tipoveiculo<br>
Ano: $ano<br>
Modelo: $modelo<br>
Placa: $placa<br>
Chassi: $chassi<br>
Renavam: $renavam<br>
Localização: $localizacao<br>
Fornecedor: $fornecedor<br>
Operador: $operador<br>
Detalhamento: $detalhamento<br>
<img src='$link_nf'><br>

Visualizar detalhes clique no link abaixo <br>

<a href='http://www.digicompras.com.br/fluxocar/buscainformacoes.php?placa=$placa'>Visualizar</a>
</body>
</html>";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $from \r\n";

if (mail($to, $subject, $html, $headers)) {
echo "Email enviado com sucesso !";
} else {
echo "Ocorreu um erro durante o envio do email.";
} 
	
//-----------FIM ENVIO PARA IVAN-------------
	
//---------------INICIO ENVIO PARA JAIRO--------------
	
$mens  .=  $to = "$email_jairo";
$from = "ivan.campos@wpxlocacao.com.br";
$subject = "Manutencao realizada de Maquinario/Veiculo!";
$html = "
<html>
<body>
Manutencao realizada de Maquinario/Veiculo!<br>

Nome Fantasia: $concessionaria<br>
Data Manutenção: $datamanutencao<br>
Hora Manutenção: $horamanutencao<br>
Maquinário/Veículo: $veiculo<br>
Tipo: $tipoveiculo<br>
Ano: $ano<br>
Modelo: $modelo<br>
Placa: $placa<br>
Chassi: $chassi<br>
Renavam: $renavam<br>
Localização: $localizacao<br>
Fornecedor: $fornecedor<br>
Operador: $operador<br>
Detalhamento: $detalhamento<br>
<img src='$link_nf'><br>

Visualizar detalhes clique no link abaixo <br>

<a href='http://www.digicompras.com.br/fluxocar/buscainformacoes.php?placa=$placa'>Visualizar</a>
</body>
</html>";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $from \r\n";

if (mail($to, $subject, $html, $headers)) {
echo "Email enviado com sucesso !";
} else {
echo "Ocorreu um erro durante o envio do email.";
} 
	
//-----------FIM ENVIO PARA JAIRO-------------

?>





<body>

<p>&nbsp;</p>

<p>&nbsp; </p>

<table width="100%"  border="0">

  <tr>

    <td width="30%"><form name="form1" method="post" action="pesquisa.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <input class='class01' type="submit" name="Submit2" value="Voltar">
      <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj_concessionaria; ?>">
    </form></td>
    <td width="37%">&nbsp;</td>

    <td width="33%">&nbsp;</td>

  </tr>

</table>
	
<?
	
//$anexointegralmateria = $_FILES['anexointegralmateria']['name'];
	
//$uploaddir = "anexosdematerias/$protocologerado/";
//$uploadfile = $uploaddir. $_FILES['anexointegralmateria']['name'];
	
	


	
//if(move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir . $_FILES['foto']['name'])){
//echo "NF enviada com sucesso!";
//} else {
//echo "NF não foi enviada!";
//}
	
?>
	
<table width="60%" border="0" align="center">
  <tbody>
    <tr>
      <th width="40%" scope="col">&nbsp;</th>
      <th width="47%" align="center" scope="col"> <?
			$aux = '../../qrcode/qr_img0.50j/php/qr_img.php?';
			$aux .= "d=$url&";
			$aux .= 'e=H&';
			$aux .= 's=4&';
			$aux .= 't=J';
		?>
        <div style="float: left; border: 1px solid #000;"> <img src="<?php echo $aux; ?>"><br><? echo "$veiculo<br>$placa"; ?></div></th>
      <th width="13%" scope="col">&nbsp;</th>
    </tr>
  </tbody>
</table>
<form action="grava_manutencao.php" method="post" enctype="multipart/form-data" name="form1">
  <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
  <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj_concessionaria; ?>">
  <table width="60%"  border="0" align="center">
    <tr>
      <td>ND/DOC<span style="font-weight: bold">
        <input name="veiculo" type="hidden" id="veiculo" value="<? echo "$veiculo"; ?>">
        <input name="fornecedor" type="hidden" id="fornecedor" value="<? echo "$fornecedor"; ?>">
        <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
        <input name="chassi" type="hidden" id="chassi" value="<? echo "$chassi"; ?>">
        <input name="renavam" type="hidden" id="renavam" value="<? echo "$renavam"; ?>">
        <input name="datamanutencao" type="hidden" id="datamanutencao" value="<? echo "$data_da_manutencao"; ?>">
      </span></td>
      <td>Valor</td>
      <td>Imagem NF</td>
      <td><? echo "$veiculo"; ?></td>
    </tr>
    <tr>
      <td><span style="font-weight: bold">
        <input class='class02' name="nf" type="text" id="nf" maxlength="50">
        <input name="solicitacao" type="hidden" id="solicitacao" value="incluirmaisumanf">
      </span></td>
      <td><span style="font-weight: bold">
        <input class='class02' name="valormanutencao" type="text" id="valormanutencao" maxlength="50">
      </span></td>
      <td><input class='class01' type="file" name="foto" id="foto"></td>
      <td><? echo "$tipoveiculo"; ?></td>
    </tr>
    <tr>
      <td width="24%"><input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
      <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
      <input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>">
      <input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>">
      <span style="font-weight: bold">
      <input name="cod_ocorrencia" type="hidden" id="cod_ocorrencia" value="<? echo "$cod_ocorrencia"; ?>">
      </span></td>
      <td width="27%">&nbsp;</td>
      <td width="29%"><input class='class01' type="submit" name="Submit" value="Salvar"></td>
      <td width="20%"><? echo "$placa"; ?></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>

