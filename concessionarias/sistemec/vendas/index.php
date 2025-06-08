<?
ini_set('default_charset','UTF8_general_mysql500_ci');
?><html>
<head>
<title>Digicompras - 16-99739-1418</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?

require 'conect/conect.php';

$sql = "select * from pag_inicial";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$pagina_inicial = $linha[1];
$texto2 = $linha[2];
$tamanho_fonte = $linha[3];
}
?>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	color: #009900;
	font-weight: bold;
	font-size: <? echo $tamanho_fonte; ?>;
}
.style2 {
	color: #1328c9;
	font-weight: bold;
	font-size: 12px;
}
.style3 {
	color: #0000FF;
	font-weight: bold;
	font-size: 50px;

}
.style10 {
	color: #1328c9;
	font-weight: bold;
	font-size: 24px;
}

-->
</style>
<style type="text/css">
<!--
.botao  {
	padding-left: 35px;
	float: left;
	middle:77px;
	
	margin:0px;
	padding:0px;
	width: 130px;
	height:25px;
        }

.botao a:visited {
	font: bold 12px/24px arial, helvetica, sans-aerif;
	padding:0px;
	text-decoration: none;
	text-align:center;

	background:  url('imagens/botao.png') no-repeat 
center center;
	width:130px;
	height:25px;
	display:block;
	}

.botao a:hover {
	background:  url('imagens/botao2.png') no-repeat 
center center;
	border: #ff4300;
               }
.style4 {
	font: bold 12px/24px arial, helvetica, sans-aerif;
	padding:0px;

	text-decoration: none;
	text-align:center;

float: left;
	middle:77px;
	background:  url('imagens/botao.png') no-repeat 
center center;
width:130px;
	height:25px;
	display:block;
	color: #FFFFFF;
}
.botao1 {	padding-left: 35px;
	float: left;
	middle:77px;
	
	margin:0px;
	padding:0px;
	width: 130px;
	height:25px;
}
.style8 {	font: bold 12px/24px arial, helvetica, sans-aerif;
	padding:0px;

	text-decoration: none;
	text-align:center;

float: left;
	middle:77px;
	background:  url('imagens/botao.png') no-repeat 
center center;
width:130px;
	height:25px;
	display:block;
	color: #FFFFFF;
}
.botao11 {padding-left: 35px;
	float: left;
	middle:77px;
	
	margin:0px;
	padding:0px;
	width: 130px;
	height:25px;
}
.style9 {font: bold 12px/24px arial, helvetica, sans-aerif;
	padding:0px;

	text-decoration: none;
	text-align:center;

float: left;
	middle:77px;
	background:  url('imagens/botao.png') no-repeat 
center center;
width:130px;
	height:25px;
	display:block;
	color: #FFFFFF;
}
-->

</style>



<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<?

setlocale(LC_TIME, 'pt_BR');

$data_completa = strftime("%A, %d de %B de %Y<br><br>");

$hoje = strftime("%A");


$instrucao = $_GET['instrucao'];

?>

<?
	  
$sql = "SELECT * FROM franquia";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$franquia = $linha[1];
}
?>

<?
	  
$sql = "SELECT * FROM a_empresa";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$aempresa = $linha[1];
}
?>

<?
$sql = "select * from hora_encerramento where dia = '$hoje' limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$dia = $linha[1];
$horas_inicio = $linha[2];
$minutos_inicio = $linha[3];
$segundos_inicio = $linha[4];
$horas_termino = $linha[5];
$minutos_termino = $linha[6];
$segundos_termino = $linha[7];

}
//$ajuste_horario = 2;
//$horacerta = date('H')+2;
//$hora_atual = "0".$horacerta.date(':i:s');
$date = date('d-m-Y');
?>

<?
$sql = "SELECT * FROM hora_certa limit 1";

$res = mysql_query($sql);

while($linha=mysql_fetch_row($res)) {


$acao = $linha[5];
$hora_ajuste = $linha[2];

}

$horacerta = date('H')+$hora_ajuste;
if($horacerta<=9){
$hora_atual = "0".$horacerta.date(':i:s');
}
else{
$hora_atual = $horacerta.date(':i:s');
}
?>

<?
$sql = "SELECT * FROM hora_ponto limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {


$h_ponto = $linha[1];
$m_ponto = $linha[2];
$s_ponto = $linha[3];

}

$hora_ponto = "$h_ponto:$m_ponto:$s_ponto";
?>



<?
$hora_iniciar = "$horas_inicio".":"."$minutos_inicio".":"."$segundos_inicio";
$hora_terminar = "$horas_termino".":"."$minutos_termino".":"."$segundos_termino";
?>
<script language="javascript">
function foco(usuario)
{
document.getElementById(usuario).focus();
}
</script>



<?
$sql = "SELECT * FROM background";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$background = $linha[1];

}
?>

<body background="background/<? echo $background; ?>" bgproperties="fixed" onLoad="MM_preloadImages('imagens/arte_esquerda_2.jpg')">

<table width="998"  border="0" cellpadding="0">
  <tr>
    <td><p><img src="logo/cabecalho.jpg.jpg" width="1000" height="98"><br>
    <img src="imagens/linha_horinzontal.jpg" width="998" height="10"></p>    </td>
  </tr>
</table>
<table width="998"  border="0">
<tr>
      <td width="10%"><div align="center"><span class="botao"><a href="index.php" target="_top" class="style4">HOME</a></span></div></td>
      <td width="10%"><div align="center"><span class="botao"><a href="index.php?instrucao=franquia" target="_top" class="style4">Produtos</a></span></div></td>
      <td width="10%"><div align="center"><span class="botao"><a href="index.php?instrucao=aempresa" target="_top" class="style4">A Empresa</a></span></div></td>
      <td width="10%"><div align="center"><span class="botao"><a href="index.php?instrucao=contato" target="_top" class="style4">Fale Conosco</a></span></div></td>
      <td width="10%"><div align="center"><span class="botao"><a href="index.php?instrucao=funcionario" target="_top" class="style4">Área de Vendas</a></span></div></td>
      <td width="10%"><div align="center"><span class="botao"><a href="index.php?instrucao=agencias" target="_top" class="style4">Lojas</a></span></div></td>
      <td width="10%"><div align="center"><span class="botao"><a href="trabalhe_conosco.php" target="_blank" class="style4">Trabalhe Conosco</a></span></div></td>
    </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="28%"><form action="index.php" method="post" name="form2">
      <select name="categoria" id="select2">
        <option>Selecione a categoria e clique em Buscar</option>
        <?

    $sql = "select * from categorias order by categoria asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
  echo "<option>".$x['categoria']."</option>
                  
                  
                  ";
    }
?>
      </select>
      <input type="submit" name="Submit3" value="Buscar">
    </form></td>
    <td width="27%">&nbsp;</td>
    <td width="45%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
    
    
    </td>
  </tr>
</table>
<table width="998"  border="0" cellpadding="0">
  <tr>
    <td width="25%" valign="top"><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','imagens/arte_esquerda_2.jpg',1)"><img src="imagens/arte_esquerda.jpg" alt="Tranquilidade na sua feliz idade" name="Image3" width="246" height="267" border="0"></a></td>
    <td width="60%" valign="top"><div align="center">
	
<?
			
$categoria_a_pesquisar = $_POST['categoria'];
			
$sql = "SELECT * FROM produtos where categoria = '$categoria_a_pesquisar' and aparecer_site = 'Sim' order by codigo desc";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {
$reg++;

$categoria = $linha[4];
$preco = $linha[7];
$oferta = $linha[8];
$preco_oferta = $linha[9];

$codigo = $linha[11];

$quant_disponivel = $linha[18];

$nome_produto = $linha[27];


?>
<table width="100%"  border="0">
  <tr bgcolor="#ffffff">
    <td><div align="center">Foto</div></td>
    <td><div align="center">C&oacute;digo</div></td>
    <td width="17%"><div align="center">Nome do Produto</div></td>
    <td width="14%"><div align="center">Pre&ccedil;o</div></td>
  </tr>
  <tr>
    <td width="15%"><div align="center">
      <input name="codigo" type="hidden" id="codigo" value="<? echo $codigo; ?>">
      <? printf("<a href='detalhes_produtos.php?chamar=$codigo' ><img src='fotos_produtos/$linha[1]' border='2' height='56'></a>"); ?></div></td>
    <td width="12%"><div align="center"><? printf("<a href='detalhes_produtos.php?chamar=$codigo' >$codigo</a> ");?> </div></td>
    <td><div align="center"><? echo $nome_produto; ?> </div></td>
    <td><div align="center">
      <? if($oferta=="Sim"){ echo "<del> R$ $preco_oferta </del>"; } else { echo "R$ $preco "; }?>
    </div></td>
    <?
if($reg==1){
echo "</tr>";
$reg=0;
}
?>
</table>
  <? } ?>
<p>
  <?
if(empty($instrucao)){ 
$sql = "select * from publicidade order by posicao asc limit 3";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$codigo = $linha[0];
$posicao = $linha[1];
$imagem = $linha[2];



echo "<a href='publicidade/$imagem' target='_blank'><img src='publicidade/$imagem' border='0' width='200'></a> "; 

//printf("<img src='publicidade/$linha[1]' border='0' width='300'>");
}
}
if(empty($instrucao)){ echo "<div align='center' class='style1'><blink>". $pagina_inicial. "</blink></div><br>"; }
if(empty($instrucao)){ echo "<div align='center' class='style1'><blink> $texto2 </blink></div><br>"; }
//if(empty($instrucao)){ echo "<div align='center' class='style3'>0800-940-0481</div><br>"; }

if($instrucao=="franquia"){ echo "<br><br>".$franquia; }
if($instrucao=="aempresa"){ echo "<br>".$aempresa; }

if($instrucao=="contato"){ 

//INICIO DO SCRIPT PARA PEGAR IP
 
$_SERVER['REMOTE_ADDR'] . "<br/>";
 
$_SERVER['HTTP_X_FORWARDED_FOR'] . "<br/>";
 
$_SERVER['HTTP_CLIENT_IP'] . "<br/>";
 

 
 
$ip_faleconosco = $_SERVER['REMOTE_ADDR'];
 
 
 

//FIM DO SCRIPT PARA PEGAR IP

if($_POST[opc_enviar]) {


    
	//RECEBE OS DADOS DO FORMULÁRIO
	$v_nome      =   $_POST[nome];
	$v_email    =  $_POST[email];
	$v_fone  =  $_POST[fone];
	$v_obs   =  $_POST[obs];
	$v_cidade   =  $_POST[cidade];
	$v_estado   =  $_POST[estado];

	//EMAIL DO ADMINISTRADOR QUE VAI RECEBER O PEDIDO
	
$sql = "SELECT * FROM cad_empresa limit 1";
$res = mysql_query($sql);
while($linha=mysql_fetch_row($res)) {

$nfantasia_empresa = $linha[2];
$email_empresa = $linha[14];
$site_empresa = $linha[15];

}
	
	$email_dest   =   $email_empresa;
	
	//PREPARA O PEDIDO
	$mens  .=  " A sua mensagem foi enviada com sucesso. A $nfantasia_empresa agradece o seu contato    \n";
	$mens  .=  " Em breve lhe retornaremos sobre o assunto! \n\n";
	
	$mens  .=  "IP Utilizado: ".$ip_faleconosco."                                                       \n";
	$mens  .=  "Nome: ".$v_nome."                                                       \n";
	$mens  .=  "E-Mail: ".$v_email."                                                    \n";
	$mens  .=  "Telefone: ".$v_fone."                                                    \n";
	$mens  .=  "Cidade: ".$v_cidade."                                                    \n";
	$mens  .=  "Estado: ".$v_estado."                                                    \n";

	$mens  .=  "Mensagem: ".$v_obs."                                                    \n";
	
	//DISPARA O EMAIL
	$envia  =  mail($email_dest, "Fale conosco", $mens,"From:".$email_dest."\r\nBcc:".$v_email);
	
	//VERIFICA SE O EMAIL FOI ENVIADO COM SUCESSO
	if($envia) { 
	   //ELIMINA TODAS AS VARIÁVEIS DA SESSÃO
       $_SESSION = array();
       
	   //DESTRÓI A SESSÃO PARA GARANTIR
       @session_destroy(); ?>
  <script language="JavaScript">
	   <!--
	      alert("PARABÉNS!!\n\n A Sua mensagem foi enviada com sucesso! Em breve lhe retornaremos sobre o assunto.");
		  window.location.href = "index.php";
	   //-->
	   </script>
  <?
	}//FECHA IF(envia)
	else {?>
  <script language="JavaScript">
	   <!--
	      alert("ERRO!!\n\n Ocorreu um erro inesperado em seu servidor.\n\nPor favor, tente novamente...");
		  window.location.href = "index.php";
	   //-->
	   </script>
  <?
   }//FECHA ELSE (envia)
}//FECHA IF
?>
  
</p>
<table width="519"  border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td> <form method="post" name="frmfinalizar" onSubmit="return finaliza();">
        <p align="center"> 
          <input type="hidden" name="opc_enviar" value="1">
          <input type="hidden" name="v_produtos" value="<? echo $v_produtos; ?>">
          <input type="hidden" name="v_nome" value="<? echo $v_nome; ?>">
          <input type="hidden" name="v_email" value="<? echo $v_email; ?>">
          <input type="hidden" name="v_user" value="<? echo $v_user; ?>">
          <input type="hidden" name="v_nomeE" value="<? echo $v_nomeE; ?>">
          <input type="hidden" name="v_EnderecoE" value="<? echo $v_EnderecoE; ?>">
          <input type="hidden" name="v_cidadeE" value="<? echo $v_cidadeE; ?>">
          <input type="hidden" name="v_EstadoE" value="<? echo $v_EstadoE; ?>">
          <input type="hidden" name="v_fonee" value="<? echo $v_fonee; ?>">
          <input type="hidden" name="v_CEPE" value="<? echo $v_CEPE; ?>">
          <input type="hidden" name="v_EmailE" value="<? echo $v_EmailE; ?>">
          <input type="hidden" name="v_insc" value="<? echo $v_insc; ?>">
          <input type="hidden" name="v_cnpj" value="<? echo $v_cnpj; ?>">
          <input type="hidden" name="v_pgto" value="<? echo $v_pgto; ?>">
          <input type="hidden" name="v_transp" value="<? echo $v_transp; ?>">
          <input type="hidden" name="v_total" value="<? echo $total; ?>">
          <input type="hidden" name="v_dataped" value="<? echo $dataped; ?>">
          <input type="hidden" name="v_dataent" value="<? echo $dataent; ?>">
      <div align="center">
        <table width="48%"  border="0" align="center" cellpadding="1" cellspacing="1">
                  <!--DWLayoutTable-->
                  <tr > 
                    <td height="29" colspan="4"> <div align="left">
                      <div align="center">Sua 
                            mesagem &eacute; muito importante para n&oacute;s! Queremos 
                        ouv&iacute;-lo!</div>
                    </div></td>
                  </tr>
                  <tr> 
                    <td height="26"><!--DWLayoutEmptyCell-->&nbsp;</td>
                    <td width="260" colspan="3" valign="top"><font color="#FFFFFF"><strong> 
                      </strong></font></td>
                  </tr>
                  <tr> 
                    <td width="91" height="26"><div align="left">Nome:</div></td>
                    <td colspan="3" valign="top"><strong> 
                      <input name="nome" type="text" id="cnpj"  size="40" maxlength="40">
                      </strong></td>
                  </tr>
                  <tr> 
                    <td height="26"><div align="left" class="style6">Telefone:</div></td>
                    <td colspan="3" valign="top"><div align="left"><strong> 
                        <input name="fone" type="text" id="fonee2"  size="20" maxlength="20">
                        <font face="Arial" size="2"> </font></strong></div></td>
                  </tr>
                  <tr>
                    <td height="24">Cidade:</td>
                    <td colspan="3" valign="top"><input type="text" name="cidade" id="cidade"></td>
                  </tr>
                  <tr>
                    <td height="24">Estado:</td>
                    <td colspan="3" valign="top"><select name="estado" id="select7">
                      <option selected>Selecione</option>
                      <?





    $sql = "select * from estados_do_brasil order by estado asc";

    $result = mysql_query($sql);

    while($x=mysql_fetch_array($result)){

  echo "<option value=" .$x['estado']. ">".$x['estado']."</option>";

    }

?>
                    </select></td>
                  </tr>
                  <tr> 
                    <td height="24"> <div align="left" class="style6">E-Mail:</div></td>
                    <td colspan="3" valign="top"><div align="left"><strong> 
                        <input name="email" type="text" id="nome"  size="40" maxlength="40">
                        <font face="Arial" size="2"> </font></strong></div></td>
                  </tr>
                  <tr valign="bottom"> 
                    <td height="72" valign="top"> <div align="left" class="style6">Mensagem: 
                    </div></td>
                    <td colspan="2" valign="top"><div align="left"> <strong> 
                        <textarea name="obs" cols="30"></textarea>
                        </strong></div></td>
                    <td valign="top"><div align="left"> </div></td>
                  </tr>
                  <tr align="center" valign="middle"> 
                    <td height="26" valign="top"><div align="left"></div></td>
                    <td colspan="2" valign="top"> <div align="left"> <strong> 
                    <input type="submit"  name="Submit" value="Enviar">
                    <input type="reset" name="Submit2" value="Limpar">
    </strong></div></td>
                    <td valign="top"><div align="left"><strong> </strong></div></td>
                  </tr>
                </table>
    </div></form></table>
      </div>
    
<? } ?>

<?
if($instrucao=="veiculos"){ 


//INICIO DO SCRIPT PARA PEGAR IP
 
echo "Remote addr: " .$_SERVER['REMOTE_ADDR'] . "<br/>";
 
echo "X Forward: " . $_SERVER['HTTP_X_FORWARDED_FOR'] . "<br/>";
 
echo "Clien IP: " . $_SERVER['HTTP_CLIENT_IP'] . "<br/>";
 

function getIp()
{
 
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
 
        $ip = $_SERVER['HTTP_CLIENT_IP'];
 
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
 
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
 
    }
    else{
 
        $ip = $_SERVER['REMOTE_ADDR'];
 
    }
 
    return $ip;
 
}

//FIM DO SCRIPT PARA PEGAR IP


echo "<form name='form1' method='post' action='verifica_op_veiculos.php' target='_top'>
  <table width='100%' border='0' align='center'>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan='4'><span class='style5'><span class='style2'><br>$data_completa</span></span></td>
      <td>&nbsp;</td>
      <td><span class='style5'><span class='style2'>$hora_atual</span></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='9'><div align='left'>Hor&aacute;rio de funcionamento do sistema! In&iacute;cio as $hora_iniciar - T&eacute;rmino as $hora_terminar</span></div></td>
      
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><div align='center'><span class='style6'>";
        
if($hora_atual<=$hora_iniciar){echo "Prezado Operador! Seu dia de trabalho ainda n&atilde;o teve inicio!<br>O sistema abrir&aacute; as $hora_iniciar<br>";
}

if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){ echo "<br><br>Prezado operador!<br><br>PARA SUA SEGURANÇA SEU IP $ip SERÁ GRAVADO AO REALIZAR SEU LOGIN!<br> Tenha um ótimo dia de trabalho!<br>";
} 


if($hora_atual>=$hora_terminar){echo "Prezado Operador! Seu dia de trabalho j&aacute; terminou!<br>J&aacute; s&atilde;o $hora_atual, portanto, n&atilde;o &eacute; poss&iacute;vel acessar o sistema agora!<br> V&aacute; descansar para amanh&atilde; seu dia ser proveitoso!";
}


      "</span></div></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"Usuário ";}"</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='usuario' type='text' id='usuario'><br><br>";}"</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "Senha   "; }"</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "<input name='senha' type='password' id='senha'><br><br>"; } 
echo "<input name='data_hoje' type='hidden' id='data_hoje' value='$date'>"; "</td>
      <td>&nbsp; </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "<input type='submit' name='Submit' value='Conectar'>"; } 
       if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "<input type='reset' name='Submit2' value='Limpar'>"; } "</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>";

}

?>

<?
$ip = $_SERVER['REMOTE_ADDR'];

$user= "select * from ips where ip = '$ip' and estab_pertence <> '' limit 1";
$result=mysql_query($user);
while($linha=mysql_fetch_row($result)) {


$ip_cadastrado = $linha[1];
$estab_pertence = $linha[2];
}



//if(mysql_num_rows($result)==1){


if($instrucao=="funcionario"){

$date = date('Y-m-d');


echo "<form name='form1' method='post' action='verifica.php' target='_top'>
  <table width='100%' border='0' align='center'>
    <tr>
      <td><span class='style5'><span class='style2'><br>$data_completa</span></span></td>
      <td>&nbsp;</td>
      <td><span class='style5'><span class='style2'>$hora_atual</span></span></td>
    </tr>
    <tr>
      <td colspan='6'><div align='left'>Hor&aacute;rio de funcionamento do sistema! In&iacute;cio as $hora_iniciar - T&eacute;rmino as $hora_terminar</div></td>
    </tr>
    <tr>
      <td colspan='3'><div align='center'><span class='style6'>";
          
if($hora_atual<=$hora_iniciar){echo "Prezado operador! Seu dia de trabalho ainda n&atilde;o teve inicio!<br><br>O sistema abrir&aacute; as $hora_iniciar <br>";
}

if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){ echo "<br><br>Prezado operador!<br>PARA SUA SEGURANÇA SEU IP $ip_cadastrado SERÁ GRAVADO AO REALIZAR SEU LOGIN! Tenha um ótimo dia de trabalho!<br>";
} 


if($hora_atual>=$hora_terminar){echo "Prezado operador!<br> Seu dia de trabalho j&aacute; terminou!<br><br>J&aacute; s&atilde;o $hora_atual, portanto, n&atilde;o &eacute; poss&iacute;vel acessar o sistema agora!<br><br> V&aacute; descansar para amanh&atilde; seu dia ser proveitoso!<br> "; 
}



      "</span></div></td>
    </tr>
	<tr>
	<td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='estab_pertence' type='hidden' id='estab_pertence' value='$estab_pertence'>"; echo "$estab_pertence<br> "; } "</td>
	<td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "Nome "; } "</td>
	<td>";
if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){

if($hora_atual<=$hora_ponto){
	
echo"<select name='nome' id='select5'>";
    $sql = "select * from operadores where estab_pertence = '$estab_pertence' and status = 'Ativo' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
	
  echo "<option>".$x['nome']."</option>";
  
   }
      echo"</select><br>";	
	  }
	  else{
	
echo"<select name='nome' id='select5'>";
	$sql = "select * from ponto where date = '$date' and ent_m <> 'FALTOU' and estab_pertence = '$estab_pertence' order by nome asc";
    $result = mysql_query($sql);
    while($x=mysql_fetch_array($result)){
	
  echo "<option>".$x['nome']."</option>";
  }
  
      echo"</select><br>";	

	  }
	  }
	"</td>
	</tr>
    <tr> 
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "Usuário "; } "</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='usuario' type='text' id='usuario'><br>";} "</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td width='28%'>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"Senha"; } "</td>
      <td width='46%'>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='senha' type='password' id='senha'><br><br>"; }
      echo "<input name='data_hoje' type='hidden' id='data_hoje' value='$date'>"; "</td>
      <td width='26%'>&nbsp; </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input type='submit' name='Submit' value='Conectar'>"; } 
      if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input type='reset' name='Submit2' value='Limpar'>"; } "</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>"; 


}
//}
else {
echo "ATENÇÃO!!!...<br><br>O IP $ip DO LOCAL DE ONDE VOCÊ ESTÁ TENTANDO ACESSAR O SISTEMA NÃO ESTÁ AUTORIZADO PELA EMPRESA!<br><br> ACESSE O SISTEMA DE UM LOCAL DEVIDAMENTE AUTORIZADO!";
}

?>
<?
if($instrucao=="parceiros"){

$ip = $_SERVER['REMOTE_ADDR'];


echo "<form name='form1' method='post' action='verifica_parceiros.php' target='_top'>
  <table width='100%' border='0' align='center'>
    <tr>
      <td><span class='style5'><span class='style2'><br>$data_completa</span></span></td>
      <td>&nbsp;</td>
      <td><span class='style5'><span class='style2'>$hora_atual</span></span></td>
    </tr>
    <tr>
      <td colspan='6'><div align='left'>Hor&aacute;rio de funcionamento do sistema! In&iacute;cio as $hora_iniciar - T&eacute;rmino as $hora_terminar</div></td>
    </tr>
    <tr>
      <td colspan='3'><div align='center'><span class='style6'>";
          
if($hora_atual<=$hora_iniciar){echo "Prezado Parceiro! Seu dia de trabalho ainda n&atilde;o teve inicio!<br><br>O sistema abrir&aacute; as $hora_iniciar <br>";
}

if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){ echo "<br><br>Prezado Parceiro!<br><br>PARA SUA SEGURANÇA SEU IP $ip SERÁ GRAVADO AO REALIZAR SEU LOGIN! Tenha um ótimo dia de trabalho!<br>";
} 


if($hora_atual>=$hora_terminar){echo "Prezado Parceiro! Seu dia de trabalho j&aacute; terminou!<br><br>J&aacute; s&atilde;o $hora_atual, portanto, n&atilde;o &eacute; poss&iacute;vel acessar o sistema agora!<br><br> V&aacute; descansar para amanh&atilde; seu dia ser proveitoso!<br> "; 
}



      "</span></div></td>
    </tr>
    <tr> 
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo "Usuário "; } "</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='usuario' type='text' id='usuario'><br><br>";} "</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td width='28%'>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"Senha"; } "</td>
      <td width='46%'>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input name='senha' type='password' id='senha'><br><br>"; }
      echo "<input name='data_hoje' type='hidden' id='data_hoje' value='$date'>"; "</td>
      <td width='26%'>&nbsp; </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>"; if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input type='submit' name='Submit' value='Conectar'>"; } 
      if($hora_atual>$hora_iniciar)if($hora_atual<$hora_terminar){echo"<input type='reset' name='Submit2' value='Limpar'>"; } "</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>"; 


}

?>
<?
if($instrucao=="agencias"){ ?>

<TABLE width="100%" border=0 align="center" cellPadding=3 cellSpacing=7>
    <?
	
	
$sql = "SELECT * FROM estabelecimentos where aparecer_site = 'Sim' order by posicao asc";
$res = mysql_query($sql);

$reg = 0;
echo "<tr>";
while($linha=mysql_fetch_row($res)) {
$reg++;

$codigo = $linha[0];
$razaosocial = $linha[1];
$nfantasia = $linha[2];
$cnpj = $linha[3];
$inscr_est = $linha[4];
$endereco = $linha[5];
$numero = $linha[6];
$bairro = $linha[7];
$complemento = $linha[8];
$cep = $linha[9];
$cidade = $linha[10];
$estado = $linha[11];
$telefone = $linha[12];
$fax = $linha[13];
$email = $linha[14];
$site = $linha[15];
$proprietario = $linha[16];
$cpf = $linha[17];
$rg = $linha[18];
$operador = $linha[24];
$cel_operador = $linha[25];
$email_operador = $linha[26];
$estabelecimento = $linha[27];
$cidade_estabelecimento = $linha[28];
$tel_estabelecimento = $linha[29];
$email_estabelecimento = $linha[30];
$obs = $linha[19];
$datacadastro = $linha[20];
$horacadastro = $linha[21];
$dataalteracao = $linha[22];
$horaalteracao = $linha[23];
$operador_alterou = $linha[31];
$cel_operador_alterou = $linha[32];
$email_operador_alterou = $linha[33];
$estabelecimento_alterou = $linha[34];
$cidade_estabelecimento_alterou = $linha[35];
$tel_estabelecimento_alterou = $linha[36];
$email_estabelecimento_alterou = $linha[37];
$operador_atendente = $linha[41];

?>
            <td valign="middle">    <div align="center"><span class="style2"><? if($endereco<>""){echo $nfantasia."<br>"; } ?>        
            <? if($endereco<>""){echo $endereco.","; } ?>  <? if($endereco<>""){echo $numero."<br>"; } ?>        
            <? if($endereco<>""){echo $cidade." - "; } ?>   <? if($endereco<>""){echo $estado."<br>"; } ?>
            <? if($endereco<>""){echo $cep."<br>"; } ?>
            <? if($endereco<>""){echo $telefone."<br>"; } ?>
            <? if($endereco<>""){echo $email."<br>"; } ?>
		    </span>  </div></td>




          <?
if($reg==2){
echo "</tr><tr></tr><tr>";
$reg=0;
}
?>
<? } ?>

</TABLE>
<?
}


?></td>
    <td width="4%" valign="top">&nbsp;</td>
  </tr>
</table>
</body>
</html>
