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

$dia_atual = date('d');
$mes_atual = date('m');
$ano_atual = date('Y');


$concessionaria = $_POST['concessionaria'];
$placa = $_POST['placa'];
$chassi = $_POST['chassi'];
$renavam = $_POST['renavam'];
$status_filtro = $_POST['status_filtro'];
$cnpj_filtro = $_POST['cnpj_filtro'];

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

$codigo = $linha[0];
$concessionaria_registrou = $linha[10];
$cnpj_concessionaria_registrou = $linha[11];
$dia_inicio_contrato = $linha[23];
$mes_inicio_contrato = $linha[24];
$ano_inicio_contrato = $linha[25];
$dia_termino_contrato = $linha[26];
$mes_termino_contrato = $linha[27];
$ano_termino_contrato = $linha[28];
$status = $linha[61];
//$status_contrato = $linha[64];
//$motivo_inatividade = $linha[65];

}
?>

<?php
#setando a primeira data 
$dia1 = mktime(0,0,0,$dia_inicio_contrato,$mes_inicio_contrato,$ano_inicio_contrato);
#setando segunda data
if($dia_inicio_contrato==0){
$dia2 = mktime(0,0,0,$dia_termino_contrato,$mes_termino_contrato,$ano_termino_contrato); 
}
else{
$dia2 = mktime(0,0,0,$dia_atual,$mes_atual,$ano_atual);  
}
#armazenando o valor da subtracao das datas
$d3 = ($dia2-$dia1);
#usando o roud para arrendondar os valores
#converter o tempo em dias
$dias_vencidos = round (($d3/60/60/24)-1);
$dias = abs((($dia2-$dia1) / ((60*60*24)))-1);
#converter o tempo em horas
//$hrs = round(($d3/60/60));
#converter o tempo em minutos
//$mins = round(($d3/60));
?> 
<?
if($dias>$dias_contrato_concessionaria){

$sql = "select * from db";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$comando = "update `$linha[1]`.`veiculos` set `codigo` = '$codigo',`status_contrato` = 'Inativo',`motivo_inatividade` = 'Contrato Vencido' where `veiculos`. `codigo` = '$codigo' limit 1 ";
}

mysql_query($comando,$conexao);

}

?>
<?
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

$status_contrato = $linha[64];
$motivo_inatividade = $linha[65];

}
?>


  <?
if($reg==1) {
echo "ATENÇÃO!!!...Esse Veículo já esta registrado por: $concessionaria_registrou <br><br>Garantia por $dias_contrato_concessionaria dias e está em andamento há $dias dias.<br><br> Status do veículo: $status<br><br> Status do contrato: $status_contrato <br><br>";
if($status_contrato==Inativo){
echo "Esse contrato foi realizado há $dias dias portanto se encontra $status_contrato por $motivo_inatividade há ".
#exibindo  dias | repudizira na tela 31
"$dias_vencidos"." dias ";}
}
else
{
echo "Veículo NÃO registrado na base da dados do sistema !<br><br> Clique em REGISTRAR VEICULO!";
}

?><title>VERIFICA&Ccedil;&Atilde;O DE REGISTRO DE VEICULOS</title>

  <form name="form1" method="post" action="pesquisa.php">
  <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
  <input type="submit" name="Submit3" value="Voltar">
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
          <td><div align="center"><span class="style2">
          Listando todos os ve&iacute;culos da concessionaria:</span> <span class="style2"><? echo $concessionaria ?><BR>
		   Telefone:  <? echo $tel_concessionaria; ?> - E-Mail: <? echo $email_concessionaria; ?></span></div></td>
        </tr>
      </table>
<div align="center"><br>
          <form name="form3" method="post" action="ver_todos_veiculos_da_concessionaria.php">
            Visualizar todos os ve&iacute;culos dessa concession&aacute;ria
            <input name="status_filtro" type="hidden" id="status_filtro">
            <input name="cnpj_concessionaria" type="hidden" id="cnpj_concessionaria" value="<? echo $cnpj_concessionaria_registrou; ?>">
            <input type="submit" name="Submit" value="Visualizar">    
  </form>
  </div>
      