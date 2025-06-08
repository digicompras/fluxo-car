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

<title>LISTANDO TODOS OS PEDIDOS DE POSSIBILIDADES DO PERIODO</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style3 {font-size: 10px}
.style2 {
	color: #0000FF;

	font-weight: bold;
}
.style5 {font-size: 18px}
.style5 {font-size: 24px}
.style1 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}

.style10 {font-size: 16px;
	font-weight: bold;
	color: #FF0000;
}

.style11 {font-size: 16px;
	font-weight: bold;
	color: #0000FF;
}
.style111 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}

-->

</style>
</head>

<?



require '../../conect/conect.php';

$codigolancamento = $_POST['codigolancamento'];

$solicitacao = $_POST['solicitacao'];

//$setor = $_POST['setor'];


$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

  <?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_operador = $linha[1];

$setor = $linha[43];

$estab_pertence = $linha[44];

$ultimo_departamento_trabalhado = $linha[66];

}
?>


<?

if($solicitacao=="gravar_parcela"){

$pedido = $_POST['codigolancamento'];
$cod_cli_gravar = $_POST['cod_cli'];
$nome_gravar = $_POST['nome'];
$cpf_gravar = $_POST['cpf'];
$operador_gravar = $_POST['operador'];
$date = date('Y-m-d');
$hora = date('H:i:s');
$valor_parcela = $_POST['valor_parcela'];
$banco_a_ser_portado = $_POST['banco_a_ser_portado'];
$valor_liberado = $_POST['valor_liberado'];
$parcelas_em_aberto = $_POST['parcelas_em_aberto'];
$prazo_do_contrato = $_POST['prazo_do_contrato'];
$status = $_POST['status'];
$faixa_rco = $_POST['faixa_rco'];




$comando = "insert into parcelas_pedido_margem(pedido,cod_cli,nome,cpf,operador,date,hora,valor_parcela,banco_a_ser_portado,valor_liberado,parcelas_em_aberto,prazo_do_contrato,status,faixa_rco) values('$pedido','$cod_cli_gravar','$nome_gravar','$cpf_gravar','$operador_gravar','$date','$hora','$valor_parcela','$banco_a_ser_portado','$valor_liberado','$parcelas_em_aberto','$prazo_do_contrato','$status','$faixa_rco')";



mysql_query($comando,$conexao) or die("Erro ao gravar parcelas para esse pedido!");




}


?>



<?

if($solicitacao=="altera_parcela"){

$pedido = $_POST['pedido'];
$valor_parcela = $_POST['valor_parcela'];
$banco_a_ser_portado = $_POST['banco_a_ser_portado'];
$valor_liberado = $_POST['valor_liberado'];
$parcelas_em_aberto = $_POST['parcelas_em_aberto'];
$prazo_do_contrato = $_POST['prazo_do_contrato'];
$faixa_rco = $_POST['faixa_rco'];




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`parcelas_pedido_margem` set `valor_parcela` = '$valor_parcela',`banco_a_ser_portado` = '$banco_a_ser_portado',`valor_liberado` = '$valor_liberado',`parcelas_em_aberto` = '$parcelas_em_aberto',`prazo_do_contrato` = '$prazo_do_contrato',`faixa_rco` = '$faixa_rco' where `parcelas_pedido_margem`. `codigo` = '$pedido'";
}

mysql_query($comando,$conexao);




}


?>



<body bgcolor="#ffffff" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>

<?

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];


}


?>









<p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>

      <form action="../index.php" method="post" name="form1" target="_top">
        <input type="submit" name="Submit" value="Voltar ao menu principal">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        </span>
      </form>
      <p>
      <?
//----------------------INICIO DA GRAVACAO E ENVIO PARA O OPERADOR--------------------

if($solicitacao=="gravar_troca_de_mesa"){
	
$codigo_orcamento = $_POST['codigo_orcamento'];

	
$mesa_anterior = $_POST['mesa_anterior'];
$mesa2_anterior = $_POST['mesa2_anterior'];
	
	
//----------------LIBERANDO MESAS------------------------

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`mesas` set `statusmesa` = 'LIVRE',`situacao` = '',`codigo_orcamento` = '' where `mesas`. `codigo_orcamento` = '$codigo_orcamento'";
}

mysql_query($comando,$conexao);





//-------------FIM DA LIBERAÇÃO DE MESAS-----------------

	
	
	
	
	

$mesa = $_POST['mesa'];
$mesa2 = $_POST['mesa2'];
$obs = $_POST['obs'];


if(empty($mesa)){
	
}
else{
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `mesa` = '$mesa',`mesa2` = '$mesa2',`obs` = '$obs' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`mesas` set `statusmesa` = 'OCUPADA',`situacao` = 'PRINCIPAL',`codigo_orcamento` = '$codigo_orcamento' where `mesas`. `mesa` = '$mesa'";
}

mysql_query($comando,$conexao);

}





if(empty($mesa2)){
	
}
else{

$sql = "SELECT * FROM mesas where mesa = '$mesa2'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$mesa = $linha[1];

}

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`mesas` set `statusmesa` = 'OCUPADA',`situacao` = 'ADJUNTA',`codigo_orcamento` = '$codigo_orcamento' where `mesas`. `mesa` = '$mesa2'";
}

mysql_query($comando,$conexao);


}


}






//---------------------FIM DA GRAVACAO E ENVIO PARA O OPERADOR------------------------
?>      
      <br>
  <?
//----------------------INICIO DA GRAVACAO E ENVIO PARA O OPERADOR--------------------

if($solicitacao=="gravar_atribuicao"){

$codigo_orcamento = $_POST['codigo_orcamento'];
$mesa = $_POST['mesa'];
$mesa2 = $_POST['mesa2'];
$obs = $_POST['obs'];


if(empty($mesa)){
	
}
else{
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`orcamentos` set `mesa` = '$mesa',`mesa2` = '$mesa2',`obs` = '$obs' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' limit 1 ";
}

mysql_query($comando,$conexao);




$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`mesas` set `statusmesa` = 'OCUPADA',`situacao` = 'PRINCIPAL',`codigo_orcamento` = '$codigo_orcamento' where `mesas`. `mesa` = '$mesa'";
}

mysql_query($comando,$conexao);

}





if(empty($mesa2)){
	
}
else{

$sql = "SELECT * FROM mesas where mesa = '$mesa2'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$mesa = $linha[1];

}

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`mesas` set `statusmesa` = 'OCUPADA',`situacao` = 'ADJUNTA',`codigo_orcamento` = '$codigo_orcamento' where `mesas`. `mesa` = '$mesa2'";
}

mysql_query($comando,$conexao);


}


}






//---------------------FIM DA GRAVACAO E ENVIO PARA O OPERADOR------------------------
?>
        <br>
        
        <?

//$nome_operador = $_POST['nome_operador'];

//$data_inicial = $_POST['data_inicial'];

//$data_final = $_POST['data_final'];




$sql = "SELECT * FROM orcamentos where condicao = 'PEDIDO' and status = 'Aberto' and status_conta = 'Finalizado'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

}
?><br>
        
        <?

$sql = "SELECT * FROM cad_empresa limit 1";

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
      <table width="100%"  border="0" align="center">
        <tr>
          <td colspan="5"><div align="center"><span class="style2">
          
            Contas fechadas aguardando pagto da empresa:</span> <span class="style2"><? echo $nfantasia; ?>
              
            </span></div></td>
        </tr>
        <tr>
          <td width="20%"><div align="center">Total de Clientes Com conta Finalizada</div></td>
          <td width="26%"><strong><? echo " $registros";?></strong></td>
          <td width="14%"><? echo " $solicitacao";?></td>
          <td width="18%">&nbsp;</td>
          <td width="22%">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="5"><div align="center"></div>            <div align="center"></div>            <div align="center"></div></td>
        </tr>
      </table>
<table width="100%" border="0">
  <tr>
    <td colspan="5"><div align="center">
      <form name="form1" method="post" action="margem_a_verificar.php">
        <input name="solicitacao" type="hidden" id="solicitacao" value="incluir_parcela">
        <input name="codigolancamento" type="hidden" id="codigolancamento" value="<? echo $codigolancamento; ?>">
      </form>
    </div></td>
  </tr>
</table>

  <p>&nbsp;  </p>
  <table width="100%" border="0">
    <tr>
      <td><div align="center">
        <table width="100%" border="0">
          <tr>
            <td><div align="center">Comanda</div></td>
            <td colspan="2"><div align="center">
              <form name="form3" method="post" action="fila_contas_fechadas_para_recebimento.php">
                <div align="left">
                  <input type="text" name="nome" id="nome">
                  <input name="condicao" type="hidden" id="condicao" value="PEDIDO">
<input type="submit" name="button2" id="button2" value="Buscar">
                </div>
              </form>
            </div>              </td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center" class="style5"><strong>Frente de Caixa</strong></div></td>
          </tr>
          <tr>
            <td width="14%"><div align="center"></div></td>
            <td width="10%"><div align="center"></div></td>
            <td width="21%"><div align="center"></div></td>
            <td width="23%"><div align="center"></div></td>
            <td width="10%"><div align="center"></div></td>
            <td width="22%"><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center">N&ordm; Cupon(Fatura)</div></td>
            <td><div align="center">Quantidade</div></td>
            <td><div align="center">Codigo Produto</div></td>
            <td><div align="center">Produto</div></td>
            <td><div align="center">Pre&ccedil;o Unitario</div></td>
            <td><div align="center">Total</div></td>
          </tr>
          <?
$nome = $_POST['nome'];
$condicao = $_POST['condicao'];
$status_fatura = "FATURADO";
$data_abertura_fatura = date('Y-m-d');


$data = $data_abertura_fatura;

$data2 = explode("-", $data);


$dia = $data2[2];

$mes = $data2[1];

$ano = $data2[0];

$hora_abertura_fatura = date('H:i:s');


$datafechamento = date('Y-m-d');

$hora_fechamento_fatura = date('H:i:s');


		  
$sql = "SELECT * FROM orcamentos where nome = '$nome' and status = 'Aberto' order by codigo_orcamento desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	

$codigo_orcamento_a_receber = $linha[0];
$codigo_cliente = $linha[25];

}


$sql = "SELECT * FROM faturamento_futuro where status_fatura = 'Aberto' and departamento = '$ultimo_departamento_trabalhado' order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros_fatura = mysql_num_rows($res);
	
	

}


if($registros_fatura>=1){

$sql = "SELECT * FROM faturamento_futuro order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	
$num_fatura = $linha[0];
$datefaturamento = $linha[1];
$dia_fatura = $linha[2];
$mes_fatura = $linha[3];
$ano_fatura = $linha[4];

$horafaturamento = $linha[5];

$loja = $linha[8];
$operador = $linha[9];

}
}
else{
	
$comando = "insert into faturamento_futuro(datefaturamento,dia,mes,ano,hora,loja,operador,setor,departamento)

values('$data_abertura_fatura','$dia','$mes','$ano','$hora_abertura_fatura','$estab_pertence','$nome_operador','$setor','$ultimo_departamento_trabalhado')";
 
mysql_query($comando,$conexao);



	
$sql = "SELECT * FROM faturamento_futuro order by num_fatura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
	
$num_fatura = $linha[0];
$datefaturamento = $linha[1];
$dia_fatura = $linha[2];
$mes_fatura = $linha[3];
$ano_fatura = $linha[4];

$horafaturamento = $linha[5];

$loja = $linha[8];
$operador = $linha[9];

}

	
}

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`orcamentos` set `preparar_caixa_receber` = 'Sim',`status_fatura` = '$status_fatura',`num_fatura` = '$num_fatura',`data_fatura` = '$datefaturamento',`dia_fatura` = '$dia_fatura',`mes_fatura` = '$mes_fatura',`ano_fatura` = '$ano_fatura',`departamento` = '$ultimo_departamento_trabalhado' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento_a_receber' limit 1 ";
}

mysql_query($comando,$conexao);




$sql = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento_a_receber'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];



$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`produtos_em_orcamento` set `preparar_caixa_receber` = 'Sim',`status_fatura` = '$status_fatura',`num_fatura` = '$num_fatura',`data_fatura` = '$datefaturamento',`dia_fatura` = '$dia_fatura',`mes_fatura` = '$mes_fatura',`ano_fatura` = '$ano_fatura',`departamento` = '$ultimo_departamento_trabalhado' where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento_a_receber' and codigo = '$codigolancamento'";
}

mysql_query($comando,$conexao);

}
?>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td colspan="3" rowspan="3">
            <div align="center">
<?
            
$sql = "SELECT * FROM produtos_em_orcamento where num_fatura = '$num_fatura'";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];
$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco = $linha[22];


$acrescimo = $linha[23];
$acrescimodecimal = $linha[24];
$acrescimomonetario = $linha[25];
$total = $linha[29];

$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];
$descontoetapa4 = $linha[83];


$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];
$descontomonetarioetapa4 = $linha[85];

}
            
?>          
            </div>
              </td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
          <tr>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
            <td><div align="center"></div></td>
          </tr>
        </table>
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  
    <?
  
$sql = "SELECT * FROM orcamentos where condicao = 'PEDIDO' and status = 'Aberto' and status_conta = 'Finalizado' order by dataabertura,horaabertura asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$codigolancamento = $linha[0];

$dataabertura = $linha[1];

$horaabertura = $linha[2];

$total_geral = $linha[7];

$codigo_cliente = $linha[25];

$nome = $linha[27];





?>
  
<table width="100%"  border="0">

        <tr bgcolor="#ffffff">

          <td><div align="center" class="style3"><strong>N&ordm; Pedido</strong></div></td>
          <td><div align="center" class="style3"><strong>Nome</strong></div></td>
          <td><div align="center" class="style3">Total Conta</div></td>
          <td><div align="center" class="style3"><strong>Data</strong></div></td>
          <td><div align="center" class="style3"><strong>Hora</strong></div>            </td>
  </tr>

		

        <tr>

          <td width="15%">               <form name="form2" method="post" action="../orcamentos/orcamento.php">
            <div align="center" class="style3">

            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
            <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigolancamento; ?>">
            <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
            <input type="submit" name="button" id="button" value="<? echo $codigolancamento; ?>">
            </div>
          </form></td>
          <td width="37%"><div align="center"><span class="style3"><? echo $nome;?></span></div></td>
          <td width="19%"><div align="center"><span class="style3"><? echo "R$ $total_geral"; ?></span></div></td>
          <td width="13%"><div align="center"><span class="style3"><? echo $dataabertura;?></span></div></td>
          <td width="16%">

          <div align="center" class="style3"><? echo $horaabertura;?></div></td>

          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>





<? } ?>
        </table>
<p align="center"><span class="style5"><strong><? echo $site; ?></strong></span> <br>
  <? echo $endereco; ?> , <? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?> <br>
  <? echo "Telefone / Fax: ". $telefone." "; ?> / <? echo $fax; ?> <br>
  <? echo "E-Mail: ". $email_empresa; ?></p>
</body>

</html>

