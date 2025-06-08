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

<title>LISTANDO TODAS AS PROPOSTAS RECEBIDAS POR BANCO E POR PERIODO</title>

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



require '../../../conect/conect.php';





	  




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




<?

$num_proposta_estornar = $_POST['num_proposta_estornar'];



if(empty($num_proposta_estornar)){

}
else{

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta_estornar',`recebido` = 'Não',`data_recebimento` = '',`date_recebimento` = '',`hora_baixa` = '' where `propostas`. `num_proposta` = '$num_proposta_estornar' limit 1 ";

}



mysql_query($comando,$conexao) or die("Erro ao estornar comissão dessa proposta");

echo "Proposta estornada com sucesso<br><br>";




$comando = "delete from `cx_entradas` where `cx_entradas`. `num_proposta` = '$num_proposta_estornar'";



mysql_query($comando,$conexao) or die("Erro ao excluir a comissão da entrada de caixa"); 


 echo "Comissão estornada do caixa com sucesso!";



$comando = "delete from `contas_a_receber` where `contas_a_receber`. `num_proposta` = '$num_proposta_estornar'";



mysql_query($comando,$conexao) or die("Erro ao excluir no contas a receber"); 


 echo "Contas a receber estornado com sucesso!";

}


?>





      <p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>

      <form action="../principal.php" method="post" name="form1" target="navegacao">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit2" value="Voltar">
      </form>
<table width="100%"  border="0">

        <tr>

          <td colspan="10"><div align="left"></div></td>
        </tr>

        <tr>

          <td colspan="10">&nbsp;</td>
        </tr>

        <tr>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
          <td>&nbsp;</td>
          <td><div align="center">N&ordm; Proposta a Estornar</div></td>
          <td colspan="2"><div align="center">
            <form name="form3" method="post" action="estorno_de_comissoes_recebidas.php">
              <input type="text" name="num_proposta_estornar" id="num_proposta_estornar">
              <input type="submit" name="button2" id="button2" value="Estornar">
            </form>
          </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>

          <td width="9%"><div align="center"></div></td>

          <td width="13%"><div align="center"></div></td>

          <td width="9%">&nbsp;</td>

          <td width="12%"><div align="center"></div></td>

          <td width="11%">&nbsp;</td>

          <td width="9%"><div align="center"></div></td>

          <td width="5%">&nbsp;</td>

          <td width="7%">&nbsp;</td>

          <td width="14%">&nbsp;</td>

          <td width="11%">&nbsp;</td>
        </tr>
</table>

<br>
<p>&nbsp;</p>







</body>

</html>

