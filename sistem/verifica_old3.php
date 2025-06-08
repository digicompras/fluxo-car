<?
session_start();

$nome=$_POST['nome'];
$estab_pertence=$_POST['estab_pertence'];
$usuario=$_POST['usuario'];
$senha=$_POST['senha'];
$data_hoje=$_POST['data_hoje'];
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$data = "$ano-$mes-$dia";
$hora = date('H:i:s');



require 'conect/conect.php';

if(empty($senha)){

//$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' and status = 'Ativo'";
//$res = mysql_query($sql);
//while($linha=mysql_fetch_row($res)) {


//$operador = $linha[1];
//$estab_pertence = $linha[44];
//}

$comando = "insert into registros_de_login_errados_operadores(operador,estab_pertence,data,dia,mes,ano,hora,usuario_utilizado,senha_utilizada) values('$nome','$estab_pertence','$data','$dia','$mes','$ano','$hora','$usuario','$senha')";



mysql_query($comando,$conexao);


echo "<script>

alert('ATENÇÃO!!!... VOCÊ DEVE OS CAMPOS USUÁRIO E SENHA!!!... OS 2 CAMPOS DEVEM SER INFORMADOS!');
window.location = 'index.php?instrucao=funcionario';

</script>";


}
else{


$user= "select * from operadores where nome = '$nome' and estab_pertence = '$estab_pertence' and usuario='$usuario' and  senha='$senha' and status = 'Ativo'";
$result=mysql_query($user,$conexao) or die("Falha ao selecionar a tabela user");

//$nome = $linha[1];
//$operador = $linha[1];
//$estab_pertence = $linha[44];



if(mysql_num_rows($result)==0){

$comando = "insert into registros_de_login_errados_operadores(operador,estab_pertence,data,dia,mes,ano,hora,usuario_utilizado,senha_utilizada) values('$nome','$estab_pertence','$data','$dia','$mes','$ano','$hora','$usuario','$senha')";



mysql_query($comando,$conexao);



	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	Header("Location: alerta.php");
	}
else{

$comando = "insert into registros_de_login_corretos_operadores(operador,estab_pertence,data,dia,mes,ano,hora,usuario_utilizado,senha_utilizada) values('$nome','$estab_pertence','$data','$dia','$mes','$ano','$hora','$usuario','$senha')";



mysql_query($comando,$conexao);



	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	$_SESSION['data_hoje'] = $data_hoje;
	Header("Location: sistem/index.php");

}

	


}

echo $nome;
echo $estab_pertence;
echo $usuario;
echo $senha;

?> 

