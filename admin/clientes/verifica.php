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

$cpf = $_POST['cpf'];

require '../../conect/conect.php';

$sql = "SELECT * FROM clientes where cpf = '$cpf'";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$cpf = $linha[4];
$tipo = $linha[40];
}
?>
  <?
if($reg==1){
echo "ATENÇÃO!!!...Esse cliente já está cadastrado no sistema!<br><br>Nº de Matrícula do Cliente: $codigo <br><br> Clique em PREENCHER PROPOSTA!";
$reg=0;
}
else
{
echo "Cliente NÃO cadastrado na base da dados do sistema ALLCRED FINANCEIRA!<br><br> Clique em CADASTRAR CLIENTE!";
}

?>

  <form name="form1" method="post" action="menu.php">
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
    <td width="26%">
	
	<form action="../propostas/informacoes_antecedem_efetuar_proposta.php" method="post" name="form1">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input name="tipo" type="hidden" id="tipo" value="<? echo $tipo; ?>">
      <input type="submit" name="Submit" value="Preencher Proposta">
    </form></td>
    <td width="59%"><form action="cadcli_insert.php" method="post" name="form2">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input name="cpf" type="hidden" id="cpf" value="<? echo $cpf; ?>">
      <input name="tipo" type="hidden" id="tipo" value="<? echo $tipo; ?>">
      <input type="submit" name="Submit" value="Cadastrar Cliente">
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
            <?
$cpf = $_POST['cpf'];
			
$sql = "SELECT * FROM propostas where cpf = '$cpf' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$nome = $linha[4];



?>
          Listando todas as propostas do cliente:</span> <span class="style2"><? printf("$linha[4]"); ?><BR>
		   CPF:  <? echo $cpf; ?>        <? } ?> </span></div></td>
        </tr>
      </table><br><br>
<table width="100%"  border="0">
              <tr>
                <td>
</td>
              </tr>
</table>            
      <?
$cpf = $_POST['cpf'];
			
$sql = "SELECT * FROM propostas where cpf = '$cpf' order by num_proposta desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
?>            
      <table width="100%"  border="0">
        <tr bgcolor="#<? echo $cor ?>">
          <td>N&ordm; da Proposta </td>
          <td>Valor do Cr&eacute;dito Solicitado </td>
          <td width="19%">Quant de parcelas </td>
          <td width="17%">Valor das parcelas </td>
          <td>Status</td>
        </tr>
		
        <tr>
          <td width="23%"><div align="center">               <form name="form2" method="post" action="../propostas/editar_proposta_por_num_proposta.php">
              <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
              
  <input name="num_proposta" type="hidden" id="num_proposta" value="<? echo $linha[0]; ?>">
  <? // printf("<a href='editar_proposta.php?chamar=$linha[0]' >$linha[0]</a>"); ?>
                <? printf("$linha[0]"); ?>                <input type="submit" name="Submit" value="Editar Proposta">
              
          </form></div></td>
          <td width="22%"><div align="center"><? printf("R$ $linha[25]</a> ");?>
          </div></td>
          <td><div align="center"><? printf("$linha[26]"); ?>
          </div></td>
          <td><div align="center"><? printf("$linha[27]"); ?>
          </div></td>
          <td width="19%"><div align="center"><? printf("$linha[51]"); ?>
          </div></td>
		  <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
<? } ?>
        
      </table>

