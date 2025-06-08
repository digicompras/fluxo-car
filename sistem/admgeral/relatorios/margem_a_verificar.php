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

$cod_cli_gravar = $_POST['cod_cli'];
$cpf_gravar = $_POST['cpf'];
$data_gravar = date('d-m-Y');
$date_gravar = date('Y-m-d');
$hora_gravar = date('H:i:s');
$tem_margem_gravar = $_POST['tem_margem'];
$operador_gravar = $_POST['operador'];
$email_operador_gravar = $_POST['email_operador'];

$fazer_portabilidade = $_POST['fazer_portabilidade'];
$obs_das_margens = $_POST['obs_das_margens'];

$valor_parcela = $_POST['valor_parcela'];
$saldo_devedor = $_POST['saldo_devedor'];
$parcelas_em_aberto = $_POST['parcelas_em_aberto'];
$prazo_contrato = $_POST['prazo_contrato'];
$aprovacao = $_POST['aprovacao'];
$valor_liberado = $_POST['valor_liberado'];


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`clientes` set `codigo` = '$cod_cli_gravar',`tem_margem` = '$tem_margem_gravar',`date_margem_verificada` = '$date_gravar',`hora_margem_verificada` = '$hora_gravar',`fazer_portabilidade` = '$fazer_portabilidade',`obs_das_margens` = '$obs_das_margens',`valor_parcela` = '$valor_parcela',`saldo_devedor` = '$saldo_devedor',`parcelas_em_aberto` = '$parcelas_em_aberto',`prazo_contrato` = '$prazo_contrato',`aprovacao` = '$aprovacao',`valor_liberado` = '$valor_liberado' where `clientes`. `codigo` = '$cod_cli_gravar' limit 1 ";
}

mysql_query($comando,$conexao) or die("Erro ao gravar margem no cadastro do cliente! <br><br>");






	

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




$sql = "SELECT * FROM clientes where tem_margem = 'A VERIFICAR'";

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
          
            Listando todos os pedidos de verifica&ccedil;&atilde;o de margem da empresa:</span> <span class="style2"><? echo $nfantasia; ?>
              
            </span></div></td>
        </tr>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
        <tr>
          <td width="33%"><div align="center">Total de Clientes para verificar margem</div></td>
          <td width="13%"><div align="center"><strong><? echo " $registros";?></strong></div></td>
          <td width="14%">&nbsp;</td>
          <td width="18%">&nbsp;</td>
          <td width="22%"><div align="center"></div></td>
        </tr>
      </table>
      <p align="center"></p>
      <p align="center" class="style5">
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
	
$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$tem_margem = $linha[107];

$date_margem_verificada = $linha[122];
$hora_margem_verificada = $linha[123];
$fazer_portabilidade = $linha[126];
$obs_das_margens = $linha[127];

$valor_parcela = $linha[128];
$saldo_devedor = $linha[129];
$parcelas_em_aberto = $linha[130];
$prazo_contrato = $linha[131];
$aprovacao = $linha[132];
$valor_liberado = $linha[133];

}


echo "<form name='form1' method='post' action='margem_a_verificar.php'>

  <div align='center'><span class='style3'>";
    

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


echo "Respondendo solicita&ccedil;&atilde;o da matricula $recebe_codigo_abrir--->>> Margem Disponivel <input name='solicitacao' type='hidden' id='solicitacao' value='gravar'>
    <input name='cod_cli' type='hidden' id='cod_cli' value='$recebe_codigo_abrir'>
	<input name='cpf' type='hidden' id='cpf' value='$cpf_abrir'>
	<input name='operador' type='hidden' id='operador' value='$operador'>
	<input name='email_operador' type='hidden' id='email_operador' value='$email_operador'>
	<input name='solicitacao_recebida' type='hidden' id='solicitacao_recebida' value=''>
	<input name='codigo_possibilidade' type='hidden' id='codigo_possibilidade' value='$codigo_possibilidade'>
  </span>
    <input name='tem_margem' type='text' id='tem_margem'> --->>> É possivel portabilidade?  <select name='fazer_portabilidade' id='fazer_portabilidade'>
  <option selected></option>
  <option>Sim</option>
  <option>Não</option>
      </select><br>
Valor Parcela <input name='valor_parcela' type='text' id='valor_parcela' value='$valor_parcela'> Saldo Devedor <input name='saldo_devedor' type='text' id='saldo_devedor' value='$saldo_devedor'> Parcelas em Aberto <input name='parcelas_em_aberto' type='text' id='parcelas_em_aberto' value='$parcelas_em_aberto'> Prazo Contrato <input name='prazo_contrato' type='text' id='prazo_contrato' value='$prazo_contrato'><br>
 Aprovação <select name='aprovacao' id='aprovacao'>
  <option selected>$aprovacao</option>
  <option>Sim</option>
  <option>Não</option>
      </select> Valor Liberado <input name='valor_liberado' type='text' id='valor_liberado' value='$valor_liberado'><br>
	  Observações: <textarea name='obs_das_margens' cols='45' rows='3'  id='obs_das_margens'></textarea>


  
<input type='submit' name='Submit' value='Responder'>
  </div>
</form>";

}

}
//-------------------------FIM DA RESPOSTA DO HISCOM-----------------------

?></p>
<p>
        <?

$sql = "SELECT * FROM clientes where tem_margem = 'A VERIFICAR' order by date desc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$cod_cli = $linha[0];

$nome = $linha[1];

$sexo = $linha[2];

$estadocivil = $linha[3];

$cpf = $linha[4];

$rg = $linha[5];

$orgao = $linha[6];

$emissao = $linha[7];

$data_nasc = $linha[8];

$pai = $linha[9];

$mae = $linha[10];

$endereco = $linha[11];

$numero = $linha[12];

$bairro = $linha[13];

$complemento = $linha[14];

$cidade = $linha[15];

$estado = $linha[16];

$cep = $linha[17];

$telefone = $linha[18];

$celular = $linha[19];

$email = $linha[20];

$operador = $linha[21];

$cel_operador = $linha[22];

$email_operador = $linha[23];

$estabelecimento = $linha[24];

$cidade_estabelecimento = $linha[25];

$tel_estabelecimento = $linha[26];

$email_estabelecimento = $linha[27];

$obs = $linha[28];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$dataalteracao = $linha[31];

$horaalteracao = $linha[32];

$operador_alterou = $linha[33];

$cel_operador_alterou = $linha[34];

$email_operador_alterou = $linha[35];

$estabelecimento_alterou = $linha[36];

$cidade_estabelecimento_alterou = $linha[37];

$tel_estabelecimento_alterou = $linha[38];

$email_estabelecimento_alterou = $linha[39];

$tipo = $linha[40];

$banco = $linha[41];

$agencia = $linha[42];

$conta = $linha[43];

$num_beneficio = $linha[44];



$parc1 = $linha[45];

$banco1 = $linha[46];

$vencto1 = $linha[47];

$compra1 = $linha[48];



$parc2 = $linha[49];

$banco2 = $linha[50];

$vencto2 = $linha[51];

$compra2 = $linha[52];



$parc3 = $linha[53];

$banco3 = $linha[54];

$vencto3 = $linha[55];

$compra3 = $linha[56];



$parc4 = $linha[57];

$banco4 = $linha[58];

$vencto4 = $linha[59];

$compra4 = $linha[60];



$parc5 = $linha[61];

$banco5 = $linha[62];

$vencto5 = $linha[63];

$compra5 = $linha[64];



$parc6 = $linha[65];

$banco6 = $linha[66];

$vencto6 = $linha[67];

$compra6 = $linha[68];



$parc7 = $linha[69];

$banco7 = $linha[70];

$vencto7 = $linha[71];

$compra7 = $linha[72];



$num_beneficio2 = $linha[73];

$num_beneficio3 = $linha[74];

$num_beneficio4 = $linha[75];



$dataprev2 = $linha[76];

$obs2 = $linha[77];





$dataprev = $linha[76];

$cpf_rg = $linha[78];

$comp_end = $linha[79];

$comp_quit1 = $linha[80];

$comp_quit2 = $linha[81];

$comp_quit3 = $linha[82];

$comp_quit4 = $linha[83];

$comp_quit5 = $linha[84];

$comp_quit6 = $linha[85];

$comp_renda = $linha[86];

$cpf_rg_testemunha = $linha[87];

$mes_niver = $linha[88];

$status_cliente = $linha[89];

$tem_margem = $linha[107];

$saldo1 = $linha[108];
$saldo2 = $linha[109];
$saldo3 = $linha[110];
$saldo4 = $linha[111];
$saldo5 = $linha[112];
$saldo6 = $linha[113];
$saldo7 = $linha[114];
$naturalidade = $linha[115];
$pagto_beneficio = $linha[116];



$resposta = $linha[119];

$secretaria = $linha[124];
$senha_servidor = $linha[125];
$fazer_portabilidade = $linha[126];
$obas_das_margens = $linha[128];


?>
        
</p>
<table width="100%"  border="0">

        <tr bgcolor="#<? echo $cor ?>">

          <td><div align="center" class="style3">Matricula</div></td>
          <td class="style3"><div align="center">Operador</div></td>

          <td><div align="center" class="style3">Perfil</div></td>
          <td class="style3"><div align="center">Secretaria</div></td>
          <td><div align="center" class="style3">Nome</div></td>
          <td><div align="center" class="style3">CPF</div></td>
          <td class="style3"><div align="center">RG</div></td>

          <td><div align="center" class="style3">M&atilde;e</div></td>
          <td><div align="center" class="style3">Data Nasc.</div></td>
          <td><div align="center"><span class="style3">Matricula ( Ben<span class="style3">ef&iacute;cio</span></span>)</div></td>

          <td><div align="center"><span class="style3">Senha Servidor</span></div></td>

          <td><div align="center" class="style3">&Eacute; possivel fazer portabilidade?</div>            </td>

          <td colspan="3" class="style3"><div align="center">Observa&ccedil;&otilde;es sobre margem</div></td>
  </tr>

		

        <tr>

          <td width="10%">               <form name="form2" method="post" action="margem_a_verificar.php">
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
          <td width="6%" class="style3"><div align="center"><span class="style3"><? echo $operador;?></span></div></td>

          <td width="6%"><div align="center"><span class="style3"><? echo $tipo;?></span></div></td>
          <td width="5%" class="style3"><div align="center"><span class="style3"><? echo $secretaria;?></span></div></td>
          <td width="5%"><div align="center"><span class="style3"><? echo $nome;?></span></div></td>
          <td width="5%"><div align="center" class="style3"><? echo $cpf;?></div></td>
          <td width="6%" class="style3"><div align="center"><span class="style3"><? echo $rg;?></span></div></td>

          <td width="6%"><div align="center"><span class="style3"></span><span class="style3"><? echo $mae;?></span></div></td>
          <td width="6%"><div align="center"><span class="style3"></span><span class="style3"><? echo $data_nasc;?></span></div></td>
          <td width="7%"><div align="center"><span class="style3"><? echo $num_beneficio;?></span></div></td>

          <td width="7%"><div align="center"><span class="style3"><? echo $senha_servidor;?></span></div></td>

          <td width="7%">

          <div align="center" class="style3"><? echo $fazer_portabilidade;?></div></td>

          <td colspan="3" class="style3"><div align="center" class="style3"><? echo $obs_das_margens;?></div>            <div align="center" class="style3"></div>            <div align="center"></div></td>

          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>





<? } ?>
        <tr>

          <td><span class="style3"></span></td>
          <td class="style3"><div align="center"></div></td>

          <td><div align="center"></div></td>
          <td class="style3"><div align="center"></div></td>
          <td>&nbsp;</td>
          <td><span class="style3"></span></td>
          <td class="style3"><div align="center"></div></td>

          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>

          <td><div align="center"><span class="style3"></span></div></td>

          <td><span class="style3"></span></td>

          <td width="7%"><span class="style3"></span></td>

          <td width="4%"><span class="style3"></span></td>

          <td width="19%">&nbsp;</td>
  </tr>
</table>

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

