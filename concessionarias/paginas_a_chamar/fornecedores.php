<div align="center">
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="fornecedores/menu.php">
      <strong><font color="#0000FF">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <?
		if($fornecedores=="sim"){
			?>
        <input class='class01' type=image src="../imagens/botoes/forecedores.png" width="100" height="100" name="Submit8" title="FORNECEDORES">
        <? } ?>
        </font></strong>
    </form>
	  <? } ?>
</div>