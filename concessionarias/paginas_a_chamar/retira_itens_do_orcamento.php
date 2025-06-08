<div width="18%">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="retira_itens_do_orcamento/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($retira_itens_do_orcamento=="sim"){
			?>
      <input class='class01' type=image src="../../imagens_botoes/retira_item.png" width="100" height="100" name="Submit3" title="ALIQUOTAS DOS CARTOES">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
</div>