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
<title>CADASTRO DE CLIENTES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

require '../../conect/conect.php';

?>

<?
$codigo = $_POST['codigo'];
$num_proposta = $_POST['num_proposta'];


$sql = "SELECT * FROM clientes where codigo = '$codigo'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
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

$sql = "SELECT * FROM registro_visitas where num_proposta = '$num_proposta'";
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
$numero_pesoas = $linha[193];
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
			
$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
?>


<body bgcolor="#<? printf("$linha[1]"); ?>"

background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 
  
<? } ?>
<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>>
  
<? } ?>
<form name="form1" method="post" action="informe_curso.php">
</form>
<form name="form2" method="post" action="../clientes/verifica.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <font size="4"><strong><font color="#0000FF">
  <input name="nome" type="hidden" id="nome" value="<? echo $nome_cli; ?>">
  </font></strong></font>
  <input type="submit" name="Submit3" value="Voltar">
</form>
<p>
  <?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
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


?>
  <? } ?>
  
  <?

$curso = $_POST['curso'];

$sql = "SELECT * FROM produtos where nome_curso = '$curso'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$modulos = $linha[2];
$duracao = $linha[4];

if($linha[6]=="Sim"){
$mensalidade = $linha[7];
}else{
$mensalidade = $linha[5];
}
$categoria = $linha[9];

$preco_total = $linha[12];
$quant_horas = $linha[13];
$carga_horaria_semanal = $linha[14];

}
?>

  
<form name="form1" method="post" action="grava_contrato.php">

<table width="100%" border="0" cellspacing="4">
    <tr> 
      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4"> </font>DADOS DO CLIENTE</strong></div></td>
    </tr>
    <tr>
      <td> <div align="left"><font size="4"><strong><font color="#0000FF"> C&Oacute;DIGO <? echo $codigo_cli; ?>
                <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo_cli; ?>">
      </font></strong></font> </div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><font color="#0000FF"><strong>Data Cadastro <? echo $datacadastro; ?> </strong></font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2">Como conheceu a empresa? 
        <font size="4"><strong><font color="#0000FF"><? echo $resposta; ?></font></strong></font>
        <input name="resposta" type="hidden" id="resposta" value="<? echo $resposta; ?>"></td>
      <td><strong><font color="#0000FF">Hora do cadastro<strong><? echo $horacadastro; ?></strong></font> </strong></td>
    </tr>
    <tr> 
      <td>Nome</td>
      <td><font size="4"><strong></strong></font>
      <input name="nome" type="hidden" id="nome2" value="<? echo $nome_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $nome_cli; ?></font></strong></font></td>
      <td>Sexo</td>
      <td><strong>
      <input name="sexo" type="hidden" id="sexo" value="<? echo $sexo_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $sexo_cli; ?></font></strong></font></strong>      </td>
    </tr>
    <tr>
      <td>Data Nasc </td>
      <td><strong>
        <input name="data_nasc" type="hidden" id="data_nasc2" value="<? echo $data_nasc_cli; ?>">
        <font size="4"><strong><font color="#0000FF"><? echo $data_nasc_cli; ?></font></strong></font> </strong></td>
      <td>Estado Civil </td>
      <td><input name="estadocivil" type="hidden" id="estadocivil" value="<? echo $estadocivil_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $estadocivil_cli; ?></font></strong></font></td>
    </tr>
    <tr> 
      <td width="15%">Endere&ccedil;o</td>
      <td width="37%"><input name="endereco" type="hidden" id="endereco2" value="<? echo $endereco_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $endereco_cli; ?></font></strong></font></td>
      <td width="17%">N&uacute;mero</td>
      <td width="31%">        <font color="#0000FF">
        <input name="numero" type="hidden" id="numero" value="<? echo $numero_cli; ?>"> 
      </font><font size="4"><strong><font color="#0000FF"><? echo $numero_cli; ?></font></strong></font><font color="#0000FF">&nbsp;      </font></td>
    </tr>
    <tr>
      <td><p>Bairro</p></td>
      <td><input name="bairro" type="hidden" id="bairro" value="<? echo $bairro_cli; ?>">
        <font size="4"><strong><font color="#0000FF"><? echo $bairro_cli; ?></font></strong></font> </td>
      <td>Complemento</td>
      <td><input name="complemento" type="hidden" id="endereco4" value="<? echo $complemento_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $complemento_cli; ?></font></strong></font></td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><input name="cidade" type="hidden" id="cidade" value="<? echo $cidade_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $cidade_cli; ?></font></strong></font></td>
      <td>Estado</td>
      <td><input name="estado" type="hidden" id="estado" value="<? echo $estado_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $estado_cli; ?></font></strong></font></td>
    </tr>
    <tr>
      <td>Telefone</td>
      <td><input name="telefone" type="hidden" id="telefone2" value="<? echo $telefone_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $telefone_cli; ?></font></strong></font></td>
      <td>Celular</td>
      <td><input name="celular" type="hidden" id="celular" value="<? echo $celular_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $celular_cli; ?></font></strong></font></td>
    </tr>
    <tr>
      <td>E-Mail</td>
      <td><input name="email" type="hidden" id="email2" value="<? echo $email_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $email_cli; ?></font></strong></font></td>
      <td>Cep</td>
      <td><input name="cep" type="hidden" id="cep" value="<? echo $cep_cli; ?>">
        <font size="4"><strong><font color="#0000FF"><? echo $cep_cli; ?></font></strong></font></td>
    </tr>
    <tr>
      <td>CPF</td>
      <td><input name="cpf" type="hidden" id="cpf2" value="<? echo $cpf_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $cpf_cli; ?></font></strong></font></td>
      <td>RG</td>
      <td><input name="rg" type="hidden" id="rg2" value="<? echo $rg_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $rg_cli; ?></font></strong></font></td>
    </tr>
    <tr>
      <td>&Oacute;rg&atilde;o</td>
      <td>
        <input name="orgao" type="hidden" id="cpf3" value="<? echo $orgao_cli; ?>">
        <font size="4"><strong><font color="#0000FF"><? echo $orgao_cli; ?></font></strong></font></td>
      <td>Emiss&atilde;o</td>
      <td><input name="emissao" type="hidden" id="cpf4" value="<? echo $emissao_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $emissao_cli; ?></font></strong></font></td>
    </tr>
    <tr>
      <td>Pai</td>
      <td><input name="pai" type="hidden" id="pai" value="<? echo $pai_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $pai_cli; ?></font></strong></font></td>
      <td>M&atilde;e</td>
      <td><input name="mae" type="hidden" id="endereco3" value="<? echo $mae_cli; ?>">
      <font size="4"><strong><font color="#0000FF"><? echo $mae_cli; ?></font></strong></font></td>
    </tr>
    
    <tr>
      <td colspan="4"><div align="center"><strong>DADOS DO EVENTO</strong> </div></td>
    </tr>
    <tr>
      <td>Quantidade de eventos</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $quant_eventos; ?>
              <input name="quant_eventos" type="hidden" id="quant_eventos" value="<? echo $quant_eventos; ?>">
      </font></strong></font></td>
      <td>Dias para prepara&ccedil;&atilde;o</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $preparacao_dias; ?>
              <input name="preparacao_dias" type="hidden" id="preparacao_dias" value="<? echo $preparacao_dias; ?>">
      </font></strong></font></td>
    </tr>
    <tr>
      <td>Data do evento</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $data_evento; ?>
              <input name="data_evento" type="hidden" id="data_evento" value="<? echo $data_evento; ?>">
      </font></strong></font></td>
      <td>Dia da semana</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $dia_semana_evento; ?>
              <input name="dia_semana_evento" type="hidden" id="dia_semana_evento" value="<? echo $dia_semana_evento; ?>">
      </font></strong></font></td>
    </tr>
    <tr>
      <td>Categoria</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $categoria; ?>
              <input name="categoria" type="hidden" id="categoria" value="<? echo $categoria; ?>">
      </font></strong></font></td>
      <td>Sub-Categoria</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $sub_categoria; ?>
              <input name="sub_categoria" type="hidden" id="sub_categoria" value="<? echo $sub_categoria; ?>">
      </font></strong></font></td>
    </tr>
    <tr>
      <td>N&uacute;mero de pessoas</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $numero_pessoas; ?>
              <input name="numero_pessoas" type="hidden" id="numero_pessoas" value="<? echo $numero_pessoas; ?>">
      </font></strong></font></td>
      <td>Respons&aacute;vel</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $responsavel; ?>
              <input name="responsavel" type="hidden" id="responsavel" value="<? echo $responsavel; ?>">
      </font></strong></font></td>
    </tr>
    <tr>
      <td>Site</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $site; ?>
              <input name="site" type="hidden" id="site" value="<? echo $site; ?>">
      </font></strong></font></td>
      <td>Video</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $video; ?>
              <input name="video" type="hidden" id="video" value="<? echo $video; ?>">
      </font></strong></font></td>
    </tr>
    <tr>
      <td>Mural</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $mural; ?>
              <input name="mural" type="hidden" id="mural" value="<? echo $mural; ?>">
      </font></strong></font></td>
      <td>Dj</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $dj; ?>
              <input name="dj" type="hidden" id="dj" value="<? echo $dj; ?>">
      </font></strong></font></td>
    </tr>
    <tr>
      <td>Buffet</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $buffet; ?>
              <input name="buffet" type="hidden" id="buffet" value="<? echo $buffet; ?>">
      </font></strong></font></td>
      <td>Banda</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $banda; ?>
              <input name="banda" type="hidden" id="banda" value="<? echo $banda; ?>">
      </font></strong></font></td>
    </tr>
    <tr>
      <td>Cerimonial</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $cerimonia; ?>
              <input name="cerimonial" type="hidden" id="cerimonial" value="<? echo $cerimonia; ?>">
      </font></strong></font></td>
      <td>Bolos e Doces</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $bolos_e_doces; ?>
              <input name="bolos_e_doces" type="hidden" id="bolos_e_doces" value="<? echo $bolos_e_doces; ?>">
      </font></strong></font></td>
    </tr>
    <tr>
      <td>Decora&ccedil;&atilde;o</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $decoracao; ?>
              <input name="decoracao" type="hidden" id="decoracao" value="<? echo $decoracao; ?>">
      </font></strong></font></td>
      <td>Ilumina&ccedil;&atilde;o</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $iluminacao; ?>
              <input name="iluminacao" type="hidden" id="iluminacao" value="<? echo $iluminacao; ?>">
      </font></strong></font></td>
    </tr>
    <tr>
      <td>Fotografia</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $fotografia; ?>
              <input name="fotografia" type="hidden" id="fotografia" value="<? echo $fotografia; ?>">
      </font></strong></font></td>
      <td>Bartender</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $bartender; ?>
              <input name="bartender" type="hidden" id="bartender" value="<? echo $bartender; ?>">
      </font></strong></font></td>
    </tr>
    
    <tr>
      <td colspan="4"><div align="center"><strong>ESTRELAS DO EVENTO</strong></div></td>
    </tr>
    
    <tr>
      <td><?
if(($categoria=="CASAMENTO") or ($categoria=="BODAS")){

}
else{
	  
echo "Estrela(s)"; 

}	   
?>        <?
if(($categoria=="CASAMENTO") or ($categoria=="BODAS")){

echo "Conjuge 1"; 

}
else{
	  

}	   
?></td>
      <td><font size="4"><strong><font color="#0000FF"><? echo $modulos; ?></font><font size="4"><strong><font color="#0000FF">
        <input name="conjuge1" type="hidden" id="conjuge1" value="<? echo $conjuge1; ?>">
      </font><font size="4"><strong>
      <?
if(($categoria=="CASAMENTO") or ($categoria=="BODAS")){


}
else{
	  
echo $estrela; 

}	   
?>
      <font size="4"><strong><font color="#0000FF">
      <input name="estrela" type="hidden" id="conjuge2" value="<? echo $estrela; ?>">
      </font></strong></font></strong></font></strong></font></strong></font></td>
      <td><? 
if(($categoria=="CASAMENTO") or ($categoria=="BODAS")){

echo "Conjuge 2";

}

 ?></td>
      <td><font size="4"><strong><font color="#0000FF"><? 
if(($categoria=="CASAMENTO") or ($categoria=="BODAS")){

echo $conjuge2;

}
	  
	   ?><font size="4"><strong>
      <input name="conjuge2" type="hidden" id="curso3" value="<? echo $conjuge2; ?>">
      </strong></font></font></strong></font></td>
    </tr>
    
    <tr>
      <td colspan="4"><div align="center"><strong>DADOS DO PAGAMENTO </strong>
        <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">
      </div></td>
    </tr>
    <tr>
      <td>Valor Entrada </td>
      <td><font size="4"><strong><font color="#0000FF"></font><font size="4"><strong><font color="#0000FF">
        <input name="valor_entrada" type="text" id="curso4" value="0.00">
      </font></strong></font></strong></font></td>
      <td>Valor Total</td>
      <td><font size="4"><strong><font color="#0000FF"><? echo "R$ ".$valor; ?></font></strong>
        <input name="valor" type="text" id="valor" value="<? echo $valor; ?>">
      </font></td>
    </tr>
    <tr>
      <td>Parcelamento</td>
      <td><font size="4"><strong><font size="4"><strong><font color="#0000FF">
        <select name="quant_parc" id="quant_parc">
          <option selected>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option>
          <option>29</option>
          <option>30</option>
        </select>
      </font></strong></font></strong></font></td>
      <td>Forma de pagamento</td>
      <td><select name="modo_pagto" id="select5">
        <?


    $sql = "select * from modo_pagto order by modopagto asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['modopagto']."</option>";
    }
?>
      </select></td>
    </tr>
    
    <tr>
      <td colspan="4"><div align="center"><strong>INFORME O MELHOR DIA DE CADA M&Ecirc;S  PARA O VENCIMENTO DAS PARCELAS </strong></div></td>
    </tr>
    <tr>
      <td colspan="2">Dia
        <select name="dia" id="dia">
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option>
          <option>29</option>
          <option>30</option>
          <option>31</option>
        </select>
        - M&ecirc;s 
        <select name="mes" id="mes">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
        </select>
      - ano      
      <select name="ano" id="ano">
	  <option selected>
	  <?

$ano_atual = date('Y');
$proximo_ano = bcadd($ano_atual,1);
echo "$ano_atual";

	  ?>
	  </option>
	  <option><? echo "$proximo_ano"; ?></option>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><strong><font color="#0000FF">
        <input name="operador" type="hidden" id="operador3" value="<? echo $nome_op; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>">
      </font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit" value="Efetivar Contrato"> 
          <input type="reset" name="Submit2" value="Limpar"> </td><td><div align="right"> </div></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<form name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="4">
    <tr>
      <td colspan="2"><strong>Ol&aacute;! Seja bem vindo<br>
      </strong><strong><font color="#0000FF"><? echo $nome_op; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>
              <? echo $email_op; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="20%"><strong>Celular:<font color="#0000FF"><br>
              <? echo $celular_op; ?> </font><font color="#0000FF"> </font></strong></td>
      <td width="1%">&nbsp;</td>
    </tr>
    <tr>
      <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>
          <strong><font color="#0000FF"><? echo $estab_pertence_op; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>
      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $tel_estab_pertence_op; ?> </font></strong></td>
      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>
              <? echo $email_estab_pertence_op; ?> </font><font color="#0000FF"> </font></strong></td>
      <td><strong>Cidade: <br>
            <font color="#0000FF"><? echo $cidade_estab_pertence_op; ?> </font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF"> </font><font color="#0000FF"> </font></strong></td>
      <td>&nbsp;</td>
      <td><strong></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
