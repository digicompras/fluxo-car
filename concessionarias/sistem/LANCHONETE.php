<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%"  border="0" bgcolor="#CCCCCC">
  <tr>
    <td width="13%"><form action="produtos/menu.php" method="post" name="form2" id="form6">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input type="submit" name="Submit30" value="Produtos" />
      </div>
    </form></td>
    <td><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="LANCHONETE")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
      </form>
    </div></td>
    <td width="16%"><form action="restaurante/atribuicao_de_mesas.php" method="post" name="form2" id="form3">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='Mapa de Mesas'>"; } ?>
        </div>
    </form></td>
    <td width="13%"><div align="center">
      <form action="orcamentos/selecione_cliente_para_abrir_orcamento.php" method="post" name="form2" id="form">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='Movimento'>"; } ?>
        </div>
      </form>
    </div></td>
    <td colspan="2"><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2" id="form7">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
      </div>
    </form></td>
    <td width="8%">&nbsp;</td>
    <td width="24%"><div align="center">
      <form action="telemarketing/menu.php" method="post" name="form9" id="form9">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "<input type='submit' name='button' id='button' value='Telemarketing'>"; } ?>
          <input name="nome" type="hidden" id="nome" />
        </div>
      </form>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <?
		if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="LANCHONETE")){

         echo "R$
          <input name='valor' type='text' id='valor' size='10' maxlength='10'>";
		  
		}
		  ?>
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <input name="solicitacao_gravar_abertura_caixa" type="hidden" id="solicitacao_gravar_abertura_caixa" value="gravaraberturacaixa" />
        <input name="departamento" type="hidden" id="departamento" value="<? echo $ultimo_departamento_trabalhado; ?>" />
        <input name="operador" type="hidden" id="operador" value="<? echo $nome_op; ?>" />
        <input name="cel_operador" type="hidden" id="cel_operador" value="<? echo $celular_op; ?>" />
        <input name="email_operador" type="hidden" id="email_operador" value="<? echo $email_op; ?>" />
        <input name="estabelecimento" type="hidden" id="estabelecimento" value="<? echo $estab_pertence_op; ?>" />
        <input name="cidade_estabelecimento" type="hidden" id="cidade_estabelecimento" value="<? echo $cidade_estab_pertence_op; ?>" />
        <input name="tel_estabelecimento" type="hidden" id="tel_estabelecimento" value="<? echo $tel_estab_pertence_op; ?>" />
        <input name="email_estabelecimento" type="hidden" id="email_estabelecimento" value="<? echo $email_estab_pertence_op; ?>" />
        <input name="historico" type="hidden" id="historico" value="<? echo "Abertura de Caixa"; ?>" />
        <input name="categoria_conta" type="hidden" id="categoria_conta" value="<? echo "Abertura de Caixa"; ?>" />
        <input name="nfantasia" type="hidden" id="nfantasia" value="<? echo $estab_pertence; ?>" />
        <?

if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="LANCHONETE")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
      </div>
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center">
      <form action="caixa/imprimir_caixa_hoje.php" method="post" name="form2" target="_blank" id="form8">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='Visualizar Caixa'>"; } ?>
        </div>
      </form>
    </div></td>
    <td>&nbsp;</td>
    <td><div align="center">
      <form action="clientes/menu.php" method="post" name="form2" id="form11">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "<input type='submit' name='Submit5' value='Clientes'>"; } ?>
          <input type="hidden" name="nome" id="nome" />
        </div>
      </form>
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center">
      <form action="index.php" method="post" name="form2" id="form10">
        <div align="center">
          <input name="fechamentodecaixa" type="hidden" id="fechamentodecaixa" value="fechar caixa" />
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
        </div>
      </form>
    </div></td>
    <td>&nbsp;</td>
    <td><div align="center">
      <form action="clientes/cupom.php" method="post" name="form5" id="form5">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "CPF
        <input name='cpf' type='text' id='cpf2' size='11' maxlength='11'>
        <input type='submit' name='Submit52322' value='Registrar Cupom'>"; } ?>
        </div>
      </form>
    </div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td colspan="2"><div align="center">
      <? 
$fechamentodecaixa = $_POST['fechamentodecaixa'];
	  
	  if($fechamentodecaixa=="fechar caixa"){ echo "Tem Certeza que deseja fechar o Caixa?"; } ?></div>      <div align="center"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="6%"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <div align="center">
          <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") && ($fechamentodecaixa=="fechar caixa") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='Nao'>"; } ?>
        </div>
      </form>
    </div></td>
    <td width="7%"><form action="caixa/relatorio_geral_cx_diario.php" method="post" name="form2" id="form2">
      <div align="center">
        <input name="solicitacao_gravar_fechamento_caixa" type="hidden" id="solicitacao_gravar_fechamento_caixa" value="gravarfechamentocaixa" />
        <input name="datefechamento" type="hidden" id="datefechamento" value="<? echo $datecadastro; ?>" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") && ($fechamentodecaixa=="fechar caixa") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='Sim'>"; } ?>
      </div>
    </form></td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><div align="center"></div></td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
  </tr>
</table>
</body>
</html>