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
.style1 {	color: #0000FF;
	font-weight: bold;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
</head>

<?

require '../../../conect/conect.php';
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$hoje = date('d-m-Y');
	

		
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); } ?>"

<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>

background="../background/<? printf("$linha[1]"); } ?>" bgproperties="fixed">
  
  <table width="96%" border="0" cellspacing="10">
    <tr>
      <td colspan="3"><?
error_reporting(E_ALL);

?>


<?
$sql = "SELECT * FROM adm where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];
$celular_op = $linha[19];
$email_op = $linha[20];
$estabelecimento_op = $linha[24];
$cidade_estabelecimento_op = $linha[25];
$tel_estabelecimento_op = $linha[26];
$email_estabelecimento_op = $linha[27];
$funcao = $linha[43];
$estab_pertence_op = $linha[44];
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];
}


?>

<?
$sql = "SELECT * FROM cx_entradas where datacadastro = '$hoje'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$datacadastro = $linha[3];
}


?>




      </td>
    </tr>
    <tr>
      <td colspan="3"><strong><font color="#0000FF" size="4">O que deseja fazer no caixa <span class="style1"><? echo $nome_op; ?></span> ?</font></strong></td>
    </tr>
    <tr>
      <td><form name="form1" method="post" action="../principal.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit22" value="Voltar ao menu principal">
      </form></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><form action="abertura_de_caixa.php" method="post" name="form2">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
if(mysql_num_rows($res)==0){
        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';
		}
?>
      </form></td>
      <td><form action="../pagar/re_imprimir_pagar.php" method="post" name="form2">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
if($funcao=="Administrativo_Geral"){
		echo "Informe o N&ordm; do 7.1<br>";
		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';
        echo'<input type="submit" name="Submit2" value="Re-Imprimir Saidas">';
		}
?>
            </form></td>
      <td><form action="../receber/re_imprimir_receber.php" method="post" name="form2">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
if($funcao=="Administrativo_Geral"){
		echo "Informe o N&ordm; do 7.1<br>";
		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';
        echo'<input type="submit" name="Submit2" value="Re-Imprimir Entradas">';
		}
?>
            </form></td>
    </tr>
    <tr>
      <td width="31%"><form name="form5" method="post" action="relatorio_mes_e_ano_lojas_sintetico.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <select name="nfantasia" id="select4">
          <option selected></option>
          <?


    $sql = "select * from estabelecimentos order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
        </select>
        <?
if(mysql_num_rows($res)>=1){

  echo '<input name="mes" type="text" id="mes" size="2" maxlength="4">';
  echo '<input name="ano" type="text" id="ano" size="4" maxlength="6">';

  echo'<input type="submit" name="Submit" value="Fechamento Mensal todas Lojas">';
  }
		
		?>
      </form></td>
      <td width="36%"><form action="../pagar/editar_pagar.php" method="post" name="form2">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
if($funcao=="Administrativo_Geral"){
		echo "Informe o Nº do 7.1<br>";
		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';
        echo'<input type="submit" name="Submit2" value="Editar Saidas">';
		}
?>
            </form></td>
      <td width="33%"><form action="../receber/editar_receber.php" method="post" name="form2">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
if($funcao=="Administrativo_Geral"){
		echo "Informe o Nº do 7.1<br>";
		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';
        echo'<input type="submit" name="Submit2" value="Editar Entradas">';
		}
?>
            </form></td>
    </tr>
    <tr>
      <td><form name="form5" method="post" action="../receber/receber.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
if(mysql_num_rows($res)>=1){

  echo'<input type="submit" name="Submit" value="Lan&ccedil;amento de entradas">';
  }
		
		?>
      </form></td>
      <td colspan="2" valign="top"><form action="imprimir_caixa_por_data.php" method="post" name="form4" target="_blank">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        
        <?
if(mysql_num_rows($res)>=1){

		echo "Informe a data que deseja<br>";
		echo '<input name="datacadastro" type="text" id="datacadastro" size="15" maxlength="10">';
        echo'<input type="submit" name="Submit32" value="Verifica caixa geral por data">';
		}
		?>
                              </form></td>
    </tr>
    <tr>
      <td><form name="form4" method="post" action="../pagar/pagar.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
if(mysql_num_rows($res)>=1){

        echo'<input type="submit" name="Submit3" value="Lan&ccedil;amento de Sa&iacute;das">';
		}
		
		?>
      </form></td>
      <td colspan="2" valign="top"><form action="imprimir_cx_por_loja_por_data.php" method="post" name="form4" target="_blank">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
Informe a loja e a data<br>
        <select name="nfantasia" id="nfantasia">
                          <option selected></option>
                          <?


    $sql = "select * from estabelecimentos order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
        </select>
		<?
if(mysql_num_rows($res)>=1){



		echo '<input name="datacadastro" type="text" id="datacadastro" size="15" maxlength="10">';
        echo'<input type="submit" name="Submit32" value="Verifica caixa por loja e data">';
		}
		?>
            </form></td>
    </tr>
    <tr>
      <td><form name="form4" method="post" action="relatorio_geral_cx_diario.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
if(mysql_num_rows($res)>=1){

        echo'<input type="submit" name="Submit32" value="Verifica caixa geral do dia">';
		}
		?>
      </form></td>
      <td colspan="2"><form action="imprimir_cx_mensal_por_loja.php" method="post" name="form4" target="_blank">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>Informe a loja e o m&ecirc;s<br>
        <select name="nfantasia" id="select2">
          <option selected></option>
          <?


    $sql = "select * from estabelecimentos order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
        </select>
        <?
if(mysql_num_rows($res)>=1){



		echo '<input name="mes" type="text" id="mes" size="2" maxlength="2">';
		echo '<input name="ano" type="text" id="ano" size="4" maxlength="4">';
        echo'<input type="submit" name="Submit32" value="Verifica caixa mensal por loja">';
		}
		?>
            </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><form action="imprimir_cx_por_loja_hoje.php" method="post" name="form4" target="_blank">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        Informe a loja<br>
        <select name="nfantasia" id="select3">
          <option selected></option>
          <?


    $sql = "select * from estabelecimentos order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
        </select>
        <?
if(mysql_num_rows($res)>=1){


        echo'<input type="submit" name="Submit33" value="Verifica caixa por loja de hoje">';
		}
		?>
                  </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
<p>&nbsp; </p>
</body>
</html>
