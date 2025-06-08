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
	color: #0000FF;
	font-weight: bold;
}
.style11 {font-size: 10px;
	font-weight: bold;
	color: #0000FF;
}

-->
</style>


</head>

<?



require '../conect/conect.php';




$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

$hora = date('H:i:s');
$hora_leitura = date('H:i:s');

//$date = date('Y-m-d');
$datecadastro = date('Y-m-d');
$datacadastro = date('d-m-Y');

//$hoje = date('Y-m-d');

$data_leitura = date('d-m-Y');


$dia = date('d');

$mes = date('m');

$ano = date('Y');

$ano_anterior = date('Y')-1;
$ano_atual = date('Y');
$ano_proximo = date('Y')+1;

$departamento = $_POST['departamento'];






$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_operador = $linha[0];

$nome_operador = $linha[1];

$ultimo_departamento_trabalhado = $linha[66];


}





$solicitacao = $_POST['solicitacao'];

if($solicitacao=="gravar_dp"){
	


$reg_departamento = $_POST['reg_departamento'];


$comando = "insert into departamento_trabalhado(operador,departamento,date,hora) values('$nome_operador','$departamento','$datecadastro','$hora')";



mysql_query($comando,$conexao);


$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`operadores` set `ultimo_departamento_trabalhado` = '$departamento' where `operadores`. `codigo` = '$codigo_operador'";

}

mysql_query($comando,$conexao);


}




$data_hoje = $_SESSION['data_hoje'];

$codigo_mensagem = $_POST['codigo_mensagem'];

$mensagem_lida = $_POST['mensagem_lida'];



if($mensagem_lida=="Lida"){

$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$comando = "update `$linha[1]`.`mensagens_ao_funcionario` set `codigo` = '$codigo_mensagem',`mensagem_lida` = '$mensagem_lida',`data_leitura` = '$data_leitura',`hora_leitura` = '$hora_leitura' where `mensagens_ao_funcionario`. `codigo` = '$codigo_mensagem' limit 1 ";

}



mysql_query($comando,$conexao);



}




$sql = "SELECT * FROM cx_entradas where categoria_conta = 'Abertura de Caixa' and datecadastro = '$datecadastro'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$registro_abertura_de_caixa = mysql_num_rows($res);




$datacadastro = $linha[3];

}


$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?> 

<body bgcolor="#<? printf("$linha[1]"); ?>"> 

<? } ?>


<?
$solicitacao_gravar_abertura_caixa = $_POST['solicitacao_gravar_abertura_caixa'];

if($solicitacao_gravar_abertura_caixa=="gravaraberturacaixa"){

$horacadastro = $_POST['horacadastro'];

$valor = $_POST['valor'];

$categoria_conta = $_POST['categoria_conta'];

$historico = $_POST['historico'];

$nfantasia = $_POST['nfantasia'];


$operador = $_POST['operador'];

$cel_operador = $_POST['cel_operador'];

$email_operador = $_POST['email_operador'];

$estabelecimento = $_POST['estabelecimento'];

$cidade_estabelecimento = $_POST['cidade_estabelecimento'];

$tel_estabelecimento = $_POST['tel_estabelecimento'];

$email_estabelecimento = $_POST['email_estabelecimento'];

$historico = $_POST['historico'];



$comando = "insert into cx_entradas(datacadastro,datecadastro,horacadastro,valor,nfantasia,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,historico,dia,mes,ano,categoria_conta,departamento) values('$datacadastro','$datecadastro','$horacadastro','$valor','$nfantasia','$nome_operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$historico','$dia','$mes','$ano','$categoria_conta','$departamento')";



mysql_query($comando,$conexao);


?>

<script>

alert("Abertura de caixa registrada com sucesso!!!...\n\n<? echo "$nome_operador"; ?> \n\nTenha um òtimo dia de trabalho $operador ");

window.location = "index.php";


</script>


<?

} 
 
?>









<?

//-------------------------------------------------------------------------------------------------

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];



$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg++;



$codigo_operador = $linha[0];

$nome_operador = $linha[1];

$senha_op = $linha[41];

$tipo_op = $linha[42];

$funcao = $linha[43];

$estab_pertence = $linha[44];

$bloqueio_parcial = $linha[57];

$ultimo_departamento_trabalhado = $linha[66];

?>
<?
if($ultimo_departamento_trabalhado=="GARCON"){

?>

<script>


window.location = "restaurante/atribuicao_de_mesas.php";


</script>

<?

}

?>


<table width="100%" border="0" cellspacing="4">

    <tr> 

      <td width="15%"><strong>Ol&aacute;! Seja bem vindo!<br> 

        </strong><strong><font color="#0000FF"><? echo $nome_operador; ?> 

            

</font></strong></td>

      <td width="17%"><strong>Fun&ccedil;&atilde;o</strong><br>      
          <span class="style1"><? echo $funcao; ?></span></td>
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

      <td><strong>Estabelecimento:</strong> <br>

        <strong><font color="#0000FF"><? echo $estab_pertence; ?>

        </font></strong><strong><font color="#0000FF">      </font></strong></td>
      <td><strong>Departamento</strong><br>
      <span class="style1"><? echo $ultimo_departamento_trabalhado; ?></span></td>

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

      <td colspan="2"><form name="form1" method="post" action="ponto/marcarponto.php">

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

        <? if($funcao<>"Agente"){ echo "<input type='submit' name='button' id='button' value='Marcar Ponto'>"; } ?>
      </form>        <strong><font color="#0000FF">      </font></strong></td>

      <td><strong><font color="#0000FF">          </font></strong></td>

      <td colspan="2"><form name="form2" method="post" action="operadores/editar_operador.php">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "<input type='submit' name='Submit2' value='Editar Dados Cadastrais'>"; } ?>
        </div>
      </form></td>
    </tr>

<?

if($reg==3){

echo "</tr><tr>";

$reg=0;

}

?>



<? } ?>
</table>








<table width="100%" border="0">
  <tr>
    <td><div align="center"> <TABLE width="100%" border=0 align="center" cellPadding=3 cellSpacing=4>
<tr>

    <?

$sql = "SELECT * FROM categorias_receitas group by departamento order by departamento asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg_departamento++;

$departamento_a_trabalhar = $linha[2];



?>
 <?
if(empty($ultimo_departamento_trabalhado)){
	

echo "<td><form name='form4' method='post' action='index.php'>";
     

  	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

      echo "<input type='hidden' name='departamento' id='departamento' value='$departamento_a_trabalhar'>
      <input name='solicitacao' type='hidden' id='solicitacao' value='gravar_dp'>";





      echo "<input type='submit' name='button' id='button' value='$departamento_a_trabalhar'>";
	  
	  
	  

echo "</form></td>";



if($reg_departamento==3){

echo "<br>";

$reg_departamento=0;

}

}

}

if(empty($ultimo_departamento_trabalhado)){
	
}
else{
	
echo "$nome_operador você está trabalhando no departamento $ultimo_departamento_trabalhado";
	
}

 ?>
 
 </tr>

</TABLE>
</div></td>
  </tr>
</table>
<p align="center">&nbsp;</p>
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

$hora_leitura = $linha[7];

$assunto = $linha[8];


?>
    <table width="100%"  border="0">
      <tr>
        <td width="9%"><div align="center"><? echo $data_mensagem; ?></div></td>
        <td width="9%"><div align="center"><? echo $hora_mensagem; ?></div></td>
        <td width="62%"><div align="center">
            <textarea name="mensagem" cols="120" rows="7" id="mensagem"><? echo "$assunto - $mensagem"; ?></textarea>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><form name="form9" method="post" action="telemarketing/menu.php">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "<input type='submit' name='button' id='button' value='Telemarketing'>"; } ?>
        <input name="nome3" type="hidden" id="nome3">
      </div>
    </form></td>
    <td><form action="clientes/menu.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "<input type='submit' name='Submit5' value='Clientes'>"; } ?>
        <input type="hidden" name="nome2" id="nome2">
      </div>
    </form></td>
    <td><form action="clientes/cupom.php" method="post" name="form5">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "CPF
        <input name='cpf' type='text' id='cpf2' size='11' maxlength='11'>
        <input type='submit' name='Submit52322' value='Registrar Cupom'>"; } ?>
      </div>
    </form></td>
    <td>&nbsp;</td>
    <td><form action="restaurante/atribuicao_de_mesas.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="GARCON") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='GARÇON'>"; } ?>
        <input type="hidden" name="solicitacao" id="solicitacao">
      </div>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>

    <td width="20%"><div align="center">
      <form action="index.php" method="post" name="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="BILHETERIA")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
      </form>
    </div></td>
    <td width="20%"><div align="center">
      <form action="index.php" method="post" name="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
        </form>
    </div></td>
    <td width="20%"><div align="center">
      <form action="index.php" method="post" name="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="HAPPY HOUR")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
        </form>
    </div></td>
    <td width="20%"><div align="center">
      <form action="index.php" method="post" name="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="LANCHONETE")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
        </form>
    </div></td>
    <td width="20%"><div align="center">
      <form action="index.php" method="post" name="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="QUIOSQUE")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
        </form>
    </div></td>
    <td width="20%"><div align="center">
      <form action="index.php" method="post" name="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="BUFFET")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
      </form>
    </div></td>
    <td width="22%"><div align="center"></div></td>
  </tr>

  <tr>

    <td><div align="center">
      <form action="index.php" method="post" name="form2">
        <div align="center">
        <?
		if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="BILHETERIA")){

         echo "R$
          <input name='valor' type='text' id='valor' size='10' maxlength='10'>";
		  
		}
		  ?>
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input name="solicitacao_gravar_abertura_caixa" type="hidden" id="solicitacao_gravar_abertura_caixa" value="gravaraberturacaixa">
          <input name="departamento" type="hidden" id="departamento" value="<? echo $ultimo_departamento_trabalhado; ?>">
          <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>">
          <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
          <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
          <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>">
          <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>">
          <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>">
          <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>">
          <input name="historico" type="hidden" id="historico" value="<? echo "Abertura de Caixa"; ?>">
          <input name="categoria_conta" type="hidden" id="categoria_conta" value="<? echo "Abertura de Caixa"; ?>">
          <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $estab_pertence; ?>">
          <?

if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="BILHETERIA")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
        </div>
      </form>
    </div></td>
    <td><form action="index.php" method="post" name="form2">
      <div align="center">
        <?
		if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="RESTAURANTE")){

         echo "R$
          <input name='valor' type='text' id='valor' size='10' maxlength='10'>";
		  
		}
		  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao_gravar_abertura_caixa" type="hidden" id="solicitacao_gravar_abertura_caixa" value="gravaraberturacaixa">
        <input name="departamento" type="hidden" id="departamento" value="<? echo $ultimo_departamento_trabalhado; ?>">
        <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>">
        <input name="historico" type="hidden" id="historico" value="<? echo "Abertura de Caixa"; ?>">
        <input name="categoria_conta" type="hidden" id="categoria_conta" value="<? echo "Abertura de Caixa"; ?>">
        <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $estab_pertence; ?>">
        <?

if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="RESTAURANTE")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
        </div>
    </form></td>
    <td><form action="index.php" method="post" name="form2">
      <div align="center">
        <?
		if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="HAPPY HOUR")){

         echo "R$
          <input name='valor' type='text' id='valor' size='10' maxlength='10'>";
		  
		}
		  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao_gravar_abertura_caixa" type="hidden" id="solicitacao_gravar_abertura_caixa" value="gravaraberturacaixa">
        <input name="departamento" type="hidden" id="departamento" value="<? echo $ultimo_departamento_trabalhado; ?>">
        <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>">
        <input name="historico" type="hidden" id="historico" value="<? echo "Abertura de Caixa"; ?>">
        <input name="categoria_conta" type="hidden" id="categoria_conta" value="<? echo "Abertura de Caixa"; ?>">
        <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $estab_pertence; ?>">
        <?

if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="HAPPY HOUR")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
        </div>
    </form></td>
    <td><form action="index.php" method="post" name="form2">
      <div align="center">
        <?
		if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="LANCHONETE")){

         echo "R$
          <input name='valor' type='text' id='valor' size='10' maxlength='10'>";
		  
		}
		  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao_gravar_abertura_caixa" type="hidden" id="solicitacao_gravar_abertura_caixa" value="gravaraberturacaixa">
        <input name="departamento" type="hidden" id="departamento" value="<? echo $ultimo_departamento_trabalhado; ?>">
        <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>">
        <input name="historico" type="hidden" id="historico" value="<? echo "Abertura de Caixa"; ?>">
        <input name="categoria_conta" type="hidden" id="categoria_conta" value="<? echo "Abertura de Caixa"; ?>">
        <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $estab_pertence; ?>">
        <?

if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="LANCHONETE")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
        </div>
    </form></td>
    <td><form action="index.php" method="post" name="form2">
      <div align="center">
        <?
		if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="QUIOSQUE")){

         echo "R$
          <input name='valor' type='text' id='valor' size='10' maxlength='10'>";
		  
		}
		  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao_gravar_abertura_caixa" type="hidden" id="solicitacao_gravar_abertura_caixa" value="gravaraberturacaixa">
        <input name="departamento" type="hidden" id="departamento" value="<? echo $ultimo_departamento_trabalhado; ?>">
        <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>">
        <input name="historico" type="hidden" id="historico" value="<? echo "Abertura de Caixa"; ?>">
        <input name="categoria_conta" type="hidden" id="categoria_conta" value="<? echo "Abertura de Caixa"; ?>">
        <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $estab_pertence; ?>">
        <?

if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="QUIOSQUE")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
        </div>
    </form></td>
    <td><form action="index.php" method="post" name="form2">
      <div align="center">
        <?
		if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="BUFFET")){

         echo "R$
          <input name='valor' type='text' id='valor' size='10' maxlength='10'>";
		  
		}
		  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao_gravar_abertura_caixa" type="hidden" id="solicitacao_gravar_abertura_caixa" value="gravaraberturacaixa">
        <input name="departamento" type="hidden" id="departamento" value="<? echo $ultimo_departamento_trabalhado; ?>">
        <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>">
        <input name="historico" type="hidden" id="historico" value="<? echo "Abertura de Caixa"; ?>">
        <input name="categoria_conta" type="hidden" id="categoria_conta" value="<? echo "Abertura de Caixa"; ?>">
        <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $estab_pertence; ?>">
        <?

if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="BUFFET")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
      </div>
    </form></td>
    <td><div align="center"></div></td>
  </tr>

  <tr>
    <td><div align="center">
      <form action="orcamentos/selecione_cliente_para_abrir_orcamento.php" method="post" name="form2">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
      </form>
    </div></td>
    <td><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
        </div>
    </form></td>
    <td><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="HAPPY HOUR") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
        </div>
    </form></td>
    <td><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
        </div>
    </form></td>
    <td><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="QUIOSQUE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
        </div>
    </form></td>
    <td><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BUFFET") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
      </div>
    </form></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><form action="caixa/relatorio_geral_cx_diario.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
      </div>
    </form></td>
    <td><form action="caixa/relatorio_geral_cx_diario.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
        </div>
    </form></td>
    <td><form action="caixa/relatorio_geral_cx_diario.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="HAPPY HOUR") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
        </div>
    </form></td>
    <td><form action="caixa/relatorio_geral_cx_diario.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
        </div>
    </form></td>
    <td><form action="caixa/relatorio_geral_cx_diario.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="QUIOSQUE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
        </div>
    </form></td>
    <td><form action="caixa/relatorio_geral_cx_diario.php" method="post" name="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BUFFET") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
      </div>
    </form></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>

    <td colspan="2"><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
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

      <input type="submit" name="Submit4" value="Imprimir Contrato">

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