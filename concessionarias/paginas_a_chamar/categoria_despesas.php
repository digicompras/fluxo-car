<div>
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="financeiro/categorias_despesas/menu.php" >
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($categoria_despesas=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/categoria_despesas.png" width="100" height="100" name="Submit9" title="CATEGORIA DE DESPESAS">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
</div>