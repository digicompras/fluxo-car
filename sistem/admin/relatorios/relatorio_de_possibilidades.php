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

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];


}


?>

<?
//----------------------INICIO DA GRAVAÇÃO E ENVIO PARA O OPERADOR--------------------
$solicitacao_gravar = $_POST['solicitacao'];


if($solicitacao_gravar=="gravar"){

$codigo_possibilidade = $_POST['codigo_possibilidade'];
$cod_cli_gravar = $_POST['cod_cli'];
$cpf_gravar = $_POST['cpf'];
$data_gravar = date('d-m-Y');
$hora_gravar = date('H:i:s');
$hiscon_gravar = $_POST['hiscon'];
$operador_gravar = $_POST['operador'];
$email_operador_gravar = $_POST['email_operador'];


$comando = "insert into hiscon(cod_cli,cpf,data,hora,obs,operador,email_operador) values('$cod_cli_gravar','$cpf_gravar','$data_gravar','$hora_gravar','$hiscon_gravar','$operador_gravar','$email_operador_gravar')";

mysql_query($comando,$conexao) or die("Erro ao gravar Hiscon do cliente!<br><br>");



$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`possibilidades` set `codigo` = '$codigo_possibilidade',`status` = 'respondido' where `possibilidades`. `codigo` = '$codigo_possibilidade' limit 1 ";
}

mysql_query($comando,$conexao) or die("Erro ao alterar status desse pedido de possibilidade <br><br>");






	

	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO

	$email_dest   =   $email_operador_gravar;

	

	//PREPARA O PEDIDO

	$mens  .=  "Olá! $operador_gravar você solicitou o VER POSSIBILIDADE do CPF abaixo na $nfantasia_empresa!   \n\n";

	$mens  .=  "Visite-nos $site_empresa \n\n\n";
	
	$mens  .=  "Segue a situação e o parecer da mesa!!!...   \n\n";

	$mens  .=  "CPF: ".$cpf_gravar."                                                    \n\n";

	$mens  .=  "POSSIBILIDADE: "."Sua resposta já se encontra no sistema....Verifique no cadastro do cliente!"."                                                    \n\n";


	

	//DISPARA O EMAIL

	//$envia  =  mail($email_dest, "Resposta sobre o VER POSSIBILIDADES ".$data_gravar, $mens,"From:".$email_dest."\r\nBcc:".$email);

	





}


//---------------------FIM DA GRAVAÇÃO E ENVIO PARA O OPERADOR------------------------
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

      <p><br>

  <?

	  $nome_operador = $_POST['nome_operador'];

$data_inicial = $_POST['data_inicial'];

$data_final = $_POST['data_final'];




$sql = "SELECT * FROM possibilidades where status = 'a responder'";

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
          <td colspan="5"><div align="center"><span class="style2">
          
            Listando todos os pedidos de possibilidades da empresa:</span> <span class="style2"><? echo $nfantasia; ?>
              
            </span></div></td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td width="22%"><div align="center">Total de Pedidos solicitados</div></td>
          <td width="13%"><div align="center"><strong><? echo " $registros";?></strong></div></td>
          <td width="4%">&nbsp;</td>
          <td width="39%">Total de Operadores que efetuou solicita&ccedil;&atilde;o</td>
          <td width="22%"><div align="center"><strong><strong>
            <?

$sql = "SELECT * FROM possibilidades where status = 'a responder' group by operador";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_total_operadores = mysql_num_rows($res);

}

echo $registros_total_operadores;
?>
          </strong></strong></div></td>
        </tr>
      </table>
<p>
        <?

$sql = "SELECT * FROM possibilidades where status = 'a responder' order by ano,mes,dia,hora desc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$codigo_possibilidade = $linha[0];

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

$cod_cli = $linha[18];
$status = $linha[19];

?>
        
            </p>
<table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td><div align="center" class="style3">Matricula</div></td>

          <td><div align="center" class="style3">Nome</div></td>
          <td><div align="center" class="style3">CPF</div></td>

          <td><div align="center"><span class="style3">N&ordm; Ben<span class="style3">ef&iacute;cio</span></span><span class="style3">1</span></div></td>

          <td><div align="center"><span class="style3">N&ordm; Benef&iacute;cio2</span></div></td>

          <td><div align="center" class="style3">N&ordm; Benef&iacute;cio3</div>            </td>

          <td><div align="center" class="style3">N&ordm; Benef&iacute;cio4</div></td>

          <td width="7%"><div align="center" class="style3">Data</div></td>

          <td width="7%"><div align="center"><span class="style3">Hora</span></div></td>
          <td width="17%"><div align="center" class="style3">Operador</div></td>
  </tr>

		

        <tr>

          <td width="16%">               <form name="form2" method="post" action="relatorio_de_possibilidades.php">
            <div align="center" class="style3">

            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <input name="codigo_abrir" type="hidden" id="codigo_abrir" value="<? echo $cod_cli; ?>">
            <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "abrir"; ?>">
            <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
            <input type="submit" name="button" id="button" value="<? echo $cod_cli; ?>">
            </div>
          </form></td>

          <td width="8%"><div align="center"><span class="style3"><? echo $nome;?></span></div></td>
          <td width="8%"><div align="center" class="style3"><? echo $cpf;?></div></td>

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

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td><span class="style3"></span></td>

          <td>&nbsp;</td>
          <td><span class="style3"></span></td>
          </tr>
</table>


<?

//------------------INICIO DA RESPOSTA DO HISCON--------------------

$recebe_codigo_abrir = $_POST['codigo_abrir'];
$solicitacao_recebida = $_POST['solicitacao'];
$cpf_abrir = $_POST['cpf'];
$data = date('d-m-Y');
$hora = date('H:i:s');

?>

<?

if(empty($solicitacao_recebida)){

}
else{

if($solicitacao_recebida=="abrir"){

echo "<form name='form1' method='post' action='relatorio_de_possibilidades.php'>

  <div align='center'><span class='style3'>";
    

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


echo "<input name='solicitacao' type='hidden' id='solicitacao' value='gravar'>
    <input name='cod_cli' type='hidden' id='cod_cli' value='$recebe_codigo_abrir'>
	<input name='cpf' type='hidden' id='cpf' value='$cpf_abrir'>
	<input name='operador' type='hidden' id='operador' value='$operador'>
	<input name='email_operador' type='hidden' id='email_operador' value='$email_operador'>
	<input name='solicitacao_recebida' type='hidden' id='solicitacao_recebida' value=''>
	<input name='codigo_possibilidade' type='hidden' id='codigo_possibilidade' value='$codigo_possibilidade'>
  </span>
    <textarea name='hiscon' cols='150' rows='10' id='hiscon'></textarea>
<input type='submit' name='Submit' value='Responder'>
  </div>
</form>";

}

}
//-------------------------FIM DA RESPOSTA DO HISCOM-----------------------

?>



<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><span class="style5"><strong><? echo $site; ?></strong></span> <br>
  <? echo $endereco; ?> , <? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?> <br>
  <? echo "Telefone / Fax: ". $telefone." "; ?> / <? echo $fax; ?> <br>
  <? echo "E-Mail: ". $email_empresa; ?></p>
</body>

</html>

