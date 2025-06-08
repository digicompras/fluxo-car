

<?php

$ip_pesquisa = $_POST['ip_pesquisa'];

    include("class.ipdetails.php");
    //$ip = $_SERVER['REMOTE_ADDR']; 
	$ip = $ip_pesquisa; 
    #$ip = "189.73.71.160";
    $ipdetails = new ipdetails($ip); 
    $ipdetails->scan();
    echo "<b>IP:</b>        ".$ip                        ."<br />"; 
    echo "<b>País:</b>      ".$ipdetails->get_country()  ."<br />";
    echo "<b>Estado:</b>    ".htmlspecialchars_decode($ipdetails->get_region())   ."<br />";
    echo "<b>Cidade:</b>    ".$ipdetails->get_city()     ."<br />";
    echo "<b>Latitude:</b>  ".$ipdetails->get_latitude() ."<br />";
    echo "<b>Longitude:</b> ".$ipdetails->get_longitude()."<br />";
    echo "<b>Código país:</b> ".$ipdetails->get_countrycode()."<br />";
    echo "<b>Código continente:</b> ".$ipdetails->get_continentcode()."<br />";
    echo "<b>Código moeda:</b> ".$ipdetails->get_currencycode()."<br />";
    echo "<b>Símbolo moeda:</b> ".htmlspecialchars_decode($ipdetails->get_currencysymbol())."<br />";
    echo "<b>Cotação moeda (dólar):</b> ".$ipdetails->get_currencyconverter()."<br />"; 
	  
$latitude = $ipdetails->get_latitude();
$longitude = $ipdetails->get_longitude();
	 
?>

<? //echo $ipdetails->get_latitude() .",".$ipdetails->get_longitude() ; ?>

<iframe width="1020" height="800" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=<? echo $latitude; ?>,<? echo $longitude; ?>&amp;aq=&amp;sll=-20.528346,-47.366674&amp;sspn=0.010007,0.021007&amp;ie=UTF8&amp;ll=<? echo $latitude; ?>,<? echo $longitude; ?>&amp;spn=0.010007,0.021007&amp;t=m&amp;z=14&amp;output=embed"></iframe>






