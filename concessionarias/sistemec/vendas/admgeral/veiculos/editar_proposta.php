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

<title>FICHA PROPOSTA DE FINANCIAMENTO DE VEICULO </title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<?



require '../../conect/conect.php';



$num_proposta = $_POST['num_proposta'];

?>

<?
$sql = "select * from db";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$comando = "update `$linha[1]`.`propostas_veiculos` set `num_proposta` = '$num_proposta',`status` = 'Re-Analise'

 where `propostas_veiculos`. `num_proposta` = '$num_proposta' limit 1 ";

}

mysql_query($comando,$conexao);

?>


<?

$estabelecimento_proposta = $_POST['estabelecimento_proposta'];

$cpf = $_POST['cpf'];

$valor_venda = $_POST['valor_venda'];

$valor_entrada = $_POST['valor_entrada'];

$categoria_veiculo = $_POST['categoria_veiculo'];

$r_2 = $_POST['r'];

$r_calcula = $_POST['r']/100;

$dataalteracao = $_POST['dataalteracao'];

$horaalteracao = $_POST['horaalteracao'];



$r = $r_calcula;







$sql = "SELECT * FROM tac where categoria_veiculo = '$categoria_veiculo'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {



$tac = $linha[2];

}







$diferenca = bcsub($valor_venda,$valor_entrada,2);





$sql = "SELECT * FROM fundo_navegacao";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$reg++;

?>





<body bgcolor="#<? printf("$linha[1]"); ?>" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

  <?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>

  

<? } ?>









<form name="form1" method="post" action="index.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit3" value="Voltar">

</form>







<?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nome_op = $linha[1];

$celular_op = $linha[19];

$email_op = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$tel_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];



}

?>









<?



$sql = "SELECT * FROM propostas_veiculos where num_proposta = '$num_proposta'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$num_proposta = $linha[0];

$dataproposta = $linha[1];

$horaproposta = $linha[2];

$mes_ano = $linha[3];

$estabelecimento_proposta = $linha[4];

$operador_atendente = $linha[5];

$status = $linha[6];

$tipo = $linha[7];

$tipo_proposta = $linha[8];

$nome = $linha[9];

$tipo_pessoa = $linha[10];

$data_nasc = $linha[11];

$cpf = $linha[12];

$rg = $linha[13];

$orgao = $linha[14];

$emissao = $linha[15];

$sexo = $linha[16];

$estadocivil = $linha[17];

$nacionalidade = $linha[18];

$quant_dependente = $linha[19];

$pai = $linha[20];

$mae = $linha[21];

$conjuge = $linha[22];

$data_nasc_conjuge = $linha[23];

$endereco = $linha[24];

$numero = $linha[25];

$bairro = $linha[26];

$complemento = $linha[27];

$cidade = $linha[28];

$estado = $linha[29];

$cep = $linha[30];

$correspondencia = $linha[31];

$tipo_residencia = $linha[32];

$valor_aluguel = $linha[33];

$tempo_residencia = $linha[34];

$telefone = $linha[35];

$celular = $linha[36];

$tipo_telefone = $linha[37];

$residencia_anterior = $linha[38];

$bairro_anterior = $linha[39];

$cidade_anterior = $linha[40];

$estado_anterior = $linha[41];

$tempo_residencia_anterior = $linha[42];

$email = $linha[43];

$empresa = $linha[44];

$porte_empresa = $linha[45];

$data_admissao = $linha[46];

$inicio_atividade = $linha[47];

$end_empresa = $linha[48];

$numero_empresa = $linha[49];

$complemento_empresa = $linha[50];

$bairro_empresa = $linha[51];

$cep_empresa = $linha[52];

$cidade_empresa = $linha[53];

$estado_empresa = $linha[54];

$telefone_empresa = $linha[55];

$cpt = $linha[56];

$serie = $linha[57];

$cargo = $linha[58];

$natureza_operacao = $linha[59];

$salario = $linha[60];

$atividade_principal = $linha[61];

$data_constituicao = $linha[62];

$cnpj = $linha[63];

$inscr_est = $linha[64];

$tel_contador = $linha[65];

$atividade_anterior = $linha[66];

$data_admissao_anterior = $linha[67];

$data_saida = $linha[68];

$cargo_anterior = $linha[69];

$telefone_empresa_anterior = $linha[70];

$outras_rendas = $linha[71];

$ref_pessoal = $linha[72];

$tel_ref_pessoal = $linha[73];

$ref_pessoal2 = $linha[74];

$tel_ref_pessoal2 = $linha[75];

$ref_comercial = $linha[76];

$tel_ref_comercial = $linha[77];

$ref_banco = $linha[78];

$ref_agencia = $linha[79];

$ref_conta = $linha[80];

$ref_tipo_conta = $linha[81];

$ref_conta_desde = $linha[82];

$cartao_credito = $linha[83];

$automovel = $linha[84];

$valor_automoveis = $linha[85];

$residencia = $linha[86];

$valor_residencia = $linha[87];

$outras_propriedades = $linha[88];

$valor_outras_propriedades = $linha[89];

$veiculo = $linha[90];

$ano_modelo = $linha[91];

$renavam = $linha[92];

$num_portas = $linha[93];

$combustivel = $linha[94];

$placa = $linha[95];

$valor_venda = $linha[96];

$valor_entrada = $linha[97];

$tarifa_cadastro = $linha[98];

$valor_financiar = $linha[99];

$coeficiente = $linha[100];

$codigo_tabela = $linha[101];

$num_parcelas = $linha[102];

$valor_parcelas = $linha[103];

$vencto_1_parcela = $linha[104];

$r = $linha[105];

$valor_liberado = $linha[106];

$pagto_serv_terc = $linha[107];

$obs = $linha[108];

$operador = $linha[109];

$cel_operador = $linha[110];

$email_operador = $linha[111];

$estab_pertence = $linha[112];

$cidade_estab_pertence = $linha[113];

$tel_estab_pertence = $linha[114];

$email_estab_pertence = $linha[115];

$operador_alterou = $linha[116];

$cel_operador_alterou = $linha[117];

$email_operador_alterou = $linha[118];

$estab_alterou = $linha[119];

$cidade_estab_alterou = $linha[120];

$tel_estab_alterou = $linha[121];

$email_estab_alterou = $linha[122];

$dataalteracao = $linha[123];

$horaalteracao = $linha[124];

$recebido = $linha[125];

$comissao_op = $linha[126];

$meses = $linha[127];

$trinta = $linha[128];

$quarenta_cinco = $linha[129];

$meses_residencia = $linha[130];

$ddd_tel = $linha[131];

$ddd_cel = $linha[132];

$ddd_tel_empresa = $linha[133];

$ddd_tel_contador = $linha[134];

$ddd_tel_empresa_anterior = $linha[135];

$ddd_ref_pessoal = $linha[136];

$ddd_ref_pessoal2 = $linha[137];

$ddd_ref_comercial = $linha[138];

$digito_agencia = $linha[139];

$digito_conta = $linha[140];

$ano_ref_conta = $linha[141];

$modelo = $linha[142];

$estado_emissao = $linha[143];

$mista = $linha[144];

$parecer_credito = $linha[145];

$bem = $linha[146];

$chassi = $linha[147];

$bco_operacao = $linha[158];


}



?>





<?

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estabelecimento_proposta' and operador_atendente = '$nome_op'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$nfantasia = $linha[1];

$fone_estab = $linha[19];

$email_estab = $linha[20];

$proprietario = $linha[20];

$operador_atendente = $linha[41];



}



?>

<form name="form1" method="post" action="grava_editar_proposta.php">



<table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4"> EDITANDO PROPOSTA DE FINANCIAMENTO DE VEICULO N&ordm; </font><font color="#0000FF"><? echo $num_proposta; ?> 

              <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $num_proposta; ?>">

      </font></strong></div></td>

    </tr>

    <tr>

      <td width="15%">Operador</td>

      <td width="31%"><strong><font color="#0000FF">            

        <select name="operador_atendente" id="select16">

              <option selected><? echo $operador_atendente; ?></option>

              <?





    $sql = "select * from operadores order by nome asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['nome']."</option>";

    }

?>

        </select>

</font></strong></td>

      <td width="23%">Status</td>

      <td width="31%"><strong><font color="#0000FF">
        <select name="status" id="status">
          <option selected><? echo $status; ?></option>
          <?





    $sql = "select * from status where setor = 'CP_VEICULOS' order by status asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['status']."</option>";

    }

?>
        </select>
      </font></strong></td>

    </tr>

    <tr>

      <td>Estabelecimento</td>

      <td><strong><font color="#0000FF">            

	        <select name="estabelecimento_proposta" id="select5">

              <option selected><? echo $estabelecimento_proposta; ?></option>

              <?





    $sql = "select * from estabelecimentos order by nfantasia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['nfantasia']. ">".$x['nfantasia']."</option>";

    }

?>

            </select>

</font></strong></td>

      <td>Data Proposta </td>

      <td><strong><font color="#0000FF">

            <? echo date('d-m-Y'); ?>

            <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo date('m-Y'); ?>">

      </font></strong></td>

    </tr>

    <tr>

      <td>Perfil do cliente </td>

      <td><strong><font color="#0000FF">

            <select name="tipo" id="tipo">

              <option><? echo $tipo; ?></option>

              <option>Proponente</option>

              <option>Avalista</option>

              <option>Conjuge</option>

            </select>

</font></strong></td>

      <td>Tipo proposta </td>

      <td><strong><font color="#0000FF">

            <select name="tipo_proposta" id="tipo_proposta">

              <option><? echo $tipo_proposta; ?></option>

              <option>CDC</option>

              <option>Leasing</option>

              <option>Cons&oacute;rcio</option>

              <option>Seguro</option>

            </select>

</font></strong></td>

    </tr>

    <tr>

      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">DADOS DO CLIENTE </font></strong></div></td>

    </tr>

    <tr>

      <td>Nome</td>

      <td><input name="nome" type="text" id="nome" value="<? echo $nome; ?>" size="50" maxlength="50"></td>

      <td>Tipo de Pessoa </td>

      <td><select name="tipo_pessoa" id="tipo_pessoa">

              <option><? echo $tipo_pessoa; ?></option>

        <option>F&iacute;sica</option>

        <option>Jur&iacute;dica</option>

      </select>

       Data Nasc 

       <input name="data_nasc" type="text" id="data_nasc4" value="<? echo $data_nasc; ?>" size="15" maxlength="10"></td>

    </tr>

    <tr>

      <td>CPF</td>

      <td><input name="cpf" type="text" id="cpf" value="<? echo $cpf; ?>">

      <strong></strong></td>

      <td>RG</td>

      <td><input name="rg" type="text" id="rg2" value="<? echo $rg; ?>" size="25" maxlength="25"></td>

    </tr>

    <tr>

      <td>&Oacute;rg&atilde;o Emissor </td>

      <td><input name="orgao" type="text" id="orgao2" value="<? echo $orgao; ?>" size="15" maxlength="14"> 

      - 

        <select name="estado_emissao" id="estado_emissao">

		              <option><? echo $estado_emissao; ?></option>

          <option>AC</option>

          <option>AL</option>

          <option>AP</option>

          <option>AM</option>

          <option>BA</option>

          <option>CE</option>

          <option>DF</option>

          <option>GO</option>

          <option>ES</option>

          <option>MA</option>

          <option>MT</option>

          <option>MS</option>

          <option>MG</option>

          <option>PA</option>

          <option>PB</option>

          <option>PR</option>

          <option>PE</option>

          <option>PI</option>

          <option>RJ</option>

          <option>RN</option>

          <option>RS</option>

          <option>RO</option>

          <option>RR</option>

          <option>SP</option>

          <option>SC</option>

          <option>SE</option>

          <option>TO</option>

        </select></td>

      <td>Data de Emiss&atilde;o</td>

      <td><input name="emissao" type="text" id="emissao2" value="<? echo $emissao; ?>" size="15" maxlength="10"></td>

    </tr>

    <tr>

      <td>Sexo</td>

      <td><select name="sexo" id="select3">

        <option selected><? echo $sexo; ?></option>

        <option>Masculino</option>

        <option>Feminino</option>

      </select></td>

      <td>Estado Civil</td>

      <td><select name="estadocivil" id="select6">

        <option selected><? echo $estadocivil; ?></option>

        <?





    $sql = "select * from estado_civil order by estadocivil asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estadocivil']. ">".$x['estadocivil']."</option>";

    }

?>

      </select></td>

    </tr>

    <tr>

      <td>Nacionalidade</td>

      <td><select name="nacionalidade" id="select7">

        <option><? echo $nacionalidade; ?></option>

        <option>Brasileira</option>

        <option>Estrangeira</option>

            </select></td>

      <td>Quant Dependentes </td>

      <td><input name="quant_dependente" type="text" id="quant_dependente" value="<? echo $quant_dependente; ?>" size="4" maxlength="2"></td>

    </tr>

    <tr>

      <td>Pai</td>

      <td><input name="pai" type="text" id="pai" value="<? echo $pai; ?>" size="50" maxlength="50"></td>

      <td>M&atilde;e</td>

      <td><input name="mae" type="text" id="mae2" value="<? echo $mae; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr>

      <td>Conjuge</td>

      <td><input name="conjuge" type="text" id="conjuge" value="<? echo $conjuge; ?>" size="50" maxlength="50"></td>

      <td>Data nascimento </td>

      <td><input name="data_nasc_conjuge" type="text" id="data_nasc" value="<? echo $data_nasc_conjuge; ?>" size="15" maxlength="10"></td>

    </tr>

    <tr>

      <td>Endere&ccedil;o</td>

      <td><input name="endereco" type="text" id="endereco2" value="<? echo $endereco; ?>" size="50" maxlength="50"></td>

      <td>N&uacute;mero</td>

      <td><input name="numero" type="text" id="numero" value="<? echo $numero; ?>" size="10" maxlength="10"></td>

    </tr>

    <tr>

      <td>Bairro</td>

      <td><input name="bairro" type="text" id="bairro2" value="<? echo $bairro; ?>" size="50" maxlength="50"></td>

      <td>Complemento</td>

      <td><input name="complemento" type="text" id="complemento" value="<? echo $complemento; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr>

      <td>Cidade</td>

      <td><input name="cidade" type="text" id="cidade2" value="<? echo $cidade; ?>" size="50" maxlength="50"></td>

      <td>Estado</td>

      <td><select name="estado" id="select">

        <option selected><? echo $estado; ?></option>

        <?





    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";

    }

?>

      </select></td>

    </tr>

    <tr>

      <td>Cep</td>

      <td><input name="cep" type="text" id="cep2" value="<? echo $cep; ?>" size="9" maxlength="9">

      Use o formato 00000-000</td>

      <td>Endere&ccedil;o corresp</td>

      <td><select name="correspondencia" id="select2">

              <option><? echo $correspondencia; ?></option>

        <option>Residencial</option>

        <option>Comercial</option>

            </select></td>

    </tr>

    <tr>

      <td>Tipo de residencia </td>

      <td><select name="tipo_residencia" id="select8">

        <option selected><? echo $tipo_residencia; ?></option>

        <?





    $sql = "select * from tipos_residencias order by tipo_residencia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['tipo_residencia']. ">".$x['tipo_residencia']."</option>";

    }

?>

      </select></td>

      <td>Valor do aluguel R$ </td>

      <td><input name="valor_aluguel" type="text" id="valor_aluguel" value="<? echo $valor_aluguel; ?>"></td>

    </tr>

    <tr>

      <td>Tempo de resid&ecirc;ncia </td>

      <td>anos

        <input name="tempo_residencia" type="text" id="tempo_residencia" value="<? echo $tempo_residencia; ?>" size="10" maxlength="10"> 

        meses

        <input name="meses_residencia" type="text" id="meses_residencia" value="<? echo $meses_residencia; ?>" size="10" maxlength="10"> </td>

      <td>Telefone com DDD </td>

      <td><input name="ddd_tel" type="text" id="ddd_tel" value="<? echo $ddd_tel; ?>" size="4" maxlength="2"> 

      - 

        <input name="telefone" type="text" id="telefone2" value="<? echo $telefone; ?>" size="10" maxlength="9"></td>

    </tr>

    <tr>

      <td>Celular com DDD </td>

      <td><input name="ddd_cel" type="text" id="ddd_cel" value="<? echo $ddd_cel; ?>" size="4" maxlength="2"> 

      - 

        <input name="celular" type="text" id="celular2" value="<? echo $celular; ?>" size="10" maxlength="9"></td>

      <td>Tipo de telefone </td>

      <td><select name="tipo_telefone" id="select9">

        <option selected><? echo $tipo_telefone; ?></option>

        <?





    $sql = "select * from tipo_telefones order by tipo_telefone asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['tipo_telefone']. ">".$x['tipo_telefone']."</option>";

    }

?>

      </select></td>

    </tr>

    <tr>

      <td>Residencia anterior </td>

      <td><input name="residencia_anterior" type="text" id="residencia_anterior" value="<? residencia_anterior; ?>" size="50" maxlength="50"></td>

      <td>Bairro</td>

      <td><input name="bairro_anterior" type="text" id="bairro_anterior" value="<? bairro_anterior; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr>

      <td>Cidade</td>

      <td><input name="cidade_anterior" type="text" id="cidade_anterior" value="<? echo $cidade_anterior; ?>" size="50" maxlength="50"></td>

      <td>Estado</td>

      <td><select name="estado_anterior" id="select10">

        <option selected><? echo $estado_anterior; ?></option>

        <?





    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";

    }

?>

      </select></td>

    </tr>

    <tr>

      <td>Tempo</td>

      <td><input name="tempo_residencia_anterior" type="text" id="tempo_residencia_anterior" value="<? echo $tempo_residencia_anterior; ?>"></td>

      <td>E-Mail</td>

      <td><input name="email" type="text" id="email" value="<? echo $email; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr>

      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">INFORMA&Ccedil;&Otilde;ES PROFISSIONAIS</font></strong></div></td>

    </tr>

    <tr> 

      <td>Empresa</td>

      <td><input name="empresa" type="text" id="empresa" value="<? echo $empresa; ?>" size="50" maxlength="50"></td>

      <td>Porte da empresa </td>

      <td><select name="porte_empresa" id="select11">

        <option selected><? echo $porte_empresa; ?></option>

        <?





    $sql = "select * from porte_empresas order by porte_empresa asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['porte_empresa']. ">".$x['porte_empresa']."</option>";

    }

?>

      </select></td>

    </tr>

    <tr>

      <td>Tempo de servi&ccedil;o </td>

      <td>Anos

        <input name="data_admissao" type="text" id="data_admissao" value="<? echo $data_admissao; ?>" size="10" maxlength="10"> 

        meses 

        <input name="meses" type="text" id="meses" value="<? echo $meses; ?>" size="10" maxlength="10"></td>

      <td>Inicio da atividade  PJ </td>

      <td><input name="inicio_atividade" type="text" id="inicio_atividade" value="<? echo $inicio_atividade; ?>"></td>

    </tr>

    <tr>

      <td>Endere&ccedil;o</td>

      <td><input name="end_empresa" type="text" id="end_empresa" value="<? echo $end_empresa; ?>" size="50" maxlength="50"></td>

      <td>N&uacute;mero</td>

      <td><input name="numero_empresa" type="text" id="numero_empresa" value="<? echo $numero_empresa; ?>" size="10" maxlength="10"></td>

    </tr>

    <tr>

      <td>Complemento</td>

      <td><input name="complemento_empresa" type="text" id="complemento_empresa" value="<? echo $complemento_empresa; ?>"></td>

      <td>Bairro</td>

      <td><input name="bairro_empresa" type="text" id="bairro_empresa" value="<? echo $bairro_empresa; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr>

      <td>CEP</td>

      <td><input name="cep_empresa" type="text" id="cep_empresa" value="<? echo $cep_empresa; ?>"></td>

      <td>Cidade</td>

      <td><input name="cidade_empresa" type="text" id="cidade_empresa" value="<? echo $cidade_empresa; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr>

      <td>Estado</td>

      <td><select name="estado_empresa" id="select12">

        <option selected><? echo $estado_empresa; ?></option>

        <?





    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";

    }

?>

      </select></td>

      <td>Telefone</td>

      <td><input name="ddd_tel_empresa" type="text" id="ddd_tel_empresa" value="<? echo $ddd_tel_empresa; ?>" size="4" maxlength="2"> 

      - 

        <input name="telefone_empresa" type="text" id="telefone_empresa" value="<? echo $telefone_empresa; ?>" size="10" maxlength="9"></td>

    </tr>

    <tr>

      <td>Cargo</td>

      <td><input name="cargo" type="text" id="cargo" value="<? echo $cargo; ?>" size="50" maxlength="50"></td>

      <td>Natureza da opera&ccedil;&atilde;o </td>

      <td><select name="natureza_operacao" id="select13">

	    <option><? echo $natureza_operacao; ?></option>

        <option>Funcion&aacute;rio P&uacute;blico</option>

        <option>Aut&ocirc;nomo</option>

        <option>Profissional Liberal</option>

        <option>Empresa Privada - CLT</option>

        <option>Empresa P&uacute;blica</option>

        <option>Propriet&aacute;rio-S&oacute;cio-Rendas</option>

        <option>Aposentado-Pensionista</option>

        <option>Do lar-Estudante</option>

      </select></td>

    </tr>

    <tr>

      <td>Sal&aacute;rio/Rendimentos <font size="2">R$ </font></td>

      <td><input name="salario" type="text" id="salario" value="<? echo $salario; ?>"></td>

      <td>Atividade principal </td>

      <td><input name="atividade_principal" type="text" id="atividade_principal" value="<? echo $atividade_principal; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr>

      <td>CNPJ</td>

      <td><input name="cnpj" type="text" id="cnpj2" value="<? echo $cnpj; ?>" size="50" maxlength="50"></td>

      <td>Telefone contador com DDD </td>

      <td><input name="ddd_tel_contador" type="text" id="ddd_tel_contador2" value="<? echo $ddd_tel_contador; ?>" size="4" maxlength="2">

-

  <input name="tel_contador" type="text" id="tel_contador2" value="<? echo $tel_contador; ?>" size="10" maxlength="9"></td>

    </tr>

    <tr>

      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">ATIVIDADE/EMPREGO ANTERIOR </font></strong></div></td>

    </tr>

    <tr>

      <td>Atividade/emprego anterior </td>

      <td><input name="atividade_anterior" type="text" id="atividade_anterior" value="<? echo $atividade_anterior; ?>" size="50" maxlength="50"></td>

      <td>Data admiss&atilde;o</td>

      <td><input name="data_admissao_anterior" type="text" id="data_admissao_anterior" value="<? echo $data_admissao_anterior; ?>"></td>

    </tr>

    <tr>

      <td>Sa&iacute;da</td>

      <td><input name="data_saida" type="text" id="data_saida" value="<? echo $data_saida; ?>"></td>

      <td>Cargo</td>

      <td><input name="cargo_anterior" type="text" id="cargo_anterior" value="<? echo $cargo_anterior; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr>

      <td>Telefone</td>

      <td><input name="ddd_tel_empresa_anterior" type="text" id="ddd_tel_empresa_anterior" value="<? echo $ddd_tel_empresa_anterior; ?>" size="4" maxlength="2"> 

      - 

        <input name="telefone_empresa_anterior" type="text" id="telefone_empresa_anterior" value="<? echo $telefone_empresa_anterior; ?>" size="10" maxlength="9"></td>

      <td>Outras rendas </td>

      <td><input name="outras_rendas" type="text" id="outras_rendas" value="<? echo $outras_rendas; ?>" size="50" maxlength="50"></td>

    </tr>

    <tr>

      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">FONTES DE REFER&Ecirc;NCIA </font></strong></div></td>

    </tr>

    <tr>

      <td>Pessoal - Nome </td>

      <td><input name="ref_pessoal" type="text" id="ref_pessoal" value="<? echo $ref_pessoal; ?>" size="50"></td>

      <td>Telefone com DDD </td>

      <td><input name="ddd_ref_pessoal" type="text" id="ddd_ref_pessoal" value="<? echo $ddd_ref_pessoal; ?>" size="4" maxlength="2"> 

      - 

        <input name="tel_ref_pessoal" type="text" id="tel_ref_pessoal" value="<? echo $tel_ref_pessoal; ?>" size="10" maxlength="9"></td>

    </tr>

    <tr>

      <td>Pessoal - Nome </td>

      <td><input name="ref_pessoal2" type="text" id="ref_pessoal2" value="<? echo $ref_pessoal2; ?>" size="50"></td>

      <td>Telefone com DDD </td>

      <td><input name="ddd_ref_pessoal2" type="text" id="ddd_ref_pessoal2" value="<? echo $ddd_ref_pessoal2; ?>" size="4" maxlength="2"> 

      - 

        <input name="tel_ref_pessoal2" type="text" id="tel_ref_pessoal2" value="<? echo $tel_ref_pessoal2; ?>" size="10" maxlength="9"></td>

    </tr>

    <tr>

      <td>Comercial - Nome </td>

      <td><input name="ref_comercial" type="text" id="ref_comercial" value="<? echo $ref_comercial; ?>" size="50"></td>

      <td>Telefone com DDD </td>

      <td><input name="ddd_ref_comercial" type="text" id="ddd_ref_comercial" value="<? echo $ddd_ref_comercial; ?>" size="4" maxlength="2"> 

      - 

        <input name="tel_ref_comercial" type="text" id="tel_ref_comercial" value="<? echo $tel_ref_comercial; ?>" size="10" maxlength="9"></td>

    </tr>

    <tr>

      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">REFER&Ecirc;NCIAS FINANCEIRAS </font></strong></div></td>

    </tr>

    <tr>

      <td>Banco</td>

      <td><input name="ref_banco" type="text" id="ref_banco" value="<? echo $ref_banco; ?>" size="50"></td>

      <td>Ag&ecirc;ncia</td>

      <td><input name="ref_agencia" type="text" id="ref_agencia" value="<? echo $ref_agencia; ?>"> 

      - 

      <input name="digito_agencia" type="text" id="digito_agencia" value="<? echo $digito_agencia; ?>" size="4" maxlength="2"></td>

    </tr>

    <tr>

      <td>Conta</td>

      <td><input name="ref_conta" type="text" id="ref_conta" value="<? echo $ref_conta; ?>"> 

      - 

      <input name="digito_conta" type="text" id="digito_conta" value="<? echo $digito_conta; ?>" size="4" maxlength="2"></td>

      <td>Tipo</td>

      <td>        <select name="ref_tipo_conta" id="ref_tipo_conta">

        <option selected><? echo $ref_tipo_conta; ?></option>

        <option>Especial</option>

        <option>Sal&aacute;rio</option>

        <option>Comum</option>

        <option>Poupan&ccedil;a</option>

        <option>N&atilde;o Tem</option>

        </select></td>

    </tr>

    <tr>

      <td>Conta desde </td>

      <td>M&ecirc;s

<input name="ref_conta_desde" type="text" id="ref_conta_desde" value="<? echo $ref_conta_desde; ?>" size="4" maxlength="2"> 

        Ano 

        <input name="ano_ref_conta" type="text" id="ano_ref_conta" value="<? echo $ano_ref_conta; ?>" size="6" maxlength="4"></td>

      <td>Cart&atilde;o de cr&eacute;dito </td>

      <td><select name="cartao_credito" id="cartao_credito">

	    <option selected><? echo $cartao_credito; ?></option>

        <option>N&atilde;o tem</option>

        <option>Amex</option>

        <option>Diners</option>

        <option>Visa</option>

        <option>Credicard</option>

        <option>Outros</option>

      </select></td>

    </tr>

    <tr>

      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">REFER&Ecirc;NCIAS DE BENS </font></strong></div></td>

    </tr>

    <tr>

      <td>Autom&oacute;vel</td>

      <td><select name="automovel" id="automovel">

	    <option selected><? echo $automovel; ?></option>

        <option>N&atilde;o tem</option>

        <option>Tem um</option>

        <option>Tem mais de um</option>

      </select></td>

      <td>Valor total R$ </td>

      <td><input name="valor_automoveis" type="text" id="valor_automoveis" value="<? echo $valor_automoveis; ?>"> 

        0000.00 </td>

    </tr>

    <tr>

      <td>Resid&ecirc;ncia</td>

      <td><select name="residencia" id="residencia">

	    <option selected><? echo $residencia; ?></option>

        <option>N&atilde;o tem</option>

        <option>Resid&ecirc;ncia Pr&oacute;pria</option>

        <option>Resid&ecirc;ncia Financiada</option>

      </select></td>

      <td>Valor tota R$ </td>

      <td><input name="valor_residencia" type="text" id="valor_residencia" value="<? echo $valor_residencia; ?>"> 

        0000.00 </td>

    </tr>

    <tr>

      <td>Outras Propriedades </td>

      <td><select name="outras_propriedades" id="outras_propriedades">

	    <option selected><? echo $outras_propriedades; ?></option>

        <option>N&atilde;o tem</option>

        <option>Terreno(s)</option>

        <option>Fazenda(s)</option>

        <option>Ch&aacute;cara(s)</option>

        <option>Outras Urbanas</option>

      </select></td>

      <td>Valor total R$ </td>

      <td><input name="valor_outras_propriedades" type="text" id="valor_outras_propriedades" value="<? echo $valor_outras_propriedades; ?>">

        0000.00</td>

    </tr>

    <tr>

      <td colspan="4"><div align="center"><strong><font color="#0000FF" size="4">DADOS DA OPERA&Ccedil;&Atilde;O </font></strong><strong><font color="#0000FF" size="4"> - Operando pelo banco </font></strong><strong><font color="#0000FF">
      <select name="bco_operacao" id="bco_operacao">
        <option selected><? echo $bco_operacao ?></option>
        <?


    $sql = "select * from bco_operacao order by banco asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['banco']."</option>";
    }
?>
      </select>
      </font></strong></div></td>

    </tr>

    <tr>

      <td>Tipo de ve&iacute;culo </td>

      <td><select name="bem" id="select4">

	  <option selected><? echo $bem; ?></option>

        <?





    $sql = "select * from tipos_bens order by bem desc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['bem']."</option>";

    }

?>

      </select></td>

      <td>Chassi</td>

      <td><input name="chassi" type="text" id="chassi" value="<? echo $chassi; ?>" size="40"></td>

    </tr>

    <tr>

      <td>Marca e Ve&iacute;culo</td>

      <td><input name="veiculo" type="text" id="veiculo" value="<? echo $veiculo; ?>" size="50"></td>

      <td>Ano/Modelo</td>

      <td><input name="ano_modelo" type="text" id="ano_modelo" value="<? echo $ano_modelo; ?>" size="6" maxlength="4"> 

      - 

      <input name="modelo" type="text" id="modelo" value="<? echo $modelo; ?>" size="6" maxlength="4"></td>

    </tr>

    <tr>

      <td>Renavam</td>

      <td><input name="renavam" type="text" id="renavam" value="<? echo $renavam; ?>" size="50"></td>

      <td>N&ordm; de portas </td>

      <td>        <select name="num_portas" id="num_portas">

	    <option selected><? echo $num_portas; ?></option>

        <option>2</option>

        <option>4</option>

        </select></td>

    </tr>

    <tr>

      <td>Combust&iacute;vel</td>

      <td><select name="combustivel" id="combustivel">

	    <option selected><? echo $combustivel; ?></option>

        <option>Gasolina</option>

        <option>Alcool</option>

        <option>Diesel</option>

        <option>G&aacute;s Natural</option>

        <option>Biodiesel</option>

        <option>Querosene</option>

      </select></td>

      <td>Placa</td>

      <td><input name="placa" type="text" id="placa" value="<? echo $placa; ?>"></td>

    </tr>

    <tr>

      <td>Valor venda NF R$ </td>

      <td>

	    <strong>

	    <font color="#0000FF">

	  <input name="valor_venda" type="text" id="valor_venda" value="<? echo $valor_venda; ?>">

	  </font></strong> </td>

      <td>Valor de entrada R$ </td>

      <td><font color="#0000FF"><strong>

        <input name="valor_entrada" type="text" id="valor_entrada" value="<? echo $valor_entrada; ?>">

      </strong></font></td>

    </tr>

    <tr>

      <td>Tarifa cadastro </td>

      <td><strong></strong>        <input name="tarifa_cadastro" type="text" id="tarifa_cadastro2" value="<? echo $tac; ?>"></td>

      <td>Valor a financiar R$</td>

      <td><font color="#0000FF"><strong>

        <input name="valor_financiar" type="text" id="valor_financiar2" value="<? echo $valor_financiar; ?>">

      </strong></font></td>

    </tr>

    <tr>

      <td>Codigo da tabela</td>

      <td><input name="codigo_tabela" type="text" id="codigo_tabela" value="<? echo $codigo_tabela; ?>"> 

      Mista 

        <select name="mista" id="mista">

          <option selected><? echo $mista; ?></option>

          <option>Sim</option>

          <option>N&atilde;o</option>

        </select></td>

      <td>Coeficiente</td>

      <td><font color="#0000FF"><strong>

        <input name="coeficiente" type="text" id="coeficiente" value="<? echo $coeficiente; ?>">

      </strong></font></td>

    </tr>

    <tr>

      <td>Servi&ccedil;os Terceiros</td>

      <td><strong><font color="#0000FF">        </font></strong>        <input name="r" type="text" id="r" value="<? echo $r; ?>"></td>

      <td>Valor Liberado</td>

      <td><font color="#0000FF"><strong>

        <input name="valor_liberado" type="text" id="valor_liberado" value="<? echo $valor_liberado; ?>">

      </strong></font></td>

    </tr>

    <tr>

      <td>N&ordm; de parcelas</td>

      <td>        <select name="num_parcelas" id="num_parcelas">

	    <option selected><? echo $num_parcelas; ?></option>

        <option>12</option>

        <option>18</option>

        <option>24</option>

        <option>36</option>

        <option>42</option>

        <option>48</option>

        <option>50</option>

        <option>60</option>

        <option>72</option>

        </select></td>

      <td>Valor da parcela</td>

      <td><input name="valor_parcelas" type="text" id="valor_parcelas" value="<? echo $valor_parcelas; ?>"></td>

    </tr>

    <tr>

      <td>Car&ecirc;ncia</td>

      <td><strong><font color="#0000FF"><? echo $trinta; ?> <? echo $quarenta_cinco; ?></font></strong>

        - Alterar para

          <input name="trinta" type="checkbox" id="trinta2" value="30 DD" <? if($trinta<>"")echo "checked"; ?>>

        30 DD 

          <input name="quarenta_cinco" type="checkbox" id="quarenta_cinco2" value="45 DD" <? if($quarenta_cinco<>""){echo "checked";} ?>>

      45 DD </td>

      <td>Pagto Serv Terceiros </td>

      <td><strong>

        <font color="#0000FF">

        <input name="pagto_serv_terc" type="text" id="pagto_serv_terc" value="<? echo $pagto_serv_terc; ?>">

      </font>      </strong></td>

    </tr>

    <tr>

      <td>Observa&ccedil;&otilde;es</td>

      <td colspan="2"><textarea name="obs" cols="50" rows="5" id="obs"><? echo $obs; ?></textarea>

        <strong><font color="#0000FF">

        <input name="recebido" type="hidden" id="recebido2" value="<? echo $recebido; ?>">

      </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td colspan="2"><strong><font color="#0000FF">

        <input name="operador_alterou" type="hidden" id="operador3" value="<? echo $nome_op; ?>">

        <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou" value="<? echo $celular_op; ?>">

        <input name="email_operador_alterou" type="hidden" id="email_operador_alterou" value="<? echo $email_op; ?>">

        <input name="estab_alterou" type="hidden" id="estab_alterou" value="<? echo $estab_pertence; ?>">

        <input name="cidade_estab_alterou" type="hidden" id="cidade_estab_alterou" value="<? echo $cidade_estab_pertence; ?>">

        <input name="tel_estab_alterou" type="hidden" id="tel_estab_alterou" value="<? echo $tel_estab_pertence; ?>">

        <input name="email_estab_alterou" type="hidden" id="email_estab_alterou" value="<? echo $email_estab_pertence; ?>">

        <input name="dataalteracao" type="hidden" id="dataalteracao" value="<? echo date('d/m/Y'); ?>">

        <input name="horaalteracao" type="hidden" id="horaproposta" value="<? echo date('H:i:s'); ?>">

      </font></strong></td>

      <td>&nbsp;</td>

      <td><input name="cpt" type="hidden" id="cpt2" value="<? echo $cpt; ?>">

        <input name="serie" type="hidden" id="serie" value="<? echo $serie; ?>">

        <input name="vencto_1_parcela" type="hidden" id="vencto_1_parcela2" value="<? echo $vencto_1_parcela; ?>">

        <input name="data_constituicao" type="hidden" id="data_constituicao2" value="<? echo $data_constituicao; ?>">

        <input name="inscr_est" type="hidden" id="inscr_est2" value="<? echo $inscr_est; ?>"></td>

    </tr>

    <tr> 

      <td colspan="2"><?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

        <input type="submit" name="Submit" value="Salvar Altera&ccedil;&otilde;es"> 

          <input type="reset" name="Submit2" value="Limpar"> </td><td><div align="right"> </div></td>

      <td>&nbsp;</td>

    </tr>

  </table>

</form>

<form name="form1" method="post" action="">

  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="2"><strong>Operador<br>

      </strong><strong><font color="#0000FF"><? echo $nome_op; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>

              <? echo $email_op; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="20%"><strong>Celular:<font color="#0000FF"><br>

              <? echo $celular_op; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>

          <strong><font color="#0000FF"><? echo $estab_pertence; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $tel_estab_pertence; ?> </font></strong></td>

      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $email_estab_pertence; ?> </font><font color="#0000FF"> </font></strong></td>

      <td><strong>Cidade: <br>

            <font color="#0000FF"><? echo $cidade_estab_pertence; ?> </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><strong><font color="#0000FF"> </font><font color="#0000FF"> </font></strong></td>

      <td>&nbsp;</td>

      <td><strong></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

</form>

<form name="form1" method="post" action="">

  <?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM propostas_veiculos where num_proposta = '$num_proposta'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador_alterou = $linha[116];

$cel_operador_alterou = $linha[117];

$email_operador_alterou = $linha[118];

$estab_alterou = $linha[119];

$cidade_estab_alterou = $linha[120];

$tel_estab_alterou = $linha[121];

$email_estab_alterou = $linha[122];

$dataalteracao = $linha[123];

$horaalteracao = $linha[124];

?>

  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="2" valign="top" bgcolor="#CCCCCC"><strong>&Uacute;ltima altera&ccedil;&atilde;o efetuada pelo operador: <br>

      </strong><strong><font color="#0000FF"><? echo $operador_alterou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="35%" valign="top" bgcolor="#CCCCCC"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>

              <? echo $email_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="20%" valign="top" bgcolor="#CCCCCC"><strong>Celular:<font color="#0000FF"><br>

              <? echo $cel_operador_alterou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td width="18%" valign="top" bgcolor="#CCCCCC"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>

          <strong><font color="#0000FF"><? echo $estab_alterou; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="26%" valign="top" bgcolor="#CCCCCC"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $tel_estab_alterou; ?> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $email_estab_alterou; ?> </font><font color="#0000FF"> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong>Cidade: <br>

            <font color="#0000FF"><? echo $cidade_estab_alterou; ?> </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td valign="top" bgcolor="#CCCCCC"><strong>Data do Cadastro <br>

            <font color="#0000FF"><? echo $dataalteracao; ?> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong>Hora que foi efetuado o Cadastro <br>

            <font color="#0000FF"><? echo $horaalteracao; ?> </font></strong></td>

      <td valign="top" bgcolor="#CCCCCC"><strong></strong></td>

      <td valign="top" bgcolor="#CCCCCC">&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

  <? } ?>

</form>

<form name="form1" method="post" action="">

  <?



$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];





$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$operador_alterou = $linha[1];

$cel_operador_alterou = $linha[19];

$email_operador_alterou = $linha[20];

$estabelecimento_alterou = $linha[24];

$cidade_estabelecimento_alterou = $linha[25];

$tel_estabelecimento_alterou = $linha[26];

$email_estabelecimento_alterou = $linha[27];



?>

  <table width="100%" border="0" cellspacing="4">

    <tr>

      <td colspan="2"><strong><font color="#FF0000">Cadastro atualmente sendo alterado por: </font></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td colspan="2"><strong>Ol&aacute;! Seja bem vindo<br>

      </strong><strong><font color="#0000FF"><? echo $nome_op; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="35%"><strong><font color="#0000FF"> </font></strong><strong><font color="#000000">E-Mail do operador: </font><font color="#0000FF"><br>

              <? echo $email_op; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="20%"><strong>Celular:<font color="#0000FF"><br>

              <? echo $celular_op; ?> </font><font color="#0000FF"> </font></strong></td>

      <td width="1%">&nbsp;</td>

    </tr>

    <tr>

      <td width="18%"><strong><font color="#0000FF"> </font>Estabelecimento:</strong> <br>

          <strong><font color="#0000FF"><? echo $estab_pertence; ?> </font></strong><strong><font color="#0000FF"> </font></strong></td>

      <td width="26%"><strong><font color="#000000">Tel do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $tel_estab_pertence; ?> </font></strong></td>

      <td><strong><font color="#000000">E-Mail do estabelecimento: </font><font color="#0000FF"><br>

              <? echo $email_estab_pertence; ?> </font><font color="#0000FF"> </font></strong></td>

      <td><strong>Cidade: <br>

            <font color="#0000FF"><? echo $cidade_estab_pertence; ?> </font></strong></td>

      <td>&nbsp;</td>

    </tr>

    <tr>

      <td><strong><font color="#0000FF"> </font><font color="#0000FF"> </font></strong></td>

      <td>&nbsp;</td>

      <td><strong></strong></td>

      <td>&nbsp;</td>

      <td>&nbsp;</td>

    </tr>

  </table>

  <? } ?>

</form>

</body>

</html>

