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

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];

require '../../conect/conect.php';

$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

$datainicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$datafinal = "$ano_final-$mes_final-$dia_final";


$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$razaosocial_empresa = $linha[1];

$nfantasia_empresa = $linha[2];

$cnpj_empresa = $linha[3];
$inscr_est_empresa = $linha[4];


$endereco_empresa = $linha[5];

$numero_empresa = $linha[6];

$bairro_empresa = $linha[7];

$cep_empresa = $linha[9];

$cidade_empresa = $linha[10];

$estado_empresa = $linha[11];

$telefone_empresa = $linha[12];

$fax_empresa = $linha[13];

$email_empresa = $linha[14];

$site_empresa = $linha[15];

}


$hoje = date('d-m-Y');
$hoje_norteamericano = date('Y-m-d');

$solicitacao = $_POST['solicitacao'];
$data_abrir = $_POST['data_abrir'];


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
.style10 {	font-size: 10px;
	font-weight: bold;
}
.style11 {font-size: 10px}
.style12 {color: #000000; font-weight: bold; font-size: 10px; }
.style13 {font-size: 12px}
.style21 {	color: #0000FF;

	font-weight: bold;
}
.style4 {	font-size: 16px;

	font-weight: bold;
}
.style6 {font-size: 9px; font-weight: bold; }
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
$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome_op = $linha[1];
$celular_op = $linha[19];
$email_op = $linha[20];
$estabelecimento_op = $linha[24];
$cidade_estabelecimento_op = $linha[25];
$tel_estabelecimento_op = $linha[26];
$email_estabelecimento_op = $linha[27];
$setor = $linha[43];
$estab_pertence_op = $linha[44];
$cidade_estab_pertence_op = $linha[45];
$tel_estab_pertence_op = $linha[46];
$email_estab_pertence_op = $linha[47];

$ultimo_departamento_trabalhado = $linha[66];

}


?>

  <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	

}
?>
  <table width="100%"  border="0">
        <tr>
          <td bgcolor="#CCCCCC"><div align="center"><span class="style2">
</span> <span class="style1"><? echo $nome_op; ?></span><span class="style2"> verificando os lan&ccedil;amentos do caixa no periodo de <? echo "$dia_inicial-$mes_inicial-$ano_inicial ate $dia_final-$mes_final-$ano_final da loja $ultimo_departamento_trabalhado"; ?><BR>
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
              <table width="100%"  border="1">
                <tr bgcolor="#CCCCCC">
                  <td colspan="2"><div align="center"><strong>Abertura de Caixa </strong></div></td>
                </tr>
                <tr bgcolor="ffffff">
                  <td width="49%"><div align="center" class="style8 style3">Caixa aberto hoje com o valor de </div></td>
                  <td width="51%"><div align="center" class="style9">
                      <?
			


$sql = "SELECT * FROM cx_entradas where nfantasia = '$ultimo_departamento_trabalhado' and datecadastro between '$datainicial' and '$datafinal' and categoria_conta = 'Abertura de Caixa' and departamento = '$ultimo_departamento_trabalhado'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$datacadastro = $linha[3];

$valor_abertura = $linha[25];
$historico = $linha[23];

//echo $valor_abertura;
}
?>
                      <? echo "R$ ".$valor_abertura; ?></div></td>
                </tr>
              </table>
            </div></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr >
            <td align="center" valign="top" bgcolor="#9F9C9D" style="font-weight: bold">ENTRADAS</td>
            <td align="center">&nbsp;</td>
            <td align="center" valign="top" bgcolor="#9F9C9D" style="font-weight: bold">SA&Iacute;DAS</td>
          </tr>
          <tr >
            <td width="49%" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="51%" bgcolor="#4475AA"><div align="center"><strong>Data</strong></div></td>
                <td width="24%" bgcolor="#4475AA"><div align="center"><strong>Total Entradas do dia</strong></div></td>
                <td width="25%" bgcolor="#4475AA"><div align="center"><strong>#</strong></div></td>
              </tr>
              <tr>
                <td colspan="3" bgcolor="#4475AA"><div align="center">
                  <?
$sql = "SELECT * FROM cx_entradas where departamento = '$ultimo_departamento_trabalhado' and categoria_conta <> 'Abertura de Caixa' and datecadastro between '$datainicial' and '$datafinal'  group by datecadastro order by codigo desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$datecadastro = $linha[30];
	$data_detalhada_abrir = $linha[30];
$datacadastro = $linha[20];
$diacadastro = $linha[17];
$mescadastro = $linha[18];
$anocadastro = $linha[19];
$horacadastro = $linha[21];


$sql2 = "select sum(valor) as total_do_dia from cx_entradas where departamento = '$ultimo_departamento_trabalhado' and datecadastro = '$datecadastro' and categoria_conta <> 'Abertura de Caixa'";
$resultado2=mysql_query($sql2, $conexao);
$linha=mysql_fetch_array($resultado2);

$quant_total_do_dia = bcadd($linha['total_do_dia'],0,2);
?>
                  <table id="<? echo "$data_detalhada_abrir"; ?> "width="100%" border="1" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="51%"><div align="center"><strong><? echo "$datacadastro"; ?></strong></div></td>
                      <td width="24%"><div align="center"><strong><? echo "R$ $quant_total_do_dia"; ?></strong></div></td>
                      <td width="25%"><div align="center">
                        <form name="form1" method="post" action="verifica_caixa_periodico.php".php#<? echo "$data_detalhada_abrir"; ?>">
                          <strong>
                            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                            </strong>
                          <input name="data_abrir" type="hidden" id="data_abrir" value="<? echo "$data_detalhada_abrir";  ?>">
                          <input name="solicitacao" type="hidden" id="solicitacao" value="<? if(($solicitacao=="analitico") && ($data_abrir==$data_detalhada_abrir)){ echo "sintetico"; }else{ echo "analitico"; } ?>">
                          <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "$dia_inicial"; ?>">
                          <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes_inicial"; ?>">
                          <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano_inicial"; ?>">
                          <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano_final"; ?>">
                          <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes_final"; ?>">
                          <input name="dia_final" type="hidden" id="dia_final" value="<? echo "$dia_final"; ?>">
                          <input type="submit" class='class01' name="button2" id="button2" value="<? if(($solicitacao=="analitico") && ($data_detalhada_abrir=="$data_abrir")){ echo "-"; }else{ echo "+"; } ?>">
                        </form>
                      </div></td>
                    </tr>
                    <tr>
                      <td colspan="3"><div align="center">
                        <?
	
	
if(($solicitacao=="analitico") && ($data_detalhada_abrir=="$data_abrir")){


?>
<?

$sql3 = "SELECT * FROM cx_entradas where departamento = '$ultimo_departamento_trabalhado' and categoria_conta <> 'Abertura de Caixa' and datecadastro = '$data_abrir' order by codigo desc";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$total_lancamentos_do_dia = mysql_num_rows($res3);

$codigo = $linha[0];
$datacadastro = $linha[20];
$horacadastro = $linha[21];
$nfantasia = $linha[22];
$historico_entrada = $linha[23];
$categoria_conta_entrada = $linha[24];
$valor_entrada = $linha[25];
$num_sete_um = $linha[26];
	
	
?>
                        <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                          <tr bgcolor="ffffff">
                            <td bgcolor="#696969"><div align="center" class="style10">Data</div></td>
                            <td bgcolor="#696969"><div align="center" class="style3 style8 style11">Valor </div></td>
                            <td bgcolor="#696969"><div align="center" class="style11"><strong>Categoria Conta R</strong></div></td>
                            <td bgcolor="#696969"><div align="center" class="style10">Registro</div></td>
                            <td bgcolor="#696969"><div align="center" class="style12">Hist&oacute;rico</div></td>
                          </tr>
                          <tr>
                            <td><div align="center" class="style11"><? echo $datacadastro; ?></div></td>
                            <td><div align="center" class="style11"><? echo "R$ ". $valor_entrada; ?></div></td>
                            <td><div align="center" class="style11"><? echo $categoria_conta_entrada; ?></div></td>
                            <td><div align="center"><span class="style11"><? echo $codigo; ?></span></div></td>
                            <td><div align="center" class="style11"><? echo $historico_entrada; ?></div></td>
                          </tr>
                          
                          <?







?>
                          <tr>
                            <td width="100%" colspan="5"><div align="center"><strong>Total de itens <? echo $total_lancamentos_do_dia;?></strong></div>
                              <div align="center"></div></td>
                          </tr>
                        </table>
                        <?  }} ?>
                      </div>
                        <div align="center"></div></td>
                    </tr>
                  </table>
                  <br>
                  <? } ?>
                </div></td>
              </tr>
              <tr>
                <td colspan="3"><div align="center"><strong>Total Geral
                      <?
$sql = "select sum(valor) as total_entradas from cx_entradas where departamento = '$ultimo_departamento_trabalhado' and categoria_conta <> 'Abertura de Caixa' and datecadastro between '$datainicial' and '$datafinal'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total_entradas = bcadd($linha['total_entradas'],0,2);

echo "R$ ".$valor_total_entradas;
?>
                </strong></div></td>
              </tr>
            </table></td>
            <td width="1%">&nbsp;</td>
            <td width="50%" valign="top"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="51%" bgcolor="#AA5D5E"><div align="center"><strong>Data</strong></div></td>
                <td width="24%" bgcolor="#AA5D5E"><div align="center"><strong>Total Sa&iacute;das do dia</strong></div></td>
                <td width="25%" bgcolor="#AA5D5E"><div align="center"><strong>#</strong></div></td>
              </tr>
              <tr>
                <td colspan="3" bgcolor="#AA5D5E"><div align="center">
                  <?
$sql = "SELECT * FROM cx_saidas where departamento = '$ultimo_departamento_trabalhado' and datecadastro between '$datainicial' and '$datafinal'  group by datecadastro order by codigo desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$datecadastrosaida = $linha[31];
	$data_detalhada_abrir = $linha[31];
$datasaida = $linha[20];
$diasaida = $linha[17];
$messaida = $linha[18];
$anosaida = $linha[19];
$horasaida = $linha[21];


$sql2 = "select sum(valor) as total_saidas_do_dia from cx_saidas where departamento = '$ultimo_departamento_trabalhado' and datecadastro = '$datecadastrosaida'";
$resultado2=mysql_query($sql2, $conexao);
$linha=mysql_fetch_array($resultado2);

$quant_total_saidas_do_dia = bcadd($linha['total_saidas_do_dia'],0,2);
?>
                  <table id="<? echo "$data_detalhada_abrir"; ?> 2"width="100%" border="1" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="51%"><div align="center"><strong><? echo "$diasaida-$messaida-$anosaida"; ?></strong></div></td>
                      <td width="24%"><div align="center"><strong><? echo "R$ $quant_total_saidas_do_dia"; ?></strong></div></td>
                      <td width="25%"><div align="center">
                        <form name="form1" method="post" action="verifica_caixa_periodico.php".php#<? echo "$data_detalhada_abrir"; ?>">
                          <strong>
                            <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
                            </strong>
                          <input name="data_abrir" type="hidden" id="data_abrir" value="<? echo "$data_detalhada_abrir";  ?>">
                          <input name="solicitacao" type="hidden" id="solicitacao" value="<? if(($solicitacao=="analitico") && ($data_abrir==$data_detalhada_abrir)){ echo "sintetico"; }else{ echo "analitico"; } ?>">
                          <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo "$dia_inicial"; ?>">
                          <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo "$mes_inicial"; ?>">
                          <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo "$ano_inicial"; ?>">
                          <input name="ano_final" type="hidden" id="ano_final" value="<? echo "$ano_final"; ?>">
                          <input name="mes_final" type="hidden" id="mes_final" value="<? echo "$mes_final"; ?>">
                          <input name="dia_final" type="hidden" id="dia_final" value="<? echo "$dia_final"; ?>">
                          <input type="submit" class='class01' name="button" id="button" value="<? if(($solicitacao=="analitico") && ($data_detalhada_abrir=="$data_abrir")){ echo "-"; }else{ echo "+"; } ?>">
                        </form>
                      </div></td>
                    </tr>
                    <tr>
                      <td colspan="3"><div align="center">
                        <?
	
	
if(($solicitacao=="analitico") && ($data_detalhada_abrir=="$data_abrir")){


?>
                        <?

$sql3 = "SELECT * FROM cx_saidas where departamento = '$ultimo_departamento_trabalhado' and categoria_conta <> 'Abertura de Caixa' and datecadastro = '$data_abrir' order by codigo desc";
$res3 = mysql_query($sql3);
while($linha=mysql_fetch_row($res3)) {
$total_lancamentos_saida_do_dia = mysql_num_rows($res3);

$codigo_saida = $linha[0];
$datecadastrosaida = $linha[31];
	$data_detalhada_abrir = $linha[31];
$datasaida = $linha[20];
$diasaida = $linha[17];
$messaida = $linha[18];
$anosaida = $linha[19];
$horasaida = $linha[21];
$nfantasia = $linha[22];
$historico_saida = $linha[23];
$categoria_conta_saida = $linha[24];
$valor_saida = $linha[25];
$fornecedor = $linha[36];
	
	
?>
                        <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                          <tr bgcolor="ffffff">
                            <td bgcolor="#696969"><div align="center" class="style10">Data</div></td>
                            <td bgcolor="#696969"><div align="center" class="style3 style8 style11">Valor </div></td>
                            <td bgcolor="#696969"><div align="center" class="style11"><strong>Categoria Conta D</strong></div></td>
                            <td align="center" bgcolor="#696969"><span class="style11"><strong>Fornecedor</strong></span></td>
                            <td bgcolor="#696969"><div align="center" class="style10">Registro</div></td>
                            <td bgcolor="#696969"><div align="center" class="style12">Hist&oacute;rico</div></td>
                          </tr>
                          <tr>
                            <td><div align="center" class="style11"><? echo $data_detalhada_abrir; ?></div></td>
                            <td><div align="center" class="style11"><? echo "R$ ". $valor_saida; ?></div></td>
                            <td><div align="center" class="style11"><? echo $categoria_conta_saida; ?></div></td>
                            <td align="center"><span class="style11"><? echo $fornecedor; ?></span></td>
                            <td><div align="center"><span class="style11"><? echo $codigo_saida; ?></span></div></td>
                            <td><div align="center" class="style11"><? echo $historico_saida; ?></div></td>
                          </tr>
                          <?







?>
                          <tr>
                            <td width="100%" colspan="6"><div align="center"><strong>Total de itens <? echo $total_lancamentos_saida_do_dia;?></strong></div>
                              <div align="center"></div></td>
                          </tr>
                        </table>
                        <?  }} ?>
                      </div>
                        <div align="center"></div></td>
                    </tr>
                  </table>
                  <br>
                  <? } ?>
                </div></td>
              </tr>
              <tr>
                <td colspan="3"><div align="center"><strong>Total Geral
                  <?
$sql = "select sum(valor) as total_saidas from cx_saidas where departamento = '$ultimo_departamento_trabalhado' and categoria_conta <> 'Abertura de Caixa' and datecadastro between '$datainicial' and '$datafinal'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$valor_total_saidas = bcadd($linha['total_saidas'],0,2);

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
<table width="100%"  border="1">
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
    <td><div align="center">
      <strong>
      <?
		  

$sql = "select sum(valor_a_receber) as total_dos_cartoes from contas_a_receber where departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' and (modopagto <> 'DINHEIRO') and (quitacao <> 'Recebido do Cliente')";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);



$total_recebimento_cartoes = bcadd($linha['total_dos_cartoes'],0,2);





$total_caixa_hoje = bcadd($valor_total_entradas,$total_recebimento_cartoes,2);

echo "Total de recebimentos do caixa R$ $total_caixa_hoje";

?></strong></div></td>
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
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="42%" valign="top"><table width="100%" border="1" align="center" cellspacing="0">
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
  

$sql2 = "select * from contas_a_receber where modopagto = 'CARTAO' and tipocartao = 'CARTAO DE DEBITO' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' group by cartao order by cartao asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$cartao_debito = $linha[33];





$sql3 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'CARTAO' and cartao = '$cartao_debito' and tipocartao = 'CARTAO DE DEBITO' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' and (quitacao <> 'Recebido do Cliente')";

$resultado3=mysql_query($sql3, $conexao);
$linha=mysql_fetch_array($resultado3);



$total_cartao_debito = bcadd($linha['totalcartao'],0,2);



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
  

$sql4 = "select * from contas_a_receber where modopagto = 'CARTAO' and tipocartao = 'CARTAO DE CREDITO' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$cartao_credito = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'CARTAO' and cartao = '$cartao_credito' and tipocartao = 'CARTAO DE CREDITO' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_cartao_credito = bcadd($linha['totalcartao'],0,2);



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
  

$sql4 = "select * from contas_a_receber where modopagto = 'CARNE' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$carne = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'CARNE' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_carne = bcadd($linha['totalcartao'],0,2);



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
  

$sql4 = "select * from contas_a_receber where modopagto = 'CHEQUE' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$cheque = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'CHEQUE' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_cheque = bcadd($linha['totalcartao'],0,2);



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
  

$sql4 = "select * from contas_a_receber where modopagto = 'DEPOSITO' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$deposito = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'DEPOSITO' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_deposito = bcadd($linha['totalcartao'],0,2);



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
  

$sql4 = "select * from contas_a_receber where modopagto = 'DOC' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$doc = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'DOC' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_doc = bcadd($linha['totalcartao'],0,2);



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
  

$sql4 = "select * from contas_a_receber where modopagto = 'TED' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' group by cartao order by cartao asc";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {

$ted = $linha[33];





$sql5 = "select sum(valor_a_receber) as totalcartao from contas_a_receber where modopagto = 'TED' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' and (quitacao <> 'Recebido do Cliente')";

$resultado5=mysql_query($sql5, $conexao);
$linha=mysql_fetch_array($resultado5);



$total_ted = bcadd($linha['totalcartao'],0,2);



?>
      <tr>
        <td class="style21"><div align="center"><span class="style6"><? echo $ted; ?></span></div></td>
        <td class="style21"><div align="center"><strong><font color="#0000FF"><strong><? echo "R$ ".$total_ted;
}
 ?></strong></font></strong></div></td>
      </tr>
      <tr>
        <td colspan="2" class="style21"><div align="center">CARTEIRA</div>
          <div align="center"></div></td>
      </tr>
		<?
  

$sql6 = "select * from contas_a_receber where modopagto = 'CARTEIRA' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' group by cartao order by cartao asc";
$res6 = mysql_query($sql6);
while($linha=mysql_fetch_row($res6)) {

$carteira = $linha[10];





$sql7 = "select sum(valor_a_receber) as totalcarteira from contas_a_receber where modopagto = 'CARTEIRA' and departamento = '$ultimo_departamento_trabalhado' and datacadastro between '$datainicial' and '$datafinal' and (quitacao <> 'Recebido do Cliente')";

$resultado7=mysql_query($sql7, $conexao);
$linha=mysql_fetch_array($resultado7);



$total_carteira = bcadd($linha['totalcarteira'],0,2);
	
	?>
      <tr>
        <td class="style21"><div align="center"><span class="style6"><? echo $carteira; ?></span></div></td>
        <td class="style21"><div align="center"><strong><font color="#0000FF"><strong><? echo "R$ ".$total_carteira;
}
 ?></strong></font></strong></div></td>
      </tr>
      <?
//}

?>
    </table></td>
    <td width="17%" valign="top">&nbsp;</td>
    <td width="41%" valign="top"><table width="100%" border="1" align="center" cellspacing="0">
      <tr>
        <td height="15" class="style21"><div align="center"><strong>Total itens vendidos</strong></div></td>
        <td class="style21"><div align="center"><strong>
          <?

$sql = "select sum(quant) as totalembalagens from produtos_em_orcamento where departamento = '$ultimo_departamento_trabalhado' and status = 'Finalizado' and datafechamento between '$datainicial' and '$datafinal'";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);


$totaldeembalagens = $linha['totalembalagens'];

echo "$totaldeembalagens";

?>
        </strong></div></td>
      </tr>
      <tr>
        <td width="52%" height="15" class="style21"><div align="center" class="style21"><strong>Produto</strong></div></td>
        <td width="48%" class="style21"><div align="center" class="style21"><strong>Quantidade</strong></div></td>
      </tr>
      <?

$sql = "select * from produtos_em_orcamento where departamento = '$ultimo_departamento_trabalhado' and status = 'Finalizado' and datafechamento between '$datainicial' and '$datafinal' group by nomeproduto";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$produtovendido = $linha[18];

?>
      <tr>
        <td class="style21"><div align="center"><? echo "$produtovendido"; ?></div>
          <div align="center"></div></td>
        <td class="style21"><div align="center"><strong>
          <?

$sql2 = "select sum(quant) as totalembalagensporproduto from produtos_em_orcamento where nomeproduto = '$produtovendido' and departamento = '$ultimo_departamento_trabalhado' and status = 'Finalizado' and datafechamento between '$datainicial' and '$datafinal'";
$resultado2=mysql_query($sql2, $conexao);
$linha=mysql_fetch_array($resultado2);


$totaldeembalagensporproduto = $linha['totalembalagensporproduto'];

echo "$totaldeembalagensporproduto";

?>
        </strong></div></td>
      </tr>
      <? } ?>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
