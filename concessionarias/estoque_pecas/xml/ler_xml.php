<?php
session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

?>
<html>
<head>
<title>LENDO XML</title>
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
require '../../../conect/conect.php';
error_reporting(E_ALL);
	
$senha = $_SESSION['senha'];

$sql = "select * from operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$operador_alterou = $linha[1];
	
$teloperador_alterou = $linha[19];
	
	$emailoperador_alterou = $linha[20];
	
	$estab_pertence = $linha[44];
}

?>

		  
		  
		  <?
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



//dados do veiculo
$xml_importado = $_POST['xml_importado'];
	
	$solicitacao = $_POST['solicitacao'];
	
$arquivo = $_FILES['xml_importado']['name'];
	
$uploaddir = "$xml_importado/";
$uploadfile = $uploaddir. $_FILES['xml_importado']['name'];

if (
move_uploaded_file($_FILES['xml_importado']['tmp_name'], $uploaddir.$_FILES['xml_importado']['name'])) {
  echo "xml com sucesso! ";
} else {
  echo "xml nao enviado!";
}
	
	if($solicitacao=="abrirxml"){

// The file test.xml contains an XML document with a root element
// and at least an element /[root]/title.

if (file_exists($xml_importado)) {
    $xml = simplexml_load_file($xml_importado);
 
    print_r($xml);
} else {
    exit('Failed to open test.xml.');
}

	
if (!file_exists($xml_importado)){

mkdir ("$xml_importado", 0755);

	
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
	$mens  .=  "E-Mail: ".$emailoperador_comunicou."                                                    \n";
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
      <td width="36%"><table width="100%" border="2">
        <tr>
          <td align="center">Carregar XML</td>
        </tr>
        <tr>
          <td align="center"><span style="font-size: 16px">
            <? 
echo "<a href='$img1' target='_blank'><img src='$img1' height='50' border='2' ></a> - <a href='$img1' target='_blank'>$nomefoto1</a>"; 
				  ?>
          </span></td>
        </tr>
        <form action="ler_xml.php" method="post" enctype="multipart/form-data" name="form2">
          <tr>
            <td align="center"><span style="font-size: 16px">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input class="class02" type="file" name="xml_importado" id="xml_importado"></td>
          </tr>
          <tr>
            <td align="center"><span style="font-size: 16px">
              <input name="solicitacao" type="hidden" id="solicitacao" value="abrirxml">
              </span>
              <input class="class01" type="submit" name="submit" id="submit13" value="Enviar"></td>
          </tr>
        </form>
      </table></td>
      <td width="34%">&nbsp;</td>
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
