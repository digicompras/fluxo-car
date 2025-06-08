<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?

require '../../conect/conect.php';


?>


<form action="menu.php">
  <label>
  <input type="submit" name="button3" id="button3" value="Voltar" />
  </label>

</form>

<form id="form1" name="form1" method="post" action="gravar.php">
  <table width="100%" border="0">
    <tr>
      <td colspan="5">&nbsp;</td>
    </tr>
    <tr>
      <td width="14%">Nome</td>
      <td width="24%"><label>
        <input name="nome" type="text" id="nome" size="50" maxlength="50" />
      </label></td>
      <td width="18%">Perfil</td>
      <td width="22%"><select name="tipo" id="tipo">
      </select></td>
      <td width="22%">&nbsp;</td>
    </tr>
    <tr>
      <td>Data Nasc</td>
      <td><label>
        <input name="data_nasc" type="text" id="data_nasc" size="15" maxlength="10" />
      </label></td>
      <td>Sexo</td>
      <td><select name="sexo" id="sexo">
      
      <option>Masculino</option>
      
      <option>Feminino</option>
      
      </select>
      
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Estado Civil</td>
      <td><select name="estado_civil" id="select3">
        <option selected="selected">Selecione</option>
        <?





    $sql = "select * from estado_civil order by estadocivil asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option>".$x['estadocivil']."</option>";

    }

?>
      </select></td>
      <td>CPF</td>
      <td><input name="cpf" type="text" id="cpf" size="18" maxlength="14" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>RG</td>
      <td><input name="rg" type="text" id="rg" size="25" maxlength="25" />
        Órgao 
        <input name="orgao" type="text" id="orgao" size="15" maxlength="14" /></td>
      <td>Emissão</td>
      <td><input name="emissao" type="text" id="emissao" size="15" maxlength="10" />
        dd/mm/aaaa</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Endereço</td>
      <td><input name="endereco" type="text" id="endereco" size="50" maxlength="50" /></td>
      <td>Numero</td>
      <td><input name="numero" type="text" id="numero" size="10" maxlength="10" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Bairro</td>
      <td><input name="bairro" type="text" id="bairro" size="50" maxlength="50" /></td>
      <td>Complemento</td>
      <td><input name="complemento" type="text" id="complemento" size="50" maxlength="50" /></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><input name="cidade" type="text" id="cidade" size="50" maxlength="50" /></td>
      <td>Estado</td>
      <td><select name="estado" id="estado">
      
      <option selected>Selecione</option>
      
      <?
	  
	  
	  
      
      
      $sql = "select * from estados_do_brasil ordem by estados asc";
	  
	  $result = mysql_query($sql);
	  
	  while($x=mysql_fetch_array($result)){
		  
	  echo "<option value=" .$x['estado'].">".$x['estado']."</option>";
	  
	  }
	  
	  ?>
      
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Cep</td>
      <td><input name="cep" type="text" id="cep" size="9" maxlength="9" />
        Use o formato 00000-000</td>
      <td>Telefone</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Celular</td>
      <td><input name="celular" type="text" id="celular" size="15" maxlength="14" /></td>
      <td>E-Mail</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Local de trabalho</td>
      <td><input name="local_trabalho" type="text" id="local_trabalho" size="50" /></td>
      <td>Telefone Comercial</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Receber News letter?</td>
      <td colspan="2"><select name="newsletter" id="newsletter">
        <option selected="selected">Sim</option>
        <option>Não</option>
      </select></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="26">&nbsp;</td>
      <td colspan="2"><textarea name="obs" id="obs" cols="50" rows="7"></textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="26"><label>
        <input type="submit" name="button" id="button" value="Salvar" />
      </label></td>
      <td><label>
        <input type="reset" name="button2" id="button2" value="Limpar" />
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
