<?php
session_start(); //inicia sessão...
if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.

else //se não for...
header("Location: alerta.php");

?>

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

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}



//$localizacao = $_POST['localizacao'];
$senha = $_SESSION['senha'];
$obra = $_POST['obra'];
$solicitacao = $_POST['solicitacao'];


?>
<?

setlocale(LC_TIME, 'pt_BR');

$data_completa = strftime("%A, %d de %B de %Y<br><br>");

$diasemana = strftime("%A");

?>
<?
$sql1 = "SELECT * FROM operadores where senha = '$senha'";
$res1 = mysql_query($sql1);
while($linha=mysql_fetch_row($res1)) {

$operador = $linha[1];
	
$cel_operador = $linha[19];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];
	
$cidadeatuacao = $linha[48];
	
$obra_operador = $linha[50];
	
$verifica_movimentacoes_rdo = $linha[96];
	
$verifica_movimentacoes_rdo = $linha[96];

}
	
$sql = "select * from rdo_data_inicial_e_final where estab_pertence = '$estab_pertence' and obra = '$obra_operador' and statusobra = 'ativo' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$diainicialrdo = $linha[1];
	$mesinicialrdo = $linha[2];
	$anoinicialrdo = $linha[3];
	$diafinalrdo = $linha[4];
	$mesfinalrdo = $linha[5];
	$anofinalrdo = $linha[6];
	}
?>
<?

$inserirdatanordo = $_POST['inserirdatanordo'];
	
if($inserirdatanordo=="inserirdatanordo"){
	

	
$datafaltante = $_POST['datafaltante'];
$datafaltante2 = explode("-", $datafaltante);


$ano_datafaltante = $datafaltante2[0];

$mes_datafaltante = $datafaltante2[1];

$dia_datafaltante = $datafaltante2[2];
	
$datafaltante_formatada = "$ano_datafaltante-$mes_datafaltante-$dia_datafaltante";
	
	
$sql = "SELECT * FROM rdo where data = '$datafaltante_formatada' order by data desc";
$res = mysql_query($sql);
$registros_rdo_por_data = mysql_num_rows($res);
	
if($registros_rdo_por_data<=0){
	
	
$comando = "insert into rdo(data,diasemana,dia,mes,ano) 

values('$datafaltante_formatada','$diasemana','$dia_datafaltante','$mes_datafaltante','$ano_datafaltante')";
mysql_query($comando,$conexao);
	
}
	

}
?>	
<?
	
//-----------
	
	
$efetuar_verificacao = $_POST['efetuar_verificacao'];
	
$datainicial_do_periodo_atual_do_rdo = "$anoinicialrdo-$mesinicialrdo-$diainicialrdo";
$datafinal_do_periodo_atual_do_rdo = "$anofinalrdo-$mesfinalrdo-$diafinalrdo";

$dia_atual = date('d');

$mes_atual = date('m');

$ano_atual = date('Y');
	
$data_atual = "$ano_atual-$mes_atual-$dia_atual";
	
$ano_anterior = date('Y')-1;

$ano_posterior = date('Y')+1;
	
if($efetuar_verificacao=="sim"){
	

	
	
$data_informada = $_POST['data_informada'];

$data2 = explode("-", $data_informada);


$diainformado = $data2[0];

$mesinformado = $data2[1];

$anoinformado = $data2[2];
	
	
if(empty($data_informada)){
	
$data_resgatar_dia_semana = date("w", strtotime("$data_atual"));

if($data_resgatar_dia_semana==0){
	$diasemana = "Domingo";
}
if($data_resgatar_dia_semana==1){
	$diasemana = "Segunda";
}
if($data_resgatar_dia_semana==2){
	$diasemana = "Terca";
}
if($data_resgatar_dia_semana==3){
	$diasemana = "Quarta";
}
if($data_resgatar_dia_semana==4){
	$diasemana = "Quinta";
}
if($data_resgatar_dia_semana==5){
	$diasemana = "Sexta";
}
if($data_resgatar_dia_semana==6){
	$diasemana = "Sabado";
}
	
	
}
else{
	
$data_resgatar_dia_semana = date("w", strtotime("$data_informada"));

if($data_resgatar_dia_semana==0){
	$diasemana = "Domingo";
}
if($data_resgatar_dia_semana==1){
	$diasemana = "Segunda";
}
if($data_resgatar_dia_semana==2){
	$diasemana = "Terca";
}
if($data_resgatar_dia_semana==3){
	$diasemana = "Quarta";
}
if($data_resgatar_dia_semana==4){
	$diasemana = "Quinta";
}
if($data_resgatar_dia_semana==5){
	$diasemana = "Sexta";
}
if($data_resgatar_dia_semana==6){
	$diasemana = "Sabado";
}

}


	
	
if($data_atual>$datafinal_do_periodo_atual_do_rdo){
	
$calculo_do_mes_inicial_do_periodo = bcadd($mesinicialrdo,1);
	$calculo_do_mes_final_do_periodo = bcadd($mesfinalrdo,1);
	
	
	
	if($calculo_do_mes_inicial_do_periodo<=9){
		$mes_inicial_do_periodo = "0$calculo_do_mes_inicial_do_periodo";
		
	}
	else{
		if($calculo_do_mes_inicial_do_periodo>=13){
		$mes_inicial_do_periodo = "01";
		}
		else{
		$mes_inicial_do_periodo = $calculo_do_mes_inicial_do_periodo;
		}
	}
	
	if($calculo_do_mes_final_do_periodo<=9){
		$mes_final_do_periodo = "0$calculo_do_mes_final_do_periodo";
	}
	else{
		if($calculo_do_mes_final_do_periodo>=13){
		$mes_final_do_periodo = "01";
		}
		else{
		$mes_final_do_periodo = $calculo_do_mes_final_do_periodo;
		}
	}
	
	
$comando = "update `$db`.`rdo_data_inicial_e_final` set `mesinicialrdo` = '$mes_inicial_do_periodo',`mesfinalrdo` = '$mes_final_do_periodo' where `rdo_data_inicial_e_final`. `estab_pertence` = '$estab_pertence'";
mysql_query($comando,$conexao);
	
}
	
	?>

 



<?
//---------INICIO DE VERIFICAÇÃO E LANÇAMENTO DE RDO EM BRANCO DO DIA---------------
	
if(empty($data_informada)){
	
$sql = "SELECT * FROM veiculos where obra = '$obra_operador' and rdo = 'sim' and gerar_rdo_ate_essa_data <> '0000-00-00' or gerar_rdo_ate_essa_data <= '$datafinal_do_periodo_atual_do_rdo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigointerno = $linha[0];
$concessionaria = $linha[10];
$veiculo = $linha[16];
$placa = $linha[21];
$tipo = $linha[67];
$localizacao_do_veiculo = $linha[76];
$obra_veiculo = $linha[108];
$prefixo = $linha[109];
$rdo = $linha[110];

	
$sql2 = "SELECT * FROM rdo where placa = '$placa' and data = '$data_atual' and localizacao = '$localizacao_do_veiculo' order by data desc";
$res2 = mysql_query($sql2);
$registros_rdo_lancamento = mysql_num_rows($res2);
	
if($registros_rdo_lancamento<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_atual','$diasemana','$dia_atual','$mes_atual','$ano_atual','$hora','$valormensal','$total','$obra_veiculo','$prefixo','$localizacao_do_veiculo','$rdo')";
mysql_query($comando,$conexao);
	
}
	
	
$sql3 = "SELECT * FROM veiculos_alteracoes where placa = '$placa' and campoalterado = 'Localizacao' and datealteracao between '$datainicial_do_periodo_atual_do_rdo' and '$datafinal_do_periodo_atual_do_rdo'";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
	
$localizacao_anterior = $linha[3];
	
	$placaencontrada = $linha[10];
	

	
if( ($data_atual>=$datainicial_do_periodo_atual_do_rdo) && ($data_atual<=$datafinal_do_periodo_atual_do_rdo) ){
	
$sql4 = "SELECT * FROM rdo where placa = '$placaencontrada' and localizacao = '$localizacao_anterior' and data = '$data_atual' order by data asc";
$res4 = mysql_query($sql4);
$registros_rdo_lancamento_localizacao_anterior = mysql_num_rows($res4);
	
if($registros_rdo_lancamento_localizacao_anterior<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO PML','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_atual','$diasemana','$dia_atual','$mes_atual','$ano_atual','$hora','$valormensal','$total','$obra_veiculo','$prefixo','$localizacao_anterior','$rdo')";
mysql_query($comando,$conexao);
	
}
	
}//FIM SE A DATA ATUAL FOR MAIOR QUE A INICIAL DO RDO E MENOR QUE A FINAL DO RDO
	
	
}
	
	
}//FIM DO WHILE DE VEICULOS
	
}
else{
	
$sql = "SELECT * FROM veiculos where obra = '$obra_operador' and rdo = 'sim' and gerar_rdo_ate_essa_data <> '0000-00-00' or gerar_rdo_ate_essa_data <= '$datafinal_do_periodo_atual_do_rdo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigointerno = $linha[0];
$concessionaria = $linha[10];
$veiculo = $linha[16];
$placa = $linha[21];
$tipo = $linha[67];
$localizacao_do_veiculo = $linha[76];
$obra_veiculo = $linha[108];
$prefixo = $linha[109];
$rdo = $linha[110];

	
$sql2 = "SELECT * FROM rdo where placa = '$placa' and data = '$data_informada' and localizacao = '$localizacao_do_veiculo' order by data desc";
$res2 = mysql_query($sql2);
$registros_rdo_lancamento = mysql_num_rows($res2);
	
if($registros_rdo_lancamento<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_informada','$diasemana','$diainformado','$mesinformado','$anoinformado','$hora','$valormensal','$total','$obra_veiculo','$prefixo','$localizacao_do_veiculo','$rdo')";
mysql_query($comando,$conexao);
	
}
	
	
$sql3 = "SELECT * FROM veiculos_alteracoes where placa = '$placa' and campoalterado = 'Localizacao' and datealteracao between '$datainicial_do_periodo_atual_do_rdo' and '$datafinal_do_periodo_atual_do_rdo'order by codigo desc limit 1";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
	
$localizacao_anterior = $linha[3];
	$placaencontrada = $linha[10];
	

	
if( ($data_atual>=$datainicial_do_periodo_atual_do_rdo) && ($data_atual<=$datafinal_do_periodo_atual_do_rdo) ){
	
$sql4 = "SELECT * FROM rdo where placa = '$placaencontrada' and localizacao = '$localizacao_anterior' and data = '$data_informada' order by data asc";
$res4 = mysql_query($sql4);
$registros_rdo_lancamento_localizacao_anterior = mysql_num_rows($res4);
	
if($registros_rdo_lancamento_localizacao_anterior<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO PML','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_informada','$diasemana','$dia_atual','$mes_atual','$ano_atual','$hora','$valormensal','$total','$obra_veiculo','$prefixo','$localizacao_anterior','$rdo')";
mysql_query($comando,$conexao);
	
}
	
	
	
}//FIM DE A DATA ATUAL FOR MAIOR QUE A INICIAL DO RDO E MENOR QUE A FINAL DO RDO

}
	
}// FIM DO WHILE DE VEICULOS
	
	}
	//---------FIM DE VERIFICAÇÃO E LANÇAMENTO DE RDO EM BRANCO DO DIA---------------
	
//-----------------------------------
	
}
	
?>
	

	
<?

$localizacaoinformada = $_POST['localizacao'];

if(empty($localizacaoinformada)){
$localizacao = $cidadeatuacao;
}
else{
$localizacao = $localizacaoinformada;
}

//---------

$diainformado = $_POST['dia'];

if(empty($diainformado)){
$dia = date('d');
}
else{
$dia = $diainformado;
}

//----------

$mesinformado = $_POST['mes'];

if(empty($mesinformado)){
$mes = date('m');
}
else{
$mes = $mesinformado;
}

if($mes=="01"){
$mesanterior = "12";
}
else{
	
$mesanterior_calculo = bcsub($mes,1);
	
if($mesanterior_calculo<=9){
$mesanterior = "0$mesanterior_calculo";
}
else{
$mesanterior = $mesanterior_calculo;
}
	
}

//----------

if($mes=="12"){
$mesposterior = "01";
}
else{
	
$mesposterior_calculo = bcadd($mes,1);
	
if($mesposterior_calculo<=9){
$mesposterior = "0$mesposterior_calculo";
}
else{
$mesposterior = $mesposterior_calculo;
}
	
}

//----------

$anoinformado = $_POST['ano'];

if(empty($anoinformado)){
$ano = date('Y');
}
else{
$ano = $anoinformado;
}

$ano_anterior = bcsub($ano,1);
$ano_posterior = bcadd($ano,1);

$data = "$ano-$mes-$dia";
$hora = date('H:i:s');
//----------


if($solicitacao=="gravarsituacao"){
	
$codigointerno = $_POST['codigointerno'];
$situacao = $_POST['situacao'];
	
$sql2 = "SELECT * FROM veiculos where codigo = '$codigointerno'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$codigointerno = $linha[0];

$concessionaria = $linha[10];

$cnpj_concessionaria = $linha[11];

$tel_concessionaria = $linha[12];

$email_concessionaria = $linha[13];

$cidade_concessionaria = $linha[14];

$estado_concessionaria = $linha[15];

$veiculo = $linha[16];

$anoveiculo = $linha[17];

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

}
	
$sql3 = "SELECT * FROM rdo where codigointerno = '$codigointerno' and data = '$data'";
$res3 = mysql_query($sql3);
$registros_rdo = mysql_num_rows($res3);
while($linha=mysql_fetch_row($res3)) {

$codigordo = $linha[0];
	
}
	
if($registros_rdo<=0){
	
	
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total) 

values('$codigointerno','$concessionaria','$operador','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','$situacao','$obs','$data','$diasemana','$dia','$mes','$ano','$hora','$valormensal','$total')";

mysql_query($comando,$conexao) or die("Erro ao registrar RDO do veiculo");
	
}
else{
	
	
$comando = "update `$db`.`rdo` set `situacao` = '$situacao' where `rdo`. `codigo` = '$codigordo' limit 1 ";
mysql_query($comando,$conexao);
	
}
	
}

?>


<title>VISUALIZANDO TODOS REGISTROS DE VEICULOS DE <? echo "$localizacao"; ?></title>
<table width="80%"  border="0" align="center">
      <tr>
          <td><div align="center"><? echo "$estab_pertence - $diainicialrdo-$mesinicialrdo-$anoinicialrdo ate $diafinalrdo-$mesfinalrdo-$anofinalrdo"; ?></div></td>
        </tr>
  </table>
  <table width="95%"  border="0" align="center">
          <tr>
            <td align="left" valign="bottom"><form name="form1" method="post" action="../index.php">
              <?
$senha = $_SESSION['senha'];

?>
              <input class="class01" type=image src="../../imagens/botoes/voltar.png" width="100" height="100" name="Submit3" value="Voltar">
              <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
            </form></td>
            <td align="center" valign="bottom">&nbsp;</td>
            <td align="center" valign="top"><form name="form3" method="post" action="index.php">
              <p>
                <?
$senha = $_SESSION['senha'];

?>
                <label for="datafaltante">Data faltante
                  <input name="inserirdatanordo" type="hidden" id="inserirdatanordo" value="<? echo "inserirdatanordo"; ?>">
                :</label>
                <input class="class02" type="date" name="datafaltante" id="datafaltante">
                <input class='class01' type=image src="../../imagens_botoes/ok.png" width="30" height="30" name="Submit4" value="RDO Alimentar">
              </p>
              <p> <? if($inserirdatanordo=="inserirdatanordo"){ if($registros_rdo_por_data>=0){ echo "Data informada $datafaltante_formatada já consta no RDO!!!..."; }else{ echo "Data $datafaltante_formatada inserida no RDO com sucesso!!!..."; } } ?></p>
            </form></td>
            <td align="center" valign="top"><form name="form2" method="post" action="index.php">
              <input name="efetuar_verificacao" type="hidden" id="efetuar_verificacao" value="<? echo "sim"; ?>">
              <?
		if($verifica_movimentacoes_rdo=="sim"){
			?>
              <?
$senha = $_SESSION['senha'];

?>
              <?
					
$sql = "SELECT * FROM rdo where localizacao = '$localizacao' order by data desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$data_ultimo_rdo_gerado = $linha[12];
	$dia_ultimo_rdo_gerado = $linha[14];
	$mes_ultimo_rdo_gerado = $linha[15];
	$ano_ultimo_rdo_gerado = $linha[16];

}
					

// converte as datas para o formato timestamp
$d1 = strtotime($data_informada); 
$d2 = strtotime($data_ultimo_rdo_gerado);
// verifica a diferen&ccedil;a em segundos entre as duas datas e divide pelo n&uacute;mero de segundos que um dia possui
$datafinal = ($d2 - $d1) /86400;
// caso a data 2 seja menor que a data 1
if($datafinal < 0)
$datafinal = $datafinal * -1;
					

					
?>
              Obra<span style="font-weight: bold">
  <select class='class02' name="obra" id="obra">
    <?
					  if(empty($obra)){
    $sql = "select * from obras where concessionaria = '$estab_pertence' and statusobra = 'ativo'";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['obra']."</option>";
    }
					  }
					  else{
						  
		echo "<option selected>$obra_operador</option>";
						  
					  }
?>
  </select>
  </span><br>
              Data
  <select class='class02' name="data_informada" id="data_informada">
    <option selected><? if(empty($data_informada)){ echo "$data_atual"; }else{ echo "$data_informada"; } ?></option>
    <option><? echo "$data_atual"; ?></option>
    <?
	  
			  
$sql10 = "SELECT * FROM rdo where data < '$data_atual' group by data order by data desc limit 35";
$result10 = mysql_query($sql10);
while($x=mysql_fetch_array($result10)) {
echo "<option>".$x['data']."</option>";
}

	  ?>
  </select>
  <br>
  <strong><font color="#0000FF">
  <input class='class01' type=image src="../../imagens/botoes/verificar.png" width="100" height="100" name="Submit5" value="ESTOQUE DE PE&Ccedil;AS">
  </font></strong>
  <? } ?>
            </form></td>
          </tr>
          <tr>
                <td width="16%" align="center" valign="bottom">&nbsp;</td>
                <td width="19%" align="center" valign="bottom"><form name="form2" method="post" action="rdo_alimentacao.php">
                  <?
$senha = $_SESSION['senha'];

?>
                  <input class='class01' type=image src="../../imagens/botoes/rdo-alimentar.png" width="100" height="100" name="Submit" value="RDO Alimentar">
                </form></td>
                <td width="28%" align="center" valign="bottom"><form action="../relatorios/relatorio_de_rdo_sintetico.php" method="post" name="form2" target="_blank">
                  <?
$senha = $_SESSION['senha'];

?>Obra <span style="font-weight: bold">
                  <?
if(empty($obra)){
echo "$obra_operador";
}else{
echo "$obra";
}

?>
                  <input name="obra" type="hidden" id="obra" value="<? if(empty($obra)){ echo "$obra_operador"; }else{ echo "$obra"; } ?>">
                  <br>
                  De 
                  <select class='class02' name="dia_inicial" id="dia_inicial">
                    <option selected>
                      <? echo "$diainicialrdo"; ?>
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
                  <select class='class02' name="mes_inicial" id="mes_inicial">
                    <option selected>
                      <? echo "$mesinicialrdo"; ?>
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
                  <select class='class02' name="ano_inicial" id="ano_inicial">
                    <option> <? echo $ano_anterior; ?> </option>
                    <option selected><? echo $anoinicialrdo; ?></option>
                    <option> <? echo $ano_posterior; ?> </option>
                  </select>
<br>at&eacute;
<select class='class02' name="dia_final" id="dia_final">
  <option selected>
  <? echo "$diafinalrdo"; ?>
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
<select class='class02' name="mes_final" id="mes_final">
  <option selected>
  <? echo "$mesfinalrdo"; ?>
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
<select class='class02' name="ano_final" id="ano_final">
  <option> <? echo $ano_anterior; ?> </option>
  <option selected><? echo $anofinalrdo; ?></option>
  <option> <? echo $ano_posterior; ?> </option>
</select>
                  </span><br>
                  <input class='class01' type=image src="../../imagens/botoes/rdo-relatorio.png" width="100" height="100" name="Submit2" value="RDO Relatorio">
                </form></td>
                <td width="37%" align="center" valign="bottom">&nbsp;</td>
        </tr>
</table>
  