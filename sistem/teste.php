<?
session_start();


$usuario=$_POST['usuario'];
$senha=$_POST['senha'];
$data_hoje=$_POST['data_hoje'];

require 'conect/conect.php';

$user= "select * from operadores where usuario='$usuario' and  senha='$senha'";
$result=mysql_query($user,$conexao) or die("Falha ao selecionar a tabela user");
{
$nome = $linha[1];
}
if(mysql_num_rows($result)==0){

	Header("Location: alerta.php");

}else{

$sql = "select * from operadores where usuario='$usuario' and  senha='$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nome = $linha[1];


echo "$nome <br> $data_hoje";
}

$sql = "select * from ponto where nome='$nome' and  data='$data_hoje'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$sai_t = $linha[6];

echo "$sai_t";
}



}

if($sai_t<>" "){

	echo "Atenção $nome você já encerrou seu expediente de hoje! Não é possível acessar o sistema!";
}else{
	
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	$_SESSION['data_hoje'] = $data_hoje;
	Header("Location: sistem/index.php");
}


?> 
