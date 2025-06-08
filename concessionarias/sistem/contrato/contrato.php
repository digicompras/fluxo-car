<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

?>
<html>
<head>
<title>ESPA&Ccedil;O MADEIRO - (16) 3722-3598 CARNE DO CLIENTE</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style3 {
	font-size: 14;
	font-weight: bold;
}
.style4 {font-size: 14}
.style6 {font-size: 12}
-->
</style>
</head>

<?
//require("conexao.php"); or die("erro na requisição");
require '../../conect/conect.php';
?>

<?

$dia = date('d');
$mes = date('m');
$ano = date('Y');
$date = date('Y-m-d');

?>


<?
//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 
$sql = "SELECT * FROM fundo_navegacao";
//EXECUTA O COMANDO ACIMA
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$reg++;
?>


<body bgcolor="#<? printf("ffffff"); ?>">
  <span class="style4">
<?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>
  
<? } ?>

<?

$cpf = $_POST['cpf'];


$sql = "SELECT * FROM clientes where cpf = '$cpf'";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {

$codigo_cli = $linha[0];
$nome_cli = $linha[1];
$sexo_cli = $linha[2];
$estadocivil_cli = $linha[3];
$cpf_cli = $linha[4];
$rg_cli = $linha[5];
$orgao_cli = $linha[6];
$emissao_cli = $linha[7];
$data_nasc_cli = $linha[8];
$pai_cli = $linha[9];
$mae_cli = $linha[10];
$endereco_cli = $linha[11];
$numero_cli = $linha[12];
$bairro_cli = $linha[13];
$complemento_cli = $linha[14];
$cidade_cli = $linha[15];
$estado_cli = $linha[16];
$cep_cli = $linha[17];
$telefone_cli = $linha[18];
$celular_cli = $linha[19];
$email_cli = $linha[20];
$operador_cli = $linha[21];
$cel_operador_cli = $linha[22];
$email_operador_cli = $linha[23];
$estabelecimento_cli = $linha[24];
$cidade_estabelecimento_cli = $linha[25];
$tel_estabelecimento_cli = $linha[26];
$email_estabelecimento_cli = $linha[27];
$obs_cli = $linha[28];
$datacadastro_cli = $linha[29];
$horacadastro_cli = $linha[30];
$dataalteracao_cli = $linha[31];
$horaalteracao_cli = $linha[32];
$operador_alterou_cli = $linha[33];
$cel_operador_alterou_cli = $linha[34];
$email_operador_alterou_cli = $linha[35];
$estabelecimento_alterou_cli = $linha[36];
$cidade_estabelecimento_alterou_cli = $linha[37];
$tel_estabelecimento_alterou_cli = $linha[38];
$email_estabelecimento_alterou_cli = $linha[39];
$banco = $linha[41];
$agencia = $linha[42];
$conta = $linha[43];
$num_beneficio = $linha[44];
$num_beneficio2 = $linha[73];
$num_beneficio3 = $linha[74];
$num_beneficio4 = $linha[75];

$resposta = $linha[119];

}
?>



<?

$objeto = $_POST['objeto'];

$sql = "SELECT * FROM contratos_movimentacao where objeto = '$objeto' and statuscontrato = 'A Executar' and cpf = '$cpf_cli' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_contrato = $linha[0];
$bjeto = $linha[1];
$statuscontrato = $linha[2];

}


?>
<?
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$razaosocial = $linha[1];
$nfantasia = $linha[2];
$cnpj = $linha[3];
$inscr_est = $linha[4];
$endereco = $linha[5];
$numero = $linha[6];
$bairro = $linha[7];
$complemento = $linha[8];
$cep = $linha[9];
$cidade = $linha[10];
$estado = $linha[11];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
?>
<?
$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
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
$estab_pertence_op = $linha[44];
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];

}
?>
  </span>
<table width="100%"  border="0">
  <tr>
    <td width="42%" rowspan="3" valign="top" class="style4"><div align="center"></div>
    <div align="center"></div></td>
    <td width="19%" class="style4"><div align="center">
      <?


$sql = "SELECT * FROM logo";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$logo = $linha[1];

$reg++;

printf("<img src='../../imagens/$logo' border='0'  width='$linha[2]' height='$linha[3]'><br><br>"); 

}
?>
    </div></td>
    <td width="39%" class="style4">&nbsp;</td>
  </tr>
  <tr>
    <td class="style4">&nbsp;</td>
    <td class="style4">&nbsp;</td>
  </tr>
  <tr>
    <td class="style4">&nbsp;</td>
    <td class="style4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center" class="style3"><? echo "$objeto Nº $num_contrato/$ano"; ?></div></td>
  </tr>
  <tr>
    <td><span class="style6">Contratante</span></td>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6">O(a) contratante <strong><strong><? echo $nome_cli; ?></strong></strong>,  CPF <strong> <? echo $cpf_cli; ?></strong>e RG.<strong> <? echo $rg_cli; ?></strong>, situado(a) &agrave; rua/av<strong> <strong><? echo $endereco_cli; ?></strong></strong>,<br>
n&uacute;mero <strong><strong><strong><strong><? echo $numero_cli; ?></strong></strong></strong></strong>, complemento <strong><? echo $complemento_cli; ?></strong>bairro<strong><strong><? echo $bairro_cli; ?></strong></strong> CEP <strong><? echo $cep_cli; ?></strong>, na cidade <strong><? echo $cidade_cli; ?></strong>estado de <strong><? echo $estado_cli; ?></strong>, celular <strong><? echo $celular_cli; ?></strong>, email <strong><? echo $email_cli; ?></strong> devidamente identificado pelo seu nome de contratante. </span></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">Contratada</td>
  </tr>
  <tr>
    <td colspan="3"><p class="style6">    A contratada <? echo $razaosocial; ?>, CNPJ <? echo $cnpj; ?>, Inscr. Est. : <? echo $inscr_est; ?><br>
    <br> localizada no endere&ccedil;o <? echo $endereco; ?>  n&ordm; <? echo $numero; ?>, bairro <? echo $bairro; ?>, em <? echo $cidade; ?> estado <br><br>de <? echo $estado; ?>, doravante chamada pelo nome fantasia <? echo $nfantasia; ?>.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  
  
  <tr>
    <td colspan="3"><div align="center" class="style6"><strong>DADOS DO EVENTO </strong></div></td>
  </tr>
  <tr>
    <td colspan="3" class="style6">Quantidade de eventos <strong><? echo $quant_eventos; ?></strong> - N&ordm; de pessoas <strong><? echo $numero_pessoas; ?></strong> - Categoria <strong><? echo $categoria; ?> </strong>- Sub-Categoria <strong><? echo $sub_categoria; ?></strong> - data do evento <strong><? echo $data_evento; ?></strong> Dia da semana <strong><? echo $dia_semana_evento; ?></strong> Dias para prepara&ccedil;&atilde;o <strong><? echo $preparacao_dias; ?></strong> - Site <strong><? echo $site; ?> - </strong>Mural<strong> <strong><? echo $mural; ?><strong> - </strong></strong></strong>Buffet<strong><strong><strong> <strong><? echo $buffet; ?><strong> - </strong></strong></strong></strong></strong>Cerimonial <strong><? echo $cerimonia; ?></strong> -Decora&ccedil;&atilde;o <strong><? echo $decoracao; ?> </strong>- Fotografia <strong><? echo $fotografia; ?> </strong>- Video <strong><? echo $video; ?> </strong>- Dj <strong><? echo $dj; ?> </strong>- Banda<strong> <? echo $banda; ?> </strong>- Bolos e doces<strong> <? echo $bolos_e_doces; ?> </strong>- Ilumina&ccedil;&atilde;o<strong> <? echo $iluminacao; ?> </strong>- Bartender<strong> <? echo $bartender; ?> </strong>- Respons&aacute;vel <strong><? echo $responsavel; ?></strong></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center" class="style6"><strong>DADOS DO PAGAMENTO </strong></div></td>
  </tr>
  <tr>

    <td colspan="3">
    <table width="100%" border="0">
        <tr>
          <td><div align="center">Valor total</div></td>
          <td><div align="center">Valor Entrada</div></td>
          <td><div align="center">Valor a Parcelar</div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td><div align="center"><strong><? echo "R$ ". $valor_total; ?></strong></div></td>
          <td><div align="center"><strong><? echo "R$ ". $valor_entrada; ?></strong></div></td>
          <td><div align="center"><strong><? echo "R$ ". $valor_restante; ?></strong></div></td>
          <td><div align="center"></div></td>
          <td><div align="center"></div></td>
        </tr>
        <tr>
          <td width="14%"><div align="center"><span class="style6">N&ordm; e quant parcelas</span></div></td>
          <td width="25%"><div align="center"><span class="style6">Valor da mensalidade</span></div></td>
          <td width="16%"><div align="center"><span class="style6">vencimento</span></div></td>
          <td width="22%"><div align="center">Juros di&aacute;rios (Em caso de atraso)</div></td>
          <td width="23%"><div align="center">Modo Pagamento</div></td>
        </tr>
  <?
$sql = "SELECT * FROM contas_a_receber where codigo_cli = '$codigo_cli' and quitacao = 'Em Aberto' order by codigo asc ";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$mensalidade = $linha[11];
$vencto = $linha[12];
$quant_parc = $linha[13];
$modo_pagto = $linha[14];
$juros_diarios = $linha[15];
$num_mensalidade = $linha[35];


?>
        <tr>
          <td><div align="center"><span class="style6"><strong><? echo "$num_mensalidade de $quant_parc"; ?></strong></span></div></td>
          <td><div align="center"><span class="style6"><strong><? echo "R$ ". $mensalidade; ?></strong></span></div></td>
          <td><div align="center"><span class="style6"><strong><? echo $vencto; ?></strong></span></div></td>
          <td><div align="center"><strong><? echo "R$ ". $juros_diarios; ?></strong></div></td>
          <td><div align="center"><strong><? echo $modo_pagto; ?></strong></div></td>
        </tr>
      <?  }  ?>    
      </table>   
        
    </td>
    
  </tr>
  <tr>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
  </tr>
<?

$objeto = $_POST['objeto'];

$sql = "SELECT * FROM contratos_movimentacao where objeto = '$objeto' and statuscontrato = 'A Executar' and cpf = '$cpf_cli' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_contrato = $linha[0];
$bjeto = $linha[1];
$statuscontrato = $linha[2];
$identificacao = $linha[3];
$finalizacao = $linha[4];

}


?>

  <tr>
    <td colspan="3"><div align="center" class="style6">
      <p align="center"><strong><? echo $identificacao; ?></strong></p>
    </div></td>
  </tr>

  <tr>
    <td colspan="3"><p class="style6">&nbsp;</p></td>
  </tr>
<?

$objeto = $_POST['objeto'];

$sql = "SELECT * FROM contratos_clausulas_movimentacao where num_contrato = '$num_contrato' order by num_clausula asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigoclausula = $linha[0];
$num_contrato = $linha[1];
$cod_contrato = $linha[2];
$objeto = $linha[3];
$num_clausula = $linha[4];
$descricao_clausula = $linha[5];

}


?>
  
  <tr>
    <td colspan="3"><div align="justify"><? echo "$num_clausula<br> $descricao_clausula<br><br>"; ?></div></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><p class="style6">As partes elegem o F&oacute;rum de Franca para dirimirem qualquer d&uacute;vida a respeito do presente contrato, dispensando qualquer outro por mais privilegiado que seja. </p>    </td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3" class="style6"><div align="center"><? echo $finalizacao; ?></div></td>
  </tr>
  <tr>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center" class="style6">
      <p align="center">Franca – SP, <? echo $datacadastro; ?></p>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><strong>CONTRATANTE</strong></div></td>
    <td>&nbsp;</td>
    <td><div align="center"><strong>CONTRATADA</strong></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <div align="center">_________________________________________<br>
           <? echo "$nome_cli"; ?><br><? echo $cpf_cli; ?><br>           
           Assinatura
      
      
      </div> 
      </td>
    <td><div align="center">
      <div align="center">
        
<br>
      <div align="center"></div>
    </div>      <div align="center">
      <div align="center">
        <div align="center"></div>
      </div></td>
    <td><div align="center"><img src="../../assinatura/assinatura.jpg" alt="" width="305" height="80"><br>
        <? echo $razaosocial; ?> (<? echo $nfantasia; ?>)<br> <? echo $cnpj; ?>
    </div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <div align="center"></div>
    </div></td>
    <td><div align="center">
      <p align="center">&nbsp;</p>
      </div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <div align="center"><br>
      </div>      <div align="center">Assinatura </div></td>
    <td><div align="center">
        <div align="center"><br>
        <div align="center"></div>
    </div>      <div align="center">
        <div align="center">
          <div align="center"></div>
        </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>