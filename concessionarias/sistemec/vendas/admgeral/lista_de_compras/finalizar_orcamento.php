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
<title>Voltar ao Hist&oacute;rico do cliente</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>

<?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';
error_reporting(E_ALL);

?>

		  
		  
		  <?
$codigo_orcamento_finalizar = $_POST['codigo_orcamento_finalizar'];		  
$condicao = $_POST['condicao'];
$num_orcamento_bloco = $_POST['num_orcamento_bloco'];


$status = "Finalizado";


if($condicao=="PEDIDO"){
$status_fatura = "FATURADO";
}
else{
$status_fatura = "A FATURAR";
}



$codigo_cliente = $_POST['codigo_cliente'];		  

$horafechamento = $_POST['horafechamento'];	

$quantparc = $_POST['quantparc'];

$modopagto = $_POST['modopagto'];		  

$cartao = $_POST['cartao'];	

	

  
	  
$datafechamento = date('Y-m-d');

$data = $datafechamento;

$data2 = explode("-", $data);


$dia = $data2[2];

$mes = $data2[1];

$ano = $data2[0];


//dados do operador que alterou

$loja = $_POST['loja'];

$operador_alterou = $_POST['operador_alterou'];


?>

<?

$sql = "SELECT * FROM fornecedores where codigo = '$codigo_cliente'";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$reg++;


$nfantasia = $linha[2];


}

?>


<?

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos_for` set `status_fatura` = '$status_fatura',`condicao` = '$condicao',`status` = '$status',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`operador_alterou` = '$operador_alterou',`datealteracao` = '$datafechamento',`horaalteracao` = '$horafechamento',`num_orcamento_bloco` = '$num_orcamento_bloco' where `orcamentos_for`. `codigo_orcamento` = '$codigo_orcamento_finalizar' limit 1 ";
}

mysql_query($comando,$conexao);


?>


<?

$sql = "SELECT * FROM produtos_em_orcamento_for where codigo_orcamento = '$codigo_orcamento_finalizar'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];





$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$comando = "update `$linha[1]`.`produtos_em_orcamento_for` set `status_fatura` = '$status_fatura',`condicao` = '$condicao',`status` = '$status',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`operador_alterou` = '$operador_alterou',`datealteracao` = '$datafechamento',`horaalteracao` = '$horafechamento' where `produtos_em_orcamento_for`. `codigo` = '$codigolancamento' limit 1 ";
}

mysql_query($comando,$conexao);



}


?>







<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_empresa;
	
	//PREPARA O PEDIDO
	//$mens   =  "Olá! Orçamento alterado na $nfantasia_empresa!   \n";
	//$mens  .=  " \n";
	//$mens  .=  "Nº do Orçamento: ".$codigo_orcamento."                                                       \n";
	//$mens  .=  "STATUS: ".$status."                                                       \n";
	//$mens  .=  "Cliente: ".$loja."                                                    \n";
	//$mens  .=  "Data de alteração: ".$datafechamento."                                                    \n";
	//$mens  .=  "Hora de alteração: ".$horafechamento."                                                    \n";
	//$mens  .=  "Operador que efetuou a alteração: ".$operador_alterou."                                                    \n";
	//$mens  .=  "Estabelecimento: ".$loja."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Orçamento alterado no sistema em ".$dataalteracao, $mens,"From:".$email_dest."\r\nBcc:".$email_dest);
	//$envia  =  mail($email_operador_alterou, "Orçamento alterado no sistema em ".$dataalteracao, $mens,"From:".$email_dest);

?>


<?


			
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
<form name="form2" method="post" action="historico_fornecedor.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $nfantasia; ?>">
  <input type="submit" name="Submit" value="Voltar Hist&oacute;rico do Fornecedor">
</form>
</body>
</html>
<?
mysql_close($conexao);
?>
