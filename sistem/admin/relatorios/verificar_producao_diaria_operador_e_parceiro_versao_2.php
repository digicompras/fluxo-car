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

<title>PRODU&Ccedil;&Atilde;O DI&Aacute;RIA - ALLCRED FINANCEIRA</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style4 {font-size: 18px}

.style5 {font-size: 24px}

.style7 {

	font-size: 9px;

	font-weight: bold;

}

.style13 {font-size: 14px}

.style14 {font-size: 14px; font-weight: bold; }
.style3 {font-size: 10px}
.style15 {font-size: 10px; font-weight: bold; }

-->

</style>
</head>

<?



require '../../conect/conect.php';



$dataproposta = $_POST['dataproposta'];
$tipo_proposta = $_POST['tipo_proposta'];



$dia = date('d');

$mes = date('m');

$ano = date('Y');

$hora = date('H:i:s');



$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>











      <p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>

      <form name="form1" method="post" action="../propostas/informe_operador_para_gerar_relatorio_mensal.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
</form>

<p class="style4"><strong>Total monet&aacute;rio l&iacute;quido realizado  - <span class="style5"><strong>

  <?
  
if($tipo_proposta=="Todos"){


$sql = "select sum(valor_credito) as total from propostas where dataproposta = '$dataproposta'";

}

else{

$sql = "select sum(valor_credito) as total from propostas where dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta'";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_empresa = $linha['total'];

$valor_total_empresa_formatada = number_format($valor_total_empresa, 2, ",", ".");





echo "R$ ".$valor_total_empresa_formatada;

?> </strong></span></strong></p>
<p class="style4"><strong>Total monet&aacute;rio bruto realizado  - <span class="style5"><strong>
<?

if($tipo_proposta=="Todos"){


$sql = "select sum(valor_total) as total_bruto from propostas where dataproposta = '$dataproposta'";

}

else{

$sql = "select sum(valor_total) as total_bruto from propostas where dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta'";


}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_bruto_empresa = $linha['total_bruto'];

$valor_total_bruto_empresa_formatada = number_format($valor_total_empresa, 2, ",", ".");





echo "R$ ".$valor_total_bruto_empresa_formatada;

?>
</strong></span></strong></p>
<p><span class="style4"><strong>Total de contratos CONSIGNADOS efetivados - 

            <span class="style5">

            <strong>

            <?
			
if($tipo_proposta=="Todos"){


$sql = "select * from propostas where dataproposta = '$dataproposta'";

}

else{

$sql = "select * from propostas where dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta'";



}

$resultado=mysql_query($sql);

$registros_total = mysql_num_rows($resultado);



echo $registros_total;

?>
    </strong></span></strong></span><br>
</p>
<p><strong>Relat&oacute;rio de produ&ccedil;&atilde;o di&aacute;ria gerado em </strong> <span class="style14"><? echo $dia."-".$mes."-".$ano ; ?></span><strong> hor&aacute;rio <span class="style13"><? echo $hora; ?></span></strong> </p>
      <p><strong>Pesquisando na data <span class="style13"><? echo $dataproposta; ?></span> por Tipo de proposta &quot;<span class="style13"><? echo $tipo_proposta; ?></span>&quot;</strong><br>
      </p>
<p>
  <?

// a partir desse ponto começa a listagem e gravação dos dados

	

$sql = "SELECT * FROM operadores where funcao <> 'Psicóloga Organizacional' and funcao <> 'Secretaria' and funcao <> 'Assistente' and funcao <> 'Operador de Privado' and status = 'Ativo' order by nome asc";


$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nome_operador = $linha[1];


$meta = $linha[55];




?>            
        
        
        
  <?
  
if($tipo_proposta=="Todos"){


$sql = "select sum(valor_total) as total from propostas where operador = '$nome_operador' and mes_ano_status = '$mes_ano_status' and status = 'PAGO AO CLIENTE'";

}

else{

$sql = "select sum(valor_total) as total from propostas where operador = '$nome_operador' and mes_ano_status = '$mes_ano_status' and status = 'PAGO AO CLIENTE' and tipo_proposta = '$tipo_proposta'";


}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$soma_total_operador = $linha['total'];



if($soma_total_operador==0){ $total_operador = "0"; }



else{

$total_operador = $soma_total_operador;

}

?>
        
        
        
  <?
  
if($tipo_proposta=="Todos"){


$sql = "select * from propostas where operador = '$nome_operador' and mes_ano_status = '$mes_ano_status' and status = 'PAGO AO CLIENTE'";

}

else{

$sql = "select * from propostas where operador = '$nome_operador' and mes_ano_status = '$mes_ano_status' and status = 'PAGO AO CLIENTE' and tipo_proposta = '$tipo_proposta'";


}

$resultado=mysql_query($sql);

$registros = mysql_num_rows($resultado);





?>
        
        
        
  <?

if($meta==0){

$percentual_definido = "0.000";

}

else{

		  

		  $percentual_decimal = bcdiv($total_operador,$meta,5);

		  $percentual_definido = bcmul($percentual_decimal,100,3);

		  

	}	  

		   ?>
        
  <?

$sql = "select sum(meta) as total from operadores where funcao <> 'Psicóloga Organizacional' and funcao <> 'Secretaria' and funcao <> 'Assistente'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$meta_total_empresa = $linha['total'];



?>
        
  <?
  
if($tipo_proposta=="Todos"){


$sql = "select sum(valor_credito) as total from propostas where dataproposta = '$dataproposta'";

}

else{

$sql = "select sum(valor_credito) as total from propostas where dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta'";


}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_empresa_momento = $linha['total'];



?>
        
  <? $percentual_decimal = bcdiv($valor_total_empresa_momento,$meta_total_empresa,5);

		  $percentual_definido_empresa = bcmul($percentual_decimal,100,3);



		  

		   ?>
        
  <?

//$comando = "insert into mapa_producao(dia,mes,ano,hora,nome_operador,meta,total_operador,registros,percentual_definido,valor_total_empresa,registros_total,meta_total_empresa,valor_total_empresa_momento,percentual_definido_empresa)

 //values('$dia','$mes','$ano','$hora','$nome_operador','$meta','$total_operador','$registros','$percentual_definido','$valor_total_empresa','$registros_total','$meta_total_empresa','$valor_total_empresa_momento','$percentual_definido_empresa')";





//mysql_query($comando,$conexao);



}

?>
      </p>

<p></p>

      <table width="100%"  border="0">
        
        <tr bgcolor="#ffffff">
          <td><div align="center" class="style15">N&ordm; Proposta </div></td>
          <td><div align="center" class="style15">Valor Solicitado </div></td>
          <td><div align="center" class="style15">Valor liq cliente </div></td>
          <td><div align="center"><strong><span class="style3">Valor Total </span></strong></div></td>
          <td><div align="center"><strong><span class="style3">Tabela</span></strong></div></td>
          <td><div align="center" class="style15">Cliente</div></td>
          <td><div align="center" class="style15">CPF</div></td>
          <td width="2%"><div align="center" class="style15">Prazo</div></td>
          <td width="5%"><div align="center" class="style15">R$ Parcelas </div></td>
          <td><div align="center" class="style15">Tipo de Proposta </div></td>
          <td><div align="center" class="style15">Bco Opera&ccedil;&atilde;o </div></td>
          <td><div align="center" class="style3"><strong>Bco Quita&ccedil;&atilde;o</strong></div></td>
          <td><div align="center" class="style15">Status</div></td>
          <td><div align="center" class="style15">Operador</div></td>
        </tr>
                <?
if($tipo_proposta=="Todos"){
			  
			  
$sql = "SELECT * FROM operadores where funcao <> 'Psicologa Organizacional' and funcao <> 'Secretaria' and funcao <> 'Assistente' and funcao <> 'Operador de Privado' and status = 'Ativo' order by nome asc";

}
else{

$sql = "SELECT * FROM propostas where dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta' group by nome_operador order by nome_operador asc";
}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nome_operador = $linha[1];


?>

        <?
					
if($tipo_proposta=="Todos"){

$sql_2 = "SELECT * FROM propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta' order by nome asc";

}

else{

$sql_2 = "SELECT * FROM propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta' order by nome asc";


}
$res_2 = mysql_query($sql_2);

while($linha=mysql_fetch_row($res_2)) {



$comissao_op = $linha[101];

$tabela = $linha[109];

$valor_total = $linha[113];

$valor_liquido_cliente = $linha[115];


$bco_quitacao = $linha[161];

$meta = $linha[171];


?>
        <tr>
          <td width="6%"><div align="center"><span class="style3"><? printf("$linha[0]"); ?></span></div></td>
          <td width="8%"><div align="center" class="style3"><? printf("R$ $linha[25]");?> </div></td>
          <td width="7%"><div align="center"><span class="style3"><? echo "R$ ".$valor_liquido_cliente;?></span></div></td>
          <td width="7%"><div align="center"><span class="style3"><? echo $valor_total;?></span></div></td>
          <td width="7%"><div align="center"><span class="style3"><? echo $tabela;?></span></div></td>
          <td width="15%"><div align="center" class="style3"><? printf("$linha[4]");?> </div></td>
          <td width="9%"><div align="center" class="style3"><? printf("$linha[7]");?> </div></td>
          <td><div align="center" class="style3"><? printf("$linha[26]"); ?> </div></td>
          <td><div align="center" class="style3"><? printf("$linha[27]"); ?> </div></td>
          <td width="7%"><div align="center" class="style3"><? printf("$linha[83]"); ?> </div></td>
          <td width="8%"><div align="center" class="style3"><? printf("$linha[86]"); ?></div></td>
          <td width="8%"><div align="center"><span class="style3"><? echo $bco_quitacao; ?></span></div></td>
          <td width="8%"><div align="center" class="style3"><? printf("$linha[51]");?></div></td>
          <td width="8%"><div align="center"><span class="style3"><? echo $nome_operador;?></span></div></td>
          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
          <? } ?>
        <tr>
          <td><span class="style3">Total</span></td>
          <td><div align="center" class="style3"> <strong>
              <?

if($tipo_proposta=="Todos"){

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta' order by nome asc";

}

else{

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>
          </strong> </div></td>
          <td><div align="center"><span class="style3"><strong>
              <?

if($tipo_proposta=="Todos"){

$sql = "select sum(valor_liquido_cliente) as total from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta'order by nome asc";

}

else{

$sql = "select sum(valor_liquido_cliente) as total from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_liquido_cliente = $linha['total'];



echo "R$ ".$valor_liquido_cliente;

?>
          </strong></span></div></td>
          <td><div align="center"><span class="style3"><strong>
              <?

if($tipo_proposta=="Todos"){

$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta' order by nome asc";

}

else{

$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>
          </strong></span></div></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><span class="style3"></span></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><span class="style3"></span></td>
          <td><div align="center"><span class="style3"></span></div></td>
          <td><div align="center"></div></td>
          <td><div align="right" class="style3"></div></td>
          <td>&nbsp;</td>
        </tr>
          <?  } ?>
</table>
<table width="100%"  border="0">
        <tr>
          <td colspan="11"><div align="center">VEICULOS</div></td>
        </tr>
        <tr>
          <td><div align="center"><strong><span class="style3">N&ordm; Proposta </span></strong></div></td>
          <td><div align="center" class="style15">Titulo Proposta</div></td>
          <td><div align="center" class="style15">Tipo Proposta</div></td>
          <td><div align="center"><strong><span class="style3">Valor a Financiar</span></strong></div></td>
          <td><div align="center"><strong><span class="style3">Prazo</span></strong></div></td>
          <td><div align="center"><strong><span class="style3">Cliente</span></strong></div></td>
          <td><div align="center"><strong><span class="style3">CPF</span></strong></div></td>
          <td><div align="center"><strong><span class="style3">R$ Parcelas </span></strong></div></td>
          <td><div align="center"><strong><span class="style3">Status</span></strong></div></td>
          <td><div align="center"><strong><span class="style3">Premia&ccedil;&atilde;o</span></strong></div></td>
          <td><div align="center" class="style3"><strong>Operador</strong></div></td>
        </tr>
        <?
$sql2 = "SELECT * FROM propostas_veiculos where dataproposta = '$dataproposta' order by operador_atendente asc";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {



$num_proposta_veiculos = $linha[0];

$dataproposta_veiculos = $linha[1];

$horaproposta_veiculos = $linha[2];

$mes_ano_veiculos = $linha[3];

$estabelecimento_proposta_veiculos = $linha[4];

$operador_atendente_veiculos = $linha[5];

$status_veiculos = $linha[6];

$tipo_veiculos = $linha[7];

$tipo_proposta_veiculos = $linha[8];

$nome_veiculos = $linha[9];

$tipo_pessoa_veiculos = $linha[10];

$data_nasc_veiculos = $linha[11];

$cpf_veiculos = $linha[12];

$rg_veiculos = $linha[13];

$orgao_veiculos = $linha[14];

$emissao_veiculos = $linha[15];

$sexo_veiculos = $linha[16];

$estadocivil_veiculos = $linha[17];

$nacionalidade_veiculos = $linha[18];

$quant_dependente_veiculos = $linha[19];

$pai_veiculos = $linha[20];

$mae_veiculos = $linha[21];

$conjuge_veiculos = $linha[22];

$data_nasc_conjuge_veiculos = $linha[23];

$endereco_veiculos = $linha[24];

$numero_veiculos = $linha[25];

$bairro_veiculos = $linha[26];

$complemento_veiculos = $linha[27];

$cidade_veiculos = $linha[28];

$estado_veiculos = $linha[29];

$cep_veiculos = $linha[30];

$correspondencia_veiculos = $linha[31];

$tipo_residencia_veiculos = $linha[32];

$valor_aluguel_veiculos = $linha[33];

$tempo_residencia_veiculos = $linha[34];

$telefone_veiculos = $linha[35];

$celular_veiculos = $linha[36];

$tipo_telefone_veiculos = $linha[37];

$residencia_anterior_veiculos = $linha[38];

$bairro_anterior_veiculos = $linha[39];

$cidade_anterior_veiculos = $linha[40];

$estado_anteriorv = $linha[41];

$tempo_residencia_anterior_veiculos = $linha[42];

$email_veiculos = $linha[43];

$empresa_veiculos = $linha[44];

$porte_empresa_veiculos = $linha[45];

$data_admissao_veiculos = $linha[46];

$inicio_atividade_veiculos = $linha[47];

$end_empresa_veiculos = $linha[48];

$numero_empresa_veiculos = $linha[49];

$complemento_empresa_veiculos = $linha[50];

$bairro_empresa_veiculos = $linha[51];

$cep_empresa_veiculos = $linha[52];

$cidade_empresa_veiculos = $linha[53];

$estado_empresa_veiculos = $linha[54];

$telefone_empresa_veiculos = $linha[55];

$cpt_veiculos = $linha[56];

$serie_veiculos = $linha[57];

$cargo_veiculos = $linha[58];

$natureza_operacao_veiculos = $linha[59];

$salario_veiculos = $linha[60];

$atividade_principal_veiculos = $linha[61];

$data_constituicao_veiculos = $linha[62];

$cnpj_veiculos = $linha[63];

$inscr_est_veiculos = $linha[64];

$tel_contador_veiculos = $linha[65];

$atividade_anterior_veiculos = $linha[66];

$data_admissao_anterior_veiculos = $linha[67];

$data_saida_veiculos = $linha[68];

$cargo_anterior_veiculos = $linha[69];

$telefone_empresa_anterior_veiculos = $linha[70];

$outras_rendas_veiculos = $linha[71];

$ref_pessoal_veiculos = $linha[72];

$tel_ref_pessoal_veiculos = $linha[73];

$ref_pessoal2_veiculos = $linha[74];

$tel_ref_pessoal2_veiculos = $linha[75];

$ref_comercial_veiculos = $linha[76];

$tel_ref_comercial_veiculos = $linha[77];

$ref_banco_veiculos = $linha[78];

$ref_agencia_veiculos = $linha[79];

$ref_conta_veiculos = $linha[80];

$ref_tipo_conta_veiculos = $linha[81];

$ref_conta_desde_veiculos = $linha[82];

$cartao_credito_veiculos = $linha[83];

$automovel_veiculos = $linha[84];

$valor_automoveis_veiculos = $linha[85];

$residencia_veiculos = $linha[86];

$valor_residencia_veiculos = $linha[87];

$outras_propriedades_veiculos = $linha[88];

$valor_outras_propriedades_veiculos = $linha[89];

$veiculo_veiculos = $linha[90];

$ano_modelo_veiculos = $linha[91];

$renavam_veiculos = $linha[92];

$num_portas_veiculos = $linha[93];

$combustivel_veiculos = $linha[94];

$placa_veiculos = $linha[95];

$valor_venda_veiculos = $linha[96];

$valor_entrada_veiculos = $linha[97];

$tarifa_cadastro_veiculos = $linha[98];

$valor_financiar_veiculos = $linha[99];

$coeficiente_veiculos = $linha[100];

$codigo_tabela_veiculos = $linha[101];

$num_parcelas_veiculos = $linha[102];

$valor_parcelas_veiculos = $linha[103];

$vencto_1_parcela_veiculos = $linha[104];

$r_veiculos = $linha[105];

$valor_liberado_veiculos = $linha[106];

$pagto_serv_terc_veiculos = $linha[107];

$obs_veiculos = $linha[108];

$operador_veiculos = $linha[109];

$cel_operador_veiculos = $linha[110];

$email_operador_veiculos = $linha[111];

$estab_pertence_veiculos = $linha[112];

$cidade_estab_pertence_veiculos = $linha[113];

$tel_estab_pertence_veiculos = $linha[114];

$email_estab_pertence_veiculos = $linha[115];

$operador_alterou_veiculos = $linha[116];

$cel_operador_alterou_veiculos = $linha[117];

$email_operador_alterou_veiculos = $linha[118];

$estab_alterou_veiculos = $linha[119];

$cidade_estab_alterou = $linha[120];

$tel_estab_alterou_veiculos = $linha[121];

$email_estab_alterou_veiculos = $linha[122];

$dataalteracao_veiculos = $linha[123];

$horaalteracao_veiculos = $linha[124];

$recebido_veiculos = $linha[125];

$comissao_op_veiculos = $linha[126];

$meses_veiculos = $linha[127];

$trinta_veiculos = $linha[128];

$quarenta_cinco_veiculos = $linha[129];

$meses_residencia_veiculos = $linha[130];

$ddd_tel_veiculos = $linha[131];

$ddd_cel_veiculos = $linha[132];

$ddd_tel_empresa_veiculos = $linha[133];

$ddd_tel_contador_veiculos = $linha[134];

$ddd_tel_empresa_anterior_veiculos = $linha[135];

$ddd_ref_pessoal_veiculos = $linha[136];

$ddd_ref_pessoal2_veiculos = $linha[137];

$ddd_ref_comercial_veiculos = $linha[138];

$digito_agencia_veiculos = $linha[139];

$digito_conta_veiculos = $linha[140];

$ano_ref_conta_veiculos = $linha[141];

$modelo_veiculos = $linha[142];

$estado_emissao_veiculos = $linha[143];

$mista_veiculos = $linha[144];

$parecer_credito_veiculos = $linha[145];

$bem_veiculos = $linha[146];

$titulo_proposta = $linha[150];


?>
        <tr>
          <td><div align="center"><span class="style3"><? echo $num_proposta_veiculos; ?></span></div></td>
          <td><div align="center"><span class="style3"><? echo $titulo_proposta_veiculos; ?></span></div></td>
          <td><div align="center"><span class="style3"><? echo $tipo_proposta_veiculos; ?></span></div></td>
          <td><div align="center"><span class="style3"><? echo $valor_financiar_veiculos;?></span></div></td>
          <td><div align="center"><span class="style3"><? echo $num_parcelas_veiculos; ?></span></div></td>
          <td><div align="center"><span class="style3"><? echo $nome_veiculos;?></span></div></td>
          <td><div align="center"><span class="style3"><? echo $cpf_veiculos;?></span></div></td>
          <td><div align="center"><span class="style3"><? echo $valor_parcelas_veiculos; ?></span></div></td>
          <td><div align="center"><span class="style3"><? echo $status_pagto_cliente_veiculos;?></span></div></td>
          <td><div align="center"><span class="style3"><? echo "R$ ".$comissao_op_veiculos;?></span></div></td>
          <td><div align="center"><span class="style3"><? echo $operador_atendente_veiculos;?></span></div></td>
        </tr>
        <? } ?>
      </table>
<p>&nbsp;</p>
      <p>
        
</p>
<p>&nbsp;            </p>
<p>
<p>






          

<p align="center">
<p>&nbsp;</p>
<p align="center">

<?

$sql = "SELECT * FROM allcred limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$endereco = $linha[5];

$numero = $linha[6];

$bairro = $linha[7];

$cep = $linha[9];

$cidade = $linha[10];

$estado = $linha[11];

$telefone = $linha[12];

$fax = $linha[13];

$email_empresa = $linha[14];

$site = $linha[15];



}



?>

<br>

<span class="style4"><strong><? echo $site; ?></strong></span>

<br>

<? echo $endereco; ?>

,

<? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?>

<br>

<? echo "Telefone / Fax: ". $telefone." "; ?>

/ <? echo $fax; ?>

<br>

<? echo "E-Mail: ". $email_empresa; ?>

</p>

<p align="center"><span class="style7">

  <? echo $meta_inss; ?>

</span><span class="style4"><strong><span class="style5"><strong>

</strong></span></strong></span> </p>

</body>

</html>

