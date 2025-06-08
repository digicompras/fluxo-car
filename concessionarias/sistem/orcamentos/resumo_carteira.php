<?

if($modopagto=="CARTEIRA"){

if(empty($valor_entrada)){
	
}
else{
	echo "Entrada: $valor_entrada<br>";
}

	
	$sql7 = "SELECT * FROM contas_a_receber where num_fatura = '$num_fatura' and modopagto = 'CARTEIRA' and quitacao = 'Em Aberto' order by vencto asc";
$res7 = mysql_query($sql7);
while($linha=mysql_fetch_row($res7)) {
$registros_contas_a_receber = mysql_num_rows($res7);
	
$data_de_vencimento = $linha[8];
	$valor_da_parcela = $linha[7];
	$numero_da_parcela = $linha[31];
	
	echo "<br>Vencto: $data_de_vencimento Valor R$ $valor_da_parcela Parcela $numero_da_parcela";
	
}	
	}

?>