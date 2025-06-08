<div width="18%">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="tarifas_cartoes/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($aliquotas_dos_cartoes=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/aliquotas_cartoes.png" width="100" height="100" name="Submit3" title="ALIQUOTAS DOS CARTOES">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
</div>