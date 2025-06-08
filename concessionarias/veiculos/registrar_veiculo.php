<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

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
?>
	
	<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
	
	
	<?
	
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
	
$obra_pertence = $linha[50];

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
  <span style="font-weight: bold">
  <input class='class01' type=image src='../../imagens/botoes/voltar.png' width='100' height='100' name="Submit3" value="Voltar">
  </span>
  <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">

</form>








<form action="grava_veiculo.php" method="post" enctype="multipart/form-data" name="form1">



<table width="90%" border="0" align="center" cellspacing="0">

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
      <input class='class01' type=image src='../../imagens/botoes/salvar.png' width='100' height='100' name="Submit" value="Voltar"></td>
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

      <td width="20%"><? echo $cidade_concessionaria; ?>
      <input name="cidade_concessionaria" type="hidden" id="cidade_concessionaria" value="<? echo $cidade_concessionaria; ?>"></td>

      <td width="26%"><? echo $estado_concessionaria; ?>
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

        <td style="font-weight: bold">Placa / Prefixo</td></tr>

    <tr>

      <td><input class='class02' name="veiculo" type="text" id="veiculo" value="<? echo $veiculo; ?>">
*</td>

      <td><input class='class02' name="ano" type="text" id="ano" value="<? echo $ano; ?>" size="5" maxlength="10">
*</td>

      <td><input class='class02' name="modelo" type="text" id="modelo" value="<? echo $modelo; ?>" size="5" maxlength="10">
*</td>

      <td><input name="placa" type="text" class='class02' id="placa" value="<? echo $placa; ?>" size="10">
*
  <input name="prefixo" type="text" class='class02' id="prefixo" value="<? echo $prefixo; ?>" size="10"></td>

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
        <select class='class02' name="tipoveiculo" id="tipoveiculo">
          <option selected><? echo "$tipoveiculo"; ?></option>
          <?
    $sql4 = "select * from tipos where concessionaria = '$estab_pertence' and status = 'ativo' order by tipo asc";
    $result4 = mysql_query($sql4);
    while($x=mysql_fetch_array($result4)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
        </select>
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
      <td style="font-weight: bold">Data Vistoria (EMPRESA)</td>
      <td style="font-weight: bold">Data Vistoria (TERCEIROS)</td>
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
        <option selected><? echo "$nfantasia_concessionaria"; ?></option>
        <?


    $sql = "select * from fornecedores where nfantasia = '$nfantasia_concessionaria' order by nfantasia asc";
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
    $sql = "select * from obras where obra = '$obra_pertence' and statusobra = 'ativo' order by obra asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['obra']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr>
      <td style="font-weight: bold">RDO</td>
      <td style="font-weight: bold">&nbsp;</td>
      <td style="font-weight: bold">&nbsp;</td>
      <td style="font-weight: bold">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-weight: bold"><select class='class02' name="rdo" id="rdo">
        <option selected><? echo "sim"; ?></option>
        <?


    $sql = "select * from vaiprordo order by vai_pro_rdo asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['vai_pro_rdo']."</option>";
    }
?>
      </select></td>
      <td style="font-weight: bold">&nbsp;</td>
      <td style="font-weight: bold">&nbsp;</td>
      <td style="font-weight: bold">&nbsp;</td>
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
      <td colspan="4" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center">&nbsp;</td>
    </tr>

  </table>

</form>
	
</body>

</html>

