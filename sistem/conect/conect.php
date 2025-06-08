<?
$conexao = mysql_connect("189.90.130.248","dcivan","20792079") or die("Falha na conexão");
mysql_select_db("digicomp_vendas",$conexao) or die("Falha ao selecionar a database");

ini_set('default_charset','UTF8_general_mysql500_ci');

?>

<style type="text/css">
body {
	background-color: #bababa;
	font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	color: #000000;
}
</style>


<style type="text/css">

.class01 {
    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #aaa; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}
.class01:hover {
    font: bold arial, helvetica, sans-aerif;
	background-color: #000000;
	color: #009900;
	font-weight: bold;
}

.class02 {
    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #ffffff; 
	border-radius: 8px; 
	border: 3px solid #0404B4; 
	color: #000000; 
	cursor: pointer; 
	padding: 4px;
}
.class02:hover {
    font: bold arial, helvetica, sans-aerif;
	background-color: #000000;
	color: #ffffff;
	font-weight: bold;
}

.class03 {
    font: bold arial, helvetica, sans-aerif;
	font-weight: bold;
	background-color: #1328c9; 
	border-radius: 8px; 
	border: 3px solid #00ff00; 
	color: #FFF; 
	cursor: pointer; 
	padding: 4px;
}
.class03:hover {
    font: bold arial, helvetica, sans-aerif;
	background-color: #000000;
	color: #ffcc00;
	font-weight: bold;
}

#div01 {
	color: #000;
	font-size: 40px;
	font-weight: bold;
	height: 100px;
	position: absolute;
	top: 40px;
	left: 50px;
	width: 100px;
}

</style>