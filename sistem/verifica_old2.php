<?
session_start();


$usuario=$_POST['usuario'];
$senha=$_POST['senha'];
$data_hoje=$_POST['data_hoje'];

require 'conect/conect.php';



$user= "select * from operadores where usuario='$usuario' and  senha='$senha' and status = 'Ativo'";
$result=mysql_query($user,$conexao) or die("Falha ao selecionar a tabela user");

$nome = $linha[1];



if(mysql_num_rows($result)==0){

	Header("Location: alerta.php");
	}
	





if(mysql_num_rows($result)==1){


$sql = "SELECT * FROM operadores where usuario = '$usuario' and senha = '$senha' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nome_operador = $linha[1];
$tempo_almoco = $linha[58];


}

$sql = "SELECT * FROM ponto where nome = '$nome_operador' and data = '$data_hoje' order by codigo desc limit 1 ";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$ponto++;



$codigo_ponto = $linha[0];
$nome = $linha[1];
$data = $linha[2];
$ent_m = $linha[3];
$sai_m = $linha[4];
$ent_t = $linha[5];
$sai_t = $linha[6];

}

if($ponto=="1" && $sai_m<>" "){

$hora_atual = date('H:i');

function calcular_tempo_trasnc($sai_m,$hora_atual){
    $separar[1]=explode(':',$sai_m);
    $separar[2]=explode(':',$hora_atual);

$total_minutos_trasncorridos[1] = ($separar[1][0]*60)+$separar[1][1];
$total_minutos_trasncorridos[2] = ($separar[2][0]*60)+$separar[2][1];
$total_minutos_trasncorridos = $total_minutos_trasncorridos[2]-$total_minutos_trasncorridos[1];
if($total_minutos_trasncorridos<=59) return($total_minutos_trasncorridos.' Minutos');
elseif($total_minutos_trasncorridos>59){
$HORA_TRANSCORRIDA = round($total_minutos_trasncorridos/60);
if($HORA_TRANSCORRIDA<=9) $HORA_TRANSCORRIDA='0'.$HORA_TRANSCORRIDA;
$MINUTOS_TRANSCORRIDOS = $total_minutos_trasncorridos%60;
if($MINUTOS_TRANSCORRIDOS<=9) $MINUTOS_TRANSCORRIDOS='0'.$MINUTOS_TRANSCORRIDOS;
return ($HORA_TRANSCORRIDA.':'.$MINUTOS_TRANSCORRIDOS.' Horas');

} }
//chamamos a função e imprimimos
$diferenca =  calcular_tempo_trasnc(date($hora_atual),$sai_m)*-1;

$diferenca_hora = bcdiv($diferenca,60,0);
if($diferenca_hora>="1"){ 
$hora_subtracao = bcmul($diferenca_hora,60,0);
}
$diferenca_minutos = $diferenca-$hora_subtracao;


if($ponto=="1" && $diferenca>=$tempo_almoco && $sai_m<>" " && $sai_t==" "){
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	$_SESSION['data_hoje'] = $data_hoje;
	Header("Location: sistem/index.php");
	}
else{


if($sai_t<>" "){echo " Atenção!!!...<br> $nome_operador, você encerrou seu dia de trabalho de hoje as $sai_t.<br> Por esse motivo não pode acessar o sistema mais por hoje! ";
}
else{
echo " Atenção!!!...<br> $nome_operador, você encerrou seu 1º período de trabalho de hoje as $sai_m.<br> Seu horario de almoço transcorreu apenas ";
if($diferenca_hora<="9"){ echo "0$diferenca_hora:"; } else { echo $diferenca_hora; } if($diferenca_minutos<="9"){ echo"0$diferenca_minutos : "; } else{ echo $diferenca_minutos; } echo "<br>Portanto você não pode acessar o sistema agora! deve-se respeitar um intervalo de $tempo_almoco minutos<br><br>";
}


}}

else{

if($ponto=="1" && $diferenca<=$tempo_almoco && $sai_m==" "){
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	$_SESSION['data_hoje'] = $data_hoje;
	Header("Location: sistem/index.php");
	
	}
	
else{

if($ponto=="1" && $diferenca>=$tempo_almoco && $sai_m<>" "){
	$_SESSION['usuario'] = $usuario;
	$_SESSION['senha'] = $senha;
	$_SESSION['data_hoje'] = $data_hoje;
	Header("Location: sistem/principal.php");
	}

}
}

}

?> 

