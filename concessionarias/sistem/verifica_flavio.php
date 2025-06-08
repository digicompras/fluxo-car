<?
session_start();
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.

require '../conect/conect.php';


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where nome = 'FLAVIO ANTONIO DE MATTOS JR' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;


$usuario_op = $linha[40];
$senha_op = $linha[41];
}

//if ($usuario == $usuario_op) //verifica se a variável "usuario" é verdadeira...
if ($senha == $senha_op) //verifica se a variável "senha" é verdadeira...

header("Location: ponto/selecione_funcionario_para_gerar_cartao_ponto.php");



?> 
