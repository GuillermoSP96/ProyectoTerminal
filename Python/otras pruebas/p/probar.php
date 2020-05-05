<?php
$com = "sh ip int br";
//$com = "en";
$returned = exec("python prueba.py '".$com."'",$salida);
//$recipe = explode(',', $returned);
echo "<html>";
echo "<head>";
echo "</head>";
echo "<body>";
echo "<pre>";
#echo $returned."<br>";
foreach($salida as &$valor)
{
    echo $valor.'<br/>';
}
#echo json_encode($returned, JSON_PRETTY_PRINT);
#echo json_encode($salida, JSON_PRETTY_PRINT);
echo "</pre>";
echo "<br>";
echo "</body>";
echo "</html>";
?>