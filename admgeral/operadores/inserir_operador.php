<?php
session_start(); //inicia sess�o...
if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...
echo ""; //se for emite mensagem positiva.
else //se n�o for...
header("Location: alerta.php");

ini_set('default_charset','UTF8_general_mysql500_ci');
?>

<html>
<head>
<title>CADASTRO DE OPERADORES</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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



$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

//$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[15];
	
	 
}
	?>


<?
$estab_pertence = $_POST['estab_pertence'];

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




<form name="form1" method="post" action="grava_operador.php">

<table width="100%" border="0" cellspacing="4">
    <tr> 
      <td>Tipo de operador </td>
      <td>      <strong><font color="#0000FF"><? echo "Funcion�rio"; ?></font></strong>
      <input name="tipo_op" type="hidden" id="tipo_op" value="<? echo "Funcionario"; ?>"></td>
      <td>Data Cadastro </td>
      <td><strong><font color="#0000FF"><? echo date('d-m-Y'); ?></font></strong>
        <input name="datacadastro" type="hidden" id="datacadastro2" value="<? echo date('d-m-Y'); ?>">
        <input name="horacadastro" type="hidden" id="horacadastro2" value="<? echo date('H:i:s'); ?>"></td>
    </tr>
    <tr>
      <td>Estabelecimento</td>
      <td><strong><font color="#0000FF"><? echo $estab_pertence; ?>
        <input name="estab_pertence" type="hidden" id="datacadastro" value="<? echo $estab_pertence; ?>">
      </font></strong></td>
      <td>Cidade</td>
      <td><strong><font color="#0000FF"><? echo $cidade_estab_pertence; ?>
            <input name="cidade_estab_pertence" type="hidden" id="estab_pertence" value="<? echo $cidade_estab_pertence; ?>">
      </font></strong></td>
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
    </tr>
    <tr> 
      <td>Nome</td>
      <td><input class='class02' name="nome" type="text" id="nome2" size="50" maxlength="50"></td>
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
    </tr>
    <tr> 
      <td width="20%">Data Nasc </td>
      <td width="30%"><input class='class02' name="data_nasc" type="text" id="data_nasc" size="15" maxlength="10"></td>
      <td width="16%">Sexo</td>
      <td width="34%"><select class='class02' name="sexo" id="sexo">
        <option>Masculino</option>
        <option>Feminino</option>
      </select>        
        <font color="#0000FF">&nbsp; </font></td>
    </tr>
    <tr> 
      <td>Estado Civil </td>
      <td><select class='class02' name="estadocivil" id="estadocivil">
        <option selected>Selecione</option>
        <?


    $sql = "select * from estado_civil order by estadocivil asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['estadocivil']."</option>";
    }
?>
      </select>        </td>
      <td>CPF</td>
      <td><input class='class02' name="cpf" type="text" id="cpf" size="18" maxlength="14"> 
      </td>
    </tr>
    <tr>
      <td>RG</td>
      <td><input class='class02' name="rg" type="text" id="rg" size="25" maxlength="25"> 
        &Oacute;rg&atilde;o 
        <input class='class02' name="orgao" type="text" id="cpf3" size="15" maxlength="14"></td>
      <td>Emiss&atilde;o</td>
      <td><input class='class02' name="emissao" type="text" id="cpf4" size="15" maxlength="10"> 
        dd/mm/aaaa </td>
    </tr>
    <tr>
      <td>Pai</td>
      <td><input class='class02' name="pai" type="text" id="pai" size="50" maxlength="50"></td>
      <td>M&atilde;e</td>
      <td><input class='class02' name="mae" type="text" id="endereco3" size="50" maxlength="50"></td>
    </tr>
    <tr> 
      <td>Endere&ccedil;o</td>
      <td><input class='class02' name="endereco" type="text" id="endereco" size="50" maxlength="50"> 
      </td>
      <td>N&uacute;mero</td>
      <td><input class='class02' name="numero" type="text" id="numero2" size="10" maxlength="10"> 
      </td>
    </tr>
    <tr> 
      <td><p>Bairro</p></td>
      <td><input class='class02' name="bairro" type="text" id="bairro" size="50" maxlength="50"> 
      </td>
      <td>Complemento</td>
      <td><input class='class02' name="complemento" type="text" id="endereco4" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><input class='class02' name="cidade" type="text" id="cidade" size="50" maxlength="50"></td>
      <td>Estado</td>
      <td><select class='class02' name="estado" id="select7">
        <option selected>Selecione</option>
        <?


    $sql = "select * from estados_do_brasil order by estado asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['estado']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr> 
      <td>Cep</td>
      <td><input class='class02' name="cep" type="text" id="cep" size="9" maxlength="9">
Use o formato 00000-000</td>
      <td>Telefone</td>
      <td><input class='class02' name="telefone" type="text" id="endereco5" size="15" maxlength="14"> </td>
    </tr>
    <tr> 
      <td>Celular</td>
      <td><input class='class02' name="celular" type="text" id="telefone" size="15" maxlength="14"></td>
      <td>E-Mail</td>
      <td><input class='class02' name="email" type="text" id="email" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td>Dia Fechamento Folha</td>
      <td><input class='class02' name="dia_fechamento_folha" type="text" id="dia_fechamento_folha" value="26" size="4" maxlength="2"></td>
      <td>Tempo  Almo&ccedil;o</td>
      <td><input class='class02' name="tempo_almoco" type="text" id="tempo_almoco" value="60" size="4" maxlength="2">
Em minutos</td>
    </tr>
    <tr>
      <td>Horas di&aacute;rias trabalhadas</td>
      <td><select class='class02' name="horas_diarias" id="horas_diarias">
        <option>8</option>
        <option selected>8.8</option>
      </select>
Horas Decimais</td>
      <td>Regime Contrata&ccedil;&atilde;o</td>
      <td><select class='class02' name="regimecontratacao" id="regimecontratacao">
        <option>CLT</option>
        <option selected>MEI</option>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Obs</td>
      <td>Cidades de Atua&ccedil;&atilde;o</td>
      <td><select class='class02' name="cidadeatuacao" id="cidadeatuacao">
		  <option selected></option>
          <?
    $sql = "select * from cidades_de_atuacao group by cidade order by cidade asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['cidade']."</option>";
    }
?>
      </select></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2"><textarea class='class02' name="obs" cols="50" rows="7" id="obs"></textarea></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Senha</td>
      <td><input class='class02' name="usuario" type="hidden" id="usuario">        <input class='class02' name="senha" type="password" id="senha"></td>
      <td>Tipo de Veiculo/Maquinario?</td>
      <td><span style="font-weight: bold">
        <select class='class02' name="tipofiltro" id="tipofiltro">
          <option selected><? echo "TODOS"; ?></option>
          
          <?
    $sql4 = "select * from tipos where concessionaria = '$estab_pertence' and status = 'ativo' order by tipo asc";
    $result4 = mysql_query($sql4);
    while($x=mysql_fetch_array($result4)){
  echo "<option>".$x['tipo']."</option>";
    }
?>
        </select>
      </span></td>
    </tr>
    <tr>
      <td>Obra</td>
      <td><span style="font-weight: bold">
        <select class='class02' name="obra" id="obra">
          <?
					  
    $sql = "select * from obras where concessionaria = '$estab_pertence' and statusobra = 'ativo'";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['obra']."</option>";
	}
?>
        </select>
      </span></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" align="center"  background="../../imagens_sistema/fundocelulas2.png"><strong>CONTROLE DE PERMISSOES</strong></td>
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
    </tr>
    <tr>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Cadastro de bancarias</strong></td>
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
      <td background="../../imagens_sistema/fundocelulas2.png"><strong>Aliquota dos cartoes</strong></td>
      <td background="../../imagens_sistema/fundocelulas2.png"><strong><span style="font-weight: bold">
        <select class='class02' name="aliquotas_dos_cartoes" id="aliquotas_dos_cartoes">
          <?
				echo "
				<option selected>$aliquotas_dos_cartoes</option>
				<option>sim</option>
				<option>nao</option>
				";	  
    		  
?>
        </select>
      </span></strong></td>
    </tr>
    <tr> 
      <td colspan="2"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type="submit" name="Submit" value="Salvar">
        <strong><font color="#0000FF">
        <input name="operador" type="hidden" id="operador" value="<? echo $nome; ?>">
          <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular; ?>">
          <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email; ?>">
          <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estabelecimento; ?>">
          <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estabelecimento; ?>">
          <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estabelecimento; ?>">
          <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estabelecimento; ?>">
          </font></strong></td><td><div align="right"> </div></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
