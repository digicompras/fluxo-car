<?

if($modopagto=="CARTAO"){

if(empty($valor_entrada)){
	
}
else{
echo "Entrada: $valor_entrada<br>";
}
	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao1 = '1' group by num_ordem_do_cartao1 order by cartao asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}	
		
		
	$sql8 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao2 = '2' group by num_ordem_do_cartao2 order by cartao asc";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		
	$sql9 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao3 = '3' group by num_ordem_do_cartao3 order by cartao asc";
$res9 = mysql_query($sql9);
while($linha=mysql_fetch_row($res9)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		
	$sql10 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTAO' and categoria_conta = 'R_F_C_C' and num_ordem_do_cartao4 = '4' group by num_ordem_do_cartao4 order by cartao asc";
$res10 = mysql_query($sql10);
while($linha=mysql_fetch_row($res10)) {

	
$cartao_que_passou = $linha[33];
	$valor_do_cartao_que_passou = $linha[7];
	$quantas_parcelas_passou = $linha[9];
	$num_mensalidade_do_cartao_que_passou = $linha[31];
	$tipo_do_cartao_que_passou = $linha[48];
	$valortotal_do_cartao_que_passou = $linha[49];
	
	echo "<br> Cartao: $cartao_que_passou - $tipo_do_cartao_que_passou Valor R$ $valortotal_do_cartao_que_passou em $quantas_parcelas_passou parcelas de R$ $valor_do_cartao_que_passou<br>";
	
}		
		
		//if($num_parcelas>=1){
		
	$sql11 = "SELECT * FROM cx_entradas where num_fatura = '$num_fatura' and modo_pagto = 'CARTAO' group by cartao ";
$res11 = mysql_query($sql11);
while($linha=mysql_fetch_row($res11)) {
	
	$cartao_cx = $linha[43];
	$cartao2_cx = $linha[48];
	$cartao3_cx = $linha[53];
	$cartao4_cx = $linha[58];

	if(empty($cartao_cx)){
		
	}
	else{
		
$cartao_a_vista = $linha[43];
	$tipo_cartao_a_vista = $linha[44];
	$valor_cartao_a_vista = $linha[45];
	$vencto_cartao_a_vista = $linha[46];
	$custo_com_cartao1_a_vista = $linha[47];
	
	
	echo "<br> Cartao: $cartao_a_vista - $tipo_cartao_a_vista R$ $valor_cartao_a_vista<br>";
		
	}
	
	if(empty($cartao2_cx)){
		
	}
	else{
		
$cartao2_a_vista = $linha[48];
	$tipo_cartao2_a_vista = $linha[49];
	$valor_cartao2_a_vista = $linha[50];
	$vencto_cartao2_a_vista = $linha[51];
	$custo_com_cartao2_a_vista = $linha[52];
	

	
	echo "<br> Cartao: $cartao2_a_vista - $tipo_cartao2_a_vista R$ $valor_cartao2_a_vista<br>";
		
	}
	
	if(empty($cartao3_cx)){
		
	}
	else{
		
$cartao3_a_vista = $linha[53];
	$tipo_cartao3_a_vista = $linha[54];
	$valor_cartao3_a_vista = $linha[55];
	$vencto_cartao3_a_vista = $linha[56];
	$custo_com_cartao3_a_vista = $linha[57];
	
	
	echo "<br> Cartao: $cartao3_a_vista - $tipo_cartao3_a_vista R$ $valor_cartao3_a_vista<br>";
		
	}
	
	if(empty($cartao4_cx)){
		
	}
	else{
		
$cartao4_a_vista = $linha[58];
	$tipo_cartao4_a_vista = $linha[59];
	$valor_cartao4_a_vista = $linha[60];
	$vencto_cartao4_a_vista = $linha[61];
	$custo_com_cartao4_a_vista = $linha[62];
	
	
	echo "<br> Cartao: $cartao4_a_vista - $tipo_cartao4_a_vista R$ $valor_cartao4_a_vista<br>";
		
	}
		
	
}
		
	//}
		
	}
?>