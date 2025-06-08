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
						
						
$sql5 = "SELECT * FROM rdo_comentarios where placa = '$placa' and datacomentario = '$datainformacao_rdo' order by `datacomentario`,`horacomentario` desc";
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
	$horimetro_gravado = $linha[12];


echo "\n\nData comentario $datadocomentario $horadocomentario \n"."$comentario \n"."Horimetro: $horimetro_gravado \n"."Manutencao $tipomanutencao \n"."Autor: $autor \n";
	
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

