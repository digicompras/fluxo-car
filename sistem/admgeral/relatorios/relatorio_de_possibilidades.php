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

<title>LISTANDO TODOS OS PEDIDOS DE POSSIBILIDADES DO PERIODO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style3 {font-size: 10px}
.style2 {
	color: #0000FF;

	font-weight: bold;
}
.style5 {font-size: 18px}
.style5 {font-size: 24px}

-->

</style>
</head>

<?



require '../../conect/conect.php';





	  

$nome_operador = $_POST['nome_operador'];

$mes_ano = $_POST['mes_ano'];

$campanha_filtro = $_POST['campanha'];





$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];



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

      <form name="form1" method="post" action="menu.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <span class="style7 style13">

        <input type="hidden" name="solicitacao" id="solicitacao" />
        <input type="hidden" name="comissao" id="comissao" />
        <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">

        <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">

        <input name="ano_inicial" type="hidden" id="dia_inicial3" value="<? echo $ano_inicial; ?>">

        <input name="dia_final" type="hidden" id="dia_inicial4" value="<? echo $dia_final; ?>">

        <input name="mes_final" type="hidden" id="dia_final" value="<? echo $mes_final; ?>">

        <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
        </span>        

        <input type="submit" name="Submit2" value="Voltar">

</form>

      <p><br>

  <?

	  $nome_operador = $_POST['nome_operador'];

$data_inicial = $_POST['data_inicial'];

$data_final = $_POST['data_final'];




$sql = "SELECT * FROM possibilidades where dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}
?><br>
        
      <?

$sql = "SELECT * FROM allcred limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$endereco = $linha[5];

$numero = $linha[6];

$bairro = $linha[7];

$cep = $linha[9];

$cidade = $linha[10];

$estado = $linha[11];

$telefone = $linha[12];

$fax = $linha[13];

$email_empresa = $linha[14];

$site = $linha[15];



}



?>
      <table width="70%"  border="0" align="center">
        <tr>
          <td colspan="4"><div align="center"><span class="style2">
          <?

$nome_operador = $_POST['nome_operador'];

			

$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$nome_operador = $linha[1];



}



?>
            Listando todos os pedidos de possibilidades da empresa:</span> <span class="style2"><? echo $nfantasia; ?>
              
            </span></div></td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td width="28%"><div align="center">Per&iacute;odo estabelecido</div></td>
          <td width="24%"><div align="center"><strong><? echo "De $dia_inicial-$mes_inicial-$ano_inicial até $dia_final-$mes_final-$ano_final";?></strong></div></td>
          <td width="6%">&nbsp;</td>
          <td width="42%"><div align="center">Total de Operadores que efetuou solicita&ccedil;&atilde;o</div></td>
        </tr>
        <tr>
          <td><div align="center"> Total de Pedidos solicitados</div></td>
          <td align="left"><div align="center"><strong><? echo " $registros";?></strong></div></td>
          <td>&nbsp;</td>
          <td><div align="center"><strong><strong>
            <?

$sql = "SELECT * FROM possibilidades where dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final' group by operador";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_total_operadores = mysql_num_rows($res);

}

echo $registros_total_operadores;
?></strong></strong></div></td>
        </tr>
      </table>
      <p>
        <?

$sql = "SELECT * FROM possibilidades where dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final' order by ano,mes,dia,hora desc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nome = $linha[1];

$cpf = $linha[2];

$telefone = $linha[3];

$celular = $linha[4];

$operador = $linha[5];

$cel_operador = $linha[6];

$email_operador = $linha[7];

$num_beneficio = $linha[8];

$num_beneficio2 = $linha[9];

$num_beneficio3 = $linha[10];

$num_beneficio4 = $linha[11];

$dia = $linha[12];

$mes = $linha[13];

$ano = $linha[14];

$hora = $linha[15];


?>
        
            </p>
<table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td><div align="center" class="style3">Nome</div></td>

          <td><div align="center" class="style3">CPF</div></td>
          <td><div align="center" class="style3">Telefone</div></td>

          <td><div align="center" class="style3">Celular</div></td>

          <td><div align="center"><span class="style3">N&ordm; Benef&iacute;cio</span></div></td>

          <td><div align="center"><span class="style3">N&ordm; Benef&iacute;cio2</span></div></td>

          <td><div align="center" class="style3">N&ordm; Benef&iacute;cio3</div>            </td>

          <td><div align="center" class="style3">N&ordm; Benef&iacute;cio4</div></td>

          <td width="7%"><div align="center" class="style3">Data</div></td>

          <td width="7%"><div align="center"><span class="style3">Hora</span></div></td>
          <td width="17%"><div align="center" class="style3">Operador</div></td>
  </tr>

		

        <tr>

          <td width="16%">               <form name="form2" method="post" action="altera_comissoes.php">
            <div align="center" class="style3">

            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?><? echo $nome;?>            </div>
          </form></td>

          <td width="8%"><div align="center"><span class="style3"><? echo $cpf;?></span></div></td>
          <td width="8%"><div align="center" class="style3"><? echo $telefone;?></div></td>

          <td width="8%"><div align="center"><span class="style3"><? echo $celular;?></span></div></td>

          <td width="9%"><div align="center"><span class="style3"><? echo $num_beneficio;?></span></div></td>

          <td width="9%"><div align="center"><span class="style3"><? echo $num_beneficio2;?></span></div></td>

          <td width="9%">

          <div align="center" class="style3"><? echo $num_beneficio3;?></div></td>

          <td width="10%"><div align="center" class="style3"><? echo $num_beneficio4;?></div></td>

          <td><div align="center" class="style3"><? echo "$dia-$mes-$ano";?></div></td>

          <td><div align="center"><span class="style3"><? echo $hora;?></span></div></td>
          <td><div align="center" class="style3"><? echo $operador;?></div></td>

          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>


<? } ?>
        <tr>

          <td><span class="style3"></span></td>

          <td>&nbsp;</td>
          <td><span class="style3"></span></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td>&nbsp;</td>
          <td><span class="style3"></span></td>
          </tr>
</table>



<p align="center"><span class="style5"><strong><? echo $site; ?></strong></span> <br>
  <? echo $endereco; ?> , <? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?> <br>
  <? echo "Telefone / Fax: ". $telefone." "; ?> / <? echo $fax; ?> <br>
  <? echo "E-Mail: ". $email_empresa; ?></p>
</body>

</html>

