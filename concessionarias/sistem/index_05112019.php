<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.





else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

?>

<?php
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true): /*Se este dispositivo for portátil, faça/escreva o seguinte */ ?>
Ola! Você está acessando apartir de um dispositivo portátil
<?php else : /* Caso contrário, faça/escreva o seguinte */ ?>
Ola! Você está acessando apartir de um computador normal
<?php endif; ?>




<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {font-size: 35px;
	font-weight: bold;
	color: #0000FF;
}
.style11 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}

-->
</style>


</head>

<?



require '../conect/conect.php';




$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

$hora = date('H:i:s');
$hora_leitura = date('H:i:s');

//-----------calculando data de ontem--------------

$datecadastro = date('Y-m-d');
$datacadastro = date('d-m-Y');

$datadehoje = time(); 
$ontem = $datadehoje - (24*3600);
$datadeontem = date('Y-m-d', $ontem);

$data_de_ontem_obtida = $datadeontem;

$data_de_ontem_obtida2 = explode("-", $data_de_ontem_obtida);



$dia_de_ontem_obtida = $data_de_ontem_obtida2[0];

$mes_de_ontem_obtido = $data_de_ontem_obtida2[1];

$ano_de_ontem_obtido = $data_de_ontem_obtida2[2];

//-------------fim do calculo da data de ontem------------

$data_leitura = date('d-m-Y');

$dia_atual = date('d');
$mes_atual = date('m');
$ano_atual = date('Y');


$dia = date('d');

$mes = date('m');

$ano = date('Y');

$ano_anterior = date('Y')-1;
$ano_atual = date('Y');
$ano_proximo = date('Y')+1;

$departamento = $_POST['departamento'];



$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_operador = $linha[0];

$nome_operador = $linha[1];

$ultimo_departamento_trabalhado = $linha[66];

$funcao = $linha[43];
}

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$razaosocial_empresa = $linha[1];
$nfantasia_empresa = $linha[2];
$cnpj_empresa = $linha[3];
$inscr_est_empresa = $linha[4];
$endereco_empresa = $linha[5];
$numero_empresa = $linha[6];
$bairro_empresa = $linha[7];
$cep_empresa = $linha[9];
$cidade_empresa = $linha[10];
$estado_empresa = $linha[11];
$telefone_empresa = $linha[12];
$fax_empresa = $linha[13];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}



$solicitacao = $_POST['solicitacao'];

if($solicitacao=="gravar_dp"){
	


$reg_departamento = $_POST['reg_departamento'];


$comando = "insert into departamento_trabalhado(operador,departamento,date,hora) values('$nome_operador','$departamento','$datecadastro','$hora')";



mysql_query($comando,$conexao);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`operadores` set `ultimo_departamento_trabalhado` = '$departamento' where `operadores`. `codigo` = '$codigo_operador'";

}

mysql_query($comando,$conexao);


}




$data_hoje = $_SESSION['data_hoje'];

$codigo_mensagem = $_POST['codigo_mensagem'];

$mensagem_lida = $_POST['mensagem_lida'];



if($mensagem_lida=="Lida"){

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`mensagens_ao_funcionario` set `codigo` = '$codigo_mensagem',`mensagem_lida` = '$mensagem_lida',`data_leitura` = '$data_leitura',`hora_leitura` = '$hora_leitura' where `mensagens_ao_funcionario`. `codigo` = '$codigo_mensagem' limit 1 ";

}



mysql_query($comando,$conexao);



}

?>


<?

//-------------------------------------------------------------------------------------------------

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_operador = $linha[0];

$nome_operador = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$senha_op = $linha[41];

$tipo_op = $linha[42];

$funcao = $linha[43];

$estab_pertence_op = $linha[44];

$cidade_estab_pertence_op = $linha[45];

$tel_estab_pertence_op = $linha[46];

$email_estab_pertence_op = $linha[47];

$bloqueio_parcial = $linha[57];

$ultimo_departamento_trabalhado = $linha[66];

}

?>

<?
	
//--------------------------------------------------verificando se teve movimentação de caixa ontem--------------------------------------

$sql = "SELECT * FROM cx_entradas where operador = '$nome_operador' and departamento = '$ultimo_departamento_trabalhado' and categoria_conta = 'Abertura de Caixa' and datecadastro = '$datadeontem'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$registro_abertura_de_caixa_de_ontem = mysql_num_rows($res);


}

if($registro_abertura_de_caixa_de_ontem==1){
	
$sql = "SELECT * FROM cx_entradas where operador = '$nome_operador' and departamento = '$ultimo_departamento_trabalhado' and categoria_conta = 'Fechamento de Caixa' and datecadastro = '$datadeontem'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$registro_fechamento_de_caixa_de_ontem = mysql_num_rows($res);


}

}
else{
	
$registro_fechamento_de_caixa_de_ontem = 0;
	
}

//------------------------------------------------fim da verificação de ontem---------------------------------------------------------------------------

//-----------------------------------------verificando movimentação de caixa hoje-----------------------------------------------


$sql = "SELECT * FROM cx_entradas where operador = '$nome_operador' and departamento = '$ultimo_departamento_trabalhado' and categoria_conta = 'Abertura de Caixa' and datecadastro = '$datecadastro'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$registro_abertura_de_caixa = mysql_num_rows($res);


}

if($registro_abertura_de_caixa==1){

$sql = "SELECT * FROM cx_entradas where operador = '$nome_operador' and departamento = '$ultimo_departamento_trabalhado' and categoria_conta = 'Fechamento de Caixa' and datecadastro = '$datecadastro'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$registro_fechamento_de_caixa = mysql_num_rows($res);


}

}
else{
	
$registro_fechamento_de_caixa = 0;
	
}




//---------------------------------------------------------fim da verificação de hoje----------------------------------------------------	
	
?>


<?


$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?> 

<body bgcolor="#<? printf("$linha[1]"); ?>"> 

<? } ?>


<?
$solicitacao_gravar_abertura_caixa = $_POST['solicitacao_gravar_abertura_caixa'];

if($solicitacao_gravar_abertura_caixa=="gravaraberturacaixa"){

$horacadastro = $_POST['horacadastro'];

$valor = $_POST['valor'];

$categoria_conta = $_POST['categoria_conta'];

$historico = $_POST['historico'];

$nfantasia = $_POST['nfantasia'];


$operador = $_POST['operador'];

$cel_operador = $_POST['cel_operador'];

$email_operador = $_POST['email_operador'];

$estabelecimento = $_POST['estabelecimento'];

$cidade_estabelecimento = $_POST['cidade_estabelecimento'];

$tel_estabelecimento = $_POST['tel_estabelecimento'];

$email_estabelecimento = $_POST['email_estabelecimento'];

$historico = $_POST['historico'];



$comando = "insert into cx_entradas(datacadastro,datecadastro,horacadastro,valor,nfantasia,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,historico,dia,mes,ano,categoria_conta,departamento) values('$datacadastro','$datecadastro','$horacadastro','$valor','$ultimo_departamento_trabalhado','$nome_operador','$cel_operador','$email_operador','$estab_pertence_op','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$historico','$dia','$mes','$ano','$categoria_conta','$departamento')";



mysql_query($comando,$conexao);


?>

<script>

alert("Abertura de caixa registrada com sucesso!!!...\n\n<? echo "R$ $valor"; ?> \n\n<? echo "$nome_operador"; ?> \n\n<? echo "$departamento"; ?> \n\nTenha um òtimo dia de trabalho!");

window.location = "index.php";


</script>


<?

} 
 
?>
	
	



<?
if($ultimo_departamento_trabalhado=="GARCON"){

?>

<script>


window.location = "restaurante/atribuicao_de_mesas.php";


</script>

<?

}

?>


<table width="100%" border="0" cellspacing="4">

    <tr> 

      <td width="15%"><strong>Ol&aacute;! Seja bem vindo!<br> 

        </strong><strong><font color="#0000FF"><? echo $nome_operador; ?> 

            

</font></strong></td>

      <td width="17%"><strong>Fun&ccedil;&atilde;o</strong><br>      
          <span><? echo $funcao; ?></span></td>
      <td width="27%"><strong>Departamento</strong><br>
      <span><? echo $ultimo_departamento_trabalhado; ?></span></td>

      <td width="18%"><strong>Cidade: <br>
      <font color="#0000FF"><? echo $cidade_estab_pertence_op; ?></font></strong></td>

      <td width="23%" valign="top"><div align="center">

        <strong><font color="#0000FF">Confira a data de hoje<br> 

        </font></strong>

        <strong><font color="#0000FF"><? echo "$data_hoje"; ?></font></strong>

           

        </p>

</div></td>
    </tr>

    <tr>

      <td colspan="2"><form name="form1" method="post" action="ponto/marcarponto.php">

        <?

$hora = date('H');		



$sql = "SELECT * FROM ponto where nome = '$nome_operador' and data = '$data_hoje'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$codigo_ponto = $linha[0];

$ent_t = $linha[5];



}



?>

        <strong><font color="#0000FF">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input name="nome" type="hidden" id="nome" value="<? echo $nome_operador; ?>">

        <input name="codigo_ponto" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">

        <input name="data" type="hidden" id="data" value="<? echo date('d-m-Y'); ?>">
        </font></strong>

        <? if($funcao<>"Agente"){ echo "<input class='class01' type='submit' name='button' id='button' value='Marcar Ponto'>"; } ?>
      </form>        <strong><font color="#0000FF">      </font></strong></td>

      <td><form name="form2" method="post" action="operadores/editar_operador.php">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "<input class='class01' type='submit' name='Submit2' value='Editar Dados Cadastrais'>"; } ?>
        </div>
      </form>        <strong><font color="#0000FF">          </font></strong></td>

      <td colspan="2"><div align="center"><strong><font color="#0000FF"><? //echo "$datadehoje -->> "; ?><? //echo $datadeontem;  ?></font></strong></div></td>
    </tr>




</table>








<table width="100%" border="0">
  <tr>
    <td><div align="center"> <TABLE width="100%" border=0 align="center" cellPadding=3 cellSpacing=4>
<tr>

    <?

$sql = "SELECT * FROM departamentos where categoria = 'VENDA DE PRODUTOS' group by departamento order by departamento asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg_departamento = mysql_num_rows($res);
//$reg_departamento++;

$departamento_a_trabalhar = $linha[1];



?>
 <?
if(empty($ultimo_departamento_trabalhado)){
	

echo "<td><form name='form4' method='post' action='index.php'>";
	?>
     <div align="center">
<?
  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

      echo "<input class= 'class01' type='hidden' name='departamento' id='departamento' value='$departamento_a_trabalhar'>
      <input name='solicitacao' type='hidden' id='solicitacao' value='gravar_dp'>";





      echo "	<input type='submit' name='button' id='button' span class='class01' value='$departamento_a_trabalhar'> </span>	";
	  
	  ?>
	</div>
<?
echo "</form></td>";




}

if($reg_departamento==3){

echo "<br>";

$reg_departamento=0;

}


}



if(empty($ultimo_departamento_trabalhado)){
	
}
else{
	
echo "$nome_operador trabalhando em <b>$ultimo_departamento_trabalhado</b>";
	
}

 ?>
 
 </tr>

</TABLE>
</div></td>
  </tr>
</table>
<form name="form9" method="post" action="index.php">
    <?

$sql = "SELECT * FROM mensagens_ao_funcionario where nome_operador = '$nome_operador' and mensagem_lida = 'Não lida'";

$res = mysql_query($sql);

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg_mensagem++;



$codigo_mensagem = $linha[0];

$nome_operador = $linha[1];

$data_mensagem = $linha[2];

$hora_mensagem = $linha[3];

$mensagem = $linha[4];

$mensagem_lida = $linha[5];

$data_leitura = $linha[6];

$hora_leitura = $linha[7];

$assunto = $linha[8];


?>
    <table width="100%"  border="0">
      <tr>
        <td width="9%"><div align="center"><? echo $data_mensagem; ?></div></td>
        <td width="9%"><div align="center"><? echo $hora_mensagem; ?></div></td>
        <td width="62%"><div align="center">
            <textarea name="mensagem" cols="120" rows="7" id="mensagem"><? echo "$assunto - $mensagem"; ?></textarea>
        </div></td>
        <td width="20%"><div align="center">
            <input name="codigo_mensagem" type="hidden" id="codigo_mensagem" value="<? echo $codigo_mensagem; ?>">
            <input name="mensagem_lida" type="hidden" id="mensagem_lida" value="Lida">
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center">
            <input class="class01" type="submit" name="Submit" value="Declaro que li a mensagem">
        </div></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <? } ?>
  </form>
<strong></strong>


<p align="center">
<?
if(empty($ultimo_departamento_trabalhado)){
	
}
else{
	


if($funcao=="GARCON"){
		if($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA"){ 
	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
		
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	echo "<script>location.href='restaurante/atribuicao_de_mesas_dispositivomovel.php';</script>";
		
	}
	else{
		
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	echo "<script>location.href='restaurante/atribuicao_de_mesas.php';</script>";
	
	}
		}
	else{
	
	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
		
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	echo "<script>location.href='restaurante/atribuicao_de_mesas_dispositivomovel2.php';</script>";
		
	}
	else{
		
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	echo "<script>location.href='restaurante/atribuicao_de_mesas2.php';</script>";
	
	}
}
	

	
}
else{
include("$ultimo_departamento_trabalhado.php");
}

}

?>
</p>



</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>