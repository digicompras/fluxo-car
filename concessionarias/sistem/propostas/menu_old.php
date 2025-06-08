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
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	color: #FF0000;
	font-weight: bold;
	font-size: <? echo $tamanho_fonte; ?>;
}
.style2 {
	color: #1328c9;
	font-weight: bold;
	font-size: 12px;
}
.style3 {font-size: 10px}
.style4 {font-size: 10px; font-weight: bold; }

.style10 {
	color: #1328c9;
	font-weight: bold;
	font-size: 24px;
}

-->
</style>
</head>
<script language="javascript">

function foco(cpf)

{

document.getElementById(cpf).focus();

}

</script>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <table width="100%" border="0" cellspacing="10">
    <tr>
      <td colspan="4"><?
//require("conect/conect.php"); or die("erro na requisição");
require '../../conect/conect.php';
//error_reporting(E_ALL);


$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_operador = $linha[0];

$nome_operador = $linha[1];

}

$hoje = date('Y-m-d');

  
$efetuar_proposta = $_POST['efetuar_proposta'];  
$cpf = $_POST['cpf'];  

?>
</td>
    </tr>
    <tr>
      <td width="16%">&nbsp;</td>
      <td colspan="3"><strong><font color="#0000FF" size="4">O que deseja fazer com as propostas?</font></strong></td>
    </tr>
    <tr>
      <td><form name="form1" method="post" action="../index.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit22" value="Voltar ao menu principal">
      </form></td>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4"><div align="center">
        <?

$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and status <> 'RECUSADO PELA MESA DE CREDITO' and status <> 'CANCELADO A PEDIDO DO OPERADOR' and dias_atraso >= '1' order by num_proposta desc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

$num_proposta = $linha[0];



}

if($registros>="1"){
echo "<div align='center' class='style1'><blink>ATENÇÃO!!!... $nome_operador você tem $registros propostas em atraso para enviar o físico para Matriz</blink></div>";


$sql2 = "select * from db";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {



$comando = "update `$linha[1]`.`operadores` set `codigo` = '$codigo_operador',`bloqueio_parcial` = 'Sim' where `operadores`. `codigo` = '$codigo_operador'";

mysql_query($comando,$conexao);

}


}
?>
      </div></td>
    </tr>
    <tr>
      <td><div align="center"></div></td> 
      <td width="27%"><form action="menu.php" method="post" name="form2">
        <div align="center">
          <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador;  ?>">
          <input name="efetuar_proposta" type="hidden" id="efetuar_proposta" value="Sim">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
<?

$sql3 = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {

$bloqueio_parcial = $linha[57];
}


if($bloqueio_parcial=="Não"){

          echo "<input type='submit' name='Submit2' value='Efetuar Proposta'>";
}

else{

echo "<div align='center' class='style1'><blink>Bloqueado para efetuar proposta</blink></div>";

}		  
		  
		  
		  
?>
          </div>
      </form></td>
      <td width="25%"><form action="menu.php" method="post" name="form5">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador;  ?>">
        <input name="cpf" type="hidden" id="cpf" value="sim">
        <input type="submit" name="Submit5" value="Pesquisar Propostas por CPF">
      </form></td>
      <td width="32%"><form name="form4" method="post" action="informe_num_proposta_para_impressao.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit" value="Impress&atilde;o de propostas">
      </form></td>
    </tr>
    <tr>
      <td height="40"><div align="center"></div></td> 
      <td><form action="../clientes/verifica.php" method="post" enctype="multipart/form-data" name="form1">
        <table width="100%"  border="0">
          <tr>
            <td width="35%"><? if(empty($efetuar_proposta)){}else{ echo "Informe o CPF"; } ?></td>
            <td width="10%"><? if(empty($efetuar_proposta)){}else{ echo "<input name='cpf' type='text' id='cpf'>"; } ?></td>
            <td width="55%"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                <? if(empty($efetuar_proposta)){}else{ echo "<input type='submit' name='Submit3' value='Verificar'>"; } ?></td>
          </tr>
        </table>
      </form></td>
      <td><form action="pesquiza_propostas_por_cpf.php" method="post" enctype="multipart/form-data" name="form1">
        <table width="100%"  border="0">
          <tr>
            <td width="35%"><? if(empty($cpf)){}else{ echo "Informe o CPF"; } ?></td>
            <td width="10%"><? if(empty($cpf)){}else{ echo "<input name='cpf' type='text' id='cpf'>"; } ?></td>
            <td width="55%"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                <? if(empty($cpf)){}else{ echo "<input type='submit' name='Submit3' value='Verificar'>"; } ?></td>
          </tr>
        </table>
      </form></td>
      <td>&nbsp;</td>
    </tr>
  </table>
<p></p>

<table width="100%"  border="0">
  <tr bgcolor="#<? echo "ffffff"; ?>">
    <td><div align="center" class="style3"><strong>N&ordm; Proposta </strong></div></td>
    <td><div align="center" class="style4">Data Proposta</div></td>
    <td><div align="center" class="style4">Prazo Limite para entrega do f&iacute;sico</div></td>
    <td><div align="center" class="style4">Dias em atraso</div></td>
    <td><div align="center" class="style4">Parecer do F&iacute;sico</div></td>
  </tr>
    <?
//$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and status <> 'RECUSADO PELA MESA DE CREDITO' and status <> 'CANCELADO A PEDIDO DO OPERADOR' and prazo_final <> '0000-00-00' order by num_proposta desc limit 500";


$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and prazo_final <> '0000-00-00' order by num_proposta desc limit 500";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;

$num_proposta = $linha[0];
$obs_fisico = $linha[122];

$data_proposta = $linha[152];
$prazo_final = $linha[153];



//------------------------------------------------------

//Separação dos valores (ano,mes,dia) data_proposta
$arr1 = explode("-", $hoje);
 
$anolimite1 = $arr1[0];
$meslimite1 = $arr1[1];
$dialimite1 = $arr1[2];

//-------------------------------------------------------

//Separação dos valores (ano,mes,dia) data_proposta
$arr2 = explode("-", $prazo_final);
 
$anolimite2 = $arr2[0];
$meslimite2 = $arr2[1];
$dialimite2 = $arr2[2];

//--------------------------------------------------------

//calculo timestam das duas datas
$timestamp1 = mktime(0,0,0,$meslimite1,$dialimite1,$anolimite1);
$timestamp2 = mktime(0,0,0,$meslimite2,$dialimite2,$anolimite2); 


//diminuo a uma data a outra
$segundos_diferenca = $timestamp1 - $timestamp2;
//echo $segundos_diferenca;

//converto segundos em dias
$dias_diferenca = $segundos_diferenca / (60 * 60 * 24);

//obtenho o valor absoluto dos dias (tiro o possível sinal negativo)
//$dias_diferenca = abs($dias_diferenca);

//tiro os decimais aos dias de diferenca
$dias_diferenca = floor($dias_diferenca);


$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

if($dias_diferenca>="11"){

$dias_atraso = bcsub($dias_diferenca,10);

$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`dias_diferenca` = '$dias_diferenca',`dias_atraso` = '$dias_atraso' where `propostas`. `num_proposta` = '$num_proposta'";

}
else{
$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`dias_diferenca` = '$dias_diferenca' where `propostas`. `num_proposta` = '$num_proposta'";
}
}

mysql_query($comando,$conexao) or die("Erro ao alterar informações desse cadastro");


?>

  <tr>
    <td width="15%"><form action="imprimir_proposta.php" method="post" name="form2" target="_blank">
      <div align="center" class="style3">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">
        <? if($dias_diferenca<="0"){
}
else{
echo $num_proposta;
}
 ?>
        <? if($dias_diferenca<="0"){
}
else{ echo "<input type='submit' name='button' id='button' value='Visualizar Proposta'>"; } ?>
      </div>
    </form></td>
    <td width="20%"><div align="center" class="style3"><? if($dias_diferenca<="0"){
}
else{echo $data_proposta; } ?> </div></td>
    <td width="16%"><div align="center"><span class="style3"><? if($dias_diferenca<="0"){
}
else{ echo $prazo_final; } ?></span></div></td>
    <td width="13%"><div align="center" class="style3"><? 

if($dias_diferenca<="0"){
}
else{
echo $dias_diferenca;
} 
?></div></td>
    <td width="36%"><div align="center">
      <textarea name="hist_fisico" cols="70" rows="2" readonly="readonly" id="hist_fisico"><?  
$sql = "SELECT * FROM historico_fisico where num_proposta = '$num_proposta' order by codigo desc";
$res = mysql_query($sql);
$reg = 0;
//echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$num_proposta = $linha[1];
$obs_fisico = $linha[2];
$data = $linha[3];
$hora = $linha[7];
$operador_informante = $linha[8];
$estabelecimento = $linha[9];


echo "$data - "." $hora - "." $operador_informante - "." $obs_fisico ";
?>

<?

if($reg==1){
//echo "</tr>";
$reg=0;
}


}
	  
	  
	  
	  
	   ?>
      </textarea>
    </div></td>
    <? } ?>
  <tr>
    <td><span class="style3"></span></td>
    <td><span class="style3"></span></td>
    <td><div align="center"><span class="style3"></span></div></td>
    <td><div align="center"><span class="style3"></span></div></td>
    <td><div align="center"></div></td>
</table>

<p>&nbsp; </p>
</body>
</html>
