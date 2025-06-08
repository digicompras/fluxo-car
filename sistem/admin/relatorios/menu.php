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

<title>Relat&oacute;rio de Produ&ccedil;&atilde;o</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style></head>



<body>

<p><?


require '../../conect/conect.php';

error_reporting(E_ALL);



$dia = date('d');

$mes = date('m');

$ano = date('Y');



$solicitacao = $_POST['solicitacao'];
$comissao = $_POST['comissao'];



?>
</p>

<table width="100%" border="0">
  <tr>
    <td width="22%"><form name="form3" method="post" action="menu.php">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "relatorio por tipo de propostas e status"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="button" id="button" value="Relat&oacute;rio por tipo de propostas e Status">
        </div>
    </form>    </td>
    <td width="17%"><form name="form3" method="post" action="menu.php">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "relatorio geral por status"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="button2" id="button2" value="Relat&oacute;rio geral por Status">
        </div>
    </form></td>
    <td width="18%"><form name="form3" method="post" action="menu.php">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "relatorio pago ao cliente sintetico"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="button3" id="button3" value="Relat&oacute;rio Pago ao cliente sint&eacute;tico">
        </div>
    </form></td>
    <td width="25%"><form name="form3" method="post" action="menu.php">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "relatorio de pedidos de possibilidades"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="button4" id="button4" value="Relat&oacute;rio de pedidos de possibilidades">
        </div>
    </form></td>
    <td width="18%"><form name="form3" method="post" action="menu.php">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "relatorio por operador sintetico"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="button5" id="button5" value="Relat&oacute;rio por operador sintetico">
        </div>
    </form></td>
  </tr>
  <tr>
    <td><form name="form3" method="post" action="menu.php">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "verificar producao diaria do operador"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="button6" id="button6" value="Relat&oacute;rio produ&ccedil;&atilde;o di&aacute;ria por operador ">
        </div>
    </form></td>
    <td><form name="form3" method="post" action="menu.php">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "verificar producao diaria geral"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="button7" id="button7" value="Relat&oacute;rio produ&ccedil;&atilde;o di&aacute;ria geral">
        </div>
    </form></td>
    <td><form name="form3" method="post" action="menu.php">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "verificar producao periodica geral"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="button8" id="button8" value="Relat&oacute;rio produ&ccedil;&atilde;o peri&oacute;dica geral">
        </div>
    </form></td>
    <td><form name="form3" method="post" action="menu.php">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "relatorio de producao mensal por bco de operacao"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="button9" id="button9" value="Relat&oacute;rio de produ&ccedil;&atilde;o mensal por bco de opera&ccedil;&atilde;o">
        </div>
    </form></td>
    <td><form action="menu.php" method="post" name="form3" target="navegacao">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "perguntas das propostas"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="button11" id="button13" value="Relat&oacute;rio perguntas das propostas">
        </div>
    </form></td>
  </tr>
  <tr>
    <td><form name="form3" method="post" action="menu.php">
      <div align="center">
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "propostas pendentes por operador"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="button12" id="button11" value="Relat&oacute;rio propostas pendentes por operador">
        </div>
    </form></td>
    <td><form action="menu.php" method="post" name="form15" target="navegacao">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "cupons"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="Submit2" value="CUPONS">
        </div>
    </form></td>
    <td><form action="menu.php" method="post" name="form15" target="navegacao">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "comissoes da empresa"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="Submit16" value="Comiss&otilde;es da empresa">
        </div>
    </form></td>
    <td><form action="menu.php" method="post" name="form15" target="navegacao">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "pagtos ao cliente"; ?>">
        <input type="hidden" name="comissao" id="comissao">
        <input type="submit" name="Submit" value="Pagtos ao cliente">
        </div>
    </form></td>
    <td><div align="center">
      <form action="menu.php" method="post" name="form15" target="navegacao">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alteracao de clientes"; ?>">
          <input type="hidden" name="comissao" id="comissao">
          <input type="submit" name="Submit3" value="Relat&oacute;rio de Altera&ccedil;&atilde;o de Clientes">
        </div>
      </form>
    </div></td>
  </tr>
</table>
<p>
  <?
if($solicitacao=="relatorio por tipo de propostas e status"){
echo "<form action='relatorio_de_producao_periodico_por_tipo_proposta.php' method='post' enctype='multipart/form-data' name='form1'>
  <table width='100%'  border='0'>
    <tr>
      <td colspan='4'><div align='center'><strong>Relat&oacute;rio por tipo de propostas e status</strong></div></td>
    </tr>
    <tr>
      <td><div align='center'>Tipo de Proposta</div></td>
      <td><div align='center'>Status Desejado</div></td>
      <td><div align='center'>Per&iacute;odo Desejado</div></td>
      <td><div align='center'></div></td>
    </tr>
    <tr>
      <td width='34%'><div align='center'>
        <select name='tipo_proposta' id='tipo_proposta'>";
          





    $sql = "select * from tipos_propostas group by tipo_proposta order by tipo_proposta asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['tipo_proposta']."</option>";

    }


        echo "</select>
      </div></td>
      <td width='33%'><div align='center'>
        <select name='status' id='status'>
          
<option>TODOS</option>";




    $sql = "select * from status where status <> 'Aguardando Ativa&ccedil;&atilde;o' order by status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['status']."</option>";

    }


                echo "</select>
      </div></td>
      <td width='33%'>
        De
        <select name='dia_inicial' id='dia_inicial'>";
          





    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


                echo "</select>
        <select name='mes_inicial' id='mes_inicial'>
          <option selected>";
              echo "$mes";  
          echo "</option>";
          





    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


        echo "</select>
        <select name='ano_inicial' id='ano_inicial'>
          <option selected>";
              echo "$ano"; 
          echo "</option>";
          





    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


        echo "</select>
at&eacute;
<select name='dia_final' id='dia_final'>";
  





    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


echo "</select>
<select name='mes_final' id='mes_final'>
  <option selected>";
  echo "$mes"; 
  echo "</option>";
  





    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


echo "</select>
<select name='ano_final' id='ano_final'>
  <option selected>";
  echo "$ano"; 
  echo "</option>";






    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


echo "</select>      </td>
      <td width='33%'>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='3'>";
	  

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


          echo "<input type='submit' name='Submit3' value='Gerar Relatorio'>      </td>
    </tr>
  </table>
</form>";

}

?>
</p>
<p>

<?
if($solicitacao=="relatorio geral por status"){

echo "<form action='relatorio_de_producao_periodico_por_status.php' method='post' enctype='multipart/form-data' name='form1' target='_blank'>
  <table width='100%'  border='0'>
    <tr>
      <td colspan='3'><div align='center'><strong>Relat&oacute;rio geral por status</strong></div></td>
    </tr>
    <tr>
      <td width='20%'>Informe o m&ecirc;s e ano de refer&ecirc;ncia </td>
      <td width='80%' colspan='2'> <select name='status' id='status'>";
        





    $sql = "select * from status where status <> 'Aguardando Ativa&ccedil;&atilde;o' order by status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['status']."</option>";

    }


            echo "</select>
        De
        <select name='dia_inicial' id='dia_inicial'>";
            





    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


                  echo "</select>
          <select name='mes_inicial' id='mes_inicial'>
            <option selected>";
              echo "$mes";
            echo "</option>";
            





    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


          echo "</select>
          <select name='ano_inicial' id='ano_inicial'>
            <option selected>";
            echo "$ano";
            echo "</option>";
            





    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


          echo "</select>
        at&eacute;
        <select name='dia_final' id='dia_final'>";
          





    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


        echo "</select>
        <select name='mes_final' id='mes_final'>
          <option selected>";
              echo "$mes";
          echo "</option>";
          





    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


        echo "</select>
        <select name='ano_final' id='ano_final'>
          <option selected>";
              echo "$ano";
          echo "</option>";
          





    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


        echo "</select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='2'>";
	  

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


          echo "<input type='submit' name='Submit5' value='Relat&oacute;rio de Produ&ccedil;&atilde;o'>
      </td>
    </tr>
  </table>
</form>";

}

?>
<p>
<?
if($solicitacao=="relatorio geral por status"){

echo "<form action='relatorio_de_producao_periodico_por_2status_e_num_proposta.php' method='post' enctype='multipart/form-data' name='form1' target='_blank'>
  <table width='100%'  border='0'>
    <tr>
      <td colspan='3'><div align='center'><strong>Relatório geral por 2 status até o Nº de proposta desejado</strong></div></td>
    </tr>
    <tr>
      <td width='20%'>Informe o periodo de referencia </td>
      <td width='80%' colspan='2'> <select name='status' id='status'>";
        





    $sql = "select * from status order by status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['status']."</option>";

    }


            echo "</select>
			
			<select name='status2' id='status2'>";
        





    $sql = "select * from status order by status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['status']."</option>";

    }


            echo "</select>
			
			 <input type='text' name='num_proposta' id='num_proposta' size='11' maxlength='11'>
			
        De
        <select name='dia_inicial' id='dia_inicial'>";
            





    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


                  echo "</select>
          <select name='mes_inicial' id='mes_inicial'>
            <option selected>";
              echo "$mes";
            echo "</option>";
            





    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


          echo "</select>
          <select name='ano_inicial' id='ano_inicial'>
            <option selected>";
            echo "$ano";
            echo "</option>";
            





    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


          echo "</select>
        at&eacute;
        <select name='dia_final' id='dia_final'>";
          





    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


        echo "</select>
        <select name='mes_final' id='mes_final'>
          <option selected>";
              echo "$mes";
          echo "</option>";
          





    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


        echo "</select>
        <select name='ano_final' id='ano_final'>
          <option selected>";
              echo "$ano";
          echo "</option>";
          





    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


        echo "</select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='2'>";
	  
	  
	  

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


          echo "<input type='submit' name='Submit5' value='Relat&oacute;rio de Produ&ccedil;&atilde;o'>
      </td>
    </tr>
  </table>
</form>";

}

?>
<p>

<?
if($solicitacao=="relatorio pago ao cliente sintetico"){

echo "<form action='relatorio_de_producao_periodico_por_operador_sintetico_novo.php' method='post' enctype='multipart/form-data' name='form1'>
  <table width='100%'  border='0'>
    <tr>
      <td colspan='3'><div align='center'><strong>Relat&oacute;rio pago ao cliente  sint&eacute;tico </strong></div></td>
    </tr>
    <tr>
      <td width='34%'>Informe o m&ecirc;s e ano de refer&ecirc;ncia </td>
      <td width='66%' colspan='2'> De
        <select name='dia_inicial' id='dia_inicial'>";
            


    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


                  echo "</select>
          <select name='mes_inicial' id='mes_inicial'>
            <option selected>";
                echo $mes;
            echo "</option>";
            



    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


          echo "</select>
          <select name='ano_inicial' id='ano_inicial'>
            <option selected>";
                echo $ano;  
            echo "</option>";
            





    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


          echo "</select>
        at&eacute;
        <select name='dia_final' id='dia_final'>";
         





    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


        echo "</select>
        <select name='mes_final' id='mes_final'>
          <option selected>";
              echo $mes;  
          echo "</option>";
          





    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


        echo "</select>
        <select name='ano_final' id='ano_final'>
          <option selected>";
              echo $ano;  
          echo "</option>";
          





    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


        echo "</select>
      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='2'>";
?>	  
<?
$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
<?
          echo "<input type='submit' name='Submit4' value='Relat&oacute;rio de Produ&ccedil;&atilde;o'>
      </td>
    </tr>
  </table>
</form>";

}

?>
<p>

<?

if($solicitacao=="relatorio de pedidos de possibilidades"){

echo "<form action='relatorio_de_possibilidades.php' method='post' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='3'><div align='center'><strong>Relat&oacute;rio de pedidos de possibilidades</strong></div></td>

    </tr>

    <tr>

      <td width='34%'>Informe o m&ecirc;s e ano de refer&ecirc;ncia </td>

      <td width='66%' colspan='2'>

        De

        <select name='dia_inicial' id='select3'>";

          





    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }



        echo "</select>

        <select name='mes_inicial' id='select4'>

		<option selected>$mes</option>";

          

    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }



        echo "</select>

        <select name='ano_inicial' id='select5'>

		<option selected>$ano</option>";
		
        

    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }



        echo "</select> 

        at&eacute; 

        <select name='dia_final' id='select11'>";

          


    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }



        echo "</select>

        <select name='mes_final' id='select12'>

		<option selected>$mes</option>";

          

    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }



        echo "</select>

        <select name='ano_final' id='select13'>

		<option selected>$ano</option>";

          

    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }



        echo "</select>

      </td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan='2'>";
	  ?>
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
<?

          echo "<input type='submit' name='Submit523222' value='Relat&oacute;rio de Possibilidades'>

      </td>

    </tr>

  </table>

</form>";

}

?>
<p>
<?

if($solicitacao=="relatorio por operador sintetico"){

echo "<form action='relatorio_de_producao_periodico_por_operador_sintetico.php' method='post' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='3'><div align='center'><strong>Relat&oacute;rio por operador sint&eacute;tico </strong></div></td>

    </tr>

    <tr>

      <td width='34%'>Informe o m&ecirc;s e ano de refer&ecirc;ncia </td>

      <td width='66%' colspan='2'>        <select name='mes_ano' id='select6'>";

          
    $sql = "select * from propostas group by mes_ano order by num_proposta desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_ano']."</option>";

    }



        echo "</select>

        </td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan='2'>";
	  ?>
<?
$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
<?

          echo "<input type='submit' name='Submit52322' value='Relat&oacute;rio de Produ&ccedil;&atilde;o'>          </td>

    </tr>

  </table>

</form>";

}

?>
<p>
<?

if($solicitacao=="verificar producao diaria do operador"){


echo "<form action='verificar_producao_diaria_operador_e_parceiro_individual.php' method='post' enctype='multipart/form-data' name='form1'>

  <table align='center' width='70%'  border='0'>

    <tr>

      <td colspan='3'><div align='center'><strong>Verificar produ&ccedil;&atilde;o di&aacute;ria do operador </strong></div></td>

    </tr>

    <tr>

      <td>Informe o m&ecirc;s e ano de refer&ecirc;ncia </td>

      <td>

        <select name='dataproposta' id='select14'>";

          

    $sql = "select * from propostas group by dataproposta order by num_proposta desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dataproposta']."</option>";

    }



        echo "</select>

      </td>

      <td><select name='nome_operador' id='select15'>

        <option selected></option>";

        
    $sql = "select * from operadores order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";

    }



      echo "</select></td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan='2'>";
	  ?>
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
<?


          echo "<input type='submit' name='Submit523223' value='Relat&oacute;rio de Produ&ccedil;&atilde;o'>

      </td>

    </tr>

  </table>

</form>";

}

?>
<p>
  <?

if($solicitacao=="verificar producao diaria geral"){


echo "<form name='form2' method='post' action='verificar_producao_diaria_operador_e_parceiro.php'>
  <table width='100%'  border='0'>
    <tr>
      <td colspan='3'><div align='center'><strong>Verificar produ&ccedil;&atilde;o di&aacute;ria GERAL</strong></div></td>
    </tr>
    <tr>
      <td width='34%'>Informe a data de refer&ecirc;ncia</td>
      <td width='20%'><strong><font color='#0000FF'>
        <select name='tipo_proposta' id='tipo_proposta'>
          <option selected>Todos</option>";
          
    $sql = "select * from propostas group by tipo_proposta order by tipo_proposta asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['tipo_proposta']."</option>";

    }


        echo "</select>
      </font></strong></td>
      <td width='46%'><select name='dataproposta' id='dataproposta'>";
        
    $sql = "select * from propostas group by dataproposta order by num_proposta desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dataproposta']."</option>";

    }


            echo "</select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='2'>";
	  ?>
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
  <?

          echo "<input type='submit' name='Submit' value='Relat&oacute;rio de Produ&ccedil;&atilde;o'>      </td>
    </tr>
  </table>
</form>";

}

?>
<p>
<?

if($solicitacao=="verificar producao periodica geral"){


echo "<form action='verificar_producao_periodica_operador_e_parceiro.php' method='post' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='3'><div align='center'><strong>Verificar produ&ccedil;&atilde;o periodica GERAL</strong></div></td>

    </tr>

    <tr>

      <td width='34%'>Informe o m&ecirc;s e ano de refer&ecirc;ncia </td>

      <td width='66%' colspan='2'><strong><font color='#0000FF'>
        <select name='tipo_proposta' id='tipo_proposta'>
          <option selected>Todos</option>";
          
    $sql = "select * from propostas group by tipo_proposta order by tipo_proposta asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['tipo_proposta']."</option>";

    }


        echo "</select>
      </font></strong>De

        <select name='dia_inicial' id='select3'>";

          
    $sql = "select * from propostas group by dia order by dia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia']."</option>";

    }



        echo "</select>

        <select name='mes_inicial' id='select4'>

		<option selected>$mes</option>";

          
    $sql = "select * from propostas  group by mes order by mes asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes']."</option>";

    }



        echo "</select>

        <select name='ano_inicial' id='select5'>

		<option selected>$ano</option>";

          
    $sql = "select * from propostas group by ano order by ano desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano']."</option>";

    }



        echo "</select> 

        at&eacute; 

        <select name='dia_final' id='select11'>";

          
    $sql = "select * from propostas group by dia order by dia desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia']."</option>";

    }



       echo "</select>

        <select name='mes_final' id='select12'>

		<option selected>$mes</option>";

          
    $sql = "select * from propostas group by mes order by mes desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes']."</option>";

    }



        echo "</select>

        <select name='ano_final' id='select13'>

		<option selected>$ano</option>";

          
    $sql = "select * from propostas group by ano order by ano desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano']."</option>";

    }



        echo "</select>

      </td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan='2'>";
	  ?>
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
<?


          echo "<input type='submit' name='Submit523222' value='Relat&oacute;rio de Produ&ccedil;&atilde;o'>

      </td>

    </tr>

  </table>

</form>";

}

?>
<p>
<?

if($solicitacao=="relatorio de producao mensal por bco de operacao"){


echo "<form action='relatorio_de_producao_periodico_por_operador_por_bco_operacao.php' method='post' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='4'><div align='center'><strong>Relatorio de produ&ccedil;&atilde;o mensal por bco de opera&ccedil;&atilde;o</strong></div></td>
    </tr>

    <tr>

      <td width='34%'>Informe o Banco de opera&ccedil;&atilde;o e o opera&ccedil;&atilde;o</td>

      <td width='20%'>

        <select name='banco_operacao' id='select14'>";

          
    $sql = "select * from bco_operacao order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }


        echo "</select>      </td>

      <td width='23%'><select name='nome_operador' id='select15'>

        <option selected></option>";

        
    $sql = "select * from operadores order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";

    }



      echo "</select></td>

      <td width='23%'>&nbsp;</td>
    </tr>

    <tr>
      <td>Informe o m&ecirc;s e ano de refer&ecirc;ncia </td>
      <td colspan='3'><input name='mes_ano' type='text' id='mes_ano' size='7' maxlength='7'>
        mm-aaaa</td>
    </tr>
    <tr>

      <td>&nbsp;</td>

      <td colspan='3'>";
	  ?>
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
<?


          echo "<input type='submit' name='Submit523223' value='Relat&oacute;rio de Produ&ccedil;&atilde;o'>      </td>
    </tr>
  </table>

</form>";

}

?>
<p>
<?

if($solicitacao=="perguntas das propostas"){


echo "<table width='100%' border='0'>
  <tr>
    <td width='28%'>&nbsp;</td>
    <td width='38%'>&nbsp;</td>
    <td width='34%'>&nbsp;</td>
  </tr>
  <tr>
    <td><form action='perguntas.php' method='post' name='form3'>";
	?>
    <?
      

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
<?

      echo "<input name='resposta' type='hidden' id='resposta' value='resposta1'>
      <input name='num_pergunta' type='hidden' id='num_pergunta' value='1'>
      De
      <select name='dia_inicial' id='dia_inicial'>";
        
    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='mes_inicial' id='mes_inicial'>
        <option selected>
          $mes
          </option>";
        
    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='ano_inicial' id='ano_inicial'>
        <option selected>
          $ano
          </option>";
        
    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


      echo "</select>
      at&eacute;
      <select name='dia_final' id='dia_final'>";
        
    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='mes_final' id='mes_final'>
        <option selected>
          $mes
          </option>";
        
    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='ano_final' id='ano_final'>
        <option selected>
          $ano
          </option>";
        
    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


      echo "</select>
      <input type='submit' name='button10' id='button10' value='Podemos passar uma proposta de debito em conta?'>
    </form></td>
	
    <td><form action='perguntas.php' method='post' name='form3'>";
      

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];


      echo "<input name='resposta' type='hidden' id='resposta' value='resposta2'>
      <input name='num_pergunta' type='hidden' id='num_pergunta' value='2'>
      De
      <select name='dia_inicial' id='dia_inicial'>";
        
    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='mes_inicial' id='mes_inicial'>
        <option selected>
          $mes
          </option>";
        
    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='ano_inicial' id='ano_inicial'>
        <option selected>
          $ano
          </option>";
        
    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


      echo "</select>
      at&eacute;
      <select name='dia_final' id='dia_final'>";
        
    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='mes_final' id='mes_final'>
        <option selected>
          $mes
          </option>";
        
    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='ano_final' id='ano_final'>
        <option selected>
          $ano
          </option>";
        
    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


      echo "</select>
      <input name='button10' type='submit' id='button11' value='Podemos tentar uma aprova&ccedil;&atilde;o de proposta de empr&eacute;stimo no carn&ecirc;?'>
    </form></td>
    <td><form action='perguntas.php' method='post' name='form3'>";
	?>
    <?
      

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
<?

      echo "<input name='resposta' type='hidden' id='resposta' value='resposta3'>
      <input name='num_pergunta' type='hidden' id='num_pergunta' value='3'>
      De
      <select name='dia_inicial' id='dia_inicial'>";
        
    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='mes_inicial' id='mes_inicial'>
        <option selected>
          $mes
          </option>";
        
    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='ano_inicial' id='ano_inicial'>
        <option selected>
          $ano
          </option>";
        
    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


      echo "</select>
      at&eacute;
      <select name='dia_final' id='dia_final'>";
        
    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='mes_final' id='mes_final'>
        <option selected>
          $mes
          </option>";
        
    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


      echo "</select>
      <select name='ano_final' id='ano_final'>
        <option selected>
          $ano
          </option>";
        
    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


      echo "</select>
      <input name='button10' type='submit' id='button12' value='Podemos tentar aprova&ccedil;&atilde;o de um cart&atilde;o de credito da bradescar?'>
    </form></td>
  </tr>
</table>";

}

?>
<p>

<?

if($solicitacao=="propostas pendentes por operador"){

echo "<table width='100%' border='0'>
  <tr>
    <td width='30%'>&nbsp;</td>
    <td width='37%'><strong>Relat&oacute;rio de propostas com status pendente por operador</strong></td>
    <td width='10%'>&nbsp;</td>
    <td width='23%'>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form name='form22' method='post' action='propostas_status_fisico_pendente_por_operador.php'>";
	?>
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
      echo "<select name='nome_operador' id='select15'>
        <option selected></option>";
        
    $sql = "select * from operadores order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";

    }


      echo "</select>
      <input type='submit' name='button10' id='button10' value='Gerar relat&oacute;rio'>
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>";

}

?>

<p>
<?
if($solicitacao=="comissoes da empresa"){

echo "<table width=	100%	 border='0'>
  <tr>
    <td width='33%'>&nbsp;</td>
    <td width='34%'><div align='center'><strong>Qual o tipo de relat&oacute;rio pretende gerar? </strong></div></td>
    <td width='33%'>&nbsp;</td>
  </tr>
  <tr>
    <td><form action='menu.php' method='post' enctype='multipart/form-data' name='form1' target='navegacao'>
      <div align='center'>";
	  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
        echo "<input name='solicitacao' type='hidden' id='comissao' value='comissoes da empresa'><input name='comissao' type='hidden' id='comissao' value='a receber'><input type='submit' name='Submit4' value='Comiss&otilde;es a Receber'>
      </div>
    </form></td>
    <td><form action='menu.php' method='post' enctype='multipart/form-data' name='form1' target='navegacao'>
      <div align='center'>";
	  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
        echo "<input name='solicitacao' type='hidden' id='comissao' value='comissoes da empresa'><input name='comissao' type='hidden' id='comissao' value='recebida'><input type='submit' name='Submit' value='Comiss&otilde;es J&aacute; Recebidas'>
        </div>
    </form></td>
    <td>&nbsp;</td>
  </tr>
</table>";

}

?>
<p>
<?
if($comissao=="a receber"){


echo "<form action='relatorio_periodico_por_banco_a_receber.php' method='post' enctype='multipart/form-data' name='form1' target='navegacao'>
  <table width='100%'  border='0'>
    <tr>
	
      <td colspan='3'><span class='style2'>Para gerar o relat&oacute;rio peri&oacute;dico a receber &eacute; necess&aacute;rio informar o Banco a data inicial e a data final do per&iacute;odo que voc&ecirc; deseja! </span></td>
    </tr>
    <tr>
      <td width='35%'>Informe o banco que foi efetuada a opera&ccedil;&atilde;o <br></td>
      <td width='32%'><strong><font color='#0000FF'>
        <select name='bco_operacao' id='bco_operacao'>
          <option selected>Todos</option>";
          
    $sql = "select * from bco_operacao order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }


        echo "</select>
      </font></strong></td>
      <td width='33%'>&nbsp;</td>
    </tr>
    <tr>
      <td>Informe o per&iacute;odo que deseja </td>
      <td>De
        <input name='data_inicial' type='text' id='data_inicial' size='10' maxlength='10'>
        at&eacute;
        <input name='data_final' type='text' id='data_final' size='10' maxlength='10'>
        dd-mm-aaaa</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>";
	  ?>
	  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
          echo "<input type='submit' name='Submit3' value='Gerar Relat&oacute;rio Peri&oacute;dico por banco'></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>";

}

?>
<p>
<?
if($comissao=="a receber"){

echo "<form action='relatorio_geral_de_comissao_mensal_a_receber_por_cpf.php' method='post' enctype='multipart/form-data' name='form1' target='navegacao'>
  <table width='100%'  border='0'>
    <tr>
      <td colspan='3'><span class='style2'>Para gerar o relat&oacute;rio mensal a receber por <span class='style3'>CPF</span> &eacute; necess&aacute;rio informar o <span class='style3'>CPF</span> ! </span></td>
    </tr>
    <tr>
      <td width='31%'>Informe o cpf a ser pesquisado </td>
      <td width='45%'><input name='cpf' type='text' id='cpf'>
        (11111111111)</td>
      <td width='24%'>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>";
	  ?>
	  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
          echo "<input type='submit' name='Submit43' value='Gerar Relat&oacute;rio'></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>";
}
?>
<p>
<?
if($comissao=="recebida"){

echo "<form action='relatorio_periodico_por_banco.php' method='post' enctype='multipart/form-data' name='form1'>
  <table width='100%'  border='0'>
    <tr>
      <td width='35%'>Informe o banco que foi efetuada a opera&ccedil;&atilde;o <br></td>
      <td width='32%'><strong><font color='#0000FF'>
        <select name='bco_operacao' id='bco_operacao'>
          <option selected>Todos</option>";
          

    $sql = "select * from bco_operacao order by banco asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['banco']."</option>";

    }


        echo "</select>
      </font></strong></td>
      <td width='33%'>&nbsp;</td>
    </tr>
    <tr>
      <td>Informe o per&iacute;odo que deseja </td>
      <td>De
        <input name='data_inicial' type='text' id='data_inicial' size='10' maxlength='10'>
        at&eacute;
        <input name='data_final' type='text' id='data_final' size='10' maxlength='10'>
        dd-mm-aaaa</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>";
	  ?>
	  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
          echo "<input type='submit' name='Submit3' value='Gerar Relat&oacute;rio'></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>";

}

?>
<p>

<?
if($solicitacao=="pagtos ao cliente"){


echo "<table width='100%' border='0'>
  <tr>
    <td width='21%'><div align='center'></div></td>
    <td width='52%'><div align='center'><strong>Relat&oacute;rio de pagamentos ao cliente (Toda a rede)</strong></div></td>
    <td width='27%'><div align='center'></div></td>
  </tr>
  <tr>
    <td><div align='center'></div></td>
    <td><div align='center'>
      <form name='form23' method='post' action='relatorio_de_pagtos_ao_cliente_toda_a_rede.php' target='navegacao'>";
	  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
        echo "De
  <select name='dia_inicial' id='select3'>";
  
    
    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


  echo "</select>
  <select name='mes_inicial' id='select4'>
    <option selected>
      $mes
      </option>";
    
    $sql = "select * from propostas where mes_alteracao_status <> '' group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


  echo "</select>
  <select name='ano_inicial' id='select5'>
    <option selected>
      $ano
      </option>";
    
    $sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


  echo "</select>
        at&eacute;
  <select name='dia_final' id='select11'>";
    
    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }


  echo "</select>
  <select name='mes_final' id='select12'>
    <option selected>
      $mes
      </option>";
    
    $sql = "select * from propostas group by mes_alteracao_status order by mes_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }


  echo "</select>
  <select name='ano_final' id='select13'>
    <option selected>
      $ano
      </option>";
    
    $sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano_alteracao_status']."</option>";

    }


  echo "</select>
  <input type='submit' name='button13' id='button12' value='Gerar Relat&oacute;rio'>
      </form>
    </div></td>
    <td><div align='center'></div></td>
  </tr>
</table>";

}
?>
<p>
<?
if($solicitacao=="pagtos ao cliente"){

echo "<table width='100%' border='0'>
  <tr>
    <td width='24%'><div align='center'></div></td>
    <td width='52%'><div align='center'><strong>Relat&oacute;rio de pagamentos ao cliente (Operador)</strong></div></td>
    <td width='24%'><div align='center'></div></td>
  </tr>
  <tr>
    <td><div align='center'></div></td>
    <td><div align='center'>
      <form name='form15' method='post' action='relatorio_de_pagtos_ao_cliente.php' target='navegacao'>";
	  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
        echo "Informe a data dd-mm-aaaa
  <input name='data_pagto_cliente' type='text' id='data_pagto_cliente' size='10' maxlength='10'>
  <input type='submit' name='Submit163' value='Gerar Relatório'>
      </form>
    </div></td>
    <td><div align='center'></div></td>
  </tr>
</table>";

}
?>
<?
if($solicitacao=="pagtos ao cliente"){

echo "<table width='100%' border='0'>
  <tr>
    <td width='22%'><div align='center'></div></td>
    <td width='52%'><div align='center'><strong>Relat&oacute;rio de pagamentos ao cliente (Administra&ccedil;&atilde;o)</strong></div></td>
    <td width='26%'><div align='center'></div></td>
  </tr>
  <tr>
    <td><div align='center'></div></td>
    <td><div align='center'>
      <form name='form15' method='post' action='relatorio_de_pagtos_ao_cliente_administracao.php'>";
	  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
        echo "Informe a data dd-mm-aaaa
  <input name='data_pagto_cliente' type='text' id='data_pagto_cliente' size='10' maxlength='10'>
  <input type='submit' name='Submit1632' value='Gerar Relatório'>
      </form>
    </div></td>
    <td><div align='center'></div></td>
  </tr>
</table>";

}

?>
<p>
<?
if($solicitacao=="cupons"){

echo "<table width='100%' border='0'>
  <tr>
    <td width='25%'><div align='center'></div></td>
    <td width='50%'><div align='center'><strong>Relat&oacute;rio peri&oacute;dico de Cupons</strong></div></td>
    <td width='25%'><div align='center'></div></td>
  </tr>
  <tr>
    <td><div align='center'></div></td>
    <td><div align='center'>
      <form name='form23' method='post' action='relatorio_periodico_cupons.php' target='navegacao'>";
	  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
<?
        echo "De
  <select name='dia_inicial' id='dia_inicial'>
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
  <select name='mes_inicial' id='mes_inicial'>
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
  <select name='ano_inicial' id='ano_inicial'>
    <option selected></option>
    <option>$ano</option>
    <option>";
	?>
      <? $anofuturo = bcadd($ano,1); echo $anofuturo; ?>
      <?
      echo "</option>
  </select>
        at&eacute;
  <select name='dia_final' id='dia_final'>
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
  <select name='mes_final' id='mes_final'>
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
  <select name='ano_final' id='ano_final'>
    <option selected></option>
    <option>$ano</option>
    <option>";
	?>
      <? $anofuturo = bcadd($ano,1); echo $anofuturo; ?>
      <?
      echo "</option>
  </select>
  <input type='submit' name='button13' id='button12' value='Gerar Relatório'>
      </form>
    </div></td>
    <td><div align='center'></div></td>
  </tr>
</table>";

}
?>
<p>
  <?

if($solicitacao=="alteracao de clientes"){


echo "<form action='relatorio_de_alteracao_de_clientes.php' method='post' target='_blank' enctype='multipart/form-data' name='form1'>

  <table width='100%'  border='0'>

    <tr>

      <td colspan='3'><div align='center'><strong>Relatório de Clientes Alterados</strong></div></td>

    </tr>

    <tr>

      <td width='34%'>Informe o periodo de refer&ecirc;ncia </td>

      <td width='66%' colspan='2'><strong><font color='#0000FF'>
        <select name='operador_alterou' id='operador_alterou'>
          <option selected></option>";
          
    $sql = "select * from operadores where status = 'Ativo' order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";

    }


        echo "</select>
      </font></strong>De

        <select name='datealteracao_inicial' id='datealteracao_inicial'>";
		
    $sql = "select * from clientes group by datealteracao order by datealteracao desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['datealteracao']."</option>";

    }
		
		echo "</select>";

          



        echo " 

        at&eacute; 

        <select name='datealteracao_final' id='datealteracao_final'>";

          
    $sql = "select * from clientes group by datealteracao order by datealteracao desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['datealteracao']."</option>";

    }






        echo "

      </td>

    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan='2'>";
	  ?>
  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];
?>
  <?


          echo "<input type='submit' name='Submit523222' value='Gerar Relatório'>

      </td>

    </tr>

  </table>

</form>";

}

?>
<p>

<p>
</body>

</html>

