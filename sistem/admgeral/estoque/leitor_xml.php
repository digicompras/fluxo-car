<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
</head>

<body>
	
<?php
	$arquivo_xml = $_FILES['arquivo_xml']['name'];
try
{
    $object = simplexml_load_file('$arquivo_xml');
    echo '<table border="1">
            <tr valign="middle">
                <td><strong>Numero</strong></td>
                <td><strong>Serie</strong></td>
            </tr>';
    foreach($object->NFe as $key => $item)
    {
        if(isset($item->infNFe))
        {
            echo '  <tr>
                        <td>'.$item->infNFe->ide->nNF.'</td>
                        <td>'.$item->infNFe->ide->serie.'</td>
                    </tr>
                    ';
        }
    }
    echo '</table>';
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>
	
	
</body>
</html>