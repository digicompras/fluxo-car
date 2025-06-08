<div>
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="estoque_pecas/estoque_trans/responder_solicitacoes/index.php" >
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($responder_transferencias_de_estoque=="sim"){
			?>
      <input class='class01' type=image src="../../imagens/botoes/transferencia_estoque.png" width="100" height="100" name="Submit9" title="RESPONDER TRANSFERENCIA DE ESTOQUE">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
</div>