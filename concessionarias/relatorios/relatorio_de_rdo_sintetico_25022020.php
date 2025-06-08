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

-->

</style>
</head>

<?



require '../../conect/conect.php';

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
          <td width="27%">&nbsp;</td>
			<?
          $sql2 = "SELECT * FROM rdo group by data order by data asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


	$diasemana = $linha[13];
	
	?>
  
  <div align="center" class="style19"><td align="center" width="73%"><? echo "$diasemana" ?></td></div>
			
			<? } ?>
        </tr>
        <tr bgcolor="#ffffff">

          <td  width="27%"><div align="center"  class="style7">Veiculo</div></td>

          <?
			

	
$sql2 = "SELECT * FROM rdo group by data order by data asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$datardo = $linha[12];
	
	?>
  
  <div align="center" class="style19"><td align="center" width="73%"><? echo "$datardo" ?></td></div>
			
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

?>            

        <tr>

          <td width="27%" align="center" valign="top">

            <form action="historico_de__manutencoes_do_veiculo.php" method="post" name="form2" target="_blank">
              <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">

              <input class="class01" type="submit" name="Submit2" value="<? echo $veiculo; ?> - <? echo $placa; ?>">
            </form>         </td>
			
<?
	

	
	
$sql3 = "SELECT * FROM rdo where placa = '$placa' order by data asc";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$situacao = $linha[10];
	
	?>

  <div align="center" class="style19"><td 
<? if($situacao=="M"){ echo "bgcolor='#0DD957'"; }else{ if($situacao=="MM"){ echo "bgcolor='#F8070B'"; }else{ echo ""; }} ?> align="center" width="3%">
	  
<? echo "$situacao"; ?>
	  
</td></div>
			
			<? } ?>

        
			
        </tr>

<? } ?>
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

