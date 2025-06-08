<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>

<html>

<head>

<title>RELATORIO DE RDO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style4 {font-size: 18px}

.style5 {font-size: 24px}

.style7 {

	font-size: 9px;

	font-weight: bold;

}

.style8 {font-size: 9px}

.style17 {font-size: 18px; font-weight: bold; }
.style18 {font-weight: bold}
.style19 {font-size: 10px}
.style20 {
	font-size: 16px;
	font-weight: bold;
}
.style61 {font-size: 14px; 
	font-weight: bold; 
	color: #FFFFFF;
}

-->

</style>
</head>

<?



require '../../conect/conect.php';
	include '../../css_menus/modal.css';

$senha = $_SESSION['senha'];
	
	
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];
	
	$iniciar_rdo_diferenciado = $linha[51];
	$tipofiltro_inicial = $linha[52];


}
	
$tipofiltro = $_POST['tipofiltro'];	
$solicitacao = $_POST['solicitacao'];

	
$obra = $_POST['obra'];
$mes_ano = $_POST['mes_ano'];



$dia = date('d');

$mes = date('m');

$ano = date('Y');

$hora = date('H:i:s');



$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];

$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$datafinal = "$ano_final-$mes_final-$dia_final";
	
	?>
	
	<?




?>
	
	<?
// converte as datas para o formato timestamp
$d1 = strtotime($datainicial); 
$d2 = strtotime($datafinal);
// verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
$totaldiasperiodo = bcadd(($d2 - $d1) /86400,1);
// caso a data 2 seja menor que a data 1
if($totaldiasperiodo < 0)
$totaldiasperiodo = $totaldiasperiodo * -1;


$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>











      <p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>
<p align="center" class="style4"><strong>
  <?

echo "$estab_pertence Periodo informado: $dia_inicial-$mes_inicial-$ano_inicial at&eacute; $dia_final-$mes_final-$ano_final total de dias $totaldiasperiodo";

?>
</strong></p>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="39%" align="center"><form name="form2" method="post" action="relatorio_de_rdo_sintetico.php">
        <input name="obra" type="hidden" id="obra" value="<? echo "$obra"; ?>">
        <?
$senha = $_SESSION['senha'];
		  

?>
        <?
//if($operador=="Rigo"){

?>
        <span style="font-weight: bold">
  <select class='class02' name="tipofiltro" id="tipofiltro">
    <option selected><? echo "$tipofiltro"; ?></option>
	  <option><? echo "TODOS"; ?></option>
    <?


    $sql4 = "select * from veiculos where concessionaria = '$estab_pertence' and rdo = 'sim' group by tipoveiculo order by tipoveiculo asc";
    $result4 = mysql_query($sql4);
    while($x=mysql_fetch_array($result4)){
  echo "<option>".$x['tipoveiculo']."</option>";
    }
?>
  </select>
  </span>
        <input class='class02' type="submit" name="Submit4" value="Filtrar">
        <? //} ?>
        <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
        <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
        <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
        <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
        <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
        <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
      </form></td>
      <td width="38%" align="center">&nbsp;</td>
      <td width="23%" align="center"><form action="relatorio_de_rdo_sintetico_impressao.php" method="post" name="form2" target="_blank">
        <input name="obra" type="hidden" id="obra" value="<? echo $obra; ?>">
        <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
        <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
        <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
<input class="class01" type="submit" name="Submit" value="<? echo "Imprimir"; ?>">
      <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
      <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
      <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
      <input name="tipofiltro" type="hidden" id="tipofiltro" value="<? echo "$tipofiltro";  ?>">
      </form></td>
    </tr>
  </tbody>
</table>

<table width="100%"  border="1" cellpadding="0">
            <?
	if($iniciar_rdo_diferenciado=="sim"){
			
		if(empty($tipofiltro)){
		
$sql6 = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and tipo = '$tipofiltro_inicial' and data between '$datainicial' and '$datafinal' group by localizacao order by localizacao asc";
			
		}
		else{
			
	if($tipofiltro=="TODOS"){
		
		
$sql6 = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and data between '$datainicial' and '$datafinal' group by localizacao order by localizacao asc";
		
	}
	else{
		
		
$sql6 = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and tipo = '$tipofiltro' and data between '$datainicial' and '$datafinal' group by localizacao order by localizacao asc";

		
	}
			
		}
		
	}
	else{
		
if(empty($tipofiltro)){
		
$sql6 = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and data between '$datainicial' and '$datafinal' group by localizacao order by localizacao asc";
			
		}
		else{
			
	if($tipofiltro=="TODOS"){
		
		
$sql6 = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and data between '$datainicial' and '$datafinal' group by localizacao order by localizacao asc";
		
	}
	else{
		
		
$sql6 = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and tipo = '$tipofiltro' and data between '$datainicial' and '$datafinal' group by localizacao order by localizacao asc";

		
	}
			
		}

$sql6 = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and data between '$datainicial' and '$datafinal' group by localizacao order by localizacao asc";

		
	}
$res6 = mysql_query($sql6);
while($linha=mysql_fetch_row($res6)) {

$localizacao = $linha[23];
	
	


?>            

        <tr>
              <td colspan="102" align="center" valign="top" bgcolor="#B1B1B1"><strong><? echo "$localizacao"; 
$sql8 = "SELECT * FROM cidades_de_atuacao where cidade = '$localizacao' and responsavel = 'sim' and estab_pertence = '$estab_pertence' group by cidade order by operador asc";
$res8 = mysql_query($sql8);
while($linha=mysql_fetch_row($res8)) {

$operadorqueatendeacidade = $linha[3];
	
	echo " - $operadorqueatendeacidade";
}
				  
				  ?></strong></td>
        </tr>
	
	<tr>
		<td>&nbsp;</td>
		<?
		$sql2 = "SELECT * FROM rdo where data between '$datainicial' and '$datafinal' and localizacao <> '' group by data order by data asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$datardo = $linha[12];
	?>
		<div align="center" class="style19"><td align="center" width="77%"><? echo "$datardo" ?></td></div>
		<? } ?>
		<td>Total Diária</td>
		<td>Total H.M.</td>
		<td align="center">#</td>
		<td align="center">H.D.</td>
	</tr>
	
		  <?
	if($iniciar_rdo_diferenciado=="sim"){
		
		if(empty($tipofiltro)){
		
$sql = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and rdo = 'sim' and tipo = '$tipofiltro_inicial' and localizacao = '$localizacao' and data between '$datainicial' and '$datafinal' group by placa order by `localizacao` asc,`veiculo` asc";
			
		}
		else{
			
	if($tipofiltro=="TODOS"){
		
		
$sql = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and rdo = 'sim' and localizacao = '$localizacao' and data between '$datainicial' and '$datafinal' group by placa order by `localizacao` asc,`veiculo` asc";
		
	}
	else{
			
$sql = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and rdo = 'sim' and tipo = '$tipofiltro' and localizacao = '$localizacao' and data between '$datainicial' and '$datafinal' group by placa order by `localizacao` asc,`veiculo` asc";
		
	}
			
		}
		
		
		
		
		
	}
	else{
		
if(empty($tipofiltro)){
		
$sql = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and rdo = 'sim' and localizacao = '$localizacao' and data between '$datainicial' and '$datafinal' group by placa order by `localizacao` asc,`veiculo` asc";
			
		}
		else{
			
	if($tipofiltro=="TODOS"){
		
		
$sql = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and rdo = 'sim' and localizacao = '$localizacao' and data between '$datainicial' and '$datafinal' group by placa order by `localizacao` asc,`veiculo` asc";
		
	}
	else{
			
$sql = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and rdo = 'sim' and tipo = '$tipofiltro' and localizacao = '$localizacao' and data between '$datainicial' and '$datafinal' group by placa order by `localizacao` asc,`veiculo` asc";
		
	}
			
		}
		
	
//$sql = "SELECT * FROM rdo where obra = '$obra' and concessionaria = '$estab_pertence' and rdo = 'sim' and localizacao = '$localizacao' and data between '$datainicial' and '$datafinal' group by placa order by `localizacao` asc,`veiculo` asc";

	}
	
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$codigointerno = $linha[0];
	
$dia_rdo = $linha[14];
$mes_rdo = $linha[15];
$ano_rdo = $linha[16];
	
$veiculo = $linha[7];
$tipoveiculo_rdo = $linha[8];

$placa = $linha[6];

$prefixo = $linha[22];

		  ?>
	
		  
        <tr>
			

          <td width="20%" align="center" valign="middle">

            <form action="historico_de__manutencoes_do_veiculo.php" method="post" name="form2" target="_blank">
              <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">

              <input class="class01" type="submit" name="Submit2" value="<? echo "$veiculo $tipoveiculo_rdo"; ?> - <? echo $placa; ?> / <? echo $prefixo; ?> ">
            </form>         </td>
			
	
			
<?
	
	
	
$sql3 = "SELECT * FROM rdo where placa = '$placa' and localizacao = '$localizacao' and data between '$datainicial' and '$datafinal' order by data asc";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$registro_de_lancamento_rdo = mysql_num_rows($res3);
	
$codigointernoparacomentario = $linha[1];
$placa_rdo = $linha[6];
$situacao = $linha[10];
$datainformacao_rdo = $linha[12];
$dia_rdo = $linha[14];
$mes_rdo = $linha[15];
$ano_rdo = $linha[16];
$localizacao = $linha[23];
	//$horas_manutencao = $linha[25];
	
	
$sql4 = "SELECT * FROM rdo_comentarios where placa = '$placa_rdo' and localizacao = '$localizacao' and datacomentario = '$datainformacao_rdo' order by `datacomentario` asc,`horacomentario` desc";
$res4 = mysql_query($sql4);
	$registros_comentarios_rdo = mysql_num_rows($res4);
	
	
	
	
	?>

	
			
  <div align="center" class="style19">
	  
	  <td 
<? if($situacao=="M"){ echo "bgcolor='#0DD957'"; }else{ if($situacao=="MM"){ echo "bgcolor='#F8070B'"; }else{ echo ""; }} ?> align="center" width="77%">
		  <A name="<? echo "$codigointernoparacomentario"; ?>"></A>
    
  <?
if($registros_comentarios_rdo>=1){
	
	

echo "<form action='comentarios_do_veiculo_na_data.php#comentario' method='post' name='form2' target='_blank'>
<input name='solicitacao' type='hidden' id='solicitacao' value='abrircomentario'>
<input name='solicitacaodefiltro' type='hidden' id='solicitacaodefiltro' value='filtrardiferenciado'>
<input name='tipofiltro' type='hidden' id='tipofiltro' value='$tipofiltro'>
              <input name='placa' type='hidden' id='placa' value='$placa'>
			  <input name='obra' type='hidden' id='obra' value='$obra'>
			  <input name='codigointernoparacomentario' type='hidden' id='codigointernoparacomentario' value='$codigointernoparacomentario'>
			  <input name='localizacao' type='hidden' id='localizacao' value='$localizacao'>
			  <input name='datainformacao_rdo' type='hidden' id='datainformacao_rdo' value='$datainformacao_rdo'>
			  
			  <input name='dia_inicial' type='hidden' id='dia_inicial' value='$dia_inicial'>
			  <input name='mes_inicial' type='hidden' id='mes_inicial' value='$mes_inicial'>
			  <input name='ano_inicial' type='hidden' id='ano_inicial' value='$ano_inicial'>
			  
			  <input name='dia_final' type='hidden' id='dia_final' value='$dia_final'>
			  <input name='mes_final' type='hidden' id='mes_final' value='$mes_final'>
			  <input name='ano_final' type='hidden' id='ano_final' value='$ano_final'>
			  
              <input class='class02' type='submit' name='Submit2' value='$situacao'>";
	
	
	$sql11 = "SELECT * FROM rdo_comentarios where placa = '$placa_rdo' and localizacao = '$localizacao' and datacomentario = '$datainformacao_rdo' and horas_manutencao > '0.00' order by codigo desc limit 1";
$res11 = mysql_query($sql11);
while($linha=mysql_fetch_row($res11)) {
$registro_de_lancamento_rdo = mysql_num_rows($res11);
	

	$horas_manutencao_rdo_comentarios = $linha[14];
	

	
	if($horas_manutencao_rdo_comentarios>=0.01){
		echo "<br>$horas_manutencao_rdo_comentarios(H.M.)";
	}
	
}
			  
            echo "</form>";
}
else{

	
echo "$situacao";
	
	$sql11 = "SELECT * FROM rdo_comentarios where placa = '$placa_rdo' and localizacao = '$localizacao' and datacomentario = '$datainformacao_rdo' and horas_manutencao > '0.00' order by codigo desc limit 1";
$res11 = mysql_query($sql11);
while($linha=mysql_fetch_row($res11)) {
$registro_de_lancamento_rdo = mysql_num_rows($res11);
	

	$horas_manutencao_rdo_comentarios = $linha[14];
	

	
	if($horas_manutencao_rdo_comentarios>=0.01){
		echo "<br>$horas_manutencao_rdo_comentarios(H.M.)";
	}
	
}


}
	  
	  ?>
    
</td>
	  
    </div>
			
			
			

<?  } ?>

        <td align="center"><form action="auditoria_rdo.php" method="post" name="form2" target="_blank">
		  <?

$sql9 = "select sum(situacao) as totaldiarias from rdo where placa = '$placa_rdo' and localizacao = '$localizacao' and data between '$datainicial' and '$datafinal'";
$resultado9=mysql_query($sql9, $conexao);
$linha=mysql_fetch_array($resultado9);

$quant_total_diarias = $linha['totaldiarias'];

//echo "$quant_total_diarias";
	
	?>
		  <input name="obra" type="hidden" id="obra" value="<? echo $obra; ?>">
              <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
              <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
              <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
<input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
<input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
<input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
<input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
<input class="class01" type="submit" name="Submit3" value="<? echo $quant_total_diarias; ?>">
		  </form></td>
			
			<td align="center"><?

$sql10 = "select sum(horas_manutencao) as total_horas_manutencao from rdo_comentarios where placa = '$placa_rdo' and localizacao = '$localizacao' and datacomentario between '$datainicial' and '$datafinal'";
$resultado10=mysql_query($sql10, $conexao);
$linha=mysql_fetch_array($resultado10);

$quant_total_horas_manutencao = $linha['total_horas_manutencao'];

echo "$quant_total_horas_manutencao";
	
	?></td>
			<td align="center"><?



$horas_manutencao_por_direito = "20";

echo "$horas_manutencao_por_direito";
	
	?></td>
			<td align="center"><?


	
	$subtotal_horas_liquidas_descontar = bcsub($horas_manutencao_por_direito,$quant_total_horas_manutencao,2);
	
	if($horas_manutencao_por_direito>=$quant_total_horas_manutencao){
		
	$total_horas_liquidas_descontar = "$subtotal_horas_liquidas_descontar";
		
		echo "<b><p style='color:blue'>$total_horas_liquidas_descontar</p></b>";
		
	}
	else{
		
	$total_horas_liquidas_descontar = bcmul($subtotal_horas_liquidas_descontar,-1,2);
		
		echo "<b><p style='color:red'>$total_horas_liquidas_descontar</p></b>";
		
	}


	
	?>
			</td>
			
        </tr>
		  
		  

<? }  }  ?>
		    
</table>
<p>&nbsp;</p>
<table width="100%" border="0" align="center">
        <tbody>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center"><div id="comentario" class="modal" role="dialog"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a> <br>
              <br>
              <br>
              <table width="100%" border="0">
                
                <form name="form7" method="post" action="rdo_alimentacao.php#<? echo "$placa"; ?>">
                  <tr>
                    <td colspan="3" class='style61' ><div align="center"><strong> </strong></div></td>
                    <td class='style61' >&nbsp;</td>
                  </tr>
                  <tr>
                    <td width="346%" colspan="3"><div align="center">
                      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                      
                      <input name="dia" type="hidden" id="dia" value="<? echo $dia; ?>">
                      <input name="mes" type="hidden" id="mes" value="<? echo $mes; ?>">
                      <input name="ano" type="hidden" id="ano" value="<? echo $ano; ?>">
                    </div></td>
                    <td width="346%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="3" class='style61'><div align="center"><strong><br>
                      <br>
                      Comentarios realizados sobre<br><br>
                      <? 
$codigointernoparacomentario = $_POST['codigointernoparacomentario'];
			 $datainformacao_rdo = $_POST['datainformacao_rdo'];
			$placa = $_POST['placa'];
						
						
$sql5 = "SELECT * FROM rdo_comentarios where placa = '$placa' and datacomentario = '$datainformacao_rdo' limit 1";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {


$placadocomentario = $linha[3];
$datareferenciadocomentario = $linha[4];
	
	$localizacao_comentario = $linha[11];
	
}
						
						
						echo "Placa / Localizacao <br>$placadocomentario / $localizacao_comentario <br><br> na data $datareferenciadocomentario<br>"; ?></?>
                    <textarea class='class02' name="hiscon" cols="50" rows="10" readonly id="hiscon"><?
						
						
$sql5 = "SELECT * FROM rdo_comentarios where placa = '$placa' and datacomentario = '$datainformacao_rdo' order by horacomentario desc";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$autor = $linha[2];
$placadocomentario = $linha[3];
$datareferenciadocomentario = $linha[4];
$datadocomentario = $linha[5];
$horadocomentario = $linha[6];
$comentario = $linha[7];
$tipomanutencao = $linha[8];
$numero_manutencao = $linha[9];
	$link_da_nf = $linha[10];


echo "\n\nData comentario $datadocomentario $horadocomentario \n"."$comentario \n"."Manutencao $tipomanutencao \n"."Autor: $autor \n";
	
?>

<?
if($reg==1){

$reg=0;

}

echo "----------- // ----------";

}

?>

                      </textarea>
                      <br>
                      <br>
                    </strong></div></td>
                    <td align="center" valign="top" class='style61'><div style="overflow: auto; height: 200px">
                      <table class='style61' width="100%" border="0" cellspacing="0">
                        <tr>
                          <?
$sql5 = "SELECT * FROM rdo_comentarios where placa = '$placa' and datainformacao_rdo = '$datainformacao_rdo' and link_nf <> '' order by codigo desc";
$res5 = mysql_query($sql5);
$quant_arquivos_anexados = mysql_num_rows($res5);
while($linha=mysql_fetch_row($res5)) {


	$link_da_nf = $linha[10];
}

					  
					?>
                          <td><div align="center">
                            <p><strong>Anexos</strong></p>
                          </div></td>
                        </tr>
                        <tr>
                          <td align="center"><strong></strong><? echo "Total $quant_arquivos_anexados <br>"; ?></td>
                        </tr>
                        <?
            
$sql5 = "SELECT * FROM rdo_comentarios where placa = '$placa' and datainformacao_rdo = '$datainformacao_rdo' and link_nf <> '' order by codigo desc";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {
$num_arquivo++;

	$numero_manutencao = $linha[9];
	$link_da_nf = $linha[10];



            
?>
                        <tr>
                          <td align="center"><div><b></b>
							  <? 
	if(empty($link_da_nf)){
		
	}
	else{
		
	echo "<a href='$link_da_nf' target='_blank' style='color: #FFFFFF'>$num_arquivo M $numero_manutencao</a>"; 
	
	}
							  ?></div></td>
                        </tr>
                        <? } ?>
                      </table>
                    </div></td>
                  </tr>
                </form>
              </table>
            </div></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
  </tbody>
</table>
<p align="center"></p>
<p align="center">&nbsp;</p>
<p align="center">
  
  <?

$sql = "SELECT * FROM cad_empresa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$endereco = $linha[5];

$numero = $linha[6];

$bairro = $linha[7];

$cep = $linha[9];

$cidade = $linha[10];

$estado = $linha[11];

$telefone = $linha[12];

$fax = $linha[13];

$email_empresa = $linha[14];

$site = $linha[15];



}



?>
  
  <br>
  
  <span class="style4"><strong><? echo $site; ?></strong></span>
  
  <br>
  
  <? echo $endereco; ?>
  
  ,
  
  <? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?>
  
  <br>
  
  <? echo "Telefone / Fax: ". $telefone." "; ?>
  
  / <? echo $fax; ?>
  
  <br>
  
  <? echo "E-Mail: ". $email_empresa; ?>
  
</p>

<p align="center"><span class="style7">

  <? echo $meta_inss; ?>

</span><span class="style4"><strong><span class="style5"><strong>

</strong></span></strong></span> </p>



</body>

</html>

