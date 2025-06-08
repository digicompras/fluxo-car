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

<title>MAPA DE PRODU&Ccedil;&Atilde;O TELEMARKETING ALLCRED FINANCEIRA - TODAS AG&Ecirc;NCIAS</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

.style4 {font-size: 18px}

.style5 {font-size: 24px}

.style7 {

	font-size: 9px;

	font-weight: bold;

}
.style2 {color: #0000FF;

	font-weight: bold;
}

-->

</style>
</head>

<?



require '../../conect/conect.php';



$dia_inicial = $_POST['dia_inicial'];

$mes_inicial = $_POST['mes_inicial'];

$ano_inicial = $_POST['ano_inicial'];

$data_inicial = "$ano_inicial-$mes_inicial-$dia_inicial";


$dia_final = $_POST['dia_final'];

$mes_final = $_POST['mes_final'];

$ano_final = $_POST['ano_final'];

$data_final = "$ano_final-$mes_final-$dia_final";










$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

?>





<body bgcolor="#<? printf("$linha[1]"); ?>" 

  

<? } ?>

<?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>



background="background/<? printf("$linha[1]"); ?>" bgproperties="fixed">

  

<? } ?>











      <p>

        <?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];	

?>

<? } ?>

</p>

      <form name="form1" method="post" action="menu.php">

        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit2" value="Voltar">

</form>

<p class="style4"><span class="style4"><strong>Total de contatos realizados no per&iacute;odo de <? echo " $dia_inicial-$mes_inicial-$ano_inicial " ?> at&eacute; <? echo " $dia_final-$mes_final-$ano_final ---->>> " ?>  <span class="style5">

  <strong>

  <?

$sql = "select * from telemarketing where data_abertura between '$data_inicial' and '$data_final'";

$resultado=mysql_query($sql);

$registros = mysql_num_rows($resultado);



echo $registros;

?>
</strong></span> </strong></span></p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%" height="150" valign="top"><div align="center">
      <table width="100%"  border="1">
        <tr bgcolor="#<? echo $cor ?>">
          <td width="15%"><div align="center" class="style7">Nome</div></td>
          <td width="6%"><div align="center" class="style7">Quant Contatos</div></td>
        </tr>
        <?



			

$sql = "SELECT * FROM estabelecimentos where status = 'Ativo' order by nfantasia asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];
$cidade_estab_pertence = $linha[10];






?>
        <tr>
          <td><div align="center">
              <form name="form2" method="post" action="mapa_producao.php">
                <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $nfantasia;  ?>">
                <input name="cidade_estab_pertence" type="hidden" id="cidade_estab_pertence" value="<? echo $cidade_estab_pertence; ?>">
                <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
                <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
                <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
                <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
                <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
                <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
                <input type="submit" name="button2" id="button2" value="<? echo $nfantasia; ?>">
              </form>
          </div></td>
          <td><div align="center"><span class="style7">
              <?

$sql = "select * from telemarketing where estab_pertence = '$nfantasia' and cidade_estab_pertence = '$cidade_estab_pertence' and data_abertura between '$data_inicial' and '$data_final' ";

$resultado=mysql_query($sql);

$registros = mysql_num_rows($resultado);



echo $registros;

?>
          </span></div></td>
        </tr>
        <? } ?>
      </table>
    </div></td>
    <td width="6%">&nbsp;</td>
    <td width="54%" valign="top"><div align="center">
        <table width="100%"  border="1">
          <tr>
            <td><div align="center" class="style2">Operador</div></td>
            <td><div align="center" class="style2">Contatos Efetuados</div></td>
          </tr>
          <?

$estab_pertence = $_POST['estab_pertence'];



$sql = "select * from telemarketing where estab_pertence = '$estab_pertence' and  data_abertura between '$data_inicial' and '$data_final' group by operador order by operador asc";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$operador = $linha[7];





?>
          <tr>
            <td width="24%" valign="top"><div align="center">
              <form name="form2" method="post" action="mapa_producao.php">
                <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence;  ?>">
                <input name="cidade_estab_pertence" type="hidden" id="cidade_estab_pertence" value="<? echo $cidade_estab_pertence; ?>">
                <input name="operador" type="hidden" id="operador" value="<? echo $operador;  ?>">
                <input name="dia_inicial" type="hidden" id="dia_inicial" value="<? echo $dia_inicial; ?>">
                <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo $mes_inicial; ?>">
                <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo $ano_inicial; ?>">
                <input name="dia_final" type="hidden" id="dia_final" value="<? echo $dia_final; ?>">
                <input name="mes_final" type="hidden" id="mes_final" value="<? echo $mes_final; ?>">
                <input name="ano_final" type="hidden" id="ano_final" value="<? echo $ano_final; ?>">
                <input type="submit" name="button" id="button" value="<? echo $operador; ?>">
              </form>
            </div></td>
            <td width="29%" valign="top"><div align="center"><span class="<? if($telemarketing=="Em Manuten&ccedil;&atilde;o"){echo"style3"; } else{ echo "style1"; } ?>">
                <?

$sql2 = "select * from telemarketing where estab_pertence = '$estab_pertence' and operador = '$operador' and data_abertura between '$data_inicial' and '$data_final' ";

$resultado2=mysql_query($sql2);

$registros = mysql_num_rows($resultado2);



echo $registros;
 
 ?>
            </span></div></td>
          </tr>
          <? } ?>
        </table>
        <p>
      <table width="100%"  border="1">
        <tr>
          <td><div align="center" class="style2">Cliente</div></td>
          <td class="style2"><div align="center">CPF</div></td>
          <td class="style2"><div align="center">Telefone</div></td>
          <td><div align="center" class="style2">Celular</div></td>
        </tr>
        <?

$operador = $_POST['operador'];



$sql = "select * from telemarketing where operador = '$operador' and  data_abertura between '$data_inicial' and '$data_final' order by operador asc";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$cpf = $linha[11];
$nome = $linha[12];
$telefone = $linha[13];
$celular = $linha[14];


$sql3 = "SELECT * FROM clientes where nome = '$nome' and cpf = '$cpf' order by nome asc";

$res3 = mysql_query($sql3);

while($linha=mysql_fetch_row($res3)) {



$cod_cliente = $linha[0];


}



?>
        <tr>
          <td width="24%" valign="top"><div align="center"><span class="<? if($telemarketing=="Em Manuten&ccedil;&atilde;o"){echo"style3"; } else{ echo "style1"; } ?>"><? echo $nome; ?></span></div></td>
          <td width="29%" valign="top"><div align="center"><span class="<? if($telemarketing=="Em Manuten&ccedil;&atilde;o"){echo"style3"; } else{ echo "style1"; } ?>"><? echo $cpf; ?></span></div></td>
          <td width="29%" valign="top"><div align="center"><span class="<? if($telemarketing=="Em Manuten&ccedil;&atilde;o"){echo"style3"; } else{ echo "style1"; } ?>"><? echo $telefone; ?></span></div></td>
          <td width="29%" valign="top"><div align="center"><span class="<? if($telemarketing=="Em Manuten&ccedil;&atilde;o"){echo"style3"; } else{ echo "style1"; } ?>"><? echo $celular; ?></span></div></td>
        </tr>
        <tr>
          <td colspan="4" valign="top"><div align="center">
            <textarea name="obs_cli" cols="100" rows="7" readonly="readonly" id="obs_cli"><?  

$sql4 = "SELECT * FROM obs_telemarketing where cod_cliente = '$cod_cliente' order by codigo desc";
$res4 = mysql_query($sql4);
$reg = 0;
while($linha=mysql_fetch_row($res4)) {



$codigo = $linha[0];

$cod_cliente = $linha[1];

$dia = $linha[2];

$mes = $linha[3];

$ano = $linha[4];

$hora = $linha[5];

$operador = $linha[6];

$estab_pertence = $linha[7];

$cidade_estab_pertence = $linha[8];

$obs = $linha[9];



echo "$dia/$mes/$ano - $hora - "."$operador - $estab_pertence - $cidade_estab_pertence - "."$obs";

?>



<?






}

	  

	  

	  

	  

	   ?>

            </textarea>
          </div></td>
        </tr>
        <? }  ?>
      </table>
      <p>&nbsp;</p>
    </div></td>
  </tr>
</table>
<p class="style4"><br>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">

<?

$sql = "SELECT * FROM cad_empresa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$nfantasia = $linha[2];

$endereco = $linha[5];

$numero = $linha[6];

$bairro = $linha[7];

$cep = $linha[9];

$cidade = $linha[10];

$estado = $linha[11];

$telefone = $linha[12];

$fax = $linha[13];

$email_empresa = $linha[14];

$site = $linha[15];



}



?>

<br>

<span class="style4"><strong><? echo $site; ?></strong></span>

<br>

<? echo $endereco; ?>

,

<? echo $numero; ?> - <? echo $bairro; ?> - <? echo $cidade; ?> - <? echo $estado; ?> - <? echo $cep; ?>

<br>

<? echo "Telefone / Fax: ". $telefone." "; ?>

/ <? echo $fax; ?>

<br>

<? echo "E-Mail: ". $email_empresa; ?>

</p>

<p align="center"><span class="style7">

  <? echo $meta_inss; ?>

</span><span class="style4"><strong><span class="style5"><strong>

</strong></span></strong></span> </p>

</body>

</html>

