<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
	
<?php
	
require '../../conect/conect.php';
	  
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$db = $linha[1];
}
	
?>
	
<?php
	
$nome_que_sera_usado_para_imagem = $_POST['nome'];
	$codigo = $_POST['codigo'];
	
$imagem_nome = str_replace(' ', '', "$nome_que_sera_usado_para_imagem.jpg");

class Face_Detector {
 
 protected $detection_data;
 protected $canvas;
 protected $face;
 private $reduced_canvas;
 
 public function __construct($detection_file = 'detection.dat') {
 if (is_file($detection_file)) {
 $this->detection_data = unserialize(file_get_contents($detection_file));
 } else {
 throw new Exception("Couldn't load detection data");
 }
 }
 
 public function face_detect($file) {
 if (!is_file($file)) {
 throw new Exception("Can not load $file");
 }
 
 $this->canvas = imagecreatefromjpeg($file);
 $im_width = imagesx($this->canvas);
 $im_height = imagesy($this->canvas);

 //Resample before detection?
 $ratio = 0;
 $diff_width = 320 - $im_width;
 $diff_height = 240 - $im_height;
 if ($diff_width > $diff_height) {
 $ratio = $im_width / 320;
 } else {
 $ratio = $im_height / 240;
 }

 if ($ratio != 0) {
 $this->reduced_canvas = imagecreatetruecolor($im_width / $ratio, $im_height / $ratio);
 imagecopyresampled($this->reduced_canvas, $this->canvas, 0, 0, 0, 0, $im_width / $ratio, $im_height / $ratio, $im_width, $im_height);
 
 $stats = $this->get_img_stats($this->reduced_canvas);
 $this->face = $this->do_detect_greedy_big_to_small($stats['ii'], $stats['ii2'], $stats['width'], $stats['height']);
 $this->face['x'] *= $ratio;
 $this->face['y'] *= $ratio;
 $this->face['w'] *= $ratio;
 } else {
 $stats = $this->get_img_stats($this->canvas);
 $this->face = $this->do_detect_greedy_big_to_small($stats['ii'], $stats['ii2'], $stats['width'], $stats['height']);
 }
 return ($this->face['w'] > 0);
 }
 
 
 public function toJpeg() {
 $color = imagecolorallocate($this->canvas, 255, 0, 0); //red
 imagerectangle($this->canvas, $this->face['x'], $this->face['y'], $this->face['x']+$this->face['w'], $this->face['y']+ $this->face['w'], $color);
 header('Content-type: image/jpeg');
 imagejpeg($this->canvas);
 }
 
 /* Added by codediesel - debug by jonatahs guerra */
 public function cropFace() {
 $canvas = imagecreatetruecolor($this->face['w'], $this->face['w']);
 imagecopy($canvas, $this->canvas, 0, 0, $this->face['x'], $this->face['y'], $this->face['w'], $this->face['w']);
 header('Content-type: image/jpeg');
 imagejpeg($canvas);
 }
 
 public function toJson() {
 return "{'x':" . $this->face['x'] . ", 'y':" . $this->face['y'] . ", 'w':" . $this->face['w'] . "}";
 }
 
 public function getFace() {
 return $this->face;
 }
 
 protected function get_img_stats($canvas){
 $image_width = imagesx($canvas);
 $image_height = imagesy($canvas); 
 $iis = $this->compute_ii($canvas, $image_width, $image_height);
 return array(
 'width' => $image_width,
 'height' => $image_height,
 'ii' => $iis['ii'],
 'ii2' => $iis['ii2']
 ); 
 }
 
 protected function compute_ii($canvas, $image_width, $image_height ){
 $ii_w = $image_width+1;
 $ii_h = $image_height+1;
 $ii = array();
 $ii2 = array(); 
 
 for($i=0; $i<$ii_w; $i++ ){
 $ii[$i] = 0;
 $ii2[$i] = 0;
 } 
 
 for($i=1; $i<$ii_w; $i++ ){ 
 $ii[$i*$ii_w] = 0; 
 $ii2[$i*$ii_w] = 0; 
 $rowsum = 0;
 $rowsum2 = 0;
 for($j=1; $j<$ii_h; $j++ ){
 $rgb = ImageColorAt($canvas, $j, $i);
 $red = ($rgb >> 16) & 0xFF;
 $green = ($rgb >> 8) & 0xFF;
 $blue = $rgb & 0xFF;
 $grey = ( 0.2989*$red + 0.587*$green + 0.114*$blue )>>0; // this is what matlab uses
 $rowsum += $grey;
 $rowsum2 += $grey*$grey;
 
 $ii_above = ($i-1)*$ii_w + $j;
 $ii_this = $i*$ii_w + $j;
 
 $ii[$ii_this] = $ii[$ii_above] + $rowsum;
 $ii2[$ii_this] = $ii2[$ii_above] + $rowsum2;
 }
 }
 return array('ii'=>$ii, 'ii2' => $ii2);
 }
 
 protected function do_detect_greedy_big_to_small( $ii, $ii2, $width, $height ){
 $s_w = $width/20.0;
 $s_h = $height/20.0;
 $start_scale = $s_h < $s_w ? $s_h : $s_w;
 $scale_update = 1 / 1.2;
 for($scale = $start_scale; $scale > 1; $scale *= $scale_update ){
 $w = (20*$scale) >> 0;
 $endx = $width - $w - 1;
 $endy = $height - $w - 1;
 $step = max( $scale, 2 ) >> 0;
 $inv_area = 1 / ($w*$w);
 for($y = 0; $y < $endy ; $y += $step ){
 for($x = 0; $x < $endx ; $x += $step ){
 $passed = $this->detect_on_sub_image( $x, $y, $scale, $ii, $ii2, $w, $width+1, $inv_area);
 if( $passed ) {
 return array('x'=>$x, 'y'=>$y, 'w'=>$w);
 }
 } // end x
 } // end y
 } // end scale
 return null;
 }
 
 protected function detect_on_sub_image( $x, $y, $scale, $ii, $ii2, $w, $iiw, $inv_area){
 $mean = ( $ii[($y+$w)*$iiw + $x + $w] + $ii[$y*$iiw+$x] - $ii[($y+$w)*$iiw+$x] - $ii[$y*$iiw+$x+$w] )*$inv_area;
 $vnorm = ( $ii2[($y+$w)*$iiw + $x + $w] + $ii2[$y*$iiw+$x] - $ii2[($y+$w)*$iiw+$x] - $ii2[$y*$iiw+$x+$w] )*$inv_area - ($mean*$mean); 
 $vnorm = $vnorm > 1 ? sqrt($vnorm) : 1;
 
 $passed = true;
 for($i_stage = 0; $i_stage < count($this->detection_data); $i_stage++ ){
 $stage = $this->detection_data[$i_stage]; 
 $trees = $stage[0]; 

 $stage_thresh = $stage[1];
 $stage_sum = 0;
 
 for($i_tree = 0; $i_tree < count($trees); $i_tree++ ){
 $tree = $trees[$i_tree];
 $current_node = $tree[0]; 
 $tree_sum = 0;
 while( $current_node != null ){
 $vals = $current_node[0];
 $node_thresh = $vals[0];
 $leftval = $vals[1];
 $rightval = $vals[2];
 $leftidx = $vals[3];
 $rightidx = $vals[4];
 $rects = $current_node[1];
 
 $rect_sum = 0;
 for( $i_rect = 0; $i_rect < count($rects); $i_rect++ ){
 $s = $scale;
 $rect = $rects[$i_rect];
 $rx = ($rect[0]*$s+$x)>>0;
 $ry = ($rect[1]*$s+$y)>>0;
 $rw = ($rect[2]*$s)>>0; 
 $rh = ($rect[3]*$s)>>0;
 $wt = $rect[4];
 
 $r_sum = ( $ii[($ry+$rh)*$iiw + $rx + $rw] + $ii[$ry*$iiw+$rx] - $ii[($ry+$rh)*$iiw+$rx] - $ii[$ry*$iiw+$rx+$rw] )*$wt;
 $rect_sum += $r_sum;
 } 
 
 $rect_sum *= $inv_area;
 
 $current_node = null;
 if( $rect_sum >= $node_thresh*$vnorm ){
 if( $rightidx == -1 ) 
 $tree_sum = $rightval;
 else
 $current_node = $tree[$rightidx];
 } else {
 if( $leftidx == -1 )
 $tree_sum = $leftval;
 else
 $current_node = $tree[$leftidx];
 }
 } 
 $stage_sum += $tree_sum;
 } 
 if( $stage_sum < $stage_thresh ){
 return false;
 }
 } 
 return true;
 }
}
?>
	
<?php
	
//O código de exemplo mostra como identificar um rosto. Mesmo que a imagem tenhas mais de um rosto, apenas o primeiro é detectado. Embora possa parecer uma limitação, isso pode ser útil em aplicações web que necessitam para criar uma imagem no perfil do usuário a partir de uma imagem crua. De modo que se um usuário carrega uma imagem de corpo inteiro, o código pode detectar o rosto e criar automaticamente uma imagem no perfil para o usuário. (Isso é muito important pro projeto que estou desenvolvendo)

// include "FaceDetector.php";

 //$detect = new Face_Detector('detection.dat');
 //$detect -> face_detect('anadearmas.jpg ');
 //$detect -> toJpeg();

 ?>
	
<?php
	
//O código acima mostra uma borda ao redor do rosto detectado, em vez disso, podemos cortar diretamente a área do rosto.

 include "FaceDetector.php";

 $detect = new Face_Detector('detection.dat');
 //$detect -> face_detect('anadearmas.jpg ');
 $detect -> face_detect("$imagem_nome");
 $detect -> cropFace();
print_r ($detect);
 ?>
	
	
<?php


$comando = "update `$db`.`operadores` set `imagem_nome` = '$imagem_nome' where `operadores`. `codigo` = '$codigo' limit 1 ";

mysql_query($comando,$conexao) or die("Erro ao salvar imagem desse operador");


echo "Imagem do operador salva no banco de dados com sucesso<br>";
	
?>
	
	
	
	

	
</body>
</html>