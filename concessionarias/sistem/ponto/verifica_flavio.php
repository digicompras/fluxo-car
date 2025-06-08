<?
session_start();
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.

require '../../conect/conect.php';


$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha'";
$res = mysql_query($sql);
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;


$usuario_op = $linha[40];
$senha_op = $linha[41];
$tipo_op = $linha[42];
}

if ($_SESSION["usuario"] == $usuario_op) //verifica se a variável "usuario" é verdadeira...
echo "$usuario_op"; //se for emite mensagem positiva.
if ($_SESSION["senha"] == $senha_op) //verifica se a variável "senha" é verdadeira...
echo "$senha_op"; //se for emite mensagem positiva.

header("Location: selecione_funcionario_para_gerar_cartao_ponto.php");




?> 
