<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");


ini_set('default_charset','UTF8_general_mysql500_ci');
?>



<html>

<head>

<title>CADASTRO DE CLIENTES</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../../../conect/conect.php';



$cpf = $_POST['cpf'];
$empresaconveniada = $_POST['empresaconveniada'];


?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
<?

$sql = "SELECT * FROM clientes order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$codigoparagerarnumeroficticiodecpf = bcadd($linha[0],1);
	
}

?>


<form name="form2" method="post" action="">

</form>

<form name="form1" method="post" action="../../index.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
  <input type="hidden" name="nome" id="nome" />
<input class='class01' type="submit" name="Submit3" value="Voltar">

</form>

<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	$operador_logado = $linha[1];
	
$emailoperador = $linha[20];

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
$inventario_autorizado = $linha[67];
$estoque_entradas_autorizado = $linha[68];
$cadastro_de_itens_autorizado = $linha[69];
$estoque_entradas_por_xml_autorizado = $linha[71];
	$veiculodaempresa = $linha[72];
	$controlekm = $linha[75];
	$orcamento = $linha[76];
	$permissao_categoria_de_produtos = $linha[77];
	$inclui_mais_uma_nf = $linha[78];
	$financeiro = $linha[79];
	$relatoriodecomissao = $linha[80];
	$registrodeoperadores = $linha[81];
	$abrir_e_fechar_cx = $linha[82];
	$editar_produtos = $linha[83];
	$quantitativo_do_item_no_estoque = $linha[84];
	
}
	?>

<form name="form1" method="post" action="grava_cadcli.php">



<table width="100%" border="0" cellspacing="4">

    <tr> 

      <td colspan="4"><strong><font color="#0000FF" size="4">Cadastro 

        de clientes! O N&ordm; da matr&iacute;cula ser&aacute; informado ao t&eacute;rmino do cadastro! Data Cadastro </font><font color="#0000FF"><? echo date('d-m-Y'); ?>

        <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo date('d-m-Y'); ?>">

        <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo date('H:i:s'); ?>">

        <input name="criar_pasta" type="hidden" id="criar_pasta" value="<? echo "Sim"; ?>">

      </font></strong></td>
    </tr>

    <tr>
      <td>Empresa Conveniada</td>
      <td><input name="empresaconveniada" type="hidden" id="nome3" value="<? echo "$empresaconveniada"; ?>" size="50" maxlength="50">
      <strong><font color="#0000FF"><? echo "$empresaconveniada"; ?>
      <input name="status_cliente" type="hidden" id="status_cliente" value="<? echo "Ativo"; ?>">
      <input name="statusfuncionario" type="hidden" id="statusfuncionario" value="<? echo "ativo"; ?>">
      </font></strong></td>
      <td>Perfil</td>
      <td><select class='class02' name="tipo" id="tipo">
        <option selected><? echo $tipo; ?></option>
        <?
    $sql = "select * from tipos order by tipo asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['tipo']."</option>";

    }

?>
      </select></td>
    </tr>
    <tr> 

      <td>Nome</td>

      <td><input class='class02' name="nome" type="text" id="nome2" size="50" maxlength="50"></td>

      <td>Nome Social</td>

      <td><strong>
        <input class='class02' name="nomesocial" type="text" id="nome4" size="50" maxlength="50">
      </strong></td>
    </tr>

    <tr> 

      <td width="12%">Data Nasc </td>

      <td width="23%"><input class='class02' name="data_nasc" type="text" id="data_nasc" size="15" maxlength="10"></td>

      <td width="17%">Orienta&ccedil;&atilde;o sexual</td>

      <td width="23%"><select class='class02' name="orientacaosexual" id="orientacaosexual">
        <?

    $sql = "select * from orientacaosexual order by codigo asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['sexo']."</option>";

    }

?>
      </select>        <font color="#0000FF">&nbsp; </font></td>
    </tr>

    <tr> 

      <td>Estado Civil </td>

      <td><select class='class02' name="estadocivil" id="select3">

        <option selected>Selecione</option>

        <?

    $sql = "select * from estado_civil order by estadocivil asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['estadocivil']."</option>";

    }

?>

      </select>        </td>

      <td>CPF</td>

      <td><input class='class02' name="cpf" type="text" id="cpf" value="<? if(empty($cpf)){ echo "$codigoparagerarnumeroficticiodecpf"; } else{ echo $cpf; } ?>" size="18" maxlength="14"></td>
    </tr>

    <tr>

      <td>RG</td>

      <td><input class='class02' name="rg" type="text" id="rg" size="25" maxlength="25"> 

        &Oacute;rg&atilde;o 

        <input class='class02' name="orgao" type="text" id="cpf3" size="15" maxlength="14"></td>

      <td>Emiss&atilde;o</td>

      <td><input class='class02' name="emissao" type="text" id="cpf4" size="15" maxlength="10"> 

        dd/mm/aaaa </td>
    </tr>

    <tr> 

      <td>Endere&ccedil;o</td>

      <td><input class='class02' name="endereco" type="text" id="endereco" size="50" maxlength="50">      </td>

      <td>N&uacute;mero</td>

      <td><input class='class02' name="numero" type="text" id="numero2" size="10" maxlength="10">      </td>
    </tr>

    <tr> 

      <td><p>Bairro</p></td>

      <td><input class='class02' name="bairro" type="text" id="bairro" size="50" maxlength="50">      </td>

      <td>Complemento</td>

      <td><input class='class02' name="complemento" type="text" id="endereco4" size="50" maxlength="50"></td>
    </tr>

    <tr>

      <td>Cidade</td>

      <td><input class='class02' name="cidade" type="text" id="cidade" size="50" maxlength="50"></td>

      <td>Estado</td>

      <td><select class='class02' name="estado" id="select7">
        
        <option selected>Selecione</option>
        
        <?

    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['estado']."</option>";

    }

?>
        
      </select></td>
    </tr>

    <tr> 

      <td>Cep</td>

      <td><input class='class02' name="cep" type="text" id="cep" size="9" maxlength="9">

Use o formato 00000-000</td>

      <td>Telefone</td>

      <td><input class='class02' name="telefone" type="text" id="endereco5" size="15" maxlength="14"> </td>
    </tr>

    <tr> 

      <td>Celular</td>

      <td><input class='class02' name="celular" type="text" id="telefone" size="15" maxlength="14"></td>

      <td>E-Mail</td>

      <td><input class='class02' name="email" type="text" id="email" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Local de trabalho</td>
      <td><input class='class02' name="local_trabalho" type="text" id="local_trabalho" size="50"></td>
      <td>Telefone Comercial</td>
      <td><input class='class02' type="text" name="fone_comercial" id="fone_comercial"></td>
    </tr>
    

    <tr>
      <td>Receber News Letter?</td>
      <td colspan="2"><select class='class02' name="newsletter" id="newsletter">
        <option selected>Sim</option>
        <option>N&atilde;o</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td>Obs</td>

      <td colspan="2"><textarea class='class02' name="obs" cols="50" rows="7" id="obs"></textarea></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td colspan="2"><strong><font color="#0000FF">

        <input type="hidden" name="pai" id="pai">
        <input type="hidden" name="mae" id="mae">
        <input name="operador" type="hidden" id="operador3" value="<? echo $nome; ?>">

        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular; ?>">

        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email; ?>">

        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence; ?>">

        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence; ?>">

        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence; ?>">

        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence; ?>">

      </font></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td colspan="2"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input class='class01' type="submit" name="Submit" value="Salvar"></td><td><div align="right"> </div></td>

      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td colspan="2">&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
    </tr>
  </table>

</form>
</body>

</html>

