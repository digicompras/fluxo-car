<?php

session_start(); //inicia sess�o...

if ($_SESSION["senha"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

header("Location: alerta.php");



?>

<?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>

<html>

<head>

<title>REGISTRO DE VEICULO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../../conect/conect.php';
	
	
$veiculoget = $_GET['veiculo'];
$veiculopost = $_POST['veiculo'];
	
if(empty($veiculoget)){
$veiculo = $veiculopost;
}
	else{
	$veiculo = $veiculoget;
	}

$placaget = $_GET['placa'];
$placapost = $_POST['placa'];
	
if(empty($placaget)){
$placa = $placapost;
}
	else{
	$placa = $placaget;
	}

$chassiget = $_GET['chassi'];
$chassipost = $_POST['chassi'];
	
if(empty($chassiget)){
$chassi = $chassipost;
}
	else{
	$chassi = $chassiget;
	}

$renavamget = $_GET['renavam'];
$renavampost = $_POST['renavam'];
	
if(empty($renavamget)){
$renavam = $renavampost;
}
	else{
	$renavam = $renavamget;
	}

	
$anoget = $_GET['ano'];
$anopost = $_POST['ano'];
	
if(empty($anoget)){
$ano = $anopost;
}
	else{
	$ano = $anoget;
	}
	
	
$modeloget = $_GET['modelo'];
$modelopost = $_POST['modelo'];
	
if(empty($modeloget)){
$modelo = $modelopost;
}
	else{
	$modelo = $modeloget;
	}

//$concessionaria = $_POST['concessionaria'];



$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	
$cel_operador = $linha[19];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

}



$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nfantasia_concessionaria = $linha[2];

$cnpj_concessionaria = $linha[3];
	
$cidade_concessionaria = $linha[10];
	
$estado_concessionaria = $linha[11];
	
$email_concessionaria = $linha[14];
	
$tel_concessionaria = $linha[12];


}

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;

?>





<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>

  

<? } ?>









<form name="form1" method="post" action="pesquisa.php">

  

  <input class='class01' type="submit" name="Submit3" value="Voltar">

  <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">

</form>








<form action="grava_veiculo.php" method="post" enctype="multipart/form-data" name="form1">



<table width="80%" border="0" align="center" cellspacing="0">

    <tr> 

      <td colspan="4"><strong><font color="#0000FF" size="4">REGISTRO DE VEICULO ! Data Cadastro </font><font color="#0000FF"><? echo date('d-m-Y'); ?><? echo " $operador - $nfantasia_concessionaria"; ?>

            <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo date('d-m-Y'); ?>">

        <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo date('H:i:s'); ?>">

</font></strong></td>

    </tr>

    <tr>
      <td style="font-weight: bold"><input name="operador" type="hidden" id="operador" value="<? echo $operador; ?>">

        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $cel_operador; ?>">

        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_concessionaria; ?>">

        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $nfantasia_concessionaria; ?>">

        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_concessionaria; ?>">

        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_concessionaria; ?>">

        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_concessionaria; ?>">

        <input name="status" type="hidden" id="status" value="<? echo "Estoque"; ?>">


		</td>
      <td style="font-weight: bold">&nbsp;</td>
      <td style="font-weight: bold">&nbsp;</td>
      <td style="font-weight: bold"><?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <input class='class01' type="submit" name="Submit" value="Salvar"></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Concession&aacute;ria</td>
      <td style="font-weight: bold">CNPJ</td>
      <td style="font-weight: bold">Cidade</td>
      <td style="font-weight: bold">Estado</td>
    </tr>
    <tr>

      <td width="27%"><? echo $nfantasia_concessionaria; ?>
      <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $nfantasia_concessionaria; ?>"></td>

      <td width="27%"><strong><? echo $cnpj_concessionaria; ?>
          <input name="cnpj2" type="hidden" id="cnpj2" value="<? echo $cnpj_concessionaria; ?>">
      </strong></td>

      <td width="24%"><? echo $cidade_concessionaria; ?>
      <input name="cidade_concessionaria" type="hidden" id="cidade_concessionaria" value="<? echo $cidade_concessionaria; ?>"></td>

      <td width="22%"><? echo $estado_concessionaria; ?>
      <input name="estado_concessionaria" type="hidden" id="estado_concessionaria" value="<? echo $estado_concessionaria; ?>"></td>

    </tr>

    <tr>

      <td style="font-weight: bold">Telefone</td>

      <td style="font-weight: bold">E-Mail</td><td style="font-weight: bold">&nbsp;</td>

      <td style="font-weight: bold">&nbsp;</td>

    </tr>

    <tr>
      <td><? echo $tel_concessionaria; ?>
      <input name="tel_concessionaria" type="hidden" id="tel_concessionaria" value="<? echo $tel_concessionaria; ?>"></td>
      <td><font color="#0000FF"><? echo $email_concessionaria; ?>
          <input name="email_concessionaria" type="hidden" id="email_concessionaria" value="<? echo $email_concessionaria; ?>">
      </font></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td style="font-weight: bold">Ve&iacute;culo</td>

      <td style="font-weight: bold">Ano de fabrica&ccedil;&atilde;o</td><td style="font-weight: bold">Modelo</td>

        <td style="font-weight: bold">Placa</td></tr>

    <tr>

      <td><input class='class02' name="veiculo" type="text" id="veiculo" value="<? echo $veiculo; ?>">
*</td>

      <td><input class='class02' name="ano" type="text" id="ano" value="<? echo $ano; ?>" size="5" maxlength="10">
*</td>

      <td><input class='class02' name="modelo" type="text" id="modelo" value="<? echo $modelo; ?>" size="5" maxlength="10">
*</td>

      <td><input class='class02' name="placa" type="text" id="placa" value="<? echo $placa; ?>">
*</td>

    </tr>

    <tr>

      <td style="font-weight: bold">Chassi</td>

      <td style="font-weight: bold">Renavam</td>

      <td style="font-weight: bold">Cor</td>

      <td style="font-weight: bold">Tipo</td>

    </tr>

    <tr>

      <td><input class='class02' name="chassi" type="text" id="chassi" value="<? echo $chassi; ?>">
*</td>

      <td><input class='class02' name="renavam" type="text" id="renavam" value="<? echo $renavam; ?>">
*</td>

      <td><input class='class02' name="corveiculo" type="text" id="corveiculo" value="<? echo $cor; ?>">
*</td>

      <td><span style="font-weight: bold">
        <input class='class02' name="tipoveiculo" type="text" id="tipoveiculo" value="<? echo $tipoveiculo; ?>">
      </span></td>

    </tr>

    <tr>
      <td style="font-weight: bold">Numero do Veiculo</td>
      <td style="font-weight: bold">km</td>
      <td style="font-weight: bold">Horimetro</td>
      <td style="font-weight: bold">Valor Manuten&ccedil;&atilde;o</td>
    </tr>
    <tr>
      <td style="font-weight: bold"><input class='class02' name="numeroveiculo" type="text" id="numeroveiculo" value="<? echo $numeroveiculo; ?>"></td>
      <td style="font-weight: bold"><input class='class02' name="km" type="text" id="km" value="<? echo $km; ?>"></td>
      <td style="font-weight: bold"><input class='class02' name="horimetro" type="text" id="horimetro" value="<? echo $horimetro; ?>"></td>
      <td style="font-weight: bold"><input name="valormanutencao" type="text" class='class02' id="valormanutencao" placeholder="teste" value="<? echo $valormanutencao; ?>"></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Data Chegada do Veiculo/Maquinario</td>
      <td style="font-weight: bold">Data Vistoria WPX</td>
      <td style="font-weight: bold">Data Vistoria CC</td>
      <td style="font-weight: bold">Data inicio Trabalho</td>
    </tr>
    <tr>
      <td style="font-weight: bold"><input class='class02' name="datachegada" type="text" id="datachegada" value="<? echo $datachegada; ?>"></td>
      <td style="font-weight: bold"><input class='class02' name="datavistoriawpx" type="text" id="datavistoriawpx" value="<? echo $datavistoriawpx; ?>"></td>
      <td style="font-weight: bold"><input class='class02' name="datavistoriacc" type="text" id="datavistoriacc" value="<? echo $datavistoriacc; ?>"></td>
      <td style="font-weight: bold"><input class='class02' name="datainiciotrabalho" type="text" id="datainiciotrabalho" value="<? echo $datainiciotrabalho; ?>"></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Localiza&ccedil;&atilde;o</td>
      <td style="font-weight: bold">Sublocado(Fornecedor)</td>
      <td style="font-weight: bold">Mobilizado</td>
      <td style="font-weight: bold">Obra</td>
    </tr>
    <tr>
      <td style="font-weight: bold"><select class='class02' name="localizacao" id="localizacao">
        <option selected><? echo "$localizacao"; ?></option>
        <?
    $sql = "select * from cidades order by cidade asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cidade']."</option>";
    }
?>
      </select></td>
      <td style="font-weight: bold"><select class='class02' name="fornecedor" id="fornecedor">
        <option selected><? echo "WPX LOCACOES LTDA"; ?></option>
        <?


    $sql = "select * from fornecedores order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
      </select></td>
      <td style="font-weight: bold"><select class='class02' name="mobilizado" id="mobilizado">
        <option selected><? echo "sim"; ?></option>
        <?


    $sql = "select * from mobilizacao order by mobilizado asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['mobilizado']."</option>";
    }
?>
      </select></td>
      <td style="font-weight: bold"><select class='class02' name="obra" id="obra">
        <?
    $sql = "select * from obras wehere status = 'ativo' order by obra asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['obra']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr>
      <td style="font-weight: bold">&nbsp;</td>
      <td colspan="3" style="font-weight: bold">Observa&ccedil;&otilde;es</td>
    </tr>
    <tr>

      <td>&nbsp;</td>

      <td colspan="3"><textarea class='class02' name="obs_veiculo" cols="50" rows="5" id="obs_veiculo"></textarea></td>

    </tr>

    <tr>
      <td align="center">Foto 1</td>
      <td align="center">Foto 2</td>
      <td align="center">Foto 3</td>
      <td align="center">Foto 4</td>
    </tr>
    <tr>
      <td align="center"><input class='class02' type="file" name="foto1" id="foto1"></td>
      <td align="center"><input class='class02' type="file" name="foto2" id="foto2"></td>
      <td align="center"><input class='class02' type="file" name="foto3" id="foto3"></td>
      <td align="center"><input class='class02' type="file" name="foto4" id="foto4"></td>
    </tr>
    <tr>
      <td align="center">Foto 5</td>
      <td align="center">Foto 6</td>
      <td align="center">Foto 7</td>
      <td align="center">Foto 8</td>
    </tr>
    <tr>

      <td align="center"><input class='class02' type="file" name="foto5" id="foto5"></td>
      <td align="center"><input class='class02' type="file" name="foto6" id="foto6"></td>

      <td align="center"><input class='class02' type="file" name="foto7" id="foto7"></td>

      <td align="center"><input class='class02' type="file" name="foto8" id="foto8"></td>

    </tr>

    <tr> 

      <td align="center">Foto 9</td>
      <td align="center">Foto 10</td>
      <td align="center">Foto 11</td>

      <td align="center">Foto 12</td>

    </tr>

    <tr> 

      <td align="center"><input class='class02' type="file" name="foto9" id="foto9"></td>
      <td align="center"><input class='class02' type="file" name="foto10" id="foto10"></td>

      <td align="center"><input class='class02' type="file" name="foto11" id="foto11"></td>

      <td align="center"><input class='class02' type="file" name="foto12" id="foto12"></td>

    </tr>
    <tr>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
    </tr>

  </table>

</form>
</body>

</html>

