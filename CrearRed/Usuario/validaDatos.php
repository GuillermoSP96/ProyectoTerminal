<?php
	$nombre= $_GET['nombre'];
	$pass= $_GET['pass'];
?>
<!DOCTYPE html>
<html style="background-image: url(/wallpapers/wallpaper.jpg)">
<head>
	<link rel="stylesheet" href="../CSS/estilo.css">
	<title>Valida Datos</title>
</head>
<body>
	<form id = "formu" name="formulario" method="post"  style="color: white;" action="procesaData.php">
		<ul>
			<li>
				<label for="name">Nombre:</label>
				<input style="margin-left: 20px; " type="text" name="nombre" value="<?php echo $nombre;?>" readonly/><br/><br/>
			</li>
			<li>
				<label for="pass">Constraseña:</label>
				<input style="margin-left: 20px; " type="password" name="pass" value="<?php echo $pass;?>" readonly/><br/><br/>
			</li>
			<input type="submit" name="boton" value="Insertar"/> 
			<input type="submit" name="boton" value="Modificar" formaction="formulario.php"/>
		</ul>
	</form>
</body>
</html>
