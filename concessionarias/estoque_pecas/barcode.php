<?

Function barcode($texto, $tam=1,$path="imgbarra/"){
    if ($texto){
  $w = 86 / $tam;
  $h = 200 / $tam;
  $e = 6 / $tam;
  if (file_exists($path."ini.png") && file_exists($path."esp.png")){
      echo "<img src='".$path."ini.png' width='$w' height='$h'>";
      echo "<img src='".$path."esp.png' width='$e' height='$h'>";
      $texto = strtolower($texto);
      for ($i=0;$i<=strlen($texto)-1;$i++){
    $var = substr($texto,$i,1);
    if ($var == "/" && file_exists($path."bar.png")){
        echo "<img src='".$path."bar.png' width='$w' height='$h'>";
        $var = "";
    }
    if ($var == "*" && file_exists($path."ast.png")){
        echo "<img src='".$path."ast.png' width='$w' height='$h'>";
        $var = "";
    }
    if ($var == "%" && file_exists($path."per.png")){
        echo "<img src='".$path."per.png' width='$w' height='$h'>";
        $var = "";
    }
    if ($var == "." && file_exists($path."pnt.png")){
        echo "<img src='".$path."pnt.png' width='$w' height='$h'>";
        $var = "";
    }
    if ((!($var=="")) && (file_exists($path."$var.png"))){
        echo "<img src='".$path."$var.png' width='$w' height='$h'>";
    }
    echo "<img src='".$path."esp.png' width='$e' height='$h'>";
      }
      echo "<img src='".$path."ini.png' width='$w' height='$h'>";
  }else{
      echo "BarCode erro: Faltam figuras do ini.png ou esp.png!";
  }
    }
}
?>