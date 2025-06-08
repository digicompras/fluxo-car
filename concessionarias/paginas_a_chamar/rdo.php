<div width="12%">
		 <? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="rdo/index.php">
      <?

$senha = $_SESSION['senha'];

?>
      <?
		if($rdo_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/rdo.png" width="100" height="100" name="Submit4" title="RDO">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
</div>
