<?php

session_start(); //inicia sessão...

if ($_SESSION["cnpj"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>



<html>

<head>

<title>COMUNICADO DE VENDA DE VE&Iacute;CULO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
.style3 {color: #000000;
	font-weight: bold;
}
</style>
</head>

<?
require '../../conect/conect.php';
?>

<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

<?
$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;

?>





<body bgcolor="#<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>

  

<? } ?>









<form name="form1" method="post" action="pesquisa.php">

  <?

$cnpj = $_SESSION['cnpj'];

$data_hoje = $_SESSION['data_hoje'];
	
$dia = date('d');
$mes = date('m');


?>
  <input class='class01' type=image src='../../imagens/botoes/voltar.png' width='100' height='100' name="Submit3" value="Voltar">
  <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">

</form>

<?

$codigo = $_POST['codigo'];

$concessionaria = $_POST['concessionaria'];

$cnpj = $_POST['cnpj'];

$placa = $_POST['placa'];
	
$ano = $_POST['ano'];

$modelo = $_POST['modelo'];

$chassi = $_POST['chassi'];

$renavam = $_POST['renavam'];

$obs_veiculo = $_POST['obs_veiculo'];

$cnpj = $_SESSION['cnpj'];

$data_hoje = $_SESSION['data_hoje'];





if(empty($placa)){
	
if(empty($chassi)){

$sql = "SELECT * FROM veiculos where renavam = '$renavam'";
	
}
	else{
		
$sql = "SELECT * FROM veiculos where chassi = '$chassi'";
		
	}

}
else{

$sql = "SELECT * FROM veiculos where placa = '$placa'";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registro_veiculo++;


$codigo_veiculo = $linha[0];

$datacadastro = $linha[1];

$horacadastro = $linha[2];

$operador = $linha[3];

$cel_operador = $linha[4];

$email_operador = $linha[5];

$estabelecimento = $linha[6];

$cidade_estabelecimento = $linha[7];

$tel_estabelecimento = $linha[8];

$email_estabelecimento = $linha[9];

//$concessionaria = $linha[10];

$cnpj_concessionaria = $linha[11];

$tel_concessionaria = $linha[12];

$email_concessionaria = $linha[13];

$cidade_concessionaria = $linha[14];

$estado_concessionaria = $linha[15];

$veiculo = $linha[16];

$ano = $linha[17];

$modelo = $linha[18];

$chassi = $linha[19];

$renavam = $linha[20];

$placa = $linha[21];

$obs_veiculo = $linha[22];

$dia_inicio_contrato = $linha[23];

$mes_inicio_contrato = $linha[24];

$ano_inicio_contrato = $linha[25];

$dia_termino_contrato = $linha[26];

$mes_termino_contrato = $linha[27];

$ano_termino_contrato = $linha[28];

$nome = $linha[29];

$corveiculo = $linha[30];

$data_nasc = $linha[31];

$mes_nasc = $linha[32];

$sexo = $linha[33];

$estadocivil = $linha[34];

$cpf = $linha[35];

$rg = $linha[36];

$orgao = $linha[37];

$emissao = $linha[38];

$pai = $linha[39];

$mae = $linha[40];

$endereco = $linha[41];

$numero = $linha[42];

$bairro = $linha[43];

$complemento = $linha[44];

$cidade = $linha[45];

$estado = $linha[46];

$cep = $linha[47];

$telefone = $linha[48];

$celular = $linha[49];

$email = $linha[50];

$obs = $linha[51];

$status = $linha[61];

$tipoveiculo = $linha[67];
	
$numeroveiculo = $linha[68];
	
$km = $linha[69];
	
$horimetro = $linha[70];
	
$valormanutencao = $linha[71];
	
$datachegada = $linha[72];
	
$datavistoriawpx = $linha[73];
	
$datavistoriacc = $linha[74];
	
$datainiciotrabalho = $linha[75];
	
$localizacao = $linha[76];

$fornecedor = $linha[77];

}
?>

<?



$cnpj = $_SESSION['cnpj'];

$data_hoje = $_SESSION['data_hoje'];





$sql = "SELECT * FROM estabelecimentos where cnpj = '$cnpj' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$concessionaria = $linha[2];

$cnpj = $linha[3];

$cidade_concessionaria = $linha[10];

$estado_concessionaria = $linha[11];

$tel_concessionaria = $linha[12];

$email_concessionaria = $linha[14];

$agente = $linha[16];

}



?>

<div align="center"><strong>REGISTRO DE MANUTENCAO DE VE&Iacute;CULO</strong>

</div>

<div align="center"></div>

<form action="grava_manutencao.php" method="post" enctype="multipart/form-data" name="form1">



<table width="100%" border="0" align="center" cellspacing="0">

    <tr>
      <td style="font-weight: bold">N&ordm; Lancamento</td>
      <td style="font-weight: bold">Concession&aacute;ria</td>
      <td style="font-weight: bold">CNPJ</td>
      <td style="font-weight: bold">Cidade/Estado</td>
    </tr>
    <tr>
      <td width="25%"><strong><font color="#0000FF"><? echo $codigo_veiculo; ?></font>
          <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo_veiculo; ?>">
      </strong></td> 

      <td width="16%"><? echo $concessionaria; ?>
      <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $concessionaria; ?>"></td>

      <td width="15%"><strong><? echo $cnpj_concessionaria; ?>
          <input name="cnpj_concessionaria" type="hidden" id="cnpj_concessionaria" value="<? echo $cnpj_concessionaria; ?>">
      </strong></td>

      <td width="22%"><strong><? //echo $status; ?>
        <input name="status" type="hidden" id="status" value="<? echo "Vendido"; ?>">
        <? echo $cidade_concessionaria; ?>
        <input name="cidade_concessionaria" type="hidden" id="cidade_concessionaria" value="<? echo $cidade_concessionaria; ?>">
      <? echo " - $estado_concessionaria"; ?>
      <input name="estado_concessionaria" type="hidden" id="estado_concessionaria" value="<? echo $estado_concessionaria; ?>">
      </strong></td>

    </tr>

    <tr>
      <td><span style="font-weight: bold">Telefone</span></td>
      <td><span style="font-weight: bold">Agente</span></td>
      <td style="font-weight: bold">E-Mail</td>
      <td style="font-weight: bold">&nbsp;</td>
    </tr>
    <tr>
      <td><? echo $tel_concessionaria; ?>
      <input name="tel_concessionaria" type="hidden" id="tel_concessionaria" value="<? echo $tel_concessionaria; ?>"></td>

      <td><? echo $agente; ?>
      <input name="agente" type="hidden" id="agente" value="<? echo $agente; ?>"></td>

      <td><font color="#0000FF"><? echo $email_concessionaria; ?>
          <input name="email_concessionaria" type="hidden" id="email_concessionaria" value="<? echo $email_concessionaria; ?>">
      </font></td>

      <td>&nbsp;</td>

    </tr>

    <tr>
      <td style="font-weight: bold">Ve&iacute;culo</td>
      <td style="font-weight: bold">Ano</td>
      <td style="font-weight: bold">Modelo</td>
      <td style="font-weight: bold">Fornecedor</td>
    </tr>

    <tr>
      <td><? echo $veiculo; ?>
      <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>"></td>
      <td><? echo $ano; ?>
        <input name="ano" type="hidden" id="ano" value="<? echo $ano; ?>"></td>
      <td><? echo $modelo; ?>
        <input name="modelo" type="hidden" id="modelo" value="<? echo $modelo; ?>"></td>
      <td><? echo $fornecedor; ?>
        <input name="fornecedor" type="hidden" id="fornecedor" value="<? echo $fornecedor; ?>"></td>
    </tr>

    <tr>
      <td style="font-weight: bold">Placa</td>
      <td style="font-weight: bold">Chassi</td>
      <td style="font-weight: bold">Tipo veiculo</td>
      <td style="font-weight: bold">Cor</td>
    </tr>

    <tr>
      <td><? echo $placa; ?>
        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>"></td>
      <td><? echo $chassi; ?>
        <input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>"></td>
      <td><? echo $tipoveiculo; ?>
        <input name="tipoveiculo" type="hidden" id="tipoveiculo" value="<? echo $tipoveiculo; ?>"></td>
      <td><? echo $corveiculo; ?>
        <input name="corveiculo" type="hidden" id="corveiculo" value="<? echo $corveiculo; ?>"></td>
    </tr>

    <tr>
      <td style="font-weight: bold">Numero do veiculo</td>
      <td style="font-weight: bold">Renavam</td>
      <td style="font-weight: bold">Km inicial</td>
      <td style="font-weight: bold">Horimetro inicial</td>
    </tr>
    <tr>
      <td><? echo $numeroveiculo; ?>
        <input name="numeroveiculo" type="hidden" id="numeroveiculo" value="<? echo $numeroveiculo; ?>"></td>
      <td><? echo $renavam; ?>
        <input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>"></td>
      <td><? echo $km; ?></td>
      <td><? echo $horimetro; ?></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Data Chegada Veiculo/Maquinario</td>
      <td style="font-weight: bold">Data Vistoria WPX</td>
      <td style="font-weight: bold">Data Vistoria CC</td>
      <td style="font-weight: bold">Data inicio Trabalho</td>
    </tr>
    <tr>
      <td style="font-weight: bold"><? echo $datachegada; ?></td>
      <td style="font-weight: bold"><? echo $datavistoriawpx; ?></td>
      <td style="font-weight: bold"><? echo $datavistoriacc; ?></td>
      <td style="font-weight: bold"><? echo $datainiciotrabalho; ?></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Data Manutencao</td>
      <td><span style="font-weight: bold">NF/DOC</span></td>
      <td style="font-weight: bold">Valor</td>
      <td style="font-weight: bold">Imagem NF</td>
    </tr>
    <tr>
      <td><strong><font color="#0000FF"><strong><font color="#0000FF">
        <? //if($dia_inicio_contrato==""){echo date('d'); } else {echo $dia_inicio_contrato; } ?>
        <select name="dia_inicio_contrato" class='class02' id="dia_inicio_contrato">
          <option selected>
            <? echo "$dia"; ?>
          </option>
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
        / <strong><font color="#0000FF">
  <? //if($mes_inicio_contrato==""){echo date('m'); } else {echo $mes_inicio_contrato; } ?>
  <select name="mes_inicio_contrato" class='class02' id="mes_inicio_contrato">
    <option selected>
      <? echo "$mes"; ?>
      </option>
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
  </select>
  </font></strong>/<strong><font color="#0000FF">
  <? //if($ano_inicio_contrato==""){echo date('Y'); } else {echo $ano_inicio_contrato; } ?>
  <strong><font color="#0000FF">
  <select name="ano_inicio_contrato" class='class02' id="ano_inicio_contrato">
    <option selected>
      <?

$ano_atual = date('Y');
$proximo_ano = bcadd($ano_atual,1);
	  $ano_anterior = bcsub($ano_atual,1);
echo "$ano_atual";

	  ?>
      </option>
    <option><? echo "$ano_anterior"; ?></option>
    <option><? echo "$proximo_ano"; ?></option>
  </select>
</font></strong></font></strong></font></strong></font></strong></td>
      <td style="font-weight: bold"><input class='class02' name="nf" type="text" id="nf" maxlength="50"></td>
      <td style="font-weight: bold"><input class='class02' name="valormanutencao" type="text" id="valormanutencao" maxlength="50"></td>
      <td><input class='class02' type="file" name="foto" id="foto"></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Tipo Manutencao</td>
      <td style="font-weight: bold">Horimetro</td>
      <td style="font-weight: bold">km atual</td>
      <td style="font-weight: bold">Condutor</td>
    </tr>
    <tr>
      <td><select class='class02' name="tipomanutencao" id="select">
        <option selected>CORRETIVA</option>
        <option>PREVENTIVA</option>
        <option>PREDITIVA</option>
      </select></td>
      <td style="font-weight: bold"><input class='class02' name="horimetro" type="text" id="horimetro" maxlength="50"></td>
      <td style="font-weight: bold"><input class='class02' name="km" type="text" id="km" maxlength="50"></td>
      <td style="font-weight: bold"><input class='class02' name="condutor" type="text" id="condutor" maxlength="50"></td>
    </tr>
    <tr>
      <td style="font-weight: bold">Descontar do Fornecedor</td>
      <td colspan="2" style="font-weight: bold">Reembolso para operador</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td style="font-weight: bold"><select class='class02' name="descontar" id="tipomanutencao">
        <option selected>sim</option>
        <option>nao</option>
      </select></td>
      <td colspan="2" style="font-weight: bold"><select class='class02' name="reembolso" id="reembolso">
        <option>sim</option>
        <option selected="selected">nao</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td style="font-weight: bold">&nbsp;</td> 

      <td colspan="2" style="font-weight: bold">Detalhamento de Servi&ccedil;os e Pe&ccedil;as</td>

      <td>&nbsp;</td>
    </tr>

    <tr>
      <td colspan="4"><textarea class='class02' name="detalhamento" cols="100" rows="7" id="detalhamento"></textarea></td>

    </tr>

    <tr> 

      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
        <span style="font-weight: bold">
        <input class='class01' type=image src='../../imagens/botoes/salvar.png' width='100' height='100' name="Submit" value="Voltar">
      </span></td>
      <td><div align="right"> </div></td>

    </tr>

    <tr> 

      <td colspan="3">&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

</form>
</body>

</html>

