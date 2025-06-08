<?



session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

?>



<?
require '../../conect/conect.php';



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

<?

$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

//$estabelecimento_op = $linha[24];

//$cidade_estabelecimento_op = $linha[25];

//$tel_estabelecimento_op = $linha[26];

//$email_estabelecimento_op = $linha[27];

$setor = $linha[43];

$estab_pertence_op = $linha[44];

$cidade_estab_pertence_op = $linha[45];

$tel_estab_pertence_op = $linha[46];

$email_estab_pertence_op = $linha[47];

$ultimo_departamento_trabalhado = $linha[66];


}







$hoje = date('d-m-Y');
//$hoje_norteamericano = date('Y-m-d');

$datefechamento = $_POST['datefechamento'];
$horafechamento = date('H:i:s');
$hoje_norteamericano = $datefechamento;


$data_de_fechamento = explode("-", $datefechamento);


$dia = $data_de_fechamento[2];

$mes = $data_de_fechamento[1];

$ano = $data_de_fechamento[0];

$solicitacao_gravar_fechamento_caixa = $_POST['solicitacao_gravar_fechamento_caixa'];

if($solicitacao_gravar_fechamento_caixa=="gravarfechamentocaixa"){



//$comando = "insert into cx_entradas(datacadastro,datecadastro,horacadastro,nfantasia,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,historico,dia,mes,ano,categoria_conta,departamento)
//values('$datafechamento','$datefechamento','$horacadastro','$estab_pertence_op','$nome_op','$celular_op','$email_op','$estab_pertence_op','$cidade_estab_pertence_op','$tel_estab_pertence_op','$email_estab_pertence_op','$historico','$dia','$mes','$ano','$categoria_conta','$ultimo_departamento_trabalhado')";

$comando = "insert into cx_fechamento(datafechamento,horafechamento,valorfechamento,operador,loja,departamento)
values('$datefechamento','$horafechamento','','$nome_op','$ultimo_departamento_trabalhado','$ultimo_departamento_trabalhado')";
mysql_query($comando,$conexao);


}



$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>







<style type="text/css">

<!--

.style1 {

	color: #0000FF;

	font-weight: bold;

}

.style2 {font-weight: bold}

.style3 {

	color: #FFFFFF;

	font-weight: bold;

}

.style8 {color: #000000}

.style9 {color: #000000; font-weight: bold; }

.style10 {

	font-size: 10px;

	font-weight: bold;

}

.style11 {font-size: 10px}

.style12 {color: #000000; font-weight: bold; font-size: 10px; }
.style21 {
	color: #0000FF;

	font-weight: bold;
}
.style4 {
	font-size: 16px;

	font-weight: bold;
}
.style5 {font-size: 9px}
.style6 {font-size: 9px; font-weight: bold; }
.style7 {font-size: 14px}

-->

</style>

<body bgcolor="#<? printf("ffffff"); ?>"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?>



  <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	



}

?>

  <table width="100%"  border="0">

    <tr>

      <td><form name="form1" method="post" action="../index.php">

          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

          <input type="submit" name="Submit22" value="Voltar">

      </form></td>

      <td><form action="imprimir_caixa_hoje.php" method="post" name="form1" target="_blank">

          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      </form></td>

      <td>&nbsp;</td>

    </tr>

  </table>

  <table width="100%"  border="0">

        <tr>

          <td bgcolor="#CCCCCC"><div align="center"><span class="style2">

</span> <span class="style1"><? echo $nome_op; ?></span><span class="style2"> verificando os lan&ccedil;amentos do caixa em <? echo $hoje; ?><BR>

	      </span></div></td>

        </tr>

</table>

          

<div align="center"></div>

     <div align="center"></div></td>

    </tr>

    <tr>

      <td colspan="2" valign="top"><div align="center">

        </div></td>

    </tr>

    <tr>

      <td valign="top"><div align="center">

        <table width="100%"  border="0">

          <tr>

            <td colspan="3"><div align="center">

              <table width="100%"  border="0">

                <tr bgcolor="#CCCCCC">

                  <td colspan="2"><div align="center"><strong>Abertura de Caixa </strong></div></td>

                </tr>

                <tr bgcolor="ffffff">

                  <td width="49%"><div align="center" class="style8 style3">Caixa aberto hoje com o valor de </div></td>

                  <td width="51%"><div align="center" class="style9">

                      <?

			





$sql = "SELECT * FROM cx_abertura where loja = '$ultimo_departamento_trabalhado' and operador = '$nome_op' and dataabertura between '$datainicial' and '$datafinal' and departamento = '$ultimo_departamento_trabalhado'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;





$datacadastro = $linha[1];

$valor_abertura = $linha[3];



}

?>

                      <? echo "R$ ".$valor_abertura; ?></div></td>

                </tr>

              </table>

            </div></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

            <td>&nbsp;</td>

            <td>&nbsp;</td>

          </tr>

          <tr>

            <td width="49%" valign="top"><table width="100%"  border="0">

              <tr bgcolor="#CCCCCC">

                <td colspan="6"><div align="center"><strong>Entradas</strong></div></td>
              </tr>

              <tr bgcolor="ffffff">

                <td width="8%"><div align="center" class="style10">Data</div></td>

                <td width="12%"><div align="center" class="style3 style8 style11">Valor </div></td>

                <td><div align="center" class="style11"><strong>Categoria</strong></div></td>

                <td><div align="center" class="style11"><span class="style10">Registro</span></div></td>

                <td><div align="center" class="style10">Cliente</div></td>
                <td><div align="center" class="style12">Hist&oacute;rico</div></td>
              </tr>

                <?

			





$sql = "SELECT * FROM cx_entradas where datecadastro = '$datefechamento' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;



$codigo = $linha[0];

$datacadastro = $linha[20];

$horacadastro = $linha[21];

$nfantasia = $linha[22];

$historico_entrada = $linha[23];

$categoria_conta_entrada = $linha[24];

$valor_entrada = $linha[25];

$num_sete_um = $linha[26];

$nome_cli = $linha[31];



?>

              <tr>

                <td><div align="center" class="style11"><? echo $datacadastro; ?></div></td>

                <td><div align="center" class="style11"><? echo "R$ ". $valor_entrada; ?> </div></td>

                <td width="19%"><div align="center" class="style11"><? echo $categoria_conta_entrada; ?></div></td>

                <td width="14%"><div align="center"><span class="style11"><? echo $codigo; ?></span></div></td>

                <td width="23%"><div align="center"><span class="style11"><? echo $nome_cli; ?></span></div></td>
                <td width="24%">

                  <div align="center" class="style11"><? echo $historico_entrada; ?></div></td>
              </tr>

              <? } ?>

              <tr>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><span class="style11"></span></td>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><div align="center"></div></td>
                <td><span class="style11"></span></td>
              </tr>

              <tr>

                <td colspan="6"><div align="center"><strong>

                    Total 

                    <?

$sql = "select sum(valor) as total_entradas from cx_entradas where datacadastro = '$hoje' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_entradas = $linha['total_entradas'];



echo "R$ ".$valor_total_entradas;

?>

                </strong></div></td>
              </tr>

            </table></td>

            <td width="1%">&nbsp;</td>

            <td width="50%" valign="top"><table width="100%"  border="0">

              <tr bgcolor="#CCCCCC">

                <td colspan="6"><div align="center"><strong>Sa&iacute;das</strong></div></td>

              </tr>

              <tr bgcolor="ffffff">

                <td width="13%"><div align="center" class="style11"><strong>Data</strong></div></td>

                <td width="16%"><div align="center" class="style3 style8 style11">Valor</div></td>

                <td><div align="center" class="style11"><strong>Categoria</strong></div></td>

                <td><div align="center" class="style10">Registro</div></td>

                <td><div align="center" class="style10">Modo Pagto </div></td>

                <td><div align="center" class="style12">Hist&oacute;rico</div></td>

              </tr>

			                  <?

			





$sql = "SELECT * FROM cx_saidas where datecadastro = '$datefechamento' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' order by codigo asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;



$codigo = $linha[0];

$datacadastro = $linha[20];

$horacadastro = $linha[21];

$nfantasia = $linha[22];

$historico_saida = $linha[23];

$categoria_conta_saida = $linha[24];

$valor_saida = $linha[25];

$num_sete_um = $linha[26];

$modo_pagto = $linha[27];





?>



              <tr>

                <td><div align="center"><span class="style11"><? echo $datacadastro; ?></span></div></td>

                <td><div align="center" class="style11"><? echo "R$ ". $valor_saida; ?> </div></td>

                <td width="18%"><div align="center"><span class="style11"><? echo $categoria_conta_saida; ?></span></div></td>

                <td width="11%"><div align="center"><span class="style11"><? echo $codigo; ?></span></div></td>

                <td width="17%"><div align="center"><span class="style11"><? echo $modo_pagto; ?></span></div></td>

                <td width="25%">

                  <div align="center" class="style11"><? echo $historico_saida; ?></div></td>

              </tr>

              <? } ?>

              <tr>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><span class="style11"></span></td>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><div align="center"><span class="style11"></span></div></td>

                <td><span class="style11"></span></td>

              </tr>

              <tr>

                <td colspan="6"><div align="center"><strong>

                    Total 

                    <?

$sql = "select sum(valor) as total_saidas from cx_saidas where datacadastro = '$hoje' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$valor_total_saidas = $linha['total_saidas'];



echo "R$ ".$valor_total_saidas;

?>

                </strong></div></td>

              </tr>

            </table></td>

          </tr>

          <tr>

            <td>&nbsp;</td>

            <td>&nbsp;</td>

            <td>&nbsp;</td>

          </tr>

        </table>

      </div>

    <br>

<table width="100%"  border="0">

  <tr>

    <td width="33%"><div align="right"></div></td>

    <td width="34%" bgcolor="#CCCCCC"><div align="left"></div>      

    <div align="center" class="style2">Saldo 

      <?

$saldo = bcsub($valor_total_entradas,$valor_total_saidas,2);



echo "R$ ".$saldo;

?>

    </div></td>

    <td width="33%">&nbsp;</td>

  </tr>

</table><br>
<table width="100%" border="0">
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"><strong>
      <?

$sql = "select sum(valor_a_receber) as total_dos_cartoes from contas_a_receber where operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' and (modopagto <> 'DINHEIRO') and (quitacao <> 'Recebido do Cliente')";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$total_recebimento_cartoes = bcadd($linha['total_dos_cartoes'],0,2);





$total_caixa_hoje = bcadd($valor_total_entradas,$total_recebimento_cartoes,2);

echo "Total de recebimentos do caixa R$ $total_caixa_hoje";

?>
    </strong></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
</table>
<br>
<table width="50%" border="1" align="center" cellspacing="0">
  <tr>
    <td height="15" class="style21"><div align="center"><strong>Total recebimento com cartoes</strong></div></td>
    <td class="style21"><div align="center"><strong>
      <?




echo "R$ ".$total_recebimento_cartoes;

?>
    </strong></div></td>
  </tr>
  <tr>
    <td width="52%" height="15" class="style21"><div align="center" class="style21"><strong>Cartoes (Tipo de operacao)</strong></div></td>
    <td width="48%" class="style21"><div align="center" class="style21"><strong>Valor Total</strong></div></td>
  </tr>
  <?
  

//$sql1 = "select * from faturamento_futuro where modopagto <> 'DINHEIRO' and departamento = '$ultimo_departamento_trabalhado' and datefaturamento = '$hoje_norteamericano' group by modopagto order by modopagto asc";
//$res1 = mysql_query($sql1);
//while($linha=mysql_fetch_row($res1)) {

//$modopagto = $linha[19];

?>
  <tr>
    <td colspan="2" class="style21"><div align="center"><span class="style2 style2 style4"><strong><font color="#0000FF"><strong>
      <? //echo $modopagto; ?>
    </strong></font></strong></span></div>
      <div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2" class="style21"><div align="center">Cart&atilde;o de D&eacute;bito</div></td>
  </tr>
  <?
  

$sql2 = "select * from contas_a_receber where modopagto = 'CARTAO' and tipocartao = 'CARTAO DE DEBITO' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' group by cartao order by cartao asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$cartao_debito = $linha[33];





$sql3 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'CARTAO' and cartao = '$cartao_debito' and tipocartao = 'CARTAO DE DEBITO' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' and (quitacao <> 'Recebido do Cliente')";

$resultado3=mysql_query($sql3, $conexao);
$linha=mysql_fetch_array($resultado3);



$total_cartao_debito = $linha['totalcartao'];



?>
  <tr>
    <td class="style21"><div align="center"><span class="style6"><? echo $cartao_debito; ?></span></div></td>
    <td class="style21"><div align="center"><strong><font color="#0000FF"><strong><? echo "R$ ".$total_cartao_debito;
}
 ?></strong></font></strong></div></td>
  </tr>
  <tr>
    <td colspan="2" class="style21"><div align="center">Cart&atilde;o de Cr&eacute;dito</div>
      <div align="center"></div></td>
  </tr>
  <?
  

$sql4 = "select * from contas_a_receber where modopagto = 'CARTAO' and tipocartao = 'CARTAO DE CREDITO' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$cartao_credito = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'CARTAO' and cartao = '$cartao_credito' and tipocartao = 'CARTAO DE CREDITO' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_cartao_credito = $linha['totalcartao'];



?>
  <tr>
    <td class="style21"><div align="center"><span class="style6"><? echo $cartao_credito; ?></span></div></td>
    <td class="style21"><div align="center"><strong><font color="#0000FF"><strong><? echo "R$ ".$total_cartao_credito;
}
 ?></strong></font></strong></div></td>
  </tr>
  <tr>
    <td colspan="2" class="style21"><div align="center">Carn&ecirc;</div>
      <div align="center"></div></td>
  </tr>
  <?
  

$sql4 = "select * from contas_a_receber where modopagto = 'CARNE' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$carne = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'CARNE' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_carne = $linha['totalcartao'];



?>
  <tr>
    <td class="style21"><div align="center"><span class="style6"><? echo $carne; ?></span></div></td>
    <td class="style21"><div align="center"><strong><font color="#0000FF"><strong><? echo "R$ ".$total_carne;
}
 ?></strong></font></strong></div></td>
  </tr>
  <tr>
    <td colspan="2" class="style21"><div align="center">Cheque</div>
      <div align="center"></div></td>
  </tr>
  <?
  

$sql4 = "select * from contas_a_receber where modopagto = 'CHEQUE' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$cheque = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'CHEQUE' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_cheque = $linha['totalcartao'];



?>
  <tr>
    <td class="style21"><div align="center"><span class="style6"><? echo $cheque; ?></span></div></td>
    <td class="style21"><div align="center"><strong><font color="#0000FF"><strong><? echo "R$ ".$total_cheque;
}
 ?></strong></font></strong></div></td>
  </tr>
  <tr>
    <td colspan="2" class="style21"><div align="center">Deposito</div>
      <div align="center"></div></td>
  </tr>
  <?
  

$sql4 = "select * from contas_a_receber where modopagto = 'DEPOSITO' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$deposito = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'DEPOSITO' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_deposito = $linha['totalcartao'];



?>
  <tr>
    <td class="style21"><div align="center"><span class="style6"><? echo $deposito; ?></span></div></td>
    <td class="style21"><div align="center"><strong><font color="#0000FF"><strong><? echo "R$ ".$total_deposito;
}
 ?></strong></font></strong></div></td>
  </tr>
  <tr>
    <td colspan="2" class="style21"><div align="center">DOC</div>
      <div align="center"></div></td>
  </tr>
  <?
  

$sql4 = "select * from contas_a_receber where modopagto = 'DOC' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$doc = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'DOC' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_doc = $linha['totalcartao'];



?>
  <tr>
    <td class="style21"><div align="center"><span class="style6"><? echo $doc; ?></span></div></td>
    <td class="style21"><div align="center"><strong><font color="#0000FF"><strong><? echo "R$ ".$total_doc;
}
 ?></strong></font></strong></div></td>
  </tr>
  <tr>
    <td colspan="2" class="style21"><div align="center">TED</div>
      <div align="center"></div></td>
  </tr>
  <?
  

$sql4 = "select * from contas_a_receber where modopagto = 'TED' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$ted = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'TED' and operador = '$nome_op' and departamento = '$ultimo_departamento_trabalhado' and datacadastro = '$hoje_norteamericano' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_ted = $linha['totalcartao'];



?>
  <tr>
    <td class="style21"><div align="center"><span class="style6"><? echo $ted; ?></span></div></td>
    <td class="style21"><div align="center"><strong><font color="#0000FF"><strong><? echo "R$ ".$total_ted;
}
 ?></strong></font></strong></div></td>
  </tr>
  <tr>
    <td class="style21"><div align="center"></div></td>
    <td class="style21"><div align="center"></div></td>
  </tr>
  <tr>
    <td class="style21"><div align="center"></div></td>
    <td class="style21"><div align="center"></div></td>
  </tr>
  <?
//}

?>
</table>
<p>&nbsp;</p>

