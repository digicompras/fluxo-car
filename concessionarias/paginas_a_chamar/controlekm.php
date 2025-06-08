<div>
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="controlekm/index.php" >
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($controlekm_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/controlekm.png" width="100" height="100" name="Submit9" title="CONTROLE DE KM VEICULO DA EMPRESA">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
</div>