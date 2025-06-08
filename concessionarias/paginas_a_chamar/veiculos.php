<div width="14%">
		 <? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
		<form name="form1" method="post" action="veiculos/pesquisa.php">
      <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
      <?
		if($veiculos_autorizado=="sim"){
			?>
      <input class='class01' type=image src="../imagens/botoes/icone-veiculos.png" width="100" height="100" name="Submit" title="CADASTRO E VERIFICACAO DE VEICULOS E CLIENTES">
      <? } ?>
      <input name="senha" type="hidden" id="senha" value="<? echo $senha; ?>">
      <input class='class02' name="placa" type="hidden" id="placa">
      <input class='class02' name="localizacao" type="hidden" id="localizacao">
      <input class='class02' name="veiculo" type="hidden" id="veiculo">
    </form>
	  <? } ?>
</div>
