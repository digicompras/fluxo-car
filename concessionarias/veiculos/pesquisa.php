<?php

session_start(); //inicia sessÃƒÂ£o...

if ($_SESSION["senha"] == true) //verifica se a variÃƒÂ¡vel "usuario" ÃƒÂ© verdadeira...

echo ""; //se for emite mensagem positiva.

//if ($_SESSION["data_hoje"] == true) //verifica se a variÃƒÂ¡vel "senha" ÃƒÂ© verdadeira...

//echo ""; //se for emite mensagem positiva.

else //se nÃƒÂ£o for...

header("Location: alerta.php");


require '../../conect/conect.php';

$senha = $_SESSION['senha'];

?>

<html>

<head>

<title>PESQUISA DE VE&Iacute;CULOS</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}
.style1 {font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
.style2 {color: #0000FF;
	font-weight: bold;
}
.class01 {font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}
.style11 {font-size: 35px;
	font-weight: bold;
	color: #0000FF;
}

-->

</style></head>



<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

<p><?

//require("conect/conect.php"); or die("erro na requisiÃƒÂ§ÃƒÂ£o");


	

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
	
}


$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];



error_reporting(E_ALL);




$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg++;

$operador = $linha[1];
	
$cel_operador = $linha[19];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];
	
$obra_operador = $linha[50];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];
$rdo_autorizado = $linha[58];
$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$fornecedores = $linha[66];
$controlekm_autorizado = $linha[75];
$orcamento_autorizado = $linha[76];

}



?>



</p>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="8%"><form name="form1" method="post" action="../index.php">
        <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
        <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
        <input class="class01" type=image src="../../imagens/botoes/voltar.png" width="100" height="100" name="Submit2" value="Voltar">
      </form></td>
      <td width="4%">&nbsp;</td>
      <td width="26%" align="left"><form action="verifica.php" method="post" enctype="multipart/form-data" name="form1">
        <table width="60%"  border="0" align="center">
          <tr>
            <td align="center" style="font-weight: bold">Empresa <br></td>
            <td align="center" style="font-weight: bold"><? echo $estab_pertence; ?>
              <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $estab_pertence; ?>"></td>
            <td width="42%" rowspan="4" align="center" valign="middle" style="font-weight: bold"><?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
              <input class="class01" type=image src="../../imagens/botoes/verificar.png" width="100" height="100" name="Submit" value="Voltar">              <input class='class02' name="senha" type="hidden" id="senha" value="$senha"></td>
            <td align="center" style="font-weight: bold">&nbsp;</td>
          </tr>
          <tr>
            <td align="center"><span style="font-weight: bold">Placa</span></td>
            <td align="center"><input class='class02' name="placa" type="text" id="placa"></td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td width="33%"><span style="font-weight: bold">Renavam</span></td>
            <td width="25%"><input class='class02' name="renavam" type="text" id="renavam"></td>
            <td width="42%">&nbsp;</td>
          </tr>
          <tr>
            <td><span style="font-weight: bold">Chassi</span></td>
            <td><input class='class02' name="chassi" type="text" id="chassi"></td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </form></td>
      <td width="3%">&nbsp;</td>
      <td width="4%">&nbsp;</td>
      <td width="12%" align="center" valign="bottom"><form name="form5" method="post" action="pesquisa.php">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span><span style="font-weight: bold">
            <select class='class02' name="localizacao" id="localizacao">
              <option selected><? echo "$localizacao"; ?></option>
              <?


    $sql4 = "select * from veiculos group by localizacao order by localizacao asc";
    $result4 = mysql_query($sql4);
    while($x=mysql_fetch_array($result4)){
  echo "<option>".$x['localizacao']."</option>";
    }
?>
            </select>
            </span><span style="font-weight: bold">
           <br> <input class="class01" type=image src="../../imagens/botoes/localizacao.png" width="100" height="100" name="Submit7" value="Voltar">
            </span>
            <input name="solicitacao" type="hidden" class='class02' id="solicitacao" value="localizacao">
      </form></td>
      <td width="13%" align="center" valign="bottom"><form name="form5" method="post" action="pesquisa.php">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
        <input name="placa" type="text" class='class02' id="placa" value="<? echo $placa; ?>" size="10">
        <input name="solicitacao" type="hidden" class='class02' id="solicitacao" value="placa">
        <span style="font-weight: bold">
        <br><input class="class01" type=image src="../../imagens/botoes/placa.png" width="100" height="100" name="Submit8" value="Voltar">
        </span>
      </form></td>
      <td width="14%" align="center" valign="bottom"><form name="form5" method="post" action="pesquisa.php">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
        <input name="prefixo" type="text" class='class02' id="prefixo" value="<? echo $prefixo; ?>" size="10">
        <input name="solicitacao" type="hidden" class='class02' id="solicitacao" value="prefixo">
        <span style="font-weight: bold">
        <br><input class="class01" type=image src="../../imagens/botoes/prefixo.png" width="100" height="100" name="Submit9" value="Voltar">
        </span>
      </form></td>
      <td width="16%" align="center" valign="bottom"><form name="form5" method="post" action="pesquisa.php">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
        <input class='class02' name="veiculo" type="text" id="veiculo" value="<? echo $veiculo; ?>">
        <input name="solicitacao" type="hidden" class='class02' id="solicitacao" value="veiculo">
        <span style="font-weight: bold">
        <br><input class="class01" type=image src="../../imagens/botoes/buscar.png" width="100" height="100" name="Submit10" value="Voltar">
        </span>
      </form></td>
    </tr>
  </tbody>
</table>
<table width="100%"  border="1" cellspacing="0">
  <tr>
    <td colspan="9"><div align="center"> <strong>
      <?
$solicitacao = $_POST['solicitacao'];
$solicitacaomobilizacao = $_POST['solicitacaomobilizacao'];
$solicitacaordo = $_POST['solicitacaordo'];
		
$veiculo = $_POST['veiculo'];
$placa = $_POST['placa'];
$prefixo = $_POST['prefixo'];
$localizacao = $_POST['localizacao'];
		
		
	
$sql = "select * from veiculos where placa = '$placa' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$mobilizado = $linha[95];
$rdo = $linha[110];
	
}
		
if($solicitacaomobilizacao=="atualizarmobilizacao"){
	
if(($mobilizado=="sim") or (empty($mobilizado))){
	
$comando = "update `$db`.`veiculos` set `mobilizado` = 'nao' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao);
	
	if($mobilizado=="nao"){
	
//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
$sql1 = "SELECT * FROM operadores where estab_pertence = '$estab_pertence' and funcao = 'ADMINISTRATIVO'";
$res1 = mysql_query($sql1);
while($linha=mysql_fetch_row($res1)) {
	
$nome_administrativo = $linha[1];

$email_administrativo = $linha[20];
	

	$email_dest   =   "$email_administrativo";
	
	$mensagem_do_email = "Placa $placa ATENÇÃO DESMOBILIZAÇÃO OCORRIDA";
	
	//PREPARA O PEDIDO
	
	$mens  .=  "$mensagem_do_email \n";
	



$mens  .=  $to = "$email_dest";
$from = "$email_operador";
$subject = "Placa $placa ATENÇÃO DESMOBILIZAÇÃO OCORRIDA";
$html = "
<html>
<body>
Olá $nome_administrativo <br><b>Placa $placa ATENÇÃO DESMOBILIZAÇÃO OCORRIDA<br><br>

Placa: $placa<br>
Data: $dataalteracao<br>
Hora: $horaalteracao<br>
Comentario: $obs_veiculo<br>
Operador: $operador<br>


</body>
</html>";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $from \r\n";

if (mail($to, $subject, $html, $headers)) {
//echo "Email enviado com sucesso !";
} else {
//echo "Ocorreu um erro durante o envio do email.";
}
	
}//fim do poop de envio dos emails
	
}//FIM SE FOR DESMOBILIZADO
	
}
	
if($mobilizado=="nao"){
	
$comando = "update `$db`.`veiculos` set `mobilizado` = 'sim' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao);
	
	if($mobilizado=="sim"){
	
//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
$sql1 = "SELECT * FROM operadores where estab_pertence = '$estab_pertence' and funcao = 'ADMINISTRATIVO'";
$res1 = mysql_query($sql1);
while($linha=mysql_fetch_row($res1)) {
	
$nome_administrativo = $linha[1];

$email_administrativo = $linha[20];
	

	$email_dest   =   "$email_administrativo";
	
	$mensagem_do_email = "Placa $placa MOBILIZAÇÃO OCORRIDA";
	
	//PREPARA O PEDIDO
	
	$mens  .=  "$mensagem_do_email \n";
	



$mens  .=  $to = "$email_dest";
$from = "$email_operador";
$subject = "Placa $placa MOBILIZAÇÃO OCORRIDA";
$html = "
<html>
<body>
Olá $nome_administrativo <br><b>Placa $placa MOBILIZAÇÃO OCORRIDA<br><br>

Placa: $placa<br>
Data: $dataalteracao<br>
Hora: $horaalteracao<br>
Comentario: $obs_veiculo<br>
Operador: $operador<br>


</body>
</html>";

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: $from \r\n";

if (mail($to, $subject, $html, $headers)) {
//echo "Email enviado com sucesso !";
} else {
//echo "Ocorreu um erro durante o envio do email.";
}
	
}//fim do poop de envio dos emails
	
	
}//FIM SE FOR MOBILIZADO
	
}
	
	
	

}
		
		
			
			
if($solicitacaordo=="atualizarvaiprordo"){
	
if(($rdo=="sim") or (empty($rdo))){
	
$comando = "update `$db`.`veiculos` set `rdo` = 'nao' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao);
	
//$comando = "update `$db`.`rdo` set `rdo` = 'nao' where `rdo`. `placa` = '$placa'";
//mysql_query($comando,$conexao);
	
	
	
}
	
if($rdo=="nao"){
	
$comando = "update `$db`.`veiculos` set `rdo` = 'sim' where `veiculos`. `placa` = '$placa' limit 1 ";
mysql_query($comando,$conexao);
	
//$comando = "update `$db`.`rdo` set `rdo` = 'sim' where `rdo`. `placa` = '$placa'";
//mysql_query($comando,$conexao);
	
	
	
}
	
	
	

}
			

if(empty($veiculo)) {

$sql = "select * from veiculos order by veiculo asc";

}else{	  

$sql = "select * from veiculos where veiculo like '%$veiculo%' order by veiculo asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);


}

echo "	$produtos_encontrados MaquinÃƒÂ¡rios/veeiculos encontrados!!!... Digite o nome do veiculo ou parte dele na caixa abaixo e clique em buscar para executar uma pesquisa por nome.";

?>
    </strong></div></td>
  </tr>
  <tr>
    <td><form action="../relatorios/relatorio_veiculos.php" method="post" name="form5" target="_blank">
      <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      <input class='class02' name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
      <input class='class02' name="localizacao" type="hidden" id="localizacao" value="<? echo $localizacao; ?>">
      <input name="placa" type="hidden" class='class02' id="placa" value="<? echo $placa; ?>" size="10">
      <input name="prefixo" type="hidden" class='class02' id="prefixo" value="<? echo $prefixo; ?>" size="10">
      <input class='class01' type="submit" name="button5" id="button5" value="Imprimir">
      <input name="solicitacao" type="hidden" class='class02' id="solicitacao" value="veiculo">
    </form></td>
    <td><form action="https://www.youtube.com/watch?v=1N7dqkPbhUU" method="post" name="form2" target="_blank">
      <input class='class01' type="submit" name="submit" id="submit" value="REGISTRANDO VEICULO">
    </form></td>
    <td colspan="2"><form action="https://www.youtube.com/watch?v=mX2qCkImwog" method="post" name="form3" target="_blank">
      <input class='class01' type="submit" name="submit2" id="submit2" value="CONSULTANDO/EDITANDOVEICULO">
    </form></td>
    <td><form action="https://www.youtube.com/watch?v=ox1MU4E416c" method="post" name="form3" target="_blank">
      <input class='class01' type="submit" name="submit3" id="submit3" value="FAZENDO OR&Ccedil;AMENTO">
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="style2">Placa</div></td>
	  <td><div align="center" class="style2">Mobilizado?</div></td>
	  <td><div align="center" class="style2">RDO</div></td>
    <td><div align="center" class="style2">Ve&iacute;culo</div></td>
    <td align="center">Tipo</td>
    <td align="center">Chassi</td>
    <td><div align="center" class="style2">Fornecedor</div></td>
    <td><div align="center" class="style2">Localiza&ccedil;&atilde;o</div></td>
    <td align="center">#</td>
  </tr>
  <?
	
	

	
if($solicitacao=="localizacao") {
	
$sql = "select * from veiculos where localizacao = '$localizacao' and concessionaria = '$estab_pertence' and mobilizado = 'sim' and rdo = 'sim' order by veiculo asc";
	
}

if($solicitacao=="placa") {
	
$sql = "select * from veiculos where placa like '%$placa%' order by veiculo asc";
		
}
	
if($solicitacao=="prefixo") {
	
$sql = "select * from veiculos where prefixo like '%$prefixo%' and concessionaria = '$estab_pertence' and mobilizado = 'sim' and rdo = 'sim' order by veiculo asc";
		
}

if($solicitacao=="veiculo") {
	
$sql = "select * from veiculos where veiculo like '%$veiculo%' order by veiculo asc";
	
}

if(empty($solicitacao)){
$sql = "select * from veiculos where concessionaria = '$estab_pertence' and mobilizado = 'sim' and rdo = 'sim' order by veiculo asc";
}

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);


$codigo_veiculo = $linha[0];

$datacadastro = $linha[1];

$horacadastro = $linha[2];

$operador = $linha[3];

$cel_operador = $linha[4];

$email_operador = $linha[5];

$estabelecimento = $linha[6];

$cidade_estabelecimento = $linha[7];

$tel_estabelecimento = $linha[8];

$email_concessionaria = $linha[9];

$concessionaria = $linha[10];

$cnpj_concessionaria = $linha[11];

$tel_concessionaria = $linha[12];

$email_concessionaria = $linha[13];

$cidade_concessionaria = $linha[14];

$estado_concessionaria = $linha[15];

$veiculo = $linha[16];

$ano = $linha[17];

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
	
$datachegada = $linha[72];
	
$datavistoriawpx = $linha[73];
	
$datavistoriacc = $linha[74];
	
$datainiciotrabalho = $linha[75];
	
$localizacao = $linha[76];

$fornecedor = $linha[77];

$mobilizado = $linha[95];
	
$prefixo = $linha[109];
	
$rdo = $linha[110];
	
?>
  <tr>
    <td width="20%"><form name="form1" method="post" action="verifica.php">
		<div align="center"><A NAME="<? echo "$placa"; ?>"></A>
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
        <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
        <input class='class01' type='submit' name='Submit5' value='<? echo "$placa"; ?> - <? echo $prefixo; ?>'>
        <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
        </div>
    </form></td>
    <td width="12%"><form action="pesquisa.php#<? echo "$placa"; ?>" method="post" name="form1">
      <div align="center">
        <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo ""; ?>">
        <input name="solicitacaomobilizacao" type="hidden" id="solicitacaomobilizacao" value="<? echo "atualizarmobilizacao"; ?>">
        <input class='class01' type="submit" name="Submit4" value="<? echo $mobilizado ?>">
        <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
      </div>
    </form></td>
    <td width="8%"><form action="pesquisa.php#<? echo "$placa"; ?>" method="post" name="form1">
      <div align="center">
        <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo ""; ?>">
        <input name="solicitacaordo" type="hidden" id="solicitacaordo" value="<? echo "atualizarvaiprordo"; ?>">
        <input class='class01' type="submit" name="Submit6" value="<? echo $rdo ?>">
        <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
      </div>
    </form></td>
    <td width="23%"><div align="center"><? echo $veiculo; ?></div></td>
    <td width="14%" align="center"><? echo $tipoveiculo; ?></td>
    <td width="14%" align="center"><? echo $chassi; ?></td>
    <td width="10%"><div align="center"><? echo $fornecedor; ?></div></td>
    <td width="8%"><div align="center"><? echo $localizacao; ?></div></td>
    <td width="5%" align="center"><form action="https:fluxocar.com.br/concessionarias/veiculos/etiqueta_pasta.php" method="post" name="form1" target="_blank">
      <div align="center">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
        <span style="font-weight: bold">
        <input class="class01" type=image src="../../imagens/botoes/etiqueta.png" width="50" height="50" name="Submit3" value="Voltar">
        </span>
        <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
        <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
        </div>
    </form></td>
  </tr>
  <? } ?>
</table>
<p>&nbsp;</p>

</body>

</html>

