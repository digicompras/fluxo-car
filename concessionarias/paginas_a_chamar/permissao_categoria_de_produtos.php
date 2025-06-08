<div>
		<? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form3" method="post" action="index.php#permissoes">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
	 <?
		if($permissao_categoria_de_produtos=="sim"){
			?>	
      <input name="solicitacao" type="hidden" id="solicitacao" value="abripermissoesdesubcategoria">
      <input class='class01' type=image src="../imagens/botoes/permissoes.png" width="100" height="100" name="Submit10" title="PERMISSAO DE CATEGORIAS">
    </form><? } ?><? } ?>
</div>