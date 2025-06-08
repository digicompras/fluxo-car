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
<title>LISTANDO CLIENTES A IMPORTAR PARA O BANCO DE DADOS</title>
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





      <p>
        <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>
</p>
      <form name="form1" method="post" action="../principal.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit2" value="Voltar ao menu principal">
</form>
      <br>
      <br>
<table width="100%"  border="0">                    
<?


$sql = "select * from clientes_importados_saocarlos";

$resultado=mysql_query($sql);

$registros_total = mysql_num_rows($resultado);



?>


        <tr bgcolor="#<? echo $cor ?>">
          <td colspan="9"><?	

$sql = "SELECT * FROM clientes order by nome asc";

$res = mysql_query($sql);

$registros = mysql_num_rows($res);





echo "Total de registros encontrados no banco de dados ---> ".$registros;

?></td>
        </tr>
        <tr bgcolor="#<? echo $cor ?>">
          <td colspan="9"><div align="center"><? echo "Total de registros a ser importado para o banco de dados $registros_total";  ?></div></td>
        </tr>
        <tr bgcolor="#<? echo $cor ?>">
          <td colspan="9"><div align="center"><?
$cidade = $_POST['cidade'];
$cidade_old = $_POST['cidade_old'];


$sql = "select * from clientes_importados_saocarlos where cidade = '$cidade_old'";

$resultado=mysql_query($sql);

$registros_total = mysql_num_rows($resultado);

?>

            <? echo "Total de registros a ser importado para o banco de dados por cidade $registros_total";  ?>
            <form name="form2" method="post" action="clientes_a_importar.php">
              <select name="cidade_old" id="estado">
                <option selected>Selecione</option>
                <?





    $sql = "select * from clientes_importados_saocarlos group by cidade order by cidade asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['cidade']."</option>";

    }

?>
              </select>
              <select name="cidade" id="cidade">
                <option selected>Selecione</option>
                <?





    $sql = "select * from cidades order by cidade asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['cidade']."</option>";

    }

?>
              </select>
              <input type="submit" name="button" id="button" value="Atualizar">
            </form>
            </div></td>
        </tr>
        <tr bgcolor="#<? echo $cor ?>">
          <td><div align="center" class="style3">Cliente</div></td>
          <td><div align="center" class="style3">CPF</div></td>
          <td width="2%"><div align="center" class="style3">Benef&iacute;cio</div></td>
          <td width="5%"><div align="center" class="style3">Endere&ccedil;o</div></td>
          <td><div align="center" class="style3">Bairro</div></td>
          <td><div align="center" class="style3">CEP</div></td>
          <td><div align="center" class="style3">Cidade</div></td>
          <td><div align="center" class="style3">Estado</div></td>
          <td><div align="center" class="style3">Telefone</div></td>
        </tr>

<?
$sql = "SELECT * FROM clientes_importados_saocarlos where cidade = '$cidade_old' order by codigo asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$beneficio = $linha[1];
$nome = $linha[2];
$cpf = $linha[4];
$dcpf = $linha[5];
$endereco = $linha[7];
$bairro = $linha[8];
$cep = $linha[9];
//$cidade = $linha[10];
$estado = $linha[11];
$ddd = $linha[12];
$telefone = $linha[13];

?>
		
        <tr>
          <td width="12%">
            <div align="center" class="style3"><? echo $nome; ?></div></td>
          <td width="7%"><div align="center" class="style3"><? echo "$cpf$dcpf"; ?></div></td>
          <td><div align="center" class="style3"><? echo $beneficio; ?></div></td>
          <td><div align="center" class="style3"><? echo $endereco; ?></div></td>
          <td width="6%"><div align="center" class="style3"><? echo $bairro; ?></div></td>
          <td width="11%"><div align="center" class="style3"><? echo $cep; ?></div></td>

          <td width="11%"><div align="center"><span class="style3"><? echo $cidade; ?></span></div></td>
          <td width="11%"><div align="center"><span class="style3"><? echo $estado; ?></span></div></td>
          <td width="11%"><div align="center"><span class="style3"><? echo $telefone; ?></span></div></td>




<?

//ATUALIZA CADASTRO DE CLIENTES



$sql2 = "select * from db";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {





$comando = "update `$linha[1]`.`clientes_importados_saocarlos` set `codigo` = '$codigo',`cidade` = '$cidade' where `clientes_importados_saocarlos`. `codigo` = '$codigo'";





mysql_query($comando,$conexao);



}


?> 

<?
$cpfverificar = "$cpf$dcpf";

$sql3 = "SELECT * FROM clientes where cpf = '$cpfverificar'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$reg = mysql_num_rows($res3);


}

if($reg==0){


$comando = "insert into clientes(nome,cpf,endereco,bairro,cep,cidade,estado,telefone,num_beneficio) values('$nome','$cpfverificar','$endereco','$bairro','$cep','$cidade','$estado','$ddd$telefone','$beneficio')";



mysql_query($comando,$conexao);


$comando = "delete from `clientes_importados_saocarlos` where `clientes_importados_saocarlos`. `codigo` = '$codigo'";



mysql_query($comando,$conexao);



}
else{

$comando = "delete from `clientes_importados_saocarlos` where `clientes_importados_saocarlos`. `codigo` = '$codigo'";



mysql_query($comando,$conexao);


}

?>












          <? } ?>
</table>

<p>&nbsp;</p>



</body>
</html>
