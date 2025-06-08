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

$codigo = $_POST['codigo'];


$sql = "SELECT * FROM clientes where codigo = '$codigo'";
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

$sql = "SELECT * FROM registro_visitas where cod_cli = '$codigo_cli' order by num_proposta desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


//$num_proposta = $linha[0];

$quant_eventos = $linha[176];
$site = $linha[177];
$data_evento = $linha[178];
$date_evento = $linha[179];
$dia_evento = $linha[180];
$mes_evento = $linha[181];
$ano_evento = $linha[182];
$dia_semana_evento = $linha[183];
$mural = $linha[184];
$pre_reserva = $linha[185];
$lista_espera = $linha[186];
$preparacao_dias = $linha[187];
$ocorrencia = $linha[188];
$categoria = $linha[189];
$sub_categoria = $linha[190];
$buffet = $linha[191];
$cerimonia = $linha[192];
$numero_pessoas = $linha[193];
$decoracao = $linha[194];
$responsavel = $linha[195];
$fotografia = $linha[196];
$video = $linha[197];
$estrela = $linha[198];
$conjuge1 = $linha[199];
$conjuge2 = $linha[200];
$dj = $linha[201];
$banda = $linha[202];
$contatos = $linha[203];
$bolos_e_doces = $linha[204];
$valor = $linha[205];
$iluminacao = $linha[206];
$forma_pagamento = $linha[207];
$bartender = $linha[208];
$como_chegou_ate_nos = $linha[209];
$fechou = $linha[210];
$contrato = $linha[211];
$realizada = $linha[212];





}

?>


<?

$sql = "SELECT * FROM contratos where codigo_cli = '$codigo_cli' order by num_contrato desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$num_contrato = $linha[0];
$valor_total = $linha[84];
$valor_entrada = $linha[85];
$valor_restante = $linha[86];




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
    <td width="33%" rowspan="3" valign="top" class="style4"><div align="center">
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
    </div>
    <div align="center"></div></td>
    <td width="40%" class="style4"><form name="form1" method="post" action="javascript:window.close()">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit" value="Fechar">
    </form></td>
    <td width="27%" class="style4">&nbsp;</td>
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
    <td colspan="3"><div align="center" class="style3">CONTRATO PARTICULAR DE PRESTA&Ccedil;&Atilde;O DE SERVI&Ccedil;OS E OUTRAS AVEN&Ccedil;AS N&ordm; <? echo $num_contrato; ?></div></td>
  </tr>
  <tr>
    <td><span class="style6">1 - &nbsp; DAS PARTES </span></td>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><p class="style6">      1.1 <br>
    A contratada <? echo $razaosocial; ?>, CNPJ <? echo $cnpj; ?>, Inscr. Est. : <? echo $inscr_est; ?><br>
    <br> localizada no endere&ccedil;o <? echo $endereco; ?>  n&ordm; <? echo $numero; ?>, bairro <? echo $bairro; ?>, em <? echo $cidade; ?> estado <br><br>de <? echo $estado; ?>, doravante chamada pelo nome fantasia <? echo $nfantasia; ?>.</td>
  </tr>
  <tr>
    <td><span class="style6">1.2</span></td>
    <td><div align="center"></div></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><span class="style6"><strong>DADOS DO CLIENTE </strong></span></div></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6">O(a) contratante <strong><strong><? echo $nome_cli; ?></strong></strong>, data nascimento <strong><strong><? echo $data_nasc_cli; ?></strong></strong>, CPF <strong> <? echo $cpf_cli; ?> </strong>e RG.<strong> <? echo $rg_cli; ?></strong>, situado(a) &agrave; rua/av<strong> 
          <strong><? echo $endereco_cli; ?></strong></strong>,<br>
    n&uacute;mero <strong><strong><strong><strong><? echo $numero_cli; ?></strong></strong></strong></strong>, complemento <strong><? echo $complemento_cli; ?> </strong>bairro<strong><strong><? echo $bairro_cli; ?></strong> </strong> CEP <strong><? echo $cep_cli; ?></strong>, na cidade <strong><? echo $cidade_cli; ?> </strong>estado de <strong><? echo $estado_cli; ?></strong>, celular <strong><? echo $celular_cli; ?></strong>, email <strong><? echo $email_cli; ?></strong> devidamente identificado pelo seu nome de contratante. </span></td>
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
  <tr>
    <td colspan="3"><div align="center" class="style6">
      <p align="center"><strong>CONTRATAM E ACORDAM ENTRE SI OS SEGUINTES </strong></p>
    </div></td>
  </tr>
  <tr>
    <td colspan="2"><p class="style6"><strong>2 - &nbsp; OBRIGA&Ccedil;&Otilde;ES DA CONTRATADA </strong></p></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td><span class="style6">2.1</span></td>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3" class="style6">&#149;&nbsp; Dever&aacute; prestar ensino atrav&eacute;s de aulas pr&aacute;ticas com dura&ccedil;&atilde;o de duas horas semanais em uma &uacute;nica aula, dando seguimento aos cursos contratados, fornecendo &aacute; contratante o certificado d&ecirc;s cursos devidamente conclu&iacute;dos. <br>
      &#149;&nbsp; Se responsabilizar&aacute; pela orienta&ccedil;&atilde;o pedag&oacute;gica dos cursos, o fornecimento e sele&ccedil;&atilde;o do material did&aacute;tico, fixa&ccedil;&atilde;o de datas e hor&aacute;rios para in&iacute;cio das turmas, provas e hor&aacute;rios segundo seu exclusivo crit&eacute;rio. <br>
    Emitir&aacute; CERTIFICADO de conclus&atilde;o de curso apenas dos m&oacute;dulos conclu&iacute;dos e justificados atrav&eacute;s de uma avalia&ccedil;&atilde;o com nota m&iacute;nima 7. </td>
  </tr>
  <tr>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="2"><p class="style6"><strong>3 -  OBRIGA&Ccedil;&Otilde;ES DA CONTRATANTE</strong></p></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td><span class="style6">3.1</span></td>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><p class="style6">&#149;&nbsp; Pagar&aacute; pelos cursos contratados em valores iguais e mensais, conforme seu cadastro e anexado a este contrato, com entrada e os demais pagamentos no mesmo dia sem meses subseq&uuml;entes at&eacute; que o aluno termine o curso contratado. O pagamento poder&aacute; ser feito na escola. Ap&oacute;s o vencimento ser&aacute; cobrado juros de 4% ao m&ecirc;s. O atraso de 30 dias no pagamento da mensalidade, acarretar&aacute; suspens&atilde;o de aulas e o nome do respons&aacute;vel ser&aacute; levado para o SCPC. <br>
    &#149; O curso, seu andamento, certificado e aulas &eacute; pessoal e intransfer&iacute;vel.</td>
  </tr>
  <tr>
    <td colspan="2"><span class="style6"></span></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="2"><p class="style6"><strong>4&nbsp; - DISPOSI&Ccedil;&Otilde;ES GERAIS </strong></p></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td><span class="style6"><strong>4.1 


 DURA&Ccedil;&Atilde;O DO CURSO </strong></span></td>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><p class="style6">&#149;&nbsp; O contrato ter&aacute; dura&ccedil;&atilde;o at&eacute; que o aluno termine o curso contratado e pagamento das parcelas, conforme cl&aacute;usula 1, por se tratar de curso ministrado de forma individual, dependendo exclusivamente do desempenho do aluno no que se trata o per&iacute;odo exato de dura&ccedil;&atilde;o do curso.<br>           &#149;&nbsp; O aluno pagar&aacute; pelo tempo que estiver fazendo os cursos contratados, em mensalidades, conforme valores na folha de cadastro em anexo. <br>
      &#149;&nbsp; O aluno para de pagar as mensalidades do m&ecirc;s em que o mesmo terminar o curso contratado. <br>
      &#149;&nbsp; Se o aluno n&atilde;o terminar o curso at&eacute; a data prevista, ele continua pagando as mensalidades at&eacute; o t&eacute;rmino dos cursos contratados. Neste caso ser&atilde;o emitidos boletos com as mensalidades extras, de acordo com a avalia&ccedil;&atilde;o do instrutor.<br>
      &#149;&nbsp; Se o aluno terminar o curso antes da data prevista, ele paga as mensalidades do per&iacute;odo em que estive fazendo o curso e desobriga-se ao pagamento das mensalidades a vencer. <br>
      &#149; Se o aluno n&atilde;o receber ou perder o carn&ecirc; dever&aacute; comunicar a escola, pois o mesmo n&atilde;o poder&aacute; deixar de pagar por este motivo.</span><br>
    </td>
  </tr>
  <tr>
    <td colspan="2"><span class="style6"></span></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="2"><p class="style6"><strong>4.2. ABANDONO DO CURSO </strong></p></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6">&#149;&nbsp; 4 faltas consecutivas ser&aacute; considerado abandono de curso. <br>
&#149;&nbsp; Por&eacute;m, o abandono do curso n&atilde;o quita a(s) mensalidade(s) em aberto at&eacute; a data do cancelamento feito pela escola, independentemente do aluno ter ou n&atilde;o freq&uuml;entado as aulas. Assim, o aluno obriga-se ao pagamento desta (s) mensalidade(s) com juros de 4% ao m&ecirc;s se as mesmas estiverem em atraso, podendo, ao contr&aacute;rio ter seu nome levado ao SCPC e ao cart&oacute;rio de protesto. <br>
&#149;&nbsp; De forma nenhuma ser&aacute; devolvido dinheiro das mensalidades paga anteriormente. </span></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><p class="style6"><strong>4.3. DESIST&Ecirc;NCIA DO CURSO </strong></p></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6">&#149;&nbsp; O presente contrato poder&aacute; ser cancelado pelo aluno, mediante assinatura da desist&ecirc;ncia do curso, na secretaria da escola. <br>
&#149;&nbsp; Por&eacute;m, a desist&ecirc;ncia do curso n&atilde;o quita a(s) mensalidade(s) em aberto at&eacute; a data da assinatura da desist&ecirc;ncia do curso pelo aluno, independentemente do aluno ter ou n&atilde;o freq&uuml;entado as aulas. Assim, o aluno obriga-se ao pagamento desta(s) mensalidade(s) com juros de 4% ao m&ecirc;s se as mesmas estiverem em atraso, podendo, ao contr&aacute;rio ter seu nome levado ao SCPC e ao cart&oacute;rio de protesto. <br>
&#149;&nbsp; De forma nenhuma ser&aacute; devolvido dinheiro das mensalidades pagas anteriormente. </span></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><p class="style6"><strong>4.4. CANCELAMENTO DE CONTRATO PELA ESCOLA </strong></p></td>
  </tr>
  <tr>
    <td colspan="3" class="style6">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="style6">&#149;&nbsp; O contrato poder&aacute; ser cancelado pela escola havendo duas mensalidades ou mais em atraso. <br>
      &#149;&nbsp; Por&eacute;m, o cancelamento do contrato n&atilde;o quita a(s) mensalidade(s) em aberto at&eacute; a data do cancelamento do contrato feito pela escola, independentemente do aluno ter ou n&atilde;o freq&uuml;entado as aulas. Assim, o aluno obriga-se ao pagamento desta(s) mensalidade(s) co juros de 4% ao m&ecirc;s se as mesmas estiverem em atraso, podendo, ao contr&aacute;rio ter o nome levado ao SCPC e ao cart&oacute;rio de protestos. <br>
    &#149;&nbsp; De forma nenhuma ser&aacute; devolvido dinheiro das mensalidades paga anteriormente. </td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"><strong> 4.5. TRANCAMENTO DE MATR&Iacute;CULA </strong></span></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><p class="style6">&#149;&nbsp;PER&Iacute;ODO M&Aacute;XIMO DE 2 MESES, PERANTE ASSINATURA DO TERMO DE TRANCAMENTO NA SECRETARIA DA ESCOLA</p></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><p class="style6"><strong>4.6. REPOSI&Ccedil;&Otilde;ES DE AULA </strong></p></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6">&#149;&nbsp; S&oacute; faremos reposi&ccedil;&otilde;es de aula, perante atestado m&eacute;dico. <br>
&#149;&nbsp; As reposi&ccedil;&otilde;es s&oacute; poder&atilde;o ser feitas enquanto o aluno estiver matriculado no respectivo curso, n&atilde;o havendo qualquer possibilidade para reposi&ccedil;&atilde;o posterior ao termino ou cancelamento do curso. </span></td>
  </tr>
  <tr>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
    <td><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3"><p class="style6">As partes elegem o F&oacute;rum de Franca para dirimirem qualquer d&uacute;vida a respeito do presente contrato, dispensando qualquer outro por mais privilegiado que seja. </p>    </td>
  </tr>
  <tr>
    <td colspan="3"><span class="style6"></span></td>
  </tr>
  <tr>
    <td colspan="3" class="style6"> E, por assim estarem de m&uacute;tuo e comum acordo as partes assinam o presente instrumento legal, em 02(duas) vias de igual teor, conte&uacute;do e para o mesmo efeito, na presen&ccedil;a de duas testemunhas. </td>
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
    <td colspan="3"><div align="center"><strong>CONTRATANTE</strong></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <div align="center">_________________________________________<br>
      </div>      <div align="center">Assinatura </div></td>
    <td colspan="2"><div align="center">
      <div align="center">
        <? echo $nome_resp; ?>
<br>
      <div align="center">Nome por extenso </div>
    </div>      <div align="center">
      <div align="center">
        <div align="center"></div>
      </div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><strong>FUNCION&Aacute;RIO</strong></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">____________________<br>
      <div align="center"><? echo $nome_op; ?></div>
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
    <td colspan="3"><div align="center"><strong>CONTRATADA</strong></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <div align="center"><img src="../../assinatura/assinatura.jpg" width="305" height="80"><br>
      </div>      <div align="center">Assinatura </div></td>
    <td colspan="2"><div align="center">
        <div align="center"><? echo $razaosocial; ?> (<? echo $nfantasia; ?>) <br>
        <div align="center">Nome por extenso </div>
    </div>      <div align="center">
        <div align="center">
          <div align="center"></div>
        </div></td>
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