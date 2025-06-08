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
<? 
require '../conect/conect.php';

include '../css/botoes.php';

?>

<body>
<table width="100%" border="0" bgcolor="#ffffff">
  <tr>
    <td width="11%" valign="top">      <form action="principal.php" method="post" name="form1" target="_top" id="form4">
        
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit4" value="Home" />
        </div>
    </form></td>
    <td width="14%" valign="top"><form action="termo_de_responsabilidade/menu.php" method="post" name="form2" target="navegacao" id="form15">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="button" type="submit" name="Submit29" value="Termo de Responsabilidade" />
        </div>
    </form></td>
    <td width="13%" valign="top"><div align="center">
      <form action="categorias/menu.php" method="post" name="form2" target="navegacao" id="form6">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit5" value="Categorias" />
        </div>
      </form>
    </div></td>
    <td width="12%" valign="top"><form action="clientes/menu.php" method="post" name="form1" target="navegacao" id="form1">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="hidden" name="nome" id="nome" />
        <input class="button" type="submit" name="Submit22" value="Clientes" />
      </div>
    </form></td>
    <td width="9%" valign="top"><div align="center">
      <form action="fornecedores/menu.php" method="post" name="form1" target="navegacao" id="form2">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit" value="Fornecedores" />
        </div>
      </form>
    </div></td>
    <td valign="top"><form action="ips/menu.php" method="post" name="form8" target="navegacao" id="form13">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="button" type="submit" name="Submit21" value="Autorização de IP's" />
      </div>
    </form></td>
    <td valign="top"><div align="center">
      <form action="cidades/menu.php" method="post" name="form6" target="navegacao" id="form25">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="button" type="submit" name="Submit28" value="Cidades do Brasil " />
      </form>
    </div></td>
    <td width="12%" valign="top"><div align="center">
      <form action="status/menu.php" method="post" name="form17" target="navegacao" id="form28">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="button" type="submit" name="Submit172" value="Status" />
      </form>
    </div></td>
  </tr>
  <tr>
    <td><div align="center">
      <form action="estabelecimentos/menu.php" method="post" name="form2" target="navegacao" id="form21">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit6" value="Estabelecimentos" />
        </div>
      </form>
    </div></td>
    <td>      <form action="mensagens_aos_funcionarios/menu.php" method="post" name="form8" target="navegacao" id="form8">
        
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit26" value="Mensagens aos Funcionários" />
          <input name="mensagem" type="hidden" id="mensagem" />
          <input name="nome_operador" type="hidden" id="nome_operador" />
          </div>
    </form></td>
    <td><div align="center">
      <form action="produtos/menu.php" method="post" name="form2" target="navegacao" id="form5">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit30" value="Produtos" />
        </div>
      </form>
    </div></td>
    <td><div align="center">
      <form action="orcamentos/selecione_cliente_para_abrir_orcamento.php" method="post" name="form1" target="navegacao" id="form16">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit9" value="Orçamentos/Pedidos" />
        </div>
      </form>
    </div></td>
    <td><div align="center">
      <form action="financeiro/principal.php" method="post" name="form2" target="navegacao" id="form18">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit54" value="Financeiro" />
        </div>
      </form>
    </div></td>
    <td width="16%"><form action="hora_de_encerramento_do_sistema/hora_encerramento.php" method="post" name="form1" target="navegacao" id="form3">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="button" type="submit" name="Submit2" value="Horários do Sistema" />
      </div>
    </form></td>
    <td width="13%"><div align="center">
      <form action="depto_pessoal/principal.php" method="post" name="form20" target="navegacao" id="form20">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit20" value="Depto Pessoal" />
        </div>
      </form>
    </div></td>
    <td><div align="center">
      <form action="estados_do_brasil/menu.php" method="post" name="form6" target="navegacao" id="form26">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="button" type="submit" name="Submit62" value="Estados do Brasil " />
      </form>
    </div></td>
  </tr>
  <tr>
    <td>      <form action="ponto/menu.php" method="post" name="form8" target="navegacao" id="form14">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit12" value="Cartão de Ponto" />
          </div>
    </form></td>
    <td>      <form action="producao_telemarketing/menu.php" method="post" name="form5" target="navegacao" id="form12">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit18" value="Produção de Telemarketing" />
          </div>
    </form></td>
    <td><div align="center">
      <form action="estoque/menu.php" method="post" name="form2" target="navegacao" id="form10">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input class="button" type="submit" name="Submit8" value="Estoque" />
        </div>
      </form>
    </div></td>
    <td><form action="etiquetas/informe_tipo_para_gerar_etiquetas.php" method="post" name="form4" target="navegacao" id="form17">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="button" type="submit" name="Submit7" value="Etiquetas mala-direta" />
      </div>
    </form></td>
    <td><form action="relatorios/menu.php" method="post" name="form9" target="navegacao" id="form9">
      <div align="center">
        <input type="hidden" name="solicitacao" id="solicitacao" />
        <input type="hidden" name="comissao" id="comissao" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="button" type="submit" name="Submit3" value="Relatórios" />
      </div>
    </form></td>
    <td><form action="mapa_producao/menu.php" method="post" name="form8" target="navegacao" id="form11">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="button" type="submit" name="Submit123" value="Mapa de Produção" />
      </div>
    </form></td>
    <td><div align="center">
      <form action="custo_fixo/menu.php" method="post" name="form2" target="navegacao" id="form7">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <input name="dia_inicial" type="hidden" id="dia_inicial" value="01" />
          <input name="mes_inicial" type="hidden" id="mes_inicial" value="<? echo date('m'); ?>" />
          <input name="ano_inicial" type="hidden" id="ano_inicial" value="<? echo date('Y'); ?>" />
          <input name="dia_final" type="hidden" id="dia_final" value="31" />
          <input name="mes_final" type="hidden" id="mes_final" value="<? echo date('m'); ?>" />
          <input name="ano_final" type="hidden" id="ano_final" value="<? echo date('Y'); ?>" />
          <input class="button" type="submit" name="Submit11" value="Custos Fixos" />
        </div>
      </form>
    </div></td>
    <td><div align="center">
      <form action="website.php" method="post" name="form6" target="navegacao" id="form32">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input class="button" type="submit" name="Submit10" value="Website" />
      </form>
    </div></td>
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
