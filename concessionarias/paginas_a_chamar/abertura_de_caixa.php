<div width="14%">
		 <? if(($abrir_e_fechar_cx=="sim") && ($funcao<>"Mecanico") ){ ?>
		 <form action="index.php#aberturadecaixa" method="post" name="form2" id="form4">
		   <input name="solicitacao" type="hidden" id="solicitacao" value="abrircaixa" />
			 <?

$senha = $_SESSION['senha'];

$data_hoje = $_SESSION['data_hoje'];

?>
		   <? 
		
	if(($registro_de_abertura==0) && ($registro_de_fechamento==0) ){ 

echo'<input class="class01" type=image src="../../imagens_botoes/registradora.png" width="100" height="100" name="Submit2" value="Abertura de caixa">';
	

	}

?>
  </form>
		 <? } ?>
</div>
