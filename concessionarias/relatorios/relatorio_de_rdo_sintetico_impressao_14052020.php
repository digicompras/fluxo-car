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


}
	
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

echo "$estab_pertence Periodo informado: $dia_inicial-$mes_inicial-$ano_inicial at&eacute; $dia_final-$mes_final-$ano_final";

?>
</strong></p>

      <table width="100%"  border="1">

        <tr bgcolor="#ffffff">

          <td  width="91%"><div align="center"  class="style7">Veiculo</div></td>

          <?
			

	
$sql2 = "SELECT * FROM rdo where data between '$datainicial' and '$datafinal' group by data order by data asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$datardo = $linha[12];
	
	?>
  
  <div align="center" class="style19"><td align="center" width="9%"><? echo "$datardo" ?></td></div>
			
			<? } ?>

         
        </tr>

            <?

	

$sql = "SELECT * FROM veiculos where obra = '$obra' and concessionaria = '$estab_pertence' and mobilizado = 'sim' order by veiculo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$codigointerno = $linha[0];

$concessionaria = $linha[10];

$cnpj_concessionaria = $linha[11];

$tel_concessionaria = $linha[12];

$email_concessionaria = $linha[13];

$cidade_concessionaria = $linha[14];

$estado_concessionaria = $linha[15];

$veiculo = $linha[16];

$anoveiculo = $linha[17];

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

$tipoveiculo = $linha[67];
	
$numeroveiculo = $linha[68];
	
$km = $linha[69];
	
$horimetro = $linha[70];
	
$valormanutencao = $linha[71];
	
$prefixo = $linha[109];

?>            

        <tr>

          <td width="91%" align="center" valign="top">

            <form action="historico_de__manutencoes_do_veiculo.php" method="post" name="form2" target="_blank">
              <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
              <? echo "$veiculo <br> $placa / $prefixo"; ?>
            </form>         </td>
			
<?
	

	
	
$sql3 = "SELECT * FROM rdo where placa = '$placa' and data between '$datainicial' and '$datafinal' order by data asc";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$codigointernoparacomentario = $linha[0];
$situacao = $linha[10];
$datainformacao_rdo = $linha[12];
	
$sql4 = "SELECT * FROM rdo_comentarios where codigointerno = '$codigointernoparacomentario' and datainformacao_rdo = '$datainformacao_rdo' order by datainformacao_rdo asc";
$res4 = mysql_query($sql4);
$registros_comentarios_rdo = mysql_num_rows($res4);
	
	?>

  <div align="center" class="style19"><td 
<? if($situacao=="M"){ echo "bgcolor='#0DD957'"; }else{ if($situacao=="MM"){ echo "bgcolor='#F8070B'"; }else{ echo ""; }} ?> align="center" width="9%">
	  
<? echo "$situacao"; ?>
	  
</td></div>
			
			<? } ?>

        
			
        </tr>

<? } ?>
</table>

<table width="80%" border="0" align="center">
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
                  </tr>
                  <tr>
                    <td colspan="3" class='style61'><div align="center"><strong><br>
                      <br>
                      Comentario<br>
                      <? 
$codigointernoparacomentario = $_POST['codigointernoparacomentario'];
			 $datainformacao_rdo = $_POST['datainformacao_rdo'];
			$placa = $_POST[$placa];
						
						
$sql5 = "SELECT * FROM rdo_comentarios where codigointerno = '$codigointernoparacomentario' and datainformacao_rdo = '$datainformacao_rdo' limit 1";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {


$placadocomentario = $linha[3];
$datareferenciadocomentario = $linha[4];
	
}
						
						
						echo "Placa <br>$placadocomentario <br><br> sobre a data $datareferenciadocomentario<br>"; ?></?>
                      <textarea class='class02' name="hiscon" cols="40" rows="10" readonly id="hiscon"><?
						
						
$sql5 = "SELECT * FROM rdo_comentarios where codigointerno = '$codigointernoparacomentario' and datainformacao_rdo = '$datainformacao_rdo' order by horacomentario desc";
$res5 = mysql_query($sql5);
while($linha=mysql_fetch_row($res5)) {

$autor = $linha[2];
$placadocomentario = $linha[3];
$datareferenciadocomentario = $linha[4];
$datadocomentario = $linha[5];
$horadocomentario = $linha[6];
$comentario = $linha[7];


echo "\n\nData comentario $datadocomentario $horadocomentario \n"."$comentario \n"."Autor: $autor \n";



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
                  </tr>
                </form>
              </table>
            </div></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </tbody>
</table>
<p align="center">&nbsp;</p>
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

