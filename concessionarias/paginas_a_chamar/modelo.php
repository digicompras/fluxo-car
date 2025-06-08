<?php

session_start(); //inicia sessão...

if ($_SESSION["senha"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["data_hoje"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.



else //se não for...

header("Location: alerta.php");


$senha = $_SESSION['senha'];

ini_set('default_charset','UTF8_general_mysql500_ci');

?>





<html>

<head>

<title>Servi&ccedil;os ao Cliente</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">

<!--

.style3 {color: #0000FF; font-weight: bold; }

-->
	
<!--

.style5 {color: #ffffff; font-weight: bold; }

-->

</style>

</head>

<?
require '../conect/conect.php';
include '../css_menus/modal.css';
include '../css_menus/modal2.css';
	
$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$db = $linha[1];
}
	
	
	
$diaatual = date('d');
	$mesatual = date('m');
	$anoatual = date('Y');
	$date_vencto = date('Y-m-d');
	
	
$solicitacao = $_POST['solicitacao'];
	$solicitacao_gravar_abertura_caixa = $_POST['solicitacao_gravar_abertura_caixa'];
	$solicitacao_gravar_fechamento_caixa = $_POST['solicitacao_gravar_fechamento_caixa'];
	
?>
	
<?
	
$sql = "SELECT * FROM operadores where senha = '$senha'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$operador = $linha[1];
	
$emailoperador = $linha[20];

$estab_pertence = $linha[44];

$cidade_estab_pertence = $linha[15];
	
	$estab_pertence = $linha[44];

$telefone_estab_pertence = $linha[46];

$email_estab_pertence = $linha[47];

$obra_operador = $linha[50];
	
$estoque_autorizado = $linha[54];
$conciliacoes_autorizado = $linha[55];
$despesas_autorizado = $linha[56];
$veiculos_autorizado = $linha[57];

$pecas_autorizado = $linha[59];
$regimecontratacao = $linha[60];
$administracartaoponto = $linha[61];
$relatoriodepecasutilizadas = $linha[65];
$fornecedores = $linha[66];
$controlekm_autorizado = $linha[75];
$orcamento_autorizado = $linha[76];
$permissao_categoria_de_produtos_autorizado = $linha[77];
	
$recebenotificacao = $linha[49];
	$iniciar_rdo_diferenciado = $linha[51];
	$estoque = $linha[54];
	$conciliacoes = $linha[55];
	$despesas = $linha[56];
	$veiculos = $linha[57];
	//$rdo = $linha[58];
	$rdo_autorizado = $linha[58];
	$avisodepecas = $linha[59];
	$administracartaoponto = $linha[61];
	$relatoriodepecasutilizadas = $linha[65];
	$fornecedores = $linha[66];
	$inventario = $linha[67];
	$estoque_entradas = $linha[68];
	$cadastro_de_itens = $linha[69];
	$alimentacao_rdo = $linha[70];
	$estoque_entradas_por_xml_autorizado = $linha[71];
	$veiculodaempresa = $linha[72];
	$controlekm = $linha[75];
	$orcamento = $linha[76];
	$permissao_categoria_de_produtos = $linha[77];
	$inclui_mais_uma_nf = $linha[78];
	$financeiro = $linha[79];
	$relatoriodecomissao = $linha[80];
	$registrodeoperadores = $linha[81];
	$abrir_e_fechar_cx = $linha[82];
	
}	
	
	
if(($diaatual>="01") && ($diaatual<="05")  ){
	
	 
	
	$sql = "SELECT * FROM tabela_cartoes where estab_pertence = '$estab_pertence' and mes = '$mesatual' and ano = '$anoatual'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	$registros_de_lancamentos_mes_atual = mysql_num_rows($res);
}
	if($registros_de_lancamentos_mes_atual>=1){
		
	}
	else{
	
$sql = "SELECT * FROM tabela_cartoes where estab_pertence = '$estab_pertence' order by codigo desc limit 4";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
	$registros_de_lancamentos_de_cartoes = mysql_num_rows($res);

	$codigocartao = $linha[0];
$statuscartao = $linha[1];
	$datecartao = $linha[2];
	$diacartao = $linha[3];
	$mescartao = $linha[4];
	$anocartao = $linha[5];
	$modopagtocartao = $linha[6];
	$prazo_inicialcartao = $linha[7];
	$prazo_finalcartao = $linha[8];
	$aliquotacartao = $linha[9];
	$vigenciacartao = $linha[10];
	$estab_pertencecartao = $linha[11];
	
	
	
	if($registros_de_lancamentos_de_cartoes>=1){
		
		$comando = "insert into tabela_cartoes(status,date,dia,mes,ano,modopagto,prazo_inicial,prazo_final,aliquota,vigencia,estab_pertence)

values('Ativo','$anoatual-$mesatual-$diaatual','$diaatual','$mesatual','$anoatual','$modopagtocartao','$prazo_inicialcartao','$prazo_finalcartao','$aliquotacartao','$anoatual-$mesatual-31','$estab_pertence')";
 
mysql_query($comando,$conexao);
		
		
	$comando = "update `$db`.`tabela_cartoes` set `status` = 'Inativo' where `tabela_cartoes`. `codigo` = '$codigocartao'";
mysql_query($comando,$conexao);
		
	}
	else{

		
	}
		

	
}
	
	}
	

}
	
	
	$sql = "SELECT * FROM estabelecimentos where nfantasia = '$estab_pertence' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$diafechamento = $linha[45];
	
}
	
?>
	
<?
	
if($solicitacao_gravar_fechamento_caixa=="gravarfechamentocaixa"){
	

$datefechamento = date('Y-m-d');
$horafechamento = date('H:i:s');


$sub_valorfechamento = $valor_total_entradas+$total_recebimento_cartoes+$total_recebimento_carteira;
$valorfechamento = bcadd($sub_valorfechamento,0,2);

$saldofechamento = bcsub($valorfechamento,$valor_total_saidas,2);
	
	if($registro_fechamento<=0){

$comando = "insert into cx_fechamento(operador,datefechamento,horafechamento,valorfechamento,valordinheiro,valorcartao,valorcarteira,valorsaidas,saldofechamento,loja,departamento)
values('$operador','$datefechamento','$horafechamento','$valorfechamento','$valor_total_entradas','$total_recebimento_cartoes','$total_recebimento_carteira','$valor_total_saidas','$saldofechamento','$estab_pertence','$estab_pertence')";
mysql_query($comando,$conexao);
		
	}
	


}
	
?>
	
<?
	
if($solicitacao_gravar_abertura_caixa=="gravaraberturacaixa"){

$dateabertura = date('Y-m-d');
$horaabertura = date('H:i:s');

$valor = $_POST['valor'];


	
	$comando = "insert into cx_abertura(operador,dateabertura,horaabertura,valorabertura,loja,departamento) values('$operador','$dateabertura','$horaabertura','$valor','$estab_pertence','$estab_pertence')";
mysql_query($comando,$conexao);


?>

<script>

alert("Abertura de caixa registrada com sucesso!!!...\n\n<? echo "R$ $valor"; ?> \n\n<? echo "$nome_operador"; ?> \n\n<? echo "$departamento"; ?> \n\nTenha um òtimo dia de trabalho!");

window.location = "index.php";


</script>


<?

} 
 
?>

	
<?
	
//-----------calculando data de ontem--------------

$datecadastro = date('Y-m-d');
$datacadastro = date('d-m-Y');

$datadehoje = time(); 
$ontem = $datadehoje - (24*3600);
$datadeontem = date('Y-m-d', $ontem);
		  
		  
$data_de_ontem_obtida = $datadeontem;

$data_de_ontem_obtida2 = explode("-", $data_de_ontem_obtida);



$dia_de_ontem_obtida = $data_de_ontem_obtida2[0];

$mes_de_ontem_obtido = $data_de_ontem_obtida2[1];

$ano_de_ontem_obtido = $data_de_ontem_obtida2[2];


//-------------fim do calculo da data de ontem------------

//-----------------------------------------verificando movimentação de caixa hoje-----------------------------------------------


$sql = "SELECT * FROM cx_abertura where operador = '$operador' and loja = '$estab_pertence' and dateabertura = '$datecadastro' order by dateabertura desc limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$registro_de_abertura = mysql_num_rows($res);
	
$data_de_abertura = $linha[2];

}



$sql2 = "SELECT * FROM cx_fechamento where operador = '$operador' and loja = '$estab_pertence' and datefechamento = '$datecadastro' order by datefechamento desc limit 1";
$res2 = mysql_query($sql2);
while($linha=mysql_fetch_row($res2)) {
$registro_de_fechamento = mysql_num_rows($res2);
	
$data_de_fechamento = $linha[2];

}


//---------------------------------------------------------fim da verificação de hoje--------------------------------------------------	

	
if($solicitacao=="atualizarfoto1"){
	
	$codigo = $_POST['codigo'];
	
unlink("$img1");
	
	
				  
				  //-----------
	
$foto1 = $_FILES['foto1']['name'];
	
$uploaddir = "fotos/";
$uploadfile = $uploaddir. $_FILES['foto1']['name'];

if (
move_uploaded_file($_FILES['foto1']['tmp_name'], $uploaddir.$_FILES['foto1']['name'])) {
  echo "NF enviada com sucesso! ";
} else {
  echo "NF n&atilde;o foi enviada!";
}
	
$link_foto1 = "http://www.fluxocar.com.br/concessionarias/fotos/$foto1";

//----------
					  
$comando = "update `$db`.`mensalidade_sistema_comp_pagto` set `foto1` = '$link_foto1',`nomefoto1` = '$foto1',`status` = 'PAGO',`date_envio` = '$anoatual-$mesatual-$diaatual' where `mensalidade_sistema_comp_pagto`. `codigo` = '$codigo' limit 1 ";
mysql_query($comando,$conexao) or die("Erro ao gravar o comprovante no sistema, avise a administração pelo fale conosco!");
}
				   

	
	
$sql = "SELECT * FROM mensalidade_sistema_comp_pagto where mes = '$mesatual' and ano = '$anoatual' and status = 'PAGO' order by ano,mes desc";
$res = mysql_query($sql);
$verifica_se_mensalidade_esta_paga = mysql_num_rows($res);
	
	
?>
	

	
	
<body
	  
	  <?

$sql = "SELECT * FROM background";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {



$background = $linha[1];

}
	  
	  ?>
	  
	background="../imagens_sistema/<? echo $background; ?>" bgproperties="fixed">
<? 
include("$ultimo_departamento_trabalhado.php");
?>

<table width="100%"  border="0">

  <tr>
    <td width="4%">&nbsp;</td>
    <td width="14%">
		 <? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="veiculos/pesquisa.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($veiculos_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/icone-veiculos.png" width="100" height="100" name="Submit" value="Verificar Veiculos">
      <? } ?>
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <input class='class02' name="placa" type="hidden" id="placa">
      <input class='class02' name="localizacao" type="hidden" id="localizacao">
      <input class='class02' name="veiculo" type="hidden" id="veiculo">
    </form>
	  <? } ?>
    </td>
    <td width="12%">
		 <? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="rdo/index.php">
      <?

$senha = $_SESSION['senha'];

?>
      <?
		if($rdo_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/rdo.png" width="100" height="100" name="Submit4" value="RDO">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
    </td>
    <td width="14%">
		 <? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="estoque_pecas/menu.php" >
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($estoque_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/estoque.png" width="100" height="100" name="Submit6" value="ESTOQUE DE PE&Ccedil;AS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
    </td>
    <td width="18%">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="conciliacao/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($conciliacoes_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/conciliacao.png" width="100" height="100" name="Submit3" value="ESTOQUE DE PE&Ccedil;AS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
    </td>
    <td align="center">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="fornecedores/menu.php">
      <strong><font color="#0000FF">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
		if($fornecedores=="sim"){
			?>
        <input class='class01' type=image src="../imagens/botoes/forecedores.png" width="100" height="100" name="Submit8" value="ESTOQUE DE PE&Ccedil;AS">
        <? } ?>
        </font></strong>
    </form>
	  <? } ?>
    </td>
    <td align="center"><form action="index.php#fecharcaixa" method="post" name="form2" id="form10">
        <div align="center">
          <input name="fechamentodecaixa" type="hidden" id="fechamentodecaixa" value="fechar caixa">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if($abrir_e_fechar_cx=="sim"){
	if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ echo "<input class='class01' type=image src='../imagens_botoes/fechamentodecaixa.png' width='100' height='100' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } } ?>
        </div>
    </form>
		
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="controlekm/index.php" >
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($controlekm_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/controlekm.png" width="120" height="100" name="Submit9" value="ESTOQUE DE PE&Ccedil;AS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
    </td>
    <td>
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form3" method="post" action="index.php#permissoes">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
	 <?
		if($permissao_categoria_de_produtos=="sim"){
			?>	
      <input name="solicitacao" type="hidden" id="solicitacao" value="abripermissoesdesubcategoria">
      <input class='class01' type=image src="../imagens/botoes/permissoes.png" width="120" height="100" name="Submit10" value="ESTOQUE DE PE&Ccedil;AS">
    </form><? } ?><? } ?></td>
    <td><? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="operadores/menu.php">
      <?

$senha = $_SESSION['senha'];

?>
      <?
		if($registrodeoperadores=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/registrodeoperador.jpg" width="100" height="100" name="Submit4" value="RDO">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
    <? } ?></td>
    <td>
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="prestacao_contas/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($despesas_autorizado=="sim"){
			?>
      <strong><font color="#0000FF">
      <input class='class01' type=image src="../imagens/botoes/despesas.png" width="100" height="100" name="Submit2" value="ESTOQUE DE PE&Ccedil;AS">
      </font></strong>
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
    </td>
    <td align="center">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="index.php#balancete_geral" target="navegacao">
      <strong><font color="#0000FF">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
		if($financeiro=="sim"){
			?>
        <input class='class01' type=image src="../imagens/botoes/financeiro.png" width="100" height="100" name="Submit7" value="ESTOQUE DE PE&Ccedil;AS">
        <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
        <input name="solicitacao" type="hidden" id="solicitacao" value="balancete_geral">
        <? } ?>
        </font></strong>
        </form>
	  <? } ?>
    </td>
    <td><? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
      <form name="form1" method="post" action="ponto_administracao/menu.php" target="navegacao">
        <strong><font color="#0000FF">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <?
		if($administracartaoponto=="sim"){
			?>
          <input class='class01' type=image src="../imagens/botoes/administracao-ponto.png" width="100" height="100" name="Submit12" value="ESTOQUE DE PE&Ccedil;AS">
          <? } ?>
          </font></strong>
      </form>
    <? } ?></td>
  </tr>

  <tr>

    <td colspan="5"><p>&nbsp;</p>
		<div id="permissoes" class="modal" role="dialog" style="overflow: auto; width: 640px; height: 400px; border:solid 0px"> <a href="#fechar" title="Fechar" class="fechar"><b>X</b></a>
      <table width="80%" border="0" align="center">
        <tbody>
          <tr>
            <td valign="top">&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right">&nbsp;</td>
          </tr>
          <tr>
            <td width="46%" valign="top"><table width="100%" border="0" align="left">
              <tbody>
                <tr>
                  <th width="55%" bgcolor="#CACACA" scope="col">Sub Categorias dispon&iacute;veis</th>
                  <th width="45%" bgcolor="#CACACA" scope="col">#</th>
                  </tr>
                <?

$sql = "SELECT * FROM sub_categorias order by subcategoria asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigosubcategoria = $linha[0];
$subcategoria = $linha[8];


?>
                <tr>
                  <td bgcolor="#cacaca"><? echo "$subcategoria"; ?></td>
                  <td bgcolor="#cacaca"><form name="form5" method="post" action="index.php#permissoes">
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <input name="subcategoriapermitida" type="hidden" id="subcategoriapermitida" value="<? echo "$subcategoria"; ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="permitirsubcategoria">
                    <input class="class01" type="submit" name="submit" id="submit" value="Permitir">
                    </form></td>
                  </tr>
                <? } ?>
                </tbody>
            </table></td>
            <td width="6%">&nbsp;</td>
            <td width="48%" valign="top"><table width="100%" border="0" align="left">
              <tbody>
                <tr>
                  <th width="55%" bgcolor="#cacaca" scope="col">Sub Categorias permitidas</th>
                  <th width="45%" bgcolor="#cacaca" scope="col">#</th>
                  </tr>
                <?

$sql = "SELECT * FROM subcategoria_ec where empresaconveniada = '$estab_pertence' order by sub_categoria_permitida asc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$codigosubcategoriaexcluir = $linha[0];
$subcategoriapermitida = $linha[2];


?>
                <tr>
                  <td bgcolor="#cacaca"><? echo "$subcategoriapermitida"; ?></td>
                  <td bgcolor="#cacaca"><form name="form5" method="post" action="index.php#permissoes">
                    <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
                    <input name="codigosubcategoriaexcluir" type="hidden" id="codigosubcategoriaexcluir" value="<? echo "$codigosubcategoriaexcluir"; ?>">
                    <input name="solicitacao" type="hidden" id="solicitacao" value="excluirsubcategoria">
                    <input class="class01" type="submit" name="submit2" id="submit2" value="X">
                    </form></td>
                  </tr>
                <? } ?>
                </tbody>
            </table>
		 </td>
          </tr>
        </tbody>
      </table>
	  </div>
    <? } ?></td>

    <td width="15%">&nbsp;</td>
    <td width="23%">&nbsp;</td>

  </tr>

</table>


<p>&nbsp;</p>
</body>
	

</html>

<? 

mysql_free_result($res);

mysql_close($conexao);

?>