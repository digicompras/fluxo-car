<?php
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');
?>

<html>
<head>
<title>EDI&Ccedil;&Atilde;O DE OPERADORES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
.class021 {    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #ffffff; 
	border-radius: 8px; 
	border: 3px solid #0404B4; 
	color: #000000; 
	cursor: pointer; 
	padding: 4px;
}
.class021 {    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #ffffff; 
	border-radius: 8px; 
	border: 3px solid #0404B4; 
	color: #000000; 
	cursor: pointer; 
	padding: 4px;
}
</style>
</head>
<?

require '../../conect/conect.php';



?>


<?

$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
	  
?>
	
<body background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">




<form name="form1" method="post" action="menu.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input class='class01' type="submit" name="Submit3" value="Voltar">
</form>
<?

$nome = $_POST['nome'];


$sql = "SELECT * FROM operadores where nome = '$nome'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$nome = $linha[1];
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
$dataalteracao_u = $linha[31];
$horaalteracao_u = $linha[32];
$operador_alterou_u = $linha[33];
$cel_operador_alterou_u = $linha[34];
$email_operador_alterou_u = $linha[35];
$estabelecimento_alterou_u = $linha[36];
$cidade_estabelecimento_alterou_u = $linha[37];
$tel_estabelecimento_alterou_u = $linha[38];
$email_estabelecimento_alterou_u = $linha[39];
$usuario_op = $linha[40];
$senha_op = $linha[41];
$tipo_op = $linha[42];
$funcao = $linha[43];
$estab_pertence = $linha[44];
$cidade_estab_pertence = $linha[45];
$tel_estab_pertence = $linha[46];
$email_estab_pertence = $linha[47];
$cidadeatuacao = $linha[48];
	
	$obra = $linha[50];
	
	$tipofiltro = $linha[52];
$regimecontratacao = $linha[60];
$dia_fechamento_folha = $linha[62];
$tempo_almoco = $linha[63];
$horas_diarias = $linha[64];
	
	$recebenotificacao = $linha[49];
	$iniciar_rdo_diferenciado = $linha[51];
	$estoque = $linha[54];
	$conciliacoes = $linha[55];
	$despesas = $linha[56];
	$veiculos = $linha[57];
	$rdo = $linha[58];
	$avisodepecas = $linha[59];
	$administracartaoponto = $linha[61];
	$relatoriodepecasutilizadas = $linha[65];
	$fornecedores = $linha[66];
	$inventario = $linha[67];
	$estoque_entradas = $linha[68];
	$cadastro_de_itens = $linha[69];
	$alimentacao_rdo = $linha[70];
	$estoque_entradas_por_xml_autorizado = $linha[71];
	$veiculodaempresa = $linha[72];
	$controlekm = $linha[75];
	$orcamento = $linha[76];
	$permissao_categoria_de_produtos = $linha[77];
	$inclui_mais_uma_nf = $linha[78];
	$financeiro = $linha[79];
	$relatoriodecomissao = $linha[80];
	$registrodeoperadores = $linha[81];
	$abrir_e_fechar_cx = $linha[82];
	$editar_produtos = $linha[83];
	$quantitativo_do_item_no_estoque = $linha[84];
	$categoria_despesas = $linha[85];
	$cadastro_de_contas_bancarias = $linha[86];
	$aliquotas_dos_cartoes = $linha[87];
	$classificacao = $linha[88];
	$retira_itens_do_orcamento = $linha[89];
	$vendas = $linha[90];
	$custo_fixo = $linha[91];
	$transferencia_de_estoque = $linha[92];
	$status_e_condicao_da_transferencia_de_estoque = $linha[93];
	$responder_transferencias_de_estoque = $linha[94];
	$visualiza_transferencias = $linha[95];
	$responsavelpelordo = $linha[97];
	
} 
	
	?>
<?

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$estab_pertence = $linha[2];
$cidade_estab_pertence = $linha[10];
$email_estab_pertence = $linha[14];
$tel_estab_pertence = $linha[12];



 }
	
?>
	
<form name="form1" method="post" action="grava_editar_operador.php">

<table width="100%" border="0" cellspacing="4">
    <tr>
      <td>&nbsp;</td>
      <td>Esse operador trabalha conosco desde </td>
      <td><strong><font color="#0000FF"><? echo $datacadastro; ?></font></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Tipo de operador </td>
      <td><strong><font color="#0000FF"><? echo $tipo_op; ?></font></strong>
        <input name="tipo_op" type="hidden" id="tipo_op" value="<? echo $tipo_op; ?>"></td>
      <td>C&oacute;digo</td>
      <td><strong><font color="#0000FF"><? echo $codigo; ?></font>
          <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
      </strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Estabelecimento</td>
      <td><strong><font color="#0000FF">              <select class='class02' name="estab_pertence" id="estab_pertence">
                <option selected><? echo $estab_pertence; ?></option>
                <?


    $sql = "select * from estabelecimentos where estab_pertence = '$estab_pertence' order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
              </select>
      </font></strong></td>
      <td>Cidade</td>
      <td><strong><font color="#0000FF"><? echo $cidade_estab_pertence; ?>
              <input name="cidade_estab_pertence" type="hidden" id="estab_pertence" value="<? echo $cidade_estab_pertence; ?>">
      </font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Telefone</td>
      <td><strong><font color="#0000FF"><? echo $tel_estab_pertence; ?>
              <input name="tel_estab_pertence" type="hidden" id="tel_estab_pertence" value="<? echo $tel_estab_pertence; ?>">
      </font></strong></td>
      <td>E_Mail</td>
      <td><strong><font color="#0000FF"><? echo $email_estab_pertence; ?>
              <input name="email_estab_pertence" type="hidden" id="estab_pertence3" value="<? echo $email_estab_pertence; ?>">
      </font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Nome</td>
      <td><input class='class02' name="nome" type="text" id="nome2" value="<? echo $nome; ?>" size="50" maxlength="50"></td>
      <td>Fun&ccedil;&atilde;o</td>
      <td><strong><font color="#0000FF">
      <select class='class02' name="funcao" id="funcao">
        <option selected><? echo $funcao; ?></option>
        <?


    $sql = "select * from funcao where estab_pertence = '$estab_pertence' order by funcao asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['funcao']."</option>";
    }
?>
      </select>
      </font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td width="18%">Data Nasc </td>
      <td width="27%"><input class='class02' name="data_nasc" type="text" id="data_nasc" value="<? echo $data_nasc; ?>" size="15" maxlength="10"></td>
      <td width="21%">Sexo</td>
      <td width="33%"><select class='class02' name="sexo" id="sexo">
	    <option selected><? echo $sexo; ?></option>
        <option>Masculino</option>
        <option>Feminino</option>
      </select>        
        <font color="#0000FF">&nbsp; </font></td>
      <td width="1%">&nbsp;</td>
    </tr>
    <tr> 
      <td>Estado Civil </td>
      <td><select class='class02' name="estadocivil" id="select3">
        <option selected><? echo $estadocivil; ?></option>
        <?


    $sql = "select * from estado_civil order by estadocivil asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['estadocivil']. ">".$x['estadocivil']."</option>";
    }
?>
      </select>        </td>
      <td>CPF</td>
      <td><input class='class02' name="cpf" type="text" id="cpf" value="<? echo $cpf; ?>" size="18" maxlength="14"> 
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>RG</td>
      <td><input class='class02' name="rg" type="text" id="rg" value="<? echo $rg; ?>" size="25" maxlength="25"> 
        &Oacute;rg&atilde;o 
        <input class='class02' name="orgao" type="text" id="cpf3" value="<? echo $orgao; ?>" size="15" maxlength="14"></td>
      <td>Emiss&atilde;o</td>
      <td><input class='class02' name="emissao" type="text" id="cpf4" value="<? echo $emissao; ?>" size="15" maxlength="10"> 
        dd/mm/aaaa </td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Pai</td>
      <td><input class='class02' name="pai" type="text" id="pai" value="<? echo $pai; ?>" size="50" maxlength="50"></td>
      <td>M&atilde;e</td>
      <td><input class='class02' name="mae" type="text" id="endereco3" value="<? echo $mae; ?>" size="50" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Endere&ccedil;o</td>
      <td><input class='class02' name="endereco" type="text" id="endereco" value="<? echo $endereco; ?>" size="50" maxlength="50"> 
      </td>
      <td>N&uacute;mero</td>
      <td><input class='class02' name="numero" type="text" id="numero2" value="<? echo $numero; ?>" size="10" maxlength="10"> 
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><p>Bairro</p></td>
      <td><input class='class02' name="bairro" type="text" id="bairro" value="<? echo $bairro; ?>" size="50" maxlength="50"> 
      </td>
      <td>Complemento</td>
      <td><input class='class02' name="complemento" type="text" id="endereco4" value="<? echo $complemento; ?>" size="50" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><input class='class02' name="cidade" type="text" id="cidade" value="<? echo $cidade; ?>" size="50" maxlength="50"></td>
      <td>Estado</td>
      <td><select class='class02' name="estado" id="select7">
        <option selected><? echo $estado; ?></option>
        <?


    $sql = "select * from estados_do_brasil order by estado asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";
    }
?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Cep</td>
      <td><input class='class02' name="cep" type="text" id="cep" value="<? echo $cep; ?>" size="9" maxlength="9">
Use o formato 00000-000</td>
      <td>Telefone</td>
      <td><input class='class02' name="telefone" type="text" id="endereco5" value="<? echo $telefone; ?>" size="15" maxlength="14"> </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Celular</td>
      <td><input class='class02' name="celular" type="text" id="telefone" value="<? echo $celular; ?>" size="15" maxlength="14"></td>
      <td>E-Mail</td>
      <td><input class='class02' name="email" type="text" id="email" value="<? echo $email; ?>" size="50" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Dia Fechamento Folha</td>
      <td><input class='class02' name="dia_fechamento_folha" type="text" id="dia_fechamento_folha" value="<? echo "$dia_fechamento_folha"; ?>" size="4" maxlength="2"></td>
      <td>Tempo  Almo&ccedil;o</td>
      <td><input class='class02' name="tempo_almoco" type="text" id="tempo_almoco" value="<? echo "$tempo_almoco"; ?>" size="4" maxlength="2">
        Em minutos</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Horas di&aacute;rias trabalhadas</td>
      <td><select class='class02' name="horas_diarias" id="horas_diarias">
        <option selected><? echo "$horas_diarias"; ?></option>
        <option>8</option>
        <option>8.8</option>
        </select>
        Horas Decimais</td>
      <td>Regime Contrata&ccedil;&atilde;o</td>
      <td><select class='class02' name="regimecontratacao" id="regimecontratacao">
		<option selected><? echo "$regimecontratacao"; ?></option>
        <option>CLT</option>
        <option>MEI</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Obs</td>
      <td>Cidade de Atua&ccedil;&atilde;o</td>
      <td><select class='class02' name="cidadeatuacao" id="cidadeatuacao">
          <option selected><? echo "$cidadeatuacao"; ?></option>
          <?
    $sql = "select * from cidades_de_atuacao group by cidade order by cidade asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cidade']."</option>";
    }
?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><textarea class='class02' name="obs" cols="50" rows="7" id="obs"><? echo $obs; ?></textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Senha</td>
      <td><input class='class021' name="usuario" type="hidden" id="usuario" value="<? echo $usuario_op; ?>">        <input name="senhadooperador" type="password" class='class02' id="senhadooperador" value="<? echo "$senha_op"; ?>" readonly="readonly"></td>
      <td>Tipo de Veiculo/Maquinario?</td>
      <td><span style="font-weight: bold">
        <select class='class02' name="tipofiltro" id="tipofiltro">
          <option selected><? echo "$tipofiltro"; ?></option>
		<option><? echo "TODOS"; ?></option>
          <?
    $sql4 = "select * from tipos where concessionaria = '$estab_pertence' and status = 'ativo' order by tipo asc";
    $result4 = mysql_query($sql4);
    while($x=mysql_fetch_array($result4)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
        </select>
      </span></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Obra</td>
      <td><span style="font-weight: bold">
        <select class='class02' name="obra" id="obra">
          <option>GERAL</option>
          <?
				echo "<option selected>$obra</option>";	  
    $sql = "select * from obras where concessionaria = '$estab_pertence' and statusobra = 'ativo'";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['obra']."</option>";
	}
?>
        </select>
      </span></td>
      <td>Classificacao</td>
      <td><select class='class02' name="classificacao" id="classificacao">
        <option selected="selected"><? echo "$classificacao"; ?></option>
		<option>MATRIZ</option>
        <option>FILIAL1</option>
        <option>FILIAL2</option>
        <option>FILIAL3</option>
        <option>FILIAL4</option>
        <option>FILIAL5</option>
        <option>FILIAL6</option>
        <option>FILIAL7</option>
        <option>FILIAL8</option>
        <option>FILIAL9</option>
        <option>FILIAL10</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center"  background="../../imagens_sistema/fundocelulas2.png"><strong>CONTROLE DE PERMISSOES</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
      <td  background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Responsavel pelo rdo?</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="responsavelpelordo" id="responsavelpelordo">
          <?
				echo "
				<option selected>$responsavelpelordo</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Receber Notifica&ccedil;&atilde;o?</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="recebenotificacao" id="recebenotificacao">
          <?
				echo "
				<option selected>$recebenotificacao</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Iniciar RDO Diferenciado?</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="iniciar_rdo_diferenciado" id="iniciar_rdo_diferenciado">
          <?
				echo "
				<option selected>$iniciar_rdo_diferenciado</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Estoque</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="estoque" id="estoque">
          <?
				echo "
				<option selected>$estoque</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Conciliacoes</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="conciliacoes" id="conciliacoes">
          <?
				echo "
				<option selected>$conciliacoes</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Despesas</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="despesas" id="despesas">
          <?
				echo "
				<option selected>$despesas</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Veiculos</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="veiculos" id="veiculos">
          <?
				echo "
				<option selected>$veiculos</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>RDO</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="rdo" id="rdo">
          <?
				echo "
				<option selected>$rdo</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Aviso de pe&ccedil;as</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="avisodepecas" id="avisodepecas">
          <?
				echo "
				<option selected>$avisodepecas</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Administra&ccedil;ao de ponto</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="administracartaoponto" id="administracartaoponto">
          <?
				echo "
				<option selected>$administracartaoponto</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Relatorio de pe&ccedil;as utilizadas</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="relatoriodepecasutilizadas" id="relatoriodepecasutilizadas">
          <?
				echo "
				<option selected>$relatoriodepecasutilizadas</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Fornecedores</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="fornecedores" id="fornecedores">
          <?
				echo "
				<option selected>$fornecedores</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Inventario</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="inventario" id="inventario">
          <?
				echo "
				<option selected>$inventario</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Estoque Entradas</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="estoque_entradas" id="estoque_entradas">
          <?
				echo "
				<option selected>$estoque_entradas</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Cadastro de itens</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="cadastro_de_itens" id="cadastro_de_itens">
          <?
				echo "
				<option selected>$cadastro_de_itens</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Alimentacao RDO</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="alimentacao_rdo" id="alimentacao_rdo">
          <?
				echo "
				<option selected>$alimentacao_rdo</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Estoque entradas por xml</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="estoque_entradas_por_xml_autorizado" id="estoque_entradas_por_xml_autorizado">
          <?
				echo "
				<option selected>$estoque_entradas_por_xml_autorizado</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Veiculo da empresa</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="veiculodaempresa" id="veiculodaempresa">
          <?
				echo "
				<option selected>$veiculodaempresa</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Controle de KM</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="controlekm" id="controlekm">
          <?
				echo "
				<option selected>$controlekm</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Orcamento</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="orcamento" id="orcamento">
          <?
				echo "
				<option selected>$orcamento</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong>Permissao de Categoria de Prdutos</strong></td>
      <td  background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="permissao_categoria_de_produtos" id="permissao_categoria_de_produtos">
          <?
				echo "
				<option selected>$permissao_categoria_de_produtos</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Financeiro</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="financeiro" id="financeiro">
          <?
				echo "
				<option selected>$financeiro</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Relatorio de comissao</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="relatoriodecomissao" id="relatoriodecomissao">
          <?
				echo "
				<option selected>$relatoriodecomissao</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Inclui mais um NF</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="inclui_mais_uma_nf" id="inclui_mais_uma_nf">
          <?
				echo "
				<option selected>$inclui_mais_uma_nf</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Registro de Operadores</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="registrodeoperadores" id="registrodeoperadores">
          <?
				echo "
				<option selected>$registrodeoperadores</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Abrir e Fechar CX</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="abrir_e_fechar_cx" id="abrir_e_fechar_cx">
          <?
				echo "
				<option selected>$abrir_e_fechar_cx</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Editar Produtos</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="editar_produtos" id="editar_produtos">
          <?
				echo "
				<option selected>$editar_produtos</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Quantitativo de item no estoque</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="quantitativo_do_item_no_estoque" id="quantitativo_do_item_no_estoque">
          <?
				echo "
				<option selected>$quantitativo_do_item_no_estoque</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Categoria despesas</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="categoria_despesas" id="categoria_despesas">
          <?
				echo "
				<option selected>$categoria_despesas</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Retira itens do Or&ccedil;amento</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class021' name="retira_itens_do_orcamento" id="retira_itens_do_orcamento">
          <?
				echo "
				<option selected>$retira_itens_do_orcamento</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Cadastro de contas bancarias</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="cadastro_de_contas_bancarias" id="cadastro_de_contas_bancarias">
          <?
				echo "
				<option selected>$cadastro_de_contas_bancarias</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Aliquotas dos Cartoes</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class021' name="aliquotas_dos_cartoes" id="aliquotas_dos_cartoes">
          <?
				echo "
				<option selected>$aliquotas_dos_cartoes</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Visualiza Vendas</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="vendas" id="vendas">
          <?
				echo "
				<option selected>$vendas</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Custo Fixo</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class021' name="custo_fixo" id="custo_fixo">
          <?
				echo "
				<option selected>$custo_fixo</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Transferencia de Estoque</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="transferencia_de_estoque" id="transferencia_de_estoque">
          <?
				echo "
				<option selected>$transferencia_de_estoque</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Status e Condi&ccedil;&atilde;o da Transferencia de Estoque</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="status_e_condicao_da_transferencia_de_estoque" id="status_e_condicao_da_transferencia_de_estoque">
          <?
				echo "
				<option selected>$status_e_condicao_da_transferencia_de_estoque</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Responder Transferencia de Estoque</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="responder_transferencias_de_estoque" id="responder_transferencias_de_estoque">
          <?
				echo "
				<option selected>$responder_transferencias_de_estoque</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Visualiza Transferencias</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="visualiza_transferencias" id="visualiza_transferencias">
          <?
				echo "
				<option selected>$visualiza_transferencias</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
      <td background="../../imagens_sistema/fundocelulas2.png">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type="submit" name="Submit" value="Salvar">
        <strong><font color="#0000FF">
        <input name="dataalteracao" type="hidden" id="dataalteracao" value="<? echo date('d-m-Y'); ?>">
          <input name="horaalteracao" type="hidden" id="horaalteracao" value="<? echo date('H:i:s'); ?>">
          <input name="operador_alterou" type="hidden" id="operador" value="<? echo $operador_alterou; ?>">
          <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou" value="<? echo $cel_operador_alterou; ?>">
          <input name="email_operador_alterou" type="hidden" id="email_operador_alterou" value="<? echo $email_operador_alterou; ?>">
          <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou" value="<? echo $estabelecimento_alterou; ?>">
          <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou" value="<? echo $cidade_estabelecimento_alterou; ?>">
          <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou" value="<? echo $tel_estabelecimento_alterou; ?>">
          <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou" value="<? echo $email_estabelecimento_alterou; ?>">
          </font></strong></td><td></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
