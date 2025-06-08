<div align="center"><form action="index.php#fecharcaixa" method="post" name="form2" id="form10">
        <div align="center">
          <input name="fechamentodecaixa" type="hidden" id="fechamentodecaixa" value="fechar caixa">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if($abrir_e_fechar_cx=="sim"){
	if($registro_de_fechamento_data_de_ontem_obtida==0) { ?>
		<input class="class01" type=image src="../imagens_botoes/fechamentodecaixa.png" width="100" height="100" name="Submit5" title="FECHAMENTO DE CAIXA">
		<? }else{
		if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?><input class="class01" type=image src="../imagens_botoes/fechamentodecaixa.png" width="100" height="100" name="Submit5" title="FECHAMENTO DE CAIXA">
		
	
	 <? } } } ?>
        </div>
    </form>
		
</div>