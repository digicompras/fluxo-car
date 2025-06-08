<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<p>
<?

require'../../conect/conect.php';

?>
<form id="form1" name="form1" method="post" action="grava_editar.php">
<?

$codigo = $_POST['codigo'];


$sql = "SELECT * FROM clientes where codigo = '$codigo'";

$res = mysql_query($sql);



$reg = 0;

while($linha=mysql_fetch_row($res)) {

$reg++;


$codigo = $linha[0];

$nome = $linha[1];

$data_nasc = $linha[2];

$cpf = $linha[3];

}
?>
  <table width="100%" border="0">
    <tr>
      <td>Codigo</td>
      <td><? echo $codigo; ?>
      <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="13%">Nome</td>
      <td width="14%"><label>
        <input name="nome" type="text" id="nome" value="<? echo $nome; ?>" />
      </label></td>
      <td width="47%">&nbsp;</td>
      <td width="5%">&nbsp;</td>
      <td width="5%">&nbsp;</td>
      <td width="5%">&nbsp;</td>
      <td width="5%">&nbsp;</td>
      <td width="6%">&nbsp;</td>
    </tr>
    <tr>
      <td>Data de nascimento</td>
      <td><label>
        <input name="data_nasc" type="text" id="data_nasc" value="<? echo $data_nasc; ?>" />
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Cpf</td>
      <td><input name="cpf" type="text" id="cpf" value="<? echo $cpf; ?>" /></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><label>
        <input type="submit" name="button" id="button" value="Salvar" />
      </label></td>
      <td><label>
        <input type="reset" name="button2" id="button2" value="Limpar" />
      </label></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<p>
</body>
</html>

