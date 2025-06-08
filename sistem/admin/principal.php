<?php

/* Define o limitador de cache para 'private' */
session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Define o limite de tempo do cache em 30 minutos */
session_cache_expire(60);
$cache_expire = session_cache_expire();


session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMINISTRAÇÃO GERAL</title>
</head>

<frameset rows="119,*" cols="*" frameborder="no" border="2" framespacing="0">
  <frame src="cabecalho.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
    <frame src="inicial_admgeral.php" name="navegacao" id="navegacao" title="navegacao" />
</frameset>
<noframes><body>
</body>
</noframes></html>
