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

<title>Contas a Pagar</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style1 {

	color: #FF0000;

	font-weight: bold;

	font-size: 24px;

}

.style2 {color: #0000FF}

.style3 {color: #FF0000}

.style4 {font-size: 18px}

-->

</style></head>



<?



require '../../../conect/conect.php';



			

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>"



background="../background/<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" bgproperties="fixed" marginwidth="0" marginheight="0" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>>

  

<? } ?>



<?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estab_pertence_op = $linha[44];

$cidade_estab_pertence_op = $linha[45];

$tel_estab_pertence_op = $linha[46];

$email_estab_pertence_op = $linha[47];

}





?>














<p align="center" class="style1">Aten&ccedil;&atilde;o! <span class="style2">

  <? echo $nome_op; ?> 

<span class="style3">... <span class="style4">Voc&ecirc; est&aacute; registrando uma obriga&ccedil;&atilde;o no contas a pagar..... </span></span></span></p>

<p align="center" class="style1"><span class="style2"><span class="style3"><span class="style4">Verifique atentamente se os dados est&atilde;o corretos e fa&ccedil;a as observa&ccedil;&otilde;es necess&aacute;rias!

</span></span></span></p>

<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit2" value="Voltar">

</form>

<form name="form2" method="post" action="grava_contas_a_pagar.php">

  <table width="100%"  border="0">

    <tr>

      <td width="20%">Empresa</td>

      <td width="26%"><select name="empresa" id="select6">
        
        <option selected></option>
        
        <?





    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
        
      </select></td>

      <td width="15%">&nbsp;</td>

      <td width="35%">&nbsp;</td>

    </tr>

    <tr>
      <td>Data do Evento</td>
      <td><select name="dia_evento" id="dia_evento">
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
        <select name="mes_evento" id="mes_evento">
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
        <select name="ano_evento" id="ano_evento">
          <?
		
		 $ano_atual = date('Y'); 
		
		 
		 ?>
          <option selected></option>
          <option>
            <? $ano_anterior = bcsub($ano_atual,1); echo $ano_anterior; ?>
          </option>
          <option><? echo $ano_atual; ?></option>
          <option>
            <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
          </option>
      </select></td>
      <td>Horario do Evento</td>
      <td><select name="hora_evento" id="hora_evento">
        <option selected></option>
        <option>00</option>
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
      </select>
        <select name="minuto_evento" id="minuto_evento">
        <option selected></option>
          <option>00</option>
          <option>05</option>
          <option>10</option>
          <option>15</option>
          <option>20</option>
          <option>25</option>
          <option>30</option>
          <option>35</option>
          <option>40</option>
          <option>45</option>
          <option>50</option>
          <option>55</option>
      </select>
        <select name="segundo_evento" id="segundo_evento">
        <option selected></option>
          <option>00</option>
          <option>05</option>
          <option>10</option>
          <option>15</option>
          <option>20</option>
          <option>25</option>
          <option>30</option>
          <option>35</option>
          <option>40</option>
          <option>45</option>
          <option>50</option>
          <option>55</option>
      </select></td>
    </tr>
    <tr>
      <td>Categoria despesa</td>
      <td><select name="categoria_conta" id="categoria_conta">
        <option selected></option>
        <?





    $sql = "select * from categorias_despesas order by categoria asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['categoria']."</option>";

    }

?>
      </select></td>
      <td>Departamento</td>
      <td><select name="departamento" id="departamento">
        <option selected><? echo $departamento; ?></option>
        <?


    $sql = "select * from departamentos where qualificacao = 'D' order by departamento asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['departamento']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr>

      <td>Valor</td>

      <td><input name="valor" type="text" id="valor"></td>

      <td>Fornecedor</td>

      <td><select name="fornecedor" id="fornecedor">
        <option selected></option>
        <?





    $sql = "select * from fornecedores order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>
      </select></td>

    </tr>

    <tr>

      <td>Historico</td>

      <td rowspan="4"><textarea name="historico" cols="40" rows="6" id="historico"></textarea>      </td>

      <td valign="top">Modo Pagto </td>

      <td valign="top"><select name="modopagto" id="modopagto">

        <option selected></option>

        <?





    $sql = "select * from modo_pagto order by modopagto asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['modopagto']."</option>";

    }

?>

      </select></td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td valign="top">N&ordm; Cheque </td>

      <td valign="top"><input name="num_cheque" type="text" id="num_cheque"></td>

    </tr>

    <tr>

      <td rowspan="2">&nbsp;</td>

      <td valign="top">Banco</td>

      <td valign="top"><select name="banco" id="banco">
        <option selected></option>
        <?





    $sql = "select * from contas_bancarias group by banco order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }

?>
      </select></td>

    </tr>

    <tr>

      <td valign="top">Conta</td>

      <td valign="top"><select name="contacorrente" id="contacorrente">
        <option selected></option>
        <?





    $sql = "select * from contas_bancarias order by contacorrente asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['contacorrente']."</option>";

    }

?>
      </select></td>

    </tr>

    <tr>

      <td colspan="2">        <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>">

        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">

        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">

        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>">

        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>">

        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>">

        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>">

      <input type="submit" name="Submit" value="Salvar"></td>

      <td>Vencimento</td>

      <td><select name="dia_vencto" id="dia_vencto">
        <option selected>01</option>
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
          <option selected>01</option>
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

    </tr>

  </table>

</form>

<p>&nbsp;</p>

<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>