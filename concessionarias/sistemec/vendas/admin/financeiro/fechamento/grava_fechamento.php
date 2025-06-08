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
// dados do fechamento
$datacadastro = date('d-m-Y');
$horacadastro = date('H:i:s');
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$banco = $_POST['banco'];
$inss = $_POST['inss'];
$exercito = $_POST['exercito'];
$prefeitura = $_POST['prefeitura'];
$prefeitura_morro_agudo = $_POST['prefeitura_morro_agudo'];
$prefeitura_jardinopolis = $_POST['prefeitura_jardinopolis'];
$prefeitura_pat_paulista = $_POST['prefeitura_pat_paulista'];
$carro_bv = $_POST['carro_bv'];
$carro_omni = $_POST['carro_omni'];
$privado = $_POST['privado'];
$siape = $_POST['siape'];
$aeronautica = $_POST['aeronautica'];
$correios = $_POST['correios'];
$governo_minas_gerais = $_POST['governo_minas_gerais'];
$ipremo = $_POST['ipremo'];

$obs = $_POST['obs'];
$dia_ref = $_POST['dia_ref'];
$mes_ref = $_POST['mes_ref'];
$ano_ref = $_POST['ano_ref'];
$nf = $_POST['nf'];
$comissao = $_POST['comissao'];

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

$comando = "insert into fechamento(datacadastro,horacadastro,dia,mes,ano,banco,inss,exercito,prefeitura,obs,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,dia_ref,mes_ref,ano_ref,prefeitura_morro_agudo,prefeitura_jardinopolis,prefeitura_pat_paulista,carro_bv,carro_omni,privado,siape,aeronautica,correios,nf,comissao,governo_minas_gerais,ipremo) 
values
('$datacadastro','$horacadastro','$dia','$mes','$ano','$banco','$inss','$exercito','$prefeitura','$obs','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$dia_ref','$mes_ref','$ano_ref','$prefeitura_morro_agudo','$prefeitura_jardinopolis','$prefeitura_pat_paulista','$carro_bv','$carro_omni','$privado','$siape','$aeronautica','$correios','$nf','$comissao','$governo_minas_gerais','$ipremo')";

mysql_query($comando,$conexao) or die("Erro ao registrar fechamento!... Tente novamente");

echo "Fechamento resgistrado com sucesso!<br><br>";



$sql = "SELECT * FROM fechamento order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];
$datacadastro = $linha[1];
$horacadastro = $linha[2];
$dia = $linha[3];
$mes = $linha[4];
$ano = $linha[5];

$operador = $linha[6];
$cel_operador = $linha[7];
$email_operador = $linha[8];
$estabelecimento = $linha[9];
$cidade_estabelecimento = $linha[10];
$tel_estabelecimento = $linha[11];
$email_estabelecimento = $linha[12];

$operador_alterou = $linha[13];
$cel_operador_alterou = $linha[14];
$email_operador_alterou = $linha[15];
$estabelecimento_alterou = $linha[16];
$cidade_estabelecimento_alterou = $linha[17];
$tel_estabelecimento_alterou = $linha[18];
$email_estabelecimento_alterou = $linha[19];
$dataalteracao = $linha[20];
$horaalteracao = $linha[21];

$banco = $linha[22];
$inss = $linha[23];
$exercito = $linha[24];
$prefeitura = $linha[25];
$obs = $linha[26];
$dia_alteracao = $linha[27];
$mes_alteracao = $linha[28];
$ano_alteracao = $linha[29];
$dia_ref = $linha[30];
$mes_ref = $linha[31];
$ano_ref = $linha[32];

$prefeitura_morro_agudo = $linha[33];
$prefeitura_jardinopolis = $linha[34];
$prefeitura_pat_paulista = $linha[35];
$carro_bv = $linha[36];
$carro_omni = $linha[37];
$privado = $linha[38];
$siape = $linha[39];
$aeronautica = $linha[40];
$nf = $linha[41];
$comissao = $linha[42];
$correios = $linha[43];

}
?>




<?
$sql = "SELECT * FROM allcred limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];

}
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email_empresa;
	
	//PREPARA O PEDIDO
	$mens   =  "Olá Alessandra! Foi registrado uma entrada no caixa da $nfantasia   \n";
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
    <td width="18%"><form name="form1" method="post" action="inserir.php">
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
<table width="100%"  border="1">
  <tr>
    <td colspan="4"><div align="center" class="style1">Lan&ccedil;amento de Fechamento de m&ecirc;s n&ordm; <? echo $codigo; ?></div></td>
  </tr>
  <tr>
    <td width="23%"><span class="style4">Data do lan&ccedil;amento </span></td>
    <td width="18%"><span class="style9"><? echo $datacadastro; ?></span></td>
    <td width="23%"><span class="style4">Hora do lan&ccedil;amento </span></td>
    <td width="36%"><span class="style9"><? echo $horacadastro; ?></span></td>
  </tr>
  <tr>
    <td><span class="style4">Valor Comiss&atilde;o </span></td>
    <td><span class="style10"><span class="style9"><? echo "R$ ". $comissao; ?></span></span></td>
    <td><span class="style5"></span></td>
    <td><span class="style10"></span></td>
  </tr>
  <tr>
    <td><span class="style5"><strong>Banco</strong></span></td>
    <td><span class="style9"><? echo $banco; ?></span></td>
    <td><span class="style4">INSS</span></td>
    <td><span class="style9"><? echo $inss; ?></span></td>
  </tr>
  <tr>
    <td><span class="style4">Ex&eacute;rcito</span></td>
    <td><span class="style9"><? echo $exercito; ?></span></td>
    <td><span class="style4">Prefeitura Franca </span></td>
    <td><span class="style10"><span class="style9"><? echo $prefeitura; ?></span></span></td>
  </tr>
  <tr>
    <td><span class="style4">Prefeitura Morro Agudo </span></td>
    <td><span class="style9"><? echo $prefeitura_morro_agudo; ?></span></td>
    <td><span class="style4">Prefeitura Jardinopolis </span></td>
    <td><span class="style10"><span class="style9"><? echo $prefeitura_jardinopolis; ?></span></span></td>
  </tr>
  <tr>
    <td><span class="style4">Prefeitura Pat. Paulista </span></td>
    <td><span class="style9"><? echo $prefeitura_pat_paulista; ?></span></td>
    <td><span class="style4">Carro BV </span></td>
    <td><span class="style10"><span class="style9"><? echo $carro_bv; ?></span></span></td>
  </tr>
  <tr>
    <td><span class="style4">Carro OMNI </span></td>
    <td><span class="style9"><? echo $carro_omni; ?></span></td>
    <td><span class="style4">Privado</span></td>
    <td><span class="style10"><span class="style9"><? echo $privado; ?></span></span></td>
  </tr>
  <tr>
    <td><span class="style4">Correios</span></td>
    <td><span class="style9"><? echo $correios; ?></span></td>
    <td><span class="style4">Aeronautica</span></td>
    <td><span class="style10"><span class="style9"><? echo $aeronautica; ?></span></span></td>
  </tr>
  <tr>
    <td><span class="style4">Siape</span></td>
    <td><span class="style9"><? echo $siape; ?></span></td>
    <td><span class="style4">Nota Fiscal </span></td>
    <td><span class="style10"><span class="style9"><? echo $nf; ?></span></span></td>
  </tr>
  <tr>
    <td><span class="style5"><strong>Observa&ccedil;&otilde;es</strong></span></td>
    <td colspan="3"><span class="style9"><? echo $obs; ?></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><span class="style10"></span></td>
  </tr>
</table>
<p></p>
<table width="100%" border="1" cellspacing="4">
  <tr>
    <td colspan="2"><strong>Cadastro efetuado por <br>
    </strong><strong><font color="#0000FF"><? echo $operador; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
    <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>
            <? echo $email_operador; ?> </font><font color="#0000FF"> </font></strong></td>
    <td width="20%"><strong>Celular:<font color="#0000FF"><br>
            <? echo $cel_operador; ?> </font><font color="#0000FF"> </font></strong></td>
    <td width="1%">&nbsp;</td>
  </tr>
  <tr>
    <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>
        <strong><font color="#0000FF"><? echo $estabelecimento; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
    <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
            <? echo $tel_estabelecimento; ?> </font></strong></td>
    <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
            <? echo $email_estabelecimento; ?> </font><font color="#0000FF"> </font></strong></td>
    <td><strong>Cidade: <br>
          <font color="#0000FF"><? echo $cidade_estabelecimento; ?> </font></strong></td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>