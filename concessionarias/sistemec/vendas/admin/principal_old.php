<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>





<html>

<head>

<title>Menu principal do Administrador</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../conect/conect.php';



			

//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 

$sql = "SELECT * FROM fundo_navegacao";

//EXECUTA O COMANDO ACIMA

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#ffffff"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?>

<a href="cad_admin/menu.php"><font color="#FFFFFF"><strong><strong><strong>
<?

$sql = "select * from propostas where digitacao = 'A Digitar'";

$resultado=mysql_query($sql);

$registros_total = mysql_num_rows($resultado);



if($registros_total>=1){
echo "<script>

alert('ATENÇÃO !!!... EXISTE(M) $registros_total PROPOSTA(S) NA FILA A SEREM DIGITADAS!!!... FAVOR DIGITÁ-LAS EM SEUS RESPECTIVOS BANCOS DE IMEDIATO!!!...');

</script>";

}
?>
</strong></strong>Cadastrar Administrador</strong></font></a>

<form name="form1" method="post" action="calcula_pedido.php">

<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM adm where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;





$nome_operador = $linha[1];

?>







  <table width="100%" border="0" cellspacing="4">

    <tr> 

      <td colspan="2"><strong>Ol&aacute;! Seja bem vindo<br> </strong><strong><font color="#0000FF"><? echo $linha[1]; ?> 

            <input name="nome" type="hidden" id="razaosocial2" value="<? echo $linha[1]; ?>">

</font></strong><strong><font color="#0000FF">      </font></strong></td>

      <td width="41%"><strong>Estabelecimento:</strong> <br><strong><font color="#0000FF"><? echo $linha[44]; ?>

            <input name="estabelecimento" type="hidden" id="nfantasia5" value="<? echo $linha[44]; ?>">

      </font></strong><strong><font color="#0000FF">      </font></strong></td>

      <td width="14%"><strong>Celular:<font color="#0000FF"><br> <? echo $linha[19]; ?>

            <input name="celular" type="hidden" id="nfantasia32" value="<? echo $linha[19]; ?>">

      </font><font color="#0000FF">

      </font></strong></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td width="18%"><strong>Cidade: <br><font color="#0000FF"><? echo $linha[45]; ?>

            <input name="cidade_estabelecimento" type="hidden" id="nfantasia43" value="<? echo $linha[45]; ?>">

      </font><font color="#0000FF">      </font></strong></td>

      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

        <? echo $linha[46]; ?>

            <input name="tel_estabelecimento" type="hidden" id="nfantasia23" value="<? echo $linha[46]; ?>">

      </font></strong></td>

      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

            <? echo $linha[47]; ?>

            <input name="email_estabelecimento" type="hidden" id="nfantasia24" value="<? echo $linha[47]; ?>">

      </font></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><strong><font color="#0000FF">      </font></strong></td>

      <td>&nbsp;</td>

      <td><?

//echo date('localtime()'); ?>

</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

<?

if($reg==3){

echo "</tr><tr>";

$reg=0;

}

?>



<? } ?>

  </table>

  

  <?

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	?>



</form>

<?







$num_proposta = $_POST['num_proposta'];



$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;

?>
<table width="100%"  border="0">

  <tr>

    <td colspan="3"><strong>A proposta de seu cliente  de N&ordm;</strong> <strong><font color="#0000FF"><? echo $linha[0]; ?></font></strong><font color="#000000"><strong>, efetuada em</strong> <strong><font color="#0000FF"><? echo $linha[40]; ?></font>, Tem seu status definido em </strong> <strong><font color="#0000FF"><? echo $linha[51]; ?></font></strong> <strong>!</strong></font></td>

  </tr>

  <tr>

    <td width="37%">&nbsp;</td>

    <td width="20%"><form action="propostas/imprimir_proposta.PHP" method="post" name="form3" target="_blank">

      <strong><font color="#0000FF">

      <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

      </font></strong>

      <input type="submit" name="Submit4" value="Imprimir Proposta">

    </form></td>

    <td width="43%">&nbsp;</td>

  </tr>

</table>

<?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>

<? } ?>



<table width="100%"  border="0">

  <tr>
    <td colspan="4"><div align="center">
      <form action="relatorios/propostas_a_digitar.php" method="post" name="form2">
        <input name="tipo_proposta" type="hidden" id="tipo_proposta" value="Todas">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit3" value="FILA DE ESPERA DE PROPOSTAS A DIGITAR">
      </form>
    </div></td>
  </tr>
  <tr>

    <td colspan="2"><form name="form12" method="post" action="propostas/status_proposta.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        Proposta

        <input name="num_proposta" type="text" id="num_proposta3" size="11">

        comiss&atilde;o

        <input name="percentual" type="text" id="percentual3" size="4" maxlength="4">

        % Comiss&atilde;o op

        <input name="percentual_op" type="text" id="percentual_op3" size="4" maxlength="4">

        <input type="submit" name="Submit15" value="Status">

    </form></td>

    <td><form action="propostas/menu.php" method="post" name="form2">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit9" value="Propostas">
    </form></td>
    <td><form action="propostas/lista_de_propostas_para_alterar_satatus.php" method="post" enctype="multipart/form-data" name="form1">
      <div align="left">
        CPF 
        <input name="cpf" type="text" id="cpf">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit17" value="Verificar Propostas ">
      </div>
    </form></td>
  </tr>

  <tr>

    <td colspan="2"><div align="center">
      <form name="form2" method="post" action="borderos/borderos.php">
        <div align="left">N&ordm; do Border&ocirc;
            <input name="num_bordero_receber" type="text" id="num_bordero_receber" size="10">
            <input type="submit" name="Submit25" value="Buscar Border&ocirc;">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </div>
      </form>
    </div></td>
    <td colspan="2"><form name="form8" method="post" action="mapa_producao/menu.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit123" value="Mapa de Produ&ccedil;&atilde;o">

    </form></td>
  </tr>

  <tr>

    <td colspan="2"><form name="form15" method="post" action="propostas/relatorio_de_pagtos_ao_cliente.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  Informe a data dd-mm-aaaa

  <input name="data_pagto_cliente" type="text" id="data_pagto_cliente" size="10" maxlength="10">

  <input type="submit" name="Submit163" value="Relat&oacute;rio de Pagtos ao cliente(Operador)">

    </form></td>

    <td><form name="form8" method="post" action="ips/menu.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit" value="Autoriza&ccedil;&atilde;o de IP's">
    </form></td>
    <td>&nbsp;</td>
  </tr>

  <tr>

    <td colspan="2"><form name="form15" method="post" action="propostas/relatorio_de_pagtos_ao_cliente_administracao.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  Informe a data dd-mm-aaaa

  <input name="data_pagto_cliente" type="text" id="data_pagto_cliente" size="10" maxlength="10">

  <input type="submit" name="Submit1632" value="Relat&oacute;rio de Pagtos ao cliente(Administra&ccedil;&atilde;o)">

    </form>    </td>
    <td><form name="form18" method="post" action="veiculos/index.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="hidden" name="cpf" id="cpf">
      <input type="hidden" name="num_proposta" id="num_proposta">
      <input type="submit" name="button" id="button" value="Ve&iacute;culos">
    </form></td>
    <td>&nbsp;</td>
  </tr>

  <tr>

    <td width="17%"><form action="estabelecimentos/menu.php" method="post" name="form2">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit6" value="Estabelecimentos">

    </form></td>

    <td width="32%"><form action="clientes/menu.php" method="post" name="form2">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit5" value="Clientes">

    </form></td>

    <td width="18%">&nbsp;</td>

    <td width="31%"><form action="operadores/menu.php" method="post" name="form20">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit20" value="Operadores(Funcion&aacute;rios)">

    </form></td>
  </tr>

  <tr>

    <td><form action="fornecedores/menu.php" method="post" name="form2">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit63" value="Fornecedores">

    </form></td>

    <td><form action="etiquetas/informe_tipo_para_gerar_etiquetas.php" method="post" name="form4">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit7" value="Etiquetas mala-direta">

    </form></td>

    <td>&nbsp;</td>

    <td><form name="form8" method="post" action="ponto/menu.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit12" value="Cart&atilde;o de Ponto">

    </form></td>
  </tr>

  <tr>

    <td><form action="estados_do_brasil/menu.php" method="post" name="form6">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit62" value="Estados do Brasil ">

    </form></td>

    <td><form name="form8" method="post" action="newsletter/menu.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

    </form></td>

    <td>&nbsp;</td>

    <td><form name="form9" method="post" action="propostas/informe_operador_para_gerar_relatorio_mensal.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit2" value="Produ&ccedil;&atilde;o mensal por operador">

    </form></td>
  </tr>

  <tr>

    <td><form name="form6" method="post" action="bancos/menu.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit8" value="Bancos">

    </form></td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td><form name="form9" method="post" action="propostas/informe_operador_para_verificar_propostas_aguardando_ativacao.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit24" value="Verificar status por operador">

    </form></td>
  </tr>

  <tr>

    <td><form action="status/menu.php" method="post" name="form17">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit172" value="Status">

    </form></td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td><form name="form8" method="post" action="mototaxi/menu.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit122" value="Mototaxi">

    </form></td>
  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td><form action="correspondentes/menu.php" method="post" name="form20">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit202" value="Agentes">

    </form></td>
  </tr>

  <tr>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td><form name="form9" method="post" action="correspondentes/informe_correspondente_para_verificar_propostas_aguardando_ativacao.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit23" value="Verificar status por Agente">

    </form></td>
  </tr>
</table>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>