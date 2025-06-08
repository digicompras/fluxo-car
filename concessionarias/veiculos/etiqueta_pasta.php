<?



session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

?>



<?



require '../../conect/conect.php';


$placa = $_POST['placa'];

$sql = "SELECT * FROM veiculos where placa = '$placa'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg++;



$codigo_veiculo = $linha[0];

$datacadastro = $linha[1];

$horacadastro = $linha[2];

$operador = $linha[3];

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

$url = $linha[66];
	
$fornecedor = $linha[77];
	
$localizacao = $linha[76];

}

?>

<?

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

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_concessionaria = $linha[2];
$cnpj_concessionaria = $linha[3];


}




?>



  <title>VERIFICANDO DE REGISTRO DE VEICULOS</title>



  <br>
  <table width="80%" border="6" align="center">
    <tbody>
      <tr>
        <td align="center"><table width="90%" border="0" align="center" cellspacing="0">
          <tr>
                  <td colspan="2" align="center"><strong>Ve&iacute;culo</strong></td>
            <td align="center"><strong>Placa</strong></td>
                  <td align="center"><strong>Sublocado(Fornecedor)</strong></td>
                  <td align="center">&nbsp;</td>
            <td width="16%" align="center" rowspan="6" valign="top"><?
			$aux = '../../qrcode/qr_img0.50j/php/qr_img.php?';
			$aux .= "d=$url&";
			$aux .= 'e=H&';
			$aux .= 's=4&';
			$aux .= 't=J';
		?>
              <span style="float: left; border: 1px solid #000;"><img src="<?php echo $aux; ?>"><br>
                <? echo "$veiculo<br>$placa<br>www.fluxocar.com.br"; ?></span></td>
          </tr>
          <tr>
                  <td colspan="2" align="center" valign="top"><? echo $veiculo; ?></td>
                  <td align="center" valign="top"><? echo $placa; ?></td>
                  <td align="center" valign="top"><strong><? echo $fornecedor; ?></strong></td>
                  <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center"><strong>Localizacao</strong></td>
            <td align="center"><strong>Cor</strong></td>
            <td align="center"><strong>Chassi</strong></td>
            <td align="center"><strong>Renavam</strong></td>
            <td align="center"><strong>Ano</strong></td>
          </tr>
          <tr>
            <td width="22%" align="center" valign="top"><input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
            <? echo $localizacao; ?></td>
            <td width="16%" align="center" valign="top"><? echo $corveiculo; ?>
              <input name="corveiculo" type="hidden" id="corveiculo" value="<? echo $corveiculo; ?>"></td>
            <td width="15%" align="center" valign="top"><? echo $chassi; ?></td>
            <td width="17%" align="center" valign="top"><? echo $renavam; ?>              <input name="ano" type="hidden" id="ano" value="<? echo $ano; ?>"></td>
            <td width="14%" align="center" valign="top"><? echo $ano; ?>              <input name="modelo" type="hidden" id="modelo" value="<? echo $modelo; ?>"></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center"><strong>Modelo</strong></td>
          </tr>
          <tr>
            <td align="center" valign="top"><input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>"></td>
            <td align="center" valign="top"><input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>"></td>
            <td align="center" valign="top"><input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>"></td>
            <td align="center" valign="top">&nbsp;</td>
            <td align="center" valign="top"><? echo $modelo; ?></td>
          </tr>
        </table></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>

      