<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INTERFACES</title>
</head>
<body>
	<?php
	  $texto='sh ip int br';
    $output = exec("python3.6 conexionNetmiko.py '".$texto."'",$salida);
    echo $output;

		foreach($salida as &$valor)
		{
		    echo $valor.'<br/>';
		}
		echo "</pre>";
	?>
</body>
</html>
