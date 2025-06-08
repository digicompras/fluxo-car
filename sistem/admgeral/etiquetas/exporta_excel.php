<?

require '../../conect/conect.php';

?>


  <?
$tipo = $_POST['tipo'];
		



?>


<?

$sql = "select * from clientes where tipo = '$tipo' order by nome asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_encontrados = mysql_num_rows($res);

}

?>

<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	//$email_dest   =   $email_empresa;
		$email_dest   =   "digicompras@digicompras.com.br";

	
	//PREPARA O PEDIDO
	$mens   =  "Ola! Seu cliente $nfantasia! acabou de efetuar um Download do relatorio de fichas enviadas para fabrica! Confira abaixo:   \n";
	$mens  .=  " \n";
	$mens  .=  "Cliente: ".$nfantasia."                                                       \n";
	$mens  .=  "Data do Download: ".$data_download."                                                    \n";
	$mens  .=  "Hora: ".$hora."                                                    \n\n";
	
	$mens  .=  "Periodo escolhido: ".$dia_inicial."-".$mes_inicial."-".$ano_inicial." ate ".$dia_final."-".$mes_final."-".$ano_final."                                       \n";
	$mens  .=  "Total de pares no periodo: ".$total_producao."                                                    \n";
	

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Download de relatorio em $data_download - ".$hora, $mens,"From:".$nfantasia."@$nfantasia.com.br");

?>


<?php
 
 
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td colspan="8"><div align="center">Total de clientes no perfil'." $tipo ". '--->>> '."$registros_encontrados".'</div></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><div align="center"><b>Nome</b></div></td>';
$html .= '<td><div align="center"><b>Endereço</b></div></td>';
$html .= '<td><div align="center"><b>Numero</b></div></td>';
$html .= '<td><div align="center"><b>Bairro</b></div></td>';
$html .= '<td><div align="center"><b>Complemento</b></div></td>';
$html .= '<td><div align="center"><b>Cidade</b></div></td>';
$html .= '<td><div align="center"><b>Estado</b></div></td>';
$html .= '<td><div align="center"><b>CEP</b></div></td>';

$html .= '</tr>';
$sql = "select * from clientes where tipo = '$tipo' order by nome asc";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {




$nome = $linha[1];

$endereco = $linha[11];

$numero = $linha[12];

$bairro = $linha[13];

$complemento = $linha[14];

$cidade = $linha[15];

$estado = $linha[16];

$cep = $linha[17];

$telefone = $linha[18];

$celular = $linha[19];

$email = $linha[20];


$html .= '<tr>';
$html .= '<td><div align="center">'."$nome".'</div></td>';
$html .= '<td><div align="center">'."$endereco".'</div></td>';
$html .= '<td><div align="center">'."$numero".'</div></td>';
$html .= '<td><div align="center">'."$bairro".'</div></td>';
$html .= '<td><div align="center">'."$complemento".'</div></td>';
$html .= '<td><div align="center">'."$cidade".'</div></td>';
$html .= '<td><div align="center">'."$estado".'</div></td>';
$html .= '<td><div align="center">'."$cep".'</div></td>';

$html .= '</tr>';

}

$html .= '</table>';


// Definimos o nome do arquivo que será exportado

$data = date('d-m-Y');
$hora_download = date('H:i:s');

$arquivo = "$nfantasia_empresa-$data-$hora_download.xls";

 
// Configurações header para forçar o download
header ("Expires: Mon, 16 Abril 2014 21:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
 
// Envia o conteúdo do arquivo
echo $html;
exit;
 
?>
