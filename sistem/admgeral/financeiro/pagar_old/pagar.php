<?php

session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

header("Location: alerta.php");



?>

<html>

<head>

<title>Untitled Document</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style1 {

	color: #FF0000;

	font-weight: bold;

	font-size: 24px;

}

.style2 {color: #0000FF}

.style3 {color: #FF0000}

.style4 {font-size: 18px}

-->

</style></head>



<?



require '../../../conect/conect.php';



			

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?>



<?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estabelecimento_op = $linha[24];

$cidade_estabelecimento_op = $linha[25];

$tel_estabelecimento_op = $linha[26];

$email_estabelecimento_op = $linha[27];

$estab_pertence_op = $linha[44];

$cidade_estab_pertence_op = $linha[45];

$tel_estab_pertence_op = $linha[46];

$email_estab_pertence_op = $linha[47];

}





?>





<?

// dados do aluno

$codigo_contas_a_receber = $_POST['codigo_contas_a_receber'];



$codigo_aluno = $_POST['codigo_aluno'];

$nome_aluno = $_POST['nome_aluno'];



$datacadastro = date('d-m-Y');

$horacadastro = date('H:i:s');

$nome = $_POST['nome'];

$nome_resp = $_POST['nome'];

$cpf_resp = $_POST['cpf_resp'];

$curso = $_POST['curso'];

$modulos = $_POST['modulos'];

$duracao = $_POST['duracao'];

$mensalidade = $_POST['mensalidade'];

$vencto = $_POST['vencto'];

$quant_parc = $_POST['quant_parc'];

$modo_pagto = $_POST['modo_pagto'];

$juros_diarios = $_POST['juros_diarios'];

$quitacao = $_POST['quitacao'];

$categoria_conta = $_POST['categoria_conta'];

$num_mensalidade = $_POST['num_mensalidade'];



//dados do operador



$operador = $_POST['operador'];

$cel_operador = $_POST['cel_operador'];

$email_operador = $_POST['email_operador'];

$estabelecimento = $_POST['estabelecimento'];

$cidade_estabelecimento = $_POST['cidade_estabelecimento'];

$tel_estabelecimento = $_POST['tel_estabelecimento'];

$email_estabelecimento = $_POST['email_estabelecimento'];

$historico = $_POST['historico'];





// Observa��es



$obs = $_POST['obs'];









?>









<p align="center" class="style1">Aten&ccedil;&atilde;o! <span class="style2">

  <? echo $nome_op; ?> 

<span class="style3">... <span class="style4">Voc&ecirc; est&aacute; prestes a dar sa&iacute;da no caixa..... </span></span></span></p>

<p align="center" class="style1"><span class="style2"><span class="style3"><span class="style4">Verifique atentamente se os dados est&atilde;o corretos e fa&ccedil;a as observa&ccedil;&otilde;es necess&aacute;rias!

</span></span></span></p>

<form name="form1" method="post" action="../caixa/menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit2" value="Voltar">

</form>

<form name="form2" method="post" action="grava_cx_saidas.php">

  <table width="100%"  border="0">

    <tr>

      <td width="20%">Loja</td>

      <td width="4%">&nbsp;</td>

      <td width="26%"><select name="nfantasia" id="select6">

        <option selected></option>

        <?





    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>

      </select></td>

      <td width="15%">Categoria despesa </td>

      <td width="35%"><select name="categoria_conta" id="categoria_conta">

        <option selected></option>

        <?





    $sql = "select * from categorias_despesas order by categoria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['categoria']."</option>";

    }

?>

      </select></td>

    </tr>

    <tr>

      <td>Valor</td>

      <td><div align="center"><strong>R$</strong></div></td>

      <td><input name="valor" type="text" id="valor"> 

        0000.00 </td>

      <td>Fornecedor</td>

      <td><select name="fornecedor" id="fornecedor">
        <option selected></option>
        <?





    $sql = "select * from fornecedores order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
      </select></td>

    </tr>

    <tr>

      <td>Historico</td>

      <td colspan="2" rowspan="4"><textarea name="historico" cols="40" rows="6" id="historico"></textarea>      </td>

      <td valign="top">Modo Pagto </td>

      <td valign="top"><select name="modo_pagto" id="modo_pagto">

        <option selected></option>

        <?





    $sql = "select * from modo_pagto order by modopagto asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['modopagto']."</option>";

    }

?>

      </select></td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td valign="top">N&ordm; Cheque </td>

      <td valign="top"><input name="num_cheque" type="text" id="num_cheque"></td>

    </tr>

    <tr>

      <td rowspan="2">&nbsp;</td>

      <td valign="top">Banco</td>

      <td valign="top"><select name="banco" id="banco">

        <option></option>

        <option>Bradesco Juridica</option>
        
         <option>Bradesco Fisica</option>

        <option>HSBC Juridica</option>
        
        <option>HSBC Fisica</option>

      </select></td>

    </tr>

    <tr>

      <td valign="top">Conta</td>

      <td valign="top"><select name="conta" id="conta">

        <option>Ag:0263-1 C/C: 0133831-5</option>

        <option>Ag: 2136-9 C/C: 0029126-9</option>

        <option>Ag: 1156 C/C: 00312-84</option>
        
        <option>Ag: 1156 C/C: 00180-40</option>

            </select></td>

    </tr>

    <tr>

      <td colspan="3">        <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>">

        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">

        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">

        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estabelecimento_op; ?>">

        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estabelecimento_op; ?>">

        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estabelecimento_op; ?>">

        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estabelecimento_op; ?>">

      <input type="submit" name="Submit" value="Confirmar Pagamento"></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

</form>

<p>&nbsp;</p>

<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>