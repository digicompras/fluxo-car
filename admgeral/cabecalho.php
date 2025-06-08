<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<table width="100%" border="0" bgcolor="#ECE9D8">
  <tr>
    <td width="11%" valign="top">      <form action="principal.php" method="post" name="form1" target="_top" id="form4">
        
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input type="submit" name="Submit4" value="Home" />
        </div>
    </form></td>
    <td width="14%" valign="top"><form action="estabelecimentos/menu.php" method="post" name="form2" target="navegacao" id="form15">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit15" value="Concessionárias" />
    </form></td>
    <td><form action="veiculos/menu.php" method="post" name="form6" target="navegacao" id="form8">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit8222" value="Veículos" />
    </form></td>
    <td width="12%" valign="top"><form action="" method="post" name="form2" target="navegacao" id="form12">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit16" value="Ocorrências" />
    </form></td>
    <td width="9%" valign="top"><div align="center">
      <form action="fornecedores/menu.php" method="post" name="form1" target="navegacao" id="form2">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input type="submit" name="Submit" value="Fornecedores" />
        </div>
      </form>
    </div></td>
    <td valign="top"><form action="operadores/menu.php" method="post" name="form20" target="navegacao" id="form13">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit17" value="Operadores(Funcionários)" />
    </form></td>
    <td valign="top"><div align="center">
      <form action="cidades/menu.php" method="post" name="form6" target="navegacao" id="form25">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit28" value="Cidades do Brasil " />
      </form>
    </div></td>
    <td width="12%" valign="top"><div align="center">
      <form action="hora_de_encerramento_do_sistema/hora_encerramento.php" method="post" name="form1" target="navegacao" id="form3">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input type="submit" name="Submit2" value="Horários do Sistema" />
        </div>
      </form>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">
      <form action="financeiro/principal.php" method="post" name="form2" target="navegacao" id="form">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit5" value="Financeiro" />
      </form>
    </div></td>
    <td><form action="clientes/menu.php" method="post" name="form2" target="navegacao" id="form6">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit7" value="Clientes" />
    </form></td>
    <td><div align="center">
      <form action="produtos/menu.php" method="post" name="form2" target="navegacao" id="form7">
        <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
        <input type="submit" name="Submit8" value="Produtos" />
      </form>
    </div></td>
    <td><div align="center">
      <form action="relatorios/menu.php" method="post" name="form9" target="navegacao" id="form9">
        <div align="center">
          <input type="hidden" name="solicitacao" id="solicitacao" />
          <input type="hidden" name="comissao" id="comissao" />
          <input type="submit" name="Submit3" value="Relatórios" />
        </div>
      </form>
    </div></td>
    <td><div align="center"></div></td>
    <td width="16%"><form action="operadores_for/menu.php" method="post" name="form20" target="navegacao" id="form5">
      <?
$usuario = $_SESSION['usuario'];
$senha = $_SESSION['senha'];
?>
      <input type="submit" name="Submit6" value="Operadores(Fornecedores)" />
    </form></td>
    <td width="13%"><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
</table>
</body>
</html>
