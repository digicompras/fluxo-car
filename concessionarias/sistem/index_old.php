<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.





else //se não for...

header("Location: alerta.php");



?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

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
	font-size: <? echo $tamanho_fonte; ?>;
}
.style2 {
	color: #1328c9;
	font-weight: bold;
	font-size: 12px;
}
.style3 {
	color: #0000FF;
	font-weight: bold;
	font-size: 50px;

}
.style10 {
	color: #1328c9;
	font-weight: bold;
	font-size: 24px;
}

-->
</style>


</head>

<?



require '../conect/conect.php';

$hoje = date('Y-m-d');

$data_hoje = $_SESSION['data_hoje'];

$codigo_mensagem = $_POST['codigo_mensagem'];

$mensagem_lida = $_POST['mensagem_lida'];

$data_leitura = date('d-m-Y');

$hora_leitura = date('H:i:s');



if($mensagem_lida=="Lida"){

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`mensagens_ao_funcionario` set `codigo` = '$codigo_mensagem',`mensagem_lida` = '$mensagem_lida',`data_leitura` = '$data_leitura',`hora_leitura` = '$hora_leitura' where `mensagens_ao_funcionario`. `codigo` = '$codigo_mensagem' limit 1 ";

}



mysql_query($comando,$conexao);



}


$dia = date('d');

$mes = date('m');

$ano = date('Y');





$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?> 

<body bgcolor="#<? printf("$linha[1]"); ?>"> 

<? } ?>



<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";

$res = mysql_query($sql);

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;



$codigo_operador = $linha[0];

$nome_operador = $linha[1];

$senha_op = $linha[41];

$tipo_op = $linha[42];

$funcao = $linha[43];

$estab_pertence = $linha[44];

$bloqueio_parcial = $linha[57];


?>


  <table width="100%" border="0" cellspacing="4">

    <tr> 

      <td><strong>Ol&aacute;! Seja bem vindo!<br> 

        </strong><strong><font color="#0000FF"><? echo $nome_operador; ?> 

            

</font></strong><strong><font color="#0000FF">      </font></strong></td>

      <td><strong>E-mail:</strong><br>

      <strong><font color="#0000FF"><? echo $linha[20]; ?></font></strong>     </td>

      <td width="15%"><strong>Celular:<font color="#0000FF"><br>

            <? echo $linha[19]; ?>

      </font><font color="#0000FF">      </font></strong></td>

      <td width="23%" valign="top"><div align="center">

        <strong><font color="#0000FF">Confira a data de hoje<br> 

        </font></strong>

        <strong><font color="#0000FF"><? echo $data_hoje; ?></font></strong>

           

        </p>

</div></td>
    </tr>

    <tr>

      <td width="32%"><strong>Estabelecimento:</strong> <br>

        <strong><font color="#0000FF"><? echo $estab_pertence; ?>

        </font></strong><strong><font color="#0000FF">      </font></strong></td>

      <td width="30%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

        <? echo $linha[46]; ?>

            </font></strong></td>

      <td><strong>Cidade: <br>

          <font color="#0000FF"><? echo $linha[45]; ?>          </font></strong></td>

      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

            <? echo $linha[47]; ?>

      </font></strong></td>
    </tr>

    <tr>

      <td><form name="form1" method="post" action="ponto/marcarponto.php">

        <?

$hora = date('H');		



$sql = "SELECT * FROM ponto where nome = '$nome_operador' and data = '$data_hoje'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$codigo_ponto = $linha[0];

$ent_t = $linha[5];



}



?>

        <strong><font color="#0000FF">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input name="nome" type="hidden" id="nome" value="<? echo $nome_operador; ?>">

        <input name="codigo_ponto" type="hidden" id="codigo_ponto" value="<? echo $codigo_ponto; ?>">

        <input name="data" type="hidden" id="data" value="<? echo date('d-m-Y'); ?>">
        </font></strong>

      </form>        <strong><font color="#0000FF">      </font></strong></td>

      <td><form name="form3" method="post" action="verifica_f.php"><strong>

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        </strong>      

      </form>        
      <strong><font color="#0000FF">          </font></strong></td>

      <td colspan="2">&nbsp;</td>
    </tr>

<?

if($reg==3){

echo "</tr><tr>";

$reg=0;

}

?>



<? } ?>
</table>
    <?


$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and status <> 'RECUSADO PELA MESA DE CREDITO' and status <> 'CANCELADO A PEDIDO DO OPERADOR' and data_proposta <>'0000-00-00' order by num_proposta desc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg = 0;

$num_proposta = $linha[0];
$obs_fisico = $linha[122];

$data_proposta = $linha[152];
$prazo_final = $linha[153];



//------------------------------------------------------

//Separação dos valores (ano,mes,dia) data_proposta
$arr1 = explode("-", $hoje);
 
$anolimite1 = $arr1[0];
$meslimite1 = $arr1[1];
$dialimite1 = $arr1[2];

//-------------------------------------------------------

//Separação dos valores (ano,mes,dia) data_proposta
$arr2 = explode("-", $data_proposta);
 
$anolimite2 = $arr2[0];
$meslimite2 = $arr2[1];
$dialimite2 = $arr2[2];

//--------------------------------------------------------

//calculo timestam das duas datas
$timestamp1 = mktime(0,0,0,$meslimite1,$dialimite1,$anolimite1);
$timestamp2 = mktime(0,0,0,$meslimite2,$dialimite2,$anolimite2); 


//diminuo a uma data a outra
$segundos_diferenca = $timestamp1 - $timestamp2;
//echo $segundos_diferenca;

//converto segundos em dias
$dias_diferenca = $segundos_diferenca / (60 * 60 * 24);

//obtenho o valor absoluto dos dias (tiro o possível sinal negativo)
//$dias_diferenca = abs($dias_diferenca);

//tiro os decimais aos dias de diferenca
$dias_diferenca = floor($dias_diferenca);



$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

if($dias_diferenca>="11"){

$dias_atraso = bcsub($dias_diferenca,10);

$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`dias_diferenca` = '$dias_diferenca',`dias_atraso` = '$dias_atraso' where `propostas`. `num_proposta` = '$num_proposta'";

}
else{
$comando = "update `$linha[1]`.`propostas` set `num_proposta` = '$num_proposta',`dias_diferenca` = '$dias_diferenca' where `propostas`. `num_proposta` = '$num_proposta'";
}
}

mysql_query($comando,$conexao) or die("Erro ao alterar informações desse cadastro");

}
?>

<p align="center">
<?

$sql = "SELECT * FROM propostas where nome_operador = '$nome_operador' and status_fisico = 'Pendente' and status <> 'RECUSADO PELA MESA DE CREDITO' and status <> 'CANCELADO A PEDIDO DO OPERADOR' and dias_atraso >= '1' order by num_proposta desc";

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registros = mysql_num_rows($res);

$num_proposta = $linha[0];



}

if($registros>="1"){
echo "<div align='center' class='style1'><blink>ATENÇÃO!!!... $nome_operador você tem $registros propostas em atraso para enviar o físico para Matriz</blink></div>";


$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$comando = "update `$linha[1]`.`operadores` set `codigo` = '$codigo_operador',`bloqueio_parcial` = 'Sim' where `operadores`. `codigo` = '$codigo_operador'";

mysql_query($comando,$conexao);

}







}
?>

<?

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	?>
</p>
<form name="form9" method="post" action="index.php">
    <?

$sql = "SELECT * FROM mensagens_ao_funcionario where nome_operador = '$nome_operador' and mensagem_lida = 'Não lida'";

$res = mysql_query($sql);

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg_mensagem++;



$codigo_mensagem = $linha[0];

$nome_operador = $linha[1];

$data_mensagem = $linha[2];

$hora_mensagem = $linha[3];

$mensagem = $linha[4];

$mensagem_lida = $linha[5];

$data_leitura = $linha[6];

$hora_leitura = $linha[6];

?>
    <table width="100%"  border="0">
      <tr>
        <td width="9%"><div align="center"><? echo $data_mensagem; ?></div></td>
        <td width="9%"><div align="center"><? echo $hora_mensagem; ?></div></td>
        <td width="62%"><div align="center">
            <textarea name="mensagem" cols="120" rows="7" id="mensagem"><? echo $mensagem; ?></textarea>
        </div></td>
        <td width="20%"><div align="center">
            <input name="codigo_mensagem" type="hidden" id="codigo_mensagem" value="<? echo $codigo_mensagem; ?>">
            <input name="mensagem_lida" type="hidden" id="mensagem_lida" value="Lida">
        </div></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><div align="center">
            <input type="submit" name="Submit" value="Declaro que li a mensagem">
        </div></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <? } ?>
  </form>
<div align="center"></div>

<table width="100%"  border="0">

  

  <tr>

    <td width="17%"><form action="clientes/menu.php" method="post" name="form2">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <? if($reg_mensagem==0){ echo "<input type='submit' name='Submit5' value='Clientes'>"; } ?>
    </form></td>
    <td width="9%"><form action="propostas/menu.php" method="post" name="form2">
      <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador;  ?>">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <?      

//if($bloqueio_parcial==Não){



if($reg_mensagem==0){ echo "<input type='submit' name='Submit' value='Propostas'>"; }

//}

//else{

//echo "Bloqueado para efetuar proposta";

//}

?>
    </form></td>
    <td width="21%"><form name="form9" method="post" action="telemarketing/menu.php">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <? if($reg_mensagem==0){ echo "<input type='submit' name='button' id='button' value='Telemarketing'>"; } ?>
      <input name="nome" type="hidden" id="nome">
    </form></td>
    <td width="53%"><form action="clientes/cupom.php" method="post" name="form5">
      <div align="left">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if($reg_mensagem==0){ echo "CPF
        <input name='cpf' type='text' id='cpf2' size='11' maxlength='11'>
        <input type='submit' name='Submit52322' value='Registrar Cupom'>"; } ?>
      </div>
    </form></td>
  </tr>

  <tr>

    <td colspan="2"><form action="index.php" method="post" name="form2">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <select name="num_proposta" id="num_proposta">
        <option value="null" selected>Selecione
          <?





    $sql = "select * from propostas where nome_operador = '$nome_operador' and status <> 'APROVADO E PAGO' order by num_proposta desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['num_proposta']."</option>";

    }

?>
        </option>
      </select>
      <? if($reg_mensagem==0){ echo "<input type='submit' name='Submit3' value='Acompanhar Proposta'>"; } ?>
    </form></td>

    <td><form action="index.php" method="post" name="form2">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <select name="num_proposta" id="num_proposta">
        <option value="null" selected>Selecione
          <?





    $sql = "select * from propostas where nome_operador = '$nome_operador' and status = 'APROVADO E PAGO' order by num_proposta desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['num_proposta']."</option>";

    }

?>
        </option>
      </select>
      <? if($reg_mensagem==0){ echo "<input type='submit' name='Submit32' value='Propostas Pagas'>"; } ?>
    </form></td>

    <td><form name="form2" method="post" action="operadores/editar_operador.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <? if($reg_mensagem==0){ echo "<input type='submit' name='Submit2' value='Editar Dados Cadastrais'>"; } ?>

    </form></td>
  </tr>

  <tr>

    <td colspan="2"><div align="center">
      <form name="form5" method="post" action="borderos/borderos.php">
        <div align="left">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
          <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador; ?>">
          <?
if($reg_mensagem==0){ echo "<input type='submit' name='Submit' value='Borderôs'>"; } 

//if($funcao=="Gerente"){ if($reg_mensagem==0){ echo "<input type='submit' name='Submit' value='Borderôs'>"; } }
?>
          </div>
      </form>
    </div></td>
    <td>&nbsp;</td>
    <td><form action="propostas/relatorio_de_producao_periodico_por_operador_novo.php" method="post" name="form5">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="campanha" type="hidden" id="campanha" value="selecione">
        <?
       
if($funcao=="Gerente"){ ?>
        <select name="nome_operador" id="select6">
          <option selected></option>
          <?
    $sql = "select * from operadores where estab_pertence = '$estab_pertence' and status = 'Ativo' order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";
  

    }
?>
        </select>
        <?        }
        else{
		?>
        <input name="nome_operador" type="hidden" id="nome_operador3" value="<? echo $nome_operador; ?>">
        <?        }
?>
        De
        <select name="dia_inicial" id="select3">
          <?





    $sql = "select * from propostas where dia_alteracao_status <> '' group by dia_alteracao_status order by dia_alteracao_status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }

?>
        </select>
        <select name="mes_inicial" id="select4">
          <option selected>
            <?  echo $mes;  ?>
            </option>
          <?





    $sql = "select * from propostas where mes_alteracao_status <= '$mes' group by mes_alteracao_status order by mes_alteracao_status desc limit 2";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
        </select>
        <select name="ano_inicial" id="select5">
          <option selected>
            <?  echo $ano;  ?>
            </option>
          <?





    //$sql = "select * from propostas where ano_alteracao_status <> '' group by ano_alteracao_status order by ano_alteracao_status desc";

    //$result = mysql_query($sql);

    //while($x=mysql_fetch_array($result)){

  //echo "<option>".$x['ano_alteracao_status']."</option>";

    //}

?>
        </select>
        at&eacute;
        <select name="dia_final" id="select11">
          <?





    $sql = "select * from propostas group by dia_alteracao_status order by dia_alteracao_status desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia_alteracao_status']."</option>";

    }

?>
        </select>
        <select name="mes_final" id="select12">
          <option selected>
            <?  echo $mes;  ?>
            </option>
          <?





    $sql = "select * from propostas where mes_alteracao_status <= '$mes'  group by mes_alteracao_status order by mes_alteracao_status desc limit 2";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
        </select>
        <select name="ano_final" id="select13">
          <option selected>
            <?  echo $ano;  ?>
            </option>
          <?





    //$sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    //$result = mysql_query($sql);

    //while($x=mysql_fetch_array($result)){

  //echo "<option>".$x['ano_alteracao_status']."</option>";

  //  }

?>
        </select>
        <? if($reg_mensagem==0){ echo "<input type='submit' name='Submit5232' value='Relatório de Produção'>"; } ?>
      </div>
    </form></td>
  </tr>

  <tr>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><form name="form4" method="post" action="propostas/relatorios/verificar_producao_diaria_operador_e_parceiro_individual.php">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
            <? if($funcao=="Gerente"){ 
echo"<select name='dataproposta' id='select5'>";
    $sql = "select * from propostas group by dataproposta order by num_proposta desc limit 60";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['dataproposta']."</option>";
   }
      echo"</select>";

}
  ?>

            <? if($funcao=="Gerente"){ echo"Operador" ; } ?> 
            
            <? if($funcao=="Gerente"){ 
echo"<select name='nome_operador' id='select5'>";
    $sql = "select * from operadores where status = 'Ativo' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nome']."</option>";
   }
      echo"</select>";

}
  ?>
            
            <? if($funcao=="Gerente"){ if($reg_mensagem==0){ echo "<input type='submit' name='Submit523223' value='Relatório de Produção diário'>"; } }?>
    </form>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>

    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<?







$num_proposta = $_POST['num_proposta'];



$sql = "SELECT * FROM propostas where num_proposta = '$num_proposta'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;

?>

<strong></strong>

<div align="center"><strong>Prezado Operador!</strong>

</div>

<table width="100%"  border="0">

  <tr>

    <td colspan="3"><strong>A proposta de seu cliente <font color="#0000FF"><? echo $linha[4]; ?></font> de N&ordm;</strong> <strong><font color="#0000FF"><? echo $linha[0]; ?></font></strong><font color="#000000"><strong>, efetuada em</strong> <strong><font color="#0000FF"><? echo $linha[40]; ?></font>, </strong></font><br>

    <font color="#000000"><strong>Tem seu status definido em </strong> <strong><font color="#0000FF"><? echo $linha[51]; ?></font></strong> <strong>!</strong></font></td>

  </tr>

  <tr>

    <td width="37%">&nbsp;</td>

    <td width="20%"><form action="propostas/imprimir_proposta.php" method="post" name="form3" target="_blank">

      <strong><font color="#0000FF">

      <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">

      </font></strong>

      <input type="submit" name="Submit4" value="Imprimir Proposta">

    </form></td>

    <td width="43%">&nbsp;</td>

  </tr>

</table>

<p align="center">

  <?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>

  <? } ?>

</p>

</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>