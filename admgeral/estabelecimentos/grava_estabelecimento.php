
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
require '../../conect/conect.php';

ini_set('default_charset','UTF8_general_mysql500_ci');

//QUERY PARA SELECIONAR TODOS DADOS NO BANCO DE DADOS 
$sql = "SELECT * FROM fundo_navegacao";
//EXECUTA O COMANDO ACIMA
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
$reg++;
?>


<body bgcolor="#ffffff">
  <?
if($reg==1){
echo "</tr><tr>";
$reg=0;
}
?>
  
<? } ?>
<?
// dados do estabelecimento
$razaosocial = $_POST['razaosocial'];
$nfantasia = $_POST['nfantasia'];
$cnpj = $_POST['cnpj'];
$inscr_est = $_POST['inscr_est'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$telefone  = $_POST['telefone'];
$fax = $_POST['fax'];
$email = $_POST['email'];
$site = $_POST['site'];
$proprietario = $_POST['proprietario'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$obs = $_POST['obs'];
$datacadastro = $_POST['datacadastro'];
$horacadastro = $_POST['horacadastro'];
$dataalteracao = $_POST['dataalteracao'];
$horaalteracao = $_POST['horaalteracao'];
$operador = $_POST['operador'];
$cel_operador = $_POST['cel_operador'];
$email_operador = $_POST['email_operador'];
$estabelecimento = $_POST['estabelecimento'];
$cidade_estabelecimento = $_POST['cidade_estabelecimento'];
$tel_estabelecimento = $_POST['tel_estabelecimento'];
$email_estabelecimento = $_POST['email_estabelecimento'];
$operador_alterou = $_POST['operador_alterou'];
$cel_operador_alterou = $_POST['cel_operador_alterou'];
$email_operador_alterou = $_POST['email_operador_alterou'];
$estabelecimento_alterou = $_POST['estabelecimento_alterou'];
$cidade_estabelecimento_alterou = $_POST['cidade_estabelecimento_alterou'];
$tel_estabelecimento_alterou = $_POST['tel_estabelecimento_alterou'];
$email_estabelecimento_alterou = $_POST['email_estabelecimento_alterou'];
$motivo_exclusao = $_POST['motivo_exclusao'];
$status = $_POST['status'];
$valor = $_POST['valor'];
	$diafechamento = $_POST['diafechamento'];
	$classificacao = $_POST['classificacao'];

$dias_contrato = "365";
//}

	
if((empty($razaosocial)) or (empty($nfantasia)) or (empty($cnpj)) or (empty($endereco)) or (empty($numero)) or (empty($bairro)) or (empty($cep)) or (empty($cidade)) or (empty($estado)) or (empty($email)) or (empty($proprietario)) or (empty($cpf)) or (empty($rg))  ){

echo "<script>

alert('ATENÇÃO!!!... TODOS OS CAMPOS COM * DEVEM SER PREENCHIDOS.');
window.location = 'inserir_estabelecimento.php?razaosocial=$razaosocial&nfantasia=$nfantasia&cnpj=$cnpj&endereco=$endereco&numero=$numero&bairro=$bairro&cep=$cep&cidade=$cidade&estado=$estado&email=$email&proprietario=$proprietario&cpf=$cpf&rg=$rg';

</script>";


	}
	else{
		
$sql = "SELECT * FROM estabelecimentos where cnpj = '$cnpj' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	
$registros_estabelecimento = mysql_num_rows($res);

}
		
if($registros_estabelecimento>=1){
	
echo "<script>

alert('ATENÇÃO!!!... CNPJ INFORMADO JÁ CADASTRADO.');

</script>";
	
}
else{
	
$comando = "insert into estabelecimentos(razaosocial,nfantasia,cnpj,inscr_est,endereco,numero,bairro,complemento,cep,cidade,estado,telefone,fax,email,site,proprietario,cpf,rg,obs,datacadastro,horacadastro,dataalteracao,horaalteracao,operador,cel_operador,email_operador,estabelecimento,cidade_estabelecimento,tel_estabelecimento,email_estabelecimento,operador_alterou,cel_operador_alterou,email_operador_alterou,estabelecimento_alterou,cidade_estabelecimento_alterou,tel_estabelecimento_alterou,email_estabelecimento_alterou,motivo_exclusao,status,valor,dias_contrato,diafechamento,classificacao) values('$razaosocial','$nfantasia-$classificacao','$cnpj','$inscr_est','$endereco','$numero','$bairro','$complemento','$cep','$cidade','$estado','$telefone','$fax','$email','$site','$proprietario','$cpf','$rg','$obs','$datacadastro','$horacadastro','$dataalteracao','$horaalteracao','$operador','$cel_operador','$email_operador','$estabelecimento','$cidade_estabelecimento','$tel_estabelecimento','$email_estabelecimento','$operador_alterou','$cel_operador_alterou','$email_operador_alterou','$estabelecimento_alterou','$cidade_estabelecimento_alterou','$tel_estabelecimento_alterou','$email_estabelecimento_alterou','$motivo_exclusao','$status','$valor','$dias_contrato','$diafechamento','$classificacao')";

mysql_query($comando,$conexao) or die("Erro ao gravar estabelecimento!");
		
}
		
		
		
$sql2 = "SELECT * FROM operadores where cpf = '$cpf' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	
$registros_operador = mysql_num_rows($res2);

}
		
if($registros_operador>=1){
	
echo "<script>

alert('ATENÇÃO!!!... CPF INFORMADO JÁ CADASTRADO.');

</script>";
	
}
else{
		
$comando = "insert into operadores(cidade,estado,nome,cpf,rg,email,senha,funcao,estab_pertence,recebenotificacao,iniciar_rdo_diferenciado,estoque,conciliacoes,despesas,veiculos,rdo,avisodepecas,administracartaoponto,relatoriodepecasutilizadas,fornecedores,inventario,estoque_entradas,cadastro_de_itens,alimentacao_rdo,estoque_entradas_por_xml_autorizado,veiculodaempresa,controlekm,orcamento,permissao_categoria_de_produtos,inclui_mais_uma_nf,obra) values('$cidade','$estado','$proprietario','$cpf','$rg','$email','$cpf','ADMINISTRATIVO','$nfantasia','nao','nao','sim','sim','sim','sim','sim','sim','nao','nao','sim','sim','sim','sim','sim','nao','sim','sim','sim','sim','nao','GERAL')";

mysql_query($comando,$conexao) or die("Erro ao gravar operador!");
		
	}
		
		
		
	}
	

$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site = $linha[15];

}


echo "concessionária/oficina cadastrada com sucesso!<br> Foi enviado um e-mail a concessionária/oficina avisando ela que está cadastrada na $nfantasia_empresa <br><br>";

?>


<?
$sql = "SELECT * FROM estabelecimentos order by codigo desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>
<?
printf("Código do estabelecimento é: $linha[0]");
$razaosocial = $linha[1];
$nfantasia = $linha[2];
$cnpj = $linha[3];
$telefone = $linha[12];
$email = $linha[14];
	$cpf_proprietario = $linha[17];
$datacadastro = $linha[20];
$horacadastro = $linha[21];
$operador_atendente = $linha[41];
$operador = $linha[24];
$cel_operador = $linha[25];
$email_operador = $linha[26];
$estabelecimento = $linha[27];
$cidade_estabelecimento = $linha[28];
$tel_estabelecimento = $linha[29];
$email_estabelecimento = $linha[30];

$diafechamento = $linha[45];

?>

<? } ?>

<?
	
$sql2 = "SELECT * FROM operadores where cpf = '$cpf_proprietario' limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
	
$senha = $linha[41];

}
	
	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	$email_dest   =   $email;
	
	//PREPARA O PEDIDO
	$mens   =  "Olá! Agora você é parceiro da $nfantasia_empresa!   \n";
	$mens  .=  "Para registrar os veículos de seus clientes e suas respectivas manutenções acesse! \n";
	$mens  .=  " $site \n\n";

	$mens  .=  "Logo abaixo você tem as informações de que precisa para acessar sua área exclusiva! \n\n";
	
	$mens  .=  "Razão Social: ".$razaosocial."                                                       \n";
	$mens  .=  "Nome Fantasia: ".$nfantasia."                                                    \n";
	$mens  .=  "CNPJ: ".$cnpj."                                                    \n";
	$mens  .=  "Telefone: ".$telefone."                                                    \n";
	$mens  .=  "E-Mail: ".$email."                                                    \n";
	$mens  .=  "Data do cadastro: ".$datacadastro."                                                    \n";
	$mens  .=  "Hora do cadastro: ".$horacadastro."                                                    \n";
	$mens  .=  "Melhor dia para vencto da mensalidade: ".$diafechamento."                                                    \n";
	$mens  .=  "Senha: ".$senha."                                                    \n\n";
	$mens  .=  "INSTRUÇÃO IMPORTANTE SOBRE A SENHA: NÃO A REVELE A NINGUEM!!!...A RESPONSABILIDADE É TODA SUA!!!...    \n\n";

	 
	$mens  .=  "Prezado(a): ".$proprietario."                                                    \n";
	$mens  .=  "Para acessar o serviço de registro de informações de manutenções: "."                                                    \n";
	$mens  .=  "Acesse: $site e clique em Concessionárias e faça seu login"."                                                    \n";

	
	//DISPARA O EMAIL
	$envia  =  mail($email_dest, "Concessionária cadastrada no sistema em ".$datacadastro, $mens,"From:".$email_dest."\r\nBcc:".$email);
	

?>




<p>&nbsp;</p>
<table width="100%"  border="0">
  <tr>
    <td width="33%">&nbsp;</td>
    <td width="39%" align="center"><!-- INICIO DO BOTAO PAGSEGURO --><!-- FIM DO BOTAO PAGSEGURO -->
      <form name="form1" method="post" action="../login_concessionarias.php">
        <input class='class01' type="submit" name="Submit4" value="Concession&aacute;rias">
    </form></td>
    <td width="28%">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?
mysql_close($conexao);
?>