
<html>

<head>

<title>Untitled Document</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

body {

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style></head>



<?

//require("conexao.php"); or die("erro na requisição");

require 'conect/conect.php';







//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 

$sql = "SELECT * FROM fundo_navegacao";

//EXECUTA O COMANDO ACIMA

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {

$reg++;

?>





<body bgcolor="#<? printf("$linha[1]"); ?>">
<?

if($reg==1){

echo "</tr><tr>";

$reg=0;

}

?>
<? } ?>

<?

// dados do curriculo
$ip = $_SERVER['REMOTE_ADDR'];


$nome = $_POST['nome'];

$telefones = $_POST['telefones'];

$email = $_POST['email'];

$endereco = $_POST['endereco'];

$numero  = $_POST['numero'];

$bairro = $_POST['bairro'];

$cidade = $_POST['cidade'];

$experiencias = $_POST['experiencias'];

$motivo_trabalhar = $_POST['motivo_trabalhar'];

$data_cadastro = date('d-m-Y');

$hora_cadastro = date('H:i:s');

$escolaridade = $_POST['escolaridade'];

$curso = $_POST['curso'];

$data_nasc = $_POST['data_nasc'];

$empresas_trabalhou = $_POST['empresas_trabalhou'];

//IP DE ONDE SE ENVIOU O CURRICULO
//INICIO DO SCRIPT PARA PEGAR IP
 
echo "Remote addr: " .$_SERVER['REMOTE_ADDR'] . "<br/>";
 
echo "X Forward: " . $_SERVER['HTTP_X_FORWARDED_FOR'] . "<br/>";
 
echo "Clien IP: " . $_SERVER['HTTP_CLIENT_IP'] . "<br/>";
 

function getIp()
{
 
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
 
        $ip = $_SERVER['HTTP_CLIENT_IP'];
 
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
 
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 
    }
    else{
 
        $ip = $_SERVER['REMOTE_ADDR'];
 
    }
 
    return $ip;
 
}

//FIM DO SCRIPT PARA PEGAR IP



$comando = "insert into curriculos(nome,telefones,endereco,numero,bairro,cidade,experiencias,motivo_trabalhar,data_cadastro,hora_cadastro,escolaridade,curso,email,data_nasc,empresas_trabalhou,ip)
 values('$nome','$telefones','$endereco','$numero','$bairro','$cidade','$experiencias','$motivo_trabalhar','$data_cadastro','$hora_cadastro','$escolaridade','$curso','$email','$data_nasc','$empresas_trabalhou','$ip')";





mysql_query($comando,$conexao);





echo "Parabéns!!!....Seu curriculo foi enviado com sucesso!<br><br> Assim que vagas surgirem você será contatado(a) para uma entrevista!<br><br>";



?>





<?

$sql = "SELECT * FROM curriculos order by codigo desc limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

?>

<?

$codigo = $linha[0];

$nome = $linha[1];

$telefones= $linha[2];

$email= $linha[3];

$endereco = $linha[4];

$numero = $linha[5];

$bairro = $linha[6];

$cidade = $linha[7];

$experiencias = $linha[8];

$motivo_trabalhar = $linha[9];

$data_cadastro = $linha[10];

$hora_cadastro = $linha[11];

$escolaridade = $linha[12];

$curso = $linha[13];

$data_nasc = $linha[14];

$empresas_trabalhou = $linha[15];


}
?>



<?

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
	
	$email_dest   =   $email_empresa;

	

	//PREPARA O PEDIDO

	$mens   =  "Olá! Seu curriculo foi enviado com sucesso para $nfantasia_empresa!   \n";

	$mens  .=  "Visite-nos $site_empresa \n";

	$mens  .=  "Nome: ".$nome."                                                       \n";
	$mens  .=  "Data Nascimento: ".$data_nasc."                                                       \n";
	$mens  .=  "Escolaridade: ".$escolaridade."                                                       \n";
	
	$mens  .=  "Curso: ".$curso."                                                       \n";

	$mens  .=  "telefones: ".$telefones."                                                    \n";
	
	$mens  .=  "E-Mail: ".$email."                                                    \n";

	$mens  .=  "Endereço: ".$endereco."                                                    \n";

	$mens  .=  "Número: ".$numero."                                                    \n";

	$mens  .=  "Bairro: ".$bairro."                                                    \n";

	$mens  .=  "Cidade: ".$cidade."                                                    \n";

	$mens  .=  "Experiencias profissionais: ".$experiencias."                                                    \n\n";
	
	$mens  .=  "Empresas onde trabalhou: ".$empresas_trabalhou."                                                    \n";

	$mens  .=  "Por que deseja trabalhar na Allcred Financeira? ".$motivo_trabalhar."                                      \n";

	$mens  .=  "Data do envio: ".$data_cadastro."                                                    \n";

	$mens  .=  "Hora do envio: ".$hora_cadastro."                                                    \n";

	$mens  .=  "IP de partiu o cadastro: ".$ip."                                                    \n";



	//DISPARA O EMAIL
$envia  =  mail($email_dest, "Curriculo enviado pelo site ".$nome." em ".$data_cadastro, $mens,"From:".$email_dest."\r\nBcc:".$email);

?>









<p>&nbsp;</p>

<form action="javascript:window.close()" method="post" name="form1" target="_top">
  <input type="submit" name="Submit" value="Fechar Janela">
</form>
<p>&nbsp;</p>

</body>

</html>

<?

mysql_close($conexao);

?>