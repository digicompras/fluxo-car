<?php

session_start(); //inicia sess�o...

if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...

echo ""; //se for emite mensagem positiva.

else //se n�o for...

header("Location: alerta.php");



?>



<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
.style2 {color: #0000FF;

	font-weight: bold;
}
</style>
</head>



<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="3"><?

//require("conect/conect.php"); or die("erro na requisi��o");

require '../../conect/conect.php';

error_reporting(E_ALL);



?>                    </td>
    </tr>

    <tr>

      <td width="13%">&nbsp;</td>

      <td width="39%"><strong><font color="#0000FF" size="4">O que deseja fazer com os clientes?</font></strong></td>
      <td width="48%">&nbsp;</td>
    </tr>

    <tr>

      <td><form action="../principal.php" method="post" name="form1" target="_top">
        <input type="submit" name="Submit7" value="Voltar ao menu principal">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      </form></td>

      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td>&nbsp;</td>
      <td><form action="listagem_e_totalizacao_de_dependentes_cadastrados.php" method="post" name="form4" target="_blank">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit4" value="Listagem e totaliza&ccedil;&atilde;o de Dependentes cadastrados">
      </form></td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><form name="form5" method="post" action="editar_cliente_por_codigo.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="codigo" type="text" id="codigo">
        <input type="submit" name="Submit" value="Editar Cliente por N&ordm; de Matr&iacute;cula Dependente">
      </form></td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td><form name="form3" method="post" action="editar.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="num_cateira_dependente" type="text" id="num_cateira_dependente">
        <input type="submit" name="Submit3" value="Editar por N&ordm; Carteira Dependente">
      </form></td>
      <td>&nbsp;</td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td colspan="2"><form name="form4" method="post" action="menu.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="titular" type="text" id="nome2" value="TODOS" size="50">
        <input type="submit" name="Submit9" value="Buscar dependentes por titular">
      </form></td>
    </tr>
  </table>

<p>&nbsp; </p>
<table width="100%"  border="0">
  <tr>
    <td><div align="center" class="style2">Nome do Dependente </div></td>
    <td><div align="center" class="style2"><strong>Cadastro efetuado por</strong></div></td>
    <td><div align="center" class="style2">cpf</div></td>
    <td><div align="center" class="style2">Celular</div></td>
    <td><div align="center" class="style2"></div></td>
  </tr>
  <?
$titular = $_POST['titular'];



if($titular=="TODOS"){

$sql = "select * from dependentes order by nome asc";

}

else{

if(empty($nome)){

$sql = "select * from dependentes where titular = '.' order by nome asc";



}

else{

$sql = "select * from dependentes where titular like '$titular%' order by nome asc";

}}

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

//$operador_alterou = $linha[33];

//$cel_operador_alterou = $linha[34];

//$email_operador_alterou = $linha[35];

//$estabelecimento_alterou = $linha[36];

//$cidade_estabelecimento_alterou = $linha[37];

//$tel_estabelecimento_alterou = $linha[38];

//$email_estabelecimento_alterou = $linha[39];

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
$obs_das_margens = $linha[127];


$valor_parcela = $linha[128];
$saldo_devedor = $linha[129];
$parcelas_em_aberto = $linha[130];
$prazo_contrato = $linha[131];
$aprovacao = $linha[132];
$valor_liberado = $linha[133];




?>
  <tr>
    <td width="20%" valign="top"><div align="center">
      <form name="form1" method="post" action="editar_por_codigo.php" >
        <div align="center">
          <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo;  ?>">
          <input type="submit" name="Submit5" value="<? echo $nome; ?>">
          </div>
        </form>
    </div></td>
    <td width="17%" valign="top"><div align="center"><strong><font color="#0000FF"><? echo $operador; ?></font></strong></div></td>
    <td width="13%" valign="top"><div align="center"><strong><font color="#0000FF"><? echo $cpf; ?></font></strong></div></td>
    <td width="14%" valign="top"><div align="center"><strong><font color="#0000FF"><? echo $celular; ?></font></strong></div></td>
    <td width="23%" valign="top"><div align="center"></div></td>
  </tr>
  <? } ?>
</table>
</body>

</html>

