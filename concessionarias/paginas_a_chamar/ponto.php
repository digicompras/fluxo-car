<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
	<td><? if( ($registro_de_abertura>=1) && ($registro_de_fechamento==0) ){ ?>
      <form name="form1" method="post" action="ponto_administracao/menu.php" target="navegacao">
        <strong><font color="#0000FF">
          <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
          <?
		if($administracartaoponto=="sim"){
			?>
          <input class='class01' type=image src="../imagens/botoes/administracao-ponto.png" width="100" height="100" name="Submit12" value="ESTOQUE DE PE&Ccedil;AS">
          <? } ?>
          </font></strong>
      </form>
    <? } ?></td>
</body>
</html>