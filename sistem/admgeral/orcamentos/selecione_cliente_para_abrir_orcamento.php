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
<title>Sele&ccedil;&atilde;o de clientes para abrir or&ccedil;amento</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}
.style2 {
	color: #0000FF;
	font-weight: bold;
}
-->
</style></head>

<body>
<p>        
<?



require '../../conect/conect.php';

$nome = $_POST['nome'];


?>
</p>
<form action="../principal.php" method="post" name="form1" target="_top">
  <input type="submit" name="Submit2" value="Voltar ao menu principal">
  <span class="style1">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  </span>
</form>
<table width="100%" border="0">
  <tr>
    <td colspan="3"><form action="historico_cliente.php" method="post" enctype="multipart/form-data" name="form1">
      Selecione o nome  para abrir um or&ccedil;amento<span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      <select name="nome" id="select6">
        <option selected></option>
        <?


    $sql = "select * from clientes order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
    }
?>
        </select>
      <input type="submit" name="Submit" value="Abrir Or&ccedil;amento">
    </form></td>
    <td colspan="2"><div align="center">Cancelamento de Pedidos</div></td>
  </tr>
  <tr>
    <td colspan="3"><form action="selecione_cliente_para_abrir_orcamento.php" method="post" enctype="multipart/form-data" name="form1">
      Informe o nome ou parte dele para buscar o cliente <span class="style1">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      <input name="nome" type="text" id="nome" value="<? echo $nome; ?>" size="40">
      <input type="submit" name="Submit3" value="Buscar">
    </form></td>
    <td colspan="2"><div align="center">
      <form name="form2" method="post" action="cancela_pedido.php">
        <input name="codigo_orcamento" type="text" id="codigo_orcamento" size="5">
        <input type="submit" name="button" id="button" value="Cancelar Pedido">
      </form>
    </div></td>
  </tr>
  <tr>
    <td width="22%">&nbsp;</td>
    <td width="22%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="19%">&nbsp;</td>
    <td width="17%">&nbsp;</td>
  </tr>
</table>
<table width="100%"  border="1">
  <tr>
    <td><div align="center" class="style2">Nome</div></td>
    <td><div align="center" class="style2">Cidade</div></td>
    <td><div align="center" class="style2">Estado</div></td>
    <td><div align="center" class="style2">Telefone</div></td>
    <td><div align="center" class="style2">Email</div></td>
    <td><div align="center" class="style2">Comprador</div></td>
    <td><div align="center" class="style2">Celular</div></td>
  </tr>
  <?
if(empty($nome)) {
echo "Digite o nome do cliente ou parte dele na caixa acima e clique em buscar para executar sua pesquisa.";

}else{	  
$sql = "select * from clientes where nome like '$nome%' order by nome asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];

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

$tem_margem = $linha[90];
$saldo1 = $linha[91];
$saldo2 = $linha[92];
$saldo3 = $linha[93];
$saldo4 = $linha[94];
$saldo5 = $linha[95];
$saldo6 = $linha[96];
$saldo7 = $linha[97];

$local_trabalho = $linha[134];
$fone_comercial = $linha[135];
$newsletter = $linha[136];

?>
  <tr>
    <td width="13%"><form name="form1" method="post" action="historico_cliente.php">
        <div align="center">
          <input name="nome" type="hidden" id="codigo2" value="<? echo $nome; ?>">
          <input type="submit" name="Submit4" value="<? echo $nome; ?>">
        </div>
    </form></td>
    <td width="15%"><div align="center"><? echo $cidade; ?></div></td>
    <td width="9%"><div align="center"><? echo $estado; ?></div></td>
    <td width="10%"><div align="center"><? echo $fone; ?></div></td>
    <td width="21%"><div align="center"><? echo $email_cliente; ?></div></td>
    <td width="20%"><div align="center"><? echo $comprador; ?></div></td>
    <td width="12%"><div align="center"><? echo $celular; ?></div></td>
  </tr>
<? }} ?>
</table>
<p>&nbsp;</p>

<form action="selecione_cliente_para_abrir_orcamento.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%"  border="0">

    <tr>

      <td colspan="3"><div align="center"><strong>Relat&oacute;rio de or&ccedil;amentos por per&iacute;odo</strong></div></td>
    </tr>

    <tr>

      <td width="34%">Informe o per&iacute;odo que deseja</td>

      <td colspan="2">

        Loja 
          <select name="loja" id="dia_inicial">
            <?





    $sql = "select * from orcamentos group by loja order by loja asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['loja']."</option>";

    }

?>
          </select> 
        De
<select name="dia_inicial" id="select3">

          <?





    $sql = "select * from orcamentos where diaabertura <> '' group by diaabertura order by diaabertura asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['diaabertura']."</option>";

    }

?>
        </select>

        <select name="mes_inicial" id="select4">

<?

    $sql = "select * from orcamentos where mesabertura <> '' group by mesabertura order by mesabertura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mesabertura']."</option>";

    }

?>
        </select>

        <select name="ano_inicial" id="select5">

<?

    $sql = "select * from orcamentos where anoabertura <> '' group by anoabertura order by anoabertura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['anoabertura']."</option>";

    }

?>
        </select> 

        at&eacute; 

        <select name="dia_final" id="select11">

<?


    $sql = "select * from orcamentos group by diaabertura order by diaabertura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['diaabertura']."</option>";

    }

?>
        </select>

        <select name="mes_final" id="select12">


<?

    $sql = "select * from orcamentos group by mesabertura order by mesabertura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mesabertura']."</option>";

    }

?>
        </select>

        <select name="ano_final" id="select13">



<?

    $sql = "select * from orcamentos group by anoabertura order by anoabertura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['anoabertura']."</option>";

    }

?>
        </select>      </td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td width="28%"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit523222" value="Gerar relat&oacute;rio">      </td>

      <td width="38%">&nbsp;</td>
    </tr>
  </table>

</form>

<table width="100%"  border="0">
  
  <?
  

  
if(empty($dia_inicial)) {
//echo "Digite o nome do cliente ou parte dele na caixa acima e clique em buscar para executar sua pesquisa.";

}else{	  

$loja = $_POST['loja'];
  
  
$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";

$datafinal = "$ano_final-$mes_final-$dia_final";




$sql = "select * from orcamentos where loja = '$loja' and dataabertura between '$datainicial'and '$datafinal' order by dataabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}
echo "Registros encontrados no periodo de $datainicial a $datafinal -->> $registros";

echo "<tr>
    <td><div align='center' class='style2'>Nº</div></td>
    <td><div align='center' class='style2'>Condicao</div></td>
    <td><div align='center' class='style2'>Status</div></td>
    <td><div align='center' class='style2'>Data</div></td>
    <td><div align='center' class='style2'>Cliente</div></td>
    <td><div align='center' class='style2'>Operador</div></td>
    <td><div align='center' class='style2'>Totoal</div></td>
	    <td><div align='center' class='style2'></div></td>
    <td><div align='center' class='style2'></div></td>

  </tr>";

  
$sql = "select * from orcamentos where loja = '$loja' and dataabertura between '$datainicial'and '$datafinal' order by dataabertura asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);


$codigo_orcamento = $linha[0];
$dataabertura = $linha[1];
$condicao = $linha[16];
$status = $linha[17];
$operador = $linha[12];
$total_geral = $linha[7];
$nome = $linha[27];
$operador = $linha[12];
$codigo_cliente = $linha[25];


echo "<tr>
    <td width='5%'><div align='center'><span class='style1'>$codigo_orcamento</span></td>
    <td width='5%'><div align='center'><span class='style1'>$condicao</span></td>
    <td width='5%'><div align='center'><span class='style1'>$status</span></td>
    <td width='5%'><div align='center'><span class='style1'>$dataabertura</span></td>
    <td width='20%'><div align='center'><span class='style1'>$nome</span></div></td>
    <td width='20%'><div align='center'><span class='style1'>$operador</span></div></td>
    <td width='12%'><div align='center'><span class='style1'>R$ $total_geral<span></div></td>
    <td width='12%'><div align='center'><form action='imprime_orcamento.php' method='post' name='form2' target='_blank'>
              <span class='style1'>
                
              <input name='codigo_orcamento' type='hidden' id='codigo_orcamento' value='$codigo_orcamento'>
              <input type='submit' name='button' id='button' value='Imprimir'></span>
              </form></div></td>
    <td width='12%'><div align='center'><form action='imprime_orcamento_para_cliente.php' method='post' name='form2' target='_blank'>
              <span class='style1'>
              
              <input name='codigo_cliente' type='hidden' id='codigo_cliente' value='$codigo_cliente'>
              <input name='codigo_orcamento' type='hidden' id='codigo_orcamento' value='$codigo_orcamento'>
               <input type='submit' name='button2' id='button2' value='Imprimir p/ Cliente'></span>
            </form></div></td>

  </tr>";

}
?>
  <? } ?>
</table>
</body>
</html>
