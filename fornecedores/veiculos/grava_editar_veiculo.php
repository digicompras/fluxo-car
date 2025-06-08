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
-->
</style>
</head>

<?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';
error_reporting(E_ALL);

?>

		  
		  
		  <?
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
	
}



//dados do veiculo
$codigo = $_POST['codigo'];
$veiculo = $_POST['veiculo'];
$ano = $_POST['ano'];
$modelo = $_POST['modelo'];
	
$placa = $_POST['placa'];
	$placa_antiga = $_POST['placaantiga'];
 rename("../../$placa/", "../../$placa_antiga/");
	
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
	
$corveiculo = $_POST['corveiculo'];
$tipoveiculo = $_POST['tipoveiculo'];
$status = $_POST['status'];
$numeroveiculo = $_POST['numeroveiculo'];
$km = $_POST['km'];
$horimetro = $_POST['horimetro'];
$valormanutencao = $_POST['valormanutencao'];

	
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
	
	$datadocontrato = $_POST['datacontrato'];

	$datadocontrato2 = explode("-", $datadocontrato);

	$diainicioc = $datadocontrato2[0];

	$mesinicioc = $datadocontrato2[1];

	$anoinicioc = $datadocontrato2[2];
	
	$datacontrato = "$anoinicioc-$mesinicioc-$diainicioc";
	
	//--------------
	
$localizacao = $_POST['localizacao'];
$fornecedor = $_POST['fornecedor'];
$obs_veiculo = $_POST['obs_veiculo'];
	
	$rdo_ordem = $_POST['rdo_ordem'];
	$num_contrato = $_POST['num_contrato'];
	$valormensal = $_POST['valormensal'];
	$mobilizado = $_POST['mobilizado'];
	$obra = $_POST['obra'];


$texto = "http://www.digicompras.com.br/fluxocar/buscainformacoes.php?placa=$placa";
	



$comando = "update `$db`.`veiculos` set `veiculo` = '$veiculo',`ano` = '$ano',`modelo` = '$modelo',`placa` = '$placa',`chassi` = '$chassi',`renavam` = '$renavam',`corveiculo` = '$corveiculo',`tipoveiculo` = '$tipoveiculo',`status` = '$status',`numeroveiculo` = '$numeroveiculo',`km` = '$km',`horimetro` = '$horimetro',`valormanutencao` = '$valormanutencao',`datachegada` = '$datachegada',`datavistoriawpx` = '$datavistoriawpx',`datavistoriacc` = '$datavistoriacc',`datainiciotrabalho` = '$datainiciotrabalho',`localizacao` = '$localizacao',`fornecedor` = '$fornecedor',`obs_veiculo` = '$obs_veiculo',`url` = '$texto',`rdo_ordem` = '$rdo_ordem',`num_contrato` = '$num_contrato',`datacontrato` = '$datacontrato',`valormensal` = '$valormensal',`mobilizado` = '$mobilizado',`obra` = '$obra' where `veiculos`. `codigo` = '$codigo' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao alterar os dados do veículo!");


echo "Dados do veículo alterados com sucesso! <br>";
	
	
$sql = "SELECT * FROM ocorrencias where placa = '$placa_antiga'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$link_nf_antigo = $linha[23];
	

$string = "$link_nf_antigo";
$stringCorrigida = str_replace("$placa_antiga", "$placa", $string);


	$comando = "update `$db`.`ocorrencias` set `placa` = '$placa',`chassi` = '$chassi',`renavam` = '$renavam',`link_nf` = '$stringCorrigida' where `ocorrencias`. `placa` = '$placa_antiga'";
mysql_query($comando,$conexao);
	
}
	
if (!file_exists($placa)){

mkdir ("../../$placa", 0755);

	
	}
	
	

?>

<?
$sql = "SELECT * FROM veiculos where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$datacadastro = $linha[1];
$horacadastro = $linha[2];
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
$data_comunicado = $linha[52];
$hora_comunicado = $linha[53];
$operador_comunicou = $linha[54];
$cel_operador_comunicou = $linha[55];
$email_operador_comunicou = $linha[56];
$estabelecimento_comunicou = $linha[57];
$cidade_estabelecimento_comunicou = $linha[58];
$tel_estabelecimento_comunicou = $linha[59];
$email_estabelecimento_comunicou = $linha[60];
$url = $linha[66];
	
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
	
	//PREPARA O PEDIDO
	$mens   =  "Olá! Comunicado de venda efetuado na $nfantasia!   \n";
	$mens  .=  "Visite-nos $site \n\n";
	
	
	$mens  .=  "Data do comunicado: ".$data_comunicado."                                                    \n";
	$mens  .=  "Hora do comunicado: ".$hora_comunicado."                                                    \n";
	$mens  .=  "Concessionária: ".$concessionaria."                                                       \n";
	$mens  .=  "CNPJ: ".$cnpj_concessionaria."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_concessionaria."                                                    \n";
	$mens  .=  "Estado: ".$estado_concessionaria."                                                    \n";
	$mens  .=  "Telefone: ".$tel_concessionaria."                                                    \n";
	$mens  .=  "E-Mail: ".$email_concessionaria."                                                    \n\n";
	
	$mens  .=  "Veículo: ".$veiculo."                                                    \n";
	$mens  .=  "Ano: ".$ano."                                                    \n";
	$mens  .=  "Modelo: ".$modelo."                                                    \n";
	$mens  .=  "Chassi: ".$chassi."                                                    \n";
	$mens  .=  "Renavam: ".$renavam."                                                    \n";
	$mens  .=  "Placas: ".$placa."                                                    \n";
	$mens  .=  "Observações: ".$obs_veiculo."                                                    \n\n";
	
	$mens  .=  "Cliente: ".$nome."                                                    \n";
	$mens  .=  "Cidade: ".$cidade."                                                    \n";
	$mens  .=  "Endereço: ".$endereco."                                                    \n";
	$mens  .=  "Número: ".$numero."                                                    \n";
	$mens  .=  "Bairro: ".$bairro."                                                    \n";
	$mens  .=  "CEP: ".$cep."                                                    \n";
	$mens  .=  "Telefone: ".$telefone."                                                    \n";
	$mens  .=  "Celular: ".$celular."                                                    \n";
	$mens  .=  "Observações: ".$obs."                                                    \n\n";
	
	$mens  .=  "Operador que efetuou o comunicado: ".$operador_comunicou."                                                    \n";
	$mens  .=  "Celular: ".$cel_operador_comunicou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_operador_comunicou."                                                    \n";
	$mens  .=  "Estabelecimento: ".$estabelecimento_comunicou."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento_comunicou."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento_comunicou."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento_comunicou."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Comunicado de venda realizado no sistema em ".$data_comunicado, $mens,"From:".$email_dest."\r\nBcc:".$email);

?>


<body>
<table width="100%" border="1" align="center">
  <tbody>
    <tr>
      <td width="30%">&nbsp;</td>
      <td width="36%" align="center">
		  <?
			$aux = '../../qrcode/qr_img0.50j/php/qr_img.php?';
			$aux .= "d=$url&";
			$aux .= 'e=H&';
			$aux .= 's=4&';
			$aux .= 't=J';
		?>
      <div style="float: left; border: 1px solid #000;"> <img src="<?php echo $aux; ?>"><br><? echo "$veiculo<br>$placa"; ?></div></td>
      <td width="34%">&nbsp;</td>
    </tr>
    <tr>
      <td><form name="form1" method="post" action="pesquisa.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class="class01" type="submit" name="Submit2" value="Voltar">
        <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      </form></td>
      <td><form action="editar_veiculo.php" method="post" name="form1">
        <div align="center">
          <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
          <? echo "<input class='class01' type='submit' name='Submit' value='Continuar Editando'>";  ?>
        </div>
      </form></td>
      <td><form action="etiqueta_pasta.php" method="post" name="form1" target="_blank">
        <div align="center">
          <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
          <? echo "<input class='class01' type='submit' name='Submit' value='Etiqueta'>";  ?> </div>
      </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>
<?
mysql_close($conexao);
?>
