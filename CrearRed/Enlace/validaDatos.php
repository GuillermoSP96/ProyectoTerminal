<?php
	$disp1= $_GET['idIntDisp1'];
	$disp2= $_GET['idIntDisp2'];
?>
<!DOCTYPE html>
<html >
<head>
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Valida Datos</title>
</head>
<body>
	<form id="formu" name="formulario" method="post" action="procesaData.php">
		<ul>
			<li>
				<label for="disp1">Dispositivo 1:</label>
				<input type="text" name="disp1" value="<?php echo $disp1;?>" readonly/><br/><br/>
			</li>
			<li>
				<label for="disp2">Dispositivo 2:</label>
				<input type="text" name="disp2" value="<?php echo $disp2;?>" readonly/><br/><br/>
			</li>
			<input type="submit" name="boton" value="Insertar" />
			<input type="submit" name="boton" value="Modificar" style="margin-left: 20px;"formaction="formulario.php" />
		</ul>
	</form>


</body>
</html>
