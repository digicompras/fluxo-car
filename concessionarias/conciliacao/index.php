<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style3 {color: #0000FF; font-weight: bold; }
body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
.class01 {    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}

-->

</style>

</head>

<?



require '../../conect/conect.php';
	
$dia_atual = date('d');

$mes_atual = date('m');

$ano_atual = date('Y');
	
$ano_anterior = date('Y')-1;

$ano_posterior = date('Y')+1;
	
$fornecedordespesa = $_POST['fornecedordespesa'];
	
$colaborador = $_POST['colaborador'];

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}

$senha = $_SESSION['senha'];
$data_hoje = $_SESSION['data_hoje'];
	
$solicitacao = $_POST['solicitacao'];
	


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
$sql = "SELECT * FROM fornecedores where nfantasia = '$fornecedordespesa'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$cidade_fornecedor = $linha[10];


}



$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$operador = $linha[1];
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];
$telefone_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];
$cidadeatuacao = $linha[48];

}

if(empty($fornecedordespesa)){

}
else{
	
if($solicitacao=="abrir"){
	

	
	
$sql = "SELECT * FROM conciliacao where status = 'aberto' and fornecedor = '$fornecedordespesa' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$registro_conciliacao_aberto = mysql_num_rows($res);
	
$saldoanterior = $linha[10];
	
}
	
if($registro_conciliacao_aberto<=0){
	
	
$dataabertura = date('Y-m-d');
$horaabertura = date('H:i:s');
	
$comando = "insert into conciliacao(dataabertura,horaabertura,status,operador,concessionaria,cidadeatuacao,statusenvio,dataenvio,fornecedor)

values('$dataabertura','$horaabertura','aberto','$operador','$estab_pertence','$cidade_fornecedor','a enviar','','$fornecedordespesa')";
mysql_query($comando,$conexao);
	
	
$sql = "SELECT * FROM conciliacao where status = 'aberto' and fornecedor = '$fornecedordespesa' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_conciliacao = $linha[0];
	$dataabertura = $linha[1];
	$horaabertura = $linha[2];
	$status = $linha[5];
	$operador_contas = $linha[6];
	$estab_pertence = $linha[7];
	$cidade_fornecedor = $linha[11];
	$fornecedordespesa = $linha[14];
}
	

	
}

	
}
	
	
}

$sql = "SELECT * FROM conciliacao where status = 'aberto' and fornecedor = '$fornecedordespesa' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_conciliacao = $linha[0];
	$dataabertura = $linha[1];
	$horaabertura = $linha[2];
	$status = $linha[5];
	$operador_contas = $linha[6];
	$estab_pertence = $linha[7];
	$saldoanterior = $linha[10];
	$cidade_fornecedor = $linha[11];
	$fornecedordespesa = $linha[14];
}
	


	
$sql = "SELECT * FROM operadores where nome = '$colaborador' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

//$operadorqueusaoveiculo = $linha[1];
$veiculodooperador = $linha[73];
$placadoveiculodooperador = $linha[74];
	
}
	

	
if (!file_exists('../../conciliacao/$fornecedordespesa')){
mkdir ("../../conciliacao/$fornecedordespesa", 0755);
	}
	
if (!file_exists('../../conciliacao/$fornecedordespesa/$cod_conciliacao')){
mkdir ("../../conciliacao/$fornecedordespesa/$cod_conciliacao", 0755);
	}
	
	
?>
	
<?
if($solicitacao=="gravardespesa"){
	
$cod_conciliacao = $_POST['cod_conciliacao'];
	
	//------------
	$data_da_despesa = $_POST['datadespesa'];
	
	$data_da_despesa2 = explode("-", $data_da_despesa);

	$diadespesa = $data_da_despesa2[0];

	$mesdespesa = $data_da_despesa2[1];

	$anodespesa = $data_da_despesa2[2];
	
	$datadespesa = "$anodespesa-$mesdespesa-$diadespesa";
	
	//-------
	
	
	$descricaodespesa = $_POST['descricaodespesa'];
	$nfdespesa = $_POST['nfdespesa'];
	$valordespesa = $_POST['valordespesa'];
	$quantlitro = $_POST['quantlitro'];
	$precolitro = $_POST['precolitro'];
	$operadordespesa = $_POST['operadordespesa'];
	$categoriadespesa = $_POST['categoriadespesa'];
	$modopagto = $_POST['modopagto'];
	$os = $_POST['os'];
	$veiculo = $_POST['veiculo'];
	$placa = $_POST['placa'];
	$km = $_POST['km'];
	$horimetro = $_POST['horimetro'];
	
$sql = "SELECT * FROM operadores where estab_pertence = '$estab_pertence' and nome = '$operadordespesa'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$cidadedespesa = $linha[48];

}
	
	
//-----------
	
$comprovantedespesa = $_FILES['comprovantedespesa']['name'];
	
$uploaddir = "../../conciliacao/$fornecedordespesa/$cod_conciliacao/";
$uploadfile = $uploaddir. $_FILES['comprovantedespesa']['name'];

if (
move_uploaded_file($_FILES['comprovantedespesa']['tmp_name'], $uploaddir.$_FILES['comprovantedespesa']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF não foi enviada!";
}
	
$link_comprovante = "http://www.fluxocar.com.br/conciliacao/$fornecedordespesa/$cod_conciliacao/$comprovantedespesa";

//----------
	
	
$comando = "insert into conciliacao_comprovantes(cod_conciliacao,datadespesa,fornecedordespesa,descricaodespesa,nfdespesa,valordespesa,operadordespesa,cidadedespesa,comprovantedespesa,categoriadespesa,modopagto,os,veiculo,placa,km,horimetro,colaborador,quantlitro,precolitro,diadespesa,mesdespesa,anodespesa,estab_pertence)

values('$cod_conciliacao','$datadespesa','$fornecedordespesa','$descricaodespesa','$nfdespesa','$valordespesa','$operadordespesa','$cidadedespesa','$link_comprovante','$categoriadespesa','$modopagto','$os','$veiculo','$placa','$km','$horimetro','$colaborador','$quantlitro','$precolitro','$diadespesa','$mesdespesa','$anodespesa','$estab_pertence')";
mysql_query($comando,$conexao);
	
}
	
?>
<?

																									  
$sql = "select sum(valordespesa) as total_despesa from conciliacao_comprovantes where cod_conciliacao = '$cod_conciliacao'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_despesa = $linha['total_despesa'];
		  
$saldo = bcadd($total_despesa,0,2);
																									  

	//---------FECHAR CONCILIACAO-----------
if($solicitacao=="fechar"){
	
$datafechamento = date('Y-m-d');
$horafechamento = date('H:i:s');
$cod_conciliacao = $_POST['cod_conciliacao'];
	

	
	$comando = "update `$db`.`conciliacao` set `status` = 'fechado',`datafechamento` = '$datafechamento',`horafechamento` = '$horafechamento',`totaldespesas` = '$total_despesa' where `conciliacao`. `codigo` = '$cod_conciliacao' limit 1 ";
mysql_query($comando,$conexao);
	
}
//---------FECHAR CONCILIACAO-----------
		  ?>
	<?
	
$sql = "SELECT * FROM conciliacao where status = 'aberto' and fornecedor = '$fornecedordespesa' and concessionaria = '$estab_pertence' order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$cod_conciliacao = $linha[0];
	$dataabertura = $linha[1];
	$horaabertura = $linha[2];
	$status = $linha[5];
	$operador_contas = $linha[6];
	$estab_pertence = $linha[7];
	$saldoanterior = $linha[10];
	$cidade_fornecedor = $linha[11];
	$fornecedordespesa = $linha[14];
}
	
	?>
	
<?
	
if($solicitacao=="excluirlancamento"){
	
$cod_conciliacao_comprovante = $_POST['cod_conciliacao_comprovante'];
	
$comando = "delete from `conciliacao_comprovantes` where `conciliacao_comprovantes`. `codigo` = '$cod_conciliacao_comprovante' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao excluir cadastro");
	
}
	
	
?>
<table width="100%"  border="0">

  <tr>

    <td width="23%"><strong>N. Fantasia: <span class="style3"><? echo $estab_pertence; ?></span></strong></td>

    <td width="24%"><strong>Cidade: <span class="style3"><? echo $cidade_estab_pertence; ?></span></strong></td>

    <td width="28%"><strong>Operador: <span class="style3"><? echo $operador; ?></span></strong></td>

    <td width="13%">&nbsp;</td>

    <td width="12%"><strong>Data: <span class="style3"><? echo $data_hoje; ?></span></strong></td>

  </tr><br>

</table>
<table width="100%"  border="0">

  <tr>

    <td width="21%"><form name="form1" method="post" action="../index.php">

      <p>
        <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
        <input class='class01' type=image src="../../imagens/botoes/voltar.png" width="100" height="100" name="Submit" value="ESTOQUE DE PE&Ccedil;AS">
        <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      </p>

    </form></td>

    <td width="20%">&nbsp;</td>

    <td width="20%" rowspan="2"><form name="form1" method="post" action="index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      Fornecedor
      <select class='class02' name="fornecedordespesa" id="fornecedordespesa">
		  <option selected><? echo "$fornecedordespesa"; ?></option>
        <?
    $sql = "select * from fornecedores where estab_pertence = '$estab_pertence' order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
      </select><br>
      Colaborador
      <select class='class02' name="colaborador" id="colaborador">
        <option selected><? echo "$colaborador"; ?></option>
		 
        <?
    $sql = "select * from operadores where estab_pertence = '$estab_pertence' and veiculodaempresa = 'sim' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
    }
?>
      </select>
      <br><input class='class01' type=image src="../../imagens/botoes/abrir.png" width="100" height="100" name="Submit2" value="ESTOQUE DE PE&Ccedil;AS">
      <input name="solicitacao" type="hidden" id="solicitacao" value="abrir">
    </form></td>

    <td width="19%" valign="bottom"><form name="form1" method="post" action="index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <? if($status=="aberto"){ echo "<input class='class01' type=image src='../../imagens/botoes/fechar.png' width='100' height='100' name='Submit4' value='Fechar'>"; } ?>
      <input name="solicitacao" type="hidden" id="solicitacao" value="fechar">
      <input name="cod_conciliacao" type="hidden" id="cod_conciliacao" value="<? echo "$cod_conciliacao"; ?>">
    </form></td>
    <td width="20%" valign="bottom"><form action="../relatorios/relatorio_conciliacao.php" method="post" name="form1" target="_blank">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <span style="font-weight: bold">
      <select class='class02' name="cod_conciliacao" id="cod_conciliacao">
        <?
    $sql = "select * from conciliacao where fornecedor = '$fornecedordespesa' and concessionaria = '$estab_pertence' order by codigo desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
	
  echo "<option>".$x['codigo']."</option>";
    }
?>
      </select>
      </span>
      <br><? echo "<input class='class01' type=image src='../../imagens/botoes/relatorio.png' width='100' height='100' name='Submit4' value='Gerar Relatorio'>"; ?>
    </form></td>

  </tr>
  <tr>
    <td colspan="2"><form action="../relatorios/relatorio_de_abastecimento_por_placa.php" method="post" name="form1" target="_blank">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		
		echo "<select class='class02' name='diainicial' id='diainicial'>
          <option>$dia_atual</option>
          <option selected>01</option>
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
        <select class='class02' name='mesinicial' id='mesinicial'>
          <option selected='selected'>$mes_atual</option>
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
        <select class='class02' name='anoinicial' id='anoinicial'>
          <option>$ano_anterior</option>
          <option selected='selected'>$ano_atual</option>
          <option>$ano_posterior</option>
          </select>
        at&eacute;
        <select class='class02' name='diafinal' id='diafinal'>
          <option>$dia_atual</option>
          <option selected>31</option>
          <option>30</option>
          <option>29</option>
          <option>28</option>
          <option>27</option>
          <option>26</option>
          <option>25</option>
          <option>24</option>
          <option>23</option>
          <option>22</option>
          <option>21</option>
          <option>20</option>
          <option>19</option>
          <option>18</option>
          <option>17</option>
          <option>16</option>
          <option>15</option>
          <option>14</option>
          <option>13</option>
          <option>12</option>
          <option>11</option>
          <option>10</option>
          <option>09</option>
          <option>08</option>
          <option>07</option>
          <option>06</option>
          <option>05</option>
          <option>04</option>
          <option>03</option>
          <option>02</option>
          <option>01</option>
          </select>
        <select class='class02' name='mesfinal' id='mesfinal'>
          <option selected='selected'>$mes_atual</option>
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
        <select class='class02' name='anofinal' id='anofinal'>
          <option>$ano_anterior</option>
          <option selected='selected'>$ano_atual</option>
          <option>$ano_posterior</option>
          </select>";
		   ?>
      <br><select class='class02' name="placa" id="placa">
        <option selected><? echo "$placa"; ?></option>
        
        <?
    $sql = "select * from operadores where estab_pertence = '$estab_pertence' and veiculodaempresa = 'sim' group by placa order by placa asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['placa']."</option>";
    }
?>
      </select>
      Colaborador
      <select class='class02' name="colaborador" id="colaborador">
        <option selected><? echo "$colaborador"; ?></option>
        <?
    $sql = "select * from operadores where estab_pertence = '$estab_pertence' and veiculodaempresa = 'sim' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
    }
?>
      </select>
<?  echo "<br><input class='class01' type='submit' name='Submit5' value='Relatorio Abastecimento por placa'>";  ?>
     
    </form></td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
<?
	
if(empty($fornecedordespesa)){
	
}
else{
	
if(($solicitacao=="abrir") or ($solicitacao=="gravardespesa") or ($solicitacao=="excluirlancamento")){
?>
<table width="100%" border="0">
  <tbody>
    <tr>
      <td width="15%" align="center">Num. Concilia&ccedil;&atilde;o</td>
      <td width="35%" align="center">Data abertura</td>
      <td width="35%" align="center">Status</td>
      <td width="31%" align="center">Saldo</td>
    </tr>
    <tr>
      <td align="center"><? echo "$cod_conciliacao"; ?></td>
      <td align="center"><? echo "$dataabertura"; ?></td>
      <td align="center"><? echo "$status"; ?></td>
      <td align="center"><?

																									  
echo "R$ $saldo";
		  ?></td>
    </tr>
    <tr>
      <td colspan="4" valign="top"><table width="100%" border="1">
        
        <tr>
          <td colspan="6" align="center">Concilia&ccedil;&atilde;o de fornecedores</td>
          </tr>
        <tr>
          <td width="16%" align="center">Data</td>
          <td width="18%" align="center">Fornecedor</td>
          <td width="23%" align="center">Colaborador</td>
          <td width="15%" align="center">Descri&ccedil;&atilde;o</td>
          <td width="13%" align="center">Veiculo</td>
          <td width="15%" align="center">Placa</td>
          </tr>
        <form action="index.php" method="post" enctype="multipart/form-data" name="form1">
          <tr>
            <td align="center"><input class='class02' name="datadespesa" type="text" id="datadespesa" size="5"></td>
            <td align="center"><? echo "$fornecedordespesa"; ?>              <input name="fornecedordespesa" type="hidden" id="fornecedordespesa" value="<? echo "$fornecedordespesa"; ?>"></td>
            <td align="center"><? echo "$colaborador"; ?>
              <input name="colaborador" type="hidden" id="colaborador" value="<? echo "$colaborador"; ?>"></td>
            <td align="center"><textarea class='class02' name="descricaodespesa" id="descricaodespesa" cols="20" rows="2">Abastecimento</textarea></td>
            <td align="center"><input name="veiculo" type="text" class='class02' id="veiculo" value="<? echo "$veiculodooperador"; ?>"></td>
            <td align="center"><input name="placa" type="text" class='class02' id="placa" value="<? echo "$placadoveiculodooperador"; ?>" size="5"></td>
            </tr>
          <tr>
            <td align="center">NF</td>
            <td align="center">Categoria</td>
            <td align="center">Quant Lt</td>
            <td align="center">Pre&ccedil;o/Lt</td>
            <td align="center">Valor</td>
            <td align="center">KM</td>
          </tr>
          <tr>
            <td align="center"><input class='class02' name="nfdespesa" type="text" id="nfdespesa" size="5"></td>
            <td align="center"><select class='class02' name="categoriadespesa" id="categoriadespesa">
              <?
    $sql = "select * from categorias_despesas order by categoria asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>";
    }
?>
            </select></td>
            <td align="center"><input class='class02' name="quantlitro" type="text" id="quantlitro" size="5"></td>
            <td align="center"><input class='class02' name="precolitro" type="text" id="precolitro" size="5"></td>
            <td align="center"><input class='class02' name="valordespesa" type="text" id="valordespesa" size="5"></td>
            <td align="center"><input class='class02' name="km" type="text" id="km" size="5"></td>
          </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">Horimetro</td>
            <td colspan="2" align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            </tr>
          <tr>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center"><input class='class02' name="horimetro" type="text" id="horimetro" size="5"></td>
            <td colspan="2" align="center"><input class='class02' type="file" name="comprovantedespesa" id="comprovantedespesa"></td>
            <td align="center"><input name="operadordespesa" type="hidden" id="operadordespesa" value="<? echo "$operador"; ?>">
              <input name="solicitacao" type="hidden" id="solicitacao" value="gravardespesa">
              <input name="cod_conciliacao" type="hidden" id="cod_conciliacao" value="<? echo "$cod_conciliacao"; ?>">
              <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
              <input class='class01' type=image src="../../imagens/botoes/salvar.png" width="25" height="25" name="Submit4" value="ESTOQUE DE PE&Ccedil;AS"></td>
          </tr>
          </form>
        <tr>
          <td colspan="6" align="center">
            <table width="100%" border="0">
              <tr>
                <td width="4%" >Data</td>
                <td width="8%" >Fornecedor</td>
                <td width="10%" >Colaborador</td>
                <td width="8%" >Descrição</td>
                <td width="6%" >Veiculo</td>
                <td width="4%" >Placa</td>
                <td width="4%" >KM</td>
                <td width="5%" >HOR</td>
                <td width="6%" >Categoria</td>
                <td width="6%" >Quant Lt</td>
                <td width="6%" >Pre&ccedil;o Lt</td>
                <td width="7%" >Valor</td>
                <td width="13%" >NF</td>
                <td width="7%" >&nbsp;</td>
                <td width="6%" >#</td>
                </tr>
              <?
$sql = "SELECT * FROM conciliacao_comprovantes where cod_conciliacao = '$cod_conciliacao' order by datadespesa desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$cod_conciliacao = $linha[0];
	$cod_conciliacao_comprovante = $linha[1];
	$datadespesa = $linha[2];
	$fornecedordespesa = $linha[3];
	$descricaodespesa = $linha[4];
	$nfdespesa = $linha[5];
	$valordespesa = $linha[6];
	$comprovantedespesa = $linha[9];
	$categoriadespesa = $linha[13];
$modopagto = $linha[14];
	$veiculo = $linha[16];
	$placa = $linha[17];
	$km = $linha[18];
	$horimetro = $linha[19];
	$colaborador = $linha[20];
	$quantlitro = $linha[21];
	$precolitro = $linha[22];
?>
              <tr>
				  <form name="form1" method="post" action="index.php">
                <td ><? echo "$datadespesa"; ?></td>
                <td ><? echo "$fornecedordespesa"; ?></td>
                <td ><? echo "$colaborador"; ?></td>
                <td ><? echo "$descricaodespesa"; ?></td>
                <td ><? echo "$veiculo"; ?></td>
                <td ><? echo "$placa"; ?></td>
                <td ><? echo "$km"; ?></td>
                <td ><? echo "$horimetro"; ?></td>
                <td ><? echo "$categoriadespesa"; ?></td>
                <td ><? echo "$quantlitro"; ?></td>
                <td ><? echo "$precolitro"; ?></td>
                <td ><? echo "R$ $valordespesa"; ?></td>
                <td ><? echo "<a href='$comprovantedespesa' target='_blank'>$nfdespesa</a>"; ?></td>
                <td ><input class='class01' type=image src="../../imagens/botoes/<? if(($solicitacao=="editarlancamento") && ($codigo_a_editar==$cod_lancamento_do_controlekm) ){ echo "salvar.png"; }else{ echo "editar.png"; } ?>" width="25" height="25" name="Submit5" value="Editar Lan&ccedil;amento">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="<? if($solicitacao=="editarlancamento"){ echo "gravaredicaodelancamento"; }else{ echo "editarlancamento"; } ?>">
                  <input name="cod_lancamento_da_conciliacao" type="hidden" id="cod_lancamento_da_conciliacao" value="<? echo "$cod_lancamento_da_conciliacao"; ?>">
                  <input name="fornecedordespesa" type="hidden" id="fornecedordespesa" value="<? echo "$fornecedordespesa"; ?>"></td></form>
                <td ><form name="form1" method="post" action="index.php">
                  <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
                  <input class='class01' type=image src="../../imagens/botoes/excluir.png" width="25" height="25" name="Submit3" value="ESTOQUE DE PE&Ccedil;AS">
                  <input name="solicitacao" type="hidden" id="solicitacao" value="excluirlancamento">
                  <input name="cod_coniliacao" type="hidden" id="cod_coniliacao" value="<? echo "$cod_conciliacao"; ?>">
                  <input name="cod_conciliacao_comprovante" type="hidden" id="cod_conciliacao_comprovante" value="<? echo "$cod_conciliacao"; ?>">
<input name="fornecedordespesa" type="hidden" id="fornecedordespesa" value="<? echo "$fornecedordespesa"; ?>">
                </form></td>
                </tr>
              <? } ?>
              <tr>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                </tr>
              <tr>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">Total</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td ><?


echo "R$ $total_despesa";

?></td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                <td >&nbsp;</td>
                </tr>
              
              </table>
            </td>
          </tr>
        
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="3">&nbsp;</td>
    </tr>
  </tbody>
</table>
<? } 
	
}
	?>
<div align="center"></div>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>