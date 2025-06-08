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

  <input type="submit" name="Submit3" value="Voltar">

  <?

$usuario = $_SESSION['usuario'];

$senha = $_SESSION['senha'];

?>

</form>

<form action="grava_texto_pagina_inicial.php" method="post" enctype="multipart/form-data" name="form1">

  <table width="100%" border="0" cellspacing="10">

    <tr>

      <td colspan="4">        <?

require '../../conect/conect.php';

?></td>
    </tr>

    <tr>

      <td width="11%">&nbsp;</td>

      <td colspan="3"><strong><font color="#0000FF" size="4">Inserir texto da p&aacute;gina inicial!</font></strong></td>
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
      </font></strong></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td><div align="center"><font color="#0000FF" size="4"><strong>Texto 1</strong></font></div></td>
      <td><div align="center"><font color="#0000FF" size="4"><strong>Texto 2</strong></font></div></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 

      <td>&nbsp;</td>

      <td width="27%"><textarea name="texto" cols="50" rows="10" wrap="PHYSICAL" id="texto"></textarea></td>

      <td width="26%"><textarea name="texto2" cols="50" rows="10" wrap="PHYSICAL" id="texto2"><? echo $texto2; ?></textarea></td>
      <td width="36%">&nbsp;</td>
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

