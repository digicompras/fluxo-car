<?



session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");

?>



<?
require '../../conect/conect.php';
include '../../css_menus/modal.css';
include '../../css_menus/modal2.css';

$sql2 = "select * from db";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {

$db = $linha[1];
}

?>

<style type="text/css">
.style11 {font-size: 35px;
	font-weight: bold;
	color: #ffffff;
}
.style2 {
	font-size: 20px;
	color: #ffffff;
	font-weight: bold;
}
.style1 {font-size: 18px;
	font-weight: bold;
	color: #0000FF;
}
</style>

<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">



<?

$sql = "SELECT * FROM fundo_intermediaria";

$res = mysql_query($sql);



while($linha=mysql_fetch_row($res)) {



$cor = $linha[1];
	
}
?>
<?

$concessionaria = $_POST['concessionaria'];

$placa = $_POST['placa'];

$chassi = $_POST['chassi'];

$renavam = $_POST['renavam'];

//$status_filtro = $_POST['status_filtro'];

//$cnpj_filtro = $_POST['cnpj_filtro'];



if(empty($placa)){
	
if(empty($chassi)){

$sql = "SELECT * FROM veiculos where renavam = '$renavam'";
	
}
	else{
		
$sql = "SELECT * FROM veiculos where chassi = '$chassi'";
		
	}

}
else{

$sql = "SELECT * FROM veiculos where placa = '$placa'";

}

$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$reg++;



$codigo_veiculo = $linha[0];

$datacadastro = $linha[1];

$horacadastro = $linha[2];

$operador = $linha[3];

$cel_operador = $linha[4];

$email_operador = $linha[5];

$estabelecimento = $linha[6];

$cidade_estabelecimento = $linha[7];

$tel_estabelecimento = $linha[8];

$email_estabelecimento = $linha[9];

$concessionaria = $linha[10];

$cnpj_concessionaria = $linha[11];

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

$corveiculo = $linha[30];

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

$url = $linha[66];
	
	$localizacao = $linha[76];
	
	$fornecedor = $linha[77];

}

?>

<?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$operador = $linha[1];
	
$cel_operador = $linha[19];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[45];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];
$rdo_autorizado = $linha[58];
$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$fornecedores = $linha[66];
$controlekm_autorizado = $linha[75];
$orcamento_autorizado = $linha[76];


}

$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_concessionaria = $linha[2];
$cnpj_concessionaria = $linha[3];


}




?>



  <title>VERIFICANDO DE REGISTRO DE VEICULOS</title>



  <table width="95%" border="0" align="center" cellspacing="0">
    <tr>
                <td colspan="5" align="center"><?

if($reg==1) {
	

echo "ATENCAO!!!...Esse Veiculo ja esta registrado no sistema! <br><br> ";

}

else

{

echo "Veiculo NAO registrado na base da dados do sistema !<br><br> Clique em REGISTRAR VEICULO!";

}



?></td>
            <td width="13%" align="center" rowspan="8" valign="top"><?
			$aux = '../../qrcode/qr_img0.50j/php/qr_img.php?';
			$aux .= "d=$url&";
			$aux .= 'e=H&';
			$aux .= 's=4&';
			$aux .= 't=J';
		?>
              <span style="float: left; border: 1px solid #000;"><img src="<?php echo $aux; ?>"><br><? echo "$veiculo<br>$placa<br>www.fluxocar.com.br"; ?></span></td>
                <td width="33%" rowspan="8" align="center" valign="top"><table width="95%"  border="0">
                  <tr>
                    <td width="26%"><form name="form1" method="post" action="pesquisa.php">
                      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
                      <input class='class01' type=image src='../../imagens/botoes/voltar.png' width='100' height='100' name="Submit3" value="Voltar">
                      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
                    </form></td>
                    <td width="26%"><form action="registrar_veiculo.php" method="post" name="form1">
                      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
                      <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
                      <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                      <input name="chassi" type="hidden" id="chassi" value="<? echo $chassi; ?>">
                      <input name="concessionaria" type="hidden" id="concessionaria" value="<? echo $nfantasia_concessionaria; ?>">
                      <input name="cnpj" type="hidden" id="cnpj" value="<? echo $cnpj_concessionaria; ?>">
                      <input name="renavam" type="hidden" id="renavam" value="<? echo $renavam; ?>">
                      <? if($reg==0) { echo "<input class='class01' type=image src='../../imagens/botoes/registrar-veiculo.png' width='100' height='100' name='Submit' value='Registrar Veiculo'>"; } ?>
                    </form></td>
                    <td width="21%"><form action="registrar_manutencao.php" method="post" name="form1">
                      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
                      <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
                      <? if(($reg==1) && ($status=="Estoque")) { echo "<input class='class01' type=image src='../../imagens/botoes/registrar-manutencao.png' width='100' height='100' name='Submit' value='Registrar Manutencao'>"; } ?>
                    </form></td>
                  </tr>
                  <tr>
                    <td><form action="../relatorios/historico_de__manutencoes_do_veiculo.php" method="post" target="_blank" name="form1">
                      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
                      <input name="placa" type="hidden" id="placa" value="<? echo "$placa"; ?>">
                      <? if(($reg==1) && ($status=="Estoque")) { echo "<input class='class01' type=image src='../../imagens/botoes/visualizar-manutencao.png' width='100' height='100' name='Submit' value='Visualizar Manutencoes'>"; } ?>
                    </form></td>
                    <td><form action="editar_veiculo.php" method="post" name="form2">
                      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
                      <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                      <? if(($reg==1) && ($status=="Estoque"))  { echo "<input class='class01' type=image src='../../imagens/botoes/editar.png' width='100' height='100' name='Submit' value='Editar Veiculo'>"; } ?>
                    </form></td>
                    <td><form action="etiqueta_pasta.php" method="post" name="form1" target="_blank">
                      <div align="center">
                        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
                        <? if(($reg==1) && ($status=="Estoque"))  { echo "<input class='class01' type=image src='../../imagens/botoes/etiqueta.png' width='100' height='100' name='Submit' value='Etiqueta'>"; } ?>
                        <? 
	
	if($oferta=="Sim"){

echo "*";

}
else{
	
	
}
	
	
	 ?>
                      </div>
                    </form></td>
                  </tr>
                </table></td>
          </tr>
          <tr>
            <td width="1%">&nbsp;</td>
            <td width="17%">Ve&iacute;culo</td>
            <td width="11%">Placas</td>
            <td width="11%">Cor</td>
            <td width="14%">Fornecedor</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><? echo $veiculo; ?></td>
            <td><? echo $placa; ?></td>
            <td><? echo $corveiculo; ?></td>
            <td><? echo $fornecedor; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Ano</td>
            <td>Modelo</td>
            <td>&nbsp;</td>
            <td>Cidade</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><? echo $ano; ?></td>
            <td><? echo $modelo; ?></td>
            <td>&nbsp;</td>
            <td><? echo $localizacao; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>Chassi</td>
            <td>Renavam</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><? echo $chassi; ?></td>
            <td><? echo $renavam; ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
	<table width="100%"  border="0">
	  <tr>
	    <td width="37%" colspan="2" align="center"><form name="form4" method="post" action="verifica.php#pesquisacliente">
	      <span class="style11">
	        <span class="style2">
	        <? $nome = $_POST['nome'];
				if($nome=="TODOS"){

$sql = "select * from clientes order by nome asc";

}

else{

if(empty($nome)){

$sql = "select * from clientes where nome = '.' order by nome asc";

}

else{

$sql = "select * from clientes where nome like '%$nome%' order by nome asc";

}}

$res = mysql_query($sql);

	$registros = mysql_num_rows($res);
				?>
	        </span>
	        <? 
		
		  $codigo_orcamento = $_POST['codigo_orcamento'];
		  $num_fatura = $_POST['num_fatura'];
		  $confirmacancelamentocupom = $_POST['confirmacancelamentocupom'];
		  
		  if($confirmacancelamentocupom=="sim"){
		  
$comando = "update `$db`.`orcamentos` set `status` = 'CANCELADO',`status_fatura` = 'CANCELADO',`status_conta` = 'CANCELADO' where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento'";
mysql_query($comando,$conexao);
			  
$comando = "update `$db`.`produtos_em_orcamento` set `status` = 'CANCELADO',`status_fatura` = 'CANCELADO' where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento' ";
mysql_query($comando,$conexao);
			  
$comando = "update `$db`.`faturamento_futuro` set `status_conta` = 'CANCELADO',`status_fatura` = 'CANCELADO' where `faturamento_futuro`. `num_fatura` = '$num_fatura' ";
mysql_query($comando,$conexao);
			  
			  
			  
$sql4 = "SELECT * FROM produtos_em_orcamento where codigo_orcamento = '$codigo_orcamento' and num_fatura = '$num_fatura'";
$res4 = mysql_query($sql4);
while($linha=mysql_fetch_row($res4)) {


$codigoproduto_retirado = $linha[17];
$nomeproduto_retirado = $linha[18];
$categoria_retirado = $linha[19];
$quant_retirado = $linha[21];
$preco_retirado = $linha[22];
	
	

	$sql30 = "SELECT * FROM estoque_pecas where codigo = '$codigoproduto_retirado'";
$res30 = mysql_query($sql30);
while($linha=mysql_fetch_row($res30)) {

$quant_estoque_verificado = $linha[16];


	
	
	$saldo_estoque_da_peca = bcadd($quant_estoque_verificado,$quant_retirado);
	
	
$comando = "update `$db`.`estoque_pecas` set `quant_estoque` = '$saldo_estoque_da_peca' where `estoque_pecas`. `codigo` = '$codigoproduto_retirado'";
mysql_query($comando,$conexao);
	
}

}

	
		






		  
		  
		  
		  }
		  
		  
//$comando = "delete from `orcamentos` where `orcamentos`. `codigo_orcamento` = '$codigo_orcamento' and num_fatura = '$num_fatura' limit 1 ";
//mysql_query($comando,$conexao);
		  
//$comando = "delete from `produtos_em_orcamento` where `produtos_em_orcamento`. `codigo_orcamento` = '$codigo_orcamento' and num_fatura = '$num_fatura' limit 1 ";

//mysql_query($comando,$conexao);
		  
//$comando = "delete from `faturamento_futuro` where `faturamento_futuro`. `codigo_orcamento` = '$codigo_orcamento' and num_fatura = '$num_fatura' limit 1 ";

//mysql_query($comando,$conexao);
		  
		  ?>
	        <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
	        <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
          </span>
	      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
	      <input name="nome" type="text" class="class02" id="nome" placeholder='DIGITE O NOME DO CLIENTE AQUI' value="<? echo "$nome"; ?>" size="30">
	      <input class="class01" type="submit" name="Submit2" value="Buscar">
	      </form></td>
      </tr>
		
</table>
	<?
if($registros>=1){
		
		?>
	<div id="pesquisacliente" class="modal" role="dialog" style="overflow: auto; width: 600px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
  <table width="100%"  border="0">
	  <?
	  
if($nome=="TODOS"){

$sql = "select * from clientes order by nome asc";

}

else{

if(empty($nome)){

$sql = "select * from clientes where nome = '.' order by nome asc";

}

else{

$sql = "select * from clientes where nome like '%$nome%' order by nome asc";

}}

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {
	$registros = mysql_num_rows($res);

$codigo_cliente = $linha[0];
$codigo = $linha[0];

$nome = $linha[1];

$sexo = $linha[2];

$estadocivil = $linha[3];

$cpf = $linha[4];

$rg = $linha[5];

?>
  <tr>
      <td><div align="center" class="style2">Nome do Cliente </div></td>
      <td><div align="center" class="style2">Abrir Orçamento</div></td>
    </tr>
    
    <tr>
      <td width="20%" valign="top"><div align="center">
        <form name="form1" method="post" action="../sistem/clientes/editar_cliente.php" >
          <div align="center">
            <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf;  ?>">
            <input class="class01" type="submit" name="Submit5" value="<? echo "$nome --> Editar"; ?>">
          </div>
        </form>
      </div></td>
      <td width="17%" valign="top"><div align="center">
        <form name="form1" method="post" action="../sistem/orcamentos/orcamento.php">
          <span class="style11">
            <input name="solicitacao" type="hidden" id="solicitacao" value="abrir_orcamento">
            <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
            <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
            <input name="nome" type="hidden" id="nome" value="<? echo $nome;  ?>">
          </span>
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class='class01' type=image src="../../imagens/botoes/orcamento.PNG" width="50" height="50" name="Submit" value="RDO">
        </form>
      </div></td>
    </tr>
    <? } ?>
</table>
	</div>
		<?
}
else{

$cordotextocadastrarcliente = "ffffff";


	?>
		<div id="pesquisacliente" class="modal" role="dialog" style="overflow: auto; width: 600px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
	<table width="100%"  border="0">
<tr>
  <td align="center"><font color="#<? echo $cordotextocadastrarcliente; ?>"><p>&nbsp;</p>
    <p><strong>NENHUM REGISTRO ENCONTRADO COM ESSE NOME </strong></p>
    <p><strong><strong><? echo $nome; ?></strong></strong></p>
			<p><strong> CADASTRAR CLIENTE</strong></p></font></td>
<tr>
  <td align="center"><form action="../sistem/clientes/cadcli_insert.php" method="post" name="form2">
    
    <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
    <input class='class01' type=image src="../../imagens/botoes/clientes.jpg" width="100" height="100" name="Submit13" value="RDO">
</form></td>
	  </table>
			</div>
	<?
}

	
	?>
		
<table width="100%" border="0" cellspacing="0">
  <tr>
      <td colspan="9" bgcolor="#999999"><div align="center"><strong>HISTORICO DE MOVIMENTA&Ccedil;&Atilde;O DO CLIENTE</strong></div></td>
  </tr>
    <tr>
      <td width="14%"><div align="center">Fatura / Or&ccedil;amento / data</div></td>
      <td width="15%" align="center">Veiculo / Placa</td>
      <td width="13%"><div align="center">Quem trouxe o veiculo</div></td>
      <td width="9%"><div align="center">Condi&ccedil;&atilde;o</div></td>
      <td width="10%"><div align="center">Status</div></td>
      <td width="8%"><div align="center">Total Geral</div></td>
      <td width="9%"><div align="center"></div></td>
      <td width="13%"><div align="center"></div></td>
      <td width="9%"><div align="center"></div></td>
    </tr>
    <?

$sql = "SELECT * FROM orcamentos where placa = '$placa' and loja = '$estab_pertence' order by codigo_orcamento desc";
$res = mysql_query($sql);
$reg = 0;
while($linha=mysql_fetch_row($res)) {


$codigo_orcamento = $linha[0];
	$num_fatura = $linha[48];
$dataabertura = $linha[5];
	$diaaberturaorcamento = $linha[7];
	$mesaberturaorcamento = $linha[8];
	$anoaberturaorcamento = $linha[9];
	
$condicao = $linha[42];
$status = $linha[2];
$loja = $linha[43];
$total_geral = $linha[40];
$veiculo = $linha[29];
$placa = $linha[28];
$quemtrouxeoveiculo = $linha[46];
	

	
if($status=="CANCELADO"){
	
$cordacelula = "FD070B";
$cordotexto = "000000";

}
else{
	
$cordacelula = "CCCCCC";
$cordotexto = "0000FF";
	
}

?>
    <tr>
      <td bgcolor="#<? echo $cordacelula; ?>"><div align="center"><strong><font color="#<? echo $cordotexto; ?>"><strong><? echo "$num_fatura / $codigo_orcamento"; ?> </strong></font></strong>- <strong><font color="#<? echo $cordotexto; ?>"><strong><? echo "$diaaberturaorcamento-$mesaberturaorcamento-$anoaberturaorcamento"; ?></strong></font></strong></div></td>
      <td align="center" bgcolor="#<? echo $cordacelula; ?>"><strong><font color="#<? echo $cordotexto; ?>"><strong><? echo $veiculo; ?></strong></font></strong> - <strong><font color="#<? echo $cordotexto; ?>"><strong><? echo $placa; ?></strong></font></strong></td>
      <td bgcolor="#<? echo $cordacelula; ?>"><div align="center"><strong><font color="#<? echo $cordotexto; ?>"><strong><? echo $quemtrouxeoveiculo; ?></strong></font></strong></div></td>
      <td bgcolor="#<? echo $cordacelula; ?>"><div align="center"><strong><font color="#<? echo $cordotexto; ?>"><strong><? echo $condicao; ?></strong></font></strong></div></td>
      <td bgcolor="#<? echo $cordacelula; ?>"><div align="center"><strong><font color="#<? echo $cordotexto; ?>"><strong><? echo $status; ?></strong></font></strong></div></td>
      <td bgcolor="#<? echo $cordacelula; ?>"><div align="center"><strong><font color="#<? echo $cordotexto; ?>"><strong><? echo $total_geral; ?></strong></font></strong></div></td>
      <td bgcolor="#<? echo $cordacelula; ?>"><div align="center">
        <form action="../sistem/orcamentos/imprime_orcamento.php" method="post" name="form2" target="_blank">
          <span class="style1">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
          <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
          <input class="class01" type="submit" name="button" id="button" value="Imprimir">
        </form>
      </div></td>
      <td bgcolor="#<? echo $cordacelula; ?>"><div align="center">
        <form action="../sistem/orcamentos/imprime_orcamento_para_cliente.php" method="post" name="form2" target="_blank">
          <span class="style1">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
          <input name="codigo_cliente" type="hidden" id="codigo_cliente" value="<? echo $codigo_cliente; ?>">
          <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
          <input class='class01' type='submit' name='button2' id='button2' value='Imprimir p/ Cliente'>
        </form>
      </div></td>
      <td bgcolor="#<? echo $cordacelula; ?>"><div align="center">
        <form name="form2" method="post" action="../sistem/orcamentos/orcamento.php">
          <span class="style1">
            <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          </span>
          <input name="nome" type="hidden" id="nome" value="<? if(empty($nome)){ echo $quemtrouxeoveiculo; }else{ echo $nome; } ?>">
          <input name="codigo_orcamento" type="hidden" id="codigo_orcamento" value="<? echo $codigo_orcamento; ?>">
          <span class="style11">
          <input name="num_fatura" type="hidden" id="num_fatura" value="<? echo $num_fatura; ?>">
          </span>          <span class="style11">
          <input name="placa" type="hidden" id="placa" value="<? echo $placa; ?>">
          <input name="veiculo" type="hidden" id="veiculo" value="<? echo $veiculo; ?>">
          </span>
          <? if(($status=="CANCELADO") or ($status=="Finalizado") ){ }else {
			
		echo "<input class='class01' type='submit' name='button3' id='button3' value='Editar'>"; } ?>
			
			<? if(($condicao=="PEDIDO") && ($status=="Finalizado") ){ ?> 
			<input class="class01" type="submit" name="button3" id="button3" value="Ver/Receber"> 
			<? } ?>
			
        </form>
      </div></td>
    </tr>
    <?
}
?>
    <tr>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td><div align="center"></div></td>
      <td>&nbsp;</td>
      <td><div align="center"></div></td>
    </tr>
</table>
  <p>&nbsp;</p>

