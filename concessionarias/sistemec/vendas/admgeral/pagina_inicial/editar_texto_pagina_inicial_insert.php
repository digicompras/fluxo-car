<?php

session_start(); //inicia sessão...

if ($_SESSION["usuario"] == true) //verifica se a variável "usuario" é verdadeira...

echo ""; //se for emite mensagem positiva.

if ($_SESSION["senha"] == true) //verifica se a variável "senha" é verdadeira...

echo ""; //se for emite mensagem positiva.

else //se não for...

header("Location: alerta.php");



?>



<html>

<head>

<title>Documento sem t&iacute;tulo</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>



<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">



<form name="form1" method="post" action="menu.php">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

  <input type="submit" name="Submit22" value="Voltar">

</form>

<form action="grava_edit_texto_pagina_inicial.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="4">        <?

require '../../conect/conect.php';



?></td>
    </tr>

    <tr>

      <td width="9%">&nbsp;</td>

      <td colspan="3"><strong><font color="#0000FF" size="4">Editar texto da p&aacute;gina inicial!</font></strong></td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td colspan="3">

	<?

$sql = "SELECT * FROM pag_inicial";

$res = mysql_query($sql);

echo "<tr>";

while($linha=mysql_fetch_row($res)) {

$reg++;


$pagina_inicial = $linha[1];
$texto2 = $linha[2];
$tamanho_fonte = $linha[3];

?>	  </td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td colspan="3"><strong><font color="#0000FF" size="4">Tamanho da fonte      
            <select name="tamanho_fonte" id="tamanho_fonte">
              <option selected><? echo $tamanho_fonte;  ?></option>
              <option>10</option>
              <option>12</option>
              <option>14</option>
              <option>16</option>
              <option>18</option>
              <option>20</option>
              <option>22</option>
              <option>24</option>
              <option>26</option>
              <option>28</option>
              <option>30</option>
              <option>32</option>
              <option>34</option>
              <option>36</option>
              <option>38</option>
              <option>40</option>
              <option>42</option>
              <option>44</option>
              <option>46</option>
              <option>48</option>
              <option>50</option>
            </select>
      </font>      </strong>      </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="25%"><div align="center"><font color="#0000FF" size="4"><strong>Texto 1</strong></font></div></td>
      <td width="29%"><div align="center"><font color="#0000FF" size="4"><strong>Texto 2</strong></font></div></td>
      <td width="37%">&nbsp;</td>
    </tr>
    <tr> 

      <td>&nbsp;</td>

      <td><textarea name="texto" cols="50" rows="10" wrap="PHYSICAL" id="texto"><? echo $pagina_inicial; ?></textarea></td>
      <td><textarea name="texto2" cols="50" rows="10" wrap="PHYSICAL" id="texto2"><? echo $texto2; ?></textarea>
        <?

if($reg==1){

echo "</tr>";

$reg=0;

}

?>
        <? } ?></td>
      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td>&nbsp;</td>

      <td colspan="3"><input type="submit" name="Submit" value="Salvar">

      <input type="reset" name="Submit2" value="Limpar"></td>
    </tr>

    <tr> 

      <td>&nbsp;</td>

      <td colspan="3">&nbsp;</td>
    </tr>
  </table>

</form>

<p>&nbsp; </p>

</body>

</html>

