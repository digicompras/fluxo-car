<?
ini_set('default_charset','UTF8_general_mysql500_ci');


session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

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
	
	
$sql3 = "select * from db";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
	
$db = $linha[1];	
}
	

$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$operador_informante = $linha[1];
$operador_que_apontou_a_peca = $linha[20];
$estab_pertence = $linha[44];

}


$solicitacao = $_POST['solicitacao'];
$qr_conteudo = $_GET['qr_conteudo'];
	
if(empty($qr_conteudo)){
$part_number = $_POST['part_number'];
}
else{
$part_number = $qr_conteudo;
	}

	

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
	
$localizacao = $linha[76];

$fornecedor = $linha[77];

}

?>


<?
	

	
if($solicitacao=="incluirmaisumanf"){
	
	$cod_ocorrencia = $_POST['cod_ocorrencia'];
	$nf = $_POST['nf'];
	$valor_da_manutencao = $_POST['valor_da_manutencao'];
	$obs_adicional_da_manutencao = $_POST['obs_adicional_da_manutencao'];
	
	$data_adicional = date('Y-m-d');
	$hora_adicional = date('H:i:s');
	
$sql = "SELECT * FROM ocorrencias where codigo = '$cod_ocorrencia' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$ultimo_cod_ocorrencia = $linha[0];
$cod_ocorrencia = $linha[0];
$placa = $linha[1];

$renavam = $linha[2];
$chassi = $linha[3];
$condutor = $linha[4];

$concessionaria = $linha[5];
	$datamanutencao = $linha[6];
	$data_da_manutencao = $linha[6];
	
	$horamanutencao = $linha[7];
	$municipio = $linha[8];
	$tipomanutencao = $linha[9];
	$detalhamento = $linha[10];
	$agente = $linha[11];
	$corveiculo = $linha[12];
	
	$horimetro = $linha[13];
$km = $linha[14];
$valormanutencao = $linha[15];
$descontar = $linha[16];
	$fornecedor = $linha[21];
	$primeira_nf = $linha[22];
	$link_primeira_nf = $linha[23];
	$operador_manutencao = $linha[24];
	
}
	
$numero_manutencao = $ultimo_cod_ocorrencia;
	
if (!file_exists($diretorio)){

mkdir ("../../$placa/$data_da_manutencao", 0755);
	
	}
	
if (!file_exists($diretorio)){

mkdir ("../../$placa/$data_da_manutencao/$numero_manutencao", 0755);
	
	}
	
	
	
$foto = $_FILES['foto']['name'];
	
	
	
$uploaddir = "../../$placa/$data_da_manutencao/$numero_manutencao/";
$uploadfile = $uploaddir. $_FILES['foto']['name'];


	if (
move_uploaded_file($_FILES['foto']['tmp_name'], $uploaddir.$_FILES['foto']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_nf = "http://www.digicompras.com.br/fluxocar/$placa/$data_da_manutencao/$numero_manutencao/$foto";
	
	

	
$comando = "insert into nfs_manutencao(cod_ocorrencia,nf,fornecedor,veiculo,placa,chassi,renavam,datamanutencao,link_nf,valormanutencao,obs_adicional_da_manutencao,data_adicional,hora_adicional,operador_informante,numero_manutencao) 

values('$cod_ocorrencia','$nf','$fornecedor','$veiculo','$placa','$chassi','$renavam','$datamanutencao','$link_nf','$valor_da_manutencao','$obs_adicional_da_manutencao','$data_adicional','$hora_adicional','$operador_informante','$cod_ocorrencia')";
mysql_query($comando,$conexao);
	
}
	
?>
	
<?
	
if($solicitacao=="incluirpeca"){
	
$nome_do_produto = $_POST['nome_produto'];
	
	
$verifica_quant_utilizada = $_POST['quant_utilizada'];
	if(empty($verifica_quant_utilizada)){
$quant_utilizada = "1";
	}
	else{
$quant_utilizada = $verifica_quant_utilizada;
	}
	
	
	$cod_ocorrencia = $_POST['cod_ocorrencia'];
	$placa = $_POST['placa'];

	
if(empty($part_number)){
	
$nome_do_produto2 = explode(" - ", $nome_do_produto);

$nome_denominado_ao_produto = $nome_do_produto2[0];
$referencia = $nome_do_produto2[1];
	
$sql = "SELECT * FROM estoque_pecas where referencia = '$referencia' limit 1";
}
else{
$sql = "SELECT * FROM estoque_pecas where referencia = '$part_number' limit 1";
}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$partnumberdoproduto = $linha[0];
$foto = $linha[1];
$material = $linha[2];
$cor = $linha[3];
$grupo = $linha[4];
$sub_grupo = $linha[5];
$descricao = $linha[6];
$preco = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];
$data_hora = $linha[10];
$codigo_interno_da_peca = $linha[11];
$foto2 = $linha[12];
$foto3 = $linha[13];
$foto4 = $linha[14];
$cod_barras = $linha[15];
	
$quant_estoque = $linha[16];
	
$expedicao = $linha[17];
$quant_disponivel = $linha[18];
$quant_minima = $linha[19];
$aparecer_site = $linha[20];
$preco_compra = $linha[21];
$frete = $linha[22];
$margem_lucro = $linha[23];
$impostos = $linha[24];
$margem_lucro_informada = $linha[25];
$impostos_informado = $linha[26];
$nome_produto = $linha[27];
$fornecedor = $linha[28];
$travesseiro1 = $linha[29];
$travesseiro2 = $linha[30];


$margem_folga = $linha[32];
$margem_folga_decimal = $linha[33];

$descontomaximo = $linha[34];

$classe = $linha[38];
$departamento = $linha[39];

}
	

	
	
$saldo_estoque_da_peca = bcsub($quant_estoque,$quant_utilizada);
	
if($quant_utilizada<=$quant_estoque){
	
$comando = "insert into ocorrencias_pecas(cod_barras,referencia,foto,foto2,material,cor,grupo,sub_grupo,descricao,preco,oferta,preco_oferta,data,hora,quant_utilizada,expedicao,quant_disponivel,quant_minima,aparecer_site,preco_compra,frete,margem_lucro,impostos,margem_lucro_informada,impostos_informado,nome_produto,fornecedor,travesseiro1,travesseiro2,margem_folga, margem_folga_decimal,descontomaximo,classe,departamento,operador,datacadastro,horacadastro,estab_pertence,placa,ocorrencia) 
values('$cod_barras','$partnumberdoproduto','$foto','$foto2','$material','$cor','$grupo','$sub_grupo','$descricao','$preco','$oferta','$preco_oferta','$data','$hora','$quant_utilizada','$expedicao','$quant_disponivel','$quant_minima','$aparecer_site','$preco_compra','$frete','$margem_lucro_decimal','$impostos_decimal','$margem_lucro','$impostos','$nome_produto','$fornecedor','$travesseiro1','$travesseiro2','$margem_folga','$margem_folga_decimal','$descontomaximo','$classe','$departamento','$operador','$data','$hora','$estab_pertence','$placa','$cod_ocorrencia')";

mysql_query($comando,$conexao) or die("Erro ao gravar dados");


$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$codigo_interno_da_peca'";
mysql_query($comando,$conexao);
	
	
//---------------INICIO ENVIO --------------

	
//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O informativo de peça utilizada
$sql7 = "SELECT * FROM operadores where estab_pertence = '$estab_pertence' and avisodepecas = 'sim'";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
	
$nome_administrativo = $linha[1];

//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
$email_administrativo = $linha[20];
	
	
	//PREPARA O PEDIDO
	
	
$mens  .=  $to = "$email_administrativo";
$from = "$operador_que_apontou_a_peca";
$subject = "Peça utilizada em Maquinario/Veiculo";
$html = "
<html>
<body>
Peça utilizada em Maquinario/Veiculo<br>
Nome Fantasia: $concessionaria<br><br>

Maquinário/Veículo: $veiculo<br>
Placa: $placa<br>
Chassi: $chassi<br>
Renavam: $renavam<br>
Localização: $localizacao<br>
Nº Manutenção: $cod_ocorrencia<br><br>

Quantidade Utilizada: $quant_utilizada<br>
Peça: $nome_produto<br>
Part Number: $partnumberdoproduto<br><br>

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
	
echo "$nome_administrativo - $operador_que_apontou_a_peca -  $email_administrativo";
	
}
	
//-----------FIM ENVIO -------------

	
}
else{
echo "<script>

alert('ATENÇÃO!!!... OPERAÇÃO NÃO REALIZADA!!!...  Quantidade utilizada informada $quant_utilizada - Quant Estoque $quant_estoque  Portanto nao possui saldo!');


</script>";
}
	
	
}
	
?>

<table width="100%" border="0" cellspacing="0">
  <tr>
    <td colspan="4" align="center" background="../../imagens_sistema/fundocelulas2.png" style="font-size: 16px"><strong> INFORMA&Ccedil;&Otilde;ES DO VE&Iacute;CULO</strong> <? echo $placa; ?></td>
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
    <td colspan="4" style="font-size: 16px" align="center">Observacoes<? echo "Part Number $part_number_qr Placa $placa_qr"; ?></td>
  </tr>
  <tr>
    <td colspan="4" style="font-size: 16px" align="center"><? echo $obs_veiculo; ?></td>
  </tr>
</table>
<p>&nbsp;</p>
	
	<?
$sql = "SELECT * FROM ocorrencias where placa = '$placa' order by `datamanutencao` desc,`codigo` desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$cod_ocorrencia = $linha[0];
$placa = $linha[1];

$renavam = $linha[2];
$chassi = $linha[3];
$condutor = $linha[4];

$concessionaria = $linha[5];
	$datamanutencao = $linha[6];
	$horamanutencao = $linha[7];
	$municipio = $linha[8];
	$tipomanutencao = $linha[9];
	$detalhamento = $linha[10];
	$agente = $linha[11];
	$corveiculo = $linha[12];
	
	$horimetro = $linha[13];
$km = $linha[14];
$valormanutencao = $linha[15];
$descontar = $linha[16];
	$fornecedor = $linha[21];
	$primeira_nf = $linha[22];
	$link_primeira_nf = $linha[23];
	$operador_manutencao = $linha[24];
	$reembolso = $linha[25];
	$statusocorrencia = $linha[26];
	  
	  ?>
	
<table width="100%" border="0" cellspacing="0">
  <tbody>
    <tr>
      <th colspan="5" background="../../imagens_sistema/fundocelulas2.png" style="font-size: 16px" scope="col">MANUTENCAO REALIZADA CODIGO <? echo "$cod_ocorrencia Status: $statusocorrencia"; ?></th>
    </tr>
	  
	  
    <tr>
      <td colspan="2" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Data</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Hora</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Condutor</td>
      <td width="30%" rowspan="11" align="center" valign="top" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><form action="historico_de__manutencoes_do_veiculo.php" method="post" enctype="multipart/form-data" name="form1">
        <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
        <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj_concessionaria; ?>">
        <table width="78%"  border="0" align="center">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>ND/DOC</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><span style="font-weight: bold">
              <input class='class02' name="nf" type="text" id="nf">
            </span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><span style="font-weight: bold">
              <input name="datamanutencao" type="hidden" id="datamanutencao" value="<? echo "$data_da_manutencao"; ?>">
            </span></td>
            <td>&nbsp;</td>
            <td>Valor</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><span style="font-weight: bold">
              <input name="solicitacao" type="hidden" id="solicitacao" value="incluirmaisumanf">
            </span></td>
            <td>&nbsp;</td>
            <td><span style="font-weight: bold">
              <input class='class02' name="valor_da_manutencao" type="text" id="valor_da_manutencao" maxlength="50">
            </span></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Imagem NF</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td><input class='class01' type="file" name="foto" id="foto"></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="24%" rowspan="3"><input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
              <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
              <input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>">
              <input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>">
              <span style="font-weight: bold">
                <input name="cod_ocorrencia" type="hidden" id="cod_ocorrencia" value="<? echo "$cod_ocorrencia"; ?>">
              </span></td>
            <td width="27%" rowspan="3">&nbsp;</td>
            <td width="29%">Detalhamento</td>
            <td width="20%" rowspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td><textarea class='class02' name="obs_adicional_da_manutencao" cols="30" rows="3" id="obs_adicional_da_manutencao"></textarea></td>
          </tr>
          <tr>
            <td><input class='class01' type="submit" name="Submit" value="Salvar"></td>
          </tr>
        </table>
      </form></td>
    </tr>
    <tr>
      <td colspan="2" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo $datamanutencao; ?></td>
      <td width="19%" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo $horamanutencao; ?></td>
      <td width="21%" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo $condutor; ?></td>
    </tr>
    <tr>
      <td colspan="2" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Municipio</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Empresa</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Fornecedor</td>
    </tr>
    <tr>
      <td colspan="2" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo $municipio; ?></td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo $concessionaria; ?></td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo $fornecedor; ?></td>
    </tr>
    <tr>
      <td colspan="2" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Veiculo</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Tipo</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Placa</td>
    </tr>
    <tr>
      <td colspan="2" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo "$veiculo"; ?></td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo "$tipoveiculo"; ?></td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo "$placa"; ?></td>
    </tr>
    <tr>
      <td colspan="2" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Tipo de Manutencao</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">KM</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Horimetro</td>
    </tr>
    <tr>
      <td colspan="2" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><strong><font color="#0000FF"><strong><font color="#0000FF"><? echo $tipomanutencao; ?></font></strong></font></strong></td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><strong><font color="#0000FF"><strong><font color="#0000FF"><? echo $km; ?></font></strong></font></strong></td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><strong><font color="#0000FF"><strong><font color="#0000FF"><? echo $horimetro; ?></font></strong></font></strong></td>
    </tr>
    <tr>
      <td colspan="2" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Operador</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">NF/Doc</td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">Valor</td>
    </tr>
    <tr>
      <td colspan="2" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><strong><font color="#0000FF"><strong><font color="#0000FF"><? echo "$operador_manutencao as $horamanutencao"; ?></font></strong></font></strong></td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">
		  <?
	if(empty($link_primeira_nf)){
		echo "$primeira_nf";
	}
	else{
	echo "<a href='$link_primeira_nf' target='_blank'>$primeira_nf</a>"; 
	}
		  ?></td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><strong><font color="#0000FF"><strong><font color="#0000FF"><? echo $valormanutencao; ?></font></strong></font></strong></td>
    </tr>
	  <?
$sql2 = "SELECT * FROM nfs_manutencao where placa = '$placa' and cod_ocorrencia = '$cod_ocorrencia'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$numero_nf = $linha[2];

$link_da_nf = $linha[9];
$valor_da_nf = $linha[10];
	$data_adicional = $linha[12];
	$hora_adicional = $linha[13];
	$operador_informante = $linha[14];
	
	?>
    <tr>
      <td colspan="2" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><strong><font color="#0000FF"><strong><font color="#0000FF"><? echo "$operador_informante em $data_adicional as $hora_adicional"; ?></font></strong></font></strong></td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">
		  <? 
	if(empty($link_da_nf)){
		echo "$numero_nf";
	}
	else{
	echo "<a href='$link_da_nf' target='_blank'>$numero_nf</a>"; 
	}
		  ?></td>
      <td background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><? echo "$valor_da_nf"; ?></td>
    </tr>
	  <? } ?>
    <tr>
        <td colspan="4" align="center" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">PE&Ccedil;AS UTILIZADAS POR NOME</td>
        <td align="center" valign="top" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">PE&Ccedil;AS UTILIZADAS POR PART NUMBER
		
		</td>
    </tr>
    <tr>
        <td colspan="4" align="center" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px"><form action="historico_de__manutencoes_do_veiculo.php" method="post" enctype="multipart/form-data" name="form1">
          <?

$senha = $_SESSION['senha'];

?>
          <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj_concessionaria; ?>">
          <table width="78%"  border="0" align="center">
            <tr>
              <td width="100%" colspan="4" align="center"><span style="font-weight: bold">
                <input name="solicitacao" type="hidden" id="solicitacao" value="incluirpeca">
                <input name="cod_ocorrencia" type="hidden" id="cod_ocorrencia" value="<? echo "$cod_ocorrencia"; ?>">
                <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                <input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>">
                <input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>">
              </span>Quant<span style="font-weight: bold">
                <input name="quant_utilizada" type="text" class='class02' id="quant_utilizada" size="5">
              </span>
<select class='class02' name="nome_produto" id="nome_produto">
  <option selected>Selecione</option>
                <?


    $sql = "select * from estoque_pecas order by nome_produto";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome_produto']." - ".$x['referencia']."</option>";
    }
?>
            </select>
              <input class='class01' type="submit" name="Submit2" value="+"></td>
            </tr>
          </table>
        </form></td>
        <td align="center" valign="top" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">
		<form action="historico_de__manutencoes_do_veiculo.php" method="post" enctype="multipart/form-data" name="part_number_form" id="part_number_form">
          <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
          <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj_concessionaria; ?>">
          <table width="78%"  border="0" align="center">
            <tr>
              <td width="100%" colspan="4" align="center"><span style="font-weight: bold">
                <input name="solicitacao" type="hidden" id="solicitacao" value="incluirpeca">
                <input name="cod_ocorrencia" type="hidden" id="cod_ocorrencia" value="<? echo "$cod_ocorrencia"; ?>">
                <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
                <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                <input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>">
                <input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>">
              </span>Quant<span style="font-weight: bold">
                <input name="quant_utilizada" type="text" class='class02' id="quant_utilizada" size="5"> 
                Part Number 
                <input name="part_number" type="text" class='class02' id="part_number" size="5">
              </span>
              <input class='class01' type="submit" name="Submit2" value="+"></td>
            </tr>
          </table>
			<script language='JavaScript' type='text/javascript'>
document.part_number_form.part_number.focus()
</script>
        </form>
		</td>
    </tr>
	  <?
	  $sql5 = "SELECT * FROM ocorrencias_pecas where ocorrencia = '$cod_ocorrencia'";
$res5 = mysql_query($sql5);
$registros_de_pecas_utilizadas_na_manutencao = mysql_num_rows($res5);
	
	if($registros_de_pecas_utilizadas_na_manutencao>="1"){
	
	?>
    <tr>
      <td width="20%" align="center" background="../../imagens_sistema/fundocelulas2.png" style="font-size: 16px">Quantidade</td>
      <td colspan="2" align="center" background="../../imagens_sistema/fundocelulas2.png" style="font-size: 16px"><strong>Pe&ccedil;a</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png" style="font-size: 16px" align="center"><strong>PART NUMBER</strong></td>
      <td rowspan="2" align="center" valign="top" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">&nbsp;</td>
    </tr>
	  
	  
	  <?
$sql4 = "SELECT * FROM ocorrencias_pecas where ocorrencia = '$cod_ocorrencia'";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {
$reg_pecas++;

$referencia = $linha[0];

$grupo = $linha[4];
$sub_grupo = $linha[5];
$descricao = $linha[6];

$codigo_interno_da_peca = $linha[11];
$quant_utilizada = $linha[16];
$nome_produto = $linha[27];

	
	?>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png" style="font-size: 16px" align="center"><strong><? echo "$quant_utilizada"; ?></strong></td>
      <td colspan="2" align="center" background="../../imagens_sistema/fundocelulas2.png" style="font-size: 16px"><strong><? echo "$nome_produto"; ?></strong></td>
        <td background="../../imagens_sistema/fundocelulas2.png" style="font-size: 16px" align="center"><strong><? echo "$referencia"; ?></strong></td>
    </tr>
	  <? } } ?>
    <tr>
      <td colspan="5" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px" align="center">Detalhamento</td>
    </tr>
	  
    <tr>
      <td colspan="5" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">
		  <? 
	if(empty($detalhamento)){
		
	}
	else{
	echo "<b>Data $datamanutencao Hora: $horamanutencao Operador $operador_manutencao disse:</b> $detalhamento"; 
	}
		  ?></td>
    </tr>
	  <?
$sql3 = "SELECT * FROM nfs_manutencao where placa = '$placa' and cod_ocorrencia = '$cod_ocorrencia' order by codigo";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {


	$numero_nf = $linha[2];
	$link_da_nf = $linha[9];
$obs_adicional_da_manutencao = $linha[11];
	$horimetro_atual = $linha[17];
	$comentario_inserido = $linha[18];
	$data_adicional = $linha[12];
	$hora_adicional = $linha[13];
	$operador_informante = $linha[14];
	
	?>
	  <tr>
	  <td colspan="5" background="../../imagens_sistema/fundocelulas1.png" style="font-size: 16px">
		  <? 
	if((empty($obs_adicional_da_manutencao)) && (empty($comentario_inserido))  ){
		
	}
	else{
	echo "<b>Data $data_adicional Hora: $hora_adicional Operador $operador_informante disse(Ref. Nf/Doc "; ?> 
<?
	if(empty($link_da_nf)){
		echo "$numero_nf): $obs_adicional_da_manutencao  $comentario_inserido | Hor: $horimetro_atual";
	}
	else{
		  echo "<a href='$link_da_nf' target='_blank'>$numero_nf</a>"; echo "):</b> $obs_adicional_da_manutencao  $comentario_inserido | Hor: $horimetro_atual"; 
	}
	  }
		  ?></td>
	  </tr>
	  <? }  ?>
    <tr>
      <td colspan="2" style="font-size: 16px">&nbsp;</td>
      <td colspan="3" style="font-size: 16px">&nbsp;</td>
    </tr>
	  
  </tbody>
</table>
	<? }  ?>
<p>&nbsp;</p>
</body>

</html>

