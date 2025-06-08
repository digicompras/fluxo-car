<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.





else //se não for...

header("Location: alerta.php");



?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../../conect/conect.php';

$data_hoje = $_SESSION['data_hoje'];



$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?> 

<body bgcolor="#<? printf("$linha[1]"); ?>"> 

<? } ?>



<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;





$nome_operador = $linha[1];

$senha_op = $linha[41];

$tipo_op = $linha[42];

$funcao = $linha[43];

$estab_pertence = $linha[44];

$bloqueio_parcial = $linha[57];

}
?>











  <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  
<?

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	?>
<form name="form1" method="post" action="../index.php">
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estabPertence = $linha[46];

$email_estab_pertence = $linha[47];

}





?>
  <input type="submit" name="Submit2" value="Voltar ao menu principal">
</form>
<div align="center"></div>

<table width="100%"  border="0">

  <tr>

    <td width="21%"><form action="propostas_veiculos/informe_operador_para_gerar_relatorio_mensal.php" method="post" name="form5">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">

      <input type="submit" name="Submit523" value="Relat&oacute;rio de Produ&ccedil;&atilde;o">

    </form></td>

    <td width="21%"><form action="pesquiza_cpf.php" method="post" name="form2">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estab_pertence; ?>">
      <input type="submit" name="Submit" value="Capturar Proposta">

    </form></td>

    <td width="30%">&nbsp;</td>
    <td width="28%">&nbsp;</td>
  </tr>

  <tr>

    <td colspan="4"><form action="index.php" method="post" name="form2">

	<div align="center">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      CPF Cliente 

          <input name="cpf" type="text" id="cpf" size="11" maxlength="11">

          ex: 99999999999       

          <input type="submit" name="Submit3" value="Acompanhar Proposta">
      </div>

    </form></td>
  </tr>
</table>

<strong></strong>

<div align="center"></div>



<table width="100%"  border="0">

  <tr>

    <td colspan="6"><div align="center"><strong>Prezado Operador!</strong> </div></td>

    <td width="10%">&nbsp;</td>
  </tr>



  <tr bgcolor="#CCCCCC">

    <td width="13%"><div align="center"><font size="2"><strong>N&ordm; Proposta </strong></font></div></td>

    <td width="8%"><div align="center"><font size="2"><strong>Data</strong></font></div></td>

    <td width="29%"><div align="center"><font size="2"><strong>Status</strong></font></div></td>

    <td width="12%"><div align="center"><font size="2"><strong>Loja</strong></font></div></td>

    <td width="15%"><div align="center"><font size="2"><strong>Operador</strong></font></div></td>

    <td width="13%"><div align="center"><font size="2"><strong>Nome</strong></font></div></td>

    <td><div align="center"><font size="2"><strong>CPF</strong></font></div></td>
  </tr>

     <?

$cpf = $_POST['cpf'];



$sql = "SELECT * FROM propostas_veiculos where cpf = '$cpf' order by num_proposta desc";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;



$num_proposta = $linha[0];

$dataproposta = $linha[1];

$estabelecimento_proposta = $linha[4];

$operador_atendente = $linha[5];

$status = $linha[6];

$nome = $linha[9];

$cpf = $linha[12];



$coeficiente = $linha[100];

$codigo_tabela = $linha[101];

$num_parcelas = $linha[102];

$valor_parcelas = $linha[103];

$r = $linha[105];

$valor_liberado = $linha[106];

$pagto_serv_terceiros = $linha[107];

$parecer_credito = $linha[145];

?>



  <tr valign="middle">

    <td>

      <form action="imprimir_proposta.php" method="post" name="form3" target="_blank">

      <div align="center"> <font size="1"><? echo $num_proposta; ?>

            <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">

            <input type="submit" name="Submit4" value="Visualizar">

        </font></div>
    </form>    </td>

    <td><div align="center"><font size="1"><? echo $dataproposta; ?></font></div></td>

    <td>

      <form action="propostas_veiculos/autorizacao_para_pagto.php" method="post" name="form3" target="_blank">

        <div align="center"> <font size="1">

              <? echo $status; ?>

              <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">

              <? if($status=="Aprovado"){echo '<input type="submit" name="Submit42" value="Autoriza&ccedil;&atilde;o Pagto">'; } ?>

        </font></div>
    </form>    </td>

    <td><div align="center"><font size="1"><? echo $estabelecimento_proposta; ?></font></div></td>

    <td><div align="center"><font size="1"><? echo $operador_atendente; ?></font></div></td>



    <td><div align="center"><font size="1"><? echo $nome; ?></font></div></td>

    <td><div align="center"><font size="1"><? echo $cpf; ?></font></div></td>
    <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

  <? } ?>
</table>

<p align="center">

</p>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>