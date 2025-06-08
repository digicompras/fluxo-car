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



$concessionaria = $_POST['concessionaria'];

$placa = $_POST['placa'];

$chassi = $_POST['chassi'];

$renavam = $_POST['renavam'];

//$status_filtro = $_POST['status_filtro'];

//$cnpj_filtro = $_POST['cnpj_filtro'];



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
	
	$localizacao = $linha[76];
	
	$fornecedor = $linha[77];

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



  <table width="100%" border="0">
    <tbody>
            <tr>
              <td width="8%"><form name="form1" method="post" action="pesquisa.php">
                <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
                <input class='class01' type="submit" name="Submit3" value="Voltar">
                <input name="cnpj" type="hidden" id="cnpj" value="<? echo $senha; ?>">
              </form></td>
              <td width="64%">&nbsp;</td>
              <td width="28%">&nbsp;</td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
        <table width="80%" border="0" align="center" cellspacing="0">
          <tr>
                <td colspan="5" align="center"><?

if($reg==1) {
	

echo "ATENCAO!!!...Esse Veiculo ja esta registrado no sistema! <br><br> ";

}

else

{

echo "Veiculo NAO registrado na base da dados do sistema !<br><br> Clique em REGISTRAR VEICULO!";

}



?></td>
            <td width="15%" align="center" rowspan="8" valign="top"><?
			$aux = '../../qrcode/qr_img0.50j/php/qr_img.php?';
			$aux .= "d=$url&";
			$aux .= 'e=H&';
			$aux .= 's=4&';
			$aux .= 't=J';
		?>
              <span style="float: left; border: 1px solid #000;"><img src="<?php echo $aux; ?>"><br><? echo "$veiculo<br>$placa"; ?></span></td>
                <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="6%">&nbsp;</td>
            <td width="25%">Ve&iacute;culo</td>
            <td width="8%">Placas</td>
            <td width="11%">Cor</td>
            <td width="15%">Fornecedor</td>
            <td width="20%">&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><? echo $veiculo; ?></td>
            <td><? echo $placa; ?></td>
            <td><? echo $corveiculo; ?></td>
            <td><? echo $fornecedor; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Ano</td>
            <td>Modelo</td>
            <td>&nbsp;</td>
            <td>Cidade</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><? echo $ano; ?></td>
            <td><? echo $modelo; ?></td>
            <td>&nbsp;</td>
            <td><? echo $localizacao; ?></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Chassi</td>
            <td>Renavam</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><? echo $chassi; ?></td>
            <td><? echo $renavam; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>



  <table width="60%"  border="0">

  <tr>

    <td width="26%">

	

	<form action="registrar_veiculo.php" method="post" name="form1">

      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>

      <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
      <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
<input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>">

      <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $nfantasia_concessionaria; ?>">

      <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj_concessionaria; ?>">

      <input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>">

      <? if($reg==0) { echo "<input class='class01' type='submit' name='Submit' value='Registrar Veiculo'>"; } ?>


    </form></td>
    <td width="21%"><form action="registrar_manutencao.php" method="post" name="form1">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
      <? if(($reg==1) && ($status=="Estoque")) { echo "<input class='class01' type='submit' name='Submit' value='Registrar Manutencao'>"; } ?>
    </form></td>

    <td width="18%">
	  
<form action="../relatorios/historico_de__manutencoes_do_veiculo.php" method="post" target="_blank" name="form1">

      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
      <? if(($reg==1) && ($status=="Estoque")) { echo "<input class='class01' type='submit' name='Submit' value='Visualizar Manutencoes'>"; } ?>

    </form>
	  
    </td>

    <td width="35%">
	  
<form action="editar_veiculo.php" method="post" name="form2">

      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      
      <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
      <? if(($reg==1) && ($status=="Estoque"))  { echo "<input class='class01' type='submit' name='Submit' value='Editar Veiculo'>"; } ?>

    </form>
	  
    </td>
    <td width="35%"><form action="etiqueta_pasta.php" method="post" name="form1" target="_blank">
      <div align="center">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
        <? if(($reg==1) && ($status=="Estoque"))  { echo "<input class='class01' type='submit' name='Submit' value='Etiqueta'>"; } ?>
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

  </table>
  <br>
  <p>&nbsp;</p>

      