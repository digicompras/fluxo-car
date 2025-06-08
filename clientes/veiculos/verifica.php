<?

session_start(); //inicia sessão...
if ($_SESSION["cnpj"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");
?>

<?
require '../../conect/conect.php';

$concessionaria = $_POST['concessionaria'];
$chassi = $_POST['chassi'];
$renavam = $_POST['renavam'];
$status_filtro = $_POST['status_filtro'];
$cnpj_filtro = $_POST['cnpj_filtro'];

if($chassi==""){
$sql = "SELECT * FROM veiculos where renavam = '$renavam'";
$res = mysql_query($sql);
}
else{
$sql = "SELECT * FROM veiculos where chassi = '$chassi'";
$res = mysql_query($sql);
}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$concessionaria_registrou = $linha[10];
$cnpj_concessionaria_registrou = $linha[11];
$status = $linha[61];

}
?>
<?
$sql = "SELECT * FROM estabelecimentos where cnpj = '$cnpj_concessionaria_registrou'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_concessionaria = $linha[0];
$razaosocial = $linha[1];
$concessionaria2 = $linha[2];
$cnpj_concessionaria = $linha[3];
$inscr_est = $linha[4];
$endereco = $linha[5];
$numero = $linha[6];
$bairro = $linha[7];
$complemento = $linha[8];
$cep = $linha[9];
$cidade = $linha[10];
$estado = $linha[11];
$telefone = $linha[12];
$fax = $linha[13];
$email_concessionaria = $linha[14];
$site = $linha[15];
$proprietario = $linha[16];
$cpf = $linha[17];
$rg = $linha[18];
$operador = $linha[24];
$cel_operador = $linha[25];
$email_operador = $linha[26];
$estabelecimento = $linha[27];
$cidade_estabelecimento = $linha[28];
$tel_estabelecimento = $linha[29];
$email_estabelecimento = $linha[30];
$obs = $linha[19];
$datacadastro = $linha[20];
$horacadastro = $linha[21];
$dataalteracao = $linha[22];
$horaalteracao = $linha[23];
$operador_alterou = $linha[31];
$cel_operador_alterou = $linha[32];
$email_operador_alterou = $linha[33];
$estabelecimento_alterou = $linha[34];
$cidade_estabelecimento_alterou = $linha[35];
$tel_estabelecimento_alterou = $linha[36];
$email_estabelecimento_alterou = $linha[37];
$operador_atendente = $linha[41];
$usuario = $linha[42];
$senha = $linha[43];

}


?>

  <?
if($reg==1) {
echo "ATENÇÃO!!!...Esse Veículo já esta registrado por: $concessionaria_registrou <br><br> Status do veículo: $status ";
}
else
{
echo "Veículo NÃO registrado na base da dados do sistema !<br><br> Clique em REGISTRAR VEICULO!";
}

?><title>VERIFICA&Ccedil;&Atilde;O DE REGISTRO DE VEICULOS</title>

  <form name="form1" method="post" action="pesquisa.php">
  <?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
  <input type="submit" name="Submit3" value="Voltar">
  <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
  </form>

        <?
$sql = "SELECT * FROM fundo_intermediaria";
$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {

$cor = $linha[1];	
?>
<? } ?>

  <table width="100%"  border="0">
  <tr>
    <td width="26%">
	
	<form action="<? if($status=="Estoque") {echo "comunicar_venda.php"; } else {echo "visualizar_veiculo.php";} ?>" method="post" name="form1">
      <?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
      <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
      <input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>">
      <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $concessionaria; ?>">
      <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
      <input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>">
      <? if(($reg==1) && ($status=="Estoque")) { echo "<input type='submit' name='Submit' value='Comunicar Venda'>"; } ?>
	  <? if($status=="Vendido") { echo "<input type='submit' name='Submit' value='Visualizar Veículo'>"; } ?>
    </form></td>
    <td width="59%"><form action="registrar_veiculo.php" method="post" name="form2">
      <?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
      <input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>">
      <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $concessionaria; ?>">
      <input name="cnpj" type="hidden" id="concessionaria3" value="<? echo $cnpj; ?>">
      <input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>">
      <? if($reg==0) { echo "<input type='submit' name='Submit' value='Registrar Veículo'>"; } ?>
    </form></td>
    <td width="15%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>




      <table width="100%"  border="0">
        <tr>
          <td><div align="center"><span class="style2">
          Listando todos os ve&iacute;culos da concessionaria:</span> <span class="style2"><? echo $concessionaria2 ?><BR>
		   Telefone:  <? echo $tel_concessionaria; ?> - E-Mail: <? echo $email_concessionaria; ?></span></div></td>
        </tr>
      </table>
<div align="center"><br>
          <form name="form3" method="post" action="ver_todos_veiculos_da_concessionaria.php">
            Visualizar todos os ve&iacute;culos dessa concession&aacute;ria
            <?
$cnpj = $_SESSION['cnpj'];
$data_hoje = $_SESSION['data_hoje'];
?>
            <input name="status_filtro" type="hidden" id="status_filtro">
            <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj; ?>">
            <input type="submit" name="Submit" value="Visualizar">    
  </form>
  </div>
      