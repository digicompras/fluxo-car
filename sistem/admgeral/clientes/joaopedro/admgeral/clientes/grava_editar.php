<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?

require'../../conect/conect.php';

?>

<?

$codigo = $_POST['codigo'];

$nome = $_POST['nome'];

$data_nasc = $_POST['data_nasc'];

$cpf = $_POST['cpf'];



?>

<?

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`clientes` set `codigo` = '$codigo',`nome` = '$nome',`data_nasc` = '$data_nasc',`cpf` = '$cpf' where `clientes`. `codigo` = '$codigo' limit 1 ";
}

mysql_query($comando,$conexao) or die("Erro ao gravar dados");
mysql_close($conexao);


echo "Dados do cliente alterados no banco de dados com susseso<br><br>";
?>


</body>
</html>
