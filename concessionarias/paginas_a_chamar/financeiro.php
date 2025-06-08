<div align="center">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="index.php#balancete_geral" target="navegacao">
      <strong><font color="#0000FF">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
		if($financeiro=="sim"){
			?>
        <input class='class01' type=image src="../imagens/botoes/financeiro.png" width="100" height="100" name="Submit7" title="FINANCEIRO">
        <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
        <input name="solicitacao" type="hidden" id="solicitacao" value="balancete_geral">
        <? } ?>
        </font></strong>
        </form>
	  <? } ?>
</div>