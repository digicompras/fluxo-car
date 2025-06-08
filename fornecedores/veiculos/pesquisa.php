<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



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

-->

</style></head>



<body>

<p><?

//require("conect/conect.php"); or die("erro na requisição");

require '../../conect/conect.php';




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

}



?>



</p>

<form name="form1" method="post" action="../index.php">

  <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>

  <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">

  <input class='class01' type="submit" name="Submit2" value="Voltar">

</form>

<p><strong>Escolha a concession&aacute;ria e informe o chassi ou renavam para pesquisa! </strong></p>

<form action="verifica.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="60%"  border="0" align="center">

    <tr>

      <td align="center" style="font-weight: bold">Empresa <br></td>

      <td align="center" style="font-weight: bold">Placa</td>
      <td align="center" style="font-weight: bold">Renavam</td>

      <td align="center" style="font-weight: bold">Chassi</td>

    </tr>

    <tr>
      <td align="center"><? echo $estab_pertence; ?>
      <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $estab_pertence; ?>"></td>
      <td align="center"><input class='class02' name="placa" type="text" id="placa"></td>
      <td align="center"><input class='class02' name="renavam" type="text" id="renavam"></td>
      <td align="center"><input class='class02' name="chassi" type="text" id="chassi"></td>
    </tr>
    <tr>

      <td width="33%">&nbsp;</td>

      <td width="25%">&nbsp;</td>
      <td width="42%"><?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <input class='class01' type="submit" name="Submit" value="Verificar ">
      <input class='class02' name="senha" type="hidden" id="senha" value="$senha"></td>

      <td width="42%">&nbsp;</td></tr>

  </table>

</form>
<table width="100%"  border="1" cellspacing="0">
  <tr>
    <td colspan="6"><div align="center"> <strong>
      <?
$solicitacao = $_POST['solicitacao'];


if(empty($veiculo)) {

$sql = "select * from veiculos order by veiculo asc";

}else{	  

$sql = "select * from veiculos where veiculo like '%$veiculo%' order by veiculo asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$produtos_encontrados = mysql_num_rows($res);


}

echo "	$produtos_encontrados Maquinários/veeiculos encontrados!!!... Digite o nome do veiculo ou parte dele na caixa abaixo e clique em buscar para executar uma pesquisa por nome.";

?>
    </strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form name="form5" method="post" action="pesquisa.php">
      <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      <input class='class02' name="veiculo" type="text" id="veiculo" value="<? echo $veiculo; ?>">
      <input class='class01' type="submit" name="button" id="button" value="Buscar Veiculo">
      <input name="solicitacao" type="hidden" class='class02' id="solicitacao" value="veiculo">
    </form></td>
    <td><form name="form5" method="post" action="pesquisa.php">
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
        </span>
        <input class='class01' type="submit" name="button3" id="button3" value="Buscar Localiza&ccedil;&atilde;o">
        <input name="solicitacao" type="hidden" class='class02' id="solicitacao" value="localizacao">
    </form></td>
    <td><form name="form5" method="post" action="pesquisa.php">
      <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      <input class='class02' name="placa" type="text" id="placa" value="<? echo $placa; ?>">
      <input class='class01' type="submit" name="button2" id="button2" value="Buscar Placa">
      <input name="solicitacao" type="hidden" class='class02' id="solicitacao" value="placa">
    </form></td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center" class="style2">Placa</div></td>
    <td><div align="center" class="style2">Ve&iacute;culo</div></td>
    <td align="center">Chassi</td>
    <td><div align="center" class="style2">Fornecedor</div></td>
    <td><div align="center" class="style2">Localiza&ccedil;&atilde;o</div></td>
    <td align="center">#</td>
  </tr>
  <?
	
	
$veiculo = $_POST['veiculo'];
$placa = $_POST['placa'];
$localizacao = $_POST['localizacao'];
	
if($solicitacao=="localizacao") {
	
$sql = "select * from veiculos where localizacao = '$localizacao' order by veiculo asc";
	
}

if($solicitacao=="placa") {
	
$sql = "select * from veiculos where placa like '%$placa%' order by veiculo asc";
		
}

if($solicitacao=="veiculo") {
	
$sql = "select * from veiculos where veiculo like '%$veiculo%' order by veiculo asc";
	
}

if(empty($solicitacao)){
$sql = "select * from veiculos order by veiculo asc";
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


?>
  <tr>
    <td width="10%"><form name="form1" method="post" action="verifica.php">
      <div align="center">
        <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo; ?>">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
        <input class='class01' type="submit" name="Submit5" value="<? echo $placa; ?>">
        <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
        </div>
    </form></td>
    <td width="24%"><div align="center"><? echo $veiculo; ?></div></td>
    <td width="26%" align="center"><? echo $chassi; ?></td>
    <td width="21%"><div align="center"><? echo $fornecedor; ?></div></td>
    <td width="14%"><div align="center"><? echo $localizacao; ?></div></td>
    <td width="5%" align="center"><form action="etiqueta_pasta.php" method="post" name="form1" target="_blank">
      <div align="center">
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
        <input class='class01' type="submit" name="Submit3" value="Etiqueta">
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

