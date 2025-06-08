<?php

/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em minutos */
session_cache_expire(60);
$cache_expire = session_cache_expire();

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>

<?

$dia = date('d');

$mes = date('m');

$ano = date('Y');

$data_hoje = "$dia-$mes-$ano";

$ano_atual = date('Y');
$ano_anterior = bcsub($ano_atual,1);
$ano_proximo = bcadd($ano_atual,1);

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
.style14 {font-size: 10px}
.style18 {font-size: 16; font-weight: bold; }
.style19 {font-size: 16; }
.style1 {font-size: 35px;
	font-weight: bold;
	color: #0000FF;
}

-->
</style>
</head>

<?



require '../conect/conect.php';

$solicitacao = $_POST['solicitacao'];
$regiao = $_POST['regiao'];
$solicita_rever_regiao = $_POST['solicita_rever_regiao'];
$dataentrega = $_POST['dataentrega'];
$cidade_entrega = $_POST['cidade_entrega'];





$hoje = date('Y-m-d');

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
	
$regiao = $linha[61];

}
?>

<?

if($solicitacao=="entregar"){

$codigo_orcamento_entregar = $_POST['codigo_orcamento'];
$entrega = $_POST['entrega'];
$data_da_entrega = date('Y-m-d');

$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$db = $linha[1];
}
$comando = "update `$db`.`orcamentos` set `entrega` = '$entrega',`data_da_entrega` = '$data_da_entrega' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento_entregar' limit 1 ";
mysql_query($comando,$conexao);


}

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">

    <tr> 

      <td width="32%"><strong>Ol&aacute;! Seja bem vindo!<br> 

        </strong><strong><font color="#0000FF"><? echo $nome_operador; ?> 

            

</font></strong><strong><font color="#0000FF">      </font></strong></td>

      <td width="30%"><strong>E-mail:</strong><br>

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

      <td background="../imagens/fundocelulas2.png"><form name="form1" method="post" action="ponto/marcarponto.php">

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

      <td background="../imagens/fundocelulas2.png"><form name="form3" method="post" action="index.php"><strong>

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        </strong>
        <input type='hidden' name='regiao' id='regiao' value='<? echo "TODAS"; ?>'>
	  <input type='hidden' name='solicitacao' id='solicitacao' value='ver_regiao'>
	  
Cidade <strong>
<select name="cidade_entrega" class='class02' id="cidade_entrega">
  <option selected>
  <? echo "$cidade_entrega"; ?>
  </option>
  <?


    $sql = "select * from orcamentos group by cidade order by cidade asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cidade']."</option>";
    }
?>
</select>
</strong>         
<input type="submit" class='class01' name="button2" id="button2" value="Buscar">
      </form>        
      <strong><font color="#0000FF">          </font></strong></td>

      <td colspan="2" background="../imagens/fundocelulas2.png">&nbsp;</td>
    </tr>
</table>

<p align="center">

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
            <input type="submit" class='class01' name="Submit" value="Declaro que li a mensagem">
        </div></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <? } ?>
  </form>
<table width="100%"  border="0">
  <tr>
    <td width="26%"><div align="center">
      <form action="clientes/menu.php" method="post" name="form2">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($reg_mensagem==0) && ($funcao<>"Agente")){ echo "<input class='class01' type='submit' name='Submit5' value='Clientes'>"; } ?>
      </form>
    </div></td>
    <td width="21%" align="center"><form action="orcamentos/selecione_cliente_para_abrir_orcamento.php" method="post" name="form2">
      <input name="nome_operador" type="hidden" id="nome_operador" value="<? echo $nome_operador;  ?>">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <?      

//if($bloqueio_parcial==N&atilde;o){



if($reg_mensagem==0){ echo "<input class='class01' type='submit' name='Submit' value='Pedidos'>"; }

//}

//else{

//echo "Bloqueado para efetuar proposta";

//}

?>
    </form></td>
    <td width="53%"><form action="relatorios/relatorio_de_producao_periodico_por_operador.php" method="post" name="form5">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="campanha" type="hidden" id="campanha" value="selecione">
        <?
       
if($funcao=="Gerente"){ ?>
        <select class='class02' name="nome_operador" id="select6">
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
        <select class='class02' name="dia_inicial" id="select3">
          <?





    $sql = "select * from orcamentos where diaabertura <> '' group by diaabertura order by diaabertura asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['diaabertura']."</option>";

    }

?>
        </select>
        <select class='class02' name="mes_inicial" id="select4">
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
          <?





    $sql = "select * from propostas where mes_alteracao_status <= '$mes' group by mes_alteracao_status order by mes_alteracao_status desc limit 2";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
        </select>
        <select class='class02' name="ano_inicial" id="select5">
          <option selected><? echo $ano_atual ?></option>
          <option>
            <?  echo $ano_anterior;  ?>
            </option>
          <option>
            <?  echo $ano_proximo;  ?>
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
        <select class='class02' name="dia_final" id="select11">
          <?

    $sql = "select * from orcamentos group by diaabertura order by diaabertura desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['diaabertura']."</option>";

    }

?>
        </select>
        <select class='class02' name="mes_final" id="select12">
          <option><? echo $mes; ?></option>
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
          <?





    $sql = "select * from propostas where mes_alteracao_status <= '$mes'  group by mes_alteracao_status order by mes_alteracao_status desc limit 2";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes_alteracao_status']."</option>";

    }

?>
        </select>
        <select class='class02' name="ano_final" id="select13">
          <option selected><? echo $ano_atual ?></option>
          <option>
            <?  echo $ano_anterior;  ?>
            </option>
          <option>
            <?  echo $ano_proximo;  ?>
            </option>
          <?





    //$sql = "select * from propostas group by ano_alteracao_status order by ano_alteracao_status desc";

    //$result = mysql_query($sql);

    //while($x=mysql_fetch_array($result)){

  //echo "<option>".$x['ano_alteracao_status']."</option>";

  //  }

?>
        </select>
        <? if($reg_mensagem==0){ echo "<input class='class01' type='submit' name='Submit5232' value='Relat&oacute;rio de Produ&ccedil;&atilde;o'>"; } ?>
      </div>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form action="produtos/menu.php" method="post" name="form2" id="form5">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($reg_mensagem==0) && ($funcao<>"Agente")){ echo "<input class='class01' type='submit' name='Submit30' value='Produtos'>"; } ?>
      </div>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<div align="center" class="style18">
  <?
  
  
echo "<table border='0' align='center' cellpadding='0' cellspacing='0'><tr>";


$sql = "select * from regioes where regiao = '$regiao' order by regiao asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;



$regiao_existente = $linha[1];



$sql2 = "SELECT * FROM orcamentos where operador = '$nome_operador' and regiao = '$regiao_existente' and condicao = 'PEDIDO' and status = 'Finalizado' and entrega = 'A Entregar'";
$res2 = mysql_query($sql2);

$registros_encontrados = mysql_num_rows($res2);





echo "<td valign='middle' background='../imagens/fundocelulas2.png'><form name='form4' method='post' action='index.php'>";
     

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

      echo "<input type='hidden' name='regiao' id='regiao' value='$regiao_existente'>
	  <input type='hidden' name='solicitacao' id='solicitacao' value='ver_regiao'>
<input type='hidden' name='dataentrega' id='dataentrega' value='$data_da_entrega'>";



      echo "<input type='submit' class='class01' name='button' id='button' value='$regiao_existente >> $registros_encontrados'>";
	  
	  
	  

echo "</form>";


if($reg<=5){
	
echo "</td><td valign='middle'>";

}
else{
	
echo "</td></tr>";
	
$reg=0;

}


}

echo "</table><br>";

?></div>

<strong></strong>
<div align="center"></div>

<table width="100%"  border="1" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#ffffff">
    <td colspan="8" background="../imagens/fundocelulas2.png"><div align="center" class="style18">
<?

if(($solicitacao=="ver_regiao") or ($solicita_rever_regiao=="reverregiao")){


if((empty($regiao)) or ($regiao=="TODAS")){

$sql = "SELECT * FROM orcamentos where operador = '$nome_operador' and regiao = '$regiao_existente' and condicao = 'PEDIDO' and status = 'Finalizado' and entrega = 'A Entregar' order by codigo_orcamento asc";

}
else{

$sql = "SELECT * FROM orcamentos where operador = '$nome_operador' and regiao = '$regiao_existente' and condicao = 'PEDIDO' and status = 'Finalizado' and entrega = 'A Entregar' order by codigo_orcamento asc";

}
$res = mysql_query($sql);
$registros = mysql_num_rows($res);


echo "Total de registros encontrados da Região $regiao ---> $registros<br>";

}

?></div></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td colspan="8" background="../imagens/fundocelulas1.png"><div align="center"><strong>
    <?	

if(($solicitacao=="ver_regiao") or ($solicita_rever_regiao=="reverregiao")){


$sql2 = "SELECT * FROM clientes where regiao = '$regiao' group by bairro order by bairro asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$bairros_encontrados++;

$bairro = $linha[7];

echo "$bairro - ";


if($bairros_encontrados>=5){
	
echo "<br>";

}
else{
	
	
$bairros_encontrados=0;

}

}
}
?>
    </strong></div></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td background="../imagens/fundocelulas2.png"><div align="center" class="style18">N&ordm; Pedido </div></td>
    <td background="../imagens/fundocelulas2.png"><div align="center" class="style18">Cliente</div></td>
    <td background="../imagens/fundocelulas2.png"><div align="center" class="style18">Endere&ccedil;o</div></td>
    <td background="../imagens/fundocelulas2.png"><div align="center" class="style18">Numero</div></td>
    <td background="../imagens/fundocelulas2.png"><div align="center" class="style18">Bairro</div></td>
    <td background="../imagens/fundocelulas2.png" class="style18"><div align="center" class="style18">Cidade</div></td>
    <td background="../imagens/fundocelulas2.png" class="style18"><div align="center">Regi&atilde;o</div></td>
    <td background="../imagens/fundocelulas2.png" class="style14"><div align="center" class="style18"><strong>Data Entrega</strong></div></td>
  </tr>
  <?


if(($solicitacao=="ver_regiao") or (empty($solicitacao)) or($solicita_rever_regiao=="reverregiao")){

if((empty($regiao)) or ($regiao=="TODAS")){

$sql = "SELECT * FROM orcamentos where operador = '$nome_operador' and regiao = '$regiao_existente' and condicao = 'PEDIDO' and status = 'Finalizado' and entrega = 'A Entregar' order by codigo_orcamento asc";

}
else{

$sql = "SELECT * FROM orcamentos where operador = '$nome_operador' and regiao = '$regiao_existente' and condicao = 'PEDIDO' and status = 'Finalizado' and entrega = 'A Entregar' order by codigo_orcamento asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_orcamento = $linha[0];
$codigo_cliente = $linha[25];
$nome = $linha[27];
$data_prevista_entrega = $linha[91];
$regiao_gravada = $linha[92];
	
	
$sql2 = "SELECT * FROM clientes where codigo = '$codigo_cliente'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$endereco = $linha[11];
$numero = $linha[12];
$bairro = $linha[13];
$cidade = $linha[15];
$estado = $linha[16];


$endereco_desejado = "$endereco, $numero, $bairro, $cidade, $estado";
?>
  <tr>
    <td width="6%" background="../imagens/fundocelulas1.png"><div align="center" class="style19">
      <?  echo "$codigo_orcamento";  ?>
    </div></td>
    <td width="24%" background="../imagens/fundocelulas1.png"><div align="center" class="style19">
      <span class="style18"><a href="https://www.google.com.br/maps/search/?q=<? echo $endereco_desejado; ?>" target="_blank"><strong><? echo $nome; ?></strong></a></span></div></td>
    <td width="17%" background="../imagens/fundocelulas1.png"><div align="center" class="style19"><? echo $endereco; ?></div></td>
    <td width="5%" background="../imagens/fundocelulas1.png"><div align="center" class="style19"><? echo $numero; ?></div></td>
    <td width="12%" background="../imagens/fundocelulas1.png"><div align="center" class="style19"><? echo $bairro; ?></div></td>
    <td width="12%" background="../imagens/fundocelulas1.png" class="style14"><div align="center" class="style19"><? echo $cidade; ?></div></td>
    <td width="12%" background="../imagens/fundocelulas1.png" class="style14"><div align="center"><span class="style19"><? echo $regiao_gravada; ?></span></div></td>
    <td width="12%" background="../imagens/fundocelulas1.png" class="style14"><div align="center"><span class="style19"><? echo $data_prevista_entrega; ?></span></div></td>
  <tr>
    <td colspan="8" background="../imagens/fundocelulas1.png"><div align="center">
      <table width="50%"  border="1" cellpadding="0" cellspacing="0">
        
        <tr bgcolor="#ffffff">
          <td background="../imagens/fundocelulas2.png" bgcolor="#CCCCCC"><div align="center"><strong>Nome Produto</strong></div></td>
          <td background="../imagens/fundocelulas2.png" bgcolor="#CCCCCC"><div align="center"><strong>Quantidade</strong></div></td>
          <td background="../imagens/fundocelulas2.png" bgcolor="#CCCCCC"><form name="form2" method="post" action="index.php">
            <div align="center" class="style14">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <input name="cidade_entrega" type="hidden" id="cidade_entrega" value="<? echo "$cidade_entrega"; ?>">
              <input type='hidden' name='dataentrega' id='dataentrega' value='<? echo "$data_da_entrega"; ?>'>
              <input name="solicitacao" type="hidden" id="solicitacao" value="entregar">
              <input name="solicita_rever_regiao" type="hidden" id="solicita_rever_regiao" value="reverregiao">
              <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
              <input name="entrega" type="hidden" id="entrega" value="<? echo "entregue";  ?>">
              <input name="regiao" type="hidden" id="regiao" value="<? echo "$regiao"; ?>">
              <input type="submit" class='class01' name="button" id="button" value="OK">
            </div>
          </form></td>
        </tr>
        <?
			  
$sql2 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {



$codigolancamento = $linha[0];

$codigo_orcamento = $linha[1];

$codigoproduto = $linha[17];
$nomeproduto = $linha[18];
$categoria = $linha[19];
$quant = $linha[21];
$preco = $linha[22];


$acrescimo = $linha[23];
$acrescimodecimal = $linha[24];
$acrescimomonetario = $linha[25];
$total = $linha[29];

$descontoetapa1 = $linha[68];
$descontoetapa2 = $linha[70];
$descontoetapa3 = $linha[72];
$descontoetapa4 = $linha[83];


$descontomonetarioetapa1 = $linha[75];
$descontomonetarioetapa2 = $linha[76];
$descontomonetarioetapa3 = $linha[77];
$descontomonetarioetapa4 = $linha[85];


?>
        <tr>
          <td width="24%" valign="middle" background="../imagens/fundocelulas1.png"><div align="center"><span class="style1"><strong><? echo $nomeproduto;?></strong></span></div></td>
          <form name="form3" method="post" action="orcamento.php">
            <td width="6%" valign="middle" background="../imagens/fundocelulas1.png"><div align="center" class="style1"><strong><? echo $quant;?></strong></div></td>
            <td width="6%" valign="middle" background="../imagens/fundocelulas1.png">&nbsp;</td>
          </form>
        </tr>
        <? } ?>
        
        <tr>
          <td colspan="3"><div align="center">---------- // ----------</div></td>
        </table>
        <? } } }?>
    </div></td>
</table>
<p align="center">&nbsp;</p>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#ffffff">
    <td colspan="7" background="../imagens/fundocelulas2.png"><div align="center" class="style18">
    <?	

if(($solicitacao=="ver_regiao") or ($solicita_rever_regiao=="reverregiao")){

if((empty($regiao)) or ($regiao=="TODAS")){

$sql = "SELECT * FROM orcamentos where operador = '$nome_operador' and regiao = '$regiao_existente' and condicao = 'PEDIDO' and status = 'Finalizado' and entrega = 'entregue' and entrega = 'entregue' order by codigo_orcamento asc";

}
else{

$sql = "SELECT * FROM orcamentos where operador = '$nome_operador' and regiao = '$regiao_existente' and condicao = 'PEDIDO' and status = 'Finalizado' and entrega = 'entregue' and entrega = 'entregue' order by codigo_orcamento asc";

}
$res = mysql_query($sql);
$registros = mysql_num_rows($res);


echo "TOTAL DE ENTREGAS EFETUADAS $regiao ---> $registros<br>";



$sql2 = "SELECT * FROM clientes where regiao = '$regiao' group by bairro order by bairro asc";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$bairros_encontrados++;

$bairro = $linha[7];

//echo "$bairro - ";


if($bairros_encontrados>=5){
	
echo "<br>";

}
else{
	
	
$bairros_encontrados=0;

}

}
}
?></div></td>
  </tr>
  <tr bgcolor="#ffffff">
    <td background="../imagens/fundocelulas2.png"><div align="center" class="style18">N&ordm; Pedido </div></td>
    <td background="../imagens/fundocelulas2.png"><div align="center" class="style18">Cliente</div></td>
    <td background="../imagens/fundocelulas2.png"><div align="center" class="style18">Endere&ccedil;o</div></td>
    <td background="../imagens/fundocelulas2.png"><div align="center" class="style18">Numero</div></td>
    <td background="../imagens/fundocelulas2.png"><div align="center" class="style18">Bairro</div></td>
    <td background="../imagens/fundocelulas2.png" class="style14"><div align="center" class="style18">Cidade</div></td>
    <td background="../imagens/fundocelulas2.png" class="style14"><div align="center"><strong>Data Entrega</strong></div></td>
  </tr>
  <?


if(($solicitacao=="ver_regiao") or ($solicita_rever_regiao=="reverregiao")){

if((empty($regiao)) or ($regiao=="TODAS")){

$sql = "SELECT * FROM orcamentos where operador = '$nome_operador' and regiao = '$regiao_existente' and condicao = 'PEDIDO' and status = 'Finalizado' and entrega = 'entregue' and entrega = 'entregue' order by codigo_orcamento asc";

}
else{

$sql = "SELECT * FROM orcamentos where operador = '$nome_operador' and regiao = '$regiao_existente' and condicao = 'PEDIDO' and status = 'Finalizado' and entrega = 'entregue' and entrega = 'entregue' order by codigo_orcamento asc";

}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_orcamento = $linha[0];
$codigo_cliente = $linha[25];
$nome = $linha[27];
$regiao_gravada = $linha[50];
$data_entregue = $linha[54];
	
	
$sql2 = "SELECT * FROM clientes where codigo = '$codigo_cliente'";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$endereco = $linha[11];
$numero = $linha[12];
$bairro = $linha[13];
$cidade = $linha[15];
$estado = $linha[16];



?>
  <tr>
    <td width="4%" background="../imagens/fundocelulas1.png"><div align="center" class="style19">
      <?  echo "$codigo_orcamento";  ?>
    </div></td>
    <td width="12%" background="../imagens/fundocelulas1.png"><div align="center" class="style19"><? echo $nome; ?></div></td>
    <td width="7%" background="../imagens/fundocelulas1.png"><div align="center" class="style19"><? echo $endereco; ?></div></td>
    <td width="7%" background="../imagens/fundocelulas1.png"><div align="center" class="style19"><? echo $numero; ?></div></td>
    <td width="7%" background="../imagens/fundocelulas1.png"><div align="center" class="style19"><? echo $bairro; ?></div></td>
    <td width="7%" background="../imagens/fundocelulas1.png" class="style14"><div align="center" class="style19"><? echo $cidade; ?></div></td>
    <td width="7%" background="../imagens/fundocelulas1.png" class="style14"><div align="center">
      <form name="form2" method="post" action="index.php">
        <div align="center" class="style14">
          <span class="style19"><? echo $data_entregue; ?></span>
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <input name="cidade_entrega" type="hidden" id="cidade_entrega" value="<? echo "$cidade_entrega"; ?>">
          <input type='hidden' name='dataentrega' id='dataentrega' value='<? echo "$data_da_entrega"; ?>'>
          <input name="solicitacao" type="hidden" id="solicitacao" value="entregar">
          <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
          <input name="status" type="hidden" id="status" value="<? echo "entregue";  ?>">
        </div>
      </form>
    </div></td>
    <? } } }?>
</table>
<p align="center">&nbsp;</p>
</body>

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>