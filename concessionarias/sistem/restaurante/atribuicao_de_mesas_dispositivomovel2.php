<?php

/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em 30 minutos */
session_cache_expire(60);
$cache_expire = session_cache_expire();

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");


require '../../conect/conect.php';
?>

<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];

$funcao = $linha[43];

$estab_pertence = $linha[44];

$ultimo_departamento_trabalhado = $linha[66];


}
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
<?

if($funcao=="GARCON"){
		if($ultimo_departamento_trabalhado=="CHURRASCARIALC"){ 
	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
		$linkvoltar = "atribuicao_de_mesas_dispositivomovel.php";
	}
	else{
	$linkvoltar = "atribuicao_de_mesas.php";
	}
		}else{ 
	
	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
		$linkvoltar = "atribuicao_de_mesas_dispositivomovel2.php";
	}
	else{
	$linkvoltar = "atribuicao_de_mesas2.php";
	}
}
	
//$linkvoltar =  "../restaurante/atribuicao_de_mesas2.php";
	
}
else{
	
if(($ultimo_departamento_trabalhado=="CHURRASCARIALC") or ($ultimo_departamento_trabalhado=="CHURRASCARIA2")){
	
$linkvoltar =  "../index.php";
	
}

}
?>

<html>

<head>
<meta http-equiv="refresh" content="300" />
<title>ATRIBUICAO DE MESAS</title>
<meta http-equiv="refresh" content="900" />
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
.style5 {font-size: 18px}
.style5 {font-size: 24px}
.style1 {font-size: 35px;
	font-weight: bold;
	color: #0000FF;
}

.style11 {font-size: 16px;
	font-weight: bold;
	color: #0000FF;
}
.style12 {color: #FFFFFF}

-->

</style>
</head>

<?


$codigolancamento = $_POST['codigolancamento'];

$solicitacao = $_POST['solicitacao'];



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

//----------------LIBERANDO mesas2------------------------

if($solicitacao=="liberar_mesa"){


$mesa_liberar = $_POST['mesa_liberar'];


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`mesas2` set `statusmesa` = 'LIVRE',`situacao` = '',`codigo_orcamento` = '' where `mesas2`. `mesa` = '$mesa_liberar' limit 1";
}

mysql_query($comando,$conexao);


}

//-------------FIM DA LIBERAÇÃO DE mesas2-----------------


?>






<body bgcolor="#ffffff" 

  


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
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
</form>
      <p>      
<p>      
<p class="style1 style1 style12">.
<form action="<? echo "$linkvoltar"; ?>" method="post" name="form1" target="_top">
        <input type="submit" name="Submit4" span class="class01" value="Voltar ao menu principal"> </span>
       
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      </form>
      <p class="style12">.</p>
      <p class="style12">. </p>
<table width="100%" border="0">
        <tr>
          <td width="54%"><form action="../orcamentos/orcamento.php" method="post" enctype="multipart/form-data" name="form2">
            <p><span class="style1">
              <input name="solicitacao" type="hidden" id="solicitacao" value="abrir_orcamento">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              </span>
              <input name="nome" class="class02" type="text" id="nome" size="10">
              <input type="submit" name="Submit5" span class="class01" value="Abrir Movimento"> </span>
            </p>
<script language='JavaScript' type='text/javascript'>
document.form2.nome.focus()
          </script>
          </form></td>
          <td width="32%">Total de Clientes aguardando mesa</td>
          <td width="14%"><strong>
            <?


$sql = "SELECT * FROM orcamentos departamento = '$ultimo_departamento_trabalhado' and where status = 'Aberto' and mesa = '' and status_conta = 'Aberto' and mesa = '' and caixa_rapido <> 'sim'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}
?>
          <? echo " $registros";?></strong></td>
        </tr>
      </table>
      <form name="form1" method="post" action="atribuicao_de_mesas_dispositivomovel2.php">
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



	
	
	
$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento' and mesa = '$mesa' and mesa2 = '$mesa2' order by codigo_orcamento asc";

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
              <select name="mesa" id="mesa" class="class02">
                <option selected><? echo $mesa; ?></option>
                <?

    $sql = "select * from mesas2 where statusmesa = 'LIVRE' order by mesa asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mesa']."</option>";

    }

?>
              </select>
            <input name="mesa_anterior" type="hidden" id="mesa_anterior" value="<? echo $mesa; ?>"></td>
            <td colspan="3">Juntar Mesa:
              <select name="mesa2" id="mesa2" span class="class02">
                <option selected><? echo $mesa2; ?></option>
                <option></option>
                <?

    $sql = "select * from mesas2 where statusmesa = 'LIVRE' order by mesa asc";
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
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="10%">&nbsp;</td>
            <td colspan="3"><input type="hidden" name="obs" id="obs">
              <input type="submit" name="Submit3" span class="class01" value="Efetivar troca de mesa"> </span> 
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
      <form name="form1" method="post" action="atribuicao_de_mesas_dispositivomovel2.php">
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



	
	
	
$sql = "SELECT * FROM orcamentos where codigo_orcamento = '$codigo_orcamento' and mesa = '' order by codigo_orcamento asc";

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
              <select name="mesa"  id="mesa" span class="class02">
				  <option selected><? echo $mesa; ?></option>
                <?
    $sql = "select * from mesas2 where statusmesa = 'LIVRE' order by mesa asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mesa']."</option>";

    }

?>
            </select></td>
            <td colspan="3">Juntar Mesa:
              <select name="mesa2" id="mesa" span class="class02">
                <option selected><? echo $mesa2; ?></option>
                <?

    $sql = "select * from mesas2 where statusmesa = 'LIVRE' order by mesa asc";
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
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="10%">&nbsp;</td>
            <td colspan="3"><input type="hidden" name="obs" id="obs">
              <input type="submit" name="Submit2" span class="class01" value="Atribuir Mesa"> </span> 
              <input name="solicitacao" type="hidden" id="solicitacao" value="gravar_atribuicao">
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
     
        <?
//----------------------INICIO DA GRAVACAO E ENVIO PARA O OPERADOR--------------------

if($solicitacao=="gravar_troca_de_mesa"){
	
$codigo_orcamento = $_POST['codigo_orcamento'];

	
$mesa_anterior = $_POST['mesa_anterior'];
$mesa2_anterior = $_POST['mesa2_anterior'];
	
	
//----------------LIBERANDO mesas2------------------------

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`mesas2` set `statusmesa` = 'LIVRE',`situacao` = '',`codigo_orcamento` = '' where `mesas2`. `codigo_orcamento` = '$codigo_orcamento'";
}

mysql_query($comando,$conexao);





//-------------FIM DA LIBERAÇÃO DE mesas2-----------------

	
	
	
	
	

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


$comando = "update `$linha[1]`.`mesas2` set `statusmesa` = 'OCUPADA',`situacao` = 'PRINCIPAL',`codigo_orcamento` = '$codigo_orcamento' where `mesas2`. `mesa` = '$mesa'";
}

mysql_query($comando,$conexao);

}





if(empty($mesa2)){
	
}
else{

$sql = "SELECT * FROM mesas2 where mesa = '$mesa2'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$mesa = $linha[1];

}

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`mesas2` set `statusmesa` = 'OCUPADA',`situacao` = 'ADJUNTA',`codigo_orcamento` = '$codigo_orcamento' where `mesas2`. `mesa` = '$mesa2'";
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


$comando = "update `$linha[1]`.`mesas2` set `statusmesa` = 'OCUPADA',`situacao` = 'PRINCIPAL',`codigo_orcamento` = '$codigo_orcamento' where `mesas2`. `mesa` = '$mesa'";
}

mysql_query($comando,$conexao);

}





if(empty($mesa2)){
	
}
else{

$sql = "SELECT * FROM mesas2 where mesa = '$mesa2'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$mesa = $linha[1];

}

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`mesas2` set `statusmesa` = 'OCUPADA',`situacao` = 'ADJUNTA',`codigo_orcamento` = '$codigo_orcamento' where `mesas2`. `mesa` = '$mesa2'";
}

mysql_query($comando,$conexao);


}


}






//---------------------FIM DA GRAVACAO E ENVIO PARA O OPERADOR------------------------
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
          <td width="100%" colspan="5"><div align="center"><? echo "<span class='style10'>MAPA DE mesas2</span>"; ?></div>            <div align="center"></div>            <div align="center"></div></td>
        </tr>
      </table>
<table width="100%" border="0">
        <tr>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '01' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento1 = $linha[0];
$codigo_cliente1 = $linha[25];


$mesa01 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario1 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '01'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa1 = $linha[2];

$situacao01 = $linha[3];

}

if(empty($mesa01)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '01' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento1 = $linha[0];
$codigo_cliente2 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente1; ?>">
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario1; ?>">
<input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento1; ?>">
                  <?
if($situacao01=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa01'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="01">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa1=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao01=="PRINCIPAL"){

}
else{
	
if($situacao01=="ADJUNTA"){

echo "<span class='style10'>MESA 01/J-$juntocomamesa</span>";

}
else{
echo "<span class='style11'>MESA 01/LIVRE</span>";
}

}
 ?>
                </div></td>
              </tr>
            </table>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '02' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento2 = $linha[0];
$codigo_cliente2 = $linha[25];


$mesa02 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario2 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '02'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa2 = $linha[2];

$situacao02 = $linha[3];

}

if(empty($mesa02)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '02' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento2 = $linha[0];
$codigo_cliente2 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente2; ?>">
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario2; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento2; ?>">
                  <?
if($situacao02=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa02'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="02">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa2=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao02=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '03' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento3 = $linha[0];
$codigo_cliente3 = $linha[25];


$mesa03 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario3 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '03'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa3 = $linha[2];

$situacao03 = $linha[3];

}

if(empty($mesa03)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '03' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento3 = $linha[0];
$codigo_cliente3 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario3; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente3; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento3; ?>">
                  <?
if($situacao03=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa03'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="03">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa3=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao03=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td width="10%" bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
                <tr>
                  <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '04' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento4 = $linha[0];
$codigo_cliente4 = $linha[25];


$mesa04 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario4 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '04'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa = $linha[2];

$situacao04 = $linha[3];

}

if(empty($mesa04)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '04' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento4 = $linha[0];
$codigo_cliente4 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                    <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario4; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente4; ?>">
                    <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento4; ?>">
                    <?
if($situacao04=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa04'></span>";
}
	
	
?>
                  </form></td>
                  <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                    <div align="center">
                      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                      <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="04">
                      <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                      <? //if($statusmesa=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                    </div>
                  </form></td>
                </tr>
                <tr>
                  <td colspan="2"><div align="center">
<?
if($situacao04=="PRINCIPAL"){

}
else{
	
if($situacao04=="ADJUNTA"){

echo "<span class='style10'>MESA 04/J-$juntocomamesa</span>";

}
else{
echo "<span class='style11'>MESA 04/LIVRE</span>";
}

}
 ?></div></td>
                </tr>
              </table>
          </div></td>
        </tr>
        <tr>
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '05' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento5 = $linha[0];
$codigo_cliente5 = $linha[25];


$mesa05 = $linha[46];
$mesa2 = $linha[47];

	$comandadofuncionario5 = $linha[61];
}


$sql = "SELECT * FROM mesas2 where mesa = '05'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa5 = $linha[2];

$situacao05 = $linha[3];

}

if(empty($mesa05)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '05' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento5 = $linha[0];
$codigo_cliente5 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario5; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente5; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento5; ?>">
                  <?
if($situacao05=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa05'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="05">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa5=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao05=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '06' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento6 = $linha[0];
$codigo_cliente6 = $linha[25];


$mesa06 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario6 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '06'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa6 = $linha[2];

$situacao06 = $linha[3];

}

if(empty($mesa06)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '06' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento6 = $linha[0];
$codigo_cliente6 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario6; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente6; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento6; ?>">
                  <?
if($situacao06=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa06'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="06">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa6=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao06=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '07' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento7 = $linha[0];
$codigo_cliente7 = $linha[25];


$mesa07 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario7 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '07'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa7 = $linha[2];

$situacao07 = $linha[3];

}

if(empty($mesa07)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '07' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento7 = $linha[0];
$codigo_cliente7 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario7; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente7; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento7; ?>">
                  <?
if($situacao07=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa07'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="07">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa7=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao07=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '08' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento8 = $linha[0];
$codigo_cliente8 = $linha[25];


$mesa08 = $linha[46];
$mesa2 = $linha[47];

	$comandadofuncionario8 = $linha[61];
}


$sql = "SELECT * FROM mesas2 where mesa = '08'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa8 = $linha[2];

$situacao08 = $linha[3];

}

if(empty($mesa08)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '08' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento8 = $linha[0];
$codigo_cliente8 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario8; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente8; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento8; ?>">
                  <?
if($situacao08=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa08'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="08">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa8=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao08=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        </tr>
        <tr>
          <td bgcolor="#cccccc"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '09' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento9 = $linha[0];
$codigo_cliente9 = $linha[25];


$mesa09 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario9 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '09'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa9 = $linha[2];

$situacao09 = $linha[3];

}

if(empty($mesa09)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '09' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento9 = $linha[0];
$codigo_cliente9 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario9; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente9; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento9; ?>">
                  <?
if($situacao09=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa09'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="09">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa9=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao09=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table></td>
          <td bgcolor="#cccccc"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '10' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento10 = $linha[0];
$codigo_cliente10 = $linha[25];


$mesa10 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario10 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '10'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa10 = $linha[2];

$situacao10 = $linha[3];

}

if(empty($mesa10)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '10' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento10 = $linha[0];
$codigo_cliente10 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario10; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente10; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento10; ?>">
                  <?
if($situacao10=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa10'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="10">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa10=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao10=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table></td>
          <td bgcolor="#cccccc">&nbsp;</td>
          <td bgcolor="#cccccc">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#ffffff">&nbsp;</td>
          <td bgcolor="#ffffff">&nbsp;</td>
          <td bgcolor="#ffffff">&nbsp;</td>
          <td bgcolor="#ffffff">&nbsp;</td>
        </tr>
        <tr>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '11' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento11 = $linha[0];
$codigo_cliente11 = $linha[25];


$mesa11 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario11 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '11'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa11 = $linha[2];

$situacao11 = $linha[3];

}

if(empty($mesa11)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '11' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento11 = $linha[0];
$codigo_cliente11 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario11; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente11; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento11; ?>">
                  <?
if($situacao11=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa11'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="11">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa11=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao11=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '12' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento12 = $linha[0];
$codigo_cliente12 = $linha[25];


$mesa12 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario12 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '12'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa12 = $linha[2];

$situacao12 = $linha[3];

}

if(empty($mesa12)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '12' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento12 = $linha[0];
$codigo_cliente12 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario12; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente12; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento12; ?>">
                  <?
if($situacao12=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa12'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="12">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa12=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao12=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '13' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento13 = $linha[0];
$codigo_cliente13 = $linha[25];


$mesa13 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario13 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '13'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa13 = $linha[2];

$situacao13 = $linha[3];

}

if(empty($mesa13)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '13' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento13 = $linha[0];
$codigo_cliente13 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario13; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente13; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento13; ?>">
                  <?
if($situacao13=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa13'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="13">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa13=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao13=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '14' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento14 = $linha[0];
$codigo_cliente14 = $linha[25];


$mesa14 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario14 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '14'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa14 = $linha[2];

$situacao14 = $linha[3];

}

if(empty($mesa14)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '14' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento14 = $linha[0];
$codigo_cliente14 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario14; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente14; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento14; ?>">
                  <?
if($situacao14=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa14'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="14">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa14=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao14=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
        </tr>
                <tr>
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '15' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento15 = $linha[0];
$codigo_cliente15 = $linha[25];


$mesa15 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario15 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '15'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa15 = $linha[2];

$situacao15 = $linha[3];

}

if(empty($mesa15)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '15' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento15 = $linha[0];
$codigo_cliente15 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario15; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente15; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento15; ?>">
                  <?
if($situacao15=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa15'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="15">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa15=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao15=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '16' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento16 = $linha[0];
$codigo_cliente16 = $linha[25];


$mesa16 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario16 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '16'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa16 = $linha[2];

$situacao16 = $linha[3];

}

if(empty($mesa16)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '16' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento16 = $linha[0];
$codigo_cliente16 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario16; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente16; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento16; ?>">
                  <?
if($situacao16=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa16'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="16">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa16=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao16=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '17' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento17 = $linha[0];
$codigo_cliente17 = $linha[25];


$mesa17 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario17 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '17'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa17 = $linha[2];

$situacao17 = $linha[3];

}

if(empty($mesa17)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '17' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento17 = $linha[0];
$codigo_cliente17 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario17; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente17; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento17; ?>">
                  <?
if($situacao17=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa17'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="17">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa17=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao17=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '18' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento18 = $linha[0];
$codigo_cliente18 = $linha[25];


$mesa18 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario18 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '18'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa18 = $linha[2];

$situacao18 = $linha[3];

}

if(empty($mesa18)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '18' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento18 = $linha[0];
$codigo_cliente18 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario18; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente18; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento18; ?>">
                  <?
if($situacao18=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa18'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="18">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa18=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao18=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        </tr>
                <tr>
                  <td bgcolor="#cccccc"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '19' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento19 = $linha[0];
$codigo_cliente19 = $linha[25];


$mesa19 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario19 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '19'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa19 = $linha[2];

$situacao19 = $linha[3];

}

if(empty($mesa19)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '19' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento19 = $linha[0];
$codigo_cliente19 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario19; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente19; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento19; ?>">
                  <?
if($situacao19=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa19'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="19">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa19=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao19=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table></td>
                  <td bgcolor="#cccccc"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '20' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento20 = $linha[0];
$codigo_cliente20 = $linha[25];


$mesa20 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario20 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '20'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa20 = $linha[2];

$situacao20 = $linha[3];

}

if(empty($mesa20)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '20' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento20 = $linha[0];
$codigo_cliente20 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario20; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente20; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento20; ?>">
                  <?
if($situacao20=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa20'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="20">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa20=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao20=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table></td>
                  <td bgcolor="#cccccc">&nbsp;</td>
                  <td bgcolor="#cccccc">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#ffffff">&nbsp;</td>
                  <td bgcolor="#ffffff">&nbsp;</td>
                  <td bgcolor="#ffffff">&nbsp;</td>
                  <td bgcolor="#ffffff">&nbsp;</td>
                </tr>

        <tr>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '21' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento21 = $linha[0];
$codigo_cliente21 = $linha[25];


$mesa21 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario21 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '21'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa21 = $linha[2];

$situacao21 = $linha[3];

}

if(empty($mesa21)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '21' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento21 = $linha[0];
$codigo_cliente21 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario21; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente21; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento21; ?>">
                  <?
if($situacao21=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa21'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="21">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa21=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao21=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '22' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento22 = $linha[0];
$codigo_cliente22 = $linha[25];


$mesa22 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario22 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '22'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa22 = $linha[2];

$situacao22 = $linha[3];

}

if(empty($mesa22)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '22' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento22 = $linha[0];
$codigo_cliente22 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario22; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente22; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento22; ?>">
                  <?
if($situacao22=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa22'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="22">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa22=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao22=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '23' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento23 = $linha[0];
$codigo_cliente23 = $linha[25];


$mesa23 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario23 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '23'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa23 = $linha[2];

$situacao23 = $linha[3];

}

if(empty($mesa23)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '23' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento23 = $linha[0];
$codigo_cliente23 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario23; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente23; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento23; ?>">
                  <?
if($situacao23=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa23'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="23">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa23=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao23=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '24' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento24 = $linha[0];
$codigo_cliente24 = $linha[25];


$mesa24 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario24 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '24'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa24 = $linha[2];

$situacao24 = $linha[3];

}

if(empty($mesa24)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '24' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento24 = $linha[0];
$codigo_cliente24 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario24; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente24; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento24; ?>">
                  <?
if($situacao24=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa24'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="24">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa24=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao24=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
        </tr>
                <tr>
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '25' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento25 = $linha[0];
$codigo_cliente25 = $linha[25];


$mesa25 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario25 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '25'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa25 = $linha[2];

$situacao25 = $linha[3];

}

if(empty($mesa25)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '25' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento25 = $linha[0];
$codigo_cliente25 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario25; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente25; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento25; ?>">
                  <?
if($situacao25=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa25'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="25">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa25=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao25=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '26' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento26 = $linha[0];
$codigo_cliente26 = $linha[25];


$mesa26 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario26 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '26'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa26 = $linha[2];

$situacao26 = $linha[3];

}

if(empty($mesa26)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '26' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento26 = $linha[0];
$codigo_cliente26 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario26; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente26; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento26; ?>">
                  <?
if($situacao26=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa26'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="26">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa26=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao26=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '27' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento27 = $linha[0];
$codigo_cliente27 = $linha[25];


$mesa27 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario27 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '27'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa27 = $linha[2];

$situacao27 = $linha[3];

}

if(empty($mesa27)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '27' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento27 = $linha[0];
$codigo_cliente27 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario27; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente27; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento27; ?>">
                  <?
if($situacao27=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa27'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="27">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa27=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao27=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '28' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento28 = $linha[0];
$codigo_cliente28 = $linha[25];


$mesa28 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario28 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '28'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa28 = $linha[2];

$situacao28 = $linha[3];

}

if(empty($mesa28)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '28' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento28 = $linha[0];
$codigo_cliente28 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario28; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente28; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento28; ?>">
                  <?
if($situacao28=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa28'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="28">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa28=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao28=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        </tr>
                <tr>
                  <td bgcolor="#cccccc"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '29' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento29 = $linha[0];
$codigo_cliente29 = $linha[25];


$mesa29 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario29 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '29'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa29 = $linha[2];

$situacao29 = $linha[3];

}

if(empty($mesa29)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '29' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento29 = $linha[0];
$codigo_cliente29 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario29; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente29; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento29; ?>">
                  <?
if($situacao29=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa29'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="29">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa29=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao29=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table></td>
                  <td bgcolor="#cccccc"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '30' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento30 = $linha[0];
$codigo_cliente30 = $linha[25];


$mesa30 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario30 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '30'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa30 = $linha[2];

$situacao30 = $linha[3];

}

if(empty($mesa30)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '30' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento30 = $linha[0];
$codigo_cliente30 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario30; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente30; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento30; ?>">
                  <?
if($situacao30=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa30'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="30">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa30=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao30=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table></td>
                  <td bgcolor="#cccccc">&nbsp;</td>
                  <td bgcolor="#cccccc">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#ffffff">&nbsp;</td>
                  <td bgcolor="#ffffff">&nbsp;</td>
                  <td bgcolor="#ffffff">&nbsp;</td>
                  <td bgcolor="#ffffff">&nbsp;</td>
                </tr>

        <tr>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '31' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento31 = $linha[0];
$codigo_cliente31 = $linha[25];


$mesa31 = $linha[46];
$mesa2 = $linha[47];

	$comandadofuncionario31 = $linha[61];
}


$sql = "SELECT * FROM mesas2 where mesa = '31'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa31 = $linha[2];

$situacao31 = $linha[3];

}

if(empty($mesa31)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '31' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento31 = $linha[0];
$codigo_cliente31 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario31; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente31; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento31; ?>">
                  <?
if($situacao31=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa31'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="31">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa31=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao31=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '32' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento32 = $linha[0];
$codigo_cliente32 = $linha[25];


$mesa32 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario32 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '32'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa32 = $linha[2];

$situacao32 = $linha[3];

}

if(empty($mesa32)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '32' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento32 = $linha[0];
$codigo_cliente32 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario32; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente32; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento32; ?>">
                  <?
if($situacao32=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa32'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="32">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa32=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao32=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '33' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento33 = $linha[0];
$codigo_cliente33 = $linha[25];


$mesa33 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario33 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '33'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa33 = $linha[2];

$situacao33 = $linha[3];

}

if(empty($mesa33)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '33' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento33 = $linha[0];
$codigo_cliente33 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario33; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente33; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento33; ?>">
                  <?
if($situacao33=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa33'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="33">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa33=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao33=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '34' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento34 = $linha[0];
$codigo_cliente34 = $linha[25];


$mesa34 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario34 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '34'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa34 = $linha[2];

$situacao34 = $linha[3];

}

if(empty($mesa34)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '34' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento34 = $linha[0];
$codigo_cliente34 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario34; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente34; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento34; ?>">
                  <?
if($situacao34=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa34'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="34">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa34=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao34=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
        </tr>
                <tr>
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '35' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento35 = $linha[0];
$codigo_cliente35 = $linha[25];


$mesa35 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario35 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '35'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa35 = $linha[2];

$situacao35 = $linha[3];

}

if(empty($mesa35)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '35' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento35 = $linha[0];
$codigo_cliente35 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario35; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente35; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento35; ?>">
                  <?
if($situacao35=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa35'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="35">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa35=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao35=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '36' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento36 = $linha[0];
$codigo_cliente36 = $linha[25];


$mesa36 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario36 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '36'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa36 = $linha[2];

$situacao36 = $linha[3];

}

if(empty($mesa36)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '36' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento36 = $linha[0];
$codigo_cliente36 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario36; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente36; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento36; ?>">
                  <?
if($situacao36=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa36'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="36">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa36=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao36=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '37' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento37 = $linha[0];
$codigo_cliente37 = $linha[25];


$mesa37 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario37 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '37'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa37 = $linha[2];

$situacao37 = $linha[3];

}

if(empty($mesa37)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '37' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento37 = $linha[0];
$codigo_cliente37 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario37; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente37; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento37; ?>">
                  <?
if($situacao37=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa37'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="37">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa37=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao37=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        <td bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '38' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento38 = $linha[0];
$codigo_cliente38 = $linha[25];


$mesa38 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario38 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '38'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa38 = $linha[2];

$situacao38 = $linha[3];

}

if(empty($mesa38)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '38' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento38 = $linha[0];
$codigo_cliente38 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario38; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente38; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento38; ?>">
                  <?
if($situacao38=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa38'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="38">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa38=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao38=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        </tr>
                <tr>
                  <td bgcolor="#cccccc"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '39' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento39 = $linha[0];
$codigo_cliente39 = $linha[25];


$mesa39 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario39 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '39'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa39 = $linha[2];

$situacao39 = $linha[3];

}

if(empty($mesa39)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '39' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento39 = $linha[0];
$codigo_cliente39 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario39; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente39; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento39; ?>">
                  <?
if($situacao39=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa39'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="39">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa39=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao39=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table></td>
                  <td bgcolor="#cccccc"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '40' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento40 = $linha[0];
$codigo_cliente40 = $linha[25];


$mesa40 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario40 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '40'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa40 = $linha[2];

$situacao40 = $linha[3];

}

if(empty($mesa40)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '40' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento40 = $linha[0];
$codigo_cliente40 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario40; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente40; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento40; ?>">
                  <?
if($situacao40=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa40'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="40">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa40=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao40=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table></td>
                  <td bgcolor="#cccccc">&nbsp;</td>
                  <td bgcolor="#cccccc">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#ffffff">&nbsp;</td>
                  <td bgcolor="#ffffff">&nbsp;</td>
                  <td bgcolor="#ffffff">&nbsp;</td>
                  <td bgcolor="#ffffff">&nbsp;</td>
                </tr>

        <tr>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '41' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento41 = $linha[0];
$codigo_cliente41 = $linha[25];


$mesa41 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario41 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '41'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa41 = $linha[2];

$situacao41 = $linha[3];

}

if(empty($mesa41)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '41' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento41 = $linha[0];
$codigo_cliente41 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario441; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente41; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento41; ?>">
                  <?
if($situacao41=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa41'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="41">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa41=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao41=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '42' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento42 = $linha[0];
$codigo_cliente42 = $linha[25];


$mesa42 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario42 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '42'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa42 = $linha[2];

$situacao42 = $linha[3];

}

if(empty($mesa42)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '42' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento42 = $linha[0];
$codigo_cliente42 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario42; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente42; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento42; ?>">
                  <?
if($situacao42=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa42'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="42">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa42=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao42=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '43' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento43 = $linha[0];
$codigo_cliente43 = $linha[25];


$mesa43 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario43 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '43'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa43 = $linha[2];

$situacao43 = $linha[3];

}

if(empty($mesa43)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '43' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento43 = $linha[0];
$codigo_cliente43 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario43; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente43; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento43; ?>">
                  <?
if($situacao43=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa43'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="43">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa43=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao43=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
          <td bgcolor="#CCCCCC"><div align="center">
            <table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '44' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento44 = $linha[0];
$codigo_cliente44 = $linha[25];


$mesa44 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario44 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '44'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa44 = $linha[2];

$situacao44 = $linha[3];

}

if(empty($mesa44)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '44' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento44 = $linha[0];
$codigo_cliente44 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario44; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente44; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento44; ?>">
                  <?
if($situacao44=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa44'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="44">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa44=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao44=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
          </div></td>
        </tr>
                <tr>
        <td align="center" bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '45' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento45 = $linha[0];
$codigo_cliente45 = $linha[25];


$mesa45 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario45 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '45'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa45 = $linha[2];

$situacao45 = $linha[3];

}

if(empty($mesa45)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '45' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento45 = $linha[0];
$codigo_cliente45 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario45; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente45; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento45; ?>">
                  <?
if($situacao45=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa45'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="45">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa45=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao45=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        <td align="center" bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '46' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento46 = $linha[0];
$codigo_cliente46 = $linha[25];


$mesa46 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario46 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '46'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa46 = $linha[2];

$situacao46 = $linha[3];

}

if(empty($mesa46)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '46' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento46 = $linha[0];
$codigo_cliente46 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario46; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente46; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento46; ?>">
                  <?
if($situacao46=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa46'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="46">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa46=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao46=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        <td align="center" bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '47' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento47 = $linha[0];
$codigo_cliente47 = $linha[25];


$mesa47 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario47 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '47'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa47 = $linha[2];

$situacao47 = $linha[3];

}

if(empty($mesa47)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '47' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento47 = $linha[0];
$codigo_cliente47 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario47; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente47; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento47; ?>">
                  <?
if($situacao47=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa47'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="47">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa47=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao47=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        <td align="center" bgcolor="#ffffff"><div align="center"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '48' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento48 = $linha[0];
$codigo_cliente48 = $linha[25];


$mesa48 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario48 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '48'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa48 = $linha[2];

$situacao48 = $linha[3];

}

if(empty($mesa48)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '48' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento48 = $linha[0];
$codigo_cliente48 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario48; ?>">
                  <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente48; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento48; ?>">
                  <?
if($situacao48=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa48'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="48">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa48=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao48=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table>
        
        
        </div>
        </td>
        
        </tr>
                <tr>
                  <td align="center" bgcolor="#cccccc"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '49' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento49 = $linha[0];
$codigo_cliente49 = $linha[25];


$mesa49 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario49 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '49'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa49 = $linha[2];

$situacao49 = $linha[3];

}

if(empty($mesa49)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '49' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento49 = $linha[0];
$codigo_cliente49 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario49; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente49; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento49; ?>">
                  <?
if($situacao49=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa49'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="49">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa49=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao49=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table></td>
                  <td align="center" bgcolor="#cccccc"><table width="100%" border="0">
              <tr>
                <td width="64%"><form name="form3" method="post" action="../orcamentos/orcamento.php">
                  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                  <?            
            
$sql = "SELECT * FROM orcamentos where mesa = '50' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento50 = $linha[0];
$codigo_cliente50 = $linha[25];


$mesa50 = $linha[46];
$mesa2 = $linha[47];
	$comandadofuncionario50 = $linha[61];

}


$sql = "SELECT * FROM mesas2 where mesa = '50'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$statusmesa50 = $linha[2];

$situacao50 = $linha[3];

}

if(empty($mesa50)){
	
	
$sql = "SELECT * FROM orcamentos where mesa2 = '50' order by dataabertura,horaabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento50 = $linha[0];
$codigo_cliente50 = $linha[25];


$juntocomamesa = $linha[46];

}

	
	
}
            
?>
                  <input name="nome" type="hidden" id="nome" value="<? echo $comandadofuncionario50; ?>">
<input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente50; ?>">
                  <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento50; ?>">
                  <?
if($situacao50=="PRINCIPAL"){
echo "<span class='style10'><input class='class05'  type='submit' name='button3' id='button3' value='MESA $mesa50'></span>";
}
	
	
?>
                </form></td>
                <td width="36%"><form method="post" action="atribuicao_de_mesas2.php">
                  <div align="center">
                    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                    <input name="mesa_liberar" type="hidden" id="mesa_liberar" value="50">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "liberar_mesa"; ?>">
                    <? //if($statusmesa50=="OCUPADA"){ echo "<input class='class05'  type='submit' name='button2' id='button2' value='L'>"; } ?>
                  </div>
                </form></td>
              </tr>
              <tr>
                <td colspan="2"><div align="center">
                  <?
if($situacao50=="PRINCIPAL"){

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
                </div></td>
              </tr>
            </table></td>
                  <td align="center" bgcolor="#cccccc">&nbsp;</td>
                  <td align="center" bgcolor="#cccccc">&nbsp;</td>
  </tr>


</table>
<p align="center">
  <?
$date_hoje = date('Y-m-d');

  

$sql = "SELECT * FROM orcamentos where  departamento = '$ultimo_departamento_trabalhado' and dataabertura = '$date_hoje' and mesa = '' and status = 'Aberto' and caixa_rapido <> 'sim' order by dataabertura,horaabertura asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];

$dataabertura = $linha[1];

$horaabertura = $linha[2];

$nome = $linha[27];

$total_da_comanda = $linha[7];






?>
</p>
<table width="100%"  border="0">

        <tr bgcolor="#ffffff">

          <td class="style1"><div align="center" class="style3"><span class="style11"><strong>COMANDA</strong></span></div></td>
          <td class="style1"><div align="center">Total</div></td>
          <td class="style1"><div align="center" class="style3"><span class="style11"><strong>Data</strong></span></div></td>
          <td class="style1"><div align="center" class="style3"><span class="style11"><strong>Hora</strong></span></div>            </td>
  </tr>

		

        <tr>

          <td width="10%" class="style1">               <form name="form2" method="post" action="atribuicao_de_mesas_dispositivomovel2.php">
            <div align="center" class="style3">

              <span class="style11">
            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <input name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
            <input name="codigo_abrir" type="hidden" id="codigo_abrir" value="<? echo $cod_cli; ?>">
            <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "atribuir_mesa"; ?>">
            <input type="submit" name="button" id="button" span class="class01" value="<? echo $nome; ?>">
            </span></div>
          </form></td>
          <td width="7%" class="style11"><div align="center"><? echo " R$ $total_da_comanda"; ?></div></td>
          <td width="7%" class="style11"><div align="center"><span class="style11"><? echo $dataabertura;?></span></div></td>
          <td width="7%" class="style1">

          <div align="center" class="style3"><span class="style11"><? echo $horaabertura;?></span></div></td>

          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>





<? } ?>
</table>
<p align="center"><span class="style5"><strong><? echo $site; ?></strong></span> <br>
  <? echo $endereco; ?> , <? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?> <br>
  <? echo "Telefone / Fax: ". $telefone." "; ?> / <? echo $fax; ?> <br>
  <? echo "E-Mail: ". $email_empresa; ?></p>
</body>

</html>

