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

<title>Edi&ccedil;&atilde;o de produtos</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style1 {font-weight: bold}

.style2 {

	color: #0000FF;

	font-weight: bold;

	font-size: 24px;

}

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style>

</head>



<body>

<p>        <?

require '../../conect/conect.php';

?>



</p>

<p class="style2">Altera&ccedil;&atilde;o de conta de custo fixo</p>

<form name="form1" method="post" action="menu.php">

  <input type="submit" name="Submit3" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form>

<form action="autalizar.php" method="post" name="form2">

  <table width="100%"  border="0">

        <tr>

          <td width="4%">

<?



$codigo = $_POST['codigo'];



$sql = "select * from custo_fixo where codigo = '$codigo'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$conta = $linha[1];
$categoria = $linha[2];
$valor = $linha[3];
$vencto = $linha[4];

$dia_vencto = $linha[5];
$mes_vencto = $linha[6];
$ano_vencto = $linha[7];


echo "<tr>";

//while($linha=mysql_fetch_row($res)) {

$reg++;

?>		  </td>

          <td width="25%"><input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>"></td>

          <td colspan="3">&nbsp;</td>
        </tr>

        <tr>
          <td height="40">&nbsp;</td>
          <td>Conta</td>
          <td width="16%">Categoria</td>
          <td width="19%">Data Vencto</td>
          <td width="36%">Valor</td>
        </tr>
        <tr>

          <td height="40">&nbsp;</td>
          <td><input name="conta" type="text" id="conta" value="<? echo $conta; ?>" size="50" maxlength="50"></td>
          <td><select name="categoria" id="select">
            <option selected><? echo $categoria; ?></option>
            <?


    $sql = "select * from categorias_despesas order by categoria asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>";
    }
?>
          </select></td>
          <td><select name="dia_vencto" id="dia_vencto">
            <option selected>
              <? echo $dia_vencto; ?>
            </option>
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
            <select name="mes_vencto" id="mes_vencto">
              <option selected>
                <? echo $mes_vencto; ?>
              </option>
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
            <select name="ano_vencto" id="ano_vencto">
              <?
$ano_atual = date('Y');
?>
              <option>
                <? $ano_anterior = bcsub($ano_atual,1); echo $ano_anterior; ?>
              </option>
              <option selected><? echo $ano_vencto; ?></option>
              <option>
                <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
              </option>
            </select></td>
          <td><input name="valor" type="text" id="valor" value="<? echo $valor; ?>"></td>
        </tr>
        <tr>
          <td height="40">&nbsp;</td>
          <td>&nbsp;</td>
          <td colspan="3"><input type="submit" name="Submit2" value="Atualizar"></td>
        </tr>

		          <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>



          <? } ?>
  </table>

</form>

</option>

          </select></td>

          <td width="25%">&nbsp;</td>

        </tr>

        <tr>

        </tr>

  </table>

</form>
<p>&nbsp;</p>

</body>

</html>

