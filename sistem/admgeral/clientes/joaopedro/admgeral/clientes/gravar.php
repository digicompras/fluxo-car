<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<p>
  <?

require '../../conect/conect.php';

?>
  <?
$nome = $_POST['nome'];

$data_nasc = $_POST['data_nasc'];

$estado_civil = $_POST['estado_civil'];

$rg = $_POST['rg'];

$endereco = $_POST['endereco'];

$bairro = $_POST['bairro'];

$cidade = $_POST['cidade'];

$cep = $_POST['cep'];

$celular = $_POST['celular'];

$local_trabalho = $_POST['local_trabalho'];

$newsletter = $_POST['newsletter'];

$comando = "insert into
clientes(nome,data_nasc,estado_civil,rg,endereco,bairro,cidade,cep,celular,local_trabalho,newsletter)
values('$nome','$data_nasc','$estado_civil','$rg','$endereco','$bairro','$cidade','$cep','$celular','$local_trabalho','$newsletter')";


mysql_query($comando,$conexao)or die("Erro ao gravar cliente!");




echo "Cliente gravado com suceso!";



?>
</p>
<form id="form1" name="form1" method="post" action="inserir.php">
  <label>
  <input type="submit" name="button" id="button" value="Voltar" />
  </label>
</form>
<p>&nbsp;</p>
</body>
</html>
