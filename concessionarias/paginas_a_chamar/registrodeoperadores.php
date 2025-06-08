<div>
	<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="operadores/menu.php">
      <?

$senha = $_SESSION['senha'];

?>
      <?
		if($registrodeoperadores=="sim"){
			?>
      <input class='class01' type=image src="../../imagens/botoes/registrodeoperador.png" width="100" height="100" name="Submit4" title="CADASTRO DE OPERADORES">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
    <? } ?>
</div>