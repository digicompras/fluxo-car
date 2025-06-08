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
<title>LISTANDO TODAS AS PROPOSTAS PAGAS DO PERIODO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style4 {font-size: 9px}
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
  
      <p>
        <? } ?>
      </p>
      <form action="menu.php" method="post" name="form1" target="navegacao">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "cupons"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="Submit2" value="Voltar">
      </form>
<p>&nbsp;</p>
<p>
        <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>
</p>
<? echo "Relatório gerado no período de $dia_inicial-$mes_inicial-$ano_inicial até $dia_final-$mes_final-$ano_final"; ?>
<br>
      <br>
      <table width="100%"  border="0">
        <tr bgcolor="#<? echo "008080"; ?>">
          <td><div align="center" class="style4">N&ordm; cupom</div></td>
          <td><div align="center" class="style4">Cliente</div></td>
          <td><div align="center" class="style4">Data Cadastro</div></td>
          <td><div align="center" class="style4">CPF</div></td>
          <td><div align="center" class="style4">Cidade</div></td>
          <td><div align="center" class="style4">Estado</div></td>
          <td width="5%"><div align="center" class="style4">Telefone</div></td>
          <td width="6%"><div align="center" class="style4">Celular</div></td>
          <td><div align="center" class="style4">E-Mail</div></td>
          <td><div align="center" class="style4">Operador</div></td>
          <td><div align="center" class="style4">Ag&ecirc;ncia</div></td>
        </tr>
        <?
$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];


$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$datafinal = "$ano_final-$mes_final-$dia_final";



$sql = "SELECT * FROM cupons where datacadastro between '$datainicial'and '$datafinal' order by datacadastro,horacadastro asc";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$codigo = $linha[0];

$nome = $linha[1];

$cpf = $linha[4];

$cidade = $linha[15];

$estado = $linha[16];

$telefone = $linha[18];

$celular = $linha[19];

$email = $linha[20];

$operador = $linha[21];

$estabelecimento = $linha[24];

$datacadastro = $linha[29];

$horacadastro = $linha[30];





?>
        <tr>
          <td width="6%"><form action="imprime_cupom.php" method="post" name="form2" target="_blank" class="style4">
            <div align="center">
              <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
              <input name="codigo" type="hidden" id="num_proposta6" value="<? echo $codigo; ?>">
              <input type="submit" name="Submit323" value="<? echo $codigo; ?>">
            </div>
          </form></td>
          <td width="19%"><div align="center" class="style4"><? echo $nome;?></div></td>
          <td width="8%"><div align="center" class="style4"><? echo $datacadastro;?><? echo " - $horacadastro";?></div></td>
          <td width="7%"><div align="center"><? echo $cpf; ?></div></td>
          <td width="7%"><div align="center"><? echo $cidade; ?></div></td>
          <td width="7%"><div align="center" class="style4"><? echo $estado; ?></div></td>
          <td><div align="center" class="style4"><? echo $telefone;?></div></td>
          <td><div align="center" class="style4"><? echo $celular; ?></div></td>
          <td width="9%"><div align="center" class="style4"><? echo $email;?></div></td>
          <td width="11%"><div align="center" class="style4"><? echo $operador;?></div></td>
          <td width="15%"><div align="center" class="style4"><? echo $estabelecimento;?></div></td>
          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
          <? } ?>
</table>
<p>&nbsp;</p>



</body>
</html>
