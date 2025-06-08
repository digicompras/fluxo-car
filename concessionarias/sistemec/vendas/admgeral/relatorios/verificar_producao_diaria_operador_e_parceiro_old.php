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

        <input type="submit" name="Submit2" value="Voltar">

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
<p><span class="style4"><strong>Total de contratos efetivados - 

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

            </strong></span> </strong></span><br>

    </p>

      <p><strong>Verificando produ&ccedil;&atilde;o di&aacute;ria em </strong> <span class="style14"><? echo $dia."-".$mes."-".$ano ; ?></span><strong> hor&aacute;rio <span class="style13"><? echo $hora; ?></span></strong> </p>

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
<table width="100%" border="0">
        <tr>
          <td width="100%" colspan="3"><div align="center">OPERADORES (funcion&aacute;rios)</div>            <div align="center"></div></td>
        </tr>
        <tr>
          <td colspan="3" valign="top"><div align="center">
            <table width="100%"  border="1">
              <?
$sql = "SELECT * FROM operadores where funcao <> 'Psicologa Organizacional' and funcao <> 'Secretaria' and funcao <> 'Assistente' and funcao <> 'Operador de Privado' and status = 'Ativo' order by nome asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nome_operador = $linha[1];

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

$operador_alterou = $linha[33];

$cel_operador_alterou = $linha[34];

$email_operador_alterou = $linha[35];

$estabelecimento_alterou = $linha[36];

$cidade_estabelecimento_alterou = $linha[37];

$tel_estabelecimento_alterou = $linha[38];

$email_estabelecimento_alterou = $linha[39];

$usuario_op = $linha[40];

$senha_op = $linha[41];

$tipo_op = $linha[42];

$funcao = $linha[43];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];



$salario = $linha[48];

$vale_alimentacao = $linha[49];

$gratificacao = $linha[50];

$comissao = $linha[51];

$emprestimo = $linha[52];

$admissao = $linha[53];

$demissao = $linha[54];

$meta = $linha[55];

$status = $linha[56];

$bloqueio_parcial = $linha[57];

$tempo_almoco = $linha[58];





?>

              <tr bgcolor="#ffffff">
                <td><div align="center" class="style7">Nome</div></td>
                <td><div align="center" class="style7">Celular</div></td>
                <td><div align="center" class="style7">E-mail</div></td>
                <td><div align="center" class="style7"></div></td>
                <td><div align="center" class="style7"></div></td>
              </tr>
              <tr>
                <td><div align="center"><span class="style7 style13"><? echo $nome_operador; ?></span></div></td>
                <td><div align="center"><span class="style7 style13"><? echo $celular; ?></span></div></td>
                <td><div align="center"><span class="style7 style13"><? echo $email; ?></span></div></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td><div align="center"></div></td>
                <td><div align="center"><span class="style7">RealizadoConsignado</span></div></td>
                <td><div align="center"><span class="style7">Quant Contratos Consignado</span></div></td>
                <td><div align="center"><span class="style7">Realizado Ve&iacute;culos</span></div></td>
                <td><div align="center"><span class="style7">Quant Contratos Ve&iacute;culos</span></div></td>
              </tr>
              <tr>
                <td width="22%"><div align="center" class="style7 style13"></div></td>
                <td width="16%"><div align="center" class="style14"><strong><strong>
                    <?
					
if($tipo_proposta=="Todos"){


$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta'";

}

else{

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta'";


}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_digitado = $linha['total'];

$valor_total_digitado_formatado = number_format($valor_total_digitado, 2, ",", ".");





echo "R$ ".$valor_total_digitado_formatado;

?>
                </strong></strong></div></td>
                <td width="19%"><div align="center" class="style14"><strong><strong>
                    <?
					
if($tipo_proposta=="Todos"){


$sql = "select * from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta'";

}

else{

$sql = "select * from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta'";


}

$resultado=mysql_query($sql);

$registros_total_consignado = mysql_num_rows($resultado);



echo $registros_total_consignado;

?>
                </strong></strong></div></td>
                <td width="21%"><div align="center"><strong><strong>
                  <?
				  
if($tipo_proposta=="Todos"){


$sql = "select sum(valor_financiar) as total from propostas_veiculos where operador_atendente = '$nome_operador' and dataproposta = '$dataproposta'";

}

else{

$sql = "select sum(valor_financiar) as total from propostas_veiculos where operador_atendente = '$nome_operador' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta'";


}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_digitado_veiculos = $linha['total'];

$valor_total_digitado_formatado_veiculos = number_format($valor_total_digitado_veiculos, 2, ",", ".");





echo "R$ ".$valor_total_digitado_formatado_veiculos;

?>
                </strong></strong></div></td>
                <td width="22%"><div align="center"><strong><strong>
                  <?
				  
if($tipo_proposta=="Todos"){


$sql = "select * from propostas_veiculos where operador_atendente = '$nome_operador' and dataproposta = '$dataproposta'";

}

else{

$sql = "select * from propostas_veiculos where operador_atendente = '$nome_operador' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta'";


}

$resultado=mysql_query($sql);

$registros_total_veiculos = mysql_num_rows($resultado);



echo $registros_total_veiculos;

?>
                </strong></strong></div></td>
              </tr>
              <tr>
                <td><div align="center"><strong>Total Monet&aacute;rio</strong></div></td>
                <td><div align="center"><? echo "R$ ".bcadd($valor_total_digitado,$valor_total_digitado_veiculos,2); ?></div></td>
                <td>&nbsp;</td>
                <td><div align="center"><strong>Total Contratos</strong></div></td>
                <td><div align="center"><? echo bcadd($registros_total_consignado,$registros_total_veiculos); ?></div></td>
              </tr>
              <tr>
                <td colspan="5"><div align="center">
                  <table width="100%"  border="0">
                      <tr bgcolor="#<? echo $cor ?>">
                        <td><div align="center" class="style3">N&ordm; Proposta </div></td>
                        <td><div align="center" class="style3">Valor Solicitado </div></td>
                        <td><div align="center" class="style3">Valor liq cliente </div></td>
                        <td><div align="center"><span class="style3">Valor Total </span></div></td>
                        <td><div align="center"><span class="style3">Tabela</span></div></td>
                        <td><div align="center" class="style3">Cliente</div></td>
                        <td><div align="center" class="style3">CPF</div></td>
                        <td width="2%"><div align="center" class="style3">Prazo</div></td>
                        <td width="5%"><div align="center" class="style3">R$ Parcelas </div></td>
                        <td><div align="center" class="style3">Tipo de Proposta </div></td>
                        <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>
                        <td><div align="center" class="style3">Status</div></td>
                        <td><div align="center" class="style3"> Spread </div></td>
                        <td><div align="center" class="style3">Premia&ccedil;&atilde;o</div></td>
                      </tr>
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
                        <td width="8%"><div align="center" class="style3"><? printf("$linha[51]");?></div></td>
                        <td width="4%"><div align="center" class="style3"><? printf("$linha[85]");?></div></td>
                        <td width="7%"><div align="center" class="style3"><? echo "R$ ".$comissao_op;?></div></td>
                        <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
                        <? } ?>
                      <tr>
                        <td><span class="style3"></span></td>
                        <td><span class="style3"></span></td>
                        <td><div align="center"><span class="style3"></span></div></td>
                        <td><div align="center"><span class="style3"></span></div></td>
                        <td><div align="center"><span class="style3"></span></div></td>
                        <td><span class="style3"></span></td>
                        <td><span class="style3"></span></td>
                        <td><span class="style3"></span></td>
                        <td><span class="style3"></span></td>
                        <td><span class="style3"></span></td>
                        <td><div align="center"><span class="style3"></span></div></td>
                        <td><span class="style3"></span></td>
                        <td><span class="style3"></span></td>
                        <td><span class="style3"></span></td>
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
                        <td><div align="right" class="style3">Total Speed </div></td>
                        <td><div align="center" class="style3"> <strong>
                            <?

if($tipo_proposta=="Todos"){

$sql = "select sum(retorno) as total from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta' order by nome asc";

}

else{

$sql = "select sum(retorno) as total from propostas where nome_operador = '$nome_operador' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>
                        </strong> </div></td>
                        <td><span class="style3"></span></td>
                      <tr>
                        <td colspan="14"><div align="center"><strong>VEICULOS</strong></div></td>
                      <tr bgcolor="#<? echo $cor ?>">
                        <td><div align="center"><span class="style3">N&ordm; Proposta </span></div></td>
                        <td colspan="2"><div align="center"><span class="style3">Cliente</span></div>                          <div align="center"></div></td>
                        <td colspan="2"><div align="center"><span class="style3">CPF</span></div>                          <div align="center"></div></td>
                        <td><div align="center"><span class="style3">Valor a Financiar</span></div></td>
                        <td><div align="center"><span class="style3">Prazo</span></div></td>
                        <td><div align="center"></div></td>
                        <td><div align="center"></div></td>
                        <td><div align="center"><span class="style3">R$ Parcelas </span></div></td>
                        <td colspan="2"><div align="center"><span class="style3">Status</span></div>                          <div align="center"></div></td>
                        <td><div align="center"></div></td>
                        <td><div align="center"><span class="style3">Premia&ccedil;&atilde;o</span></div></td>
                        <?

if($tipo_proposta=="Todos"){


$sql_3 = "SELECT * FROM propostas_veiculos where operador_atendente = '$nome_operador' and dataproposta = '$dataproposta' order by nome asc";

}

else{

$sql_3 = "SELECT * FROM propostas_veiculos where operador_atendente = '$nome_operador' and dataproposta = '$dataproposta' order by nome asc";


}

$res_3 = mysql_query($sql_3);

while($linha=mysql_fetch_row($res_3)) {



$num_proposta = $linha[0];

$dataproposta = $linha[1];

$horaproposta = $linha[2];

$mes_ano = $linha[3];

$estabelecimento_proposta = $linha[4];

$operador_atendente = $linha[5];

$status = $linha[6];

$tipo = $linha[7];

$tipo_proposta = $linha[8];

$nome = $linha[9];

$tipo_pessoa = $linha[10];

$data_nasc = $linha[11];

$cpf = $linha[12];

$rg = $linha[13];

$orgao = $linha[14];

$emissao = $linha[15];

$sexo = $linha[16];

$estadocivil = $linha[17];

$nacionalidade = $linha[18];

$quant_dependente = $linha[19];

$pai = $linha[20];

$mae = $linha[21];

$conjuge = $linha[22];

$data_nasc_conjuge = $linha[23];

$endereco = $linha[24];

$numero = $linha[25];

$bairro = $linha[26];

$complemento = $linha[27];

$cidade = $linha[28];

$estado = $linha[29];

$cep = $linha[30];

$correspondencia = $linha[31];

$tipo_residencia = $linha[32];

$valor_aluguel = $linha[33];

$tempo_residencia = $linha[34];

$telefone = $linha[35];

$celular = $linha[36];

$tipo_telefone = $linha[37];

$residencia_anterior = $linha[38];

$bairro_anterior = $linha[39];

$cidade_anterior = $linha[40];

$estado_anterior = $linha[41];

$tempo_residencia_anterior = $linha[42];

$email = $linha[43];

$empresa = $linha[44];

$porte_empresa = $linha[45];

$data_admissao = $linha[46];

$inicio_atividade = $linha[47];

$end_empresa = $linha[48];

$numero_empresa = $linha[49];

$complemento_empresa = $linha[50];

$bairro_empresa = $linha[51];

$cep_empresa = $linha[52];

$cidade_empresa = $linha[53];

$estado_empresa = $linha[54];

$telefone_empresa = $linha[55];

$cpt = $linha[56];

$serie = $linha[57];

$cargo = $linha[58];

$natureza_operacao = $linha[59];

$salario = $linha[60];

$atividade_principal = $linha[61];

$data_constituicao = $linha[62];

$cnpj = $linha[63];

$inscr_est = $linha[64];

$tel_contador = $linha[65];

$atividade_anterior = $linha[66];

$data_admissao_anterior = $linha[67];

$data_saida = $linha[68];

$cargo_anterior = $linha[69];

$telefone_empresa_anterior = $linha[70];

$outras_rendas = $linha[71];

$ref_pessoal = $linha[72];

$tel_ref_pessoal = $linha[73];

$ref_pessoal2 = $linha[74];

$tel_ref_pessoal2 = $linha[75];

$ref_comercial = $linha[76];

$tel_ref_comercial = $linha[77];

$ref_banco = $linha[78];

$ref_agencia = $linha[79];

$ref_conta = $linha[80];

$ref_tipo_conta = $linha[81];

$ref_conta_desde = $linha[82];

$cartao_credito = $linha[83];

$automovel = $linha[84];

$valor_automoveis = $linha[85];

$residencia = $linha[86];

$valor_residencia = $linha[87];

$outras_propriedades = $linha[88];

$valor_outras_propriedades = $linha[89];

$veiculo = $linha[90];

$ano_modelo = $linha[91];

$renavam = $linha[92];

$num_portas = $linha[93];

$combustivel = $linha[94];

$placa = $linha[95];

$valor_venda = $linha[96];

$valor_entrada = $linha[97];

$tarifa_cadastro = $linha[98];

$valor_financiar = $linha[99];

$coeficiente = $linha[100];

$codigo_tabela = $linha[101];

$num_parcelas = $linha[102];

$valor_parcelas = $linha[103];

$vencto_1_parcela = $linha[104];

$r = $linha[105];

$valor_liberado = $linha[106];

$pagto_serv_terc = $linha[107];

$obs = $linha[108];

$operador = $linha[109];

$cel_operador = $linha[110];

$email_operador = $linha[111];

$estab_pertence = $linha[112];

$cidade_estab_pertence = $linha[113];

$tel_estab_pertence = $linha[114];

$email_estab_pertence = $linha[115];

$operador_alterou = $linha[116];

$cel_operador_alterou = $linha[117];

$email_operador_alterou = $linha[118];

$estab_alterou = $linha[119];

$cidade_estab_alterou = $linha[120];

$tel_estab_alterou = $linha[121];

$email_estab_alterou = $linha[122];

$dataalteracao = $linha[123];

$horaalteracao = $linha[124];

$recebido = $linha[125];

$comissao_op = $linha[126];

$meses = $linha[127];

$trinta = $linha[128];

$quarenta_cinco = $linha[129];

$meses_residencia = $linha[130];

$ddd_tel = $linha[131];

$ddd_cel = $linha[132];

$ddd_tel_empresa = $linha[133];

$ddd_tel_contador = $linha[134];

$ddd_tel_empresa_anterior = $linha[135];

$ddd_ref_pessoal = $linha[136];

$ddd_ref_pessoal2 = $linha[137];

$ddd_ref_comercial = $linha[138];

$digito_agencia = $linha[139];

$digito_conta = $linha[140];

$ano_ref_conta = $linha[141];

$modelo = $linha[142];

$estado_emissao = $linha[143];

$mista = $linha[144];

$parecer_credito = $linha[145];

$bem = $linha[146];

$status_pagto_cliente = $linha[159];


?>
                      <tr>
                        <td><div align="center"><span class="style3"><? echo $num_proposta; ?></span></div></td>
                        <td colspan="2"><div align="center"><span class="style3"><? echo $nome;?></span></div></td>
                        <td colspan="2"><div align="center"><span class="style3"><? echo $cpf;?></span></div></td>
                        <td><div align="center"><span class="style3"><? echo $valor_financiar;?></span></div></td>
                        <td><div align="center"><span class="style3"><? echo $num_parcelas; ?></span></div></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><div align="center"><span class="style3"><? echo $valor_parcelas; ?></span></div></td>
                        <td colspan="2"><div align="center"><span class="style3"><? echo $status_pagto_cliente;?></span></div></td>
                        <td>&nbsp;</td>
                        <td><div align="center"><span class="style3"><? echo "R$ ".$comissao_op;?></span></div></td>
                                                        <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
          <? } ?>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><div align="right"><span class="style3">Total</span></div></td>
                        <td><div align="center"><span class="style3"><strong>
                          <?
						  
if($tipo_proposta=="Todos"){

$sql = "select sum(valor_financiar) as total from propostas_veiculos where operador_atendente = '$nome_operador' and dataproposta = '$dataproposta' order by nome asc";

}

else{

$sql = "select sum(valor_financiar) as total from propostas_veiculos where operador_atendente = '$nome_operador' and dataproposta = '$dataproposta' order by nome asc";


}


$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_financiar = $linha['total'];



echo "R$ ".$valor_total_financiar;

?>
                        </strong></span></div></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><div align="center"><span class="style3">Total</span></div></td>
                        <td><div align="center"><strong>
                          <?
						  
if($tipo_proposta=="Todos"){


$sql = "select sum(comissao_op) as total from propostas_veiculos where operador_atendente = '$nome_operador' and dataproposta = '$dataproposta' order by nome asc";

}

else{

$sql = "select sum(comissao_op) as total from propostas_veiculos where operador_atendente = '$nome_operador' and dataproposta = '$dataproposta' order by nome asc";


}


$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_premiacao = $linha['total'];



echo "R$ ".$valor_total_premiacao;

?>
                        </strong></div></td>
                      <tr>

                        <td colspan="14"><div align="center"></div></td>
                  </table>
                  <br>
                </div></td>
              </tr>
              <? } ?>
            </table>
          </div></td>
        </tr>
      </table>
      <p></p>
      <p>
<table width="100%" border="0">
        <tr>
          <td width="100%" colspan="3"><div align="center">PARCEIROS (correspondentes)</div>
              <div align="center"></div></td>
        </tr>
        <tr>
          <td colspan="3" valign="top"><div align="center">
          
              <table width="100%"  border="1">
                <?
$sql = "SELECT * FROM correspondentes order by nome asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nome_correspondente = $linha[1];

$celular = $linha[19];

$email = $linha[20];

$meta = $linha[55];





?>

                <tr bgcolor="#ffffff">
                  <td><div align="center" class="style7">Nome</div></td>
                  <td><div align="center" class="style7">Celular</div></td>
                  <td><div align="center" class="style7">E-mail</div></td>
                </tr>
                <tr>
                  <td><div align="center"><span class="style7 style13"><? echo $nome_correspondente; ?></span></div></td>
                  <td><div align="center"><span class="style7 style13"><? echo $celular; ?></span></div></td>
                  <td><div align="center"><span class="style7 style13"><? echo $email; ?></span></div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><div align="center"><span class="style7">Realizado</span></div></td>
                  <td><div align="center"><span class="style7">Quant Contratos </span></div></td>
                </tr>
                <tr>
                  <td width="13%"><div align="center" class="style7 style13"></div></td>
                  <td width="6%"><div align="center" class="style14"><strong><strong>
                      <?
					  
if($tipo_proposta=="Todos"){


$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta'";

}

else{

$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta'";


}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_digitado = $linha['total'];

$valor_total_digitado_formatado = number_format($valor_total_digitado, 2, ",", ".");





echo "R$ ".$valor_total_digitado_formatado;

?>
                  </strong></strong></div></td>
                  <td width="3%"><div align="center" class="style14"><strong><strong>
                      <?
					  
if($tipo_proposta=="Todos"){


$sql = "select * from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta'";

}

else{

$sql = "select * from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta'";


}

$resultado=mysql_query($sql);

$registros_total = mysql_num_rows($resultado);



echo $registros_total;

?>
                  </strong></strong></div></td>
                </tr>
                <tr>
                  <td colspan="3"><div align="center">
                      <table width="100%"  border="0">
                        <tr bgcolor="#<? echo $cor ?>">
                          <td><div align="center" class="style3">N&ordm; Proposta </div></td>
                          <td><div align="center" class="style3">Valor Solicitado </div></td>
                          <td><div align="center" class="style3">Valor liq cliente </div></td>
                          <td><div align="center"><span class="style3">Valor Total </span></div></td>
                          <td><div align="center"><span class="style3">Tabela</span></div></td>
                          <td><div align="center" class="style3">Cliente</div></td>
                          <td><div align="center" class="style3">CPF</div></td>
                          <td width="2%"><div align="center" class="style3">Prazo</div></td>
                          <td width="5%"><div align="center" class="style3">R$ Parcelas </div></td>
                          <td><div align="center" class="style3">Tipo de Proposta </div></td>
                          <td><div align="center" class="style3">Bco Opera&ccedil;&atilde;o </div></td>
                          <td><div align="center" class="style3">Status</div></td>
                          <td><div align="center" class="style3"> Spread </div></td>
                          <td><div align="center" class="style3">Premia&ccedil;&atilde;o</div></td>
                        </tr>
                        <?
						
if($tipo_proposta=="Todos"){

$sql_2 = "SELECT * FROM propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta' order by nome asc";

}

else{

$sql_2 = "SELECT * FROM propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta' order by nome asc";


}

$res_2 = mysql_query($sql_2);

while($linha=mysql_fetch_row($res_2)) {



$comissao_op = $linha[101];

$tabela = $linha[109];

$valor_total = $linha[113];

$valor_liquido_cliente = $linha[115];



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
                          <td width="8%"><div align="center" class="style3"><? printf("$linha[51]");?></div></td>
                          <td width="4%"><div align="center" class="style3"><? printf("$linha[85]");?></div></td>
                          <td width="7%"><div align="center" class="style3"><? echo "R$ ".$comissao_op;?></div></td>
                          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
                          <? } ?>
                        <tr>
                          <td><span class="style3"></span></td>
                          <td><span class="style3"></span></td>
                          <td><div align="center"><span class="style3"></span></div></td>
                          <td><div align="center"><span class="style3"></span></div></td>
                          <td><div align="center"><span class="style3"></span></div></td>
                          <td><span class="style3"></span></td>
                          <td><span class="style3"></span></td>
                          <td><span class="style3"></span></td>
                          <td><span class="style3"></span></td>
                          <td><span class="style3"></span></td>
                          <td><div align="center"><span class="style3"></span></div></td>
                          <td><span class="style3"></span></td>
                          <td><span class="style3"></span></td>
                          <td><span class="style3"></span></td>
                        <tr>
                          <td><span class="style3">Total</span></td>
                          <td><div align="center" class="style3"> <strong>
                              <?

if($tipo_proposta=="Todos"){

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta' order by nome asc";

}

else{

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta' order by nome asc";

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

$sql = "select sum(valor_liquido_cliente) as total from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta'order by nome asc";

}

else{

$sql = "select sum(valor_liquido_cliente) as total from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta' order by nome asc";

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

$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta' order by nome asc";

}

else{

$sql = "select sum(valor_total) as total from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta' order by nome asc";

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
                          <td><div align="right" class="style3">Total Speed </div></td>
                          <td><div align="center" class="style3"> <strong>
                              <?

if($tipo_proposta=="Todos"){

$sql = "select sum(retorno) as total from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta' order by nome asc";

}

else{

$sql = "select sum(retorno) as total from propostas where nome_operador = '$nome_correspondente' and dataproposta = '$dataproposta' and tipo_proposta = '$tipo_proposta' order by nome asc";

}

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total = $linha['total'];



echo "R$ ".$valor_total;

?>
                          </strong> </div></td>
                          <td><span class="style3"></span></td>
                    </table>
                    <br>
                  </div></td>
                </tr>
                <? } ?>
              </table>
          </div></td>
        </tr>
      </table>
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

