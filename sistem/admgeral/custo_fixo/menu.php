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

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="3">        <?

require '../../conect/conect.php';

?>



</td>

    </tr>

    <tr>

      <td width="18%">&nbsp;</td>

      <td width="26%"><strong><font color="#0000FF" size="4">O que deseja fazer no CUSTO FIXO?</font></strong></td>
      <td width="56%"><div align="center">PONTO DE EQUILIBRIO</div></td>

    </tr>

    <tr>

      <td><form action="../principal.php" method="post" name="form1" target="_top">

        <input type="submit" name="Submit" value="Voltar ao menu principal">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      </form></td>

      <td>Total Custo Fixo 
      <?
    
$sql = "select sum(valor) as totalizacao_custo_fixo from custo_fixo";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$total_custo_fixo = $linha['totalizacao_custo_fixo'];

echo $total_custo_fixo;

?></td>
      <td><div align="center">
        <form name="form5" method="post" action="menu.php">
<?

$dia_inicial = $_POST['dia_inicial'];
$mes_inicial = $_POST['mes_inicial'];
$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];
$mes_final = $_POST['mes_final'];
$ano_final = $_POST['ano_final'];

?>
          Periodo de 
          <select name="dia_inicial" id="dia_inicial">
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
          <select name="mes_inicial" id="mes_inicial">
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
          <select name="ano_inicial" id="ano_inicial">
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
          <select name="dia_final" id="dia_final">
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
          <select name="mes_final" id="mes_final">
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
          <select name="ano_final" id="ano_final">
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
          <input type="submit" name="button" id="button" value="Buscar">
        </form>
      </div></td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form name="form2" method="post" action="inserir.php">

        <input type="submit" name="Submit2" value="Inserir Conta">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      </form></td>
      <td><div align="center">
        Total Receitas 
        <?
    

$date_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$date_final = "$ano_final-$mes_final-$dia_final";
	
	
$sql = "select sum(total_geral) as totalizacao_receitas from orcamentos where condicao = 'PEDIDO' and status = 'Finalizado' and datafechamento between '$date_inicial' and '$date_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_receitas = $linha['totalizacao_receitas'];

echo "R$ $totalizacao_receitas";

?>
      </div></td>

    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form name="form3" method="post" action="selecione_codigo_para_edicao.php">

        <input type="submit" name="Submit3" value="Editar Conta">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      </form></td>
      <td><div align="center">
        
        Total CMV  do periodo
<?
    
$sql = "select sum(totalizacao_cmv) as totalizacao_cmv_dos_produtos from produtos_em_orcamento where condicao = 'PEDIDO' and status = 'Finalizado' and datafechamento between '$date_inicial' and '$date_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_cmv_dos_produtos = $linha['totalizacao_cmv_dos_produtos'];




echo "R$ $totalizacao_cmv_dos_produtos";

?>
      </div></td>

    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><form name="form4" method="post" action="selecione_codigo_exclusao.php">
        <input type="submit" name="Submit4" value="Excluir Conta">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      </form></td>
      <td><div align="center">
        Custo com Cart&atilde;o <?
      
$sql = "select sum(custo_com_cartao) as totalizacao_custo_com_cartao from orcamentos where condicao = 'PEDIDO' and status = 'Finalizado' and datafechamento between '$date_inicial' and '$date_final'";

$resultado=mysql_query($sql, $conexao);

$linha=mysql_fetch_array($resultado);


$totalizacao_custo_com_cartao = $linha['totalizacao_custo_com_cartao'];

echo "R$ $totalizacao_custo_com_cartao";


	  
	  ?>
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="center">IMC
          <? 
	  
$imc_etapa1 = bcsub($totalizacao_receitas,$totalizacao_custo_com_cartao,2);


$imc_etapa2 = bcsub($imc_etapa1,$totalizacao_cmv_dos_produtos,2);
	  
$imc_etapa3 = bcdiv($imc_etapa2,$totalizacao_receitas,2);

echo "$imc_etapa3%";
	  
	  
	   ?>
      </div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><div align="center">
        P.E. Monet&aacute;rio <?
      

$ponto_de_equilibrio = bcdiv($total_custo_fixo,$imc_etapa3,2);



echo "R$ $ponto_de_equilibrio";

	  
	  ?>
      </div></td>
    </tr>
    <tr>

      <td><div align="center"></div></td> 

      <td>&nbsp;</td>
      <td><div align="center"></div></td>

    </tr>

  </table>

<p>&nbsp;</p>

</body>

</html>

