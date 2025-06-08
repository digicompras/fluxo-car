<div>
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="prestacao_contas/index.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($despesas_autorizado=="sim"){
			?>
      <strong><font color="#0000FF">
      <input class='class01' type=image src="../imagens/botoes/despesas.png" width="100" height="100" name="Submit2" title="PRESTACAO DE CONTAS">
      </font></strong>
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <? } ?>
    </form>
	  <? } ?>
</div>