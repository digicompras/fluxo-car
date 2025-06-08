<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

$senha = $_SESSION['senha'];

ini_set('default_charset','UTF8_general_mysql500_ci');
?>
<?

require '../../conect/conect.php';


?>
<?
	
$sql50 = "SELECT * FROM operadores where senha = '$senha' limit 1";
$res50 = mysql_query($sql50);
while($linha=mysql_fetch_row($res50)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];
$classificacao_operador = $linha[88];
	
$cidade_estab_pertence = $linha[15];
	
$funcao = $linha[43];
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
	//$despesas = $linha[56];
	//$veiculos = $linha[57];
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
	$inclui_mais_uma_nf = $linha[78];
	$financeiro = $linha[79];
	$relatoriodecomissao = $linha[80];
	$registrodeoperadores = $linha[81];
	$abrir_e_fechar_cx = $linha[82];
	$editar_produtos = $linha[83];
	$quantitativo_do_item_no_estoque = $linha[84];
	$categoria_despesas = $linha[85];
	$cadastro_de_contas_bancarias = $linha[86];
	$aliquotas_dos_cartoes = $linha[87];
	$retira_itens_do_orcamento = $linha[89];
	$vendas = $linha[90];
	
}
?>
<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
.style1 {font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
.style2 {color: #0000FF;
	font-weight: bold;
}
</style>
</head>



<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
	  ?>	
	
<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="4">        
<?

$conta = $_POST['conta'];

?>


</td>

    </tr>

    <tr>

      <td width="18%">&nbsp;</td>

      <td width="26%"><strong><font color="#0000FF" size="4">O que deseja fazer no CUSTO FIXO?</font></strong></td>
      <td colspan="2"><div align="center">PONTO DE EQUILIBRIO</div></td>

    </tr>

    <tr>

      <td><form name="form1" method="post" action="../index.php">
        <p>
          <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
          <input class='class01' type=image src="../../imagens/botoes/voltar.png" width="50" height="50" name="Submit" value="ESTOQUE DE PE&Ccedil;AS">
          <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
        </p>
      </form></td>

      <td><form name="form2" method="post" action="inserir.php">
        <input class="class01" type="submit" name="Submit2" value="Inserir">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      </form></td>
      <td colspan="2"><div align="center">
        <form name="form5" method="post" action="menu.php">
<?

$dia_inicial1 = $_POST['dia_inicial'];
$dia_inicial2 = "01";
if(empty($dia_inicial1)){

$dia_inicial = $dia_inicial2;
	
}
else{
	
$dia_inicial = $dia_inicial1;
	
}

$mes_inicial1 = $_POST['mes_inicial'];
$mes_inicial2 = date('m');
if(empty($mes_inicial1)){

$mes_inicial = $mes_inicial2;
	
}
else{
	
$mes_inicial = $mes_inicial1;
	
}


$ano_inicial1 = $_POST['ano_inicial'];
$ano_inicial2 = date('Y');
if(empty($ano_inicial1)){

$ano_inicial = $ano_inicial2;
	
}
else{
	
$ano_inicial = $ano_inicial1;
	
}


$dia_final1 = $_POST['dia_final'];
$dia_final2 = 31;
if(empty($dia_final1)){

$dia_final = $dia_final2;
	
}
else{
	
$dia_final = $dia_final1;
	
}


$mes_final1 = $_POST['mes_final'];
$mes_final2 = date('m');
if(empty($mes_final1)){

$mes_final = $mes_final2;
	
}
else{
	
$mes_final = $mes_final1;
	
}


$ano_final1 = $_POST['ano_final'];
$dano_final2 = date('Y');
if(empty($ano_final1)){

$ano_final = $ano_final2;
	
}
else{
	
$ano_final = $ano_final1;
	
}


?>
          Periodo de 
          <select class="class02" name="dia_inicial" id="dia_inicial">
            <option selected> <? echo $dia_inicial; ?> </option>
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
            <option selected> <? echo $mes_inicial; ?> </option>
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
            <?
$ano_atual = date('Y');
?>
          <option>
              <? $ano_anterior = bcsub($ano_atual,1); echo $ano_anterior; ?>
            </option>
            <option selected><? echo $ano_atual; ?></option>
            <option>
              <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
            </option>
          </select> 
          at&eacute; 
          <select class="class02" name="dia_final" id="dia_final">
            <option selected> <? echo $dia_final; ?> </option>
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
          <select class="class02" name="mes_final" id="mes_final">
            <option selected> <? echo $mes_final; ?> </option>
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
            <?
$ano_atual = date('Y');
?>
          <option>
              <? $ano_anterior = bcsub($ano_atual,1); echo $ano_anterior; ?>
            </option>
            <option selected><? echo $ano_atual; ?></option>
            <option>
              <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
            </option>
          </select> 
          <input class="class01" type="submit" name="button" id="button" value="Buscar">
        </form>
      </div></td>

    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>Total Custo Fixo
          <?
    
$sql = "select sum(valor) as totalizacao_custo_fixo from custo_fixo";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_custo_fixo = $linha['totalizacao_custo_fixo'];

echo $total_custo_fixo;

?>
      </strong></div></td>
    </tr>
    <tr>

      <td><div align="center"></div></td> 

      <td>&nbsp;</td>
      <td width="28%" bgcolor="#CCCCCC"><div align="center"><strong>
        Total Receitas 
        <?
    

$date_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$date_final = "$ano_final-$mes_final-$dia_final";
	
	
$sql = "select sum(total) as totalizacao_receitas from orcamentos where loja = '$estab_pertence' and condicao = 'PEDIDO' and status = 'Finalizado' and datefechamento between '$date_inicial' and '$date_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_receitas = $linha['totalizacao_receitas'];

echo "R$ $totalizacao_receitas";

?>
      </strong></div></td>
      <td width="28%" bgcolor="#CCCCCC"><div align="center"><strong>Total CMV  do periodo
          <?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento where loja = '$estab_pertence' and condicao = 'PEDIDO' and status = 'Finalizado' and datafechamento between '$date_inicial' and '$date_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];




echo "R$ $totalizacao_cmv_dos_produtos";

?>
      </strong></div></td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td>&nbsp;</td>
      <td bgcolor="#CCCCCC"><div align="center"><strong>Custo com Cart&atilde;o
          <?
      
$sql = "select sum(custo_com_cartao) as totalizacao_custo_com_cartao from orcamentos where condicao = 'PEDIDO' and status = 'Finalizado' and datafechamento between '$date_inicial' and '$date_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_custo_com_cartao = $linha['totalizacao_custo_com_cartao'];

echo "R$ $totalizacao_custo_com_cartao";


	  
	  ?>
      </strong></div></td>
      <td bgcolor="#CCCCCC"><div align="center"><strong>IMC
          <? 
	  
$imc_etapa1 = bcsub($totalizacao_receitas,$totalizacao_custo_com_cartao,2);

$imc_etapa2 = bcsub($imc_etapa1,$totalizacao_cmv_dos_produtos,2);
		  
$imc_etapa3 = bcsub($imc_etapa2,$totalizacao_comissoes,2);
	  
$imc_etapa4 = bcdiv($imc_etapa3,$totalizacao_receitas,2);

echo "$imc_etapa4%";
	  
	  
	   ?>
      </strong></div></td>

    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center" bgcolor="#CCCCCC"><strong>Total Comissoes  do periodo
          <?
    
$sql = "select sum(comissao) as totalizacao_comissoes from produtos_em_orcamento where loja = '$estab_pertence' and condicao = 'PEDIDO' and status = 'Finalizado' and datafechamento between '$date_inicial' and '$date_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);

$totalizacao_comissoes = $linha['totalizacao_comissoes'];

echo "R$ $totalizacao_comissoes";

?>
      </strong></td>
      <td bgcolor="#CCCCCC">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2" bgcolor="#CCCCCC"><div align="center"><strong>P.E. Monet&aacute;rio
          <?
      

$ponto_de_equilibrio = bcdiv($total_custo_fixo,$imc_etapa4,2);



echo "R$ $ponto_de_equilibrio";

	  
	  ?>
      </strong></div>        <div align="center"></div></td>
    </tr>

  </table>

<table width="100%"  border="1" cellspacing="0">
    <tr>
      <td colspan="8"><div align="center"> <strong>
        <?

if(empty($nome_produto)) {

$sql = "select * from custo_fixo order by conta";

}else{	  

$sql = "select * from custo_fixo where conta like '$conta%' order by conta asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$contas_encontradas = mysql_num_rows($res);


}

echo "	$contas_encontradas contas encontradas!!!... Digite o nome da conta ou parte dela na caixa acima e clique em buscar para executar uma pesquisa por nome da conta.";

?>
      </strong></div></td>
  </tr>
    <tr>
      <td colspan="4"><form name="form5" method="post" action="menu.php">
        <span class="style1">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>Nome Conta:
        </span>
        <input class="class02" name="conta" type="text" id="conta" value="<? echo $conta; ?>" size="40">
        <input class="class01" type="submit" name="button2" id="button2" value="Buscar">
        <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
        <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
        <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
        <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
        <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
        <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
      </form></td>
      <td>&nbsp;</td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
    </tr>
    <tr>
      <td><div align="center">Conta</div></td>
      <td><div align="center" class="style2">Categoria</div></td>
      <td><div align="center" class="style2">Valor</div></td>
      <td><div align="center" class="style2">Vencto</div></td>
      <td><div align="center" class="style2">Historico</div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center" class="style2"></div></td>
    </tr>
    <?
if(empty($conta)) {

$sql = "select * from custo_fixo order by conta asc";

}else{	  

$sql = "select * from custo_fixo where conta like '$conta%' order by conta asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$contas_encontradas = mysql_num_rows($res);


$codigo = $linha[0];
$conta = $linha[1];
$categoria = $linha[2];
$valor = $linha[3];
$vencto = $linha[4];
$historico = $linha[9];

?>
    <tr>
      <td width="14%"><div align="center"><? echo $conta; ?></div></td>
      <td width="16%"><div align="center"><? echo $categoria; ?></div></td>
      <td width="13%"><div align="center"> <? echo $valor; ?> </div></td>
      <td width="8%"><div align="center"><? echo $vencto; ?></div></td>
      <td width="29%"><div align="center"><? echo $historico; ?></div></td>
      <td width="10%"><div align="center"></div></td>
      <td width="10%"><div align="center">
        <form name="form6" method="post" action="editar.php">
          <div align="center">
            <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
            <input class="class01" type="submit" name="Submit6" value="Editar">
          </div>
        </form>
      </div></td>
      <td width="10%"><div align="center">
        <form name="form6" method="post" action="excluir.php">
          <div align="center">
            <input name="codigo" type="hidden" id="codigo3" value="<? echo $codigo; ?>">
            <input class="class01" type="submit" name="Submit7" value="Excluir">
          </div>
        </form>
      </div></td>
    </tr>
    <? } ?>
</table>
<p>&nbsp;</p>

</body>

</html>

