

<html>
<head>
<title>CADASTRO DE ESTABELECIMENTOS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?

require '../../conect/conect.php';


$sql = "SELECT * FROM fundo_navegacao";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$cor_fundo_navegacao = $linha[1];
}
?>

<? 

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}

?>


<body bgcolor="#<? echo $cor_fundo_navegacao; ?>" background="../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
  
  

	
<?

$razaosocial = $_POST['razaosocial'];
$razaosocial_recebe = $_GET['razaosocial'];
$razaosocial2 = $razaosocial_recebe;	
	
$nfantasia = $_POST['nfantasia'];
$nfantasia_recebe = $_GET['nfantasia'];
$nfantasia2 = $nfantasia_recebe;
	
$cnpj = $_POST['cnpj'];
$cnpj_recebe = $_GET['cnpj'];
$cnpj2 = $cnpj_recebe;
	
$endereco = $_POST['endereco'];
$endereco_recebe = $_GET['endereco'];
$endereco2 = $endereco_recebe;
	
$numero = $_POST['numero'];
$numero_recebe = $_GET['numero'];
$numero2 = $numero_recebe;
	
$bairro = $_POST['bairro'];
$bairro_recebe = $_GET['bairro'];
$bairro2 = $bairro_recebe;

$cep = $_POST['cep'];
$cep_recebe = $_GET['cep'];
$cep2 = $cep_recebe;
	
$cidade = $_POST['cidade'];
$cidade_recebe = $_GET['cidade'];
$cidade2 = $cidade_recebe;
	
$estado = $_POST['estado'];
$estado_recebe = $_GET['estado'];
$estado2 = $estado_recebe;
	
$email = $_POST['email'];
$email_recebe = $_GET['email'];
$email2 = $email_recebe;
	
$proprietario = $_POST['proprietario'];
$proprietario_recebe = $_GET['proprietario'];
$proprietario2 = $proprietario_recebe;
	
$cpf = $_POST['cpf'];
$cpf_recebe = $_GET['cpf'];
$cpf2 = $cpf_recebe;
	
$rg = $_POST['rg'];
$rg_recebe = $_GET['rg'];
$rg2 = $rg_recebe;

?>





<?

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM admgeral where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {


$nome = $linha[1];
$celular = $linha[19];
$email = $linha[20];
$estabelecimento = $linha[44];
$cidade_estabelecimento = $linha[45];
$tel_estabelecimento = $linha[46];
$email_estabelecimento = $linha[47];

?>
<? } ?>
<form name="form1" method="post" action="grava_estabelecimento.php">

<table width="100%" border="0" cellspacing="4">
    <tr> 
      <td>&nbsp;</td>
      <td colspan="3"><strong><font color="#0000FF" size="4">Cadastro 
        de concession&aacute;ria/oficina!. </font></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Data Cadastro </td>
      <td><strong><font color="#0000FF"><? echo date('d-m-Y'); ?></font></strong>
        <input name="datacadastro" type="hidden" id="datacadastro" value="<? echo date('d-m-Y'); ?>">
        <input name="horacadastro" type="hidden" id="horacadastro" value="<? echo date('H:i:s'); ?>"></td>
      <td>Status</td>
      <td><input name="status" type="hidden" id="status" value="ativo">
      Ativo</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td width="15%">Raz&atilde;o Social </td>
      <td width="37%"><input name="razaosocial" type="text" class='class02' id="razaosocial" value="<? if(empty($razaosocial)){ echo $razaosocial2;} else{ echo $razaosocial; } ?>" size="50" maxlength="50">
      *</td>
      <td width="11%">Nome Fantasia </td>
      <td width="36%">        <font color="#0000FF">
        <input name="nfantasia" type="text" class='class02' id="data_nasc2" value="<? if(empty($nfantasia)){ echo $nfantasia2;} else{ echo $nfantasia; } ?>" size="50" maxlength="50"> 
      *</font></td>
      <td width="1%">&nbsp;</td>
    </tr>
    <tr>
      <td>CNPJ</td>
      <td><input name="cnpj" type="text" class='class02' id="cnpj" value="<? if(empty($cnpj)){ echo $cnpj2;} else{ echo $cnpj; } ?>">
      *<strong> Somente n&uacute;meros</strong></td>
      <td>INSCR EST </td>
      <td><input class='class02' name="inscr_est" type="text" id="inscr_est" size="25" maxlength="25"> <strong>Somente n&uacute;meros</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Endere&ccedil;o</td>
      <td><input name="endereco" type="text" class='class02' id="endereco" value="<? if(empty($endereco)){ echo $endereco2;} else{ echo $endereco; } ?>" size="50" maxlength="50">
      * 
      </td>
      <td>N&uacute;mero</td>
      <td><input name="numero" type="text" class='class02' id="numero2" value="<? if(empty($numero)){ echo $numero2;} else{ echo $numero; } ?>" size="10" maxlength="10">
      * 
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><p>Bairro</p></td>
      <td><input name="bairro" type="text" class='class02' id="bairro" value="<? if(empty($bairro)){ echo $bairro2;} else{ echo $bairro; } ?>" size="50" maxlength="50">
      * 
      </td>
      <td>Complemento</td>
      <td><input class='class02' name="complemento" type="text" id="endereco4" size="50" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Cep</td>
      <td><input name="cep" type="text" class='class02' id="cep2" value="<? if(empty($cep)){ echo $cep2;} else{ echo $cep; } ?>" size="9" maxlength="9">
      Use o formato 00000-000*</td>
      <td>Cidade</td>
      <td><input name="cidade" type="text" class='class02' id="cidade2" value="<? if(empty($cidade)){ echo $cidade2;} else{ echo $cidade; } ?>" size="50" maxlength="50">
      *</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Estado</td>
      <td><select class='class02' name="estado" id="select">
        <option selected><? if(empty($estado)){ echo $estado2;} else{ echo $estado; } ?></option>
        <?


    $sql = "select * from estados_do_brasil order by estado asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['estado']."</option>";
    }
?>
      </select>
      *</td>
      <td>Telefone</td>
      <td><input class='class02' name="telefone" type="text" id="telefone2" size="15" maxlength="14"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Fax</td>
      <td><input class='class02' name="fax" type="text" id="telefone3" size="15" maxlength="14"></td>
      <td>E-Mail</td>
      <td><input name="email" type="text" class='class02' id="email" value="<? if(empty($email)){ echo $email2;} else{ echo $email; } ?>" size="50" maxlength="50">
      * </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>Site</td>
      <td><input class='class02' name="site" type="text" id="telefone" size="50" maxlength="50"></td>
      <td>Propriet&aacute;rio</td>
      <td><input name="proprietario" type="text" class='class02' id="site" value="<? if(empty($proprietario)){ echo $proprietario2;} else{ echo $proprietario; } ?>" size="50" maxlength="50">
      *</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>CPF</td>
      <td><input name="cpf" type="text" class='class02' id="cpf" value="<? if(empty($cpf)){ echo $cpf2;} else{ echo $cpf; } ?>">
      * <strong>Somente n&uacute;meros</strong></td>
      <td>RG</td>
      <td><input name="rg" type="text" class='class02' id="rg" value="<? if(empty($rg)){ echo $rg2;} else{ echo $rg; } ?>">
      * <strong>Somente n&uacute;meros</strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Obs</td>
      <td colspan="2"><textarea class='class02' name="obs" cols="50" rows="7" id="obs"></textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Classifica&ccedil;&atilde;o</td>
      <td><select class='class02' name="classificacao" id="classificacao">
        <option selected="selected">MATRIZ</option>
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
      <td>Valor Mensal*</td>
      <td><select class='class02' name="valor" id="valor">
          <?

    $sql = "select * from mensalidade_sistema where banco = 'PAG BANK' and status = 'ativo'";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['valor']."</option>";
    }
?>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2"><?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input class='class01' type="submit" name="Submit" value="Salvar">
		<input name="dataalteracao" type="hidden" id="dataalteracao">
		<input name="diafechamento" type="hidden" id="diafechamento" value="31">
<input name="horaalteracao" type="hidden" id="horaalteracao">
        <input name="operador" type="hidden" id="operador3" value="<? echo $nome; ?>">
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular; ?>">
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email; ?>">        
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estabelecimento; ?>">
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estabelecimento; ?>">
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estabelecimento; ?>">
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estabelecimento; ?>">
        <input name="operador_alterou" type="hidden" id="operador_alterou">
        <input name="cel_operador_alterou" type="hidden" id="cel_operador_alterou">
        <input name="email_operador_alterou" type="hidden" id="email_operador_alterou">
        <input name="estabelecimento_alterou" type="hidden" id="estabelecimento_alterou">
        <input name="cidade_estabelecimento_alterou" type="hidden" id="cidade_estabelecimento_alterou">
        <input name="tel_estabelecimento_alterou" type="hidden" id="tel_estabelecimento_alterou">
        <input name="email_estabelecimento_alterou" type="hidden" id="email_estabelecimento_alterou">
        <input name="motivo_exclusao" type="hidden" id="motivo_exclusao">

		</td><td><div align="right"> </div></td>
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
