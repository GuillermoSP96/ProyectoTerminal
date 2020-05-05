<?php
	$nombre= $_GET['nombre'];
	$ip= $_GET['ip'];
	$estado=$_GET['estado'];
	$disp=$_GET['disp'];
?>
<!DOCTYPE html>
<html style="background-image: url(/wallpapers/wallpaper.jpg)">
<head>
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Valida Datos</title>
</head>
<body>
	<form id = "formu"name="formulario" method="post"  style="color: white;" action="procesaData.php">
		<ul>
			<li>
				<label for="name">Nombre:</label>
				<input style="margin-left: 20px"type="text" name="nombre" value="<?php echo $nombre;?>" readonly/><br/><br/>
			</li>
			<li>
				<label for="ip">IPv4:</label>
				<input style="margin-left: 20px"type="text" name="ip" value="<?php echo $ip;?>" readonly/><br/><br/>
			</li>
			<li>
				<label for="estado">Estado:</label>
				<input style="margin-left: 20px"type="text" name="estado" value="<?php echo $estado;?>" readonly/><br/><br/>
			</li>
			<li>
				<label for="disp">Dispositivo:</label>
				<input style="margin-left: 20px"type="text" name="disp" value="<?php echo $disp;?>" readonly/><br/><br/>
			</li>
			<input type="submit" name="boton" value="Insertar" />
			<input type="submit" name="boton" value="Modificar" formaction="formulario.php" />
		</ul>
	</form>
</div>
</body>
</html>
