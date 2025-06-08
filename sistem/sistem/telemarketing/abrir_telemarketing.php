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

<title>ABERTURA DE CHAMADO NO TELEMARKETING</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style2 {font-weight: bold}

-->

</style>

</head>

<?



require '../../conect/conect.php';



			

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>
<?
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}
?>





<body bgcolor="#ffffff"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?>

<?

$cpf = $_POST['cpf'];

$dia_abertura = date('d');

$mes_abertura = date('m');

$ano_abertura = date('Y');

$hora_abertura = $hora_atual;
$hora_manutencao = $hora_atual;
$status = "Em Manutenção";

$data_manutencao = "$ano_abertura-$mes_abertura-$dia_abertura";



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador = $linha[1];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];



}

?>

<?

$sql = "SELECT * FROM clientes where cpf = '$cpf' limit 1";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {



$cod_cliente = $linha[0];

$nome = $linha[1];

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

$obs = $linha[28];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$dataalteracao = $linha[31];

$horaalteracao = $linha[32];

$tipo = $linha[40];

$banco = $linha[41];

$agencia = $linha[42];

$conta = $linha[43];

$num_beneficio = $linha[44];



$parc1 = $linha[45];

$banco1 = $linha[46];

$vencto1 = $linha[47];

$compra1 = $linha[48];



$parc2 = $linha[49];

$banco2 = $linha[50];

$vencto2 = $linha[51];

$compra2 = $linha[52];



$parc3 = $linha[53];

$banco3 = $linha[54];

$vencto3 = $linha[55];

$compra3 = $linha[56];



$parc4 = $linha[57];

$banco4 = $linha[58];

$vencto4 = $linha[59];

$compra4 = $linha[60];



$parc5 = $linha[61];

$banco5 = $linha[62];

$vencto5 = $linha[63];

$compra5 = $linha[64];



$parc6 = $linha[65];

$banco6 = $linha[66];

$vencto6 = $linha[67];

$compra6 = $linha[68];



$parc7 = $linha[69];

$banco7 = $linha[70];

$vencto7 = $linha[71];

$compra7 = $linha[72];



$num_beneficio2 = $linha[73];

$num_beneficio3 = $linha[74];

$num_beneficio4 = $linha[75];



$dataprev2 = $linha[76];

$dataprev = $linha[76];



//$obs2 = $linha[77];



$tipo_benef_1 = $linha[78];

$tipo_benef_2 = $linha[79];

$tipo_benef_3 = $linha[80];

$tipo_benef_4 = $linha[81];



$mes_nasc = $linha[82];



$cpf_rg = $linha[83];

$comp_end = $linha[84];

$comp_quit1 = $linha[85];

$comp_quit2 = $linha[86];

$comp_quit3 = $linha[87];

$comp_quit4 = $linha[88];

$comp_quit5 = $linha[89];

$comp_quit6 = $linha[90];

$comp_renda = $linha[91];

$cpf_rg_testemunha = $linha[92];

$salario1 = $linha[93];

$salario2 = $linha[94];

$salario3 = $linha[95];

$salario4 = $linha[96];

$quant_vezes_trabalhado = $linha[118];

}

?>



<?



$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$quant_vezes_trabalhado2 = bcadd($quant_vezes_trabalhado,1);


$comando = "update `$linha[1]`.`clientes` set `codigo` = '$cod_cliente',`telemarketing` = 'Em Manutenção',`quant_vezes_trabalhado` = 'quant_vezes_trabalhado2',`operador_manutencao` = '$operador',`data_manutencao` = '$data_manutencao',`cidade_estab_pertence_manutencao` = '$cidade_estab_pertence',`dia_liberado` = '',`mes_liberado` = '',`ano_liberado` = '',`hora_liberado` = '' where `clientes`. `codigo` = '$cod_cliente' limit 1 ";

}



mysql_query($comando,$conexao);



?>



<?

$sql = "SELECT * FROM telemarketing where cod_cliente = '$cod_cliente' and status = 'Em Manutenção' order by codigo desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$quantidade = mysql_num_rows($res);

}

if($quantidade==0){

$comando = "insert into telemarketing(data_abertura,data_manutencao,hora_manutencao,dia_abertura,mes_abertura,ano_abertura,hora_abertura,status,operador,estab_pertence,cidade_estab_pertence,cod_cliente,cpf,nome,telefone,celular) 

values('$data_manutencao','$data_manutencao','$hora_manutencao','$dia_abertura','$mes_abertura','$ano_abertura','$hora_abertura','$status','$operador','$estab_pertence','$cidade_estab_pertence','$cod_cliente','$cpf','$nome','$telefone','$celular')";



mysql_query($comando,$conexao);

}



?>



<?

$sql = "SELECT * FROM telemarketing where cod_cliente = '$cod_cliente' order by codigo desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registro++;



$codigo_telemarketing = $linha[0];

$dia_abertura = $linha[1];

$mes_abertura = $linha[2];

$ano_abertura = $linha[3];

$hora_abertura = $linha[4];



$status = $linha[6];

$operador = $linha[7];

$estab_pertence = $linha[8];

$cidade_estab_pertence = $linha[9];



$dia_ligar = $linha[15];

$mes_ligar = $linha[16];

$ano_ligar = $linha[17];

$hora_ligar = $linha[18];

$proposta = $linha[24];

$data_ligar = $linha[29];

$data_abertura = $linha[28];
$data_ligar = $linha[29];
$data_manutencao = $linha[30];
$hora_manutencao = $linha[31];


}

?>



<p align="center"><strong><font color="#0000FF" size="4">Registro de Telemarketing </font><font color="#0000FF"><? echo $codigo_telemarketing; ?></font></strong></p>

<form name="form1" method="post" action="grava_contato_telemarketing.php">



<table width="100%" border="0" cellspacing="4">

    <tr> 

      <td><input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo_telemarketing; ?>"></td>

      <td>&nbsp;</td>

      <td>N&ordm; de Matr&iacute;cula </td>

      <td><strong><font color="#0000FF"><? echo $cod_cliente; ?></font>

          <input name="cod_cliente" type="hidden" id="cod_cliente" value="<? echo $cod_cliente; ?>">

      </strong></td>
    </tr>

    <tr> 

      <td>Nome</td>

      <td><? echo $nome; ?>

        <input name="nome" type="hidden" id="nome2" value="<? echo $nome; ?>"></td><td>Tipo</td>

      <td><strong>

      <? echo $tipo; ?></strong>        </td>
    </tr>

    <tr> 

      <td width="22%">Data Nasc </td>

      <td width="24%"><? echo $data_nasc; ?>

        m&ecirc;s do anivers&aacute;rio

      <? echo $mes_nasc; ?></td>

      <td width="16%">Sexo</td>

      <td width="38%"><? echo $sexo; ?><font color="#0000FF">&nbsp; </font></td>
    </tr>

    <tr> 

      <td>Estado Civil </td>

      <td><? echo $estadocivil; ?></td>

      <td>CPF</td>

      <td><? echo $cpf; ?> <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">      </td>
    </tr>

    <tr>

      <td>RG</td>

      <td><? echo $rg; ?> 

        &Oacute;rg&atilde;o 

      <? echo $orgao; ?></td>

      <td>Emiss&atilde;o</td>

      <td><? echo $emissao; ?>      </td>
    </tr>

    <tr> 

      <td>Telefone</td>

      <td><? echo $telefone; ?></td>

      <td>Celular</td>

      <td><? echo $celular; ?> </td>
    </tr>

    <tr>

      <td>N&ordm; Benef&iacute;cio </td>

      <td colspan="3"><? echo $num_beneficio; ?> 

      Tipo 

        <? echo $tipo_benef_1; ?>        Salario 

      <? echo $salario_1; ?></td>
    </tr>

    <tr>

      <td>N&ordm; Benef&iacute;cio2</td>

      <td colspan="3"><? echo $num_beneficio2; ?>

Tipo

  <? echo $tipo_benef_2; ?>  Salario 

  <? echo $salario2; ?></td>
    </tr>

    <tr>

      <td>N&ordm; Benef&iacute;cio 3 </td>

      <td colspan="3"><? echo $num_benefico3; ?> 

      Tipo 

        <? echo $tipo_benef_3; ?>        Salario 

      <? echo $salario3; ?></td>
    </tr>

    <tr>

      <td>N&ordm; Benef&iacute;cio 4</td>

      <td colspan="3"><? echo $num_beneficio4; ?>

Tipo

  <? echo $tipo_benef_4; ?>  Salario 

  <? echo $salario4; ?></td>
    </tr>

    <tr>

      <td colspan="4">Operador <? echo $operador; ?> - Ag&ecirc;ncia <? echo $estab_pertence; ?> - Cidade <? echo $cidade_estab_pertence; ?></td>
    </tr>

    <tr>

      <td colspan="4"><div align="center">

        <?

$hoje = date('d/m/Y')+1;



$dias_atraso = ($hoje-$vencto)*-1;

 ?>

      </div></td>
    </tr>

    <tr>

      <td>Abertura de chamada </td>

      <td colspan="2"><? echo "$dia_abertura"."/"."$mes_abertura"."/"."$ano_abertura "." as $hora_abertura"; ?></td>

      <td>&nbsp;</td>
    </tr>

    <tr>
      <td>Manuten&ccedil;&atilde;o sendo efetuada em</td>
      <td colspan="2"><?  echo "$data_manutencao as $hora_manutencao"; ?>
          <input name="data_manutencao" type="hidden" id="data_manutencao" value="<? echo $data_manutencao;  ?>">
          <input name="hora_manutencao" type="hidden" id="hora_manutencao" value="<? echo $hora_manutencao;  ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td>Pr&oacute;xima Liga&ccedil;&atilde;o 

      <strong>      </strong></td>

      <td colspan="2">      <strong><font color="#0000FF">

</font>      <font color="#0000FF">

Dia

        <select name="dia_ligar" id="dia_ligar">

          <option selected><? echo $dia_ligar; ?></option>

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

<select name="mes_ligar" id="select">

  <option selected><? echo $mes_ligar; ?></option>

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

- ano

<select name="ano_ligar" id="select2">

  <option selected><? $ano_ligar; ?></option>

  <option><? $ano_atual = date('Y'); echo $ano_atual; ?></option>

  <option><? $proximo_ano = bcadd($ano_atual,1); echo "$proximo_ano"; ?></option>
</select> 

- Hora 



<select name="hora_ligar" id="select3">

  <option selected><? echo $hora_ligar; ?></option>

  <option>08:00:00</option>

  <option>08:30:00</option>

  <option>09:00:00</option>

  <option>09:30:00</option>

  <option>10:00:00</option>

  <option>10:30:00</option>

  <option>11:00:00</option>

  <option>11:30:00</option>

  <option>12:00:00</option>

  <option>12:30:00</option>

  <option>13:00:00</option>

  <option>13:30:00</option>

  <option>14:00:00</option>

  <option>14:30:00</option>

  <option>15:00:00</option>

  <option>15:30:00</option>

  <option>16:00:00</option>

  <option>16:30:00</option>

  <option>17:00:00</option>

  <option>17:30:00</option>

  <option>18:00:00</option>
</select>

</font></strong></td>

      <td>Status 

        <select name="status" id="select4">

          <option><? echo $status; ?></option>

          <option>Em manutenção</option>

          <option>Liberado</option>
        </select> 

        Efetuou Proposta 

        <select name="proposta" id="select5">

          <option selected><? echo $proposta; ?></option>

          <option>Sim</option>

          <option>Não</option>
        </select></td>
    </tr>

    <tr>

      <td>Observa&ccedil;&otilde;es</td>

      <td colspan="3"><textarea name="obs" cols="100" rows="10" id="textarea"><? echo $obs2; ?></textarea></td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="3"><textarea name="obs_cli" cols="100" rows="10" readonly="readonly" id="obs_cli"><?  

$sql = "SELECT * FROM obs_telemarketing where cod_cliente = '$cod_cliente' order by codigo desc";

$res = mysql_query($sql);

$reg = 0;

//echo "<tr>";

while($linha=mysql_fetch_row($res)) {



$codigo = $linha[0];

$cod_cliente = $linha[1];

$dia = $linha[2];

$mes = $linha[3];

$ano = $linha[4];

$hora = $linha[5];

$operador = $linha[6];

$estab_pertence = $linha[7];

$cidade_estab_pertence = $linha[8];

$obs = $linha[9];



echo "$dia/$mes/$ano - $hora - "."$operador - $estab_pertence - $cidade_estab_pertence - "."$obs";

?>



<?



if($reg==1){

//echo "</tr>";

$reg=0;

}





}

	  

	  

	  

	  

	   ?>

      </textarea></td>
    </tr>

    <tr> 

      <td colspan="2"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit" value="Gravar contato">          </td><td><div align="right"> </div></td>

      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td colspan="2">&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>
    </tr>
  </table>

</form>

<table width="100%"  border="0">

  <tr bgcolor="#ffffff">

    <td><div align="center" class="style2">N&ordm; da Proposta </div></td>

    <td><div align="center" class="style2">Data Proposta </div></td>

    <td><div align="center" class="style2">Data T&eacute;rmino </div></td>

    <td><div align="center" class="style2">Valor Cr&eacute;dito Solicitado </div></td>

    <td width="11%"><div align="center" class="style2">Quant parcelas </div></td>

    <td width="12%"><div align="center" class="style2">Valor parcelas </div></td>

    <td><div align="center" class="style2">Status</div></td>

  </tr>

  <?

			

$sql = "SELECT * FROM propostas where cpf = '$cpf' order by num_proposta desc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$num_proposta = $linha[0];

$nome_operador = $linha[1];

$tipo = $linha[2];

$estabelecimento_proposta = $linha[3];

$nome = $linha[4];

$sexo = $linha[5];

$estadocivil = $linha[6];

$cpf = $linha[7];

$rg = $linha[8];

$orgao = $linha[9];

$emissao = $linha[10];

$data_nasc = $linha[11];

$pai = $linha[12];

$mae = $linha[13];

$endereco = $linha[14];

$numero = $linha[15];

$bairro = $linha[16];

$complemento = $linha[17];

$cidade = $linha[18];

$estado = $linha[19];

$cep = $linha[20];

$telefone = $linha[21];

$celular = $linha[22];

$email = $linha[23];

$num_beneficio = $linha[24];

$valor_credito = $linha[25];

$quant_parc = $linha[26];

$parcela = $linha[27];

$banco_pagto = $linha[28];

$num_banco = $linha[29];

$agencia = $linha[30];

$conta = $linha[31];

$operador = $linha[32];

$cel_operador = $linha[33];

$email_operador = $linha[34];

$estabelecimento = $linha[35];

$cidade_estabelecimento = $linha[36];

$tel_estabelecimento = $linha[37];

$email_estabelecimento = $linha[38];

$obs = $linha[39];

$dataproposta = $linha[40];

$horaproposta = $linha[41];

$dataalteracao = $linha[42];

$horaalteracao = $linha[43];

$operador_alterou = $linha[44];

$cel_operador_alterou = $linha[45];

$email_operador_alterou = $linha[46];

$estabelecimento_alterou = $linha[47];

$cidade_estabelecimento_alterou = $linha[48];

$tel_estabelecimento_alterou = $linha[49];

$email_estabelecimento_alterou = $linha[50];

$status = $linha[51];





$parc1 = $linha[52];

$banco1 = $linha[53];

$vencto1 = $linha[54];

$compra1 = $linha[55];



$num_beneficio2 = $linha[80];

$num_beneficio3 = $linha[81];

$num_beneficio4 = $linha[82];



$tipo_proposta = $linha[83];

$bco_operacao = $linha[86];

$num_contrato_banco = $linha[105];

$num_bordero = $linha[129];



$valor_liberado = $linha[97];





?>

  <tr>

    <td width="17%"><div align="center">

        <form action="../propostas/imprimir_proposta.php" method="post" name="form2" target="_blank">

          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

          <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

          <? // printf("<a href='editar_proposta.php?chamar=$linha[0]' >$linha[0]</a>"); ?>

          <? printf("$linha[0]"); ?>

          <input type="submit" name="Submit2" value="Visualizar Proposta">

        </form>

    </div></td>

    <td width="14%"><div align="center"><? echo $dataproposta; ?></div></td>

    <td width="13%"><div align="center"><? echo $compra1; ?></div></td>

    <td width="17%"><div align="center"><? printf("R$ $linha[25]</a> ");?> </div></td>

    <td><div align="center"><? printf("$linha[26]"); ?> </div></td>

    <td><div align="center"><? printf("R$ $linha[27]"); ?> </div></td>

    <td width="16%"><div align="center"><? printf("$linha[51]"); ?> </div></td>

    <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>

    <? } ?>

</table>

</body>

</html>

