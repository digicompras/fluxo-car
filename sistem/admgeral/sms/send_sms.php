<?PHP
/**
 * Página de teste de Envio de SMS
 * @author Samuel Aiala Ferreira <samuca@samuca.com>
 * @version 1.0
 * @package SMS
*/
if ($_POST['acao'] == 'sendsms')
{
	$x   = SendSMS("127.0.0.1", 8800, "", "", $_POST['txtTELEFONE'], $_POST['txtMENSAGEM']);	
	echo $x;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Envio de SMS</title>
	</head>
	<body>
	<form name='frmSend' method='post'>
			<input type='hidden' name='acao' value='sendsms'>
			<table width="100%" style="border-collapse:collapse;" border="1">
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="txtTELEFONE"></td>
			</tr>
			<tr>
			  <td>Mensagem:</td>
			  <td><textarea name="txtMENSAGEM" cols="60" rows="10" id="txtMENSAGEM"></textarea></td>
			  </tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><input type="submit" name="Submit" value="Enviar SMS"></td>
			  </tr>
			</table>
			
		</form>
	</body>
</html>


<?
/**
 * Função que envia o SMS
 * @return string Mensagem de Sucesso de Envio de SMS
 * @param string $host Host onde foi instalado seu Now SMS
 * @param string $port A Porta que você está usando
 * @param string $username Pode deixar em branco
 * @param string $password Pode deixar em branco
 * @param string $phoneNoRecip Telefone, no formato +55[DDD sem o 0][Telefone, com 8 posições]
 * @param string $msgText Mensagem que deseja enviar, limite em 160 caracteres, senão ele manda quantas mensagens necessárias para atingir o limite.
 */
function SendSMS ($host, $port, $username, $password, $phoneNoRecip, $msgText) { 
 
    $fp = fsockopen($host, $port, $errno, $errstr);
    if (!$fp) {
        echo "errno: $errno \n";
        echo "errstr: $errstr\n";
        return $result;
    }
    fwrite($fp, "GET /PhoneNumber=" . rawurlencode($phoneNoRecip) . "&Text=" . rawurlencode($msgText) . " HTTP/1.0\n");
	echo $aux3;
    if ($username != "") {
       $auth = $username . ":" . $password;
       echo "auth: $auth\n";
       $auth = base64_encode($auth);
       echo "auth: $auth\n";
       fwrite($fp, "Authorization: Basic " . $auth . "\n");
    }
    fwrite($fp, "\n");
  
    $res = "";
 
    while(!feof($fp)) {
        $res .= fread($fp,1);
    }
    fclose($fp);
    
 
    return $res;
}


echo $x;

 
?>
