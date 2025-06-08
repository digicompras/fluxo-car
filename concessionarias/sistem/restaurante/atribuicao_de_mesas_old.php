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
.style1 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}

.style10 {font-size: 16px;
	font-weight: bold;
	color: #FF0000;
}

.style11 {font-size: 16px;
	font-weight: bold;
	color: #0000FF;
}
.style111 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}

-->

</style>
</head>

<?



require '../../conect/conect.php';

$codigolancamento = $_POST['codigolancamento'];

$solicitacao = $_POST['solicitacao'];

//$setor = $_POST['setor'];


$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

  <?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];

$setor = $linha[43];

$estab_pertence = $linha[44];

}
?>


<?

if($solicitacao=="gravar_parcela"){

$pedido = $_POST['codigolancamento'];
$cod_cli_gravar = $_POST['cod_cli'];
$nome_gravar = $_POST['nome'];
$cpf_gravar = $_POST['cpf'];
$operador_gravar = $_POST['operador'];
$date = date('Y-m-d');
$hora = date('H:i:s');
$valor_parcela = $_POST['valor_parcela'];
$banco_a_ser_portado = $_POST['banco_a_ser_portado'];
$valor_liberado = $_POST['valor_liberado'];
$parcelas_em_aberto = $_POST['parcelas_em_aberto'];
$prazo_do_contrato = $_POST['prazo_do_contrato'];
$status = $_POST['status'];
$faixa_rco = $_POST['faixa_rco'];




$comando = "insert into parcelas_pedido_margem(pedido,cod_cli,nome,cpf,operador,date,hora,valor_parcela,banco_a_ser_portado,valor_liberado,parcelas_em_aberto,prazo_do_contrato,status,faixa_rco) values('$pedido','$cod_cli_gravar','$nome_gravar','$cpf_gravar','$operador_gravar','$date','$hora','$valor_parcela','$banco_a_ser_portado','$valor_liberado','$parcelas_em_aberto','$prazo_do_contrato','$status','$faixa_rco')";



mysql_query($comando,$conexao) or die("Erro ao gravar parcelas para esse pedido!");




}


?>



<?

if($solicitacao=="altera_parcela"){

$pedido = $_POST['pedido'];
$valor_parcela = $_POST['valor_parcela'];
$banco_a_ser_portado = $_POST['banco_a_ser_portado'];
$valor_liberado = $_POST['valor_liberado'];
$parcelas_em_aberto = $_POST['parcelas_em_aberto'];
$prazo_do_contrato = $_POST['prazo_do_contrato'];
$faixa_rco = $_POST['faixa_rco'];




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`parcelas_pedido_margem` set `valor_parcela` = '$valor_parcela',`banco_a_ser_portado` = '$banco_a_ser_portado',`valor_liberado` = '$valor_liberado',`parcelas_em_aberto` = '$parcelas_em_aberto',`prazo_do_contrato` = '$prazo_do_contrato',`faixa_rco` = '$faixa_rco' where `parcelas_pedido_margem`. `codigo` = '$pedido'";
}

mysql_query($comando,$conexao);




}


?>



<body bgcolor="#ffffff" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>

<?

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];


}


?>


        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>



      <form action="../index.php" method="post" name="form1" target="_top">
        <input type="submit" name="Submit" value="Voltar ao menu principal">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      </form>
      
      <?
//----------------------INICIO DA GRAVACAO E ENVIO PARA O OPERADOR--------------------

if($solicitacao=="gravar_troca_de_mesa"){
	
$codigo_orcamento = $_POST['codigo_orcamento'];

	
$mesa_anterior = $_POST['mesa_anterior'];
$mesa2_anterior = $_POST['mesa2_anterior'];
	
	
//----------------LIBERANDO MESAS------------------------

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`mesas` set `statusmesa` = 'LIVRE',`situacao` = '',`codigo_orcamento` = '' where `mesas`. `codigo_orcamento` = '$codigo_orcamento'";
}

mysql_query($comando,$conexao);





//-------------FIM DA LIBERAÇÃO DE MESAS-----------------

	
	
	
	
	

$mesa = $_POST['mesa'];
$mesa2 = $_POST['mesa2'];
$obs = $_POST['obs'];


if(empty($mesa)){
	
}
else{
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `mesa` = '$mesa',`mesa2` = '$mesa2',`obs` = '$obs' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`mesas` set `statusmesa` = 'OCUPADA',`situacao` = 'PRINCIPAL',`codigo_orcamento` = '$codigo_orcamento' where `mesas`. `mesa` = '$mesa'";
}

mysql_query($comando,$conexao);

}





if(empty($mesa2)){
	
}
else{

$sql = "SELECT * FROM mesas where mesa = '$mesa2'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$mesa = $linha[1];

}

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`mesas` set `statusmesa` = 'OCUPADA',`situacao` = 'ADJUNTA',`codigo_orcamento` = '$codigo_orcamento' where `mesas`. `mesa` = '$mesa2'";
}

mysql_query($comando,$conexao);


}


}






//---------------------FIM DA GRAVACAO E ENVIO PARA O OPERADOR------------------------
?>      
      
  <?
//----------------------INICIO DA GRAVACAO E ENVIO PARA O OPERADOR--------------------

if($solicitacao=="gravar_atribuicao"){

$codigo_orcamento = $_POST['codigo_orcamento'];
$mesa = $_POST['mesa'];
$mesa2 = $_POST['mesa2'];
$obs = $_POST['obs'];


if(empty($mesa)){
	
}
else{
	
$hora_acomodacao = date('H:i:s');
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `mesa` = '$mesa',`mesa2` = '$mesa2',`hora_acomodacao` = '$hora_acomodacao',`obs` = '$obs' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`mesas` set `statusmesa` = 'OCUPADA',`situacao` = 'PRINCIPAL',`codigo_orcamento` = '$codigo_orcamento' where `mesas`. `mesa` = '$mesa'";
}

mysql_query($comando,$conexao);

}





if(empty($mesa2)){
	
}
else{

$sql = "SELECT * FROM mesas where mesa = '$mesa2'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$mesa = $linha[1];

}

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`mesas` set `statusmesa` = 'OCUPADA',`situacao` = 'ADJUNTA',`codigo_orcamento` = '$codigo_orcamento' where `mesas`. `mesa` = '$mesa2'";
}

mysql_query($comando,$conexao);


}


}






//---------------------FIM DA GRAVACAO E ENVIO PARA O OPERADOR------------------------
?>
        
        
        <?

//$nome_operador = $_POST['nome_operador'];

//$data_inicial = $_POST['data_inicial'];

//$data_final = $_POST['data_final'];




$sql = "SELECT * FROM orcamentos where status = 'Aberto' and mesa = ''";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}
?>
        
        <?

$sql = "SELECT * FROM cad_empresa limit 1";

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
      <table width="100%"  border="0" align="center">
        <tr>
          <td colspan="5"><div align="center"><span class="style2">
          
            Clientes aguardando mesa para almo&ccedil;o da empresa:</span> <span class="style2"><? echo $nfantasia; ?>
              
            </span></div></td>
        </tr>
        <tr>
          <td width="20%"><div align="center">Total de Clientes aguardando mesa</div></td>
          <td width="26%"><strong><? echo " $registros";?></strong></td>
          <td width="14%"><? echo " $solicitacao";?></td>
          <td width="18%">&nbsp;</td>
          <td width="22%">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5"><div align="center"><? echo "<span class='style10'>MAPA DE MESAS</span>"; ?></div>            <div align="center"></div>            <div align="center"></div></td>
        </tr>
      </table>
<table width="100%" border="0">
        <tr>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            
<?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '01' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento1 = $linha[0];
$codigo_cliente1 = $linha[25];


$mesa01 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '01'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao1 = $linha[3];

}

if(empty($mesa01)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '01' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento1 = $linha[0];
$codigo_cliente1 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>          
            
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente1; ?>">
<input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento1; ?>">
<?
if($situacao1=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa01'></span>";
}
else{
	
if($situacao1=="ADJUNTA"){
	
echo "<span class='style10'>MESA 01/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 01/LIVRE</span>";
	
}
	
}

?>
            
            </form>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '02' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento2 = $linha[0];
$codigo_cliente2 = $linha[25];


$mesa02 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '02'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao02 = $linha[3];

}

if(empty($mesa02)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '02' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento2 = $linha[0];
$codigo_cliente2 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente2; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento2; ?>">
              <?
if($situacao02=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa02'></span>";
}
else{
	
if($situacao02=="ADJUNTA"){
	
echo "<span class='style10'>MESA 02/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 02/LIVRE</span>";
	
}
	
}
?>
            </form>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '03' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento3 = $linha[0];
$codigo_cliente3 = $linha[25];


$mesa03 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '03'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao03 = $linha[3];

}

if(empty($mesa03)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '03' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento3 = $linha[0];
$codigo_cliente3 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente3; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento3; ?>">
              <?
if($situacao03=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa03'></span>";
}
else{
	
if($situacao03=="ADJUNTA"){

echo "<span class='style10'>MESA 03/J-$juntocomamesa</span>";

}
else{
echo "<span class='style11'>MESA 03/LIVRE</span>";
}
	
}
?>
            </form>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '04' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento4 = $linha[0];
$codigo_cliente4 = $linha[25];


$mesa04 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '04'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao04 = $linha[3];

}

if(empty($mesa04)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '04' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento4 = $linha[0];
$codigo_cliente4 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente4; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento4; ?>">
              <?
if($situacao04=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa04'></span>";
}
else{
	
if($situacao04=="ADJUNTA"){

echo "<span class='style10'>MESA 04/J-$juntocomamesa</span>";

}
else{
echo "<span class='style11'>MESA 04/LIVRE</span>";
}
	
}
?>
            </form>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '05' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento5 = $linha[0];
$codigo_cliente5 = $linha[25];


$mesa05 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '05'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao05 = $linha[3];

}

if(empty($mesa05)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '05' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento5 = $linha[0];
$codigo_cliente5 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente5; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento5; ?>">
              <?
if($situacao05=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa05'></span>";
}
else{
	
if($situacao05=="ADJUNTA"){

echo "<span class='style10'>MESA 05/J-$juntocomamesa</span>";

}
else{
echo "<span class='style11'>MESA 05/LIVRE</span>";
}
	
}
?>
            </form>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '06' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros6 = mysql_num_rows($res);


$codigo_orcamento6 = $linha[0];
$codigo_cliente6 = $linha[25];


$mesa06 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '06'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao06 = $linha[3];

}

if(empty($mesa06)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '06' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


//$codigo_orcamento6 = $linha[0];
//$codigo_cliente6 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente6; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento6; ?>">
              <?
if($situacao06=="PRINCIPAL"){

echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa06'></span>";

}
else{
	
if($situacao06=="ADJUNTA"){

echo "<span class='style10'>MESA 06/J-$juntocomamesa</span>";

}
else{
echo "<span class='style11'>MESA 06/LIVRE</span>";
}
	
}
?>
            </form>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '07' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento7 = $linha[0];
$codigo_cliente7 = $linha[25];


$mesa07 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '07'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao07 = $linha[3];

}

if(empty($mesa07)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '07' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento7 = $linha[0];
$codigo_cliente7 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente7; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento7; ?>">
              <?
if($situacao07=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa07'></span>";
}
else{
	
if($situacao07=="ADJUNTA"){

echo "<span class='style10'>MESA 07/J-$juntocomamesa</span>";

}
else{
echo "<span class='style11'>MESA 07/LIVRE</span>";
}
	
}
?>
            </form>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '08' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento8 = $linha[0];
$codigo_cliente8 = $linha[25];


$mesa08 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '08'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao08 = $linha[3];

}

if(empty($mesa08)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '08' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento8 = $linha[0];
$codigo_cliente8 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente8; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento8; ?>">
              <?
if($situacao08=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa08'></span>";
}
else{
	
if($situacao08=="ADJUNTA"){

echo "<span class='style10'>MESA 08/J-$juntocomamesa</span>";

}
else{
echo "<span class='style11'>MESA 08/LIVRE</span>";
}
	
}
?>
            </form>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '09' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento9 = $linha[0];
$codigo_cliente9 = $linha[25];


$mesa09 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '09'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao09 = $linha[3];

}

if(empty($mesa09)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '09' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento9 = $linha[0];
$codigo_cliente9 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente9; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento9; ?>">
              <?
if($situacao09=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa09'></span>";
}
else{
	
if($situacao09=="ADJUNTA"){

echo "<span class='style10'>MESA 09/J-$juntocomamesa</span>";

}
else{
echo "<span class='style11'>MESA 09/LIVRE</span>";
}
	
}
?>
            </form>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '10' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento10 = $linha[0];
$codigo_cliente10 = $linha[25];


$mesa10 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '10'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao10 = $linha[3];

}

if(empty($mesa10)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '10' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento10 = $linha[0];
$codigo_cliente10 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente10; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento10; ?>">
              <?
if($situacao10=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa10'></span>";
}
else{
	
if($situacao10=="ADJUNTA"){

echo "<span class='style10'>MESA 10/J-$juntocomamesa</span>";

}
else{
echo "<span class='style11'>MESA 10/LIVRE</span>";
}
	
}
?>
            </form>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '11' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento11 = $linha[0];
$codigo_cliente11 = $linha[25];


$mesa11 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '11'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao11 = $linha[3];

}

if(empty($mesa11)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '11' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento11 = $linha[0];
$codigo_cliente11 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente11; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento11; ?>">
              <?
if($situacao11=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa11'></span>";
}
else{
	
if($situacao11=="ADJUNTA"){
	
echo "<span class='style10'>MESA 11/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 11/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '12' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento12 = $linha[0];
$codigo_cliente12 = $linha[25];


$mesa12 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '12'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao12 = $linha[3];

}

if(empty($mesa12)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '12' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento12 = $linha[0];
$codigo_cliente12 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente12; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento12; ?>">
              <?
if($situacao12=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa12'></span>";
}
else{
	
if($situacao12=="ADJUNTA"){
	
echo "<span class='style10'>MESA 12/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 12/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '13' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento13 = $linha[0];
$codigo_cliente13 = $linha[25];


$mesa13 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '13'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao13 = $linha[3];

}

if(empty($mesa13)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '13' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento13 = $linha[0];
$codigo_cliente13 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente13; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento13; ?>">
              <?
if($situacao13=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa13'></span>";
}
else{
	
if($situacao13=="ADJUNTA"){
	
echo "<span class='style10'>MESA 13/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 13/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '14' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento14 = $linha[0];
$codigo_cliente14 = $linha[25];


$mesa14 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '14'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao14 = $linha[3];

}

if(empty($mesa14)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '14' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento14 = $linha[0];
$codigo_cliente14 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente14; ?>">
              <input name="codigo_orcamento4" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento14; ?>">
              <?
if($situacao14=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa14'></span>";
}
else{
	
if($situacao14=="ADJUNTA"){
	
echo "<span class='style10'>MESA 14/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 14/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '15' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento15 = $linha[0];
$codigo_cliente15 = $linha[25];


$mesa15 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '15'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao15 = $linha[3];

}

if(empty($mesa15)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '15' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento15 = $linha[0];
$codigo_cliente15 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente15; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento15; ?>">
              <?
if($situacao15=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa15'></span>";
}
else{
	
if($situacao15=="ADJUNTA"){
	
echo "<span class='style10'>MESA 15/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 15/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '16' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento16 = $linha[0];
$codigo_cliente16 = $linha[25];


$mesa16 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '16'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao16 = $linha[3];

}

if(empty($mesa16)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '16' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento16 = $linha[0];
$codigo_cliente16 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente16; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento16; ?>">
              <?
if($situacao16=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa16'></span>";
}
else{
	
if($situacao16=="ADJUNTA"){
	
echo "<span class='style10'>MESA 16/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 16/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '17' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento17 = $linha[0];
$codigo_cliente17 = $linha[25];


$mesa17 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '17'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao17 = $linha[3];

}

if(empty($mesa17)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '17' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento17 = $linha[0];
$codigo_cliente17 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente17; ?>">
              <input name="codigo_orcamento7" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento17; ?>">
              <?
if($situacao17=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa17'></span>";
}
else{
	
if($situacao17=="ADJUNTA"){
	
echo "<span class='style10'>MESA 17/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 17/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '18' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento18 = $linha[0];
$codigo_cliente18 = $linha[25];


$mesa18 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '18'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao18 = $linha[3];

}

if(empty($mesa18)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '18' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento18 = $linha[0];
$codigo_cliente18 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente18; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento18; ?>">
              <?
if($situacao18=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa18'></span>";
}
else{
	
if($situacao18=="ADJUNTA"){
	
echo "<span class='style10'>MESA 18/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 18/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '19' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento19 = $linha[0];
$codigo_cliente19 = $linha[25];


$mesa19 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '19'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao19 = $linha[3];

}

if(empty($mesa19)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '19' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento19 = $linha[0];
$codigo_cliente19 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente19; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento19; ?>">
              <?
if($situacao19=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa19'></span>";
}
else{
	
if($situacao19=="ADJUNTA"){
	
echo "<span class='style10'>MESA 19/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 19/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '20' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento20 = $linha[0];
$codigo_cliente20 = $linha[25];


$mesa20 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '20'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao20 = $linha[3];

}

if(empty($mesa20)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '20' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento20 = $linha[0];
$codigo_cliente20 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente20; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento20; ?>">
              <?
if($situacao20=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa20'></span>";
}
else{
	
if($situacao20=="ADJUNTA"){
	
echo "<span class='style10'>MESA 20/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 20/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '21' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento21 = $linha[0];
$codigo_cliente21 = $linha[25];


$mesa21 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '21'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao21 = $linha[3];

}

if(empty($mesa21)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '21' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento21 = $linha[0];
$codigo_cliente21 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente21; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento21; ?>">
              <?
if($situacao21=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa21'></span>";
}
else{
	
if($situacao21=="ADJUNTA"){
	
echo "<span class='style10'>MESA 21/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 21/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '22' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento22 = $linha[0];
$codigo_cliente22 = $linha[25];


$mesa22 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '22'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao22 = $linha[3];

}

if(empty($mesa22)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '22' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento22 = $linha[0];
$codigo_cliente22 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente22; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento22; ?>">
              <?
if($situacao22=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa22'></span>";
}
else{
	
if($situacao22=="ADJUNTA"){
	
echo "<span class='style10'>MESA 22/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 22/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '23' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento23 = $linha[0];
$codigo_cliente23 = $linha[25];


$mesa23 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '23'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao23 = $linha[3];

}

if(empty($mesa23)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '23' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento23 = $linha[0];
$codigo_cliente23 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente23; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento23; ?>">
              <?
if($situacao23=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa23'></span>";
}
else{
	
if($situacao23=="ADJUNTA"){
	
echo "<span class='style10'>MESA 23/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 23/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '24' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento24 = $linha[0];
$codigo_cliente24 = $linha[25];


$mesa24 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '24'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao24 = $linha[3];

}

if(empty($mesa24)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '24' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento24 = $linha[0];
$codigo_cliente24 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente24; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento24; ?>">
              <?
if($situacao24=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa24'></span>";
}
else{
	
if($situacao24=="ADJUNTA"){
	
echo "<span class='style10'>MESA 24/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 24/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '25' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento25 = $linha[0];
$codigo_cliente25 = $linha[25];


$mesa25 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '25'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao25 = $linha[3];

}

if(empty($mesa25)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '25' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento25 = $linha[0];
$codigo_cliente25 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente25; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento25; ?>">
              <?
if($situacao25=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa25'></span>";
}
else{
	
if($situacao25=="ADJUNTA"){
	
echo "<span class='style10'>MESA 25/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 25/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '26' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento26 = $linha[0];
$codigo_cliente26 = $linha[25];


$mesa26 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '26'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao26 = $linha[3];

}

if(empty($mesa26)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '26' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento26 = $linha[0];
$codigo_cliente26 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente26; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento26; ?>">
              <?
if($situacao26=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa26'></span>";
}
else{
	
if($situacao26=="ADJUNTA"){
	
echo "<span class='style10'>MESA 26/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 26/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '27' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento27 = $linha[0];
$codigo_cliente27 = $linha[25];


$mesa27 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '27'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao27 = $linha[3];

}

if(empty($mesa27)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '27' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento27 = $linha[0];
$codigo_cliente27 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente27; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento27; ?>">
              <?
if($situacao27=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa27'></span>";
}
else{
	
if($situacao27=="ADJUNTA"){
	
echo "<span class='style10'>MESA 27/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 27/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '28' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento28 = $linha[0];
$codigo_cliente28 = $linha[25];


$mesa28 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '28'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao28 = $linha[3];

}

if(empty($mesa28)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '28' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento28 = $linha[0];
$codigo_cliente28 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente28; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento28; ?>">
              <?
if($situacao28=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa28'></span>";
}
else{
	
if($situacao28=="ADJUNTA"){
	
echo "<span class='style10'>MESA 28/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 28/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '29' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento29 = $linha[0];
$codigo_cliente29 = $linha[25];


$mesa29 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '29'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao29 = $linha[3];

}

if(empty($mesa29)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '29' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento29 = $linha[0];
$codigo_cliente29 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente29; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento29; ?>">
              <?
if($situacao29=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa29'></span>";
}
else{
	
if($situacao29=="ADJUNTA"){
	
echo "<span class='style10'>MESA 29/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 29/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '30' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento30 = $linha[0];
$codigo_cliente30 = $linha[25];


$mesa30 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '30'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao30 = $linha[3];

}

if(empty($mesa30)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '30' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento30 = $linha[0];
$codigo_cliente30 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente30; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento30; ?>">
              <?
if($situacao30=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa30'></span>";
}
else{
	
if($situacao30=="ADJUNTA"){
	
echo "<span class='style10'>MESA 30/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 30/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '31' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento31 = $linha[0];
$codigo_cliente31 = $linha[25];


$mesa31 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '31'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao31 = $linha[3];

}

if(empty($mesa31)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '31' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento31 = $linha[0];
$codigo_cliente31 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente31; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento31; ?>">
              <?
if($situacao31=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa31'></span>";
}
else{
	
if($situacao31=="ADJUNTA"){
	
echo "<span class='style10'>MESA 31/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 31/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '32' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento32 = $linha[0];
$codigo_cliente32 = $linha[25];


$mesa32 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '32'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao32 = $linha[3];

}

if(empty($mesa32)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '32' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento32 = $linha[0];
$codigo_cliente32 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente32; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento32; ?>">
              <?
if($situacao32=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa32'></span>";
}
else{
	
if($situacao32=="ADJUNTA"){
	
echo "<span class='style10'>MESA 32/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 32/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '33' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento33 = $linha[0];
$codigo_cliente33 = $linha[25];


$mesa33 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '33'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao33 = $linha[3];

}

if(empty($mesa33)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '33' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento33 = $linha[0];
$codigo_cliente33 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente33; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento33; ?>">
              <?
if($situacao33=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa33'></span>";
}
else{
	
if($situacao33=="ADJUNTA"){
	
echo "<span class='style10'>MESA 33/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 33/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '34' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento34 = $linha[0];
$codigo_cliente34 = $linha[25];


$mesa34 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '34'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao34 = $linha[3];

}

if(empty($mesa34)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '34' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento34 = $linha[0];
$codigo_cliente34 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente34; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento34; ?>">
              <?
if($situacao34=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa34'></span>";
}
else{
	
if($situacao34=="ADJUNTA"){
	
echo "<span class='style10'>MESA 34/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 34/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '35' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento35 = $linha[0];
$codigo_cliente35 = $linha[25];


$mesa35 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '35'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao35 = $linha[3];

}

if(empty($mesa35)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '35' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento35 = $linha[0];
$codigo_cliente35 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente35; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento35; ?>">
              <?
if($situacao35=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa35'></span>";
}
else{
	
if($situacao35=="ADJUNTA"){
	
echo "<span class='style10'>MESA 35/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 35/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '36' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento36 = $linha[0];
$codigo_cliente36 = $linha[25];


$mesa36 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '36'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao36 = $linha[3];

}

if(empty($mesa36)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '36' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento36 = $linha[0];
$codigo_cliente36 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente36; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento36; ?>">
              <?
if($situacao36=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa36'></span>";
}
else{
	
if($situacao36=="ADJUNTA"){
	
echo "<span class='style10'>MESA 36/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 36/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '37' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento37 = $linha[0];
$codigo_cliente37 = $linha[25];


$mesa37 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '37'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao37 = $linha[3];

}

if(empty($mesa37)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '37' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento37 = $linha[0];
$codigo_cliente37 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente37; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento37; ?>">
              <?
if($situacao37=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa37'></span>";
}
else{
	
if($situacao37=="ADJUNTA"){
	
echo "<span class='style10'>MESA 37/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 37/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '38' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento38 = $linha[0];
$codigo_cliente38 = $linha[25];


$mesa38 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '38'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao38 = $linha[3];

}

if(empty($mesa38)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '38' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento38 = $linha[0];
$codigo_cliente38 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente38; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento38; ?>">
              <?
if($situacao38=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa38'></span>";
}
else{
	
if($situacao38=="ADJUNTA"){
	
echo "<span class='style10'>MESA 38/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 38/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '39' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento39 = $linha[0];
$codigo_cliente39 = $linha[25];


$mesa39 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '39'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao39 = $linha[3];

}

if(empty($mesa39)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '39' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento39 = $linha[0];
$codigo_cliente39 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente39; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento39; ?>">
              <?
if($situacao39=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa39'></span>";
}
else{
	
if($situacao39=="ADJUNTA"){
	
echo "<span class='style10'>MESA 39/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 39/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '40' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento40 = $linha[0];
$codigo_cliente40 = $linha[25];


$mesa40 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '40'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao40 = $linha[3];

}

if(empty($mesa40)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '40' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento40 = $linha[0];
$codigo_cliente40 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente40; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento40; ?>">
              <?
if($situacao40=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa40'></span>";
}
else{
	
if($situacao40=="ADJUNTA"){
	
echo "<span class='style10'>MESA 40/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 40/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '41' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento41 = $linha[0];
$codigo_cliente41 = $linha[25];


$mesa41 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '41'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao41 = $linha[3];

}

if(empty($mesa41)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '41' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento41 = $linha[0];
$codigo_cliente41 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente41; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento41; ?>">
              <?
if($situacao41=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa41'></span>";
}
else{
	
if($situacao41=="ADJUNTA"){
	
echo "<span class='style10'>MESA 41/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 41/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '42' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento42 = $linha[0];
$codigo_cliente42 = $linha[25];


$mesa42 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '42'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao42 = $linha[3];

}

if(empty($mesa42)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '42' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento42 = $linha[0];
$codigo_cliente42 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente42; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento42; ?>">
              <?
if($situacao42=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa42'></span>";
}
else{
	
if($situacao42=="ADJUNTA"){
	
echo "<span class='style10'>MESA 42/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 42/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '43' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento43 = $linha[0];
$codigo_cliente43 = $linha[25];


$mesa43 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '43'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao43 = $linha[3];

}

if(empty($mesa43)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '43' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento43 = $linha[0];
$codigo_cliente43 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente43; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento43; ?>">
              <?
if($situacao43=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa43'></span>";
}
else{
	
if($situacao43=="ADJUNTA"){
	
echo "<span class='style10'>MESA 43/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 43/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '44' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento44 = $linha[0];
$codigo_cliente44 = $linha[25];


$mesa44 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '44'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao44 = $linha[3];

}

if(empty($mesa44)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '44' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento44 = $linha[0];
$codigo_cliente44 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente44; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento44; ?>">
              <?
if($situacao44=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa44'></span>";
}
else{
	
if($situacao44=="ADJUNTA"){
	
echo "<span class='style10'>MESA 44/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 44/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '45' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento45 = $linha[0];
$codigo_cliente45 = $linha[25];


$mesa45 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '45'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao45 = $linha[3];

}

if(empty($mesa45)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '45' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento45 = $linha[0];
$codigo_cliente45 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente45; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento45; ?>">
              <?
if($situacao45=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa45'></span>";
}
else{
	
if($situacao45=="ADJUNTA"){
	
echo "<span class='style10'>MESA 45/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 45/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '46' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento46 = $linha[0];
$codigo_cliente46 = $linha[25];


$mesa46 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '46'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao46 = $linha[3];

}

if(empty($mesa46)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '46' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento46 = $linha[0];
$codigo_cliente46 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente46; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento46; ?>">
              <?
if($situacao46=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa46'></span>";
}
else{
	
if($situacao46=="ADJUNTA"){
	
echo "<span class='style10'>MESA 46/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 46/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '47' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento47 = $linha[0];
$codigo_cliente47 = $linha[25];


$mesa47 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '47'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao47 = $linha[3];

}

if(empty($mesa47)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '47' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento47 = $linha[0];
$codigo_cliente47 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente47; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento47; ?>">
              <?
if($situacao47=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa47'></span>";
}
else{
	
if($situacao47=="ADJUNTA"){
	
echo "<span class='style10'>MESA 47/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 47/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '48' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento48 = $linha[0];
$codigo_cliente48 = $linha[25];


$mesa48 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '48'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao48 = $linha[3];

}

if(empty($mesa48)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '48' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento48 = $linha[0];
$codigo_cliente48 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente48; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento48; ?>">
              <?
if($situacao48=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa48'></span>";
}
else{
	
if($situacao48=="ADJUNTA"){
	
echo "<span class='style10'>MESA 48/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 48/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '49' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento49 = $linha[0];
$codigo_cliente49 = $linha[25];


$mesa49 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '49'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao49 = $linha[3];

}

if(empty($mesa49)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '49' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento49 = $linha[0];
$codigo_cliente49 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente49; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento49; ?>">
              <?
if($situacao49=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa49'></span>";
}
else{
	
if($situacao49=="ADJUNTA"){
	
echo "<span class='style10'>MESA 49/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 49/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <form name="form3" method="post" action="../orcamentos/orcamento.php">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <?            
            
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa = '50' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento50 = $linha[0];
$codigo_cliente50 = $linha[25];


$mesa50 = $linha[46];
$mesa2 = $linha[47];

}


$sql = "SELECT * FROM mesas where mesa = '50'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$situacao50 = $linha[3];

}

if(empty($mesa50)){
	
	
$sql = "SELECT * FROM orcamentos where status = 'Aberto' and status_conta = 'Aberto' and mesa2 = '50' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento50 = $linha[0];
$codigo_cliente50 = $linha[25];


$juntocomamesa = $linha[46];

}

}
            
?>
              <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente50; ?>">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento50; ?>">
              <?
if($situacao50=="PRINCIPAL"){
echo "<span class='style10'><input type='submit' name='button3' id='button3' value='MESA $mesa50'></span>";
}
else{
	
if($situacao50=="ADJUNTA"){
	
echo "<span class='style10'>MESA 50/J-$juntocomamesa</span>";

}
else{
	
echo "<span class='style11'>MESA 50/LIVRE</span>";
	
}
	
}

?>
            </form>
          </div></td>
        </tr>
</table>
<form name="form1" method="post" action="atribuicao_de_mesas.php">
  <?
if($solicitacao =="trocar_mesa"){
	
$codigo_orcamento = $_POST['codigolancamento'];
$mesa = $_POST['mesa'];
$mesa2 = $_POST['mesa2'];


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
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

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `operador_restaurante` = '$nome_op' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento'";
}

mysql_query($comando,$conexao);



	
	
	
$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento' and status = 'Aberto' and mesa = '$mesa' and mesa2 = '$mesa2' order by codigo_orcamento asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];

$codigo_cliente = $linha[25];

$nome = $linha[27];

$dataabertura = $linha[1];

$horaabertura = $linha[2];

$operador_bilheteria = $linha[12];


$status = $linha[19];

$mesa = $linha[46];
$mesa2 = $linha[47];
$mesa3 = $linha[48];

$operador_restaurante = $linha[49];




$sql2 = "SELECT * FROM clientes where codigo = '$cod_cli'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {



$categoria = $linha[134];

}
?>
  <table width="100%" border="0">
    <tr>
      <td colspan="2">Pedido N&ordm; <? echo $codigolancamento; ?>
        <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigolancamento; ?>"></td>
      <td width="16%">Data / Hora <? echo "$dataabertura - $horaabertura"; ?></td>
      <td width="18%">Bilheteria: <? echo "$operador_bilheteria"; ?></td>
      <td>Restaurante: <? echo "$operador_restaurante"; ?></td>
      <td>&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
      <td width="1%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">Cliente: <? echo $nome; ?></td>
      <td>Mesa
        <select name="mesa" id="mesa2">
          <option selected><? echo $mesa; ?></option>
          <?





    $sql = "select * from mesas where statusmesa = 'LIVRE' order by mesa asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mesa']."</option>";

    }

?>
        </select>
        <input name="mesa_anterior" type="hidden" id="mesa_anterior" value="<? echo $mesa; ?>"></td>
      <td colspan="3">Juntar Mesa:
        <select name="mesa2" id="mesa2">
          <option selected><? echo $mesa2; ?></option>
          <option></option>

          <?





    $sql = "select * from mesas where statusmesa = 'LIVRE' order by mesa asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mesa']."</option>";

    }

?>
        </select>
        <input name="mesa2_anterior" type="hidden" id="mesa2_anterior" value="<? echo $mesa2; ?>"></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="10%">Observa&ccedil;&otilde;es</td>
      <td colspan="3"><textarea name="obs2" cols="45" rows="3"  id="obs2"><? echo $obs; ?> </textarea>
        <input type="submit" name="Submit3" value="Efetivar troca de Mesa">
        <input name="solicitacao" type="hidden" id="solicitacao" value="gravar_troca_de_mesa">
        <input name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
        <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
        <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
        <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input name="operador" type="hidden" id="operador" value="<? echo $operador; ?>"></td>
      <td width="34%">&nbsp;</td>
      <td width="4%">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <? } 

}
?>
</form>
<form name="form1" method="post" action="atribuicao_de_mesas.php">
  <?
if($solicitacao =="atribuir_mesa"){
	
$codigo_orcamento = $_POST['codigolancamento'];


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
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

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `operador_restaurante` = '$nome_op' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento'";
}

mysql_query($comando,$conexao);



	
	
	
$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento' and status = 'Aberto' and mesa = '' order by codigo_orcamento asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];

$codigo_cliente = $linha[25];

$nome = $linha[27];

$dataabertura = $linha[1];

$horaabertura = $linha[2];

$operador_bilheteria = $linha[12];


$status = $linha[19];

$mesa = $linha[46];
$mesa2 = $linha[47];
$mesa3 = $linha[48];

$operador_restaurante = $linha[49];




$sql2 = "SELECT * FROM clientes where codigo = '$cod_cli'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {



$categoria = $linha[134];

}
?>


<table width="100%" border="0">
  <tr>
    <td colspan="2">Pedido Nº <? echo $codigolancamento; ?>
      <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigolancamento; ?>"></td>
    <td width="16%">Data / Hora <? echo "$dataabertura - $horaabertura"; ?></td>
    <td width="18%">Bilheteria: <? echo "$operador_bilheteria"; ?></td>
    <td>Restaurante: <? echo "$operador_restaurante"; ?></td>
    <td>&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">Cliente: <? echo $nome; ?></td>
    <td>Mesa
      <select name="mesa" id="select3">
        <option selected><? echo $mesa; ?></option>
        <?





    $sql = "select * from mesas where statusmesa = 'LIVRE' order by mesa asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mesa']."</option>";

    }

?>
      </select></td>
    <td colspan="3">Juntar Mesa:
      <select name="mesa2" id="mesa">
        <option selected><? echo $mesa2; ?></option>
        <?





    $sql = "select * from mesas where statusmesa = 'LIVRE' order by mesa asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mesa']."</option>";

    }

?>
      </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="10%">Observa&ccedil;&otilde;es</td>
    <td colspan="3"><textarea name="obs" cols="45" rows="3"  id="obs"><? echo $obs; ?> </textarea>
      <input type="submit" name="Submit2" value="Atribuir Mesa">
      <input name="solicitacao" type="hidden" id="solicitacao" value="gravar_atribuicao">
      <input name="codigo_orcamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
      <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
      <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input name="operador" type="hidden" id="operador" value="<? echo $operador; ?>"></td>
    <td width="34%">&nbsp;</td>
    <td width="4%">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<? } 

}
?>
</form>

<table width="100%" border="0">
  <tr>
    <td colspan="5"><div align="center">
      <form name="form1" method="post" action="margem_a_verificar.php">
        <input name="solicitacao" type="hidden" id="solicitacao" value="incluir_parcela">
        <input name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
      </form>
    </div></td>
  </tr>
<?
if($solicitacao == "incluir_parcela"){
	
echo "<table width='100%' border='0'>
<tr>
	<td><div align='center'>Valor Parcela</div></td>
    <td><div align='center'>Banco a ser Portado</div></td>
    <td><div align='center'>Valor Liberado</div></td>
    <td><div align='center'>Parcelas em Aberto</div></td>
    <td><div align='center'>Prazo do contrato</div></td>
    <td><div align='center'>Faixa RCO</div></td>
</tr>";
echo "<form name='form1' method='post' action='margem_a_verificar.php'>

  <tr>
    <td><div align='center'>
      <input name='solicitacao' type='hidden' id='solicitacao' value='gravar_parcela'>
      <input name='codigolancamento' type='hidden' id='codigolancamento' value='$codigolancamento'>
      <input name='cod_cli' type='hidden' id='cod_cli' value='$cod_cli'>
      <input name='status' type='hidden' id='status' value='A VERIFICAR'></div></td>
    
  </tr>
  
  <tr>
    <td><div align='center'><input name='valor_parcela' type='text' id='valor_parcela' value=''></div></td>
    <td><div align='center'><input name='banco_a_ser_portado' type='text' id='banco_a_ser_portado' value=''></div></td>
    <td><div align='center'><input name='valor_liberado' type='text' id='valor_liberado' value=''></div></td>
    <td><div align='center'><input name='parcelas_em_aberto' type='text' id='parcelas_em_aberto' value=''></div></td>
    <td><div align='center'><input name='prazo_do_contrato' type='text' id='prazo_do_contrato' value=''></div></td>
    <td><div align='center'><input name='faixa_rco' type='text' id='faixa_rco' value=''></div></td>
	<td><div align='center'><input type='submit' name='Submit2' value='Gravar Parcela'></div></td>
  </tr>
  </form>";
  
}

?>
</table>
<p align="center">
  <?
  
if(($solicitacao == "abrir") or ($solicitacao == "incluir_parcela") or ($solicitacao == "editar") or ($solicitacao == "altera_parcela") or ($solicitacao == "gravar_parcela")){
	
	
}
else{

$sql = "SELECT * FROM orcamentos where status = 'Aberto' and mesa = '' order by dataabertura,horaabertura asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];

$dataabertura = $linha[1];

$horaabertura = $linha[2];

$nome = $linha[27];








?>
</p>
<table width="100%"  border="0">

        <tr bgcolor="#ffffff">

          <td><div align="center" class="style3"><span class="style11"><strong>N&ordm; Pedido</strong></span></div></td>
          <td><div align="center" class="style3"><span class="style11"><strong>Nome</strong></span></div></td>
          <td><div align="center" class="style3"><span class="style11"><strong>Data</strong></span></div></td>
          <td><div align="center" class="style3"><span class="style11"><strong>Hora</strong></span></div>            </td>
  </tr>

		

        <tr>

          <td width="10%">               <form name="form2" method="post" action="atribuicao_de_mesas.php">
            <div align="center" class="style3">

              <span class="style11">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <input name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
            <input name="codigo_abrir" type="hidden" id="codigo_abrir" value="<? echo $cod_cli; ?>">
            <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "atribuir_mesa"; ?>">
            <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
            <input type="submit" name="button" id="button" value="<? echo $codigolancamento; ?>">
            </span></div>
          </form></td>
          <td width="5%"><div align="center"><span class="style11"><? echo $nome;?></span></div></td>
          <td width="7%"><div align="center"><span class="style11"><? echo $dataabertura;?></span></div></td>
          <td width="7%">

          <div align="center" class="style3"><span class="style11"><? echo $horaabertura;?></span></div></td>

          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>





<? } 

}
?>
</table>
<p align="center"><span class="style5"><strong><? echo $site; ?></strong></span> <br>
  <? echo $endereco; ?> , <? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?> <br>
  <? echo "Telefone / Fax: ". $telefone." "; ?> / <? echo $fax; ?> <br>
  <? echo "E-Mail: ". $email_empresa; ?></p>
</body>

</html>

