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



//$nome_operador2 = $_POST['nome_operador2'];


$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];



$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];



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
  

$sql = "select sum(valor_credito) as total from propostas where dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final'";

}

else{

$sql = "select sum(valor_credito) as total from propostas where dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final' and tipo_proposta = '$tipo_proposta'";


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


$sql = "select sum(valor_total) as total_bruto from propostas where dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final'";


}

else{

$sql = "select sum(valor_total) as total_bruto from propostas where dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final' and tipo_proposta = '$tipo_proposta'";

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


$sql = "select * from propostas where dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final'";

}

else{

$sql = "select * from propostas where dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final' and tipo_proposta = '$tipo_proposta'";

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


$sql = "select sum(valor_credito) as total from propostas where dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final'";

}

else{

$sql = "select sum(valor_credito) as total from propostas where dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final' and tipo_proposta = '$tipo_proposta'";


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

$celular = $linha[19];

$email = $linha[20];

$meta = $linha[55];





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
                <td>&nbsp;</td>
                <td><div align="center"><span class="style7">RealizadoConsignado</span></div></td>
                <td><div align="center"><span class="style7">Quant Contratos Consignado</span></div></td>
                <td><div align="center"><span class="style7">Realizado Ve&iacute;culos</span></div></td>
                <td><div align="center"><span class="style7">Quant Contratos Ve&iacute;culos</span></div></td>
              </tr>
              <tr>
                <td width="22%"><div align="center" class="style7 style13"></div></td>
                <td width="16%"><div align="center" class="style14"><strong><strong>
                    <?

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_operador' and dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_digitado = $linha['total'];

$valor_total_digitado_formatado = number_format($valor_total_digitado, 2, ",", ".");





echo "R$ ".$valor_total_digitado_formatado;

?>
                </strong></strong></div></td>
                <td width="19%"><div align="center" class="style14"><strong><strong>
                    <?

$sql = "select * from propostas where nome_operador = '$nome_operador' and dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final'";

$resultado=mysql_query($sql);

$registros_total_consignado = mysql_num_rows($resultado);



echo $registros_total_consignado;

?>
                </strong></strong></div></td>
                <td width="21%"><div align="center"><strong><strong>
                  <?

$sql = "select sum(valor_financiar) as total from propostas_veiculos where operador_atendente = '$nome_operador' and dia_proposta between '$dia_inicial'and '$dia_final' and mes_proposta between '$mes_inicial'and '$mes_final' and ano_proposta between '$ano_inicial'and '$ano_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_digitado_veiculos = $linha['total'];

$valor_total_digitado_formatado_veiculos = number_format($valor_total_digitado_veiculos, 2, ",", ".");





echo "R$ ".$valor_total_digitado_formatado_veiculos;

?>
                </strong></strong></div></td>
                <td width="22%"><div align="center"><strong><strong>
                  <?

$sql = "select * from propostas_veiculos where operador_atendente = '$nome_operador' and dia_proposta between '$dia_inicial'and '$dia_final' and mes_proposta between '$mes_inicial'and '$mes_final' and ano_proposta between '$ano_inicial'and '$ano_final'";

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
                <td colspan="5"><div align="center"><br>
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

$sql = "select sum(valor_credito) as total from propostas where nome_operador = '$nome_correspondente' and dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_digitado = $linha['total'];

$valor_total_digitado_formatado = number_format($valor_total_digitado, 2, ",", ".");





echo "R$ ".$valor_total_digitado_formatado;

?>
                  </strong></strong></div></td>
                  <td width="3%"><div align="center" class="style14"><strong><strong>
                      <?

$sql = "select * from propostas where nome_operador = '$nome_correspondente' and dia between '$dia_inicial'and '$dia_final' and mes between '$mes_inicial'and '$mes_final' and ano between '$ano_inicial'and '$ano_final'";

$resultado=mysql_query($sql);

$registros_total = mysql_num_rows($resultado);



echo $registros_total;

?>
                  </strong></strong></div></td>
                </tr>
                <tr>
                  <td colspan="3"><div align="center"><br>
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

