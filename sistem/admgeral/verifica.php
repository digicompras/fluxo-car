<?

session_start();





$usuario=$_POST['usuario'];

$senha=$_POST['senha'];

$frase_secreta=$_POST['frase_secreta'];



require '../conect/conect.php';



$user= "select * from admgeral where usuario='$usuario' and  senha='$senha'";

$result=mysql_query($user,$conexao) or die("Falha ao selecionar a tabela user");

if(mysql_num_rows($result)==0){




Header("Location: alerta.php");



}else{

$sql = "SELECT * FROM admgeral where usuario='$usuario' and  senha='$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nome = $linha['1'];

}

$date = date('Y-m-d');
$hora = date('H:i:s');

$comando = "insert into login_admgeral(nome,date,hora,usuario,senha) values('$nome','$date','$hora','$usuario','$senha')";



mysql_query($comando,$conexao);

	$_SESSION['nome'] = $usuario;

	$_SESSION['usuario'] = $usuario;

	$_SESSION['senha'] = $senha;

	Header("Location: principal.php");



}



?> 

