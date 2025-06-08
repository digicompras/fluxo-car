<?
ini_set('default_charset','UTF8_general_mysql500_ci');


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

<title>PESQUISA DE VE&Iacute;CULO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../../conect/conect.php';
	

$senha = $_SESSION['senha'];

$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$operador_informante = $linha[1];

}


$solicitacao = $_POST['solicitacao'];


$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];
	
}

?>





<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

  


<?


$vg = $_POST['placa'];


$placa = $vg;



$sql = "SELECT * FROM veiculos where placa = '$placa' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];

$datacadastro = $linha[1];

$horacadastro = $linha[2];

//$operador = $linha[3];

$cel_operador = $linha[4];

$email_operador = $linha[5];

$estabelecimento = $linha[6];

$cidade_estabelecimento = $linha[7];

$tel_estabelecimento = $linha[8];

$email_estabelecimento = $linha[9];

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

$fornecedor = $linha[77];

}

?>


<?
$obra = $_POST['obra'];

	
$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];

$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$datafinal = "$ano_final-$mes_final-$dia_final";
	
?>

<table width="100%" border="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center" background="../../imagens_sistema/fundocelulas2.png" style="font-size: 16px"><strong>DETALHAMENTO RDO  DO VE&Iacute;CULO</strong> <? echo $placa; ?></td>
  </tr>
  <tr>
    <td width="17%" style="font-size: 16px">Ve&iacute;culo</td>
    <td width="29%" style="font-size: 16px"><? echo $veiculo; ?></td>
    <td width="22%" style="font-size: 16px">Placas</td>
    <td width="32%" style="font-size: 16px"><? echo $placa; ?></td>
  </tr>
  <tr>
    <td style="font-size: 16px">Ano</td>
    <td style="font-size: 16px"><? echo $ano; ?></td>
    <td style="font-size: 16px">Modelo</td>
    <td style="font-size: 16px"><? echo $modelo; ?></td>
  </tr>
  <tr>
    <td style="font-size: 16px">Cor</td>
    <td style="font-size: 16px"><? echo $corveiculo; ?></td>
    <td style="font-size: 16px">Renavam</td>
    <td style="font-size: 16px"><? echo $renavam; ?></td>
  </tr>
  <tr>
    <td style="font-size: 16px">Chassi</td>
    <td style="font-size: 16px"><? echo $chassi; ?></td>
    <td style="font-size: 16px">&nbsp;</td>
    <td style="font-size: 16px">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" style="font-size: 16px" align="center">Total de di&aacute;rias</td>
  </tr>
  <tr>
    <td colspan="4" style="font-size: 16px" align="center"><?

$sql = "select sum(situacao) as totaldiarias from rdo where obra = '$obra' and placa = '$placa' and data between '$datainicial' and '$datafinal' and situacao = '1'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$quant_total_diarias = $linha['totaldiarias'];

echo "$quant_total_diarias";
	
	?></td>
  </tr>
</table>
<?
$sql = "SELECT * FROM rdo where obra = '$obra' and placa = '$placa' and data between '$datainicial' and '$datafinal' order by data asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$operador_que_informou = $linha[3];

$datardo = $linha[12];
$situacao = $linha[10];
$localizacao = $linha[23];
$placa_rdo = $linha[6];
	
	  
	  ?>
	
<table width="70%" border="0" align="center" cellspacing="0">
  <tbody>
    <tr>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Data</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Situa&ccedil;&atilde;o</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Localiza&ccedil;ao</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Operador</td>
    </tr>
    <tr>
      <td width="16%" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo $datardo; ?></td>
      <td width="19%" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">
<? 
	
echo "$situacao<br>";
	
$sql11 = "SELECT * FROM rdo_comentarios where placa = '$placa_rdo' and localizacao = '$localizacao' and datacomentario = '$datardo' and horas_manutencao >= '0.01' order by codigo desc limit 1";
$res11 = mysql_query($sql11);
while($linha=mysql_fetch_row($res11)) {
//$registro_de_lancamento_rdo = mysql_num_rows($res11);
	

$horas_manutencao_rdo_comentarios = $linha[14];
	
if($horas_manutencao_rdo_comentarios>=0.01){
echo "$horas_manutencao_rdo_comentarios(H.M.)";
}
	
}
	

		  

?>
		</td>
      <td width="31%" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo $localizacao; ?></td>
      <td width="34%" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo $operador_que_informou; ?></td>
    </tr>
	  

	  
    <tr>
      <td style="font-size: 16px">&nbsp;</td>
      <td style="font-size: 16px">&nbsp;</td>
      <td style="font-size: 16px">&nbsp;</td>
      <td style="font-size: 16px">&nbsp;</td>
    </tr>
	  
  </tbody>
</table>
	<?  } ?>
<p>&nbsp;</p>
</body>

</html>

