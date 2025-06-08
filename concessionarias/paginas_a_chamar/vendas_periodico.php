<div width="18%">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="vendas_preriodico/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($vendas=="sim"){
			?>
      <input class='class01' type=image src="../../imagens/botoes/vendas.png" width="100" height="100" name="Submit3" title="RESUMO DE TODAS AS VENDAS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "visualiza_vendas"; ?>">
      <? } ?>
    </form>
	  <? } ?>
</div>