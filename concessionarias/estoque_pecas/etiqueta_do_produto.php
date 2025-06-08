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


$referencia = $_POST['referencia'];

$referencia = $_GET['referencia'];

$sql = "select * from estoque_pecas where referencia = '$referencia' order by referencia asc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$part_number = $linha[0];
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
$codigo = $linha[11];
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
$operador = $linha[40];
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



  <title>ETIQUETA DO PRODUTO</title>



  <style type="text/css">
  .style2 {color: #0000FF;
	font-weight: bold;
}
  </style>

<br>
  <table width="80%" border="6" align="center">
    <tbody>
      <tr>
        <td align="center"><table width="90%" border="0" align="center" cellspacing="0">
          <tr>
                  <td colspan="2" align="center"><strong>Nome do Produto</strong></td>
            <td align="center"><strong>Part Number</strong></td>
            <td width="16%" align="center" rowspan="6" valign="top"><?
			$aux = '../../qrcode/qr_img0.50j/php/qr_img.php?';
			$aux .= "d=$part_number&";
			$aux .= 'e=H&';
			$aux .= 's=4&';
			$aux .= 't=J';
		?>
              <span style="float: left; border: 1px solid #000;"><img src="<?php echo $aux; ?>"><br>
                <? echo "$part_number"; ?></span>
			  <?
				  require_once('barcode.inc.php'); 
    new barCodeGenrator("$part_number",1,"$part_number.gif", 190, 130, true);
	echo '<img src="'.$part_number.'.gif" />';
				  ?>
			  
			  </td>
          </tr>
          <tr>
                  <td colspan="2" align="center" valign="top"><? echo $nome_produto; ?></td>
                  <td align="center" valign="top"><? echo $part_number; ?></td>
          </tr>
          <tr>
            <td align="center"><strong>Localizacao</strong></td>
            <td align="center"><strong>Grupo</strong></td>
            <td align="center"><strong>Sub-Grupo</strong></td>
          </tr>
          <tr>
            <td width="22%" align="center" valign="top"><input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
            <? echo $localizacao_produto; ?></td>
            <td width="16%" align="center" valign="top"><? echo $grupo; ?>
              <input name="corveiculo" type="hidden" id="corveiculo" value="<? echo $corveiculo; ?>"></td>
            <td width="15%" align="center" valign="top"><? echo $sub_grupo; ?></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top"><input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>"></td>
            <td align="center" valign="top"><input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>"></td>
            <td align="center" valign="top"><input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>"></td>
          </tr>
        </table></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>

