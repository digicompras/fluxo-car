<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%"  border="0">
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"><form action="telemarketing/menu.php" method="post" name="form9" id="form9">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "<input type='submit' name='button' id='button' value='Telemarketing'>"; } ?>
        <input name="nome3" type="hidden" id="nome3" />
      </div>
    </form></td>
    <td colspan="2"><form action="clientes/menu.php" method="post" name="form2" id="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "<input type='submit' name='Submit5' value='Clientes'>"; } ?>
        <input type="hidden" name="nome2" id="nome2" />
      </div>
    </form></td>
    <td colspan="2"><form action="clientes/cupom.php" method="post" name="form5" id="form5">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"")){ echo "CPF
        <input name='cpf' type='text' id='cpf2' size='11' maxlength='11'>
        <input type='submit' name='Submit52322' value='Registrar Cupom'>"; } ?>
      </div>
    </form></td>
    <td colspan="2">&nbsp;</td>
    <td><form action="restaurante/atribuicao_de_mesas.php" method="post" name="form2" id="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="GARCON") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='GARÇON'>"; } ?>
        <input type="hidden" name="solicitacao" id="solicitacao" />
      </div>
    </form></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">Bilheteria</div></td>
    <td colspan="2"><div align="center">Restaurante</div></td>
    <td colspan="2"><div align="center">Happy Hour</div></td>
    <td colspan="2"><div align="center">Lanchonete</div></td>
    <td colspan="2"><div align="center">Quiosque</div></td>
    <td colspan="2"><div align="center">Buffet</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_fechamento_de_caixa_de_ontem==1) && ($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="BILHETERIA")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
      </form>
    </div></td>
    <td colspan="2"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_fechamento_de_caixa_de_ontem==1) && ($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
      </form>
    </div></td>
    <td colspan="2"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="HAPPY HOUR")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
      </form>
    </div></td>
    <td colspan="2"><div align="center">
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
    <td colspan="2"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="QUIOSQUE")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
      </form>
    </div></td>
    <td colspan="2"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <input name="solicitacao_abrir_caixa" type="hidden" id="solicitacao_abrir_caixa" value="abrircaixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <?

if(($registro_abertura_de_caixa==0) && ($ultimo_departamento_trabalhado=="BUFFET")){

        echo'<input type="submit" name="Submit2" value="Abertura de caixa">';

		}

?>
      </form>
    </div></td>
    <td width="22%"><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <div align="center">
          <?
		if(($registro_fechamento_de_caixa_de_ontem==1) && ($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="BILHETERIA")){

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

if(($registro_fechamento_de_caixa_de_ontem==1) && ($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="BILHETERIA")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
        </div>
      </form>
    </div></td>
    <td colspan="2"><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <?
		if(($registro_fechamento_de_caixa_de_ontem==1) && ($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="RESTAURANTE")){

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

if(($registro_fechamento_de_caixa_de_ontem==1) && ($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="RESTAURANTE")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
      </div>
    </form></td>
    <td colspan="2"><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <?
		if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="HAPPY HOUR")){

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

if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="HAPPY HOUR")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
      </div>
    </form></td>
    <td colspan="2"><form action="index.php" method="post" name="form2" id="form2">
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
    <td colspan="2"><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <?
		if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="QUIOSQUE")){

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

if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="QUIOSQUE")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
      </div>
    </form></td>
    <td colspan="2"><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <?
		if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="BUFFET")){

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

if(($registro_abertura_de_caixa==0) && ($solicitacao_abrir_caixa=="abrircaixa") && ($ultimo_departamento_trabalhado=="BUFFET")){



printf('<input type="submit" name="Submit" value="Abrir Caixa">');

				}

				

?>
      </div>
    </form></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2"><form action="restaurante/atribuicao_de_mesas.php" method="post" name="form2" id="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='Mapa de Mesas'>"; } ?>
      </div>
    </form></td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <form action="orcamentos/selecione_cliente_para_abrir_orcamento.php" method="post" name="form2" id="form2">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='Movimento'>"; } ?>
      </form>
    </div></td>
    <td colspan="2"><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2" id="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
      </div>
    </form></td>
    <td colspan="2"><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2" id="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="HAPPY HOUR") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
      </div>
    </form></td>
    <td colspan="2"><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2" id="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
      </div>
    </form></td>
    <td colspan="2"><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2" id="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="QUIOSQUE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
      </div>
    </form></td>
    <td colspan="2"><form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2" id="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BUFFET") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
      </div>
    </form></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <form action="restaurante/fila_contas_fechadas_para_recebimento.php" method="post" name="form2" id="form2">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='CAIXA'>"; } ?>
      </form>
    </div></td>
    <td colspan="2"><div align="center"></div></td>
    <td colspan="2"><div align="center"></div></td>
    <td colspan="2"><div align="center"></div></td>
    <td colspan="2"><div align="center"></div></td>
    <td colspan="2"><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2"><form action="caixa/imprimir_caixa_hoje.php" method="post" name="form2" target="_blank" id="form2">
      <div align="center">
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='Visualizar Caixa'>"; } ?>
      </div>
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td width="6%"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <div align="center">
          <?
$fechamentodecaixa = $_POST['fechamentodecaixa'];

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") && ($fechamentodecaixa=="fechar caixa") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='Nao'>"; } ?>
        </div>
      </form>
    </div></td>
    <td width="7%"><form action="caixa/relatorio_geral_cx_diario.php" method="post" name="form2" id="form2">
      <div align="center">
        <input name="solicitacao_gravar_fechamento_caixa" type="hidden" id="solicitacao_gravar_fechamento_caixa" value="gravarfechamentocaixa" />
        <input name="datefechamento" type="hidden" id="datefechamento" value="<?
		
		if(($registro_abertura_de_caixa_de_ontem==0)  && ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_abertura_de_caixa==1)){
			
		 echo $datecadastro; 
		 
		}
		else{
		
		 echo $datadeontem; 
		
		}
		?>" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") && ($fechamentodecaixa=="fechar caixa") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='Sim'>"; } ?>
      </div>
    </form></td>
    <td width="6%"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <div align="center">
          <?
$fechamentodecaixa = $_POST['fechamentodecaixa'];

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE") && ($fechamentodecaixa=="fechar caixa") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='Nao'>"; } ?>
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
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE") && ($fechamentodecaixa=="fechar caixa") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='Sim'>"; } ?>
      </div>
    </form></td>
    <td><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <div align="center">
          <?
$fechamentodecaixa = $_POST['fechamentodecaixa'];

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="HAPPY HOUR") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='N&atilde;o'>"; } ?>
        </div>
      </form>
    </div></td>
    <td><form action="caixa/relatorio_geral_cx_diario.php" method="post" name="form2" id="form2">
      <div align="center">
        <input name="solicitacao_gravar_fechamento_caixa" type="hidden" id="solicitacao_gravar_fechamento_caixa" value="gravarfechamentocaixa" />
        <input name="datefechamento" type="hidden" id="datefechamento" value="<? echo $datecadastro; ?>" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="HAPPY HOUR") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='Sim'>"; } ?>
      </div>
    </form></td>
    <td width="6%"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <div align="center">
          <?
$fechamentodecaixa = $_POST['fechamentodecaixa'];

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='N&atilde;o'>"; } ?>
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
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='Sim'>"; } ?>
      </div>
    </form></td>
    <td width="6%"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <div align="center">
          <?
$fechamentodecaixa = $_POST['fechamentodecaixa'];

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="QUIOSQUE") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='N&atilde;o'>"; } ?>
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
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="QUIOSQUE") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='Sim'>"; } ?>
      </div>
    </form></td>
    <td width="6%"><div align="center">
      <form action="index.php" method="post" name="form2" id="form2">
        <div align="center">
          <?
$fechamentodecaixa = $_POST['fechamentodecaixa'];

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
          <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BUFFET") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='N&atilde;o'>"; } ?>
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
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BUFFET") && ($fechamentodecaixa=="fechar caixa") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE") && ($fechamentodecaixa=="fechar caixa")){ echo "<input type='submit' name='Submit5' value='Sim'>"; } ?>
      </div>
    </form></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2"><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <input name="fechamentodecaixa" type="hidden" id="fechamentodecaixa" value="fechar caixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BILHETERIA") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
      </div>
    </form></td>
    <td colspan="2"><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <input name="fechamentodecaixa" type="hidden" id="fechamentodecaixa" value="fechar caixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE") or ($registro_fechamento_de_caixa_de_ontem==0) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="RESTAURANTE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
      </div>
    </form></td>
    <td colspan="2"><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <input name="fechamentodecaixa" type="hidden" id="fechamentodecaixa" value="fechar caixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="HAPPY HOUR") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
      </div>
    </form></td>
    <td colspan="2"><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <input name="fechamentodecaixa" type="hidden" id="fechamentodecaixa" value="fechar caixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="LANCHONETE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
      </div>
    </form></td>
    <td colspan="2"><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <input name="fechamentodecaixa" type="hidden" id="fechamentodecaixa" value="fechar caixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="QUIOSQUE") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
      </div>
    </form></td>
    <td colspan="2"><form action="index.php" method="post" name="form2" id="form2">
      <div align="center">
        <input name="fechamentodecaixa" type="hidden" id="fechamentodecaixa" value="fechar caixa" />
        <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>
        <? if(($registro_abertura_de_caixa==1) && ($registro_fechamento_de_caixa==0) && ($reg_mensagem==0) && ($ultimo_departamento_trabalhado=="BUFFET") or ($reg_mensagem==0) && ($ultimo_departamento_trabalhado<>"") && ($funcao=="GERENTE")){ echo "<input type='submit' name='Submit5' value='FECHAMENTO DE CAIXA'>"; } ?>
      </div>
    </form></td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="4"><div align="center"></div></td>
    <td colspan="2"><div align="center"></div></td>
    <td colspan="2"><div align="center"></div></td>
    <td colspan="2"><div align="center"></div></td>
    <td colspan="2"><div align="center"></div></td>
    <td><div align="center"></div></td>
  </tr>
</table>
</body>
</html>