<?

if($modopagto=="DINHEIRO"){

if((empty($valor_entrada)) or ($valor_entrada=="0.00") ){
	
}
else{
echo "Entrada: $valor_entrada<br>";
}
	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'DINHEIRO' and quitacao = 'Em Aberto' order by vencto asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_contas_a_receber = mysql_num_rows($res7);
	
$data_de_vencimento = $linha[8];
	$valor_da_parcela = $linha[7];
	$numero_da_parcela = $linha[31];
	
	echo "<br>Vencto: $data_de_vencimento Valor R$ $valor_da_parcela Parcela $numero_da_parcela";
	
}	
			
			if($quant_parc==0){
		
	$sql11 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and modo_pagto = 'DINHEIRO' and modopagtoentrada = ''";
$res11 = mysql_query($sql11);
while($linha=mysql_fetch_row($res11)) {
	
	$dia_cx = $linha[17];
	$mes_cx = $linha[18];
	$ano_cx = $linha[19];
	$valor_cx = $linha[25];
	$modo_pagto_cx = $linha[27];
	$especificacao_cx = $linha[41];
	
	echo "<br> Valor R$ $valor_cx modo pagto $modo_pagto_cx especificacao $especificacao_cx";
	
}
			
			
	}
			
		}

?>