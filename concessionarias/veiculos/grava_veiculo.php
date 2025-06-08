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

<title>Untitled Document</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

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

</style></head>



<?
require '../../conect/conect.php';
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
	
$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];


$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg++;

$operador = $linha[1];
	
$cel_operador = $linha[19];
	
$email_operador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];


}
	

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_concessionaria = $linha[2];
$cnpj_concessionaria = $linha[3];
$estado_estab_pertence = $linha[11];

}



//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 

$sql = "SELECT * FROM fundo_navegacao";

//EXECUTA O COMANDO ACIMA

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

$reg++;

?>





<body bgcolor="#<? printf("$linha[1]"); ?>">

  <?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>

  

<? } ?>

<?

// dados do veiculo

$km = $_POST['km'];
$horimetro = $_POST['horimetro'];

$datacadastro = $_POST['datacadastro'];

$horacadastro = $_POST['horacadastro'];
	
	//------------

$datachegada_d = $_POST['datachegada'];
	
	$datadachegada = $datachegada_d;

	$data2 = explode("-", $datadachegada);

	$diachegada = $data2[0];

	$meschegada = $data2[1];

	$anochegada = $data2[2];
	
	$datachegada = "$anochegada-$meschegada-$diachegada";
	
	//--------------
	
$datavistoriawpx_d = $_POST['datavistoriawpx'];
	
	$datadavistoriawpx = $datavistoriawpx_d;

	$datavwpx2 = explode("-", $datadavistoriawpx);

	$diavistoriawpx = $datavwpx2[0];

	$mesvistoriawpx = $datavwpx2[1];

	$anovistoriawpx = $datavwpx2[2];
	
	$datavistoriawpx = "$anovistoriawpx-$mesvistoriawpx-$diavistoriawpx";
	
	
	//--------------
	
$datavistoriacc_d = $_POST['datavistoriacc'];
	
	$datadavistoriacc = $datavistoriacc_d;

	$datavcc2 = explode("-", $datadavistoriacc);

	$diavistoriacc = $datavcc2[0];

	$mesvistoriacc = $datavcc2[1];

	$anovistoriacc = $datavcc2[2];
	
	$datavistoriacc = "$anovistoriacc-$mesvistoriacc-$diavistoriacc";
	
	//--------------
	
$datainiciotrabalho_d = $_POST['datainiciotrabalho'];
	
	$datadoiniciodotrabalho = $datainiciotrabalho_d;

	$datainciot2 = explode("-", $datadoiniciodotrabalho);

	$diainiciot = $datainciot2[0];

	$mesiniciot = $datainciot2[1];

	$anoiniciot = $datainciot2[2];
	
	$datainiciotrabalho = "$anoiniciot-$mesiniciot-$diainiciot";
	
	//--------------



$concessionaria = $_POST['concessionaria'];

$tel_concessionaria = $_POST['tel_concessionaria'];

$email_concessionaria = $_POST['email_concessionaria'];

$cidade_concessionaria = $_POST['cidade_concessionaria'];

$estado_concessionaria = $_POST['estado_concessionaria'];



//dados do veiculo
	
$fornecedor = $_POST['fornecedor'];

$veiculo = $_POST['veiculo'];
	
$numeroveiculo = $_POST['numeroveiculo'];
	
$tipoveiculo = $_POST['tipoveiculo'];

$placa = $_POST['placa'];
	$prefixo = $_POST['prefixo'];

$ano = $_POST['ano'];

$modelo = $_POST['modelo'];

$chassi_recebido = $_POST['chassi'];
	
if(empty($chassi_recebido)){
$chassi = $placa;
}
else{
$chassi = $chassi_recebido;
	}

$renavam_recebido  = $_POST['renavam'];
	
if(empty($renavam_recebido)){
$renavam = $placa;
}
else{
$renavam = $renavam_recebido;
}
	
$localizacao  = $_POST['localizacao'];
	
$obs_veiculo = $_POST['obs_veiculo'];

$status = $_POST['status'];

$corveiculo = $_POST['corveiculo'];
	
$valormanutencao = $_POST['valormanutencao'];
	
$mobilizado = $_POST['mobilizado'];
	
$obra = $_POST['obra'];
	
$rdo = $_POST['rdo'];




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



}
	

if (!file_exists($diretorio)){

mkdir ("../../$placa", 0755);
	
	}
	
//-----------
	
$foto1 = $_FILES['foto1']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto1']['name'];

if (
move_uploaded_file($_FILES['foto1']['tmp_name'], $uploaddir.$_FILES['foto1']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto1 = "https://www.fluxocar.com.br/$placa/$foto1";

//----------
	
$foto2 = $_FILES['foto2']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto2']['name'];

if (
move_uploaded_file($_FILES['foto2']['tmp_name'], $uploaddir.$_FILES['foto2']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto2 = "https://www.fluxocar.com.br/$placa/$foto2";

//----------
	
$foto3 = $_FILES['foto3']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto3']['name'];

if (
move_uploaded_file($_FILES['foto3']['tmp_name'], $uploaddir.$_FILES['foto3']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto3 = "https://www.fluxocar.com.br/$placa/$foto3";

//----------
	
$foto4 = $_FILES['foto4']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto4']['name'];

if (
move_uploaded_file($_FILES['foto4']['tmp_name'], $uploaddir.$_FILES['foto4']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto4 = "https://www.fluxocar.com.br/$placa/$foto4";

//----------
	
$foto5 = $_FILES['foto5']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto5']['name'];

if (
move_uploaded_file($_FILES['foto5']['tmp_name'], $uploaddir.$_FILES['foto5']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto5 = "https://www.fluxocar.com.br/$placa/$foto5";

//----------
	
$foto6 = $_FILES['foto6']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto6']['name'];

if (
move_uploaded_file($_FILES['foto6']['tmp_name'], $uploaddir.$_FILES['foto6']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto6 = "https://www.fluxocar.com.br/$placa/$foto6";

//----------
	
$foto7 = $_FILES['foto7']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto7']['name'];

if (
move_uploaded_file($_FILES['foto7']['tmp_name'], $uploaddir.$_FILES['foto7']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto7 = "https://www.fluxocar.com.br/$placa/$foto7";

//----------
	
$foto8 = $_FILES['foto8']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto8']['name'];

if (
move_uploaded_file($_FILES['foto8']['tmp_name'], $uploaddir.$_FILES['foto8']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto8 = "https://www.fluxocar.com.br/$placa/$foto8";

//----------
	
$foto9 = $_FILES['foto9']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto9']['name'];

if (
move_uploaded_file($_FILES['foto9']['tmp_name'], $uploaddir.$_FILES['foto9']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto9 = "https://www.fluxocar.com.br/$placa/$foto9";

//----------
	
$foto10 = $_FILES['foto10']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto10']['name'];

if (
move_uploaded_file($_FILES['foto10']['tmp_name'], $uploaddir.$_FILES['foto10']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto10 = "https://www.fluxocar.com.br/$placa/$foto10";

//----------
	
$foto11 = $_FILES['foto11']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto11']['name'];

if (
move_uploaded_file($_FILES['foto11']['tmp_name'], $uploaddir.$_FILES['foto11']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto11 = "https://www.fluxocar.com.br/$placa/$foto11";

//----------
	
$foto12 = $_FILES['foto12']['name'];
	
$uploaddir = "../../$placa/";
$uploadfile = $uploaddir. $_FILES['foto12']['name'];

if (
move_uploaded_file($_FILES['foto12']['tmp_name'], $uploaddir.$_FILES['foto12']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_foto12 = "https://www.fluxocar.com.br/$placa/$foto12";

//----------
	

	
if($registro_veiculo<=0){
	
//if( (empty($veiculo)) or (empty($placa)) or (empty($ano)) or (empty($modelo)) or (empty($corveiculo)) or (empty($chassi)) or (empty($renavam)) ){
	
//echo "<script>

//alert('ATENÇÃO!!!... VOCÊ DEVE PREENCHER CORRETAMENTE TODOS OS CAMPOS COM *!.');
//window.location = 'registrar_veiculo.php?veiculo=$veiculo&placa=$placa&ano=$ano&modelo=$modelo&chassi=$chassi&renavam=$renavam';

//</script>";
	
//}
//else{
	
$texto = "https://www.fluxocar.com.br/buscainformacoes.php?placa=$placa";

$comando = "insert into veiculos(datacadastro,horacadastro,concessionaria,cnpj_concessionaria,tel_concessionaria,email_concessionaria,cidade_concessionaria,estado_concessionaria,veiculo,placa,ano,modelo,chassi,renavam,obs_veiculo,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,status,url,corveiculo,tipoveiculo,numeroveiculo,km,horimetro,valormanutencao,datachegada,datavistoriawpx,datavistoriacc,datainiciotrabalho,localizacao,fornecedor,foto1,foto2,foto3,foto4,foto5,foto6,foto7,foto8,foto9,foto10,foto11,foto12,mobilizado,obra,prefixo,rdo) 

values('$datacadastro','$horacadastro','$nfantasia_concessionaria','$cnpj_concessionaria','$telefone_estab_pertence','$email_estab_pertence','$cidade_estab_pertence','$estado_estab_pertence','$veiculo','$placa','$ano','$modelo','$chassi','$renavam','$obs_veiculo','$operador','$cel_operador','$email_operador','$nfantasia_concessionaria','$cidade_estab_pertence','$telefone_estab_pertence','$email_estab_pertence','$status','$texto','$corveiculo','$tipoveiculo','$numeroveiculo','$km','$horimetro','$valormanutencao','$datachegada','$datavistoriawpx','$datavistoriacc','$datainiciotrabalho','$localizacao','$fornecedor','$link_foto1','$link_foto2','$link_foto3','$link_foto4','$link_foto5','$link_foto6','$link_foto7','$link_foto8','$link_foto9','$link_foto10','$link_foto11','$link_foto12','$mobilizado','$obra','$prefixo','$rdo')";

mysql_query($comando,$conexao) or die("Erro ao registrar o veículo!");
	
//}
echo "$datachegada - $datavistoriawpx - $datavistoriacc - $datainiciotrabalho";
}

$sql = "SELECT * FROM cad_empresa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$email_empresa = $linha[14];

$site = $linha[15];



}

echo "Veículo registrado com sucesso na $nfantasia_concessionaria! <br><br>";
	
	

	
//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
$sql = "SELECT * FROM operadores where estab_pertence = '$estab_pertence' and funcao = 'ADMINISTRATIVO'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$nome_administrativo = $linha[1];

$email_administrativo = $linha[20];
	

	$email_dest   =   "$email_administrativo";
	
	$mensagem_do_email = "Placa $placa MOBILIZADO $mobilizado";
	
	//PREPARA O PEDIDO
	
	$mens  .=  "$mensagem_do_email \n";
	



$mens  .=  $to = "$email_dest";
$from = "$email_operador";
$subject = "Placa $placa MOBILIZADO $mobilizado";
$html = "
<html>
<body>
Olá $nome_administrativo <br><b>Placa $placa MOBILIZADO $mobilizado<br><br>

Placa: $placa<br>
Mobilizado: $mobilizado<br>
Data: $datacadastro<br>
Hora: $horacadastro<br>
Comentario: $obs_veiculo<br>
Operador: $operador<br>


</body>
</html>";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $from \r\n";

if (mail($to, $subject, $html, $headers)) {
//echo "Email enviado com sucesso !";
} else {
//echo "Ocorreu um erro durante o envio do email.";
}
	
}//fim do loop de envio dos emails
	
	



?>




<?

$sql = "SELECT * FROM veiculos order by codigo desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

<?

printf("O Nº de contrato do veículo: $linha[0]");

$codigo = $linha[0];

$datacadastro = $linha[1];

$horacadastro = $linha[2];
	
$operador = $linha[3];

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

$alcunha = $linha[30];

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

$url = $linha[66];
	
}

?>


<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="34%"><form name="form1" method="post" action="pesquisa.php">
        <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
        <input class='class01' type=image src='../../imagens/botoes/voltar.png' width='100' height='100' name="Submit2" value="Voltar">
        <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      </form></td>
      <td width="21%"><form name="form1" method="post" action="pesquisa.php">
        <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
        <input class='class01' type=image src='../../imagens/botoes/registrar-veiculo.png' width='100' height='100' name="Submit" value="Voltar">
        <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $nfantasia_concessionaria; ?>">
        <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj_concessionaria; ?>">
      </form></td>
      <td width="21%"><form action="registrar_manutencao.php" method="post" name="form1">
        <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
        <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
        <input class='class01' type=image src='../../imagens/botoes/registrar-manutencao.png' width='100' height='100' name="Submit4" value="Voltar">
      </form></td>
      <td width="24%"><form action="etiqueta_pasta.php" method="post" name="form1" target="_blank">
        <div align="center">
          <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
          <input class='class01' type=image src='../../imagens/botoes/etiqueta.png' width='100' height='100' name="Submit3" value="Voltar">
          <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
        </div>
      </form></td>
    </tr>
  </tbody>
</table>
<table width="60%" border="0" align="center">
  <tbody>
    <tr>
      <th width="40%" scope="col">&nbsp;</th>
      <th width="47%" align="center" scope="col">
	  
		  <?
			$aux = '../../qrcode/qr_img0.50j/php/qr_img.php?';
			$aux .= "d=$texto&";
			$aux .= 'e=H&';
			$aux .= 's=4&';
			$aux .= 't=J';
		?>
      <div style="float: left; border: 1px solid #000;"> <img src="<?php echo $aux; ?>"><br><? echo "$veiculo<br>$placa<br>www.fluxocar.com.br"; ?></div></th>
      <th width="13%" scope="col">&nbsp;</th>
    </tr>
  </tbody>
</table>
<p></p>
</script>

</body>

</html>

<?

mysql_close($conexao);

?>