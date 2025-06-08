<?
session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.



require '../conect/conect.php';

$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
$data_hoje = $_SESSION['data_hoje'];


if($senha<>allcred10){

	Header("Location: alerta.php");

}


else{

	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	$_SESSION['data_hoje'] = $data_hoje;
	Header("Location: mototaxi/menu.php");

}

?> 
