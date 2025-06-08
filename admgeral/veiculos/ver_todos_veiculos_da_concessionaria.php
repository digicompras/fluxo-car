<?

session_start(); //inicia sessão...
if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...
echo ""; //se for emite mensagem positiva.
if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...
echo ""; //se for emite mensagem positiva.
else //se não for...
header("Location: alerta.php");
?>

<?
require '../../conect/conect.php';

$status_filtro = $_POST['status_filtro'];
$concessionaria = $_POST['concessionaria'];


?>
<?
$sql = "SELECT * FROM estabelecimentos where nfantasia = '$concessionaria'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo_concessionaria = $linha[0];
$razaosocial = $linha[1];
$concessionaria = $linha[2];
$cnpj_concessionaria2 = $linha[3];
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


<title>VISUALIZANDO TODOS REGISTROS DE VEICULOS</title>

  <form name="form1" method="post" action="pesquisa.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit3" value="Voltar">
</form>
  <table width="100%"  border="0">
        <tr>
          <td><div align="center"><span class="style2">
          Listando todos os ve&iacute;culos da concessionaria:</span> <span class="style2"><? echo $concessionaria ?><BR>
		   Telefone:  <? echo $tel_concessionaria; ?> - E-Mail: <? echo $email_concessionaria; ?></span></div></td>
        </tr>
  </table>
<div align="center"><br>
          <form name="form3" method="post" action="ver_todos_veiculos_da_concessionaria.php">
            Filtrar por status do ve&iacute;culo
            <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $concessionaria; ?>">
<span style="font-weight: bold">
    <select class='class02' name="status_filtro" id="status_filtro">
              <option selected><? echo $fornecedor; ?></option>
              <?


    $sql = "select * from fornecedores order by nfantasia asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['nfantasia']."</option>";
    }
?>
            </select>
            </span>
            <input type="submit" name="Submit" value="Filtrar">    
  </form>
  </div>
      <table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>            
                  
      <table width="100%"  border="0">
        <tr bgcolor="#ffffff">
          <td><div align="center">C&oacute;digo</div></td>
          <td><div align="center">Ve&iacute;culo</div></td>
          <td><div align="center">Ano</div></td>
          <td width="8%"><div align="center">Modelo</div></td>
          <td width="21%"><div align="center">Chassi</div></td>
          <td><div align="center">Renavam</div></td>
          <td><div align="center">Placa</div></td>
          <td><div align="center">Status</div></td>
        </tr>
<?
if($status_filtro==""){			
$sql = "SELECT * FROM veiculos where concessionaria = '$concessionaria'  order by codigo desc";
}
else{
$sql = "SELECT * FROM veiculos where concessionaria = '$concessionaria' and fornecedor = '$status_filtro' order by codigo desc";
}
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$datacadastro = $linha[1];
$horacadastro = $linha[2];
$concessionaria_do_veiculo = $linha[10];
$cnpj_concessionaria_do_veiculo = $linha[11];
$tel_concessionaria = $linha[12];
$email_concessionaria = $linha[13];
$cidade_concessionaria = $linha[14];
$estado_concessionaria = $linha[15];
$veiculo = $linha[16];
$ano = $linha[17];
$modelo = $linha[18];
$chassi = $linha[19];
$renavam = $linha[20];
$placa = $linha[21];
$obs_veiculo = $linha[22];
$dia_inicio_contrato = $linha[23];
$mes_inicio_contrato = $linha[24];
$ano_inicio_contrato = $linha[25];
$dia_termino_contrato = $linha[26];
$mes_termino_contrato = $linha[27];
$ano_termino_contrato = $linha[28];
$nome = $linha[29];
$alcunha = $linha[30];
$data_nasc = $linha[31];
$mes_nasc = $linha[32];
$sexo = $linha[33];
$estadocivil = $linha[34];
$cpf = $linha[35];
$rg = $linha[36];
$orgao = $linha[37];
$emissao = $linha[38];
$pai = $linha[39];
$mae = $linha[40];
$endereco = $linha[41];
$numero = $linha[42];
$bairro = $linha[43];
$complemento = $linha[44];
$cidade = $linha[45];
$estado = $linha[46];
$cep = $linha[47];
$telefone = $linha[48];
$celular = $linha[49];
$email = $linha[50];
$obs = $linha[51];
$status = $linha[61];

?>        <tr>
          <td width="13%">
            <form name="form2" method="post" action="<? if($status=="Estoque") {echo "comunicar_venda.php"; } else {echo "visualizar_veiculo.php";} ?>">
              <div align="center">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
              <input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>">
              <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $concessionaria_do_veiculo; ?>">
              <input name="cnpj_concessionaria" type="hidden" id="cnpj_concessionaria" value="<? echo $cnpj_concesionaria; ?>">
              <input name="renavam" type="hidden" id="renavam3" value="<? echo $renavam; ?>">
<? if($status=="Estoque") { echo "<input type='submit' name='Submit' value='Comunicar Venda'>"; } ?>
<? if($status=="Vendido") { echo "<input type='submit' name='Submit' value='Visualizar Veículo'>"; } ?>          </div>  </form>
          </td>
          <td width="16%"><div align="center"><? echo $veiculo;?></div></td>
          <td width="7%"><div align="center"><? echo $ano;?>
          </div></td>
          <td><div align="center"><? echo $modelo; ?>
          </div></td>
          <td><div align="center"><? echo $chassi; ?>
          </div></td>
          <td width="15%"><div align="center"><? echo $renavam; ?>
          </div></td>
		  <td width="7%"><div align="center"><? echo $placa; ?></div></td>
		  <td width="13%"><div align="center"><? echo $status; ?></div></td>
		  <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
<? } ?>
        
      </table>

