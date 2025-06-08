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

<form name="form1" method="post" action="menu.php">

  <input type="submit" name="Submit3" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form>

<form action="gravar.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="6">        <?

require '../../conect/conect.php';

?>



</td>

    </tr>

    <tr>

      <td width="11%">&nbsp;</td>

      <td colspan="5"><strong><font color="#0000FF" size="4">Tela de cadastro de conta de custo fixo</font></strong></td>

    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>Conta</td>
      <td>Categoria</td>
      <td>Data Vencimento</td>
      <td>Valor</td>
      <td>&nbsp;</td>
    </tr>
    <tr>

      <td><strong><font color="#0000FF">Conta:</font></strong></td>

      <td width="26%"><input name="conta" type="text" id="conta" size="50" maxlength="50"></td>
      <td width="14%"><select name="categoria" id="select">
        <option selected>Selecione</option>
        <?


    $sql = "select * from categorias_despesas order by categoria asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>";
    }
?>
      </select></td>
      <td width="17%"><select name="dia_vencto" id="dia_vencto">
        <option selected><?  ?></option>
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
          <option selected><?  ?></option>
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
          <option selected><? echo $ano_atual; ?></option>
          <option>
            <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
          </option>
      </select></td>
      <td width="13%"><input type="text" name="valor" id="valor"></td>
      <td width="19%">&nbsp;</td>

    </tr>

    <tr> 

      <td>&nbsp;</td>

      <td colspan="5"><input type="submit" name="Submit" value="Gravar">

      <input type="reset" name="Submit2" value="Limpar"></td>

    </tr>

    <tr> 

      <td>&nbsp;</td>

      <td colspan="5">&nbsp;</td>

    </tr>

  </table>

</form>

<?


$sql = "select * from custo_fixo order by conta";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg = 0;

$codigo = $linha[0];
$conta = $linha[1];
$categoria = $linha[2];
$valor = $linha[3];
$vencto = $linha[4];



echo "<tr>";

//while($linha=mysql_fetch_row($res)) {

$reg++;

?>

<td>

<br>

<span class="style1">Código:</span> <? echo $codigo; ?>

<span class="style1">Conta:</span> <? echo $conta; ?>

<span class="style1">Categoria:</span> <? echo $categoria; ?>

<span class="style1">Valor:</span> <? echo $valor; ?>

<span class="style1">Vencto:</span> <? echo $vencto; ?>


</td>

<?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>



<? } ?>



<p>&nbsp; </p>

</body>



</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>



