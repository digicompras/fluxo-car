<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" href="css/padrao.css" type="text/css"/>
        <title>Definindo produto</title>
    </head>
    <body>
	<div id="pagina">

	    <?php
		if(eDefinirProduto_Daruma($_GET['produto']) == 1) {
	    ?>

	    <script type="text/javascript">
		alert("Produto definido com sucesso!");
		window.location = "./<?php echo strtolower($_GET['produto']) ?>";
	    </script>

	    <?php
		} else {
	    ?>

	    <h3 style="color: red">Erro ao definir o produto</h3>
	    <p align="center">Redirecionando....</p>
		
		<script type="text/javascript">
		alert("Produto definido com sucesso!");
		window.location = "./<?php echo strtolower($_GET['produto']) ?>";
	    </script>
		
	    <!--<script type="text/javascript">
		setTimeout('window.location = "./"', 1500);
	    </script> -->

	    <?php
		}
	    ?>

	</div>

    </body>
</html>
