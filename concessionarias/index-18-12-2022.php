<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");



?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style3 {color: #0000FF; font-weight: bold; }

-->

</style>

</head>

<?
require '../conect/conect.php';
include '../css_menus/modal.css';
include '../css_menus/modal2.css';
	
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
	  
	background="../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
	
	
	<?
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}
	
	
$sql = "select * from rdo_data_inicial_e_final";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

	$diainicialrdo = $linha[1];
	$mesinicialrdo = $linha[2];
	$anoinicialrdo = $linha[3];
	$diafinalrdo = $linha[4];
	$mesfinalrdo = $linha[5];
	$anofinalrdo = $linha[6];
}
$datainicial_do_periodo_atual_do_rdo = "$anoinicialrdo-$mesinicialrdo-$diainicialrdo";
$datafinal_do_periodo_atual_do_rdo = "$anofinalrdo-$mesfinalrdo-$diafinalrdo";



$senha = $_SESSION['senha'];
//$data_hoje = $_SESSION['data_hoje'];



$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];



}

$dia_atual = date('d');

$mes_atual = date('m');

$ano_atual = date('Y');
	
$data_atual = "$ano_atual-$mes_atual-$dia_atual";
	
$ano_anterior = date('Y')-1;

$ano_posterior = date('Y')+1;
	
	
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



?>
	
	<?
	
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
	
	
$comando = "update `$db`.`rdo_data_inicial_e_final` set `mesinicialrdo` = '$mes_inicial_do_periodo',`mesfinalrdo` = '$mes_final_do_periodo' where `rdo_data_inicial_e_final`. `codigo` = '0'";
mysql_query($comando,$conexao);
	
}
	
	?>

<body bgcolor="#<? echo $cor; ?>"> 



<?



$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$obra_operador = $linha[50];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];

$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$fornecedores = $linha[66];
$controlekm_autorizado = $linha[75];
$orcamento_autorizado = $linha[76];
$permissao_categoria_de_produtos_autorizado = $linha[77];
	
$recebenotificacao = $linha[49];
	$iniciar_rdo_diferenciado = $linha[51];
	$estoque = $linha[54];
	$conciliacoes = $linha[55];
	$despesas = $linha[56];
	$veiculos = $linha[57];
	//$rdo = $linha[58];
	$rdo_autorizado = $linha[58];
	$avisodepecas = $linha[59];
	$administracartaoponto = $linha[61];
	$relatoriodepecasutilizadas = $linha[65];
	$fornecedores = $linha[66];
	$inventario = $linha[67];
	$estoque_entradas = $linha[68];
	$cadastro_de_itens = $linha[69];
	$alimentacao_rdo = $linha[70];
	$estoque_entradas_por_xml_autorizado = $linha[71];
	$veiculodaempresa = $linha[72];
	$controlekm = $linha[75];
	$orcamento = $linha[76];
	$permissao_categoria_de_produtos = $linha[77];
	
}
	
	
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
$obra = $linha[108];
$prefixo = $linha[109];
$rdo = $linha[110];

	
$sql2 = "SELECT * FROM rdo where placa = '$placa' and data = '$data_atual' and localizacao = '$localizacao_do_veiculo' order by data desc";
$res2 = mysql_query($sql2);
$registros_rdo_lancamento = mysql_num_rows($res2);
	
if($registros_rdo_lancamento<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_atual','$diasemana','$dia_atual','$mes_atual','$ano_atual','$hora','$valormensal','$total','$obra','$prefixo','$localizacao_do_veiculo','$rdo')";
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

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO PML','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_atual','$diasemana','$dia_atual','$mes_atual','$ano_atual','$hora','$valormensal','$total','$obra','$prefixo','$localizacao_anterior','$rdo')";
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
$obra = $linha[108];
$prefixo = $linha[109];
$rdo = $linha[110];

	
$sql2 = "SELECT * FROM rdo where placa = '$placa' and data = '$data_informada' and localizacao = '$localizacao_do_veiculo' order by data desc";
$res2 = mysql_query($sql2);
$registros_rdo_lancamento = mysql_num_rows($res2);
	
if($registros_rdo_lancamento<=0){
			
$comando = "insert into rdo(codigointerno,concessionaria,operador,ordem,contrato,placa,veiculo,tipo,dataentrega,situacao,obs,data,diasemana,dia,mes,ano,hora,valormensal,total,obra,prefixo,localizacao,rdo) 

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_informada','$diasemana','$diainformado','$mesinformado','$anoinformado','$hora','$valormensal','$total','$obra','$prefixo','$localizacao_do_veiculo','$rdo')";
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

values('$codigointerno','$concessionaria','LANCAMENTO AUTOMATICO PML','$ordem','$contrato','$placa','$veiculo','$tipo','$dataentrega','','$obs','$data_informada','$diasemana','$dia_atual','$mes_atual','$ano_atual','$hora','$valormensal','$total','$obra','$prefixo','$localizacao_anterior','$rdo')";
mysql_query($comando,$conexao);
	
}
	
	
	
}//FIM DE A DATA ATUAL FOR MAIOR QUE A INICIAL DO RDO E MENOR QUE A FINAL DO RDO

}
	
}// FIM DO WHILE DE VEICULOS
	
	}
	//---------FIM DE VERIFICAÇÃO E LANÇAMENTO DE RDO EM BRANCO DO DIA---------------

?>

<table width="100%"  border="0">

  <tr>

    <td width="19%"><strong>Nome Fantasia </strong></td>

    <td width="20%"><strong>Cidade</strong></td>

    <td width="14%"><strong>Operador</strong></td>
    <td width="14%">Obra</td>

    <td width="19%"><strong>E-Mail</strong></td>

    <td width="14%"><strong>Data</strong></td>

  </tr><br>

  <tr>

    <td><span class="style3"><? echo $estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $cidade_estab_pertence; ?></span></td>

    <td><span class="style3"><? echo $operador; ?></span></td>
    <td><span class="style3"><? echo $obra_operador; ?></span></td>

    <td><span class="style3"><? echo $emailoperador; ?></span></td>

    <td><span class="style3"><? echo "$diasemana $dia_atual-$mes_atual-$ano_atual"; ?></span></td>

  </tr>

</table>

<p></p>
<div align="center"></div>

<table width="100%"  border="0">

  <tr>
    <td>&nbsp;</td>
    <td><form name="form1" method="post" action="veiculos/pesquisa.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($veiculos_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/icone-veiculos.png" width="100" height="100" name="Submit" value="Verificar Veiculos">
      <? } ?>
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <input class='class02' name="placa" type="hidden" id="placa">
      <input class='class02' name="localizacao" type="hidden" id="localizacao">
      <input class='class02' name="veiculo" type="hidden" id="veiculo">
    </form></td>
    <td><form name="form1" method="post" action="rdo/index.php">
      <?

$senha = $_SESSION['senha'];

?>
      <?
		if($rdo_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/rdo.png" width="100" height="100" name="Submit4" value="RDO">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form></td>
    <td width="14%"><form name="form1" method="post" action="estoque_pecas/menu.php" >
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($estoque_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/estoque.png" width="100" height="100" name="Submit6" value="ESTOQUE DE PE&Ccedil;AS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form></td>
    <td width="18%"><form name="form1" method="post" action="conciliacao/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($conciliacoes_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/conciliacao.png" width="100" height="100" name="Submit3" value="ESTOQUE DE PE&Ccedil;AS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form></td>
    <td align="center"><form name="form1" method="post" action="fornecedores/menu.php">
      <strong><font color="#0000FF">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
		if($fornecedores=="sim"){
			?>
        <input class='class01' type=image src="../imagens/botoes/forecedores.png" width="100" height="100" name="Submit8" value="ESTOQUE DE PE&Ccedil;AS">
        <? } ?>
        </font></strong>
    </form></td>
    <td align="center"><form name="form2" method="post" action="index.php">
      <?
		if($operador=="IVAN CAMPOS DE ARAUJO"){
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
  <select class='class02' name="obra2" id="obra2">
    <?
					  if(empty($obra)){
    $sql = "select * from obras where concessionaria = '$estab_pertence' and statusobra = 'ativo'";
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
  </span><br>
      Data
  <select class='class02' name="data_informada" id="data_informada">
    <option selected><? echo "$data_informada"; ?></option>
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
  <input class='class01' type=image src="../imagens/botoes/verificar.png" width="100" height="100" name="Submit5" value="ESTOQUE DE PE&Ccedil;AS">
  </font></strong>
  <? } ?>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form name="form1" method="post" action="controlekm/index.php" >
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($controlekm_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/controlekm.png" width="120" height="100" name="Submit9" value="ESTOQUE DE PE&Ccedil;AS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form></td>
    <td><form name="form3" method="post" action="index.php#permissoes">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
	 <?
		if($permissao_categoria_de_produtos=="sim"){
			?>	
      <input name="solicitacao" type="hidden" id="solicitacao" value="abripermissoesdesubcategoria">
      <input class='class01' type=image src="../imagens/botoes/permissoes.png" width="120" height="100" name="Submit10" value="ESTOQUE DE PE&Ccedil;AS">
    </form><? } ?></td>
    <td>&nbsp;</td>
    <td><form name="form1" method="post" action="prestacao_contas/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($despesas_autorizado=="sim"){
			?>
      <strong><font color="#0000FF">
      <input class='class01' type=image src="../imagens/botoes/despesas.png" width="100" height="100" name="Submit2" value="ESTOQUE DE PE&Ccedil;AS">
      </font></strong>
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form></td>
    <td align="center"><form name="form1" method="post" action="ponto_administracao/menu.php" target="navegacao">
      <strong><font color="#0000FF">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
		if($administracartaoponto=="sim"){
			?>
        <input class='class01' type=image src="../imagens/botoes/administracao-ponto.png" width="100" height="100" name="Submit7" value="ESTOQUE DE PE&Ccedil;AS">
        <? } ?>
        </font></strong>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="4%">&nbsp;</td>
    <td width="14%">&nbsp;</td>

    <td width="12%">&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>

  <tr>
    <td>
		<?
if($solicitacao=="permitirsubcategoria"){
	
$subcategoriapermitida = $_POST['subcategoriapermitida'];
	
$sql = "SELECT * FROM subcategoria_ec where empresaconveniada = '$estab_pertence' and sub_categoria_permitida = '$subcategoriapermitida'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$total_permissoes = mysql_num_rows($res);

}
if($total_permissoes>=1){
	echo "<script>

alert('ATENÇÃO!!!... $subcategoriapermitida JÁ SE ENCONTRA AUTORIZADA!');

</script>";
}
else{
$comando = "insert into subcategoria_ec(empresaconveniada,sub_categoria_permitida)

values('$estab_pertence','$subcategoriapermitida')";
 
mysql_query($comando,$conexao);
	
}
	
}	  
	  
	  
	  
if($solicitacao=="excluirsubcategoria"){
	
$codigosubcategoriaexcluir = $_POST['codigosubcategoriaexcluir'];
	
$comando = "delete from `subcategoria_ec` where `subcategoria_ec`. `codigo` = '$codigosubcategoriaexcluir' limit 1 ";

mysql_query($comando,$conexao);
	
}	  
	  
	  
?>
	  </td>
    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>

  <tr>

    <td colspan="5"><p>
      <?
if(($solicitacao=="permitirsubcategoria") or ($solicitacao=="excluirsubcategoria") or ($solicitacao=="abripermissoesdesubcategoria")){ ?>
      </p>
		<div id="permissoes" class="modal" role="dialog" style="overflow: auto; width: 640px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
      <table width="80%" border="0" align="center">
        <tbody>
          <tr>
            <td valign="top">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td width="46%" valign="top"><table width="100%" border="0" align="left">
              <tbody>
                <tr>
                  <th width="55%" bgcolor="#CACACA" scope="col">Sub Categorias dispon&iacute;veis</th>
                  <th width="45%" bgcolor="#CACACA" scope="col">#</th>
                  </tr>
                <?

$sql = "SELECT * FROM sub_categorias order by subcategoria asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigosubcategoria = $linha[0];
$subcategoria = $linha[8];


?>
                <tr>
                  <td bgcolor="#cacaca"><? echo "$subcategoria"; ?></td>
                  <td bgcolor="#cacaca"><form name="form5" method="post" action="index.php#permissoes">
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <input name="subcategoriapermitida" type="hidden" id="subcategoriapermitida" value="<? echo "$subcategoria"; ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="permitirsubcategoria">
                    <input class="class01" type="submit" name="submit" id="submit" value="Permitir">
                    </form></td>
                  </tr>
                <? } ?>
                </tbody>
            </table></td>
            <td width="6%">&nbsp;</td>
            <td width="48%" valign="top"><table width="100%" border="0" align="left">
              <tbody>
                <tr>
                  <th width="55%" bgcolor="#cacaca" scope="col">Sub Categorias permitidas</th>
                  <th width="45%" bgcolor="#cacaca" scope="col">#</th>
                  </tr>
                <?

$sql = "SELECT * FROM subcategoria_ec where empresaconveniada = '$estab_pertence' order by sub_categoria_permitida asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigosubcategoriaexcluir = $linha[0];
$subcategoriapermitida = $linha[2];


?>
                <tr>
                  <td bgcolor="#cacaca"><? echo "$subcategoriapermitida"; ?></td>
                  <td bgcolor="#cacaca"><form name="form5" method="post" action="index.php#permissoes">
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <input name="codigosubcategoriaexcluir" type="hidden" id="codigosubcategoriaexcluir" value="<? echo "$codigosubcategoriaexcluir"; ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="excluirsubcategoria">
                    <input class="class01" type="submit" name="submit2" id="submit2" value="X">
                    </form></td>
                  </tr>
                <? } ?>
                </tbody>
            </table>
		 </td>
          </tr>
        </tbody>
      </table>
			 </div>
    <? } ?></td>

    <td width="15%">&nbsp;</td>
    <td width="23%">&nbsp;</td>

  </tr>

</table>

<strong></strong>

<div align="center"></div>
<p>&nbsp;</p>
<?
		if($operador=="IVAN CAMPOS DE ARAUJO"){
			
			
			
		}
			?>
</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>