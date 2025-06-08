<div width="14%">
		 <? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="estoque_pecas/menu.php" >
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($estoque_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/estoque.png" width="100" height="100" name="Submit6" title="CONTROLE E MANUTENCAO DE ESTOQUE">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
</div>