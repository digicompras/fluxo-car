<?php
session_start(); //inicia sessão...
if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.

else //se não for...
header("Location: alerta.php");

?>

<?
require '../../conect/conect.php';

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}

//$localizacao = $_POST['localizacao'];
$senha = $_SESSION['senha'];

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

}

//-----------

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

  <form name="form1" method="post" action="../index.php">
    <?
$senha = $_SESSION['senha'];

?>
    <input class="class01" type="submit" name="Submit3" value="Voltar">
  <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
  </form>
  <table width="80%"  border="0" align="center">
        <tr>
          <td><div align="center"></div></td>
        </tr>
  </table>
  <table width="80%"  border="0" align="center">
          <tr>
                <td width="16%" align="center"><form name="form2" method="post" action="rdo_alimentacao.php">
                  <?
$senha = $_SESSION['senha'];

?>
                  <input class='class01' type="submit" name="Submit" value="RDO Alimentar">
                </form></td>
                <td width="19%" align="center">&nbsp;</td>
                <td width="62%" align="center"><form action="../relatorios/relatorio_de_rdo_sintetico.php" method="post" name="form2" target="_blank">
                  <?
$senha = $_SESSION['senha'];

?>Obra <span style="font-weight: bold">
                  <select class='class02' name="obra" id="obra">
					  <?
					  if(empty($obra)){
    $sql = "select * from obras where statusobra = 'ativo'";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['obra']."</option>";
    }
					  }
					  else{
						  
		echo "<option selected>$obra</option>";
						  
					  }
?>
                    
                    
                  </select>
                  Periodo 
                  <select class='class02' name="dia_inicial" id="dia_inicial">
                    <option selected>
                      <? echo "16"; ?>
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
                      <? 
						if(($dia>="16") && ($dia<="31")){
							echo $mes;
						}
						else{
						echo $mesanterior;
						}
						
						?>
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
                    <option selected><? echo $ano; ?></option>
                    <option> <? echo $ano_posterior; ?> </option>
                  </select>
at&eacute;
<select class='class02' name="dia_final" id="dia_final">
  <option selected>
  <? echo "15"; ?>
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
  <? 
	  if($dia>="16"){
		  
		  echo $mesposterior;
		  
	  }
	  else{
		  
	  echo $mes;
		  
	  }
	  
	  ?>
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
  <option selected><? echo $ano; ?></option>
  <option> <? echo $ano_posterior; ?> </option>
</select>
                  </span>
                  <input class='class01' type="submit" name="Submit2" value="RDO Relatorio">
                </form></td>
                <td width="3%" align="center">&nbsp;</td>
        </tr>
</table>
  