<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {color: #0000FF;

	font-weight: bold;
}
-->
</style>
</head>

<body>
<?

require'../../conect/conect.php';

?>

<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><form id="form1" name="form1" method="post" action="inserir.php">
      <label>
      <input type="submit" name="button" id="button" value="Incerir cliente" />
      </label>
        </form>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><form id="form4" name="form4" method="post" action="editar_por_cpf.php">
      <input type="text" name="cpf" id="cpf" />
      <input type="submit" name="button3" id="button3" value="Editar por cpf" />
        </form>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><form id="form5" name="form5" method="post" action="">
      <input type="submit" name="button4" id="button4" value="Excluir" />
        </form>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><form id="form2" name="form2" method="post" action="menu.php">
      <input type="text" name="nome" id="nome" />
        <input type="submit" name="button2" id="button2" value="pesqusar" />
    </form>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%"  border="1">
  <tr>
    <td><div align="center" class="style2">Nome do Cliente </div></td>
    <td><div align="center">excluir</div></td>
    <td><div align="center" class="style2">data nascimento</div></td>
  </tr>
  <?
$nome = $_POST['nome'];


if(empty($nome)){

}
else{

$sql = "select * from clientes where nome like '$nome%' order by nome asc";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {





$codigo = $linha[0];

$nome = $linha[1];

$data_nasc = $linha[2];





?>
  <tr>
    <td width="24%" valign="top"><div align="center">
      <form action="editar.php" method="post" name="form1" id="form3" >
        <div align="center">
          <input name="codigo" type="hidden" id="codigo2" value="<? echo $codigo;  ?>" />
          <input type="submit" name="Submit8" value="<? echo $nome; ?>" />
        </div>
      </form>
    </div></td>
    <td width="22%" valign="top"><div align="center">
      <form action="excluir.php" method="post" name="form1" id="form6" >
        <div align="center">
          <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo;  ?>" />
          <input type="submit" name="Submit" value="excluir" />
        </div>
      </form>
    </div></td>
    <td width="22%" valign="top"><div align="center"><span class="<? if($telemarketing=="Em Manuten&ccedil;&atilde;o"){echo"style3"; } else{ echo "style1"; } ?>"><? echo $data_nasc; ?></span></div></td>
  </tr>
  <? } }?>
</table>
<p>&nbsp;</p>
</body>
</html>
