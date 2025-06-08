<div width="18%">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="conciliacao/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($conciliacoes_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/conciliacao.png" width="100" height="100" name="Submit3" title="CONCILIACOES DE CONSUMO">
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
</div>