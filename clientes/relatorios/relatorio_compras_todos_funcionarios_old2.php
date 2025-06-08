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
<title>LISTANDO TODAS AS PROPOSTAS PAGAS DO CORRESPONDENTE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
}
-->
</style>
</head>
<?

require '../../conect/conect.php';

$codigo = $_POST['codigo'];
$mes_ano = $_POST['mes_ano'];
$nome_usuario = $_POST['nome'];
$nfantasia = $_POST['nfantasia'];


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





      <p>
        <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>
</p>
      <form name="form1" method="post" action="menu.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $nfantasia; ?>">
        <strong><font color="#0000FF">
        </font></strong>        
        <input type="submit" name="Submit2" value="Voltar">
</form>
      <table width="100%"  border="0">
        <tr>
          <td colspan="4"><div align="left"><span class="style2">
                  
          Listando todas as compras de <? echo $nome_usuario;?> da empresa conveniada:</span> <span class="style2"><? echo $nfantasia; ?>
no m&ecirc;s-refer&ecirc;ncia <? echo $mes_ano; ?></span></div></td>
        </tr>
        <tr>
          <td width="35%"><div align="right"></div></td>
          <td width="15%">&nbsp;</td>
          <td width="24%">&nbsp;</td>
          <td width="26%">&nbsp;</td>
        </tr>
        <tr>
          <td><div align="right">Total a repassar para Digicompras </div></td>
          <td><div align="center">
            <?
$sql = "select sum(valor_compra) as total from compras where estab_pertence = '$nfantasia' and mes_ano = '$mes_ano'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total_geral = $linha['total'];

echo "R$ ".$valor_total_geral;
?>
          </div></td>
          <td><div align="center">
          </div></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <br>
<table width="100%"  border="0">
        <tr bgcolor="#<? echo $cor ?>">

          <td>N&ordm; Compra</td>
          <td><div align="center">Usu&aacute;rio</div></td>
          <td><div align="center">N&ordm; Cart&atilde;o </div></td>
          <td><div align="center">Total gasto no cart&atilde;o </div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
<?

			
$sql = "SELECT * FROM usuarios where estab_pertence = '$nfantasia' order by nome asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros++;

$codigo = $linha[0];
$nome = $linha[1];
$cpf = $linha[2];
$endereco = $linha[3];
$numero = $linha[4];
$bairro = $linha[5];
$cep = $linha[6];
$telefone = $linha[7];
$celular = $linha[8];
$estab_pertence = $linha[9];
$cidade_estab_pertence = $linha[10];
$tel_estab_pertence = $linha[11];
$email_estab_pertence = $linha[12];
$valor_compra = $linha[13];
$data_compra = $linha[14];
$hora_compra = $linha[15];
$num_cartao = $linha[20];
$estab_pertence_com = $linha[21];
$tel_estab_pertence_com = $linha[22];
$cidade_estab_pertence_com = $linha[23];
$email_estab_pertence_com = $linha[24];
$operador_realizou = $linha[26];
$cel_operador_realizou = $linha[27];
$email_operador_realizou = $linha[28];


//calcula o total das compras do funcionario no mes
$sql = "select sum(valor_compra) as total from compras where num_cartao = '$codigo' and mes_ano = '$mes_ano' and nome = '$nome'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total_usuario = $linha['total'];



?>
        <tr>
          <td width="12%"><div align="center">               <form name="form2" method="post" action="grava_entrega_de_cartoes.php">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              
  <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
  <input name="status_de_envio" type="hidden" id="status_de_envio" value="<? echo "Entregue"; ?>">
  <input name="data_entrega" type="hidden" id="data_entrega" value="<? echo date('d-m-Y'); ?>">
            <? echo $codigo; ?> 
          </form></div></td>
          <td width="31%"><div align="center"><? echo $nome;?></div></td>
          <td width="15%"><div align="center"><? echo $codigo; ?></div></td>
          <td width="15%"><div align="center"><? echo "R$ ".$valor_total_usuario; ?></div></td>
          <td width="12%">&nbsp;</td>
          <td width="15%">&nbsp;</td>
          <?
if($reg==1){
echo "</tr>";
$reg=0;
}
}

?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        <tr>
          <td><div align="center">Opera&ccedil;&otilde;es <? echo $registros;?></div></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>
		  </td>
</table>

<p>&nbsp;</p>



</body>
</html>
