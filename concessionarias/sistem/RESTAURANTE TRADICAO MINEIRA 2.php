<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');

require '../conect/conect.php';
?>
<?php
$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true): /*Se este dispositivo for portátil, faça/escreva o seguinte */ ?>

<?php else : /* Caso contrário, faça/escreva o seguinte */ ?>

<?php endif; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
.style1 {font-size: 35px;
	font-weight: bold;
	color: #0000FF;
}
</style>
</head>

<body>
<table width="100%"  border="0" bgcolor="#CCCCCC">
  <tr>
    <td width="13%" valign="top"><form action="produtos/menu.php" method="post" name="form2" id="form12">
      <div align="center">
        <?
		  
$dia = date('d');
$mes = date('m');
$ano = date('Y');
		  
$dia_atual = date('d');
$mes_atual = date('m');
$ano_atual = date('Y');

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="class01" type="submit" name="Submit30" value="Produtos" />
      </div>
    </form></td>
    <td valign="top"><form action="index.php" method="post" name="form2" id="form4">
      <input name="solicitacao" type="hidden" id="solicitacao" value="abrircaixa" />
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <?

if(($registro_abertura_de_caixa==0) && ($registro_fechamento_de_caixa_de_ontem==1) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2")){

        echo'<input class="class01" type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
    </form></td>
	  <? if($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA"){ 
	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
		$action = "restaurante/atribuicao_de_mesas_dispositivomovel.php";
	}
	else{
	$action = "restaurante/atribuicao_de_mesas.php";
	}
		}else{ 
	
	if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true){
		$action = "restaurante/atribuicao_de_mesas_dispositivomovel2.php";
	}
	else{
	$action = "restaurante/atribuicao_de_mesas2.php";
	}
} ?>
    <td width="16%" valign="top"><form action="<? echo "$action"; ?>" method="post" name="form2" id="form3">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input class='class01' type='submit' name='Submit5' value='Mapa de Mesas'>"; } ?>
      </div>
    </form></td>
    <td width="13%" valign="top"><div align="center">
      <form action="orcamentos/orcamento.php" method="post" name="movimento" id="movimento">
        <div align="center">
          <input class="class02" name="nome" type="text" id="nome" size="10" /><br>
          <span class="style1">
          <input name="solicitacao" type="hidden" id="solicitacao" value="abrir_orcamento" />
          </span>
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input class='class01' type='submit' name='Submit5' value='Movimento'>"; } ?>
        </div>
<script language='JavaScript' type='text/javascript'>
document.movimento.nome.focus()
</script>
      </form>
    </div></td>
    <td colspan="2" valign="top"><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2" id="form7">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input class='class01' type='submit' name='Submit5' value='CAIXA'>"; } ?>
      </div>
    </form></td>
    <td width="8%" valign="top"><form action="restaurante/pesquisafatura.php" method="post" name="form2" id="form8" target="_blank">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <strong>Fatura<br>
          </strong>
        <input class='class02' name="num_fatura" type="text" id="num_fatura" size="10" />
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input class='class01' type='submit' name='Submit5' value='Pesquisar'>"; } ?>
      </div>
    </form></td>
    <td width="24%" valign="top"><div align="center">
      <form action="relatorios/relatorio_compras_todos_funcionarios.php" method="post" name="form2" target="_blank" id="form">
        <select class="class02" name="empresaconveniada" id="empresaconveniada">
          <option selected>Selecione</option>
          <?


    $sql = "select * from empresas_conveniadas order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
        </select><br>
        <input class="class01" type="submit" name="Submit322" value="Faturas Fechadas" />
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="mes" type="hidden" id="mes" value="<? echo "$mes"; ?>" />
        <input name="ano" type="hidden" id="ano" value="<? echo "$ano"; ?>" />
        <input name="status_fatura" type="hidden" id="status_fatura" value="<? echo "Finalizado"; ?>" />
        <input name="status_conta" type="hidden" id="status_conta" value="<? echo "Aberto"; ?>" />
        
  <?
		
$sql = "select sum(total_geral) as total_liquido_faturas_fechadas from faturamento_futuro where empresaconveniada = '$empresaconveniada' and mes = '$mes' and ano = '$ano' and status_fatura = 'Finalizado' and status_conta = 'Aberto' group by mes";
$resultado=mysql_query($sql, $conexao);
$linha=mysql_fetch_array($resultado);

$total_liquido_faturas_fechadas = bcadd($linha['total_liquido_faturas_fechadas'],0,2);
		
		//echo "R$ $total_liquido_faturas_fechadas";
	  
	  ?>
      </form>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form action="index.php" method="post" name="form2" id="form6">
      <div align="center">
        <?
		if(($registro_abertura_de_caixa==0) && ($solicitacao=="abrircaixa") && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2")){

         echo "R$
          <input class='class02' name='valor' type='text' id='valor' size='10' maxlength='10'>";
		  
		}
		  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao_gravar_abertura_caixa" type="hidden" id="solicitacao_gravar_abertura_caixa" value="gravaraberturacaixa" />
        <input name="departamento" type="hidden" id="departamento" value="<? echo $ultimo_departamento_trabalhado; ?>" />
        <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>" />
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>" />
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>" />
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>" />
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>" />
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>" />
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>" />
        <input name="historico" type="hidden" id="historico" value="<? echo "Abertura de Caixa"; ?>" />
        <input name="categoria_conta" type="hidden" id="categoria_conta" value="<? echo "Abertura de Caixa"; ?>" />
        <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $estab_pertence; ?>" />
        <?

if(($registro_abertura_de_caixa==0) && ($solicitacao=="abrircaixa") && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2")){



printf('<input class="class01" type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
      </div>
    </form></td>
    <td colspan="4"><form action="caixa/verifica_caixa_periodico.php" method="post" name="form2" target="_blank" id="form9">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <select class="class02" name="dia_inicial" id="dia_inicial">
          <option selected="selected"><? echo "$dia_atual"; ?></option>
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
        <select class="class02" name="mes_inicial" id="mes_inicial">
          <option selected="selected"><? echo $mes_atual; ?></option>
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
        <select class="class02" name="ano_inicial" id="ano_inicial">
          <option> <? echo $ano_anterior; ?></option>
          <option selected="selected"><? echo $ano; ?></option>
          <option> <? echo $ano_posterior; ?></option>
          </select>
        at&eacute;
        <select class="class02" name="dia_final" id="dia_final">
          <option selected="selected"><? echo "$dia_atual"; ?></option>
          <option>31</option>
          <option>30</option>
          <option>29</option>
          <option>28</option>
          <option>27</option>
          <option>26</option>
          <option>25</option>
          <option>24</option>
          <option>23</option>
          <option>22</option>
          <option>21</option>
          <option>20</option>
          <option>19</option>
          <option>18</option>
          <option>17</option>
          <option>16</option>
          <option>15</option>
          <option>14</option>
          <option>13</option>
          <option>12</option>
          <option>11</option>
          <option>10</option>
          <option>09</option>
          <option>08</option>
          <option>07</option>
          <option>06</option>
          <option>05</option>
          <option>04</option>
          <option>03</option>
          <option>02</option>
          <option>01</option>
          </select>
        <select class="class02" name="mes_final" id="mes_final">
          <option selected="selected"><? echo $mes; ?></option>
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
        <select class="class02" name="ano_final" id="ano_final">
          <option> <? echo $ano_anterior; ?></option>
          <option selected="selected"><? echo $ano; ?></option>
          <option> <? echo $ano_posterior; ?></option>
          </select>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input class='class01' type='submit' name='Submit5' value='Visualizar Caixa'>"; } ?>
        </div>
    </form>     </td>
    <td>&nbsp;</td>
    <td><div align="center">
      <form action="clientes/menu.php" method="post" name="form2" id="form11">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "<input class='class01' type='submit' name='Submit5' value='Clientes'>"; } ?>
          <input type="hidden" name="nome" id="nome" />
        </div>
      </form>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center">
      <form action="index.php" method="post" name="form2" id="form10">
        <div align="center">
          <input name="fechamentodecaixa" type="hidden" id="fechamentodecaixa" value="fechar caixa" />
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
			<? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2")){ echo "<input class='class01' type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
          <? if(($registro_abertura_de_caixa_de_ontem==1) && ($registro_fechamento_de_caixa_de_ontem==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2")){ echo "<input class='class01' type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
          <?

//echo "$registro_abertura_de_caixa_de_ontem - $registro_fechamento_de_caixa_de_ontem - $registro_abertura_de_caixa";

?>
        </div>
      </form>
    </div></td>
    <td>&nbsp;</td>
    <td><div align="center">
      <form action="clientes/cupom.php" method="post" name="form5" id="form5">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "CPF
        <input class='class02' name='cpf' type='text' id='cpf' size='11' maxlength='11'>
        <input class='class01' type='submit' name='Submit52322' value='Registrar Cupom'>"; } ?>
        </div>
      </form>
    </div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td colspan="2"><div align="center">
      <? 
$fechamentodecaixa = $_POST['fechamentodecaixa'];
	  
	  if($fechamentodecaixa=="fechar caixa"){ echo "Tem Certeza que deseja fechar o Caixa?"; } ?></div>      <div align="center"></div></td>
    <td>&nbsp;</td>
    <td align="center">Impressão de Comandas</td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="6%"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") && ($fechamentodecaixa=="fechar caixa") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input class='class01' type='submit' name='Submit5' value='Nao'>"; } ?>
        </div>
      </form>
    </div></td>
    <td width="7%"><form action="caixa/relatorio_geral_cx_diario.php" method="post" name="form2" id="form2">
      <div align="center">
        <?
$sql = "SELECT * FROM cx_entradas where departamento = '$ultimo_departamento_trabalhado' and categoria_conta = 'Abertura de Caixa' order by datecadastro desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$data_do_ultimo_registro_de_abertura_de_caixa = $linha[30];


}
		  
		  ?>
        <input name="solicitacao_gravar_fechamento_caixa" type="hidden" id="solicitacao_gravar_fechamento_caixa" value="gravarfechamentocaixa" />
        <input name="datefechamento" type="hidden" id="datefechamento" value="<? echo $data_do_ultimo_registro_de_abertura_de_caixa; ?>" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") && ($fechamentodecaixa=="fechar caixa") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input class='class01' type='submit' name='Submit5' value='Sim'>"; } ?>
      </div>
    </form></td>
    <td>&nbsp;</td>
    <td><div align="center">
      <form action="restaurante/impressao_de_comandas.php" method="post" name="form2" id="form13" target="_blank">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <strong><br>
            </strong>
          <select class="class02" name="comandainicial" id="comandainicial">
            <?
    $sql = "select * from comandas where empresaconveniada = '$ultimo_departamento_trabalhado' order by codigo asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['codigo']."</option>";
    }
?>
          </select>
          ate
          <select class="class02" name="comandafinal" id="comandafinal">
            <?
    $sql = "select * from comandas where empresaconveniada = '$ultimo_departamento_trabalhado' order by codigo desc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['codigo']."</option>";
    }
?>
          </select>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE TRADICAO MINEIRA 2") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input class='class01' type='submit' name='Submit5' value='Imprimir'>"; } ?>
        </div>
      </form>
    </div></td>
  </tr>
</table>
</body>
</html>