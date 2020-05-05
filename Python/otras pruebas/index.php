<html>
    <head>
    	<title>Prueba</title>
    </head>
    <body>
		<form action="" method="post">
               <input type="button" name="botonPrueba" value="Ejecutar" onClick="
    	<?php
			$salida = array(); //contendrá cada linea salida desde la aplicación en Python
			exec("python3.6 ./prueba.py", $salida);
			echo count($salida).'<br>';
			for($i = 0; $i < count($salida); $i++){
        			echo $salida[$i]."<br>";
    		}
		?>">
        </form>
    </body>	
</html>