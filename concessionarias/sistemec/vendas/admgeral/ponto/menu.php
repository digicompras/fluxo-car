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

      <td colspan="2"><?

//require("conect/conect.php"); or die("erro na requisição");

require '../../conect/conect.php';

error_reporting(E_ALL);



?> 

<?

$ano_atual = date('Y');

$ano_anterior = bcsub($ano_atual,1);

$ano_posterior = bcadd($ano_atual,1);

$mes_atual = date('m');

$mes_ano = date('m-Y');


?>
                   </td>
    </tr>

    <tr>

      <td width="22%">&nbsp;</td>

      <td width="78%"><strong><font color="#0000FF" size="4">Oque deseja fazer com os cart&otilde;es de ponto?</font></strong></td>
    </tr>

    <tr>

      <td><form action="../principal.php" method="post" name="form1" target="_top">
        <input type="submit" name="Submit" value="Voltar ao menu principal">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      </form></td>

      <td>&nbsp;</td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form name="form3" method="post" action="selecione_funcionario_para_gerar_cartao_ponto.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit3" value="Visualizar cart&atilde;o de ponto por Funcion&aacute;rio">

      </form></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><form name="form3" method="post" action="listar_cartao_de_ponto_todos_funcionarios.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="mes_ano" type="text" id="mes_ano" value="<? echo $mes_ano; ?>" size="5" maxlength="7">
mm-aa
<input type="submit" name="Submit4" value="Visualizar cart&atilde;o de ponto de todos Funcion&aacute;rios">
      </form></td>
    </tr>
    <tr>

      <td>&nbsp;</td>

      <td><form action="selecione_funcionario_para_editar_cartao_ponto.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit2" value="Editar cart&atilde;o de ponto">

      </form></td>
    </tr>

    <tr>

      <td><div align="center"></div></td> 

      <td><form name="form4" method="post" action="">
      </form>      </td>
    </tr>
  </table>

<form action="lancamento_de_feriados_e_dsr.php" method="post" name="form5" target="navegacao">
    <table width="70%" border="0" align="center">
      <tr>
        <td width="23%"><div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        Data</div></td>
        <td width="20%"><div align="center">Dia da Semana</div></td>
        <td width="16%"><div align="center">Tipo de Lan&ccedil;amento</div></td>
        <td width="9%"><div align="center"></div></td>
      </tr>
      <tr>
        <td><div align="center">
          <select name="dia" id="dia">
            <option selected></option>
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
          <select name="mes" id="mes">
            <option selected></option>
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
          <select name="ano" id="ano">
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
        </div></td>
        <td><div align="center">
          <select name="dia_semana" id="select4">
            <option selected></option>
            <?





    $sql = "select * from dias_semana order by codigo asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia']."</option>";

    }

?>
          </select>
        </div></td>
        <td><div align="center">
          <select name="tipo_lancamento" id="tipo_lancamento">
            <option selected></option>
            <option>DSR</option>
            <option>FERIADO</option>
          </select>
          </div></td>
        <td><div align="center">
          <input type="submit" name="button" id="button" value="Efetuar Lan&ccedil;amentos">
        </div></td>
      </tr>
    </table>
</form>
<p>&nbsp; </p>

</body>

</html>

