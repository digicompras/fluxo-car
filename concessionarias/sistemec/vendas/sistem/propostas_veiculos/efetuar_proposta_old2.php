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



$estabelecimento_proposta = $_POST['estabelecimento_proposta'];

$cpf = $_POST['cpf'];

$tipo_pessoa = $_POST['tipo_pessoa'];



$valor_venda = $_POST['valor_venda'];

$valor_entrada = $_POST['valor_entrada'];

$categoria_veiculo = $_POST['categoria_veiculo'];

$bem = $_POST['bem'];



$r_2 = $_POST['r'];

$r_calcula = $_POST['r']*1.2;



$r = $r_calcula/100;

$coeficiente = $_POST['coeficiente'];

$codigo_tabela = $_POST['codigo_tabela'];

$mista = $_POST['mista'];

$num_parcelas = $_POST['num_parcelas'];







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









<form name="form1" method="post" action="informacoes_antecedem_efetuar_proposta.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit3" value="Voltar">

  <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">

  <strong><font color="#0000FF">

  <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estabelecimento_proposta; ?>">

  <input name="valor_venda" type="hidden" id="valor_venda2" value="<? echo $valor_venda; ?>">

  <strong>

  <input name="valor_entrada" type="hidden" id="valor_entrada2" value="<? echo $valor_entrada; ?>">

  <input name="r" type="hidden" id="r" value="<? echo $r_2; ?>">

  <input name="categoria_veiculo" type="hidden" id="r3" value="<? echo $categoria_veiculo; ?>">

  <input name="coeficiente" type="hidden" id="coeficiente" value="<? echo $coeficiente; ?>">

  <input name="codigo_tabela" type="hidden" id="codigo_tabela4" value="<? echo $codigo_tabela; ?>">

  <input name="mista" type="hidden" id="mista" value="<? echo $mista; ?>">

  <input name="num_parcelas" type="hidden" id="num_parcelas3" value="<? echo $num_parcelas; ?>">

  <font color="#0000FF"><strong>

  <input name="tipo_pessoa" type="hidden" id="tipo_pessoa" value="<? echo $tipo_pessoa; ?>">

  <font color="#0000FF"><strong>

  <input name="bem" type="hidden" id="num_parcelas4" value="<? echo $bem; ?>">

  </strong></font> </strong></font> </strong></font></strong>

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

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estabelecimento_proposta' and operador_atendente = '$nome_op'";

$res = mysql_query($sql);

$reg = 0;

echo "<tr>";

while($linha=mysql_fetch_row($res)) {





$codigo = $linha[0];

$razaosocial = $linha[1];

$nfantasia = $linha[2];

$cnpj = $linha[3];

$inscr_est = $linha[4];

$endereco = $linha[5];

$numero = $linha[6];

$bairro = $linha[7];

$complemento = $linha[8];

$cep = $linha[9];

$cidade = $linha[10];

$estado = $linha[11];

$telefone = $linha[12];

$fax = $linha[13];

$email = $linha[14];

$site = $linha[15];

$proprietario = $linha[16];

$cpf = $linha[17];

$rg = $linha[18];

$operador = $linha[24];

$cel_operador = $linha[25];

$email_operador = $linha[26];

$estabelecimento = $linha[27];

$cidade_estabelecimento = $linha[28];

$tel_estabelecimento = $linha[29];

$email_estabelecimento = $linha[30];

$obs = $linha[19];

$datacadastro = $linha[20];

$horacadastro = $linha[21];

$dataalteracao = $linha[22];

$horaalteracao = $linha[23];

$operador_alterou = $linha[31];

$cel_operador_alterou = $linha[32];

$email_operador_alterou = $linha[33];

$estabelecimento_alterou = $linha[34];

$cidade_estabelecimento_alterou = $linha[35];

$tel_estabelecimento_alterou = $linha[36];

$email_estabelecimento_alterou = $linha[37];

$operador_atendente = $linha[41];

$status = $linha[42];

$usuario_estab = $linha[43];

$senha_estab = $linha[44];

$num_banco = $linha[45];

$agencia = $linha[46];

$conta = $linha[47];



}



?>

<form name="form1" method="post" action="grava_proposta.php">



<table width="60%" border="1" align="center" cellspacing="0" bordercolor="#000000">

    <tr>

      <td colspan="3" bgcolor="#CCCCCC"><div align="center"><strong><font color="#0000FF" size="4">FICHA PROPOSTA DE FINANCIAMENTO DE VEICULO </font></strong></div></td>
    </tr>

    <tr>

      <td colspan="3"><font size="2">Operador</font><br><strong><font color="#0000FF" size="2"><? echo $operador_atendente; ?>

            <input name="operador_atendente" type="hidden" id="operador_atendente" value="<? echo $operador_atendente; ?>">

      </font></strong></td>
    </tr>

    <tr>

      <td width="50%"><font size="2">Estabelecimento</font><br>
        <strong><font color="#0000FF" size="2"><? echo $estabelecimento_proposta; ?>

            <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta" value="<? echo $estabelecimento_proposta; ?>">
      </font></strong></td>

      <td width="50%"><font size="2">Data Proposta</font><br> 
        <strong><font color="#0000FF" size="2">

            <? echo date('d-m-Y'); ?>

            <input name="dataproposta" type="hidden" id="dataproposta" value="<? echo date('d/m/Y'); ?>">

            <input name="horaproposta" type="hidden" id="horaproposta2" value="<? echo date('H:i:s'); ?>">

            <input name="mes_ano" type="hidden" id="mes_ano" value="<? echo date('m-Y'); ?>">

            <input name="status" type="hidden" id="status" value="<? echo "Em Andamento"; ?>">
        </font></strong></td>
    </tr>

    <tr>

      <td><font size="2">Perfil do cliente</font><br> 
        <strong><font color="#0000FF" size="2"><? echo $tipo; ?>

            <select name="tipo" id="tipo">

              <option>Proponente</option>

              <option>Avalista</option>

              <option>Conjuge</option>
            </select>
      </font></strong></td>

      <td><font size="2">Tipo proposta</font><br> 
        <strong><font color="#0000FF" size="2"><? echo $tipo_proposta; ?>

            <select name="tipo_proposta" id="tipo_proposta">

              <option>CDC</option>

              <option>Leasing</option>

              <option>Cons&oacute;rcio</option>

              <option>Seguro</option>
            </select>
        </font></strong></td>
    </tr>

    <tr>

      <td colspan="3" bgcolor="#CCCCCC"><div align="center"><strong><font color="#0000FF" size="4">DADOS DO CLIENTE </font></strong></div></td>
    </tr>

    <tr>

      <td><font size="2">Nome<br>
        <input name="nome" type="text" id="nome" value="<? echo $nome_cli; ?>" size="50" maxlength="50">
      </font></td>

      <td><font size="2">Tipo de Pessoa<br> 
          <strong><font color="#0000FF"><? echo $tipo_pessoa; ?></font></strong>        
        <input name="tipo_pessoa" type="hidden" id="tipo_pessoa" value="<? echo $tipo_pessoa; ?>">       

        Data Nasc 

        <input name="data_nasc" type="text" id="data_nasc4" value="<? echo $data_nasc_cli; ?>" size="15" maxlength="10">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">CPF<br>
        <input name="cpf" type="text" id="cpf" value="<? echo $cpf; ?>" size="11" maxlength="11">

        <strong>Ex: 99999999999 </strong></font></td>

      <td><font size="2">RG<br>
        <input name="rg" type="text" id="rg2" value="<? echo $rg_cli; ?>" size="25" maxlength="25">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">&Oacute;rg&atilde;o Emissor<br> 
        <input name="orgao" type="text" id="orgao2" value="<? echo $orgao_cli; ?>" size="15" maxlength="14"> 

      - 

        <select name="estado_emissao" id="estado_emissao">
          
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
          </select>
      </font></td>

      <td><font size="2">Data de Emiss&atilde;o<br>
        <input name="emissao" type="text" id="emissao2" value="<? echo $emissao_cli; ?>" size="15" maxlength="10">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Sexo<br>
          <select name="sexo" id="select3">
            
            <option selected><? echo $sexo_cli; ?></option>
            
            <option>Masculino</option>
            
            <option>Feminino</option>
            </select>
      </font></td>

      <td><font size="2">Estado Civil<br>
          <select name="estadocivil" id="select6">
            
            <option selected><? echo $estadocivil_cli; ?></option>
            
            <?





    $sql = "select * from estado_civil order by estadocivil asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estadocivil']. ">".$x['estadocivil']."</option>";

    }

?>
            </select>
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Nacionalidade<br>
          <select name="nacionalidade" id="select7">
            
            <option><? echo $nacionalidade_cli; ?></option>
            
            <option>Brasileira</option>
            
            <option>Estrangeira</option>
              </select>
      </font></td>

      <td><font size="2">Quant Dependentes<br> 
        <input name="quant_dependente" type="text" id="quant_dependente" size="4" maxlength="2">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Pai<br>
        <input name="pai" type="text" id="pai" value="<? echo $pai_cli; ?>" size="50" maxlength="50">
      </font></td>

      <td><font size="2">M&atilde;e<br>
        <input name="mae" type="text" id="mae2" value="<? echo $mae_cli; ?>" size="50" maxlength="50">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Conjuge<br>
        <input name="conjuge" type="text" id="conjuge" size="50" maxlength="50">
      </font></td>

      <td><font size="2">Data nascimento<br> 
        <input name="data_nasc_conjuge" type="text" id="data_nasc" value="<? echo $data_nasc_cli; ?>" size="15" maxlength="10">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Endere&ccedil;o<br>
        <input name="endereco" type="text" id="endereco2" value="<? echo $endereco_cli; ?>" size="50" maxlength="50">
      </font></td>

      <td><font size="2">N&uacute;mero<br>
        <input name="numero" type="text" id="numero" value="<? echo $numero_cli; ?>" size="10" maxlength="10">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Bairro<br>
        <input name="bairro" type="text" id="bairro2" value="<? echo $bairro_cli; ?>" size="50" maxlength="50">
      </font></td>

      <td><font size="2">Complemento<br>
        <input name="complemento" type="text" id="complemento" value="<? echo $complemento_cli; ?>" size="50" maxlength="50">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Cidade<br>
        <input name="cidade" type="text" id="cidade2" value="<? echo $cidade_cli; ?>" size="50" maxlength="50">
      </font></td>

      <td><font size="2">Estado<br>
          <select name="estado" id="select">
            
            <option selected><? echo $estado_cli; ?></option>
            
            <?





    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";

    }

?>
            </select>
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Cep<br>
        <input name="cep" type="text" id="cep2" value="<? echo $cep_cli; ?>" size="9" maxlength="9">

      Use o formato 00000-000</font></td>

      <td><font size="2">Endere&ccedil;o corresp<br>
          <select name="correspondencia" id="select2">
            
            <option>Residencial</option>
            
            <option>Comercial</option>
              </select>
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Tipo de residencia<br> 
          <select name="tipo_residencia" id="select8">
            
            <option selected><? echo $tipo_residencia; ?></option>
            
            <?





    $sql = "select * from tipos_residencias order by tipo_residencia asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['tipo_residencia']. ">".$x['tipo_residencia']."</option>";

    }

?>
            </select>
      </font></td>

      <td><font size="2">Valor do aluguel R$<br> 
        <input name="valor_aluguel" type="text" id="valor_aluguel">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Tempo de resid&ecirc;ncia anos<br>
        <input name="tempo_residencia" type="text" id="tempo_residencia" size="10" maxlength="10"> 

        meses

        <input name="meses_residencia" type="text" id="meses_residencia" size="10" maxlength="10"> 
      </font></td>

      <td><font size="2">Telefone com DDD<br> 
        <input name="ddd_tel" type="text" id="ddd_tel" size="4" maxlength="2"> 

      - 

      <input name="telefone" type="text" id="telefone2" value="<? echo $telefone_cli; ?>" size="10" maxlength="9">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Celular com DDD<br> 
        <input name="ddd_cel" type="text" id="ddd_cel" size="4" maxlength="2"> 

      - 

      <input name="celular" type="text" id="celular2" value="<? echo $celular_cli; ?>" size="10" maxlength="9">
      </font></td>

      <td><font size="2">Tipo de telefone<br> 
          <select name="tipo_telefone" id="select9">
            
            <option selected><? echo $tipo_telefone; ?></option>
            
            <?





    $sql = "select * from tipo_telefones order by tipo_telefone asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['tipo_telefone']. ">".$x['tipo_telefone']."</option>";

    }

?>
            </select>
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Residencia anterior<br> 
        <input name="residencia_anterior" type="text" id="residencia_anterior" size="50" maxlength="50">
      </font></td>

      <td><font size="2">Bairro<br>
        <input name="bairro_anterior" type="text" id="bairro_anterior" size="50" maxlength="50">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Cidade<br>
        <input name="cidade_anterior" type="text" id="cidade_anterior" size="50" maxlength="50">
      </font></td>

      <td><font size="2">Estado<br>
          <select name="estado_anterior" id="select10">
            
            <option selected><? echo $estado_cli; ?></option>
            
            <?





    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";

    }

?>
            </select>
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Tempo<br>
        <input name="tempo_residencia_anterior" type="text" id="tempo_residencia_anterior">
      </font></td>

      <td><font size="2">E-Mail<br>
        <input name="email" type="text" id="email" value="<? echo $email_cli; ?>" size="50" maxlength="50">
      </font></td>
    </tr>

    <tr>

      <td colspan="3" bgcolor="#CCCCCC"><div align="center"><strong><font color="#0000FF" size="4">INFORMA&Ccedil;&Otilde;ES PROFISSIONAIS</font></strong></div></td>
    </tr>

    <tr> 

      <td><font size="2">Empresa<br>
        <input name="empresa" type="text" id="empresa" size="50" maxlength="50">
      </font></td>

      <td><font size="2">Porte da empresa<br> 
          <select name="porte_empresa" id="select11">
            
            <option selected><? echo $porte_empresa; ?></option>
            
            <?





    $sql = "select * from porte_empresas order by porte_empresa asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['porte_empresa']. ">".$x['porte_empresa']."</option>";

    }

?>
            </select>
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Tempo de servi&ccedil;o Anos<br>
        <input name="data_admissao" type="text" id="data_admissao" size="10" maxlength="10"> 

        meses 

        <input name="meses" type="text" id="meses" size="10" maxlength="10">
      </font></td>

      <td><font size="2">Inicio da atividade  PJ<br> 
        <input name="inicio_atividade" type="text" id="inicio_atividade">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Endere&ccedil;o<br>
        <input name="end_empresa" type="text" id="end_empresa" size="50" maxlength="50">
      </font></td>

      <td><font size="2">N&uacute;mero<br>
        <input name="numero_empresa" type="text" id="numero_empresa" size="10" maxlength="10">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Complemento<br>
        <input name="complemento_empresa" type="text" id="complemento_empresa">
      </font></td>

      <td><font size="2">Bairro<br>
        <input name="bairro_empresa" type="text" id="bairro_empresa" size="50" maxlength="50">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">CEP<br>
        <input name="cep_empresa" type="text" id="cep_empresa">
      </font></td>

      <td><font size="2">Cidade<br>
        <input name="cidade_empresa" type="text" id="cidade_empresa" size="50" maxlength="50">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Estado<br>
          <select name="estado_empresa" id="select12">
            
            <option selected><? echo $estado_cli; ?></option>
            
            <?





    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";

    }

?>
            </select>
      </font></td>

      <td><font size="2">Telefone<br>
        <input name="ddd_tel_empresa" type="text" id="ddd_tel_empresa" size="4" maxlength="2"> 

      - 

      <input name="telefone_empresa" type="text" id="telefone_empresa" size="10" maxlength="9">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Cargo<br>
        <input name="cargo" type="text" id="cargo" size="50" maxlength="50">
      </font></td>

      <td><font size="2">Natureza da opera&ccedil;&atilde;o <br>
          <select name="natureza_operacao" id="select13">
            
            <option>Funcion&aacute;rio P&uacute;blico</option>
            
            <option>Aut&ocirc;nomo</option>
            
            <option>Profissional Liberal</option>
            
            <option selected>Empresa Privada - CLT</option>
            
            <option>Empresa P&uacute;blica</option>
            
            <option>Propriet&aacute;rio-S&oacute;cio-Rendas</option>
            
            <option>Aposentado-Pensionista</option>
            
            <option>Do lar-Estudante</option>
            </select>
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Sal&aacute;rio/Rendimentos R$<br> 
        </font>        <font size="2">
        <input name="salario" type="text" id="salario">
      </font></td>

      <td><font size="2">Atividade principal<br> 
        <input name="atividade_principal" type="text" id="atividade_principal" size="50" maxlength="50">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">CNPJ<br>
        <input name="cnpj" type="text" id="cnpj2" size="50" maxlength="50">
      </font></td>

      <td><font size="2">Telefone contador com DDD<br> 
        <input name="ddd_tel_contador" type="text" id="ddd_tel_contador2" size="4" maxlength="2">

-

  <input name="tel_contador" type="text" id="tel_contador2" size="10" maxlength="9">
      </font></td>
    </tr>

    <tr>

      <td colspan="3" bgcolor="#CCCCCC"><div align="center"><strong><font color="#0000FF" size="4">ATIVIDADE/EMPREGO ANTERIOR </font></strong></div></td>
    </tr>

    <tr>

      <td><font size="2">Atividade/emprego anterior <br>
        <input name="atividade_anterior" type="text" id="atividade_anterior" size="50" maxlength="50">
      </font></td>

      <td><font size="2">Data admiss&atilde;o<br>
        <input name="data_admissao_anterior" type="text" id="data_admissao_anterior">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Sa&iacute;da<br>
        <input name="data_saida" type="text" id="data_saida">
      </font></td>

      <td><font size="2">Cargo<br>
        <input name="cargo_anterior" type="text" id="cargo_anterior" size="50" maxlength="50">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Telefone<br>
        <input name="ddd_tel_empresa_anterior" type="text" id="ddd_tel_empresa_anterior" size="4" maxlength="2"> 

      - 

      <input name="telefone_empresa_anterior" type="text" id="telefone_empresa_anterior" size="10" maxlength="9">
      </font></td>

      <td><font size="2">Outras rendas<br> 
        <input name="outras_rendas" type="text" id="outras_rendas" size="50" maxlength="50">
      </font></td>
    </tr>

    <tr>

      <td colspan="3" bgcolor="#CCCCCC"><div align="center"><strong><font color="#0000FF" size="4">FONTES DE REFER&Ecirc;NCIA </font></strong></div></td>
    </tr>

    <tr>

      <td><font size="2">Pessoal - Nome <br>
        <input name="ref_pessoal" type="text" id="ref_pessoal" size="50">
      </font></td>

      <td><font size="2">Telefone com DDD<br> 
        <input name="ddd_ref_pessoal" type="text" id="ddd_ref_pessoal" size="4" maxlength="2"> 

      - 

      <input name="tel_ref_pessoal" type="text" id="tel_ref_pessoal" size="10" maxlength="9">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Pessoal - Nome <br>
        <input name="ref_pessoal2" type="text" id="ref_pessoal2" size="50">
      </font></td>

      <td><font size="2">Telefone com DDD <br>
        <input name="ddd_ref_pessoal2" type="text" id="ddd_ref_pessoal2" size="4" maxlength="2"> 

      - 

      <input name="tel_ref_pessoal2" type="text" id="tel_ref_pessoal2" size="10" maxlength="9">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Comercial - Nome <br>
        <input name="ref_comercial" type="text" id="ref_comercial" size="50">
      </font></td>

      <td><font size="2">Telefone com DDD <br>
        <input name="ddd_ref_comercial" type="text" id="ddd_ref_comercial" size="4" maxlength="2"> 

      - 

      <input name="tel_ref_comercial" type="text" id="tel_ref_comercial" size="10" maxlength="9">
      </font></td>
    </tr>

    <tr>

      <td colspan="3" bgcolor="#CCCCCC"><div align="center"><strong><font color="#0000FF" size="4">REFER&Ecirc;NCIAS FINANCEIRAS </font></strong></div></td>
    </tr>

    <tr>

      <td><font size="2">Banco<br>
        <input name="ref_banco" type="text" id="ref_banco" size="50">
        <br>
      </font></td>
      <td><font size="2">Ag&ecirc;ncia<br>
        <input name="ref_agencia" type="text" id="ref_agencia"> 

      - 

      <input name="digito_agencia" type="text" id="digito_agencia" size="4" maxlength="2">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Conta<br>
        <input name="ref_conta" type="text" id="ref_conta"> 

      - 

      <input name="digito_conta" type="text" id="digito_conta" size="4" maxlength="2">
      </font></td>

      <td><font size="2">Tipo   <br>     
          <select name="ref_tipo_conta" id="ref_tipo_conta">
            
              <option>Especial</option>
            
              <option>Sal&aacute;rio</option>
            
              <option>Comum</option>
            
              <option>Poupan&ccedil;a</option>
            
              <option selected>N&atilde;o Tem</option>
              </select>
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Conta desde<br>
  M&ecirc;s
  <input name="ref_conta_desde" type="text" id="ref_conta_desde" size="4" maxlength="2"> 

        Ano 

        <input name="ano_ref_conta" type="text" id="ano_ref_conta" size="6" maxlength="4">
      </font></td>

      <td><font size="2">Cart&atilde;o de cr&eacute;dito <br>
          <select name="cartao_credito" id="cartao_credito">
            
            <option>N&atilde;o tem</option>
            
            <option>Amex</option>
            
            <option>Diners</option>
            
            <option>Visa</option>
            
            <option>Credicard</option>
            
            <option>Outros</option>
            </select>
      </font></td>
    </tr>

    <tr>

      <td colspan="3" bgcolor="#CCCCCC"><div align="center"><strong><font color="#0000FF" size="4">REFER&Ecirc;NCIAS DE BENS </font></strong></div></td>
    </tr>

    <tr>

      <td><font size="2">Autom&oacute;vel<br>
          <select name="automovel" id="automovel">
            
            <option>N&atilde;o tem</option>
            
            <option>Tem um</option>
            
            <option>Tem mais de um</option>
            </select>
      </font></td>

      <td><font size="2">Valor total R$ <br>
        <input name="valor_automoveis" type="text" id="valor_automoveis"> 

      0000.00 </font></td>
    </tr>

    <tr>

      <td><font size="2">Resid&ecirc;ncia<br>
          <select name="residencia" id="residencia">
            
            <option>N&atilde;o tem</option>
            
            <option>Resid&ecirc;ncia Pr&oacute;pria</option>
            
            <option>Resid&ecirc;ncia Financiada</option>
            </select>
      </font></td>

      <td><font size="2">Valor tota R$ <br>
        <input name="valor_residencia" type="text" id="valor_residencia"> 

      0000.00 </font></td>
    </tr>

    <tr>

      <td><font size="2">Outras Propriedades <br>
          <select name="outras_propriedades" id="outras_propriedades">
            
            <option>N&atilde;o tem</option>
            
            <option>Terreno(s)</option>
            
            <option>Fazenda(s)</option>
            
            <option>Ch&aacute;cara(s)</option>
            
            <option>Outras Urbanas</option>
            </select>
      </font></td>

      <td><font size="2">Valor total R$ <br>
        <input name="valor_outras_propriedades" type="text" id="valor_outras_propriedades">

      0000.00</font></td>
    </tr>

    <tr>

      <td colspan="3" bgcolor="#CCCCCC"><div align="center"><strong><font color="#0000FF" size="4">DADOS DA OPERA&Ccedil;&Atilde;O </font></strong></div></td>
    </tr>

    <tr>

      <td><font size="2">Tipo de ve&iacute;culo<br>
          <strong><font color="#0000FF"><? echo $bem; ?>

            <input name="bem" type="hidden" id="bem" value="<? echo $bem; ?>">

          </font></strong></font></td>

      <td colspan="2"><font size="2">Chassi<br>
        <input name="chassi" type="text" id="chassi" size="40">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Marca e Ve&iacute;culo<br>
        <input name="veiculo" type="text" id="veiculo" value="Digitar igual no CRV" size="50">
      </font></td>

      <td colspan="2"><font size="2">Ano/Modelo<br>
        <input name="ano_modelo" type="text" id="ano_modelo" size="6" maxlength="4"> 

      - 

      <input name="modelo" type="text" id="modelo" size="6" maxlength="4">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Renavam<br>
        <input name="renavam" type="text" id="renavam" size="50">
      </font></td>

      <td colspan="2"><font size="2">N&ordm; de portas<br>         
          <select name="num_portas" id="num_portas">
            
              <option>2</option>
            
              <option>4</option>
              </select>
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Combust&iacute;vel<br>
          <select name="combustivel" id="combustivel">
            
            <option>Gasolina</option>
            
            <option>Alcool</option>
            
            <option>Diesel</option>
            
            <option>G&aacute;s Natural</option>
            
            <option>Biodiesel</option>
            
            <option>Querosene</option>
            </select>
      </font></td>

      <td colspan="2"><font size="2">Placa<br>
        <input name="placa" type="text" id="placa">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Valor venda NF R$<br> 

	      <strong>

	      <font color="#0000FF">

	    <strong><font color="#0000FF"><? echo $valor_venda; ?></font></strong>

	    <input name="valor_venda" type="hidden" id="valor_venda" value="<? echo $valor_venda; ?>">
	      </font></strong> </font></td>

      <td colspan="2"><font size="2">Valor de entrada R$<br> 
          <font color="#0000FF"><strong>

        <font color="#0000FF"><? echo $valor_entrada; ?></font>

        <input name="valor_entrada" type="hidden" id="valor_entrada" value="<? echo $valor_entrada; ?>">

          </strong></font></font></td>
    </tr>

    <tr>

      <td><font size="2">Tarifa cadastro<br> 
          <strong><font color="#0000FF"><? echo $tac; ?></font></strong>        
        <input name="tarifa_cadastro" type="hidden" id="tarifa_cadastro2" value="<? echo $tac; ?>">
      </font></td>

      <td colspan="2"><font size="2">Valor a financiar R$<br>
          <font color="#0000FF"><strong>

        <font color="#0000FF">
        <? $financiar = bcadd($diferenca,$tac,2);

	  echo $financiar;

	   ?>
        </font>

        <input name="valor_financiar" type="hidden" id="valor_financiar2" value="<? $financiar = bcadd($diferenca,$tac,2);

	  echo $financiar;

	   ?>">

          </strong></font></font></td>
    </tr>

    <tr>

      <td><font size="2">Codigo da tabela<br>
          <strong><font color="#0000FF"><? echo $codigo_tabela; ?></font></strong>        
        <input name="codigo_tabela" type="hidden" id="codigo_tabela" value="<? echo $codigo_tabela; ?>"> 

      Mista <strong><font color="#0000FF"><? echo $mista; ?></font></strong>

      <input name="mista" type="hidden" id="codigo_tabela5" value="<? echo $mista; ?>">
      </font></td>

      <td colspan="2"><font size="2">Coeficiente<br>
          <font color="#0000FF"><strong>

        <font color="#0000FF"><? echo $coeficiente; ?></font>

        <input name="coeficiente" type="hidden" id="coeficiente" value="<? echo $coeficiente; ?>">

          </strong></font></font></td>
    </tr>

    <tr>

      <td><font size="2">Servi&ccedil;os Terceiros<br>
          <strong><font color="#0000FF"><? echo $r_2; ?>        </font></strong>        
        <input name="r" type="hidden" id="r" value="<? echo $r_2; ?>">
      </font></td>

      <td colspan="2"><font size="2">Valor Liberado<br>
          <font color="#0000FF"><strong><? echo "0.00"; ?>

          <input name="valor_liberado" type="hidden" id="valor_liberado" value="<? echo "0.00"; ?>">

          </strong></font></font></td>
    </tr>

    <tr>

      <td><font size="2">N&ordm; de parcelas<br>
          <strong><font color="#0000FF"><? echo $num_parcelas; ?></font></strong>        
        <input name="num_parcelas" type="hidden" id="num_parcelas" value="<? echo $num_parcelas; ?>">
      </font></td>

      <td colspan="2"><font size="2">Valor da parcela<br>
          <font color="#0000FF"><strong><font color="#0000FF">

          <? $prestacao = bcmul($financiar,$coeficiente,2);

	  echo $prestacao;

	   ?>

          </font></strong></font></font>        <font size="2">
          <input name="valor_parcelas" type="hidden" id="valor_parcelas" value="<? $prestacao = bcmul($financiar,$coeficiente,2);

	   echo $prestacao; ?>">
      </font></td>
    </tr>

    <tr>

      <td><font size="2">Car&ecirc;ncia<br>
        <input name="trinta" type="checkbox" id="trinta" value="30 DD">

        30 DD 

        <input name="quarenta_cinco" type="checkbox" id="quarenta_cinco" value="45 DD">

      45 DD </font></td>

      <td colspan="2"><font size="2">Pagto Serv Terceiros<br> 
          <strong>

          <font color="#0000FF">

        <? $serv_terceiros = bcmul($diferenca,$r,2);  echo $serv_terceiros; ?>

        <input name="pagto_serv_terc" type="hidden" id="pagto_serv_terc" value="<? echo $serv_terceiros; ?>">
          </font> </strong></font></td>
    </tr>

    <tr>

      <td colspan="3"><font size="2">Observa&ccedil;&otilde;es<br>
          <textarea name="obs" cols="50" rows="5" id="obs"></textarea>

          <strong><font color="#0000FF">

          <input name="recebido" type="hidden" id="recebido2" value="<? echo "Não"; ?>">

          </font></strong></font></td>
    </tr>


    <tr> 

      <td colspan="3"><div align="left"><strong><font color="#0000FF">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit" value="Concluir efetiva&ccedil;&atilde;o da proposta">
        <input type="reset" name="Submit2" value="Limpar">
        <input name="operador" type="hidden" id="operador3" value="<? echo $nome_op; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>">
        <input name="estab_pertence" type="hidden" id="estab_pertence" value="<? echo $estab_pertence; ?>">
        <input name="cidade_estab_pertence" type="hidden" id="cidade_estab_pertence" value="<? echo $cidade_estab_pertence; ?>">
        <input name="tel_estab_pertence" type="hidden" id="tel_estab_pertence" value="<? echo $tel_estab_pertence; ?>">
        <input name="email_estab_pertence" type="hidden" id="email_estab_pertence" value="<? echo $email_estab_pertence; ?>">
      </font></strong> 
          <input name="cpt" type="hidden" id="cpt2" value="">
          <input name="serie" type="hidden" id="serie" value="">
          <input name="vencto_1_parcela" type="hidden" id="vencto_1_parcela2" value="">
          <input name="data_constituicao" type="hidden" id="data_constituicao2" value="">
          <input name="inscr_est" type="hidden" id="inscr_est2" value="">
      </div>      </td>
    </tr>
  </table>

</form>

<table width="100%"  border="0">

  <tr>

    <td><form name="form1" method="post" action="informacoes_antecedem_efetuar_proposta.php">

      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

      <input type="submit" name="Submit32" value="Voltar">

      <input name="cpf" type="hidden" id="cpf3" value="<? echo $cpf; ?>">

      <strong><font color="#0000FF">

      <input name="estabelecimento_proposta" type="hidden" id="estabelecimento_proposta4" value="<? echo $estabelecimento_proposta; ?>">

      <input name="valor_venda" type="hidden" id="valor_venda4" value="<? echo $valor_venda; ?>">

      <strong>

      <input name="valor_entrada" type="hidden" id="valor_entrada4" value="<? echo $valor_entrada; ?>">

      <input name="r" type="hidden" id="r5" value="<? echo $r_2; ?>">

      <input name="categoria_veiculo" type="hidden" id="categoria_veiculo" value="<? echo $categoria_veiculo; ?>">

      <input name="coeficiente" type="hidden" id="coeficiente4" value="<? echo $coeficiente; ?>">

      <input name="codigo_tabela" type="hidden" id="codigo_tabela3" value="<? echo $codigo_tabela; ?>">

      <input name="mista" type="hidden" id="mista" value="<? echo $mista; ?>">

      <input name="num_parcelas" type="hidden" id="num_parcelas" value="<? echo $num_parcelas; ?>">

</strong></font></strong>

    </form></td>

    <td>&nbsp;</td>

  </tr>

</table>

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

</body>

</html>

