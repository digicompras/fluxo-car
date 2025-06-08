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

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

.style2 {	color: #0000FF;

	font-weight: bold;

}

.style1 {font-size: 35px;

	font-weight: bold;

	color: #0000FF;

}

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

</style>

</head>



<?



require '../../conect/conect.php';

include '../../css/botoes.css';



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores_ec where usuario = '$usuario' and senha = '$senha' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigo_operador = $linha[0];



$nome_operador = $linha[1];



$estab_pertence_com = $linha[44];





}





$comandainicial = $_POST['comandainicial'];
$comandafinal = $_POST['comandafinal'];

$date_impressao = date('Y-m-d');

$hora_impressao = date('H:i:s');







$sql = "select * from comandas where codigo between '$comandainicial' and '$comandafinal'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comanda_a_gerar_codigobarras = $linha[0];

$empresaconveniada = $linha[6];

$nomedofuncionario = $linha[7];
	







$comando = "insert into impressao_de_comandas(num_comanda,date_impressao,hora_impressao,quem_imprimiu,quant_impressao) values('$comanda_a_gerar_codigobarras','$date_impressao','$hora_impressao','$nome_operador','1')";



mysql_query($comando,$conexao) or die("Erro ao gravar impressão de cartao!");







?>



<body >

<p>&nbsp;</p>

<table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td width="48%" align="center" valign="middle"><div align="right">

      <div id="picture"><img src="frente_cartao.jpg" width="450" height="278" alt="Comanda do Funcionario"></img>

      <link rel="stylesheet" type="text/css" href="estilo.css"/>
		</div>
		<div align="center">

<h2>

  <strong><? echo "$empresaconveniada<br>";
	  ?>
	<?
	
require_once('barcode.inc.php'); 
    new barCodeGenrator("$comanda_a_gerar_codigobarras",1,"$comanda_a_gerar_codigobarras.gif", 250, 80, true);
	?>
	<img width="377" height="198" src="../../codigo_de_barras/<? echo "$comanda_a_gerar_codigobarras"; ?>.gif"/>
	  
	  
	
	</strong>

</h2>

      </div>

   </td>

    <td width="52%"><div id="picture2"><img src="verso_cartao.jpg" width="450" height="278" alt="Comanda do Funcionario"></img></div></td>

  </tr>

</table>


<p align="center"><strong>Imprima, Recorte, Dobre e Plastifique</strong></p>
<br><br><br>
</body>
<? } ?>
</html>
<?

//$arquivo = "$comandadofuncionario.gif";
//if (!unlink($arquivo))
//{
 // echo ("Erro ao deletar $arquivo");
//}
//else
//{
 // echo ("Deletado $arquivo com sucesso!");
//}
			
?>
