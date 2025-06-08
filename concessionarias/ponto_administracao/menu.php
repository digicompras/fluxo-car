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

      <td colspan="3"><?

//require("conect/conect.php"); or die("erro na requisição");

require '../../conect/conect.php';

error_reporting(E_ALL);
error_reporting(E_ALL ^ E_NOTICE);


?> 

<?
$dia = $_POST['dia'];

$mes = $_POST['mes'];

$ano = $_POST['ano'];

$ano_atual = date('Y');


if(empty($ano)){
	
$ano_para_lancamento = $ano_atual;

}
else{
	
$ano_para_lancamento = $ano;
	
}



$ano_anterior = bcsub($ano_atual,1);

$ano_posterior = bcadd($ano_atual,1);

$mes_atual = date('m');

$mes_ano = date('m-Y');






$operador = $_POST['operador'];

if(empty($operador)){
	
$qual_operador = "Todos";

}
else{
	
$qual_operador = $operador;
	
}



$dia_semana = $_POST['dia_semana'];

$tipo_lancamento = $_POST['tipo_lancamento'];




$mes_ano = "$mes-$ano";

$data = "$dia-$mes-$ano";

$date = "$ano-$mes-$dia";

?>
                   </td>
    </tr>

    <tr>

      <td width="22%">&nbsp;</td>

      <td colspan="2"><strong><font color="#0000FF" size="4">Administra&ccedil;&atilde;o de  cart&otilde;es de ponto?</font></strong></td>
    </tr>

    <tr>

      <td><form action="../index.php" method="post" name="form1" target="navegacao">
        <input class='class01' type="submit" name="Submit" value="Voltar ao menu principal">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      </form></td>

      <td colspan="2">&nbsp;</td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td width="32%"><form name="form3" method="post" action="listar_cartao_de_ponto_todos_funcionarios.php">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <strong><font color="#0000FF">
        <select class='class02' name="mes_ano" id="mes_ano">
          <?

    $sql = "select * from ponto group by mes_ano order by date desc limit 60";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_ano']."</option>";

    }

?>
                </select>
        </font></strong> mm-aa<strong><font color="#0000FF">
<select class='class02' name="date" id="select6">
  
  <?

    $sql = "select * from ponto group by date order by date desc limit 750";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['date']."</option>";

    }

?>
</select>
</font></strong>
<input class='class01' type="submit" name="Submit4" value="Visualizar cart&atilde;o de ponto">
      </form></td>
      <td width="46%"><form action="selecione_funcionario_para_editar_cartao_ponto.php" method="post" name="form2">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class='class01' type="submit" name="Submit2" value="Editar cart&atilde;o de ponto">
      </form></td>
    </tr>
    <tr>

      <td><div align="center"></div></td> 

      <td colspan="2">&nbsp;</td>
    </tr>
  </table>

<form action="menu.php" method="post" name="form5" target="navegacao">
    <table width="70%" border="0" align="center">
      <tr>
        <td width="23%"><div align="center">Funcionario</div></td>
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
          <select class='class02' name="operador" id="operador">
            <option selected><? echo $qual_operador; ?></option>
            <?

    $sql = "select * from operadores where regimecontratacao = 'CLT' order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";

    }

?>
          </select>
        </div></td>
        <td><div align="center">
          <select class='class02' name="dia" id="dia">
            <option selected><? echo $dia; ?></option>
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
          <select class='class02' name="mes" id="mes">
            <option selected><? echo $mes; ?></option>
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
          <select class='class02' name="ano" id="ano">
            <?
		
		 $ano_atual = date('Y'); 
		
		 
		 ?>
            <option>
            <? $ano_anterior = bcsub($ano_atual,1); echo $ano_anterior; ?>
            </option>
            <option selected><? echo $ano_para_lancamento; ?></option>
            <option>
            <? $ano_posterior = bcadd($ano_atual,1); echo $ano_posterior; ?>
            </option>
          </select>
        </div></td>
        <td><div align="center">
          <select class='class02' name="dia_semana" id="select4">
            <option selected><? echo $dia_semana; ?></option>
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
          <select class='class02' name="tipo_lancamento" id="tipo_lancamento">
            <option selected></option>
            <option>DSR</option>
            <option>FERIADO</option>
          </select>
          </div></td>
        <td><div align="center">
          <input class='class01' type="submit" name="button" id="button" value="Efetuar Lan&ccedil;amentos">
        </div></td>
      </tr>
    </table>
</form>
<p>&nbsp; </p>

<table width="100%"  border="0">

  <?
  



if($operador=="Todos"){
	
$sql = "SELECT * FROM operadores where status = 'Ativo' order by nome asc";

}
else{
	
$sql = "SELECT * FROM operadores where nome = '$operador' and status = 'Ativo' limit 1";
	
}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$registros = mysql_num_rows($res);

			
$nome_operador = $linha[1];
$estab_pertence = $linha[44];




$sql2 = "SELECT * FROM ponto where nome = '$nome_operador' and date = '$date' order by nome asc";

$res2 = mysql_query($sql2);

while($linha=mysql_fetch_row($res2)) {

$registros2 = mysql_num_rows($res2);





$codigo = $linha[0];





}

?>


<?

if($registros2==0){

$comando = "insert into ponto(nome,data,ent_m,sai_m,ent_t,sai_t,mes_ano,dia_semana,date,dia,mes,ano,estab_pertence) values('$nome_operador','$data','$tipo_lancamento','$tipo_lancamento','$tipo_lancamento','$tipo_lancamento','$mes_ano','$dia_semana','$date','$dia','$mes','$ano','$estab_pertence')";

mysql_query($comando,$conexao) or die("Erro ao lançar ponto!<br><br> Tente novamente!");


}
else{
	
echo "ATENÇÃO!!!...Lançamento na data $dia-$mes-$ano para o funcionario $operador já existe no sistema!";
	
}
?>		

        

          

<tr>

          <? echo $nome_operador; ?> - <? echo $date; ?> - <? echo $dia_semana; ?> ------>  <? echo $ent_m; ?> | <? echo $sai_m; ?> | <? echo $ent_t; ?> | <? echo $sai_t; ?> <br><br>

  </tr>







<? } ?>

		  

	<? //echo $registros; ?>	  

</table>


</body>

</html>

