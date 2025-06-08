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

<style type="text/css">

<!--

.style1 {	color: #0000FF;

	font-weight: bold;

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



<?



require '../../../conect/conect.php';

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$hoje = date('d-m-Y');

	



		

$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); } ?>"



<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="../background/<? printf("$linha[1]"); } ?>" bgproperties="fixed">

  

  <table width="96%" border="0" cellspacing="10">

    <tr>

      <td colspan="3"><?

error_reporting(E_ALL);



?>





<?

$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estabelecimento_op = $linha[24];

$cidade_estabelecimento_op = $linha[25];

$tel_estabelecimento_op = $linha[26];

$email_estabelecimento_op = $linha[27];

$funcao = $linha[43];

$estab_pertence_op = $linha[44];

$cidade_estab_pertence_op = $linha[45];

$tel_estab_pertence_op = $linha[46];

$email_estab_pertence_op = $linha[47];

}





?>



<?

$sql = "SELECT * FROM cx_entradas where datacadastro = '$hoje'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$datacadastro = $linha[3];

}





?>









      </td>

    </tr>

    <tr>

      <td colspan="3"><strong><font color="#0000FF" size="4">O que deseja fazer no caixa <span class="style1"><? echo $nome_op; ?></span> ?</font></strong></td>

    </tr>

    <tr>

      <td><form name="form1" method="post" action="../principal.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit22" value="Voltar ao menu principal">

      </form></td>

      <td><?
$codigo = $_POST['codigo'];

if(empty($codigo)){

}
else{
	
$sql = "SELECT * FROM cx_entradas where codigo = '$codigo'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$cpf = $linha[32];
$num_fatura = $linha[33];
$cod_contas_a_receber = $linha[34];
$num_mensalidade = $linha[35];
$num_orcamento = $linha[36];
}

$sql2 = "SELECT * FROM contas_a_receber where codigo = '$cod_contas_a_receber' and num_fatura = '$num_fatura' and codigo_orcamento = '$num_orcamento' and num_mensalidade = '$num_mensalidade'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {


$cod_contas_a_receber_a_estornar = $linha[0];

}


$sql3 = "select * from db";

$res3 = mysql_query($sql3);

while($linha=mysql_fetch_row($res3)) {





$comando = "update `$linha[1]`.`contas_a_receber` set `codigo` = '$cod_contas_a_receber_a_estornar',`quitacao`= 'Em Aberto' where `contas_a_receber`. `codigo` = '$cod_contas_a_receber_a_estornar' limit 1 ";

}



mysql_query($comando,$conexao);


	

$comando = "delete from `cx_entradas` where `cx_entradas`. `codigo` = '$codigo' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao excluir entrada de caixa!"); 

 echo "Entrada de caixa exclu&iacute;da com sucesso!!!...";
 
 }
 
  ?></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><form action="abertura_de_caixa.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if(mysql_num_rows($res)==0){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>

      </form></td>

      <td><form action="../pagar/re_imprimir_pagar.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if($funcao=="Administrativo_Geral"){

		echo "Informe o N&ordm; do 7.1<br>";

		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';

        echo'<input type="submit" name="Submit2" value="Re-Imprimir Saidas">';

		}

?>

            </form></td>

      <td><form action="../receber/re_imprimir_receber.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if($funcao=="Administrativo_Geral"){

		echo "Informe o N&ordm; do 7.1<br>";

		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';

        echo'<input type="submit" name="Submit2" value="Re-Imprimir Entradas">';

		}

?>

            </form></td>

    </tr>

    <tr>

      <td width="31%"><form name="form5" method="post" action="relatorio_mes_e_ano_lojas_sintetico.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <select name="nfantasia" id="select4">

          <option selected></option>

          <?





    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>

        </select>

        <?

if(mysql_num_rows($res)>=1){



  echo '<input name="mes" type="text" id="mes" size="2" maxlength="4">';

  echo '<input name="ano" type="text" id="ano" size="4" maxlength="6">';



  echo'<input type="submit" name="Submit" value="Fechamento Mensal todas Lojas">';

  }

		

		?>

      </form></td>

      <td width="36%"><form action="../pagar/editar_pagar.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if($funcao=="Administrativo_Geral"){

		echo "Informe o Nº do 7.1<br>";

		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';

        echo'<input type="submit" name="Submit2" value="Editar Saidas">';

		}

?>

            </form></td>

      <td width="33%"><form action="../receber/editar_receber.php" method="post" name="form2">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if($funcao=="Administrativo_Geral"){

		echo "Informe o Nº do 7.1<br>";

		echo '<input name="codigo" type="text" id="codigo" size="15" maxlength="10">';

        echo'<input type="submit" name="Submit2" value="Editar Entradas">';

		}

?>

            </form></td>

    </tr>

    <tr>

      <td><form name="form5" method="post" action="../receber/receber.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if(mysql_num_rows($res)>=1){



  echo'<input type="submit" name="Submit" value="Lan&ccedil;amento de entradas">';

  }

		

		?>

      </form></td>

      <td colspan="2" valign="top"><form action="imprimir_caixa_por_data.php" method="post" name="form4" target="_blank">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        

        <?

if(mysql_num_rows($res)>=1){



		echo "Informe a data que deseja<br>";

		echo '<input name="datacadastro" type="text" id="datacadastro" size="15" maxlength="10">';

        echo'<input type="submit" name="Submit32" value="Verifica caixa geral por data">';

		}

		?>

                              </form></td>

    </tr>

    <tr>

      <td><form name="form4" method="post" action="../pagar/pagar.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if(mysql_num_rows($res)>=1){



        echo'<input type="submit" name="Submit3" value="Lan&ccedil;amento de Sa&iacute;das">';

		}

		

		?>

      </form></td>

      <td colspan="2" valign="top"><form action="imprimir_cx_por_loja_por_data.php" method="post" name="form4" target="_blank">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

Informe a loja e a data<br>

        <select name="nfantasia" id="nfantasia">

                          <option selected></option>

                          <?





    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>

        </select>

		<?

if(mysql_num_rows($res)>=1){







		echo '<input name="datacadastro" type="text" id="datacadastro" size="15" maxlength="10">';

        echo'<input type="submit" name="Submit32" value="Verifica caixa por loja e data">';

		}

		?>

            </form></td>

    </tr>

    <tr>

      <td><form name="form4" method="post" action="relatorio_geral_cx_diario.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <?

if(mysql_num_rows($res)>=1){



        echo'<input type="submit" name="Submit32" value="Verifica caixa geral do dia">';

		}

		?>

      </form></td>

      <td colspan="2"><form action="imprimir_cx_mensal_por_loja.php" method="post" name="form4" target="_blank">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>Informe a loja e o m&ecirc;s<br>

        <select name="nfantasia" id="select2">

          <option selected></option>

          <?





    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>

        </select>

        <?

if(mysql_num_rows($res)>=1){







		echo '<input name="mes" type="text" id="mes" size="2" maxlength="2">';

		echo '<input name="ano" type="text" id="ano" size="4" maxlength="4">';

        echo'<input type="submit" name="Submit32" value="Verifica caixa mensal por loja">';

		}

		?>

            </form></td>

    </tr>

    <tr>

      <td><form name="form3" method="post" action="menu.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



$dia_inicial = $_POST['dia_inicial'];

if(empty($dia_inicial)){

$dia_inicial_pesquisado = date('d');

}
else{

$dia_inicial_pesquisado = $dia_inicial;

}


$mes_inicial = $_POST['mes_inicial'];

if(empty($mes_inicial)){

$mes_inicial_pesquisado = date('m');

}
else{

$mes_inicial_pesquisado = $mes_inicial;

}


$ano_inicial = $_POST['ano_inicial'];

if(empty($ano_inicial)){

$ano_inicial_pesquisado = date('Y');

}
else{

$ano_inicial_pesquisado = $ano_inicial;

}




$dia_final = $_POST['dia_final'];

if(empty($dia_final)){

$dia_final_pesquisado = date('d');

}
else{

$dia_final_pesquisado = $dia_final;

}


$mes_final = $_POST['mes_final'];

if(empty($mes_final)){

$mes_final_pesquisado = date('m');

}
else{

$mes_final_pesquisado = $mes_final;

}


$ano_final = $_POST['ano_final'];

if(empty($ano_final)){

$ano_final_pesquisado = date('Y');

}
else{

$ano_final_pesquisado = $ano_final;

}

?>
        <input type="hidden" name="codigo" id="codigo">
        <select name="dia_inicial" id="dia_inicial">
          <option selected><? echo $dia_inicial_pesquisado; ?></option>
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
          <option selected><? echo $mes_inicial_pesquisado; ?></option>
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
          <option>
            <? $ano_anterior = bcsub($ano_inicial_pesquisado,1); echo $ano_anterior; ?>
          </option>
          <option selected><? echo $ano_inicial_pesquisado; ?></option>
          <option>
            <? $ano_posterior = bcadd($ano_inicial_pesquisado,1); echo $ano_posterior; ?>
          </option>
        </select>
        at&eacute;
  <select name="dia_final" id="dia_final">
    <option selected><? echo $dia_final_pesquisado; ?></option>
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
    <option selected><? echo $mes_final_pesquisado; ?></option>
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
    <option>
      <? $ano_anterior = bcsub($ano_final_pesquisado,1); echo $ano_anterior; ?>
      </option>
    <option selected><? echo $ano_final_pesquisado; ?></option>
    <option>
      <? $ano_posterior = bcadd($ano_final_pesquisado,1); echo $ano_posterior; ?>
      </option>
  </select>
  <input type="submit" name="button" id="button" value="Verificar DUPLICIDADE na entrada de caixa">
      </form></td>

      <td colspan="2"><form action="imprimir_cx_por_loja_hoje.php" method="post" name="form4" target="_blank">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        Informe a loja<br>

        <select name="nfantasia" id="select3">

          <option selected></option>

          <?





    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nfantasia']."</option>";

    }

?>

        </select>

        <?

if(mysql_num_rows($res)>=1){





        echo'<input type="submit" name="Submit33" value="Verifica caixa por loja de hoje">';

		}

		?>

                  </form></td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="2">&nbsp;</td>

    </tr>

  </table>

<p>
  <?


$dateinicial = "$ano_inicial_pesquisado-$mes_inicial_pesquisado-$dia_inicial_pesquisado";
			
$datefinal = "$ano_final_pesquisado-$mes_final_pesquisado-$dia_final_pesquisado";







?>
</p>
<table width="100%" border="0">
  <tr>
    <td colspan="7"><div align="center">Verificando duplicidade na entrada de caixa no periodo de <? echo $dateinicial; ?> at&eacute; <? echo $datefinal; ?></div></td>
  </tr>
  <tr>
    <td width="14%"><div align="center">N&ordm;Lan&ccedil;amento</div></td>
    <td width="12%"><div align="center">Valor</div></td>
    <td width="22%"><div align="center">Cliente</div></td>
    <td width="9%"><div align="center">CPF</div></td>
    <td width="18%"><div align="center">Cod Lan&ccedil;amento contas a receber</div></td>
    <td width="13%"><div align="center">Cod lan&ccedil;amento cx entrada</div></td>
    <td width="12%"><div align="center"></div></td>
  </tr>
  <?
$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
  <?

$sql = "SELECT * FROM cx_entradas where datecadastro between '$dateinicial' and '$datefinal' and categoria_conta <> 'Abertura CX' order by codigo asc";
//$sql = "select * from cx_entradas where datecadastro between '$dateinicial' and '$datefinal'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

//$registros = mysql_num_rows($res);





$codigo = $linha[0];
$datacadastro = $linha[20];
$valor = $linha[25];

$nome = $linha[31];
$cpf = $linha[32];

$num_proposta = $linha[33];
$cod_contas_a_receber = $linha[34];
$num_mensalidade = $linha[35];


?>
  <tr>
    <form name="form6" method="post" action="menu.php">
      <td><div align="center">
        <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
        <input name="cod_contas_a_receber_a_estornar" type="hidden" id="cod_contas_a_receber_a_estornar" value="<? echo $cod_contas_a_receber; ?>">
<input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial_pesquisado; ?>">
        <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial_pesquisado; ?>">
        <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial_pesquisado; ?>">
        <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final_pesquisado; ?>">
        <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final_pesquisado; ?>">
        <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final_pesquisado; ?>">
        <input type="submit" name="button2" id="button2" value="<? echo $codigo; ?>">
      </div></td>
      <td><div align="center"><? echo $valor; ?></div></td>
      <td><div align="center"><? echo $nome; ?></div></td>
      <td><div align="center"><? echo $cpf; ?></div></td>
      <td><div align="center"><? echo $cod_contas_a_receber; ?></div></td>
      <td><div align="center"><? echo $codigo; ?></div></td>
      <td><div align="center"></div></td>
    </form>
  </tr>
  <? } ?>
</table>
<p>&nbsp; </p>
<p>&nbsp; </p>

</body>

</html>

