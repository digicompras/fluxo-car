<?

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");


require '../../../conect/conect.php';

$ano = date('Y');

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EXCLUSÃO DE HORAS EXTRAS</title>
</head>

<body>
<form name="form2" method="post" action="principal.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="button" id="button" value="Voltar">
</form>
<?
$nome = $_POST['nome'];


$sql = "SELECT * FROM operadores where nome = '$nome' limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {




$sexo = $linha[2];

$estadocivil = $linha[3];

$cpf = $linha[4];

$rg = $linha[5];

$orgao = $linha[6];

$emissao = $linha[7];

$data_nasc = $linha[8];

$pai = $linha[9];

$mae = $linha[10];

$endereco = $linha[11];

$numero = $linha[12];

$bairro = $linha[13];

$complemento = $linha[14];

$cidade = $linha[15];

$estado = $linha[16];

$cep = $linha[17];

$telefone = $linha[18];

$celular = $linha[19];

$email = $linha[20];

$operador = $linha[21];

$cel_operador = $linha[22];

$email_operador = $linha[23];

$estabelecimento = $linha[24];

$cidade_estabelecimento = $linha[25];

$tel_estabelecimento = $linha[26];

$email_estabelecimento = $linha[27];

$obs = $linha[28];

$datacadastro = $linha[29];

$horacadastro = $linha[30];

$dataalteracao = $linha[31];

$horaalteracao = $linha[32];

$operador_alterou = $linha[33];

$cel_operador_alterou = $linha[34];

$email_operador_alterou = $linha[35];

$estabelecimento_alterou = $linha[36];

$cidade_estabelecimento_alterou = $linha[37];

$tel_estabelecimento_alterou = $linha[38];

$email_estabelecimento_alterou = $linha[39];

$usuario_op = $linha[40];

$senha_op = $linha[41];

$grupo = $linha[42];

$funcao = $linha[43];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];



$salario = $linha[48];

$vale_alimentacao = $linha[49];

$gratificacao = $linha[50];

$comissao = $linha[51];

$emprestimo = $linha[52];

$admissao = $linha[53];

$demissao = $linha[54];

$meta = $linha[55];

$status = $linha[56];

$bloqueio_parcial = $linha[57];

$tempo_almoco = $linha[58];

$cbo = $linha[59];

$secao = $linha[60];

$classificacao = $linha[61];


}





$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];

$data = "$ano-$mes-$dia";

$hi = $_POST['hi'];
$mi = $_POST['mi'];

$hora_inicio = "$hi:$mi";

$convert_hi_minutos = bcmul($hi,60);
$totaliza_minutos_i = bcadd($convert_hi_minutos,$mi);



$ht = $_POST['ht'];
$mt = $_POST['mt'];

$hora_termino = "$ht:$mt";


$convert_ht_minutos = bcmul($ht,60);
$totaliza_minutos_t = bcadd($convert_ht_minutos,$mt);


$subtrai_minutos = bcsub($totaliza_minutos_t,$totaliza_minutos_i);


//converte resultado em horas novamente

$encontra_horas_decimais = bcdiv($subtrai_minutos,60,2);



$encontra_horas_decimais2 = explode(".", $encontra_horas_decimais);



$total_horas = $encontra_horas_decimais2[0];

$encontra_decimal_minutos = $encontra_horas_decimais2[1];

if($encontra_decimal_minutos<=00){

$total_decimal_minutos = "0";
}
else{
$total_decimal_minutos = $encontra_horas_decimais2[1];
}

//ACHA O DECIMAL DO PERCENTUAL DECIMAL DAS HORAS = decimal de hora / 100

$decimal_dos_minutos = bcdiv($total_decimal_minutos,100,2);

$total_minutos_real = bcmul(60,$decimal_dos_minutos);

//aqui termina a formula para encontrar o decimal do decimal dos minutos


$percentual_minutos = $total_decimal_minutos;

$explode_decimal = explode(".", $total_minutos_real);

$total_minutos_real2 = $explode_decimal[0];



$quant_horas_decimais = "$total_horas.$total_decimal_minutos";
$quant_horas_reais = "$total_horas.$total_minutos_real";

$valor_hora_normal = bcdiv($salario,220,2);
$acrecimo_hora_extra = bcmul($valor_hora_normal,0.5,2);
$valor_hora_extra = bcadd($valor_hora_normal,$acrecimo_hora_extra,2);
$total = bcmul($quant_horas_decimais,$valor_hora_extra,2);
?>

<?

$codigo_a_excluir = $_POST['codigo_a_excluir'];

$comando = "delete from `vales` where `vales`. `codigo` = '$codigo_a_excluir' limit 1 ";



mysql_query($comando,$conexao) or die("Erro ao excluir registro de adiantameto do funcionario $nome"); 

?>
<form name="form3" method="post" action="excluir.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="12%">&nbsp;</td>
      <td width="13%">Funcionário</td>
      <td width="26%"><select name="nome" id="select6">
        <?





    $sql = "select * from operadores order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";

    }

?>
            </select></td>
      <td width="40%">&nbsp;</td>
      <td width="9%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Período</td>
      <td><select name="dia_inicial" id="select3">
          <?





    $sql = "select * from vales where dia <> '' group by dia order by dia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia']."</option>";

    }

?>
        </select>
        <select name="mes_inicial" id="mes_inicial">
          <?





    $sql = "select * from vales where mes <> '' group by mes order by mes desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes']."</option>";

    }

?>
        </select>
        <select name="ano_inicial" id="ano_inicial">
          <?





    $sql = "select * from vales where ano <> '' group by ano order by ano desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano']."</option>";

    }

?>
        </select>
at&eacute;
<select name="dia_final" id="select11">
  <?





    $sql = "select * from vales group by dia order by dia desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['dia']."</option>";

    }

?>
</select>
<select name="mes_final" id="select12">
  <?





    $sql = "select * from vales group by mes order by mes desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['mes']."</option>";

    }

?>
</select>
<select name="ano_final" id="select13">
  <?





    $sql = "select * from vales group by ano order by ano desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['ano']."</option>";

    }

?>
</select></td>
      <td><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="button3" id="button3" value="Buscar"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<form name="form1" method="post" action="excluir.php">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="25%"><div align="center">Funcionário</div></td>
      <td width="8%"><div align="center">Nº Lançamento</div></td>
      <td width="10%"><div align="center"></div></td>
      <td width="14%"><div align="center">Data do adiantamento</div></td>
      <td width="15%"><div align="center">Valor</div></td>
    </tr>
    <?
$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];

$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];
	
$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";
$data_final = "$ano_final-$mes_final-$dia_final";

	
$sql = "SELECT * FROM vales where nome = '$nome' and data between '$data_inicial' and '$data_final'";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$codigo = $linha[0];

$data = $linha[1];

$dia = $linha[2];

$mes = $linha[3];

$ano = $linha[4];

$valor_vale = $linha[5];

$nome = $linha[6];




?>
    <tr>
      <td><div align="center"><? echo $nome; ?></div></td>
      <td><div align="center"><? echo $codigo; ?></div></td>
      <td><div align="center">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input name="nome" type="hidden" id="nome" value="<? echo $nome; ?>">
        <input name="codigo_a_excluir" type="hidden" id="codigo_a_excluir" value="<? echo $codigo; ?>">
        <input type="submit" name="button2" id="button2" value="Excluir">
</div></td>
      <td><div align="center"><? echo "$dia-$mes-$ano"; ?></div></td>
      <td><div align="center"><? echo "R$ $valor_vale"; ?></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <? } ?>
  </table>
</form>
<p>
  <p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
