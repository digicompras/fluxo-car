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
.style1 {	font-size: 24px;
	font-weight: bold;
}
.style10 {font-size: 14px}
.style4 {	font-size: 18px;
	font-weight: bold;
}
.style5 {font-size: 18px}
.style9 {font-size: 14px; font-weight: bold; }
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

$dia = date('d');
$mes = date('m');
$ano = date('Y');
$datecadastro = "$ano-$mes-$dia";
$datacadastro = "$dia-$mes-$ano";
$horacadastro = date('H:i:s');

$nfantasia = $_POST['nfantasia'];
$historico = $_POST['historico'];
$categoria_conta = $_POST['categoria_conta'];
$valor = $_POST['valor'];
$departamento = $_POST['departamento'];
$cliente = $_POST['cliente'];
$modopagto = $_POST['modopagto'];
$num_cheque = $_POST['num_cheque'];


$dia_vencto = $_POST['dia_vencto'];
$mes_vencto = $_POST['mes_vencto'];
$ano_vencto = $_POST['ano_vencto'];

$vencto = "$ano_vencto-$mes_vencto-$dia_vencto";



$dia_evento = $_POST['dia_evento'];
$mes_evento = $_POST['mes_evento'];
$ano_evento = $_POST['ano_evento'];

$dateevento = "$ano_evento-$mes_evento-$dia_evento";


$hora_evento = $_POST['hora_evento'];
$minuto_evento = $_POST['minuto_evento'];
$segundo_evento = $_POST['segundo_evento'];


$horaevento = "$hora_evento:$minuto_evento:$segundo_evento";


$diapagto = $_POST['diapagto'];
$mespagto = $_POST['mespagto'];
$anopagto = $_POST['anopagto'];
$datepagto = "$anopagto-$mespagto-$diapagto";


$banco = $_POST['banco'];
$contacorrente = $_POST['contacorrente'];


$sql = "SELECT * FROM contas_bancarias where banco = '$banco' and contacorrente = '$contacorrente' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$agencia = $linha[2];
$tipoconta = $linha[4];

}


//dados do operador

$operador = $_POST['operador'];
$cel_operador = $_POST['cel_operador'];
$email_operador = $_POST['email_operador'];
$estabelecimento = $_POST['estabelecimento'];
$cidade_estabelecimento = $_POST['cidade_estabelecimento'];
$tel_estabelecimento = $_POST['tel_estabelecimento'];
$email_estabelecimento = $_POST['email_estabelecimento'];



?>

<?

	
$comando = "insert into contas_a_receber(valor_a_receber,dia,mes,ano,datacadastro,horacadastro,estabelecimento,historico,categoria_conta,datecadastro,nome,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,num_cheque,banco,agencia,contacorrente,tipoconta,departamento,dia_vencto,mes_vencto,ano_vencto,vencto,dia_evento,mes_evento,ano_evento,dateevento,hora_evento,minuto_evento,segundo_evento,horaevento,diapagto,mespagto,anopagto,datepagto,modopagto,quitacao,num_mensalidade) 



values('$valor','$dia','$mes','$ano','$datacadastro','$horacadastro','$nfantasia','$historico','$categoria_conta','$datecadastro','$cliente','$nome_op','$celular_op','$email_op','$estab_pertence_op','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$num_cheque','$banco','$agencia','$contacorrente','$tipoconta','$departamento','$dia_vencto','$mes_vencto','$ano_vencto','$vencto','$dia_evento','$mes_evento','$ano_evento','$dateevento','$hora_evento','$minuto_evento','$segundo_evento','$horaevento','$diapagto','$mespagto','$anopagto','$datepagto','$modopagto','$quitacao','0')";


mysql_query($comando,$conexao);


echo "<br> Lançamento do contas a preceber no valor de R$ $valor lançado com sucesso!!!!<br>";


?>




<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];

}
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_empresa;
	
	//PREPARA O PEDIDO
	$mens   =  "Olá! Foi registrado uma entrada no caixa da $nfantasia   \n";
	$mens  .=  "Verifique abaixo \n\n";
	
	$mens  .=  "Código do Aluno : ".$codigo_aluno."                                                    \n";
	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "Nome do Responsável: ".$nome_resp."                                                       \n";
	$mens  .=  "Curso : ".$curso."                                                    \n";
	$mens  .=  "Duração : ".$duracao."                                                    \n";
	$mens  .=  "Mensalide : R$ ".$mensalidade."                                                    \n";
	$mens  .=  "Vencimento: ".$vencto."                                                    \n";
	$mens  .=  "Valor Recebido: ".$valor_recebido."                                                    \n";
	$mens  .=  "Quitação : ".$quitacao."                                                    \n";
	$mens  .=  "Observações: ".$obs."                                                       \n";
	$mens  .=  "Data do registro: ".$datacadastro."                                                       \n";
	$mens  .=  "hora do registro: ".$horacadastro."                                                       \n";
	
	$mens  .=  "Operador que efetuou o cadastro: ".$operador."                                                    \n";
	$mens  .=  "Celular: ".$cel_operador."                                                    \n";
	$mens  .=  "E-Mail: ".$email_operador."                                                    \n";
	$mens  .=  "Estabelecimento: ".$estabelecimento."                                                    \n";
	$mens  .=  "Cidade: ".$cidade_estabelecimento."                                                    \n";
	$mens  .=  "Telefone: ".$tel_estabelecimento."                                                    \n";
	$mens  .=  "E-Mail: ".$email_estabelecimento."                                                    \n";

	
	//DISPARA O EMAIL
	//$envia  =  mail($email_dest, "Entrada no caixa da $nfantasia em ".$datacadastro, $mens,"From:".$email_dest."\r\nBcc:".$email);

?>
<table width="100%"  border="0">
  <tr>
    <td width="18%"><form name="form1" method="post" action="lancamento_entradas.php">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit2" value="Voltar">
    </form></td>
    <td width="2%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="34%">&nbsp;</td>
  </tr>
</table>
<p></p>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>