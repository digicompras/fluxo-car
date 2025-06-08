<div width="18%">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="contas_bancarias/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($cadastro_de_contas_bancarias=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/contas_bancarias.png" width="100" height="100" name="Submit3" title="CONTAS BANCARIAS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
</div>