<?php
session_start(); //inicia sess�o...
if ($_SESSION["usuario"] == true) //verifica se a vari�vel "usuario" � verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a vari�vel "senha" � verdadeira...
echo ""; //se for emite mensagem positiva.
else //se n�o for...
header("Location: alerta.php");

?>
<html>
<head>
<title>&Aacute;rea de administra&ccedil;&atilde;o do site  ---- Suporte (16) 9739-1418 - Ivan Campos</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<frameset rows="*" cols="315,687">
  <frame src="menu.php">
  <frame src="navegacao.php" name="navegacao">
</frameset>
<noframes></noframes>
<body>
</body>
</html>
