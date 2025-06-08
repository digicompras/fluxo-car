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
    <td width="14%" valign="top"><form action="clientes/menu.php" method="post" name="form1" target="navegacao" id="form1">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit22" value="Clientes" />
      </div>
    </form></td>
    <td width="16%" valign="top"><div align="center">
      <form action="relatorios/relatorio_de_possibilidades.php" method="post" name="form2" target="navegacao" id="form3">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input type="submit" name="Submit2" value="Possibilidades a Respnder" />
        </div>
      </form>
    </div></td>
    <td width="14%" valign="top"><form action="etiquetas/informe_tipo_para_gerar_etiquetas.php" method="post" name="form4" target="navegacao" id="form17">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit7" value="Etiquetas mala-direta" />
      </div>
    </form></td>
    <td width="16%" valign="top"><div align="center">
      <form action="ips/menu.php" method="post" name="form8" target="navegacao" id="form13">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input type="submit" name="Submit21" value="Autorização de IP's" />
        </div>
      </form>
    </div></td>
    <td valign="top"><form action="operacoes_a_serem_executadas.php" method="post" name="form3" target="navegacao" id="form7">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "buscar bordero"; ?>" />
        <input type="submit" name="button" id="button" value="Borderôs" />
      </div>
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
    <td width="7%" valign="top"><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <form action="estabelecimentos/menu.php" method="post" name="form2" target="navegacao" id="form21">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input type="submit" name="Submit6" value="Estabelecimentos" />
        </div>
      </form>
    </div></td>
    <td><form action="fornecedores/menu.php" method="post" name="form1" target="navegacao" id="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit" value="Fornecedores" />
      </div>
    </form></td>
    <td><div align="center">
      <form action="correspondentes/menu.php" method="post" name="form20" target="navegacao" id="form16">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input type="submit" name="Submit202" value="Agentes" />
        </div>
      </form>
    </div></td>
    <td><div align="center">
      <form action="mototaxi/menu.php" method="post" name="form8" target="navegacao" id="form29">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit122" value="Mototaxi" />
      </form>
    </div></td>
    <td><div align="center">
      <form action="bancos/menu.php" method="post" name="form6" target="navegacao" id="form30">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit9" value="Bancos" />
      </form>
    </div></td>
    <td width="11%"><form action="estados_do_brasil/menu.php" method="post" name="form6" target="navegacao" id="form26">
      <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
      <input type="submit" name="Submit62" value="Estados do Brasil " />
    </form></td>
    <td width="11%"><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><form action="propostas/menu.php" method="post" name="form2" target="navegacao" id="form22">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit5" value="Propostas" />
        </div>
    </form></td>
    <td><form action="operacoes_a_serem_executadas.php" method="post" name="form3" target="navegacao" id="form6">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "alterar status proposta"; ?>" />
        <input type="submit" name="button10" id="button10" value="Alterar status proposta" />
      </div>
    </form></td>
    <td><div align="center">
      <form action="operacoes_a_serem_executadas.php" method="post" name="form3" target="navegacao" id="form10">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input name="solicitacao" type="hidden" id="solicitacao" value="<? echo "verificar propostas"; ?>" />
          <input type="submit" name="button2" id="button2" value="Verificar propostas por CPF" />
        </div>
      </form>
    </div></td>
    <td><form action="relatorios/propostas_a_digitar.php" method="post" name="form2" target="navegacao" id="form5">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="tipo_proposta1" type="hidden" id="tipo_proposta1" value="Todas" />
        <input name="titulo_proposta1" type="hidden" id="titulo_proposta1" value="Todas" />
        <input type="submit" name="Submit30" value="Propostas a digitar" />
      </div>
    </form></td>
    <td><form action="veiculos/index.php" method="post" name="form18" target="navegacao" id="form19">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="hidden" name="cpf" id="cpf" />
        <input type="hidden" name="num_proposta" id="num_proposta" />
        <input type="submit" name="button3" id="button3" value="Veículos" />
      </div>
    </form></td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">
      <form action="operadores/menu.php" method="post" name="form20" target="navegacao" id="form20">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input type="submit" name="Submit20" value="Funcionários" />
        </div>
      </form>
    </div></td>
    <td><div align="center">
      <form action="ponto/menu.php" method="post" name="form8" target="navegacao" id="form14">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input type="submit" name="Submit12" value="Cartão de Ponto" />
        </div>
      </form>
    </div></td>
    <td><div align="center">
      <form action="relatorios/menu.php" method="post" name="form9" target="navegacao" id="form9">
        <div align="center">
          <input type="hidden" name="solicitacao" id="solicitacao" />
          <input type="hidden" name="comissao" id="comissao" />
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input type="submit" name="Submit3" value="Relatórios" />
        </div>
      </form>
    </div></td>
    <td><div align="center">
      <form action="mapa_producao/menu.php" method="post" name="form8" target="navegacao" id="form11">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input type="submit" name="Submit123" value="Mapa de Produção" />
        </div>
      </form>
    </div></td>
    <td><div align="center">
      <form action="propostas/informe_operador_para_verificar_propostas_aguardando_ativacao.php" method="post" name="form9" target="navegacao" id="form24">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit24" value="Verificar status por operador" />
      </form>
    </div></td>
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
