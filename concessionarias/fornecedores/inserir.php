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

<title>CADASTRO DE FORNECEDORES</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../../conect/conect.php';





$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;

$fundo = $linha[1];	
}
?>


<?

$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>


<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

  




<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input class='class01' type="submit" name="Submit22" value="Voltar">

</form>

<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];






	
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[15];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$obra_operador = $linha[50];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];

$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$fornecedores = $linha[66];
$controlekm_autorizado = $linha[75];
$orcamento_autorizado = $linha[76];
$permissao_categoria_de_produtos_autorizado = $linha[77];
	
$recebenotificacao = $linha[49];
	$iniciar_rdo_diferenciado = $linha[51];
	$estoque = $linha[54];
	$conciliacoes = $linha[55];
	$despesas = $linha[56];
	$veiculos = $linha[57];
	//$rdo = $linha[58];
	$rdo_autorizado = $linha[58];
	$avisodepecas = $linha[59];
	$administracartaoponto = $linha[61];
	$relatoriodepecasutilizadas = $linha[65];
	$fornecedores = $linha[66];
	$inventario = $linha[67];
	$estoque_entradas = $linha[68];
	$cadastro_de_itens = $linha[69];
	$alimentacao_rdo = $linha[70];
	$estoque_entradas_por_xml_autorizado = $linha[71];
	$veiculodaempresa = $linha[72];
	$controlekm = $linha[75];
	$orcamento = $linha[76];
	$permissao_categoria_de_produtos = $linha[77];
	$financeiro = $linha[79];
	
}	
	
	?>

<form name="form1" method="post" action="grava.php">



<table width="80%" border="0" cellpadding="0" cellspacing="0">

    <tr> 

      <td>&nbsp;</td>

      <td colspan="3"><strong><font color="#0000FF" size="4">Cadastro 

        de fornecedores!. </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr> 

      <td>Data Cadastro </td>

      <td><strong><font color="#0000FF"><? echo date('d-m-Y'); ?></font></strong>

        <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo date('d-m-Y'); ?>">

        <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo date('H:i:s'); ?>"></td>

      <td>Pertence ao estabelecimento</td>

      <td><strong><font color="#0000FF"><? echo "$estab_pertence"; ?>
        <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo "$estab_pertence"; ?>">
      </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Categoria</td>
      <td><select class='class02' name="categoria" id="categoria">
        <option selected>Selecione a Categoria</option>
        <?

    $sql = "select * from categorias_despesas order by categoria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['categoria']."</option>";

    }

?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 

      <td width="11%">Raz&atilde;o Social </td>

      <td width="37%"><input class='class02' name="razaosocial" type="text" id="razaosocial" size="50" maxlength="50"></td>

      <td width="18%">Nome Fantasia </td>

      <td width="34%">        <font color="#0000FF">

        <input class='class02' name="nfantasia" type="text" id="data_nasc2" size="50" maxlength="50"> 

      </font></td>

      <td width="0%">&nbsp;</td>

    </tr>

    <tr>

      <td>CNPJ</td>

      <td><input class='class02' name="cnpj" type="text" id="cnpj"></td>

      <td>INSCR EST </td>

      <td><input class='class02' name="inscr_est" type="text" id="inscr_est" size="25" maxlength="25"></td>

      <td>&nbsp;</td>

    </tr>

    <tr> 

      <td>Endere&ccedil;o</td>

      <td><input class='class02' name="endereco" type="text" id="endereco" size="50" maxlength="50"> 

      </td>

      <td>N&uacute;mero</td>

      <td><input class='class02' name="numero" type="text" id="numero2" size="10" maxlength="10"> 

      </td>

      <td>&nbsp;</td>

    </tr>

    <tr> 

      <td><p>Bairro</p></td>

      <td><input class='class02' name="bairro" type="text" id="bairro" size="50" maxlength="50"> 

      </td>

      <td>Complemento</td>

      <td><input class='class02' name="complemento" type="text" id="endereco4" size="50" maxlength="50"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>Cep</td>

      <td><input class='class02' name="cep" type="text" id="cep2" size="9" maxlength="9">

      Use o formato 00000-000</td>

      <td>Cidade</td>

      <td><input class='class02' name="cidade" type="text" id="cidade2" size="50" maxlength="50"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>Estado</td>

      <td><select class='class02' name="estado" id="estado">

        <option selected>Selecione</option>

        <?





    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['estado']."</option>";

    }

?>

      </select></td>

      <td>Telefone</td>

      <td><input class='class02' name="telefone" type="text" id="telefone2" size="15" maxlength="14"></td>

      <td>&nbsp;</td>

    </tr>

    <tr> 

      <td>Fax</td>

      <td><input class='class02' name="fax" type="text" id="telefone3" size="15" maxlength="14"></td>

      <td>E-Mail</td>

      <td><input class='class02' name="email" type="text" id="email" size="50" maxlength="50"> </td>

      <td>&nbsp;</td>

    </tr>

    <tr> 

      <td>Site</td>

      <td><input class='class02' name="site" type="text" id="telefone" size="50" maxlength="50"></td>

      <td>Representante</td>

      <td><input class='class02' name="proprietario" type="text" id="site" size="50" maxlength="50"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><input name="cpf" type="hidden" id="cpf" value=""></td>

      <td>Celular</td>

      <td><input class='class02' name="rg" type="text" id="rg"></td>

      <td>&nbsp;</td>

    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Email Representante</td>
      <td><input class='class02' name="email_representante" type="text" id="email_representante" size="50" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td>Obs</td>

      <td colspan="2"><textarea class='class02' name="obs" cols="50" rows="7" id="obs"></textarea></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td colspan="4" align="center"><strong><font color="#0000FF">

        <input name="dataalteracao" type="hidden" id="dataalteracao">

        <input name="horaalteracao" type="hidden" id="horaalteracao">

        <input name="operador" type="hidden" id="operador3" value="<? echo $nome; ?>">

        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular; ?>">

        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email; ?>">

        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estabelecimento; ?>">

        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estabelecimento; ?>">

        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estabelecimento; ?>">

        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estabelecimento; ?>">

        <input name="operador_alterou" type="hidden" id="operador_alterou">

        <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou">

        <input name="email_operador_alterou" type="hidden" id="email_operador_alterou">

        <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou">

        <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou">

        <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou">

        <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou">

        <input name="motivo_exclusao" type="hidden" id="motivo_exclusao">

DADOS BANCARIOS</font></strong></td>

      <td>&nbsp;</td>

    </tr>
    <tr>
      <td colspan="4" align="center" valign="top"><table width="100%" border="0">
        <tbody>
          <tr>
            <td width="35%">Banco</td>
            <td width="32%">Cod Agencia - DV</td>
            <td width="33%">Conta - DV</td>
            </tr>
          <tr>
            <td><strong><font color="#0000FF">
              <select class='class02' name="banco" id="banco">
                <option selected><? echo $banco; ?></option>
                <?


    $sql = "select * from bancos order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><font color="#0000FF">
              <input name="codagencia" type="text" class='class02' id="codagencia" value="<? echo $codagencia; ?>" size="10">
              -
              <input class='class02' name="digitoagencia" type="text" id="digitoagencia" value="<? echo $digitoagencia; ?>" size="5">
            </font></td>
            <td><font color="#0000FF">
              <input name="conta" type="text" class='class02' id="conta" value="<? echo $conta; ?>" size="10">
              -
  <input class='class02' name="digitoconta" type="text" id="digitoconta" value="<? echo $digitoconta; ?>" size="5">
            </font></td>
            </tr>
          <tr>
            <td>Tipo de Conta</td>
            <td>Nome Titular</td>
            <td>Nome Agencia</td>
            </tr>
          <tr>
            <td><strong><font color="#0000FF">
              <select class='class02' name="tipoconta" id="tipoconta">
                <option selected><? echo $tipoconta; ?></option>
                <?

    $sql = "select * from tipos_contas order by tipo_conta asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['tipo_conta']."</option>";
    }
?>
              </select>
            </font></strong></td>
            <td><strong><font color="#0000FF">
              <input class='class02' name="titularconta" type="text" id="titularconta" value="<? echo $titularconta; ?>">
            </font></strong></td>
            <td><font color="#0000FF">
              <input class='class02' name="nomeagencia" type="text" id="nomeagencia" value="<? echo $nomeagencia; ?>">
            </font></td>
            </tr>
        </tbody>
      </table></td>
      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td colspan="2"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input class='class01' type="submit" name="Submit" value="Cadastrar Fornecedor"></td><td><div align="right"> </div></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr> 

      <td colspan="2">&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

</form>
</body>

</html>

