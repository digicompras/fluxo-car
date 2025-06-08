<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<style type="text/css">

#menu ul {
    padding:0px;
    margin:0px;
    float:left;
    width: 100%;
    background-color:transparent;
    list-style:none;
    font:80% verdana;
}
#menu ul li { display: inline; } 
 
#menu ul li a {
    background-color:transparent;
    color: #333;
    text-decoration: none;
    
    padding: 2px 10px;
    float:left;
}
 
#menu ul li a:hover {
    background-color:transparent;
    color: #6D6D6D;
    border-bottom:3px solid #EA0000;
}
</style>

<?php

$cadastros = "<a href='cadastros.php'>Cadastros</a>";
$menu_exibe = "<a href='exibe.php'>Exibe</a>";
$menu_pesquisar = "<a href='pesquisar.php'>Pesquisar</a>";

$mostra_menus = "<div id='menu'><ul>
				
					<li>$cadastros</li>
					<li>$menu_exibe</li>
					


				</ul></div>";
				
				print $mostra_menus;

?>
</body>
</html>
