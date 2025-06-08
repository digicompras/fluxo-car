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

<title>LISTANDO CARTÃO DE PONTO DO FUNCIONÁRIO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style2 {

	color: #0000FF;

	font-weight: bold;

}

-->

</style>

</head>

<?



require '../../conect/conect.php';


$nome = $_POST['nome'];

$mes_ano = $_POST['mes_ano'];



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
      <table width="100%" border="0">
        <tr>
          <td width="11%"><form name="form1" method="post" action="menu.php">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <input type="submit" name="Submit2" value="Voltar">
          </form></td>
          <td width="8%">&nbsp;</td>
          <td width="72%"><form name="form1" method="post" action="listar_cartao_de_ponto_todos_funcionarios.php">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo $mes_ano; ?>">
            <input type="submit" name="Submit4" value="Voltar a Listagem">
          </form></td>
          <td width="9%">&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="100%"  border="0">

        <tr>

          <td><div align="center"><span class="style2">

            <?




$sql = "SELECT * FROM ponto where nome = '$nome' and mes_ano = '$mes_ano' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {











?>

          Editando cart&atilde;o de ponto do funcion&aacute;rio:</span> <span class="style2"><? printf("$linha[1]"); ?><? } ?></span></div></td>

        </tr>

</table>

      <p>

        <?

$sql = "SELECT * FROM operadores where nome = '$nome'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;



$nome_operador = $linha[1];

$funcionario = $linha[42];

$funcao = $linha[43];

}

?>

      </p>



<table width="90%"  border="1" align="center" bordercolor="#000000">

        <tr>

          <td colspan="8"><p><strong>NOME: <? echo $nome_operador; ?></strong></p>

              <p><strong>FUN&Ccedil;&Atilde;O: <? echo $funcao; ?></strong></p>

              <p><strong>M&Ecirc;S: <? echo $mes_ano; ?> </strong></p></td>
        </tr>


        <tr>

          <td colspan="8"></td>
        <tr>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td colspan="4"><div align="center"><strong>HOR&Aacute;RIO</strong></div></td>
          <td><div align="center"></div></td>
          <td>&nbsp;</td>
        <tr>
          <td><div align="center"><strong>Dia Semana</strong></div></td>
          <td><div align="center"><strong>Data</strong></div></td>
          <td><div align="center"><strong>Entrada</strong></div></td>
          <td><div align="center"><strong>Sa&iacute;da Almo&ccedil;o</strong></div></td>
          <td><div align="center"><strong>Entrada Almo&ccedil;o</strong></div></td>
          <td><div align="center"><strong>Sa&iacute;da Tarde</strong></div></td>
          <td><div align="center"><strong>Observa&ccedil;&otilde;es</strong></div></td>
          <td>&nbsp;</td>
  </tr>
<?

			

$sql = "SELECT * FROM ponto where nome = '$nome' and mes_ano = '$mes_ano' order by data asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$nome = $linha[1];
$data = $linha[2];
$ent_m = $linha[3];
$sai_m = $linha[4];
$ent_t = $linha[5];
$sai_t = $linha[6];
$ent_e = $linha[7];
$sai_e = $linha[8];
$obs = $linha[9];
$mes_ano = $linha[10];
$dia_semana = $linha[11];


?>
        <tr>
          <td><div align="center"><? echo $dia_semana; ?></div></td>
          <td><div align="center"> <? echo $data; ?> </div></td>
          <td><div align="center"><? echo $ent_m; ?></div></td>
          <td><div align="center"><? echo $sai_m; ?></div></td>
          <td><div align="center"><? echo $ent_t; ?></div></td>
          <td><div align="center"><? echo $sai_t; ?></div></td>
          <td><div align="center"><? echo $obs; ?></div></td>
          <td width="19%"><form name="form2" method="post" action="editar_codigo_ponto.php">

            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

            <input name="codigo" type="hidden" id="num_proposta3" value="<? echo $codigo; ?>">

            <? // printf("<a href='editar_proposta.php?chamar=$linha[0]' >$linha[0]</a>"); ?>

            <input type="submit" name="Submit3" value="Editar data">

          </form></td>

          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

          <? } ?>
        <tr>

          <td colspan="8">&nbsp;<br>

      Ass:</td>
</table>

<p>&nbsp;          </p>

<p>&nbsp;</p>

      <p>&nbsp;</p>

      <p>&nbsp;</p>

      <p><br>

                              </p>

      <table width="100%"  border="0">

              <tr>

                <td>

</td>

              </tr>

</table>            

      <?

$cpf = $_POST['cpf'];

			

$sql = "SELECT * FROM propostas where cpf = '$cpf' order by num_proposta desc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>            

      <table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td>N&ordm; da Proposta </td>

          <td>Valor do Cr&eacute;dito Solicitado </td>

          <td width="19%">Quant de parcelas </td>

          <td width="17%">Valor das parcelas </td>

          <td>Status</td>

        </tr>

		

        <tr>

          <td width="23%"><div align="center">               <form name="form2" method="post" action="editar_proposta_por_num_proposta.php">

              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

              

  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

  <? // printf("<a href='editar_proposta.php?chamar=$linha[0]' >$linha[0]</a>"); ?>

                <? printf("$linha[0]"); ?>                <input type="submit" name="Submit" value="Editar Proposta">

              

          </form></div></td>

          <td width="22%"><div align="center"><? printf("R$ $linha[25]</a> ");?>

          </div></td>

          <td><div align="center"><? printf("$linha[26]"); ?>

          </div></td>

          <td><div align="center"><? printf("$linha[27]"); ?>

          </div></td>

          <td width="19%"><div align="center"><? printf("$linha[51]"); ?>

          </div></td>

		  <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

<? } ?>

        

      </table>



          



<p>&nbsp;</p>

</body>

</html>

